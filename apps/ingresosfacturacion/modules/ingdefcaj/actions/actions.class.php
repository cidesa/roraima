<?php

/**
 * ingdefcaj actions.
 *
 * @package    siga
 * @subpackage ingdefcaj
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class ingdefcajActions extends autoingdefcajActions
{

  protected function updateIndefcajFromRequest()
	{
		$indefcaj = $this->getRequestParameter('indefcaj');

		if (isset($indefcaj['codcaj']))
	    {
	      $this->indefcaj->setCodcaj(str_pad($indefcaj['codcaj'], 4, '0', STR_PAD_LEFT));
	    }
	    if (isset($indefcaj['descaj']))
	    {
	      $this->indefcaj->setDescaj($indefcaj['descaj']);
	    }
    }

  public function saving($indefcaj)
  {

      $sql="select max(id) as num from indefcaj";
      if (Herramientas::BuscarDatos($sql,&$result))
		          {
		          	//H::printR ($result);
		          	$indefban->setCodcaj((str_pad($result[0]["num"]+1, 4, '0', STR_PAD_LEFT)));
		          }


    return parent::saving($indefcaj);

  }

}
