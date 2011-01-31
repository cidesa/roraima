<?php


abstract class BaseCcsinies extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $descripcion;


	
	protected $ccpoliza_id;

	
	protected $aCcpoliza;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getDescripcion()
  {

    return trim($this->descripcion);

  }
  
  public function getCcpolizaId()
  {

    return $this->ccpoliza_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcsiniesPeer::ID;
      }
  
	} 
	
	public function setDescripcion($v)
	{

    if ($this->descripcion !== $v) {
        $this->descripcion = $v;
        $this->modifiedColumns[] = CcsiniesPeer::DESCRIPCION;
      }
  
	} 
	
	public function setCcpolizaId($v)
	{

    if ($this->ccpoliza_id !== $v) {
        $this->ccpoliza_id = $v;
        $this->modifiedColumns[] = CcsiniesPeer::CCPOLIZA_ID;
      }
  
		if ($this->aCcpoliza !== null && $this->aCcpoliza->getId() !== $v) {
			$this->aCcpoliza = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->descripcion = $rs->getString($startcol + 1);

      $this->ccpoliza_id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccsinies object", $e);
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
			$con = Propel::getConnection(CcsiniesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcsiniesPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcsiniesPeer::DATABASE_NAME);
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


												
			if ($this->aCcpoliza !== null) {
				if ($this->aCcpoliza->isModified()) {
					$affectedRows += $this->aCcpoliza->save($con);
				}
				$this->setCcpoliza($this->aCcpoliza);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcsiniesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcsiniesPeer::doUpdate($this, $con);
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


												
			if ($this->aCcpoliza !== null) {
				if (!$this->aCcpoliza->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcpoliza->getValidationFailures());
				}
			}


			if (($retval = CcsiniesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcsiniesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getDescripcion();
				break;
			case 2:
				return $this->getCcpolizaId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcsiniesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getDescripcion(),
			$keys[2] => $this->getCcpolizaId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcsiniesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setDescripcion($value);
				break;
			case 2:
				$this->setCcpolizaId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcsiniesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescripcion($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCcpolizaId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcsiniesPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcsiniesPeer::ID)) $criteria->add(CcsiniesPeer::ID, $this->id);
		if ($this->isColumnModified(CcsiniesPeer::DESCRIPCION)) $criteria->add(CcsiniesPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(CcsiniesPeer::CCPOLIZA_ID)) $criteria->add(CcsiniesPeer::CCPOLIZA_ID, $this->ccpoliza_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcsiniesPeer::DATABASE_NAME);

		$criteria->add(CcsiniesPeer::ID, $this->id);

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

		$copyObj->setDescripcion($this->descripcion);

		$copyObj->setCcpolizaId($this->ccpoliza_id);


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
			self::$peer = new CcsiniesPeer();
		}
		return self::$peer;
	}

	
	public function setCcpoliza($v)
	{


		if ($v === null) {
			$this->setCcpolizaId(NULL);
		} else {
			$this->setCcpolizaId($v->getId());
		}


		$this->aCcpoliza = $v;
	}


	
	public function getCcpoliza($con = null)
	{
		if ($this->aCcpoliza === null && ($this->ccpoliza_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcpolizaPeer.php';

      $c = new Criteria();
      $c->add(CcpolizaPeer::ID,$this->ccpoliza_id);
      
			$this->aCcpoliza = CcpolizaPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcpoliza;
	}

} 