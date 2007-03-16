<?php


abstract class BaseCaartdph extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $dphart;


	
	protected $codart;


	
	protected $codcat;


	
	protected $candph;


	
	protected $candev;


	
	protected $cantot;


	
	protected $montot;


	
	protected $numlot;


	
	protected $canent;


	
	protected $codfal;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getDphart()
	{

		return $this->dphart;
	}

	
	public function getCodart()
	{

		return $this->codart;
	}

	
	public function getCodcat()
	{

		return $this->codcat;
	}

	
	public function getCandph()
	{

		return $this->candph;
	}

	
	public function getCandev()
	{

		return $this->candev;
	}

	
	public function getCantot()
	{

		return $this->cantot;
	}

	
	public function getMontot()
	{

		return $this->montot;
	}

	
	public function getNumlot()
	{

		return $this->numlot;
	}

	
	public function getCanent()
	{

		return $this->canent;
	}

	
	public function getCodfal()
	{

		return $this->codfal;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setDphart($v)
	{

		if ($this->dphart !== $v) {
			$this->dphart = $v;
			$this->modifiedColumns[] = CaartdphPeer::DPHART;
		}

	} 
	
	public function setCodart($v)
	{

		if ($this->codart !== $v) {
			$this->codart = $v;
			$this->modifiedColumns[] = CaartdphPeer::CODART;
		}

	} 
	
	public function setCodcat($v)
	{

		if ($this->codcat !== $v) {
			$this->codcat = $v;
			$this->modifiedColumns[] = CaartdphPeer::CODCAT;
		}

	} 
	
	public function setCandph($v)
	{

		if ($this->candph !== $v) {
			$this->candph = $v;
			$this->modifiedColumns[] = CaartdphPeer::CANDPH;
		}

	} 
	
	public function setCandev($v)
	{

		if ($this->candev !== $v) {
			$this->candev = $v;
			$this->modifiedColumns[] = CaartdphPeer::CANDEV;
		}

	} 
	
	public function setCantot($v)
	{

		if ($this->cantot !== $v) {
			$this->cantot = $v;
			$this->modifiedColumns[] = CaartdphPeer::CANTOT;
		}

	} 
	
	public function setMontot($v)
	{

		if ($this->montot !== $v) {
			$this->montot = $v;
			$this->modifiedColumns[] = CaartdphPeer::MONTOT;
		}

	} 
	
	public function setNumlot($v)
	{

		if ($this->numlot !== $v) {
			$this->numlot = $v;
			$this->modifiedColumns[] = CaartdphPeer::NUMLOT;
		}

	} 
	
	public function setCanent($v)
	{

		if ($this->canent !== $v) {
			$this->canent = $v;
			$this->modifiedColumns[] = CaartdphPeer::CANENT;
		}

	} 
	
	public function setCodfal($v)
	{

		if ($this->codfal !== $v) {
			$this->codfal = $v;
			$this->modifiedColumns[] = CaartdphPeer::CODFAL;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CaartdphPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->dphart = $rs->getString($startcol + 0);

			$this->codart = $rs->getString($startcol + 1);

			$this->codcat = $rs->getString($startcol + 2);

			$this->candph = $rs->getFloat($startcol + 3);

			$this->candev = $rs->getFloat($startcol + 4);

			$this->cantot = $rs->getFloat($startcol + 5);

			$this->montot = $rs->getFloat($startcol + 6);

			$this->numlot = $rs->getString($startcol + 7);

			$this->canent = $rs->getFloat($startcol + 8);

			$this->codfal = $rs->getString($startcol + 9);

			$this->id = $rs->getInt($startcol + 10);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 11; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Caartdph object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CaartdphPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CaartdphPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CaartdphPeer::DATABASE_NAME);
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
					$pk = CaartdphPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CaartdphPeer::doUpdate($this, $con);
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


			if (($retval = CaartdphPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaartdphPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDphart();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getCodcat();
				break;
			case 3:
				return $this->getCandph();
				break;
			case 4:
				return $this->getCandev();
				break;
			case 5:
				return $this->getCantot();
				break;
			case 6:
				return $this->getMontot();
				break;
			case 7:
				return $this->getNumlot();
				break;
			case 8:
				return $this->getCanent();
				break;
			case 9:
				return $this->getCodfal();
				break;
			case 10:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaartdphPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDphart(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCodcat(),
			$keys[3] => $this->getCandph(),
			$keys[4] => $this->getCandev(),
			$keys[5] => $this->getCantot(),
			$keys[6] => $this->getMontot(),
			$keys[7] => $this->getNumlot(),
			$keys[8] => $this->getCanent(),
			$keys[9] => $this->getCodfal(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaartdphPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDphart($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setCodcat($value);
				break;
			case 3:
				$this->setCandph($value);
				break;
			case 4:
				$this->setCandev($value);
				break;
			case 5:
				$this->setCantot($value);
				break;
			case 6:
				$this->setMontot($value);
				break;
			case 7:
				$this->setNumlot($value);
				break;
			case 8:
				$this->setCanent($value);
				break;
			case 9:
				$this->setCodfal($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaartdphPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDphart($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcat($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCandph($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCandev($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCantot($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMontot($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNumlot($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCanent($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodfal($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CaartdphPeer::DATABASE_NAME);

		if ($this->isColumnModified(CaartdphPeer::DPHART)) $criteria->add(CaartdphPeer::DPHART, $this->dphart);
		if ($this->isColumnModified(CaartdphPeer::CODART)) $criteria->add(CaartdphPeer::CODART, $this->codart);
		if ($this->isColumnModified(CaartdphPeer::CODCAT)) $criteria->add(CaartdphPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(CaartdphPeer::CANDPH)) $criteria->add(CaartdphPeer::CANDPH, $this->candph);
		if ($this->isColumnModified(CaartdphPeer::CANDEV)) $criteria->add(CaartdphPeer::CANDEV, $this->candev);
		if ($this->isColumnModified(CaartdphPeer::CANTOT)) $criteria->add(CaartdphPeer::CANTOT, $this->cantot);
		if ($this->isColumnModified(CaartdphPeer::MONTOT)) $criteria->add(CaartdphPeer::MONTOT, $this->montot);
		if ($this->isColumnModified(CaartdphPeer::NUMLOT)) $criteria->add(CaartdphPeer::NUMLOT, $this->numlot);
		if ($this->isColumnModified(CaartdphPeer::CANENT)) $criteria->add(CaartdphPeer::CANENT, $this->canent);
		if ($this->isColumnModified(CaartdphPeer::CODFAL)) $criteria->add(CaartdphPeer::CODFAL, $this->codfal);
		if ($this->isColumnModified(CaartdphPeer::ID)) $criteria->add(CaartdphPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CaartdphPeer::DATABASE_NAME);

		$criteria->add(CaartdphPeer::ID, $this->id);

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

		$copyObj->setDphart($this->dphart);

		$copyObj->setCodart($this->codart);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCandph($this->candph);

		$copyObj->setCandev($this->candev);

		$copyObj->setCantot($this->cantot);

		$copyObj->setMontot($this->montot);

		$copyObj->setNumlot($this->numlot);

		$copyObj->setCanent($this->canent);

		$copyObj->setCodfal($this->codfal);


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
			self::$peer = new CaartdphPeer();
		}
		return self::$peer;
	}

} 