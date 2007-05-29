<?php


abstract class BaseFaforpag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $reffac;


	
	protected $tippag;


	
	protected $nropag;


	
	protected $nomban;


	
	protected $monpag;


	
	protected $numero;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getReffac()
	{

		return $this->reffac; 		
	}
	
	public function getTippag()
	{

		return $this->tippag; 		
	}
	
	public function getNropag()
	{

		return $this->nropag; 		
	}
	
	public function getNomban()
	{

		return $this->nomban; 		
	}
	
	public function getMonpag()
	{

		return number_format($this->monpag,2,',','.');
		
	}
	
	public function getNumero()
	{

		return $this->numero; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setReffac($v)
	{

		if ($this->reffac !== $v) {
			$this->reffac = $v;
			$this->modifiedColumns[] = FaforpagPeer::REFFAC;
		}

	} 
	
	public function setTippag($v)
	{

		if ($this->tippag !== $v) {
			$this->tippag = $v;
			$this->modifiedColumns[] = FaforpagPeer::TIPPAG;
		}

	} 
	
	public function setNropag($v)
	{

		if ($this->nropag !== $v) {
			$this->nropag = $v;
			$this->modifiedColumns[] = FaforpagPeer::NROPAG;
		}

	} 
	
	public function setNomban($v)
	{

		if ($this->nomban !== $v) {
			$this->nomban = $v;
			$this->modifiedColumns[] = FaforpagPeer::NOMBAN;
		}

	} 
	
	public function setMonpag($v)
	{

		if ($this->monpag !== $v) {
			$this->monpag = $v;
			$this->modifiedColumns[] = FaforpagPeer::MONPAG;
		}

	} 
	
	public function setNumero($v)
	{

		if ($this->numero !== $v) {
			$this->numero = $v;
			$this->modifiedColumns[] = FaforpagPeer::NUMERO;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FaforpagPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->reffac = $rs->getString($startcol + 0);

			$this->tippag = $rs->getString($startcol + 1);

			$this->nropag = $rs->getString($startcol + 2);

			$this->nomban = $rs->getString($startcol + 3);

			$this->monpag = $rs->getFloat($startcol + 4);

			$this->numero = $rs->getString($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Faforpag object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FaforpagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FaforpagPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FaforpagPeer::DATABASE_NAME);
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
					$pk = FaforpagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FaforpagPeer::doUpdate($this, $con);
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


			if (($retval = FaforpagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaforpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getReffac();
				break;
			case 1:
				return $this->getTippag();
				break;
			case 2:
				return $this->getNropag();
				break;
			case 3:
				return $this->getNomban();
				break;
			case 4:
				return $this->getMonpag();
				break;
			case 5:
				return $this->getNumero();
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
		$keys = FaforpagPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getReffac(),
			$keys[1] => $this->getTippag(),
			$keys[2] => $this->getNropag(),
			$keys[3] => $this->getNomban(),
			$keys[4] => $this->getMonpag(),
			$keys[5] => $this->getNumero(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaforpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setReffac($value);
				break;
			case 1:
				$this->setTippag($value);
				break;
			case 2:
				$this->setNropag($value);
				break;
			case 3:
				$this->setNomban($value);
				break;
			case 4:
				$this->setMonpag($value);
				break;
			case 5:
				$this->setNumero($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaforpagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setReffac($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTippag($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNropag($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNomban($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonpag($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNumero($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FaforpagPeer::DATABASE_NAME);

		if ($this->isColumnModified(FaforpagPeer::REFFAC)) $criteria->add(FaforpagPeer::REFFAC, $this->reffac);
		if ($this->isColumnModified(FaforpagPeer::TIPPAG)) $criteria->add(FaforpagPeer::TIPPAG, $this->tippag);
		if ($this->isColumnModified(FaforpagPeer::NROPAG)) $criteria->add(FaforpagPeer::NROPAG, $this->nropag);
		if ($this->isColumnModified(FaforpagPeer::NOMBAN)) $criteria->add(FaforpagPeer::NOMBAN, $this->nomban);
		if ($this->isColumnModified(FaforpagPeer::MONPAG)) $criteria->add(FaforpagPeer::MONPAG, $this->monpag);
		if ($this->isColumnModified(FaforpagPeer::NUMERO)) $criteria->add(FaforpagPeer::NUMERO, $this->numero);
		if ($this->isColumnModified(FaforpagPeer::ID)) $criteria->add(FaforpagPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FaforpagPeer::DATABASE_NAME);

		$criteria->add(FaforpagPeer::ID, $this->id);

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

		$copyObj->setReffac($this->reffac);

		$copyObj->setTippag($this->tippag);

		$copyObj->setNropag($this->nropag);

		$copyObj->setNomban($this->nomban);

		$copyObj->setMonpag($this->monpag);

		$copyObj->setNumero($this->numero);


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
			self::$peer = new FaforpagPeer();
		}
		return self::$peer;
	}

} 