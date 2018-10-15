<?php
	class Status {
		private static $_lista = array(
				'captacao' => array(
					'status' => array(
						'1' => 'Novo',
						'2' => 'Agendado',
						'3' => 'Sem interesse',
						'4' => 'Retornar ligação',
						'9' => 'Não atende',
						'5' => 'Visita',
						'6' => 'Sem operador',
						'7' => 'Número inexistente',
						'8' => 'Matriculado',
						'10' => 'Recado',
						'11' => 'Ex aluno',
						'12' => 'Cadastro duplicado',
						'13' => 'Reagendamento',
						'14' => 'Aluno',
						'15' => 'Caixa postal',
						'16' => 'Ocupado',
						'17' => 'Numero errado',
						'18' => 'Não compareceu'
					),
					'parentesco' => array(
						'' => 'Selecione uma opção',
						'1' => 'Pai',
						'2' => 'Mãe',
						'3' => 'Outro'
					),
					'turno' => array(
						'' => 'Selecione uma opção',
						'1' => 'Manhã',
						'2' => 'Tarde',
						'3' => 'Noite',
						'4' => 'Não estuda',
						'5' => 'Integral'
					),
				),
				'equipe' => array(
					'equipe' => array(
						'1' => 'Usuário',
						'2' => 'Pesquisador',
						'3' => 'Operador',
						'4' => 'Atendimento',
						'5' => 'Recepção'
					)
				),
				'acao' => array(
					'status' => array(
						'1' => 'Ativo',
						'2' => 'Inativo'
					)
				),
				'script' => array(
					'status' => array(
						'2' => 'Inativo',
						'1' => 'Ativo'
					)
				)
			);

		public static function nome($tabela, $campo, $valor){
            if(isset(self::$_lista[$tabela][$campo][$valor])) return self::$_lista[$tabela][$campo][$valor];
            else return '';
        }

		public static function lista($tabela, $campo, $titulo = array()){
            $array = array();
            if($titulo) foreach($titulo as $ind => $val) $array[$ind] = $val;
            if(isset(self::$_lista[$tabela][$campo])) foreach(self::$_lista[$tabela][$campo] as $ind => $val) $array[$ind] = $val;
            return $array;
        }
}
