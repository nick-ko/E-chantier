@extends('layouts.backend')

@section('backendcontent')
    <br/>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
            <div class="product-payment-inner-st">
                <div id="myTabContent" class="tab-content custom-product-edit">
                    <div class="product-tab-list tab-pane fade active in" id="description">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="review-content-section">
                                    <div id="dropzone1" class="pro-ad">
                                        <form action="{{url('/dashboard/add-chantier')}}" method="post"   enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <input name="chantier_code" type="text" class="form-control" placeholder="Code chantier">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <input name="chantier_name" type="text" class="form-control" placeholder="Nom chantier">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <input name="chantier_ville" type="text" class="form-control" placeholder="Ville">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <input name="chantier_time" type="date" class="form-control" placeholder="Duree en jour svp">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Plan</label>
                                                        <input name="chantier_plan" type="file" class="form-control" placeholder="Code chantier">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Photo finition</label>
                                                        <input name="chantier_image" type="file" class="form-control" placeholder="Code chantier">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <input name="chantier_alt" type="text" class="form-control" placeholder="Google map altitude">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <input name="chantier_long" type="text" class="form-control" placeholder="Google map longitude">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                    <select name="chantier_chief" class="form-control">
                                                        <option value="" >   ----     Selectionnez le Chef Chantier    -------   </option>
                                                        @foreach($chiefs as $chief)
                                                            <option value="{{$chief->id}}" >{{$chief->chief_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <input name="chantier_debut" type="date" class="form-control" placeholder="Date de debut du chantier">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group">
                                                        <input name="chantier_budget" type="number" class="form-control" placeholder="Budget du chantier">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="payment-adress">
                                                        <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">Ajouter</button>
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

@endsection
