<?php
	final class Lista {
		/**
		 * GERA LISTA DE ESTADOS
		 * @var $titulo array   Array para ser implementado no começo do retorno
		 * @var $sigla  bollean True para apenas siglas
		 * @return	  array   Array com os estados
		 */
		public static function estado($titulo = null, $sigla = false){
			$uf = array();

			if($titulo != null) foreach($titulo as $ind => $val) $uf[$ind] = $val;
			$lista_nome = array("ac"=>"Acre", "al"=>"Alagoas", "am"=>"Amazonas", "ap"=>"Amapá","ba"=>"Bahia","ce"=>"Ceará","df"=>"Distrito Federal","es"=>"Espírito Santo","go"=>"Goiás","ma"=>"Maranhão", "mt"=>"Mato Grosso","ms"=>"Mato Grosso do Sul","mg"=>"Minas Gerais","pa"=>"Pará","pb"=>"Paraíba","pr"=>"Paraná","pe"=>"Pernambuco","pi"=>"Piauí","rj"=>"Rio de Janeiro","rn"=>"Rio Grande do Norte","ro"=>"Rondônia","rs"=>"Rio Grande do Sul","rr"=>"Roraima","sc"=>"Santa Catarina","se"=>"Sergipe","sp"=>"São Paulo","to"=>"Tocantins");
			$lista_sigla = array("ac"=>"AC", "al"=>"AL", "am"=>"AM", "ap"=>"AP","ba"=>"BA","ce"=>"CE","df"=>"DF","es"=>"ES","go"=>"GO","ma"=>"MA", "mt"=>"MT","ms"=>"MS","mg"=>"MG","pa"=>"PA","pb"=>"PB","pr"=>"PR","pe"=>"PE","pi"=>"PI","rj"=>"RJ","rn"=>"RN","ro"=>"RO","rs"=>"RS","rr"=>"RR","sc"=>"SC","se"=>"SE","sp"=>"SP","to"=>"TO");

			$lista = ($sigla == true) ? $lista_sigla : $lista_nome;
			foreach($lista as $ind => $val) $uf[$ind] = $val;

			return $uf;
		}

		/**
		 * GERA LISTA DE PERMISSÕES PARA O PAINEL DO SISTEMA
		 * @return  Array   Array com as permissões do sistema
		 */
		public static function permissao(){
			$array = array(
				'per_usuario_equipe' => 'Equipe',
				'per_usuario_equipe_add' => 'Equipe / Add',
				'per_usuario_equipe_edit' => 'Equipe / Editar',
				'per_usuario_equipe_del' => 'Equipe / Deletar',
				'per_captacao' => 'Captação',
				'per_captacao_add' => 'Captação / Add',
				'per_captacao_edit' => 'Captação / Editar',
				'per_captacao_del' => 'Captação / Deletar',
				'per_captacao_pesquisador' => 'Captação / Pesquisador',
				'per_captacao_atendimento' => 'Captação / Atendimento',
				'per_captacao_acao' => 'Captação / Ação',
				'per_acao' => 'Ação',
				'per_acao_add' => 'Ação / Add',
				'per_acao_edit' => 'Ação / Editar',
				'per_acao_del' => 'Ação / Deletar',
				'per_script' => 'Script',
				'per_script_add' => 'Script / Add',
				'per_script_edit' => 'Script / Editar',
				'per_script_del' => 'Script / Deletar'
			);

			asort($array);
			return $array;

		}

	}
