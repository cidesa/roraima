<?php


abstract class BaseCcgarant extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomgar;


	
	protected $monestgar;


	
	protected $desgar;


	
	protected $monava;


	
	protected $fecrec;


	
	protected $codusu;


	
	protected $ubinomurb;


	
	protected $ubinumcasedi;


	
	protected $ubinumcal;


	
	protected $ubinumpis;


	
	protected $ubinumapt;


	
	protected $ubipunref;


	
	protected $gravam;


	
	protected $grado;


	
	protected $reapor;


	
	protected $nompro;


	
	protected $cedpro;


	
	protected $cctipgar_id;


	
	protected $cccredit_id;


	
	protected $ccparroq_id;

	
	protected $aCctipgar;

	
	protected $aCccredit;

	
	protected $aCcparroq;

	
	protected $collCcavagarcres;

	
	protected $lastCcavagarcreCriteria = null;

	
	protected $collCcavaliss;

	
	protected $lastCcavalisCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomgar()
  {

    return trim($this->nomgar);

  }
  
  public function getMonestgar($val=false)
  {

    if($val) return number_format($this->monestgar,2,',','.');
    else return $this->monestgar;

  }
  
  public function getDesgar()
  {

    return trim($this->desgar);

  }
  
  public function getMonava($val=false)
  {

    if($val) return number_format($this->monava,2,',','.');
    else return $this->monava;

  }
  
  public function getFecrec($format = 'Y-m-d')
  {

    if ($this->fecrec === null || $this->fecrec === '') {
      return null;
    } elseif (!is_int($this->fecrec)) {
            $ts = adodb_strtotime($this->fecrec);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecrec] as date/time value: " . var_export($this->fecrec, true));
      }
    } else {
      $ts = $this->fecrec;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodusu()
  {

    return $this->codusu;

  }
  
  public function getUbinomurb()
  {

    return trim($this->ubinomurb);

  }
  
  public function getUbinumcasedi()
  {

    return trim($this->ubinumcasedi);

  }
  
  public function getUbinumcal()
  {

    return trim($this->ubinumcal);

  }
  
  public function getUbinumpis()
  {

    return trim($this->ubinumpis);

  }
  
  public function getUbinumapt()
  {

    return trim($this->ubinumapt);

  }
  
  public function getUbipunref()
  {

    return trim($this->ubipunref);

  }
  
  public function getGravam()
  {

    return $this->gravam;

  }
  
  public function getGrado()
  {

    return trim($this->grado);

  }
  
  public function getReapor()
  {

    return trim($this->reapor);

  }
  
  public function getNompro()
  {

    return trim($this->nompro);

  }
  
  public function getCedpro()
  {

    return trim($this->cedpro);

  }
  
  public function getCctipgarId()
  {

    return $this->cctipgar_id;

  }
  
  public function getCccreditId()
  {

    return $this->cccredit_id;

  }
  
  public function getCcparroqId()
  {

    return $this->ccparroq_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcgarantPeer::ID;
      }
  
	} 
	
	public function setNomgar($v)
	{

    if ($this->nomgar !== $v) {
        $this->nomgar = $v;
        $this->modifiedColumns[] = CcgarantPeer::NOMGAR;
      }
  
	} 
	
	public function setMonestgar($v)
	{

    if ($this->monestgar !== $v) {
        $this->monestgar = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcgarantPeer::MONESTGAR;
      }
  
	} 
	
	public function setDesgar($v)
	{

    if ($this->desgar !== $v) {
        $this->desgar = $v;
        $this->modifiedColumns[] = CcgarantPeer::DESGAR;
      }
  
	} 
	
	public function setMonava($v)
	{

    if ($this->monava !== $v) {
        $this->monava = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcgarantPeer::MONAVA;
      }
  
	} 
	
	public function setFecrec($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecrec] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecrec !== $ts) {
      $this->fecrec = $ts;
      $this->modifiedColumns[] = CcgarantPeer::FECREC;
    }

	} 
	
	public function setCodusu($v)
	{

    if ($this->codusu !== $v) {
        $this->codusu = $v;
        $this->modifiedColumns[] = CcgarantPeer::CODUSU;
      }
  
	} 
	
	public function setUbinomurb($v)
	{

    if ($this->ubinomurb !== $v) {
        $this->ubinomurb = $v;
        $this->modifiedColumns[] = CcgarantPeer::UBINOMURB;
      }
  
	} 
	
	public function setUbinumcasedi($v)
	{

    if ($this->ubinumcasedi !== $v) {
        $this->ubinumcasedi = $v;
        $this->modifiedColumns[] = CcgarantPeer::UBINUMCASEDI;
      }
  
	} 
	
	public function setUbinumcal($v)
	{

    if ($this->ubinumcal !== $v) {
        $this->ubinumcal = $v;
        $this->modifiedColumns[] = CcgarantPeer::UBINUMCAL;
      }
  
	} 
	
	public function setUbinumpis($v)
	{

    if ($this->ubinumpis !== $v) {
        $this->ubinumpis = $v;
        $this->modifiedColumns[] = CcgarantPeer::UBINUMPIS;
      }
  
	} 
	
	public function setUbinumapt($v)
	{

    if ($this->ubinumapt !== $v) {
        $this->ubinumapt = $v;
        $this->modifiedColumns[] = CcgarantPeer::UBINUMAPT;
      }
  
	} 
	
	public function setUbipunref($v)
	{

    if ($this->ubipunref !== $v) {
        $this->ubipunref = $v;
        $this->modifiedColumns[] = CcgarantPeer::UBIPUNREF;
      }
  
	} 
	
	public function setGravam($v)
	{

    if ($this->gravam !== $v) {
        $this->gravam = $v;
        $this->modifiedColumns[] = CcgarantPeer::GRAVAM;
      }
  
	} 
	
	public function setGrado($v)
	{

    if ($this->grado !== $v) {
        $this->grado = $v;
        $this->modifiedColumns[] = CcgarantPeer::GRADO;
      }
  
	} 
	
	public function setReapor($v)
	{

    if ($this->reapor !== $v) {
        $this->reapor = $v;
        $this->modifiedColumns[] = CcgarantPeer::REAPOR;
      }
  
	} 
	
	public function setNompro($v)
	{

    if ($this->nompro !== $v) {
        $this->nompro = $v;
        $this->modifiedColumns[] = CcgarantPeer::NOMPRO;
      }
  
	} 
	
	public function setCedpro($v)
	{

    if ($this->cedpro !== $v) {
        $this->cedpro = $v;
        $this->modifiedColumns[] = CcgarantPeer::CEDPRO;
      }
  
	} 
	
	public function setCctipgarId($v)
	{

    if ($this->cctipgar_id !== $v) {
        $this->cctipgar_id = $v;
        $this->modifiedColumns[] = CcgarantPeer::CCTIPGAR_ID;
      }
  
		if ($this->aCctipgar !== null && $this->aCctipgar->getId() !== $v) {
			$this->aCctipgar = null;
		}

	} 
	
	public function setCccreditId($v)
	{

    if ($this->cccredit_id !== $v) {
        $this->cccredit_id = $v;
        $this->modifiedColumns[] = CcgarantPeer::CCCREDIT_ID;
      }
  
		if ($this->aCccredit !== null && $this->aCccredit->getId() !== $v) {
			$this->aCccredit = null;
		}

	} 
	
	public function setCcparroqId($v)
	{

    if ($this->ccparroq_id !== $v) {
        $this->ccparroq_id = $v;
        $this->modifiedColumns[] = CcgarantPeer::CCPARROQ_ID;
      }
  
		if ($this->aCcparroq !== null && $this->aCcparroq->getId() !== $v) {
			$this->aCcparroq = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomgar = $rs->getString($startcol + 1);

      $this->monestgar = $rs->getFloat($startcol + 2);

      $this->desgar = $rs->getString($startcol + 3);

      $this->monava = $rs->getFloat($startcol + 4);

      $this->fecrec = $rs->getDate($startcol + 5, null);

      $this->codusu = $rs->getInt($startcol + 6);

      $this->ubinomurb = $rs->getString($startcol + 7);

      $this->ubinumcasedi = $rs->getString($startcol + 8);

      $this->ubinumcal = $rs->getString($startcol + 9);

      $this->ubinumpis = $rs->getString($startcol + 10);

      $this->ubinumapt = $rs->getString($startcol + 11);

      $this->ubipunref = $rs->getString($startcol + 12);

      $this->gravam = $rs->getBoolean($startcol + 13);

      $this->grado = $rs->getString($startcol + 14);

      $this->reapor = $rs->getString($startcol + 15);

      $this->nompro = $rs->getString($startcol + 16);

      $this->cedpro = $rs->getString($startcol + 17);

      $this->cctipgar_id = $rs->getInt($startcol + 18);

      $this->cccredit_id = $rs->getInt($startcol + 19);

      $this->ccparroq_id = $rs->getInt($startcol + 20);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 21; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccgarant object", $e);
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
			$con = Propel::getConnection(CcgarantPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcgarantPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcgarantPeer::DATABASE_NAME);
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


												
			if ($this->aCctipgar !== null) {
				if ($this->aCctipgar->isModified()) {
					$affectedRows += $this->aCctipgar->save($con);
				}
				$this->setCctipgar($this->aCctipgar);
			}

			if ($this->aCccredit !== null) {
				if ($this->aCccredit->isModified()) {
					$affectedRows += $this->aCccredit->save($con);
				}
				$this->setCccredit($this->aCccredit);
			}

			if ($this->aCcparroq !== null) {
				if ($this->aCcparroq->isModified()) {
					$affectedRows += $this->aCcparroq->save($con);
				}
				$this->setCcparroq($this->aCcparroq);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcgarantPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcgarantPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcavagarcres !== null) {
				foreach($this->collCcavagarcres as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcavaliss !== null) {
				foreach($this->collCcavaliss as $referrerFK) {
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


												
			if ($this->aCctipgar !== null) {
				if (!$this->aCctipgar->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCctipgar->getValidationFailures());
				}
			}

			if ($this->aCccredit !== null) {
				if (!$this->aCccredit->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccredit->getValidationFailures());
				}
			}

			if ($this->aCcparroq !== null) {
				if (!$this->aCcparroq->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcparroq->getValidationFailures());
				}
			}


			if (($retval = CcgarantPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcavagarcres !== null) {
					foreach($this->collCcavagarcres as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcavaliss !== null) {
					foreach($this->collCcavaliss as $referrerFK) {
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
		$pos = CcgarantPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomgar();
				break;
			case 2:
				return $this->getMonestgar();
				break;
			case 3:
				return $this->getDesgar();
				break;
			case 4:
				return $this->getMonava();
				break;
			case 5:
				return $this->getFecrec();
				break;
			case 6:
				return $this->getCodusu();
				break;
			case 7:
				return $this->getUbinomurb();
				break;
			case 8:
				return $this->getUbinumcasedi();
				break;
			case 9:
				return $this->getUbinumcal();
				break;
			case 10:
				return $this->getUbinumpis();
				break;
			case 11:
				return $this->getUbinumapt();
				break;
			case 12:
				return $this->getUbipunref();
				break;
			case 13:
				return $this->getGravam();
				break;
			case 14:
				return $this->getGrado();
				break;
			case 15:
				return $this->getReapor();
				break;
			case 16:
				return $this->getNompro();
				break;
			case 17:
				return $this->getCedpro();
				break;
			case 18:
				return $this->getCctipgarId();
				break;
			case 19:
				return $this->getCccreditId();
				break;
			case 20:
				return $this->getCcparroqId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcgarantPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomgar(),
			$keys[2] => $this->getMonestgar(),
			$keys[3] => $this->getDesgar(),
			$keys[4] => $this->getMonava(),
			$keys[5] => $this->getFecrec(),
			$keys[6] => $this->getCodusu(),
			$keys[7] => $this->getUbinomurb(),
			$keys[8] => $this->getUbinumcasedi(),
			$keys[9] => $this->getUbinumcal(),
			$keys[10] => $this->getUbinumpis(),
			$keys[11] => $this->getUbinumapt(),
			$keys[12] => $this->getUbipunref(),
			$keys[13] => $this->getGravam(),
			$keys[14] => $this->getGrado(),
			$keys[15] => $this->getReapor(),
			$keys[16] => $this->getNompro(),
			$keys[17] => $this->getCedpro(),
			$keys[18] => $this->getCctipgarId(),
			$keys[19] => $this->getCccreditId(),
			$keys[20] => $this->getCcparroqId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcgarantPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomgar($value);
				break;
			case 2:
				$this->setMonestgar($value);
				break;
			case 3:
				$this->setDesgar($value);
				break;
			case 4:
				$this->setMonava($value);
				break;
			case 5:
				$this->setFecrec($value);
				break;
			case 6:
				$this->setCodusu($value);
				break;
			case 7:
				$this->setUbinomurb($value);
				break;
			case 8:
				$this->setUbinumcasedi($value);
				break;
			case 9:
				$this->setUbinumcal($value);
				break;
			case 10:
				$this->setUbinumpis($value);
				break;
			case 11:
				$this->setUbinumapt($value);
				break;
			case 12:
				$this->setUbipunref($value);
				break;
			case 13:
				$this->setGravam($value);
				break;
			case 14:
				$this->setGrado($value);
				break;
			case 15:
				$this->setReapor($value);
				break;
			case 16:
				$this->setNompro($value);
				break;
			case 17:
				$this->setCedpro($value);
				break;
			case 18:
				$this->setCctipgarId($value);
				break;
			case 19:
				$this->setCccreditId($value);
				break;
			case 20:
				$this->setCcparroqId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcgarantPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomgar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonestgar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDesgar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonava($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecrec($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodusu($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUbinomurb($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUbinumcasedi($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUbinumcal($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUbinumpis($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUbinumapt($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setUbipunref($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setGravam($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setGrado($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setReapor($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setNompro($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCedpro($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCctipgarId($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCccreditId($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCcparroqId($arr[$keys[20]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcgarantPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcgarantPeer::ID)) $criteria->add(CcgarantPeer::ID, $this->id);
		if ($this->isColumnModified(CcgarantPeer::NOMGAR)) $criteria->add(CcgarantPeer::NOMGAR, $this->nomgar);
		if ($this->isColumnModified(CcgarantPeer::MONESTGAR)) $criteria->add(CcgarantPeer::MONESTGAR, $this->monestgar);
		if ($this->isColumnModified(CcgarantPeer::DESGAR)) $criteria->add(CcgarantPeer::DESGAR, $this->desgar);
		if ($this->isColumnModified(CcgarantPeer::MONAVA)) $criteria->add(CcgarantPeer::MONAVA, $this->monava);
		if ($this->isColumnModified(CcgarantPeer::FECREC)) $criteria->add(CcgarantPeer::FECREC, $this->fecrec);
		if ($this->isColumnModified(CcgarantPeer::CODUSU)) $criteria->add(CcgarantPeer::CODUSU, $this->codusu);
		if ($this->isColumnModified(CcgarantPeer::UBINOMURB)) $criteria->add(CcgarantPeer::UBINOMURB, $this->ubinomurb);
		if ($this->isColumnModified(CcgarantPeer::UBINUMCASEDI)) $criteria->add(CcgarantPeer::UBINUMCASEDI, $this->ubinumcasedi);
		if ($this->isColumnModified(CcgarantPeer::UBINUMCAL)) $criteria->add(CcgarantPeer::UBINUMCAL, $this->ubinumcal);
		if ($this->isColumnModified(CcgarantPeer::UBINUMPIS)) $criteria->add(CcgarantPeer::UBINUMPIS, $this->ubinumpis);
		if ($this->isColumnModified(CcgarantPeer::UBINUMAPT)) $criteria->add(CcgarantPeer::UBINUMAPT, $this->ubinumapt);
		if ($this->isColumnModified(CcgarantPeer::UBIPUNREF)) $criteria->add(CcgarantPeer::UBIPUNREF, $this->ubipunref);
		if ($this->isColumnModified(CcgarantPeer::GRAVAM)) $criteria->add(CcgarantPeer::GRAVAM, $this->gravam);
		if ($this->isColumnModified(CcgarantPeer::GRADO)) $criteria->add(CcgarantPeer::GRADO, $this->grado);
		if ($this->isColumnModified(CcgarantPeer::REAPOR)) $criteria->add(CcgarantPeer::REAPOR, $this->reapor);
		if ($this->isColumnModified(CcgarantPeer::NOMPRO)) $criteria->add(CcgarantPeer::NOMPRO, $this->nompro);
		if ($this->isColumnModified(CcgarantPeer::CEDPRO)) $criteria->add(CcgarantPeer::CEDPRO, $this->cedpro);
		if ($this->isColumnModified(CcgarantPeer::CCTIPGAR_ID)) $criteria->add(CcgarantPeer::CCTIPGAR_ID, $this->cctipgar_id);
		if ($this->isColumnModified(CcgarantPeer::CCCREDIT_ID)) $criteria->add(CcgarantPeer::CCCREDIT_ID, $this->cccredit_id);
		if ($this->isColumnModified(CcgarantPeer::CCPARROQ_ID)) $criteria->add(CcgarantPeer::CCPARROQ_ID, $this->ccparroq_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcgarantPeer::DATABASE_NAME);

		$criteria->add(CcgarantPeer::ID, $this->id);

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

		$copyObj->setNomgar($this->nomgar);

		$copyObj->setMonestgar($this->monestgar);

		$copyObj->setDesgar($this->desgar);

		$copyObj->setMonava($this->monava);

		$copyObj->setFecrec($this->fecrec);

		$copyObj->setCodusu($this->codusu);

		$copyObj->setUbinomurb($this->ubinomurb);

		$copyObj->setUbinumcasedi($this->ubinumcasedi);

		$copyObj->setUbinumcal($this->ubinumcal);

		$copyObj->setUbinumpis($this->ubinumpis);

		$copyObj->setUbinumapt($this->ubinumapt);

		$copyObj->setUbipunref($this->ubipunref);

		$copyObj->setGravam($this->gravam);

		$copyObj->setGrado($this->grado);

		$copyObj->setReapor($this->reapor);

		$copyObj->setNompro($this->nompro);

		$copyObj->setCedpro($this->cedpro);

		$copyObj->setCctipgarId($this->cctipgar_id);

		$copyObj->setCccreditId($this->cccredit_id);

		$copyObj->setCcparroqId($this->ccparroq_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcavagarcres() as $relObj) {
				$copyObj->addCcavagarcre($relObj->copy($deepCopy));
			}

			foreach($this->getCcavaliss() as $relObj) {
				$copyObj->addCcavalis($relObj->copy($deepCopy));
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
			self::$peer = new CcgarantPeer();
		}
		return self::$peer;
	}

	
	public function setCctipgar($v)
	{


		if ($v === null) {
			$this->setCctipgarId(NULL);
		} else {
			$this->setCctipgarId($v->getId());
		}


		$this->aCctipgar = $v;
	}


	
	public function getCctipgar($con = null)
	{
		if ($this->aCctipgar === null && ($this->cctipgar_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCctipgarPeer.php';

      $c = new Criteria();
      $c->add(CctipgarPeer::ID,$this->cctipgar_id);
      
			$this->aCctipgar = CctipgarPeer::doSelectOne($c, $con);

			
		}
		return $this->aCctipgar;
	}

	
	public function setCccredit($v)
	{


		if ($v === null) {
			$this->setCccreditId(NULL);
		} else {
			$this->setCccreditId($v->getId());
		}


		$this->aCccredit = $v;
	}


	
	public function getCccredit($con = null)
	{
		if ($this->aCccredit === null && ($this->cccredit_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCccreditPeer.php';

      $c = new Criteria();
      $c->add(CccreditPeer::ID,$this->cccredit_id);
      
			$this->aCccredit = CccreditPeer::doSelectOne($c, $con);

			
		}
		return $this->aCccredit;
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

	
	public function initCcavagarcres()
	{
		if ($this->collCcavagarcres === null) {
			$this->collCcavagarcres = array();
		}
	}

	
	public function getCcavagarcres($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcavagarcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcavagarcres === null) {
			if ($this->isNew()) {
			   $this->collCcavagarcres = array();
			} else {

				$criteria->add(CcavagarcrePeer::CCGARANT_ID, $this->getId());

				CcavagarcrePeer::addSelectColumns($criteria);
				$this->collCcavagarcres = CcavagarcrePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcavagarcrePeer::CCGARANT_ID, $this->getId());

				CcavagarcrePeer::addSelectColumns($criteria);
				if (!isset($this->lastCcavagarcreCriteria) || !$this->lastCcavagarcreCriteria->equals($criteria)) {
					$this->collCcavagarcres = CcavagarcrePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcavagarcreCriteria = $criteria;
		return $this->collCcavagarcres;
	}

	
	public function countCcavagarcres($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcavagarcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcavagarcrePeer::CCGARANT_ID, $this->getId());

		return CcavagarcrePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcavagarcre(Ccavagarcre $l)
	{
		$this->collCcavagarcres[] = $l;
		$l->setCcgarant($this);
	}


	
	public function getCcavagarcresJoinCcavalis($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcavagarcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcavagarcres === null) {
			if ($this->isNew()) {
				$this->collCcavagarcres = array();
			} else {

				$criteria->add(CcavagarcrePeer::CCGARANT_ID, $this->getId());

				$this->collCcavagarcres = CcavagarcrePeer::doSelectJoinCcavalis($criteria, $con);
			}
		} else {
									
			$criteria->add(CcavagarcrePeer::CCGARANT_ID, $this->getId());

			if (!isset($this->lastCcavagarcreCriteria) || !$this->lastCcavagarcreCriteria->equals($criteria)) {
				$this->collCcavagarcres = CcavagarcrePeer::doSelectJoinCcavalis($criteria, $con);
			}
		}
		$this->lastCcavagarcreCriteria = $criteria;

		return $this->collCcavagarcres;
	}

	
	public function initCcavaliss()
	{
		if ($this->collCcavaliss === null) {
			$this->collCcavaliss = array();
		}
	}

	
	public function getCcavaliss($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcavalisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcavaliss === null) {
			if ($this->isNew()) {
			   $this->collCcavaliss = array();
			} else {

				$criteria->add(CcavalisPeer::CCGARANT_ID, $this->getId());

				CcavalisPeer::addSelectColumns($criteria);
				$this->collCcavaliss = CcavalisPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcavalisPeer::CCGARANT_ID, $this->getId());

				CcavalisPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcavalisCriteria) || !$this->lastCcavalisCriteria->equals($criteria)) {
					$this->collCcavaliss = CcavalisPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcavalisCriteria = $criteria;
		return $this->collCcavaliss;
	}

	
	public function countCcavaliss($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcavalisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcavalisPeer::CCGARANT_ID, $this->getId());

		return CcavalisPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcavalis(Ccavalis $l)
	{
		$this->collCcavaliss[] = $l;
		$l->setCcgarant($this);
	}


	
	public function getCcavalissJoinCcperpre($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcavalisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcavaliss === null) {
			if ($this->isNew()) {
				$this->collCcavaliss = array();
			} else {

				$criteria->add(CcavalisPeer::CCGARANT_ID, $this->getId());

				$this->collCcavaliss = CcavalisPeer::doSelectJoinCcperpre($criteria, $con);
			}
		} else {
									
			$criteria->add(CcavalisPeer::CCGARANT_ID, $this->getId());

			if (!isset($this->lastCcavalisCriteria) || !$this->lastCcavalisCriteria->equals($criteria)) {
				$this->collCcavaliss = CcavalisPeer::doSelectJoinCcperpre($criteria, $con);
			}
		}
		$this->lastCcavalisCriteria = $criteria;

		return $this->collCcavaliss;
	}

} 