@extends('layouts.main')

@section('extra-css')
  <style>
    [id*='Id_']{
      cursor:pointer;
    }
  </style>
@endsection

@section('content')
<section class="wrapper bg-soft-primary">
  <div class="container ">
    {{-- @include('carte.carte.svg') bg-soft-primary--}}
    <div class="row text-center gy-10 gy-sm-1 gx-lg-3 align-items-center mb-14 mb-md-1 mb-lg-1">
      <div class="col-xl-11 mx-auto">
        @php
            include('carte/mfoudi.svg')
        @endphp
      </div>
      <!-- /column -->
    </div>
    <!-- /.row -->
    
    <!-- /div -->
    <!--/.row -->
  </div>
  <!-- /.container -->
  {{-- <div class="container-fluid px-md-6">
    <div class="swiper-container blog grid-view mb-17 mb-md-19" data-margin="30" data-nav="true" data-dots="true" data-items-xxl="3" data-items-md="2" data-items-xs="1">
      <div class="swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <figure class="rounded"><img src="dist/assets/img/photos/pp10.jpg" alt="" /></figure>
          </div>
          <!--/.swiper-slide -->
          <div class="swiper-slide">
            <figure class="rounded"><img src="dist/assets/img/photos/pp11.jpg" alt="" /></figure>
          </div>
          <!--/.swiper-slide -->
          <div class="swiper-slide">
            <figure class="rounded"><img src="dist/assets/img/photos/pp12.jpg" alt="" /></figure>
          </div>
          <!--/.swiper-slide -->
          <div class="swiper-slide">
            <figure class="rounded"><img src="dist/assets/img/photos/pp13.jpg" alt="" /></figure>
          </div>
          <!--/.swiper-slide -->
          <div class="swiper-slide">
            <figure class="rounded"><img src="dist/assets/img/photos/pp14.jpg" alt="" /></figure>
          </div>
          <!--/.swiper-slide -->
          <div class="swiper-slide">
            <figure class="rounded"><img src="dist/assets/img/photos/pp15.jpg" alt="" /></figure>
          </div>
          <!--/.swiper-slide -->
          <div class="swiper-slide">
            <figure class="rounded"><img src="dist/assets/img/photos/pp16.jpg" alt="" /></figure>
          </div>
          <!--/.swiper-slide -->
        </div>
        <!--/.swiper-wrapper -->
      </div>
      <!-- /.swiper -->
    </div>
    <!-- /.swiper-container -->
  </div> --}}
  <!-- /.container-fluid -->
  
</section>
<section class="wrapper bg-light">
  <div class="container">
    <div class="row gy-10 gy-sm-1 gx-lg-3 align-items-center mb-1 mb-md-1 mb-lg-1">
      <section class="wrapper bg-light">
        <div class="container py-8 py-md-10">
          <div class="row text-center">
            <div class="col-xl-11 mx-auto">
              <h3 class="display-4 mb-15 px-xxl-15">Base de données des personnes handicapées et des services sociaux de base du département du Mfoundi</h3>
            </div>
            <!-- /column -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-xl-11 mx-auto">
              
              <div class="job-list mb-10">
                <h3 class="mb-4">Personnes handicapées</h3>
                <!-- /.card -->
                <a href="{{route('handicape')}}" class="card mb-4 lift">
                  <div class="card-body p-5">
                    <span class="row justify-content-between align-items-center">
                      <span class="col-md-5 mb-2 mb-md-0 d-flex align-items-center text-body">
                        <span class="avatar bg-green text-white w-9 h-9 fs-17 me-3">PH</span> Personnes handicapées </span>
                      <span class="col-5 col-md-3 text-body d-flex align-items-center">
                        <i class="uil uil-map me-1"></i> Mfoundi </span>
                      <span class="col-7 col-md-4 col-lg-3 text-body d-flex align-items-center">
                        <i class="uil uil-location-arrow me-1"></i> {{$handicap}} </span>
                      <span class="d-none d-lg-block col-1 text-center text-body">
                        <i class="uil uil-angle-right-b"></i>
                      </span>
                    </span>
                  </div>
                  <!-- /.card-body -->
                </a>
                <!-- /.card -->
              </div>
              <div class="job-list">
                <h3 class="mb-4">Services sociaux de base</h3>
                <a href="{{route('service')}}" class="card mb-4 lift">
                  <div class="card-body p-5">
                    <span class="row justify-content-between align-items-center">
                      <span class="col-md-5 mb-2 mb-md-0 d-flex align-items-center text-body">
                        <span class="avatar bg-purple text-white w-9 h-9 fs-17 me-3">SS</span> Services sociaux </span>
                      <span class="col-5 col-md-3 text-body d-flex align-items-center">
                        <i class="uil uil-map me-1"></i> Mfoundi</span>
                      <span class="col-7 col-md-4 col-lg-3 text-body d-flex align-items-center">
                        <i class="uil uil-location-arrow me-1"></i> {{$service}} </span>
                      <span class="d-none d-lg-block col-1 text-center text-body">
                        <i class="uil uil-angle-right-b"></i>
                      </span>
                    </span>
                  </div>
                  <!-- /.card-body -->
                </a>
                <!-- /.card -->
              </div>

              <div class="job-list">
                <h3 class="mb-4">Acteurs</h3>
                <!-- /.card -->
                <a href="{{route('acteur')}}" class="card mb-4 lift">
                  <div class="card-body p-5">
                    <span class="row justify-content-between align-items-center">
                      <span class="col-md-5 mb-2 mb-md-0 d-flex align-items-center text-body">
                        <span class="avatar bg-orange text-white w-9 h-9 fs-17 me-3">AC</span> Acteurs </span>
                      <span class="col-5 col-md-3 text-body d-flex align-items-center">
                        <i class="uil uil-map me-1"></i> Mfoundi </span>
                      <span class="col-7 col-md-4 col-lg-3 text-body d-flex align-items-center">
                        <i class="uil uil-location-arrow me-1"></i> {{$acteur}} </span>
                      <span class="d-none d-lg-block col-1 text-center text-body">
                        <i class="uil uil-angle-right-b"></i>
                      </span>
                    </span>
                  </div>
                  <!-- /.card-body -->
                </a>
                <!-- /.card -->
              </div>
            </div>
            <!-- /column -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->
      </section>
      <!-- /section -->
      <section class="wrapper bg-light wrapper-border">
        <div class="container py-8 py-md-10">
          {{-- <h2 class="fs-15 text-uppercase text-muted text-center mb-8">Trusted by Over 5000 Clients</h2> --}}
          <div class="swiper-container clients mb-0" data-margin="30" data-dots="false" data-autoplay-timeout="3000" data-items-xxl="7" data-items-xl="6" data-items-lg="5" data-items-md="4" data-items-xs="2">
            <div class="swiper">
              <div class="swiper-wrapper">
                @foreach ($partenaires as $item)
                  <div class="swiper-slide px-5"><img src="{{asset('/storage/imgs/'.$item->logo)}}" alt="" /></div>
                @endforeach
                
              </div>
              <!--/.swiper-wrapper -->
            </div>
            <!-- /.swiper -->
          </div>
          <!-- /.swiper-container -->
        </div>
        <!-- /.container -->
      </section>
      <!-- /section -->              
      
    </div>
    <!--/.row -->
    
  </div>
  <!--/.container -->
</section>
<!-- /section -->
@endsection
@section('extra-js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript">
    $(function(){
      $('[id*=Id_').on('click', function(){
        //console.log($(this));darkgreen
        let commune= $(this);

        let communeId= $(this)["0"].id;
        let communeTitre= $(this)["0"].innerHTM;

        let allCommune=$('[id*=Id_');
        

        allCommune.css('fill','#fff');
        commune.css('fill','#f8d210');
        commune.css('hover','#f8d210');

        communeId=communeId.replace('Id_','');
        let chaine= communeId.split('_')
        let id=chaine[1];
        let slug=chaine[0];
        console.log(id,'mon',slug);
        window.location.href = "/commune-"+slug;
        
      })
    });

    $(function(){
      $('[id*=Id_').on('mouseenter', function(){
        let commune= $(this);

        let communeId= $(this)["0"].id;
        let communeTitre= $(this)["0"].innerHTM;

        let allCommune=$('[id*=Id_');
        

        allCommune.css('fill','#fff');
        commune.css('fill','#f8d210');
      })
    });
  </script>

@endsection