$(document).ready(function() {
    $(document).on("click", ".logout", function(){
        $.ajax({
            type: "post",
            url: "../../controller/php/user.php",
            data: {logout: true},
            success: function (data) {
                location.href='http://localhost/home/flowerpower/view/php/index.php';
            }
        });
    });
});