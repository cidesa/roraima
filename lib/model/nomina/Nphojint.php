<?php

/**
 * Subclase para representar una fila de la tabla 'nphojint'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
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

  public function getCodnom_duplicado()
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
				return count($auxnom)>1 ? $auxnom[1] : ' ';
			}else
			{
				$auxnom=split(' ',self::getNomemp());
				return  count($auxnom)>3 ? $auxnom[3] : ' ';	
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
	
}
