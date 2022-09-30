<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('img/sidebar-1.jpg') }}">
  <div class="logo">
    <a href="{{ url('') }}" class="simple-text logo-normal">
      <img src="{{ asset('img/logo-shadow.png') }}" width="175"/>
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      @guest
        <li class="nav-item active-small">
          <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="material-icons">person</i>
            <p>Login</p>
          </a>
        </li>
        <li class="nav-item active-small">
          <a class="nav-link" href="{{ route('register') }}">
            <i class="material-icons">lock</i>
            <p>Register</p>
          </a>
        </li>
      @endguest
      {{-- <li class="nav-item {{ (request()->segment(1) == 'home') ? 'active' : '' }}">
          <a class="nav-link" href="{{ url('home') }}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
          </a>
      </li> --}}
      <li class="nav-item {{ (request()->is('dashboard')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('dashboard') }}">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item {{ (request()->is('events*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('events') }}">
          <i class="material-icons">event_available</i>
          <p>Events</p>
        </a>
      </li>
      {{--
      <li class="nav-item {{ (request()->is('exercises*')) ? 'active' : '' }}">
          <a class="nav-link" href="{{ url('exercises') }}">
              <i class="material-icons">fitness_center</i>
              <p>Exercises</p>
          </a>
      </li>
      <li class="nav-item {{ (request()->is('workouts*')) ? 'active' : '' }}">
          <a class="nav-link" href="{{ url('workouts') }}">
              <i class="material-icons">date_range</i>
              <p>Workouts</p>
          </a>
      </li>
      <li class="nav-item {{ (request()->is('foods*')) ? 'active' : '' }}">
          <a class="nav-link" href="{{ url('foods') }}">
              <i class="material-icons">local_dining</i>
              <p>Foods</p>
          </a>
      </li>
      <li class="nav-item {{ (request()->is('meals*')) ? 'active' : '' }}">
          <a class="nav-link" href="{{ url('meals') }}">
              <i class="material-icons">stars</i>
              <p>Meals</p>
          </a>
      </li>
      <li class="nav-item {{ (request()->is('nutrients*')) ? 'active' : '' }}">
          <a class="nav-link" href="{{ url('nutrients') }}">
              <i class="material-icons">pie_chart</i>
              <p>Nutrients</p>
          </a>
      </li> --}}

      {{--            @auth--}}
      {{--            <li class="nav-item {{ (request()->is('users/profile*')) ? 'active' : '' }}">--}}
      {{--                <a class="nav-link" href="{{ url('users/profile') }}">--}}
      {{--                    <i class="material-icons">person</i>--}}
      {{--                    <p>User Profile</p>--}}
      {{--                </a>--}}
      {{--            </li>--}}
      {{--            @endauth--}}


    </ul>
  </div>
</div>
