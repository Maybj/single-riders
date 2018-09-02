<?php

require_once('funciones.php');
$textmensaje = '';
$datein = '';
$dateout = '';
$pais='';
$ciudad='';
$importe='';
$moneda='';
$errores = [];

if ($_POST) {
  $textmensaje = trim($_POST['textmensaje']);
  $datein = trim($_POST['datein']);
  $dateout = trim($_POST['dateout']);
  $pais = trim($_POST['pais']);
  $ciudad = trim($_POST['ciudad']);
  $importe = trim($_POST['importe']);
  $moneda = trim($_POST['moneda']);
  $errores = validar($_POST,'guardarViaje',$_FILES);
  if (empty($errores)) {

      guardarViaje($_POST,$_FILES);

  }
}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=Abel|Montserrat:400,400i,700,700i|Pacifico" rel="stylesheet">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
      <link rel="stylesheet" href="css/crea.css">
    <title></title>
    </head>
    <body>
      <?php require_once('header.php') ?>
      <section class="container-fluid">
        <section class="titulos">
          <div class="row">
            <div class="col-12">
          <img src="images/crea/torre.png">
              <h1> CREA TU VIAJE<h1>
              <h2> y compartilo en linea con otros viajeros</h2>
              <h3 id="mensajes"></h3>
          </div>
        </div>
        </section>
      <section class="formulario">
        <div class="container-fluid">
          <div class="row">
          <div class=" col-12 col-sm-8 border p-5">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="infoGeneral-tab" data-toggle="tab" href="#infoGeneral" role="tab" aria-controls="infoGeneral" aria-selected="true">Info General</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="destino-tab" data-toggle="tab" href="#destino" role="tab" >Destino</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="itinerario-tab" data-toggle="tab" href="#itinerario" role="tab" >Itinerario</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="presupuesto-tab" data-toggle="tab" href="#presupuesto" role="tab" >Presupuesto</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane active" id="infoGeneral">
                  <form method="post">
                    <textarea id="textmensaje" onkeyup="$('#mensajes').text($('#textmensaje').val());" class="form-control" name="mensaje" placeholder="Ponele un Titulo a tu viaje..."></textarea>

                      Check in: <input type="date" name="checkin">
                      Check out: <input type="date" name="checkout">

                    <div class="form-group">
                      <label for="form-group"> ¿Tus Fechas son flexibles?</label>
                      <br></br>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="infoGeneral" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Si, seguro!</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="infoGeneral" value="option2">
                        <label class="form-check-label" for="inlineRadio2">Lo podemos Charlar!</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="infoGeneral" value="option3">
                        <label class="form-check-label" for="inlineRadio3">No puedo mover las fechas</label>
                      </div>
                    </div>
              </div>
              <div class="tab-pane" id="destino">
                <label for="país">Elegí tu destino</label>
                <select class="form-control" name="país">
                <option value="">Selecciona el país a visitar</option>
              </select>
              <label for="actividades">¿Que tipo de viaje queres hacer?</label>
              <select class="custom-select" size="3">
                <option value="1">Aventura</option>
                <option value="2">Impacto Social</option>
                <option value="3">Relax y playa</option>
                <option value="2">Proyectos Ecológcos</option>
                <option value="3">Relax y playa</option>
              </select>
              </div>
              <div class="tab-pane" id="itinerario">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Dia 1</label>
                  </div>
                  <select class="custom-select" name="ciudad">
                    <option selected>Eleji la ciudad...</option>
                    <option value="1">Buenos Aires</option>
                    <option value="2">Cordoba</option>
                    <option value="3">Entre Rios</option>
                  </select>
                </div>
                <div class="descripcion">
                <textarea id="descripcion" class="form-control" name="mensaje-iti" placeholder="Que vas a hacer en esta ciudad?..."></textarea>
              </div>
            </div>
              <div class="tab-pane" id="presupuesto">
                <div class="row">
                  <div class="col-6">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Importe</span>
                      </div>
                <input type="text" class="form-control" name="importe" aria-label="Amount (to the nearest dollar)">
                  <div class="input-group-append">
                    <span class="input-group-text">.00</span>
                  </div>
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Moneda</span>
                      </div>
                      <input type="text" class="form-control" name="moneda" aria-label="Amount (to the nearest dollar)">
                    </div>
                  </div>
                </div>
                <input type="submit" class="btn btn-primary" value="Guarda Tu Viaje">
              </form>
            </div>
        </div>
        </div>
      </div>
      </section>
        <div class="col-12 col-sm-4 border p-5">
        <div class="container">
          <div class="row">
            <div class="btn-group-vertical col-12">
              <div class="btn-group-vertical">
                <a class="btn btn-secondary" href="https://www.tripadvisor.es/TravelersChoice-Destinations-cTop-g13" target="_blank">Top 25 Caribe</a>
                <a class="btn btn-secondary" href="https://www.tripadvisor.es/TravelersChoice-Destinations-cTop-g4" target="_blank">Top 25 Europa</a>
                <a class="btn btn-secondary" href="https://www.tripadvisor.com.ar/TravelersChoice-Destinations-cTop-g191" target="_blank">Top 25 Estados Unidos</a>
                <a class="btn btn-secondary" href="https://www.tripadvisor.com.ar/TravelersChoice-Destinations-cTop-g2"  target="_blank">Top 25 Sudeste Asíatico</a>
                <a class="btn btn-secondary" href="https://www.tripadvisor.es/TravelersChoice-Beaches-cTop-g147237" target="_blank">Top 25 Caribe</a>
              </div>
                </div>
            </div>
          </div>
        </div>
    </section>
    </body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</html>
