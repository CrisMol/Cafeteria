<?php

require 'PHPExcel/Classes/PHPExcel.php';
require 'include/conexion.php';

//$archivo = "plantillaImportarEstudiantes.csv";
$archivo = fopen("plantillaImportarEstudiantes.csv", "r");
//$excel = PHPExcel_IOFactory::load($archivo);

//Cargar la hoja de cálculo
//$excel -> setActiveSheetIndex(0);

//Obtener el número de filas de nuestro archivo
//$numeroFilas = $excel -> setActiveSheetIndex(0) -> getHighestRow();

//echo $numeroFilas;


while(($datos = fgetcsv($archivo, ",")) == true) {
    $idFamilia = $datos[1];
    if ($idFamilia != "") {
        $nombreFamilia = $datos[1];
        $codigoEstudiante = $datos[1];
        $apellidosEstudiante = $datos[1];
        $nombresEstudiante = $datos[1];
        $grado = $datos[1];
        $sexo = $datos[1];
        $emailFamilia = $datos[1];
        $celularFamilia = $datos[1];

        $sql_familia = "SELECT id_familia AS CODIGO FROM familias WHERE id_familia = '$idFamilia'";
        var_dump($sql_familia);
        $res=mysqli_query($db,$sql_familia);

        if(mysqli_num_rows($res)==0){ //La familia no existe
            $sql_insert_familia = "INSERT INTO familas(id_familia, nombre_familia, email_familia, celular_familia) VALUES($idFamilia, $nombreFamilia, $emailFamilia, $celularFamilia)";
            $sql_insert_familia = str_replace(';',',', $sql_insert_familia);
            $insertar_familia=mysqli_query($db,$sql_insert_familia);
            var_dump($sql_insert_familia);
        }

        $sql_grado = "SELECT id_grado AS CODIGO_GRADO FROM grados WHERE nombre_grado = '$grado'";
        $grado = mysqli_query($db,$sql_grado);
        if (mysqli_num_rows($grado)==0) {
            $grado = 1;
        }

        $sql_insert_estudiante = "INSERT INTO estudiantes(id_estudiante, id_grado, id_familia, apellidos_estudiante, nombres_estudiante, sexo_estudiante, maximo_compras) VALUES($codigoEstudiante, $grado, $idFamilia, $apellidosEstudiante, $nombresEstudiante, $sexo, 'Ilimitado')";
        $sql_insert_estudiante = str_replace(';',',', $sql_insert_estudiante);

        $insertar_estudiante=mysqli_query($db,$sql_insert_estudiante);
    }
}
