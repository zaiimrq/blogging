<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">Blogging Aj!</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="{{ route('dashboard.index') }}">
                    <svg class="bi"><use xlink:href="#puzzle"/></svg>
                    Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="{{ route('home') }}">
                    <svg class="bi"><use xlink:href="#house-fill"/></svg>
                    Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="{{ route('posts.index') }}">
                    <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                    My Posts
                </a>
              </li>
          </ul>

          @can('is_admin')            
            <hr class="my-3">
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1 text-muted">
              <span>Administratos</span>
            </h6>
            <ul class="nav flex-column mb-auto">
              <li class="nav-item">
                <a href="{{ route('categories.index') }}" class="nav-link d-flex align-items-center gap-s">Categories</a>
              </li>
            </ul>
          @endcan

          <hr class="my-3">

          <ul class="nav flex-column mb-auto">
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="{{ route('logout') }}">
                    <svg class="bi"><use xlink:href="#door-closed"/></svg>
                    Logout
                </a>
              </li>
          </ul>
        </div>
    </div>
</div>