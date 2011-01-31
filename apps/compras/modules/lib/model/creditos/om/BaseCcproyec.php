<?php


abstract class BaseCcproyec extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nompro;


	
	protected $respro;


	
	protected $empdirgen;


	
	protected $empindgen;


	
	protected $aregeo;


	
	protected $monapo;


	
	protected $desacteco;


	
	protected $introd;


	
	protected $resume;


	
	protected $estmer;


	
	protected $tamloc;


	
	protected $ingpro;


	
	protected $aposoc;


	
	protected $invfin;


	
	protected $profin;


	
	protected $anafin;


	
	protected $anexos;


	
	protected $recome;


	
	protected $observ;


	
	protected $ccacteco_id;


	
	protected $ccsolici_id;

	
	protected $aCcacteco;

	
	protected $aCcsolici;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNompro()
  {

    return trim($this->nompro);

  }
  
  public function getRespro()
  {

    return trim($this->respro);

  }
  
  public function getEmpdirgen()
  {

    return $this->empdirgen;

  }
  
  public function getEmpindgen()
  {

    return $this->empindgen;

  }
  
  public function getAregeo()
  {

    return trim($this->aregeo);

  }
  
  public function getMonapo($val=false)
  {

    if($val) return number_format($this->monapo,2,',','.');
    else return $this->monapo;

  }
  
  public function getDesacteco()
  {

    return trim($this->desacteco);

  }
  
  public function getIntrod()
  {

    return trim($this->introd);

  }
  
  public function getResume()
  {

    return trim($this->resume);

  }
  
  public function getEstmer()
  {

    return trim($this->estmer);

  }
  
  public function getTamloc()
  {

    return trim($this->tamloc);

  }
  
  public function getIngpro()
  {

    return trim($this->ingpro);

  }
  
  public function getAposoc()
  {

    return trim($this->aposoc);

  }
  
  public function getInvfin()
  {

    return trim($this->invfin);

  }
  
  public function getProfin()
  {

    return trim($this->profin);

  }
  
  public function getAnafin()
  {

    return trim($this->anafin);

  }
  
  public function getAnexos()
  {

    return trim($this->anexos);

  }
  
  public function getRecome()
  {

    return trim($this->recome);

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getCcactecoId()
  {

    return $this->ccacteco_id;

  }
  
  public function getCcsoliciId()
  {

    return $this->ccsolici_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcproyecPeer::ID;
      }
  
	} 
	
	public function setNompro($v)
	{

    if ($this->nompro !== $v) {
        $this->nompro = $v;
        $this->modifiedColumns[] = CcproyecPeer::NOMPRO;
      }
  
	} 
	
	public function setRespro($v)
	{

    if ($this->respro !== $v) {
        $this->respro = $v;
        $this->modifiedColumns[] = CcproyecPeer::RESPRO;
      }
  
	} 
	
	public function setEmpdirgen($v)
	{

    if ($this->empdirgen !== $v) {
        $this->empdirgen = $v;
        $this->modifiedColumns[] = CcproyecPeer::EMPDIRGEN;
      }
  
	} 
	
	public function setEmpindgen($v)
	{

    if ($this->empindgen !== $v) {
        $this->empindgen = $v;
        $this->modifiedColumns[] = CcproyecPeer::EMPINDGEN;
      }
  
	} 
	
	public function setAregeo($v)
	{

    if ($this->aregeo !== $v) {
        $this->aregeo = $v;
        $this->modifiedColumns[] = CcproyecPeer::AREGEO;
      }
  
	} 
	
	public function setMonapo($v)
	{

    if ($this->monapo !== $v) {
        $this->monapo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcproyecPeer::MONAPO;
      }
  
	} 
	
	public function setDesacteco($v)
	{

    if ($this->desacteco !== $v) {
        $this->desacteco = $v;
        $this->modifiedColumns[] = CcproyecPeer::DESACTECO;
      }
  
	} 
	
	public function setIntrod($v)
	{

    if ($this->introd !== $v) {
        $this->introd = $v;
        $this->modifiedColumns[] = CcproyecPeer::INTROD;
      }
  
	} 
	
	public function setResume($v)
	{

    if ($this->resume !== $v) {
        $this->resume = $v;
        $this->modifiedColumns[] = CcproyecPeer::RESUME;
      }
  
	} 
	
	public function setEstmer($v)
	{

    if ($this->estmer !== $v) {
        $this->estmer = $v;
        $this->modifiedColumns[] = CcproyecPeer::ESTMER;
      }
  
	} 
	
	public function setTamloc($v)
	{

    if ($this->tamloc !== $v) {
        $this->tamloc = $v;
        $this->modifiedColumns[] = CcproyecPeer::TAMLOC;
      }
  
	} 
	
	public function setIngpro($v)
	{

    if ($this->ingpro !== $v) {
        $this->ingpro = $v;
        $this->modifiedColumns[] = CcproyecPeer::INGPRO;
      }
  
	} 
	
	public function setAposoc($v)
	{

    if ($this->aposoc !== $v) {
        $this->aposoc = $v;
        $this->modifiedColumns[] = CcproyecPeer::APOSOC;
      }
  
	} 
	
	public function setInvfin($v)
	{

    if ($this->invfin !== $v) {
        $this->invfin = $v;
        $this->modifiedColumns[] = CcproyecPeer::INVFIN;
      }
  
	} 
	
	public function setProfin($v)
	{

    if ($this->profin !== $v) {
        $this->profin = $v;
        $this->modifiedColumns[] = CcproyecPeer::PROFIN;
      }
  
	} 
	
	public function setAnafin($v)
	{

    if ($this->anafin !== $v) {
        $this->anafin = $v;
        $this->modifiedColumns[] = CcproyecPeer::ANAFIN;
      }
  
	} 
	
	public function setAnexos($v)
	{

    if ($this->anexos !== $v) {
        $this->anexos = $v;
        $this->modifiedColumns[] = CcproyecPeer::ANEXOS;
      }
  
	} 
	
	public function setRecome($v)
	{

    if ($this->recome !== $v) {
        $this->recome = $v;
        $this->modifiedColumns[] = CcproyecPeer::RECOME;
      }
  
	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = CcproyecPeer::OBSERV;
      }
  
	} 
	
	public function setCcactecoId($v)
	{

    if ($this->ccacteco_id !== $v) {
        $this->ccacteco_id = $v;
        $this->modifiedColumns[] = CcproyecPeer::CCACTECO_ID;
      }
  
		if ($this->aCcacteco !== null && $this->aCcacteco->getId() !== $v) {
			$this->aCcacteco = null;
		}

	} 
	
	public function setCcsoliciId($v)
	{

    if ($this->ccsolici_id !== $v) {
        $this->ccsolici_id = $v;
        $this->modifiedColumns[] = CcproyecPeer::CCSOLICI_ID;
      }
  
		if ($this->aCcsolici !== null && $this->aCcsolici->getId() !== $v) {
			$this->aCcsolici = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nompro = $rs->getString($startcol + 1);

      $this->respro = $rs->getString($startcol + 2);

      $this->empdirgen = $rs->getInt($startcol + 3);

      $this->empindgen = $rs->getInt($startcol + 4);

      $this->aregeo = $rs->getString($startcol + 5);

      $this->monapo = $rs->getFloat($startcol + 6);

      $this->desacteco = $rs->getString($startcol + 7);

      $this->introd = $rs->getString($startcol + 8);

      $this->resume = $rs->getString($startcol + 9);

      $this->estmer = $rs->getString($startcol + 10);

      $this->tamloc = $rs->getString($startcol + 11);

      $this->ingpro = $rs->getString($startcol + 12);

      $this->aposoc = $rs->getString($startcol + 13);

      $this->invfin = $rs->getString($startcol + 14);

      $this->profin = $rs->getString($startcol + 15);

      $this->anafin = $rs->getString($startcol + 16);

      $this->anexos = $rs->getString($startcol + 17);

      $this->recome = $rs->getString($startcol + 18);

      $this->observ = $rs->getString($startcol + 19);

      $this->ccacteco_id = $rs->getInt($startcol + 20);

      $this->ccsolici_id = $rs->getInt($startcol + 21);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 22; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccproyec object", $e);
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
			$con = Propel::getConnection(CcproyecPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcproyecPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcproyecPeer::DATABASE_NAME);
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


												
			if ($this->aCcacteco !== null) {
				if ($this->aCcacteco->isModified()) {
					$affectedRows += $this->aCcacteco->save($con);
				}
				$this->setCcacteco($this->aCcacteco);
			}

			if ($this->aCcsolici !== null) {
				if ($this->aCcsolici->isModified()) {
					$affectedRows += $this->aCcsolici->save($con);
				}
				$this->setCcsolici($this->aCcsolici);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcproyecPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcproyecPeer::doUpdate($this, $con);
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


												
			if ($this->aCcacteco !== null) {
				if (!$this->aCcacteco->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcacteco->getValidationFailures());
				}
			}

			if ($this->aCcsolici !== null) {
				if (!$this->aCcsolici->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcsolici->getValidationFailures());
				}
			}


			if (($retval = CcproyecPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcproyecPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNompro();
				break;
			case 2:
				return $this->getRespro();
				break;
			case 3:
				return $this->getEmpdirgen();
				break;
			case 4:
				return $this->getEmpindgen();
				break;
			case 5:
				return $this->getAregeo();
				break;
			case 6:
				return $this->getMonapo();
				break;
			case 7:
				return $this->getDesacteco();
				break;
			case 8:
				return $this->getIntrod();
				break;
			case 9:
				return $this->getResume();
				break;
			case 10:
				return $this->getEstmer();
				break;
			case 11:
				return $this->getTamloc();
				break;
			case 12:
				return $this->getIngpro();
				break;
			case 13:
				return $this->getAposoc();
				break;
			case 14:
				return $this->getInvfin();
				break;
			case 15:
				return $this->getProfin();
				break;
			case 16:
				return $this->getAnafin();
				break;
			case 17:
				return $this->getAnexos();
				break;
			case 18:
				return $this->getRecome();
				break;
			case 19:
				return $this->getObserv();
				break;
			case 20:
				return $this->getCcactecoId();
				break;
			case 21:
				return $this->getCcsoliciId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcproyecPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNompro(),
			$keys[2] => $this->getRespro(),
			$keys[3] => $this->getEmpdirgen(),
			$keys[4] => $this->getEmpindgen(),
			$keys[5] => $this->getAregeo(),
			$keys[6] => $this->getMonapo(),
			$keys[7] => $this->getDesacteco(),
			$keys[8] => $this->getIntrod(),
			$keys[9] => $this->getResume(),
			$keys[10] => $this->getEstmer(),
			$keys[11] => $this->getTamloc(),
			$keys[12] => $this->getIngpro(),
			$keys[13] => $this->getAposoc(),
			$keys[14] => $this->getInvfin(),
			$keys[15] => $this->getProfin(),
			$keys[16] => $this->getAnafin(),
			$keys[17] => $this->getAnexos(),
			$keys[18] => $this->getRecome(),
			$keys[19] => $this->getObserv(),
			$keys[20] => $this->getCcactecoId(),
			$keys[21] => $this->getCcsoliciId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcproyecPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNompro($value);
				break;
			case 2:
				$this->setRespro($value);
				break;
			case 3:
				$this->setEmpdirgen($value);
				break;
			case 4:
				$this->setEmpindgen($value);
				break;
			case 5:
				$this->setAregeo($value);
				break;
			case 6:
				$this->setMonapo($value);
				break;
			case 7:
				$this->setDesacteco($value);
				break;
			case 8:
				$this->setIntrod($value);
				break;
			case 9:
				$this->setResume($value);
				break;
			case 10:
				$this->setEstmer($value);
				break;
			case 11:
				$this->setTamloc($value);
				break;
			case 12:
				$this->setIngpro($value);
				break;
			case 13:
				$this->setAposoc($value);
				break;
			case 14:
				$this->setInvfin($value);
				break;
			case 15:
				$this->setProfin($value);
				break;
			case 16:
				$this->setAnafin($value);
				break;
			case 17:
				$this->setAnexos($value);
				break;
			case 18:
				$this->setRecome($value);
				break;
			case 19:
				$this->setObserv($value);
				break;
			case 20:
				$this->setCcactecoId($value);
				break;
			case 21:
				$this->setCcsoliciId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcproyecPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNompro($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRespro($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEmpdirgen($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEmpindgen($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAregeo($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonapo($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDesacteco($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setIntrod($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setResume($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setEstmer($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setTamloc($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setIngpro($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setAposoc($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setInvfin($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setProfin($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setAnafin($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setAnexos($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setRecome($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setObserv($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCcactecoId($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setCcsoliciId($arr[$keys[21]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcproyecPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcproyecPeer::ID)) $criteria->add(CcproyecPeer::ID, $this->id);
		if ($this->isColumnModified(CcproyecPeer::NOMPRO)) $criteria->add(CcproyecPeer::NOMPRO, $this->nompro);
		if ($this->isColumnModified(CcproyecPeer::RESPRO)) $criteria->add(CcproyecPeer::RESPRO, $this->respro);
		if ($this->isColumnModified(CcproyecPeer::EMPDIRGEN)) $criteria->add(CcproyecPeer::EMPDIRGEN, $this->empdirgen);
		if ($this->isColumnModified(CcproyecPeer::EMPINDGEN)) $criteria->add(CcproyecPeer::EMPINDGEN, $this->empindgen);
		if ($this->isColumnModified(CcproyecPeer::AREGEO)) $criteria->add(CcproyecPeer::AREGEO, $this->aregeo);
		if ($this->isColumnModified(CcproyecPeer::MONAPO)) $criteria->add(CcproyecPeer::MONAPO, $this->monapo);
		if ($this->isColumnModified(CcproyecPeer::DESACTECO)) $criteria->add(CcproyecPeer::DESACTECO, $this->desacteco);
		if ($this->isColumnModified(CcproyecPeer::INTROD)) $criteria->add(CcproyecPeer::INTROD, $this->introd);
		if ($this->isColumnModified(CcproyecPeer::RESUME)) $criteria->add(CcproyecPeer::RESUME, $this->resume);
		if ($this->isColumnModified(CcproyecPeer::ESTMER)) $criteria->add(CcproyecPeer::ESTMER, $this->estmer);
		if ($this->isColumnModified(CcproyecPeer::TAMLOC)) $criteria->add(CcproyecPeer::TAMLOC, $this->tamloc);
		if ($this->isColumnModified(CcproyecPeer::INGPRO)) $criteria->add(CcproyecPeer::INGPRO, $this->ingpro);
		if ($this->isColumnModified(CcproyecPeer::APOSOC)) $criteria->add(CcproyecPeer::APOSOC, $this->aposoc);
		if ($this->isColumnModified(CcproyecPeer::INVFIN)) $criteria->add(CcproyecPeer::INVFIN, $this->invfin);
		if ($this->isColumnModified(CcproyecPeer::PROFIN)) $criteria->add(CcproyecPeer::PROFIN, $this->profin);
		if ($this->isColumnModified(CcproyecPeer::ANAFIN)) $criteria->add(CcproyecPeer::ANAFIN, $this->anafin);
		if ($this->isColumnModified(CcproyecPeer::ANEXOS)) $criteria->add(CcproyecPeer::ANEXOS, $this->anexos);
		if ($this->isColumnModified(CcproyecPeer::RECOME)) $criteria->add(CcproyecPeer::RECOME, $this->recome);
		if ($this->isColumnModified(CcproyecPeer::OBSERV)) $criteria->add(CcproyecPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(CcproyecPeer::CCACTECO_ID)) $criteria->add(CcproyecPeer::CCACTECO_ID, $this->ccacteco_id);
		if ($this->isColumnModified(CcproyecPeer::CCSOLICI_ID)) $criteria->add(CcproyecPeer::CCSOLICI_ID, $this->ccsolici_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcproyecPeer::DATABASE_NAME);

		$criteria->add(CcproyecPeer::ID, $this->id);

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

		$copyObj->setNompro($this->nompro);

		$copyObj->setRespro($this->respro);

		$copyObj->setEmpdirgen($this->empdirgen);

		$copyObj->setEmpindgen($this->empindgen);

		$copyObj->setAregeo($this->aregeo);

		$copyObj->setMonapo($this->monapo);

		$copyObj->setDesacteco($this->desacteco);

		$copyObj->setIntrod($this->introd);

		$copyObj->setResume($this->resume);

		$copyObj->setEstmer($this->estmer);

		$copyObj->setTamloc($this->tamloc);

		$copyObj->setIngpro($this->ingpro);

		$copyObj->setAposoc($this->aposoc);

		$copyObj->setInvfin($this->invfin);

		$copyObj->setProfin($this->profin);

		$copyObj->setAnafin($this->anafin);

		$copyObj->setAnexos($this->anexos);

		$copyObj->setRecome($this->recome);

		$copyObj->setObserv($this->observ);

		$copyObj->setCcactecoId($this->ccacteco_id);

		$copyObj->setCcsoliciId($this->ccsolici_id);


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
			self::$peer = new CcproyecPeer();
		}
		return self::$peer;
	}

	
	public function setCcacteco($v)
	{


		if ($v === null) {
			$this->setCcactecoId(NULL);
		} else {
			$this->setCcactecoId($v->getId());
		}


		$this->aCcacteco = $v;
	}


	
	public function getCcacteco($con = null)
	{
		if ($this->aCcacteco === null && ($this->ccacteco_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcactecoPeer.php';

      $c = new Criteria();
      $c->add(CcactecoPeer::ID,$this->ccacteco_id);
      
			$this->aCcacteco = CcactecoPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcacteco;
	}

	
	public function setCcsolici($v)
	{


		if ($v === null) {
			$this->setCcsoliciId(NULL);
		} else {
			$this->setCcsoliciId($v->getId());
		}


		$this->aCcsolici = $v;
	}


	
	public function getCcsolici($con = null)
	{
		if ($this->aCcsolici === null && ($this->ccsolici_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';

      $c = new Criteria();
      $c->add(CcsoliciPeer::ID,$this->ccsolici_id);
      
			$this->aCcsolici = CcsoliciPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcsolici;
	}

} 