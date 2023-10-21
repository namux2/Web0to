
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
                                <a  href="listusers"><i class="fa fa-key "></i>Users</a>
                            </li>
                            <li>
                            <a  class="active-menu" href="edit_user"><i class="fa fa-eyedropper "></i>Edit user</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-desktop "></i>Đơn Hàng <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                             <li>
                                <a  href="donhang"><i class="fa fa-key "></i>List Đơn Hàng</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap "></i>List product<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="listproduct"><i class="fa fa-bicycle "></i>Product</a>
                            </li>
                             <li>
                                <a href="{{ route('admin.products.create') }}"><i class="fa fa-flask"></i> Add Product</a>

                            </li>
                    
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
        <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Edit User</h1>
                        <h1 class="page-subhead-line"> </h1>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="col-lg-12 col-md-12 col-sm-12">
           <div class="table-responsive">
           <table class="table table-striped table-bordered table-hover">
           <div class="panel panel-info">
                        <div class="panel-heading">
                        EDIT USER FORM
                        </div>
                                <div class="panel-body">
                                
                                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="form-group">
        <label for="name">Username</label>
        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
    </div>
    
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" value="{{ $user->email }}">
    </div>

    <div class="form-group">
        <label for="role">Role</label>
        <select name="role" class="form-control">
            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Cập nhật</button>
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