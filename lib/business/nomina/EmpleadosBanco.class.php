<?php

class EmpleadosBanco {

public static function ArregloEmpleados($codnom, &$arreglodet)
  {
  	$dato="";
  	$result=array();
  //  $sql="SELECT codpre as codpre, monto as monto, asided as asided, codcon as codcon FROM NPCIENOM WHERE CODNOM = '".$tipnom."' AND CodTipGas='".$gasto."' AND CODBAN='".$banco."' AND  (ASIDED='A' OR ASIDED='D') AND FECNOM=TO_DATE('".$fecha."','YYYY-MM-DD') Order By CodCon";
    $sql1="Select CodEmp,nomemp from npasicaremp Where CodNom='".$codnom."' and status='V' order by codemp";
    if (Herramientas::BuscarDatos($sql1,&$result1))
    {$i=0;
   	 $arreglodet=array();
     $arregloret=array();

    	while ($i<count($result1))
    	{
    	$sql2 = "Select a.codemp,b.nomemp,a.codban,c.nomban,a.cuenta_banco FROM npempleados_banco a,NpHojInt b,NpBancos c Where CodNom='".$codnom."' and a.codemp=b.codemp and a.codban=c.codban and a.codemp='".$result1[$i]["codemp"]."'";
    	if(Herramientas::BuscarDatos($sql2,&$result2))
        	{
              	$j=count($arreglodet)+1;
                $arreglodet[$j-1]["cedemp"]=$result2[0]["codemp"];
                $arreglodet[$j-1]["nomemp"]=$result2[0]["nomemp"];
                $arreglodet[$j-1]["codban"]=$result2[0]["codban"];
                $arreglodet[$j-1]["nomban"]=$result2[0]["nomban"];
                $arreglodet[$j-1]["cueban"]=$result2[0]["cuenta_banco"];
                $arreglodet[$j-1]["id"]="9";

        	}
    	else
    	{
    	$sql3="Select a.codemp, a.nomemp, a.codban, b.nomban, a.numcue FROM nphojint a,npbancos b Where a.codemp='".$result1[$i]["codemp"]."' and a.codban=b.codban";
    	if(Herramientas::BuscarDatos($sql3,&$result3))
    	       {
    		    $j=count($arreglodet)+1;
                $arreglodet[$j-1]["cedemp"]=$result3[0]["codemp"];
                $arreglodet[$j-1]["nomemp"]=$result3[0]["nomemp"];
                $arreglodet[$j-1]["codban"]=$result3[0]["codban"];
                $arreglodet[$j-1]["nomban"]=$result3[0]["nomban"];
                $arreglodet[$j-1]["cueban"]=$result3[0]["numcue"];
                $arreglodet[$j-1]["id"]="9";
    	       }

    	}
    $i++;
     }

    }

    return true;
   }
public static function ArregloCatEmpleados($codcon, &$arreglodet)
  {
  	$dato="";
  	$result=array();
  //  $sql="SELECT codpre as codpre, monto as monto, asided as asided, codcon as codcon FROM NPCIENOM WHERE CODNOM = '".$tipnom."' AND CodTipGas='".$gasto."' AND CODBAN='".$banco."' AND  (ASIDED='A' OR ASIDED='D') AND FECNOM=TO_DATE('".$fecha."','YYYY-MM-DD') Order By CodCon";
    $sql1="Select Distinct A.codemp,A.nomemp,A.codnom,A.nomnom,A.codcar,A.nomcar,B.codcon,B.nomcon,A.codcat
        From npasicaremp A,npasiconemp B
        Where A.codemp=B.codemp And
              A.codcar=B.codcar And
              B.codcon='".$codcon."' AND A.STATUS='V'
        Order By A.codnom,A.codemp ";
    if (Herramientas::BuscarDatos($sql1,&$result1))
    {$i=0;
   	 $arreglodet=array();


    	while ($i<count($result1))
    	{
              	$j=count($arreglodet)+1;
                $arreglodet[$j-1]["codemp"]=$result1[$i]["codemp"];
                $arreglodet[$j-1]["nomemp"]=$result1[$i]["nomemp"];
                $arreglodet[$j-1]["codnom"]=$result1[$i]["codnom"];
                $arreglodet[$j-1]["nomnom"]=$result1[$i]["nomnom"];
                $arreglodet[$j-1]["codcar"]=$result1[$i]["codcar"];
                $arreglodet[$j-1]["nomcar"]=$result1[$i]["nomcar"];
                $sql2 = "Select * FROM NPASICATCONEMP WHERE CODEMP='".$result1[$i]["codemp"]."' and codcar = '".$result1[$i]["codcar"]."' and codnom = '".$result1[$i]["codnom"]."' and codcon = '".$result1[$i]["codcon"]."'";

                if(Herramientas::BuscarDatos($sql2,&$result2))
        	    {

                   $arreglodet[$j-1]["codcat"]=$result2[0]["codcat"];
                   $sql3= "Select nompar FROM npcatpre WHERE codcat='".$result2[0]["codcat"]."'";
                   Herramientas::BuscarDatos($sql3,&$result3);
                   $arreglodet[$j-1]["nompar"]=$result3[0]["nompar"];
              	}

              	else
              	{
              	   $arreglodet[$j-1]["codcat"]=$result1[$i]["codcat"];
                   $sql4= "Select nompar FROM npcatpre WHERE codcat='".$result1[$i]["codcat"]."'";
                   Herramientas::BuscarDatos($sql4,&$result4);
                   $arreglodet[$j-1]["nompar"]=$result4[0]["nompar"];

              	}

    	$i++;
       }

    }
   return true;
  }
public static function Grabar_grid_Npasicatconemp($npasicatconemp,$grid,$codigo='')
{
		  $x=$grid[0];
		  $i=0;
		  while ($i<count($x))
		  {
		    $c= new Criteria();
		    $c->add(NpasicatconempPeer::CODEMP,$x[$i]["codemp"]);
		    $empbamc = NpasicatconempPeer::doSelectOne($c);
            if ($empbamc)
            {

              $empbamc->setCodcat($x[$i]["codcat"]);
       		  $empbamc->save();
	        }
	        else
	          {
	            $npasicatconemp_new = new Npasicatconemp();
			    $npasicatconemp_new->setCodemp($x[$i]["codemp"]);
			    $npasicatconemp_new->setCodcon($codigo);
			    $npasicatconemp_new->setCodcat($x[$i]["codcat"]);
			    $npasicatconemp_new->setCodcar($x[$i]["codcar"]);
			    $npasicatconemp_new->setCodnom($x[$i]["codnom"]);
			    $npasicatconemp_new->save();
	          }

	       $i++;

	      }
	return -1;
}
public static function Grabar_grid_Npasiempcont($grid,$npasiempcont_new)
{

		  $x=$grid[0];
		  $i=0;
		  $sql="delete from npasiempcont where codtipcon='".$npasiempcont_new->getCodtipcon()."'";
		  Herramientas::insertarRegistros($sql);
		  while ($i<count($x))
		  {
		  	    if($x[$i]["check"]=='1')
		  	    {
		  	    	$npasiempcont = new Npasiempcont();
				    $npasiempcont->setCodtipcon($npasiempcont_new->getCodtipcon());
				    $npasiempcont->setCodnom($x[$i]["codnom"]);
				    $npasiempcont->setCodemp($x[$i]["codemp"]);
				    $npasiempcont->setNomemp($x[$i]["nomemp"]);
				    $npasiempcont->setFeccal($x[$i]["feccal"]);
				    $npasiempcont->save();
		  	    }
	            $i++;
	       }
	return -1;
}
public static function Grabar_grid_EmpleadosBancos($npempleados,$grid)
	{
		  $x=$grid[0];
		  $i=0;
		  while ($i<count($x))
		  {
		    $c= new Criteria();
		    $c->add(NpempleadosBancoPeer::CODEMP,$x[$i]["cedemp"]);
		    $c->add(NpempleadosBancoPeer::CODNOM,$npempleados->getCodnom());
		    $empbamc = NpempleadosBancoPeer::doSelectOne($c);
            if ($empbamc)
            {

              $empbamc->setCodnom($npempleados->getCodnom());
              $empbamc->setCodban($x[$i]["codban"]);
              $empbamc->setCuentaBanco($x[$i]["cueban"]);
			  $empbamc->save();

		      $c1= new Criteria();
		      $c1->add(NphojintPeer::CODEMP,$x[$i]["cedemp"]);
		      $Historial = NphojintPeer::doSelectOne($c1);
              if ($Historial)
                  {
                  	  $Historial->setCodban($x[$i]["codban"]);
                      $Historial->setNumcue($x[$i]["cueban"]);//pila
			          $Historial->save();
                  }
            }
		    else
		    {
		      $npempleados_new = new NpempleadosBanco();
			  $npempleados_new->setCodnom($npempleados->getCodnom());
			  $npempleados_new->setCodban($x[$i]["codban"]);
			  $npempleados_new->setCodemp($x[$i]["cedemp"]);
			  $npempleados_new->setCuentaBanco($x[$i]["cueban"]);
			  $npempleados_new->save();
		    }
		  $i++;
		}
	}

public static function Grabar_grid_Vacdefgen($npvacdefgen_new,$grid)
	{
		  $val=-1;
		  $x=$grid[0];
		  $sql="delete from npvacdefgen";
		  Herramientas::insertarRegistros($sql);
		  	  foreach ($x as $v)
               {
               	      	if ($v->getPagoad()!='')
               	      	{
               	        $npvacdefgen_new = new Npvacdefgen();
			            $npvacdefgen_new->setCodnomvac($v->getCodnomvac());
			            $npvacdefgen_new->setCodconvac($v->getCodconvac());
			            $npvacdefgen_new->setCodconuti($v->getCodconuti());
			            $npvacdefgen_new->setPagoad($v->getPagoad());
			            $npvacdefgen_new->save();
               	      	}
               	      	else
               	      	{
                        $npvacdefgen_new = new Npvacdefgen();
			            $npvacdefgen_new->setCodnomvac($v->getCodnomvac());
			            $npvacdefgen_new->setCodconvac($v->getCodconvac());
			            $npvacdefgen_new->setCodconuti($v->getCodconuti());
			            $npvacdefgen_new->setPagoad('N');
			            $npvacdefgen_new->save();

               	      	}
            }

   return $val;
	}

public static function Validar_Datos_Vacdefgen($grid)
	{
		  $val=-1;
		  $x=$grid[0];

		  	  foreach ($x as $v)
               {
               	if ($v->getCodnomvac()!='')
               	   {
               	   	if ($v->getCodconvac()!='')
               	   	{
               	      if ($v->getCodconuti()!='')
               	      {
               	      	if ($v->getPagoad()!='')
               	      	{
               	         $val=-1;
               	      	}

               	      }
               	      	else
               	      	{ $val=411;
                          break;
               	      	}

                    }
                    else
               	      	{ $val=411;
                          break;
               	      	}
              	}
              	else
               	      	{ $val=411;
                          break;
               	      	}
            }

   return $val;
	}

public static function Validar_Datos_Vacdiafer($grid)
	{
		$val=-1;
		  $x=$grid[0];

		  	  foreach ($x as $v)
               {
               	if ($v->getMes()!='')
               	   {
               	   	if ($v->getDia()!='')
               	   	{
               	      if ($v->getDescripcion()!='')
               	      {
               	       $val=-1;
               	      }
               	      	else
               	      	{ $val=411;
                          break;
               	      	}

               	      	}
               	      	else
               	      	{ $val=411;
                          break;
               	      	}

                    }
                    else
               	      	{ $val=411;
                          break;
               	      	}

              	}
        return $val;


	}

public static function Grabar_grid_Vacdiafer($npvacdiafer_new,$grid)
	{
		$val=-1;
		  $x=$grid[0];
		  $sql="delete from npvacdiafer";
		  Herramientas::insertarRegistros($sql);
		  	  foreach ($x as $v)
               {
               	if ($v->getMes()!='')
               	   {
               	   	if ($v->getDia()!='')
               	   	{
               	      if ($v->getDescripcion()!='')
               	      {
               	        $npvacdiafer_new = new npvacdiafer();
			            $npvacdiafer_new->setDia($v->getDia());
			            $npvacdiafer_new->setMes($v->getMes());
			            $npvacdiafer_new->setDescripcion($v->getDescripcion());
			            $npvacdiafer_new->save();
               	      }
               	      	else
               	      	{ $val=411;
                          break;
               	      	}

               	      	}
               	      	else
               	      	{ $val=411;
                          break;
               	      	}

                    }
                    else
               	      	{ $val=411;
                          break;
               	      	}

              	}
        return $val;


	}

public static function Validar_Vacdiafer($grid)
{
	$val = -1;
	{
		$y=$grid[0];$z=$grid[0];

               	$j=0;
               	foreach ($y as $m)
               {
               	if ($val<>-1)
                {
                	break;
                }
                   	$dato1=$m->getMes();
               	   	$dato2=$m->getDia();
               	   	$k=0;
               	   	foreach ($z as $n)
               	   	{  if ($val<>-1)
                       {
                	       break;
                       }
               	    if ($dato1==$n->getMes() && $dato2==$n->getDia()  && $k!=$j)
               	     {
               	     	$val=412;
               	     	break;
               	     }
               	   	$k++;
               	   	}//$j++;
               	  $j++;
               	} //foreach ($y as $m)
      }
 if ($val<>-1)
    {
    	return $val;
    }
 else
    {
        return $val;
    }

 }

public static function Validar_Datos_Npasiempcont($grid)
{
	$val = -1;
	{
		$y=$grid[0];$z=$grid[0];

               	$j=0;
               	foreach ($y as $m)
               {

                   if ($y[$j]["codemp"]==' ')
                    {
                    	   $val =411;
                    	   break;
                    }
                   	$dato1=$y[$j]["codemp"];
               	   	$k=0;
               	   	foreach ($z as $n)
               	   	{  if ($val<>-1)
                       {
                	       break;
                       }
               	    if ($dato1==$y[$k]["codemp"] && $k!=$j)
               	     {
               	     	$val=412;
               	     	break;
               	     }

               	   	$k++;
               	   	}//$j++;
               	  $j++;
               	} //foreach ($y as $m)
      }

        return $val;
     }
public static function Validar_Datos_Grid_Vacdis($grid)
{
	$val = -1;

	$y=$grid[0];
   	$j=0;
   	foreach ($y as $m)
   {
       	$dato1=$y[$j]["diasdisfutar"];
       	$dato2=$y[$j]["diasdisfrutados"];
       	if($dato1<$dato2)
       	{
       		$val=438;
       		break;
       	}

   	  $j++;
   }
  return $val;
}

public static function Validar_Npdefpreliq($grid)
{
	$val = -1;
	{
		$y=$grid[0];$z=$grid[0];

               	$j=0;
               	foreach ($y as $m)
               {
               	if ($val<>-1)
                {
                	break;
                }
                   	$dato1=$m->getPerdes();
               	   	$dato2=$m->getPerhas();
               	   	$dato3=$m->getCodpar();
               	   	$k=0;
               	   	foreach ($z as $n)
               	   	{  if ($val<>-1)
                       {
                	       break;
                       }
               	    if ($dato1==$n->getPerdes() && $dato2==$n->getPerhas()  && $k!=$j && $dato3==$n->getCodpar())
               	     {
               	     	$val=412;
               	     	break;
               	     }
               	   	$k++;
               	   	}//$j++;
               	  $j++;
               	} //foreach ($y as $m)
      }
 if ($val<>-1)
    {
    	return $val;
    }
 else
    {
        return $val;
    }

 }

public static function Grabar_grid_Vacdiasbonovac($codigo,$grid)
	{
		$val=-1;
		  $x=$grid[0];
		  $sql="delete from npvacdiasbonovac where codnom='".$codigo."'";
		  Herramientas::insertarRegistros($sql);
		  	  foreach ($x as $v)
               {

       	        $npvacdiasbonovac_new= new npvacdiasbonovac();
	            $npvacdiasbonovac_new->setCodnom($codigo);
	            $npvacdiasbonovac_new->setPerini($v->getPerini());
	            $npvacdiasbonovac_new->setPerfin($v->getPerfin());
	            $npvacdiasbonovac_new->setRangodesde($v->getRangodesde());
	            $npvacdiasbonovac_new->setRangohasta($v->getRangohasta());
	            $npvacdiasbonovac_new->setDiasbonovac($v->getDiasbonovac());
	            $npvacdiasbonovac_new->save();
                }
        return $val;
	}

public static function Npdefpreliq_ValRegCompleto($grid)
	{
		$val=-1;
		  $x=$grid[0];
		  	  foreach ($x as $v)
               {
               	if ($v->getPerdes()!='')
               	   {
               	   	if ($v->getPerhas()!='')
               	   	{
               	       if ($v->getCodpar()!='')
               	                {
			               	  		$val=-1;
               	                }
		               	      	else
		               	      	{ $val=411;
		                          break;
		               	      	}

               	      	}
               	      	else
               	      	{ $val=411;
                          break;
               	      	}

                    }
                    else
               	      	{ $val=411;
                          break;
               	      	}


              	}
        return $val;


	}

public static function Vacdiasbonovac_ValRegCompleto($grid)
	{
		$val=-1;
		  $x=$grid[0];
		  	  foreach ($x as $v)
               {
               	if ($v->getPerini()!='')
               	   {
               	   	if ($v->getPerfin()!='')
               	   	{
               	      if ($v->getRangodesde()!='')
               	      {
               	         if ($v->getRangohasta()!='')
               	          {
               	             if ($v->getDiasbonovac()!='')
               	                {
			               	  		$val=-1;
               	                }
		               	      	else
		               	      	{ $val=411;
		                          break;
		               	      	}

               	      	}
               	      	else
               	      	{ $val=411;
                          break;
               	      	}

                    }
                    else
               	      	{ $val=411;
                          break;
               	      	}
                   }
                    else
               	      	{ $val=411;
                          break;
               	      	}
              	  }
                    else
               	      	{ $val=411;
                          break;
               	      	}

              	}
        return $val;


	}

public static function Grabar_grid_Vacdiadis($codigo,$grid)
	{
		$val=-1;
		  $x=$grid[0];
		  $sql="delete from npvacdiadis where codnom='".$codigo."'";
		  Herramientas::insertarRegistros($sql);
		  	  foreach ($x as $v)
               {
               	   if ($v->getRangodesde()=='' )  $v->setRangodesde(0);
              	   if ($v->getRangohasta()!='' )
               	          {
               	             if ($v->getDiadis()!='')
               	                {
			               	        $npvacdiadis= new npvacdiadis();
						            $npvacdiadis->setCodnom($codigo);
						            $npvacdiadis->setRangodesde($v->getRangodesde());
						            $npvacdiadis->setRangohasta($v->getRangohasta());
						            $npvacdiadis->setDiadis($v->getDiadis());
						            $npvacdiadis->save();
               	                }
		               	      	else
		               	      	{  $npvacdiadis= new npvacdiadis();
						            $npvacdiadis->setCodnom($codigo);
						            $npvacdiadis->setRangodesde($v->getRangodesde());
						            $npvacdiadis->setRangohasta($v->getRangohasta());
						            $npvacdiadis->setDiadis('0');
						            $npvacdiadis->save();
		               	      	}

               	      	}
               	      	else
               	      	{ $val=411;
                          break;
               	      	}

                    }

        return $val;


	}

public static function Grabar_grid_Presnomdefpre($codigo,$concepto,$grid)
	{
		$val=-1;
		  $x=$grid[0];
		  $sql="delete from npdefpreliq where codnom='".$codigo."' and codcon='".$concepto."'";
		  Herramientas::insertarRegistros($sql);
		  	  foreach ($x as $v)
               {
           	        $npdefpreliq= new npdefpreliq();
		            $npdefpreliq->setCodnom($codigo);
		            $npdefpreliq->setCodcon($concepto);
		            $npdefpreliq->setPerdes($v->getPerdes());
		            $npdefpreliq->setPerhas($v->getPerhas());
		            $npdefpreliq->setCodpar($v->getCodpar());
		            $npdefpreliq->save();
                }

        return $val;

	}

public static function Grabar_grid_Cestaticket($npnomina,$grid)
	{
		  $x=$grid[0];
		  $i=0;
		  while ($i<count($x))
		  {
		    $c= new Criteria();
		    $c->add(NphojintPeer::CODEMP,$x[$i]["cedemp"]);
		    $empbamc = NphojintPeer::doSelectone($c);
            if ($empbamc)
            {
               if ($x[$i]["modces"]!="")
               {
               	//print $x[$i]["modces"];exit;
               	$empbamc->setModpagcestic($x[$i]["modces"]);
                $empbamc->save();
               }

            }

		  $i++;

	      }


     }

public static function Grabar_grid_Npconceptoscategoria($npconceptoscategoria,$grid,$codigo)

   {
		  $x=$grid[0];
		  $i=0;
		   //print $m;exit;
		 foreach ($x as $v)
		  {
		    if ($x[$i]["check"] == false)
            {
              //print $m;exit;
              $c = new Criteria();
		      $c->add(NpconceptoscategoriaPeer::CODCON,$x[$i]["codcon"]);
		      $c->add(NpconceptoscategoriaPeer::CODCAT,$codigo);
              NpconceptoscategoriaPeer::doDelete($c);

                 }
            else  if ($x[$i]["check"] == true)
              {   $c2 = new Criteria();
		          $c2->add(NpconceptoscategoriaPeer::CODCON,$x[$i]["codcon"]);
		          $c2->add(NpconceptoscategoriaPeer::CODCAT,$codigo);
		          $dato = NpconceptoscategoriaPeer::doSelectOne($c2);
                  if (!$dato)
                    {
                       $npconceptoscategoria_new = new Npconceptoscategoria();
			           $npconceptoscategoria_new->setCodcon($x[$i]["codcon"]);
			           $npconceptoscategoria_new->setCodcat($codigo);
			           $npconceptoscategoria_new->save();
                    }

              }

		  $i++;
		}
	}

public static function Validar_Vacdefgen($grid)
{
	$val = -1;
	{
		$y=$grid[0];$z=$grid[0];

               	$j=0;
               	foreach ($y as $m)
               {
               	if ($val<>-1)
                {
                	break;
                }
                   	$dato1=$m->getCodconvac();
               	   	$dato2=$m->getCodconuti();
               	   	$datocodnom=$m->getCodnomvac();
               	   	$k=0;
               	   	foreach ($z as $n)
               	   	{  if ($val<>-1)
                       {
                	       break;
                       }
               	    if (($dato1==$n->getCodconvac() || $dato2==$n->getCodconvac() || $dato1==$n->getCodconuti() ||$dato2==$n->getCodconuti())  and  $datocodnom==$n->getCodnomvac()  and $k!=$j)
               	     {
               	     	$val=410;
               	     	break;
               	     }
               	   	$k++;
               	   	}//$j++;
               	  $j++;
               	} //foreach ($y as $m)
      }
 if ($val<>-1)
    {
    	return $val;
    }
 else
    {
        return $val;
    }

 }

public static function Validar_Vacdiasbonovac($grid,$codigo)
{
	$val = -1;
	{
		$y=$grid[0];$z=$grid[0];
    //    print "<pre>";
    //    print_r ($y);exit;
               	$j=0;
               	foreach ($y as $m)
               {
               	if ($val<>-1)
                {
                	break;
                }
                 	$dato1=$m->getPerini();
               	   	$dato2=$m->getPerfin();
               	   	$dato3=$m->getRangodesde();
               	   	$dato4=$m->getRangohasta();
               	   	$k=0;
               	   	foreach ($z as $n)
               	   	{  if ($val<>-1)
                       {
                	       break;
                       }
               	    if ($dato1==$n->getPerini() && $dato2==$n->getPerfin() && $dato3==$n->getRangodesde() && $dato4==$n->getRangohasta() && $k!=$j)
               	     { // print 'entre';exit;
               	     	$val=412;
               	     	break;
               	     }
               	   	$k++;
               	   	}//$j++;
               	  $j++;
               	} //foreach ($y as $m)
      }
 if ($val<>-1)
    {
    	return $val;
    }
 else
    {
        return $val;
    }

 }

public static function Validar_Vacdiadis($grid,$codigo)
{
	$val = -1;
	{
		$y=$grid[0];$z=$grid[0];
    //    print "<pre>";
    //    print_r ($y);exit;
               	$j=0;
               	foreach ($y as $m)
               {
               	if ($val<>-1)
                {
                	break;
                }
               	   	$dato3=$m->getRangodesde();
               	   	$dato4=$m->getRangohasta();
               	   	$k=0;
               	   	foreach ($z as $n)
               	   	{  if ($val<>-1)
                       {
                	       break;
                       }
               	    if (($dato3==$n->getRangodesde() || $dato4==$n->getRangohasta()) && $k!=$j)
               	     { // print 'entre';exit;
               	     	$val=412;
               	     	break;
               	     }
               	   	$k++;
               	   	}//$j++;
               	  $j++;
               	} //foreach ($y as $m)
      }
 if ($val<>-1)
    {
    	return $val;
    }
 else
    {
        return $val;
    }

 }

public static function Validar_Npdefpreliq_datos($grid)
{
	$val = -1;
	{
		$y=$grid[0];
    //    print "<pre>";
    //    print_r ($y);exit;
        	foreach ($y as $m)
               {
               	if ($val<>-1)
                {
                	break;
                }
                 	$dato1=$m->getPerdes();
               	   	$dato2=$m->getPerhas();
               	   	$k=0;

               	    if ($dato1 >= $dato2)
               	     { // print 'entre';exit;
               	     	$val=413;
               	     	break;
               	     }
					if (intval($dato1) <= 1500 ||  intval($dato1) >= 3000)
               	     { // print 'entre';exit;
               	     	$val=413;
               	     	break;
               	     } 
					if (intval($dato2) <= 1500 ||  intval($dato2) >= 3000)
               	     { // print 'entre';exit;
               	     	$val=413;
               	     	break;
               	     }  
               	   	}//$j++;

               	} //foreach ($y as $m)

 if ($val<>-1)
    {
    	return $val;
    }
 else
    {
        return $val;
    }

 }

public static function Validar_Vacdiasbonovac_datos($grid)
{
	$val = -1;
	{
		$y=$grid[0];
    //    print "<pre>";
    //    print_r ($y);exit;
        	foreach ($y as $m)
               {
               	if ($val<>-1)
                {
                	break;
                }
                 	$dato1=$m->getPerini();
               	   	$dato2=$m->getPerfin();
               	   	$dato3=$m->getRangodesde();
               	   	$dato4=$m->getRangohasta();
               	   	$k=0;

               	    if ($dato1 >= $dato2 || $dato3 >= $dato4)
               	     { // print 'entre';exit;
               	     	$val=413;
               	     	break;
               	     }

               	   	}//$j++;

               	} //foreach ($y as $m)

 if ($val<>-1)
    {
    	return $val;
    }
 else
    {
        return $val;
    }

 }

public static function Validar_Vacdidis_datos($grid)
{
	$val = -1;
	{
		$y=$grid[0];
    //    print "<pre>";
    //    print_r ($y);exit;
        	foreach ($y as $m)
               {
               	if ($val<>-1)
                {
                	break;
                }
               	   	$dato3=$m->getRangodesde();
               	   	$dato4=$m->getRangohasta();
               	   	$k=0;

               	    if ($dato3 > $dato4)
               	     { // print 'entre';exit;
               	     	$val=414;
               	     	break;
               	     }

               	   	}//$j++;

               	} //foreach ($y as $m)

 if ($val<>-1)
    {
    	return $val;
    }
 else
    {
        return $val;
    }

 }

}
?>