  
$(document).ready(function() {

    var getURL = window.location + '/quantity';

  $('.value-plus').on('click', function (e) {

                var inputQty = $(this).parent().find('.value').find('input')[0];
                var newVal = parseInt(inputQty.value, 10) + 1;
                inputQty.value = newVal;

                var id = $(this).parent().find('.value').find('input')[2];

                var getID = id.value;

                unit_price = $('#unitprice' + getID).val();

                qty = $('#qty' + getID).val();

          
                e.preventDefault();
                $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                      }
                  });
         
                 $.ajax({
                    url: getURL,
                    method: 'post',
                    data: {
                       rowId: getID,
                       qty: qty,
                       unit_price: unit_price
                    },
                    success: function(result){

                      var split = result.split("|");
                      var total = split[0];
                      var qty = split[1];

                       $('.center-parent').show();

                          setTimeout(function() {

                            $('.center-parent').hide();                     

                       }, 1000);

                        setTimeout(function() {

                          $('.total-price span').show();
                          $('.total-price span').html(total);

                          $('.badge-number').show();
                          $('.badge-number').html(qty);                   

                       }, 1000);                
                       
                    } 
                  });

  });

      $('.value-minus').on('click', function (e) {

          var inputQty = $(this).parent().find('.value').find('input')[0];
          var newVal = parseInt(inputQty.value, 10) - 1;
          if (newVal >= 1) inputQty.value = newVal;

          var id = $(this).parent().find('.value').find('input')[2];

          var getID = id.value;

          unit_price = $('#unitprice' + getID).val();

          qty = $('#qty' + getID).val();
    
          e.preventDefault();
          $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
   
           $.ajax({
              url: getURL,
              method: 'post',
              data: {
                 rowId: getID,
                 qty: qty,
                 unit_price: unit_price
              },
              success: function(result){
                
                var split = result.split("|");
                var total = split[0];
                var qty = split[1];

                    $('.center-parent').show();

                    setTimeout(function() {

                          $('.center-parent').hide();                     

                     }, 1000);

                      setTimeout(function() {

                        $('.total-price span').show();
                        $('.total-price span').html(total);

                        $('.badge-number').show();
                        $('.badge-number').html(qty);                   

                     }, 1000);           
                                                    
             
              }
            });

      });
});