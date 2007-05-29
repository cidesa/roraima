<?php


abstract class BaseEmpresa extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $nomemp;


	
	protected $diremp;


	
	protected $tlfemp;


	
	protected $ciuemp;


	
	protected $urlemp;


	
	protected $faxemp;


	
	protected $codpos;


	
	protected $gobedo;


	
	protected $conedo;


	
	protected $cleedo;


	
	protected $dirpre;


	
	protected $munemp;


	
	protected $cieedo;


	
	protected $codctagas;


	
	protected $codctaban;


	
	protected $codctaret;


	
	protected $codctaben;


	
	protected $codctaart;


	
	protected $codctagashas;


	
	protected $codctabanhas;


	
	protected $codctarethas;


	
	protected $codctabenhas;


	
	protected $codctaarthas;


	
	protected $codctapageje;


	
	protected $codctaingdevn;


	
	protected $codctaingdev;


	
	protected $diradm;


	
	protected $dirfin;


	
	protected $dirper;


	
	protected $dirgen;


	
	protected $anapre;


	
	protected $anaper;


	
	protected $anaadm;


	
	protected $edoemp;


	
	protected $encabezado;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodemp()
	{

		return $this->codemp; 		
	}
	
	public function getNomemp()
	{

		return $this->nomemp; 		
	}
	
	public function getDiremp()
	{

		return $this->diremp; 		
	}
	
	public function getTlfemp()
	{

		return $this->tlfemp; 		
	}
	
	public function getCiuemp()
	{

		return $this->ciuemp; 		
	}
	
	public function getUrlemp()
	{

		return $this->urlemp; 		
	}
	
	public function getFaxemp()
	{

		return $this->faxemp; 		
	}
	
	public function getCodpos()
	{

		return $this->codpos; 		
	}
	
	public function getGobedo()
	{

		return $this->gobedo; 		
	}
	
	public function getConedo()
	{

		return $this->conedo; 		
	}
	
	public function getCleedo()
	{

		return $this->cleedo; 		
	}
	
	public function getDirpre()
	{

		return $this->dirpre; 		
	}
	
	public function getMunemp()
	{

		return $this->munemp; 		
	}
	
	public function getCieedo()
	{

		return $this->cieedo; 		
	}
	
	public function getCodctagas()
	{

		return $this->codctagas; 		
	}
	
	public function getCodctaban()
	{

		return $this->codctaban; 		
	}
	
	public function getCodctaret()
	{

		return $this->codctaret; 		
	}
	
	public function getCodctaben()
	{

		return $this->codctaben; 		
	}
	
	public function getCodctaart()
	{

		return $this->codctaart; 		
	}
	
	public function getCodctagashas()
	{

		return $this->codctagashas; 		
	}
	
	public function getCodctabanhas()
	{

		return $this->codctabanhas; 		
	}
	
	public function getCodctarethas()
	{

		return $this->codctarethas; 		
	}
	
	public function getCodctabenhas()
	{

		return $this->codctabenhas; 		
	}
	
	public function getCodctaarthas()
	{

		return $this->codctaarthas; 		
	}
	
	public function getCodctapageje()
	{

		return $this->codctapageje; 		
	}
	
	public function getCodctaingdevn()
	{

		return $this->codctaingdevn; 		
	}
	
	public function getCodctaingdev()
	{

		return $this->codctaingdev; 		
	}
	
	public function getDiradm()
	{

		return $this->diradm; 		
	}
	
	public function getDirfin()
	{

		return $this->dirfin; 		
	}
	
	public function getDirper()
	{

		return $this->dirper; 		
	}
	
	public function getDirgen()
	{

		return $this->dirgen; 		
	}
	
	public function getAnapre()
	{

		return $this->anapre; 		
	}
	
	public function getAnaper()
	{

		return $this->anaper; 		
	}
	
	public function getAnaadm()
	{

		return $this->anaadm; 		
	}
	
	public function getEdoemp()
	{

		return $this->edoemp; 		
	}
	
	public function getEncabezado()
	{

		return $this->encabezado; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = EmpresaPeer::CODEMP;
		}

	} 
	
	public function setNomemp($v)
	{

		if ($this->nomemp !== $v) {
			$this->nomemp = $v;
			$this->modifiedColumns[] = EmpresaPeer::NOMEMP;
		}

	} 
	
	public function setDiremp($v)
	{

		if ($this->diremp !== $v) {
			$this->diremp = $v;
			$this->modifiedColumns[] = EmpresaPeer::DIREMP;
		}

	} 
	
	public function setTlfemp($v)
	{

		if ($this->tlfemp !== $v) {
			$this->tlfemp = $v;
			$this->modifiedColumns[] = EmpresaPeer::TLFEMP;
		}

	} 
	
	public function setCiuemp($v)
	{

		if ($this->ciuemp !== $v) {
			$this->ciuemp = $v;
			$this->modifiedColumns[] = EmpresaPeer::CIUEMP;
		}

	} 
	
	public function setUrlemp($v)
	{

		if ($this->urlemp !== $v) {
			$this->urlemp = $v;
			$this->modifiedColumns[] = EmpresaPeer::URLEMP;
		}

	} 
	
	public function setFaxemp($v)
	{

		if ($this->faxemp !== $v) {
			$this->faxemp = $v;
			$this->modifiedColumns[] = EmpresaPeer::FAXEMP;
		}

	} 
	
	public function setCodpos($v)
	{

		if ($this->codpos !== $v) {
			$this->codpos = $v;
			$this->modifiedColumns[] = EmpresaPeer::CODPOS;
		}

	} 
	
	public function setGobedo($v)
	{

		if ($this->gobedo !== $v) {
			$this->gobedo = $v;
			$this->modifiedColumns[] = EmpresaPeer::GOBEDO;
		}

	} 
	
	public function setConedo($v)
	{

		if ($this->conedo !== $v) {
			$this->conedo = $v;
			$this->modifiedColumns[] = EmpresaPeer::CONEDO;
		}

	} 
	
	public function setCleedo($v)
	{

		if ($this->cleedo !== $v) {
			$this->cleedo = $v;
			$this->modifiedColumns[] = EmpresaPeer::CLEEDO;
		}

	} 
	
	public function setDirpre($v)
	{

		if ($this->dirpre !== $v) {
			$this->dirpre = $v;
			$this->modifiedColumns[] = EmpresaPeer::DIRPRE;
		}

	} 
	
	public function setMunemp($v)
	{

		if ($this->munemp !== $v) {
			$this->munemp = $v;
			$this->modifiedColumns[] = EmpresaPeer::MUNEMP;
		}

	} 
	
	public function setCieedo($v)
	{

		if ($this->cieedo !== $v) {
			$this->cieedo = $v;
			$this->modifiedColumns[] = EmpresaPeer::CIEEDO;
		}

	} 
	
	public function setCodctagas($v)
	{

		if ($this->codctagas !== $v) {
			$this->codctagas = $v;
			$this->modifiedColumns[] = EmpresaPeer::CODCTAGAS;
		}

	} 
	
	public function setCodctaban($v)
	{

		if ($this->codctaban !== $v) {
			$this->codctaban = $v;
			$this->modifiedColumns[] = EmpresaPeer::CODCTABAN;
		}

	} 
	
	public function setCodctaret($v)
	{

		if ($this->codctaret !== $v) {
			$this->codctaret = $v;
			$this->modifiedColumns[] = EmpresaPeer::CODCTARET;
		}

	} 
	
	public function setCodctaben($v)
	{

		if ($this->codctaben !== $v) {
			$this->codctaben = $v;
			$this->modifiedColumns[] = EmpresaPeer::CODCTABEN;
		}

	} 
	
	public function setCodctaart($v)
	{

		if ($this->codctaart !== $v) {
			$this->codctaart = $v;
			$this->modifiedColumns[] = EmpresaPeer::CODCTAART;
		}

	} 
	
	public function setCodctagashas($v)
	{

		if ($this->codctagashas !== $v) {
			$this->codctagashas = $v;
			$this->modifiedColumns[] = EmpresaPeer::CODCTAGASHAS;
		}

	} 
	
	public function setCodctabanhas($v)
	{

		if ($this->codctabanhas !== $v) {
			$this->codctabanhas = $v;
			$this->modifiedColumns[] = EmpresaPeer::CODCTABANHAS;
		}

	} 
	
	public function setCodctarethas($v)
	{

		if ($this->codctarethas !== $v) {
			$this->codctarethas = $v;
			$this->modifiedColumns[] = EmpresaPeer::CODCTARETHAS;
		}

	} 
	
	public function setCodctabenhas($v)
	{

		if ($this->codctabenhas !== $v) {
			$this->codctabenhas = $v;
			$this->modifiedColumns[] = EmpresaPeer::CODCTABENHAS;
		}

	} 
	
	public function setCodctaarthas($v)
	{

		if ($this->codctaarthas !== $v) {
			$this->codctaarthas = $v;
			$this->modifiedColumns[] = EmpresaPeer::CODCTAARTHAS;
		}

	} 
	
	public function setCodctapageje($v)
	{

		if ($this->codctapageje !== $v) {
			$this->codctapageje = $v;
			$this->modifiedColumns[] = EmpresaPeer::CODCTAPAGEJE;
		}

	} 
	
	public function setCodctaingdevn($v)
	{

		if ($this->codctaingdevn !== $v) {
			$this->codctaingdevn = $v;
			$this->modifiedColumns[] = EmpresaPeer::CODCTAINGDEVN;
		}

	} 
	
	public function setCodctaingdev($v)
	{

		if ($this->codctaingdev !== $v) {
			$this->codctaingdev = $v;
			$this->modifiedColumns[] = EmpresaPeer::CODCTAINGDEV;
		}

	} 
	
	public function setDiradm($v)
	{

		if ($this->diradm !== $v) {
			$this->diradm = $v;
			$this->modifiedColumns[] = EmpresaPeer::DIRADM;
		}

	} 
	
	public function setDirfin($v)
	{

		if ($this->dirfin !== $v) {
			$this->dirfin = $v;
			$this->modifiedColumns[] = EmpresaPeer::DIRFIN;
		}

	} 
	
	public function setDirper($v)
	{

		if ($this->dirper !== $v) {
			$this->dirper = $v;
			$this->modifiedColumns[] = EmpresaPeer::DIRPER;
		}

	} 
	
	public function setDirgen($v)
	{

		if ($this->dirgen !== $v) {
			$this->dirgen = $v;
			$this->modifiedColumns[] = EmpresaPeer::DIRGEN;
		}

	} 
	
	public function setAnapre($v)
	{

		if ($this->anapre !== $v) {
			$this->anapre = $v;
			$this->modifiedColumns[] = EmpresaPeer::ANAPRE;
		}

	} 
	
	public function setAnaper($v)
	{

		if ($this->anaper !== $v) {
			$this->anaper = $v;
			$this->modifiedColumns[] = EmpresaPeer::ANAPER;
		}

	} 
	
	public function setAnaadm($v)
	{

		if ($this->anaadm !== $v) {
			$this->anaadm = $v;
			$this->modifiedColumns[] = EmpresaPeer::ANAADM;
		}

	} 
	
	public function setEdoemp($v)
	{

		if ($this->edoemp !== $v) {
			$this->edoemp = $v;
			$this->modifiedColumns[] = EmpresaPeer::EDOEMP;
		}

	} 
	
	public function setEncabezado($v)
	{

		if ($this->encabezado !== $v) {
			$this->encabezado = $v;
			$this->modifiedColumns[] = EmpresaPeer::ENCABEZADO;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = EmpresaPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codemp = $rs->getString($startcol + 0);

			$this->nomemp = $rs->getString($startcol + 1);

			$this->diremp = $rs->getString($startcol + 2);

			$this->tlfemp = $rs->getString($startcol + 3);

			$this->ciuemp = $rs->getString($startcol + 4);

			$this->urlemp = $rs->getString($startcol + 5);

			$this->faxemp = $rs->getString($startcol + 6);

			$this->codpos = $rs->getString($startcol + 7);

			$this->gobedo = $rs->getString($startcol + 8);

			$this->conedo = $rs->getString($startcol + 9);

			$this->cleedo = $rs->getString($startcol + 10);

			$this->dirpre = $rs->getString($startcol + 11);

			$this->munemp = $rs->getString($startcol + 12);

			$this->cieedo = $rs->getString($startcol + 13);

			$this->codctagas = $rs->getString($startcol + 14);

			$this->codctaban = $rs->getString($startcol + 15);

			$this->codctaret = $rs->getString($startcol + 16);

			$this->codctaben = $rs->getString($startcol + 17);

			$this->codctaart = $rs->getString($startcol + 18);

			$this->codctagashas = $rs->getString($startcol + 19);

			$this->codctabanhas = $rs->getString($startcol + 20);

			$this->codctarethas = $rs->getString($startcol + 21);

			$this->codctabenhas = $rs->getString($startcol + 22);

			$this->codctaarthas = $rs->getString($startcol + 23);

			$this->codctapageje = $rs->getString($startcol + 24);

			$this->codctaingdevn = $rs->getString($startcol + 25);

			$this->codctaingdev = $rs->getString($startcol + 26);

			$this->diradm = $rs->getString($startcol + 27);

			$this->dirfin = $rs->getString($startcol + 28);

			$this->dirper = $rs->getString($startcol + 29);

			$this->dirgen = $rs->getString($startcol + 30);

			$this->anapre = $rs->getString($startcol + 31);

			$this->anaper = $rs->getString($startcol + 32);

			$this->anaadm = $rs->getString($startcol + 33);

			$this->edoemp = $rs->getString($startcol + 34);

			$this->encabezado = $rs->getString($startcol + 35);

			$this->id = $rs->getInt($startcol + 36);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 37; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Empresa object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EmpresaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			EmpresaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(EmpresaPeer::DATABASE_NAME);
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
					$pk = EmpresaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += EmpresaPeer::doUpdate($this, $con);
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


			if (($retval = EmpresaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EmpresaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getNomemp();
				break;
			case 2:
				return $this->getDiremp();
				break;
			case 3:
				return $this->getTlfemp();
				break;
			case 4:
				return $this->getCiuemp();
				break;
			case 5:
				return $this->getUrlemp();
				break;
			case 6:
				return $this->getFaxemp();
				break;
			case 7:
				return $this->getCodpos();
				break;
			case 8:
				return $this->getGobedo();
				break;
			case 9:
				return $this->getConedo();
				break;
			case 10:
				return $this->getCleedo();
				break;
			case 11:
				return $this->getDirpre();
				break;
			case 12:
				return $this->getMunemp();
				break;
			case 13:
				return $this->getCieedo();
				break;
			case 14:
				return $this->getCodctagas();
				break;
			case 15:
				return $this->getCodctaban();
				break;
			case 16:
				return $this->getCodctaret();
				break;
			case 17:
				return $this->getCodctaben();
				break;
			case 18:
				return $this->getCodctaart();
				break;
			case 19:
				return $this->getCodctagashas();
				break;
			case 20:
				return $this->getCodctabanhas();
				break;
			case 21:
				return $this->getCodctarethas();
				break;
			case 22:
				return $this->getCodctabenhas();
				break;
			case 23:
				return $this->getCodctaarthas();
				break;
			case 24:
				return $this->getCodctapageje();
				break;
			case 25:
				return $this->getCodctaingdevn();
				break;
			case 26:
				return $this->getCodctaingdev();
				break;
			case 27:
				return $this->getDiradm();
				break;
			case 28:
				return $this->getDirfin();
				break;
			case 29:
				return $this->getDirper();
				break;
			case 30:
				return $this->getDirgen();
				break;
			case 31:
				return $this->getAnapre();
				break;
			case 32:
				return $this->getAnaper();
				break;
			case 33:
				return $this->getAnaadm();
				break;
			case 34:
				return $this->getEdoemp();
				break;
			case 35:
				return $this->getEncabezado();
				break;
			case 36:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EmpresaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getNomemp(),
			$keys[2] => $this->getDiremp(),
			$keys[3] => $this->getTlfemp(),
			$keys[4] => $this->getCiuemp(),
			$keys[5] => $this->getUrlemp(),
			$keys[6] => $this->getFaxemp(),
			$keys[7] => $this->getCodpos(),
			$keys[8] => $this->getGobedo(),
			$keys[9] => $this->getConedo(),
			$keys[10] => $this->getCleedo(),
			$keys[11] => $this->getDirpre(),
			$keys[12] => $this->getMunemp(),
			$keys[13] => $this->getCieedo(),
			$keys[14] => $this->getCodctagas(),
			$keys[15] => $this->getCodctaban(),
			$keys[16] => $this->getCodctaret(),
			$keys[17] => $this->getCodctaben(),
			$keys[18] => $this->getCodctaart(),
			$keys[19] => $this->getCodctagashas(),
			$keys[20] => $this->getCodctabanhas(),
			$keys[21] => $this->getCodctarethas(),
			$keys[22] => $this->getCodctabenhas(),
			$keys[23] => $this->getCodctaarthas(),
			$keys[24] => $this->getCodctapageje(),
			$keys[25] => $this->getCodctaingdevn(),
			$keys[26] => $this->getCodctaingdev(),
			$keys[27] => $this->getDiradm(),
			$keys[28] => $this->getDirfin(),
			$keys[29] => $this->getDirper(),
			$keys[30] => $this->getDirgen(),
			$keys[31] => $this->getAnapre(),
			$keys[32] => $this->getAnaper(),
			$keys[33] => $this->getAnaadm(),
			$keys[34] => $this->getEdoemp(),
			$keys[35] => $this->getEncabezado(),
			$keys[36] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EmpresaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setNomemp($value);
				break;
			case 2:
				$this->setDiremp($value);
				break;
			case 3:
				$this->setTlfemp($value);
				break;
			case 4:
				$this->setCiuemp($value);
				break;
			case 5:
				$this->setUrlemp($value);
				break;
			case 6:
				$this->setFaxemp($value);
				break;
			case 7:
				$this->setCodpos($value);
				break;
			case 8:
				$this->setGobedo($value);
				break;
			case 9:
				$this->setConedo($value);
				break;
			case 10:
				$this->setCleedo($value);
				break;
			case 11:
				$this->setDirpre($value);
				break;
			case 12:
				$this->setMunemp($value);
				break;
			case 13:
				$this->setCieedo($value);
				break;
			case 14:
				$this->setCodctagas($value);
				break;
			case 15:
				$this->setCodctaban($value);
				break;
			case 16:
				$this->setCodctaret($value);
				break;
			case 17:
				$this->setCodctaben($value);
				break;
			case 18:
				$this->setCodctaart($value);
				break;
			case 19:
				$this->setCodctagashas($value);
				break;
			case 20:
				$this->setCodctabanhas($value);
				break;
			case 21:
				$this->setCodctarethas($value);
				break;
			case 22:
				$this->setCodctabenhas($value);
				break;
			case 23:
				$this->setCodctaarthas($value);
				break;
			case 24:
				$this->setCodctapageje($value);
				break;
			case 25:
				$this->setCodctaingdevn($value);
				break;
			case 26:
				$this->setCodctaingdev($value);
				break;
			case 27:
				$this->setDiradm($value);
				break;
			case 28:
				$this->setDirfin($value);
				break;
			case 29:
				$this->setDirper($value);
				break;
			case 30:
				$this->setDirgen($value);
				break;
			case 31:
				$this->setAnapre($value);
				break;
			case 32:
				$this->setAnaper($value);
				break;
			case 33:
				$this->setAnaadm($value);
				break;
			case 34:
				$this->setEdoemp($value);
				break;
			case 35:
				$this->setEncabezado($value);
				break;
			case 36:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EmpresaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDiremp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTlfemp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCiuemp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUrlemp($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFaxemp($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodpos($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setGobedo($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setConedo($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCleedo($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setDirpre($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setMunemp($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCieedo($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCodctagas($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCodctaban($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCodctaret($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCodctaben($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCodctaart($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCodctagashas($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCodctabanhas($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setCodctarethas($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setCodctabenhas($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setCodctaarthas($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setCodctapageje($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setCodctaingdevn($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setCodctaingdev($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setDiradm($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setDirfin($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setDirper($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setDirgen($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setAnapre($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setAnaper($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setAnaadm($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setEdoemp($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setEncabezado($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setId($arr[$keys[36]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(EmpresaPeer::DATABASE_NAME);

		if ($this->isColumnModified(EmpresaPeer::CODEMP)) $criteria->add(EmpresaPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(EmpresaPeer::NOMEMP)) $criteria->add(EmpresaPeer::NOMEMP, $this->nomemp);
		if ($this->isColumnModified(EmpresaPeer::DIREMP)) $criteria->add(EmpresaPeer::DIREMP, $this->diremp);
		if ($this->isColumnModified(EmpresaPeer::TLFEMP)) $criteria->add(EmpresaPeer::TLFEMP, $this->tlfemp);
		if ($this->isColumnModified(EmpresaPeer::CIUEMP)) $criteria->add(EmpresaPeer::CIUEMP, $this->ciuemp);
		if ($this->isColumnModified(EmpresaPeer::URLEMP)) $criteria->add(EmpresaPeer::URLEMP, $this->urlemp);
		if ($this->isColumnModified(EmpresaPeer::FAXEMP)) $criteria->add(EmpresaPeer::FAXEMP, $this->faxemp);
		if ($this->isColumnModified(EmpresaPeer::CODPOS)) $criteria->add(EmpresaPeer::CODPOS, $this->codpos);
		if ($this->isColumnModified(EmpresaPeer::GOBEDO)) $criteria->add(EmpresaPeer::GOBEDO, $this->gobedo);
		if ($this->isColumnModified(EmpresaPeer::CONEDO)) $criteria->add(EmpresaPeer::CONEDO, $this->conedo);
		if ($this->isColumnModified(EmpresaPeer::CLEEDO)) $criteria->add(EmpresaPeer::CLEEDO, $this->cleedo);
		if ($this->isColumnModified(EmpresaPeer::DIRPRE)) $criteria->add(EmpresaPeer::DIRPRE, $this->dirpre);
		if ($this->isColumnModified(EmpresaPeer::MUNEMP)) $criteria->add(EmpresaPeer::MUNEMP, $this->munemp);
		if ($this->isColumnModified(EmpresaPeer::CIEEDO)) $criteria->add(EmpresaPeer::CIEEDO, $this->cieedo);
		if ($this->isColumnModified(EmpresaPeer::CODCTAGAS)) $criteria->add(EmpresaPeer::CODCTAGAS, $this->codctagas);
		if ($this->isColumnModified(EmpresaPeer::CODCTABAN)) $criteria->add(EmpresaPeer::CODCTABAN, $this->codctaban);
		if ($this->isColumnModified(EmpresaPeer::CODCTARET)) $criteria->add(EmpresaPeer::CODCTARET, $this->codctaret);
		if ($this->isColumnModified(EmpresaPeer::CODCTABEN)) $criteria->add(EmpresaPeer::CODCTABEN, $this->codctaben);
		if ($this->isColumnModified(EmpresaPeer::CODCTAART)) $criteria->add(EmpresaPeer::CODCTAART, $this->codctaart);
		if ($this->isColumnModified(EmpresaPeer::CODCTAGASHAS)) $criteria->add(EmpresaPeer::CODCTAGASHAS, $this->codctagashas);
		if ($this->isColumnModified(EmpresaPeer::CODCTABANHAS)) $criteria->add(EmpresaPeer::CODCTABANHAS, $this->codctabanhas);
		if ($this->isColumnModified(EmpresaPeer::CODCTARETHAS)) $criteria->add(EmpresaPeer::CODCTARETHAS, $this->codctarethas);
		if ($this->isColumnModified(EmpresaPeer::CODCTABENHAS)) $criteria->add(EmpresaPeer::CODCTABENHAS, $this->codctabenhas);
		if ($this->isColumnModified(EmpresaPeer::CODCTAARTHAS)) $criteria->add(EmpresaPeer::CODCTAARTHAS, $this->codctaarthas);
		if ($this->isColumnModified(EmpresaPeer::CODCTAPAGEJE)) $criteria->add(EmpresaPeer::CODCTAPAGEJE, $this->codctapageje);
		if ($this->isColumnModified(EmpresaPeer::CODCTAINGDEVN)) $criteria->add(EmpresaPeer::CODCTAINGDEVN, $this->codctaingdevn);
		if ($this->isColumnModified(EmpresaPeer::CODCTAINGDEV)) $criteria->add(EmpresaPeer::CODCTAINGDEV, $this->codctaingdev);
		if ($this->isColumnModified(EmpresaPeer::DIRADM)) $criteria->add(EmpresaPeer::DIRADM, $this->diradm);
		if ($this->isColumnModified(EmpresaPeer::DIRFIN)) $criteria->add(EmpresaPeer::DIRFIN, $this->dirfin);
		if ($this->isColumnModified(EmpresaPeer::DIRPER)) $criteria->add(EmpresaPeer::DIRPER, $this->dirper);
		if ($this->isColumnModified(EmpresaPeer::DIRGEN)) $criteria->add(EmpresaPeer::DIRGEN, $this->dirgen);
		if ($this->isColumnModified(EmpresaPeer::ANAPRE)) $criteria->add(EmpresaPeer::ANAPRE, $this->anapre);
		if ($this->isColumnModified(EmpresaPeer::ANAPER)) $criteria->add(EmpresaPeer::ANAPER, $this->anaper);
		if ($this->isColumnModified(EmpresaPeer::ANAADM)) $criteria->add(EmpresaPeer::ANAADM, $this->anaadm);
		if ($this->isColumnModified(EmpresaPeer::EDOEMP)) $criteria->add(EmpresaPeer::EDOEMP, $this->edoemp);
		if ($this->isColumnModified(EmpresaPeer::ENCABEZADO)) $criteria->add(EmpresaPeer::ENCABEZADO, $this->encabezado);
		if ($this->isColumnModified(EmpresaPeer::ID)) $criteria->add(EmpresaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(EmpresaPeer::DATABASE_NAME);

		$criteria->add(EmpresaPeer::ID, $this->id);

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

		$copyObj->setNomemp($this->nomemp);

		$copyObj->setDiremp($this->diremp);

		$copyObj->setTlfemp($this->tlfemp);

		$copyObj->setCiuemp($this->ciuemp);

		$copyObj->setUrlemp($this->urlemp);

		$copyObj->setFaxemp($this->faxemp);

		$copyObj->setCodpos($this->codpos);

		$copyObj->setGobedo($this->gobedo);

		$copyObj->setConedo($this->conedo);

		$copyObj->setCleedo($this->cleedo);

		$copyObj->setDirpre($this->dirpre);

		$copyObj->setMunemp($this->munemp);

		$copyObj->setCieedo($this->cieedo);

		$copyObj->setCodctagas($this->codctagas);

		$copyObj->setCodctaban($this->codctaban);

		$copyObj->setCodctaret($this->codctaret);

		$copyObj->setCodctaben($this->codctaben);

		$copyObj->setCodctaart($this->codctaart);

		$copyObj->setCodctagashas($this->codctagashas);

		$copyObj->setCodctabanhas($this->codctabanhas);

		$copyObj->setCodctarethas($this->codctarethas);

		$copyObj->setCodctabenhas($this->codctabenhas);

		$copyObj->setCodctaarthas($this->codctaarthas);

		$copyObj->setCodctapageje($this->codctapageje);

		$copyObj->setCodctaingdevn($this->codctaingdevn);

		$copyObj->setCodctaingdev($this->codctaingdev);

		$copyObj->setDiradm($this->diradm);

		$copyObj->setDirfin($this->dirfin);

		$copyObj->setDirper($this->dirper);

		$copyObj->setDirgen($this->dirgen);

		$copyObj->setAnapre($this->anapre);

		$copyObj->setAnaper($this->anaper);

		$copyObj->setAnaadm($this->anaadm);

		$copyObj->setEdoemp($this->edoemp);

		$copyObj->setEncabezado($this->encabezado);


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
			self::$peer = new EmpresaPeer();
		}
		return self::$peer;
	}

} 