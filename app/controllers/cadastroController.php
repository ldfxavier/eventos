<?php
	class cadastroController extends Controller {

		public function Index(){
			if(!Auth::verificar('site')) header('LOCATION: '.LINK.'/login');
			$this->view('cadastro');
		}

		public function postCadastro(){
			Validar::vazio($_POST['nome'], 'Nome');
			if(empty($_POST['telefone_fixo']) && empty($_POST['telefone_celular'])):
				echo json_encode(array(
					'erro' => true,
					'titulo' => 'Campo obrigatório',
					'texto' => 'É preciso informar pelo menos um telefone para contato!'
				));
				exit();
			endif;

			$equipe = $_SESSION['EQUIPE'];

			$dados['empresa'] = 1;
			$dados['nome'] = $_POST['nome'];
			$dados['telefone_fixo'] = $_POST['telefone_fixo'];
			$dados['telefone_celular'] = $_POST['telefone_celular'];
			$dados['idade'] = $_POST['idade'];
			$dados['cidade'] = $_POST['cidade'];
			$dados['pesquisador'] = $equipe->id;
			$dados['equipe'] = $equipe->id;
			$dados['status'] = 6;
			$dados['data_criacao'] = date('Y-m-d H:i:s');

			$Captacao = new CaptacaoModel;
			$cadastro = $Captacao->cadastrar($dados);

			echo $cadastro;
			exit();
		}
		public function lista(){
			if(isset($_SESSION['EQUIPE']) && $_SESSION['EQUIPE']->admin->valor != 1) exit();
            $inicio = date('Y-m-1');
            $final = date('Y-m-d');

            $Captacao = new CaptacaoModel;
            $captacao = $Captacao->lista("`data_criacao` >= '".$inicio." 00:00:00' AND `data_criacao` <= '".$final." 23:59:59'");

            $dados['captacao'] = $captacao->lista;
            $dados['total_busca'] = $captacao->total_busca;

			$this->view('lista_cadastros', $dados);
		}

		public function buscar(){
			if(isset($_SESSION['EQUIPE']) && $_SESSION['EQUIPE']->admin->valor != 1) exit();

			$Captacao = new CaptacaoModel;
			
			if(isset($_POST['codigo']) && !empty($_POST['codigo'])):
				$captacao = $Captacao->lista("`id` = '".$_POST['codigo']."'");
			else:
				if(isset($_POST['inicio']) && !empty($_POST['inicio'])):
					$inicio = $_POST['inicio'];
					$dados['data_inicio'] = $_POST['inicio'];
				endif;
				if(isset($_POST['final']) && !empty($_POST['final'])):
					$final = $_POST['final'];
					$dados['data_final'] = $_POST['final'];
				endif;

				$equipe = "";
				if($_POST['equipe'] != 'todos'):
					$equipe = "`equipe` = '".$_POST['equipe']."' AND ";
				endif;

				$inicio = ($inicio == null) ? date('Y-m-1') : Converter::data($inicio, 'Y-m-d');
				$final = ($final == null) ? date('Y-m-d') : Converter::data($final, 'Y-m-d');
				$captacao = $Captacao->lista($equipe."(`data_criacao` >= '".$inicio." 00:00:00' AND `data_criacao` <= '".$final." 23:59:59')");
			endif;

			$retorno = '';

			if($captacao->total_busca):
				$retorno .= "<div class='total_busca'>Total de resultados: ".$captacao->total_busca."</div>";
			else:
				$retorno .= "<div class='total_busca'>Nenhum resultado encontrado.</div>";
			endif;
			if($captacao->lista):
				$retorno .= "
				<ul class='titulo_lista'>
					<li>Nome</li>
					<li>Telefone</li>
					<li>Data do cadastro</li>
				</ul>";
				foreach($captacao->lista as $r):
					$telefone = (isset($r->contato->telefone->celular) && !empty($r->contato->telefone->celular)) ? $r->contato->telefone->celular : $r->contato->telefone->fixo;
				$retorno .= "
				<ul>
					<li>".$r->nome."</li>
					<li>".$telefone."</li>
					<li>".$r->data_criacao->br."</li>
				</ul>";
				endforeach;
			endif;

			echo $retorno;
		}
	}
