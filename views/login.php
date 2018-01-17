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

					<div class="card">
					  <div class="card-header text-center">
					    <h3>Controle de Estoque</h3>
					  </div>
					  <div class="card-body">
					    <form method="POST">
							  <div class="form-group">
							    <label for="email">Número</label>
							    <input type="text" class="form-control" id="number" name="number">
							  </div>
							  <div class="form-group">
							    <label for="senha">Senha</label>
							    <input type="password" class="form-control" id="password" name="password">
							  </div>
							  <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Entrar</button>
						</form>
					  </div>
					  <div class="card-footer text-muted text-center">
					    Made In 2018
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>