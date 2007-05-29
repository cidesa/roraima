<?php


abstract class BaseCsdefemp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nomemp;


	
	protected $diremp;


	
	protected $telemp;


	
	protected $faxemp;


	
	protected $porgasadm = 0;


	
	protected $pormarutil = 0;


	
	protected $porpermat = 0;


	
	protected $codtipdig;


	
	protected $codtipvia;


	
	protected $codtipfab;


	
	protected $valut;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNomemp()
	{

		return $this->nomemp; 		
	}
	
	public function getDiremp()
	{

		return $this->diremp; 		
	}
	
	public function getTelemp()
	{

		return $this->telemp; 		
	}
	
	public function getFaxemp()
	{

		return $this->faxemp; 		
	}
	
	public function getPorgasadm()
	{

		return number_format($this->porgasadm,2,',','.');
		
	}
	
	public function getPormarutil()
	{

		return number_format($this->pormarutil,2,',','.');
		
	}
	
	public function getPorpermat()
	{

		return number_format($this->porpermat,2,',','.');
		
	}
	
	public function getCodtipdig()
	{

		return $this->codtipdig; 		
	}
	
	public function getCodtipvia()
	{

		return $this->codtipvia; 		
	}
	
	public function getCodtipfab()
	{

		return $this->codtipfab; 		
	}
	
	public function getValut()
	{

		return number_format($this->valut,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setNomemp($v)
	{

		if ($this->nomemp !== $v) {
			$this->nomemp = $v;
			$this->modifiedColumns[] = CsdefempPeer::NOMEMP;
		}

	} 
	
	public function setDiremp($v)
	{

		if ($this->diremp !== $v) {
			$this->diremp = $v;
			$this->modifiedColumns[] = CsdefempPeer::DIREMP;
		}

	} 
	
	public function setTelemp($v)
	{

		if ($this->telemp !== $v) {
			$this->telemp = $v;
			$this->modifiedColumns[] = CsdefempPeer::TELEMP;
		}

	} 
	
	public function setFaxemp($v)
	{

		if ($this->faxemp !== $v) {
			$this->faxemp = $v;
			$this->modifiedColumns[] = CsdefempPeer::FAXEMP;
		}

	} 
	
	public function setPorgasadm($v)
	{

		if ($this->porgasadm !== $v || $v === 0) {
			$this->porgasadm = $v;
			$this->modifiedColumns[] = CsdefempPeer::PORGASADM;
		}

	} 
	
	public function setPormarutil($v)
	{

		if ($this->pormarutil !== $v || $v === 0) {
			$this->pormarutil = $v;
			$this->modifiedColumns[] = CsdefempPeer::PORMARUTIL;
		}

	} 
	
	public function setPorpermat($v)
	{

		if ($this->porpermat !== $v || $v === 0) {
			$this->porpermat = $v;
			$this->modifiedColumns[] = CsdefempPeer::PORPERMAT;
		}

	} 
	
	public function setCodtipdig($v)
	{

		if ($this->codtipdig !== $v) {
			$this->codtipdig = $v;
			$this->modifiedColumns[] = CsdefempPeer::CODTIPDIG;
		}

	} 
	
	public function setCodtipvia($v)
	{

		if ($this->codtipvia !== $v) {
			$this->codtipvia = $v;
			$this->modifiedColumns[] = CsdefempPeer::CODTIPVIA;
		}

	} 
	
	public function setCodtipfab($v)
	{

		if ($this->codtipfab !== $v) {
			$this->codtipfab = $v;
			$this->modifiedColumns[] = CsdefempPeer::CODTIPFAB;
		}

	} 
	
	public function setValut($v)
	{

		if ($this->valut !== $v) {
			$this->valut = $v;
			$this->modifiedColumns[] = CsdefempPeer::VALUT;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CsdefempPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->nomemp = $rs->getString($startcol + 0);

			$this->diremp = $rs->getString($startcol + 1);

			$this->telemp = $rs->getString($startcol + 2);

			$this->faxemp = $rs->getString($startcol + 3);

			$this->porgasadm = $rs->getFloat($startcol + 4);

			$this->pormarutil = $rs->getFloat($startcol + 5);

			$this->porpermat = $rs->getFloat($startcol + 6);

			$this->codtipdig = $rs->getString($startcol + 7);

			$this->codtipvia = $rs->getString($startcol + 8);

			$this->codtipfab = $rs->getString($startcol + 9);

			$this->valut = $rs->getFloat($startcol + 10);

			$this->id = $rs->getInt($startcol + 11);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Csdefemp object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CsdefempPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CsdefempPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CsdefempPeer::DATABASE_NAME);
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
					$pk = CsdefempPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CsdefempPeer::doUpdate($this, $con);
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


			if (($retval = CsdefempPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CsdefempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNomemp();
				break;
			case 1:
				return $this->getDiremp();
				break;
			case 2:
				return $this->getTelemp();
				break;
			case 3:
				return $this->getFaxemp();
				break;
			case 4:
				return $this->getPorgasadm();
				break;
			case 5:
				return $this->getPormarutil();
				break;
			case 6:
				return $this->getPorpermat();
				break;
			case 7:
				return $this->getCodtipdig();
				break;
			case 8:
				return $this->getCodtipvia();
				break;
			case 9:
				return $this->getCodtipfab();
				break;
			case 10:
				return $this->getValut();
				break;
			case 11:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CsdefempPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNomemp(),
			$keys[1] => $this->getDiremp(),
			$keys[2] => $this->getTelemp(),
			$keys[3] => $this->getFaxemp(),
			$keys[4] => $this->getPorgasadm(),
			$keys[5] => $this->getPormarutil(),
			$keys[6] => $this->getPorpermat(),
			$keys[7] => $this->getCodtipdig(),
			$keys[8] => $this->getCodtipvia(),
			$keys[9] => $this->getCodtipfab(),
			$keys[10] => $this->getValut(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CsdefempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNomemp($value);
				break;
			case 1:
				$this->setDiremp($value);
				break;
			case 2:
				$this->setTelemp($value);
				break;
			case 3:
				$this->setFaxemp($value);
				break;
			case 4:
				$this->setPorgasadm($value);
				break;
			case 5:
				$this->setPormarutil($value);
				break;
			case 6:
				$this->setPorpermat($value);
				break;
			case 7:
				$this->setCodtipdig($value);
				break;
			case 8:
				$this->setCodtipvia($value);
				break;
			case 9:
				$this->setCodtipfab($value);
				break;
			case 10:
				$this->setValut($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CsdefempPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNomemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDiremp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTelemp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFaxemp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPorgasadm($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPormarutil($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPorpermat($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodtipdig($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodtipvia($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodtipfab($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setValut($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CsdefempPeer::DATABASE_NAME);

		if ($this->isColumnModified(CsdefempPeer::NOMEMP)) $criteria->add(CsdefempPeer::NOMEMP, $this->nomemp);
		if ($this->isColumnModified(CsdefempPeer::DIREMP)) $criteria->add(CsdefempPeer::DIREMP, $this->diremp);
		if ($this->isColumnModified(CsdefempPeer::TELEMP)) $criteria->add(CsdefempPeer::TELEMP, $this->telemp);
		if ($this->isColumnModified(CsdefempPeer::FAXEMP)) $criteria->add(CsdefempPeer::FAXEMP, $this->faxemp);
		if ($this->isColumnModified(CsdefempPeer::PORGASADM)) $criteria->add(CsdefempPeer::PORGASADM, $this->porgasadm);
		if ($this->isColumnModified(CsdefempPeer::PORMARUTIL)) $criteria->add(CsdefempPeer::PORMARUTIL, $this->pormarutil);
		if ($this->isColumnModified(CsdefempPeer::PORPERMAT)) $criteria->add(CsdefempPeer::PORPERMAT, $this->porpermat);
		if ($this->isColumnModified(CsdefempPeer::CODTIPDIG)) $criteria->add(CsdefempPeer::CODTIPDIG, $this->codtipdig);
		if ($this->isColumnModified(CsdefempPeer::CODTIPVIA)) $criteria->add(CsdefempPeer::CODTIPVIA, $this->codtipvia);
		if ($this->isColumnModified(CsdefempPeer::CODTIPFAB)) $criteria->add(CsdefempPeer::CODTIPFAB, $this->codtipfab);
		if ($this->isColumnModified(CsdefempPeer::VALUT)) $criteria->add(CsdefempPeer::VALUT, $this->valut);
		if ($this->isColumnModified(CsdefempPeer::ID)) $criteria->add(CsdefempPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CsdefempPeer::DATABASE_NAME);

		$criteria->add(CsdefempPeer::ID, $this->id);

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

		$copyObj->setNomemp($this->nomemp);

		$copyObj->setDiremp($this->diremp);

		$copyObj->setTelemp($this->telemp);

		$copyObj->setFaxemp($this->faxemp);

		$copyObj->setPorgasadm($this->porgasadm);

		$copyObj->setPormarutil($this->pormarutil);

		$copyObj->setPorpermat($this->porpermat);

		$copyObj->setCodtipdig($this->codtipdig);

		$copyObj->setCodtipvia($this->codtipvia);

		$copyObj->setCodtipfab($this->codtipfab);

		$copyObj->setValut($this->valut);


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
			self::$peer = new CsdefempPeer();
		}
		return self::$peer;
	}

} 