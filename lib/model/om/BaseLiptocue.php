<?php


abstract class BaseLiptocue extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numptocue;


	
	protected $numemo;


	
	protected $numpre;


	
	protected $codempadm;


	
	protected $coduniadm;


	
	protected $codempeje;


	
	protected $coduniste;


	
	protected $despro;


	
	protected $docane1;


	
	protected $docane2;


	
	protected $docane3;


	
	protected $prepor;


	
	protected $preporcar;


	
	protected $lisicact_id;


	
	protected $detdecmod;


	
	protected $anapor;


	
	protected $anaporcar;


	
	protected $status;


	
	protected $id;

	
	protected $aLisicact;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumptocue()
  {

    return trim($this->numptocue);

  }
  
  public function getNumemo()
  {

    return trim($this->numemo);

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
  
  public function getPrepor()
  {

    return trim($this->prepor);

  }
  
  public function getPreporcar()
  {

    return trim($this->preporcar);

  }
  
  public function getLisicactId()
  {

    return $this->lisicact_id;

  }
  
  public function getDetdecmod()
  {

    return trim($this->detdecmod);

  }
  
  public function getAnapor()
  {

    return trim($this->anapor);

  }
  
  public function getAnaporcar()
  {

    return trim($this->anaporcar);

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumptocue($v)
	{

    if ($this->numptocue !== $v) {
        $this->numptocue = $v;
        $this->modifiedColumns[] = LiptocuePeer::NUMPTOCUE;
      }
  
	} 
	
	public function setNumemo($v)
	{

    if ($this->numemo !== $v) {
        $this->numemo = $v;
        $this->modifiedColumns[] = LiptocuePeer::NUMEMO;
      }
  
	} 
	
	public function setNumpre($v)
	{

    if ($this->numpre !== $v) {
        $this->numpre = $v;
        $this->modifiedColumns[] = LiptocuePeer::NUMPRE;
      }
  
	} 
	
	public function setCodempadm($v)
	{

    if ($this->codempadm !== $v) {
        $this->codempadm = $v;
        $this->modifiedColumns[] = LiptocuePeer::CODEMPADM;
      }
  
	} 
	
	public function setCoduniadm($v)
	{

    if ($this->coduniadm !== $v) {
        $this->coduniadm = $v;
        $this->modifiedColumns[] = LiptocuePeer::CODUNIADM;
      }
  
	} 
	
	public function setCodempeje($v)
	{

    if ($this->codempeje !== $v) {
        $this->codempeje = $v;
        $this->modifiedColumns[] = LiptocuePeer::CODEMPEJE;
      }
  
	} 
	
	public function setCoduniste($v)
	{

    if ($this->coduniste !== $v) {
        $this->coduniste = $v;
        $this->modifiedColumns[] = LiptocuePeer::CODUNISTE;
      }
  
	} 
	
	public function setDespro($v)
	{

    if ($this->despro !== $v) {
        $this->despro = $v;
        $this->modifiedColumns[] = LiptocuePeer::DESPRO;
      }
  
	} 
	
	public function setDocane1($v)
	{

    if ($this->docane1 !== $v) {
        $this->docane1 = $v;
        $this->modifiedColumns[] = LiptocuePeer::DOCANE1;
      }
  
	} 
	
	public function setDocane2($v)
	{

    if ($this->docane2 !== $v) {
        $this->docane2 = $v;
        $this->modifiedColumns[] = LiptocuePeer::DOCANE2;
      }
  
	} 
	
	public function setDocane3($v)
	{

    if ($this->docane3 !== $v) {
        $this->docane3 = $v;
        $this->modifiedColumns[] = LiptocuePeer::DOCANE3;
      }
  
	} 
	
	public function setPrepor($v)
	{

    if ($this->prepor !== $v) {
        $this->prepor = $v;
        $this->modifiedColumns[] = LiptocuePeer::PREPOR;
      }
  
	} 
	
	public function setPreporcar($v)
	{

    if ($this->preporcar !== $v) {
        $this->preporcar = $v;
        $this->modifiedColumns[] = LiptocuePeer::PREPORCAR;
      }
  
	} 
	
	public function setLisicactId($v)
	{

    if ($this->lisicact_id !== $v) {
        $this->lisicact_id = $v;
        $this->modifiedColumns[] = LiptocuePeer::LISICACT_ID;
      }
  
		if ($this->aLisicact !== null && $this->aLisicact->getId() !== $v) {
			$this->aLisicact = null;
		}

	} 
	
	public function setDetdecmod($v)
	{

    if ($this->detdecmod !== $v) {
        $this->detdecmod = $v;
        $this->modifiedColumns[] = LiptocuePeer::DETDECMOD;
      }
  
	} 
	
	public function setAnapor($v)
	{

    if ($this->anapor !== $v) {
        $this->anapor = $v;
        $this->modifiedColumns[] = LiptocuePeer::ANAPOR;
      }
  
	} 
	
	public function setAnaporcar($v)
	{

    if ($this->anaporcar !== $v) {
        $this->anaporcar = $v;
        $this->modifiedColumns[] = LiptocuePeer::ANAPORCAR;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = LiptocuePeer::STATUS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LiptocuePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numptocue = $rs->getString($startcol + 0);

      $this->numemo = $rs->getString($startcol + 1);

      $this->numpre = $rs->getString($startcol + 2);

      $this->codempadm = $rs->getString($startcol + 3);

      $this->coduniadm = $rs->getString($startcol + 4);

      $this->codempeje = $rs->getString($startcol + 5);

      $this->coduniste = $rs->getString($startcol + 6);

      $this->despro = $rs->getString($startcol + 7);

      $this->docane1 = $rs->getString($startcol + 8);

      $this->docane2 = $rs->getString($startcol + 9);

      $this->docane3 = $rs->getString($startcol + 10);

      $this->prepor = $rs->getString($startcol + 11);

      $this->preporcar = $rs->getString($startcol + 12);

      $this->lisicact_id = $rs->getInt($startcol + 13);

      $this->detdecmod = $rs->getString($startcol + 14);

      $this->anapor = $rs->getString($startcol + 15);

      $this->anaporcar = $rs->getString($startcol + 16);

      $this->status = $rs->getString($startcol + 17);

      $this->id = $rs->getInt($startcol + 18);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 19; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Liptocue object", $e);
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
			$con = Propel::getConnection(LiptocuePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LiptocuePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LiptocuePeer::DATABASE_NAME);
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
					$pk = LiptocuePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LiptocuePeer::doUpdate($this, $con);
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


			if (($retval = LiptocuePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiptocuePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumptocue();
				break;
			case 1:
				return $this->getNumemo();
				break;
			case 2:
				return $this->getNumpre();
				break;
			case 3:
				return $this->getCodempadm();
				break;
			case 4:
				return $this->getCoduniadm();
				break;
			case 5:
				return $this->getCodempeje();
				break;
			case 6:
				return $this->getCoduniste();
				break;
			case 7:
				return $this->getDespro();
				break;
			case 8:
				return $this->getDocane1();
				break;
			case 9:
				return $this->getDocane2();
				break;
			case 10:
				return $this->getDocane3();
				break;
			case 11:
				return $this->getPrepor();
				break;
			case 12:
				return $this->getPreporcar();
				break;
			case 13:
				return $this->getLisicactId();
				break;
			case 14:
				return $this->getDetdecmod();
				break;
			case 15:
				return $this->getAnapor();
				break;
			case 16:
				return $this->getAnaporcar();
				break;
			case 17:
				return $this->getStatus();
				break;
			case 18:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiptocuePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumptocue(),
			$keys[1] => $this->getNumemo(),
			$keys[2] => $this->getNumpre(),
			$keys[3] => $this->getCodempadm(),
			$keys[4] => $this->getCoduniadm(),
			$keys[5] => $this->getCodempeje(),
			$keys[6] => $this->getCoduniste(),
			$keys[7] => $this->getDespro(),
			$keys[8] => $this->getDocane1(),
			$keys[9] => $this->getDocane2(),
			$keys[10] => $this->getDocane3(),
			$keys[11] => $this->getPrepor(),
			$keys[12] => $this->getPreporcar(),
			$keys[13] => $this->getLisicactId(),
			$keys[14] => $this->getDetdecmod(),
			$keys[15] => $this->getAnapor(),
			$keys[16] => $this->getAnaporcar(),
			$keys[17] => $this->getStatus(),
			$keys[18] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiptocuePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumptocue($value);
				break;
			case 1:
				$this->setNumemo($value);
				break;
			case 2:
				$this->setNumpre($value);
				break;
			case 3:
				$this->setCodempadm($value);
				break;
			case 4:
				$this->setCoduniadm($value);
				break;
			case 5:
				$this->setCodempeje($value);
				break;
			case 6:
				$this->setCoduniste($value);
				break;
			case 7:
				$this->setDespro($value);
				break;
			case 8:
				$this->setDocane1($value);
				break;
			case 9:
				$this->setDocane2($value);
				break;
			case 10:
				$this->setDocane3($value);
				break;
			case 11:
				$this->setPrepor($value);
				break;
			case 12:
				$this->setPreporcar($value);
				break;
			case 13:
				$this->setLisicactId($value);
				break;
			case 14:
				$this->setDetdecmod($value);
				break;
			case 15:
				$this->setAnapor($value);
				break;
			case 16:
				$this->setAnaporcar($value);
				break;
			case 17:
				$this->setStatus($value);
				break;
			case 18:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiptocuePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumptocue($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumemo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumpre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodempadm($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCoduniadm($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodempeje($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCoduniste($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDespro($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDocane1($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDocane2($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDocane3($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setPrepor($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setPreporcar($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setLisicactId($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setDetdecmod($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setAnapor($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setAnaporcar($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setStatus($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setId($arr[$keys[18]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LiptocuePeer::DATABASE_NAME);

		if ($this->isColumnModified(LiptocuePeer::NUMPTOCUE)) $criteria->add(LiptocuePeer::NUMPTOCUE, $this->numptocue);
		if ($this->isColumnModified(LiptocuePeer::NUMEMO)) $criteria->add(LiptocuePeer::NUMEMO, $this->numemo);
		if ($this->isColumnModified(LiptocuePeer::NUMPRE)) $criteria->add(LiptocuePeer::NUMPRE, $this->numpre);
		if ($this->isColumnModified(LiptocuePeer::CODEMPADM)) $criteria->add(LiptocuePeer::CODEMPADM, $this->codempadm);
		if ($this->isColumnModified(LiptocuePeer::CODUNIADM)) $criteria->add(LiptocuePeer::CODUNIADM, $this->coduniadm);
		if ($this->isColumnModified(LiptocuePeer::CODEMPEJE)) $criteria->add(LiptocuePeer::CODEMPEJE, $this->codempeje);
		if ($this->isColumnModified(LiptocuePeer::CODUNISTE)) $criteria->add(LiptocuePeer::CODUNISTE, $this->coduniste);
		if ($this->isColumnModified(LiptocuePeer::DESPRO)) $criteria->add(LiptocuePeer::DESPRO, $this->despro);
		if ($this->isColumnModified(LiptocuePeer::DOCANE1)) $criteria->add(LiptocuePeer::DOCANE1, $this->docane1);
		if ($this->isColumnModified(LiptocuePeer::DOCANE2)) $criteria->add(LiptocuePeer::DOCANE2, $this->docane2);
		if ($this->isColumnModified(LiptocuePeer::DOCANE3)) $criteria->add(LiptocuePeer::DOCANE3, $this->docane3);
		if ($this->isColumnModified(LiptocuePeer::PREPOR)) $criteria->add(LiptocuePeer::PREPOR, $this->prepor);
		if ($this->isColumnModified(LiptocuePeer::PREPORCAR)) $criteria->add(LiptocuePeer::PREPORCAR, $this->preporcar);
		if ($this->isColumnModified(LiptocuePeer::LISICACT_ID)) $criteria->add(LiptocuePeer::LISICACT_ID, $this->lisicact_id);
		if ($this->isColumnModified(LiptocuePeer::DETDECMOD)) $criteria->add(LiptocuePeer::DETDECMOD, $this->detdecmod);
		if ($this->isColumnModified(LiptocuePeer::ANAPOR)) $criteria->add(LiptocuePeer::ANAPOR, $this->anapor);
		if ($this->isColumnModified(LiptocuePeer::ANAPORCAR)) $criteria->add(LiptocuePeer::ANAPORCAR, $this->anaporcar);
		if ($this->isColumnModified(LiptocuePeer::STATUS)) $criteria->add(LiptocuePeer::STATUS, $this->status);
		if ($this->isColumnModified(LiptocuePeer::ID)) $criteria->add(LiptocuePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LiptocuePeer::DATABASE_NAME);

		$criteria->add(LiptocuePeer::ID, $this->id);

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

		$copyObj->setNumptocue($this->numptocue);

		$copyObj->setNumemo($this->numemo);

		$copyObj->setNumpre($this->numpre);

		$copyObj->setCodempadm($this->codempadm);

		$copyObj->setCoduniadm($this->coduniadm);

		$copyObj->setCodempeje($this->codempeje);

		$copyObj->setCoduniste($this->coduniste);

		$copyObj->setDespro($this->despro);

		$copyObj->setDocane1($this->docane1);

		$copyObj->setDocane2($this->docane2);

		$copyObj->setDocane3($this->docane3);

		$copyObj->setPrepor($this->prepor);

		$copyObj->setPreporcar($this->preporcar);

		$copyObj->setLisicactId($this->lisicact_id);

		$copyObj->setDetdecmod($this->detdecmod);

		$copyObj->setAnapor($this->anapor);

		$copyObj->setAnaporcar($this->anaporcar);

		$copyObj->setStatus($this->status);


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
			self::$peer = new LiptocuePeer();
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