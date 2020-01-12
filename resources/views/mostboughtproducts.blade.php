
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<title>Shop giay.vn</title>
  <link rel="stylesheet"  href="{{asset('css/bootstrap.css')}}">
	 @include('layouts.elements.script')
	<link rel="stylesheet"  href="{{asset('font-awesome/css/font-awesome.css')}}">

	<script type="text/javascript" src="{{asset('js/scrolls.js')}}"></script>

</head>


<body>
		

		  @include('layouts.header')


      <div class="breadcrums">

          <ol>
            <li><a href="">Trang chủ</a> <i class="fa fa-angle-right"></i> </li>

             <li><a href="">Sản phẩm</a> <i class="fa fa-angle-right"></i></li>

             <li><a href="">Sản phẩm mới</a> <i class="fa fa-angle-right"></i></li>

          </ol>

    </div>

		    
    <div class="filter-product">
      <div class="container">


            <div class="result-filter">
              {!! json_decode($getMostBoughtProducts) !!}
           </div>
      </div>
    </div>

	

		@include('layouts.footer')



	    <script src="{{asset('js/jquery.min.js')}}"></script> 
      <script type="text/javascript" src="{{asset('js/search.js')}}"></script>
       <script type="text/javascript" src="{{asset('js/filter.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/function.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/fadein.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/multislider.js')}}"></script>


        <script type="text/javascript">


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