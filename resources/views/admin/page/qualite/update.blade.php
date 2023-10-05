@extends('layouts.mainAdmin')

@section('content')
<section id="main-content">
  <section class="wrapper">
    <!-- FORM VALIDATION -->
    <div class="row mt">
        <div class="col-lg-12">
          <h4><i class="fa fa-angle-right"></i> </h4>
          <div class="form-panel">
            <div class=" form">
              <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="{{route('administration.qualite.edit',$qualite->id)}}" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Service </label>
                  <div class="col-lg-10">
                    <select class="form-control" name="service_id" id="service_id">
                      
                      @foreach ($services as $item)
                        @if ($item->id == $qualite->service_id)
                          <option value="{{$item->id}}" selected>{{$item->nom}}</option>
                        @else
                          <option value="{{$item->id}}">{{$item->nom}}</option>
                        @endif
                        
                      @endforeach
                      
                    </select>
                  </div>
                </div>

                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Thématique </label>
                  <div class="col-lg-10">
                    <select class="form-control" name="theme_id" id="theme_id">
                      
                      @foreach ($themes as $item)
                        @if ($item->id == $qualite->theme_id)
                          <option value="{{$item->id}}" selected>{{$item->titre}}</option>
                        @else
                          <option value="{{$item->id}}">{{$item->titre}}</option>
                        @endif
                        
                      @endforeach
                      
                    </select>
                  </div>
                </div>

                <div class="form-group ">
                  <label for="moyenne" class="control-label col-lg-2">Moyenne </label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="moyenne" name="moyenne" value="{{$qualite->moyenne}}" minlength="2" type="text"  />
                  </div>
                </div>

                <div class="form-group ">
                  <label for="moyenneAcceptable" class="control-label col-lg-2">Moyenne acceptable</label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="moyenneAcceptable" name="moyenneAcceptable" value="{{$qualite->moyenneAcceptable}}" minlength="2" type="text"  />
                  </div>
                </div>

                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Appreciation </label>
                  <div class="col-lg-10">
                    <select class="form-control" name="app_id" id="app_id">
                      
                      @foreach ($appreciations as $item)
                        @if ($item->id == $qualite->app_id)
                          <option value="{{$item->id}}" selected>{{$item->titre}}</option>
                        @else
                          <option value="{{$item->id}}">{{$item->titre}}</option>
                        @endif
                        
                      @endforeach
                      
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                    <a href="/administration/qualite" type="button" class="btn btn-danger">Annuler</a>
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
