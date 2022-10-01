<!-- The Modal -->
<div class="modal" id="RegistrarseModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header p-5 bg-dark text-light">
        <h4 class="modal-title">Registrarse</h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body bg-light">

        <!--======================
        Contenido
        =======================-->

        <div class="d-flex justify-content-center text-center">
            <form method="post" action="<?php echo constant('url') ?>Paciente/Insertar" class="bg-light">
                
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <div class="input-group">    
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>    
                        </div>
                        <input type="text" class="form-control" placeholder="Ingrese Nombre" value="" name="registrarNombre">
                    </div>    
                </div>

                <div class="form-group">
                    <label for="dni">Dni</label>
                    <div class="input-group">    
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-address-card"></i></span>    
                        </div>
                        <input type="text" class="form-control" placeholder="Ingrese Documento" name="registrarDni">
                    </div>    
                </div>

                <div class="form-group">
                    <label for="email">Correo Electronico</label>
                    <div class="input-group">    
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>    
                        </div>
                        <input type="text" class="form-control" placeholder="Ingrese Correo Electronico" name="registrarEmail">
                    </div>    
                </div>

                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <div class="input-group">    
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>    
                        </div>
                        <input type="text" class="form-control" placeholder="Ingrese Telefono" name="registrarTelefono">
                    </div>    
                </div>

                <div class="form-group">
                    <label for="pwd">Password</label>
                    <div class="input-group">    
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>    
                        </div>
                        <input type="password" class="form-control" placeholder="Ingrese Contraseña" name="registrarPassword">
                    </div>
                </div>

                <div class="form-group">
                    <label for="Contacto">Contacto</label>
                    <div class="input-group">    
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>    
                        </div>
                        <input type="text" class="form-control" placeholder="Ingrese contacto" value="" name="registrarContacto">
                    </div>    
                </div>
                
                <div class="form-group">
                    <label for="Medico_Cabecera">Doc. de Cabecera</label>
                    <div class="input-group">    
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>    
                        </div>
                        <input type="text" class="form-control" placeholder="Ingrese Doctor" value="" name="registrarMedicoCabecera">
                    </div>    
                </div>

                <div class="form-group">
                    <label for="mutual">Mutual</label>
                    <div class="input-group">    
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>    
                        </div>
                        <input type="text" class="form-control" placeholder="Ingrese Mutual" value="" name="registrarMutual">
                    </div>    
                </div>

                <!-- Modal footer -->
                <div class="modal-footer bg-dark">
                    <button type="submit" class="btn btn-primary"><a href=" <?php echo constant("url") ?>Paciente">Ingresar</a></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>