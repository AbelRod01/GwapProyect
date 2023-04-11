<div class="d-flex justify-content-around p-1 " style="border-bottom: 1px solid grey;">
    <ul class="nav justify-content-center nav-pills">
        <li class="nav-item">
          <a class="nav-link {{request()->routeIs('home')?'active':'';}}" href="{{route('home')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{request()->routeIs('score')?'active':'';}}" href="{{route('score')}}">Puntuacion</a>
        </li>
        <li class="nav-item">
          @auth
              <a class="nav-link {{request()->routeIs('game')?'active':'';}}" href="{{route('game')}}">Jugar</a>
          @endauth
        </li>
        <li class="nav-item">
            @auth
                <a class="nav-link {{request()->routeIs('images.*')?'active':'';}}" href="{{route('images.index')}}">imagenes</a>
            @endauth
        </li>
    </ul>

    <ul class="nav justify-content-center nav-pills">



        <li class="nav-item">
          @guest<a class="nav-link {{request()->routeIs('register')?'active':'';}}" href="{{route('register')}}">Register</a> @endguest
        </li>
        <li class="nav-item">
            @guest<a class="nav-link {{request()->routeIs('login')?'active':'';}}" href="{{route('login')}}">Login</a> @endguest
        </li>
        <li class="nav-item">
        <form method="POST" action="{{route('logout')}}">
            @csrf
            @auth<button class="btn btn-primary ">Logout</button> @endauth
        </form>
        </li>
    </ul>
</div>
