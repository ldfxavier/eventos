<?php
	class equipeController extends Controller {

		public function Index(){
			if(!Auth::verificar('site')) header('LOCATION: '.LINK.'/login');
			if(isset($_SESSION['EQUIPE']) && $_SESSION['EQUIPE']->admin->valor != 1) exit();
			$this->view('equipe');
		}

		public function postCadastro(){
			if(isset($_SESSION['EQUIPE']) && $_SESSION['EQUIPE']->admin->valor != 1) exit();
			Validar::vazio($_POST['nome'], 'Nome');
			Validar::vazio($_POST['email'], 'E-mail');
			Validar::vazio($_POST['senha'], 'Senha');

            $dados['cod'] = md5(uniqid(time()));
			$dados['nome'] = $_POST['nome'];
			$dados['salt'] = password_hash($_POST['senha'], PASSWORD_DEFAULT, ['cost' => 11]);
			$dados['email'] = $_POST['email'];
			$dados['status'] = 1;
			$dados['data_criacao'] = date('Y-m-d H:i:s');

			$Equipe = new EquipeModel;
			$equipe = $Equipe->cadastrar($dados);

			echo $equipe;
			exit();
		}
	}
