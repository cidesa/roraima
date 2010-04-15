<?php


abstract class BaseFcdesveh extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numdes;


	
	protected $plaveh;


	
	protected $fecdes;


	
	protected $motdes;


	
	protected $funrec;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumdes()
  {

    return trim($this->numdes);

  }
  
  public function getPlaveh()
  {

    return trim($this->plaveh);

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

  
  public function getMotdes()
  {

    return trim($this->motdes);

  }
  
  public function getFunrec()
  {

    return trim($this->funrec);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumdes($v)
	{

    if ($this->numdes !== $v) {
        $this->numdes = $v;
        $this->modifiedColumns[] = FcdesvehPeer::NUMDES;
      }
  
	} 
	
	public function setPlaveh($v)
	{

    if ($this->plaveh !== $v) {
        $this->plaveh = $v;
        $this->modifiedColumns[] = FcdesvehPeer::PLAVEH;
      }
  
	} 
	
	public function setFecdes($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdes] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdes !== $ts) {
      $this->fecdes = $ts;
      $this->modifiedColumns[] = FcdesvehPeer::FECDES;
    }

	} 
	
	public function setMotdes($v)
	{

    if ($this->motdes !== $v) {
        $this->motdes = $v;
        $this->modifiedColumns[] = FcdesvehPeer::MOTDES;
      }
  
	} 
	
	public function setFunrec($v)
	{

    if ($this->funrec !== $v) {
        $this->funrec = $v;
        $this->modifiedColumns[] = FcdesvehPeer::FUNREC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcdesvehPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numdes = $rs->getString($startcol + 0);

      $this->plaveh = $rs->getString($startcol + 1);

      $this->fecdes = $rs->getDate($startcol + 2, null);

      $this->motdes = $rs->getString($startcol + 3);

      $this->funrec = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcdesveh object", $e);
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
			$con = Propel::getConnection(FcdesvehPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcdesvehPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcdesvehPeer::DATABASE_NAME);
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
					$pk = FcdesvehPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcdesvehPeer::doUpdate($this, $con);
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


			if (($retval = FcdesvehPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdesvehPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumdes();
				break;
			case 1:
				return $this->getPlaveh();
				break;
			case 2:
				return $this->getFecdes();
				break;
			case 3:
				return $this->getMotdes();
				break;
			case 4:
				return $this->getFunrec();
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
		$keys = FcdesvehPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumdes(),
			$keys[1] => $this->getPlaveh(),
			$keys[2] => $this->getFecdes(),
			$keys[3] => $this->getMotdes(),
			$keys[4] => $this->getFunrec(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdesvehPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumdes($value);
				break;
			case 1:
				$this->setPlaveh($value);
				break;
			case 2:
				$this->setFecdes($value);
				break;
			case 3:
				$this->setMotdes($value);
				break;
			case 4:
				$this->setFunrec($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdesvehPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumdes($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPlaveh($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecdes($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMotdes($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFunrec($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcdesvehPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcdesvehPeer::NUMDES)) $criteria->add(FcdesvehPeer::NUMDES, $this->numdes);
		if ($this->isColumnModified(FcdesvehPeer::PLAVEH)) $criteria->add(FcdesvehPeer::PLAVEH, $this->plaveh);
		if ($this->isColumnModified(FcdesvehPeer::FECDES)) $criteria->add(FcdesvehPeer::FECDES, $this->fecdes);
		if ($this->isColumnModified(FcdesvehPeer::MOTDES)) $criteria->add(FcdesvehPeer::MOTDES, $this->motdes);
		if ($this->isColumnModified(FcdesvehPeer::FUNREC)) $criteria->add(FcdesvehPeer::FUNREC, $this->funrec);
		if ($this->isColumnModified(FcdesvehPeer::ID)) $criteria->add(FcdesvehPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcdesvehPeer::DATABASE_NAME);

		$criteria->add(FcdesvehPeer::ID, $this->id);

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

		$copyObj->setNumdes($this->numdes);

		$copyObj->setPlaveh($this->plaveh);

		$copyObj->setFecdes($this->fecdes);

		$copyObj->setMotdes($this->motdes);

		$copyObj->setFunrec($this->funrec);


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
			self::$peer = new FcdesvehPeer();
		}
		return self::$peer;
	}

} 