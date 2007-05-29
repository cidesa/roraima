<?php


abstract class BaseFcdeclar2 extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numdec;


	
	protected $fecven;


	
	protected $fueing;


	
	protected $fecdec;


	
	protected $rifcon;


	
	protected $tipo;


	
	protected $numref;


	
	protected $nombre;


	
	protected $mondec;


	
	protected $edodec;


	
	protected $mora;


	
	protected $prontopg;


	
	protected $autliq;


	
	protected $fundec;


	
	protected $codrec;


	
	protected $modo;


	
	protected $numero;


	
	protected $conpag;


	
	protected $monabo;


	
	protected $numabo;


	
	protected $nomcon;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNumdec()
	{

		return $this->numdec; 		
	}
	
	public function getFecven($format = 'Y-m-d')
	{

		if ($this->fecven === null || $this->fecven === '') {
			return null;
		} elseif (!is_int($this->fecven)) {
						$ts = strtotime($this->fecven);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecven] as date/time value: " . var_export($this->fecven, true));
			}
		} else {
			$ts = $this->fecven;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFueing()
	{

		return $this->fueing; 		
	}
	
	public function getFecdec($format = 'Y-m-d')
	{

		if ($this->fecdec === null || $this->fecdec === '') {
			return null;
		} elseif (!is_int($this->fecdec)) {
						$ts = strtotime($this->fecdec);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecdec] as date/time value: " . var_export($this->fecdec, true));
			}
		} else {
			$ts = $this->fecdec;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getRifcon()
	{

		return $this->rifcon; 		
	}
	
	public function getTipo()
	{

		return $this->tipo; 		
	}
	
	public function getNumref()
	{

		return $this->numref; 		
	}
	
	public function getNombre()
	{

		return $this->nombre; 		
	}
	
	public function getMondec()
	{

		return number_format($this->mondec,2,',','.');
		
	}
	
	public function getEdodec()
	{

		return $this->edodec; 		
	}
	
	public function getMora()
	{

		return number_format($this->mora,2,',','.');
		
	}
	
	public function getProntopg()
	{

		return number_format($this->prontopg,2,',','.');
		
	}
	
	public function getAutliq()
	{

		return number_format($this->autliq,2,',','.');
		
	}
	
	public function getFundec()
	{

		return $this->fundec; 		
	}
	
	public function getCodrec()
	{

		return $this->codrec; 		
	}
	
	public function getModo()
	{

		return $this->modo; 		
	}
	
	public function getNumero()
	{

		return $this->numero; 		
	}
	
	public function getConpag()
	{

		return $this->conpag; 		
	}
	
	public function getMonabo()
	{

		return number_format($this->monabo,2,',','.');
		
	}
	
	public function getNumabo()
	{

		return $this->numabo; 		
	}
	
	public function getNomcon()
	{

		return $this->nomcon; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setNumdec($v)
	{

		if ($this->numdec !== $v) {
			$this->numdec = $v;
			$this->modifiedColumns[] = Fcdeclar2Peer::NUMDEC;
		}

	} 
	
	public function setFecven($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecven] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecven !== $ts) {
			$this->fecven = $ts;
			$this->modifiedColumns[] = Fcdeclar2Peer::FECVEN;
		}

	} 
	
	public function setFueing($v)
	{

		if ($this->fueing !== $v) {
			$this->fueing = $v;
			$this->modifiedColumns[] = Fcdeclar2Peer::FUEING;
		}

	} 
	
	public function setFecdec($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecdec] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecdec !== $ts) {
			$this->fecdec = $ts;
			$this->modifiedColumns[] = Fcdeclar2Peer::FECDEC;
		}

	} 
	
	public function setRifcon($v)
	{

		if ($this->rifcon !== $v) {
			$this->rifcon = $v;
			$this->modifiedColumns[] = Fcdeclar2Peer::RIFCON;
		}

	} 
	
	public function setTipo($v)
	{

		if ($this->tipo !== $v) {
			$this->tipo = $v;
			$this->modifiedColumns[] = Fcdeclar2Peer::TIPO;
		}

	} 
	
	public function setNumref($v)
	{

		if ($this->numref !== $v) {
			$this->numref = $v;
			$this->modifiedColumns[] = Fcdeclar2Peer::NUMREF;
		}

	} 
	
	public function setNombre($v)
	{

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = Fcdeclar2Peer::NOMBRE;
		}

	} 
	
	public function setMondec($v)
	{

		if ($this->mondec !== $v) {
			$this->mondec = $v;
			$this->modifiedColumns[] = Fcdeclar2Peer::MONDEC;
		}

	} 
	
	public function setEdodec($v)
	{

		if ($this->edodec !== $v) {
			$this->edodec = $v;
			$this->modifiedColumns[] = Fcdeclar2Peer::EDODEC;
		}

	} 
	
	public function setMora($v)
	{

		if ($this->mora !== $v) {
			$this->mora = $v;
			$this->modifiedColumns[] = Fcdeclar2Peer::MORA;
		}

	} 
	
	public function setProntopg($v)
	{

		if ($this->prontopg !== $v) {
			$this->prontopg = $v;
			$this->modifiedColumns[] = Fcdeclar2Peer::PRONTOPG;
		}

	} 
	
	public function setAutliq($v)
	{

		if ($this->autliq !== $v) {
			$this->autliq = $v;
			$this->modifiedColumns[] = Fcdeclar2Peer::AUTLIQ;
		}

	} 
	
	public function setFundec($v)
	{

		if ($this->fundec !== $v) {
			$this->fundec = $v;
			$this->modifiedColumns[] = Fcdeclar2Peer::FUNDEC;
		}

	} 
	
	public function setCodrec($v)
	{

		if ($this->codrec !== $v) {
			$this->codrec = $v;
			$this->modifiedColumns[] = Fcdeclar2Peer::CODREC;
		}

	} 
	
	public function setModo($v)
	{

		if ($this->modo !== $v) {
			$this->modo = $v;
			$this->modifiedColumns[] = Fcdeclar2Peer::MODO;
		}

	} 
	
	public function setNumero($v)
	{

		if ($this->numero !== $v) {
			$this->numero = $v;
			$this->modifiedColumns[] = Fcdeclar2Peer::NUMERO;
		}

	} 
	
	public function setConpag($v)
	{

		if ($this->conpag !== $v) {
			$this->conpag = $v;
			$this->modifiedColumns[] = Fcdeclar2Peer::CONPAG;
		}

	} 
	
	public function setMonabo($v)
	{

		if ($this->monabo !== $v) {
			$this->monabo = $v;
			$this->modifiedColumns[] = Fcdeclar2Peer::MONABO;
		}

	} 
	
	public function setNumabo($v)
	{

		if ($this->numabo !== $v) {
			$this->numabo = $v;
			$this->modifiedColumns[] = Fcdeclar2Peer::NUMABO;
		}

	} 
	
	public function setNomcon($v)
	{

		if ($this->nomcon !== $v) {
			$this->nomcon = $v;
			$this->modifiedColumns[] = Fcdeclar2Peer::NOMCON;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = Fcdeclar2Peer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->numdec = $rs->getString($startcol + 0);

			$this->fecven = $rs->getDate($startcol + 1, null);

			$this->fueing = $rs->getString($startcol + 2);

			$this->fecdec = $rs->getDate($startcol + 3, null);

			$this->rifcon = $rs->getString($startcol + 4);

			$this->tipo = $rs->getString($startcol + 5);

			$this->numref = $rs->getString($startcol + 6);

			$this->nombre = $rs->getString($startcol + 7);

			$this->mondec = $rs->getFloat($startcol + 8);

			$this->edodec = $rs->getString($startcol + 9);

			$this->mora = $rs->getFloat($startcol + 10);

			$this->prontopg = $rs->getFloat($startcol + 11);

			$this->autliq = $rs->getFloat($startcol + 12);

			$this->fundec = $rs->getString($startcol + 13);

			$this->codrec = $rs->getString($startcol + 14);

			$this->modo = $rs->getString($startcol + 15);

			$this->numero = $rs->getString($startcol + 16);

			$this->conpag = $rs->getString($startcol + 17);

			$this->monabo = $rs->getFloat($startcol + 18);

			$this->numabo = $rs->getString($startcol + 19);

			$this->nomcon = $rs->getString($startcol + 20);

			$this->id = $rs->getInt($startcol + 21);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 22; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcdeclar2 object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(Fcdeclar2Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			Fcdeclar2Peer::doDelete($this, $con);
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
			$con = Propel::getConnection(Fcdeclar2Peer::DATABASE_NAME);
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
					$pk = Fcdeclar2Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += Fcdeclar2Peer::doUpdate($this, $con);
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


			if (($retval = Fcdeclar2Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Fcdeclar2Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumdec();
				break;
			case 1:
				return $this->getFecven();
				break;
			case 2:
				return $this->getFueing();
				break;
			case 3:
				return $this->getFecdec();
				break;
			case 4:
				return $this->getRifcon();
				break;
			case 5:
				return $this->getTipo();
				break;
			case 6:
				return $this->getNumref();
				break;
			case 7:
				return $this->getNombre();
				break;
			case 8:
				return $this->getMondec();
				break;
			case 9:
				return $this->getEdodec();
				break;
			case 10:
				return $this->getMora();
				break;
			case 11:
				return $this->getProntopg();
				break;
			case 12:
				return $this->getAutliq();
				break;
			case 13:
				return $this->getFundec();
				break;
			case 14:
				return $this->getCodrec();
				break;
			case 15:
				return $this->getModo();
				break;
			case 16:
				return $this->getNumero();
				break;
			case 17:
				return $this->getConpag();
				break;
			case 18:
				return $this->getMonabo();
				break;
			case 19:
				return $this->getNumabo();
				break;
			case 20:
				return $this->getNomcon();
				break;
			case 21:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Fcdeclar2Peer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumdec(),
			$keys[1] => $this->getFecven(),
			$keys[2] => $this->getFueing(),
			$keys[3] => $this->getFecdec(),
			$keys[4] => $this->getRifcon(),
			$keys[5] => $this->getTipo(),
			$keys[6] => $this->getNumref(),
			$keys[7] => $this->getNombre(),
			$keys[8] => $this->getMondec(),
			$keys[9] => $this->getEdodec(),
			$keys[10] => $this->getMora(),
			$keys[11] => $this->getProntopg(),
			$keys[12] => $this->getAutliq(),
			$keys[13] => $this->getFundec(),
			$keys[14] => $this->getCodrec(),
			$keys[15] => $this->getModo(),
			$keys[16] => $this->getNumero(),
			$keys[17] => $this->getConpag(),
			$keys[18] => $this->getMonabo(),
			$keys[19] => $this->getNumabo(),
			$keys[20] => $this->getNomcon(),
			$keys[21] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Fcdeclar2Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumdec($value);
				break;
			case 1:
				$this->setFecven($value);
				break;
			case 2:
				$this->setFueing($value);
				break;
			case 3:
				$this->setFecdec($value);
				break;
			case 4:
				$this->setRifcon($value);
				break;
			case 5:
				$this->setTipo($value);
				break;
			case 6:
				$this->setNumref($value);
				break;
			case 7:
				$this->setNombre($value);
				break;
			case 8:
				$this->setMondec($value);
				break;
			case 9:
				$this->setEdodec($value);
				break;
			case 10:
				$this->setMora($value);
				break;
			case 11:
				$this->setProntopg($value);
				break;
			case 12:
				$this->setAutliq($value);
				break;
			case 13:
				$this->setFundec($value);
				break;
			case 14:
				$this->setCodrec($value);
				break;
			case 15:
				$this->setModo($value);
				break;
			case 16:
				$this->setNumero($value);
				break;
			case 17:
				$this->setConpag($value);
				break;
			case 18:
				$this->setMonabo($value);
				break;
			case 19:
				$this->setNumabo($value);
				break;
			case 20:
				$this->setNomcon($value);
				break;
			case 21:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Fcdeclar2Peer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumdec($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecven($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFueing($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecdec($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRifcon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTipo($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNumref($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNombre($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMondec($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setEdodec($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setMora($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setProntopg($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setAutliq($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFundec($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCodrec($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setModo($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setNumero($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setConpag($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setMonabo($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setNumabo($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setNomcon($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setId($arr[$keys[21]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(Fcdeclar2Peer::DATABASE_NAME);

		if ($this->isColumnModified(Fcdeclar2Peer::NUMDEC)) $criteria->add(Fcdeclar2Peer::NUMDEC, $this->numdec);
		if ($this->isColumnModified(Fcdeclar2Peer::FECVEN)) $criteria->add(Fcdeclar2Peer::FECVEN, $this->fecven);
		if ($this->isColumnModified(Fcdeclar2Peer::FUEING)) $criteria->add(Fcdeclar2Peer::FUEING, $this->fueing);
		if ($this->isColumnModified(Fcdeclar2Peer::FECDEC)) $criteria->add(Fcdeclar2Peer::FECDEC, $this->fecdec);
		if ($this->isColumnModified(Fcdeclar2Peer::RIFCON)) $criteria->add(Fcdeclar2Peer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(Fcdeclar2Peer::TIPO)) $criteria->add(Fcdeclar2Peer::TIPO, $this->tipo);
		if ($this->isColumnModified(Fcdeclar2Peer::NUMREF)) $criteria->add(Fcdeclar2Peer::NUMREF, $this->numref);
		if ($this->isColumnModified(Fcdeclar2Peer::NOMBRE)) $criteria->add(Fcdeclar2Peer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(Fcdeclar2Peer::MONDEC)) $criteria->add(Fcdeclar2Peer::MONDEC, $this->mondec);
		if ($this->isColumnModified(Fcdeclar2Peer::EDODEC)) $criteria->add(Fcdeclar2Peer::EDODEC, $this->edodec);
		if ($this->isColumnModified(Fcdeclar2Peer::MORA)) $criteria->add(Fcdeclar2Peer::MORA, $this->mora);
		if ($this->isColumnModified(Fcdeclar2Peer::PRONTOPG)) $criteria->add(Fcdeclar2Peer::PRONTOPG, $this->prontopg);
		if ($this->isColumnModified(Fcdeclar2Peer::AUTLIQ)) $criteria->add(Fcdeclar2Peer::AUTLIQ, $this->autliq);
		if ($this->isColumnModified(Fcdeclar2Peer::FUNDEC)) $criteria->add(Fcdeclar2Peer::FUNDEC, $this->fundec);
		if ($this->isColumnModified(Fcdeclar2Peer::CODREC)) $criteria->add(Fcdeclar2Peer::CODREC, $this->codrec);
		if ($this->isColumnModified(Fcdeclar2Peer::MODO)) $criteria->add(Fcdeclar2Peer::MODO, $this->modo);
		if ($this->isColumnModified(Fcdeclar2Peer::NUMERO)) $criteria->add(Fcdeclar2Peer::NUMERO, $this->numero);
		if ($this->isColumnModified(Fcdeclar2Peer::CONPAG)) $criteria->add(Fcdeclar2Peer::CONPAG, $this->conpag);
		if ($this->isColumnModified(Fcdeclar2Peer::MONABO)) $criteria->add(Fcdeclar2Peer::MONABO, $this->monabo);
		if ($this->isColumnModified(Fcdeclar2Peer::NUMABO)) $criteria->add(Fcdeclar2Peer::NUMABO, $this->numabo);
		if ($this->isColumnModified(Fcdeclar2Peer::NOMCON)) $criteria->add(Fcdeclar2Peer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(Fcdeclar2Peer::ID)) $criteria->add(Fcdeclar2Peer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Fcdeclar2Peer::DATABASE_NAME);

		$criteria->add(Fcdeclar2Peer::ID, $this->id);

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

		$copyObj->setNumdec($this->numdec);

		$copyObj->setFecven($this->fecven);

		$copyObj->setFueing($this->fueing);

		$copyObj->setFecdec($this->fecdec);

		$copyObj->setRifcon($this->rifcon);

		$copyObj->setTipo($this->tipo);

		$copyObj->setNumref($this->numref);

		$copyObj->setNombre($this->nombre);

		$copyObj->setMondec($this->mondec);

		$copyObj->setEdodec($this->edodec);

		$copyObj->setMora($this->mora);

		$copyObj->setProntopg($this->prontopg);

		$copyObj->setAutliq($this->autliq);

		$copyObj->setFundec($this->fundec);

		$copyObj->setCodrec($this->codrec);

		$copyObj->setModo($this->modo);

		$copyObj->setNumero($this->numero);

		$copyObj->setConpag($this->conpag);

		$copyObj->setMonabo($this->monabo);

		$copyObj->setNumabo($this->numabo);

		$copyObj->setNomcon($this->nomcon);


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
			self::$peer = new Fcdeclar2Peer();
		}
		return self::$peer;
	}

} 