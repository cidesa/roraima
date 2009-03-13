<?php

/**
 * ingtipmul actions.
 *
 * @package    siga
 * @subpackage ingtipmul
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class ingtipmulActions extends autoingtipmulActions
{

    protected function updateIntipmulFromRequest()
	{
		$intipmul = $this->getRequestParameter('intipmul');

		if (isset($intipmul['codtipmul']))
	    {
	      $this->intipmul->setCodtipmul(str_pad($intipmul['codtipmul'], 4, '0', STR_PAD_LEFT));
	    }
	    if (isset($intipmul['destipmul']))
	    {
	      $this->intipmul->setDestipmul($intipmul['destipmul']);
	    }
    }


   public function saving($intipmul)
   {

      $sql="select max(id) as num from intipmul";
      if (Herramientas::BuscarDatos($sql,&$result))
		          {
		          	//H::printR ($result);
		          	$intipmul->setCodtipmul((str_pad($result[0]["num"]+1, 4, '0', STR_PAD_LEFT)));
		          }

    return parent::saving($intipmul);

   }

}
