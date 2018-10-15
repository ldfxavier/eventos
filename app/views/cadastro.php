<div class="bloco_formulario">
	<div class="box">
		<h1 class="titulo">Dados para cadastro</h1>
		<form action="<?= LINK.'/cadastro/postCadastro'; ?>" method="post" id="form_cadastro">
			<input type="text" name="nome" value="" placeholder="Nome">
			<input type="tel" name="telefone_fixo" placeholder="Telefone fixo" class="txttelefone" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" />
			<input type="tel" name="telefone_celular" placeholder="Telefone celular" class="txttelefone" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" />
			<input type="text" name="idade" value="" placeholder="Idade">
			<input type="text" name="cidade" value="" placeholder="Cidade">
			<button class="but_salvar_cadastro"><span>Cadastrar</span></button>
		</form>
	</div>
</div>
<script type="text/javascript">$(".txttelefone").mask("(00) 0000-00009");</script>
