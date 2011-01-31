<?php


abstract class BaseTabla25 extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpre;


	
	protected $nompre;


	
	protected $perpre;


	
	protected $anopre;


	
	protected $monasi;


	
	protected $monprc;


	
	protected $moncom;


	
	protected $moncau;


	
	protected $monpag;


	
	protected $montra;


	
	protected $montrn;


	
	protected $monadi;


	
	protected $mondim;


	
	protected $monaju;


	
	protected $mondis;


	
	protected $difere;


	
	protected $status;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getNompre()
  {

    return trim($this->nompre);

  }
  
  public function getPerpre()
  {

    return trim($this->perpre);

  }
  
  public function getAnopre()
  {

    return trim($this->anopre);

  }
  
  public function getMonasi($val=false)
  {

    if($val) return number_format($this->monasi,2,',','.');
    else return $this->monasi;

  }
  
  public function getMonprc($val=false)
  {

    if($val) return number_format($this->monprc,2,',','.');
    else return $this->monprc;

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
  
  public function getMontra($val=false)
  {

    if($val) return number_format($this->montra,2,',','.');
    else return $this->montra;

  }
  
  public function getMontrn($val=false)
  {

    if($val) return number_format($this->montrn,2,',','.');
    else return $this->montrn;

  }
  
  public function getMonadi($val=false)
  {

    if($val) return number_format($this->monadi,2,',','.');
    else return $this->monadi;

  }
  
  public function getMondim($val=false)
  {

    if($val) return number_format($this->mondim,2,',','.');
    else return $this->mondim;

  }
  
  public function getMonaju($val=false)
  {

    if($val) return number_format($this->monaju,2,',','.');
    else return $this->monaju;

  }
  
  public function getMondis($val=false)
  {

    if($val) return number_format($this->mondis,2,',','.');
    else return $this->mondis;

  }
  
  public function getDifere($val=false)
  {

    if($val) return number_format($this->difere,2,',','.');
    else return $this->difere;

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = Tabla25Peer::CODPRE;
      }
  
	} 
	
	public function setNompre($v)
	{

    if ($this->nompre !== $v) {
        $this->nompre = $v;
        $this->modifiedColumns[] = Tabla25Peer::NOMPRE;
      }
  
	} 
	
	public function setPerpre($v)
	{

    if ($this->perpre !== $v) {
        $this->perpre = $v;
        $this->modifiedColumns[] = Tabla25Peer::PERPRE;
      }
  
	} 
	
	public function setAnopre($v)
	{

    if ($this->anopre !== $v) {
        $this->anopre = $v;
        $this->modifiedColumns[] = Tabla25Peer::ANOPRE;
      }
  
	} 
	
	public function setMonasi($v)
	{

    if ($this->monasi !== $v) {
        $this->monasi = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Tabla25Peer::MONASI;
      }
  
	} 
	
	public function setMonprc($v)
	{

    if ($this->monprc !== $v) {
        $this->monprc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Tabla25Peer::MONPRC;
      }
  
	} 
	
	public function setMoncom($v)
	{

    if ($this->moncom !== $v) {
        $this->moncom = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Tabla25Peer::MONCOM;
      }
  
	} 
	
	public function setMoncau($v)
	{

    if ($this->moncau !== $v) {
        $this->moncau = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Tabla25Peer::MONCAU;
      }
  
	} 
	
	public function setMonpag($v)
	{

    if ($this->monpag !== $v) {
        $this->monpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Tabla25Peer::MONPAG;
      }
  
	} 
	
	public function setMontra($v)
	{

    if ($this->montra !== $v) {
        $this->montra = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Tabla25Peer::MONTRA;
      }
  
	} 
	
	public function setMontrn($v)
	{

    if ($this->montrn !== $v) {
        $this->montrn = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Tabla25Peer::MONTRN;
      }
  
	} 
	
	public function setMonadi($v)
	{

    if ($this->monadi !== $v) {
        $this->monadi = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Tabla25Peer::MONADI;
      }
  
	} 
	
	public function setMondim($v)
	{

    if ($this->mondim !== $v) {
        $this->mondim = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Tabla25Peer::MONDIM;
      }
  
	} 
	
	public function setMonaju($v)
	{

    if ($this->monaju !== $v) {
        $this->monaju = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Tabla25Peer::MONAJU;
      }
  
	} 
	
	public function setMondis($v)
	{

    if ($this->mondis !== $v) {
        $this->mondis = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Tabla25Peer::MONDIS;
      }
  
	} 
	
	public function setDifere($v)
	{

    if ($this->difere !== $v) {
        $this->difere = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Tabla25Peer::DIFERE;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = Tabla25Peer::STATUS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = Tabla25Peer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codpre = $rs->getString($startcol + 0);

      $this->nompre = $rs->getString($startcol + 1);

      $this->perpre = $rs->getString($startcol + 2);

      $this->anopre = $rs->getString($startcol + 3);

      $this->monasi = $rs->getFloat($startcol + 4);

      $this->monprc = $rs->getFloat($startcol + 5);

      $this->moncom = $rs->getFloat($startcol + 6);

      $this->moncau = $rs->getFloat($startcol + 7);

      $this->monpag = $rs->getFloat($startcol + 8);

      $this->montra = $rs->getFloat($startcol + 9);

      $this->montrn = $rs->getFloat($startcol + 10);

      $this->monadi = $rs->getFloat($startcol + 11);

      $this->mondim = $rs->getFloat($startcol + 12);

      $this->monaju = $rs->getFloat($startcol + 13);

      $this->mondis = $rs->getFloat($startcol + 14);

      $this->difere = $rs->getFloat($startcol + 15);

      $this->status = $rs->getString($startcol + 16);

      $this->id = $rs->getInt($startcol + 17);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 18; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Tabla25 object", $e);
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
			$con = Propel::getConnection(Tabla25Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			Tabla25Peer::doDelete($this, $con);
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
			$con = Propel::getConnection(Tabla25Peer::DATABASE_NAME);
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
					$pk = Tabla25Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += Tabla25Peer::doUpdate($this, $con);
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


			if (($retval = Tabla25Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Tabla25Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpre();
				break;
			case 1:
				return $this->getNompre();
				break;
			case 2:
				return $this->getPerpre();
				break;
			case 3:
				return $this->getAnopre();
				break;
			case 4:
				return $this->getMonasi();
				break;
			case 5:
				return $this->getMonprc();
				break;
			case 6:
				return $this->getMoncom();
				break;
			case 7:
				return $this->getMoncau();
				break;
			case 8:
				return $this->getMonpag();
				break;
			case 9:
				return $this->getMontra();
				break;
			case 10:
				return $this->getMontrn();
				break;
			case 11:
				return $this->getMonadi();
				break;
			case 12:
				return $this->getMondim();
				break;
			case 13:
				return $this->getMonaju();
				break;
			case 14:
				return $this->getMondis();
				break;
			case 15:
				return $this->getDifere();
				break;
			case 16:
				return $this->getStatus();
				break;
			case 17:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Tabla25Peer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpre(),
			$keys[1] => $this->getNompre(),
			$keys[2] => $this->getPerpre(),
			$keys[3] => $this->getAnopre(),
			$keys[4] => $this->getMonasi(),
			$keys[5] => $this->getMonprc(),
			$keys[6] => $this->getMoncom(),
			$keys[7] => $this->getMoncau(),
			$keys[8] => $this->getMonpag(),
			$keys[9] => $this->getMontra(),
			$keys[10] => $this->getMontrn(),
			$keys[11] => $this->getMonadi(),
			$keys[12] => $this->getMondim(),
			$keys[13] => $this->getMonaju(),
			$keys[14] => $this->getMondis(),
			$keys[15] => $this->getDifere(),
			$keys[16] => $this->getStatus(),
			$keys[17] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Tabla25Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpre($value);
				break;
			case 1:
				$this->setNompre($value);
				break;
			case 2:
				$this->setPerpre($value);
				break;
			case 3:
				$this->setAnopre($value);
				break;
			case 4:
				$this->setMonasi($value);
				break;
			case 5:
				$this->setMonprc($value);
				break;
			case 6:
				$this->setMoncom($value);
				break;
			case 7:
				$this->setMoncau($value);
				break;
			case 8:
				$this->setMonpag($value);
				break;
			case 9:
				$this->setMontra($value);
				break;
			case 10:
				$this->setMontrn($value);
				break;
			case 11:
				$this->setMonadi($value);
				break;
			case 12:
				$this->setMondim($value);
				break;
			case 13:
				$this->setMonaju($value);
				break;
			case 14:
				$this->setMondis($value);
				break;
			case 15:
				$this->setDifere($value);
				break;
			case 16:
				$this->setStatus($value);
				break;
			case 17:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Tabla25Peer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpre($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNompre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPerpre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAnopre($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonasi($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonprc($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMoncom($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMoncau($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMonpag($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setMontra($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setMontrn($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setMonadi($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setMondim($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setMonaju($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setMondis($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setDifere($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setStatus($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setId($arr[$keys[17]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(Tabla25Peer::DATABASE_NAME);

		if ($this->isColumnModified(Tabla25Peer::CODPRE)) $criteria->add(Tabla25Peer::CODPRE, $this->codpre);
		if ($this->isColumnModified(Tabla25Peer::NOMPRE)) $criteria->add(Tabla25Peer::NOMPRE, $this->nompre);
		if ($this->isColumnModified(Tabla25Peer::PERPRE)) $criteria->add(Tabla25Peer::PERPRE, $this->perpre);
		if ($this->isColumnModified(Tabla25Peer::ANOPRE)) $criteria->add(Tabla25Peer::ANOPRE, $this->anopre);
		if ($this->isColumnModified(Tabla25Peer::MONASI)) $criteria->add(Tabla25Peer::MONASI, $this->monasi);
		if ($this->isColumnModified(Tabla25Peer::MONPRC)) $criteria->add(Tabla25Peer::MONPRC, $this->monprc);
		if ($this->isColumnModified(Tabla25Peer::MONCOM)) $criteria->add(Tabla25Peer::MONCOM, $this->moncom);
		if ($this->isColumnModified(Tabla25Peer::MONCAU)) $criteria->add(Tabla25Peer::MONCAU, $this->moncau);
		if ($this->isColumnModified(Tabla25Peer::MONPAG)) $criteria->add(Tabla25Peer::MONPAG, $this->monpag);
		if ($this->isColumnModified(Tabla25Peer::MONTRA)) $criteria->add(Tabla25Peer::MONTRA, $this->montra);
		if ($this->isColumnModified(Tabla25Peer::MONTRN)) $criteria->add(Tabla25Peer::MONTRN, $this->montrn);
		if ($this->isColumnModified(Tabla25Peer::MONADI)) $criteria->add(Tabla25Peer::MONADI, $this->monadi);
		if ($this->isColumnModified(Tabla25Peer::MONDIM)) $criteria->add(Tabla25Peer::MONDIM, $this->mondim);
		if ($this->isColumnModified(Tabla25Peer::MONAJU)) $criteria->add(Tabla25Peer::MONAJU, $this->monaju);
		if ($this->isColumnModified(Tabla25Peer::MONDIS)) $criteria->add(Tabla25Peer::MONDIS, $this->mondis);
		if ($this->isColumnModified(Tabla25Peer::DIFERE)) $criteria->add(Tabla25Peer::DIFERE, $this->difere);
		if ($this->isColumnModified(Tabla25Peer::STATUS)) $criteria->add(Tabla25Peer::STATUS, $this->status);
		if ($this->isColumnModified(Tabla25Peer::ID)) $criteria->add(Tabla25Peer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Tabla25Peer::DATABASE_NAME);

		$criteria->add(Tabla25Peer::ID, $this->id);

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

		$copyObj->setCodpre($this->codpre);

		$copyObj->setNompre($this->nompre);

		$copyObj->setPerpre($this->perpre);

		$copyObj->setAnopre($this->anopre);

		$copyObj->setMonasi($this->monasi);

		$copyObj->setMonprc($this->monprc);

		$copyObj->setMoncom($this->moncom);

		$copyObj->setMoncau($this->moncau);

		$copyObj->setMonpag($this->monpag);

		$copyObj->setMontra($this->montra);

		$copyObj->setMontrn($this->montrn);

		$copyObj->setMonadi($this->monadi);

		$copyObj->setMondim($this->mondim);

		$copyObj->setMonaju($this->monaju);

		$copyObj->setMondis($this->mondis);

		$copyObj->setDifere($this->difere);

		$copyObj->setStatus($this->status);


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
			self::$peer = new Tabla25Peer();
		}
		return self::$peer;
	}

} 