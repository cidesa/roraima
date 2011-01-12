<?php


abstract class BaseFcesplicdet extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nrocon;


	
	protected $rifcon;


	
	protected $tipesp;


	
	protected $campo;


	
	protected $valor;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNrocon()
  {

    return trim($this->nrocon);

  }
  
  public function getRifcon()
  {

    return trim($this->rifcon);

  }
  
  public function getTipesp()
  {

    return trim($this->tipesp);

  }
  
  public function getCampo()
  {

    return trim($this->campo);

  }
  
  public function getValor($val=false)
  {

    if($val) return number_format($this->valor,2,',','.');
    else return $this->valor;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNrocon($v)
	{

    if ($this->nrocon !== $v) {
        $this->nrocon = $v;
        $this->modifiedColumns[] = FcesplicdetPeer::NROCON;
      }
  
	} 
	
	public function setRifcon($v)
	{

    if ($this->rifcon !== $v) {
        $this->rifcon = $v;
        $this->modifiedColumns[] = FcesplicdetPeer::RIFCON;
      }
  
	} 
	
	public function setTipesp($v)
	{

    if ($this->tipesp !== $v) {
        $this->tipesp = $v;
        $this->modifiedColumns[] = FcesplicdetPeer::TIPESP;
      }
  
	} 
	
	public function setCampo($v)
	{

    if ($this->campo !== $v) {
        $this->campo = $v;
        $this->modifiedColumns[] = FcesplicdetPeer::CAMPO;
      }
  
	} 
	
	public function setValor($v)
	{

    if ($this->valor !== $v) {
        $this->valor = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcesplicdetPeer::VALOR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcesplicdetPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->nrocon = $rs->getString($startcol + 0);

      $this->rifcon = $rs->getString($startcol + 1);

      $this->tipesp = $rs->getString($startcol + 2);

      $this->campo = $rs->getString($startcol + 3);

      $this->valor = $rs->getFloat($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcesplicdet object", $e);
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
			$con = Propel::getConnection(FcesplicdetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcesplicdetPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcesplicdetPeer::DATABASE_NAME);
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
					$pk = FcesplicdetPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcesplicdetPeer::doUpdate($this, $con);
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


			if (($retval = FcesplicdetPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcesplicdetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNrocon();
				break;
			case 1:
				return $this->getRifcon();
				break;
			case 2:
				return $this->getTipesp();
				break;
			case 3:
				return $this->getCampo();
				break;
			case 4:
				return $this->getValor();
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
		$keys = FcesplicdetPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNrocon(),
			$keys[1] => $this->getRifcon(),
			$keys[2] => $this->getTipesp(),
			$keys[3] => $this->getCampo(),
			$keys[4] => $this->getValor(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcesplicdetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNrocon($value);
				break;
			case 1:
				$this->setRifcon($value);
				break;
			case 2:
				$this->setTipesp($value);
				break;
			case 3:
				$this->setCampo($value);
				break;
			case 4:
				$this->setValor($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcesplicdetPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNrocon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRifcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipesp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCampo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setValor($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcesplicdetPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcesplicdetPeer::NROCON)) $criteria->add(FcesplicdetPeer::NROCON, $this->nrocon);
		if ($this->isColumnModified(FcesplicdetPeer::RIFCON)) $criteria->add(FcesplicdetPeer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(FcesplicdetPeer::TIPESP)) $criteria->add(FcesplicdetPeer::TIPESP, $this->tipesp);
		if ($this->isColumnModified(FcesplicdetPeer::CAMPO)) $criteria->add(FcesplicdetPeer::CAMPO, $this->campo);
		if ($this->isColumnModified(FcesplicdetPeer::VALOR)) $criteria->add(FcesplicdetPeer::VALOR, $this->valor);
		if ($this->isColumnModified(FcesplicdetPeer::ID)) $criteria->add(FcesplicdetPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcesplicdetPeer::DATABASE_NAME);

		$criteria->add(FcesplicdetPeer::ID, $this->id);

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

		$copyObj->setNrocon($this->nrocon);

		$copyObj->setRifcon($this->rifcon);

		$copyObj->setTipesp($this->tipesp);

		$copyObj->setCampo($this->campo);

		$copyObj->setValor($this->valor);


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
			self::$peer = new FcesplicdetPeer();
		}
		return self::$peer;
	}

} 