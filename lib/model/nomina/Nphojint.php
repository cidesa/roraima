<?php

/**
 * Subclase para representar una fila de la tabla 'nphojint'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Nphojint.php 38370 2010-05-24 19:54:25Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Nphojint extends BaseNphojint
{
  protected $prinom="";
  protected $segnom="";
  protected $priape="";
  protected $segape="";
  protected $check=false;
  private $incapacidades ='';
  protected $ultsue="0.00";
  protected $edaact=0;
  protected $grid=array();
  protected $etiqueta="";
  protected $statusegr="";

  public function getCodnom()
  {
    $c = new Criteria();
    $c->add(NpasiempcontPeer::CODEMP,self::getCodemp());
    $nomemp = NpasiempcontPeer::doSelectone($c);
    if ($nomemp){
      return $nomemp->getCodnom();
    }else{
      return '<!Nombre no encontrado!>';
    }
  }

  public function getEdaact()
  {
  	if (self::getFecNac())
  	{
		$sql = "select  Extract(year from age(now(),'" . self::getFecNac() . "')) as edad";
		if (Herramientas :: BuscarDatos($sql, & $result))
			return $result[0]['edad'];
		else
		    return self::getEdaemp();
  	}
  	else
  	    return 0;
  }

  public function getNomcod()
  {
    $c = new Criteria();
    $c->add(NpasiconempPeer::CODEMP,self::getCodemp());
    $nomemp = NpasiconempPeer::doSelectone($c);
    if ($nomemp){
      return $nomemp->getCodnom();
    }else{
      return '<!Nombre no encontrado!>';
    }
  }

  public function getNomcar()
  {
    // Se obtiene el codcar de la tabla Npasicaremp
    // Luego se obtiene el nombre del cargo de la tabla Npcargos

    $c = new Criteria();
    $c->addJoin(NpasicarempPeer::CODCAR,NpcargosPeer::CODCAR);
    $c->add(NpasicarempPeer::CODEMP,self::getCodemp());
    $registro = NpcargosPeer::doSelectOne($c);
    if($registro) return $registro->getNomcar();
    else return null;

  }

  public function getCodcar()
  {
    // Se obtiene el codcar de la tabla Npasicaremp
    // Luego se obtiene el código del cargo de la tabla Npcargos

    $c = new Criteria();
    $c->addJoin(NpasicarempPeer::CODCAR,NpcargosPeer::CODCAR);
    $c->add(NpasicarempPeer::CODEMP,self::getCodemp());
    $registro = NpcargosPeer::doSelectOne($c);
    if($registro) return $registro->getCodcar();
    else return null;

  }

  public function getNomnom()
  {
    // Se obtiene Nomnom de la tabla Npasicaremp

    $c = new Criteria();
    $c->add(NpasicarempPeer::CODEMP,self::getCodemp());
    $registro = NpasicarempPeer::doSelectOne($c);
    if($registro) return $registro->getNomnom();
    else return null;
  }

  public function getCodnom2()
  {
    // Se obtiene Nomnom de la tabla Npasicaremp

    $c = new Criteria();
    $c->add(NpasicarempPeer::CODEMP,self::getCodemp());
    $registro = NpasicarempPeer::doSelectOne($c);
    if($registro) return $registro->getCodnom();
    else return null;


  }


  public function getPagerOfNpvacregsalActuales($pagina)
  {
    $c = new Criteria();
    $c->add(NpvacregsalPeer::CODEMP,self::getCodemp() );
    $c->add(NpvacregsalPeer::CODCAR,self::getCodcar() );
    $c->add(NpvacregsalPeer::CODNOM,self::getCodnom() );
    $c->add(NpvacregsalPeer::STAVAC,'N' );
    $c->addAscendingOrderByColumn(NpvacregsalPeer::FECHASALIDA);

      return self::getPagerOfNpvacregsalByCriteria($c,$pagina,5);

  }

  public function getPagerOfNpvacregsalHistoricos($pagina)
  {
    $c = new Criteria();
    $c->add(NpvacregsalPeer::CODEMP,self::getCodemp() );
    $c->add(NpvacregsalPeer::CODCAR,self::getCodcar() );
    $c->add(NpvacregsalPeer::CODNOM,self::getCodnom() );
    $c->add(NpvacregsalPeer::STAVAC,'S' );
    $c->addDescendingOrderByColumn(NpvacregsalPeer::PERFIN);

      return self::getPagerOfNpvacregsalByCriteria($c,$pagina,5);

  }


  private function getPagerOfNpvacregsalByCriteria($c,$pagina,$regs)
  {
    $pager = new sfPropelPager('Npvacregsal', $regs);
      $pager->setCriteria($c);
      $pager->setPage($pagina);
      $pager->init();
      return $pager;

  }

  public function getIncapacidades()
    {
    return $this->incapacidades;
    }

    public function setIncapacidades($val)
    {
      $this->incapacidades = $val;
    }

    public function getCodrespat()
    {
    	return self::getCodemp();
    }

    public function getNomrespat()
    {
    	return self::getNomemp();
    }

    public function getCodresuso()
    {
    	return self::getCodemp();
    }

    public function getNomresuso()
    {
    	return self::getNomemp();
    }
	public function getPrinom()
    {
    	if(strrpos(self::getNomemp(),','))
		{
			$aux=split(',',self::getNomemp());
			if(count($aux)==2)
			{
				$auxnom=split(' ',trim($aux[1]));
				return $auxnom[0];
			}else
			{
				$auxnom=split(' ',self::getNomemp());
				return  count($auxnom)==2 ? $auxnom[1] : (count($auxnom)>2 ? $auxnom[2] : ' ');
			}
		}else
		{
			$auxnom=split(' ',self::getNomemp());
			return  count($auxnom)==2 ? $auxnom[1] : (count($auxnom)>2 ? $auxnom[2] : ' ');
		}
    }
	public function getSegnom()
    {
    	if(strrpos(self::getNomemp(),','))
		{
			$aux=split(',',self::getNomemp());
			if(count($aux)==2)
			{
				$auxnom=split(' ',trim($aux[1]));
        if(count($auxnom)>1){
          $segnom = '';
          foreach($auxnom as $i => $nom){
            if($i!=0){
              $segnom .= $nom.' ';
            }
          }
          return trim($segnom);
        }else return ' ';

			}else
			{
				$auxnom=split(' ',self::getNomemp());
        if(count($auxnom)>3){
          $segnom = '';
          foreach($auxnom as $i => $nom){
            if($i>2){
              $segnom .= $nom.' ';
            }
          }
          return trim($segnom);
        }else return ' ';
			}
		}else
		{
			$auxnom=split(' ',self::getNomemp());
			return  count($auxnom)>3 ? $auxnom[3] : ' ';
		}
    }

	public function getPriape()
    {
    	if(strrpos(self::getNomemp(),','))
		{
			$aux=split(',',self::getNomemp());
			if(count($aux)==2)
			{
				$auxnom=split(' ',trim($aux[0]));
				return $auxnom[0];
			}else
			{
				$auxnom=split(' ',self::getNomemp());
				return  count($auxnom)==2 ? $auxnom[0] : (count($auxnom)>2 ? $auxnom[0] : ' ');
			}
		}else
		{
			$auxnom=split(' ',self::getNomemp());
			return  count($auxnom)==2 ? $auxnom[0] : (count($auxnom)>2 ? $auxnom[0] : ' ');
		}
    }
	public function getSegape()
    {
    	if(strrpos(self::getNomemp(),','))
		{
			$aux=split(',',self::getNomemp());
			if(count($aux)==2)
			{
				$auxnom=split(' ',trim($aux[0]));
				return count($auxnom)>1 ? $auxnom[1] : ' ';
			}else
			{
				$auxnom=split(' ',self::getNomemp());
				return  count($auxnom)>2 ? $auxnom[1] : ' ';
			}
		}else
		{
			$auxnom=split(' ',self::getNomemp());
			return  count($auxnom)>2 ? $auxnom[1] : ' ';
		}
    }

	public function getDesniv()
	{
		return Herramientas::getX('CODNIV', 'Npestorg', 'Desniv',self::getCodniv());

	}

	public function getDesniv2()
	{
		return Herramientas::getX('CODUBI', 'Npdefubi', 'Desubi',self::getUbifis());

	}

  public function getEtiqueta()
  {
    if (self::getFecfincon()!='')
    {
      if (self::getFecfincon()>=date('Y-m-d')){
           $sql="select to_char((fecfincon-now()),'dd')::integer as dias from nphojint where codemp='".self::getCodemp()."'";
          if (Herramientas::BuscarDatos($sql,&$result))
          {
            $dias=$result[0]['dias'];
          }
          $diasmesact=date('t');
          if ($dias<$diasmesact)
          {
            $eti="El Contrato esta próximo a Vencerce";
          }
          else if ($dias==$diasmesact)
          {
            $eti="El Contrato Esta Vencido";
          }
          else $eti="";

        }else $eti="El Contrato Esta Vencido";
    }else $eti="";
    return $eti;
  }

  public function getStatusegr()
  {

    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('nomina',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['nomina']))
	     if(array_key_exists('nomhojint',$varemp['aplicacion']['nomina']['modulos'])){
	       if(array_key_exists('statusegr',$varemp['aplicacion']['nomina']['modulos']['nomhojint']))
	       {
	       	$dato=$varemp['aplicacion']['nomina']['modulos']['nomhojint']['statusegr'];
	       }
         }
     return $dato;
  }

  public function setStatusegr()
  {
  	return $this->statusegr;
  }
    public function getNomempaco()
    {
    	return self::getNomemp();
    }

  public function getCodempaco()
    {
    	return self::getCodemp();
}
  public function getNomempaut()
    {
    	return self::getNomemp();
    }

  public function getCodempaut()
    {
    	return self::getCodemp();
    }

  public function getDesmot()
  {
	return Herramientas::getX('CODMOT','Npmotegr','Desmot',self::getCodmot());
  }
}
