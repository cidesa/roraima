<?php


abstract class BaseAplicacion extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codapl;


	
	protected $nomapl;


	
	protected $nomuse;


	
	protected $aplact;


	
	protected $aplpri;


	
	protected $nomyml;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodapl()
  {

    return trim($this->codapl);

  }
  
  public function getNomapl()
  {

    return trim($this->nomapl);

  }
  
  public function getNomuse()
  {

    return trim($this->nomuse);

  }
  
  public function getAplact()
  {

    return trim($this->aplact);

  }
  
  public function getAplpri()
  {

    return trim($this->aplpri);

  }
  
  public function getNomyml()
  {

    return trim($this->nomyml);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodapl($v)
	{

    if ($this->codapl !== $v) {
        $this->codapl = $v;
        $this->modifiedColumns[] = AplicacionPeer::CODAPL;
      }
  
	} 
	
	public function setNomapl($v)
	{

    if ($this->nomapl !== $v) {
        $this->nomapl = $v;
        $this->modifiedColumns[] = AplicacionPeer::NOMAPL;
      }
  
	} 
	
	public function setNomuse($v)
	{

    if ($this->nomuse !== $v) {
        $this->nomuse = $v;
        $this->modifiedColumns[] = AplicacionPeer::NOMUSE;
      }
  
	} 
	
	public function setAplact($v)
	{

    if ($this->aplact !== $v) {
        $this->aplact = $v;
        $this->modifiedColumns[] = AplicacionPeer::APLACT;
      }
  
	} 
	
	public function setAplpri($v)
	{

    if ($this->aplpri !== $v) {
        $this->aplpri = $v;
        $this->modifiedColumns[] = AplicacionPeer::APLPRI;
      }
  
	} 
	
	public function setNomyml($v)
	{

    if ($this->nomyml !== $v) {
        $this->nomyml = $v;
        $this->modifiedColumns[] = AplicacionPeer::NOMYML;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AplicacionPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codapl = $rs->getString($startcol + 0);

      $this->nomapl = $rs->getString($startcol + 1);

      $this->nomuse = $rs->getString($startcol + 2);

      $this->aplact = $rs->getString($startcol + 3);

      $this->aplpri = $rs->getString($startcol + 4);

      $this->nomyml = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Aplicacion object", $e);
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
			$con = Propel::getConnection(AplicacionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AplicacionPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AplicacionPeer::DATABASE_NAME);
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
					$pk = AplicacionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AplicacionPeer::doUpdate($this, $con);
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


			if (($retval = AplicacionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AplicacionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodapl();
				break;
			case 1:
				return $this->getNomapl();
				break;
			case 2:
				return $this->getNomuse();
				break;
			case 3:
				return $this->getAplact();
				break;
			case 4:
				return $this->getAplpri();
				break;
			case 5:
				return $this->getNomyml();
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
		$keys = AplicacionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodapl(),
			$keys[1] => $this->getNomapl(),
			$keys[2] => $this->getNomuse(),
			$keys[3] => $this->getAplact(),
			$keys[4] => $this->getAplpri(),
			$keys[5] => $this->getNomyml(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AplicacionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodapl($value);
				break;
			case 1:
				$this->setNomapl($value);
				break;
			case 2:
				$this->setNomuse($value);
				break;
			case 3:
				$this->setAplact($value);
				break;
			case 4:
				$this->setAplpri($value);
				break;
			case 5:
				$this->setNomyml($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AplicacionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodapl($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomapl($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomuse($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAplact($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAplpri($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNomyml($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AplicacionPeer::DATABASE_NAME);

		if ($this->isColumnModified(AplicacionPeer::CODAPL)) $criteria->add(AplicacionPeer::CODAPL, $this->codapl);
		if ($this->isColumnModified(AplicacionPeer::NOMAPL)) $criteria->add(AplicacionPeer::NOMAPL, $this->nomapl);
		if ($this->isColumnModified(AplicacionPeer::NOMUSE)) $criteria->add(AplicacionPeer::NOMUSE, $this->nomuse);
		if ($this->isColumnModified(AplicacionPeer::APLACT)) $criteria->add(AplicacionPeer::APLACT, $this->aplact);
		if ($this->isColumnModified(AplicacionPeer::APLPRI)) $criteria->add(AplicacionPeer::APLPRI, $this->aplpri);
		if ($this->isColumnModified(AplicacionPeer::NOMYML)) $criteria->add(AplicacionPeer::NOMYML, $this->nomyml);
		if ($this->isColumnModified(AplicacionPeer::ID)) $criteria->add(AplicacionPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AplicacionPeer::DATABASE_NAME);

		$criteria->add(AplicacionPeer::ID, $this->id);

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

		$copyObj->setCodapl($this->codapl);

		$copyObj->setNomapl($this->nomapl);

		$copyObj->setNomuse($this->nomuse);

		$copyObj->setAplact($this->aplact);

		$copyObj->setAplpri($this->aplpri);

		$copyObj->setNomyml($this->nomyml);


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
			self::$peer = new AplicacionPeer();
		}
		return self::$peer;
	}

} 