<?php


abstract class BaseOpretord extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numord;


	
	protected $codtip;


	
	protected $monret;


	
	protected $codpre;


	
	protected $numret;


	
	protected $refere;


	
	protected $correl;


	
	protected $monbas;


	
	protected $id;

	
	protected $aOptipret;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumord()
  {

    return trim($this->numord);

  }
  
  public function getCodtip()
  {

    return trim($this->codtip);

  }
  
  public function getMonret($val=false)
  {

    if($val) return number_format($this->monret,2,',','.');
    else return $this->monret;

  }
  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getNumret()
  {

    return trim($this->numret);

  }
  
  public function getRefere()
  {

    return trim($this->refere);

  }
  
  public function getCorrel($val=false)
  {

    if($val) return number_format($this->correl,2,',','.');
    else return $this->correl;

  }
  
  public function getMonbas($val=false)
  {

    if($val) return number_format($this->monbas,2,',','.');
    else return $this->monbas;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumord($v)
	{

    if ($this->numord !== $v) {
        $this->numord = $v;
        $this->modifiedColumns[] = OpretordPeer::NUMORD;
      }
  
	} 
	
	public function setCodtip($v)
	{

    if ($this->codtip !== $v) {
        $this->codtip = $v;
        $this->modifiedColumns[] = OpretordPeer::CODTIP;
      }
  
		if ($this->aOptipret !== null && $this->aOptipret->getCodtip() !== $v) {
			$this->aOptipret = null;
		}

	} 
	
	public function setMonret($v)
	{

    if ($this->monret !== $v) {
        $this->monret = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpretordPeer::MONRET;
      }
  
	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = OpretordPeer::CODPRE;
      }
  
	} 
	
	public function setNumret($v)
	{

    if ($this->numret !== $v) {
        $this->numret = $v;
        $this->modifiedColumns[] = OpretordPeer::NUMRET;
      }
  
	} 
	
	public function setRefere($v)
	{

    if ($this->refere !== $v) {
        $this->refere = $v;
        $this->modifiedColumns[] = OpretordPeer::REFERE;
      }
  
	} 
	
	public function setCorrel($v)
	{

    if ($this->correl !== $v) {
        $this->correl = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpretordPeer::CORREL;
      }
  
	} 
	
	public function setMonbas($v)
	{

    if ($this->monbas !== $v) {
        $this->monbas = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpretordPeer::MONBAS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OpretordPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numord = $rs->getString($startcol + 0);

      $this->codtip = $rs->getString($startcol + 1);

      $this->monret = $rs->getFloat($startcol + 2);

      $this->codpre = $rs->getString($startcol + 3);

      $this->numret = $rs->getString($startcol + 4);

      $this->refere = $rs->getString($startcol + 5);

      $this->correl = $rs->getFloat($startcol + 6);

      $this->monbas = $rs->getFloat($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Opretord object", $e);
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
			$con = Propel::getConnection(OpretordPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OpretordPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OpretordPeer::DATABASE_NAME);
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


												
			if ($this->aOptipret !== null) {
				if ($this->aOptipret->isModified()) {
					$affectedRows += $this->aOptipret->save($con);
				}
				$this->setOptipret($this->aOptipret);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = OpretordPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OpretordPeer::doUpdate($this, $con);
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


												
			if ($this->aOptipret !== null) {
				if (!$this->aOptipret->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aOptipret->getValidationFailures());
				}
			}


			if (($retval = OpretordPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpretordPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumord();
				break;
			case 1:
				return $this->getCodtip();
				break;
			case 2:
				return $this->getMonret();
				break;
			case 3:
				return $this->getCodpre();
				break;
			case 4:
				return $this->getNumret();
				break;
			case 5:
				return $this->getRefere();
				break;
			case 6:
				return $this->getCorrel();
				break;
			case 7:
				return $this->getMonbas();
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
		$keys = OpretordPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumord(),
			$keys[1] => $this->getCodtip(),
			$keys[2] => $this->getMonret(),
			$keys[3] => $this->getCodpre(),
			$keys[4] => $this->getNumret(),
			$keys[5] => $this->getRefere(),
			$keys[6] => $this->getCorrel(),
			$keys[7] => $this->getMonbas(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpretordPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumord($value);
				break;
			case 1:
				$this->setCodtip($value);
				break;
			case 2:
				$this->setMonret($value);
				break;
			case 3:
				$this->setCodpre($value);
				break;
			case 4:
				$this->setNumret($value);
				break;
			case 5:
				$this->setRefere($value);
				break;
			case 6:
				$this->setCorrel($value);
				break;
			case 7:
				$this->setMonbas($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OpretordPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumord($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodtip($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonret($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodpre($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNumret($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRefere($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCorrel($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMonbas($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OpretordPeer::DATABASE_NAME);

		if ($this->isColumnModified(OpretordPeer::NUMORD)) $criteria->add(OpretordPeer::NUMORD, $this->numord);
		if ($this->isColumnModified(OpretordPeer::CODTIP)) $criteria->add(OpretordPeer::CODTIP, $this->codtip);
		if ($this->isColumnModified(OpretordPeer::MONRET)) $criteria->add(OpretordPeer::MONRET, $this->monret);
		if ($this->isColumnModified(OpretordPeer::CODPRE)) $criteria->add(OpretordPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(OpretordPeer::NUMRET)) $criteria->add(OpretordPeer::NUMRET, $this->numret);
		if ($this->isColumnModified(OpretordPeer::REFERE)) $criteria->add(OpretordPeer::REFERE, $this->refere);
		if ($this->isColumnModified(OpretordPeer::CORREL)) $criteria->add(OpretordPeer::CORREL, $this->correl);
		if ($this->isColumnModified(OpretordPeer::MONBAS)) $criteria->add(OpretordPeer::MONBAS, $this->monbas);
		if ($this->isColumnModified(OpretordPeer::ID)) $criteria->add(OpretordPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OpretordPeer::DATABASE_NAME);

		$criteria->add(OpretordPeer::ID, $this->id);

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

		$copyObj->setNumord($this->numord);

		$copyObj->setCodtip($this->codtip);

		$copyObj->setMonret($this->monret);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setNumret($this->numret);

		$copyObj->setRefere($this->refere);

		$copyObj->setCorrel($this->correl);

		$copyObj->setMonbas($this->monbas);


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
			self::$peer = new OpretordPeer();
		}
		return self::$peer;
	}

	
	public function setOptipret($v)
	{


		if ($v === null) {
			$this->setCodtip(NULL);
		} else {
			$this->setCodtip($v->getCodtip());
		}


		$this->aOptipret = $v;
	}


	
	public function getOptipret($con = null)
	{
		if ($this->aOptipret === null && (($this->codtip !== "" && $this->codtip !== null))) {
						include_once 'lib/model/om/BaseOptipretPeer.php';

			$this->aOptipret = OptipretPeer::retrieveByPK($this->codtip, $con);

			
		}
		return $this->aOptipret;
	}

} 