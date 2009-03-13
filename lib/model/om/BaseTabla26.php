<?php


abstract class BaseTabla26 extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refprc;


	
	protected $codpre;


	
	protected $monimp;


	
	protected $moncom;


	
	protected $moncau;


	
	protected $monpag;


	
	protected $monaju;


	
	protected $staimp;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefprc()
  {

    return trim($this->refprc);

  }
  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getMonimp($val=false)
  {

    if($val) return number_format($this->monimp,2,',','.');
    else return $this->monimp;

  }
  
  public function getMoncom($val=false)
  {

    if($val) return number_format($this->moncom,2,',','.');
    else return $this->moncom;

  }
  
  public function getMoncau($val=false)
  {

    if($val) return number_format($this->moncau,2,',','.');
    else return $this->moncau;

  }
  
  public function getMonpag($val=false)
  {

    if($val) return number_format($this->monpag,2,',','.');
    else return $this->monpag;

  }
  
  public function getMonaju($val=false)
  {

    if($val) return number_format($this->monaju,2,',','.');
    else return $this->monaju;

  }
  
  public function getStaimp()
  {

    return trim($this->staimp);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefprc($v)
	{

    if ($this->refprc !== $v) {
        $this->refprc = $v;
        $this->modifiedColumns[] = Tabla26Peer::REFPRC;
      }
  
	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = Tabla26Peer::CODPRE;
      }
  
	} 
	
	public function setMonimp($v)
	{

    if ($this->monimp !== $v) {
        $this->monimp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Tabla26Peer::MONIMP;
      }
  
	} 
	
	public function setMoncom($v)
	{

    if ($this->moncom !== $v) {
        $this->moncom = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Tabla26Peer::MONCOM;
      }
  
	} 
	
	public function setMoncau($v)
	{

    if ($this->moncau !== $v) {
        $this->moncau = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Tabla26Peer::MONCAU;
      }
  
	} 
	
	public function setMonpag($v)
	{

    if ($this->monpag !== $v) {
        $this->monpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Tabla26Peer::MONPAG;
      }
  
	} 
	
	public function setMonaju($v)
	{

    if ($this->monaju !== $v) {
        $this->monaju = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Tabla26Peer::MONAJU;
      }
  
	} 
	
	public function setStaimp($v)
	{

    if ($this->staimp !== $v) {
        $this->staimp = $v;
        $this->modifiedColumns[] = Tabla26Peer::STAIMP;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = Tabla26Peer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refprc = $rs->getString($startcol + 0);

      $this->codpre = $rs->getString($startcol + 1);

      $this->monimp = $rs->getFloat($startcol + 2);

      $this->moncom = $rs->getFloat($startcol + 3);

      $this->moncau = $rs->getFloat($startcol + 4);

      $this->monpag = $rs->getFloat($startcol + 5);

      $this->monaju = $rs->getFloat($startcol + 6);

      $this->staimp = $rs->getString($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Tabla26 object", $e);
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
			$con = Propel::getConnection(Tabla26Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			Tabla26Peer::doDelete($this, $con);
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
			$con = Propel::getConnection(Tabla26Peer::DATABASE_NAME);
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
					$pk = Tabla26Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += Tabla26Peer::doUpdate($this, $con);
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


			if (($retval = Tabla26Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Tabla26Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefprc();
				break;
			case 1:
				return $this->getCodpre();
				break;
			case 2:
				return $this->getMonimp();
				break;
			case 3:
				return $this->getMoncom();
				break;
			case 4:
				return $this->getMoncau();
				break;
			case 5:
				return $this->getMonpag();
				break;
			case 6:
				return $this->getMonaju();
				break;
			case 7:
				return $this->getStaimp();
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
		$keys = Tabla26Peer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefprc(),
			$keys[1] => $this->getCodpre(),
			$keys[2] => $this->getMonimp(),
			$keys[3] => $this->getMoncom(),
			$keys[4] => $this->getMoncau(),
			$keys[5] => $this->getMonpag(),
			$keys[6] => $this->getMonaju(),
			$keys[7] => $this->getStaimp(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Tabla26Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefprc($value);
				break;
			case 1:
				$this->setCodpre($value);
				break;
			case 2:
				$this->setMonimp($value);
				break;
			case 3:
				$this->setMoncom($value);
				break;
			case 4:
				$this->setMoncau($value);
				break;
			case 5:
				$this->setMonpag($value);
				break;
			case 6:
				$this->setMonaju($value);
				break;
			case 7:
				$this->setStaimp($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Tabla26Peer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefprc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonimp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMoncom($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMoncau($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonpag($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonaju($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setStaimp($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(Tabla26Peer::DATABASE_NAME);

		if ($this->isColumnModified(Tabla26Peer::REFPRC)) $criteria->add(Tabla26Peer::REFPRC, $this->refprc);
		if ($this->isColumnModified(Tabla26Peer::CODPRE)) $criteria->add(Tabla26Peer::CODPRE, $this->codpre);
		if ($this->isColumnModified(Tabla26Peer::MONIMP)) $criteria->add(Tabla26Peer::MONIMP, $this->monimp);
		if ($this->isColumnModified(Tabla26Peer::MONCOM)) $criteria->add(Tabla26Peer::MONCOM, $this->moncom);
		if ($this->isColumnModified(Tabla26Peer::MONCAU)) $criteria->add(Tabla26Peer::MONCAU, $this->moncau);
		if ($this->isColumnModified(Tabla26Peer::MONPAG)) $criteria->add(Tabla26Peer::MONPAG, $this->monpag);
		if ($this->isColumnModified(Tabla26Peer::MONAJU)) $criteria->add(Tabla26Peer::MONAJU, $this->monaju);
		if ($this->isColumnModified(Tabla26Peer::STAIMP)) $criteria->add(Tabla26Peer::STAIMP, $this->staimp);
		if ($this->isColumnModified(Tabla26Peer::ID)) $criteria->add(Tabla26Peer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Tabla26Peer::DATABASE_NAME);

		$criteria->add(Tabla26Peer::ID, $this->id);

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

		$copyObj->setRefprc($this->refprc);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setMonimp($this->monimp);

		$copyObj->setMoncom($this->moncom);

		$copyObj->setMoncau($this->moncau);

		$copyObj->setMonpag($this->monpag);

		$copyObj->setMonaju($this->monaju);

		$copyObj->setStaimp($this->staimp);


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
			self::$peer = new Tabla26Peer();
		}
		return self::$peer;
	}

} 