<?php


abstract class BaseFcmultas extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codmul;


	
	protected $nommul;


	
	protected $tipo;


	
	protected $modo;


	
	protected $monpro;


	
	protected $tipdec;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodmul()
  {

    return trim($this->codmul);

  }
  
  public function getNommul()
  {

    return trim($this->nommul);

  }
  
  public function getTipo()
  {

    return trim($this->tipo);

  }
  
  public function getModo()
  {

    return trim($this->modo);

  }
  
  public function getMonpro()
  {

    return trim($this->monpro);

  }
  
  public function getTipdec()
  {

    return trim($this->tipdec);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodmul($v)
	{

    if ($this->codmul !== $v) {
        $this->codmul = $v;
        $this->modifiedColumns[] = FcmultasPeer::CODMUL;
      }
  
	} 
	
	public function setNommul($v)
	{

    if ($this->nommul !== $v) {
        $this->nommul = $v;
        $this->modifiedColumns[] = FcmultasPeer::NOMMUL;
      }
  
	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = FcmultasPeer::TIPO;
      }
  
	} 
	
	public function setModo($v)
	{

    if ($this->modo !== $v) {
        $this->modo = $v;
        $this->modifiedColumns[] = FcmultasPeer::MODO;
      }
  
	} 
	
	public function setMonpro($v)
	{

    if ($this->monpro !== $v) {
        $this->monpro = $v;
        $this->modifiedColumns[] = FcmultasPeer::MONPRO;
      }
  
	} 
	
	public function setTipdec($v)
	{

    if ($this->tipdec !== $v) {
        $this->tipdec = $v;
        $this->modifiedColumns[] = FcmultasPeer::TIPDEC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcmultasPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codmul = $rs->getString($startcol + 0);

      $this->nommul = $rs->getString($startcol + 1);

      $this->tipo = $rs->getString($startcol + 2);

      $this->modo = $rs->getString($startcol + 3);

      $this->monpro = $rs->getString($startcol + 4);

      $this->tipdec = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcmultas object", $e);
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
			$con = Propel::getConnection(FcmultasPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcmultasPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcmultasPeer::DATABASE_NAME);
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
					$pk = FcmultasPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcmultasPeer::doUpdate($this, $con);
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


			if (($retval = FcmultasPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcmultasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodmul();
				break;
			case 1:
				return $this->getNommul();
				break;
			case 2:
				return $this->getTipo();
				break;
			case 3:
				return $this->getModo();
				break;
			case 4:
				return $this->getMonpro();
				break;
			case 5:
				return $this->getTipdec();
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
		$keys = FcmultasPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodmul(),
			$keys[1] => $this->getNommul(),
			$keys[2] => $this->getTipo(),
			$keys[3] => $this->getModo(),
			$keys[4] => $this->getMonpro(),
			$keys[5] => $this->getTipdec(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcmultasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodmul($value);
				break;
			case 1:
				$this->setNommul($value);
				break;
			case 2:
				$this->setTipo($value);
				break;
			case 3:
				$this->setModo($value);
				break;
			case 4:
				$this->setMonpro($value);
				break;
			case 5:
				$this->setTipdec($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcmultasPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodmul($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNommul($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setModo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonpro($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTipdec($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcmultasPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcmultasPeer::CODMUL)) $criteria->add(FcmultasPeer::CODMUL, $this->codmul);
		if ($this->isColumnModified(FcmultasPeer::NOMMUL)) $criteria->add(FcmultasPeer::NOMMUL, $this->nommul);
		if ($this->isColumnModified(FcmultasPeer::TIPO)) $criteria->add(FcmultasPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(FcmultasPeer::MODO)) $criteria->add(FcmultasPeer::MODO, $this->modo);
		if ($this->isColumnModified(FcmultasPeer::MONPRO)) $criteria->add(FcmultasPeer::MONPRO, $this->monpro);
		if ($this->isColumnModified(FcmultasPeer::TIPDEC)) $criteria->add(FcmultasPeer::TIPDEC, $this->tipdec);
		if ($this->isColumnModified(FcmultasPeer::ID)) $criteria->add(FcmultasPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcmultasPeer::DATABASE_NAME);

		$criteria->add(FcmultasPeer::ID, $this->id);

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

		$copyObj->setCodmul($this->codmul);

		$copyObj->setNommul($this->nommul);

		$copyObj->setTipo($this->tipo);

		$copyObj->setModo($this->modo);

		$copyObj->setMonpro($this->monpro);

		$copyObj->setTipdec($this->tipdec);


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
			self::$peer = new FcmultasPeer();
		}
		return self::$peer;
	}

} 