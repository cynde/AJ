@extends('master.app')
@section('title') Edit Training @endsection
@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="/AdminLTE/plugins/select2/select2.min.css">
<link rel="stylesheet" href="/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.css">
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
              <li class="breadcrumb-item"><a href="/training">List Training</a></li>
              <li class="breadcrumb-item active">Edit List Training</li>
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
          <h3 class="card-title">Edit List Training</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form">
          <div class="card-body">
            <div class="col-sm-6" style="float:left">
              <div class="form-group">
                <label>ID</label>
                <input name="id_training" type="text" class="form-control" id="id_training" placeholder="Masukkan ID Training">
              </div>
            </div>
            <div class="col-sm-6" style="float:left">
              <div class="form-group">
                <label> <i class="fa fa-calendar"></i> Tanggal:</label>
                <input name="tanggal_training" type="date" class="form-control" id="tanggal_training" placeholder="Masukkan Tanggal Training">
                <!-- /.input group -->
              </div>
            </div>
            <div class="form-group">
              <label for="nama_training">Judul Training</label>
              <input name="nama_training" type="text" class="form-control" id="nama_training" placeholder="Masukkan Nama Training">
            </div>
            <div class="bootstrap-timepicker col-sm-6" style="float: left">
                <div class="form-group">
                  <label><i class="fa fa-clock-o"></i> Jam Mulai:</label>

                  <div class="input-group">
                    <input type="text" class="form-control timepicker">
                    <div class="input-group-addon">
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
            <div class="bootstrap-timepicker col-sm-6" style="float: left">
                <div class="form-group">
                  <label><i class="fa fa-clock-o"></i> Jam Selesai:</label>

                  <div class="input-group">
                    <input type="text" class="form-control timepicker">
                    <div class="input-group-addon">
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div> 
            <div class="form-group col-sm-6" style="float: left">
              <label for="media_training">Media</label>
              <select name="media_training" class="form-control select2" style="width: 100%;">
                <option selected="selected">GIAT</option>
                <option>Juara</option>
              </select>
            </div>
            <div class="form-group col-sm-6" style="float: left">
              <label for="topik_training">Topik</label>
              <select name="topik_training" class="form-control select2" style="width: 100%;">
                <option selected="selected">AKRAB</option>
                <option>ASIK</option>
                <option>AJIB</option>
                <option>APIK</option>
              </select>
            </div>
            <div class="form-group col-sm-6" style="float: left">
              <label for="kompetensi_training">Kompetensi</label>
              <select name="kompetensi_training" class="form-control select2" style="width: 100%;">
                <option selected="selected">Finance</option>
                <option>Leadership</option>
                <option>Management</option>
              </select>
            </div>
            <div class="form-group col-sm-6" style="float: left">
              <label for="penyelenggara_training">Penyelenggara</label>
              <select name="penyelenggara_training" class="form-control select2" style="width: 100%;">
                <option selected="selected">Artajasa</option>
                <option>Financial Management Training Center</option>
                <option>Tech in Asia</option>
              </select>
            </div>
            <div class="form-group col-sm-6" style="float: left">
              <label for="harga_training">Harga</label>
              <input name="harga_training" type="number" class="form-control" id="nama_training" placeholder="Masukkan Harga Training">
            </div>
            <div class="form-group col-sm-6" style="float: left">
              <label for="invoice_training">Invoice</label>
              <input name="invoice_training" type="number" class="form-control" id="nama_training" placeholder="Masukkan Invoice Training">
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
<script src="/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="/AdminLTE/plugins/select2/select2.full.min.js"></script>
<script src="/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="/AdminLTE/plugins/daterangepicker/daterangepicker.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker         : true,
      timePickerIncrement: 30,
      format             : 'MM/DD/YYYY h:mm A'
    })
    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
@endsection

