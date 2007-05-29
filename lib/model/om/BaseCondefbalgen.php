<?php


abstract class BaseCondefbalgen extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $tiprep;


	
	protected $codcta;


	
	protected $descta;


	
	protected $tipo;


	
	protected $nivel;


	
	protected $orden;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getTiprep()
	{

		return $this->tiprep; 		
	}
	
	public function getCodcta()
	{

		return $this->codcta; 		
	}
	
	public function getDescta()
	{

		return $this->descta; 		
	}
	
	public function getTipo()
	{

		return $this->tipo; 		
	}
	
	public function getNivel()
	{

		return number_format($this->nivel,2,',','.');
		
	}
	
	public function getOrden()
	{

		return number_format($this->orden,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setTiprep($v)
	{

		if ($this->tiprep !== $v) {
			$this->tiprep = $v;
			$this->modifiedColumns[] = CondefbalgenPeer::TIPREP;
		}

	} 
	
	public function setCodcta($v)
	{

		if ($this->codcta !== $v) {
			$this->codcta = $v;
			$this->modifiedColumns[] = CondefbalgenPeer::CODCTA;
		}

	} 
	
	public function setDescta($v)
	{

		if ($this->descta !== $v) {
			$this->descta = $v;
			$this->modifiedColumns[] = CondefbalgenPeer::DESCTA;
		}

	} 
	
	public function setTipo($v)
	{

		if ($this->tipo !== $v) {
			$this->tipo = $v;
			$this->modifiedColumns[] = CondefbalgenPeer::TIPO;
		}

	} 
	
	public function setNivel($v)
	{

		if ($this->nivel !== $v) {
			$this->nivel = $v;
			$this->modifiedColumns[] = CondefbalgenPeer::NIVEL;
		}

	} 
	
	public function setOrden($v)
	{

		if ($this->orden !== $v) {
			$this->orden = $v;
			$this->modifiedColumns[] = CondefbalgenPeer::ORDEN;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CondefbalgenPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->tiprep = $rs->getString($startcol + 0);

			$this->codcta = $rs->getString($startcol + 1);

			$this->descta = $rs->getString($startcol + 2);

			$this->tipo = $rs->getString($startcol + 3);

			$this->nivel = $rs->getFloat($startcol + 4);

			$this->orden = $rs->getFloat($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Condefbalgen object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CondefbalgenPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CondefbalgenPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CondefbalgenPeer::DATABASE_NAME);
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
					$pk = CondefbalgenPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CondefbalgenPeer::doUpdate($this, $con);
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


			if (($retval = CondefbalgenPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CondefbalgenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getTiprep();
				break;
			case 1:
				return $this->getCodcta();
				break;
			case 2:
				return $this->getDescta();
				break;
			case 3:
				return $this->getTipo();
				break;
			case 4:
				return $this->getNivel();
				break;
			case 5:
				return $this->getOrden();
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
		$keys = CondefbalgenPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getTiprep(),
			$keys[1] => $this->getCodcta(),
			$keys[2] => $this->getDescta(),
			$keys[3] => $this->getTipo(),
			$keys[4] => $this->getNivel(),
			$keys[5] => $this->getOrden(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CondefbalgenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setTiprep($value);
				break;
			case 1:
				$this->setCodcta($value);
				break;
			case 2:
				$this->setDescta($value);
				break;
			case 3:
				$this->setTipo($value);
				break;
			case 4:
				$this->setNivel($value);
				break;
			case 5:
				$this->setOrden($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CondefbalgenPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setTiprep($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcta($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescta($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNivel($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setOrden($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CondefbalgenPeer::DATABASE_NAME);

		if ($this->isColumnModified(CondefbalgenPeer::TIPREP)) $criteria->add(CondefbalgenPeer::TIPREP, $this->tiprep);
		if ($this->isColumnModified(CondefbalgenPeer::CODCTA)) $criteria->add(CondefbalgenPeer::CODCTA, $this->codcta);
		if ($this->isColumnModified(CondefbalgenPeer::DESCTA)) $criteria->add(CondefbalgenPeer::DESCTA, $this->descta);
		if ($this->isColumnModified(CondefbalgenPeer::TIPO)) $criteria->add(CondefbalgenPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(CondefbalgenPeer::NIVEL)) $criteria->add(CondefbalgenPeer::NIVEL, $this->nivel);
		if ($this->isColumnModified(CondefbalgenPeer::ORDEN)) $criteria->add(CondefbalgenPeer::ORDEN, $this->orden);
		if ($this->isColumnModified(CondefbalgenPeer::ID)) $criteria->add(CondefbalgenPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CondefbalgenPeer::DATABASE_NAME);

		$criteria->add(CondefbalgenPeer::ID, $this->id);

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

		$copyObj->setTiprep($this->tiprep);

		$copyObj->setCodcta($this->codcta);

		$copyObj->setDescta($this->descta);

		$copyObj->setTipo($this->tipo);

		$copyObj->setNivel($this->nivel);

		$copyObj->setOrden($this->orden);


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
			self::$peer = new CondefbalgenPeer();
		}
		return self::$peer;
	}

} 