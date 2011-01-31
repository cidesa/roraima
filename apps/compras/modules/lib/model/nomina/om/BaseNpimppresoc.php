<?php


abstract class BaseNpimppresoc extends BaseObject  implements Persistent {



	protected static $peer;



	protected $codemp;



	protected $feccor;



	protected $fecini;



	protected $fecfin;



	protected $salemp;



	protected $salempdia;



	protected $aliuti;



	protected $alibono;



	protected $aliadi;



	protected $saltot;



	protected $diaart108;



	protected $capemp;



	protected $antacum;



	protected $valart108;



	protected $tasint;



	protected $diadif;



	protected $intdev;



	protected $intacum;



	protected $adeant;



	protected $adepre;



	protected $regpre;



	protected $saladi;



	protected $anoser;



	protected $tipo;



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


  public function getFecini($format = 'Y-m-d')
  {

    if ($this->fecini === null || $this->fecini === '') {
      return null;
    } elseif (!is_int($this->fecini)) {
            $ts = adodb_strtotime($this->fecini);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecini] as date/time value: " . var_export($this->fecini, true));
      }
    } else {
      $ts = $this->fecini;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }


  public function getFecfin($format = 'Y-m-d')
  {

    if ($this->fecfin === null || $this->fecfin === '') {
      return null;
    } elseif (!is_int($this->fecfin)) {
            $ts = adodb_strtotime($this->fecfin);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecfin] as date/time value: " . var_export($this->fecfin, true));
      }
    } else {
      $ts = $this->fecfin;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }


  public function getSalemp($val=false)
  {

    if($val) return number_format($this->salemp,2,',','.');
    else return $this->salemp;

  }

  public function getSalempdia($val=false)
  {

    if($val) return number_format($this->salempdia,2,',','.');
    else return $this->salempdia;

  }

  public function getAliuti($val=false)
  {

    if($val) return number_format($this->aliuti,2,',','.');
    else return $this->aliuti;

  }

  public function getAlibono($val=false)
  {

    if($val) return number_format($this->alibono,2,',','.');
    else return $this->alibono;

  }

  public function getAliadi($val=false)
  {

    if($val) return number_format($this->aliadi,2,',','.');
    else return $this->aliadi;

  }

  public function getSaltot($val=false)
  {

    if($val) return number_format($this->saltot,2,',','.');
    else return $this->saltot;

  }

  public function getDiaart108($val=false)
  {

    if($val) return number_format($this->diaart108,2,',','.');
    else return $this->diaart108;

  }

  public function getCapemp($val=false)
  {

    if($val) return number_format($this->capemp,2,',','.');
    else return $this->capemp;

  }

  public function getAntacum($val=false)
  {

    if($val) return number_format($this->antacum,2,',','.');
    else return $this->antacum;

  }

  public function getValart108($val=false)
  {

    if($val) return number_format($this->valart108,2,',','.');
    else return $this->valart108;

  }

  public function getTasint($val=false)
  {

    if($val) return number_format($this->tasint,2,',','.');
    else return $this->tasint;

  }

  public function getDiadif($val=false)
  {

    if($val) return number_format($this->diadif,2,',','.');
    else return $this->diadif;

  }

  public function getIntdev($val=false)
  {

    if($val) return number_format($this->intdev,2,',','.');
    else return $this->intdev;

  }

  public function getIntacum($val=false)
  {

    if($val) return number_format($this->intacum,2,',','.');
    else return $this->intacum;

  }

  public function getAdeant($val=false)
  {

    if($val) return number_format($this->adeant,2,',','.');
    else return $this->adeant;

  }

  public function getAdepre($val=false)
  {

    if($val) return number_format($this->adepre,2,',','.');
    else return $this->adepre;

  }

  public function getRegpre()
  {

    return trim($this->regpre);

  }

  public function getSaladi($val=false)
  {

    if($val) return number_format($this->saladi,2,',','.');
    else return $this->saladi;

  }

  public function getAnoser($val=false)
  {

    if($val) return number_format($this->anoser,2,',','.');
    else return $this->anoser;

  }

  public function getTipo()
  {

    return trim($this->tipo);

  }

  public function getId()
  {

    return $this->id;

  }

	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpimppresocPeer::CODEMP;
      }

	}

	public function setFeccor($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccor] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccor !== $ts) {
      $this->feccor = $ts;
      $this->modifiedColumns[] = NpimppresocPeer::FECCOR;
    }

	}

	public function setFecini($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecini] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecini !== $ts) {
      $this->fecini = $ts;
      $this->modifiedColumns[] = NpimppresocPeer::FECINI;
    }

	}

	public function setFecfin($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecfin] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecfin !== $ts) {
      $this->fecfin = $ts;
      $this->modifiedColumns[] = NpimppresocPeer::FECFIN;
    }

	}

	public function setSalemp($v)
	{

    if ($this->salemp !== $v) {
        $this->salemp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpimppresocPeer::SALEMP;
      }

	}

	public function setSalempdia($v)
	{

    if ($this->salempdia !== $v) {
        $this->salempdia = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpimppresocPeer::SALEMPDIA;
      }

	}

	public function setAliuti($v)
	{

    if ($this->aliuti !== $v) {
        $this->aliuti = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpimppresocPeer::ALIUTI;
      }

	}

	public function setAlibono($v)
	{

    if ($this->alibono !== $v) {
        $this->alibono = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpimppresocPeer::ALIBONO;
      }

	}

	public function setAliadi($v)
	{

    if ($this->aliadi !== $v) {
        $this->aliadi = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpimppresocPeer::ALIADI;
      }

	}

	public function setSaltot($v)
	{

    if ($this->saltot !== $v) {
        $this->saltot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpimppresocPeer::SALTOT;
      }

	}

	public function setDiaart108($v)
	{

    if ($this->diaart108 !== $v) {
        $this->diaart108 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpimppresocPeer::DIAART108;
      }

	}

	public function setCapemp($v)
	{

    if ($this->capemp !== $v) {
        $this->capemp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpimppresocPeer::CAPEMP;
      }

	}

	public function setAntacum($v)
	{

    if ($this->antacum !== $v) {
        $this->antacum = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpimppresocPeer::ANTACUM;
      }

	}

	public function setValart108($v)
	{

    if ($this->valart108 !== $v) {
        $this->valart108 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpimppresocPeer::VALART108;
      }

	}

	public function setTasint($v)
	{

    if ($this->tasint !== $v) {
        $this->tasint = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpimppresocPeer::TASINT;
      }

	}

	public function setDiadif($v)
	{

    if ($this->diadif !== $v) {
        $this->diadif = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpimppresocPeer::DIADIF;
      }

	}

	public function setIntdev($v)
	{

    if ($this->intdev !== $v) {
        $this->intdev = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpimppresocPeer::INTDEV;
      }

	}

	public function setIntacum($v)
	{

    if ($this->intacum !== $v) {
        $this->intacum = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpimppresocPeer::INTACUM;
      }

	}

	public function setAdeant($v)
	{

    if ($this->adeant !== $v) {
        $this->adeant = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpimppresocPeer::ADEANT;
      }

	}

	public function setAdepre($v)
	{

    if ($this->adepre !== $v) {
        $this->adepre = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpimppresocPeer::ADEPRE;
      }

	}

	public function setRegpre($v)
	{

    if ($this->regpre !== $v) {
        $this->regpre = $v;
        $this->modifiedColumns[] = NpimppresocPeer::REGPRE;
      }

	}

	public function setSaladi($v)
	{

    if ($this->saladi !== $v) {
        $this->saladi = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpimppresocPeer::SALADI;
      }

	}

	public function setAnoser($v)
	{

    if ($this->anoser !== $v) {
        $this->anoser = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpimppresocPeer::ANOSER;
      }

	}

	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = NpimppresocPeer::TIPO;
      }

	}

	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpimppresocPeer::ID;
      }

	}

  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->feccor = $rs->getDate($startcol + 1, null);

      $this->fecini = $rs->getDate($startcol + 2, null);

      $this->fecfin = $rs->getDate($startcol + 3, null);

      $this->salemp = $rs->getFloat($startcol + 4);

      $this->salempdia = $rs->getFloat($startcol + 5);

      $this->aliuti = $rs->getFloat($startcol + 6);

      $this->alibono = $rs->getFloat($startcol + 7);

      $this->aliadi = $rs->getFloat($startcol + 8);

      $this->saltot = $rs->getFloat($startcol + 9);

      $this->diaart108 = $rs->getFloat($startcol + 10);

      $this->capemp = $rs->getFloat($startcol + 11);

      $this->antacum = $rs->getFloat($startcol + 12);

      $this->valart108 = $rs->getFloat($startcol + 13);

      $this->tasint = $rs->getFloat($startcol + 14);

      $this->diadif = $rs->getFloat($startcol + 15);

      $this->intdev = $rs->getFloat($startcol + 16);

      $this->intacum = $rs->getFloat($startcol + 17);

      $this->adeant = $rs->getFloat($startcol + 18);

      $this->adepre = $rs->getFloat($startcol + 19);

      $this->regpre = $rs->getString($startcol + 20);

      $this->saladi = $rs->getFloat($startcol + 21);

      $this->anoser = $rs->getFloat($startcol + 22);

      $this->tipo = $rs->getString($startcol + 23);

      $this->id = $rs->getInt($startcol + 24);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 25;
    } catch (Exception $e) {
      throw new PropelException("Error populating Npimppresoc object", $e);
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
			$con = Propel::getConnection(NpimppresocPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpimppresocPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpimppresocPeer::DATABASE_NAME);
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
					$pk = NpimppresocPeer::doInsert($this, $con);
					$affectedRows += 1;
					$this->setId($pk);
					$this->setNew(false);
				} else {
					$affectedRows += NpimppresocPeer::doUpdate($this, $con);
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


			if (($retval = NpimppresocPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}


	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpimppresocPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFecini();
				break;
			case 3:
				return $this->getFecfin();
				break;
			case 4:
				return $this->getSalemp();
				break;
			case 5:
				return $this->getSalempdia();
				break;
			case 6:
				return $this->getAliuti();
				break;
			case 7:
				return $this->getAlibono();
				break;
			case 8:
				return $this->getAliadi();
				break;
			case 9:
				return $this->getSaltot();
				break;
			case 10:
				return $this->getDiaart108();
				break;
			case 11:
				return $this->getCapemp();
				break;
			case 12:
				return $this->getAntacum();
				break;
			case 13:
				return $this->getValart108();
				break;
			case 14:
				return $this->getTasint();
				break;
			case 15:
				return $this->getDiadif();
				break;
			case 16:
				return $this->getIntdev();
				break;
			case 17:
				return $this->getIntacum();
				break;
			case 18:
				return $this->getAdeant();
				break;
			case 19:
				return $this->getAdepre();
				break;
			case 20:
				return $this->getRegpre();
				break;
			case 21:
				return $this->getSaladi();
				break;
			case 22:
				return $this->getAnoser();
				break;
			case 23:
				return $this->getTipo();
				break;
			case 24:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}


	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpimppresocPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getFeccor(),
			$keys[2] => $this->getFecini(),
			$keys[3] => $this->getFecfin(),
			$keys[4] => $this->getSalemp(),
			$keys[5] => $this->getSalempdia(),
			$keys[6] => $this->getAliuti(),
			$keys[7] => $this->getAlibono(),
			$keys[8] => $this->getAliadi(),
			$keys[9] => $this->getSaltot(),
			$keys[10] => $this->getDiaart108(),
			$keys[11] => $this->getCapemp(),
			$keys[12] => $this->getAntacum(),
			$keys[13] => $this->getValart108(),
			$keys[14] => $this->getTasint(),
			$keys[15] => $this->getDiadif(),
			$keys[16] => $this->getIntdev(),
			$keys[17] => $this->getIntacum(),
			$keys[18] => $this->getAdeant(),
			$keys[19] => $this->getAdepre(),
			$keys[20] => $this->getRegpre(),
			$keys[21] => $this->getSaladi(),
			$keys[22] => $this->getAnoser(),
			$keys[23] => $this->getTipo(),
			$keys[24] => $this->getId(),
		);
		return $result;
	}


	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpimppresocPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setFecini($value);
				break;
			case 3:
				$this->setFecfin($value);
				break;
			case 4:
				$this->setSalemp($value);
				break;
			case 5:
				$this->setSalempdia($value);
				break;
			case 6:
				$this->setAliuti($value);
				break;
			case 7:
				$this->setAlibono($value);
				break;
			case 8:
				$this->setAliadi($value);
				break;
			case 9:
				$this->setSaltot($value);
				break;
			case 10:
				$this->setDiaart108($value);
				break;
			case 11:
				$this->setCapemp($value);
				break;
			case 12:
				$this->setAntacum($value);
				break;
			case 13:
				$this->setValart108($value);
				break;
			case 14:
				$this->setTasint($value);
				break;
			case 15:
				$this->setDiadif($value);
				break;
			case 16:
				$this->setIntdev($value);
				break;
			case 17:
				$this->setIntacum($value);
				break;
			case 18:
				$this->setAdeant($value);
				break;
			case 19:
				$this->setAdepre($value);
				break;
			case 20:
				$this->setRegpre($value);
				break;
			case 21:
				$this->setSaladi($value);
				break;
			case 22:
				$this->setAnoser($value);
				break;
			case 23:
				$this->setTipo($value);
				break;
			case 24:
				$this->setId($value);
				break;
		} 	}


	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpimppresocPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFeccor($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecini($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecfin($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setSalemp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setSalempdia($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAliuti($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setAlibono($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setAliadi($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setSaltot($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDiaart108($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCapemp($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setAntacum($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setValart108($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setTasint($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setDiadif($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setIntdev($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setIntacum($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setAdeant($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setAdepre($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setRegpre($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setSaladi($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setAnoser($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setTipo($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setId($arr[$keys[24]]);
	}


	public function buildCriteria()
	{
		$criteria = new Criteria(NpimppresocPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpimppresocPeer::CODEMP)) $criteria->add(NpimppresocPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpimppresocPeer::FECCOR)) $criteria->add(NpimppresocPeer::FECCOR, $this->feccor);
		if ($this->isColumnModified(NpimppresocPeer::FECINI)) $criteria->add(NpimppresocPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(NpimppresocPeer::FECFIN)) $criteria->add(NpimppresocPeer::FECFIN, $this->fecfin);
		if ($this->isColumnModified(NpimppresocPeer::SALEMP)) $criteria->add(NpimppresocPeer::SALEMP, $this->salemp);
		if ($this->isColumnModified(NpimppresocPeer::SALEMPDIA)) $criteria->add(NpimppresocPeer::SALEMPDIA, $this->salempdia);
		if ($this->isColumnModified(NpimppresocPeer::ALIUTI)) $criteria->add(NpimppresocPeer::ALIUTI, $this->aliuti);
		if ($this->isColumnModified(NpimppresocPeer::ALIBONO)) $criteria->add(NpimppresocPeer::ALIBONO, $this->alibono);
		if ($this->isColumnModified(NpimppresocPeer::ALIADI)) $criteria->add(NpimppresocPeer::ALIADI, $this->aliadi);
		if ($this->isColumnModified(NpimppresocPeer::SALTOT)) $criteria->add(NpimppresocPeer::SALTOT, $this->saltot);
		if ($this->isColumnModified(NpimppresocPeer::DIAART108)) $criteria->add(NpimppresocPeer::DIAART108, $this->diaart108);
		if ($this->isColumnModified(NpimppresocPeer::CAPEMP)) $criteria->add(NpimppresocPeer::CAPEMP, $this->capemp);
		if ($this->isColumnModified(NpimppresocPeer::ANTACUM)) $criteria->add(NpimppresocPeer::ANTACUM, $this->antacum);
		if ($this->isColumnModified(NpimppresocPeer::VALART108)) $criteria->add(NpimppresocPeer::VALART108, $this->valart108);
		if ($this->isColumnModified(NpimppresocPeer::TASINT)) $criteria->add(NpimppresocPeer::TASINT, $this->tasint);
		if ($this->isColumnModified(NpimppresocPeer::DIADIF)) $criteria->add(NpimppresocPeer::DIADIF, $this->diadif);
		if ($this->isColumnModified(NpimppresocPeer::INTDEV)) $criteria->add(NpimppresocPeer::INTDEV, $this->intdev);
		if ($this->isColumnModified(NpimppresocPeer::INTACUM)) $criteria->add(NpimppresocPeer::INTACUM, $this->intacum);
		if ($this->isColumnModified(NpimppresocPeer::ADEANT)) $criteria->add(NpimppresocPeer::ADEANT, $this->adeant);
		if ($this->isColumnModified(NpimppresocPeer::ADEPRE)) $criteria->add(NpimppresocPeer::ADEPRE, $this->adepre);
		if ($this->isColumnModified(NpimppresocPeer::REGPRE)) $criteria->add(NpimppresocPeer::REGPRE, $this->regpre);
		if ($this->isColumnModified(NpimppresocPeer::SALADI)) $criteria->add(NpimppresocPeer::SALADI, $this->saladi);
		if ($this->isColumnModified(NpimppresocPeer::ANOSER)) $criteria->add(NpimppresocPeer::ANOSER, $this->anoser);
		if ($this->isColumnModified(NpimppresocPeer::TIPO)) $criteria->add(NpimppresocPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(NpimppresocPeer::ID)) $criteria->add(NpimppresocPeer::ID, $this->id);

		return $criteria;
	}


	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpimppresocPeer::DATABASE_NAME);

		$criteria->add(NpimppresocPeer::ID, $this->id);

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

		$copyObj->setFecini($this->fecini);

		$copyObj->setFecfin($this->fecfin);

		$copyObj->setSalemp($this->salemp);

		$copyObj->setSalempdia($this->salempdia);

		$copyObj->setAliuti($this->aliuti);

		$copyObj->setAlibono($this->alibono);

		$copyObj->setAliadi($this->aliadi);

		$copyObj->setSaltot($this->saltot);

		$copyObj->setDiaart108($this->diaart108);

		$copyObj->setCapemp($this->capemp);

		$copyObj->setAntacum($this->antacum);

		$copyObj->setValart108($this->valart108);

		$copyObj->setTasint($this->tasint);

		$copyObj->setDiadif($this->diadif);

		$copyObj->setIntdev($this->intdev);

		$copyObj->setIntacum($this->intacum);

		$copyObj->setAdeant($this->adeant);

		$copyObj->setAdepre($this->adepre);

		$copyObj->setRegpre($this->regpre);

		$copyObj->setSaladi($this->saladi);

		$copyObj->setAnoser($this->anoser);

		$copyObj->setTipo($this->tipo);


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
			self::$peer = new NpimppresocPeer();
		}
		return self::$peer;
	}

}