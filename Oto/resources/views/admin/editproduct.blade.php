<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Template</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" /> 
    <!-- FONTAWESOME STYLES-->
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="{{ asset('assets/css/basic.css') }}" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">ADMIN</a>
            </div>

            <div class="header-right">

              <a href="message-task.html" class="btn btn-info" title="New Message"><b>30 </b><i class="fa fa-envelope-o fa-2x"></i></a>
                <a href="message-task.html" class="btn btn-primary" title="New Task"><b>40 </b><i class="fa fa-bars fa-2x"></i></a>
                <a href="login.html" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>


            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <img src="{{ asset('/assets/img/user.png') }}" class="img-thumbnail" />

                            <div class="inner-text">
                      <br />
                      <i class="bi bi-person-circle"></i>{{ auth()->user()->name }}</span>
    <small>
<br>
<a href="{{ route('logout') }}" style="color: white;">Đăng Xuất</a>
    </small>
</div>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-desktop "></i>List register <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                             <li>
                                <a  href="{{ route('admin.users.index') }}"><i class="fa fa-key "></i>Users</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('admin.donhang') }}"><i class="fa fa-desktop "></i>Đơn Hàng <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                             <li>
                                <a  href="{{ route('admin.donhang') }}"><i class="fa fa-key "></i>List Đơn Hàng</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap "></i>List product<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('admin.products.index') }}"><i class="fa fa-bicycle "></i>Product</a>
                            </li>
                             <li>
                            <a class="active-menu" href="{{ route('admin.products.create') }}"><i class="fa fa-flask "></i>Add Product</a>
                            </li>
                    
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
        <div id="page-inner" style="min-height: 1659px;">
                    <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Edit Product</h1>
                        <h1 class="page-subhead-line"> </h1>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="col-lg-12 col-md-12 col-sm-12" style="
    margin-top: -2px;
           <div class="table-responsive">
           <table class="table table-striped table-bordered table-hover">
             <div class="panel panel-info">
                        <div class="panel-heading">
                        EDIT PRODUCT FROM
                        </div>
                                <div class="panel-body">
    
                                <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="hang_xe">Hãng Xe</label>
        <input class="form-control" type="text" id="hang_xe" name="hang_xe" value="{{ $product->hang_xe }}" required>
    </div>

    <div class="form-group">
        <label for="ten_xe">Tên Xe</label>
        <input class="form-control" type="text" id="ten_xe" name="ten_xe" value="{{ $product->ten_xe }}" required>
    </div>

    <div class="form-group">
        <label for="nam_san_xuat">Năm Sản Xuất</label>
        <input class="form-control" type "text" id="nam_san_xuat" name="nam_san_xuat" value="{{ $product->nam_san_xuat }}" required>
    </div>

    <div class="form-group">
        <label for="gia_ban">Giá Bán</label>
        <input class="form-control" type="text" id="gia_ban" name="gia_ban" value="{{ $product->gia_ban }}" required>
    </div>

    <div class="form-group">
        <label for="noi_ban">Nơi Bán</label>
        <input class="form-control" type="text" id="noi_ban" name="noi_ban" value="{{ $product->noi_ban }}" required>
    </div>

    <div class="form-group">
        <label for="so_km">Số KM đã chạy</label>
        <input class="form-control" type="text" id="so_km" name="so_km" value="{{ $product->so_km }}" required>
    </div>

    <div class="form-group">
        <label for="ngay_ban">Ngày Bán</label>
        <input class="form-control" type="date" name="ngay_ban" id="ngay_ban" value="{{ $product->ngay_ban }}" required>
    </div>

    <div class="form-group">
        <label for="mo_ta">Mô Tả</label>
        <textarea class="form-control" id="mo_ta" name="mo_ta" required>{{ $product->mo_ta }}</textarea>
    </div>

    <div class="form-group">
        <label for="dong_xe">Dòng Xe</label>
        <input class="form-control" type="text" id="dong_xe" name="dong_xe" value="{{ $product->dong_xe }}" required>
    </div>

    <div class="form-group">
        <label for="nhien_lieu">Nhiên Liệu</label>
        <input class="form-control" type="text" id="nhien_lieu" name="nhien_lieu" value="{{ $product->nhien_lieu }}" required>
    </div>

    <div class="form-group">
        <label for="xuat_xu">Xuất Xứ</label>
        <input class="form-control" type="text" id="xuat_xu" name="xuat_xu" value="{{ $product->xuat_xu }}" required>
    </div>

    <div class="form-group">
        <label for="kieu_dang">Kiểu Dáng</label>
        <input class="form-control" type="text" id="kieu_dang" name="kieu_dang" value="{{ $product->kieu_dang }}" required>
    </div>

    <div class="form-group">
        <label for="so_cho">Số Chỗ</label>
        <input class="form-control" type="text" id="so_cho" name="so_cho" value="{{ $product->so_cho }}" required>
    </div>

    <div class="form-group">
        <label for="dong_co">Động Cơ</label>
        <input class="form-control" type="text" id="dong_co" name="dong_co" value="{{ $product->dong_co }}" required>
    </div>

    <div class="form-group">
        <label for="anh">Ảnh</label>
        <input type="file" id="anh" name="anh" accept="image/*">
        @if ($product->anh)
            <img src="http://localhost/Oto/storage/app/public/{{( $product->anh) }}" alt="Ảnh sản phẩm hiện tại" style="max-width: 100px;">
        @else
            <p>Không có ảnh sản phẩm hiện tại.</p>
        @endif
    </div>
    <div class="form-group">
        <label for="chi_tiet_anh">Chi Tiết Ảnh (tối đa 5 ảnh, chọn nhiều ảnh)</label>
        <input type="file" name="chi_tiet_anh[]" id="chi_tiet_anh" accept="image/*" multiple required>
    </div>
    <button type="submit" class="btn btn-info">Cập nhật sản phẩm</button>
</form>


</div>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <div id="footer-sec">
        &copy; 2014 YourCompany | Design By : <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
    </div>
   <!-- /. FOOTER  -->
<!-- SCRIPTS - AT THE BOTTOM TO REDUCE THE LOAD TIME -->
<!-- JQUERY SCRIPTS -->
<script src="{{ asset('assets/js/jquery-1.10.2.js') }}"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
<!-- METISMENU SCRIPTS -->
<script src="{{ asset('assets/js/jquery.metisMenu.js') }}"></script>
<!-- CUSTOM SCRIPTS -->
<script src="{{ asset('assets/js/custom.js') }}"></script>



</body>
</html>