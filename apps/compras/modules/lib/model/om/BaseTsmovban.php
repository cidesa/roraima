<?php


abstract class BaseTsmovban extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numcue;


	
	protected $codcta;


	
	protected $refban;


	
	protected $fecban;


	
	protected $tipmov;


	
	protected $desban;


	
	protected $monmov;


	
	protected $status;


	
	protected $stacon;


	
	protected $transito;


	
	protected $stacon1;


	
	protected $id;

	
	protected $aTsdefban;

	
	protected $aTstipmov;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumcue()
  {

    return trim($this->numcue);

  }
  
  public function getCodcta()
  {

    return trim($this->codcta);

  }
  
  public function getRefban()
  {

    return trim($this->refban);

  }
  
  public function getFecban($format = 'Y-m-d')
  {

    if ($this->fecban === null || $this->fecban === '') {
      return null;
    } elseif (!is_int($this->fecban)) {
            $ts = adodb_strtotime($this->fecban);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecban] as date/time value: " . var_export($this->fecban, true));
      }
    } else {
      $ts = $this->fecban;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getTipmov()
  {

    return trim($this->tipmov);

  }
  
  public function getDesban()
  {

    return trim($this->desban);

  }
  
  public function getMonmov($val=false)
  {

    if($val) return number_format($this->monmov,2,',','.');
    else return $this->monmov;

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getStacon()
  {

    return trim($this->stacon);

  }
  
  public function getTransito()
  {

    return trim($this->transito);

  }
  
  public function getStacon1()
  {

    return trim($this->stacon1);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumcue($v)
	{

    if ($this->numcue !== $v) {
        $this->numcue = $v;
        $this->modifiedColumns[] = TsmovbanPeer::NUMCUE;
      }
  
		if ($this->aTsdefban !== null && $this->aTsdefban->getNumcue() !== $v) {
			$this->aTsdefban = null;
		}

	} 
	
	public function setCodcta($v)
	{

    if ($this->codcta !== $v) {
        $this->codcta = $v;
        $this->modifiedColumns[] = TsmovbanPeer::CODCTA;
      }
  
	} 
	
	public function setRefban($v)
	{

    if ($this->refban !== $v) {
        $this->refban = $v;
        $this->modifiedColumns[] = TsmovbanPeer::REFBAN;
      }
  
	} 
	
	public function setFecban($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecban] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecban !== $ts) {
      $this->fecban = $ts;
      $this->modifiedColumns[] = TsmovbanPeer::FECBAN;
    }

	} 
	
	public function setTipmov($v)
	{

    if ($this->tipmov !== $v) {
        $this->tipmov = $v;
        $this->modifiedColumns[] = TsmovbanPeer::TIPMOV;
      }
  
		if ($this->aTstipmov !== null && $this->aTstipmov->getCodtip() !== $v) {
			$this->aTstipmov = null;
		}

	} 
	
	public function setDesban($v)
	{

    if ($this->desban !== $v) {
        $this->desban = $v;
        $this->modifiedColumns[] = TsmovbanPeer::DESBAN;
      }
  
	} 
	
	public function setMonmov($v)
	{

    if ($this->monmov !== $v) {
        $this->monmov = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TsmovbanPeer::MONMOV;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = TsmovbanPeer::STATUS;
      }
  
	} 
	
	public function setStacon($v)
	{

    if ($this->stacon !== $v) {
        $this->stacon = $v;
        $this->modifiedColumns[] = TsmovbanPeer::STACON;
      }
  
	} 
	
	public function setTransito($v)
	{

    if ($this->transito !== $v) {
        $this->transito = $v;
        $this->modifiedColumns[] = TsmovbanPeer::TRANSITO;
      }
  
	} 
	
	public function setStacon1($v)
	{

    if ($this->stacon1 !== $v) {
        $this->stacon1 = $v;
        $this->modifiedColumns[] = TsmovbanPeer::STACON1;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = TsmovbanPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numcue = $rs->getString($startcol + 0);

      $this->codcta = $rs->getString($startcol + 1);

      $this->refban = $rs->getString($startcol + 2);

      $this->fecban = $rs->getDate($startcol + 3, null);

      $this->tipmov = $rs->getString($startcol + 4);

      $this->desban = $rs->getString($startcol + 5);

      $this->monmov = $rs->getFloat($startcol + 6);

      $this->status = $rs->getString($startcol + 7);

      $this->stacon = $rs->getString($startcol + 8);

      $this->transito = $rs->getString($startcol + 9);

      $this->stacon1 = $rs->getString($startcol + 10);

      $this->id = $rs->getInt($startcol + 11);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 12; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Tsmovban object", $e);
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
			$con = Propel::getConnection(TsmovbanPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TsmovbanPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TsmovbanPeer::DATABASE_NAME);
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


												
			if ($this->aTsdefban !== null) {
				if ($this->aTsdefban->isModified()) {
					$affectedRows += $this->aTsdefban->save($con);
				}
				$this->setTsdefban($this->aTsdefban);
			}

			if ($this->aTstipmov !== null) {
				if ($this->aTstipmov->isModified()) {
					$affectedRows += $this->aTstipmov->save($con);
				}
				$this->setTstipmov($this->aTstipmov);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = TsmovbanPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TsmovbanPeer::doUpdate($this, $con);
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


												
			if ($this->aTsdefban !== null) {
				if (!$this->aTsdefban->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTsdefban->getValidationFailures());
				}
			}

			if ($this->aTstipmov !== null) {
				if (!$this->aTstipmov->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTstipmov->getValidationFailures());
				}
			}


			if (($retval = TsmovbanPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsmovbanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumcue();
				break;
			case 1:
				return $this->getCodcta();
				break;
			case 2:
				return $this->getRefban();
				break;
			case 3:
				return $this->getFecban();
				break;
			case 4:
				return $this->getTipmov();
				break;
			case 5:
				return $this->getDesban();
				break;
			case 6:
				return $this->getMonmov();
				break;
			case 7:
				return $this->getStatus();
				break;
			case 8:
				return $this->getStacon();
				break;
			case 9:
				return $this->getTransito();
				break;
			case 10:
				return $this->getStacon1();
				break;
			case 11:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsmovbanPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumcue(),
			$keys[1] => $this->getCodcta(),
			$keys[2] => $this->getRefban(),
			$keys[3] => $this->getFecban(),
			$keys[4] => $this->getTipmov(),
			$keys[5] => $this->getDesban(),
			$keys[6] => $this->getMonmov(),
			$keys[7] => $this->getStatus(),
			$keys[8] => $this->getStacon(),
			$keys[9] => $this->getTransito(),
			$keys[10] => $this->getStacon1(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsmovbanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumcue($value);
				break;
			case 1:
				$this->setCodcta($value);
				break;
			case 2:
				$this->setRefban($value);
				break;
			case 3:
				$this->setFecban($value);
				break;
			case 4:
				$this->setTipmov($value);
				break;
			case 5:
				$this->setDesban($value);
				break;
			case 6:
				$this->setMonmov($value);
				break;
			case 7:
				$this->setStatus($value);
				break;
			case 8:
				$this->setStacon($value);
				break;
			case 9:
				$this->setTransito($value);
				break;
			case 10:
				$this->setStacon1($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsmovbanPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumcue($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcta($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRefban($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecban($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTipmov($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDesban($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonmov($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setStatus($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setStacon($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTransito($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setStacon1($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TsmovbanPeer::DATABASE_NAME);

		if ($this->isColumnModified(TsmovbanPeer::NUMCUE)) $criteria->add(TsmovbanPeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(TsmovbanPeer::CODCTA)) $criteria->add(TsmovbanPeer::CODCTA, $this->codcta);
		if ($this->isColumnModified(TsmovbanPeer::REFBAN)) $criteria->add(TsmovbanPeer::REFBAN, $this->refban);
		if ($this->isColumnModified(TsmovbanPeer::FECBAN)) $criteria->add(TsmovbanPeer::FECBAN, $this->fecban);
		if ($this->isColumnModified(TsmovbanPeer::TIPMOV)) $criteria->add(TsmovbanPeer::TIPMOV, $this->tipmov);
		if ($this->isColumnModified(TsmovbanPeer::DESBAN)) $criteria->add(TsmovbanPeer::DESBAN, $this->desban);
		if ($this->isColumnModified(TsmovbanPeer::MONMOV)) $criteria->add(TsmovbanPeer::MONMOV, $this->monmov);
		if ($this->isColumnModified(TsmovbanPeer::STATUS)) $criteria->add(TsmovbanPeer::STATUS, $this->status);
		if ($this->isColumnModified(TsmovbanPeer::STACON)) $criteria->add(TsmovbanPeer::STACON, $this->stacon);
		if ($this->isColumnModified(TsmovbanPeer::TRANSITO)) $criteria->add(TsmovbanPeer::TRANSITO, $this->transito);
		if ($this->isColumnModified(TsmovbanPeer::STACON1)) $criteria->add(TsmovbanPeer::STACON1, $this->stacon1);
		if ($this->isColumnModified(TsmovbanPeer::ID)) $criteria->add(TsmovbanPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TsmovbanPeer::DATABASE_NAME);

		$criteria->add(TsmovbanPeer::ID, $this->id);

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

		$copyObj->setNumcue($this->numcue);

		$copyObj->setCodcta($this->codcta);

		$copyObj->setRefban($this->refban);

		$copyObj->setFecban($this->fecban);

		$copyObj->setTipmov($this->tipmov);

		$copyObj->setDesban($this->desban);

		$copyObj->setMonmov($this->monmov);

		$copyObj->setStatus($this->status);

		$copyObj->setStacon($this->stacon);

		$copyObj->setTransito($this->transito);

		$copyObj->setStacon1($this->stacon1);


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
			self::$peer = new TsmovbanPeer();
		}
		return self::$peer;
	}

	
	public function setTsdefban($v)
	{


		if ($v === null) {
			$this->setNumcue(NULL);
		} else {
			$this->setNumcue($v->getNumcue());
		}


		$this->aTsdefban = $v;
	}


	
	public function getTsdefban($con = null)
	{
		if ($this->aTsdefban === null && (($this->numcue !== "" && $this->numcue !== null))) {
						include_once 'lib/model/om/BaseTsdefbanPeer.php';

      $c = new Criteria();
      $c->add(TsdefbanPeer::NUMCUE,$this->numcue);
      
			$this->aTsdefban = TsdefbanPeer::doSelectOne($c, $con);

			
		}
		return $this->aTsdefban;
	}

	
	public function setTstipmov($v)
	{


		if ($v === null) {
			$this->setTipmov(NULL);
		} else {
			$this->setTipmov($v->getCodtip());
		}


		$this->aTstipmov = $v;
	}


	
	public function getTstipmov($con = null)
	{
		if ($this->aTstipmov === null && (($this->tipmov !== "" && $this->tipmov !== null))) {
						include_once 'lib/model/om/BaseTstipmovPeer.php';

      $c = new Criteria();
      $c->add(TstipmovPeer::CODTIP,$this->tipmov);
      
			$this->aTstipmov = TstipmovPeer::doSelectOne($c, $con);

			
		}
		return $this->aTstipmov;
	}

} 