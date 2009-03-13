<?php


abstract class BaseCideftit extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpre;


	
	protected $nompre;


	
	protected $codcta;


	
	protected $stacod;


	
	protected $coduni;


	
	protected $estatus;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getNompre()
  {

    return trim($this->nompre);

  }
  
  public function getCodcta()
  {

    return trim($this->codcta);

  }
  
  public function getStacod()
  {

    return trim($this->stacod);

  }
  
  public function getCoduni()
  {

    return trim($this->coduni);

  }
  
  public function getEstatus()
  {

    return trim($this->estatus);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = CideftitPeer::CODPRE;
      }
  
	} 
	
	public function setNompre($v)
	{

    if ($this->nompre !== $v) {
        $this->nompre = $v;
        $this->modifiedColumns[] = CideftitPeer::NOMPRE;
      }
  
	} 
	
	public function setCodcta($v)
	{

    if ($this->codcta !== $v) {
        $this->codcta = $v;
        $this->modifiedColumns[] = CideftitPeer::CODCTA;
      }
  
	} 
	
	public function setStacod($v)
	{

    if ($this->stacod !== $v) {
        $this->stacod = $v;
        $this->modifiedColumns[] = CideftitPeer::STACOD;
      }
  
	} 
	
	public function setCoduni($v)
	{

    if ($this->coduni !== $v) {
        $this->coduni = $v;
        $this->modifiedColumns[] = CideftitPeer::CODUNI;
      }
  
	} 
	
	public function setEstatus($v)
	{

    if ($this->estatus !== $v) {
        $this->estatus = $v;
        $this->modifiedColumns[] = CideftitPeer::ESTATUS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CideftitPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codpre = $rs->getString($startcol + 0);

      $this->nompre = $rs->getString($startcol + 1);

      $this->codcta = $rs->getString($startcol + 2);

      $this->stacod = $rs->getString($startcol + 3);

      $this->coduni = $rs->getString($startcol + 4);

      $this->estatus = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cideftit object", $e);
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
			$con = Propel::getConnection(CideftitPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CideftitPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CideftitPeer::DATABASE_NAME);
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
					$pk = CideftitPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CideftitPeer::doUpdate($this, $con);
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


			if (($retval = CideftitPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CideftitPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpre();
				break;
			case 1:
				return $this->getNompre();
				break;
			case 2:
				return $this->getCodcta();
				break;
			case 3:
				return $this->getStacod();
				break;
			case 4:
				return $this->getCoduni();
				break;
			case 5:
				return $this->getEstatus();
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
		$keys = CideftitPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpre(),
			$keys[1] => $this->getNompre(),
			$keys[2] => $this->getCodcta(),
			$keys[3] => $this->getStacod(),
			$keys[4] => $this->getCoduni(),
			$keys[5] => $this->getEstatus(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CideftitPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpre($value);
				break;
			case 1:
				$this->setNompre($value);
				break;
			case 2:
				$this->setCodcta($value);
				break;
			case 3:
				$this->setStacod($value);
				break;
			case 4:
				$this->setCoduni($value);
				break;
			case 5:
				$this->setEstatus($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CideftitPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpre($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNompre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcta($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStacod($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCoduni($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEstatus($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CideftitPeer::DATABASE_NAME);

		if ($this->isColumnModified(CideftitPeer::CODPRE)) $criteria->add(CideftitPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(CideftitPeer::NOMPRE)) $criteria->add(CideftitPeer::NOMPRE, $this->nompre);
		if ($this->isColumnModified(CideftitPeer::CODCTA)) $criteria->add(CideftitPeer::CODCTA, $this->codcta);
		if ($this->isColumnModified(CideftitPeer::STACOD)) $criteria->add(CideftitPeer::STACOD, $this->stacod);
		if ($this->isColumnModified(CideftitPeer::CODUNI)) $criteria->add(CideftitPeer::CODUNI, $this->coduni);
		if ($this->isColumnModified(CideftitPeer::ESTATUS)) $criteria->add(CideftitPeer::ESTATUS, $this->estatus);
		if ($this->isColumnModified(CideftitPeer::ID)) $criteria->add(CideftitPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CideftitPeer::DATABASE_NAME);

		$criteria->add(CideftitPeer::ID, $this->id);

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

		$copyObj->setCodpre($this->codpre);

		$copyObj->setNompre($this->nompre);

		$copyObj->setCodcta($this->codcta);

		$copyObj->setStacod($this->stacod);

		$copyObj->setCoduni($this->coduni);

		$copyObj->setEstatus($this->estatus);


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
			self::$peer = new CideftitPeer();
		}
		return self::$peer;
	}

} 