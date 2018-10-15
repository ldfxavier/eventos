<?php
	class Controller extends System {

		/**
		 * PEGA OS INCLUDES E TRANSFORMA EM STRING
		 * @var $arquivo 	string 	URL do view
		 * @var $template 	string 	URL do template
		 * @var $var		array 	Array com as variáveis
		 */
		private function converter($arquivo, $template = null, $var = null){
			// Transoforma o array em variáveis
			if(is_array($var) && count($var) > 0) extract($var, EXTR_PREFIX_ALL, "");

			// Transforma a view em string
			ob_start();
			include($arquivo);
			$arquivo = ob_get_contents();
			ob_end_clean();

			// Se existe o template, transoforma ele em string
			if($template != null):
				ob_start();
				include($template);
				$template = ob_get_contents();
				ob_end_clean();

				// Joga a view dentro do template
				$arquivo = str_replace('[[VIEW]]', $arquivo, $template);
			endif;

			// Subistitui os {{}} pelo echo do PHP
			$ini = array('{{"', '"}}', '{{', '}}', '&#123;&#123;"', '"&#125;&#125;');
			$fin = array('&#123;&#123;"', '"&#125;&#125;', "<?php echo ", " ?>", '{{"', '"}}');
			$arquivo = str_replace($ini, $fin, $arquivo);

			// Retorna o HTML
			return eval('?>'.$arquivo);
		}

		/**
		 * MÉTODO PARA CHAMAR A VIEW
		 * @var $nome 		string 	Nome do arquivo da view
		 * @var $var 		Array	Array com lista de variáveis
		 * @var $template 	string 	Nome do template se precisar passar
		 */
		protected function view($nome, $var = null, $template = null){
			$view = str_replace(array('.', '!'), array('/', ''), $nome);
			$arquivo = VIEWS.$view.".php";

			if(!strstr($nome, '!') || !empty($template)):
				$explode = explode('/', $view);
				if(empty($template) && count($explode) > 1) $template = $explode[0];
				elseif(empty($template) && count($explode <= 1)) $template = 'padrao';

				$template = TEMPLETES.$template.'.php';
				if(!file_exists($template)) $template = TEMPLETES.'padrao.php';
			endif;

			if((!empty($template) && !file_exists($template)) || !file_exists($arquivo)):
				$this->erro();
			else:
				echo $this->converter($arquivo, $template, $var);
			endif;
		}

		/**
		 * MÉTODO INICIAL DE TODA CLASS
		 */
		public function init(){}

		/**
		 * MÉTODO DE ERRO QUANDO A PÁGINA NÃO EXISTIR
		 */
		public function erro(){
			$_SERVER['REDIRECT_STATUS'] = 404;
			if(file_exists(CONTROLLERS.'/erroController.php')):
				include(CONTROLLERS.'/erroController.php');
				$erro = new erroController();
				$erro->index();
				exit();
			else:
				$this->pagina_erro();
			endif;
		}
	}
