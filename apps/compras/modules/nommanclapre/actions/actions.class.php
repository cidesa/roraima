<?php

/**
 * nommanclapre actions.
 *
 * @package    Roraima
 * @subpackage nommanclapre
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * @version    SVN: $Id$
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

  /**
   * Función principal para el manejo de la acción save
   * del formulario.
   *
   */
  public function executeSave()
  {
  if (Compras::EjecutaClasificador())
       $this->setFlash('notice1', 'Clasificador de Partidas Generado con Exito');
    else
       $this->setFlash('notice2', 'No se pudo generar el Clasificador de Partidas, ya que no se han definido los niveles de rupturas en Presupuesto');

    return $this->redirect('nommanclapre/index');
  }


}
