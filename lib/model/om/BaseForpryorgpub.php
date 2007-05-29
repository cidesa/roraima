<?php


abstract class BaseForpryorgpub extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpro;


	
	protected $codorg;


	
	protected $monapo;


	
	protected $reseje;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodpro()
	{

		return $this->codpro; 		
	}
	
	public function getCodorg()
	{

		return $this->codorg; 		
	}
	
	public function getMonapo()
	{

		return number_format($this->monapo,2,',','.');
		
	}
	
	public function getReseje()
	{

		return $this->reseje; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodpro($v)
	{

		if ($this->codpro !== $v) {
			$this->codpro = $v;
			$this->modifiedColumns[] = ForpryorgpubPeer::CODPRO;
		}

	} 
	
	public function setCodorg($v)
	{

		if ($this->codorg !== $v) {
			$this->codorg = $v;
			$this->modifiedColumns[] = ForpryorgpubPeer::CODORG;
		}

	} 
	
	public function setMonapo($v)
	{

		if ($this->monapo !== $v) {
			$this->monapo = $v;
			$this->modifiedColumns[] = ForpryorgpubPeer::MONAPO;
		}

	} 
	
	public function setReseje($v)
	{

		if ($this->reseje !== $v) {
			$this->reseje = $v;
			$this->modifiedColumns[] = ForpryorgpubPeer::RESEJE;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ForpryorgpubPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codpro = $rs->getString($startcol + 0);

			$this->codorg = $rs->getString($startcol + 1);

			$this->monapo = $rs->getFloat($startcol + 2);

			$this->reseje = $rs->getString($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Forpryorgpub object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ForpryorgpubPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForpryorgpubPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForpryorgpubPeer::DATABASE_NAME);
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
					$pk = ForpryorgpubPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += ForpryorgpubPeer::doUpdate($this, $con);
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


			if (($retval = ForpryorgpubPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForpryorgpubPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpro();
				break;
			case 1:
				return $this->getCodorg();
				break;
			case 2:
				return $this->getMonapo();
				break;
			case 3:
				return $this->getReseje();
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
		$keys = ForpryorgpubPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpro(),
			$keys[1] => $this->getCodorg(),
			$keys[2] => $this->getMonapo(),
			$keys[3] => $this->getReseje(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForpryorgpubPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpro($value);
				break;
			case 1:
				$this->setCodorg($value);
				break;
			case 2:
				$this->setMonapo($value);
				break;
			case 3:
				$this->setReseje($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForpryorgpubPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpro($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodorg($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonapo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setReseje($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForpryorgpubPeer::DATABASE_NAME);

		if ($this->isColumnModified(ForpryorgpubPeer::CODPRO)) $criteria->add(ForpryorgpubPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(ForpryorgpubPeer::CODORG)) $criteria->add(ForpryorgpubPeer::CODORG, $this->codorg);
		if ($this->isColumnModified(ForpryorgpubPeer::MONAPO)) $criteria->add(ForpryorgpubPeer::MONAPO, $this->monapo);
		if ($this->isColumnModified(ForpryorgpubPeer::RESEJE)) $criteria->add(ForpryorgpubPeer::RESEJE, $this->reseje);
		if ($this->isColumnModified(ForpryorgpubPeer::ID)) $criteria->add(ForpryorgpubPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForpryorgpubPeer::DATABASE_NAME);

		$criteria->add(ForpryorgpubPeer::ID, $this->id);

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

		$copyObj->setCodpro($this->codpro);

		$copyObj->setCodorg($this->codorg);

		$copyObj->setMonapo($this->monapo);

		$copyObj->setReseje($this->reseje);


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
			self::$peer = new ForpryorgpubPeer();
		}
		return self::$peer;
	}

} 