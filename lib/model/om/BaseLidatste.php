<?php


abstract class BaseLidatste extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coduniste;


	
	protected $desuniste;


	
	protected $litipste_id;


	
	protected $dirste;


	
	protected $telste;


	
	protected $faxste;


	
	protected $emaste;


	
	protected $codemp;


	
	protected $codpai;


	
	protected $codedo;


	
	protected $codmun;


	
	protected $codpar;


	
	protected $codsec;


	
	protected $id;

	
	protected $aLitipste;

	
	protected $collLiregsols;

	
	protected $lastLiregsolCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCoduniste()
  {

    return trim($this->coduniste);

  }
  
  public function getDesuniste()
  {

    return trim($this->desuniste);

  }
  
  public function getLitipsteId()
  {

    return $this->litipste_id;

  }
  
  public function getDirste()
  {

    return trim($this->dirste);

  }
  
  public function getTelste()
  {

    return trim($this->telste);

  }
  
  public function getFaxste()
  {

    return trim($this->faxste);

  }
  
  public function getEmaste()
  {

    return trim($this->emaste);

  }
  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getCodpai()
  {

    return trim($this->codpai);

  }
  
  public function getCodedo()
  {

    return trim($this->codedo);

  }
  
  public function getCodmun()
  {

    return trim($this->codmun);

  }
  
  public function getCodpar()
  {

    return trim($this->codpar);

  }
  
  public function getCodsec()
  {

    return trim($this->codsec);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCoduniste($v)
	{

    if ($this->coduniste !== $v) {
        $this->coduniste = $v;
        $this->modifiedColumns[] = LidatstePeer::CODUNISTE;
      }
  
	} 
	
	public function setDesuniste($v)
	{

    if ($this->desuniste !== $v) {
        $this->desuniste = $v;
        $this->modifiedColumns[] = LidatstePeer::DESUNISTE;
      }
  
	} 
	
	public function setLitipsteId($v)
	{

    if ($this->litipste_id !== $v) {
        $this->litipste_id = $v;
        $this->modifiedColumns[] = LidatstePeer::LITIPSTE_ID;
      }
  
		if ($this->aLitipste !== null && $this->aLitipste->getId() !== $v) {
			$this->aLitipste = null;
		}

	} 
	
	public function setDirste($v)
	{

    if ($this->dirste !== $v) {
        $this->dirste = $v;
        $this->modifiedColumns[] = LidatstePeer::DIRSTE;
      }
  
	} 
	
	public function setTelste($v)
	{

    if ($this->telste !== $v) {
        $this->telste = $v;
        $this->modifiedColumns[] = LidatstePeer::TELSTE;
      }
  
	} 
	
	public function setFaxste($v)
	{

    if ($this->faxste !== $v) {
        $this->faxste = $v;
        $this->modifiedColumns[] = LidatstePeer::FAXSTE;
      }
  
	} 
	
	public function setEmaste($v)
	{

    if ($this->emaste !== $v) {
        $this->emaste = $v;
        $this->modifiedColumns[] = LidatstePeer::EMASTE;
      }
  
	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = LidatstePeer::CODEMP;
      }
  
	} 
	
	public function setCodpai($v)
	{

    if ($this->codpai !== $v) {
        $this->codpai = $v;
        $this->modifiedColumns[] = LidatstePeer::CODPAI;
      }
  
	} 
	
	public function setCodedo($v)
	{

    if ($this->codedo !== $v) {
        $this->codedo = $v;
        $this->modifiedColumns[] = LidatstePeer::CODEDO;
      }
  
	} 
	
	public function setCodmun($v)
	{

    if ($this->codmun !== $v) {
        $this->codmun = $v;
        $this->modifiedColumns[] = LidatstePeer::CODMUN;
      }
  
	} 
	
	public function setCodpar($v)
	{

    if ($this->codpar !== $v) {
        $this->codpar = $v;
        $this->modifiedColumns[] = LidatstePeer::CODPAR;
      }
  
	} 
	
	public function setCodsec($v)
	{

    if ($this->codsec !== $v) {
        $this->codsec = $v;
        $this->modifiedColumns[] = LidatstePeer::CODSEC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LidatstePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->coduniste = $rs->getString($startcol + 0);

      $this->desuniste = $rs->getString($startcol + 1);

      $this->litipste_id = $rs->getInt($startcol + 2);

      $this->dirste = $rs->getString($startcol + 3);

      $this->telste = $rs->getString($startcol + 4);

      $this->faxste = $rs->getString($startcol + 5);

      $this->emaste = $rs->getString($startcol + 6);

      $this->codemp = $rs->getString($startcol + 7);

      $this->codpai = $rs->getString($startcol + 8);

      $this->codedo = $rs->getString($startcol + 9);

      $this->codmun = $rs->getString($startcol + 10);

      $this->codpar = $rs->getString($startcol + 11);

      $this->codsec = $rs->getString($startcol + 12);

      $this->id = $rs->getInt($startcol + 13);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 14; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Lidatste object", $e);
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
			$con = Propel::getConnection(LidatstePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LidatstePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LidatstePeer::DATABASE_NAME);
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


												
			if ($this->aLitipste !== null) {
				if ($this->aLitipste->isModified()) {
					$affectedRows += $this->aLitipste->save($con);
				}
				$this->setLitipste($this->aLitipste);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LidatstePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LidatstePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collLiregsols !== null) {
				foreach($this->collLiregsols as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


												
			if ($this->aLitipste !== null) {
				if (!$this->aLitipste->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLitipste->getValidationFailures());
				}
			}


			if (($retval = LidatstePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLiregsols !== null) {
					foreach($this->collLiregsols as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LidatstePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoduniste();
				break;
			case 1:
				return $this->getDesuniste();
				break;
			case 2:
				return $this->getLitipsteId();
				break;
			case 3:
				return $this->getDirste();
				break;
			case 4:
				return $this->getTelste();
				break;
			case 5:
				return $this->getFaxste();
				break;
			case 6:
				return $this->getEmaste();
				break;
			case 7:
				return $this->getCodemp();
				break;
			case 8:
				return $this->getCodpai();
				break;
			case 9:
				return $this->getCodedo();
				break;
			case 10:
				return $this->getCodmun();
				break;
			case 11:
				return $this->getCodpar();
				break;
			case 12:
				return $this->getCodsec();
				break;
			case 13:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LidatstePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoduniste(),
			$keys[1] => $this->getDesuniste(),
			$keys[2] => $this->getLitipsteId(),
			$keys[3] => $this->getDirste(),
			$keys[4] => $this->getTelste(),
			$keys[5] => $this->getFaxste(),
			$keys[6] => $this->getEmaste(),
			$keys[7] => $this->getCodemp(),
			$keys[8] => $this->getCodpai(),
			$keys[9] => $this->getCodedo(),
			$keys[10] => $this->getCodmun(),
			$keys[11] => $this->getCodpar(),
			$keys[12] => $this->getCodsec(),
			$keys[13] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LidatstePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoduniste($value);
				break;
			case 1:
				$this->setDesuniste($value);
				break;
			case 2:
				$this->setLitipsteId($value);
				break;
			case 3:
				$this->setDirste($value);
				break;
			case 4:
				$this->setTelste($value);
				break;
			case 5:
				$this->setFaxste($value);
				break;
			case 6:
				$this->setEmaste($value);
				break;
			case 7:
				$this->setCodemp($value);
				break;
			case 8:
				$this->setCodpai($value);
				break;
			case 9:
				$this->setCodedo($value);
				break;
			case 10:
				$this->setCodmun($value);
				break;
			case 11:
				$this->setCodpar($value);
				break;
			case 12:
				$this->setCodsec($value);
				break;
			case 13:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LidatstePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoduniste($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesuniste($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setLitipsteId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDirste($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTelste($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFaxste($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setEmaste($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodemp($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodpai($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodedo($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodmun($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCodpar($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCodsec($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LidatstePeer::DATABASE_NAME);

		if ($this->isColumnModified(LidatstePeer::CODUNISTE)) $criteria->add(LidatstePeer::CODUNISTE, $this->coduniste);
		if ($this->isColumnModified(LidatstePeer::DESUNISTE)) $criteria->add(LidatstePeer::DESUNISTE, $this->desuniste);
		if ($this->isColumnModified(LidatstePeer::LITIPSTE_ID)) $criteria->add(LidatstePeer::LITIPSTE_ID, $this->litipste_id);
		if ($this->isColumnModified(LidatstePeer::DIRSTE)) $criteria->add(LidatstePeer::DIRSTE, $this->dirste);
		if ($this->isColumnModified(LidatstePeer::TELSTE)) $criteria->add(LidatstePeer::TELSTE, $this->telste);
		if ($this->isColumnModified(LidatstePeer::FAXSTE)) $criteria->add(LidatstePeer::FAXSTE, $this->faxste);
		if ($this->isColumnModified(LidatstePeer::EMASTE)) $criteria->add(LidatstePeer::EMASTE, $this->emaste);
		if ($this->isColumnModified(LidatstePeer::CODEMP)) $criteria->add(LidatstePeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(LidatstePeer::CODPAI)) $criteria->add(LidatstePeer::CODPAI, $this->codpai);
		if ($this->isColumnModified(LidatstePeer::CODEDO)) $criteria->add(LidatstePeer::CODEDO, $this->codedo);
		if ($this->isColumnModified(LidatstePeer::CODMUN)) $criteria->add(LidatstePeer::CODMUN, $this->codmun);
		if ($this->isColumnModified(LidatstePeer::CODPAR)) $criteria->add(LidatstePeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(LidatstePeer::CODSEC)) $criteria->add(LidatstePeer::CODSEC, $this->codsec);
		if ($this->isColumnModified(LidatstePeer::ID)) $criteria->add(LidatstePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LidatstePeer::DATABASE_NAME);

		$criteria->add(LidatstePeer::ID, $this->id);

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

		$copyObj->setCoduniste($this->coduniste);

		$copyObj->setDesuniste($this->desuniste);

		$copyObj->setLitipsteId($this->litipste_id);

		$copyObj->setDirste($this->dirste);

		$copyObj->setTelste($this->telste);

		$copyObj->setFaxste($this->faxste);

		$copyObj->setEmaste($this->emaste);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setCodpai($this->codpai);

		$copyObj->setCodedo($this->codedo);

		$copyObj->setCodmun($this->codmun);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setCodsec($this->codsec);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getLiregsols() as $relObj) {
				$copyObj->addLiregsol($relObj->copy($deepCopy));
			}

		} 

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
			self::$peer = new LidatstePeer();
		}
		return self::$peer;
	}

	
	public function setLitipste($v)
	{


		if ($v === null) {
			$this->setLitipsteId(NULL);
		} else {
			$this->setLitipsteId($v->getId());
		}


		$this->aLitipste = $v;
	}


	
	public function getLitipste($con = null)
	{
		if ($this->aLitipste === null && ($this->litipste_id !== null)) {
						include_once 'lib/model/om/BaseLitipstePeer.php';

			$this->aLitipste = LitipstePeer::retrieveByPK($this->litipste_id, $con);

			
		}
		return $this->aLitipste;
	}

	
	public function initLiregsols()
	{
		if ($this->collLiregsols === null) {
			$this->collLiregsols = array();
		}
	}

	
	public function getLiregsols($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLiregsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiregsols === null) {
			if ($this->isNew()) {
			   $this->collLiregsols = array();
			} else {

				$criteria->add(LiregsolPeer::LIDATSTE_ID, $this->getId());

				LiregsolPeer::addSelectColumns($criteria);
				$this->collLiregsols = LiregsolPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiregsolPeer::LIDATSTE_ID, $this->getId());

				LiregsolPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiregsolCriteria) || !$this->lastLiregsolCriteria->equals($criteria)) {
					$this->collLiregsols = LiregsolPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiregsolCriteria = $criteria;
		return $this->collLiregsols;
	}

	
	public function countLiregsols($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLiregsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiregsolPeer::LIDATSTE_ID, $this->getId());

		return LiregsolPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiregsol(Liregsol $l)
	{
		$this->collLiregsols[] = $l;
		$l->setLidatste($this);
	}


	
	public function getLiregsolsJoinLitipsol($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLiregsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiregsols === null) {
			if ($this->isNew()) {
				$this->collLiregsols = array();
			} else {

				$criteria->add(LiregsolPeer::LIDATSTE_ID, $this->getId());

				$this->collLiregsols = LiregsolPeer::doSelectJoinLitipsol($criteria, $con);
			}
		} else {
									
			$criteria->add(LiregsolPeer::LIDATSTE_ID, $this->getId());

			if (!isset($this->lastLiregsolCriteria) || !$this->lastLiregsolCriteria->equals($criteria)) {
				$this->collLiregsols = LiregsolPeer::doSelectJoinLitipsol($criteria, $con);
			}
		}
		$this->lastLiregsolCriteria = $criteria;

		return $this->collLiregsols;
	}


	
	public function getLiregsolsJoinLicomlic($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLiregsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiregsols === null) {
			if ($this->isNew()) {
				$this->collLiregsols = array();
			} else {

				$criteria->add(LiregsolPeer::LIDATSTE_ID, $this->getId());

				$this->collLiregsols = LiregsolPeer::doSelectJoinLicomlic($criteria, $con);
			}
		} else {
									
			$criteria->add(LiregsolPeer::LIDATSTE_ID, $this->getId());

			if (!isset($this->lastLiregsolCriteria) || !$this->lastLiregsolCriteria->equals($criteria)) {
				$this->collLiregsols = LiregsolPeer::doSelectJoinLicomlic($criteria, $con);
			}
		}
		$this->lastLiregsolCriteria = $criteria;

		return $this->collLiregsols;
	}

} 