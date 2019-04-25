@extends('layouts.backend')

@section('backendcontent')
    <div class="courses-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="white-box res-mg-t-30 table-mg-t-pro-n">
                        <h3 class="box-title">Etat d'avancement du chantier</h3>
                        <br>
                        <ul class="country-state">
                            <li>
                                <h2><span >Fondations/Terrassement</span></h2>
                                <div class="pull-right">{{$detail->etat_fondation}} %</div>
                                <div class="progress" style="height: 15px;">
                                    <div class="progress-bar progress-bar-danger ctn-vs-1" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:{{$detail->etat_fondation}}%;"> <span class="sr-only">75% Complete</span></div>
                                </div>
                            </li>
                            <li>
                                <h2><span >Assainissement / Soubassement</span></h2>
                                <div class="pull-right">{{$detail->etat_soubassement}}% </div>
                                <div class="progress" style="height: 15px;">
                                    <div class="progress-bar progress-bar-info ctn-vs-2" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:{{$detail->etat_soubassement}}%;"> <span class="sr-only">48% Complete</span></div>
                                </div>
                            </li>
                            <li>
                                <h2><span >Elevation des murs </span></h2>
                                <div class="pull-right">{{$detail->etat_elevation_mur}}% </div>
                                <div class="progress" style="height: 15px;">
                                    <div class="progress-bar progress-bar-success ctn-vs-3" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:{{$detail->etat_elevation_mur}}%;"> <span class="sr-only">55% Complete</span></div>
                                </div>
                            </li>
                            <li>
                                <h2><span >Charpente</span></h2>
                                <div class="pull-right">{{$detail->etat_charpente}}% </div>
                                <div class="progress" style="height: 15px;">
                                    <div class="progress-bar progress-bar-success ctn-vs-4" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:{{$detail->etat_charpente}}%;"> <span class="sr-only">33% Complete</span></div>
                                </div>
                            </li>
                            <li>
                                <h2><span >Couverture</span></h2>
                                <div class="pull-right">{{$detail->etat_couverture}} % </div>
                                <div class="progress" style="height: 15px;">
                                    <div class="progress-bar progress-bar-inverse ctn-vs-5" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:{{$detail->etat_couverture}}%;"> <span class="sr-only">60% Complete</span></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="courses-inner res-mg-t-30 table-mg-t-pro-n tb-sm-res-d-n dk-res-t-d-n">
                        <div class="courses-title">
                            <a href="#"><img src="{{URL::to($chantier->chantier_image)}}" alt="" /></a>
                            <h2>{{$chantier->chantier_name}}</h2>
                        </div>
                        <div class="courses-alaltic">
                            <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-clock"></i></span> {{$chantier->chantier_time}} </span>
                            <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-money"></i></span> {{$chantier->chantier_budget}} FCFA</span>
                        </div>
                        <div class="course-des">
                            <p><span><i class="fa fa-barcode"></i></span> <b>Code chantier:</b> {{$chantier->chantier_code}}</p>
                            <p><span><i class="fa fa-map-marker"></i></span> <b>Ville:</b> {{$chantier->chantier_ville}}</p>
                            <p><span><i class="fa fa-user"></i></span> <b>Chef chantier:</b> {{$chantier->chief_name}}</p>
                            <p><span><i class="fa fa-check-circle"></i></span> <b>Status:</b>
                                @if($chantier->chantier_status ==0) Encour de construction @else Chantier terminer @endif</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="white-box res-mg-t-30 table-mg-t-pro-n">
                        <h3 class="box-title">ETAT D'AVANCEMENT GENERAL</h3>
                        <br>
                        <ul class="country-state">
                            <li>
                                <div class="pull-right">{{$detail->etat_general}} %</div>
                                <div class="progress" style="height: 20px;">
                                    <div class="progress-bar bg-info progress-bar-striped" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:{{$detail->etat_general}}%;">{{$detail->etat_general}} %</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
