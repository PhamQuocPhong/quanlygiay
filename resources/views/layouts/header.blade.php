

  <div class="top-bar navbar-default">
      <div class="container">
        <div class="navbar-header" >  
             <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                   
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

                 <div class="logo" style="position: relative; left: 0;"> 
                     <a href="{{route('/')}}"><img class="navbar-brand" src="{{asset('img/logo.png')}}" height="100" width="120" style="padding:0; height: 60px;"> </a>  
                    
                  </div>

          </div>

               <div id="navbar" class="navbar-collapse collapse">

                   <ul class="nav navbar-nav left">
                      <li><a href="https://news.zing.vn"><i class="fa fa-user-md"></i> Chăm sóc khách hàng</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">

                    @if (( !empty(Session::get('user_id'))  &&  ( Session::get('check') == 1) ) || (Session::get('login_api') == 1 ))
                
                        <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown">{{Session::get('fullname')}}
                                  <i class="fa fa-caret-down"></i>
                                   <ul class="dropdown-menu">
                                       <li><a href="{{url('user/profile')}}">Thông tin tài khoản</a></li>
                                      <li><a href="{{url('user/ordering')}}">Thông tin đơn hàng</a></li>
                                       <li><a href="{{url('user/address')}}">Địa chỉ nhận hàng</a></li>
                                      <li><a href="{{route('logout')}}">Đăng xuất</a></li>
                                    </ul>
                                  </a>
                         </li>
                    @else

                          <li> 
                            <a data-toggle="modal" data-target="#myModal"> <i class="fa fa-user-circle" style="padding-right: 5px;"></i>
                                      Đăng nhập 
                            </a>
                         </li>                     

                    @endif

                  
                        <li style="margin-top:15px;"><a class="headerCart"  href="{!!url('/gio-hang')!!}">
                          
                          <svg viewBox="0 0 24 24" width="1em" height="1em" class="undefined icon-large icon-inverse">
                            <path fill-rule="evenodd" d="M8 18c-1.104 0-1.99.895-1.99 2 0 1.104.886 2 1.99 2a2 2 0 0 0 0-4m10 0c-1.104 0-1.99.895-1.99 2 0 1.104.886 2 1.99 2a2 2 0 0 0 0-4M4 2H1.999v1.999H4l3.598 7.588-1.353 2.451A2 2 0 0 0 8 17h12v-2H8.423a.249.249 0 0 1-.249-.25l.03-.121L9.102 13h7.449c.752 0 1.408-.415 1.75-1.029l3.574-6.489A1 1 0 0 0 21 3.999H6.213l-.406-.854A1.997 1.997 0 0 0 4 2"></path>
                          </svg>

                          <div class="badge badge-number">{!! !empty(Session::get('qty_product')) ? Session::get('qty_product') : 0 !!} </div>

                            </a>
                       </li>
                    </ul>

               
          </div>

      </div>
    </div>
      
      <div class="header-search" id="headerBar">

        <div class="container">
              
          <div class="row headerWrap" >
            <div class="header-logo">
            <a href="{{route('/')}}">
               <img src="{{asset('img/logo.png')}}" class="img-responsive" alt="">
            </a>
                
            </div>

              <div class="mega-menu">

                 <a href="javascript:void(0)" class="mega-menu-btn"> <i class="fa fa-th-list"></i> Danh mục</a>
                    <div class="mega-menu-content">
                      <a href="{{url('/products/cate/adidas')}}">Giày Adidas</a>
                      <a href="{{url('/products/cate/nike')}}">Giày Nike</a>
                      <a href="{{url('/products/cate/converse')}}">Giày Converse</a>
                      <a href="{{url('/products/cate/vans')}}">Giày Vans</a>
                      <a href="{{url('/products/cate/bitis')}}">Giày Biti's</a>
                  </div>
             </div>

            <div class="col-md-8 search" style="flex:auto;">

              <form action="{{route('search')}}"  method="get">
                <div class="form-group " style="margin-bottom: 0;">

                        <input type="text" autocomplete="off" required="required" class="form-control" value="" name="keyword" size="40"  id="search"  name="search">  
                           <div class="input-group-append">
                             <button class="btn button-search"><i class="fa fa-search"></i> Tìm kiếm</button>
                           </div>                
                  </div>
              </form>

                    <table class="table" style="display: none;">
                      <tbody>

                      </tbody>
                    </table>

          </div>

            <diav class="shopping-cart">
              <span style="padding-right: 20px;border-right: 5px ridge;"> Xem </span>
              <a class="headerCart"  href="{!!url('/gio-hang')!!}">

                <svg viewBox="0 0 24 24" width="1em" height="1em" class="undefined icon-large icon-inverse">
                  <path fill-rule="evenodd" d="M8 18c-1.104 0-1.99.895-1.99 2 0 1.104.886 2 1.99 2a2 2 0 0 0 0-4m10 0c-1.104 0-1.99.895-1.99 2 0 1.104.886 2 1.99 2a2 2 0 0 0 0-4M4 2H1.999v1.999H4l3.598 7.588-1.353 2.451A2 2 0 0 0 8 17h12v-2H8.423a.249.249 0 0 1-.249-.25l.03-.121L9.102 13h7.449c.752 0 1.408-.415 1.75-1.029l3.574-6.489A1 1 0 0 0 21 3.999H6.213l-.406-.854A1.997 1.997 0 0 0 4 2"></path>
                </svg>

                 <span class="badge badge-number">{!! !empty(Session::get('qty_product')) ? Session::get('qty_product') : 0 !!} </span>

              </a>
            </div>
          </div>
        </div>
      </div>
      
         <!-- LOGIN WITH SOCIAL NETWOK API -->

                      <div class="modal fade" id="myModal" role="dialog">
                              <div class="modal-dialog modal-lg" >
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Đăng nhập</h4>
                                  </div>
                                  <div class="modal-body">
                                   
                                    <div class="form-group">
                                      <button type="button" class="btn btn-primary btn-block" >
                                         <span class="btn-icon"> <i class="fa fa-facebook"></i></span>
                                        <span class="btn-text"> <a href="{{url('/auth/facebook')}}">Login with FB</a></span>       
                                      </button>
                                    </div>
                                    <div class="form-group">
                                      <button type="button" class="btn btn-danger btn-block">
                                        <span class="btn-icon"> <i class="fa fa-google"></i></span>
                                        <span class="btn-text"> <a href="{{url('/auth/google')}}">Login with Google +</a></span>                       
                                      </button>
                                    </div>

                                    <div class="form-group">
                                      <a href="{{url('login')}}">Đã có tài khoản</a>

                                      <a href="{{url('register')}}" style="float: right;">Đăng kí</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>