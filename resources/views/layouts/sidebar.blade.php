<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="{{ url('/') }}" class="site_title"> <img src="{{ asset('images/logopku.png') }}" width="30" height="30" alt=""> <span>Ekstrakulikuler</span></a>
    </div>
    
    <div class="clearfix"></div>
    
    <br />
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
          <h3></h3>
          <ul class="nav side-menu">
            <li class="@yield('home-nav')"><a href="/"><i class="fa fa-home"></i> Home </a></li>
    
            @if (auth()->user()->role == 'admin')
            <li class="@yield('data-master-nav')"><a><i class="fa fa-table"></i> Data Master <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{ url('data-siswa') }}">Data Siswa</a></li>
                <li><a href="{{ url('data-kriteria') }}">Data Kriteria</a></li>
                <li><a href="{{ url('data-ekstrakulikuler') }}">Data Ekstrakulikuler</a></li>
                {{-- <li><a href="{{ url('data-bobot-alternatif') }}">Data Penilaian</a></li>
                <li><a href="{{ url('data-hasil') }}">Hasil Perhitungan</a></li> --}}
              </ul>
            </li>
    
            <li><a href="{{ url('data_perhitungan') }}"><i class="fa fa-calculator"></i>Perhitungan </a></li>
            @endif
    
          </ul>
        </div>
    
    
      </div>
  </div>
</div>