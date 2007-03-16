<?php


abstract class BaseCaartalm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codalm;


	
	protected $codart;


	
	protected $codubi;


	
	protected $eximin;


	
	protected $eximax;


	
	protected $exiact;


	
	protected $ptoreo;


	
	protected $pedmin;


	
	protected $pedmax;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodalm()
	{

		return $this->codalm;
	}

	
	public function getCodart()
	{

		return $this->codart;
	}

	
	public function getCodubi()
	{

		return $this->codubi;
	}

	
	public function getEximin()
	{

		return $this->eximin;
	}

	
	public function getEximax()
	{

		return $this->eximax;
	}

	
	public function getExiact()
	{

		return $this->exiact;
	}

	
	public function getPtoreo()
	{

		return $this->ptoreo;
	}

	
	public function getPedmin()
	{

		return $this->pedmin;
	}

	
	public function getPedmax()
	{

		return $this->pedmax;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodalm($v)
	{

		if ($this->codalm !== $v) {
			$this->codalm = $v;
			$this->modifiedColumns[] = CaartalmPeer::CODALM;
		}

	} 
	
	public function setCodart($v)
	{

		if ($this->codart !== $v) {
			$this->codart = $v;
			$this->modifiedColumns[] = CaartalmPeer::CODART;
		}

	} 
	
	public function setCodubi($v)
	{

		if ($this->codubi !== $v) {
			$this->codubi = $v;
			$this->modifiedColumns[] = CaartalmPeer::CODUBI;
		}

	} 
	
	public function setEximin($v)
	{

		if ($this->eximin !== $v) {
			$this->eximin = $v;
			$this->modifiedColumns[] = CaartalmPeer::EXIMIN;
		}

	} 
	
	public function setEximax($v)
	{

		if ($this->eximax !== $v) {
			$this->eximax = $v;
			$this->modifiedColumns[] = CaartalmPeer::EXIMAX;
		}

	} 
	
	public function setExiact($v)
	{

		if ($this->exiact !== $v) {
			$this->exiact = $v;
			$this->modifiedColumns[] = CaartalmPeer::EXIACT;
		}

	} 
	
	public function setPtoreo($v)
	{

		if ($this->ptoreo !== $v) {
			$this->ptoreo = $v;
			$this->modifiedColumns[] = CaartalmPeer::PTOREO;
		}

	} 
	
	public function setPedmin($v)
	{

		if ($this->pedmin !== $v) {
			$this->pedmin = $v;
			$this->modifiedColumns[] = CaartalmPeer::PEDMIN;
		}

	} 
	
	public function setPedmax($v)
	{

		if ($this->pedmax !== $v) {
			$this->pedmax = $v;
			$this->modifiedColumns[] = CaartalmPeer::PEDMAX;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CaartalmPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codalm = $rs->getString($startcol + 0);

			$this->codart = $rs->getString($startcol + 1);

			$this->codubi = $rs->getString($startcol + 2);

			$this->eximin = $rs->getFloat($startcol + 3);

			$this->eximax = $rs->getFloat($startcol + 4);

			$this->exiact = $rs->getFloat($startcol + 5);

			$this->ptoreo = $rs->getFloat($startcol + 6);

			$this->pedmin = $rs->getFloat($startcol + 7);

			$this->pedmax = $rs->getFloat($startcol + 8);

			$this->id = $rs->getInt($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Caartalm object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CaartalmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CaartalmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CaartalmPeer::DATABASE_NAME);
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
					$pk = CaartalmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CaartalmPeer::doUpdate($this, $con);
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


			if (($retval = CaartalmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaartalmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodalm();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getCodubi();
				break;
			case 3:
				return $this->getEximin();
				break;
			case 4:
				return $this->getEximax();
				break;
			case 5:
				return $this->getExiact();
				break;
			case 6:
				return $this->getPtoreo();
				break;
			case 7:
				return $this->getPedmin();
				break;
			case 8:
				return $this->getPedmax();
				break;
			case 9:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaartalmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodalm(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCodubi(),
			$keys[3] => $this->getEximin(),
			$keys[4] => $this->getEximax(),
			$keys[5] => $this->getExiact(),
			$keys[6] => $this->getPtoreo(),
			$keys[7] => $this->getPedmin(),
			$keys[8] => $this->getPedmax(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaartalmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodalm($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setCodubi($value);
				break;
			case 3:
				$this->setEximin($value);
				break;
			case 4:
				$this->setEximax($value);
				break;
			case 5:
				$this->setExiact($value);
				break;
			case 6:
				$this->setPtoreo($value);
				break;
			case 7:
				$this->setPedmin($value);
				break;
			case 8:
				$this->setPedmax($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaartalmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodalm($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodubi($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEximin($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEximax($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setExiact($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPtoreo($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPedmin($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPedmax($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CaartalmPeer::DATABASE_NAME);

		if ($this->isColumnModified(CaartalmPeer::CODALM)) $criteria->add(CaartalmPeer::CODALM, $this->codalm);
		if ($this->isColumnModified(CaartalmPeer::CODART)) $criteria->add(CaartalmPeer::CODART, $this->codart);
		if ($this->isColumnModified(CaartalmPeer::CODUBI)) $criteria->add(CaartalmPeer::CODUBI, $this->codubi);
		if ($this->isColumnModified(CaartalmPeer::EXIMIN)) $criteria->add(CaartalmPeer::EXIMIN, $this->eximin);
		if ($this->isColumnModified(CaartalmPeer::EXIMAX)) $criteria->add(CaartalmPeer::EXIMAX, $this->eximax);
		if ($this->isColumnModified(CaartalmPeer::EXIACT)) $criteria->add(CaartalmPeer::EXIACT, $this->exiact);
		if ($this->isColumnModified(CaartalmPeer::PTOREO)) $criteria->add(CaartalmPeer::PTOREO, $this->ptoreo);
		if ($this->isColumnModified(CaartalmPeer::PEDMIN)) $criteria->add(CaartalmPeer::PEDMIN, $this->pedmin);
		if ($this->isColumnModified(CaartalmPeer::PEDMAX)) $criteria->add(CaartalmPeer::PEDMAX, $this->pedmax);
		if ($this->isColumnModified(CaartalmPeer::ID)) $criteria->add(CaartalmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CaartalmPeer::DATABASE_NAME);

		$criteria->add(CaartalmPeer::ID, $this->id);

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

		$copyObj->setCodalm($this->codalm);

		$copyObj->setCodart($this->codart);

		$copyObj->setCodubi($this->codubi);

		$copyObj->setEximin($this->eximin);

		$copyObj->setEximax($this->eximax);

		$copyObj->setExiact($this->exiact);

		$copyObj->setPtoreo($this->ptoreo);

		$copyObj->setPedmin($this->pedmin);

		$copyObj->setPedmax($this->pedmax);


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
			self::$peer = new CaartalmPeer();
		}
		return self::$peer;
	}

} 