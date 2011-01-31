<?php


abstract class BaseLiemppar extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $lireglic_id;


	
	protected $codlic;


	
	protected $codpro;


	
	protected $fecins;


	
	protected $observaciones;


	
	protected $id;

	
	protected $aLireglic;

	
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
  
  public function getFecins($format = 'Y-m-d')
  {

    if ($this->fecins === null || $this->fecins === '') {
      return null;
    } elseif (!is_int($this->fecins)) {
            $ts = adodb_strtotime($this->fecins);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecins] as date/time value: " . var_export($this->fecins, true));
      }
    } else {
      $ts = $this->fecins;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getObservaciones()
  {

    return trim($this->observaciones);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setLireglicId($v)
	{

    if ($this->lireglic_id !== $v) {
        $this->lireglic_id = $v;
        $this->modifiedColumns[] = LiempparPeer::LIREGLIC_ID;
      }
  
		if ($this->aLireglic !== null && $this->aLireglic->getId() !== $v) {
			$this->aLireglic = null;
		}

	} 
	
	public function setCodlic($v)
	{

    if ($this->codlic !== $v) {
        $this->codlic = $v;
        $this->modifiedColumns[] = LiempparPeer::CODLIC;
      }
  
	} 
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = LiempparPeer::CODPRO;
      }
  
	} 
	
	public function setFecins($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecins] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecins !== $ts) {
      $this->fecins = $ts;
      $this->modifiedColumns[] = LiempparPeer::FECINS;
    }

	} 
	
	public function setObservaciones($v)
	{

    if ($this->observaciones !== $v) {
        $this->observaciones = $v;
        $this->modifiedColumns[] = LiempparPeer::OBSERVACIONES;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LiempparPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->lireglic_id = $rs->getInt($startcol + 0);

      $this->codlic = $rs->getString($startcol + 1);

      $this->codpro = $rs->getString($startcol + 2);

      $this->fecins = $rs->getDate($startcol + 3, null);

      $this->observaciones = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Liemppar object", $e);
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
			$con = Propel::getConnection(LiempparPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LiempparPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LiempparPeer::DATABASE_NAME);
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LiempparPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LiempparPeer::doUpdate($this, $con);
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


			if (($retval = LiempparPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiempparPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFecins();
				break;
			case 4:
				return $this->getObservaciones();
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
		$keys = LiempparPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getLireglicId(),
			$keys[1] => $this->getCodlic(),
			$keys[2] => $this->getCodpro(),
			$keys[3] => $this->getFecins(),
			$keys[4] => $this->getObservaciones(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiempparPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setFecins($value);
				break;
			case 4:
				$this->setObservaciones($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiempparPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setLireglicId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodlic($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodpro($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecins($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setObservaciones($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LiempparPeer::DATABASE_NAME);

		if ($this->isColumnModified(LiempparPeer::LIREGLIC_ID)) $criteria->add(LiempparPeer::LIREGLIC_ID, $this->lireglic_id);
		if ($this->isColumnModified(LiempparPeer::CODLIC)) $criteria->add(LiempparPeer::CODLIC, $this->codlic);
		if ($this->isColumnModified(LiempparPeer::CODPRO)) $criteria->add(LiempparPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(LiempparPeer::FECINS)) $criteria->add(LiempparPeer::FECINS, $this->fecins);
		if ($this->isColumnModified(LiempparPeer::OBSERVACIONES)) $criteria->add(LiempparPeer::OBSERVACIONES, $this->observaciones);
		if ($this->isColumnModified(LiempparPeer::ID)) $criteria->add(LiempparPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LiempparPeer::DATABASE_NAME);

		$criteria->add(LiempparPeer::ID, $this->id);

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

		$copyObj->setFecins($this->fecins);

		$copyObj->setObservaciones($this->observaciones);


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
			self::$peer = new LiempparPeer();
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

} 