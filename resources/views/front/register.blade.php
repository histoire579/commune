@extends('layouts.main')

@section('extra-css')
    <style>
       
    </style>
@endsection

@section('content')
<section class="wrapper bg-soft-primary">
    <div class="container pt-5 pb-6 pt-md-7 pb-md-8 text-center">
      <div class="row">
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <h2 class="display-5 mb-3">Inscription</h2>
          <p class="lead px-xxl-3"></p>
        </div>
        <!-- /column -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
</section>

<section class="wrapper bg-light">
    <div class="container pb-14 pb-md-16 mt-10">
        <h1 class="display-6 text-center mb-10">Inscrivez-vous pour accéder à plusieurs niveaux de données</h1>
      <div class="row">
        <div class="col-lg-9 col-xl-8 col-xxl-7 mx-auto">
          <div class="card">
            <div class="card-body p-11 text-center">
                <div id="show_success_alert"></div>
              
              <form class="text-start mb-3" id="registerForm" method="POST" action="#" >
                {{-- method="POST" action="{{ route('register') }}" --}}
                @csrf
                <div class="form-floating mb-4">
                    <input id="name" type="text" class="form-control" name="name" placeholder="Nom"  autocomplete="name"  autofocus>
                    <span class="invalid-feedback"></span>
                    <label for="name">Nom</label>
                </div>
                <div class="form-floating mb-4">
                    <input id="email" type="email" class="form-control" name="email" placeholder="Email"  autocomplete="email" >
                    <div class="invalid-feedback"></div>
                    <label for="email">Email</label>
                </div>
                
                <div class="form-floating mb-4">
                    <input id="phone" type="tel" class="form-control" name="phone" placeholder="Téléphone"  autocomplete="phone" >
                    <div class="invalid-feedback"></div>
                    <label for="phone">{{ __('Téléphone') }}</label>
                </div>
                <div class="form-floating password-field mb-4">
                    <input id="password" type="password" class="form-control" name="password" placeholder="Mot de passe"  autocomplete="current-password">
                    <div class="invalid-feedback"></div>
                    <span class="password-toggle"><i class="uil uil-eye"></i></span>
                    <label for="password">{{ __('Mot de passe') }}</label>
                </div>
                <div class="form-floating password-field mb-4">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmer le mot de passe"  autocomplete="new-password">
                    <span class="password-toggle"><i class="uil uil-eye"></i></span>
                    <label for="password">{{ __('Confirmer le mot de passe') }}</label>
                </div>

                <div class="form-check mb-5">
                  <input class="form-check-input" type="checkbox" value="0" name="condition" id="condition">
                  <label class="form-check-label" for="condition"> J'ai lu et j'accepte les conditions d'utilisation. <a href="{{route('condition.generale')}}" target="_blank">Lire les conditions générales d'utilisation</a> </label>
                </div>
                
                <button type="submit" class="btn btn-primary rounded-pill btn-login w-100 mb-2">S'inscrire</button>
                
              </form>
              <p class="mb-0"> {{ __('Do you have an account?') }}<a href="/login" class="hover">Se connecter</a></p>
              
            </div>
            <!--/.card-body -->
          </div>
          <!--/.card -->
        </div>
        <!-- /column -->
      </div>
      <!-- /.row -->

      <div class="modal fade" id="modal-signin1" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
          <div class="modal-content text-center">
            <div class="modal-body">
              <p class="" id="exist"></p>
              <div class="row">
                <div class="col-md-6">
                  <button class="btn btn-outline-gradient gradient-1 rounded-pill" id="fermer" data-bs-dismiss="modal" aria-label="Close">OK</button>
                </div>
                <div class="col-md-6">
                  <button type="button" id="ok" class="btn btn-outline-gradient gradient-7 rounded-pill" data-bs-dismiss="modal" aria-label="Close">Continuer</button>                      
                </div>
              </div>
            </div>
            <!--/.modal-content -->
          </div>
          <!--/.modal-body -->
        </div>
        <!--/.modal-dialog -->
      </div>
      <!--/.modal -->

      <div class="modal fade" id="modal-signin12" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
          <div class="modal-content text-center">
            <div class="modal-body">
              <p class="" id="exist1"></p>
              <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <button type="button" class="btn btn-outline-gradient gradient-1 rounded-pill" data-bs-dismiss="modal" aria-label="Close">OK</button>                      
                </div>
                <div class="col-md-3"></div>
              </div>
            </div>
            <!--/.modal-content -->
          </div>
          <!--/.modal-body -->
        </div>
        <!--/.modal-dialog -->
      </div>
      <!--/.modal -->
    </div>
    <!-- /.container -->
  </section>
  <!-- /section -->
@endsection
@section('extra-js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="{{ asset('js/fonctions.js') }}" defer></script>
<script type="text/javascript">

  $(document).ready(function(){

    $(document).on('submit','#registerForm',function(e){
        e.preventDefault();
        var form = new FormData($(this)[0]);
        $.ajax({
            type:'post',
            processData: false,
            contentType: false,
            cache: false,
            enctype: 'multipart/form-data',
            url:"{{ route('inscription') }}",
            data:form,
            success:function(res){
              console.log(res);
              if (res.status == 201) {
                ShowError('name',res.message.name)
                ShowError('email',res.message.email)
                ShowError('phone',res.message.phone)
                ShowError('password',res.message.password)
                //$("#nom").text(res.message.name);
              } else if(res.status == 200){
                $('#exist').text('Cher '+res.data.name+ 'Merci d\'avoir créer un compte chez-nous. Cellà vous permettra d\'avoir accès à l\'ensemble de fonctionnalités du site. Votre compte sera actif dans un délai de 48h.');
                $('#modal-signin1').modal('show'); 

              }else if(res.status == 202){
                $('#exist1').text(res.message);
                $('#modal-signin12').modal('show'); 
              }else{
                $("show_success_alert").html(ShowMessage('warning',res.message))
                //$("#registerForm")[0].reset();
                //removeValidationClasses(registerForm); 
              }
            },
            error:function(){

            }
        });
    });
    
    $(document).on('click','#fermer',function(){
        $('#modal-signin1').modal('hide');
        $("#registerForm")[0].reset();
        removeValidationClasses(registerForm); 
    });

    $(document).on('click','#ok',function(){
        window.location.href = "/";
    });

  }); 
  
</script>
@endsection