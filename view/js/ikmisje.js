// Deze js laat de woorden "Ik mis je!" zien in het tabje wanneer je de focus verliest op de pagina. 

jQuery(document).ready(function($){
    $.iMissYou({
        title: "Ik mis je!",
        favicon: {
            enabled: true,
            src:'../../model/img/logo/favicon.ico'
        }
    });
});
