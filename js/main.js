
// Menu

let enlacesHeader = document.querySelectorAll(".enlaces-header")[0];
let semaforo = true;

document.querySelectorAll(".hamburguer")[0].addEventListener("click", function(){
    if(semaforo){
        document.querySelectorAll(".hamburguer")[0].style.color ="#fff";
        semaforo= false;
    }else{
        document.querySelectorAll(".hamburguer")[0].style.color ="#000";
        semaforo= true;
    }

    enlacesHeader.classList.toggle("menudos")
})

//Bd

$(buscar_datos());

function buscar_datos(consulta){
    $.ajax({
        url: "/busqueda.php",
        type: "POST",
        dataType: "html",
        data: {consulta: consulta},
    })
    .done(function(respuesta) {
        $("#datos").html(respuesta);
    })
    .fail(function(){
        console.log("error");
    })
}

$(document).on("keyup", "#caja_busqueda", function(){
    var valor = $(this).val();
    if (valor != ""){
        buscar_datos(valor);
    } else {
        buscar_datos();
    }
});
