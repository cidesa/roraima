<?php


abstract class BaseNpguarde extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcon;


	
	protected $nomgua;


	
	protected $nomcon;


	
	protected $rifgua;


	
	protected $ninsme;


	
	protected $solmevig;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
  
  public function getNomgua()
  {

    return trim($this->nomgua);

  }
  
  public function getNomcon()
  {

    return trim($this->nomcon);

  }
  
  public function getRifgua()
  {

    return trim($this->rifgua);

  }
  
  public function getNinsme()
  {

    return trim($this->ninsme);

  }
  
  public function getSolmevig()
  {

    return $this->solmevig;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = NpguardePeer::CODCON;
      }
  
	} 
	
	public function setNomgua($v)
	{

    if ($this->nomgua !== $v) {
        $this->nomgua = $v;
        $this->modifiedColumns[] = NpguardePeer::NOMGUA;
      }
  
	} 
	
	public function setNomcon($v)
	{

    if ($this->nomcon !== $v) {
        $this->nomcon = $v;
        $this->modifiedColumns[] = NpguardePeer::NOMCON;
      }
  
	} 
	
	public function setRifgua($v)
	{

    if ($this->rifgua !== $v) {
        $this->rifgua = $v;
        $this->modifiedColumns[] = NpguardePeer::RIFGUA;
      }
  
	} 
	
	public function setNinsme($v)
	{

    if ($this->ninsme !== $v) {
        $this->ninsme = $v;
        $this->modifiedColumns[] = NpguardePeer::NINSME;
      }
  
	} 
	
	public function setSolmevig($v)
	{

    if ($this->solmevig !== $v) {
        $this->solmevig = $v;
        $this->modifiedColumns[] = NpguardePeer::SOLMEVIG;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpguardePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcon = $rs->getString($startcol + 0);

      $this->nomgua = $rs->getString($startcol + 1);

      $this->nomcon = $rs->getString($startcol + 2);

      $this->rifgua = $rs->getString($startcol + 3);

      $this->ninsme = $rs->getString($startcol + 4);

      $this->solmevig = $rs->getBoolean($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npguarde object", $e);
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
			$con = Propel::getConnection(NpguardePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpguardePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpguardePeer::DATABASE_NAME);
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
					$pk = NpguardePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpguardePeer::doUpdate($this, $con);
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


			if (($retval = NpguardePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpguardePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcon();
				break;
			case 1:
				return $this->getNomgua();
				break;
			case 2:
				return $this->getNomcon();
				break;
			case 3:
				return $this->getRifgua();
				break;
			case 4:
				return $this->getNinsme();
				break;
			case 5:
				return $this->getSolmevig();
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
		$keys = NpguardePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcon(),
			$keys[1] => $this->getNomgua(),
			$keys[2] => $this->getNomcon(),
			$keys[3] => $this->getRifgua(),
			$keys[4] => $this->getNinsme(),
			$keys[5] => $this->getSolmevig(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpguardePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcon($value);
				break;
			case 1:
				$this->setNomgua($value);
				break;
			case 2:
				$this->setNomcon($value);
				break;
			case 3:
				$this->setRifgua($value);
				break;
			case 4:
				$this->setNinsme($value);
				break;
			case 5:
				$this->setSolmevig($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpguardePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomgua($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomcon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRifgua($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNinsme($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setSolmevig($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpguardePeer::DATABASE_NAME);

		if ($this->isColumnModified(NpguardePeer::CODCON)) $criteria->add(NpguardePeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NpguardePeer::NOMGUA)) $criteria->add(NpguardePeer::NOMGUA, $this->nomgua);
		if ($this->isColumnModified(NpguardePeer::NOMCON)) $criteria->add(NpguardePeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(NpguardePeer::RIFGUA)) $criteria->add(NpguardePeer::RIFGUA, $this->rifgua);
		if ($this->isColumnModified(NpguardePeer::NINSME)) $criteria->add(NpguardePeer::NINSME, $this->ninsme);
		if ($this->isColumnModified(NpguardePeer::SOLMEVIG)) $criteria->add(NpguardePeer::SOLMEVIG, $this->solmevig);
		if ($this->isColumnModified(NpguardePeer::ID)) $criteria->add(NpguardePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpguardePeer::DATABASE_NAME);

		$criteria->add(NpguardePeer::ID, $this->id);

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

		$copyObj->setCodcon($this->codcon);

		$copyObj->setNomgua($this->nomgua);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setRifgua($this->rifgua);

		$copyObj->setNinsme($this->ninsme);

		$copyObj->setSolmevig($this->solmevig);


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
			self::$peer = new NpguardePeer();
		}
		return self::$peer;
	}

} 
