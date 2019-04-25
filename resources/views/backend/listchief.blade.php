@extends('layouts.backend')

@section('backendcontent')
    <br/>
<div class="contacts-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            @foreach($chiefs as $chief)
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="student-inner-std res-mg-b-30">
                    <div class="student-img">
                        <img src="{{URL::to($chief->chief_image)}}" alt="" />
                    </div>
                    <div class="student-dtl">
                        <h2>{{$chief->chief_name}}</h2>
                        <p class="dp">{{$chief->chief_email}}</p>
                        <a href="{{URL::to('dashboard/edit-chief/'.$chief->id)}}"><i class="fa fa-edit"></i></a>
                        <a href="{{URL::to('dashboard/delete-chief/'.$chief->id)}}"><i class="fa fa-trash"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
