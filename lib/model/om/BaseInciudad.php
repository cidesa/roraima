<?php


abstract class BaseInciudad extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $inpais_id;


	
	protected $inestado_id;


	
	protected $codciu;


	
	protected $nomciu;


	
	protected $id;

	
	protected $aInpais;

	
	protected $aInestado;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getInpaisId()
  {

    return $this->inpais_id;

  }
  
  public function getInestadoId()
  {

    return $this->inestado_id;

  }
  
  public function getCodciu()
  {

    return trim($this->codciu);

  }
  
  public function getNomciu()
  {

    return trim($this->nomciu);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setInpaisId($v)
	{

    if ($this->inpais_id !== $v) {
        $this->inpais_id = $v;
        $this->modifiedColumns[] = InciudadPeer::INPAIS_ID;
      }
  
		if ($this->aInpais !== null && $this->aInpais->getId() !== $v) {
			$this->aInpais = null;
		}

	} 
	
	public function setInestadoId($v)
	{

    if ($this->inestado_id !== $v) {
        $this->inestado_id = $v;
        $this->modifiedColumns[] = InciudadPeer::INESTADO_ID;
      }
  
		if ($this->aInestado !== null && $this->aInestado->getId() !== $v) {
			$this->aInestado = null;
		}

	} 
	
	public function setCodciu($v)
	{

    if ($this->codciu !== $v) {
        $this->codciu = $v;
        $this->modifiedColumns[] = InciudadPeer::CODCIU;
      }
  
	} 
	
	public function setNomciu($v)
	{

    if ($this->nomciu !== $v) {
        $this->nomciu = $v;
        $this->modifiedColumns[] = InciudadPeer::NOMCIU;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = InciudadPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->inpais_id = $rs->getInt($startcol + 0);

      $this->inestado_id = $rs->getInt($startcol + 1);

      $this->codciu = $rs->getString($startcol + 2);

      $this->nomciu = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Inciudad object", $e);
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
			$con = Propel::getConnection(InciudadPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			InciudadPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(InciudadPeer::DATABASE_NAME);
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


												
			if ($this->aInpais !== null) {
				if ($this->aInpais->isModified()) {
					$affectedRows += $this->aInpais->save($con);
				}
				$this->setInpais($this->aInpais);
			}

			if ($this->aInestado !== null) {
				if ($this->aInestado->isModified()) {
					$affectedRows += $this->aInestado->save($con);
				}
				$this->setInestado($this->aInestado);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = InciudadPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += InciudadPeer::doUpdate($this, $con);
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


												
			if ($this->aInpais !== null) {
				if (!$this->aInpais->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aInpais->getValidationFailures());
				}
			}

			if ($this->aInestado !== null) {
				if (!$this->aInestado->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aInestado->getValidationFailures());
				}
			}


			if (($retval = InciudadPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InciudadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getInpaisId();
				break;
			case 1:
				return $this->getInestadoId();
				break;
			case 2:
				return $this->getCodciu();
				break;
			case 3:
				return $this->getNomciu();
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
		$keys = InciudadPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getInpaisId(),
			$keys[1] => $this->getInestadoId(),
			$keys[2] => $this->getCodciu(),
			$keys[3] => $this->getNomciu(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InciudadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setInpaisId($value);
				break;
			case 1:
				$this->setInestadoId($value);
				break;
			case 2:
				$this->setCodciu($value);
				break;
			case 3:
				$this->setNomciu($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InciudadPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setInpaisId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setInestadoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodciu($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNomciu($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(InciudadPeer::DATABASE_NAME);

		if ($this->isColumnModified(InciudadPeer::INPAIS_ID)) $criteria->add(InciudadPeer::INPAIS_ID, $this->inpais_id);
		if ($this->isColumnModified(InciudadPeer::INESTADO_ID)) $criteria->add(InciudadPeer::INESTADO_ID, $this->inestado_id);
		if ($this->isColumnModified(InciudadPeer::CODCIU)) $criteria->add(InciudadPeer::CODCIU, $this->codciu);
		if ($this->isColumnModified(InciudadPeer::NOMCIU)) $criteria->add(InciudadPeer::NOMCIU, $this->nomciu);
		if ($this->isColumnModified(InciudadPeer::ID)) $criteria->add(InciudadPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(InciudadPeer::DATABASE_NAME);

		$criteria->add(InciudadPeer::ID, $this->id);

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

		$copyObj->setInpaisId($this->inpais_id);

		$copyObj->setInestadoId($this->inestado_id);

		$copyObj->setCodciu($this->codciu);

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
			self::$peer = new InciudadPeer();
		}
		return self::$peer;
	}

	
	public function setInpais($v)
	{


		if ($v === null) {
			$this->setInpaisId(NULL);
		} else {
			$this->setInpaisId($v->getId());
		}


		$this->aInpais = $v;
	}


	
	public function getInpais($con = null)
	{
		if ($this->aInpais === null && ($this->inpais_id !== null)) {
						include_once 'lib/model/om/BaseInpaisPeer.php';

			$this->aInpais = InpaisPeer::retrieveByPK($this->inpais_id, $con);

			
		}
		return $this->aInpais;
	}

	
	public function setInestado($v)
	{


		if ($v === null) {
			$this->setInestadoId(NULL);
		} else {
			$this->setInestadoId($v->getId());
		}


		$this->aInestado = $v;
	}


	
	public function getInestado($con = null)
	{
		if ($this->aInestado === null && ($this->inestado_id !== null)) {
						include_once 'lib/model/om/BaseInestadoPeer.php';

			$this->aInestado = InestadoPeer::retrieveByPK($this->inestado_id, $con);

			
		}
		return $this->aInestado;
	}

} 