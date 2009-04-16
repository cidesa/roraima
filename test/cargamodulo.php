<?php
<?php
$lime = $b->test();

if(!strstr($modulo,'.php')){

  print "# Probando modulo ".$m." \n";
  $b->get('/'.$modulo.'/index')->
  isStatusCode()->
  isRequestParameter('module', $modulo)->
  isRequestParameter('action', 'index');
  $b->get('/'.$modulo.'/index');

  $b->check('/'.$modulo.'/index','Copyleft CIDESA 2007. Distribuido bajo la licencia GNU/GPL V2.0');
  $b->uncheck('/'.$modulo.'/index','Notice');
  $b->uncheck('/'.$modulo.'/index','Warning');


  $b->get('/'.$modulo.'/list')->
  isStatusCode()->
  isRequestParameter('module', $modulo)->
  isRequestParameter('action', 'list');
    $b->get('/'.$modulo.'/list');

  $b->check('/'.$modulo.'/list','Copyleft CIDESA 2007. Distribuido bajo la licencia GNU/GPL V2.0');
  $b->uncheck('/'.$modulo.'/list','Notice');
  $b->uncheck('/'.$modulo.'/list','Warning');


  $b->get('/'.$modulo.'/create')->
  isStatusCode()->
  isRequestParameter('module', $modulo)->
  isRequestParameter('action', 'create');
  $b->get('/'.$modulo.'/create');
  if ($b->Redirect()) $b->followRedirect();

  $b->check('/'.$modulo.'/create','Copyleft CIDESA 2007. Distribuido bajo la licencia GNU/GPL V2.0');
  $b->uncheck('/'.$modulo.'/create','Notice');
  $b->uncheck('/'.$modulo.'/create','Warning');




  $b->get('/'.$modulo.'/edit')->
  isStatusCode()->
  isRequestParameter('module', $modulo)->
  isRequestParameter('action', 'edit');
  $b->get('/'.$modulo.'/edit');
//  if (!$b->Redirect())
//  {
    $b->check('/'.$modulo.'/edit','Copyleft CIDESA 2007. Distribuido bajo la licencia GNU/GPL V2.0');
    $b->uncheck('/'.$modulo.'/edit','Notice');
    $b->uncheck('/'.$modulo.'/edit','Warning');
//  }

print "# Fin Prueba '.$m.' \n";
print "\n";
print "\n";


}else{

  print "# Probando reporte ".$m." \n";
  $contador=0;
  $contadormalos=0;
  $contadorbuenos=0;
  //foreach($mod as $objm){
    //$contador= $contador + 1;
    //$nombre=strtolower($objm);
    $test = &new cidesaBrowser($app,$modulo);
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

$lime = $b->test();

if(!strstr($modulo,'.php')){

  print "# Probando modulo ".$m." \n";
  $b->get('/'.$modulo.'/index')->
  isStatusCode()->
  isRequestParameter('module', $modulo)->
  isRequestParameter('action', 'index');
  $b->get('/'.$modulo.'/index');

  $b->check('/'.$modulo.'/index','Copyleft CIDESA 2007. Distribuido bajo la licencia GNU/GPL V2.0');
  $b->uncheck('/'.$modulo.'/index','Notice');
  $b->uncheck('/'.$modulo.'/index','Warning');


  $b->get('/'.$modulo.'/list')->
  isStatusCode()->
  isRequestParameter('module', $modulo)->
  isRequestParameter('action', 'list');
    $b->get('/'.$modulo.'/list');

  $b->check('/'.$modulo.'/list','Copyleft CIDESA 2007. Distribuido bajo la licencia GNU/GPL V2.0');
  $b->uncheck('/'.$modulo.'/list','Notice');
  $b->uncheck('/'.$modulo.'/list','Warning');


  $b->get('/'.$modulo.'/create')->
  isStatusCode()->
  isRequestParameter('module', $modulo)->
  isRequestParameter('action', 'create');
  $b->get('/'.$modulo.'/create');
  if ($b->Redirect()) $b->followRedirect();

  $b->check('/'.$modulo.'/create','Copyleft CIDESA 2007. Distribuido bajo la licencia GNU/GPL V2.0');
  $b->uncheck('/'.$modulo.'/create','Notice');
  $b->uncheck('/'.$modulo.'/create','Warning');




  $b->get('/'.$modulo.'/edit')->
  isStatusCode()->
  isRequestParameter('module', $modulo)->
  isRequestParameter('action', 'edit');
  $b->get('/'.$modulo.'/edit');
//  if (!$b->Redirect())
//  {
    $b->check('/'.$modulo.'/edit','Copyleft CIDESA 2007. Distribuido bajo la licencia GNU/GPL V2.0');
    $b->uncheck('/'.$modulo.'/edit','Notice');
    $b->uncheck('/'.$modulo.'/edit','Warning');
//  }

print "# Fin Prueba '.$m.' \n";
print "\n";
print "\n";


}else{

  print "# Probando reporte ".$m." \n";
  $contador=0;
  $contadormalos=0;
  $contadorbuenos=0;
  //foreach($mod as $objm){
    //$contador= $contador + 1;
    //$nombre=strtolower($objm);
    $test = &new cidesaBrowser($app,$modulo);
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

