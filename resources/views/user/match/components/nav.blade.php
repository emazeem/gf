<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link {{(Route::currentRouteName()=='match.show')?'btn-primary':''}}" href="{{route('match.show')}}">Browse Users</a>
        <a class="nav-item nav-link {{(Route::currentRouteName()=='match.mutual')?'active':''}}" href="{{route('match.mutual')}}">Mutual Match</a>
        <a class="nav-item nav-link {{(Route::currentRouteName()=='match.me.like')?'active':''}}" href="{{route('match.me.like')}}">Who Likes You</a>
        <a class="nav-item nav-link {{(Route::currentRouteName()=='match.you.like')?'active':''}}" href="{{route('match.you.like')}}">You Like</a>
        <a class="nav-item nav-link {{(Route::currentRouteName()=='match.you.unlike')?'active':''}}" href="{{route('match.you.unlike')}}">You Said No</a>
    </div>
</nav>