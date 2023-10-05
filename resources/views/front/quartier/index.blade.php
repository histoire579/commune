@extends('layouts.main')

@section('extra-css')
    <style>
        .label{
            color: #000;
            margin-bottom: 10px !important;
            margin-left: 5px;
            font-weight: bold;
        }

        .tab, .tab th, .tab td {

        border: 2px solid black;

        }

        .detail{
            font-size: 12px;
        }
    </style>
@endsection

@section('content')
<section class="wrapper bg-soft-primary">
  <div class="container pt-5 pb-6 pt-md-7 pb-md-8 text-center">
    <div class="row">
      <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
        <h2 class="display-4 mb-3">Quartier {{$quartier->nom}}</h2>
        <p class="lead px-xxl-3"></p>
      </div>
      <!-- /column -->
    </div>
    <!-- /.row -->
  </div>
    <!-- /.container -->
</section>
<section class="wrapper bg-light">
    <div class="container">
        <div class="row align-items-center mb-8 mb-md-1 mb-lg-1">
          <section class="wrapper bg-light">
            <div class="container py-14 py-md-16">
              <div class="row text-center">
                <div class="col-xl-11 mx-auto">
                  <h3 class="display-6 mb-15 px-xxl-15">Base de données des personnes handicapées et des services sociaux du quartier {{$quartier->nom}}</h3>
                </div>
                <!-- /column -->
              </div>
              <!-- /.row -->
              <div class="row">
                <div class="col-xl-11 mx-auto">
                  
                  <div class="job-list mb-10">
                    <h3 class="mb-4">Personnes handicapées</h3>
                    <!-- /.card -->
                    <a href="{{route('quartier.handicap',$quartier)}}" class="card mb-4 lift">
                      <div class="card-body p-5">
                        <span class="row justify-content-between align-items-center">
                          <span class="col-md-5 mb-2 mb-md-0 d-flex align-items-center text-body">
                            <span class="avatar bg-green text-white w-9 h-9 fs-17 me-3">PH</span> Personnes handicapées </span>
                          <span class="col-5 col-md-3 text-body d-flex align-items-center">
                            <i class="uil uil-map me-1"></i> {{$quartier->nom}} </span>
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
                    <a href="{{route('quartier.service',$quartier)}}" class="card mb-4 lift">
                      <div class="card-body p-5">
                        <span class="row justify-content-between align-items-center">
                          <span class="col-md-5 mb-2 mb-md-0 d-flex align-items-center text-body">
                            <span class="avatar bg-purple text-white w-9 h-9 fs-17 me-3">SS</span> Services sociaux </span>
                          <span class="col-5 col-md-3 text-body d-flex align-items-center">
                            <i class="uil uil-map me-1"></i> {{$quartier->nom}}</span>
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
                    <a href="{{route('quartier.acteur',$quartier)}}" class="card mb-4 lift">
                      <div class="card-body p-5">
                        <span class="row justify-content-between align-items-center">
                          <span class="col-md-5 mb-2 mb-md-0 d-flex align-items-center text-body">
                            <span class="avatar bg-orange text-white w-9 h-9 fs-17 me-3">AC</span> Acteurs </span>
                          <span class="col-5 col-md-3 text-body d-flex align-items-center">
                            <i class="uil uil-map me-1"></i> {{$quartier->nom}} </span>
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
        //window.location.href = "/quartiers-"+slug;
        
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