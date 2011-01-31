<?php


abstract class BaseCccreant extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $feccre;


	
	protected $numcre;


	
	protected $moncre;


	
	protected $salact;


	
	protected $estatu;


	
	protected $nomentfin;


	
	protected $tipent;


	
	protected $ccbenefi_id;

	
	protected $aCcbenefi;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getFeccre($format = 'Y-m-d')
  {

    if ($this->feccre === null || $this->feccre === '') {
      return null;
    } elseif (!is_int($this->feccre)) {
            $ts = adodb_strtotime($this->feccre);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccre] as date/time value: " . var_export($this->feccre, true));
      }
    } else {
      $ts = $this->feccre;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNumcre()
  {

    return trim($this->numcre);

  }
  
  public function getMoncre($val=false)
  {

    if($val) return number_format($this->moncre,2,',','.');
    else return $this->moncre;

  }
  
  public function getSalact($val=false)
  {

    if($val) return number_format($this->salact,2,',','.');
    else return $this->salact;

  }
  
  public function getEstatu()
  {

    return trim($this->estatu);

  }
  
  public function getNomentfin()
  {

    return trim($this->nomentfin);

  }
  
  public function getTipent()
  {

    return trim($this->tipent);

  }
  
  public function getCcbenefiId()
  {

    return $this->ccbenefi_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CccreantPeer::ID;
      }
  
	} 
	
	public function setFeccre($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccre] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccre !== $ts) {
      $this->feccre = $ts;
      $this->modifiedColumns[] = CccreantPeer::FECCRE;
    }

	} 
	
	public function setNumcre($v)
	{

    if ($this->numcre !== $v) {
        $this->numcre = $v;
        $this->modifiedColumns[] = CccreantPeer::NUMCRE;
      }
  
	} 
	
	public function setMoncre($v)
	{

    if ($this->moncre !== $v) {
        $this->moncre = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CccreantPeer::MONCRE;
      }
  
	} 
	
	public function setSalact($v)
	{

    if ($this->salact !== $v) {
        $this->salact = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CccreantPeer::SALACT;
      }
  
	} 
	
	public function setEstatu($v)
	{

    if ($this->estatu !== $v) {
        $this->estatu = $v;
        $this->modifiedColumns[] = CccreantPeer::ESTATU;
      }
  
	} 
	
	public function setNomentfin($v)
	{

    if ($this->nomentfin !== $v) {
        $this->nomentfin = $v;
        $this->modifiedColumns[] = CccreantPeer::NOMENTFIN;
      }
  
	} 
	
	public function setTipent($v)
	{

    if ($this->tipent !== $v) {
        $this->tipent = $v;
        $this->modifiedColumns[] = CccreantPeer::TIPENT;
      }
  
	} 
	
	public function setCcbenefiId($v)
	{

    if ($this->ccbenefi_id !== $v) {
        $this->ccbenefi_id = $v;
        $this->modifiedColumns[] = CccreantPeer::CCBENEFI_ID;
      }
  
		if ($this->aCcbenefi !== null && $this->aCcbenefi->getId() !== $v) {
			$this->aCcbenefi = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->feccre = $rs->getDate($startcol + 1, null);

      $this->numcre = $rs->getString($startcol + 2);

      $this->moncre = $rs->getFloat($startcol + 3);

      $this->salact = $rs->getFloat($startcol + 4);

      $this->estatu = $rs->getString($startcol + 5);

      $this->nomentfin = $rs->getString($startcol + 6);

      $this->tipent = $rs->getString($startcol + 7);

      $this->ccbenefi_id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cccreant object", $e);
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
			$con = Propel::getConnection(CccreantPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CccreantPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CccreantPeer::DATABASE_NAME);
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


												
			if ($this->aCcbenefi !== null) {
				if ($this->aCcbenefi->isModified()) {
					$affectedRows += $this->aCcbenefi->save($con);
				}
				$this->setCcbenefi($this->aCcbenefi);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CccreantPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CccreantPeer::doUpdate($this, $con);
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


												
			if ($this->aCcbenefi !== null) {
				if (!$this->aCcbenefi->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcbenefi->getValidationFailures());
				}
			}


			if (($retval = CccreantPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CccreantPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getFeccre();
				break;
			case 2:
				return $this->getNumcre();
				break;
			case 3:
				return $this->getMoncre();
				break;
			case 4:
				return $this->getSalact();
				break;
			case 5:
				return $this->getEstatu();
				break;
			case 6:
				return $this->getNomentfin();
				break;
			case 7:
				return $this->getTipent();
				break;
			case 8:
				return $this->getCcbenefiId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CccreantPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFeccre(),
			$keys[2] => $this->getNumcre(),
			$keys[3] => $this->getMoncre(),
			$keys[4] => $this->getSalact(),
			$keys[5] => $this->getEstatu(),
			$keys[6] => $this->getNomentfin(),
			$keys[7] => $this->getTipent(),
			$keys[8] => $this->getCcbenefiId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CccreantPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFeccre($value);
				break;
			case 2:
				$this->setNumcre($value);
				break;
			case 3:
				$this->setMoncre($value);
				break;
			case 4:
				$this->setSalact($value);
				break;
			case 5:
				$this->setEstatu($value);
				break;
			case 6:
				$this->setNomentfin($value);
				break;
			case 7:
				$this->setTipent($value);
				break;
			case 8:
				$this->setCcbenefiId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CccreantPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFeccre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumcre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMoncre($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setSalact($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEstatu($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNomentfin($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTipent($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCcbenefiId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CccreantPeer::DATABASE_NAME);

		if ($this->isColumnModified(CccreantPeer::ID)) $criteria->add(CccreantPeer::ID, $this->id);
		if ($this->isColumnModified(CccreantPeer::FECCRE)) $criteria->add(CccreantPeer::FECCRE, $this->feccre);
		if ($this->isColumnModified(CccreantPeer::NUMCRE)) $criteria->add(CccreantPeer::NUMCRE, $this->numcre);
		if ($this->isColumnModified(CccreantPeer::MONCRE)) $criteria->add(CccreantPeer::MONCRE, $this->moncre);
		if ($this->isColumnModified(CccreantPeer::SALACT)) $criteria->add(CccreantPeer::SALACT, $this->salact);
		if ($this->isColumnModified(CccreantPeer::ESTATU)) $criteria->add(CccreantPeer::ESTATU, $this->estatu);
		if ($this->isColumnModified(CccreantPeer::NOMENTFIN)) $criteria->add(CccreantPeer::NOMENTFIN, $this->nomentfin);
		if ($this->isColumnModified(CccreantPeer::TIPENT)) $criteria->add(CccreantPeer::TIPENT, $this->tipent);
		if ($this->isColumnModified(CccreantPeer::CCBENEFI_ID)) $criteria->add(CccreantPeer::CCBENEFI_ID, $this->ccbenefi_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CccreantPeer::DATABASE_NAME);

		$criteria->add(CccreantPeer::ID, $this->id);

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

		$copyObj->setFeccre($this->feccre);

		$copyObj->setNumcre($this->numcre);

		$copyObj->setMoncre($this->moncre);

		$copyObj->setSalact($this->salact);

		$copyObj->setEstatu($this->estatu);

		$copyObj->setNomentfin($this->nomentfin);

		$copyObj->setTipent($this->tipent);

		$copyObj->setCcbenefiId($this->ccbenefi_id);


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
			self::$peer = new CccreantPeer();
		}
		return self::$peer;
	}

	
	public function setCcbenefi($v)
	{


		if ($v === null) {
			$this->setCcbenefiId(NULL);
		} else {
			$this->setCcbenefiId($v->getId());
		}


		$this->aCcbenefi = $v;
	}


	
	public function getCcbenefi($con = null)
	{
		if ($this->aCcbenefi === null && ($this->ccbenefi_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';

      $c = new Criteria();
      $c->add(CcbenefiPeer::ID,$this->ccbenefi_id);
      
			$this->aCcbenefi = CcbenefiPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcbenefi;
	}

} 