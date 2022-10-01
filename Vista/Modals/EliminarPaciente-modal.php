<!-- The Modal -->
<div class="modal" id="EliminarPaciente">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header p-5 bg-dark text-light">
        <h4 class="modal-title">Eliminar Paciente</h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body bg-light">

        <!--======================
        Contenido
        =======================-->


        <div class="d-flex justify-content-center text-center">
            <form method="post" action="" class="bg-light">
                
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <div class="input-group">    
                        <div class="input-group-prepend disable">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>    
                        </div>
                        <input type="text" class="form-control" disabled value="<?php echo $value["Nombre"]; ?>" name="registrarNombre">
                    </div>    
                </div>

                <div class="form-group">
                    <label for="dni">Dni</label>
                    <div class="input-group">    
                        <div class="input-group-prepend disable">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>    
                        </div>
                        <input type="text" class="form-control" disabled value="<?php echo $value["Dni"]; ?>" name="registrarNombre">
                    </div>    
                </div>

                <div class="form-group">
                    <label for="correo">Correo</label>
                    <div class="input-group">    
                        <div class="input-group-prepend disable">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>    
                        </div>
                        <input type="text" class="form-control" disabled value="<?php echo $value["Correo"]; ?>" name="registrarNombre">
                    </div>    
                </div>

                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <div class="input-group">    
                        <div class="input-group-prepend disable">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>    
                        </div>
                        <input type="text" class="form-control" disabled value="<?php echo $value["Telefono"]; ?>" name="registrarNombre">
                    </div>    
                </div>

                <div class="form-group">
                    <label for="contacto">Contacto</label>
                    <div class="input-group">    
                        <div class="input-group-prepend disable">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>    
                        </div>
                        <input type="text" class="form-control" disabled value="<?php echo $value["Contacto"]; ?>" name="registrarNombre">
                    </div>    
                </div>

                <div class="form-group">
                    <label for="medico_Cabecera">Medico Cabecera</label>
                    <div class="input-group">    
                        <div class="input-group-prepend disable">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>    
                        </div>
                        <input type="text" class="form-control" disabled value="<?php echo $value["Medico_Cabecera"]; ?>" name="registrarNombre">
                    </div>    
                </div>

                <div class="form-group">
                    <label for="mutual">Mutual</label>
                    <div class="input-group">    
                        <div class="input-group-prepend disable">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>    
                        </div>
                        <input type="text" class="form-control" disabled value="<?php echo $value["Mutual"]; ?>" name="registrarNombre">
                    </div>    
                </div>

            </form>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer bg-dark">
        <button type="submit" class="btn btn-primary">Iniciar Seccion</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>