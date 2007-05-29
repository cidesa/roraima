<?php


abstract class BaseNpliqemp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
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

	
	public function getCodemp()
	{

		return $this->codemp; 		
	}
	
	public function getNumord()
	{

		return number_format($this->numord,2,',','.');
		
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
	
	public function getMonpag()
	{

		return number_format($this->monpag,2,',','.');
		
	}
	
	public function getMonaju()
	{

		return number_format($this->monaju,2,',','.');
		
	}
	
	public function getConpag()
	{

		return $this->conpag; 		
	}
	
	public function getCaupag()
	{

		return number_format($this->caupag,2,',','.');
		
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

		return number_format($this->despag,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = NpliqempPeer::CODEMP;
		}

	} 
	
	public function setNumord($v)
	{

		if ($this->numord !== $v) {
			$this->numord = $v;
			$this->modifiedColumns[] = NpliqempPeer::NUMORD;
		}

	} 
	
	public function setTipcau($v)
	{

		if ($this->tipcau !== $v) {
			$this->tipcau = $v;
			$this->modifiedColumns[] = NpliqempPeer::TIPCAU;
		}

	} 
	
	public function setRefcau($v)
	{

		if ($this->refcau !== $v) {
			$this->refcau = $v;
			$this->modifiedColumns[] = NpliqempPeer::REFCAU;
		}

	} 
	
	public function setTipprc($v)
	{

		if ($this->tipprc !== $v) {
			$this->tipprc = $v;
			$this->modifiedColumns[] = NpliqempPeer::TIPPRC;
		}

	} 
	
	public function setRefprc($v)
	{

		if ($this->refprc !== $v) {
			$this->refprc = $v;
			$this->modifiedColumns[] = NpliqempPeer::REFPRC;
		}

	} 
	
	public function setTipcom($v)
	{

		if ($this->tipcom !== $v) {
			$this->tipcom = $v;
			$this->modifiedColumns[] = NpliqempPeer::TIPCOM;
		}

	} 
	
	public function setRefcom($v)
	{

		if ($this->refcom !== $v) {
			$this->refcom = $v;
			$this->modifiedColumns[] = NpliqempPeer::REFCOM;
		}

	} 
	
	public function setCodpre($v)
	{

		if ($this->codpre !== $v) {
			$this->codpre = $v;
			$this->modifiedColumns[] = NpliqempPeer::CODPRE;
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
			$this->modifiedColumns[] = NpliqempPeer::FECEMI;
		}

	} 
	
	public function setNumrif($v)
	{

		if ($this->numrif !== $v) {
			$this->numrif = $v;
			$this->modifiedColumns[] = NpliqempPeer::NUMRIF;
		}

	} 
	
	public function setMonpag($v)
	{

		if ($this->monpag !== $v) {
			$this->monpag = $v;
			$this->modifiedColumns[] = NpliqempPeer::MONPAG;
		}

	} 
	
	public function setMonaju($v)
	{

		if ($this->monaju !== $v) {
			$this->monaju = $v;
			$this->modifiedColumns[] = NpliqempPeer::MONAJU;
		}

	} 
	
	public function setConpag($v)
	{

		if ($this->conpag !== $v) {
			$this->conpag = $v;
			$this->modifiedColumns[] = NpliqempPeer::CONPAG;
		}

	} 
	
	public function setCaupag($v)
	{

		if ($this->caupag !== $v) {
			$this->caupag = $v;
			$this->modifiedColumns[] = NpliqempPeer::CAUPAG;
		}

	} 
	
	public function setStatus($v)
	{

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = NpliqempPeer::STATUS;
		}

	} 
	
	public function setCodcue($v)
	{

		if ($this->codcue !== $v) {
			$this->codcue = $v;
			$this->modifiedColumns[] = NpliqempPeer::CODCUE;
		}

	} 
	
	public function setCodban($v)
	{

		if ($this->codban !== $v) {
			$this->codban = $v;
			$this->modifiedColumns[] = NpliqempPeer::CODBAN;
		}

	} 
	
	public function setNumche($v)
	{

		if ($this->numche !== $v) {
			$this->numche = $v;
			$this->modifiedColumns[] = NpliqempPeer::NUMCHE;
		}

	} 
	
	public function setNomdes($v)
	{

		if ($this->nomdes !== $v) {
			$this->nomdes = $v;
			$this->modifiedColumns[] = NpliqempPeer::NOMDES;
		}

	} 
	
	public function setCodcuedes($v)
	{

		if ($this->codcuedes !== $v) {
			$this->codcuedes = $v;
			$this->modifiedColumns[] = NpliqempPeer::CODCUEDES;
		}

	} 
	
	public function setDespag($v)
	{

		if ($this->despag !== $v) {
			$this->despag = $v;
			$this->modifiedColumns[] = NpliqempPeer::DESPAG;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpliqempPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codemp = $rs->getString($startcol + 0);

			$this->numord = $rs->getFloat($startcol + 1);

			$this->tipcau = $rs->getString($startcol + 2);

			$this->refcau = $rs->getString($startcol + 3);

			$this->tipprc = $rs->getString($startcol + 4);

			$this->refprc = $rs->getString($startcol + 5);

			$this->tipcom = $rs->getString($startcol + 6);

			$this->refcom = $rs->getString($startcol + 7);

			$this->codpre = $rs->getString($startcol + 8);

			$this->fecemi = $rs->getDate($startcol + 9, null);

			$this->numrif = $rs->getString($startcol + 10);

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
			throw new PropelException("Error populating Npliqemp object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpliqempPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpliqempPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpliqempPeer::DATABASE_NAME);
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
					$pk = NpliqempPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpliqempPeer::doUpdate($this, $con);
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


			if (($retval = NpliqempPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpliqempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getNumord();
				break;
			case 2:
				return $this->getTipcau();
				break;
			case 3:
				return $this->getRefcau();
				break;
			case 4:
				return $this->getTipprc();
				break;
			case 5:
				return $this->getRefprc();
				break;
			case 6:
				return $this->getTipcom();
				break;
			case 7:
				return $this->getRefcom();
				break;
			case 8:
				return $this->getCodpre();
				break;
			case 9:
				return $this->getFecemi();
				break;
			case 10:
				return $this->getNumrif();
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
		$keys = NpliqempPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getNumord(),
			$keys[2] => $this->getTipcau(),
			$keys[3] => $this->getRefcau(),
			$keys[4] => $this->getTipprc(),
			$keys[5] => $this->getRefprc(),
			$keys[6] => $this->getTipcom(),
			$keys[7] => $this->getRefcom(),
			$keys[8] => $this->getCodpre(),
			$keys[9] => $this->getFecemi(),
			$keys[10] => $this->getNumrif(),
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
		$pos = NpliqempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setNumord($value);
				break;
			case 2:
				$this->setTipcau($value);
				break;
			case 3:
				$this->setRefcau($value);
				break;
			case 4:
				$this->setTipprc($value);
				break;
			case 5:
				$this->setRefprc($value);
				break;
			case 6:
				$this->setTipcom($value);
				break;
			case 7:
				$this->setRefcom($value);
				break;
			case 8:
				$this->setCodpre($value);
				break;
			case 9:
				$this->setFecemi($value);
				break;
			case 10:
				$this->setNumrif($value);
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
		$keys = NpliqempPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumord($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipcau($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRefcau($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTipprc($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRefprc($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTipcom($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setRefcom($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodpre($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecemi($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setNumrif($arr[$keys[10]]);
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
		$criteria = new Criteria(NpliqempPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpliqempPeer::CODEMP)) $criteria->add(NpliqempPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpliqempPeer::NUMORD)) $criteria->add(NpliqempPeer::NUMORD, $this->numord);
		if ($this->isColumnModified(NpliqempPeer::TIPCAU)) $criteria->add(NpliqempPeer::TIPCAU, $this->tipcau);
		if ($this->isColumnModified(NpliqempPeer::REFCAU)) $criteria->add(NpliqempPeer::REFCAU, $this->refcau);
		if ($this->isColumnModified(NpliqempPeer::TIPPRC)) $criteria->add(NpliqempPeer::TIPPRC, $this->tipprc);
		if ($this->isColumnModified(NpliqempPeer::REFPRC)) $criteria->add(NpliqempPeer::REFPRC, $this->refprc);
		if ($this->isColumnModified(NpliqempPeer::TIPCOM)) $criteria->add(NpliqempPeer::TIPCOM, $this->tipcom);
		if ($this->isColumnModified(NpliqempPeer::REFCOM)) $criteria->add(NpliqempPeer::REFCOM, $this->refcom);
		if ($this->isColumnModified(NpliqempPeer::CODPRE)) $criteria->add(NpliqempPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(NpliqempPeer::FECEMI)) $criteria->add(NpliqempPeer::FECEMI, $this->fecemi);
		if ($this->isColumnModified(NpliqempPeer::NUMRIF)) $criteria->add(NpliqempPeer::NUMRIF, $this->numrif);
		if ($this->isColumnModified(NpliqempPeer::MONPAG)) $criteria->add(NpliqempPeer::MONPAG, $this->monpag);
		if ($this->isColumnModified(NpliqempPeer::MONAJU)) $criteria->add(NpliqempPeer::MONAJU, $this->monaju);
		if ($this->isColumnModified(NpliqempPeer::CONPAG)) $criteria->add(NpliqempPeer::CONPAG, $this->conpag);
		if ($this->isColumnModified(NpliqempPeer::CAUPAG)) $criteria->add(NpliqempPeer::CAUPAG, $this->caupag);
		if ($this->isColumnModified(NpliqempPeer::STATUS)) $criteria->add(NpliqempPeer::STATUS, $this->status);
		if ($this->isColumnModified(NpliqempPeer::CODCUE)) $criteria->add(NpliqempPeer::CODCUE, $this->codcue);
		if ($this->isColumnModified(NpliqempPeer::CODBAN)) $criteria->add(NpliqempPeer::CODBAN, $this->codban);
		if ($this->isColumnModified(NpliqempPeer::NUMCHE)) $criteria->add(NpliqempPeer::NUMCHE, $this->numche);
		if ($this->isColumnModified(NpliqempPeer::NOMDES)) $criteria->add(NpliqempPeer::NOMDES, $this->nomdes);
		if ($this->isColumnModified(NpliqempPeer::CODCUEDES)) $criteria->add(NpliqempPeer::CODCUEDES, $this->codcuedes);
		if ($this->isColumnModified(NpliqempPeer::DESPAG)) $criteria->add(NpliqempPeer::DESPAG, $this->despag);
		if ($this->isColumnModified(NpliqempPeer::ID)) $criteria->add(NpliqempPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpliqempPeer::DATABASE_NAME);

		$criteria->add(NpliqempPeer::ID, $this->id);

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
			self::$peer = new NpliqempPeer();
		}
		return self::$peer;
	}

} 