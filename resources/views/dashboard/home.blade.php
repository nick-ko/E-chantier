@extends('layouts.dashboard')

@section('dashcontent')

    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                @foreach($chantiers as $chantier)
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="profile-info-inner">
                        <div class="profile-img">
                            <img src="{{URL::to($chantier->chantier_image)}}" alt="" />
                        </div>
                        <div class="profile-details-hr">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr">
                                        <p><b> Chantier</b><br /> {{$chantier->chantier_name}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                        <p><b>Debut</b><br /> {{$chantier->chantier_debut}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr">
                                        <p><b>Ville Chantier</b><br /> {{$chantier->chantier_ville}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                        <p><b>Budget</b><br /> {{$chantier->chantier_budget}} FCFA</p>
                                    </div>
                                </div>

                            </div>
                            <a class="btn btn-block btn-primary" href="{{url('/detail-chantier/'.$chantier->chantier_code)}}" >Plus d'info</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection


