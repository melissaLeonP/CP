<nav>
    <div class="nav-wrapper ">
      <!-- <a href="#" src="img/logoBlanco.png" class="brand-logo"></a> -->
      <a href="#"><img id="navImagen" class="" src="img/logoBlanco.png" style="" alt=""></a>
      <ul id="nav-mobile" class="right ">
      <!-- <li><img class="" src="img/logoBlanco.png" alt=""></li> -->
        <!-- <li><a @click="menu=0"></a></li> -->
        <li><a @click="menu=0">Sliders</a></li>
        <li><a @click="menu=1">Productos</a></li>
        <li><a @click="menu=2">Categorias</a></li>
        <li><a @click="menu=3">Cambiar contraseña </a></li>
        <!-- <li><a href="collapsible.html">cerrar</a></li> -->
        <li>
          <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" >
            {{ csrf_field() }}
            </form>
      </ul>
    </div>
  </nav>