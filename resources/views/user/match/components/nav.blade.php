<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link {{(Route::currentRouteName()=='match.show')?'btn-primary':''}}" href="{{route('match.show')}}">Browse Users</a>
        <a class="nav-item nav-link {{(Route::currentRouteName()=='match.show')?'active':''}}">Mutual Match</a>
        <a class="nav-item nav-link {{(Route::currentRouteName()=='match.show')?'active':''}}">Who Likes You</a>
        <a class="nav-item nav-link {{(Route::currentRouteName()=='match.show')?'active':''}}" href="{{route('match.you.like')}}">You Like</a>
        <a class="nav-item nav-link {{(Route::currentRouteName()=='match.show')?'active':''}}">You Said No</a>
    </div>
</nav>