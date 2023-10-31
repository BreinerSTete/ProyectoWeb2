<!doctype html>
<html lang="es">
  <head>
    <title>RentEasy - Locales y Apartamentos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="RentEasy es una página web que da la posibilidad de publicar propiedades en renta para que otras personas las renten.">
    <link rel="stylesheet" href="../CSS/rentals.css">
    <link rel="shortcut icon" href="../Assets/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <!-- Navigator -->
    <header>
      <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container">
            <a href="#  " class="navbar-brand">
                <h3><img src="Assets/logo.png" alt="Logo" style="max-height: 2em;">RentEasy</h3>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsedNavbar" aria-controls="collapsedNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsedNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <h5><i class="ri-account-pin-circle-fill" style="color: #559e52;"></i> Mi Perfil</h5>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">
                            <h5><i class="ri-logout-box-line" style="color: #559e52;"></i> Cerrar Sesión</h5>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
  </header>
  <br>
  <h3>Hola, Nombre!</h3>
  <br>
  <div class="form-group" id="mainSearch">
    <input type="text" class="form-control" id="" placeholder="Ingrese su búsqueda aquí">
  </div>
  <div class="container">
    <div class="row">
        <div class="col-md-3">
          <div class="filters">
            <h4>Filtrar por</h4><br>
            <h5>Ubicación</h5>
            <div class="form-inline">
              <select id="selectDepartamento" class="form-control form-control-sm mr-2">
                  <option>Departamento</option>
              </select><br><br>
              <select id="selectCiudad" class="form-control form-control-sm">
                  <option>Ciudad</option>
              </select>
          </div>
          <br>
            <h5>Precio</h5>
            <input type="radio" name="0" id=""> Ascendente <br> <input type="radio" name="0" id=""> Descendente
            <br><br>
            <h5>Tipo</h5>
            <input type="radio" name="1" id=""> Residencial <br> <input type="radio" name="1" id=""> Comercial
            <br><br>
            <h5>Valoración</h5>
            <input type="range" class="form-range" min="1" max="5" id="customRange2"><br>
            <div class="stars" style="font-size: 22px; color: rgb(255, 230, 0); text-shadow: 0px 0px 2px black;">
              <i class="ri-star-fill"> </i><i class="ri-star-fill"> </i><i class="ri-star-fill"> </i><i class="ri-star-fill"> </i><i class="ri-star-fill"></i>
            </div>
          </div>

        </div>
        <div class="col-md-9">
            <div class="row">
              <div class="card-group">
                <div class="card">
                  <img src="https://www.arquitecturaydiseno.es/medio/2020/10/19/casa-prefabricada-de-hormipresa-en-el-boecillo-valladolid-realizada-con-el-sistema-arctic-wall-de-paneles-estructurales-con-el-acabado-incorporado_6f2a28cd_1280x794.jpg" class="card-img-top" alt="Casa 1">
                  <div class="card-body">
                      <h5 class="card-title">Casa en Sincelejo</h5>
                      <p class="card-text"><b>Precio:</b> <em>$ 3.000.000</em></p>
                      <p class="card-text"><b>Descripción:</b> Se arrienda hermosa casa en el barrio las margaritas.</p>
                      <button type="button" class="btn btn-success">Ver más</button>
                  </div>
              </div>
              <div class="card">
                <img src="https://www.bbva.com/wp-content/uploads/2021/04/casas-ecolo%CC%81gicas_apertura-hogar-sostenibilidad-certificado-.jpg" class="card-img-top" alt="Casa 1">
                <div class="card-body">
                    <h5 class="card-title">Casa en Corozal</h5>
                    <p class="card-text"><b>Precio:</b> <em>$ 3.000.000</em></p>
                    <p class="card-text"><b>Descripción:</b> Se arrienda hermosa casa en el barrio las margaritas.</p>
                    <button type="button" class="btn btn-success">Ver más</button>
                </div>
            </div>
            <div class="card">
              <img src="https://fincaraiz.com.co/blog/wp-content/uploads/2022/08/casas-modernas-1-1920x1130.jpg" class="card-img-top" alt="Casa 1">
              <div class="card-body">
                  <h5 class="card-title">Casa en Sincé</h5>
                  <p class="card-text"><b>Precio:</b> <em>$ 3.000.000</em></p>
                  <p class="card-text"><b>Descripción:</b> Se arrienda hermosa casa en el barrio las margaritas.</p>
                  <button type="button" class="btn btn-success">Ver más</button>
              </div>
          </div>
              </div>

              <br>

              <div class="card-group">
                <div class="card">
                  <img src="https://gpvivienda.com/blog/wp-content/uploads/2023/03/ralph-ravi-kayden-mR1CIDduGLc-unsplash-1-1-1024x680.jpg" class="card-img-top" alt="Casa 1">
                  <div class="card-body">
                      <h5 class="card-title">Casa en Santa Marta</h5>
                      <p class="card-text"><b>Precio:</b> <em>$ 5.000.000</em></p>
                      <p class="card-text"><b>Descripción:</b> Se arrienda hermosa casa en el barrio las margaritas.</p>
                      <button type="button" class="btn btn-success">Ver más</button>
                  </div>
              </div>
              <div class="card">
                <img src="https://images.adsttc.com/media/images/5d1c/eb8e/284d/d16c/4100/0031/newsletter/_FJR5838.jpg?1562176282" class="card-img-top" alt="Casa 1">
                <div class="card-body">
                    <h5 class="card-title">Casa en Magangué</h5>
                    <p class="card-text"><b>Precio:</b> <em>$ 2.350.000</em></p>
                    <p class="card-text"><b>Descripción:</b> Se arrienda hermosa casa en el barrio las margaritas.</p>
                    <button type="button" class="btn btn-success">Ver más</button>
                </div>
            </div>
            <div class="card">
              <img src="https://images.ecestaticos.com/cDQNZAW5IEnn-i8IowHIYH2Z4_E=/0x0:1000x750/1200x900/filters:fill(white):format(jpg)/f.elconfidencial.com%2Foriginal%2F089%2Ff17%2F8cf%2F089f178cff88676f76679f75f3599b43.jpg" class="card-img-top" alt="Casa 1">
              <div class="card-body">
                  <h5 class="card-title">Casa en Betulia</h5>
                  <p class="card-text"><b>Precio:</b> <em>$ 1.200.000</em></p>
                  <p class="card-text"><b>Descripción:</b> Se arrienda hermosa casa en el barrio las margaritas.</p>
                  <button type="button" class="btn btn-success">Ver más</button>
              </div>
          </div>
              </div>
            </div>

    </div>
        </div>
          <!-- Footer -->
          <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col">
                    <h3>Acerca de nosotros</h3>
                        <p style="text-align: left;">RentaEasy: tu plataforma confiable para encontrar y anunciar inmuebles en alquiler. Nuestra misión es simplificar tu búsqueda de propiedades y agilizar el proceso de arrendamiento.</p>
                </div>
                    <div class="col">
                        <section class="contact">
                        <h3>Contáctanos</h3>
                        <a href="#"><button><i class="ri-facebook-circle-fill"></i></button></a>
                        <a href="#"><button><i class="ri-instagram-fill"></i></button></a>
                        <a href="#"><button><i class="ri-mail-fill"></i></button></a>
                        </section>
                </div>
            </div>
        </div>
        </footer>
    <!-- Optional JavaScript -->
    <script src="rentals.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
