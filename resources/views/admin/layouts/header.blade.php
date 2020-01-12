

<nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">

                    <a class="logo" href="index.html">
                    <b>
                        <img src="{{asset('admin/plugins/images/admin-logo.png')}}" alt="home" class="dark-logo" /><img src="{{asset('admin/plugins/images/admin-logo-dark.png')}}" alt="home" class="light-logo" />
                     </b>
                       <span class="hidden-xs">
                     <img src="{{asset('admin/plugins/images/admin-text.png')}}" alt="home" class="dark-logo" /><img src="{{asset('admin/plugins/images/admin-text-dark.png')}}" alt="home" class="light-logo" />
                     </span> </a>
                </div>

                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">  <b class="hidden-xs">{{Session::get('name')}} </b> <i class="fa fa-caret-down"></i> 
                                <ul class="dropdown-menu">
                                       <li><a href="{{url('admin/profile')}}">Thông tin tài khoản</a></li>
                                       <li><a href="{{url('admin/logout')}}">Đăng xuất</a></li>
                                    </ul>
                        </a>
                    </li>
                </ul>
            </div>

  </nav>