@extends('master.app')
@section('title') List Training @endsection
@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="AdminLTE/plugins/datatables/dataTables.bootstrap4.css">
<!-- Select2 -->
<link rel="stylesheet" href="/AdminLTE/plugins/select2/select2.min.css">
{{-- yadcf --}}
<link rel="stylesheet" href="/yadcf/jquery.dataTables.yadcf.css">
@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">List Training</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">List Training</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">List Training
            <div style="float: right;">
              <a href="training/tambah"><button type="button" class="btn btn-block btn-primary">+ Tambah</button></a>
            </div>
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          @if($all->count())
          <table id="tabel-training" class="table table-bordered table-striped">
            <thead style="text-align: center">
              <tr>
                <th>No</th>
                <th>ID</th>
                <th width="10%">Tanggal</th>
                <th>Nama Training</th>
                <th width="7%">Jam Mulai</th>
                <th width="7%">Jam Selesai</th>
                <th>Jumlah Jam</th>
                <th width="7%">Media</th>
                <th width="7%">Topik</th>
                <th>Penyelenggara</th>
                <th>Kompetensi</th>
                <th>Harga (Rp)</th>
                <th>Invoice (Rp)</th>
                <th width="5%"></th>
                <th width="5%"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($all as $a)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$a->id_training}}</td>
                <td>{{$a->tanggal_training}}</td>
                <td>{{$a->nama_training}}</td>
                <td>{{$a->time_start}}</td>
                <td>{{$a->time_finish}}</td>
                <td>{{$a->jumlah_jam_training}}</td>
                <td>{{$a->nama_media}}</td>
                <td>{{$a->nama_topik}}</td>
                <td>{{$a->nama_penyelenggara}}</td>
                <td>{{$a->nama_kompetensi}}</td>
                <td>{{number_format($a->harga_training)}}</td>
                <td>{{number_format($a->invoice)}}</td>
                <td><a href="training/edit/{{$a->id_training}}"><button type="button" class="btn btn-block btn-warning btn-sm"><span class="fa fa-edit"></span></button></a></td>
                <form action="training/delete/{{$a->id_training}}" method="post">
                  {{csrf_field()}}
                    <td><button type="submit" class="btn btn-block btn-danger btn-sm"><span class="fa fa-trash"></span></button></td>
                </form>
              </tr>
              @endforeach
            </tbody>
          </table>
          @else
          <div class="alert alert-warning">
            <i class="fa fa-exclamation-triangle"></i> Tidak ada data.
          </div>
          @endif
        </div>
        <!-- /.card-body -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
@section('script')
<!-- DataTables -->
<script src="AdminLTE/plugins/datatables/jquery.dataTables.js"></script>
<script src="AdminLTE/plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="/yadcf/jquery.dataTables.yadcf.js"></script>
<!-- Select2 -->
<script src="/AdminLTE/plugins/select2/select2.full.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
  })
</script>
<script>
  $(document).ready(function() {
    'use strict';
    $('#tabel-training').dataTable({
        "bJQueryUI": true,
        "bStateSave": true,
        "scrollX": true
    }).yadcf([{
        column_number: 2,
        filter_type: "range_date",
        date_format:  'dd-mm-yy'
    }, {
        column_number: 3,
        filter_type: "multi_select",
        select_type: 'select2'
    }, {
        column_number: 6,
        filter_type: "range_number"
    }, {
        column_number: 7,
        filter_type: "multi_select",
        select_type: 'select2'
    }, {
        column_number: 8,
        filter_type: "multi_select",
        select_type: 'select2'
    }, {
        column_number: 9,
        filter_type: "multi_select",
        select_type: 'select2'
    }, {
        column_number: 10,
        filter_type: "multi_select",
        select_type: 'select2'
    }, {
        column_number: 11,
        filter_type: "range_number",
        ignore_char: ","
      }, {
        column_number: 12,
        filter_type: "range_number",
        ignore_char: ","
    }]);
  });
</script>

@endsection

