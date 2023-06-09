  <!-- Equipo -->
  <section class="container-fluid py-5 equipo" id="Equipo">

  
    <div class="container d-flex align-items-center flex-column pt-5" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="0" data-aos-easing="ease-in-out">
      <!-- <p class="etiqueta"><i class="linea"></i>Conoce nuestros paquetes<i class="linea"></i></p> -->
      <h2 class="titulo">Te ofrecemos los siguientes paquetes</h2>

      <div class="container py-5 max-size" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0"
          data-aos-easing="ease-in-out">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
          <?php
              try {
                $sql_equipo = "SELECT * FROM lista_servicios_equipo WHERE id_lista_servicio = '$idServicio' AND band_eliminar = 1";
                $res_equipo = $conexion->query($sql_equipo);
                while($equipo = $res_equipo->fetch_assoc()){ ?>
                  <div class="col d-flex justify-content-around flex-column">
                    <div class="servicios-card w-100">
                      <img src="admin/img/seccion_servicios/equipo/<?php echo $equipo['url_imagen'];?>?v=<?php echo $v;?>" alt="" loading="lazy">
                    </div>
                  </div>
          <?php }
              } catch (Exception $e) {
                echo "Error: ".$e->getMessage();
              }
            ?>    
          </div>
        </div>

      <a class="btn btn-special my-4" data-toggle="collapse" href="#paquetes" role="button" aria-expanded="false" aria-controls="paquetes">Ver más</a>
    </div>

    <div class="container max-size">
      <div class="d-flex justify-content-between align-items-center flex-wrap">
        <!-- <h2 class="titulo2">Te ofrecemos los siguientes paquetes</h2 class="titulo"> -->
        <!-- <a class="btn btn-special my-4" data-toggle="collapse" href="#paquetes" role="button" aria-expanded="false" aria-controls="paquetes">Ver más</a> -->
      </div>

      <!-- Conoce nuestros paquetes -->
      <div class="collapse py-2" id="paquetes">
          <?php
              try {
                $sql_equipo = "SELECT * FROM lista_servicios_tabla_paquetes WHERE id_lista_servicio = '$idServicio' AND band_eliminar = 1";
                $res_equipo = $conexion->query($sql_equipo);
                while($equipo = $res_equipo->fetch_assoc()){ ?>

                  <div class="card card-body ">
                    <img src="admin/img/seccion_servicios/tabla_paquetes/<?php echo $equipo['url_imagen'];?>?v=<?php echo $v;?>" alt="" loading="lazy">
                  </div>

          <?php }
              } catch (Exception $e) {
                echo "Error: ".$e->getMessage();
              }
            ?>  
      </div>
    </div>
  </section>