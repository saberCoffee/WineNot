<?php $this->layout('layout_dashboard', ['title' => 'Tous nos membres']) ?>
<?php $this->start('main_content') ?>



<div class="container">
                     
	<!-- Dev Note: Ajouter à mettre dans une variable et modifier si isset id en modifier et également la valeur du bouton du submit -->
	<h2 class="members">Ajouter un utilisateur</h2>
	<form action="<?= $this->url('members3') ?>" method="post" class="members">
		<input type="hidden" name="id" value="<?= $members['id']; ?>" />
		
			<div class="row">
				<div class="col-md-6">
					<label for="">Prénom*</label>
					<input type="text" value="" name="firstname" placeholder="prénom" class="form-control" required />
				</div>
				<div class="col-md-6">
					<label for="">Nom*</label>
					<input type="text" value="" name="lastname" placeholder="nom"  class="form-control" required />
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<label for="">Email*</label>
					<input type="email" value="" name="email" placeholder="email"  class="form-control  <?php if (isset($error['login_email'])) { echo 'has-error'; } ?>" required />
					 <span class="help-block" <?php if (empty($error['email'])) { echo 'style="display: none"'; } ?>>
                        <?php if (isset($error['email'])) { echo $error['email']; } ?>
                    </span>
				</div>
				<div class="col-md-4">
					<label for="">Mot de passe*</label>
					<input type="password" value="" name="password" placeholder="password"  class="form-control" required/>
				</div>
				<div class="col-md-4 <?php if (isset($error['register_password'])) { echo 'has-error'; } ?>">
                    <label for="password_verif">Vérification du mot de passe*</label>
                    <input type="password" name="password_verif"  id="password_verif" class="form-control" required="required" data-min="6" data-max="16" maxlength="16" />
                </div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<label for="">Adresse</label>
					<input type="text" value="" name="address" placeholder="adresse" class="form-control" />
				</div>
				<div class="col-md-4">
					<label for="">Ville</label>
					<input type="text" value="" name="city" placeholder="ville" class="form-control" />
				</div>
				<div class="col-md-4">
				<label for="">Code Postale</label>
				<input type="number" value="" name="postcode" placeholder="code postale" class="form-control" />
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<label for="">Role</label>
					<input type="number" value="" name="role" placeholder="admin ou membre"  class="form-control"/>
				</div>
				<div class="col-md-6">
					<label for="">Type</label>
					<input type="number" value="" name="type" placeholder="producteur ou membre" class="form-control" />
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<input type="submit" value="ajouter"  class="btn btn-default"/>
				</div>
			</div>
				<?php 
				if (isset($_SESSION['msg'])) {
					echo '<div class="alert alert-success" role="alert">'.$_SESSION['msg'].'</div>';
					unset($_SESSION['msg']);
		}
	?>
	</form>

	<h2 class="members">Liste des membres</h2>
	<section class="member-list">
	<table border="1" class="table table-striped">
		<tr>
			<th>Prénom</th>
			<th>Nom</th>
			<th>Email</th>
			<th>Adresse</th>
			<th>Ville</th>
			<th>Code Postale</th>
			<th>Role</th>
			<th>Type</th>
			<th colspan="3"></th>
		</tr>
	<?php foreach ($members as $member) : ?>
		<tr>
			<td><?= $member['firstname'];?></td>
			<td><?= $member['lastname'];?></td>
			<td><?= $member['email'];?></td>
			<td><?= $member['address']?></td>
			<td><?= $member['city']?></td>
			<td><?= $member['postcode']?></td>
			<td><?= $member['role']?></td>
			<td><?= $member['type']?></td>
			<td class="action"><!--
			--><a href="<?= $this->url('members', ['id' => $member['id']]) ?>" style="color:black"><i class="fa fa-user" aria-hidden="true"></i></a><!--
			--><a href="<?= $this->url('members2', ['id' => $member['id']]) ?>"><img width="20" src="<?= $this->assetUrl('img/dashboard/edit.png') ?>" alt="modifier"></a><!--
			--><a href="<?= $this->url('members', ['id' => $member['id']]) ?>"><img width="20" src="<?= $this->assetUrl('img/dashboard/delete.png') ?>" alt="supprimer"></a><!--
			--></td>
					</tr>
			<?php endforeach;?>

	</table>
	</section>
</div>


<?php $this->stop('main_content') ?>

<?php $this->start('js') ?>
    <script src="<?= $this->assetUrl('js/forms.js') ?>"></script>
<?php $this->stop('js') ?>
