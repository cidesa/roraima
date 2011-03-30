<?php


abstract class BaseLiplieact extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numplie;


	
	protected $numexp;


	
	protected $desact;


	
	protected $fecdes;


	
	protected $hordes;


	
	protected $fechas;


	
	protected $horhas;


	
	protected $lugar;


	
	protected $direc;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumplie()
  {

    return trim($this->numplie);

  }
  
  public function getNumexp()
  {

    return trim($this->numexp);

  }
  
  public function getDesact()
  {

    return trim($this->desact);

  }
  
  public function getFecdes($format = 'Y-m-d')
  {

    if ($this->fecdes === null || $this->fecdes === '') {
      return null;
    } elseif (!is_int($this->fecdes)) {
            $ts = adodb_strtotime($this->fecdes);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdes] as date/time value: " . var_export($this->fecdes, true));
      }
    } else {
      $ts = $this->fecdes;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getHordes()
  {

    return trim($this->hordes);

  }
  
  public function getFechas($format = 'Y-m-d')
  {

    if ($this->fechas === null || $this->fechas === '') {
      return null;
    } elseif (!is_int($this->fechas)) {
            $ts = adodb_strtotime($this->fechas);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fechas] as date/time value: " . var_export($this->fechas, true));
      }
    } else {
      $ts = $this->fechas;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getHorhas()
  {

    return trim($this->horhas);

  }
  
  public function getLugar()
  {

    return trim($this->lugar);

  }
  
  public function getDirec()
  {

    return trim($this->direc);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumplie($v)
	{

    if ($this->numplie !== $v) {
        $this->numplie = $v;
        $this->modifiedColumns[] = LiplieactPeer::NUMPLIE;
      }
  
	} 
	
	public function setNumexp($v)
	{

    if ($this->numexp !== $v) {
        $this->numexp = $v;
        $this->modifiedColumns[] = LiplieactPeer::NUMEXP;
      }
  
	} 
	
	public function setDesact($v)
	{

    if ($this->desact !== $v) {
        $this->desact = $v;
        $this->modifiedColumns[] = LiplieactPeer::DESACT;
      }
  
	} 
	
	public function setFecdes($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdes] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdes !== $ts) {
      $this->fecdes = $ts;
      $this->modifiedColumns[] = LiplieactPeer::FECDES;
    }

	} 
	
	public function setHordes($v)
	{

    if ($this->hordes !== $v) {
        $this->hordes = $v;
        $this->modifiedColumns[] = LiplieactPeer::HORDES;
      }
  
	} 
	
	public function setFechas($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fechas] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fechas !== $ts) {
      $this->fechas = $ts;
      $this->modifiedColumns[] = LiplieactPeer::FECHAS;
    }

	} 
	
	public function setHorhas($v)
	{

    if ($this->horhas !== $v) {
        $this->horhas = $v;
        $this->modifiedColumns[] = LiplieactPeer::HORHAS;
      }
  
	} 
	
	public function setLugar($v)
	{

    if ($this->lugar !== $v) {
        $this->lugar = $v;
        $this->modifiedColumns[] = LiplieactPeer::LUGAR;
      }
  
	} 
	
	public function setDirec($v)
	{

    if ($this->direc !== $v) {
        $this->direc = $v;
        $this->modifiedColumns[] = LiplieactPeer::DIREC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LiplieactPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numplie = $rs->getString($startcol + 0);

      $this->numexp = $rs->getString($startcol + 1);

      $this->desact = $rs->getString($startcol + 2);

      $this->fecdes = $rs->getDate($startcol + 3, null);

      $this->hordes = $rs->getString($startcol + 4);

      $this->fechas = $rs->getDate($startcol + 5, null);

      $this->horhas = $rs->getString($startcol + 6);

      $this->lugar = $rs->getString($startcol + 7);

      $this->direc = $rs->getString($startcol + 8);

      $this->id = $rs->getInt($startcol + 9);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 10; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Liplieact object", $e);
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
			$con = Propel::getConnection(LiplieactPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LiplieactPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LiplieactPeer::DATABASE_NAME);
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LiplieactPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LiplieactPeer::doUpdate($this, $con);
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


			if (($retval = LiplieactPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiplieactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumplie();
				break;
			case 1:
				return $this->getNumexp();
				break;
			case 2:
				return $this->getDesact();
				break;
			case 3:
				return $this->getFecdes();
				break;
			case 4:
				return $this->getHordes();
				break;
			case 5:
				return $this->getFechas();
				break;
			case 6:
				return $this->getHorhas();
				break;
			case 7:
				return $this->getLugar();
				break;
			case 8:
				return $this->getDirec();
				break;
			case 9:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiplieactPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumplie(),
			$keys[1] => $this->getNumexp(),
			$keys[2] => $this->getDesact(),
			$keys[3] => $this->getFecdes(),
			$keys[4] => $this->getHordes(),
			$keys[5] => $this->getFechas(),
			$keys[6] => $this->getHorhas(),
			$keys[7] => $this->getLugar(),
			$keys[8] => $this->getDirec(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiplieactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumplie($value);
				break;
			case 1:
				$this->setNumexp($value);
				break;
			case 2:
				$this->setDesact($value);
				break;
			case 3:
				$this->setFecdes($value);
				break;
			case 4:
				$this->setHordes($value);
				break;
			case 5:
				$this->setFechas($value);
				break;
			case 6:
				$this->setHorhas($value);
				break;
			case 7:
				$this->setLugar($value);
				break;
			case 8:
				$this->setDirec($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiplieactPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumplie($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumexp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesact($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecdes($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setHordes($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFechas($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setHorhas($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setLugar($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDirec($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LiplieactPeer::DATABASE_NAME);

		if ($this->isColumnModified(LiplieactPeer::NUMPLIE)) $criteria->add(LiplieactPeer::NUMPLIE, $this->numplie);
		if ($this->isColumnModified(LiplieactPeer::NUMEXP)) $criteria->add(LiplieactPeer::NUMEXP, $this->numexp);
		if ($this->isColumnModified(LiplieactPeer::DESACT)) $criteria->add(LiplieactPeer::DESACT, $this->desact);
		if ($this->isColumnModified(LiplieactPeer::FECDES)) $criteria->add(LiplieactPeer::FECDES, $this->fecdes);
		if ($this->isColumnModified(LiplieactPeer::HORDES)) $criteria->add(LiplieactPeer::HORDES, $this->hordes);
		if ($this->isColumnModified(LiplieactPeer::FECHAS)) $criteria->add(LiplieactPeer::FECHAS, $this->fechas);
		if ($this->isColumnModified(LiplieactPeer::HORHAS)) $criteria->add(LiplieactPeer::HORHAS, $this->horhas);
		if ($this->isColumnModified(LiplieactPeer::LUGAR)) $criteria->add(LiplieactPeer::LUGAR, $this->lugar);
		if ($this->isColumnModified(LiplieactPeer::DIREC)) $criteria->add(LiplieactPeer::DIREC, $this->direc);
		if ($this->isColumnModified(LiplieactPeer::ID)) $criteria->add(LiplieactPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LiplieactPeer::DATABASE_NAME);

		$criteria->add(LiplieactPeer::ID, $this->id);

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

		$copyObj->setNumplie($this->numplie);

		$copyObj->setNumexp($this->numexp);

		$copyObj->setDesact($this->desact);

		$copyObj->setFecdes($this->fecdes);

		$copyObj->setHordes($this->hordes);

		$copyObj->setFechas($this->fechas);

		$copyObj->setHorhas($this->horhas);

		$copyObj->setLugar($this->lugar);

		$copyObj->setDirec($this->direc);


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
			self::$peer = new LiplieactPeer();
		}
		return self::$peer;
	}

} 