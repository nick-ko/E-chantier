@extends('layouts.dashboard')

@section('dashcontent')
    <div class="dual-list-box-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline10-list shadow-reset">
                        <div class="sparkline10-hd">
                            <div class="main-sparkline10-hd">
                                <h1>Plan</h1>
                            </div>
                        </div>
                        <div class="sparkline10-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="dual-list-box-inner">
                                            <div class="row">
                                                <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="image-crop">
                                                        <img src="{{URL::to($chantier->chantier_plan)}}" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="preview-img-pro-ad">
                                                        <div class="img-croper-fl">
                                                            <div class="img-crop-img-rd">
                                                                <div class="img-preview img-preview-custom"></div>
                                                            </div>
                                                            <div class="common-pre-dz">
                                                                <div class="btn-group images-action-pro">
                                                                    <button class="btn btn-white" id="zoomIn" type="button">Zoomer</button>
                                                                    <button class="btn btn-white" id="zoomOut" type="button">Dezoomer</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="sparkline15-list mg-t-30">
                                                                    <div class="sparkline15-hd">
                                                                        <div class="main-sparkline15-hd">
                                                                            <h1>Etat d'avancement du chantier (En %)</h1>
                                                                        </div>
                                                                    </div>
                                                                    <div class="sparkline15-graph">
                                                                    <form action="{{url('/update-chantier')}}" method="post">
                                                                        @csrf
                                                                        <div class="row">
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="touchspin-inner">
                                                                                    <label>Fondations/Terrassement</label>
                                                                                    <input class="touchspin1" type="text" value="{{$detail->etat_fondation}}" name="etat_fondation">
                                                                                    <input  type="hidden" value="{{$chantier->chantier_code}}" name="chantier_code">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="touchspin-inner">
                                                                                    <label>Assainissement / Soubassement</label>
                                                                                    <input class="touchspin1" type="text" value="{{$detail->etat_soubassement}}" name="etat_soubassement">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="touchspin-inner">
                                                                                    <label>Elevation des murs</label>
                                                                                    <input class="touchspin1" type="text" value="{{$detail->etat_elevation_mur}}" name="etat_elevation_mur">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="touchspin-inner">
                                                                                    <label>Charpente</label>
                                                                                    <input class="touchspin1" type="text" value="{{$detail->etat_charpente}}" name="etat_charpente">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <div class="touchspin-inner">
                                                                                    <label>Couverture</label>
                                                                                    <input class="touchspin1" type="text" value="{{$detail->etat_couverture}}" name="etat_couverture">
                                                                                </div>
                                                                                <br>
                                                                            </div>

                                                                            <div class="col-lg-12">
                                                                                <div class="payment-adress mg-t-15">
                                                                                    <button type="submit" class="btn btn-primary btn-block waves-effect waves-light mg-b-15">Modifier</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
