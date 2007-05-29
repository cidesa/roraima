<?php


abstract class BaseCobdocume extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refdoc;


	
	protected $codcli;


	
	protected $codmov;


	
	protected $fecemi;


	
	protected $fecven;


	
	protected $oridoc;


	
	protected $desdoc;


	
	protected $mondoc;


	
	protected $recdoc;


	
	protected $dscdoc;


	
	protected $abodoc;


	
	protected $saldoc;


	
	protected $desanu;


	
	protected $fecanu;


	
	protected $stadoc;


	
	protected $numcom;


	
	protected $feccom;


	
	protected $reffac;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getRefdoc()
	{

		return $this->refdoc; 		
	}
	
	public function getCodcli()
	{

		return $this->codcli; 		
	}
	
	public function getCodmov()
	{

		return $this->codmov; 		
	}
	
	public function getFecemi($format = 'Y-m-d')
	{

		if ($this->fecemi === null || $this->fecemi === '') {
			return null;
		} elseif (!is_int($this->fecemi)) {
						$ts = strtotime($this->fecemi);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecemi] as date/time value: " . var_export($this->fecemi, true));
			}
		} else {
			$ts = $this->fecemi;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecven($format = 'Y-m-d')
	{

		if ($this->fecven === null || $this->fecven === '') {
			return null;
		} elseif (!is_int($this->fecven)) {
						$ts = strtotime($this->fecven);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecven] as date/time value: " . var_export($this->fecven, true));
			}
		} else {
			$ts = $this->fecven;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getOridoc()
	{

		return $this->oridoc; 		
	}
	
	public function getDesdoc()
	{

		return $this->desdoc; 		
	}
	
	public function getMondoc()
	{

		return number_format($this->mondoc,2,',','.');
		
	}
	
	public function getRecdoc()
	{

		return number_format($this->recdoc,2,',','.');
		
	}
	
	public function getDscdoc()
	{

		return number_format($this->dscdoc,2,',','.');
		
	}
	
	public function getAbodoc()
	{

		return number_format($this->abodoc,2,',','.');
		
	}
	
	public function getSaldoc()
	{

		return number_format($this->saldoc,2,',','.');
		
	}
	
	public function getDesanu()
	{

		return $this->desanu; 		
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

	
	public function getStadoc()
	{

		return $this->stadoc; 		
	}
	
	public function getNumcom()
	{

		return $this->numcom; 		
	}
	
	public function getFeccom($format = 'Y-m-d')
	{

		if ($this->feccom === null || $this->feccom === '') {
			return null;
		} elseif (!is_int($this->feccom)) {
						$ts = strtotime($this->feccom);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [feccom] as date/time value: " . var_export($this->feccom, true));
			}
		} else {
			$ts = $this->feccom;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getReffac()
	{

		return $this->reffac; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setRefdoc($v)
	{

		if ($this->refdoc !== $v) {
			$this->refdoc = $v;
			$this->modifiedColumns[] = CobdocumePeer::REFDOC;
		}

	} 
	
	public function setCodcli($v)
	{

		if ($this->codcli !== $v) {
			$this->codcli = $v;
			$this->modifiedColumns[] = CobdocumePeer::CODCLI;
		}

	} 
	
	public function setCodmov($v)
	{

		if ($this->codmov !== $v) {
			$this->codmov = $v;
			$this->modifiedColumns[] = CobdocumePeer::CODMOV;
		}

	} 
	
	public function setFecemi($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecemi] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecemi !== $ts) {
			$this->fecemi = $ts;
			$this->modifiedColumns[] = CobdocumePeer::FECEMI;
		}

	} 
	
	public function setFecven($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecven] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecven !== $ts) {
			$this->fecven = $ts;
			$this->modifiedColumns[] = CobdocumePeer::FECVEN;
		}

	} 
	
	public function setOridoc($v)
	{

		if ($this->oridoc !== $v) {
			$this->oridoc = $v;
			$this->modifiedColumns[] = CobdocumePeer::ORIDOC;
		}

	} 
	
	public function setDesdoc($v)
	{

		if ($this->desdoc !== $v) {
			$this->desdoc = $v;
			$this->modifiedColumns[] = CobdocumePeer::DESDOC;
		}

	} 
	
	public function setMondoc($v)
	{

		if ($this->mondoc !== $v) {
			$this->mondoc = $v;
			$this->modifiedColumns[] = CobdocumePeer::MONDOC;
		}

	} 
	
	public function setRecdoc($v)
	{

		if ($this->recdoc !== $v) {
			$this->recdoc = $v;
			$this->modifiedColumns[] = CobdocumePeer::RECDOC;
		}

	} 
	
	public function setDscdoc($v)
	{

		if ($this->dscdoc !== $v) {
			$this->dscdoc = $v;
			$this->modifiedColumns[] = CobdocumePeer::DSCDOC;
		}

	} 
	
	public function setAbodoc($v)
	{

		if ($this->abodoc !== $v) {
			$this->abodoc = $v;
			$this->modifiedColumns[] = CobdocumePeer::ABODOC;
		}

	} 
	
	public function setSaldoc($v)
	{

		if ($this->saldoc !== $v) {
			$this->saldoc = $v;
			$this->modifiedColumns[] = CobdocumePeer::SALDOC;
		}

	} 
	
	public function setDesanu($v)
	{

		if ($this->desanu !== $v) {
			$this->desanu = $v;
			$this->modifiedColumns[] = CobdocumePeer::DESANU;
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
			$this->modifiedColumns[] = CobdocumePeer::FECANU;
		}

	} 
	
	public function setStadoc($v)
	{

		if ($this->stadoc !== $v) {
			$this->stadoc = $v;
			$this->modifiedColumns[] = CobdocumePeer::STADOC;
		}

	} 
	
	public function setNumcom($v)
	{

		if ($this->numcom !== $v) {
			$this->numcom = $v;
			$this->modifiedColumns[] = CobdocumePeer::NUMCOM;
		}

	} 
	
	public function setFeccom($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [feccom] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->feccom !== $ts) {
			$this->feccom = $ts;
			$this->modifiedColumns[] = CobdocumePeer::FECCOM;
		}

	} 
	
	public function setReffac($v)
	{

		if ($this->reffac !== $v) {
			$this->reffac = $v;
			$this->modifiedColumns[] = CobdocumePeer::REFFAC;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CobdocumePeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->refdoc = $rs->getString($startcol + 0);

			$this->codcli = $rs->getString($startcol + 1);

			$this->codmov = $rs->getString($startcol + 2);

			$this->fecemi = $rs->getDate($startcol + 3, null);

			$this->fecven = $rs->getDate($startcol + 4, null);

			$this->oridoc = $rs->getString($startcol + 5);

			$this->desdoc = $rs->getString($startcol + 6);

			$this->mondoc = $rs->getFloat($startcol + 7);

			$this->recdoc = $rs->getFloat($startcol + 8);

			$this->dscdoc = $rs->getFloat($startcol + 9);

			$this->abodoc = $rs->getFloat($startcol + 10);

			$this->saldoc = $rs->getFloat($startcol + 11);

			$this->desanu = $rs->getString($startcol + 12);

			$this->fecanu = $rs->getDate($startcol + 13, null);

			$this->stadoc = $rs->getString($startcol + 14);

			$this->numcom = $rs->getString($startcol + 15);

			$this->feccom = $rs->getDate($startcol + 16, null);

			$this->reffac = $rs->getString($startcol + 17);

			$this->id = $rs->getInt($startcol + 18);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 19; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cobdocume object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CobdocumePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CobdocumePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CobdocumePeer::DATABASE_NAME);
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
					$pk = CobdocumePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CobdocumePeer::doUpdate($this, $con);
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


			if (($retval = CobdocumePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CobdocumePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefdoc();
				break;
			case 1:
				return $this->getCodcli();
				break;
			case 2:
				return $this->getCodmov();
				break;
			case 3:
				return $this->getFecemi();
				break;
			case 4:
				return $this->getFecven();
				break;
			case 5:
				return $this->getOridoc();
				break;
			case 6:
				return $this->getDesdoc();
				break;
			case 7:
				return $this->getMondoc();
				break;
			case 8:
				return $this->getRecdoc();
				break;
			case 9:
				return $this->getDscdoc();
				break;
			case 10:
				return $this->getAbodoc();
				break;
			case 11:
				return $this->getSaldoc();
				break;
			case 12:
				return $this->getDesanu();
				break;
			case 13:
				return $this->getFecanu();
				break;
			case 14:
				return $this->getStadoc();
				break;
			case 15:
				return $this->getNumcom();
				break;
			case 16:
				return $this->getFeccom();
				break;
			case 17:
				return $this->getReffac();
				break;
			case 18:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CobdocumePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefdoc(),
			$keys[1] => $this->getCodcli(),
			$keys[2] => $this->getCodmov(),
			$keys[3] => $this->getFecemi(),
			$keys[4] => $this->getFecven(),
			$keys[5] => $this->getOridoc(),
			$keys[6] => $this->getDesdoc(),
			$keys[7] => $this->getMondoc(),
			$keys[8] => $this->getRecdoc(),
			$keys[9] => $this->getDscdoc(),
			$keys[10] => $this->getAbodoc(),
			$keys[11] => $this->getSaldoc(),
			$keys[12] => $this->getDesanu(),
			$keys[13] => $this->getFecanu(),
			$keys[14] => $this->getStadoc(),
			$keys[15] => $this->getNumcom(),
			$keys[16] => $this->getFeccom(),
			$keys[17] => $this->getReffac(),
			$keys[18] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CobdocumePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefdoc($value);
				break;
			case 1:
				$this->setCodcli($value);
				break;
			case 2:
				$this->setCodmov($value);
				break;
			case 3:
				$this->setFecemi($value);
				break;
			case 4:
				$this->setFecven($value);
				break;
			case 5:
				$this->setOridoc($value);
				break;
			case 6:
				$this->setDesdoc($value);
				break;
			case 7:
				$this->setMondoc($value);
				break;
			case 8:
				$this->setRecdoc($value);
				break;
			case 9:
				$this->setDscdoc($value);
				break;
			case 10:
				$this->setAbodoc($value);
				break;
			case 11:
				$this->setSaldoc($value);
				break;
			case 12:
				$this->setDesanu($value);
				break;
			case 13:
				$this->setFecanu($value);
				break;
			case 14:
				$this->setStadoc($value);
				break;
			case 15:
				$this->setNumcom($value);
				break;
			case 16:
				$this->setFeccom($value);
				break;
			case 17:
				$this->setReffac($value);
				break;
			case 18:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CobdocumePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefdoc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcli($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodmov($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecemi($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecven($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setOridoc($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDesdoc($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMondoc($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setRecdoc($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDscdoc($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setAbodoc($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setSaldoc($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDesanu($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFecanu($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setStadoc($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setNumcom($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setFeccom($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setReffac($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setId($arr[$keys[18]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CobdocumePeer::DATABASE_NAME);

		if ($this->isColumnModified(CobdocumePeer::REFDOC)) $criteria->add(CobdocumePeer::REFDOC, $this->refdoc);
		if ($this->isColumnModified(CobdocumePeer::CODCLI)) $criteria->add(CobdocumePeer::CODCLI, $this->codcli);
		if ($this->isColumnModified(CobdocumePeer::CODMOV)) $criteria->add(CobdocumePeer::CODMOV, $this->codmov);
		if ($this->isColumnModified(CobdocumePeer::FECEMI)) $criteria->add(CobdocumePeer::FECEMI, $this->fecemi);
		if ($this->isColumnModified(CobdocumePeer::FECVEN)) $criteria->add(CobdocumePeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(CobdocumePeer::ORIDOC)) $criteria->add(CobdocumePeer::ORIDOC, $this->oridoc);
		if ($this->isColumnModified(CobdocumePeer::DESDOC)) $criteria->add(CobdocumePeer::DESDOC, $this->desdoc);
		if ($this->isColumnModified(CobdocumePeer::MONDOC)) $criteria->add(CobdocumePeer::MONDOC, $this->mondoc);
		if ($this->isColumnModified(CobdocumePeer::RECDOC)) $criteria->add(CobdocumePeer::RECDOC, $this->recdoc);
		if ($this->isColumnModified(CobdocumePeer::DSCDOC)) $criteria->add(CobdocumePeer::DSCDOC, $this->dscdoc);
		if ($this->isColumnModified(CobdocumePeer::ABODOC)) $criteria->add(CobdocumePeer::ABODOC, $this->abodoc);
		if ($this->isColumnModified(CobdocumePeer::SALDOC)) $criteria->add(CobdocumePeer::SALDOC, $this->saldoc);
		if ($this->isColumnModified(CobdocumePeer::DESANU)) $criteria->add(CobdocumePeer::DESANU, $this->desanu);
		if ($this->isColumnModified(CobdocumePeer::FECANU)) $criteria->add(CobdocumePeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(CobdocumePeer::STADOC)) $criteria->add(CobdocumePeer::STADOC, $this->stadoc);
		if ($this->isColumnModified(CobdocumePeer::NUMCOM)) $criteria->add(CobdocumePeer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(CobdocumePeer::FECCOM)) $criteria->add(CobdocumePeer::FECCOM, $this->feccom);
		if ($this->isColumnModified(CobdocumePeer::REFFAC)) $criteria->add(CobdocumePeer::REFFAC, $this->reffac);
		if ($this->isColumnModified(CobdocumePeer::ID)) $criteria->add(CobdocumePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CobdocumePeer::DATABASE_NAME);

		$criteria->add(CobdocumePeer::ID, $this->id);

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

		$copyObj->setRefdoc($this->refdoc);

		$copyObj->setCodcli($this->codcli);

		$copyObj->setCodmov($this->codmov);

		$copyObj->setFecemi($this->fecemi);

		$copyObj->setFecven($this->fecven);

		$copyObj->setOridoc($this->oridoc);

		$copyObj->setDesdoc($this->desdoc);

		$copyObj->setMondoc($this->mondoc);

		$copyObj->setRecdoc($this->recdoc);

		$copyObj->setDscdoc($this->dscdoc);

		$copyObj->setAbodoc($this->abodoc);

		$copyObj->setSaldoc($this->saldoc);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setStadoc($this->stadoc);

		$copyObj->setNumcom($this->numcom);

		$copyObj->setFeccom($this->feccom);

		$copyObj->setReffac($this->reffac);


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
			self::$peer = new CobdocumePeer();
		}
		return self::$peer;
	}

} 