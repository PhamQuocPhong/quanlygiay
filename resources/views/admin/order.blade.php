<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

<!--     <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png"> -->

    <title>Ample Admin Template - The Ultimate Multipurpose admin template</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('admin/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="{{asset('admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">
    <!-- toast CSS -->
    <link href="{{asset('admin/plugins/bower_components/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <!-- morris CSS -->
    <link href="{{asset('admin/plugins/bower_components/morrisjs/morris.css')}}" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="{{asset('admin/plugins/bower_components/chartist-js/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')}}" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{{asset('admin/css/animate.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{asset('admin/css/colors/default.css')}}" id="theme" rel="stylesheet">

    <link href="{{asset('admin/css/main.css')}}" rel="stylesheet">

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

</head>

<body class="fix-header">

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>


    <div id="wrapper">

         @include('admin.layouts.header')

         @include('admin.layouts.sidebar')


        <div id="page-wrapper">
             <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Basic Table</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <a href="https://wrappixel.com/templates/ampleadmin/" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Upgrade to Pro

                        </a>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Basic Table</li>
                        </ol>
                    </div>

                </div>


                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Basic Table</h3>
                            <p class="text-muted">Add class <code>.table</code></p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>STT.</th>
                                            <th>Tên Khách Hàng</th>
                                            <th>Điện Thoại</th>
                                            <th>Địa Chỉ </th>
                                            <th>Ngày Lập</th>
                                            <th>Tình Trạng </th>
                                            <th>Tổng Tiền</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            $stt = 0;
                       
                                        ?>
                                        @for($i = 0; $i < count($orders); $i++)
                                            <?php 
                                                $stt++;
                                            ?>

                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $orders[$i]->HoTen }}</td>
                                            <td> {{ $orders[$i]->DienThoai }}</td>
                                            <td>{{ $orders[$i]->DiaChi }}</td>
                                            <td>{{ $orders[$i]->NgayLap }} </td>
                                            <td class="text-center">
                                                <select style="width: 90px;">
                                                    <?php $check = $orders[$i]->Status;  ?>
                                                         <option value=""> {{ $orders[$i]->Status > 1 ?  "Đã nhận" : ($orders[$i]->Status == 0 ? "Đã đặt" : "Đang giao") }} </option>
                                                    <?php if($check == 0): ?>
                                                         <option value=""> Đang giao </option>
                                                         <option value=""> Đã nhận </option>
                                                    <?php elseif ($check == 1): ?>
                                                         <option value=""> Đã đặt </option>
                                                         <option value=""> Đã nhận </option>     
                                                    <?php else: ?>
                                                        <option value=""> Đã đặt </option>
                                                         <option value=""> Đang giao </option>    
                                                    <?php endif ?>
                                                </select>
                                   
                                            </td>
                                            <td class="text-center"> {{ number_format($orders[$i]->TongTien) }} đ</td>
                                        

                                            <td><button class="del"> Xóa </button>  </td>
                                        </tr> 

                                        @endfor
                                    </tbody>
                                </table>
                               </div>
                       
                        </div>
                    </div>
                </div>

                
            </div>

                @include ('admin.layouts.footer')
        </div>
    </div>



    <script src="{{asset('admin/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>

    <script src="{{asset('admin/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')}}"></script>

    <script src="{{asset('admin/js/jquery.slimscroll.js')}}"></script>

    <script src="{{asset('admin/js/waves.js')}}"></script>

    <script src="{{asset('admin/plugins/bower_components/waypoints/lib/jquery.waypoints.js')}}"></script>

    <script src="{{asset('admin/plugins/bower_components/counterup/jquery.counterup.min.js')}}"></script>

    <script src="{{asset('admin/plugins/bower_components/chartist-js/dist/chartist.min.js')}}"></script>
    
    <script src="{{asset('admin/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js')}}"></script>

    <script src="{{asset('admin/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

    <script src="{{asset('admin/js/custom.min.js')}}"></script>
    <script src="{{asset('admin/js/dashboard1.js')}}"></script>
    <script src="{{asset('admin/plugins/bower_components/toast-master/js/jquery.toast.js')}}"></script>
</body>

</html>
