<?php


abstract class BaseCcvehcreparcon extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $ccparcrecon_id;


	
	protected $ccvehicu_id;

	
	protected $aCcparcrecon;

	
	protected $aCcvehicu;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getCcparcreconId()
  {

    return $this->ccparcrecon_id;

  }
  
  public function getCcvehicuId()
  {

    return $this->ccvehicu_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcvehcreparconPeer::ID;
      }
  
	} 
	
	public function setCcparcreconId($v)
	{

    if ($this->ccparcrecon_id !== $v) {
        $this->ccparcrecon_id = $v;
        $this->modifiedColumns[] = CcvehcreparconPeer::CCPARCRECON_ID;
      }
  
		if ($this->aCcparcrecon !== null && $this->aCcparcrecon->getId() !== $v) {
			$this->aCcparcrecon = null;
		}

	} 
	
	public function setCcvehicuId($v)
	{

    if ($this->ccvehicu_id !== $v) {
        $this->ccvehicu_id = $v;
        $this->modifiedColumns[] = CcvehcreparconPeer::CCVEHICU_ID;
      }
  
		if ($this->aCcvehicu !== null && $this->aCcvehicu->getId() !== $v) {
			$this->aCcvehicu = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->ccparcrecon_id = $rs->getInt($startcol + 1);

      $this->ccvehicu_id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccvehcreparcon object", $e);
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
			$con = Propel::getConnection(CcvehcreparconPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcvehcreparconPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcvehcreparconPeer::DATABASE_NAME);
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


												
			if ($this->aCcparcrecon !== null) {
				if ($this->aCcparcrecon->isModified()) {
					$affectedRows += $this->aCcparcrecon->save($con);
				}
				$this->setCcparcrecon($this->aCcparcrecon);
			}

			if ($this->aCcvehicu !== null) {
				if ($this->aCcvehicu->isModified()) {
					$affectedRows += $this->aCcvehicu->save($con);
				}
				$this->setCcvehicu($this->aCcvehicu);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcvehcreparconPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcvehcreparconPeer::doUpdate($this, $con);
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


												
			if ($this->aCcparcrecon !== null) {
				if (!$this->aCcparcrecon->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcparcrecon->getValidationFailures());
				}
			}

			if ($this->aCcvehicu !== null) {
				if (!$this->aCcvehicu->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcvehicu->getValidationFailures());
				}
			}


			if (($retval = CcvehcreparconPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcvehcreparconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCcparcreconId();
				break;
			case 2:
				return $this->getCcvehicuId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcvehcreparconPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCcparcreconId(),
			$keys[2] => $this->getCcvehicuId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcvehcreparconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCcparcreconId($value);
				break;
			case 2:
				$this->setCcvehicuId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcvehcreparconPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCcparcreconId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCcvehicuId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcvehcreparconPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcvehcreparconPeer::ID)) $criteria->add(CcvehcreparconPeer::ID, $this->id);
		if ($this->isColumnModified(CcvehcreparconPeer::CCPARCRECON_ID)) $criteria->add(CcvehcreparconPeer::CCPARCRECON_ID, $this->ccparcrecon_id);
		if ($this->isColumnModified(CcvehcreparconPeer::CCVEHICU_ID)) $criteria->add(CcvehcreparconPeer::CCVEHICU_ID, $this->ccvehicu_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcvehcreparconPeer::DATABASE_NAME);

		$criteria->add(CcvehcreparconPeer::ID, $this->id);

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

		$copyObj->setCcparcreconId($this->ccparcrecon_id);

		$copyObj->setCcvehicuId($this->ccvehicu_id);


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
			self::$peer = new CcvehcreparconPeer();
		}
		return self::$peer;
	}

	
	public function setCcparcrecon($v)
	{


		if ($v === null) {
			$this->setCcparcreconId(NULL);
		} else {
			$this->setCcparcreconId($v->getId());
		}


		$this->aCcparcrecon = $v;
	}


	
	public function getCcparcrecon($con = null)
	{
		if ($this->aCcparcrecon === null && ($this->ccparcrecon_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcparcreconPeer.php';

      $c = new Criteria();
      $c->add(CcparcreconPeer::ID,$this->ccparcrecon_id);
      
			$this->aCcparcrecon = CcparcreconPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcparcrecon;
	}

	
	public function setCcvehicu($v)
	{


		if ($v === null) {
			$this->setCcvehicuId(NULL);
		} else {
			$this->setCcvehicuId($v->getId());
		}


		$this->aCcvehicu = $v;
	}


	
	public function getCcvehicu($con = null)
	{
		if ($this->aCcvehicu === null && ($this->ccvehicu_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcvehicuPeer.php';

      $c = new Criteria();
      $c->add(CcvehicuPeer::ID,$this->ccvehicu_id);
      
			$this->aCcvehicu = CcvehicuPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcvehicu;
	}

} 