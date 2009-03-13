<?php


abstract class BaseCobdettra extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numtra;


	
	protected $refdoc;


	
	protected $codcli;


	
	protected $correl;


	
	protected $monpag;


	
	protected $mondsc;


	
	protected $monrec;


	
	protected $totpag;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumtra()
  {

    return trim($this->numtra);

  }
  
  public function getRefdoc()
  {

    return trim($this->refdoc);

  }
  
  public function getCodcli()
  {

    return trim($this->codcli);

  }
  
  public function getCorrel()
  {

    return trim($this->correl);

  }
  
  public function getMonpag($val=false)
  {

    if($val) return number_format($this->monpag,2,',','.');
    else return $this->monpag;

  }
  
  public function getMondsc($val=false)
  {

    if($val) return number_format($this->mondsc,2,',','.');
    else return $this->mondsc;

  }
  
  public function getMonrec($val=false)
  {

    if($val) return number_format($this->monrec,2,',','.');
    else return $this->monrec;

  }
  
  public function getTotpag($val=false)
  {

    if($val) return number_format($this->totpag,2,',','.');
    else return $this->totpag;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumtra($v)
	{

    if ($this->numtra !== $v) {
        $this->numtra = $v;
        $this->modifiedColumns[] = CobdettraPeer::NUMTRA;
      }
  
	} 
	
	public function setRefdoc($v)
	{

    if ($this->refdoc !== $v) {
        $this->refdoc = $v;
        $this->modifiedColumns[] = CobdettraPeer::REFDOC;
      }
  
	} 
	
	public function setCodcli($v)
	{

    if ($this->codcli !== $v) {
        $this->codcli = $v;
        $this->modifiedColumns[] = CobdettraPeer::CODCLI;
      }
  
	} 
	
	public function setCorrel($v)
	{

    if ($this->correl !== $v) {
        $this->correl = $v;
        $this->modifiedColumns[] = CobdettraPeer::CORREL;
      }
  
	} 
	
	public function setMonpag($v)
	{

    if ($this->monpag !== $v) {
        $this->monpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CobdettraPeer::MONPAG;
      }
  
	} 
	
	public function setMondsc($v)
	{

    if ($this->mondsc !== $v) {
        $this->mondsc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CobdettraPeer::MONDSC;
      }
  
	} 
	
	public function setMonrec($v)
	{

    if ($this->monrec !== $v) {
        $this->monrec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CobdettraPeer::MONREC;
      }
  
	} 
	
	public function setTotpag($v)
	{

    if ($this->totpag !== $v) {
        $this->totpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CobdettraPeer::TOTPAG;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CobdettraPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numtra = $rs->getString($startcol + 0);

      $this->refdoc = $rs->getString($startcol + 1);

      $this->codcli = $rs->getString($startcol + 2);

      $this->correl = $rs->getString($startcol + 3);

      $this->monpag = $rs->getFloat($startcol + 4);

      $this->mondsc = $rs->getFloat($startcol + 5);

      $this->monrec = $rs->getFloat($startcol + 6);

      $this->totpag = $rs->getFloat($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cobdettra object", $e);
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
			$con = Propel::getConnection(CobdettraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CobdettraPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CobdettraPeer::DATABASE_NAME);
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
					$pk = CobdettraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CobdettraPeer::doUpdate($this, $con);
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


			if (($retval = CobdettraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CobdettraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumtra();
				break;
			case 1:
				return $this->getRefdoc();
				break;
			case 2:
				return $this->getCodcli();
				break;
			case 3:
				return $this->getCorrel();
				break;
			case 4:
				return $this->getMonpag();
				break;
			case 5:
				return $this->getMondsc();
				break;
			case 6:
				return $this->getMonrec();
				break;
			case 7:
				return $this->getTotpag();
				break;
			case 8:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CobdettraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumtra(),
			$keys[1] => $this->getRefdoc(),
			$keys[2] => $this->getCodcli(),
			$keys[3] => $this->getCorrel(),
			$keys[4] => $this->getMonpag(),
			$keys[5] => $this->getMondsc(),
			$keys[6] => $this->getMonrec(),
			$keys[7] => $this->getTotpag(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CobdettraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumtra($value);
				break;
			case 1:
				$this->setRefdoc($value);
				break;
			case 2:
				$this->setCodcli($value);
				break;
			case 3:
				$this->setCorrel($value);
				break;
			case 4:
				$this->setMonpag($value);
				break;
			case 5:
				$this->setMondsc($value);
				break;
			case 6:
				$this->setMonrec($value);
				break;
			case 7:
				$this->setTotpag($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CobdettraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumtra($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRefdoc($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcli($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCorrel($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonpag($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMondsc($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonrec($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTotpag($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CobdettraPeer::DATABASE_NAME);

		if ($this->isColumnModified(CobdettraPeer::NUMTRA)) $criteria->add(CobdettraPeer::NUMTRA, $this->numtra);
		if ($this->isColumnModified(CobdettraPeer::REFDOC)) $criteria->add(CobdettraPeer::REFDOC, $this->refdoc);
		if ($this->isColumnModified(CobdettraPeer::CODCLI)) $criteria->add(CobdettraPeer::CODCLI, $this->codcli);
		if ($this->isColumnModified(CobdettraPeer::CORREL)) $criteria->add(CobdettraPeer::CORREL, $this->correl);
		if ($this->isColumnModified(CobdettraPeer::MONPAG)) $criteria->add(CobdettraPeer::MONPAG, $this->monpag);
		if ($this->isColumnModified(CobdettraPeer::MONDSC)) $criteria->add(CobdettraPeer::MONDSC, $this->mondsc);
		if ($this->isColumnModified(CobdettraPeer::MONREC)) $criteria->add(CobdettraPeer::MONREC, $this->monrec);
		if ($this->isColumnModified(CobdettraPeer::TOTPAG)) $criteria->add(CobdettraPeer::TOTPAG, $this->totpag);
		if ($this->isColumnModified(CobdettraPeer::ID)) $criteria->add(CobdettraPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CobdettraPeer::DATABASE_NAME);

		$criteria->add(CobdettraPeer::ID, $this->id);

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

		$copyObj->setNumtra($this->numtra);

		$copyObj->setRefdoc($this->refdoc);

		$copyObj->setCodcli($this->codcli);

		$copyObj->setCorrel($this->correl);

		$copyObj->setMonpag($this->monpag);

		$copyObj->setMondsc($this->mondsc);

		$copyObj->setMonrec($this->monrec);

		$copyObj->setTotpag($this->totpag);


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
			self::$peer = new CobdettraPeer();
		}
		return self::$peer;
	}

} 