<?php


abstract class BaseNpescuelas extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codescuela;


	
	protected $nombreescuela;


	
	protected $codmunicipio;


	
	protected $nombremunicipio;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodescuela()
	{

		return $this->codescuela;
	}

	
	public function getNombreescuela()
	{

		return $this->nombreescuela;
	}

	
	public function getCodmunicipio()
	{

		return $this->codmunicipio;
	}

	
	public function getNombremunicipio()
	{

		return $this->nombremunicipio;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodescuela($v)
	{

		if ($this->codescuela !== $v) {
			$this->codescuela = $v;
			$this->modifiedColumns[] = NpescuelasPeer::CODESCUELA;
		}

	} 
	
	public function setNombreescuela($v)
	{

		if ($this->nombreescuela !== $v) {
			$this->nombreescuela = $v;
			$this->modifiedColumns[] = NpescuelasPeer::NOMBREESCUELA;
		}

	} 
	
	public function setCodmunicipio($v)
	{

		if ($this->codmunicipio !== $v) {
			$this->codmunicipio = $v;
			$this->modifiedColumns[] = NpescuelasPeer::CODMUNICIPIO;
		}

	} 
	
	public function setNombremunicipio($v)
	{

		if ($this->nombremunicipio !== $v) {
			$this->nombremunicipio = $v;
			$this->modifiedColumns[] = NpescuelasPeer::NOMBREMUNICIPIO;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpescuelasPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codescuela = $rs->getString($startcol + 0);

			$this->nombreescuela = $rs->getString($startcol + 1);

			$this->codmunicipio = $rs->getString($startcol + 2);

			$this->nombremunicipio = $rs->getString($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npescuelas object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpescuelasPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpescuelasPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpescuelasPeer::DATABASE_NAME);
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
					$pk = NpescuelasPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpescuelasPeer::doUpdate($this, $con);
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


			if (($retval = NpescuelasPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpescuelasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodescuela();
				break;
			case 1:
				return $this->getNombreescuela();
				break;
			case 2:
				return $this->getCodmunicipio();
				break;
			case 3:
				return $this->getNombremunicipio();
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
		$keys = NpescuelasPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodescuela(),
			$keys[1] => $this->getNombreescuela(),
			$keys[2] => $this->getCodmunicipio(),
			$keys[3] => $this->getNombremunicipio(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpescuelasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodescuela($value);
				break;
			case 1:
				$this->setNombreescuela($value);
				break;
			case 2:
				$this->setCodmunicipio($value);
				break;
			case 3:
				$this->setNombremunicipio($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpescuelasPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodescuela($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombreescuela($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodmunicipio($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNombremunicipio($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpescuelasPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpescuelasPeer::CODESCUELA)) $criteria->add(NpescuelasPeer::CODESCUELA, $this->codescuela);
		if ($this->isColumnModified(NpescuelasPeer::NOMBREESCUELA)) $criteria->add(NpescuelasPeer::NOMBREESCUELA, $this->nombreescuela);
		if ($this->isColumnModified(NpescuelasPeer::CODMUNICIPIO)) $criteria->add(NpescuelasPeer::CODMUNICIPIO, $this->codmunicipio);
		if ($this->isColumnModified(NpescuelasPeer::NOMBREMUNICIPIO)) $criteria->add(NpescuelasPeer::NOMBREMUNICIPIO, $this->nombremunicipio);
		if ($this->isColumnModified(NpescuelasPeer::ID)) $criteria->add(NpescuelasPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpescuelasPeer::DATABASE_NAME);

		$criteria->add(NpescuelasPeer::ID, $this->id);

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

		$copyObj->setCodescuela($this->codescuela);

		$copyObj->setNombreescuela($this->nombreescuela);

		$copyObj->setCodmunicipio($this->codmunicipio);

		$copyObj->setNombremunicipio($this->nombremunicipio);


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
			self::$peer = new NpescuelasPeer();
		}
		return self::$peer;
	}

} 