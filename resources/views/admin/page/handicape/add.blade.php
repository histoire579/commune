@extends('layouts.mainAdmin')

@section('content')
<section id="main-content">
  <section class="wrapper">
    <!-- FORM VALIDATION -->
    <div class="row mt">
        <div class="col-lg-12">
          <h4><i class="fa fa-angle-right"></i> </h4>
          <div class="row">
            <div class="col-md-4 col-sm-4 mb"><a style="float: left;margin-left: 100px" href="/administration/handicape" type="button"  class="btn btn-default"><i class="fa fa-arrow-circle-o-left" style="color: #08367A" aria-hidden="true"></i> Retourner à la liste</a></div>
            <div class="col-md-4 col-sm-4 mb"></div>
            <div class="col-md-4 col-sm-4 mb"></div>
         </div>
         @include('admin.page.message')
          <div class="form-panel">
            <div class=" form">
              <form class="cmxform form-horizontal style-form" id="commentForm"  enctype="multipart/form-data">
                {{-- @csrf method="POST" action="{{route('administration.handicape')}}" --}}
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
                      <label for="nom" class="control-label col-lg-3">Nom complet </label>
                      <div class="col-lg-9">
                        <input class=" form-control" id="nom" name="nom" minlength="2" type="text" required />
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3">Sexe </label>
                      <div class="col-lg-9">
                        <select class="form-control" name="sexe" id="sexe">
                            <option value="M">Masculin</option>
                            <option value="F">Féminin</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3">Type handicape </label>
                      <div class="col-lg-9">
                        <select class="form-control" name="type_id" id="type_id">
                          @foreach ($types as $item)
                            <option value="{{$item->id}}">{{$item->titre}}</option>
                          @endforeach
                          
                        </select>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="seuil" class="control-label col-lg-3">Taux d’IPP </label>
                      <div class="col-lg-9">
                        <select class="form-control" name="seuil" id="seuil">
                          @foreach ($sueils as $item)
                            <option value="{{$item['Val']}}">{{$item['titre']}}</option>
                          @endforeach
                          
                        </select>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3">Difficulté selon Washington Group</label>
                      <div class="col-lg-9">
                        <select class="form-control" name="groupe_id" id="groupe_id">
                          @foreach ($groupes as $item)
                            <option value="{{$item->id}}">{{$item->titre}}</option>
                          @endforeach
                          
                        </select>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="polyhandicap" class="control-label col-lg-3">Polyhandicap </label>
                      <div class="col-lg-9">
                        <input class=" form-control" id="polyhandicap" name="polyhandicap" minlength="2" type="text"  />
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="occupation" class="control-label col-lg-3">Occupation </label>
                      <div class="col-lg-9">
                        <input class=" form-control" id="occupation" name="occupation" minlength="2" type="text"  />
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="niveau" class="control-label col-lg-3">Niveau d'instruction</label>
                      <div class="col-lg-9">
                        <input class=" form-control" id="niveau" name="niveau" minlength="2" type="text"  />
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="telephone" class="control-label col-lg-3">Téléphone</label>
                      <div class="col-lg-9">
                        <input class=" form-control" id="telephone" name="telephone" minlength="2" type="number"  />
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="situation" class="control-label col-lg-3">Situation matrimoniale</label>
                      <div class="col-lg-9">
                        <select class="form-control" name="situation" id="situation">
                          <option value="Célibataire">Célibataire</option>
                          <option value="Marié">Marié</option>
                      </select>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="contact" class="control-label col-lg-3">En contact avec les acteurs</label>
                      <div class="col-lg-9">
                        <select class="form-control" name="acteur_id" id="acteur_id">
                          @foreach ($acteurs as $item)
                            <option value="{{$item->id}}">{{$item->nom}}</option>
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
                          {{-- @foreach ($communes as $item)
                            <option value="{{$item->id}}">{{$item->nom}}</option>
                          @endforeach --}}
                          
                        </select>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="anneeNais" class="control-label col-lg-3">Année de naissance </label>
                      <div class="col-lg-9">
                        <input class=" form-control" id="anneeNais" name="anneeNais" minlength="2" type="text"  />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="lieuNais" class="control-label col-lg-3">Lieu de naissance </label>
                      <div class="col-lg-9">
                        <input class=" form-control" id="lieuNais" name="lieuNais" minlength="2" type="text"  />
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="cni" class="control-label col-lg-3">N°CNI </label>
                      <div class="col-lg-9">
                        <div class="row">
                          <div class="col-lg-4">
                            <select class="form-control" name="siCni" id="siCni">
                              <option value="Oui">Oui</option>
                              <option value="Non">Non</option>
                          </select>
                          </div>
                          <div class="col-lg-8">
                            <input class=" form-control" id="cni" name="cni" minlength="2" type="text"  />
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="ci" class="control-label col-lg-3">N°CNIV </label>
                      <div class="col-lg-9">
                        <div class="row">
                          <div class="col-lg-4">
                            <select class="form-control" name="siCniv" id="siCniv">
                              <option value="Oui">Oui</option>
                              <option value="Non">Non</option>
                          </select>
                          </div>
                          <div class="col-lg-8">
                            <input class=" form-control" id="ci" name="ci" minlength="2" type="text"  />
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
                              <option value="Oui">Oui</option>
                              <option value="Non">Non</option>
                          </select>
                          </div>
                          <div class="col-lg-8">
                            <input class=" form-control" id="acteNais" name="acteNais" minlength="2" type="text"  />
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3">Niveau Scolaire </label>
                      <div class="col-lg-9">
                        <select class="form-control" name="scolaire" id="scolaire">
                            <option value="Primaire">Primaire</option>
                            <option value="Secondaire">Secondaire</option>
                            <option value="Universitaire">Universitaire</option>
                            <option value="Autre">Autre</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="formation" class="control-label col-lg-3">Formation </label>
                      <div class="col-lg-9">
                        <input class=" form-control" id="formation" name="formation" minlength="2" type="text"  />
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="besoin" class="control-label col-lg-3">Besoin de la PH</label>
                      <div class="col-lg-9">
                        <input class=" form-control" id="besoin" name="besoin" minlength="2" type="text"  />
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="detail" class="control-label col-lg-3">Détails sur la PH </label>
                      <div class="col-lg-9">
                        <textarea class="form-control" name="detail" id="detail" placeholder="Vos détails" rows="5" data-rule="required" data-msg="Vos détails"></textarea>
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
                    {{-- type="submit" --}}
                    <button type="submit" id="save" class="btn btn-primary">Sauvegarder</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- /form-panel -->
          
          <div class="modal fade" id="modal-signin" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-sm">
              <div class="modal-content text-center">
                <div class="modal-body">
                  <p class="" id="exist"></p>
                  <div class="row">
                    <div class="col-md-6">
                      <button class="btn btn-red rounded-pill" id="fermer" data-bs-dismiss="modal" aria-label="Close">Non</button>
                    </div>
                    <div class="col-md-6">
                      <button type="button" id="ok" class="btn btn-primary rounded-pill" data-bs-dismiss="modal" aria-label="Close">Oui</button>                      
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var eltFom=null;
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

      $(document).on('submit','#commentForm',function(e){
        e.preventDefault();
        var form = new FormData($(this)[0]);
        eltFom=form;
        //form.append('com_id', $("#com_id").val());
        /* var data= {
          'com_id': $('#com_id').val(),
          'qua_id': $('#qua_id').val(),
          'nom': $('#nom').val(),
          'anneeNais': $('#anneeNais').val(),
          'sexe': $('#sexe').val(),
          'lieuNais': $('#lieuNais').val(),
          'cni': $('#cni').val(),
          'ci': $('#ci').val(),
          'type_id': $('#type_id').val(),
          'groupe_id': $('#groupe_id').val(),
          'occupation': $('#occupation').val(),
          'niveau': $('#niveau').val(),
          'formation': $('#formation').val(),
          'besoin': $('#besoin').val(),
          'telephone': $('#telephone').val(),
          'acteur_id': $('#acteur_id').val(),
          'detail': $('#detail').val(),
          'seuil': $('#seuil').val(),
          'polyhandicap': $('#polyhandicap').val(),
          'scolaire': $('#scolaire').val(),
          'image': $('#image').val(),
        } */
        //console.log(data);
          
         $.ajax({
            type:'post',
            processData: false,
            contentType: false,
            cache: false,
            enctype: 'multipart/form-data',
            url:"{{ route('administration.handicape.save') }}",
            data:form,
            success:function(res){
              console.log(res);
              if (res.status == 400) {
                $('#exist').text(res.error);
                $('#modal-signin').modal('show'); 
              } else {
                location.reload();
              }
            },
            error:function(){

            }
        });  
      });

      $(document).on('click','#fermer',function(){
        $('#modal-signin').modal('hide'); 
      });

      $(document).on('click','#ok',function(){
        $.ajax({
            type:'post',
            processData: false,
            contentType: false,
            cache: false,
            enctype: 'multipart/form-data',
            url:"{{ route('administration.handicape') }}",
            data:eltFom,
            success:function(res){
              console.log(res);
              if (res.status == 400) {
                location.reload();
              } else {
                location.reload();
              }
            },
            error:function(){

            }
        }); 
      });
    });  
  </script>
@endsection
