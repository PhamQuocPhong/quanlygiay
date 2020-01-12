         <div class="new-products">       

            <div class="container">
       
               <div class="title">   
                   <h2>
                    <span>
                       <a href="{{url('products/new-product')}}" >
                          Sản phẩm mới 
                       </a>
                    </span>
                    </h2>
              </div>

               <div id="mixedSlider1">
                  <div class="MS-content">

                      @foreach( json_decode($getNewProducts)  as $value)
                      <div class="item">                
                        <div class="product-card">
                           <a href="{{url('products/product-detail/'. $value->ID_SanPham .'/'. $value->TenSanPham)}}">
                            <div class="thumb-nail">                             
                                   <div class="imgTitle">                     
                                       <img src="{{$value->HinhAnh}}" alt="" />
                                   </div>
                                    
                                   <div class="new">
                                      <p>New</p>
                                   </div>
                            </div>

                                 <div class="info-product">
                                   <p><strong>{{$value->TenSanPham}}</strong></p>
                                   <p>{{ number_format($value->Gia)}} VNĐ</p>

                
                                </div> 
                            </a>
                           </div>
                         </div>                                 
                      @endforeach                 
                      </div>              

                       <div class="MS-controls">
                           <button class="MS-left"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
                           <button class="MS-right"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                       </div>
                   </div>
            </div>
         </div>