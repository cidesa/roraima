<?php


abstract class BaseFcpreing extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpar;


	
	protected $nompar;


	
	protected $estima;


	
	protected $estcie;


	
	protected $acum = '';


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodpar()
	{

		return $this->codpar; 		
	}
	
	public function getNompar()
	{

		return $this->nompar; 		
	}
	
	public function getEstima()
	{

		return $this->estima; 		
	}
	
	public function getEstcie()
	{

		return $this->estcie; 		
	}
	
	public function getAcum()
	{

		return $this->acum; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodpar($v)
	{

		if ($this->codpar !== $v) {
			$this->codpar = $v;
			$this->modifiedColumns[] = FcpreingPeer::CODPAR;
		}

	} 
	
	public function setNompar($v)
	{

		if ($this->nompar !== $v) {
			$this->nompar = $v;
			$this->modifiedColumns[] = FcpreingPeer::NOMPAR;
		}

	} 
	
	public function setEstima($v)
	{

		if ($this->estima !== $v) {
			$this->estima = $v;
			$this->modifiedColumns[] = FcpreingPeer::ESTIMA;
		}

	} 
	
	public function setEstcie($v)
	{

		if ($this->estcie !== $v) {
			$this->estcie = $v;
			$this->modifiedColumns[] = FcpreingPeer::ESTCIE;
		}

	} 
	
	public function setAcum($v)
	{

		if ($this->acum !== $v || $v === '') {
			$this->acum = $v;
			$this->modifiedColumns[] = FcpreingPeer::ACUM;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcpreingPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codpar = $rs->getString($startcol + 0);

			$this->nompar = $rs->getString($startcol + 1);

			$this->estima = $rs->getString($startcol + 2);

			$this->estcie = $rs->getString($startcol + 3);

			$this->acum = $rs->getString($startcol + 4);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcpreing object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcpreingPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcpreingPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcpreingPeer::DATABASE_NAME);
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
					$pk = FcpreingPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcpreingPeer::doUpdate($this, $con);
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


			if (($retval = FcpreingPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcpreingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpar();
				break;
			case 1:
				return $this->getNompar();
				break;
			case 2:
				return $this->getEstima();
				break;
			case 3:
				return $this->getEstcie();
				break;
			case 4:
				return $this->getAcum();
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
		$keys = FcpreingPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpar(),
			$keys[1] => $this->getNompar(),
			$keys[2] => $this->getEstima(),
			$keys[3] => $this->getEstcie(),
			$keys[4] => $this->getAcum(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcpreingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpar($value);
				break;
			case 1:
				$this->setNompar($value);
				break;
			case 2:
				$this->setEstima($value);
				break;
			case 3:
				$this->setEstcie($value);
				break;
			case 4:
				$this->setAcum($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcpreingPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpar($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNompar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setEstima($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEstcie($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAcum($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcpreingPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcpreingPeer::CODPAR)) $criteria->add(FcpreingPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(FcpreingPeer::NOMPAR)) $criteria->add(FcpreingPeer::NOMPAR, $this->nompar);
		if ($this->isColumnModified(FcpreingPeer::ESTIMA)) $criteria->add(FcpreingPeer::ESTIMA, $this->estima);
		if ($this->isColumnModified(FcpreingPeer::ESTCIE)) $criteria->add(FcpreingPeer::ESTCIE, $this->estcie);
		if ($this->isColumnModified(FcpreingPeer::ACUM)) $criteria->add(FcpreingPeer::ACUM, $this->acum);
		if ($this->isColumnModified(FcpreingPeer::ID)) $criteria->add(FcpreingPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcpreingPeer::DATABASE_NAME);

		$criteria->add(FcpreingPeer::ID, $this->id);

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

		$copyObj->setNompar($this->nompar);

		$copyObj->setEstima($this->estima);

		$copyObj->setEstcie($this->estcie);

		$copyObj->setAcum($this->acum);


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
			self::$peer = new FcpreingPeer();
		}
		return self::$peer;
	}

} 