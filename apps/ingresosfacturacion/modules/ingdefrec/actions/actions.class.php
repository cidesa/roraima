<?php

/**
 * ingdefrec actions.
 *
 * @package    siga
 * @subpackage ingdefrec
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class ingdefrecActions extends autoingdefrecActions
{

  public function saving($inrecaud)
  {
  	  $sql="select max(id) as num from inrecaud";

      if (Herramientas::BuscarDatos($sql,&$result))
		{
		          	//H::printR ($result);
		          	$inrecaud->setCodrec((str_pad($result[0]["num"]+1, 4, '0', STR_PAD_LEFT)));
		 }

    return parent::saving($inrecaud);

  }

}
