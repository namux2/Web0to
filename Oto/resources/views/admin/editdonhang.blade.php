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
                        <h1 class="page-head-line">Edit Đơn Hàng</h1>
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
                        EDIT FROM
                        </div>
                                <div class="panel-body">
    
                                @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.donhang.update', $order->id) }}">
    @csrf
    @method('PUT')

    <!-- Các trường thông tin khách hàng -->
    <div class="form-group">
        <label for="name">Tên Khách Hàng</label>
        <input class="form-control" type="text" id="name" name="name" value="{{ $order->name }}" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" type="email" id="email" name="email" value="{{ $order->email }}" required>
    </div>

    <div class="form-group">
        <label for="dia_chi">Địa Chỉ</label>
        <input class="form-control" type="text" id="dia_chi" name="dia_chi" value="{{ $order->dia_chi }}" required>
    </div>

    <div class="form-group">
        <label for="phone">Số Điện Thoại</label>
        <input class="form-control" type="text" id="phone" name="phone" value="{{ $order->phone }}" required>
    </div>

    <div class="form-group">
        <label for="ghi_chu">Ghi Chú</label>
        <input class="form-control" type="text" id="ghi_chu" name="ghi_chu" value="{{ $order->ghi_chu }}" required>
    </div>

    <!-- Chi tiết đơn hàng -->
    <h4>Chi Tiết Đơn Hàng</h4>
    @foreach ($order->orderDetails as $orderDetail)
        <label for="quantity">Số Lượng (Sản phẩm: {{ $orderDetail->product->ten_xe }})</label>
        <input type="number" name="orderDetails[{{ $orderDetail->id }}][quantity]" value="{{ $orderDetail->quantity }}"><br>

        <label for="price">Giá (Sản phẩm: {{ $orderDetail->product->ten_xe }})</label>
        <input type="text" name="orderDetails[{{ $orderDetail->id }}][price]" value="{{ $orderDetail->price }}"><br>
    @endforeach

    <button type="submit">Lưu Thay Đổi</button>
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