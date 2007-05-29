<?php


abstract class BaseCsdetsol extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numsol;


	
	protected $codart;


	
	protected $codtip;


	
	protected $cantidad;


	
	protected $formato;


	
	protected $programa;


	
	protected $canpre;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNumsol()
	{

		return $this->numsol; 		
	}
	
	public function getCodart()
	{

		return $this->codart; 		
	}
	
	public function getCodtip()
	{

		return $this->codtip; 		
	}
	
	public function getCantidad()
	{

		return number_format($this->cantidad,2,',','.');
		
	}
	
	public function getFormato()
	{

		return $this->formato; 		
	}
	
	public function getPrograma()
	{

		return $this->programa; 		
	}
	
	public function getCanpre()
	{

		return number_format($this->canpre,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setNumsol($v)
	{

		if ($this->numsol !== $v) {
			$this->numsol = $v;
			$this->modifiedColumns[] = CsdetsolPeer::NUMSOL;
		}

	} 
	
	public function setCodart($v)
	{

		if ($this->codart !== $v) {
			$this->codart = $v;
			$this->modifiedColumns[] = CsdetsolPeer::CODART;
		}

	} 
	
	public function setCodtip($v)
	{

		if ($this->codtip !== $v) {
			$this->codtip = $v;
			$this->modifiedColumns[] = CsdetsolPeer::CODTIP;
		}

	} 
	
	public function setCantidad($v)
	{

		if ($this->cantidad !== $v) {
			$this->cantidad = $v;
			$this->modifiedColumns[] = CsdetsolPeer::CANTIDAD;
		}

	} 
	
	public function setFormato($v)
	{

		if ($this->formato !== $v) {
			$this->formato = $v;
			$this->modifiedColumns[] = CsdetsolPeer::FORMATO;
		}

	} 
	
	public function setPrograma($v)
	{

		if ($this->programa !== $v) {
			$this->programa = $v;
			$this->modifiedColumns[] = CsdetsolPeer::PROGRAMA;
		}

	} 
	
	public function setCanpre($v)
	{

		if ($this->canpre !== $v) {
			$this->canpre = $v;
			$this->modifiedColumns[] = CsdetsolPeer::CANPRE;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CsdetsolPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->numsol = $rs->getString($startcol + 0);

			$this->codart = $rs->getString($startcol + 1);

			$this->codtip = $rs->getString($startcol + 2);

			$this->cantidad = $rs->getFloat($startcol + 3);

			$this->formato = $rs->getString($startcol + 4);

			$this->programa = $rs->getString($startcol + 5);

			$this->canpre = $rs->getFloat($startcol + 6);

			$this->id = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Csdetsol object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CsdetsolPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CsdetsolPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CsdetsolPeer::DATABASE_NAME);
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
					$pk = CsdetsolPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CsdetsolPeer::doUpdate($this, $con);
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


			if (($retval = CsdetsolPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CsdetsolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumsol();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getCodtip();
				break;
			case 3:
				return $this->getCantidad();
				break;
			case 4:
				return $this->getFormato();
				break;
			case 5:
				return $this->getPrograma();
				break;
			case 6:
				return $this->getCanpre();
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
		$keys = CsdetsolPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumsol(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCodtip(),
			$keys[3] => $this->getCantidad(),
			$keys[4] => $this->getFormato(),
			$keys[5] => $this->getPrograma(),
			$keys[6] => $this->getCanpre(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CsdetsolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumsol($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setCodtip($value);
				break;
			case 3:
				$this->setCantidad($value);
				break;
			case 4:
				$this->setFormato($value);
				break;
			case 5:
				$this->setPrograma($value);
				break;
			case 6:
				$this->setCanpre($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CsdetsolPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumsol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodtip($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCantidad($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFormato($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPrograma($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCanpre($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CsdetsolPeer::DATABASE_NAME);

		if ($this->isColumnModified(CsdetsolPeer::NUMSOL)) $criteria->add(CsdetsolPeer::NUMSOL, $this->numsol);
		if ($this->isColumnModified(CsdetsolPeer::CODART)) $criteria->add(CsdetsolPeer::CODART, $this->codart);
		if ($this->isColumnModified(CsdetsolPeer::CODTIP)) $criteria->add(CsdetsolPeer::CODTIP, $this->codtip);
		if ($this->isColumnModified(CsdetsolPeer::CANTIDAD)) $criteria->add(CsdetsolPeer::CANTIDAD, $this->cantidad);
		if ($this->isColumnModified(CsdetsolPeer::FORMATO)) $criteria->add(CsdetsolPeer::FORMATO, $this->formato);
		if ($this->isColumnModified(CsdetsolPeer::PROGRAMA)) $criteria->add(CsdetsolPeer::PROGRAMA, $this->programa);
		if ($this->isColumnModified(CsdetsolPeer::CANPRE)) $criteria->add(CsdetsolPeer::CANPRE, $this->canpre);
		if ($this->isColumnModified(CsdetsolPeer::ID)) $criteria->add(CsdetsolPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CsdetsolPeer::DATABASE_NAME);

		$criteria->add(CsdetsolPeer::ID, $this->id);

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

		$copyObj->setNumsol($this->numsol);

		$copyObj->setCodart($this->codart);

		$copyObj->setCodtip($this->codtip);

		$copyObj->setCantidad($this->cantidad);

		$copyObj->setFormato($this->formato);

		$copyObj->setPrograma($this->programa);

		$copyObj->setCanpre($this->canpre);


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
			self::$peer = new CsdetsolPeer();
		}
		return self::$peer;
	}

} 