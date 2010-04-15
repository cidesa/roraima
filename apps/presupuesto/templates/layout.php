<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<?php include_http_metas() ?>
<?php include_metas() ?>
<?php use_helper('Javascript', 'wait') ?>

<?php include_title() ?>

<link rel="shortcut icon" href="/favicon.ico" />
</head>
<body>
<?php echo wait() ?>
		<div id="container">
		  <div id="roraimaheader">
		  	<div id="ctmenu">
        <a href="javascript: var w = window.open('http://www.cidesa.com.ve')"> <img class="logo-cidesa" src="/images/logo-cidesa.png" alt="Cidesa"/> </a>
        <div id="menu">
          <ul class="list">
            <li class="menu-on"><?php echo link_to($sf_context->getModuleName(),$sf_context->getModuleName().'/list') ?></li>
            <li><a href="javascript:self.close()">Cerrar Ventana</a></li>
            <li><a href= "javascript: var w = window.open('/ayuda/doku.php/')">Ayuda en linea</a></li>
            <li><a href="javascript: var w = window.open('http://comunidad.roraima.cidesa.com.ve')">Comunidad</a></li>
            <li><a href="<?php if (SF_ENVIRONMENT=='dev') echo "/".sfConfig::get('app_autenticacion')."_dev.php/login/logout"; else echo "/".sfConfig::get('app_autenticacion').".php/login/logout"; ?>">Cerrar Sesion</a></li>
          </ul>
        </div>
        <div id="info-user">
          <span class="user">Usuario: <span><?php echo $sf_user->getAttribute('usuario','Sin Autenticar') ?></span></span>
          <span class="company">Empresa:<span><?php if(isset($_SESSION["nomemp"])) echo $_SESSION["nomemp"] ?></span></span>
        </div>              
      </div>
      <div id="logo-app">
        <a href="javascript: var w = window.open('http://roraima.cidesa.com.ve')"> <img src="/images/logo.png" alt="Roraima"/> </a>
        <span><?php setlocale(LC_ALL, 'es_VE.utf8').': '; echo iconv('ISO-8859-1', 'UTF-8', strftime('%A %d de %B de %Y', time())); ?></span>
      </div>
      </div>
      <div id="main">
         <?php echo $sf_data->getRaw('sf_content'); ?>
      </div>
      <div id="roraimafooter">
        <div class="info-footer">
        	<span>Copyleft CIDESA 2007. Distribuido bajo la licencia GNU/GPL V2.0</span>
					<span>Venezuela - Lara - Barquisimeto</span>
        </div>
				<div class="logo-footer">
					<img src="/images/linux.png" alt="Roraima"/>
					<img src="/images/postgresql.png" alt="Roraima"/>
					<a href="javascript: var w = window.open('http://symfony-project.org')"> <img src="/images/symfony.png" alt="Roraima"/> </a>
				</div>
      </div>
		</div>		
	</body>

</html>


