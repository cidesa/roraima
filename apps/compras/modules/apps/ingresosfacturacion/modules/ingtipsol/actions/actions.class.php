<?php

/**
 * ingtipsol actions.
 *
 * @package    Roraima
 * @subpackage ingtipsol
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class ingtipsolActions extends autoingtipsolActions
{

  /**
   * Función para colocar el codigo necesario en  
   * el proceso de edición.
   * Aquí se pueden buscar datos adicionales que necesite la vista
   * Esta función es parte de la acción executeEdit, que maneja tanto
   * el create como el edit del formulario.
   * Generalmente aqui se debe y puede colocar los llamados a los configGrid
   * Para generar la información de configuración de los grids.
   *
   */
  public function editing()
  {
  	if ($this->intipsol->getId()=="")
  	{
	  	$sql="select max(id) as num from intipsol";
	    if (Herramientas::BuscarDatos($sql,&$result))
	    {
		  $this->intipsol->setCodtipsol(str_pad($result[0]["num"]+1, 4, '0', STR_PAD_LEFT));
	    }
	    else
	    {
	      $this->intipsol->setCodtipsol(str_pad(1, 4, '0', STR_PAD_LEFT));
	    }
  	}
  }

}
