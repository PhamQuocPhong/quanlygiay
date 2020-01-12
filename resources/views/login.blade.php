
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
    <meta name="_token" content="{{csrf_token()}}" />
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

             <li><a href="">Đăng nhập</a> </li>

          </ol>

    </div>


 <div class="login">
      <div class="container">
        <div class="form">
          <form action="{{route('login')}}" method="POST" >
            @csrf
              <div class="form-group">
                <h3>Đăng nhập tại đây</h3>
              </div>

              <div class="form-group">
                <label>Email: </label>
                <input type="email" name="email" class="form-control">
              </div>

            <div class="form-group">
                <label>Password: </label>
                <input type="password" name="password" class="form-control">
            </div>
   
                  <span class="text-danger"><?php echo (isset($error) ? $error : ''); ?></span>

            <div class="form-group">
                <div class="checkbox">
                 <label><input type="checkbox" value="" >Nhớ mật khẩu</label>
               </div>
               <a href="">Quên mật khẩu?</a>
             </div>


            <div class="form-group">
                <input type="submit" name="DangNhap" class="form-login" value="Login">
             </div>

             <div class="form-group">
                <a href="{{ URL::to('auth/google') }}" class="form-login" > Login with FB </a>
             </div>

          </form>
        </div>

        <div class="background-login">

        </div>
      </div>  
    </div>

 

		@include('layouts.footer')


	  <script src="{{asset('js/jquery.min.js')}}"></script> 
          <script type="text/javascript" src="{{asset('js/search.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/function.js')}}"></script>

      <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/fadein.js')}}"></script>
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

  <script type="text/javascript">   
        scroller.init();
  </script>
 <script>window.jQuery || document.write('<script src="{{asset('js/jquery.min.js')}}"><\/script>')</script>

 
</body>

</html>