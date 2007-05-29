<?php


abstract class BaseForasopromet extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codmet;


	
	protected $codpro;


	
	protected $ubigeo;


	
	protected $indges;


	
	protected $calind;


	
	protected $frelec;


	
	protected $canpro;


	
	protected $codemp;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodmet()
	{

		return $this->codmet; 		
	}
	
	public function getCodpro()
	{

		return $this->codpro; 		
	}
	
	public function getUbigeo()
	{

		return $this->ubigeo; 		
	}
	
	public function getIndges()
	{

		return $this->indges; 		
	}
	
	public function getCalind()
	{

		return $this->calind; 		
	}
	
	public function getFrelec()
	{

		return $this->frelec; 		
	}
	
	public function getCanpro()
	{

		return number_format($this->canpro,2,',','.');
		
	}
	
	public function getCodemp()
	{

		return $this->codemp; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodmet($v)
	{

		if ($this->codmet !== $v) {
			$this->codmet = $v;
			$this->modifiedColumns[] = ForasoprometPeer::CODMET;
		}

	} 
	
	public function setCodpro($v)
	{

		if ($this->codpro !== $v) {
			$this->codpro = $v;
			$this->modifiedColumns[] = ForasoprometPeer::CODPRO;
		}

	} 
	
	public function setUbigeo($v)
	{

		if ($this->ubigeo !== $v) {
			$this->ubigeo = $v;
			$this->modifiedColumns[] = ForasoprometPeer::UBIGEO;
		}

	} 
	
	public function setIndges($v)
	{

		if ($this->indges !== $v) {
			$this->indges = $v;
			$this->modifiedColumns[] = ForasoprometPeer::INDGES;
		}

	} 
	
	public function setCalind($v)
	{

		if ($this->calind !== $v) {
			$this->calind = $v;
			$this->modifiedColumns[] = ForasoprometPeer::CALIND;
		}

	} 
	
	public function setFrelec($v)
	{

		if ($this->frelec !== $v) {
			$this->frelec = $v;
			$this->modifiedColumns[] = ForasoprometPeer::FRELEC;
		}

	} 
	
	public function setCanpro($v)
	{

		if ($this->canpro !== $v) {
			$this->canpro = $v;
			$this->modifiedColumns[] = ForasoprometPeer::CANPRO;
		}

	} 
	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = ForasoprometPeer::CODEMP;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ForasoprometPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codmet = $rs->getString($startcol + 0);

			$this->codpro = $rs->getString($startcol + 1);

			$this->ubigeo = $rs->getString($startcol + 2);

			$this->indges = $rs->getString($startcol + 3);

			$this->calind = $rs->getString($startcol + 4);

			$this->frelec = $rs->getString($startcol + 5);

			$this->canpro = $rs->getFloat($startcol + 6);

			$this->codemp = $rs->getString($startcol + 7);

			$this->id = $rs->getInt($startcol + 8);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Forasopromet object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ForasoprometPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForasoprometPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForasoprometPeer::DATABASE_NAME);
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
					$pk = ForasoprometPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += ForasoprometPeer::doUpdate($this, $con);
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


			if (($retval = ForasoprometPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForasoprometPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodmet();
				break;
			case 1:
				return $this->getCodpro();
				break;
			case 2:
				return $this->getUbigeo();
				break;
			case 3:
				return $this->getIndges();
				break;
			case 4:
				return $this->getCalind();
				break;
			case 5:
				return $this->getFrelec();
				break;
			case 6:
				return $this->getCanpro();
				break;
			case 7:
				return $this->getCodemp();
				break;
			case 8:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForasoprometPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodmet(),
			$keys[1] => $this->getCodpro(),
			$keys[2] => $this->getUbigeo(),
			$keys[3] => $this->getIndges(),
			$keys[4] => $this->getCalind(),
			$keys[5] => $this->getFrelec(),
			$keys[6] => $this->getCanpro(),
			$keys[7] => $this->getCodemp(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForasoprometPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodmet($value);
				break;
			case 1:
				$this->setCodpro($value);
				break;
			case 2:
				$this->setUbigeo($value);
				break;
			case 3:
				$this->setIndges($value);
				break;
			case 4:
				$this->setCalind($value);
				break;
			case 5:
				$this->setFrelec($value);
				break;
			case 6:
				$this->setCanpro($value);
				break;
			case 7:
				$this->setCodemp($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForasoprometPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodmet($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpro($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUbigeo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIndges($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCalind($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFrelec($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCanpro($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodemp($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForasoprometPeer::DATABASE_NAME);

		if ($this->isColumnModified(ForasoprometPeer::CODMET)) $criteria->add(ForasoprometPeer::CODMET, $this->codmet);
		if ($this->isColumnModified(ForasoprometPeer::CODPRO)) $criteria->add(ForasoprometPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(ForasoprometPeer::UBIGEO)) $criteria->add(ForasoprometPeer::UBIGEO, $this->ubigeo);
		if ($this->isColumnModified(ForasoprometPeer::INDGES)) $criteria->add(ForasoprometPeer::INDGES, $this->indges);
		if ($this->isColumnModified(ForasoprometPeer::CALIND)) $criteria->add(ForasoprometPeer::CALIND, $this->calind);
		if ($this->isColumnModified(ForasoprometPeer::FRELEC)) $criteria->add(ForasoprometPeer::FRELEC, $this->frelec);
		if ($this->isColumnModified(ForasoprometPeer::CANPRO)) $criteria->add(ForasoprometPeer::CANPRO, $this->canpro);
		if ($this->isColumnModified(ForasoprometPeer::CODEMP)) $criteria->add(ForasoprometPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(ForasoprometPeer::ID)) $criteria->add(ForasoprometPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForasoprometPeer::DATABASE_NAME);

		$criteria->add(ForasoprometPeer::ID, $this->id);

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

		$copyObj->setCodmet($this->codmet);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setUbigeo($this->ubigeo);

		$copyObj->setIndges($this->indges);

		$copyObj->setCalind($this->calind);

		$copyObj->setFrelec($this->frelec);

		$copyObj->setCanpro($this->canpro);

		$copyObj->setCodemp($this->codemp);


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
			self::$peer = new ForasoprometPeer();
		}
		return self::$peer;
	}

} 