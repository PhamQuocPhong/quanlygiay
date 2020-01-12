<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{csrf_token()}}" />
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
<style type="text/css">

</style>

<body class="fix-header">

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>


    <div id="wrapper" >




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

                <div class="products row" >
                    <div class="col-sm-12">
                        <div class="white-box">

                         <!-- Add a product -->

                            <button style="background-color: #13bbc3; border: none; color: #fff;"  type="button"  class="btn btn-default"  data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Thêm sản phẩm
                            </button>

                              <div class="modal fade" id="add" role="dialog">
                                    <div class="modal-dialog">
                                    
                                      <!-- Modal content-->
                                      <div class="modal-content" >
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                           <h4 class="modal-title">Thêm sản phẩm</h4>

                                      
                                        </div>
                                        <div class="modal-body">
                                           
                                           <div class="form-group  has-feedback ">
                                             <label for="name" >Tên sản phẩm:</label>

                                                 <input class="form-control" type="text" id="name" style="width: 75%; display: inline-block; float: right;" />

                                                 <span class="fa form-control-feedback" style="top: 12px;"></span>
                                            </div>
                                          
                                          <div class="form-group has-feedback">
                                             <label for="price">Giá:</label>
                                             <input class="form-control" type="number" id="price" style="width: 75%; display: inline-block;float: right; padding-right: 10px;" />
                                              <span class="fa  form-control-feedback" id="error_price" style="top: 12px;"></span>
                                            </div>      

                                           <div class="form-group has-feedback">
                                             <label for="size">Kích thước:</label>
                                              <select id="size" style="width: 75%; display: inline-block; float: right; padding: 10px 12px;">
                                              
                                                <option value="37">37</option>
                                                <option value="38">38</option>
                                                <option value="39">39</option>
                                                <option value="40">40</option>
                                                <option value="41">41</option>
                                                <option value="42">42</option>
                                                <option value="43">43</option>
                                             </select>
                                           </div>


                                            <div class="form-group has-feedback">
                                             <label for="pwd">Số lượng:</label>
                                             <input class="form-control" type="number" id="quantity" style="width: 75%; display: inline-block; float: right; padding-right: 10px;"   />
                                              <span class="fa  form-control-feedback" id="error_url" style="top: 12px;"></span>
                                           </div>

                                            <div class="form-group has-feedback">
                                             <label for="pwd">URL ảnh:</label>
                                             <input class="form-control" type="text" id="url_image" style="width: 75%; display: inline-block; float: right;"   />
                                              <span class="fa  form-control-feedback" id="error_url" style="top: 12px;"></span>
                                           </div>

                                            <div class="form-group">
                                             <label for="pwd">Loại sản phẩm:</label>

                                             <select id="product_type" style="width: 75%; display: inline-block; float: right; padding: 10px 12px;">
                                               @foreach($product_types as $value)
                                                <option value="{{$value->MaLoaiSP}}">{{ $value->TenMaLoai }}</option>
                                              @endforeach
                                             </select>
                                           </div>

                                             <div class="form-group">
                                             <label for="pwd">Mô tả:</label>
                                             <textarea class="form-control" rows="5" id="descript"></textarea>
                                           </div>

                                        </div>
                                        <div class="modal-footer">
                                          <button type="button"  class="btn btn-default" data-dismiss="modal">Cancel</button>
                                          <button type="button" value="" class="btn btn-primary" id="save-add">OK</button>
                                        </div>
                                      </div>
                                      
                                    </div>
                                </div>
                            <!-- -->

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>STT.</th>
                                            <th>Tên Sản Phẩm</th>
                                            <th>Hình Ảnh</th>
                                            <th>Số Lượng</th>
                                            <th>Giá Tiền </th>
                                            <th >Lượt đánh giá</th>
                                            <th >Lượt mua</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="list-product"> 

                                        <?php
                                            $stt = 0;
                                            
                                        ?>
                                        @for($i = 0; $i < count($products); $i++)
                                            <?php 
                                                $stt++;
                                            ?>

                                        <tr>
                                            <td>{{$stt}}</td>
                                            <td>{{$products[$i]->TenSanPham}}</td>
                                            <td><img src=" {{$products[$i]->HinhAnh}}" class="img-responsive" width="50" height="50" ></td>
                                            <td>{{$products[$i]->Quantity}}</td>
                                            <td id="domPrice{{$products[$i]->ID_SanPham}}" >{{ number_format($products[$i]->Gia)}} đ</td>
                                            <td class="text-center">{{$products[$i]->LuotDanhGia ? $products[$i]->LuotDanhGia : 0}} </td>
                                            <td class="text-center">{{$products[$i]->LuotMua ? $products[$i]->LuotMua : 0}}</td>

                                            <td>
                                                <button class="edit" value="{{$products[$i]->ID_SanPham}}"  data-toggle="modal" data-target="#myModal{{$products[$i]->ID_SanPham}}"> Sửa </button> |
                                                <button class="del" value="{{$products[$i]->ID_SanPham}}" > Xóa </button>  </td>
                                        </tr> 

                                               <!-- Show model edit item -->
                                                <div class="modal fade" id="myModal{{$products[$i]->ID_SanPham}}" role="dialog">
                                                    <div class="modal-dialog">
                                                    
                                                      <!-- Modal content-->
                                                      <div class="modal-content" >
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                           <h4 class="modal-title">{{$products[$i]->TenSanPham}}</h4>

                                                        </div>
                                                        <div class="modal-body">
                                              
                                                           <div class="form-group">
                                                             <label for="pwd">Giá:</label>
                                                             <input class="form-control" type="number" id="price{{$products[$i]->ID_SanPham}}"  value="{{$products[$i]->Gia}}" />
                                                            </div>

                                                              <div class="form-group">
                                                               <label for="pwd">Mô tả:</label>
                                                               <textarea class="form-control" rows="5" id="descript_edit{{$products[$i]->ID_SanPham}}" >{{$products[$i]->MoTa}}</textarea>
                                                             </div>

                                                           <input type="hidden" id="id_product" value="{{$products[$i]->ID_SanPham}}">
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button"  class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                          <button type="button" value="{{$products[$i]->ID_SanPham}}" class="btn btn-primary save-edit">OK</button>
                                                        </div>
                                                      </div>
                                                      
                                                    </div>
                                                </div>

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

    <script type="text/javascript">


    </script>
 

    <script type="text/javascript">

        function formatNumber(num) {
          return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        }

        var listProduct = $('#list-product');

         $('#save-add').click(function(e){

            var name_product = $('#name').val();
            var price = $('#price').val();
            var url_image = $('#url_image').val();
            var descript = $('#descript').val();
            var quantity = $('#quantity').val();
            var size = $('#size').val();

            var product_type = $('#product_type').val();

            var checkName = false;
            var checkPrice = false;
            var checkURL_image = false;

             var getURL = window.location + '/add';         

             e.preventDefault();
             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });


            if(name_product == '')
            {
               $('#name').siblings('span').addClass('fa-times');
            }
            else{
               $('#name').siblings('span').removeClass('fa-times');
               checkName = true;
            }

            if(price == '')
            {
               $('#price').siblings('span').addClass('fa-times');
            }
            else
            {
                $('#price').siblings('span').removeClass('fa-times');
                 checkPrice = true;
            }

            if(url_image == '')
            {
               $('#url_image').siblings('span').addClass('fa-times');
            }
            else{
               $('#url_image').siblings('span').removeClass('fa-times');
                checkURL_image = true;
            }
            if(checkName == true && checkPrice == true && checkURL_image == true)
            {
                $.ajax({
                    url: getURL,
                    method: 'post',
                    data: {
                       name_product: name_product,
                       url_image: url_image,
                       price: price,
                       descript: descript,
                       size: size,
                       quantity: quantity,
                       product_type: product_type

                    },
                    success: function(result){ 

                       alert("Add Success");   

                      listProduct.append(result);        

                }   
              }); 
            }

        });

        $('.save-edit').click(function(e){

             var getValue = this.value; 

             var price = $('#price'+getValue).val();

             var domPrice = $('#price'+getValue).parents().find('#domPrice'+getValue); 

             var descript_edit = $('#descript_edit'+getValue).val();

             var myModal = $('#myModal'+getValue);   

             var modal_backdrop = $('.modal-backdrop');

             var getURL = window.location + '/edit';         

             e.preventDefault();
             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });


             $.ajax({
                    url: getURL,
                    method: 'post',
                    data: {
                       id_product: getValue,
                       price: price,
                       descript_edit: descript_edit

                    },
                    success: function(result){

                    if(result == 1)
                    {
                        myModal.modal('hide');
                        modal_backdrop.hide();
                        domPrice.html(formatNumber(price) + ' đ');
                    }
                    else{
                        alert('Giá sản phẩm chưa hợp lệ!');
                    }

                }   
            }); 
        });


        $('.del').click(function(e){

           var check = confirm('Bạn muốn xóa sản phẩm này?');

           if(check)
           {
            var el = this;
                var getValue = this.value;
                var getURL = window.location + '/delete'; 

                 e.preventDefault();
                 $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });


                  $.ajax({
                        url: getURL,
                        method: 'post',
                        data: {
                           id_product: getValue

                        },
                        success: function(result){
                            $(el).closest('tr').fadeOut(800, function(){      
                                $(this).remove();
                            });
                        }
              }); 
           }             

        });
    </script>

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
