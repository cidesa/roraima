<?php


abstract class BaseCadetent extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $rcpart;


	
	protected $codart;


	
	protected $canrec;


	
	protected $montot;


	
	protected $cosart;


	
	protected $codalm;


	
	protected $codubi;


	
	protected $fecven;


	
	protected $numjau;


	
	protected $tammet;


	
	protected $numlot;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRcpart()
  {

    return trim($this->rcpart);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getCanrec($val=false)
  {

    if($val) return number_format($this->canrec,2,',','.');
    else return $this->canrec;

  }
  
  public function getMontot($val=false)
  {

    if($val) return number_format($this->montot,2,',','.');
    else return $this->montot;

  }
  
  public function getCosart($val=false)
  {

    if($val) return number_format($this->cosart,2,',','.');
    else return $this->cosart;

  }
  
  public function getCodalm()
  {

    return trim($this->codalm);

  }
  
  public function getCodubi()
  {

    return trim($this->codubi);

  }
  
  public function getFecven($format = 'Y-m-d')
  {

    if ($this->fecven === null || $this->fecven === '') {
      return null;
    } elseif (!is_int($this->fecven)) {
            $ts = adodb_strtotime($this->fecven);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecven] as date/time value: " . var_export($this->fecven, true));
      }
    } else {
      $ts = $this->fecven;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNumjau($val=false)
  {

    if($val) return number_format($this->numjau,2,',','.');
    else return $this->numjau;

  }
  
  public function getTammet($val=false)
  {

    if($val) return number_format($this->tammet,2,',','.');
    else return $this->tammet;

  }
  
  public function getNumlot()
  {

    return trim($this->numlot);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRcpart($v)
	{

    if ($this->rcpart !== $v) {
        $this->rcpart = $v;
        $this->modifiedColumns[] = CadetentPeer::RCPART;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = CadetentPeer::CODART;
      }
  
	} 
	
	public function setCanrec($v)
	{

    if ($this->canrec !== $v) {
        $this->canrec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadetentPeer::CANREC;
      }
  
	} 
	
	public function setMontot($v)
	{

    if ($this->montot !== $v) {
        $this->montot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadetentPeer::MONTOT;
      }
  
	} 
	
	public function setCosart($v)
	{

    if ($this->cosart !== $v) {
        $this->cosart = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadetentPeer::COSART;
      }
  
	} 
	
	public function setCodalm($v)
	{

    if ($this->codalm !== $v) {
        $this->codalm = $v;
        $this->modifiedColumns[] = CadetentPeer::CODALM;
      }
  
	} 
	
	public function setCodubi($v)
	{

    if ($this->codubi !== $v) {
        $this->codubi = $v;
        $this->modifiedColumns[] = CadetentPeer::CODUBI;
      }
  
	} 
	
	public function setFecven($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecven] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecven !== $ts) {
      $this->fecven = $ts;
      $this->modifiedColumns[] = CadetentPeer::FECVEN;
    }

	} 
	
	public function setNumjau($v)
	{

    if ($this->numjau !== $v) {
        $this->numjau = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadetentPeer::NUMJAU;
      }
  
	} 
	
	public function setTammet($v)
	{

    if ($this->tammet !== $v) {
        $this->tammet = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadetentPeer::TAMMET;
      }
  
	} 
	
	public function setNumlot($v)
	{

    if ($this->numlot !== $v) {
        $this->numlot = $v;
        $this->modifiedColumns[] = CadetentPeer::NUMLOT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CadetentPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->rcpart = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->canrec = $rs->getFloat($startcol + 2);

      $this->montot = $rs->getFloat($startcol + 3);

      $this->cosart = $rs->getFloat($startcol + 4);

      $this->codalm = $rs->getString($startcol + 5);

      $this->codubi = $rs->getString($startcol + 6);

      $this->fecven = $rs->getDate($startcol + 7, null);

      $this->numjau = $rs->getFloat($startcol + 8);

      $this->tammet = $rs->getFloat($startcol + 9);

      $this->numlot = $rs->getString($startcol + 10);

      $this->id = $rs->getInt($startcol + 11);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 12; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cadetent object", $e);
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
			$con = Propel::getConnection(CadetentPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CadetentPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CadetentPeer::DATABASE_NAME);
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
					$pk = CadetentPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CadetentPeer::doUpdate($this, $con);
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


			if (($retval = CadetentPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadetentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRcpart();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getCanrec();
				break;
			case 3:
				return $this->getMontot();
				break;
			case 4:
				return $this->getCosart();
				break;
			case 5:
				return $this->getCodalm();
				break;
			case 6:
				return $this->getCodubi();
				break;
			case 7:
				return $this->getFecven();
				break;
			case 8:
				return $this->getNumjau();
				break;
			case 9:
				return $this->getTammet();
				break;
			case 10:
				return $this->getNumlot();
				break;
			case 11:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadetentPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRcpart(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCanrec(),
			$keys[3] => $this->getMontot(),
			$keys[4] => $this->getCosart(),
			$keys[5] => $this->getCodalm(),
			$keys[6] => $this->getCodubi(),
			$keys[7] => $this->getFecven(),
			$keys[8] => $this->getNumjau(),
			$keys[9] => $this->getTammet(),
			$keys[10] => $this->getNumlot(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadetentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRcpart($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setCanrec($value);
				break;
			case 3:
				$this->setMontot($value);
				break;
			case 4:
				$this->setCosart($value);
				break;
			case 5:
				$this->setCodalm($value);
				break;
			case 6:
				$this->setCodubi($value);
				break;
			case 7:
				$this->setFecven($value);
				break;
			case 8:
				$this->setNumjau($value);
				break;
			case 9:
				$this->setTammet($value);
				break;
			case 10:
				$this->setNumlot($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadetentPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRcpart($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCanrec($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMontot($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCosart($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodalm($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodubi($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecven($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNumjau($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTammet($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setNumlot($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CadetentPeer::DATABASE_NAME);

		if ($this->isColumnModified(CadetentPeer::RCPART)) $criteria->add(CadetentPeer::RCPART, $this->rcpart);
		if ($this->isColumnModified(CadetentPeer::CODART)) $criteria->add(CadetentPeer::CODART, $this->codart);
		if ($this->isColumnModified(CadetentPeer::CANREC)) $criteria->add(CadetentPeer::CANREC, $this->canrec);
		if ($this->isColumnModified(CadetentPeer::MONTOT)) $criteria->add(CadetentPeer::MONTOT, $this->montot);
		if ($this->isColumnModified(CadetentPeer::COSART)) $criteria->add(CadetentPeer::COSART, $this->cosart);
		if ($this->isColumnModified(CadetentPeer::CODALM)) $criteria->add(CadetentPeer::CODALM, $this->codalm);
		if ($this->isColumnModified(CadetentPeer::CODUBI)) $criteria->add(CadetentPeer::CODUBI, $this->codubi);
		if ($this->isColumnModified(CadetentPeer::FECVEN)) $criteria->add(CadetentPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(CadetentPeer::NUMJAU)) $criteria->add(CadetentPeer::NUMJAU, $this->numjau);
		if ($this->isColumnModified(CadetentPeer::TAMMET)) $criteria->add(CadetentPeer::TAMMET, $this->tammet);
		if ($this->isColumnModified(CadetentPeer::NUMLOT)) $criteria->add(CadetentPeer::NUMLOT, $this->numlot);
		if ($this->isColumnModified(CadetentPeer::ID)) $criteria->add(CadetentPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CadetentPeer::DATABASE_NAME);

		$criteria->add(CadetentPeer::ID, $this->id);

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

		$copyObj->setRcpart($this->rcpart);

		$copyObj->setCodart($this->codart);

		$copyObj->setCanrec($this->canrec);

		$copyObj->setMontot($this->montot);

		$copyObj->setCosart($this->cosart);

		$copyObj->setCodalm($this->codalm);

		$copyObj->setCodubi($this->codubi);

		$copyObj->setFecven($this->fecven);

		$copyObj->setNumjau($this->numjau);

		$copyObj->setTammet($this->tammet);

		$copyObj->setNumlot($this->numlot);


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
			self::$peer = new CadetentPeer();
		}
		return self::$peer;
	}

} 
