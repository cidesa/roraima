<?php


abstract class BaseNpinffam extends BaseObject  implements Persistent {



	protected static $peer;



	protected $codemp;



	protected $cedfam;



	protected $nomfam;



	protected $sexfam;



	protected $fecnac;



	protected $edafam;



	protected $parfam;



	protected $edociv;



	protected $grains;



	protected $traofi;



	protected $codgua;



	protected $valgua;



	protected $seghcm;



	protected $porseghcm;



	protected $ocupac;



	protected $carben;



	protected $dissus;



	protected $id;


	protected $alreadyInSave = false;


	protected $alreadyInValidation = false;


  public function getCodemp()
  {

    return trim($this->codemp);

  }

  public function getCedfam()
  {

    return trim($this->cedfam);

  }

  public function getNomfam()
  {

    return trim($this->nomfam);

  }

  public function getSexfam()
  {

    return trim($this->sexfam);

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


  public function getEdafam($val=false)
  {

    if($val) return number_format($this->edafam,2,',','.');
    else return $this->edafam;

  }

  public function getParfam()
  {

    return trim($this->parfam);

  }

  public function getEdociv()
  {

    return trim($this->edociv);

  }

  public function getGrains()
  {

    return trim($this->grains);

  }

  public function getTraofi()
  {

    return trim($this->traofi);

  }

  public function getCodgua()
  {

    return trim($this->codgua);

  }

  public function getValgua($val=false)
  {

    if($val) return number_format($this->valgua,2,',','.');
    else return $this->valgua;

  }

  public function getSeghcm()
  {

    return trim($this->seghcm);

  }

  public function getPorseghcm($val=false)
  {

    if($val) return number_format($this->porseghcm,2,',','.');
    else return $this->porseghcm;

  }

  public function getOcupac()
  {

    return trim($this->ocupac);

  }

  public function getCarben()
  {

    return trim($this->carben);

  }

  public function getDissus()
  {

    return trim($this->dissus);

  }

  public function getId()
  {

    return $this->id;

  }

	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpinffamPeer::CODEMP;
      }

	}

	public function setCedfam($v)
	{

    if ($this->cedfam !== $v) {
        $this->cedfam = $v;
        $this->modifiedColumns[] = NpinffamPeer::CEDFAM;
      }

	}

	public function setNomfam($v)
	{

    if ($this->nomfam !== $v) {
        $this->nomfam = $v;
        $this->modifiedColumns[] = NpinffamPeer::NOMFAM;
      }

	}

	public function setSexfam($v)
	{

    if ($this->sexfam !== $v) {
        $this->sexfam = $v;
        $this->modifiedColumns[] = NpinffamPeer::SEXFAM;
      }

	}

	public function setFecnac($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecnac] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecnac !== $ts) {
      $this->fecnac = $ts;
      $this->modifiedColumns[] = NpinffamPeer::FECNAC;
    }

	}

	public function setEdafam($v)
	{

    if ($this->edafam !== $v) {
        $this->edafam = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpinffamPeer::EDAFAM;
      }

	}

	public function setParfam($v)
	{

    if ($this->parfam !== $v) {
        $this->parfam = $v;
        $this->modifiedColumns[] = NpinffamPeer::PARFAM;
      }

	}

	public function setEdociv($v)
	{

    if ($this->edociv !== $v) {
        $this->edociv = $v;
        $this->modifiedColumns[] = NpinffamPeer::EDOCIV;
      }

	}

	public function setGrains($v)
	{

    if ($this->grains !== $v) {
        $this->grains = $v;
        $this->modifiedColumns[] = NpinffamPeer::GRAINS;
      }

	}

	public function setTraofi($v)
	{

    if ($this->traofi !== $v) {
        $this->traofi = $v;
        $this->modifiedColumns[] = NpinffamPeer::TRAOFI;
      }

	}

	public function setCodgua($v)
	{

    if ($this->codgua !== $v) {
        $this->codgua = $v;
        $this->modifiedColumns[] = NpinffamPeer::CODGUA;
      }

	}

	public function setValgua($v)
	{

    if ($this->valgua !== $v) {
        $this->valgua = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpinffamPeer::VALGUA;
      }

	}

	public function setSeghcm($v)
	{

    if ($this->seghcm !== $v) {
        $this->seghcm = $v;
        $this->modifiedColumns[] = NpinffamPeer::SEGHCM;
      }

	}

	public function setPorseghcm($v)
	{

    if ($this->porseghcm !== $v) {
        $this->porseghcm = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpinffamPeer::PORSEGHCM;
      }

	}

	public function setOcupac($v)
	{

    if ($this->ocupac !== $v) {
        $this->ocupac = $v;
        $this->modifiedColumns[] = NpinffamPeer::OCUPAC;
      }

	}

	public function setCarben($v)
	{

    if ($this->carben !== $v) {
        $this->carben = $v;
        $this->modifiedColumns[] = NpinffamPeer::CARBEN;
      }

	}

	public function setDissus($v)
	{

    if ($this->dissus !== $v) {
        $this->dissus = $v;
        $this->modifiedColumns[] = NpinffamPeer::DISSUS;
      }

	}

	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpinffamPeer::ID;
      }

	}

  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->cedfam = $rs->getString($startcol + 1);

      $this->nomfam = $rs->getString($startcol + 2);

      $this->sexfam = $rs->getString($startcol + 3);

      $this->fecnac = $rs->getDate($startcol + 4, null);

      $this->edafam = $rs->getFloat($startcol + 5);

      $this->parfam = $rs->getString($startcol + 6);

      $this->edociv = $rs->getString($startcol + 7);

      $this->grains = $rs->getString($startcol + 8);

      $this->traofi = $rs->getString($startcol + 9);

      $this->codgua = $rs->getString($startcol + 10);

      $this->valgua = $rs->getFloat($startcol + 11);

      $this->seghcm = $rs->getString($startcol + 12);

      $this->porseghcm = $rs->getFloat($startcol + 13);

      $this->ocupac = $rs->getString($startcol + 14);

      $this->carben = $rs->getString($startcol + 15);

      $this->dissus = $rs->getString($startcol + 16);

      $this->id = $rs->getInt($startcol + 17);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 18;
    } catch (Exception $e) {
      throw new PropelException("Error populating Npinffam object", $e);
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
			$con = Propel::getConnection(NpinffamPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpinffamPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpinffamPeer::DATABASE_NAME);
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
					$pk = NpinffamPeer::doInsert($this, $con);
					$affectedRows += 1;
					$this->setId($pk);
					$this->setNew(false);
				} else {
					$affectedRows += NpinffamPeer::doUpdate($this, $con);
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


			if (($retval = NpinffamPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}


	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinffamPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}


	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getCedfam();
				break;
			case 2:
				return $this->getNomfam();
				break;
			case 3:
				return $this->getSexfam();
				break;
			case 4:
				return $this->getFecnac();
				break;
			case 5:
				return $this->getEdafam();
				break;
			case 6:
				return $this->getParfam();
				break;
			case 7:
				return $this->getEdociv();
				break;
			case 8:
				return $this->getGrains();
				break;
			case 9:
				return $this->getTraofi();
				break;
			case 10:
				return $this->getCodgua();
				break;
			case 11:
				return $this->getValgua();
				break;
			case 12:
				return $this->getSeghcm();
				break;
			case 13:
				return $this->getPorseghcm();
				break;
			case 14:
				return $this->getOcupac();
				break;
			case 15:
				return $this->getCarben();
				break;
			case 16:
				return $this->getDissus();
				break;
			case 17:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}


	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpinffamPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getCedfam(),
			$keys[2] => $this->getNomfam(),
			$keys[3] => $this->getSexfam(),
			$keys[4] => $this->getFecnac(),
			$keys[5] => $this->getEdafam(),
			$keys[6] => $this->getParfam(),
			$keys[7] => $this->getEdociv(),
			$keys[8] => $this->getGrains(),
			$keys[9] => $this->getTraofi(),
			$keys[10] => $this->getCodgua(),
			$keys[11] => $this->getValgua(),
			$keys[12] => $this->getSeghcm(),
			$keys[13] => $this->getPorseghcm(),
			$keys[14] => $this->getOcupac(),
			$keys[15] => $this->getCarben(),
			$keys[16] => $this->getDissus(),
			$keys[17] => $this->getId(),
		);
		return $result;
	}


	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinffamPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}


	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setCedfam($value);
				break;
			case 2:
				$this->setNomfam($value);
				break;
			case 3:
				$this->setSexfam($value);
				break;
			case 4:
				$this->setFecnac($value);
				break;
			case 5:
				$this->setEdafam($value);
				break;
			case 6:
				$this->setParfam($value);
				break;
			case 7:
				$this->setEdociv($value);
				break;
			case 8:
				$this->setGrains($value);
				break;
			case 9:
				$this->setTraofi($value);
				break;
			case 10:
				$this->setCodgua($value);
				break;
			case 11:
				$this->setValgua($value);
				break;
			case 12:
				$this->setSeghcm($value);
				break;
			case 13:
				$this->setPorseghcm($value);
				break;
			case 14:
				$this->setOcupac($value);
				break;
			case 15:
				$this->setCarben($value);
				break;
			case 16:
				$this->setDissus($value);
				break;
			case 17:
				$this->setId($value);
				break;
		} 	}


	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpinffamPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCedfam($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomfam($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSexfam($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecnac($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEdafam($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setParfam($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setEdociv($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setGrains($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTraofi($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodgua($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setValgua($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setSeghcm($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setPorseghcm($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setOcupac($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCarben($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setDissus($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setId($arr[$keys[17]]);
	}


	public function buildCriteria()
	{
		$criteria = new Criteria(NpinffamPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpinffamPeer::CODEMP)) $criteria->add(NpinffamPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpinffamPeer::CEDFAM)) $criteria->add(NpinffamPeer::CEDFAM, $this->cedfam);
		if ($this->isColumnModified(NpinffamPeer::NOMFAM)) $criteria->add(NpinffamPeer::NOMFAM, $this->nomfam);
		if ($this->isColumnModified(NpinffamPeer::SEXFAM)) $criteria->add(NpinffamPeer::SEXFAM, $this->sexfam);
		if ($this->isColumnModified(NpinffamPeer::FECNAC)) $criteria->add(NpinffamPeer::FECNAC, $this->fecnac);
		if ($this->isColumnModified(NpinffamPeer::EDAFAM)) $criteria->add(NpinffamPeer::EDAFAM, $this->edafam);
		if ($this->isColumnModified(NpinffamPeer::PARFAM)) $criteria->add(NpinffamPeer::PARFAM, $this->parfam);
		if ($this->isColumnModified(NpinffamPeer::EDOCIV)) $criteria->add(NpinffamPeer::EDOCIV, $this->edociv);
		if ($this->isColumnModified(NpinffamPeer::GRAINS)) $criteria->add(NpinffamPeer::GRAINS, $this->grains);
		if ($this->isColumnModified(NpinffamPeer::TRAOFI)) $criteria->add(NpinffamPeer::TRAOFI, $this->traofi);
		if ($this->isColumnModified(NpinffamPeer::CODGUA)) $criteria->add(NpinffamPeer::CODGUA, $this->codgua);
		if ($this->isColumnModified(NpinffamPeer::VALGUA)) $criteria->add(NpinffamPeer::VALGUA, $this->valgua);
		if ($this->isColumnModified(NpinffamPeer::SEGHCM)) $criteria->add(NpinffamPeer::SEGHCM, $this->seghcm);
		if ($this->isColumnModified(NpinffamPeer::PORSEGHCM)) $criteria->add(NpinffamPeer::PORSEGHCM, $this->porseghcm);
		if ($this->isColumnModified(NpinffamPeer::OCUPAC)) $criteria->add(NpinffamPeer::OCUPAC, $this->ocupac);
		if ($this->isColumnModified(NpinffamPeer::CARBEN)) $criteria->add(NpinffamPeer::CARBEN, $this->carben);
		if ($this->isColumnModified(NpinffamPeer::DISSUS)) $criteria->add(NpinffamPeer::DISSUS, $this->dissus);
		if ($this->isColumnModified(NpinffamPeer::ID)) $criteria->add(NpinffamPeer::ID, $this->id);

		return $criteria;
	}


	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpinffamPeer::DATABASE_NAME);

		$criteria->add(NpinffamPeer::ID, $this->id);

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

		$copyObj->setCedfam($this->cedfam);

		$copyObj->setNomfam($this->nomfam);

		$copyObj->setSexfam($this->sexfam);

		$copyObj->setFecnac($this->fecnac);

		$copyObj->setEdafam($this->edafam);

		$copyObj->setParfam($this->parfam);

		$copyObj->setEdociv($this->edociv);

		$copyObj->setGrains($this->grains);

		$copyObj->setTraofi($this->traofi);

		$copyObj->setCodgua($this->codgua);

		$copyObj->setValgua($this->valgua);

		$copyObj->setSeghcm($this->seghcm);

		$copyObj->setPorseghcm($this->porseghcm);

		$copyObj->setOcupac($this->ocupac);

		$copyObj->setCarben($this->carben);

		$copyObj->setDissus($this->dissus);


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
			self::$peer = new NpinffamPeer();
		}
		return self::$peer;
	}

}