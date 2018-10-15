<?php
	class Relatorio {

		private function porcentagem($valor, $total){
			if($valor > 0 && $total > 0) return round(($valor*100) / $total, 2);
			else return 0;
		}

		public function dashboard($inicio = null, $final = null){
			$inicio = ($inicio == null) ? date('Y-m-1') : Converter::data($inicio, 'Y-m-d');
			$final = ($final == null) ? date('Y-m-d') : Converter::data($final, 'Y-m-d');

			$data = date('Y-m-d');
			$data_15 = Converter::dataadd($data, '15 days', 'Y-m-d');

			$inicio_mensal = ($inicio == null) ? date('Y-m-1') : Converter::data($inicio, 'Y-m-d');
			$final_mensal = ($final == null) ? date('Y-m-d') : Converter::data($final, 'Y-m-d');


			$where_busca = ($inicio != '' && $final != '') ? "`data_criacao` >= '".$inicio." 00:00:00' AND `data_criacao` <= '".$final." 23:59:59'" : '';
			$where_busca_agendamento = ($inicio != '' && $final != '') ? "`data_agendamento` >= '".$inicio." 00:00:00' AND `data_agendamento` <= '".$final." 23:59:59'" : '';
			$where_busca_atualizacao = ($inicio != '' && $final != '') ? "(`data_atualizacao` >= '".$inicio." 00:00:00' AND `data_atualizacao` <= '".$final." 23:59:59') OR (`data_criacao` >= '".$inicio." 00:00:00' AND `data_criacao` <= '".$final." 23:59:59')" : '';

			$Captacao = new CaptacaoModel;
			$operador = array();

			$dados = $Captacao->buscar($where_busca);
			$atualizacao = $Captacao->buscar($where_busca_atualizacao);

			// CAPTAÇÃO GERAL

			if($dados):
				foreach($dados as $r):
					if(isset($captacao['total'])):
						$captacao['total']++;
					else:
						$captacao['total'] = 1;
					endif;
					if(isset($captacao['novo']['valor']) && $r->status->valor == 1):
						$captacao['novo']['valor']++;
					elseif($r->status->valor == 1):
						$captacao['novo']['valor'] = 1;
					endif;
					if(isset($captacao['operador']['valor']) && $r->status->valor == 6):
						$captacao['operador']['valor']++;
					elseif($r->status->valor == 6):
						$captacao['operador']['valor'] = 1;
					endif;
					if(isset($captacao['agendado']['valor']) && $r->status->valor == 2):
						$captacao['agendado']['valor']++;
					elseif($r->status->valor == 2):
						$captacao['agendado']['valor'] = 1;
					endif;
					if(isset($captacao['visita']['valor']) && $r->status->valor == 5):
						$captacao['visita']['valor']++;
					elseif($r->status->valor == 5):
						$captacao['visita']['valor'] = 1;
					endif;
					if(isset($captacao['sem_interesse']['valor']) && $r->status->valor == 3):
						$captacao['sem_interesse']['valor']++;
					elseif($r->status->valor == 3):
						$captacao['sem_interesse']['valor'] = 1;
					endif;
					if(isset($captacao['retornar_ligacao']['valor']) && $r->status->valor == 4):
						$captacao['retornar_ligacao']['valor']++;
					elseif($r->status->valor == 4):
						$captacao['retornar_ligacao']['valor'] = 1;
					endif;
					if(isset($captacao['finalizado']['valor']) && $r->status->valor == 5):
						$captacao['finalizado']['valor']++;
					elseif($r->status->valor == 5):
						$captacao['finalizado']['valor'] = 1;
					endif;
					if(isset($captacao['numeroinexistente']['valor']) && $r->status->valor == 7):
						$captacao['numeroinexistente']['valor']++;
					elseif($r->status->valor == 7):
						$captacao['numeroinexistente']['valor'] = 1;
					endif;
					if(isset($captacao['matriculado']['valor']) && $r->status->valor == 8):
						$captacao['matriculado']['valor']++;
					elseif($r->status->valor == 8):
						$captacao['matriculado']['valor'] = 1;
					endif;
					if(isset($captacao['naoatende']['valor']) && $r->status->valor == 9):
						$captacao['naoatende']['valor']++;
					elseif($r->status->valor == 9):
						$captacao['naoatende']['valor'] = 1;
					endif;
					if(isset($captacao['recado']['valor']) && $r->status->valor == 10):
						$captacao['recado']['valor']++;
					elseif($r->status->valor == 10):
						$captacao['recado']['valor'] = 1;
					endif;
					if(isset($captacao['exaluno']['valor']) && $r->status->valor == 11):
						$captacao['exaluno']['valor']++;
					elseif($r->status->valor == 11):
						$captacao['exaluno']['valor'] = 1;
					endif;
					if(isset($captacao['cadastroduplicado']['valor']) && $r->status->valor == 12):
						$captacao['cadastroduplicado']['valor']++;
					elseif($r->status->valor == 12):
						$captacao['cadastroduplicado']['valor'] = 1;
					endif;
					if(isset($captacao['reagendamento']['valor']) && $r->status->valor == 13):
						$captacao['reagendamento']['valor']++;
					elseif($r->status->valor == 13):
						$captacao['reagendamento']['valor'] = 1;
					endif;
					if(isset($captacao['aluno']['valor']) && $r->status->valor == 14):
						$captacao['aluno']['valor']++;
					elseif($r->status->valor == 14):
						$captacao['aluno']['valor'] = 1;
					endif;
					if(isset($captacao['caixapostal']['valor']) && $r->status->valor == 15):
						$captacao['caixapostal']['valor']++;
					elseif($r->status->valor == 15):
						$captacao['caixapostal']['valor'] = 1;
					endif;
					if(isset($captacao['ocupado']['valor']) && $r->status->valor == 16):
						$captacao['ocupado']['valor']++;
					elseif($r->status->valor == 16):
						$captacao['ocupado']['valor'] = 1;
					endif;
					if(isset($captacao['numeroerrado']['valor']) && $r->status->valor == 17):
						$captacao['numeroerrado']['valor']++;
					elseif($r->status->valor == 17):
						$captacao['numeroerrado']['valor'] = 1;
					endif;
				endforeach;

				if(isset($captacao['novo']['valor']) && isset($captacao['total'])):
					$captacao['novo']['porcentagem'] = $this->porcentagem($captacao['novo']['valor'], $captacao['total']);
				endif;
				if(isset($captacao['operador']['valor']) && isset($captacao['total'])):
					$captacao['operador']['porcentagem'] = $this->porcentagem($captacao['operador']['valor'], $captacao['total']);
				endif;
				if(isset($captacao['agendado']['valor']) && isset($captacao['total'])):
					$captacao['agendado']['porcentagem'] = $this->porcentagem($captacao['agendado']['valor'], $captacao['total']);
				endif;
				if(isset($captacao['sem_interesse']['valor']) && isset($captacao['total'])):
					$captacao['sem_interesse']['porcentagem'] = $this->porcentagem($captacao['sem_interesse']['valor'], $captacao['total']);
				endif;
				if(isset($captacao['retornar_ligacao']['valor']) && isset($captacao['total'])):
					$captacao['retornar_ligacao']['porcentagem'] = $this->porcentagem($captacao['retornar_ligacao']['valor'], $captacao['total']);
				endif;
				if(isset($captacao['finalizado']['valor']) && isset($captacao['total'])):
					$captacao['finalizado']['porcentagem'] = $this->porcentagem($captacao['finalizado']['valor'], $captacao['total']);
				endif;
				if(isset($captacao['numeroinexistente']['valor']) && isset($captacao['total'])):
					$captacao['numeroinexistente']['porcentagem'] = $this->porcentagem($captacao['numeroinexistente']['valor'], $captacao['total']);
				endif;
				if(isset($captacao['matriculado']['valor']) && isset($captacao['total'])):
					$captacao['matriculado']['porcentagem'] = $this->porcentagem($captacao['matriculado']['valor'], $captacao['total']);
				endif;
				if(isset($captacao['naoatende']['valor']) && isset($captacao['total'])):
					$captacao['naoatende']['porcentagem'] = $this->porcentagem($captacao['naoatende']['valor'], $captacao['total']);
				endif;
				if(isset($captacao['recado']['valor']) && isset($captacao['total'])):
					$captacao['recado']['porcentagem'] = $this->porcentagem($captacao['recado']['valor'], $captacao['total']);
				endif;
				if(isset($captacao['exaluno']['valor']) && isset($captacao['total'])):
					$captacao['exaluno']['porcentagem'] = $this->porcentagem($captacao['exaluno']['valor'], $captacao['total']);
				endif;
				if(isset($captacao['cadastroduplicado']['valor']) && isset($captacao['total'])):
					$captacao['cadastroduplicado']['porcentagem'] = $this->porcentagem($captacao['cadastroduplicado']['valor'], $captacao['total']);
				endif;
				if(isset($captacao['reagendamento']['valor']) && isset($captacao['total'])):
					$captacao['reagendamento']['porcentagem'] = $this->porcentagem($captacao['reagendamento']['valor'], $captacao['total']);
				endif;
				if(isset($captacao['aluno']['valor']) && isset($captacao['total'])):
					$captacao['aluno']['porcentagem'] = $this->porcentagem($captacao['aluno']['valor'], $captacao['total']);
				endif;
				if(isset($captacao['caixapostal']['valor']) && isset($captacao['total'])):
					$captacao['caixapostal']['porcentagem'] = $this->porcentagem($captacao['caixapostal']['valor'], $captacao['total']);
				endif;
				if(isset($captacao['ocupado']['valor']) && isset($captacao['total'])):
					$captacao['ocupado']['porcentagem'] = $this->porcentagem($captacao['ocupado']['valor'], $captacao['total']);
				endif;
				if(isset($captacao['numeroerrado']['valor']) && isset($captacao['total'])):
					$captacao['numeroerrado']['porcentagem'] = $this->porcentagem($captacao['numeroerrado']['valor'], $captacao['total']);
				endif;



				//CAPTACAO GRAFICO CADASTROS

				$intervalo = array();
				$intervalo_br = array();
				function diffData($d1, $d2, $sep='-'){
					$d1 = explode($sep, $d1);
					$d2 = explode($sep, $d2);

				 	$X = 86400;
					return floor(((mktime(0, 0, 0, $d2[1], $d2[2], $d2[0])-mktime(0, 0, 0, $d1[1], $d1[2], $d1[0]))/$X));
				}

				$intervalo_dias = diffData($inicio_mensal, $final_mensal);

				for($i = 0; $i <= $intervalo_dias; $i++):
					$intervalo[] = Converter::dataadd($inicio_mensal, $i.'days', 'Y-m-d');
					$intervalo_br[] = Converter::dataadd($inicio_mensal, $i.'days', 'd/m/Y');
				endfor;

				$cadastros_busca = $Captacao->buscar("`status` = 2");
				$matriculados = $Captacao->buscar("`status` = 8");
				$cadastros_visita = $Captacao->buscar("`status` = 5");

				$cadastros_data = array();

				foreach($intervalo as $data_temp):
					$cadastros_data[$data_temp] = (object)array(
						'total' => 0,
						'data' => Converter::data($data_temp, 'd/m/Y')
					);
				endforeach;

				if($cadastros_busca):
					foreach($cadastros_busca as $r):
						$data = Converter::data($r->data_criacao->valor, 'Y-m-d');
						if(isset($cadastros_data[$data])):
							$cadastros_data[$data]->total++;
						endif;
					endforeach;
				endif;

				$cadastros_total = array(
					array('name' => 'total')
				);

				$v = 0;
				foreach($cadastros_data as $c_total):
					$cadastros_total[0]['data'][$v] = $c_total->total;
					$v++;
				endforeach;

				$cadastros_data_agendamento = array();
				$cadastros_data_matricula = array();
				$cadastros_data_visita = array();

				foreach($intervalo as $data_temp):
					$cadastros_data_agendamento[$data_temp] = (object)array(
						'total' => 0,
						'data' => Converter::data($data_temp, 'd/m/Y')
					);
					$cadastros_data_matricula[$data_temp] = (object)array(
						'total' => 0,
						'data' => Converter::data($data_temp, 'd/m/Y')
					);
					$cadastros_data_visita[$data_temp] = (object)array(
						'total' => 0,
						'data' => Converter::data($data_temp, 'd/m/Y')
					);
				endforeach;

				if($cadastros_busca):
					foreach($cadastros_busca as $r):
						$dataAgendamento = Converter::data($r->data_agendamento->valor, 'Y-m-d');
						if(isset($cadastros_data_agendamento[$dataAgendamento])):
							$cadastros_data_agendamento[$dataAgendamento]->total++;
						endif;
					endforeach;
				endif;

				if($matriculados):
					foreach($matriculados as $r):
						$dataMatricula = Converter::data($r->data_matricula->valor, 'Y-m-d');
						if(isset($cadastros_data_matricula[$dataMatricula])):
							$cadastros_data_matricula[$dataMatricula]->total++;
						endif;
					endforeach;
				endif;

				if($cadastros_visita):
					foreach($cadastros_visita as $r):
						if(isset($r->data_agendamento->valor) && !empty($r->data_agendamento->valor)):
							$dataVisita = Converter::data($r->data_agendamento->valor, 'Y-m-d');
							if(isset($cadastros_data_visita[$dataVisita])):
								$cadastros_data_visita[$dataVisita]->total++;
							endif;
						endif;
					endforeach;
				endif;

				$cadastros_captacao_total = array(
					array('name' => 'Agendamentos'),
					array('name' => 'Visitas'),
					array('name' => 'Matrículas'),
				);

				$a = 0;
				foreach($cadastros_data_agendamento as $a_total):
					$cadastros_captacao_total[0]['data'][$a] = $a_total->total;
					$a++;
				endforeach;

				$v = 0;
				foreach($cadastros_data_visita as $v_total):
					$cadastros_captacao_total[1]['data'][$v] = $v_total->total;
					$v++;
				endforeach;

				$m = 0;
				foreach($cadastros_data_matricula as $m_total):
					$cadastros_captacao_total[2]['data'][$m] = $m_total->total;
					$m++;
				endforeach;

			else:
				$captacao = false;
			endif;

			// $Agendamento = new AgendamentoModel;
			//
			// $agendamento = $Agendamento->buscar($where_busca_agendamento);
			//
			// if($agendamento):
			// 	$agendamentos = array();
			// 	foreach($agendamento as $agendamento_r):
			// 		if(isset($agendamento_r->equipe->id) && !empty($agendamento_r->equipe->id)):
			// 			$agendamentos[$agendamento_r->equipe->id]['nome'] = $agendamento_r->equipe->nome;
			// 			if(isset($agendamento_r->captacao[0]) && !isset($agendamento_dataId[$agendamento_r->equipe->id.$agendamento_r->captacao[0]->id][$agendamento_r->data_agendamento->valor])):
			// 				if($agendamento_r->status == 2):
			// 					if(isset($agendamentos[$agendamento_r->equipe->id]['agendamentos'])):
			// 						$agendamentos[$agendamento_r->equipe->id]['agendamentos'] += 1;
			// 					else:
			// 						$agendamentos[$agendamento_r->equipe->id]['agendamentos'] = 1;
			// 					endif;
			// 				elseif($agendamento_r->status == 5):
			// 					if(isset($agendamentos[$agendamento_r->equipe->id]['visitas'])):
			// 						$agendamentos[$agendamento_r->equipe->id]['visitas'] += 1;
			// 					else:
			// 						$agendamentos[$agendamento_r->equipe->id]['visitas'] = 1;
			// 					endif;
			// 				elseif($agendamento_r->status == 8):
			// 					if(isset($agendamentos[$agendamento_r->equipe->id]['matriculas'])):
			// 						$agendamentos[$agendamento_r->equipe->id]['matriculas'] += 1;
			// 					else:
			// 						$agendamentos[$agendamento_r->equipe->id]['matriculas'] = 1;
			// 					endif;
			// 				endif;
			// 			endif;
			// 		endif;
			// 	endforeach;
			// endif;

			$agendamento = $dados;

			if($agendamento):
				$agendamentos = array();
				foreach($agendamento as $agendamento_r):
					if(isset($agendamento_r->equipe->id) && !empty($agendamento_r->equipe->id)):
						$agendamentos[$agendamento_r->equipe->id]['nome'] = $agendamento_r->equipe->nome;
						if($agendamento_r->status->valor == 2):
							if(isset($agendamentos[$agendamento_r->equipe->id]['agendamentos'])):
								$agendamentos[$agendamento_r->equipe->id]['agendamentos'] += 1;
							else:
								$agendamentos[$agendamento_r->equipe->id]['agendamentos'] = 1;
							endif;
						elseif($agendamento_r->status->valor == 5):
							if(isset($agendamentos[$agendamento_r->equipe->id]['visitas'])):
								$agendamentos[$agendamento_r->equipe->id]['visitas'] += 1;
							else:
								$agendamentos[$agendamento_r->equipe->id]['visitas'] = 1;
							endif;
						elseif($agendamento_r->status->valor == 8):
							if(isset($agendamentos[$agendamento_r->equipe->id]['matriculas'])):
								$agendamentos[$agendamento_r->equipe->id]['matriculas'] += 1;
							else:
								$agendamentos[$agendamento_r->equipe->id]['matriculas'] = 1;
							endif;
						endif;
					endif;
				endforeach;
			endif;

			//CAPTAÇÃO OPERADOR
			if($atualizacao):
				$Equipe = new EquipeModel;

				foreach($atualizacao as $r):
					if(isset($r->equipe->id) && !empty($r->equipe->id)):
						$verificar_operador = $Equipe->operador($r->equipe->id);
						if(isset($verificar_operador)):
							$equipe = $Equipe->buscar($r->equipe->id);
							if(isset($operador[$r->equipe->id]) && !empty($r->equipe->id) && isset($equipe) && !empty($equipe)):
								$operador[$r->equipe->id]['total']++;
								if(isset($operador[$r->equipe->id][$r->status->valor])):
									$operador[$r->equipe->id][$r->status->valor]++;
								elseif(isset($r->status->valor) && !empty($r->status->valor)):
									$operador[$r->equipe->id][$r->status->valor] = 1;
								endif;
								if(isset($operador[$r->equipe->id]['ligacoes_atrasadas']) && $r->data_contato->valor < date('Y-m-d H:i:s') && !empty($r->data_contato->valor) && $r->status->valor == 4):
									$operador[$r->equipe->id]['ligacoes_atrasadas']++;

								elseif($r->data_contato->valor < date('Y-m-d H:i:s') && !empty($r->data_contato->valor) && $r->status->valor == 4):
									$operador[$r->equipe->id]['ligacoes_atrasadas'] = 1;
								endif;
							elseif(isset($r->equipe->id) && !empty($r->equipe->id) && isset($equipe) && !empty($equipe)):
								$operador[$r->equipe->id][$r->status->valor] = 1;
								$operador[$r->equipe->id]['total'] = 1;
								$operador[$r->equipe->id]['nome'] = (isset($equipe->nome)) ? $equipe->nome : '';
								$operador[$r->equipe->id]['ligacoes_atrasadas'] = 0;
							endif;
						endif;
					endif;

					// CAPTAÇÃO POR PESQUISADOR

					if(isset($r->pesquisador->id) && !empty($r->pesquisador->id)):
						if(isset($pesquisador[$r->pesquisador->id]['nome']) && !empty($pesquisador[$r->pesquisador->id]['nome'])):
							$pesquisador[$r->pesquisador->id]['cadastros']++;
						else:
							$pesquisador[$r->pesquisador->id]['nome'] = $r->pesquisador->nome;
							$pesquisador[$r->pesquisador->id]['cadastros'] = 1;
						endif;
					endif;

					// CAPTAÇÃO POR AÇÃO

					if(isset($r->acao->valor) && !empty($r->acao->valor)):
						if(isset($acao[$r->acao->valor]['nome']) && !empty($acao[$r->acao->valor]['nome'])):
							$acao[$r->acao->valor]['cadastros']++;
							if(isset($acao[$r->acao->valor]['matriculas']) && !empty($acao[$r->acao->valor]['matriculas']) && $r->status->valor == 8):
								$acao[$r->acao->valor]['matriculas']++;
							elseif($r->status->valor == 8):
								$acao[$r->acao->valor]['matriculas'] = 1;
							endif;
						else:
							$acao[$r->acao->valor]['nome'] = $r->acao->nome;
							$acao[$r->acao->valor]['cadastros'] = 1;
							if(isset($acao[$r->acao->valor]['matriculas']) && !empty($acao[$r->acao->valor]['matriculas']) && $r->status->valor == 8):
								$acao[$r->acao->valor]['matriculas']++;
							elseif($r->status->valor == 8):
								$acao[$r->acao->valor]['matriculas'] = 1;
							endif;
						endif;
						$acao[$r->acao->valor]['total'] = $captacao['total'];
						if(isset($acao[$r->acao->valor]['cadastros']) && !empty($acao[$r->acao->valor]['cadastros'])):
							$acao[$r->acao->valor]['porcentagem'] = $this->porcentagem($acao[$r->acao->valor]['cadastros'], $captacao['total']);
						else:
							$acao[$r->acao->valor]['cadastros'] = 0;
							$acao[$r->acao->valor]['porcentagem'] = 0;
						endif;
						if(isset($acao[$r->acao->valor]['matriculas']) && !empty($acao[$r->acao->valor]['matriculas'])):
							$acao[$r->acao->valor]['porcentagem_matricula'] = $this->porcentagem($acao[$r->acao->valor]['matriculas'], $acao[$r->acao->valor]['cadastros']);
						else:
							$acao[$r->acao->valor]['matriculas'] = 0;
							$acao[$r->acao->valor]['porcentagem_matricula'] = 0;
						endif;
					endif;

				endforeach;
			endif;

			$retorno = (object)array(
				'data' => Converter::data($inicio, "d/m/Y")." até ".Converter::data($final, "d/m/Y"),
				'captacao' => (object)array(
					'operador' => $operador,
					'geral' => $captacao,
					'data' => (isset($intervalo_br)) ? json_encode($intervalo_br) : '',
					'lista' => (isset($cadastros_total)) ? json_encode($cadastros_total) : '',
					'matricula' => (isset($cadastros_captacao_total)) ? json_encode($cadastros_captacao_total) : '',
					'agendamentos' => (isset($agendamentos)) ? $agendamentos : '',
					'acao' => (isset($acao)) ? $acao : '',
					'pesquisador' => (isset($pesquisador)) ? $pesquisador : ''
				)
			);

			return $retorno;
		}
	}
