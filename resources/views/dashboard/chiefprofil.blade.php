@extends('layouts.dashboard')

@section('dashcontent')
    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="profile-info-inner">
                        <div class="profile-img">
                            <img src="{{URL::to($chief->chief_image)}}" alt="" />
                        </div>
                        <div class="profile-details-hr">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr">
                                        <p><b>Nom</b><br /> {{$chief->chief_name}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                        <p><b>Email</b><br /> {{$chief->chief_email}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                        <ul id="myTabedu1" class="tab-review-design">
                            <li id="#basicInfoPosition"><a href="#information">Modifier vos informations</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content custom-product-edit st-prf-pro">
                            <div class="product-tab-list tab-pane fade" id="information">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <div class="row">
                                                <form action="{{url('/updateprofile')}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <input name="chief_name" type="text" class="form-control" placeholder="Nom">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="chief_email" class="form-control" placeholder="Email">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" name="chief_password" class="form-control" placeholder="Mot de Passe">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Photo de profile</label>
                                                        <input type="file" name="chief_image" class="form-control" placeholder="Address">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="payment-adress mg-t-15">
                                                                <button type="submit" class="btn btn-primary btn-block waves-effect waves-light mg-b-15">Modifier</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                    </form >
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
    <script>

    </script>
@endsection
