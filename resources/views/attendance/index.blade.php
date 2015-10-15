@extends('layout.default')

@section('localscript')

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


@section('content')
<div class="container">
  <table width="60%" cellspacing="0" cellpadding="4" border="0" class="data">
    @foreach($data as $item)
    <tr>
      <td> {{ $item->userid }} </td>
      <td> {{ $item->date }} </td>
    </tr>
    @endforeach
  </table>
</div>
@endsection
