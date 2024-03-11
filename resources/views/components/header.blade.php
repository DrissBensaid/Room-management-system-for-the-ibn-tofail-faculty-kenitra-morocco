<nav class="navbar navbar-expand-lg navbar-light w-100" style="background-color:#3a4270; max-height:43px;">
    <div class="container-fluid">
      <a class="navbar-brand text-light"  href="#"><i style='color:#fd5234;  font-size:18px' class="fa-solid fa-user"></i> @yield('logotitle')</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse d-flex flex-row-reverse"  id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a style='cursor: pointer;' class="nav-link active" aria-current="page" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" ><i style='color:#fd5234;' class="fa-solid fa-right-from-bracket "></i></a>
          </li>
          
        </ul>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </div>
    </div>
  </nav>