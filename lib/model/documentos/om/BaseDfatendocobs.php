<?php


abstract class BaseDfatendocobs extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $desobs;


	
	protected $id_dfatendocdet;


	
	protected $id_usuario;


	
	protected $fecobs;


	
	protected $id;

	
	protected $aDfatendocdet;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getDesobs()
  {

    return trim($this->desobs);

  }
  
  public function getIdDfatendocdet()
  {

    return $this->id_dfatendocdet;

  }
  
  public function getIdUsuario()
  {

    return $this->id_usuario;

  }
  
  public function getFecobs($format = 'Y-m-d H:i:s')
  {

    if ($this->fecobs === null || $this->fecobs === '') {
      return null;
    } elseif (!is_int($this->fecobs)) {
            $ts = strtotime($this->fecobs);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecobs] as date/time value: " . var_export($this->fecobs, true));
      }
    } else {
      $ts = $this->fecobs;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return strftime($format, $ts);
    } else {
      return date($format, $ts);
    }
  }

  
  public function getId()
  {

    return $this->id;

  }
	
	public function setDesobs($v)
	{

    if ($this->desobs !== $v) {
        $this->desobs = $v;
        $this->modifiedColumns[] = DfatendocobsPeer::DESOBS;
      }
  
	} 
	
	public function setIdDfatendocdet($v)
	{

    if ($this->id_dfatendocdet !== $v) {
        $this->id_dfatendocdet = $v;
        $this->modifiedColumns[] = DfatendocobsPeer::ID_DFATENDOCDET;
      }
  
		if ($this->aDfatendocdet !== null && $this->aDfatendocdet->getId() !== $v) {
			$this->aDfatendocdet = null;
		}

	} 
	
	public function setIdUsuario($v)
	{

    if ($this->id_usuario !== $v) {
        $this->id_usuario = $v;
        $this->modifiedColumns[] = DfatendocobsPeer::ID_USUARIO;
      }
  
	} 
	
	public function setFecobs($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecobs] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecobs !== $ts) {
      $this->fecobs = $ts;
      $this->modifiedColumns[] = DfatendocobsPeer::FECOBS;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = DfatendocobsPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->desobs = $rs->getString($startcol + 0);

      $this->id_dfatendocdet = $rs->getInt($startcol + 1);

      $this->id_usuario = $rs->getInt($startcol + 2);

      $this->fecobs = $rs->getTimestamp($startcol + 3, null);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Dfatendocobs object", $e);
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
			$con = Propel::getConnection(DfatendocobsPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			DfatendocobsPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(DfatendocobsPeer::DATABASE_NAME);
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


												
			if ($this->aDfatendocdet !== null) {
				if ($this->aDfatendocdet->isModified()) {
					$affectedRows += $this->aDfatendocdet->save($con);
				}
				$this->setDfatendocdet($this->aDfatendocdet);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DfatendocobsPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DfatendocobsPeer::doUpdate($this, $con);
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


												
			if ($this->aDfatendocdet !== null) {
				if (!$this->aDfatendocdet->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDfatendocdet->getValidationFailures());
				}
			}

			if ($this->aTableError !== null) {
				if (!$this->aTableError->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTableError->getValidationFailures());
				}
			}


			if (($retval = DfatendocobsPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DfatendocobsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDesobs();
				break;
			case 1:
				return $this->getIdDfatendocdet();
				break;
			case 2:
				return $this->getIdUsuario();
				break;
			case 3:
				return $this->getFecobs();
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
		$keys = DfatendocobsPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDesobs(),
			$keys[1] => $this->getIdDfatendocdet(),
			$keys[2] => $this->getIdUsuario(),
			$keys[3] => $this->getFecobs(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DfatendocobsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDesobs($value);
				break;
			case 1:
				$this->setIdDfatendocdet($value);
				break;
			case 2:
				$this->setIdUsuario($value);
				break;
			case 3:
				$this->setFecobs($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DfatendocobsPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDesobs($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdDfatendocdet($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdUsuario($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecobs($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DfatendocobsPeer::DATABASE_NAME);

		if ($this->isColumnModified(DfatendocobsPeer::DESOBS)) $criteria->add(DfatendocobsPeer::DESOBS, $this->desobs);
		if ($this->isColumnModified(DfatendocobsPeer::ID_DFATENDOCDET)) $criteria->add(DfatendocobsPeer::ID_DFATENDOCDET, $this->id_dfatendocdet);
		if ($this->isColumnModified(DfatendocobsPeer::ID_USUARIO)) $criteria->add(DfatendocobsPeer::ID_USUARIO, $this->id_usuario);
		if ($this->isColumnModified(DfatendocobsPeer::FECOBS)) $criteria->add(DfatendocobsPeer::FECOBS, $this->fecobs);
		if ($this->isColumnModified(DfatendocobsPeer::ID)) $criteria->add(DfatendocobsPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DfatendocobsPeer::DATABASE_NAME);

		$criteria->add(DfatendocobsPeer::ID, $this->id);

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

		$copyObj->setDesobs($this->desobs);

		$copyObj->setIdDfatendocdet($this->id_dfatendocdet);

		$copyObj->setIdUsuario($this->id_usuario);

		$copyObj->setFecobs($this->fecobs);


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
			self::$peer = new DfatendocobsPeer();
		}
		return self::$peer;
	}

	
	public function setDfatendocdet($v)
	{


		if ($v === null) {
			$this->setIdDfatendocdet(NULL);
		} else {
			$this->setIdDfatendocdet($v->getId());
		}


		$this->aDfatendocdet = $v;
	}


	
	public function getDfatendocdet($con = null)
	{
		if ($this->aDfatendocdet === null && ($this->id_dfatendocdet !== null)) {
						include_once 'lib/model/documentos/om/BaseDfatendocdetPeer.php';

      $c = new Criteria();
      $c->add(DfatendocdetPeer::ID,$this->id_dfatendocdet);
      
			$this->aDfatendocdet = DfatendocdetPeer::doSelectOne($c, $con);

			
		}
		return $this->aDfatendocdet;
	}

} 