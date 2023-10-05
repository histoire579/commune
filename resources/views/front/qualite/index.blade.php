@extends('layouts.main')

@section('extra-css')
    <style>
        .label{
            color: #000;
            margin-bottom: 10px !important;
            margin-left: 5px;
            font-weight: bold;
        }

        .tab, .tab th, .tab td {

        border: 1px solid black;

        }

        .voir{
            padding: 5px !important;
        }

        .detail{
            font-size: 12px;
        }
    </style>
@endsection

@section('content')
<section class="wrapper bg-soft-primary">
    <div class="container pt-5 pb-6 pt-md-7 pb-md-8 text-center">
      <div class="row">
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <h2 class="display-5 mb-3">{{$theme->titre}}</h2>
          <p class="lead px-xxl-3"></p>
        </div>
        <!-- /column -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<section class="wrapper bg-light" id="elts">
    @include('front.qualite.content')
</section>
@endsection
@section('extra-js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('printThis/printThis.js')}}"></script>
<script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
<script type="text/javascript">

  $(document).ready(function(){
    
    $(document).on('click','#print',function(){
                
        $('#printQualite').printThis({
            importCSS: false,
            loadCSS: "css/app.css",
            header: '<h1 style="text-align: center; margin-bottom: 20px">FICHE ANALYSE DE LA QUALITE DE SERVICE PAR THEMATIQUE</h1>'
        });
    });

    $(document).on('click','#excel',function(){
        $("#printQualite").table2excel({
            exclude:".noExl",
            name:"Worksheet Name",
            filename:"FICHE ANALYSE DE LA QUALITE DE SERVICE PAR THEMATIQUE",//do not include extension
            fileext:".xlsx" // file extension
        });
    });

    $(document).on('click','.pagination a',function(event){
        event.preventDefault();
        var page= $(this).attr('href').split('page=')[1];
        //alert(page);
        getPage(page)
    });

    function getPage(page) {
        var serviceId = $('#service_id').val();
        var themeId = $('#theme').val();
        $.ajax({
            type:'get',
            url:"{{ route('qualite.search') }}" + "?page=" +page,
            data:{'service_id':serviceId, 'theme_id':themeId},
            success:function(data){
                // console.log('success');
                // console.log(data);
                $('#elts').html(data);
            },
            error:function(){

            }
        });
    }

    $(document).on('click','#view',function(){
        var serviceId = $('#service_id').val();
        var themeId = $('#theme').val();
        $.ajax({
            type:'get',
            url:"{{ route('qualite.search') }}",
            data:{'service_id':serviceId, 'theme_id':themeId},
            success:function(data){
                // console.log('success');
                // console.log(data);
                $('#elts').html(data);
            },
            error:function(){

            }
        });
    }); 

  }); 
  
</script>
@endsection