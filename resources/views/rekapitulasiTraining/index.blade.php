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
                <th>Tanggal Awal</th>
                <th>Tanggal Akhir</th>
                <th>Status</th>
                <th>Peserta</th>
                <th>Divisi</th>
                <th>Nama Training</th>
                <th>Justifikasi</th>
                <th>Jumlah Jam</th>
                <th>Media</th>
                <th>Topik</th>
                <th>Penyelenggara</th>
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
                <th>Detail Tanggal</th>
                <th width="5%"></th>
                <th width="5%"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($all as $a)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$a->tgl_min}}</td>
                <td>{{$a->tgl_max}}</td>
                <td>{{$a->status_training}}</td>
                <td>{{$a->nama_pegawai}}</td>
                <td>{{$a->nama_divisi}}</td>
                <td>{{$a->nama_training}}</td>
                <td>{{$a->justifikasi}}</td>
                <td>{{$a->jumlah_jam_training}}</td>
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
                <td><button id="lihat" type="button" class="btn btn-block btn-secondary btn-sm" data-id="{{$a->id_rekapitulasi_training}}">lihat</button></td>
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
<!-- Modal lihat tanggal -->
<div class="modal fade" id="lihatTanggal" tabindex="-1" role="dialog" aria-labelledby="lihatTanggal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="listTanggal">List Tanggal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center;">
        <table class="table table-striped">
          <thead>
            <tr>
              <th width="5%">No</th>
              <th>Tanggal</th>
            </tr>
          </thead>
          <tbody id="TanggalDetailBody">
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection
@section('script')
<!-- DataTables -->
<script src="/AdminLTE/plugins/datatables/jquery.dataTables.js"></script>
<script src="/AdminLTE/plugins/datatables/dataTables.bootstrap4.js"></script>
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
      filter_type: "range_date",
      date_format:  'dd-mm-yy'
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
      filter_type: "multi_select",
      select_type: 'select2'
    }, {
      column_number: 7,
      filter_type: "multi_select",
      select_type: 'select2'
    }, {
      column_number: 8,
      filter_type: "range_number"
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
      filter_type: "multi_select",
      select_type: 'select2'
    }, {
      column_number: 17,
      filter_type: "range_number",
      ignore_char: ","
    }, {
      column_number: 20,
      filter_type: "range_number",
      ignore_char: ","
    }, {
      column_number: 21,
      filter_type: "multi_select",
      select_type: 'select2'
    }]);
  });
</script>

<script type="text/javascript">
$(document).ready(function() {
  $(document).on('click','#lihat',function(e) {
    jQuery.noConflict();
    // $('#lihatDepartemen').modal('show');
    $.ajaxSetup({
        headers:{'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
    })
    e.preventDefault(e);
    var triggerid = $(this).data('id');
    $.ajax({
      type: 'get',
      url: '/rekapitulasiTraining/show/'+ triggerid,
      dataType: 'json',
      success: function(message) {
        // console.log(message)
          jQuery.noConflict();
          document.getElementById('TanggalDetailBody').innerHTML = '';
          var tableAppend = '';
          for(var i = 0; i < message.data.length; i++) {
              tableAppend += '<tr><td>' + (i+1) + '</td><td>' + message.data[i]['tanggal_training'] + '</td></tr>';
          }
          $('#TanggalDetailBody').append(tableAppend);
          $('#lihatTanggal').modal('show');
      },
      error: function(message){
        console.log(message);
      }
    });
  });
});
</script>
@endsection

