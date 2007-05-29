<?php


abstract class BaseForestdisper extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codmet;


	
	protected $codpro;


	
	protected $codact;


	
	protected $codart;


	
	protected $perpre;


	
	protected $canper;


	
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
	
	public function getCodact()
	{

		return $this->codact; 		
	}
	
	public function getCodart()
	{

		return $this->codart; 		
	}
	
	public function getPerpre()
	{

		return $this->perpre; 		
	}
	
	public function getCanper()
	{

		return number_format($this->canper,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodmet($v)
	{

		if ($this->codmet !== $v) {
			$this->codmet = $v;
			$this->modifiedColumns[] = ForestdisperPeer::CODMET;
		}

	} 
	
	public function setCodpro($v)
	{

		if ($this->codpro !== $v) {
			$this->codpro = $v;
			$this->modifiedColumns[] = ForestdisperPeer::CODPRO;
		}

	} 
	
	public function setCodact($v)
	{

		if ($this->codact !== $v) {
			$this->codact = $v;
			$this->modifiedColumns[] = ForestdisperPeer::CODACT;
		}

	} 
	
	public function setCodart($v)
	{

		if ($this->codart !== $v) {
			$this->codart = $v;
			$this->modifiedColumns[] = ForestdisperPeer::CODART;
		}

	} 
	
	public function setPerpre($v)
	{

		if ($this->perpre !== $v) {
			$this->perpre = $v;
			$this->modifiedColumns[] = ForestdisperPeer::PERPRE;
		}

	} 
	
	public function setCanper($v)
	{

		if ($this->canper !== $v) {
			$this->canper = $v;
			$this->modifiedColumns[] = ForestdisperPeer::CANPER;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ForestdisperPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codmet = $rs->getString($startcol + 0);

			$this->codpro = $rs->getString($startcol + 1);

			$this->codact = $rs->getString($startcol + 2);

			$this->codart = $rs->getString($startcol + 3);

			$this->perpre = $rs->getString($startcol + 4);

			$this->canper = $rs->getFloat($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Forestdisper object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ForestdisperPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForestdisperPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForestdisperPeer::DATABASE_NAME);
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
					$pk = ForestdisperPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += ForestdisperPeer::doUpdate($this, $con);
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


			if (($retval = ForestdisperPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForestdisperPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCodact();
				break;
			case 3:
				return $this->getCodart();
				break;
			case 4:
				return $this->getPerpre();
				break;
			case 5:
				return $this->getCanper();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForestdisperPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodmet(),
			$keys[1] => $this->getCodpro(),
			$keys[2] => $this->getCodact(),
			$keys[3] => $this->getCodart(),
			$keys[4] => $this->getPerpre(),
			$keys[5] => $this->getCanper(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForestdisperPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCodact($value);
				break;
			case 3:
				$this->setCodart($value);
				break;
			case 4:
				$this->setPerpre($value);
				break;
			case 5:
				$this->setCanper($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForestdisperPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodmet($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpro($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodact($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodart($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPerpre($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCanper($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForestdisperPeer::DATABASE_NAME);

		if ($this->isColumnModified(ForestdisperPeer::CODMET)) $criteria->add(ForestdisperPeer::CODMET, $this->codmet);
		if ($this->isColumnModified(ForestdisperPeer::CODPRO)) $criteria->add(ForestdisperPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(ForestdisperPeer::CODACT)) $criteria->add(ForestdisperPeer::CODACT, $this->codact);
		if ($this->isColumnModified(ForestdisperPeer::CODART)) $criteria->add(ForestdisperPeer::CODART, $this->codart);
		if ($this->isColumnModified(ForestdisperPeer::PERPRE)) $criteria->add(ForestdisperPeer::PERPRE, $this->perpre);
		if ($this->isColumnModified(ForestdisperPeer::CANPER)) $criteria->add(ForestdisperPeer::CANPER, $this->canper);
		if ($this->isColumnModified(ForestdisperPeer::ID)) $criteria->add(ForestdisperPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForestdisperPeer::DATABASE_NAME);

		$criteria->add(ForestdisperPeer::ID, $this->id);

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

		$copyObj->setCodact($this->codact);

		$copyObj->setCodart($this->codart);

		$copyObj->setPerpre($this->perpre);

		$copyObj->setCanper($this->canper);


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
			self::$peer = new ForestdisperPeer();
		}
		return self::$peer;
	}

} 