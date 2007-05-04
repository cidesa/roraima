<?php


abstract class BaseFcmodpro extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refmod;


	
	protected $nrocon;


	
	protected $fecmod;


	
	protected $tippro;


	
	protected $despro;


	
	protected $dirpro;


	
	protected $monpro;


	
	protected $monimp;


	
	protected $tipproant;


	
	protected $desproant;


	
	protected $dirproant;


	
	protected $monproant;


	
	protected $monimpant;


	
	protected $funrec;


	
	protected $id;

	
	protected $aFcprolic;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getRefmod()
	{

		return $this->refmod;
	}

	
	public function getNrocon()
	{

		return $this->nrocon;
	}

	
	public function getFecmod($format = 'Y-m-d')
	{

		if ($this->fecmod === null || $this->fecmod === '') {
			return null;
		} elseif (!is_int($this->fecmod)) {
						$ts = strtotime($this->fecmod);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecmod] as date/time value: " . var_export($this->fecmod, true));
			}
		} else {
			$ts = $this->fecmod;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getTippro()
	{

		return $this->tippro;
	}

	
	public function getDespro()
	{

		return $this->despro;
	}

	
	public function getDirpro()
	{

		return $this->dirpro;
	}

	
	public function getMonpro()
	{

		return $this->monpro;
	}

	
	public function getMonimp()
	{

		return $this->monimp;
	}

	
	public function getTipproant()
	{

		return $this->tipproant;
	}

	
	public function getDesproant()
	{

		return $this->desproant;
	}

	
	public function getDirproant()
	{

		return $this->dirproant;
	}

	
	public function getMonproant()
	{

		return $this->monproant;
	}

	
	public function getMonimpant()
	{

		return $this->monimpant;
	}

	
	public function getFunrec()
	{

		return $this->funrec;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setRefmod($v)
	{

		if ($this->refmod !== $v) {
			$this->refmod = $v;
			$this->modifiedColumns[] = FcmodproPeer::REFMOD;
		}

	} 
	
	public function setNrocon($v)
	{

		if ($this->nrocon !== $v) {
			$this->nrocon = $v;
			$this->modifiedColumns[] = FcmodproPeer::NROCON;
		}

		if ($this->aFcprolic !== null && $this->aFcprolic->getNrocon() !== $v) {
			$this->aFcprolic = null;
		}

	} 
	
	public function setFecmod($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecmod] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecmod !== $ts) {
			$this->fecmod = $ts;
			$this->modifiedColumns[] = FcmodproPeer::FECMOD;
		}

	} 
	
	public function setTippro($v)
	{

		if ($this->tippro !== $v) {
			$this->tippro = $v;
			$this->modifiedColumns[] = FcmodproPeer::TIPPRO;
		}

	} 
	
	public function setDespro($v)
	{

		if ($this->despro !== $v) {
			$this->despro = $v;
			$this->modifiedColumns[] = FcmodproPeer::DESPRO;
		}

	} 
	
	public function setDirpro($v)
	{

		if ($this->dirpro !== $v) {
			$this->dirpro = $v;
			$this->modifiedColumns[] = FcmodproPeer::DIRPRO;
		}

	} 
	
	public function setMonpro($v)
	{

		if ($this->monpro !== $v) {
			$this->monpro = $v;
			$this->modifiedColumns[] = FcmodproPeer::MONPRO;
		}

	} 
	
	public function setMonimp($v)
	{

		if ($this->monimp !== $v) {
			$this->monimp = $v;
			$this->modifiedColumns[] = FcmodproPeer::MONIMP;
		}

	} 
	
	public function setTipproant($v)
	{

		if ($this->tipproant !== $v) {
			$this->tipproant = $v;
			$this->modifiedColumns[] = FcmodproPeer::TIPPROANT;
		}

	} 
	
	public function setDesproant($v)
	{

		if ($this->desproant !== $v) {
			$this->desproant = $v;
			$this->modifiedColumns[] = FcmodproPeer::DESPROANT;
		}

	} 
	
	public function setDirproant($v)
	{

		if ($this->dirproant !== $v) {
			$this->dirproant = $v;
			$this->modifiedColumns[] = FcmodproPeer::DIRPROANT;
		}

	} 
	
	public function setMonproant($v)
	{

		if ($this->monproant !== $v) {
			$this->monproant = $v;
			$this->modifiedColumns[] = FcmodproPeer::MONPROANT;
		}

	} 
	
	public function setMonimpant($v)
	{

		if ($this->monimpant !== $v) {
			$this->monimpant = $v;
			$this->modifiedColumns[] = FcmodproPeer::MONIMPANT;
		}

	} 
	
	public function setFunrec($v)
	{

		if ($this->funrec !== $v) {
			$this->funrec = $v;
			$this->modifiedColumns[] = FcmodproPeer::FUNREC;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcmodproPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->refmod = $rs->getString($startcol + 0);

			$this->nrocon = $rs->getString($startcol + 1);

			$this->fecmod = $rs->getDate($startcol + 2, null);

			$this->tippro = $rs->getString($startcol + 3);

			$this->despro = $rs->getString($startcol + 4);

			$this->dirpro = $rs->getString($startcol + 5);

			$this->monpro = $rs->getFloat($startcol + 6);

			$this->monimp = $rs->getFloat($startcol + 7);

			$this->tipproant = $rs->getString($startcol + 8);

			$this->desproant = $rs->getString($startcol + 9);

			$this->dirproant = $rs->getString($startcol + 10);

			$this->monproant = $rs->getFloat($startcol + 11);

			$this->monimpant = $rs->getFloat($startcol + 12);

			$this->funrec = $rs->getString($startcol + 13);

			$this->id = $rs->getInt($startcol + 14);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 15; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcmodpro object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcmodproPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcmodproPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcmodproPeer::DATABASE_NAME);
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


												
			if ($this->aFcprolic !== null) {
				if ($this->aFcprolic->isModified()) {
					$affectedRows += $this->aFcprolic->save($con);
				}
				$this->setFcprolic($this->aFcprolic);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FcmodproPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcmodproPeer::doUpdate($this, $con);
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


												
			if ($this->aFcprolic !== null) {
				if (!$this->aFcprolic->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFcprolic->getValidationFailures());
				}
			}


			if (($retval = FcmodproPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcmodproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefmod();
				break;
			case 1:
				return $this->getNrocon();
				break;
			case 2:
				return $this->getFecmod();
				break;
			case 3:
				return $this->getTippro();
				break;
			case 4:
				return $this->getDespro();
				break;
			case 5:
				return $this->getDirpro();
				break;
			case 6:
				return $this->getMonpro();
				break;
			case 7:
				return $this->getMonimp();
				break;
			case 8:
				return $this->getTipproant();
				break;
			case 9:
				return $this->getDesproant();
				break;
			case 10:
				return $this->getDirproant();
				break;
			case 11:
				return $this->getMonproant();
				break;
			case 12:
				return $this->getMonimpant();
				break;
			case 13:
				return $this->getFunrec();
				break;
			case 14:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcmodproPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefmod(),
			$keys[1] => $this->getNrocon(),
			$keys[2] => $this->getFecmod(),
			$keys[3] => $this->getTippro(),
			$keys[4] => $this->getDespro(),
			$keys[5] => $this->getDirpro(),
			$keys[6] => $this->getMonpro(),
			$keys[7] => $this->getMonimp(),
			$keys[8] => $this->getTipproant(),
			$keys[9] => $this->getDesproant(),
			$keys[10] => $this->getDirproant(),
			$keys[11] => $this->getMonproant(),
			$keys[12] => $this->getMonimpant(),
			$keys[13] => $this->getFunrec(),
			$keys[14] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcmodproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefmod($value);
				break;
			case 1:
				$this->setNrocon($value);
				break;
			case 2:
				$this->setFecmod($value);
				break;
			case 3:
				$this->setTippro($value);
				break;
			case 4:
				$this->setDespro($value);
				break;
			case 5:
				$this->setDirpro($value);
				break;
			case 6:
				$this->setMonpro($value);
				break;
			case 7:
				$this->setMonimp($value);
				break;
			case 8:
				$this->setTipproant($value);
				break;
			case 9:
				$this->setDesproant($value);
				break;
			case 10:
				$this->setDirproant($value);
				break;
			case 11:
				$this->setMonproant($value);
				break;
			case 12:
				$this->setMonimpant($value);
				break;
			case 13:
				$this->setFunrec($value);
				break;
			case 14:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcmodproPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefmod($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNrocon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecmod($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTippro($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDespro($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDirpro($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonpro($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMonimp($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTipproant($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDesproant($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDirproant($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setMonproant($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setMonimpant($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFunrec($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setId($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcmodproPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcmodproPeer::REFMOD)) $criteria->add(FcmodproPeer::REFMOD, $this->refmod);
		if ($this->isColumnModified(FcmodproPeer::NROCON)) $criteria->add(FcmodproPeer::NROCON, $this->nrocon);
		if ($this->isColumnModified(FcmodproPeer::FECMOD)) $criteria->add(FcmodproPeer::FECMOD, $this->fecmod);
		if ($this->isColumnModified(FcmodproPeer::TIPPRO)) $criteria->add(FcmodproPeer::TIPPRO, $this->tippro);
		if ($this->isColumnModified(FcmodproPeer::DESPRO)) $criteria->add(FcmodproPeer::DESPRO, $this->despro);
		if ($this->isColumnModified(FcmodproPeer::DIRPRO)) $criteria->add(FcmodproPeer::DIRPRO, $this->dirpro);
		if ($this->isColumnModified(FcmodproPeer::MONPRO)) $criteria->add(FcmodproPeer::MONPRO, $this->monpro);
		if ($this->isColumnModified(FcmodproPeer::MONIMP)) $criteria->add(FcmodproPeer::MONIMP, $this->monimp);
		if ($this->isColumnModified(FcmodproPeer::TIPPROANT)) $criteria->add(FcmodproPeer::TIPPROANT, $this->tipproant);
		if ($this->isColumnModified(FcmodproPeer::DESPROANT)) $criteria->add(FcmodproPeer::DESPROANT, $this->desproant);
		if ($this->isColumnModified(FcmodproPeer::DIRPROANT)) $criteria->add(FcmodproPeer::DIRPROANT, $this->dirproant);
		if ($this->isColumnModified(FcmodproPeer::MONPROANT)) $criteria->add(FcmodproPeer::MONPROANT, $this->monproant);
		if ($this->isColumnModified(FcmodproPeer::MONIMPANT)) $criteria->add(FcmodproPeer::MONIMPANT, $this->monimpant);
		if ($this->isColumnModified(FcmodproPeer::FUNREC)) $criteria->add(FcmodproPeer::FUNREC, $this->funrec);
		if ($this->isColumnModified(FcmodproPeer::ID)) $criteria->add(FcmodproPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcmodproPeer::DATABASE_NAME);

		$criteria->add(FcmodproPeer::ID, $this->id);

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

		$copyObj->setRefmod($this->refmod);

		$copyObj->setNrocon($this->nrocon);

		$copyObj->setFecmod($this->fecmod);

		$copyObj->setTippro($this->tippro);

		$copyObj->setDespro($this->despro);

		$copyObj->setDirpro($this->dirpro);

		$copyObj->setMonpro($this->monpro);

		$copyObj->setMonimp($this->monimp);

		$copyObj->setTipproant($this->tipproant);

		$copyObj->setDesproant($this->desproant);

		$copyObj->setDirproant($this->dirproant);

		$copyObj->setMonproant($this->monproant);

		$copyObj->setMonimpant($this->monimpant);

		$copyObj->setFunrec($this->funrec);


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
			self::$peer = new FcmodproPeer();
		}
		return self::$peer;
	}

	
	public function setFcprolic($v)
	{


		if ($v === null) {
			$this->setNrocon(NULL);
		} else {
			$this->setNrocon($v->getNrocon());
		}


		$this->aFcprolic = $v;
	}


	
	public function getFcprolic($con = null)
	{
				include_once 'lib/model/om/BaseFcprolicPeer.php';

		if ($this->aFcprolic === null && (($this->nrocon !== "" && $this->nrocon !== null))) {

			$this->aFcprolic = FcprolicPeer::retrieveByPK($this->nrocon, $con);

			
		}
		return $this->aFcprolic;
	}

} 