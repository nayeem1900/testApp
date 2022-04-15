@extends('master')
@section('content')

    @php 

    $add = App\Http\Controllers\PermissionAccess::menuAccess(2, 2); // $menuId, $actionId
    $edit = App\Http\Controllers\PermissionAccess::menuAccess(2, 3); // $menuId, $actionId
    $delete = App\Http\Controllers\PermissionAccess::menuAccess(2, 4); // $menuId, $actionId
    
    @endphp

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Branch</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{asset('public/backend') }}/#">Home</a></li>
                            <li class="breadcrumb-item active">Branch</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                   
                    @if($add)
                        <a href="#">Add Branch</a>
                    @endif
                    |
                    @if($edit)
                    <a href="#">Edit Branch</a>
                    @endif
                    |
                    @if($delete)
                    <a href="#">Delete</a>
                    @endif

                    
                    
                    
                </div>
                <!-- /.row -->
                
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection