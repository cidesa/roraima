<?php

/**
 * ingdefban actions.
 *
 * @package    siga
 * @subpackage ingdefban
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class ingdefbanActions extends autoingdefbanActions
{

 protected function updateIndefbanFromRequest()
	{
		$indefban = $this->getRequestParameter('indefban');

		if (isset($indefban['codban']))
	    {
	      $this->indefban->setCodban(str_pad($indefban['codban'], 4, '0', STR_PAD_LEFT));
	    }
	    if (isset($indefban['desban']))
	    {
	      $this->indefban->setDesban($indefban['desban']);
	    }
    }


  public function saving($indefban)
  {

      $sql="select max(id) as num from indefban";
      if (Herramientas::BuscarDatos($sql,&$result))
		          {
		          	//H::printR ($result);
		          	$indefban->setCodban((str_pad($result[0]["num"]+1, 4, '0', STR_PAD_LEFT)));
		          }


    return parent::saving($indefban);
  }

}
