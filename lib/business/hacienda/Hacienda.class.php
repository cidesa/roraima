<?php
class Hacienda
{
/* Funcion general del negocio
 * 1 izquierda
 * 2 intermedio
 * 3 derecha
 * aqui se hacen todos los procesos
 */
    public static function Obtener_mes($ano,&$valor_mes)
    /*Funcion utilizada para traer valor del mes por año*/
    {

            $result=array();
            $valor_mes=array();
            $sql = "Select tasano,tasmes,taspor From Fctasban Where tasano='".$ano."' order by tasmes";
            if (Herramientas::BuscarDatos($sql,&$result))
            {
                $i=0;
                  $msg='';
                  $cancotpril=count($result);
                  while ($i<count($result))
                  {
                    $valor_mes[$i]=$result[$i]['taspor'];
                    $i++;
                  }
                return true;
            }
            else
            {
            	return false;
            }
    }

    public static function salvar_grid_DefDesc($fcdefdesc, $grid)
    {
	  $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
        if ($x[$j]->getDiashasta()!="")
        {
	  	  $x[$j]->setCoddes($fcdefdesc->getCoddes());
          $x[$j]->save();
        }
		$j++;
      }
      $z=$grid[1];
      $j=0;
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }

    public static function salvar_grid_Fcdefrecdes($fcdefdesc, $grid)
    {
	  $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
		$x[$j]->setCoddes($fcdefdesc->getCoddes());
        $x[$j]->save();
		$j++;
      }
      $z=$grid[1];
      $j=0;
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }

    public static function salvar_grid_Fcdefsol($fctipsol, $grid)
    {
	  $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
		$x[$j]->setCodsol($fctipsol->getCodtip());
        $x[$j]->save();
		$j++;
      }
      $z=$grid[1];
      $j=0;
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }

    public static function salvar_grid_Fcdefrecint($fcdefrecint, $grid)
    {
	  $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
        if ($x[$j]->getDiashasta()!="")
        {
		  $x[$j]->setCodrec($fcdefrecint->getCodrec());
          $x[$j]->save();
        }
		$j++;
      }
      $z=$grid[1];
      $j=0;
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }

    public static function salvar_gridb_Fcdefrecint($fcdefrecint, $grid)
    {
	  $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
		$x[$j]->setCodrec($fcdefrecint->getCodrec());
        $x[$j]->save();
		$j++;
      }
      $z=$grid[1];
      $j=0;
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }

    public static function salvar_grid_Fcmultas($fcmultas, $grid)
    {
	  $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
        if ($x[$j]->getDiashasta()!="")
        {
		  $x[$j]->setCodmul($fcmultas->getCodmul());
          $x[$j]->save();
        }
		$j++;
      }
      $z=$grid[1];
      $j=0;
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }

    public static function salvar_gridb_Fcmultas($fcmultas, $grid)
    {
	  $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
		$x[$j]->setCodmul($fcmultas->getCodmul());
        $x[$j]->save();
		$j++;
      }
      $z=$grid[1];
      $j=0;
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }

    public static function salvar_grid_Fcdefpgi($fcdefpgi, $grid)
    {
	  $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
        $x[$j]->save();
		$j++;
      }
      $z=$grid[1];
      $j=0;
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }

    public static function salvar_grid_Fcaputip($fctipapu, $grid)
    {
	  $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
		$x[$j]->setTipapu($fctipapu->getTipapu());
        $x[$j]->save();
		$j++;
      }
      $z=$grid[1];
      $j=0;
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }

    public static function salvar_grid_Fcprotip($fctippro, $grid)
    {
	  $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
		$x[$j]->setTippro($fctippro->getTippro());
        $x[$j]->save();
		$j++;
      }
      $z=$grid[1];
      $j=0;
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }


    public static function salvar_grid_Fcesptip($fctipesp, $grid)
    {
	  $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
		$x[$j]->setTipesp($fctipesp->getTipesp());
        $x[$j]->save();
		$j++;
      }
      $z=$grid[1];
      $j=0;
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }

    public static function salvar_grid_Fcranpaginm($fcvalinm, $grid)
    {
	  $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
		$x[$j]->setCodzon($fcvalinm->getCodzon());
		$x[$j]->setDeszon($fcvalinm->getDeszon());
		$x[$j]->setAnovig($fcvalinm->getAnovig());
		$x[$j]->setValmtr($fcvalinm->getValmtr());
		$x[$j]->setPorvalfis($fcvalinm->getPorvalfis());
		$x[$j]->setValfis($fcvalinm->getValfis());
        $x[$j]->save();
		$j++;
      }
      $z=$grid[1];
      $j=0;
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }

    public static function salvar_grid_Facdefdprinm($fcdprinm, $grid)
    {
	  $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
		$x[$j]->setAnovig($fcdprinm->getAnovig());
        $x[$j]->save();
		$j++;
      }
      $z=$grid[1];
      $j=0;
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }

    public static function Cargar_mascara()
    {
        $result=array();
        $sql = "Select ".
                   "codpar,codmun,codedo,codpai,numniv,nomext1,nomabr1,tamano1,nomext2," .
                   "nomabr2,tamano2,nomext3,nomabr3,tamano3,nomext4,nomabr4," .
                   "tamano4,nomext5,nomabr5,tamano5,nomext6,nomabr6,tamano6,nomext7," .
                   "nomabr7,tamano7,nomext8,nomabr8,tamano8,nomext9,nomabr9,tamano9," .
                   "nomext10,nomabr10,tamano10,nivinm,numper,denumper" .
        		" from FCDefNca";
        $campos=array(0 => "codpar",1 => "codmun",2 => "codedo",3 => "codpai",4 => "numniv",
                      5 => "nomext1",6 => "nomabr1",7 => "tamano1",
                      8 => "nomext2",9 => "nomabr2",10 => "tamano2",
                      11 => "nomext3",12 => "nomabr3",13 => "tamano3",
                      14 => "nomext4",15=> "nomabr4",16 => "tamano4",
                      17 => "nomext5",18 => "nomabr5",19 => "tamano5",
                      20 => "nomext6",21=> "nomabr6",22 => "tamano6",
                      23 => "nomext7",24 => "nomabr7",25 => "tamano7",
                      26 => "nomext8",27=> "nomabr8",28 => "tamano8",
                      29 => "nomext9",30 => "nomabr9",31 => "tamano9",
                      32 => "nomext10",33=> "nomabr10",34 => "tamano10",
                      35 => "nivinm",36 => "numper",37 => "denumper");
        if (Herramientas::BuscarDatos($sql,&$result))
        {
         	$formatostring= $result[0]['nomabr1'];
			$formatopre=str_pad("",$result[0]['tamano1'],'#',STR_PAD_LEFT);
		    $valor=$result[0]['numniv'];
	        for ($i=1;$i<=((($valor+1)*3)-6);$i++)
	        {
		       $formatostring = $formatostring."-".$result[0][$campos[$i + 8]];
		       $formatopre = $formatopre."-".str_pad("",$result[0][$campos[$i + 9]], "#",STR_PAD_LEFT);
			   $i=$i+2;
			}

            return $formatopre;
        }
        else return "El Formato de los catastros no existe";
    }

    public static function salvar_grid_Facdatcon($fcconrep, $grid)
    {
	  $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
		$x[$j]->setRifcon($fcconrep->getRifcon());
        $x[$j]->save();
		$j++;
      }
      $z=$grid[1];
      $j=0;
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }

    public static function Combo_parroquia_Facdatcon($fcconrep)
    {
        $result=array();
        $arreglo = array();
        $sql="Select d.CodPar as CodParroquia, a.CodMun as CodMunicipio,a.CodEdo as CodEstado,a.CodPai as CodPais, d.NomPar as NombreParroquia, a.NomMun as NombreMunicipio,b.NomEdo  as NombreEstado, c.NomPai as NombrePais From FCParroq d,FCMunici a, FCEstado b, FCPais c where d.CodMun=a.CodMun and d.CodEdo=b.CodEdo and a.CodEdo=b.CodEdo and a.CodPai=b.CodPai  and b.CodPai=c.CodPai and c.CodPai=d.CodPai ORDER BY d.CodPai,d.CodEdo,d.CodMun,d.CodPar";
	    if (Herramientas::BuscarDatos($sql,&$result))
	    {
	        $i=0;
	        while ($i<count($result))
	        {
    	      $cadena_valor =$result[$i]['codparroquia'].'-'.$result[$i]['codmunicipio'].'-'.$result[$i]['codestado'].'-'.$result[$i]['codpais'];
    	      $cadena_texto =$result[$i]['nombreparroquia'].'-'.$result[$i]['nombremunicipio'].'-'.$result[$i]['nombreestado'].'-'.$result[$i]['nombrepais'];
	     	  $arreglo += array($cadena_valor => $cadena_texto);
	          $i++;
	        }
	    }
	    return $arreglo;
    }

    public static function Grabar_Anteriores($fcsollic)
    {
       $fcmodlic_new = new Fcmodlic();
       $fcmodlic_new->setRefmod($fcsollic->getIdlic());
       $fcmodlic_new->setFecmod($fcsollic->getFechlic());
       $fcmodlic_new->setMotmod($fcsollic->getComnlic());
       $fcmodlic_new->setNumsol($fcsollic->getNumsol());
       $fcmodlic_new->setNumlic($fcsollic->getNumsol());
       $fcmodlic_new->setFecsol($fcsollic->getFecsol());
       $fcmodlic_new->setFeclic($fcsollic->getFecsol());
       $fcmodlic_new->setRifcon($fcsollic->getRifcon());
       $fcmodlic_new->setNomcon($fcsollic->getNomcon());
       $fcmodlic_new->setDircon($fcsollic->getDircon());
       $fcmodlic_new->setRifrep($fcsollic->getRifrep());
       $fcmodlic_new->setNomneg($fcsollic->getNomneg());
       $fcmodlic_new->setTipinm($fcsollic->getTipinm());
       $fcmodlic_new->setTipest($fcsollic->getTipest());
       $fcmodlic_new->setCatcon($fcsollic->getCatcon());
       $fcmodlic_new->setDirpri($fcsollic->getDirpri());
       $fcmodlic_new->setCodrut($fcsollic->getCodrut());
       $fcmodlic_new->setCapsoc($fcsollic->getCapsoc());
	   if ($fcsollic->getHorini()!='') $fcmodlic_new->setHorini($fcsollic->getHorini());
       else $fcmodlic_new->setHorini("08:00:00 AM");
	   if ($fcsollic->getHorcie()!='') $fcmodlic_new->setHorcie($fcsollic->getHorcie());
	   else $fcmodlic_new->setHorcie("06:00:00 PM");
       $fcmodlic_new->setFecini($fcsollic->getFecini());
       $fcmodlic_new->setFecfin($fcsollic->getFecfin());
       $fcmodlic_new->setDiscli($fcsollic->getDiscli());
       $fcmodlic_new->setDisbar($fcsollic->getDisbar());
       $fcmodlic_new->setDisdis($fcsollic->getDisdis());
       $fcmodlic_new->setDisins($fcsollic->getDisins());
       $fcmodlic_new->setDisfun($fcsollic->getDisfun());
       $fcmodlic_new->setDisest($fcsollic->getDisest());
       $fcmodlic_new->setFunres($fcsollic->getFunres());
       $fcmodlic_new->setFecres($fcsollic->getFecres());
       $fcmodlic_new->setTaslic(0);
       $fcmodlic_new->setDeuacl(0);
       $fcmodlic_new->setImplic(0);
       $fcmodlic_new->setDeuacp(0);
       if ($fcsollic->getId()=='')
       {
	       $fcmodlic_new->setStasol("P");
	       $fcmodlic_new->setStalic("V");
	       $fcmodlic_new->setStadec("N");
	       $fcmodlic_new->setStaliq("N");
       }
       $fcmodlic_new->save();
       return true;
    }


    public static function Salvarneg($fcsollic)
    {
       $correlativo="";
       $c= new Criteria();
       $c->add(FcsollicPeer::NUMSOL,$fcsollic->getNumsol());
       $fcsollic_up = FcsollicPeer::doSelectOne($c);
       if (count($fcsollic_up)>0)
       {
              $fcsollic_up->setStasol("N");
              $fcsollic_up->save();
       }
	   $c= new Criteria();
       $c->addDescendingOrderByColumn(FcsolnegPeer::NUMNEG);
       $reg = FcsolnegPeer::doSelectOne($c);
       if (count($reg)>0)
		$correlativo=str_pad(trim($reg->getNumneg()+1),10,'0',STR_PAD_LEFT);
       else
      	$correlativo=str_pad(1,10,'0',STR_PAD_LEFT);
       $fcsolneg_new = new Fcsolneg();
       $fcsolneg_new->setNumsol($fcsollic->getNumsol());
       $fcsolneg_new->setNumneg($correlativo);
       $fcsolneg_new->setResolu($fcsollic->getResolu());
       $fcsolneg_new->setFunneg($fcsollic->getFunneg());
       $fcsolneg_new->setTomon($fcsollic->getTomon());
       $fcsolneg_new->setNumeron($fcsollic->getNumeron());
       $fcsolneg_new->setFolion($fcsollic->getFolion());
       $fcsolneg_new->setMotneg($fcsollic->getMotneg());
       $fcsolneg_new->setFecneg($fcsollic->getFecneg());
       $fcsolneg_new->save();
       return true;
    }

    public static function salvar_grid_Fcsollic($fcsollic, $grid)
    {
	  $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
		$x[$j]->setNumsol($fcsollic->getNumsol());
        $x[$j]->save();
		$j++;
      }
      $z=$grid[1];
      $j=0;
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }

    public static function Listlic()
    {
	    $c = new Criteria();
	    $lista = FctiplicPeer::doSelect($c);
	    $modulos = array();
	    foreach($lista as $arr)
	    {
	      $modulos += array($arr->getCodtiplic() => $arr->getDestiplic());
	    }
	    return $modulos;
    }

    public static function Grabar_Facpiclic($fcsollic)
    {
       $c= new Criteria();
       $c->add(FcsollicPeer::NUMSOL,$fcsollic->getNumsol());
       $fcsollic_up = FcsollicPeer::doSelectOne($c);
       if (count($fcsollic_up)>0)
       {
              $fcsollic_up->setImplic($fcsollic->getImplic());
              $fcsollic_up->setTomo($fcsollic->getTomo());
              $fcsollic_up->setFolio($fcsollic->getFolio());
              $fcsollic_up->setNumero($fcsollic->getNumero());
              $fcsollic_up->setFecapr($fcsollic->getFecapr());
              $fcsollic_up->setFecven($fcsollic->getFecven());
              $fcsollic_up->setFecinilic($fcsollic->getFecinilic());
              $fcsollic_up->setStasol("A");
              $fcsollic_up->setNumlic($fcsollic->getNumlic());
              $fcsollic_up->setFunrel($fcsollic->getFunrel());
              $fcsollic_up->setCodtiplic($fcsollic->getCodtiplic());
              $fcsollic_up->save();
	    }
       return true;
    }

    public static function Grabar_Facpiclic_Suspencion_Cancelacion($fcsollic)
    {
       $correlativo="";
       $c= new Criteria();
       $c->add(FcsollicPeer::NUMSOL,$fcsollic->getNumsol());
       $fcsollic_up = FcsollicPeer::doSelectOne($c);
       if (count($fcsollic_up)>0)
       {
           /*ACTUALIZAMOS FCSOLLIC*/
           $fcsollic_up->setStalic($fcsollic->getOperacion());
           $fcsollic_up->save();
           /*FIN ACTUALIZAR */
           $c= new Criteria();
           $c->addDescendingOrderByColumn(FcsuscanPeer::NUMSUS);
	       $reg = FcsuscanPeer::doSelectOne($c);
	       if (count($reg)>0) $correlativo=str_pad(trim($reg->getNumsus()+1),10,'0',STR_PAD_LEFT);
	       else	$correlativo=str_pad(1,10,'0',STR_PAD_LEFT);
	       $fcsuscan_new = new Fcsuscan();
	       $fcsuscan_new->setNumsus($correlativo);
	       $fcsuscan_new->setNumsol($fcsollic->getNumsol());
	       $fcsuscan_new->setNumlic($fcsollic->getNumlic());
	       $fcsuscan_new->setFunsus($fcsollic->getFunsus());
	       $fcsuscan_new->setTomo($fcsollic->getSolsus());
	       $fcsuscan_new->setNumero($fcsollic->getActsus());
	       $fcsuscan_new->setFolio($fcsollic->getFolsus());
	       $fcsuscan_new->setResolu($fcsollic->getResolsus());
	       $fcsuscan_new->setMotsus($fcsollic->getMotsus());
	       $fcsuscan_new->setFecsus($fcsollic->getFecsus());
	       $fcsuscan_new->setEstlic($fcsollic->getOperacion());
	       $fcsuscan_new->save();
	    }
       return true;
    }


    public static function Grabar_Reactivar($fcsollic)
    {
       $c= new Criteria();
       $c->add(FcsollicPeer::NUMLIC,$fcsollic->getNumlic());
       $fcsollic_up = FcsollicPeer::doSelectOne($c);
       if (count($fcsollic_up)>0)
       {
           $fcsollic_up->setStalic("V");
           $fcsollic_up->save();
	    }
       return true;
    }

    public static function Grabar_Renovar($fcsollic)
    {
       $c= new Criteria();
       $c->add(FcsollicPeer::NUMLIC,$fcsollic->getNumlic());
       $fcsollic_up = FcsollicPeer::doSelectOne($c);
       if (count($fcsollic_up)>0)
       {
           $fcsollic_up->setStalic("V");
           $fcsollic_up->setFecini("01/01/".date("Y"));
           $fcsollic_up->setFecfin("31/12/".date("Y"));
           $fcsollic_up->setFecapr($fcsollic_up->getFecapr());
           $fcsollic_up->setFecven($fcsollic_up->getFecven());
           $fcsollic_up->save();
	       $fcrenlic_new = new Fcrenlic();
	       $fcrenlic_new->setNumlic($fcsollic->getNumlic());
	       $fcrenlic_new->setFecven($fcsollic->getFecven());
	       $fcrenlic_new->setFecren(date("d/m/Y"));
	       $fcrenlic_new->save();
	    }
       return true;
    }


}
?>