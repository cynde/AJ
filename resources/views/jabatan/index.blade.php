@extends('master.app')
@section('title') Jabatan @endsection
@section('css')
<!-- DataTables -->
  <link rel="stylesheet" href="AdminLTE/plugins/datatables/dataTables.bootstrap4.css">
@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Jabatan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Jabatan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">List Jabatan
            <div style="float: right;">
              <a href="jabatan/tambah"><button type="button" class="btn btn-block btn-primary">+ Tambah</button></a>
            </div>
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="tabel-jabatan" class="table table-bordered table-striped">
            <thead style="text-align: center">
              <tr>
                <th width="5%">No</th>
                <th>Nama Jabatan</th>
                <th width="20%">Kompetensi</th>
                <th width="5%"></th>
                <th width="5%"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Manager</td>
                <td><button type="button" class="btn btn-block btn-secondary btn-sm">lihat</button></td>
                <td><a href="#"><button type="button" class="btn btn-block btn-warning btn-sm"><span class="fa fa-edit"></span></button></a></td>
                <td><a href="#"><button type="button" class="btn btn-block btn-danger btn-sm"><span class="fa fa-trash"></span></button></a></td>
              </tr>
              <tr>
                <td>2</td>
                <td>Vice President</td>
                <td><button type="button" class="btn btn-block btn-secondary btn-sm">lihat</button></td>
                <td><a href="#"><button type="button" class="btn btn-block btn-warning btn-sm"><span class="fa fa-edit"></span></button></a></td>
                <td><a href="#"><button type="button" class="btn btn-block btn-danger btn-sm"><span class="fa fa-trash"></span></button></a></td>
              </tr>
              <tr>
                <td>3</td>
                <td>Staff</td>
                <td><button type="button" class="btn btn-block btn-secondary btn-sm">lihat</button></td>
                <td><a href="#"><button type="button" class="btn btn-block btn-warning btn-sm"><span class="fa fa-edit"></span></button></a></td>
                <td><a href="#"><button type="button" class="btn btn-block btn-danger btn-sm"><span class="fa fa-trash"></span></button></a></td>
              </tr>
            <!-- <tfoot style="text-align: center">
              <tr>
                <th>No</th>
                <th>Tahun</th>
                <th>Jumlah Anggaran</th>
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
<script>
  $(function () {
    $("#tabel-jabatan").DataTable();
  });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

@endsection