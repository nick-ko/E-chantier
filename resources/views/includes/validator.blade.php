<br>
<div class="row">
    <div class="col-md-12 text-center">
    @if (count($errors)>0)
      <div class="alert alert-danger" role="alert">
          <button type="button" class="close" data-dismiss="alert">×</button>
            <ul>
                 @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>  
    @endif

    @if (Session::has('message'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{Session::get('message')}}
        </div>
    @endif
    
    </div>
</div>