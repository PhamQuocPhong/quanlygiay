
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
  <meta name="_token" content="{{csrf_token()}}" />
  
	<title>Shop giay.vn</title>

  <link rel="stylesheet"  href="{{asset('css/bootstrap.css')}}">
  @include('layouts.elements.script')
  <link rel="stylesheet"  href="{{asset('css/tab-panel.css')}}">
	<link rel="stylesheet"  href="{{asset('font-awesome/css/font-awesome.css')}}">
  <script src="{{asset('js/jquery.min.js')}}"></script> 
	<script type="text/javascript" src="{{asset('js/scrolls.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/jquery.multipurpose_tabcontent.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/bootbox.min.js')}}"></script>
    
</head>

<body>
		

		@include('layouts.header')


    <div class="breadcrums">

          <ol>
            <li><a href="">Trang chủ</a> <i class="fa fa-angle-right"></i> </li>

             <li><a href="">Giỏ hàng</a></li>

          </ol>

    </div>

    
    <?php

      if(!empty(Session::get('Message')))
      {

        echo '  <div class="alert alert-warning alert-dismissible fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>'. Session::get('Message') .'</strong> 
        </div>';
      }

    ?>

    
    <div class="cart">
      <div class="container">
          <div class="box-cart">
            <div class="col-md-8 box-cart-left">
              <div class="row">
                <div class="list-header">
                  <span class="product">Sản phẩm</span>
                   <span class="price-product"> Giá</span>
                      <span class="size">Size</span>
                     <span class="quantity-product"> Số lượng</span>
                </div>
                
 
                <form action="" method="post">               
              @if(!empty($cart) && count($cart) > 0)
                  @foreach($cart as $value)     
                    <div class="info-product">   

                      <div class="info">
                           <img src="{!!$value->options['img']!!}" class="img-responsive" />
                             <div class="block">
                                <span class="name-product">{!!$value->name!!}</span>
                                <span class="action">
                                <i class="fa fa-thumbs-o-up"></i>   
                                <i class="delete fa fa-trash-o" id="delete_{!!$value->rowId!!}"></i>     
                                </span>
                              </div>
                      </div>

                      <div class="price-product">

                         <div class="price" id="price{!!$value->rowId!!}" >{!!number_format($value->price) !!} đ</div>
                         <div class="old-price">100,000 VNĐ</div>
                         <div class="sale"> - 21 % </div>
                      </div>

                      <div class="size-product">
                        <span>{!!$value->options['size']!!}</span>
                     </div>

                      <div class="quantity-select">
                             <div class="entry value-minus" id="sub"></div>
                               <div class="entry value">
                       
                                <input type="number" id="qty{!!$value->rowId!!}" name="" value="{!!$value->qty!!}" min="1" max="100"  />   
                                <input type="hidden" name=""id="unitprice{!!$value->rowId!!}" value="{!!$value->price!!}" >
                                 <input type="hidden" name="" id="id_sanpham{!!$value->rowId!!}" value="{!!$value->rowId!!}">   

                               </div>

                            <div class="entry value-plus active" id="add"> </div>
                      </div>
                     </div> 
                    @endforeach
                @else
                  <div style="background-color: #fff;">
                    <img src="{{asset('img/empty.png')}}" class="img-responsive" width="440" style="margin: 0 auto;">
                  </div>

                @endif
                </form>
              </div>
            </div>

            <div class="col-md-4  info-ship">
                   <div class="address-ship">
                    <h3>Địa điểm nhận</h3>
                    <p>861/18/25 trần xuân soạn, quận 7</p>
                   </div>
                   <div class="order-info">
                      <h3>Thông tin đơn hàng</h3>
                      <p>Phí giao hàng <span>miễn phí</span></p>
                   </div>
                   <div class="total-price">
                      <p>Tổng cộng: <span>{!! !empty(Cart::total()) ? Cart::total(0) : 0 !!} VNĐ</span></p>
                    </div>
                   <div class="checkout">
                      @if(!empty(Cart::count()))
                       <a href="{{url('user/checkout')}}">Tiến hành thanh toán</a> 
                      @else
                       <a href="{{url('/')}}">Mua hàng</a> 
                      @endif
                   </div>
           </div>

            <div class="box-cart-right">
            </div>
          </div>
      </div>
    </div>

		@include('layouts.footer')

      <div class="center-parent">
          <div class="center-container"> 
              <i id="mo-spin-icon" class="fa fa-cog fa-spin"></i>
          </div>
      </div>

      <div id="spinner-wrapper">
        <div class="spinner"></div>
      </div> 	


      <script type="text/javascript" src="{{asset('js/function.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/search.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/fadein.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/multislider.js')}}"></script>

       <script type="text/javascript" src="{{asset('js/script.js')}}"></script>
       <script type="text/javascript" style=></script>
        <!--quantity-->
       <script type="text/javascript" src="{{asset('js/quantity.js')}}"></script>
        <!--quantity-->          

      <script type="text/javascript">
         $('.delete').click(function(e){
              var el = this;
              var id = this.id;
              var splitid = id.split("_");

              // Delete id
              var deleteid = splitid[1];

               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               
              bootbox.confirm({

                  message: 'Bạn muốn xóa sản phẩm này?',
                   buttons: {
                        cancel: {
                            label: '<i class="fa fa-times"></i> Không'
                        },
                        confirm: {
                            label: '<i class="fa fa-check"></i> Đồng ý'
                        }
                    },
                  
                  callback: function(result)
                  {
                    if(result){
                       $.ajax({
                          url: "{{ url('gio-hang/post') }}",
                          method: 'post',
                          data: {
                             rowId: deleteid

                          },
                          success: function(result){
                            
                             $(el).closest('.info-product').fadeOut(800, function(){      
                                $(this).remove();
                            });

                              var split = result.split("|");
                              var total = split[0];
                              var qty = split[1];


                              $('.total-price span').show();
                              $('.total-price span').html(total);

                              $('.badge-number').show();
                              $('.badge-number').html(qty);
                          }
                        });
                     }
                  }
              
                });
        });
      </script>


        
   		<script type="text/javascript">

          /*
             $('#mixedSlider1').multislider({
                duration: 750,
                interval: 3000
             });  

             $('#mixedSlider2').multislider({
                duration: 750,
                interval: 3000
             });    
    */
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