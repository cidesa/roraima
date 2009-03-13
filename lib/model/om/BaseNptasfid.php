<?php


abstract class BaseNptasfid extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $fecdesde;


	
	protected $fechasta;


	
	protected $tasa;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getFecdesde($format = 'Y-m-d')
  {

    if ($this->fecdesde === null || $this->fecdesde === '') {
      return null;
    } elseif (!is_int($this->fecdesde)) {
            $ts = adodb_strtotime($this->fecdesde);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdesde] as date/time value: " . var_export($this->fecdesde, true));
      }
    } else {
      $ts = $this->fecdesde;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFechasta($format = 'Y-m-d')
  {

    if ($this->fechasta === null || $this->fechasta === '') {
      return null;
    } elseif (!is_int($this->fechasta)) {
            $ts = adodb_strtotime($this->fechasta);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fechasta] as date/time value: " . var_export($this->fechasta, true));
      }
    } else {
      $ts = $this->fechasta;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getTasa($val=false)
  {

    if($val) return number_format($this->tasa,2,',','.');
    else return $this->tasa;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setFecdesde($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdesde] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdesde !== $ts) {
      $this->fecdesde = $ts;
      $this->modifiedColumns[] = NptasfidPeer::FECDESDE;
    }

	} 
	
	public function setFechasta($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fechasta] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fechasta !== $ts) {
      $this->fechasta = $ts;
      $this->modifiedColumns[] = NptasfidPeer::FECHASTA;
    }

	} 
	
	public function setTasa($v)
	{

    if ($this->tasa !== $v) {
        $this->tasa = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NptasfidPeer::TASA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NptasfidPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->fecdesde = $rs->getDate($startcol + 0, null);

      $this->fechasta = $rs->getDate($startcol + 1, null);

      $this->tasa = $rs->getFloat($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Nptasfid object", $e);
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
			$con = Propel::getConnection(NptasfidPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NptasfidPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NptasfidPeer::DATABASE_NAME);
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
					$pk = NptasfidPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NptasfidPeer::doUpdate($this, $con);
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


			if (($retval = NptasfidPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NptasfidPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getFecdesde();
				break;
			case 1:
				return $this->getFechasta();
				break;
			case 2:
				return $this->getTasa();
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
		$keys = NptasfidPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getFecdesde(),
			$keys[1] => $this->getFechasta(),
			$keys[2] => $this->getTasa(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NptasfidPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setFecdesde($value);
				break;
			case 1:
				$this->setFechasta($value);
				break;
			case 2:
				$this->setTasa($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NptasfidPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setFecdesde($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFechasta($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTasa($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NptasfidPeer::DATABASE_NAME);

		if ($this->isColumnModified(NptasfidPeer::FECDESDE)) $criteria->add(NptasfidPeer::FECDESDE, $this->fecdesde);
		if ($this->isColumnModified(NptasfidPeer::FECHASTA)) $criteria->add(NptasfidPeer::FECHASTA, $this->fechasta);
		if ($this->isColumnModified(NptasfidPeer::TASA)) $criteria->add(NptasfidPeer::TASA, $this->tasa);
		if ($this->isColumnModified(NptasfidPeer::ID)) $criteria->add(NptasfidPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NptasfidPeer::DATABASE_NAME);

		$criteria->add(NptasfidPeer::ID, $this->id);

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

		$copyObj->setFecdesde($this->fecdesde);

		$copyObj->setFechasta($this->fechasta);

		$copyObj->setTasa($this->tasa);


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
			self::$peer = new NptasfidPeer();
		}
		return self::$peer;
	}

} 