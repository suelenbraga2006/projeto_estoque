<?php echo $this->loadView('nav', $dados = array()); ?>

<div class="container">
	<div class="col-xl-12 p-4">
		<h1>Produtos</h1>
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
		      <td><a href="<?php echo BASE_URL; ?>products/edit/<?php echo $item['id']; ?>" class="btn btn-primary btn-sm" role="button" aria-pressed="true"><i class="fas fa-pencil-alt"></i> Editar</a></td>
		    </tr>
			<?php endforeach; ?>
		  </tbody>
		</table>
		<a href="<?php echo BASE_URL; ?>products/add" class="btn btn-primary" role="button" aria-pressed="true"><i class="fas fa-plus"></i> Adicionar Produto</a>
	</div>
</div>