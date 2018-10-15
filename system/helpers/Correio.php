<?php
	final class Correio {

		public static function endereco($cep){
			$cep = preg_replace("/[^0-9]/", "", $cep);

			$ch = curl_init('http://api.postmon.com.br/v1/cep/'.$cep);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER , array('Accept: application/json'));

			$retorno = json_decode(curl_exec($ch), true);

			if($retorno && is_array($retorno)):
				return (object)array(
					'erro' => false,
					'bairro' => isset($retorno['bairro']) ? $retorno['bairro'] : '',
					'endereco' => isset($retorno['logradouro']) ? $retorno['logradouro'] : '',
					'cidade' => isset($retorno['cidade']) ? $retorno['cidade'] : '',
					'uf' => isset($retorno['estado']) ? $retorno['estado'] : '',
					'cep' => isset($retorno['cep']) ? $retorno['cep'] : ''
				);
			endif;
			return (object)array('erro' => true);
		}
	}
