@extends('master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{asset('public/backend') }}/#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

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
                                    <select name="role_id" id="role_id" class="role_id">
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
                                            <th scope="col">Name <input name="all" type="checkbox" id="all" class="all"></th>

                                            @foreach ($actions as $action)
                                                <th scope="col"><input type="checkbox" id="allCheck_{{ $action->id }}" data-actionId="{{ $action->id }}" class="allCheck"> {{ $action->name }} </th>
                                            @endforeach                                           
                                        
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($menu_activities as $key => $menu_act)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>
                                                {{$menu_act->name}} <input data-menu_id="{{ $menu_act->id }}" class="menu_id menu_id_{{ $menu_act->id }}" type="checkbox" name="menu_{{ $menu_act->id }}" value="{{ $menu_act->id }}">
                                            </td>
                                                @foreach ($actions as $action)

                                                @php $check = App\Http\Controllers\MenuActivityController::actionCheck($menu_act->id, $action->id) @endphp
                                                    <td>
                                                        @if($check)
                                                            <input type="checkbox" id="check_{{ $action->id }}" data-menu_id="{{ $menu_act->id }}" data-action_id="{{ $action->id }}" class="check check_{{ $action->id }} menu_{{ $menu_act->id }} checked_{{ $menu_act->id }}_{{ $action->id }}" name="action[{{ $menu_act->id }}][{{ $action->id }}]" value={{ $action->id }}>
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
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>

@push('scripts')

<script>

    $(document).ready(function(){
        
        $(document).on('click', '.all', function(){
            console.log($('.all').is(':checked'));
            if($('.all').is(':checked')){
                $('input[type=checkbox]').prop('checked', true);
            }else{
                $('input[type=checkbox]').prop('checked', false);
            }            
        })

        // Menu Id check unchecked function goes here

        $(document).on('click', '.menu_id', function(){
            var menuId = $(this).data("menu_id");
            if($(this).prop('checked')){
                $(".menu_"+menuId).prop("checked", true);
            }else{
                $(".menu_"+menuId).prop("checked", false);
            }
            
        })


        // $(document).on('click', '.check', function(){    
        //     var menuId = $(this).data('menu_id');

        //     console.log(menuId);

        //     // if($(".menu_id"+$menuId).length == $(".menu"+$menuId+":checked").length) {
        //     //     $(".menu_id_"+$menuId).prop("checked", true);
        //     // } else {
        //     //     $(".menu_id_"+$menuId).prop("checked", false);
                
        //     // }
        // })

        


        $(document).on('click', '.allCheck', function(){
            var actionId = $(this).data("actionid");
            if($(this).prop('checked')){
                $(".check_"+actionId).prop("checked", true);
            }else{
                $(".check_"+actionId).prop("checked", false);
            }
            
        })

        $(document).on('click', '.check', function(){    
            var actionId = $(this).data('action_id');
            var menuId = $(this).data('menu_id');

            if($(".menu_"+menuId).length == $(".menu_"+menuId+":checked").length) {
                $(".menu_id_"+menuId).prop("checked", true);
            } else {
                $(".menu_id_"+menuId).prop("checked", false);
                
            }

            if($(".check_"+actionId).length == $(".check_"+actionId+":checked").length) {
                $("#allCheck_"+actionId).prop("checked", true);
            } else {
                $("#allCheck_"+actionId).prop("checked", false);
                
            }

            
        })

        // if all checkbox are selected, check the selectall checkbox
        if($(".check_2").length == $(".check_2:checked").length) {
            $(".allCheck_2").prop("checked", true);
        } else {
            $(".allCheck_2").prop("checked", false);
        }



        // $(document).on('click', '.check_1', function(){            
        //     if($(".check_1").length == $(".check_1:checked").length) {
        //         $("#allCheck_1").prop("checked", true);
        //     } else {
        //         $("#allCheck_1").prop("checked", false);
                
        //     }
        // })


        // $(document).on('click', '.check_2', function(){            
        //     if($(".check_2").length == $(".check_2:checked").length) {
        //         $("#allCheck_2").prop("checked", true);
        //     } else {
        //         $("#allCheck_2").prop("checked", false);
                
        //     }
        // })

        // $(document).on('click', '.check_3', function(){            
        //     if($(".check_3").length == $(".check_3:checked").length) {
        //         $("#allCheck_3").prop("checked", true);
        //     } else {
        //         $("#allCheck_3").prop("checked", false);
                
        //     }
        // })

        // $(document).on('click', '.check_4', function(){            
        //     if($(".check_4").length == $(".check_4:checked").length) {
        //         $("#allCheck_4").prop("checked", true);
        //     } else {
        //         $("#allCheck_4").prop("checked", false);
                
        //     }
        // })

        // $(document).on('click', '.check_5', function(){            
        //     if($(".check_5").length == $(".check_5:checked").length) {
        //         $("#allCheck_5").prop("checked", true);
        //     } else {
        //         $("#allCheck_5").prop("checked", false);
                
        //     }
        // })


        // // for view checkded
        // $(document).on('click', '.allCheck_1', function(){
        //     if($(this).prop('checked')){
        //         $(".check_1").prop("checked", true);
        //     }else{
        //         $(".check_1").prop("checked", false);
        //     }
            
        // })

        // // for view add
        // $(document).on('click', '.allCheck_2', function(){
        //     if($(this).prop('checked')){
        //         $(".check_2").prop("checked", true);
        //     }else{
        //         $(".check_2").prop("checked", false);
        //     }
            
        // })

        // // for view edit
        // $(document).on('click', '.allCheck_3', function(){
        //     if($(this).prop('checked')){
        //         $(".check_3").prop("checked", true);
        //     }else{
        //         $(".check_3").prop("checked", false);
        //     }
            
        // })


        // // for view delete
        // $(document).on('click', '.allCheck_4', function(){
        //     if($(this).prop('checked')){
        //         $(".check_4").prop("checked", true);
        //     }else{
        //         $(".check_4").prop("checked", false);
        //     }
            
        // })

        // // for view export/import
        // $(document).on('click', '.allCheck_5', function(){
        //     if($(this).prop('checked')){
        //         $(".check_5").prop("checked", true);
        //     }else{
        //         $(".check_5").prop("checked", false);
        //     }
            
        // })


        // if($(".allCheck_1").length == $(".allCheck_1:checked").length) {
        //     console.log('hello');
        //     $(".check_1").prop("checked", true);
        // } else {
        //     $(".allCheck_2").prop("checked", false);
        // }


        // if($(".allCheck_1").length == $(".allCheck_1:checked").length) {
        //     console.log('hello');
        //     $(".check_1").prop("checked", true);
        // } else {
        //     $(".allCheck_2").prop("checked", false);
        // }


    // role permission get by ajax check permission checked/unchecked

    $(document).on('change', '.role_id', function(){
        var roleId = $(this).val();

        var url = "{{ url('get_permission_check') }}/"+roleId;

        $.ajax({
            method: "get",
            url: url,
            success: function(res){

                $('input[type=checkbox]').prop('checked', false);

                $.each(res, function(index, data){

                    $('.checked_'+data.menu_id+'_'+data.action_id).prop('checked', true);

                    if($(".check_"+data.action_id).length == $(".check_"+data.action_id+":checked").length) {
                        $("#allCheck_"+data.action_id).prop("checked", true);
                    } else {
                        $("#allCheck_"+data.action_id).prop("checked", false);
                        
                    }

                    if($('.checked_'+data.menu_id+'_'+data.action_id).length == $('.checked_'+data.menu_id+'_'+data.action_id+':checked').length) {
                        $(".menu_id_"+data.menu_id).prop("checked", true);
                    } else {
                        $(".menu_id_"+data.menu_id).prop("checked", false);
                        
                    }

                })
                
                console.table(res);
            },
            error: function(xhr){
                console.log(xhr);
            }
        })
    })
        
    })

</script>
    
@endpush




@endsection