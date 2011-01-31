<?php

/**
 * fordefmun actions.
 *
 * @package    Roraima
 * @subpackage fordefmun
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 32379 2009-09-01 16:59:06Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class fordefmunActions extends autofordefmunActions
{

	/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->fordefmun = $this->getFordefmunOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFordefmunFromRequest();

      $this->saveFordefmun($this->fordefmun);

      $this->fordefmun->setId(self::obtenerId($this->fordefmun->getCodest(),$this->fordefmun->getCodmun()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fordefmun/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fordefmun/list');
      }
      else
      {
        return $this->redirect('fordefmun/edit?id='.$this->fordefmun->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
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
  protected function saveFordefmun($fordefmun)
  {
    Formulacion::salvarFordefmun($fordefmun);

  }

  public function obtenerId($dato1,$dato2)
  {
  	$c= new Criteria();
  	$c->add(FordefmunPeer::CODEST,$dato1);
  	$c->add(FordefmunPeer::CODMUN,$dato2);
  	$resul= FordefmunPeer::doSelectOne($c);
  	if ($resul)
  	{
  	  return $resul->getId();
  	}
  	else
  	{
  		return '';
  	}
  }

    public function executeEliminar()
  {
  	$estado=$this->getRequestParameter('estado');
    $municipio=$this->getRequestParameter('municipio');
    $id=$this->getRequestParameter('id');

  	$c= new Criteria();
  	$c->add(FordefparPeer::CODEST,$estado);
  	$c->add(FordefparPeer::CODMUN,$municipio);
  	$resultados= FordefparPeer::doSelect($c);
  	if ($resultados)
  	{
  	  $this->setFlash('notice','No se puede eliminar el Municipio, Tiene parroquias asociadas');
      return $this->redirect('fordefmun/edit?id='.$id);
  	}
  	else
  	{
  	  $c= new Criteria();
  	  $c->add(FordefmunPeer::CODEST,$estado);
  	  $c->add(FordefmunPeer::CODMUN,$municipio);
  	  $r=FordefmunPeer::doDelete($c);

  	  $this->setFlash('notice','Registro Eliminado exitosamente');
      return $this->redirect('fordefmun/edit');
  	}
  }

}
