<?php


abstract class BaseInmulta extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $insancion_id;


	
	protected $codmul;


	
	protected $desmul;


	
	protected $unitri;


	
	protected $id;

	
	protected $aInsancion;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getInsancionId()
  {

    return $this->insancion_id;

  }
  
  public function getCodmul()
  {

    return trim($this->codmul);

  }
  
  public function getDesmul()
  {

    return trim($this->desmul);

  }
  
  public function getUnitri($val=false)
  {

    if($val) return number_format($this->unitri,2,',','.');
    else return $this->unitri;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setInsancionId($v)
	{

    if ($this->insancion_id !== $v) {
        $this->insancion_id = $v;
        $this->modifiedColumns[] = InmultaPeer::INSANCION_ID;
      }
  
		if ($this->aInsancion !== null && $this->aInsancion->getId() !== $v) {
			$this->aInsancion = null;
		}

	} 
	
	public function setCodmul($v)
	{

    if ($this->codmul !== $v) {
        $this->codmul = $v;
        $this->modifiedColumns[] = InmultaPeer::CODMUL;
      }
  
	} 
	
	public function setDesmul($v)
	{

    if ($this->desmul !== $v) {
        $this->desmul = $v;
        $this->modifiedColumns[] = InmultaPeer::DESMUL;
      }
  
	} 
	
	public function setUnitri($v)
	{

    if ($this->unitri !== $v) {
        $this->unitri = Herramientas::toFloat($v);
        $this->modifiedColumns[] = InmultaPeer::UNITRI;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = InmultaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->insancion_id = $rs->getInt($startcol + 0);

      $this->codmul = $rs->getString($startcol + 1);

      $this->desmul = $rs->getString($startcol + 2);

      $this->unitri = $rs->getFloat($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Inmulta object", $e);
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
			$con = Propel::getConnection(InmultaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			InmultaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(InmultaPeer::DATABASE_NAME);
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


												
			if ($this->aInsancion !== null) {
				if ($this->aInsancion->isModified()) {
					$affectedRows += $this->aInsancion->save($con);
				}
				$this->setInsancion($this->aInsancion);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = InmultaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += InmultaPeer::doUpdate($this, $con);
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


												
			if ($this->aInsancion !== null) {
				if (!$this->aInsancion->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aInsancion->getValidationFailures());
				}
			}


			if (($retval = InmultaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InmultaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getInsancionId();
				break;
			case 1:
				return $this->getCodmul();
				break;
			case 2:
				return $this->getDesmul();
				break;
			case 3:
				return $this->getUnitri();
				break;
			case 4:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InmultaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getInsancionId(),
			$keys[1] => $this->getCodmul(),
			$keys[2] => $this->getDesmul(),
			$keys[3] => $this->getUnitri(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InmultaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setInsancionId($value);
				break;
			case 1:
				$this->setCodmul($value);
				break;
			case 2:
				$this->setDesmul($value);
				break;
			case 3:
				$this->setUnitri($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InmultaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setInsancionId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodmul($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesmul($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUnitri($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(InmultaPeer::DATABASE_NAME);

		if ($this->isColumnModified(InmultaPeer::INSANCION_ID)) $criteria->add(InmultaPeer::INSANCION_ID, $this->insancion_id);
		if ($this->isColumnModified(InmultaPeer::CODMUL)) $criteria->add(InmultaPeer::CODMUL, $this->codmul);
		if ($this->isColumnModified(InmultaPeer::DESMUL)) $criteria->add(InmultaPeer::DESMUL, $this->desmul);
		if ($this->isColumnModified(InmultaPeer::UNITRI)) $criteria->add(InmultaPeer::UNITRI, $this->unitri);
		if ($this->isColumnModified(InmultaPeer::ID)) $criteria->add(InmultaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(InmultaPeer::DATABASE_NAME);

		$criteria->add(InmultaPeer::ID, $this->id);

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

		$copyObj->setInsancionId($this->insancion_id);

		$copyObj->setCodmul($this->codmul);

		$copyObj->setDesmul($this->desmul);

		$copyObj->setUnitri($this->unitri);


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
			self::$peer = new InmultaPeer();
		}
		return self::$peer;
	}

	
	public function setInsancion($v)
	{


		if ($v === null) {
			$this->setInsancionId(NULL);
		} else {
			$this->setInsancionId($v->getId());
		}


		$this->aInsancion = $v;
	}


	
	public function getInsancion($con = null)
	{
		if ($this->aInsancion === null && ($this->insancion_id !== null)) {
						include_once 'lib/model/om/BaseInsancionPeer.php';

			$this->aInsancion = InsancionPeer::retrieveByPK($this->insancion_id, $con);

			
		}
		return $this->aInsancion;
	}

} 