<?php
	class Menu {

		public static function normal($titulo, $controller, $hover, $alerta = null, $icone, $cor){
            $equipe = $_SESSION['EQUIPE'];
			$alerta = ($alerta > 0) ? '<span class="alerta">'.$alerta.'</span>' : '';
			if(in_array('per_'.$controller, $equipe->permissao) || $equipe->desenvolvedor == 1) echo '<li><a href="'.PARCEIRO.'/app/'.$controller.'" data-app="true"><span class="bg" style="background-color:'.$cor.'"></span><i class="icone" data-font="'.$icone.'"></i><span class="menu_titulo">'.$titulo.'</span>'.$alerta.'</a></li>';
		}

		public static function lista($titulo, $hover, $alerta = null, $icone, $cor, $lista){
            $equipe = $_SESSION['EQUIPE'];
			$alerta = ($alerta > 0) ? '<span class="alerta">'.$alerta.'</span>' : '';
			if($lista):
				$ul = 'hide';
				$li = 'class="blocos"';
				$array = array();
				foreach($lista as $r):
					if(in_array('per_'.$r[1], $equipe->permissao) || $equipe->desenvolvedor == 1) $array[] = $r;
					if($r[1] == $hover):
						$ul = 'show';
						$li = 'class="aberto"';
					endif;
				endforeach;
				if(count($array) == 1):
					echo '<li class="blocos equipe"><a href="'.PAINEL.'/app/'.$array[0][1].'" data-app="true"><i data-font="'.$icone.'"></i><p class="texto">'.$array[0][0].'</p>'.$alerta.'</a></li>';
				elseif(count($array) > 1):
					echo '<li class="blocos cadastros" '.$li.'>';
					echo '<a href="#'.$titulo.'"><i  data-font="'.$icone.'"></i><p class="texto">'.$titulo.'</p>'.$alerta.'<i class="arrow" data-font="&#xe814;"></i></a>';
					echo '<ul class="'.$ul.'">';
					foreach($array as $r):
						$r_alerta = ($r[2] > 0) ? '<span class="alerta">'.$r[2].'</span>' : '';
						echo '<li><a href="'.PAINEL.'/app/'.$r[1].'" data-app="true">'.$r[0].$r_alerta.'</a></li>';
					endforeach;
					echo '</ul>';
					echo '</li>';
				endif;
			endif;
		}

	}
