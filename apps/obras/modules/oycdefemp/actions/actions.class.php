<?php

/**
 * oycdefemp actions.
 *
 * @package    Roraima
 * @subpackage oycdefemp
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class oycdefempActions extends autooycdefempActions
{
  public function executeIndex()
  {
    $c= new Criteria();
  	$c->add(OcdefempPeer::CODEMP,'001');
  	$resul= OcdefempPeer::doSelectOne($c);
  	if ($resul)
  	{
  	 $id=$resul->getId();
  	 return $this->redirect('oycdefemp/edit?id='.$id);
  	}
  	else
  	{
  	  return $this->redirect('oycdefemp/edit');
  	}
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    switch ($ajax){
      case '1':
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }

  /**
   * Función para manejar el salvado del formulario.
   * cabe destacar que en las versiones nuevas del formulario (cidesaPropel)
   * llama internamente a la función $this->saving
   * Esta función saving siempre debe retornar un valor >=-1.
   * En esta funcción se debe realizar el proceso de guardado de informacion
   * del negocio en la base de datos. Este proceso debe ser realizado llamado
   * a funciones de las clases del negocio que se encuentran en lib/bussines
   * todos los procesos de guardado deben estar en la clases del negocio (lib/bussines/"modulo")
   *
   */
  protected function saveOcdefemp($ocdefemp)
  {
  	$ocdefemp->setCodemp('001');
  	if ($ocdefemp->getIvaant()=='1')
  	$ocdefemp->setIvaant('S');
  	else $ocdefemp->setIvaant(null);

  	if ($ocdefemp->getRetant()=='1')
  	$ocdefemp->setRetant('S');
  	else $ocdefemp->setRetant(null);
    $ocdefemp->save();

  }
}
