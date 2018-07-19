@extends('master.app')
@section('title') Data Departemen @endsection
@section('css')
<!-- DataTables -->
  <link rel="stylesheet" href="/AdminLTE/plugins/datatables/dataTables.bootstrap4.css">
<!-- Select2 -->
  <link rel="stylesheet" href="/AdminLTE/plugins/select2/select2.min.css">
@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Departemen</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Departemen</li>
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
          <h3 class="card-title">Data Departemen
            <div style="float: right;">
              <a href="departemen/tambah"><button type="button" class="btn btn-block btn-primary">+ Tambah</button></a>
            </div>
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="tabel-departemen" class="table table-bordered table-striped">
            <thead style="text-align: center">
              <tr>
                <th width="5%">No</th>
                <th>ID</th>
                <th>Nama</th>
                <th>Kompetensi</th>
                <th width="5%"></th>
                <th width="5%"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>ACB1DEPT</td>
                <td>Acquiring Business I Department</td>
                <td><button type="button" class="btn btn-block btn-secondary btn-sm"data-toggle="modal" data-target="#lihatKompetensi">lihat</button></td>
                <td><a href="/departemen/edit"><button type="button" class="btn btn-block btn-warning btn-sm"><span class="fa fa-edit"></span></button></a></td>
                <td><a href="#"><button type="button" class="btn btn-block btn-danger btn-sm"><span class="fa fa-trash"></span></button></a></td>
              </tr>
              <tr>
                <td>2</td>
                <td>ACB2DEPT</td>
                <td>Acquiring Business II Department</td>
                <td><button type="button" class="btn btn-block btn-secondary btn-sm"data-toggle="modal" data-target="#lihatKompetensi">lihat</button></td>
                <td><a href="/departemen/edit"><button type="button" class="btn btn-block btn-warning btn-sm"><span class="fa fa-edit"></span></button></a></td>
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

<!-- Modal lihat kompetensi -->
<div class="modal fade" id="lihatKompetensi" tabindex="-1" role="dialog" aria-labelledby="lihatKompetensi" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="lihatKompetensi">Lihat Kompetensi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center;">
        <div style="float: right; margin-bottom: 20px">
          <button type="button" class="btn btn-block btn-sm btn-primary" style="padding-top: 2px; padding-bottom: 2px" data-toggle="modal" data-target="#tambahKompetensi">+ Tambah</button>
        </div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Kompetensi</th>
              <th>Level</th>
              <th>K. Pendahulu</th>
              <th width="5%"></th>
              <th width="5%"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Manajemen</td>
              <td>2</td>
              <td>Finance</td>
              <td><button type="button" class="btn btn-block btn-warning btn-sm"><span class="fa fa-edit" data-toggle="modal" data-target="#editKompetensi"></span></button></td>
              <td><a href="#"><button type="button" class="btn btn-block btn-danger btn-sm"><span class="fa fa-trash"></span></button></a></td>
            </tr>
            <tr>
              <td>2</td>
              <td>Finance</td>
              <td>1</td>
              <td>-</td>
              <td><button type="button" class="btn btn-block btn-warning btn-sm"><span class="fa fa-edit" data-toggle="modal" data-target="#editKompetensi"></span></button></td>
              <td><a href="#"><button type="button" class="btn btn-block btn-danger btn-sm"><span class="fa fa-trash"></span></button></a></td>
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

<!-- Modal tambah kompetensi -->
<div class="modal fade" id="tambahKompetensi" tabindex="-1" role="dialog" aria-labelledby="tambahKompetensi" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahKompetensi">Tambah Kompetensi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form">
          <div class="card-body">
            <div class="form-group">
              <label for="nama_kompetensi">Nama Kompetensi</label>
              <select name="nama_kompetensi" class="form-control select2" style="width: 100%;">
                <option selected="selected">Manajemen</option>
                <option>Finance</option>
                <option>Public Speaking</option>
              </select>
            </div>
            <div class="form-group">
              <label for="level_kompetensi">Level</label>
              <input name="level_kompetensi" type="number" class="form-control" id="level_kompetensi" placeholder="Masukkan Level Kompetensi">
            </div>
            <div class="form-group">
              <label for="kompetensi_pendahulu">Kompetensi Pendahulu</label>
              <select name="kompetensi_pendahulu" class="form-control select2" style="width: 100%;">
                <option>Manajemen</option>
                <option selected="selected">Finance</option>
                <option>Public Speaking</option>
              </select>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal edit kompetensi -->
<div class="modal fade" id="editKompetensi" tabindex="-1" role="dialog" aria-labelledby="editKompetensi" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editKompetensi">Edit Kompetensi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form">
          <div class="card-body">
            <div class="form-group">
              <label for="nama_kompetensi">Nama Kompetensi</label>
              <select name="nama_kompetensi" class="form-control select2" style="width: 100%;">
                <option selected="selected">Manajemen</option>
                <option>Finance</option>
                <option>Public Speaking</option>
              </select>
            </div>
            <div class="form-group">
              <label for="level_kompetensi">Level</label>
              <input name="level_kompetensi" type="number" class="form-control" id="level_kompetensi" placeholder="Masukkan Level Kompetensi">
            </div>
            <div class="form-group">
              <label for="kompetensi_pendahulu">Kompetensi Pendahulu</label>
              <select name="kompetensi_pendahulu" class="form-control select2" style="width: 100%;">
                <option>Manajemen</option>
                <option selected="selected">Finance</option>
                <option>Public Speaking</option>
              </select>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
@section('script')
<!-- jQuery -->
<script src="AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- DataTables -->
<script src="AdminLTE/plugins/datatables/jquery.dataTables.js"></script>
<script src="AdminLTE/plugins/datatables/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    $("#tabel-departemen").DataTable();
  });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<!-- Select2 -->
<script src="/AdminLTE/plugins/select2/select2.full.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>

@endsection

