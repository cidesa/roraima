<?php


abstract class BaseOpbenefi2 extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $cedrif;


	
	protected $nomben;


	
	protected $dirben;


	
	protected $telben;


	
	protected $codcta;


	
	protected $nitben;


	
	protected $codtipben;


	
	protected $tipper;


	
	protected $nacionalidad;


	
	protected $residente;


	
	protected $constituida;


	
	protected $codord;


	
	protected $codpercon;


	
	protected $codordadi;


	
	protected $codperconadi;


	
	protected $codordcontra;


	
	protected $codpercontra;


	
	protected $temcedrif;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCedrif()
  {

    return trim($this->cedrif);

  }
  
  public function getNomben()
  {

    return trim($this->nomben);

  }
  
  public function getDirben()
  {

    return trim($this->dirben);

  }
  
  public function getTelben()
  {

    return trim($this->telben);

  }
  
  public function getCodcta()
  {

    return trim($this->codcta);

  }
  
  public function getNitben()
  {

    return trim($this->nitben);

  }
  
  public function getCodtipben()
  {

    return trim($this->codtipben);

  }
  
  public function getTipper()
  {

    return trim($this->tipper);

  }
  
  public function getNacionalidad()
  {

    return trim($this->nacionalidad);

  }
  
  public function getResidente()
  {

    return trim($this->residente);

  }
  
  public function getConstituida()
  {

    return trim($this->constituida);

  }
  
  public function getCodord()
  {

    return trim($this->codord);

  }
  
  public function getCodpercon()
  {

    return trim($this->codpercon);

  }
  
  public function getCodordadi()
  {

    return trim($this->codordadi);

  }
  
  public function getCodperconadi()
  {

    return trim($this->codperconadi);

  }
  
  public function getCodordcontra()
  {

    return trim($this->codordcontra);

  }
  
  public function getCodpercontra()
  {

    return trim($this->codpercontra);

  }
  
  public function getTemcedrif()
  {

    return trim($this->temcedrif);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCedrif($v)
	{

    if ($this->cedrif !== $v) {
        $this->cedrif = $v;
        $this->modifiedColumns[] = Opbenefi2Peer::CEDRIF;
      }
  
	} 
	
	public function setNomben($v)
	{

    if ($this->nomben !== $v) {
        $this->nomben = $v;
        $this->modifiedColumns[] = Opbenefi2Peer::NOMBEN;
      }
  
	} 
	
	public function setDirben($v)
	{

    if ($this->dirben !== $v) {
        $this->dirben = $v;
        $this->modifiedColumns[] = Opbenefi2Peer::DIRBEN;
      }
  
	} 
	
	public function setTelben($v)
	{

    if ($this->telben !== $v) {
        $this->telben = $v;
        $this->modifiedColumns[] = Opbenefi2Peer::TELBEN;
      }
  
	} 
	
	public function setCodcta($v)
	{

    if ($this->codcta !== $v) {
        $this->codcta = $v;
        $this->modifiedColumns[] = Opbenefi2Peer::CODCTA;
      }
  
	} 
	
	public function setNitben($v)
	{

    if ($this->nitben !== $v) {
        $this->nitben = $v;
        $this->modifiedColumns[] = Opbenefi2Peer::NITBEN;
      }
  
	} 
	
	public function setCodtipben($v)
	{

    if ($this->codtipben !== $v) {
        $this->codtipben = $v;
        $this->modifiedColumns[] = Opbenefi2Peer::CODTIPBEN;
      }
  
	} 
	
	public function setTipper($v)
	{

    if ($this->tipper !== $v) {
        $this->tipper = $v;
        $this->modifiedColumns[] = Opbenefi2Peer::TIPPER;
      }
  
	} 
	
	public function setNacionalidad($v)
	{

    if ($this->nacionalidad !== $v) {
        $this->nacionalidad = $v;
        $this->modifiedColumns[] = Opbenefi2Peer::NACIONALIDAD;
      }
  
	} 
	
	public function setResidente($v)
	{

    if ($this->residente !== $v) {
        $this->residente = $v;
        $this->modifiedColumns[] = Opbenefi2Peer::RESIDENTE;
      }
  
	} 
	
	public function setConstituida($v)
	{

    if ($this->constituida !== $v) {
        $this->constituida = $v;
        $this->modifiedColumns[] = Opbenefi2Peer::CONSTITUIDA;
      }
  
	} 
	
	public function setCodord($v)
	{

    if ($this->codord !== $v) {
        $this->codord = $v;
        $this->modifiedColumns[] = Opbenefi2Peer::CODORD;
      }
  
	} 
	
	public function setCodpercon($v)
	{

    if ($this->codpercon !== $v) {
        $this->codpercon = $v;
        $this->modifiedColumns[] = Opbenefi2Peer::CODPERCON;
      }
  
	} 
	
	public function setCodordadi($v)
	{

    if ($this->codordadi !== $v) {
        $this->codordadi = $v;
        $this->modifiedColumns[] = Opbenefi2Peer::CODORDADI;
      }
  
	} 
	
	public function setCodperconadi($v)
	{

    if ($this->codperconadi !== $v) {
        $this->codperconadi = $v;
        $this->modifiedColumns[] = Opbenefi2Peer::CODPERCONADI;
      }
  
	} 
	
	public function setCodordcontra($v)
	{

    if ($this->codordcontra !== $v) {
        $this->codordcontra = $v;
        $this->modifiedColumns[] = Opbenefi2Peer::CODORDCONTRA;
      }
  
	} 
	
	public function setCodpercontra($v)
	{

    if ($this->codpercontra !== $v) {
        $this->codpercontra = $v;
        $this->modifiedColumns[] = Opbenefi2Peer::CODPERCONTRA;
      }
  
	} 
	
	public function setTemcedrif($v)
	{

    if ($this->temcedrif !== $v) {
        $this->temcedrif = $v;
        $this->modifiedColumns[] = Opbenefi2Peer::TEMCEDRIF;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = Opbenefi2Peer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->cedrif = $rs->getString($startcol + 0);

      $this->nomben = $rs->getString($startcol + 1);

      $this->dirben = $rs->getString($startcol + 2);

      $this->telben = $rs->getString($startcol + 3);

      $this->codcta = $rs->getString($startcol + 4);

      $this->nitben = $rs->getString($startcol + 5);

      $this->codtipben = $rs->getString($startcol + 6);

      $this->tipper = $rs->getString($startcol + 7);

      $this->nacionalidad = $rs->getString($startcol + 8);

      $this->residente = $rs->getString($startcol + 9);

      $this->constituida = $rs->getString($startcol + 10);

      $this->codord = $rs->getString($startcol + 11);

      $this->codpercon = $rs->getString($startcol + 12);

      $this->codordadi = $rs->getString($startcol + 13);

      $this->codperconadi = $rs->getString($startcol + 14);

      $this->codordcontra = $rs->getString($startcol + 15);

      $this->codpercontra = $rs->getString($startcol + 16);

      $this->temcedrif = $rs->getString($startcol + 17);

      $this->id = $rs->getInt($startcol + 18);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 19; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Opbenefi2 object", $e);
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
			$con = Propel::getConnection(Opbenefi2Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			Opbenefi2Peer::doDelete($this, $con);
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
			$con = Propel::getConnection(Opbenefi2Peer::DATABASE_NAME);
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
					$pk = Opbenefi2Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += Opbenefi2Peer::doUpdate($this, $con);
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


			if (($retval = Opbenefi2Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Opbenefi2Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCedrif();
				break;
			case 1:
				return $this->getNomben();
				break;
			case 2:
				return $this->getDirben();
				break;
			case 3:
				return $this->getTelben();
				break;
			case 4:
				return $this->getCodcta();
				break;
			case 5:
				return $this->getNitben();
				break;
			case 6:
				return $this->getCodtipben();
				break;
			case 7:
				return $this->getTipper();
				break;
			case 8:
				return $this->getNacionalidad();
				break;
			case 9:
				return $this->getResidente();
				break;
			case 10:
				return $this->getConstituida();
				break;
			case 11:
				return $this->getCodord();
				break;
			case 12:
				return $this->getCodpercon();
				break;
			case 13:
				return $this->getCodordadi();
				break;
			case 14:
				return $this->getCodperconadi();
				break;
			case 15:
				return $this->getCodordcontra();
				break;
			case 16:
				return $this->getCodpercontra();
				break;
			case 17:
				return $this->getTemcedrif();
				break;
			case 18:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Opbenefi2Peer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCedrif(),
			$keys[1] => $this->getNomben(),
			$keys[2] => $this->getDirben(),
			$keys[3] => $this->getTelben(),
			$keys[4] => $this->getCodcta(),
			$keys[5] => $this->getNitben(),
			$keys[6] => $this->getCodtipben(),
			$keys[7] => $this->getTipper(),
			$keys[8] => $this->getNacionalidad(),
			$keys[9] => $this->getResidente(),
			$keys[10] => $this->getConstituida(),
			$keys[11] => $this->getCodord(),
			$keys[12] => $this->getCodpercon(),
			$keys[13] => $this->getCodordadi(),
			$keys[14] => $this->getCodperconadi(),
			$keys[15] => $this->getCodordcontra(),
			$keys[16] => $this->getCodpercontra(),
			$keys[17] => $this->getTemcedrif(),
			$keys[18] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Opbenefi2Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCedrif($value);
				break;
			case 1:
				$this->setNomben($value);
				break;
			case 2:
				$this->setDirben($value);
				break;
			case 3:
				$this->setTelben($value);
				break;
			case 4:
				$this->setCodcta($value);
				break;
			case 5:
				$this->setNitben($value);
				break;
			case 6:
				$this->setCodtipben($value);
				break;
			case 7:
				$this->setTipper($value);
				break;
			case 8:
				$this->setNacionalidad($value);
				break;
			case 9:
				$this->setResidente($value);
				break;
			case 10:
				$this->setConstituida($value);
				break;
			case 11:
				$this->setCodord($value);
				break;
			case 12:
				$this->setCodpercon($value);
				break;
			case 13:
				$this->setCodordadi($value);
				break;
			case 14:
				$this->setCodperconadi($value);
				break;
			case 15:
				$this->setCodordcontra($value);
				break;
			case 16:
				$this->setCodpercontra($value);
				break;
			case 17:
				$this->setTemcedrif($value);
				break;
			case 18:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Opbenefi2Peer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCedrif($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomben($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDirben($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTelben($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodcta($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNitben($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodtipben($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTipper($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNacionalidad($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setResidente($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setConstituida($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCodord($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCodpercon($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCodordadi($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCodperconadi($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCodordcontra($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCodpercontra($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setTemcedrif($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setId($arr[$keys[18]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(Opbenefi2Peer::DATABASE_NAME);

		if ($this->isColumnModified(Opbenefi2Peer::CEDRIF)) $criteria->add(Opbenefi2Peer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(Opbenefi2Peer::NOMBEN)) $criteria->add(Opbenefi2Peer::NOMBEN, $this->nomben);
		if ($this->isColumnModified(Opbenefi2Peer::DIRBEN)) $criteria->add(Opbenefi2Peer::DIRBEN, $this->dirben);
		if ($this->isColumnModified(Opbenefi2Peer::TELBEN)) $criteria->add(Opbenefi2Peer::TELBEN, $this->telben);
		if ($this->isColumnModified(Opbenefi2Peer::CODCTA)) $criteria->add(Opbenefi2Peer::CODCTA, $this->codcta);
		if ($this->isColumnModified(Opbenefi2Peer::NITBEN)) $criteria->add(Opbenefi2Peer::NITBEN, $this->nitben);
		if ($this->isColumnModified(Opbenefi2Peer::CODTIPBEN)) $criteria->add(Opbenefi2Peer::CODTIPBEN, $this->codtipben);
		if ($this->isColumnModified(Opbenefi2Peer::TIPPER)) $criteria->add(Opbenefi2Peer::TIPPER, $this->tipper);
		if ($this->isColumnModified(Opbenefi2Peer::NACIONALIDAD)) $criteria->add(Opbenefi2Peer::NACIONALIDAD, $this->nacionalidad);
		if ($this->isColumnModified(Opbenefi2Peer::RESIDENTE)) $criteria->add(Opbenefi2Peer::RESIDENTE, $this->residente);
		if ($this->isColumnModified(Opbenefi2Peer::CONSTITUIDA)) $criteria->add(Opbenefi2Peer::CONSTITUIDA, $this->constituida);
		if ($this->isColumnModified(Opbenefi2Peer::CODORD)) $criteria->add(Opbenefi2Peer::CODORD, $this->codord);
		if ($this->isColumnModified(Opbenefi2Peer::CODPERCON)) $criteria->add(Opbenefi2Peer::CODPERCON, $this->codpercon);
		if ($this->isColumnModified(Opbenefi2Peer::CODORDADI)) $criteria->add(Opbenefi2Peer::CODORDADI, $this->codordadi);
		if ($this->isColumnModified(Opbenefi2Peer::CODPERCONADI)) $criteria->add(Opbenefi2Peer::CODPERCONADI, $this->codperconadi);
		if ($this->isColumnModified(Opbenefi2Peer::CODORDCONTRA)) $criteria->add(Opbenefi2Peer::CODORDCONTRA, $this->codordcontra);
		if ($this->isColumnModified(Opbenefi2Peer::CODPERCONTRA)) $criteria->add(Opbenefi2Peer::CODPERCONTRA, $this->codpercontra);
		if ($this->isColumnModified(Opbenefi2Peer::TEMCEDRIF)) $criteria->add(Opbenefi2Peer::TEMCEDRIF, $this->temcedrif);
		if ($this->isColumnModified(Opbenefi2Peer::ID)) $criteria->add(Opbenefi2Peer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Opbenefi2Peer::DATABASE_NAME);

		$criteria->add(Opbenefi2Peer::ID, $this->id);

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

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setNomben($this->nomben);

		$copyObj->setDirben($this->dirben);

		$copyObj->setTelben($this->telben);

		$copyObj->setCodcta($this->codcta);

		$copyObj->setNitben($this->nitben);

		$copyObj->setCodtipben($this->codtipben);

		$copyObj->setTipper($this->tipper);

		$copyObj->setNacionalidad($this->nacionalidad);

		$copyObj->setResidente($this->residente);

		$copyObj->setConstituida($this->constituida);

		$copyObj->setCodord($this->codord);

		$copyObj->setCodpercon($this->codpercon);

		$copyObj->setCodordadi($this->codordadi);

		$copyObj->setCodperconadi($this->codperconadi);

		$copyObj->setCodordcontra($this->codordcontra);

		$copyObj->setCodpercontra($this->codpercontra);

		$copyObj->setTemcedrif($this->temcedrif);


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
			self::$peer = new Opbenefi2Peer();
		}
		return self::$peer;
	}

} 