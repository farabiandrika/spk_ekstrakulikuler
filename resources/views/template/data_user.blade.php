@extends('template.app')

@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <!-- <div class="title_left">
                <h3>Users <small>Some examples to get you started</small></h3>
              </div> -->


    </div>

    <div class="clearfix"></div>

    <div class="row">
      @if(session('Berhasil'))
      <div class="alert alert-success" id="peringatan">
        {{ session('Berhasil') }}
      </div>
      @endif

      @if(session('Gagal'))
      <div class="alert alert-danger" id="peringatan">
        {{ session('Gagal') }}
      </div>
      @endif





      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data User</h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target=".modal-tambah-user">Tambah User</button>
            <br /><br />
            <table class="datatable-fixed-header table table-striped table-bordered">
              <thead>
                <tr>
                  <th align="center">No</th>
                  <th align="center">Nama</th>
                  <th align="center">Email</th>
                  <th align="center">Jabatan</th>
                  <th align="center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $key => $value)
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $value->name }}</td>
                  <td>{{ $value->email }}</td>
                  <td>{{ $value->role == 'admin' ? 'Admin' : 'Kepala Bidang' }}</td>
                  <td>
                    <button class="btn btn-xs btn-warning edit" data-id="{{ $value->id }}" data-name="{{ $value->name }}" data-email="{{ $value->email }}" data-role="{{ $value->role }}">Edit</button>
                    <button class="btn btn-xs btn-danger hapus" data-id="{{ $value->id }}" data-name="{{ $value->name }}">Hapus</button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade modal-tambah-user" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Tambah User</h4>
      </div>
      <div class="modal-body">
        <form action="/data_user" method="post" data-parsley-validate class="form-horizontal form-label-left">
          {{ csrf_field() }}
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama User</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="name" type="text" id="name" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nama User">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="email" type="email" id="email" required="required" class="form-control col-md-7 col-xs-12" placeholder="Email">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="password" type="password" id="password" required="required" class="form-control col-md-7 col-xs-12" placeholder="Password">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="role">Jabatan<span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="role" id="role" required>
                <option value="" selected>Pilih Jabatan</option>
                <option value="admin">Admin</option>
                <option value="kepala_bidang">Kepala Bidang</option>
              </select>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade modal-edit-user" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Edit user</h4>
      </div>
      <div class="modal-body">
        <form action="/data_user" method="post" data-parsley-validate class="form-horizontal form-label-left">
          {{ method_field('patch') }}
          {{ csrf_field() }}
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama User</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="name" type="text" id="edit-name" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="email" type="email" id="edit-email" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="role">Jabatan<span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="role" id="edit-role" required>
                <option value="admin">Admin</option>
                <option value="kepala_bidang">Kepala Bidang</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="password" type="password" id="edit-password" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade modal-hapus-user" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Hapus user</h4>
      </div>
      <div class="modal-body">
        <form action="/data_user" method="post" data-parsley-validate class="form-horizontal form-label-left">
          {{ method_field('delete') }}
          {{ csrf_field() }}
          Apakah Anda yakin akan menghapus user <span id="hapus-name"></span>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
        <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- /page content -->

<!-- modals -->
<!-- Large modal -->

<!-- footer content -->
<footer>
  <div class="pull-right">
    ©2020 Sistem Pendukung Keputusan Perbaikan Jalan.
  </div>
  <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>

<!-- jQuery -->
<script src="/template/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/template/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/template/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="/template/nprogress/nprogress.js"></script>
<!-- iCheck -->
<script src="/template/iCheck/icheck.min.js"></script>
<!-- Datatables -->
<script src="/template/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/template/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script src="/template/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>

<script src="/template/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="/template/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="https://cdn.datatables.net/scroller/1.4.2/js/dataTables.scroller.min.js"></script>
<script src="/template/jszip/dist/jszip.min.js"></script>

<!-- Custom Theme Scripts -->
<script src="/template/js/custom.min.js"></script>

<script>
  $('button.edit').click(function() {
    $('#edit-name').val($(this).data('name'));
    $('#edit-email').val($(this).data('email'));
    $('#edit-role').val($(this).data('role'));
    $('.modal-edit-user form').attr('action', '/data_user/' + $(this).data('id'))
    $('.modal-edit-user').modal('show');
  })

  $('button.hapus').click(function() {
    $('#hapus-name').html($(this).data('name'));
    $('.modal-hapus-user form').attr('action', '/data_user/' + $(this).data('id'))
    $('.modal-hapus-user').modal('show');
  })
</script>

</body>

</html>
@endsection