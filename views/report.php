<?php echo $this->loadView('nav', $dados = array()); ?>
<?php echo $this->loadView('header', $dados = array()); ?>

<div class="container">
	<div class="row">
		<div class="col-xl-12 p-4">
			<h1>Relatório</h1>
			<table class="table">
			  <thead class="thead-light">
			    <tr>
			      <th scope="col">Código</th>
			      <th scope="col">Nome</th>
			      <th scope="col">Preço Unitário</th>
			      <th scope="col">Quantidade Agora</th>
			      <th scope="col">Deveria Ter</th>
			    </tr>
			  </thead>
			  <tbody>
			    <?php foreach($list as $item): ?>
			    <tr>
			      <th scope="row"><?php echo $item['cod']; ?></th>
			      <td><?php echo $item['name']; ?></td>
			      <td>R$ <?php echo number_format($item['price'], 2, ',', '.'); ?></td>
			      <td><?php echo $item['quantity']; ?></td>
			      <td><?php echo $item['min_quantity']; ?></td>
			    </tr>
				<?php endforeach; ?>
			  </tbody>
			</table>
		</div>
	</div>
</div>