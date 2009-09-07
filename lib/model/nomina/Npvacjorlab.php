<?php

/**
 * Subclase para representar una fila de la tabla 'npvacjorlab'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Npvacjorlab extends BaseNpvacjorlab
{
	protected $nomnom='';

 function getNomnom(){

 	$c= new Criteria();
 	$c->add(NpnominaPeer::CODNOM,self::getCodnom());
	$resul=NpnominaPeer::doselectOne($c);

  if ($resul)
   {return $resul->getNomnom();
   }
   else
   return null;
 }
}
