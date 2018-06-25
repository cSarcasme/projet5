    //variable global
    var i = 0; // init compt
    var slide = $('.slide');   // all slide
    var indexSlide = $('.slide').length -1  ;  // index of last element
    var currentSlide= $('.slide').eq(i); // target current image
    var carroussel = {
       diaporama: $('#slider'),
        
            //init of slider
        init: function () {
            slide.css({ 'display': 'none' }); //hide slide
            currentSlide.css({ 'display': 'block' }); //current image 0
           
            carroussel.autoSlider();
            carroussel.harrowLeft();
            carroussel.harrowRight();          
        },
            //harrow left slider
        harrowLeft: function () {
            $('#harrow_left').click(function () {
                ; //decrease
                if (i > 0) {
                    i--
                }
                else {
                    i = indexSlide;
                }
                slide.fadeOut();
                currentSlide = $('.slide').eq(i);
                currentSlide.fadeIn();
            })
        },
            //harrow right of slider
        harrowRight: function () {
            $('#harrow_right').click(function () {
                 // increase
                if (i < indexSlide) {
                    i++;
                    
                }
                else {
                    i = 0;
                }
                slide.fadeOut();
                currentSlide = $('.slide').eq(i);
                currentSlide.fadeIn();
            });
        },
            //slider automatic
       autoSlider: function () {
            setTimeout(function () {
                if (i < indexSlide) {
                    i++ // increase
                }
                else {
                    i = 0;
                }
                slide.css({ 'display': 'none' });
                currentSlide = $('.slide').eq(i);
                currentSlide.css({ 'display': 'block' });
                carroussel.autoSlider();
            }, 8000);
        },                       
    }
    
    $(function () {
        carroussel.init();
    });
    
    
    