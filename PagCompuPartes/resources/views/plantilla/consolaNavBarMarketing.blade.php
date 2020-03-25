<nav  class="responsive">
  <div class="fixed finish nav-wrapper">
  <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
  <a href="#" class="hide-on-small-only"><img id="navImagen" class="" src="img/logoBlanco.png" style="" alt=""></a>
    <ul class="right hide-on-small-only">
      <li @click="menu=0"><a>Sliders</a></li>
      <li @click="menu=3"><a>Cambiar contraseña </a></li>
      <li>
        <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
          </li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" >
          {{ csrf_field() }}
          </form>
    </ul>
  </div>
  </nav>


<ul class="sidenav left " id="mobile-demo">
    <li><img class="center" src="img/logo-250x50.png" alt=""></li>
    <li @click="menu=0"><a class="black-text" href="#">Sliders</a></li>
    <li @click="menu=3"><a class="black-text" href="#">Cambiar contraseña </a></li>
    <!-- <li><a href="collapsible.html">cerrar</a></li> -->
    <li>
      <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
    </li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" >
    {{ csrf_field() }}
    </form>
</ul>