@extends('layouts.admin')
@section('content')
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Charts</h1>
                    <p class="mb-4">Chart.js is a third party plugin that is used to generate the charts in this theme.
                        The charts below have been customized - for further customization options, please visit the <a
                            target="_blank" href="https://www.chartjs.org/docs/latest/">official Chart.js
                            documentation</a>.</p>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-xl-8 col-lg-7">

                            <!-- Area Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        General statistics
                                    </h6>
                                </div>
                                <div class="card-body">

                                    <div>
                                        <div style="text-align: center" class=" text-capitalize ">
                                            <p>
                                            <h2>Statistics of the percentage of pass and fail</h2>
                                            <h5>( Unit: % )</h5>
                                            </p>
                                        </div>
                                        <div style="width: 100%">
                                            {!! $usersChart->container() !!}
                                            <script
                                                src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"
                                                charset=utf-8></script>
                                            {!! $usersChart->script() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Donut Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div id="displayUser" style="display: none">
                                    <input>
                                </div>
                               <div id="totalStatistic" >
                                   <div class="card-header py-3">
                                       <h6 class="m-0 font-weight-bold text-primary">Statistics of each player</h6>
                                   </div>
                                   <!-- Card Body -->
                                   <div class="card-body">
                                       <select class="choseUser" style="width: 100%;border-radius: 50px">
                                           <option value="-1">Select User</option>
                                           @foreach($listUser as $user)
                                               <option value="{{$user->id}}">{{$user->name}}</option>
                                           @endforeach
                                       </select>
                                   </div>
                               </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
@endsection
