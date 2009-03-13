<?php


abstract class BaseFcapulic extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nrocon;


	
	protected $fecreg;


	
	protected $rifcon;


	
	protected $tipapu;


	
	protected $desapu;


	
	protected $dirapu;


	
	protected $monapu;


	
	protected $monimp;


	
	protected $funrec;


	
	protected $fecrec;


	
	protected $rifrep;


	
	protected $staapu;


	
	protected $stadec;


	
	protected $nomcon;


	
	protected $dircon;


	
	protected $semdia;


	
	protected $exoapu;


	
	protected $texexo;


	
	protected $fecapu;


	
	protected $serapui;


	
	protected $serapuf;


	
	protected $horapu;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNrocon()
  {

    return trim($this->nrocon);

  }
  
  public function getFecreg($format = 'Y-m-d')
  {

    if ($this->fecreg === null || $this->fecreg === '') {
      return null;
    } elseif (!is_int($this->fecreg)) {
            $ts = adodb_strtotime($this->fecreg);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecreg] as date/time value: " . var_export($this->fecreg, true));
      }
    } else {
      $ts = $this->fecreg;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getRifcon()
  {

    return trim($this->rifcon);

  }
  
  public function getTipapu()
  {

    return trim($this->tipapu);

  }
  
  public function getDesapu()
  {

    return trim($this->desapu);

  }
  
  public function getDirapu()
  {

    return trim($this->dirapu);

  }
  
  public function getMonapu($val=false)
  {

    if($val) return number_format($this->monapu,2,',','.');
    else return $this->monapu;

  }
  
  public function getMonimp($val=false)
  {

    if($val) return number_format($this->monimp,2,',','.');
    else return $this->monimp;

  }
  
  public function getFunrec()
  {

    return trim($this->funrec);

  }
  
  public function getFecrec($format = 'Y-m-d')
  {

    if ($this->fecrec === null || $this->fecrec === '') {
      return null;
    } elseif (!is_int($this->fecrec)) {
            $ts = adodb_strtotime($this->fecrec);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecrec] as date/time value: " . var_export($this->fecrec, true));
      }
    } else {
      $ts = $this->fecrec;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getRifrep()
  {

    return trim($this->rifrep);

  }
  
  public function getStaapu()
  {

    return trim($this->staapu);

  }
  
  public function getStadec()
  {

    return trim($this->stadec);

  }
  
  public function getNomcon()
  {

    return trim($this->nomcon);

  }
  
  public function getDircon()
  {

    return trim($this->dircon);

  }
  
  public function getSemdia($val=false)
  {

    if($val) return number_format($this->semdia,2,',','.');
    else return $this->semdia;

  }
  
  public function getExoapu()
  {

    return trim($this->exoapu);

  }
  
  public function getTexexo()
  {

    return trim($this->texexo);

  }
  
  public function getFecapu($format = 'Y-m-d')
  {

    if ($this->fecapu === null || $this->fecapu === '') {
      return null;
    } elseif (!is_int($this->fecapu)) {
            $ts = adodb_strtotime($this->fecapu);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecapu] as date/time value: " . var_export($this->fecapu, true));
      }
    } else {
      $ts = $this->fecapu;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getSerapui()
  {

    return trim($this->serapui);

  }
  
  public function getSerapuf()
  {

    return trim($this->serapuf);

  }
  
  public function getHorapu()
  {

    return trim($this->horapu);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNrocon($v)
	{

    if ($this->nrocon !== $v) {
        $this->nrocon = $v;
        $this->modifiedColumns[] = FcapulicPeer::NROCON;
      }
  
	} 
	
	public function setFecreg($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecreg] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecreg !== $ts) {
      $this->fecreg = $ts;
      $this->modifiedColumns[] = FcapulicPeer::FECREG;
    }

	} 
	
	public function setRifcon($v)
	{

    if ($this->rifcon !== $v) {
        $this->rifcon = $v;
        $this->modifiedColumns[] = FcapulicPeer::RIFCON;
      }
  
	} 
	
	public function setTipapu($v)
	{

    if ($this->tipapu !== $v) {
        $this->tipapu = $v;
        $this->modifiedColumns[] = FcapulicPeer::TIPAPU;
      }
  
	} 
	
	public function setDesapu($v)
	{

    if ($this->desapu !== $v) {
        $this->desapu = $v;
        $this->modifiedColumns[] = FcapulicPeer::DESAPU;
      }
  
	} 
	
	public function setDirapu($v)
	{

    if ($this->dirapu !== $v) {
        $this->dirapu = $v;
        $this->modifiedColumns[] = FcapulicPeer::DIRAPU;
      }
  
	} 
	
	public function setMonapu($v)
	{

    if ($this->monapu !== $v) {
        $this->monapu = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcapulicPeer::MONAPU;
      }
  
	} 
	
	public function setMonimp($v)
	{

    if ($this->monimp !== $v) {
        $this->monimp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcapulicPeer::MONIMP;
      }
  
	} 
	
	public function setFunrec($v)
	{

    if ($this->funrec !== $v) {
        $this->funrec = $v;
        $this->modifiedColumns[] = FcapulicPeer::FUNREC;
      }
  
	} 
	
	public function setFecrec($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecrec] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecrec !== $ts) {
      $this->fecrec = $ts;
      $this->modifiedColumns[] = FcapulicPeer::FECREC;
    }

	} 
	
	public function setRifrep($v)
	{

    if ($this->rifrep !== $v) {
        $this->rifrep = $v;
        $this->modifiedColumns[] = FcapulicPeer::RIFREP;
      }
  
	} 
	
	public function setStaapu($v)
	{

    if ($this->staapu !== $v) {
        $this->staapu = $v;
        $this->modifiedColumns[] = FcapulicPeer::STAAPU;
      }
  
	} 
	
	public function setStadec($v)
	{

    if ($this->stadec !== $v) {
        $this->stadec = $v;
        $this->modifiedColumns[] = FcapulicPeer::STADEC;
      }
  
	} 
	
	public function setNomcon($v)
	{

    if ($this->nomcon !== $v) {
        $this->nomcon = $v;
        $this->modifiedColumns[] = FcapulicPeer::NOMCON;
      }
  
	} 
	
	public function setDircon($v)
	{

    if ($this->dircon !== $v) {
        $this->dircon = $v;
        $this->modifiedColumns[] = FcapulicPeer::DIRCON;
      }
  
	} 
	
	public function setSemdia($v)
	{

    if ($this->semdia !== $v) {
        $this->semdia = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcapulicPeer::SEMDIA;
      }
  
	} 
	
	public function setExoapu($v)
	{

    if ($this->exoapu !== $v) {
        $this->exoapu = $v;
        $this->modifiedColumns[] = FcapulicPeer::EXOAPU;
      }
  
	} 
	
	public function setTexexo($v)
	{

    if ($this->texexo !== $v) {
        $this->texexo = $v;
        $this->modifiedColumns[] = FcapulicPeer::TEXEXO;
      }
  
	} 
	
	public function setFecapu($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecapu] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecapu !== $ts) {
      $this->fecapu = $ts;
      $this->modifiedColumns[] = FcapulicPeer::FECAPU;
    }

	} 
	
	public function setSerapui($v)
	{

    if ($this->serapui !== $v) {
        $this->serapui = $v;
        $this->modifiedColumns[] = FcapulicPeer::SERAPUI;
      }
  
	} 
	
	public function setSerapuf($v)
	{

    if ($this->serapuf !== $v) {
        $this->serapuf = $v;
        $this->modifiedColumns[] = FcapulicPeer::SERAPUF;
      }
  
	} 
	
	public function setHorapu($v)
	{

    if ($this->horapu !== $v) {
        $this->horapu = $v;
        $this->modifiedColumns[] = FcapulicPeer::HORAPU;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcapulicPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->nrocon = $rs->getString($startcol + 0);

      $this->fecreg = $rs->getDate($startcol + 1, null);

      $this->rifcon = $rs->getString($startcol + 2);

      $this->tipapu = $rs->getString($startcol + 3);

      $this->desapu = $rs->getString($startcol + 4);

      $this->dirapu = $rs->getString($startcol + 5);

      $this->monapu = $rs->getFloat($startcol + 6);

      $this->monimp = $rs->getFloat($startcol + 7);

      $this->funrec = $rs->getString($startcol + 8);

      $this->fecrec = $rs->getDate($startcol + 9, null);

      $this->rifrep = $rs->getString($startcol + 10);

      $this->staapu = $rs->getString($startcol + 11);

      $this->stadec = $rs->getString($startcol + 12);

      $this->nomcon = $rs->getString($startcol + 13);

      $this->dircon = $rs->getString($startcol + 14);

      $this->semdia = $rs->getFloat($startcol + 15);

      $this->exoapu = $rs->getString($startcol + 16);

      $this->texexo = $rs->getString($startcol + 17);

      $this->fecapu = $rs->getDate($startcol + 18, null);

      $this->serapui = $rs->getString($startcol + 19);

      $this->serapuf = $rs->getString($startcol + 20);

      $this->horapu = $rs->getString($startcol + 21);

      $this->id = $rs->getInt($startcol + 22);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 23; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcapulic object", $e);
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
			$con = Propel::getConnection(FcapulicPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcapulicPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcapulicPeer::DATABASE_NAME);
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
					$pk = FcapulicPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcapulicPeer::doUpdate($this, $con);
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


			if (($retval = FcapulicPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcapulicPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNrocon();
				break;
			case 1:
				return $this->getFecreg();
				break;
			case 2:
				return $this->getRifcon();
				break;
			case 3:
				return $this->getTipapu();
				break;
			case 4:
				return $this->getDesapu();
				break;
			case 5:
				return $this->getDirapu();
				break;
			case 6:
				return $this->getMonapu();
				break;
			case 7:
				return $this->getMonimp();
				break;
			case 8:
				return $this->getFunrec();
				break;
			case 9:
				return $this->getFecrec();
				break;
			case 10:
				return $this->getRifrep();
				break;
			case 11:
				return $this->getStaapu();
				break;
			case 12:
				return $this->getStadec();
				break;
			case 13:
				return $this->getNomcon();
				break;
			case 14:
				return $this->getDircon();
				break;
			case 15:
				return $this->getSemdia();
				break;
			case 16:
				return $this->getExoapu();
				break;
			case 17:
				return $this->getTexexo();
				break;
			case 18:
				return $this->getFecapu();
				break;
			case 19:
				return $this->getSerapui();
				break;
			case 20:
				return $this->getSerapuf();
				break;
			case 21:
				return $this->getHorapu();
				break;
			case 22:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcapulicPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNrocon(),
			$keys[1] => $this->getFecreg(),
			$keys[2] => $this->getRifcon(),
			$keys[3] => $this->getTipapu(),
			$keys[4] => $this->getDesapu(),
			$keys[5] => $this->getDirapu(),
			$keys[6] => $this->getMonapu(),
			$keys[7] => $this->getMonimp(),
			$keys[8] => $this->getFunrec(),
			$keys[9] => $this->getFecrec(),
			$keys[10] => $this->getRifrep(),
			$keys[11] => $this->getStaapu(),
			$keys[12] => $this->getStadec(),
			$keys[13] => $this->getNomcon(),
			$keys[14] => $this->getDircon(),
			$keys[15] => $this->getSemdia(),
			$keys[16] => $this->getExoapu(),
			$keys[17] => $this->getTexexo(),
			$keys[18] => $this->getFecapu(),
			$keys[19] => $this->getSerapui(),
			$keys[20] => $this->getSerapuf(),
			$keys[21] => $this->getHorapu(),
			$keys[22] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcapulicPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNrocon($value);
				break;
			case 1:
				$this->setFecreg($value);
				break;
			case 2:
				$this->setRifcon($value);
				break;
			case 3:
				$this->setTipapu($value);
				break;
			case 4:
				$this->setDesapu($value);
				break;
			case 5:
				$this->setDirapu($value);
				break;
			case 6:
				$this->setMonapu($value);
				break;
			case 7:
				$this->setMonimp($value);
				break;
			case 8:
				$this->setFunrec($value);
				break;
			case 9:
				$this->setFecrec($value);
				break;
			case 10:
				$this->setRifrep($value);
				break;
			case 11:
				$this->setStaapu($value);
				break;
			case 12:
				$this->setStadec($value);
				break;
			case 13:
				$this->setNomcon($value);
				break;
			case 14:
				$this->setDircon($value);
				break;
			case 15:
				$this->setSemdia($value);
				break;
			case 16:
				$this->setExoapu($value);
				break;
			case 17:
				$this->setTexexo($value);
				break;
			case 18:
				$this->setFecapu($value);
				break;
			case 19:
				$this->setSerapui($value);
				break;
			case 20:
				$this->setSerapuf($value);
				break;
			case 21:
				$this->setHorapu($value);
				break;
			case 22:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcapulicPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNrocon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecreg($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRifcon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipapu($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDesapu($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDirapu($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonapu($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMonimp($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFunrec($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecrec($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setRifrep($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setStaapu($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setStadec($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setNomcon($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setDircon($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setSemdia($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setExoapu($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setTexexo($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setFecapu($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setSerapui($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setSerapuf($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setHorapu($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setId($arr[$keys[22]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcapulicPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcapulicPeer::NROCON)) $criteria->add(FcapulicPeer::NROCON, $this->nrocon);
		if ($this->isColumnModified(FcapulicPeer::FECREG)) $criteria->add(FcapulicPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(FcapulicPeer::RIFCON)) $criteria->add(FcapulicPeer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(FcapulicPeer::TIPAPU)) $criteria->add(FcapulicPeer::TIPAPU, $this->tipapu);
		if ($this->isColumnModified(FcapulicPeer::DESAPU)) $criteria->add(FcapulicPeer::DESAPU, $this->desapu);
		if ($this->isColumnModified(FcapulicPeer::DIRAPU)) $criteria->add(FcapulicPeer::DIRAPU, $this->dirapu);
		if ($this->isColumnModified(FcapulicPeer::MONAPU)) $criteria->add(FcapulicPeer::MONAPU, $this->monapu);
		if ($this->isColumnModified(FcapulicPeer::MONIMP)) $criteria->add(FcapulicPeer::MONIMP, $this->monimp);
		if ($this->isColumnModified(FcapulicPeer::FUNREC)) $criteria->add(FcapulicPeer::FUNREC, $this->funrec);
		if ($this->isColumnModified(FcapulicPeer::FECREC)) $criteria->add(FcapulicPeer::FECREC, $this->fecrec);
		if ($this->isColumnModified(FcapulicPeer::RIFREP)) $criteria->add(FcapulicPeer::RIFREP, $this->rifrep);
		if ($this->isColumnModified(FcapulicPeer::STAAPU)) $criteria->add(FcapulicPeer::STAAPU, $this->staapu);
		if ($this->isColumnModified(FcapulicPeer::STADEC)) $criteria->add(FcapulicPeer::STADEC, $this->stadec);
		if ($this->isColumnModified(FcapulicPeer::NOMCON)) $criteria->add(FcapulicPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(FcapulicPeer::DIRCON)) $criteria->add(FcapulicPeer::DIRCON, $this->dircon);
		if ($this->isColumnModified(FcapulicPeer::SEMDIA)) $criteria->add(FcapulicPeer::SEMDIA, $this->semdia);
		if ($this->isColumnModified(FcapulicPeer::EXOAPU)) $criteria->add(FcapulicPeer::EXOAPU, $this->exoapu);
		if ($this->isColumnModified(FcapulicPeer::TEXEXO)) $criteria->add(FcapulicPeer::TEXEXO, $this->texexo);
		if ($this->isColumnModified(FcapulicPeer::FECAPU)) $criteria->add(FcapulicPeer::FECAPU, $this->fecapu);
		if ($this->isColumnModified(FcapulicPeer::SERAPUI)) $criteria->add(FcapulicPeer::SERAPUI, $this->serapui);
		if ($this->isColumnModified(FcapulicPeer::SERAPUF)) $criteria->add(FcapulicPeer::SERAPUF, $this->serapuf);
		if ($this->isColumnModified(FcapulicPeer::HORAPU)) $criteria->add(FcapulicPeer::HORAPU, $this->horapu);
		if ($this->isColumnModified(FcapulicPeer::ID)) $criteria->add(FcapulicPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcapulicPeer::DATABASE_NAME);

		$criteria->add(FcapulicPeer::ID, $this->id);

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

		$copyObj->setNrocon($this->nrocon);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setRifcon($this->rifcon);

		$copyObj->setTipapu($this->tipapu);

		$copyObj->setDesapu($this->desapu);

		$copyObj->setDirapu($this->dirapu);

		$copyObj->setMonapu($this->monapu);

		$copyObj->setMonimp($this->monimp);

		$copyObj->setFunrec($this->funrec);

		$copyObj->setFecrec($this->fecrec);

		$copyObj->setRifrep($this->rifrep);

		$copyObj->setStaapu($this->staapu);

		$copyObj->setStadec($this->stadec);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setDircon($this->dircon);

		$copyObj->setSemdia($this->semdia);

		$copyObj->setExoapu($this->exoapu);

		$copyObj->setTexexo($this->texexo);

		$copyObj->setFecapu($this->fecapu);

		$copyObj->setSerapui($this->serapui);

		$copyObj->setSerapuf($this->serapuf);

		$copyObj->setHorapu($this->horapu);


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
			self::$peer = new FcapulicPeer();
		}
		return self::$peer;
	}

} 