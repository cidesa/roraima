<?php


abstract class BaseFcmunici extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codmun;


	
	protected $codedo;


	
	protected $codpai;


	
	protected $nommun;


	
	protected $id;

	
	protected $aFcestado;

	
	protected $collFcparroqs;

	
	protected $lastFcparroqCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodmun()
	{

		return $this->codmun;
	}

	
	public function getCodedo()
	{

		return $this->codedo;
	}

	
	public function getCodpai()
	{

		return $this->codpai;
	}

	
	public function getNommun()
	{

		return $this->nommun;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodmun($v)
	{

		if ($this->codmun !== $v) {
			$this->codmun = $v;
			$this->modifiedColumns[] = FcmuniciPeer::CODMUN;
		}

	} 
	
	public function setCodedo($v)
	{

		if ($this->codedo !== $v) {
			$this->codedo = $v;
			$this->modifiedColumns[] = FcmuniciPeer::CODEDO;
		}

	} 
	
	public function setCodpai($v)
	{

		if ($this->codpai !== $v) {
			$this->codpai = $v;
			$this->modifiedColumns[] = FcmuniciPeer::CODPAI;
		}

		if ($this->aFcestado !== null && $this->aFcestado->getCodpai() !== $v) {
			$this->aFcestado = null;
		}

	} 
	
	public function setNommun($v)
	{

		if ($this->nommun !== $v) {
			$this->nommun = $v;
			$this->modifiedColumns[] = FcmuniciPeer::NOMMUN;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcmuniciPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codmun = $rs->getString($startcol + 0);

			$this->codedo = $rs->getString($startcol + 1);

			$this->codpai = $rs->getString($startcol + 2);

			$this->nommun = $rs->getString($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcmunici object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcmuniciPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcmuniciPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcmuniciPeer::DATABASE_NAME);
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


												
			if ($this->aFcestado !== null) {
				if ($this->aFcestado->isModified()) {
					$affectedRows += $this->aFcestado->save($con);
				}
				$this->setFcestado($this->aFcestado);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FcmuniciPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcmuniciPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collFcparroqs !== null) {
				foreach($this->collFcparroqs as $referrerFK) {
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


												
			if ($this->aFcestado !== null) {
				if (!$this->aFcestado->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFcestado->getValidationFailures());
				}
			}


			if (($retval = FcmuniciPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collFcparroqs !== null) {
					foreach($this->collFcparroqs as $referrerFK) {
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
		$pos = FcmuniciPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodmun();
				break;
			case 1:
				return $this->getCodedo();
				break;
			case 2:
				return $this->getCodpai();
				break;
			case 3:
				return $this->getNommun();
				break;
			case 4:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcmuniciPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodmun(),
			$keys[1] => $this->getCodedo(),
			$keys[2] => $this->getCodpai(),
			$keys[3] => $this->getNommun(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcmuniciPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodmun($value);
				break;
			case 1:
				$this->setCodedo($value);
				break;
			case 2:
				$this->setCodpai($value);
				break;
			case 3:
				$this->setNommun($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcmuniciPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodmun($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodedo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodpai($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNommun($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcmuniciPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcmuniciPeer::CODMUN)) $criteria->add(FcmuniciPeer::CODMUN, $this->codmun);
		if ($this->isColumnModified(FcmuniciPeer::CODEDO)) $criteria->add(FcmuniciPeer::CODEDO, $this->codedo);
		if ($this->isColumnModified(FcmuniciPeer::CODPAI)) $criteria->add(FcmuniciPeer::CODPAI, $this->codpai);
		if ($this->isColumnModified(FcmuniciPeer::NOMMUN)) $criteria->add(FcmuniciPeer::NOMMUN, $this->nommun);
		if ($this->isColumnModified(FcmuniciPeer::ID)) $criteria->add(FcmuniciPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcmuniciPeer::DATABASE_NAME);

		$criteria->add(FcmuniciPeer::CODMUN, $this->codmun);
		$criteria->add(FcmuniciPeer::CODEDO, $this->codedo);
		$criteria->add(FcmuniciPeer::CODPAI, $this->codpai);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getCodmun();

		$pks[1] = $this->getCodedo();

		$pks[2] = $this->getCodpai();

		return $pks;
	}

	
	public function setPrimaryKey($keys)
	{

		$this->setCodmun($keys[0]);

		$this->setCodedo($keys[1]);

		$this->setCodpai($keys[2]);

	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNommun($this->nommun);

		$copyObj->setId($this->id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getFcparroqs() as $relObj) {
				$copyObj->addFcparroq($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setCodmun(NULL); 
		$copyObj->setCodedo(NULL); 
		$copyObj->setCodpai(NULL); 
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
			self::$peer = new FcmuniciPeer();
		}
		return self::$peer;
	}

	
	public function setFcestado($v)
	{


		if ($v === null) {
			$this->setCodpai(NULL);
		} else {
			$this->setCodpai($v->getCodpai());
		}


		$this->aFcestado = $v;
	}


	
	public function getFcestado($con = null)
	{
				include_once 'lib/model/om/BaseFcestadoPeer.php';

		if ($this->aFcestado === null && (($this->codpai !== "" && $this->codpai !== null))) {

			$this->aFcestado = FcestadoPeer::retrieveByPK($this->codpai, $con);

			
		}
		return $this->aFcestado;
	}

	
	public function initFcparroqs()
	{
		if ($this->collFcparroqs === null) {
			$this->collFcparroqs = array();
		}
	}

	
	public function getFcparroqs($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFcparroqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcparroqs === null) {
			if ($this->isNew()) {
			   $this->collFcparroqs = array();
			} else {

				$criteria->add(FcparroqPeer::CODPAI, $this->getCodpai());

				FcparroqPeer::addSelectColumns($criteria);
				$this->collFcparroqs = FcparroqPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FcparroqPeer::CODPAI, $this->getCodpai());

				FcparroqPeer::addSelectColumns($criteria);
				if (!isset($this->lastFcparroqCriteria) || !$this->lastFcparroqCriteria->equals($criteria)) {
					$this->collFcparroqs = FcparroqPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFcparroqCriteria = $criteria;
		return $this->collFcparroqs;
	}

	
	public function countFcparroqs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseFcparroqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FcparroqPeer::CODPAI, $this->getCodpai());

		return FcparroqPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFcparroq(Fcparroq $l)
	{
		$this->collFcparroqs[] = $l;
		$l->setFcmunici($this);
	}

} 