<?php


abstract class BaseCcsolliqdocane extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $ccsolliq_id;


	
	protected $ccdocane_id;

	
	protected $aCcsolliq;

	
	protected $aCcdocane;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getCcsolliqId()
  {

    return $this->ccsolliq_id;

  }
  
  public function getCcdocaneId()
  {

    return $this->ccdocane_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcsolliqdocanePeer::ID;
      }
  
	} 
	
	public function setCcsolliqId($v)
	{

    if ($this->ccsolliq_id !== $v) {
        $this->ccsolliq_id = $v;
        $this->modifiedColumns[] = CcsolliqdocanePeer::CCSOLLIQ_ID;
      }
  
		if ($this->aCcsolliq !== null && $this->aCcsolliq->getId() !== $v) {
			$this->aCcsolliq = null;
		}

	} 
	
	public function setCcdocaneId($v)
	{

    if ($this->ccdocane_id !== $v) {
        $this->ccdocane_id = $v;
        $this->modifiedColumns[] = CcsolliqdocanePeer::CCDOCANE_ID;
      }
  
		if ($this->aCcdocane !== null && $this->aCcdocane->getId() !== $v) {
			$this->aCcdocane = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->ccsolliq_id = $rs->getInt($startcol + 1);

      $this->ccdocane_id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccsolliqdocane object", $e);
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
			$con = Propel::getConnection(CcsolliqdocanePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcsolliqdocanePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcsolliqdocanePeer::DATABASE_NAME);
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


												
			if ($this->aCcsolliq !== null) {
				if ($this->aCcsolliq->isModified()) {
					$affectedRows += $this->aCcsolliq->save($con);
				}
				$this->setCcsolliq($this->aCcsolliq);
			}

			if ($this->aCcdocane !== null) {
				if ($this->aCcdocane->isModified()) {
					$affectedRows += $this->aCcdocane->save($con);
				}
				$this->setCcdocane($this->aCcdocane);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcsolliqdocanePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcsolliqdocanePeer::doUpdate($this, $con);
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


												
			if ($this->aCcsolliq !== null) {
				if (!$this->aCcsolliq->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcsolliq->getValidationFailures());
				}
			}

			if ($this->aCcdocane !== null) {
				if (!$this->aCcdocane->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcdocane->getValidationFailures());
				}
			}


			if (($retval = CcsolliqdocanePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcsolliqdocanePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCcsolliqId();
				break;
			case 2:
				return $this->getCcdocaneId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcsolliqdocanePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCcsolliqId(),
			$keys[2] => $this->getCcdocaneId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcsolliqdocanePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCcsolliqId($value);
				break;
			case 2:
				$this->setCcdocaneId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcsolliqdocanePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCcsolliqId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCcdocaneId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcsolliqdocanePeer::DATABASE_NAME);

		if ($this->isColumnModified(CcsolliqdocanePeer::ID)) $criteria->add(CcsolliqdocanePeer::ID, $this->id);
		if ($this->isColumnModified(CcsolliqdocanePeer::CCSOLLIQ_ID)) $criteria->add(CcsolliqdocanePeer::CCSOLLIQ_ID, $this->ccsolliq_id);
		if ($this->isColumnModified(CcsolliqdocanePeer::CCDOCANE_ID)) $criteria->add(CcsolliqdocanePeer::CCDOCANE_ID, $this->ccdocane_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcsolliqdocanePeer::DATABASE_NAME);

		$criteria->add(CcsolliqdocanePeer::ID, $this->id);

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

		$copyObj->setCcsolliqId($this->ccsolliq_id);

		$copyObj->setCcdocaneId($this->ccdocane_id);


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
			self::$peer = new CcsolliqdocanePeer();
		}
		return self::$peer;
	}

	
	public function setCcsolliq($v)
	{


		if ($v === null) {
			$this->setCcsolliqId(NULL);
		} else {
			$this->setCcsolliqId($v->getId());
		}


		$this->aCcsolliq = $v;
	}


	
	public function getCcsolliq($con = null)
	{
		if ($this->aCcsolliq === null && ($this->ccsolliq_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcsolliqPeer.php';

      $c = new Criteria();
      $c->add(CcsolliqPeer::ID,$this->ccsolliq_id);
      
			$this->aCcsolliq = CcsolliqPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcsolliq;
	}

	
	public function setCcdocane($v)
	{


		if ($v === null) {
			$this->setCcdocaneId(NULL);
		} else {
			$this->setCcdocaneId($v->getId());
		}


		$this->aCcdocane = $v;
	}


	
	public function getCcdocane($con = null)
	{
		if ($this->aCcdocane === null && ($this->ccdocane_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcdocanePeer.php';

      $c = new Criteria();
      $c->add(CcdocanePeer::ID,$this->ccdocane_id);
      
			$this->aCcdocane = CcdocanePeer::doSelectOne($c, $con);

			
		}
		return $this->aCcdocane;
	}

} 