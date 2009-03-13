<?php


abstract class BaseNpfondoprestaciones extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codnom;


	
	protected $codconacudia;


	
	protected $codconacumonto;


	
	protected $codconacuinteres;


	
	protected $capitalizarinteres;


	
	protected $acumprestamos;


	
	protected $codconprestamo;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodnom()
  {

    return trim($this->codnom);

  }
  
  public function getCodconacudia()
  {

    return trim($this->codconacudia);

  }
  
  public function getCodconacumonto()
  {

    return trim($this->codconacumonto);

  }
  
  public function getCodconacuinteres()
  {

    return trim($this->codconacuinteres);

  }
  
  public function getCapitalizarinteres()
  {

    return trim($this->capitalizarinteres);

  }
  
  public function getAcumprestamos()
  {

    return trim($this->acumprestamos);

  }
  
  public function getCodconprestamo()
  {

    return trim($this->codconprestamo);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodnom($v)
	{

    if ($this->codnom !== $v) {
        $this->codnom = $v;
        $this->modifiedColumns[] = NpfondoprestacionesPeer::CODNOM;
      }
  
	} 
	
	public function setCodconacudia($v)
	{

    if ($this->codconacudia !== $v) {
        $this->codconacudia = $v;
        $this->modifiedColumns[] = NpfondoprestacionesPeer::CODCONACUDIA;
      }
  
	} 
	
	public function setCodconacumonto($v)
	{

    if ($this->codconacumonto !== $v) {
        $this->codconacumonto = $v;
        $this->modifiedColumns[] = NpfondoprestacionesPeer::CODCONACUMONTO;
      }
  
	} 
	
	public function setCodconacuinteres($v)
	{

    if ($this->codconacuinteres !== $v) {
        $this->codconacuinteres = $v;
        $this->modifiedColumns[] = NpfondoprestacionesPeer::CODCONACUINTERES;
      }
  
	} 
	
	public function setCapitalizarinteres($v)
	{

    if ($this->capitalizarinteres !== $v) {
        $this->capitalizarinteres = $v;
        $this->modifiedColumns[] = NpfondoprestacionesPeer::CAPITALIZARINTERES;
      }
  
	} 
	
	public function setAcumprestamos($v)
	{

    if ($this->acumprestamos !== $v) {
        $this->acumprestamos = $v;
        $this->modifiedColumns[] = NpfondoprestacionesPeer::ACUMPRESTAMOS;
      }
  
	} 
	
	public function setCodconprestamo($v)
	{

    if ($this->codconprestamo !== $v) {
        $this->codconprestamo = $v;
        $this->modifiedColumns[] = NpfondoprestacionesPeer::CODCONPRESTAMO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpfondoprestacionesPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codnom = $rs->getString($startcol + 0);

      $this->codconacudia = $rs->getString($startcol + 1);

      $this->codconacumonto = $rs->getString($startcol + 2);

      $this->codconacuinteres = $rs->getString($startcol + 3);

      $this->capitalizarinteres = $rs->getString($startcol + 4);

      $this->acumprestamos = $rs->getString($startcol + 5);

      $this->codconprestamo = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npfondoprestaciones object", $e);
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
			$con = Propel::getConnection(NpfondoprestacionesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpfondoprestacionesPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpfondoprestacionesPeer::DATABASE_NAME);
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
					$pk = NpfondoprestacionesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpfondoprestacionesPeer::doUpdate($this, $con);
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


			if (($retval = NpfondoprestacionesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpfondoprestacionesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodnom();
				break;
			case 1:
				return $this->getCodconacudia();
				break;
			case 2:
				return $this->getCodconacumonto();
				break;
			case 3:
				return $this->getCodconacuinteres();
				break;
			case 4:
				return $this->getCapitalizarinteres();
				break;
			case 5:
				return $this->getAcumprestamos();
				break;
			case 6:
				return $this->getCodconprestamo();
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
		$keys = NpfondoprestacionesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodnom(),
			$keys[1] => $this->getCodconacudia(),
			$keys[2] => $this->getCodconacumonto(),
			$keys[3] => $this->getCodconacuinteres(),
			$keys[4] => $this->getCapitalizarinteres(),
			$keys[5] => $this->getAcumprestamos(),
			$keys[6] => $this->getCodconprestamo(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpfondoprestacionesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodnom($value);
				break;
			case 1:
				$this->setCodconacudia($value);
				break;
			case 2:
				$this->setCodconacumonto($value);
				break;
			case 3:
				$this->setCodconacuinteres($value);
				break;
			case 4:
				$this->setCapitalizarinteres($value);
				break;
			case 5:
				$this->setAcumprestamos($value);
				break;
			case 6:
				$this->setCodconprestamo($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpfondoprestacionesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodnom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodconacudia($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodconacumonto($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodconacuinteres($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCapitalizarinteres($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAcumprestamos($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodconprestamo($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpfondoprestacionesPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpfondoprestacionesPeer::CODNOM)) $criteria->add(NpfondoprestacionesPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpfondoprestacionesPeer::CODCONACUDIA)) $criteria->add(NpfondoprestacionesPeer::CODCONACUDIA, $this->codconacudia);
		if ($this->isColumnModified(NpfondoprestacionesPeer::CODCONACUMONTO)) $criteria->add(NpfondoprestacionesPeer::CODCONACUMONTO, $this->codconacumonto);
		if ($this->isColumnModified(NpfondoprestacionesPeer::CODCONACUINTERES)) $criteria->add(NpfondoprestacionesPeer::CODCONACUINTERES, $this->codconacuinteres);
		if ($this->isColumnModified(NpfondoprestacionesPeer::CAPITALIZARINTERES)) $criteria->add(NpfondoprestacionesPeer::CAPITALIZARINTERES, $this->capitalizarinteres);
		if ($this->isColumnModified(NpfondoprestacionesPeer::ACUMPRESTAMOS)) $criteria->add(NpfondoprestacionesPeer::ACUMPRESTAMOS, $this->acumprestamos);
		if ($this->isColumnModified(NpfondoprestacionesPeer::CODCONPRESTAMO)) $criteria->add(NpfondoprestacionesPeer::CODCONPRESTAMO, $this->codconprestamo);
		if ($this->isColumnModified(NpfondoprestacionesPeer::ID)) $criteria->add(NpfondoprestacionesPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpfondoprestacionesPeer::DATABASE_NAME);

		$criteria->add(NpfondoprestacionesPeer::ID, $this->id);

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

		$copyObj->setCodnom($this->codnom);

		$copyObj->setCodconacudia($this->codconacudia);

		$copyObj->setCodconacumonto($this->codconacumonto);

		$copyObj->setCodconacuinteres($this->codconacuinteres);

		$copyObj->setCapitalizarinteres($this->capitalizarinteres);

		$copyObj->setAcumprestamos($this->acumprestamos);

		$copyObj->setCodconprestamo($this->codconprestamo);


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
			self::$peer = new NpfondoprestacionesPeer();
		}
		return self::$peer;
	}

} 