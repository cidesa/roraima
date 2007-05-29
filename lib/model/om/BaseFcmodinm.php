<?php


abstract class BaseFcmodinm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refmod;


	
	protected $nroinm;


	
	protected $fecmod;


	
	protected $codcatfis;


	
	protected $coduso;


	
	protected $codcarinm;


	
	protected $codsitinm;


	
	protected $fecpag;


	
	protected $feccal;


	
	protected $dirinm;


	
	protected $linnor;


	
	protected $linsur;


	
	protected $linest;


	
	protected $linoes;


	
	protected $mtrter;


	
	protected $mtrcon;


	
	protected $bster;


	
	protected $bscon;


	
	protected $docpro;


	
	protected $codcatfisant;


	
	protected $codusoant;


	
	protected $codcarinmant;


	
	protected $codsitinmant;


	
	protected $fecpagant;


	
	protected $feccalant;


	
	protected $dirinmant;


	
	protected $linnorant;


	
	protected $linsurant;


	
	protected $linestant;


	
	protected $linoesant;


	
	protected $mtrterant;


	
	protected $mtrconant;


	
	protected $bsterant;


	
	protected $bsconant;


	
	protected $docproant;


	
	protected $funrec;


	
	protected $codcatinm;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getRefmod()
	{

		return $this->refmod; 		
	}
	
	public function getNroinm()
	{

		return $this->nroinm; 		
	}
	
	public function getFecmod($format = 'Y-m-d')
	{

		if ($this->fecmod === null || $this->fecmod === '') {
			return null;
		} elseif (!is_int($this->fecmod)) {
						$ts = strtotime($this->fecmod);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecmod] as date/time value: " . var_export($this->fecmod, true));
			}
		} else {
			$ts = $this->fecmod;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getCodcatfis()
	{

		return $this->codcatfis; 		
	}
	
	public function getCoduso()
	{

		return $this->coduso; 		
	}
	
	public function getCodcarinm()
	{

		return $this->codcarinm; 		
	}
	
	public function getCodsitinm()
	{

		return $this->codsitinm; 		
	}
	
	public function getFecpag($format = 'Y-m-d')
	{

		if ($this->fecpag === null || $this->fecpag === '') {
			return null;
		} elseif (!is_int($this->fecpag)) {
						$ts = strtotime($this->fecpag);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecpag] as date/time value: " . var_export($this->fecpag, true));
			}
		} else {
			$ts = $this->fecpag;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFeccal($format = 'Y-m-d')
	{

		if ($this->feccal === null || $this->feccal === '') {
			return null;
		} elseif (!is_int($this->feccal)) {
						$ts = strtotime($this->feccal);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [feccal] as date/time value: " . var_export($this->feccal, true));
			}
		} else {
			$ts = $this->feccal;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getDirinm()
	{

		return $this->dirinm; 		
	}
	
	public function getLinnor()
	{

		return $this->linnor; 		
	}
	
	public function getLinsur()
	{

		return $this->linsur; 		
	}
	
	public function getLinest()
	{

		return $this->linest; 		
	}
	
	public function getLinoes()
	{

		return $this->linoes; 		
	}
	
	public function getMtrter()
	{

		return number_format($this->mtrter,2,',','.');
		
	}
	
	public function getMtrcon()
	{

		return number_format($this->mtrcon,2,',','.');
		
	}
	
	public function getBster()
	{

		return number_format($this->bster,2,',','.');
		
	}
	
	public function getBscon()
	{

		return number_format($this->bscon,2,',','.');
		
	}
	
	public function getDocpro()
	{

		return $this->docpro; 		
	}
	
	public function getCodcatfisant()
	{

		return $this->codcatfisant; 		
	}
	
	public function getCodusoant()
	{

		return $this->codusoant; 		
	}
	
	public function getCodcarinmant()
	{

		return $this->codcarinmant; 		
	}
	
	public function getCodsitinmant()
	{

		return $this->codsitinmant; 		
	}
	
	public function getFecpagant($format = 'Y-m-d')
	{

		if ($this->fecpagant === null || $this->fecpagant === '') {
			return null;
		} elseif (!is_int($this->fecpagant)) {
						$ts = strtotime($this->fecpagant);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecpagant] as date/time value: " . var_export($this->fecpagant, true));
			}
		} else {
			$ts = $this->fecpagant;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFeccalant($format = 'Y-m-d')
	{

		if ($this->feccalant === null || $this->feccalant === '') {
			return null;
		} elseif (!is_int($this->feccalant)) {
						$ts = strtotime($this->feccalant);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [feccalant] as date/time value: " . var_export($this->feccalant, true));
			}
		} else {
			$ts = $this->feccalant;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getDirinmant()
	{

		return $this->dirinmant; 		
	}
	
	public function getLinnorant()
	{

		return $this->linnorant; 		
	}
	
	public function getLinsurant()
	{

		return $this->linsurant; 		
	}
	
	public function getLinestant()
	{

		return $this->linestant; 		
	}
	
	public function getLinoesant()
	{

		return $this->linoesant; 		
	}
	
	public function getMtrterant()
	{

		return number_format($this->mtrterant,2,',','.');
		
	}
	
	public function getMtrconant()
	{

		return number_format($this->mtrconant,2,',','.');
		
	}
	
	public function getBsterant()
	{

		return number_format($this->bsterant,2,',','.');
		
	}
	
	public function getBsconant()
	{

		return number_format($this->bsconant,2,',','.');
		
	}
	
	public function getDocproant()
	{

		return $this->docproant; 		
	}
	
	public function getFunrec()
	{

		return $this->funrec; 		
	}
	
	public function getCodcatinm()
	{

		return $this->codcatinm; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setRefmod($v)
	{

		if ($this->refmod !== $v) {
			$this->refmod = $v;
			$this->modifiedColumns[] = FcmodinmPeer::REFMOD;
		}

	} 
	
	public function setNroinm($v)
	{

		if ($this->nroinm !== $v) {
			$this->nroinm = $v;
			$this->modifiedColumns[] = FcmodinmPeer::NROINM;
		}

	} 
	
	public function setFecmod($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecmod] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecmod !== $ts) {
			$this->fecmod = $ts;
			$this->modifiedColumns[] = FcmodinmPeer::FECMOD;
		}

	} 
	
	public function setCodcatfis($v)
	{

		if ($this->codcatfis !== $v) {
			$this->codcatfis = $v;
			$this->modifiedColumns[] = FcmodinmPeer::CODCATFIS;
		}

	} 
	
	public function setCoduso($v)
	{

		if ($this->coduso !== $v) {
			$this->coduso = $v;
			$this->modifiedColumns[] = FcmodinmPeer::CODUSO;
		}

	} 
	
	public function setCodcarinm($v)
	{

		if ($this->codcarinm !== $v) {
			$this->codcarinm = $v;
			$this->modifiedColumns[] = FcmodinmPeer::CODCARINM;
		}

	} 
	
	public function setCodsitinm($v)
	{

		if ($this->codsitinm !== $v) {
			$this->codsitinm = $v;
			$this->modifiedColumns[] = FcmodinmPeer::CODSITINM;
		}

	} 
	
	public function setFecpag($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecpag] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecpag !== $ts) {
			$this->fecpag = $ts;
			$this->modifiedColumns[] = FcmodinmPeer::FECPAG;
		}

	} 
	
	public function setFeccal($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [feccal] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->feccal !== $ts) {
			$this->feccal = $ts;
			$this->modifiedColumns[] = FcmodinmPeer::FECCAL;
		}

	} 
	
	public function setDirinm($v)
	{

		if ($this->dirinm !== $v) {
			$this->dirinm = $v;
			$this->modifiedColumns[] = FcmodinmPeer::DIRINM;
		}

	} 
	
	public function setLinnor($v)
	{

		if ($this->linnor !== $v) {
			$this->linnor = $v;
			$this->modifiedColumns[] = FcmodinmPeer::LINNOR;
		}

	} 
	
	public function setLinsur($v)
	{

		if ($this->linsur !== $v) {
			$this->linsur = $v;
			$this->modifiedColumns[] = FcmodinmPeer::LINSUR;
		}

	} 
	
	public function setLinest($v)
	{

		if ($this->linest !== $v) {
			$this->linest = $v;
			$this->modifiedColumns[] = FcmodinmPeer::LINEST;
		}

	} 
	
	public function setLinoes($v)
	{

		if ($this->linoes !== $v) {
			$this->linoes = $v;
			$this->modifiedColumns[] = FcmodinmPeer::LINOES;
		}

	} 
	
	public function setMtrter($v)
	{

		if ($this->mtrter !== $v) {
			$this->mtrter = $v;
			$this->modifiedColumns[] = FcmodinmPeer::MTRTER;
		}

	} 
	
	public function setMtrcon($v)
	{

		if ($this->mtrcon !== $v) {
			$this->mtrcon = $v;
			$this->modifiedColumns[] = FcmodinmPeer::MTRCON;
		}

	} 
	
	public function setBster($v)
	{

		if ($this->bster !== $v) {
			$this->bster = $v;
			$this->modifiedColumns[] = FcmodinmPeer::BSTER;
		}

	} 
	
	public function setBscon($v)
	{

		if ($this->bscon !== $v) {
			$this->bscon = $v;
			$this->modifiedColumns[] = FcmodinmPeer::BSCON;
		}

	} 
	
	public function setDocpro($v)
	{

		if ($this->docpro !== $v) {
			$this->docpro = $v;
			$this->modifiedColumns[] = FcmodinmPeer::DOCPRO;
		}

	} 
	
	public function setCodcatfisant($v)
	{

		if ($this->codcatfisant !== $v) {
			$this->codcatfisant = $v;
			$this->modifiedColumns[] = FcmodinmPeer::CODCATFISANT;
		}

	} 
	
	public function setCodusoant($v)
	{

		if ($this->codusoant !== $v) {
			$this->codusoant = $v;
			$this->modifiedColumns[] = FcmodinmPeer::CODUSOANT;
		}

	} 
	
	public function setCodcarinmant($v)
	{

		if ($this->codcarinmant !== $v) {
			$this->codcarinmant = $v;
			$this->modifiedColumns[] = FcmodinmPeer::CODCARINMANT;
		}

	} 
	
	public function setCodsitinmant($v)
	{

		if ($this->codsitinmant !== $v) {
			$this->codsitinmant = $v;
			$this->modifiedColumns[] = FcmodinmPeer::CODSITINMANT;
		}

	} 
	
	public function setFecpagant($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecpagant] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecpagant !== $ts) {
			$this->fecpagant = $ts;
			$this->modifiedColumns[] = FcmodinmPeer::FECPAGANT;
		}

	} 
	
	public function setFeccalant($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [feccalant] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->feccalant !== $ts) {
			$this->feccalant = $ts;
			$this->modifiedColumns[] = FcmodinmPeer::FECCALANT;
		}

	} 
	
	public function setDirinmant($v)
	{

		if ($this->dirinmant !== $v) {
			$this->dirinmant = $v;
			$this->modifiedColumns[] = FcmodinmPeer::DIRINMANT;
		}

	} 
	
	public function setLinnorant($v)
	{

		if ($this->linnorant !== $v) {
			$this->linnorant = $v;
			$this->modifiedColumns[] = FcmodinmPeer::LINNORANT;
		}

	} 
	
	public function setLinsurant($v)
	{

		if ($this->linsurant !== $v) {
			$this->linsurant = $v;
			$this->modifiedColumns[] = FcmodinmPeer::LINSURANT;
		}

	} 
	
	public function setLinestant($v)
	{

		if ($this->linestant !== $v) {
			$this->linestant = $v;
			$this->modifiedColumns[] = FcmodinmPeer::LINESTANT;
		}

	} 
	
	public function setLinoesant($v)
	{

		if ($this->linoesant !== $v) {
			$this->linoesant = $v;
			$this->modifiedColumns[] = FcmodinmPeer::LINOESANT;
		}

	} 
	
	public function setMtrterant($v)
	{

		if ($this->mtrterant !== $v) {
			$this->mtrterant = $v;
			$this->modifiedColumns[] = FcmodinmPeer::MTRTERANT;
		}

	} 
	
	public function setMtrconant($v)
	{

		if ($this->mtrconant !== $v) {
			$this->mtrconant = $v;
			$this->modifiedColumns[] = FcmodinmPeer::MTRCONANT;
		}

	} 
	
	public function setBsterant($v)
	{

		if ($this->bsterant !== $v) {
			$this->bsterant = $v;
			$this->modifiedColumns[] = FcmodinmPeer::BSTERANT;
		}

	} 
	
	public function setBsconant($v)
	{

		if ($this->bsconant !== $v) {
			$this->bsconant = $v;
			$this->modifiedColumns[] = FcmodinmPeer::BSCONANT;
		}

	} 
	
	public function setDocproant($v)
	{

		if ($this->docproant !== $v) {
			$this->docproant = $v;
			$this->modifiedColumns[] = FcmodinmPeer::DOCPROANT;
		}

	} 
	
	public function setFunrec($v)
	{

		if ($this->funrec !== $v) {
			$this->funrec = $v;
			$this->modifiedColumns[] = FcmodinmPeer::FUNREC;
		}

	} 
	
	public function setCodcatinm($v)
	{

		if ($this->codcatinm !== $v) {
			$this->codcatinm = $v;
			$this->modifiedColumns[] = FcmodinmPeer::CODCATINM;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcmodinmPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->refmod = $rs->getString($startcol + 0);

			$this->nroinm = $rs->getString($startcol + 1);

			$this->fecmod = $rs->getDate($startcol + 2, null);

			$this->codcatfis = $rs->getString($startcol + 3);

			$this->coduso = $rs->getString($startcol + 4);

			$this->codcarinm = $rs->getString($startcol + 5);

			$this->codsitinm = $rs->getString($startcol + 6);

			$this->fecpag = $rs->getDate($startcol + 7, null);

			$this->feccal = $rs->getDate($startcol + 8, null);

			$this->dirinm = $rs->getString($startcol + 9);

			$this->linnor = $rs->getString($startcol + 10);

			$this->linsur = $rs->getString($startcol + 11);

			$this->linest = $rs->getString($startcol + 12);

			$this->linoes = $rs->getString($startcol + 13);

			$this->mtrter = $rs->getFloat($startcol + 14);

			$this->mtrcon = $rs->getFloat($startcol + 15);

			$this->bster = $rs->getFloat($startcol + 16);

			$this->bscon = $rs->getFloat($startcol + 17);

			$this->docpro = $rs->getString($startcol + 18);

			$this->codcatfisant = $rs->getString($startcol + 19);

			$this->codusoant = $rs->getString($startcol + 20);

			$this->codcarinmant = $rs->getString($startcol + 21);

			$this->codsitinmant = $rs->getString($startcol + 22);

			$this->fecpagant = $rs->getDate($startcol + 23, null);

			$this->feccalant = $rs->getDate($startcol + 24, null);

			$this->dirinmant = $rs->getString($startcol + 25);

			$this->linnorant = $rs->getString($startcol + 26);

			$this->linsurant = $rs->getString($startcol + 27);

			$this->linestant = $rs->getString($startcol + 28);

			$this->linoesant = $rs->getString($startcol + 29);

			$this->mtrterant = $rs->getFloat($startcol + 30);

			$this->mtrconant = $rs->getFloat($startcol + 31);

			$this->bsterant = $rs->getFloat($startcol + 32);

			$this->bsconant = $rs->getFloat($startcol + 33);

			$this->docproant = $rs->getString($startcol + 34);

			$this->funrec = $rs->getString($startcol + 35);

			$this->codcatinm = $rs->getString($startcol + 36);

			$this->id = $rs->getInt($startcol + 37);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 38; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcmodinm object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcmodinmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcmodinmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcmodinmPeer::DATABASE_NAME);
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
					$pk = FcmodinmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcmodinmPeer::doUpdate($this, $con);
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


			if (($retval = FcmodinmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcmodinmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefmod();
				break;
			case 1:
				return $this->getNroinm();
				break;
			case 2:
				return $this->getFecmod();
				break;
			case 3:
				return $this->getCodcatfis();
				break;
			case 4:
				return $this->getCoduso();
				break;
			case 5:
				return $this->getCodcarinm();
				break;
			case 6:
				return $this->getCodsitinm();
				break;
			case 7:
				return $this->getFecpag();
				break;
			case 8:
				return $this->getFeccal();
				break;
			case 9:
				return $this->getDirinm();
				break;
			case 10:
				return $this->getLinnor();
				break;
			case 11:
				return $this->getLinsur();
				break;
			case 12:
				return $this->getLinest();
				break;
			case 13:
				return $this->getLinoes();
				break;
			case 14:
				return $this->getMtrter();
				break;
			case 15:
				return $this->getMtrcon();
				break;
			case 16:
				return $this->getBster();
				break;
			case 17:
				return $this->getBscon();
				break;
			case 18:
				return $this->getDocpro();
				break;
			case 19:
				return $this->getCodcatfisant();
				break;
			case 20:
				return $this->getCodusoant();
				break;
			case 21:
				return $this->getCodcarinmant();
				break;
			case 22:
				return $this->getCodsitinmant();
				break;
			case 23:
				return $this->getFecpagant();
				break;
			case 24:
				return $this->getFeccalant();
				break;
			case 25:
				return $this->getDirinmant();
				break;
			case 26:
				return $this->getLinnorant();
				break;
			case 27:
				return $this->getLinsurant();
				break;
			case 28:
				return $this->getLinestant();
				break;
			case 29:
				return $this->getLinoesant();
				break;
			case 30:
				return $this->getMtrterant();
				break;
			case 31:
				return $this->getMtrconant();
				break;
			case 32:
				return $this->getBsterant();
				break;
			case 33:
				return $this->getBsconant();
				break;
			case 34:
				return $this->getDocproant();
				break;
			case 35:
				return $this->getFunrec();
				break;
			case 36:
				return $this->getCodcatinm();
				break;
			case 37:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcmodinmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefmod(),
			$keys[1] => $this->getNroinm(),
			$keys[2] => $this->getFecmod(),
			$keys[3] => $this->getCodcatfis(),
			$keys[4] => $this->getCoduso(),
			$keys[5] => $this->getCodcarinm(),
			$keys[6] => $this->getCodsitinm(),
			$keys[7] => $this->getFecpag(),
			$keys[8] => $this->getFeccal(),
			$keys[9] => $this->getDirinm(),
			$keys[10] => $this->getLinnor(),
			$keys[11] => $this->getLinsur(),
			$keys[12] => $this->getLinest(),
			$keys[13] => $this->getLinoes(),
			$keys[14] => $this->getMtrter(),
			$keys[15] => $this->getMtrcon(),
			$keys[16] => $this->getBster(),
			$keys[17] => $this->getBscon(),
			$keys[18] => $this->getDocpro(),
			$keys[19] => $this->getCodcatfisant(),
			$keys[20] => $this->getCodusoant(),
			$keys[21] => $this->getCodcarinmant(),
			$keys[22] => $this->getCodsitinmant(),
			$keys[23] => $this->getFecpagant(),
			$keys[24] => $this->getFeccalant(),
			$keys[25] => $this->getDirinmant(),
			$keys[26] => $this->getLinnorant(),
			$keys[27] => $this->getLinsurant(),
			$keys[28] => $this->getLinestant(),
			$keys[29] => $this->getLinoesant(),
			$keys[30] => $this->getMtrterant(),
			$keys[31] => $this->getMtrconant(),
			$keys[32] => $this->getBsterant(),
			$keys[33] => $this->getBsconant(),
			$keys[34] => $this->getDocproant(),
			$keys[35] => $this->getFunrec(),
			$keys[36] => $this->getCodcatinm(),
			$keys[37] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcmodinmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefmod($value);
				break;
			case 1:
				$this->setNroinm($value);
				break;
			case 2:
				$this->setFecmod($value);
				break;
			case 3:
				$this->setCodcatfis($value);
				break;
			case 4:
				$this->setCoduso($value);
				break;
			case 5:
				$this->setCodcarinm($value);
				break;
			case 6:
				$this->setCodsitinm($value);
				break;
			case 7:
				$this->setFecpag($value);
				break;
			case 8:
				$this->setFeccal($value);
				break;
			case 9:
				$this->setDirinm($value);
				break;
			case 10:
				$this->setLinnor($value);
				break;
			case 11:
				$this->setLinsur($value);
				break;
			case 12:
				$this->setLinest($value);
				break;
			case 13:
				$this->setLinoes($value);
				break;
			case 14:
				$this->setMtrter($value);
				break;
			case 15:
				$this->setMtrcon($value);
				break;
			case 16:
				$this->setBster($value);
				break;
			case 17:
				$this->setBscon($value);
				break;
			case 18:
				$this->setDocpro($value);
				break;
			case 19:
				$this->setCodcatfisant($value);
				break;
			case 20:
				$this->setCodusoant($value);
				break;
			case 21:
				$this->setCodcarinmant($value);
				break;
			case 22:
				$this->setCodsitinmant($value);
				break;
			case 23:
				$this->setFecpagant($value);
				break;
			case 24:
				$this->setFeccalant($value);
				break;
			case 25:
				$this->setDirinmant($value);
				break;
			case 26:
				$this->setLinnorant($value);
				break;
			case 27:
				$this->setLinsurant($value);
				break;
			case 28:
				$this->setLinestant($value);
				break;
			case 29:
				$this->setLinoesant($value);
				break;
			case 30:
				$this->setMtrterant($value);
				break;
			case 31:
				$this->setMtrconant($value);
				break;
			case 32:
				$this->setBsterant($value);
				break;
			case 33:
				$this->setBsconant($value);
				break;
			case 34:
				$this->setDocproant($value);
				break;
			case 35:
				$this->setFunrec($value);
				break;
			case 36:
				$this->setCodcatinm($value);
				break;
			case 37:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcmodinmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefmod($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNroinm($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecmod($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodcatfis($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCoduso($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodcarinm($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodsitinm($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecpag($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFeccal($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDirinm($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setLinnor($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setLinsur($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setLinest($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setLinoes($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setMtrter($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setMtrcon($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setBster($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setBscon($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setDocpro($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCodcatfisant($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCodusoant($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setCodcarinmant($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setCodsitinmant($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setFecpagant($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setFeccalant($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setDirinmant($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setLinnorant($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setLinsurant($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setLinestant($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setLinoesant($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setMtrterant($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setMtrconant($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setBsterant($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setBsconant($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setDocproant($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setFunrec($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setCodcatinm($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setId($arr[$keys[37]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcmodinmPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcmodinmPeer::REFMOD)) $criteria->add(FcmodinmPeer::REFMOD, $this->refmod);
		if ($this->isColumnModified(FcmodinmPeer::NROINM)) $criteria->add(FcmodinmPeer::NROINM, $this->nroinm);
		if ($this->isColumnModified(FcmodinmPeer::FECMOD)) $criteria->add(FcmodinmPeer::FECMOD, $this->fecmod);
		if ($this->isColumnModified(FcmodinmPeer::CODCATFIS)) $criteria->add(FcmodinmPeer::CODCATFIS, $this->codcatfis);
		if ($this->isColumnModified(FcmodinmPeer::CODUSO)) $criteria->add(FcmodinmPeer::CODUSO, $this->coduso);
		if ($this->isColumnModified(FcmodinmPeer::CODCARINM)) $criteria->add(FcmodinmPeer::CODCARINM, $this->codcarinm);
		if ($this->isColumnModified(FcmodinmPeer::CODSITINM)) $criteria->add(FcmodinmPeer::CODSITINM, $this->codsitinm);
		if ($this->isColumnModified(FcmodinmPeer::FECPAG)) $criteria->add(FcmodinmPeer::FECPAG, $this->fecpag);
		if ($this->isColumnModified(FcmodinmPeer::FECCAL)) $criteria->add(FcmodinmPeer::FECCAL, $this->feccal);
		if ($this->isColumnModified(FcmodinmPeer::DIRINM)) $criteria->add(FcmodinmPeer::DIRINM, $this->dirinm);
		if ($this->isColumnModified(FcmodinmPeer::LINNOR)) $criteria->add(FcmodinmPeer::LINNOR, $this->linnor);
		if ($this->isColumnModified(FcmodinmPeer::LINSUR)) $criteria->add(FcmodinmPeer::LINSUR, $this->linsur);
		if ($this->isColumnModified(FcmodinmPeer::LINEST)) $criteria->add(FcmodinmPeer::LINEST, $this->linest);
		if ($this->isColumnModified(FcmodinmPeer::LINOES)) $criteria->add(FcmodinmPeer::LINOES, $this->linoes);
		if ($this->isColumnModified(FcmodinmPeer::MTRTER)) $criteria->add(FcmodinmPeer::MTRTER, $this->mtrter);
		if ($this->isColumnModified(FcmodinmPeer::MTRCON)) $criteria->add(FcmodinmPeer::MTRCON, $this->mtrcon);
		if ($this->isColumnModified(FcmodinmPeer::BSTER)) $criteria->add(FcmodinmPeer::BSTER, $this->bster);
		if ($this->isColumnModified(FcmodinmPeer::BSCON)) $criteria->add(FcmodinmPeer::BSCON, $this->bscon);
		if ($this->isColumnModified(FcmodinmPeer::DOCPRO)) $criteria->add(FcmodinmPeer::DOCPRO, $this->docpro);
		if ($this->isColumnModified(FcmodinmPeer::CODCATFISANT)) $criteria->add(FcmodinmPeer::CODCATFISANT, $this->codcatfisant);
		if ($this->isColumnModified(FcmodinmPeer::CODUSOANT)) $criteria->add(FcmodinmPeer::CODUSOANT, $this->codusoant);
		if ($this->isColumnModified(FcmodinmPeer::CODCARINMANT)) $criteria->add(FcmodinmPeer::CODCARINMANT, $this->codcarinmant);
		if ($this->isColumnModified(FcmodinmPeer::CODSITINMANT)) $criteria->add(FcmodinmPeer::CODSITINMANT, $this->codsitinmant);
		if ($this->isColumnModified(FcmodinmPeer::FECPAGANT)) $criteria->add(FcmodinmPeer::FECPAGANT, $this->fecpagant);
		if ($this->isColumnModified(FcmodinmPeer::FECCALANT)) $criteria->add(FcmodinmPeer::FECCALANT, $this->feccalant);
		if ($this->isColumnModified(FcmodinmPeer::DIRINMANT)) $criteria->add(FcmodinmPeer::DIRINMANT, $this->dirinmant);
		if ($this->isColumnModified(FcmodinmPeer::LINNORANT)) $criteria->add(FcmodinmPeer::LINNORANT, $this->linnorant);
		if ($this->isColumnModified(FcmodinmPeer::LINSURANT)) $criteria->add(FcmodinmPeer::LINSURANT, $this->linsurant);
		if ($this->isColumnModified(FcmodinmPeer::LINESTANT)) $criteria->add(FcmodinmPeer::LINESTANT, $this->linestant);
		if ($this->isColumnModified(FcmodinmPeer::LINOESANT)) $criteria->add(FcmodinmPeer::LINOESANT, $this->linoesant);
		if ($this->isColumnModified(FcmodinmPeer::MTRTERANT)) $criteria->add(FcmodinmPeer::MTRTERANT, $this->mtrterant);
		if ($this->isColumnModified(FcmodinmPeer::MTRCONANT)) $criteria->add(FcmodinmPeer::MTRCONANT, $this->mtrconant);
		if ($this->isColumnModified(FcmodinmPeer::BSTERANT)) $criteria->add(FcmodinmPeer::BSTERANT, $this->bsterant);
		if ($this->isColumnModified(FcmodinmPeer::BSCONANT)) $criteria->add(FcmodinmPeer::BSCONANT, $this->bsconant);
		if ($this->isColumnModified(FcmodinmPeer::DOCPROANT)) $criteria->add(FcmodinmPeer::DOCPROANT, $this->docproant);
		if ($this->isColumnModified(FcmodinmPeer::FUNREC)) $criteria->add(FcmodinmPeer::FUNREC, $this->funrec);
		if ($this->isColumnModified(FcmodinmPeer::CODCATINM)) $criteria->add(FcmodinmPeer::CODCATINM, $this->codcatinm);
		if ($this->isColumnModified(FcmodinmPeer::ID)) $criteria->add(FcmodinmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcmodinmPeer::DATABASE_NAME);

		$criteria->add(FcmodinmPeer::ID, $this->id);

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

		$copyObj->setRefmod($this->refmod);

		$copyObj->setNroinm($this->nroinm);

		$copyObj->setFecmod($this->fecmod);

		$copyObj->setCodcatfis($this->codcatfis);

		$copyObj->setCoduso($this->coduso);

		$copyObj->setCodcarinm($this->codcarinm);

		$copyObj->setCodsitinm($this->codsitinm);

		$copyObj->setFecpag($this->fecpag);

		$copyObj->setFeccal($this->feccal);

		$copyObj->setDirinm($this->dirinm);

		$copyObj->setLinnor($this->linnor);

		$copyObj->setLinsur($this->linsur);

		$copyObj->setLinest($this->linest);

		$copyObj->setLinoes($this->linoes);

		$copyObj->setMtrter($this->mtrter);

		$copyObj->setMtrcon($this->mtrcon);

		$copyObj->setBster($this->bster);

		$copyObj->setBscon($this->bscon);

		$copyObj->setDocpro($this->docpro);

		$copyObj->setCodcatfisant($this->codcatfisant);

		$copyObj->setCodusoant($this->codusoant);

		$copyObj->setCodcarinmant($this->codcarinmant);

		$copyObj->setCodsitinmant($this->codsitinmant);

		$copyObj->setFecpagant($this->fecpagant);

		$copyObj->setFeccalant($this->feccalant);

		$copyObj->setDirinmant($this->dirinmant);

		$copyObj->setLinnorant($this->linnorant);

		$copyObj->setLinsurant($this->linsurant);

		$copyObj->setLinestant($this->linestant);

		$copyObj->setLinoesant($this->linoesant);

		$copyObj->setMtrterant($this->mtrterant);

		$copyObj->setMtrconant($this->mtrconant);

		$copyObj->setBsterant($this->bsterant);

		$copyObj->setBsconant($this->bsconant);

		$copyObj->setDocproant($this->docproant);

		$copyObj->setFunrec($this->funrec);

		$copyObj->setCodcatinm($this->codcatinm);


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
			self::$peer = new FcmodinmPeer();
		}
		return self::$peer;
	}

} 