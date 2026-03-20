<?php
include "conexion.php";
$sql = "SELECT * FROM mensajes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mensajes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">

<div class="max-w-7xl mx-auto px-6 py-16">

    <h2 class="text-3xl font-bold text-center text-blue-900 mb-10">
        Mensajes recibidos
    </h2>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-2xl shadow-lg overflow-hidden">
            
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="py-3 px-4 text-left">ID</th>
                    <th class="py-3 px-4 text-left">Nombre</th>
                    <th class="py-3 px-4 text-left">Apellido</th>
                    <th class="py-3 px-4 text-left">Correo</th>
                    <th class="py-3 px-4 text-left">Teléfono</th>
                    <th class="py-3 px-4 text-left">Programa</th>
                    <th class="py-3 px-4 text-left">Mensaje</th>
                    <th class="py-3 px-4 text-left">Fecha</th>
                </tr>
            </thead>

            <tbody>
                <?php while($row = $result->fetch_assoc()){ ?>
                    <tr class="border-b hover:bg-gray-100 transition">
                        <td class="py-3 px-4"><?php echo $row["id"]; ?></td>
                        <td class="py-3 px-4"><?php echo $row["nombre"]; ?></td>
                        <td class="py-3 px-4"><?php echo $row["apellido"]; ?></td>
                        <td class="py-3 px-4"><?php echo $row["email"]; ?></td>
                        <td class="py-3 px-4"><?php echo $row["telefono"]; ?></td>
                        <td class="py-3 px-4"><?php echo $row["programa"]; ?></td>
                        <td class="py-3 px-4"><?php echo $row["mensaje"]; ?></td>
                        <td class="py-3 px-4"><?php echo $row["fecha"]; ?></td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>
    </div>

    <!-- Botón volver -->
    <div class="text-center mt-10">
        <a href="index.html"
           class="inline-block bg-yellow-400 text-blue-900 font-bold px-8 py-3 rounded-full hover:brightness-110 transition shadow-md">
            Volver al inicio
        </a>
    </div>

</div>

</body>
</html>