
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

             <li><a href="{{url('user/profile')}}">Tài khoản</a> <i class="fa fa-angle-right"></i></li>

          </ol>

    </div>

    <?php 

    echo Session::get('success');

    ?>

     <div id="page-contents">
      <div class="container">
        <div class="row">


          @include('user.sidebar')
          
          <div class="profile main">



                  <div class="form-group">
                    <span>Thông tin tài khoản</span>
                  </div>              
                    
                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                       <form class="form-horizontal" action="{{route('profile')}}" method="post">
                           @csrf
                          <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Email:</label>
                            <div class="col-sm-10">          
                              <input type="email" class="form-control" id="email" name="email" disabled="disabled" value="{{$profileUser->email}}">
                            </div>
                          </div>

                           <div class="form-group">
                            <label class="control-label col-sm-2" for="name_account">Họ tên:</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="name_account" disabled="disabled" name="name_account" value="{{$profileUser->HoTen}}">
                            </div> 
                          </div>
    

                          <div class="form-group">     
                             <label class="control-label col-sm-2" for="fullname">Giới tính:</label>

                            <div class="col-sm-10">
                               <label class="radio-inline">
                                  <input type="radio" value="1" name="gender" {{($profileUser->GioiTinh == 1) ? "checked" : ""}}> Nam
                                </label>
                                <label class="radio-inline">
                                  <input type="radio"  value="0" name="gender" {{($profileUser->GioiTinh == 0) ? "checked" : ""}}> Nữ
                                </label>
                            </div>
                          </div>

                           <div class="form-group">     
                             <label class="control-label col-sm-2" for="fullname">Ngày sinh:</label>

                            <div class="col-sm-10">
                              <?php 
                                    $my_day = date('d', strtotime($profileUser->NgaySinh));
                                    $my_month = date('m', strtotime($profileUser->NgaySinh));
                                    $my_year = date('Y', strtotime($profileUser->NgaySinh));
                                  ?>
                                <select id="day" class="form-control" name="day">
                                  
                                  @for($day = 1; $day <= 31; $day++)
                                    <option value="{{$day}}" <?php echo ($my_day == $day) ? "selected" : ""; ?> > {{$day}}  </option>
 
                                  @endfor
                     
                   
                                </select>


                                  <select id="month" class="form-control" name="month">
                                   @for($month = 1; $month <= 12; $month++)
                                    <option value="{{$month}}" <?php echo ($my_month == $month) ? "selected" : ""; ?>>{{$month}}</option>
                                  @endfor
                                </select>
                                  <select id="year" class="form-control" name="year">
                                   @for($year = 1965; $year <= 2015; $year++)
                                    <option value="{{$year}}" <?php echo ($my_year == $year) ? "selected" : ""; ?>>{{$year}}</option>
                                  @endfor
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