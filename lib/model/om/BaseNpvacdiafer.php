<?php


abstract class BaseNpvacdiafer extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $dia;


	
	protected $mes;


	
	protected $descripcion;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getDia()
	{

		return number_format($this->dia,2,',','.');
		
	}
	
	public function getMes()
	{

		return number_format($this->mes,2,',','.');
		
	}
	
	public function getDescripcion()
	{

		return $this->descripcion; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setDia($v)
	{

		if ($this->dia !== $v) {
			$this->dia = $v;
			$this->modifiedColumns[] = NpvacdiaferPeer::DIA;
		}

	} 
	
	public function setMes($v)
	{

		if ($this->mes !== $v) {
			$this->mes = $v;
			$this->modifiedColumns[] = NpvacdiaferPeer::MES;
		}

	} 
	
	public function setDescripcion($v)
	{

		if ($this->descripcion !== $v) {
			$this->descripcion = $v;
			$this->modifiedColumns[] = NpvacdiaferPeer::DESCRIPCION;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpvacdiaferPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->dia = $rs->getFloat($startcol + 0);

			$this->mes = $rs->getFloat($startcol + 1);

			$this->descripcion = $rs->getString($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npvacdiafer object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpvacdiaferPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpvacdiaferPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpvacdiaferPeer::DATABASE_NAME);
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
					$pk = NpvacdiaferPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpvacdiaferPeer::doUpdate($this, $con);
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


			if (($retval = NpvacdiaferPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpvacdiaferPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDia();
				break;
			case 1:
				return $this->getMes();
				break;
			case 2:
				return $this->getDescripcion();
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
		$keys = NpvacdiaferPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDia(),
			$keys[1] => $this->getMes(),
			$keys[2] => $this->getDescripcion(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpvacdiaferPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDia($value);
				break;
			case 1:
				$this->setMes($value);
				break;
			case 2:
				$this->setDescripcion($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpvacdiaferPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDia($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMes($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescripcion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpvacdiaferPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpvacdiaferPeer::DIA)) $criteria->add(NpvacdiaferPeer::DIA, $this->dia);
		if ($this->isColumnModified(NpvacdiaferPeer::MES)) $criteria->add(NpvacdiaferPeer::MES, $this->mes);
		if ($this->isColumnModified(NpvacdiaferPeer::DESCRIPCION)) $criteria->add(NpvacdiaferPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(NpvacdiaferPeer::ID)) $criteria->add(NpvacdiaferPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpvacdiaferPeer::DATABASE_NAME);

		$criteria->add(NpvacdiaferPeer::ID, $this->id);

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

		$copyObj->setDia($this->dia);

		$copyObj->setMes($this->mes);

		$copyObj->setDescripcion($this->descripcion);


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
			self::$peer = new NpvacdiaferPeer();
		}
		return self::$peer;
	}

} 