<?php

/**
 * inggruprec actions.
 *
 * @package    siga
 * @subpackage inggruprec
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class inggruprecActions extends autoinggruprecActions
{

   protected function updateIngruprecFromRequest()
	{
		$ingruprec = $this->getRequestParameter('ingruprec');

		if (isset($ingruprec['codgrup']))
	    {
	      $this->ingruprec->setCodgrup(str_pad($ingruprec['codgrup'], 4, '0', STR_PAD_LEFT));
	    }
	    if (isset($ingruprec['desgrup']))
	    {
	      $this->ingruprec->setDesgrup($ingruprec['desgrup']);
	    }
    }

  public function saving($ingruprec)
  {
  	  $sql="select max(id) as num from ingruprec";

      if (Herramientas::BuscarDatos($sql,&$result))
		{
		          	//H::printR ($result);
		          	$ingruprec->setCodgrup((str_pad($result[0]["num"]+1, 4, '0', STR_PAD_LEFT)));
		 }

    return parent::saving($ingruprec);

  }


}
