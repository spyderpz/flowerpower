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
});