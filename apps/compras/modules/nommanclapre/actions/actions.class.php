<?php

/**
 * nommanclapre actions.
 *
 * @package    siga
 * @subpackage nommanclapre
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class nommanclapreActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    //$this->forward('default', 'module');

  }

  public function executeSave()
  {
  if (Compras::EjecutaClasificador())
       $this->setFlash('notice1', 'Clasificador de Partidas Generado con Exito');
    else
       $this->setFlash('notice2', 'No se pudo generar el Clasificador de Partidas, ya que no se han definido los niveles de rupturas en Presupuesto');

    return $this->redirect('nommanclapre/index');
  }


}
