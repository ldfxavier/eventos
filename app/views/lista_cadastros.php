<?php
 $Equipe = new EquipeModel;
 $equipe = $Equipe->lista();
?>
<div class="bloco_lista_captacao">
	<div class="busca">
		<form action="<?php echo LINK ?>/cadastro/buscar" method="post">
			<?php
				$inicio = (isset($_data_inicio) && !empty($_data_inicio)) ? $_data_inicio : date('01/m/Y');
				$final = (isset($_data_final) && !empty($_data_final)) ? $_data_final : date('d/m/Y');
				Form::data('inicio', 'De:', $inicio);
				Form::data('final', 'Até:', $final);
			?>
			<select name="equipe">
			<?php
				foreach($equipe as $ind => $val):
			?>
				<option value="<?= $ind ?>"><?= $val ?></option>
			<?php
				endforeach;
			?>
			</select>
            <input type="text" name="codigo" value="" placeholder="Código">
			<button class="but_buscar_cadastro"><span>Buscar</span></button>
		</form>
	</div>
	<div class="resultado_busca">
	<?php if($_total_busca): ?>
		<div class="total_busca">Total de resultados: <?php echo $_total_busca; ?></div>
	<?php else:	?>
		<div class="total_busca">Nenhum resultado encontrado.</div>
	<?php endif; ?>
	<?php
	if($_captacao):
	?>
		<ul class="titulo_lista">
			<li>Nome</li>
			<li>Telefone</li>
			<li>Data do cadastro</li>
		</ul>
	<?php
		foreach($_captacao as $r):
	?>
		<ul>
			<li><?php echo $r->nome; ?></li>
			<li><?php echo (empty($r->contato->telefone->celular)) ? $r->contato->telefone->fixo : $r->contato->telefone->celular; ?></li>
			<li><?php echo $r->data_criacao->br; ?></li>
		</ul>
	<?php
		endforeach;
	endif;
	?>
	</div>
</div>
