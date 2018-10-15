<?php
	class CaptacaoModel extends Model {

		public $_tabela = 'captacao';

		private function montar($dados){
			if($dados):
				$Equipe = new EquipeModel;
				$array = array();
				foreach($dados as $r):
					$array[] = (object)array(
						'id' => $r->id,
						'empresa' => $r->empresa,
						'nome' => $r->nome,
						'contato' => (object)array(
							'telefone' => (object)array(
								'fixo' => $r->telefone_fixo,
								'celular' => $r->telefone_celular
							)
						),
						'idade' => $r->idade,
						'cidade' => $r->cidade,
						'data_criacao' => (object)array(
							'valor' => $r->data_criacao,
							'br' => Converter::data($r->data_criacao)
						),
						'pesquisador' => $Equipe->buscar($r->pesquisador),
						'atendimento' => $Equipe->buscar($r->atendimento),
						'status' => $r->status
					);
				endforeach;
				return $array;
			endif;
		}

		public function buscar($where = null){
			$empresa = (isset($where) && !empty($where)) ? " AND `empresa` = ".$_SESSION['EMPRESA'] : "`empresa` = ".$_SESSION['EMPRESA'];
			$lista = $this->montar($this->read($where.$empresa));
			return $lista;
		}

		public function lista($where = null, $order = null){
			$lista = $this->montar($this->read($where, $order));
			$total = count($this->read($where));
			return (object)array(
				'lista' => $lista,
				'total_busca' => $total
			);
		}

		public function cadastrar($dados){
			$insert = $this->insert($dados);
			return $insert;
		}

		public function p_read($where = null, $order = null, $pagina = 1, $limite = 30){
			if($this->logado()) return (object)array('lista' => '', 'pagina' => 0);

			// Pega a página e remove 1 e multiplica pelo limite
			$inicial = ($pagina-1)*$limite;
			// Cria o where
			$lista = $this->montar($this->read($where, $order, $inicial.', '.$limite));
			if($pagina == 1):
				$total = count($this->read($where));
				return (object)array(
					'lista' => $lista,
					'pagina' => ceil($total/$limite),
					'total_busca' => $total
				);
			else:
				return (object)array('lista' => $lista);
			endif;
		}

		public function p_excel($where = null, $order = null){
			// Verifica se o usuário tem permissão para usar esse método
			if(Auth::verificar('painel') == false) exit();
			$equipe = $_SESSION['EQUIPE'];
			if(!in_array('per_captacao', $equipe->permissao)) exit();

			$Equipe = new EquipeModel;


			$lista = $this->montar($this->read($where, $order));
			if($_SESSION['EQUIPE']->equipe == 2):
				$array[] = array(
					'Nome',
					'Equipe'
				);
			else:
				$array[] = array(
					'Nome',
					'Telefone fixo',
					'Telefone celular',
					'Ação',
					'Idade',
					'E-mail',
					'Cidade',
					'Turno em que estuda',
					'Nome do responsavel',
					'Parentesco',
					'telefone do responsável',
					'Data de retorno',
					'Data agendamento',
					'Data de criação',
					'Equipe',
					'Status',
			);
			endif;
			if($lista):
				foreach($lista as $r):
					if($_SESSION['EQUIPE']->equipe == 2):
						$pesquisador = (isset($r->pesquisador) && !empty($r->pesquisador)) ? $r->pesquisador : '';
						$nome_equipe = (isset($r->pesquisador->id) && !empty($r->pesquisador->id)) ? $Equipe->nome($pesquisador->id) : '';

						$array[] = array(
							$r->nome,
							$r->data_criacao->br,
							$nome_equipe,
						);
					else:
						$equipe_nome = (isset($r->equipe->nome) && !empty($r->equipe->nome)) ? $r->equipe->nome : '';
						$array[] = array(
							$r->nome,
							$r->contato->telefone->fixo,
							$r->contato->telefone->celular,
							$r->acao->nome,
							$r->idade,
							$r->contato->email,
							$r->cidade,
							$r->turno->nome,
							$r->responsavel->nome,
							$r->responsavel->parentesco->nome,
							$r->responsavel->telefone,
							$r->data_contato->br,
							$r->data_agendamento->br,
							$r->data_criacao->br,
							$equipe_nome,
							$r->status->nome
						);
					endif;
				endforeach;
			endif;
			return $array;
		}
	}
