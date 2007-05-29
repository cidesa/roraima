<?php


abstract class BaseFordetpryaccespmet extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpro;


	
	protected $codaccesp;


	
	protected $codmet;


	
	protected $codunieje;


	
	protected $codpar;


	
	protected $codpre;


	
	protected $disper;


	
	protected $monpre;


	
	protected $codfin;


	
	protected $fecini;


	
	protected $feccul;


	
	protected $ubigeo;


	
	protected $pobapx;


	
	protected $observ;


	
	protected $codact;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodpro()
	{

		return $this->codpro; 		
	}
	
	public function getCodaccesp()
	{

		return $this->codaccesp; 		
	}
	
	public function getCodmet()
	{

		return $this->codmet; 		
	}
	
	public function getCodunieje()
	{

		return $this->codunieje; 		
	}
	
	public function getCodpar()
	{

		return $this->codpar; 		
	}
	
	public function getCodpre()
	{

		return $this->codpre; 		
	}
	
	public function getDisper()
	{

		return $this->disper; 		
	}
	
	public function getMonpre()
	{

		return number_format($this->monpre,2,',','.');
		
	}
	
	public function getCodfin()
	{

		return $this->codfin; 		
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

	
	public function getFeccul($format = 'Y-m-d')
	{

		if ($this->feccul === null || $this->feccul === '') {
			return null;
		} elseif (!is_int($this->feccul)) {
						$ts = strtotime($this->feccul);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [feccul] as date/time value: " . var_export($this->feccul, true));
			}
		} else {
			$ts = $this->feccul;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getUbigeo()
	{

		return $this->ubigeo; 		
	}
	
	public function getPobapx()
	{

		return $this->pobapx; 		
	}
	
	public function getObserv()
	{

		return $this->observ; 		
	}
	
	public function getCodact()
	{

		return $this->codact; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodpro($v)
	{

		if ($this->codpro !== $v) {
			$this->codpro = $v;
			$this->modifiedColumns[] = FordetpryaccespmetPeer::CODPRO;
		}

	} 
	
	public function setCodaccesp($v)
	{

		if ($this->codaccesp !== $v) {
			$this->codaccesp = $v;
			$this->modifiedColumns[] = FordetpryaccespmetPeer::CODACCESP;
		}

	} 
	
	public function setCodmet($v)
	{

		if ($this->codmet !== $v) {
			$this->codmet = $v;
			$this->modifiedColumns[] = FordetpryaccespmetPeer::CODMET;
		}

	} 
	
	public function setCodunieje($v)
	{

		if ($this->codunieje !== $v) {
			$this->codunieje = $v;
			$this->modifiedColumns[] = FordetpryaccespmetPeer::CODUNIEJE;
		}

	} 
	
	public function setCodpar($v)
	{

		if ($this->codpar !== $v) {
			$this->codpar = $v;
			$this->modifiedColumns[] = FordetpryaccespmetPeer::CODPAR;
		}

	} 
	
	public function setCodpre($v)
	{

		if ($this->codpre !== $v) {
			$this->codpre = $v;
			$this->modifiedColumns[] = FordetpryaccespmetPeer::CODPRE;
		}

	} 
	
	public function setDisper($v)
	{

		if ($this->disper !== $v) {
			$this->disper = $v;
			$this->modifiedColumns[] = FordetpryaccespmetPeer::DISPER;
		}

	} 
	
	public function setMonpre($v)
	{

		if ($this->monpre !== $v) {
			$this->monpre = $v;
			$this->modifiedColumns[] = FordetpryaccespmetPeer::MONPRE;
		}

	} 
	
	public function setCodfin($v)
	{

		if ($this->codfin !== $v) {
			$this->codfin = $v;
			$this->modifiedColumns[] = FordetpryaccespmetPeer::CODFIN;
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
			$this->modifiedColumns[] = FordetpryaccespmetPeer::FECINI;
		}

	} 
	
	public function setFeccul($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [feccul] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->feccul !== $ts) {
			$this->feccul = $ts;
			$this->modifiedColumns[] = FordetpryaccespmetPeer::FECCUL;
		}

	} 
	
	public function setUbigeo($v)
	{

		if ($this->ubigeo !== $v) {
			$this->ubigeo = $v;
			$this->modifiedColumns[] = FordetpryaccespmetPeer::UBIGEO;
		}

	} 
	
	public function setPobapx($v)
	{

		if ($this->pobapx !== $v) {
			$this->pobapx = $v;
			$this->modifiedColumns[] = FordetpryaccespmetPeer::POBAPX;
		}

	} 
	
	public function setObserv($v)
	{

		if ($this->observ !== $v) {
			$this->observ = $v;
			$this->modifiedColumns[] = FordetpryaccespmetPeer::OBSERV;
		}

	} 
	
	public function setCodact($v)
	{

		if ($this->codact !== $v) {
			$this->codact = $v;
			$this->modifiedColumns[] = FordetpryaccespmetPeer::CODACT;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FordetpryaccespmetPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codpro = $rs->getString($startcol + 0);

			$this->codaccesp = $rs->getString($startcol + 1);

			$this->codmet = $rs->getString($startcol + 2);

			$this->codunieje = $rs->getString($startcol + 3);

			$this->codpar = $rs->getString($startcol + 4);

			$this->codpre = $rs->getString($startcol + 5);

			$this->disper = $rs->getString($startcol + 6);

			$this->monpre = $rs->getFloat($startcol + 7);

			$this->codfin = $rs->getString($startcol + 8);

			$this->fecini = $rs->getDate($startcol + 9, null);

			$this->feccul = $rs->getDate($startcol + 10, null);

			$this->ubigeo = $rs->getString($startcol + 11);

			$this->pobapx = $rs->getString($startcol + 12);

			$this->observ = $rs->getString($startcol + 13);

			$this->codact = $rs->getString($startcol + 14);

			$this->id = $rs->getInt($startcol + 15);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 16; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fordetpryaccespmet object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FordetpryaccespmetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FordetpryaccespmetPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FordetpryaccespmetPeer::DATABASE_NAME);
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
					$pk = FordetpryaccespmetPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FordetpryaccespmetPeer::doUpdate($this, $con);
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


			if (($retval = FordetpryaccespmetPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordetpryaccespmetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpro();
				break;
			case 1:
				return $this->getCodaccesp();
				break;
			case 2:
				return $this->getCodmet();
				break;
			case 3:
				return $this->getCodunieje();
				break;
			case 4:
				return $this->getCodpar();
				break;
			case 5:
				return $this->getCodpre();
				break;
			case 6:
				return $this->getDisper();
				break;
			case 7:
				return $this->getMonpre();
				break;
			case 8:
				return $this->getCodfin();
				break;
			case 9:
				return $this->getFecini();
				break;
			case 10:
				return $this->getFeccul();
				break;
			case 11:
				return $this->getUbigeo();
				break;
			case 12:
				return $this->getPobapx();
				break;
			case 13:
				return $this->getObserv();
				break;
			case 14:
				return $this->getCodact();
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
		$keys = FordetpryaccespmetPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpro(),
			$keys[1] => $this->getCodaccesp(),
			$keys[2] => $this->getCodmet(),
			$keys[3] => $this->getCodunieje(),
			$keys[4] => $this->getCodpar(),
			$keys[5] => $this->getCodpre(),
			$keys[6] => $this->getDisper(),
			$keys[7] => $this->getMonpre(),
			$keys[8] => $this->getCodfin(),
			$keys[9] => $this->getFecini(),
			$keys[10] => $this->getFeccul(),
			$keys[11] => $this->getUbigeo(),
			$keys[12] => $this->getPobapx(),
			$keys[13] => $this->getObserv(),
			$keys[14] => $this->getCodact(),
			$keys[15] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordetpryaccespmetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpro($value);
				break;
			case 1:
				$this->setCodaccesp($value);
				break;
			case 2:
				$this->setCodmet($value);
				break;
			case 3:
				$this->setCodunieje($value);
				break;
			case 4:
				$this->setCodpar($value);
				break;
			case 5:
				$this->setCodpre($value);
				break;
			case 6:
				$this->setDisper($value);
				break;
			case 7:
				$this->setMonpre($value);
				break;
			case 8:
				$this->setCodfin($value);
				break;
			case 9:
				$this->setFecini($value);
				break;
			case 10:
				$this->setFeccul($value);
				break;
			case 11:
				$this->setUbigeo($value);
				break;
			case 12:
				$this->setPobapx($value);
				break;
			case 13:
				$this->setObserv($value);
				break;
			case 14:
				$this->setCodact($value);
				break;
			case 15:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordetpryaccespmetPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpro($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodaccesp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodmet($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodunieje($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodpar($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodpre($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDisper($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMonpre($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodfin($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecini($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFeccul($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUbigeo($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setPobapx($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setObserv($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCodact($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setId($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FordetpryaccespmetPeer::DATABASE_NAME);

		if ($this->isColumnModified(FordetpryaccespmetPeer::CODPRO)) $criteria->add(FordetpryaccespmetPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(FordetpryaccespmetPeer::CODACCESP)) $criteria->add(FordetpryaccespmetPeer::CODACCESP, $this->codaccesp);
		if ($this->isColumnModified(FordetpryaccespmetPeer::CODMET)) $criteria->add(FordetpryaccespmetPeer::CODMET, $this->codmet);
		if ($this->isColumnModified(FordetpryaccespmetPeer::CODUNIEJE)) $criteria->add(FordetpryaccespmetPeer::CODUNIEJE, $this->codunieje);
		if ($this->isColumnModified(FordetpryaccespmetPeer::CODPAR)) $criteria->add(FordetpryaccespmetPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(FordetpryaccespmetPeer::CODPRE)) $criteria->add(FordetpryaccespmetPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(FordetpryaccespmetPeer::DISPER)) $criteria->add(FordetpryaccespmetPeer::DISPER, $this->disper);
		if ($this->isColumnModified(FordetpryaccespmetPeer::MONPRE)) $criteria->add(FordetpryaccespmetPeer::MONPRE, $this->monpre);
		if ($this->isColumnModified(FordetpryaccespmetPeer::CODFIN)) $criteria->add(FordetpryaccespmetPeer::CODFIN, $this->codfin);
		if ($this->isColumnModified(FordetpryaccespmetPeer::FECINI)) $criteria->add(FordetpryaccespmetPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(FordetpryaccespmetPeer::FECCUL)) $criteria->add(FordetpryaccespmetPeer::FECCUL, $this->feccul);
		if ($this->isColumnModified(FordetpryaccespmetPeer::UBIGEO)) $criteria->add(FordetpryaccespmetPeer::UBIGEO, $this->ubigeo);
		if ($this->isColumnModified(FordetpryaccespmetPeer::POBAPX)) $criteria->add(FordetpryaccespmetPeer::POBAPX, $this->pobapx);
		if ($this->isColumnModified(FordetpryaccespmetPeer::OBSERV)) $criteria->add(FordetpryaccespmetPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(FordetpryaccespmetPeer::CODACT)) $criteria->add(FordetpryaccespmetPeer::CODACT, $this->codact);
		if ($this->isColumnModified(FordetpryaccespmetPeer::ID)) $criteria->add(FordetpryaccespmetPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FordetpryaccespmetPeer::DATABASE_NAME);

		$criteria->add(FordetpryaccespmetPeer::ID, $this->id);

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

		$copyObj->setCodpro($this->codpro);

		$copyObj->setCodaccesp($this->codaccesp);

		$copyObj->setCodmet($this->codmet);

		$copyObj->setCodunieje($this->codunieje);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setDisper($this->disper);

		$copyObj->setMonpre($this->monpre);

		$copyObj->setCodfin($this->codfin);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFeccul($this->feccul);

		$copyObj->setUbigeo($this->ubigeo);

		$copyObj->setPobapx($this->pobapx);

		$copyObj->setObserv($this->observ);

		$copyObj->setCodact($this->codact);


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
			self::$peer = new FordetpryaccespmetPeer();
		}
		return self::$peer;
	}

} 