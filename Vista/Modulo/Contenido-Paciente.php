        <!--======================
        Contenido
        =======================-->
        <div class="d-flex justify-content-center text-center">
    <div class="p-5 bg-light">
        <h1>Pagina de Paciente</h1>
                 
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#RegistrarseModal">Crear paciente</button>

        <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Dni</th>
                        <th>Correo Electronico</th>
                        <th>Telefono</th>
                        <th>Contacto</th>
                        <th>Medico_Cabecera</th>
                        <th>Mutual</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($this->dato as $key => $value): ?>
                    <tr>
                        <td><?php echo $value["Nombre"] ?></td>
                        <td><?php echo $value["Dni"] ?></td>
                        <td><?php echo $value["Correo"] ?></td>
                        <td><?php echo $value["Telefono"] ?></td>
                        <td><?php echo $value["Contacto"] ?></td>
                        <td><?php echo $value["Medico_Cabecera"] ?></td>
                        <td><?php echo $value["Mutual"] ?></td>
                        <td>
                            <div class="btn-group">
                                <div class="px-1">
                                <form action="" method="post" >
                                    <input type="hidden" value="<?php echo $value["IdPaciente"] ?>" name="editarId">
                                    <a data-toggle="modal" data-target="#EditarPaciente" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                </form>
                                </div>
                                <form action="" method="post">
                                    <input type="hidden" value="<?php echo $value["IdPaciente"] ?>" name="eliminarRegistro">
                                    <a data-toggle="modal" data-target="#EliminarPaciente" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </form>
                            </div>
                        </td>

                    <?php endforeach ?>
                </tr>
                </tbody>
            </table>
    </div>
</div>