<?php


abstract class BaseCpsoltrasla extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $reftra;


	
	protected $fectra;


	
	protected $anotra;


	
	protected $pertra;


	
	protected $destra;


	
	protected $desanu;


	
	protected $tottra;


	
	protected $statra;


	
	protected $codart;


	
	protected $stacon;


	
	protected $stagob;


	
	protected $stapre;


	
	protected $fecpre;


	
	protected $despre;


	
	protected $feccon;


	
	protected $descon;


	
	protected $desgob;


	
	protected $fecgob;


	
	protected $justificacion;


	
	protected $feccont;


	
	protected $justificacion1;


	
	protected $justificacion2;


	
	protected $justificacion3;


	
	protected $justificacion4;


	
	protected $justificacion5;


	
	protected $justificacion6;


	
	protected $justificacion7;


	
	protected $justificacion8;


	
	protected $justificacion9;


	
	protected $tipo;


	
	protected $tipgas;


	
	protected $fecanu;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getReftra()
	{

		return $this->reftra; 		
	}
	
	public function getFectra($format = 'Y-m-d')
	{

		if ($this->fectra === null || $this->fectra === '') {
			return null;
		} elseif (!is_int($this->fectra)) {
						$ts = strtotime($this->fectra);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fectra] as date/time value: " . var_export($this->fectra, true));
			}
		} else {
			$ts = $this->fectra;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getAnotra()
	{

		return $this->anotra; 		
	}
	
	public function getPertra()
	{

		return $this->pertra; 		
	}
	
	public function getDestra()
	{

		return $this->destra; 		
	}
	
	public function getDesanu()
	{

		return $this->desanu; 		
	}
	
	public function getTottra()
	{

		return number_format($this->tottra,2,',','.');
		
	}
	
	public function getStatra()
	{

		return $this->statra; 		
	}
	
	public function getCodart()
	{

		return $this->codart; 		
	}
	
	public function getStacon()
	{

		return $this->stacon; 		
	}
	
	public function getStagob()
	{

		return $this->stagob; 		
	}
	
	public function getStapre()
	{

		return $this->stapre; 		
	}
	
	public function getFecpre($format = 'Y-m-d')
	{

		if ($this->fecpre === null || $this->fecpre === '') {
			return null;
		} elseif (!is_int($this->fecpre)) {
						$ts = strtotime($this->fecpre);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecpre] as date/time value: " . var_export($this->fecpre, true));
			}
		} else {
			$ts = $this->fecpre;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getDespre()
	{

		return $this->despre; 		
	}
	
	public function getFeccon($format = 'Y-m-d')
	{

		if ($this->feccon === null || $this->feccon === '') {
			return null;
		} elseif (!is_int($this->feccon)) {
						$ts = strtotime($this->feccon);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [feccon] as date/time value: " . var_export($this->feccon, true));
			}
		} else {
			$ts = $this->feccon;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getDescon()
	{

		return $this->descon; 		
	}
	
	public function getDesgob()
	{

		return $this->desgob; 		
	}
	
	public function getFecgob($format = 'Y-m-d')
	{

		if ($this->fecgob === null || $this->fecgob === '') {
			return null;
		} elseif (!is_int($this->fecgob)) {
						$ts = strtotime($this->fecgob);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecgob] as date/time value: " . var_export($this->fecgob, true));
			}
		} else {
			$ts = $this->fecgob;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getJustificacion()
	{

		return $this->justificacion; 		
	}
	
	public function getFeccont($format = 'Y-m-d')
	{

		if ($this->feccont === null || $this->feccont === '') {
			return null;
		} elseif (!is_int($this->feccont)) {
						$ts = strtotime($this->feccont);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [feccont] as date/time value: " . var_export($this->feccont, true));
			}
		} else {
			$ts = $this->feccont;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getJustificacion1()
	{

		return $this->justificacion1; 		
	}
	
	public function getJustificacion2()
	{

		return $this->justificacion2; 		
	}
	
	public function getJustificacion3()
	{

		return $this->justificacion3; 		
	}
	
	public function getJustificacion4()
	{

		return $this->justificacion4; 		
	}
	
	public function getJustificacion5()
	{

		return $this->justificacion5; 		
	}
	
	public function getJustificacion6()
	{

		return $this->justificacion6; 		
	}
	
	public function getJustificacion7()
	{

		return $this->justificacion7; 		
	}
	
	public function getJustificacion8()
	{

		return $this->justificacion8; 		
	}
	
	public function getJustificacion9()
	{

		return $this->justificacion9; 		
	}
	
	public function getTipo()
	{

		return $this->tipo; 		
	}
	
	public function getTipgas()
	{

		return $this->tipgas; 		
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

	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setReftra($v)
	{

		if ($this->reftra !== $v) {
			$this->reftra = $v;
			$this->modifiedColumns[] = CpsoltraslaPeer::REFTRA;
		}

	} 
	
	public function setFectra($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fectra] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fectra !== $ts) {
			$this->fectra = $ts;
			$this->modifiedColumns[] = CpsoltraslaPeer::FECTRA;
		}

	} 
	
	public function setAnotra($v)
	{

		if ($this->anotra !== $v) {
			$this->anotra = $v;
			$this->modifiedColumns[] = CpsoltraslaPeer::ANOTRA;
		}

	} 
	
	public function setPertra($v)
	{

		if ($this->pertra !== $v) {
			$this->pertra = $v;
			$this->modifiedColumns[] = CpsoltraslaPeer::PERTRA;
		}

	} 
	
	public function setDestra($v)
	{

		if ($this->destra !== $v) {
			$this->destra = $v;
			$this->modifiedColumns[] = CpsoltraslaPeer::DESTRA;
		}

	} 
	
	public function setDesanu($v)
	{

		if ($this->desanu !== $v) {
			$this->desanu = $v;
			$this->modifiedColumns[] = CpsoltraslaPeer::DESANU;
		}

	} 
	
	public function setTottra($v)
	{

		if ($this->tottra !== $v) {
			$this->tottra = $v;
			$this->modifiedColumns[] = CpsoltraslaPeer::TOTTRA;
		}

	} 
	
	public function setStatra($v)
	{

		if ($this->statra !== $v) {
			$this->statra = $v;
			$this->modifiedColumns[] = CpsoltraslaPeer::STATRA;
		}

	} 
	
	public function setCodart($v)
	{

		if ($this->codart !== $v) {
			$this->codart = $v;
			$this->modifiedColumns[] = CpsoltraslaPeer::CODART;
		}

	} 
	
	public function setStacon($v)
	{

		if ($this->stacon !== $v) {
			$this->stacon = $v;
			$this->modifiedColumns[] = CpsoltraslaPeer::STACON;
		}

	} 
	
	public function setStagob($v)
	{

		if ($this->stagob !== $v) {
			$this->stagob = $v;
			$this->modifiedColumns[] = CpsoltraslaPeer::STAGOB;
		}

	} 
	
	public function setStapre($v)
	{

		if ($this->stapre !== $v) {
			$this->stapre = $v;
			$this->modifiedColumns[] = CpsoltraslaPeer::STAPRE;
		}

	} 
	
	public function setFecpre($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecpre] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecpre !== $ts) {
			$this->fecpre = $ts;
			$this->modifiedColumns[] = CpsoltraslaPeer::FECPRE;
		}

	} 
	
	public function setDespre($v)
	{

		if ($this->despre !== $v) {
			$this->despre = $v;
			$this->modifiedColumns[] = CpsoltraslaPeer::DESPRE;
		}

	} 
	
	public function setFeccon($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [feccon] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->feccon !== $ts) {
			$this->feccon = $ts;
			$this->modifiedColumns[] = CpsoltraslaPeer::FECCON;
		}

	} 
	
	public function setDescon($v)
	{

		if ($this->descon !== $v) {
			$this->descon = $v;
			$this->modifiedColumns[] = CpsoltraslaPeer::DESCON;
		}

	} 
	
	public function setDesgob($v)
	{

		if ($this->desgob !== $v) {
			$this->desgob = $v;
			$this->modifiedColumns[] = CpsoltraslaPeer::DESGOB;
		}

	} 
	
	public function setFecgob($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecgob] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecgob !== $ts) {
			$this->fecgob = $ts;
			$this->modifiedColumns[] = CpsoltraslaPeer::FECGOB;
		}

	} 
	
	public function setJustificacion($v)
	{

		if ($this->justificacion !== $v) {
			$this->justificacion = $v;
			$this->modifiedColumns[] = CpsoltraslaPeer::JUSTIFICACION;
		}

	} 
	
	public function setFeccont($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [feccont] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->feccont !== $ts) {
			$this->feccont = $ts;
			$this->modifiedColumns[] = CpsoltraslaPeer::FECCONT;
		}

	} 
	
	public function setJustificacion1($v)
	{

		if ($this->justificacion1 !== $v) {
			$this->justificacion1 = $v;
			$this->modifiedColumns[] = CpsoltraslaPeer::JUSTIFICACION1;
		}

	} 
	
	public function setJustificacion2($v)
	{

		if ($this->justificacion2 !== $v) {
			$this->justificacion2 = $v;
			$this->modifiedColumns[] = CpsoltraslaPeer::JUSTIFICACION2;
		}

	} 
	
	public function setJustificacion3($v)
	{

		if ($this->justificacion3 !== $v) {
			$this->justificacion3 = $v;
			$this->modifiedColumns[] = CpsoltraslaPeer::JUSTIFICACION3;
		}

	} 
	
	public function setJustificacion4($v)
	{

		if ($this->justificacion4 !== $v) {
			$this->justificacion4 = $v;
			$this->modifiedColumns[] = CpsoltraslaPeer::JUSTIFICACION4;
		}

	} 
	
	public function setJustificacion5($v)
	{

		if ($this->justificacion5 !== $v) {
			$this->justificacion5 = $v;
			$this->modifiedColumns[] = CpsoltraslaPeer::JUSTIFICACION5;
		}

	} 
	
	public function setJustificacion6($v)
	{

		if ($this->justificacion6 !== $v) {
			$this->justificacion6 = $v;
			$this->modifiedColumns[] = CpsoltraslaPeer::JUSTIFICACION6;
		}

	} 
	
	public function setJustificacion7($v)
	{

		if ($this->justificacion7 !== $v) {
			$this->justificacion7 = $v;
			$this->modifiedColumns[] = CpsoltraslaPeer::JUSTIFICACION7;
		}

	} 
	
	public function setJustificacion8($v)
	{

		if ($this->justificacion8 !== $v) {
			$this->justificacion8 = $v;
			$this->modifiedColumns[] = CpsoltraslaPeer::JUSTIFICACION8;
		}

	} 
	
	public function setJustificacion9($v)
	{

		if ($this->justificacion9 !== $v) {
			$this->justificacion9 = $v;
			$this->modifiedColumns[] = CpsoltraslaPeer::JUSTIFICACION9;
		}

	} 
	
	public function setTipo($v)
	{

		if ($this->tipo !== $v) {
			$this->tipo = $v;
			$this->modifiedColumns[] = CpsoltraslaPeer::TIPO;
		}

	} 
	
	public function setTipgas($v)
	{

		if ($this->tipgas !== $v) {
			$this->tipgas = $v;
			$this->modifiedColumns[] = CpsoltraslaPeer::TIPGAS;
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
			$this->modifiedColumns[] = CpsoltraslaPeer::FECANU;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CpsoltraslaPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->reftra = $rs->getString($startcol + 0);

			$this->fectra = $rs->getDate($startcol + 1, null);

			$this->anotra = $rs->getString($startcol + 2);

			$this->pertra = $rs->getString($startcol + 3);

			$this->destra = $rs->getString($startcol + 4);

			$this->desanu = $rs->getString($startcol + 5);

			$this->tottra = $rs->getFloat($startcol + 6);

			$this->statra = $rs->getString($startcol + 7);

			$this->codart = $rs->getString($startcol + 8);

			$this->stacon = $rs->getString($startcol + 9);

			$this->stagob = $rs->getString($startcol + 10);

			$this->stapre = $rs->getString($startcol + 11);

			$this->fecpre = $rs->getDate($startcol + 12, null);

			$this->despre = $rs->getString($startcol + 13);

			$this->feccon = $rs->getDate($startcol + 14, null);

			$this->descon = $rs->getString($startcol + 15);

			$this->desgob = $rs->getString($startcol + 16);

			$this->fecgob = $rs->getDate($startcol + 17, null);

			$this->justificacion = $rs->getString($startcol + 18);

			$this->feccont = $rs->getDate($startcol + 19, null);

			$this->justificacion1 = $rs->getString($startcol + 20);

			$this->justificacion2 = $rs->getString($startcol + 21);

			$this->justificacion3 = $rs->getString($startcol + 22);

			$this->justificacion4 = $rs->getString($startcol + 23);

			$this->justificacion5 = $rs->getString($startcol + 24);

			$this->justificacion6 = $rs->getString($startcol + 25);

			$this->justificacion7 = $rs->getString($startcol + 26);

			$this->justificacion8 = $rs->getString($startcol + 27);

			$this->justificacion9 = $rs->getString($startcol + 28);

			$this->tipo = $rs->getString($startcol + 29);

			$this->tipgas = $rs->getString($startcol + 30);

			$this->fecanu = $rs->getDate($startcol + 31, null);

			$this->id = $rs->getInt($startcol + 32);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 33; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cpsoltrasla object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CpsoltraslaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpsoltraslaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpsoltraslaPeer::DATABASE_NAME);
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
					$pk = CpsoltraslaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CpsoltraslaPeer::doUpdate($this, $con);
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


			if (($retval = CpsoltraslaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpsoltraslaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getReftra();
				break;
			case 1:
				return $this->getFectra();
				break;
			case 2:
				return $this->getAnotra();
				break;
			case 3:
				return $this->getPertra();
				break;
			case 4:
				return $this->getDestra();
				break;
			case 5:
				return $this->getDesanu();
				break;
			case 6:
				return $this->getTottra();
				break;
			case 7:
				return $this->getStatra();
				break;
			case 8:
				return $this->getCodart();
				break;
			case 9:
				return $this->getStacon();
				break;
			case 10:
				return $this->getStagob();
				break;
			case 11:
				return $this->getStapre();
				break;
			case 12:
				return $this->getFecpre();
				break;
			case 13:
				return $this->getDespre();
				break;
			case 14:
				return $this->getFeccon();
				break;
			case 15:
				return $this->getDescon();
				break;
			case 16:
				return $this->getDesgob();
				break;
			case 17:
				return $this->getFecgob();
				break;
			case 18:
				return $this->getJustificacion();
				break;
			case 19:
				return $this->getFeccont();
				break;
			case 20:
				return $this->getJustificacion1();
				break;
			case 21:
				return $this->getJustificacion2();
				break;
			case 22:
				return $this->getJustificacion3();
				break;
			case 23:
				return $this->getJustificacion4();
				break;
			case 24:
				return $this->getJustificacion5();
				break;
			case 25:
				return $this->getJustificacion6();
				break;
			case 26:
				return $this->getJustificacion7();
				break;
			case 27:
				return $this->getJustificacion8();
				break;
			case 28:
				return $this->getJustificacion9();
				break;
			case 29:
				return $this->getTipo();
				break;
			case 30:
				return $this->getTipgas();
				break;
			case 31:
				return $this->getFecanu();
				break;
			case 32:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpsoltraslaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getReftra(),
			$keys[1] => $this->getFectra(),
			$keys[2] => $this->getAnotra(),
			$keys[3] => $this->getPertra(),
			$keys[4] => $this->getDestra(),
			$keys[5] => $this->getDesanu(),
			$keys[6] => $this->getTottra(),
			$keys[7] => $this->getStatra(),
			$keys[8] => $this->getCodart(),
			$keys[9] => $this->getStacon(),
			$keys[10] => $this->getStagob(),
			$keys[11] => $this->getStapre(),
			$keys[12] => $this->getFecpre(),
			$keys[13] => $this->getDespre(),
			$keys[14] => $this->getFeccon(),
			$keys[15] => $this->getDescon(),
			$keys[16] => $this->getDesgob(),
			$keys[17] => $this->getFecgob(),
			$keys[18] => $this->getJustificacion(),
			$keys[19] => $this->getFeccont(),
			$keys[20] => $this->getJustificacion1(),
			$keys[21] => $this->getJustificacion2(),
			$keys[22] => $this->getJustificacion3(),
			$keys[23] => $this->getJustificacion4(),
			$keys[24] => $this->getJustificacion5(),
			$keys[25] => $this->getJustificacion6(),
			$keys[26] => $this->getJustificacion7(),
			$keys[27] => $this->getJustificacion8(),
			$keys[28] => $this->getJustificacion9(),
			$keys[29] => $this->getTipo(),
			$keys[30] => $this->getTipgas(),
			$keys[31] => $this->getFecanu(),
			$keys[32] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpsoltraslaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setReftra($value);
				break;
			case 1:
				$this->setFectra($value);
				break;
			case 2:
				$this->setAnotra($value);
				break;
			case 3:
				$this->setPertra($value);
				break;
			case 4:
				$this->setDestra($value);
				break;
			case 5:
				$this->setDesanu($value);
				break;
			case 6:
				$this->setTottra($value);
				break;
			case 7:
				$this->setStatra($value);
				break;
			case 8:
				$this->setCodart($value);
				break;
			case 9:
				$this->setStacon($value);
				break;
			case 10:
				$this->setStagob($value);
				break;
			case 11:
				$this->setStapre($value);
				break;
			case 12:
				$this->setFecpre($value);
				break;
			case 13:
				$this->setDespre($value);
				break;
			case 14:
				$this->setFeccon($value);
				break;
			case 15:
				$this->setDescon($value);
				break;
			case 16:
				$this->setDesgob($value);
				break;
			case 17:
				$this->setFecgob($value);
				break;
			case 18:
				$this->setJustificacion($value);
				break;
			case 19:
				$this->setFeccont($value);
				break;
			case 20:
				$this->setJustificacion1($value);
				break;
			case 21:
				$this->setJustificacion2($value);
				break;
			case 22:
				$this->setJustificacion3($value);
				break;
			case 23:
				$this->setJustificacion4($value);
				break;
			case 24:
				$this->setJustificacion5($value);
				break;
			case 25:
				$this->setJustificacion6($value);
				break;
			case 26:
				$this->setJustificacion7($value);
				break;
			case 27:
				$this->setJustificacion8($value);
				break;
			case 28:
				$this->setJustificacion9($value);
				break;
			case 29:
				$this->setTipo($value);
				break;
			case 30:
				$this->setTipgas($value);
				break;
			case 31:
				$this->setFecanu($value);
				break;
			case 32:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpsoltraslaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setReftra($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFectra($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAnotra($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPertra($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDestra($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDesanu($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTottra($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setStatra($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodart($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setStacon($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setStagob($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setStapre($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFecpre($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setDespre($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setFeccon($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setDescon($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setDesgob($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setFecgob($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setJustificacion($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setFeccont($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setJustificacion1($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setJustificacion2($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setJustificacion3($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setJustificacion4($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setJustificacion5($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setJustificacion6($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setJustificacion7($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setJustificacion8($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setJustificacion9($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setTipo($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setTipgas($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setFecanu($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setId($arr[$keys[32]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpsoltraslaPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpsoltraslaPeer::REFTRA)) $criteria->add(CpsoltraslaPeer::REFTRA, $this->reftra);
		if ($this->isColumnModified(CpsoltraslaPeer::FECTRA)) $criteria->add(CpsoltraslaPeer::FECTRA, $this->fectra);
		if ($this->isColumnModified(CpsoltraslaPeer::ANOTRA)) $criteria->add(CpsoltraslaPeer::ANOTRA, $this->anotra);
		if ($this->isColumnModified(CpsoltraslaPeer::PERTRA)) $criteria->add(CpsoltraslaPeer::PERTRA, $this->pertra);
		if ($this->isColumnModified(CpsoltraslaPeer::DESTRA)) $criteria->add(CpsoltraslaPeer::DESTRA, $this->destra);
		if ($this->isColumnModified(CpsoltraslaPeer::DESANU)) $criteria->add(CpsoltraslaPeer::DESANU, $this->desanu);
		if ($this->isColumnModified(CpsoltraslaPeer::TOTTRA)) $criteria->add(CpsoltraslaPeer::TOTTRA, $this->tottra);
		if ($this->isColumnModified(CpsoltraslaPeer::STATRA)) $criteria->add(CpsoltraslaPeer::STATRA, $this->statra);
		if ($this->isColumnModified(CpsoltraslaPeer::CODART)) $criteria->add(CpsoltraslaPeer::CODART, $this->codart);
		if ($this->isColumnModified(CpsoltraslaPeer::STACON)) $criteria->add(CpsoltraslaPeer::STACON, $this->stacon);
		if ($this->isColumnModified(CpsoltraslaPeer::STAGOB)) $criteria->add(CpsoltraslaPeer::STAGOB, $this->stagob);
		if ($this->isColumnModified(CpsoltraslaPeer::STAPRE)) $criteria->add(CpsoltraslaPeer::STAPRE, $this->stapre);
		if ($this->isColumnModified(CpsoltraslaPeer::FECPRE)) $criteria->add(CpsoltraslaPeer::FECPRE, $this->fecpre);
		if ($this->isColumnModified(CpsoltraslaPeer::DESPRE)) $criteria->add(CpsoltraslaPeer::DESPRE, $this->despre);
		if ($this->isColumnModified(CpsoltraslaPeer::FECCON)) $criteria->add(CpsoltraslaPeer::FECCON, $this->feccon);
		if ($this->isColumnModified(CpsoltraslaPeer::DESCON)) $criteria->add(CpsoltraslaPeer::DESCON, $this->descon);
		if ($this->isColumnModified(CpsoltraslaPeer::DESGOB)) $criteria->add(CpsoltraslaPeer::DESGOB, $this->desgob);
		if ($this->isColumnModified(CpsoltraslaPeer::FECGOB)) $criteria->add(CpsoltraslaPeer::FECGOB, $this->fecgob);
		if ($this->isColumnModified(CpsoltraslaPeer::JUSTIFICACION)) $criteria->add(CpsoltraslaPeer::JUSTIFICACION, $this->justificacion);
		if ($this->isColumnModified(CpsoltraslaPeer::FECCONT)) $criteria->add(CpsoltraslaPeer::FECCONT, $this->feccont);
		if ($this->isColumnModified(CpsoltraslaPeer::JUSTIFICACION1)) $criteria->add(CpsoltraslaPeer::JUSTIFICACION1, $this->justificacion1);
		if ($this->isColumnModified(CpsoltraslaPeer::JUSTIFICACION2)) $criteria->add(CpsoltraslaPeer::JUSTIFICACION2, $this->justificacion2);
		if ($this->isColumnModified(CpsoltraslaPeer::JUSTIFICACION3)) $criteria->add(CpsoltraslaPeer::JUSTIFICACION3, $this->justificacion3);
		if ($this->isColumnModified(CpsoltraslaPeer::JUSTIFICACION4)) $criteria->add(CpsoltraslaPeer::JUSTIFICACION4, $this->justificacion4);
		if ($this->isColumnModified(CpsoltraslaPeer::JUSTIFICACION5)) $criteria->add(CpsoltraslaPeer::JUSTIFICACION5, $this->justificacion5);
		if ($this->isColumnModified(CpsoltraslaPeer::JUSTIFICACION6)) $criteria->add(CpsoltraslaPeer::JUSTIFICACION6, $this->justificacion6);
		if ($this->isColumnModified(CpsoltraslaPeer::JUSTIFICACION7)) $criteria->add(CpsoltraslaPeer::JUSTIFICACION7, $this->justificacion7);
		if ($this->isColumnModified(CpsoltraslaPeer::JUSTIFICACION8)) $criteria->add(CpsoltraslaPeer::JUSTIFICACION8, $this->justificacion8);
		if ($this->isColumnModified(CpsoltraslaPeer::JUSTIFICACION9)) $criteria->add(CpsoltraslaPeer::JUSTIFICACION9, $this->justificacion9);
		if ($this->isColumnModified(CpsoltraslaPeer::TIPO)) $criteria->add(CpsoltraslaPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(CpsoltraslaPeer::TIPGAS)) $criteria->add(CpsoltraslaPeer::TIPGAS, $this->tipgas);
		if ($this->isColumnModified(CpsoltraslaPeer::FECANU)) $criteria->add(CpsoltraslaPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(CpsoltraslaPeer::ID)) $criteria->add(CpsoltraslaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpsoltraslaPeer::DATABASE_NAME);

		$criteria->add(CpsoltraslaPeer::ID, $this->id);

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

		$copyObj->setReftra($this->reftra);

		$copyObj->setFectra($this->fectra);

		$copyObj->setAnotra($this->anotra);

		$copyObj->setPertra($this->pertra);

		$copyObj->setDestra($this->destra);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setTottra($this->tottra);

		$copyObj->setStatra($this->statra);

		$copyObj->setCodart($this->codart);

		$copyObj->setStacon($this->stacon);

		$copyObj->setStagob($this->stagob);

		$copyObj->setStapre($this->stapre);

		$copyObj->setFecpre($this->fecpre);

		$copyObj->setDespre($this->despre);

		$copyObj->setFeccon($this->feccon);

		$copyObj->setDescon($this->descon);

		$copyObj->setDesgob($this->desgob);

		$copyObj->setFecgob($this->fecgob);

		$copyObj->setJustificacion($this->justificacion);

		$copyObj->setFeccont($this->feccont);

		$copyObj->setJustificacion1($this->justificacion1);

		$copyObj->setJustificacion2($this->justificacion2);

		$copyObj->setJustificacion3($this->justificacion3);

		$copyObj->setJustificacion4($this->justificacion4);

		$copyObj->setJustificacion5($this->justificacion5);

		$copyObj->setJustificacion6($this->justificacion6);

		$copyObj->setJustificacion7($this->justificacion7);

		$copyObj->setJustificacion8($this->justificacion8);

		$copyObj->setJustificacion9($this->justificacion9);

		$copyObj->setTipo($this->tipo);

		$copyObj->setTipgas($this->tipgas);

		$copyObj->setFecanu($this->fecanu);


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
			self::$peer = new CpsoltraslaPeer();
		}
		return self::$peer;
	}

} 