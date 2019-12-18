<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="{{asset('storage/admins/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>

    <!-- Custom styles for this template-->
    <link href="{{asset('storage/admins/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{asset('storage/admins/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{asset('storage/style.css')}}">

    {{--    list users--}}
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admins.index')}}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3"> Admin Funny Quiz</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-white-600 small">Valerie Luna</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
            </a>
            <!-- Dropdown - User Information -->
            <div class=" dropdown-menu-right shadow " aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                </a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

        <!-- Heading -->
        <div class="sidebar-heading mt-3">
            Category
        </div>
        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="{{route('admins.getTables')}}">
                <i class="fas fa-fw fa-table"></i>
                <span>List Category</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('quizzes.basic')}}">
                <i class="fas fa-fw fa-table"></i>
                <span>Tạo Quiz</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('questions.create')}}">
                <i class="fas fa-fw fa-table"></i>
                <span>Tạo câu hỏi</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('quizzes.basic')}}">
                <i class="fas fa-fw fa-table"></i>
                <span>Gắn câu hỏi vào Quiz</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Addons
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
               aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Pages</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Login Screens:</h6>
                    <a class="collapse-item" href="{{route('admins.getLogin')}}">Login</a>
                    <a class="collapse-item" href="{{route('admins.getRegister')}}">Register</a>
                    <a class="collapse-item" href="{{route('admins.getForgotPassword')}}">Forgot Password</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            <!-- Begin Page Content -->
            <div class="container-fluid pt-4">

                <!-- Page Heading -->
                <h1 class="h1 mb-2 text-gray-800">Edit User</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <form method="post" action="{{route('users.edit', $user->id)}}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name"><h5>Name</h5></label>
                                        <input type="text" class="form-control" id="name" value="{{$user->name}}"
                                               name="name"
                                               @if($errors->has('name'))
                                               style="border: solid red"
                                            @endif>
                                        @if($errors->has('name'))
                                            <p class="text-danger">{{$errors->first('name')}}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="email"><h5>Email</h5></label>
                                        <input type="email" class="form-control" id="email"
                                               placeholder="name@example.com" disabled value="{{$user->email}}"
                                               name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="dob"><h5>Birthday</h5></label>
                                        <input type="date" class="form-control" id="dob"
                                               value="{{$user->dob}}" name="dob"
                                               @if($errors->has('dob'))
                                               style="border: solid red"
                                            @endif>
                                        @if($errors->has('dob'))
                                            <p class="text-danger">{{$errors->first('dob')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="gender"><h5>Gender</h5></label>
                                        <select class="form-control" id="gender" name="gender"
                                                @if($errors->has('gender'))
                                                style="border: solid red"
                                            @endif>
                                            @if($errors->has('gender'))
                                                <p class="text-danger">{{$errors->first('gender')}}</p>
                                            @endif
                                            <option value="">Select your gender</option>
                                            <option @if($user->gender === \App\GenderInterface::FEMALE)
                                                    selected
                                                    @endif value="0">Female
                                            </option>
                                            <option @if($user->gender === \App\GenderInterface::MALE)
                                                    selected
                                                    @endif value="1">Male
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="role"><h5>Role</h5></label>
                                        <select class="form-control" id="role" name="role"
                                                @if($errors->has('role'))
                                                style="border: solid red"
                                            @endif>
                                            @if($errors->has('role'))
                                                <p class="text-danger">{{$errors->first('role')}}</p>
                                            @endif
                                            <option value="">Select your role</option>
                                            <option @if($user->role === \App\RoleInterface::ADMIN)
                                                    selected
                                                    @endif value="1">Admin
                                            </option>
                                            <option @if($user->role === \App\RoleInterface::GUEST)
                                                    selected
                                                    @endif value="0">Guest
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn text-white"
                                                style="background: linear-gradient(to right,#3498db, #007bff)">Update
                                        </button>
                                        <a class="btn btn-secondary" href="{{route('users.list')}}">Cancel</a>
                                    </div>
                                </form>

                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2019</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{route('admins.getLogin')}}">Logout</a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('storage/admins/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('storage/admins/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('storage/admins/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('storage/admins/js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('storage/admins/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('storage/admins/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('storage/admins/js/demo/datatables-demo.js')}}"></script>
{!! toastr()->render() !!}

</body>

</html>

