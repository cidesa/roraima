<?php

/**
 * ingdefdes actions.
 *
 * @package    siga
 * @subpackage ingdefdes
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class ingdefdesActions extends autoingdefdesActions
{

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
