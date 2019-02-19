<?php

	$nome = $_POST['nome'];
	$nick = explode( " ", $nome, 2 );
	$nick = $nick[0];
	$emailUsuario = $_POST['email'];
	$assuntoEmpresa = $_POST['assunto'];
	$mensagem = $_POST['mensagem'];

	$url = get_bloginfo('url');
	$tUrl = get_bloginfo('template_url');

	$nomeEmpresa = get_option('blogname');
	$emailEmpresa = get_option('admin_email');
	// $emailEmpresa = "raul@humanostudio.com.br";


	$msgParaEmpresa ="
	<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
	<div style='width: 100%; b: #fffbce; padding: 50px 0;'>
		<table style='background: white; width: 460px; border-radius: 4px; margin: 0 auto; border: 15px solid #f35a04; border-spacing: 0'>
			<tr style='background: #f35a04; margin: 0; padding: 0'>
				<td  style='font-family:Arial, sans; height: 110px; text-align: center;'>
					<img src='$tUrl/img/humano-logo-home.png' style='margin: 20px 0 30px'>
				</td>
			</tr>
			<tr>
				<td  style='font-family:Arial, sans; padding: 0 15px 35px'>
					<div style='width: 90%; padding: 1% 5%; margin-top: 20px'>
						<p style='border-bottom: 1px dotted #ccc; padding: 10px 0 20px'><b style='color: #ccc'><span style='width: 100px; display: inline-block'>Nome:</span> </b>$nome</p>
						<p style='border-bottom: 1px dotted #ccc; padding: 10px 0 20px'><b style='color: #ccc'><span style='width: 100px; display: inline-block'>E-mail:</span> </b>$email</p>
						<p style='border-bottom: 1px; padding: 10px 0'><b style='color: #ccc'><span style='width: 100px; display: block; margin-bottom: 20px;'>Mensagem:</span> </b>$mensagem</p>
					</div>
				</td>
			</tr>
		</table>
	</div>
	";


	$msgParaUsuario  = "
	<!DOCTYPE html PUBLIC \'-//W3C//DTD XHTML 1.0 Strict//EN\' \'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\'>
	<div style='width: 100%; padding: 50px 0'>
		<table style='background: white; width: 460px; border-radius: 4px; margin: 0 auto; border: 5px solid #f35a04; border-bottom-width: 20px; border-left-width: 0; border-right-width: 0; border-spacing: 0'>
			<tr style='background: #f35a04; margin: 0; padding: 0'>
				<td  style='font-family:Arial, sans; height: 110px; text-align: center;'>
					<img src='$tUrl/img/humano-logo-home.png' style='margin: 20px 0 30px'>
				</td>
			</tr>
			<tr>
				<td  style='font-family:Arial, sans; padding: 0 15px 15px'>
					<div style='width: 90%; padding: 1% 5%; margin-top: 20px'>
						<h1 style='font-size:22px; margin-bottom: 10px; color: #999; font-weight: lighter; margin-top: 30px; margin-bottom: 40px'>CONFIRMA&Ccedil;&Atilde;O DE CONTATO</h1>
						<p style='font-size:20px; margin-bottom: 10px; color: #666; line-height: 24px'><strong style='color: #f35a04; font-size: 24px;'>Oi <b>$nick</b>!</strong><br/><br/>
							Já recebemos seu e-mail e ficamos muito felizes pelo seu contato. Responderemos o mais breve poss&iacute;vel.<br>
							<br>
							Grande abra&ccedil;o!<br>
						</p>
						<p style='margin-top: 50px; font-style: italic; color:#999; font-size:11px; font-family: Arial'>Observa&ccedil;&atilde;o: N&atilde;o &eacute; necess&aacute;rio responder este e-mail.</p>
					</div>
				</td>
			</tr>
		</table>
	</div>
	";

	$headerParaUsuario[] = "MIME-Version: 1.1";
	$headerParaUsuario[] = "Content-type: text/html; charset=UTF-8";
	$headerParaUsuario[] = "From: $emailEmpresa"; // remetente
	$headerParaUsuario[] = "Return-Path: $emailEmpresa"; // return-path
	
	$headerParaEmpresa[] = "MIME-Version: 1.1";
	$headerParaEmpresa[] = "Content-type: text/html; charset=UTF-8";
	$headerParaEmpresa[] = "From: $emailEmpresa\n";
	$headerParaEmpresa[] = "Return-Path: $emailEmpresa"; // return-path

	// if($_SERVER['HTTP_HOST'] != "localhost")
	// {
		wp_mail( $emailEmpresa, $assuntoEmpresa, $msgParaEmpresa, $headerParaEmpresa ) or die("Falha ao enviar e-mail para a empresa");
		wp_mail( $emailUsuario, $nomeEmpresa . " - Confirmação de contato", $msgParaUsuario, $headerParaUsuario ) or die("Falha ao enviar e-mail para o usuário");
	// }

	echo "sucesso";