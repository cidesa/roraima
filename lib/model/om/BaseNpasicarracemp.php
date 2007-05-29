<?php


abstract class BaseNpasicarracemp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $codcarrac;


	
	protected $codsecue;


	
	protected $comcar;


	
	protected $pricar;


	
	protected $codaccadm;


	
	protected $codregpai;


	
	protected $codregedo;


	
	protected $codregciu;


	
	protected $codcatrac;


	
	protected $codbanrac;


	
	protected $codgrulab;


	
	protected $nomsup;


	
	protected $carsup;


	
	protected $codnivorg;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodemp()
	{

		return $this->codemp; 		
	}
	
	public function getCodcarrac()
	{

		return $this->codcarrac; 		
	}
	
	public function getCodsecue()
	{

		return $this->codsecue; 		
	}
	
	public function getComcar()
	{

		return number_format($this->comcar,2,',','.');
		
	}
	
	public function getPricar()
	{

		return number_format($this->pricar,2,',','.');
		
	}
	
	public function getCodaccadm()
	{

		return $this->codaccadm; 		
	}
	
	public function getCodregpai()
	{

		return $this->codregpai; 		
	}
	
	public function getCodregedo()
	{

		return $this->codregedo; 		
	}
	
	public function getCodregciu()
	{

		return $this->codregciu; 		
	}
	
	public function getCodcatrac()
	{

		return $this->codcatrac; 		
	}
	
	public function getCodbanrac()
	{

		return $this->codbanrac; 		
	}
	
	public function getCodgrulab()
	{

		return $this->codgrulab; 		
	}
	
	public function getNomsup()
	{

		return $this->nomsup; 		
	}
	
	public function getCarsup()
	{

		return $this->carsup; 		
	}
	
	public function getCodnivorg()
	{

		return $this->codnivorg; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = NpasicarracempPeer::CODEMP;
		}

	} 
	
	public function setCodcarrac($v)
	{

		if ($this->codcarrac !== $v) {
			$this->codcarrac = $v;
			$this->modifiedColumns[] = NpasicarracempPeer::CODCARRAC;
		}

	} 
	
	public function setCodsecue($v)
	{

		if ($this->codsecue !== $v) {
			$this->codsecue = $v;
			$this->modifiedColumns[] = NpasicarracempPeer::CODSECUE;
		}

	} 
	
	public function setComcar($v)
	{

		if ($this->comcar !== $v) {
			$this->comcar = $v;
			$this->modifiedColumns[] = NpasicarracempPeer::COMCAR;
		}

	} 
	
	public function setPricar($v)
	{

		if ($this->pricar !== $v) {
			$this->pricar = $v;
			$this->modifiedColumns[] = NpasicarracempPeer::PRICAR;
		}

	} 
	
	public function setCodaccadm($v)
	{

		if ($this->codaccadm !== $v) {
			$this->codaccadm = $v;
			$this->modifiedColumns[] = NpasicarracempPeer::CODACCADM;
		}

	} 
	
	public function setCodregpai($v)
	{

		if ($this->codregpai !== $v) {
			$this->codregpai = $v;
			$this->modifiedColumns[] = NpasicarracempPeer::CODREGPAI;
		}

	} 
	
	public function setCodregedo($v)
	{

		if ($this->codregedo !== $v) {
			$this->codregedo = $v;
			$this->modifiedColumns[] = NpasicarracempPeer::CODREGEDO;
		}

	} 
	
	public function setCodregciu($v)
	{

		if ($this->codregciu !== $v) {
			$this->codregciu = $v;
			$this->modifiedColumns[] = NpasicarracempPeer::CODREGCIU;
		}

	} 
	
	public function setCodcatrac($v)
	{

		if ($this->codcatrac !== $v) {
			$this->codcatrac = $v;
			$this->modifiedColumns[] = NpasicarracempPeer::CODCATRAC;
		}

	} 
	
	public function setCodbanrac($v)
	{

		if ($this->codbanrac !== $v) {
			$this->codbanrac = $v;
			$this->modifiedColumns[] = NpasicarracempPeer::CODBANRAC;
		}

	} 
	
	public function setCodgrulab($v)
	{

		if ($this->codgrulab !== $v) {
			$this->codgrulab = $v;
			$this->modifiedColumns[] = NpasicarracempPeer::CODGRULAB;
		}

	} 
	
	public function setNomsup($v)
	{

		if ($this->nomsup !== $v) {
			$this->nomsup = $v;
			$this->modifiedColumns[] = NpasicarracempPeer::NOMSUP;
		}

	} 
	
	public function setCarsup($v)
	{

		if ($this->carsup !== $v) {
			$this->carsup = $v;
			$this->modifiedColumns[] = NpasicarracempPeer::CARSUP;
		}

	} 
	
	public function setCodnivorg($v)
	{

		if ($this->codnivorg !== $v) {
			$this->codnivorg = $v;
			$this->modifiedColumns[] = NpasicarracempPeer::CODNIVORG;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpasicarracempPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codemp = $rs->getString($startcol + 0);

			$this->codcarrac = $rs->getString($startcol + 1);

			$this->codsecue = $rs->getString($startcol + 2);

			$this->comcar = $rs->getFloat($startcol + 3);

			$this->pricar = $rs->getFloat($startcol + 4);

			$this->codaccadm = $rs->getString($startcol + 5);

			$this->codregpai = $rs->getString($startcol + 6);

			$this->codregedo = $rs->getString($startcol + 7);

			$this->codregciu = $rs->getString($startcol + 8);

			$this->codcatrac = $rs->getString($startcol + 9);

			$this->codbanrac = $rs->getString($startcol + 10);

			$this->codgrulab = $rs->getString($startcol + 11);

			$this->nomsup = $rs->getString($startcol + 12);

			$this->carsup = $rs->getString($startcol + 13);

			$this->codnivorg = $rs->getString($startcol + 14);

			$this->id = $rs->getInt($startcol + 15);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 16; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npasicarracemp object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpasicarracempPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpasicarracempPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpasicarracempPeer::DATABASE_NAME);
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
					$pk = NpasicarracempPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpasicarracempPeer::doUpdate($this, $con);
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


			if (($retval = NpasicarracempPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpasicarracempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getCodcarrac();
				break;
			case 2:
				return $this->getCodsecue();
				break;
			case 3:
				return $this->getComcar();
				break;
			case 4:
				return $this->getPricar();
				break;
			case 5:
				return $this->getCodaccadm();
				break;
			case 6:
				return $this->getCodregpai();
				break;
			case 7:
				return $this->getCodregedo();
				break;
			case 8:
				return $this->getCodregciu();
				break;
			case 9:
				return $this->getCodcatrac();
				break;
			case 10:
				return $this->getCodbanrac();
				break;
			case 11:
				return $this->getCodgrulab();
				break;
			case 12:
				return $this->getNomsup();
				break;
			case 13:
				return $this->getCarsup();
				break;
			case 14:
				return $this->getCodnivorg();
				break;
			case 15:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpasicarracempPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getCodcarrac(),
			$keys[2] => $this->getCodsecue(),
			$keys[3] => $this->getComcar(),
			$keys[4] => $this->getPricar(),
			$keys[5] => $this->getCodaccadm(),
			$keys[6] => $this->getCodregpai(),
			$keys[7] => $this->getCodregedo(),
			$keys[8] => $this->getCodregciu(),
			$keys[9] => $this->getCodcatrac(),
			$keys[10] => $this->getCodbanrac(),
			$keys[11] => $this->getCodgrulab(),
			$keys[12] => $this->getNomsup(),
			$keys[13] => $this->getCarsup(),
			$keys[14] => $this->getCodnivorg(),
			$keys[15] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpasicarracempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setCodcarrac($value);
				break;
			case 2:
				$this->setCodsecue($value);
				break;
			case 3:
				$this->setComcar($value);
				break;
			case 4:
				$this->setPricar($value);
				break;
			case 5:
				$this->setCodaccadm($value);
				break;
			case 6:
				$this->setCodregpai($value);
				break;
			case 7:
				$this->setCodregedo($value);
				break;
			case 8:
				$this->setCodregciu($value);
				break;
			case 9:
				$this->setCodcatrac($value);
				break;
			case 10:
				$this->setCodbanrac($value);
				break;
			case 11:
				$this->setCodgrulab($value);
				break;
			case 12:
				$this->setNomsup($value);
				break;
			case 13:
				$this->setCarsup($value);
				break;
			case 14:
				$this->setCodnivorg($value);
				break;
			case 15:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpasicarracempPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcarrac($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodsecue($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setComcar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPricar($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodaccadm($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodregpai($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodregedo($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodregciu($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodcatrac($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodbanrac($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCodgrulab($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setNomsup($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCarsup($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCodnivorg($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setId($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpasicarracempPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpasicarracempPeer::CODEMP)) $criteria->add(NpasicarracempPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpasicarracempPeer::CODCARRAC)) $criteria->add(NpasicarracempPeer::CODCARRAC, $this->codcarrac);
		if ($this->isColumnModified(NpasicarracempPeer::CODSECUE)) $criteria->add(NpasicarracempPeer::CODSECUE, $this->codsecue);
		if ($this->isColumnModified(NpasicarracempPeer::COMCAR)) $criteria->add(NpasicarracempPeer::COMCAR, $this->comcar);
		if ($this->isColumnModified(NpasicarracempPeer::PRICAR)) $criteria->add(NpasicarracempPeer::PRICAR, $this->pricar);
		if ($this->isColumnModified(NpasicarracempPeer::CODACCADM)) $criteria->add(NpasicarracempPeer::CODACCADM, $this->codaccadm);
		if ($this->isColumnModified(NpasicarracempPeer::CODREGPAI)) $criteria->add(NpasicarracempPeer::CODREGPAI, $this->codregpai);
		if ($this->isColumnModified(NpasicarracempPeer::CODREGEDO)) $criteria->add(NpasicarracempPeer::CODREGEDO, $this->codregedo);
		if ($this->isColumnModified(NpasicarracempPeer::CODREGCIU)) $criteria->add(NpasicarracempPeer::CODREGCIU, $this->codregciu);
		if ($this->isColumnModified(NpasicarracempPeer::CODCATRAC)) $criteria->add(NpasicarracempPeer::CODCATRAC, $this->codcatrac);
		if ($this->isColumnModified(NpasicarracempPeer::CODBANRAC)) $criteria->add(NpasicarracempPeer::CODBANRAC, $this->codbanrac);
		if ($this->isColumnModified(NpasicarracempPeer::CODGRULAB)) $criteria->add(NpasicarracempPeer::CODGRULAB, $this->codgrulab);
		if ($this->isColumnModified(NpasicarracempPeer::NOMSUP)) $criteria->add(NpasicarracempPeer::NOMSUP, $this->nomsup);
		if ($this->isColumnModified(NpasicarracempPeer::CARSUP)) $criteria->add(NpasicarracempPeer::CARSUP, $this->carsup);
		if ($this->isColumnModified(NpasicarracempPeer::CODNIVORG)) $criteria->add(NpasicarracempPeer::CODNIVORG, $this->codnivorg);
		if ($this->isColumnModified(NpasicarracempPeer::ID)) $criteria->add(NpasicarracempPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpasicarracempPeer::DATABASE_NAME);

		$criteria->add(NpasicarracempPeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setCodcarrac($this->codcarrac);

		$copyObj->setCodsecue($this->codsecue);

		$copyObj->setComcar($this->comcar);

		$copyObj->setPricar($this->pricar);

		$copyObj->setCodaccadm($this->codaccadm);

		$copyObj->setCodregpai($this->codregpai);

		$copyObj->setCodregedo($this->codregedo);

		$copyObj->setCodregciu($this->codregciu);

		$copyObj->setCodcatrac($this->codcatrac);

		$copyObj->setCodbanrac($this->codbanrac);

		$copyObj->setCodgrulab($this->codgrulab);

		$copyObj->setNomsup($this->nomsup);

		$copyObj->setCarsup($this->carsup);

		$copyObj->setCodnivorg($this->codnivorg);


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
			self::$peer = new NpasicarracempPeer();
		}
		return self::$peer;
	}

} 