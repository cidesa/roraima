<?php


abstract class BaseCssolsermat extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numsol;


	
	protected $dessol;


	
	protected $fecsol;


	
	protected $cedrif;


	
	protected $coord;


	
	protected $codubi;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumsol()
  {

    return trim($this->numsol);

  }
  
  public function getDessol()
  {

    return trim($this->dessol);

  }
  
  public function getFecsol($format = 'Y-m-d')
  {

    if ($this->fecsol === null || $this->fecsol === '') {
      return null;
    } elseif (!is_int($this->fecsol)) {
            $ts = adodb_strtotime($this->fecsol);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecsol] as date/time value: " . var_export($this->fecsol, true));
      }
    } else {
      $ts = $this->fecsol;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCedrif()
  {

    return trim($this->cedrif);

  }
  
  public function getCoord()
  {

    return trim($this->coord);

  }
  
  public function getCodubi()
  {

    return trim($this->codubi);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumsol($v)
	{

    if ($this->numsol !== $v) {
        $this->numsol = $v;
        $this->modifiedColumns[] = CssolsermatPeer::NUMSOL;
      }
  
	} 
	
	public function setDessol($v)
	{

    if ($this->dessol !== $v) {
        $this->dessol = $v;
        $this->modifiedColumns[] = CssolsermatPeer::DESSOL;
      }
  
	} 
	
	public function setFecsol($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecsol] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecsol !== $ts) {
      $this->fecsol = $ts;
      $this->modifiedColumns[] = CssolsermatPeer::FECSOL;
    }

	} 
	
	public function setCedrif($v)
	{

    if ($this->cedrif !== $v) {
        $this->cedrif = $v;
        $this->modifiedColumns[] = CssolsermatPeer::CEDRIF;
      }
  
	} 
	
	public function setCoord($v)
	{

    if ($this->coord !== $v) {
        $this->coord = $v;
        $this->modifiedColumns[] = CssolsermatPeer::COORD;
      }
  
	} 
	
	public function setCodubi($v)
	{

    if ($this->codubi !== $v) {
        $this->codubi = $v;
        $this->modifiedColumns[] = CssolsermatPeer::CODUBI;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CssolsermatPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numsol = $rs->getString($startcol + 0);

      $this->dessol = $rs->getString($startcol + 1);

      $this->fecsol = $rs->getDate($startcol + 2, null);

      $this->cedrif = $rs->getString($startcol + 3);

      $this->coord = $rs->getString($startcol + 4);

      $this->codubi = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cssolsermat object", $e);
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
			$con = Propel::getConnection(CssolsermatPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CssolsermatPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CssolsermatPeer::DATABASE_NAME);
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
					$pk = CssolsermatPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CssolsermatPeer::doUpdate($this, $con);
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


			if (($retval = CssolsermatPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CssolsermatPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumsol();
				break;
			case 1:
				return $this->getDessol();
				break;
			case 2:
				return $this->getFecsol();
				break;
			case 3:
				return $this->getCedrif();
				break;
			case 4:
				return $this->getCoord();
				break;
			case 5:
				return $this->getCodubi();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CssolsermatPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumsol(),
			$keys[1] => $this->getDessol(),
			$keys[2] => $this->getFecsol(),
			$keys[3] => $this->getCedrif(),
			$keys[4] => $this->getCoord(),
			$keys[5] => $this->getCodubi(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CssolsermatPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumsol($value);
				break;
			case 1:
				$this->setDessol($value);
				break;
			case 2:
				$this->setFecsol($value);
				break;
			case 3:
				$this->setCedrif($value);
				break;
			case 4:
				$this->setCoord($value);
				break;
			case 5:
				$this->setCodubi($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CssolsermatPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumsol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDessol($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecsol($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCedrif($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCoord($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodubi($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CssolsermatPeer::DATABASE_NAME);

		if ($this->isColumnModified(CssolsermatPeer::NUMSOL)) $criteria->add(CssolsermatPeer::NUMSOL, $this->numsol);
		if ($this->isColumnModified(CssolsermatPeer::DESSOL)) $criteria->add(CssolsermatPeer::DESSOL, $this->dessol);
		if ($this->isColumnModified(CssolsermatPeer::FECSOL)) $criteria->add(CssolsermatPeer::FECSOL, $this->fecsol);
		if ($this->isColumnModified(CssolsermatPeer::CEDRIF)) $criteria->add(CssolsermatPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(CssolsermatPeer::COORD)) $criteria->add(CssolsermatPeer::COORD, $this->coord);
		if ($this->isColumnModified(CssolsermatPeer::CODUBI)) $criteria->add(CssolsermatPeer::CODUBI, $this->codubi);
		if ($this->isColumnModified(CssolsermatPeer::ID)) $criteria->add(CssolsermatPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CssolsermatPeer::DATABASE_NAME);

		$criteria->add(CssolsermatPeer::ID, $this->id);

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

		$copyObj->setNumsol($this->numsol);

		$copyObj->setDessol($this->dessol);

		$copyObj->setFecsol($this->fecsol);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setCoord($this->coord);

		$copyObj->setCodubi($this->codubi);


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
			self::$peer = new CssolsermatPeer();
		}
		return self::$peer;
	}

} 