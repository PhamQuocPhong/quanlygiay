
$(document).ready(function() {
    
    /* Every time the window is scrolled ... */
    $(window).scroll( function(){
    
        /* Check the location of each desired element */
        $('#mixedSlider1').each( function(i){
            
            var bottom_of_object = $(this).position().top + $(this).outerHeight() + 600;
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            
            /* If the object is completely visible in the window, fade it it */
            if( bottom_of_window  > bottom_of_object  ){
                
                $(this).animate({'opacity':'1'},2500);
                    
            }
            
        }); 

        $('#mixedSlider2').each( function(i){
            
            var bottom_of_object = $(this).position().top + $(this).outerHeight() + 900;
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            
            /* If the object is completely visible in the window, fade it it */
            if( bottom_of_window  > bottom_of_object  ){
                
                $(this).animate({'opacity':'1'},2500);
                    
            }
            
        }); 
    
    });
    
});