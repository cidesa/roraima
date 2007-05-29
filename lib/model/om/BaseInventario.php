<?php


abstract class BaseInventario extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codart;


	
	protected $descri;


	
	protected $cospro;


	
	protected $unimed;


	
	protected $conteo1 = 0;


	
	protected $conteo2 = 0;


	
	protected $dife;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodart()
	{

		return $this->codart; 		
	}
	
	public function getDescri()
	{

		return $this->descri; 		
	}
	
	public function getCospro()
	{

		return number_format($this->cospro,2,',','.');
		
	}
	
	public function getUnimed()
	{

		return $this->unimed; 		
	}
	
	public function getConteo1()
	{

		return number_format($this->conteo1,2,',','.');
		
	}
	
	public function getConteo2()
	{

		return number_format($this->conteo2,2,',','.');
		
	}
	
	public function getDife()
	{

		return number_format($this->dife,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodart($v)
	{

		if ($this->codart !== $v) {
			$this->codart = $v;
			$this->modifiedColumns[] = InventarioPeer::CODART;
		}

	} 
	
	public function setDescri($v)
	{

		if ($this->descri !== $v) {
			$this->descri = $v;
			$this->modifiedColumns[] = InventarioPeer::DESCRI;
		}

	} 
	
	public function setCospro($v)
	{

		if ($this->cospro !== $v) {
			$this->cospro = $v;
			$this->modifiedColumns[] = InventarioPeer::COSPRO;
		}

	} 
	
	public function setUnimed($v)
	{

		if ($this->unimed !== $v) {
			$this->unimed = $v;
			$this->modifiedColumns[] = InventarioPeer::UNIMED;
		}

	} 
	
	public function setConteo1($v)
	{

		if ($this->conteo1 !== $v || $v === 0) {
			$this->conteo1 = $v;
			$this->modifiedColumns[] = InventarioPeer::CONTEO1;
		}

	} 
	
	public function setConteo2($v)
	{

		if ($this->conteo2 !== $v || $v === 0) {
			$this->conteo2 = $v;
			$this->modifiedColumns[] = InventarioPeer::CONTEO2;
		}

	} 
	
	public function setDife($v)
	{

		if ($this->dife !== $v) {
			$this->dife = $v;
			$this->modifiedColumns[] = InventarioPeer::DIFE;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = InventarioPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codart = $rs->getString($startcol + 0);

			$this->descri = $rs->getString($startcol + 1);

			$this->cospro = $rs->getFloat($startcol + 2);

			$this->unimed = $rs->getString($startcol + 3);

			$this->conteo1 = $rs->getFloat($startcol + 4);

			$this->conteo2 = $rs->getFloat($startcol + 5);

			$this->dife = $rs->getFloat($startcol + 6);

			$this->id = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Inventario object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(InventarioPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			InventarioPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(InventarioPeer::DATABASE_NAME);
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
					$pk = InventarioPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += InventarioPeer::doUpdate($this, $con);
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


			if (($retval = InventarioPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InventarioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodart();
				break;
			case 1:
				return $this->getDescri();
				break;
			case 2:
				return $this->getCospro();
				break;
			case 3:
				return $this->getUnimed();
				break;
			case 4:
				return $this->getConteo1();
				break;
			case 5:
				return $this->getConteo2();
				break;
			case 6:
				return $this->getDife();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InventarioPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodart(),
			$keys[1] => $this->getDescri(),
			$keys[2] => $this->getCospro(),
			$keys[3] => $this->getUnimed(),
			$keys[4] => $this->getConteo1(),
			$keys[5] => $this->getConteo2(),
			$keys[6] => $this->getDife(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InventarioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodart($value);
				break;
			case 1:
				$this->setDescri($value);
				break;
			case 2:
				$this->setCospro($value);
				break;
			case 3:
				$this->setUnimed($value);
				break;
			case 4:
				$this->setConteo1($value);
				break;
			case 5:
				$this->setConteo2($value);
				break;
			case 6:
				$this->setDife($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InventarioPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodart($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescri($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCospro($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUnimed($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setConteo1($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setConteo2($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDife($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(InventarioPeer::DATABASE_NAME);

		if ($this->isColumnModified(InventarioPeer::CODART)) $criteria->add(InventarioPeer::CODART, $this->codart);
		if ($this->isColumnModified(InventarioPeer::DESCRI)) $criteria->add(InventarioPeer::DESCRI, $this->descri);
		if ($this->isColumnModified(InventarioPeer::COSPRO)) $criteria->add(InventarioPeer::COSPRO, $this->cospro);
		if ($this->isColumnModified(InventarioPeer::UNIMED)) $criteria->add(InventarioPeer::UNIMED, $this->unimed);
		if ($this->isColumnModified(InventarioPeer::CONTEO1)) $criteria->add(InventarioPeer::CONTEO1, $this->conteo1);
		if ($this->isColumnModified(InventarioPeer::CONTEO2)) $criteria->add(InventarioPeer::CONTEO2, $this->conteo2);
		if ($this->isColumnModified(InventarioPeer::DIFE)) $criteria->add(InventarioPeer::DIFE, $this->dife);
		if ($this->isColumnModified(InventarioPeer::ID)) $criteria->add(InventarioPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(InventarioPeer::DATABASE_NAME);

		$criteria->add(InventarioPeer::ID, $this->id);

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

		$copyObj->setCodart($this->codart);

		$copyObj->setDescri($this->descri);

		$copyObj->setCospro($this->cospro);

		$copyObj->setUnimed($this->unimed);

		$copyObj->setConteo1($this->conteo1);

		$copyObj->setConteo2($this->conteo2);

		$copyObj->setDife($this->dife);


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
			self::$peer = new InventarioPeer();
		}
		return self::$peer;
	}

} 