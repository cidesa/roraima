<?php


abstract class BaseInprofes extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $venext;


	
	protected $cedprof;


	
	protected $nomprof;


	
	protected $apeprof;


	
	protected $nacprof;


	
	protected $pais;


	
	protected $lugnac;


	
	protected $sexo;


	
	protected $fecnac;


	
	protected $dirnac;


	
	protected $estciv;


	
	protected $telhab;


	
	protected $telcel;


	
	protected $inestado_id;


	
	protected $inmunicipio_id;


	
	protected $inparroquia_id;


	
	protected $inespeci_id;


	
	protected $dirhab;


	
	protected $codpost;


	
	protected $email;


	
	protected $id;

	
	protected $aInestado;

	
	protected $aInmunicipio;

	
	protected $aInparroquia;

	
	protected $aInespeci;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getVenext()
  {

    return trim($this->venext);

  }
  
  public function getCedprof()
  {

    return trim($this->cedprof);

  }
  
  public function getNomprof()
  {

    return trim($this->nomprof);

  }
  
  public function getApeprof()
  {

    return trim($this->apeprof);

  }
  
  public function getNacprof()
  {

    return trim($this->nacprof);

  }
  
  public function getPais()
  {

    return trim($this->pais);

  }
  
  public function getLugnac()
  {

    return trim($this->lugnac);

  }
  
  public function getSexo()
  {

    return trim($this->sexo);

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

  
  public function getDirnac()
  {

    return trim($this->dirnac);

  }
  
  public function getEstciv()
  {

    return trim($this->estciv);

  }
  
  public function getTelhab()
  {

    return trim($this->telhab);

  }
  
  public function getTelcel()
  {

    return trim($this->telcel);

  }
  
  public function getInestadoId()
  {

    return $this->inestado_id;

  }
  
  public function getInmunicipioId()
  {

    return $this->inmunicipio_id;

  }
  
  public function getInparroquiaId()
  {

    return $this->inparroquia_id;

  }
  
  public function getInespeciId()
  {

    return $this->inespeci_id;

  }
  
  public function getDirhab()
  {

    return trim($this->dirhab);

  }
  
  public function getCodpost()
  {

    return trim($this->codpost);

  }
  
  public function getEmail()
  {

    return trim($this->email);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setVenext($v)
	{

    if ($this->venext !== $v) {
        $this->venext = $v;
        $this->modifiedColumns[] = InprofesPeer::VENEXT;
      }
  
	} 
	
	public function setCedprof($v)
	{

    if ($this->cedprof !== $v) {
        $this->cedprof = $v;
        $this->modifiedColumns[] = InprofesPeer::CEDPROF;
      }
  
	} 
	
	public function setNomprof($v)
	{

    if ($this->nomprof !== $v) {
        $this->nomprof = $v;
        $this->modifiedColumns[] = InprofesPeer::NOMPROF;
      }
  
	} 
	
	public function setApeprof($v)
	{

    if ($this->apeprof !== $v) {
        $this->apeprof = $v;
        $this->modifiedColumns[] = InprofesPeer::APEPROF;
      }
  
	} 
	
	public function setNacprof($v)
	{

    if ($this->nacprof !== $v) {
        $this->nacprof = $v;
        $this->modifiedColumns[] = InprofesPeer::NACPROF;
      }
  
	} 
	
	public function setPais($v)
	{

    if ($this->pais !== $v) {
        $this->pais = $v;
        $this->modifiedColumns[] = InprofesPeer::PAIS;
      }
  
	} 
	
	public function setLugnac($v)
	{

    if ($this->lugnac !== $v) {
        $this->lugnac = $v;
        $this->modifiedColumns[] = InprofesPeer::LUGNAC;
      }
  
	} 
	
	public function setSexo($v)
	{

    if ($this->sexo !== $v) {
        $this->sexo = $v;
        $this->modifiedColumns[] = InprofesPeer::SEXO;
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
      $this->modifiedColumns[] = InprofesPeer::FECNAC;
    }

	} 
	
	public function setDirnac($v)
	{

    if ($this->dirnac !== $v) {
        $this->dirnac = $v;
        $this->modifiedColumns[] = InprofesPeer::DIRNAC;
      }
  
	} 
	
	public function setEstciv($v)
	{

    if ($this->estciv !== $v) {
        $this->estciv = $v;
        $this->modifiedColumns[] = InprofesPeer::ESTCIV;
      }
  
	} 
	
	public function setTelhab($v)
	{

    if ($this->telhab !== $v) {
        $this->telhab = $v;
        $this->modifiedColumns[] = InprofesPeer::TELHAB;
      }
  
	} 
	
	public function setTelcel($v)
	{

    if ($this->telcel !== $v) {
        $this->telcel = $v;
        $this->modifiedColumns[] = InprofesPeer::TELCEL;
      }
  
	} 
	
	public function setInestadoId($v)
	{

    if ($this->inestado_id !== $v) {
        $this->inestado_id = $v;
        $this->modifiedColumns[] = InprofesPeer::INESTADO_ID;
      }
  
		if ($this->aInestado !== null && $this->aInestado->getId() !== $v) {
			$this->aInestado = null;
		}

	} 
	
	public function setInmunicipioId($v)
	{

    if ($this->inmunicipio_id !== $v) {
        $this->inmunicipio_id = $v;
        $this->modifiedColumns[] = InprofesPeer::INMUNICIPIO_ID;
      }
  
		if ($this->aInmunicipio !== null && $this->aInmunicipio->getId() !== $v) {
			$this->aInmunicipio = null;
		}

	} 
	
	public function setInparroquiaId($v)
	{

    if ($this->inparroquia_id !== $v) {
        $this->inparroquia_id = $v;
        $this->modifiedColumns[] = InprofesPeer::INPARROQUIA_ID;
      }
  
		if ($this->aInparroquia !== null && $this->aInparroquia->getId() !== $v) {
			$this->aInparroquia = null;
		}

	} 
	
	public function setInespeciId($v)
	{

    if ($this->inespeci_id !== $v) {
        $this->inespeci_id = $v;
        $this->modifiedColumns[] = InprofesPeer::INESPECI_ID;
      }
  
		if ($this->aInespeci !== null && $this->aInespeci->getId() !== $v) {
			$this->aInespeci = null;
		}

	} 
	
	public function setDirhab($v)
	{

    if ($this->dirhab !== $v) {
        $this->dirhab = $v;
        $this->modifiedColumns[] = InprofesPeer::DIRHAB;
      }
  
	} 
	
	public function setCodpost($v)
	{

    if ($this->codpost !== $v) {
        $this->codpost = $v;
        $this->modifiedColumns[] = InprofesPeer::CODPOST;
      }
  
	} 
	
	public function setEmail($v)
	{

    if ($this->email !== $v) {
        $this->email = $v;
        $this->modifiedColumns[] = InprofesPeer::EMAIL;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = InprofesPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->venext = $rs->getString($startcol + 0);

      $this->cedprof = $rs->getString($startcol + 1);

      $this->nomprof = $rs->getString($startcol + 2);

      $this->apeprof = $rs->getString($startcol + 3);

      $this->nacprof = $rs->getString($startcol + 4);

      $this->pais = $rs->getString($startcol + 5);

      $this->lugnac = $rs->getString($startcol + 6);

      $this->sexo = $rs->getString($startcol + 7);

      $this->fecnac = $rs->getDate($startcol + 8, null);

      $this->dirnac = $rs->getString($startcol + 9);

      $this->estciv = $rs->getString($startcol + 10);

      $this->telhab = $rs->getString($startcol + 11);

      $this->telcel = $rs->getString($startcol + 12);

      $this->inestado_id = $rs->getInt($startcol + 13);

      $this->inmunicipio_id = $rs->getInt($startcol + 14);

      $this->inparroquia_id = $rs->getInt($startcol + 15);

      $this->inespeci_id = $rs->getInt($startcol + 16);

      $this->dirhab = $rs->getString($startcol + 17);

      $this->codpost = $rs->getString($startcol + 18);

      $this->email = $rs->getString($startcol + 19);

      $this->id = $rs->getInt($startcol + 20);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 21; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Inprofes object", $e);
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
			$con = Propel::getConnection(InprofesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			InprofesPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(InprofesPeer::DATABASE_NAME);
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


												
			if ($this->aInestado !== null) {
				if ($this->aInestado->isModified()) {
					$affectedRows += $this->aInestado->save($con);
				}
				$this->setInestado($this->aInestado);
			}

			if ($this->aInmunicipio !== null) {
				if ($this->aInmunicipio->isModified()) {
					$affectedRows += $this->aInmunicipio->save($con);
				}
				$this->setInmunicipio($this->aInmunicipio);
			}

			if ($this->aInparroquia !== null) {
				if ($this->aInparroquia->isModified()) {
					$affectedRows += $this->aInparroquia->save($con);
				}
				$this->setInparroquia($this->aInparroquia);
			}

			if ($this->aInespeci !== null) {
				if ($this->aInespeci->isModified()) {
					$affectedRows += $this->aInespeci->save($con);
				}
				$this->setInespeci($this->aInespeci);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = InprofesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += InprofesPeer::doUpdate($this, $con);
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


												
			if ($this->aInestado !== null) {
				if (!$this->aInestado->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aInestado->getValidationFailures());
				}
			}

			if ($this->aInmunicipio !== null) {
				if (!$this->aInmunicipio->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aInmunicipio->getValidationFailures());
				}
			}

			if ($this->aInparroquia !== null) {
				if (!$this->aInparroquia->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aInparroquia->getValidationFailures());
				}
			}

			if ($this->aInespeci !== null) {
				if (!$this->aInespeci->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aInespeci->getValidationFailures());
				}
			}


			if (($retval = InprofesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InprofesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getVenext();
				break;
			case 1:
				return $this->getCedprof();
				break;
			case 2:
				return $this->getNomprof();
				break;
			case 3:
				return $this->getApeprof();
				break;
			case 4:
				return $this->getNacprof();
				break;
			case 5:
				return $this->getPais();
				break;
			case 6:
				return $this->getLugnac();
				break;
			case 7:
				return $this->getSexo();
				break;
			case 8:
				return $this->getFecnac();
				break;
			case 9:
				return $this->getDirnac();
				break;
			case 10:
				return $this->getEstciv();
				break;
			case 11:
				return $this->getTelhab();
				break;
			case 12:
				return $this->getTelcel();
				break;
			case 13:
				return $this->getInestadoId();
				break;
			case 14:
				return $this->getInmunicipioId();
				break;
			case 15:
				return $this->getInparroquiaId();
				break;
			case 16:
				return $this->getInespeciId();
				break;
			case 17:
				return $this->getDirhab();
				break;
			case 18:
				return $this->getCodpost();
				break;
			case 19:
				return $this->getEmail();
				break;
			case 20:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InprofesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getVenext(),
			$keys[1] => $this->getCedprof(),
			$keys[2] => $this->getNomprof(),
			$keys[3] => $this->getApeprof(),
			$keys[4] => $this->getNacprof(),
			$keys[5] => $this->getPais(),
			$keys[6] => $this->getLugnac(),
			$keys[7] => $this->getSexo(),
			$keys[8] => $this->getFecnac(),
			$keys[9] => $this->getDirnac(),
			$keys[10] => $this->getEstciv(),
			$keys[11] => $this->getTelhab(),
			$keys[12] => $this->getTelcel(),
			$keys[13] => $this->getInestadoId(),
			$keys[14] => $this->getInmunicipioId(),
			$keys[15] => $this->getInparroquiaId(),
			$keys[16] => $this->getInespeciId(),
			$keys[17] => $this->getDirhab(),
			$keys[18] => $this->getCodpost(),
			$keys[19] => $this->getEmail(),
			$keys[20] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InprofesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setVenext($value);
				break;
			case 1:
				$this->setCedprof($value);
				break;
			case 2:
				$this->setNomprof($value);
				break;
			case 3:
				$this->setApeprof($value);
				break;
			case 4:
				$this->setNacprof($value);
				break;
			case 5:
				$this->setPais($value);
				break;
			case 6:
				$this->setLugnac($value);
				break;
			case 7:
				$this->setSexo($value);
				break;
			case 8:
				$this->setFecnac($value);
				break;
			case 9:
				$this->setDirnac($value);
				break;
			case 10:
				$this->setEstciv($value);
				break;
			case 11:
				$this->setTelhab($value);
				break;
			case 12:
				$this->setTelcel($value);
				break;
			case 13:
				$this->setInestadoId($value);
				break;
			case 14:
				$this->setInmunicipioId($value);
				break;
			case 15:
				$this->setInparroquiaId($value);
				break;
			case 16:
				$this->setInespeciId($value);
				break;
			case 17:
				$this->setDirhab($value);
				break;
			case 18:
				$this->setCodpost($value);
				break;
			case 19:
				$this->setEmail($value);
				break;
			case 20:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InprofesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setVenext($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCedprof($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomprof($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setApeprof($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNacprof($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPais($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setLugnac($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setSexo($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecnac($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDirnac($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setEstciv($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setTelhab($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setTelcel($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setInestadoId($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setInmunicipioId($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setInparroquiaId($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setInespeciId($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setDirhab($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCodpost($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setEmail($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setId($arr[$keys[20]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(InprofesPeer::DATABASE_NAME);

		if ($this->isColumnModified(InprofesPeer::VENEXT)) $criteria->add(InprofesPeer::VENEXT, $this->venext);
		if ($this->isColumnModified(InprofesPeer::CEDPROF)) $criteria->add(InprofesPeer::CEDPROF, $this->cedprof);
		if ($this->isColumnModified(InprofesPeer::NOMPROF)) $criteria->add(InprofesPeer::NOMPROF, $this->nomprof);
		if ($this->isColumnModified(InprofesPeer::APEPROF)) $criteria->add(InprofesPeer::APEPROF, $this->apeprof);
		if ($this->isColumnModified(InprofesPeer::NACPROF)) $criteria->add(InprofesPeer::NACPROF, $this->nacprof);
		if ($this->isColumnModified(InprofesPeer::PAIS)) $criteria->add(InprofesPeer::PAIS, $this->pais);
		if ($this->isColumnModified(InprofesPeer::LUGNAC)) $criteria->add(InprofesPeer::LUGNAC, $this->lugnac);
		if ($this->isColumnModified(InprofesPeer::SEXO)) $criteria->add(InprofesPeer::SEXO, $this->sexo);
		if ($this->isColumnModified(InprofesPeer::FECNAC)) $criteria->add(InprofesPeer::FECNAC, $this->fecnac);
		if ($this->isColumnModified(InprofesPeer::DIRNAC)) $criteria->add(InprofesPeer::DIRNAC, $this->dirnac);
		if ($this->isColumnModified(InprofesPeer::ESTCIV)) $criteria->add(InprofesPeer::ESTCIV, $this->estciv);
		if ($this->isColumnModified(InprofesPeer::TELHAB)) $criteria->add(InprofesPeer::TELHAB, $this->telhab);
		if ($this->isColumnModified(InprofesPeer::TELCEL)) $criteria->add(InprofesPeer::TELCEL, $this->telcel);
		if ($this->isColumnModified(InprofesPeer::INESTADO_ID)) $criteria->add(InprofesPeer::INESTADO_ID, $this->inestado_id);
		if ($this->isColumnModified(InprofesPeer::INMUNICIPIO_ID)) $criteria->add(InprofesPeer::INMUNICIPIO_ID, $this->inmunicipio_id);
		if ($this->isColumnModified(InprofesPeer::INPARROQUIA_ID)) $criteria->add(InprofesPeer::INPARROQUIA_ID, $this->inparroquia_id);
		if ($this->isColumnModified(InprofesPeer::INESPECI_ID)) $criteria->add(InprofesPeer::INESPECI_ID, $this->inespeci_id);
		if ($this->isColumnModified(InprofesPeer::DIRHAB)) $criteria->add(InprofesPeer::DIRHAB, $this->dirhab);
		if ($this->isColumnModified(InprofesPeer::CODPOST)) $criteria->add(InprofesPeer::CODPOST, $this->codpost);
		if ($this->isColumnModified(InprofesPeer::EMAIL)) $criteria->add(InprofesPeer::EMAIL, $this->email);
		if ($this->isColumnModified(InprofesPeer::ID)) $criteria->add(InprofesPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(InprofesPeer::DATABASE_NAME);

		$criteria->add(InprofesPeer::ID, $this->id);

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

		$copyObj->setVenext($this->venext);

		$copyObj->setCedprof($this->cedprof);

		$copyObj->setNomprof($this->nomprof);

		$copyObj->setApeprof($this->apeprof);

		$copyObj->setNacprof($this->nacprof);

		$copyObj->setPais($this->pais);

		$copyObj->setLugnac($this->lugnac);

		$copyObj->setSexo($this->sexo);

		$copyObj->setFecnac($this->fecnac);

		$copyObj->setDirnac($this->dirnac);

		$copyObj->setEstciv($this->estciv);

		$copyObj->setTelhab($this->telhab);

		$copyObj->setTelcel($this->telcel);

		$copyObj->setInestadoId($this->inestado_id);

		$copyObj->setInmunicipioId($this->inmunicipio_id);

		$copyObj->setInparroquiaId($this->inparroquia_id);

		$copyObj->setInespeciId($this->inespeci_id);

		$copyObj->setDirhab($this->dirhab);

		$copyObj->setCodpost($this->codpost);

		$copyObj->setEmail($this->email);


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
			self::$peer = new InprofesPeer();
		}
		return self::$peer;
	}

	
	public function setInestado($v)
	{


		if ($v === null) {
			$this->setInestadoId(NULL);
		} else {
			$this->setInestadoId($v->getId());
		}


		$this->aInestado = $v;
	}


	
	public function getInestado($con = null)
	{
		if ($this->aInestado === null && ($this->inestado_id !== null)) {
						include_once 'lib/model/om/BaseInestadoPeer.php';

			$this->aInestado = InestadoPeer::retrieveByPK($this->inestado_id, $con);

			
		}
		return $this->aInestado;
	}

	
	public function setInmunicipio($v)
	{


		if ($v === null) {
			$this->setInmunicipioId(NULL);
		} else {
			$this->setInmunicipioId($v->getId());
		}


		$this->aInmunicipio = $v;
	}


	
	public function getInmunicipio($con = null)
	{
		if ($this->aInmunicipio === null && ($this->inmunicipio_id !== null)) {
						include_once 'lib/model/om/BaseInmunicipioPeer.php';

			$this->aInmunicipio = InmunicipioPeer::retrieveByPK($this->inmunicipio_id, $con);

			
		}
		return $this->aInmunicipio;
	}

	
	public function setInparroquia($v)
	{


		if ($v === null) {
			$this->setInparroquiaId(NULL);
		} else {
			$this->setInparroquiaId($v->getId());
		}


		$this->aInparroquia = $v;
	}


	
	public function getInparroquia($con = null)
	{
		if ($this->aInparroquia === null && ($this->inparroquia_id !== null)) {
						include_once 'lib/model/om/BaseInparroquiaPeer.php';

			$this->aInparroquia = InparroquiaPeer::retrieveByPK($this->inparroquia_id, $con);

			
		}
		return $this->aInparroquia;
	}

	
	public function setInespeci($v)
	{


		if ($v === null) {
			$this->setInespeciId(NULL);
		} else {
			$this->setInespeciId($v->getId());
		}


		$this->aInespeci = $v;
	}


	
	public function getInespeci($con = null)
	{
		if ($this->aInespeci === null && ($this->inespeci_id !== null)) {
						include_once 'lib/model/om/BaseInespeciPeer.php';

			$this->aInespeci = InespeciPeer::retrieveByPK($this->inespeci_id, $con);

			
		}
		return $this->aInespeci;
	}

} 