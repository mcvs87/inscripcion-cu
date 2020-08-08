

  <!-- Content section -->
  <section class="py-6">
    <div class="container col-12">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAlumno">
        Agregar
        </button>
        <table id="example" class="table table-hover" style="width:100%">        
            <thead class="thead-dark">
                <tr>
                    <th>Numero de cuenta</th>
                    <th>Nombre</th>
                    <th>Paterno</th>
                    <th>Materno</th>
                    <th>Correo</th>
                    <th>Fecha</th>
                    <th>Accion</th>
                </tr>
            </thead>
            
            <tbody>
                <?php foreach($alumnos as $alumno): ?>
                <tr>
                    <td><?= $alumno['id'] ?> </td>
                    <td><?= $alumno['nombre'] ?></td>
                    <td><?= $alumno['apPaterno'] ?></td>
                    <td><?= $alumno['apMaterno'] ?></td>
                    <td><?= $alumno['email'] ?></td>
                    <td><?= $alumno['create_at'] ?></td>
                    <td>
                        <a class="btn btn-info" href="<?= base_url('alumnos/editar/'.$alumno['id'].'');?>"></i> Editar
                        </a>
                        <a class="btn btn-danger" href="<?= base_url('alumnos/eliminarAlumno/'.$alumno['id'].'');?>">
                        </span>Eliminar
                        </a>
                        <a class="btn btn-warning" data-toggle="modal" data-target="#modalGrafica">
                        Grafica
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                
            </tbody>
        </table>
    </div>    

  <!-- The Modal -->
    <div class="modal fade" id="modalAlumno">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">      
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="mb-3">Formulario Alumno</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>        
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="col-md-12 order-md-1" id="alumnoRegistro">               
                        <form id="formAlumno" class="needs-validation" method="post" novalidate>
                          <div class="row">
                            <div class="col-md-4 mb-3">
                              <label for="nombre">Nombre</label>
                              <input type="text" name="nombre" class="form-control" id="nombre" placeholder="" value="" minlength="3" required pattern="[A-Za-z]+" >
                              <div class="invalid-feedback">
                                Campo obligatorio.
                                Mínimo 3 digitos
                              </div>
                            </div>
                            <div class="col-md-4 mb-3">
                              <label for="apPaterno">Apellido Paterno</label>
                              <input type="text" name="apPaterno" class="form-control" id="apPaterno" placeholder="" value="" required="" minlength="3" pattern="[A-Za-z]+">
                              <div class="invalid-feedback">
                                Campo obligatorio.
                                Mínimo 3 digitos
                              </div>
                            </div>
                            <div class="col-md-4 mb-3">
                              <label for="apMaterno">Apellido Materno</label>
                              <input type="text" name="apMaterno" class="form-control" id="apMaterno" placeholder="" value="" required="" minlength="3" pattern="[A-Za-z]+">
                              <div class="invalid-feedback">
                                Campo obligatorio.
                                Mínimo 3 digitos
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6 mb-3">
                              <label for="numCuenta">Número de Cuenta</label>
                              <input type="number" name="numCuenta" class="form-control" id="numCuenta" placeholder="" value="" required="" min="000000001" max="999999999">
                              <div class="invalid-feedback">
                                Campo obligatorio.
                                Mínimo 3 digitos
                              </div>
                            </div>
                           
                            <div class="col-md-6 mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Ej. tuemail@unam.mx" required="" >
                                <div class="invalid-feedback">
                                  Campo obligatorio
                                  Email inválido
                                </div>
                                
                            </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="password">Contraseña</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="" value="" required="" minlength="9">
                                    <div class="invalid-feedback">
                                        Campo obligatorio.
                                        Mínimo 9 digitos
                                    </div>
                                </div>
                            </div>

                          <hr class="mb-4">
                          <button class="btn btn-primary btn-lg btn-block" type="submit">Enviar</button>
                        </form>
                    </div>
                  <div class="col-md-11 order-md-1" id="exito" style="display: none;">
                    <h4 class="mb-3">Tus datos se han guardado con exito</h4>
                  </div>
            </div>
        </div>
    </div>
</div>

    <div class="modal fade" id="modalGrafica">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">      
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="mb-3">Grafica</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>        
                <!-- Modal body -->
                <div class="modal-body">                        
                    <div class="texto col-md-12 col-xs-12">
                      <br>
                      <figure class="highcharts-figure">
                          <div id="experiencia"></div>
                          <p class="highcharts-description">
                          </p>
                      </figure>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</section>

  