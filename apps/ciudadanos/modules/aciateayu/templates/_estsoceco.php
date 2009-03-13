
  <?php 

  if(SF_ENVIRONMENT=='dev') $dev = '_dev';
  else $dev = '';

  if($atayudas->countAtestsocecos()==1) echo "<a href=\"javascript: var w = window.open('/ciudadanos".$dev.".php/aciestsoceco/edit/id/".$atayudas->getId()."')\">Editar Estudio Socio-Economico</a>";
  else echo '<b>No existe Estudio Socio-Economico para esta solicitud<b> <br>'."<a href=\"javascript: var w = window.open('/ciudadanos".$dev.".php/aciestsoceco/create')\">Crear Estudio Socio-Economico</a>"; 

  ?>

