<section id="header_section_wrapper" class="header_section_wrapper">
    <div class="container">
        <div class="header-section">
            <div class="row">
                <div class="col-md-4">
                    <div class="left_section">
                                            <span class="date">
                                               {{ date('l') }}
                                            </span>
                        <!-- Date -->
                                            <span class="time">
                                               {{ date('j F. Y') }}
                                            </span>
                        <!-- Time -->
                        <div class="social">
                            <a class="icons-sm fb-ic"><i class="fa fa-facebook"></i></a>
                            <!--Twitter-->
                            <a class="icons-sm tw-ic"><i class="fa fa-twitter"></i></a>
                            <!--Google +-->
                            <a class="icons-sm inst-ic"><i class="fa fa-instagram"> </i></a>
                            <!--Linkedin-->
                            <a class="icons-sm tmb-ic"><i class="fa fa-tumblr"> </i></a>
                            <!--Pinterest-->
                            <a class="icons-sm rss-ic"><i class="fa fa-rss"> </i></a>
                        </div>
                        <!-- Top Social Section -->
                    </div>
                    <!-- Left Header Section -->
                </div>
                <div class="col-md-4">
                    <div class="logo">
                        <a href="index.html"><img src="{{ asset('public/others') }}/{{ $shareData['front_logo'] }}" alt="Tech NewsLogo"></a>
                    </div>
                    <!-- Logo Section -->
                </div>
                <div class="col-md-4">
                    <div class="right_section">
                        <ul class="nav navbar-nav">
                            <li><a href=" {{ url('/login') }} ">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                            <li class="dropdown lang">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">En <i
                                        class="fa fa-angle-down"></i></button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li><a href="#">Bn</a></li>
                                </ul>
                            </li>
                        </ul>
                        <!-- Language Section -->

                        <ul class="nav-cta hidden-xs">
                            <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><i
                                    class="fa fa-search"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="head-search">
                                            <form role="form">
                                                <!-- Input Group -->
                                                <div class="input-group">
                                                    <input type="text" class="form-control"
                                                           placeholder="Type Something"> <span class="input-group-btn">
                                                                            <button type="submit"
                                                                                    class="btn btn-primary">Search
                                                                            </button>
                                                                        </span></div>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <!-- Search Section -->
                    </div>
                    <!-- Right Header Section -->
                </div>
            </div>
        </div>
        <!-- Header Section -->

        <div class="navigation-section">
            <nav class="navbar m-menu navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#navbar-collapse-1"><span class="sr-only">Toggle navigation</span> <span
                                class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="#navbar-collapse-1">
                         <ul class="nav navbar-nav main-nav">
                            <li class="active"><a href=" {{ url('/') }} ">Home</a></li>
                          
                          @foreach($shareData['categories'] as $category)
     <li><a href="{{ url('/category') }}/{{ $category->id }}">{{ $category->name }}</a></li>                         @endforeach

         @foreach($shareData['authors'] as $author)
     <li><a href="{{ url('/author') }}/{{ $author->id }}">{{ $author->name }}</a></li>                         @endforeach
                            
                        </ul>
                    </div>
                    <!-- .navbar-collapse -->
                </div>
                <!-- .container -->
            </nav>
            <!-- .nav -->
        </div>
        <!-- .navigation-section -->
    </div>
    <!-- .container -->
</section>
<!-- header_section_wrapper -->