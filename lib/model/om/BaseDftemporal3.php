<?php


abstract class BaseDftemporal3 extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codigo;


	
	protected $fecha;


	
	protected $abr;


	
	protected $vida;


	
	protected $ben;


	
	protected $usu;


	
	protected $fecharec;


	
	protected $fechaate;


	
	protected $estad;


	
	protected $ruta;


	
	protected $nomtab;


	
	protected $unidadori;


	
	protected $unidad;


	
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

	
	public function getFecha($format = 'Y-m-d')
	{

		if ($this->fecha === null || $this->fecha === '') {
			return null;
		} elseif (!is_int($this->fecha)) {
						$ts = strtotime($this->fecha);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecha] as date/time value: " . var_export($this->fecha, true));
			}
		} else {
			$ts = $this->fecha;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getAbr()
	{

		return $this->abr;
	}

	
	public function getVida()
	{

		return $this->vida;
	}

	
	public function getBen()
	{

		return $this->ben;
	}

	
	public function getUsu()
	{

		return $this->usu;
	}

	
	public function getFecharec($format = 'Y-m-d')
	{

		if ($this->fecharec === null || $this->fecharec === '') {
			return null;
		} elseif (!is_int($this->fecharec)) {
						$ts = strtotime($this->fecharec);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecharec] as date/time value: " . var_export($this->fecharec, true));
			}
		} else {
			$ts = $this->fecharec;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFechaate($format = 'Y-m-d')
	{

		if ($this->fechaate === null || $this->fechaate === '') {
			return null;
		} elseif (!is_int($this->fechaate)) {
						$ts = strtotime($this->fechaate);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fechaate] as date/time value: " . var_export($this->fechaate, true));
			}
		} else {
			$ts = $this->fechaate;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getEstad()
	{

		return $this->estad;
	}

	
	public function getRuta()
	{

		return $this->ruta;
	}

	
	public function getNomtab()
	{

		return $this->nomtab;
	}

	
	public function getUnidadori()
	{

		return $this->unidadori;
	}

	
	public function getUnidad()
	{

		return $this->unidad;
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
			$this->modifiedColumns[] = Dftemporal3Peer::CODIGO;
		}

	} 
	
	public function setFecha($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecha] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecha !== $ts) {
			$this->fecha = $ts;
			$this->modifiedColumns[] = Dftemporal3Peer::FECHA;
		}

	} 
	
	public function setAbr($v)
	{

		if ($this->abr !== $v) {
			$this->abr = $v;
			$this->modifiedColumns[] = Dftemporal3Peer::ABR;
		}

	} 
	
	public function setVida($v)
	{

		if ($this->vida !== $v) {
			$this->vida = $v;
			$this->modifiedColumns[] = Dftemporal3Peer::VIDA;
		}

	} 
	
	public function setBen($v)
	{

		if ($this->ben !== $v) {
			$this->ben = $v;
			$this->modifiedColumns[] = Dftemporal3Peer::BEN;
		}

	} 
	
	public function setUsu($v)
	{

		if ($this->usu !== $v) {
			$this->usu = $v;
			$this->modifiedColumns[] = Dftemporal3Peer::USU;
		}

	} 
	
	public function setFecharec($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecharec] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecharec !== $ts) {
			$this->fecharec = $ts;
			$this->modifiedColumns[] = Dftemporal3Peer::FECHAREC;
		}

	} 
	
	public function setFechaate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fechaate] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fechaate !== $ts) {
			$this->fechaate = $ts;
			$this->modifiedColumns[] = Dftemporal3Peer::FECHAATE;
		}

	} 
	
	public function setEstad($v)
	{

		if ($this->estad !== $v) {
			$this->estad = $v;
			$this->modifiedColumns[] = Dftemporal3Peer::ESTAD;
		}

	} 
	
	public function setRuta($v)
	{

		if ($this->ruta !== $v) {
			$this->ruta = $v;
			$this->modifiedColumns[] = Dftemporal3Peer::RUTA;
		}

	} 
	
	public function setNomtab($v)
	{

		if ($this->nomtab !== $v) {
			$this->nomtab = $v;
			$this->modifiedColumns[] = Dftemporal3Peer::NOMTAB;
		}

	} 
	
	public function setUnidadori($v)
	{

		if ($this->unidadori !== $v) {
			$this->unidadori = $v;
			$this->modifiedColumns[] = Dftemporal3Peer::UNIDADORI;
		}

	} 
	
	public function setUnidad($v)
	{

		if ($this->unidad !== $v) {
			$this->unidad = $v;
			$this->modifiedColumns[] = Dftemporal3Peer::UNIDAD;
		}

	} 
	
	public function setAnuate($v)
	{

		if ($this->anuate !== $v) {
			$this->anuate = $v;
			$this->modifiedColumns[] = Dftemporal3Peer::ANUATE;
		}

	} 
	
	public function setChkuni1($v)
	{

		if ($this->chkuni1 !== $v || $v === '0') {
			$this->chkuni1 = $v;
			$this->modifiedColumns[] = Dftemporal3Peer::CHKUNI1;
		}

	} 
	
	public function setChkuni2($v)
	{

		if ($this->chkuni2 !== $v || $v === '0') {
			$this->chkuni2 = $v;
			$this->modifiedColumns[] = Dftemporal3Peer::CHKUNI2;
		}

	} 
	
	public function setChkuni3($v)
	{

		if ($this->chkuni3 !== $v || $v === '0') {
			$this->chkuni3 = $v;
			$this->modifiedColumns[] = Dftemporal3Peer::CHKUNI3;
		}

	} 
	
	public function setChkuni4($v)
	{

		if ($this->chkuni4 !== $v || $v === '0') {
			$this->chkuni4 = $v;
			$this->modifiedColumns[] = Dftemporal3Peer::CHKUNI4;
		}

	} 
	
	public function setChkuni5($v)
	{

		if ($this->chkuni5 !== $v || $v === '0') {
			$this->chkuni5 = $v;
			$this->modifiedColumns[] = Dftemporal3Peer::CHKUNI5;
		}

	} 
	
	public function setChkuni6($v)
	{

		if ($this->chkuni6 !== $v || $v === '0') {
			$this->chkuni6 = $v;
			$this->modifiedColumns[] = Dftemporal3Peer::CHKUNI6;
		}

	} 
	
	public function setChkuni7($v)
	{

		if ($this->chkuni7 !== $v || $v === '0') {
			$this->chkuni7 = $v;
			$this->modifiedColumns[] = Dftemporal3Peer::CHKUNI7;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = Dftemporal3Peer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codigo = $rs->getString($startcol + 0);

			$this->fecha = $rs->getDate($startcol + 1, null);

			$this->abr = $rs->getString($startcol + 2);

			$this->vida = $rs->getString($startcol + 3);

			$this->ben = $rs->getString($startcol + 4);

			$this->usu = $rs->getString($startcol + 5);

			$this->fecharec = $rs->getDate($startcol + 6, null);

			$this->fechaate = $rs->getDate($startcol + 7, null);

			$this->estad = $rs->getString($startcol + 8);

			$this->ruta = $rs->getString($startcol + 9);

			$this->nomtab = $rs->getString($startcol + 10);

			$this->unidadori = $rs->getString($startcol + 11);

			$this->unidad = $rs->getString($startcol + 12);

			$this->anuate = $rs->getString($startcol + 13);

			$this->chkuni1 = $rs->getString($startcol + 14);

			$this->chkuni2 = $rs->getString($startcol + 15);

			$this->chkuni3 = $rs->getString($startcol + 16);

			$this->chkuni4 = $rs->getString($startcol + 17);

			$this->chkuni5 = $rs->getString($startcol + 18);

			$this->chkuni6 = $rs->getString($startcol + 19);

			$this->chkuni7 = $rs->getString($startcol + 20);

			$this->id = $rs->getInt($startcol + 21);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 22; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Dftemporal3 object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(Dftemporal3Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			Dftemporal3Peer::doDelete($this, $con);
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
			$con = Propel::getConnection(Dftemporal3Peer::DATABASE_NAME);
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
					$pk = Dftemporal3Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += Dftemporal3Peer::doUpdate($this, $con);
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


			if (($retval = Dftemporal3Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Dftemporal3Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodigo();
				break;
			case 1:
				return $this->getFecha();
				break;
			case 2:
				return $this->getAbr();
				break;
			case 3:
				return $this->getVida();
				break;
			case 4:
				return $this->getBen();
				break;
			case 5:
				return $this->getUsu();
				break;
			case 6:
				return $this->getFecharec();
				break;
			case 7:
				return $this->getFechaate();
				break;
			case 8:
				return $this->getEstad();
				break;
			case 9:
				return $this->getRuta();
				break;
			case 10:
				return $this->getNomtab();
				break;
			case 11:
				return $this->getUnidadori();
				break;
			case 12:
				return $this->getUnidad();
				break;
			case 13:
				return $this->getAnuate();
				break;
			case 14:
				return $this->getChkuni1();
				break;
			case 15:
				return $this->getChkuni2();
				break;
			case 16:
				return $this->getChkuni3();
				break;
			case 17:
				return $this->getChkuni4();
				break;
			case 18:
				return $this->getChkuni5();
				break;
			case 19:
				return $this->getChkuni6();
				break;
			case 20:
				return $this->getChkuni7();
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
		$keys = Dftemporal3Peer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodigo(),
			$keys[1] => $this->getFecha(),
			$keys[2] => $this->getAbr(),
			$keys[3] => $this->getVida(),
			$keys[4] => $this->getBen(),
			$keys[5] => $this->getUsu(),
			$keys[6] => $this->getFecharec(),
			$keys[7] => $this->getFechaate(),
			$keys[8] => $this->getEstad(),
			$keys[9] => $this->getRuta(),
			$keys[10] => $this->getNomtab(),
			$keys[11] => $this->getUnidadori(),
			$keys[12] => $this->getUnidad(),
			$keys[13] => $this->getAnuate(),
			$keys[14] => $this->getChkuni1(),
			$keys[15] => $this->getChkuni2(),
			$keys[16] => $this->getChkuni3(),
			$keys[17] => $this->getChkuni4(),
			$keys[18] => $this->getChkuni5(),
			$keys[19] => $this->getChkuni6(),
			$keys[20] => $this->getChkuni7(),
			$keys[21] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Dftemporal3Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodigo($value);
				break;
			case 1:
				$this->setFecha($value);
				break;
			case 2:
				$this->setAbr($value);
				break;
			case 3:
				$this->setVida($value);
				break;
			case 4:
				$this->setBen($value);
				break;
			case 5:
				$this->setUsu($value);
				break;
			case 6:
				$this->setFecharec($value);
				break;
			case 7:
				$this->setFechaate($value);
				break;
			case 8:
				$this->setEstad($value);
				break;
			case 9:
				$this->setRuta($value);
				break;
			case 10:
				$this->setNomtab($value);
				break;
			case 11:
				$this->setUnidadori($value);
				break;
			case 12:
				$this->setUnidad($value);
				break;
			case 13:
				$this->setAnuate($value);
				break;
			case 14:
				$this->setChkuni1($value);
				break;
			case 15:
				$this->setChkuni2($value);
				break;
			case 16:
				$this->setChkuni3($value);
				break;
			case 17:
				$this->setChkuni4($value);
				break;
			case 18:
				$this->setChkuni5($value);
				break;
			case 19:
				$this->setChkuni6($value);
				break;
			case 20:
				$this->setChkuni7($value);
				break;
			case 21:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Dftemporal3Peer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodigo($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecha($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAbr($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setVida($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setBen($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUsu($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecharec($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFechaate($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setEstad($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setRuta($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setNomtab($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUnidadori($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setUnidad($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setAnuate($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setChkuni1($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setChkuni2($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setChkuni3($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setChkuni4($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setChkuni5($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setChkuni6($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setChkuni7($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setId($arr[$keys[21]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(Dftemporal3Peer::DATABASE_NAME);

		if ($this->isColumnModified(Dftemporal3Peer::CODIGO)) $criteria->add(Dftemporal3Peer::CODIGO, $this->codigo);
		if ($this->isColumnModified(Dftemporal3Peer::FECHA)) $criteria->add(Dftemporal3Peer::FECHA, $this->fecha);
		if ($this->isColumnModified(Dftemporal3Peer::ABR)) $criteria->add(Dftemporal3Peer::ABR, $this->abr);
		if ($this->isColumnModified(Dftemporal3Peer::VIDA)) $criteria->add(Dftemporal3Peer::VIDA, $this->vida);
		if ($this->isColumnModified(Dftemporal3Peer::BEN)) $criteria->add(Dftemporal3Peer::BEN, $this->ben);
		if ($this->isColumnModified(Dftemporal3Peer::USU)) $criteria->add(Dftemporal3Peer::USU, $this->usu);
		if ($this->isColumnModified(Dftemporal3Peer::FECHAREC)) $criteria->add(Dftemporal3Peer::FECHAREC, $this->fecharec);
		if ($this->isColumnModified(Dftemporal3Peer::FECHAATE)) $criteria->add(Dftemporal3Peer::FECHAATE, $this->fechaate);
		if ($this->isColumnModified(Dftemporal3Peer::ESTAD)) $criteria->add(Dftemporal3Peer::ESTAD, $this->estad);
		if ($this->isColumnModified(Dftemporal3Peer::RUTA)) $criteria->add(Dftemporal3Peer::RUTA, $this->ruta);
		if ($this->isColumnModified(Dftemporal3Peer::NOMTAB)) $criteria->add(Dftemporal3Peer::NOMTAB, $this->nomtab);
		if ($this->isColumnModified(Dftemporal3Peer::UNIDADORI)) $criteria->add(Dftemporal3Peer::UNIDADORI, $this->unidadori);
		if ($this->isColumnModified(Dftemporal3Peer::UNIDAD)) $criteria->add(Dftemporal3Peer::UNIDAD, $this->unidad);
		if ($this->isColumnModified(Dftemporal3Peer::ANUATE)) $criteria->add(Dftemporal3Peer::ANUATE, $this->anuate);
		if ($this->isColumnModified(Dftemporal3Peer::CHKUNI1)) $criteria->add(Dftemporal3Peer::CHKUNI1, $this->chkuni1);
		if ($this->isColumnModified(Dftemporal3Peer::CHKUNI2)) $criteria->add(Dftemporal3Peer::CHKUNI2, $this->chkuni2);
		if ($this->isColumnModified(Dftemporal3Peer::CHKUNI3)) $criteria->add(Dftemporal3Peer::CHKUNI3, $this->chkuni3);
		if ($this->isColumnModified(Dftemporal3Peer::CHKUNI4)) $criteria->add(Dftemporal3Peer::CHKUNI4, $this->chkuni4);
		if ($this->isColumnModified(Dftemporal3Peer::CHKUNI5)) $criteria->add(Dftemporal3Peer::CHKUNI5, $this->chkuni5);
		if ($this->isColumnModified(Dftemporal3Peer::CHKUNI6)) $criteria->add(Dftemporal3Peer::CHKUNI6, $this->chkuni6);
		if ($this->isColumnModified(Dftemporal3Peer::CHKUNI7)) $criteria->add(Dftemporal3Peer::CHKUNI7, $this->chkuni7);
		if ($this->isColumnModified(Dftemporal3Peer::ID)) $criteria->add(Dftemporal3Peer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Dftemporal3Peer::DATABASE_NAME);

		$criteria->add(Dftemporal3Peer::ID, $this->id);

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

		$copyObj->setFecha($this->fecha);

		$copyObj->setAbr($this->abr);

		$copyObj->setVida($this->vida);

		$copyObj->setBen($this->ben);

		$copyObj->setUsu($this->usu);

		$copyObj->setFecharec($this->fecharec);

		$copyObj->setFechaate($this->fechaate);

		$copyObj->setEstad($this->estad);

		$copyObj->setRuta($this->ruta);

		$copyObj->setNomtab($this->nomtab);

		$copyObj->setUnidadori($this->unidadori);

		$copyObj->setUnidad($this->unidad);

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
			self::$peer = new Dftemporal3Peer();
		}
		return self::$peer;
	}

} 