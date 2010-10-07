<?php


abstract class BaseForfinobr extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcat;


	
	protected $codobr;


	
	protected $codparegr;


	
	protected $codparing;


	
	protected $monfin;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getCodobr()
  {

    return trim($this->codobr);

  }
  
  public function getCodparegr()
  {

    return trim($this->codparegr);

  }
  
  public function getCodparing()
  {

    return trim($this->codparing);

  }
  
  public function getMonfin($val=false)
  {

    if($val) return number_format($this->monfin,2,',','.');
    else return $this->monfin;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = ForfinobrPeer::CODCAT;
      }
  
	} 
	
	public function setCodobr($v)
	{

    if ($this->codobr !== $v) {
        $this->codobr = $v;
        $this->modifiedColumns[] = ForfinobrPeer::CODOBR;
      }
  
	} 
	
	public function setCodparegr($v)
	{

    if ($this->codparegr !== $v) {
        $this->codparegr = $v;
        $this->modifiedColumns[] = ForfinobrPeer::CODPAREGR;
      }
  
	} 
	
	public function setCodparing($v)
	{

    if ($this->codparing !== $v) {
        $this->codparing = $v;
        $this->modifiedColumns[] = ForfinobrPeer::CODPARING;
      }
  
	} 
	
	public function setMonfin($v)
	{

    if ($this->monfin !== $v) {
        $this->monfin = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForfinobrPeer::MONFIN;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ForfinobrPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcat = $rs->getString($startcol + 0);

      $this->codobr = $rs->getString($startcol + 1);

      $this->codparegr = $rs->getString($startcol + 2);

      $this->codparing = $rs->getString($startcol + 3);

      $this->monfin = $rs->getFloat($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Forfinobr object", $e);
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
			$con = Propel::getConnection(ForfinobrPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForfinobrPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForfinobrPeer::DATABASE_NAME);
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
					$pk = ForfinobrPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ForfinobrPeer::doUpdate($this, $con);
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


			if (($retval = ForfinobrPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForfinobrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcat();
				break;
			case 1:
				return $this->getCodobr();
				break;
			case 2:
				return $this->getCodparegr();
				break;
			case 3:
				return $this->getCodparing();
				break;
			case 4:
				return $this->getMonfin();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForfinobrPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcat(),
			$keys[1] => $this->getCodobr(),
			$keys[2] => $this->getCodparegr(),
			$keys[3] => $this->getCodparing(),
			$keys[4] => $this->getMonfin(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForfinobrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcat($value);
				break;
			case 1:
				$this->setCodobr($value);
				break;
			case 2:
				$this->setCodparegr($value);
				break;
			case 3:
				$this->setCodparing($value);
				break;
			case 4:
				$this->setMonfin($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForfinobrPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcat($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodobr($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodparegr($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodparing($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonfin($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForfinobrPeer::DATABASE_NAME);

		if ($this->isColumnModified(ForfinobrPeer::CODCAT)) $criteria->add(ForfinobrPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(ForfinobrPeer::CODOBR)) $criteria->add(ForfinobrPeer::CODOBR, $this->codobr);
		if ($this->isColumnModified(ForfinobrPeer::CODPAREGR)) $criteria->add(ForfinobrPeer::CODPAREGR, $this->codparegr);
		if ($this->isColumnModified(ForfinobrPeer::CODPARING)) $criteria->add(ForfinobrPeer::CODPARING, $this->codparing);
		if ($this->isColumnModified(ForfinobrPeer::MONFIN)) $criteria->add(ForfinobrPeer::MONFIN, $this->monfin);
		if ($this->isColumnModified(ForfinobrPeer::ID)) $criteria->add(ForfinobrPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForfinobrPeer::DATABASE_NAME);

		$criteria->add(ForfinobrPeer::ID, $this->id);

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

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCodobr($this->codobr);

		$copyObj->setCodparegr($this->codparegr);

		$copyObj->setCodparing($this->codparing);

		$copyObj->setMonfin($this->monfin);


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
			self::$peer = new ForfinobrPeer();
		}
		return self::$peer;
	}

} 