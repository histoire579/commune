<div class="container-fluid px-md-6 mb-15">
    <div class="row mt-11">
        <div class="col-md-10">
            {{-- <form action="{{route('search')}}" method="GET" class="mb-10">
                @csrf --}}
            <div class="row">
                <div class="col-md-4">
                    <div>
                        <span class="label">Service</span>
                    </div>
                    <div class="form-select-wrapper mb-4 mt-3">
                        <select class="form-select" aria-label="Default select example" id="service_id" name="service_id">
                        <option value="0" selected>Toutes</option>
                        @foreach ($services as $item)
                            @if (request()->service_id == $item->id)
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
                        <span class="label">Thématique</span>
                    </div>
                    <div class="form-floating mb-4 mt-3">
                        <input type="number" class="form-control" disabled value="{{$theme->id}}" name="theme" id="theme">
                    </div>
                </div>
                <div class="col-md-1">
                    
                </div>
                <div class="col-md-1">
                    
                </div>
                <div class="col-md-2">
                    
                </div>

                {{-- <div class="col-md-1"></div>  type="submit"--}}
                <div class="col-md-1">
                    <button  id="view" class="btn btn-circle btn-primary mb-0"><i class="uil uil-check"></i></button>
                </div>
            </div>
            {{-- </form> --}}
        </div>
        
        
        <div class="col-md-1">
            <button class="btn btn-gradient gradient-1 rounded-pill mb-0" id="print">PDF</button>
        </div>
        <div class="col-md-1">
            <button id="excel" class="btn btn-green rounded-pill mb-0">Excel</button>
        </div>
    </div>
    <div>
        {{-- @if (count($handicapes) <= 0)
            <h2 class="text-center">Aucune donnée trouvée</h2>
        @endif --}}
    </div>
    
    <div>
        <table class="table table-bordered table-responsive-lg" id="printQualite" style="border-collapse: collapse; border-spacing: 0; width: 100%; ">
            <thead>
                <tr>
                <th>N°</th>  
                <th>Service</th>  
                <th>Thématique</th>
                <th>Moyenne</th>
                <th>Moyenne acceptable</th>
                <th>Appreciation</th>
                <th></th>
                </tr>
            </thead>
            <tbody >
                @php $y=1;@endphp
                @foreach ($qualites as $item) 
                    <tr>
                        <td>{{$y}}</td>
                        <td>{{$item->service->nom}}</td>
                        <td>{{$item->theme->titre}}</td>
                        <td>{{$item->moyenne}}</td>
                        <td>{{$item->moyenneAcceptable}}</td>
                        <td>{{$item->appreciation->titre}}</td>                   
                    </tr> 
                    @php $y = $y + 1;@endphp                  
                @endforeach 
            </tbody>
        </table>
    </div>
    {{ $qualites->links() }}
</div>