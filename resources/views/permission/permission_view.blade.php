@extends('master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Permission Form</h1>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User Permission Form</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <form method="post" action="" role="form">
                            @csrf
                        <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <div class="col">
                                        <h3  class="card-title">Permission</h3>
                                    </div>
                                    <div class="col text-right">
                                        <select name="role_id" id="role_id">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                    
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                            
                                    
                                    <div class="form-row">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">Sl</th>
                                                <th scope="col">Name</th>

                                                @foreach ($actions as $action)
                                                    <th scope="col">{{ $action->name }}</th>
                                                @endforeach                                           
                                            
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($menu_activities as $key => $menu_act)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>
                                                    {{$menu_act->name}} <input type="checkbox" name="menu_{{ $menu_act->id }}" value="{{ $menu_act->id }}">
                                                </td>
                                                    @foreach ($actions as $action)

                                                    @php $check = App\Http\Controllers\MenuActivityController::actionCheck($menu_act->id, $action->id) @endphp
                                                        <td>
                                                            @if($check)
                                                                <input type="checkbox" name="action[{{ $menu_act->id }}][{{ $action->id }}]" value={{ $action->id }}>
                                                            @else
                                                                <input type="checkbox" disabled>
                                                            @endif
                                                        </td>
                                                    @endforeach
                                                
                                                

                                            </tr>
                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="7" class="text-center">
                                                        Already Exist User <input type="checkbox" name="exist_check" value="1">
                                                        
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>


                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer text-right">
                                        <button type="submit" class="btn btn-primary">Permit</button>
                                    </div>
                            
                                </div>
                        
                            </form>
                        </div>
                    <!--/.col (left) -->
                    <!-- right column -->

                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.0.5
        </div>
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@ednsection
