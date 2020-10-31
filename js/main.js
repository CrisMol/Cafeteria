// obtenemos todas las filas del tbody
    var filas=document.querySelectorAll("#tabla tbody tr");
    var total=0;
 
    // recorremos cada una de las filas
    filas.forEach(function(e) {
 
        // obtenemos las columnas de cada fila
        var columnas=e.querySelectorAll("td");
 
        // obtenemos los valores de la cantidad y importe
        var valorEfectivo=parseFloat(columnas[2].textContent);
        var valorProfesor=parseFloat(columnas[3].textContent);
        var valorEstudiante=parseFloat(columnas[4].textContent);
 
        // mostramos el total por fila
        columnas[6].textContent=(valorEfectivo+valorProfesor+valorEstudiante).toFixed(2);
 
        //total+=cantidad*importe;
    });
 
    // mostramos la suma total
    //var filas=document.querySelectorAll("#tabla tfoot tr td");
    //filas[1].textContent=total.toFixed(2);



/*

                    var valorEfectivo = document.getElementById("ventaEfectivo").innerHTML;
                	var valorProfesor = document.getElementById("ventaProfesor").innerHTML;
                	var valorEstudiante = document.getElementById("ventaEstudiante").innerHTML;

                	sumar(valorEfectivo, valorProfesor, valorEstudiante);

   



                function sumar(ventaEfectivo, ventaProfesor, ventaEstudiante){
                	var total = 0;	
    				valorEfectivo = parseFloat(ventaEfectivo);
    				valorProfesor = parseFloat(ventaProfesor);
    				valorEstudiante = parseFloat(ventaEstudiante);
	
    				total = document.getElementById('valorTotal').innerHTML;
	
				    Esta es la suma.
				    total = (valorEfectivo + valorProfesor + valorEstudiante);
					
				    // Colocar el resultado de la suma en el control "span".
				    document.getElementById('valorTotal').innerHTML = total;
                }*/