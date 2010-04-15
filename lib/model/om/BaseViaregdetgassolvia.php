<?php


abstract class BaseViaregdetgassolvia extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $viaregdetsolvia_id;


	
	protected $viaregtipser_id;


	
	protected $detgasmont;


	
	protected $id;

	
	protected $aViaregdetsolvia;

	
	protected $aViaregtipser;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getViaregdetsolviaId()
  {

    return $this->viaregdetsolvia_id;

  }
  
  public function getViaregtipserId()
  {

    return $this->viaregtipser_id;

  }
  
  public function getDetgasmont($val=false)
  {

    if($val) return number_format($this->detgasmont,2,',','.');
    else return $this->detgasmont;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setViaregdetsolviaId($v)
	{

    if ($this->viaregdetsolvia_id !== $v) {
        $this->viaregdetsolvia_id = $v;
        $this->modifiedColumns[] = ViaregdetgassolviaPeer::VIAREGDETSOLVIA_ID;
      }
  
		if ($this->aViaregdetsolvia !== null && $this->aViaregdetsolvia->getId() !== $v) {
			$this->aViaregdetsolvia = null;
		}

	} 
	
	public function setViaregtipserId($v)
	{

    if ($this->viaregtipser_id !== $v) {
        $this->viaregtipser_id = $v;
        $this->modifiedColumns[] = ViaregdetgassolviaPeer::VIAREGTIPSER_ID;
      }
  
		if ($this->aViaregtipser !== null && $this->aViaregtipser->getId() !== $v) {
			$this->aViaregtipser = null;
		}

	} 
	
	public function setDetgasmont($v)
	{

    if ($this->detgasmont !== $v) {
        $this->detgasmont = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ViaregdetgassolviaPeer::DETGASMONT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ViaregdetgassolviaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->viaregdetsolvia_id = $rs->getInt($startcol + 0);

      $this->viaregtipser_id = $rs->getInt($startcol + 1);

      $this->detgasmont = $rs->getFloat($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Viaregdetgassolvia object", $e);
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
			$con = Propel::getConnection(ViaregdetgassolviaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ViaregdetgassolviaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ViaregdetgassolviaPeer::DATABASE_NAME);
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


												
			if ($this->aViaregdetsolvia !== null) {
				if ($this->aViaregdetsolvia->isModified()) {
					$affectedRows += $this->aViaregdetsolvia->save($con);
				}
				$this->setViaregdetsolvia($this->aViaregdetsolvia);
			}

			if ($this->aViaregtipser !== null) {
				if ($this->aViaregtipser->isModified()) {
					$affectedRows += $this->aViaregtipser->save($con);
				}
				$this->setViaregtipser($this->aViaregtipser);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ViaregdetgassolviaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ViaregdetgassolviaPeer::doUpdate($this, $con);
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


												
			if ($this->aViaregdetsolvia !== null) {
				if (!$this->aViaregdetsolvia->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aViaregdetsolvia->getValidationFailures());
				}
			}

			if ($this->aViaregtipser !== null) {
				if (!$this->aViaregtipser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aViaregtipser->getValidationFailures());
				}
			}


			if (($retval = ViaregdetgassolviaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViaregdetgassolviaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getViaregdetsolviaId();
				break;
			case 1:
				return $this->getViaregtipserId();
				break;
			case 2:
				return $this->getDetgasmont();
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
		$keys = ViaregdetgassolviaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getViaregdetsolviaId(),
			$keys[1] => $this->getViaregtipserId(),
			$keys[2] => $this->getDetgasmont(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViaregdetgassolviaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setViaregdetsolviaId($value);
				break;
			case 1:
				$this->setViaregtipserId($value);
				break;
			case 2:
				$this->setDetgasmont($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViaregdetgassolviaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setViaregdetsolviaId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setViaregtipserId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDetgasmont($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ViaregdetgassolviaPeer::DATABASE_NAME);

		if ($this->isColumnModified(ViaregdetgassolviaPeer::VIAREGDETSOLVIA_ID)) $criteria->add(ViaregdetgassolviaPeer::VIAREGDETSOLVIA_ID, $this->viaregdetsolvia_id);
		if ($this->isColumnModified(ViaregdetgassolviaPeer::VIAREGTIPSER_ID)) $criteria->add(ViaregdetgassolviaPeer::VIAREGTIPSER_ID, $this->viaregtipser_id);
		if ($this->isColumnModified(ViaregdetgassolviaPeer::DETGASMONT)) $criteria->add(ViaregdetgassolviaPeer::DETGASMONT, $this->detgasmont);
		if ($this->isColumnModified(ViaregdetgassolviaPeer::ID)) $criteria->add(ViaregdetgassolviaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ViaregdetgassolviaPeer::DATABASE_NAME);

		$criteria->add(ViaregdetgassolviaPeer::ID, $this->id);

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

		$copyObj->setViaregdetsolviaId($this->viaregdetsolvia_id);

		$copyObj->setViaregtipserId($this->viaregtipser_id);

		$copyObj->setDetgasmont($this->detgasmont);


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
			self::$peer = new ViaregdetgassolviaPeer();
		}
		return self::$peer;
	}

	
	public function setViaregdetsolvia($v)
	{


		if ($v === null) {
			$this->setViaregdetsolviaId(NULL);
		} else {
			$this->setViaregdetsolviaId($v->getId());
		}


		$this->aViaregdetsolvia = $v;
	}


	
	public function getViaregdetsolvia($con = null)
	{
		if ($this->aViaregdetsolvia === null && ($this->viaregdetsolvia_id !== null)) {
						include_once 'lib/model/om/BaseViaregdetsolviaPeer.php';

			$this->aViaregdetsolvia = ViaregdetsolviaPeer::retrieveByPK($this->viaregdetsolvia_id, $con);

			
		}
		return $this->aViaregdetsolvia;
	}

	
	public function setViaregtipser($v)
	{


		if ($v === null) {
			$this->setViaregtipserId(NULL);
		} else {
			$this->setViaregtipserId($v->getId());
		}


		$this->aViaregtipser = $v;
	}


	
	public function getViaregtipser($con = null)
	{
		if ($this->aViaregtipser === null && ($this->viaregtipser_id !== null)) {
						include_once 'lib/model/om/BaseViaregtipserPeer.php';

			$this->aViaregtipser = ViaregtipserPeer::retrieveByPK($this->viaregtipser_id, $con);

			
		}
		return $this->aViaregtipser;
	}

} 