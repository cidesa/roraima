<?php


abstract class BaseFcdefnca extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpar;


	
	protected $codmun;


	
	protected $codedo;


	
	protected $codpai;


	
	protected $numniv;


	
	protected $nomext1;


	
	protected $nomabr1;


	
	protected $tamano1;


	
	protected $nomext2;


	
	protected $nomabr2;


	
	protected $tamano2;


	
	protected $nomext3;


	
	protected $nomabr3;


	
	protected $tamano3;


	
	protected $nomext4;


	
	protected $nomabr4;


	
	protected $tamano4;


	
	protected $nomext5;


	
	protected $nomabr5;


	
	protected $tamano5;


	
	protected $nomext6;


	
	protected $nomabr6;


	
	protected $tamano6;


	
	protected $nomext7;


	
	protected $nomabr7;


	
	protected $tamano7;


	
	protected $nomext8;


	
	protected $nomabr8;


	
	protected $tamano8;


	
	protected $nomext9;


	
	protected $nomabr9;


	
	protected $tamano9;


	
	protected $nomext10;


	
	protected $nomabr10;


	
	protected $tamano10;


	
	protected $nivinm;


	
	protected $numper;


	
	protected $denumper;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodpar()
	{

		return $this->codpar;
	}

	
	public function getCodmun()
	{

		return $this->codmun;
	}

	
	public function getCodedo()
	{

		return $this->codedo;
	}

	
	public function getCodpai()
	{

		return $this->codpai;
	}

	
	public function getNumniv()
	{

		return $this->numniv;
	}

	
	public function getNomext1()
	{

		return $this->nomext1;
	}

	
	public function getNomabr1()
	{

		return $this->nomabr1;
	}

	
	public function getTamano1()
	{

		return $this->tamano1;
	}

	
	public function getNomext2()
	{

		return $this->nomext2;
	}

	
	public function getNomabr2()
	{

		return $this->nomabr2;
	}

	
	public function getTamano2()
	{

		return $this->tamano2;
	}

	
	public function getNomext3()
	{

		return $this->nomext3;
	}

	
	public function getNomabr3()
	{

		return $this->nomabr3;
	}

	
	public function getTamano3()
	{

		return $this->tamano3;
	}

	
	public function getNomext4()
	{

		return $this->nomext4;
	}

	
	public function getNomabr4()
	{

		return $this->nomabr4;
	}

	
	public function getTamano4()
	{

		return $this->tamano4;
	}

	
	public function getNomext5()
	{

		return $this->nomext5;
	}

	
	public function getNomabr5()
	{

		return $this->nomabr5;
	}

	
	public function getTamano5()
	{

		return $this->tamano5;
	}

	
	public function getNomext6()
	{

		return $this->nomext6;
	}

	
	public function getNomabr6()
	{

		return $this->nomabr6;
	}

	
	public function getTamano6()
	{

		return $this->tamano6;
	}

	
	public function getNomext7()
	{

		return $this->nomext7;
	}

	
	public function getNomabr7()
	{

		return $this->nomabr7;
	}

	
	public function getTamano7()
	{

		return $this->tamano7;
	}

	
	public function getNomext8()
	{

		return $this->nomext8;
	}

	
	public function getNomabr8()
	{

		return $this->nomabr8;
	}

	
	public function getTamano8()
	{

		return $this->tamano8;
	}

	
	public function getNomext9()
	{

		return $this->nomext9;
	}

	
	public function getNomabr9()
	{

		return $this->nomabr9;
	}

	
	public function getTamano9()
	{

		return $this->tamano9;
	}

	
	public function getNomext10()
	{

		return $this->nomext10;
	}

	
	public function getNomabr10()
	{

		return $this->nomabr10;
	}

	
	public function getTamano10()
	{

		return $this->tamano10;
	}

	
	public function getNivinm()
	{

		return $this->nivinm;
	}

	
	public function getNumper()
	{

		return $this->numper;
	}

	
	public function getDenumper()
	{

		return $this->denumper;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodpar($v)
	{

		if ($this->codpar !== $v) {
			$this->codpar = $v;
			$this->modifiedColumns[] = FcdefncaPeer::CODPAR;
		}

	} 
	
	public function setCodmun($v)
	{

		if ($this->codmun !== $v) {
			$this->codmun = $v;
			$this->modifiedColumns[] = FcdefncaPeer::CODMUN;
		}

	} 
	
	public function setCodedo($v)
	{

		if ($this->codedo !== $v) {
			$this->codedo = $v;
			$this->modifiedColumns[] = FcdefncaPeer::CODEDO;
		}

	} 
	
	public function setCodpai($v)
	{

		if ($this->codpai !== $v) {
			$this->codpai = $v;
			$this->modifiedColumns[] = FcdefncaPeer::CODPAI;
		}

	} 
	
	public function setNumniv($v)
	{

		if ($this->numniv !== $v) {
			$this->numniv = $v;
			$this->modifiedColumns[] = FcdefncaPeer::NUMNIV;
		}

	} 
	
	public function setNomext1($v)
	{

		if ($this->nomext1 !== $v) {
			$this->nomext1 = $v;
			$this->modifiedColumns[] = FcdefncaPeer::NOMEXT1;
		}

	} 
	
	public function setNomabr1($v)
	{

		if ($this->nomabr1 !== $v) {
			$this->nomabr1 = $v;
			$this->modifiedColumns[] = FcdefncaPeer::NOMABR1;
		}

	} 
	
	public function setTamano1($v)
	{

		if ($this->tamano1 !== $v) {
			$this->tamano1 = $v;
			$this->modifiedColumns[] = FcdefncaPeer::TAMANO1;
		}

	} 
	
	public function setNomext2($v)
	{

		if ($this->nomext2 !== $v) {
			$this->nomext2 = $v;
			$this->modifiedColumns[] = FcdefncaPeer::NOMEXT2;
		}

	} 
	
	public function setNomabr2($v)
	{

		if ($this->nomabr2 !== $v) {
			$this->nomabr2 = $v;
			$this->modifiedColumns[] = FcdefncaPeer::NOMABR2;
		}

	} 
	
	public function setTamano2($v)
	{

		if ($this->tamano2 !== $v) {
			$this->tamano2 = $v;
			$this->modifiedColumns[] = FcdefncaPeer::TAMANO2;
		}

	} 
	
	public function setNomext3($v)
	{

		if ($this->nomext3 !== $v) {
			$this->nomext3 = $v;
			$this->modifiedColumns[] = FcdefncaPeer::NOMEXT3;
		}

	} 
	
	public function setNomabr3($v)
	{

		if ($this->nomabr3 !== $v) {
			$this->nomabr3 = $v;
			$this->modifiedColumns[] = FcdefncaPeer::NOMABR3;
		}

	} 
	
	public function setTamano3($v)
	{

		if ($this->tamano3 !== $v) {
			$this->tamano3 = $v;
			$this->modifiedColumns[] = FcdefncaPeer::TAMANO3;
		}

	} 
	
	public function setNomext4($v)
	{

		if ($this->nomext4 !== $v) {
			$this->nomext4 = $v;
			$this->modifiedColumns[] = FcdefncaPeer::NOMEXT4;
		}

	} 
	
	public function setNomabr4($v)
	{

		if ($this->nomabr4 !== $v) {
			$this->nomabr4 = $v;
			$this->modifiedColumns[] = FcdefncaPeer::NOMABR4;
		}

	} 
	
	public function setTamano4($v)
	{

		if ($this->tamano4 !== $v) {
			$this->tamano4 = $v;
			$this->modifiedColumns[] = FcdefncaPeer::TAMANO4;
		}

	} 
	
	public function setNomext5($v)
	{

		if ($this->nomext5 !== $v) {
			$this->nomext5 = $v;
			$this->modifiedColumns[] = FcdefncaPeer::NOMEXT5;
		}

	} 
	
	public function setNomabr5($v)
	{

		if ($this->nomabr5 !== $v) {
			$this->nomabr5 = $v;
			$this->modifiedColumns[] = FcdefncaPeer::NOMABR5;
		}

	} 
	
	public function setTamano5($v)
	{

		if ($this->tamano5 !== $v) {
			$this->tamano5 = $v;
			$this->modifiedColumns[] = FcdefncaPeer::TAMANO5;
		}

	} 
	
	public function setNomext6($v)
	{

		if ($this->nomext6 !== $v) {
			$this->nomext6 = $v;
			$this->modifiedColumns[] = FcdefncaPeer::NOMEXT6;
		}

	} 
	
	public function setNomabr6($v)
	{

		if ($this->nomabr6 !== $v) {
			$this->nomabr6 = $v;
			$this->modifiedColumns[] = FcdefncaPeer::NOMABR6;
		}

	} 
	
	public function setTamano6($v)
	{

		if ($this->tamano6 !== $v) {
			$this->tamano6 = $v;
			$this->modifiedColumns[] = FcdefncaPeer::TAMANO6;
		}

	} 
	
	public function setNomext7($v)
	{

		if ($this->nomext7 !== $v) {
			$this->nomext7 = $v;
			$this->modifiedColumns[] = FcdefncaPeer::NOMEXT7;
		}

	} 
	
	public function setNomabr7($v)
	{

		if ($this->nomabr7 !== $v) {
			$this->nomabr7 = $v;
			$this->modifiedColumns[] = FcdefncaPeer::NOMABR7;
		}

	} 
	
	public function setTamano7($v)
	{

		if ($this->tamano7 !== $v) {
			$this->tamano7 = $v;
			$this->modifiedColumns[] = FcdefncaPeer::TAMANO7;
		}

	} 
	
	public function setNomext8($v)
	{

		if ($this->nomext8 !== $v) {
			$this->nomext8 = $v;
			$this->modifiedColumns[] = FcdefncaPeer::NOMEXT8;
		}

	} 
	
	public function setNomabr8($v)
	{

		if ($this->nomabr8 !== $v) {
			$this->nomabr8 = $v;
			$this->modifiedColumns[] = FcdefncaPeer::NOMABR8;
		}

	} 
	
	public function setTamano8($v)
	{

		if ($this->tamano8 !== $v) {
			$this->tamano8 = $v;
			$this->modifiedColumns[] = FcdefncaPeer::TAMANO8;
		}

	} 
	
	public function setNomext9($v)
	{

		if ($this->nomext9 !== $v) {
			$this->nomext9 = $v;
			$this->modifiedColumns[] = FcdefncaPeer::NOMEXT9;
		}

	} 
	
	public function setNomabr9($v)
	{

		if ($this->nomabr9 !== $v) {
			$this->nomabr9 = $v;
			$this->modifiedColumns[] = FcdefncaPeer::NOMABR9;
		}

	} 
	
	public function setTamano9($v)
	{

		if ($this->tamano9 !== $v) {
			$this->tamano9 = $v;
			$this->modifiedColumns[] = FcdefncaPeer::TAMANO9;
		}

	} 
	
	public function setNomext10($v)
	{

		if ($this->nomext10 !== $v) {
			$this->nomext10 = $v;
			$this->modifiedColumns[] = FcdefncaPeer::NOMEXT10;
		}

	} 
	
	public function setNomabr10($v)
	{

		if ($this->nomabr10 !== $v) {
			$this->nomabr10 = $v;
			$this->modifiedColumns[] = FcdefncaPeer::NOMABR10;
		}

	} 
	
	public function setTamano10($v)
	{

		if ($this->tamano10 !== $v) {
			$this->tamano10 = $v;
			$this->modifiedColumns[] = FcdefncaPeer::TAMANO10;
		}

	} 
	
	public function setNivinm($v)
	{

		if ($this->nivinm !== $v) {
			$this->nivinm = $v;
			$this->modifiedColumns[] = FcdefncaPeer::NIVINM;
		}

	} 
	
	public function setNumper($v)
	{

		if ($this->numper !== $v) {
			$this->numper = $v;
			$this->modifiedColumns[] = FcdefncaPeer::NUMPER;
		}

	} 
	
	public function setDenumper($v)
	{

		if ($this->denumper !== $v) {
			$this->denumper = $v;
			$this->modifiedColumns[] = FcdefncaPeer::DENUMPER;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcdefncaPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codpar = $rs->getString($startcol + 0);

			$this->codmun = $rs->getString($startcol + 1);

			$this->codedo = $rs->getString($startcol + 2);

			$this->codpai = $rs->getString($startcol + 3);

			$this->numniv = $rs->getFloat($startcol + 4);

			$this->nomext1 = $rs->getString($startcol + 5);

			$this->nomabr1 = $rs->getString($startcol + 6);

			$this->tamano1 = $rs->getFloat($startcol + 7);

			$this->nomext2 = $rs->getString($startcol + 8);

			$this->nomabr2 = $rs->getString($startcol + 9);

			$this->tamano2 = $rs->getFloat($startcol + 10);

			$this->nomext3 = $rs->getString($startcol + 11);

			$this->nomabr3 = $rs->getString($startcol + 12);

			$this->tamano3 = $rs->getFloat($startcol + 13);

			$this->nomext4 = $rs->getString($startcol + 14);

			$this->nomabr4 = $rs->getString($startcol + 15);

			$this->tamano4 = $rs->getFloat($startcol + 16);

			$this->nomext5 = $rs->getString($startcol + 17);

			$this->nomabr5 = $rs->getString($startcol + 18);

			$this->tamano5 = $rs->getFloat($startcol + 19);

			$this->nomext6 = $rs->getString($startcol + 20);

			$this->nomabr6 = $rs->getString($startcol + 21);

			$this->tamano6 = $rs->getFloat($startcol + 22);

			$this->nomext7 = $rs->getString($startcol + 23);

			$this->nomabr7 = $rs->getString($startcol + 24);

			$this->tamano7 = $rs->getFloat($startcol + 25);

			$this->nomext8 = $rs->getString($startcol + 26);

			$this->nomabr8 = $rs->getString($startcol + 27);

			$this->tamano8 = $rs->getFloat($startcol + 28);

			$this->nomext9 = $rs->getString($startcol + 29);

			$this->nomabr9 = $rs->getString($startcol + 30);

			$this->tamano9 = $rs->getFloat($startcol + 31);

			$this->nomext10 = $rs->getString($startcol + 32);

			$this->nomabr10 = $rs->getString($startcol + 33);

			$this->tamano10 = $rs->getFloat($startcol + 34);

			$this->nivinm = $rs->getString($startcol + 35);

			$this->numper = $rs->getFloat($startcol + 36);

			$this->denumper = $rs->getString($startcol + 37);

			$this->id = $rs->getInt($startcol + 38);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 39; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcdefnca object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcdefncaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcdefncaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcdefncaPeer::DATABASE_NAME);
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
					$pk = FcdefncaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcdefncaPeer::doUpdate($this, $con);
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


			if (($retval = FcdefncaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdefncaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpar();
				break;
			case 1:
				return $this->getCodmun();
				break;
			case 2:
				return $this->getCodedo();
				break;
			case 3:
				return $this->getCodpai();
				break;
			case 4:
				return $this->getNumniv();
				break;
			case 5:
				return $this->getNomext1();
				break;
			case 6:
				return $this->getNomabr1();
				break;
			case 7:
				return $this->getTamano1();
				break;
			case 8:
				return $this->getNomext2();
				break;
			case 9:
				return $this->getNomabr2();
				break;
			case 10:
				return $this->getTamano2();
				break;
			case 11:
				return $this->getNomext3();
				break;
			case 12:
				return $this->getNomabr3();
				break;
			case 13:
				return $this->getTamano3();
				break;
			case 14:
				return $this->getNomext4();
				break;
			case 15:
				return $this->getNomabr4();
				break;
			case 16:
				return $this->getTamano4();
				break;
			case 17:
				return $this->getNomext5();
				break;
			case 18:
				return $this->getNomabr5();
				break;
			case 19:
				return $this->getTamano5();
				break;
			case 20:
				return $this->getNomext6();
				break;
			case 21:
				return $this->getNomabr6();
				break;
			case 22:
				return $this->getTamano6();
				break;
			case 23:
				return $this->getNomext7();
				break;
			case 24:
				return $this->getNomabr7();
				break;
			case 25:
				return $this->getTamano7();
				break;
			case 26:
				return $this->getNomext8();
				break;
			case 27:
				return $this->getNomabr8();
				break;
			case 28:
				return $this->getTamano8();
				break;
			case 29:
				return $this->getNomext9();
				break;
			case 30:
				return $this->getNomabr9();
				break;
			case 31:
				return $this->getTamano9();
				break;
			case 32:
				return $this->getNomext10();
				break;
			case 33:
				return $this->getNomabr10();
				break;
			case 34:
				return $this->getTamano10();
				break;
			case 35:
				return $this->getNivinm();
				break;
			case 36:
				return $this->getNumper();
				break;
			case 37:
				return $this->getDenumper();
				break;
			case 38:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdefncaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpar(),
			$keys[1] => $this->getCodmun(),
			$keys[2] => $this->getCodedo(),
			$keys[3] => $this->getCodpai(),
			$keys[4] => $this->getNumniv(),
			$keys[5] => $this->getNomext1(),
			$keys[6] => $this->getNomabr1(),
			$keys[7] => $this->getTamano1(),
			$keys[8] => $this->getNomext2(),
			$keys[9] => $this->getNomabr2(),
			$keys[10] => $this->getTamano2(),
			$keys[11] => $this->getNomext3(),
			$keys[12] => $this->getNomabr3(),
			$keys[13] => $this->getTamano3(),
			$keys[14] => $this->getNomext4(),
			$keys[15] => $this->getNomabr4(),
			$keys[16] => $this->getTamano4(),
			$keys[17] => $this->getNomext5(),
			$keys[18] => $this->getNomabr5(),
			$keys[19] => $this->getTamano5(),
			$keys[20] => $this->getNomext6(),
			$keys[21] => $this->getNomabr6(),
			$keys[22] => $this->getTamano6(),
			$keys[23] => $this->getNomext7(),
			$keys[24] => $this->getNomabr7(),
			$keys[25] => $this->getTamano7(),
			$keys[26] => $this->getNomext8(),
			$keys[27] => $this->getNomabr8(),
			$keys[28] => $this->getTamano8(),
			$keys[29] => $this->getNomext9(),
			$keys[30] => $this->getNomabr9(),
			$keys[31] => $this->getTamano9(),
			$keys[32] => $this->getNomext10(),
			$keys[33] => $this->getNomabr10(),
			$keys[34] => $this->getTamano10(),
			$keys[35] => $this->getNivinm(),
			$keys[36] => $this->getNumper(),
			$keys[37] => $this->getDenumper(),
			$keys[38] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdefncaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpar($value);
				break;
			case 1:
				$this->setCodmun($value);
				break;
			case 2:
				$this->setCodedo($value);
				break;
			case 3:
				$this->setCodpai($value);
				break;
			case 4:
				$this->setNumniv($value);
				break;
			case 5:
				$this->setNomext1($value);
				break;
			case 6:
				$this->setNomabr1($value);
				break;
			case 7:
				$this->setTamano1($value);
				break;
			case 8:
				$this->setNomext2($value);
				break;
			case 9:
				$this->setNomabr2($value);
				break;
			case 10:
				$this->setTamano2($value);
				break;
			case 11:
				$this->setNomext3($value);
				break;
			case 12:
				$this->setNomabr3($value);
				break;
			case 13:
				$this->setTamano3($value);
				break;
			case 14:
				$this->setNomext4($value);
				break;
			case 15:
				$this->setNomabr4($value);
				break;
			case 16:
				$this->setTamano4($value);
				break;
			case 17:
				$this->setNomext5($value);
				break;
			case 18:
				$this->setNomabr5($value);
				break;
			case 19:
				$this->setTamano5($value);
				break;
			case 20:
				$this->setNomext6($value);
				break;
			case 21:
				$this->setNomabr6($value);
				break;
			case 22:
				$this->setTamano6($value);
				break;
			case 23:
				$this->setNomext7($value);
				break;
			case 24:
				$this->setNomabr7($value);
				break;
			case 25:
				$this->setTamano7($value);
				break;
			case 26:
				$this->setNomext8($value);
				break;
			case 27:
				$this->setNomabr8($value);
				break;
			case 28:
				$this->setTamano8($value);
				break;
			case 29:
				$this->setNomext9($value);
				break;
			case 30:
				$this->setNomabr9($value);
				break;
			case 31:
				$this->setTamano9($value);
				break;
			case 32:
				$this->setNomext10($value);
				break;
			case 33:
				$this->setNomabr10($value);
				break;
			case 34:
				$this->setTamano10($value);
				break;
			case 35:
				$this->setNivinm($value);
				break;
			case 36:
				$this->setNumper($value);
				break;
			case 37:
				$this->setDenumper($value);
				break;
			case 38:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdefncaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpar($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodmun($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodedo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodpai($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNumniv($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNomext1($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNomabr1($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTamano1($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNomext2($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNomabr2($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setTamano2($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setNomext3($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setNomabr3($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setTamano3($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setNomext4($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setNomabr4($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setTamano4($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setNomext5($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setNomabr5($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setTamano5($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setNomext6($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setNomabr6($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setTamano6($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setNomext7($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setNomabr7($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setTamano7($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setNomext8($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setNomabr8($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setTamano8($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setNomext9($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setNomabr9($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setTamano9($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setNomext10($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setNomabr10($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setTamano10($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setNivinm($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setNumper($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setDenumper($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setId($arr[$keys[38]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcdefncaPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcdefncaPeer::CODPAR)) $criteria->add(FcdefncaPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(FcdefncaPeer::CODMUN)) $criteria->add(FcdefncaPeer::CODMUN, $this->codmun);
		if ($this->isColumnModified(FcdefncaPeer::CODEDO)) $criteria->add(FcdefncaPeer::CODEDO, $this->codedo);
		if ($this->isColumnModified(FcdefncaPeer::CODPAI)) $criteria->add(FcdefncaPeer::CODPAI, $this->codpai);
		if ($this->isColumnModified(FcdefncaPeer::NUMNIV)) $criteria->add(FcdefncaPeer::NUMNIV, $this->numniv);
		if ($this->isColumnModified(FcdefncaPeer::NOMEXT1)) $criteria->add(FcdefncaPeer::NOMEXT1, $this->nomext1);
		if ($this->isColumnModified(FcdefncaPeer::NOMABR1)) $criteria->add(FcdefncaPeer::NOMABR1, $this->nomabr1);
		if ($this->isColumnModified(FcdefncaPeer::TAMANO1)) $criteria->add(FcdefncaPeer::TAMANO1, $this->tamano1);
		if ($this->isColumnModified(FcdefncaPeer::NOMEXT2)) $criteria->add(FcdefncaPeer::NOMEXT2, $this->nomext2);
		if ($this->isColumnModified(FcdefncaPeer::NOMABR2)) $criteria->add(FcdefncaPeer::NOMABR2, $this->nomabr2);
		if ($this->isColumnModified(FcdefncaPeer::TAMANO2)) $criteria->add(FcdefncaPeer::TAMANO2, $this->tamano2);
		if ($this->isColumnModified(FcdefncaPeer::NOMEXT3)) $criteria->add(FcdefncaPeer::NOMEXT3, $this->nomext3);
		if ($this->isColumnModified(FcdefncaPeer::NOMABR3)) $criteria->add(FcdefncaPeer::NOMABR3, $this->nomabr3);
		if ($this->isColumnModified(FcdefncaPeer::TAMANO3)) $criteria->add(FcdefncaPeer::TAMANO3, $this->tamano3);
		if ($this->isColumnModified(FcdefncaPeer::NOMEXT4)) $criteria->add(FcdefncaPeer::NOMEXT4, $this->nomext4);
		if ($this->isColumnModified(FcdefncaPeer::NOMABR4)) $criteria->add(FcdefncaPeer::NOMABR4, $this->nomabr4);
		if ($this->isColumnModified(FcdefncaPeer::TAMANO4)) $criteria->add(FcdefncaPeer::TAMANO4, $this->tamano4);
		if ($this->isColumnModified(FcdefncaPeer::NOMEXT5)) $criteria->add(FcdefncaPeer::NOMEXT5, $this->nomext5);
		if ($this->isColumnModified(FcdefncaPeer::NOMABR5)) $criteria->add(FcdefncaPeer::NOMABR5, $this->nomabr5);
		if ($this->isColumnModified(FcdefncaPeer::TAMANO5)) $criteria->add(FcdefncaPeer::TAMANO5, $this->tamano5);
		if ($this->isColumnModified(FcdefncaPeer::NOMEXT6)) $criteria->add(FcdefncaPeer::NOMEXT6, $this->nomext6);
		if ($this->isColumnModified(FcdefncaPeer::NOMABR6)) $criteria->add(FcdefncaPeer::NOMABR6, $this->nomabr6);
		if ($this->isColumnModified(FcdefncaPeer::TAMANO6)) $criteria->add(FcdefncaPeer::TAMANO6, $this->tamano6);
		if ($this->isColumnModified(FcdefncaPeer::NOMEXT7)) $criteria->add(FcdefncaPeer::NOMEXT7, $this->nomext7);
		if ($this->isColumnModified(FcdefncaPeer::NOMABR7)) $criteria->add(FcdefncaPeer::NOMABR7, $this->nomabr7);
		if ($this->isColumnModified(FcdefncaPeer::TAMANO7)) $criteria->add(FcdefncaPeer::TAMANO7, $this->tamano7);
		if ($this->isColumnModified(FcdefncaPeer::NOMEXT8)) $criteria->add(FcdefncaPeer::NOMEXT8, $this->nomext8);
		if ($this->isColumnModified(FcdefncaPeer::NOMABR8)) $criteria->add(FcdefncaPeer::NOMABR8, $this->nomabr8);
		if ($this->isColumnModified(FcdefncaPeer::TAMANO8)) $criteria->add(FcdefncaPeer::TAMANO8, $this->tamano8);
		if ($this->isColumnModified(FcdefncaPeer::NOMEXT9)) $criteria->add(FcdefncaPeer::NOMEXT9, $this->nomext9);
		if ($this->isColumnModified(FcdefncaPeer::NOMABR9)) $criteria->add(FcdefncaPeer::NOMABR9, $this->nomabr9);
		if ($this->isColumnModified(FcdefncaPeer::TAMANO9)) $criteria->add(FcdefncaPeer::TAMANO9, $this->tamano9);
		if ($this->isColumnModified(FcdefncaPeer::NOMEXT10)) $criteria->add(FcdefncaPeer::NOMEXT10, $this->nomext10);
		if ($this->isColumnModified(FcdefncaPeer::NOMABR10)) $criteria->add(FcdefncaPeer::NOMABR10, $this->nomabr10);
		if ($this->isColumnModified(FcdefncaPeer::TAMANO10)) $criteria->add(FcdefncaPeer::TAMANO10, $this->tamano10);
		if ($this->isColumnModified(FcdefncaPeer::NIVINM)) $criteria->add(FcdefncaPeer::NIVINM, $this->nivinm);
		if ($this->isColumnModified(FcdefncaPeer::NUMPER)) $criteria->add(FcdefncaPeer::NUMPER, $this->numper);
		if ($this->isColumnModified(FcdefncaPeer::DENUMPER)) $criteria->add(FcdefncaPeer::DENUMPER, $this->denumper);
		if ($this->isColumnModified(FcdefncaPeer::ID)) $criteria->add(FcdefncaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcdefncaPeer::DATABASE_NAME);

		$criteria->add(FcdefncaPeer::ID, $this->id);

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

		$copyObj->setCodpar($this->codpar);

		$copyObj->setCodmun($this->codmun);

		$copyObj->setCodedo($this->codedo);

		$copyObj->setCodpai($this->codpai);

		$copyObj->setNumniv($this->numniv);

		$copyObj->setNomext1($this->nomext1);

		$copyObj->setNomabr1($this->nomabr1);

		$copyObj->setTamano1($this->tamano1);

		$copyObj->setNomext2($this->nomext2);

		$copyObj->setNomabr2($this->nomabr2);

		$copyObj->setTamano2($this->tamano2);

		$copyObj->setNomext3($this->nomext3);

		$copyObj->setNomabr3($this->nomabr3);

		$copyObj->setTamano3($this->tamano3);

		$copyObj->setNomext4($this->nomext4);

		$copyObj->setNomabr4($this->nomabr4);

		$copyObj->setTamano4($this->tamano4);

		$copyObj->setNomext5($this->nomext5);

		$copyObj->setNomabr5($this->nomabr5);

		$copyObj->setTamano5($this->tamano5);

		$copyObj->setNomext6($this->nomext6);

		$copyObj->setNomabr6($this->nomabr6);

		$copyObj->setTamano6($this->tamano6);

		$copyObj->setNomext7($this->nomext7);

		$copyObj->setNomabr7($this->nomabr7);

		$copyObj->setTamano7($this->tamano7);

		$copyObj->setNomext8($this->nomext8);

		$copyObj->setNomabr8($this->nomabr8);

		$copyObj->setTamano8($this->tamano8);

		$copyObj->setNomext9($this->nomext9);

		$copyObj->setNomabr9($this->nomabr9);

		$copyObj->setTamano9($this->tamano9);

		$copyObj->setNomext10($this->nomext10);

		$copyObj->setNomabr10($this->nomabr10);

		$copyObj->setTamano10($this->tamano10);

		$copyObj->setNivinm($this->nivinm);

		$copyObj->setNumper($this->numper);

		$copyObj->setDenumper($this->denumper);


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
			self::$peer = new FcdefncaPeer();
		}
		return self::$peer;
	}

} 