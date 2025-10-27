<header>
   <div class="header bg-white shadow-sm py-3">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 logo_section">
               <div class="full">
                  <div class="center-desk">
                     <div class="logo">
                        <a class="navbar-brand fw-bold text-success fs-4" href="{{ route('dashboard') }}">
                           Mandiri <span class="text-warning">Jaya Jamur</span>
                        </a>
                     </div>
                  </div>
               </div>
            </div>

            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
               <nav class="navigation navbar navbar-expand-md navbar-light">
                  <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse justify-content-end" id="navbarsExample04">
                     <ul class="navbar-nav">
                        <li class="nav-item px-2 {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                           <a class="nav-link text-dark {{ request()->routeIs('dashboard') ? 'fw-bold text-success' : '' }}" href="{{ route('dashboard') }}">Home</a>
                        </li>
                        <li class="nav-item px-2 {{ request()->routeIs('barang') ? 'active' : '' }}">
                           <a class="nav-link text-dark {{ request()->routeIs('barang') ? 'fw-bold text-success' : '' }}" href="{{ route('barang') }}">Barang</a>
                        </li>
                        <li class="nav-item px-2 {{ request()->routeIs('about') ? 'active' : '' }}">
                           <a class="nav-link text-dark {{ request()->routeIs('about') ? 'fw-bold text-success' : '' }}" href="{{ route('about') }}">About</a>
                        </li>
                        <li class="nav-item px-2 {{ request()->routeIs('contact') ? 'active' : '' }}">
                           <a class="nav-link text-dark {{ request()->routeIs('contact') ? 'fw-bold text-success' : '' }}" href="{{ route('contact') }}">Contact Us</a>
                        </li>
                        <li class="nav-item px-2">
                           <form method="POST" action="{{ route('logout') }}">
                              @csrf
                              <button type="submit" class="btn btn-warning text-white px-4 rounded-pill">
                                 Logout
                              </button>
                           </form>
                        </li>
                     </ul>
                  </div>
               </nav>
            </div>
         </div>
      </div>
   </div>
</header>
