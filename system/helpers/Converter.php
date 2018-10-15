<?php
    final class Converter {

        /**
    	 * REMOVE TODOS OS CARACTERES, ACENTOS, ESPAÇOS E AFINS
    	 * @var 	$str 	string 	Texto para limpar
    	 * @return 			string	Retornar o valor limpo
    	 */
    	public static function url($str){
    		return preg_replace("/[^a-zA-Z0-9\-]/", "", str_replace(array(' - ', ' -', '- ', ' ', '/', 'á','à','ã','â','ä','Á','À','Ã','Â','Ä','é','è','ẽ','ê','ë','É','È','Ẽ','Ê','Ë','í','ì','ĩ','î','ï','Í','Ì','Ĩ','Î','Ï','ó','ò','õ','ô','ö','Ó','Ò','Õ','Ô','Ö','ú','ù','ũ','û','ü','Ú','Ù','Ũ','Û','Ü','ç','Ç','ñ','Ñ'), array('-', '-', '-', '-', '-', 'a','a','a','a','a','A','A','A','A','A','e','e','e','e','e','E','E','E','E','E','i','i','i','i','i','I','I','I','I','I','o','o','o','o','o','O','O','O','O','O','u','u','u','u','u','U','U','U','U','U','c','C','n','N'), mb_convert_case(strip_tags($str), MB_CASE_LOWER, "UTF-8")));
    	}

        /**
    	 * REMOVE TODOS OS CARACTERES, ACENTOS, ESPAÇOS E AFINS
    	 * @var 	$str 	string 	Texto para limpar
    	 * @return 			string	Retornar o valor limpo
    	 */
    	public static function acento($str){
    		return str_replace(array('á','à','ã','â','ä','Á','À','Ã','Â','Ä','é','è','ẽ','ê','ë','É','È','Ẽ','Ê','Ë','í','ì','ĩ','î','ï','Í','Ì','Ĩ','Î','Ï','ó','ò','õ','ô','ö','Ó','Ò','Õ','Ô','Ö','ú','ù','ũ','û','ü','Ú','Ù','Ũ','Û','Ü','ç','Ç','ñ','Ñ'), array('a','a','a','a','a','A','A','A','A','A','e','e','e','e','e','E','E','E','E','E','i','i','i','i','i','I','I','I','I','I','o','o','o','o','o','O','O','O','O','O','u','u','u','u','u','U','U','U','U','U','c','C','n','N'), $str);
    	}

        public static function limite($str, $tamanho, $simbolo = '...', $forca = false){
    	    if(strlen($str) > $tamanho && $forca == true) return substr($str, 0, $tamanho).$simbolo;
    		elseif(strlen($str) > $tamanho) return substr($str, 0, strrpos(substr($str, 0, $tamanho), ' ')).$simbolo;
    		else return $str;
    	}

        /**
    	 * CORTA A STRING
    	 * @var $str 	string 	Texto para ser convertida
    	 * @var $tipo 	string 	Tipo de conversão
    	 * @return 		string	Retornar o valor convertido
    	 */
    	public static function caixa($str, $tipo){
    		if($tipo == "A") return mb_strtoupper($str, 'UTF-8');
    		elseif($tipo == "a") return mb_strtolower($str, 'UTF-8');
    		elseif($tipo == "Aa") return ucfirst(mb_strtolower($str, 'UTF-8'));
    	}

        /**
         * CONVERTE CPF OU CNPJ PARA VERSÃO COM PONTOS
         * @var 	$str 	int 	Número do CPF ou CNPJ
         * @return 			string 	String com valor convertido
         */
        public static function documento($str){
            $str = preg_replace("/[^0-9]/","", $str);
            if(!empty($str) && strlen($str) == 11) return substr($str, 0, 3).'.'.substr($str, 3, 3).'.'.substr($str, 6, 3).'-'.substr($str, 9, 2);
            elseif(!empty($str) && strlen($str) == 14) return substr($str, 0, 2).'.'.substr($str, 2, 3).'.'.substr($str, 5, 3).'/'.substr($str, 8, 4).'-'.substr($str, 12, 2);
            else return $str;
        }

        public static function telefone($str){
            $telefone = preg_replace("/[^0-9]/", "", $str);
            $quantidade = strlen($telefone);
            if($quantidade == 8 && (substr($telefone, 0, 4) == "3003" || substr($telefone, 0, 4) == "4004")) return substr($telefone, 0, 4).'-'.substr($telefone, 4, 4);
            elseif($quantidade == 10) return ''.substr($telefone, 0, 2).' '.substr($telefone, 2, 4).'-'.substr($telefone, 6, 4);
            elseif($quantidade == 11 && (substr($telefone, 2, 1) == "9")) return ''.substr($telefone, 0, 2).' '.substr($telefone, 2, 5).'-'.substr($telefone, 7, 4);
            elseif(substr($telefone, 0, 4) == "0800") return substr($telefone, 0, 4).' '.substr($telefone, 4, 3).' '.substr($telefone, 7, 4);
            else return $str;
        }

        public static function cep($str){
            $cep = preg_replace("/[^0-9]/", "", $str);
            if(strlen($cep) == 8) return substr($cep, 0, 5).'-'.substr($cep, 5, 3);
            else return $str;
        }

        /**
         * CONVERTE A DATA PARA O PADRÃO PASSADO
         * @var     $data   date    Data a ser convertida
         * @var     $modelo string  Modelo da noda data
         * @return          date    Nova data
         */
        public static function data($data, $modelo = 'd/m/Y H:i:s'){
            if(empty($data) || preg_replace("/[^0-9]/", "", $data) == '00000000' || preg_replace("/[^0-9]/", "", $data) == '00000000000000'):
                return '';
            else:
                return date($modelo, strtotime(str_replace('/', '-', $data)));
            endif;
        }

		public static function diferencadias($data_inicial, $data_final){

			function geraTimestamp($data) {
			$partes = explode('/', $data);
			return mktime(0, 0, 0, $partes[1], $partes[0], $partes[2]);
			}

			$time_inicial = geraTimestamp($data_inicial);
			$time_final = geraTimestamp($data_final);

			$diferenca = $time_final - $time_inicial;

			$dias = (int)floor( $diferenca / (60 * 60 * 24));
			$dias = $dias + 1;

			return $dias;

		}

        public static function dataadd($data = null, $tempo, $saida = 'Y-m-d H:i:s'){
            $data = str_replace('/', '-', $data);
            return date($saida, strtotime("{$data} {$tempo}"));
        }

        public static function filtro($valor, $resposta){
            if(is_array($valor)) $valor = (isset($valor[0]) && !empty($valor[0])) ? $valor[0] : $resposta;
            else $valor = (!empty($valor)) ? $valor : $resposta;
            return $valor;
        }

        public static function jdecode($json){
            $json = json_decode($json, true);
            if(is_array($json)):
                $json = array_filter($json);
                if(!empty($json)) return $json;
            endif;
            return array();
        }
    }
