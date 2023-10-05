<div class="container-fluid px-md-6 mb-15">
    <div class="row mt-11">
        <div class="col-md-12">
            {{-- <form action="{{route('search')}}" method="GET" class="mb-10">
                @csrf --}}
            <div class="row">
                <div class="col-md-2">
                    <div>
                        <span class="label">Communes</span>
                    </div>
                    <div class="form-select-wrapper mb-4 mt-3">
                        <select class="form-select" aria-label="Default select example" id="com_id" name="com_id">
                        <option value="0" selected>Toutes</option>
                        @foreach ($communes as $item)
                            @if (request()->com_id == $item->id)
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
                        <span class="label">Quartiers</span>
                    </div>
                    <div class="form-select-wrapper mb-4 mt-3">
                        <select class="form-select" aria-label="Default select example" id="qua_id" name="qua_id">
                        <option value="0" selected>Toutes</option>
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
                <div class="col-md-2">
                    <div>
                        <span class="label">Types</span>
                    </div>
                    <div class="form-select-wrapper mb-4 mt-3">
                        <select class="form-select" aria-label="Default select example" name="type_id" id="type_id">
                        <option value="0" selected>Toutes</option>
                        @foreach ($types as $item)
                            @if (request()->type_id == $item->id)
                                <option value="{{$item->id}}" selected>{{$item->titre}}</option>
                            @else
                                <option value="{{$item->id}}">{{$item->titre}}</option>
                            @endif
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div>
                        <span class="label">Sexe</span>
                    </div>
                    <div class="form-select-wrapper mb-4 mt-3">
                        <select class="form-select" aria-label="Default select example" name="sexe" id="sexe">
                            <option value="0" selected>Toutes</option>
                            @foreach ($sexes as $item)
                                @if (request()->sexe == $item['Val']) 
                                    <option value="{{$item['Val']}}" selected>{{$item['titre']}}</option>
                                @else
                                    <option value="{{$item['Val']}}">{{$item['titre']}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div>
                        <span class="label">Age</span>
                    </div>
                    <div class="form-floating mb-4 mt-3">
                        <input type="number" class="form-control"  value="{{request()->age ?? ''}}" name="age" id="age">
                    </div>
                </div>

                {{-- <div class="col-md-1"></div>  type="submit"--}}
                <div class="col-md-2">
                    <div>
                        <span class="label">Seuil</span>
                    </div>
                    <div class="form-select-wrapper mb-4">
                        <select class="form-select" aria-label="Default select example" name="seuil" id="seuil">
                            <option value="0" selected>Toutes</option>
                            @foreach ($sueils as $item)
                                @if (request()->seuil == $item['Val']) 
                                    <option value="{{$item['Val']}}" selected>{{$item['titre']}}</option>
                                @else
                                    <option value="{{$item['Val']}}">{{$item['titre']}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div>
                        <span class="label">Washington Group</span>
                    </div>
                    <div class="form-select-wrapper mb-4">
                        <select class="form-select" aria-label="Default select example" name="groupe" id="groupe">
                        <option value="0" selected>Toutes</option>
                        @foreach ($groupes as $item)
                            @if (request()->groupe == $item->id)
                                <option value="{{$item->id}}" selected>{{$item->titre}}</option>
                            @else
                                <option value="{{$item->id}}">{{$item->titre}}</option>
                            @endif
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-2"></div>
                <div class="col-md-1"></div>
                <div class="col-md-1">
                    <button  id="view" class="btn btn-circle btn-primary mt-2"><i class="uil uil-check"></i></button>
                </div>
                <div class="col-md-1">
                    <button class="btn btn-gradient gradient-1 rounded-pill mt-0 mb-5" id="print">PDF</button>
                </div>
                <div class="col-md-1">
                    <button id="excel" class="btn btn-green rounded-pill mt-0 mb-5">Excel</button>
                </div>
            </div>
            
            {{-- </form> --}}
        </div>
    </div>
    <div>
        {{-- @if (count($handicapes) <= 0)
            <h2 class="text-center">Aucune donnée trouvée</h2>
        @endif --}}
    </div>
    
    <div>
        <table class="table-responsive-lg tab" style="border-collapse: collapse; border-spacing: 0; width: 100%; ">
            <thead>
                <tr style="font-size: 15px">
                    <th>N°</th>
                    <th>Communes</th>
                    <th>Quartiers</th>
                    <th>Nom et prénom</th>
                    <th>Age</th>
                    <th>Sexe</th>
                    <th>N°CNI</th>
                    <th>N°CNIV</th>
                    <th>Acte de naissance</th>
                    <th>Type de handicap</th>
                    <th>Taux d’IPP</th>
                    <th>Difficulté selon Washington Group</th>
                    <th>Profession</th>
                    <th>Situation matrimoniale</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="contenu">
                @php $y=1;@endphp
                @foreach ($handicapes as $item) 
                    <tr>
                    {{-- <img src="{{asset('/storage/imgs/'.$type->image)}}" alt="" height="100px" width="200px"> {{$type->titre}}--}} 
                    <td>{{$y}}</td>
                    <td>{{$item->commune->nom}}</td>
                    <td>{{$item->quartier->nom}}</td>
                    @guest
                        <td>{{$item->matricule}}</td>
                    @else
                        <td>{{$item->nom}}</td>
                    @endguest
                    @php 
                    $dateNaissance = $item->anneeNais;
                    $aujourdhui = date("Y-m-d");
                    $diff = date_diff(date_create($dateNaissance), date_create($aujourdhui));
                    @endphp
                    <td>{{$diff->format('%y')}}</td>
                    <td>{{$item->sexe}}</td>
                    <td>{{$item->cni}}</td>
                    <td>{{$item->ci}}</td>
                    <td>{{$item->acteNais}}</td>
                    <td>{{$item->type->titre}}</td>
                    <td>{{$item->seuil}}</td>
                    <td>{{$item->groupe->titre}}</td>
                    <td>{{$item->occupation}}</td> 
                    <td>{{$item->situation}}</td> 
                    <td><a class="btn btn-primary btn-sm rounded-1 voir edit" data-id="{{$item->id}}" title="Voir">Voir</a></td>
                </tr>  
                @php $y = $y + 1;@endphp
                @endforeach 
            </tbody>
        </table>
    </div>
    {{ $handicapes->links() }}
    <div style="overflow:scroll;overflow-y:hidden; display: none;">
    <div id="printPDF">   
        {{-- <div class="row">
            <div class="col-md-6">
                <img src="{{asset('dist/assets/img/logo.jpg')}}" srcset="{{asset('dist/assets/img/logo.jpg')}}" alt="" />
            </div>
            <div class="col-md-6">
                <img src="{{asset('dist/assets/img/logo1.jpg')}}" srcset="{{asset('dist/assets/img/logo1.jpg')}}" alt="" />
            </div>
        </div> --}}
        @php $i=1;@endphp
        <table id="printTable" class="table-responsive-lg tab" style="border-collapse: collapse; border-spacing: 0; width: 100%; ">
            <thead class="entete">
                <tr>
                    <th>N°</th>
                    <th>Commune</th>
                    <th>Quartier</th>
                    <th>Nom et prénom</th>
                    <th>Age</th>
                    <th>Sexe</th>
                    <th>Lieu de naissance</th>
                    <th>N°cni</th>
                    <th>N°cniv</th>
                    <th>Acte de naissance</th>
                    <th>Type d'handicap</th>
                    <th>Taux d’IPP</th>
                    <th>Difficulté selon Washington Group</th>
                    <th>Polyhandicap</th>
                    <th>Profession</th>
                    <th>Niveau scolaire</th>
                    <th>Niveau instruction</th>
                    <th>Formation professionnelle</th>
                    <th>Besoins de la PH</th>
                    <th>Téléphone</th>
                    <th>En contact avec les acteurs suivants</th>
                    <th>Détails sur la PH</th>
                </tr>
            </thead>
            <tbody class="contenu">
                @foreach ($handicapes as $item)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$item->commune->nom}}</td>
                    <td>{{$item->quartier->nom}}</td>
                    @guest
                        <td>{{$item->matricule}}</td>
                    @else
                        <td>{{$item->nom}}</td>
                    @endguest
                    @php 
                    $dateNaissance = $item->anneeNais;
                    $aujourdhui = date("Y-m-d");
                    $diff = date_diff(date_create($dateNaissance), date_create($aujourdhui));
                    @endphp
                    <td>{{$diff->format('%y')}}</td>
                    <td>{{$item->sexe}}</td>
                    <td>{{$item->lieuNais}}</td>
                    <td>{{$item->cni}}</td>
                    <td>{{$item->ci}}</td>
                    <td>{{$item->acteNais}}</td>
                    <td>{{$item->type->titre}}</td>
                    <td>{{$item->seuil}}</td>
                    <td>{{$item->groupe->titre}}</td>
                    <td>{{$item->polyhandicap}}</td>
                    <td>{{$item->occupation}}</td> 
                    <td>{{$item->scolaire}}</td> 
                    <td>{{$item->niveau}}</td>
                    <td>{{$item->formation}}</td>
                    <td>{{$item->besoin}}</td>
                    <td>{{$item->telephone}}</td>
                    <td>{{$item->acteur->nom}}</td>
                    <td>{{$item->detail}}</td>
                </tr>
                @php $i = $i + 1;@endphp
                @endforeach   
            </tbody>
        </table>
    </div>
    </div> 
</div>

@include('front.handicap.detail')
