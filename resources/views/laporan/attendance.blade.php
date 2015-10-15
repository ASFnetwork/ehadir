@extends('layout.pdf')
 
@section('content')
 
    <div style="text-align: center">
        <header>
            <h1>SESEJATI SDN BHD</h1>
            <p>No 178 Jalan Restu 22, Taman Seri Puteri<br>
                Fasa II Meru Off Jalan Kassim, Kapar.<br>
                Tel: +603-xxxxx  Fax: +603-xxxx</p>
        </header>
    </div>
 
    <div>
        <h2 style="text-align: center">LAPORAN SENARAI KEHADIRAN</h2>
        <hr>
 
        @if ($data->count())
            <table style="width: 100%;" cellpadding="5" cellspacing="3">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Masa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                          <td> {{ $item->userid }} </td>
                          <td> {{ $item->date }} </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-center">
                            Jumlah Rekord: <strong>{{ $item->count() }} </strong>
                        </td>
                    </tr>
                </tfoot>
            </table>
        @else
            <div class="alert alert-info text-center">Tiada Maklumat Untuk Dipaparkan</div>
        @endif
    </div>
 
@stop