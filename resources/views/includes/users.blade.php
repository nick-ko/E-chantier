
<div class="col-md-3">
    <div class="list-group">

        @foreach ($users as $user)
            <a  class="list-group-item nav-item" href="{{ route('conversations.show',$admin->id)}}">
                {{ $admin->admin_name }}
            </a>

            <a  class="list-group-item nav-item" href="{{ route('conversations.show',$user->id)}}">
                {{ $user->chief_name }}
                @if(isset($unread[$user->id]))

                    <span class="badge badge-pill badge-primary">
                           {{ $unread[$user->id] }}
                     </span>

                @endif
            </a>
        @endforeach

    </div>
</div>
