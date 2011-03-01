<?php


abstract class BaseCacotdisrgo extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refcot;


	
	protected $codcat;


	
	protected $codart;


	
	protected $codrgo;


	
	protected $monrgo;


	
	protected $tipdoc;


	
	protected $codpre;


	
	protected $tipo;


	
	protected $desart;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefcot()
  {

    return trim($this->refcot);

  }
  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getCodrgo()
  {

    return trim($this->codrgo);

  }
  
  public function getMonrgo($val=false)
  {

    if($val) return number_format($this->monrgo,2,',','.');
    else return $this->monrgo;

  }
  
  public function getTipdoc()
  {

    return trim($this->tipdoc);

  }
  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getTipo()
  {

    return trim($this->tipo);

  }
  
  public function getDesart()
  {

    return trim($this->desart);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefcot($v)
	{

    if ($this->refcot !== $v) {
        $this->refcot = $v;
        $this->modifiedColumns[] = CacotdisrgoPeer::REFCOT;
      }
  
	} 
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = CacotdisrgoPeer::CODCAT;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = CacotdisrgoPeer::CODART;
      }
  
	} 
	
	public function setCodrgo($v)
	{

    if ($this->codrgo !== $v) {
        $this->codrgo = $v;
        $this->modifiedColumns[] = CacotdisrgoPeer::CODRGO;
      }
  
	} 
	
	public function setMonrgo($v)
	{

    if ($this->monrgo !== $v) {
        $this->monrgo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacotdisrgoPeer::MONRGO;
      }
  
	} 
	
	public function setTipdoc($v)
	{

    if ($this->tipdoc !== $v) {
        $this->tipdoc = $v;
        $this->modifiedColumns[] = CacotdisrgoPeer::TIPDOC;
      }
  
	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = CacotdisrgoPeer::CODPRE;
      }
  
	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = CacotdisrgoPeer::TIPO;
      }
  
	} 
	
	public function setDesart($v)
	{

    if ($this->desart !== $v) {
        $this->desart = $v;
        $this->modifiedColumns[] = CacotdisrgoPeer::DESART;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CacotdisrgoPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refcot = $rs->getString($startcol + 0);

      $this->codcat = $rs->getString($startcol + 1);

      $this->codart = $rs->getString($startcol + 2);

      $this->codrgo = $rs->getString($startcol + 3);

      $this->monrgo = $rs->getFloat($startcol + 4);

      $this->tipdoc = $rs->getString($startcol + 5);

      $this->codpre = $rs->getString($startcol + 6);

      $this->tipo = $rs->getString($startcol + 7);

      $this->desart = $rs->getString($startcol + 8);

      $this->id = $rs->getInt($startcol + 9);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 10; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cacotdisrgo object", $e);
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
			$con = Propel::getConnection(CacotdisrgoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CacotdisrgoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CacotdisrgoPeer::DATABASE_NAME);
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
					$pk = CacotdisrgoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CacotdisrgoPeer::doUpdate($this, $con);
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


			if (($retval = CacotdisrgoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CacotdisrgoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefcot();
				break;
			case 1:
				return $this->getCodcat();
				break;
			case 2:
				return $this->getCodart();
				break;
			case 3:
				return $this->getCodrgo();
				break;
			case 4:
				return $this->getMonrgo();
				break;
			case 5:
				return $this->getTipdoc();
				break;
			case 6:
				return $this->getCodpre();
				break;
			case 7:
				return $this->getTipo();
				break;
			case 8:
				return $this->getDesart();
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
		$keys = CacotdisrgoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefcot(),
			$keys[1] => $this->getCodcat(),
			$keys[2] => $this->getCodart(),
			$keys[3] => $this->getCodrgo(),
			$keys[4] => $this->getMonrgo(),
			$keys[5] => $this->getTipdoc(),
			$keys[6] => $this->getCodpre(),
			$keys[7] => $this->getTipo(),
			$keys[8] => $this->getDesart(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CacotdisrgoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefcot($value);
				break;
			case 1:
				$this->setCodcat($value);
				break;
			case 2:
				$this->setCodart($value);
				break;
			case 3:
				$this->setCodrgo($value);
				break;
			case 4:
				$this->setMonrgo($value);
				break;
			case 5:
				$this->setTipdoc($value);
				break;
			case 6:
				$this->setCodpre($value);
				break;
			case 7:
				$this->setTipo($value);
				break;
			case 8:
				$this->setDesart($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CacotdisrgoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefcot($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcat($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodart($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodrgo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonrgo($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTipdoc($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodpre($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTipo($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDesart($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CacotdisrgoPeer::DATABASE_NAME);

		if ($this->isColumnModified(CacotdisrgoPeer::REFCOT)) $criteria->add(CacotdisrgoPeer::REFCOT, $this->refcot);
		if ($this->isColumnModified(CacotdisrgoPeer::CODCAT)) $criteria->add(CacotdisrgoPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(CacotdisrgoPeer::CODART)) $criteria->add(CacotdisrgoPeer::CODART, $this->codart);
		if ($this->isColumnModified(CacotdisrgoPeer::CODRGO)) $criteria->add(CacotdisrgoPeer::CODRGO, $this->codrgo);
		if ($this->isColumnModified(CacotdisrgoPeer::MONRGO)) $criteria->add(CacotdisrgoPeer::MONRGO, $this->monrgo);
		if ($this->isColumnModified(CacotdisrgoPeer::TIPDOC)) $criteria->add(CacotdisrgoPeer::TIPDOC, $this->tipdoc);
		if ($this->isColumnModified(CacotdisrgoPeer::CODPRE)) $criteria->add(CacotdisrgoPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(CacotdisrgoPeer::TIPO)) $criteria->add(CacotdisrgoPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(CacotdisrgoPeer::DESART)) $criteria->add(CacotdisrgoPeer::DESART, $this->desart);
		if ($this->isColumnModified(CacotdisrgoPeer::ID)) $criteria->add(CacotdisrgoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CacotdisrgoPeer::DATABASE_NAME);

		$criteria->add(CacotdisrgoPeer::ID, $this->id);

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

		$copyObj->setRefcot($this->refcot);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCodart($this->codart);

		$copyObj->setCodrgo($this->codrgo);

		$copyObj->setMonrgo($this->monrgo);

		$copyObj->setTipdoc($this->tipdoc);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setTipo($this->tipo);

		$copyObj->setDesart($this->desart);


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
			self::$peer = new CacotdisrgoPeer();
		}
		return self::$peer;
	}

} 