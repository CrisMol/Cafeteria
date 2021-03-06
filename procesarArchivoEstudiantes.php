<?php

require 'PHPExcel/Classes/PHPExcel.php';
require 'include/conexion.php';

$nombre=$_FILES['archivo']['name'];
$guardado=$_FILES['archivo']['tmp_name'];

if(!file_exists('archivos')){
	mkdir('archivos',0777,true);
	if(file_exists('archivos')){
		if(move_uploaded_file($guardado, 'archivos/'.$nombre)){
			
		}else{
			
		}
	}
}else{
	if(move_uploaded_file($guardado, 'archivos/'.$nombre)){
		
	}else{
		
	}
}


$archivo = 'archivos/'.$nombre;
//$archivo = fopen("plantillaImportarEstudiantes.csv", "r");
$excel = PHPExcel_IOFactory::load($archivo);

//Cargar la hoja de cálculo
$excel -> setActiveSheetIndex(0);

//Obtener el número de filas de nuestro archivo
$numeroFilas = $excel -> setActiveSheetIndex(0) -> getHighestRow();

//echo $numeroFilas;


for($i = 2; $i <= $numeroFilas; $i++){
    $Estudiante = $excel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
    $datosEstudiante = explode(";", $Estudiante);
    $idFamilia = $datosEstudiante[0];
    if ($idFamilia != "") {
        $nombreFamilia = $datosEstudiante[1];
        $codigoEstudiante = $datosEstudiante[2];
        $apellidosEstudiante = $datosEstudiante[3];
        $nombresEstudiante = $datosEstudiante[4];
        $grado = $datosEstudiante[5];
        $sexo = $datosEstudiante[6];
        $emailFamilia = $datosEstudiante[7];
        $celularFamilia = $datosEstudiante[8];

        $sql_grado = "SELECT id_grado AS CODIGO_GRADO FROM grados WHERE nombre_grado = '$grado'";
        $grado_select = mysqli_query($db,$sql_grado);

        if (mysqli_num_rows($grado_select)==0) {
        	$sql_insertar_grado = "INSERT INTO grados(nombre_grado) VALUES('$grado')";
        	$grado_insert = mysqli_query($db,$sql_insertar_grado);
        }

        $sql_familia = "SELECT id_familia AS CODIGO FROM familias WHERE id_familia = '$idFamilia'";
        $res=mysqli_query($db,$sql_familia);

        if(mysqli_num_rows($res)==0){ //La familia no existe
            $sql_insert_familia = "INSERT INTO familias(id_familia, nombre_familia, email_familia, celular_familia) VALUES('$idFamilia', '$nombreFamilia', '$emailFamilia', '$celularFamilia')";
            $insertar_familia=mysqli_query($db,$sql_insert_familia);
        }

        $sql_grado = "SELECT id_grado AS CODIGO_GRADO FROM grados WHERE nombre_grado = '$grado'";
        $grado_select = mysqli_query($db,$sql_grado);
        while($row=mysqli_fetch_assoc($grado_select)){
  			$grado=$row['CODIGO_GRADO'];
		}

        $sql_insert_estudiante = "INSERT INTO estudiantes(id_estudiante, id_grado, id_familia, apellidos_estudiante, nombres_estudiante, sexo_estudiante, maximo_compras) VALUES($codigoEstudiante, $grado, '$idFamilia', '$apellidosEstudiante', '$nombresEstudiante', '$sexo', 'Ilimitado')";
        $insertar_estudiante=mysqli_query($db,$sql_insert_estudiante);


        header("Location: importarEstudiantes.php");
    }
}
