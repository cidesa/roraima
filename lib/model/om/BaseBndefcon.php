<?php


abstract class BaseBndefcon extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codact;


	
	protected $codmue;


	
	protected $ctadepcar;


	
	protected $ctadepabo;


	
	protected $ctaajucar;


	
	protected $ctaajuabo;


	
	protected $ctarevcar;


	
	protected $ctarevabo;


	
	protected $stacta;


	
	protected $ctapercar;


	
	protected $ctaperabo;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodact()
  {

    return trim($this->codact);

  }
  
  public function getCodmue()
  {

    return trim($this->codmue);

  }
  
  public function getCtadepcar()
  {

    return trim($this->ctadepcar);

  }
  
  public function getCtadepabo()
  {

    return trim($this->ctadepabo);

  }
  
  public function getCtaajucar()
  {

    return trim($this->ctaajucar);

  }
  
  public function getCtaajuabo()
  {

    return trim($this->ctaajuabo);

  }
  
  public function getCtarevcar()
  {

    return trim($this->ctarevcar);

  }
  
  public function getCtarevabo()
  {

    return trim($this->ctarevabo);

  }
  
  public function getStacta()
  {

    return trim($this->stacta);

  }
  
  public function getCtapercar()
  {

    return trim($this->ctapercar);

  }
  
  public function getCtaperabo()
  {

    return trim($this->ctaperabo);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodact($v)
	{

    if ($this->codact !== $v) {
        $this->codact = $v;
        $this->modifiedColumns[] = BndefconPeer::CODACT;
      }
  
	} 
	
	public function setCodmue($v)
	{

    if ($this->codmue !== $v) {
        $this->codmue = $v;
        $this->modifiedColumns[] = BndefconPeer::CODMUE;
      }
  
	} 
	
	public function setCtadepcar($v)
	{

    if ($this->ctadepcar !== $v) {
        $this->ctadepcar = $v;
        $this->modifiedColumns[] = BndefconPeer::CTADEPCAR;
      }
  
	} 
	
	public function setCtadepabo($v)
	{

    if ($this->ctadepabo !== $v) {
        $this->ctadepabo = $v;
        $this->modifiedColumns[] = BndefconPeer::CTADEPABO;
      }
  
	} 
	
	public function setCtaajucar($v)
	{

    if ($this->ctaajucar !== $v) {
        $this->ctaajucar = $v;
        $this->modifiedColumns[] = BndefconPeer::CTAAJUCAR;
      }
  
	} 
	
	public function setCtaajuabo($v)
	{

    if ($this->ctaajuabo !== $v) {
        $this->ctaajuabo = $v;
        $this->modifiedColumns[] = BndefconPeer::CTAAJUABO;
      }
  
	} 
	
	public function setCtarevcar($v)
	{

    if ($this->ctarevcar !== $v) {
        $this->ctarevcar = $v;
        $this->modifiedColumns[] = BndefconPeer::CTAREVCAR;
      }
  
	} 
	
	public function setCtarevabo($v)
	{

    if ($this->ctarevabo !== $v) {
        $this->ctarevabo = $v;
        $this->modifiedColumns[] = BndefconPeer::CTAREVABO;
      }
  
	} 
	
	public function setStacta($v)
	{

    if ($this->stacta !== $v) {
        $this->stacta = $v;
        $this->modifiedColumns[] = BndefconPeer::STACTA;
      }
  
	} 
	
	public function setCtapercar($v)
	{

    if ($this->ctapercar !== $v) {
        $this->ctapercar = $v;
        $this->modifiedColumns[] = BndefconPeer::CTAPERCAR;
      }
  
	} 
	
	public function setCtaperabo($v)
	{

    if ($this->ctaperabo !== $v) {
        $this->ctaperabo = $v;
        $this->modifiedColumns[] = BndefconPeer::CTAPERABO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = BndefconPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codact = $rs->getString($startcol + 0);

      $this->codmue = $rs->getString($startcol + 1);

      $this->ctadepcar = $rs->getString($startcol + 2);

      $this->ctadepabo = $rs->getString($startcol + 3);

      $this->ctaajucar = $rs->getString($startcol + 4);

      $this->ctaajuabo = $rs->getString($startcol + 5);

      $this->ctarevcar = $rs->getString($startcol + 6);

      $this->ctarevabo = $rs->getString($startcol + 7);

      $this->stacta = $rs->getString($startcol + 8);

      $this->ctapercar = $rs->getString($startcol + 9);

      $this->ctaperabo = $rs->getString($startcol + 10);

      $this->id = $rs->getInt($startcol + 11);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 12; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Bndefcon object", $e);
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
			$con = Propel::getConnection(BndefconPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BndefconPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BndefconPeer::DATABASE_NAME);
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
					$pk = BndefconPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += BndefconPeer::doUpdate($this, $con);
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


			if (($retval = BndefconPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BndefconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodact();
				break;
			case 1:
				return $this->getCodmue();
				break;
			case 2:
				return $this->getCtadepcar();
				break;
			case 3:
				return $this->getCtadepabo();
				break;
			case 4:
				return $this->getCtaajucar();
				break;
			case 5:
				return $this->getCtaajuabo();
				break;
			case 6:
				return $this->getCtarevcar();
				break;
			case 7:
				return $this->getCtarevabo();
				break;
			case 8:
				return $this->getStacta();
				break;
			case 9:
				return $this->getCtapercar();
				break;
			case 10:
				return $this->getCtaperabo();
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
		$keys = BndefconPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodact(),
			$keys[1] => $this->getCodmue(),
			$keys[2] => $this->getCtadepcar(),
			$keys[3] => $this->getCtadepabo(),
			$keys[4] => $this->getCtaajucar(),
			$keys[5] => $this->getCtaajuabo(),
			$keys[6] => $this->getCtarevcar(),
			$keys[7] => $this->getCtarevabo(),
			$keys[8] => $this->getStacta(),
			$keys[9] => $this->getCtapercar(),
			$keys[10] => $this->getCtaperabo(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BndefconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodact($value);
				break;
			case 1:
				$this->setCodmue($value);
				break;
			case 2:
				$this->setCtadepcar($value);
				break;
			case 3:
				$this->setCtadepabo($value);
				break;
			case 4:
				$this->setCtaajucar($value);
				break;
			case 5:
				$this->setCtaajuabo($value);
				break;
			case 6:
				$this->setCtarevcar($value);
				break;
			case 7:
				$this->setCtarevabo($value);
				break;
			case 8:
				$this->setStacta($value);
				break;
			case 9:
				$this->setCtapercar($value);
				break;
			case 10:
				$this->setCtaperabo($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BndefconPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodact($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodmue($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCtadepcar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCtadepabo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCtaajucar($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCtaajuabo($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCtarevcar($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCtarevabo($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setStacta($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCtapercar($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCtaperabo($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BndefconPeer::DATABASE_NAME);

		if ($this->isColumnModified(BndefconPeer::CODACT)) $criteria->add(BndefconPeer::CODACT, $this->codact);
		if ($this->isColumnModified(BndefconPeer::CODMUE)) $criteria->add(BndefconPeer::CODMUE, $this->codmue);
		if ($this->isColumnModified(BndefconPeer::CTADEPCAR)) $criteria->add(BndefconPeer::CTADEPCAR, $this->ctadepcar);
		if ($this->isColumnModified(BndefconPeer::CTADEPABO)) $criteria->add(BndefconPeer::CTADEPABO, $this->ctadepabo);
		if ($this->isColumnModified(BndefconPeer::CTAAJUCAR)) $criteria->add(BndefconPeer::CTAAJUCAR, $this->ctaajucar);
		if ($this->isColumnModified(BndefconPeer::CTAAJUABO)) $criteria->add(BndefconPeer::CTAAJUABO, $this->ctaajuabo);
		if ($this->isColumnModified(BndefconPeer::CTAREVCAR)) $criteria->add(BndefconPeer::CTAREVCAR, $this->ctarevcar);
		if ($this->isColumnModified(BndefconPeer::CTAREVABO)) $criteria->add(BndefconPeer::CTAREVABO, $this->ctarevabo);
		if ($this->isColumnModified(BndefconPeer::STACTA)) $criteria->add(BndefconPeer::STACTA, $this->stacta);
		if ($this->isColumnModified(BndefconPeer::CTAPERCAR)) $criteria->add(BndefconPeer::CTAPERCAR, $this->ctapercar);
		if ($this->isColumnModified(BndefconPeer::CTAPERABO)) $criteria->add(BndefconPeer::CTAPERABO, $this->ctaperabo);
		if ($this->isColumnModified(BndefconPeer::ID)) $criteria->add(BndefconPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BndefconPeer::DATABASE_NAME);

		$criteria->add(BndefconPeer::ID, $this->id);

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

		$copyObj->setCodact($this->codact);

		$copyObj->setCodmue($this->codmue);

		$copyObj->setCtadepcar($this->ctadepcar);

		$copyObj->setCtadepabo($this->ctadepabo);

		$copyObj->setCtaajucar($this->ctaajucar);

		$copyObj->setCtaajuabo($this->ctaajuabo);

		$copyObj->setCtarevcar($this->ctarevcar);

		$copyObj->setCtarevabo($this->ctarevabo);

		$copyObj->setStacta($this->stacta);

		$copyObj->setCtapercar($this->ctapercar);

		$copyObj->setCtaperabo($this->ctaperabo);


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
			self::$peer = new BndefconPeer();
		}
		return self::$peer;
	}

} 