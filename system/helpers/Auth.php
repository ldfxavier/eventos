<?php
    final class Auth {
        // propriedades do site
        private static $_site = 'LOGINSITE';
        private static $_sitehash = 'lO34de@uYtgsY&6T3sTef34%42dMDjE';

        // Propriedades do painel
        private static $_painel = 'LOGINPAINEL';
        private static $_painelhash = 'Pa45eudj#452dyufJHjdue%4#jshd0';

        // Cria a sessão
        public static function criar($local){
            if($local == 'site') $_SESSION[self::$_site] = self::$_sitehash;
            elseif($local == 'painel') $_SESSION[self::$_painel] = self::$_painelhash;
        }
        // Deleta a sessão
        public static function deletar($local){
            if($local == 'site' && isset($_SESSION[self::$_site])):
                unset($_SESSION[self::$_site]);
            elseif($local == 'painel' && isset($_SESSION[self::$_painel])):
                unset($_SESSION[self::$_painel]);
            endif;
        }

        // Verifica se o usuário está logado ou não
        public static function validar($local){
            $explode = explode('/', isset($_GET['url']) ? $_GET['url'] : 'Index/Index');
            $controller = isset($explode[0]) ? $explode[0] : 'Index';
            $action = isset($explode[1]) ? $explode[1] : 'Index';

            if($local == 'site'):
                if($controller == 'login' && $action != 'sair' && (isset($_SESSION[self::$_site]) && $_SESSION[self::$_site] == self::$_sitehash)):
                    header('LOCATION: '.LINK);
                elseif($controller != 'login' && (!isset($_SESSION[self::$_site]) || $_SESSION[self::$_site] != self::$_sitehash)):
                    $url = isset($_GET['url']) ? '/'.$_GET['url'] : '';
                    $_SESSION['LOGINLOCATION'] = LINK.$url;
                    header('LOCATION: '.LINK.'/login');
                endif;
            elseif($local == 'painel'):
                //
            endif;
        }

        public static function verificar($local){
            if($local == 'site' && isset($_SESSION[self::$_site]) && $_SESSION[self::$_site] == self::$_sitehash) return true;
            elseif($local == 'site' && (!isset($_SESSION[self::$_site]) || $_SESSION[self::$_site] != self::$_sitehash)) return false;
            elseif($local == 'painel' && isset($_SESSION[self::$_painel]) && $_SESSION[self::$_painel] == self::$_painelhash) return true;
            elseif($local == 'painel' && (!isset($_SESSION[self::$_painel]) || $_SESSION[self::$_painel] != self::$_painelhash)) return false;
        }
    }
