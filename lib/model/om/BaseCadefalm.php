<?php


abstract class BaseCadefalm extends BaseObject  implements Persistent {



	protected static $peer;



	protected $codalm;



	protected $nomalm;



	protected $codcat;



	protected $codtip;



	protected $catipalm_id;



	protected $diralm;



	protected $codalt;



	protected $codedo;



	protected $esptoven;


	
	protected $codtippv;


	
	protected $id;


	protected $aCatipalmRelatedByCodtip;


	protected $aCatipalmRelatedByCatipalmId;


	protected $alreadyInSave = false;


	protected $alreadyInValidation = false;


  public function getCodalm()
  {

    return trim($this->codalm);

  }

  public function getNomalm()
  {

    return trim($this->nomalm);

  }

  public function getCodcat()
  {

    return trim($this->codcat);

  }

  public function getCodtip()
  {

    return $this->codtip;

  }

  public function getCatipalmId()
  {

    return $this->catipalm_id;

  }

  public function getDiralm()
  {

    return trim($this->diralm);

  }

  public function getCodalt()
  {

    return trim($this->codalt);

  }

  public function getCodedo()
  {

    return trim($this->codedo);

  }

  public function getEsptoven()
  {

    return $this->esptoven;

  }
  
  public function getCodtippv()
  {

    return trim($this->codtippv);

  }
  
  public function getId()
  {

    return $this->id;

  }

	public function setCodalm($v)
	{

    if ($this->codalm !== $v) {
        $this->codalm = $v;
        $this->modifiedColumns[] = CadefalmPeer::CODALM;
      }

	}

	public function setNomalm($v)
	{

    if ($this->nomalm !== $v) {
        $this->nomalm = $v;
        $this->modifiedColumns[] = CadefalmPeer::NOMALM;
      }

	}

	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = CadefalmPeer::CODCAT;
      }

	}

	public function setCodtip($v)
	{

    if ($this->codtip !== $v) {
        $this->codtip = $v;
        $this->modifiedColumns[] = CadefalmPeer::CODTIP;
      }

		if ($this->aCatipalmRelatedByCodtip !== null && $this->aCatipalmRelatedByCodtip->getId() !== $v) {
			$this->aCatipalmRelatedByCodtip = null;
		}

	}

	public function setCatipalmId($v)
	{

    if ($this->catipalm_id !== $v) {
        $this->catipalm_id = $v;
        $this->modifiedColumns[] = CadefalmPeer::CATIPALM_ID;
      }

		if ($this->aCatipalmRelatedByCatipalmId !== null && $this->aCatipalmRelatedByCatipalmId->getId() !== $v) {
			$this->aCatipalmRelatedByCatipalmId = null;
		}

	}

	public function setDiralm($v)
	{

    if ($this->diralm !== $v) {
        $this->diralm = $v;
        $this->modifiedColumns[] = CadefalmPeer::DIRALM;
      }

	}

	public function setCodalt($v)
	{

    if ($this->codalt !== $v) {
        $this->codalt = $v;
        $this->modifiedColumns[] = CadefalmPeer::CODALT;
      }

	}

	public function setCodedo($v)
	{

    if ($this->codedo !== $v) {
        $this->codedo = $v;
        $this->modifiedColumns[] = CadefalmPeer::CODEDO;
      }

	}

	public function setEsptoven($v)
	{

    if ($this->esptoven !== $v) {
        $this->esptoven = $v;
        $this->modifiedColumns[] = CadefalmPeer::ESPTOVEN;
      }
  
	} 
	
	public function setCodtippv($v)
	{

    if ($this->codtippv !== $v) {
        $this->codtippv = $v;
        $this->modifiedColumns[] = CadefalmPeer::CODTIPPV;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CadefalmPeer::ID;
      }

	}

  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codalm = $rs->getString($startcol + 0);

      $this->nomalm = $rs->getString($startcol + 1);

      $this->codcat = $rs->getString($startcol + 2);

      $this->codtip = $rs->getInt($startcol + 3);

      $this->catipalm_id = $rs->getInt($startcol + 4);

      $this->diralm = $rs->getString($startcol + 5);

      $this->codalt = $rs->getString($startcol + 6);

      $this->codedo = $rs->getString($startcol + 7);

      $this->esptoven = $rs->getBoolean($startcol + 8);

      $this->codtippv = $rs->getString($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cadefalm object", $e);
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
			$con = Propel::getConnection(CadefalmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CadefalmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CadefalmPeer::DATABASE_NAME);
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



			if ($this->aCatipalmRelatedByCodtip !== null) {
				if ($this->aCatipalmRelatedByCodtip->isModified()) {
					$affectedRows += $this->aCatipalmRelatedByCodtip->save($con);
				}
				$this->setCatipalmRelatedByCodtip($this->aCatipalmRelatedByCodtip);
			}

			if ($this->aCatipalmRelatedByCatipalmId !== null) {
				if ($this->aCatipalmRelatedByCatipalmId->isModified()) {
					$affectedRows += $this->aCatipalmRelatedByCatipalmId->save($con);
				}
				$this->setCatipalmRelatedByCatipalmId($this->aCatipalmRelatedByCatipalmId);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CadefalmPeer::doInsert($this, $con);
					$affectedRows += 1;
					$this->setId($pk);
					$this->setNew(false);
				} else {
					$affectedRows += CadefalmPeer::doUpdate($this, $con);
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



			if ($this->aCatipalmRelatedByCodtip !== null) {
				if (!$this->aCatipalmRelatedByCodtip->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatipalmRelatedByCodtip->getValidationFailures());
				}
			}

			if ($this->aCatipalmRelatedByCatipalmId !== null) {
				if (!$this->aCatipalmRelatedByCatipalmId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatipalmRelatedByCatipalmId->getValidationFailures());
				}
			}


			if (($retval = CadefalmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}


	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadefalmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}


	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodalm();
				break;
			case 1:
				return $this->getNomalm();
				break;
			case 2:
				return $this->getCodcat();
				break;
			case 3:
				return $this->getCodtip();
				break;
			case 4:
				return $this->getCatipalmId();
				break;
			case 5:
				return $this->getDiralm();
				break;
			case 6:
				return $this->getCodalt();
				break;
			case 7:
				return $this->getCodedo();
				break;
			case 8:
				return $this->getEsptoven();
				break;
			case 9:
				return $this->getCodtippv();
				break;
			case 10:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}


	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadefalmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodalm(),
			$keys[1] => $this->getNomalm(),
			$keys[2] => $this->getCodcat(),
			$keys[3] => $this->getCodtip(),
			$keys[4] => $this->getCatipalmId(),
			$keys[5] => $this->getDiralm(),
			$keys[6] => $this->getCodalt(),
			$keys[7] => $this->getCodedo(),
			$keys[8] => $this->getEsptoven(),
			$keys[9] => $this->getCodtippv(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}


	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadefalmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}


	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodalm($value);
				break;
			case 1:
				$this->setNomalm($value);
				break;
			case 2:
				$this->setCodcat($value);
				break;
			case 3:
				$this->setCodtip($value);
				break;
			case 4:
				$this->setCatipalmId($value);
				break;
			case 5:
				$this->setDiralm($value);
				break;
			case 6:
				$this->setCodalt($value);
				break;
			case 7:
				$this->setCodedo($value);
				break;
			case 8:
				$this->setEsptoven($value);
				break;
			case 9:
				$this->setCodtippv($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}


	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadefalmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodalm($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomalm($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcat($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodtip($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCatipalmId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDiralm($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodalt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodedo($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setEsptoven($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodtippv($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}


	public function buildCriteria()
	{
		$criteria = new Criteria(CadefalmPeer::DATABASE_NAME);

		if ($this->isColumnModified(CadefalmPeer::CODALM)) $criteria->add(CadefalmPeer::CODALM, $this->codalm);
		if ($this->isColumnModified(CadefalmPeer::NOMALM)) $criteria->add(CadefalmPeer::NOMALM, $this->nomalm);
		if ($this->isColumnModified(CadefalmPeer::CODCAT)) $criteria->add(CadefalmPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(CadefalmPeer::CODTIP)) $criteria->add(CadefalmPeer::CODTIP, $this->codtip);
		if ($this->isColumnModified(CadefalmPeer::CATIPALM_ID)) $criteria->add(CadefalmPeer::CATIPALM_ID, $this->catipalm_id);
		if ($this->isColumnModified(CadefalmPeer::DIRALM)) $criteria->add(CadefalmPeer::DIRALM, $this->diralm);
		if ($this->isColumnModified(CadefalmPeer::CODALT)) $criteria->add(CadefalmPeer::CODALT, $this->codalt);
		if ($this->isColumnModified(CadefalmPeer::CODEDO)) $criteria->add(CadefalmPeer::CODEDO, $this->codedo);
		if ($this->isColumnModified(CadefalmPeer::ESPTOVEN)) $criteria->add(CadefalmPeer::ESPTOVEN, $this->esptoven);
		if ($this->isColumnModified(CadefalmPeer::CODTIPPV)) $criteria->add(CadefalmPeer::CODTIPPV, $this->codtippv);
		if ($this->isColumnModified(CadefalmPeer::ID)) $criteria->add(CadefalmPeer::ID, $this->id);

		return $criteria;
	}


	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CadefalmPeer::DATABASE_NAME);

		$criteria->add(CadefalmPeer::ID, $this->id);

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

		$copyObj->setCodalm($this->codalm);

		$copyObj->setNomalm($this->nomalm);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCodtip($this->codtip);

		$copyObj->setCatipalmId($this->catipalm_id);

		$copyObj->setDiralm($this->diralm);

		$copyObj->setCodalt($this->codalt);

		$copyObj->setCodedo($this->codedo);

		$copyObj->setEsptoven($this->esptoven);

		$copyObj->setCodtippv($this->codtippv);


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
			self::$peer = new CadefalmPeer();
		}
		return self::$peer;
	}


	public function setCatipalmRelatedByCodtip($v)
	{


		if ($v === null) {
			$this->setCodtip(NULL);
		} else {
			$this->setCodtip($v->getId());
		}


		$this->aCatipalmRelatedByCodtip = $v;
	}



	public function getCatipalmRelatedByCodtip($con = null)
	{
		if ($this->aCatipalmRelatedByCodtip === null && ($this->codtip !== null)) {
						include_once 'lib/model/om/BaseCatipalmPeer.php';

      $c = new Criteria();
      $c->add(CatipalmPeer::ID,$this->codtip);

			$this->aCatipalmRelatedByCodtip = CatipalmPeer::doSelectOne($c, $con);


		}
		return $this->aCatipalmRelatedByCodtip;
	}


	public function setCatipalmRelatedByCatipalmId($v)
	{


		if ($v === null) {
			$this->setCatipalmId(NULL);
		} else {
			$this->setCatipalmId($v->getId());
		}


		$this->aCatipalmRelatedByCatipalmId = $v;
	}



	public function getCatipalmRelatedByCatipalmId($con = null)
	{
		if ($this->aCatipalmRelatedByCatipalmId === null && ($this->catipalm_id !== null)) {
						include_once 'lib/model/om/BaseCatipalmPeer.php';

      $c = new Criteria();
      $c->add(CatipalmPeer::ID,$this->catipalm_id);

			$this->aCatipalmRelatedByCatipalmId = CatipalmPeer::doSelectOne($c, $con);


		}
		return $this->aCatipalmRelatedByCatipalmId;
	}

}
