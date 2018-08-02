@extends('master.app')
@section('title') Data Pegawai @endsection
@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="/AdminLTE/plugins/datatables/dataTables.bootstrap4.css">
<!-- Select2 -->
<link rel="stylesheet" href="/AdminLTE/plugins/select2/select2.min.css">
{{-- export --}}
<link rel="stylesheet" href="/css/buttons.dataTables.min.css">

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
        @if($all->count())
          <table id="tabel-pegawai" class="table table-bordered table-striped">
            <thead style="text-align: center">
              <tr>
                <th>No</th>
                <th width="10%">NIK</th>
                <th width="35%">Nama</th>
                <th>Departemen</th>
                <th>Jabatan</th>
                <th width="12%">Status Kompetensi Departemen</th>
                <th width="12%">Status Kompetensi Jabatan</th>
                <th width="5%"></th>
                <th width="5%"></th>
              </tr>
            </thead>
            <tbody>
            @foreach($all as $a)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$a->nik_pegawai}}</td>
                <td width="20%">{{$a->nama_pegawai}}</td>
                <td width="15%">{{$a->nama_departemen}}</td>
                <td>{{$a->nama_jabatan}}</td>
                <td><button type="button" class="btn btn-block btn-secondary btn-sm" id="lihatKD" data-id="{{$a->nik_pegawai}}">lihat</button></td>
                <td><button type="button" class="btn btn-block btn-secondary btn-sm" id="lihatKJ" data-id="{{$a->nik_pegawai}}">lihat</button></td>
                <td><a href="/pegawai/edit/{{$a->nik_pegawai}}"><button type="button" class="btn btn-block btn-warning btn-sm"><span class="fa fa-edit"></span></button></a></td>
                <td><form action="/pegawai/delete/{{$a->nik_pegawai}}" method="POST">
                  {{csrf_field()}}
                  <button type="submit" class="btn btn-block btn-danger btn-sm"><span class="fa fa-trash"></span></button>
                </form></td>
              </tr>
              @endforeach
          </table>
          @else
            <p>Tidak ada data</p>
          @endif
        </div>
        <!-- /.card-body -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- Modal kompetensi departemen -->
<div class="modal fade" id="kompetensiDepartemen" tabindex="-1" role="dialog" aria-labelledby="kompetensiDepartemen" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="kompetensiDepartemen">Kompetensi Departemen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center;">
        <table id="table-kompetensi-departemen" class="table table-striped">
          <thead>
            <tr>
              <th>Nama Kompetensi</th>
              <th>Nama Training</th>
            </tr>
          </thead>
          <tbody id="KDDetailBody">
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal kompetensi jabatan -->
<div class="modal fade" id="kompetensiJabatan" tabindex="-1" role="dialog" aria-labelledby="kompetensiJabatan" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="kompetensiJabatan">Kompetensi Jabatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center;">
        <table id="table-kompetensi-jabatan" class="table table-striped">
          <thead>
            <tr>
              <th>Nama Kompetensi</th>
              <th>Nama Training</th>
            </tr>
          </thead>
          <tbody id="KJDetailBody">

          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</div>
@endsection
@section('script')
<!-- DataTables -->
<script src="/AdminLTE/plugins/datatables/jquery.dataTables.js"></script>
<script src="/AdminLTE/plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

<!-- Select2 -->
<script src="/AdminLTE/plugins/select2/select2.full.min.js"></script>
{{-- export table --}}
<script src="/js/dataTables.buttons.min.js"></script>
<script src="/js/jszip.min.js"></script>
<script src="/js/buttons.html5.min.js"></script>
<script src="/js/vfs_fonts.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>
<script>
  $(document).ready(function() {
    'use strict';
    $('#tabel-pegawai').dataTable({
        "bJQueryUI": true,
        "bStateSave": true,
        "scrollX": true
    })
    $('#table-kompetensi-departemen').dataTable({
        "bJQueryUI": true,
        "bStateSave": true,
        "paging":   false,
        "ordering": false,
        "info": false,
        "bFilter": false,
        dom: 'Bfrtip',
        buttons: [
            'excelHtml5']
    })
    $('#table-kompetensi-jabatan').dataTable({
        "bJQueryUI": true,
        "bStateSave": true,
        "paging":   false,
        "ordering": false,
        "info": false,
        "bFilter": false,
        dom: 'Bfrtip',
        buttons: [
            'excelHtml5']
    })
  });
</script>

<script type="text/javascript">
$(document).ready(function() {
  $(document).on('click','#lihatKD',function(e) {
    jQuery.noConflict();
    // $('#lihatDepartemen').modal('show');
    $.ajaxSetup({
        headers:{'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
    })
    e.preventDefault(e);
    var triggerid = $(this).data('id');
    $.ajax({
      type: 'get',
      url: '/pegawai/showKD/'+ triggerid,
      dataType: 'json',
      success: function(message) {
        // console.log(message)
          jQuery.noConflict();
          document.getElementById('KDDetailBody').innerHTML = '';
          var tableAppend = '<tr><td colspan="2"><b>SUDAH</b></td></tr>';
          for(var i = 0; i < message.done.length; i++) {
              tableAppend += '<tr><td>' + message.done[i]['nama_kompetensi'] + '</td><td>' + message.done[i]['nama_training'] + '</td></tr>';
          };
          tableAppend += '<tr><td colspan="2"><b>BELUM</b></td></tr>';
          for(var i = 0; i < message.undone.length; i++) {
              tableAppend += '<tr><td>' + message.undone[i]['nama_kompetensi'] + '</td><td>' + message.undone[i]['nama_training'] + '</td></tr>';
          };
          $('#KDDetailBody').append(tableAppend);
          $('#kompetensiDepartemen').modal('show');
      },
      error: function(message){
        console.log(message);
      }
    });
  });
});
</script>

<script type="text/javascript">
$(document).ready(function() {
  $(document).on('click','#lihatKJ',function(e) {
    jQuery.noConflict();
    // $('#lihatDepartemen').modal('show');
    $.ajaxSetup({
        headers:{'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
    })
    e.preventDefault(e);
    var triggerid = $(this).data('id');
    $.ajax({
      type: 'get',
      url: '/pegawai/showKJ/'+ triggerid,
      dataType: 'json',
      success: function(message) {
        // console.log(message)
          jQuery.noConflict();
          document.getElementById('KJDetailBody').innerHTML = '';
          var tableAppend = '<tr><td colspan="2"><b>SUDAH</b></td></tr>';
          for(var i = 0; i < message.done.length; i++) {
              tableAppend += '<tr><td>' + message.done[i]['nama_kompetensi'] + '</td><td>' + message.done[i]['nama_training'] + '</td></tr>';
          };
          tableAppend += '<tr><td colspan="2"><b>BELUM</b></td></tr>';
          for(var i = 0; i < message.undone.length; i++) {
              tableAppend += '<tr><td>' + message.undone[i]['nama_kompetensi'] + '</td><td>' + message.undone[i]['nama_training'] + '</td></tr>';
          };
          $('#KJDetailBody').append(tableAppend);
          $('#kompetensiJabatan').modal('show');
      },
      error: function(message){
        console.log(message);
      }
    });
  });
});
</script>
@endsection

