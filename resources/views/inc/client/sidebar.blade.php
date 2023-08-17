<nav class="navbar navbar-light navbar-vertical navbar-vibrant navbar-expand-lg">
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
      <div class="navbar-vertical-content scrollbar">
        <ul class="navbar-nav flex-column" id="navbarVerticalNav">
          <li class="nav-item"><a class="nav-link active" href="/client/dashboard">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="home"></span></span><span class="nav-link-text">Dashbboard</span></div>
            </a></li>
          <li class="nav-item">
            <p class="navbar-vertical-label">Apps</p><a class="nav-link dropdown-indicator" href="#e-commerce" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-commerce">
              <div class="d-flex align-items-center">
                <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div><span class="nav-link-icon"><span data-feather="shopping-cart"></span></span><span class="nav-link-text">E commerce</span>
              </div>
            </a>
            <ul class="nav collapse parent" id="e-commerce">
              <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="" aria-expanded="false">
                  <div class="d-flex align-items-center"><span class="nav-link-text"></span></div>
                </a></li>
              <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="" aria-expanded="false">
                  <div class="d-flex align-items-center"><span class="nav-link-text"></span></div>
                </a></li>
                <li class="nav-item"><a class="nav-link" href="/client/commandes" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-text"><span data-feather="list"></span> commandes</span></div>
                  </a></li>

            </ul>
          </li>
        </ul>
      </div>
      <div class="px-3">
        <a onclick="event.preventDefault();
        document.getElementById('logout-form').submit();" class="btn btn-phoenix-secondary d-flex flex-center w-100" href="#!">
        <span class="me-2" data-feather="log-out"></span>deconnexion</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
    </div>
  </nav>
