var filas=document.querySelectorAll("#tabla_cuadre tbody tr");
    var total=0;
 
    // recorremos cada una de las filas
    filas.forEach(function(e) {
 
        // obtenemos las columnas de cada fila
        var columnas=e.querySelectorAll("td");
 
        // obtenemos los valores de la cantidad y importe
        var ventasEfectivo=parseFloat(columnas[1].textContent);
        var pagoProveedores=parseFloat(columnas[2].textContent);
 
        // mostramos el total por fila
        columnas[3].textContent=(ventasEfectivo - pagoProveedores).toFixed(2);
 
        //total+=cantidad*importe;

        var TotalEfectivo=parseFloat(columnas[4].textContent);
        var EfectivoReportado=parseFloat(columnas[3].textContent);

        columnas[5].textContent=(TotalEfectivo - EfectivoReportado).toFixed(2);
    });