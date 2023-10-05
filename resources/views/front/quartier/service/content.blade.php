<div class="container-fluid px-md-6 mb-20">
    <div class="row mt-11">
        <div class="col-md-10">
            {{-- <form action="{{route('search')}}" method="GET" class="mb-10">
                @csrf --}}
            <div class="row">
                
                <div class="col-md-3">
                    <div>
                        <span class="label">Quartiers</span>
                    </div>
                    <div class="form-select-wrapper mb-4 mt-3">
                        <select class="form-select" aria-label="Default select example" disabled id="qua_id" name="qua_id">
                        @foreach ($quartiers as $item)
                            @if (request()->qua_id == $item->id)
                                <option value="{{$item->id}}" selected>{{$item->nom}}</option>
                            @else
                                <option value="{{$item->id}}">{{$item->nom}}</option>
                            @endif
                            
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div>
                        <span class="label">Service offert</span>
                    </div>
                    <div class="form-select-wrapper mb-4 mt-3">
                        <select class="form-select" aria-label="Default select example" name="cat_id" id="cat_id">
                        <option value="0" selected>Toutes</option>
                        @foreach ($categories as $item)
                            @if (request()->cat_id == $item->id)
                                <option value="{{$item->id}}" selected>{{$item->titre}}</option>
                            @else
                                <option value="{{$item->id}}">{{$item->titre}}</option>
                            @endif
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    
                </div>
                <div class="col-md-2">
                    
                </div>

                {{-- <div class="col-md-1"></div>  type="submit"--}}
                <div class="col-md-1">
                    <button  id="view" class="btn btn-circle btn-primary mt-9"><i class="uil uil-check"></i></button>
                </div>
            </div>
            {{-- </form> --}}
        </div>
        
        
        <div class="col-md-1">
            <button class="btn btn-gradient gradient-1 rounded-pill mt-9" id="print">PDF</button>
        </div>
        <div class="col-md-1">
            <button id="excel" class="btn btn-green rounded-pill mt-9">Excel</button>
        </div>
    </div>
    <div>
        {{-- @if (count($handicapes) <= 0)
            <h2 class="text-center">Aucune donnée trouvée</h2>
        @endif --}}
    </div>
    
    <div>
        <table class="table table-bordered table-responsive-lg" style="border-collapse: collapse; border-spacing: 0; width: 100%; ">
            <thead>
                <tr>
                <th>N°</th>    
                <th>COMMUNES</th>
                <th>QUARTIERS</th>
                <th>NOMS</th>
                <th>SERVICES OFFERTS</th>
                <th>LOCALISATION EXACT</th>
                <th>CONTACTS</th>
                <th>CAPACITE D’ACCUEIL</th>
                <th>COMMODITES D’ACCES</th>
                <th></th>
                </tr>
            </thead>
            <tbody >
                @php $y=1;@endphp
                @foreach ($services as $item) 
                    <tr>
                        <td>{{$y}}</td>
                        <td>{{$item->commune->nom}}</td>
                        <td>{{$item->quartier->nom}}</td>
                        <td>{{$item->nom}}</td>
                        <td>{{$item->categorie->titre}}</td>
                        <td>{{$item->localisation}}</td>
                        <td>{{$item->contact}}</td>
                        <td>{{$item->capacite}}</td>
                        <td>{{$item->commodite}}</td>
                        <td><a class="btn btn-primary btn-sm rounded-1 voir edit" data-id="{{$item->id}}" data-bs-toggle="modal" data-bs-target="#modal-01" title="Voir">Voir</a></td>                   
                    </tr> 
                    @php $y = $y + 1;@endphp                  
                @endforeach 
            </tbody>
        </table>
    </div>
    {{ $services->links() }}
    <div style="overflow:scroll;overflow-y:hidden; display: none;">
        <table id="printTable" class="tab" style="border-collapse: collapse; border-spacing: 0; width: 100%; ">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>COMMUNES</th>
                    <th>QUARTIERS</th>
                    <th>NOM</th>
                    <th>DOMAINES D’INTERVENTION</th>
                    <th>LOCALISATION EXACT</th>
                    <th>CONTACTS</th>
                    <th>CAPACITE D’ACCUEIL</th>
                    <th>COMMODITES D’ACCES</th>
                    <th>QUALITE DE SERVICE</th>
                    <th>MESURES SPECIQUES AUX PH</th>
                    <th>ASPECTS A AMELIORERE</th>
                    <th>AUTRES DETAILS</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1;@endphp
                @foreach ($services as $item)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$item->commune->nom}}</td>
                    <td>{{$item->quartier->nom}}</td>
                    <td>{{$item->nom}}</td>
                    <td>{{$item->categorie->titre}}</td>
                    <td>{{$item->localisation}}</td>
                    <td>{{$item->contact}}</td>
                    <td>{{$item->capacite}}</td>
                    <td>{{$item->commodite}}</td>
                    <td>{{$item->qualite}}</td>
                    <td>{{$item->mesure}}</td>
                    <td>{{$item->amelioration}}</td>
                    <td>{{$item->autre}}</td>
                </tr>
                @php $i = $i + 1;@endphp
                @endforeach   
            </tbody>
        </table>
    </div>
    
</div>

@include('front.quartier.service.detail')