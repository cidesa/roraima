<?php


abstract class BaseFaciudad extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $faestado_id;


	
	protected $nomciu;


	
	protected $id;

	
	protected $aFaestado;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getFaestadoId()
  {

    return $this->faestado_id;

  }
  
  public function getNomciu()
  {

    return trim($this->nomciu);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setFaestadoId($v)
	{

    if ($this->faestado_id !== $v) {
        $this->faestado_id = $v;
        $this->modifiedColumns[] = FaciudadPeer::FAESTADO_ID;
      }
  
		if ($this->aFaestado !== null && $this->aFaestado->getId() !== $v) {
			$this->aFaestado = null;
		}

	} 
	
	public function setNomciu($v)
	{

    if ($this->nomciu !== $v) {
        $this->nomciu = $v;
        $this->modifiedColumns[] = FaciudadPeer::NOMCIU;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FaciudadPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->faestado_id = $rs->getInt($startcol + 0);

      $this->nomciu = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Faciudad object", $e);
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
			$con = Propel::getConnection(FaciudadPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FaciudadPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FaciudadPeer::DATABASE_NAME);
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


												
			if ($this->aFaestado !== null) {
				if ($this->aFaestado->isModified()) {
					$affectedRows += $this->aFaestado->save($con);
				}
				$this->setFaestado($this->aFaestado);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FaciudadPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FaciudadPeer::doUpdate($this, $con);
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


												
			if ($this->aFaestado !== null) {
				if (!$this->aFaestado->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFaestado->getValidationFailures());
				}
			}


			if (($retval = FaciudadPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaciudadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getFaestadoId();
				break;
			case 1:
				return $this->getNomciu();
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
		$keys = FaciudadPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getFaestadoId(),
			$keys[1] => $this->getNomciu(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaciudadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setFaestadoId($value);
				break;
			case 1:
				$this->setNomciu($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaciudadPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setFaestadoId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomciu($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FaciudadPeer::DATABASE_NAME);

		if ($this->isColumnModified(FaciudadPeer::FAESTADO_ID)) $criteria->add(FaciudadPeer::FAESTADO_ID, $this->faestado_id);
		if ($this->isColumnModified(FaciudadPeer::NOMCIU)) $criteria->add(FaciudadPeer::NOMCIU, $this->nomciu);
		if ($this->isColumnModified(FaciudadPeer::ID)) $criteria->add(FaciudadPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FaciudadPeer::DATABASE_NAME);

		$criteria->add(FaciudadPeer::ID, $this->id);

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

		$copyObj->setFaestadoId($this->faestado_id);

		$copyObj->setNomciu($this->nomciu);


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
			self::$peer = new FaciudadPeer();
		}
		return self::$peer;
	}

	
	public function setFaestado($v)
	{


		if ($v === null) {
			$this->setFaestadoId(NULL);
		} else {
			$this->setFaestadoId($v->getId());
		}


		$this->aFaestado = $v;
	}


	
	public function getFaestado($con = null)
	{
		if ($this->aFaestado === null && ($this->faestado_id !== null)) {
						include_once 'lib/model/om/BaseFaestadoPeer.php';

			$this->aFaestado = FaestadoPeer::retrieveByPK($this->faestado_id, $con);

			
		}
		return $this->aFaestado;
	}

} 