@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <h3 class="text-center"><i class="fa fa-success">{{$message}}</i></h3>
    </div>
@endif


@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <h3 class="text-center text-danger"><i class="fa">{{$message}}</i></h3>
    </div>
@endif


@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <h3 class="text-center"><i class="fa fa-warning">{{$message}}</i></h3>
    </div>
@endif


@if ($message = Session::get('info'))
    <div class="alert alert-info alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <h3 class="text-center"><i class="fa fa-info">{{$message}}</i></h3>
    </div>
@endif


@if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <h3 class="text-danger">Please check the form below for errors</h3>
    </div>
@endif
