<?php


abstract class BaseIndetfac extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $infactura_id;


	
	protected $inarticulo_id;


	
	protected $canart;


	
	protected $id;

	
	protected $aInfactura;

	
	protected $aInarticulo;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getInfacturaId()
  {

    return $this->infactura_id;

  }
  
  public function getInarticuloId()
  {

    return $this->inarticulo_id;

  }
  
  public function getCanart()
  {

    return $this->canart;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setInfacturaId($v)
	{

    if ($this->infactura_id !== $v) {
        $this->infactura_id = $v;
        $this->modifiedColumns[] = IndetfacPeer::INFACTURA_ID;
      }
  
		if ($this->aInfactura !== null && $this->aInfactura->getId() !== $v) {
			$this->aInfactura = null;
		}

	} 
	
	public function setInarticuloId($v)
	{

    if ($this->inarticulo_id !== $v) {
        $this->inarticulo_id = $v;
        $this->modifiedColumns[] = IndetfacPeer::INARTICULO_ID;
      }
  
		if ($this->aInarticulo !== null && $this->aInarticulo->getId() !== $v) {
			$this->aInarticulo = null;
		}

	} 
	
	public function setCanart($v)
	{

    if ($this->canart !== $v) {
        $this->canart = $v;
        $this->modifiedColumns[] = IndetfacPeer::CANART;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = IndetfacPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->infactura_id = $rs->getInt($startcol + 0);

      $this->inarticulo_id = $rs->getInt($startcol + 1);

      $this->canart = $rs->getInt($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Indetfac object", $e);
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
			$con = Propel::getConnection(IndetfacPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			IndetfacPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(IndetfacPeer::DATABASE_NAME);
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


												
			if ($this->aInfactura !== null) {
				if ($this->aInfactura->isModified()) {
					$affectedRows += $this->aInfactura->save($con);
				}
				$this->setInfactura($this->aInfactura);
			}

			if ($this->aInarticulo !== null) {
				if ($this->aInarticulo->isModified()) {
					$affectedRows += $this->aInarticulo->save($con);
				}
				$this->setInarticulo($this->aInarticulo);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = IndetfacPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += IndetfacPeer::doUpdate($this, $con);
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


												
			if ($this->aInfactura !== null) {
				if (!$this->aInfactura->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aInfactura->getValidationFailures());
				}
			}

			if ($this->aInarticulo !== null) {
				if (!$this->aInarticulo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aInarticulo->getValidationFailures());
				}
			}


			if (($retval = IndetfacPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = IndetfacPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getInfacturaId();
				break;
			case 1:
				return $this->getInarticuloId();
				break;
			case 2:
				return $this->getCanart();
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
		$keys = IndetfacPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getInfacturaId(),
			$keys[1] => $this->getInarticuloId(),
			$keys[2] => $this->getCanart(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = IndetfacPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setInfacturaId($value);
				break;
			case 1:
				$this->setInarticuloId($value);
				break;
			case 2:
				$this->setCanart($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = IndetfacPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setInfacturaId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setInarticuloId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCanart($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(IndetfacPeer::DATABASE_NAME);

		if ($this->isColumnModified(IndetfacPeer::INFACTURA_ID)) $criteria->add(IndetfacPeer::INFACTURA_ID, $this->infactura_id);
		if ($this->isColumnModified(IndetfacPeer::INARTICULO_ID)) $criteria->add(IndetfacPeer::INARTICULO_ID, $this->inarticulo_id);
		if ($this->isColumnModified(IndetfacPeer::CANART)) $criteria->add(IndetfacPeer::CANART, $this->canart);
		if ($this->isColumnModified(IndetfacPeer::ID)) $criteria->add(IndetfacPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(IndetfacPeer::DATABASE_NAME);

		$criteria->add(IndetfacPeer::ID, $this->id);

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

		$copyObj->setInfacturaId($this->infactura_id);

		$copyObj->setInarticuloId($this->inarticulo_id);

		$copyObj->setCanart($this->canart);


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
			self::$peer = new IndetfacPeer();
		}
		return self::$peer;
	}

	
	public function setInfactura($v)
	{


		if ($v === null) {
			$this->setInfacturaId(NULL);
		} else {
			$this->setInfacturaId($v->getId());
		}


		$this->aInfactura = $v;
	}


	
	public function getInfactura($con = null)
	{
		if ($this->aInfactura === null && ($this->infactura_id !== null)) {
						include_once 'lib/model/om/BaseInfacturaPeer.php';

			$this->aInfactura = InfacturaPeer::retrieveByPK($this->infactura_id, $con);

			
		}
		return $this->aInfactura;
	}

	
	public function setInarticulo($v)
	{


		if ($v === null) {
			$this->setInarticuloId(NULL);
		} else {
			$this->setInarticuloId($v->getId());
		}


		$this->aInarticulo = $v;
	}


	
	public function getInarticulo($con = null)
	{
		if ($this->aInarticulo === null && ($this->inarticulo_id !== null)) {
						include_once 'lib/model/om/BaseInarticuloPeer.php';

			$this->aInarticulo = InarticuloPeer::retrieveByPK($this->inarticulo_id, $con);

			
		}
		return $this->aInarticulo;
	}

} 