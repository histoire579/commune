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
            border: 1px solid #edeff3;
            text-align: center;
        }

        .tab th{
            font-size: 15px;
            color: #000;
            font-weight: bold;
        }

        .entete{
            font-size: 12px;
            color: #000;
            font-weight: bold;
        }

        .contenu{
            font-size: 13px;
        }

        .voir{
            padding: 5px !important;
        }

        .titre .detail{
            font-size: 12px;
        }

        .titre{
            font-size: 14px;
            font-weight: bold;
        }
    </style>
@endsection

@section('content')
<section class="wrapper bg-soft-primary">
    <div class="container pt-5 pb-6 pt-md-7 pb-md-8 text-center">
      <div class="row">
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <h2 class="display-5 mb-3">Personnes handicapées {{$quartier->nom}}</h2>
          <p class="lead px-xxl-3"></p>
        </div>
        <!-- /column -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<section class="wrapper bg-light" id="elts">
    @include('front.quartier.handicap.content')
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
    var typeId = $('#type_id').val();
    var sexeId = $('#sexe').val();
    var age = $('#age').val();
    

    $(document).on('click','#print',function(){
                
        $('#printTable').printThis({
            importCSS: false,
            header: '<h1 style="text-align: center; margin-bottom: 20px">BASE DE DONNEES DES PERSONNES VIVANT AVEC UN HANDICAPEES (PvH)</h1>'
        });
    });

    $(document).on('click','#printMore',function(){        
        $('#PrintDetail').printThis({
            importCSS: false,
            loadCSS: "css/app.css",
            header: '<h1 style="text-align: center; margin-bottom: 20px">BASE DE DONNEES DES PERSONNES VIVANT AVEC UN HANDICAPEES (PvH) </h1>',
        });
    });

    $(document).on('click','#excel',function(){
        $("#printTable").table2excel({
            exclude:".noExl",
            name:"Worksheet Name",
            filename:"BASE DE DONNEES DES PERSONNES VIVANT AVEC UN HANDICAPEES (PvH)",//do not include extension
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
        var quaId = $('#qua_id').val();
        var typeId = $('#type_id').val();
        var sexeId = $('#sexe').val();
        var age = $('#age').val();
        var seuilId = $('#seuil').val();
        var groupeId = $('#groupe').val();
        $.ajax({
            type:'get',
            url:"{{ route('handicaps.quartier.search') }}" + "?page=" +page,
            data:{'qua_id':quaId, 'type_id':typeId, 'sexe':sexeId, 'age':age, 'seuil':seuilId, 'groupe':groupeId},
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
        var quaId = $('#qua_id').val();
        var typeId = $('#type_id').val();
        var sexeId = $('#sexe').val();
        var age = $('#age').val();
        var seuilId = $('#seuil').val();
        var groupeId = $('#groupe').val();
        $.ajax({
            type:'get',
            url:"{{ route('handicaps.quartier.search') }}",
            data:{'qua_id':quaId, 'type_id':typeId, 'sexe':sexeId, 'age':age, 'seuil':seuilId, 'groupe':groupeId},
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
            url:"/handicape-edit/" +id,
            success:function(data){
                console.log('success');
                if (data.status==200) { 
                    if (data.data.image == null) {
                        $('.imagePreview').attr('src', 'http://127.0.0.1:8000/storage/imgs/user.jpg');
                    }else{
                        $('.imagePreview').attr('src', 'http://127.0.0.1:8000/storage/imgs/'+data.data.image);
                    }
                    
                    $('#nomp').text(data.data.nom);
                    $('#datep').text(data.data.anneeNais);
                    $('#lieup').text(data.data.lieuNais);
                    $('#sexep').text(data.data.sexe);
                    $('#communep').text(data.data.commune.nom);
                    $('#quartierp').text(data.data.quartier.nom);
                    $('#cnip').text(data.data.cni);
                    $('#cip').text(data.data.ci);
                    $('#actep').text(data.data.acteNais);
                    $('#typep').text(data.data.type.titre);
                    $('#seuilp').text(data.data.seuil);
                    $('#groupep').text(data.data.groupe.titre);
                    $('#polyhandicapp').text(data.data.polyhandicap);
                    $('#scolairep').text(data.data.scolaire);
                    $('#occupationp').text(data.data.occupation);
                    $('#situationp').text(data.data.situation);
                    $('#niveaup').text(data.data.niveau);
                    $('#telp').text(data.data.telephone);
                    $('#formationp').text(data.data.formation);
                    $('#besoinp').text(data.data.besoin);
                    $('#contactp').text(data.data.acteur.nom);
                    $('#detailp').text(data.data.detail);
                    $('#modal-012').modal('show');
                }else if(data.status==201){
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