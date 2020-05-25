<nav class="side-navbar">
  <div class="side-navbar-wrapper">
    <!-- Sidebar Header    -->
    <div class="sidenav-header d-flex align-items-center justify-content-center">
      <!-- User Info-->
      <div class="sidenav-header-inner text-center"><img src="{{ asset('img/me1.jpg') }}" alt="person" class="img-fluid rounded-circle">
        <h2 class="h5">Sukanta Bala</h2>
      </div>
      <!-- Small Brand information, appears on minimized sidebar-->
      <div class="sidenav-header-logo"><a href="{{ url('/') }}" class="brand-small text-center"> <strong>S</strong><strong class="text-primary">K</strong></a></div>
    </div>
    <!-- Sidebar Navigation Menus-->
    <div class="main-menu">
      <ul id="side-main-menu" class="side-menu list-unstyled">                  
        <li><a href="{{ route('aboutmes.index') }}"> <i class="fas fa-home"></i> About Me </a></li>
        <li><a href="{{ route('portfolios.index') }}"> <i class="fas fa-home"></i> Portfolio </a></li>
        <li><a href="{{ route('resumes.index') }}"> <i class="fas fa-home"></i> Resume </a></li>
        <li><a href="{{ route('blogposts.index') }}"> <i class="fas fa-home"></i> Blog Post </a></li>
        <!--<li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Example dropdown </a>
          <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
            <li><a href="#">Page</a></li>
            <li><a href="#">Page</a></li>
            <li><a href="#">Page</a></li>
          </ul>
        </li>-->
      </ul>
    </div>
  </div>
</nav>