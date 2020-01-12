 $('#payment').click(function(e){

              var name = $('#name').val();
              var phone = $('#phone-number').val();
              var address = $('#address').val();

              var getURL = window.location + '/payment';
              var checkout = $('.checkout .checkout-right .checkout-product');

              var note = $('#note').val();
              success = 'Đặt hàng thành công';

              if(name == '')
              {
                 alert('Bạn vui lòng điền đầy đủ thông tin!');
              }
              else if(phone == '')
              {
                 alert('Bạn vui lòng điền đầy đủ thông tin!');
              }
              else if(address == '')
              { 
                 alert('Bạn vui lòng điền đầy đủ thông tin!');
              }
              else{
                   e.preventDefault();

                   $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                      }
                  });

                   $.ajax({
                          url: getURL,
                          method: 'POST',

                          data: {
                             note: note

                          },
                          success: function(result){
                              
                              checkout.hide();

                              alert(success);

                              window.location = url('/user/ordering'); 
                          }
                      });
                 }
            
});