  <div class="static">
            
        <ul class="nav-news-feed">
          <li class="{{ (Request::path() == 'user/profile') ? 'active': '' }}">
           <a href="{{url('user/profile')}}"><i class="fa fa-pencil-square-o"></i>Thông tin tài khoản</a>
          </li>
          <li class="{{ (Request::path() == 'user/ordering') ? 'active': '' }}">
            <a href="{{url('user/ordering')}}"><i class="fa fa-files-o"></i> Đơn hàng</a>
          </li>
          <li class="{{ (Request::path() == 'user/address') ? 'active': '' }}">
            <a href="{{url('user/address')}}"><i class="fa fa-map-marker"></i> Địa chỉ nhận hàng
          </a></li>
          <li><a href="newsfeed-messages.html"><i class="fa fa-ticket"></i> Mã giảm giá  </a></li>
          <li><a href="newsfeed-images.html"><i class="fa fa-comments"></i> Hỏi đáp </a></li>
          <li><a href="newsfeed-images.html"><i class="fa fa-heart-o"></i> Sản phẩm yêu thích </a></li>
</div>