<?php


abstract class BaseLisolegr extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numsol;


	
	protected $numpre;


	
	protected $codempadm;


	
	protected $coduniadm;


	
	protected $codempeje;


	
	protected $coduniste;


	
	protected $despro;


	
	protected $monsol;


	
	protected $codmon;


	
	protected $valcam;


	
	protected $feccam;


	
	protected $docane1;


	
	protected $docane2;


	
	protected $docane3;


	
	protected $status;


	
	protected $lisicact_id;


	
	protected $detdecmod;


	
	protected $prepor;


	
	protected $cargopre;


	
	protected $aprpor;


	
	protected $cargoapr;


	
	protected $id;

	
	protected $aLisicact;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumsol()
  {

    return trim($this->numsol);

  }
  
  public function getNumpre()
  {

    return trim($this->numpre);

  }
  
  public function getCodempadm()
  {

    return trim($this->codempadm);

  }
  
  public function getCoduniadm()
  {

    return trim($this->coduniadm);

  }
  
  public function getCodempeje()
  {

    return trim($this->codempeje);

  }
  
  public function getCoduniste()
  {

    return trim($this->coduniste);

  }
  
  public function getDespro()
  {

    return trim($this->despro);

  }
  
  public function getMonsol($val=false)
  {

    if($val) return number_format($this->monsol,2,',','.');
    else return $this->monsol;

  }
  
  public function getCodmon()
  {

    return trim($this->codmon);

  }
  
  public function getValcam($val=false)
  {

    if($val) return number_format($this->valcam,2,',','.');
    else return $this->valcam;

  }
  
  public function getFeccam($format = 'Y-m-d H:i:s')
  {

    if ($this->feccam === null || $this->feccam === '') {
      return null;
    } elseif (!is_int($this->feccam)) {
            $ts = strtotime($this->feccam);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccam] as date/time value: " . var_export($this->feccam, true));
      }
    } else {
      $ts = $this->feccam;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return strftime($format, $ts);
    } else {
      return date($format, $ts);
    }
  }

  
  public function getDocane1()
  {

    return trim($this->docane1);

  }
  
  public function getDocane2()
  {

    return trim($this->docane2);

  }
  
  public function getDocane3()
  {

    return trim($this->docane3);

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getLisicactId()
  {

    return $this->lisicact_id;

  }
  
  public function getDetdecmod()
  {

    return trim($this->detdecmod);

  }
  
  public function getPrepor()
  {

    return trim($this->prepor);

  }
  
  public function getCargopre()
  {

    return trim($this->cargopre);

  }
  
  public function getAprpor()
  {

    return trim($this->aprpor);

  }
  
  public function getCargoapr()
  {

    return trim($this->cargoapr);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumsol($v)
	{

    if ($this->numsol !== $v) {
        $this->numsol = $v;
        $this->modifiedColumns[] = LisolegrPeer::NUMSOL;
      }
  
	} 
	
	public function setNumpre($v)
	{

    if ($this->numpre !== $v) {
        $this->numpre = $v;
        $this->modifiedColumns[] = LisolegrPeer::NUMPRE;
      }
  
	} 
	
	public function setCodempadm($v)
	{

    if ($this->codempadm !== $v) {
        $this->codempadm = $v;
        $this->modifiedColumns[] = LisolegrPeer::CODEMPADM;
      }
  
	} 
	
	public function setCoduniadm($v)
	{

    if ($this->coduniadm !== $v) {
        $this->coduniadm = $v;
        $this->modifiedColumns[] = LisolegrPeer::CODUNIADM;
      }
  
	} 
	
	public function setCodempeje($v)
	{

    if ($this->codempeje !== $v) {
        $this->codempeje = $v;
        $this->modifiedColumns[] = LisolegrPeer::CODEMPEJE;
      }
  
	} 
	
	public function setCoduniste($v)
	{

    if ($this->coduniste !== $v) {
        $this->coduniste = $v;
        $this->modifiedColumns[] = LisolegrPeer::CODUNISTE;
      }
  
	} 
	
	public function setDespro($v)
	{

    if ($this->despro !== $v) {
        $this->despro = $v;
        $this->modifiedColumns[] = LisolegrPeer::DESPRO;
      }
  
	} 
	
	public function setMonsol($v)
	{

    if ($this->monsol !== $v) {
        $this->monsol = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LisolegrPeer::MONSOL;
      }
  
	} 
	
	public function setCodmon($v)
	{

    if ($this->codmon !== $v) {
        $this->codmon = $v;
        $this->modifiedColumns[] = LisolegrPeer::CODMON;
      }
  
	} 
	
	public function setValcam($v)
	{

    if ($this->valcam !== $v) {
        $this->valcam = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LisolegrPeer::VALCAM;
      }
  
	} 
	
	public function setFeccam($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccam] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccam !== $ts) {
      $this->feccam = $ts;
      $this->modifiedColumns[] = LisolegrPeer::FECCAM;
    }

	} 
	
	public function setDocane1($v)
	{

    if ($this->docane1 !== $v) {
        $this->docane1 = $v;
        $this->modifiedColumns[] = LisolegrPeer::DOCANE1;
      }
  
	} 
	
	public function setDocane2($v)
	{

    if ($this->docane2 !== $v) {
        $this->docane2 = $v;
        $this->modifiedColumns[] = LisolegrPeer::DOCANE2;
      }
  
	} 
	
	public function setDocane3($v)
	{

    if ($this->docane3 !== $v) {
        $this->docane3 = $v;
        $this->modifiedColumns[] = LisolegrPeer::DOCANE3;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = LisolegrPeer::STATUS;
      }
  
	} 
	
	public function setLisicactId($v)
	{

    if ($this->lisicact_id !== $v) {
        $this->lisicact_id = $v;
        $this->modifiedColumns[] = LisolegrPeer::LISICACT_ID;
      }
  
		if ($this->aLisicact !== null && $this->aLisicact->getId() !== $v) {
			$this->aLisicact = null;
		}

	} 
	
	public function setDetdecmod($v)
	{

    if ($this->detdecmod !== $v) {
        $this->detdecmod = $v;
        $this->modifiedColumns[] = LisolegrPeer::DETDECMOD;
      }
  
	} 
	
	public function setPrepor($v)
	{

    if ($this->prepor !== $v) {
        $this->prepor = $v;
        $this->modifiedColumns[] = LisolegrPeer::PREPOR;
      }
  
	} 
	
	public function setCargopre($v)
	{

    if ($this->cargopre !== $v) {
        $this->cargopre = $v;
        $this->modifiedColumns[] = LisolegrPeer::CARGOPRE;
      }
  
	} 
	
	public function setAprpor($v)
	{

    if ($this->aprpor !== $v) {
        $this->aprpor = $v;
        $this->modifiedColumns[] = LisolegrPeer::APRPOR;
      }
  
	} 
	
	public function setCargoapr($v)
	{

    if ($this->cargoapr !== $v) {
        $this->cargoapr = $v;
        $this->modifiedColumns[] = LisolegrPeer::CARGOAPR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LisolegrPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numsol = $rs->getString($startcol + 0);

      $this->numpre = $rs->getString($startcol + 1);

      $this->codempadm = $rs->getString($startcol + 2);

      $this->coduniadm = $rs->getString($startcol + 3);

      $this->codempeje = $rs->getString($startcol + 4);

      $this->coduniste = $rs->getString($startcol + 5);

      $this->despro = $rs->getString($startcol + 6);

      $this->monsol = $rs->getFloat($startcol + 7);

      $this->codmon = $rs->getString($startcol + 8);

      $this->valcam = $rs->getFloat($startcol + 9);

      $this->feccam = $rs->getTimestamp($startcol + 10, null);

      $this->docane1 = $rs->getString($startcol + 11);

      $this->docane2 = $rs->getString($startcol + 12);

      $this->docane3 = $rs->getString($startcol + 13);

      $this->status = $rs->getString($startcol + 14);

      $this->lisicact_id = $rs->getInt($startcol + 15);

      $this->detdecmod = $rs->getString($startcol + 16);

      $this->prepor = $rs->getString($startcol + 17);

      $this->cargopre = $rs->getString($startcol + 18);

      $this->aprpor = $rs->getString($startcol + 19);

      $this->cargoapr = $rs->getString($startcol + 20);

      $this->id = $rs->getInt($startcol + 21);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 22; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Lisolegr object", $e);
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
			$con = Propel::getConnection(LisolegrPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LisolegrPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LisolegrPeer::DATABASE_NAME);
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


												
			if ($this->aLisicact !== null) {
				if ($this->aLisicact->isModified()) {
					$affectedRows += $this->aLisicact->save($con);
				}
				$this->setLisicact($this->aLisicact);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LisolegrPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LisolegrPeer::doUpdate($this, $con);
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


												
			if ($this->aLisicact !== null) {
				if (!$this->aLisicact->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLisicact->getValidationFailures());
				}
			}


			if (($retval = LisolegrPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LisolegrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumsol();
				break;
			case 1:
				return $this->getNumpre();
				break;
			case 2:
				return $this->getCodempadm();
				break;
			case 3:
				return $this->getCoduniadm();
				break;
			case 4:
				return $this->getCodempeje();
				break;
			case 5:
				return $this->getCoduniste();
				break;
			case 6:
				return $this->getDespro();
				break;
			case 7:
				return $this->getMonsol();
				break;
			case 8:
				return $this->getCodmon();
				break;
			case 9:
				return $this->getValcam();
				break;
			case 10:
				return $this->getFeccam();
				break;
			case 11:
				return $this->getDocane1();
				break;
			case 12:
				return $this->getDocane2();
				break;
			case 13:
				return $this->getDocane3();
				break;
			case 14:
				return $this->getStatus();
				break;
			case 15:
				return $this->getLisicactId();
				break;
			case 16:
				return $this->getDetdecmod();
				break;
			case 17:
				return $this->getPrepor();
				break;
			case 18:
				return $this->getCargopre();
				break;
			case 19:
				return $this->getAprpor();
				break;
			case 20:
				return $this->getCargoapr();
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
		$keys = LisolegrPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumsol(),
			$keys[1] => $this->getNumpre(),
			$keys[2] => $this->getCodempadm(),
			$keys[3] => $this->getCoduniadm(),
			$keys[4] => $this->getCodempeje(),
			$keys[5] => $this->getCoduniste(),
			$keys[6] => $this->getDespro(),
			$keys[7] => $this->getMonsol(),
			$keys[8] => $this->getCodmon(),
			$keys[9] => $this->getValcam(),
			$keys[10] => $this->getFeccam(),
			$keys[11] => $this->getDocane1(),
			$keys[12] => $this->getDocane2(),
			$keys[13] => $this->getDocane3(),
			$keys[14] => $this->getStatus(),
			$keys[15] => $this->getLisicactId(),
			$keys[16] => $this->getDetdecmod(),
			$keys[17] => $this->getPrepor(),
			$keys[18] => $this->getCargopre(),
			$keys[19] => $this->getAprpor(),
			$keys[20] => $this->getCargoapr(),
			$keys[21] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LisolegrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumsol($value);
				break;
			case 1:
				$this->setNumpre($value);
				break;
			case 2:
				$this->setCodempadm($value);
				break;
			case 3:
				$this->setCoduniadm($value);
				break;
			case 4:
				$this->setCodempeje($value);
				break;
			case 5:
				$this->setCoduniste($value);
				break;
			case 6:
				$this->setDespro($value);
				break;
			case 7:
				$this->setMonsol($value);
				break;
			case 8:
				$this->setCodmon($value);
				break;
			case 9:
				$this->setValcam($value);
				break;
			case 10:
				$this->setFeccam($value);
				break;
			case 11:
				$this->setDocane1($value);
				break;
			case 12:
				$this->setDocane2($value);
				break;
			case 13:
				$this->setDocane3($value);
				break;
			case 14:
				$this->setStatus($value);
				break;
			case 15:
				$this->setLisicactId($value);
				break;
			case 16:
				$this->setDetdecmod($value);
				break;
			case 17:
				$this->setPrepor($value);
				break;
			case 18:
				$this->setCargopre($value);
				break;
			case 19:
				$this->setAprpor($value);
				break;
			case 20:
				$this->setCargoapr($value);
				break;
			case 21:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LisolegrPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumsol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumpre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodempadm($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCoduniadm($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodempeje($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCoduniste($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDespro($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMonsol($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodmon($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setValcam($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFeccam($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setDocane1($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDocane2($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setDocane3($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setStatus($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setLisicactId($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setDetdecmod($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setPrepor($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCargopre($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setAprpor($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCargoapr($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setId($arr[$keys[21]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LisolegrPeer::DATABASE_NAME);

		if ($this->isColumnModified(LisolegrPeer::NUMSOL)) $criteria->add(LisolegrPeer::NUMSOL, $this->numsol);
		if ($this->isColumnModified(LisolegrPeer::NUMPRE)) $criteria->add(LisolegrPeer::NUMPRE, $this->numpre);
		if ($this->isColumnModified(LisolegrPeer::CODEMPADM)) $criteria->add(LisolegrPeer::CODEMPADM, $this->codempadm);
		if ($this->isColumnModified(LisolegrPeer::CODUNIADM)) $criteria->add(LisolegrPeer::CODUNIADM, $this->coduniadm);
		if ($this->isColumnModified(LisolegrPeer::CODEMPEJE)) $criteria->add(LisolegrPeer::CODEMPEJE, $this->codempeje);
		if ($this->isColumnModified(LisolegrPeer::CODUNISTE)) $criteria->add(LisolegrPeer::CODUNISTE, $this->coduniste);
		if ($this->isColumnModified(LisolegrPeer::DESPRO)) $criteria->add(LisolegrPeer::DESPRO, $this->despro);
		if ($this->isColumnModified(LisolegrPeer::MONSOL)) $criteria->add(LisolegrPeer::MONSOL, $this->monsol);
		if ($this->isColumnModified(LisolegrPeer::CODMON)) $criteria->add(LisolegrPeer::CODMON, $this->codmon);
		if ($this->isColumnModified(LisolegrPeer::VALCAM)) $criteria->add(LisolegrPeer::VALCAM, $this->valcam);
		if ($this->isColumnModified(LisolegrPeer::FECCAM)) $criteria->add(LisolegrPeer::FECCAM, $this->feccam);
		if ($this->isColumnModified(LisolegrPeer::DOCANE1)) $criteria->add(LisolegrPeer::DOCANE1, $this->docane1);
		if ($this->isColumnModified(LisolegrPeer::DOCANE2)) $criteria->add(LisolegrPeer::DOCANE2, $this->docane2);
		if ($this->isColumnModified(LisolegrPeer::DOCANE3)) $criteria->add(LisolegrPeer::DOCANE3, $this->docane3);
		if ($this->isColumnModified(LisolegrPeer::STATUS)) $criteria->add(LisolegrPeer::STATUS, $this->status);
		if ($this->isColumnModified(LisolegrPeer::LISICACT_ID)) $criteria->add(LisolegrPeer::LISICACT_ID, $this->lisicact_id);
		if ($this->isColumnModified(LisolegrPeer::DETDECMOD)) $criteria->add(LisolegrPeer::DETDECMOD, $this->detdecmod);
		if ($this->isColumnModified(LisolegrPeer::PREPOR)) $criteria->add(LisolegrPeer::PREPOR, $this->prepor);
		if ($this->isColumnModified(LisolegrPeer::CARGOPRE)) $criteria->add(LisolegrPeer::CARGOPRE, $this->cargopre);
		if ($this->isColumnModified(LisolegrPeer::APRPOR)) $criteria->add(LisolegrPeer::APRPOR, $this->aprpor);
		if ($this->isColumnModified(LisolegrPeer::CARGOAPR)) $criteria->add(LisolegrPeer::CARGOAPR, $this->cargoapr);
		if ($this->isColumnModified(LisolegrPeer::ID)) $criteria->add(LisolegrPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LisolegrPeer::DATABASE_NAME);

		$criteria->add(LisolegrPeer::ID, $this->id);

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

		$copyObj->setNumpre($this->numpre);

		$copyObj->setCodempadm($this->codempadm);

		$copyObj->setCoduniadm($this->coduniadm);

		$copyObj->setCodempeje($this->codempeje);

		$copyObj->setCoduniste($this->coduniste);

		$copyObj->setDespro($this->despro);

		$copyObj->setMonsol($this->monsol);

		$copyObj->setCodmon($this->codmon);

		$copyObj->setValcam($this->valcam);

		$copyObj->setFeccam($this->feccam);

		$copyObj->setDocane1($this->docane1);

		$copyObj->setDocane2($this->docane2);

		$copyObj->setDocane3($this->docane3);

		$copyObj->setStatus($this->status);

		$copyObj->setLisicactId($this->lisicact_id);

		$copyObj->setDetdecmod($this->detdecmod);

		$copyObj->setPrepor($this->prepor);

		$copyObj->setCargopre($this->cargopre);

		$copyObj->setAprpor($this->aprpor);

		$copyObj->setCargoapr($this->cargoapr);


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
			self::$peer = new LisolegrPeer();
		}
		return self::$peer;
	}

	
	public function setLisicact($v)
	{


		if ($v === null) {
			$this->setLisicactId(NULL);
		} else {
			$this->setLisicactId($v->getId());
		}


		$this->aLisicact = $v;
	}


	
	public function getLisicact($con = null)
	{
		if ($this->aLisicact === null && ($this->lisicact_id !== null)) {
						include_once 'lib/model/om/BaseLisicactPeer.php';

      $c = new Criteria();
      $c->add(LisicactPeer::ID,$this->lisicact_id);
      
			$this->aLisicact = LisicactPeer::doSelectOne($c, $con);

			
		}
		return $this->aLisicact;
	}

} 