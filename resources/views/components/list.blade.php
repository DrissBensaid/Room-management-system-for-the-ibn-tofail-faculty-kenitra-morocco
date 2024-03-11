<div class="w-25 bg-light">
    <ul class="list-group w-100">
        <a href='{{route("user.home")}}'  class="list-group-item bg-light d-flex justify-content-between align-items-center  @yield('activeHome')">
          Home
          <span class="badge bg-dark rounded-pill">14</span>
        </a>
        <a href='{{route("user.profile")}}' class="list-group-item bg-light d-flex justify-content-between align-items-center  @yield('activeProfil')">
          Profil
          <span class="badge bg-dark rounded-pill">1</span>
        </a>
        <a href='{{route("user.salles")}}' class="list-group-item bg-light d-flex justify-content-between align-items-center  @yield('activeSalles')">
            Salles
            <span class="badge bg-dark rounded-pill">2</span>
          </a>
      </ul>
</div>