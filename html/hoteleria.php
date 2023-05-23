<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HH</title>
    <link rel="stylesheet" href="../css/hoteleria_style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  </head>
  <body>
    <section id="menu">
      <div class="logo">
        <img src="../img/utils/logo_hotel.png" alt="" />
      </div>
      <div class="name">
        <h2>Highligths Hotels</h2>
        <p>Asociación de Hoteles y Moteles del estado de Nayarit</p>
        <br>
        <hr>
      </div>
      <div class="items">
        <li><i class="fa-solid fa-chart-pie"></i><a href="index.html">Inicio</a></li>
        <li>
          <i class="fa-sharp fa-solid fa-person"></i><a href="#">Empleados</a>
        </li>
        <li><i class="fa-solid fa-hotel"></i><a href="#">Hoteleria</a></li>
        <li>
          <i class="fa-solid fa-square-poll-vertical"></i
          ><a href="#">Encuestas</a>
        </li>
        <li>
          <i class="fa-solid fa-door-closed"></i
          ><a href="#">Cerrar Sesión<noscript></noscript></a>
        </li>
      </div>
    </section>

    <section id="interface">
      <div class="navigation">
        <div class="n1">
          <div>
            <i id="menu-btn" class="fas fa-bars"></i>
          </div>
          <!--<div class="search">
            <i class="fa fa-search"></i>
            <input type="text" placeholder="Search" />
          </div>
        -->
        </div>
        <div class="profile">
            <p>Nombre del usuario</p>
            <img src="../img/utils/imgP.jpg" alt="" />
          </i>
        </div>
      </div>

      <h3 class="i-name">Tablero de inicio</h3>
      <div class="values">
        <div class="val-box">
          <i class="fas fa-users"></i>
          <div>
            <h3>500</h3>
            <span>Usuarios registrados</span>
          </div>
        </div>
        <div class="val-box">
          <i class="fas fa-hotel"></i>
          <div>
            <h3>30</h3>
            <span>Hoteles registrados</span>
          </div>
        </div>
        <div class="val-box">
          <i class="fas fa-square-poll-vertical"></i>
          <div>
            <h3>300</h3>
            <span>Encuestas contestadas</span>
          </div>
        </div>
      </div>
      <dir class="board">
        <table width="100%">
          <thead>
            <tr>
              <td>Datos Hoteleria</td>
              <td>Domicilio</td>
              <td>Status</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="hotel">
                <img src="../img/utils/hotel_ejem.jpg" alt="" />
                <div class="hotel-de">
                  <h5>Hotel 1</h5>
                  <p>Propietario 1</p>
                </div>
              </td>
              <td class="address"><p>Domicilio conocido</p></td>
              <td class="active"><p>Activo</p></td>
              <td class="edit"><a href="#">Editar</a></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td class="hotel">
                <img src="../img/utils/hotel_ejem.jpg" alt="" />
                <div class="hotel-de">
                  <h5>Hotel 2</h5>
                  <p>Propietario 2</p>
                </div>
              </td>
              <td class="address"><p>Domicilio conocido</p></td>
              <td class="active"><p>Activo</p></td>
              <td class="edit"><a href="#">Editar</a></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td class="hotel">
                <img src="../img/utils/hotel_ejem.jpg" alt="" />
                <div class="hotel-de">
                  <h5>Hotel 3</h5>
                  <p>Propietario 3</p>
                </div>
              </td>
              <td class="address"><p>Domicilio conocido</p></td>
              <td class="active"><p>Activo</p></td>
              <td class="edit"><a href="#">Editar</a></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td class="hotel">
                <img src="../img/utils/hotel_ejem.jpg" alt="" />
                <div class="hotel-de">
                  <h5>Hotel 4</h5>
                  <p>Propietario 4</p>
                </div>
              </td>
              <td class="address"><p>Domicilio conocido</p></td>
              <td class="active"><p>Activo</p></td>
              <td class="edit"><a href="#">Editar</a></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td class="hotel">
                <img src="../img/utils/hotel_ejem.jpg" alt="" />
                <div class="hotel-de">
                  <h5>Hotel 5</h5>
                  <p>Propietario 5</p>
                </div>
              </td>
              <td class="address"><p>Domicilio conocido</p></td>
              <td class="active"><p>Activo</p></td>
              <td class="edit"><a href="#">Editar</a></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td class="hotel">
                <img src="../img/utils/hotel_ejem.jpg" alt="" />
                <div class="hotel-de">
                  <h5>Hotel 6</h5>
                  <p>Propietario 6</p>
                </div>
              </td>
              <td class="address"><p>Domicilio conocido</p></td>
              <td class="active"><p>Activo</p></td>
              <td class="edit"><a href="#">Editar</a></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td class="hotel">
                <img src="../img/utils/hotel_ejem.jpg" alt="" />
                <div class="hotel-de">
                  <h5>Hotel 7</h5>
                  <p>Propietario 7</p>
                </div>
              </td>
              <td class="address"><p>Domicilio conocido</p></td>
              <td class="active"><p>Activo</p></td>
              <td class="edit"><a href="#">Editar</a></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td class="hotel">
                <img src="../img/utils/hotel_ejem.jpg" alt="" />
                <div class="hotel-de">
                  <h5>Hotel 8</h5>
                  <p>Propietario 8</p>
                </div>
              </td>
              <td class="address"><p>Domicilio conocido</p></td>
              <td class="active"><p>Activo</p></td>
              <td class="edit"><a href="#">Editar</a></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td class="hotel">
                <img src="../img/utils/hotel_ejem.jpg" alt="" />
                <div class="hotel-de">
                  <h5>Hotel 9</h5>
                  <p>Propietario 9</p>
                </div>
              </td>
              <td class="address"><p>Domicilio conocido</p></td>
              <td class="active"><p>Activo</p></td>
              <td class="edit"><a href="#">Editar</a></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td class="hotel">
                <img src="../img/utils/hotel_ejem.jpg" alt="" />
                <div class="hotel-de">
                  <h5>Hotel 10</h5>
                  <p>Propietario 10</p>
                </div>
              </td>
              <td class="address"><p>Domicilio conocido</p></td>
              <td class="active"><p>Activo</p></td>
              <td class="edit"><a href="#">Editar</a></td>
            </tr>
          </tbody>
        </table>
      </dir>
    </section>
    <script>
      $("#menu-btn").click(function () {
        $("#menu").toggleClass("active");
      });
    </script>
  </body>
</html>
