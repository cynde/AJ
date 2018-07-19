@extends('master.app')
@section('title') Rekap Biaya @endsection
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
            <h1 class="m-0 text-dark">Rekap Biaya</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Biaya</li>
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
          <h3 class="card-title">Data Rekap Biaya
            <div style="float: right;">
              <button type="button" class="btn btn-block btn-success"><span class="fa fa-file-excel-o"></span> Export to Excel</button>
            </div>
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="rekap-peserta" class="table table-bordered table-striped">
            <thead style="text-align: center">
              <tr>
                <th width="5%">No</th>
                <th>Bulan</th>
                <th>Nama Training</th>
                <th>Media</th>
                <th>Tanggal Training</th>
                <th>Penyelenggara</th>
                <th>Peserta</th>
                <th>Biaya Training</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Maret</td>
                <td>Customer Engagement</td>
                <td>Giat (Inhouse)</td>
                <td>05-03-18</td>
                <td>ANT</td>
                <td><button type="button" class="btn btn-block btn-secondary btn-sm" data-toggle="modal" data-target="#lihatPeserta">lihat</button></td>
                <td>36.000.000</td>
              </tr>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- Modal lihat peserta -->
<div class="modal fade" id="lihatPeserta" tabindex="-1" role="dialog" aria-labelledby="lihatPeserta" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="lihatPeserta">Lihat Peserta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center;">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Nama Peserta</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Lorem ipsum</td>
            </tr>
            <tr>
              <td>Lorem ipsum</td>
            </tr>
            <tr>
              <td>Lorem ipsum</td>
            </tr>
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
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>
<script>
  $(document).ready(function() {
    'use strict';
    $('#rekap-peserta').dataTable({
        "bJQueryUI": true,
        "bStateSave": true,
        "scrollX": true
    }).yadcf([{
        column_number: 1,
        filter_type: "multi_select",
        select_type: 'select2'
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
        filter_type: "range_date",
        date_format:  'dd-mm-yy'
    }, {
        column_number: 5,
        filter_type: "multi_select",
        select_type: 'select2'
    }, {
        column_number: 7,
        filter_type: "range_number"
    }]);
  });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

@endsection

