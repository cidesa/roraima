<?php

/**
 * ingtipsol actions.
 *
 * @package    siga
 * @subpackage ingtipsol
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class ingtipsolActions extends autoingtipsolActions
{

  public function editing()
  {
  	if ($this->intipsol->getId()=="")
  	{
	  	$sql="select max(id) as num from intipsol";
	    if (Herramientas::BuscarDatos($sql,&$result))
	    {
		  $this->intipsol->setCodtipsol(str_pad($result[0]["num"]+1, 4, '0', STR_PAD_LEFT));
	    }
	    else
	    {
	      $this->intipsol->setCodtipsol(str_pad(1, 4, '0', STR_PAD_LEFT));
	    }
  	}
  }

}
