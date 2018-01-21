<?php echo $this->loadView('nav', $dados = array()); ?>
<?php echo $this->loadView('header', $dados = array()); ?>

<div class="container">
	<div class="row">
		<div class="col-xl-12 p-4">
			<h1>Adicionar Usuário</h1>
			<?php
				if(!empty($msg)){
					echo $msg;
				}
			?>
			<form method="POST" enctype="multipart/form-data">
			  <div class="form-group">
			    <label for="number">Número</label>
			    <input type="text" class="form-control" id="number" name="number" required>
			  </div>
			  <div class="form-group">
			    <label for="name">Nome</label>
			    <input type="text" class="form-control" id="name" name="name" required>
			  </div>
			  <div class="form-group">
			    <label for="password">Senha</label>
			    <input type="password" class="form-control" id="password" name="password" required>
			  </div>
			  <div class="form-group">
					<label for="admin">Administrador <a href="#" class="btn-color" data-toggle="tooltip" title="Escolha Sim para dar acesso de administrador."><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>
				    <select class="form-control" id="level" name="level">
				      <option value="0">Não</option>
				      <option value="1">Sim</option>
				    </select>
				</div>
				<div class="form-group">
				    <label for="photo">Foto</label>
				    <input type="file" class="form-control-file" id="photo" name="photo">
				</div>
				<div class="card my-4">
				  <div class="card-header">
				    Foto Selcionada
				  </div>
				  <div class="card-body">
				   teste
				  </div>
				</div>
			  <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar</button>
			  <a href="<?php echo BASE_URL; ?>users" class="btn btn-primary" role="button" aria-pressed="true"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Voltar</a>
			</form>		
		</div>
	</div>
</div>