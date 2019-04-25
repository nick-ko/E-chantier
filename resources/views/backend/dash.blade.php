@extends('layouts.backend')

@section('backendcontent')
    <div class="analytics-sparkle-area">
        <div class="container-fluid">
            <div class="row">
                @foreach($chantiers as $chantier)
                  <a href="{{url('/dashboard/view-chantier/'.$chantier->chantier_code)}}">
                   <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line reso-mg-b-30">
                        <div class="analytics-content">
                            <h5>{{$chantier->chantier_name}}</h5>
                            <h2><span >{{$chantier->chief_name}}</span> <span class="tuition-fees">{{$chantier->chantier_ville}}</span></h2>
                            <span class="text-success">{{$chantier->etat_general}}%</span>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar  progress-bar-striped" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: {{$chantier->etat_general}}%;"> <span class="sr-only">20% Complete</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                 </a>
                @endforeach
            </div>
        </div>
        <br>
        <div id="mymap"></div>
    </div>


    <script type="text/javascript">


        var locations = <?php print_r(json_encode($locations)) ?>;


        var mymap = new GMaps({
            el: '#mymap',
            lat: 7.539989,
            lng: -5.547080,
            zoom:6
        });



        $.each( locations, function( index, value ){
            mymap.addMarker({
                lat: value.chantier_alt,
                lng: value.chantier_long,
                title: value.chantier_ville,
                // Create infoWindow
                infoWindow : {
                    content: '<div id="content">'+
                        '<div id="siteNotice">'+
                        '</div>'+
                        '<h1 id="firstHeading" class="firstHeading">'+value.chantier_ville+'</h1>'+
                        '<div id="bodyContent">'+
                        '<p><b>Nom chantier :</b> <b>' +value.chantier_name+'</b> ' +
                        '<p><b>Budget chantier :</b> <b>' +value.chantier_budget+'</b>FCFA ' +
                        '<p><b>Code chantier :</b> <b>' +value.chantier_code+'</b>' +
                        '<p><b>Chef chantier :</b> <b>' +value.chantier_chief+'</b>,' +
                        '<p><b>Duree chantier :</b> <b>' +value.chantier_time+'</b> ' +
                        '</div>'+
                        '</div>'
                },
                mouseover: function(){
                    (infoWindow).open(mymap);
                },
                mouseout: function(){
                    infoWindow.close();
                }
            });
        });


    </script>
@endsection


