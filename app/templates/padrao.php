<?php
	/**
	 * PADRÕES DO HEADER
	 */
	$header_titulo = (isset($_h_titulo) && !empty($_h_titulo)) ? $_h_titulo.' - '.TITULO : TITULO;
	$header_url = (isset($_h_url) && !empty($_h_url)) ? $_h_url : URL;
	$header_descricao = (isset($_h_descricao) && !empty($_h_descricao)) ? $_h_descricao : DESCRICAO;
	$header_imagem = (isset($_h_imagem) && !empty($_h_imagem)) ? $_h_imagem : IMAGEM;
?>
<!DOCTYPE HTML>
<html id="html" lang="pt-br">
<head>
	<meta charset="<?php echo CHARSET ?>" />


	<meta name="robots" content="<?php echo ROBOTS ?>">
	<?php if(VIEWPORT == true): ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<?php endif; ?>
	<?php if(!empty($header_descricao)): ?>
	<meta name="description" content="{{$header_descricao}}" />
	<?php endif; ?>
	<meta name="keywords" content="<?php echo KEYWORDS ?>">

	<meta name="twitter:card" value="summary">
	<meta name="twitter:site" content="{{$header_url}}">
	<meta name="twitter:title" content="{{$header_titulo}}">
	<meta name="twitter:description" content="{{$header_descricao}}">
	<meta name="twitter:creator" content="{{$header_titulo}}">
	<meta name="twitter:image" content="{{$header_imagem}}">

	<meta property="og:title" content="{{$header_titulo}}" />
	<meta property="og:url" content="{{$header_url}}" />
	<meta property="og:image" content="{{$header_imagem}}" />
	<meta property="og:description" content="{{$header_descricao}}" />

	<title>{{$header_titulo}}</title>

	<link rel="icon" href="{{LINK}}/images/favicon.png" type="image/png">
	<link rel="stylesheet" href="{{LINK}}/css/style.css"/>

	<script src="{{LINK}}/js/jquery.js" type="text/javascript"></script>
	<script src="{{LINK}}/js/mask.js" type="text/javascript"></script>
	<script src="{{LINK}}/js/all.js" type="text/javascript"></script>

	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', '<?php echo GOOGLEANALYTICS ?>', 'auto');
		ga('send', 'pageview');
	</script>
</head>
<body>
	<div class="bloco_menu">
		<nav>
			<div class="abrir_menu">
				<span class="l_menu"></span>
				<span class="l_menu"></span>
				<span class="l_menu"></span>
			</div>
			<ul class="menu">
				<a href="<?php echo LINK ?>/cadastro"><li>CADASTRO</li></a>
				<?php
				if($_SESSION['EQUIPE']->admin->valor == 1):
				?>
				<a href="<?php echo LINK ?>/equipe"><li>EQUIPE</li></a>
				<a href="<?php echo LINK ?>/cadastro/lista"><li>LISTA</li></a>
				<?php
				endif;
				?>
				<a href="<?php echo LINK ?>/login/sair"><li>SAIR</li></a>
			</ul>
		</nav>
	</div>

	<div class="block_menu_mobile">
		<nav>
			<ul>
				<a href="<?php echo LINK ?>/cadastro"><li>CADASTRO</li></a>
				<a href="<?php echo LINK ?>/equipe"><li>EQUIPE</li></a>
				<a href="<?php echo LINK ?>/lista_cadastros"><li>LISTA</li></a>
				<a href="<?php echo LINK ?>/login/sair"><li>SAIR</li></a>
			</ul>
		</nav>
	</div>

	<main>
		[[VIEW]]
	</main>
	<form>
		<input type="hidden" name="LINK" id="LINK" value="{{LINK}}">
	</form>
</body>
</html>
