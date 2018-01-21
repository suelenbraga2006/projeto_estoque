<?php echo $this->loadView('nav', $dados = array()); ?>
<?php echo $this->loadView('header', $dados = array()); ?>

<div class="container">
	<div class="row">
		<div class="col-xl-12 p-4">
			<h1>Editar Usuário</h1>
			<form method="POST" enctype="multipart/form-data">
			  <div class="form-group">
			    <label for="number">Número</label>
			    <input type="text" class="form-control" id="number" name="number" value="<?php echo $user['user_number']; ?>" readonly>
			  </div>
			  <div class="form-group">
			    <label for="name">Nome</label>
			    <input type="text" class="form-control" id="name" name="name" value="<?php echo $user['user_name']; ?>" required>
			  </div>
			  <div class="form-group">
			    <label for="password">Senha</label>
			    <input type="password" class="form-control" id="password" name="password" value="<?php echo $user['user_pass']; ?>" required>
			  </div>
			  <div class="form-group">
					<label for="admin">Administrador <a href="#" class="btn-color" data-toggle="tooltip" title="Escolha Sim para dar acesso de administrador."><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>
				    <select class="form-control" id="level" name="level">
				      <option value="0" <?php echo ($user['user_level'] == '0')?'selected="selected"':''; ?>>Não</option>
		      		  <option value="1" <?php echo ($user['user_level'] == '1')?'selected="selected"':''; ?>>Sim</option>
				    </select>
				</div>
				<div class="form-group">
				    <label for="photo">Foto</label>
				    <input type="file" class="form-control-file" id="photo" name="photo" >
				    <input type="hidden" name="photoup" value="<?php echo $user['user_photo']; ?>">
				</div>
				<div class="card my-4">
				  <div class="card-header">
				    Foto Atual
				  </div>
				  <div class="card-body">
				   <img src="<?php echo BASE_URL; ?>assets/images/<?php echo $user['user_photo']; ?>" width="100" height="100" alt="">
				  </div>
				</div>
			  <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar</button>
			  <a href="<?php echo BASE_URL; ?>users" class="btn btn-primary" role="button" aria-pressed="true"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Voltar</a>
			</form>		
		</div>
	</div>
</div>