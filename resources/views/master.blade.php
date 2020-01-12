
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
<!--     <meta name="_token" content="{{csrf_token()}}" /> -->
	<title>Shop giay.vn</title>
  	<link rel="stylesheet"  href="{{asset('css/bootstrap.css')}}">
	@include('layouts.elements.script')
	<link rel="stylesheet"  href="{{asset('font-awesome/css/font-awesome.css')}}">
	<script type="text/javascript" src="{{asset('js/scrolls.js')}}"></script>

</head>

<body>


		@include('layouts.header')


     <div class="alert alert-success"  style="display: none">
                        <strong></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
      </div>

		<div class="promotion">
   			<div class="container">
   			   <div class="col-md-4"> 	
   				    <div class="probox">
                <div class="img">
     				     	<img src="{{asset('img/anh1.jpg')}}" class="img-responsive" >

                    <div id="overlay1">
                  
                    </div>  
                </div>     

       				 	<div class="panel-body">
       				 		<h4><strong>Tile tile</strong></h4>
       				 		<p>Sneaker is good</p>
       				 	</div>
   				    </div>
   			   </div>
   		  <div class="col-md-4"> 	

   				 <div class="probox">
   				    <div class="img">
               	<img src="{{asset('img/anh2.jpg')}}" class="img-responsive" >

                  <div id="overlay2">
                
                   </div>
              </div>

   				 	<div class="panel-body">
   				 		<h4><strong>Tile tile</strong></h4>
   				 		<p>Sneaker is good</p>
   				 	</div>
   				 </div>
   			   </div>

   				  <div class="col-md-4"> 	
   				 <div class="probox">
   				  <div class="img">
               	<img src="{{asset('img/anh3.jpg')}}" class="img-responsive" >
                  <div id="overlay3">
                
                   </div>
              </div>

   				 	<div class="panel-body">
   				 		<h4><strong>Tile tile</strong></h4>
   				 		<p>Sneaker is good</p>
   				 	</div>
   				 </div>
   			   </div>
   			</div>
   		</div>

   		<div class="bannerMain">
   			<div class="list-menu">
   				<div class="col-md-2">
   				  <div class="row">	
   					<ul>
   						<li><a>Giày thể thao</a></li>
   						<li><a>Giày thời trang</a></li>
   						<li><a>Giày lười</a></li>
   						<li><a>Giày cao gót</a></li>
   						<li><a>Giày hở mũi</a></li>
   						<li><a>Giày bít tết</a></li>
   						<li><a>Giày sandal</a></li>
   						<li><a>Giày nam lịch lãm</a></li>
   					</ul>
   				  </div>
   				</div>
   			</div>

   			<div id="carouselFade" class="carousel slide carousel-fade" data-ride="carousel">

        <!-- Wrapper for slides -->
		        <div class="carousel-inner" role="listbox">
		        	
		            <div class="item active">  
                  <a href="">
		            	   <img src="{{asset('img/bg1.png')}}" class="img-responsive">
		                  <div class="carousel-caption">
		                  <h3>First slide label</h3>
		                  <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
		                </div>
                  </a>


                  
		            </div>
		            <div class="item"> 
		            	<img src="{{asset('img/bg2.png')}}" class="img-responsive">
		                <div class="carousel-caption">
		               
		                </div>
		            </div>
		            <div class="item"> 
		            	<img src="{{asset('img/bg3.jpg')}}" class="img-responsive">
		                <div class="carousel-caption">
		                 
		                </div>
		            </div>
		        </div>

		        <!-- Controls -->
		        <i class="left carousel-control" href="#carouselFade" role="button" data-slide="prev">
		            <span class="fa fa-arrow-left" aria-hidden="true"></span>
		            <span class="sr-only">Previous</span>
		        </i>
		        <i class="right carousel-control" href="#carouselFade" role="button" data-slide="next">
		            <span class="fa fa-arrow-right" aria-hidden="true"></span>
		            <span class="sr-only">Next</span>
		        </i>
		    </div>
   		</div>

         <div class="navMain">
            <div class="container">
               <div class="navLink">
                  <a class="item">
                     <img src="{{asset('img/nav1.png')}}" class="img-responsive">

                     <span>Hàng Real</span>
                  </a>

                   <a class="item">
                     <img src="{{asset('img/nav2.png')}}" class="img-responsive">

                     <span>Hàng Sale</span>
                  </a>

                   <a class="item">
                      <img src="{{asset('img/nav3.png')}}" class="img-responsive">

                     <span>Hàng mới</span>
                  </a>

                   <a class="item">
                      <img src="{{asset('img/nav4.png')}}" class="img-responsive">

                     <span>Hàng Fake</span>
                  </a>
               </div>
            </div>
		 </div>



      @include('layouts.elements.newproduct')
		

     @include('layouts.elements.most-bought-product')

		 <div class="all-products">

            <div class="container">
               <h2>Tất cả sản phẩm</h2>
                 <div class="list-products">                              
					           
                          {!!json_decode($products)!!}  

                  </div>
               </div>

                <div class="see-more">
                    <p>Xem thêm</p>
                </div>
      </div>


    

      <div class="center-parent">
          <div class="center-container"> 
              <i id="mo-spin-icon" class="fa fa-cog fa-spin"></i>
          </div>
      </div>
       

     <div id="spinner-wrapper">
      <div class="spinner"></div>
    </div> 

	 	 @include('layouts.footer')



	    <script src="{{asset('js/jquery.min.js')}}"></script> 

      <script type="text/javascript" src="{{asset('js/function.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/search.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/fadein.js')}}"></script>
      
      <script type="text/javascript" src="{{asset('js/multislider.js')}}"></script>
      
      <script type="text/javascript" src="{{asset('js/script.js')}}"></script>

      <script type="text/javascript">
          var item = 0;
        $('.see-more').click(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               item++;
                $.ajax({
                      url: "{{ url('/see-more') }}",
                      method: 'get',
                      data: {
                         page: item
                      },
                      success: function(result){

                          if(result != '')
                          {
                             $('.center-parent').show();

                            setTimeout(function() {

                              $('.center-parent').hide();                     

                            }, 1000);

                             setTimeout(function(){ 
                               $('.list-products').append(result);
                           }, 1000);
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