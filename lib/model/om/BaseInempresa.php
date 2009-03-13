<?php


abstract class BaseInempresa extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $rifemp;


	
	protected $razsoc;


	
	protected $intipemp_id;


	
	protected $inestado_id;


	
	protected $inmunicipio_id;


	
	protected $inparroquia_id;


	
	protected $diremp;


	
	protected $codpost;


	
	protected $telemp;


	
	protected $email;


	
	protected $cedrepleg;


	
	protected $venextrepleg;


	
	protected $nomrepleg;


	
	protected $aperepleg;


	
	protected $sexo;


	
	protected $fecnac;


	
	protected $estciv;


	
	protected $telhab;


	
	protected $telcel;


	
	protected $emailrepleg;


	
	protected $id;

	
	protected $aIntipemp;

	
	protected $aInestado;

	
	protected $aInmunicipio;

	
	protected $aInparroquia;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRifemp()
  {

    return trim($this->rifemp);

  }
  
  public function getRazsoc()
  {

    return trim($this->razsoc);

  }
  
  public function getIntipempId()
  {

    return $this->intipemp_id;

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
  
  public function getDiremp()
  {

    return trim($this->diremp);

  }
  
  public function getCodpost()
  {

    return trim($this->codpost);

  }
  
  public function getTelemp()
  {

    return trim($this->telemp);

  }
  
  public function getEmail()
  {

    return trim($this->email);

  }
  
  public function getCedrepleg()
  {

    return trim($this->cedrepleg);

  }
  
  public function getVenextrepleg()
  {

    return trim($this->venextrepleg);

  }
  
  public function getNomrepleg()
  {

    return trim($this->nomrepleg);

  }
  
  public function getAperepleg()
  {

    return trim($this->aperepleg);

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
  
  public function getEmailrepleg()
  {

    return trim($this->emailrepleg);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRifemp($v)
	{

    if ($this->rifemp !== $v) {
        $this->rifemp = $v;
        $this->modifiedColumns[] = InempresaPeer::RIFEMP;
      }
  
	} 
	
	public function setRazsoc($v)
	{

    if ($this->razsoc !== $v) {
        $this->razsoc = $v;
        $this->modifiedColumns[] = InempresaPeer::RAZSOC;
      }
  
	} 
	
	public function setIntipempId($v)
	{

    if ($this->intipemp_id !== $v) {
        $this->intipemp_id = $v;
        $this->modifiedColumns[] = InempresaPeer::INTIPEMP_ID;
      }
  
		if ($this->aIntipemp !== null && $this->aIntipemp->getId() !== $v) {
			$this->aIntipemp = null;
		}

	} 
	
	public function setInestadoId($v)
	{

    if ($this->inestado_id !== $v) {
        $this->inestado_id = $v;
        $this->modifiedColumns[] = InempresaPeer::INESTADO_ID;
      }
  
		if ($this->aInestado !== null && $this->aInestado->getId() !== $v) {
			$this->aInestado = null;
		}

	} 
	
	public function setInmunicipioId($v)
	{

    if ($this->inmunicipio_id !== $v) {
        $this->inmunicipio_id = $v;
        $this->modifiedColumns[] = InempresaPeer::INMUNICIPIO_ID;
      }
  
		if ($this->aInmunicipio !== null && $this->aInmunicipio->getId() !== $v) {
			$this->aInmunicipio = null;
		}

	} 
	
	public function setInparroquiaId($v)
	{

    if ($this->inparroquia_id !== $v) {
        $this->inparroquia_id = $v;
        $this->modifiedColumns[] = InempresaPeer::INPARROQUIA_ID;
      }
  
		if ($this->aInparroquia !== null && $this->aInparroquia->getId() !== $v) {
			$this->aInparroquia = null;
		}

	} 
	
	public function setDiremp($v)
	{

    if ($this->diremp !== $v) {
        $this->diremp = $v;
        $this->modifiedColumns[] = InempresaPeer::DIREMP;
      }
  
	} 
	
	public function setCodpost($v)
	{

    if ($this->codpost !== $v) {
        $this->codpost = $v;
        $this->modifiedColumns[] = InempresaPeer::CODPOST;
      }
  
	} 
	
	public function setTelemp($v)
	{

    if ($this->telemp !== $v) {
        $this->telemp = $v;
        $this->modifiedColumns[] = InempresaPeer::TELEMP;
      }
  
	} 
	
	public function setEmail($v)
	{

    if ($this->email !== $v) {
        $this->email = $v;
        $this->modifiedColumns[] = InempresaPeer::EMAIL;
      }
  
	} 
	
	public function setCedrepleg($v)
	{

    if ($this->cedrepleg !== $v) {
        $this->cedrepleg = $v;
        $this->modifiedColumns[] = InempresaPeer::CEDREPLEG;
      }
  
	} 
	
	public function setVenextrepleg($v)
	{

    if ($this->venextrepleg !== $v) {
        $this->venextrepleg = $v;
        $this->modifiedColumns[] = InempresaPeer::VENEXTREPLEG;
      }
  
	} 
	
	public function setNomrepleg($v)
	{

    if ($this->nomrepleg !== $v) {
        $this->nomrepleg = $v;
        $this->modifiedColumns[] = InempresaPeer::NOMREPLEG;
      }
  
	} 
	
	public function setAperepleg($v)
	{

    if ($this->aperepleg !== $v) {
        $this->aperepleg = $v;
        $this->modifiedColumns[] = InempresaPeer::APEREPLEG;
      }
  
	} 
	
	public function setSexo($v)
	{

    if ($this->sexo !== $v) {
        $this->sexo = $v;
        $this->modifiedColumns[] = InempresaPeer::SEXO;
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
      $this->modifiedColumns[] = InempresaPeer::FECNAC;
    }

	} 
	
	public function setEstciv($v)
	{

    if ($this->estciv !== $v) {
        $this->estciv = $v;
        $this->modifiedColumns[] = InempresaPeer::ESTCIV;
      }
  
	} 
	
	public function setTelhab($v)
	{

    if ($this->telhab !== $v) {
        $this->telhab = $v;
        $this->modifiedColumns[] = InempresaPeer::TELHAB;
      }
  
	} 
	
	public function setTelcel($v)
	{

    if ($this->telcel !== $v) {
        $this->telcel = $v;
        $this->modifiedColumns[] = InempresaPeer::TELCEL;
      }
  
	} 
	
	public function setEmailrepleg($v)
	{

    if ($this->emailrepleg !== $v) {
        $this->emailrepleg = $v;
        $this->modifiedColumns[] = InempresaPeer::EMAILREPLEG;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = InempresaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->rifemp = $rs->getString($startcol + 0);

      $this->razsoc = $rs->getString($startcol + 1);

      $this->intipemp_id = $rs->getInt($startcol + 2);

      $this->inestado_id = $rs->getInt($startcol + 3);

      $this->inmunicipio_id = $rs->getInt($startcol + 4);

      $this->inparroquia_id = $rs->getInt($startcol + 5);

      $this->diremp = $rs->getString($startcol + 6);

      $this->codpost = $rs->getString($startcol + 7);

      $this->telemp = $rs->getString($startcol + 8);

      $this->email = $rs->getString($startcol + 9);

      $this->cedrepleg = $rs->getString($startcol + 10);

      $this->venextrepleg = $rs->getString($startcol + 11);

      $this->nomrepleg = $rs->getString($startcol + 12);

      $this->aperepleg = $rs->getString($startcol + 13);

      $this->sexo = $rs->getString($startcol + 14);

      $this->fecnac = $rs->getDate($startcol + 15, null);

      $this->estciv = $rs->getString($startcol + 16);

      $this->telhab = $rs->getString($startcol + 17);

      $this->telcel = $rs->getString($startcol + 18);

      $this->emailrepleg = $rs->getString($startcol + 19);

      $this->id = $rs->getInt($startcol + 20);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 21; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Inempresa object", $e);
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
			$con = Propel::getConnection(InempresaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			InempresaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(InempresaPeer::DATABASE_NAME);
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


												
			if ($this->aIntipemp !== null) {
				if ($this->aIntipemp->isModified()) {
					$affectedRows += $this->aIntipemp->save($con);
				}
				$this->setIntipemp($this->aIntipemp);
			}

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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = InempresaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += InempresaPeer::doUpdate($this, $con);
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


												
			if ($this->aIntipemp !== null) {
				if (!$this->aIntipemp->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aIntipemp->getValidationFailures());
				}
			}

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


			if (($retval = InempresaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InempresaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRifemp();
				break;
			case 1:
				return $this->getRazsoc();
				break;
			case 2:
				return $this->getIntipempId();
				break;
			case 3:
				return $this->getInestadoId();
				break;
			case 4:
				return $this->getInmunicipioId();
				break;
			case 5:
				return $this->getInparroquiaId();
				break;
			case 6:
				return $this->getDiremp();
				break;
			case 7:
				return $this->getCodpost();
				break;
			case 8:
				return $this->getTelemp();
				break;
			case 9:
				return $this->getEmail();
				break;
			case 10:
				return $this->getCedrepleg();
				break;
			case 11:
				return $this->getVenextrepleg();
				break;
			case 12:
				return $this->getNomrepleg();
				break;
			case 13:
				return $this->getAperepleg();
				break;
			case 14:
				return $this->getSexo();
				break;
			case 15:
				return $this->getFecnac();
				break;
			case 16:
				return $this->getEstciv();
				break;
			case 17:
				return $this->getTelhab();
				break;
			case 18:
				return $this->getTelcel();
				break;
			case 19:
				return $this->getEmailrepleg();
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
		$keys = InempresaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRifemp(),
			$keys[1] => $this->getRazsoc(),
			$keys[2] => $this->getIntipempId(),
			$keys[3] => $this->getInestadoId(),
			$keys[4] => $this->getInmunicipioId(),
			$keys[5] => $this->getInparroquiaId(),
			$keys[6] => $this->getDiremp(),
			$keys[7] => $this->getCodpost(),
			$keys[8] => $this->getTelemp(),
			$keys[9] => $this->getEmail(),
			$keys[10] => $this->getCedrepleg(),
			$keys[11] => $this->getVenextrepleg(),
			$keys[12] => $this->getNomrepleg(),
			$keys[13] => $this->getAperepleg(),
			$keys[14] => $this->getSexo(),
			$keys[15] => $this->getFecnac(),
			$keys[16] => $this->getEstciv(),
			$keys[17] => $this->getTelhab(),
			$keys[18] => $this->getTelcel(),
			$keys[19] => $this->getEmailrepleg(),
			$keys[20] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InempresaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRifemp($value);
				break;
			case 1:
				$this->setRazsoc($value);
				break;
			case 2:
				$this->setIntipempId($value);
				break;
			case 3:
				$this->setInestadoId($value);
				break;
			case 4:
				$this->setInmunicipioId($value);
				break;
			case 5:
				$this->setInparroquiaId($value);
				break;
			case 6:
				$this->setDiremp($value);
				break;
			case 7:
				$this->setCodpost($value);
				break;
			case 8:
				$this->setTelemp($value);
				break;
			case 9:
				$this->setEmail($value);
				break;
			case 10:
				$this->setCedrepleg($value);
				break;
			case 11:
				$this->setVenextrepleg($value);
				break;
			case 12:
				$this->setNomrepleg($value);
				break;
			case 13:
				$this->setAperepleg($value);
				break;
			case 14:
				$this->setSexo($value);
				break;
			case 15:
				$this->setFecnac($value);
				break;
			case 16:
				$this->setEstciv($value);
				break;
			case 17:
				$this->setTelhab($value);
				break;
			case 18:
				$this->setTelcel($value);
				break;
			case 19:
				$this->setEmailrepleg($value);
				break;
			case 20:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InempresaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRifemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRazsoc($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIntipempId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setInestadoId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setInmunicipioId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setInparroquiaId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDiremp($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodpost($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTelemp($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setEmail($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCedrepleg($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setVenextrepleg($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setNomrepleg($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setAperepleg($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setSexo($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setFecnac($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setEstciv($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setTelhab($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setTelcel($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setEmailrepleg($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setId($arr[$keys[20]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(InempresaPeer::DATABASE_NAME);

		if ($this->isColumnModified(InempresaPeer::RIFEMP)) $criteria->add(InempresaPeer::RIFEMP, $this->rifemp);
		if ($this->isColumnModified(InempresaPeer::RAZSOC)) $criteria->add(InempresaPeer::RAZSOC, $this->razsoc);
		if ($this->isColumnModified(InempresaPeer::INTIPEMP_ID)) $criteria->add(InempresaPeer::INTIPEMP_ID, $this->intipemp_id);
		if ($this->isColumnModified(InempresaPeer::INESTADO_ID)) $criteria->add(InempresaPeer::INESTADO_ID, $this->inestado_id);
		if ($this->isColumnModified(InempresaPeer::INMUNICIPIO_ID)) $criteria->add(InempresaPeer::INMUNICIPIO_ID, $this->inmunicipio_id);
		if ($this->isColumnModified(InempresaPeer::INPARROQUIA_ID)) $criteria->add(InempresaPeer::INPARROQUIA_ID, $this->inparroquia_id);
		if ($this->isColumnModified(InempresaPeer::DIREMP)) $criteria->add(InempresaPeer::DIREMP, $this->diremp);
		if ($this->isColumnModified(InempresaPeer::CODPOST)) $criteria->add(InempresaPeer::CODPOST, $this->codpost);
		if ($this->isColumnModified(InempresaPeer::TELEMP)) $criteria->add(InempresaPeer::TELEMP, $this->telemp);
		if ($this->isColumnModified(InempresaPeer::EMAIL)) $criteria->add(InempresaPeer::EMAIL, $this->email);
		if ($this->isColumnModified(InempresaPeer::CEDREPLEG)) $criteria->add(InempresaPeer::CEDREPLEG, $this->cedrepleg);
		if ($this->isColumnModified(InempresaPeer::VENEXTREPLEG)) $criteria->add(InempresaPeer::VENEXTREPLEG, $this->venextrepleg);
		if ($this->isColumnModified(InempresaPeer::NOMREPLEG)) $criteria->add(InempresaPeer::NOMREPLEG, $this->nomrepleg);
		if ($this->isColumnModified(InempresaPeer::APEREPLEG)) $criteria->add(InempresaPeer::APEREPLEG, $this->aperepleg);
		if ($this->isColumnModified(InempresaPeer::SEXO)) $criteria->add(InempresaPeer::SEXO, $this->sexo);
		if ($this->isColumnModified(InempresaPeer::FECNAC)) $criteria->add(InempresaPeer::FECNAC, $this->fecnac);
		if ($this->isColumnModified(InempresaPeer::ESTCIV)) $criteria->add(InempresaPeer::ESTCIV, $this->estciv);
		if ($this->isColumnModified(InempresaPeer::TELHAB)) $criteria->add(InempresaPeer::TELHAB, $this->telhab);
		if ($this->isColumnModified(InempresaPeer::TELCEL)) $criteria->add(InempresaPeer::TELCEL, $this->telcel);
		if ($this->isColumnModified(InempresaPeer::EMAILREPLEG)) $criteria->add(InempresaPeer::EMAILREPLEG, $this->emailrepleg);
		if ($this->isColumnModified(InempresaPeer::ID)) $criteria->add(InempresaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(InempresaPeer::DATABASE_NAME);

		$criteria->add(InempresaPeer::ID, $this->id);

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

		$copyObj->setRifemp($this->rifemp);

		$copyObj->setRazsoc($this->razsoc);

		$copyObj->setIntipempId($this->intipemp_id);

		$copyObj->setInestadoId($this->inestado_id);

		$copyObj->setInmunicipioId($this->inmunicipio_id);

		$copyObj->setInparroquiaId($this->inparroquia_id);

		$copyObj->setDiremp($this->diremp);

		$copyObj->setCodpost($this->codpost);

		$copyObj->setTelemp($this->telemp);

		$copyObj->setEmail($this->email);

		$copyObj->setCedrepleg($this->cedrepleg);

		$copyObj->setVenextrepleg($this->venextrepleg);

		$copyObj->setNomrepleg($this->nomrepleg);

		$copyObj->setAperepleg($this->aperepleg);

		$copyObj->setSexo($this->sexo);

		$copyObj->setFecnac($this->fecnac);

		$copyObj->setEstciv($this->estciv);

		$copyObj->setTelhab($this->telhab);

		$copyObj->setTelcel($this->telcel);

		$copyObj->setEmailrepleg($this->emailrepleg);


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
			self::$peer = new InempresaPeer();
		}
		return self::$peer;
	}

	
	public function setIntipemp($v)
	{


		if ($v === null) {
			$this->setIntipempId(NULL);
		} else {
			$this->setIntipempId($v->getId());
		}


		$this->aIntipemp = $v;
	}


	
	public function getIntipemp($con = null)
	{
		if ($this->aIntipemp === null && ($this->intipemp_id !== null)) {
						include_once 'lib/model/om/BaseIntipempPeer.php';

			$this->aIntipemp = IntipempPeer::retrieveByPK($this->intipemp_id, $con);

			
		}
		return $this->aIntipemp;
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

} 