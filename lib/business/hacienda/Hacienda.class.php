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
		$x[$j]->setTipapu($fctippro->getTipapu());
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
        	$hasta=($result[0]['nivinm']*3)-6;
        	for ($i=1;$i<=$hasta;$i++)
        	{
		      $formatostring = $formatostring."-".$result[0][$campos[$i + 8]];
		      $formatopre = $formatopre."-".str_pad("",$result[0][$campos[$i + 9]], "#",STR_PAD_LEFT);
			  $i=$i+3;
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
}
?>