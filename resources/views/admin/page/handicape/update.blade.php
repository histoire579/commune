@extends('layouts.mainAdmin')

@section('content')
<section id="main-content">
  <section class="wrapper">
    <!-- FORM VALIDATION -->
    <div class="row mt">
        <div class="col-lg-12">
          <h4><i class="fa fa-angle-right"></i> </h4>
          {{-- <div class="row">
            <div class="col-md-4 col-sm-4 mb"><a style="float: left;margin-left: 100px" href="/administration/about_saconets" type="button"  class="btn btn-default"><i class="fa fa-arrow-circle-o-left" style="color: #08367A" aria-hidden="true"></i> Retourner à la liste</a></div>
            <div class="col-md-4 col-sm-4 mb"></div>
            <div class="col-md-4 col-sm-4 mb"></div>
         </div> --}}
          <div class="form-panel">
            <div class=" form">
              <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="{{route('administration.handicape.edit',$handicape->id)}}" enctype="multipart/form-data">
                @csrf
               
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3">Communes </label>
                      <div class="col-lg-9">
                        <select class="form-control" name="com_id" id="com_id">
                          @foreach ($communes as $item)
                            @if ($item->id == $handicape->com_id)
                              <option value="{{$item->id}}" selected>{{$item->nom}}</option>
                            @else
                              <option value="{{$item->id}}">{{$item->nom}}</option>
                            @endif
                            
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="nom" class="control-label col-lg-3">Nom complet </label>
                      <div class="col-lg-9">
                        <input class=" form-control" id="nom" name="nom" minlength="2" value="{{$handicape->nom}}" type="text" required />
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3">Sexe </label>
                      <div class="col-lg-9">
                        <select class="form-control" name="sexe" id="sexe">
                            @if ( $handicape->sexe=='M')
                            <option value="M" selected>Masculin</option>
                            @else
                            <option value="F" selected>Féminin</option>
                            @endif
                        </select>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3">Type handicape </label>
                      <div class="col-lg-9">
                        <select class="form-control" name="type_id" id="type_id">
                          @foreach ($types as $item)
                            @if ($item->id == $handicape->type_id)
                              <option value="{{$item->id}}" selected>{{$item->titre}}</option>
                            @else
                              <option value="{{$item->id}}">{{$item->titre}}</option>
                            @endif
                          @endforeach
                          
                        </select>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="seuil" class="control-label col-lg-3">Seuil du handicap </label>
                      <div class="col-lg-9">
                        <select class="form-control" name="seuil" id="seuil">
                          @foreach ($sueils as $item)
                            @if ($item['Val'] == $handicape->seuil) 
                                <option value="{{$item['Val']}}" selected>{{$item['titre']}}</option>
                            @else
                                <option value="{{$item['Val']}}">{{$item['titre']}}</option>
                            @endif
                          @endforeach
                          
                        </select>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3">Washington Group </label>
                      <div class="col-lg-9">
                        <select class="form-control" name="groupe_id" id="groupe_id">
                          @foreach ($groupes as $item)
                            @if ($item->id == $handicape->groupe_id)
                              <option value="{{$item->id}}" disabled>{{$item->titre}}</option>
                            @else
                              <option value="{{$item->id}}">{{$item->titre}}</option> 
                            @endif
                            
                          @endforeach
                          
                        </select>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="polyhandicap" class="control-label col-lg-3">Polyhandicap </label>
                      <div class="col-lg-9">
                        <input class=" form-control" id="polyhandicap" name="polyhandicap" minlength="3" value="{{$handicape->polyhandicap}}" type="text"  />
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="occupation" class="control-label col-lg-3">Occupation </label>
                      <div class="col-lg-9">
                        <input class=" form-control" id="occupation" name="occupation" value="{{$handicape->occupation}}" minlength="2" type="text"  />
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="niveau" class="control-label col-lg-3">Niveau d'instruction</label>
                      <div class="col-lg-9">
                        <input class=" form-control" id="niveau" name="niveau" value="{{$handicape->niveau}}" minlength="2" type="text"  />
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="telephone" class="control-label col-lg-3">Téléphone</label>
                      <div class="col-lg-9">
                        <input class=" form-control" id="telephone" name="telephone" minlength="2" value="{{$handicape->telephone}}" type="number"  />
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="situation" class="control-label col-lg-3">Situation matrimoniale</label>
                      <div class="col-lg-9">
                        <select class="form-control" name="situation" id="situation">
                          @if ($handicape->situation=='Célibataire')
                            <option value="Célibataire" selected>Célibataire</option>
                            <option value="Marié">Marié</option>
                          @else
                            <option value="Célibataire">Célibataire</option>
                            <option value="Marié" selected>Marié</option>
                          @endif
                          
                      </select>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="contact" class="control-label col-lg-3">En contact avec les acteurs</label>
                      <div class="col-lg-9">
                        <select class="form-control" name="acteur_id" id="acteur_id">
                          @foreach ($acteurs as $item)
                          @if ($item->id == $handicape->acteur_id)
                            <option value="{{$item->id}}" selected>{{$item->nom}}</option>
                          @else
                            <option value="{{$item->id}}">{{$item->nom}}</option>
                          @endif
                          @endforeach
                          
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3">Quartier </label>
                      <div class="col-lg-9">
                        <select class="form-control" name="qua_id" id="qua_id">
                           @foreach ($quartiers as $item)
                            @if ($item->id == $handicape->qua_id)
                            <option value="{{$item->id}}" selected>{{$item->nom}}</option>
                            @else
                              <option value="{{$item->id}}">{{$item->nom}}</option>
                            @endif
                            @endforeach
                          
                        </select>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="matricule" class="control-label col-lg-3">Matricule </label>
                      <div class="col-lg-9">
                        <input class=" form-control" id="matricule" name="matricule" minlength="2" value="{{$handicape->matricule}}" type="text" required />
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="anneeNais" class="control-label col-lg-3">Année de naissance </label>
                      <div class="col-lg-9">
                        <input class=" form-control" id="anneeNais" name="anneeNais" value="{{$handicape->anneeNais}}" minlength="2" type="text"  />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="lieuNais" class="control-label col-lg-3">Lieu de naissance </label>
                      <div class="col-lg-9">
                        <input class=" form-control" id="lieuNais" name="lieuNais" value="{{$handicape->lieuNais}}" minlength="2" type="text"  />
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="cni" class="control-label col-lg-3">N°CNI </label>
                      <div class="col-lg-9">
                        <div class="row">
                          <div class="col-lg-4">
                            <select class="form-control" name="siCni" id="siCni">
                              @if ($handicape->siCni =='Oui')
                                <option value="Oui" selected>Oui</option>
                                <option value="Non">Non</option>
                              @else
                                <option value="Oui">Oui</option>
                                <option value="Non" selected>Non</option>
                              @endif
                          </select>
                          </div>
                          <div class="col-lg-8">
                            <input class=" form-control" id="cni" name="cni" minlength="2" value="{{$handicape->cni}}"type="text"  />
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="ci" class="control-label col-lg-3">N°CI </label>
                      <div class="col-lg-9">
                        <div class="row">
                          <div class="col-lg-4">
                            <select class="form-control" name="siCniv" id="siCniv">
                              @if ($handicape->siCniv =='Oui')
                                <option value="Oui" selected>Oui</option>
                                <option value="Non">Non</option>
                              @else
                                <option value="Oui">Oui</option>
                                <option value="Non" selected>Non</option>
                              @endif
                          </select>
                          </div>
                          <div class="col-lg-8">
                            <input class=" form-control" id="ci" name="ci" minlength="2" value="{{$handicape->ci}}" type="text"  />
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="ci" class="control-label col-lg-3">Acte de naissance</label>
                      <div class="col-lg-9">
                        <div class="row">
                          <div class="col-lg-4">
                            <select class="form-control" name="siActe" id="siActe">
                              @if ($handicape->siActe =='Oui')
                                <option value="Oui" selected>Oui</option>
                                <option value="Non">Non</option>
                              @else
                                <option value="Oui">Oui</option>
                                <option value="Non" selected>Non</option>
                              @endif
                          </select>
                          </div>
                          <div class="col-lg-8">
                            <input class=" form-control" id="acteNais" name="acteNais" alue="{{$handicape->siActe}}" minlength="2" type="text"  />
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3">Niveau Scolaire </label>
                      <div class="col-lg-9">
                        <select class="form-control" name="scolaire" id="scolaire">
                          @if ($handicape->scolaire=='Primaire')
                            <option value="Primaire" selected>Primaire</option>
                            <option value="Secondaire">Secondaire</option>
                            <option value="Universitaire">Universitaire</option>
                            <option value="Autre">Autre</option>
                          @endif
                          @if ($handicape->scolaire=='Secondaire')
                            <option value="Primaire">Primaire</option>
                            <option value="Secondaire" selected>Secondaire</option>
                            <option value="Universitaire">Universitaire</option>
                            <option value="Autre">Autre</option>
                          @endif
                          @if ($handicape->scolaire=='Universitaire')
                            <option value="Primaire">Primaire</option>
                            <option value="Secondaire">Secondaire</option>
                            <option value="Universitaire" selected>Universitaire</option>
                            <option value="Autre">Autre</option>
                          @endif
                          @if ($handicape->scolaire=='Autre')
                            <option value="Primaire">Primaire</option>
                            <option value="Secondaire">Secondaire</option>
                            <option value="Universitaire">Universitaire</option>
                            <option value="Autre" selected>Autre</option>
                          @endif
                        </select>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="formation" class="control-label col-lg-3">Formation </label>
                      <div class="col-lg-9">
                        <input class=" form-control" id="formation" name="formation" value="{{$handicape->formation}}" minlength="2" type="text"  />
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="besoin" class="control-label col-lg-3">Besoin de la PH</label>
                      <div class="col-lg-9">
                        <input class=" form-control" id="besoin" name="besoin" value="{{$handicape->besoin}}" minlength="2" type="text"  />
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="detail" class="control-label col-lg-3">Détails sur la PH </label>
                      <div class="col-lg-9">
                        <textarea class="form-control" name="detail" id="detail" placeholder="Vos détails" rows="5" data-rule="required" data-msg="Vos détails">{{$handicape->detail}}</textarea>
                      </div>
                    </div>
                  </div>
                </div>
                
                
                <div class="form-group ">
                  <label class="control-label col-lg-2 col-sm-3">Photo</label>
                  <div class="col-lg-10 col-sm-9">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                        @if ($handicape->image ==null)
                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                        @else
                        <img src="{{asset('/storage/imgs/'.$handicape->image)}}" alt="" />
                        @endif
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
                    <a href="/administration/handicape" type="button" class="btn btn-danger">Annuler</a>
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

<script src="/ckeditor/ckeditor.js"></script>
  <script>
    /* CKEDITOR.replace('description',{
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form'
    });
    CKEDITOR.replace('description_en',{
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form'
    }); */
    
  </script>
 
    
@endsection
