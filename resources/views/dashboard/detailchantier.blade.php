@extends('layouts.dashboard')

@section('dashcontent')
    <div class="single-pro-review-area mt-t-30 mg-b-15">

        <div class="container-fluid">
            <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="white-box res-mg-t-30 table-mg-t-pro-n">
                        <a class="btn btn-primary pull-right" href="{{url('/etat-chantier/'.$chantier->chantier_code)}}">Etat d'avancement </a>
                        <h5 class="box-title">Debut : {{$chantier->chantier_debut}}</h5>
                        <div id="countdown" class="box-title"></div>
                        <h5 class="box-title">Fin :{{$chantier->chantier_time}} </h5>

                        <h5 class="box-title">Etat d'Avancement :</h5>
                        <ul class="country-state">
                            <li>
                                <div class="pull-right"></div>
                                <div class="progress" style="height: 20px;">
                                    <div class="progress-bar bg-info progress-bar-striped" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:{{$detail->etat_general}}%;">{{$detail->etat_general}}%</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="profile-info-inner">
                        <div class="profile-details-hr">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="address-hr">
                                        <p><b>PLAN</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-img">
                            <img src="{{URL::to($chantier->chantier_plan)}}" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="profile-info-inner">
                        <div class="profile-details-hr">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="address-hr">
                                        <p><b>MAQUETTE</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-img">
                            <img src="{{URL::to($chantier->chantier_image)}}" alt="" />
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
    <script src="{{asset('admin/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('admin/js/countdown/countdown.js')}}"></script>
    <script src="{{asset('admin/js/countdown/countdown.min.js')}}"></script>
    <script>
        (function ($) {

            'use strict';

            // ------------------------------------------------------- //
            // Countdown
            // ------------------------------------------------------ //
            $('#countdown').countdown(' <?= $chantier->chantier_time;?>', function(event) {
                var $this = $(this).html(event.strftime(''
                    + '<div class="alert alert-primary text-center counter" role="alert"><button class="btn btn-primary">%D Jours</button> - '
                    + '<button class="btn btn-primary">%H Heures</button>   - '
                    + '<button class="btn btn-primary">%M Minuntes</button> - '
                    + '<button class="btn btn-primary">%S secondes </button></div>'
                ));
            });

        })(jQuery);
    </script>
@endsection
