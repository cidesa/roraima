<?php

/**
 * Subclase para representar una fila de la tabla 'atdetrecayu'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.ciudadanos
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Atdetrecayu extends BaseAtdetrecayu
{
  protected $entregado = false;
  protected $desrec = '';
  protected $requerido = '';

  public function afterHydrate(){

    $atrecaud = $this->getAtrecaud();
    if($atrecaud)
    {
       $this->desrec = $atrecaud->getDesrec();
       if ($atrecaud->getRequerido()=="S")
           $this->requerido="Si";
       else if ($atrecaud->getRequerido()=="N")
           $this->requerido="No";
       else  $this->requerido="";
    }

  }


  public function getRecaudid()
  {
    return $this->getAtrecaudId();
  }

  public function setRecaudid($id)
  {
    $this->setAtrecaudId($id);
  }


}
