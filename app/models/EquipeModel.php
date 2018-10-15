<?php
	final class EquipeModel extends Model {

		public $_tabela = 'equipe';

		private function montar($dados){
			if($dados):
				$array = array();
				foreach($dados as $r):
					$imagem = LINK.'/images/painel_usuario.png';
					if(!empty($r->imagem)) $imagem = ARQUIVO.'/usuario/'.$r->imagem;

					$array[] = (object)array(
						'id' => $r->id,
						'nome' => $r->nome,
						'email' => $r->email,
						'admin' => (object)array(
							'valor' => ($r->admin == 1) ? 1 : 2,
							'texto' => ($r->admin == 1) ? 'Administrador' : 'Usuário',
						),
						'status' => (object)array(
							'valor' => ($r->status == 1) ? 1 : 2,
							'texto' => ($r->status == 1) ? 'Ativo' : 'Inativo'
						)
					);
				endforeach;
				return $array;
			endif;
		}

		public function login($login, $password){
			Validar::vazio($login, 'Login');
			Validar::vazio($password, 'Password');

			$usuario = $this->read("`email` = '{$login}'");

			if(!$usuario) return Mensagem::erro('Login incorreto!', 'Login incorreto, digite seu e-mail.');
			elseif(!password_verify($password, $usuario[0]->salt)) return Mensagem::erro('Senha incorreta!', 'A senha digitada está incorreta.');

			$this->update(array('data_login' => date('Y-m-d H:i:s')), "`id` = '{$usuario[0]->id}'");

			$usuario = $this->montar($usuario);

			$_SESSION['EQUIPE'] = $usuario[0];
			Auth::criar('site');

			return Mensagem::ok();
		}

		private function logado(){
			if(!Auth::verificar('painel')) return true;
			$equipe = $_SESSION['EQUIPE'];
			if(!in_array('per_usuario_equipe', $equipe->permissao)) return true;
		}

		public function cadastrar($dados){
			$verificar = $this->read("`email` = '".$dados['email']."'");

			if(isset($verificar) && !empty($verificar)):
				return json_encode([
					'erro' => true,
					'titulo' => 'Usuário já cadastra!',
					'texto' => 'Já existe um usuário cadastro com esse e-mail!'
				]);
			else:
				$retorno = $this->insert($dados);
				return $retorno;
			endif;
		}

		public function p_id($ind, $val){
			//if($this->logado()) return (object)array('lista' => '', 'pagina' => 0);
			// Cria o where
			$dado = $this->montar($this->read("`empresa` = '".$_SESSION['EMPRESA']."' AND `{$ind}` = '{$val}' AND `status` = 1"));
			if($dado) return $dado[0];
		}

		public function buscar($id){
			$dado = $this->montar($this->read("`id` = '$id'"));
			if($dado) return $dado[0];
		}
		public function nome($id){
			$dado = $this->montar($this->read("`empresa` = '".$_SESSION['EMPRESA']."' AND `id` = '{$id}' AND `status` = 1"));
			if($dado) return $dado[0]->nome;
		}

		public function lista(){
			$montar = $this->montar($this->read());
			$dados['todos'] = 'Todos';
			if($montar):
				foreach($montar as $r):
					$dados[$r->id] = $r->nome;
				endforeach;
			endif;
			if($dados) return $dados;
		}
	}
