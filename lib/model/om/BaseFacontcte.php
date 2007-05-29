<?php


abstract class BaseFacontcte extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcli;


	
	protected $codcont;


	
	protected $corrcon;


	
	protected $nomcont;


	
	protected $carcont;


	
	protected $celcont;


	
	protected $tf1cont;


	
	protected $tf2cont;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcli()
	{

		return $this->codcli; 		
	}
	
	public function getCodcont()
	{

		return $this->codcont; 		
	}
	
	public function getCorrcon()
	{

		return $this->corrcon; 		
	}
	
	public function getNomcont()
	{

		return $this->nomcont; 		
	}
	
	public function getCarcont()
	{

		return $this->carcont; 		
	}
	
	public function getCelcont()
	{

		return $this->celcont; 		
	}
	
	public function getTf1cont()
	{

		return $this->tf1cont; 		
	}
	
	public function getTf2cont()
	{

		return $this->tf2cont; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodcli($v)
	{

		if ($this->codcli !== $v) {
			$this->codcli = $v;
			$this->modifiedColumns[] = FacontctePeer::CODCLI;
		}

	} 
	
	public function setCodcont($v)
	{

		if ($this->codcont !== $v) {
			$this->codcont = $v;
			$this->modifiedColumns[] = FacontctePeer::CODCONT;
		}

	} 
	
	public function setCorrcon($v)
	{

		if ($this->corrcon !== $v) {
			$this->corrcon = $v;
			$this->modifiedColumns[] = FacontctePeer::CORRCON;
		}

	} 
	
	public function setNomcont($v)
	{

		if ($this->nomcont !== $v) {
			$this->nomcont = $v;
			$this->modifiedColumns[] = FacontctePeer::NOMCONT;
		}

	} 
	
	public function setCarcont($v)
	{

		if ($this->carcont !== $v) {
			$this->carcont = $v;
			$this->modifiedColumns[] = FacontctePeer::CARCONT;
		}

	} 
	
	public function setCelcont($v)
	{

		if ($this->celcont !== $v) {
			$this->celcont = $v;
			$this->modifiedColumns[] = FacontctePeer::CELCONT;
		}

	} 
	
	public function setTf1cont($v)
	{

		if ($this->tf1cont !== $v) {
			$this->tf1cont = $v;
			$this->modifiedColumns[] = FacontctePeer::TF1CONT;
		}

	} 
	
	public function setTf2cont($v)
	{

		if ($this->tf2cont !== $v) {
			$this->tf2cont = $v;
			$this->modifiedColumns[] = FacontctePeer::TF2CONT;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FacontctePeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcli = $rs->getString($startcol + 0);

			$this->codcont = $rs->getString($startcol + 1);

			$this->corrcon = $rs->getString($startcol + 2);

			$this->nomcont = $rs->getString($startcol + 3);

			$this->carcont = $rs->getString($startcol + 4);

			$this->celcont = $rs->getString($startcol + 5);

			$this->tf1cont = $rs->getString($startcol + 6);

			$this->tf2cont = $rs->getString($startcol + 7);

			$this->id = $rs->getInt($startcol + 8);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Facontcte object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FacontctePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FacontctePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FacontctePeer::DATABASE_NAME);
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
					$pk = FacontctePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FacontctePeer::doUpdate($this, $con);
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


			if (($retval = FacontctePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FacontctePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcli();
				break;
			case 1:
				return $this->getCodcont();
				break;
			case 2:
				return $this->getCorrcon();
				break;
			case 3:
				return $this->getNomcont();
				break;
			case 4:
				return $this->getCarcont();
				break;
			case 5:
				return $this->getCelcont();
				break;
			case 6:
				return $this->getTf1cont();
				break;
			case 7:
				return $this->getTf2cont();
				break;
			case 8:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FacontctePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcli(),
			$keys[1] => $this->getCodcont(),
			$keys[2] => $this->getCorrcon(),
			$keys[3] => $this->getNomcont(),
			$keys[4] => $this->getCarcont(),
			$keys[5] => $this->getCelcont(),
			$keys[6] => $this->getTf1cont(),
			$keys[7] => $this->getTf2cont(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FacontctePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcli($value);
				break;
			case 1:
				$this->setCodcont($value);
				break;
			case 2:
				$this->setCorrcon($value);
				break;
			case 3:
				$this->setNomcont($value);
				break;
			case 4:
				$this->setCarcont($value);
				break;
			case 5:
				$this->setCelcont($value);
				break;
			case 6:
				$this->setTf1cont($value);
				break;
			case 7:
				$this->setTf2cont($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FacontctePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcli($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcont($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCorrcon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNomcont($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCarcont($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCelcont($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTf1cont($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTf2cont($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FacontctePeer::DATABASE_NAME);

		if ($this->isColumnModified(FacontctePeer::CODCLI)) $criteria->add(FacontctePeer::CODCLI, $this->codcli);
		if ($this->isColumnModified(FacontctePeer::CODCONT)) $criteria->add(FacontctePeer::CODCONT, $this->codcont);
		if ($this->isColumnModified(FacontctePeer::CORRCON)) $criteria->add(FacontctePeer::CORRCON, $this->corrcon);
		if ($this->isColumnModified(FacontctePeer::NOMCONT)) $criteria->add(FacontctePeer::NOMCONT, $this->nomcont);
		if ($this->isColumnModified(FacontctePeer::CARCONT)) $criteria->add(FacontctePeer::CARCONT, $this->carcont);
		if ($this->isColumnModified(FacontctePeer::CELCONT)) $criteria->add(FacontctePeer::CELCONT, $this->celcont);
		if ($this->isColumnModified(FacontctePeer::TF1CONT)) $criteria->add(FacontctePeer::TF1CONT, $this->tf1cont);
		if ($this->isColumnModified(FacontctePeer::TF2CONT)) $criteria->add(FacontctePeer::TF2CONT, $this->tf2cont);
		if ($this->isColumnModified(FacontctePeer::ID)) $criteria->add(FacontctePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FacontctePeer::DATABASE_NAME);

		$criteria->add(FacontctePeer::ID, $this->id);

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

		$copyObj->setCodcli($this->codcli);

		$copyObj->setCodcont($this->codcont);

		$copyObj->setCorrcon($this->corrcon);

		$copyObj->setNomcont($this->nomcont);

		$copyObj->setCarcont($this->carcont);

		$copyObj->setCelcont($this->celcont);

		$copyObj->setTf1cont($this->tf1cont);

		$copyObj->setTf2cont($this->tf2cont);


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
			self::$peer = new FacontctePeer();
		}
		return self::$peer;
	}

} 