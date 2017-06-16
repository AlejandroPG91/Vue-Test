<section class="hero is-info is-large">
  <!-- Hero header: will stick at the top -->
  <div class="hero-head">
    <header class="nav shadow">
      <div class="container">
        <div class="nav-left">
          <a class="nav-item">
            {{-- <img src="images/bulma-type-white.png" alt="Logo"> --}}
            Travel
          </a>
        </div>
        <span class="nav-toggle">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </span>
        <div class="nav-right nav-menu">
          <ul>
          @if (Auth::guest())
            <router-link class="menu-topbar" tag="li" to="/register">
              <a>Register</a>
            </router-link>
            {{-- <router-link class="menu-topbar" tag="li" to="/login" exact>
              <a>Login</a>
            </router-link> --}}
            <li class="menu-topbar"><a href="{{ route('login') }}">Login</a></li>
            {{-- <a class="nav-item" href="{{ route('register') }}">Register</a></li> --}}
            @else
              <li class="menu-topbar">
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                Logout
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </li>
             <li class="menu-topbar" id="li">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  {{ Auth::user()->name }} <span class="caret"></span>
                </a>
              </li>
          @endif
            <li class="menu-topbar">
              <a href="https://es.pinterest.com/"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
            </li>
            <li class="menu-topbar">
              <a href="https://twitter.com/?lang=es"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </li>
            <li class="menu-topbar">
              <a href="https://www.facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </header>
  </div>

  <!-- Hero content: will be in the middle -->
  {{-- <div class="hero-body">
    <div class="container has-text-centered">
      <h1 class="title">
        My Stream
      </h1>
      <h2 class="subtitle">
        Demo
      </h2>
    </div>
  </div> --}}

  <!-- Hero footer: will stick at the bottom -->
  <div class="hero-foot">
      @include ('layouts.nav')
  </div>
</section>
