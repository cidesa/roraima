<?php


abstract class BaseAtdetrecrub extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $atrubros_id;


	
	protected $atrecaud_id;


	
	protected $requerido;


	
	protected $id;

	
	protected $aAtrubros;

	
	protected $aAtrecaud;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getAtrubrosId()
  {

    return $this->atrubros_id;

  }
  
  public function getAtrecaudId()
  {

    return $this->atrecaud_id;

  }
  
  public function getRequerido()
  {

    return trim($this->requerido);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setAtrubrosId($v)
	{

    if ($this->atrubros_id !== $v) {
        $this->atrubros_id = $v;
        $this->modifiedColumns[] = AtdetrecrubPeer::ATRUBROS_ID;
      }
  
		if ($this->aAtrubros !== null && $this->aAtrubros->getId() !== $v) {
			$this->aAtrubros = null;
		}

	} 
	
	public function setAtrecaudId($v)
	{

    if ($this->atrecaud_id !== $v) {
        $this->atrecaud_id = $v;
        $this->modifiedColumns[] = AtdetrecrubPeer::ATRECAUD_ID;
      }
  
		if ($this->aAtrecaud !== null && $this->aAtrecaud->getId() !== $v) {
			$this->aAtrecaud = null;
		}

	} 
	
	public function setRequerido($v)
	{

    if ($this->requerido !== $v) {
        $this->requerido = $v;
        $this->modifiedColumns[] = AtdetrecrubPeer::REQUERIDO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AtdetrecrubPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->atrubros_id = $rs->getInt($startcol + 0);

      $this->atrecaud_id = $rs->getInt($startcol + 1);

      $this->requerido = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Atdetrecrub object", $e);
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
			$con = Propel::getConnection(AtdetrecrubPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AtdetrecrubPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AtdetrecrubPeer::DATABASE_NAME);
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


												
			if ($this->aAtrubros !== null) {
				if ($this->aAtrubros->isModified()) {
					$affectedRows += $this->aAtrubros->save($con);
				}
				$this->setAtrubros($this->aAtrubros);
			}

			if ($this->aAtrecaud !== null) {
				if ($this->aAtrecaud->isModified()) {
					$affectedRows += $this->aAtrecaud->save($con);
				}
				$this->setAtrecaud($this->aAtrecaud);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AtdetrecrubPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AtdetrecrubPeer::doUpdate($this, $con);
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


												
			if ($this->aAtrubros !== null) {
				if (!$this->aAtrubros->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtrubros->getValidationFailures());
				}
			}

			if ($this->aAtrecaud !== null) {
				if (!$this->aAtrecaud->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtrecaud->getValidationFailures());
				}
			}


			if (($retval = AtdetrecrubPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtdetrecrubPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getAtrubrosId();
				break;
			case 1:
				return $this->getAtrecaudId();
				break;
			case 2:
				return $this->getRequerido();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtdetrecrubPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAtrubrosId(),
			$keys[1] => $this->getAtrecaudId(),
			$keys[2] => $this->getRequerido(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtdetrecrubPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setAtrubrosId($value);
				break;
			case 1:
				$this->setAtrecaudId($value);
				break;
			case 2:
				$this->setRequerido($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtdetrecrubPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAtrubrosId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAtrecaudId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRequerido($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AtdetrecrubPeer::DATABASE_NAME);

		if ($this->isColumnModified(AtdetrecrubPeer::ATRUBROS_ID)) $criteria->add(AtdetrecrubPeer::ATRUBROS_ID, $this->atrubros_id);
		if ($this->isColumnModified(AtdetrecrubPeer::ATRECAUD_ID)) $criteria->add(AtdetrecrubPeer::ATRECAUD_ID, $this->atrecaud_id);
		if ($this->isColumnModified(AtdetrecrubPeer::REQUERIDO)) $criteria->add(AtdetrecrubPeer::REQUERIDO, $this->requerido);
		if ($this->isColumnModified(AtdetrecrubPeer::ID)) $criteria->add(AtdetrecrubPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AtdetrecrubPeer::DATABASE_NAME);

		$criteria->add(AtdetrecrubPeer::ID, $this->id);

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

		$copyObj->setAtrubrosId($this->atrubros_id);

		$copyObj->setAtrecaudId($this->atrecaud_id);

		$copyObj->setRequerido($this->requerido);


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
			self::$peer = new AtdetrecrubPeer();
		}
		return self::$peer;
	}

	
	public function setAtrubros($v)
	{


		if ($v === null) {
			$this->setAtrubrosId(NULL);
		} else {
			$this->setAtrubrosId($v->getId());
		}


		$this->aAtrubros = $v;
	}


	
	public function getAtrubros($con = null)
	{
		if ($this->aAtrubros === null && ($this->atrubros_id !== null)) {
						include_once 'lib/model/ciudadanos/om/BaseAtrubrosPeer.php';

			$this->aAtrubros = AtrubrosPeer::retrieveByPK($this->atrubros_id, $con);

			
		}
		return $this->aAtrubros;
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

			$this->aAtrecaud = AtrecaudPeer::retrieveByPK($this->atrecaud_id, $con);

			
		}
		return $this->aAtrecaud;
	}

} 