var total=0;

var filas=document.querySelectorAll("#table_credit tbody tr");
 
    // recorremos cada una de las filas
    filas.forEach(function(e) {
 
        // obtenemos las columnas de cada fila
        var columnas=e.querySelectorAll("td");
 
        // obtenemos los valores de la cantidad y importe
        var totalCredito=parseFloat(columnas[2].textContent);

        //columnas[4].textContent=(totalVentas - totalCosto).toFixed(2);

        total+=totalCredito;
	});

document.getElementById("total_credito").innerHTML = total;