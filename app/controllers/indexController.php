<?php
	class IndexController extends Controller {

		public function index(){
            if(!Auth::verificar('site')):
                $this->view('!login.index');
            else:
    			$this->view('cadastro');
            endif;
		}
	}
