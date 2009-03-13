<?php


abstract class BaseFcreginm1 extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $serial;


	
	protected $tipo_bolet;


	
	protected $nombre_pro;


	
	protected $ci_rif_pro;


	
	protected $dir_inmueb;


	
	protected $telefono;


	
	protected $telefono2;


	
	protected $nomb_ad_ec;


	
	protected $dir_adm_en;


	
	protected $n_document;


	
	protected $fecha_docu;


	
	protected $uso_inmueb;


	
	protected $tenencia;


	
	protected $area;


	
	protected $area2;


	
	protected $ubicacion;


	
	protected $ubicacion2;


	
	protected $tipo;


	
	protected $tipo2;


	
	protected $imp_anual;


	
	protected $imp_anual2;


	
	protected $imp_trim;


	
	protected $imp_trim2;


	
	protected $mont_imp;


	
	protected $observacio;


	
	protected $cod_catast;


	
	protected $fecha_elab;


	
	protected $ubi_inmueb;


	
	protected $norte;


	
	protected $sur;


	
	protected $este;


	
	protected $oeste;


	
	protected $adquiere;


	
	protected $f_inscripc;


	
	protected $folios;


	
	protected $tomo;


	
	protected $trim;


	
	protected $prot;


	
	protected $frente;


	
	protected $fondo;


	
	protected $precio;


	
	protected $dir_propie;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getSerial($val=false)
  {

    if($val) return number_format($this->serial,2,',','.');
    else return $this->serial;

  }
  
  public function getTipoBolet()
  {

    return trim($this->tipo_bolet);

  }
  
  public function getNombrePro()
  {

    return trim($this->nombre_pro);

  }
  
  public function getCiRifPro()
  {

    return trim($this->ci_rif_pro);

  }
  
  public function getDirInmueb()
  {

    return trim($this->dir_inmueb);

  }
  
  public function getTelefono()
  {

    return trim($this->telefono);

  }
  
  public function getTelefono2()
  {

    return trim($this->telefono2);

  }
  
  public function getNombAdEc()
  {

    return trim($this->nomb_ad_ec);

  }
  
  public function getDirAdmEn()
  {

    return trim($this->dir_adm_en);

  }
  
  public function getNDocument($val=false)
  {

    if($val) return number_format($this->n_document,2,',','.');
    else return $this->n_document;

  }
  
  public function getFechaDocu($format = 'Y-m-d')
  {

    if ($this->fecha_docu === null || $this->fecha_docu === '') {
      return null;
    } elseif (!is_int($this->fecha_docu)) {
            $ts = adodb_strtotime($this->fecha_docu);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecha_docu] as date/time value: " . var_export($this->fecha_docu, true));
      }
    } else {
      $ts = $this->fecha_docu;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getUsoInmueb()
  {

    return trim($this->uso_inmueb);

  }
  
  public function getTenencia()
  {

    return trim($this->tenencia);

  }
  
  public function getArea($val=false)
  {

    if($val) return number_format($this->area,2,',','.');
    else return $this->area;

  }
  
  public function getArea2($val=false)
  {

    if($val) return number_format($this->area2,2,',','.');
    else return $this->area2;

  }
  
  public function getUbicacion($val=false)
  {

    if($val) return number_format($this->ubicacion,2,',','.');
    else return $this->ubicacion;

  }
  
  public function getUbicacion2($val=false)
  {

    if($val) return number_format($this->ubicacion2,2,',','.');
    else return $this->ubicacion2;

  }
  
  public function getTipo()
  {

    return trim($this->tipo);

  }
  
  public function getTipo2()
  {

    return trim($this->tipo2);

  }
  
  public function getImpAnual($val=false)
  {

    if($val) return number_format($this->imp_anual,2,',','.');
    else return $this->imp_anual;

  }
  
  public function getImpAnual2($val=false)
  {

    if($val) return number_format($this->imp_anual2,2,',','.');
    else return $this->imp_anual2;

  }
  
  public function getImpTrim($val=false)
  {

    if($val) return number_format($this->imp_trim,2,',','.');
    else return $this->imp_trim;

  }
  
  public function getImpTrim2($val=false)
  {

    if($val) return number_format($this->imp_trim2,2,',','.');
    else return $this->imp_trim2;

  }
  
  public function getMontImp($val=false)
  {

    if($val) return number_format($this->mont_imp,2,',','.');
    else return $this->mont_imp;

  }
  
  public function getObservacio()
  {

    return trim($this->observacio);

  }
  
  public function getCodCatast()
  {

    return trim($this->cod_catast);

  }
  
  public function getFechaElab($format = 'Y-m-d')
  {

    if ($this->fecha_elab === null || $this->fecha_elab === '') {
      return null;
    } elseif (!is_int($this->fecha_elab)) {
            $ts = adodb_strtotime($this->fecha_elab);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecha_elab] as date/time value: " . var_export($this->fecha_elab, true));
      }
    } else {
      $ts = $this->fecha_elab;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getUbiInmueb()
  {

    return trim($this->ubi_inmueb);

  }
  
  public function getNorte()
  {

    return trim($this->norte);

  }
  
  public function getSur()
  {

    return trim($this->sur);

  }
  
  public function getEste()
  {

    return trim($this->este);

  }
  
  public function getOeste()
  {

    return trim($this->oeste);

  }
  
  public function getAdquiere()
  {

    return trim($this->adquiere);

  }
  
  public function getFInscripc($format = 'Y-m-d')
  {

    if ($this->f_inscripc === null || $this->f_inscripc === '') {
      return null;
    } elseif (!is_int($this->f_inscripc)) {
            $ts = adodb_strtotime($this->f_inscripc);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [f_inscripc] as date/time value: " . var_export($this->f_inscripc, true));
      }
    } else {
      $ts = $this->f_inscripc;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFolios()
  {

    return trim($this->folios);

  }
  
  public function getTomo()
  {

    return trim($this->tomo);

  }
  
  public function getTrim()
  {

    return trim($this->trim);

  }
  
  public function getProt()
  {

    return trim($this->prot);

  }
  
  public function getFrente()
  {

    return trim($this->frente);

  }
  
  public function getFondo()
  {

    return trim($this->fondo);

  }
  
  public function getPrecio($val=false)
  {

    if($val) return number_format($this->precio,2,',','.');
    else return $this->precio;

  }
  
  public function getDirPropie()
  {

    return trim($this->dir_propie);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setSerial($v)
	{

    if ($this->serial !== $v) {
        $this->serial = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Fcreginm1Peer::SERIAL;
      }
  
	} 
	
	public function setTipoBolet($v)
	{

    if ($this->tipo_bolet !== $v) {
        $this->tipo_bolet = $v;
        $this->modifiedColumns[] = Fcreginm1Peer::TIPO_BOLET;
      }
  
	} 
	
	public function setNombrePro($v)
	{

    if ($this->nombre_pro !== $v) {
        $this->nombre_pro = $v;
        $this->modifiedColumns[] = Fcreginm1Peer::NOMBRE_PRO;
      }
  
	} 
	
	public function setCiRifPro($v)
	{

    if ($this->ci_rif_pro !== $v) {
        $this->ci_rif_pro = $v;
        $this->modifiedColumns[] = Fcreginm1Peer::CI_RIF_PRO;
      }
  
	} 
	
	public function setDirInmueb($v)
	{

    if ($this->dir_inmueb !== $v) {
        $this->dir_inmueb = $v;
        $this->modifiedColumns[] = Fcreginm1Peer::DIR_INMUEB;
      }
  
	} 
	
	public function setTelefono($v)
	{

    if ($this->telefono !== $v) {
        $this->telefono = $v;
        $this->modifiedColumns[] = Fcreginm1Peer::TELEFONO;
      }
  
	} 
	
	public function setTelefono2($v)
	{

    if ($this->telefono2 !== $v) {
        $this->telefono2 = $v;
        $this->modifiedColumns[] = Fcreginm1Peer::TELEFONO2;
      }
  
	} 
	
	public function setNombAdEc($v)
	{

    if ($this->nomb_ad_ec !== $v) {
        $this->nomb_ad_ec = $v;
        $this->modifiedColumns[] = Fcreginm1Peer::NOMB_AD_EC;
      }
  
	} 
	
	public function setDirAdmEn($v)
	{

    if ($this->dir_adm_en !== $v) {
        $this->dir_adm_en = $v;
        $this->modifiedColumns[] = Fcreginm1Peer::DIR_ADM_EN;
      }
  
	} 
	
	public function setNDocument($v)
	{

    if ($this->n_document !== $v) {
        $this->n_document = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Fcreginm1Peer::N_DOCUMENT;
      }
  
	} 
	
	public function setFechaDocu($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecha_docu] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecha_docu !== $ts) {
      $this->fecha_docu = $ts;
      $this->modifiedColumns[] = Fcreginm1Peer::FECHA_DOCU;
    }

	} 
	
	public function setUsoInmueb($v)
	{

    if ($this->uso_inmueb !== $v) {
        $this->uso_inmueb = $v;
        $this->modifiedColumns[] = Fcreginm1Peer::USO_INMUEB;
      }
  
	} 
	
	public function setTenencia($v)
	{

    if ($this->tenencia !== $v) {
        $this->tenencia = $v;
        $this->modifiedColumns[] = Fcreginm1Peer::TENENCIA;
      }
  
	} 
	
	public function setArea($v)
	{

    if ($this->area !== $v) {
        $this->area = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Fcreginm1Peer::AREA;
      }
  
	} 
	
	public function setArea2($v)
	{

    if ($this->area2 !== $v) {
        $this->area2 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Fcreginm1Peer::AREA2;
      }
  
	} 
	
	public function setUbicacion($v)
	{

    if ($this->ubicacion !== $v) {
        $this->ubicacion = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Fcreginm1Peer::UBICACION;
      }
  
	} 
	
	public function setUbicacion2($v)
	{

    if ($this->ubicacion2 !== $v) {
        $this->ubicacion2 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Fcreginm1Peer::UBICACION2;
      }
  
	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = Fcreginm1Peer::TIPO;
      }
  
	} 
	
	public function setTipo2($v)
	{

    if ($this->tipo2 !== $v) {
        $this->tipo2 = $v;
        $this->modifiedColumns[] = Fcreginm1Peer::TIPO2;
      }
  
	} 
	
	public function setImpAnual($v)
	{

    if ($this->imp_anual !== $v) {
        $this->imp_anual = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Fcreginm1Peer::IMP_ANUAL;
      }
  
	} 
	
	public function setImpAnual2($v)
	{

    if ($this->imp_anual2 !== $v) {
        $this->imp_anual2 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Fcreginm1Peer::IMP_ANUAL2;
      }
  
	} 
	
	public function setImpTrim($v)
	{

    if ($this->imp_trim !== $v) {
        $this->imp_trim = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Fcreginm1Peer::IMP_TRIM;
      }
  
	} 
	
	public function setImpTrim2($v)
	{

    if ($this->imp_trim2 !== $v) {
        $this->imp_trim2 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Fcreginm1Peer::IMP_TRIM2;
      }
  
	} 
	
	public function setMontImp($v)
	{

    if ($this->mont_imp !== $v) {
        $this->mont_imp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Fcreginm1Peer::MONT_IMP;
      }
  
	} 
	
	public function setObservacio($v)
	{

    if ($this->observacio !== $v) {
        $this->observacio = $v;
        $this->modifiedColumns[] = Fcreginm1Peer::OBSERVACIO;
      }
  
	} 
	
	public function setCodCatast($v)
	{

    if ($this->cod_catast !== $v) {
        $this->cod_catast = $v;
        $this->modifiedColumns[] = Fcreginm1Peer::COD_CATAST;
      }
  
	} 
	
	public function setFechaElab($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecha_elab] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecha_elab !== $ts) {
      $this->fecha_elab = $ts;
      $this->modifiedColumns[] = Fcreginm1Peer::FECHA_ELAB;
    }

	} 
	
	public function setUbiInmueb($v)
	{

    if ($this->ubi_inmueb !== $v) {
        $this->ubi_inmueb = $v;
        $this->modifiedColumns[] = Fcreginm1Peer::UBI_INMUEB;
      }
  
	} 
	
	public function setNorte($v)
	{

    if ($this->norte !== $v) {
        $this->norte = $v;
        $this->modifiedColumns[] = Fcreginm1Peer::NORTE;
      }
  
	} 
	
	public function setSur($v)
	{

    if ($this->sur !== $v) {
        $this->sur = $v;
        $this->modifiedColumns[] = Fcreginm1Peer::SUR;
      }
  
	} 
	
	public function setEste($v)
	{

    if ($this->este !== $v) {
        $this->este = $v;
        $this->modifiedColumns[] = Fcreginm1Peer::ESTE;
      }
  
	} 
	
	public function setOeste($v)
	{

    if ($this->oeste !== $v) {
        $this->oeste = $v;
        $this->modifiedColumns[] = Fcreginm1Peer::OESTE;
      }
  
	} 
	
	public function setAdquiere($v)
	{

    if ($this->adquiere !== $v) {
        $this->adquiere = $v;
        $this->modifiedColumns[] = Fcreginm1Peer::ADQUIERE;
      }
  
	} 
	
	public function setFInscripc($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [f_inscripc] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->f_inscripc !== $ts) {
      $this->f_inscripc = $ts;
      $this->modifiedColumns[] = Fcreginm1Peer::F_INSCRIPC;
    }

	} 
	
	public function setFolios($v)
	{

    if ($this->folios !== $v) {
        $this->folios = $v;
        $this->modifiedColumns[] = Fcreginm1Peer::FOLIOS;
      }
  
	} 
	
	public function setTomo($v)
	{

    if ($this->tomo !== $v) {
        $this->tomo = $v;
        $this->modifiedColumns[] = Fcreginm1Peer::TOMO;
      }
  
	} 
	
	public function setTrim($v)
	{

    if ($this->trim !== $v) {
        $this->trim = $v;
        $this->modifiedColumns[] = Fcreginm1Peer::TRIM;
      }
  
	} 
	
	public function setProt($v)
	{

    if ($this->prot !== $v) {
        $this->prot = $v;
        $this->modifiedColumns[] = Fcreginm1Peer::PROT;
      }
  
	} 
	
	public function setFrente($v)
	{

    if ($this->frente !== $v) {
        $this->frente = $v;
        $this->modifiedColumns[] = Fcreginm1Peer::FRENTE;
      }
  
	} 
	
	public function setFondo($v)
	{

    if ($this->fondo !== $v) {
        $this->fondo = $v;
        $this->modifiedColumns[] = Fcreginm1Peer::FONDO;
      }
  
	} 
	
	public function setPrecio($v)
	{

    if ($this->precio !== $v) {
        $this->precio = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Fcreginm1Peer::PRECIO;
      }
  
	} 
	
	public function setDirPropie($v)
	{

    if ($this->dir_propie !== $v) {
        $this->dir_propie = $v;
        $this->modifiedColumns[] = Fcreginm1Peer::DIR_PROPIE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = Fcreginm1Peer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->serial = $rs->getFloat($startcol + 0);

      $this->tipo_bolet = $rs->getString($startcol + 1);

      $this->nombre_pro = $rs->getString($startcol + 2);

      $this->ci_rif_pro = $rs->getString($startcol + 3);

      $this->dir_inmueb = $rs->getString($startcol + 4);

      $this->telefono = $rs->getString($startcol + 5);

      $this->telefono2 = $rs->getString($startcol + 6);

      $this->nomb_ad_ec = $rs->getString($startcol + 7);

      $this->dir_adm_en = $rs->getString($startcol + 8);

      $this->n_document = $rs->getFloat($startcol + 9);

      $this->fecha_docu = $rs->getDate($startcol + 10, null);

      $this->uso_inmueb = $rs->getString($startcol + 11);

      $this->tenencia = $rs->getString($startcol + 12);

      $this->area = $rs->getFloat($startcol + 13);

      $this->area2 = $rs->getFloat($startcol + 14);

      $this->ubicacion = $rs->getFloat($startcol + 15);

      $this->ubicacion2 = $rs->getFloat($startcol + 16);

      $this->tipo = $rs->getString($startcol + 17);

      $this->tipo2 = $rs->getString($startcol + 18);

      $this->imp_anual = $rs->getFloat($startcol + 19);

      $this->imp_anual2 = $rs->getFloat($startcol + 20);

      $this->imp_trim = $rs->getFloat($startcol + 21);

      $this->imp_trim2 = $rs->getFloat($startcol + 22);

      $this->mont_imp = $rs->getFloat($startcol + 23);

      $this->observacio = $rs->getString($startcol + 24);

      $this->cod_catast = $rs->getString($startcol + 25);

      $this->fecha_elab = $rs->getDate($startcol + 26, null);

      $this->ubi_inmueb = $rs->getString($startcol + 27);

      $this->norte = $rs->getString($startcol + 28);

      $this->sur = $rs->getString($startcol + 29);

      $this->este = $rs->getString($startcol + 30);

      $this->oeste = $rs->getString($startcol + 31);

      $this->adquiere = $rs->getString($startcol + 32);

      $this->f_inscripc = $rs->getDate($startcol + 33, null);

      $this->folios = $rs->getString($startcol + 34);

      $this->tomo = $rs->getString($startcol + 35);

      $this->trim = $rs->getString($startcol + 36);

      $this->prot = $rs->getString($startcol + 37);

      $this->frente = $rs->getString($startcol + 38);

      $this->fondo = $rs->getString($startcol + 39);

      $this->precio = $rs->getFloat($startcol + 40);

      $this->dir_propie = $rs->getString($startcol + 41);

      $this->id = $rs->getInt($startcol + 42);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 43; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcreginm1 object", $e);
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
			$con = Propel::getConnection(Fcreginm1Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			Fcreginm1Peer::doDelete($this, $con);
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
			$con = Propel::getConnection(Fcreginm1Peer::DATABASE_NAME);
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
					$pk = Fcreginm1Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += Fcreginm1Peer::doUpdate($this, $con);
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


			if (($retval = Fcreginm1Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Fcreginm1Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getSerial();
				break;
			case 1:
				return $this->getTipoBolet();
				break;
			case 2:
				return $this->getNombrePro();
				break;
			case 3:
				return $this->getCiRifPro();
				break;
			case 4:
				return $this->getDirInmueb();
				break;
			case 5:
				return $this->getTelefono();
				break;
			case 6:
				return $this->getTelefono2();
				break;
			case 7:
				return $this->getNombAdEc();
				break;
			case 8:
				return $this->getDirAdmEn();
				break;
			case 9:
				return $this->getNDocument();
				break;
			case 10:
				return $this->getFechaDocu();
				break;
			case 11:
				return $this->getUsoInmueb();
				break;
			case 12:
				return $this->getTenencia();
				break;
			case 13:
				return $this->getArea();
				break;
			case 14:
				return $this->getArea2();
				break;
			case 15:
				return $this->getUbicacion();
				break;
			case 16:
				return $this->getUbicacion2();
				break;
			case 17:
				return $this->getTipo();
				break;
			case 18:
				return $this->getTipo2();
				break;
			case 19:
				return $this->getImpAnual();
				break;
			case 20:
				return $this->getImpAnual2();
				break;
			case 21:
				return $this->getImpTrim();
				break;
			case 22:
				return $this->getImpTrim2();
				break;
			case 23:
				return $this->getMontImp();
				break;
			case 24:
				return $this->getObservacio();
				break;
			case 25:
				return $this->getCodCatast();
				break;
			case 26:
				return $this->getFechaElab();
				break;
			case 27:
				return $this->getUbiInmueb();
				break;
			case 28:
				return $this->getNorte();
				break;
			case 29:
				return $this->getSur();
				break;
			case 30:
				return $this->getEste();
				break;
			case 31:
				return $this->getOeste();
				break;
			case 32:
				return $this->getAdquiere();
				break;
			case 33:
				return $this->getFInscripc();
				break;
			case 34:
				return $this->getFolios();
				break;
			case 35:
				return $this->getTomo();
				break;
			case 36:
				return $this->getTrim();
				break;
			case 37:
				return $this->getProt();
				break;
			case 38:
				return $this->getFrente();
				break;
			case 39:
				return $this->getFondo();
				break;
			case 40:
				return $this->getPrecio();
				break;
			case 41:
				return $this->getDirPropie();
				break;
			case 42:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Fcreginm1Peer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getSerial(),
			$keys[1] => $this->getTipoBolet(),
			$keys[2] => $this->getNombrePro(),
			$keys[3] => $this->getCiRifPro(),
			$keys[4] => $this->getDirInmueb(),
			$keys[5] => $this->getTelefono(),
			$keys[6] => $this->getTelefono2(),
			$keys[7] => $this->getNombAdEc(),
			$keys[8] => $this->getDirAdmEn(),
			$keys[9] => $this->getNDocument(),
			$keys[10] => $this->getFechaDocu(),
			$keys[11] => $this->getUsoInmueb(),
			$keys[12] => $this->getTenencia(),
			$keys[13] => $this->getArea(),
			$keys[14] => $this->getArea2(),
			$keys[15] => $this->getUbicacion(),
			$keys[16] => $this->getUbicacion2(),
			$keys[17] => $this->getTipo(),
			$keys[18] => $this->getTipo2(),
			$keys[19] => $this->getImpAnual(),
			$keys[20] => $this->getImpAnual2(),
			$keys[21] => $this->getImpTrim(),
			$keys[22] => $this->getImpTrim2(),
			$keys[23] => $this->getMontImp(),
			$keys[24] => $this->getObservacio(),
			$keys[25] => $this->getCodCatast(),
			$keys[26] => $this->getFechaElab(),
			$keys[27] => $this->getUbiInmueb(),
			$keys[28] => $this->getNorte(),
			$keys[29] => $this->getSur(),
			$keys[30] => $this->getEste(),
			$keys[31] => $this->getOeste(),
			$keys[32] => $this->getAdquiere(),
			$keys[33] => $this->getFInscripc(),
			$keys[34] => $this->getFolios(),
			$keys[35] => $this->getTomo(),
			$keys[36] => $this->getTrim(),
			$keys[37] => $this->getProt(),
			$keys[38] => $this->getFrente(),
			$keys[39] => $this->getFondo(),
			$keys[40] => $this->getPrecio(),
			$keys[41] => $this->getDirPropie(),
			$keys[42] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Fcreginm1Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setSerial($value);
				break;
			case 1:
				$this->setTipoBolet($value);
				break;
			case 2:
				$this->setNombrePro($value);
				break;
			case 3:
				$this->setCiRifPro($value);
				break;
			case 4:
				$this->setDirInmueb($value);
				break;
			case 5:
				$this->setTelefono($value);
				break;
			case 6:
				$this->setTelefono2($value);
				break;
			case 7:
				$this->setNombAdEc($value);
				break;
			case 8:
				$this->setDirAdmEn($value);
				break;
			case 9:
				$this->setNDocument($value);
				break;
			case 10:
				$this->setFechaDocu($value);
				break;
			case 11:
				$this->setUsoInmueb($value);
				break;
			case 12:
				$this->setTenencia($value);
				break;
			case 13:
				$this->setArea($value);
				break;
			case 14:
				$this->setArea2($value);
				break;
			case 15:
				$this->setUbicacion($value);
				break;
			case 16:
				$this->setUbicacion2($value);
				break;
			case 17:
				$this->setTipo($value);
				break;
			case 18:
				$this->setTipo2($value);
				break;
			case 19:
				$this->setImpAnual($value);
				break;
			case 20:
				$this->setImpAnual2($value);
				break;
			case 21:
				$this->setImpTrim($value);
				break;
			case 22:
				$this->setImpTrim2($value);
				break;
			case 23:
				$this->setMontImp($value);
				break;
			case 24:
				$this->setObservacio($value);
				break;
			case 25:
				$this->setCodCatast($value);
				break;
			case 26:
				$this->setFechaElab($value);
				break;
			case 27:
				$this->setUbiInmueb($value);
				break;
			case 28:
				$this->setNorte($value);
				break;
			case 29:
				$this->setSur($value);
				break;
			case 30:
				$this->setEste($value);
				break;
			case 31:
				$this->setOeste($value);
				break;
			case 32:
				$this->setAdquiere($value);
				break;
			case 33:
				$this->setFInscripc($value);
				break;
			case 34:
				$this->setFolios($value);
				break;
			case 35:
				$this->setTomo($value);
				break;
			case 36:
				$this->setTrim($value);
				break;
			case 37:
				$this->setProt($value);
				break;
			case 38:
				$this->setFrente($value);
				break;
			case 39:
				$this->setFondo($value);
				break;
			case 40:
				$this->setPrecio($value);
				break;
			case 41:
				$this->setDirPropie($value);
				break;
			case 42:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Fcreginm1Peer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setSerial($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipoBolet($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNombrePro($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCiRifPro($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDirInmueb($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTelefono($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTelefono2($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNombAdEc($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDirAdmEn($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNDocument($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFechaDocu($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUsoInmueb($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setTenencia($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setArea($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setArea2($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setUbicacion($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setUbicacion2($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setTipo($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setTipo2($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setImpAnual($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setImpAnual2($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setImpTrim($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setImpTrim2($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setMontImp($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setObservacio($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setCodCatast($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setFechaElab($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setUbiInmueb($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setNorte($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setSur($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setEste($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setOeste($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setAdquiere($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setFInscripc($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setFolios($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setTomo($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setTrim($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setProt($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setFrente($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setFondo($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setPrecio($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setDirPropie($arr[$keys[41]]);
		if (array_key_exists($keys[42], $arr)) $this->setId($arr[$keys[42]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(Fcreginm1Peer::DATABASE_NAME);

		if ($this->isColumnModified(Fcreginm1Peer::SERIAL)) $criteria->add(Fcreginm1Peer::SERIAL, $this->serial);
		if ($this->isColumnModified(Fcreginm1Peer::TIPO_BOLET)) $criteria->add(Fcreginm1Peer::TIPO_BOLET, $this->tipo_bolet);
		if ($this->isColumnModified(Fcreginm1Peer::NOMBRE_PRO)) $criteria->add(Fcreginm1Peer::NOMBRE_PRO, $this->nombre_pro);
		if ($this->isColumnModified(Fcreginm1Peer::CI_RIF_PRO)) $criteria->add(Fcreginm1Peer::CI_RIF_PRO, $this->ci_rif_pro);
		if ($this->isColumnModified(Fcreginm1Peer::DIR_INMUEB)) $criteria->add(Fcreginm1Peer::DIR_INMUEB, $this->dir_inmueb);
		if ($this->isColumnModified(Fcreginm1Peer::TELEFONO)) $criteria->add(Fcreginm1Peer::TELEFONO, $this->telefono);
		if ($this->isColumnModified(Fcreginm1Peer::TELEFONO2)) $criteria->add(Fcreginm1Peer::TELEFONO2, $this->telefono2);
		if ($this->isColumnModified(Fcreginm1Peer::NOMB_AD_EC)) $criteria->add(Fcreginm1Peer::NOMB_AD_EC, $this->nomb_ad_ec);
		if ($this->isColumnModified(Fcreginm1Peer::DIR_ADM_EN)) $criteria->add(Fcreginm1Peer::DIR_ADM_EN, $this->dir_adm_en);
		if ($this->isColumnModified(Fcreginm1Peer::N_DOCUMENT)) $criteria->add(Fcreginm1Peer::N_DOCUMENT, $this->n_document);
		if ($this->isColumnModified(Fcreginm1Peer::FECHA_DOCU)) $criteria->add(Fcreginm1Peer::FECHA_DOCU, $this->fecha_docu);
		if ($this->isColumnModified(Fcreginm1Peer::USO_INMUEB)) $criteria->add(Fcreginm1Peer::USO_INMUEB, $this->uso_inmueb);
		if ($this->isColumnModified(Fcreginm1Peer::TENENCIA)) $criteria->add(Fcreginm1Peer::TENENCIA, $this->tenencia);
		if ($this->isColumnModified(Fcreginm1Peer::AREA)) $criteria->add(Fcreginm1Peer::AREA, $this->area);
		if ($this->isColumnModified(Fcreginm1Peer::AREA2)) $criteria->add(Fcreginm1Peer::AREA2, $this->area2);
		if ($this->isColumnModified(Fcreginm1Peer::UBICACION)) $criteria->add(Fcreginm1Peer::UBICACION, $this->ubicacion);
		if ($this->isColumnModified(Fcreginm1Peer::UBICACION2)) $criteria->add(Fcreginm1Peer::UBICACION2, $this->ubicacion2);
		if ($this->isColumnModified(Fcreginm1Peer::TIPO)) $criteria->add(Fcreginm1Peer::TIPO, $this->tipo);
		if ($this->isColumnModified(Fcreginm1Peer::TIPO2)) $criteria->add(Fcreginm1Peer::TIPO2, $this->tipo2);
		if ($this->isColumnModified(Fcreginm1Peer::IMP_ANUAL)) $criteria->add(Fcreginm1Peer::IMP_ANUAL, $this->imp_anual);
		if ($this->isColumnModified(Fcreginm1Peer::IMP_ANUAL2)) $criteria->add(Fcreginm1Peer::IMP_ANUAL2, $this->imp_anual2);
		if ($this->isColumnModified(Fcreginm1Peer::IMP_TRIM)) $criteria->add(Fcreginm1Peer::IMP_TRIM, $this->imp_trim);
		if ($this->isColumnModified(Fcreginm1Peer::IMP_TRIM2)) $criteria->add(Fcreginm1Peer::IMP_TRIM2, $this->imp_trim2);
		if ($this->isColumnModified(Fcreginm1Peer::MONT_IMP)) $criteria->add(Fcreginm1Peer::MONT_IMP, $this->mont_imp);
		if ($this->isColumnModified(Fcreginm1Peer::OBSERVACIO)) $criteria->add(Fcreginm1Peer::OBSERVACIO, $this->observacio);
		if ($this->isColumnModified(Fcreginm1Peer::COD_CATAST)) $criteria->add(Fcreginm1Peer::COD_CATAST, $this->cod_catast);
		if ($this->isColumnModified(Fcreginm1Peer::FECHA_ELAB)) $criteria->add(Fcreginm1Peer::FECHA_ELAB, $this->fecha_elab);
		if ($this->isColumnModified(Fcreginm1Peer::UBI_INMUEB)) $criteria->add(Fcreginm1Peer::UBI_INMUEB, $this->ubi_inmueb);
		if ($this->isColumnModified(Fcreginm1Peer::NORTE)) $criteria->add(Fcreginm1Peer::NORTE, $this->norte);
		if ($this->isColumnModified(Fcreginm1Peer::SUR)) $criteria->add(Fcreginm1Peer::SUR, $this->sur);
		if ($this->isColumnModified(Fcreginm1Peer::ESTE)) $criteria->add(Fcreginm1Peer::ESTE, $this->este);
		if ($this->isColumnModified(Fcreginm1Peer::OESTE)) $criteria->add(Fcreginm1Peer::OESTE, $this->oeste);
		if ($this->isColumnModified(Fcreginm1Peer::ADQUIERE)) $criteria->add(Fcreginm1Peer::ADQUIERE, $this->adquiere);
		if ($this->isColumnModified(Fcreginm1Peer::F_INSCRIPC)) $criteria->add(Fcreginm1Peer::F_INSCRIPC, $this->f_inscripc);
		if ($this->isColumnModified(Fcreginm1Peer::FOLIOS)) $criteria->add(Fcreginm1Peer::FOLIOS, $this->folios);
		if ($this->isColumnModified(Fcreginm1Peer::TOMO)) $criteria->add(Fcreginm1Peer::TOMO, $this->tomo);
		if ($this->isColumnModified(Fcreginm1Peer::TRIM)) $criteria->add(Fcreginm1Peer::TRIM, $this->trim);
		if ($this->isColumnModified(Fcreginm1Peer::PROT)) $criteria->add(Fcreginm1Peer::PROT, $this->prot);
		if ($this->isColumnModified(Fcreginm1Peer::FRENTE)) $criteria->add(Fcreginm1Peer::FRENTE, $this->frente);
		if ($this->isColumnModified(Fcreginm1Peer::FONDO)) $criteria->add(Fcreginm1Peer::FONDO, $this->fondo);
		if ($this->isColumnModified(Fcreginm1Peer::PRECIO)) $criteria->add(Fcreginm1Peer::PRECIO, $this->precio);
		if ($this->isColumnModified(Fcreginm1Peer::DIR_PROPIE)) $criteria->add(Fcreginm1Peer::DIR_PROPIE, $this->dir_propie);
		if ($this->isColumnModified(Fcreginm1Peer::ID)) $criteria->add(Fcreginm1Peer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Fcreginm1Peer::DATABASE_NAME);

		$criteria->add(Fcreginm1Peer::ID, $this->id);

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

		$copyObj->setSerial($this->serial);

		$copyObj->setTipoBolet($this->tipo_bolet);

		$copyObj->setNombrePro($this->nombre_pro);

		$copyObj->setCiRifPro($this->ci_rif_pro);

		$copyObj->setDirInmueb($this->dir_inmueb);

		$copyObj->setTelefono($this->telefono);

		$copyObj->setTelefono2($this->telefono2);

		$copyObj->setNombAdEc($this->nomb_ad_ec);

		$copyObj->setDirAdmEn($this->dir_adm_en);

		$copyObj->setNDocument($this->n_document);

		$copyObj->setFechaDocu($this->fecha_docu);

		$copyObj->setUsoInmueb($this->uso_inmueb);

		$copyObj->setTenencia($this->tenencia);

		$copyObj->setArea($this->area);

		$copyObj->setArea2($this->area2);

		$copyObj->setUbicacion($this->ubicacion);

		$copyObj->setUbicacion2($this->ubicacion2);

		$copyObj->setTipo($this->tipo);

		$copyObj->setTipo2($this->tipo2);

		$copyObj->setImpAnual($this->imp_anual);

		$copyObj->setImpAnual2($this->imp_anual2);

		$copyObj->setImpTrim($this->imp_trim);

		$copyObj->setImpTrim2($this->imp_trim2);

		$copyObj->setMontImp($this->mont_imp);

		$copyObj->setObservacio($this->observacio);

		$copyObj->setCodCatast($this->cod_catast);

		$copyObj->setFechaElab($this->fecha_elab);

		$copyObj->setUbiInmueb($this->ubi_inmueb);

		$copyObj->setNorte($this->norte);

		$copyObj->setSur($this->sur);

		$copyObj->setEste($this->este);

		$copyObj->setOeste($this->oeste);

		$copyObj->setAdquiere($this->adquiere);

		$copyObj->setFInscripc($this->f_inscripc);

		$copyObj->setFolios($this->folios);

		$copyObj->setTomo($this->tomo);

		$copyObj->setTrim($this->trim);

		$copyObj->setProt($this->prot);

		$copyObj->setFrente($this->frente);

		$copyObj->setFondo($this->fondo);

		$copyObj->setPrecio($this->precio);

		$copyObj->setDirPropie($this->dir_propie);


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
			self::$peer = new Fcreginm1Peer();
		}
		return self::$peer;
	}

} 