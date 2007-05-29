<?php


abstract class BaseFordeforgpub extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codorg;


	
	protected $nomorg;


	
	protected $numgac;


	
	protected $ubiorg;


	
	protected $actorg;


	
	protected $tiporg;


	
	protected $monest;


	
	protected $preanu;


	
	protected $capsoc;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodorg()
	{

		return $this->codorg; 		
	}
	
	public function getNomorg()
	{

		return $this->nomorg; 		
	}
	
	public function getNumgac()
	{

		return $this->numgac; 		
	}
	
	public function getUbiorg()
	{

		return $this->ubiorg; 		
	}
	
	public function getActorg()
	{

		return $this->actorg; 		
	}
	
	public function getTiporg()
	{

		return $this->tiporg; 		
	}
	
	public function getMonest()
	{

		return number_format($this->monest,2,',','.');
		
	}
	
	public function getPreanu()
	{

		return number_format($this->preanu,2,',','.');
		
	}
	
	public function getCapsoc()
	{

		return number_format($this->capsoc,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodorg($v)
	{

		if ($this->codorg !== $v) {
			$this->codorg = $v;
			$this->modifiedColumns[] = FordeforgpubPeer::CODORG;
		}

	} 
	
	public function setNomorg($v)
	{

		if ($this->nomorg !== $v) {
			$this->nomorg = $v;
			$this->modifiedColumns[] = FordeforgpubPeer::NOMORG;
		}

	} 
	
	public function setNumgac($v)
	{

		if ($this->numgac !== $v) {
			$this->numgac = $v;
			$this->modifiedColumns[] = FordeforgpubPeer::NUMGAC;
		}

	} 
	
	public function setUbiorg($v)
	{

		if ($this->ubiorg !== $v) {
			$this->ubiorg = $v;
			$this->modifiedColumns[] = FordeforgpubPeer::UBIORG;
		}

	} 
	
	public function setActorg($v)
	{

		if ($this->actorg !== $v) {
			$this->actorg = $v;
			$this->modifiedColumns[] = FordeforgpubPeer::ACTORG;
		}

	} 
	
	public function setTiporg($v)
	{

		if ($this->tiporg !== $v) {
			$this->tiporg = $v;
			$this->modifiedColumns[] = FordeforgpubPeer::TIPORG;
		}

	} 
	
	public function setMonest($v)
	{

		if ($this->monest !== $v) {
			$this->monest = $v;
			$this->modifiedColumns[] = FordeforgpubPeer::MONEST;
		}

	} 
	
	public function setPreanu($v)
	{

		if ($this->preanu !== $v) {
			$this->preanu = $v;
			$this->modifiedColumns[] = FordeforgpubPeer::PREANU;
		}

	} 
	
	public function setCapsoc($v)
	{

		if ($this->capsoc !== $v) {
			$this->capsoc = $v;
			$this->modifiedColumns[] = FordeforgpubPeer::CAPSOC;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FordeforgpubPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codorg = $rs->getString($startcol + 0);

			$this->nomorg = $rs->getString($startcol + 1);

			$this->numgac = $rs->getString($startcol + 2);

			$this->ubiorg = $rs->getString($startcol + 3);

			$this->actorg = $rs->getString($startcol + 4);

			$this->tiporg = $rs->getString($startcol + 5);

			$this->monest = $rs->getFloat($startcol + 6);

			$this->preanu = $rs->getFloat($startcol + 7);

			$this->capsoc = $rs->getFloat($startcol + 8);

			$this->id = $rs->getInt($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fordeforgpub object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FordeforgpubPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FordeforgpubPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FordeforgpubPeer::DATABASE_NAME);
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
					$pk = FordeforgpubPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FordeforgpubPeer::doUpdate($this, $con);
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


			if (($retval = FordeforgpubPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordeforgpubPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodorg();
				break;
			case 1:
				return $this->getNomorg();
				break;
			case 2:
				return $this->getNumgac();
				break;
			case 3:
				return $this->getUbiorg();
				break;
			case 4:
				return $this->getActorg();
				break;
			case 5:
				return $this->getTiporg();
				break;
			case 6:
				return $this->getMonest();
				break;
			case 7:
				return $this->getPreanu();
				break;
			case 8:
				return $this->getCapsoc();
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
		$keys = FordeforgpubPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodorg(),
			$keys[1] => $this->getNomorg(),
			$keys[2] => $this->getNumgac(),
			$keys[3] => $this->getUbiorg(),
			$keys[4] => $this->getActorg(),
			$keys[5] => $this->getTiporg(),
			$keys[6] => $this->getMonest(),
			$keys[7] => $this->getPreanu(),
			$keys[8] => $this->getCapsoc(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordeforgpubPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodorg($value);
				break;
			case 1:
				$this->setNomorg($value);
				break;
			case 2:
				$this->setNumgac($value);
				break;
			case 3:
				$this->setUbiorg($value);
				break;
			case 4:
				$this->setActorg($value);
				break;
			case 5:
				$this->setTiporg($value);
				break;
			case 6:
				$this->setMonest($value);
				break;
			case 7:
				$this->setPreanu($value);
				break;
			case 8:
				$this->setCapsoc($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordeforgpubPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodorg($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomorg($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumgac($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUbiorg($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setActorg($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTiporg($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonest($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPreanu($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCapsoc($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FordeforgpubPeer::DATABASE_NAME);

		if ($this->isColumnModified(FordeforgpubPeer::CODORG)) $criteria->add(FordeforgpubPeer::CODORG, $this->codorg);
		if ($this->isColumnModified(FordeforgpubPeer::NOMORG)) $criteria->add(FordeforgpubPeer::NOMORG, $this->nomorg);
		if ($this->isColumnModified(FordeforgpubPeer::NUMGAC)) $criteria->add(FordeforgpubPeer::NUMGAC, $this->numgac);
		if ($this->isColumnModified(FordeforgpubPeer::UBIORG)) $criteria->add(FordeforgpubPeer::UBIORG, $this->ubiorg);
		if ($this->isColumnModified(FordeforgpubPeer::ACTORG)) $criteria->add(FordeforgpubPeer::ACTORG, $this->actorg);
		if ($this->isColumnModified(FordeforgpubPeer::TIPORG)) $criteria->add(FordeforgpubPeer::TIPORG, $this->tiporg);
		if ($this->isColumnModified(FordeforgpubPeer::MONEST)) $criteria->add(FordeforgpubPeer::MONEST, $this->monest);
		if ($this->isColumnModified(FordeforgpubPeer::PREANU)) $criteria->add(FordeforgpubPeer::PREANU, $this->preanu);
		if ($this->isColumnModified(FordeforgpubPeer::CAPSOC)) $criteria->add(FordeforgpubPeer::CAPSOC, $this->capsoc);
		if ($this->isColumnModified(FordeforgpubPeer::ID)) $criteria->add(FordeforgpubPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FordeforgpubPeer::DATABASE_NAME);

		$criteria->add(FordeforgpubPeer::ID, $this->id);

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

		$copyObj->setCodorg($this->codorg);

		$copyObj->setNomorg($this->nomorg);

		$copyObj->setNumgac($this->numgac);

		$copyObj->setUbiorg($this->ubiorg);

		$copyObj->setActorg($this->actorg);

		$copyObj->setTiporg($this->tiporg);

		$copyObj->setMonest($this->monest);

		$copyObj->setPreanu($this->preanu);

		$copyObj->setCapsoc($this->capsoc);


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
			self::$peer = new FordeforgpubPeer();
		}
		return self::$peer;
	}

} 