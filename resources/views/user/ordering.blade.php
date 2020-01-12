
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
  <meta name="_token" content="{{csrf_token()}}" />
	<title>Shop giay.vn</title>
  <link rel="stylesheet"  href="{{asset('css/bootstrap.css')}}">

    <link rel="stylesheet"  href="{{asset('css/user.css')}}">

  @include('layouts.elements.script')

	<link rel="stylesheet"  href="{{asset('font-awesome/css/font-awesome.css')}}">

  <script src="{{asset('js/jquery.min.js')}}"></script> 

	<script type="text/javascript" src="{{asset('js/scrolls.js')}}"></script>

  <script type="text/javascript" src="{{asset('js/bootbox.min.js')}}"></script>

</head>

<body>
		

		@include('layouts.header')

    <div class="breadcrums">

          <ol>
            <li><a href="{{url('/')}}">Trang chủ</a> <i class="fa fa-angle-right"></i> </li>

              <li><a href="{{url('user/ordering')}}">Đơn hàng</a></li>
          </ol>

    </div>


    <div id="page-contents">
      <div class="container">
        <div class="row">

          <!-- Newsfeed Common Side Bar Left
          ================================================= -->
          @include('user.sidebar')
          
          <div class="ordering main">

                  <div class="form-group">
                    <span>Các đơn hàng đã đặt</span>
                  </div>              
                    
                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                      
                         <?php 
                          $i = 0 ;
                          $user_id = Session::get('user_id');
                          $billInfo = SelectBillInfoByUser($user_id);                        

                         ?>           

                      @if(!$billInfo->isEmpty())
                          @foreach($billInfo as $bill)

                                  <?php 

                                   $i++; 

                                   $date = date_create($bill->NgayLap);                                  

                                  ?>
                           <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="heading0">
                                  <a href="#"  class="close" data-dismiss="alert" id="del_{!!$bill->ID_HoaDon!!}"  aria-label="close"> &times;</a>


                                  <h4 class="panel-title collapsed" role="button" data-toggle="collapse" data-target="#collapse{{$bill->ID_HoaDon}}" aria-expanded="false">
                                       1. Order No #{{$i}} ({{ date_format($date,"d/m/Y H:i")}} - Waiting) 
                                  </h4> <b>250.000 VNĐ</b>


                              </div>
                              <div id="collapse{{$bill->ID_HoaDon}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading0" aria-expanded="false" style="height: 0px;">
                                  <div class="panel-body">
                                    
                                      <div class="items">
                                          <div>
                                              <table class="table table-striped table-responsive">
                                                <thead>
                                                  <tr>
                                                      <th>No.</th>
                                                      <th >Sản phẩm</th>
                                                      <th class="text-center">Kích thước</th>
                                                      <th class="text-center">Đơn giá</th>
                                                      <th class="text-center">Số lượng</th>
                                                      <th class="text-center">Thành tiền</th>
                                                  </tr>
                                               </thead>
                                               <tbody>
                                                  <?php   $detailBill = SelectDetailInfo($bill->ID_HoaDon); ?>  
                                                    @foreach($detailBill as $value) 
                                                   <tr>
                                                      <td class="text-center">{{ $i }}</td>
                                                      <td style="max-width: 150px;">
                                                          <a>{{$value->TenSanPham}}</a>
                                                      </td>
                                                      <td class="text-center">{{ $value->KichCo}} </td>
                                                      <td class="text-center">{{ number_format($value->DonGia)}} VNĐ</td>
                                                      <td class="text-center">{{$value->SoLuong}}</td>
                                                      <td class="text-center" style="color: red; font-weight: bold;">{{number_format($value->DonGia * $value->SoLuong)}} VNĐ</td>
                                                  </tr>   
                                                   @endforeach                   
                                               </tbody>
                                              </table>

                                          </div>
                                      </div>
                
                                  </div>
                              </div>
                           </div>      
                          @endforeach
                      @else 
                        <div class="empty">
                          <h4>Bạn chưa có đơn hàng nào</h4>
                        </div>
                      @endif
                  </div> 

           
            </div>

         
        </div>
      </div>
    </div>



		@include('layouts.footer')


      <script type="text/javascript">
 

      $('.close').click(function(e){

                  var el = this;
                  var id = this.id.split('_')[1];
                

                  e.preventDefault();

                     $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });

              bootbox.confirm({

                  message: 'Bạn muốn xóa bill này?',
                   buttons: {

                        confirm: {
                            label: '<i class="fa fa-check"></i> Đồng ý'
                        },

                        cancel: {
                            label: '<i class="fa fa-times"></i> Không'
                        }
                       
                    },
                  
                  callback: function(result)
                  {
                    if(result){
                       $.ajax({
                          url: "{{ url('user/ordering/delete') }}",
                          method: 'post',
                          data: {
                             order_id: id

                          },
                          success: function(result){
                            
                             $(el).closest('.panel-default').fadeOut(800, function(){      
                                $(this).remove();
                            });

                          }
                        });
                     }
                  }
              
               });

          });                  
            
 

       
      </script>

      <script type="text/javascript" src="{{asset('js/search.js')}}"></script>

      <script type="text/javascript" src="{{asset('js/function.js')}}"></script>

      <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
      
     <!--  <script type="text/javascript" src="{{asset('js/fadein.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/multislider.js')}}"></script>

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
 -->
<!--   <script type="text/javascript">   
        scroller.init();
  </script>
 <script>window.jQuery || document.write('<script src="{{asset('js/jquery.min.js')}}"><\/script>')</script>
 -->
 
</body>

</html>