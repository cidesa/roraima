<?php


abstract class BaseForencpryaccespmet extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpro;


	
	protected $codaccesp;


	
	protected $codmet;


	
	protected $canmet;


	
	protected $canact;


	
	protected $totpre;


	
	protected $codact;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getCodaccesp()
  {

    return trim($this->codaccesp);

  }
  
  public function getCodmet()
  {

    return trim($this->codmet);

  }
  
  public function getCanmet($val=false)
  {

    if($val) return number_format($this->canmet,2,',','.');
    else return $this->canmet;

  }
  
  public function getCanact($val=false)
  {

    if($val) return number_format($this->canact,2,',','.');
    else return $this->canact;

  }
  
  public function getTotpre($val=false)
  {

    if($val) return number_format($this->totpre,2,',','.');
    else return $this->totpre;

  }
  
  public function getCodact()
  {

    return trim($this->codact);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = ForencpryaccespmetPeer::CODPRO;
      }
  
	} 
	
	public function setCodaccesp($v)
	{

    if ($this->codaccesp !== $v) {
        $this->codaccesp = $v;
        $this->modifiedColumns[] = ForencpryaccespmetPeer::CODACCESP;
      }
  
	} 
	
	public function setCodmet($v)
	{

    if ($this->codmet !== $v) {
        $this->codmet = $v;
        $this->modifiedColumns[] = ForencpryaccespmetPeer::CODMET;
      }
  
	} 
	
	public function setCanmet($v)
	{

    if ($this->canmet !== $v) {
        $this->canmet = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForencpryaccespmetPeer::CANMET;
      }
  
	} 
	
	public function setCanact($v)
	{

    if ($this->canact !== $v) {
        $this->canact = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForencpryaccespmetPeer::CANACT;
      }
  
	} 
	
	public function setTotpre($v)
	{

    if ($this->totpre !== $v) {
        $this->totpre = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForencpryaccespmetPeer::TOTPRE;
      }
  
	} 
	
	public function setCodact($v)
	{

    if ($this->codact !== $v) {
        $this->codact = $v;
        $this->modifiedColumns[] = ForencpryaccespmetPeer::CODACT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ForencpryaccespmetPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codpro = $rs->getString($startcol + 0);

      $this->codaccesp = $rs->getString($startcol + 1);

      $this->codmet = $rs->getString($startcol + 2);

      $this->canmet = $rs->getFloat($startcol + 3);

      $this->canact = $rs->getFloat($startcol + 4);

      $this->totpre = $rs->getFloat($startcol + 5);

      $this->codact = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Forencpryaccespmet object", $e);
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
			$con = Propel::getConnection(ForencpryaccespmetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForencpryaccespmetPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForencpryaccespmetPeer::DATABASE_NAME);
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
					$pk = ForencpryaccespmetPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ForencpryaccespmetPeer::doUpdate($this, $con);
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


			if (($retval = ForencpryaccespmetPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForencpryaccespmetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpro();
				break;
			case 1:
				return $this->getCodaccesp();
				break;
			case 2:
				return $this->getCodmet();
				break;
			case 3:
				return $this->getCanmet();
				break;
			case 4:
				return $this->getCanact();
				break;
			case 5:
				return $this->getTotpre();
				break;
			case 6:
				return $this->getCodact();
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
		$keys = ForencpryaccespmetPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpro(),
			$keys[1] => $this->getCodaccesp(),
			$keys[2] => $this->getCodmet(),
			$keys[3] => $this->getCanmet(),
			$keys[4] => $this->getCanact(),
			$keys[5] => $this->getTotpre(),
			$keys[6] => $this->getCodact(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForencpryaccespmetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpro($value);
				break;
			case 1:
				$this->setCodaccesp($value);
				break;
			case 2:
				$this->setCodmet($value);
				break;
			case 3:
				$this->setCanmet($value);
				break;
			case 4:
				$this->setCanact($value);
				break;
			case 5:
				$this->setTotpre($value);
				break;
			case 6:
				$this->setCodact($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForencpryaccespmetPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpro($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodaccesp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodmet($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCanmet($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCanact($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTotpre($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodact($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForencpryaccespmetPeer::DATABASE_NAME);

		if ($this->isColumnModified(ForencpryaccespmetPeer::CODPRO)) $criteria->add(ForencpryaccespmetPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(ForencpryaccespmetPeer::CODACCESP)) $criteria->add(ForencpryaccespmetPeer::CODACCESP, $this->codaccesp);
		if ($this->isColumnModified(ForencpryaccespmetPeer::CODMET)) $criteria->add(ForencpryaccespmetPeer::CODMET, $this->codmet);
		if ($this->isColumnModified(ForencpryaccespmetPeer::CANMET)) $criteria->add(ForencpryaccespmetPeer::CANMET, $this->canmet);
		if ($this->isColumnModified(ForencpryaccespmetPeer::CANACT)) $criteria->add(ForencpryaccespmetPeer::CANACT, $this->canact);
		if ($this->isColumnModified(ForencpryaccespmetPeer::TOTPRE)) $criteria->add(ForencpryaccespmetPeer::TOTPRE, $this->totpre);
		if ($this->isColumnModified(ForencpryaccespmetPeer::CODACT)) $criteria->add(ForencpryaccespmetPeer::CODACT, $this->codact);
		if ($this->isColumnModified(ForencpryaccespmetPeer::ID)) $criteria->add(ForencpryaccespmetPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForencpryaccespmetPeer::DATABASE_NAME);

		$criteria->add(ForencpryaccespmetPeer::ID, $this->id);

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

		$copyObj->setCodpro($this->codpro);

		$copyObj->setCodaccesp($this->codaccesp);

		$copyObj->setCodmet($this->codmet);

		$copyObj->setCanmet($this->canmet);

		$copyObj->setCanact($this->canact);

		$copyObj->setTotpre($this->totpre);

		$copyObj->setCodact($this->codact);


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
			self::$peer = new ForencpryaccespmetPeer();
		}
		return self::$peer;
	}

} 