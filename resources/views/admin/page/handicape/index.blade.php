@extends('layouts.mainAdmin')

@section('content')
<section id="main-content">
  <section class="wrapper">
    <div class="row mt">
      <div class="col-lg-12">
        <div class="content-panel">
          <h4><i class="fa fa-angle-right"></i>Liste des personnes handicapées</h4>
          <div class="row">
             <div class="col-md-4 col-sm-4 mb"></div>
             <div class="col-md-4 col-sm-4 mb"></div>
             <div class="col-md-4 col-sm-4 mb"><a style="float: right;margin-right: 100px" href="/administration/handicape-add" type="button"  class="btn btn-default"><i class="fa fa-plus-square" style="color: #08367A" aria-hidden="true"></i> Nouveau</a></div>
          </div>
          <div class="row">
            <div class="col-md-1 col-sm-1 mb">
              
            </div>
            <div class="col-md-5 col-sm-5 mb">
              
            </div>
            <div class="col-md-6 col-sm-6 mb">
              <form class="form-inline" role="form" action="{{route('administration.handicape.search')}}">
                @csrf
                <div class="form-group">
                  <label class="sr-only" for="name">Nom</label>
                  <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrer le nom">
                </div>
                <button type="submit" class="btn btn-theme">Rechercher</button>
              </form> 
            </div>
          </div>
          @include('admin.page.message')
          <section id="no-more-tables">
            <table class="table table-bordered table-striped table-condensed cf" style="font-size: 18px">
              <thead class="cf">
                <tr>
                  <th>Commune</th>
                  <th>Quartier</th>
                  <th>Nom et prénom</th>
                  <th>Année naiss</th>
                  <th>Sexe</th>
                  <th>Lieu naiss</th>
                  <th>N°CNI</th>
                  <th>N°CI</th>
                  <th>Type</th>
                  <th class="numeric"></th>
                  <th class="numeric"></th>
                </tr>
              </thead>
              <tbody>
                 @foreach ($handicapes as $type) 
                <tr>
                  {{-- <img src="{{asset('/storage/imgs/'.$type->image)}}" alt="" height="100px" width="200px"> {{$type->titre}}--}} 
                  <td data-title="Code" >{{$type->commune->nom}}</td>
                  <td data-title="Code" >{{$type->quartier->nom}}</td>
                  <td data-title="Company" >{{$type->nom}}</td>
                  <td data-title="Code" >{{$type->anneeNais}}</td>
                  <td data-title="Code" >{{$type->sexe}}</td>
                  <td data-title="Company" >{{$type->lieuNais}}</td>
                  <td data-title="Code" >{{$type->cni}}</td>
                  <td data-title="Code" >{{$type->ci}}</td>
                  <td data-title="Company" >{{$type->type->titre}}</td>
                  <td class="numeric" data-title="Price"><a href="/administration/handicape-edit/{{$type->id}}"> <i class="fa fa-pencil" style="color: #08367A" aria-hidden="true"></i></a></td>
                  <td class="numeric" data-title="Change">
                    <form action="/administration/handicape/destroy/{{$type->id}}" method="DELETE">
                      @csrf
                      @method('DELETE')
                      <a href="/administration/handicape/destroy/{{$type->id}}" type="button" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" style="color: red" aria-hidden="true"></i></a></td>
                      
                  </form>
                    
                </tr>                   
                @endforeach 
              </tbody>
            </table>
            <div style="text-align: right; margin: 15px">{!! $handicapes->links() !!}</div> 
          </section>
        </div>
        <!-- /content-panel -->
      </div>
      <!-- /col-lg-12 -->
    </div>
  </section>
</section>
@endsection
