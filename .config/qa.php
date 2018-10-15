<?php
	$qa_header = array(
		'robots' => 'noindex, nofollow', // Instruções para o robo do google | default index, follow
	);

	// CONFIGURAÇÕES GERIAS DO SITE
	$qa_config = array(
		'erro' => true, // Libera ou cancela os erros | default = true
		'https' => false, // true para redirecionar para versão com https, false para redirecionar para verão sem https ou null para usar as duas versões | default = null
		'www' => false, // true para redirecionar para versão com www., false para redirecionar para versão sem www. ou null para usar as duas versões | default = null
		'emailsistema' => 'teste@teste.com', // Email geral para receber e-mails do site
	);

	// LINKS DO SITE
	$qa_link = array(
		'link' => array('localhost', '127.0.0.1'), // Array com uma lista de dominios
		'painel' => '', // URL do painel (Curinga [LINK] para pegar a mesma url/diretório do site)
		'arquivo' => '', // URL dos arquivos do site (Curinga [LINK] para pegar a mesma url/diretório do site)
		'diretorio' => '/cadastro', // Diretório para pasta
		'diretorio_arquivo' => '', // E-mail de contato
	);

	// CONFIGURAÇÃO DO PDO
	$qa_pdo = array(
		'ativar' => true, // Ativa ou não o PDO | default = false
		'host' => 'localhost', // Host do mysql
		'banco' => 'banco', // Nome do banco
		'usuario' => 'usuario', // Usuário do banco
		'senha' => 'senha' // Senha do bando

	);
