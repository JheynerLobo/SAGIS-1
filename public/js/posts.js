function cargarPrincipal(){
    let categorias = document.getElementById('categories');
    let valueSelect = categorias.value;
    if (valueSelect == "4") {

        document.getElementById("videoP").style.display = "none";
    }
    if (valueSelect == "5") {
        document.getElementById('inputImage').required = false;
 

    }
    
   /*  if(valueSelect != "5"){
        document.getElementById('inputImage').required = true;
    } */

}


function seleccionarCategoria() {
    let categorias = document.getElementById('categories');
    let valueSelect = categorias.value;
    console.log(valueSelect=="5")

    if (valueSelect == "5") {

        document.getElementById("imageP").style.display = "none";
        document.getElementById("videoP").style.display = "block";
       // document.getElementById("videoP").style.display = "block";


       //document.querySelector('#inputImage').required = false;

        if( document.getElementById('inputImage') ) { 
            document.getElementById('inputImage').required = false;
        }else{
            console.log('probando')
        }

        document.getElementById('inputVideo').required = true;

        
       
        
 
    } else if(valueSelect == "4"){
        document.getElementById("imageP").style.display = "block";
       document.getElementById("videoP").style.display = "none";

       document.getElementById('inputVideo').required = false;

       if( document.getElementById('inputImage') ) { 
        document.getElementById('inputImage').required = true;

    }



      /*   document.getElementById('imageP').value = "";


        document.getElementById('imageP').disabled = true; */


    }else{

        document.getElementById("imageP").style.display = "block";
        document.getElementById("videoP").style.display = "block";
        if( document.getElementById('inputImage') ) { 
            document.getElementById('inputImage').required = true;
        }

        document.getElementById('inputVideo').required = false;
    }
    //console.log(valueSelect)
}


function cargarPrincipal2(){
    let categorias = document.getElementById('categories');
    let valueSelect = categorias.value;
    if (valueSelect == 4) {

        document.getElementById("videoP").style.display = "none";
        document.getElementById('videoInput').required = false;
 

    }
    if (valueSelect == 5) {
        document.getElementById('inputImage').required = false;
        document.getElementById('videoInput').required = true;
 

    }
    
   /*  if(valueSelect != "5"){
        document.getElementById('inputImage').required = true;
    } */

}



function seleccionarCategoria2() {
    let categorias = document.getElementById('categories');
    let valueSelect = categorias.value;
     console.log(valueSelect)

    //console.log(valueSelect == 5)

    if (valueSelect == 5) {

        document.getElementById("imageP").style.display = "none";
        document.getElementById("videoP").style.display = "block";

    console.log(document.getElementById('videoInput') );
        if( document.getElementById('videoInput') )  document.getElementById('videoInput').required = true;
       // document.getElementById("videoP").style.display = "block";


       //document.querySelector('#inputImage').required = false;

        if( document.getElementById('inputImage') ) { 
            document.getElementById('inputImage').required = false;
        }
        
 
    } else if(valueSelect == 4){

        if( document.getElementById('videoInput') ){
            document.getElementById('videoInput').required = false;
           } 
    
        document.getElementById("imageP").style.display = "block";
       document.getElementById("videoP").style.display = "none";


       
       if( document.getElementById('inputImage') ) { 
        document.getElementById('inputImage').required = true;
    }

      /*   document.getElementById('imageP').value = "";


        document.getElementById('imageP').disabled = true; */


    }else{

        document.getElementById("imageP").style.display = "block";
        document.getElementById("videoP").style.display = "block";

        if( document.getElementById('videoInput') )  document.getElementById('videoInput').required = false;
        
        if( document.getElementById('inputImage') ) { 
            document.getElementById('inputImage').required = true;
        }
    }
    //console.log(valueSelect)
}

