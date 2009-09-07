<?php

/**
 * ingtipemp actions.
 *
 * @package    Roraima
 * @subpackage ingtipemp
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class ingtipempActions extends autoingtipempActions
{

    /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateInespeciFromRequest()
	{
		$intipemp = $this->getRequestParameter('intipemp');

		if (isset($intipemp['codtipemp']))
	    {
	      $this->intipemp->setCodtipemp(str_pad($intipemp['codtipemp'], 4, '0', STR_PAD_LEFT));
	    }
	    if (isset($intipemp['destipemp']))
	    {
	      $this->intipemp->setDestipemp($intipemp['destipemp']);
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
  public function saving($intipemp)
  {

      $sql="select max(id) as num from intipemp";
      if (Herramientas::BuscarDatos($sql,&$result))
		          {
		          	//H::printR ($result);
		          	$intipemp->setCodtipemp((str_pad($result[0]["num"]+1, 4, '0', STR_PAD_LEFT)));
		          }

    return parent::saving($intipemp);

  }

}
