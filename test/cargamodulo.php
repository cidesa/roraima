
<?php
$lime = $b->test();

if(!strstr($modulo,'.php') && ($solo=='formularios' || $solo=='all')){

  print "# Probando modulo ".$m." \n";
  $b->get('/'.$modulo.'/index');
  if($b->getResponse()->getStatusCode()=='302') $b->isStatusCode('302');
  else $b->isStatusCode();
  $b->isRequestParameter('module', $modulo)->
  isRequestParameter('action', 'index');
  if ($b->Redirect()) $b->followRedirect();

  $b->check('/'.$modulo.'/'.$b->getRequest()->getParameter('action'),'Copyleft CIDESA 2011. Distribuido bajo la licencia GNU/GPL V2.0');
  $b->uncheck('/'.$modulo.'/'.$b->getRequest()->getParameter('action'),'Notice');
  $b->uncheck('/'.$modulo.'/'.$b->getRequest()->getParameter('action'),'Warning');


  $b->get('/'.$modulo.'/list');
  if($b->getResponse()->getStatusCode()=='302') $b->isStatusCode('302');
  else $b->isStatusCode();
  $b->isRequestParameter('module', $modulo)->
  isRequestParameter('action', 'list');
  if ($b->Redirect()) $b->followRedirect();

  $b->check('/'.$modulo.'/'.$b->getRequest()->getParameter('action'),'Copyleft CIDESA 2011. Distribuido bajo la licencia GNU/GPL V2.0');
  $b->uncheck('/'.$modulo.'/'.$b->getRequest()->getParameter('action'),'Notice');
  $b->uncheck('/'.$modulo.'/'.$b->getRequest()->getParameter('action'),'Warning');


  $b->get('/'.$modulo.'/create');
  if($b->getResponse()->getStatusCode()=='302') $b->isStatusCode('302');
  else $b->isStatusCode();
  $b->isRequestParameter('module', $modulo)->
  isRequestParameter('action', 'create');
  if ($b->Redirect()) $b->followRedirect();

  $b->check('/'.$modulo.'/'.$b->getRequest()->getParameter('action'),'Copyleft CIDESA 2011. Distribuido bajo la licencia GNU/GPL V2.0');
  $b->uncheck('/'.$modulo.'/'.$b->getRequest()->getParameter('action'),'Notice');
  $b->uncheck('/'.$modulo.'/'.$b->getRequest()->getParameter('action'),'Warning');



  $b->get('/'.$modulo.'/edit');
  if($b->getResponse()->getStatusCode()=='302') $b->isStatusCode('302');
  else $b->isStatusCode();
  $b->isRequestParameter('module', $modulo)->
  isRequestParameter('action', 'edit');
  if ($b->Redirect()) $b->followRedirect();

  $b->check('/'.$modulo.'/edit','Copyleft CIDESA 2011. Distribuido bajo la licencia GNU/GPL V2.0');
  $b->uncheck('/'.$modulo.'/edit','Notice');
  $b->uncheck('/'.$modulo.'/edit','Warning');

print "# Fin Prueba '.$m.' \n";
print "\n";
print "\n";


}elseif(strstr($modulo,'.php') && ($solo=='all' || $solo=='reportes')){

  print "# Probando reporte ".$m." \n";
  $contador=0;
  $contadormalos=0;
  $contadorbuenos=0;
  //foreach($mod as $objm){
    //$contador= $contador + 1;
    //$nombre=strtolower($objm);
    $test = &new cidesaBrowser($app,$modulo,$hostname);
    $test->setLime($lime);
    $test->run(new TextReporter());
    //$test->obtenerContadores($cont1,$cont2);
    //$contadorbuenos=$contadorbuenos+$cont1;
    //$contadormalos=$contadormalos+$cont2;
    //print "<br></br>";
  //}

print "# Fin Prueba Reporte '.$m.' \n";
print "\n";
print "\n";


//print "<br><strong>---ESTADÍSTICAS FINALES----</strong></br><br><strong>Total de Reportes probados = ".$contador."</strong></br><br><strong> Total Reportes Correctos = ".$contadorbuenos."</strong></br><br><strong> Total Reportes Incorrectos = ".$contadormalos." </strong></br>";


}

