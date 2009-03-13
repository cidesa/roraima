<?php


abstract class BaseNpdefcpt extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcon;


	
	protected $nomcon;


	
	protected $codpar;


	
	protected $opecon;


	
	protected $acuhis;


	
	protected $inimon;


	
	protected $conact;


	
	protected $impcpt;


	
	protected $ordpag;


	
	protected $afepre;


	
	protected $frecon;


	
	protected $nrocta;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
  
  public function getNomcon()
  {

    return trim($this->nomcon);

  }
  
  public function getCodpar()
  {

    return trim($this->codpar);

  }
  
  public function getOpecon()
  {

    return trim($this->opecon);

  }
  
  public function getAcuhis()
  {

    return trim($this->acuhis);

  }
  
  public function getInimon()
  {

    return trim($this->inimon);

  }
  
  public function getConact()
  {

    return trim($this->conact);

  }
  
  public function getImpcpt()
  {

    return trim($this->impcpt);

  }
  
  public function getOrdpag()
  {

    return trim($this->ordpag);

  }
  
  public function getAfepre()
  {

    return trim($this->afepre);

  }
  
  public function getFrecon()
  {

    return trim($this->frecon);

  }
  
  public function getNrocta()
  {

    return trim($this->nrocta);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = NpdefcptPeer::CODCON;
      }
  
	} 
	
	public function setNomcon($v)
	{

    if ($this->nomcon !== $v) {
        $this->nomcon = $v;
        $this->modifiedColumns[] = NpdefcptPeer::NOMCON;
      }
  
	} 
	
	public function setCodpar($v)
	{

    if ($this->codpar !== $v) {
        $this->codpar = $v;
        $this->modifiedColumns[] = NpdefcptPeer::CODPAR;
      }
  
	} 
	
	public function setOpecon($v)
	{

    if ($this->opecon !== $v) {
        $this->opecon = $v;
        $this->modifiedColumns[] = NpdefcptPeer::OPECON;
      }
  
	} 
	
	public function setAcuhis($v)
	{

    if ($this->acuhis !== $v) {
        $this->acuhis = $v;
        $this->modifiedColumns[] = NpdefcptPeer::ACUHIS;
      }
  
	} 
	
	public function setInimon($v)
	{

    if ($this->inimon !== $v) {
        $this->inimon = $v;
        $this->modifiedColumns[] = NpdefcptPeer::INIMON;
      }
  
	} 
	
	public function setConact($v)
	{

    if ($this->conact !== $v) {
        $this->conact = $v;
        $this->modifiedColumns[] = NpdefcptPeer::CONACT;
      }
  
	} 
	
	public function setImpcpt($v)
	{

    if ($this->impcpt !== $v) {
        $this->impcpt = $v;
        $this->modifiedColumns[] = NpdefcptPeer::IMPCPT;
      }
  
	} 
	
	public function setOrdpag($v)
	{

    if ($this->ordpag !== $v) {
        $this->ordpag = $v;
        $this->modifiedColumns[] = NpdefcptPeer::ORDPAG;
      }
  
	} 
	
	public function setAfepre($v)
	{

    if ($this->afepre !== $v) {
        $this->afepre = $v;
        $this->modifiedColumns[] = NpdefcptPeer::AFEPRE;
      }
  
	} 
	
	public function setFrecon($v)
	{

    if ($this->frecon !== $v) {
        $this->frecon = $v;
        $this->modifiedColumns[] = NpdefcptPeer::FRECON;
      }
  
	} 
	
	public function setNrocta($v)
	{

    if ($this->nrocta !== $v) {
        $this->nrocta = $v;
        $this->modifiedColumns[] = NpdefcptPeer::NROCTA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpdefcptPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcon = $rs->getString($startcol + 0);

      $this->nomcon = $rs->getString($startcol + 1);

      $this->codpar = $rs->getString($startcol + 2);

      $this->opecon = $rs->getString($startcol + 3);

      $this->acuhis = $rs->getString($startcol + 4);

      $this->inimon = $rs->getString($startcol + 5);

      $this->conact = $rs->getString($startcol + 6);

      $this->impcpt = $rs->getString($startcol + 7);

      $this->ordpag = $rs->getString($startcol + 8);

      $this->afepre = $rs->getString($startcol + 9);

      $this->frecon = $rs->getString($startcol + 10);

      $this->nrocta = $rs->getString($startcol + 11);

      $this->id = $rs->getInt($startcol + 12);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 13; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npdefcpt object", $e);
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
			$con = Propel::getConnection(NpdefcptPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpdefcptPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpdefcptPeer::DATABASE_NAME);
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
					$pk = NpdefcptPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpdefcptPeer::doUpdate($this, $con);
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


			if (($retval = NpdefcptPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdefcptPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcon();
				break;
			case 1:
				return $this->getNomcon();
				break;
			case 2:
				return $this->getCodpar();
				break;
			case 3:
				return $this->getOpecon();
				break;
			case 4:
				return $this->getAcuhis();
				break;
			case 5:
				return $this->getInimon();
				break;
			case 6:
				return $this->getConact();
				break;
			case 7:
				return $this->getImpcpt();
				break;
			case 8:
				return $this->getOrdpag();
				break;
			case 9:
				return $this->getAfepre();
				break;
			case 10:
				return $this->getFrecon();
				break;
			case 11:
				return $this->getNrocta();
				break;
			case 12:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpdefcptPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcon(),
			$keys[1] => $this->getNomcon(),
			$keys[2] => $this->getCodpar(),
			$keys[3] => $this->getOpecon(),
			$keys[4] => $this->getAcuhis(),
			$keys[5] => $this->getInimon(),
			$keys[6] => $this->getConact(),
			$keys[7] => $this->getImpcpt(),
			$keys[8] => $this->getOrdpag(),
			$keys[9] => $this->getAfepre(),
			$keys[10] => $this->getFrecon(),
			$keys[11] => $this->getNrocta(),
			$keys[12] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdefcptPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcon($value);
				break;
			case 1:
				$this->setNomcon($value);
				break;
			case 2:
				$this->setCodpar($value);
				break;
			case 3:
				$this->setOpecon($value);
				break;
			case 4:
				$this->setAcuhis($value);
				break;
			case 5:
				$this->setInimon($value);
				break;
			case 6:
				$this->setConact($value);
				break;
			case 7:
				$this->setImpcpt($value);
				break;
			case 8:
				$this->setOrdpag($value);
				break;
			case 9:
				$this->setAfepre($value);
				break;
			case 10:
				$this->setFrecon($value);
				break;
			case 11:
				$this->setNrocta($value);
				break;
			case 12:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpdefcptPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodpar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setOpecon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAcuhis($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setInimon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setConact($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setImpcpt($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setOrdpag($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setAfepre($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFrecon($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setNrocta($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setId($arr[$keys[12]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpdefcptPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpdefcptPeer::CODCON)) $criteria->add(NpdefcptPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NpdefcptPeer::NOMCON)) $criteria->add(NpdefcptPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(NpdefcptPeer::CODPAR)) $criteria->add(NpdefcptPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(NpdefcptPeer::OPECON)) $criteria->add(NpdefcptPeer::OPECON, $this->opecon);
		if ($this->isColumnModified(NpdefcptPeer::ACUHIS)) $criteria->add(NpdefcptPeer::ACUHIS, $this->acuhis);
		if ($this->isColumnModified(NpdefcptPeer::INIMON)) $criteria->add(NpdefcptPeer::INIMON, $this->inimon);
		if ($this->isColumnModified(NpdefcptPeer::CONACT)) $criteria->add(NpdefcptPeer::CONACT, $this->conact);
		if ($this->isColumnModified(NpdefcptPeer::IMPCPT)) $criteria->add(NpdefcptPeer::IMPCPT, $this->impcpt);
		if ($this->isColumnModified(NpdefcptPeer::ORDPAG)) $criteria->add(NpdefcptPeer::ORDPAG, $this->ordpag);
		if ($this->isColumnModified(NpdefcptPeer::AFEPRE)) $criteria->add(NpdefcptPeer::AFEPRE, $this->afepre);
		if ($this->isColumnModified(NpdefcptPeer::FRECON)) $criteria->add(NpdefcptPeer::FRECON, $this->frecon);
		if ($this->isColumnModified(NpdefcptPeer::NROCTA)) $criteria->add(NpdefcptPeer::NROCTA, $this->nrocta);
		if ($this->isColumnModified(NpdefcptPeer::ID)) $criteria->add(NpdefcptPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpdefcptPeer::DATABASE_NAME);

		$criteria->add(NpdefcptPeer::ID, $this->id);

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

		$copyObj->setCodcon($this->codcon);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setOpecon($this->opecon);

		$copyObj->setAcuhis($this->acuhis);

		$copyObj->setInimon($this->inimon);

		$copyObj->setConact($this->conact);

		$copyObj->setImpcpt($this->impcpt);

		$copyObj->setOrdpag($this->ordpag);

		$copyObj->setAfepre($this->afepre);

		$copyObj->setFrecon($this->frecon);

		$copyObj->setNrocta($this->nrocta);


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
			self::$peer = new NpdefcptPeer();
		}
		return self::$peer;
	}

} 