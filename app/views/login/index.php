<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="css/style.css" rel="stylesheet">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="js/all.js"></script>

<div class = "container">
	<div class="wrapper">
		<form action="<?= LINK."/login/postLogar" ?>" method="post" name="Login_Form" class="form-signin">
		    <h3 class="form-signin-heading">Olá! Digite seu login e senha para entrar no sistema!</h3>

			  <input type="text" class="form-control" name="usuario" placeholder="Usuário" required="" autofocus="" />
			  <input type="password" class="form-control" name="senha" placeholder="Senha" required=""/>

			  <button class="btn btn-lg btn-primary btn-block but_login"  name="Submit" value="Login" type="Submit"><span>Entrar</span></button>
		</form>
	</div>
</div>
<form>
	<input type="hidden" id="link" name="link" value="<?= LINK; ?>">
</form>
