<?php
	class Form {

		/**
		 * @var $titulo 	string 	Título do legend
		 */
		public static function legend($titulo){
			echo '<legend>'.$titulo.'</legend>';
		}

		public static function hash($str, $nome = 'hash', $id = null){
            $hash = base64_encode(md5(uniqid(time())).'-_-'.$str.'-_-'.HASH);
            $_SESSION[$str] = $hash;
			$i_nome = !empty($nome) ? 'name="'.$nome.'"' : '';
			$id = ($id != null) ? 'id="'.$id.'"' : '';
            echo '<input type="hidden" '.$i_nome.' '.$id.' value="'.$hash.'">';
		}

		/**
		 * @var $nome 	string 	Nome do input
		 * @var $titulo 	string 	Título do input
		 * @var $valor 	string 	Valor do input
		 * @var $dados 	array 	array com os atributos
		 */
		public static function input($nome, $titulo = null, $valor = null, $dados = array()){
			$id = isset($dados['id']) ? $dados['id'] : 'id_'.md5(uniqid(time()));
			$valor = ($valor != null) ? $valor : '';
			$type = (isset($dados['type'])) ? $dados['type'] : 'text';
			if(!in_array($type, array('text', 'email', 'number', 'search', 'time'))) $type = 'text';
			$placeholder = (isset($dados['placeholder'])) ? $dados['placeholder'] : str_replace(':', '', $titulo);
			$required = (isset($dados['data-required'])) ? $dados['data-required'] : str_replace(':', '', $titulo);

			$dados_lista = '';
			if(isset($dados['id'])) unset($dados['id']);
			if(isset($dados['type'])) unset($dados['type']);
			if(isset($dados['placeholder'])) unset($dados['placeholder']);
			if($dados) foreach($dados as $ind => $val) $dados_lista .= $ind.'="'.$val.'" ';
			$i_nome = (!empty($nome)) ? 'name="'.$nome.'"' : '';
			$titulo = ($titulo != null) ? '<label for="'.$id.'">'.$titulo.'</label>' : '';
			echo
				'<div class="classe_'.$nome.' input_geral">',
					$titulo,
					'<input type="'.$type.'" data-required="'.$required.'" autocomplete="off" '.$i_nome.' id="'.$id.'" placeholder="'.$placeholder.'" value="'.$valor.'" '.$dados_lista.' />',
				'</div>';
		}

		public static function numero($nome, $titulo = null, $valor = null, $dados = array()){
			$id = isset($dados['id']) ? $dados['id'] : 'id_'.md5(uniqid(time()));
			$valor = ($valor != null) ? $valor : '';
			$placeholder = (isset($dados['placeholder'])) ? $dados['placeholder'] : str_replace(':', '', $titulo);
			$required = (isset($dados['data-required'])) ? $dados['data-required'] : str_replace(':', '', $titulo);
			$padrao = (isset($dados['padrao'])) ? 'step="'.$dados['padrao'].'"' : '';

			$dados_lista = '';
			if(isset($dados['id'])) unset($dados['id']);
			if(isset($dados['type'])) unset($dados['type']);
			if(isset($dados['placeholder'])) unset($dados['placeholder']);
			if($dados) foreach($dados as $ind => $val) $dados_lista .= $ind.'="'.$val.'" ';
			$i_nome = (!empty($nome)) ? 'name="'.$nome.'"' : '';
			$titulo = ($titulo != null) ? '<label for="'.$id.'">'.$titulo.'</label>' : '';
			echo
				'<div class="classe_'.$nome.' input_geral">',
					$titulo,
					'<input type="number" data-required="'.$required.'" '.$padrao.' autocomplete="off" '.$i_nome.' id="'.$id.'" placeholder="'.$placeholder.'" value="'.$valor.'" '.$dados_lista.' />',
				'</div>';
		}

		/**
		 * @var $nome 	string 	Nome do input
		 * @var $titulo 	string 	Título do input
		 * @var $valor 	string 	Valor do input
		 * @var $dados 	array 	array com os atributos
		 */
		public static function email($nome, $titulo = null, $valor = null, $dados = array())
		{
			$id = isset($dados['id']) ? $dados['id'] : 'id_'.md5(uniqid(time()));
			$valor = ($valor != null) ? $valor : '';
			$placeholder = (isset($dados['placeholder'])) ? $dados['placeholder'] : str_replace(':', '', $titulo);
			$required = (isset($dados['data-required'])) ? $dados['data-required'] : str_replace(':', '', $titulo);

			$dados_lista = '';
			if(isset($dados['id'])) unset($dados['id']);
			if(isset($dados['type'])) unset($dados['type']);
			if(isset($dados['placeholder'])) unset($dados['placeholder']);
			if($dados) foreach($dados as $ind => $val) $dados_lista .= $ind.'="'.$val.'" ';
			$i_nome = (!empty($nome)) ? 'name="'.$nome.'"' : '';
			$titulo = ($titulo != null) ? '<label for="'.$id.'">'.$titulo.'</label>' : '';
			echo
				'<div class="classe_'.$nome.' input_geral">',
					$titulo,
					'<input type="email" data-required="'.$required.'" autocomplete="off" '.$i_nome.' id="'.$id.'" placeholder="'.$placeholder.'" value="'.$valor.'" '.$dados_lista.' />',
				'</div>';
		}

		/**
		 * @var $nome 	string 	Nome do input
		 * @var $titulo 	string 	Título do input
		 * @var $valor 	string 	Valor do input
		 * @var $dados 	array 	array com os atributos
		 */
		public static function lista($nome, $titulo = null, $valor = null, $dados = array()){
			$id = isset($dados['id']) ? $dados['id'] : 'id_'.md5(uniqid(time()));
			$valor = (is_array($valor) && $valor) ? $valor : '';
			$type = (isset($dados['type'])) ? $dados['type'] : 'text';
			$placeholder = (isset($dados['placeholder'])) ? $dados['placeholder'] : str_replace(':', '', $titulo);

			$dados_lista = '';
			if(isset($dados['id'])) unset($dados['id']);
			if(isset($dados['type'])) unset($dados['type']);
			if(isset($dados['placeholder'])) unset($dados['placeholder']);
			if($dados) foreach($dados as $ind => $val) $dados_lista .= $ind.'="'.$val.'" ';

			$titulo = ($titulo != null) ? '<label for="'.$id.'">'.$titulo.'</label>' : '';
			$valor_lista = '';
			if($valor):
				foreach($valor as $r_valor):
					if(!empty($r_valor)):
						$valor_lista .= '
							<label>
								<input type="'.$type.'" autocomplete="off" data-json="1" name="'.$nome.'" '.$dados_lista.' placeholder="'.$placeholder.'" value="'.$r_valor.'" >
								<i data-ajuda="Clique 2 vezes para deletar" data-font="&#xe80a;"></i>
							</label>
						';
					endif;
				endforeach;
			endif;
			echo
				'<div class="input_lista">',
					'<div class="botao">',
						$titulo,
						'<input type="'.$type.'" autocomplete="off" data-json="1" name="'.$nome.'" id="'.$id.'" '.$dados_lista.' placeholder="'.$placeholder.'" >',
						'<i data-font="&#xe827;"></i>',
					'</div>',
					'<div class="conteudo_lista">',
					$valor_lista,
					'</div>',
				'</div>';
		}

		public static function arquivo($nome, $diretorio, $valor = ''){
			$valor_lista = '';
			if($valor):
				foreach($valor as $ind => $val):
					$valor_lista .= '<li data-nome="'.$ind.'" data-arquivo="'.$val.'"><input type="text" class="edit_name" value="'.$ind.'"/><a href="'.ARQUIVO.'/'.$diretorio.'/'.$val.'" target="_blank"><i class="view" data-font="&#xe82a;"></i></a><i class="del" data-font="&#xe813;"></i></li>';
				endforeach;
			endif;
			$valor = (is_array($valor)) ? json_encode($valor) : $valor;
			echo
				'<div data-diretorio="arquivo" data-link="{{LINK}}/upload/arquivo" class="input_arquivo_lista">',
					'<input style="width: 100%" type="hidden" name="'.$nome.'" class="input_final" value=\''.$valor.'\' />',
					'<div class="button">',
						'<i class="loading" data-font="&#xe812;"></i>',
						'<input type="file">',
						'<span>ENVIAR ARQUIVO</span>',
					'</div>',
					'<ul class="conteudo_lista">',
						$valor_lista,
					'</ul>',
				'</div>';
		}


		public static function imagem($nome, $diretorio, $valor = ''){
			$valor_lista = '';
			if($valor):
				foreach($valor as $ind => $val):
					$valor_lista .= '<li data-nome="'.$ind.'" data-arquivo="'.$val.'"><input type="text" class="edit_name" value="'.$ind.'"/><a href="'.ARQUIVO.'/'.$diretorio.'/'.$val.'" target="_blank"><i class="view" data-font="&#xe82a;"></i></a><i class="del" data-font="&#xe813;"></i></li>';
				endforeach;
			endif;
			$valor = (is_array($valor)) ? json_encode($valor) : $valor;
			echo
				'<div data-diretorio="'.$diretorio.'" data-link="{{LINK}}/upload/imagem_simples" class="input_arquivo_lista">',
					'<input style="width: 100%" type="hidden" name="'.$nome.'" class="input_final" value=\''.$valor.'\' />',
					'<div class="button">',
						'<i class="loading" data-font="&#xe812;"></i>',
						'<input type="file">',
						'<span>ENVIAR IMAGEM</span>',
					'</div>',
					'<ul class="conteudo_lista">',
						$valor_lista,
					'</ul>',
				'</div>';
		}

		/**
		 * @var $nome	string 	Nome do input
		 * @var $valor 	string 	Valor do input
		 */
		public static function endereco($nome = 'endereco', $valor = null){
			$conteudo_class = 'none';
			$valor_lista = '';
			if(is_array(json_decode($valor, true))):
				$conteudo_class = 'block';
				foreach(json_decode($valor, true) as $r):
					$r = (object)$r;
					$geo = (!empty($r->latitude) && !empty($r->longitude)) ? 'sim' : 'nao';
					$valor_lista .= '<li
					    data-titulo="'.$r->titulo.'"
					    data-cep="'.$r->cep.'"
					    data-endereco="'.$r->endereco.'"
					    data-complemento="'.$r->complemento.'"
					    data-numero="'.$r->numero.'"
					    data-bairro="'.$r->bairro.'"
					    data-cidade="'.$r->cidade.'"
					    data-uf="'.$r->uf.'"
					    data-latitude="'.$r->latitude.'"
					    data-longitude="'.$r->longitude.'"
					class="geral">
					    <div class="endereco_titulo">'.$r->titulo.'</div>
					    <i class="geo '.$geo.'" data-font="&#xe82a;"></i>
					    <i class="edit" data-ajuda="Clique 2 vezes para editar" data-font="&#xe807;"></i>
					    <i class="del" data-ajuda="Clique 2 vezes para deletar" data-font="&#xe813;"></i>
					</li>';
				endforeach;
			endif;
			echo
				'<div class="input_endereco">',
					'<input type="hidden" style="width:100%" class="endereco_final" name="'.$nome.'" value=\''.$valor.'\' />',
					'<div class="inputs">',
						'<input type="text" class="nome" placeholder="Como aparecerá no site" value="" />',
						'<input type="number" class="cep" placeholder="00000000" data-mascara="00000000" value="" />',
						'<input type="text" class="endereco" placeholder="Endereço" value="" />',
						'<input type="text" class="complemento" placeholder="Complemento" value="" />',
						'<input type="text" class="numero" placeholder="Número" value="" />',
						'<input type="text" class="bairro" placeholder="Bairro" value="" />',
						'<input type="text" class="cidade" placeholder="Cidade" value="" />',
						'<input type="text" class="uf" placeholder="UF" data-mascara="AA" value="" />',
						'<input type="text" class="geo latitude" placeholder="Latitude" value="" />',
						'<input type="text" class="geo longitude" placeholder="Longitude" value="" />',
						'<div class="button">SALVAR ENDEREÇO</div>',
					'</div>',
					'<ul class="conteudo_lista" style="display:'.$conteudo_class.'">'.$valor_lista,
					'</ul>',
				'</div>';
		}

		/**
		 * @var $nome 	string 	Nome do input
		 * @var $titulo 	string 	Título do input
		 * @var $valor 	string 	Valor do input
		 * @var $opcoes array 	Array com os valores do input
		 * @var $dados	array 	Array com os atributos do input
		 */
		public static function select($nome, $titulo, $valor = null, $opcoes = array(), $dados = array()){
			$id = isset($dados['id']) ? $dados['id'] : 'id_'.md5(uniqid(time()));
			if(isset($dados['id'])) unset($dados['id']);
			if($dados) foreach($dados as $ind => $val) $dados_lista = $ind.'="'.$val.'" ';
			else $dados_lista = '';

			$opcoes_lista = '';
			$opcoes_option = '';
			if($opcoes):
				foreach($opcoes as $op_value => $op_text):
					$hover = '';
					$hover_option = '';
					if((string)$valor == (string)$op_value):
						$hover = ' hover';
						$hover_option = ' selected';
					endif;
					$opcoes_lista .= '<li class="option'.$hover.'" data-valor="'.$op_value.'">'.$op_text.'</li>';
					$opcoes_option .= '<option '.$hover_option.' value="'.$op_value.'">'.$op_text.'</option>';
				endforeach;
			endif;
			$valor_texto = isset($opcoes[$valor]) ? $opcoes[$valor] : reset($opcoes);
			$required = (isset($dados['data-required'])) ? $dados['data-required'] : str_replace(':', '', $titulo);

			$i_nome = (!empty($nome)) ? 'name="'.$nome.'"' : '';
			$titulo = ($titulo != null) ? '<label for="'.$id.'">'.$titulo.'</label>' : '';
			echo
				'<div class="select_geral classe_'.$nome.'" data-select="true">',
					$titulo,
					'<div class="valor"><span>'.$valor_texto.'</span><i data-font="&#xe800;"></i></div>',
					'<select '.$i_nome.' id="'.$id.'" data-required="'.$required.'" value="'.$valor.'"  '.$dados_lista.'>',
						$opcoes_option,
					'</select>',
				'</div>';
		}

		/**
		 * @var $nome 	string 	Nome do input
		 * @var $titulo 	string 	Título do input
		 * @var $valor 	string 	Valor do input
		 * @var $resize bollean	Se o textarea será fixo ou não
		 * @var $dados	array 	Array com os atributos do input
		 */
		public static function password($nome, $titulo, $verificar = true, $dados = array()){
			$id = isset($dados['id']) ? $dados['id'] : 'id_'.md5(uniqid(time()));
			$placeholder = (isset($dados['placeholder'])) ? $dados['placeholder'] : str_replace(':', '', $titulo);

			$dados_lista = '';
			if(isset($dados['id'])) unset($dados['id']);
			if(isset($dados['type'])) unset($dados['type']);
			if(isset($dados['placeholder'])) unset($dados['placeholder']);
			if($dados) foreach($dados as $ind => $val) $dados_lista .= $ind.'="'.$val.'" ';

			if($verificar == true):
				$verificar = 'data-verificar="true"';
				$verificar_html = '
					<div class="verificar">
						<input class="class_'.$nome.'_verificar" name="'.$nome.'_2" type="password" id="'.$id.'_verificar" placeholder="Repetir senha" value="" />
						<i data-font="&#xe802;" class="verificar_sim"></i>
						<i data-ajuda="Senhas não conferem" data-font="&#xe804;" class="verificar_nao"></i>
						<i data-font="&#xe804;" class="verificar_zero"></i>
					</div>
				';
			else:
				$verificar = '';
				$verificar_html = '';
			endif;
			$i_nome = (!empty($nome)) ? 'name="'.$nome.'"' : '';
			$titulo = ($titulo != null) ? '<label for="'.$id.'">'.$titulo.'</label>' : '';
			echo
				'<div class="password_geral classe_'.$nome.'" '.$verificar.'>',
					$titulo,
					'<div class="forca">',
						'<input type="password" '.$i_nome.' id="'.$id.'" placeholder="'.$placeholder.'" value="" '.$dados_lista.' />',
						
					'</div>',
					$verificar_html,
				'</div>';
		}

		/**
		 * @var $nome 	string 	Nome do input
		 * @var $titulo string 	Título do input
		 * @var $valor 	string 	Valor do input
		 * @var $resize bollean	Se o textarea será fixo ou não
		 * @var $dados	array 	Array com os atributos do input
		 */
		public static function textarea($nome, $titulo, $valor = null, $resize = false, $dados = array()){
			$id = isset($dados['id']) ? $dados['id'] : 'id_'.md5(uniqid(time()));
			$valor = ($valor != null) ? $valor : '';
			$resize = ($resize == true) ? 'data-textarea="true"' : '';
			$placeholder = (isset($dados['placeholder'])) ? $dados['placeholder'] : str_replace(':', '', $titulo);
			$required = (isset($dados['data-required'])) ? $dados['data-required'] : str_replace(':', '', $titulo);

			if(isset($dados['id'])) unset($dados['id']);
			if(isset($dados['type'])) unset($dados['type']);
			if(isset($dados['placeholder'])) unset($dados['placeholder']);
			if(isset($dados['data-textarea'])) unset($dados['data-textarea']);

			if($dados) foreach($dados as $ind => $val) $dados_lista = $ind.'="'.$val.'" ';
			else $dados_lista = '';
			$i_nome = (!empty($nome)) ? 'name="'.$nome.'"' : '';
			$titulo = ($titulo != null) ? '<label for="'.$id.'">'.$titulo.'</label>' : '';
			echo
				'<div class="textarea_geral class_'.$nome.'">',
					$titulo,
					'<textarea data-required="'.$required.'" '.$i_nome.' id="'.$id.'" '.$resize.' placeholder="'.$placeholder.'" '.$dados_lista.'>'.$valor.'</textarea>',
					//'<div class="bloco_mensagem"><span>'.nl2br($valor).'</span><br><br></div>',
				'</div>';
		}

		/**
		 * @var $nome 	string 	Nome do input
		 * @var $titulo string 	Título do input
		 * @var $valor 	string 	Valor do input
		 */
		public static function booleano($nome, $titulo, $valor = false){
			$id = 'id_'.md5(uniqid(time()));
			$valor = ($valor == 1) ? 1 : 2;
			$verificar = ($valor == 1) ? 'data-valor="sim"' : 'data-valor="nao"';
			$required = (isset($dados['data-required'])) ? $dados['data-required'] : str_replace(':', '', $titulo);

			$i_nome = (!empty($nome)) ? 'name="'.$nome.'"' : '';
			$titulo = ($titulo != null) ? '<div class="label">'.$titulo.'</div>' : '';
			echo
				'<div class="boleano_geral classe_'.$nome.'" '.$verificar.'>',
					'<input type="hidden" data-required="'.$required.'" '.$i_nome.' id="'.$id.'" value="'.$valor.'" />',
					$titulo,
					'<div class="bloco_boleano">',
						'<div class="linha_boleano"></div>',
						'<div class="botao_boleano"></div>',
					'</div>',
				'</div>';
		}

		/**
		 * @var $nome 		string 	Nome do input
		 * @var $titulo 	string 	Título do input
		 * @var $valor 		string 	Valor do input
		 * @var $checked 	bollean	True para marcado e false para não
		 * @var $dados		array 	Array com os atributos do input
		 */
		public static function checkbox($nome, $titulo, $valor, $checked = false, $dados = array()){
			$id = isset($dados['id']) ? $dados['id'] : 'id_'.md5(uniqid(time()));
			$valor = ($valor != null) ? $valor : '';

			if(isset($dados['id'])) unset($dados['id']);
			if(isset($dados['type'])) unset($dados['type']);

			if($dados) foreach($dados as $ind => $val) $dados_lista = $ind.'="'.$val.'" ';
			else $dados_lista = '';

			$checked = ($checked == true) ? 'checked="checked"' : '';
			$i_nome = (!empty($nome)) ? 'name="'.$nome.'"' : '';
			$required = (isset($dados['data-required'])) ? $dados['data-required'] : str_replace(':', '', $titulo);
			echo
				'<div class="checkbox_geral classe_'.$nome.'">',
					'<input type="checkbox" data-required="'.$required.'" '.$i_nome.' id="'.$id.'" value="'.$valor.'" '.$checked.' '.$dados_lista.' />',
					'<label for="'.$id.'" data-font="&#xe818;">'.$titulo.'</label>',
				'</div>';
		}

		/**
		 * @var $nome 		string 	Nome do input
		 * @var $opcoes 	array 	Array com as opções para o radio
		 * @var $valor 		string 	Valor do input
		 * @var $dados		array 	Array com os atributos do input
		 */
		public static function radio($nome, $titulo = '', $opcoes = array(), $valor = null, $dados = array()){
			if(isset($dados['id'])) unset($dados['id']);
			if(isset($dados['type'])) unset($dados['type']);

			if($dados) foreach($dados as $ind => $val) $dados_lista = $ind.'="'.$val.'" ';
			else $dados_lista = '';

			if($opcoes):
				echo
					'<div class="radio_geral" class_'.$nome.'>',
						'<div class="label">'.$titulo.'</div>';
				foreach($opcoes as $val => $texto):
					$id = 'id_'.md5(uniqid(time()));
					$checked = ($val == $valor) ? 'checked="checked"' : '';
					$i_nome = (!empty($nome)) ? 'name="'.$nome.'"' : '';
					$required = (isset($dados['data-required'])) ? $dados['data-required'] : str_replace(':', '', $texto);
					echo '
						<div class="opcao">
							<input type="radio" data-required="'.$required.'" '.$i_nome.' id="'.$id.'" value="'.$val.'" '.$checked.' '.$dados_lista.' />
							<label for="'.$id.'" data-font="&#xe805;">'.$texto.'</label>
						</div>
					';
				endforeach;
				echo '</div>';
			endif;
		}

		/**
		 * @var $nome 		string 	Nome do input
		 * @var titulo		array 	Título do input
		 * @var $valor 		string 	Valor do input
		 * @var $tipo		string 	Campo que pode ser cpf, cnpj ou cpfcnpj
		 * @var $dados		array 	Array com os atributos do input
		 */
		public static function documento($nome, $titulo, $valor = null, $tipo = 'cpf', $dados = array()){
			$id = isset($dados['id']) ? $dados['id'] : 'id_'.md5(uniqid(time()));
			$valor = ($valor != null) ? preg_replace("/[^0-9]/", "", $valor) : '';

			if(isset($dados['id'])) unset($dados['id']);
			if(isset($dados['type'])) unset($dados['type']);
			if(isset($dados['placeholder'])) unset($dados['placeholder']);
			$dados_lista = '';
			if($dados) foreach($dados as $ind => $val) $dados_lista .= $ind.'="'.$val.'" ';
			$required = (isset($dados['data-required'])) ? $dados['data-required'] : str_replace(':', '', $titulo);

			$i_nome = (!empty($nome)) ? 'name="'.$nome.'"' : '';
			$titulo = ($titulo != null) ? '<label for="'.$id.'">'.$titulo.'</label>' : '';
			if($tipo == 'cpf'):
				echo
					'<div data-documento="cpf" class="documento_geral classe_'.$nome.'">',
						$titulo,
						'<input type="hidden" data-required="'.$required.'" '.$i_nome.' value="'.$valor.'" '.$dados_lista.' />',
						'<input type="number" data-eq="1" data-mascara="numero" data-max="3" maxlength="3" placeholder="000" value="'.substr($valor,0,3).'" />',
						'<div class="documento_ponto">.</div>',
						'<input type="number" data-eq="2" data-mascara="numero" data-max="3" maxlength="3" placeholder="000" value="'.substr($valor,3,3).'" />',
						'<div class="documento_ponto">.</div>',
						'<input type="number" data-eq="3" data-mascara="numero" data-max="3" maxlength="3" placeholder="000" value="'.substr($valor,6,3).'" />',
						'<div class="documento_ponto">-</div>',
						'<input type="number" data-eq="4" data-mascara="numero" data-max="2" maxlength="2" placeholder="00" value="'.substr($valor,9,2).'" />',
					'</div>';
			elseif($tipo == 'cnpj'):
				echo
				'<div data-documento="cnpj" class="documento_geral classe_'.$nome.'">',
					$titulo,
					'<input type="hidden" data-required="'.$required.'" '.$i_nome.' value="'.$valor.'" '.$dados_lista.' />',
					'<input type="number" data-eq="1" data-mascara="numero" data-max="2" maxlength="2" placeholder="00" value="'.substr($valor,0,2).'" />',
					'<div class="documento_ponto">.</div>',
					'<input type="number" data-eq="2" data-mascara="numero" data-max="3" maxlength="3" placeholder="000" value="'.substr($valor,2,3).'" />',
					'<div class="documento_ponto">.</div>',
					'<input type="number" data-eq="3" data-mascara="numero" data-max="3" maxlength="3" placeholder="000" value="'.substr($valor,5,3).'" />',
					'<div class="documento_ponto">/</div>',
					'<input type="number" data-eq="4" data-mascara="numero" data-max="4" maxlength="4" placeholder="0000" value="'.substr($valor,8,4).'" />',
					'<div class="documento_ponto">-</div>',
					'<input type="number" data-eq="5" data-mascara="numero" data-max="2" maxlength="2" placeholder="00" value="'.substr($valor,12,2).'" />',
				'</div>';
			elseif($tipo == 'cpfcnpj'):
				echo
					'<div data-documento="cpfcnpj" class="documento_geral classe_'.$nome.'">',
						$titulo,
						'<input type="text" data-required="'.$required.'" data-mascara="numero" data-max="14,18" maxlength="14" '.$i_nome.' id="'.$id.'" placeholder="000.000.000-00" value="'.$valor.'" '.$dados_lista.' />',
					'</div>';
			endif;
		}

		public static function url($nome, $titulo, $valor = null, $dados = array()){
			$id = isset($dados['id']) ? $dados['id'] : 'id_'.md5(uniqid(time()));
			$valor = ($valor != null) ? _Texto::caixa($valor, "a") : '';

			if(isset($dados['id'])) unset($dados['id']);
			if(isset($dados['type'])) unset($dados['type']);
			if(isset($dados['placeholder'])) unset($dados['placeholder']);

			$dados_lista = '';
			if($dados) foreach($dados as $ind => $val) $dados_lista .= $ind.'="'.$val.'" ';

			$lista = '<li>https://</li><li>http://</li>';
			if(!empty($valor) && strstr($valor, "https://")) $lista = '<li>http://</li><li>https://</li>';

			$required = (isset($dados['data-required'])) ? $dados['data-required'] : str_replace(':', '', $titulo);

			$i_nome = (!empty($nome)) ? 'name="'.$nome.'"' : '';
			$titulo = ($titulo != null) ? '<label for="'.$id.'">'.$titulo.'</label>' : '';
			echo
				'<div class="link_geral classe_'.$nome.'">',
					'<input type="hidden" data-required="'.$required.'" '.$i_nome.' value="'.$valor.'" />',
					$titulo,
					'<div class="select_link select_hide">',
						'<i data-font="&#xe800;"></i>',
						'<ul class="teste">',
							$lista,
						'</ul>',
					'</div>',
					'<input type="url" id="'.$id.'" placeholder="google.com" value="'.str_replace(array('http://', 'https://'), '', $valor).'" '.$dados_lista.' />',
				'</div>';
		}

		public static function data($nome, $titulo = null, $valor = null, $dados = array()){
			$id = isset($dados['id']) ? $dados['id'] : 'id_'.md5(uniqid(time()));
			$valor = ($valor != null) ? $valor : '';

			if(isset($dados['id'])) unset($dados['id']);
			if(isset($dados['type'])) unset($dados['type']);
			if(isset($dados['placeholder'])) unset($dados['placeholder']);
			if(isset($dados['data-mascara'])) unset($dados['data-mascara']);

			if($dados) foreach($dados as $ind => $val) $dados_lista = $ind.'="'.$val.'" ';
			else $dados_lista = '';

			$valor_data = '';
			if(!empty($valor) && preg_replace("/[^0-9]/", "", $valor) == "00000000") $valor = _Data::converter($valor, 'd/m/Y');

			$required = (isset($dados['data-required'])) ? $dados['data-required'] : str_replace(':', '', $titulo);

			$i_nome = (!empty($nome)) ? 'name="'.$nome.'"' : '';
			$titulo = ($titulo != null) ? '<label for="'.$id.'">'.$titulo.'</label>' : '';
			echo
				'<div class="date_geral classe_'.$nome.'">',
					$titulo,
					'<input type="text" '.$i_nome.' data-mascara="00/00/0000" id="'.$id.'" data-required="'.$required.'" placeholder="00/00/0000" value="'.$valor.'" '.$dados_lista.' />',
				'</div>';
		}

		public static function datahora($nome, $titulo = null, $valor = null, $dados = array()){
			$id = isset($dados['id']) ? $dados['id'] : 'id_'.md5(uniqid(time()));
			$valor = ($valor != null) ? $valor : '';

			if(isset($dados['id'])) unset($dados['id']);
			if(isset($dados['type'])) unset($dados['type']);
			if(isset($dados['placeholder'])) unset($dados['placeholder']);
			if(isset($dados['data-mascara'])) unset($dados['data-mascara']);

			if($dados) foreach($dados as $ind => $val) $dados_lista = $ind.'="'.$val.'" ';
			else $dados_lista = '';

			$valor_data = '';
			if(!empty($valor) && !strstr(preg_replace("/[^0-9]/", "", $valor), "00000000000000")) $valor = Converter::data($valor, 'd/m/Y H:i:s');

			$required = (isset($dados['data-required'])) ? $dados['data-required'] : str_replace(':', '', $titulo);
			$i_nome = (!empty($nome)) ? 'name="'.$nome.'"' : '';
			$titulo = ($titulo != null) ? '<label for="'.$id.'">'.$titulo.'</label>' : '';
			echo
				'<div class="date_geral classe_'.$nome.'">',
					$titulo,
					'<input type="text" '.$i_nome.' data-mascara="00/00/0000 00:00:00" id="'.$id.'" data-required="'.$required.'" placeholder="00/00/0000 00:00:00" value="'.$valor.'" '.$dados_lista.' />',
				'</div>';
		}

		public static function hora($nome, $titulo, $valor = null, $dados = array()){
			$id = isset($dados['id']) ? $dados['id'] : 'id_'.md5(uniqid(time()));
			$valor = ($valor != null) ? preg_replace("/[^0-9]/", "", $valor) : '';

			if(isset($dados['id'])) unset($dados['id']);
			if(isset($dados['type'])) unset($dados['type']);
			if(isset($dados['placeholder'])) unset($dados['placeholder']);
			if(isset($dados['data-mascara'])) unset($dados['data-mascara']);

			if($dados) foreach($dados as $ind => $val) $dados_lista = $ind.'="'.$val.'" ';
			else $dados_lista = '';

			$required = (isset($dados['data-required'])) ? $dados['data-required'] : str_replace(':', '', $titulo);
			$i_nome = (!empty($nome)) ? 'name="'.$nome.'"' : '';
			$titulo = ($titulo != null) ? '<label for="'.$id.'">'.$titulo.'</label>' : '';
			echo
				'<div class="date_geral classe_'.$nome.'">',
					$titulo,
					'<input type="text" '.$i_nome.' data-mascara="00:00" id="'.$id.'" data-required="'.$required.'" placeholder="00:00" value="'.$valor.'" '.$dados_lista.' />',
				'</div>';
		}

		public static function telefone($nome, $titulo, $valor = null, $dados = array()){
			$id = isset($dados['id']) ? $dados['id'] : 'id_'.md5(uniqid(time()));
			$valor = ($valor != null) ? $valor : '';
			$type = (isset($dados['type'])) ? $dados['type'] : 'text';
			if(!in_array($type, array('text', 'email', 'number', 'search'))) $type = 'text';
			$placeholder = (isset($dados['placeholder'])) ? $dados['placeholder'] : str_replace(':', '', $titulo);

			$dados_lista = '';
			if(isset($dados['id'])) unset($dados['id']);
			if(isset($dados['type'])) unset($dados['type']);
			if(isset($dados['placeholder'])) unset($dados['placeholder']);
			if($dados) foreach($dados as $ind => $val) $dados_lista .= $ind.'="'.$val.'" ';
			$i_nome = (!empty($nome)) ? 'name="'.$nome.'"' : '';
			$required = (isset($dados['data-required'])) ? $dados['data-required'] : str_replace(':', '', $titulo);
			echo
				'<div class="input_geral classe_'.$nome.'">',
					'<label for="'.$id.'">'.$titulo.'</label>',
					'<input type="'.$type.'" data-required="'.$required.'" autocomplete="off" '.$i_nome.' id="'.$id.'" placeholder="'.$placeholder.'" data-mascara="00 000000000" value="'.$valor.'" '.$dados_lista.' />',
				'</div>';
		}

		public static function cor($nome, $titulo, $valor, $dados = array()){

		}

	}
