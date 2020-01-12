
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
  <meta name="_token" content="{{csrf_token()}}" />

	<title>Shop giay.vn</title>

  <link rel="stylesheet"  href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet"  href="{{asset('css/tab-panel.css')}}">
  @include('layouts.elements.script')
	<link rel="stylesheet"  href="{{asset('font-awesome/css/font-awesome.css')}}">
  <script src="{{asset('js/jquery.min.js')}}"></script> 
	<script type="text/javascript" src="{{asset('js/scrolls.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/jquery.multipurpose_tabcontent.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $(".first_tab").champ();

            $(".accordion_example").champ({
                plugin_type: "accordion",
                side: "left",
                active_tab: "3",
                controllers: "true"
            });

            $(".second_tab").champ({
                plugin_type: "tab",
                side: "right",
                active_tab: "1",
                controllers: "false"
            });

            $(".third_tab").champ({
                plugin_type: "tab",
                side: "",
                active_tab: "4",
                controllers: "true",
                ajax: "true",
                show_ajax_content_in_tab: "4",
                content_path: "html.txt"
            });
            $(".multipleTab").champ({
                //plugin_type :  "accordion",
                multiple_tabs: "true"
            });

        });
    </script>
</head>

<body>
		

		  @include('layouts.header')


     <div class="breadcrums">

          <ol>
            <li><a href="">Trang chủ</a> <i class="fa fa-angle-right"></i> </li>

             <li><a href="">Sản phẩm</a> <i class="fa fa-angle-right"></i></li>

             <li><a href="">Chi tiết sản phẩm</a></li>


          </ol>

    </div>
    


            @if ($review_success = Session::get('review_success'))

                    <div class="alert alert-success">
                        <strong>{{ $review_success }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            @endif


    <div class="detail-product">
      <div class="container">
        <div class="main">

             
          @foreach( json_decode($productDetail) as $value)
           <div class="product-gallery">
             <div class="image-product-main">
               <figure class="img">
                  <img src="{{$value->HinhAnh}}" class="img-responsive">
               </figure>
             </div>

             <div class="image-thumb">

             </div>
           </div>
          
            <div class="product-info">

              <div class="main-info">
                <div class="title">
                  <h3>{{$value->TenSanPham}}</h3>
                </div>
                 <div class="info">
                    <p>Giá: <span style="color: red;">{{number_format($value->Gia)}} đ</span> </p>
                     <div class="rating">
                      @if(round(json_decode($product_rating)) == 5)
                        <span class="starRating">
                        <input id="rating" type="radio" name="comment-{{$value->ID_SanPham}}" value="5" checked="checked">
                        <label>5</label>
                        <input type="radio" name="comment-{{$value->ID_SanPham}}" value="4">
                        <label>4</label>
                        <input type="radio" name="comment-{{$value->ID_SanPham}}" value="3">
                        <label>3</label>
                        <input type="radio" name="comment-{{$value->ID_SanPham}}" value="2">
                        <label>2</label>
                        <input type="radio" name="comment-{{$value->ID_SanPham}}" value="1">
                        <label>1</label>                                   
                        </span>
                      @elseif(round(json_decode($product_rating)) == 4)
                         <span class="starRating">
                        <input id="rating" type="radio" name="comment-{{$value->ID_SanPham}}" value="5" >
                        <label>5</label>
                        <input type="radio" name="comment-{{$value->ID_SanPham}}" value="4" checked="checked">
                        <label>4</label>
                        <input type="radio" name="comment-{{$value->ID_SanPham}}" value="3">
                        <label>3</label>
                        <input type="radio" name="comment-{{$value->ID_SanPham}}" value="2">
                        <label>2</label>
                        <input type="radio" name="comment-{{$value->ID_SanPham}}" value="1">
                        <label>1</label>                                   
                        </span>
                      @elseif(round(json_decode($product_rating)) == 3)
                         <span class="starRating">
                        <input id="rating" type="radio" name="comment-{{$value->ID_SanPham}}" value="5" >
                        <label>5</label>
                        <input type="radio" name="comment-{{$value->ID_SanPham}}" value="4" >
                        <label>4</label>
                        <input type="radio" name="comment-{{$value->ID_SanPham}}" value="3" checked="checked">
                        <label>3</label>
                        <input type="radio" name="comment-{{$value->ID_SanPham}}" value="2">
                        <label>2</label>
                        <input type="radio" name="comment-{{$value->ID_SanPham}}" value="1">
                        <label>1</label>                                   
                        </span>
                      @elseif(round(json_decode($product_rating)) == 2)
                         <span class="starRating">
                        <input id="rating" type="radio" name="comment-{{$value->ID_SanPham}}" value="5" >
                        <label>5</label>
                        <input type="radio" name="comment-{{$value->ID_SanPham}}" value="4" >
                        <label>4</label>
                        <input type="radio" name="comment-{{$value->ID_SanPham}}" value="3">
                        <label>3</label>
                        <input type="radio" name="comment-{{$value->ID_SanPham}}" value="2"  checked="checked">
                        <label>2</label>
                        <input type="radio" name="comment-{{$value->ID_SanPham}}" value="1">
                        <label>1</label>                                   
                        </span>
                      @elseif(round(json_decode($product_rating)) == 1)
                        <span class="starRating">
                        <input id="rating" type="radio" name="comment-{{$value->ID_SanPham}}" value="5" >
                        <label>5</label>
                        <input type="radio" name="comment-{{$value->ID_SanPham}}" value="4" >
                        <label>4</label>
                        <input type="radio" name="comment-{{$value->ID_SanPham}}" value="3">
                        <label>3</label>
                        <input type="radio" name="comment-{{$value->ID_SanPham}}" value="2"  >
                        <label>2</label>
                        <input type="radio" name="comment-{{$value->ID_SanPham}}" value="1" checked="checked">
                        <label>1</label>                                   
                        </span>
                      @else

                      @endif

                        <p>  <span>{{ $value->LuotDanhGia }}</span> lượt đánh giá  </p>
                    </div>  
                  </div>

                  <form action="{{route('product-add',[$value->ID_SanPham])}}" method="post"> 
                    <div class="promotion">                
                          <p>Kích thước:  </p>
                        <div class="group-size">
                        <select class="form-control" id="sel1" name="size" required="required">
                              <option value=""></option>
                           @foreach( json_decode($productSize) as $value)
                            
                              <option value="{{$value->KichCo}}">{{$value->KichCo}}</option>
                            
                            @endforeach
                          </select>
                        </div>
                    </div>

                    <div class="group-btn"> 
                     
                        @csrf           
                        <input type="hidden" name="ID_SanPham" value="{{$value->ID_SanPham}}">
                         <input type="submit" name="submit" class="btn add-to-cart" value=" Thêm giỏ hàng">
                     
                          <button class="btn buy-now">Mua ngay</button>
                    </div>                 
                  </form>    
                </div>
              </div>
         @endforeach
          </div>


       <div class="wrapper">
            <div class="tab_wrapper first_tab">
                <ul class="tab_list">
                    <li class="active">Mô tả</li>
                    <li>Đánh giá</li>
                    <li>Phản hồi</li>

                </ul>

                <div class="content_wrapper">
                    <div class="tab_content active">
                        <h3>Chi tiết sản phẩm</h3>
                         <div class="_2u0jt9">
                            <p>                             
                                  {{$descript}} 
                                    
                            </p>
                         </div>  
                         <div class="img">
                            <img src="">
                         </div>
                    </div>

                    <div class="tab_content">
                        <h3>Tab content 2</h3>
                        
                        <div class="show-review">

                         @foreach( json_decode($select_review) as $value) 

                          <div class="row">
                            <div class="col-md-2 hidden-xs">
                                      <div class="thumbnail">                               
                                          <h1>{{$value->HoTen[0]}}</h1>
                                      </div>
                              </div>

                              <div class="col-md-10 ">
                                  <div class="panel panel-default arrow left">
                                      <div class="panel-body">
                                          <header>
                                              <div class="row">
                                                  <div class="comment-user col-md-6"><h4><i class="fa fa-user"></i>&nbsp; {{$value->HoTen}} </h4>  </div>
                                                  <div class="col-md-6 text-right">
                                                      <time class="comment-date" datetime=""><i class="fa fa-clock-o"></i>&nbsp; 
                                                       {{date('d-m-Y H:i:s', strtotime($value->created_at))}}
                                                    </time>
                                                  </div>
                                              </div>
                                          </header>
                                          <div class="row subject">
                                              <div class="col-md-9">
                                                  <p>{{$value->NoiDung}}</p>
                                              </div>
                                              <div class="col-md-3 text-right">
                                                  @if($value->Rating == 5)
                                                  <div class="rating">
                                                     <span class="starRating">
                                                      <input  type="radio" disabled="disabled" name="comment-rating{{$value->ID_DanhGia}}" value="5" checked="checked">
                                                      <label>5</label>
                                                      <input type="radio"  disabled="disabled" name="comment-rating{{$value->ID_DanhGia}}" value="4">
                                                      <label>4</label>
                                                      <input type="radio"  disabled="disabled" name="comment-rating{{$value->ID_DanhGia}}" value="3">
                                                      <label>3</label>
                                                      <input type="radio"  disabled="disabled" name="comment-rating{{$value->ID_DanhGia}}" value="2">
                                                      <label>2</label>
                                                      <input type="radio"  disabled="disabled" name="comment-rating{{$value->ID_DanhGia}}" value="1">
                                                      <label>1</label>                                   
                                                      </span>
                                                  </div>
                                                 @elseif($value->Rating == 4)
                                                  <div class="rating">
                                                     <span class="starRating">
                                                      <input  type="radio" disabled="disabled"  name="comment-rating{{$value->ID_DanhGia}}" value="5" >
                                                      <label>5</label>
                                                      <input type="radio" disabled="disabled" name="comment-rating{{$value->ID_DanhGia}}" value="4" checked="checked">
                                                      <label>4</label>
                                                      <input type="radio" disabled="disabled" name="comment-rating{{$value->ID_DanhGia}}" value="3">
                                                      <label>3</label>
                                                      <input type="radio" disabled="disabled" name="comment-rating{{$value->ID_DanhGia}}" value="2">
                                                      <label>2</label>
                                                      <input type="radio" disabled="disabled" name="comment-rating{{$value->ID_DanhGia}}" value="1">
                                                      <label>1</label>                                   
                                                      </span>
                                                  </div>
                                                   @elseif($value->Rating == 3)
                                                  <div class="rating">
                                                     <span class="starRating">
                                                      <input  type="radio" disabled="disabled" name="comment-rating{{$value->ID_DanhGia}}" value="5" >
                                                      <label>5</label>
                                                      <input type="radio" disabled="disabled" name="comment-rating{{$value->ID_DanhGia}}" value="4" >
                                                      <label>4</label>
                                                      <input type="radio" disabled="disabled" name="comment-rating{{$value->ID_DanhGia}}" value="3" checked="checked">
                                                      <label>3</label>
                                                      <input type="radio" disabled="disabled" name="comment-rating{{$value->ID_DanhGia}}" value="2">
                                                      <label>2</label>
                                                      <input type="radio" disabled="disabled" name="comment-rating{{$value->ID_DanhGia}}" value="1">
                                                      <label>1</label>                                   
                                                      </span>
                                                  </div>
                                                   @elseif($value->Rating == 2)
                                                  <div class="rating">
                                                     <span class="starRating">
                                                      <input  type="radio" disabled="disabled" name="comment-rating{{$value->ID_DanhGia}}" value="5" >
                                                      <label>5</label>
                                                      <input type="radio" disabled="disabled" name="comment-rating{{$value->ID_DanhGia}}" value="4" >
                                                      <label>4</label>
                                                      <input type="radio" disabled="disabled" name="comment-rating{{$value->ID_DanhGia}}" value="3">
                                                      <label>3</label>
                                                      <input type="radio" disabled="disabled" name="comment-rating{{$value->ID_DanhGia}}" value="2" checked="checked">
                                                      <label>2</label>
                                                      <input type="radio" disabled="disabled" name="comment-rating{{$value->ID_DanhGia}}" value="1">
                                                      <label>1</label>                                   
                                                      </span>
                                                  </div>
                                                   @else
                                                  <div class="rating">
                                                     <span class="starRating">
                                                      <input  type="radio" disabled="disabled" name="comment-rating{{$value->ID_DanhGia}}" value="5" >
                                                      <label>5</label>
                                                      <input type="radio" disabled="disabled" name="comment-rating{{$value->ID_DanhGia}}" value="4" c>
                                                      <label>4</label>
                                                      <input type="radio" disabled="disabled" name="comment-rating{{$value->ID_DanhGia}}" value="3">
                                                      <label>3</label>
                                                      <input type="radio" disabled="disabled"  name="comment-rating{{$value->ID_DanhGia}}" value="2">
                                                      <label>2</label>
                                                      <input type="radio" disabled="disabled" name="comment-rating{{$value->ID_DanhGia}}" value="1" hecked="checked">
                                                      <label>1</label>                                   
                                                      </span>
                                                  </div>
                                                 @endif
                                              </div>
                                          </div>

                                      </div>
                                  </div>
                              </div>                 
                         </div>
                        @endforeach
                       </div>
                    </div>

                    <div class="tab_content">
                        <div class="review">  
                            <h2>Đánh giá sản phẩm</h2>
                              @if(!empty(Session::get('user_id')))
                                <div class="alert alert-success" style="display:none"></div>                                 

                                      <div id="form-review">
                                          <form method="post" action="{{route('product-review',[$value->ID_SanPham])}}" name="form">
                                            @csrf

                                              <div class="form-group">
                                                 <label>Rating</label>
                                                 <div class="rating">
                                                <span  class="starRating">
                                                                                                   
                                                  <input id="rating5" type="radio"   name="rating" value="5" checked="checked">
                                                  <label for="rating5" >5</label>
                                                  <input id="rating4" type="radio"   name="rating" value="4" >
                                                  <label for="rating4" >4</label>
                                                  <input id="rating3" type="radio"   name="rating" value="3">
                                                  <label for="rating3" >3</label>
                                                  <input id="rating2" type="radio"   name="rating" value="2">
                                                  <label for="rating2" >2</label>
                                                  <input id="rating1" type="radio"  name="rating" value="1">
                                                  <label for="rating1" >1</label>
                                                  <input type="hidden" name="id_sanpham" value="{{$value->ID_SanPham}}">
                                                  <input type="hidden" name="name" value="<?php echo !empty(Session::get('user_id')) ?Session::get('user_id') : '' ?>">
                                                </span>

                                                 </div>
                                              </div>         
                                              <div class="form-group">                      
                                                <label>Nhập nội dung</label>

                                                <textarea id="content" class="form-control" rows="7" name="comment"> </textarea>                                        
                                              </div>
                                              <div class="form-group col-md-4 ">
                                                <div class="row">
                                                  <input type="hidden" name="user_id" value="{{Session::get('user_id')}}">

                                                  <button id="btn-comment" name="submit" class="btn btn-primary">Gửi </button> 

                                                  <input type="hidden" name="token" value="1539139650">                          
                                                </div>
                                              </div>
                                           </form>
                                          
                                        </div>
                                    @else
                                      <h4>Bạn vui lòng đăng nhập để đánh giá.</h4>        

                                    @endif

                          </div>
                     </div>

                      <div class="tab_content">
                      </div>
                </div>
               </div>
       </div>

          

        <div class="relate-products">
          <h3>Có thể bạn quan tâm?</h3>


             <div id="mixedSlider1">
                  <div class="MS-content">
                     @foreach(json_decode($same_product) as $value)
                      <div class="item">                
                        <div class="product-card">
                           <a href="">
                            <div class="thumb-nail">                             

                                 <div class="imgTitle">                     
                                     <img src="{!!$value->HinhAnh!!}" alt="" />
                                 </div>
                                    
                            </div>

                                 <div class="info-product">
                                   <p><strong>Giày sneaker</strong></p>
                                   <p>542.000 VNĐ</p>
 
                                 </div> 

                            </a>
                        </div>
                     </div>     
                    @endforeach
                    </div>

                       <div class="MS-controls">
                           <button class="MS-left"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
                           <button class="MS-right"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                       </div>
                   </div>
            </div>


        </div>   
      
    </div>
  
	

		@include('layouts.footer')	



      <script type="text/javascript" src="{{asset('js/function.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/search.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/fadein.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/multislider.js')}}"></script>


<!--       <script type="text/javascript">


          $(document).ready(function(){   
                                      
            // lấy ra ID sản phẩm
            var url =  window.location.pathname;
            var id_sanpham = url.substring(url.lastIndexOf('/') + 1);
            
            $('#btn-comment').click(function(e){                   

               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
                  

               $.ajax({

                  url: '{{url('/products/chi-tiet-san-pham/id_sanpham') }}',
                  method: 'post',
                  data: {
                     content: $('#content').val(),
                     // price: $('#price').val()
                  },
                  success: function(result){
                     $('.alert').show();
                     $('.alert').html(result.cmt);
                  }
                  });

               });
            });
      </script> -->

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