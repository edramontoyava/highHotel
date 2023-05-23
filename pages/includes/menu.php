<?php
  if($_SESSION['rol']==='Administrador'||$_SESSION['rol']==='Master'){
    echo "<section id='menu'>
    <div class='logo'>
      <img src='/highHotel/img/utils/logo_hotel.png' alt='' />
    </div>
    <div class='name'>
      <h2>Highligths Hotels</h2>
      <p>Asociación de Hoteles y Moteles del estado de Nayarit</p>
      <br />
      <hr />
    </div>
    <div class='items'>
      <li>
        <i class='fa-solid fa-chart-pie'></i><a href='/highHotel/pages/inicio.php'>Inicio</a>
      </li>
      <li>
        <i class='fa-sharp fa-solid fa-person'></i
        ><a href='/highHotel/pages/empleado/empleados.php?p=emp'>Empleados</a>
      </li>
      <li>
        <i class='fa-solid fa-hotel'></i
        ><a href='/highHotel/pages/hoteleria/hoteleria.php?p=hot'>Hoteleria</a>
      </li>
      <li>
        <i class='fa-solid fa-square-poll-vertical'></i><a href='/highHotel/pages/encuesta/encuestas.php?p=enc'>Encuestas</a>
      </li>
      <li>
        <i class='fa-solid fa-door-closed'></i
        ><a href='/highHotel/php/cerrar_sesion.php'>Cerrar Sesión</a>
      </li>
    </div>
  </section>";
  }elseif($_SESSION['rol']==='Empleado'){
    echo "<section id='menu'>
    <div class='logo'>
      <img src='/highHotel/img/utils/logo_hotel.png' alt='' />
    </div>
    <div class='name'>
      <h2>Highligths Hotels</h2>
      <p>Asociación de Hoteles y Moteles del estado de Nayarit</p>
      <br />
      <hr />
    </div>
    <div class='items'>
      <li>
        <i class='fa-solid fa-chart-pie'></i><a href='/highHotel/pages/inicio.php'>Inicio</a>
      </li>
      <li>
        <i class='fa-solid fa-square-poll-vertical'></i><a href='/highHotel/html/encuestas.php?p=en'>Encuestas</a>
      </li>
      <li>
        <i class='fa-solid fa-door-closed'></i
        ><a href='/highHotel/php/cerrar_sesion.php'>Cerrar Sesión</a>
      </li>
    </div>
  </section>";
  }else
?>