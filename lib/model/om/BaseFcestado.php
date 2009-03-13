<?php


abstract class BaseFcestado extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codedo;


	
	protected $codpai;


	
	protected $nomedo;


	
	protected $id;

	
	protected $aFcpais;

	
	protected $collFcmunicis;

	
	protected $lastFcmuniciCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodedo()
  {

    return trim($this->codedo);

  }
  
  public function getCodpai()
  {

    return trim($this->codpai);

  }
  
  public function getNomedo()
  {

    return trim($this->nomedo);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodedo($v)
	{

    if ($this->codedo !== $v) {
        $this->codedo = $v;
        $this->modifiedColumns[] = FcestadoPeer::CODEDO;
      }
  
	} 
	
	public function setCodpai($v)
	{

    if ($this->codpai !== $v) {
        $this->codpai = $v;
        $this->modifiedColumns[] = FcestadoPeer::CODPAI;
      }
  
		if ($this->aFcpais !== null && $this->aFcpais->getCodpai() !== $v) {
			$this->aFcpais = null;
		}

	} 
	
	public function setNomedo($v)
	{

    if ($this->nomedo !== $v) {
        $this->nomedo = $v;
        $this->modifiedColumns[] = FcestadoPeer::NOMEDO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcestadoPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codedo = $rs->getString($startcol + 0);

      $this->codpai = $rs->getString($startcol + 1);

      $this->nomedo = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcestado object", $e);
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
			$con = Propel::getConnection(FcestadoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcestadoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcestadoPeer::DATABASE_NAME);
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


												
			if ($this->aFcpais !== null) {
				if ($this->aFcpais->isModified()) {
					$affectedRows += $this->aFcpais->save($con);
				}
				$this->setFcpais($this->aFcpais);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FcestadoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcestadoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collFcmunicis !== null) {
				foreach($this->collFcmunicis as $referrerFK) {
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


												
			if ($this->aFcpais !== null) {
				if (!$this->aFcpais->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFcpais->getValidationFailures());
				}
			}


			if (($retval = FcestadoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collFcmunicis !== null) {
					foreach($this->collFcmunicis as $referrerFK) {
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
		$pos = FcestadoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodedo();
				break;
			case 1:
				return $this->getCodpai();
				break;
			case 2:
				return $this->getNomedo();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcestadoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodedo(),
			$keys[1] => $this->getCodpai(),
			$keys[2] => $this->getNomedo(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcestadoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodedo($value);
				break;
			case 1:
				$this->setCodpai($value);
				break;
			case 2:
				$this->setNomedo($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcestadoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodedo($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpai($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomedo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcestadoPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcestadoPeer::CODEDO)) $criteria->add(FcestadoPeer::CODEDO, $this->codedo);
		if ($this->isColumnModified(FcestadoPeer::CODPAI)) $criteria->add(FcestadoPeer::CODPAI, $this->codpai);
		if ($this->isColumnModified(FcestadoPeer::NOMEDO)) $criteria->add(FcestadoPeer::NOMEDO, $this->nomedo);
		if ($this->isColumnModified(FcestadoPeer::ID)) $criteria->add(FcestadoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcestadoPeer::DATABASE_NAME);

		$criteria->add(FcestadoPeer::ID, $this->id);

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

		$copyObj->setCodedo($this->codedo);

		$copyObj->setCodpai($this->codpai);

		$copyObj->setNomedo($this->nomedo);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getFcmunicis() as $relObj) {
				$copyObj->addFcmunici($relObj->copy($deepCopy));
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
			self::$peer = new FcestadoPeer();
		}
		return self::$peer;
	}

	
	public function setFcpais($v)
	{


		if ($v === null) {
			$this->setCodpai(NULL);
		} else {
			$this->setCodpai($v->getCodpai());
		}


		$this->aFcpais = $v;
	}


	
	public function getFcpais($con = null)
	{
		if ($this->aFcpais === null && (($this->codpai !== "" && $this->codpai !== null))) {
						include_once 'lib/model/om/BaseFcpaisPeer.php';

			$this->aFcpais = FcpaisPeer::retrieveByPK($this->codpai, $con);

			
		}
		return $this->aFcpais;
	}

	
	public function initFcmunicis()
	{
		if ($this->collFcmunicis === null) {
			$this->collFcmunicis = array();
		}
	}

	
	public function getFcmunicis($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFcmuniciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcmunicis === null) {
			if ($this->isNew()) {
			   $this->collFcmunicis = array();
			} else {

				$criteria->add(FcmuniciPeer::CODPAI, $this->getCodpai());

				FcmuniciPeer::addSelectColumns($criteria);
				$this->collFcmunicis = FcmuniciPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FcmuniciPeer::CODPAI, $this->getCodpai());

				FcmuniciPeer::addSelectColumns($criteria);
				if (!isset($this->lastFcmuniciCriteria) || !$this->lastFcmuniciCriteria->equals($criteria)) {
					$this->collFcmunicis = FcmuniciPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFcmuniciCriteria = $criteria;
		return $this->collFcmunicis;
	}

	
	public function countFcmunicis($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseFcmuniciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FcmuniciPeer::CODPAI, $this->getCodpai());

		return FcmuniciPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFcmunici(Fcmunici $l)
	{
		$this->collFcmunicis[] = $l;
		$l->setFcestado($this);
	}

} 