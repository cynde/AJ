@extends('master.app')
@section('title') Edit Rekapitulasi Training @endsection
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
              <li class="breadcrumb-item active">Edit Rekapitulasi Training</li>
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
          <h3 class="card-title">Edit Rekapitulasi Training</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form role="form" action="../update/{{$rt->id_rekapitulasi_training}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="card-body">
            <div class="form-group">
              <label for="id_training">Nama Training</label>
              <select name="id_training" class="form-control select2" style="width: 100%;" disabled>
                <option value="{{$rt->id_training}}">{{$rt->nama_training}} (Tgl: {{$rt->tanggal_training}})</option>
                @foreach($training as $t)
                <option value="{{$t->id_training}}">{{$t->nama_training}} (Tgl: {{$t->tanggal_training}})</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="nik_pegawai">Peserta</label>
              <select name="nik_pegawai" class="form-control select2" style="width: 100%;" disabled>
                <option value="{{$rt->nik_pegawai}}">{{$rt->nama_pegawai}} (Dept: {{$rt->id_departemen}})</option>
                @foreach($pegawai as $p)
                <option value="{{$p->nik_pegawai}}">{{$p->nama_pegawai}} (Dept: {{$p->id_departemen}})</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="justifikasi">Justifikasi</label>
              <input name="justifikasi" type="text" class="form-control" id="justifikasi" value="{{$rt->justifikasi}}" required>
            </div>
            <div class="form-group">
              <label for="biaya_lain">Biaya Lain</label>
              <input name="biaya_lain" type="number" class="form-control" id="biaya_lain" value="{{$rt->biaya_lain}}">
            </div>
            <div class="form-group">
              <label for="keterangan_lain">Keterangan Lain</label>
              <input name="keterangan_lain" type="text" class="form-control" id="keterangan_lain" value="{{$rt->keterangan_lain}}">
            </div>
            <div class="col-sm-6 form-group" style="float: left">
              <label for="fpt_file">FPT Approved</label>
              @if(empty($rt->fpt_file))
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="fpt_file" name="fpt_file">
                  <label class="custom-file-label" for="fpt_file">Choose file</label>
                </div>
              </div>
              @else
              <p>File: {{$rt->fpt_file}}</p>
              @endif
            </div>
            <div class="col-sm-6 form-group" style="float: left">
              <label for="pendaftaran">Pendaftaran</label>
              @if(empty($rt->pendaftaran_file))
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="pendaftaran" name="pendaftaran_file">
                  <label class="custom-file-label" for="pendaftaran">Choose file</label>
                </div>
              </div>
              @else
                <p>File: {{$rt->pendaftaran_file}}</p>
              @endif
            </div>
            <div class="col-sm-6 form-group" style="float: left">
              <label for="undangan_file">Undangan</label>
              @if(empty($rt->undangan_file))
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="undangan_file" name="undangan_file">
                  <label class="custom-file-label" for="undangan_file">Choose file</label>
                </div>
              </div>
              @else
                <p>File: {{$rt->undangan_file}}</p>
              @endif
            </div>
            <div class="col-sm-6 form-group" style="float: left">
              <label for="absensi_file">Absensi</label>
              @if(empty($rt->absensi_file))
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="absensi_file" name="absensi_file">
                  <label class="custom-file-label" for="absensi_file">Choose file</label>
                </div>
              </div>
              @else
                <p>File: {{$rt->absensi_file}}</p>
              @endif
            </div>
            <div class="col-sm-6 form-group" style="float: left">
              <label for="sertifikat_file">Sertifikat</label>
              @if(empty($rt->sertifikat_file))
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="sertifikat_file" name="sertifikat_file">
                  <label class="custom-file-label" for="sertifikat_file">Choose file</label>
                </div>
              </div>
              @else
                <p>File: {{$rt->sertifikat_file}}</p>
              @endif
            </div>
            <div class="col-sm-6 form-group" style="float: left">
              <label for="invoice_file">Invoice</label>
              @if(empty($rt->invoice_file))
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="invoice_file" name="invoice_file">
                  <label class="custom-file-label" for="invoice_file">Choose file</label>
                </div>
              </div>
              @else
                <p>File: {{$rt->invoice_file}}</p>
              @endif
            </div>
            <div class="col-sm-6 form-group" style="float: left">
              <label for="eval_file">Evaluasi</label>
              @if(empty($rt->eval_file))
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="evaluasi_file" name="evaluasi_file">
                  <label class="custom-file-label" for="evaluasi_file">Choose file</label>
                </div>
              </div>
              @else
                <p>File: {{$rt->eval_file}}</p>
              @endif
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

