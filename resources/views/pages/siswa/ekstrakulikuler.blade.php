@extends('layouts.main')

@section('title', 'Ekstrakulikuler')

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
            <h2>Pemilihan Ekstrakulikuler</h2>

            <div class="clearfix"></div>
          </div>
          <div id="mywizard">
            <div class="x_content step step1">
              <form id="ekstrakulikuler">
  
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Ekstrakulikuler</th>
                      @foreach ($kriterias as $kriteria)
                      <th scope="col">{{ $kriteria->nama }}</th>
                      @endforeach
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($ekstrakulikulers as $ekstrakulikuler)
                        <tr>
                          <th scope="row">{{ $ekstrakulikuler->nama }}</th>
                          @for ($i = 0; $i < count($kriterias); $i++)
                          <td>
                            <select required name="{{ $ekstrakulikuler->id }}_pilihan_{{ $kriterias[$i]->id }}">
                              <option value="" selected disabled>Pilih</option>
                              <option value="1">Ya</option>
                              <option value="0">Tidak</option>
                            </select>
                          </td>
                          @endfor
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                <button type="submit" class="btn btn-primary">Selanjutnya</button>
              </form>
            </div>

            <div class="x_content step step2">
              <h3>Kami Merekomendasikan :</h3>
              <div id="select_ekskul" style="margin-bottom: 50px">
                {{-- <h4>2. Satu <button type="button" class="btn btn-xs btn-primary">Pilih</button></h4> --}}
              </div>
              <button type="button" class="btn back btn-secondary">Back</button>
            </div>
            
          
        </div>
        
      </div>
    </div>
  </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="{{ asset('template/jquery-stepper/jquery.stepper.src.js') }}"></script>
    <script type="text/javascript">
        var myWizard = $('#mywizard').stepper();
        myWizard.showStep(1);

        // Next Step
        $(document).on('submit','#ekstrakulikuler', function(e) {
            e.preventDefault()

            $.ajax({
                method: "POST",
                url: "{{route('hitung')}}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: $(this).serialize(),
                dataType: 'JSON',
                error: function(xhr, status, error) {
                  for (variable in xhr.responseJSON.data) {
                    toastr.error(xhr.responseJSON.data[variable])
                  }
                },
                success: function(response){        
                  for (variable in response.data) {
                    console.log(response.data[variable])                    
                    $('#select_ekskul').append(`<h4>${+variable+1}. ${response.data[variable].nama} <button type="button" data-id="${response.data[variable].id}" data-nama="${response.data[variable].nama}" class="btn pilih btn-xs btn-primary">Pilih</button></h4>`)
                  }
                  $('#ekstrakulikuler').trigger("reset");                  
                }
            }).done(function() {
              myWizard.nextStep()
            })
        })  

        // Back Step
        $(document).on('click', '.back', function() {
          $('#select_ekskul').html("")
          myWizard.prevStep()
        })

        // Pilih Ekskul
        $(document).on('click', '.pilih', function(e) {
          e.preventDefault()
          let id = $(this).data("id"), nama = $(this).data("nama")
          swal({
              title: "Kamu yakin?",
              text: `Kamu akan memilih ekskul ${nama}`,
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Iya",
              cancelButtonText: "Tidak",
              closeOnConfirm: false,
              closeOnCancel: false
          }, function(isConfirm){
              if (isConfirm) {
                  $.ajax({
                          url: "{{ url('/api/ekstrakulikuler/pilihEkskul') }}" + "/" + id + "/" + {{ auth()->user()->id }},
                          type: 'GET',
                          // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                          success: function (response){
                              console.log(response)
                          }
                      }).done(() => {
                        swal.close()
                        toastr.success('Berhasil mengambil Ekstrakulikuler')
                        setTimeout(function(){ location.reload() },1000);
                      });                  
              } else {
                  swal.close()
              }
          })
        })
    </script>
@endsection