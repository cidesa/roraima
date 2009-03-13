<?php


abstract class BaseFcparroq extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpar;


	
	protected $codmun;


	
	protected $codedo;


	
	protected $codpai;


	
	protected $nompar;


	
	protected $id;

	
	protected $aFcmunici;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodpar()
  {

    return trim($this->codpar);

  }
  
  public function getCodmun()
  {

    return trim($this->codmun);

  }
  
  public function getCodedo()
  {

    return trim($this->codedo);

  }
  
  public function getCodpai()
  {

    return trim($this->codpai);

  }
  
  public function getNompar()
  {

    return trim($this->nompar);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodpar($v)
	{

    if ($this->codpar !== $v) {
        $this->codpar = $v;
        $this->modifiedColumns[] = FcparroqPeer::CODPAR;
      }
  
	} 
	
	public function setCodmun($v)
	{

    if ($this->codmun !== $v) {
        $this->codmun = $v;
        $this->modifiedColumns[] = FcparroqPeer::CODMUN;
      }
  
	} 
	
	public function setCodedo($v)
	{

    if ($this->codedo !== $v) {
        $this->codedo = $v;
        $this->modifiedColumns[] = FcparroqPeer::CODEDO;
      }
  
	} 
	
	public function setCodpai($v)
	{

    if ($this->codpai !== $v) {
        $this->codpai = $v;
        $this->modifiedColumns[] = FcparroqPeer::CODPAI;
      }
  
		if ($this->aFcmunici !== null && $this->aFcmunici->getCodpai() !== $v) {
			$this->aFcmunici = null;
		}

	} 
	
	public function setNompar($v)
	{

    if ($this->nompar !== $v) {
        $this->nompar = $v;
        $this->modifiedColumns[] = FcparroqPeer::NOMPAR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcparroqPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codpar = $rs->getString($startcol + 0);

      $this->codmun = $rs->getString($startcol + 1);

      $this->codedo = $rs->getString($startcol + 2);

      $this->codpai = $rs->getString($startcol + 3);

      $this->nompar = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcparroq object", $e);
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
			$con = Propel::getConnection(FcparroqPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcparroqPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcparroqPeer::DATABASE_NAME);
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


												
			if ($this->aFcmunici !== null) {
				if ($this->aFcmunici->isModified()) {
					$affectedRows += $this->aFcmunici->save($con);
				}
				$this->setFcmunici($this->aFcmunici);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FcparroqPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcparroqPeer::doUpdate($this, $con);
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


												
			if ($this->aFcmunici !== null) {
				if (!$this->aFcmunici->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFcmunici->getValidationFailures());
				}
			}


			if (($retval = FcparroqPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcparroqPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpar();
				break;
			case 1:
				return $this->getCodmun();
				break;
			case 2:
				return $this->getCodedo();
				break;
			case 3:
				return $this->getCodpai();
				break;
			case 4:
				return $this->getNompar();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcparroqPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpar(),
			$keys[1] => $this->getCodmun(),
			$keys[2] => $this->getCodedo(),
			$keys[3] => $this->getCodpai(),
			$keys[4] => $this->getNompar(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcparroqPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpar($value);
				break;
			case 1:
				$this->setCodmun($value);
				break;
			case 2:
				$this->setCodedo($value);
				break;
			case 3:
				$this->setCodpai($value);
				break;
			case 4:
				$this->setNompar($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcparroqPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpar($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodmun($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodedo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodpai($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNompar($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcparroqPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcparroqPeer::CODPAR)) $criteria->add(FcparroqPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(FcparroqPeer::CODMUN)) $criteria->add(FcparroqPeer::CODMUN, $this->codmun);
		if ($this->isColumnModified(FcparroqPeer::CODEDO)) $criteria->add(FcparroqPeer::CODEDO, $this->codedo);
		if ($this->isColumnModified(FcparroqPeer::CODPAI)) $criteria->add(FcparroqPeer::CODPAI, $this->codpai);
		if ($this->isColumnModified(FcparroqPeer::NOMPAR)) $criteria->add(FcparroqPeer::NOMPAR, $this->nompar);
		if ($this->isColumnModified(FcparroqPeer::ID)) $criteria->add(FcparroqPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcparroqPeer::DATABASE_NAME);

		$criteria->add(FcparroqPeer::ID, $this->id);

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

		$copyObj->setCodpar($this->codpar);

		$copyObj->setCodmun($this->codmun);

		$copyObj->setCodedo($this->codedo);

		$copyObj->setCodpai($this->codpai);

		$copyObj->setNompar($this->nompar);


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
			self::$peer = new FcparroqPeer();
		}
		return self::$peer;
	}

	
	public function setFcmunici($v)
	{


		if ($v === null) {
			$this->setCodpai(NULL);
		} else {
			$this->setCodpai($v->getCodpai());
		}


		$this->aFcmunici = $v;
	}


	
	public function getFcmunici($con = null)
	{
		if ($this->aFcmunici === null && (($this->codpai !== "" && $this->codpai !== null))) {
						include_once 'lib/model/om/BaseFcmuniciPeer.php';

			$this->aFcmunici = FcmuniciPeer::retrieveByPK($this->codpai, $con);

			
		}
		return $this->aFcmunici;
	}

} 