<?php
	class loginController extends Controller {

		public function index(){
				$this->view('!login.index');
		}

		public function postLogar(){
			$usuario = $_POST['usuario'];
			$senha = $_POST['senha'];

			$Equipe = new EquipeModel;
			$equipe = $Equipe->login($usuario, $senha);
			echo $equipe;
			exit();
		}

		public function postDocumento(){

			$Usuario = new UsuarioModel;
			$usuario = $Usuario->documento($_POST['documento']);

			if($usuario) echo json_encode($usuario);
			else echo Mensagem::erro('Erro!', 'Nenhum usuário encontrado');
		}

		public function postSalvar(){
			$Usuario = new UsuarioModel;
			$Usuario->salvar($_POST['dados']);
		}
		public function sair(){
			session_destroy();
			header('Location: '.LINK);
		}
	}
