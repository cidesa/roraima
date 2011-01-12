<?php


abstract class BaseCccrereg extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $fecent;


	
	protected $fecsal;


	
	protected $observ;


	
	protected $fecprotoc;


	
	protected $numero;


	
	protected $tomo;


	
	protected $protoc;


	
	protected $folio;


	
	protected $trimes;


	
	protected $anno;


	
	protected $cccredit_id;


	
	protected $ccregnot_id;

	
	protected $aCccredit;

	
	protected $aCcregnot;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getFecent($format = 'Y-m-d')
  {

    if ($this->fecent === null || $this->fecent === '') {
      return null;
    } elseif (!is_int($this->fecent)) {
            $ts = adodb_strtotime($this->fecent);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecent] as date/time value: " . var_export($this->fecent, true));
      }
    } else {
      $ts = $this->fecent;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecsal($format = 'Y-m-d')
  {

    if ($this->fecsal === null || $this->fecsal === '') {
      return null;
    } elseif (!is_int($this->fecsal)) {
            $ts = adodb_strtotime($this->fecsal);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecsal] as date/time value: " . var_export($this->fecsal, true));
      }
    } else {
      $ts = $this->fecsal;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getFecprotoc($format = 'Y-m-d')
  {

    if ($this->fecprotoc === null || $this->fecprotoc === '') {
      return null;
    } elseif (!is_int($this->fecprotoc)) {
            $ts = adodb_strtotime($this->fecprotoc);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecprotoc] as date/time value: " . var_export($this->fecprotoc, true));
      }
    } else {
      $ts = $this->fecprotoc;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNumero()
  {

    return $this->numero;

  }
  
  public function getTomo()
  {

    return $this->tomo;

  }
  
  public function getProtoc()
  {

    return trim($this->protoc);

  }
  
  public function getFolio()
  {

    return $this->folio;

  }
  
  public function getTrimes()
  {

    return trim($this->trimes);

  }
  
  public function getAnno()
  {

    return $this->anno;

  }
  
  public function getCccreditId()
  {

    return $this->cccredit_id;

  }
  
  public function getCcregnotId()
  {

    return $this->ccregnot_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CccreregPeer::ID;
      }
  
	} 
	
	public function setFecent($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecent] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecent !== $ts) {
      $this->fecent = $ts;
      $this->modifiedColumns[] = CccreregPeer::FECENT;
    }

	} 
	
	public function setFecsal($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecsal] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecsal !== $ts) {
      $this->fecsal = $ts;
      $this->modifiedColumns[] = CccreregPeer::FECSAL;
    }

	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = CccreregPeer::OBSERV;
      }
  
	} 
	
	public function setFecprotoc($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecprotoc] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecprotoc !== $ts) {
      $this->fecprotoc = $ts;
      $this->modifiedColumns[] = CccreregPeer::FECPROTOC;
    }

	} 
	
	public function setNumero($v)
	{

    if ($this->numero !== $v) {
        $this->numero = $v;
        $this->modifiedColumns[] = CccreregPeer::NUMERO;
      }
  
	} 
	
	public function setTomo($v)
	{

    if ($this->tomo !== $v) {
        $this->tomo = $v;
        $this->modifiedColumns[] = CccreregPeer::TOMO;
      }
  
	} 
	
	public function setProtoc($v)
	{

    if ($this->protoc !== $v) {
        $this->protoc = $v;
        $this->modifiedColumns[] = CccreregPeer::PROTOC;
      }
  
	} 
	
	public function setFolio($v)
	{

    if ($this->folio !== $v) {
        $this->folio = $v;
        $this->modifiedColumns[] = CccreregPeer::FOLIO;
      }
  
	} 
	
	public function setTrimes($v)
	{

    if ($this->trimes !== $v) {
        $this->trimes = $v;
        $this->modifiedColumns[] = CccreregPeer::TRIMES;
      }
  
	} 
	
	public function setAnno($v)
	{

    if ($this->anno !== $v) {
        $this->anno = $v;
        $this->modifiedColumns[] = CccreregPeer::ANNO;
      }
  
	} 
	
	public function setCccreditId($v)
	{

    if ($this->cccredit_id !== $v) {
        $this->cccredit_id = $v;
        $this->modifiedColumns[] = CccreregPeer::CCCREDIT_ID;
      }
  
		if ($this->aCccredit !== null && $this->aCccredit->getId() !== $v) {
			$this->aCccredit = null;
		}

	} 
	
	public function setCcregnotId($v)
	{

    if ($this->ccregnot_id !== $v) {
        $this->ccregnot_id = $v;
        $this->modifiedColumns[] = CccreregPeer::CCREGNOT_ID;
      }
  
		if ($this->aCcregnot !== null && $this->aCcregnot->getId() !== $v) {
			$this->aCcregnot = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->fecent = $rs->getDate($startcol + 1, null);

      $this->fecsal = $rs->getDate($startcol + 2, null);

      $this->observ = $rs->getString($startcol + 3);

      $this->fecprotoc = $rs->getDate($startcol + 4, null);

      $this->numero = $rs->getInt($startcol + 5);

      $this->tomo = $rs->getInt($startcol + 6);

      $this->protoc = $rs->getString($startcol + 7);

      $this->folio = $rs->getInt($startcol + 8);

      $this->trimes = $rs->getString($startcol + 9);

      $this->anno = $rs->getInt($startcol + 10);

      $this->cccredit_id = $rs->getInt($startcol + 11);

      $this->ccregnot_id = $rs->getInt($startcol + 12);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 13; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cccrereg object", $e);
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
			$con = Propel::getConnection(CccreregPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CccreregPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CccreregPeer::DATABASE_NAME);
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


												
			if ($this->aCccredit !== null) {
				if ($this->aCccredit->isModified()) {
					$affectedRows += $this->aCccredit->save($con);
				}
				$this->setCccredit($this->aCccredit);
			}

			if ($this->aCcregnot !== null) {
				if ($this->aCcregnot->isModified()) {
					$affectedRows += $this->aCcregnot->save($con);
				}
				$this->setCcregnot($this->aCcregnot);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CccreregPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CccreregPeer::doUpdate($this, $con);
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


												
			if ($this->aCccredit !== null) {
				if (!$this->aCccredit->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccredit->getValidationFailures());
				}
			}

			if ($this->aCcregnot !== null) {
				if (!$this->aCcregnot->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcregnot->getValidationFailures());
				}
			}


			if (($retval = CccreregPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CccreregPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getFecent();
				break;
			case 2:
				return $this->getFecsal();
				break;
			case 3:
				return $this->getObserv();
				break;
			case 4:
				return $this->getFecprotoc();
				break;
			case 5:
				return $this->getNumero();
				break;
			case 6:
				return $this->getTomo();
				break;
			case 7:
				return $this->getProtoc();
				break;
			case 8:
				return $this->getFolio();
				break;
			case 9:
				return $this->getTrimes();
				break;
			case 10:
				return $this->getAnno();
				break;
			case 11:
				return $this->getCccreditId();
				break;
			case 12:
				return $this->getCcregnotId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CccreregPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFecent(),
			$keys[2] => $this->getFecsal(),
			$keys[3] => $this->getObserv(),
			$keys[4] => $this->getFecprotoc(),
			$keys[5] => $this->getNumero(),
			$keys[6] => $this->getTomo(),
			$keys[7] => $this->getProtoc(),
			$keys[8] => $this->getFolio(),
			$keys[9] => $this->getTrimes(),
			$keys[10] => $this->getAnno(),
			$keys[11] => $this->getCccreditId(),
			$keys[12] => $this->getCcregnotId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CccreregPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFecent($value);
				break;
			case 2:
				$this->setFecsal($value);
				break;
			case 3:
				$this->setObserv($value);
				break;
			case 4:
				$this->setFecprotoc($value);
				break;
			case 5:
				$this->setNumero($value);
				break;
			case 6:
				$this->setTomo($value);
				break;
			case 7:
				$this->setProtoc($value);
				break;
			case 8:
				$this->setFolio($value);
				break;
			case 9:
				$this->setTrimes($value);
				break;
			case 10:
				$this->setAnno($value);
				break;
			case 11:
				$this->setCccreditId($value);
				break;
			case 12:
				$this->setCcregnotId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CccreregPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecent($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecsal($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setObserv($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecprotoc($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNumero($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTomo($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setProtoc($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFolio($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTrimes($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setAnno($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCccreditId($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCcregnotId($arr[$keys[12]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CccreregPeer::DATABASE_NAME);

		if ($this->isColumnModified(CccreregPeer::ID)) $criteria->add(CccreregPeer::ID, $this->id);
		if ($this->isColumnModified(CccreregPeer::FECENT)) $criteria->add(CccreregPeer::FECENT, $this->fecent);
		if ($this->isColumnModified(CccreregPeer::FECSAL)) $criteria->add(CccreregPeer::FECSAL, $this->fecsal);
		if ($this->isColumnModified(CccreregPeer::OBSERV)) $criteria->add(CccreregPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(CccreregPeer::FECPROTOC)) $criteria->add(CccreregPeer::FECPROTOC, $this->fecprotoc);
		if ($this->isColumnModified(CccreregPeer::NUMERO)) $criteria->add(CccreregPeer::NUMERO, $this->numero);
		if ($this->isColumnModified(CccreregPeer::TOMO)) $criteria->add(CccreregPeer::TOMO, $this->tomo);
		if ($this->isColumnModified(CccreregPeer::PROTOC)) $criteria->add(CccreregPeer::PROTOC, $this->protoc);
		if ($this->isColumnModified(CccreregPeer::FOLIO)) $criteria->add(CccreregPeer::FOLIO, $this->folio);
		if ($this->isColumnModified(CccreregPeer::TRIMES)) $criteria->add(CccreregPeer::TRIMES, $this->trimes);
		if ($this->isColumnModified(CccreregPeer::ANNO)) $criteria->add(CccreregPeer::ANNO, $this->anno);
		if ($this->isColumnModified(CccreregPeer::CCCREDIT_ID)) $criteria->add(CccreregPeer::CCCREDIT_ID, $this->cccredit_id);
		if ($this->isColumnModified(CccreregPeer::CCREGNOT_ID)) $criteria->add(CccreregPeer::CCREGNOT_ID, $this->ccregnot_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CccreregPeer::DATABASE_NAME);

		$criteria->add(CccreregPeer::ID, $this->id);

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

		$copyObj->setFecent($this->fecent);

		$copyObj->setFecsal($this->fecsal);

		$copyObj->setObserv($this->observ);

		$copyObj->setFecprotoc($this->fecprotoc);

		$copyObj->setNumero($this->numero);

		$copyObj->setTomo($this->tomo);

		$copyObj->setProtoc($this->protoc);

		$copyObj->setFolio($this->folio);

		$copyObj->setTrimes($this->trimes);

		$copyObj->setAnno($this->anno);

		$copyObj->setCccreditId($this->cccredit_id);

		$copyObj->setCcregnotId($this->ccregnot_id);


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
			self::$peer = new CccreregPeer();
		}
		return self::$peer;
	}

	
	public function setCccredit($v)
	{


		if ($v === null) {
			$this->setCccreditId(NULL);
		} else {
			$this->setCccreditId($v->getId());
		}


		$this->aCccredit = $v;
	}


	
	public function getCccredit($con = null)
	{
		if ($this->aCccredit === null && ($this->cccredit_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCccreditPeer.php';

      $c = new Criteria();
      $c->add(CccreditPeer::ID,$this->cccredit_id);
      
			$this->aCccredit = CccreditPeer::doSelectOne($c, $con);

			
		}
		return $this->aCccredit;
	}

	
	public function setCcregnot($v)
	{


		if ($v === null) {
			$this->setCcregnotId(NULL);
		} else {
			$this->setCcregnotId($v->getId());
		}


		$this->aCcregnot = $v;
	}


	
	public function getCcregnot($con = null)
	{
		if ($this->aCcregnot === null && ($this->ccregnot_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcregnotPeer.php';

      $c = new Criteria();
      $c->add(CcregnotPeer::ID,$this->ccregnot_id);
      
			$this->aCcregnot = CcregnotPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcregnot;
	}

} 