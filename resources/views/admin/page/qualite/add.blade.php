@extends('layouts.mainAdmin')

@section('content')
<section id="main-content">
  <section class="wrapper">
    <!-- FORM VALIDATION -->
    
    <div class="row mt">
        <div class="col-lg-12">
          <h4><i class="fa fa-angle-right"></i> </h4>
          <div class="row">
            <div class="col-md-4 col-sm-4 mb"><a style="float: left;margin-left: 100px" href="/administration/qualite" type="button"  class="btn btn-default"><i class="fa fa-arrow-circle-o-left" style="color: #08367A" aria-hidden="true"></i> Retourner à la liste</a></div>
            <div class="col-md-4 col-sm-4 mb"></div>
            <div class="col-md-4 col-sm-4 mb"></div>
         </div>
         @include('admin.page.message')
          <div class="form-panel">
            <div class=" form">
              <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="{{route('administration.qualite')}}" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group ">
                  <label for="service_id" class="control-label col-lg-2">Service </label>
                  <div class="col-lg-10">
                    <select class="form-control" name="service_id" id="service_id">
                      @foreach ($services as $item)
                        <option value="{{$item->id}}">{{$item->nom}}</option>
                      @endforeach
                      
                    </select>
                  </div>
                </div>

                <div class="form-group ">
                  <label for="theme_id" class="control-label col-lg-2">Thématique </label>
                  <div class="col-lg-10">
                    <select class="form-control" name="theme_id" id="theme_id">
                      @foreach ($themes as $item)
                        <option value="{{$item->id}}">{{$item->titre}}</option>
                      @endforeach
                      
                    </select>
                  </div>
                </div>

                <div class="form-group ">
                  <label for="moyenne" class="control-label col-lg-2">Moyenne </label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="moyenne" name="moyenne" minlength="2" type="text"  />
                  </div>
                </div>

                <div class="form-group ">
                  <label for="moyenneAcceptable" class="control-label col-lg-2">Moyenne acceptable</label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="moyenneAcceptable" name="moyenneAcceptable" minlength="2" type="text"  />
                  </div>
                </div>

                <div class="form-group ">
                  <label for="theme_id" class="control-label col-lg-2">Appreciation </label>
                  <div class="col-lg-10">
                    <select class="form-control" name="app_id" id="app_id">
                      @foreach ($appreciations as $item)
                        <option value="{{$item->id}}">{{$item->titre}}</option>
                      @endforeach
                      
                    </select>
                  </div>
                </div>
              
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- /form-panel -->
        </div>
        <!-- /col-lg-12 -->
      </div>
  </section>
</section>
@endsection
