<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="An impressive and flawless site template that includes various UI elements and countless features, attractive ready-made blocks and rich pages, basically everything you need to create a unique and professional website.">
  <meta name="keywords" content="bootstrap 5, business, corporate, creative, gulp, marketing, minimal, modern, multipurpose, one page, responsive, saas, sass, seo, startup, html5 template, site template">
  <meta name="author" content="elemis">
  @if (!empty($meta_titre))
		<meta property="og:title" content="Photil: {{$meta_titre}}" />
		<title>{{$meta_titre}}</title>
	@else
		<title>Bddpromhandicam</title>
	@endif
  <link href="{{ asset('dist/assets/img/icon.png') }}" rel="shortcut icon">
  <link href="{{ asset('dist/assets/css/plugins.css') }}" rel="stylesheet">
  <link href="{{ asset('dist/assets/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('dist/assets/css/commune.css') }}" rel="stylesheet">
  <link href="{{ asset('dist/assets/css/fonts/dm.css') }}" rel="preload" as="style" onload="this.rel='stylesheet'">
  <meta property="og:image" content="{{asset('dist/assets/img/cover.jpg')}}">
  @include('meta::manager')
  @yield('extra-css')
</head>

<body>
  <div class="content-wrapper">
    <header class="wrapper bg-light">
      <div class="bg-primary text-white fw-bold fs-15 mb-2">
        <div class="container py-2 d-md-flex flex-md-row">
          <div class="d-flex flex-row align-items-center">
            <div class="icon text-white fs-22 mt-1 me-2"> <i class="uil uil-location-pin-alt"></i></div>
            <address class="mb-0">Yaoundé</address>
          </div>
          <div class="d-flex flex-row align-items-center me-6 ms-auto">
            <div class="icon text-white fs-22 mt-1 me-2"> <i class="uil uil-phone-volume"></i></div>
            <p class="mb-0">00237 683 093 467</p>
          </div>
          <div class="d-flex flex-row align-items-center">
            <div class="icon text-white fs-22 mt-1 me-2"> <i class="uil uil-message"></i></div>
            <p class="mb-0"><a href="mailto:sandbox@email.com" class="link-white hover">contact@bbdpromhandicam.com</a></p>
          </div>
        </div>
        <!-- /.container -->
      </div>
      <nav class="navbar navbar-expand-lg center-nav transparent navbar-light">
        <div class="container flex-lg-row flex-nowrap align-items-center">
          <div class="navbar-brand w-100">
            <a href="/">
              <img src="{{asset('dist/assets/img/logo.jpg')}}" srcset="{{asset('dist/assets/img/logo.jpg')}}" alt="" />
            </a>
          </div>
          <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
            <div class="offcanvas-header d-lg-none">
              <h3 class="text-white fs-30 mb-0">Bddpromhandicam</h3>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100">
              <ul class="navbar-nav">
				        <li class="nav-item active"><a class="nav-link" href="/">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('handicape')}}">Handicapées</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('acteur')}}">Acteurs</a></li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Services sociaux</a>
                  <ul class="dropdown-menu">
                    <li class="nav-item"><a class="dropdown-item" href="{{route('service')}}">Liste des services</a></li>
                      @php
                        $themes=App\Models\Thematique::all();
                      @endphp
                      @foreach ($themes as $item)
                        <li class="nav-item"><a class="dropdown-item" href="{{route('qualite.service.thematique', $item)}}">Qualités des services par {{$item->titre}}</a></li>
                      @endforeach
                  </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">Contact</a></li>
              </ul>
              <!-- /.navbar-nav -->
              <div class="offcanvas-footer d-lg-none">
                <div>
                  <a href="mailto:first.last@email.com" class="link-inverse">contact@bbdpromhandicam.com</a>
                  <br /> 00237 683 093 467 <br />
                  <nav class="nav social social-white mt-4">
                    <a href="#"><i class="uil uil-twitter"></i></a>
                    <a href="#"><i class="uil uil-facebook-f"></i></a>
                    <a href="#"><i class="uil uil-dribbble"></i></a>
                    <a href="#"><i class="uil uil-instagram"></i></a>
                    <a href="#"><i class="uil uil-youtube"></i></a>
                  </nav>
                  <!-- /.social -->
                </div>
              </div>
              <!-- /.offcanvas-footer -->
            </div>
            <!-- /.offcanvas-body -->
          </div>
          
          <!-- /.navbar-collapse -->
          <div class="navbar-other w-100 d-flex ms-auto">
            <ul class="navbar-nav flex-row align-items-center ms-auto">
              @guest
                <li class="nav-item d-none d-md-block">
                  <a href="#" class="btn btn-sm btn-red" data-bs-toggle="modal" data-bs-target="#modal-signin">Se connecter</a>
                </li>

                <li class="nav-item d-none d-md-block">
                  <a href="{{route('inscription')}}" class="btn btn-sm btn-primary">S'inscrire</a>
                </li>
              @else
                <li class="nav-item dropdown language-select text-uppercase">
                  <a class="nav-link dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                  <ul class="dropdown-menu">
                    {{-- <li class="nav-item"><a class="dropdown-item" href="#">Profile</a></li> --}}
                    <li class="nav-item"><a class="dropdown-item" href="{{ route('deconnecter') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnecter
                      <form id="logout-form" action="{{ route('deconnecter') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    </a></li>
                  </ul>
                </li>
              @endguest
              <li class="nav-item d-lg-none">
                <button class="hamburger offcanvas-nav-btn"><span></span></button>
              </li>
            </ul>
            <!-- /.navbar-nav -->
          </div>
          <!-- /.navbar-other -->
        </div>
        <!-- /.container -->
      </nav>
      <!-- /.navbar -->
    </header>
    <!-- /header -->

	@yield('content')
    
  </div>

<div class="modal fade" id="modal-signin" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content text-center">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <p class="lead mb-6 text-start">CONNEXION</p>
        <form class="text-start mb-3" id="login_form" method="POST" action="#">
          @csrf
          <div class="form-floating mb-4">
            <input type="email" class="form-control" name="email" placeholder="Email" id="email">
            <div class="invalid-feedback"></div>
            <label for="loginEmail">Email</label>
          </div>
          <div class="form-floating password-field mb-4">
            <input type="password" class="form-control" name="password" placeholder="Password" id="password">
            <div class="invalid-feedback"></div>
            <span class="password-toggle"><i class="uil uil-eye"></i></span>
            <label for="loginPassword">Password</label>
          </div>
          <button type="submit" class="btn btn-primary rounded-pill btn-login w-100 mb-2">Se connecter</button>
        </form>
        <!-- /form -->
        {{-- <p class="mb-1"><a href="#" class="hover">Forgot Password?</a></p> --}}
       
        <!--/.social -->
      </div>
      <!--/.modal-content -->
    </div>
    <!--/.modal-body -->
  </div>
  <!--/.modal-dialog -->
</div>
<!--/.modal -->

@include('front.message')

  <footer>
	<div class="container pb-7">
    <h6>Avec l’appui technique et financier de </h6>
    <div class="row">
      <div class="col-md-2">
        <div class="">
          <a href="/" style="float: left">
            <img src="{{asset('dist/assets/img/logo1.jpg')}}" srcset="{{asset('dist/assets/img/logo1.jpg')}}" alt="" />
          </a>
        </div>
      </div>
      <div class="col-md-10">
        <div class="d-md-flex align-items-center justify-content-between mt-10">
          <p class="mb-2 mb-lg-0">© 2023 bddpromhandicam. Tous droits réservés.</p>
          <nav class="nav social social-muted mb-0 text-md-end">
            <a href="#"><i class="uil uil-twitter"></i></a>
            <a href="#"><i class="uil uil-facebook-f"></i></a>
            <a href="#"><i class="uil uil-dribbble"></i></a>
            <a href="#"><i class="uil uil-instagram"></i></a>
            <a href="#"><i class="uil uil-youtube"></i></a>
          </nav>
          <!-- /.social -->
          </div>
      </div>
    </div>
	</div>
	<!-- /.container -->
  </footer>
  <!-- /.content-wrapper -->
  {{-- <footer class="bg-light">
    <div class="container py-13 py-md-15">
      <div class="row gy-6 gy-lg-0">
        <div class="col-md-4 col-lg-3">
          <div class="widget">
            <img class="mb-4" src="./assets/img/logo-dark.png" srcset="./assets/img/logo-dark@2x.png 2x" alt="" />
            <p class="mb-4">© 2021 Sandbox. <br class="d-none d-lg-block" />All rights reserved.</p>
            <nav class="nav social ">
              <a href="#"><i class="uil uil-twitter"></i></a>
              <a href="#"><i class="uil uil-facebook-f"></i></a>
              <a href="#"><i class="uil uil-dribbble"></i></a>
              <a href="#"><i class="uil uil-instagram"></i></a>
              <a href="#"><i class="uil uil-youtube"></i></a>
            </nav>
            <!-- /.social -->
          </div>
          <!-- /.widget -->
        </div>
        <!-- /column -->
        <div class="col-md-4 col-lg-3">
          <div class="widget">
            <h4 class="widget-title  mb-3">Get in Touch</h4>
            <address class="pe-xl-15 pe-xxl-17">Moonshine St. 14/05 Light City, London, United Kingdom</address>
            <a href="mailto:#" class="link-body">info@email.com</a><br /> 00 (123) 456 78 90
          </div>
          <!-- /.widget -->
        </div>
        <!-- /column -->
        <div class="col-md-4 col-lg-3">
          <div class="widget">
            <h4 class="widget-title  mb-3">Learn More</h4>
            <ul class="list-unstyled text-reset mb-0">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Our Story</a></li>
              <li><a href="#">Projects</a></li>
              <li><a href="#">Terms of Use</a></li>
              <li><a href="#">Privacy Policy</a></li>
            </ul>
          </div>
          <!-- /.widget -->
        </div>
        <!-- /column -->
        <div class="col-md-12 col-lg-3">
          <div class="widget">
            <h4 class="widget-title  mb-3">Our Newsletter</h4>
            <p class="mb-5">Subscribe to our newsletter to get our news & deals delivered to you.</p>
            <div class="newsletter-wrapper">
              <!-- Begin Mailchimp Signup Form -->
              <div id="mc_embed_signup2">
                <form action="https://elemisfreebies.us20.list-manage.com/subscribe/post?u=aa4947f70a475ce162057838d&amp;id=b49ef47a9a" method="post" id="mc-embedded-subscribe-form2" name="mc-embedded-subscribe-form" class="validate " target="_blank" novalidate>
                  <div id="mc_embed_signup_scroll2">
                    <div class="mc-field-group input-group form-floating">
                      <input type="email" value="" name="EMAIL" class="required email form-control" placeholder="Email Address" id="mce-EMAIL2">
                      <label for="mce-EMAIL2">Email Address</label>
                      <input type="submit" value="Join" name="subscribe" id="mc-embedded-subscribe2" class="btn btn-primary ">
                    </div>
                    <div id="mce-responses2" class="clear">
                      <div class="response" id="mce-error-response2" style="display:none"></div>
                      <div class="response" id="mce-success-response2" style="display:none"></div>
                    </div> <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_ddc180777a163e0f9f66ee014_4b1bcfa0bc" tabindex="-1" value=""></div>
                    <div class="clear"></div>
                  </div>
                </form>
              </div>
              <!--End mc_embed_signup-->
            </div>
            <!-- /.newsletter-wrapper -->
          </div>
          <!-- /.widget -->
        </div>
        <!-- /column -->
      </div>
      <!--/.row -->
    </div>
    <!-- /.container -->
  </footer> --}}
  <div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
  </div>
  <script src="{{ asset('dist/assets/js/plugins.js') }}" defer></script>
  <script src="{{ asset('dist/assets/js/theme.js') }}" defer></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="{{ asset('js/fonctions.js') }}" defer></script>
  <script type="text/javascript">
    $(function(){
      $("#login_form").submit(function(e){
        e.preventDefault();
        var form = new FormData($(this)[0]);

        $.ajax({
            type:'post',
            processData: false,
            contentType: false,
            cache: false,
            enctype: 'multipart/form-data',
            url:"{{ route('connecter') }}",
            data:form,
            success:function(res){
              console.log(res);
              if (res.status == 201) {
                ShowError('email',res.message.email)
                ShowError('password',res.message.password)
                //$("#nom").text(res.message.name);
              } else if(res.status == 200){
                window.location.href = "/retour";

              }else{
                ShowError('email',res.message) 
              }
            },
            error:function(){

            }
        });
      });

      $("#connecter").click(function(){
        $('#modal-signin').modal('show');
      });

    })
  </script>
  @yield('extra-js')
</body>

</html>