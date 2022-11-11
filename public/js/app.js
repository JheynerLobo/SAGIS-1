
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

function cargarPrincipalJobs(){
    desactivarInputLugares();
    desactivarInputDatosLab();
}

function desactivarInputDatosLab() {
    document.getElementById("name_compamy").style.display = "none";
    document.getElementById("email_company").style.display = "none";
    document.getElementById("address_company").style.display = "none";
    document.getElementById("phone_company").style.display = "none";
    
    document.getElementById('name_compamy_input').disabled = true;
    document.getElementById('email_company_input').disabled = true;
    document.getElementById('address_company_input').disabled = true;
    document.getElementById('phone_company_input').disabled = true;
}


function seleccionarNoExisteJobs() {
    let empresas = document.getElementById('empresas');
    let valueSelect = empresas.value;

    if (valueSelect == "-2") {

        /* mostrarDatosEmpresas(); */
        document.getElementById("name_compamy").style.display =  "block"; 
        document.getElementById("email_company").style.display =  "block"; 
        document.getElementById("address_company").style.display =  "block"; 
        document.getElementById("phone_company").style.display =  "block"; 
        
            
        document.getElementById('name_compamy_input').disabled = false;
        document.getElementById('email_company_input').disabled = false;
        document.getElementById('address_company_input').disabled = false;
        document.getElementById('phone_company_input').disabled = false;

    } else {
        document.getElementById("name_compamy").style.display = "none";
        document.getElementById("email_company").style.display = "none";
        document.getElementById("address_company").style.display = "none";
        document.getElementById("phone_company").style.display = "none";

        document.getElementById('name_compamy_input').value = "";
        document.getElementById('email_company_input').value = "";
        document.getElementById('address_company_input').value = "";
        document.getElementById('phone_company_input').value = "";


        document.getElementById('name_compamy_input').disabled = true;
        document.getElementById('email_company_input').disabled = true;
        document.getElementById('address_company_input').disabled = true;
        document.getElementById('phone_company_input').disabled = true;

    }
    //console.log(valueSelect)
}
