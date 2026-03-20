<?php
include "conexion.php";
$sql = "SELECT * FROM mensajes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Mensajes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        lasalle: {
                            blue: '#003057',
                            gold: '#f8a700',
                            gray: '#595959',
                        }
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="css/styles.css" />
    <!--Librería para Iconos de Redes Sociales-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <style>
        /* Barra de Navegación */
        .navbar-fixed {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }
        body {
            padding-top: 64px;
        }
        
        /*Suavizar Scroll*/
        html {scroll-behavior: smooth;}

        /*Redes Sociales del Footer*/
        .social-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 1.5px solid rgba(255, 255, 255, 0.3);
            transition: background 0.2s, border-color 0.2s, transform 0.2s;
            color: white;
        }
        /*Filas en la tabla*/
        tbody tr:nth-child(even) { background-color: #f8f9fa; }
        .social-icon:hover {
            background: #f8a700;
            border-color: #f8a700;
            color: #003057;
            transform: translateY(-3px);
        }
        .social-icon i { font-size: 16px; }

        /*Link de Navegación*/
        .nav-link {
            position: relative;
            padding-bottom: 2px;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: #f8a700;
            transition: width 0.25s ease;
        }
        .nav-link:hover::after {width: 100%;}
    </style>

</head>

<body class="bg-gray-50 font-sans text-lasalle-gray">

    <!--Barra de Navegación-->
    <nav class="navbar-fixed bg-lasalle-blue shadow-lg" style="height:64px;">
        <div class="max-w-7xl mx-auto px-6 h-full flex justify-between items-center">
        <a href="index.html">
            <img src="img/Logo_Lasalle.png" alt="Universidad de La Salle" class="h-10 w-auto object-contain" />
        </a>
        <ul class="flex gap-8 text-sm font-semibold text-white tracking-wide" >
            <li><a href="index.html" class="nav-link hover:text-lasalle-gold transition">Inicio</a></li>
            <li><a href="contacto.html" class="nav-link hover:text-lasalle-gold transition">Contacto</a></li>
            <li><a href="mensajes.php" class="nav-link hover:text-lasalle-gold transition"> Ver mensajes</a></li>
        </ul>
        </div>
    </nav>

    <!--ENCABEZADO-->
    <section class="bg-lasalle-blue text-white py-14 px-6 text-center">
        <h1 class="text-3xl md:text-4xl font-bold">Mensajes Recibidos</h1>
        <p class="text-blue-200 mt-2 text-base">Universidad de La Salle</p>
    </section>

    <!--CONTENIDO-->
    <main class="max-w-7xl mx-auto py-6 px-12">

        <!--Botón para volver a la página de Inicio-->
        <a href="index.html"
            class="inline-flex items-center gap-1 text-lasalle-blue font-semibold hover:text-lasalle-gold transition mb-8 text-sm">
        Volver a la página de inicio
        </a>

        <!-- Contador de mensajes -->
        <div class="mb-6 flex items-center gap-2">
            <span class="bg-lasalle-blue text-white text-xs font-bold px-3 py-1 rounded-full">
            <?php echo $result->num_rows; ?> mensaje(s) registrado(s)
            </span>
        </div>

        <!--Tabla-->
        <div class="overflow-x-auto rounded-2xl shadow-md border border-gray-200">
            <table class="min-w-full bg-white overflow-hidden">
            
                <thead style="background-color:#003057;" class="text-white">
                    <tr>
                        <th class="py-4 px-5 text-left text-xs font-bold tracking-wider uppercase">ID</th>
                        <th class="py-4 px-5 text-left text-xs font-bold tracking-wider uppercase">Nombre</th>
                        <th class="py-4 px-5 text-left text-xs font-bold tracking-wider uppercase">Apellido</th>
                        <th class="py-4 px-5 text-left text-xs font-bold tracking-wider uppercase">Correo</th>
                        <th class="py-4 px-5 text-left text-xs font-bold tracking-wider uppercase">Teléfono</th>
                        <th class="py-4 px-5 text-left text-xs font-bold tracking-wider uppercase">Programa</th>
                        <th class="py-4 px-5 text-left text-xs font-bold tracking-wider uppercase">Mensaje</th>
                        <th class="py-4 px-5 text-left text-xs font-bold tracking-wider uppercase">Fecha</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while($row = $result->fetch_assoc()): ?>
                            <tr class="border-b border-gray-100 hover:bg-yellow-50 transition">
                                <td class="py-3 px-5 text-sm text-lasalle-gray"><?php echo htmlspecialchars($row["id"]); ?></td>
                                <td class="py-3 px-5 text-sm font-medium text-lasalle-blue"><?php echo htmlspecialchars($row["nombre"]); ?></td>
                                <td class="py-3 px-5 text-sm font-medium text-lasalle-blue"><?php echo htmlspecialchars($row["apellido"]); ?></td>
                                <td class="py-3 px-5 text-sm text-lasalle-gray"><?php echo htmlspecialchars($row["email"]); ?></td>
                                <td class="py-3 px-5 text-sm text-lasalle-gray"><?php echo htmlspecialchars($row["telefono"]); ?></td>
                                <td class="py-3 px-5 text-sm">
                                    <span class="bg-blue-50 text-lasalle-blue text-xs font-semibold px-2 py-1 rounded-full border border-blue-200">
                                        <?php echo htmlspecialchars($row["programa"]); ?>
                                    </span>    
                                </td>
                                <td class="py-3 px-5 text-sm text-lasalle-gray max-w-xs truncate"><?php echo htmlspecialchars($row["mensaje"]); ?></td>
                                <td class="py-3 px-5 text-sm text-lasalle-gray whitespace-nowrap"><?php echo htmlspecialchars($row["fecha"]); ?></td>
                            </tr>
                        <?php endwhile; ?>

                    <?php else: ?>

                    <!--Si todavía no hay mensajes-->
                    <tr>
                        <td colspan="8" class="py-16 text-center text-lasalle-gray">
                            <div class="flex flex-col items-center gap-3">
                                <i class="fa-regular fa-envelope-open text-4xl text-gray-300"></i>
                                <p class="text-base font-medium">No hay mensajes registrados todavía</p>
                                <p class="text-sm text-gray-400">Los mensajes enviados desde el formulario aparecerán aquí</p>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>

                </tbody>

            </table>
        </div>

        <!-- Botón volver -->
        <div class="text-center mt-10">
            <a href="index.html"
                class="inline-block bg-lasalle-gold text-lasalle-blue font-bold px-10 py-3 rounded-full hover:brightness-110 transition shadow-md text-base">
                Volver al inicio
            </a>
        </div>

    </main>

    <!--PIE DE PÁGINA-->
    <footer class="bg-lasalle-blue text-white py-8 px-6 mt-8">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-6">
            
            <!--Logo del Footer-->
            <div class="flex-shrink-0">
                <img src="img/Logo_Lasalle_Footer.png"
                    alt="Universidad de La Salle"
                    class="h-12 w-auto object-contain" />
            </div>

            <!--Redes Sociales-->
            <div class="flex items-center gap-3">
                <a href="https://www.facebook.com/U.deLaSalle" target="_blank" rel="noopener" class="social-icon" aria-label="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://www.instagram.com/unisallecol/" target="_blank" rel="noopener" class="social-icon" aria-label="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://x.com/unisalle?lang=es" target="_blank" rel="noopener" class="social-icon" aria-label="X (Twitter)">
                    <i class="fab fa-x-twitter"></i>
                </a>
                <a href="https://www.linkedin.com/school/unisalle/posts/?feedView=all" target="_blank" rel="noopener" class="social-icon" aria-label="LinkedIn">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="https://www.tiktok.com/@unisalle" target="_blank" rel="noopener" class="social-icon" aria-label="TikTok">
                    <i class="fab fa-tiktok"></i>
                </a>
                <a href="https://www.youtube.com/@Lasallistas" target="_blank" rel="noopener" class="social-icon" aria-label="YouTube">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>

            <!--Copyright-->
            <p class="text-sm text-blue-200 text-center md:text-right">
                © Copyright 2026<br/>
                <span class="font-semibold text-white">UNIVERSIDAD DE LA SALLE</span>
            </p>

        </div>
    </footer>

</body>
</html>