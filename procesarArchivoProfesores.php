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
    $Profesor = $excel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
    $datosProfesor = explode(";", $Profesor);
    $codigoProfesor = $datosProfesor[0];
    if ($codigoProfesor != "") {
        $apellidosProfesor = $datosProfesor[1];
        $nombreProfesor = $datosProfesor[2];
        $emailProfesor = $datosProfesor[3];
        $celularProfesor = $datosProfesor[4];
        $cupoCreditoProfesor = $datosProfesor[5];

        $sql = "INSERT INTO profesores(id_profesor, apellidos_profesor, nombres_profesor, email_profesor, credito_profesor, contrasena_profesor, celular_profesor) VALUES ('$codigoProfesor','$apellidosProfesor','$nombreProfesor','$emailProfesor',$cupoCreditoProfesor,'1234','$celularProfesor')";
        var_dump($sql);
       $insertar_profesor = mysqli_query($db,$sql);

        header("Location: importarEstudiantes.php");
    }
}
