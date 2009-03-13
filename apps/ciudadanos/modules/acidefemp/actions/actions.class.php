<?php

/**
 * acidefemp actions.
 *
 * @package    siga
 * @subpackage acidefemp
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class acidefempActions extends autoacidefempActions
{

  public function executeIndex()
  {
    $c= new Criteria();
  	$c->add(AtdefempPeer::CODEMP,'001');
  	$resul= AtdefempPeer::doSelectOne($c);
  	if ($resul)
  	{
  	 $id=$resul->getId();
  	 return $this->redirect('acidefemp/edit?id='.$id);
  	}
  	else
  	{
  	  return $this->redirect('acidefemp/edit');
  	}
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {


  }


  public function validateEdit()
  {
    $this->coderr =-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en
      // el archivo errors.yml en la función handleErrorEdit()

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;



  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    //$this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($acidefemp)
  {
    $acidefemp->setCodemp('001');
    return parent::saving($acidefemp);
  }

  public function deleting($acidefemp)
  {
    return parent::deleting($acidefemp);
  }


}
