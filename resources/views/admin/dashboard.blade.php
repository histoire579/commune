@extends('layouts.mainAdmin')

@section('content')
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12 main-chart">
        <!--CUSTOM CHART START -->
        
        <!--custom chart end-->
        <div class="row mt">
          <!-- SERVER STATUS PANELS -->
          <a href="/administration/handicape">
          <div class="col-md-4 col-sm-4 mb">
            <div class="grey-panel pn donut-chart">
              <div class="grey-header">
                <h5>Handicapées</h5>
              </div>
              <canvas id="serverstatus01" height="120" width="120"></canvas>
              <script>
                var doughnutData = [{
                    value: 70,
                    color: "#FF6B6B"
                  },
                  {
                    value: 30,
                    color: "#fdfdfd"
                  }
                ];
                var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
              </script>
              <div class="row">
                <div class="col-sm-6 col-xs-6 goleft">
                  
                </div>
                <div class="col-sm-6 col-xs-6">
                  <h2>{{$handicapes}}</h2> 
                </div>
              </div>
            </div>
            <!-- /grey-panel -->
          </div>
          </a>
          <!-- /col-md-4-->
          <a href="/administration/service">
          <div class="col-md-4 col-sm-4 mb">
            <div class="darkblue-panel pn">
              <div class="darkblue-header">
                <h5>Services</h5>
              </div>
              <canvas id="serverstatus02" height="120" width="120"></canvas>
              <script>
                var doughnutData = [{
                    value: 60,
                    color: "#1c9ca7"
                  },
                  {
                    value: 40,
                    color: "#f68275"
                  }
                ];
                var myDoughnut = new Chart(document.getElementById("serverstatus02").getContext("2d")).Doughnut(doughnutData);
              </script>
              
              <footer>
                <div class="pull-left">
                  <h5><i class="fa fa-hdd-o"></i> </h5>
                </div>
                <div class="pull-right">
                  <h5><h2>{{$services}}</h2></h5>
                </div>
              </footer>
            </div>
            <!--  /darkblue panel -->
          </div>
          </a>
          <!-- /col-md-4 -->
          <a href="/administration/acteur">
          <div class="col-md-4 col-sm-4 mb">
            <!-- REVENUE PANEL -->
            <div class="green-panel pn">
              <div class="green-header">
                <h5>Acteurs</h5>
              </div>
              <div class="chart mt">
                {{-- <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,464,655]"></div> --}}
              </div>
              <h2>{{$acteurs}}</h2>
            </div>
          </div>
          </a>
          <!-- /col-md-4 -->
        
        </div>
        <!-- /row -->

        <!--custom chart end-->
        <div class="row mt">
          <!-- SERVER STATUS PANELS -->
          <a href="/administration/commune">
          <div class="col-md-4 col-sm-4 mb">
            <div class="grey-panel pn donut-chart">
              <div class="grey-header">
                <h5>Communes</h5>
              </div>
              <canvas id="serverstatus01" height="120" width="120"></canvas>
              <script>
                var doughnutData = [{
                    value: 70,
                    color: "#FF6B6B"
                  },
                  {
                    value: 30,
                    color: "#fdfdfd"
                  }
                ];
                var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
              </script>
              <div class="row">
                <div class="col-sm-6 col-xs-6 goleft">
                  
                </div>
                <div class="col-sm-6 col-xs-6">
                  <h2>{{$communes}}</h2> 
                </div>
              </div>
            </div>
            <!-- /grey-panel -->
          </div>
          </a>
          <!-- /col-md-4-->
          <a href="/administration/quartier">
          <div class="col-md-4 col-sm-4 mb">
            <div class="darkblue-panel pn">
              <div class="darkblue-header">
                <h5>Quartiers</h5>
              </div>
              <canvas id="serverstatus02" height="120" width="120"></canvas>
              <script>
                var doughnutData = [{
                    value: 60,
                    color: "#1c9ca7"
                  },
                  {
                    value: 40,
                    color: "#f68275"
                  }
                ];
                var myDoughnut = new Chart(document.getElementById("serverstatus02").getContext("2d")).Doughnut(doughnutData);
              </script>
              
              <footer>
                <div class="pull-left">
                  <h5><i class="fa fa-hdd-o"></i> </h5>
                </div>
                <div class="pull-right">
                  <h5><h2>{{$quartiers}}</h2></h5>
                </div>
              </footer>
            </div>
            <!--  /darkblue panel -->
          </div>
          </a>
          <!-- /col-md-4 -->
        </div>
        <!-- /row -->
        
        <!-- /row -->
       
      </div>
      <!-- /col-lg-9 END SECTION MIDDLE -->
      <!-- **********************************************************************************************************************************************************
          RIGHT SIDEBAR CONTENT
          *********************************************************************************************************************************************************** -->
    </div>
    <!-- /row -->
  </section>
</section>
@endsection
