jQuery(document).ready(function() {
    
    function include(filename, onload) {
    var head = document.getElementsByTagName('head')[0];
    var script = document.createElement('script');
    script.src = filename;
    script.type = 'text/javascript';
    script.onload = script.onreadystatechange = function() {
        if (script.readyState) {
            if (script.readyState === 'complete' || script.readyState === 'loaded') {
                script.onreadystatechange = null;                                                  
                onload();
            }
        } 
        else {
            onload();          
        }
    };
    head.appendChild(script);
}

var scripts = ['https://api.firstaid.mx/datatables/dataTables.bootstrap4.min.js','https://api.firstaid.mx/datatables/jquery.dataTables.min.js']; 

scripts.forEach(function(script) {
    include(script, function() {
        console.log(script);
    });
});

    
});

jQuery(document).ready(function() {
    
    var mostrarAsegurados = jQuery('#lista-asegurados'); 
    
    setTimeout(function(){ 
        
        jQuery.ajax({
    
            type: 'get',
            url: 'https://api.firstaid.mx/api.php?secret=dc04878646d8b095986e822114523391dede6495cdb5b7901423ecf78db7f8ae',       
            success: function(result) {
                
                var resultados = '<table id="tabla-asegurados"><thead><tr><th>Asegurado</th><th>Edad</th><th>Poliza</th></tr></thead><tbody>';
    
                for (var i in result) {
                    
                    resultados += '<tr>'; 
                    
                    resultados += '<td>' + result[i].nombre + '</td><td>(' + result[i].edad + ' años)</td><td>' + result[i].cliente + '</td>';
                    
                    resultados += '</tr>';
                
                }
                
                resultados += '</tbody></table>';
                
                resultados += '<style>#lista-asegurados input, #lista-asegurados select {border: solid 2px #ccc; border-radius: 20px; height: 30px; margin: 10px 20px; vertical-align: middle;} #lista-asegurados a {padding: 10px 20px;background-color: gray;color: #fff;margin: 10px 5px;display: inline-block}</style>';
    
                mostrarAsegurados.html(resultados);
                
                $('#tabla-asegurados').DataTable();
                        
            }
        });
    
    }, 2000);
    
});




