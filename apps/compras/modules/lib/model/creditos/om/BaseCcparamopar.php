<?php


abstract class BaseCcparamopar extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $priori;


	
	protected $porcen;


	
	protected $ccpartid_id;


	
	protected $ccperparamo_id;

	
	protected $aCcpartid;

	
	protected $aCcperparamo;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getPriori()
  {

    return $this->priori;

  }
  
  public function getPorcen($val=false)
  {

    if($val) return number_format($this->porcen,2,',','.');
    else return $this->porcen;

  }
  
  public function getCcpartidId()
  {

    return $this->ccpartid_id;

  }
  
  public function getCcperparamoId()
  {

    return $this->ccperparamo_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcparamoparPeer::ID;
      }
  
	} 
	
	public function setPriori($v)
	{

    if ($this->priori !== $v) {
        $this->priori = $v;
        $this->modifiedColumns[] = CcparamoparPeer::PRIORI;
      }
  
	} 
	
	public function setPorcen($v)
	{

    if ($this->porcen !== $v) {
        $this->porcen = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcparamoparPeer::PORCEN;
      }
  
	} 
	
	public function setCcpartidId($v)
	{

    if ($this->ccpartid_id !== $v) {
        $this->ccpartid_id = $v;
        $this->modifiedColumns[] = CcparamoparPeer::CCPARTID_ID;
      }
  
		if ($this->aCcpartid !== null && $this->aCcpartid->getId() !== $v) {
			$this->aCcpartid = null;
		}

	} 
	
	public function setCcperparamoId($v)
	{

    if ($this->ccperparamo_id !== $v) {
        $this->ccperparamo_id = $v;
        $this->modifiedColumns[] = CcparamoparPeer::CCPERPARAMO_ID;
      }
  
		if ($this->aCcperparamo !== null && $this->aCcperparamo->getId() !== $v) {
			$this->aCcperparamo = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->priori = $rs->getInt($startcol + 1);

      $this->porcen = $rs->getFloat($startcol + 2);

      $this->ccpartid_id = $rs->getInt($startcol + 3);

      $this->ccperparamo_id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccparamopar object", $e);
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
			$con = Propel::getConnection(CcparamoparPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcparamoparPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcparamoparPeer::DATABASE_NAME);
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


												
			if ($this->aCcpartid !== null) {
				if ($this->aCcpartid->isModified()) {
					$affectedRows += $this->aCcpartid->save($con);
				}
				$this->setCcpartid($this->aCcpartid);
			}

			if ($this->aCcperparamo !== null) {
				if ($this->aCcperparamo->isModified()) {
					$affectedRows += $this->aCcperparamo->save($con);
				}
				$this->setCcperparamo($this->aCcperparamo);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcparamoparPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcparamoparPeer::doUpdate($this, $con);
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


												
			if ($this->aCcpartid !== null) {
				if (!$this->aCcpartid->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcpartid->getValidationFailures());
				}
			}

			if ($this->aCcperparamo !== null) {
				if (!$this->aCcperparamo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcperparamo->getValidationFailures());
				}
			}


			if (($retval = CcparamoparPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcparamoparPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getPriori();
				break;
			case 2:
				return $this->getPorcen();
				break;
			case 3:
				return $this->getCcpartidId();
				break;
			case 4:
				return $this->getCcperparamoId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcparamoparPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getPriori(),
			$keys[2] => $this->getPorcen(),
			$keys[3] => $this->getCcpartidId(),
			$keys[4] => $this->getCcperparamoId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcparamoparPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setPriori($value);
				break;
			case 2:
				$this->setPorcen($value);
				break;
			case 3:
				$this->setCcpartidId($value);
				break;
			case 4:
				$this->setCcperparamoId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcparamoparPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPriori($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPorcen($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCcpartidId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCcperparamoId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcparamoparPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcparamoparPeer::ID)) $criteria->add(CcparamoparPeer::ID, $this->id);
		if ($this->isColumnModified(CcparamoparPeer::PRIORI)) $criteria->add(CcparamoparPeer::PRIORI, $this->priori);
		if ($this->isColumnModified(CcparamoparPeer::PORCEN)) $criteria->add(CcparamoparPeer::PORCEN, $this->porcen);
		if ($this->isColumnModified(CcparamoparPeer::CCPARTID_ID)) $criteria->add(CcparamoparPeer::CCPARTID_ID, $this->ccpartid_id);
		if ($this->isColumnModified(CcparamoparPeer::CCPERPARAMO_ID)) $criteria->add(CcparamoparPeer::CCPERPARAMO_ID, $this->ccperparamo_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcparamoparPeer::DATABASE_NAME);

		$criteria->add(CcparamoparPeer::ID, $this->id);

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

		$copyObj->setPriori($this->priori);

		$copyObj->setPorcen($this->porcen);

		$copyObj->setCcpartidId($this->ccpartid_id);

		$copyObj->setCcperparamoId($this->ccperparamo_id);


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
			self::$peer = new CcparamoparPeer();
		}
		return self::$peer;
	}

	
	public function setCcpartid($v)
	{


		if ($v === null) {
			$this->setCcpartidId(NULL);
		} else {
			$this->setCcpartidId($v->getId());
		}


		$this->aCcpartid = $v;
	}


	
	public function getCcpartid($con = null)
	{
		if ($this->aCcpartid === null && ($this->ccpartid_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcpartidPeer.php';

      $c = new Criteria();
      $c->add(CcpartidPeer::ID,$this->ccpartid_id);
      
			$this->aCcpartid = CcpartidPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcpartid;
	}

	
	public function setCcperparamo($v)
	{


		if ($v === null) {
			$this->setCcperparamoId(NULL);
		} else {
			$this->setCcperparamoId($v->getId());
		}


		$this->aCcperparamo = $v;
	}


	
	public function getCcperparamo($con = null)
	{
		if ($this->aCcperparamo === null && ($this->ccperparamo_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcperparamoPeer.php';

      $c = new Criteria();
      $c->add(CcperparamoPeer::ID,$this->ccperparamo_id);
      
			$this->aCcperparamo = CcperparamoPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcperparamo;
	}

} 