<?php

/**
 * ingdefdes actions.
 *
 * @package    Roraima
 * @subpackage ingdefdes
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class ingdefdesActions extends autoingdefdesActions
{

    /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateIndefdesFromRequest()
	{
		$indefdes = $this->getRequestParameter('indefdes');

		if (isset($indefdes['coddes']))
	    {
	      $this->indefdes->setCoddes(str_pad($indefdes['coddes'], 4, '0', STR_PAD_LEFT));
	    }
	    if (isset($indefdes['desdes']))
	    {
	      $this->indefdes->setDesdes($indefdes['desdes']);
	    }
	    if (isset($indefdes['tipdes']))
	    {
	      $this->indefdes->setTipdes($indefdes['tipdes']);
	    }
	    if (isset($indefdes['valdes']))
	    {
	      $this->indefdes->setValdes($indefdes['valdes']);
	    }
	    if (isset($indefdes['diades']))
	    {
	      $this->indefdes->setDiades($indefdes['diades']);
	    }
	    if (isset($indefdes['tipret']))
	    {
	      $this->indefdes->setTipret($indefdes['tipret']);
	    }
	    if (isset($indefdes['cuecon']))
	    {
	      $this->indefdes->setCuecon($indefdes['cuecon']);
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
  public function saving($indefdes)
  {
  	  $sql="select max(id) as num from indefdes";

      if (Herramientas::BuscarDatos($sql,&$result))
		{
		          	//H::printR ($result);
		          	$indefdes->setCoddes((str_pad($result[0]["num"]+1, 4, '0', STR_PAD_LEFT)));
		 }

    return parent::saving($indefdes);

  }


}
