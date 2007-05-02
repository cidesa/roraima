<?php


abstract class BaseFcdefins extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $loncodact;


	
	protected $loncodveh;


	
	protected $loncodcat;


	
	protected $loncodubifis;


	
	protected $loncodubimag;


	
	protected $rupact;


	
	protected $rupveh;


	
	protected $rupcat;


	
	protected $rupubifis;


	
	protected $rupubimag;


	
	protected $foract;


	
	protected $forveh;


	
	protected $forcat;


	
	protected $forubifis;


	
	protected $forubimag;


	
	protected $porpic;


	
	protected $porveh;


	
	protected $porinm;


	
	protected $unipic;


	
	protected $valunitri;


	
	protected $unitas;


	
	protected $codpic;


	
	protected $codveh;


	
	protected $codinm;


	
	protected $codpro;


	
	protected $codesp;


	
	protected $codapu;


	
	protected $codajupic;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodemp()
	{

		return $this->codemp;
	}

	
	public function getLoncodact()
	{

		return $this->loncodact;
	}

	
	public function getLoncodveh()
	{

		return $this->loncodveh;
	}

	
	public function getLoncodcat()
	{

		return $this->loncodcat;
	}

	
	public function getLoncodubifis()
	{

		return $this->loncodubifis;
	}

	
	public function getLoncodubimag()
	{

		return $this->loncodubimag;
	}

	
	public function getRupact()
	{

		return $this->rupact;
	}

	
	public function getRupveh()
	{

		return $this->rupveh;
	}

	
	public function getRupcat()
	{

		return $this->rupcat;
	}

	
	public function getRupubifis()
	{

		return $this->rupubifis;
	}

	
	public function getRupubimag()
	{

		return $this->rupubimag;
	}

	
	public function getForact()
	{

		return $this->foract;
	}

	
	public function getForveh()
	{

		return $this->forveh;
	}

	
	public function getForcat()
	{

		return $this->forcat;
	}

	
	public function getForubifis()
	{

		return $this->forubifis;
	}

	
	public function getForubimag()
	{

		return $this->forubimag;
	}

	
	public function getPorpic()
	{

		return $this->porpic;
	}

	
	public function getPorveh()
	{

		return $this->porveh;
	}

	
	public function getPorinm()
	{

		return $this->porinm;
	}

	
	public function getUnipic()
	{

		return $this->unipic;
	}

	
	public function getValunitri()
	{

		return $this->valunitri;
	}

	
	public function getUnitas()
	{

		return $this->unitas;
	}

	
	public function getCodpic()
	{

		return $this->codpic;
	}

	
	public function getCodveh()
	{

		return $this->codveh;
	}

	
	public function getCodinm()
	{

		return $this->codinm;
	}

	
	public function getCodpro()
	{

		return $this->codpro;
	}

	
	public function getCodesp()
	{

		return $this->codesp;
	}

	
	public function getCodapu()
	{

		return $this->codapu;
	}

	
	public function getCodajupic()
	{

		return $this->codajupic;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = FcdefinsPeer::CODEMP;
		}

	} 
	
	public function setLoncodact($v)
	{

		if ($this->loncodact !== $v) {
			$this->loncodact = $v;
			$this->modifiedColumns[] = FcdefinsPeer::LONCODACT;
		}

	} 
	
	public function setLoncodveh($v)
	{

		if ($this->loncodveh !== $v) {
			$this->loncodveh = $v;
			$this->modifiedColumns[] = FcdefinsPeer::LONCODVEH;
		}

	} 
	
	public function setLoncodcat($v)
	{

		if ($this->loncodcat !== $v) {
			$this->loncodcat = $v;
			$this->modifiedColumns[] = FcdefinsPeer::LONCODCAT;
		}

	} 
	
	public function setLoncodubifis($v)
	{

		if ($this->loncodubifis !== $v) {
			$this->loncodubifis = $v;
			$this->modifiedColumns[] = FcdefinsPeer::LONCODUBIFIS;
		}

	} 
	
	public function setLoncodubimag($v)
	{

		if ($this->loncodubimag !== $v) {
			$this->loncodubimag = $v;
			$this->modifiedColumns[] = FcdefinsPeer::LONCODUBIMAG;
		}

	} 
	
	public function setRupact($v)
	{

		if ($this->rupact !== $v) {
			$this->rupact = $v;
			$this->modifiedColumns[] = FcdefinsPeer::RUPACT;
		}

	} 
	
	public function setRupveh($v)
	{

		if ($this->rupveh !== $v) {
			$this->rupveh = $v;
			$this->modifiedColumns[] = FcdefinsPeer::RUPVEH;
		}

	} 
	
	public function setRupcat($v)
	{

		if ($this->rupcat !== $v) {
			$this->rupcat = $v;
			$this->modifiedColumns[] = FcdefinsPeer::RUPCAT;
		}

	} 
	
	public function setRupubifis($v)
	{

		if ($this->rupubifis !== $v) {
			$this->rupubifis = $v;
			$this->modifiedColumns[] = FcdefinsPeer::RUPUBIFIS;
		}

	} 
	
	public function setRupubimag($v)
	{

		if ($this->rupubimag !== $v) {
			$this->rupubimag = $v;
			$this->modifiedColumns[] = FcdefinsPeer::RUPUBIMAG;
		}

	} 
	
	public function setForact($v)
	{

		if ($this->foract !== $v) {
			$this->foract = $v;
			$this->modifiedColumns[] = FcdefinsPeer::FORACT;
		}

	} 
	
	public function setForveh($v)
	{

		if ($this->forveh !== $v) {
			$this->forveh = $v;
			$this->modifiedColumns[] = FcdefinsPeer::FORVEH;
		}

	} 
	
	public function setForcat($v)
	{

		if ($this->forcat !== $v) {
			$this->forcat = $v;
			$this->modifiedColumns[] = FcdefinsPeer::FORCAT;
		}

	} 
	
	public function setForubifis($v)
	{

		if ($this->forubifis !== $v) {
			$this->forubifis = $v;
			$this->modifiedColumns[] = FcdefinsPeer::FORUBIFIS;
		}

	} 
	
	public function setForubimag($v)
	{

		if ($this->forubimag !== $v) {
			$this->forubimag = $v;
			$this->modifiedColumns[] = FcdefinsPeer::FORUBIMAG;
		}

	} 
	
	public function setPorpic($v)
	{

		if ($this->porpic !== $v) {
			$this->porpic = $v;
			$this->modifiedColumns[] = FcdefinsPeer::PORPIC;
		}

	} 
	
	public function setPorveh($v)
	{

		if ($this->porveh !== $v) {
			$this->porveh = $v;
			$this->modifiedColumns[] = FcdefinsPeer::PORVEH;
		}

	} 
	
	public function setPorinm($v)
	{

		if ($this->porinm !== $v) {
			$this->porinm = $v;
			$this->modifiedColumns[] = FcdefinsPeer::PORINM;
		}

	} 
	
	public function setUnipic($v)
	{

		if ($this->unipic !== $v) {
			$this->unipic = $v;
			$this->modifiedColumns[] = FcdefinsPeer::UNIPIC;
		}

	} 
	
	public function setValunitri($v)
	{

		if ($this->valunitri !== $v) {
			$this->valunitri = $v;
			$this->modifiedColumns[] = FcdefinsPeer::VALUNITRI;
		}

	} 
	
	public function setUnitas($v)
	{

		if ($this->unitas !== $v) {
			$this->unitas = $v;
			$this->modifiedColumns[] = FcdefinsPeer::UNITAS;
		}

	} 
	
	public function setCodpic($v)
	{

		if ($this->codpic !== $v) {
			$this->codpic = $v;
			$this->modifiedColumns[] = FcdefinsPeer::CODPIC;
		}

	} 
	
	public function setCodveh($v)
	{

		if ($this->codveh !== $v) {
			$this->codveh = $v;
			$this->modifiedColumns[] = FcdefinsPeer::CODVEH;
		}

	} 
	
	public function setCodinm($v)
	{

		if ($this->codinm !== $v) {
			$this->codinm = $v;
			$this->modifiedColumns[] = FcdefinsPeer::CODINM;
		}

	} 
	
	public function setCodpro($v)
	{

		if ($this->codpro !== $v) {
			$this->codpro = $v;
			$this->modifiedColumns[] = FcdefinsPeer::CODPRO;
		}

	} 
	
	public function setCodesp($v)
	{

		if ($this->codesp !== $v) {
			$this->codesp = $v;
			$this->modifiedColumns[] = FcdefinsPeer::CODESP;
		}

	} 
	
	public function setCodapu($v)
	{

		if ($this->codapu !== $v) {
			$this->codapu = $v;
			$this->modifiedColumns[] = FcdefinsPeer::CODAPU;
		}

	} 
	
	public function setCodajupic($v)
	{

		if ($this->codajupic !== $v) {
			$this->codajupic = $v;
			$this->modifiedColumns[] = FcdefinsPeer::CODAJUPIC;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcdefinsPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codemp = $rs->getString($startcol + 0);

			$this->loncodact = $rs->getFloat($startcol + 1);

			$this->loncodveh = $rs->getFloat($startcol + 2);

			$this->loncodcat = $rs->getFloat($startcol + 3);

			$this->loncodubifis = $rs->getFloat($startcol + 4);

			$this->loncodubimag = $rs->getFloat($startcol + 5);

			$this->rupact = $rs->getFloat($startcol + 6);

			$this->rupveh = $rs->getFloat($startcol + 7);

			$this->rupcat = $rs->getFloat($startcol + 8);

			$this->rupubifis = $rs->getFloat($startcol + 9);

			$this->rupubimag = $rs->getFloat($startcol + 10);

			$this->foract = $rs->getString($startcol + 11);

			$this->forveh = $rs->getString($startcol + 12);

			$this->forcat = $rs->getString($startcol + 13);

			$this->forubifis = $rs->getString($startcol + 14);

			$this->forubimag = $rs->getString($startcol + 15);

			$this->porpic = $rs->getString($startcol + 16);

			$this->porveh = $rs->getString($startcol + 17);

			$this->porinm = $rs->getString($startcol + 18);

			$this->unipic = $rs->getString($startcol + 19);

			$this->valunitri = $rs->getFloat($startcol + 20);

			$this->unitas = $rs->getString($startcol + 21);

			$this->codpic = $rs->getString($startcol + 22);

			$this->codveh = $rs->getString($startcol + 23);

			$this->codinm = $rs->getString($startcol + 24);

			$this->codpro = $rs->getString($startcol + 25);

			$this->codesp = $rs->getString($startcol + 26);

			$this->codapu = $rs->getString($startcol + 27);

			$this->codajupic = $rs->getString($startcol + 28);

			$this->id = $rs->getInt($startcol + 29);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 30; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcdefins object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcdefinsPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcdefinsPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcdefinsPeer::DATABASE_NAME);
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
					$pk = FcdefinsPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcdefinsPeer::doUpdate($this, $con);
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


			if (($retval = FcdefinsPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdefinsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getLoncodact();
				break;
			case 2:
				return $this->getLoncodveh();
				break;
			case 3:
				return $this->getLoncodcat();
				break;
			case 4:
				return $this->getLoncodubifis();
				break;
			case 5:
				return $this->getLoncodubimag();
				break;
			case 6:
				return $this->getRupact();
				break;
			case 7:
				return $this->getRupveh();
				break;
			case 8:
				return $this->getRupcat();
				break;
			case 9:
				return $this->getRupubifis();
				break;
			case 10:
				return $this->getRupubimag();
				break;
			case 11:
				return $this->getForact();
				break;
			case 12:
				return $this->getForveh();
				break;
			case 13:
				return $this->getForcat();
				break;
			case 14:
				return $this->getForubifis();
				break;
			case 15:
				return $this->getForubimag();
				break;
			case 16:
				return $this->getPorpic();
				break;
			case 17:
				return $this->getPorveh();
				break;
			case 18:
				return $this->getPorinm();
				break;
			case 19:
				return $this->getUnipic();
				break;
			case 20:
				return $this->getValunitri();
				break;
			case 21:
				return $this->getUnitas();
				break;
			case 22:
				return $this->getCodpic();
				break;
			case 23:
				return $this->getCodveh();
				break;
			case 24:
				return $this->getCodinm();
				break;
			case 25:
				return $this->getCodpro();
				break;
			case 26:
				return $this->getCodesp();
				break;
			case 27:
				return $this->getCodapu();
				break;
			case 28:
				return $this->getCodajupic();
				break;
			case 29:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdefinsPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getLoncodact(),
			$keys[2] => $this->getLoncodveh(),
			$keys[3] => $this->getLoncodcat(),
			$keys[4] => $this->getLoncodubifis(),
			$keys[5] => $this->getLoncodubimag(),
			$keys[6] => $this->getRupact(),
			$keys[7] => $this->getRupveh(),
			$keys[8] => $this->getRupcat(),
			$keys[9] => $this->getRupubifis(),
			$keys[10] => $this->getRupubimag(),
			$keys[11] => $this->getForact(),
			$keys[12] => $this->getForveh(),
			$keys[13] => $this->getForcat(),
			$keys[14] => $this->getForubifis(),
			$keys[15] => $this->getForubimag(),
			$keys[16] => $this->getPorpic(),
			$keys[17] => $this->getPorveh(),
			$keys[18] => $this->getPorinm(),
			$keys[19] => $this->getUnipic(),
			$keys[20] => $this->getValunitri(),
			$keys[21] => $this->getUnitas(),
			$keys[22] => $this->getCodpic(),
			$keys[23] => $this->getCodveh(),
			$keys[24] => $this->getCodinm(),
			$keys[25] => $this->getCodpro(),
			$keys[26] => $this->getCodesp(),
			$keys[27] => $this->getCodapu(),
			$keys[28] => $this->getCodajupic(),
			$keys[29] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdefinsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setLoncodact($value);
				break;
			case 2:
				$this->setLoncodveh($value);
				break;
			case 3:
				$this->setLoncodcat($value);
				break;
			case 4:
				$this->setLoncodubifis($value);
				break;
			case 5:
				$this->setLoncodubimag($value);
				break;
			case 6:
				$this->setRupact($value);
				break;
			case 7:
				$this->setRupveh($value);
				break;
			case 8:
				$this->setRupcat($value);
				break;
			case 9:
				$this->setRupubifis($value);
				break;
			case 10:
				$this->setRupubimag($value);
				break;
			case 11:
				$this->setForact($value);
				break;
			case 12:
				$this->setForveh($value);
				break;
			case 13:
				$this->setForcat($value);
				break;
			case 14:
				$this->setForubifis($value);
				break;
			case 15:
				$this->setForubimag($value);
				break;
			case 16:
				$this->setPorpic($value);
				break;
			case 17:
				$this->setPorveh($value);
				break;
			case 18:
				$this->setPorinm($value);
				break;
			case 19:
				$this->setUnipic($value);
				break;
			case 20:
				$this->setValunitri($value);
				break;
			case 21:
				$this->setUnitas($value);
				break;
			case 22:
				$this->setCodpic($value);
				break;
			case 23:
				$this->setCodveh($value);
				break;
			case 24:
				$this->setCodinm($value);
				break;
			case 25:
				$this->setCodpro($value);
				break;
			case 26:
				$this->setCodesp($value);
				break;
			case 27:
				$this->setCodapu($value);
				break;
			case 28:
				$this->setCodajupic($value);
				break;
			case 29:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdefinsPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setLoncodact($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setLoncodveh($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setLoncodcat($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setLoncodubifis($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setLoncodubimag($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRupact($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setRupveh($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setRupcat($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setRupubifis($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setRupubimag($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setForact($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setForveh($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setForcat($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setForubifis($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setForubimag($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setPorpic($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setPorveh($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setPorinm($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setUnipic($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setValunitri($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setUnitas($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setCodpic($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setCodveh($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setCodinm($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setCodpro($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setCodesp($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setCodapu($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setCodajupic($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setId($arr[$keys[29]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcdefinsPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcdefinsPeer::CODEMP)) $criteria->add(FcdefinsPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(FcdefinsPeer::LONCODACT)) $criteria->add(FcdefinsPeer::LONCODACT, $this->loncodact);
		if ($this->isColumnModified(FcdefinsPeer::LONCODVEH)) $criteria->add(FcdefinsPeer::LONCODVEH, $this->loncodveh);
		if ($this->isColumnModified(FcdefinsPeer::LONCODCAT)) $criteria->add(FcdefinsPeer::LONCODCAT, $this->loncodcat);
		if ($this->isColumnModified(FcdefinsPeer::LONCODUBIFIS)) $criteria->add(FcdefinsPeer::LONCODUBIFIS, $this->loncodubifis);
		if ($this->isColumnModified(FcdefinsPeer::LONCODUBIMAG)) $criteria->add(FcdefinsPeer::LONCODUBIMAG, $this->loncodubimag);
		if ($this->isColumnModified(FcdefinsPeer::RUPACT)) $criteria->add(FcdefinsPeer::RUPACT, $this->rupact);
		if ($this->isColumnModified(FcdefinsPeer::RUPVEH)) $criteria->add(FcdefinsPeer::RUPVEH, $this->rupveh);
		if ($this->isColumnModified(FcdefinsPeer::RUPCAT)) $criteria->add(FcdefinsPeer::RUPCAT, $this->rupcat);
		if ($this->isColumnModified(FcdefinsPeer::RUPUBIFIS)) $criteria->add(FcdefinsPeer::RUPUBIFIS, $this->rupubifis);
		if ($this->isColumnModified(FcdefinsPeer::RUPUBIMAG)) $criteria->add(FcdefinsPeer::RUPUBIMAG, $this->rupubimag);
		if ($this->isColumnModified(FcdefinsPeer::FORACT)) $criteria->add(FcdefinsPeer::FORACT, $this->foract);
		if ($this->isColumnModified(FcdefinsPeer::FORVEH)) $criteria->add(FcdefinsPeer::FORVEH, $this->forveh);
		if ($this->isColumnModified(FcdefinsPeer::FORCAT)) $criteria->add(FcdefinsPeer::FORCAT, $this->forcat);
		if ($this->isColumnModified(FcdefinsPeer::FORUBIFIS)) $criteria->add(FcdefinsPeer::FORUBIFIS, $this->forubifis);
		if ($this->isColumnModified(FcdefinsPeer::FORUBIMAG)) $criteria->add(FcdefinsPeer::FORUBIMAG, $this->forubimag);
		if ($this->isColumnModified(FcdefinsPeer::PORPIC)) $criteria->add(FcdefinsPeer::PORPIC, $this->porpic);
		if ($this->isColumnModified(FcdefinsPeer::PORVEH)) $criteria->add(FcdefinsPeer::PORVEH, $this->porveh);
		if ($this->isColumnModified(FcdefinsPeer::PORINM)) $criteria->add(FcdefinsPeer::PORINM, $this->porinm);
		if ($this->isColumnModified(FcdefinsPeer::UNIPIC)) $criteria->add(FcdefinsPeer::UNIPIC, $this->unipic);
		if ($this->isColumnModified(FcdefinsPeer::VALUNITRI)) $criteria->add(FcdefinsPeer::VALUNITRI, $this->valunitri);
		if ($this->isColumnModified(FcdefinsPeer::UNITAS)) $criteria->add(FcdefinsPeer::UNITAS, $this->unitas);
		if ($this->isColumnModified(FcdefinsPeer::CODPIC)) $criteria->add(FcdefinsPeer::CODPIC, $this->codpic);
		if ($this->isColumnModified(FcdefinsPeer::CODVEH)) $criteria->add(FcdefinsPeer::CODVEH, $this->codveh);
		if ($this->isColumnModified(FcdefinsPeer::CODINM)) $criteria->add(FcdefinsPeer::CODINM, $this->codinm);
		if ($this->isColumnModified(FcdefinsPeer::CODPRO)) $criteria->add(FcdefinsPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(FcdefinsPeer::CODESP)) $criteria->add(FcdefinsPeer::CODESP, $this->codesp);
		if ($this->isColumnModified(FcdefinsPeer::CODAPU)) $criteria->add(FcdefinsPeer::CODAPU, $this->codapu);
		if ($this->isColumnModified(FcdefinsPeer::CODAJUPIC)) $criteria->add(FcdefinsPeer::CODAJUPIC, $this->codajupic);
		if ($this->isColumnModified(FcdefinsPeer::ID)) $criteria->add(FcdefinsPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcdefinsPeer::DATABASE_NAME);

		$criteria->add(FcdefinsPeer::CODEMP, $this->codemp);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getCodemp();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setCodemp($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setLoncodact($this->loncodact);

		$copyObj->setLoncodveh($this->loncodveh);

		$copyObj->setLoncodcat($this->loncodcat);

		$copyObj->setLoncodubifis($this->loncodubifis);

		$copyObj->setLoncodubimag($this->loncodubimag);

		$copyObj->setRupact($this->rupact);

		$copyObj->setRupveh($this->rupveh);

		$copyObj->setRupcat($this->rupcat);

		$copyObj->setRupubifis($this->rupubifis);

		$copyObj->setRupubimag($this->rupubimag);

		$copyObj->setForact($this->foract);

		$copyObj->setForveh($this->forveh);

		$copyObj->setForcat($this->forcat);

		$copyObj->setForubifis($this->forubifis);

		$copyObj->setForubimag($this->forubimag);

		$copyObj->setPorpic($this->porpic);

		$copyObj->setPorveh($this->porveh);

		$copyObj->setPorinm($this->porinm);

		$copyObj->setUnipic($this->unipic);

		$copyObj->setValunitri($this->valunitri);

		$copyObj->setUnitas($this->unitas);

		$copyObj->setCodpic($this->codpic);

		$copyObj->setCodveh($this->codveh);

		$copyObj->setCodinm($this->codinm);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setCodesp($this->codesp);

		$copyObj->setCodapu($this->codapu);

		$copyObj->setCodajupic($this->codajupic);

		$copyObj->setId($this->id);


		$copyObj->setNew(true);

		$copyObj->setCodemp(NULL); 
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
			self::$peer = new FcdefinsPeer();
		}
		return self::$peer;
	}

} 