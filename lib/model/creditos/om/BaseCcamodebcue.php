<?php


abstract class BaseCcamodebcue extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $ccamoact_id;


	
	protected $ccdebcue_id;

	
	protected $aCcamoact;

	
	protected $aCcdebcue;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getCcamoactId()
  {

    return $this->ccamoact_id;

  }
  
  public function getCcdebcueId()
  {

    return $this->ccdebcue_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcamodebcuePeer::ID;
      }
  
	} 
	
	public function setCcamoactId($v)
	{

    if ($this->ccamoact_id !== $v) {
        $this->ccamoact_id = $v;
        $this->modifiedColumns[] = CcamodebcuePeer::CCAMOACT_ID;
      }
  
		if ($this->aCcamoact !== null && $this->aCcamoact->getId() !== $v) {
			$this->aCcamoact = null;
		}

	} 
	
	public function setCcdebcueId($v)
	{

    if ($this->ccdebcue_id !== $v) {
        $this->ccdebcue_id = $v;
        $this->modifiedColumns[] = CcamodebcuePeer::CCDEBCUE_ID;
      }
  
		if ($this->aCcdebcue !== null && $this->aCcdebcue->getId() !== $v) {
			$this->aCcdebcue = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->ccamoact_id = $rs->getInt($startcol + 1);

      $this->ccdebcue_id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccamodebcue object", $e);
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
			$con = Propel::getConnection(CcamodebcuePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcamodebcuePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcamodebcuePeer::DATABASE_NAME);
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


												
			if ($this->aCcamoact !== null) {
				if ($this->aCcamoact->isModified()) {
					$affectedRows += $this->aCcamoact->save($con);
				}
				$this->setCcamoact($this->aCcamoact);
			}

			if ($this->aCcdebcue !== null) {
				if ($this->aCcdebcue->isModified()) {
					$affectedRows += $this->aCcdebcue->save($con);
				}
				$this->setCcdebcue($this->aCcdebcue);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcamodebcuePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcamodebcuePeer::doUpdate($this, $con);
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


												
			if ($this->aCcamoact !== null) {
				if (!$this->aCcamoact->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcamoact->getValidationFailures());
				}
			}

			if ($this->aCcdebcue !== null) {
				if (!$this->aCcdebcue->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcdebcue->getValidationFailures());
				}
			}


			if (($retval = CcamodebcuePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcamodebcuePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCcamoactId();
				break;
			case 2:
				return $this->getCcdebcueId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcamodebcuePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCcamoactId(),
			$keys[2] => $this->getCcdebcueId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcamodebcuePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCcamoactId($value);
				break;
			case 2:
				$this->setCcdebcueId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcamodebcuePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCcamoactId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCcdebcueId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcamodebcuePeer::DATABASE_NAME);

		if ($this->isColumnModified(CcamodebcuePeer::ID)) $criteria->add(CcamodebcuePeer::ID, $this->id);
		if ($this->isColumnModified(CcamodebcuePeer::CCAMOACT_ID)) $criteria->add(CcamodebcuePeer::CCAMOACT_ID, $this->ccamoact_id);
		if ($this->isColumnModified(CcamodebcuePeer::CCDEBCUE_ID)) $criteria->add(CcamodebcuePeer::CCDEBCUE_ID, $this->ccdebcue_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcamodebcuePeer::DATABASE_NAME);

		$criteria->add(CcamodebcuePeer::ID, $this->id);

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

		$copyObj->setCcamoactId($this->ccamoact_id);

		$copyObj->setCcdebcueId($this->ccdebcue_id);


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
			self::$peer = new CcamodebcuePeer();
		}
		return self::$peer;
	}

	
	public function setCcamoact($v)
	{


		if ($v === null) {
			$this->setCcamoactId(NULL);
		} else {
			$this->setCcamoactId($v->getId());
		}


		$this->aCcamoact = $v;
	}


	
	public function getCcamoact($con = null)
	{
		if ($this->aCcamoact === null && ($this->ccamoact_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcamoactPeer.php';

      $c = new Criteria();
      $c->add(CcamoactPeer::ID,$this->ccamoact_id);
      
			$this->aCcamoact = CcamoactPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcamoact;
	}

	
	public function setCcdebcue($v)
	{


		if ($v === null) {
			$this->setCcdebcueId(NULL);
		} else {
			$this->setCcdebcueId($v->getId());
		}


		$this->aCcdebcue = $v;
	}


	
	public function getCcdebcue($con = null)
	{
		if ($this->aCcdebcue === null && ($this->ccdebcue_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcdebcuePeer.php';

      $c = new Criteria();
      $c->add(CcdebcuePeer::ID,$this->ccdebcue_id);
      
			$this->aCcdebcue = CcdebcuePeer::doSelectOne($c, $con);

			
		}
		return $this->aCcdebcue;
	}

} 