<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">

  <meta id="token" name="_token" content="{{csrf_token()}}" />
  
	<title>Shop giay.vn</title>

  <link rel="stylesheet"  href="{{asset('css/bootstrap.css')}}">
  @include('layouts.elements.script')
  <link rel="stylesheet"  href="{{asset('css/tab-panel.css')}}">
	<link rel="stylesheet"  href="{{asset('font-awesome/css/font-awesome.css')}}">

  <link rel="stylesheet" href="{{asset('material-design-iconic-font/css/material-design-iconic-font.css')}}">

  <script src="{{asset('js/jquery.min.js')}}"></script> 
	<script type="text/javascript" src="{{asset('js/scrolls.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/jquery.multipurpose_tabcontent.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/bootbox.min.js')}}"></script>
    
</head>

<body>


		@include('layouts.header')

    <?php 

    ?>

    <div class="checkout">
      <div class="container">
            <div class="checkout-left">
                <section>

                        <h3 > <i class="zmdi zmdi-pin"></i>
                             Thông tin người nhận</h3>  

                   <div class="customer-info">

                      
                      @if(!empty($user->HoTen) && !empty($user->DienThoai) && !empty($user->DiaChi) )

                        <div class="info">
                            <div class="form-group">
                              <label>Họ Tên: </label>
                                <p>{{$user->HoTen}}</p>

                              </div>

                            <div class="form-group">
                                <label>Số điện thoại: </label>
                               <p>{{$user->DienThoai}}</p>

                            </div>
                   
                                
                            <div class="form-group">
                                <label>Địa chỉ: </label>
                                <p>{{$user->DiaChi}}</p>

                             </div>

                             <div class="form-group">
                             </div>
                          </div>
                      @else                  

                          <div class="form">

                              <!-- Ở đây chứa ID user -->
                              <input type="hidden" name="" id="user_id" value="{{Session::get('user_id')}}">

                              <div class="form-group">
                                  <label>Họ Tên: </label>
                                  <input type="text" name="fullname" class="form-control" id="fullname" value="{{$user->HoTen ? $user->HoTen : '' }}">
                                  <span class="name" style="color: red; display: none;">Bạn vui lòng nhập họ tên</span>

                              </div>

                              <div class="form-group">
                                  <label>Số điện thoại: </label>
                                  <input type="text" name="phone" class="form-control"  id="phone-number">
                                  <span class="phone-number" style="color: red; display: none">Bạn vui lòng nhập số điện thoại</span>
                              </div>
                        
                                  
                              <div class="form-group">
                                  <label>Địa chỉ: </label>
                                  <input type="text" name="address" class="form-control" id="address" >
                                  <span class="address" style="color: red; display: none">Bạn vui lòng nhập địa chỉ</span>
                               </div>

                                 <div class="form-group">
                                   <input type="hidden" name="id" value="{{Session::get('username')}}" class="form-control" id="id" >
                                     <span id="save-info">Lưu thông tin </span>
                                    <a href="">Hủy</a>

                               </div>
                              
                          </div>
                    @endif
                     <div class="alert alert-success" style="display: none"></div>                          
                       </div>

                </section>

                <section>
                        <h3 > <i class="zmdi zmdi-map"></i> Hình thức thanh toán</h3>

                        <div class="payments">

                            <ul>
                              <li> 
                                  <label>
                                    <input type="radio" id="trademark3" value="vans" checked="checked"  name="radio"/> <span class="checkmark" ></span>
                                    <span>Thanh toán khi nhận hàng </span>
                                  </label>
                              </li>
                                 
                                <li>
                                 <label>
                                 <input type="radio" id="trademark3" value="vans"  name="radio"/> <span class="checkmark" ></span>

                                 <span>Thanh toán bằng tín dụng </span>
                                 </label>
                              </li>
                          
                            </ul>

                       </div>
                </section>
              </div>


  

              <div class="checkout-right">

                <div id="block-order">
                  <div class="bg-line"></div>

                  <h3>Thông tin đơn hàng</h3>
                    @foreach($product_cart as $value)
                      <div class="checkout-product">
                        <div class="img-product">
                          <div class="name">
                            <p>{!! $value->name !!}</p>
                          </div>
                          <div class="img">
                            <img src="{!! $value->options->img !!}"  class="img-responsive" >
                          </div>
                        </div>

                        <div class="size">
                         <span> Size:</span>
                         <span> {!! $value->options->size !!}</span>

                          
                        </div>

                        <div class="quantity">
                          <span>Số lượng: </span>

                          <input type="number" name="" value="{!! $value->qty !!}" style="width: 40px;"  min="1" id="qty" disabled="disabled">
                        </div>

                        <div class="total-item">
                         <p>
                           Tổng đơn hàng: <span>{{number_format($value->price * $value->qty)}} đ</span> </p>

                         </div>

                      </div>
                    @endforeach

                    <div class="total-all">


                        <label>Ghi chú: </label>
                        <textarea rows="4" cols="50" id="note"></textarea>

                        <h4>Tổng số tiền: <span>{{Cart::total(0)}} đ</span></h4>

                          <input type="submit" name="payment" value="Thanh toán" id="payment">

                    </div>

                </div>

              </div>
        
      </div>
    </div>



		@include('layouts.footer')	


      <script type="text/javascript" src="{{asset('js/function.js')}}"></script>

      <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/fadein.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/multislider.js')}}"></script>

      <script type="text/javascript" src="{{asset('js/payment.js')}}"></script>

      <script type="text/javascript">

          $('#save-info').click(function(e){

              var fullname = $('#fullname').val();
              var phone = $('#phone-number').val();
              var address = $('#address').val();
              var user_id = $('#user_id').val();


              if(fullname == '')
              {
                 $('.name').show();
              }
              if(phone == '')
              {
                 $('.phone-number').show();
              }
              if(address == '')
              { 
                 $('.address').show();
              }
              if(fullname != '')
              { 
                 $('.name').hide();
              }
              if(phone != '')
              { 
                 $('.phone-number').hide();
              }
              if(address != '')
              { 
                 $('.address').hide();
              }

              if(fullname != '' && phone != '' && address != '')
              {

                e.preventDefault();

                 $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                      url: "{{ url('user/checkout/info') }}",
                      method: 'POST',
                      data: {
                         fullname: fullname,
                         phone: phone,
                         address: address,
                         user_id: user_id
                      },
                      success: function(result){
                          $('.customer-info').html(result);
                          $('.form').hide();
                      }
                  });
              }

          });  



             $(".quantity span").on("click", function() {

              var $button = $(this);


              var oldValue = $button.parent().find("input").val();


              if ($button.hasClass('plus')) {
                var newVal = parseFloat(oldValue) + 1;
              } else {
                 // Don't allow decrementing below zero
                if (oldValue > 0) {
                  var newVal = parseFloat(oldValue) - 1;
                  } else {
                  newVal = 0;
                }
              }
              $button.parent().find("input").val(newVal);
          });
      </script>



        
   		<script type="text/javascript">

   			window.onscroll = function() {FixedBar()};

   			var fixed = document.getElementById("headerBar");
   			var sticky = fixed.offsetTop;
   			function FixedBar()
   			{
				  if (window.pageYOffset >= sticky) {
				    fixed.classList.add("sticky")
				  } else {
				    fixed.classList.remove("sticky");
				  }
   			}

   		</script>

  <script type="text/javascript">   
        scroller.init();
  </script>
 <script>window.jQuery || document.write('<script src="{{asset('js/jquery.min.js')}}"><\/script>')</script>

 
</body>

</html>