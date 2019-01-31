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
        orderdate =new Date(orderdate);
        var today = new Date();
        today.setHours(0,0,0,0);
        if(orderdate > today) {

        }else{
            alert('please select a date after today');
        }
    });
});