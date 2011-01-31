<?php


abstract class BaseViaregcartab extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $viaregtiptab_id;


	
	protected $codcar;


	
	protected $id;

	
	protected $aViaregtiptab;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getViaregtiptabId()
  {

    return $this->viaregtiptab_id;

  }
  
  public function getCodcar()
  {

    return trim($this->codcar);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setViaregtiptabId($v)
	{

    if ($this->viaregtiptab_id !== $v) {
        $this->viaregtiptab_id = $v;
        $this->modifiedColumns[] = ViaregcartabPeer::VIAREGTIPTAB_ID;
      }
  
		if ($this->aViaregtiptab !== null && $this->aViaregtiptab->getId() !== $v) {
			$this->aViaregtiptab = null;
		}

	} 
	
	public function setCodcar($v)
	{

    if ($this->codcar !== $v) {
        $this->codcar = $v;
        $this->modifiedColumns[] = ViaregcartabPeer::CODCAR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ViaregcartabPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->viaregtiptab_id = $rs->getInt($startcol + 0);

      $this->codcar = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Viaregcartab object", $e);
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
			$con = Propel::getConnection(ViaregcartabPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ViaregcartabPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ViaregcartabPeer::DATABASE_NAME);
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


												
			if ($this->aViaregtiptab !== null) {
				if ($this->aViaregtiptab->isModified()) {
					$affectedRows += $this->aViaregtiptab->save($con);
				}
				$this->setViaregtiptab($this->aViaregtiptab);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ViaregcartabPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ViaregcartabPeer::doUpdate($this, $con);
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


												
			if ($this->aViaregtiptab !== null) {
				if (!$this->aViaregtiptab->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aViaregtiptab->getValidationFailures());
				}
			}


			if (($retval = ViaregcartabPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViaregcartabPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getViaregtiptabId();
				break;
			case 1:
				return $this->getCodcar();
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
		$keys = ViaregcartabPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getViaregtiptabId(),
			$keys[1] => $this->getCodcar(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViaregcartabPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setViaregtiptabId($value);
				break;
			case 1:
				$this->setCodcar($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViaregcartabPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setViaregtiptabId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ViaregcartabPeer::DATABASE_NAME);

		if ($this->isColumnModified(ViaregcartabPeer::VIAREGTIPTAB_ID)) $criteria->add(ViaregcartabPeer::VIAREGTIPTAB_ID, $this->viaregtiptab_id);
		if ($this->isColumnModified(ViaregcartabPeer::CODCAR)) $criteria->add(ViaregcartabPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(ViaregcartabPeer::ID)) $criteria->add(ViaregcartabPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ViaregcartabPeer::DATABASE_NAME);

		$criteria->add(ViaregcartabPeer::ID, $this->id);

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

		$copyObj->setViaregtiptabId($this->viaregtiptab_id);

		$copyObj->setCodcar($this->codcar);


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
			self::$peer = new ViaregcartabPeer();
		}
		return self::$peer;
	}

	
	public function setViaregtiptab($v)
	{


		if ($v === null) {
			$this->setViaregtiptabId(NULL);
		} else {
			$this->setViaregtiptabId($v->getId());
		}


		$this->aViaregtiptab = $v;
	}


	
	public function getViaregtiptab($con = null)
	{
		if ($this->aViaregtiptab === null && ($this->viaregtiptab_id !== null)) {
						include_once 'lib/model/om/BaseViaregtiptabPeer.php';

			$this->aViaregtiptab = ViaregtiptabPeer::retrieveByPK($this->viaregtiptab_id, $con);

			
		}
		return $this->aViaregtiptab;
	}

} 