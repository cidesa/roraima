<?php


abstract class BaseNpordpag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numord;


	
	protected $tipcau;


	
	protected $refcau;


	
	protected $tipprc;


	
	protected $refprc;


	
	protected $tipcom;


	
	protected $refcom;


	
	protected $codpre;


	
	protected $fecemi;


	
	protected $numrif;


	
	protected $codemp;


	
	protected $monpag;


	
	protected $monaju;


	
	protected $conpag;


	
	protected $caupag;


	
	protected $status;


	
	protected $codcue;


	
	protected $codban;


	
	protected $numche;


	
	protected $nomdes;


	
	protected $codcuedes;


	
	protected $despag;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNumord()
	{

		return $this->numord;
	}

	
	public function getTipcau()
	{

		return $this->tipcau;
	}

	
	public function getRefcau()
	{

		return $this->refcau;
	}

	
	public function getTipprc()
	{

		return $this->tipprc;
	}

	
	public function getRefprc()
	{

		return $this->refprc;
	}

	
	public function getTipcom()
	{

		return $this->tipcom;
	}

	
	public function getRefcom()
	{

		return $this->refcom;
	}

	
	public function getCodpre()
	{

		return $this->codpre;
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

	
	public function getNumrif()
	{

		return $this->numrif;
	}

	
	public function getCodemp()
	{

		return $this->codemp;
	}

	
	public function getMonpag()
	{

		return $this->monpag;
	}

	
	public function getMonaju()
	{

		return $this->monaju;
	}

	
	public function getConpag()
	{

		return $this->conpag;
	}

	
	public function getCaupag()
	{

		return $this->caupag;
	}

	
	public function getStatus()
	{

		return $this->status;
	}

	
	public function getCodcue()
	{

		return $this->codcue;
	}

	
	public function getCodban()
	{

		return $this->codban;
	}

	
	public function getNumche()
	{

		return $this->numche;
	}

	
	public function getNomdes()
	{

		return $this->nomdes;
	}

	
	public function getCodcuedes()
	{

		return $this->codcuedes;
	}

	
	public function getDespag()
	{

		return $this->despag;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setNumord($v)
	{

		if ($this->numord !== $v) {
			$this->numord = $v;
			$this->modifiedColumns[] = NpordpagPeer::NUMORD;
		}

	} 
	
	public function setTipcau($v)
	{

		if ($this->tipcau !== $v) {
			$this->tipcau = $v;
			$this->modifiedColumns[] = NpordpagPeer::TIPCAU;
		}

	} 
	
	public function setRefcau($v)
	{

		if ($this->refcau !== $v) {
			$this->refcau = $v;
			$this->modifiedColumns[] = NpordpagPeer::REFCAU;
		}

	} 
	
	public function setTipprc($v)
	{

		if ($this->tipprc !== $v) {
			$this->tipprc = $v;
			$this->modifiedColumns[] = NpordpagPeer::TIPPRC;
		}

	} 
	
	public function setRefprc($v)
	{

		if ($this->refprc !== $v) {
			$this->refprc = $v;
			$this->modifiedColumns[] = NpordpagPeer::REFPRC;
		}

	} 
	
	public function setTipcom($v)
	{

		if ($this->tipcom !== $v) {
			$this->tipcom = $v;
			$this->modifiedColumns[] = NpordpagPeer::TIPCOM;
		}

	} 
	
	public function setRefcom($v)
	{

		if ($this->refcom !== $v) {
			$this->refcom = $v;
			$this->modifiedColumns[] = NpordpagPeer::REFCOM;
		}

	} 
	
	public function setCodpre($v)
	{

		if ($this->codpre !== $v) {
			$this->codpre = $v;
			$this->modifiedColumns[] = NpordpagPeer::CODPRE;
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
			$this->modifiedColumns[] = NpordpagPeer::FECEMI;
		}

	} 
	
	public function setNumrif($v)
	{

		if ($this->numrif !== $v) {
			$this->numrif = $v;
			$this->modifiedColumns[] = NpordpagPeer::NUMRIF;
		}

	} 
	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = NpordpagPeer::CODEMP;
		}

	} 
	
	public function setMonpag($v)
	{

		if ($this->monpag !== $v) {
			$this->monpag = $v;
			$this->modifiedColumns[] = NpordpagPeer::MONPAG;
		}

	} 
	
	public function setMonaju($v)
	{

		if ($this->monaju !== $v) {
			$this->monaju = $v;
			$this->modifiedColumns[] = NpordpagPeer::MONAJU;
		}

	} 
	
	public function setConpag($v)
	{

		if ($this->conpag !== $v) {
			$this->conpag = $v;
			$this->modifiedColumns[] = NpordpagPeer::CONPAG;
		}

	} 
	
	public function setCaupag($v)
	{

		if ($this->caupag !== $v) {
			$this->caupag = $v;
			$this->modifiedColumns[] = NpordpagPeer::CAUPAG;
		}

	} 
	
	public function setStatus($v)
	{

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = NpordpagPeer::STATUS;
		}

	} 
	
	public function setCodcue($v)
	{

		if ($this->codcue !== $v) {
			$this->codcue = $v;
			$this->modifiedColumns[] = NpordpagPeer::CODCUE;
		}

	} 
	
	public function setCodban($v)
	{

		if ($this->codban !== $v) {
			$this->codban = $v;
			$this->modifiedColumns[] = NpordpagPeer::CODBAN;
		}

	} 
	
	public function setNumche($v)
	{

		if ($this->numche !== $v) {
			$this->numche = $v;
			$this->modifiedColumns[] = NpordpagPeer::NUMCHE;
		}

	} 
	
	public function setNomdes($v)
	{

		if ($this->nomdes !== $v) {
			$this->nomdes = $v;
			$this->modifiedColumns[] = NpordpagPeer::NOMDES;
		}

	} 
	
	public function setCodcuedes($v)
	{

		if ($this->codcuedes !== $v) {
			$this->codcuedes = $v;
			$this->modifiedColumns[] = NpordpagPeer::CODCUEDES;
		}

	} 
	
	public function setDespag($v)
	{

		if ($this->despag !== $v) {
			$this->despag = $v;
			$this->modifiedColumns[] = NpordpagPeer::DESPAG;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpordpagPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->numord = $rs->getFloat($startcol + 0);

			$this->tipcau = $rs->getString($startcol + 1);

			$this->refcau = $rs->getString($startcol + 2);

			$this->tipprc = $rs->getString($startcol + 3);

			$this->refprc = $rs->getString($startcol + 4);

			$this->tipcom = $rs->getString($startcol + 5);

			$this->refcom = $rs->getString($startcol + 6);

			$this->codpre = $rs->getString($startcol + 7);

			$this->fecemi = $rs->getDate($startcol + 8, null);

			$this->numrif = $rs->getString($startcol + 9);

			$this->codemp = $rs->getString($startcol + 10);

			$this->monpag = $rs->getFloat($startcol + 11);

			$this->monaju = $rs->getFloat($startcol + 12);

			$this->conpag = $rs->getString($startcol + 13);

			$this->caupag = $rs->getFloat($startcol + 14);

			$this->status = $rs->getString($startcol + 15);

			$this->codcue = $rs->getString($startcol + 16);

			$this->codban = $rs->getString($startcol + 17);

			$this->numche = $rs->getString($startcol + 18);

			$this->nomdes = $rs->getString($startcol + 19);

			$this->codcuedes = $rs->getString($startcol + 20);

			$this->despag = $rs->getFloat($startcol + 21);

			$this->id = $rs->getInt($startcol + 22);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 23; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npordpag object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpordpagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpordpagPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpordpagPeer::DATABASE_NAME);
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
					$pk = NpordpagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpordpagPeer::doUpdate($this, $con);
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


			if (($retval = NpordpagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpordpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumord();
				break;
			case 1:
				return $this->getTipcau();
				break;
			case 2:
				return $this->getRefcau();
				break;
			case 3:
				return $this->getTipprc();
				break;
			case 4:
				return $this->getRefprc();
				break;
			case 5:
				return $this->getTipcom();
				break;
			case 6:
				return $this->getRefcom();
				break;
			case 7:
				return $this->getCodpre();
				break;
			case 8:
				return $this->getFecemi();
				break;
			case 9:
				return $this->getNumrif();
				break;
			case 10:
				return $this->getCodemp();
				break;
			case 11:
				return $this->getMonpag();
				break;
			case 12:
				return $this->getMonaju();
				break;
			case 13:
				return $this->getConpag();
				break;
			case 14:
				return $this->getCaupag();
				break;
			case 15:
				return $this->getStatus();
				break;
			case 16:
				return $this->getCodcue();
				break;
			case 17:
				return $this->getCodban();
				break;
			case 18:
				return $this->getNumche();
				break;
			case 19:
				return $this->getNomdes();
				break;
			case 20:
				return $this->getCodcuedes();
				break;
			case 21:
				return $this->getDespag();
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
		$keys = NpordpagPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumord(),
			$keys[1] => $this->getTipcau(),
			$keys[2] => $this->getRefcau(),
			$keys[3] => $this->getTipprc(),
			$keys[4] => $this->getRefprc(),
			$keys[5] => $this->getTipcom(),
			$keys[6] => $this->getRefcom(),
			$keys[7] => $this->getCodpre(),
			$keys[8] => $this->getFecemi(),
			$keys[9] => $this->getNumrif(),
			$keys[10] => $this->getCodemp(),
			$keys[11] => $this->getMonpag(),
			$keys[12] => $this->getMonaju(),
			$keys[13] => $this->getConpag(),
			$keys[14] => $this->getCaupag(),
			$keys[15] => $this->getStatus(),
			$keys[16] => $this->getCodcue(),
			$keys[17] => $this->getCodban(),
			$keys[18] => $this->getNumche(),
			$keys[19] => $this->getNomdes(),
			$keys[20] => $this->getCodcuedes(),
			$keys[21] => $this->getDespag(),
			$keys[22] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpordpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumord($value);
				break;
			case 1:
				$this->setTipcau($value);
				break;
			case 2:
				$this->setRefcau($value);
				break;
			case 3:
				$this->setTipprc($value);
				break;
			case 4:
				$this->setRefprc($value);
				break;
			case 5:
				$this->setTipcom($value);
				break;
			case 6:
				$this->setRefcom($value);
				break;
			case 7:
				$this->setCodpre($value);
				break;
			case 8:
				$this->setFecemi($value);
				break;
			case 9:
				$this->setNumrif($value);
				break;
			case 10:
				$this->setCodemp($value);
				break;
			case 11:
				$this->setMonpag($value);
				break;
			case 12:
				$this->setMonaju($value);
				break;
			case 13:
				$this->setConpag($value);
				break;
			case 14:
				$this->setCaupag($value);
				break;
			case 15:
				$this->setStatus($value);
				break;
			case 16:
				$this->setCodcue($value);
				break;
			case 17:
				$this->setCodban($value);
				break;
			case 18:
				$this->setNumche($value);
				break;
			case 19:
				$this->setNomdes($value);
				break;
			case 20:
				$this->setCodcuedes($value);
				break;
			case 21:
				$this->setDespag($value);
				break;
			case 22:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpordpagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumord($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipcau($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRefcau($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipprc($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRefprc($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTipcom($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRefcom($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodpre($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecemi($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNumrif($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodemp($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setMonpag($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setMonaju($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setConpag($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCaupag($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setStatus($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCodcue($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCodban($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setNumche($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setNomdes($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCodcuedes($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setDespag($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setId($arr[$keys[22]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpordpagPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpordpagPeer::NUMORD)) $criteria->add(NpordpagPeer::NUMORD, $this->numord);
		if ($this->isColumnModified(NpordpagPeer::TIPCAU)) $criteria->add(NpordpagPeer::TIPCAU, $this->tipcau);
		if ($this->isColumnModified(NpordpagPeer::REFCAU)) $criteria->add(NpordpagPeer::REFCAU, $this->refcau);
		if ($this->isColumnModified(NpordpagPeer::TIPPRC)) $criteria->add(NpordpagPeer::TIPPRC, $this->tipprc);
		if ($this->isColumnModified(NpordpagPeer::REFPRC)) $criteria->add(NpordpagPeer::REFPRC, $this->refprc);
		if ($this->isColumnModified(NpordpagPeer::TIPCOM)) $criteria->add(NpordpagPeer::TIPCOM, $this->tipcom);
		if ($this->isColumnModified(NpordpagPeer::REFCOM)) $criteria->add(NpordpagPeer::REFCOM, $this->refcom);
		if ($this->isColumnModified(NpordpagPeer::CODPRE)) $criteria->add(NpordpagPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(NpordpagPeer::FECEMI)) $criteria->add(NpordpagPeer::FECEMI, $this->fecemi);
		if ($this->isColumnModified(NpordpagPeer::NUMRIF)) $criteria->add(NpordpagPeer::NUMRIF, $this->numrif);
		if ($this->isColumnModified(NpordpagPeer::CODEMP)) $criteria->add(NpordpagPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpordpagPeer::MONPAG)) $criteria->add(NpordpagPeer::MONPAG, $this->monpag);
		if ($this->isColumnModified(NpordpagPeer::MONAJU)) $criteria->add(NpordpagPeer::MONAJU, $this->monaju);
		if ($this->isColumnModified(NpordpagPeer::CONPAG)) $criteria->add(NpordpagPeer::CONPAG, $this->conpag);
		if ($this->isColumnModified(NpordpagPeer::CAUPAG)) $criteria->add(NpordpagPeer::CAUPAG, $this->caupag);
		if ($this->isColumnModified(NpordpagPeer::STATUS)) $criteria->add(NpordpagPeer::STATUS, $this->status);
		if ($this->isColumnModified(NpordpagPeer::CODCUE)) $criteria->add(NpordpagPeer::CODCUE, $this->codcue);
		if ($this->isColumnModified(NpordpagPeer::CODBAN)) $criteria->add(NpordpagPeer::CODBAN, $this->codban);
		if ($this->isColumnModified(NpordpagPeer::NUMCHE)) $criteria->add(NpordpagPeer::NUMCHE, $this->numche);
		if ($this->isColumnModified(NpordpagPeer::NOMDES)) $criteria->add(NpordpagPeer::NOMDES, $this->nomdes);
		if ($this->isColumnModified(NpordpagPeer::CODCUEDES)) $criteria->add(NpordpagPeer::CODCUEDES, $this->codcuedes);
		if ($this->isColumnModified(NpordpagPeer::DESPAG)) $criteria->add(NpordpagPeer::DESPAG, $this->despag);
		if ($this->isColumnModified(NpordpagPeer::ID)) $criteria->add(NpordpagPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpordpagPeer::DATABASE_NAME);

		$criteria->add(NpordpagPeer::ID, $this->id);

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

		$copyObj->setNumord($this->numord);

		$copyObj->setTipcau($this->tipcau);

		$copyObj->setRefcau($this->refcau);

		$copyObj->setTipprc($this->tipprc);

		$copyObj->setRefprc($this->refprc);

		$copyObj->setTipcom($this->tipcom);

		$copyObj->setRefcom($this->refcom);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setFecemi($this->fecemi);

		$copyObj->setNumrif($this->numrif);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setMonpag($this->monpag);

		$copyObj->setMonaju($this->monaju);

		$copyObj->setConpag($this->conpag);

		$copyObj->setCaupag($this->caupag);

		$copyObj->setStatus($this->status);

		$copyObj->setCodcue($this->codcue);

		$copyObj->setCodban($this->codban);

		$copyObj->setNumche($this->numche);

		$copyObj->setNomdes($this->nomdes);

		$copyObj->setCodcuedes($this->codcuedes);

		$copyObj->setDespag($this->despag);


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
			self::$peer = new NpordpagPeer();
		}
		return self::$peer;
	}

} 