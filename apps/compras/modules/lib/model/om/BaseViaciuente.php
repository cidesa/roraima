<?php


abstract class BaseViaciuente extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $occiudad_id;


	
	protected $viaregente_id;


	
	protected $id;

	
	protected $aOcciudad;

	
	protected $aViaregente;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getOcciudadId()
  {

    return $this->occiudad_id;

  }
  
  public function getViaregenteId()
  {

    return $this->viaregente_id;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setOcciudadId($v)
	{

    if ($this->occiudad_id !== $v) {
        $this->occiudad_id = $v;
        $this->modifiedColumns[] = ViaciuentePeer::OCCIUDAD_ID;
      }
  
		if ($this->aOcciudad !== null && $this->aOcciudad->getId() !== $v) {
			$this->aOcciudad = null;
		}

	} 
	
	public function setViaregenteId($v)
	{

    if ($this->viaregente_id !== $v) {
        $this->viaregente_id = $v;
        $this->modifiedColumns[] = ViaciuentePeer::VIAREGENTE_ID;
      }
  
		if ($this->aViaregente !== null && $this->aViaregente->getId() !== $v) {
			$this->aViaregente = null;
		}

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ViaciuentePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->occiudad_id = $rs->getInt($startcol + 0);

      $this->viaregente_id = $rs->getInt($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Viaciuente object", $e);
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
			$con = Propel::getConnection(ViaciuentePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ViaciuentePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ViaciuentePeer::DATABASE_NAME);
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


												
			if ($this->aOcciudad !== null) {
				if ($this->aOcciudad->isModified()) {
					$affectedRows += $this->aOcciudad->save($con);
				}
				$this->setOcciudad($this->aOcciudad);
			}

			if ($this->aViaregente !== null) {
				if ($this->aViaregente->isModified()) {
					$affectedRows += $this->aViaregente->save($con);
				}
				$this->setViaregente($this->aViaregente);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ViaciuentePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ViaciuentePeer::doUpdate($this, $con);
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


												
			if ($this->aOcciudad !== null) {
				if (!$this->aOcciudad->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aOcciudad->getValidationFailures());
				}
			}

			if ($this->aViaregente !== null) {
				if (!$this->aViaregente->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aViaregente->getValidationFailures());
				}
			}


			if (($retval = ViaciuentePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViaciuentePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getOcciudadId();
				break;
			case 1:
				return $this->getViaregenteId();
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
		$keys = ViaciuentePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getOcciudadId(),
			$keys[1] => $this->getViaregenteId(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViaciuentePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setOcciudadId($value);
				break;
			case 1:
				$this->setViaregenteId($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViaciuentePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setOcciudadId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setViaregenteId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ViaciuentePeer::DATABASE_NAME);

		if ($this->isColumnModified(ViaciuentePeer::OCCIUDAD_ID)) $criteria->add(ViaciuentePeer::OCCIUDAD_ID, $this->occiudad_id);
		if ($this->isColumnModified(ViaciuentePeer::VIAREGENTE_ID)) $criteria->add(ViaciuentePeer::VIAREGENTE_ID, $this->viaregente_id);
		if ($this->isColumnModified(ViaciuentePeer::ID)) $criteria->add(ViaciuentePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ViaciuentePeer::DATABASE_NAME);

		$criteria->add(ViaciuentePeer::ID, $this->id);

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

		$copyObj->setOcciudadId($this->occiudad_id);

		$copyObj->setViaregenteId($this->viaregente_id);


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
			self::$peer = new ViaciuentePeer();
		}
		return self::$peer;
	}

	
	public function setOcciudad($v)
	{


		if ($v === null) {
			$this->setOcciudadId(NULL);
		} else {
			$this->setOcciudadId($v->getId());
		}


		$this->aOcciudad = $v;
	}


	
	public function getOcciudad($con = null)
	{
		if ($this->aOcciudad === null && ($this->occiudad_id !== null)) {
						include_once 'lib/model/om/BaseOcciudadPeer.php';

			$this->aOcciudad = OcciudadPeer::retrieveByPK($this->occiudad_id, $con);

			
		}
		return $this->aOcciudad;
	}

	
	public function setViaregente($v)
	{


		if ($v === null) {
			$this->setViaregenteId(NULL);
		} else {
			$this->setViaregenteId($v->getId());
		}


		$this->aViaregente = $v;
	}


	
	public function getViaregente($con = null)
	{
		if ($this->aViaregente === null && ($this->viaregente_id !== null)) {
						include_once 'lib/model/om/BaseViaregentePeer.php';

			$this->aViaregente = ViaregentePeer::retrieveByPK($this->viaregente_id, $con);

			
		}
		return $this->aViaregente;
	}

} 