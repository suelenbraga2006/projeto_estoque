<div id="background">
	<div id="overlay">
		<div class="container" id="login">
			<div class="row p-4 justify-content-center align-items-center">
				<div class="col-xl-4">
					<?php
						if(!empty($msg)){
							echo $msg;
						}
					?>

					<div class="card card-inverse">
					  <h3 class="card-header text-center">Controle de Estoque</h3>
					  <div class="card-block">
					    <form method="POST">
							  <div class="form-group">
							    <label for="email">Número</label>
							    <input type="text" class="form-control" id="number" name="number">
							  </div>
							  <div class="form-group">
							    <label for="senha">Senha</label>
							    <input type="password" class="form-control" id="password" name="password">
							  </div>
							  <button type="submit" class="btn btn-primary">Entrar</button>
						</form>
					  </div>
					  <div class="card-footer text-muted text-center">
					   Made in 2018
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>