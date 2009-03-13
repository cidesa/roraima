<?php

/**
 * ingregmul actions.
 *
 * @package    siga
 * @subpackage ingregmul
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class ingregmulActions extends autoingregmulActions
{

  public function saving($inmulta)
  {

      $sql="select max(id) as num from inmulta";
      if (Herramientas::BuscarDatos($sql,&$result))
		          {
		          	//H::printR ($result);
		          	$inmulta->setCodmul((str_pad($result[0]["num"]+1, 4, '0', STR_PAD_LEFT)));
		          }

    return parent::saving($inmulta);

  }

}
