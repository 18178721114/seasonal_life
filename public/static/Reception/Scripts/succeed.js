$(function(){
              $(".fruit-kinds .good-list ul li").hover(
               function(){
                $(this).children('.fruit-kinds .good-list ul li .wrap').stop().animate({"top":0}, 500)
               },
               function(){
                if($(this).hasClass('first'))
                {
                   $(this).children('.fruit-kinds .good-list ul li .wrap').stop().animate({"top":637}, 500)
                }
                else{
                $(this).children('.fruit-kinds .good-list ul li .wrap').stop().animate({"top":322}, 500)
              }  
            }                                        
          );

           $('.fruit-kinds .good-list ul li .wrap a span').click(function(event){
                $('.zhezhao').fadeIn(800);
                $('.shop-cart').fadeIn(800);
                 stopPropagation(event);  
              } 
            )

           $('.fruit-kinds .new-kind2 .good-list ul li .wrap a span').click(function(){
                  $('.zhezhao').fadeIn(800);
                  $('.shop-cart').fadeIn(800);
                }
              )
        }    
     );