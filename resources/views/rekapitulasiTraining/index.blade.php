@extends('master.app')
@section('title') Rekapitulasi Training@endsection
@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="/AdminLTE/plugins/datatables/dataTables.bootstrap4.css">
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
              <a href="RekapitulasiTraining/tambah"><button type="button" class="btn btn-block btn-primary">+ Tambah</button></a>
            </div>
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
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
              <tr>
                <td>1</td>
                <td>09-02-18</td>
                <td>Diajukan</td>
                <td>Farroh</td>
                <td>HCC</td>
                <td>Customer Engagement</td>
                <td>2</td>
                <td>TNA</td>
                <td>Juara</td>
                <td>Asik</td>
                <td>Artajasa</td>
                <td>Ya</td>
                <td>Ya</td>
                <td>Ya</td>
                <td>Ya</td>
                <td>Ya</td>
                <td>5.000.000</td>
                <td>5.000.000</td>
                <td>Ya</td>
                <td></td>
                <td>Finance</td>
                <td></td>
                <td><a href="/RekapitulasiTraining/edit"><button type="button" class="btn btn-block btn-warning btn-sm"><span class="fa fa-edit"></span></button></a></td>
                <td><a href="#"><button type="button" class="btn btn-block btn-danger btn-sm"><span class="fa fa-trash"></span></button></a></td>
              </tr>
          </table>
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
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>
<script>
  $(document).ready(function() {
    $('#tabel-rekap-training').dataTable({
        "bJQueryUI": true,
        "bStateSave": true,
        "scrollX": true,
        fixedColumns: {
          leftColumns: 5
        }
    })
  });
</script>
@endsection

