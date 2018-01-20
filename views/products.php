<?php echo $this->loadView('nav', $dados = array()); ?>
<header>
	<div id="header">
		<div>teste</div>
		<div>teste</div>
	</div>
</header>
<div class="container">
	<div class="row">
		<div class="col-xl-12 p-4">
			<h1>Produtos</h1>
			<form method="GET">
			  <div class="form-group">
			    <input class="form-control form-control-lg" type="text" name="busca" id="busca" value="<?php echo (!empty($_GET['busca']))?$_GET['busca']:''; ?>" placeholder="Digite o código ou o nome do produto...">
			  </div>
			</form>
			<table class="table">
			  <thead class="thead-light">
			    <tr>
			      <th scope="col">Código</th>
			      <th scope="col">Nome</th>
			      <th scope="col">Preço Unitário</th>
			      <th scope="col">Quantidade</th>
			      <th scope="col">Ações</th>
			    </tr>
			  </thead>
			  <tbody>
			    <?php foreach($list as $item): ?>
			    <tr>
			      <th scope="row"><?php echo $item['cod']; ?></th>
			      <td><?php echo $item['name']; ?></td>
			      <td>R$ <?php echo number_format($item['price'], 2, ',', '.'); ?></td>
			      <td><?php echo $item['quantity']; ?></td>
			      <td><a href="<?php echo BASE_URL; ?>products/edit/<?php echo $item['id']; ?>" class="btn btn-primary btn-sm" role="button" aria-pressed="true"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></i>
 Editar</a></td>
			    </tr>
				<?php endforeach; ?>
			  </tbody>
			</table>
			<a href="<?php echo BASE_URL; ?>products/add" class="btn btn-primary" role="button" aria-pressed="true"><i class="fa fa-plus-circle" aria-hidden="true"></i> Adicionar Produto</a>
		</div>
	</div>
</div>