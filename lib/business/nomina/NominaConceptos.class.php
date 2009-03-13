<?php

class NominaConceptos{

	public static function ValidarExistenciaDatos($codnom,$codcon)
	{
		$c = new Criteria();
		$c->add(NpcalconPeer::CODCON,$codcon);
		$c->add(NpcalconPeer::CODNOM,$codnom);
		$obj = NpcalconPeer::doSelect($c);

		if ($obj)
		  return '0';
		else
          return '-1';
	}

  public static function obtenerObjNpasiconemp($codtippre,$codemp)
    {

    	$c = new Criteria();
		$c->add(NptipprePeer::CODTIPPRE,$codtippre);
		$obj = NptipprePeer::doSelectOne($c);
		if ($obj)
		    $codcon= $obj->getCodcon();
		else
		   $codcon="";

		$a = new Criteria();
		$a->add(NpasiconempPeer::CODCON,$codcon);
		$a->add(NpasiconempPeer::CODEMP,$codemp);
		$obj2 = NpasiconempPeer::doSelectOne($a);

		return $obj2;

    }



	public static function validarNomperhispre($codtippre, $codemp)
	{
        $obj2= self::obtenerObjNpasiconemp($codtippre,$codemp);
		if ($obj2)
		  return -1;
		else
          return 417;

    }


    public static function salvarNomperhispre($nphispre)
	{

		if($nphispre->getId()==''){

            $obj2= self::obtenerObjNpasiconemp($nphispre->getCodtippre(),$nphispre->getCodemp());

            if ($nphispre->getSigno()=='-'){

                  $actual=$nphispre->getSalant() - $nphispre->getMonpre();
                  $monpre= -1 * $nphispre->getMonpre();

		    }else {

		    	 $actual=$nphispre->getSalant() + $nphispre->getMonpre();
		    	 $monpre=$nphispre->getMonpre();


		    }

			$obj2->setAcumulado($actual);
			$obj2->setCantidad($nphispre->getMoncuota());
			$obj2->setMonto($actual);


	    	$nphispre->setMonpre($monpre);
	    	//print $nphispre->getMonpre();exit;

			$obj2->save();
			$nphispre->save();

		}

		return -1;
    }

        public static function borrarNomperhispre($nphispre)
	{
		if($nphispre->getId()!=''){

			$obj2= self::obtenerObjNpasiconemp($nphispre->getCodtippre(),$nphispre->getCodemp());

            $monto=$obj2->getAcumulado() - $nphispre->getMonpre();
            $obj2->setAcumulado($monto);
            $obj2->setMonto($monto);
			$obj2->setCantidad($nphispre->getMoncuota());
            $obj2->save();
			$nphispre->delete();


		}

		return -1;


    }



    ////////////////Prestamos NomPerPrestamos /////////////////////////////////////

	public static function ActualizarNpasiconemp($grid)
	{
	  $x=$grid[0];
	  $j=0;
	  while ($j<count($x))
	  {
	    if ($x[$j]->getCodemp()!="")
	    {
		    $x[$j]->save();
	    }
	   $j++;
      }
	}

  public static function ValidarDatosenGrid($grid)
  {
      $x=$grid[0];
      $j=0;
      $sel=false;
      while ($j<count($x) && !$sel)
      {
        if ($x[$j]->getCodemp()!="")
        {
          if ($x[$j]->getCantidad() > $x[$j]->getMonto())
              return 418;
          else if ($x[$j]->getAcumulado()>$x[$j]->getMonto())
             return 419;
        }
        $j++;
      } //while ($j<count($x))
      return -1;

  }

      //////////////////////////////////////////////////////////////////////
}
?>