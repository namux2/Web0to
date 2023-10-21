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
        <a href="{{ route('index') }}">
         <img src="{{ asset('asset/img/LOGO_dailyxedien (1).png') }}" style="height: 60px; width: 193px;">
        </a>
        <div class="search-dropdown">
        <form action="{{ route('search') }}" method="GET">
    @csrf
    <div class="input-container">
        <input type="text" name="search" placeholder="Tìm Kiếm Sản Phẩm...">
        <select name="category">
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
        <button type="submit" style="border:1px ;padding: 7px;border-radius: 19px;border-top-left-radius: 0px;border-bottom-left-radius: 0px;"><i class="bi bi-search" style="color: black;"></i></button>
    </div>
</form>
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
            <a class="nav-link" href="{{ route('index') }}">
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
  <div class="container">
    <ul class="menu">
      <li><a href="{{ url('/') }}">Trang chủ <i class="gg-chevron-right"></i></a></li>
      <li><a href="{{ url('danhmuc') }}">Sản phẩm <i class="gg-chevron-right"></i></a></li>
      <li><a href=""> {{ $product->hang_xe }} <i class="gg-chevron-right"> </i></a></li>
      <li><a href="">{{ $product->ten_xe }}</i></a></li>
    </ul>
    <!--Chi tiet san pham-->
    <div class="card-content">
      <div class="container text-center">
        <div class="row">
          <div class="col-7 ">
            <div class="custom-block2">
              <div class="card" style="margin-top: 20PX;">
                <div class="card-content"
                  style="box-shadow: 0px 3px 5px rgba(9, 30, 66, 0.16), 0px 0px 1px rgba(9, 30, 66, 0.31);">
                  <div>
    <img class="responsive-image"  src="http://localhost/Oto/storage/app/public/{{ $product->anh }}" width="370" id="main-img">
    <br>
    <p>
        @foreach (json_decode($product->chi_tiet_anh, true) as $chiTietAnh)
            <img class="responsive-image" src="http://localhost/Oto/storage/app/public/{{ $chiTietAnh }}" width="90">
        @endforeach
    </p>
</div>

                  <div class="nds">
                    <i class="bi bi-geo-alt-fill"></i>{{ $product->noi_ban}} <i class="bi bi-calendar" style="margin-left: 70px;">
                    {{ $product->ngay_ban }}</i>
                  </div>
                  <div style="display: flex;">Tên Xe:
                  {{ $product->ten_xe }}
<br>
                  </div>
                  <div style="display: flex;">
                  Giá Bán:
                  {{ $product->gia_ban}}
                  </div>
                  <div style="display: flex; ">
                    <span>Mô Tả</span>
                  </div>
                  <div style="    margin-left: -7px;
                  text-align: initial;
                  display: table-footer-group;">
                                 {{ $product->mo_ta }}

                  </div>
                  <div style="display: table; color: orange;">
                  </div>
                  <div>
                    <span style="font-weight: bold;font-size: 18px;display: table-footer-group;">Chi tiết
                    </span>
                    <table class="table table-striped" style="text-align:left" border="1px solid :black">
                        <tr>
        <td><img src="{{ asset('asset/img/tag.png') }}" style="background: no-repeat; margin-top: -4px;"> Hãng Xe</td>
        <td>                                  {{ $product->hang_xe }}
</td>
    </tr>
    <tr>
        <td><img src="{{ asset('asset/img/wiper.png') }}" style="background: no-repeat; margin-top: -4px;"> Dòng Xe</td>
        <td>
        {{ $product->dong_xe }}
        </td>
    </tr>
    <tr>
        <td><img src="{{ asset('asset/img/calendar.png') }}" style="background: no-repeat; margin-top: -4px;"> Năm sản Xuất</td>
        <td>{{ $product->nam_san_xuat }}</td>
    </tr>
    <tr>
        <td><img src="{{ asset('asset/img/odo.png') }}" style="background: no-repeat; margin-top: -4px;"> Số KM đã đi</td>
        <td>{{ $product->so_km }}Km</td>
    </tr>
    <tr>
        <td><img src="{{ asset('asset/img/fuel.png') }}" style="background: no-repeat; margin-top: -4px;"> Nhiên LIệu</td>
        <td>{{ $product->nhien_lieu }}</td>
    </tr>
    <tr>
        <td><img src="{{ asset('asset/img/id.png') }}" style="background: no-repeat; margin-top: -4px;"> Xuất Xứ</td>
        <td>{{ $product->xuat_xu }}</td>
    </tr>
    <tr>
        <td><img src="{{ asset('asset/img/car_type.png') }}" style="background: no-repeat; margin-top: -4px;"> Kiểu Dáng</td>
        <td>{{ $product->kieu_dang }}</td>
    </tr>
    <tr>
        <td><img src="{{ asset('asset/img/seat.png') }}" style="background: no-repeat; margin-top: -4px;"> Số Chỗ</td>
        <td>{{ $product->so_cho }}</td>
    </tr>
    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="custom-block2">
              <div class="card" style="margin-top: 20PX;">
                <div class="card-content"
                  style="    box-shadow: 0px 3px 5px rgba(9, 30, 66, 0.16), 0px 0px 1px rgba(9, 30, 66, 0.31);">
                  <div style="text-align:start;">
                    <span style="font-size: 18px; font-weight: bold;display:block">Liên Hệ : <br>Ly thang phong</span>
                    <i class="bi bi-telephone-fill"></i> 092837373 <br>
                    <i class="bi bi-geo-alt-fill"></i> Hà Nội
                  </div>
                  <button style="border-radius: 5px;border: 1px; background: #ffb300;width: 100%;height: 1.2cm;"><a
                      href="tel:0398812222" style="text-decoration: none; font-size: 20px;"><i
                        class="bi bi-telephone"></i> 0398***222</a></button>
                  <button
                    style="border-radius: 5px;border: 1.3px solid red; background: #ffffff;width: 100%;height: 1.2cm;margin-top: 10px;"><a
                      href="tel:0398812222" style="text-decoration: none; font-size: 20px;"><i
                        class="bi bi-calendar2-check"></i> Car Audit</a></button>
                </div>
              </div>
            </div>
          </div>
          <!-- test -->
          <div class="l1x"> Các Xe Khác </div>
 @foreach($products as $product)
 <div class="col-md-3">
 <div class="card mb-4 box-shadow">
 <img class="card-img-top" data-src="" alt="Hình thu nhỏ [100%x225]"
                    style="height: 225px; width: 100%; display: block;"
                    src="http://localhost/Oto/storage/app/public/{{ $product->anh }}" alt="Hình ảnh {{ $product->ten_xe }}" data-holder-rendered="true">
                <div class="card-body">
                <p class="card-text" style="text-align: initial">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">{{ $product->ten_xe }}</font>
                            <br>
                            <span>Năm Sản Xuất: {{ $product->nam_san_xuat }}</span>
                            <br>
                             <span>Động Cơ: {{ $product->dong_co}}-{{ $product->so_km}}Km</span>
                            <br>
                            <span>Giá Bán: {{ $product->gia_ban}}</span>
                            <br>
                            <span>Nơi bán: {{ $product->noi_ban}}<br>Ngày bán: {{ $product->ngay_ban}}</span>
                        </font>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                    <a href="{{ route('product.show', ['id' => $product->id]) }}"
                                                                        style="text-decoration:none; color: black;">Xem Chi Tiết</a>
                                    </font>
                                </font>
                            </button>
                            <button class="add-to-cart" data-id="{{ $product->id }}" data-title="{{ $product->ten_xe }}"
                            data-price="{{ $product->gia_ban}}" data-image="http://localhost/Oto/storage/app/public/{{ $product->anh }}">
    <span class="gg-shopping-bag"></span>
</button>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
          
        </div>
      </div>
      <div class="xt1">
        <a href="{{ route('danhmuc') }}" style="text-decoration:none; color: #eb7854;"> <span
            style="display: flex; justify-content: center;">
            Xem Thêm<img  src="{{ asset('asset/img/chevrons-right_20_20 (1).png') }}" style="margin-top:3px; ">
          </span></a>
      </div>
      <div class="l1x"> Các tin khác cùng người bán </div>
    </div>
    <div style="display: block;padding: 20px;text-align: center;color: #B3B6C1;"><img src="{{ asset('asset/img/file_empty.png') }}"><br>Chưa có tin đăng</div>
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