
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
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>


<body>
		

		@include('layouts.header')

    <div class="breadcrums">

          <ol>
            <li><a href="">Trang chủ</a> <i class="fa fa-angle-right"></i> </li>

             <li><a href="">Đăng kí</a> <i class="fa fa-angle-right"></i></li>

          </ol>

    </div>


    <div class="register">
      <div class="container" >

        @if ($message = Session::get('success'))
  

              <form style="padding-left: 20px;">
                
                <div class="form-group ">
                    <h3>Xác nhận tài khoản</h3>

                  <label>Mã xác nhận: </label>

                  <input type="text" id="token" class="form-control">

                       <span class="text-danger error"></span>
                 </div>

                 <div class="form-group">
                   <input type="submit"  id="confirm" class="form-login" value="Xác nhận">
                 </div>

              </form>


        @else
            <div class="form">
          <form action="{{route('register')}}" method="POST" >

             @csrf
              <div class="form-group">
                <h3>Đăng kí tại đây</h3>
              </div>

              <div class="form-group">
                 <label>Email: </label>
                  <input type="email" value="" name="email" class="form-control" required="required">
                   @if ($errors->has('email'))

                     <span class="text-danger">{{ $errors->first('email') }}</span>

                   @endif
             </div>

            <div class="form-group">
                <label>Mật khẩu: </label>
                <input type="password" name="password" class="form-control" required="required">
                 @if ($errors->has('password'))

                     <span class="text-danger">{{ $errors->first('password') }}</span>

                 @endif
            </div>


              <div class="form-group">
                 <label>Họ tên: </label>
                  <input type="text" value="" name="fullname" class="form-control">
                   @if ($errors->has('fullname'))

                     <span class="text-danger">{{ $errors->first('fullname') }}</span>

                   @endif
             </div>
         

              <div class="form-group">
                 <label>Giới tính: </label>
                 <div class="radio">
                   <label><input type="radio" name="gender" value="1" checked="checked">Nam</label>
                    <label><input type="radio" name="gender" value="0">Nữ</label>
                </div>

                 <!-- Google reCaptcha -->
                        <div class="g-recaptcha" id="feedback-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY')}}"></div>
                <!-- End Google reCaptcha -->
                     @if ($errors->has('g-recaptcha-response'))

                     <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>

                   @endif

             </div>


            <div class="form-group">
                <input type="submit" name="DamgNhap" class="form-login" value="Đăng Kí">
             </div>

          </form>
        </div>

        <div style="background-image:url({{url('img/1.jpg')}}); background-size: cover; ">

        </div>

        @endif

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
           $('#confirm').on('click', function (e) {

                var token = $('#token').val();

                e.preventDefault();
                $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                      }
                  });
         
                 $.ajax({
                    url: "{{ ('register/confirm') }}",
                    method: 'post',
                    data: {
                        token: token
                    },
                    success: function(result){

                        if(result == 1)
                        {
                            window.location =  "http://localhost:8081/shopgiay/public/";
                        } 
                        else{
                          alert('Mã xác nhận k chính xác');
                        }
                       
                    } 
                  });
                return false;
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