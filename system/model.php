<?php
	abstract class Model {

		protected $db;
		public $_tabela;
		private $_inicial = array(' at row 1', 'Incorrect decimal value:', 'for column', 'Column', 'cannot be null');
		private $_final = array('.', 'Incorreto valor decimal', 'na coluna', 'Coluna', 'não pode ser nula');

		/**
		 * SETA O PDO
		 */
		public function __construct(){
			 $this->db = new PDO('mysql:host='.PDOHOST.';dbname='.PDOBANCO, PDOUSUARIO, PDOSENHA);
		}

		/**
		 * RETORNA OS DADOS DO INSERT E UPDATE
		 * @var $dados		object 				Dados recebidos do banco
		 * @var $retorno	booleano			Escolhe entre retorno em jSon ou Object
		 * @return			object/booleano		retorna os dados
		 */
		private function retorno($dado, $retorno = false){
			if($retorno == false) return json_encode($dado);
			else return $dado;
		}

		/**
		 * BUSCA LIVRE
		 * @var $query 	string 	String com os dados para a query
		 * @return		object	Retorno do banco de dados
		 */
		protected function query($query = ''){
			$query = $this->db->query($query);
			$query->setFetchMode(PDO::FETCH_OBJ);

			return $query->fetchAll();
		}

		/**
		 * BUSCA PADRÃO NO BANCO DE DADOS
		 * @var $where 	string 	Dados do WHERE
		 * @var $order 	string 	Dados do ORDER
		 * @var $limit 	string 	Dados do LIMIT
		 * @var $group 	string 	Dados do GROUP
		 * @return 		object	Retorno do Banco de dados
		 */
		protected function read($where = null, $order = null, $limit = null){
			$where = ($where != null ? "WHERE {$where}" : "");
			$order = ($order != null ? "ORDER BY {$order}" : "");
			$limit = ($limit != null ? "LIMIT {$limit}" : "");

			$query = $this->db->query("SELECT * FROM `{$this->_tabela}` {$where} {$order} {$limit}");
			$query->setFetchMode(PDO::FETCH_OBJ);

			return $query->fetchAll();
		}
		protected function contar($where = null, $echo = false){
			$where = ($where != null ? "WHERE {$where}" : "");
			if($echo) echo $where.'<br>';

			$query = $this->db->query("SELECT `id` FROM `{$this->_tabela}` {$where}");
			$query->setFetchMode(PDO::FETCH_OBJ);
			return $query->rowCount(PDO::FETCH_OBJ);
		}

		/**
		 * INSERIR DADOS NO BANCO DE DADOS
		 * @var $dados 		array 			Dados para inserir no banco de dados
		 * @var $return 	booleano		false para retorno em json e true para object
		 * @return 			object/json		Resposta do banco de dados
		 */
		protected function insert(Array $dados, $retorno = false){
			// Pega as colunas da tabela
			$coluna = $this->coluna();
			// Valida campos
			$dados = $this->validar($dados, $coluna);
			// Verifica se houve erro
			if(isset($dados['erro']) && $dados['erro'] == true) return $this->retorno($dados, $retorno);
			// Cria os valores para o sql
			foreach($coluna as $r) $campos_ini[] = $r->campo;
			$campos = "`".implode("`, `", $campos_ini)."`";
			$valores = ":".implode(", :", $campos_ini);

			// Cria a query
			$sql = $this->db->prepare("INSERT INTO `{$this->_tabela}` ({$campos}) VALUES ({$valores})");
			// Passa os valores para a query
			foreach($coluna as $r):
				$null = null;
				if(!isset($dados[$r->campo]) || (!is_numeric($dados[$r->campo]) && empty($dados[$r->campo]))) $sql->bindParam(":{$r->campo}", $null, PDO::PARAM_NULL);
				elseif(($r->tipo == 'int' || $r->tipo == 'bigint') && is_numeric($dados[$r->campo])) $sql->bindParam(":{$r->campo}", $dados[$r->campo], PDO::PARAM_INT);
				else $sql->bindParam(":{$r->campo}", $dados[$r->campo]);
			endforeach;

			// Executa a query
			$insert = $sql->execute();

			// Verifica se foi inserido
			if($insert):
				return $this->retorno(array('erro' => false, 'id' => $this->db->lastInsertId()), $retorno);
			else:
				$erro = $sql->errorInfo();
				return $this->retorno(array('erro' => true, 'titulo' => 'Erro ao salvar!', 'texto' => isset($erro[2]) ? str_replace($this->_inicial, $this->_final, $erro[2]) : 'Tente novamente.'), $retorno);
			endif;
		}

		/**
		 * ATUALIZA DADOS NO BANCO DE DADOS
		 * @var $dados 		array 			Dados para atualizar no banco de dados
		 * @var $where 		string 			Where do update
		 * @var $return 	booleano		false para retorno em json e true para object
		 * @return 			object/json		Resposta do banco de dados
		 */
		protected function update(Array $dados, $where, $retorno = false){
			// Pega as colunas da tabela
			$coluna = $this->coluna();
			// Valida campos
			$dados = $this->validar($dados, $coluna, $where);
			// Verifica se houve erro
			if(isset($dados['erro']) && $dados['erro'] == true) return $this->retorno($dados, $retorno);
			// Cria os valores para o sql
			foreach($dados as $ind => $val) $campos[] = "`".$ind."` = :".$ind;
			$campos = implode(", ", $campos);
			// Cria a query
			$sql = $this->db->prepare("UPDATE `{$this->_tabela}` SET {$campos} WHERE {$where}");
			// Passa os valores para a query
			foreach($dados as $ind => $valor):
				$null = null;
				if(empty($dados[$ind])) $sql->bindParam(":{$ind}", $null, PDO::PARAM_NULL);
				elseif($coluna[$ind]->tipo == 'int' || $coluna[$ind]->tipo == 'bigint') $sql->bindParam(":{$ind}", $dados[$ind], PDO::PARAM_INT);
				else $sql->bindParam(":{$ind}", $dados[$ind]);
			endforeach;
			// Executa a query
			$update = $sql->execute();
			// Verifica se foi inserido
			if($update):
				return $this->retorno(array('erro' => false), $retorno);
			else:
				$erro = $sql->errorInfo();
				return $this->retorno(array('erro' => true, 'titulo' => 'Erro ao atualizar!', 'texto' => isset($erro[2]) ? $erro[2] : 'Tente novamente.'), $retorno);
			endif;
		}

		/**
		 * DELETA OS DADOS DO BANCO DE DADOS
		 * @var $where 		string 			WHERE para a exclusão
		 * @var $return 	booleano		false para retorno em json e true para object
		 * @return 			object/json		Resposta do banco de dados
		 */
		protected function delete($campo, $valor, $retorno = false){
			$sql = $this->db->prepare("DELETE FROM `{$this->_tabela}` WHERE {$campo} = :{$campo}");
			$sql->bindParam(':'.$campo, $valor);
			$delete = $sql->execute();

			if($delete):
				return $this->retorno(array('erro' => false), $retorno);
			else:
				$erro = $sql->errorInfo();
				return $this->retorno(array('erro' => true, 'titulo' => 'Erro ao deletar!', 'texto' => isset($erro[2]) ? $erro[2] : 'Tente novamente.'), $retorno);
			endif;
		}

		/**
		 * PEGA OS DADOS DA COLUNA NO BANCO DE DADOS
		 * @return 	object	Dados tratados do banco de dados
		 */
		protected function coluna(){
			$query = $this->db->query("SHOW FULL COLUMNS FROM `{$this->_tabela}`");
			$query->setFetchMode(PDO::FETCH_OBJ);
			$lista = $query->fetchAll();
			$array = array();
			foreach($lista as $r):
				$validar = array();
				if(mb_detect_encoding($r->Comment) == 'UTF-8'):
					$titulo = utf8_encode($r->Comment);
            	else:
					$titulo = $r->Comment;
				endif;
				if(!empty($titulo) && strstr($titulo, '->')):
					$explode = explode('->', $titulo);
					$titulo = array_pop($explode);
					foreach($explode as $var) $validar[] = $var;
				endif;
				$tipo = $r->Type;
				$tamanho = false;
				if(!empty($r->Type) && strstr($r->Type, '(')):
					$explode = explode('(', $r->Type);
					$tipo = $explode[0];
					$tamanho = preg_replace("/[^0-9]/", "", $explode[1]);
				endif;

				$array[$r->Field] = (object)array(
					'campo' => $r->Field,
					'tipo' => $tipo,
					'tamanho' => $tamanho,
					'obrigatorio' => ($r->Null == 'YES') ? false : true,
					'padrao' => $r->Default,
					'validar' => $validar,
					'titulo' => $titulo
				);
			endforeach;
			return $array;
		}

		/**
		 * VALIDAÇÃO DOS DADOS
		 * @var $dados 		object	Dados para validação
		 * @var $coluna		object	Dados da coluna da tabela
		 * @return 			array 	Array com erro ou liberação dos dados
		 */
		private function validar($dados, $coluna, $where = ''){
			foreach($dados as $ind => $valor):
				if(!isset($coluna[$ind])):
					return array(
						'erro' => true,
						'titulo' => 'Erro no banco!',
						'texto' => 'A coluna '.$ind.' não existe no banco de dados.'
					);
				endif;

				$titulo = $coluna[$ind]->titulo;

				// CONVERTE OS DADOS
				if(!empty($valor) && ($coluna[$ind]->tipo == 'int' || $coluna[$ind]->tipo == 'bigint')) $valor = preg_replace("/[^0-9]/", "", $valor);
				elseif($coluna[$ind]->tipo == 'decimal' && !empty($valor)) $valor = Converter::decimal($valor);

				if($coluna[$ind]->obrigatorio == true && empty($valor)):
					return array(
						'erro' => true,
						'titulo' => 'Campo obrigatório!',
						'texto' => 'O campo '.$titulo.' é obrigatório.'
					);
				elseif($coluna[$ind]->obrigatorio == true && (($coluna[$ind]->tipo == 'date' && preg_replace("/[^0-9]/", "", $valor) == '00000000') || ($coluna[$ind]->tipo == 'datetime' && preg_replace("/[^0-9]/", "", $valor) == '00000000000000') || ($coluna[$ind]->tipo == 'time' && preg_replace("/[^0-9]/", "", $valor) == '000000'))):
					return array(
						'erro' => true,
						'titulo' => 'Campo obrigatório!',
						'texto' => 'O campo '.$titulo.' é obrigatório.'
					);
				elseif(is_numeric($coluna[$ind]->tamanho) && $coluna[$ind]->tamanho > 0 && strlen($valor) > $coluna[$ind]->tamanho):
					$diferenca = strlen($valor)-$coluna[$ind]->tamanho;
					return array(
						'erro' => true,
						'titulo' => 'Tamanho maior que o permitido!',
						'texto' => 'O campo '.$titulo.' tem '.$diferenca.' caracteres a mais que o permitido.'
					);
				elseif(!empty($valor) && ($coluna[$ind]->tipo == 'int' || $coluna[$ind]->tipo == 'bigint') && !Validar::int($valor, null, true)):
					return array(
						'erro' => true,
						'titulo' => 'Formato incorreto!',
						'texto' => 'O campo '.$titulo.' não é um número inteiro.'
					);
				elseif($coluna[$ind]->validar && in_array('cep', $coluna[$ind]->validar) && !empty($valor) && !Validar::cep($valor, null, true)):
						return array(
							'erro' => true,
							'titulo' => 'Formato incorreto!',
							'texto' => 'O campo '.$titulo.' não é um CEP válido.'
						);
				elseif($coluna[$ind]->validar && in_array('json', $coluna[$ind]->validar) && !empty($valor) && !is_array($valor)):
					return array(
						'erro' => true,
						'titulo' => 'Formato incorreto!',
						'texto' => 'O campo '.$titulo.' não é uma string json.'
					);
				elseif($coluna[$ind]->validar && in_array('cpf', $coluna[$ind]->validar) && !empty($valor) && !Validar::documento($valor, null, 'cpf', true)):
					return array(
						'erro' => true,
						'titulo' => 'Formato incorreto!',
						'texto' => 'O campo '.$titulo.' não é um CPF válido.'
					);
				elseif($coluna[$ind]->validar && in_array('cnpj', $coluna[$ind]->validar) && !empty($valor) && !Validar::documento($valor, null, 'cnpj', true)):
					return array(
						'erro' => true,
						'titulo' => 'Formato incorreto!',
						'texto' => 'O campo '.$titulo.' não é um CNPJ válido.'
					);
				elseif($coluna[$ind]->validar && in_array('documento', $coluna[$ind]->validar) && !empty($valor) && !Validar::documento($valor, null, 'auto', true)):
					return array(
						'erro' => true,
						'titulo' => 'Formato incorreto!',
						'texto' => 'O campo '.$titulo.' não é um documento válido.'
					);
				elseif($coluna[$ind]->validar && in_array('telefone', $coluna[$ind]->validar) && !empty($valor) && !Validar::telefone($valor, null, true)):
					return array(
						'erro' => true,
						'titulo' => 'Formato incorreto!',
						'texto' => 'O campo '.$titulo.' não é um telefone válido.'
					);
				elseif($coluna[$ind]->validar && in_array('email', $coluna[$ind]->validar) && !empty($valor) && !Validar::email($valor, null, true)):
					return array(
						'erro' => true,
						'titulo' => 'Formato incorreto!',
						'texto' => 'O campo '.$titulo.' não é um e-mail válido.'
					);
				elseif($coluna[$ind]->tipo == 'time' && !empty($valor) && !Validar::hora($valor, null, true)):
					return array(
						'erro' => true,
						'titulo' => 'Campo incorreto!',
						'texto' => 'O campo '.$titulo.' não está em um formato válido.'
					);
				elseif($coluna[$ind]->tipo == 'date' && !empty($valor) && preg_replace("/[^0-9]/", "", $valor) != '00000000' && !Validar::data($valor, null, null, true)):
					return array(
						'erro' => true,
						'titulo' => 'Campo incorreto!',
						'texto' => 'O campo '.$titulo.' não está no formato 00/00/0000.'
					);
				elseif($coluna[$ind]->tipo == 'datetime' && !empty($valor) && preg_replace("/[^0-9]/", "", $valor) != '00000000000000' && !Validar::datahora($valor, null, null, true)):
					return array(
						'erro' => true,
						'titulo' => 'Campo incorreto!',
						'texto' => 'O campo '.$titulo.' não está no formato 00/00/0000 00:00:00.'
					);
				elseif($coluna[$ind]->tipo == 'time' && !empty($valor) && preg_replace("/[^0-9]/", "", $valor) != '000000' && !Validar::hora($valor, null, true)):
					return array(
						'erro' => true,
						'titulo' => 'Campo incorreto!',
						'texto' => 'O campo '.$titulo.' não está no formato 00:00.'
					);
				elseif($coluna[$ind]->tipo == 'decimal' && !empty($valor) && !Validar::decimal($valor, null, true)):
					return array(
						'erro' => true,
						'titulo' => 'Campo incorreto!',
						'texto' => 'O campo '.$titulo.' não está em um formato válido.'
					);
				endif;

				if($coluna[$ind]->validar && in_array('unico', $coluna[$ind]->validar)):
					$unico_explode = array_filter(explode('|', $coluna[$ind]->validar[1]));
					$unico_array = array("`{$coluna[$ind]->campo}` = '{$valor}'");
					if(!empty($where)) $unico_array[] = str_replace('=', '!=', $where);
					foreach($unico_explode as $unico_campo) $unico_array[] = "`".$unico_campo."` = '".$dados[$unico_campo]."'";

					$unico_where = implode(" AND ", $unico_array);
					if($this->contar($unico_where) > 0):
						return array(
							'erro' => true,
							'titulo' => 'Campo duplicado!',
							'texto' => 'O campo '.$titulo.' já está cadastrado.'
						);
					endif;
				endif;

				// CONVERTE OS DADOS
				if($coluna[$ind]->tipo == 'date' && !empty($valor)) $valor = Converter::data($valor, 'Y-m-d');
				elseif($coluna[$ind]->tipo == 'datetime' && !empty($valor)) $valor = Converter::data($valor, 'Y-m-d H:i:s');
				elseif($coluna[$ind]->tipo == 'time' && !empty($valor)) $valor = Converter::data($valor, 'H:i:s');
				elseif(in_array('json', $coluna[$ind]->validar) && is_array($valor)) $valor = json_encode($valor);
				// PASSA O VALOR PARA O INDICE
				$dados[$ind] = $valor;
			endforeach;
			return $dados;
		}
	}
