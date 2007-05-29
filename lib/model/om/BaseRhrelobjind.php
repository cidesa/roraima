<?php


abstract class BaseRhrelobjind extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codevdo;


	
	protected $codniv;


	
	protected $codobj;


	
	protected $codind;


	
	protected $pesobj;


	
	protected $plaobj;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodevdo()
	{

		return $this->codevdo; 		
	}
	
	public function getCodniv()
	{

		return $this->codniv; 		
	}
	
	public function getCodobj()
	{

		return $this->codobj; 		
	}
	
	public function getCodind()
	{

		return $this->codind; 		
	}
	
	public function getPesobj()
	{

		return number_format($this->pesobj,2,',','.');
		
	}
	
	public function getPlaobj()
	{

		return number_format($this->plaobj,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodevdo($v)
	{

		if ($this->codevdo !== $v) {
			$this->codevdo = $v;
			$this->modifiedColumns[] = RhrelobjindPeer::CODEVDO;
		}

	} 
	
	public function setCodniv($v)
	{

		if ($this->codniv !== $v) {
			$this->codniv = $v;
			$this->modifiedColumns[] = RhrelobjindPeer::CODNIV;
		}

	} 
	
	public function setCodobj($v)
	{

		if ($this->codobj !== $v) {
			$this->codobj = $v;
			$this->modifiedColumns[] = RhrelobjindPeer::CODOBJ;
		}

	} 
	
	public function setCodind($v)
	{

		if ($this->codind !== $v) {
			$this->codind = $v;
			$this->modifiedColumns[] = RhrelobjindPeer::CODIND;
		}

	} 
	
	public function setPesobj($v)
	{

		if ($this->pesobj !== $v) {
			$this->pesobj = $v;
			$this->modifiedColumns[] = RhrelobjindPeer::PESOBJ;
		}

	} 
	
	public function setPlaobj($v)
	{

		if ($this->plaobj !== $v) {
			$this->plaobj = $v;
			$this->modifiedColumns[] = RhrelobjindPeer::PLAOBJ;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RhrelobjindPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codevdo = $rs->getString($startcol + 0);

			$this->codniv = $rs->getString($startcol + 1);

			$this->codobj = $rs->getString($startcol + 2);

			$this->codind = $rs->getString($startcol + 3);

			$this->pesobj = $rs->getFloat($startcol + 4);

			$this->plaobj = $rs->getFloat($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Rhrelobjind object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RhrelobjindPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RhrelobjindPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RhrelobjindPeer::DATABASE_NAME);
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
					$pk = RhrelobjindPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += RhrelobjindPeer::doUpdate($this, $con);
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


			if (($retval = RhrelobjindPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhrelobjindPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodevdo();
				break;
			case 1:
				return $this->getCodniv();
				break;
			case 2:
				return $this->getCodobj();
				break;
			case 3:
				return $this->getCodind();
				break;
			case 4:
				return $this->getPesobj();
				break;
			case 5:
				return $this->getPlaobj();
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
		$keys = RhrelobjindPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodevdo(),
			$keys[1] => $this->getCodniv(),
			$keys[2] => $this->getCodobj(),
			$keys[3] => $this->getCodind(),
			$keys[4] => $this->getPesobj(),
			$keys[5] => $this->getPlaobj(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhrelobjindPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodevdo($value);
				break;
			case 1:
				$this->setCodniv($value);
				break;
			case 2:
				$this->setCodobj($value);
				break;
			case 3:
				$this->setCodind($value);
				break;
			case 4:
				$this->setPesobj($value);
				break;
			case 5:
				$this->setPlaobj($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RhrelobjindPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodevdo($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodniv($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodobj($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodind($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPesobj($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPlaobj($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RhrelobjindPeer::DATABASE_NAME);

		if ($this->isColumnModified(RhrelobjindPeer::CODEVDO)) $criteria->add(RhrelobjindPeer::CODEVDO, $this->codevdo);
		if ($this->isColumnModified(RhrelobjindPeer::CODNIV)) $criteria->add(RhrelobjindPeer::CODNIV, $this->codniv);
		if ($this->isColumnModified(RhrelobjindPeer::CODOBJ)) $criteria->add(RhrelobjindPeer::CODOBJ, $this->codobj);
		if ($this->isColumnModified(RhrelobjindPeer::CODIND)) $criteria->add(RhrelobjindPeer::CODIND, $this->codind);
		if ($this->isColumnModified(RhrelobjindPeer::PESOBJ)) $criteria->add(RhrelobjindPeer::PESOBJ, $this->pesobj);
		if ($this->isColumnModified(RhrelobjindPeer::PLAOBJ)) $criteria->add(RhrelobjindPeer::PLAOBJ, $this->plaobj);
		if ($this->isColumnModified(RhrelobjindPeer::ID)) $criteria->add(RhrelobjindPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RhrelobjindPeer::DATABASE_NAME);

		$criteria->add(RhrelobjindPeer::ID, $this->id);

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

		$copyObj->setCodevdo($this->codevdo);

		$copyObj->setCodniv($this->codniv);

		$copyObj->setCodobj($this->codobj);

		$copyObj->setCodind($this->codind);

		$copyObj->setPesobj($this->pesobj);

		$copyObj->setPlaobj($this->plaobj);


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
			self::$peer = new RhrelobjindPeer();
		}
		return self::$peer;
	}

} 