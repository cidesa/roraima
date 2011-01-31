<?php


abstract class BaseLiasptecanalis extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $lireglic_id;


	
	protected $codlic;


	
	protected $codpro;


	
	protected $liaspteccrieva_id;


	
	protected $puntaje;


	
	protected $id;

	
	protected $aLireglic;

	
	protected $aLiaspteccrieva;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getLireglicId()
  {

    return $this->lireglic_id;

  }
  
  public function getCodlic()
  {

    return trim($this->codlic);

  }
  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getLiaspteccrievaId()
  {

    return $this->liaspteccrieva_id;

  }
  
  public function getPuntaje($val=false)
  {

    if($val) return number_format($this->puntaje,2,',','.');
    else return $this->puntaje;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setLireglicId($v)
	{

    if ($this->lireglic_id !== $v) {
        $this->lireglic_id = $v;
        $this->modifiedColumns[] = LiasptecanalisPeer::LIREGLIC_ID;
      }
  
		if ($this->aLireglic !== null && $this->aLireglic->getId() !== $v) {
			$this->aLireglic = null;
		}

	} 
	
	public function setCodlic($v)
	{

    if ($this->codlic !== $v) {
        $this->codlic = $v;
        $this->modifiedColumns[] = LiasptecanalisPeer::CODLIC;
      }
  
	} 
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = LiasptecanalisPeer::CODPRO;
      }
  
	} 
	
	public function setLiaspteccrievaId($v)
	{

    if ($this->liaspteccrieva_id !== $v) {
        $this->liaspteccrieva_id = $v;
        $this->modifiedColumns[] = LiasptecanalisPeer::LIASPTECCRIEVA_ID;
      }
  
		if ($this->aLiaspteccrieva !== null && $this->aLiaspteccrieva->getId() !== $v) {
			$this->aLiaspteccrieva = null;
		}

	} 
	
	public function setPuntaje($v)
	{

    if ($this->puntaje !== $v) {
        $this->puntaje = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiasptecanalisPeer::PUNTAJE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LiasptecanalisPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->lireglic_id = $rs->getInt($startcol + 0);

      $this->codlic = $rs->getString($startcol + 1);

      $this->codpro = $rs->getString($startcol + 2);

      $this->liaspteccrieva_id = $rs->getInt($startcol + 3);

      $this->puntaje = $rs->getFloat($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Liasptecanalis object", $e);
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
			$con = Propel::getConnection(LiasptecanalisPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LiasptecanalisPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LiasptecanalisPeer::DATABASE_NAME);
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


												
			if ($this->aLireglic !== null) {
				if ($this->aLireglic->isModified()) {
					$affectedRows += $this->aLireglic->save($con);
				}
				$this->setLireglic($this->aLireglic);
			}

			if ($this->aLiaspteccrieva !== null) {
				if ($this->aLiaspteccrieva->isModified()) {
					$affectedRows += $this->aLiaspteccrieva->save($con);
				}
				$this->setLiaspteccrieva($this->aLiaspteccrieva);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LiasptecanalisPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LiasptecanalisPeer::doUpdate($this, $con);
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


												
			if ($this->aLireglic !== null) {
				if (!$this->aLireglic->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLireglic->getValidationFailures());
				}
			}

			if ($this->aLiaspteccrieva !== null) {
				if (!$this->aLiaspteccrieva->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLiaspteccrieva->getValidationFailures());
				}
			}


			if (($retval = LiasptecanalisPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiasptecanalisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getLireglicId();
				break;
			case 1:
				return $this->getCodlic();
				break;
			case 2:
				return $this->getCodpro();
				break;
			case 3:
				return $this->getLiaspteccrievaId();
				break;
			case 4:
				return $this->getPuntaje();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiasptecanalisPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getLireglicId(),
			$keys[1] => $this->getCodlic(),
			$keys[2] => $this->getCodpro(),
			$keys[3] => $this->getLiaspteccrievaId(),
			$keys[4] => $this->getPuntaje(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiasptecanalisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setLireglicId($value);
				break;
			case 1:
				$this->setCodlic($value);
				break;
			case 2:
				$this->setCodpro($value);
				break;
			case 3:
				$this->setLiaspteccrievaId($value);
				break;
			case 4:
				$this->setPuntaje($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiasptecanalisPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setLireglicId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodlic($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodpro($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setLiaspteccrievaId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPuntaje($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LiasptecanalisPeer::DATABASE_NAME);

		if ($this->isColumnModified(LiasptecanalisPeer::LIREGLIC_ID)) $criteria->add(LiasptecanalisPeer::LIREGLIC_ID, $this->lireglic_id);
		if ($this->isColumnModified(LiasptecanalisPeer::CODLIC)) $criteria->add(LiasptecanalisPeer::CODLIC, $this->codlic);
		if ($this->isColumnModified(LiasptecanalisPeer::CODPRO)) $criteria->add(LiasptecanalisPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(LiasptecanalisPeer::LIASPTECCRIEVA_ID)) $criteria->add(LiasptecanalisPeer::LIASPTECCRIEVA_ID, $this->liaspteccrieva_id);
		if ($this->isColumnModified(LiasptecanalisPeer::PUNTAJE)) $criteria->add(LiasptecanalisPeer::PUNTAJE, $this->puntaje);
		if ($this->isColumnModified(LiasptecanalisPeer::ID)) $criteria->add(LiasptecanalisPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LiasptecanalisPeer::DATABASE_NAME);

		$criteria->add(LiasptecanalisPeer::ID, $this->id);

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

		$copyObj->setLireglicId($this->lireglic_id);

		$copyObj->setCodlic($this->codlic);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setLiaspteccrievaId($this->liaspteccrieva_id);

		$copyObj->setPuntaje($this->puntaje);


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
			self::$peer = new LiasptecanalisPeer();
		}
		return self::$peer;
	}

	
	public function setLireglic($v)
	{


		if ($v === null) {
			$this->setLireglicId(NULL);
		} else {
			$this->setLireglicId($v->getId());
		}


		$this->aLireglic = $v;
	}


	
	public function getLireglic($con = null)
	{
		if ($this->aLireglic === null && ($this->lireglic_id !== null)) {
						include_once 'lib/model/om/BaseLireglicPeer.php';

			$this->aLireglic = LireglicPeer::retrieveByPK($this->lireglic_id, $con);

			
		}
		return $this->aLireglic;
	}

	
	public function setLiaspteccrieva($v)
	{


		if ($v === null) {
			$this->setLiaspteccrievaId(NULL);
		} else {
			$this->setLiaspteccrievaId($v->getId());
		}


		$this->aLiaspteccrieva = $v;
	}


	
	public function getLiaspteccrieva($con = null)
	{
		if ($this->aLiaspteccrieva === null && ($this->liaspteccrieva_id !== null)) {
						include_once 'lib/model/om/BaseLiaspteccrievaPeer.php';

			$this->aLiaspteccrieva = LiaspteccrievaPeer::retrieveByPK($this->liaspteccrieva_id, $con);

			
		}
		return $this->aLiaspteccrieva;
	}

} 