@extends('layouts.main')

@section('title', 'Data Siswa')

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
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data User</h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#modal-add">Tambah Siswa</button>
            <br /><br />
            <table id="data-siswa" class="table table-striped table-responsive table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Nis</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Modal Edit --}}
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Edit User</h4>
      </div>
      <div class="modal-body">
        <form id="editUser" class="form-horizontal form-label-left">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Username</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="username" type="text" id="username" required="required" class="form-control col-md-7 col-xs-12 noSpace" placeholder="Username">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama User</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="name" type="text" id="name" class="form-control col-md-7 col-xs-12" placeholder="Nama User">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="email" type="email" id="email" class="form-control col-md-7 col-xs-12" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nis">Nomor Induk Siswa</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="nis" type="text" id="nis" class="form-control number col-md-7 col-xs-12" placeholder="Nomor Induk Siswa">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tempat_lahir">Tempat Lahir</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="tempat_lahir" type="text" id="tempat_lahir" class="form-control col-md-7 col-xs-12" placeholder="Tempat Lahir">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal_lahir">Tanggal Lahir</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" class="form-control disabled date" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" value="">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="password" type="password" id="password" class="form-control col-md-7 col-xs-12" placeholder="Password">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kelas">Kelas
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="kelas" id="kelas">
                <option value="" selected>Pilih Kelas</option>
                <option value="X" id="X">X</option>
                <option value="XI" id="XI">XI</option>
                <option value="XII" id="XII">XII</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jurusan">Jurusan
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="jurusan" id="jurusan">
                <option value="" selected>Pilih Jurusan</option>
                <option value="IPA" id="IPA">IPA</option>
                <option value="IPS" id="IPS">IPS</option>
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

{{-- Modal Add --}}
<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Add Siswa</h4>
      </div>
      <div class="modal-body">
        <form id="addUser" class="form-horizontal form-label-left">
          @csrf
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Username</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="username" type="text" id="username" required="required" class="form-control col-md-7 col-xs-12 noSpace" placeholder="Username">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Siswa</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="name" type="text" id="name" class="form-control col-md-7 col-xs-12" placeholder="Nama User">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="email" type="email" id="email" class="form-control col-md-7 col-xs-12" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nis">Nomor Induk Siswa</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="nis" type="text" id="nis" class="form-control number col-md-7 col-xs-12" placeholder="Nomor Induk Siswa">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tempat_lahir">Tempat Lahir</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="tempat_lahir" type="text" id="tempat_lahir" class="form-control col-md-7 col-xs-12" placeholder="Tempat Lahir">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal_lahir">Tanggal Lahir</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" class="form-control disabled date" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" value="">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="password" type="password" id="password" required class="form-control col-md-7 col-xs-12" placeholder="Password">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kelas">Kelas
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="kelas" id="kelas">
                <option value="" selected>Pilih Kelas</option>
                <option value="X" id="X">X</option>
                <option value="XI" id="XI">XI</option>
                <option value="XII" id="XII">XII</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jurusan">Jurusan
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="jurusan" id="jurusan">
                <option value="" selected>Pilih Jurusan</option>
                <option value="IPA" id="IPA">IPA</option>
                <option value="IPS" id="IPS">IPS</option>
              </select>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('css')
{{-- <link rel="stylesheet" type="text/css" media="all" href="{{ asset('template/bootstrap-daterangepicker/daterangepicker.css') }}" /> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('template/moment/moment.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script type="text/javascript" src="{{ asset('template/bootstrap-daterangepicker/daterangepicker.js') }}"></script> --}}
    <script>
      $(document).ready(function() {
        $('.date').datepicker({});

        let dataSiswa = $('#data-siswa').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('siswa.index') }}",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'name', name: 'name'},
              {data: 'email', name: 'email'},
              {data: 'username', name: 'username'},
              {data: 'nis', name: 'nis'},
              {
                  data: 'action', 
                  name: 'action', 
                  orderable: true, 
                  searchable: true
              },
          ]
        });
      })

      $(document).on('click','.edit', function() {
          let id = $(this).data("id")
          
          $.get("{{ url('/api/siswa') }}" +'/' + id, function (response) {
              console.log(response.data)
              $('#modal-edit').modal('toggle')
              $('#editUser').data("id",id)
              $('#editUser input[name="username"]').val(response.data.username)
              $('#editUser input[name="name"]').val(response.data.name)
              $('#editUser input[name="email"]').val(response.data.email)
              $('#editUser input[name="nis"]').val(response.data.nis)
              $('#editUser input[name="tempat_lahir"]').val(response.data.tempat_lahir)
              if (response.data.tanggal_lahir == null) {
                $('#editUser input[name="tanggal_lahir"]').val(response.data.tanggal_lahir)                
              }
              $('#editUser option[id="'+response.data.kelas+'"]').attr('selected','selected');
              $('#editUser option[id="'+response.data.jurusan+'"]').attr('selected','selected');
              
          })
      })

      // ADD USER
     $('#addUser').submit(function(e) {
        e.preventDefault()
      
        $.ajax({
            method: "POST",
            url: "{{route('siswa.store')}}",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: $(this).serialize(),
            dataType: 'JSON',
            error: function(xhr, status, error) {
              for (variable in xhr.responseJSON.data) {
                toastr.error(xhr.responseJSON.data[variable])
              }
            },
            success: function(response){
                $('#data-siswa').DataTable().ajax.reload();
                $('#modal-add').modal('toggle');
                $('#addUser').trigger("reset");
            }
        })
    })

    // Edit User
    $('#editUser').submit(function(e){
          e.preventDefault()
          let id = $(this).data('id')
  
          $.ajax({
              method: "PUT",
              url: "{{ url('/api/siswa') }}" + "/" + id,
              data: $(this).serialize(),
              dataType: 'JSON',
              error: function(xhr, status, error) {
                  for (variable in xhr.responseJSON.data) {
                      toastr.error(xhr.responseJSON.data[variable])
                  }
              },
              success: function(response){
                console.log(response)
                  $('#data-siswa').DataTable().ajax.reload();
                  $('#modal-edit').modal('toggle')
                  $('#editUser').trigger("reset");
              }
          })
      })

      // EDIT DELETE PANEN
      $(document).on('click', '.delete', function(e) {
          e.preventDefault()
          let id = $(this).data("id")

          swal({
              title: "Are you sure?",
              text: "You will not be able to recover this imaginary file!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Yes, delete it!",
              cancelButtonText: "No, cancel plx!",
              closeOnConfirm: false,
              closeOnCancel: false
          }, function(isConfirm){
              if (isConfirm) {
                  $.ajax({
                          url: "{{ url('/api/siswa') }}" + "/" + id,
                          type: 'DELETE',
                          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                          success: function (response){
                              console.log(response)
                              $('#data-siswa').DataTable().ajax.reload();
                          }
                      });
                  swal.close()
              } else {
                  swal.close()
              }
          });
      })

    </script>
@endsection