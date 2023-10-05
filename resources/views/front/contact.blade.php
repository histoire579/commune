@extends('layouts.main')

@section('extra-css')
  <style>
  </style>
@endsection

@section('content')
<section class="wrapper bg-light">
    <div class="container py-14 py-md-16">
      <div class="row gx-lg-8 gx-xl-12 gy-10 align-items-center">
        <div class="col-lg-7">
          {{-- <figure><img class="w-auto" src="dist/assets/img/illustrations/i5.png" srcset="dist/assets/img/illustrations/i5@2x.png 2x" alt="" /></figure> --}}
          <figure><img class="w-auto" src="dist/assets/img/handicap1.png" srcset="dist/assets/img/handicap1.png" alt="" /></figure>
        </div>
        <!--/column -->
        <div class="col-lg-5">
          {{-- <h2 class="fs-15 text-uppercase text-line text-primary text-center mb-3">Contactez-nous</h2> --}}
          <h3 class="display-5 mb-7">Vous avez des questions ? N'hésitez pas à nous contacter.</h3>
          <div class="d-flex flex-row">
            <div>
              <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-location-pin-alt" style="color: #f8d210"></i> </div>
            </div>
            <div>
              <h5 class="mb-1">Addresse</h5>
              <address>Yaoundé</address>
            </div>
          </div>
          <div class="d-flex flex-row">
            <div>
              <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-phone-volume" style="color: #f8d210"></i> </div>
            </div>
            <div>
              <h5 class="mb-1">Téléphone</h5>
              <p>00237 683 093 467</p>
            </div>
          </div>
          <div class="d-flex flex-row">
            <div>
              <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-envelope" style="color: #f8d210"></i> </div>
            </div>
            <div>
              <h5 class="mb-1">E-mail</h5>
              <p class="mb-0"><a href="mailto:sandbox@email.com" class="link-body"> contact@bbdpromhandicam.com</a></p>
            </div>
          </div>
        </div>
        <!--/column -->
      </div>
      <!--/.row -->
    </div>
    <!-- /.container -->
  </section>
  <!-- /section -->
@endsection