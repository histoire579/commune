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
              <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="{{route('administration.quartier.edit',$quartier->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group ">
                  <label for="nom" class="control-label col-lg-2">Nom </label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="nom" name="nom" value="{{$quartier->nom}}" minlength="2" type="text" required />
                  </div>
                </div>

                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Commune </label>
                  <div class="col-lg-10">
                    <select class="form-control" name="com_id" id="com_id">
                      
                      @foreach ($communes as $commune)
                        @if ($commune->id == $quartier->com_id)
                          <option value="{{$commune->id}}" selected>{{$commune->nom}}</option>
                        @else
                          <option value="{{$commune->id}}">{{$commune->nom}}</option>
                        @endif
                        
                      @endforeach
                      
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                    <a href="/administration/quartier" type="button" class="btn btn-danger">Annuler</a>
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
