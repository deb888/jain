<header>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top custom-navbar">
            <div class="container">
                <div class="logo">
                    <a class="navbar-brand" href="{{ url('/home') }}">
                      <img src="{{ URL::asset('public/frontend/images/logo.svg')}}" alt="Jain Dharm Online" width="104" height="98">
                  </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{url('/home')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="aboutjaindharmdropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About Jain Dharm</a>
                            <div class="dropdown-menu" aria-labelledby="aboutjaindharmdropdown">
                            @foreach($aboutcatdata as $dtx)
                                <a class="dropdown-item" href="{{ url('/about')}}/{{$dtx->slug}}">{{$dtx->title}}</a>
                                @endforeach
                               
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="calendardropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Calendar</a>
                            <div class="dropdown-menu" aria-labelledby="calendardropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="newsdropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">News</a>
                            <div class="dropdown-menu" aria-labelledby="newsdropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="gallerydropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gallery</a>
                            <div class="dropdown-menu" aria-labelledby="gallerydropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="directorydropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Directory</a>
                            <div class="dropdown-menu" aria-labelledby="directorydropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                    </ul>

                    <div class="language-selector">
                        <span><a class="active" href="#">English</a></span>
                        <span><a href="#">हिंदी</a></span>
                    </div>

                </div>
            </div>
        </nav>
    </header>
