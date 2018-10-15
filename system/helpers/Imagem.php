<?php
	require('image/WideImage.php');

	class Imagem {
		/**
		 * @var $imagem 	string 	Imagem a ser redirecionada e salva
		 * @var $largura	int		Largura da imagem
		 * @var $altura	int		Altura da imagem
		 * @var $destino	string	Diretorio completo de onde será salvo a imagem
		 */
		public static function redirecionar($imagem, $destino, $largura = null, $altura = null){
			$img = WideImage::load($imagem);
			$img = $img->resize($largura, $altura, 'inside', 'down');
			$img->saveToFile($destino);
		}

		/**
		 * @var $imagem 	string 	Imagem a ser redirecionada e salva
		 * @var $destino	string	Diretorio completo de onde será salvo a imagem
		 */
		public static function salvar($imagem, $destino){
			$img = WideImage::load($imagem);
			$img->saveToFile($destino);
		}

		/**
		 * @var $imagem 	string 	Imagem a ser redirecionada e salva
		 * @var $largura	int		Largura da imagem
		 * @var $altura	int		Altura da imagem
		 * @var $destino	string	Diretorio completo de onde será salvo a imagem
		 */
		public static function cortar($imagem, $destino, $largura = null, $altura = null){
			$img = WideImage::load($imagem);
			$img = $img->resize($largura, $altura, 'outside')->crop('50% - '.($largura/2), '50% - '.($altura/2), $largura, $altura);
			$img->saveToFile($destino);
		}
	}
