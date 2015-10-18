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

    <h1>Butiran Kakitangan</h1>

    <form class="form-horizontal">

        <div class="form-group">
            <label for="isbn" class="col-sm-2 control-label">ID</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="isbn" placeholder={{$staff->Auto_No}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">No Kakitangan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" placeholder={{$staff->userid}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Nama Kakitangan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" placeholder={{$staff->Name}} readonly>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a href="{{ url('staffs')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </form>
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
