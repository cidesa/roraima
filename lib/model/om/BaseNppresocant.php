<?php


abstract class BaseNppresocant extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $feccor;


	
	protected $feccal;


	
	protected $codcon;


	
	protected $diaser;


	
	protected $messer;


	
	protected $anoser;


	
	protected $diatra;


	
	protected $mestra;


	
	protected $anotra;


	
	protected $antacu;


	
	protected $intacu;


	
	protected $bontra;


	
	protected $adepre;


	
	protected $adeint;


	
	protected $monpre;


	
	protected $pasregant;


	
	protected $stapre;


	
	protected $regpre;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getFeccor($format = 'Y-m-d')
  {

    if ($this->feccor === null || $this->feccor === '') {
      return null;
    } elseif (!is_int($this->feccor)) {
            $ts = adodb_strtotime($this->feccor);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccor] as date/time value: " . var_export($this->feccor, true));
      }
    } else {
      $ts = $this->feccor;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFeccal($format = 'Y-m-d')
  {

    if ($this->feccal === null || $this->feccal === '') {
      return null;
    } elseif (!is_int($this->feccal)) {
            $ts = adodb_strtotime($this->feccal);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccal] as date/time value: " . var_export($this->feccal, true));
      }
    } else {
      $ts = $this->feccal;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
  
  public function getDiaser($val=false)
  {

    if($val) return number_format($this->diaser,2,',','.');
    else return $this->diaser;

  }
  
  public function getMesser($val=false)
  {

    if($val) return number_format($this->messer,2,',','.');
    else return $this->messer;

  }
  
  public function getAnoser($val=false)
  {

    if($val) return number_format($this->anoser,2,',','.');
    else return $this->anoser;

  }
  
  public function getDiatra($val=false)
  {

    if($val) return number_format($this->diatra,2,',','.');
    else return $this->diatra;

  }
  
  public function getMestra($val=false)
  {

    if($val) return number_format($this->mestra,2,',','.');
    else return $this->mestra;

  }
  
  public function getAnotra($val=false)
  {

    if($val) return number_format($this->anotra,2,',','.');
    else return $this->anotra;

  }
  
  public function getAntacu($val=false)
  {

    if($val) return number_format($this->antacu,2,',','.');
    else return $this->antacu;

  }
  
  public function getIntacu($val=false)
  {

    if($val) return number_format($this->intacu,2,',','.');
    else return $this->intacu;

  }
  
  public function getBontra($val=false)
  {

    if($val) return number_format($this->bontra,2,',','.');
    else return $this->bontra;

  }
  
  public function getAdepre($val=false)
  {

    if($val) return number_format($this->adepre,2,',','.');
    else return $this->adepre;

  }
  
  public function getAdeint($val=false)
  {

    if($val) return number_format($this->adeint,2,',','.');
    else return $this->adeint;

  }
  
  public function getMonpre($val=false)
  {

    if($val) return number_format($this->monpre,2,',','.');
    else return $this->monpre;

  }
  
  public function getPasregant($val=false)
  {

    if($val) return number_format($this->pasregant,2,',','.');
    else return $this->pasregant;

  }
  
  public function getStapre()
  {

    return trim($this->stapre);

  }
  
  public function getRegpre()
  {

    return trim($this->regpre);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NppresocantPeer::CODEMP;
      }
  
	} 
	
	public function setFeccor($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccor] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccor !== $ts) {
      $this->feccor = $ts;
      $this->modifiedColumns[] = NppresocantPeer::FECCOR;
    }

	} 
	
	public function setFeccal($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccal] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccal !== $ts) {
      $this->feccal = $ts;
      $this->modifiedColumns[] = NppresocantPeer::FECCAL;
    }

	} 
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = NppresocantPeer::CODCON;
      }
  
	} 
	
	public function setDiaser($v)
	{

    if ($this->diaser !== $v) {
        $this->diaser = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NppresocantPeer::DIASER;
      }
  
	} 
	
	public function setMesser($v)
	{

    if ($this->messer !== $v) {
        $this->messer = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NppresocantPeer::MESSER;
      }
  
	} 
	
	public function setAnoser($v)
	{

    if ($this->anoser !== $v) {
        $this->anoser = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NppresocantPeer::ANOSER;
      }
  
	} 
	
	public function setDiatra($v)
	{

    if ($this->diatra !== $v) {
        $this->diatra = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NppresocantPeer::DIATRA;
      }
  
	} 
	
	public function setMestra($v)
	{

    if ($this->mestra !== $v) {
        $this->mestra = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NppresocantPeer::MESTRA;
      }
  
	} 
	
	public function setAnotra($v)
	{

    if ($this->anotra !== $v) {
        $this->anotra = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NppresocantPeer::ANOTRA;
      }
  
	} 
	
	public function setAntacu($v)
	{

    if ($this->antacu !== $v) {
        $this->antacu = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NppresocantPeer::ANTACU;
      }
  
	} 
	
	public function setIntacu($v)
	{

    if ($this->intacu !== $v) {
        $this->intacu = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NppresocantPeer::INTACU;
      }
  
	} 
	
	public function setBontra($v)
	{

    if ($this->bontra !== $v) {
        $this->bontra = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NppresocantPeer::BONTRA;
      }
  
	} 
	
	public function setAdepre($v)
	{

    if ($this->adepre !== $v) {
        $this->adepre = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NppresocantPeer::ADEPRE;
      }
  
	} 
	
	public function setAdeint($v)
	{

    if ($this->adeint !== $v) {
        $this->adeint = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NppresocantPeer::ADEINT;
      }
  
	} 
	
	public function setMonpre($v)
	{

    if ($this->monpre !== $v) {
        $this->monpre = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NppresocantPeer::MONPRE;
      }
  
	} 
	
	public function setPasregant($v)
	{

    if ($this->pasregant !== $v) {
        $this->pasregant = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NppresocantPeer::PASREGANT;
      }
  
	} 
	
	public function setStapre($v)
	{

    if ($this->stapre !== $v) {
        $this->stapre = $v;
        $this->modifiedColumns[] = NppresocantPeer::STAPRE;
      }
  
	} 
	
	public function setRegpre($v)
	{

    if ($this->regpre !== $v) {
        $this->regpre = $v;
        $this->modifiedColumns[] = NppresocantPeer::REGPRE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NppresocantPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->feccor = $rs->getDate($startcol + 1, null);

      $this->feccal = $rs->getDate($startcol + 2, null);

      $this->codcon = $rs->getString($startcol + 3);

      $this->diaser = $rs->getFloat($startcol + 4);

      $this->messer = $rs->getFloat($startcol + 5);

      $this->anoser = $rs->getFloat($startcol + 6);

      $this->diatra = $rs->getFloat($startcol + 7);

      $this->mestra = $rs->getFloat($startcol + 8);

      $this->anotra = $rs->getFloat($startcol + 9);

      $this->antacu = $rs->getFloat($startcol + 10);

      $this->intacu = $rs->getFloat($startcol + 11);

      $this->bontra = $rs->getFloat($startcol + 12);

      $this->adepre = $rs->getFloat($startcol + 13);

      $this->adeint = $rs->getFloat($startcol + 14);

      $this->monpre = $rs->getFloat($startcol + 15);

      $this->pasregant = $rs->getFloat($startcol + 16);

      $this->stapre = $rs->getString($startcol + 17);

      $this->regpre = $rs->getString($startcol + 18);

      $this->id = $rs->getInt($startcol + 19);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 20; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Nppresocant object", $e);
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
			$con = Propel::getConnection(NppresocantPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NppresocantPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NppresocantPeer::DATABASE_NAME);
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
					$pk = NppresocantPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NppresocantPeer::doUpdate($this, $con);
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


			if (($retval = NppresocantPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NppresocantPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getFeccor();
				break;
			case 2:
				return $this->getFeccal();
				break;
			case 3:
				return $this->getCodcon();
				break;
			case 4:
				return $this->getDiaser();
				break;
			case 5:
				return $this->getMesser();
				break;
			case 6:
				return $this->getAnoser();
				break;
			case 7:
				return $this->getDiatra();
				break;
			case 8:
				return $this->getMestra();
				break;
			case 9:
				return $this->getAnotra();
				break;
			case 10:
				return $this->getAntacu();
				break;
			case 11:
				return $this->getIntacu();
				break;
			case 12:
				return $this->getBontra();
				break;
			case 13:
				return $this->getAdepre();
				break;
			case 14:
				return $this->getAdeint();
				break;
			case 15:
				return $this->getMonpre();
				break;
			case 16:
				return $this->getPasregant();
				break;
			case 17:
				return $this->getStapre();
				break;
			case 18:
				return $this->getRegpre();
				break;
			case 19:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NppresocantPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getFeccor(),
			$keys[2] => $this->getFeccal(),
			$keys[3] => $this->getCodcon(),
			$keys[4] => $this->getDiaser(),
			$keys[5] => $this->getMesser(),
			$keys[6] => $this->getAnoser(),
			$keys[7] => $this->getDiatra(),
			$keys[8] => $this->getMestra(),
			$keys[9] => $this->getAnotra(),
			$keys[10] => $this->getAntacu(),
			$keys[11] => $this->getIntacu(),
			$keys[12] => $this->getBontra(),
			$keys[13] => $this->getAdepre(),
			$keys[14] => $this->getAdeint(),
			$keys[15] => $this->getMonpre(),
			$keys[16] => $this->getPasregant(),
			$keys[17] => $this->getStapre(),
			$keys[18] => $this->getRegpre(),
			$keys[19] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NppresocantPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setFeccor($value);
				break;
			case 2:
				$this->setFeccal($value);
				break;
			case 3:
				$this->setCodcon($value);
				break;
			case 4:
				$this->setDiaser($value);
				break;
			case 5:
				$this->setMesser($value);
				break;
			case 6:
				$this->setAnoser($value);
				break;
			case 7:
				$this->setDiatra($value);
				break;
			case 8:
				$this->setMestra($value);
				break;
			case 9:
				$this->setAnotra($value);
				break;
			case 10:
				$this->setAntacu($value);
				break;
			case 11:
				$this->setIntacu($value);
				break;
			case 12:
				$this->setBontra($value);
				break;
			case 13:
				$this->setAdepre($value);
				break;
			case 14:
				$this->setAdeint($value);
				break;
			case 15:
				$this->setMonpre($value);
				break;
			case 16:
				$this->setPasregant($value);
				break;
			case 17:
				$this->setStapre($value);
				break;
			case 18:
				$this->setRegpre($value);
				break;
			case 19:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NppresocantPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFeccor($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFeccal($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodcon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDiaser($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMesser($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAnoser($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDiatra($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMestra($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setAnotra($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setAntacu($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setIntacu($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setBontra($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setAdepre($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setAdeint($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setMonpre($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setPasregant($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setStapre($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setRegpre($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setId($arr[$keys[19]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NppresocantPeer::DATABASE_NAME);

		if ($this->isColumnModified(NppresocantPeer::CODEMP)) $criteria->add(NppresocantPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NppresocantPeer::FECCOR)) $criteria->add(NppresocantPeer::FECCOR, $this->feccor);
		if ($this->isColumnModified(NppresocantPeer::FECCAL)) $criteria->add(NppresocantPeer::FECCAL, $this->feccal);
		if ($this->isColumnModified(NppresocantPeer::CODCON)) $criteria->add(NppresocantPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NppresocantPeer::DIASER)) $criteria->add(NppresocantPeer::DIASER, $this->diaser);
		if ($this->isColumnModified(NppresocantPeer::MESSER)) $criteria->add(NppresocantPeer::MESSER, $this->messer);
		if ($this->isColumnModified(NppresocantPeer::ANOSER)) $criteria->add(NppresocantPeer::ANOSER, $this->anoser);
		if ($this->isColumnModified(NppresocantPeer::DIATRA)) $criteria->add(NppresocantPeer::DIATRA, $this->diatra);
		if ($this->isColumnModified(NppresocantPeer::MESTRA)) $criteria->add(NppresocantPeer::MESTRA, $this->mestra);
		if ($this->isColumnModified(NppresocantPeer::ANOTRA)) $criteria->add(NppresocantPeer::ANOTRA, $this->anotra);
		if ($this->isColumnModified(NppresocantPeer::ANTACU)) $criteria->add(NppresocantPeer::ANTACU, $this->antacu);
		if ($this->isColumnModified(NppresocantPeer::INTACU)) $criteria->add(NppresocantPeer::INTACU, $this->intacu);
		if ($this->isColumnModified(NppresocantPeer::BONTRA)) $criteria->add(NppresocantPeer::BONTRA, $this->bontra);
		if ($this->isColumnModified(NppresocantPeer::ADEPRE)) $criteria->add(NppresocantPeer::ADEPRE, $this->adepre);
		if ($this->isColumnModified(NppresocantPeer::ADEINT)) $criteria->add(NppresocantPeer::ADEINT, $this->adeint);
		if ($this->isColumnModified(NppresocantPeer::MONPRE)) $criteria->add(NppresocantPeer::MONPRE, $this->monpre);
		if ($this->isColumnModified(NppresocantPeer::PASREGANT)) $criteria->add(NppresocantPeer::PASREGANT, $this->pasregant);
		if ($this->isColumnModified(NppresocantPeer::STAPRE)) $criteria->add(NppresocantPeer::STAPRE, $this->stapre);
		if ($this->isColumnModified(NppresocantPeer::REGPRE)) $criteria->add(NppresocantPeer::REGPRE, $this->regpre);
		if ($this->isColumnModified(NppresocantPeer::ID)) $criteria->add(NppresocantPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NppresocantPeer::DATABASE_NAME);

		$criteria->add(NppresocantPeer::ID, $this->id);

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

		$copyObj->setFeccor($this->feccor);

		$copyObj->setFeccal($this->feccal);

		$copyObj->setCodcon($this->codcon);

		$copyObj->setDiaser($this->diaser);

		$copyObj->setMesser($this->messer);

		$copyObj->setAnoser($this->anoser);

		$copyObj->setDiatra($this->diatra);

		$copyObj->setMestra($this->mestra);

		$copyObj->setAnotra($this->anotra);

		$copyObj->setAntacu($this->antacu);

		$copyObj->setIntacu($this->intacu);

		$copyObj->setBontra($this->bontra);

		$copyObj->setAdepre($this->adepre);

		$copyObj->setAdeint($this->adeint);

		$copyObj->setMonpre($this->monpre);

		$copyObj->setPasregant($this->pasregant);

		$copyObj->setStapre($this->stapre);

		$copyObj->setRegpre($this->regpre);


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
			self::$peer = new NppresocantPeer();
		}
		return self::$peer;
	}

} 