
function cargarPrincipal() {
    desactivarInputLugares();
    //console.log('Probando')
}


function desactivarInputLugares() {
    document.getElementById("country").style.display = "none";
    document.getElementById("state").style.display = "none";
    document.getElementById("city").style.display = "none";
    
    document.getElementById('country_input').disabled = true;
    document.getElementById('state_input').disabled = true;
    document.getElementById('city_input').disabled = true;
}


function seleccionarNoExiste() {
    let lugaresUni = document.getElementById('lugares_u');
    let valueSelect = lugaresUni.value;

    if (valueSelect == "-2") {

        /* mostrarLugares(); */
        document.getElementById("country").style.display = "block";
        document.getElementById("state").style.display = "block";
        document.getElementById("city").style.display = "block";

        document.getElementById('country_input').disabled = false;
        document.getElementById('state_input').disabled = false;
        document.getElementById('city_input').disabled = false;

    } else {
        document.getElementById("country").style.display = "none";
        document.getElementById("state").style.display = "none";
        document.getElementById("city").style.display = "none";

        document.getElementById('country_input').value = "";
        document.getElementById('state_input').value = "";
        document.getElementById('city_input').value = "";

        document.getElementById('country_input').disabled = true;
        document.getElementById('state_input').disabled = true;
        document.getElementById('city_input').disabled = true;

    }
    //console.log(valueSelect)
}

