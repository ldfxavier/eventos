<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="robots" content="noindex, nofollow">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="icon" href="<?php echo FAVICON ?>" type="image/png">

    <meta charset="UTF-8">
    <title>PAGINA NÃO ENCONTRADA</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        body {
            padding: 20px;
            background-color: #F6F6F6;
            text-align: center;
            font-family: Arial, sans-serif;
            word-wrap: break-word;
        }
        h1 {
            font-size: 30px;
            font-weight: bold;
            margin-top: 40px;
        }
        img {
            margin-top: 20px;
        }
        p {
            color: #666;
            margin-bottom: 10px;
        }
        a {
            height: 40px;
            line-height: 40px;
            background-color: green;
            color: #FFF;
            margin: 0 auto;
            text-decoration: none;
            padding: 0 30px;
            border-radius: 20px;
            display: table;
        }
        ul {
            list-style: none;
            margin-top: 60px;
        }
        ul li {
            margin-bottom: 4px;
            color: #999;
        }
        ul li span {
            width: 100%;
            float: left;
            font-weight: bold;
            font-size: 16px;
            color: #333;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <img src="<?php echo LOGO ?>" height="50" />
    <h1>Ops!</h1>
    <p>A página acessada não existe ou está inativa no momento.</p>
    <a href="<?php echo LINK ?>">IR PARA HOME</a>
    <ul>
        <li><span>POSSÍVEIS MOTIVOS</span></li>
        <li>O endereço digitado está incorreto.</li>
        <li>A página está fora do ar no momento.</li>
        <li>O conteúdo foi movido para outra endereço.</li>
        <li>A página foi retirado do ar.</li>
    </ul>
</body>
</html>
