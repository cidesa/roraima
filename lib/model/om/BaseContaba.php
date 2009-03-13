<?php


abstract class BaseContaba extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $loncta;


	
	protected $numrup;


	
	protected $forcta;


	
	protected $sitfin;


	
	protected $sitfis;


	
	protected $ganper;


	
	protected $ejepre;


	
	protected $hacmun;


	
	protected $ctlgas;


	
	protected $ctling;


	
	protected $fecini;


	
	protected $feccie;


	
	protected $codtes;


	
	protected $codhac;


	
	protected $codpre;


	
	protected $codord;


	
	protected $codtesact;


	
	protected $codhacact;


	
	protected $codhacpat;


	
	protected $codtespas;


	
	protected $codhacpas;


	
	protected $codind;


	
	protected $codinh;


	
	protected $codegd;


	
	protected $codegh;


	
	protected $codres;


	
	protected $codejepre;


	
	protected $codctd;


	
	protected $codcta;


	
	protected $codresant;


	
	protected $etadef;


	
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


	
	protected $unidad;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getLoncta($val=false)
  {

    if($val) return number_format($this->loncta,2,',','.');
    else return $this->loncta;

  }
  
  public function getNumrup($val=false)
  {

    if($val) return number_format($this->numrup,2,',','.');
    else return $this->numrup;

  }
  
  public function getForcta()
  {

    return trim($this->forcta);

  }
  
  public function getSitfin()
  {

    return trim($this->sitfin);

  }
  
  public function getSitfis()
  {

    return trim($this->sitfis);

  }
  
  public function getGanper()
  {

    return trim($this->ganper);

  }
  
  public function getEjepre()
  {

    return trim($this->ejepre);

  }
  
  public function getHacmun()
  {

    return trim($this->hacmun);

  }
  
  public function getCtlgas()
  {

    return trim($this->ctlgas);

  }
  
  public function getCtling()
  {

    return trim($this->ctling);

  }
  
  public function getFecini($format = 'Y-m-d')
  {

    if ($this->fecini === null || $this->fecini === '') {
      return null;
    } elseif (!is_int($this->fecini)) {
            $ts = adodb_strtotime($this->fecini);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecini] as date/time value: " . var_export($this->fecini, true));
      }
    } else {
      $ts = $this->fecini;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFeccie($format = 'Y-m-d')
  {

    if ($this->feccie === null || $this->feccie === '') {
      return null;
    } elseif (!is_int($this->feccie)) {
            $ts = adodb_strtotime($this->feccie);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccie] as date/time value: " . var_export($this->feccie, true));
      }
    } else {
      $ts = $this->feccie;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodtes()
  {

    return trim($this->codtes);

  }
  
  public function getCodhac()
  {

    return trim($this->codhac);

  }
  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getCodord()
  {

    return trim($this->codord);

  }
  
  public function getCodtesact()
  {

    return trim($this->codtesact);

  }
  
  public function getCodhacact()
  {

    return trim($this->codhacact);

  }
  
  public function getCodhacpat()
  {

    return trim($this->codhacpat);

  }
  
  public function getCodtespas()
  {

    return trim($this->codtespas);

  }
  
  public function getCodhacpas()
  {

    return trim($this->codhacpas);

  }
  
  public function getCodind()
  {

    return trim($this->codind);

  }
  
  public function getCodinh()
  {

    return trim($this->codinh);

  }
  
  public function getCodegd()
  {

    return trim($this->codegd);

  }
  
  public function getCodegh()
  {

    return trim($this->codegh);

  }
  
  public function getCodres()
  {

    return trim($this->codres);

  }
  
  public function getCodejepre()
  {

    return trim($this->codejepre);

  }
  
  public function getCodctd()
  {

    return trim($this->codctd);

  }
  
  public function getCodcta()
  {

    return trim($this->codcta);

  }
  
  public function getCodresant()
  {

    return trim($this->codresant);

  }
  
  public function getEtadef()
  {

    return trim($this->etadef);

  }
  
  public function getCodctagas()
  {

    return trim($this->codctagas);

  }
  
  public function getCodctaban()
  {

    return trim($this->codctaban);

  }
  
  public function getCodctaret()
  {

    return trim($this->codctaret);

  }
  
  public function getCodctaben()
  {

    return trim($this->codctaben);

  }
  
  public function getCodctaart()
  {

    return trim($this->codctaart);

  }
  
  public function getCodctagashas()
  {

    return trim($this->codctagashas);

  }
  
  public function getCodctabanhas()
  {

    return trim($this->codctabanhas);

  }
  
  public function getCodctarethas()
  {

    return trim($this->codctarethas);

  }
  
  public function getCodctabenhas()
  {

    return trim($this->codctabenhas);

  }
  
  public function getCodctaarthas()
  {

    return trim($this->codctaarthas);

  }
  
  public function getCodctapageje()
  {

    return trim($this->codctapageje);

  }
  
  public function getCodctaingdevn()
  {

    return trim($this->codctaingdevn);

  }
  
  public function getCodctaingdev()
  {

    return trim($this->codctaingdev);

  }
  
  public function getUnidad()
  {

    return trim($this->unidad);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = ContabaPeer::CODEMP;
      }
  
	} 
	
	public function setLoncta($v)
	{

    if ($this->loncta !== $v) {
        $this->loncta = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ContabaPeer::LONCTA;
      }
  
	} 
	
	public function setNumrup($v)
	{

    if ($this->numrup !== $v) {
        $this->numrup = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ContabaPeer::NUMRUP;
      }
  
	} 
	
	public function setForcta($v)
	{

    if ($this->forcta !== $v) {
        $this->forcta = $v;
        $this->modifiedColumns[] = ContabaPeer::FORCTA;
      }
  
	} 
	
	public function setSitfin($v)
	{

    if ($this->sitfin !== $v) {
        $this->sitfin = $v;
        $this->modifiedColumns[] = ContabaPeer::SITFIN;
      }
  
	} 
	
	public function setSitfis($v)
	{

    if ($this->sitfis !== $v) {
        $this->sitfis = $v;
        $this->modifiedColumns[] = ContabaPeer::SITFIS;
      }
  
	} 
	
	public function setGanper($v)
	{

    if ($this->ganper !== $v) {
        $this->ganper = $v;
        $this->modifiedColumns[] = ContabaPeer::GANPER;
      }
  
	} 
	
	public function setEjepre($v)
	{

    if ($this->ejepre !== $v) {
        $this->ejepre = $v;
        $this->modifiedColumns[] = ContabaPeer::EJEPRE;
      }
  
	} 
	
	public function setHacmun($v)
	{

    if ($this->hacmun !== $v) {
        $this->hacmun = $v;
        $this->modifiedColumns[] = ContabaPeer::HACMUN;
      }
  
	} 
	
	public function setCtlgas($v)
	{

    if ($this->ctlgas !== $v) {
        $this->ctlgas = $v;
        $this->modifiedColumns[] = ContabaPeer::CTLGAS;
      }
  
	} 
	
	public function setCtling($v)
	{

    if ($this->ctling !== $v) {
        $this->ctling = $v;
        $this->modifiedColumns[] = ContabaPeer::CTLING;
      }
  
	} 
	
	public function setFecini($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecini] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecini !== $ts) {
      $this->fecini = $ts;
      $this->modifiedColumns[] = ContabaPeer::FECINI;
    }

	} 
	
	public function setFeccie($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccie] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccie !== $ts) {
      $this->feccie = $ts;
      $this->modifiedColumns[] = ContabaPeer::FECCIE;
    }

	} 
	
	public function setCodtes($v)
	{

    if ($this->codtes !== $v) {
        $this->codtes = $v;
        $this->modifiedColumns[] = ContabaPeer::CODTES;
      }
  
	} 
	
	public function setCodhac($v)
	{

    if ($this->codhac !== $v) {
        $this->codhac = $v;
        $this->modifiedColumns[] = ContabaPeer::CODHAC;
      }
  
	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = ContabaPeer::CODPRE;
      }
  
	} 
	
	public function setCodord($v)
	{

    if ($this->codord !== $v) {
        $this->codord = $v;
        $this->modifiedColumns[] = ContabaPeer::CODORD;
      }
  
	} 
	
	public function setCodtesact($v)
	{

    if ($this->codtesact !== $v) {
        $this->codtesact = $v;
        $this->modifiedColumns[] = ContabaPeer::CODTESACT;
      }
  
	} 
	
	public function setCodhacact($v)
	{

    if ($this->codhacact !== $v) {
        $this->codhacact = $v;
        $this->modifiedColumns[] = ContabaPeer::CODHACACT;
      }
  
	} 
	
	public function setCodhacpat($v)
	{

    if ($this->codhacpat !== $v) {
        $this->codhacpat = $v;
        $this->modifiedColumns[] = ContabaPeer::CODHACPAT;
      }
  
	} 
	
	public function setCodtespas($v)
	{

    if ($this->codtespas !== $v) {
        $this->codtespas = $v;
        $this->modifiedColumns[] = ContabaPeer::CODTESPAS;
      }
  
	} 
	
	public function setCodhacpas($v)
	{

    if ($this->codhacpas !== $v) {
        $this->codhacpas = $v;
        $this->modifiedColumns[] = ContabaPeer::CODHACPAS;
      }
  
	} 
	
	public function setCodind($v)
	{

    if ($this->codind !== $v) {
        $this->codind = $v;
        $this->modifiedColumns[] = ContabaPeer::CODIND;
      }
  
	} 
	
	public function setCodinh($v)
	{

    if ($this->codinh !== $v) {
        $this->codinh = $v;
        $this->modifiedColumns[] = ContabaPeer::CODINH;
      }
  
	} 
	
	public function setCodegd($v)
	{

    if ($this->codegd !== $v) {
        $this->codegd = $v;
        $this->modifiedColumns[] = ContabaPeer::CODEGD;
      }
  
	} 
	
	public function setCodegh($v)
	{

    if ($this->codegh !== $v) {
        $this->codegh = $v;
        $this->modifiedColumns[] = ContabaPeer::CODEGH;
      }
  
	} 
	
	public function setCodres($v)
	{

    if ($this->codres !== $v) {
        $this->codres = $v;
        $this->modifiedColumns[] = ContabaPeer::CODRES;
      }
  
	} 
	
	public function setCodejepre($v)
	{

    if ($this->codejepre !== $v) {
        $this->codejepre = $v;
        $this->modifiedColumns[] = ContabaPeer::CODEJEPRE;
      }
  
	} 
	
	public function setCodctd($v)
	{

    if ($this->codctd !== $v) {
        $this->codctd = $v;
        $this->modifiedColumns[] = ContabaPeer::CODCTD;
      }
  
	} 
	
	public function setCodcta($v)
	{

    if ($this->codcta !== $v) {
        $this->codcta = $v;
        $this->modifiedColumns[] = ContabaPeer::CODCTA;
      }
  
	} 
	
	public function setCodresant($v)
	{

    if ($this->codresant !== $v) {
        $this->codresant = $v;
        $this->modifiedColumns[] = ContabaPeer::CODRESANT;
      }
  
	} 
	
	public function setEtadef($v)
	{

    if ($this->etadef !== $v) {
        $this->etadef = $v;
        $this->modifiedColumns[] = ContabaPeer::ETADEF;
      }
  
	} 
	
	public function setCodctagas($v)
	{

    if ($this->codctagas !== $v) {
        $this->codctagas = $v;
        $this->modifiedColumns[] = ContabaPeer::CODCTAGAS;
      }
  
	} 
	
	public function setCodctaban($v)
	{

    if ($this->codctaban !== $v) {
        $this->codctaban = $v;
        $this->modifiedColumns[] = ContabaPeer::CODCTABAN;
      }
  
	} 
	
	public function setCodctaret($v)
	{

    if ($this->codctaret !== $v) {
        $this->codctaret = $v;
        $this->modifiedColumns[] = ContabaPeer::CODCTARET;
      }
  
	} 
	
	public function setCodctaben($v)
	{

    if ($this->codctaben !== $v) {
        $this->codctaben = $v;
        $this->modifiedColumns[] = ContabaPeer::CODCTABEN;
      }
  
	} 
	
	public function setCodctaart($v)
	{

    if ($this->codctaart !== $v) {
        $this->codctaart = $v;
        $this->modifiedColumns[] = ContabaPeer::CODCTAART;
      }
  
	} 
	
	public function setCodctagashas($v)
	{

    if ($this->codctagashas !== $v) {
        $this->codctagashas = $v;
        $this->modifiedColumns[] = ContabaPeer::CODCTAGASHAS;
      }
  
	} 
	
	public function setCodctabanhas($v)
	{

    if ($this->codctabanhas !== $v) {
        $this->codctabanhas = $v;
        $this->modifiedColumns[] = ContabaPeer::CODCTABANHAS;
      }
  
	} 
	
	public function setCodctarethas($v)
	{

    if ($this->codctarethas !== $v) {
        $this->codctarethas = $v;
        $this->modifiedColumns[] = ContabaPeer::CODCTARETHAS;
      }
  
	} 
	
	public function setCodctabenhas($v)
	{

    if ($this->codctabenhas !== $v) {
        $this->codctabenhas = $v;
        $this->modifiedColumns[] = ContabaPeer::CODCTABENHAS;
      }
  
	} 
	
	public function setCodctaarthas($v)
	{

    if ($this->codctaarthas !== $v) {
        $this->codctaarthas = $v;
        $this->modifiedColumns[] = ContabaPeer::CODCTAARTHAS;
      }
  
	} 
	
	public function setCodctapageje($v)
	{

    if ($this->codctapageje !== $v) {
        $this->codctapageje = $v;
        $this->modifiedColumns[] = ContabaPeer::CODCTAPAGEJE;
      }
  
	} 
	
	public function setCodctaingdevn($v)
	{

    if ($this->codctaingdevn !== $v) {
        $this->codctaingdevn = $v;
        $this->modifiedColumns[] = ContabaPeer::CODCTAINGDEVN;
      }
  
	} 
	
	public function setCodctaingdev($v)
	{

    if ($this->codctaingdev !== $v) {
        $this->codctaingdev = $v;
        $this->modifiedColumns[] = ContabaPeer::CODCTAINGDEV;
      }
  
	} 
	
	public function setUnidad($v)
	{

    if ($this->unidad !== $v) {
        $this->unidad = $v;
        $this->modifiedColumns[] = ContabaPeer::UNIDAD;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ContabaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->loncta = $rs->getFloat($startcol + 1);

      $this->numrup = $rs->getFloat($startcol + 2);

      $this->forcta = $rs->getString($startcol + 3);

      $this->sitfin = $rs->getString($startcol + 4);

      $this->sitfis = $rs->getString($startcol + 5);

      $this->ganper = $rs->getString($startcol + 6);

      $this->ejepre = $rs->getString($startcol + 7);

      $this->hacmun = $rs->getString($startcol + 8);

      $this->ctlgas = $rs->getString($startcol + 9);

      $this->ctling = $rs->getString($startcol + 10);

      $this->fecini = $rs->getDate($startcol + 11, null);

      $this->feccie = $rs->getDate($startcol + 12, null);

      $this->codtes = $rs->getString($startcol + 13);

      $this->codhac = $rs->getString($startcol + 14);

      $this->codpre = $rs->getString($startcol + 15);

      $this->codord = $rs->getString($startcol + 16);

      $this->codtesact = $rs->getString($startcol + 17);

      $this->codhacact = $rs->getString($startcol + 18);

      $this->codhacpat = $rs->getString($startcol + 19);

      $this->codtespas = $rs->getString($startcol + 20);

      $this->codhacpas = $rs->getString($startcol + 21);

      $this->codind = $rs->getString($startcol + 22);

      $this->codinh = $rs->getString($startcol + 23);

      $this->codegd = $rs->getString($startcol + 24);

      $this->codegh = $rs->getString($startcol + 25);

      $this->codres = $rs->getString($startcol + 26);

      $this->codejepre = $rs->getString($startcol + 27);

      $this->codctd = $rs->getString($startcol + 28);

      $this->codcta = $rs->getString($startcol + 29);

      $this->codresant = $rs->getString($startcol + 30);

      $this->etadef = $rs->getString($startcol + 31);

      $this->codctagas = $rs->getString($startcol + 32);

      $this->codctaban = $rs->getString($startcol + 33);

      $this->codctaret = $rs->getString($startcol + 34);

      $this->codctaben = $rs->getString($startcol + 35);

      $this->codctaart = $rs->getString($startcol + 36);

      $this->codctagashas = $rs->getString($startcol + 37);

      $this->codctabanhas = $rs->getString($startcol + 38);

      $this->codctarethas = $rs->getString($startcol + 39);

      $this->codctabenhas = $rs->getString($startcol + 40);

      $this->codctaarthas = $rs->getString($startcol + 41);

      $this->codctapageje = $rs->getString($startcol + 42);

      $this->codctaingdevn = $rs->getString($startcol + 43);

      $this->codctaingdev = $rs->getString($startcol + 44);

      $this->unidad = $rs->getString($startcol + 45);

      $this->id = $rs->getInt($startcol + 46);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 47; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Contaba object", $e);
    }
  }


  protected function afterHydrate()
  {

  }
    
  
  public function __call($m, $a)
    {
      $prefijo = substr($m,0,3);
    $metodo = strtolower(substr($m,3));
        if($prefijo=='get'){
      if(isset($this->$metodo)) return $this->$metodo;
      else return '';
    }elseif($prefijo=='set'){
      if(isset($this->$metodo)) $this->$metodo = $a[0];
    }else call_user_func_array($m, $a);

    }

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ContabaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ContabaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ContabaPeer::DATABASE_NAME);
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
					$pk = ContabaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ContabaPeer::doUpdate($this, $con);
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


			if (($retval = ContabaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ContabaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getLoncta();
				break;
			case 2:
				return $this->getNumrup();
				break;
			case 3:
				return $this->getForcta();
				break;
			case 4:
				return $this->getSitfin();
				break;
			case 5:
				return $this->getSitfis();
				break;
			case 6:
				return $this->getGanper();
				break;
			case 7:
				return $this->getEjepre();
				break;
			case 8:
				return $this->getHacmun();
				break;
			case 9:
				return $this->getCtlgas();
				break;
			case 10:
				return $this->getCtling();
				break;
			case 11:
				return $this->getFecini();
				break;
			case 12:
				return $this->getFeccie();
				break;
			case 13:
				return $this->getCodtes();
				break;
			case 14:
				return $this->getCodhac();
				break;
			case 15:
				return $this->getCodpre();
				break;
			case 16:
				return $this->getCodord();
				break;
			case 17:
				return $this->getCodtesact();
				break;
			case 18:
				return $this->getCodhacact();
				break;
			case 19:
				return $this->getCodhacpat();
				break;
			case 20:
				return $this->getCodtespas();
				break;
			case 21:
				return $this->getCodhacpas();
				break;
			case 22:
				return $this->getCodind();
				break;
			case 23:
				return $this->getCodinh();
				break;
			case 24:
				return $this->getCodegd();
				break;
			case 25:
				return $this->getCodegh();
				break;
			case 26:
				return $this->getCodres();
				break;
			case 27:
				return $this->getCodejepre();
				break;
			case 28:
				return $this->getCodctd();
				break;
			case 29:
				return $this->getCodcta();
				break;
			case 30:
				return $this->getCodresant();
				break;
			case 31:
				return $this->getEtadef();
				break;
			case 32:
				return $this->getCodctagas();
				break;
			case 33:
				return $this->getCodctaban();
				break;
			case 34:
				return $this->getCodctaret();
				break;
			case 35:
				return $this->getCodctaben();
				break;
			case 36:
				return $this->getCodctaart();
				break;
			case 37:
				return $this->getCodctagashas();
				break;
			case 38:
				return $this->getCodctabanhas();
				break;
			case 39:
				return $this->getCodctarethas();
				break;
			case 40:
				return $this->getCodctabenhas();
				break;
			case 41:
				return $this->getCodctaarthas();
				break;
			case 42:
				return $this->getCodctapageje();
				break;
			case 43:
				return $this->getCodctaingdevn();
				break;
			case 44:
				return $this->getCodctaingdev();
				break;
			case 45:
				return $this->getUnidad();
				break;
			case 46:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ContabaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getLoncta(),
			$keys[2] => $this->getNumrup(),
			$keys[3] => $this->getForcta(),
			$keys[4] => $this->getSitfin(),
			$keys[5] => $this->getSitfis(),
			$keys[6] => $this->getGanper(),
			$keys[7] => $this->getEjepre(),
			$keys[8] => $this->getHacmun(),
			$keys[9] => $this->getCtlgas(),
			$keys[10] => $this->getCtling(),
			$keys[11] => $this->getFecini(),
			$keys[12] => $this->getFeccie(),
			$keys[13] => $this->getCodtes(),
			$keys[14] => $this->getCodhac(),
			$keys[15] => $this->getCodpre(),
			$keys[16] => $this->getCodord(),
			$keys[17] => $this->getCodtesact(),
			$keys[18] => $this->getCodhacact(),
			$keys[19] => $this->getCodhacpat(),
			$keys[20] => $this->getCodtespas(),
			$keys[21] => $this->getCodhacpas(),
			$keys[22] => $this->getCodind(),
			$keys[23] => $this->getCodinh(),
			$keys[24] => $this->getCodegd(),
			$keys[25] => $this->getCodegh(),
			$keys[26] => $this->getCodres(),
			$keys[27] => $this->getCodejepre(),
			$keys[28] => $this->getCodctd(),
			$keys[29] => $this->getCodcta(),
			$keys[30] => $this->getCodresant(),
			$keys[31] => $this->getEtadef(),
			$keys[32] => $this->getCodctagas(),
			$keys[33] => $this->getCodctaban(),
			$keys[34] => $this->getCodctaret(),
			$keys[35] => $this->getCodctaben(),
			$keys[36] => $this->getCodctaart(),
			$keys[37] => $this->getCodctagashas(),
			$keys[38] => $this->getCodctabanhas(),
			$keys[39] => $this->getCodctarethas(),
			$keys[40] => $this->getCodctabenhas(),
			$keys[41] => $this->getCodctaarthas(),
			$keys[42] => $this->getCodctapageje(),
			$keys[43] => $this->getCodctaingdevn(),
			$keys[44] => $this->getCodctaingdev(),
			$keys[45] => $this->getUnidad(),
			$keys[46] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ContabaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setLoncta($value);
				break;
			case 2:
				$this->setNumrup($value);
				break;
			case 3:
				$this->setForcta($value);
				break;
			case 4:
				$this->setSitfin($value);
				break;
			case 5:
				$this->setSitfis($value);
				break;
			case 6:
				$this->setGanper($value);
				break;
			case 7:
				$this->setEjepre($value);
				break;
			case 8:
				$this->setHacmun($value);
				break;
			case 9:
				$this->setCtlgas($value);
				break;
			case 10:
				$this->setCtling($value);
				break;
			case 11:
				$this->setFecini($value);
				break;
			case 12:
				$this->setFeccie($value);
				break;
			case 13:
				$this->setCodtes($value);
				break;
			case 14:
				$this->setCodhac($value);
				break;
			case 15:
				$this->setCodpre($value);
				break;
			case 16:
				$this->setCodord($value);
				break;
			case 17:
				$this->setCodtesact($value);
				break;
			case 18:
				$this->setCodhacact($value);
				break;
			case 19:
				$this->setCodhacpat($value);
				break;
			case 20:
				$this->setCodtespas($value);
				break;
			case 21:
				$this->setCodhacpas($value);
				break;
			case 22:
				$this->setCodind($value);
				break;
			case 23:
				$this->setCodinh($value);
				break;
			case 24:
				$this->setCodegd($value);
				break;
			case 25:
				$this->setCodegh($value);
				break;
			case 26:
				$this->setCodres($value);
				break;
			case 27:
				$this->setCodejepre($value);
				break;
			case 28:
				$this->setCodctd($value);
				break;
			case 29:
				$this->setCodcta($value);
				break;
			case 30:
				$this->setCodresant($value);
				break;
			case 31:
				$this->setEtadef($value);
				break;
			case 32:
				$this->setCodctagas($value);
				break;
			case 33:
				$this->setCodctaban($value);
				break;
			case 34:
				$this->setCodctaret($value);
				break;
			case 35:
				$this->setCodctaben($value);
				break;
			case 36:
				$this->setCodctaart($value);
				break;
			case 37:
				$this->setCodctagashas($value);
				break;
			case 38:
				$this->setCodctabanhas($value);
				break;
			case 39:
				$this->setCodctarethas($value);
				break;
			case 40:
				$this->setCodctabenhas($value);
				break;
			case 41:
				$this->setCodctaarthas($value);
				break;
			case 42:
				$this->setCodctapageje($value);
				break;
			case 43:
				$this->setCodctaingdevn($value);
				break;
			case 44:
				$this->setCodctaingdev($value);
				break;
			case 45:
				$this->setUnidad($value);
				break;
			case 46:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ContabaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setLoncta($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumrup($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setForcta($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setSitfin($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setSitfis($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setGanper($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setEjepre($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setHacmun($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCtlgas($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCtling($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFecini($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFeccie($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCodtes($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCodhac($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCodpre($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCodord($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCodtesact($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCodhacact($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCodhacpat($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCodtespas($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setCodhacpas($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setCodind($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setCodinh($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setCodegd($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setCodegh($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setCodres($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setCodejepre($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setCodctd($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setCodcta($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setCodresant($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setEtadef($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setCodctagas($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setCodctaban($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setCodctaret($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setCodctaben($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setCodctaart($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setCodctagashas($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setCodctabanhas($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setCodctarethas($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setCodctabenhas($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setCodctaarthas($arr[$keys[41]]);
		if (array_key_exists($keys[42], $arr)) $this->setCodctapageje($arr[$keys[42]]);
		if (array_key_exists($keys[43], $arr)) $this->setCodctaingdevn($arr[$keys[43]]);
		if (array_key_exists($keys[44], $arr)) $this->setCodctaingdev($arr[$keys[44]]);
		if (array_key_exists($keys[45], $arr)) $this->setUnidad($arr[$keys[45]]);
		if (array_key_exists($keys[46], $arr)) $this->setId($arr[$keys[46]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ContabaPeer::DATABASE_NAME);

		if ($this->isColumnModified(ContabaPeer::CODEMP)) $criteria->add(ContabaPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(ContabaPeer::LONCTA)) $criteria->add(ContabaPeer::LONCTA, $this->loncta);
		if ($this->isColumnModified(ContabaPeer::NUMRUP)) $criteria->add(ContabaPeer::NUMRUP, $this->numrup);
		if ($this->isColumnModified(ContabaPeer::FORCTA)) $criteria->add(ContabaPeer::FORCTA, $this->forcta);
		if ($this->isColumnModified(ContabaPeer::SITFIN)) $criteria->add(ContabaPeer::SITFIN, $this->sitfin);
		if ($this->isColumnModified(ContabaPeer::SITFIS)) $criteria->add(ContabaPeer::SITFIS, $this->sitfis);
		if ($this->isColumnModified(ContabaPeer::GANPER)) $criteria->add(ContabaPeer::GANPER, $this->ganper);
		if ($this->isColumnModified(ContabaPeer::EJEPRE)) $criteria->add(ContabaPeer::EJEPRE, $this->ejepre);
		if ($this->isColumnModified(ContabaPeer::HACMUN)) $criteria->add(ContabaPeer::HACMUN, $this->hacmun);
		if ($this->isColumnModified(ContabaPeer::CTLGAS)) $criteria->add(ContabaPeer::CTLGAS, $this->ctlgas);
		if ($this->isColumnModified(ContabaPeer::CTLING)) $criteria->add(ContabaPeer::CTLING, $this->ctling);
		if ($this->isColumnModified(ContabaPeer::FECINI)) $criteria->add(ContabaPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(ContabaPeer::FECCIE)) $criteria->add(ContabaPeer::FECCIE, $this->feccie);
		if ($this->isColumnModified(ContabaPeer::CODTES)) $criteria->add(ContabaPeer::CODTES, $this->codtes);
		if ($this->isColumnModified(ContabaPeer::CODHAC)) $criteria->add(ContabaPeer::CODHAC, $this->codhac);
		if ($this->isColumnModified(ContabaPeer::CODPRE)) $criteria->add(ContabaPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(ContabaPeer::CODORD)) $criteria->add(ContabaPeer::CODORD, $this->codord);
		if ($this->isColumnModified(ContabaPeer::CODTESACT)) $criteria->add(ContabaPeer::CODTESACT, $this->codtesact);
		if ($this->isColumnModified(ContabaPeer::CODHACACT)) $criteria->add(ContabaPeer::CODHACACT, $this->codhacact);
		if ($this->isColumnModified(ContabaPeer::CODHACPAT)) $criteria->add(ContabaPeer::CODHACPAT, $this->codhacpat);
		if ($this->isColumnModified(ContabaPeer::CODTESPAS)) $criteria->add(ContabaPeer::CODTESPAS, $this->codtespas);
		if ($this->isColumnModified(ContabaPeer::CODHACPAS)) $criteria->add(ContabaPeer::CODHACPAS, $this->codhacpas);
		if ($this->isColumnModified(ContabaPeer::CODIND)) $criteria->add(ContabaPeer::CODIND, $this->codind);
		if ($this->isColumnModified(ContabaPeer::CODINH)) $criteria->add(ContabaPeer::CODINH, $this->codinh);
		if ($this->isColumnModified(ContabaPeer::CODEGD)) $criteria->add(ContabaPeer::CODEGD, $this->codegd);
		if ($this->isColumnModified(ContabaPeer::CODEGH)) $criteria->add(ContabaPeer::CODEGH, $this->codegh);
		if ($this->isColumnModified(ContabaPeer::CODRES)) $criteria->add(ContabaPeer::CODRES, $this->codres);
		if ($this->isColumnModified(ContabaPeer::CODEJEPRE)) $criteria->add(ContabaPeer::CODEJEPRE, $this->codejepre);
		if ($this->isColumnModified(ContabaPeer::CODCTD)) $criteria->add(ContabaPeer::CODCTD, $this->codctd);
		if ($this->isColumnModified(ContabaPeer::CODCTA)) $criteria->add(ContabaPeer::CODCTA, $this->codcta);
		if ($this->isColumnModified(ContabaPeer::CODRESANT)) $criteria->add(ContabaPeer::CODRESANT, $this->codresant);
		if ($this->isColumnModified(ContabaPeer::ETADEF)) $criteria->add(ContabaPeer::ETADEF, $this->etadef);
		if ($this->isColumnModified(ContabaPeer::CODCTAGAS)) $criteria->add(ContabaPeer::CODCTAGAS, $this->codctagas);
		if ($this->isColumnModified(ContabaPeer::CODCTABAN)) $criteria->add(ContabaPeer::CODCTABAN, $this->codctaban);
		if ($this->isColumnModified(ContabaPeer::CODCTARET)) $criteria->add(ContabaPeer::CODCTARET, $this->codctaret);
		if ($this->isColumnModified(ContabaPeer::CODCTABEN)) $criteria->add(ContabaPeer::CODCTABEN, $this->codctaben);
		if ($this->isColumnModified(ContabaPeer::CODCTAART)) $criteria->add(ContabaPeer::CODCTAART, $this->codctaart);
		if ($this->isColumnModified(ContabaPeer::CODCTAGASHAS)) $criteria->add(ContabaPeer::CODCTAGASHAS, $this->codctagashas);
		if ($this->isColumnModified(ContabaPeer::CODCTABANHAS)) $criteria->add(ContabaPeer::CODCTABANHAS, $this->codctabanhas);
		if ($this->isColumnModified(ContabaPeer::CODCTARETHAS)) $criteria->add(ContabaPeer::CODCTARETHAS, $this->codctarethas);
		if ($this->isColumnModified(ContabaPeer::CODCTABENHAS)) $criteria->add(ContabaPeer::CODCTABENHAS, $this->codctabenhas);
		if ($this->isColumnModified(ContabaPeer::CODCTAARTHAS)) $criteria->add(ContabaPeer::CODCTAARTHAS, $this->codctaarthas);
		if ($this->isColumnModified(ContabaPeer::CODCTAPAGEJE)) $criteria->add(ContabaPeer::CODCTAPAGEJE, $this->codctapageje);
		if ($this->isColumnModified(ContabaPeer::CODCTAINGDEVN)) $criteria->add(ContabaPeer::CODCTAINGDEVN, $this->codctaingdevn);
		if ($this->isColumnModified(ContabaPeer::CODCTAINGDEV)) $criteria->add(ContabaPeer::CODCTAINGDEV, $this->codctaingdev);
		if ($this->isColumnModified(ContabaPeer::UNIDAD)) $criteria->add(ContabaPeer::UNIDAD, $this->unidad);
		if ($this->isColumnModified(ContabaPeer::ID)) $criteria->add(ContabaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ContabaPeer::DATABASE_NAME);

		$criteria->add(ContabaPeer::ID, $this->id);

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

		$copyObj->setLoncta($this->loncta);

		$copyObj->setNumrup($this->numrup);

		$copyObj->setForcta($this->forcta);

		$copyObj->setSitfin($this->sitfin);

		$copyObj->setSitfis($this->sitfis);

		$copyObj->setGanper($this->ganper);

		$copyObj->setEjepre($this->ejepre);

		$copyObj->setHacmun($this->hacmun);

		$copyObj->setCtlgas($this->ctlgas);

		$copyObj->setCtling($this->ctling);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFeccie($this->feccie);

		$copyObj->setCodtes($this->codtes);

		$copyObj->setCodhac($this->codhac);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setCodord($this->codord);

		$copyObj->setCodtesact($this->codtesact);

		$copyObj->setCodhacact($this->codhacact);

		$copyObj->setCodhacpat($this->codhacpat);

		$copyObj->setCodtespas($this->codtespas);

		$copyObj->setCodhacpas($this->codhacpas);

		$copyObj->setCodind($this->codind);

		$copyObj->setCodinh($this->codinh);

		$copyObj->setCodegd($this->codegd);

		$copyObj->setCodegh($this->codegh);

		$copyObj->setCodres($this->codres);

		$copyObj->setCodejepre($this->codejepre);

		$copyObj->setCodctd($this->codctd);

		$copyObj->setCodcta($this->codcta);

		$copyObj->setCodresant($this->codresant);

		$copyObj->setEtadef($this->etadef);

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

		$copyObj->setUnidad($this->unidad);


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
			self::$peer = new ContabaPeer();
		}
		return self::$peer;
	}

} 