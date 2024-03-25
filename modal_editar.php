<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . '/practicas/conexion.php' );
$idemp =  1;
$datos = $dbh->prepare("select * from clientes where id='$idemp'");
$datos->execute();
$row = $datos->fetch();
$datos=null;

$nombre= $row['nombre'];
$apellidos = $row['apellidos'];
$correo = $row['correo'];
$telefono = $row['telefono'];
$observaciones= $row['observaciones'];
$entidad = $row['entidad'];
$tipo = $row['tipo'];
?>

<div class="modal fade" id="editmodoenv_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="modalagregaequipopto"><strong>Editar metodo de envío al presupuesto: </strong> <?php echo $numppto;?></h4>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>

        <form role="form" name="recformulario"  action="grabar_formulario.php" method="POST">
                                    <div class="row">
										<div class="col-12 col-xl-6">
											<div class="mb-3">
												<input name="nombre" type="text" class="form-control" value="<?php echo $nombre;?>" placeholder="Nombre..." />
											</div>
											<div class="mb-3">
												<input name="apellidos" type="text" class="form-control" value="<?php echo $apellidos;?>" placeholder="Apellidos..." />
											</div>
											<div class="mb-3">
												<input name="correo" type="text" class="form-control" value="<?php echo $correo;?>" placeholder="Correo..." />
											</div>
											<div class="mb-3">
												<input name="telefono" type="text" class="form-control" value="<?php echo $telefono;?>" placeholder="Telefono" />
											</div>
										</div>
										<div class="col-12 col-xl-6">
											<div class="mb-3">
												<textarea name="observaciones" rows="3" cools="3" class="form-control" value="<?php echo $observaciones;?>" placeholder="Observaciones"></textarea>
											</div>
											<div class="mb-3">
												
												<select name="entidad" class="form-control mb-3">
													<option selected><?php echo $entidad;?></option>
													<option value="empresa">Empresa</option>
													<option value="particular">Particular</option>
												</select>
											</div>
											<div class="mb-3">
												<label class="form-check">
												<?php
												if($tipo == 1){
												?>
													<input class="form-check-input" type="radio" value="1" name="radios-example" checked>
													<span class="form-check-label">
														Nacional
													</span>
													<?php
												}else{
													?>
													<input class="form-check-input" type="radio" value="1" name="radios-example">
													<span class="form-check-label">
														Nacional
													</span>
													<?php
												}
												?>
												</label>
												<label class="form-check">
												<?php
												if($tipo == 0){
												?>
													<input class="form-check-input" type="radio" value="0" name="radios-example" checked>
													<span class="form-check-label">
														Internacional
													</span>
													<?php
												}else{
													?>
													<input class="form-check-input" type="radio" value="0" name="radios-example">
													<span class="form-check-label">
														Internacional
													</span>
													<?php
												}
												?>
												</label>
											</div>
										</div>
									</div>
									<div class="row mb-4">
									<div class="col-md-12">
										 <div class="d-flex mt-0">
										<div class="ml-auto ">
										<button type="submit" name="grabacioncliente" class="btn btn-primary btn-lg justify-content-center" value="Send" >Grabar</button>
										
									</div>
										</div>
										</div>
									</div>
						</form>        
    </div>
  </div>
</div>