var totalVentasE = 0;
var totalCostosE = 0;
var totalUtilidadE = 0;

var filas=document.querySelectorAll("#tabla_ventas tbody tr");
    var total=0;
 
    // recorremos cada una de las filas
    filas.forEach(function(e) {
 
        // obtenemos las columnas de cada fila
        var columnas=e.querySelectorAll("td");
 
        // obtenemos los valores de la cantidad y importe
        var totalVentas=parseFloat(columnas[1].textContent);
        var costoVentas=parseFloat(columnas[2].textContent);
 
        // mostramos el total por fila
        columnas[3].textContent=(totalVentas - costoVentas).toFixed(2);
 
        //total+=cantidad*importe;
    });

    filas.forEach(function(e) {
 
        // obtenemos las columnas de cada fila
        var columnas=e.querySelectorAll("td");
 
        // obtenemos los valores de la cantidad y importe
        var totalVenta=parseFloat(columnas[1].textContent);
        var totalCosto=parseFloat(columnas[2].textContent);
        var totalUtilidad=parseFloat(columnas[3].textContent);

        //columnas[4].textContent=(totalVentas - totalCosto).toFixed(2);

        totalVentasE+=totalVenta; 
        totalCostosE+=totalCosto;
        totalUtilidadE+=totalUtilidad;
	});

document.getElementById("total_ventas").innerHTML = totalVentasE;
document.getElementById("total_costo_ventas").innerHTML = totalCostosE;
document.getElementById("total_utilidad_ventas").innerHTML = totalUtilidadE;

var total=0;
var totalVentas=0;
var totalCostos=0;
var totalUtilidades=0;

var filas=document.querySelectorAll("#table_products tbody tr");
 
    // recorremos cada una de las filas
    filas.forEach(function(e) {
 
        // obtenemos las columnas de cada fila
        var columnas=e.querySelectorAll("td");
 
        // obtenemos los valores de la cantidad y importe
        var cantidadVentas=parseFloat(columnas[1].textContent);
        var totalVenta=parseFloat(columnas[2].textContent);
        var totalCosto=parseFloat(columnas[3].textContent);
        var totalUtilidad=parseFloat(columnas[4].textContent);

        //columnas[4].textContent=(totalVentas - totalCosto).toFixed(2);

        total+=cantidadVentas;
        totalVentas+=totalVenta;
        totalCostos+=totalCosto;
        totalUtilidades+=totalUtilidad;
	});

document.getElementById("total_cantidad").innerHTML = total;
document.getElementById("total_venta").innerHTML = totalVentas;
document.getElementById("total_costo").innerHTML = totalCostos;
document.getElementById("total_utilidad").innerHTML = totalUtilidades;

filas.forEach(function(e) {
 
        // obtenemos las columnas de cada fila
        var columnas=e.querySelectorAll("td");
 
        // obtenemos los valores de la cantidad y importe
        var totalVenta=parseFloat(columnas[2].textContent);
        var totalCosto=parseFloat(columnas[3].textContent);

        columnas[4].textContent=(totalVenta - totalCosto).toFixed(2);
	});