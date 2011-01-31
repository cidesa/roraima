<?php


abstract class BaseCcfreact extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $ccfreneco_id;


	
	protected $ccacteco_id;

	
	protected $aCcfreneco;

	
	protected $aCcacteco;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getCcfrenecoId()
  {

    return $this->ccfreneco_id;

  }
  
  public function getCcactecoId()
  {

    return $this->ccacteco_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcfreactPeer::ID;
      }
  
	} 
	
	public function setCcfrenecoId($v)
	{

    if ($this->ccfreneco_id !== $v) {
        $this->ccfreneco_id = $v;
        $this->modifiedColumns[] = CcfreactPeer::CCFRENECO_ID;
      }
  
		if ($this->aCcfreneco !== null && $this->aCcfreneco->getId() !== $v) {
			$this->aCcfreneco = null;
		}

	} 
	
	public function setCcactecoId($v)
	{

    if ($this->ccacteco_id !== $v) {
        $this->ccacteco_id = $v;
        $this->modifiedColumns[] = CcfreactPeer::CCACTECO_ID;
      }
  
		if ($this->aCcacteco !== null && $this->aCcacteco->getId() !== $v) {
			$this->aCcacteco = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->ccfreneco_id = $rs->getInt($startcol + 1);

      $this->ccacteco_id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccfreact object", $e);
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
			$con = Propel::getConnection(CcfreactPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcfreactPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcfreactPeer::DATABASE_NAME);
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


												
			if ($this->aCcfreneco !== null) {
				if ($this->aCcfreneco->isModified()) {
					$affectedRows += $this->aCcfreneco->save($con);
				}
				$this->setCcfreneco($this->aCcfreneco);
			}

			if ($this->aCcacteco !== null) {
				if ($this->aCcacteco->isModified()) {
					$affectedRows += $this->aCcacteco->save($con);
				}
				$this->setCcacteco($this->aCcacteco);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcfreactPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcfreactPeer::doUpdate($this, $con);
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


												
			if ($this->aCcfreneco !== null) {
				if (!$this->aCcfreneco->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcfreneco->getValidationFailures());
				}
			}

			if ($this->aCcacteco !== null) {
				if (!$this->aCcacteco->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcacteco->getValidationFailures());
				}
			}


			if (($retval = CcfreactPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcfreactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCcfrenecoId();
				break;
			case 2:
				return $this->getCcactecoId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcfreactPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCcfrenecoId(),
			$keys[2] => $this->getCcactecoId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcfreactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCcfrenecoId($value);
				break;
			case 2:
				$this->setCcactecoId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcfreactPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCcfrenecoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCcactecoId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcfreactPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcfreactPeer::ID)) $criteria->add(CcfreactPeer::ID, $this->id);
		if ($this->isColumnModified(CcfreactPeer::CCFRENECO_ID)) $criteria->add(CcfreactPeer::CCFRENECO_ID, $this->ccfreneco_id);
		if ($this->isColumnModified(CcfreactPeer::CCACTECO_ID)) $criteria->add(CcfreactPeer::CCACTECO_ID, $this->ccacteco_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcfreactPeer::DATABASE_NAME);

		$criteria->add(CcfreactPeer::ID, $this->id);

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

		$copyObj->setCcfrenecoId($this->ccfreneco_id);

		$copyObj->setCcactecoId($this->ccacteco_id);


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
			self::$peer = new CcfreactPeer();
		}
		return self::$peer;
	}

	
	public function setCcfreneco($v)
	{


		if ($v === null) {
			$this->setCcfrenecoId(NULL);
		} else {
			$this->setCcfrenecoId($v->getId());
		}


		$this->aCcfreneco = $v;
	}


	
	public function getCcfreneco($con = null)
	{
		if ($this->aCcfreneco === null && ($this->ccfreneco_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcfrenecoPeer.php';

      $c = new Criteria();
      $c->add(CcfrenecoPeer::ID,$this->ccfreneco_id);
      
			$this->aCcfreneco = CcfrenecoPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcfreneco;
	}

	
	public function setCcacteco($v)
	{


		if ($v === null) {
			$this->setCcactecoId(NULL);
		} else {
			$this->setCcactecoId($v->getId());
		}


		$this->aCcacteco = $v;
	}


	
	public function getCcacteco($con = null)
	{
		if ($this->aCcacteco === null && ($this->ccacteco_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcactecoPeer.php';

      $c = new Criteria();
      $c->add(CcactecoPeer::ID,$this->ccacteco_id);
      
			$this->aCcacteco = CcactecoPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcacteco;
	}

} 