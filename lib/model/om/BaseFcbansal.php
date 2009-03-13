<?php


abstract class BaseFcbansal extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coddoc;


	
	protected $codfun;


	
	protected $codentext;


	
	protected $codtipdoc;


	
	protected $fecdoc;


	
	protected $hordoc;


	
	protected $asunto;


	
	protected $codubifis;


	
	protected $fecubifis;


	
	protected $horubifis;


	
	protected $codubimag;


	
	protected $fecubimag;


	
	protected $horubimag;


	
	protected $id;

	
	protected $aFcdeffun;

	
	protected $aFcdefentext;

	
	protected $aFcdeftipdoc;

	
	protected $aFcdefubifis;

	
	protected $aFcdefubimag;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCoddoc()
  {

    return trim($this->coddoc);

  }
  
  public function getCodfun()
  {

    return trim($this->codfun);

  }
  
  public function getCodentext()
  {

    return trim($this->codentext);

  }
  
  public function getCodtipdoc()
  {

    return trim($this->codtipdoc);

  }
  
  public function getFecdoc($format = 'Y-m-d')
  {

    if ($this->fecdoc === null || $this->fecdoc === '') {
      return null;
    } elseif (!is_int($this->fecdoc)) {
            $ts = adodb_strtotime($this->fecdoc);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdoc] as date/time value: " . var_export($this->fecdoc, true));
      }
    } else {
      $ts = $this->fecdoc;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getHordoc($format = 'Y-m-d')
  {

    if ($this->hordoc === null || $this->hordoc === '') {
      return null;
    } elseif (!is_int($this->hordoc)) {
            $ts = adodb_strtotime($this->hordoc);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [hordoc] as date/time value: " . var_export($this->hordoc, true));
      }
    } else {
      $ts = $this->hordoc;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getAsunto()
  {

    return trim($this->asunto);

  }
  
  public function getCodubifis()
  {

    return trim($this->codubifis);

  }
  
  public function getFecubifis($format = 'Y-m-d')
  {

    if ($this->fecubifis === null || $this->fecubifis === '') {
      return null;
    } elseif (!is_int($this->fecubifis)) {
            $ts = adodb_strtotime($this->fecubifis);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecubifis] as date/time value: " . var_export($this->fecubifis, true));
      }
    } else {
      $ts = $this->fecubifis;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getHorubifis($format = 'Y-m-d')
  {

    if ($this->horubifis === null || $this->horubifis === '') {
      return null;
    } elseif (!is_int($this->horubifis)) {
            $ts = adodb_strtotime($this->horubifis);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [horubifis] as date/time value: " . var_export($this->horubifis, true));
      }
    } else {
      $ts = $this->horubifis;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodubimag()
  {

    return trim($this->codubimag);

  }
  
  public function getFecubimag($format = 'Y-m-d')
  {

    if ($this->fecubimag === null || $this->fecubimag === '') {
      return null;
    } elseif (!is_int($this->fecubimag)) {
            $ts = adodb_strtotime($this->fecubimag);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecubimag] as date/time value: " . var_export($this->fecubimag, true));
      }
    } else {
      $ts = $this->fecubimag;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getHorubimag($format = 'Y-m-d')
  {

    if ($this->horubimag === null || $this->horubimag === '') {
      return null;
    } elseif (!is_int($this->horubimag)) {
            $ts = adodb_strtotime($this->horubimag);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [horubimag] as date/time value: " . var_export($this->horubimag, true));
      }
    } else {
      $ts = $this->horubimag;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCoddoc($v)
	{

    if ($this->coddoc !== $v) {
        $this->coddoc = $v;
        $this->modifiedColumns[] = FcbansalPeer::CODDOC;
      }
  
	} 
	
	public function setCodfun($v)
	{

    if ($this->codfun !== $v) {
        $this->codfun = $v;
        $this->modifiedColumns[] = FcbansalPeer::CODFUN;
      }
  
		if ($this->aFcdeffun !== null && $this->aFcdeffun->getCodfun() !== $v) {
			$this->aFcdeffun = null;
		}

	} 
	
	public function setCodentext($v)
	{

    if ($this->codentext !== $v) {
        $this->codentext = $v;
        $this->modifiedColumns[] = FcbansalPeer::CODENTEXT;
      }
  
		if ($this->aFcdefentext !== null && $this->aFcdefentext->getCodentext() !== $v) {
			$this->aFcdefentext = null;
		}

	} 
	
	public function setCodtipdoc($v)
	{

    if ($this->codtipdoc !== $v) {
        $this->codtipdoc = $v;
        $this->modifiedColumns[] = FcbansalPeer::CODTIPDOC;
      }
  
		if ($this->aFcdeftipdoc !== null && $this->aFcdeftipdoc->getCodtipdoc() !== $v) {
			$this->aFcdeftipdoc = null;
		}

	} 
	
	public function setFecdoc($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdoc] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdoc !== $ts) {
      $this->fecdoc = $ts;
      $this->modifiedColumns[] = FcbansalPeer::FECDOC;
    }

	} 
	
	public function setHordoc($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [hordoc] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->hordoc !== $ts) {
      $this->hordoc = $ts;
      $this->modifiedColumns[] = FcbansalPeer::HORDOC;
    }

	} 
	
	public function setAsunto($v)
	{

    if ($this->asunto !== $v) {
        $this->asunto = $v;
        $this->modifiedColumns[] = FcbansalPeer::ASUNTO;
      }
  
	} 
	
	public function setCodubifis($v)
	{

    if ($this->codubifis !== $v) {
        $this->codubifis = $v;
        $this->modifiedColumns[] = FcbansalPeer::CODUBIFIS;
      }
  
		if ($this->aFcdefubifis !== null && $this->aFcdefubifis->getCodubifis() !== $v) {
			$this->aFcdefubifis = null;
		}

	} 
	
	public function setFecubifis($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecubifis] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecubifis !== $ts) {
      $this->fecubifis = $ts;
      $this->modifiedColumns[] = FcbansalPeer::FECUBIFIS;
    }

	} 
	
	public function setHorubifis($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [horubifis] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->horubifis !== $ts) {
      $this->horubifis = $ts;
      $this->modifiedColumns[] = FcbansalPeer::HORUBIFIS;
    }

	} 
	
	public function setCodubimag($v)
	{

    if ($this->codubimag !== $v) {
        $this->codubimag = $v;
        $this->modifiedColumns[] = FcbansalPeer::CODUBIMAG;
      }
  
		if ($this->aFcdefubimag !== null && $this->aFcdefubimag->getCodubimag() !== $v) {
			$this->aFcdefubimag = null;
		}

	} 
	
	public function setFecubimag($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecubimag] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecubimag !== $ts) {
      $this->fecubimag = $ts;
      $this->modifiedColumns[] = FcbansalPeer::FECUBIMAG;
    }

	} 
	
	public function setHorubimag($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [horubimag] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->horubimag !== $ts) {
      $this->horubimag = $ts;
      $this->modifiedColumns[] = FcbansalPeer::HORUBIMAG;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcbansalPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->coddoc = $rs->getString($startcol + 0);

      $this->codfun = $rs->getString($startcol + 1);

      $this->codentext = $rs->getString($startcol + 2);

      $this->codtipdoc = $rs->getString($startcol + 3);

      $this->fecdoc = $rs->getDate($startcol + 4, null);

      $this->hordoc = $rs->getDate($startcol + 5, null);

      $this->asunto = $rs->getString($startcol + 6);

      $this->codubifis = $rs->getString($startcol + 7);

      $this->fecubifis = $rs->getDate($startcol + 8, null);

      $this->horubifis = $rs->getDate($startcol + 9, null);

      $this->codubimag = $rs->getString($startcol + 10);

      $this->fecubimag = $rs->getDate($startcol + 11, null);

      $this->horubimag = $rs->getDate($startcol + 12, null);

      $this->id = $rs->getInt($startcol + 13);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 14; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcbansal object", $e);
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
			$con = Propel::getConnection(FcbansalPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcbansalPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcbansalPeer::DATABASE_NAME);
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


												
			if ($this->aFcdeffun !== null) {
				if ($this->aFcdeffun->isModified()) {
					$affectedRows += $this->aFcdeffun->save($con);
				}
				$this->setFcdeffun($this->aFcdeffun);
			}

			if ($this->aFcdefentext !== null) {
				if ($this->aFcdefentext->isModified()) {
					$affectedRows += $this->aFcdefentext->save($con);
				}
				$this->setFcdefentext($this->aFcdefentext);
			}

			if ($this->aFcdeftipdoc !== null) {
				if ($this->aFcdeftipdoc->isModified()) {
					$affectedRows += $this->aFcdeftipdoc->save($con);
				}
				$this->setFcdeftipdoc($this->aFcdeftipdoc);
			}

			if ($this->aFcdefubifis !== null) {
				if ($this->aFcdefubifis->isModified()) {
					$affectedRows += $this->aFcdefubifis->save($con);
				}
				$this->setFcdefubifis($this->aFcdefubifis);
			}

			if ($this->aFcdefubimag !== null) {
				if ($this->aFcdefubimag->isModified()) {
					$affectedRows += $this->aFcdefubimag->save($con);
				}
				$this->setFcdefubimag($this->aFcdefubimag);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FcbansalPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcbansalPeer::doUpdate($this, $con);
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


												
			if ($this->aFcdeffun !== null) {
				if (!$this->aFcdeffun->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFcdeffun->getValidationFailures());
				}
			}

			if ($this->aFcdefentext !== null) {
				if (!$this->aFcdefentext->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFcdefentext->getValidationFailures());
				}
			}

			if ($this->aFcdeftipdoc !== null) {
				if (!$this->aFcdeftipdoc->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFcdeftipdoc->getValidationFailures());
				}
			}

			if ($this->aFcdefubifis !== null) {
				if (!$this->aFcdefubifis->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFcdefubifis->getValidationFailures());
				}
			}

			if ($this->aFcdefubimag !== null) {
				if (!$this->aFcdefubimag->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFcdefubimag->getValidationFailures());
				}
			}


			if (($retval = FcbansalPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcbansalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoddoc();
				break;
			case 1:
				return $this->getCodfun();
				break;
			case 2:
				return $this->getCodentext();
				break;
			case 3:
				return $this->getCodtipdoc();
				break;
			case 4:
				return $this->getFecdoc();
				break;
			case 5:
				return $this->getHordoc();
				break;
			case 6:
				return $this->getAsunto();
				break;
			case 7:
				return $this->getCodubifis();
				break;
			case 8:
				return $this->getFecubifis();
				break;
			case 9:
				return $this->getHorubifis();
				break;
			case 10:
				return $this->getCodubimag();
				break;
			case 11:
				return $this->getFecubimag();
				break;
			case 12:
				return $this->getHorubimag();
				break;
			case 13:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcbansalPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoddoc(),
			$keys[1] => $this->getCodfun(),
			$keys[2] => $this->getCodentext(),
			$keys[3] => $this->getCodtipdoc(),
			$keys[4] => $this->getFecdoc(),
			$keys[5] => $this->getHordoc(),
			$keys[6] => $this->getAsunto(),
			$keys[7] => $this->getCodubifis(),
			$keys[8] => $this->getFecubifis(),
			$keys[9] => $this->getHorubifis(),
			$keys[10] => $this->getCodubimag(),
			$keys[11] => $this->getFecubimag(),
			$keys[12] => $this->getHorubimag(),
			$keys[13] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcbansalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoddoc($value);
				break;
			case 1:
				$this->setCodfun($value);
				break;
			case 2:
				$this->setCodentext($value);
				break;
			case 3:
				$this->setCodtipdoc($value);
				break;
			case 4:
				$this->setFecdoc($value);
				break;
			case 5:
				$this->setHordoc($value);
				break;
			case 6:
				$this->setAsunto($value);
				break;
			case 7:
				$this->setCodubifis($value);
				break;
			case 8:
				$this->setFecubifis($value);
				break;
			case 9:
				$this->setHorubifis($value);
				break;
			case 10:
				$this->setCodubimag($value);
				break;
			case 11:
				$this->setFecubimag($value);
				break;
			case 12:
				$this->setHorubimag($value);
				break;
			case 13:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcbansalPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoddoc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodfun($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodentext($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodtipdoc($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecdoc($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setHordoc($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAsunto($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodubifis($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecubifis($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setHorubifis($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodubimag($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFecubimag($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setHorubimag($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcbansalPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcbansalPeer::CODDOC)) $criteria->add(FcbansalPeer::CODDOC, $this->coddoc);
		if ($this->isColumnModified(FcbansalPeer::CODFUN)) $criteria->add(FcbansalPeer::CODFUN, $this->codfun);
		if ($this->isColumnModified(FcbansalPeer::CODENTEXT)) $criteria->add(FcbansalPeer::CODENTEXT, $this->codentext);
		if ($this->isColumnModified(FcbansalPeer::CODTIPDOC)) $criteria->add(FcbansalPeer::CODTIPDOC, $this->codtipdoc);
		if ($this->isColumnModified(FcbansalPeer::FECDOC)) $criteria->add(FcbansalPeer::FECDOC, $this->fecdoc);
		if ($this->isColumnModified(FcbansalPeer::HORDOC)) $criteria->add(FcbansalPeer::HORDOC, $this->hordoc);
		if ($this->isColumnModified(FcbansalPeer::ASUNTO)) $criteria->add(FcbansalPeer::ASUNTO, $this->asunto);
		if ($this->isColumnModified(FcbansalPeer::CODUBIFIS)) $criteria->add(FcbansalPeer::CODUBIFIS, $this->codubifis);
		if ($this->isColumnModified(FcbansalPeer::FECUBIFIS)) $criteria->add(FcbansalPeer::FECUBIFIS, $this->fecubifis);
		if ($this->isColumnModified(FcbansalPeer::HORUBIFIS)) $criteria->add(FcbansalPeer::HORUBIFIS, $this->horubifis);
		if ($this->isColumnModified(FcbansalPeer::CODUBIMAG)) $criteria->add(FcbansalPeer::CODUBIMAG, $this->codubimag);
		if ($this->isColumnModified(FcbansalPeer::FECUBIMAG)) $criteria->add(FcbansalPeer::FECUBIMAG, $this->fecubimag);
		if ($this->isColumnModified(FcbansalPeer::HORUBIMAG)) $criteria->add(FcbansalPeer::HORUBIMAG, $this->horubimag);
		if ($this->isColumnModified(FcbansalPeer::ID)) $criteria->add(FcbansalPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcbansalPeer::DATABASE_NAME);

		$criteria->add(FcbansalPeer::ID, $this->id);

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

		$copyObj->setCoddoc($this->coddoc);

		$copyObj->setCodfun($this->codfun);

		$copyObj->setCodentext($this->codentext);

		$copyObj->setCodtipdoc($this->codtipdoc);

		$copyObj->setFecdoc($this->fecdoc);

		$copyObj->setHordoc($this->hordoc);

		$copyObj->setAsunto($this->asunto);

		$copyObj->setCodubifis($this->codubifis);

		$copyObj->setFecubifis($this->fecubifis);

		$copyObj->setHorubifis($this->horubifis);

		$copyObj->setCodubimag($this->codubimag);

		$copyObj->setFecubimag($this->fecubimag);

		$copyObj->setHorubimag($this->horubimag);


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
			self::$peer = new FcbansalPeer();
		}
		return self::$peer;
	}

	
	public function setFcdeffun($v)
	{


		if ($v === null) {
			$this->setCodfun(NULL);
		} else {
			$this->setCodfun($v->getCodfun());
		}


		$this->aFcdeffun = $v;
	}


	
	public function getFcdeffun($con = null)
	{
		if ($this->aFcdeffun === null && (($this->codfun !== "" && $this->codfun !== null))) {
						include_once 'lib/model/om/BaseFcdeffunPeer.php';

			$this->aFcdeffun = FcdeffunPeer::retrieveByPK($this->codfun, $con);

			
		}
		return $this->aFcdeffun;
	}

	
	public function setFcdefentext($v)
	{


		if ($v === null) {
			$this->setCodentext(NULL);
		} else {
			$this->setCodentext($v->getCodentext());
		}


		$this->aFcdefentext = $v;
	}


	
	public function getFcdefentext($con = null)
	{
		if ($this->aFcdefentext === null && (($this->codentext !== "" && $this->codentext !== null))) {
						include_once 'lib/model/om/BaseFcdefentextPeer.php';

			$this->aFcdefentext = FcdefentextPeer::retrieveByPK($this->codentext, $con);

			
		}
		return $this->aFcdefentext;
	}

	
	public function setFcdeftipdoc($v)
	{


		if ($v === null) {
			$this->setCodtipdoc(NULL);
		} else {
			$this->setCodtipdoc($v->getCodtipdoc());
		}


		$this->aFcdeftipdoc = $v;
	}


	
	public function getFcdeftipdoc($con = null)
	{
		if ($this->aFcdeftipdoc === null && (($this->codtipdoc !== "" && $this->codtipdoc !== null))) {
						include_once 'lib/model/om/BaseFcdeftipdocPeer.php';

			$this->aFcdeftipdoc = FcdeftipdocPeer::retrieveByPK($this->codtipdoc, $con);

			
		}
		return $this->aFcdeftipdoc;
	}

	
	public function setFcdefubifis($v)
	{


		if ($v === null) {
			$this->setCodubifis(NULL);
		} else {
			$this->setCodubifis($v->getCodubifis());
		}


		$this->aFcdefubifis = $v;
	}


	
	public function getFcdefubifis($con = null)
	{
		if ($this->aFcdefubifis === null && (($this->codubifis !== "" && $this->codubifis !== null))) {
						include_once 'lib/model/om/BaseFcdefubifisPeer.php';

			$this->aFcdefubifis = FcdefubifisPeer::retrieveByPK($this->codubifis, $con);

			
		}
		return $this->aFcdefubifis;
	}

	
	public function setFcdefubimag($v)
	{


		if ($v === null) {
			$this->setCodubimag(NULL);
		} else {
			$this->setCodubimag($v->getCodubimag());
		}


		$this->aFcdefubimag = $v;
	}


	
	public function getFcdefubimag($con = null)
	{
		if ($this->aFcdefubimag === null && (($this->codubimag !== "" && $this->codubimag !== null))) {
						include_once 'lib/model/om/BaseFcdefubimagPeer.php';

			$this->aFcdefubimag = FcdefubimagPeer::retrieveByPK($this->codubimag, $con);

			
		}
		return $this->aFcdefubimag;
	}

} 