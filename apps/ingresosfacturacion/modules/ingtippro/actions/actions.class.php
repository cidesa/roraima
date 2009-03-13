<?php

/**
 * ingtippro actions.
 *
 * @package    siga
 * @subpackage ingtippro
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class ingtipproActions extends autoingtipproActions
{

 protected function updateIntipproFromRequest()
	{
		$intipprof = $this->getRequestParameter('intipprof');

		if (isset($intipprof['codtipprof']))
	    {
	      $this->intipprof->setCodtipprof(str_pad($intipprof['codtipprof'], 4, '0', STR_PAD_LEFT));
	    }
	    if (isset($intipprof['destipprof']))
	    {
	      $this->intipprof->setDestipprof($intipprof['destipprof']);
	    }
    }


  public function saving($intipprof)
  {

      $sql="select max(id) as num from intipprof";
      if (Herramientas::BuscarDatos($sql,&$result))
		          {
		          	//H::printR ($result);
		          	$intipprof->setCodtipprof((str_pad($result[0]["num"]+1, 4, '0', STR_PAD_LEFT)));
		          }

    return parent::saving($intipprof);
  }

}
