<?php


abstract class BaseCcbieadq extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $desbieadq;


	
	protected $monpre;


	
	protected $monfacpro;


	
	protected $proced;


	
	protected $gravam;


	
	protected $grado;


	
	protected $ubinomurb;


	
	protected $ubinumcal;


	
	protected $ubinumcas;


	
	protected $ubipunref;


	
	protected $tipbien;


	
	protected $observ;


	
	protected $ubinumpis;


	
	protected $ubinumapt;


	
	protected $desotr;


	
	protected $numbie;


	
	protected $termetcua;


	
	protected $conmetcua;


	
	protected $numhab;


	
	protected $numban;


	
	protected $numest;


	
	protected $precinmu;


	
	protected $diaofe;


	
	protected $nomproven;


	
	protected $cedrifpro;


	
	protected $codarehab;


	
	protected $telhab;


	
	protected $codarecel;


	
	protected $telcel;


	
	protected $codareofi;


	
	protected $telofi;


	
	protected $ccsolici_id;


	
	protected $ccclabie_id;


	
	protected $cctipprobie_id;


	
	protected $ccparroq_id;

	
	protected $aCcsolici;

	
	protected $aCcclabie;

	
	protected $aCctipprobie;

	
	protected $aCcparroq;

	
	protected $collCcsecsols;

	
	protected $lastCcsecsolCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getDesbieadq()
  {

    return trim($this->desbieadq);

  }
  
  public function getMonpre($val=false)
  {

    if($val) return number_format($this->monpre,2,',','.');
    else return $this->monpre;

  }
  
  public function getMonfacpro($val=false)
  {

    if($val) return number_format($this->monfacpro,2,',','.');
    else return $this->monfacpro;

  }
  
  public function getProced()
  {

    return trim($this->proced);

  }
  
  public function getGravam()
  {

    return $this->gravam;

  }
  
  public function getGrado()
  {

    return trim($this->grado);

  }
  
  public function getUbinomurb()
  {

    return trim($this->ubinomurb);

  }
  
  public function getUbinumcal()
  {

    return trim($this->ubinumcal);

  }
  
  public function getUbinumcas()
  {

    return trim($this->ubinumcas);

  }
  
  public function getUbipunref()
  {

    return trim($this->ubipunref);

  }
  
  public function getTipbien()
  {

    return trim($this->tipbien);

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getUbinumpis()
  {

    return trim($this->ubinumpis);

  }
  
  public function getUbinumapt()
  {

    return trim($this->ubinumapt);

  }
  
  public function getDesotr()
  {

    return trim($this->desotr);

  }
  
  public function getNumbie()
  {

    return $this->numbie;

  }
  
  public function getTermetcua()
  {

    return trim($this->termetcua);

  }
  
  public function getConmetcua()
  {

    return trim($this->conmetcua);

  }
  
  public function getNumhab()
  {

    return trim($this->numhab);

  }
  
  public function getNumban()
  {

    return trim($this->numban);

  }
  
  public function getNumest()
  {

    return trim($this->numest);

  }
  
  public function getPrecinmu($val=false)
  {

    if($val) return number_format($this->precinmu,2,',','.');
    else return $this->precinmu;

  }
  
  public function getDiaofe()
  {

    return trim($this->diaofe);

  }
  
  public function getNomproven()
  {

    return trim($this->nomproven);

  }
  
  public function getCedrifpro()
  {

    return trim($this->cedrifpro);

  }
  
  public function getCodarehab()
  {

    return trim($this->codarehab);

  }
  
  public function getTelhab()
  {

    return trim($this->telhab);

  }
  
  public function getCodarecel()
  {

    return trim($this->codarecel);

  }
  
  public function getTelcel()
  {

    return trim($this->telcel);

  }
  
  public function getCodareofi()
  {

    return trim($this->codareofi);

  }
  
  public function getTelofi()
  {

    return trim($this->telofi);

  }
  
  public function getCcsoliciId()
  {

    return $this->ccsolici_id;

  }
  
  public function getCcclabieId()
  {

    return $this->ccclabie_id;

  }
  
  public function getCctipprobieId()
  {

    return $this->cctipprobie_id;

  }
  
  public function getCcparroqId()
  {

    return $this->ccparroq_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcbieadqPeer::ID;
      }
  
	} 
	
	public function setDesbieadq($v)
	{

    if ($this->desbieadq !== $v) {
        $this->desbieadq = $v;
        $this->modifiedColumns[] = CcbieadqPeer::DESBIEADQ;
      }
  
	} 
	
	public function setMonpre($v)
	{

    if ($this->monpre !== $v) {
        $this->monpre = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcbieadqPeer::MONPRE;
      }
  
	} 
	
	public function setMonfacpro($v)
	{

    if ($this->monfacpro !== $v) {
        $this->monfacpro = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcbieadqPeer::MONFACPRO;
      }
  
	} 
	
	public function setProced($v)
	{

    if ($this->proced !== $v) {
        $this->proced = $v;
        $this->modifiedColumns[] = CcbieadqPeer::PROCED;
      }
  
	} 
	
	public function setGravam($v)
	{

    if ($this->gravam !== $v) {
        $this->gravam = $v;
        $this->modifiedColumns[] = CcbieadqPeer::GRAVAM;
      }
  
	} 
	
	public function setGrado($v)
	{

    if ($this->grado !== $v) {
        $this->grado = $v;
        $this->modifiedColumns[] = CcbieadqPeer::GRADO;
      }
  
	} 
	
	public function setUbinomurb($v)
	{

    if ($this->ubinomurb !== $v) {
        $this->ubinomurb = $v;
        $this->modifiedColumns[] = CcbieadqPeer::UBINOMURB;
      }
  
	} 
	
	public function setUbinumcal($v)
	{

    if ($this->ubinumcal !== $v) {
        $this->ubinumcal = $v;
        $this->modifiedColumns[] = CcbieadqPeer::UBINUMCAL;
      }
  
	} 
	
	public function setUbinumcas($v)
	{

    if ($this->ubinumcas !== $v) {
        $this->ubinumcas = $v;
        $this->modifiedColumns[] = CcbieadqPeer::UBINUMCAS;
      }
  
	} 
	
	public function setUbipunref($v)
	{

    if ($this->ubipunref !== $v) {
        $this->ubipunref = $v;
        $this->modifiedColumns[] = CcbieadqPeer::UBIPUNREF;
      }
  
	} 
	
	public function setTipbien($v)
	{

    if ($this->tipbien !== $v) {
        $this->tipbien = $v;
        $this->modifiedColumns[] = CcbieadqPeer::TIPBIEN;
      }
  
	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = CcbieadqPeer::OBSERV;
      }
  
	} 
	
	public function setUbinumpis($v)
	{

    if ($this->ubinumpis !== $v) {
        $this->ubinumpis = $v;
        $this->modifiedColumns[] = CcbieadqPeer::UBINUMPIS;
      }
  
	} 
	
	public function setUbinumapt($v)
	{

    if ($this->ubinumapt !== $v) {
        $this->ubinumapt = $v;
        $this->modifiedColumns[] = CcbieadqPeer::UBINUMAPT;
      }
  
	} 
	
	public function setDesotr($v)
	{

    if ($this->desotr !== $v) {
        $this->desotr = $v;
        $this->modifiedColumns[] = CcbieadqPeer::DESOTR;
      }
  
	} 
	
	public function setNumbie($v)
	{

    if ($this->numbie !== $v) {
        $this->numbie = $v;
        $this->modifiedColumns[] = CcbieadqPeer::NUMBIE;
      }
  
	} 
	
	public function setTermetcua($v)
	{

    if ($this->termetcua !== $v) {
        $this->termetcua = $v;
        $this->modifiedColumns[] = CcbieadqPeer::TERMETCUA;
      }
  
	} 
	
	public function setConmetcua($v)
	{

    if ($this->conmetcua !== $v) {
        $this->conmetcua = $v;
        $this->modifiedColumns[] = CcbieadqPeer::CONMETCUA;
      }
  
	} 
	
	public function setNumhab($v)
	{

    if ($this->numhab !== $v) {
        $this->numhab = $v;
        $this->modifiedColumns[] = CcbieadqPeer::NUMHAB;
      }
  
	} 
	
	public function setNumban($v)
	{

    if ($this->numban !== $v) {
        $this->numban = $v;
        $this->modifiedColumns[] = CcbieadqPeer::NUMBAN;
      }
  
	} 
	
	public function setNumest($v)
	{

    if ($this->numest !== $v) {
        $this->numest = $v;
        $this->modifiedColumns[] = CcbieadqPeer::NUMEST;
      }
  
	} 
	
	public function setPrecinmu($v)
	{

    if ($this->precinmu !== $v) {
        $this->precinmu = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcbieadqPeer::PRECINMU;
      }
  
	} 
	
	public function setDiaofe($v)
	{

    if ($this->diaofe !== $v) {
        $this->diaofe = $v;
        $this->modifiedColumns[] = CcbieadqPeer::DIAOFE;
      }
  
	} 
	
	public function setNomproven($v)
	{

    if ($this->nomproven !== $v) {
        $this->nomproven = $v;
        $this->modifiedColumns[] = CcbieadqPeer::NOMPROVEN;
      }
  
	} 
	
	public function setCedrifpro($v)
	{

    if ($this->cedrifpro !== $v) {
        $this->cedrifpro = $v;
        $this->modifiedColumns[] = CcbieadqPeer::CEDRIFPRO;
      }
  
	} 
	
	public function setCodarehab($v)
	{

    if ($this->codarehab !== $v) {
        $this->codarehab = $v;
        $this->modifiedColumns[] = CcbieadqPeer::CODAREHAB;
      }
  
	} 
	
	public function setTelhab($v)
	{

    if ($this->telhab !== $v) {
        $this->telhab = $v;
        $this->modifiedColumns[] = CcbieadqPeer::TELHAB;
      }
  
	} 
	
	public function setCodarecel($v)
	{

    if ($this->codarecel !== $v) {
        $this->codarecel = $v;
        $this->modifiedColumns[] = CcbieadqPeer::CODARECEL;
      }
  
	} 
	
	public function setTelcel($v)
	{

    if ($this->telcel !== $v) {
        $this->telcel = $v;
        $this->modifiedColumns[] = CcbieadqPeer::TELCEL;
      }
  
	} 
	
	public function setCodareofi($v)
	{

    if ($this->codareofi !== $v) {
        $this->codareofi = $v;
        $this->modifiedColumns[] = CcbieadqPeer::CODAREOFI;
      }
  
	} 
	
	public function setTelofi($v)
	{

    if ($this->telofi !== $v) {
        $this->telofi = $v;
        $this->modifiedColumns[] = CcbieadqPeer::TELOFI;
      }
  
	} 
	
	public function setCcsoliciId($v)
	{

    if ($this->ccsolici_id !== $v) {
        $this->ccsolici_id = $v;
        $this->modifiedColumns[] = CcbieadqPeer::CCSOLICI_ID;
      }
  
		if ($this->aCcsolici !== null && $this->aCcsolici->getId() !== $v) {
			$this->aCcsolici = null;
		}

	} 
	
	public function setCcclabieId($v)
	{

    if ($this->ccclabie_id !== $v) {
        $this->ccclabie_id = $v;
        $this->modifiedColumns[] = CcbieadqPeer::CCCLABIE_ID;
      }
  
		if ($this->aCcclabie !== null && $this->aCcclabie->getId() !== $v) {
			$this->aCcclabie = null;
		}

	} 
	
	public function setCctipprobieId($v)
	{

    if ($this->cctipprobie_id !== $v) {
        $this->cctipprobie_id = $v;
        $this->modifiedColumns[] = CcbieadqPeer::CCTIPPROBIE_ID;
      }
  
		if ($this->aCctipprobie !== null && $this->aCctipprobie->getId() !== $v) {
			$this->aCctipprobie = null;
		}

	} 
	
	public function setCcparroqId($v)
	{

    if ($this->ccparroq_id !== $v) {
        $this->ccparroq_id = $v;
        $this->modifiedColumns[] = CcbieadqPeer::CCPARROQ_ID;
      }
  
		if ($this->aCcparroq !== null && $this->aCcparroq->getId() !== $v) {
			$this->aCcparroq = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->desbieadq = $rs->getString($startcol + 1);

      $this->monpre = $rs->getFloat($startcol + 2);

      $this->monfacpro = $rs->getFloat($startcol + 3);

      $this->proced = $rs->getString($startcol + 4);

      $this->gravam = $rs->getBoolean($startcol + 5);

      $this->grado = $rs->getString($startcol + 6);

      $this->ubinomurb = $rs->getString($startcol + 7);

      $this->ubinumcal = $rs->getString($startcol + 8);

      $this->ubinumcas = $rs->getString($startcol + 9);

      $this->ubipunref = $rs->getString($startcol + 10);

      $this->tipbien = $rs->getString($startcol + 11);

      $this->observ = $rs->getString($startcol + 12);

      $this->ubinumpis = $rs->getString($startcol + 13);

      $this->ubinumapt = $rs->getString($startcol + 14);

      $this->desotr = $rs->getString($startcol + 15);

      $this->numbie = $rs->getInt($startcol + 16);

      $this->termetcua = $rs->getString($startcol + 17);

      $this->conmetcua = $rs->getString($startcol + 18);

      $this->numhab = $rs->getString($startcol + 19);

      $this->numban = $rs->getString($startcol + 20);

      $this->numest = $rs->getString($startcol + 21);

      $this->precinmu = $rs->getFloat($startcol + 22);

      $this->diaofe = $rs->getString($startcol + 23);

      $this->nomproven = $rs->getString($startcol + 24);

      $this->cedrifpro = $rs->getString($startcol + 25);

      $this->codarehab = $rs->getString($startcol + 26);

      $this->telhab = $rs->getString($startcol + 27);

      $this->codarecel = $rs->getString($startcol + 28);

      $this->telcel = $rs->getString($startcol + 29);

      $this->codareofi = $rs->getString($startcol + 30);

      $this->telofi = $rs->getString($startcol + 31);

      $this->ccsolici_id = $rs->getInt($startcol + 32);

      $this->ccclabie_id = $rs->getInt($startcol + 33);

      $this->cctipprobie_id = $rs->getInt($startcol + 34);

      $this->ccparroq_id = $rs->getInt($startcol + 35);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 36; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccbieadq object", $e);
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
			$con = Propel::getConnection(CcbieadqPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcbieadqPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcbieadqPeer::DATABASE_NAME);
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


												
			if ($this->aCcsolici !== null) {
				if ($this->aCcsolici->isModified()) {
					$affectedRows += $this->aCcsolici->save($con);
				}
				$this->setCcsolici($this->aCcsolici);
			}

			if ($this->aCcclabie !== null) {
				if ($this->aCcclabie->isModified()) {
					$affectedRows += $this->aCcclabie->save($con);
				}
				$this->setCcclabie($this->aCcclabie);
			}

			if ($this->aCctipprobie !== null) {
				if ($this->aCctipprobie->isModified()) {
					$affectedRows += $this->aCctipprobie->save($con);
				}
				$this->setCctipprobie($this->aCctipprobie);
			}

			if ($this->aCcparroq !== null) {
				if ($this->aCcparroq->isModified()) {
					$affectedRows += $this->aCcparroq->save($con);
				}
				$this->setCcparroq($this->aCcparroq);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcbieadqPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcbieadqPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcsecsols !== null) {
				foreach($this->collCcsecsols as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


												
			if ($this->aCcsolici !== null) {
				if (!$this->aCcsolici->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcsolici->getValidationFailures());
				}
			}

			if ($this->aCcclabie !== null) {
				if (!$this->aCcclabie->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcclabie->getValidationFailures());
				}
			}

			if ($this->aCctipprobie !== null) {
				if (!$this->aCctipprobie->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCctipprobie->getValidationFailures());
				}
			}

			if ($this->aCcparroq !== null) {
				if (!$this->aCcparroq->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcparroq->getValidationFailures());
				}
			}


			if (($retval = CcbieadqPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcsecsols !== null) {
					foreach($this->collCcsecsols as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcbieadqPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getDesbieadq();
				break;
			case 2:
				return $this->getMonpre();
				break;
			case 3:
				return $this->getMonfacpro();
				break;
			case 4:
				return $this->getProced();
				break;
			case 5:
				return $this->getGravam();
				break;
			case 6:
				return $this->getGrado();
				break;
			case 7:
				return $this->getUbinomurb();
				break;
			case 8:
				return $this->getUbinumcal();
				break;
			case 9:
				return $this->getUbinumcas();
				break;
			case 10:
				return $this->getUbipunref();
				break;
			case 11:
				return $this->getTipbien();
				break;
			case 12:
				return $this->getObserv();
				break;
			case 13:
				return $this->getUbinumpis();
				break;
			case 14:
				return $this->getUbinumapt();
				break;
			case 15:
				return $this->getDesotr();
				break;
			case 16:
				return $this->getNumbie();
				break;
			case 17:
				return $this->getTermetcua();
				break;
			case 18:
				return $this->getConmetcua();
				break;
			case 19:
				return $this->getNumhab();
				break;
			case 20:
				return $this->getNumban();
				break;
			case 21:
				return $this->getNumest();
				break;
			case 22:
				return $this->getPrecinmu();
				break;
			case 23:
				return $this->getDiaofe();
				break;
			case 24:
				return $this->getNomproven();
				break;
			case 25:
				return $this->getCedrifpro();
				break;
			case 26:
				return $this->getCodarehab();
				break;
			case 27:
				return $this->getTelhab();
				break;
			case 28:
				return $this->getCodarecel();
				break;
			case 29:
				return $this->getTelcel();
				break;
			case 30:
				return $this->getCodareofi();
				break;
			case 31:
				return $this->getTelofi();
				break;
			case 32:
				return $this->getCcsoliciId();
				break;
			case 33:
				return $this->getCcclabieId();
				break;
			case 34:
				return $this->getCctipprobieId();
				break;
			case 35:
				return $this->getCcparroqId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcbieadqPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getDesbieadq(),
			$keys[2] => $this->getMonpre(),
			$keys[3] => $this->getMonfacpro(),
			$keys[4] => $this->getProced(),
			$keys[5] => $this->getGravam(),
			$keys[6] => $this->getGrado(),
			$keys[7] => $this->getUbinomurb(),
			$keys[8] => $this->getUbinumcal(),
			$keys[9] => $this->getUbinumcas(),
			$keys[10] => $this->getUbipunref(),
			$keys[11] => $this->getTipbien(),
			$keys[12] => $this->getObserv(),
			$keys[13] => $this->getUbinumpis(),
			$keys[14] => $this->getUbinumapt(),
			$keys[15] => $this->getDesotr(),
			$keys[16] => $this->getNumbie(),
			$keys[17] => $this->getTermetcua(),
			$keys[18] => $this->getConmetcua(),
			$keys[19] => $this->getNumhab(),
			$keys[20] => $this->getNumban(),
			$keys[21] => $this->getNumest(),
			$keys[22] => $this->getPrecinmu(),
			$keys[23] => $this->getDiaofe(),
			$keys[24] => $this->getNomproven(),
			$keys[25] => $this->getCedrifpro(),
			$keys[26] => $this->getCodarehab(),
			$keys[27] => $this->getTelhab(),
			$keys[28] => $this->getCodarecel(),
			$keys[29] => $this->getTelcel(),
			$keys[30] => $this->getCodareofi(),
			$keys[31] => $this->getTelofi(),
			$keys[32] => $this->getCcsoliciId(),
			$keys[33] => $this->getCcclabieId(),
			$keys[34] => $this->getCctipprobieId(),
			$keys[35] => $this->getCcparroqId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcbieadqPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setDesbieadq($value);
				break;
			case 2:
				$this->setMonpre($value);
				break;
			case 3:
				$this->setMonfacpro($value);
				break;
			case 4:
				$this->setProced($value);
				break;
			case 5:
				$this->setGravam($value);
				break;
			case 6:
				$this->setGrado($value);
				break;
			case 7:
				$this->setUbinomurb($value);
				break;
			case 8:
				$this->setUbinumcal($value);
				break;
			case 9:
				$this->setUbinumcas($value);
				break;
			case 10:
				$this->setUbipunref($value);
				break;
			case 11:
				$this->setTipbien($value);
				break;
			case 12:
				$this->setObserv($value);
				break;
			case 13:
				$this->setUbinumpis($value);
				break;
			case 14:
				$this->setUbinumapt($value);
				break;
			case 15:
				$this->setDesotr($value);
				break;
			case 16:
				$this->setNumbie($value);
				break;
			case 17:
				$this->setTermetcua($value);
				break;
			case 18:
				$this->setConmetcua($value);
				break;
			case 19:
				$this->setNumhab($value);
				break;
			case 20:
				$this->setNumban($value);
				break;
			case 21:
				$this->setNumest($value);
				break;
			case 22:
				$this->setPrecinmu($value);
				break;
			case 23:
				$this->setDiaofe($value);
				break;
			case 24:
				$this->setNomproven($value);
				break;
			case 25:
				$this->setCedrifpro($value);
				break;
			case 26:
				$this->setCodarehab($value);
				break;
			case 27:
				$this->setTelhab($value);
				break;
			case 28:
				$this->setCodarecel($value);
				break;
			case 29:
				$this->setTelcel($value);
				break;
			case 30:
				$this->setCodareofi($value);
				break;
			case 31:
				$this->setTelofi($value);
				break;
			case 32:
				$this->setCcsoliciId($value);
				break;
			case 33:
				$this->setCcclabieId($value);
				break;
			case 34:
				$this->setCctipprobieId($value);
				break;
			case 35:
				$this->setCcparroqId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcbieadqPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesbieadq($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonpre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonfacpro($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setProced($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setGravam($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setGrado($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUbinomurb($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUbinumcal($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUbinumcas($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUbipunref($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setTipbien($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setObserv($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setUbinumpis($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setUbinumapt($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setDesotr($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setNumbie($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setTermetcua($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setConmetcua($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setNumhab($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setNumban($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setNumest($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setPrecinmu($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setDiaofe($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setNomproven($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setCedrifpro($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setCodarehab($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setTelhab($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setCodarecel($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setTelcel($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setCodareofi($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setTelofi($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setCcsoliciId($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setCcclabieId($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setCctipprobieId($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setCcparroqId($arr[$keys[35]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcbieadqPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcbieadqPeer::ID)) $criteria->add(CcbieadqPeer::ID, $this->id);
		if ($this->isColumnModified(CcbieadqPeer::DESBIEADQ)) $criteria->add(CcbieadqPeer::DESBIEADQ, $this->desbieadq);
		if ($this->isColumnModified(CcbieadqPeer::MONPRE)) $criteria->add(CcbieadqPeer::MONPRE, $this->monpre);
		if ($this->isColumnModified(CcbieadqPeer::MONFACPRO)) $criteria->add(CcbieadqPeer::MONFACPRO, $this->monfacpro);
		if ($this->isColumnModified(CcbieadqPeer::PROCED)) $criteria->add(CcbieadqPeer::PROCED, $this->proced);
		if ($this->isColumnModified(CcbieadqPeer::GRAVAM)) $criteria->add(CcbieadqPeer::GRAVAM, $this->gravam);
		if ($this->isColumnModified(CcbieadqPeer::GRADO)) $criteria->add(CcbieadqPeer::GRADO, $this->grado);
		if ($this->isColumnModified(CcbieadqPeer::UBINOMURB)) $criteria->add(CcbieadqPeer::UBINOMURB, $this->ubinomurb);
		if ($this->isColumnModified(CcbieadqPeer::UBINUMCAL)) $criteria->add(CcbieadqPeer::UBINUMCAL, $this->ubinumcal);
		if ($this->isColumnModified(CcbieadqPeer::UBINUMCAS)) $criteria->add(CcbieadqPeer::UBINUMCAS, $this->ubinumcas);
		if ($this->isColumnModified(CcbieadqPeer::UBIPUNREF)) $criteria->add(CcbieadqPeer::UBIPUNREF, $this->ubipunref);
		if ($this->isColumnModified(CcbieadqPeer::TIPBIEN)) $criteria->add(CcbieadqPeer::TIPBIEN, $this->tipbien);
		if ($this->isColumnModified(CcbieadqPeer::OBSERV)) $criteria->add(CcbieadqPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(CcbieadqPeer::UBINUMPIS)) $criteria->add(CcbieadqPeer::UBINUMPIS, $this->ubinumpis);
		if ($this->isColumnModified(CcbieadqPeer::UBINUMAPT)) $criteria->add(CcbieadqPeer::UBINUMAPT, $this->ubinumapt);
		if ($this->isColumnModified(CcbieadqPeer::DESOTR)) $criteria->add(CcbieadqPeer::DESOTR, $this->desotr);
		if ($this->isColumnModified(CcbieadqPeer::NUMBIE)) $criteria->add(CcbieadqPeer::NUMBIE, $this->numbie);
		if ($this->isColumnModified(CcbieadqPeer::TERMETCUA)) $criteria->add(CcbieadqPeer::TERMETCUA, $this->termetcua);
		if ($this->isColumnModified(CcbieadqPeer::CONMETCUA)) $criteria->add(CcbieadqPeer::CONMETCUA, $this->conmetcua);
		if ($this->isColumnModified(CcbieadqPeer::NUMHAB)) $criteria->add(CcbieadqPeer::NUMHAB, $this->numhab);
		if ($this->isColumnModified(CcbieadqPeer::NUMBAN)) $criteria->add(CcbieadqPeer::NUMBAN, $this->numban);
		if ($this->isColumnModified(CcbieadqPeer::NUMEST)) $criteria->add(CcbieadqPeer::NUMEST, $this->numest);
		if ($this->isColumnModified(CcbieadqPeer::PRECINMU)) $criteria->add(CcbieadqPeer::PRECINMU, $this->precinmu);
		if ($this->isColumnModified(CcbieadqPeer::DIAOFE)) $criteria->add(CcbieadqPeer::DIAOFE, $this->diaofe);
		if ($this->isColumnModified(CcbieadqPeer::NOMPROVEN)) $criteria->add(CcbieadqPeer::NOMPROVEN, $this->nomproven);
		if ($this->isColumnModified(CcbieadqPeer::CEDRIFPRO)) $criteria->add(CcbieadqPeer::CEDRIFPRO, $this->cedrifpro);
		if ($this->isColumnModified(CcbieadqPeer::CODAREHAB)) $criteria->add(CcbieadqPeer::CODAREHAB, $this->codarehab);
		if ($this->isColumnModified(CcbieadqPeer::TELHAB)) $criteria->add(CcbieadqPeer::TELHAB, $this->telhab);
		if ($this->isColumnModified(CcbieadqPeer::CODARECEL)) $criteria->add(CcbieadqPeer::CODARECEL, $this->codarecel);
		if ($this->isColumnModified(CcbieadqPeer::TELCEL)) $criteria->add(CcbieadqPeer::TELCEL, $this->telcel);
		if ($this->isColumnModified(CcbieadqPeer::CODAREOFI)) $criteria->add(CcbieadqPeer::CODAREOFI, $this->codareofi);
		if ($this->isColumnModified(CcbieadqPeer::TELOFI)) $criteria->add(CcbieadqPeer::TELOFI, $this->telofi);
		if ($this->isColumnModified(CcbieadqPeer::CCSOLICI_ID)) $criteria->add(CcbieadqPeer::CCSOLICI_ID, $this->ccsolici_id);
		if ($this->isColumnModified(CcbieadqPeer::CCCLABIE_ID)) $criteria->add(CcbieadqPeer::CCCLABIE_ID, $this->ccclabie_id);
		if ($this->isColumnModified(CcbieadqPeer::CCTIPPROBIE_ID)) $criteria->add(CcbieadqPeer::CCTIPPROBIE_ID, $this->cctipprobie_id);
		if ($this->isColumnModified(CcbieadqPeer::CCPARROQ_ID)) $criteria->add(CcbieadqPeer::CCPARROQ_ID, $this->ccparroq_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcbieadqPeer::DATABASE_NAME);

		$criteria->add(CcbieadqPeer::ID, $this->id);

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

		$copyObj->setDesbieadq($this->desbieadq);

		$copyObj->setMonpre($this->monpre);

		$copyObj->setMonfacpro($this->monfacpro);

		$copyObj->setProced($this->proced);

		$copyObj->setGravam($this->gravam);

		$copyObj->setGrado($this->grado);

		$copyObj->setUbinomurb($this->ubinomurb);

		$copyObj->setUbinumcal($this->ubinumcal);

		$copyObj->setUbinumcas($this->ubinumcas);

		$copyObj->setUbipunref($this->ubipunref);

		$copyObj->setTipbien($this->tipbien);

		$copyObj->setObserv($this->observ);

		$copyObj->setUbinumpis($this->ubinumpis);

		$copyObj->setUbinumapt($this->ubinumapt);

		$copyObj->setDesotr($this->desotr);

		$copyObj->setNumbie($this->numbie);

		$copyObj->setTermetcua($this->termetcua);

		$copyObj->setConmetcua($this->conmetcua);

		$copyObj->setNumhab($this->numhab);

		$copyObj->setNumban($this->numban);

		$copyObj->setNumest($this->numest);

		$copyObj->setPrecinmu($this->precinmu);

		$copyObj->setDiaofe($this->diaofe);

		$copyObj->setNomproven($this->nomproven);

		$copyObj->setCedrifpro($this->cedrifpro);

		$copyObj->setCodarehab($this->codarehab);

		$copyObj->setTelhab($this->telhab);

		$copyObj->setCodarecel($this->codarecel);

		$copyObj->setTelcel($this->telcel);

		$copyObj->setCodareofi($this->codareofi);

		$copyObj->setTelofi($this->telofi);

		$copyObj->setCcsoliciId($this->ccsolici_id);

		$copyObj->setCcclabieId($this->ccclabie_id);

		$copyObj->setCctipprobieId($this->cctipprobie_id);

		$copyObj->setCcparroqId($this->ccparroq_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcsecsols() as $relObj) {
				$copyObj->addCcsecsol($relObj->copy($deepCopy));
			}

		} 

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
			self::$peer = new CcbieadqPeer();
		}
		return self::$peer;
	}

	
	public function setCcsolici($v)
	{


		if ($v === null) {
			$this->setCcsoliciId(NULL);
		} else {
			$this->setCcsoliciId($v->getId());
		}


		$this->aCcsolici = $v;
	}


	
	public function getCcsolici($con = null)
	{
		if ($this->aCcsolici === null && ($this->ccsolici_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';

      $c = new Criteria();
      $c->add(CcsoliciPeer::ID,$this->ccsolici_id);
      
			$this->aCcsolici = CcsoliciPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcsolici;
	}

	
	public function setCcclabie($v)
	{


		if ($v === null) {
			$this->setCcclabieId(NULL);
		} else {
			$this->setCcclabieId($v->getId());
		}


		$this->aCcclabie = $v;
	}


	
	public function getCcclabie($con = null)
	{
		if ($this->aCcclabie === null && ($this->ccclabie_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcclabiePeer.php';

      $c = new Criteria();
      $c->add(CcclabiePeer::ID,$this->ccclabie_id);
      
			$this->aCcclabie = CcclabiePeer::doSelectOne($c, $con);

			
		}
		return $this->aCcclabie;
	}

	
	public function setCctipprobie($v)
	{


		if ($v === null) {
			$this->setCctipprobieId(NULL);
		} else {
			$this->setCctipprobieId($v->getId());
		}


		$this->aCctipprobie = $v;
	}


	
	public function getCctipprobie($con = null)
	{
		if ($this->aCctipprobie === null && ($this->cctipprobie_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCctipprobiePeer.php';

      $c = new Criteria();
      $c->add(CctipprobiePeer::ID,$this->cctipprobie_id);
      
			$this->aCctipprobie = CctipprobiePeer::doSelectOne($c, $con);

			
		}
		return $this->aCctipprobie;
	}

	
	public function setCcparroq($v)
	{


		if ($v === null) {
			$this->setCcparroqId(NULL);
		} else {
			$this->setCcparroqId($v->getId());
		}


		$this->aCcparroq = $v;
	}


	
	public function getCcparroq($con = null)
	{
		if ($this->aCcparroq === null && ($this->ccparroq_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcparroqPeer.php';

      $c = new Criteria();
      $c->add(CcparroqPeer::ID,$this->ccparroq_id);
      
			$this->aCcparroq = CcparroqPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcparroq;
	}

	
	public function initCcsecsols()
	{
		if ($this->collCcsecsols === null) {
			$this->collCcsecsols = array();
		}
	}

	
	public function getCcsecsols($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsecsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsecsols === null) {
			if ($this->isNew()) {
			   $this->collCcsecsols = array();
			} else {

				$criteria->add(CcsecsolPeer::CCBIEADQ_ID, $this->getId());

				CcsecsolPeer::addSelectColumns($criteria);
				$this->collCcsecsols = CcsecsolPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcsecsolPeer::CCBIEADQ_ID, $this->getId());

				CcsecsolPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcsecsolCriteria) || !$this->lastCcsecsolCriteria->equals($criteria)) {
					$this->collCcsecsols = CcsecsolPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcsecsolCriteria = $criteria;
		return $this->collCcsecsols;
	}

	
	public function countCcsecsols($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsecsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcsecsolPeer::CCBIEADQ_ID, $this->getId());

		return CcsecsolPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcsecsol(Ccsecsol $l)
	{
		$this->collCcsecsols[] = $l;
		$l->setCcbieadq($this);
	}


	
	public function getCcsecsolsJoinCcsececo($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsecsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsecsols === null) {
			if ($this->isNew()) {
				$this->collCcsecsols = array();
			} else {

				$criteria->add(CcsecsolPeer::CCBIEADQ_ID, $this->getId());

				$this->collCcsecsols = CcsecsolPeer::doSelectJoinCcsececo($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsecsolPeer::CCBIEADQ_ID, $this->getId());

			if (!isset($this->lastCcsecsolCriteria) || !$this->lastCcsecsolCriteria->equals($criteria)) {
				$this->collCcsecsols = CcsecsolPeer::doSelectJoinCcsececo($criteria, $con);
			}
		}
		$this->lastCcsecsolCriteria = $criteria;

		return $this->collCcsecsols;
	}

} 