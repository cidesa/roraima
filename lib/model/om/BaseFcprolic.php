<?php


abstract class BaseFcprolic extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nrocon;


	
	protected $fecreg;


	
	protected $rifcon;


	
	protected $tippro;


	
	protected $despro;


	
	protected $dirpro;


	
	protected $monpro;


	
	protected $monimp;


	
	protected $funrec;


	
	protected $fecrec;


	
	protected $rifrep;


	
	protected $stapro;


	
	protected $stadec;


	
	protected $nomcon;


	
	protected $dircon;


	
	protected $semdia;


	
	protected $id;

	
	protected $collFcmodpros;

	
	protected $lastFcmodproCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNrocon()
	{

		return $this->nrocon;
	}

	
	public function getFecreg($format = 'Y-m-d')
	{

		if ($this->fecreg === null || $this->fecreg === '') {
			return null;
		} elseif (!is_int($this->fecreg)) {
						$ts = strtotime($this->fecreg);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecreg] as date/time value: " . var_export($this->fecreg, true));
			}
		} else {
			$ts = $this->fecreg;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getRifcon()
	{

		return $this->rifcon;
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

	
	public function getFunrec()
	{

		return $this->funrec;
	}

	
	public function getFecrec($format = 'Y-m-d')
	{

		if ($this->fecrec === null || $this->fecrec === '') {
			return null;
		} elseif (!is_int($this->fecrec)) {
						$ts = strtotime($this->fecrec);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecrec] as date/time value: " . var_export($this->fecrec, true));
			}
		} else {
			$ts = $this->fecrec;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getRifrep()
	{

		return $this->rifrep;
	}

	
	public function getStapro()
	{

		return $this->stapro;
	}

	
	public function getStadec()
	{

		return $this->stadec;
	}

	
	public function getNomcon()
	{

		return $this->nomcon;
	}

	
	public function getDircon()
	{

		return $this->dircon;
	}

	
	public function getSemdia()
	{

		return $this->semdia;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setNrocon($v)
	{

		if ($this->nrocon !== $v) {
			$this->nrocon = $v;
			$this->modifiedColumns[] = FcprolicPeer::NROCON;
		}

	} 
	
	public function setFecreg($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecreg] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecreg !== $ts) {
			$this->fecreg = $ts;
			$this->modifiedColumns[] = FcprolicPeer::FECREG;
		}

	} 
	
	public function setRifcon($v)
	{

		if ($this->rifcon !== $v) {
			$this->rifcon = $v;
			$this->modifiedColumns[] = FcprolicPeer::RIFCON;
		}

	} 
	
	public function setTippro($v)
	{

		if ($this->tippro !== $v) {
			$this->tippro = $v;
			$this->modifiedColumns[] = FcprolicPeer::TIPPRO;
		}

	} 
	
	public function setDespro($v)
	{

		if ($this->despro !== $v) {
			$this->despro = $v;
			$this->modifiedColumns[] = FcprolicPeer::DESPRO;
		}

	} 
	
	public function setDirpro($v)
	{

		if ($this->dirpro !== $v) {
			$this->dirpro = $v;
			$this->modifiedColumns[] = FcprolicPeer::DIRPRO;
		}

	} 
	
	public function setMonpro($v)
	{

		if ($this->monpro !== $v) {
			$this->monpro = $v;
			$this->modifiedColumns[] = FcprolicPeer::MONPRO;
		}

	} 
	
	public function setMonimp($v)
	{

		if ($this->monimp !== $v) {
			$this->monimp = $v;
			$this->modifiedColumns[] = FcprolicPeer::MONIMP;
		}

	} 
	
	public function setFunrec($v)
	{

		if ($this->funrec !== $v) {
			$this->funrec = $v;
			$this->modifiedColumns[] = FcprolicPeer::FUNREC;
		}

	} 
	
	public function setFecrec($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecrec] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecrec !== $ts) {
			$this->fecrec = $ts;
			$this->modifiedColumns[] = FcprolicPeer::FECREC;
		}

	} 
	
	public function setRifrep($v)
	{

		if ($this->rifrep !== $v) {
			$this->rifrep = $v;
			$this->modifiedColumns[] = FcprolicPeer::RIFREP;
		}

	} 
	
	public function setStapro($v)
	{

		if ($this->stapro !== $v) {
			$this->stapro = $v;
			$this->modifiedColumns[] = FcprolicPeer::STAPRO;
		}

	} 
	
	public function setStadec($v)
	{

		if ($this->stadec !== $v) {
			$this->stadec = $v;
			$this->modifiedColumns[] = FcprolicPeer::STADEC;
		}

	} 
	
	public function setNomcon($v)
	{

		if ($this->nomcon !== $v) {
			$this->nomcon = $v;
			$this->modifiedColumns[] = FcprolicPeer::NOMCON;
		}

	} 
	
	public function setDircon($v)
	{

		if ($this->dircon !== $v) {
			$this->dircon = $v;
			$this->modifiedColumns[] = FcprolicPeer::DIRCON;
		}

	} 
	
	public function setSemdia($v)
	{

		if ($this->semdia !== $v) {
			$this->semdia = $v;
			$this->modifiedColumns[] = FcprolicPeer::SEMDIA;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcprolicPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->nrocon = $rs->getString($startcol + 0);

			$this->fecreg = $rs->getDate($startcol + 1, null);

			$this->rifcon = $rs->getString($startcol + 2);

			$this->tippro = $rs->getString($startcol + 3);

			$this->despro = $rs->getString($startcol + 4);

			$this->dirpro = $rs->getString($startcol + 5);

			$this->monpro = $rs->getFloat($startcol + 6);

			$this->monimp = $rs->getFloat($startcol + 7);

			$this->funrec = $rs->getString($startcol + 8);

			$this->fecrec = $rs->getDate($startcol + 9, null);

			$this->rifrep = $rs->getString($startcol + 10);

			$this->stapro = $rs->getString($startcol + 11);

			$this->stadec = $rs->getString($startcol + 12);

			$this->nomcon = $rs->getString($startcol + 13);

			$this->dircon = $rs->getString($startcol + 14);

			$this->semdia = $rs->getFloat($startcol + 15);

			$this->id = $rs->getInt($startcol + 16);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 17; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcprolic object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcprolicPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcprolicPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcprolicPeer::DATABASE_NAME);
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
					$pk = FcprolicPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcprolicPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collFcmodpros !== null) {
				foreach($this->collFcmodpros as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


			if (($retval = FcprolicPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collFcmodpros !== null) {
					foreach($this->collFcmodpros as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcprolicPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNrocon();
				break;
			case 1:
				return $this->getFecreg();
				break;
			case 2:
				return $this->getRifcon();
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
				return $this->getFunrec();
				break;
			case 9:
				return $this->getFecrec();
				break;
			case 10:
				return $this->getRifrep();
				break;
			case 11:
				return $this->getStapro();
				break;
			case 12:
				return $this->getStadec();
				break;
			case 13:
				return $this->getNomcon();
				break;
			case 14:
				return $this->getDircon();
				break;
			case 15:
				return $this->getSemdia();
				break;
			case 16:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcprolicPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNrocon(),
			$keys[1] => $this->getFecreg(),
			$keys[2] => $this->getRifcon(),
			$keys[3] => $this->getTippro(),
			$keys[4] => $this->getDespro(),
			$keys[5] => $this->getDirpro(),
			$keys[6] => $this->getMonpro(),
			$keys[7] => $this->getMonimp(),
			$keys[8] => $this->getFunrec(),
			$keys[9] => $this->getFecrec(),
			$keys[10] => $this->getRifrep(),
			$keys[11] => $this->getStapro(),
			$keys[12] => $this->getStadec(),
			$keys[13] => $this->getNomcon(),
			$keys[14] => $this->getDircon(),
			$keys[15] => $this->getSemdia(),
			$keys[16] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcprolicPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNrocon($value);
				break;
			case 1:
				$this->setFecreg($value);
				break;
			case 2:
				$this->setRifcon($value);
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
				$this->setFunrec($value);
				break;
			case 9:
				$this->setFecrec($value);
				break;
			case 10:
				$this->setRifrep($value);
				break;
			case 11:
				$this->setStapro($value);
				break;
			case 12:
				$this->setStadec($value);
				break;
			case 13:
				$this->setNomcon($value);
				break;
			case 14:
				$this->setDircon($value);
				break;
			case 15:
				$this->setSemdia($value);
				break;
			case 16:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcprolicPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNrocon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecreg($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRifcon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTippro($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDespro($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDirpro($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonpro($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMonimp($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFunrec($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecrec($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setRifrep($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setStapro($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setStadec($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setNomcon($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setDircon($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setSemdia($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setId($arr[$keys[16]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcprolicPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcprolicPeer::NROCON)) $criteria->add(FcprolicPeer::NROCON, $this->nrocon);
		if ($this->isColumnModified(FcprolicPeer::FECREG)) $criteria->add(FcprolicPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(FcprolicPeer::RIFCON)) $criteria->add(FcprolicPeer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(FcprolicPeer::TIPPRO)) $criteria->add(FcprolicPeer::TIPPRO, $this->tippro);
		if ($this->isColumnModified(FcprolicPeer::DESPRO)) $criteria->add(FcprolicPeer::DESPRO, $this->despro);
		if ($this->isColumnModified(FcprolicPeer::DIRPRO)) $criteria->add(FcprolicPeer::DIRPRO, $this->dirpro);
		if ($this->isColumnModified(FcprolicPeer::MONPRO)) $criteria->add(FcprolicPeer::MONPRO, $this->monpro);
		if ($this->isColumnModified(FcprolicPeer::MONIMP)) $criteria->add(FcprolicPeer::MONIMP, $this->monimp);
		if ($this->isColumnModified(FcprolicPeer::FUNREC)) $criteria->add(FcprolicPeer::FUNREC, $this->funrec);
		if ($this->isColumnModified(FcprolicPeer::FECREC)) $criteria->add(FcprolicPeer::FECREC, $this->fecrec);
		if ($this->isColumnModified(FcprolicPeer::RIFREP)) $criteria->add(FcprolicPeer::RIFREP, $this->rifrep);
		if ($this->isColumnModified(FcprolicPeer::STAPRO)) $criteria->add(FcprolicPeer::STAPRO, $this->stapro);
		if ($this->isColumnModified(FcprolicPeer::STADEC)) $criteria->add(FcprolicPeer::STADEC, $this->stadec);
		if ($this->isColumnModified(FcprolicPeer::NOMCON)) $criteria->add(FcprolicPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(FcprolicPeer::DIRCON)) $criteria->add(FcprolicPeer::DIRCON, $this->dircon);
		if ($this->isColumnModified(FcprolicPeer::SEMDIA)) $criteria->add(FcprolicPeer::SEMDIA, $this->semdia);
		if ($this->isColumnModified(FcprolicPeer::ID)) $criteria->add(FcprolicPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcprolicPeer::DATABASE_NAME);

		$criteria->add(FcprolicPeer::ID, $this->id);

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

		$copyObj->setNrocon($this->nrocon);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setRifcon($this->rifcon);

		$copyObj->setTippro($this->tippro);

		$copyObj->setDespro($this->despro);

		$copyObj->setDirpro($this->dirpro);

		$copyObj->setMonpro($this->monpro);

		$copyObj->setMonimp($this->monimp);

		$copyObj->setFunrec($this->funrec);

		$copyObj->setFecrec($this->fecrec);

		$copyObj->setRifrep($this->rifrep);

		$copyObj->setStapro($this->stapro);

		$copyObj->setStadec($this->stadec);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setDircon($this->dircon);

		$copyObj->setSemdia($this->semdia);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getFcmodpros() as $relObj) {
				$copyObj->addFcmodpro($relObj->copy($deepCopy));
			}

		} 

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
			self::$peer = new FcprolicPeer();
		}
		return self::$peer;
	}

	
	public function initFcmodpros()
	{
		if ($this->collFcmodpros === null) {
			$this->collFcmodpros = array();
		}
	}

	
	public function getFcmodpros($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFcmodproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcmodpros === null) {
			if ($this->isNew()) {
			   $this->collFcmodpros = array();
			} else {

				$criteria->add(FcmodproPeer::NROCON, $this->getNrocon());

				FcmodproPeer::addSelectColumns($criteria);
				$this->collFcmodpros = FcmodproPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FcmodproPeer::NROCON, $this->getNrocon());

				FcmodproPeer::addSelectColumns($criteria);
				if (!isset($this->lastFcmodproCriteria) || !$this->lastFcmodproCriteria->equals($criteria)) {
					$this->collFcmodpros = FcmodproPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFcmodproCriteria = $criteria;
		return $this->collFcmodpros;
	}

	
	public function countFcmodpros($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseFcmodproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FcmodproPeer::NROCON, $this->getNrocon());

		return FcmodproPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFcmodpro(Fcmodpro $l)
	{
		$this->collFcmodpros[] = $l;
		$l->setFcprolic($this);
	}

} 