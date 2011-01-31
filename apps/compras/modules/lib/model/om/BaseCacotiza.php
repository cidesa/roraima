<?php


abstract class BaseCacotiza extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refcot;


	
	protected $feccot;


	
	protected $codpro;


	
	protected $descot;


	
	protected $refsol;


	
	protected $moncot;


	
	protected $conpag;


	
	protected $forent;


	
	protected $priori;


	
	protected $mondes;


	
	protected $monrec;


	
	protected $tipmon;


	
	protected $valmon;


	
	protected $refpro;


	
	protected $tipo;


	
	protected $correl;


	
	protected $porvan;


	
	protected $porant;


	
	protected $obscot;


	
	protected $id;

	
	protected $aCaprovee;

	
	protected $aTsdesmon;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefcot()
  {

    return trim($this->refcot);

  }
  
  public function getFeccot($format = 'Y-m-d')
  {

    if ($this->feccot === null || $this->feccot === '') {
      return null;
    } elseif (!is_int($this->feccot)) {
            $ts = adodb_strtotime($this->feccot);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccot] as date/time value: " . var_export($this->feccot, true));
      }
    } else {
      $ts = $this->feccot;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getDescot()
  {

    return trim($this->descot);

  }
  
  public function getRefsol()
  {

    return trim($this->refsol);

  }
  
  public function getMoncot($val=false)
  {

    if($val) return number_format($this->moncot,2,',','.');
    else return $this->moncot;

  }
  
  public function getConpag()
  {

    return trim($this->conpag);

  }
  
  public function getForent()
  {

    return trim($this->forent);

  }
  
  public function getPriori($val=false)
  {

    if($val) return number_format($this->priori,2,',','.');
    else return $this->priori;

  }
  
  public function getMondes($val=false)
  {

    if($val) return number_format($this->mondes,2,',','.');
    else return $this->mondes;

  }
  
  public function getMonrec($val=false)
  {

    if($val) return number_format($this->monrec,2,',','.');
    else return $this->monrec;

  }
  
  public function getTipmon()
  {

    return trim($this->tipmon);

  }
  
  public function getValmon($val=false)
  {

    if($val) return number_format($this->valmon,2,',','.');
    else return $this->valmon;

  }
  
  public function getRefpro()
  {

    return trim($this->refpro);

  }
  
  public function getTipo()
  {

    return trim($this->tipo);

  }
  
  public function getCorrel($val=false)
  {

    if($val) return number_format($this->correl,2,',','.');
    else return $this->correl;

  }
  
  public function getPorvan($val=false)
  {

    if($val) return number_format($this->porvan,2,',','.');
    else return $this->porvan;

  }
  
  public function getPorant($val=false)
  {

    if($val) return number_format($this->porant,2,',','.');
    else return $this->porant;

  }
  
  public function getObscot()
  {

    return trim($this->obscot);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefcot($v)
	{

    if ($this->refcot !== $v) {
        $this->refcot = $v;
        $this->modifiedColumns[] = CacotizaPeer::REFCOT;
      }
  
	} 
	
	public function setFeccot($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccot] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccot !== $ts) {
      $this->feccot = $ts;
      $this->modifiedColumns[] = CacotizaPeer::FECCOT;
    }

	} 
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = CacotizaPeer::CODPRO;
      }
  
		if ($this->aCaprovee !== null && $this->aCaprovee->getCodpro() !== $v) {
			$this->aCaprovee = null;
		}

	} 
	
	public function setDescot($v)
	{

    if ($this->descot !== $v) {
        $this->descot = $v;
        $this->modifiedColumns[] = CacotizaPeer::DESCOT;
      }
  
	} 
	
	public function setRefsol($v)
	{

    if ($this->refsol !== $v) {
        $this->refsol = $v;
        $this->modifiedColumns[] = CacotizaPeer::REFSOL;
      }
  
	} 
	
	public function setMoncot($v)
	{

    if ($this->moncot !== $v) {
        $this->moncot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacotizaPeer::MONCOT;
      }
  
	} 
	
	public function setConpag($v)
	{

    if ($this->conpag !== $v) {
        $this->conpag = $v;
        $this->modifiedColumns[] = CacotizaPeer::CONPAG;
      }
  
	} 
	
	public function setForent($v)
	{

    if ($this->forent !== $v) {
        $this->forent = $v;
        $this->modifiedColumns[] = CacotizaPeer::FORENT;
      }
  
	} 
	
	public function setPriori($v)
	{

    if ($this->priori !== $v) {
        $this->priori = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacotizaPeer::PRIORI;
      }
  
	} 
	
	public function setMondes($v)
	{

    if ($this->mondes !== $v) {
        $this->mondes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacotizaPeer::MONDES;
      }
  
	} 
	
	public function setMonrec($v)
	{

    if ($this->monrec !== $v) {
        $this->monrec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacotizaPeer::MONREC;
      }
  
	} 
	
	public function setTipmon($v)
	{

    if ($this->tipmon !== $v) {
        $this->tipmon = $v;
        $this->modifiedColumns[] = CacotizaPeer::TIPMON;
      }
  
		if ($this->aTsdesmon !== null && $this->aTsdesmon->getCodmon() !== $v) {
			$this->aTsdesmon = null;
		}

	} 
	
	public function setValmon($v)
	{

    if ($this->valmon !== $v) {
        $this->valmon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacotizaPeer::VALMON;
      }
  
	} 
	
	public function setRefpro($v)
	{

    if ($this->refpro !== $v) {
        $this->refpro = $v;
        $this->modifiedColumns[] = CacotizaPeer::REFPRO;
      }
  
	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = CacotizaPeer::TIPO;
      }
  
	} 
	
	public function setCorrel($v)
	{

    if ($this->correl !== $v) {
        $this->correl = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacotizaPeer::CORREL;
      }
  
	} 
	
	public function setPorvan($v)
	{

    if ($this->porvan !== $v) {
        $this->porvan = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacotizaPeer::PORVAN;
      }
  
	} 
	
	public function setPorant($v)
	{

    if ($this->porant !== $v) {
        $this->porant = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacotizaPeer::PORANT;
      }
  
	} 
	
	public function setObscot($v)
	{

    if ($this->obscot !== $v) {
        $this->obscot = $v;
        $this->modifiedColumns[] = CacotizaPeer::OBSCOT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CacotizaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refcot = $rs->getString($startcol + 0);

      $this->feccot = $rs->getDate($startcol + 1, null);

      $this->codpro = $rs->getString($startcol + 2);

      $this->descot = $rs->getString($startcol + 3);

      $this->refsol = $rs->getString($startcol + 4);

      $this->moncot = $rs->getFloat($startcol + 5);

      $this->conpag = $rs->getString($startcol + 6);

      $this->forent = $rs->getString($startcol + 7);

      $this->priori = $rs->getFloat($startcol + 8);

      $this->mondes = $rs->getFloat($startcol + 9);

      $this->monrec = $rs->getFloat($startcol + 10);

      $this->tipmon = $rs->getString($startcol + 11);

      $this->valmon = $rs->getFloat($startcol + 12);

      $this->refpro = $rs->getString($startcol + 13);

      $this->tipo = $rs->getString($startcol + 14);

      $this->correl = $rs->getFloat($startcol + 15);

      $this->porvan = $rs->getFloat($startcol + 16);

      $this->porant = $rs->getFloat($startcol + 17);

      $this->obscot = $rs->getString($startcol + 18);

      $this->id = $rs->getInt($startcol + 19);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 20; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cacotiza object", $e);
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
			$con = Propel::getConnection(CacotizaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CacotizaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CacotizaPeer::DATABASE_NAME);
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


												
			if ($this->aCaprovee !== null) {
				if ($this->aCaprovee->isModified()) {
					$affectedRows += $this->aCaprovee->save($con);
				}
				$this->setCaprovee($this->aCaprovee);
			}

			if ($this->aTsdesmon !== null) {
				if ($this->aTsdesmon->isModified()) {
					$affectedRows += $this->aTsdesmon->save($con);
				}
				$this->setTsdesmon($this->aTsdesmon);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CacotizaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CacotizaPeer::doUpdate($this, $con);
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


												
			if ($this->aCaprovee !== null) {
				if (!$this->aCaprovee->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCaprovee->getValidationFailures());
				}
			}

			if ($this->aTsdesmon !== null) {
				if (!$this->aTsdesmon->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTsdesmon->getValidationFailures());
				}
			}


			if (($retval = CacotizaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CacotizaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefcot();
				break;
			case 1:
				return $this->getFeccot();
				break;
			case 2:
				return $this->getCodpro();
				break;
			case 3:
				return $this->getDescot();
				break;
			case 4:
				return $this->getRefsol();
				break;
			case 5:
				return $this->getMoncot();
				break;
			case 6:
				return $this->getConpag();
				break;
			case 7:
				return $this->getForent();
				break;
			case 8:
				return $this->getPriori();
				break;
			case 9:
				return $this->getMondes();
				break;
			case 10:
				return $this->getMonrec();
				break;
			case 11:
				return $this->getTipmon();
				break;
			case 12:
				return $this->getValmon();
				break;
			case 13:
				return $this->getRefpro();
				break;
			case 14:
				return $this->getTipo();
				break;
			case 15:
				return $this->getCorrel();
				break;
			case 16:
				return $this->getPorvan();
				break;
			case 17:
				return $this->getPorant();
				break;
			case 18:
				return $this->getObscot();
				break;
			case 19:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CacotizaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefcot(),
			$keys[1] => $this->getFeccot(),
			$keys[2] => $this->getCodpro(),
			$keys[3] => $this->getDescot(),
			$keys[4] => $this->getRefsol(),
			$keys[5] => $this->getMoncot(),
			$keys[6] => $this->getConpag(),
			$keys[7] => $this->getForent(),
			$keys[8] => $this->getPriori(),
			$keys[9] => $this->getMondes(),
			$keys[10] => $this->getMonrec(),
			$keys[11] => $this->getTipmon(),
			$keys[12] => $this->getValmon(),
			$keys[13] => $this->getRefpro(),
			$keys[14] => $this->getTipo(),
			$keys[15] => $this->getCorrel(),
			$keys[16] => $this->getPorvan(),
			$keys[17] => $this->getPorant(),
			$keys[18] => $this->getObscot(),
			$keys[19] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CacotizaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefcot($value);
				break;
			case 1:
				$this->setFeccot($value);
				break;
			case 2:
				$this->setCodpro($value);
				break;
			case 3:
				$this->setDescot($value);
				break;
			case 4:
				$this->setRefsol($value);
				break;
			case 5:
				$this->setMoncot($value);
				break;
			case 6:
				$this->setConpag($value);
				break;
			case 7:
				$this->setForent($value);
				break;
			case 8:
				$this->setPriori($value);
				break;
			case 9:
				$this->setMondes($value);
				break;
			case 10:
				$this->setMonrec($value);
				break;
			case 11:
				$this->setTipmon($value);
				break;
			case 12:
				$this->setValmon($value);
				break;
			case 13:
				$this->setRefpro($value);
				break;
			case 14:
				$this->setTipo($value);
				break;
			case 15:
				$this->setCorrel($value);
				break;
			case 16:
				$this->setPorvan($value);
				break;
			case 17:
				$this->setPorant($value);
				break;
			case 18:
				$this->setObscot($value);
				break;
			case 19:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CacotizaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefcot($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFeccot($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodpro($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDescot($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRefsol($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMoncot($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setConpag($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setForent($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPriori($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setMondes($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setMonrec($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setTipmon($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setValmon($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setRefpro($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setTipo($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCorrel($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setPorvan($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setPorant($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setObscot($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setId($arr[$keys[19]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CacotizaPeer::DATABASE_NAME);

		if ($this->isColumnModified(CacotizaPeer::REFCOT)) $criteria->add(CacotizaPeer::REFCOT, $this->refcot);
		if ($this->isColumnModified(CacotizaPeer::FECCOT)) $criteria->add(CacotizaPeer::FECCOT, $this->feccot);
		if ($this->isColumnModified(CacotizaPeer::CODPRO)) $criteria->add(CacotizaPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(CacotizaPeer::DESCOT)) $criteria->add(CacotizaPeer::DESCOT, $this->descot);
		if ($this->isColumnModified(CacotizaPeer::REFSOL)) $criteria->add(CacotizaPeer::REFSOL, $this->refsol);
		if ($this->isColumnModified(CacotizaPeer::MONCOT)) $criteria->add(CacotizaPeer::MONCOT, $this->moncot);
		if ($this->isColumnModified(CacotizaPeer::CONPAG)) $criteria->add(CacotizaPeer::CONPAG, $this->conpag);
		if ($this->isColumnModified(CacotizaPeer::FORENT)) $criteria->add(CacotizaPeer::FORENT, $this->forent);
		if ($this->isColumnModified(CacotizaPeer::PRIORI)) $criteria->add(CacotizaPeer::PRIORI, $this->priori);
		if ($this->isColumnModified(CacotizaPeer::MONDES)) $criteria->add(CacotizaPeer::MONDES, $this->mondes);
		if ($this->isColumnModified(CacotizaPeer::MONREC)) $criteria->add(CacotizaPeer::MONREC, $this->monrec);
		if ($this->isColumnModified(CacotizaPeer::TIPMON)) $criteria->add(CacotizaPeer::TIPMON, $this->tipmon);
		if ($this->isColumnModified(CacotizaPeer::VALMON)) $criteria->add(CacotizaPeer::VALMON, $this->valmon);
		if ($this->isColumnModified(CacotizaPeer::REFPRO)) $criteria->add(CacotizaPeer::REFPRO, $this->refpro);
		if ($this->isColumnModified(CacotizaPeer::TIPO)) $criteria->add(CacotizaPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(CacotizaPeer::CORREL)) $criteria->add(CacotizaPeer::CORREL, $this->correl);
		if ($this->isColumnModified(CacotizaPeer::PORVAN)) $criteria->add(CacotizaPeer::PORVAN, $this->porvan);
		if ($this->isColumnModified(CacotizaPeer::PORANT)) $criteria->add(CacotizaPeer::PORANT, $this->porant);
		if ($this->isColumnModified(CacotizaPeer::OBSCOT)) $criteria->add(CacotizaPeer::OBSCOT, $this->obscot);
		if ($this->isColumnModified(CacotizaPeer::ID)) $criteria->add(CacotizaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CacotizaPeer::DATABASE_NAME);

		$criteria->add(CacotizaPeer::ID, $this->id);

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

		$copyObj->setRefcot($this->refcot);

		$copyObj->setFeccot($this->feccot);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setDescot($this->descot);

		$copyObj->setRefsol($this->refsol);

		$copyObj->setMoncot($this->moncot);

		$copyObj->setConpag($this->conpag);

		$copyObj->setForent($this->forent);

		$copyObj->setPriori($this->priori);

		$copyObj->setMondes($this->mondes);

		$copyObj->setMonrec($this->monrec);

		$copyObj->setTipmon($this->tipmon);

		$copyObj->setValmon($this->valmon);

		$copyObj->setRefpro($this->refpro);

		$copyObj->setTipo($this->tipo);

		$copyObj->setCorrel($this->correl);

		$copyObj->setPorvan($this->porvan);

		$copyObj->setPorant($this->porant);

		$copyObj->setObscot($this->obscot);


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
			self::$peer = new CacotizaPeer();
		}
		return self::$peer;
	}

	
	public function setCaprovee($v)
	{


		if ($v === null) {
			$this->setCodpro(NULL);
		} else {
			$this->setCodpro($v->getCodpro());
		}


		$this->aCaprovee = $v;
	}


	
	public function getCaprovee($con = null)
	{
		if ($this->aCaprovee === null && (($this->codpro !== "" && $this->codpro !== null))) {
						include_once 'lib/model/om/BaseCaproveePeer.php';

			$this->aCaprovee = CaproveePeer::retrieveByPK($this->codpro, $con);

			
		}
		return $this->aCaprovee;
	}

	
	public function setTsdesmon($v)
	{


		if ($v === null) {
			$this->setTipmon(NULL);
		} else {
			$this->setTipmon($v->getCodmon());
		}


		$this->aTsdesmon = $v;
	}


	
	public function getTsdesmon($con = null)
	{
		if ($this->aTsdesmon === null && (($this->tipmon !== "" && $this->tipmon !== null))) {
						include_once 'lib/model/om/BaseTsdesmonPeer.php';

			$this->aTsdesmon = TsdesmonPeer::retrieveByPK($this->tipmon, $con);

			
		}
		return $this->aTsdesmon;
	}

} 