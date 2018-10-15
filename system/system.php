<?php
	class System {

		private $_url;
		private $_explodeStart;
		private $_explode;
		public $_controller;
		public $_action;
		public $_params;

		public function __construct(){
			$this->setUrl();
			$this->setExplode();
			$this->setController();
			$this->setAction();
			$this->setParams();
		}

		private function setUrl(){
			$this->_url = (isset($_GET['url']) ? $_GET['url'] : "index/index");
		}

		private function setExplode(){
			$this->_explodeStart = explode("/", $this->_url);
			$this->_explode = explode("/", $this->_url);
		}

		private function setController(){
			$this->_controller = $this->_explode[0].'Controller';
		}

		private function setAction(){
			$this->_action = (!isset($this->_explode[1]) || empty($this->_explode[1])) ? "index" : $this->_explode[1];
		}

		private function setParams(){
			unset($this->_explode[0], $this->_explode[1]);

			if(end($this->_explode) == null) array_pop($this->_explode);

			$ind = array();
			$value = array();
			$i = 0;
			if(!empty($this->_explode)):
				foreach($this->_explode as $val):
					if($i % 2 == 0) $ind[] = $val;
					else $value[] = $val;
					$i++;
				endforeach;
			endif;

			if(count($ind) == count($value) && !empty($ind) && !empty($value)) $this->_params = array_combine($ind, $value);
			else $this->_params = array();
		}

		public function getSep($number = null){
			if(isset($this->_explodeStart[$number])) return $this->_explodeStart[$number];
			else return false;
		}

		public function getPar($name = null){
			if($name != null && isset($this->_params[$name])) return $this->_params[$name];
			else return false;
		}

		protected function pagina_erro(){
			$pagina = '404_html';
			if(strstr($this->_url, '.')):
				$ext = explode('.', $this->_url);
				$ext = mb_strtolower(end($ext), 'UTF-8');
				if(in_array($ext, array('png', 'gif', 'jpg', 'jpeg', 'svg'))) $pagina = '404_imagem';
				elseif($ext == 'mp3') $pagina = '404_musica';
				elseif(in_array($ext, array('rar', 'zip'))) $pagina = '404_zip';
				elseif(strlen($ext) == 3 || strlen($ext) == 4) $pagina = '404_arquivo';
			endif;
			include('system/.erro/'.$pagina.'.php');
			exit();
		}

		public function run(){
			$controller_path = CONTROLLERS.$this->_controller.'.php';

			if(substr(str_replace(' ', '+', $this->_controller), 0, 1) == '+' && file_exists(CONTROLLERS.'perfilController.php')):
				require_once(CONTROLLERS.'perfilController.php');
				$this->_controller = 'perfilController';
				$app = new $this->_controller();
			elseif(!file_exists($controller_path) && file_exists(CONTROLLERS.'erroController.php')):
				$_SERVER['REDIRECT_STATUS'] = 404;
				require_once(CONTROLLERS . "erroController.php");
				$this->_controller = 'erroController';
				$app = new $this->_controller();
			elseif(!file_exists($controller_path) && !file_exists(CONTROLLERS.'erroController.php')):
				$this->pagina_erro();
			else:
				require_once($controller_path);
				$app = new $this->_controller();
			endif;

			if(!method_exists($app, $this->_action) && method_exists($app, 'detalhe')):
				$app = new $this->_controller();
				$app->init();
				$app->detalhe();
			elseif(!method_exists($app, $this->_action) && file_exists(CONTROLLERS.'erroController.php')):
				require_once(CONTROLLERS . "erroController.php");
				$app = new erroController();
				$app->index();
			elseif(!method_exists($app, $this->_action) && !file_exists(CONTROLLERS.'erroController.php')):
				$this->pagina_erro();
			else:
				$action = $this->_action;
				$app->init();
				$app->$action();
			endif;
		}

	}
