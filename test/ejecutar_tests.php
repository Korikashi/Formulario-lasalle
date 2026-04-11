<?php
$ruta_enviar = dirname(__DIR__) . '/enviar.php';

echo "=================================================\n";
echo "   EJECUTANDO PRUEBAS DE SEGURIDAD Y VALIDACIÓN  \n";
echo "=================================================\n\n";

$total_pruebas = 0;
$pruebas_exitosas = 0;
$pruebas_fallidas = 0;

/**
 * Función para ejecutar pruebas aisladas sobre el formulario y capturar su salida.
 */
function ejecutar_prueba($nombre_prueba, $datos_post, $textos_esperados_posibles) {
    global $ruta_enviar, $total_pruebas, $pruebas_exitosas, $pruebas_fallidas;
    
    $total_pruebas++;
    
    // Script que se ejecutará de forma aislada
    $codigo = '<?php
        $ruta = "' . addslashes($ruta_enviar) . '";
        $_SERVER["REQUEST_METHOD"] = "POST";
        $_POST = unserialize(\'' . str_replace("'", "\\'", serialize($datos_post)) . '\');
        ob_start();
        try {
            include $ruta;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        $output = ob_get_clean();
        echo empty(trim($output)) ? "redireccion_exitosa" : trim($output);
    ';
    
    $tmp_file = tempnam(sys_get_temp_dir(), 'test_php_');
    file_put_contents($tmp_file, $codigo);
    
    $resultado = shell_exec("php " . escapeshellarg($tmp_file));
    unlink($tmp_file);
    
    $resultado = trim($resultado);
    
    // Verificamos si el resultado contiene alguna de las cadenas esperadas
    $exito = false;
    foreach ($textos_esperados_posibles as $texto) {
        if (strpos($resultado, $texto) !== false) {
            $exito = true;
            break;
        }
    }
    
    echo "Prueba: " . $nombre_prueba . "\n";
    if ($exito) {
        $pruebas_exitosas++;
        echo " [ÉXITO] Comportamiento esperado verificado.\n";
    } else {
        $pruebas_fallidas++;
        echo "[FALLO] Resultado inesperado:\n";
        echo "     Se esperaba alguno de: " . json_encode($textos_esperados_posibles) . "\n";
        echo "     Se obtuvo: '" . $resultado . "'\n";
    }
    echo "-------------------------------------------------\n";
}

// 1. Prueba de campos obligatorios vacíos
ejecutar_prueba(
    "Validación de campos vacíos", 
    [ "nombre" => "", "email" => "", "mensaje" => "" ], 
    ["Todos los campos son requeridos"]
);

// 2. Prueba con Emojis en el texto (Anti-Emoji)
ejecutar_prueba(
    "Prevención de emojis en campos de texto", 
    [ "nombre" => "Hola", "apellido" => "Perez", "email" => "test@test.com", "telefono" => "123456", "programa" => "Sistemas", "asunto" => "Test", "mensaje" => "Hola 👽" ], 
    ["No se permiten emojis"]
);

// 3. Prueba con Emojis en el correo
ejecutar_prueba(
    "Prevención de emojis en el correo electrónico", 
    [ "nombre" => "Juan", "apellido" => "Perez", "email" => "correo🚀@test.com", "telefono" => "123456", "programa" => "Sistemas", "asunto" => "Test", "mensaje" => "Hola" ], 
    ["No se permiten emojis en el correo", "inválido"]
);

// 4. Prueba correo inválido sin emojis
ejecutar_prueba(
    "Validación de formato de correo", 
    [ "nombre" => "Juan", "apellido" => "Perez", "email" => "correosin-arroba.com", "telefono" => "123456", "programa" => "Sistemas", "asunto" => "Test", "mensaje" => "Hola" ], 
    ["Formato de correo electrónico inválido"]
);

// 5. Prueba de SQL Injection Clástico (Comillas y sentencias en el mensaje)
// Como estamos usando "Prepared Statements" (bind_param), la base de datos lo tomará
// como texto plano. Si la bd está caída arrojará "Error de conexión".
// Si funciona debe intentar hacer la inserción limpia que finaliza en redirección.
ejecutar_prueba(
    "Prevención de SQL Injection (Comillas y sentencias)", 
    [ 
        "nombre" => "Hacker", 
        "apellido" => "O'Connor",
        "email" => "hacker@test.com", 
        "telefono" => "12345",
        "programa" => "Sistemas",
        "asunto" => "Test",
        "mensaje" => "1'); DROP TABLE mensajes; --" 
    ], 
    ["redireccion_exitosa", "Error de conexión", "Error:"] 
);

// 6. Prueba de Nombre y Apellido conteniendo números
ejecutar_prueba(
    "Validación de nombre sin números ni caracteres especiales", 
    [ "nombre" => "Juan123", "apellido" => "Perez", "email" => "test@test.com", "telefono" => "123456", "programa" => "Sistemas", "asunto" => "Test", "mensaje" => "Hola" ], 
    ["Error: El nombre y apellido solo pueden contener letras."]
);

// 7. Prueba de Teléfono conteniendo letras
ejecutar_prueba(
    "Validación de teléfono solo numérico", 
    [ "nombre" => "Juan", "apellido" => "Perez", "email" => "test@test.com", "telefono" => "1234abc", "programa" => "Sistemas", "asunto" => "Test", "mensaje" => "Hola" ], 
    ["Error: El teléfono solo puede contener números."]
);

echo "=================================================\n";
echo "              RESUMEN DE PRUEBAS                 \n";
echo "=================================================\n";
echo "Total de pruebas ejecutadas: $total_pruebas\n";
echo "Pruebas con ÉXITO: $pruebas_exitosas\n";
echo "Pruebas con FALLO: $pruebas_fallidas\n";
echo "=================================================\n";
?>
