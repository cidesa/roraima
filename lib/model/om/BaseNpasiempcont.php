<?php


abstract class BaseNpasiempcont extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtipcon;


	
	protected $codnom;


	
	protected $codemp;


	
	protected $nomemp;


	
	protected $feccal;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodtipcon()
	{

		return $this->codtipcon; 		
	}
	
	public function getCodnom()
	{

		return $this->codnom; 		
	}
	
	public function getCodemp()
	{

		return $this->codemp; 		
	}
	
	public function getNomemp()
	{

		return $this->nomemp; 		
	}
	
	public function getFeccal($format = 'Y-m-d')
	{

		if ($this->feccal === null || $this->feccal === '') {
			return null;
		} elseif (!is_int($this->feccal)) {
						$ts = strtotime($this->feccal);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [feccal] as date/time value: " . var_export($this->feccal, true));
			}
		} else {
			$ts = $this->feccal;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodtipcon($v)
	{

		if ($this->codtipcon !== $v) {
			$this->codtipcon = $v;
			$this->modifiedColumns[] = NpasiempcontPeer::CODTIPCON;
		}

	} 
	
	public function setCodnom($v)
	{

		if ($this->codnom !== $v) {
			$this->codnom = $v;
			$this->modifiedColumns[] = NpasiempcontPeer::CODNOM;
		}

	} 
	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = NpasiempcontPeer::CODEMP;
		}

	} 
	
	public function setNomemp($v)
	{

		if ($this->nomemp !== $v) {
			$this->nomemp = $v;
			$this->modifiedColumns[] = NpasiempcontPeer::NOMEMP;
		}

	} 
	
	public function setFeccal($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [feccal] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->feccal !== $ts) {
			$this->feccal = $ts;
			$this->modifiedColumns[] = NpasiempcontPeer::FECCAL;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpasiempcontPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codtipcon = $rs->getString($startcol + 0);

			$this->codnom = $rs->getString($startcol + 1);

			$this->codemp = $rs->getString($startcol + 2);

			$this->nomemp = $rs->getString($startcol + 3);

			$this->feccal = $rs->getDate($startcol + 4, null);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npasiempcont object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpasiempcontPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpasiempcontPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpasiempcontPeer::DATABASE_NAME);
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
					$pk = NpasiempcontPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpasiempcontPeer::doUpdate($this, $con);
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


			if (($retval = NpasiempcontPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpasiempcontPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtipcon();
				break;
			case 1:
				return $this->getCodnom();
				break;
			case 2:
				return $this->getCodemp();
				break;
			case 3:
				return $this->getNomemp();
				break;
			case 4:
				return $this->getFeccal();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpasiempcontPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtipcon(),
			$keys[1] => $this->getCodnom(),
			$keys[2] => $this->getCodemp(),
			$keys[3] => $this->getNomemp(),
			$keys[4] => $this->getFeccal(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpasiempcontPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtipcon($value);
				break;
			case 1:
				$this->setCodnom($value);
				break;
			case 2:
				$this->setCodemp($value);
				break;
			case 3:
				$this->setNomemp($value);
				break;
			case 4:
				$this->setFeccal($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpasiempcontPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtipcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodnom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodemp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNomemp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFeccal($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpasiempcontPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpasiempcontPeer::CODTIPCON)) $criteria->add(NpasiempcontPeer::CODTIPCON, $this->codtipcon);
		if ($this->isColumnModified(NpasiempcontPeer::CODNOM)) $criteria->add(NpasiempcontPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpasiempcontPeer::CODEMP)) $criteria->add(NpasiempcontPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpasiempcontPeer::NOMEMP)) $criteria->add(NpasiempcontPeer::NOMEMP, $this->nomemp);
		if ($this->isColumnModified(NpasiempcontPeer::FECCAL)) $criteria->add(NpasiempcontPeer::FECCAL, $this->feccal);
		if ($this->isColumnModified(NpasiempcontPeer::ID)) $criteria->add(NpasiempcontPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpasiempcontPeer::DATABASE_NAME);

		$criteria->add(NpasiempcontPeer::ID, $this->id);

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

		$copyObj->setCodtipcon($this->codtipcon);

		$copyObj->setCodnom($this->codnom);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setNomemp($this->nomemp);

		$copyObj->setFeccal($this->feccal);


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
			self::$peer = new NpasiempcontPeer();
		}
		return self::$peer;
	}

} 