$(function(){
	var LINK = $("#link").val();
	// -- Post login -- //
	$('.but_login').click(function(){
		var form = $(this).closest('form');
		var link = $(form).attr("action");
		var botao = $('button span', form);

		var usuario  = $('input[name=usuario]', form).val();
		var senha  = $('input[name=senha]', form).val();

		if(botao.text() == "Entrar"){
			botao.text('AGUARDE');
			$.post(link, {
				usuario:usuario,
				senha:senha
			}, function(resposta){
				if(resposta.erro == false){
					window.location.href = LINK;
				}else if(resposta.erro == true){
					$.alert({
						titulo:resposta.titulo,
						texto:resposta.texto
					});
				}else {
					$.alert({
						titulo:'Erro no envio!',
						texto:'Ocorreu um erro no cadastro, por favor, tente novamente.'
					});
				}
				botao.text("Entrar");
			}, 'json');
		}
		return false;
	});


	// -- Post cadastro -- //

	$('.but_salvar_cadastro').click(function(){
		var form = $(this).closest('form');
		var link = $(form).attr("action");
		var botao = $('button span', form);
		var botao_texto = 'Cadastrar';

		var acao  = $('select[name=acao]', form).val();
		var empresa  = $('input[name=empresa]', form).val();
		var nome  = $('input[name=nome]', form).val();
		var telefone_fixo  = $('input[name=telefone_fixo]', form).val();
		var telefone_celular  = $('input[name=telefone_celular]', form).val();
		var idade  = $('input[name=idade]', form).val();
		var telefone  = $('input[name=telefone]', form).val();
		var cidade  = $('input[name=cidade]', form).val();

		if(botao_texto == botao.text()){
			botao.text('AGUARDE');
			$.post(link, {
				ajax:true,
				acao:acao,
				empresa:empresa,
				nome:nome,
				telefone_fixo:telefone_fixo,
				telefone_celular,telefone_celular,
				idade:idade,
				cidade:cidade
			}, function(resposta){
				if(resposta.erro == false){
					$.alert({
						titulo:'Cadastro efetuado!',
						texto:'Seu cadastro foi efetuado com sucesso. Codigo: ' + resposta.id,
					});
					document.getElementById("form_cadastro").reset();
				}else if(resposta.erro == true){
					$.alert({
						titulo:resposta.titulo,
						texto:resposta.texto
					});
				}else {
					$.alert({
						titulo:'Erro no envio!',
						texto:'Ocorreu um erro no cadastro, por favor, tente novamente.'
					});
				}
				botao.text(botao_texto);
			}, 'json');
		}
		return false;
	});

	// -- Fim post cadastro -- //

	// -- Post busca -- //

	$('.but_buscar_cadastro').click(function(){
		var form = $(this).closest('form');
		var link = $(form).attr("action");
		var botao = $('button span', form);
		var botao_texto = 'Buscar';

		var inicio  = $('input[name=inicio]', form).val();
		var final  = $('input[name=final]', form).val();
		var equipe  = $('select[name=equipe]', form).val();
		var codigo  = $('input[name=codigo]', form).val();

		if(botao_texto == botao.text()){
			botao.text('AGUARDE');
			$.post(link, {
				equipe:equipe,
				codigo:codigo,
				inicio:inicio,
				final:final
			}, function(resposta){
				$(".resultado_busca").html(resposta);
				botao.text(botao_texto);
			});
		}
		return false;
	});

	// -- Fim post busca -- //

	// -- Post cadastro equipe -- //

	function validacaoEmail(valor) {
		usuario = valor.value.substring(0, valor.value.indexOf("@"));
		dominio = valor.value.substring(valor.value.indexOf("@")+ 1, valor.value.length);

		if ((usuario.length >=1) &&
		    (dominio.length >=3) &&
		    (usuario.search("@")==-1) &&
		    (dominio.search("@")==-1) &&
		    (usuario.search(" ")==-1) &&
		    (dominio.search(" ")==-1) &&
		    (dominio.search(".")!=-1) &&
		    (dominio.indexOf(".") >=1)&&
		    (dominio.lastIndexOf(".") < dominio.length - 1)) {

			return true;
		}
		else{
			$.alert({
				titulo:'E-mail inválido!',
				texto:'Por favor, digite um e-mail válido.',
			});
		}
	}

	$('.but_salvar_equipe').click(function(){
		var form = $(this).closest('form');
		var link = $(form).attr("action");
		var botao = $('button span', form);
		var botao_texto = 'Cadastrar';

		var nome  = $('input[name=nome]', form).val();
		var email  = $('input[name=email]', form).val();
		var senha  = $('input[name=senha]', form).val();

		// filtros
		var emailFilter=/^.+@.+\..{2,}$/;
		var illegalChars= /[\(\)\<\>\,\;\:\\\/\"\[\]]/;
		// condição
		if(!(emailFilter.test(email))||email.match(illegalChars)){
			$.alert({
				titulo:'E-mail inválido!',
				texto:'Por favor, digite um e-mail válido.',
			});
		}else if(botao_texto == botao.text()){
			botao.text('AGUARDE');
			$.post(link, {
				nome:nome,
				email:email,
				senha:senha
			}, function(resposta){
				if(resposta.erro == false){
					$('textarea[name=mensagem]', form).val('');
					$.alert({
						titulo:'Cadastro efetuado!',
						texto:'Cadastro foi efetuado com sucesso.',
					});
					document.getElementById("form_cadastro").reset();
				}else if(resposta.erro == true){
					$.alert({
						titulo:resposta.titulo,
						texto:resposta.texto
					});
				}else {
					$.alert({
						titulo:'Erro no envio!',
						texto:'Ocorreu um erro no cadastro, por favor, tente novamente.'
					});
				}
				botao.text(botao_texto);
			}, 'json');
		}
		return false;
	});

	// -- Fim post cadastro equipe -- //

	// -- Plugin alerta -- //

	$.alert = function(options){
		var settings = {
			titulo: '',
			texto: '',
			overflow: true,
			href: false,
			confirmar: false,
			class:''
		};

		if(options){
			$.extend(settings, options);
		};

		if(settings.titulo == '' || settings.texto == '') return false;
		if(settings.overflow == true) $('body').css('overflow-y', 'hidden');

		if($('#alert_content').size() > 0){
			alert_close();
			return false;
		}

		$('body').append('<div id="alert_mask"></div>');
		if(settings.confirmar == true){
			$('body').append('<div id="alert_content"><div class="alert_title">'+settings.titulo+'</div><div class="alert_text">'+settings.texto+'</div><div class="button"><span class="'+settings.class+' sim">Sim</span><span class="close_alert nao">Não</span></div></div>');
		}else{
			$('body').append('<div id="alert_content"><div class="alert_title">'+settings.titulo+'</div><div class="alert_text">'+settings.texto+'</div><div class="button"><span class="close_alert">OK</span></div></div>');
		}

		$('#alert_mask').show().stop()
		.animate({
			opacity:0,
		},0)
		.animate({
			opacity:1,
		},300);

		$('#alert_content').show().stop()
		.animate({
			top: -100,
			opacity:0,
		},0)
		.animate({
			top: 40,
			opacity:1,
		},300);

		function alert_close(){
			$('#alert_mask').show().stop()
			.animate({
				opacity:0,
			},300);

			$('#alert_content').show().stop()
			.animate({
				top: -100,
				opacity:0,
			},300, function(){
				$('#alert_mask').remove();
				$('#alert_content').remove();
			});
			if(settings.overflow == true) $('body').css('overflow-y', 'auto');
			if(settings.href != false) window.location.replace(settings.href);
		}

		$('body').on('keydown', function(e){
			if($('#alert_mask').size() > 0 && $('#alert_mask').is(':visible') && e.which == 13 || e.which == 27){
				alert_close();
				return false;
			}
		});

		$('body').on('click', '#alert_content .button .close_alert, #alert_mask', function(){
			alert_close();
		});
	}
});
