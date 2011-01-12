<?php


abstract class BaseCcconben extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $cedcon;


	
	protected $nomcon;


	
	protected $lugtracon;


	
	protected $telcon;


	
	protected $celcon;


	
	protected $fecnac;


	
	protected $dirnomurb;


	
	protected $dircalles;


	
	protected $dircasedi;


	
	protected $dirnumpis;


	
	protected $dirapatar;


	
	protected $dirpunref;


	
	protected $codaretel;


	
	protected $codarecel;


	
	protected $corele;


	
	protected $ocupa;


	
	protected $profe;


	
	protected $ingmen;


	
	protected $ccperpre_id;


	
	protected $ccbenefi_id;

	
	protected $aCcperpre;

	
	protected $aCcbenefi;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getCedcon()
  {

    return trim($this->cedcon);

  }
  
  public function getNomcon()
  {

    return trim($this->nomcon);

  }
  
  public function getLugtracon()
  {

    return trim($this->lugtracon);

  }
  
  public function getTelcon()
  {

    return trim($this->telcon);

  }
  
  public function getCelcon()
  {

    return trim($this->celcon);

  }
  
  public function getFecnac($format = 'Y-m-d')
  {

    if ($this->fecnac === null || $this->fecnac === '') {
      return null;
    } elseif (!is_int($this->fecnac)) {
            $ts = adodb_strtotime($this->fecnac);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecnac] as date/time value: " . var_export($this->fecnac, true));
      }
    } else {
      $ts = $this->fecnac;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDirnomurb()
  {

    return trim($this->dirnomurb);

  }
  
  public function getDircalles()
  {

    return trim($this->dircalles);

  }
  
  public function getDircasedi()
  {

    return trim($this->dircasedi);

  }
  
  public function getDirnumpis()
  {

    return trim($this->dirnumpis);

  }
  
  public function getDirapatar()
  {

    return trim($this->dirapatar);

  }
  
  public function getDirpunref()
  {

    return trim($this->dirpunref);

  }
  
  public function getCodaretel()
  {

    return trim($this->codaretel);

  }
  
  public function getCodarecel()
  {

    return trim($this->codarecel);

  }
  
  public function getCorele()
  {

    return trim($this->corele);

  }
  
  public function getOcupa()
  {

    return trim($this->ocupa);

  }
  
  public function getProfe()
  {

    return trim($this->profe);

  }
  
  public function getIngmen($val=false)
  {

    if($val) return number_format($this->ingmen,2,',','.');
    else return $this->ingmen;

  }
  
  public function getCcperpreId()
  {

    return $this->ccperpre_id;

  }
  
  public function getCcbenefiId()
  {

    return $this->ccbenefi_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcconbenPeer::ID;
      }
  
	} 
	
	public function setCedcon($v)
	{

    if ($this->cedcon !== $v) {
        $this->cedcon = $v;
        $this->modifiedColumns[] = CcconbenPeer::CEDCON;
      }
  
	} 
	
	public function setNomcon($v)
	{

    if ($this->nomcon !== $v) {
        $this->nomcon = $v;
        $this->modifiedColumns[] = CcconbenPeer::NOMCON;
      }
  
	} 
	
	public function setLugtracon($v)
	{

    if ($this->lugtracon !== $v) {
        $this->lugtracon = $v;
        $this->modifiedColumns[] = CcconbenPeer::LUGTRACON;
      }
  
	} 
	
	public function setTelcon($v)
	{

    if ($this->telcon !== $v) {
        $this->telcon = $v;
        $this->modifiedColumns[] = CcconbenPeer::TELCON;
      }
  
	} 
	
	public function setCelcon($v)
	{

    if ($this->celcon !== $v) {
        $this->celcon = $v;
        $this->modifiedColumns[] = CcconbenPeer::CELCON;
      }
  
	} 
	
	public function setFecnac($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecnac] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecnac !== $ts) {
      $this->fecnac = $ts;
      $this->modifiedColumns[] = CcconbenPeer::FECNAC;
    }

	} 
	
	public function setDirnomurb($v)
	{

    if ($this->dirnomurb !== $v) {
        $this->dirnomurb = $v;
        $this->modifiedColumns[] = CcconbenPeer::DIRNOMURB;
      }
  
	} 
	
	public function setDircalles($v)
	{

    if ($this->dircalles !== $v) {
        $this->dircalles = $v;
        $this->modifiedColumns[] = CcconbenPeer::DIRCALLES;
      }
  
	} 
	
	public function setDircasedi($v)
	{

    if ($this->dircasedi !== $v) {
        $this->dircasedi = $v;
        $this->modifiedColumns[] = CcconbenPeer::DIRCASEDI;
      }
  
	} 
	
	public function setDirnumpis($v)
	{

    if ($this->dirnumpis !== $v) {
        $this->dirnumpis = $v;
        $this->modifiedColumns[] = CcconbenPeer::DIRNUMPIS;
      }
  
	} 
	
	public function setDirapatar($v)
	{

    if ($this->dirapatar !== $v) {
        $this->dirapatar = $v;
        $this->modifiedColumns[] = CcconbenPeer::DIRAPATAR;
      }
  
	} 
	
	public function setDirpunref($v)
	{

    if ($this->dirpunref !== $v) {
        $this->dirpunref = $v;
        $this->modifiedColumns[] = CcconbenPeer::DIRPUNREF;
      }
  
	} 
	
	public function setCodaretel($v)
	{

    if ($this->codaretel !== $v) {
        $this->codaretel = $v;
        $this->modifiedColumns[] = CcconbenPeer::CODARETEL;
      }
  
	} 
	
	public function setCodarecel($v)
	{

    if ($this->codarecel !== $v) {
        $this->codarecel = $v;
        $this->modifiedColumns[] = CcconbenPeer::CODARECEL;
      }
  
	} 
	
	public function setCorele($v)
	{

    if ($this->corele !== $v) {
        $this->corele = $v;
        $this->modifiedColumns[] = CcconbenPeer::CORELE;
      }
  
	} 
	
	public function setOcupa($v)
	{

    if ($this->ocupa !== $v) {
        $this->ocupa = $v;
        $this->modifiedColumns[] = CcconbenPeer::OCUPA;
      }
  
	} 
	
	public function setProfe($v)
	{

    if ($this->profe !== $v) {
        $this->profe = $v;
        $this->modifiedColumns[] = CcconbenPeer::PROFE;
      }
  
	} 
	
	public function setIngmen($v)
	{

    if ($this->ingmen !== $v) {
        $this->ingmen = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcconbenPeer::INGMEN;
      }
  
	} 
	
	public function setCcperpreId($v)
	{

    if ($this->ccperpre_id !== $v) {
        $this->ccperpre_id = $v;
        $this->modifiedColumns[] = CcconbenPeer::CCPERPRE_ID;
      }
  
		if ($this->aCcperpre !== null && $this->aCcperpre->getId() !== $v) {
			$this->aCcperpre = null;
		}

	} 
	
	public function setCcbenefiId($v)
	{

    if ($this->ccbenefi_id !== $v) {
        $this->ccbenefi_id = $v;
        $this->modifiedColumns[] = CcconbenPeer::CCBENEFI_ID;
      }
  
		if ($this->aCcbenefi !== null && $this->aCcbenefi->getId() !== $v) {
			$this->aCcbenefi = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->cedcon = $rs->getString($startcol + 1);

      $this->nomcon = $rs->getString($startcol + 2);

      $this->lugtracon = $rs->getString($startcol + 3);

      $this->telcon = $rs->getString($startcol + 4);

      $this->celcon = $rs->getString($startcol + 5);

      $this->fecnac = $rs->getDate($startcol + 6, null);

      $this->dirnomurb = $rs->getString($startcol + 7);

      $this->dircalles = $rs->getString($startcol + 8);

      $this->dircasedi = $rs->getString($startcol + 9);

      $this->dirnumpis = $rs->getString($startcol + 10);

      $this->dirapatar = $rs->getString($startcol + 11);

      $this->dirpunref = $rs->getString($startcol + 12);

      $this->codaretel = $rs->getString($startcol + 13);

      $this->codarecel = $rs->getString($startcol + 14);

      $this->corele = $rs->getString($startcol + 15);

      $this->ocupa = $rs->getString($startcol + 16);

      $this->profe = $rs->getString($startcol + 17);

      $this->ingmen = $rs->getFloat($startcol + 18);

      $this->ccperpre_id = $rs->getInt($startcol + 19);

      $this->ccbenefi_id = $rs->getInt($startcol + 20);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 21; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccconben object", $e);
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
			$con = Propel::getConnection(CcconbenPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcconbenPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcconbenPeer::DATABASE_NAME);
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


												
			if ($this->aCcperpre !== null) {
				if ($this->aCcperpre->isModified()) {
					$affectedRows += $this->aCcperpre->save($con);
				}
				$this->setCcperpre($this->aCcperpre);
			}

			if ($this->aCcbenefi !== null) {
				if ($this->aCcbenefi->isModified()) {
					$affectedRows += $this->aCcbenefi->save($con);
				}
				$this->setCcbenefi($this->aCcbenefi);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcconbenPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcconbenPeer::doUpdate($this, $con);
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


												
			if ($this->aCcperpre !== null) {
				if (!$this->aCcperpre->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcperpre->getValidationFailures());
				}
			}

			if ($this->aCcbenefi !== null) {
				if (!$this->aCcbenefi->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcbenefi->getValidationFailures());
				}
			}


			if (($retval = CcconbenPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcconbenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCedcon();
				break;
			case 2:
				return $this->getNomcon();
				break;
			case 3:
				return $this->getLugtracon();
				break;
			case 4:
				return $this->getTelcon();
				break;
			case 5:
				return $this->getCelcon();
				break;
			case 6:
				return $this->getFecnac();
				break;
			case 7:
				return $this->getDirnomurb();
				break;
			case 8:
				return $this->getDircalles();
				break;
			case 9:
				return $this->getDircasedi();
				break;
			case 10:
				return $this->getDirnumpis();
				break;
			case 11:
				return $this->getDirapatar();
				break;
			case 12:
				return $this->getDirpunref();
				break;
			case 13:
				return $this->getCodaretel();
				break;
			case 14:
				return $this->getCodarecel();
				break;
			case 15:
				return $this->getCorele();
				break;
			case 16:
				return $this->getOcupa();
				break;
			case 17:
				return $this->getProfe();
				break;
			case 18:
				return $this->getIngmen();
				break;
			case 19:
				return $this->getCcperpreId();
				break;
			case 20:
				return $this->getCcbenefiId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcconbenPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCedcon(),
			$keys[2] => $this->getNomcon(),
			$keys[3] => $this->getLugtracon(),
			$keys[4] => $this->getTelcon(),
			$keys[5] => $this->getCelcon(),
			$keys[6] => $this->getFecnac(),
			$keys[7] => $this->getDirnomurb(),
			$keys[8] => $this->getDircalles(),
			$keys[9] => $this->getDircasedi(),
			$keys[10] => $this->getDirnumpis(),
			$keys[11] => $this->getDirapatar(),
			$keys[12] => $this->getDirpunref(),
			$keys[13] => $this->getCodaretel(),
			$keys[14] => $this->getCodarecel(),
			$keys[15] => $this->getCorele(),
			$keys[16] => $this->getOcupa(),
			$keys[17] => $this->getProfe(),
			$keys[18] => $this->getIngmen(),
			$keys[19] => $this->getCcperpreId(),
			$keys[20] => $this->getCcbenefiId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcconbenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCedcon($value);
				break;
			case 2:
				$this->setNomcon($value);
				break;
			case 3:
				$this->setLugtracon($value);
				break;
			case 4:
				$this->setTelcon($value);
				break;
			case 5:
				$this->setCelcon($value);
				break;
			case 6:
				$this->setFecnac($value);
				break;
			case 7:
				$this->setDirnomurb($value);
				break;
			case 8:
				$this->setDircalles($value);
				break;
			case 9:
				$this->setDircasedi($value);
				break;
			case 10:
				$this->setDirnumpis($value);
				break;
			case 11:
				$this->setDirapatar($value);
				break;
			case 12:
				$this->setDirpunref($value);
				break;
			case 13:
				$this->setCodaretel($value);
				break;
			case 14:
				$this->setCodarecel($value);
				break;
			case 15:
				$this->setCorele($value);
				break;
			case 16:
				$this->setOcupa($value);
				break;
			case 17:
				$this->setProfe($value);
				break;
			case 18:
				$this->setIngmen($value);
				break;
			case 19:
				$this->setCcperpreId($value);
				break;
			case 20:
				$this->setCcbenefiId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcconbenPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCedcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomcon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setLugtracon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTelcon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCelcon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecnac($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDirnomurb($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDircalles($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDircasedi($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDirnumpis($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setDirapatar($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDirpunref($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCodaretel($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCodarecel($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCorele($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setOcupa($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setProfe($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setIngmen($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCcperpreId($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCcbenefiId($arr[$keys[20]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcconbenPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcconbenPeer::ID)) $criteria->add(CcconbenPeer::ID, $this->id);
		if ($this->isColumnModified(CcconbenPeer::CEDCON)) $criteria->add(CcconbenPeer::CEDCON, $this->cedcon);
		if ($this->isColumnModified(CcconbenPeer::NOMCON)) $criteria->add(CcconbenPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(CcconbenPeer::LUGTRACON)) $criteria->add(CcconbenPeer::LUGTRACON, $this->lugtracon);
		if ($this->isColumnModified(CcconbenPeer::TELCON)) $criteria->add(CcconbenPeer::TELCON, $this->telcon);
		if ($this->isColumnModified(CcconbenPeer::CELCON)) $criteria->add(CcconbenPeer::CELCON, $this->celcon);
		if ($this->isColumnModified(CcconbenPeer::FECNAC)) $criteria->add(CcconbenPeer::FECNAC, $this->fecnac);
		if ($this->isColumnModified(CcconbenPeer::DIRNOMURB)) $criteria->add(CcconbenPeer::DIRNOMURB, $this->dirnomurb);
		if ($this->isColumnModified(CcconbenPeer::DIRCALLES)) $criteria->add(CcconbenPeer::DIRCALLES, $this->dircalles);
		if ($this->isColumnModified(CcconbenPeer::DIRCASEDI)) $criteria->add(CcconbenPeer::DIRCASEDI, $this->dircasedi);
		if ($this->isColumnModified(CcconbenPeer::DIRNUMPIS)) $criteria->add(CcconbenPeer::DIRNUMPIS, $this->dirnumpis);
		if ($this->isColumnModified(CcconbenPeer::DIRAPATAR)) $criteria->add(CcconbenPeer::DIRAPATAR, $this->dirapatar);
		if ($this->isColumnModified(CcconbenPeer::DIRPUNREF)) $criteria->add(CcconbenPeer::DIRPUNREF, $this->dirpunref);
		if ($this->isColumnModified(CcconbenPeer::CODARETEL)) $criteria->add(CcconbenPeer::CODARETEL, $this->codaretel);
		if ($this->isColumnModified(CcconbenPeer::CODARECEL)) $criteria->add(CcconbenPeer::CODARECEL, $this->codarecel);
		if ($this->isColumnModified(CcconbenPeer::CORELE)) $criteria->add(CcconbenPeer::CORELE, $this->corele);
		if ($this->isColumnModified(CcconbenPeer::OCUPA)) $criteria->add(CcconbenPeer::OCUPA, $this->ocupa);
		if ($this->isColumnModified(CcconbenPeer::PROFE)) $criteria->add(CcconbenPeer::PROFE, $this->profe);
		if ($this->isColumnModified(CcconbenPeer::INGMEN)) $criteria->add(CcconbenPeer::INGMEN, $this->ingmen);
		if ($this->isColumnModified(CcconbenPeer::CCPERPRE_ID)) $criteria->add(CcconbenPeer::CCPERPRE_ID, $this->ccperpre_id);
		if ($this->isColumnModified(CcconbenPeer::CCBENEFI_ID)) $criteria->add(CcconbenPeer::CCBENEFI_ID, $this->ccbenefi_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcconbenPeer::DATABASE_NAME);

		$criteria->add(CcconbenPeer::ID, $this->id);

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

		$copyObj->setCedcon($this->cedcon);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setLugtracon($this->lugtracon);

		$copyObj->setTelcon($this->telcon);

		$copyObj->setCelcon($this->celcon);

		$copyObj->setFecnac($this->fecnac);

		$copyObj->setDirnomurb($this->dirnomurb);

		$copyObj->setDircalles($this->dircalles);

		$copyObj->setDircasedi($this->dircasedi);

		$copyObj->setDirnumpis($this->dirnumpis);

		$copyObj->setDirapatar($this->dirapatar);

		$copyObj->setDirpunref($this->dirpunref);

		$copyObj->setCodaretel($this->codaretel);

		$copyObj->setCodarecel($this->codarecel);

		$copyObj->setCorele($this->corele);

		$copyObj->setOcupa($this->ocupa);

		$copyObj->setProfe($this->profe);

		$copyObj->setIngmen($this->ingmen);

		$copyObj->setCcperpreId($this->ccperpre_id);

		$copyObj->setCcbenefiId($this->ccbenefi_id);


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
			self::$peer = new CcconbenPeer();
		}
		return self::$peer;
	}

	
	public function setCcperpre($v)
	{


		if ($v === null) {
			$this->setCcperpreId(NULL);
		} else {
			$this->setCcperpreId($v->getId());
		}


		$this->aCcperpre = $v;
	}


	
	public function getCcperpre($con = null)
	{
		if ($this->aCcperpre === null && ($this->ccperpre_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcperprePeer.php';

      $c = new Criteria();
      $c->add(CcperprePeer::ID,$this->ccperpre_id);
      
			$this->aCcperpre = CcperprePeer::doSelectOne($c, $con);

			
		}
		return $this->aCcperpre;
	}

	
	public function setCcbenefi($v)
	{


		if ($v === null) {
			$this->setCcbenefiId(NULL);
		} else {
			$this->setCcbenefiId($v->getId());
		}


		$this->aCcbenefi = $v;
	}


	
	public function getCcbenefi($con = null)
	{
		if ($this->aCcbenefi === null && ($this->ccbenefi_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';

      $c = new Criteria();
      $c->add(CcbenefiPeer::ID,$this->ccbenefi_id);
      
			$this->aCcbenefi = CcbenefiPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcbenefi;
	}

} 