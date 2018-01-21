<?php echo $this->loadView('nav', $dados = array()); ?>
<?php echo $this->loadView('header', $dados = array()); ?>

<div class="container">
	<div class="row">
		<div class="col-xl-12 p-4">
			<h1>Usuários</h1>
			<form method="GET">
			  <div class="form-group">
			    <input class="form-control form-control-lg" type="text" name="busca" id="busca" value="<?php echo (!empty($_GET['busca']))?$_GET['busca']:''; ?>" placeholder="Digite o código ou o nome do produto...">
			  </div>
			</form>
			<table class="table">
			  <thead class="thead-light">
			    <tr>
			      <th scope="col">Foto</th>
			      <th scope="col">Nome</th>
			      <th scope="col">Número</th>
			      <th scope="col">Nível</th>
			      <th scope="col">Ações</th>
			    </tr>
			  </thead>
			  <tbody>
			    <?php foreach($users as $user): ?>
			    <tr>
			      <th scope="row"><img src="<?php echo BASE_URL; ?>assets/images/<?php echo $user['user_photo']; ?>" alt="" width="50" height="50"></th>
			      <td><?php echo $user['user_name']; ?></td>
			      <td><?php echo $user['user_number']; ?></td>
			      <td>
			      	<?php if($user['user_level'] == 1): ?>
			      		Administrador
			      	<?php else: ?>
			      		Comum
			      	<?php endif; ?>
			      </td>
			      <td><a href="<?php echo BASE_URL; ?>users/edit/<?php echo $user['id']; ?>" class="btn btn-primary btn-sm" role="button" aria-pressed="true"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></i>
 Editar</a></td>
			    </tr>
				<?php endforeach; ?>
			  </tbody>
			</table>
			<a href="<?php echo BASE_URL; ?>users/add" class="btn btn-primary" role="button" aria-pressed="true"><i class="fa fa-plus-circle" aria-hidden="true"></i> Adicionar Usuário</a>
		</div>
	</div>
</div>