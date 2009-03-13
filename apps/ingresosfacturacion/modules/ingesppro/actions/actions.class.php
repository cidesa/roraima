<?php

/**
 * ingesppro actions.
 *
 * @package    siga
 * @subpackage ingesppro
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class ingespproActions extends autoingespproActions
{

    protected function updateInespeciFromRequest()
	{
		$inespeci = $this->getRequestParameter('inespeci');

		if (isset($inespeci['codespeci']))
	    {
	      $this->inespeci->setCodespeci(str_pad($inespeci['codespeci'], 4, '0', STR_PAD_LEFT));
	    }
	    if (isset($inespeci['desespeci']))
	    {
	      $this->inespeci->setDesespeci($inespeci['desespeci']);
	    }
    }

  public function saving($inespeci)
  {

      $sql="select max(id) as num from inespeci";
      if (Herramientas::BuscarDatos($sql,&$result))
		          {
		          	//H::printR ($result);
		          	$inespeci->setCodespeci((str_pad($result[0]["num"]+1, 4, '0', STR_PAD_LEFT)));
		          }

    return parent::saving($inespeci);

  }


}
