<?php echo $this->loadView('nav', $dados = array()); ?>

<div class="container">
	<div class="row">
		<div class="col-xl-12 p-4">
			<h1>Adicionar Produto</h1>
			<form method="POST">
			  <div class="form-group">
			    <label for="cod">Código</label>
			    <input type="text" class="form-control" id="cod" name="cod" required>
			  </div>
			  <div class="form-group">
			    <label for="name">Nome</label>
			    <input type="text" class="form-control" id="name" name="name" required>
			  </div>
			  <div class="form-group">
			    <label for="price">Preço</label>
			    <input type="text" class="form-control" id="price" name="price" required>
			  </div>
			  <div class="form-group">
			    <label for="quantity">Quantidade</label>
			    <input type="text" class="form-control" id="quantity" name="quantity" required>
			  </div>
			  <div class="form-group">
			    <label for="min_quantity">Quantidade Mínima</label>
			    <input type="text" class="form-control" id="min_quantity" name="min_quantity" required>
			  </div>
			  <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
			  <a href="<?php echo BASE_URL; ?>products" class="btn btn-primary" role="button" aria-pressed="true"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Voltar</a>
			</form>		
		</div>
	</div>
</div>