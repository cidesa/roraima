<?php


abstract class BaseCadphartser extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $dphart;


	
	protected $fecdph;


	
	protected $reqart;


	
	protected $desdph;


	
	protected $codori;


	
	protected $stadph;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getDphart()
	{

		return $this->dphart;
	}

	
	public function getFecdph($format = 'Y-m-d')
	{

		if ($this->fecdph === null || $this->fecdph === '') {
			return null;
		} elseif (!is_int($this->fecdph)) {
						$ts = strtotime($this->fecdph);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecdph] as date/time value: " . var_export($this->fecdph, true));
			}
		} else {
			$ts = $this->fecdph;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getReqart()
	{

		return $this->reqart;
	}

	
	public function getDesdph()
	{

		return $this->desdph;
	}

	
	public function getCodori()
	{

		return $this->codori;
	}

	
	public function getStadph()
	{

		return $this->stadph;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setDphart($v)
	{

		if ($this->dphart !== $v) {
			$this->dphart = $v;
			$this->modifiedColumns[] = CadphartserPeer::DPHART;
		}

	} 
	
	public function setFecdph($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecdph] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecdph !== $ts) {
			$this->fecdph = $ts;
			$this->modifiedColumns[] = CadphartserPeer::FECDPH;
		}

	} 
	
	public function setReqart($v)
	{

		if ($this->reqart !== $v) {
			$this->reqart = $v;
			$this->modifiedColumns[] = CadphartserPeer::REQART;
		}

	} 
	
	public function setDesdph($v)
	{

		if ($this->desdph !== $v) {
			$this->desdph = $v;
			$this->modifiedColumns[] = CadphartserPeer::DESDPH;
		}

	} 
	
	public function setCodori($v)
	{

		if ($this->codori !== $v) {
			$this->codori = $v;
			$this->modifiedColumns[] = CadphartserPeer::CODORI;
		}

	} 
	
	public function setStadph($v)
	{

		if ($this->stadph !== $v) {
			$this->stadph = $v;
			$this->modifiedColumns[] = CadphartserPeer::STADPH;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CadphartserPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->dphart = $rs->getString($startcol + 0);

			$this->fecdph = $rs->getDate($startcol + 1, null);

			$this->reqart = $rs->getString($startcol + 2);

			$this->desdph = $rs->getString($startcol + 3);

			$this->codori = $rs->getString($startcol + 4);

			$this->stadph = $rs->getString($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cadphartser object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CadphartserPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CadphartserPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CadphartserPeer::DATABASE_NAME);
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
					$pk = CadphartserPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CadphartserPeer::doUpdate($this, $con);
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


			if (($retval = CadphartserPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadphartserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDphart();
				break;
			case 1:
				return $this->getFecdph();
				break;
			case 2:
				return $this->getReqart();
				break;
			case 3:
				return $this->getDesdph();
				break;
			case 4:
				return $this->getCodori();
				break;
			case 5:
				return $this->getStadph();
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
		$keys = CadphartserPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDphart(),
			$keys[1] => $this->getFecdph(),
			$keys[2] => $this->getReqart(),
			$keys[3] => $this->getDesdph(),
			$keys[4] => $this->getCodori(),
			$keys[5] => $this->getStadph(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadphartserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDphart($value);
				break;
			case 1:
				$this->setFecdph($value);
				break;
			case 2:
				$this->setReqart($value);
				break;
			case 3:
				$this->setDesdph($value);
				break;
			case 4:
				$this->setCodori($value);
				break;
			case 5:
				$this->setStadph($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadphartserPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDphart($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecdph($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setReqart($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDesdph($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodori($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStadph($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CadphartserPeer::DATABASE_NAME);

		if ($this->isColumnModified(CadphartserPeer::DPHART)) $criteria->add(CadphartserPeer::DPHART, $this->dphart);
		if ($this->isColumnModified(CadphartserPeer::FECDPH)) $criteria->add(CadphartserPeer::FECDPH, $this->fecdph);
		if ($this->isColumnModified(CadphartserPeer::REQART)) $criteria->add(CadphartserPeer::REQART, $this->reqart);
		if ($this->isColumnModified(CadphartserPeer::DESDPH)) $criteria->add(CadphartserPeer::DESDPH, $this->desdph);
		if ($this->isColumnModified(CadphartserPeer::CODORI)) $criteria->add(CadphartserPeer::CODORI, $this->codori);
		if ($this->isColumnModified(CadphartserPeer::STADPH)) $criteria->add(CadphartserPeer::STADPH, $this->stadph);
		if ($this->isColumnModified(CadphartserPeer::ID)) $criteria->add(CadphartserPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CadphartserPeer::DATABASE_NAME);

		$criteria->add(CadphartserPeer::ID, $this->id);

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

		$copyObj->setFecdph($this->fecdph);

		$copyObj->setReqart($this->reqart);

		$copyObj->setDesdph($this->desdph);

		$copyObj->setCodori($this->codori);

		$copyObj->setStadph($this->stadph);


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
			self::$peer = new CadphartserPeer();
		}
		return self::$peer;
	}

} 