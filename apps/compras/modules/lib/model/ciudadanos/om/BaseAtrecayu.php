<?php


abstract class BaseAtrecayu extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $attipayu_id;


	
	protected $atrecaud_id;


	
	protected $id;

	
	protected $aAttipayu;

	
	protected $aAtrecaud;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getAttipayuId()
  {

    return $this->attipayu_id;

  }
  
  public function getAtrecaudId()
  {

    return $this->atrecaud_id;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setAttipayuId($v)
	{

    if ($this->attipayu_id !== $v) {
        $this->attipayu_id = $v;
        $this->modifiedColumns[] = AtrecayuPeer::ATTIPAYU_ID;
      }
  
		if ($this->aAttipayu !== null && $this->aAttipayu->getId() !== $v) {
			$this->aAttipayu = null;
		}

	} 
	
	public function setAtrecaudId($v)
	{

    if ($this->atrecaud_id !== $v) {
        $this->atrecaud_id = $v;
        $this->modifiedColumns[] = AtrecayuPeer::ATRECAUD_ID;
      }
  
		if ($this->aAtrecaud !== null && $this->aAtrecaud->getId() !== $v) {
			$this->aAtrecaud = null;
		}

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AtrecayuPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->attipayu_id = $rs->getInt($startcol + 0);

      $this->atrecaud_id = $rs->getInt($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Atrecayu object", $e);
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
			$con = Propel::getConnection(AtrecayuPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AtrecayuPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AtrecayuPeer::DATABASE_NAME);
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


												
			if ($this->aAttipayu !== null) {
				if ($this->aAttipayu->isModified()) {
					$affectedRows += $this->aAttipayu->save($con);
				}
				$this->setAttipayu($this->aAttipayu);
			}

			if ($this->aAtrecaud !== null) {
				if ($this->aAtrecaud->isModified()) {
					$affectedRows += $this->aAtrecaud->save($con);
				}
				$this->setAtrecaud($this->aAtrecaud);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AtrecayuPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AtrecayuPeer::doUpdate($this, $con);
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


												
			if ($this->aAttipayu !== null) {
				if (!$this->aAttipayu->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAttipayu->getValidationFailures());
				}
			}

			if ($this->aAtrecaud !== null) {
				if (!$this->aAtrecaud->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtrecaud->getValidationFailures());
				}
			}


			if (($retval = AtrecayuPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtrecayuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getAttipayuId();
				break;
			case 1:
				return $this->getAtrecaudId();
				break;
			case 2:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtrecayuPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAttipayuId(),
			$keys[1] => $this->getAtrecaudId(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtrecayuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setAttipayuId($value);
				break;
			case 1:
				$this->setAtrecaudId($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtrecayuPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAttipayuId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAtrecaudId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AtrecayuPeer::DATABASE_NAME);

		if ($this->isColumnModified(AtrecayuPeer::ATTIPAYU_ID)) $criteria->add(AtrecayuPeer::ATTIPAYU_ID, $this->attipayu_id);
		if ($this->isColumnModified(AtrecayuPeer::ATRECAUD_ID)) $criteria->add(AtrecayuPeer::ATRECAUD_ID, $this->atrecaud_id);
		if ($this->isColumnModified(AtrecayuPeer::ID)) $criteria->add(AtrecayuPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AtrecayuPeer::DATABASE_NAME);

		$criteria->add(AtrecayuPeer::ID, $this->id);

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

		$copyObj->setAttipayuId($this->attipayu_id);

		$copyObj->setAtrecaudId($this->atrecaud_id);


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
			self::$peer = new AtrecayuPeer();
		}
		return self::$peer;
	}

	
	public function setAttipayu($v)
	{


		if ($v === null) {
			$this->setAttipayuId(NULL);
		} else {
			$this->setAttipayuId($v->getId());
		}


		$this->aAttipayu = $v;
	}


	
	public function getAttipayu($con = null)
	{
		if ($this->aAttipayu === null && ($this->attipayu_id !== null)) {
						include_once 'lib/model/ciudadanos/om/BaseAttipayuPeer.php';

      $c = new Criteria();
      $c->add(AttipayuPeer::ID,$this->attipayu_id);
      
			$this->aAttipayu = AttipayuPeer::doSelectOne($c, $con);

			
		}
		return $this->aAttipayu;
	}

	
	public function setAtrecaud($v)
	{


		if ($v === null) {
			$this->setAtrecaudId(NULL);
		} else {
			$this->setAtrecaudId($v->getId());
		}


		$this->aAtrecaud = $v;
	}


	
	public function getAtrecaud($con = null)
	{
		if ($this->aAtrecaud === null && ($this->atrecaud_id !== null)) {
						include_once 'lib/model/ciudadanos/om/BaseAtrecaudPeer.php';

      $c = new Criteria();
      $c->add(AtrecaudPeer::ID,$this->atrecaud_id);
      
			$this->aAtrecaud = AtrecaudPeer::doSelectOne($c, $con);

			
		}
		return $this->aAtrecaud;
	}

} 