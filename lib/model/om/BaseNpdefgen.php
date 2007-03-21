<?php


abstract class BaseNpdefgen extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $loncodcar;


	
	protected $loncodemp;


	
	protected $loncodorg;


	
	protected $loncoduni;


	
	protected $rupcar;


	
	protected $rupemp;


	
	protected $ruporg;


	
	protected $rupuni;


	
	protected $forcar;


	
	protected $foremp;


	
	protected $fororg;


	
	protected $foruni;


	
	protected $redmon;


	
	protected $codpre;


	
	protected $codvac;


	
	protected $codvacfra;


	
	protected $codvaccol;


	
	protected $codislr;


	
	protected $codpres;


	
	protected $codsso;


	
	protected $sueint;


	
	protected $asiconnom = 'S';


	
	protected $cierac = '';


	
	protected $foresc;


	
	protected $numrec;


	
	protected $forcarrac;


	
	protected $forcarocp;


	
	protected $correl;


	
	protected $porctick;


	
	protected $unitrib;


	
	protected $numtick;


	
	protected $diasem;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodemp()
	{

		return $this->codemp;
	}

	
	public function getLoncodcar()
	{

		return $this->loncodcar;
	}

	
	public function getLoncodemp()
	{

		return $this->loncodemp;
	}

	
	public function getLoncodorg()
	{

		return $this->loncodorg;
	}

	
	public function getLoncoduni()
	{

		return $this->loncoduni;
	}

	
	public function getRupcar()
	{

		return $this->rupcar;
	}

	
	public function getRupemp()
	{

		return $this->rupemp;
	}

	
	public function getRuporg()
	{

		return $this->ruporg;
	}

	
	public function getRupuni()
	{

		return $this->rupuni;
	}

	
	public function getForcar()
	{

		return $this->forcar;
	}

	
	public function getForemp()
	{

		return $this->foremp;
	}

	
	public function getFororg()
	{

		return $this->fororg;
	}

	
	public function getForuni()
	{

		return $this->foruni;
	}

	
	public function getRedmon()
	{

		return $this->redmon;
	}

	
	public function getCodpre()
	{

		return $this->codpre;
	}

	
	public function getCodvac()
	{

		return $this->codvac;
	}

	
	public function getCodvacfra()
	{

		return $this->codvacfra;
	}

	
	public function getCodvaccol()
	{

		return $this->codvaccol;
	}

	
	public function getCodislr()
	{

		return $this->codislr;
	}

	
	public function getCodpres()
	{

		return $this->codpres;
	}

	
	public function getCodsso()
	{

		return $this->codsso;
	}

	
	public function getSueint()
	{

		return $this->sueint;
	}

	
	public function getAsiconnom()
	{

		return $this->asiconnom;
	}

	
	public function getCierac()
	{

		return $this->cierac;
	}

	
	public function getForesc()
	{

		return $this->foresc;
	}

	
	public function getNumrec()
	{

		return $this->numrec;
	}

	
	public function getForcarrac()
	{

		return $this->forcarrac;
	}

	
	public function getForcarocp()
	{

		return $this->forcarocp;
	}

	
	public function getCorrel()
	{

		return $this->correl;
	}

	
	public function getPorctick()
	{

		return $this->porctick;
	}

	
	public function getUnitrib()
	{

		return $this->unitrib;
	}

	
	public function getNumtick()
	{

		return $this->numtick;
	}

	
	public function getDiasem()
	{

		return $this->diasem;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = NpdefgenPeer::CODEMP;
		}

	} 
	
	public function setLoncodcar($v)
	{

		if ($this->loncodcar !== $v) {
			$this->loncodcar = $v;
			$this->modifiedColumns[] = NpdefgenPeer::LONCODCAR;
		}

	} 
	
	public function setLoncodemp($v)
	{

		if ($this->loncodemp !== $v) {
			$this->loncodemp = $v;
			$this->modifiedColumns[] = NpdefgenPeer::LONCODEMP;
		}

	} 
	
	public function setLoncodorg($v)
	{

		if ($this->loncodorg !== $v) {
			$this->loncodorg = $v;
			$this->modifiedColumns[] = NpdefgenPeer::LONCODORG;
		}

	} 
	
	public function setLoncoduni($v)
	{

		if ($this->loncoduni !== $v) {
			$this->loncoduni = $v;
			$this->modifiedColumns[] = NpdefgenPeer::LONCODUNI;
		}

	} 
	
	public function setRupcar($v)
	{

		if ($this->rupcar !== $v) {
			$this->rupcar = $v;
			$this->modifiedColumns[] = NpdefgenPeer::RUPCAR;
		}

	} 
	
	public function setRupemp($v)
	{

		if ($this->rupemp !== $v) {
			$this->rupemp = $v;
			$this->modifiedColumns[] = NpdefgenPeer::RUPEMP;
		}

	} 
	
	public function setRuporg($v)
	{

		if ($this->ruporg !== $v) {
			$this->ruporg = $v;
			$this->modifiedColumns[] = NpdefgenPeer::RUPORG;
		}

	} 
	
	public function setRupuni($v)
	{

		if ($this->rupuni !== $v) {
			$this->rupuni = $v;
			$this->modifiedColumns[] = NpdefgenPeer::RUPUNI;
		}

	} 
	
	public function setForcar($v)
	{

		if ($this->forcar !== $v) {
			$this->forcar = $v;
			$this->modifiedColumns[] = NpdefgenPeer::FORCAR;
		}

	} 
	
	public function setForemp($v)
	{

		if ($this->foremp !== $v) {
			$this->foremp = $v;
			$this->modifiedColumns[] = NpdefgenPeer::FOREMP;
		}

	} 
	
	public function setFororg($v)
	{

		if ($this->fororg !== $v) {
			$this->fororg = $v;
			$this->modifiedColumns[] = NpdefgenPeer::FORORG;
		}

	} 
	
	public function setForuni($v)
	{

		if ($this->foruni !== $v) {
			$this->foruni = $v;
			$this->modifiedColumns[] = NpdefgenPeer::FORUNI;
		}

	} 
	
	public function setRedmon($v)
	{

		if ($this->redmon !== $v) {
			$this->redmon = $v;
			$this->modifiedColumns[] = NpdefgenPeer::REDMON;
		}

	} 
	
	public function setCodpre($v)
	{

		if ($this->codpre !== $v) {
			$this->codpre = $v;
			$this->modifiedColumns[] = NpdefgenPeer::CODPRE;
		}

	} 
	
	public function setCodvac($v)
	{

		if ($this->codvac !== $v) {
			$this->codvac = $v;
			$this->modifiedColumns[] = NpdefgenPeer::CODVAC;
		}

	} 
	
	public function setCodvacfra($v)
	{

		if ($this->codvacfra !== $v) {
			$this->codvacfra = $v;
			$this->modifiedColumns[] = NpdefgenPeer::CODVACFRA;
		}

	} 
	
	public function setCodvaccol($v)
	{

		if ($this->codvaccol !== $v) {
			$this->codvaccol = $v;
			$this->modifiedColumns[] = NpdefgenPeer::CODVACCOL;
		}

	} 
	
	public function setCodislr($v)
	{

		if ($this->codislr !== $v) {
			$this->codislr = $v;
			$this->modifiedColumns[] = NpdefgenPeer::CODISLR;
		}

	} 
	
	public function setCodpres($v)
	{

		if ($this->codpres !== $v) {
			$this->codpres = $v;
			$this->modifiedColumns[] = NpdefgenPeer::CODPRES;
		}

	} 
	
	public function setCodsso($v)
	{

		if ($this->codsso !== $v) {
			$this->codsso = $v;
			$this->modifiedColumns[] = NpdefgenPeer::CODSSO;
		}

	} 
	
	public function setSueint($v)
	{

		if ($this->sueint !== $v) {
			$this->sueint = $v;
			$this->modifiedColumns[] = NpdefgenPeer::SUEINT;
		}

	} 
	
	public function setAsiconnom($v)
	{

		if ($this->asiconnom !== $v || $v === 'S') {
			$this->asiconnom = $v;
			$this->modifiedColumns[] = NpdefgenPeer::ASICONNOM;
		}

	} 
	
	public function setCierac($v)
	{

		if ($this->cierac !== $v || $v === '') {
			$this->cierac = $v;
			$this->modifiedColumns[] = NpdefgenPeer::CIERAC;
		}

	} 
	
	public function setForesc($v)
	{

		if ($this->foresc !== $v) {
			$this->foresc = $v;
			$this->modifiedColumns[] = NpdefgenPeer::FORESC;
		}

	} 
	
	public function setNumrec($v)
	{

		if ($this->numrec !== $v) {
			$this->numrec = $v;
			$this->modifiedColumns[] = NpdefgenPeer::NUMREC;
		}

	} 
	
	public function setForcarrac($v)
	{

		if ($this->forcarrac !== $v) {
			$this->forcarrac = $v;
			$this->modifiedColumns[] = NpdefgenPeer::FORCARRAC;
		}

	} 
	
	public function setForcarocp($v)
	{

		if ($this->forcarocp !== $v) {
			$this->forcarocp = $v;
			$this->modifiedColumns[] = NpdefgenPeer::FORCAROCP;
		}

	} 
	
	public function setCorrel($v)
	{

		if ($this->correl !== $v) {
			$this->correl = $v;
			$this->modifiedColumns[] = NpdefgenPeer::CORREL;
		}

	} 
	
	public function setPorctick($v)
	{

		if ($this->porctick !== $v) {
			$this->porctick = $v;
			$this->modifiedColumns[] = NpdefgenPeer::PORCTICK;
		}

	} 
	
	public function setUnitrib($v)
	{

		if ($this->unitrib !== $v) {
			$this->unitrib = $v;
			$this->modifiedColumns[] = NpdefgenPeer::UNITRIB;
		}

	} 
	
	public function setNumtick($v)
	{

		if ($this->numtick !== $v) {
			$this->numtick = $v;
			$this->modifiedColumns[] = NpdefgenPeer::NUMTICK;
		}

	} 
	
	public function setDiasem($v)
	{

		if ($this->diasem !== $v) {
			$this->diasem = $v;
			$this->modifiedColumns[] = NpdefgenPeer::DIASEM;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpdefgenPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codemp = $rs->getString($startcol + 0);

			$this->loncodcar = $rs->getFloat($startcol + 1);

			$this->loncodemp = $rs->getFloat($startcol + 2);

			$this->loncodorg = $rs->getFloat($startcol + 3);

			$this->loncoduni = $rs->getFloat($startcol + 4);

			$this->rupcar = $rs->getFloat($startcol + 5);

			$this->rupemp = $rs->getFloat($startcol + 6);

			$this->ruporg = $rs->getFloat($startcol + 7);

			$this->rupuni = $rs->getFloat($startcol + 8);

			$this->forcar = $rs->getString($startcol + 9);

			$this->foremp = $rs->getString($startcol + 10);

			$this->fororg = $rs->getString($startcol + 11);

			$this->foruni = $rs->getString($startcol + 12);

			$this->redmon = $rs->getString($startcol + 13);

			$this->codpre = $rs->getString($startcol + 14);

			$this->codvac = $rs->getString($startcol + 15);

			$this->codvacfra = $rs->getString($startcol + 16);

			$this->codvaccol = $rs->getString($startcol + 17);

			$this->codislr = $rs->getString($startcol + 18);

			$this->codpres = $rs->getString($startcol + 19);

			$this->codsso = $rs->getString($startcol + 20);

			$this->sueint = $rs->getString($startcol + 21);

			$this->asiconnom = $rs->getString($startcol + 22);

			$this->cierac = $rs->getString($startcol + 23);

			$this->foresc = $rs->getString($startcol + 24);

			$this->numrec = $rs->getFloat($startcol + 25);

			$this->forcarrac = $rs->getString($startcol + 26);

			$this->forcarocp = $rs->getString($startcol + 27);

			$this->correl = $rs->getFloat($startcol + 28);

			$this->porctick = $rs->getFloat($startcol + 29);

			$this->unitrib = $rs->getFloat($startcol + 30);

			$this->numtick = $rs->getFloat($startcol + 31);

			$this->diasem = $rs->getFloat($startcol + 32);

			$this->id = $rs->getInt($startcol + 33);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 34; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npdefgen object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpdefgenPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpdefgenPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpdefgenPeer::DATABASE_NAME);
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
					$pk = NpdefgenPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpdefgenPeer::doUpdate($this, $con);
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


			if (($retval = NpdefgenPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdefgenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getLoncodcar();
				break;
			case 2:
				return $this->getLoncodemp();
				break;
			case 3:
				return $this->getLoncodorg();
				break;
			case 4:
				return $this->getLoncoduni();
				break;
			case 5:
				return $this->getRupcar();
				break;
			case 6:
				return $this->getRupemp();
				break;
			case 7:
				return $this->getRuporg();
				break;
			case 8:
				return $this->getRupuni();
				break;
			case 9:
				return $this->getForcar();
				break;
			case 10:
				return $this->getForemp();
				break;
			case 11:
				return $this->getFororg();
				break;
			case 12:
				return $this->getForuni();
				break;
			case 13:
				return $this->getRedmon();
				break;
			case 14:
				return $this->getCodpre();
				break;
			case 15:
				return $this->getCodvac();
				break;
			case 16:
				return $this->getCodvacfra();
				break;
			case 17:
				return $this->getCodvaccol();
				break;
			case 18:
				return $this->getCodislr();
				break;
			case 19:
				return $this->getCodpres();
				break;
			case 20:
				return $this->getCodsso();
				break;
			case 21:
				return $this->getSueint();
				break;
			case 22:
				return $this->getAsiconnom();
				break;
			case 23:
				return $this->getCierac();
				break;
			case 24:
				return $this->getForesc();
				break;
			case 25:
				return $this->getNumrec();
				break;
			case 26:
				return $this->getForcarrac();
				break;
			case 27:
				return $this->getForcarocp();
				break;
			case 28:
				return $this->getCorrel();
				break;
			case 29:
				return $this->getPorctick();
				break;
			case 30:
				return $this->getUnitrib();
				break;
			case 31:
				return $this->getNumtick();
				break;
			case 32:
				return $this->getDiasem();
				break;
			case 33:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpdefgenPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getLoncodcar(),
			$keys[2] => $this->getLoncodemp(),
			$keys[3] => $this->getLoncodorg(),
			$keys[4] => $this->getLoncoduni(),
			$keys[5] => $this->getRupcar(),
			$keys[6] => $this->getRupemp(),
			$keys[7] => $this->getRuporg(),
			$keys[8] => $this->getRupuni(),
			$keys[9] => $this->getForcar(),
			$keys[10] => $this->getForemp(),
			$keys[11] => $this->getFororg(),
			$keys[12] => $this->getForuni(),
			$keys[13] => $this->getRedmon(),
			$keys[14] => $this->getCodpre(),
			$keys[15] => $this->getCodvac(),
			$keys[16] => $this->getCodvacfra(),
			$keys[17] => $this->getCodvaccol(),
			$keys[18] => $this->getCodislr(),
			$keys[19] => $this->getCodpres(),
			$keys[20] => $this->getCodsso(),
			$keys[21] => $this->getSueint(),
			$keys[22] => $this->getAsiconnom(),
			$keys[23] => $this->getCierac(),
			$keys[24] => $this->getForesc(),
			$keys[25] => $this->getNumrec(),
			$keys[26] => $this->getForcarrac(),
			$keys[27] => $this->getForcarocp(),
			$keys[28] => $this->getCorrel(),
			$keys[29] => $this->getPorctick(),
			$keys[30] => $this->getUnitrib(),
			$keys[31] => $this->getNumtick(),
			$keys[32] => $this->getDiasem(),
			$keys[33] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdefgenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setLoncodcar($value);
				break;
			case 2:
				$this->setLoncodemp($value);
				break;
			case 3:
				$this->setLoncodorg($value);
				break;
			case 4:
				$this->setLoncoduni($value);
				break;
			case 5:
				$this->setRupcar($value);
				break;
			case 6:
				$this->setRupemp($value);
				break;
			case 7:
				$this->setRuporg($value);
				break;
			case 8:
				$this->setRupuni($value);
				break;
			case 9:
				$this->setForcar($value);
				break;
			case 10:
				$this->setForemp($value);
				break;
			case 11:
				$this->setFororg($value);
				break;
			case 12:
				$this->setForuni($value);
				break;
			case 13:
				$this->setRedmon($value);
				break;
			case 14:
				$this->setCodpre($value);
				break;
			case 15:
				$this->setCodvac($value);
				break;
			case 16:
				$this->setCodvacfra($value);
				break;
			case 17:
				$this->setCodvaccol($value);
				break;
			case 18:
				$this->setCodislr($value);
				break;
			case 19:
				$this->setCodpres($value);
				break;
			case 20:
				$this->setCodsso($value);
				break;
			case 21:
				$this->setSueint($value);
				break;
			case 22:
				$this->setAsiconnom($value);
				break;
			case 23:
				$this->setCierac($value);
				break;
			case 24:
				$this->setForesc($value);
				break;
			case 25:
				$this->setNumrec($value);
				break;
			case 26:
				$this->setForcarrac($value);
				break;
			case 27:
				$this->setForcarocp($value);
				break;
			case 28:
				$this->setCorrel($value);
				break;
			case 29:
				$this->setPorctick($value);
				break;
			case 30:
				$this->setUnitrib($value);
				break;
			case 31:
				$this->setNumtick($value);
				break;
			case 32:
				$this->setDiasem($value);
				break;
			case 33:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpdefgenPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setLoncodcar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setLoncodemp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setLoncodorg($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setLoncoduni($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRupcar($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRupemp($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setRuporg($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setRupuni($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setForcar($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setForemp($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFororg($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setForuni($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setRedmon($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCodpre($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCodvac($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCodvacfra($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCodvaccol($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCodislr($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCodpres($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCodsso($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setSueint($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setAsiconnom($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setCierac($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setForesc($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setNumrec($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setForcarrac($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setForcarocp($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setCorrel($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setPorctick($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setUnitrib($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setNumtick($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setDiasem($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setId($arr[$keys[33]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpdefgenPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpdefgenPeer::CODEMP)) $criteria->add(NpdefgenPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpdefgenPeer::LONCODCAR)) $criteria->add(NpdefgenPeer::LONCODCAR, $this->loncodcar);
		if ($this->isColumnModified(NpdefgenPeer::LONCODEMP)) $criteria->add(NpdefgenPeer::LONCODEMP, $this->loncodemp);
		if ($this->isColumnModified(NpdefgenPeer::LONCODORG)) $criteria->add(NpdefgenPeer::LONCODORG, $this->loncodorg);
		if ($this->isColumnModified(NpdefgenPeer::LONCODUNI)) $criteria->add(NpdefgenPeer::LONCODUNI, $this->loncoduni);
		if ($this->isColumnModified(NpdefgenPeer::RUPCAR)) $criteria->add(NpdefgenPeer::RUPCAR, $this->rupcar);
		if ($this->isColumnModified(NpdefgenPeer::RUPEMP)) $criteria->add(NpdefgenPeer::RUPEMP, $this->rupemp);
		if ($this->isColumnModified(NpdefgenPeer::RUPORG)) $criteria->add(NpdefgenPeer::RUPORG, $this->ruporg);
		if ($this->isColumnModified(NpdefgenPeer::RUPUNI)) $criteria->add(NpdefgenPeer::RUPUNI, $this->rupuni);
		if ($this->isColumnModified(NpdefgenPeer::FORCAR)) $criteria->add(NpdefgenPeer::FORCAR, $this->forcar);
		if ($this->isColumnModified(NpdefgenPeer::FOREMP)) $criteria->add(NpdefgenPeer::FOREMP, $this->foremp);
		if ($this->isColumnModified(NpdefgenPeer::FORORG)) $criteria->add(NpdefgenPeer::FORORG, $this->fororg);
		if ($this->isColumnModified(NpdefgenPeer::FORUNI)) $criteria->add(NpdefgenPeer::FORUNI, $this->foruni);
		if ($this->isColumnModified(NpdefgenPeer::REDMON)) $criteria->add(NpdefgenPeer::REDMON, $this->redmon);
		if ($this->isColumnModified(NpdefgenPeer::CODPRE)) $criteria->add(NpdefgenPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(NpdefgenPeer::CODVAC)) $criteria->add(NpdefgenPeer::CODVAC, $this->codvac);
		if ($this->isColumnModified(NpdefgenPeer::CODVACFRA)) $criteria->add(NpdefgenPeer::CODVACFRA, $this->codvacfra);
		if ($this->isColumnModified(NpdefgenPeer::CODVACCOL)) $criteria->add(NpdefgenPeer::CODVACCOL, $this->codvaccol);
		if ($this->isColumnModified(NpdefgenPeer::CODISLR)) $criteria->add(NpdefgenPeer::CODISLR, $this->codislr);
		if ($this->isColumnModified(NpdefgenPeer::CODPRES)) $criteria->add(NpdefgenPeer::CODPRES, $this->codpres);
		if ($this->isColumnModified(NpdefgenPeer::CODSSO)) $criteria->add(NpdefgenPeer::CODSSO, $this->codsso);
		if ($this->isColumnModified(NpdefgenPeer::SUEINT)) $criteria->add(NpdefgenPeer::SUEINT, $this->sueint);
		if ($this->isColumnModified(NpdefgenPeer::ASICONNOM)) $criteria->add(NpdefgenPeer::ASICONNOM, $this->asiconnom);
		if ($this->isColumnModified(NpdefgenPeer::CIERAC)) $criteria->add(NpdefgenPeer::CIERAC, $this->cierac);
		if ($this->isColumnModified(NpdefgenPeer::FORESC)) $criteria->add(NpdefgenPeer::FORESC, $this->foresc);
		if ($this->isColumnModified(NpdefgenPeer::NUMREC)) $criteria->add(NpdefgenPeer::NUMREC, $this->numrec);
		if ($this->isColumnModified(NpdefgenPeer::FORCARRAC)) $criteria->add(NpdefgenPeer::FORCARRAC, $this->forcarrac);
		if ($this->isColumnModified(NpdefgenPeer::FORCAROCP)) $criteria->add(NpdefgenPeer::FORCAROCP, $this->forcarocp);
		if ($this->isColumnModified(NpdefgenPeer::CORREL)) $criteria->add(NpdefgenPeer::CORREL, $this->correl);
		if ($this->isColumnModified(NpdefgenPeer::PORCTICK)) $criteria->add(NpdefgenPeer::PORCTICK, $this->porctick);
		if ($this->isColumnModified(NpdefgenPeer::UNITRIB)) $criteria->add(NpdefgenPeer::UNITRIB, $this->unitrib);
		if ($this->isColumnModified(NpdefgenPeer::NUMTICK)) $criteria->add(NpdefgenPeer::NUMTICK, $this->numtick);
		if ($this->isColumnModified(NpdefgenPeer::DIASEM)) $criteria->add(NpdefgenPeer::DIASEM, $this->diasem);
		if ($this->isColumnModified(NpdefgenPeer::ID)) $criteria->add(NpdefgenPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpdefgenPeer::DATABASE_NAME);

		$criteria->add(NpdefgenPeer::ID, $this->id);

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

		$copyObj->setLoncodcar($this->loncodcar);

		$copyObj->setLoncodemp($this->loncodemp);

		$copyObj->setLoncodorg($this->loncodorg);

		$copyObj->setLoncoduni($this->loncoduni);

		$copyObj->setRupcar($this->rupcar);

		$copyObj->setRupemp($this->rupemp);

		$copyObj->setRuporg($this->ruporg);

		$copyObj->setRupuni($this->rupuni);

		$copyObj->setForcar($this->forcar);

		$copyObj->setForemp($this->foremp);

		$copyObj->setFororg($this->fororg);

		$copyObj->setForuni($this->foruni);

		$copyObj->setRedmon($this->redmon);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setCodvac($this->codvac);

		$copyObj->setCodvacfra($this->codvacfra);

		$copyObj->setCodvaccol($this->codvaccol);

		$copyObj->setCodislr($this->codislr);

		$copyObj->setCodpres($this->codpres);

		$copyObj->setCodsso($this->codsso);

		$copyObj->setSueint($this->sueint);

		$copyObj->setAsiconnom($this->asiconnom);

		$copyObj->setCierac($this->cierac);

		$copyObj->setForesc($this->foresc);

		$copyObj->setNumrec($this->numrec);

		$copyObj->setForcarrac($this->forcarrac);

		$copyObj->setForcarocp($this->forcarocp);

		$copyObj->setCorrel($this->correl);

		$copyObj->setPorctick($this->porctick);

		$copyObj->setUnitrib($this->unitrib);

		$copyObj->setNumtick($this->numtick);

		$copyObj->setDiasem($this->diasem);


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
			self::$peer = new NpdefgenPeer();
		}
		return self::$peer;
	}

} 