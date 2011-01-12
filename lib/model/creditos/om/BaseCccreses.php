<?php


abstract class BaseCccreses extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $motivo;


	
	protected $obsres;


	
	protected $estatu;


	
	protected $cccredit_id;


	
	protected $ccsesion_id;

	
	protected $aCccredit;

	
	protected $aCcsesion;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getMotivo()
  {

    return trim($this->motivo);

  }
  
  public function getObsres()
  {

    return trim($this->obsres);

  }
  
  public function getEstatu()
  {

    return trim($this->estatu);

  }
  
  public function getCccreditId()
  {

    return $this->cccredit_id;

  }
  
  public function getCcsesionId()
  {

    return $this->ccsesion_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CccresesPeer::ID;
      }
  
	} 
	
	public function setMotivo($v)
	{

    if ($this->motivo !== $v) {
        $this->motivo = $v;
        $this->modifiedColumns[] = CccresesPeer::MOTIVO;
      }
  
	} 
	
	public function setObsres($v)
	{

    if ($this->obsres !== $v) {
        $this->obsres = $v;
        $this->modifiedColumns[] = CccresesPeer::OBSRES;
      }
  
	} 
	
	public function setEstatu($v)
	{

    if ($this->estatu !== $v) {
        $this->estatu = $v;
        $this->modifiedColumns[] = CccresesPeer::ESTATU;
      }
  
	} 
	
	public function setCccreditId($v)
	{

    if ($this->cccredit_id !== $v) {
        $this->cccredit_id = $v;
        $this->modifiedColumns[] = CccresesPeer::CCCREDIT_ID;
      }
  
		if ($this->aCccredit !== null && $this->aCccredit->getId() !== $v) {
			$this->aCccredit = null;
		}

	} 
	
	public function setCcsesionId($v)
	{

    if ($this->ccsesion_id !== $v) {
        $this->ccsesion_id = $v;
        $this->modifiedColumns[] = CccresesPeer::CCSESION_ID;
      }
  
		if ($this->aCcsesion !== null && $this->aCcsesion->getId() !== $v) {
			$this->aCcsesion = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->motivo = $rs->getString($startcol + 1);

      $this->obsres = $rs->getString($startcol + 2);

      $this->estatu = $rs->getString($startcol + 3);

      $this->cccredit_id = $rs->getInt($startcol + 4);

      $this->ccsesion_id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cccreses object", $e);
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
			$con = Propel::getConnection(CccresesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CccresesPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CccresesPeer::DATABASE_NAME);
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


												
			if ($this->aCccredit !== null) {
				if ($this->aCccredit->isModified()) {
					$affectedRows += $this->aCccredit->save($con);
				}
				$this->setCccredit($this->aCccredit);
			}

			if ($this->aCcsesion !== null) {
				if ($this->aCcsesion->isModified()) {
					$affectedRows += $this->aCcsesion->save($con);
				}
				$this->setCcsesion($this->aCcsesion);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CccresesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CccresesPeer::doUpdate($this, $con);
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


												
			if ($this->aCccredit !== null) {
				if (!$this->aCccredit->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccredit->getValidationFailures());
				}
			}

			if ($this->aCcsesion !== null) {
				if (!$this->aCcsesion->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcsesion->getValidationFailures());
				}
			}


			if (($retval = CccresesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CccresesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getMotivo();
				break;
			case 2:
				return $this->getObsres();
				break;
			case 3:
				return $this->getEstatu();
				break;
			case 4:
				return $this->getCccreditId();
				break;
			case 5:
				return $this->getCcsesionId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CccresesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getMotivo(),
			$keys[2] => $this->getObsres(),
			$keys[3] => $this->getEstatu(),
			$keys[4] => $this->getCccreditId(),
			$keys[5] => $this->getCcsesionId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CccresesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setMotivo($value);
				break;
			case 2:
				$this->setObsres($value);
				break;
			case 3:
				$this->setEstatu($value);
				break;
			case 4:
				$this->setCccreditId($value);
				break;
			case 5:
				$this->setCcsesionId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CccresesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMotivo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setObsres($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEstatu($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCccreditId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCcsesionId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CccresesPeer::DATABASE_NAME);

		if ($this->isColumnModified(CccresesPeer::ID)) $criteria->add(CccresesPeer::ID, $this->id);
		if ($this->isColumnModified(CccresesPeer::MOTIVO)) $criteria->add(CccresesPeer::MOTIVO, $this->motivo);
		if ($this->isColumnModified(CccresesPeer::OBSRES)) $criteria->add(CccresesPeer::OBSRES, $this->obsres);
		if ($this->isColumnModified(CccresesPeer::ESTATU)) $criteria->add(CccresesPeer::ESTATU, $this->estatu);
		if ($this->isColumnModified(CccresesPeer::CCCREDIT_ID)) $criteria->add(CccresesPeer::CCCREDIT_ID, $this->cccredit_id);
		if ($this->isColumnModified(CccresesPeer::CCSESION_ID)) $criteria->add(CccresesPeer::CCSESION_ID, $this->ccsesion_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CccresesPeer::DATABASE_NAME);

		$criteria->add(CccresesPeer::ID, $this->id);

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

		$copyObj->setMotivo($this->motivo);

		$copyObj->setObsres($this->obsres);

		$copyObj->setEstatu($this->estatu);

		$copyObj->setCccreditId($this->cccredit_id);

		$copyObj->setCcsesionId($this->ccsesion_id);


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
			self::$peer = new CccresesPeer();
		}
		return self::$peer;
	}

	
	public function setCccredit($v)
	{


		if ($v === null) {
			$this->setCccreditId(NULL);
		} else {
			$this->setCccreditId($v->getId());
		}


		$this->aCccredit = $v;
	}


	
	public function getCccredit($con = null)
	{
		if ($this->aCccredit === null && ($this->cccredit_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCccreditPeer.php';

      $c = new Criteria();
      $c->add(CccreditPeer::ID,$this->cccredit_id);
      
			$this->aCccredit = CccreditPeer::doSelectOne($c, $con);

			
		}
		return $this->aCccredit;
	}

	
	public function setCcsesion($v)
	{


		if ($v === null) {
			$this->setCcsesionId(NULL);
		} else {
			$this->setCcsesionId($v->getId());
		}


		$this->aCcsesion = $v;
	}


	
	public function getCcsesion($con = null)
	{
		if ($this->aCcsesion === null && ($this->ccsesion_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcsesionPeer.php';

      $c = new Criteria();
      $c->add(CcsesionPeer::ID,$this->ccsesion_id);
      
			$this->aCcsesion = CcsesionPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcsesion;
	}

} 