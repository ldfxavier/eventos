<?php
    class config {
        private $_sistema;
        private $_hash;
        private $_config_erro;
        private $_config_fuso;
        private $_config_https;
        private $_config_www;
        private $_config_emailsistema;
        private $_link_link;
        private $_link_url;
        private $_link_painel;
        private $_link_arquivo;
        private $_link_diretorio;
        private $_pdo_host;
        private $_pdo_banco;
        private $_pdo_usuario;
        private $_pdo_senha;
        private $_header_titulo;
        private $_header_descricao;
        private $_header_imagem;
        private $_header_robots;
        private $_header_keywords;
        private $_header_viewport;
        private $_header_charset;
        private $_imagem_logo;
        private $_imagem_favicon;
        private $_opcionais;
        private $_contato;
        private $_social;
        private $_google_analytics;
        private $_google_api;
        private $_google_map;
        private $_google_key;
        private $_facebook_key;

        function __construct(){
            $this->setSistema();
        }

        private function erro(){
            if(empty($this->_header_titulo)):
                include('system/.erro/0002.php');
                exit();
            elseif($this->_sistema == 'producao' && empty($this->_header_descricao)):
                include('system/.erro/0003.php');
                exit();
            elseif(empty($this->_header_robots)):
                include('system/.erro/0004.php');
                exit();
            elseif(empty($this->_header_viewport)):
                include('system/.erro/0005.php');
                exit();
            elseif(empty($this->_header_charset)):
                include('system/.erro/0006.php');
                exit();
            elseif(!is_bool($this->_config_erro)):
                include('system/.erro/0007.php');
                exit();
            elseif(empty($this->_config_fuso)):
                include('system/.erro/0008.php');
                exit();
            elseif(empty($this->_config_emailsistema) || filter_var($this->_config_emailsistema, FILTER_VALIDATE_EMAIL) == false):
                include('system/.erro/0009.php');
                exit();
            elseif(!is_bool($this->_pdo_ativar)):
                include('system/.erro/0010.php');
                exit();
            endif;
        }

        private function setSistema(){
            include('qa.php');
            include('producao.php');

            if(in_array($_SERVER['HTTP_HOST'], $qa_link['link'])):
                $this->_sistema = 'qa';
                $this->_header_robots = $qa_header['robots'];
                $this->_config_erro = $qa_config['erro'];
                $this->_config_https = $qa_config['https'];
                $this->_config_www = $qa_config['www'];
                $this->_config_emailsistema = $qa_config['emailsistema'];
                $this->_link_painel = $qa_link['painel'];
                $this->_link_arquivo = $qa_link['arquivo'];
                $this->_link_diretorio = $qa_link['diretorio'];
                $this->_link_diretorio_arquivo = $qa_link['diretorio_arquivo'];
                $this->_pdo_ativar = $qa_pdo['ativar'];
                $this->_pdo_host = $qa_pdo['host'];
                $this->_pdo_banco = $qa_pdo['banco'];
                $this->_pdo_usuario = $qa_pdo['usuario'];
                $this->_pdo_senha = $qa_pdo['senha'];
            elseif(in_array($_SERVER['HTTP_HOST'], $link['link'])):
                $this->_sistema = 'producao';
                $this->_header_robots = $header['robots'];
                $this->_config_erro = $config['erro'];
                $this->_config_https = $config['https'];
                $this->_config_www = $config['www'];
                $this->_config_emailsistema = $config['emailsistema'];
                $this->_link_painel = $link['painel'];
                $this->_link_arquivo = $link['arquivo'];
                $this->_link_diretorio = $link['diretorio'];
                $this->_link_diretorio_arquivo = $link['diretorio_arquivo'];
                $this->_pdo_ativar = $pdo['ativar'];
                $this->_pdo_host = $pdo['host'];
                $this->_pdo_banco = $pdo['banco'];
                $this->_pdo_usuario = $pdo['usuario'];
                $this->_pdo_senha = $pdo['senha'];
            else:
                include('system/.erro/0001.php');
                exit();
            endif;

            $protocolo = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? 'https://' : 'http://';
            $this->_link_diretorio = empty($this->_link_diretorio) ? str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']) : $this->_link_diretorio;
            $this->_link_link = $protocolo.$_SERVER['HTTP_HOST'].$this->_link_diretorio;
            $this->_link_painel = str_replace('{{LINK}}', $this->_link_link, $this->_link_painel);
            $this->_link_arquivo = str_replace('{{LINK}}', $this->_link_link, $this->_link_arquivo);
            $this->_link_url = $this->_link_link.((isset($_GET['url'])) ? '/'.$_GET['url'] : '');

            $this->_header_titulo = $header['titulo'];
            $this->_header_descricao = $header['descricao'];
            $this->_header_imagem = str_replace('{{LINK}}', $this->_link_link, $header['imagem']);
            $this->_header_keywords = $header['keywords'];
            $this->_header_viewport = $header['viewport'];
            $this->_header_charset = $header['charset'];
            $this->_config_fuso = $config['fuso'];

            $this->_imagem_logo = str_replace('{{LINK}}', $this->_link_link, $imagem['logo']);
            $this->_imagem_favicon = str_replace('{{LINK}}', $this->_link_link, $imagem['favicon']);

            $this->_google_analytics = $google['analytics'];
            $this->_google_api = is_bool($google['api']) ? $google['api'] : false;
            $this->_google_map = is_bool($google['map']) ? $google['map'] : false;
            $this->_google_key = $google['key'];

            $this->_facebook_key = $facebook['key'];

            $this->_hash = isset($_SESSION['HASH']) ? $_SESSION['HASH'] : md5(uniqid(time()));
            $this->_opcionais = $opcionais;
            $this->_contato = $contato;
            $this->_social = $social;

            $this->erro();
            $this->defines();
        }

        private function defines(){
            define('TITULO', $this->_header_titulo);
            define('DESCRICAO', $this->_header_descricao);
            define('IMAGEM', $this->_header_imagem);
            define('LOGO', $this->_imagem_logo);
            define('FAVICON', $this->_imagem_favicon);
            define('ROBOTS', $this->_header_robots);
            define('KEYWORDS', $this->_header_keywords);
            define('VIEWPORT', $this->_header_viewport);
            define('CHARSET', $this->_header_charset);
            define('EMAILSISTEMA', $this->_config_emailsistema);
            define('HASH', $this->_hash);
            define('LINK', $this->_link_link);
            define('URL', $this->_link_url);
            define('PAINEL', $this->_link_painel);
            define('ARQUIVO', $this->_link_arquivo);
            define('DIRETORIO', $this->_link_diretorio);
            define('DIRETORIO_ARQUIVO', $this->_link_diretorio_arquivo);
            define('PDOHOST', $this->_pdo_host);
            define('PDOBANCO', $this->_pdo_banco);
            define('PDOUSUARIO', $this->_pdo_usuario);
            define('PDOSENHA', $this->_pdo_senha);

            define('GOOGLEANALYTICS', $this->_google_analytics);
            define('GOOGLEAPI', $this->_google_api);
            define('GOOGLEMAP', $this->_google_map);
            define('GOOGLEKEY', $this->_google_key);

            define('FACEBOOKKEY', $this->_facebook_key);

            if($this->_social) foreach($this->_social as $ind => $valores) define(mb_strtoupper($ind, 'UTF-8'), $valores);
            if($this->_contato) foreach($this->_contato as $ind => $valores) define(mb_strtoupper($ind, 'UTF-8'), $valores);
            if($this->_opcionais) foreach($this->opcionais as $ind => $valores) define(mb_strtoupper($ind, 'UTF-8'), str_replace("{{LINK}}", $this->_link_link, $valores));
        }

        public function getSistema(){
            return $this->_sistema;
        }

        public function getHeader(){
            return (object)array(
                'titulo' => $this->_header_titulo,
                'descricao' => $this->_header_descricao,
                'imagem' => $this->_header_imagem,
                'robots' => $this->_header_robots,
                'keywords' => $this->_header_keywords,
                'viewport' => $this->_header_viewport,
                'charset' => $this->_header_charset
            );
        }

        public function getConfig(){
            return (object)array(
                'erro' => $this->_config_erro,
                'fuso' => $this->_config_fuso,
                'https' => $this->_config_https,
                'www' => $this->_config_www,
                'email' => $this->_config_emailsistema
            );
        }

        public function getImagem(){
            return (object)array(
                'logo' => $this->_imagem_logo,
                'favicon' => $this->_imagem_favicon
            );
        }

        public function getLink(){
            return (object)array(
                'link' => $this->_link_link,
                'url' => $this->_link_url,
                'painel' => $this->_link_painel,
                'arquivo' => $this->_link_arquivo
            );
        }

        public function getPdo(){
            return (object)array(
                'host' => $this->_pdo_host,
                'banco' => $this->_pdo_banco,
                'usuario' => $this->_pdo_usuario,
                'senha' => $this->_pdo_senha
            );
        }

    }
