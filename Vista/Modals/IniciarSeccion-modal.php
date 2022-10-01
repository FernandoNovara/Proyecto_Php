<!-- The Modal -->
<div class="modal" id="IniciarSeccionModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header p-5 bg-dark text-light">
        <h4 class="modal-title">Iniciar Seccion</h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body bg-light">

        <!--======================
        Contenido
        =======================-->

        <div class="d-flex justify-content-center text-center">
            <form method="post" action="" class="bg-light ">

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
                    <label for="pwd">Password</label>
                    <div class="input-group">    
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>    
                        </div>
                        <input type="password" class="form-control" placeholder="Ingrese Contraseña" name="registrarPassword">
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