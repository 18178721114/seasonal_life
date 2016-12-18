$(function(){ 
             $('.f-list .leftpart .p-operate .s-che,.fruit-kinds .good-list ul li .s-info .s-che,.qx-content .qx-cor .qx-cont .qx-info .cart').click(
                function(){
                  $(this).animate({backgroundPosition:"-514px -291px"},500);
                  $('.zhezhao').fadeIn(800);
                  $('.shop-cart').fadeIn(800);                         
                }
              )

            $('.shop-cart .shop-top .cha').click(
              function(){
                $('.shop-cart').fadeOut(800);
                $('.zhezhao').fadeOut(800);
                $('.f-list .leftpart .p-operate .s-che,.fruit-kinds .good-list ul li .s-info .s-che,.qx-content .qx-cor .qx-cont .qx-info .cart').animate({backgroundPosition:"-517px -243px"},500);  
              }
          )
        }    
    );