
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<title>Shop giay.vn</title>
  	<link rel="stylesheet"  href="{{asset('css/bootstrap.css')}}">

       <link rel="stylesheet"  href="{{asset('css/user.css')}}">
  @include('layouts.elements.script')

  <link rel="stylesheet"  href="{{asset('font-awesome/css/font-awesome.css')}}">

  <script type="text/javascript" src="{{asset('js/scrolls.js')}}"></script>

</head>


<body>
		

		@include('layouts.header')

    <div class="breadcrums">

          <ol>
            <li><a href="{{url('/')}}">Trang chủ</a> <i class="fa fa-angle-right"></i> </li>

             <li><a href="{{url('user/address')}}">Địa chỉ nhận hàng</a> </li>

          </ol>

    </div>

     <div id="page-contents">
      <div class="container">
        <div class="row">


          @include('user.sidebar')
          
          <div class="address main">

                  <div class="form-group">
                    <span>Địa chỉ nhận hàng</span>
                  </div>              
                    
                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                       <form class="form-horizontal" action="/action_page.php">
                          <div class="form-group">
                            <label class="control-label col-sm-2" for="fullname">Họ tên:</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="fullname" placeholder="Enter email" name="fullname">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Địa chỉ:</label>
                            <div class="col-sm-10">          
                              <input type="text" class="form-control" id="email" placeholder="Enter password" name="email">
                            </div>
                          </div>
    

                          <div class="form-group">     
                             <label class="control-label col-sm-2" for="provincial">Tỉnh/Thành:</label>

                              <div class="col-sm-10">          
                                <select class="form-control" id="provincial" name="provincial">
                                  <option value="">Hà Nội</option>
                                     <option value="">Hồ Chí Minh</option>
                                        <option value=""> Đà Nẵng</option>
                                </select>
                              </div>
                           
                          </div>

                          <div class="form-group">     
                             <label class="control-label col-sm-2" for="district">Quận/Huyện:</label>

                              <div class="col-sm-10">          
                                <select class="form-control" id="district" name="district">
                                  <option value="">Hà Nội</option>
                                     <option value="">Hồ Chí Minh</option>
                                        <option value=""> Đà Nẵng</option>
                                </select>
                              </div>

                           
                          </div>

                          <div class="form-group">     
                             <label class="control-label col-sm-2" for="commune">Phường/Xã:</label>

                                    <div class="col-sm-10">          
                                <select class="form-control" id="commune" name="commune">
                                  <option value="">Hà Nội</option>
                                     <option value="">Hồ Chí Minh</option>
                                        <option value=""> Đà Nẵng</option>
                                </select>
                              </div>

                           
                          </div>
                  

                          <div class="form-group">        
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-default">Lưu thông tin</button>
                            </div>
                          </div>
                        </form>
                  </div> 

           
            </div>

         
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