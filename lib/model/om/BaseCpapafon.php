<?php


abstract class BaseCpapafon extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refapa;


	
	protected $tipapa;


	
	protected $fecapa;


	
	protected $anoapa;


	
	protected $desapa;


	
	protected $desanu;


	
	protected $monapa;


	
	protected $salcom;


	
	protected $salcau;


	
	protected $salpag;


	
	protected $salaju;


	
	protected $staapa;


	
	protected $fecanu;


	
	protected $cedrif;


	
	protected $estcie = '';


	
	protected $feccie;


	
	protected $moncie;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getRefapa()
	{

		return $this->refapa; 		
	}
	
	public function getTipapa()
	{

		return $this->tipapa; 		
	}
	
	public function getFecapa($format = 'Y-m-d')
	{

		if ($this->fecapa === null || $this->fecapa === '') {
			return null;
		} elseif (!is_int($this->fecapa)) {
						$ts = strtotime($this->fecapa);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecapa] as date/time value: " . var_export($this->fecapa, true));
			}
		} else {
			$ts = $this->fecapa;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getAnoapa()
	{

		return $this->anoapa; 		
	}
	
	public function getDesapa()
	{

		return $this->desapa; 		
	}
	
	public function getDesanu()
	{

		return $this->desanu; 		
	}
	
	public function getMonapa()
	{

		return number_format($this->monapa,2,',','.');
		
	}
	
	public function getSalcom()
	{

		return number_format($this->salcom,2,',','.');
		
	}
	
	public function getSalcau()
	{

		return number_format($this->salcau,2,',','.');
		
	}
	
	public function getSalpag()
	{

		return number_format($this->salpag,2,',','.');
		
	}
	
	public function getSalaju()
	{

		return number_format($this->salaju,2,',','.');
		
	}
	
	public function getStaapa()
	{

		return $this->staapa; 		
	}
	
	public function getFecanu($format = 'Y-m-d')
	{

		if ($this->fecanu === null || $this->fecanu === '') {
			return null;
		} elseif (!is_int($this->fecanu)) {
						$ts = strtotime($this->fecanu);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecanu] as date/time value: " . var_export($this->fecanu, true));
			}
		} else {
			$ts = $this->fecanu;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getCedrif()
	{

		return $this->cedrif; 		
	}
	
	public function getEstcie()
	{

		return $this->estcie; 		
	}
	
	public function getFeccie($format = 'Y-m-d')
	{

		if ($this->feccie === null || $this->feccie === '') {
			return null;
		} elseif (!is_int($this->feccie)) {
						$ts = strtotime($this->feccie);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [feccie] as date/time value: " . var_export($this->feccie, true));
			}
		} else {
			$ts = $this->feccie;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getMoncie()
	{

		return number_format($this->moncie,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setRefapa($v)
	{

		if ($this->refapa !== $v) {
			$this->refapa = $v;
			$this->modifiedColumns[] = CpapafonPeer::REFAPA;
		}

	} 
	
	public function setTipapa($v)
	{

		if ($this->tipapa !== $v) {
			$this->tipapa = $v;
			$this->modifiedColumns[] = CpapafonPeer::TIPAPA;
		}

	} 
	
	public function setFecapa($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecapa] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecapa !== $ts) {
			$this->fecapa = $ts;
			$this->modifiedColumns[] = CpapafonPeer::FECAPA;
		}

	} 
	
	public function setAnoapa($v)
	{

		if ($this->anoapa !== $v) {
			$this->anoapa = $v;
			$this->modifiedColumns[] = CpapafonPeer::ANOAPA;
		}

	} 
	
	public function setDesapa($v)
	{

		if ($this->desapa !== $v) {
			$this->desapa = $v;
			$this->modifiedColumns[] = CpapafonPeer::DESAPA;
		}

	} 
	
	public function setDesanu($v)
	{

		if ($this->desanu !== $v) {
			$this->desanu = $v;
			$this->modifiedColumns[] = CpapafonPeer::DESANU;
		}

	} 
	
	public function setMonapa($v)
	{

		if ($this->monapa !== $v) {
			$this->monapa = $v;
			$this->modifiedColumns[] = CpapafonPeer::MONAPA;
		}

	} 
	
	public function setSalcom($v)
	{

		if ($this->salcom !== $v) {
			$this->salcom = $v;
			$this->modifiedColumns[] = CpapafonPeer::SALCOM;
		}

	} 
	
	public function setSalcau($v)
	{

		if ($this->salcau !== $v) {
			$this->salcau = $v;
			$this->modifiedColumns[] = CpapafonPeer::SALCAU;
		}

	} 
	
	public function setSalpag($v)
	{

		if ($this->salpag !== $v) {
			$this->salpag = $v;
			$this->modifiedColumns[] = CpapafonPeer::SALPAG;
		}

	} 
	
	public function setSalaju($v)
	{

		if ($this->salaju !== $v) {
			$this->salaju = $v;
			$this->modifiedColumns[] = CpapafonPeer::SALAJU;
		}

	} 
	
	public function setStaapa($v)
	{

		if ($this->staapa !== $v) {
			$this->staapa = $v;
			$this->modifiedColumns[] = CpapafonPeer::STAAPA;
		}

	} 
	
	public function setFecanu($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecanu] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecanu !== $ts) {
			$this->fecanu = $ts;
			$this->modifiedColumns[] = CpapafonPeer::FECANU;
		}

	} 
	
	public function setCedrif($v)
	{

		if ($this->cedrif !== $v) {
			$this->cedrif = $v;
			$this->modifiedColumns[] = CpapafonPeer::CEDRIF;
		}

	} 
	
	public function setEstcie($v)
	{

		if ($this->estcie !== $v || $v === '') {
			$this->estcie = $v;
			$this->modifiedColumns[] = CpapafonPeer::ESTCIE;
		}

	} 
	
	public function setFeccie($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [feccie] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->feccie !== $ts) {
			$this->feccie = $ts;
			$this->modifiedColumns[] = CpapafonPeer::FECCIE;
		}

	} 
	
	public function setMoncie($v)
	{

		if ($this->moncie !== $v) {
			$this->moncie = $v;
			$this->modifiedColumns[] = CpapafonPeer::MONCIE;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CpapafonPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->refapa = $rs->getString($startcol + 0);

			$this->tipapa = $rs->getString($startcol + 1);

			$this->fecapa = $rs->getDate($startcol + 2, null);

			$this->anoapa = $rs->getString($startcol + 3);

			$this->desapa = $rs->getString($startcol + 4);

			$this->desanu = $rs->getString($startcol + 5);

			$this->monapa = $rs->getFloat($startcol + 6);

			$this->salcom = $rs->getFloat($startcol + 7);

			$this->salcau = $rs->getFloat($startcol + 8);

			$this->salpag = $rs->getFloat($startcol + 9);

			$this->salaju = $rs->getFloat($startcol + 10);

			$this->staapa = $rs->getString($startcol + 11);

			$this->fecanu = $rs->getDate($startcol + 12, null);

			$this->cedrif = $rs->getString($startcol + 13);

			$this->estcie = $rs->getString($startcol + 14);

			$this->feccie = $rs->getDate($startcol + 15, null);

			$this->moncie = $rs->getFloat($startcol + 16);

			$this->id = $rs->getInt($startcol + 17);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 18; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cpapafon object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CpapafonPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpapafonPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpapafonPeer::DATABASE_NAME);
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
					$pk = CpapafonPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CpapafonPeer::doUpdate($this, $con);
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


			if (($retval = CpapafonPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpapafonPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefapa();
				break;
			case 1:
				return $this->getTipapa();
				break;
			case 2:
				return $this->getFecapa();
				break;
			case 3:
				return $this->getAnoapa();
				break;
			case 4:
				return $this->getDesapa();
				break;
			case 5:
				return $this->getDesanu();
				break;
			case 6:
				return $this->getMonapa();
				break;
			case 7:
				return $this->getSalcom();
				break;
			case 8:
				return $this->getSalcau();
				break;
			case 9:
				return $this->getSalpag();
				break;
			case 10:
				return $this->getSalaju();
				break;
			case 11:
				return $this->getStaapa();
				break;
			case 12:
				return $this->getFecanu();
				break;
			case 13:
				return $this->getCedrif();
				break;
			case 14:
				return $this->getEstcie();
				break;
			case 15:
				return $this->getFeccie();
				break;
			case 16:
				return $this->getMoncie();
				break;
			case 17:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpapafonPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefapa(),
			$keys[1] => $this->getTipapa(),
			$keys[2] => $this->getFecapa(),
			$keys[3] => $this->getAnoapa(),
			$keys[4] => $this->getDesapa(),
			$keys[5] => $this->getDesanu(),
			$keys[6] => $this->getMonapa(),
			$keys[7] => $this->getSalcom(),
			$keys[8] => $this->getSalcau(),
			$keys[9] => $this->getSalpag(),
			$keys[10] => $this->getSalaju(),
			$keys[11] => $this->getStaapa(),
			$keys[12] => $this->getFecanu(),
			$keys[13] => $this->getCedrif(),
			$keys[14] => $this->getEstcie(),
			$keys[15] => $this->getFeccie(),
			$keys[16] => $this->getMoncie(),
			$keys[17] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpapafonPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefapa($value);
				break;
			case 1:
				$this->setTipapa($value);
				break;
			case 2:
				$this->setFecapa($value);
				break;
			case 3:
				$this->setAnoapa($value);
				break;
			case 4:
				$this->setDesapa($value);
				break;
			case 5:
				$this->setDesanu($value);
				break;
			case 6:
				$this->setMonapa($value);
				break;
			case 7:
				$this->setSalcom($value);
				break;
			case 8:
				$this->setSalcau($value);
				break;
			case 9:
				$this->setSalpag($value);
				break;
			case 10:
				$this->setSalaju($value);
				break;
			case 11:
				$this->setStaapa($value);
				break;
			case 12:
				$this->setFecanu($value);
				break;
			case 13:
				$this->setCedrif($value);
				break;
			case 14:
				$this->setEstcie($value);
				break;
			case 15:
				$this->setFeccie($value);
				break;
			case 16:
				$this->setMoncie($value);
				break;
			case 17:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpapafonPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefapa($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipapa($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecapa($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAnoapa($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDesapa($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDesanu($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonapa($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setSalcom($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setSalcau($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setSalpag($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setSalaju($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setStaapa($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFecanu($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCedrif($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setEstcie($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setFeccie($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setMoncie($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setId($arr[$keys[17]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpapafonPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpapafonPeer::REFAPA)) $criteria->add(CpapafonPeer::REFAPA, $this->refapa);
		if ($this->isColumnModified(CpapafonPeer::TIPAPA)) $criteria->add(CpapafonPeer::TIPAPA, $this->tipapa);
		if ($this->isColumnModified(CpapafonPeer::FECAPA)) $criteria->add(CpapafonPeer::FECAPA, $this->fecapa);
		if ($this->isColumnModified(CpapafonPeer::ANOAPA)) $criteria->add(CpapafonPeer::ANOAPA, $this->anoapa);
		if ($this->isColumnModified(CpapafonPeer::DESAPA)) $criteria->add(CpapafonPeer::DESAPA, $this->desapa);
		if ($this->isColumnModified(CpapafonPeer::DESANU)) $criteria->add(CpapafonPeer::DESANU, $this->desanu);
		if ($this->isColumnModified(CpapafonPeer::MONAPA)) $criteria->add(CpapafonPeer::MONAPA, $this->monapa);
		if ($this->isColumnModified(CpapafonPeer::SALCOM)) $criteria->add(CpapafonPeer::SALCOM, $this->salcom);
		if ($this->isColumnModified(CpapafonPeer::SALCAU)) $criteria->add(CpapafonPeer::SALCAU, $this->salcau);
		if ($this->isColumnModified(CpapafonPeer::SALPAG)) $criteria->add(CpapafonPeer::SALPAG, $this->salpag);
		if ($this->isColumnModified(CpapafonPeer::SALAJU)) $criteria->add(CpapafonPeer::SALAJU, $this->salaju);
		if ($this->isColumnModified(CpapafonPeer::STAAPA)) $criteria->add(CpapafonPeer::STAAPA, $this->staapa);
		if ($this->isColumnModified(CpapafonPeer::FECANU)) $criteria->add(CpapafonPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(CpapafonPeer::CEDRIF)) $criteria->add(CpapafonPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(CpapafonPeer::ESTCIE)) $criteria->add(CpapafonPeer::ESTCIE, $this->estcie);
		if ($this->isColumnModified(CpapafonPeer::FECCIE)) $criteria->add(CpapafonPeer::FECCIE, $this->feccie);
		if ($this->isColumnModified(CpapafonPeer::MONCIE)) $criteria->add(CpapafonPeer::MONCIE, $this->moncie);
		if ($this->isColumnModified(CpapafonPeer::ID)) $criteria->add(CpapafonPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpapafonPeer::DATABASE_NAME);

		$criteria->add(CpapafonPeer::ID, $this->id);

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

		$copyObj->setRefapa($this->refapa);

		$copyObj->setTipapa($this->tipapa);

		$copyObj->setFecapa($this->fecapa);

		$copyObj->setAnoapa($this->anoapa);

		$copyObj->setDesapa($this->desapa);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setMonapa($this->monapa);

		$copyObj->setSalcom($this->salcom);

		$copyObj->setSalcau($this->salcau);

		$copyObj->setSalpag($this->salpag);

		$copyObj->setSalaju($this->salaju);

		$copyObj->setStaapa($this->staapa);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setEstcie($this->estcie);

		$copyObj->setFeccie($this->feccie);

		$copyObj->setMoncie($this->moncie);


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
			self::$peer = new CpapafonPeer();
		}
		return self::$peer;
	}

} 