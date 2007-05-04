<?php


abstract class BaseFcrecdespag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numpag;


	
	protected $codrede;


	
	protected $monto;


	
	protected $id;

	
	protected $aFcdefdesc;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNumpag()
	{

		return $this->numpag;
	}

	
	public function getCodrede()
	{

		return $this->codrede;
	}

	
	public function getMonto()
	{

		return $this->monto;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setNumpag($v)
	{

		if ($this->numpag !== $v) {
			$this->numpag = $v;
			$this->modifiedColumns[] = FcrecdespagPeer::NUMPAG;
		}

	} 
	
	public function setCodrede($v)
	{

		if ($this->codrede !== $v) {
			$this->codrede = $v;
			$this->modifiedColumns[] = FcrecdespagPeer::CODREDE;
		}

		if ($this->aFcdefdesc !== null && $this->aFcdefdesc->getCoddes() !== $v) {
			$this->aFcdefdesc = null;
		}

	} 
	
	public function setMonto($v)
	{

		if ($this->monto !== $v) {
			$this->monto = $v;
			$this->modifiedColumns[] = FcrecdespagPeer::MONTO;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcrecdespagPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->numpag = $rs->getString($startcol + 0);

			$this->codrede = $rs->getString($startcol + 1);

			$this->monto = $rs->getFloat($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcrecdespag object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcrecdespagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcrecdespagPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcrecdespagPeer::DATABASE_NAME);
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


												
			if ($this->aFcdefdesc !== null) {
				if ($this->aFcdefdesc->isModified()) {
					$affectedRows += $this->aFcdefdesc->save($con);
				}
				$this->setFcdefdesc($this->aFcdefdesc);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FcrecdespagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcrecdespagPeer::doUpdate($this, $con);
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


												
			if ($this->aFcdefdesc !== null) {
				if (!$this->aFcdefdesc->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFcdefdesc->getValidationFailures());
				}
			}


			if (($retval = FcrecdespagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcrecdespagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumpag();
				break;
			case 1:
				return $this->getCodrede();
				break;
			case 2:
				return $this->getMonto();
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
		$keys = FcrecdespagPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumpag(),
			$keys[1] => $this->getCodrede(),
			$keys[2] => $this->getMonto(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcrecdespagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumpag($value);
				break;
			case 1:
				$this->setCodrede($value);
				break;
			case 2:
				$this->setMonto($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcrecdespagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumpag($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodrede($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonto($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcrecdespagPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcrecdespagPeer::NUMPAG)) $criteria->add(FcrecdespagPeer::NUMPAG, $this->numpag);
		if ($this->isColumnModified(FcrecdespagPeer::CODREDE)) $criteria->add(FcrecdespagPeer::CODREDE, $this->codrede);
		if ($this->isColumnModified(FcrecdespagPeer::MONTO)) $criteria->add(FcrecdespagPeer::MONTO, $this->monto);
		if ($this->isColumnModified(FcrecdespagPeer::ID)) $criteria->add(FcrecdespagPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcrecdespagPeer::DATABASE_NAME);

		$criteria->add(FcrecdespagPeer::ID, $this->id);

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

		$copyObj->setNumpag($this->numpag);

		$copyObj->setCodrede($this->codrede);

		$copyObj->setMonto($this->monto);


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
			self::$peer = new FcrecdespagPeer();
		}
		return self::$peer;
	}

	
	public function setFcdefdesc($v)
	{


		if ($v === null) {
			$this->setCodrede(NULL);
		} else {
			$this->setCodrede($v->getCoddes());
		}


		$this->aFcdefdesc = $v;
	}


	
	public function getFcdefdesc($con = null)
	{
				include_once 'lib/model/om/BaseFcdefdescPeer.php';

		if ($this->aFcdefdesc === null && (($this->codrede !== "" && $this->codrede !== null))) {

			$this->aFcdefdesc = FcdefdescPeer::retrieveByPK($this->codrede, $con);

			
		}
		return $this->aFcdefdesc;
	}

} 