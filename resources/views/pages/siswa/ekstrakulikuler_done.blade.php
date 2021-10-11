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
            <h2>Info Ekstrakulikuler</h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="jumbotron">
              <h1 class="display-4">Selamat!</h1>
              <p class="lead">Anda telah terdaftar pada ekskul <b>{{ auth()->user()->ekstrakulikuler->nama }}</b></p>
              <hr class="my-4">
              <p>Semangat.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection