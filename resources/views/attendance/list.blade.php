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
            Home
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
@endsection


@section('content_basic')
<div class="container">
  <table width="60%" cellspacing="0" cellpadding="4" border="0" class="data">
    @foreach($data as $item)
    <tr>
    <!-- Carbon\Carbon::createFromTimeStamp('d/m/Y H:i:s', $item->lastupdate,'Asia/Kuala_Lumpur')->toDateTimeString() -->
      <td> {{ $item->userid }} </td>
      <td> {{ $item->Name }} </td>
      <td> {{ date('d/m/Y H:i:s',strtotime($item->lastupdate)) }} </td>
    </tr>
    @endforeach
  </table>
</div>
@endsection


@section('content')








    <!-- Main content -->
    <section class="content">






          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">

              <div class="row">
                <div class="col-xs-1">
                  <label for="exampleInputPassword1">Bulan</label>
                </div>
                <div class="col-xs-2">
                    <!-- <input type="text" class="form-control input-sm" placeholder=".col-xs-3">-->
                    {!! Form::select('name', ['01'=>'January','02'=>'February','03'=>'March','04'=>'April','05'=>'May','06'=>'June','07'=>'July','08'=>'August','09'=>'September','10'=>'October','11'=>'November','12'=>'December'], null, array('id' => 'frmonth' , 'class' => 'field' )) !!}
                  </label>
                </div>
                <div class="col-xs-1">
                  <label for="exampleInputPassword1">Tahun</label>
                </div>
                <div class="col-xs-2">
                  <input type="text" class="form-control input-sm" placeholder="">
                  <!--<input maxlen="4" type="text" name="toyear" id="toyear" value="<?php echo('$toyear'); ?>">-->

                </div>
                <div class="col-xs-2">
                  <button type="submit" class="btn btn-primary input-sm">Submit</button>
                </div>
              </div>


            </form>
          </div>
          <!-- /.box -->

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Senarai Kehadiran</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Date</th>
                </tr>
                </thead>
                <tbody>

                <?php $i = 0 ; ?>
                    @foreach($data as $item)
                    <?php ++$i ; ?>
                        <tr>
                          <td> {{ $item->userid }} </td>
                          <td> {{ $item->Name }} </td>
                          <td> {{ date('d/m/Y H:i:s',strtotime($item->lastupdate)) }} </td>
                        </tr>
                @endforeach


                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Date</th>
                </tr>
                </tfoot>
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
