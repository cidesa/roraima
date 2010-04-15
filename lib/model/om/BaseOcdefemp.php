<?php


abstract class BaseOcdefemp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $nomemp;


	
	protected $diremp;


	
	protected $telemp;


	
	protected $faxemp;


	
	protected $emaemp;


	
	protected $porant;


	
	protected $plaini;


	
	protected $poraumobr;


	
	protected $pormul;


	
	protected $unitri;


	
	protected $codactproini;


	
	protected $codactini;


	
	protected $codactpar;


	
	protected $codactrei;


	
	protected $codactproter;


	
	protected $codactter;


	
	protected $codactrecpro;


	
	protected $codactrecdef;


	
	protected $codingres;


	
	protected $codconobr;


	
	protected $codconins;


	
	protected $codconsup;


	
	protected $codconpro;


	
	protected $codvalant;


	
	protected $codvalpar;


	
	protected $codvalfin;


	
	protected $codvalret;


	
	protected $codvalrec;


	
	protected $codparrec;


	
	protected $ivaant;


	
	protected $retant;


	
	protected $gencom;


	
	protected $tipcom;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getNomemp()
  {

    return trim($this->nomemp);

  }
  
  public function getDiremp()
  {

    return trim($this->diremp);

  }
  
  public function getTelemp()
  {

    return trim($this->telemp);

  }
  
  public function getFaxemp()
  {

    return trim($this->faxemp);

  }
  
  public function getEmaemp()
  {

    return trim($this->emaemp);

  }
  
  public function getPorant($val=false)
  {

    if($val) return number_format($this->porant,2,',','.');
    else return $this->porant;

  }
  
  public function getPlaini($val=false)
  {

    if($val) return number_format($this->plaini,2,',','.');
    else return $this->plaini;

  }
  
  public function getPoraumobr($val=false)
  {

    if($val) return number_format($this->poraumobr,2,',','.');
    else return $this->poraumobr;

  }
  
  public function getPormul($val=false)
  {

    if($val) return number_format($this->pormul,2,',','.');
    else return $this->pormul;

  }
  
  public function getUnitri($val=false)
  {

    if($val) return number_format($this->unitri,2,',','.');
    else return $this->unitri;

  }
  
  public function getCodactproini()
  {

    return trim($this->codactproini);

  }
  
  public function getCodactini()
  {

    return trim($this->codactini);

  }
  
  public function getCodactpar()
  {

    return trim($this->codactpar);

  }
  
  public function getCodactrei()
  {

    return trim($this->codactrei);

  }
  
  public function getCodactproter()
  {

    return trim($this->codactproter);

  }
  
  public function getCodactter()
  {

    return trim($this->codactter);

  }
  
  public function getCodactrecpro()
  {

    return trim($this->codactrecpro);

  }
  
  public function getCodactrecdef()
  {

    return trim($this->codactrecdef);

  }
  
  public function getCodingres()
  {

    return trim($this->codingres);

  }
  
  public function getCodconobr()
  {

    return trim($this->codconobr);

  }
  
  public function getCodconins()
  {

    return trim($this->codconins);

  }
  
  public function getCodconsup()
  {

    return trim($this->codconsup);

  }
  
  public function getCodconpro()
  {

    return trim($this->codconpro);

  }
  
  public function getCodvalant()
  {

    return trim($this->codvalant);

  }
  
  public function getCodvalpar()
  {

    return trim($this->codvalpar);

  }
  
  public function getCodvalfin()
  {

    return trim($this->codvalfin);

  }
  
  public function getCodvalret()
  {

    return trim($this->codvalret);

  }
  
  public function getCodvalrec()
  {

    return trim($this->codvalrec);

  }
  
  public function getCodparrec()
  {

    return trim($this->codparrec);

  }
  
  public function getIvaant()
  {

    return trim($this->ivaant);

  }
  
  public function getRetant()
  {

    return trim($this->retant);

  }
  
  public function getGencom()
  {

    return trim($this->gencom);

  }
  
  public function getTipcom()
  {

    return trim($this->tipcom);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = OcdefempPeer::CODEMP;
      }
  
	} 
	
	public function setNomemp($v)
	{

    if ($this->nomemp !== $v) {
        $this->nomemp = $v;
        $this->modifiedColumns[] = OcdefempPeer::NOMEMP;
      }
  
	} 
	
	public function setDiremp($v)
	{

    if ($this->diremp !== $v) {
        $this->diremp = $v;
        $this->modifiedColumns[] = OcdefempPeer::DIREMP;
      }
  
	} 
	
	public function setTelemp($v)
	{

    if ($this->telemp !== $v) {
        $this->telemp = $v;
        $this->modifiedColumns[] = OcdefempPeer::TELEMP;
      }
  
	} 
	
	public function setFaxemp($v)
	{

    if ($this->faxemp !== $v) {
        $this->faxemp = $v;
        $this->modifiedColumns[] = OcdefempPeer::FAXEMP;
      }
  
	} 
	
	public function setEmaemp($v)
	{

    if ($this->emaemp !== $v) {
        $this->emaemp = $v;
        $this->modifiedColumns[] = OcdefempPeer::EMAEMP;
      }
  
	} 
	
	public function setPorant($v)
	{

    if ($this->porant !== $v) {
        $this->porant = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OcdefempPeer::PORANT;
      }
  
	} 
	
	public function setPlaini($v)
	{

    if ($this->plaini !== $v) {
        $this->plaini = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OcdefempPeer::PLAINI;
      }
  
	} 
	
	public function setPoraumobr($v)
	{

    if ($this->poraumobr !== $v) {
        $this->poraumobr = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OcdefempPeer::PORAUMOBR;
      }
  
	} 
	
	public function setPormul($v)
	{

    if ($this->pormul !== $v) {
        $this->pormul = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OcdefempPeer::PORMUL;
      }
  
	} 
	
	public function setUnitri($v)
	{

    if ($this->unitri !== $v) {
        $this->unitri = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OcdefempPeer::UNITRI;
      }
  
	} 
	
	public function setCodactproini($v)
	{

    if ($this->codactproini !== $v) {
        $this->codactproini = $v;
        $this->modifiedColumns[] = OcdefempPeer::CODACTPROINI;
      }
  
	} 
	
	public function setCodactini($v)
	{

    if ($this->codactini !== $v) {
        $this->codactini = $v;
        $this->modifiedColumns[] = OcdefempPeer::CODACTINI;
      }
  
	} 
	
	public function setCodactpar($v)
	{

    if ($this->codactpar !== $v) {
        $this->codactpar = $v;
        $this->modifiedColumns[] = OcdefempPeer::CODACTPAR;
      }
  
	} 
	
	public function setCodactrei($v)
	{

    if ($this->codactrei !== $v) {
        $this->codactrei = $v;
        $this->modifiedColumns[] = OcdefempPeer::CODACTREI;
      }
  
	} 
	
	public function setCodactproter($v)
	{

    if ($this->codactproter !== $v) {
        $this->codactproter = $v;
        $this->modifiedColumns[] = OcdefempPeer::CODACTPROTER;
      }
  
	} 
	
	public function setCodactter($v)
	{

    if ($this->codactter !== $v) {
        $this->codactter = $v;
        $this->modifiedColumns[] = OcdefempPeer::CODACTTER;
      }
  
	} 
	
	public function setCodactrecpro($v)
	{

    if ($this->codactrecpro !== $v) {
        $this->codactrecpro = $v;
        $this->modifiedColumns[] = OcdefempPeer::CODACTRECPRO;
      }
  
	} 
	
	public function setCodactrecdef($v)
	{

    if ($this->codactrecdef !== $v) {
        $this->codactrecdef = $v;
        $this->modifiedColumns[] = OcdefempPeer::CODACTRECDEF;
      }
  
	} 
	
	public function setCodingres($v)
	{

    if ($this->codingres !== $v) {
        $this->codingres = $v;
        $this->modifiedColumns[] = OcdefempPeer::CODINGRES;
      }
  
	} 
	
	public function setCodconobr($v)
	{

    if ($this->codconobr !== $v) {
        $this->codconobr = $v;
        $this->modifiedColumns[] = OcdefempPeer::CODCONOBR;
      }
  
	} 
	
	public function setCodconins($v)
	{

    if ($this->codconins !== $v) {
        $this->codconins = $v;
        $this->modifiedColumns[] = OcdefempPeer::CODCONINS;
      }
  
	} 
	
	public function setCodconsup($v)
	{

    if ($this->codconsup !== $v) {
        $this->codconsup = $v;
        $this->modifiedColumns[] = OcdefempPeer::CODCONSUP;
      }
  
	} 
	
	public function setCodconpro($v)
	{

    if ($this->codconpro !== $v) {
        $this->codconpro = $v;
        $this->modifiedColumns[] = OcdefempPeer::CODCONPRO;
      }
  
	} 
	
	public function setCodvalant($v)
	{

    if ($this->codvalant !== $v) {
        $this->codvalant = $v;
        $this->modifiedColumns[] = OcdefempPeer::CODVALANT;
      }
  
	} 
	
	public function setCodvalpar($v)
	{

    if ($this->codvalpar !== $v) {
        $this->codvalpar = $v;
        $this->modifiedColumns[] = OcdefempPeer::CODVALPAR;
      }
  
	} 
	
	public function setCodvalfin($v)
	{

    if ($this->codvalfin !== $v) {
        $this->codvalfin = $v;
        $this->modifiedColumns[] = OcdefempPeer::CODVALFIN;
      }
  
	} 
	
	public function setCodvalret($v)
	{

    if ($this->codvalret !== $v) {
        $this->codvalret = $v;
        $this->modifiedColumns[] = OcdefempPeer::CODVALRET;
      }
  
	} 
	
	public function setCodvalrec($v)
	{

    if ($this->codvalrec !== $v) {
        $this->codvalrec = $v;
        $this->modifiedColumns[] = OcdefempPeer::CODVALREC;
      }
  
	} 
	
	public function setCodparrec($v)
	{

    if ($this->codparrec !== $v) {
        $this->codparrec = $v;
        $this->modifiedColumns[] = OcdefempPeer::CODPARREC;
      }
  
	} 
	
	public function setIvaant($v)
	{

    if ($this->ivaant !== $v) {
        $this->ivaant = $v;
        $this->modifiedColumns[] = OcdefempPeer::IVAANT;
      }
  
	} 
	
	public function setRetant($v)
	{

    if ($this->retant !== $v) {
        $this->retant = $v;
        $this->modifiedColumns[] = OcdefempPeer::RETANT;
      }
  
	} 
	
	public function setGencom($v)
	{

    if ($this->gencom !== $v) {
        $this->gencom = $v;
        $this->modifiedColumns[] = OcdefempPeer::GENCOM;
      }
  
	} 
	
	public function setTipcom($v)
	{

    if ($this->tipcom !== $v) {
        $this->tipcom = $v;
        $this->modifiedColumns[] = OcdefempPeer::TIPCOM;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OcdefempPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->nomemp = $rs->getString($startcol + 1);

      $this->diremp = $rs->getString($startcol + 2);

      $this->telemp = $rs->getString($startcol + 3);

      $this->faxemp = $rs->getString($startcol + 4);

      $this->emaemp = $rs->getString($startcol + 5);

      $this->porant = $rs->getFloat($startcol + 6);

      $this->plaini = $rs->getFloat($startcol + 7);

      $this->poraumobr = $rs->getFloat($startcol + 8);

      $this->pormul = $rs->getFloat($startcol + 9);

      $this->unitri = $rs->getFloat($startcol + 10);

      $this->codactproini = $rs->getString($startcol + 11);

      $this->codactini = $rs->getString($startcol + 12);

      $this->codactpar = $rs->getString($startcol + 13);

      $this->codactrei = $rs->getString($startcol + 14);

      $this->codactproter = $rs->getString($startcol + 15);

      $this->codactter = $rs->getString($startcol + 16);

      $this->codactrecpro = $rs->getString($startcol + 17);

      $this->codactrecdef = $rs->getString($startcol + 18);

      $this->codingres = $rs->getString($startcol + 19);

      $this->codconobr = $rs->getString($startcol + 20);

      $this->codconins = $rs->getString($startcol + 21);

      $this->codconsup = $rs->getString($startcol + 22);

      $this->codconpro = $rs->getString($startcol + 23);

      $this->codvalant = $rs->getString($startcol + 24);

      $this->codvalpar = $rs->getString($startcol + 25);

      $this->codvalfin = $rs->getString($startcol + 26);

      $this->codvalret = $rs->getString($startcol + 27);

      $this->codvalrec = $rs->getString($startcol + 28);

      $this->codparrec = $rs->getString($startcol + 29);

      $this->ivaant = $rs->getString($startcol + 30);

      $this->retant = $rs->getString($startcol + 31);

      $this->gencom = $rs->getString($startcol + 32);

      $this->tipcom = $rs->getString($startcol + 33);

      $this->id = $rs->getInt($startcol + 34);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 35; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ocdefemp object", $e);
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
			$con = Propel::getConnection(OcdefempPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcdefempPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcdefempPeer::DATABASE_NAME);
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
					$pk = OcdefempPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OcdefempPeer::doUpdate($this, $con);
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


			if (($retval = OcdefempPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcdefempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getNomemp();
				break;
			case 2:
				return $this->getDiremp();
				break;
			case 3:
				return $this->getTelemp();
				break;
			case 4:
				return $this->getFaxemp();
				break;
			case 5:
				return $this->getEmaemp();
				break;
			case 6:
				return $this->getPorant();
				break;
			case 7:
				return $this->getPlaini();
				break;
			case 8:
				return $this->getPoraumobr();
				break;
			case 9:
				return $this->getPormul();
				break;
			case 10:
				return $this->getUnitri();
				break;
			case 11:
				return $this->getCodactproini();
				break;
			case 12:
				return $this->getCodactini();
				break;
			case 13:
				return $this->getCodactpar();
				break;
			case 14:
				return $this->getCodactrei();
				break;
			case 15:
				return $this->getCodactproter();
				break;
			case 16:
				return $this->getCodactter();
				break;
			case 17:
				return $this->getCodactrecpro();
				break;
			case 18:
				return $this->getCodactrecdef();
				break;
			case 19:
				return $this->getCodingres();
				break;
			case 20:
				return $this->getCodconobr();
				break;
			case 21:
				return $this->getCodconins();
				break;
			case 22:
				return $this->getCodconsup();
				break;
			case 23:
				return $this->getCodconpro();
				break;
			case 24:
				return $this->getCodvalant();
				break;
			case 25:
				return $this->getCodvalpar();
				break;
			case 26:
				return $this->getCodvalfin();
				break;
			case 27:
				return $this->getCodvalret();
				break;
			case 28:
				return $this->getCodvalrec();
				break;
			case 29:
				return $this->getCodparrec();
				break;
			case 30:
				return $this->getIvaant();
				break;
			case 31:
				return $this->getRetant();
				break;
			case 32:
				return $this->getGencom();
				break;
			case 33:
				return $this->getTipcom();
				break;
			case 34:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcdefempPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getNomemp(),
			$keys[2] => $this->getDiremp(),
			$keys[3] => $this->getTelemp(),
			$keys[4] => $this->getFaxemp(),
			$keys[5] => $this->getEmaemp(),
			$keys[6] => $this->getPorant(),
			$keys[7] => $this->getPlaini(),
			$keys[8] => $this->getPoraumobr(),
			$keys[9] => $this->getPormul(),
			$keys[10] => $this->getUnitri(),
			$keys[11] => $this->getCodactproini(),
			$keys[12] => $this->getCodactini(),
			$keys[13] => $this->getCodactpar(),
			$keys[14] => $this->getCodactrei(),
			$keys[15] => $this->getCodactproter(),
			$keys[16] => $this->getCodactter(),
			$keys[17] => $this->getCodactrecpro(),
			$keys[18] => $this->getCodactrecdef(),
			$keys[19] => $this->getCodingres(),
			$keys[20] => $this->getCodconobr(),
			$keys[21] => $this->getCodconins(),
			$keys[22] => $this->getCodconsup(),
			$keys[23] => $this->getCodconpro(),
			$keys[24] => $this->getCodvalant(),
			$keys[25] => $this->getCodvalpar(),
			$keys[26] => $this->getCodvalfin(),
			$keys[27] => $this->getCodvalret(),
			$keys[28] => $this->getCodvalrec(),
			$keys[29] => $this->getCodparrec(),
			$keys[30] => $this->getIvaant(),
			$keys[31] => $this->getRetant(),
			$keys[32] => $this->getGencom(),
			$keys[33] => $this->getTipcom(),
			$keys[34] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcdefempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setNomemp($value);
				break;
			case 2:
				$this->setDiremp($value);
				break;
			case 3:
				$this->setTelemp($value);
				break;
			case 4:
				$this->setFaxemp($value);
				break;
			case 5:
				$this->setEmaemp($value);
				break;
			case 6:
				$this->setPorant($value);
				break;
			case 7:
				$this->setPlaini($value);
				break;
			case 8:
				$this->setPoraumobr($value);
				break;
			case 9:
				$this->setPormul($value);
				break;
			case 10:
				$this->setUnitri($value);
				break;
			case 11:
				$this->setCodactproini($value);
				break;
			case 12:
				$this->setCodactini($value);
				break;
			case 13:
				$this->setCodactpar($value);
				break;
			case 14:
				$this->setCodactrei($value);
				break;
			case 15:
				$this->setCodactproter($value);
				break;
			case 16:
				$this->setCodactter($value);
				break;
			case 17:
				$this->setCodactrecpro($value);
				break;
			case 18:
				$this->setCodactrecdef($value);
				break;
			case 19:
				$this->setCodingres($value);
				break;
			case 20:
				$this->setCodconobr($value);
				break;
			case 21:
				$this->setCodconins($value);
				break;
			case 22:
				$this->setCodconsup($value);
				break;
			case 23:
				$this->setCodconpro($value);
				break;
			case 24:
				$this->setCodvalant($value);
				break;
			case 25:
				$this->setCodvalpar($value);
				break;
			case 26:
				$this->setCodvalfin($value);
				break;
			case 27:
				$this->setCodvalret($value);
				break;
			case 28:
				$this->setCodvalrec($value);
				break;
			case 29:
				$this->setCodparrec($value);
				break;
			case 30:
				$this->setIvaant($value);
				break;
			case 31:
				$this->setRetant($value);
				break;
			case 32:
				$this->setGencom($value);
				break;
			case 33:
				$this->setTipcom($value);
				break;
			case 34:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcdefempPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDiremp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTelemp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFaxemp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEmaemp($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPorant($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPlaini($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPoraumobr($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setPormul($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUnitri($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCodactproini($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCodactini($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCodactpar($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCodactrei($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCodactproter($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCodactter($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCodactrecpro($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCodactrecdef($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCodingres($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCodconobr($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setCodconins($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setCodconsup($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setCodconpro($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setCodvalant($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setCodvalpar($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setCodvalfin($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setCodvalret($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setCodvalrec($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setCodparrec($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setIvaant($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setRetant($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setGencom($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setTipcom($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setId($arr[$keys[34]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcdefempPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcdefempPeer::CODEMP)) $criteria->add(OcdefempPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(OcdefempPeer::NOMEMP)) $criteria->add(OcdefempPeer::NOMEMP, $this->nomemp);
		if ($this->isColumnModified(OcdefempPeer::DIREMP)) $criteria->add(OcdefempPeer::DIREMP, $this->diremp);
		if ($this->isColumnModified(OcdefempPeer::TELEMP)) $criteria->add(OcdefempPeer::TELEMP, $this->telemp);
		if ($this->isColumnModified(OcdefempPeer::FAXEMP)) $criteria->add(OcdefempPeer::FAXEMP, $this->faxemp);
		if ($this->isColumnModified(OcdefempPeer::EMAEMP)) $criteria->add(OcdefempPeer::EMAEMP, $this->emaemp);
		if ($this->isColumnModified(OcdefempPeer::PORANT)) $criteria->add(OcdefempPeer::PORANT, $this->porant);
		if ($this->isColumnModified(OcdefempPeer::PLAINI)) $criteria->add(OcdefempPeer::PLAINI, $this->plaini);
		if ($this->isColumnModified(OcdefempPeer::PORAUMOBR)) $criteria->add(OcdefempPeer::PORAUMOBR, $this->poraumobr);
		if ($this->isColumnModified(OcdefempPeer::PORMUL)) $criteria->add(OcdefempPeer::PORMUL, $this->pormul);
		if ($this->isColumnModified(OcdefempPeer::UNITRI)) $criteria->add(OcdefempPeer::UNITRI, $this->unitri);
		if ($this->isColumnModified(OcdefempPeer::CODACTPROINI)) $criteria->add(OcdefempPeer::CODACTPROINI, $this->codactproini);
		if ($this->isColumnModified(OcdefempPeer::CODACTINI)) $criteria->add(OcdefempPeer::CODACTINI, $this->codactini);
		if ($this->isColumnModified(OcdefempPeer::CODACTPAR)) $criteria->add(OcdefempPeer::CODACTPAR, $this->codactpar);
		if ($this->isColumnModified(OcdefempPeer::CODACTREI)) $criteria->add(OcdefempPeer::CODACTREI, $this->codactrei);
		if ($this->isColumnModified(OcdefempPeer::CODACTPROTER)) $criteria->add(OcdefempPeer::CODACTPROTER, $this->codactproter);
		if ($this->isColumnModified(OcdefempPeer::CODACTTER)) $criteria->add(OcdefempPeer::CODACTTER, $this->codactter);
		if ($this->isColumnModified(OcdefempPeer::CODACTRECPRO)) $criteria->add(OcdefempPeer::CODACTRECPRO, $this->codactrecpro);
		if ($this->isColumnModified(OcdefempPeer::CODACTRECDEF)) $criteria->add(OcdefempPeer::CODACTRECDEF, $this->codactrecdef);
		if ($this->isColumnModified(OcdefempPeer::CODINGRES)) $criteria->add(OcdefempPeer::CODINGRES, $this->codingres);
		if ($this->isColumnModified(OcdefempPeer::CODCONOBR)) $criteria->add(OcdefempPeer::CODCONOBR, $this->codconobr);
		if ($this->isColumnModified(OcdefempPeer::CODCONINS)) $criteria->add(OcdefempPeer::CODCONINS, $this->codconins);
		if ($this->isColumnModified(OcdefempPeer::CODCONSUP)) $criteria->add(OcdefempPeer::CODCONSUP, $this->codconsup);
		if ($this->isColumnModified(OcdefempPeer::CODCONPRO)) $criteria->add(OcdefempPeer::CODCONPRO, $this->codconpro);
		if ($this->isColumnModified(OcdefempPeer::CODVALANT)) $criteria->add(OcdefempPeer::CODVALANT, $this->codvalant);
		if ($this->isColumnModified(OcdefempPeer::CODVALPAR)) $criteria->add(OcdefempPeer::CODVALPAR, $this->codvalpar);
		if ($this->isColumnModified(OcdefempPeer::CODVALFIN)) $criteria->add(OcdefempPeer::CODVALFIN, $this->codvalfin);
		if ($this->isColumnModified(OcdefempPeer::CODVALRET)) $criteria->add(OcdefempPeer::CODVALRET, $this->codvalret);
		if ($this->isColumnModified(OcdefempPeer::CODVALREC)) $criteria->add(OcdefempPeer::CODVALREC, $this->codvalrec);
		if ($this->isColumnModified(OcdefempPeer::CODPARREC)) $criteria->add(OcdefempPeer::CODPARREC, $this->codparrec);
		if ($this->isColumnModified(OcdefempPeer::IVAANT)) $criteria->add(OcdefempPeer::IVAANT, $this->ivaant);
		if ($this->isColumnModified(OcdefempPeer::RETANT)) $criteria->add(OcdefempPeer::RETANT, $this->retant);
		if ($this->isColumnModified(OcdefempPeer::GENCOM)) $criteria->add(OcdefempPeer::GENCOM, $this->gencom);
		if ($this->isColumnModified(OcdefempPeer::TIPCOM)) $criteria->add(OcdefempPeer::TIPCOM, $this->tipcom);
		if ($this->isColumnModified(OcdefempPeer::ID)) $criteria->add(OcdefempPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcdefempPeer::DATABASE_NAME);

		$criteria->add(OcdefempPeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setNomemp($this->nomemp);

		$copyObj->setDiremp($this->diremp);

		$copyObj->setTelemp($this->telemp);

		$copyObj->setFaxemp($this->faxemp);

		$copyObj->setEmaemp($this->emaemp);

		$copyObj->setPorant($this->porant);

		$copyObj->setPlaini($this->plaini);

		$copyObj->setPoraumobr($this->poraumobr);

		$copyObj->setPormul($this->pormul);

		$copyObj->setUnitri($this->unitri);

		$copyObj->setCodactproini($this->codactproini);

		$copyObj->setCodactini($this->codactini);

		$copyObj->setCodactpar($this->codactpar);

		$copyObj->setCodactrei($this->codactrei);

		$copyObj->setCodactproter($this->codactproter);

		$copyObj->setCodactter($this->codactter);

		$copyObj->setCodactrecpro($this->codactrecpro);

		$copyObj->setCodactrecdef($this->codactrecdef);

		$copyObj->setCodingres($this->codingres);

		$copyObj->setCodconobr($this->codconobr);

		$copyObj->setCodconins($this->codconins);

		$copyObj->setCodconsup($this->codconsup);

		$copyObj->setCodconpro($this->codconpro);

		$copyObj->setCodvalant($this->codvalant);

		$copyObj->setCodvalpar($this->codvalpar);

		$copyObj->setCodvalfin($this->codvalfin);

		$copyObj->setCodvalret($this->codvalret);

		$copyObj->setCodvalrec($this->codvalrec);

		$copyObj->setCodparrec($this->codparrec);

		$copyObj->setIvaant($this->ivaant);

		$copyObj->setRetant($this->retant);

		$copyObj->setGencom($this->gencom);

		$copyObj->setTipcom($this->tipcom);


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
			self::$peer = new OcdefempPeer();
		}
		return self::$peer;
	}

} 