@extends('master.app')
@section('title') Tambah Rekapitulasi Training @endsection
@section('css')
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
            <h1 class="m-0 text-dark">Rekapitulasi Training</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="/rekapitulasiTraining">Rekapitulasi Training</a></li>
              <li class="breadcrumb-item active">Tambah Rekapitulasi Training</li>
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
          <h3 class="card-title">Tambah Rekapitulasi Training</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form">
          <div class="card-body">
            <div class="form-group">
              <label for="tanggal_training">Tanggal Training</label>
              <input name="tanggal_training" type="date" class="form-control" id="tanggal_training" placeholder="Masukkan Tanggal Training">
            </div>
            <div class="form-group col-sm-6" style="float: left">
              <label for="divisi_pegawai">Divisi</label>
              <select class="form-control select2" style="width: 100%;">
                <option selected="selected">ABC</option>
                <option>AAA</option>
                <option>BBB</option>
                <option>CCC</option>
              </select>
            </div>
            <div class="form-group col-sm-6" style="float: left">
              <label for="departemen_pegawai">Departemen</label>
              <select name="departemen_pegawai" class="form-control select2" style="width: 100%;">
                <option selected="selected">ABC</option>
                <option>AAA</option>
                <option>BBB</option>
                <option>CCC</option>
              </select>
            </div>
            <div class="form-group">
              <label for="nama_pegawai">Peserta</label>
              <select name="nama_pegawai" class="form-control select2" style="width: 100%;">
                <option selected="selected">ABC</option>
                <option>AAA</option>
                <option>BBB</option>
                <option>CCC</option>
              </select>
            </div>
            <div class="form-group">
              <label for="nama_training">Nama Training</label>
              <input name="nama_training" type="text" class="form-control" id="nama_training" placeholder="Masukkan Nama Training">
            </div>
            <div class="col-sm-3 form-group" style="float: left">
              <label for="fpt_file">FPT Approved</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="fpt_file" name="fpt_file">
                  <label class="custom-file-label" for="fpt_file">Choose file</label>
                </div>
              </div>
            </div>
            <div class="col-sm-3 form-group" style="float: left">
              <label for="pendaftaran">Pendaftaran</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="pendaftaran" name="pendaftaran">
                  <label class="custom-file-label" for="pendaftaran">Choose file</label>
                </div>
              </div>
            </div>
            <div class="col-sm-3 form-group" style="float: left">
              <label for="undangan_file">Undangan</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="undangan_file" name="undangan_file">
                  <label class="custom-file-label" for="undangan_file">Choose file</label>
                </div>
              </div>
            </div>
            <div class="col-sm-3 form-group" style="float: left">
              <label for="absensi_file">Absensi</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="absensi_file" name="absensi_file">
                  <label class="custom-file-label" for="absensi_file">Choose file</label>
                </div>
              </div>
            </div>
            <div class="col-sm-3 form-group" style="float: left">
              <label for="sertifikat_file">Sertifikat</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="sertifikat_file" name="sertifikat_file">
                  <label class="custom-file-label" for="sertifikat_file">Choose file</label>
                </div>
              </div>
            </div>
            <div class="col-sm-3 form-group" style="float: left">
              <label for="invoice_file">Invoice</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="invoice_file" name="invoice_file">
                  <label class="custom-file-label" for="invoice_file">Choose file</label>
                </div>
              </div>
            </div>
            <div class="col-sm-3 form-group" style="float: left">
              <label for="evaluasi_file">Evaluasi</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="evaluasi_file" name="evaluasi_file">
                  <label class="custom-file-label" for="evaluasi_file">Choose file</label>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
@section('script')
<!-- jQuery -->
<script src="/AdminLTE/plugins/jquery/jquery.min.js"></script>
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

