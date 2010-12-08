<?php

/**
 * Subclass for representing a row from the 'opordpag'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Opordpag.php 37987 2010-05-06 14:06:56Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Opordpag extends BaseOpordpag
{
  private $codtip = '';
  private $check = '';
  protected $referencias = '';
  protected $documento = '';
  protected $afectapre = '';
  protected $totalcomprobantes = '';
  protected $cuentarendicion = '';
  protected $vacio = '';
  protected $presiono = 'N';
  protected $neto = '0,00';
  protected $totfonter = '0,00';
  protected $montotal=0;
  protected $fecdes = '';
  protected $fechas = '';
  protected $objeto=array();
  protected $mascaraubi = "";
  protected $lonubi = 0;
  protected $idrefer="";
  protected $codcat="";
  protected $genctaord="";
  protected $filasord=0;
  protected $estatus="";
  protected $objret=array();
  protected $objfac=array();
  protected $objmov=array();
  protected $objoculret=array();
  protected $codigoprovee="";
  protected $afectapresup = '';
  protected $afectarecargo="";
  protected $iniciopar="";
  protected $formatopar="";
  protected $partidas="";
  protected $totmarcadas="0,00";
  protected $datosret="";
  protected $modmonret="true";
  protected $totmoncau="0,00";
  protected $totmonret="0,00";
  protected $totmondes="0,00";
  protected $objconsulret=array();
  protected $filasconsret=0;
  protected $totfac="0,00";
  protected $totbas="0,00";
  protected $totiva="0,00";
  protected $totimp="0,00";
  protected $incmod="";
  protected $elislr="0,00";
  protected $eltimbre="0,00";
  protected $eliva="0,00";
  protected $totbasmil="0,00";
  protected $totmontmil="0,00";
  protected $totbasislr="0,00";
  protected $totmontislr="0,00";
  protected $datosnomina="";
  protected $observe="";
  protected $referencias2 = '';
  protected $nombeneficiario="";
  protected $modbasimpiva="";
  protected $objeto1=array();
  protected $cadesel='';
  protected $filassal=0;
  protected $filordcbtp="";
  protected $limbaseret="";
  protected $numfilas=0;
  protected $refcre='';
  protected $refsolpag='';

   public function afterHydrate()
   {
   	  Herramientas::obtenerFormatoCategoria(&$formatopar,&$iniciopartida);
   	  $this->iniciopar=$iniciopartida;
   	  $this->formatopar=$formatopar;
   	  OrdendePago::partida(&$partid);
   	  $this->partidas=$partid;
   	  $this->unidad=Herramientas::getX('CODEMP','Opdefemp','Unitri','001');
      $this->montotal= (self::getMonord()-self::getMondes()-self::getMonpag()-self::getMonret()- Cheques::ObtenerAjuste(self::getNumord()) );
      $this->nombeneficiario=str_replace("'", "", self::getNomben());
   }


  public function getNomext()
  {
  return Herramientas::getX('TIPCAU','Cpdoccau','Nomext',self::getTipcau());
  }

  public function getDescta()
  {
  return Herramientas::getX('CODCTA','Contabb','Descta',self::getCtapag());
  }

 public function getCodctasec()
  {
  return Herramientas::getX('CEDRIF','Opbenefi','Codctasec',self::getCedrif());
  }

  public function getNomext2()
  {
  return Herramientas::getX('CODFIN','Fortipfin','Nomext',self::getTipfin());
  }

  public function setCodtip($val)
  {
  $this->codtip = $val;
  }

  public function getCodtip()
  {
  return $this->codtip;
  }

  public function getDestip()
  {
  return Herramientas::getX('CODTIP','Optipret','Destip',self::getCodtip());
  }

  public function getDesubi()
  {
  return Herramientas::getX('CODUBI','Bnubica','Desubi',self::getCoduni());
  }

  public function getIdrefer()
  {
    return Herramientas::getX_vacio('numcom','contabc','id',self::getNumcom());
  }

  public function setCheck($val)
  {
  $this->check = $val;
  }

  public function getCheck()
  {
  return $this->check;
  }


/*  public function getMontotal()
  {
  $montot= (self::getMonord()-self::getMondes()-self::getMonpag()-self::getMonret()- Cheques::ObtenerAjuste(self::getNumord()) );
  return $montot;
  }*/

  public function getMontotaltotal()
  {
  $montot= (self::getMonord()-self::getMondes()-self::getMonpag()-self::getMonret()- Cheques::ObtenerAjuste(self::getNumord()) );
  return $montot;
  }

  public function setMontotal($val)
  {
  $this->montotal = $val;
  }

  public function getMontotalGrid()
  {
    return $this->montotal;
  }

  public function setFecdes($val)
  {
  $this->fecdes = $val;
  }

  public function getFecdes()
  {
    return $this->fecdes;
  }

  public function setFechas($val)
  {
  $this->fechas = $val;
  }

  public function getFechas()
  {
    return $this->fechas;
  }

  public function getGenctaord()
    {
      $d= new Criteria();
      $data=OpdefempPeer::doSelectOne($d);
      if ($data)
      {
      	$si=$data->getGenctaord();
      }else $si=null;
      return $si;
    }

  public function getDesmotanu()
  {
  return Herramientas::getX('CODMOTANU','Tsmotanu','Desmotanu',self::getCodmotanu());
  }

  public function getDesorden()
  {
    $desord= str_replace("'", "", self::getDesord());
    return str_replace("?", "", $desord);
  }

  public function getReqaprord()
    {
      $d= new Criteria();
      $data=OpdefempPeer::doSelectOne($d);
      if ($data)
      {
      	$si=$data->getReqaprord();
      }else $si=null;
      return $si;
    }

  public function getNomcue()
  {
  return Herramientas::getX('Numcue','Tsdefban','Nomcue',self::getNumcue());
  }

  public function getCodigoprovee()
  {
	$d= new Criteria();
	$d->add(CaproveePeer::RIFPRO,self::getCedrif());
	$data=CaproveePeer::doSelectOne($d);
	if ($data)
	{
	  $si=$data->getRifpro();
	}else $si="";

	return $si;
  }

  public function getAfectapresup()
  {
	$d= new Criteria();
	$d->add(CpdoccauPeer::TIPCAU,self::getTipcau());
	$data=CpdoccauPeer::doSelectOne($d);
	if ($data)
	{
	  if ($data->getAfeprc()=='N' && $data->getAfecom()=='N' && $data->getAfecau()=='N')
	  {
	  	$si='N';
	  }else
	  {
	  	$si='S';
	  }
	}else $si="";

	return $si;
  }

  public function getEtiqueta()
  {
    $sql="Select MIN(FECPAG) AS fecpag,SUM(MONPAG) AS monpag FROM OPDETPER WHERE REFOPP = '".self::getNumord()."' HAVING SUM(MONPAG)>0";
    if (Herramientas::BuscarDatos($sql,&$result))
    {
      $etique="PAGADA APARTIR DEL ".$result[0]["fecpag"];
    }else {
       switch (self::getStatus())
       {
       	 case 'A':
       	   if (self::getFecanu()!="")
	       { $etique="ANULADA EL ".date('d/m/Y',strtotime(self::getFecanu()));}
	       else { $etique="ANULADA";}
       	  break;
       	 case 'E':
       	   $etique="ELABORADA";
       	  break;
       	 case 'C':
       	   $etique="EN CONTRALORIA";
       	  break;
       	 case ('I' || 'N'):
           $sql="select a.numche as numche,b.feclib as fecemi,b.tipmov as tipo,d.destip as destip,c.nomcue as nomcue, a.tipmov as tipmovche
                 from opordche a, tsmovlib b, tsdefban c,tstipmov d where a.numche=b.reflib and a.codcta=b.numcue and b.numcue=c.numcue and
                 b.tipmov=d.codtip and d.debcre='C' and a.numord='".self::getNumord()."'";
           $result=array();
           if (Herramientas::BuscarDatos($sql,$result))
           {
             if (self::getStatus()=='N')
             {
               $etique="PAGADA PARCIALMENTE CON ";
             }
             else
             {
              $etique="PAGADA CON ";
             }

             if ($result[0]["tipmovche"]!="")
             {
              ///////////////////////////////////////
               $sql="select a.numche as numche,b.feclib as fecemi,b.tipmov as tipo,d.destip as destip,c.nomcue as nomcue, a.tipmov as tipmovche
                 from opordche a, tsmovlib b, tsdefban c,tstipmov d where a.numche=b.reflib and a.codcta=b.numcue and a.tipmov=b.tipmov and b.numcue=c.numcue and
                 b.tipmov=d.codtip and d.debcre='C' and a.numord='".self::getNumord()."'";
           		$resultad=array();
          		if (Herramientas::BuscarDatos($sql,$resultad))
           		{
           		     foreach ($resultad as $datos)
		             {
		               $etique=$etique.$datos["destip"]." N° ".$datos["numche"]." EL ".date('d/m/Y',strtotime($datos["fecemi"]))." - ".$datos["nomcue"].", ";
		             }
           		}
           		else $etique="";
              ///////////////////////////////////////
             }
			else
			{
             foreach ($result as $datos)
             {
               $etique=$etique.$datos["destip"]." N° ".$datos["numche"]." EL ".date('d/m/Y',strtotime($datos["fecemi"]))." - ".$datos["nomcue"].", ";
             }
			}

             $etique=substr($etique,0,strlen($etique)-2);
           }
           else
           {
              if (self::getStatus()=='I')
              {
                $sql1="select a.tipmov as tipmov,a.reflib as reflib,a.feclib as feclib,a.numcue as numcue,b.nomcue as nomcue,c.destip as destip
                from  tsmovlib a, tsdefban b,tstipmov c where a.numcue=b.numcue and a.tipmov=c.codtip and a.numcue='".self::getCtaban()."' and a.reflib='".self::getNumche()."'";
                $result2=array();
                if(Herramientas::BuscarDatos($sql1,$result2))
                {
                  $etique="PAGADA CON ".$result2[0]["destip"]." N° ".$result2[0]["reflib"]." EL ".date('d/m/Y',strtotime($result2[0]["feclib"]))." - ".$result2[0]["nomcue"];
                }
                else
                {
                  $etique="PAGADA SIN CHEQUE ASOCIADO";
                }
              }
              else
              {
                $etique="PENDIENTE POR PAGAR";
              }
          }
       	  break;
       }
    }

    return $etique;
  }

	public function getAfectarecargo()
	{
	  $d= new Criteria();
	  $data=CadefartPeer::doSelectOne($d);
	  if ($data)
	  {
	  	$si=$data->getAsiparrec();
	  }else $si="C";
	  return $si;
	}

  public function getDocumento()
  {
  	$docrefiere=CpdoccauPeer::getDato(self::getTipcau(),'Refier');
  	return $docrefiere;
  }

  	public function getIncmod()
	{
	  $d= new Criteria();
	  $d->add(OpretordPeer::NUMORD,self::getNumord());
	  $data=OpretordPeer::doSelectOne($d);
	  if ($data)
	  {
	  	$si="M";
	  }else $si="I";
	  return $si;
	}

	public function getReferencias2()
	{
	  $referencias="";
	  $sql="select refere as refere from cpimpcau where refcau='".self::getNumord()."'";
	  if (Herramientas::BuscarDatos($sql,&$result))
	  {
        foreach ($result as $ref)
        {
         $referencias=$referencias.'_'.$ref["refere"];
        }
	  }
      return $referencias;
	}

  public function getNomconcepto()
  {
  return Herramientas::getX('CODCONCEPTO','Opconpag','Nomconcepto',self::getCodconcepto());
  }

  public function getFilordcbtp()
  {
    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('tesoreria',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
	     if(array_key_exists('pagemiord',$varemp['aplicacion']['tesoreria']['modulos'])){
	       if(array_key_exists('filordcbtp',$varemp['aplicacion']['tesoreria']['modulos']['pagemiord']))
	       {
	       	$dato=$varemp['aplicacion']['tesoreria']['modulos']['pagemiord']['filordcbtp'];
	       }
         }
     return $dato;
  }

  public function setFilordcbtp()
  {
  	return $this->filordcbtp;
  }

  public function getNomcue2()
  {
  	return Herramientas::getX('NUMCUE','Tsdefban','Nomcue',self::getNumcta());
  }

    public function getDestip2()
    {
            return Herramientas::getX('CODTIP','Tstipmov','Destip',self::getTipdoc());
    }

  public function getLimbaseret()
  {
    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('tesoreria',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
	     if(array_key_exists('pagtipret',$varemp['aplicacion']['tesoreria']['modulos'])){
	       if(array_key_exists('limbaseret',$varemp['aplicacion']['tesoreria']['modulos']['pagtipret']))
	       {
	       	$dato=$varemp['aplicacion']['tesoreria']['modulos']['pagtipret']['limbaseret'];
	       }
         }
     return $dato;
  }

  public function setLimbaseret()
  {
  	return $this->limbaseret;
  }


  public function getNumfilas()
  {
    $dato=150;
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('tesoreria',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
	     if(array_key_exists('pagemiord',$varemp['aplicacion']['tesoreria']['modulos'])){
	       if(array_key_exists('numfilas',$varemp['aplicacion']['tesoreria']['modulos']['pagemiord']))
	       {
	       	$dato=$varemp['aplicacion']['tesoreria']['modulos']['pagemiord']['numfilas'];
	       }
         }
     return $dato;
  }

  public function setNumfilas()
  {
  	return $this->numfilas;
  }
}
