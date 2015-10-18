@extends('layout.default')

@section('localscript')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ URL::asset('/admin/plugins/datatables/dataTables.bootstrap.css') }}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::asset('/admin/dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('/admin/dist/css/skins/skin-blue.min.css') }}">

@endsection


@section('breadcrum')
          <h1>
            Kakitangan
            <small>Senarai</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
@endsection

@section('content')


    <h1>Kemaskini</h1>
    {!! Form::model($staff,['method' => 'PATCH','route'=>['staffs.update',$staff->Auto_No]]) !!}
    <div class="form-group">
        {!! Form::label('userid', 'User ID:') !!}
        {!! Form::text('userid',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('user_username', 'User Name:') !!}
        {!! Form::text('user_username',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Name', 'Nama:') !!}
        {!! Form::text('Name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

@endsection

@section('pagescript')
<!-- DataTables -->
<script src="{{ URL::asset('/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('/admin/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ URL::asset('/admin/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ URL::asset('/admin/plugins/fastclick/fastclick.js') }}"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>



@endsection
