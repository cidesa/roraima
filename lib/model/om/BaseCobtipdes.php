<?php


abstract class BaseCobtipdes extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coddes;


	
	protected $desdes;


	
	protected $codcon;


	
	protected $tipdes;


	
	protected $valdes;


	
	protected $diades;


	
	protected $estret;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCoddes()
	{

		return $this->coddes; 		
	}
	
	public function getDesdes()
	{

		return $this->desdes; 		
	}
	
	public function getCodcon()
	{

		return $this->codcon; 		
	}
	
	public function getTipdes()
	{

		return $this->tipdes; 		
	}
	
	public function getValdes()
	{

		return number_format($this->valdes,2,',','.');
		
	}
	
	public function getDiades()
	{

		return number_format($this->diades,2,',','.');
		
	}
	
	public function getEstret()
	{

		return $this->estret; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCoddes($v)
	{

		if ($this->coddes !== $v) {
			$this->coddes = $v;
			$this->modifiedColumns[] = CobtipdesPeer::CODDES;
		}

	} 
	
	public function setDesdes($v)
	{

		if ($this->desdes !== $v) {
			$this->desdes = $v;
			$this->modifiedColumns[] = CobtipdesPeer::DESDES;
		}

	} 
	
	public function setCodcon($v)
	{

		if ($this->codcon !== $v) {
			$this->codcon = $v;
			$this->modifiedColumns[] = CobtipdesPeer::CODCON;
		}

	} 
	
	public function setTipdes($v)
	{

		if ($this->tipdes !== $v) {
			$this->tipdes = $v;
			$this->modifiedColumns[] = CobtipdesPeer::TIPDES;
		}

	} 
	
	public function setValdes($v)
	{

		if ($this->valdes !== $v) {
			$this->valdes = $v;
			$this->modifiedColumns[] = CobtipdesPeer::VALDES;
		}

	} 
	
	public function setDiades($v)
	{

		if ($this->diades !== $v) {
			$this->diades = $v;
			$this->modifiedColumns[] = CobtipdesPeer::DIADES;
		}

	} 
	
	public function setEstret($v)
	{

		if ($this->estret !== $v) {
			$this->estret = $v;
			$this->modifiedColumns[] = CobtipdesPeer::ESTRET;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CobtipdesPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->coddes = $rs->getString($startcol + 0);

			$this->desdes = $rs->getString($startcol + 1);

			$this->codcon = $rs->getString($startcol + 2);

			$this->tipdes = $rs->getString($startcol + 3);

			$this->valdes = $rs->getFloat($startcol + 4);

			$this->diades = $rs->getFloat($startcol + 5);

			$this->estret = $rs->getString($startcol + 6);

			$this->id = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cobtipdes object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CobtipdesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CobtipdesPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CobtipdesPeer::DATABASE_NAME);
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
					$pk = CobtipdesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CobtipdesPeer::doUpdate($this, $con);
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


			if (($retval = CobtipdesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CobtipdesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoddes();
				break;
			case 1:
				return $this->getDesdes();
				break;
			case 2:
				return $this->getCodcon();
				break;
			case 3:
				return $this->getTipdes();
				break;
			case 4:
				return $this->getValdes();
				break;
			case 5:
				return $this->getDiades();
				break;
			case 6:
				return $this->getEstret();
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
		$keys = CobtipdesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoddes(),
			$keys[1] => $this->getDesdes(),
			$keys[2] => $this->getCodcon(),
			$keys[3] => $this->getTipdes(),
			$keys[4] => $this->getValdes(),
			$keys[5] => $this->getDiades(),
			$keys[6] => $this->getEstret(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CobtipdesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoddes($value);
				break;
			case 1:
				$this->setDesdes($value);
				break;
			case 2:
				$this->setCodcon($value);
				break;
			case 3:
				$this->setTipdes($value);
				break;
			case 4:
				$this->setValdes($value);
				break;
			case 5:
				$this->setDiades($value);
				break;
			case 6:
				$this->setEstret($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CobtipdesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoddes($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesdes($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipdes($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setValdes($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDiades($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setEstret($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CobtipdesPeer::DATABASE_NAME);

		if ($this->isColumnModified(CobtipdesPeer::CODDES)) $criteria->add(CobtipdesPeer::CODDES, $this->coddes);
		if ($this->isColumnModified(CobtipdesPeer::DESDES)) $criteria->add(CobtipdesPeer::DESDES, $this->desdes);
		if ($this->isColumnModified(CobtipdesPeer::CODCON)) $criteria->add(CobtipdesPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(CobtipdesPeer::TIPDES)) $criteria->add(CobtipdesPeer::TIPDES, $this->tipdes);
		if ($this->isColumnModified(CobtipdesPeer::VALDES)) $criteria->add(CobtipdesPeer::VALDES, $this->valdes);
		if ($this->isColumnModified(CobtipdesPeer::DIADES)) $criteria->add(CobtipdesPeer::DIADES, $this->diades);
		if ($this->isColumnModified(CobtipdesPeer::ESTRET)) $criteria->add(CobtipdesPeer::ESTRET, $this->estret);
		if ($this->isColumnModified(CobtipdesPeer::ID)) $criteria->add(CobtipdesPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CobtipdesPeer::DATABASE_NAME);

		$criteria->add(CobtipdesPeer::ID, $this->id);

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

		$copyObj->setCoddes($this->coddes);

		$copyObj->setDesdes($this->desdes);

		$copyObj->setCodcon($this->codcon);

		$copyObj->setTipdes($this->tipdes);

		$copyObj->setValdes($this->valdes);

		$copyObj->setDiades($this->diades);

		$copyObj->setEstret($this->estret);


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
			self::$peer = new CobtipdesPeer();
		}
		return self::$peer;
	}

} 