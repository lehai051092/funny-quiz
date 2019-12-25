<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Funny Quiz</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('storage/admins/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('storage/admins/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="{{asset('storage/admins/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>

    {{--    Ajax--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>--}}
    {{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>--}}
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
    <!-- ------------------------------------------------------------------------------------------------------------------ -->


    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admins.index')}}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Admin Funny Quiz</div>
        </a>


        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Category
        </div>

        <li class="nav-item active">
            <a class="nav-link" href="{{route('admins.getTables')}}">
                <i class="fas fa-fw fa-table"></i>
                <span>List Category</span></a>
        </li>
        <hr class="sidebar-divider">

        <!-- Nav Item - Pages Collapse Menu -->
    {{--        <li class="nav-item">--}}
    {{--            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">--}}
    {{--                <i class="fas fa-fw fa-cog"></i>--}}
    {{--                <span>Components</span>--}}
    {{--            </a>--}}
    {{--            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">--}}
    {{--                <div class="bg-white py-2 collapse-inner rounded">--}}
    {{--                    <h6 class="collapse-header">Custom Components:</h6>--}}
    {{--                    <a class="collapse-item" href="buttons.html">Buttons</a>--}}
    {{--                    <a class="collapse-item" href="cards.html">Cards</a>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </li>--}}

    <!-- Nav Item - Utilities Collapse Menu -->
        <div class="sidebar-heading">
            Quiz
        </div>
        <li class="nav-item active">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-folder"></i>
                <span>Quiz</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Quiz Screens:</h6>
                    <a class="collapse-item" href="{{route('admins.quizCreate')}}"><i class="fas fa-fw fa-plus"></i>Create
                        Quiz</a>
                    <a class="collapse-item" href="{{route('admins.quizList')}}"><i class="fas fa-fw fa-table"></i>List
                        Quiz</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Question
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item active">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
               aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Question</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Question Screens:</h6>
                    <a class="collapse-item" href="{{route('questions.create')}}"><i class="fas fa-fw fa-plus"></i>Create
                        Question</a>
                    <a class="collapse-item" href="{{route('admins.questionList')}}"><i class="fas fa-fw fa-list"></i>List
                        Question</a>
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

    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->

                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-900 ">{{ Auth::user()->name}}</span>
                            <img class="img-profile rounded-circle"
                                 @if(Auth::user()->image === null)
                                 src="{{asset('storage/img/bg-img/default.jpg')}}"
                                 @else
                                 src="{{asset('storage/'.Auth::user()->image)}}"
                                @endif
                            >
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{route('users.profile', Auth::user()->id)}}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-black-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="{{route('users.list')}}">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-black-400"></i>
                                List User
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('index')}}" data-toggle="modal"
                               data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-black-400"></i>
                                Funny Quiz Home
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid pt-4">
                @yield('content')
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
                <div class="modal-body">Select "Back To Home" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{route('index')}}">Back To Home</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('storage/admins/vendor/jquery/jquery.min.js')}}"></script>

<script type="text/javascript" src="{{asset('js/app.js')}}"></script>

<script src="{{asset('storage/admins/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('storage/admins/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('storage/admins/js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('storage/admins/vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('storage/admins/js/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('storage/admins/js/demo/chart-pie-demo.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('storage/admins/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('storage/admins/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('storage/admins/js/demo/datatables-demo.js')}}"></script>

<script src="{{asset("js/answerInput.js")}}"></script>
<script src="{{asset("js/editAnswer.js")}}"></script>
{!! toastr()->render() !!}

</body>

</html>

