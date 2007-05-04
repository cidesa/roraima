<?php


abstract class BaseFctipsol extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtip;


	
	protected $destip;


	
	protected $monsol;


	
	protected $valsol;


	
	protected $privdeu;


	
	protected $privmsg;


	
	protected $anocom;


	
	protected $fueing;


	
	protected $gendeu;


	
	protected $id;

	
	protected $collFcsolvencias;

	
	protected $lastFcsolvenciaCriteria = null;

	
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

	
	public function getMonsol()
	{

		return $this->monsol;
	}

	
	public function getValsol()
	{

		return $this->valsol;
	}

	
	public function getPrivdeu()
	{

		return $this->privdeu;
	}

	
	public function getPrivmsg()
	{

		return $this->privmsg;
	}

	
	public function getAnocom()
	{

		return $this->anocom;
	}

	
	public function getFueing()
	{

		return $this->fueing;
	}

	
	public function getGendeu()
	{

		return $this->gendeu;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodtip($v)
	{

		if ($this->codtip !== $v) {
			$this->codtip = $v;
			$this->modifiedColumns[] = FctipsolPeer::CODTIP;
		}

	} 
	
	public function setDestip($v)
	{

		if ($this->destip !== $v) {
			$this->destip = $v;
			$this->modifiedColumns[] = FctipsolPeer::DESTIP;
		}

	} 
	
	public function setMonsol($v)
	{

		if ($this->monsol !== $v) {
			$this->monsol = $v;
			$this->modifiedColumns[] = FctipsolPeer::MONSOL;
		}

	} 
	
	public function setValsol($v)
	{

		if ($this->valsol !== $v) {
			$this->valsol = $v;
			$this->modifiedColumns[] = FctipsolPeer::VALSOL;
		}

	} 
	
	public function setPrivdeu($v)
	{

		if ($this->privdeu !== $v) {
			$this->privdeu = $v;
			$this->modifiedColumns[] = FctipsolPeer::PRIVDEU;
		}

	} 
	
	public function setPrivmsg($v)
	{

		if ($this->privmsg !== $v) {
			$this->privmsg = $v;
			$this->modifiedColumns[] = FctipsolPeer::PRIVMSG;
		}

	} 
	
	public function setAnocom($v)
	{

		if ($this->anocom !== $v) {
			$this->anocom = $v;
			$this->modifiedColumns[] = FctipsolPeer::ANOCOM;
		}

	} 
	
	public function setFueing($v)
	{

		if ($this->fueing !== $v) {
			$this->fueing = $v;
			$this->modifiedColumns[] = FctipsolPeer::FUEING;
		}

	} 
	
	public function setGendeu($v)
	{

		if ($this->gendeu !== $v) {
			$this->gendeu = $v;
			$this->modifiedColumns[] = FctipsolPeer::GENDEU;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FctipsolPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codtip = $rs->getString($startcol + 0);

			$this->destip = $rs->getString($startcol + 1);

			$this->monsol = $rs->getFloat($startcol + 2);

			$this->valsol = $rs->getFloat($startcol + 3);

			$this->privdeu = $rs->getString($startcol + 4);

			$this->privmsg = $rs->getString($startcol + 5);

			$this->anocom = $rs->getString($startcol + 6);

			$this->fueing = $rs->getString($startcol + 7);

			$this->gendeu = $rs->getString($startcol + 8);

			$this->id = $rs->getInt($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fctipsol object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FctipsolPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FctipsolPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FctipsolPeer::DATABASE_NAME);
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
					$pk = FctipsolPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FctipsolPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collFcsolvencias !== null) {
				foreach($this->collFcsolvencias as $referrerFK) {
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


			if (($retval = FctipsolPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collFcsolvencias !== null) {
					foreach($this->collFcsolvencias as $referrerFK) {
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
		$pos = FctipsolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getMonsol();
				break;
			case 3:
				return $this->getValsol();
				break;
			case 4:
				return $this->getPrivdeu();
				break;
			case 5:
				return $this->getPrivmsg();
				break;
			case 6:
				return $this->getAnocom();
				break;
			case 7:
				return $this->getFueing();
				break;
			case 8:
				return $this->getGendeu();
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
		$keys = FctipsolPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtip(),
			$keys[1] => $this->getDestip(),
			$keys[2] => $this->getMonsol(),
			$keys[3] => $this->getValsol(),
			$keys[4] => $this->getPrivdeu(),
			$keys[5] => $this->getPrivmsg(),
			$keys[6] => $this->getAnocom(),
			$keys[7] => $this->getFueing(),
			$keys[8] => $this->getGendeu(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FctipsolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setMonsol($value);
				break;
			case 3:
				$this->setValsol($value);
				break;
			case 4:
				$this->setPrivdeu($value);
				break;
			case 5:
				$this->setPrivmsg($value);
				break;
			case 6:
				$this->setAnocom($value);
				break;
			case 7:
				$this->setFueing($value);
				break;
			case 8:
				$this->setGendeu($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FctipsolPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtip($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDestip($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonsol($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setValsol($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPrivdeu($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPrivmsg($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAnocom($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFueing($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setGendeu($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FctipsolPeer::DATABASE_NAME);

		if ($this->isColumnModified(FctipsolPeer::CODTIP)) $criteria->add(FctipsolPeer::CODTIP, $this->codtip);
		if ($this->isColumnModified(FctipsolPeer::DESTIP)) $criteria->add(FctipsolPeer::DESTIP, $this->destip);
		if ($this->isColumnModified(FctipsolPeer::MONSOL)) $criteria->add(FctipsolPeer::MONSOL, $this->monsol);
		if ($this->isColumnModified(FctipsolPeer::VALSOL)) $criteria->add(FctipsolPeer::VALSOL, $this->valsol);
		if ($this->isColumnModified(FctipsolPeer::PRIVDEU)) $criteria->add(FctipsolPeer::PRIVDEU, $this->privdeu);
		if ($this->isColumnModified(FctipsolPeer::PRIVMSG)) $criteria->add(FctipsolPeer::PRIVMSG, $this->privmsg);
		if ($this->isColumnModified(FctipsolPeer::ANOCOM)) $criteria->add(FctipsolPeer::ANOCOM, $this->anocom);
		if ($this->isColumnModified(FctipsolPeer::FUEING)) $criteria->add(FctipsolPeer::FUEING, $this->fueing);
		if ($this->isColumnModified(FctipsolPeer::GENDEU)) $criteria->add(FctipsolPeer::GENDEU, $this->gendeu);
		if ($this->isColumnModified(FctipsolPeer::ID)) $criteria->add(FctipsolPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FctipsolPeer::DATABASE_NAME);

		$criteria->add(FctipsolPeer::ID, $this->id);

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

		$copyObj->setMonsol($this->monsol);

		$copyObj->setValsol($this->valsol);

		$copyObj->setPrivdeu($this->privdeu);

		$copyObj->setPrivmsg($this->privmsg);

		$copyObj->setAnocom($this->anocom);

		$copyObj->setFueing($this->fueing);

		$copyObj->setGendeu($this->gendeu);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getFcsolvencias() as $relObj) {
				$copyObj->addFcsolvencia($relObj->copy($deepCopy));
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
			self::$peer = new FctipsolPeer();
		}
		return self::$peer;
	}

	
	public function initFcsolvencias()
	{
		if ($this->collFcsolvencias === null) {
			$this->collFcsolvencias = array();
		}
	}

	
	public function getFcsolvencias($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFcsolvenciaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcsolvencias === null) {
			if ($this->isNew()) {
			   $this->collFcsolvencias = array();
			} else {

				$criteria->add(FcsolvenciaPeer::CODTIP, $this->getCodtip());

				FcsolvenciaPeer::addSelectColumns($criteria);
				$this->collFcsolvencias = FcsolvenciaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FcsolvenciaPeer::CODTIP, $this->getCodtip());

				FcsolvenciaPeer::addSelectColumns($criteria);
				if (!isset($this->lastFcsolvenciaCriteria) || !$this->lastFcsolvenciaCriteria->equals($criteria)) {
					$this->collFcsolvencias = FcsolvenciaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFcsolvenciaCriteria = $criteria;
		return $this->collFcsolvencias;
	}

	
	public function countFcsolvencias($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseFcsolvenciaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FcsolvenciaPeer::CODTIP, $this->getCodtip());

		return FcsolvenciaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFcsolvencia(Fcsolvencia $l)
	{
		$this->collFcsolvencias[] = $l;
		$l->setFctipsol($this);
	}

} 