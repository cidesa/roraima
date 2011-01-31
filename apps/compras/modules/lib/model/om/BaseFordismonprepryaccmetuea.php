<?php


abstract class BaseFordismonprepryaccmetuea extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpro;


	
	protected $codaccesp;


	
	protected $codmet;


	
	protected $codpar;


	
	protected $codpre;


	
	protected $perpre;


	
	protected $monper;


	
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
  
  public function getCodpar()
  {

    return trim($this->codpar);

  }
  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getPerpre()
  {

    return trim($this->perpre);

  }
  
  public function getMonper($val=false)
  {

    if($val) return number_format($this->monper,2,',','.');
    else return $this->monper;

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
        $this->modifiedColumns[] = FordismonprepryaccmetueaPeer::CODPRO;
      }
  
	} 
	
	public function setCodaccesp($v)
	{

    if ($this->codaccesp !== $v) {
        $this->codaccesp = $v;
        $this->modifiedColumns[] = FordismonprepryaccmetueaPeer::CODACCESP;
      }
  
	} 
	
	public function setCodmet($v)
	{

    if ($this->codmet !== $v) {
        $this->codmet = $v;
        $this->modifiedColumns[] = FordismonprepryaccmetueaPeer::CODMET;
      }
  
	} 
	
	public function setCodpar($v)
	{

    if ($this->codpar !== $v) {
        $this->codpar = $v;
        $this->modifiedColumns[] = FordismonprepryaccmetueaPeer::CODPAR;
      }
  
	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = FordismonprepryaccmetueaPeer::CODPRE;
      }
  
	} 
	
	public function setPerpre($v)
	{

    if ($this->perpre !== $v) {
        $this->perpre = $v;
        $this->modifiedColumns[] = FordismonprepryaccmetueaPeer::PERPRE;
      }
  
	} 
	
	public function setMonper($v)
	{

    if ($this->monper !== $v) {
        $this->monper = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FordismonprepryaccmetueaPeer::MONPER;
      }
  
	} 
	
	public function setCodact($v)
	{

    if ($this->codact !== $v) {
        $this->codact = $v;
        $this->modifiedColumns[] = FordismonprepryaccmetueaPeer::CODACT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FordismonprepryaccmetueaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codpro = $rs->getString($startcol + 0);

      $this->codaccesp = $rs->getString($startcol + 1);

      $this->codmet = $rs->getString($startcol + 2);

      $this->codpar = $rs->getString($startcol + 3);

      $this->codpre = $rs->getString($startcol + 4);

      $this->perpre = $rs->getString($startcol + 5);

      $this->monper = $rs->getFloat($startcol + 6);

      $this->codact = $rs->getString($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fordismonprepryaccmetuea object", $e);
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
			$con = Propel::getConnection(FordismonprepryaccmetueaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FordismonprepryaccmetueaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FordismonprepryaccmetueaPeer::DATABASE_NAME);
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
					$pk = FordismonprepryaccmetueaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FordismonprepryaccmetueaPeer::doUpdate($this, $con);
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


			if (($retval = FordismonprepryaccmetueaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordismonprepryaccmetueaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCodpar();
				break;
			case 4:
				return $this->getCodpre();
				break;
			case 5:
				return $this->getPerpre();
				break;
			case 6:
				return $this->getMonper();
				break;
			case 7:
				return $this->getCodact();
				break;
			case 8:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordismonprepryaccmetueaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpro(),
			$keys[1] => $this->getCodaccesp(),
			$keys[2] => $this->getCodmet(),
			$keys[3] => $this->getCodpar(),
			$keys[4] => $this->getCodpre(),
			$keys[5] => $this->getPerpre(),
			$keys[6] => $this->getMonper(),
			$keys[7] => $this->getCodact(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordismonprepryaccmetueaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCodpar($value);
				break;
			case 4:
				$this->setCodpre($value);
				break;
			case 5:
				$this->setPerpre($value);
				break;
			case 6:
				$this->setMonper($value);
				break;
			case 7:
				$this->setCodact($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordismonprepryaccmetueaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpro($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodaccesp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodmet($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodpar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodpre($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPerpre($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonper($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodact($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FordismonprepryaccmetueaPeer::DATABASE_NAME);

		if ($this->isColumnModified(FordismonprepryaccmetueaPeer::CODPRO)) $criteria->add(FordismonprepryaccmetueaPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(FordismonprepryaccmetueaPeer::CODACCESP)) $criteria->add(FordismonprepryaccmetueaPeer::CODACCESP, $this->codaccesp);
		if ($this->isColumnModified(FordismonprepryaccmetueaPeer::CODMET)) $criteria->add(FordismonprepryaccmetueaPeer::CODMET, $this->codmet);
		if ($this->isColumnModified(FordismonprepryaccmetueaPeer::CODPAR)) $criteria->add(FordismonprepryaccmetueaPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(FordismonprepryaccmetueaPeer::CODPRE)) $criteria->add(FordismonprepryaccmetueaPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(FordismonprepryaccmetueaPeer::PERPRE)) $criteria->add(FordismonprepryaccmetueaPeer::PERPRE, $this->perpre);
		if ($this->isColumnModified(FordismonprepryaccmetueaPeer::MONPER)) $criteria->add(FordismonprepryaccmetueaPeer::MONPER, $this->monper);
		if ($this->isColumnModified(FordismonprepryaccmetueaPeer::CODACT)) $criteria->add(FordismonprepryaccmetueaPeer::CODACT, $this->codact);
		if ($this->isColumnModified(FordismonprepryaccmetueaPeer::ID)) $criteria->add(FordismonprepryaccmetueaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FordismonprepryaccmetueaPeer::DATABASE_NAME);

		$criteria->add(FordismonprepryaccmetueaPeer::ID, $this->id);

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

		$copyObj->setCodpar($this->codpar);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setPerpre($this->perpre);

		$copyObj->setMonper($this->monper);

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
			self::$peer = new FordismonprepryaccmetueaPeer();
		}
		return self::$peer;
	}

} 