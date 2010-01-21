<?php


abstract class BaseCcsolses extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $motivo;


	
	protected $obsres;


	
	protected $estatu;


	
	protected $ccsolici_id;


	
	protected $ccsesion_id;

	
	protected $aCcsolici;

	
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
  
  public function getCcsoliciId()
  {

    return $this->ccsolici_id;

  }
  
  public function getCcsesionId()
  {

    return $this->ccsesion_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcsolsesPeer::ID;
      }
  
	} 
	
	public function setMotivo($v)
	{

    if ($this->motivo !== $v) {
        $this->motivo = $v;
        $this->modifiedColumns[] = CcsolsesPeer::MOTIVO;
      }
  
	} 
	
	public function setObsres($v)
	{

    if ($this->obsres !== $v) {
        $this->obsres = $v;
        $this->modifiedColumns[] = CcsolsesPeer::OBSRES;
      }
  
	} 
	
	public function setEstatu($v)
	{

    if ($this->estatu !== $v) {
        $this->estatu = $v;
        $this->modifiedColumns[] = CcsolsesPeer::ESTATU;
      }
  
	} 
	
	public function setCcsoliciId($v)
	{

    if ($this->ccsolici_id !== $v) {
        $this->ccsolici_id = $v;
        $this->modifiedColumns[] = CcsolsesPeer::CCSOLICI_ID;
      }
  
		if ($this->aCcsolici !== null && $this->aCcsolici->getId() !== $v) {
			$this->aCcsolici = null;
		}

	} 
	
	public function setCcsesionId($v)
	{

    if ($this->ccsesion_id !== $v) {
        $this->ccsesion_id = $v;
        $this->modifiedColumns[] = CcsolsesPeer::CCSESION_ID;
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

      $this->ccsolici_id = $rs->getInt($startcol + 4);

      $this->ccsesion_id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccsolses object", $e);
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
			$con = Propel::getConnection(CcsolsesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcsolsesPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcsolsesPeer::DATABASE_NAME);
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


												
			if ($this->aCcsolici !== null) {
				if ($this->aCcsolici->isModified()) {
					$affectedRows += $this->aCcsolici->save($con);
				}
				$this->setCcsolici($this->aCcsolici);
			}

			if ($this->aCcsesion !== null) {
				if ($this->aCcsesion->isModified()) {
					$affectedRows += $this->aCcsesion->save($con);
				}
				$this->setCcsesion($this->aCcsesion);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcsolsesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcsolsesPeer::doUpdate($this, $con);
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


												
			if ($this->aCcsolici !== null) {
				if (!$this->aCcsolici->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcsolici->getValidationFailures());
				}
			}

			if ($this->aCcsesion !== null) {
				if (!$this->aCcsesion->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcsesion->getValidationFailures());
				}
			}


			if (($retval = CcsolsesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcsolsesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCcsoliciId();
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
		$keys = CcsolsesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getMotivo(),
			$keys[2] => $this->getObsres(),
			$keys[3] => $this->getEstatu(),
			$keys[4] => $this->getCcsoliciId(),
			$keys[5] => $this->getCcsesionId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcsolsesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCcsoliciId($value);
				break;
			case 5:
				$this->setCcsesionId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcsolsesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMotivo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setObsres($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEstatu($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCcsoliciId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCcsesionId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcsolsesPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcsolsesPeer::ID)) $criteria->add(CcsolsesPeer::ID, $this->id);
		if ($this->isColumnModified(CcsolsesPeer::MOTIVO)) $criteria->add(CcsolsesPeer::MOTIVO, $this->motivo);
		if ($this->isColumnModified(CcsolsesPeer::OBSRES)) $criteria->add(CcsolsesPeer::OBSRES, $this->obsres);
		if ($this->isColumnModified(CcsolsesPeer::ESTATU)) $criteria->add(CcsolsesPeer::ESTATU, $this->estatu);
		if ($this->isColumnModified(CcsolsesPeer::CCSOLICI_ID)) $criteria->add(CcsolsesPeer::CCSOLICI_ID, $this->ccsolici_id);
		if ($this->isColumnModified(CcsolsesPeer::CCSESION_ID)) $criteria->add(CcsolsesPeer::CCSESION_ID, $this->ccsesion_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcsolsesPeer::DATABASE_NAME);

		$criteria->add(CcsolsesPeer::ID, $this->id);

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

		$copyObj->setCcsoliciId($this->ccsolici_id);

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
			self::$peer = new CcsolsesPeer();
		}
		return self::$peer;
	}

	
	public function setCcsolici($v)
	{


		if ($v === null) {
			$this->setCcsoliciId(NULL);
		} else {
			$this->setCcsoliciId($v->getId());
		}


		$this->aCcsolici = $v;
	}


	
	public function getCcsolici($con = null)
	{
		if ($this->aCcsolici === null && ($this->ccsolici_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';

      $c = new Criteria();
      $c->add(CcsoliciPeer::ID,$this->ccsolici_id);
      
			$this->aCcsolici = CcsoliciPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcsolici;
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