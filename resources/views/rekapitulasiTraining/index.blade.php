@extends('master.app')
@section('title') Rekapitulasi Training @endsection
@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="/AdminLTE/plugins/datatables/dataTables.bootstrap4.css">
<!-- Select2 -->
<link rel="stylesheet" href="/AdminLTE/plugins/select2/select2.min.css">
{{-- yadcf --}}
<link rel="stylesheet" href="/yadcf/jquery.dataTables.yadcf.css">
{{-- export --}}
<link rel="stylesheet" href="/css/buttons.dataTables.min.css">

@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Rekapitulasi Training</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Rekapitulasi Training</li>
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
          <h3 class="card-title">Rekapitulasi Training
            <div style="float: right;">
              <a href="rekapitulasiTraining/tambah"><button type="button" class="btn btn-block btn-primary">+ Tambah</button></a>
            </div>
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          @if($all->count())
          <table id="tabel-rekap-training" class="table table-bordered table-striped">
            <thead style="text-align: center">
              <tr>
                <th width="5%">No</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Peserta</th>
                <th>Divisi</th>
                <th>Nama Training</th>
                <th>Jumlah Jam</th>
                <th>Justifikasi</th>
                <th>Media</th>
                <th>Topik</th>
                <th>Pelaksana</th>
                <th>FPT Approved</th>
                <th>Pendaftaran</th>
                <th>Undangan</th>
                <th>Absensi</th>
                <th>Sertifikat</th>
                <th>Harga Training</th>
                <th>Invoice</th>
                <th>Evaluasi</th>
                <th>Biaya Lain</th>
                <th>Kompetensi</th>
                <th>Keterangan</th>
                <th width="5%"></th>
                <th width="5%"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($all as $a)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$a->tanggal_training}}</td>
                <td>{{$a->status_training}}</td>
                <td>{{$a->nama_pegawai}}</td>
                <td>{{$a->nama_divisi}}</td>
                <td>{{$a->nama_training}}</td>
                <td>{{$a->jumlah_jam_training}}</td>
                <td>{{$a->justifikasi}}</td>
                <td>{{$a->nama_media}}</td>
                <td>{{$a->nama_topik}}</td>
                <td>{{$a->nama_penyelenggara}}</td>
                <td>@if(!empty($a->fpt_file)) v @endif</td>
                <td>@if(!empty($a->pendaftaran_file)) v @endif</td>
                <td>@if(!empty($a->undangan_file)) v @endif</td>
                <td>@if(!empty($a->absensi_file)) v @endif</td>
                <td>@if(!empty($a->sertifikat_file)) v @endif</td>
                <td>{{number_format($a->harga_training)}}</td>
                <td>@if(!empty($a->invoice_file)) v @endif ({{number_format($a->invoice_training)}})</td>
                <td>@if(!empty($a->eval_file)) v @endif</td>
                <td>{{number_format($a->biaya_lain)}}</td>
                <td>{{$a->nama_kompetensi}}</td>
                <td>{{$a->keterangan_lain}}</td>
                <td><a href="rekapitulasiTraining/edit/{{$a->id_rekapitulasi_training}}"><button type="button" class="btn btn-block btn-warning btn-sm"><span class="fa fa-edit"></span></button></a></td>
                <td>
                  <form action="rekapitulasiTraining/delete/{{$a->id_rekapitulasi_training}}" method="post">
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-block btn-danger btn-sm"><span class="fa fa-trash"></span></button>
                  </form>
                </td>
                @endforeach
              </tr>
          </table>
          <div style="float: right; margin-top: 20px">
            <a href="/rekapPeserta"><button type="button" class="btn btn-block btn-success btn-outline"><span class="fa fa-book"></span> Buat Rekap Peserta</button></a>
          </div>
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
<!-- jQuery -->
<script src="/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- DataTables -->
<script src="/AdminLTE/plugins/datatables/jquery.dataTables.js"></script>
<script src="/AdminLTE/plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="/yadcf/jquery.dataTables.yadcf.js"></script>

<!-- Select2 -->
<script src="/AdminLTE/plugins/select2/select2.full.min.js"></script>
{{-- export table --}}
<script src="/js/dataTables.buttons.min.js"></script>
<script src="/js/jszip.min.js"></script>
<script src="/js/buttons.html5.min.js"></script>
<script src="/js/vfs_fonts.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>
<script>
  $(document).ready(function() {
    'use strict';
    $('#tabel-rekap-training').dataTable({
        "bJQueryUI": true,
        "bStateSave": true,
        "scrollX": true,
        dom: 'Bfrtip',
        buttons: [
            'excelHtml5'],
        fixedColumns: {
          leftColumns: 5
        }
    }).yadcf([{
      column_number: 1,
      filter_type: "range_date",
      date_format:  'dd-mm-yy'
    }, {
      column_number: 2,
      filter_type: "multi_select",
      select_type: 'select2'
    }, {
      column_number: 3,
      filter_type: "multi_select",
      select_type: 'select2'
    }, {
      column_number: 4,
      filter_type: "multi_select",
      select_type: 'select2'
    }, {
      column_number: 5,
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
      column_number: 16,
      filter_type: "range_number",
      ignore_char: ","
    }, {
      column_number: 19,
      filter_type: "range_number",
      ignore_char: ","
    }]);
  });
</script>
@endsection

