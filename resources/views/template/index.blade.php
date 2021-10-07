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
    <div class="jumbotron">
      <center>
        <h1>Sistem Pendukung Keputusan</h1>
        <h1>Perbaikan Jalan</h1>
        <h3>di Kota Pekanbaru</h3>
      </center>
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
      $(document).ready(function() {
        $('#dataTables-example').DataTable({
          responsive: true
        });

        //waktu mundur
        var detik = 5;
        var menit = 0;

        function hitung() {
          setTimeout(hitung, 1000);
          detik--;
          if (detik < 0) {
            detik = 59;
            menit--;
            if (menit < 0) {
              menit = 0;
              detik = 0;
            }
            $('#peringatan').hide();
          }

        }
        hitung();
      });

      $(document).on('click', 'button.btn_edit', function() {
        var nama = $(this).attr('data-nama');
        var kepentingan = $(this).attr('data-bobot');
        var jenis = $(this).attr('data-benefit');

        var action = 'data_kriteria/' + $(this).attr('data-id');

        $('#edit_nama').val(nama);
        $('#edit_kepentingan').val(kepentingan);
        $('#edit_jenis').val(jenis);
        $("#edit_form").attr("action", action);

      });

      $(document).on('click', 'button.btn_hapus', function() {
        var nama = $(this).attr('data-nama');
        var action = 'data_kriteria/' + $(this).attr('data-id');
        isi_modal = "Apakah Anda Yakin Menghapus Kriteria " + nama;
        $("#modal_hapus_pesan").html(isi_modal);
        $("#hapus_form").attr("action", action);
      });
    </script>

    </body>

    </html>
    @endsection