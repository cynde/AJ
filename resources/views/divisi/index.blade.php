@extends('master.app')
@section('title') Data Divisi @endsection
@section('css')
<!-- DataTables -->
  <link rel="stylesheet" href="AdminLTE/plugins/datatables/dataTables.bootstrap4.css">
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
            <h1 class="m-0 text-dark">Divisi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Divisi</li>
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
          <h3 class="card-title">Data Divisi
            <div style="float: right;">
              <a href="divisi/tambah"><button type="button" class="btn btn-block btn-primary">+ Tambah</button></a>
            </div>
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-3">
              <div class="card" style="height: 95%">
                <div class="card-body text-center">
                  <div style="padding: 20px; margin-bottom: 15px">
                    <strong>Divisi ITO2DIV</strong>
                    <br>
                    (IT Operation 2 Division)
                  </div>
                  <div style="width: 100%">
                    <button style="float: left; margin-bottom: 7px" type="button" class="btn btn-sm btn-block btn-outline-secondary col-sm-12" data-toggle="modal" data-target="#lihatDepartemen"><span class="fa fa-eye"></span> Lihat Departemen</button>
                    <a href="/divisi/edit"><button style="float: left; width: 48%; margin:1%" type="button" class="btn btn-sm btn-block btn-outline-warning"><span class="fa fa-edit"></span> Edit</button></a>
                    <button style="float: left; width: 48%; margin:1%" type="button" class="btn btn-sm btn-block btn-outline-danger"><span class="fa fa-trash"></span> Delete</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card" style="height: 95%">
                <div class="card-body text-center">
                  <div style="padding: 20px; margin-bottom: 15px">
                    <strong>Divisi ITO2DIV</strong>
                    <br>
                    (IT Operation 2 Division)
                  </div>
                  <div style="width: 100%">
                    <button style="float: left; margin-bottom: 7px" type="button" class="btn btn-sm btn-block btn-outline-secondary col-sm-12" data-toggle="modal" data-target="#lihatDepartemen"><span class="fa fa-eye"></span> Lihat Departemen</button>
                    <a href="/divisi/edit"><button style="float: left; width: 48%; margin:1%" type="button" class="btn btn-sm btn-block btn-outline-warning"><span class="fa fa-edit"></span> Edit</button></a>
                    <button style="float: left; width: 48%; margin:1%" type="button" class="btn btn-sm btn-block btn-outline-danger"><span class="fa fa-trash"></span> Delete</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- Modal lihat departemen -->
<div class="modal fade" id="lihatDepartemen" tabindex="-1" role="dialog" aria-labelledby="lihatDepartemen" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="kompetensiDepartemen">Lihat Departemen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center;">
        <div style="float: right; margin-bottom: 20px">
          <button type="button" class="btn btn-block btn-sm btn-primary" style="padding-top: 2px; padding-bottom: 2px" data-toggle="modal" data-target="#tambahDepartemen">+ Tambah</button>
        </div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th width="5%">No</th>
              <th>Nama Departemen</th>
              <th width="5%"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>ACB1DEPT</td>
              <td><a href="#"><button type="button" class="btn btn-block btn-danger btn-sm"><span class="fa fa-trash"></span></button></a></td>
            </tr>
            <tr>
              <td>2</td>
              <td>ACB2DEPT</td>
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

<!-- Modal tambah departemen -->
<div class="modal fade" id="tambahDepartemen" tabindex="-1" role="dialog" aria-labelledby="tambahDepartemen" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahDepartemen">Tambah Departemen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form">
          <div class="card-body">
            <div class="form-group">
              <label for="nama_kompetensi">Nama Departemen</label>
              <select name="nama_kompetensi" class="form-control select2" style="width: 100%;">
                <option selected="selected">ACB1DEPT</option>
                <option>ACB2DEPT</option>
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

