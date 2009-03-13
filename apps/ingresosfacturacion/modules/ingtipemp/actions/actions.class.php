<?php

/**
 * ingtipemp actions.
 *
 * @package    siga
 * @subpackage ingtipemp
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class ingtipempActions extends autoingtipempActions
{

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
