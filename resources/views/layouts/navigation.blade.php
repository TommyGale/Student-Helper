    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand logo_h" href="/"><img src="{{ URL::asset('img/logo.png') }}" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
           aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav justify-content-center">
              <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                 aria-expanded="false">Forums</a>
                <ul class="dropdown-menu">
                  @if(auth()->check())
                  <li class="nav-item"><a class="nav-link" href="/posts/create">Create Post</a></li>
                  <li class="nav-item"><a class="nav-link" href="/posts?by={{ auth()->user()->name }}">My Posts</a></li>
                  @endif
                  <li class="nav-item"><a class="nav-link" href="/posts">All Posts</a></li>
                  <li class="nav-item"><a class="nav-link" href="/posts?popular=1">Popular Posts</a></li>
                </ul>

                </li>
                <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                 aria-expanded="false">Event Planner</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="/events">All Events</a></li>
                </ul>

                </li>
              <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
            </ul>
            @guest
            <ul class="nav navbar-nav navbar-right">
              <li class="nav-item"><a href="/login" class="primary_btn">join us</a></li>
            </ul>
            @else
            <ul class="nav navbar-nav navbar-right">
             <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                 aria-expanded="false"><i class="lnr lnr-user"></i></a>
                <ul class="dropdown-menu">
                 <li class="nav-item"><a class="nav-link" href="{{ route('profile' , auth()->user()) }}">My Profile</a></li>
                  <li class="nav-item"><a class="nav-link" href="/chats">My Messages</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">Logout</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
                </ul>
              </li>
            @endguest
          </ul>
          </div>
        </div>
      </nav>