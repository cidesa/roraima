<?php


abstract class BaseTscheemi extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numche;


	
	protected $numcue;


	
	protected $cedrif;


	
	protected $fecemi;


	
	protected $monche;


	
	protected $status;


	
	protected $codemi;


	
	protected $fecent;


	
	protected $codent;


	
	protected $obsent;


	
	protected $fecanu;


	
	protected $cedrec;


	
	protected $nomrec;


	
	protected $tipdoc;


	
	protected $fecing;


	
	protected $temporal;


	
	protected $temporal2;


	
	protected $nombensus;


	
	protected $anopre;


	
	protected $numtiq;


	
	protected $cedaut;


	
	protected $peraut;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNumche()
	{

		return $this->numche; 		
	}
	
	public function getNumcue()
	{

		return $this->numcue; 		
	}
	
	public function getCedrif()
	{

		return $this->cedrif; 		
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

	
	public function getMonche()
	{

		return number_format($this->monche,2,',','.');
		
	}
	
	public function getStatus()
	{

		return $this->status; 		
	}
	
	public function getCodemi()
	{

		return $this->codemi; 		
	}
	
	public function getFecent($format = 'Y-m-d')
	{

		if ($this->fecent === null || $this->fecent === '') {
			return null;
		} elseif (!is_int($this->fecent)) {
						$ts = strtotime($this->fecent);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecent] as date/time value: " . var_export($this->fecent, true));
			}
		} else {
			$ts = $this->fecent;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getCodent()
	{

		return $this->codent; 		
	}
	
	public function getObsent()
	{

		return $this->obsent; 		
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

	
	public function getCedrec()
	{

		return $this->cedrec; 		
	}
	
	public function getNomrec()
	{

		return $this->nomrec; 		
	}
	
	public function getTipdoc()
	{

		return $this->tipdoc; 		
	}
	
	public function getFecing($format = 'Y-m-d')
	{

		if ($this->fecing === null || $this->fecing === '') {
			return null;
		} elseif (!is_int($this->fecing)) {
						$ts = strtotime($this->fecing);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecing] as date/time value: " . var_export($this->fecing, true));
			}
		} else {
			$ts = $this->fecing;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getTemporal()
	{

		return $this->temporal; 		
	}
	
	public function getTemporal2()
	{

		return $this->temporal2; 		
	}
	
	public function getNombensus()
	{

		return $this->nombensus; 		
	}
	
	public function getAnopre()
	{

		return $this->anopre; 		
	}
	
	public function getNumtiq()
	{

		return $this->numtiq; 		
	}
	
	public function getCedaut()
	{

		return $this->cedaut; 		
	}
	
	public function getPeraut()
	{

		return $this->peraut; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setNumche($v)
	{

		if ($this->numche !== $v) {
			$this->numche = $v;
			$this->modifiedColumns[] = TscheemiPeer::NUMCHE;
		}

	} 
	
	public function setNumcue($v)
	{

		if ($this->numcue !== $v) {
			$this->numcue = $v;
			$this->modifiedColumns[] = TscheemiPeer::NUMCUE;
		}

	} 
	
	public function setCedrif($v)
	{

		if ($this->cedrif !== $v) {
			$this->cedrif = $v;
			$this->modifiedColumns[] = TscheemiPeer::CEDRIF;
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
			$this->modifiedColumns[] = TscheemiPeer::FECEMI;
		}

	} 
	
	public function setMonche($v)
	{

		if ($this->monche !== $v) {
			$this->monche = $v;
			$this->modifiedColumns[] = TscheemiPeer::MONCHE;
		}

	} 
	
	public function setStatus($v)
	{

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = TscheemiPeer::STATUS;
		}

	} 
	
	public function setCodemi($v)
	{

		if ($this->codemi !== $v) {
			$this->codemi = $v;
			$this->modifiedColumns[] = TscheemiPeer::CODEMI;
		}

	} 
	
	public function setFecent($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecent] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecent !== $ts) {
			$this->fecent = $ts;
			$this->modifiedColumns[] = TscheemiPeer::FECENT;
		}

	} 
	
	public function setCodent($v)
	{

		if ($this->codent !== $v) {
			$this->codent = $v;
			$this->modifiedColumns[] = TscheemiPeer::CODENT;
		}

	} 
	
	public function setObsent($v)
	{

		if ($this->obsent !== $v) {
			$this->obsent = $v;
			$this->modifiedColumns[] = TscheemiPeer::OBSENT;
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
			$this->modifiedColumns[] = TscheemiPeer::FECANU;
		}

	} 
	
	public function setCedrec($v)
	{

		if ($this->cedrec !== $v) {
			$this->cedrec = $v;
			$this->modifiedColumns[] = TscheemiPeer::CEDREC;
		}

	} 
	
	public function setNomrec($v)
	{

		if ($this->nomrec !== $v) {
			$this->nomrec = $v;
			$this->modifiedColumns[] = TscheemiPeer::NOMREC;
		}

	} 
	
	public function setTipdoc($v)
	{

		if ($this->tipdoc !== $v) {
			$this->tipdoc = $v;
			$this->modifiedColumns[] = TscheemiPeer::TIPDOC;
		}

	} 
	
	public function setFecing($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecing] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecing !== $ts) {
			$this->fecing = $ts;
			$this->modifiedColumns[] = TscheemiPeer::FECING;
		}

	} 
	
	public function setTemporal($v)
	{

		if ($this->temporal !== $v) {
			$this->temporal = $v;
			$this->modifiedColumns[] = TscheemiPeer::TEMPORAL;
		}

	} 
	
	public function setTemporal2($v)
	{

		if ($this->temporal2 !== $v) {
			$this->temporal2 = $v;
			$this->modifiedColumns[] = TscheemiPeer::TEMPORAL2;
		}

	} 
	
	public function setNombensus($v)
	{

		if ($this->nombensus !== $v) {
			$this->nombensus = $v;
			$this->modifiedColumns[] = TscheemiPeer::NOMBENSUS;
		}

	} 
	
	public function setAnopre($v)
	{

		if ($this->anopre !== $v) {
			$this->anopre = $v;
			$this->modifiedColumns[] = TscheemiPeer::ANOPRE;
		}

	} 
	
	public function setNumtiq($v)
	{

		if ($this->numtiq !== $v) {
			$this->numtiq = $v;
			$this->modifiedColumns[] = TscheemiPeer::NUMTIQ;
		}

	} 
	
	public function setCedaut($v)
	{

		if ($this->cedaut !== $v) {
			$this->cedaut = $v;
			$this->modifiedColumns[] = TscheemiPeer::CEDAUT;
		}

	} 
	
	public function setPeraut($v)
	{

		if ($this->peraut !== $v) {
			$this->peraut = $v;
			$this->modifiedColumns[] = TscheemiPeer::PERAUT;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TscheemiPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->numche = $rs->getString($startcol + 0);

			$this->numcue = $rs->getString($startcol + 1);

			$this->cedrif = $rs->getString($startcol + 2);

			$this->fecemi = $rs->getDate($startcol + 3, null);

			$this->monche = $rs->getFloat($startcol + 4);

			$this->status = $rs->getString($startcol + 5);

			$this->codemi = $rs->getString($startcol + 6);

			$this->fecent = $rs->getDate($startcol + 7, null);

			$this->codent = $rs->getString($startcol + 8);

			$this->obsent = $rs->getString($startcol + 9);

			$this->fecanu = $rs->getDate($startcol + 10, null);

			$this->cedrec = $rs->getString($startcol + 11);

			$this->nomrec = $rs->getString($startcol + 12);

			$this->tipdoc = $rs->getString($startcol + 13);

			$this->fecing = $rs->getDate($startcol + 14, null);

			$this->temporal = $rs->getString($startcol + 15);

			$this->temporal2 = $rs->getString($startcol + 16);

			$this->nombensus = $rs->getString($startcol + 17);

			$this->anopre = $rs->getString($startcol + 18);

			$this->numtiq = $rs->getString($startcol + 19);

			$this->cedaut = $rs->getString($startcol + 20);

			$this->peraut = $rs->getString($startcol + 21);

			$this->id = $rs->getInt($startcol + 22);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 23; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Tscheemi object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TscheemiPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TscheemiPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TscheemiPeer::DATABASE_NAME);
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
					$pk = TscheemiPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += TscheemiPeer::doUpdate($this, $con);
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


			if (($retval = TscheemiPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TscheemiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumche();
				break;
			case 1:
				return $this->getNumcue();
				break;
			case 2:
				return $this->getCedrif();
				break;
			case 3:
				return $this->getFecemi();
				break;
			case 4:
				return $this->getMonche();
				break;
			case 5:
				return $this->getStatus();
				break;
			case 6:
				return $this->getCodemi();
				break;
			case 7:
				return $this->getFecent();
				break;
			case 8:
				return $this->getCodent();
				break;
			case 9:
				return $this->getObsent();
				break;
			case 10:
				return $this->getFecanu();
				break;
			case 11:
				return $this->getCedrec();
				break;
			case 12:
				return $this->getNomrec();
				break;
			case 13:
				return $this->getTipdoc();
				break;
			case 14:
				return $this->getFecing();
				break;
			case 15:
				return $this->getTemporal();
				break;
			case 16:
				return $this->getTemporal2();
				break;
			case 17:
				return $this->getNombensus();
				break;
			case 18:
				return $this->getAnopre();
				break;
			case 19:
				return $this->getNumtiq();
				break;
			case 20:
				return $this->getCedaut();
				break;
			case 21:
				return $this->getPeraut();
				break;
			case 22:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TscheemiPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumche(),
			$keys[1] => $this->getNumcue(),
			$keys[2] => $this->getCedrif(),
			$keys[3] => $this->getFecemi(),
			$keys[4] => $this->getMonche(),
			$keys[5] => $this->getStatus(),
			$keys[6] => $this->getCodemi(),
			$keys[7] => $this->getFecent(),
			$keys[8] => $this->getCodent(),
			$keys[9] => $this->getObsent(),
			$keys[10] => $this->getFecanu(),
			$keys[11] => $this->getCedrec(),
			$keys[12] => $this->getNomrec(),
			$keys[13] => $this->getTipdoc(),
			$keys[14] => $this->getFecing(),
			$keys[15] => $this->getTemporal(),
			$keys[16] => $this->getTemporal2(),
			$keys[17] => $this->getNombensus(),
			$keys[18] => $this->getAnopre(),
			$keys[19] => $this->getNumtiq(),
			$keys[20] => $this->getCedaut(),
			$keys[21] => $this->getPeraut(),
			$keys[22] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TscheemiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumche($value);
				break;
			case 1:
				$this->setNumcue($value);
				break;
			case 2:
				$this->setCedrif($value);
				break;
			case 3:
				$this->setFecemi($value);
				break;
			case 4:
				$this->setMonche($value);
				break;
			case 5:
				$this->setStatus($value);
				break;
			case 6:
				$this->setCodemi($value);
				break;
			case 7:
				$this->setFecent($value);
				break;
			case 8:
				$this->setCodent($value);
				break;
			case 9:
				$this->setObsent($value);
				break;
			case 10:
				$this->setFecanu($value);
				break;
			case 11:
				$this->setCedrec($value);
				break;
			case 12:
				$this->setNomrec($value);
				break;
			case 13:
				$this->setTipdoc($value);
				break;
			case 14:
				$this->setFecing($value);
				break;
			case 15:
				$this->setTemporal($value);
				break;
			case 16:
				$this->setTemporal2($value);
				break;
			case 17:
				$this->setNombensus($value);
				break;
			case 18:
				$this->setAnopre($value);
				break;
			case 19:
				$this->setNumtiq($value);
				break;
			case 20:
				$this->setCedaut($value);
				break;
			case 21:
				$this->setPeraut($value);
				break;
			case 22:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TscheemiPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumche($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumcue($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCedrif($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecemi($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonche($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStatus($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodemi($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecent($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodent($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setObsent($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFecanu($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCedrec($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setNomrec($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setTipdoc($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setFecing($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setTemporal($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setTemporal2($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setNombensus($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setAnopre($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setNumtiq($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCedaut($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setPeraut($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setId($arr[$keys[22]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TscheemiPeer::DATABASE_NAME);

		if ($this->isColumnModified(TscheemiPeer::NUMCHE)) $criteria->add(TscheemiPeer::NUMCHE, $this->numche);
		if ($this->isColumnModified(TscheemiPeer::NUMCUE)) $criteria->add(TscheemiPeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(TscheemiPeer::CEDRIF)) $criteria->add(TscheemiPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(TscheemiPeer::FECEMI)) $criteria->add(TscheemiPeer::FECEMI, $this->fecemi);
		if ($this->isColumnModified(TscheemiPeer::MONCHE)) $criteria->add(TscheemiPeer::MONCHE, $this->monche);
		if ($this->isColumnModified(TscheemiPeer::STATUS)) $criteria->add(TscheemiPeer::STATUS, $this->status);
		if ($this->isColumnModified(TscheemiPeer::CODEMI)) $criteria->add(TscheemiPeer::CODEMI, $this->codemi);
		if ($this->isColumnModified(TscheemiPeer::FECENT)) $criteria->add(TscheemiPeer::FECENT, $this->fecent);
		if ($this->isColumnModified(TscheemiPeer::CODENT)) $criteria->add(TscheemiPeer::CODENT, $this->codent);
		if ($this->isColumnModified(TscheemiPeer::OBSENT)) $criteria->add(TscheemiPeer::OBSENT, $this->obsent);
		if ($this->isColumnModified(TscheemiPeer::FECANU)) $criteria->add(TscheemiPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(TscheemiPeer::CEDREC)) $criteria->add(TscheemiPeer::CEDREC, $this->cedrec);
		if ($this->isColumnModified(TscheemiPeer::NOMREC)) $criteria->add(TscheemiPeer::NOMREC, $this->nomrec);
		if ($this->isColumnModified(TscheemiPeer::TIPDOC)) $criteria->add(TscheemiPeer::TIPDOC, $this->tipdoc);
		if ($this->isColumnModified(TscheemiPeer::FECING)) $criteria->add(TscheemiPeer::FECING, $this->fecing);
		if ($this->isColumnModified(TscheemiPeer::TEMPORAL)) $criteria->add(TscheemiPeer::TEMPORAL, $this->temporal);
		if ($this->isColumnModified(TscheemiPeer::TEMPORAL2)) $criteria->add(TscheemiPeer::TEMPORAL2, $this->temporal2);
		if ($this->isColumnModified(TscheemiPeer::NOMBENSUS)) $criteria->add(TscheemiPeer::NOMBENSUS, $this->nombensus);
		if ($this->isColumnModified(TscheemiPeer::ANOPRE)) $criteria->add(TscheemiPeer::ANOPRE, $this->anopre);
		if ($this->isColumnModified(TscheemiPeer::NUMTIQ)) $criteria->add(TscheemiPeer::NUMTIQ, $this->numtiq);
		if ($this->isColumnModified(TscheemiPeer::CEDAUT)) $criteria->add(TscheemiPeer::CEDAUT, $this->cedaut);
		if ($this->isColumnModified(TscheemiPeer::PERAUT)) $criteria->add(TscheemiPeer::PERAUT, $this->peraut);
		if ($this->isColumnModified(TscheemiPeer::ID)) $criteria->add(TscheemiPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TscheemiPeer::DATABASE_NAME);

		$criteria->add(TscheemiPeer::ID, $this->id);

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

		$copyObj->setNumche($this->numche);

		$copyObj->setNumcue($this->numcue);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setFecemi($this->fecemi);

		$copyObj->setMonche($this->monche);

		$copyObj->setStatus($this->status);

		$copyObj->setCodemi($this->codemi);

		$copyObj->setFecent($this->fecent);

		$copyObj->setCodent($this->codent);

		$copyObj->setObsent($this->obsent);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setCedrec($this->cedrec);

		$copyObj->setNomrec($this->nomrec);

		$copyObj->setTipdoc($this->tipdoc);

		$copyObj->setFecing($this->fecing);

		$copyObj->setTemporal($this->temporal);

		$copyObj->setTemporal2($this->temporal2);

		$copyObj->setNombensus($this->nombensus);

		$copyObj->setAnopre($this->anopre);

		$copyObj->setNumtiq($this->numtiq);

		$copyObj->setCedaut($this->cedaut);

		$copyObj->setPeraut($this->peraut);


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
			self::$peer = new TscheemiPeer();
		}
		return self::$peer;
	}

} 