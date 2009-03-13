<?php

/**
 * ingregsan actions.
 *
 * @package    siga
 * @subpackage ingregsan
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class ingregsanActions extends autoingregsanActions
{

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
