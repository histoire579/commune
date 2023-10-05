@extends('layouts.main')

@section('content')
<section id="contact-section" class="contact-simple">
	<div class="contact-section-inner full-height-vh" style="height: 900px"> <!-- add/remove class "tt-wrap" to enable/disable element boxed layout (class "tt-boxed" is required in <body> tag! ) -->

		<div class="full-cover bg-image" style="background-image: url(assets/img/misc/contact-bg-2.jpg); background-position: 50% 50%;"></div>

		<!-- Element cover -->
		<div class="cover bg-transparent-1-dark"></div>

		<!-- Begin contact info -->
		<div class="contact-info-wrap" style="margin-top:20px ;">

			<!-- Begin tt-heading 
			====================== 
			* Use class "padding-on" to enable heading paddings (useful if you use tt-heading as stand alone element).
			* Use class "text-center" or "text-right" to align tt-heading.
			* Use classes "tt-heading-xs", "tt-heading-sm", "tt-heading-lg", "tt-heading-xlg" or "tt-heading-xxlg" to set tt-heading size.
			-->
      <center>
        <div class="tt-heading">
          <div class="tt-heading-inner">
            <img src="{{asset('dist/assets/img/logo_new.png')}}" alt="logo">
            <!-- <div class="tt-heading-subtitle">Subtitle Here</div> -->
            
          </div> <!-- /.tt-heading-inner <hr class="hr-short"> -->
        </div>
        <!-- End tt-heading -->
      </center>
			

			<!-- Begin social buttons -->
			<div class="social-buttons margin-top-20">
			<form id="" method="POST" action="{{ route('register') }}">
        		@csrf
				<div class="contact-form-inner text-left">

					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
                				<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="{{ __('Nom complet') }}" value="{{ old('name') }}" required autocomplete="name" autofocus>

								@error('name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>

            			<div class="col-lg-12">
							<div class="form-group">
								
								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('Email') }}" required autocomplete="email" autofocus>

								@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>

            			<div class="col-lg-12">
							<div class="form-group">
								<input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="{{ __('Téléphone. Eg:237658221403') }}" required autocomplete="phone" >

									@error('phone')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
							</div>
						</div>

						<div class="col-lg-12">
							<div class="form-group">
								
								<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" required autocomplete="current-password">

								@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
								<span class="password-toggle"><i class="uil uil-eye"></i></span>
							</div>                       
						</div>

						<div class="col-lg-12">
							<div class="form-group">
								<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Confirmer le mot de passe') }}" required autocomplete="new-password">
								<span class="password-toggle"><i class="uil uil-eye"></i></span>
							</div>
						</div>

						<div class="col-lg-12">
							<div class="form-group">
								<select class="form-control"  name="pays_id" id="pays_id">
									<option selected>{{ __('Choisissez le pays') }}</option>
									@foreach ($pays as $item)
										<option value="{{$item->id}}">{{$item->nom}}</option>
									@endforeach
								</select>
							</div>
						</div>
						
					</div>
					
					{{-- <div class="small text-gray"><em>* All fields are required!</em></div> --}}

				</div> <!-- /.contact-form-inner -->
				<center>
				<div class="row">
					<div class="col-lg-12">
					<button type="submit" class="btn btn-primary btn-lg margin-top-20">S'inscrire</button>
					</div>
				</div>
				</center>
				
			</form>
      		<p class="mb-0"> {{ __('Do you have an account?') }}<a href="/login" class="hover">{{ __('Sign In') }}</a></p>
			</div>
			<!-- End social buttons -->

		</div>
		<!-- End contact info -->
	</div> <!-- /.contact-section-inner -->
</section>
@endsection
