@extends('master.app')
@section('title') Data Pegawai @endsection
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
            <h1 class="m-0 text-dark">Pegawai</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Pegawai</li>
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
          <h3 class="card-title">Data Pegawai
            <div style="float: right;">
              <a href="pegawai/tambah"><button type="button" class="btn btn-block btn-primary">+ Tambah</button></a>
            </div>
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="tabel-pegawai" class="table table-bordered table-striped">
            <thead style="text-align: center">
              <tr>
                <th>No</th>
                <th width="10%">NIK</th>
                <th width="35%">Nama</th>
                <th>Divisi</th>
                <th>Departemen</th>
                <th width="12%">Status Kompetensi Departemen</th>
                <th width="12%">Status Kompetensi Jabatan</th>
                <th width="5%"></th>
                <th width="5%"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>12345</td>
                <td>Cynthia Dewi</td>
                <td>ABC</td>
                <td>DEF</td>
                <td><button type="button" class="btn btn-block btn-secondary btn-sm">lihat</button></td>
                <td><button type="button" class="btn btn-block btn-secondary btn-sm">lihat</button></td>
                <td><a href="#"><button type="button" class="btn btn-block btn-warning btn-sm"><span class="fa fa-edit"></span></button></a></td>
                <td><a href="#"><button type="button" class="btn btn-block btn-danger btn-sm"><span class="fa fa-trash"></span></button></a></td>
              </tr>
              <tr>
                <td>1</td>
                <td>12345</td>
                <td>Cynthia Dewi</td>
                <td>ABC</td>
                <td>DEF</td>
                <td><button type="button" class="btn btn-block btn-secondary btn-sm">lihat</button></td>
                <td><button type="button" class="btn btn-block btn-secondary btn-sm">lihat</button></td>
                <td><a href="#"><button type="button" class="btn btn-block btn-warning btn-sm"><span class="fa fa-edit"></span></button></a></td>
                <td><a href="#"><button type="button" class="btn btn-block btn-danger btn-sm"><span class="fa fa-trash"></span></button></a></td>
              </tr>
              <tr>
                <td>1</td>
                <td>12345</td>
                <td>Cynthia Dewi</td>
                <td>ABC</td>
                <td>DEF</td>
                <td><button type="button" class="btn btn-block btn-secondary btn-sm">lihat</button></td>
                <td><button type="button" class="btn btn-block btn-secondary btn-sm">lihat</button></td>
                <td><a href="#"><button type="button" class="btn btn-block btn-warning btn-sm"><span class="fa fa-edit"></span></button></a></td>
                <td><a href="#"><button type="button" class="btn btn-block btn-danger btn-sm"><span class="fa fa-trash"></span></button></a></td>
              </tr>
            <tfoot style="text-align: center">
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
            </tfoot>
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
    $("#tabel-pegawai").DataTable();
  });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

@endsection

