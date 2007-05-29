<?php


abstract class BaseOctipret extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtip;


	
	protected $destip;


	
	protected $codcon;


	
	protected $basimp;


	
	protected $porret;


	
	protected $unitri;


	
	protected $factor;


	
	protected $porsus;


	
	protected $stamon;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodtip()
	{

		return $this->codtip; 		
	}
	
	public function getDestip()
	{

		return $this->destip; 		
	}
	
	public function getCodcon()
	{

		return $this->codcon; 		
	}
	
	public function getBasimp()
	{

		return number_format($this->basimp,2,',','.');
		
	}
	
	public function getPorret()
	{

		return number_format($this->porret,2,',','.');
		
	}
	
	public function getUnitri()
	{

		return number_format($this->unitri,2,',','.');
		
	}
	
	public function getFactor()
	{

		return number_format($this->factor,2,',','.');
		
	}
	
	public function getPorsus()
	{

		return number_format($this->porsus,2,',','.');
		
	}
	
	public function getStamon()
	{

		return $this->stamon; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodtip($v)
	{

		if ($this->codtip !== $v) {
			$this->codtip = $v;
			$this->modifiedColumns[] = OctipretPeer::CODTIP;
		}

	} 
	
	public function setDestip($v)
	{

		if ($this->destip !== $v) {
			$this->destip = $v;
			$this->modifiedColumns[] = OctipretPeer::DESTIP;
		}

	} 
	
	public function setCodcon($v)
	{

		if ($this->codcon !== $v) {
			$this->codcon = $v;
			$this->modifiedColumns[] = OctipretPeer::CODCON;
		}

	} 
	
	public function setBasimp($v)
	{

		if ($this->basimp !== $v) {
			$this->basimp = $v;
			$this->modifiedColumns[] = OctipretPeer::BASIMP;
		}

	} 
	
	public function setPorret($v)
	{

		if ($this->porret !== $v) {
			$this->porret = $v;
			$this->modifiedColumns[] = OctipretPeer::PORRET;
		}

	} 
	
	public function setUnitri($v)
	{

		if ($this->unitri !== $v) {
			$this->unitri = $v;
			$this->modifiedColumns[] = OctipretPeer::UNITRI;
		}

	} 
	
	public function setFactor($v)
	{

		if ($this->factor !== $v) {
			$this->factor = $v;
			$this->modifiedColumns[] = OctipretPeer::FACTOR;
		}

	} 
	
	public function setPorsus($v)
	{

		if ($this->porsus !== $v) {
			$this->porsus = $v;
			$this->modifiedColumns[] = OctipretPeer::PORSUS;
		}

	} 
	
	public function setStamon($v)
	{

		if ($this->stamon !== $v) {
			$this->stamon = $v;
			$this->modifiedColumns[] = OctipretPeer::STAMON;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OctipretPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codtip = $rs->getString($startcol + 0);

			$this->destip = $rs->getString($startcol + 1);

			$this->codcon = $rs->getString($startcol + 2);

			$this->basimp = $rs->getFloat($startcol + 3);

			$this->porret = $rs->getFloat($startcol + 4);

			$this->unitri = $rs->getFloat($startcol + 5);

			$this->factor = $rs->getFloat($startcol + 6);

			$this->porsus = $rs->getFloat($startcol + 7);

			$this->stamon = $rs->getString($startcol + 8);

			$this->id = $rs->getInt($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Octipret object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OctipretPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OctipretPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OctipretPeer::DATABASE_NAME);
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
					$pk = OctipretPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += OctipretPeer::doUpdate($this, $con);
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


			if (($retval = OctipretPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OctipretPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtip();
				break;
			case 1:
				return $this->getDestip();
				break;
			case 2:
				return $this->getCodcon();
				break;
			case 3:
				return $this->getBasimp();
				break;
			case 4:
				return $this->getPorret();
				break;
			case 5:
				return $this->getUnitri();
				break;
			case 6:
				return $this->getFactor();
				break;
			case 7:
				return $this->getPorsus();
				break;
			case 8:
				return $this->getStamon();
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
		$keys = OctipretPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtip(),
			$keys[1] => $this->getDestip(),
			$keys[2] => $this->getCodcon(),
			$keys[3] => $this->getBasimp(),
			$keys[4] => $this->getPorret(),
			$keys[5] => $this->getUnitri(),
			$keys[6] => $this->getFactor(),
			$keys[7] => $this->getPorsus(),
			$keys[8] => $this->getStamon(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OctipretPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtip($value);
				break;
			case 1:
				$this->setDestip($value);
				break;
			case 2:
				$this->setCodcon($value);
				break;
			case 3:
				$this->setBasimp($value);
				break;
			case 4:
				$this->setPorret($value);
				break;
			case 5:
				$this->setUnitri($value);
				break;
			case 6:
				$this->setFactor($value);
				break;
			case 7:
				$this->setPorsus($value);
				break;
			case 8:
				$this->setStamon($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OctipretPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtip($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDestip($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setBasimp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPorret($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUnitri($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFactor($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPorsus($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setStamon($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OctipretPeer::DATABASE_NAME);

		if ($this->isColumnModified(OctipretPeer::CODTIP)) $criteria->add(OctipretPeer::CODTIP, $this->codtip);
		if ($this->isColumnModified(OctipretPeer::DESTIP)) $criteria->add(OctipretPeer::DESTIP, $this->destip);
		if ($this->isColumnModified(OctipretPeer::CODCON)) $criteria->add(OctipretPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(OctipretPeer::BASIMP)) $criteria->add(OctipretPeer::BASIMP, $this->basimp);
		if ($this->isColumnModified(OctipretPeer::PORRET)) $criteria->add(OctipretPeer::PORRET, $this->porret);
		if ($this->isColumnModified(OctipretPeer::UNITRI)) $criteria->add(OctipretPeer::UNITRI, $this->unitri);
		if ($this->isColumnModified(OctipretPeer::FACTOR)) $criteria->add(OctipretPeer::FACTOR, $this->factor);
		if ($this->isColumnModified(OctipretPeer::PORSUS)) $criteria->add(OctipretPeer::PORSUS, $this->porsus);
		if ($this->isColumnModified(OctipretPeer::STAMON)) $criteria->add(OctipretPeer::STAMON, $this->stamon);
		if ($this->isColumnModified(OctipretPeer::ID)) $criteria->add(OctipretPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OctipretPeer::DATABASE_NAME);

		$criteria->add(OctipretPeer::ID, $this->id);

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

		$copyObj->setCodtip($this->codtip);

		$copyObj->setDestip($this->destip);

		$copyObj->setCodcon($this->codcon);

		$copyObj->setBasimp($this->basimp);

		$copyObj->setPorret($this->porret);

		$copyObj->setUnitri($this->unitri);

		$copyObj->setFactor($this->factor);

		$copyObj->setPorsus($this->porsus);

		$copyObj->setStamon($this->stamon);


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
			self::$peer = new OctipretPeer();
		}
		return self::$peer;
	}

} 