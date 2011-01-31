<?php

/**
 * ingregsan actions.
 *
 * @package    Roraima
 * @subpackage ingregsan
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class ingregsanActions extends autoingregsanActions
{

   /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateInregsanFromRequest()
	{
		$insancion = $this->getRequestParameter('insancion');

		if (isset($insancion['codsan']))
	    {
	      $this->insancion->setCodsan(str_pad($insancion['codsan'], 4, '0', STR_PAD_LEFT));
	    }
	    if (isset($insancion['dessan']))
	    {
	      $this->insancion->setDessan($insancion['dessan']);
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
  public function saving($insancion)
  {

      $sql="select max(id) as num from insancion";
      if (Herramientas::BuscarDatos($sql,&$result))
		          {
		          	//H::printR ($result);
		          	$insancion->setCodsan((str_pad($result[0]["num"]+1, 4, '0', STR_PAD_LEFT)));
		          }

    return parent::saving($insancion);
  }


}
