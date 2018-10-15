<?php
    final class Mensagem {
        /**
         * MENSAGEM DE ERRO PADRÃO DO SISTEMA
         * @var $titulo string  Título para mensagem de erro
         * @var $texto  string  Texto para mensagem de erro
         * @return      json    Json com mensagem de erro
         */
        public static function erro($titulo, $texto){
            return json_encode(array('erro' => true, 'titulo' => $titulo, 'texto' => $texto));
        }
        /**
         * MENSAGEM DE OK PADRÃO DO SISTEMA
         * @return      json    Json com mensagem de OK
         */
        public static function ok(){
            return json_encode(array('erro' => false));
        }

    }
