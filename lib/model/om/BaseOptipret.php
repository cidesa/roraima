<?php


abstract class BaseOptipret extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtip;


	
	protected $destip;


	
	protected $codcon;


	
	protected $basimp;


	
	protected $porret;


	
	protected $unitri;


	
	protected $porsus;


	
	protected $factor;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodtip()
  {

    return trim($this->codtip);

  }
  
  public function getDestip()
  {

    return trim($this->destip);

  }
  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
  
  public function getBasimp($val=false)
  {

    if($val) return number_format($this->basimp,2,',','.');
    else return $this->basimp;

  }
  
  public function getPorret($val=false)
  {

    if($val) return number_format($this->porret,2,',','.');
    else return $this->porret;

  }
  
  public function getUnitri($val=false)
  {

    if($val) return number_format($this->unitri,2,',','.');
    else return $this->unitri;

  }
  
  public function getPorsus($val=false)
  {

    if($val) return number_format($this->porsus,2,',','.');
    else return $this->porsus;

  }
  
  public function getFactor($val=false)
  {

    if($val) return number_format($this->factor,2,',','.');
    else return $this->factor;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodtip($v)
	{

    if ($this->codtip !== $v) {
        $this->codtip = $v;
        $this->modifiedColumns[] = OptipretPeer::CODTIP;
      }
  
	} 
	
	public function setDestip($v)
	{

    if ($this->destip !== $v) {
        $this->destip = $v;
        $this->modifiedColumns[] = OptipretPeer::DESTIP;
      }
  
	} 
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = OptipretPeer::CODCON;
      }
  
	} 
	
	public function setBasimp($v)
	{

    if ($this->basimp !== $v) {
        $this->basimp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OptipretPeer::BASIMP;
      }
  
	} 
	
	public function setPorret($v)
	{

    if ($this->porret !== $v) {
        $this->porret = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OptipretPeer::PORRET;
      }
  
	} 
	
	public function setUnitri($v)
	{

    if ($this->unitri !== $v) {
        $this->unitri = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OptipretPeer::UNITRI;
      }
  
	} 
	
	public function setPorsus($v)
	{

    if ($this->porsus !== $v) {
        $this->porsus = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OptipretPeer::PORSUS;
      }
  
	} 
	
	public function setFactor($v)
	{

    if ($this->factor !== $v) {
        $this->factor = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OptipretPeer::FACTOR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OptipretPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codtip = $rs->getString($startcol + 0);

      $this->destip = $rs->getString($startcol + 1);

      $this->codcon = $rs->getString($startcol + 2);

      $this->basimp = $rs->getFloat($startcol + 3);

      $this->porret = $rs->getFloat($startcol + 4);

      $this->unitri = $rs->getFloat($startcol + 5);

      $this->porsus = $rs->getFloat($startcol + 6);

      $this->factor = $rs->getFloat($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Optipret object", $e);
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
			$con = Propel::getConnection(OptipretPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OptipretPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OptipretPeer::DATABASE_NAME);
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
					$pk = OptipretPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OptipretPeer::doUpdate($this, $con);
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


			if (($retval = OptipretPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OptipretPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtip();
				break;
			case 1:
				return $this->getDestip();
				break;
			case 2:
				return $this->getCodcon();
				break;
			case 3:
				return $this->getBasimp();
				break;
			case 4:
				return $this->getPorret();
				break;
			case 5:
				return $this->getUnitri();
				break;
			case 6:
				return $this->getPorsus();
				break;
			case 7:
				return $this->getFactor();
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
		$keys = OptipretPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtip(),
			$keys[1] => $this->getDestip(),
			$keys[2] => $this->getCodcon(),
			$keys[3] => $this->getBasimp(),
			$keys[4] => $this->getPorret(),
			$keys[5] => $this->getUnitri(),
			$keys[6] => $this->getPorsus(),
			$keys[7] => $this->getFactor(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OptipretPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtip($value);
				break;
			case 1:
				$this->setDestip($value);
				break;
			case 2:
				$this->setCodcon($value);
				break;
			case 3:
				$this->setBasimp($value);
				break;
			case 4:
				$this->setPorret($value);
				break;
			case 5:
				$this->setUnitri($value);
				break;
			case 6:
				$this->setPorsus($value);
				break;
			case 7:
				$this->setFactor($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OptipretPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtip($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDestip($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setBasimp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPorret($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUnitri($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPorsus($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFactor($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OptipretPeer::DATABASE_NAME);

		if ($this->isColumnModified(OptipretPeer::CODTIP)) $criteria->add(OptipretPeer::CODTIP, $this->codtip);
		if ($this->isColumnModified(OptipretPeer::DESTIP)) $criteria->add(OptipretPeer::DESTIP, $this->destip);
		if ($this->isColumnModified(OptipretPeer::CODCON)) $criteria->add(OptipretPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(OptipretPeer::BASIMP)) $criteria->add(OptipretPeer::BASIMP, $this->basimp);
		if ($this->isColumnModified(OptipretPeer::PORRET)) $criteria->add(OptipretPeer::PORRET, $this->porret);
		if ($this->isColumnModified(OptipretPeer::UNITRI)) $criteria->add(OptipretPeer::UNITRI, $this->unitri);
		if ($this->isColumnModified(OptipretPeer::PORSUS)) $criteria->add(OptipretPeer::PORSUS, $this->porsus);
		if ($this->isColumnModified(OptipretPeer::FACTOR)) $criteria->add(OptipretPeer::FACTOR, $this->factor);
		if ($this->isColumnModified(OptipretPeer::ID)) $criteria->add(OptipretPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OptipretPeer::DATABASE_NAME);

		$criteria->add(OptipretPeer::ID, $this->id);

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

		$copyObj->setCodtip($this->codtip);

		$copyObj->setDestip($this->destip);

		$copyObj->setCodcon($this->codcon);

		$copyObj->setBasimp($this->basimp);

		$copyObj->setPorret($this->porret);

		$copyObj->setUnitri($this->unitri);

		$copyObj->setPorsus($this->porsus);

		$copyObj->setFactor($this->factor);


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
			self::$peer = new OptipretPeer();
		}
		return self::$peer;
	}

} 