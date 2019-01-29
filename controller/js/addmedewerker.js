$(document).ready(function() {
    var userid = '';
    $(".updatemedewerker").hide();

    $(document).on("click", ".userchange", function(e){
        userid = $(this).attr('id');

        setfield(userid,'voornaam');
        setfield(userid,'achternaam');
        setfield(userid,'email');
        setfield(userid,'geboortedatum');
        setfield(userid,'postcode');
        setfield(userid,'woonplaats');
        setfield(userid,'rolid');
        $(".wachtwoordarea ,.wachtwoordcheckarea,.registermedewerker").hide();
        $(".updatemedewerker").show();
    });
    $(document).on("click", ".updatemedewerker", function(e) {
        $.ajax({
            type: "post",
            url: "../../controller/php/functions.php",
            data: {update: true, voornaam:$("#voornaam").val(), achternaam:$("#achternaam").val(), email:$("#email").val(), geboortedatum:$("#geboortedatum").val(), postcode:$("#postcode").val(), woonplaats:$("#woonplaats").val(), functie:$("#rolid").val(),userid:userid},
            success: function (data) {
                if(data){
                    location.href='http://localhost/home/flowerpower/view/php/addmedewerker.php';
                }else{
                    alert('already existent email adress');
                }

            }
        });
    });
    $(document).on("click", ".registermedewerker", function(e) {
        console.log('test');
        $.ajax({
            type: "post",
            url: "../../controller/php/user.php",
            data: {register: true, voornaam:$("#voornaam").val(), achternaam:$("#achternaam").val(), email:$("#email").val(), geboortedatum:$("#geboortedatum").val(), postcode:$("#postcode").val(), woonplaats:$("#woonplaats").val(), functie:$("#rolid").val(), wachtwoord:$("#wachtwoord").val(), wachtwoordcheck:$("#wachtwoordCheck").val()},
            success: function (data) {
                console.log(data);
                if(data){
                    location.href='http://localhost/home/flowerpower/view/php/addmedewerker.php';
                }else{
                    alert('Email already in use');
                }
            }
        });
    });
    function setfield(userid,name){
        $("#"+name+"").val($("."+userid+name).text());

    }

});