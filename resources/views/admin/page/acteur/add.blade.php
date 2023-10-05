@extends('layouts.mainAdmin')

@section('content')
<section id="main-content">
  <section class="wrapper">
    <!-- FORM VALIDATION -->
    <div class="row mt">
        <div class="col-lg-12">
          <h4><i class="fa fa-angle-right"></i> </h4>
          <div class="row">
            <div class="col-md-4 col-sm-4 mb"><a style="float: left;margin-left: 100px" href="/administration/acteur" type="button"  class="btn btn-default"><i class="fa fa-arrow-circle-o-left" style="color: #08367A" aria-hidden="true"></i> Retourner à la liste</a></div>
            <div class="col-md-4 col-sm-4 mb"></div>
            <div class="col-md-4 col-sm-4 mb"></div>
         </div>
         @include('admin.page.message')
          <div class="form-panel">
            <div class=" form">
              <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="{{route('administration.acteur')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3">Communes </label>
                      <div class="col-lg-9">
                        <select class="form-control" name="com_id" id="com_id">
                          <option value="0" disabled="true" selected>Chosir une commune</option>
                          @foreach ($communes as $item)
                            <option value="{{$item->id}}">{{$item->nom}}</option>
                          @endforeach
                          
                        </select>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="nom" class="control-label col-lg-3">Nom </label>
                      <div class="col-lg-9">
                        <input class=" form-control" id="nom" name="nom" minlength="2" type="text" required />
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3">Domaine d'intervention</label>
                      <div class="col-lg-9">
                        <select class="form-control" name="cat_id" id="cat_id">
                          @foreach ($categories as $item)
                            <option value="{{$item->id}}">{{$item->titre}}</option>
                          @endforeach
                          
                        </select>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="localisation" class="control-label col-lg-3">Localisation </label>
                      <div class="col-lg-9">
                        <input class=" form-control" id="localisation" name="localisation" minlength="2" type="text" required />
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="contact" class="control-label col-lg-3">Contact</label>
                      <div class="col-lg-9">
                        <input class=" form-control" id="contacts" name="contact" minlength="2" type="text"  />
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3">Quartier </label>
                      <div class="col-lg-9">
                        <select class="form-control" name="qua_id" id="qua_id">
                          {{-- @foreach ($communes as $item)
                            <option value="{{$item->id}}">{{$item->nom}}</option>
                          @endforeach --}}
                          
                        </select>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="capacite" class="control-label col-lg-3">Capacite d'accueil</label>
                      <div class="col-lg-9">
                        <input class=" form-control" id="capacite" name="capacite" minlength="2" type="text"  />
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="commodite" class="control-label col-lg-3">Commodité d'accès</label>
                      <div class="col-lg-9">
                        <input class=" form-control" id="commodite" name="commodite" minlength="2" type="text"  />
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="autre" class="control-label col-lg-3">Autres détails</label>
                      <div class="col-lg-9">
                        <textarea class="form-control" name="autre" id="autre" placeholder="Vos détails" rows="5" data-rule="required" data-msg="Vos détails"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
        
                <div class="form-group ">
                  <label class="control-label col-lg-2 col-sm-2">Photo</label>
                  <div class="col-lg-10 col-sm-10">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                      </div>
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                      <div>
                        <span class="btn btn-theme02 btn-file">
                          <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                        <input type="file" class="default @error('image') is-invalid @enderror" id="image" name="image"  />
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </span>
                        <a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                      </div>
                    </div>
                    <span class="label label-info">NOTE!</span>
                    <span>
                      Attached image thumbnail is
                      supported in Latest Firefox, Chrome, Opera,
                      Safari and Internet Explorer 10 only
                      </span>
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
@section('extra-js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $(document).on('change','#com_id',function(){
          //var competition_id = $('.form-group #competition_id').val();
          var com_id=$(this).val();
          var op="";
          var div=$(this).parent().parent().parent().parent();
          //console.log(saison_id, competition_id);
          $.ajax({
              type:'get',
              url:"{{ route('administration.getQuartierByCommune') }}",
              data:{'com_id':com_id},
              success:function(data){
                  console.log('success');
                  console.log(data);
                  op+='<option value="0" disabled="true" selected>Choisissez un quartier</option>';
                  for (var i = 0; i < data.length; i++) {
                      op+='<option value="'+data[i].id+'">'+data[i].nom+'</option> ';  
                  }
                  div.find('#qua_id').html("");
                  div.find('#qua_id').append(op);
              },
              error:function(){

              }
          });
      });
    });  
  </script>
@endsection
