<?php


abstract class BaseRhclacur extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcur;


	
	protected $numcla;


	
	protected $feccla;


	
	protected $horini;


	
	protected $horfin;


	
	protected $numhor;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcur()
  {

    return trim($this->codcur);

  }
  
  public function getNumcla()
  {

    return trim($this->numcla);

  }
  
  public function getFeccla($format = 'Y-m-d')
  {

    if ($this->feccla === null || $this->feccla === '') {
      return null;
    } elseif (!is_int($this->feccla)) {
            $ts = adodb_strtotime($this->feccla);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccla] as date/time value: " . var_export($this->feccla, true));
      }
    } else {
      $ts = $this->feccla;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getHorini()
  {

    return trim($this->horini);

  }
  
  public function getHorfin()
  {

    return trim($this->horfin);

  }
  
  public function getNumhor($val=false)
  {

    if($val) return number_format($this->numhor,2,',','.');
    else return $this->numhor;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcur($v)
	{

    if ($this->codcur !== $v) {
        $this->codcur = $v;
        $this->modifiedColumns[] = RhclacurPeer::CODCUR;
      }
  
	} 
	
	public function setNumcla($v)
	{

    if ($this->numcla !== $v) {
        $this->numcla = $v;
        $this->modifiedColumns[] = RhclacurPeer::NUMCLA;
      }
  
	} 
	
	public function setFeccla($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccla] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccla !== $ts) {
      $this->feccla = $ts;
      $this->modifiedColumns[] = RhclacurPeer::FECCLA;
    }

	} 
	
	public function setHorini($v)
	{

    if ($this->horini !== $v) {
        $this->horini = $v;
        $this->modifiedColumns[] = RhclacurPeer::HORINI;
      }
  
	} 
	
	public function setHorfin($v)
	{

    if ($this->horfin !== $v) {
        $this->horfin = $v;
        $this->modifiedColumns[] = RhclacurPeer::HORFIN;
      }
  
	} 
	
	public function setNumhor($v)
	{

    if ($this->numhor !== $v) {
        $this->numhor = Herramientas::toFloat($v);
        $this->modifiedColumns[] = RhclacurPeer::NUMHOR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = RhclacurPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcur = $rs->getString($startcol + 0);

      $this->numcla = $rs->getString($startcol + 1);

      $this->feccla = $rs->getDate($startcol + 2, null);

      $this->horini = $rs->getString($startcol + 3);

      $this->horfin = $rs->getString($startcol + 4);

      $this->numhor = $rs->getFloat($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Rhclacur object", $e);
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
			$con = Propel::getConnection(RhclacurPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RhclacurPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RhclacurPeer::DATABASE_NAME);
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
					$pk = RhclacurPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RhclacurPeer::doUpdate($this, $con);
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


			if (($retval = RhclacurPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhclacurPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcur();
				break;
			case 1:
				return $this->getNumcla();
				break;
			case 2:
				return $this->getFeccla();
				break;
			case 3:
				return $this->getHorini();
				break;
			case 4:
				return $this->getHorfin();
				break;
			case 5:
				return $this->getNumhor();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RhclacurPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcur(),
			$keys[1] => $this->getNumcla(),
			$keys[2] => $this->getFeccla(),
			$keys[3] => $this->getHorini(),
			$keys[4] => $this->getHorfin(),
			$keys[5] => $this->getNumhor(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhclacurPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcur($value);
				break;
			case 1:
				$this->setNumcla($value);
				break;
			case 2:
				$this->setFeccla($value);
				break;
			case 3:
				$this->setHorini($value);
				break;
			case 4:
				$this->setHorfin($value);
				break;
			case 5:
				$this->setNumhor($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RhclacurPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcur($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumcla($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFeccla($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setHorini($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setHorfin($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNumhor($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RhclacurPeer::DATABASE_NAME);

		if ($this->isColumnModified(RhclacurPeer::CODCUR)) $criteria->add(RhclacurPeer::CODCUR, $this->codcur);
		if ($this->isColumnModified(RhclacurPeer::NUMCLA)) $criteria->add(RhclacurPeer::NUMCLA, $this->numcla);
		if ($this->isColumnModified(RhclacurPeer::FECCLA)) $criteria->add(RhclacurPeer::FECCLA, $this->feccla);
		if ($this->isColumnModified(RhclacurPeer::HORINI)) $criteria->add(RhclacurPeer::HORINI, $this->horini);
		if ($this->isColumnModified(RhclacurPeer::HORFIN)) $criteria->add(RhclacurPeer::HORFIN, $this->horfin);
		if ($this->isColumnModified(RhclacurPeer::NUMHOR)) $criteria->add(RhclacurPeer::NUMHOR, $this->numhor);
		if ($this->isColumnModified(RhclacurPeer::ID)) $criteria->add(RhclacurPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RhclacurPeer::DATABASE_NAME);

		$criteria->add(RhclacurPeer::ID, $this->id);

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

		$copyObj->setCodcur($this->codcur);

		$copyObj->setNumcla($this->numcla);

		$copyObj->setFeccla($this->feccla);

		$copyObj->setHorini($this->horini);

		$copyObj->setHorfin($this->horfin);

		$copyObj->setNumhor($this->numhor);


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
			self::$peer = new RhclacurPeer();
		}
		return self::$peer;
	}

} 