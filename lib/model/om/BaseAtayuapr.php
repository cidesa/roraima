<?php


abstract class BaseAtayuapr extends BaseObject  implements Persistent {


  
  protected static $peer;


  
  protected $atdetayu_id;


  
  protected $cantidad;


  
  protected $id;

	
	protected $aAtdetayu;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getAtdetayuId()
  {

    return $this->atdetayu_id;

  }
  
  public function getCantidad()
  {

    return $this->cantidad;

  }
  
  public function getId()
  {

    return $this->id;

  }
  
  public function setAtdetayuId($v)
  {

    if ($this->atdetayu_id !== $v) {
      $this->atdetayu_id = $v;
      $this->modifiedColumns[] = AtayuaprPeer::ATDETAYU_ID;
    }

		if ($this->aAtdetayu !== null && $this->aAtdetayu->getId() !== $v) {
			$this->aAtdetayu = null;
		}

	} 
  
  public function setCantidad($v)
  {

    if ($this->cantidad !== $v) {
      $this->cantidad = $v;
      $this->modifiedColumns[] = AtayuaprPeer::CANTIDAD;
    }

	} 
  
  public function setId($v)
  {

    if ($this->id !== $v) {
      $this->id = $v;
      $this->modifiedColumns[] = AtayuaprPeer::ID;
    }

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->atdetayu_id = $rs->getInt($startcol + 0);

      $this->cantidad = $rs->getInt($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Atayuapr object", $e);
    }
  }

  
  public function __call($m, $a)
    {
      $prefijo = substr($m,0,3);
    $metodo = strtolower(substr($m,3));
        if($prefijo=='get'){
      if(isset($this->$metodo)) return $this->$metodo;
      else return '';
    }elseif($prefijo=='set'){
      if(isset($this->$metodo)) $this->$metodo = $A[0];
    }

    }

  
  public function delete($con = null)
  {
    if ($this->isDeleted()) {
      throw new PropelException("This object has already been deleted.");
    }

    if ($con === null) {
      $con = Propel::getConnection(AtayuaprPeer::DATABASE_NAME);
    }

    try {
      $con->begin();
      AtayuaprPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AtayuaprPeer::DATABASE_NAME);
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


												
			if ($this->aAtdetayu !== null) {
				if ($this->aAtdetayu->isModified()) {
					$affectedRows += $this->aAtdetayu->save($con);
				}
				$this->setAtdetayu($this->aAtdetayu);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AtayuaprPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AtayuaprPeer::doUpdate($this, $con);
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


												
			if ($this->aAtdetayu !== null) {
				if (!$this->aAtdetayu->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtdetayu->getValidationFailures());
				}
			}


			if (($retval = AtayuaprPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

  
  public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
  {
    $pos = AtayuaprPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
    return $this->getByPosition($pos);
  }

  
  public function getByPosition($pos)
  {
    switch($pos) {
      case 0:
        return $this->getAtdetayuId();
        break;
      case 1:
        return $this->getCantidad();
        break;
      case 2:
        return $this->getId();
        break;
      default:
        return null;
        break;
    }   }

  
  public function toArray($keyType = BasePeer::TYPE_PHPNAME)
  {
    $keys = AtayuaprPeer::getFieldNames($keyType);
    $result = array(
      $keys[0] => $this->getAtdetayuId(),
      $keys[1] => $this->getCantidad(),
      $keys[2] => $this->getId(),
    );
    return $result;
  }

  
  public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
  {
    $pos = AtayuaprPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
    return $this->setByPosition($pos, $value);
  }

  
  public function setByPosition($pos, $value)
  {
    switch($pos) {
      case 0:
        $this->setAtdetayuId($value);
        break;
      case 1:
        $this->setCantidad($value);
        break;
      case 2:
        $this->setId($value);
        break;
    }   }

  
  public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
  {
    $keys = AtayuaprPeer::getFieldNames($keyType);

    if (array_key_exists($keys[0], $arr)) $this->setAtdetayuId($arr[$keys[0]]);
    if (array_key_exists($keys[1], $arr)) $this->setCantidad($arr[$keys[1]]);
    if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
  }

  
  public function buildCriteria()
  {
    $criteria = new Criteria(AtayuaprPeer::DATABASE_NAME);

    if ($this->isColumnModified(AtayuaprPeer::ATDETAYU_ID)) $criteria->add(AtayuaprPeer::ATDETAYU_ID, $this->atdetayu_id);
    if ($this->isColumnModified(AtayuaprPeer::CANTIDAD)) $criteria->add(AtayuaprPeer::CANTIDAD, $this->cantidad);
    if ($this->isColumnModified(AtayuaprPeer::ID)) $criteria->add(AtayuaprPeer::ID, $this->id);

    return $criteria;
  }

  
  public function buildPkeyCriteria()
  {
    $criteria = new Criteria(AtayuaprPeer::DATABASE_NAME);

    $criteria->add(AtayuaprPeer::ID, $this->id);

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

		$copyObj->setAtdetayuId($this->atdetayu_id);

		$copyObj->setCantidad($this->cantidad);


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
      self::$peer = new AtayuaprPeer();
    }
    return self::$peer;
  }

	
	public function setAtdetayu($v)
	{


		if ($v === null) {
			$this->setAtdetayuId(NULL);
		} else {
			$this->setAtdetayuId($v->getId());
		}


		$this->aAtdetayu = $v;
	}


	
	public function getAtdetayu($con = null)
	{
				include_once 'lib/model/om/BaseAtdetayuPeer.php';

		if ($this->aAtdetayu === null && ($this->atdetayu_id !== null)) {

			$this->aAtdetayu = AtdetayuPeer::retrieveByPK($this->atdetayu_id, $con);

			
		}
		return $this->aAtdetayu;
	}

} 