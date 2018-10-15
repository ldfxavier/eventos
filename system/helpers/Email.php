<?php
    final class Email {
        /**
         * ENVIA MENSAGEM PARA SISTEMA DE DESPARO DE E-MAIL
         * @var $titulo string  Título da mensagem
         * @var $nome   string  Nome de quem vai receber o e-mail
         * @var $email  string  E-mail de quem vai receber o e-mail
         * @var $link   string  Link da página html onde será montado o e-mail
         * @var $dados  array   Array com dados personalizados
         *                          host = string
         *                          porta = int
         *                          login = string
         *                          senha = string
         *                          de = array('email', 'nome')
         *                          resposta = array('email', 'nome')
         * @return      json    Mensagem de envio
         */
        public static function api($titulo, $nome, $email, $link, $dados = array()){
            $url = 'https://api.markttec.com.br/email/enviar';
            $campos = array(
                'nome' => urlencode($nome),
            	'email'=>urlencode($email),
            	'titulo'=>urlencode($titulo),
            	'link'=>urlencode($link)
            );
            if(!empty($dados)) $campos = array_merge($campos, $dados);

            $post = '';
            foreach($campos as $ind => $valor) $post .= $ind.'='.$valor.'&';
            $post = rtrim($post,'&');

            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch,CURLOPT_POST,count($campos));
            curl_setopt($ch,CURLOPT_POSTFIELDS,$post);

            $resultado = curl_exec($ch);
            curl_close($ch);
            return $resultado;
        }
    }
