<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/">Home</a>
      </li>
      @if (Auth::user() == null || Auth::user()->role != "User")
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Category
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          @foreach ($categories as $category)
          <a class="dropdown-item" href="/category/{{ $category->name }}"> {{ $category->name }} </a>
          @endforeach
        </div>
      </li>
      @endif
      @if (Auth::user() != null && Auth::user()->role == "Admin")
      <li class="nav-item">
        <a class="nav-link" href="/manage-user">User</a>
      </li>

      @else
        @if (Auth::user() != null && Auth::user()->role == "User")
        <li class="nav-item">
          <a class="nav-link" href="/profile">Profile</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/blog">Blog</a>
        </li>
            
        @else
        <li class="nav-item">
          <a class="nav-link" href="/about-us">About Us</a>
        </li>
        @endif
      @endif
      
      
    </ul>

    @if (Auth::user())
    <ul class="navbar-nav">
      <li class="nav-item d-flex align-items-center">
        <a class="nav-link" href="/logout">
          <i class="bi-box-arrow-right" style="color: lightgrey;"></i>
          Logout
        </a>
      </li>
    </ul>

    @else
    <ul class="navbar-nav">
      <li class="nav-item d-flex align-items-center">
        <a class="nav-link" href="/signup">
          <i class="bi-person-fill" style="color: lightgrey;"></i>
          Sign Up
        </a>
      </li>
      <li class="nav-item d-flex align-items-center">
        <a class="nav-link" href="/login">
          <i class="bi-box-arrow-right" style="color: lightgrey;"></i>
          Login
        </a>
      </li>
    </ul>
    @endif
  </div>
</nav>