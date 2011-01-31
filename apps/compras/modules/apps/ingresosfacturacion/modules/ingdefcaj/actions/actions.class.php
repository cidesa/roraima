<?php

/**
 * ingdefcaj actions.
 *
 * @package    Roraima
 * @subpackage ingdefcaj
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class ingdefcajActions extends autoingdefcajActions
{

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateIndefcajFromRequest()
	{
		$indefcaj = $this->getRequestParameter('indefcaj');

		if (isset($indefcaj['codcaj']))
	    {
	      $this->indefcaj->setCodcaj(str_pad($indefcaj['codcaj'], 4, '0', STR_PAD_LEFT));
	    }
	    if (isset($indefcaj['descaj']))
	    {
	      $this->indefcaj->setDescaj($indefcaj['descaj']);
	    }
    }

  /**
   * Función para colocar el codigo necesario para 
   * el proceso de guardar.
   * Esta función debe retornar un valor igual a -1 si no hubo 
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function saving($indefcaj)
  {

      $sql="select max(id) as num from indefcaj";
      if (Herramientas::BuscarDatos($sql,&$result))
		          {
		          	//H::printR ($result);
		          	$indefban->setCodcaj((str_pad($result[0]["num"]+1, 4, '0', STR_PAD_LEFT)));
		          }


    return parent::saving($indefcaj);

  }

}
