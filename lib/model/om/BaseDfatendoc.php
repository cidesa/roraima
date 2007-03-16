<?php


abstract class BaseDfatendoc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codigo;


	
	protected $loguse;


	
	protected $estado;


	
	protected $fecrec;


	
	protected $horrec;


	
	protected $fecate;


	
	protected $horate;


	
	protected $numuni;


	
	protected $numuniori;


	
	protected $obsdoc;


	
	protected $staate;


	
	protected $tabla;


	
	protected $anuate;


	
	protected $chkuni1 = '0';


	
	protected $chkuni2 = '0';


	
	protected $chkuni3 = '0';


	
	protected $chkuni4 = '0';


	
	protected $chkuni5 = '0';


	
	protected $chkuni6 = '0';


	
	protected $chkuni7 = '0';


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodigo()
	{

		return $this->codigo;
	}

	
	public function getLoguse()
	{

		return $this->loguse;
	}

	
	public function getEstado()
	{

		return $this->estado;
	}

	
	public function getFecrec($format = 'Y-m-d')
	{

		if ($this->fecrec === null || $this->fecrec === '') {
			return null;
		} elseif (!is_int($this->fecrec)) {
						$ts = strtotime($this->fecrec);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecrec] as date/time value: " . var_export($this->fecrec, true));
			}
		} else {
			$ts = $this->fecrec;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getHorrec($format = 'Y-m-d')
	{

		if ($this->horrec === null || $this->horrec === '') {
			return null;
		} elseif (!is_int($this->horrec)) {
						$ts = strtotime($this->horrec);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [horrec] as date/time value: " . var_export($this->horrec, true));
			}
		} else {
			$ts = $this->horrec;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecate($format = 'Y-m-d')
	{

		if ($this->fecate === null || $this->fecate === '') {
			return null;
		} elseif (!is_int($this->fecate)) {
						$ts = strtotime($this->fecate);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecate] as date/time value: " . var_export($this->fecate, true));
			}
		} else {
			$ts = $this->fecate;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getHorate($format = 'Y-m-d')
	{

		if ($this->horate === null || $this->horate === '') {
			return null;
		} elseif (!is_int($this->horate)) {
						$ts = strtotime($this->horate);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [horate] as date/time value: " . var_export($this->horate, true));
			}
		} else {
			$ts = $this->horate;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getNumuni()
	{

		return $this->numuni;
	}

	
	public function getNumuniori()
	{

		return $this->numuniori;
	}

	
	public function getObsdoc()
	{

		return $this->obsdoc;
	}

	
	public function getStaate()
	{

		return $this->staate;
	}

	
	public function getTabla()
	{

		return $this->tabla;
	}

	
	public function getAnuate()
	{

		return $this->anuate;
	}

	
	public function getChkuni1()
	{

		return $this->chkuni1;
	}

	
	public function getChkuni2()
	{

		return $this->chkuni2;
	}

	
	public function getChkuni3()
	{

		return $this->chkuni3;
	}

	
	public function getChkuni4()
	{

		return $this->chkuni4;
	}

	
	public function getChkuni5()
	{

		return $this->chkuni5;
	}

	
	public function getChkuni6()
	{

		return $this->chkuni6;
	}

	
	public function getChkuni7()
	{

		return $this->chkuni7;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodigo($v)
	{

		if ($this->codigo !== $v) {
			$this->codigo = $v;
			$this->modifiedColumns[] = DfatendocPeer::CODIGO;
		}

	} 
	
	public function setLoguse($v)
	{

		if ($this->loguse !== $v) {
			$this->loguse = $v;
			$this->modifiedColumns[] = DfatendocPeer::LOGUSE;
		}

	} 
	
	public function setEstado($v)
	{

		if ($this->estado !== $v) {
			$this->estado = $v;
			$this->modifiedColumns[] = DfatendocPeer::ESTADO;
		}

	} 
	
	public function setFecrec($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecrec] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecrec !== $ts) {
			$this->fecrec = $ts;
			$this->modifiedColumns[] = DfatendocPeer::FECREC;
		}

	} 
	
	public function setHorrec($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [horrec] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->horrec !== $ts) {
			$this->horrec = $ts;
			$this->modifiedColumns[] = DfatendocPeer::HORREC;
		}

	} 
	
	public function setFecate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecate] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecate !== $ts) {
			$this->fecate = $ts;
			$this->modifiedColumns[] = DfatendocPeer::FECATE;
		}

	} 
	
	public function setHorate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [horate] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->horate !== $ts) {
			$this->horate = $ts;
			$this->modifiedColumns[] = DfatendocPeer::HORATE;
		}

	} 
	
	public function setNumuni($v)
	{

		if ($this->numuni !== $v) {
			$this->numuni = $v;
			$this->modifiedColumns[] = DfatendocPeer::NUMUNI;
		}

	} 
	
	public function setNumuniori($v)
	{

		if ($this->numuniori !== $v) {
			$this->numuniori = $v;
			$this->modifiedColumns[] = DfatendocPeer::NUMUNIORI;
		}

	} 
	
	public function setObsdoc($v)
	{

		if ($this->obsdoc !== $v) {
			$this->obsdoc = $v;
			$this->modifiedColumns[] = DfatendocPeer::OBSDOC;
		}

	} 
	
	public function setStaate($v)
	{

		if ($this->staate !== $v) {
			$this->staate = $v;
			$this->modifiedColumns[] = DfatendocPeer::STAATE;
		}

	} 
	
	public function setTabla($v)
	{

		if ($this->tabla !== $v) {
			$this->tabla = $v;
			$this->modifiedColumns[] = DfatendocPeer::TABLA;
		}

	} 
	
	public function setAnuate($v)
	{

		if ($this->anuate !== $v) {
			$this->anuate = $v;
			$this->modifiedColumns[] = DfatendocPeer::ANUATE;
		}

	} 
	
	public function setChkuni1($v)
	{

		if ($this->chkuni1 !== $v || $v === '0') {
			$this->chkuni1 = $v;
			$this->modifiedColumns[] = DfatendocPeer::CHKUNI1;
		}

	} 
	
	public function setChkuni2($v)
	{

		if ($this->chkuni2 !== $v || $v === '0') {
			$this->chkuni2 = $v;
			$this->modifiedColumns[] = DfatendocPeer::CHKUNI2;
		}

	} 
	
	public function setChkuni3($v)
	{

		if ($this->chkuni3 !== $v || $v === '0') {
			$this->chkuni3 = $v;
			$this->modifiedColumns[] = DfatendocPeer::CHKUNI3;
		}

	} 
	
	public function setChkuni4($v)
	{

		if ($this->chkuni4 !== $v || $v === '0') {
			$this->chkuni4 = $v;
			$this->modifiedColumns[] = DfatendocPeer::CHKUNI4;
		}

	} 
	
	public function setChkuni5($v)
	{

		if ($this->chkuni5 !== $v || $v === '0') {
			$this->chkuni5 = $v;
			$this->modifiedColumns[] = DfatendocPeer::CHKUNI5;
		}

	} 
	
	public function setChkuni6($v)
	{

		if ($this->chkuni6 !== $v || $v === '0') {
			$this->chkuni6 = $v;
			$this->modifiedColumns[] = DfatendocPeer::CHKUNI6;
		}

	} 
	
	public function setChkuni7($v)
	{

		if ($this->chkuni7 !== $v || $v === '0') {
			$this->chkuni7 = $v;
			$this->modifiedColumns[] = DfatendocPeer::CHKUNI7;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = DfatendocPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codigo = $rs->getString($startcol + 0);

			$this->loguse = $rs->getString($startcol + 1);

			$this->estado = $rs->getString($startcol + 2);

			$this->fecrec = $rs->getDate($startcol + 3, null);

			$this->horrec = $rs->getDate($startcol + 4, null);

			$this->fecate = $rs->getDate($startcol + 5, null);

			$this->horate = $rs->getDate($startcol + 6, null);

			$this->numuni = $rs->getString($startcol + 7);

			$this->numuniori = $rs->getString($startcol + 8);

			$this->obsdoc = $rs->getString($startcol + 9);

			$this->staate = $rs->getString($startcol + 10);

			$this->tabla = $rs->getString($startcol + 11);

			$this->anuate = $rs->getString($startcol + 12);

			$this->chkuni1 = $rs->getString($startcol + 13);

			$this->chkuni2 = $rs->getString($startcol + 14);

			$this->chkuni3 = $rs->getString($startcol + 15);

			$this->chkuni4 = $rs->getString($startcol + 16);

			$this->chkuni5 = $rs->getString($startcol + 17);

			$this->chkuni6 = $rs->getString($startcol + 18);

			$this->chkuni7 = $rs->getString($startcol + 19);

			$this->id = $rs->getInt($startcol + 20);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 21; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Dfatendoc object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DfatendocPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			DfatendocPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(DfatendocPeer::DATABASE_NAME);
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
					$pk = DfatendocPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += DfatendocPeer::doUpdate($this, $con);
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


			if (($retval = DfatendocPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DfatendocPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodigo();
				break;
			case 1:
				return $this->getLoguse();
				break;
			case 2:
				return $this->getEstado();
				break;
			case 3:
				return $this->getFecrec();
				break;
			case 4:
				return $this->getHorrec();
				break;
			case 5:
				return $this->getFecate();
				break;
			case 6:
				return $this->getHorate();
				break;
			case 7:
				return $this->getNumuni();
				break;
			case 8:
				return $this->getNumuniori();
				break;
			case 9:
				return $this->getObsdoc();
				break;
			case 10:
				return $this->getStaate();
				break;
			case 11:
				return $this->getTabla();
				break;
			case 12:
				return $this->getAnuate();
				break;
			case 13:
				return $this->getChkuni1();
				break;
			case 14:
				return $this->getChkuni2();
				break;
			case 15:
				return $this->getChkuni3();
				break;
			case 16:
				return $this->getChkuni4();
				break;
			case 17:
				return $this->getChkuni5();
				break;
			case 18:
				return $this->getChkuni6();
				break;
			case 19:
				return $this->getChkuni7();
				break;
			case 20:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DfatendocPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodigo(),
			$keys[1] => $this->getLoguse(),
			$keys[2] => $this->getEstado(),
			$keys[3] => $this->getFecrec(),
			$keys[4] => $this->getHorrec(),
			$keys[5] => $this->getFecate(),
			$keys[6] => $this->getHorate(),
			$keys[7] => $this->getNumuni(),
			$keys[8] => $this->getNumuniori(),
			$keys[9] => $this->getObsdoc(),
			$keys[10] => $this->getStaate(),
			$keys[11] => $this->getTabla(),
			$keys[12] => $this->getAnuate(),
			$keys[13] => $this->getChkuni1(),
			$keys[14] => $this->getChkuni2(),
			$keys[15] => $this->getChkuni3(),
			$keys[16] => $this->getChkuni4(),
			$keys[17] => $this->getChkuni5(),
			$keys[18] => $this->getChkuni6(),
			$keys[19] => $this->getChkuni7(),
			$keys[20] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DfatendocPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodigo($value);
				break;
			case 1:
				$this->setLoguse($value);
				break;
			case 2:
				$this->setEstado($value);
				break;
			case 3:
				$this->setFecrec($value);
				break;
			case 4:
				$this->setHorrec($value);
				break;
			case 5:
				$this->setFecate($value);
				break;
			case 6:
				$this->setHorate($value);
				break;
			case 7:
				$this->setNumuni($value);
				break;
			case 8:
				$this->setNumuniori($value);
				break;
			case 9:
				$this->setObsdoc($value);
				break;
			case 10:
				$this->setStaate($value);
				break;
			case 11:
				$this->setTabla($value);
				break;
			case 12:
				$this->setAnuate($value);
				break;
			case 13:
				$this->setChkuni1($value);
				break;
			case 14:
				$this->setChkuni2($value);
				break;
			case 15:
				$this->setChkuni3($value);
				break;
			case 16:
				$this->setChkuni4($value);
				break;
			case 17:
				$this->setChkuni5($value);
				break;
			case 18:
				$this->setChkuni6($value);
				break;
			case 19:
				$this->setChkuni7($value);
				break;
			case 20:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DfatendocPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodigo($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setLoguse($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setEstado($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecrec($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setHorrec($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecate($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setHorate($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNumuni($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNumuniori($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setObsdoc($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setStaate($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setTabla($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setAnuate($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setChkuni1($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setChkuni2($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setChkuni3($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setChkuni4($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setChkuni5($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setChkuni6($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setChkuni7($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setId($arr[$keys[20]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DfatendocPeer::DATABASE_NAME);

		if ($this->isColumnModified(DfatendocPeer::CODIGO)) $criteria->add(DfatendocPeer::CODIGO, $this->codigo);
		if ($this->isColumnModified(DfatendocPeer::LOGUSE)) $criteria->add(DfatendocPeer::LOGUSE, $this->loguse);
		if ($this->isColumnModified(DfatendocPeer::ESTADO)) $criteria->add(DfatendocPeer::ESTADO, $this->estado);
		if ($this->isColumnModified(DfatendocPeer::FECREC)) $criteria->add(DfatendocPeer::FECREC, $this->fecrec);
		if ($this->isColumnModified(DfatendocPeer::HORREC)) $criteria->add(DfatendocPeer::HORREC, $this->horrec);
		if ($this->isColumnModified(DfatendocPeer::FECATE)) $criteria->add(DfatendocPeer::FECATE, $this->fecate);
		if ($this->isColumnModified(DfatendocPeer::HORATE)) $criteria->add(DfatendocPeer::HORATE, $this->horate);
		if ($this->isColumnModified(DfatendocPeer::NUMUNI)) $criteria->add(DfatendocPeer::NUMUNI, $this->numuni);
		if ($this->isColumnModified(DfatendocPeer::NUMUNIORI)) $criteria->add(DfatendocPeer::NUMUNIORI, $this->numuniori);
		if ($this->isColumnModified(DfatendocPeer::OBSDOC)) $criteria->add(DfatendocPeer::OBSDOC, $this->obsdoc);
		if ($this->isColumnModified(DfatendocPeer::STAATE)) $criteria->add(DfatendocPeer::STAATE, $this->staate);
		if ($this->isColumnModified(DfatendocPeer::TABLA)) $criteria->add(DfatendocPeer::TABLA, $this->tabla);
		if ($this->isColumnModified(DfatendocPeer::ANUATE)) $criteria->add(DfatendocPeer::ANUATE, $this->anuate);
		if ($this->isColumnModified(DfatendocPeer::CHKUNI1)) $criteria->add(DfatendocPeer::CHKUNI1, $this->chkuni1);
		if ($this->isColumnModified(DfatendocPeer::CHKUNI2)) $criteria->add(DfatendocPeer::CHKUNI2, $this->chkuni2);
		if ($this->isColumnModified(DfatendocPeer::CHKUNI3)) $criteria->add(DfatendocPeer::CHKUNI3, $this->chkuni3);
		if ($this->isColumnModified(DfatendocPeer::CHKUNI4)) $criteria->add(DfatendocPeer::CHKUNI4, $this->chkuni4);
		if ($this->isColumnModified(DfatendocPeer::CHKUNI5)) $criteria->add(DfatendocPeer::CHKUNI5, $this->chkuni5);
		if ($this->isColumnModified(DfatendocPeer::CHKUNI6)) $criteria->add(DfatendocPeer::CHKUNI6, $this->chkuni6);
		if ($this->isColumnModified(DfatendocPeer::CHKUNI7)) $criteria->add(DfatendocPeer::CHKUNI7, $this->chkuni7);
		if ($this->isColumnModified(DfatendocPeer::ID)) $criteria->add(DfatendocPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DfatendocPeer::DATABASE_NAME);

		$criteria->add(DfatendocPeer::ID, $this->id);

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

		$copyObj->setCodigo($this->codigo);

		$copyObj->setLoguse($this->loguse);

		$copyObj->setEstado($this->estado);

		$copyObj->setFecrec($this->fecrec);

		$copyObj->setHorrec($this->horrec);

		$copyObj->setFecate($this->fecate);

		$copyObj->setHorate($this->horate);

		$copyObj->setNumuni($this->numuni);

		$copyObj->setNumuniori($this->numuniori);

		$copyObj->setObsdoc($this->obsdoc);

		$copyObj->setStaate($this->staate);

		$copyObj->setTabla($this->tabla);

		$copyObj->setAnuate($this->anuate);

		$copyObj->setChkuni1($this->chkuni1);

		$copyObj->setChkuni2($this->chkuni2);

		$copyObj->setChkuni3($this->chkuni3);

		$copyObj->setChkuni4($this->chkuni4);

		$copyObj->setChkuni5($this->chkuni5);

		$copyObj->setChkuni6($this->chkuni6);

		$copyObj->setChkuni7($this->chkuni7);


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
			self::$peer = new DfatendocPeer();
		}
		return self::$peer;
	}

} 