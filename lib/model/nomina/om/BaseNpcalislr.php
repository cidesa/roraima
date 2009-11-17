<?php


abstract class BaseNpcalislr extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $fecini;


	
	protected $feccie;


	
	protected $mesper;


	
	protected $anoper;


	
	protected $remune;


	
	protected $impret;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getFecini($format = 'Y-m-d')
  {

    if ($this->fecini === null || $this->fecini === '') {
      return null;
    } elseif (!is_int($this->fecini)) {
            $ts = adodb_strtotime($this->fecini);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecini] as date/time value: " . var_export($this->fecini, true));
      }
    } else {
      $ts = $this->fecini;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFeccie($format = 'Y-m-d')
  {

    if ($this->feccie === null || $this->feccie === '') {
      return null;
    } elseif (!is_int($this->feccie)) {
            $ts = adodb_strtotime($this->feccie);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccie] as date/time value: " . var_export($this->feccie, true));
      }
    } else {
      $ts = $this->feccie;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getMesper($val=false)
  {

    if($val) return number_format($this->mesper,2,',','.');
    else return $this->mesper;

  }
  
  public function getAnoper($val=false)
  {

    if($val) return number_format($this->anoper,2,',','.');
    else return $this->anoper;

  }
  
  public function getRemune($val=false)
  {

    if($val) return number_format($this->remune,2,',','.');
    else return $this->remune;

  }
  
  public function getImpret($val=false)
  {

    if($val) return number_format($this->impret,2,',','.');
    else return $this->impret;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpcalislrPeer::CODEMP;
      }
  
	} 
	
	public function setFecini($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecini] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecini !== $ts) {
      $this->fecini = $ts;
      $this->modifiedColumns[] = NpcalislrPeer::FECINI;
    }

	} 
	
	public function setFeccie($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccie] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccie !== $ts) {
      $this->feccie = $ts;
      $this->modifiedColumns[] = NpcalislrPeer::FECCIE;
    }

	} 
	
	public function setMesper($v)
	{

    if ($this->mesper !== $v) {
        $this->mesper = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpcalislrPeer::MESPER;
      }
  
	} 
	
	public function setAnoper($v)
	{

    if ($this->anoper !== $v) {
        $this->anoper = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpcalislrPeer::ANOPER;
      }
  
	} 
	
	public function setRemune($v)
	{

    if ($this->remune !== $v) {
        $this->remune = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpcalislrPeer::REMUNE;
      }
  
	} 
	
	public function setImpret($v)
	{

    if ($this->impret !== $v) {
        $this->impret = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpcalislrPeer::IMPRET;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpcalislrPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->fecini = $rs->getDate($startcol + 1, null);

      $this->feccie = $rs->getDate($startcol + 2, null);

      $this->mesper = $rs->getFloat($startcol + 3);

      $this->anoper = $rs->getFloat($startcol + 4);

      $this->remune = $rs->getFloat($startcol + 5);

      $this->impret = $rs->getFloat($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npcalislr object", $e);
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
			$con = Propel::getConnection(NpcalislrPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpcalislrPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpcalislrPeer::DATABASE_NAME);
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
					$pk = NpcalislrPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpcalislrPeer::doUpdate($this, $con);
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


			if (($retval = NpcalislrPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcalislrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getFecini();
				break;
			case 2:
				return $this->getFeccie();
				break;
			case 3:
				return $this->getMesper();
				break;
			case 4:
				return $this->getAnoper();
				break;
			case 5:
				return $this->getRemune();
				break;
			case 6:
				return $this->getImpret();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpcalislrPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getFecini(),
			$keys[2] => $this->getFeccie(),
			$keys[3] => $this->getMesper(),
			$keys[4] => $this->getAnoper(),
			$keys[5] => $this->getRemune(),
			$keys[6] => $this->getImpret(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcalislrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setFecini($value);
				break;
			case 2:
				$this->setFeccie($value);
				break;
			case 3:
				$this->setMesper($value);
				break;
			case 4:
				$this->setAnoper($value);
				break;
			case 5:
				$this->setRemune($value);
				break;
			case 6:
				$this->setImpret($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpcalislrPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecini($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFeccie($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMesper($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAnoper($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRemune($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setImpret($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpcalislrPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpcalislrPeer::CODEMP)) $criteria->add(NpcalislrPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpcalislrPeer::FECINI)) $criteria->add(NpcalislrPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(NpcalislrPeer::FECCIE)) $criteria->add(NpcalislrPeer::FECCIE, $this->feccie);
		if ($this->isColumnModified(NpcalislrPeer::MESPER)) $criteria->add(NpcalislrPeer::MESPER, $this->mesper);
		if ($this->isColumnModified(NpcalislrPeer::ANOPER)) $criteria->add(NpcalislrPeer::ANOPER, $this->anoper);
		if ($this->isColumnModified(NpcalislrPeer::REMUNE)) $criteria->add(NpcalislrPeer::REMUNE, $this->remune);
		if ($this->isColumnModified(NpcalislrPeer::IMPRET)) $criteria->add(NpcalislrPeer::IMPRET, $this->impret);
		if ($this->isColumnModified(NpcalislrPeer::ID)) $criteria->add(NpcalislrPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpcalislrPeer::DATABASE_NAME);

		$criteria->add(NpcalislrPeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFeccie($this->feccie);

		$copyObj->setMesper($this->mesper);

		$copyObj->setAnoper($this->anoper);

		$copyObj->setRemune($this->remune);

		$copyObj->setImpret($this->impret);


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
			self::$peer = new NpcalislrPeer();
		}
		return self::$peer;
	}

} 