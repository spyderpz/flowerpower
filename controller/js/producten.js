$(document).ready(function(){
    $(".product-wrapper").on("click", function(){
      var title = $(this).find('.panel-heading').text();
      var img = $(this).find('.panel-body').html();
      var description = $(this).find('.panel-footer').text();

      $('.single-product').html('<div class="center"><div class="single-wrapper row"><div class="col-4"><div class="title-single">'+title+'</div><hr><div class="image">'+img+'</div></div><div class="col-6"><div class="description-single">'+description+'<button type="button">Click Me!</button></div></div></div></div>');
      $('.single-product').show();
      $('#overlay').show();
    });
});
