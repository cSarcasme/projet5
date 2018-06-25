$( document ).ready(function() {
    var img =$('.img-slide').length;;
    for(var i=1; i<=img; i++){
        $('#top-slide').append('<li class="t" data-slide="'+i+'"></li>');
   }
   var owl = $('.owl-carousel');
        owl.owlCarousel({
        items:5,
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true
    });
   $(".owl-carousel").owlCarousel();
   
});