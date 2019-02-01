$(document).ready( function(){
    $(".deleteprod").on('click', function(){
        if(window.confirm("Are you sure?")) {
            var itemid = this.id;
            $.ajax({
                type: "post",
                url: "../../controller/php/functions.php",
                data: {cancelorder: true, itemid: itemid},
                success: function (data) {
                    location.href = 'http://localhost/home/flowerpower/view/php/winkelwagen.php';

                }
            });
        }
    });
    $(".bestelbtn").on('click', function(){
        var orderdate = $("#orderdate").val();
        var totprijs = $(".totprijs").text();
        var ophaallocatie = $("#orderlocation").val();
        console.log(totprijs);
        orderdate =new Date(orderdate);
        var today = new Date();
        today.setHours(0,0,0,0);
        if(orderdate > today) {
            orderdate = orderdate.toISOString().slice(0, 19).replace('T', ' ').split(' ')[0];
            $.ajax({
                type: "post",
                url: "../../controller/php/functions.php",
                data: {bestel: true, ophaaldatum: orderdate,ophaallocatie:ophaallocatie,totprice: totprijs},
                success: function (data) {
                    if(data){
                        location.href = 'http://localhost/home/flowerpower/view/php/bestellingen.php';
                    }else{

                    }

                }
            });
        }else{
            alert('please select a date after today');
        }
    });
});