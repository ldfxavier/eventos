<?php
	$header = array(
		'titulo' => 'Eventos', // Título padrão do site
		'descricao' => 'Sistema de cadastro para eventos.', // Descrição padrão do site
		'imagem' => '{{LINK}}/images/', // Imagem padrão
		'robots' => 'index, follow', // Instruções para o robo do google | default index, follow
		'keywords' => '', // Metatag keywords
		'viewport' => true, // Libera ou bloquea o viewport para celular | default true
		'charset' => 'utf-8' // Charset do sistema | default uft-8
	);

	// CONFIGURAÇÕES GERIAS DO SITE
	$config = array(
		'erro' => true, // Libera ou cancela os erros | default = true
		'fuso' => 'America/Sao_Paulo', // Fuso horário do site, vazio para default do OS;
		'https' => true, // true para redirecionar para versão com https, false para redirecionar para verão sem https ou null para usar as duas versões | default = null
		'www' => null, // true para redirecionar para versão com www., false para redirecionar para versão sem www. ou null para usar as duas versões | default = null
		'emailsistema' => 'teste@teste.com', // Email geral para receber e-mails do site
	);

	// CONFIGURAÇÃO DE IMAGENS PADRÕES DO SISTEMA
	$imagem = array(
		'logo' => '{{LINK}}/images/logo.png',
		'favicon' => '{{LINK}}/images/favicon.png',
	);

	// LINKS DO SITE
	$link = array(
		'link' => array('localhost'), // Array com uma lista de dominios
		'painel' => '', // URL do painel (Curinga [LINK] para pegar a mesma url/diretório do site)
		'arquivo' => '', // URL dos arquivos do site (Curinga [LINK] para pegar a mesma url/diretório do site)
		'diretorio' => '', // Diretório para pasta
		'diretorio_arquivo' => ''
	);

	$contato = array(
		'telefone' => null,
		'email' => null
	);

	// CONFIGURAÇÃO DO PDO
	$pdo = array(
		'ativar' => true, // Ativa ou não o PDO | default = false
		'host' => 'localhost', // Host do mysql
		'banco' => 'bano', // Nome do banco
		'usuario' => 'usuario', // Usuário do banco
		'senha' => 'senha' // Senha do bando
	);

	$google = array(
		'analytics' => null,
		'api' => false,
		'map' => false,
		'key' => null
	);

	$facebook = array(
		'key' => null
	);

	$social = array(
		'google' => null,
		'facebook' => null,
		'instagram' => null,
		'twitter' => null,
		'pinterest' => null
	);

	// DEFINES opcionais
	$opcionais = array(

	);
