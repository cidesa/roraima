
  <?php 

  if(SF_ENVIRONMENT=='dev') $dev = '_dev';
  else $dev = '';

  if($atayudas->countAtestsocecos()==1) echo "<a href=\"javascript: var w = window.open('/ciudadanos'+getEnv()+'.php/aciestsoceco/edit/id/".$atayudas->getId()."','','dependent=1,toolbar=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=1,width=ancho,height=alto')\">Editar Estudio Socio-Economico</a>";
  else echo '<b>No existe Informe de Visita Domiciliaria para esta solicitud<b> <br>'."<a href=\"javascript: var w = window.open('/ciudadanos'+getEnv()+'.php/aciestsoceco/create','','dependent=1,toolbar=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=1,width=ancho,height=alto')\">Crear Estudio Informe de Visita Domiciliaria</a>"; 

  ?>

