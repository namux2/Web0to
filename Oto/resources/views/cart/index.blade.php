<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/bosstrap/bootstrap.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/menu.css' rel='stylesheet'>
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/chevron-right.css' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
  <title>Đại Lý Xe Bán Ôtô</title>
</head>
<body>
  <div>
    <header>
      <div class="navbar navbar-expand-lg navbar-light" style="background-color: #efebeb;">
        <div class="container">
          <a class="navbar-brand" href="#">
            <span>CHÀO MỪNG BẠN ĐẾN VỚI ĐẠI LÝ XE ÔTÔ</span>
          </a>
          <div class="collapse navbar-collapse" id="navbarNavHeader">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link" href="#"><i class="bi bi-people"></i> Khách Hàng</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"><i class="bi bi-gear"></i> Bảo Hành</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"><i class="bi bi-globe"></i> Đại Lí</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"><i class="bi bi-archive"></i> Liên Hệ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"><i class="bi bi-book"></i> Catalogue</a>
              </li>
            </ul>
            <div class="dk1">
              <li class="dropdown dro1">
                <a class="dropdownt">
                  <i class="bi bi-person-circle"></i><span class="nowrap-text" style="margin-left: 6px">Tài Khoản</span>
                </a>
                <div class="dropdown-content">
                <a href="{{ route('login') }}">Đăng Nhập</a>
                            <a href="{{ route('register') }}">Đăng Ký</a>
                </div>
              </li>

            </div>
          </div>
        </div>
      </div>

    </header>

    <nav class="navbar navbar-expand-lg navbar-light custom-bg-light" style="background-color: rgb(255, 255, 255);">
      <div class="container" style="flex-wrap: nowrap;">
        <div>

        </div>
        <a href="{{ url('/') }}">
         <img src="{{ asset('asset/img/LOGO_dailyxedien (1).png') }}" style="height: 60px; width: 193px;">
        </a>
        <div class="search-dropdown">
          <div class="input-container">
            <input type="text" class="search-input" placeholder="Tìm Kiếm Sản Phẩm..." oninput="searchProducts()">
            <select class="category-select">
              <option value="all">Tất cả danh mục</option>
              <option value="xe-toyota">Xe Toyota</option>
              <option value="xe-chevrolet">Xe Chevrolet</option>
              <option value="xe-ford">Xe Ford</option>
              <option value="xe-honda">Xe Honda</option>
              <option value="xe-hyundai">Xe Hyundai</option>
              <option value="xe-isuzu">Xe Isuzu</option>
              <option value="xe-lexus">Xe Lexus</option>
              <option value="xe-rolls-royce">Xe Rolls-Royce</option>
              <option value="xe-maybach">Xe MayBach</option>
            </select>

            <a href="" id="searchLink">
            <span class="search-icon" id="searchIcon" style="margin: 10px;">
                    <i class="bi bi-search" style="color: black;"></i>
              </span>
            </a>

          </div>
          <ul class="search-results-list"></ul>
        </div>


      <div class="xz0">
        <ul class="navbar-nav ms-auto" style="flex-direction: row;align-items: baseline;">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <div class="phone-number">
                    <i class="bi bi-telephone-fill"></i> <!-- Biểu tượng điện thoại -->
                    <span> Hotline :0933 505 222</span> <!-- Số điện thoại -->
                    <i class="bi bi-cart-fill"></i>
                    <!--Gio hang-->
                    <!-- Nút giỏ hàng -->
                    <button id="cart">
                      <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                      Giỏ Hàng
                    </button>
    
                    <!-- Modal giỏ hàng -->
                    <div id="myModal" class="modal">
                      <div class="modal-content" style="margin-top: 137px;">
                        <div class="modal-header">
                          <h5 class="modal-title">Giỏ Hàng</h5>
                          <span class="close">×</span>
                        </div>
                        <div class="modal-body">
    
                          <div class="cart-row">
                            <span class="cart-item cart-header cart-column">Sản Phẩm</span>
                            <span class="cart-price cart-header cart-column">Giá</span>
                            <span class="cart-quantity cart-header cart-column">Số Lượng</span>
                          </div>
    
                          <div class="cart-items cart">
                            <!-- Đây là nơi sản phẩm được thêm vào giỏ hàng -->
                          </div>
                          <div class="cart-total">
                            <strong class="cart-total-title">Tổng Cộng:</strong>
                            <span class="cart-total-price"></span> VND
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary close-footer">Đóng</button>
                          <button type="button" class="btn btn-primary order">Thanh Toán</button>
                        </div>
                      </div>
                    </div>
              </div></a></li><li class="dropdown dro"><a href="#" class="nav-link">
                </a>
                @if (!auth()->check())
    <a class="dropdownt">
        <i class="bi bi-person-circle"></i><span class="nowrap-text" style="margin-left: 6px">Tài Khoản</span>
    </a>
    <div class="dropdown-content" style="margin-left: 5px;">
        <a href="{{ route('login') }}">Đăng Nhập</a>
        <a href="{{ route('register') }}">Đăng Ký</a>
    </div>
@else
    <a class="dropdownt">
        <i class="bi bi-person-circle"></i><span class="nowrap-text" style="margin-left: 6px; font-size: 11px">{{ auth()->user()->name }}</span>
    </a>
    <div class="dropdown-content" style="margin-left: 5px;">
        <a href="{{ route('logout') }}">Đăng Xuất</a>
    </div>
@endif


                </div>
              </li>
    
          </ul>

  </div>
  </div>
  </nav>
  </div>
  </div>
  <!--sile-->
  <div class="menu2">
  <nav class="navbar navbar-expand-lg navbar-light custom-bg-light" style="background-color: #df4c23ce;">
      <div class="container d-flex justify-content-center">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-4 mb-lg-0">
            <li class="nav-item">
            <li class="nav-item dropdown">
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link" href="{{ url('/') }}">
                Trang Chủ
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button">
                Khách Hàng
              </a>
              <div class="dropdown-content">
                <a class="dropdown-item" href="#">Thị Trường & Công Nghệ Ô Tô</a>
                <a class="dropdown-item" href="#">Kinh Nghiệm Cho Người Mới Lái Xe</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Tư Vấn Mua Bán Ô Tô</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Tư Vấn
              </a>
              <div class="dropdown-content">
                <a class="dropdown-item" href="#">E-Gara-Bệnh Viện Ô TÔ</a>
                <a class="dropdown-item" href="#">Lên nội thất-Độ dàn ngoài</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Âm thanh xe hơi</a>
                <a class="dropdown-item" href="#">Emma Vietnam</a>
                <a class="dropdown-item" href="#">Mâm & Lốp xe</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Hãng Xe
              </a>
              <div class="dropdown-content">
                <a class="dropdown-item" href="#">Toyota</a>
                <a class="dropdown-item" href="#">Chevrolet</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Honda</a>
                <a class="dropdown-item" href="#">Huyndai</a>
                <a class="dropdown-item" href="#">Isuzu</a>
                <a class="dropdown-item" href="#">Lexus</a>
                <a class="dropdown-item" href="#">Rolls-Royce</a>
                <a class="dropdown-item" href="#">Maybach</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Os Mart
              </a>
              <div class="dropdown-content">
                <a class="dropdown-item" href="#">Thông Tin Khuyến Mãi Xe Mới</a>
                <a class="dropdown-item" href="#">Âm Thanh & Ánh Sáng Ô Tô</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Film Cách Nhiệt</a>
                <a class="dropdown-item" href="#">Chợ Mâm Lốp</a>
                <a class="dropdown-item" href="#">Link Kiện & Phụ Tùng</a>
                <a class="dropdown-item" href="#">Dịch Vụ Ô TÔ </a>
                <a class="dropdown-item" href="#">Gara Toàn Quốc</a>
                <a class="dropdown-item" href="#">Rao Vặt</a>
                <a class="dropdown-item" href="#">Thông Tin & Hướng Dẫn OS Mart</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link " href="#">
                Xe Cũ
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link " href="#">
                Bài Mới
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link " href="#">
                Car Audit
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link " href="#">
                Thủ Tục Mua Bán
              </a>
            </li>
          </ul>
        </div>
    </nav>
  </div>
  </div>
  </nav>
  <!--NoiDung-->
    <!--NoiDung-->
    <div class="container">
    <ul class="menu">
      <li><a href="{{ url('/') }}">Trang chủ <i class="gg-chevron-right"></i></a></li>
      <li><a href="cart"> Giỏ Hàng <i class="gg-chevron-right"></i></a></li>
   
    </ul>
    <!--Chi tiet san pham-->
    <div class="card-content">
      <div class="container text-center">
        <div class="row">
          <div class="col-12 ">
            <div class="custom-block2">
              <div class="card" style="margin-top: 20PX;">
              <div class="alert alert-primary" style="border-radius:0px">
    <!-- Nội dung của alert ở đây -->
    Thông Tin Người Mua
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
</div>
                <div class="card-content"
                  style="box-shadow: 0px 3px 5px rgba(9, 30, 66, 0.16), 0px 0px 1px rgba(9, 30, 66, 0.31);">
                  <div>
       
                  <form method="post" action="{{ route('place-order') }}">
                  @csrf
    <table style="width: 100%;">
        <tr>
            <td>Họ và Tên:</td>
            <td>
                <input type="text" name="name" class="form-control form-control-sm" style="width: 100%;" required>
            </td>
        </tr>
        <tr>
            <td>Số Điện Thoại:</td>
            <td>
                <input type="text" name="phone" class="form-control form-control-sm" style="width: 100%;" required>
            </td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>
                <input type="email" name="email" class="form-control form-control-sm" style="width: 100%;" required>
            </td>
        </tr>
        <tr>
            <td>Địa Chỉ:</td>
            <td>
                <input type="text" name="dia_chi" class="form-control form-control-sm" style="width: 100%;" required>
            </td>
        </tr>
        <tr>
            <td>Ghi chú:</td>
            <td>
                <textarea name="ghi_chu" class="form-control" rows="4" style="width: 100%;"></textarea>
            </td>
        </tr>
    </table>
    <br>
    <button type="submit" class="btn btn-primary">Đặt hàng</button>
</form>


                 
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="custom-block2">
              <div class="card" style="margin-top: 20PX;">
              <div class="alert alert-primary" style="border-radius:0px">
    <!-- Nội dung của alert ở đây -->
    Thông Tin Sản Phẩm

</div>
                <div class="card-content"
                  style="    box-shadow: 0px 3px 5px rgba(9, 30, 66, 0.16), 0px 0px 1px rgba(9, 30, 66, 0.31);">
                  @if (count($cart) > 0)
                  <table class="table">
        <thead>
            <tr>
                <th>Ảnh sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Số Lượng</th>
                <th>Giá</th>
                <th>Xóa </th>
            </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
                <tr>
                    <td>  @if ($product->anh)
                <img src="http://localhost/Oto/storage/app/public/{{ $product->anh }}" alt="Hình ảnh {{ $product->ten_xe }}" width="100">
            @endif
</td>
<td>{{ $product->ten_xe }}</td>
                    <td>{{ $cart[$product->id] }}</td>
                    <td>{{ $product->gia_ban }}</td>
                    <td>
                        <a href="{{ route('cart.remove', $product) }}" class="remove-from-cart-button">Xóa</a>
                    </td>
                    <td>
    @csrf
    </form>

</td>
</tr>
@endforeach
</tbody>
</table>
    @else
@endif
                </div>
              </div>
            </div>
          </div>
          <!-- test -->

    
          
        </div>
      </div>
    
    </div>
  </div>
  <!-- Footer -->
  <footer class=" text-white text-center text-lg-start" style="background-color: black;">
    <!-- Grid container -->
    <div class="container p-4">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
          <h5 class="text-uppercase">ĐẠI LÝ XE OTO <img src="{{ asset('asset/img/LOGO_dailyxedien (1).png') }}" style="  height: 60px; width: 193px;">
          </h5>
          <p>
            ©2022 by ChoXe.net. All rights reserved. Công Ty Cổ Phần Ô Tô<br> Xuyên Việt; Mã số thuế: 0304013473
          </p>
          <p>
            Lầu 1, B5-B6 Khu Kim Sơn - Đường Nguyễn Hữu Thọ, phường <br>Tân Phong, Quận 7, TPHCM </p>
          <p1>
            <i class="bi bi-telephone-inbound"></i> 091.144.2883
          </p1>
          <i class="bi bi-mailbox"></i> cskh@choxe.vn
        </div>
        <!--Grid column-->
        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">ĐƯỜNG DÂY NÓNG</h5>
          <ul class="list-unstyled mb-0">
            <p>
              <i class="bi bi-telephone"></i> 1800 1524
            </p>
            <p>
              <i class="bi bi-telephone">
              </i> 0916 001 524
            </p>
            <p>
              <i class="bi bi-envelope"></i> tmv_cs@toyotavn.com.vn
            </p>
            <p>Hotline Hỗ trợ tài chính: (84-28) 7309 0998</p>
            <p>Hotline Bảo hiểm Toyota: 1900 633 384</p>
          </ul>
        </div>
        <!--Grid column-->
        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase mb-0">Liên Kết</h5>
          <div class="icons">
            <p>
              <i class="bi bi-facebook"></i>
              <i class="bi bi-youtube"></i>
              <i class="bi bi-instagram"></i>
            </p>
          </div>
          <p>Đừng bỏ lỡ những tin tức khuyến mãi của chúng tôi </p>
        </div>
      </div>
      <!--Grid column-->
    </div>
    <!--Grid row-->
    </div>
    <!-- Grid container -->
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2020 Copyright:
      <a class="text-white" href="#" style="text-decoration: none;">Đại lý xe Ôtô</a>
    </div>
    <!-- Copyright -->
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
<script src="{{ asset('asset/js/nextimg.js') }}"></script>
<script src="{{ asset('asset/js/cart.js') }}"></script>
<script src="{{ asset('asset/css/bootstrap-5.3.0-dist/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>