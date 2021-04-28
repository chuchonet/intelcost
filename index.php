<?php

/* Se carga la informacion del archivo json  */
$content = file_get_contents("data-1.json");
$bienes = json_decode($content, true);


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/customColors.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/index.css"  media="screen,projection"/>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Formulario</title>
</head>

<body>
  <video src="img/video.mp4" id="vidFondo"></video>

  <div class="contenedor">
    <div class="card rowTitulo">
      <h1>Bienes Intelcost</h1>
    </div>
    <div class="colFiltros">
      <form action="#" method="post" id="formulario">
        <div class="filtrosContenido">
          <div class="tituloFiltros">
            <h5>Filtros</h5>
          </div>
          <div class="filtroCiudad input-field">
            <p><label for="selectCiudad">Ciudad:</label><br></p>
            <select name="ciudad" id="selectCiudad">
              <option value="" selected>Elige una ciudad</option>
              <?php 
              
              /* Se carga la informacion en  los select del buscador (Ciudades y tipo de bien)*/
              foreach ($bienes as $bien) {

                /* Se crea un array con el nombre de las ciudades de cada bien */
                $ciudades[] = $bien['Ciudad'];

              }
              /* Se eliminan del array las ciudades repetidas y se carga el select*/
              $ciudades = array_unique($ciudades);

              foreach ($ciudades as $ciudad) {
                echo "<option>".$ciudad."</option>";
              }

              


              ?>

            </select>
          </div>
          <div class="filtroTipo input-field">
            <p><label for="selecTipo">Tipo:</label></p>
            <br>
            <select name="tipo" id="selectTipo">
              <option value="">Elige un tipo</option>

              <?php
              foreach ($bienes as $bien) {
                $tipo_bien [] = $bien['Tipo'];

              }
              $tipo_bien = array_unique($tipo_bien);

              foreach ($tipo_bien as $bien) {
                echo "<option>".$bien."</option>";
              }
              ?>
            </select>
          </div>
          <div class="filtroPrecio">
            <label for="rangoPrecio">Precio:</label>
            <input type="text" id="rangoPrecio" name="precio" value="" />
          </div>
          <div class="botonField">
            <input type="button" class="btn white" value="Buscar" id="submitButton" onclick="buscar();">
          </div>
        </div>
      </form>
    </div>
    <div id="tabs" style="width: 75%;">
      <ul>
        <li><a href="#tabs-1">Bienes disponibles</a></li>
        <li><a href="#tabs-2">Mis bienes</a></li>
        <li><a href="#tabs-3">Reportes</a></li>
      </ul>
      <div id="tabs-1">
        <div class="colContenido" id="divResultadosBusqueda">
          <div class="tituloContenido card" style="justify-content: center;">
            <h5>Resultados de la búsqueda:</h5>
            <div id="numResultados"></div>
            <div class="itemMostrado">
            <!-- <img src="img/home.jpg"  alt="imagen casa">  -->
            <!-- <div class="row">
              <div class="col left"> -->
                <?php 
                    foreach($bienes as $bien){
                      $lista_bienes [] = $bien;
                      // "<div class=row>
                      // <div class=col left>
                      echo "
                            <div class=card-image>
                              <img src=img/home.jpg >
                            </div>
                            <div class=card-stacked>

                            
                            <br /><b>Direccion: </b>".$bien['Direccion'].
                            "
                            <br /><b>Ciudad: </b>".$bien['Ciudad']."
                            <br /><b>Telefono:  </b>".$bien['Telefono']."
                            <br /><b>Codigo Postal: </b>".$bien['Codigo_Postal'].
                            "<br /><b>Tipo: </b>".$bien['Tipo']."<br>
                            <span class=precioTexto><b>Precio: </b>".$bien['Precio']."
                            <div class=card-action>
                              <button>Guardar</button>
                            </div>
                            <div class=divider></div>
                            </div>

         
                            ";
                    }
                ?>
            </div>

            </div>
            <div class="divider">
            </div>
          </div>
        </div>
      </div>
      
      <div id="tabs-2" >
        <div class="colContenido" id="divResultadosBusqueda">
          <div class="tituloContenido card" style="justify-content: center;">
            <h5>Bienes guardados:</h5>
            <div class="itemMostrado">
              
            <?php   

                    
                    foreach($bienes as $bien){
                      $lista_bienes [] = $bien;
                      // echo 
                      // "<div class=row>
                      // <div class=col left>
                      echo "
                            <div class=card-image>
                              <img src=img/home.jpg >
                            </div>
                            <div class=card-stacked>

                            
                            <br /><b>Direccion: </b>".$bien['Direccion'].
                            "
                            <br /><b>Ciudad: </b>".$bien['Ciudad']."
                            <br /><b>Telefono:  </b>".$bien['Telefono']."
                            <br /><b>Codigo Postal: </b>".$bien['Codigo_Postal'].
                            "<br /><b>Tipo: </b>".$bien['Tipo']."<br>
                            <span class=precioTexto><b>Precio: </b>".$bien['Precio']."
                            <div class=card-action>
                              <button>Guardar</button>
                            </div>
                            <div class=divider></div>
                            </div>

         
                            ";
                    }
                ?>


            <div class="divider"></div>
          </div>
        </div>

        <div id="tabs-3" >
          <style>
              /* .itemMostrado{
                display: none;
              } */
          </style>
        <div class="colContenido" id="divReporte">
          <div class="tituloContenido card" style="justify-content: center;">
            <h5 >Exportar reporte:</h5>
            <div class="colFiltros">
      <form action="#" method="post" id="formulario">
        <div class="filtrosContenido">
          <div class="tituloFiltros">
            <h5>Filtros</h5>
          </div>
          <div class="filtroCiudad input-field">
            <p><label for="selectCiudad">Ciudad:</label><br></p>
            <select name="ciudad" id="selectCiudad">
              <option value="" selected>Elige una ciudad</option>
              <?php 
              
              /* Se carga la informacion en  los select del buscador (Ciudades y tipo de bien)*/
              foreach ($bienes as $bien) {

                /* Se crea un array con el nombre de las ciudades de cada bien */
                $ciudades[] = $bien['Ciudad'];

              }
              /* Se eliminan del array las ciudades repetidas y se carga el select*/
              $ciudades = array_unique($ciudades);

              foreach ($ciudades as $ciudad) {
                echo "<option>".$ciudad."</option>";
              }
              ?>

            </select>
          </div>
          <div class="filtroTipo input-field">
            <p><label for="selecTipo">Tipo:</label></p>
            <br>
            <select name="tipo" id="selectTipo">
              <option value="">Elige un tipo</option>

              <?php
              foreach ($bienes as $bien) {
                $tipo_bien [] = $bien['Tipo'];

              }
              $tipo_bien = array_unique($tipo_bien);
              foreach ($tipo_bien as $bien) {
                echo "<option>".$bien."</option>";
              }
              ?>
            </select>
          </div>
          <div class="botonField">
            <input type="button" class="btn white" value="Buscar" id="submitButton" onclick="buscar();">
          </div>
        </div>
      </form>
    </div>
          </div>
        </div>
      </div>


      </div>
      
    </div>
    



    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    
    <script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script type="text/javascript" src="js/buscador.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
      $( document ).ready(function() {
          $( "#tabs" ).tabs();
      });
    </script>
  </body>
  </html>
