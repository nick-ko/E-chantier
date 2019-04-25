@extends('layouts.dashboard')

@section('dashcontent')
    <br>
    @include('includes.users',['users'=> $users,'admin'=> $admin,'unread'=> $unread])

    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
        <div class="about-sparkline responsive-mg-b-30">
            <div class="sparkline-hd">
                <div class="main-spark-hd">
                    <h1>{{$user->chief_name}}</h1>
                    <hr>
                </div>
            </div>
            <div class="sparkline-content">
                @foreach(array_reverse($messages->items()) as $message)
                <div class="container">
                    <div class=" {{ $message->from->id !== $user->id ? 'message-orange' : 'message-blue'}}">
                        <p class="message-content">{!!  nl2br(e($message->content))  !!}</p>
                        <div class="message-timestamp-right"></div>
                    </div>

                </div>
                @endforeach
                <form action="" method="post">
                    {{ csrf_field() }}
                    <br>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group ">
                                <input type="text" class="form-control {{$errors->has('content') ? 'is-invalid':''}}" name="content" rows="2"  placeholder="Ecrivez votre message...">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-send"></i></button>
                        </div>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                </form>
            </div>
        </div>
    </div>

@endsection

