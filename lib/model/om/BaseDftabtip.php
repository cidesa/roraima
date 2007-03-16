<?php


abstract class BaseDftabtip extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $tipdoc;


	
	protected $nomtab;


	
	protected $vidutil;


	
	protected $clvprm;


	
	protected $clvfrn;


	
	protected $mondoc;


	
	protected $fecdoc;


	
	protected $desdoc;


	
	protected $stadoc;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getTipdoc()
	{

		return $this->tipdoc;
	}

	
	public function getNomtab()
	{

		return $this->nomtab;
	}

	
	public function getVidutil()
	{

		return $this->vidutil;
	}

	
	public function getClvprm()
	{

		return $this->clvprm;
	}

	
	public function getClvfrn()
	{

		return $this->clvfrn;
	}

	
	public function getMondoc()
	{

		return $this->mondoc;
	}

	
	public function getFecdoc()
	{

		return $this->fecdoc;
	}

	
	public function getDesdoc()
	{

		return $this->desdoc;
	}

	
	public function getStadoc()
	{

		return $this->stadoc;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setTipdoc($v)
	{

		if ($this->tipdoc !== $v) {
			$this->tipdoc = $v;
			$this->modifiedColumns[] = DftabtipPeer::TIPDOC;
		}

	} 
	
	public function setNomtab($v)
	{

		if ($this->nomtab !== $v) {
			$this->nomtab = $v;
			$this->modifiedColumns[] = DftabtipPeer::NOMTAB;
		}

	} 
	
	public function setVidutil($v)
	{

		if ($this->vidutil !== $v) {
			$this->vidutil = $v;
			$this->modifiedColumns[] = DftabtipPeer::VIDUTIL;
		}

	} 
	
	public function setClvprm($v)
	{

		if ($this->clvprm !== $v) {
			$this->clvprm = $v;
			$this->modifiedColumns[] = DftabtipPeer::CLVPRM;
		}

	} 
	
	public function setClvfrn($v)
	{

		if ($this->clvfrn !== $v) {
			$this->clvfrn = $v;
			$this->modifiedColumns[] = DftabtipPeer::CLVFRN;
		}

	} 
	
	public function setMondoc($v)
	{

		if ($this->mondoc !== $v) {
			$this->mondoc = $v;
			$this->modifiedColumns[] = DftabtipPeer::MONDOC;
		}

	} 
	
	public function setFecdoc($v)
	{

		if ($this->fecdoc !== $v) {
			$this->fecdoc = $v;
			$this->modifiedColumns[] = DftabtipPeer::FECDOC;
		}

	} 
	
	public function setDesdoc($v)
	{

		if ($this->desdoc !== $v) {
			$this->desdoc = $v;
			$this->modifiedColumns[] = DftabtipPeer::DESDOC;
		}

	} 
	
	public function setStadoc($v)
	{

		if ($this->stadoc !== $v) {
			$this->stadoc = $v;
			$this->modifiedColumns[] = DftabtipPeer::STADOC;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = DftabtipPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->tipdoc = $rs->getString($startcol + 0);

			$this->nomtab = $rs->getString($startcol + 1);

			$this->vidutil = $rs->getString($startcol + 2);

			$this->clvprm = $rs->getString($startcol + 3);

			$this->clvfrn = $rs->getString($startcol + 4);

			$this->mondoc = $rs->getString($startcol + 5);

			$this->fecdoc = $rs->getString($startcol + 6);

			$this->desdoc = $rs->getString($startcol + 7);

			$this->stadoc = $rs->getString($startcol + 8);

			$this->id = $rs->getInt($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Dftabtip object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DftabtipPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			DftabtipPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(DftabtipPeer::DATABASE_NAME);
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
					$pk = DftabtipPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += DftabtipPeer::doUpdate($this, $con);
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


			if (($retval = DftabtipPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DftabtipPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getTipdoc();
				break;
			case 1:
				return $this->getNomtab();
				break;
			case 2:
				return $this->getVidutil();
				break;
			case 3:
				return $this->getClvprm();
				break;
			case 4:
				return $this->getClvfrn();
				break;
			case 5:
				return $this->getMondoc();
				break;
			case 6:
				return $this->getFecdoc();
				break;
			case 7:
				return $this->getDesdoc();
				break;
			case 8:
				return $this->getStadoc();
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
		$keys = DftabtipPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getTipdoc(),
			$keys[1] => $this->getNomtab(),
			$keys[2] => $this->getVidutil(),
			$keys[3] => $this->getClvprm(),
			$keys[4] => $this->getClvfrn(),
			$keys[5] => $this->getMondoc(),
			$keys[6] => $this->getFecdoc(),
			$keys[7] => $this->getDesdoc(),
			$keys[8] => $this->getStadoc(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DftabtipPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setTipdoc($value);
				break;
			case 1:
				$this->setNomtab($value);
				break;
			case 2:
				$this->setVidutil($value);
				break;
			case 3:
				$this->setClvprm($value);
				break;
			case 4:
				$this->setClvfrn($value);
				break;
			case 5:
				$this->setMondoc($value);
				break;
			case 6:
				$this->setFecdoc($value);
				break;
			case 7:
				$this->setDesdoc($value);
				break;
			case 8:
				$this->setStadoc($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DftabtipPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setTipdoc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomtab($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setVidutil($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setClvprm($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setClvfrn($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMondoc($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecdoc($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDesdoc($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setStadoc($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DftabtipPeer::DATABASE_NAME);

		if ($this->isColumnModified(DftabtipPeer::TIPDOC)) $criteria->add(DftabtipPeer::TIPDOC, $this->tipdoc);
		if ($this->isColumnModified(DftabtipPeer::NOMTAB)) $criteria->add(DftabtipPeer::NOMTAB, $this->nomtab);
		if ($this->isColumnModified(DftabtipPeer::VIDUTIL)) $criteria->add(DftabtipPeer::VIDUTIL, $this->vidutil);
		if ($this->isColumnModified(DftabtipPeer::CLVPRM)) $criteria->add(DftabtipPeer::CLVPRM, $this->clvprm);
		if ($this->isColumnModified(DftabtipPeer::CLVFRN)) $criteria->add(DftabtipPeer::CLVFRN, $this->clvfrn);
		if ($this->isColumnModified(DftabtipPeer::MONDOC)) $criteria->add(DftabtipPeer::MONDOC, $this->mondoc);
		if ($this->isColumnModified(DftabtipPeer::FECDOC)) $criteria->add(DftabtipPeer::FECDOC, $this->fecdoc);
		if ($this->isColumnModified(DftabtipPeer::DESDOC)) $criteria->add(DftabtipPeer::DESDOC, $this->desdoc);
		if ($this->isColumnModified(DftabtipPeer::STADOC)) $criteria->add(DftabtipPeer::STADOC, $this->stadoc);
		if ($this->isColumnModified(DftabtipPeer::ID)) $criteria->add(DftabtipPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DftabtipPeer::DATABASE_NAME);

		$criteria->add(DftabtipPeer::ID, $this->id);

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

		$copyObj->setTipdoc($this->tipdoc);

		$copyObj->setNomtab($this->nomtab);

		$copyObj->setVidutil($this->vidutil);

		$copyObj->setClvprm($this->clvprm);

		$copyObj->setClvfrn($this->clvfrn);

		$copyObj->setMondoc($this->mondoc);

		$copyObj->setFecdoc($this->fecdoc);

		$copyObj->setDesdoc($this->desdoc);

		$copyObj->setStadoc($this->stadoc);


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
			self::$peer = new DftabtipPeer();
		}
		return self::$peer;
	}

} 