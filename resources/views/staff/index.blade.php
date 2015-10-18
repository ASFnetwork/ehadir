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
    <!-- Main content -->
    <section class="content">



      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Senarai Kakitangan</h3>
              </br><a href="{{url('/staffs/create')}}" class="btn btn-success">Tambah Kakitangan</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Date</th>
				  <th colspan="3">Actions</th>
                </tr>
                </thead>
                <tbody>

                <?php $i = 0 ; ?>
                    @foreach($staffs as $staff)
                    <?php ++$i ; ?>
                        <tr>
                          <td> {{ $staff->userid }} </td>
                          <td> {{ $staff->Name }} </td>
                          <td> {{ date('d/m/Y H:i:s',strtotime($staff->lastupdate)) }} </td>

						 <td><a href="{{url('staffs',$staff->Auto_No)}}" class="btn btn-primary">Read</a></td>
			             <td><a href="{{route('staffs.edit',$staff->Auto_No)}}" class="btn btn-warning">Update</a></td>
			             <td>
			             {!! Form::open(['method' => 'DELETE', 'route'=>['staffs.destroy', $staff->Auto_No]]) !!}
			             {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
			             {!! Form::close() !!}
   			             </td>
                        </tr>
                @endforeach
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Date</th>
                </tr>
                </tfoot>


                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

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
