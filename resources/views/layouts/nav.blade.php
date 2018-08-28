<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <!-- Left side -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav">

                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle mr-4" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Browse <span class="caret"></span></a>

                        <ul class="dropdown-menu">
                            <li> <a href="/threads"> All threads</a></li>
                            <li> <a href="/threads?popular=1"> Popular</a></li>
                            @if(auth()->check())
                            <li> <a href="/threads?by={{auth()->user()->name}}">My Threads</a></li>
                            @endif
                        </ul>
                    </li>



                    <li class ="mr-4">
                        <a href="/threads/create">New Thread</a>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Channels <span class="caret"></span></a>

                        <ul class="dropdown-menu">
                            @foreach ($channels as $channel)
                                <li><a href="/threads/{{ $channel->slug }}">{{ $channel->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>

                </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a  class="dropdown-item" href="{{ route('profile', Auth::user()) }}">My Profile</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>