<div class="bloco_formulario">
	<div class="box">
		<h1 class="titulo">Dados para cadastro de equipe</h1>
		<form action="<?= LINK.'/equipe/postCadastro'; ?>" method="post" id="form_cadastro">
            <input type="text" name="nome" value="">
            <input type="email" name="email" value="">
            <input type="password" name="senha" value="">
			<button class="but_salvar_equipe"><span>Cadastrar</span></button>
		</form>
	</div>
</div>
