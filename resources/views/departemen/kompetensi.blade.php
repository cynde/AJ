@extends('master.app')
@section('title') Data Kompetensi Departemen @endsection
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
            <h1 class="m-0 text-dark">KompetensiDepartemen</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Kompetensi Departemen</li>
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
          <h3 class="card-title">Data Kompetensi Departemen
            <div style="float: right; margin-bottom: 20px">
              <button type="button" class="btn btn-block btn-sm btn-primary" style="padding-top: 2px; padding-bottom: 2px" data-toggle="modal" data-target="#tambahKompetensi">+ Tambah</button>
            </div>
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          @if($all->count())
          <table id="tabel-kompetensi-departemen" class="table table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Kompetensi</th>
                <th>Level</th>
                <th>Kompetensi Pendahulu</th>
                <th width="5%"></th>
                <th width="5%"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($all as $a)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$a->nama_kompetensi}}</td>
                <td>{{$a->level_kompetensi}}</td>
                <td>{{$a->kompetensi_pendahulu}}</td>
                <td><button type="button" class="btn btn-block btn-warning btn-sm"><span class="fa fa-edit" data-toggle="modal" data-target="#editKompetensi"></span></button></td>
                <td><a href="#"><button type="button" class="btn btn-block btn-danger btn-sm"><span class="fa fa-trash"></span></button></a></td>
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
              <label for="id_kompetensi">Nama Kompetensi</label>
              <select name="id_kompetensi" class="form-control select2" style="width: 100%;">
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
            <button id="add" type="submit" class="btn btn-primary">Tambah</button>
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
              <label for="id_kompetensi">Nama Kompetensi</label>
              <select name="id_kompetensi" class="form-control select2" style="width: 100%;">
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
    $("#tabel-kompetensi-departemen").DataTable();
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
<script>
  $('#add').click(function()){
    $.ajax({
      type: 'POST',
      url: 'addKompetensi',
      data: {
        '_token' : $('input[name=_token]').val();
        'id_kompetensi' : $('input[name=id_kompetensi]').val();
        'level_kompetensi' : $('input[name=level_kompetensi]').val();
        'kompetensi_pendahulu' : $('input[name=kompetensi_pendahulu]').val();
      },
      success: function(data){
        $('#table').append("<tr>"+
                "<td></td>"+
                "<td>" + data.id_kompetensi + "</td>"+
                "<td>" + data.level_kompetensi + "</td>"+
                "<td>" + data.kompetensi_pendahulu + "</td>"+
                "<td><button type="button" class="btn btn-block btn-warning btn-sm"><span class="fa fa-edit" data-toggle="modal" data-target="#editKompetensi"></span></button></td>"+
                "<td><a href="#"><button type="button" class="btn btn-block btn-danger btn-sm"><span class="fa fa-trash"></span></button></a></td>"+
              "</tr>")
      }
    })
  }
</script>

@endsection

