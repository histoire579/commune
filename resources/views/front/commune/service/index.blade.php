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
          <h2 class="display-5 mb-3">Services sociaux de base {{$commune->nom}}</h2>
          <p class="lead px-xxl-3"></p>
        </div>
        <!-- /column -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<section class="wrapper bg-light" id="elts">
    @include('front.commune.service.content')
</section>
@endsection
@section('extra-js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('printThis/printThis.js')}}"></script>
<script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
<script type="text/javascript">

  $(document).ready(function(){
    var comId = $('#com_id').val();
    var quaId = $('#qua_id').val();
    var typeId = $('#cat_id').val();

    $(document).on('click','#print',function(){
                
        $('#printTable').printThis({
            importCSS: false,
            header: "<h1>BASE DE DONNEES DES SERVICES SOCIAUX DE BASE</h1>"
        });
    });

    $(document).on('click','#printMore',function(){        
        $('#PrintDetail').printThis({
            importCSS: false,
            header: "<h1>BASE DE DONNEES DES SERVICES SOCIAUX DE BASE</h1>"
        });
    });

    $(document).on('click','#excel',function(){
        $("#printTable").table2excel({
            exclude:".noExl",
            name:"Worksheet Name",
            filename:"BASE DE DONNEES DES SERVICES SOCIAUX DE BASE",//do not include extension
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
        var comId = $('#com_id').val();
        var quaId = $('#qua_id').val();
        var typeId = $('#cat_id').val();
        $.ajax({
            type:'get',
            url:"{{ route('service.commune.search') }}" + "?page=" +page,
            data:{'com_id':comId, 'qua_id':quaId, 'cat_id':typeId},
            success:function(data){
                console.log('success');
                console.log(data);
                $('#elts').html(data);
            },
            error:function(){

            }
        });
    }

    $(document).on('click','#view',function(){
        var comId = $('#com_id').val();
        var quaId = $('#qua_id').val();
        var typeId = $('#cat_id').val();
        $.ajax({
            type:'get',
            url:"{{ route('service.commune.search') }}",
            data:{'com_id':comId, 'qua_id':quaId, 'cat_id':typeId},
            success:function(data){
                console.log('success');
                console.log(data);
                $('#elts').html(data);
            },
            error:function(){

            }
        });
    });

    $(document).on('click','.edit',function(event){
        event.preventDefault();
        var id= $(this).data('id');
        //alert(id);
        $.ajax({
            type:'get',
            url:"/service-edit/" +id,
            success:function(data){
                console.log('success');
                //console.log(data);
                if (data.status==200) { 
                    if (data.data.image == null) {
                        $('.imagePreview').attr('src', 'http://127.0.0.1:8000/storage/imgs/user.jpg');
                    }else{
                        $('.imagePreview').attr('src', 'http://127.0.0.1:8000/storage/imgs/'+data.data.image);
                    }
                    
                    $('#noms').text(data.data.nom);
                    $('#communes').text(data.data.commune.nom);
                    $('#quartiers').text(data.data.quartier.nom);
                    $('#services').text(data.data.categorie.titre);
                    $('#localisations').text(data.data.localisation);
                    $('#contacts').text(data.data.contact);
                    $('#capacites').text(data.data.capacite);
                    $('#commodites').text(data.data.commodite);
                    $('#qualites').text(data.data.qualite);
                    $('#mesures').text(data.data.mesure);
                    $('#ameliorations').text(data.data.amelioration);
                    $('#autres').text(data.data.autre);
                    $('#modal-S02').modal('show');
                }else{
                    console.log(data.message);
                    $('#exist').text(data.message);
                    $('#modal-log1').modal('show');
                }
            },    
            error:function(){

            }
        });
    });

  }); 
  
</script>
@endsection