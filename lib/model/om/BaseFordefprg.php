<?php


abstract class BaseFordefprg extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codprg;


	
	protected $desprg;


	
	protected $prbasoprg;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodprg()
	{

		return $this->codprg;
	}

	
	public function getDesprg()
	{

		return $this->desprg;
	}

	
	public function getPrbasoprg()
	{

		return $this->prbasoprg;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodprg($v)
	{

		if ($this->codprg !== $v) {
			$this->codprg = $v;
			$this->modifiedColumns[] = FordefprgPeer::CODPRG;
		}

	} 
	
	public function setDesprg($v)
	{

		if ($this->desprg !== $v) {
			$this->desprg = $v;
			$this->modifiedColumns[] = FordefprgPeer::DESPRG;
		}

	} 
	
	public function setPrbasoprg($v)
	{

		if ($this->prbasoprg !== $v) {
			$this->prbasoprg = $v;
			$this->modifiedColumns[] = FordefprgPeer::PRBASOPRG;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FordefprgPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codprg = $rs->getString($startcol + 0);

			$this->desprg = $rs->getString($startcol + 1);

			$this->prbasoprg = $rs->getString($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fordefprg object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FordefprgPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FordefprgPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FordefprgPeer::DATABASE_NAME);
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
					$pk = FordefprgPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FordefprgPeer::doUpdate($this, $con);
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


			if (($retval = FordefprgPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefprgPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodprg();
				break;
			case 1:
				return $this->getDesprg();
				break;
			case 2:
				return $this->getPrbasoprg();
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
		$keys = FordefprgPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodprg(),
			$keys[1] => $this->getDesprg(),
			$keys[2] => $this->getPrbasoprg(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefprgPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodprg($value);
				break;
			case 1:
				$this->setDesprg($value);
				break;
			case 2:
				$this->setPrbasoprg($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordefprgPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodprg($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesprg($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPrbasoprg($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FordefprgPeer::DATABASE_NAME);

		if ($this->isColumnModified(FordefprgPeer::CODPRG)) $criteria->add(FordefprgPeer::CODPRG, $this->codprg);
		if ($this->isColumnModified(FordefprgPeer::DESPRG)) $criteria->add(FordefprgPeer::DESPRG, $this->desprg);
		if ($this->isColumnModified(FordefprgPeer::PRBASOPRG)) $criteria->add(FordefprgPeer::PRBASOPRG, $this->prbasoprg);
		if ($this->isColumnModified(FordefprgPeer::ID)) $criteria->add(FordefprgPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FordefprgPeer::DATABASE_NAME);

		$criteria->add(FordefprgPeer::ID, $this->id);

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

		$copyObj->setCodprg($this->codprg);

		$copyObj->setDesprg($this->desprg);

		$copyObj->setPrbasoprg($this->prbasoprg);


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
			self::$peer = new FordefprgPeer();
		}
		return self::$peer;
	}

} 