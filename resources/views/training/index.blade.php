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
          <table id="tabel-training" class="table table-bordered table-striped">
            <thead style="text-align: center">
              <tr>
                <th>No</th>
                <th width="10%">Tanggal</th>
                <th>Judul Training</th>
                <th width="7%">Jam Mulai</th>
                <th width="7%">Jam Selesai</th>
                <th>Jumlah Jam</th>
                <th width="7%">Media</th>
                <th width="7%">Topik</th>
                <th>Pelaksana</th>
                <th>Harga</th>
                <th>Invoice</th>
                <th width="5%"></th>
                <th width="5%"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>09-01-2018</td>
                <td>Customer Engagement</td>
                <td>10.00</td>
                <td>12.00</td>
                <td>2</td>
                <td>GIAT</td>
                <td>ASIK</td>
                <td>Artajasa</td>
                <td>200.000</td>
                <td>200.000</td>
                <td><a href="#"><button type="button" class="btn btn-block btn-warning btn-sm"><span class="fa fa-edit"></span></button></a></td>
                <td><a href="#"><button type="button" class="btn btn-block btn-danger btn-sm"><span class="fa fa-trash"></span></button></a></td>
              </tr>
              <tr>
                <td>1</td>
                <td>09-02-2018</td>
                <td>Customer Engagement</td>
                <td>10.00</td>
                <td>12.00</td>
                <td>2</td>
                <td>GIAT</td>
                <td>ASIK</td>
                <td>Artajasa</td>
                <td>200.000</td>
                <td>200.000</td>
                <td><a href="#"><button type="button" class="btn btn-block btn-warning btn-sm"><span class="fa fa-edit"></span></button></a></td>
                <td><a href="#"><button type="button" class="btn btn-block btn-danger btn-sm"><span class="fa fa-trash"></span></button></a></td>
              </tr>
              <tr>
                <td>1</td>
                <td>09-03-2018</td>
                <td>Customer Engagement</td>
                <td>10.00</td>
                <td>12.00</td>
                <td>2</td>
                <td>GIAT</td>
                <td>ASIK</td>
                <td>Artajasa</td>
                <td>200.000</td>
                <td>200.000</td>
                <td><a href="#"><button type="button" class="btn btn-block btn-warning btn-sm"><span class="fa fa-edit"></span></button></a></td>
                <td><a href="#"><button type="button" class="btn btn-block btn-danger btn-sm"><span class="fa fa-trash"></span></button></a></td>
              </tr>
            <!-- <tfoot style="text-align: center">
              <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Divisi</th>
                <th>Departemen</th>
                <th>Status Kompetensi Departemen</th>
                <th>Status Kompetensi Jabatan</th>
                <th></th>
                <th></th>
              </tr>
            </tfoot> -->
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
<script src="AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- DataTables -->
<script src="AdminLTE/plugins/datatables/jquery.dataTables.js"></script>
<script src="AdminLTE/plugins/datatables/dataTables.bootstrap4.js"></script>
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
    'use strict';
    $('#tabel-training').dataTable({
        "bJQueryUI": true,
        "bStateSave": true,
        "scrollX": true
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
        filter_type: "range_number"
    }, {
        column_number: 4,
        filter_type: "range_number"
    }, {
        column_number: 5,
        filter_type: "range_number"
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
        filter_type: "multi_select",
        select_type: 'select2'
    }, {
        column_number: 9,
        filter_type: "range_number"
      }, {
        column_number: 10,
        filter_type: "range_number"
    }]);
  });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

@endsection

