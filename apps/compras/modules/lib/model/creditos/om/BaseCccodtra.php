<?php


abstract class BaseCccodtra extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $codtra;


	
	protected $descodtra;


	
	protected $observ;


	
	protected $ccbanco_id;

	
	protected $aCcbanco;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getCodtra()
  {

    return $this->codtra;

  }
  
  public function getDescodtra()
  {

    return trim($this->descodtra);

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getCcbancoId()
  {

    return $this->ccbanco_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CccodtraPeer::ID;
      }
  
	} 
	
	public function setCodtra($v)
	{

    if ($this->codtra !== $v) {
        $this->codtra = $v;
        $this->modifiedColumns[] = CccodtraPeer::CODTRA;
      }
  
	} 
	
	public function setDescodtra($v)
	{

    if ($this->descodtra !== $v) {
        $this->descodtra = $v;
        $this->modifiedColumns[] = CccodtraPeer::DESCODTRA;
      }
  
	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = CccodtraPeer::OBSERV;
      }
  
	} 
	
	public function setCcbancoId($v)
	{

    if ($this->ccbanco_id !== $v) {
        $this->ccbanco_id = $v;
        $this->modifiedColumns[] = CccodtraPeer::CCBANCO_ID;
      }
  
		if ($this->aCcbanco !== null && $this->aCcbanco->getId() !== $v) {
			$this->aCcbanco = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->codtra = $rs->getInt($startcol + 1);

      $this->descodtra = $rs->getString($startcol + 2);

      $this->observ = $rs->getString($startcol + 3);

      $this->ccbanco_id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cccodtra object", $e);
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
			$con = Propel::getConnection(CccodtraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CccodtraPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CccodtraPeer::DATABASE_NAME);
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


												
			if ($this->aCcbanco !== null) {
				if ($this->aCcbanco->isModified()) {
					$affectedRows += $this->aCcbanco->save($con);
				}
				$this->setCcbanco($this->aCcbanco);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CccodtraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CccodtraPeer::doUpdate($this, $con);
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


												
			if ($this->aCcbanco !== null) {
				if (!$this->aCcbanco->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcbanco->getValidationFailures());
				}
			}


			if (($retval = CccodtraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CccodtraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCodtra();
				break;
			case 2:
				return $this->getDescodtra();
				break;
			case 3:
				return $this->getObserv();
				break;
			case 4:
				return $this->getCcbancoId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CccodtraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCodtra(),
			$keys[2] => $this->getDescodtra(),
			$keys[3] => $this->getObserv(),
			$keys[4] => $this->getCcbancoId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CccodtraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCodtra($value);
				break;
			case 2:
				$this->setDescodtra($value);
				break;
			case 3:
				$this->setObserv($value);
				break;
			case 4:
				$this->setCcbancoId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CccodtraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodtra($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescodtra($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setObserv($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCcbancoId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CccodtraPeer::DATABASE_NAME);

		if ($this->isColumnModified(CccodtraPeer::ID)) $criteria->add(CccodtraPeer::ID, $this->id);
		if ($this->isColumnModified(CccodtraPeer::CODTRA)) $criteria->add(CccodtraPeer::CODTRA, $this->codtra);
		if ($this->isColumnModified(CccodtraPeer::DESCODTRA)) $criteria->add(CccodtraPeer::DESCODTRA, $this->descodtra);
		if ($this->isColumnModified(CccodtraPeer::OBSERV)) $criteria->add(CccodtraPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(CccodtraPeer::CCBANCO_ID)) $criteria->add(CccodtraPeer::CCBANCO_ID, $this->ccbanco_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CccodtraPeer::DATABASE_NAME);

		$criteria->add(CccodtraPeer::ID, $this->id);

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

		$copyObj->setCodtra($this->codtra);

		$copyObj->setDescodtra($this->descodtra);

		$copyObj->setObserv($this->observ);

		$copyObj->setCcbancoId($this->ccbanco_id);


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
			self::$peer = new CccodtraPeer();
		}
		return self::$peer;
	}

	
	public function setCcbanco($v)
	{


		if ($v === null) {
			$this->setCcbancoId(NULL);
		} else {
			$this->setCcbancoId($v->getId());
		}


		$this->aCcbanco = $v;
	}


	
	public function getCcbanco($con = null)
	{
		if ($this->aCcbanco === null && ($this->ccbanco_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcbancoPeer.php';

      $c = new Criteria();
      $c->add(CcbancoPeer::ID,$this->ccbanco_id);
      
			$this->aCcbanco = CcbancoPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcbanco;
	}

} 