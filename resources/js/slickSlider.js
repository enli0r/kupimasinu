$(document).ready(function(){

    var slider = $('showImagesSlider').slick({    
    });

    $('.post-image').on("click", function() {
        $('.showImages').css('display', 'flex'); 
        $('.showImagesSlider').get(0).slick.setPosition()
    });

    $('.images-exit').on('click', function(){
        $('.showImages').css('display', 'none');
    })

    $('.showImagesSlider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: $('.prev'),
        nextArrow: $('.next'),
    });

    $('.showImages').on('click', function(e){
        if(e.target.nodeName.toLowerCase() !== 'img'){
            if(e.target.nodeName.toLowerCase() !== 'svg'){
                if(e.target.nodeName.toLowerCase() !== 'p'){
                    if(e.target.nodeName.toLowerCase() !== 'path'){
                    $('.showImages').css('display', 'none');
                    }
                }
            }
        }
    });

});

