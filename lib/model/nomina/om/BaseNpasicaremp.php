<?php


abstract class BaseNpasicaremp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $codcar;


	
	protected $codnom;


	
	protected $codcat;


	
	protected $fecasi;


	
	protected $nomemp;


	
	protected $nomcar;


	
	protected $nomnom;


	
	protected $nomcat;


	
	protected $unieje;


	
	protected $sueldo;


	
	protected $status;


	
	protected $nronom;


	
	protected $montonomina;


	
	protected $codtip;


	
	protected $codtipgas;


	
	protected $codniv;


	
	protected $grado;


	
	protected $paso;


	
	protected $codtipded;


	
	protected $codtipcat;


	
	protected $codmotcamcar;


	
	protected $codtie;


	
	protected $juscam;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getCodcar()
  {

    return trim($this->codcar);

  }
  
  public function getCodnom()
  {

    return trim($this->codnom);

  }
  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getFecasi($format = 'Y-m-d')
  {

    if ($this->fecasi === null || $this->fecasi === '') {
      return null;
    } elseif (!is_int($this->fecasi)) {
            $ts = adodb_strtotime($this->fecasi);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecasi] as date/time value: " . var_export($this->fecasi, true));
      }
    } else {
      $ts = $this->fecasi;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNomemp()
  {

    return trim($this->nomemp);

  }
  
  public function getNomcar()
  {

    return trim($this->nomcar);

  }
  
  public function getNomnom()
  {

    return trim($this->nomnom);

  }
  
  public function getNomcat()
  {

    return trim($this->nomcat);

  }
  
  public function getUnieje()
  {

    return trim($this->unieje);

  }
  
  public function getSueldo($val=false)
  {

    if($val) return number_format($this->sueldo,2,',','.');
    else return $this->sueldo;

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getNronom()
  {

    return trim($this->nronom);

  }
  
  public function getMontonomina($val=false)
  {

    if($val) return number_format($this->montonomina,2,',','.');
    else return $this->montonomina;

  }
  
  public function getCodtip()
  {

    return trim($this->codtip);

  }
  
  public function getCodtipgas()
  {

    return trim($this->codtipgas);

  }
  
  public function getCodniv()
  {

    return trim($this->codniv);

  }
  
  public function getGrado()
  {

    return trim($this->grado);

  }
  
  public function getPaso()
  {

    return trim($this->paso);

  }
  
  public function getCodtipded()
  {

    return trim($this->codtipded);

  }
  
  public function getCodtipcat()
  {

    return trim($this->codtipcat);

  }
  
  public function getCodmotcamcar()
  {

    return trim($this->codmotcamcar);

  }
  
  public function getCodtie()
  {

    return trim($this->codtie);

  }
  
  public function getJuscam()
  {

    return trim($this->juscam);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpasicarempPeer::CODEMP;
      }
  
	} 
	
	public function setCodcar($v)
	{

    if ($this->codcar !== $v) {
        $this->codcar = $v;
        $this->modifiedColumns[] = NpasicarempPeer::CODCAR;
      }
  
	} 
	
	public function setCodnom($v)
	{

    if ($this->codnom !== $v) {
        $this->codnom = $v;
        $this->modifiedColumns[] = NpasicarempPeer::CODNOM;
      }
  
	} 
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = NpasicarempPeer::CODCAT;
      }
  
	} 
	
	public function setFecasi($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecasi] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecasi !== $ts) {
      $this->fecasi = $ts;
      $this->modifiedColumns[] = NpasicarempPeer::FECASI;
    }

	} 
	
	public function setNomemp($v)
	{

    if ($this->nomemp !== $v) {
        $this->nomemp = $v;
        $this->modifiedColumns[] = NpasicarempPeer::NOMEMP;
      }
  
	} 
	
	public function setNomcar($v)
	{

    if ($this->nomcar !== $v) {
        $this->nomcar = $v;
        $this->modifiedColumns[] = NpasicarempPeer::NOMCAR;
      }
  
	} 
	
	public function setNomnom($v)
	{

    if ($this->nomnom !== $v) {
        $this->nomnom = $v;
        $this->modifiedColumns[] = NpasicarempPeer::NOMNOM;
      }
  
	} 
	
	public function setNomcat($v)
	{

    if ($this->nomcat !== $v) {
        $this->nomcat = $v;
        $this->modifiedColumns[] = NpasicarempPeer::NOMCAT;
      }
  
	} 
	
	public function setUnieje($v)
	{

    if ($this->unieje !== $v) {
        $this->unieje = $v;
        $this->modifiedColumns[] = NpasicarempPeer::UNIEJE;
      }
  
	} 
	
	public function setSueldo($v)
	{

    if ($this->sueldo !== $v) {
        $this->sueldo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpasicarempPeer::SUELDO;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = NpasicarempPeer::STATUS;
      }
  
	} 
	
	public function setNronom($v)
	{

    if ($this->nronom !== $v) {
        $this->nronom = $v;
        $this->modifiedColumns[] = NpasicarempPeer::NRONOM;
      }
  
	} 
	
	public function setMontonomina($v)
	{

    if ($this->montonomina !== $v) {
        $this->montonomina = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpasicarempPeer::MONTONOMINA;
      }
  
	} 
	
	public function setCodtip($v)
	{

    if ($this->codtip !== $v) {
        $this->codtip = $v;
        $this->modifiedColumns[] = NpasicarempPeer::CODTIP;
      }
  
	} 
	
	public function setCodtipgas($v)
	{

    if ($this->codtipgas !== $v) {
        $this->codtipgas = $v;
        $this->modifiedColumns[] = NpasicarempPeer::CODTIPGAS;
      }
  
	} 
	
	public function setCodniv($v)
	{

    if ($this->codniv !== $v) {
        $this->codniv = $v;
        $this->modifiedColumns[] = NpasicarempPeer::CODNIV;
      }
  
	} 
	
	public function setGrado($v)
	{

    if ($this->grado !== $v) {
        $this->grado = $v;
        $this->modifiedColumns[] = NpasicarempPeer::GRADO;
      }
  
	} 
	
	public function setPaso($v)
	{

    if ($this->paso !== $v) {
        $this->paso = $v;
        $this->modifiedColumns[] = NpasicarempPeer::PASO;
      }
  
	} 
	
	public function setCodtipded($v)
	{

    if ($this->codtipded !== $v) {
        $this->codtipded = $v;
        $this->modifiedColumns[] = NpasicarempPeer::CODTIPDED;
      }
  
	} 
	
	public function setCodtipcat($v)
	{

    if ($this->codtipcat !== $v) {
        $this->codtipcat = $v;
        $this->modifiedColumns[] = NpasicarempPeer::CODTIPCAT;
      }
  
	} 
	
	public function setCodmotcamcar($v)
	{

    if ($this->codmotcamcar !== $v) {
        $this->codmotcamcar = $v;
        $this->modifiedColumns[] = NpasicarempPeer::CODMOTCAMCAR;
      }
  
	} 
	
	public function setCodtie($v)
	{

    if ($this->codtie !== $v) {
        $this->codtie = $v;
        $this->modifiedColumns[] = NpasicarempPeer::CODTIE;
      }
  
	} 
	
	public function setJuscam($v)
	{

    if ($this->juscam !== $v) {
        $this->juscam = $v;
        $this->modifiedColumns[] = NpasicarempPeer::JUSCAM;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpasicarempPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->codcar = $rs->getString($startcol + 1);

      $this->codnom = $rs->getString($startcol + 2);

      $this->codcat = $rs->getString($startcol + 3);

      $this->fecasi = $rs->getDate($startcol + 4, null);

      $this->nomemp = $rs->getString($startcol + 5);

      $this->nomcar = $rs->getString($startcol + 6);

      $this->nomnom = $rs->getString($startcol + 7);

      $this->nomcat = $rs->getString($startcol + 8);

      $this->unieje = $rs->getString($startcol + 9);

      $this->sueldo = $rs->getFloat($startcol + 10);

      $this->status = $rs->getString($startcol + 11);

      $this->nronom = $rs->getString($startcol + 12);

      $this->montonomina = $rs->getFloat($startcol + 13);

      $this->codtip = $rs->getString($startcol + 14);

      $this->codtipgas = $rs->getString($startcol + 15);

      $this->codniv = $rs->getString($startcol + 16);

      $this->grado = $rs->getString($startcol + 17);

      $this->paso = $rs->getString($startcol + 18);

      $this->codtipded = $rs->getString($startcol + 19);

      $this->codtipcat = $rs->getString($startcol + 20);

      $this->codmotcamcar = $rs->getString($startcol + 21);

      $this->codtie = $rs->getString($startcol + 22);

      $this->juscam = $rs->getString($startcol + 23);

      $this->id = $rs->getInt($startcol + 24);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 25; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npasicaremp object", $e);
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
			$con = Propel::getConnection(NpasicarempPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpasicarempPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpasicarempPeer::DATABASE_NAME);
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
					$pk = NpasicarempPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpasicarempPeer::doUpdate($this, $con);
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


			if (($retval = NpasicarempPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpasicarempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getCodcar();
				break;
			case 2:
				return $this->getCodnom();
				break;
			case 3:
				return $this->getCodcat();
				break;
			case 4:
				return $this->getFecasi();
				break;
			case 5:
				return $this->getNomemp();
				break;
			case 6:
				return $this->getNomcar();
				break;
			case 7:
				return $this->getNomnom();
				break;
			case 8:
				return $this->getNomcat();
				break;
			case 9:
				return $this->getUnieje();
				break;
			case 10:
				return $this->getSueldo();
				break;
			case 11:
				return $this->getStatus();
				break;
			case 12:
				return $this->getNronom();
				break;
			case 13:
				return $this->getMontonomina();
				break;
			case 14:
				return $this->getCodtip();
				break;
			case 15:
				return $this->getCodtipgas();
				break;
			case 16:
				return $this->getCodniv();
				break;
			case 17:
				return $this->getGrado();
				break;
			case 18:
				return $this->getPaso();
				break;
			case 19:
				return $this->getCodtipded();
				break;
			case 20:
				return $this->getCodtipcat();
				break;
			case 21:
				return $this->getCodmotcamcar();
				break;
			case 22:
				return $this->getCodtie();
				break;
			case 23:
				return $this->getJuscam();
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
		$keys = NpasicarempPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getCodcar(),
			$keys[2] => $this->getCodnom(),
			$keys[3] => $this->getCodcat(),
			$keys[4] => $this->getFecasi(),
			$keys[5] => $this->getNomemp(),
			$keys[6] => $this->getNomcar(),
			$keys[7] => $this->getNomnom(),
			$keys[8] => $this->getNomcat(),
			$keys[9] => $this->getUnieje(),
			$keys[10] => $this->getSueldo(),
			$keys[11] => $this->getStatus(),
			$keys[12] => $this->getNronom(),
			$keys[13] => $this->getMontonomina(),
			$keys[14] => $this->getCodtip(),
			$keys[15] => $this->getCodtipgas(),
			$keys[16] => $this->getCodniv(),
			$keys[17] => $this->getGrado(),
			$keys[18] => $this->getPaso(),
			$keys[19] => $this->getCodtipded(),
			$keys[20] => $this->getCodtipcat(),
			$keys[21] => $this->getCodmotcamcar(),
			$keys[22] => $this->getCodtie(),
			$keys[23] => $this->getJuscam(),
			$keys[24] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpasicarempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setCodcar($value);
				break;
			case 2:
				$this->setCodnom($value);
				break;
			case 3:
				$this->setCodcat($value);
				break;
			case 4:
				$this->setFecasi($value);
				break;
			case 5:
				$this->setNomemp($value);
				break;
			case 6:
				$this->setNomcar($value);
				break;
			case 7:
				$this->setNomnom($value);
				break;
			case 8:
				$this->setNomcat($value);
				break;
			case 9:
				$this->setUnieje($value);
				break;
			case 10:
				$this->setSueldo($value);
				break;
			case 11:
				$this->setStatus($value);
				break;
			case 12:
				$this->setNronom($value);
				break;
			case 13:
				$this->setMontonomina($value);
				break;
			case 14:
				$this->setCodtip($value);
				break;
			case 15:
				$this->setCodtipgas($value);
				break;
			case 16:
				$this->setCodniv($value);
				break;
			case 17:
				$this->setGrado($value);
				break;
			case 18:
				$this->setPaso($value);
				break;
			case 19:
				$this->setCodtipded($value);
				break;
			case 20:
				$this->setCodtipcat($value);
				break;
			case 21:
				$this->setCodmotcamcar($value);
				break;
			case 22:
				$this->setCodtie($value);
				break;
			case 23:
				$this->setJuscam($value);
				break;
			case 24:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpasicarempPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodnom($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodcat($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecasi($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNomemp($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNomcar($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNomnom($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNomcat($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUnieje($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setSueldo($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setStatus($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setNronom($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setMontonomina($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCodtip($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCodtipgas($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCodniv($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setGrado($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setPaso($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCodtipded($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCodtipcat($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setCodmotcamcar($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setCodtie($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setJuscam($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setId($arr[$keys[24]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpasicarempPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpasicarempPeer::CODEMP)) $criteria->add(NpasicarempPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpasicarempPeer::CODCAR)) $criteria->add(NpasicarempPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(NpasicarempPeer::CODNOM)) $criteria->add(NpasicarempPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpasicarempPeer::CODCAT)) $criteria->add(NpasicarempPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(NpasicarempPeer::FECASI)) $criteria->add(NpasicarempPeer::FECASI, $this->fecasi);
		if ($this->isColumnModified(NpasicarempPeer::NOMEMP)) $criteria->add(NpasicarempPeer::NOMEMP, $this->nomemp);
		if ($this->isColumnModified(NpasicarempPeer::NOMCAR)) $criteria->add(NpasicarempPeer::NOMCAR, $this->nomcar);
		if ($this->isColumnModified(NpasicarempPeer::NOMNOM)) $criteria->add(NpasicarempPeer::NOMNOM, $this->nomnom);
		if ($this->isColumnModified(NpasicarempPeer::NOMCAT)) $criteria->add(NpasicarempPeer::NOMCAT, $this->nomcat);
		if ($this->isColumnModified(NpasicarempPeer::UNIEJE)) $criteria->add(NpasicarempPeer::UNIEJE, $this->unieje);
		if ($this->isColumnModified(NpasicarempPeer::SUELDO)) $criteria->add(NpasicarempPeer::SUELDO, $this->sueldo);
		if ($this->isColumnModified(NpasicarempPeer::STATUS)) $criteria->add(NpasicarempPeer::STATUS, $this->status);
		if ($this->isColumnModified(NpasicarempPeer::NRONOM)) $criteria->add(NpasicarempPeer::NRONOM, $this->nronom);
		if ($this->isColumnModified(NpasicarempPeer::MONTONOMINA)) $criteria->add(NpasicarempPeer::MONTONOMINA, $this->montonomina);
		if ($this->isColumnModified(NpasicarempPeer::CODTIP)) $criteria->add(NpasicarempPeer::CODTIP, $this->codtip);
		if ($this->isColumnModified(NpasicarempPeer::CODTIPGAS)) $criteria->add(NpasicarempPeer::CODTIPGAS, $this->codtipgas);
		if ($this->isColumnModified(NpasicarempPeer::CODNIV)) $criteria->add(NpasicarempPeer::CODNIV, $this->codniv);
		if ($this->isColumnModified(NpasicarempPeer::GRADO)) $criteria->add(NpasicarempPeer::GRADO, $this->grado);
		if ($this->isColumnModified(NpasicarempPeer::PASO)) $criteria->add(NpasicarempPeer::PASO, $this->paso);
		if ($this->isColumnModified(NpasicarempPeer::CODTIPDED)) $criteria->add(NpasicarempPeer::CODTIPDED, $this->codtipded);
		if ($this->isColumnModified(NpasicarempPeer::CODTIPCAT)) $criteria->add(NpasicarempPeer::CODTIPCAT, $this->codtipcat);
		if ($this->isColumnModified(NpasicarempPeer::CODMOTCAMCAR)) $criteria->add(NpasicarempPeer::CODMOTCAMCAR, $this->codmotcamcar);
		if ($this->isColumnModified(NpasicarempPeer::CODTIE)) $criteria->add(NpasicarempPeer::CODTIE, $this->codtie);
		if ($this->isColumnModified(NpasicarempPeer::JUSCAM)) $criteria->add(NpasicarempPeer::JUSCAM, $this->juscam);
		if ($this->isColumnModified(NpasicarempPeer::ID)) $criteria->add(NpasicarempPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpasicarempPeer::DATABASE_NAME);

		$criteria->add(NpasicarempPeer::ID, $this->id);

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

		$copyObj->setCodcar($this->codcar);

		$copyObj->setCodnom($this->codnom);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setFecasi($this->fecasi);

		$copyObj->setNomemp($this->nomemp);

		$copyObj->setNomcar($this->nomcar);

		$copyObj->setNomnom($this->nomnom);

		$copyObj->setNomcat($this->nomcat);

		$copyObj->setUnieje($this->unieje);

		$copyObj->setSueldo($this->sueldo);

		$copyObj->setStatus($this->status);

		$copyObj->setNronom($this->nronom);

		$copyObj->setMontonomina($this->montonomina);

		$copyObj->setCodtip($this->codtip);

		$copyObj->setCodtipgas($this->codtipgas);

		$copyObj->setCodniv($this->codniv);

		$copyObj->setGrado($this->grado);

		$copyObj->setPaso($this->paso);

		$copyObj->setCodtipded($this->codtipded);

		$copyObj->setCodtipcat($this->codtipcat);

		$copyObj->setCodmotcamcar($this->codmotcamcar);

		$copyObj->setCodtie($this->codtie);

		$copyObj->setJuscam($this->juscam);


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
			self::$peer = new NpasicarempPeer();
		}
		return self::$peer;
	}

} 
