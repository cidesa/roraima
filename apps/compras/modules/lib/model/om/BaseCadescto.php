<?php


abstract class BaseCadescto extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coddesc;


	
	protected $desdesc;


	
	protected $tipdesc;


	
	protected $mondesc;


	
	protected $diasapl;


	
	protected $codcta;


	
	protected $tipret;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCoddesc()
  {

    return trim($this->coddesc);

  }
  
  public function getDesdesc()
  {

    return trim($this->desdesc);

  }
  
  public function getTipdesc()
  {

    return trim($this->tipdesc);

  }
  
  public function getMondesc($val=false)
  {

    if($val) return number_format($this->mondesc,2,',','.');
    else return $this->mondesc;

  }
  
  public function getDiasapl($val=false)
  {

    if($val) return number_format($this->diasapl,2,',','.');
    else return $this->diasapl;

  }
  
  public function getCodcta()
  {

    return trim($this->codcta);

  }
  
  public function getTipret()
  {

    return trim($this->tipret);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCoddesc($v)
	{

    if ($this->coddesc !== $v) {
        $this->coddesc = $v;
        $this->modifiedColumns[] = CadesctoPeer::CODDESC;
      }
  
	} 
	
	public function setDesdesc($v)
	{

    if ($this->desdesc !== $v) {
        $this->desdesc = $v;
        $this->modifiedColumns[] = CadesctoPeer::DESDESC;
      }
  
	} 
	
	public function setTipdesc($v)
	{

    if ($this->tipdesc !== $v) {
        $this->tipdesc = $v;
        $this->modifiedColumns[] = CadesctoPeer::TIPDESC;
      }
  
	} 
	
	public function setMondesc($v)
	{

    if ($this->mondesc !== $v) {
        $this->mondesc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadesctoPeer::MONDESC;
      }
  
	} 
	
	public function setDiasapl($v)
	{

    if ($this->diasapl !== $v) {
        $this->diasapl = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadesctoPeer::DIASAPL;
      }
  
	} 
	
	public function setCodcta($v)
	{

    if ($this->codcta !== $v) {
        $this->codcta = $v;
        $this->modifiedColumns[] = CadesctoPeer::CODCTA;
      }
  
	} 
	
	public function setTipret($v)
	{

    if ($this->tipret !== $v) {
        $this->tipret = $v;
        $this->modifiedColumns[] = CadesctoPeer::TIPRET;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CadesctoPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->coddesc = $rs->getString($startcol + 0);

      $this->desdesc = $rs->getString($startcol + 1);

      $this->tipdesc = $rs->getString($startcol + 2);

      $this->mondesc = $rs->getFloat($startcol + 3);

      $this->diasapl = $rs->getFloat($startcol + 4);

      $this->codcta = $rs->getString($startcol + 5);

      $this->tipret = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cadescto object", $e);
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
			$con = Propel::getConnection(CadesctoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CadesctoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CadesctoPeer::DATABASE_NAME);
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
					$pk = CadesctoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CadesctoPeer::doUpdate($this, $con);
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


			if (($retval = CadesctoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadesctoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoddesc();
				break;
			case 1:
				return $this->getDesdesc();
				break;
			case 2:
				return $this->getTipdesc();
				break;
			case 3:
				return $this->getMondesc();
				break;
			case 4:
				return $this->getDiasapl();
				break;
			case 5:
				return $this->getCodcta();
				break;
			case 6:
				return $this->getTipret();
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
		$keys = CadesctoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoddesc(),
			$keys[1] => $this->getDesdesc(),
			$keys[2] => $this->getTipdesc(),
			$keys[3] => $this->getMondesc(),
			$keys[4] => $this->getDiasapl(),
			$keys[5] => $this->getCodcta(),
			$keys[6] => $this->getTipret(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadesctoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoddesc($value);
				break;
			case 1:
				$this->setDesdesc($value);
				break;
			case 2:
				$this->setTipdesc($value);
				break;
			case 3:
				$this->setMondesc($value);
				break;
			case 4:
				$this->setDiasapl($value);
				break;
			case 5:
				$this->setCodcta($value);
				break;
			case 6:
				$this->setTipret($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadesctoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoddesc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesdesc($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipdesc($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMondesc($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDiasapl($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodcta($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTipret($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CadesctoPeer::DATABASE_NAME);

		if ($this->isColumnModified(CadesctoPeer::CODDESC)) $criteria->add(CadesctoPeer::CODDESC, $this->coddesc);
		if ($this->isColumnModified(CadesctoPeer::DESDESC)) $criteria->add(CadesctoPeer::DESDESC, $this->desdesc);
		if ($this->isColumnModified(CadesctoPeer::TIPDESC)) $criteria->add(CadesctoPeer::TIPDESC, $this->tipdesc);
		if ($this->isColumnModified(CadesctoPeer::MONDESC)) $criteria->add(CadesctoPeer::MONDESC, $this->mondesc);
		if ($this->isColumnModified(CadesctoPeer::DIASAPL)) $criteria->add(CadesctoPeer::DIASAPL, $this->diasapl);
		if ($this->isColumnModified(CadesctoPeer::CODCTA)) $criteria->add(CadesctoPeer::CODCTA, $this->codcta);
		if ($this->isColumnModified(CadesctoPeer::TIPRET)) $criteria->add(CadesctoPeer::TIPRET, $this->tipret);
		if ($this->isColumnModified(CadesctoPeer::ID)) $criteria->add(CadesctoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CadesctoPeer::DATABASE_NAME);

		$criteria->add(CadesctoPeer::ID, $this->id);

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

		$copyObj->setCoddesc($this->coddesc);

		$copyObj->setDesdesc($this->desdesc);

		$copyObj->setTipdesc($this->tipdesc);

		$copyObj->setMondesc($this->mondesc);

		$copyObj->setDiasapl($this->diasapl);

		$copyObj->setCodcta($this->codcta);

		$copyObj->setTipret($this->tipret);


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
			self::$peer = new CadesctoPeer();
		}
		return self::$peer;
	}

} 