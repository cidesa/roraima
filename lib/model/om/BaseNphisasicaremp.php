<?php


abstract class BaseNphisasicaremp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $codcar;


	
	protected $codnom;


	
	protected $codcat;


	
	protected $fecasi;


	
	protected $nomemp;


	
	protected $nomcar;


	
	protected $nomnom;


	
	protected $nomcat;


	
	protected $unieje;


	
	protected $sueldo;


	
	protected $status;


	
	protected $montonomina;


	
	protected $codtip;


	
	protected $codtipgas;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodemp()
	{

		return $this->codemp; 		
	}
	
	public function getCodcar()
	{

		return $this->codcar; 		
	}
	
	public function getCodnom()
	{

		return $this->codnom; 		
	}
	
	public function getCodcat()
	{

		return $this->codcat; 		
	}
	
	public function getFecasi($format = 'Y-m-d')
	{

		if ($this->fecasi === null || $this->fecasi === '') {
			return null;
		} elseif (!is_int($this->fecasi)) {
						$ts = strtotime($this->fecasi);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecasi] as date/time value: " . var_export($this->fecasi, true));
			}
		} else {
			$ts = $this->fecasi;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getNomemp()
	{

		return $this->nomemp; 		
	}
	
	public function getNomcar()
	{

		return $this->nomcar; 		
	}
	
	public function getNomnom()
	{

		return $this->nomnom; 		
	}
	
	public function getNomcat()
	{

		return $this->nomcat; 		
	}
	
	public function getUnieje()
	{

		return $this->unieje; 		
	}
	
	public function getSueldo()
	{

		return number_format($this->sueldo,2,',','.');
		
	}
	
	public function getStatus()
	{

		return $this->status; 		
	}
	
	public function getMontonomina()
	{

		return number_format($this->montonomina,2,',','.');
		
	}
	
	public function getCodtip()
	{

		return $this->codtip; 		
	}
	
	public function getCodtipgas()
	{

		return $this->codtipgas; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = NphisasicarempPeer::CODEMP;
		}

	} 
	
	public function setCodcar($v)
	{

		if ($this->codcar !== $v) {
			$this->codcar = $v;
			$this->modifiedColumns[] = NphisasicarempPeer::CODCAR;
		}

	} 
	
	public function setCodnom($v)
	{

		if ($this->codnom !== $v) {
			$this->codnom = $v;
			$this->modifiedColumns[] = NphisasicarempPeer::CODNOM;
		}

	} 
	
	public function setCodcat($v)
	{

		if ($this->codcat !== $v) {
			$this->codcat = $v;
			$this->modifiedColumns[] = NphisasicarempPeer::CODCAT;
		}

	} 
	
	public function setFecasi($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecasi] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecasi !== $ts) {
			$this->fecasi = $ts;
			$this->modifiedColumns[] = NphisasicarempPeer::FECASI;
		}

	} 
	
	public function setNomemp($v)
	{

		if ($this->nomemp !== $v) {
			$this->nomemp = $v;
			$this->modifiedColumns[] = NphisasicarempPeer::NOMEMP;
		}

	} 
	
	public function setNomcar($v)
	{

		if ($this->nomcar !== $v) {
			$this->nomcar = $v;
			$this->modifiedColumns[] = NphisasicarempPeer::NOMCAR;
		}

	} 
	
	public function setNomnom($v)
	{

		if ($this->nomnom !== $v) {
			$this->nomnom = $v;
			$this->modifiedColumns[] = NphisasicarempPeer::NOMNOM;
		}

	} 
	
	public function setNomcat($v)
	{

		if ($this->nomcat !== $v) {
			$this->nomcat = $v;
			$this->modifiedColumns[] = NphisasicarempPeer::NOMCAT;
		}

	} 
	
	public function setUnieje($v)
	{

		if ($this->unieje !== $v) {
			$this->unieje = $v;
			$this->modifiedColumns[] = NphisasicarempPeer::UNIEJE;
		}

	} 
	
	public function setSueldo($v)
	{

		if ($this->sueldo !== $v) {
			$this->sueldo = $v;
			$this->modifiedColumns[] = NphisasicarempPeer::SUELDO;
		}

	} 
	
	public function setStatus($v)
	{

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = NphisasicarempPeer::STATUS;
		}

	} 
	
	public function setMontonomina($v)
	{

		if ($this->montonomina !== $v) {
			$this->montonomina = $v;
			$this->modifiedColumns[] = NphisasicarempPeer::MONTONOMINA;
		}

	} 
	
	public function setCodtip($v)
	{

		if ($this->codtip !== $v) {
			$this->codtip = $v;
			$this->modifiedColumns[] = NphisasicarempPeer::CODTIP;
		}

	} 
	
	public function setCodtipgas($v)
	{

		if ($this->codtipgas !== $v) {
			$this->codtipgas = $v;
			$this->modifiedColumns[] = NphisasicarempPeer::CODTIPGAS;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NphisasicarempPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codemp = $rs->getString($startcol + 0);

			$this->codcar = $rs->getString($startcol + 1);

			$this->codnom = $rs->getString($startcol + 2);

			$this->codcat = $rs->getString($startcol + 3);

			$this->fecasi = $rs->getDate($startcol + 4, null);

			$this->nomemp = $rs->getString($startcol + 5);

			$this->nomcar = $rs->getString($startcol + 6);

			$this->nomnom = $rs->getString($startcol + 7);

			$this->nomcat = $rs->getString($startcol + 8);

			$this->unieje = $rs->getString($startcol + 9);

			$this->sueldo = $rs->getFloat($startcol + 10);

			$this->status = $rs->getString($startcol + 11);

			$this->montonomina = $rs->getFloat($startcol + 12);

			$this->codtip = $rs->getString($startcol + 13);

			$this->codtipgas = $rs->getString($startcol + 14);

			$this->id = $rs->getInt($startcol + 15);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 16; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Nphisasicaremp object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NphisasicarempPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NphisasicarempPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NphisasicarempPeer::DATABASE_NAME);
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
					$pk = NphisasicarempPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NphisasicarempPeer::doUpdate($this, $con);
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


			if (($retval = NphisasicarempPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NphisasicarempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getCodcar();
				break;
			case 2:
				return $this->getCodnom();
				break;
			case 3:
				return $this->getCodcat();
				break;
			case 4:
				return $this->getFecasi();
				break;
			case 5:
				return $this->getNomemp();
				break;
			case 6:
				return $this->getNomcar();
				break;
			case 7:
				return $this->getNomnom();
				break;
			case 8:
				return $this->getNomcat();
				break;
			case 9:
				return $this->getUnieje();
				break;
			case 10:
				return $this->getSueldo();
				break;
			case 11:
				return $this->getStatus();
				break;
			case 12:
				return $this->getMontonomina();
				break;
			case 13:
				return $this->getCodtip();
				break;
			case 14:
				return $this->getCodtipgas();
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
		$keys = NphisasicarempPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getCodcar(),
			$keys[2] => $this->getCodnom(),
			$keys[3] => $this->getCodcat(),
			$keys[4] => $this->getFecasi(),
			$keys[5] => $this->getNomemp(),
			$keys[6] => $this->getNomcar(),
			$keys[7] => $this->getNomnom(),
			$keys[8] => $this->getNomcat(),
			$keys[9] => $this->getUnieje(),
			$keys[10] => $this->getSueldo(),
			$keys[11] => $this->getStatus(),
			$keys[12] => $this->getMontonomina(),
			$keys[13] => $this->getCodtip(),
			$keys[14] => $this->getCodtipgas(),
			$keys[15] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NphisasicarempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setCodcar($value);
				break;
			case 2:
				$this->setCodnom($value);
				break;
			case 3:
				$this->setCodcat($value);
				break;
			case 4:
				$this->setFecasi($value);
				break;
			case 5:
				$this->setNomemp($value);
				break;
			case 6:
				$this->setNomcar($value);
				break;
			case 7:
				$this->setNomnom($value);
				break;
			case 8:
				$this->setNomcat($value);
				break;
			case 9:
				$this->setUnieje($value);
				break;
			case 10:
				$this->setSueldo($value);
				break;
			case 11:
				$this->setStatus($value);
				break;
			case 12:
				$this->setMontonomina($value);
				break;
			case 13:
				$this->setCodtip($value);
				break;
			case 14:
				$this->setCodtipgas($value);
				break;
			case 15:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NphisasicarempPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodnom($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodcat($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecasi($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNomemp($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNomcar($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNomnom($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNomcat($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUnieje($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setSueldo($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setStatus($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setMontonomina($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCodtip($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCodtipgas($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setId($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NphisasicarempPeer::DATABASE_NAME);

		if ($this->isColumnModified(NphisasicarempPeer::CODEMP)) $criteria->add(NphisasicarempPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NphisasicarempPeer::CODCAR)) $criteria->add(NphisasicarempPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(NphisasicarempPeer::CODNOM)) $criteria->add(NphisasicarempPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NphisasicarempPeer::CODCAT)) $criteria->add(NphisasicarempPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(NphisasicarempPeer::FECASI)) $criteria->add(NphisasicarempPeer::FECASI, $this->fecasi);
		if ($this->isColumnModified(NphisasicarempPeer::NOMEMP)) $criteria->add(NphisasicarempPeer::NOMEMP, $this->nomemp);
		if ($this->isColumnModified(NphisasicarempPeer::NOMCAR)) $criteria->add(NphisasicarempPeer::NOMCAR, $this->nomcar);
		if ($this->isColumnModified(NphisasicarempPeer::NOMNOM)) $criteria->add(NphisasicarempPeer::NOMNOM, $this->nomnom);
		if ($this->isColumnModified(NphisasicarempPeer::NOMCAT)) $criteria->add(NphisasicarempPeer::NOMCAT, $this->nomcat);
		if ($this->isColumnModified(NphisasicarempPeer::UNIEJE)) $criteria->add(NphisasicarempPeer::UNIEJE, $this->unieje);
		if ($this->isColumnModified(NphisasicarempPeer::SUELDO)) $criteria->add(NphisasicarempPeer::SUELDO, $this->sueldo);
		if ($this->isColumnModified(NphisasicarempPeer::STATUS)) $criteria->add(NphisasicarempPeer::STATUS, $this->status);
		if ($this->isColumnModified(NphisasicarempPeer::MONTONOMINA)) $criteria->add(NphisasicarempPeer::MONTONOMINA, $this->montonomina);
		if ($this->isColumnModified(NphisasicarempPeer::CODTIP)) $criteria->add(NphisasicarempPeer::CODTIP, $this->codtip);
		if ($this->isColumnModified(NphisasicarempPeer::CODTIPGAS)) $criteria->add(NphisasicarempPeer::CODTIPGAS, $this->codtipgas);
		if ($this->isColumnModified(NphisasicarempPeer::ID)) $criteria->add(NphisasicarempPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NphisasicarempPeer::DATABASE_NAME);

		$criteria->add(NphisasicarempPeer::ID, $this->id);

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

		$copyObj->setCodcar($this->codcar);

		$copyObj->setCodnom($this->codnom);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setFecasi($this->fecasi);

		$copyObj->setNomemp($this->nomemp);

		$copyObj->setNomcar($this->nomcar);

		$copyObj->setNomnom($this->nomnom);

		$copyObj->setNomcat($this->nomcat);

		$copyObj->setUnieje($this->unieje);

		$copyObj->setSueldo($this->sueldo);

		$copyObj->setStatus($this->status);

		$copyObj->setMontonomina($this->montonomina);

		$copyObj->setCodtip($this->codtip);

		$copyObj->setCodtipgas($this->codtipgas);


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
			self::$peer = new NphisasicarempPeer();
		}
		return self::$peer;
	}

} 