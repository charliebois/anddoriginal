$(function () {});


$(window).load(function () {
    $('.flexslider').flexslider({
        animation: "slide",
        animationLoop: true,
        move: 1,
        // smoothHeight: true,  
        start: function (slider) {
            $('body').removeClass('loading');
        }
        
        




    });


    $(document).ready(function () {
    	
    	
      	
		var handlers = [
		// on first click:
		function() {
		$('#site').animate({left: "200px"}, 500);
		},
		// on second click:
		function() {
		$('#site').animate({left: "0px"}, 500);
		}
		// ...as many more as you want here
		];
		
		
		var counter = 0;
		$(".btn").click(function() {
		// call the appropriate function preserving this and any arguments
		handlers[counter++].apply(this, Array.prototype.slice.apply(arguments));
		// "wrap around" when all handlers have been called
		counter %= handlers.length;
		});
		
		$(".slides li img").each(function (index) {
        var url = $(this).attr('src');
        //alert(url);
		$(this).parent().addClass('fancybox-media');
        $(this).parent().parent().css('background-image', 'url(' + url + ')');
        $(this).remove();

    	});
        

        $('.fancybox').fancybox();

        /*
         *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
         */
        $('.fancybox-media')
            .attr('rel', 'media-gallery')
            .fancybox({
                openEffect: 'none',
                closeEffect: 'none',
                prevEffect: 'none',
                nextEffect: 'none',

                arrows: false,
                helpers: {
                    media: {},
                    buttons: {}
                }
            });
    });

  
    	var i = 0; 
		(function displayImages() {
         $('.products li').eq(i++).fadeIn(300, displayImages);
      	})();


});