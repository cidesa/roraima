<?php


abstract class BaseFcrepliq extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numrep;


	
	protected $ano;


	
	protected $codact;


	
	protected $moning;


	
	protected $monimp;


	
	protected $monfis;


	
	protected $porali;


	
	protected $monliq;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumrep()
  {

    return trim($this->numrep);

  }
  
  public function getAno()
  {

    return trim($this->ano);

  }
  
  public function getCodact()
  {

    return trim($this->codact);

  }
  
  public function getMoning($val=false)
  {

    if($val) return number_format($this->moning,2,',','.');
    else return $this->moning;

  }
  
  public function getMonimp($val=false)
  {

    if($val) return number_format($this->monimp,2,',','.');
    else return $this->monimp;

  }
  
  public function getMonfis($val=false)
  {

    if($val) return number_format($this->monfis,2,',','.');
    else return $this->monfis;

  }
  
  public function getPorali($val=false)
  {

    if($val) return number_format($this->porali,2,',','.');
    else return $this->porali;

  }
  
  public function getMonliq($val=false)
  {

    if($val) return number_format($this->monliq,2,',','.');
    else return $this->monliq;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumrep($v)
	{

    if ($this->numrep !== $v) {
        $this->numrep = $v;
        $this->modifiedColumns[] = FcrepliqPeer::NUMREP;
      }
  
	} 
	
	public function setAno($v)
	{

    if ($this->ano !== $v) {
        $this->ano = $v;
        $this->modifiedColumns[] = FcrepliqPeer::ANO;
      }
  
	} 
	
	public function setCodact($v)
	{

    if ($this->codact !== $v) {
        $this->codact = $v;
        $this->modifiedColumns[] = FcrepliqPeer::CODACT;
      }
  
	} 
	
	public function setMoning($v)
	{

    if ($this->moning !== $v) {
        $this->moning = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcrepliqPeer::MONING;
      }
  
	} 
	
	public function setMonimp($v)
	{

    if ($this->monimp !== $v) {
        $this->monimp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcrepliqPeer::MONIMP;
      }
  
	} 
	
	public function setMonfis($v)
	{

    if ($this->monfis !== $v) {
        $this->monfis = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcrepliqPeer::MONFIS;
      }
  
	} 
	
	public function setPorali($v)
	{

    if ($this->porali !== $v) {
        $this->porali = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcrepliqPeer::PORALI;
      }
  
	} 
	
	public function setMonliq($v)
	{

    if ($this->monliq !== $v) {
        $this->monliq = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcrepliqPeer::MONLIQ;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcrepliqPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numrep = $rs->getString($startcol + 0);

      $this->ano = $rs->getString($startcol + 1);

      $this->codact = $rs->getString($startcol + 2);

      $this->moning = $rs->getFloat($startcol + 3);

      $this->monimp = $rs->getFloat($startcol + 4);

      $this->monfis = $rs->getFloat($startcol + 5);

      $this->porali = $rs->getFloat($startcol + 6);

      $this->monliq = $rs->getFloat($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcrepliq object", $e);
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
			$con = Propel::getConnection(FcrepliqPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcrepliqPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcrepliqPeer::DATABASE_NAME);
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
					$pk = FcrepliqPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcrepliqPeer::doUpdate($this, $con);
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


			if (($retval = FcrepliqPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcrepliqPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumrep();
				break;
			case 1:
				return $this->getAno();
				break;
			case 2:
				return $this->getCodact();
				break;
			case 3:
				return $this->getMoning();
				break;
			case 4:
				return $this->getMonimp();
				break;
			case 5:
				return $this->getMonfis();
				break;
			case 6:
				return $this->getPorali();
				break;
			case 7:
				return $this->getMonliq();
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
		$keys = FcrepliqPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumrep(),
			$keys[1] => $this->getAno(),
			$keys[2] => $this->getCodact(),
			$keys[3] => $this->getMoning(),
			$keys[4] => $this->getMonimp(),
			$keys[5] => $this->getMonfis(),
			$keys[6] => $this->getPorali(),
			$keys[7] => $this->getMonliq(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcrepliqPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumrep($value);
				break;
			case 1:
				$this->setAno($value);
				break;
			case 2:
				$this->setCodact($value);
				break;
			case 3:
				$this->setMoning($value);
				break;
			case 4:
				$this->setMonimp($value);
				break;
			case 5:
				$this->setMonfis($value);
				break;
			case 6:
				$this->setPorali($value);
				break;
			case 7:
				$this->setMonliq($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcrepliqPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumrep($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAno($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodact($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMoning($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonimp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonfis($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPorali($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMonliq($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcrepliqPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcrepliqPeer::NUMREP)) $criteria->add(FcrepliqPeer::NUMREP, $this->numrep);
		if ($this->isColumnModified(FcrepliqPeer::ANO)) $criteria->add(FcrepliqPeer::ANO, $this->ano);
		if ($this->isColumnModified(FcrepliqPeer::CODACT)) $criteria->add(FcrepliqPeer::CODACT, $this->codact);
		if ($this->isColumnModified(FcrepliqPeer::MONING)) $criteria->add(FcrepliqPeer::MONING, $this->moning);
		if ($this->isColumnModified(FcrepliqPeer::MONIMP)) $criteria->add(FcrepliqPeer::MONIMP, $this->monimp);
		if ($this->isColumnModified(FcrepliqPeer::MONFIS)) $criteria->add(FcrepliqPeer::MONFIS, $this->monfis);
		if ($this->isColumnModified(FcrepliqPeer::PORALI)) $criteria->add(FcrepliqPeer::PORALI, $this->porali);
		if ($this->isColumnModified(FcrepliqPeer::MONLIQ)) $criteria->add(FcrepliqPeer::MONLIQ, $this->monliq);
		if ($this->isColumnModified(FcrepliqPeer::ID)) $criteria->add(FcrepliqPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcrepliqPeer::DATABASE_NAME);

		$criteria->add(FcrepliqPeer::ID, $this->id);

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

		$copyObj->setNumrep($this->numrep);

		$copyObj->setAno($this->ano);

		$copyObj->setCodact($this->codact);

		$copyObj->setMoning($this->moning);

		$copyObj->setMonimp($this->monimp);

		$copyObj->setMonfis($this->monfis);

		$copyObj->setPorali($this->porali);

		$copyObj->setMonliq($this->monliq);


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
			self::$peer = new FcrepliqPeer();
		}
		return self::$peer;
	}

} 