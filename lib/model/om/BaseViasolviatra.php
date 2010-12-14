<?php


abstract class BaseViasolviatra extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numsol;


	
	protected $fecsol;


	
	protected $tipvia;


	
	protected $codemp;


	
	protected $codcat;


	
	protected $codniv;


	
	protected $codempaco;


	
	protected $codnivaco;


	
	protected $dessol;


	
	protected $codciu;


	
	protected $codnivapr;


	
	protected $codproced;


	
	protected $status;


	
	protected $fecdes;


	
	protected $fechas;


	
	protected $numdia;


	
	protected $codfortra;


	
	protected $codempaut;


	
	protected $codcen;


	
	protected $codubi;


	
	protected $nomempe;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumsol()
  {

    return trim($this->numsol);

  }
  
  public function getFecsol($format = 'Y-m-d')
  {

    if ($this->fecsol === null || $this->fecsol === '') {
      return null;
    } elseif (!is_int($this->fecsol)) {
            $ts = adodb_strtotime($this->fecsol);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecsol] as date/time value: " . var_export($this->fecsol, true));
      }
    } else {
      $ts = $this->fecsol;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getTipvia()
  {

    return trim($this->tipvia);

  }
  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getCodniv()
  {

    return trim($this->codniv);

  }
  
  public function getCodempaco()
  {

    return trim($this->codempaco);

  }
  
  public function getCodnivaco()
  {

    return trim($this->codnivaco);

  }
  
  public function getDessol()
  {

    return trim($this->dessol);

  }
  
  public function getCodciu()
  {

    return trim($this->codciu);

  }
  
  public function getCodnivapr()
  {

    return trim($this->codnivapr);

  }
  
  public function getCodproced()
  {

    return trim($this->codproced);

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getFecdes($format = 'Y-m-d')
  {

    if ($this->fecdes === null || $this->fecdes === '') {
      return null;
    } elseif (!is_int($this->fecdes)) {
            $ts = adodb_strtotime($this->fecdes);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdes] as date/time value: " . var_export($this->fecdes, true));
      }
    } else {
      $ts = $this->fecdes;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFechas($format = 'Y-m-d')
  {

    if ($this->fechas === null || $this->fechas === '') {
      return null;
    } elseif (!is_int($this->fechas)) {
            $ts = adodb_strtotime($this->fechas);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fechas] as date/time value: " . var_export($this->fechas, true));
      }
    } else {
      $ts = $this->fechas;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNumdia()
  {

    return $this->numdia;

  }
  
  public function getCodfortra()
  {

    return trim($this->codfortra);

  }
  
  public function getCodempaut()
  {

    return trim($this->codempaut);

  }
  
  public function getCodcen()
  {

    return trim($this->codcen);

  }
  
  public function getCodubi()
  {

    return trim($this->codubi);

  }
  
  public function getNomempe()
  {

    return trim($this->nomempe);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumsol($v)
	{

    if ($this->numsol !== $v) {
        $this->numsol = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::NUMSOL;
      }
  
	} 
	
	public function setFecsol($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecsol] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecsol !== $ts) {
      $this->fecsol = $ts;
      $this->modifiedColumns[] = ViasolviatraPeer::FECSOL;
    }

	} 
	
	public function setTipvia($v)
	{

    if ($this->tipvia !== $v) {
        $this->tipvia = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::TIPVIA;
      }
  
	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CODEMP;
      }
  
	} 
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CODCAT;
      }
  
	} 
	
	public function setCodniv($v)
	{

    if ($this->codniv !== $v) {
        $this->codniv = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CODNIV;
      }
  
	} 
	
	public function setCodempaco($v)
	{

    if ($this->codempaco !== $v) {
        $this->codempaco = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CODEMPACO;
      }
  
	} 
	
	public function setCodnivaco($v)
	{

    if ($this->codnivaco !== $v) {
        $this->codnivaco = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CODNIVACO;
      }
  
	} 
	
	public function setDessol($v)
	{

    if ($this->dessol !== $v) {
        $this->dessol = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::DESSOL;
      }
  
	} 
	
	public function setCodciu($v)
	{

    if ($this->codciu !== $v) {
        $this->codciu = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CODCIU;
      }
  
	} 
	
	public function setCodnivapr($v)
	{

    if ($this->codnivapr !== $v) {
        $this->codnivapr = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CODNIVAPR;
      }
  
	} 
	
	public function setCodproced($v)
	{

    if ($this->codproced !== $v) {
        $this->codproced = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CODPROCED;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::STATUS;
      }
  
	} 
	
	public function setFecdes($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdes] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdes !== $ts) {
      $this->fecdes = $ts;
      $this->modifiedColumns[] = ViasolviatraPeer::FECDES;
    }

	} 
	
	public function setFechas($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fechas] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fechas !== $ts) {
      $this->fechas = $ts;
      $this->modifiedColumns[] = ViasolviatraPeer::FECHAS;
    }

	} 
	
	public function setNumdia($v)
	{

    if ($this->numdia !== $v) {
        $this->numdia = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::NUMDIA;
      }
  
	} 
	
	public function setCodfortra($v)
	{

    if ($this->codfortra !== $v) {
        $this->codfortra = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CODFORTRA;
      }
  
	} 
	
	public function setCodempaut($v)
	{

    if ($this->codempaut !== $v) {
        $this->codempaut = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CODEMPAUT;
      }
  
	} 
	
	public function setCodcen($v)
	{

    if ($this->codcen !== $v) {
        $this->codcen = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CODCEN;
      }
  
	} 
	
	public function setCodubi($v)
	{

    if ($this->codubi !== $v) {
        $this->codubi = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CODUBI;
      }
  
	} 
	
	public function setNomempe($v)
	{

    if ($this->nomempe !== $v) {
        $this->nomempe = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::NOMEMPE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numsol = $rs->getString($startcol + 0);

      $this->fecsol = $rs->getDate($startcol + 1, null);

      $this->tipvia = $rs->getString($startcol + 2);

      $this->codemp = $rs->getString($startcol + 3);

      $this->codcat = $rs->getString($startcol + 4);

      $this->codniv = $rs->getString($startcol + 5);

      $this->codempaco = $rs->getString($startcol + 6);

      $this->codnivaco = $rs->getString($startcol + 7);

      $this->dessol = $rs->getString($startcol + 8);

      $this->codciu = $rs->getString($startcol + 9);

      $this->codnivapr = $rs->getString($startcol + 10);

      $this->codproced = $rs->getString($startcol + 11);

      $this->status = $rs->getString($startcol + 12);

      $this->fecdes = $rs->getDate($startcol + 13, null);

      $this->fechas = $rs->getDate($startcol + 14, null);

      $this->numdia = $rs->getInt($startcol + 15);

      $this->codfortra = $rs->getString($startcol + 16);

      $this->codempaut = $rs->getString($startcol + 17);

      $this->codcen = $rs->getString($startcol + 18);

      $this->codubi = $rs->getString($startcol + 19);

      $this->nomempe = $rs->getString($startcol + 20);

      $this->id = $rs->getInt($startcol + 21);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 22; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Viasolviatra object", $e);
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
			$con = Propel::getConnection(ViasolviatraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ViasolviatraPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ViasolviatraPeer::DATABASE_NAME);
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
					$pk = ViasolviatraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ViasolviatraPeer::doUpdate($this, $con);
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


			if (($retval = ViasolviatraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViasolviatraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumsol();
				break;
			case 1:
				return $this->getFecsol();
				break;
			case 2:
				return $this->getTipvia();
				break;
			case 3:
				return $this->getCodemp();
				break;
			case 4:
				return $this->getCodcat();
				break;
			case 5:
				return $this->getCodniv();
				break;
			case 6:
				return $this->getCodempaco();
				break;
			case 7:
				return $this->getCodnivaco();
				break;
			case 8:
				return $this->getDessol();
				break;
			case 9:
				return $this->getCodciu();
				break;
			case 10:
				return $this->getCodnivapr();
				break;
			case 11:
				return $this->getCodproced();
				break;
			case 12:
				return $this->getStatus();
				break;
			case 13:
				return $this->getFecdes();
				break;
			case 14:
				return $this->getFechas();
				break;
			case 15:
				return $this->getNumdia();
				break;
			case 16:
				return $this->getCodfortra();
				break;
			case 17:
				return $this->getCodempaut();
				break;
			case 18:
				return $this->getCodcen();
				break;
			case 19:
				return $this->getCodubi();
				break;
			case 20:
				return $this->getNomempe();
				break;
			case 21:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViasolviatraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumsol(),
			$keys[1] => $this->getFecsol(),
			$keys[2] => $this->getTipvia(),
			$keys[3] => $this->getCodemp(),
			$keys[4] => $this->getCodcat(),
			$keys[5] => $this->getCodniv(),
			$keys[6] => $this->getCodempaco(),
			$keys[7] => $this->getCodnivaco(),
			$keys[8] => $this->getDessol(),
			$keys[9] => $this->getCodciu(),
			$keys[10] => $this->getCodnivapr(),
			$keys[11] => $this->getCodproced(),
			$keys[12] => $this->getStatus(),
			$keys[13] => $this->getFecdes(),
			$keys[14] => $this->getFechas(),
			$keys[15] => $this->getNumdia(),
			$keys[16] => $this->getCodfortra(),
			$keys[17] => $this->getCodempaut(),
			$keys[18] => $this->getCodcen(),
			$keys[19] => $this->getCodubi(),
			$keys[20] => $this->getNomempe(),
			$keys[21] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViasolviatraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumsol($value);
				break;
			case 1:
				$this->setFecsol($value);
				break;
			case 2:
				$this->setTipvia($value);
				break;
			case 3:
				$this->setCodemp($value);
				break;
			case 4:
				$this->setCodcat($value);
				break;
			case 5:
				$this->setCodniv($value);
				break;
			case 6:
				$this->setCodempaco($value);
				break;
			case 7:
				$this->setCodnivaco($value);
				break;
			case 8:
				$this->setDessol($value);
				break;
			case 9:
				$this->setCodciu($value);
				break;
			case 10:
				$this->setCodnivapr($value);
				break;
			case 11:
				$this->setCodproced($value);
				break;
			case 12:
				$this->setStatus($value);
				break;
			case 13:
				$this->setFecdes($value);
				break;
			case 14:
				$this->setFechas($value);
				break;
			case 15:
				$this->setNumdia($value);
				break;
			case 16:
				$this->setCodfortra($value);
				break;
			case 17:
				$this->setCodempaut($value);
				break;
			case 18:
				$this->setCodcen($value);
				break;
			case 19:
				$this->setCodubi($value);
				break;
			case 20:
				$this->setNomempe($value);
				break;
			case 21:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViasolviatraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumsol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecsol($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipvia($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodemp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodcat($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodniv($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodempaco($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodnivaco($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDessol($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodciu($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodnivapr($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCodproced($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setStatus($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFecdes($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setFechas($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setNumdia($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCodfortra($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCodempaut($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCodcen($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCodubi($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setNomempe($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setId($arr[$keys[21]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ViasolviatraPeer::DATABASE_NAME);

		if ($this->isColumnModified(ViasolviatraPeer::NUMSOL)) $criteria->add(ViasolviatraPeer::NUMSOL, $this->numsol);
		if ($this->isColumnModified(ViasolviatraPeer::FECSOL)) $criteria->add(ViasolviatraPeer::FECSOL, $this->fecsol);
		if ($this->isColumnModified(ViasolviatraPeer::TIPVIA)) $criteria->add(ViasolviatraPeer::TIPVIA, $this->tipvia);
		if ($this->isColumnModified(ViasolviatraPeer::CODEMP)) $criteria->add(ViasolviatraPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(ViasolviatraPeer::CODCAT)) $criteria->add(ViasolviatraPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(ViasolviatraPeer::CODNIV)) $criteria->add(ViasolviatraPeer::CODNIV, $this->codniv);
		if ($this->isColumnModified(ViasolviatraPeer::CODEMPACO)) $criteria->add(ViasolviatraPeer::CODEMPACO, $this->codempaco);
		if ($this->isColumnModified(ViasolviatraPeer::CODNIVACO)) $criteria->add(ViasolviatraPeer::CODNIVACO, $this->codnivaco);
		if ($this->isColumnModified(ViasolviatraPeer::DESSOL)) $criteria->add(ViasolviatraPeer::DESSOL, $this->dessol);
		if ($this->isColumnModified(ViasolviatraPeer::CODCIU)) $criteria->add(ViasolviatraPeer::CODCIU, $this->codciu);
		if ($this->isColumnModified(ViasolviatraPeer::CODNIVAPR)) $criteria->add(ViasolviatraPeer::CODNIVAPR, $this->codnivapr);
		if ($this->isColumnModified(ViasolviatraPeer::CODPROCED)) $criteria->add(ViasolviatraPeer::CODPROCED, $this->codproced);
		if ($this->isColumnModified(ViasolviatraPeer::STATUS)) $criteria->add(ViasolviatraPeer::STATUS, $this->status);
		if ($this->isColumnModified(ViasolviatraPeer::FECDES)) $criteria->add(ViasolviatraPeer::FECDES, $this->fecdes);
		if ($this->isColumnModified(ViasolviatraPeer::FECHAS)) $criteria->add(ViasolviatraPeer::FECHAS, $this->fechas);
		if ($this->isColumnModified(ViasolviatraPeer::NUMDIA)) $criteria->add(ViasolviatraPeer::NUMDIA, $this->numdia);
		if ($this->isColumnModified(ViasolviatraPeer::CODFORTRA)) $criteria->add(ViasolviatraPeer::CODFORTRA, $this->codfortra);
		if ($this->isColumnModified(ViasolviatraPeer::CODEMPAUT)) $criteria->add(ViasolviatraPeer::CODEMPAUT, $this->codempaut);
		if ($this->isColumnModified(ViasolviatraPeer::CODCEN)) $criteria->add(ViasolviatraPeer::CODCEN, $this->codcen);
		if ($this->isColumnModified(ViasolviatraPeer::CODUBI)) $criteria->add(ViasolviatraPeer::CODUBI, $this->codubi);
		if ($this->isColumnModified(ViasolviatraPeer::NOMEMPE)) $criteria->add(ViasolviatraPeer::NOMEMPE, $this->nomempe);
		if ($this->isColumnModified(ViasolviatraPeer::ID)) $criteria->add(ViasolviatraPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ViasolviatraPeer::DATABASE_NAME);

		$criteria->add(ViasolviatraPeer::ID, $this->id);

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

		$copyObj->setNumsol($this->numsol);

		$copyObj->setFecsol($this->fecsol);

		$copyObj->setTipvia($this->tipvia);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCodniv($this->codniv);

		$copyObj->setCodempaco($this->codempaco);

		$copyObj->setCodnivaco($this->codnivaco);

		$copyObj->setDessol($this->dessol);

		$copyObj->setCodciu($this->codciu);

		$copyObj->setCodnivapr($this->codnivapr);

		$copyObj->setCodproced($this->codproced);

		$copyObj->setStatus($this->status);

		$copyObj->setFecdes($this->fecdes);

		$copyObj->setFechas($this->fechas);

		$copyObj->setNumdia($this->numdia);

		$copyObj->setCodfortra($this->codfortra);

		$copyObj->setCodempaut($this->codempaut);

		$copyObj->setCodcen($this->codcen);

		$copyObj->setCodubi($this->codubi);

		$copyObj->setNomempe($this->nomempe);


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
			self::$peer = new ViasolviatraPeer();
		}
		return self::$peer;
	}

} 
