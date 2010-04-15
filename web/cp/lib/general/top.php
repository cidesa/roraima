

<div id="container">
  <div id="roraimaheader">
    <div id="ctmenu">
      <img class="logo-cidesa" src="/images/logo-cidesa.png" alt="Cidesa"/>
      <div id="menu">
        <ul class="list">
          <li class="menu-on"><a href="javascript:self.close()">Cerrar Ventana</a></li>
          <li><a href= "">Ayuda en linea</a></li>
          <li><a href="javascript: var w = window.open('http://comunidad.roraima.cidesa.com.ve')">Comunidad</a></li>
          <li><a href="">Cerrar Sesion</a></li>
        </ul>
      </div>
      <div id="info-user">
        <span class="user">Usuario: <span><?php echo $_SESSION["usuario"]; ?></span></span>
        <span class="company">Empresa:<span><?php echo $_SESSION["nomemp"] ?></span></span>
      </div>              
    </div>
      <div id="logo-app">
        <img src="/images/logo.png" alt="Roraima"/>
        <span>Modulo Contabilidad</span>
      </div>

  </div>
</div>  
		  
		  	


