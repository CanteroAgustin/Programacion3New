<?php
echo "<h2>Aplicación Nº 12 (Arrays asociativos)</h2>";
echo "<h4>Descripcion: Realizar las líneas de código necesarias para generar un Array asociativo &#36;lapicera, que
contenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar tres
lapiceras.</h4>";
echo "<h4>Programa:</h4>";

$lapicera1 = array("color"=>"rojo","marca"=>"silvapen","trazo"=>"grueso","precio"=>"2.7");
$lapicera2 = array("color"=>"azul","marca"=>"pizzini","trazo"=>"grueso","precio"=>"4.5");
$lapicera3 = array("color"=>"verde","marca"=>"pizzini","trazo"=>"fino","precio"=>"3.1");

echo "<strong>Lapicera 1:</strong>"."<br/>";
foreach ($lapicera1 as $key => $value) {
    echo "<strong>".$key.":</strong>".$value."&nbsp";
}
echo "<br/><br/><strong>Lapicera 2:</strong><br/>";
foreach ($lapicera1 as $key => $value) {
    echo "<strong>".$key.":</strong>".$value."&nbsp";
}
echo "<br/><br/><strong>Lapicera 3:</strong><br/>";
foreach ($lapicera1 as $key => $value) {
    echo "<strong>".$key.":</strong>".$value."&nbsp";
}

?>