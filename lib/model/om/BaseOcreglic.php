<?php


abstract class BaseOcreglic extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codlic;


	
	protected $codtiplic;


	
	protected $deslic;


	
	protected $sitact;


	
	protected $ente;


	
	protected $fecreg;


	
	protected $fecedi;


	
	protected $codobr;


	
	protected $fecdisdes;


	
	protected $fecdishas;


	
	protected $costo;


	
	protected $forpag;


	
	protected $decretos;


	
	protected $dirret;


	
	protected $percontac;


	
	protected $horaret;


	
	protected $periodico;


	
	protected $fecpub;


	
	protected $pagina;


	
	protected $cuerpo;


	
	protected $mes;


	
	protected $codpaiefec;


	
	protected $codpairecep;


	
	protected $codfin;


	
	protected $fecofer;


	
	protected $horaofer;


	
	protected $dirofer;


	
	protected $percontacofer;


	
	protected $codclacomp;


	
	protected $observaciones;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodlic()
  {

    return trim($this->codlic);

  }
  
  public function getCodtiplic()
  {

    return trim($this->codtiplic);

  }
  
  public function getDeslic()
  {

    return trim($this->deslic);

  }
  
  public function getSitact()
  {

    return trim($this->sitact);

  }
  
  public function getEnte()
  {

    return trim($this->ente);

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

  
  public function getFecedi($format = 'Y-m-d')
  {

    if ($this->fecedi === null || $this->fecedi === '') {
      return null;
    } elseif (!is_int($this->fecedi)) {
            $ts = adodb_strtotime($this->fecedi);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecedi] as date/time value: " . var_export($this->fecedi, true));
      }
    } else {
      $ts = $this->fecedi;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodobr()
  {

    return trim($this->codobr);

  }
  
  public function getFecdisdes($format = 'Y-m-d')
  {

    if ($this->fecdisdes === null || $this->fecdisdes === '') {
      return null;
    } elseif (!is_int($this->fecdisdes)) {
            $ts = adodb_strtotime($this->fecdisdes);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdisdes] as date/time value: " . var_export($this->fecdisdes, true));
      }
    } else {
      $ts = $this->fecdisdes;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecdishas($format = 'Y-m-d')
  {

    if ($this->fecdishas === null || $this->fecdishas === '') {
      return null;
    } elseif (!is_int($this->fecdishas)) {
            $ts = adodb_strtotime($this->fecdishas);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdishas] as date/time value: " . var_export($this->fecdishas, true));
      }
    } else {
      $ts = $this->fecdishas;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCosto($val=false)
  {

    if($val) return number_format($this->costo,2,',','.');
    else return $this->costo;

  }
  
  public function getForpag()
  {

    return trim($this->forpag);

  }
  
  public function getDecretos()
  {

    return trim($this->decretos);

  }
  
  public function getDirret()
  {

    return trim($this->dirret);

  }
  
  public function getPercontac()
  {

    return trim($this->percontac);

  }
  
  public function getHoraret()
  {

    return trim($this->horaret);

  }
  
  public function getPeriodico()
  {

    return trim($this->periodico);

  }
  
  public function getFecpub($format = 'Y-m-d')
  {

    if ($this->fecpub === null || $this->fecpub === '') {
      return null;
    } elseif (!is_int($this->fecpub)) {
            $ts = adodb_strtotime($this->fecpub);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecpub] as date/time value: " . var_export($this->fecpub, true));
      }
    } else {
      $ts = $this->fecpub;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getPagina()
  {

    return trim($this->pagina);

  }
  
  public function getCuerpo()
  {

    return trim($this->cuerpo);

  }
  
  public function getMes()
  {

    return trim($this->mes);

  }
  
  public function getCodpaiefec()
  {

    return trim($this->codpaiefec);

  }
  
  public function getCodpairecep()
  {

    return trim($this->codpairecep);

  }
  
  public function getCodfin()
  {

    return trim($this->codfin);

  }
  
  public function getFecofer($format = 'Y-m-d')
  {

    if ($this->fecofer === null || $this->fecofer === '') {
      return null;
    } elseif (!is_int($this->fecofer)) {
            $ts = adodb_strtotime($this->fecofer);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecofer] as date/time value: " . var_export($this->fecofer, true));
      }
    } else {
      $ts = $this->fecofer;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getHoraofer()
  {

    return trim($this->horaofer);

  }
  
  public function getDirofer()
  {

    return trim($this->dirofer);

  }
  
  public function getPercontacofer()
  {

    return trim($this->percontacofer);

  }
  
  public function getCodclacomp()
  {

    return trim($this->codclacomp);

  }
  
  public function getObservaciones()
  {

    return trim($this->observaciones);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodlic($v)
	{

    if ($this->codlic !== $v) {
        $this->codlic = $v;
        $this->modifiedColumns[] = OcreglicPeer::CODLIC;
      }
  
	} 
	
	public function setCodtiplic($v)
	{

    if ($this->codtiplic !== $v) {
        $this->codtiplic = $v;
        $this->modifiedColumns[] = OcreglicPeer::CODTIPLIC;
      }
  
	} 
	
	public function setDeslic($v)
	{

    if ($this->deslic !== $v) {
        $this->deslic = $v;
        $this->modifiedColumns[] = OcreglicPeer::DESLIC;
      }
  
	} 
	
	public function setSitact($v)
	{

    if ($this->sitact !== $v) {
        $this->sitact = $v;
        $this->modifiedColumns[] = OcreglicPeer::SITACT;
      }
  
	} 
	
	public function setEnte($v)
	{

    if ($this->ente !== $v) {
        $this->ente = $v;
        $this->modifiedColumns[] = OcreglicPeer::ENTE;
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
      $this->modifiedColumns[] = OcreglicPeer::FECREG;
    }

	} 
	
	public function setFecedi($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecedi] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecedi !== $ts) {
      $this->fecedi = $ts;
      $this->modifiedColumns[] = OcreglicPeer::FECEDI;
    }

	} 
	
	public function setCodobr($v)
	{

    if ($this->codobr !== $v) {
        $this->codobr = $v;
        $this->modifiedColumns[] = OcreglicPeer::CODOBR;
      }
  
	} 
	
	public function setFecdisdes($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdisdes] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdisdes !== $ts) {
      $this->fecdisdes = $ts;
      $this->modifiedColumns[] = OcreglicPeer::FECDISDES;
    }

	} 
	
	public function setFecdishas($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdishas] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdishas !== $ts) {
      $this->fecdishas = $ts;
      $this->modifiedColumns[] = OcreglicPeer::FECDISHAS;
    }

	} 
	
	public function setCosto($v)
	{

    if ($this->costo !== $v) {
        $this->costo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OcreglicPeer::COSTO;
      }
  
	} 
	
	public function setForpag($v)
	{

    if ($this->forpag !== $v) {
        $this->forpag = $v;
        $this->modifiedColumns[] = OcreglicPeer::FORPAG;
      }
  
	} 
	
	public function setDecretos($v)
	{

    if ($this->decretos !== $v) {
        $this->decretos = $v;
        $this->modifiedColumns[] = OcreglicPeer::DECRETOS;
      }
  
	} 
	
	public function setDirret($v)
	{

    if ($this->dirret !== $v) {
        $this->dirret = $v;
        $this->modifiedColumns[] = OcreglicPeer::DIRRET;
      }
  
	} 
	
	public function setPercontac($v)
	{

    if ($this->percontac !== $v) {
        $this->percontac = $v;
        $this->modifiedColumns[] = OcreglicPeer::PERCONTAC;
      }
  
	} 
	
	public function setHoraret($v)
	{

    if ($this->horaret !== $v) {
        $this->horaret = $v;
        $this->modifiedColumns[] = OcreglicPeer::HORARET;
      }
  
	} 
	
	public function setPeriodico($v)
	{

    if ($this->periodico !== $v) {
        $this->periodico = $v;
        $this->modifiedColumns[] = OcreglicPeer::PERIODICO;
      }
  
	} 
	
	public function setFecpub($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecpub] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecpub !== $ts) {
      $this->fecpub = $ts;
      $this->modifiedColumns[] = OcreglicPeer::FECPUB;
    }

	} 
	
	public function setPagina($v)
	{

    if ($this->pagina !== $v) {
        $this->pagina = $v;
        $this->modifiedColumns[] = OcreglicPeer::PAGINA;
      }
  
	} 
	
	public function setCuerpo($v)
	{

    if ($this->cuerpo !== $v) {
        $this->cuerpo = $v;
        $this->modifiedColumns[] = OcreglicPeer::CUERPO;
      }
  
	} 
	
	public function setMes($v)
	{

    if ($this->mes !== $v) {
        $this->mes = $v;
        $this->modifiedColumns[] = OcreglicPeer::MES;
      }
  
	} 
	
	public function setCodpaiefec($v)
	{

    if ($this->codpaiefec !== $v) {
        $this->codpaiefec = $v;
        $this->modifiedColumns[] = OcreglicPeer::CODPAIEFEC;
      }
  
	} 
	
	public function setCodpairecep($v)
	{

    if ($this->codpairecep !== $v) {
        $this->codpairecep = $v;
        $this->modifiedColumns[] = OcreglicPeer::CODPAIRECEP;
      }
  
	} 
	
	public function setCodfin($v)
	{

    if ($this->codfin !== $v) {
        $this->codfin = $v;
        $this->modifiedColumns[] = OcreglicPeer::CODFIN;
      }
  
	} 
	
	public function setFecofer($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecofer] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecofer !== $ts) {
      $this->fecofer = $ts;
      $this->modifiedColumns[] = OcreglicPeer::FECOFER;
    }

	} 
	
	public function setHoraofer($v)
	{

    if ($this->horaofer !== $v) {
        $this->horaofer = $v;
        $this->modifiedColumns[] = OcreglicPeer::HORAOFER;
      }
  
	} 
	
	public function setDirofer($v)
	{

    if ($this->dirofer !== $v) {
        $this->dirofer = $v;
        $this->modifiedColumns[] = OcreglicPeer::DIROFER;
      }
  
	} 
	
	public function setPercontacofer($v)
	{

    if ($this->percontacofer !== $v) {
        $this->percontacofer = $v;
        $this->modifiedColumns[] = OcreglicPeer::PERCONTACOFER;
      }
  
	} 
	
	public function setCodclacomp($v)
	{

    if ($this->codclacomp !== $v) {
        $this->codclacomp = $v;
        $this->modifiedColumns[] = OcreglicPeer::CODCLACOMP;
      }
  
	} 
	
	public function setObservaciones($v)
	{

    if ($this->observaciones !== $v) {
        $this->observaciones = $v;
        $this->modifiedColumns[] = OcreglicPeer::OBSERVACIONES;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OcreglicPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codlic = $rs->getString($startcol + 0);

      $this->codtiplic = $rs->getString($startcol + 1);

      $this->deslic = $rs->getString($startcol + 2);

      $this->sitact = $rs->getString($startcol + 3);

      $this->ente = $rs->getString($startcol + 4);

      $this->fecreg = $rs->getDate($startcol + 5, null);

      $this->fecedi = $rs->getDate($startcol + 6, null);

      $this->codobr = $rs->getString($startcol + 7);

      $this->fecdisdes = $rs->getDate($startcol + 8, null);

      $this->fecdishas = $rs->getDate($startcol + 9, null);

      $this->costo = $rs->getFloat($startcol + 10);

      $this->forpag = $rs->getString($startcol + 11);

      $this->decretos = $rs->getString($startcol + 12);

      $this->dirret = $rs->getString($startcol + 13);

      $this->percontac = $rs->getString($startcol + 14);

      $this->horaret = $rs->getString($startcol + 15);

      $this->periodico = $rs->getString($startcol + 16);

      $this->fecpub = $rs->getDate($startcol + 17, null);

      $this->pagina = $rs->getString($startcol + 18);

      $this->cuerpo = $rs->getString($startcol + 19);

      $this->mes = $rs->getString($startcol + 20);

      $this->codpaiefec = $rs->getString($startcol + 21);

      $this->codpairecep = $rs->getString($startcol + 22);

      $this->codfin = $rs->getString($startcol + 23);

      $this->fecofer = $rs->getDate($startcol + 24, null);

      $this->horaofer = $rs->getString($startcol + 25);

      $this->dirofer = $rs->getString($startcol + 26);

      $this->percontacofer = $rs->getString($startcol + 27);

      $this->codclacomp = $rs->getString($startcol + 28);

      $this->observaciones = $rs->getString($startcol + 29);

      $this->id = $rs->getInt($startcol + 30);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 31; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ocreglic object", $e);
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
			$con = Propel::getConnection(OcreglicPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcreglicPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcreglicPeer::DATABASE_NAME);
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
					$pk = OcreglicPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OcreglicPeer::doUpdate($this, $con);
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


			if (($retval = OcreglicPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcreglicPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodlic();
				break;
			case 1:
				return $this->getCodtiplic();
				break;
			case 2:
				return $this->getDeslic();
				break;
			case 3:
				return $this->getSitact();
				break;
			case 4:
				return $this->getEnte();
				break;
			case 5:
				return $this->getFecreg();
				break;
			case 6:
				return $this->getFecedi();
				break;
			case 7:
				return $this->getCodobr();
				break;
			case 8:
				return $this->getFecdisdes();
				break;
			case 9:
				return $this->getFecdishas();
				break;
			case 10:
				return $this->getCosto();
				break;
			case 11:
				return $this->getForpag();
				break;
			case 12:
				return $this->getDecretos();
				break;
			case 13:
				return $this->getDirret();
				break;
			case 14:
				return $this->getPercontac();
				break;
			case 15:
				return $this->getHoraret();
				break;
			case 16:
				return $this->getPeriodico();
				break;
			case 17:
				return $this->getFecpub();
				break;
			case 18:
				return $this->getPagina();
				break;
			case 19:
				return $this->getCuerpo();
				break;
			case 20:
				return $this->getMes();
				break;
			case 21:
				return $this->getCodpaiefec();
				break;
			case 22:
				return $this->getCodpairecep();
				break;
			case 23:
				return $this->getCodfin();
				break;
			case 24:
				return $this->getFecofer();
				break;
			case 25:
				return $this->getHoraofer();
				break;
			case 26:
				return $this->getDirofer();
				break;
			case 27:
				return $this->getPercontacofer();
				break;
			case 28:
				return $this->getCodclacomp();
				break;
			case 29:
				return $this->getObservaciones();
				break;
			case 30:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcreglicPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodlic(),
			$keys[1] => $this->getCodtiplic(),
			$keys[2] => $this->getDeslic(),
			$keys[3] => $this->getSitact(),
			$keys[4] => $this->getEnte(),
			$keys[5] => $this->getFecreg(),
			$keys[6] => $this->getFecedi(),
			$keys[7] => $this->getCodobr(),
			$keys[8] => $this->getFecdisdes(),
			$keys[9] => $this->getFecdishas(),
			$keys[10] => $this->getCosto(),
			$keys[11] => $this->getForpag(),
			$keys[12] => $this->getDecretos(),
			$keys[13] => $this->getDirret(),
			$keys[14] => $this->getPercontac(),
			$keys[15] => $this->getHoraret(),
			$keys[16] => $this->getPeriodico(),
			$keys[17] => $this->getFecpub(),
			$keys[18] => $this->getPagina(),
			$keys[19] => $this->getCuerpo(),
			$keys[20] => $this->getMes(),
			$keys[21] => $this->getCodpaiefec(),
			$keys[22] => $this->getCodpairecep(),
			$keys[23] => $this->getCodfin(),
			$keys[24] => $this->getFecofer(),
			$keys[25] => $this->getHoraofer(),
			$keys[26] => $this->getDirofer(),
			$keys[27] => $this->getPercontacofer(),
			$keys[28] => $this->getCodclacomp(),
			$keys[29] => $this->getObservaciones(),
			$keys[30] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcreglicPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodlic($value);
				break;
			case 1:
				$this->setCodtiplic($value);
				break;
			case 2:
				$this->setDeslic($value);
				break;
			case 3:
				$this->setSitact($value);
				break;
			case 4:
				$this->setEnte($value);
				break;
			case 5:
				$this->setFecreg($value);
				break;
			case 6:
				$this->setFecedi($value);
				break;
			case 7:
				$this->setCodobr($value);
				break;
			case 8:
				$this->setFecdisdes($value);
				break;
			case 9:
				$this->setFecdishas($value);
				break;
			case 10:
				$this->setCosto($value);
				break;
			case 11:
				$this->setForpag($value);
				break;
			case 12:
				$this->setDecretos($value);
				break;
			case 13:
				$this->setDirret($value);
				break;
			case 14:
				$this->setPercontac($value);
				break;
			case 15:
				$this->setHoraret($value);
				break;
			case 16:
				$this->setPeriodico($value);
				break;
			case 17:
				$this->setFecpub($value);
				break;
			case 18:
				$this->setPagina($value);
				break;
			case 19:
				$this->setCuerpo($value);
				break;
			case 20:
				$this->setMes($value);
				break;
			case 21:
				$this->setCodpaiefec($value);
				break;
			case 22:
				$this->setCodpairecep($value);
				break;
			case 23:
				$this->setCodfin($value);
				break;
			case 24:
				$this->setFecofer($value);
				break;
			case 25:
				$this->setHoraofer($value);
				break;
			case 26:
				$this->setDirofer($value);
				break;
			case 27:
				$this->setPercontacofer($value);
				break;
			case 28:
				$this->setCodclacomp($value);
				break;
			case 29:
				$this->setObservaciones($value);
				break;
			case 30:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcreglicPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodlic($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodtiplic($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDeslic($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSitact($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEnte($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecreg($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecedi($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodobr($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecdisdes($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecdishas($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCosto($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setForpag($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDecretos($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setDirret($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setPercontac($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setHoraret($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setPeriodico($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setFecpub($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setPagina($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCuerpo($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setMes($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setCodpaiefec($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setCodpairecep($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setCodfin($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setFecofer($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setHoraofer($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setDirofer($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setPercontacofer($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setCodclacomp($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setObservaciones($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setId($arr[$keys[30]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcreglicPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcreglicPeer::CODLIC)) $criteria->add(OcreglicPeer::CODLIC, $this->codlic);
		if ($this->isColumnModified(OcreglicPeer::CODTIPLIC)) $criteria->add(OcreglicPeer::CODTIPLIC, $this->codtiplic);
		if ($this->isColumnModified(OcreglicPeer::DESLIC)) $criteria->add(OcreglicPeer::DESLIC, $this->deslic);
		if ($this->isColumnModified(OcreglicPeer::SITACT)) $criteria->add(OcreglicPeer::SITACT, $this->sitact);
		if ($this->isColumnModified(OcreglicPeer::ENTE)) $criteria->add(OcreglicPeer::ENTE, $this->ente);
		if ($this->isColumnModified(OcreglicPeer::FECREG)) $criteria->add(OcreglicPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(OcreglicPeer::FECEDI)) $criteria->add(OcreglicPeer::FECEDI, $this->fecedi);
		if ($this->isColumnModified(OcreglicPeer::CODOBR)) $criteria->add(OcreglicPeer::CODOBR, $this->codobr);
		if ($this->isColumnModified(OcreglicPeer::FECDISDES)) $criteria->add(OcreglicPeer::FECDISDES, $this->fecdisdes);
		if ($this->isColumnModified(OcreglicPeer::FECDISHAS)) $criteria->add(OcreglicPeer::FECDISHAS, $this->fecdishas);
		if ($this->isColumnModified(OcreglicPeer::COSTO)) $criteria->add(OcreglicPeer::COSTO, $this->costo);
		if ($this->isColumnModified(OcreglicPeer::FORPAG)) $criteria->add(OcreglicPeer::FORPAG, $this->forpag);
		if ($this->isColumnModified(OcreglicPeer::DECRETOS)) $criteria->add(OcreglicPeer::DECRETOS, $this->decretos);
		if ($this->isColumnModified(OcreglicPeer::DIRRET)) $criteria->add(OcreglicPeer::DIRRET, $this->dirret);
		if ($this->isColumnModified(OcreglicPeer::PERCONTAC)) $criteria->add(OcreglicPeer::PERCONTAC, $this->percontac);
		if ($this->isColumnModified(OcreglicPeer::HORARET)) $criteria->add(OcreglicPeer::HORARET, $this->horaret);
		if ($this->isColumnModified(OcreglicPeer::PERIODICO)) $criteria->add(OcreglicPeer::PERIODICO, $this->periodico);
		if ($this->isColumnModified(OcreglicPeer::FECPUB)) $criteria->add(OcreglicPeer::FECPUB, $this->fecpub);
		if ($this->isColumnModified(OcreglicPeer::PAGINA)) $criteria->add(OcreglicPeer::PAGINA, $this->pagina);
		if ($this->isColumnModified(OcreglicPeer::CUERPO)) $criteria->add(OcreglicPeer::CUERPO, $this->cuerpo);
		if ($this->isColumnModified(OcreglicPeer::MES)) $criteria->add(OcreglicPeer::MES, $this->mes);
		if ($this->isColumnModified(OcreglicPeer::CODPAIEFEC)) $criteria->add(OcreglicPeer::CODPAIEFEC, $this->codpaiefec);
		if ($this->isColumnModified(OcreglicPeer::CODPAIRECEP)) $criteria->add(OcreglicPeer::CODPAIRECEP, $this->codpairecep);
		if ($this->isColumnModified(OcreglicPeer::CODFIN)) $criteria->add(OcreglicPeer::CODFIN, $this->codfin);
		if ($this->isColumnModified(OcreglicPeer::FECOFER)) $criteria->add(OcreglicPeer::FECOFER, $this->fecofer);
		if ($this->isColumnModified(OcreglicPeer::HORAOFER)) $criteria->add(OcreglicPeer::HORAOFER, $this->horaofer);
		if ($this->isColumnModified(OcreglicPeer::DIROFER)) $criteria->add(OcreglicPeer::DIROFER, $this->dirofer);
		if ($this->isColumnModified(OcreglicPeer::PERCONTACOFER)) $criteria->add(OcreglicPeer::PERCONTACOFER, $this->percontacofer);
		if ($this->isColumnModified(OcreglicPeer::CODCLACOMP)) $criteria->add(OcreglicPeer::CODCLACOMP, $this->codclacomp);
		if ($this->isColumnModified(OcreglicPeer::OBSERVACIONES)) $criteria->add(OcreglicPeer::OBSERVACIONES, $this->observaciones);
		if ($this->isColumnModified(OcreglicPeer::ID)) $criteria->add(OcreglicPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcreglicPeer::DATABASE_NAME);

		$criteria->add(OcreglicPeer::ID, $this->id);

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

		$copyObj->setCodlic($this->codlic);

		$copyObj->setCodtiplic($this->codtiplic);

		$copyObj->setDeslic($this->deslic);

		$copyObj->setSitact($this->sitact);

		$copyObj->setEnte($this->ente);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setFecedi($this->fecedi);

		$copyObj->setCodobr($this->codobr);

		$copyObj->setFecdisdes($this->fecdisdes);

		$copyObj->setFecdishas($this->fecdishas);

		$copyObj->setCosto($this->costo);

		$copyObj->setForpag($this->forpag);

		$copyObj->setDecretos($this->decretos);

		$copyObj->setDirret($this->dirret);

		$copyObj->setPercontac($this->percontac);

		$copyObj->setHoraret($this->horaret);

		$copyObj->setPeriodico($this->periodico);

		$copyObj->setFecpub($this->fecpub);

		$copyObj->setPagina($this->pagina);

		$copyObj->setCuerpo($this->cuerpo);

		$copyObj->setMes($this->mes);

		$copyObj->setCodpaiefec($this->codpaiefec);

		$copyObj->setCodpairecep($this->codpairecep);

		$copyObj->setCodfin($this->codfin);

		$copyObj->setFecofer($this->fecofer);

		$copyObj->setHoraofer($this->horaofer);

		$copyObj->setDirofer($this->dirofer);

		$copyObj->setPercontacofer($this->percontacofer);

		$copyObj->setCodclacomp($this->codclacomp);

		$copyObj->setObservaciones($this->observaciones);


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
			self::$peer = new OcreglicPeer();
		}
		return self::$peer;
	}

} 