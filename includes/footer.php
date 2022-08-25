

<!-- BOOTSTRAP 4 SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script> 
function cargarAutos() {
    var array = ["Honda", "KIA", "Ford", "Nissan"];
    array.sort();
    addOptions("automovil", array);
}

function addOptions(domElement, array) {
    var selector = document.getElementsByName(domElement)[0];
    for (automovil in array) {
        var opcion = document.createElement("option");
        opcion.text = array[automovil];
        selector.add(opcion);
    }
}

function cargarModelos() {
    var listaModelos = {
    Honda: ["CRV", "HRV", "BRV"],
    KIA: ["SOUL", "RIO", "SPORTAGE"],
    Ford: ["MUSTANG", "ESCAPE", "FIESTA",],
    Nissan: ["VERSA","MARCH","SENTRA"],
    }
    
    var automovils = document.getElementById('automovil')
    var modelos = document.getElementById('modelo')
    var automovilSeleccionada = automovils.value

    modelos.innerHTML = '<option value="">Seleccione un modelo...</option>'
    
    if(automovilSeleccionada !== ''){

        automovilSeleccionada = listaModelos[automovilSeleccionada]
        automovilSeleccionada.sort()
    
        automovilSeleccionada.forEach(function(modelo){
        let opcion = document.createElement('option')
        opcion.value = modelo
        opcion.text = modelo
        modelos.add(opcion)
        });
    }
    
    }

cargarAutos();

</script>
</body>
</html>