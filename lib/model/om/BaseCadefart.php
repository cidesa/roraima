<?php


abstract class BaseCadefart extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $lonart;


	
	protected $rupart;


	
	protected $forart;


	
	protected $desart;


	
	protected $forubi;


	
	protected $desubi;


	
	protected $correq;


	
	protected $corord;


	
	protected $correc;


	
	protected $cordes;


	
	protected $generaop;


	
	protected $asiparrec;


	
	protected $generacom;


	
	protected $mercon;


	
	protected $ctadev;


	
	protected $ctavco;


	
	protected $univta;


	
	protected $artven;


	
	protected $artins;


	
	protected $artser;


	
	protected $codalmven;


	
	protected $recart;


	
	protected $ordcom;


	
	protected $reqart;


	
	protected $dphart;


	
	protected $ordser;


	
	protected $tipimprec;


	
	protected $artvenhas;


	
	protected $corcot;


	
	protected $solart;


	
	protected $apliclades;


	
	protected $solcom;


	
	protected $unidad;


	
	protected $prcasopre;


	
	protected $prcreqapr;


	
	protected $comasopre;


	
	protected $comreqapr;


	
	protected $almcorre;


	
	protected $forsnc;


	
	protected $dessnc;


	
	protected $reqreqapr;


	
	protected $solreqapr;


	
	protected $gencorart;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getLonart($val=false)
  {

    if($val) return number_format($this->lonart,2,',','.');
    else return $this->lonart;

  }
  
  public function getRupart($val=false)
  {

    if($val) return number_format($this->rupart,2,',','.');
    else return $this->rupart;

  }
  
  public function getForart()
  {

    return trim($this->forart);

  }
  
  public function getDesart()
  {

    return trim($this->desart);

  }
  
  public function getForubi()
  {

    return trim($this->forubi);

  }
  
  public function getDesubi()
  {

    return trim($this->desubi);

  }
  
  public function getCorreq()
  {

    return trim($this->correq);

  }
  
  public function getCorord()
  {

    return trim($this->corord);

  }
  
  public function getCorrec()
  {

    return trim($this->correc);

  }
  
  public function getCordes()
  {

    return trim($this->cordes);

  }
  
  public function getGeneraop()
  {

    return trim($this->generaop);

  }
  
  public function getAsiparrec()
  {

    return trim($this->asiparrec);

  }
  
  public function getGeneracom()
  {

    return trim($this->generacom);

  }
  
  public function getMercon()
  {

    return trim($this->mercon);

  }
  
  public function getCtadev()
  {

    return trim($this->ctadev);

  }
  
  public function getCtavco()
  {

    return trim($this->ctavco);

  }
  
  public function getUnivta()
  {

    return trim($this->univta);

  }
  
  public function getArtven()
  {

    return trim($this->artven);

  }
  
  public function getArtins()
  {

    return trim($this->artins);

  }
  
  public function getArtser()
  {

    return trim($this->artser);

  }
  
  public function getCodalmven()
  {

    return trim($this->codalmven);

  }
  
  public function getRecart($val=false)
  {

    if($val) return number_format($this->recart,2,',','.');
    else return $this->recart;

  }
  
  public function getOrdcom($val=false)
  {

    if($val) return number_format($this->ordcom,2,',','.');
    else return $this->ordcom;

  }
  
  public function getReqart($val=false)
  {

    if($val) return number_format($this->reqart,2,',','.');
    else return $this->reqart;

  }
  
  public function getDphart($val=false)
  {

    if($val) return number_format($this->dphart,2,',','.');
    else return $this->dphart;

  }
  
  public function getOrdser($val=false)
  {

    if($val) return number_format($this->ordser,2,',','.');
    else return $this->ordser;

  }
  
  public function getTipimprec()
  {

    return trim($this->tipimprec);

  }
  
  public function getArtvenhas()
  {

    return trim($this->artvenhas);

  }
  
  public function getCorcot()
  {

    return trim($this->corcot);

  }
  
  public function getSolart()
  {

    return trim($this->solart);

  }
  
  public function getApliclades()
  {

    return trim($this->apliclades);

  }
  
  public function getSolcom($val=false)
  {

    if($val) return number_format($this->solcom,2,',','.');
    else return $this->solcom;

  }
  
  public function getUnidad()
  {

    return trim($this->unidad);

  }
  
  public function getPrcasopre()
  {

    return trim($this->prcasopre);

  }
  
  public function getPrcreqapr()
  {

    return trim($this->prcreqapr);

  }
  
  public function getComasopre()
  {

    return trim($this->comasopre);

  }
  
  public function getComreqapr()
  {

    return trim($this->comreqapr);

  }
  
  public function getAlmcorre()
  {

    return trim($this->almcorre);

  }
  
  public function getForsnc()
  {

    return trim($this->forsnc);

  }
  
  public function getDessnc()
  {

    return trim($this->dessnc);

  }
  
  public function getReqreqapr()
  {

    return trim($this->reqreqapr);

  }
  
  public function getSolreqapr()
  {

    return trim($this->solreqapr);

  }
  
  public function getGencorart()
  {

    return trim($this->gencorart);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = CadefartPeer::CODEMP;
      }
  
	} 
	
	public function setLonart($v)
	{

    if ($this->lonart !== $v) {
        $this->lonart = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadefartPeer::LONART;
      }
  
	} 
	
	public function setRupart($v)
	{

    if ($this->rupart !== $v) {
        $this->rupart = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadefartPeer::RUPART;
      }
  
	} 
	
	public function setForart($v)
	{

    if ($this->forart !== $v) {
        $this->forart = $v;
        $this->modifiedColumns[] = CadefartPeer::FORART;
      }
  
	} 
	
	public function setDesart($v)
	{

    if ($this->desart !== $v) {
        $this->desart = $v;
        $this->modifiedColumns[] = CadefartPeer::DESART;
      }
  
	} 
	
	public function setForubi($v)
	{

    if ($this->forubi !== $v) {
        $this->forubi = $v;
        $this->modifiedColumns[] = CadefartPeer::FORUBI;
      }
  
	} 
	
	public function setDesubi($v)
	{

    if ($this->desubi !== $v) {
        $this->desubi = $v;
        $this->modifiedColumns[] = CadefartPeer::DESUBI;
      }
  
	} 
	
	public function setCorreq($v)
	{

    if ($this->correq !== $v) {
        $this->correq = $v;
        $this->modifiedColumns[] = CadefartPeer::CORREQ;
      }
  
	} 
	
	public function setCorord($v)
	{

    if ($this->corord !== $v) {
        $this->corord = $v;
        $this->modifiedColumns[] = CadefartPeer::CORORD;
      }
  
	} 
	
	public function setCorrec($v)
	{

    if ($this->correc !== $v) {
        $this->correc = $v;
        $this->modifiedColumns[] = CadefartPeer::CORREC;
      }
  
	} 
	
	public function setCordes($v)
	{

    if ($this->cordes !== $v) {
        $this->cordes = $v;
        $this->modifiedColumns[] = CadefartPeer::CORDES;
      }
  
	} 
	
	public function setGeneraop($v)
	{

    if ($this->generaop !== $v) {
        $this->generaop = $v;
        $this->modifiedColumns[] = CadefartPeer::GENERAOP;
      }
  
	} 
	
	public function setAsiparrec($v)
	{

    if ($this->asiparrec !== $v) {
        $this->asiparrec = $v;
        $this->modifiedColumns[] = CadefartPeer::ASIPARREC;
      }
  
	} 
	
	public function setGeneracom($v)
	{

    if ($this->generacom !== $v) {
        $this->generacom = $v;
        $this->modifiedColumns[] = CadefartPeer::GENERACOM;
      }
  
	} 
	
	public function setMercon($v)
	{

    if ($this->mercon !== $v) {
        $this->mercon = $v;
        $this->modifiedColumns[] = CadefartPeer::MERCON;
      }
  
	} 
	
	public function setCtadev($v)
	{

    if ($this->ctadev !== $v) {
        $this->ctadev = $v;
        $this->modifiedColumns[] = CadefartPeer::CTADEV;
      }
  
	} 
	
	public function setCtavco($v)
	{

    if ($this->ctavco !== $v) {
        $this->ctavco = $v;
        $this->modifiedColumns[] = CadefartPeer::CTAVCO;
      }
  
	} 
	
	public function setUnivta($v)
	{

    if ($this->univta !== $v) {
        $this->univta = $v;
        $this->modifiedColumns[] = CadefartPeer::UNIVTA;
      }
  
	} 
	
	public function setArtven($v)
	{

    if ($this->artven !== $v) {
        $this->artven = $v;
        $this->modifiedColumns[] = CadefartPeer::ARTVEN;
      }
  
	} 
	
	public function setArtins($v)
	{

    if ($this->artins !== $v) {
        $this->artins = $v;
        $this->modifiedColumns[] = CadefartPeer::ARTINS;
      }
  
	} 
	
	public function setArtser($v)
	{

    if ($this->artser !== $v) {
        $this->artser = $v;
        $this->modifiedColumns[] = CadefartPeer::ARTSER;
      }
  
	} 
	
	public function setCodalmven($v)
	{

    if ($this->codalmven !== $v) {
        $this->codalmven = $v;
        $this->modifiedColumns[] = CadefartPeer::CODALMVEN;
      }
  
	} 
	
	public function setRecart($v)
	{

    if ($this->recart !== $v) {
        $this->recart = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadefartPeer::RECART;
      }
  
	} 
	
	public function setOrdcom($v)
	{

    if ($this->ordcom !== $v) {
        $this->ordcom = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadefartPeer::ORDCOM;
      }
  
	} 
	
	public function setReqart($v)
	{

    if ($this->reqart !== $v) {
        $this->reqart = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadefartPeer::REQART;
      }
  
	} 
	
	public function setDphart($v)
	{

    if ($this->dphart !== $v) {
        $this->dphart = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadefartPeer::DPHART;
      }
  
	} 
	
	public function setOrdser($v)
	{

    if ($this->ordser !== $v) {
        $this->ordser = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadefartPeer::ORDSER;
      }
  
	} 
	
	public function setTipimprec($v)
	{

    if ($this->tipimprec !== $v) {
        $this->tipimprec = $v;
        $this->modifiedColumns[] = CadefartPeer::TIPIMPREC;
      }
  
	} 
	
	public function setArtvenhas($v)
	{

    if ($this->artvenhas !== $v) {
        $this->artvenhas = $v;
        $this->modifiedColumns[] = CadefartPeer::ARTVENHAS;
      }
  
	} 
	
	public function setCorcot($v)
	{

    if ($this->corcot !== $v) {
        $this->corcot = $v;
        $this->modifiedColumns[] = CadefartPeer::CORCOT;
      }
  
	} 
	
	public function setSolart($v)
	{

    if ($this->solart !== $v) {
        $this->solart = $v;
        $this->modifiedColumns[] = CadefartPeer::SOLART;
      }
  
	} 
	
	public function setApliclades($v)
	{

    if ($this->apliclades !== $v) {
        $this->apliclades = $v;
        $this->modifiedColumns[] = CadefartPeer::APLICLADES;
      }
  
	} 
	
	public function setSolcom($v)
	{

    if ($this->solcom !== $v) {
        $this->solcom = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadefartPeer::SOLCOM;
      }
  
	} 
	
	public function setUnidad($v)
	{

    if ($this->unidad !== $v) {
        $this->unidad = $v;
        $this->modifiedColumns[] = CadefartPeer::UNIDAD;
      }
  
	} 
	
	public function setPrcasopre($v)
	{

    if ($this->prcasopre !== $v) {
        $this->prcasopre = $v;
        $this->modifiedColumns[] = CadefartPeer::PRCASOPRE;
      }
  
	} 
	
	public function setPrcreqapr($v)
	{

    if ($this->prcreqapr !== $v) {
        $this->prcreqapr = $v;
        $this->modifiedColumns[] = CadefartPeer::PRCREQAPR;
      }
  
	} 
	
	public function setComasopre($v)
	{

    if ($this->comasopre !== $v) {
        $this->comasopre = $v;
        $this->modifiedColumns[] = CadefartPeer::COMASOPRE;
      }
  
	} 
	
	public function setComreqapr($v)
	{

    if ($this->comreqapr !== $v) {
        $this->comreqapr = $v;
        $this->modifiedColumns[] = CadefartPeer::COMREQAPR;
      }
  
	} 
	
	public function setAlmcorre($v)
	{

    if ($this->almcorre !== $v) {
        $this->almcorre = $v;
        $this->modifiedColumns[] = CadefartPeer::ALMCORRE;
      }
  
	} 
	
	public function setForsnc($v)
	{

    if ($this->forsnc !== $v) {
        $this->forsnc = $v;
        $this->modifiedColumns[] = CadefartPeer::FORSNC;
      }
  
	} 
	
	public function setDessnc($v)
	{

    if ($this->dessnc !== $v) {
        $this->dessnc = $v;
        $this->modifiedColumns[] = CadefartPeer::DESSNC;
      }
  
	} 
	
	public function setReqreqapr($v)
	{

    if ($this->reqreqapr !== $v) {
        $this->reqreqapr = $v;
        $this->modifiedColumns[] = CadefartPeer::REQREQAPR;
      }
  
	} 
	
	public function setSolreqapr($v)
	{

    if ($this->solreqapr !== $v) {
        $this->solreqapr = $v;
        $this->modifiedColumns[] = CadefartPeer::SOLREQAPR;
      }
  
	} 
	
	public function setGencorart($v)
	{

    if ($this->gencorart !== $v) {
        $this->gencorart = $v;
        $this->modifiedColumns[] = CadefartPeer::GENCORART;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CadefartPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->lonart = $rs->getFloat($startcol + 1);

      $this->rupart = $rs->getFloat($startcol + 2);

      $this->forart = $rs->getString($startcol + 3);

      $this->desart = $rs->getString($startcol + 4);

      $this->forubi = $rs->getString($startcol + 5);

      $this->desubi = $rs->getString($startcol + 6);

      $this->correq = $rs->getString($startcol + 7);

      $this->corord = $rs->getString($startcol + 8);

      $this->correc = $rs->getString($startcol + 9);

      $this->cordes = $rs->getString($startcol + 10);

      $this->generaop = $rs->getString($startcol + 11);

      $this->asiparrec = $rs->getString($startcol + 12);

      $this->generacom = $rs->getString($startcol + 13);

      $this->mercon = $rs->getString($startcol + 14);

      $this->ctadev = $rs->getString($startcol + 15);

      $this->ctavco = $rs->getString($startcol + 16);

      $this->univta = $rs->getString($startcol + 17);

      $this->artven = $rs->getString($startcol + 18);

      $this->artins = $rs->getString($startcol + 19);

      $this->artser = $rs->getString($startcol + 20);

      $this->codalmven = $rs->getString($startcol + 21);

      $this->recart = $rs->getFloat($startcol + 22);

      $this->ordcom = $rs->getFloat($startcol + 23);

      $this->reqart = $rs->getFloat($startcol + 24);

      $this->dphart = $rs->getFloat($startcol + 25);

      $this->ordser = $rs->getFloat($startcol + 26);

      $this->tipimprec = $rs->getString($startcol + 27);

      $this->artvenhas = $rs->getString($startcol + 28);

      $this->corcot = $rs->getString($startcol + 29);

      $this->solart = $rs->getString($startcol + 30);

      $this->apliclades = $rs->getString($startcol + 31);

      $this->solcom = $rs->getFloat($startcol + 32);

      $this->unidad = $rs->getString($startcol + 33);

      $this->prcasopre = $rs->getString($startcol + 34);

      $this->prcreqapr = $rs->getString($startcol + 35);

      $this->comasopre = $rs->getString($startcol + 36);

      $this->comreqapr = $rs->getString($startcol + 37);

      $this->almcorre = $rs->getString($startcol + 38);

      $this->forsnc = $rs->getString($startcol + 39);

      $this->dessnc = $rs->getString($startcol + 40);

      $this->reqreqapr = $rs->getString($startcol + 41);

      $this->solreqapr = $rs->getString($startcol + 42);

      $this->gencorart = $rs->getString($startcol + 43);

      $this->id = $rs->getInt($startcol + 44);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 45; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cadefart object", $e);
    }
  }


  protected function afterHydrate()
  {

  }
    
  
  public function __call($m, $a)
    {
      $prefijo = substr($m,0,3);
    $metodo = strtolower(substr($m,3));
        if($prefijo=='get'){
      if(isset($this->$metodo)) return $this->$metodo;
      else return '';
    }elseif($prefijo=='set'){
      if(isset($this->$metodo)) $this->$metodo = $a[0];
    }else call_user_func_array($m, $a);

    }

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CadefartPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CadefartPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CadefartPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CadefartPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CadefartPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = CadefartPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadefartPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getLonart();
				break;
			case 2:
				return $this->getRupart();
				break;
			case 3:
				return $this->getForart();
				break;
			case 4:
				return $this->getDesart();
				break;
			case 5:
				return $this->getForubi();
				break;
			case 6:
				return $this->getDesubi();
				break;
			case 7:
				return $this->getCorreq();
				break;
			case 8:
				return $this->getCorord();
				break;
			case 9:
				return $this->getCorrec();
				break;
			case 10:
				return $this->getCordes();
				break;
			case 11:
				return $this->getGeneraop();
				break;
			case 12:
				return $this->getAsiparrec();
				break;
			case 13:
				return $this->getGeneracom();
				break;
			case 14:
				return $this->getMercon();
				break;
			case 15:
				return $this->getCtadev();
				break;
			case 16:
				return $this->getCtavco();
				break;
			case 17:
				return $this->getUnivta();
				break;
			case 18:
				return $this->getArtven();
				break;
			case 19:
				return $this->getArtins();
				break;
			case 20:
				return $this->getArtser();
				break;
			case 21:
				return $this->getCodalmven();
				break;
			case 22:
				return $this->getRecart();
				break;
			case 23:
				return $this->getOrdcom();
				break;
			case 24:
				return $this->getReqart();
				break;
			case 25:
				return $this->getDphart();
				break;
			case 26:
				return $this->getOrdser();
				break;
			case 27:
				return $this->getTipimprec();
				break;
			case 28:
				return $this->getArtvenhas();
				break;
			case 29:
				return $this->getCorcot();
				break;
			case 30:
				return $this->getSolart();
				break;
			case 31:
				return $this->getApliclades();
				break;
			case 32:
				return $this->getSolcom();
				break;
			case 33:
				return $this->getUnidad();
				break;
			case 34:
				return $this->getPrcasopre();
				break;
			case 35:
				return $this->getPrcreqapr();
				break;
			case 36:
				return $this->getComasopre();
				break;
			case 37:
				return $this->getComreqapr();
				break;
			case 38:
				return $this->getAlmcorre();
				break;
			case 39:
				return $this->getForsnc();
				break;
			case 40:
				return $this->getDessnc();
				break;
			case 41:
				return $this->getReqreqapr();
				break;
			case 42:
				return $this->getSolreqapr();
				break;
			case 43:
				return $this->getGencorart();
				break;
			case 44:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadefartPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getLonart(),
			$keys[2] => $this->getRupart(),
			$keys[3] => $this->getForart(),
			$keys[4] => $this->getDesart(),
			$keys[5] => $this->getForubi(),
			$keys[6] => $this->getDesubi(),
			$keys[7] => $this->getCorreq(),
			$keys[8] => $this->getCorord(),
			$keys[9] => $this->getCorrec(),
			$keys[10] => $this->getCordes(),
			$keys[11] => $this->getGeneraop(),
			$keys[12] => $this->getAsiparrec(),
			$keys[13] => $this->getGeneracom(),
			$keys[14] => $this->getMercon(),
			$keys[15] => $this->getCtadev(),
			$keys[16] => $this->getCtavco(),
			$keys[17] => $this->getUnivta(),
			$keys[18] => $this->getArtven(),
			$keys[19] => $this->getArtins(),
			$keys[20] => $this->getArtser(),
			$keys[21] => $this->getCodalmven(),
			$keys[22] => $this->getRecart(),
			$keys[23] => $this->getOrdcom(),
			$keys[24] => $this->getReqart(),
			$keys[25] => $this->getDphart(),
			$keys[26] => $this->getOrdser(),
			$keys[27] => $this->getTipimprec(),
			$keys[28] => $this->getArtvenhas(),
			$keys[29] => $this->getCorcot(),
			$keys[30] => $this->getSolart(),
			$keys[31] => $this->getApliclades(),
			$keys[32] => $this->getSolcom(),
			$keys[33] => $this->getUnidad(),
			$keys[34] => $this->getPrcasopre(),
			$keys[35] => $this->getPrcreqapr(),
			$keys[36] => $this->getComasopre(),
			$keys[37] => $this->getComreqapr(),
			$keys[38] => $this->getAlmcorre(),
			$keys[39] => $this->getForsnc(),
			$keys[40] => $this->getDessnc(),
			$keys[41] => $this->getReqreqapr(),
			$keys[42] => $this->getSolreqapr(),
			$keys[43] => $this->getGencorart(),
			$keys[44] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadefartPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setLonart($value);
				break;
			case 2:
				$this->setRupart($value);
				break;
			case 3:
				$this->setForart($value);
				break;
			case 4:
				$this->setDesart($value);
				break;
			case 5:
				$this->setForubi($value);
				break;
			case 6:
				$this->setDesubi($value);
				break;
			case 7:
				$this->setCorreq($value);
				break;
			case 8:
				$this->setCorord($value);
				break;
			case 9:
				$this->setCorrec($value);
				break;
			case 10:
				$this->setCordes($value);
				break;
			case 11:
				$this->setGeneraop($value);
				break;
			case 12:
				$this->setAsiparrec($value);
				break;
			case 13:
				$this->setGeneracom($value);
				break;
			case 14:
				$this->setMercon($value);
				break;
			case 15:
				$this->setCtadev($value);
				break;
			case 16:
				$this->setCtavco($value);
				break;
			case 17:
				$this->setUnivta($value);
				break;
			case 18:
				$this->setArtven($value);
				break;
			case 19:
				$this->setArtins($value);
				break;
			case 20:
				$this->setArtser($value);
				break;
			case 21:
				$this->setCodalmven($value);
				break;
			case 22:
				$this->setRecart($value);
				break;
			case 23:
				$this->setOrdcom($value);
				break;
			case 24:
				$this->setReqart($value);
				break;
			case 25:
				$this->setDphart($value);
				break;
			case 26:
				$this->setOrdser($value);
				break;
			case 27:
				$this->setTipimprec($value);
				break;
			case 28:
				$this->setArtvenhas($value);
				break;
			case 29:
				$this->setCorcot($value);
				break;
			case 30:
				$this->setSolart($value);
				break;
			case 31:
				$this->setApliclades($value);
				break;
			case 32:
				$this->setSolcom($value);
				break;
			case 33:
				$this->setUnidad($value);
				break;
			case 34:
				$this->setPrcasopre($value);
				break;
			case 35:
				$this->setPrcreqapr($value);
				break;
			case 36:
				$this->setComasopre($value);
				break;
			case 37:
				$this->setComreqapr($value);
				break;
			case 38:
				$this->setAlmcorre($value);
				break;
			case 39:
				$this->setForsnc($value);
				break;
			case 40:
				$this->setDessnc($value);
				break;
			case 41:
				$this->setReqreqapr($value);
				break;
			case 42:
				$this->setSolreqapr($value);
				break;
			case 43:
				$this->setGencorart($value);
				break;
			case 44:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadefartPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setLonart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRupart($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setForart($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDesart($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setForubi($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDesubi($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCorreq($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCorord($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCorrec($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCordes($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setGeneraop($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setAsiparrec($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setGeneracom($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setMercon($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCtadev($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCtavco($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setUnivta($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setArtven($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setArtins($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setArtser($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setCodalmven($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setRecart($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setOrdcom($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setReqart($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setDphart($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setOrdser($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setTipimprec($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setArtvenhas($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setCorcot($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setSolart($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setApliclades($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setSolcom($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setUnidad($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setPrcasopre($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setPrcreqapr($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setComasopre($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setComreqapr($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setAlmcorre($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setForsnc($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setDessnc($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setReqreqapr($arr[$keys[41]]);
		if (array_key_exists($keys[42], $arr)) $this->setSolreqapr($arr[$keys[42]]);
		if (array_key_exists($keys[43], $arr)) $this->setGencorart($arr[$keys[43]]);
		if (array_key_exists($keys[44], $arr)) $this->setId($arr[$keys[44]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CadefartPeer::DATABASE_NAME);

		if ($this->isColumnModified(CadefartPeer::CODEMP)) $criteria->add(CadefartPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(CadefartPeer::LONART)) $criteria->add(CadefartPeer::LONART, $this->lonart);
		if ($this->isColumnModified(CadefartPeer::RUPART)) $criteria->add(CadefartPeer::RUPART, $this->rupart);
		if ($this->isColumnModified(CadefartPeer::FORART)) $criteria->add(CadefartPeer::FORART, $this->forart);
		if ($this->isColumnModified(CadefartPeer::DESART)) $criteria->add(CadefartPeer::DESART, $this->desart);
		if ($this->isColumnModified(CadefartPeer::FORUBI)) $criteria->add(CadefartPeer::FORUBI, $this->forubi);
		if ($this->isColumnModified(CadefartPeer::DESUBI)) $criteria->add(CadefartPeer::DESUBI, $this->desubi);
		if ($this->isColumnModified(CadefartPeer::CORREQ)) $criteria->add(CadefartPeer::CORREQ, $this->correq);
		if ($this->isColumnModified(CadefartPeer::CORORD)) $criteria->add(CadefartPeer::CORORD, $this->corord);
		if ($this->isColumnModified(CadefartPeer::CORREC)) $criteria->add(CadefartPeer::CORREC, $this->correc);
		if ($this->isColumnModified(CadefartPeer::CORDES)) $criteria->add(CadefartPeer::CORDES, $this->cordes);
		if ($this->isColumnModified(CadefartPeer::GENERAOP)) $criteria->add(CadefartPeer::GENERAOP, $this->generaop);
		if ($this->isColumnModified(CadefartPeer::ASIPARREC)) $criteria->add(CadefartPeer::ASIPARREC, $this->asiparrec);
		if ($this->isColumnModified(CadefartPeer::GENERACOM)) $criteria->add(CadefartPeer::GENERACOM, $this->generacom);
		if ($this->isColumnModified(CadefartPeer::MERCON)) $criteria->add(CadefartPeer::MERCON, $this->mercon);
		if ($this->isColumnModified(CadefartPeer::CTADEV)) $criteria->add(CadefartPeer::CTADEV, $this->ctadev);
		if ($this->isColumnModified(CadefartPeer::CTAVCO)) $criteria->add(CadefartPeer::CTAVCO, $this->ctavco);
		if ($this->isColumnModified(CadefartPeer::UNIVTA)) $criteria->add(CadefartPeer::UNIVTA, $this->univta);
		if ($this->isColumnModified(CadefartPeer::ARTVEN)) $criteria->add(CadefartPeer::ARTVEN, $this->artven);
		if ($this->isColumnModified(CadefartPeer::ARTINS)) $criteria->add(CadefartPeer::ARTINS, $this->artins);
		if ($this->isColumnModified(CadefartPeer::ARTSER)) $criteria->add(CadefartPeer::ARTSER, $this->artser);
		if ($this->isColumnModified(CadefartPeer::CODALMVEN)) $criteria->add(CadefartPeer::CODALMVEN, $this->codalmven);
		if ($this->isColumnModified(CadefartPeer::RECART)) $criteria->add(CadefartPeer::RECART, $this->recart);
		if ($this->isColumnModified(CadefartPeer::ORDCOM)) $criteria->add(CadefartPeer::ORDCOM, $this->ordcom);
		if ($this->isColumnModified(CadefartPeer::REQART)) $criteria->add(CadefartPeer::REQART, $this->reqart);
		if ($this->isColumnModified(CadefartPeer::DPHART)) $criteria->add(CadefartPeer::DPHART, $this->dphart);
		if ($this->isColumnModified(CadefartPeer::ORDSER)) $criteria->add(CadefartPeer::ORDSER, $this->ordser);
		if ($this->isColumnModified(CadefartPeer::TIPIMPREC)) $criteria->add(CadefartPeer::TIPIMPREC, $this->tipimprec);
		if ($this->isColumnModified(CadefartPeer::ARTVENHAS)) $criteria->add(CadefartPeer::ARTVENHAS, $this->artvenhas);
		if ($this->isColumnModified(CadefartPeer::CORCOT)) $criteria->add(CadefartPeer::CORCOT, $this->corcot);
		if ($this->isColumnModified(CadefartPeer::SOLART)) $criteria->add(CadefartPeer::SOLART, $this->solart);
		if ($this->isColumnModified(CadefartPeer::APLICLADES)) $criteria->add(CadefartPeer::APLICLADES, $this->apliclades);
		if ($this->isColumnModified(CadefartPeer::SOLCOM)) $criteria->add(CadefartPeer::SOLCOM, $this->solcom);
		if ($this->isColumnModified(CadefartPeer::UNIDAD)) $criteria->add(CadefartPeer::UNIDAD, $this->unidad);
		if ($this->isColumnModified(CadefartPeer::PRCASOPRE)) $criteria->add(CadefartPeer::PRCASOPRE, $this->prcasopre);
		if ($this->isColumnModified(CadefartPeer::PRCREQAPR)) $criteria->add(CadefartPeer::PRCREQAPR, $this->prcreqapr);
		if ($this->isColumnModified(CadefartPeer::COMASOPRE)) $criteria->add(CadefartPeer::COMASOPRE, $this->comasopre);
		if ($this->isColumnModified(CadefartPeer::COMREQAPR)) $criteria->add(CadefartPeer::COMREQAPR, $this->comreqapr);
		if ($this->isColumnModified(CadefartPeer::ALMCORRE)) $criteria->add(CadefartPeer::ALMCORRE, $this->almcorre);
		if ($this->isColumnModified(CadefartPeer::FORSNC)) $criteria->add(CadefartPeer::FORSNC, $this->forsnc);
		if ($this->isColumnModified(CadefartPeer::DESSNC)) $criteria->add(CadefartPeer::DESSNC, $this->dessnc);
		if ($this->isColumnModified(CadefartPeer::REQREQAPR)) $criteria->add(CadefartPeer::REQREQAPR, $this->reqreqapr);
		if ($this->isColumnModified(CadefartPeer::SOLREQAPR)) $criteria->add(CadefartPeer::SOLREQAPR, $this->solreqapr);
		if ($this->isColumnModified(CadefartPeer::GENCORART)) $criteria->add(CadefartPeer::GENCORART, $this->gencorart);
		if ($this->isColumnModified(CadefartPeer::ID)) $criteria->add(CadefartPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CadefartPeer::DATABASE_NAME);

		$criteria->add(CadefartPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setCodemp($this->codemp);

		$copyObj->setLonart($this->lonart);

		$copyObj->setRupart($this->rupart);

		$copyObj->setForart($this->forart);

		$copyObj->setDesart($this->desart);

		$copyObj->setForubi($this->forubi);

		$copyObj->setDesubi($this->desubi);

		$copyObj->setCorreq($this->correq);

		$copyObj->setCorord($this->corord);

		$copyObj->setCorrec($this->correc);

		$copyObj->setCordes($this->cordes);

		$copyObj->setGeneraop($this->generaop);

		$copyObj->setAsiparrec($this->asiparrec);

		$copyObj->setGeneracom($this->generacom);

		$copyObj->setMercon($this->mercon);

		$copyObj->setCtadev($this->ctadev);

		$copyObj->setCtavco($this->ctavco);

		$copyObj->setUnivta($this->univta);

		$copyObj->setArtven($this->artven);

		$copyObj->setArtins($this->artins);

		$copyObj->setArtser($this->artser);

		$copyObj->setCodalmven($this->codalmven);

		$copyObj->setRecart($this->recart);

		$copyObj->setOrdcom($this->ordcom);

		$copyObj->setReqart($this->reqart);

		$copyObj->setDphart($this->dphart);

		$copyObj->setOrdser($this->ordser);

		$copyObj->setTipimprec($this->tipimprec);

		$copyObj->setArtvenhas($this->artvenhas);

		$copyObj->setCorcot($this->corcot);

		$copyObj->setSolart($this->solart);

		$copyObj->setApliclades($this->apliclades);

		$copyObj->setSolcom($this->solcom);

		$copyObj->setUnidad($this->unidad);

		$copyObj->setPrcasopre($this->prcasopre);

		$copyObj->setPrcreqapr($this->prcreqapr);

		$copyObj->setComasopre($this->comasopre);

		$copyObj->setComreqapr($this->comreqapr);

		$copyObj->setAlmcorre($this->almcorre);

		$copyObj->setForsnc($this->forsnc);

		$copyObj->setDessnc($this->dessnc);

		$copyObj->setReqreqapr($this->reqreqapr);

		$copyObj->setSolreqapr($this->solreqapr);

		$copyObj->setGencorart($this->gencorart);


		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new CadefartPeer();
		}
		return self::$peer;
	}

} 