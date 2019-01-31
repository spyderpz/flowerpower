$(document).ready(function(){
    $(".product-wrapper").on("click", function(){
        var id = this.id;
        var title = $(this).find('.panel-heading').text();
        var img = $(this).find('.panel-body').html();
        var description = $(this).find('.panel-footer').text();

        $('.single-product').html('<div class="center"><div class="single-wrapper row"><div class="col-4"><div class="title-single">'+title+'</div><hr><div class="image">'+img+'</div></div><div class="col-6"><div class="description-single">'+description+'<br><input type="number" class="flowerquantity'+id+'" min="1" max="100" value="1"><button type="button" class="addtocart">Toevoegen aan winkelwagen!</button></div></div><a href="producten.php" class="exit">X</a></div></div>');
        $('.single-product').show();
        $('#overlay').show();



        $(".addtocart").on("click", function() {
            var amount = $('.flowerquantity'+id).val();
            console.log(amount);
            $.ajax({
                type: "post",
                url: "../../controller/php/functions.php",
                data: {addtocart: true,prodid:id,amount:amount},
                success: function (data) {
                    $('.single-product').hide();
                    $('#overlay').hide();
                    alert('Added '+amount+ ' '+ title+ ' to your shopping cart ');
                }
            });
        });
    });
});
