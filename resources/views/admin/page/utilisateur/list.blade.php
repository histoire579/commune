@extends('layouts.mainAdmin')

@section('content')
<section id="main-content">
  <section class="wrapper">
    <div class="row mt">
      <div class="col-lg-12">
        <div class="content-panel">
          <h4><i class="fa fa-angle-right"></i>Utilisateurs</h4>
          
          <div class="row">
             <div class="col-md-4 col-sm-4 mb"></div>
             <div class="col-md-4 col-sm-4 mb"></div>
             <div class="col-md-4 col-sm-4 mb"></div>
          </div>
          <div class="row">
            <div class="col-md-1 col-sm-1 mb">
              
            </div>
            <div class="col-md-5 col-sm-5 mb">
              
            </div>
            <div class="col-md-6 col-sm-6 mb">
              <form class="form-inline" role="form" action="{{route('administration.utilisateur.list.search')}}">
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
               
                  <th>Nom</th>
                  <th>Email</th>
                  <th>Téléphone</th>
                  <th class="numeric">Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $type)
                <tr>
                  <td data-title="Company">{{$type->name}}</td>
                  <td data-title="Company" >{{$type->email}}</td>
                  <td data-title="Company">{{$type->phone}}</td>
                  @if ($type->active==1)
                    <td class="numeric" data-title="Price"><a href="{{route('administration.utilisateur.deactiver', $type)}}" title="Activer"> Désactiver</a></td>
                  @else
                    <td class="numeric" data-title="Price"><a href="{{route('administration.utilisateur.activer',  $type)}}" title="Activer"> Activer</a></td>                   
                  @endif  
                </tr>                   
                @endforeach
              </tbody>
            </table>
            <div style="text-align: right; margin: 15px">{{$users->links()}}</div>
          </section>
        </div>
        <!-- /content-panel -->
      </div>
      <!-- /col-lg-12 -->
    </div>
  </section>
</section>
@endsection
