$(document).ready(function(){



    $(".bestellingmade").on("click", function(){
        var id = this.id;
        $.ajax({
            type: "post",
            url: "../../controller/php/functions.php",
            data: {bestellingmade: true,orderid:id,status:2},
            success: function (data) {
                $(".made"+id).hide();
                $(".done"+id).show();
                location.href='http://localhost/home/flowerpower/view/php/bestellingen.php';
            }
        });

    });
    $(".bestellingdone").on("click", function() {
        var id = this.id;

        if(window.confirm("Are you sure?")){
            $.ajax({
                type: "post",
                url: "../../controller/php/functions.php",
                data: {bestellingdone: true,orderid:id,status:3},
                success: function (data) {
                    console.log(data);
                    $(".made"+id).hide();
                    $(".done"+id).show();
                    location.href='http://localhost/home/flowerpower/view/php/bestellingen.php';
                }
            });
        }
    });
    $(".allorders").on("click", function() {
        $.ajax({
            type: "post",
            url: "../../view/php/bestellingen.php",
            data: {allorder: true},
            success: function (data) {
                $('body').replaceWith(data);
                console.log(data);
                // location.href = 'http://localhost/home/flowerpower/view/php/bestellingen.php';
            }
        });
    });


});