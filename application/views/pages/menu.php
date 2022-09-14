
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<?php echo validation_errors(); ?>
		</div>
		<div class="col-md-6">
			<?php 
				echo form_open("register/menu",[
					"class" => "form-group mt-5 p-4 shadow",
					"id" => "myFormMenu" ,
				]) ;
			 ?>
				<label>Nom du menu:</label>
				<input type="text" class="mb-2 form-control" name="nomMenu">
				<label>Prix:</label>
				<input class="form-control mb-2" type="number" name="prixMenu" min="1000" value="1000">
				<input type="submit" class="btn btn-outline-primary btn-block" name="btn-menu" value="Enregistrer">
			</form>
		</div>
		<div class="col-md-3"></div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<a class="btn btn-danger" href="<?php echo base_url('fafanadaholo') ?>">Supprimer Tout</a>
			<table class="table mt-2 table-striped table-bordered">
				<thead>
					<tr>
						<th>Nom du produit</th>
						<th>Prix du produit</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php for($i = 0; $i < count($tableau); $i++): ?>
						<tr>
							<td><?php echo $tableau[$i]->nomMenu ; ?></td>
							<td><?php echo $tableau[$i]->prixMenu ; ?></td>
							<td> <?php echo form_open("menu/supprimer") ;?>
							<input type="text" class="d-none" value="<?php echo $tableau[$i]->idMenu ;?>" name="idvaleur">
							<input type="submit" value="Supprimer" class="btn btn-outline-danger">
							<a href="#" data-id="<?php echo $tableau[$i]->idMenu ; ?>" data-nom="<?php echo $tableau[$i]->nomMenu ; ?>" data-prix="<?php echo $tableau[$i]->prixMenu ; ?>" class="btn btn-outline-secondary modifier" data-toggle="modal" data-target="#myModal">Modifier</a>
							<!-- <input type="submit" class="btn btn-outline-secondary modifier" value="Modifier"> -->
							</form>
							
							</td>
						</tr>
					<?php endfor ; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <!-- <h4 class="modal-title">Modal Header</h4> -->
      </div>
      <div class="modal-body">
	  <?php echo form_open("menu/modifier",[
					"class" => "form-group",
					"id" => "idMenuModal" ,
				]) ;?>
				<input type="text" name="idProduit" class="d-none" id="idProduit">
				<input type="text" name="nomProduit"  class="form-control mt-4 mb-4"id="nomProduit">
				<input type="text" name="prixProduit" class="form-control " id="prixProduit">
				<br>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
		<input type="submit" name="modifier" value="Modifier" class="btn btn-primary mb-2">
			</form>
      </div>
    </div>

  </div>
</div>