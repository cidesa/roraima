<?php


abstract class BaseFcconrep1 extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $cedcon;


	
	protected $rifcon;


	
	protected $nomcon;


	
	protected $repcon;


	
	protected $dircon;


	
	protected $telcon;


	
	protected $emacon;


	
	protected $codsec;


	
	protected $codpar;


	
	protected $nitcon;


	
	protected $codmun;


	
	protected $codedo;


	
	protected $codpai;


	
	protected $ciucon;


	
	protected $cpocon;


	
	protected $apocon;


	
	protected $urlcon;


	
	protected $naccon;


	
	protected $tipcon;


	
	protected $faxcon;


	
	protected $clacon;


	
	protected $fecdescon;


	
	protected $fecactcon;


	
	protected $stacon;


	
	protected $origen;


	
	protected $nomneg;


	
	protected $reccon;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCedcon()
	{

		return $this->cedcon;
	}

	
	public function getRifcon()
	{

		return $this->rifcon;
	}

	
	public function getNomcon()
	{

		return $this->nomcon;
	}

	
	public function getRepcon()
	{

		return $this->repcon;
	}

	
	public function getDircon()
	{

		return $this->dircon;
	}

	
	public function getTelcon()
	{

		return $this->telcon;
	}

	
	public function getEmacon()
	{

		return $this->emacon;
	}

	
	public function getCodsec()
	{

		return $this->codsec;
	}

	
	public function getCodpar()
	{

		return $this->codpar;
	}

	
	public function getNitcon()
	{

		return $this->nitcon;
	}

	
	public function getCodmun()
	{

		return $this->codmun;
	}

	
	public function getCodedo()
	{

		return $this->codedo;
	}

	
	public function getCodpai()
	{

		return $this->codpai;
	}

	
	public function getCiucon()
	{

		return $this->ciucon;
	}

	
	public function getCpocon()
	{

		return $this->cpocon;
	}

	
	public function getApocon()
	{

		return $this->apocon;
	}

	
	public function getUrlcon()
	{

		return $this->urlcon;
	}

	
	public function getNaccon()
	{

		return $this->naccon;
	}

	
	public function getTipcon()
	{

		return $this->tipcon;
	}

	
	public function getFaxcon()
	{

		return $this->faxcon;
	}

	
	public function getClacon()
	{

		return $this->clacon;
	}

	
	public function getFecdescon($format = 'Y-m-d')
	{

		if ($this->fecdescon === null || $this->fecdescon === '') {
			return null;
		} elseif (!is_int($this->fecdescon)) {
						$ts = strtotime($this->fecdescon);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecdescon] as date/time value: " . var_export($this->fecdescon, true));
			}
		} else {
			$ts = $this->fecdescon;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecactcon($format = 'Y-m-d')
	{

		if ($this->fecactcon === null || $this->fecactcon === '') {
			return null;
		} elseif (!is_int($this->fecactcon)) {
						$ts = strtotime($this->fecactcon);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecactcon] as date/time value: " . var_export($this->fecactcon, true));
			}
		} else {
			$ts = $this->fecactcon;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getStacon()
	{

		return $this->stacon;
	}

	
	public function getOrigen()
	{

		return $this->origen;
	}

	
	public function getNomneg()
	{

		return $this->nomneg;
	}

	
	public function getReccon()
	{

		return $this->reccon;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCedcon($v)
	{

		if ($this->cedcon !== $v) {
			$this->cedcon = $v;
			$this->modifiedColumns[] = Fcconrep1Peer::CEDCON;
		}

	} 
	
	public function setRifcon($v)
	{

		if ($this->rifcon !== $v) {
			$this->rifcon = $v;
			$this->modifiedColumns[] = Fcconrep1Peer::RIFCON;
		}

	} 
	
	public function setNomcon($v)
	{

		if ($this->nomcon !== $v) {
			$this->nomcon = $v;
			$this->modifiedColumns[] = Fcconrep1Peer::NOMCON;
		}

	} 
	
	public function setRepcon($v)
	{

		if ($this->repcon !== $v) {
			$this->repcon = $v;
			$this->modifiedColumns[] = Fcconrep1Peer::REPCON;
		}

	} 
	
	public function setDircon($v)
	{

		if ($this->dircon !== $v) {
			$this->dircon = $v;
			$this->modifiedColumns[] = Fcconrep1Peer::DIRCON;
		}

	} 
	
	public function setTelcon($v)
	{

		if ($this->telcon !== $v) {
			$this->telcon = $v;
			$this->modifiedColumns[] = Fcconrep1Peer::TELCON;
		}

	} 
	
	public function setEmacon($v)
	{

		if ($this->emacon !== $v) {
			$this->emacon = $v;
			$this->modifiedColumns[] = Fcconrep1Peer::EMACON;
		}

	} 
	
	public function setCodsec($v)
	{

		if ($this->codsec !== $v) {
			$this->codsec = $v;
			$this->modifiedColumns[] = Fcconrep1Peer::CODSEC;
		}

	} 
	
	public function setCodpar($v)
	{

		if ($this->codpar !== $v) {
			$this->codpar = $v;
			$this->modifiedColumns[] = Fcconrep1Peer::CODPAR;
		}

	} 
	
	public function setNitcon($v)
	{

		if ($this->nitcon !== $v) {
			$this->nitcon = $v;
			$this->modifiedColumns[] = Fcconrep1Peer::NITCON;
		}

	} 
	
	public function setCodmun($v)
	{

		if ($this->codmun !== $v) {
			$this->codmun = $v;
			$this->modifiedColumns[] = Fcconrep1Peer::CODMUN;
		}

	} 
	
	public function setCodedo($v)
	{

		if ($this->codedo !== $v) {
			$this->codedo = $v;
			$this->modifiedColumns[] = Fcconrep1Peer::CODEDO;
		}

	} 
	
	public function setCodpai($v)
	{

		if ($this->codpai !== $v) {
			$this->codpai = $v;
			$this->modifiedColumns[] = Fcconrep1Peer::CODPAI;
		}

	} 
	
	public function setCiucon($v)
	{

		if ($this->ciucon !== $v) {
			$this->ciucon = $v;
			$this->modifiedColumns[] = Fcconrep1Peer::CIUCON;
		}

	} 
	
	public function setCpocon($v)
	{

		if ($this->cpocon !== $v) {
			$this->cpocon = $v;
			$this->modifiedColumns[] = Fcconrep1Peer::CPOCON;
		}

	} 
	
	public function setApocon($v)
	{

		if ($this->apocon !== $v) {
			$this->apocon = $v;
			$this->modifiedColumns[] = Fcconrep1Peer::APOCON;
		}

	} 
	
	public function setUrlcon($v)
	{

		if ($this->urlcon !== $v) {
			$this->urlcon = $v;
			$this->modifiedColumns[] = Fcconrep1Peer::URLCON;
		}

	} 
	
	public function setNaccon($v)
	{

		if ($this->naccon !== $v) {
			$this->naccon = $v;
			$this->modifiedColumns[] = Fcconrep1Peer::NACCON;
		}

	} 
	
	public function setTipcon($v)
	{

		if ($this->tipcon !== $v) {
			$this->tipcon = $v;
			$this->modifiedColumns[] = Fcconrep1Peer::TIPCON;
		}

	} 
	
	public function setFaxcon($v)
	{

		if ($this->faxcon !== $v) {
			$this->faxcon = $v;
			$this->modifiedColumns[] = Fcconrep1Peer::FAXCON;
		}

	} 
	
	public function setClacon($v)
	{

		if ($this->clacon !== $v) {
			$this->clacon = $v;
			$this->modifiedColumns[] = Fcconrep1Peer::CLACON;
		}

	} 
	
	public function setFecdescon($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecdescon] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecdescon !== $ts) {
			$this->fecdescon = $ts;
			$this->modifiedColumns[] = Fcconrep1Peer::FECDESCON;
		}

	} 
	
	public function setFecactcon($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecactcon] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecactcon !== $ts) {
			$this->fecactcon = $ts;
			$this->modifiedColumns[] = Fcconrep1Peer::FECACTCON;
		}

	} 
	
	public function setStacon($v)
	{

		if ($this->stacon !== $v) {
			$this->stacon = $v;
			$this->modifiedColumns[] = Fcconrep1Peer::STACON;
		}

	} 
	
	public function setOrigen($v)
	{

		if ($this->origen !== $v) {
			$this->origen = $v;
			$this->modifiedColumns[] = Fcconrep1Peer::ORIGEN;
		}

	} 
	
	public function setNomneg($v)
	{

		if ($this->nomneg !== $v) {
			$this->nomneg = $v;
			$this->modifiedColumns[] = Fcconrep1Peer::NOMNEG;
		}

	} 
	
	public function setReccon($v)
	{

		if ($this->reccon !== $v) {
			$this->reccon = $v;
			$this->modifiedColumns[] = Fcconrep1Peer::RECCON;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = Fcconrep1Peer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->cedcon = $rs->getString($startcol + 0);

			$this->rifcon = $rs->getString($startcol + 1);

			$this->nomcon = $rs->getString($startcol + 2);

			$this->repcon = $rs->getString($startcol + 3);

			$this->dircon = $rs->getString($startcol + 4);

			$this->telcon = $rs->getString($startcol + 5);

			$this->emacon = $rs->getString($startcol + 6);

			$this->codsec = $rs->getString($startcol + 7);

			$this->codpar = $rs->getString($startcol + 8);

			$this->nitcon = $rs->getString($startcol + 9);

			$this->codmun = $rs->getString($startcol + 10);

			$this->codedo = $rs->getString($startcol + 11);

			$this->codpai = $rs->getString($startcol + 12);

			$this->ciucon = $rs->getString($startcol + 13);

			$this->cpocon = $rs->getString($startcol + 14);

			$this->apocon = $rs->getString($startcol + 15);

			$this->urlcon = $rs->getString($startcol + 16);

			$this->naccon = $rs->getString($startcol + 17);

			$this->tipcon = $rs->getString($startcol + 18);

			$this->faxcon = $rs->getString($startcol + 19);

			$this->clacon = $rs->getString($startcol + 20);

			$this->fecdescon = $rs->getDate($startcol + 21, null);

			$this->fecactcon = $rs->getDate($startcol + 22, null);

			$this->stacon = $rs->getString($startcol + 23);

			$this->origen = $rs->getString($startcol + 24);

			$this->nomneg = $rs->getString($startcol + 25);

			$this->reccon = $rs->getString($startcol + 26);

			$this->id = $rs->getInt($startcol + 27);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 28; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcconrep1 object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(Fcconrep1Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			Fcconrep1Peer::doDelete($this, $con);
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
			$con = Propel::getConnection(Fcconrep1Peer::DATABASE_NAME);
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
					$pk = Fcconrep1Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += Fcconrep1Peer::doUpdate($this, $con);
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


			if (($retval = Fcconrep1Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Fcconrep1Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCedcon();
				break;
			case 1:
				return $this->getRifcon();
				break;
			case 2:
				return $this->getNomcon();
				break;
			case 3:
				return $this->getRepcon();
				break;
			case 4:
				return $this->getDircon();
				break;
			case 5:
				return $this->getTelcon();
				break;
			case 6:
				return $this->getEmacon();
				break;
			case 7:
				return $this->getCodsec();
				break;
			case 8:
				return $this->getCodpar();
				break;
			case 9:
				return $this->getNitcon();
				break;
			case 10:
				return $this->getCodmun();
				break;
			case 11:
				return $this->getCodedo();
				break;
			case 12:
				return $this->getCodpai();
				break;
			case 13:
				return $this->getCiucon();
				break;
			case 14:
				return $this->getCpocon();
				break;
			case 15:
				return $this->getApocon();
				break;
			case 16:
				return $this->getUrlcon();
				break;
			case 17:
				return $this->getNaccon();
				break;
			case 18:
				return $this->getTipcon();
				break;
			case 19:
				return $this->getFaxcon();
				break;
			case 20:
				return $this->getClacon();
				break;
			case 21:
				return $this->getFecdescon();
				break;
			case 22:
				return $this->getFecactcon();
				break;
			case 23:
				return $this->getStacon();
				break;
			case 24:
				return $this->getOrigen();
				break;
			case 25:
				return $this->getNomneg();
				break;
			case 26:
				return $this->getReccon();
				break;
			case 27:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Fcconrep1Peer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCedcon(),
			$keys[1] => $this->getRifcon(),
			$keys[2] => $this->getNomcon(),
			$keys[3] => $this->getRepcon(),
			$keys[4] => $this->getDircon(),
			$keys[5] => $this->getTelcon(),
			$keys[6] => $this->getEmacon(),
			$keys[7] => $this->getCodsec(),
			$keys[8] => $this->getCodpar(),
			$keys[9] => $this->getNitcon(),
			$keys[10] => $this->getCodmun(),
			$keys[11] => $this->getCodedo(),
			$keys[12] => $this->getCodpai(),
			$keys[13] => $this->getCiucon(),
			$keys[14] => $this->getCpocon(),
			$keys[15] => $this->getApocon(),
			$keys[16] => $this->getUrlcon(),
			$keys[17] => $this->getNaccon(),
			$keys[18] => $this->getTipcon(),
			$keys[19] => $this->getFaxcon(),
			$keys[20] => $this->getClacon(),
			$keys[21] => $this->getFecdescon(),
			$keys[22] => $this->getFecactcon(),
			$keys[23] => $this->getStacon(),
			$keys[24] => $this->getOrigen(),
			$keys[25] => $this->getNomneg(),
			$keys[26] => $this->getReccon(),
			$keys[27] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Fcconrep1Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCedcon($value);
				break;
			case 1:
				$this->setRifcon($value);
				break;
			case 2:
				$this->setNomcon($value);
				break;
			case 3:
				$this->setRepcon($value);
				break;
			case 4:
				$this->setDircon($value);
				break;
			case 5:
				$this->setTelcon($value);
				break;
			case 6:
				$this->setEmacon($value);
				break;
			case 7:
				$this->setCodsec($value);
				break;
			case 8:
				$this->setCodpar($value);
				break;
			case 9:
				$this->setNitcon($value);
				break;
			case 10:
				$this->setCodmun($value);
				break;
			case 11:
				$this->setCodedo($value);
				break;
			case 12:
				$this->setCodpai($value);
				break;
			case 13:
				$this->setCiucon($value);
				break;
			case 14:
				$this->setCpocon($value);
				break;
			case 15:
				$this->setApocon($value);
				break;
			case 16:
				$this->setUrlcon($value);
				break;
			case 17:
				$this->setNaccon($value);
				break;
			case 18:
				$this->setTipcon($value);
				break;
			case 19:
				$this->setFaxcon($value);
				break;
			case 20:
				$this->setClacon($value);
				break;
			case 21:
				$this->setFecdescon($value);
				break;
			case 22:
				$this->setFecactcon($value);
				break;
			case 23:
				$this->setStacon($value);
				break;
			case 24:
				$this->setOrigen($value);
				break;
			case 25:
				$this->setNomneg($value);
				break;
			case 26:
				$this->setReccon($value);
				break;
			case 27:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Fcconrep1Peer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCedcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRifcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomcon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRepcon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDircon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTelcon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setEmacon($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodsec($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodpar($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNitcon($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodmun($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCodedo($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCodpai($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCiucon($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCpocon($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setApocon($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setUrlcon($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setNaccon($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setTipcon($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setFaxcon($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setClacon($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setFecdescon($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setFecactcon($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setStacon($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setOrigen($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setNomneg($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setReccon($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setId($arr[$keys[27]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(Fcconrep1Peer::DATABASE_NAME);

		if ($this->isColumnModified(Fcconrep1Peer::CEDCON)) $criteria->add(Fcconrep1Peer::CEDCON, $this->cedcon);
		if ($this->isColumnModified(Fcconrep1Peer::RIFCON)) $criteria->add(Fcconrep1Peer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(Fcconrep1Peer::NOMCON)) $criteria->add(Fcconrep1Peer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(Fcconrep1Peer::REPCON)) $criteria->add(Fcconrep1Peer::REPCON, $this->repcon);
		if ($this->isColumnModified(Fcconrep1Peer::DIRCON)) $criteria->add(Fcconrep1Peer::DIRCON, $this->dircon);
		if ($this->isColumnModified(Fcconrep1Peer::TELCON)) $criteria->add(Fcconrep1Peer::TELCON, $this->telcon);
		if ($this->isColumnModified(Fcconrep1Peer::EMACON)) $criteria->add(Fcconrep1Peer::EMACON, $this->emacon);
		if ($this->isColumnModified(Fcconrep1Peer::CODSEC)) $criteria->add(Fcconrep1Peer::CODSEC, $this->codsec);
		if ($this->isColumnModified(Fcconrep1Peer::CODPAR)) $criteria->add(Fcconrep1Peer::CODPAR, $this->codpar);
		if ($this->isColumnModified(Fcconrep1Peer::NITCON)) $criteria->add(Fcconrep1Peer::NITCON, $this->nitcon);
		if ($this->isColumnModified(Fcconrep1Peer::CODMUN)) $criteria->add(Fcconrep1Peer::CODMUN, $this->codmun);
		if ($this->isColumnModified(Fcconrep1Peer::CODEDO)) $criteria->add(Fcconrep1Peer::CODEDO, $this->codedo);
		if ($this->isColumnModified(Fcconrep1Peer::CODPAI)) $criteria->add(Fcconrep1Peer::CODPAI, $this->codpai);
		if ($this->isColumnModified(Fcconrep1Peer::CIUCON)) $criteria->add(Fcconrep1Peer::CIUCON, $this->ciucon);
		if ($this->isColumnModified(Fcconrep1Peer::CPOCON)) $criteria->add(Fcconrep1Peer::CPOCON, $this->cpocon);
		if ($this->isColumnModified(Fcconrep1Peer::APOCON)) $criteria->add(Fcconrep1Peer::APOCON, $this->apocon);
		if ($this->isColumnModified(Fcconrep1Peer::URLCON)) $criteria->add(Fcconrep1Peer::URLCON, $this->urlcon);
		if ($this->isColumnModified(Fcconrep1Peer::NACCON)) $criteria->add(Fcconrep1Peer::NACCON, $this->naccon);
		if ($this->isColumnModified(Fcconrep1Peer::TIPCON)) $criteria->add(Fcconrep1Peer::TIPCON, $this->tipcon);
		if ($this->isColumnModified(Fcconrep1Peer::FAXCON)) $criteria->add(Fcconrep1Peer::FAXCON, $this->faxcon);
		if ($this->isColumnModified(Fcconrep1Peer::CLACON)) $criteria->add(Fcconrep1Peer::CLACON, $this->clacon);
		if ($this->isColumnModified(Fcconrep1Peer::FECDESCON)) $criteria->add(Fcconrep1Peer::FECDESCON, $this->fecdescon);
		if ($this->isColumnModified(Fcconrep1Peer::FECACTCON)) $criteria->add(Fcconrep1Peer::FECACTCON, $this->fecactcon);
		if ($this->isColumnModified(Fcconrep1Peer::STACON)) $criteria->add(Fcconrep1Peer::STACON, $this->stacon);
		if ($this->isColumnModified(Fcconrep1Peer::ORIGEN)) $criteria->add(Fcconrep1Peer::ORIGEN, $this->origen);
		if ($this->isColumnModified(Fcconrep1Peer::NOMNEG)) $criteria->add(Fcconrep1Peer::NOMNEG, $this->nomneg);
		if ($this->isColumnModified(Fcconrep1Peer::RECCON)) $criteria->add(Fcconrep1Peer::RECCON, $this->reccon);
		if ($this->isColumnModified(Fcconrep1Peer::ID)) $criteria->add(Fcconrep1Peer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Fcconrep1Peer::DATABASE_NAME);

		$criteria->add(Fcconrep1Peer::ID, $this->id);

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

		$copyObj->setCedcon($this->cedcon);

		$copyObj->setRifcon($this->rifcon);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setRepcon($this->repcon);

		$copyObj->setDircon($this->dircon);

		$copyObj->setTelcon($this->telcon);

		$copyObj->setEmacon($this->emacon);

		$copyObj->setCodsec($this->codsec);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setNitcon($this->nitcon);

		$copyObj->setCodmun($this->codmun);

		$copyObj->setCodedo($this->codedo);

		$copyObj->setCodpai($this->codpai);

		$copyObj->setCiucon($this->ciucon);

		$copyObj->setCpocon($this->cpocon);

		$copyObj->setApocon($this->apocon);

		$copyObj->setUrlcon($this->urlcon);

		$copyObj->setNaccon($this->naccon);

		$copyObj->setTipcon($this->tipcon);

		$copyObj->setFaxcon($this->faxcon);

		$copyObj->setClacon($this->clacon);

		$copyObj->setFecdescon($this->fecdescon);

		$copyObj->setFecactcon($this->fecactcon);

		$copyObj->setStacon($this->stacon);

		$copyObj->setOrigen($this->origen);

		$copyObj->setNomneg($this->nomneg);

		$copyObj->setReccon($this->reccon);


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
			self::$peer = new Fcconrep1Peer();
		}
		return self::$peer;
	}

} 