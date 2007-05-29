<?php


abstract class BaseNpimppresocant extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $feccor;


	
	protected $fecini;


	
	protected $fecfin;


	
	protected $salemp;


	
	protected $tasint;


	
	protected $capemp;


	
	protected $intdev;


	
	protected $antacum;


	
	protected $anoser;


	
	protected $adeant;


	
	protected $intacum;


	
	protected $diadif;


	
	protected $regpre;


	
	protected $diaart108;


	
	protected $valart108;


	
	protected $adepre;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodemp()
	{

		return $this->codemp; 		
	}
	
	public function getFeccor($format = 'Y-m-d')
	{

		if ($this->feccor === null || $this->feccor === '') {
			return null;
		} elseif (!is_int($this->feccor)) {
						$ts = strtotime($this->feccor);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [feccor] as date/time value: " . var_export($this->feccor, true));
			}
		} else {
			$ts = $this->feccor;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecini($format = 'Y-m-d')
	{

		if ($this->fecini === null || $this->fecini === '') {
			return null;
		} elseif (!is_int($this->fecini)) {
						$ts = strtotime($this->fecini);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecini] as date/time value: " . var_export($this->fecini, true));
			}
		} else {
			$ts = $this->fecini;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecfin($format = 'Y-m-d')
	{

		if ($this->fecfin === null || $this->fecfin === '') {
			return null;
		} elseif (!is_int($this->fecfin)) {
						$ts = strtotime($this->fecfin);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecfin] as date/time value: " . var_export($this->fecfin, true));
			}
		} else {
			$ts = $this->fecfin;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getSalemp()
	{

		return number_format($this->salemp,2,',','.');
		
	}
	
	public function getTasint()
	{

		return number_format($this->tasint,2,',','.');
		
	}
	
	public function getCapemp()
	{

		return number_format($this->capemp,2,',','.');
		
	}
	
	public function getIntdev()
	{

		return number_format($this->intdev,2,',','.');
		
	}
	
	public function getAntacum()
	{

		return number_format($this->antacum,2,',','.');
		
	}
	
	public function getAnoser()
	{

		return number_format($this->anoser,2,',','.');
		
	}
	
	public function getAdeant()
	{

		return number_format($this->adeant,2,',','.');
		
	}
	
	public function getIntacum()
	{

		return number_format($this->intacum,2,',','.');
		
	}
	
	public function getDiadif()
	{

		return number_format($this->diadif,2,',','.');
		
	}
	
	public function getRegpre()
	{

		return $this->regpre; 		
	}
	
	public function getDiaart108()
	{

		return number_format($this->diaart108,2,',','.');
		
	}
	
	public function getValart108()
	{

		return number_format($this->valart108,2,',','.');
		
	}
	
	public function getAdepre()
	{

		return number_format($this->adepre,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = NpimppresocantPeer::CODEMP;
		}

	} 
	
	public function setFeccor($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [feccor] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->feccor !== $ts) {
			$this->feccor = $ts;
			$this->modifiedColumns[] = NpimppresocantPeer::FECCOR;
		}

	} 
	
	public function setFecini($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecini] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecini !== $ts) {
			$this->fecini = $ts;
			$this->modifiedColumns[] = NpimppresocantPeer::FECINI;
		}

	} 
	
	public function setFecfin($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecfin] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecfin !== $ts) {
			$this->fecfin = $ts;
			$this->modifiedColumns[] = NpimppresocantPeer::FECFIN;
		}

	} 
	
	public function setSalemp($v)
	{

		if ($this->salemp !== $v) {
			$this->salemp = $v;
			$this->modifiedColumns[] = NpimppresocantPeer::SALEMP;
		}

	} 
	
	public function setTasint($v)
	{

		if ($this->tasint !== $v) {
			$this->tasint = $v;
			$this->modifiedColumns[] = NpimppresocantPeer::TASINT;
		}

	} 
	
	public function setCapemp($v)
	{

		if ($this->capemp !== $v) {
			$this->capemp = $v;
			$this->modifiedColumns[] = NpimppresocantPeer::CAPEMP;
		}

	} 
	
	public function setIntdev($v)
	{

		if ($this->intdev !== $v) {
			$this->intdev = $v;
			$this->modifiedColumns[] = NpimppresocantPeer::INTDEV;
		}

	} 
	
	public function setAntacum($v)
	{

		if ($this->antacum !== $v) {
			$this->antacum = $v;
			$this->modifiedColumns[] = NpimppresocantPeer::ANTACUM;
		}

	} 
	
	public function setAnoser($v)
	{

		if ($this->anoser !== $v) {
			$this->anoser = $v;
			$this->modifiedColumns[] = NpimppresocantPeer::ANOSER;
		}

	} 
	
	public function setAdeant($v)
	{

		if ($this->adeant !== $v) {
			$this->adeant = $v;
			$this->modifiedColumns[] = NpimppresocantPeer::ADEANT;
		}

	} 
	
	public function setIntacum($v)
	{

		if ($this->intacum !== $v) {
			$this->intacum = $v;
			$this->modifiedColumns[] = NpimppresocantPeer::INTACUM;
		}

	} 
	
	public function setDiadif($v)
	{

		if ($this->diadif !== $v) {
			$this->diadif = $v;
			$this->modifiedColumns[] = NpimppresocantPeer::DIADIF;
		}

	} 
	
	public function setRegpre($v)
	{

		if ($this->regpre !== $v) {
			$this->regpre = $v;
			$this->modifiedColumns[] = NpimppresocantPeer::REGPRE;
		}

	} 
	
	public function setDiaart108($v)
	{

		if ($this->diaart108 !== $v) {
			$this->diaart108 = $v;
			$this->modifiedColumns[] = NpimppresocantPeer::DIAART108;
		}

	} 
	
	public function setValart108($v)
	{

		if ($this->valart108 !== $v) {
			$this->valart108 = $v;
			$this->modifiedColumns[] = NpimppresocantPeer::VALART108;
		}

	} 
	
	public function setAdepre($v)
	{

		if ($this->adepre !== $v) {
			$this->adepre = $v;
			$this->modifiedColumns[] = NpimppresocantPeer::ADEPRE;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpimppresocantPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codemp = $rs->getString($startcol + 0);

			$this->feccor = $rs->getDate($startcol + 1, null);

			$this->fecini = $rs->getDate($startcol + 2, null);

			$this->fecfin = $rs->getDate($startcol + 3, null);

			$this->salemp = $rs->getFloat($startcol + 4);

			$this->tasint = $rs->getFloat($startcol + 5);

			$this->capemp = $rs->getFloat($startcol + 6);

			$this->intdev = $rs->getFloat($startcol + 7);

			$this->antacum = $rs->getFloat($startcol + 8);

			$this->anoser = $rs->getFloat($startcol + 9);

			$this->adeant = $rs->getFloat($startcol + 10);

			$this->intacum = $rs->getFloat($startcol + 11);

			$this->diadif = $rs->getFloat($startcol + 12);

			$this->regpre = $rs->getString($startcol + 13);

			$this->diaart108 = $rs->getFloat($startcol + 14);

			$this->valart108 = $rs->getFloat($startcol + 15);

			$this->adepre = $rs->getFloat($startcol + 16);

			$this->id = $rs->getInt($startcol + 17);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 18; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npimppresocant object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpimppresocantPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpimppresocantPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpimppresocantPeer::DATABASE_NAME);
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
					$pk = NpimppresocantPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpimppresocantPeer::doUpdate($this, $con);
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


			if (($retval = NpimppresocantPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpimppresocantPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getFeccor();
				break;
			case 2:
				return $this->getFecini();
				break;
			case 3:
				return $this->getFecfin();
				break;
			case 4:
				return $this->getSalemp();
				break;
			case 5:
				return $this->getTasint();
				break;
			case 6:
				return $this->getCapemp();
				break;
			case 7:
				return $this->getIntdev();
				break;
			case 8:
				return $this->getAntacum();
				break;
			case 9:
				return $this->getAnoser();
				break;
			case 10:
				return $this->getAdeant();
				break;
			case 11:
				return $this->getIntacum();
				break;
			case 12:
				return $this->getDiadif();
				break;
			case 13:
				return $this->getRegpre();
				break;
			case 14:
				return $this->getDiaart108();
				break;
			case 15:
				return $this->getValart108();
				break;
			case 16:
				return $this->getAdepre();
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
		$keys = NpimppresocantPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getFeccor(),
			$keys[2] => $this->getFecini(),
			$keys[3] => $this->getFecfin(),
			$keys[4] => $this->getSalemp(),
			$keys[5] => $this->getTasint(),
			$keys[6] => $this->getCapemp(),
			$keys[7] => $this->getIntdev(),
			$keys[8] => $this->getAntacum(),
			$keys[9] => $this->getAnoser(),
			$keys[10] => $this->getAdeant(),
			$keys[11] => $this->getIntacum(),
			$keys[12] => $this->getDiadif(),
			$keys[13] => $this->getRegpre(),
			$keys[14] => $this->getDiaart108(),
			$keys[15] => $this->getValart108(),
			$keys[16] => $this->getAdepre(),
			$keys[17] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpimppresocantPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setFeccor($value);
				break;
			case 2:
				$this->setFecini($value);
				break;
			case 3:
				$this->setFecfin($value);
				break;
			case 4:
				$this->setSalemp($value);
				break;
			case 5:
				$this->setTasint($value);
				break;
			case 6:
				$this->setCapemp($value);
				break;
			case 7:
				$this->setIntdev($value);
				break;
			case 8:
				$this->setAntacum($value);
				break;
			case 9:
				$this->setAnoser($value);
				break;
			case 10:
				$this->setAdeant($value);
				break;
			case 11:
				$this->setIntacum($value);
				break;
			case 12:
				$this->setDiadif($value);
				break;
			case 13:
				$this->setRegpre($value);
				break;
			case 14:
				$this->setDiaart108($value);
				break;
			case 15:
				$this->setValart108($value);
				break;
			case 16:
				$this->setAdepre($value);
				break;
			case 17:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpimppresocantPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFeccor($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecini($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecfin($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setSalemp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTasint($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCapemp($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setIntdev($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setAntacum($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setAnoser($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setAdeant($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setIntacum($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDiadif($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setRegpre($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setDiaart108($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setValart108($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setAdepre($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setId($arr[$keys[17]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpimppresocantPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpimppresocantPeer::CODEMP)) $criteria->add(NpimppresocantPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpimppresocantPeer::FECCOR)) $criteria->add(NpimppresocantPeer::FECCOR, $this->feccor);
		if ($this->isColumnModified(NpimppresocantPeer::FECINI)) $criteria->add(NpimppresocantPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(NpimppresocantPeer::FECFIN)) $criteria->add(NpimppresocantPeer::FECFIN, $this->fecfin);
		if ($this->isColumnModified(NpimppresocantPeer::SALEMP)) $criteria->add(NpimppresocantPeer::SALEMP, $this->salemp);
		if ($this->isColumnModified(NpimppresocantPeer::TASINT)) $criteria->add(NpimppresocantPeer::TASINT, $this->tasint);
		if ($this->isColumnModified(NpimppresocantPeer::CAPEMP)) $criteria->add(NpimppresocantPeer::CAPEMP, $this->capemp);
		if ($this->isColumnModified(NpimppresocantPeer::INTDEV)) $criteria->add(NpimppresocantPeer::INTDEV, $this->intdev);
		if ($this->isColumnModified(NpimppresocantPeer::ANTACUM)) $criteria->add(NpimppresocantPeer::ANTACUM, $this->antacum);
		if ($this->isColumnModified(NpimppresocantPeer::ANOSER)) $criteria->add(NpimppresocantPeer::ANOSER, $this->anoser);
		if ($this->isColumnModified(NpimppresocantPeer::ADEANT)) $criteria->add(NpimppresocantPeer::ADEANT, $this->adeant);
		if ($this->isColumnModified(NpimppresocantPeer::INTACUM)) $criteria->add(NpimppresocantPeer::INTACUM, $this->intacum);
		if ($this->isColumnModified(NpimppresocantPeer::DIADIF)) $criteria->add(NpimppresocantPeer::DIADIF, $this->diadif);
		if ($this->isColumnModified(NpimppresocantPeer::REGPRE)) $criteria->add(NpimppresocantPeer::REGPRE, $this->regpre);
		if ($this->isColumnModified(NpimppresocantPeer::DIAART108)) $criteria->add(NpimppresocantPeer::DIAART108, $this->diaart108);
		if ($this->isColumnModified(NpimppresocantPeer::VALART108)) $criteria->add(NpimppresocantPeer::VALART108, $this->valart108);
		if ($this->isColumnModified(NpimppresocantPeer::ADEPRE)) $criteria->add(NpimppresocantPeer::ADEPRE, $this->adepre);
		if ($this->isColumnModified(NpimppresocantPeer::ID)) $criteria->add(NpimppresocantPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpimppresocantPeer::DATABASE_NAME);

		$criteria->add(NpimppresocantPeer::ID, $this->id);

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

		$copyObj->setFeccor($this->feccor);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFecfin($this->fecfin);

		$copyObj->setSalemp($this->salemp);

		$copyObj->setTasint($this->tasint);

		$copyObj->setCapemp($this->capemp);

		$copyObj->setIntdev($this->intdev);

		$copyObj->setAntacum($this->antacum);

		$copyObj->setAnoser($this->anoser);

		$copyObj->setAdeant($this->adeant);

		$copyObj->setIntacum($this->intacum);

		$copyObj->setDiadif($this->diadif);

		$copyObj->setRegpre($this->regpre);

		$copyObj->setDiaart108($this->diaart108);

		$copyObj->setValart108($this->valart108);

		$copyObj->setAdepre($this->adepre);


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
			self::$peer = new NpimppresocantPeer();
		}
		return self::$peer;
	}

} 