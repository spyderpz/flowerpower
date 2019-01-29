$(document).ready(function(){
    $(".product-wrapper").on("click", function(){
      var title = $(this).find('.panel-heading').text();
      var img = $(this).find('.panel-body').html();
      var description = $(this).find('.panel-footer').text();

      $('.single-product').html('<div class="single-wrapper"><div class="title-single">'+title+'</div><div class="image">'+img+'</div><div class="description-single">'+description+'</div></div>');
      $('.single-product').show();
      $('#overlay').show();
    });
});
