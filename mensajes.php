<?php

include "conexion.php";

$sql = "SELECT * FROM mensajes";
$result = $conn->query($sql);

?>

<h2>Mensajes recibidos</h2>

<table border="1">

<tr>
<th>ID</th>
<th>Nombre</th>
<th>Apellido</th>
<th>Correo</th>
<th>Telefono</th>
<th>Programa</th>
<th>Mensaje</th>
<th>Fecha</th>
</tr>

<?php

while($row = $result->fetch_assoc()){
    echo "<tr>";
    echo "<td>".$row["id"]."</td>";
    echo "<td>".$row["nombre"]."</td>";
    echo "<td>".$row["apellido"]."</td>";
    echo "<td>".$row["email"]."</td>";
    echo "<td>".$row["telefono"]."</td>";
    echo "<td>".$row["programa"]."</td>";
    echo "<td>".$row["mensaje"]."</td>";
    echo "<td>".$row["fecha"]."</td>";
    echo "</tr>";
}

?>

</table>