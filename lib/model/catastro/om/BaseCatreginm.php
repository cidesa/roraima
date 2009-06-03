<?php


abstract class BaseCatreginm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $catsubprc_id;


	
	protected $catprc_id;


	
	protected $catman_id;


	
	protected $catsec_id;


	
	protected $catpar_id;


	
	protected $catmun_id;


	
	protected $catciu_id;


	
	protected $catest_id;


	
	protected $catbarurb_id;


	
	protected $cattramofro_id;


	
	protected $cattramolat_id;


	
	protected $cattramolat2_id;


	
	protected $catcodpos_id;


	
	protected $cattipviv_id;


	
	protected $catconinm_id;


	
	protected $catusoesp_id;


	
	protected $catconsoc_id;


	
	protected $catrut_id;


	
	protected $catcarterinm_id;


	
	protected $catproter_id;


	
	protected $coddivgeo;


	
	protected $nrocas;


	
	protected $fecreg;


	
	protected $dirinm;


	
	protected $nivinm;


	
	protected $unihab;


	
	protected $edicas;


	
	protected $pisinm;


	
	protected $numinm;


	
	protected $ubigex;


	
	protected $ubigey;


	
	protected $ubigez;


	
	protected $numhab;


	
	protected $numper;


	
	protected $numsan;


	
	protected $numtom;


	
	protected $arever;


	
	protected $loccom;


	
	protected $locind;


	
	protected $captan;


	
	protected $cappis;


	
	protected $trapis;


	
	protected $numtel;


	
	protected $nomarccro;


	
	protected $oficom;


	
	protected $fotinm;


	
	protected $lineste;


	
	protected $linnor;


	
	protected $linoes;


	
	protected $linsur;


	
	protected $id;

	
	protected $aCatsubprc;

	
	protected $aCatprc;

	
	protected $aCatman;

	
	protected $aCatsec;

	
	protected $aCatpar;

	
	protected $aCatmun;

	
	protected $aCatciu;

	
	protected $aCatest;

	
	protected $aCatbarurb;

	
	protected $aCattramoRelatedByCattramofroId;

	
	protected $aCattramoRelatedByCattramolatId;

	
	protected $aCattramoRelatedByCattramolat2Id;

	
	protected $aCatcodpos;

	
	protected $aCattipviv;

	
	protected $aCatconinm;

	
	protected $aCatusoesp;

	
	protected $aCatconsoc;

	
	protected $aCatrut;

	
	protected $aCatcarterinm;

	
	protected $aCatproter;

	
	protected $collCatcarconinms;

	
	protected $lastCatcarconinmCriteria = null;

	
	protected $collCatcarterinms;

	
	protected $lastCatcarterinmCriteria = null;

	
	protected $collCatperinms;

	
	protected $lastCatperinmCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCatsubprcId()
  {

    return $this->catsubprc_id;

  }
  
  public function getCatprcId()
  {

    return $this->catprc_id;

  }
  
  public function getCatmanId()
  {

    return $this->catman_id;

  }
  
  public function getCatsecId()
  {

    return $this->catsec_id;

  }
  
  public function getCatparId()
  {

    return $this->catpar_id;

  }
  
  public function getCatmunId()
  {

    return $this->catmun_id;

  }
  
  public function getCatciuId()
  {

    return $this->catciu_id;

  }
  
  public function getCatestId()
  {

    return $this->catest_id;

  }
  
  public function getCatbarurbId()
  {

    return $this->catbarurb_id;

  }
  
  public function getCattramofroId()
  {

    return $this->cattramofro_id;

  }
  
  public function getCattramolatId()
  {

    return $this->cattramolat_id;

  }
  
  public function getCattramolat2Id()
  {

    return $this->cattramolat2_id;

  }
  
  public function getCatcodposId()
  {

    return $this->catcodpos_id;

  }
  
  public function getCattipvivId()
  {

    return $this->cattipviv_id;

  }
  
  public function getCatconinmId()
  {

    return $this->catconinm_id;

  }
  
  public function getCatusoespId()
  {

    return $this->catusoesp_id;

  }
  
  public function getCatconsocId()
  {

    return $this->catconsoc_id;

  }
  
  public function getCatrutId()
  {

    return $this->catrut_id;

  }
  
  public function getCatcarterinmId()
  {

    return $this->catcarterinm_id;

  }
  
  public function getCatproterId()
  {

    return $this->catproter_id;

  }
  
  public function getCoddivgeo()
  {

    return trim($this->coddivgeo);

  }
  
  public function getNrocas()
  {

    return trim($this->nrocas);

  }
  
  public function getFecreg($format = 'Y-m-d')
  {

    if ($this->fecreg === null || $this->fecreg === '') {
      return null;
    } elseif (!is_int($this->fecreg)) {
            $ts = adodb_strtotime($this->fecreg);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecreg] as date/time value: " . var_export($this->fecreg, true));
      }
    } else {
      $ts = $this->fecreg;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDirinm()
  {

    return trim($this->dirinm);

  }
  
  public function getNivinm()
  {

    return trim($this->nivinm);

  }
  
  public function getUnihab()
  {

    return trim($this->unihab);

  }
  
  public function getEdicas()
  {

    return trim($this->edicas);

  }
  
  public function getPisinm()
  {

    return trim($this->pisinm);

  }
  
  public function getNuminm()
  {

    return trim($this->numinm);

  }
  
  public function getUbigex()
  {

    return trim($this->ubigex);

  }
  
  public function getUbigey()
  {

    return trim($this->ubigey);

  }
  
  public function getUbigez()
  {

    return trim($this->ubigez);

  }
  
  public function getNumhab()
  {

    return trim($this->numhab);

  }
  
  public function getNumper()
  {

    return trim($this->numper);

  }
  
  public function getNumsan()
  {

    return trim($this->numsan);

  }
  
  public function getNumtom()
  {

    return trim($this->numtom);

  }
  
  public function getArever()
  {

    return trim($this->arever);

  }
  
  public function getLoccom()
  {

    return trim($this->loccom);

  }
  
  public function getLocind()
  {

    return trim($this->locind);

  }
  
  public function getCaptan()
  {

    return trim($this->captan);

  }
  
  public function getCappis()
  {

    return trim($this->cappis);

  }
  
  public function getTrapis()
  {

    return trim($this->trapis);

  }
  
  public function getNumtel()
  {

    return trim($this->numtel);

  }
  
  public function getNomarccro()
  {

    return trim($this->nomarccro);

  }
  
  public function getOficom()
  {

    return trim($this->oficom);

  }
  
  public function getFotinm()
  {

    return trim($this->fotinm);

  }
  
  public function getLineste()
  {

    return trim($this->lineste);

  }
  
  public function getLinnor()
  {

    return trim($this->linnor);

  }
  
  public function getLinoes()
  {

    return trim($this->linoes);

  }
  
  public function getLinsur()
  {

    return trim($this->linsur);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCatsubprcId($v)
	{

    if ($this->catsubprc_id !== $v) {
        $this->catsubprc_id = $v;
        $this->modifiedColumns[] = CatreginmPeer::CATSUBPRC_ID;
      }
  
		if ($this->aCatsubprc !== null && $this->aCatsubprc->getId() !== $v) {
			$this->aCatsubprc = null;
		}

	} 
	
	public function setCatprcId($v)
	{

    if ($this->catprc_id !== $v) {
        $this->catprc_id = $v;
        $this->modifiedColumns[] = CatreginmPeer::CATPRC_ID;
      }
  
		if ($this->aCatprc !== null && $this->aCatprc->getId() !== $v) {
			$this->aCatprc = null;
		}

	} 
	
	public function setCatmanId($v)
	{

    if ($this->catman_id !== $v) {
        $this->catman_id = $v;
        $this->modifiedColumns[] = CatreginmPeer::CATMAN_ID;
      }
  
		if ($this->aCatman !== null && $this->aCatman->getId() !== $v) {
			$this->aCatman = null;
		}

	} 
	
	public function setCatsecId($v)
	{

    if ($this->catsec_id !== $v) {
        $this->catsec_id = $v;
        $this->modifiedColumns[] = CatreginmPeer::CATSEC_ID;
      }
  
		if ($this->aCatsec !== null && $this->aCatsec->getId() !== $v) {
			$this->aCatsec = null;
		}

	} 
	
	public function setCatparId($v)
	{

    if ($this->catpar_id !== $v) {
        $this->catpar_id = $v;
        $this->modifiedColumns[] = CatreginmPeer::CATPAR_ID;
      }
  
		if ($this->aCatpar !== null && $this->aCatpar->getId() !== $v) {
			$this->aCatpar = null;
		}

	} 
	
	public function setCatmunId($v)
	{

    if ($this->catmun_id !== $v) {
        $this->catmun_id = $v;
        $this->modifiedColumns[] = CatreginmPeer::CATMUN_ID;
      }
  
		if ($this->aCatmun !== null && $this->aCatmun->getId() !== $v) {
			$this->aCatmun = null;
		}

	} 
	
	public function setCatciuId($v)
	{

    if ($this->catciu_id !== $v) {
        $this->catciu_id = $v;
        $this->modifiedColumns[] = CatreginmPeer::CATCIU_ID;
      }
  
		if ($this->aCatciu !== null && $this->aCatciu->getId() !== $v) {
			$this->aCatciu = null;
		}

	} 
	
	public function setCatestId($v)
	{

    if ($this->catest_id !== $v) {
        $this->catest_id = $v;
        $this->modifiedColumns[] = CatreginmPeer::CATEST_ID;
      }
  
		if ($this->aCatest !== null && $this->aCatest->getId() !== $v) {
			$this->aCatest = null;
		}

	} 
	
	public function setCatbarurbId($v)
	{

    if ($this->catbarurb_id !== $v) {
        $this->catbarurb_id = $v;
        $this->modifiedColumns[] = CatreginmPeer::CATBARURB_ID;
      }
  
		if ($this->aCatbarurb !== null && $this->aCatbarurb->getId() !== $v) {
			$this->aCatbarurb = null;
		}

	} 
	
	public function setCattramofroId($v)
	{

    if ($this->cattramofro_id !== $v) {
        $this->cattramofro_id = $v;
        $this->modifiedColumns[] = CatreginmPeer::CATTRAMOFRO_ID;
      }
  
		if ($this->aCattramoRelatedByCattramofroId !== null && $this->aCattramoRelatedByCattramofroId->getId() !== $v) {
			$this->aCattramoRelatedByCattramofroId = null;
		}

	} 
	
	public function setCattramolatId($v)
	{

    if ($this->cattramolat_id !== $v) {
        $this->cattramolat_id = $v;
        $this->modifiedColumns[] = CatreginmPeer::CATTRAMOLAT_ID;
      }
  
		if ($this->aCattramoRelatedByCattramolatId !== null && $this->aCattramoRelatedByCattramolatId->getId() !== $v) {
			$this->aCattramoRelatedByCattramolatId = null;
		}

	} 
	
	public function setCattramolat2Id($v)
	{

    if ($this->cattramolat2_id !== $v) {
        $this->cattramolat2_id = $v;
        $this->modifiedColumns[] = CatreginmPeer::CATTRAMOLAT2_ID;
      }
  
		if ($this->aCattramoRelatedByCattramolat2Id !== null && $this->aCattramoRelatedByCattramolat2Id->getId() !== $v) {
			$this->aCattramoRelatedByCattramolat2Id = null;
		}

	} 
	
	public function setCatcodposId($v)
	{

    if ($this->catcodpos_id !== $v) {
        $this->catcodpos_id = $v;
        $this->modifiedColumns[] = CatreginmPeer::CATCODPOS_ID;
      }
  
		if ($this->aCatcodpos !== null && $this->aCatcodpos->getId() !== $v) {
			$this->aCatcodpos = null;
		}

	} 
	
	public function setCattipvivId($v)
	{

    if ($this->cattipviv_id !== $v) {
        $this->cattipviv_id = $v;
        $this->modifiedColumns[] = CatreginmPeer::CATTIPVIV_ID;
      }
  
		if ($this->aCattipviv !== null && $this->aCattipviv->getId() !== $v) {
			$this->aCattipviv = null;
		}

	} 
	
	public function setCatconinmId($v)
	{

    if ($this->catconinm_id !== $v) {
        $this->catconinm_id = $v;
        $this->modifiedColumns[] = CatreginmPeer::CATCONINM_ID;
      }
  
		if ($this->aCatconinm !== null && $this->aCatconinm->getId() !== $v) {
			$this->aCatconinm = null;
		}

	} 
	
	public function setCatusoespId($v)
	{

    if ($this->catusoesp_id !== $v) {
        $this->catusoesp_id = $v;
        $this->modifiedColumns[] = CatreginmPeer::CATUSOESP_ID;
      }
  
		if ($this->aCatusoesp !== null && $this->aCatusoesp->getId() !== $v) {
			$this->aCatusoesp = null;
		}

	} 
	
	public function setCatconsocId($v)
	{

    if ($this->catconsoc_id !== $v) {
        $this->catconsoc_id = $v;
        $this->modifiedColumns[] = CatreginmPeer::CATCONSOC_ID;
      }
  
		if ($this->aCatconsoc !== null && $this->aCatconsoc->getId() !== $v) {
			$this->aCatconsoc = null;
		}

	} 
	
	public function setCatrutId($v)
	{

    if ($this->catrut_id !== $v) {
        $this->catrut_id = $v;
        $this->modifiedColumns[] = CatreginmPeer::CATRUT_ID;
      }
  
		if ($this->aCatrut !== null && $this->aCatrut->getId() !== $v) {
			$this->aCatrut = null;
		}

	} 
	
	public function setCatcarterinmId($v)
	{

    if ($this->catcarterinm_id !== $v) {
        $this->catcarterinm_id = $v;
        $this->modifiedColumns[] = CatreginmPeer::CATCARTERINM_ID;
      }
  
		if ($this->aCatcarterinm !== null && $this->aCatcarterinm->getId() !== $v) {
			$this->aCatcarterinm = null;
		}

	} 
	
	public function setCatproterId($v)
	{

    if ($this->catproter_id !== $v) {
        $this->catproter_id = $v;
        $this->modifiedColumns[] = CatreginmPeer::CATPROTER_ID;
      }
  
		if ($this->aCatproter !== null && $this->aCatproter->getId() !== $v) {
			$this->aCatproter = null;
		}

	} 
	
	public function setCoddivgeo($v)
	{

    if ($this->coddivgeo !== $v) {
        $this->coddivgeo = $v;
        $this->modifiedColumns[] = CatreginmPeer::CODDIVGEO;
      }
  
	} 
	
	public function setNrocas($v)
	{

    if ($this->nrocas !== $v) {
        $this->nrocas = $v;
        $this->modifiedColumns[] = CatreginmPeer::NROCAS;
      }
  
	} 
	
	public function setFecreg($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecreg] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecreg !== $ts) {
      $this->fecreg = $ts;
      $this->modifiedColumns[] = CatreginmPeer::FECREG;
    }

	} 
	
	public function setDirinm($v)
	{

    if ($this->dirinm !== $v) {
        $this->dirinm = $v;
        $this->modifiedColumns[] = CatreginmPeer::DIRINM;
      }
  
	} 
	
	public function setNivinm($v)
	{

    if ($this->nivinm !== $v) {
        $this->nivinm = $v;
        $this->modifiedColumns[] = CatreginmPeer::NIVINM;
      }
  
	} 
	
	public function setUnihab($v)
	{

    if ($this->unihab !== $v) {
        $this->unihab = $v;
        $this->modifiedColumns[] = CatreginmPeer::UNIHAB;
      }
  
	} 
	
	public function setEdicas($v)
	{

    if ($this->edicas !== $v) {
        $this->edicas = $v;
        $this->modifiedColumns[] = CatreginmPeer::EDICAS;
      }
  
	} 
	
	public function setPisinm($v)
	{

    if ($this->pisinm !== $v) {
        $this->pisinm = $v;
        $this->modifiedColumns[] = CatreginmPeer::PISINM;
      }
  
	} 
	
	public function setNuminm($v)
	{

    if ($this->numinm !== $v) {
        $this->numinm = $v;
        $this->modifiedColumns[] = CatreginmPeer::NUMINM;
      }
  
	} 
	
	public function setUbigex($v)
	{

    if ($this->ubigex !== $v) {
        $this->ubigex = $v;
        $this->modifiedColumns[] = CatreginmPeer::UBIGEX;
      }
  
	} 
	
	public function setUbigey($v)
	{

    if ($this->ubigey !== $v) {
        $this->ubigey = $v;
        $this->modifiedColumns[] = CatreginmPeer::UBIGEY;
      }
  
	} 
	
	public function setUbigez($v)
	{

    if ($this->ubigez !== $v) {
        $this->ubigez = $v;
        $this->modifiedColumns[] = CatreginmPeer::UBIGEZ;
      }
  
	} 
	
	public function setNumhab($v)
	{

    if ($this->numhab !== $v) {
        $this->numhab = $v;
        $this->modifiedColumns[] = CatreginmPeer::NUMHAB;
      }
  
	} 
	
	public function setNumper($v)
	{

    if ($this->numper !== $v) {
        $this->numper = $v;
        $this->modifiedColumns[] = CatreginmPeer::NUMPER;
      }
  
	} 
	
	public function setNumsan($v)
	{

    if ($this->numsan !== $v) {
        $this->numsan = $v;
        $this->modifiedColumns[] = CatreginmPeer::NUMSAN;
      }
  
	} 
	
	public function setNumtom($v)
	{

    if ($this->numtom !== $v) {
        $this->numtom = $v;
        $this->modifiedColumns[] = CatreginmPeer::NUMTOM;
      }
  
	} 
	
	public function setArever($v)
	{

    if ($this->arever !== $v) {
        $this->arever = $v;
        $this->modifiedColumns[] = CatreginmPeer::AREVER;
      }
  
	} 
	
	public function setLoccom($v)
	{

    if ($this->loccom !== $v) {
        $this->loccom = $v;
        $this->modifiedColumns[] = CatreginmPeer::LOCCOM;
      }
  
	} 
	
	public function setLocind($v)
	{

    if ($this->locind !== $v) {
        $this->locind = $v;
        $this->modifiedColumns[] = CatreginmPeer::LOCIND;
      }
  
	} 
	
	public function setCaptan($v)
	{

    if ($this->captan !== $v) {
        $this->captan = $v;
        $this->modifiedColumns[] = CatreginmPeer::CAPTAN;
      }
  
	} 
	
	public function setCappis($v)
	{

    if ($this->cappis !== $v) {
        $this->cappis = $v;
        $this->modifiedColumns[] = CatreginmPeer::CAPPIS;
      }
  
	} 
	
	public function setTrapis($v)
	{

    if ($this->trapis !== $v) {
        $this->trapis = $v;
        $this->modifiedColumns[] = CatreginmPeer::TRAPIS;
      }
  
	} 
	
	public function setNumtel($v)
	{

    if ($this->numtel !== $v) {
        $this->numtel = $v;
        $this->modifiedColumns[] = CatreginmPeer::NUMTEL;
      }
  
	} 
	
	public function setNomarccro($v)
	{

    if ($this->nomarccro !== $v) {
        $this->nomarccro = $v;
        $this->modifiedColumns[] = CatreginmPeer::NOMARCCRO;
      }
  
	} 
	
	public function setOficom($v)
	{

    if ($this->oficom !== $v) {
        $this->oficom = $v;
        $this->modifiedColumns[] = CatreginmPeer::OFICOM;
      }
  
	} 
	
	public function setFotinm($v)
	{

    if ($this->fotinm !== $v) {
        $this->fotinm = $v;
        $this->modifiedColumns[] = CatreginmPeer::FOTINM;
      }
  
	} 
	
	public function setLineste($v)
	{

    if ($this->lineste !== $v) {
        $this->lineste = $v;
        $this->modifiedColumns[] = CatreginmPeer::LINESTE;
      }
  
	} 
	
	public function setLinnor($v)
	{

    if ($this->linnor !== $v) {
        $this->linnor = $v;
        $this->modifiedColumns[] = CatreginmPeer::LINNOR;
      }
  
	} 
	
	public function setLinoes($v)
	{

    if ($this->linoes !== $v) {
        $this->linoes = $v;
        $this->modifiedColumns[] = CatreginmPeer::LINOES;
      }
  
	} 
	
	public function setLinsur($v)
	{

    if ($this->linsur !== $v) {
        $this->linsur = $v;
        $this->modifiedColumns[] = CatreginmPeer::LINSUR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CatreginmPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->catsubprc_id = $rs->getInt($startcol + 0);

      $this->catprc_id = $rs->getInt($startcol + 1);

      $this->catman_id = $rs->getInt($startcol + 2);

      $this->catsec_id = $rs->getInt($startcol + 3);

      $this->catpar_id = $rs->getInt($startcol + 4);

      $this->catmun_id = $rs->getInt($startcol + 5);

      $this->catciu_id = $rs->getInt($startcol + 6);

      $this->catest_id = $rs->getInt($startcol + 7);

      $this->catbarurb_id = $rs->getInt($startcol + 8);

      $this->cattramofro_id = $rs->getInt($startcol + 9);

      $this->cattramolat_id = $rs->getInt($startcol + 10);

      $this->cattramolat2_id = $rs->getInt($startcol + 11);

      $this->catcodpos_id = $rs->getInt($startcol + 12);

      $this->cattipviv_id = $rs->getInt($startcol + 13);

      $this->catconinm_id = $rs->getInt($startcol + 14);

      $this->catusoesp_id = $rs->getInt($startcol + 15);

      $this->catconsoc_id = $rs->getInt($startcol + 16);

      $this->catrut_id = $rs->getInt($startcol + 17);

      $this->catcarterinm_id = $rs->getInt($startcol + 18);

      $this->catproter_id = $rs->getInt($startcol + 19);

      $this->coddivgeo = $rs->getString($startcol + 20);

      $this->nrocas = $rs->getString($startcol + 21);

      $this->fecreg = $rs->getDate($startcol + 22, null);

      $this->dirinm = $rs->getString($startcol + 23);

      $this->nivinm = $rs->getString($startcol + 24);

      $this->unihab = $rs->getString($startcol + 25);

      $this->edicas = $rs->getString($startcol + 26);

      $this->pisinm = $rs->getString($startcol + 27);

      $this->numinm = $rs->getString($startcol + 28);

      $this->ubigex = $rs->getString($startcol + 29);

      $this->ubigey = $rs->getString($startcol + 30);

      $this->ubigez = $rs->getString($startcol + 31);

      $this->numhab = $rs->getString($startcol + 32);

      $this->numper = $rs->getString($startcol + 33);

      $this->numsan = $rs->getString($startcol + 34);

      $this->numtom = $rs->getString($startcol + 35);

      $this->arever = $rs->getString($startcol + 36);

      $this->loccom = $rs->getString($startcol + 37);

      $this->locind = $rs->getString($startcol + 38);

      $this->captan = $rs->getString($startcol + 39);

      $this->cappis = $rs->getString($startcol + 40);

      $this->trapis = $rs->getString($startcol + 41);

      $this->numtel = $rs->getString($startcol + 42);

      $this->nomarccro = $rs->getString($startcol + 43);

      $this->oficom = $rs->getString($startcol + 44);

      $this->fotinm = $rs->getString($startcol + 45);

      $this->lineste = $rs->getString($startcol + 46);

      $this->linnor = $rs->getString($startcol + 47);

      $this->linoes = $rs->getString($startcol + 48);

      $this->linsur = $rs->getString($startcol + 49);

      $this->id = $rs->getInt($startcol + 50);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 51; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Catreginm object", $e);
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
			$con = Propel::getConnection(CatreginmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CatreginmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CatreginmPeer::DATABASE_NAME);
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


												
			if ($this->aCatsubprc !== null) {
				if ($this->aCatsubprc->isModified()) {
					$affectedRows += $this->aCatsubprc->save($con);
				}
				$this->setCatsubprc($this->aCatsubprc);
			}

			if ($this->aCatprc !== null) {
				if ($this->aCatprc->isModified()) {
					$affectedRows += $this->aCatprc->save($con);
				}
				$this->setCatprc($this->aCatprc);
			}

			if ($this->aCatman !== null) {
				if ($this->aCatman->isModified()) {
					$affectedRows += $this->aCatman->save($con);
				}
				$this->setCatman($this->aCatman);
			}

			if ($this->aCatsec !== null) {
				if ($this->aCatsec->isModified()) {
					$affectedRows += $this->aCatsec->save($con);
				}
				$this->setCatsec($this->aCatsec);
			}

			if ($this->aCatpar !== null) {
				if ($this->aCatpar->isModified()) {
					$affectedRows += $this->aCatpar->save($con);
				}
				$this->setCatpar($this->aCatpar);
			}

			if ($this->aCatmun !== null) {
				if ($this->aCatmun->isModified()) {
					$affectedRows += $this->aCatmun->save($con);
				}
				$this->setCatmun($this->aCatmun);
			}

			if ($this->aCatciu !== null) {
				if ($this->aCatciu->isModified()) {
					$affectedRows += $this->aCatciu->save($con);
				}
				$this->setCatciu($this->aCatciu);
			}

			if ($this->aCatest !== null) {
				if ($this->aCatest->isModified()) {
					$affectedRows += $this->aCatest->save($con);
				}
				$this->setCatest($this->aCatest);
			}

			if ($this->aCatbarurb !== null) {
				if ($this->aCatbarurb->isModified()) {
					$affectedRows += $this->aCatbarurb->save($con);
				}
				$this->setCatbarurb($this->aCatbarurb);
			}

			if ($this->aCattramoRelatedByCattramofroId !== null) {
				if ($this->aCattramoRelatedByCattramofroId->isModified()) {
					$affectedRows += $this->aCattramoRelatedByCattramofroId->save($con);
				}
				$this->setCattramoRelatedByCattramofroId($this->aCattramoRelatedByCattramofroId);
			}

			if ($this->aCattramoRelatedByCattramolatId !== null) {
				if ($this->aCattramoRelatedByCattramolatId->isModified()) {
					$affectedRows += $this->aCattramoRelatedByCattramolatId->save($con);
				}
				$this->setCattramoRelatedByCattramolatId($this->aCattramoRelatedByCattramolatId);
			}

			if ($this->aCattramoRelatedByCattramolat2Id !== null) {
				if ($this->aCattramoRelatedByCattramolat2Id->isModified()) {
					$affectedRows += $this->aCattramoRelatedByCattramolat2Id->save($con);
				}
				$this->setCattramoRelatedByCattramolat2Id($this->aCattramoRelatedByCattramolat2Id);
			}

			if ($this->aCatcodpos !== null) {
				if ($this->aCatcodpos->isModified()) {
					$affectedRows += $this->aCatcodpos->save($con);
				}
				$this->setCatcodpos($this->aCatcodpos);
			}

			if ($this->aCattipviv !== null) {
				if ($this->aCattipviv->isModified()) {
					$affectedRows += $this->aCattipviv->save($con);
				}
				$this->setCattipviv($this->aCattipviv);
			}

			if ($this->aCatconinm !== null) {
				if ($this->aCatconinm->isModified()) {
					$affectedRows += $this->aCatconinm->save($con);
				}
				$this->setCatconinm($this->aCatconinm);
			}

			if ($this->aCatusoesp !== null) {
				if ($this->aCatusoesp->isModified()) {
					$affectedRows += $this->aCatusoesp->save($con);
				}
				$this->setCatusoesp($this->aCatusoesp);
			}

			if ($this->aCatconsoc !== null) {
				if ($this->aCatconsoc->isModified()) {
					$affectedRows += $this->aCatconsoc->save($con);
				}
				$this->setCatconsoc($this->aCatconsoc);
			}

			if ($this->aCatrut !== null) {
				if ($this->aCatrut->isModified()) {
					$affectedRows += $this->aCatrut->save($con);
				}
				$this->setCatrut($this->aCatrut);
			}

			if ($this->aCatcarterinm !== null) {
				if ($this->aCatcarterinm->isModified()) {
					$affectedRows += $this->aCatcarterinm->save($con);
				}
				$this->setCatcarterinm($this->aCatcarterinm);
			}

			if ($this->aCatproter !== null) {
				if ($this->aCatproter->isModified()) {
					$affectedRows += $this->aCatproter->save($con);
				}
				$this->setCatproter($this->aCatproter);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CatreginmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CatreginmPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCatcarconinms !== null) {
				foreach($this->collCatcarconinms as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCatcarterinms !== null) {
				foreach($this->collCatcarterinms as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCatperinms !== null) {
				foreach($this->collCatperinms as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


												
			if ($this->aCatsubprc !== null) {
				if (!$this->aCatsubprc->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatsubprc->getValidationFailures());
				}
			}

			if ($this->aCatprc !== null) {
				if (!$this->aCatprc->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatprc->getValidationFailures());
				}
			}

			if ($this->aCatman !== null) {
				if (!$this->aCatman->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatman->getValidationFailures());
				}
			}

			if ($this->aCatsec !== null) {
				if (!$this->aCatsec->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatsec->getValidationFailures());
				}
			}

			if ($this->aCatpar !== null) {
				if (!$this->aCatpar->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatpar->getValidationFailures());
				}
			}

			if ($this->aCatmun !== null) {
				if (!$this->aCatmun->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatmun->getValidationFailures());
				}
			}

			if ($this->aCatciu !== null) {
				if (!$this->aCatciu->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatciu->getValidationFailures());
				}
			}

			if ($this->aCatest !== null) {
				if (!$this->aCatest->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatest->getValidationFailures());
				}
			}

			if ($this->aCatbarurb !== null) {
				if (!$this->aCatbarurb->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatbarurb->getValidationFailures());
				}
			}

			if ($this->aCattramoRelatedByCattramofroId !== null) {
				if (!$this->aCattramoRelatedByCattramofroId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCattramoRelatedByCattramofroId->getValidationFailures());
				}
			}

			if ($this->aCattramoRelatedByCattramolatId !== null) {
				if (!$this->aCattramoRelatedByCattramolatId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCattramoRelatedByCattramolatId->getValidationFailures());
				}
			}

			if ($this->aCattramoRelatedByCattramolat2Id !== null) {
				if (!$this->aCattramoRelatedByCattramolat2Id->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCattramoRelatedByCattramolat2Id->getValidationFailures());
				}
			}

			if ($this->aCatcodpos !== null) {
				if (!$this->aCatcodpos->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatcodpos->getValidationFailures());
				}
			}

			if ($this->aCattipviv !== null) {
				if (!$this->aCattipviv->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCattipviv->getValidationFailures());
				}
			}

			if ($this->aCatconinm !== null) {
				if (!$this->aCatconinm->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatconinm->getValidationFailures());
				}
			}

			if ($this->aCatusoesp !== null) {
				if (!$this->aCatusoesp->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatusoesp->getValidationFailures());
				}
			}

			if ($this->aCatconsoc !== null) {
				if (!$this->aCatconsoc->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatconsoc->getValidationFailures());
				}
			}

			if ($this->aCatrut !== null) {
				if (!$this->aCatrut->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatrut->getValidationFailures());
				}
			}

			if ($this->aCatcarterinm !== null) {
				if (!$this->aCatcarterinm->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatcarterinm->getValidationFailures());
				}
			}

			if ($this->aCatproter !== null) {
				if (!$this->aCatproter->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatproter->getValidationFailures());
				}
			}


			if (($retval = CatreginmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCatcarconinms !== null) {
					foreach($this->collCatcarconinms as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCatcarterinms !== null) {
					foreach($this->collCatcarterinms as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCatperinms !== null) {
					foreach($this->collCatperinms as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatreginmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCatsubprcId();
				break;
			case 1:
				return $this->getCatprcId();
				break;
			case 2:
				return $this->getCatmanId();
				break;
			case 3:
				return $this->getCatsecId();
				break;
			case 4:
				return $this->getCatparId();
				break;
			case 5:
				return $this->getCatmunId();
				break;
			case 6:
				return $this->getCatciuId();
				break;
			case 7:
				return $this->getCatestId();
				break;
			case 8:
				return $this->getCatbarurbId();
				break;
			case 9:
				return $this->getCattramofroId();
				break;
			case 10:
				return $this->getCattramolatId();
				break;
			case 11:
				return $this->getCattramolat2Id();
				break;
			case 12:
				return $this->getCatcodposId();
				break;
			case 13:
				return $this->getCattipvivId();
				break;
			case 14:
				return $this->getCatconinmId();
				break;
			case 15:
				return $this->getCatusoespId();
				break;
			case 16:
				return $this->getCatconsocId();
				break;
			case 17:
				return $this->getCatrutId();
				break;
			case 18:
				return $this->getCatcarterinmId();
				break;
			case 19:
				return $this->getCatproterId();
				break;
			case 20:
				return $this->getCoddivgeo();
				break;
			case 21:
				return $this->getNrocas();
				break;
			case 22:
				return $this->getFecreg();
				break;
			case 23:
				return $this->getDirinm();
				break;
			case 24:
				return $this->getNivinm();
				break;
			case 25:
				return $this->getUnihab();
				break;
			case 26:
				return $this->getEdicas();
				break;
			case 27:
				return $this->getPisinm();
				break;
			case 28:
				return $this->getNuminm();
				break;
			case 29:
				return $this->getUbigex();
				break;
			case 30:
				return $this->getUbigey();
				break;
			case 31:
				return $this->getUbigez();
				break;
			case 32:
				return $this->getNumhab();
				break;
			case 33:
				return $this->getNumper();
				break;
			case 34:
				return $this->getNumsan();
				break;
			case 35:
				return $this->getNumtom();
				break;
			case 36:
				return $this->getArever();
				break;
			case 37:
				return $this->getLoccom();
				break;
			case 38:
				return $this->getLocind();
				break;
			case 39:
				return $this->getCaptan();
				break;
			case 40:
				return $this->getCappis();
				break;
			case 41:
				return $this->getTrapis();
				break;
			case 42:
				return $this->getNumtel();
				break;
			case 43:
				return $this->getNomarccro();
				break;
			case 44:
				return $this->getOficom();
				break;
			case 45:
				return $this->getFotinm();
				break;
			case 46:
				return $this->getLineste();
				break;
			case 47:
				return $this->getLinnor();
				break;
			case 48:
				return $this->getLinoes();
				break;
			case 49:
				return $this->getLinsur();
				break;
			case 50:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatreginmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCatsubprcId(),
			$keys[1] => $this->getCatprcId(),
			$keys[2] => $this->getCatmanId(),
			$keys[3] => $this->getCatsecId(),
			$keys[4] => $this->getCatparId(),
			$keys[5] => $this->getCatmunId(),
			$keys[6] => $this->getCatciuId(),
			$keys[7] => $this->getCatestId(),
			$keys[8] => $this->getCatbarurbId(),
			$keys[9] => $this->getCattramofroId(),
			$keys[10] => $this->getCattramolatId(),
			$keys[11] => $this->getCattramolat2Id(),
			$keys[12] => $this->getCatcodposId(),
			$keys[13] => $this->getCattipvivId(),
			$keys[14] => $this->getCatconinmId(),
			$keys[15] => $this->getCatusoespId(),
			$keys[16] => $this->getCatconsocId(),
			$keys[17] => $this->getCatrutId(),
			$keys[18] => $this->getCatcarterinmId(),
			$keys[19] => $this->getCatproterId(),
			$keys[20] => $this->getCoddivgeo(),
			$keys[21] => $this->getNrocas(),
			$keys[22] => $this->getFecreg(),
			$keys[23] => $this->getDirinm(),
			$keys[24] => $this->getNivinm(),
			$keys[25] => $this->getUnihab(),
			$keys[26] => $this->getEdicas(),
			$keys[27] => $this->getPisinm(),
			$keys[28] => $this->getNuminm(),
			$keys[29] => $this->getUbigex(),
			$keys[30] => $this->getUbigey(),
			$keys[31] => $this->getUbigez(),
			$keys[32] => $this->getNumhab(),
			$keys[33] => $this->getNumper(),
			$keys[34] => $this->getNumsan(),
			$keys[35] => $this->getNumtom(),
			$keys[36] => $this->getArever(),
			$keys[37] => $this->getLoccom(),
			$keys[38] => $this->getLocind(),
			$keys[39] => $this->getCaptan(),
			$keys[40] => $this->getCappis(),
			$keys[41] => $this->getTrapis(),
			$keys[42] => $this->getNumtel(),
			$keys[43] => $this->getNomarccro(),
			$keys[44] => $this->getOficom(),
			$keys[45] => $this->getFotinm(),
			$keys[46] => $this->getLineste(),
			$keys[47] => $this->getLinnor(),
			$keys[48] => $this->getLinoes(),
			$keys[49] => $this->getLinsur(),
			$keys[50] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatreginmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCatsubprcId($value);
				break;
			case 1:
				$this->setCatprcId($value);
				break;
			case 2:
				$this->setCatmanId($value);
				break;
			case 3:
				$this->setCatsecId($value);
				break;
			case 4:
				$this->setCatparId($value);
				break;
			case 5:
				$this->setCatmunId($value);
				break;
			case 6:
				$this->setCatciuId($value);
				break;
			case 7:
				$this->setCatestId($value);
				break;
			case 8:
				$this->setCatbarurbId($value);
				break;
			case 9:
				$this->setCattramofroId($value);
				break;
			case 10:
				$this->setCattramolatId($value);
				break;
			case 11:
				$this->setCattramolat2Id($value);
				break;
			case 12:
				$this->setCatcodposId($value);
				break;
			case 13:
				$this->setCattipvivId($value);
				break;
			case 14:
				$this->setCatconinmId($value);
				break;
			case 15:
				$this->setCatusoespId($value);
				break;
			case 16:
				$this->setCatconsocId($value);
				break;
			case 17:
				$this->setCatrutId($value);
				break;
			case 18:
				$this->setCatcarterinmId($value);
				break;
			case 19:
				$this->setCatproterId($value);
				break;
			case 20:
				$this->setCoddivgeo($value);
				break;
			case 21:
				$this->setNrocas($value);
				break;
			case 22:
				$this->setFecreg($value);
				break;
			case 23:
				$this->setDirinm($value);
				break;
			case 24:
				$this->setNivinm($value);
				break;
			case 25:
				$this->setUnihab($value);
				break;
			case 26:
				$this->setEdicas($value);
				break;
			case 27:
				$this->setPisinm($value);
				break;
			case 28:
				$this->setNuminm($value);
				break;
			case 29:
				$this->setUbigex($value);
				break;
			case 30:
				$this->setUbigey($value);
				break;
			case 31:
				$this->setUbigez($value);
				break;
			case 32:
				$this->setNumhab($value);
				break;
			case 33:
				$this->setNumper($value);
				break;
			case 34:
				$this->setNumsan($value);
				break;
			case 35:
				$this->setNumtom($value);
				break;
			case 36:
				$this->setArever($value);
				break;
			case 37:
				$this->setLoccom($value);
				break;
			case 38:
				$this->setLocind($value);
				break;
			case 39:
				$this->setCaptan($value);
				break;
			case 40:
				$this->setCappis($value);
				break;
			case 41:
				$this->setTrapis($value);
				break;
			case 42:
				$this->setNumtel($value);
				break;
			case 43:
				$this->setNomarccro($value);
				break;
			case 44:
				$this->setOficom($value);
				break;
			case 45:
				$this->setFotinm($value);
				break;
			case 46:
				$this->setLineste($value);
				break;
			case 47:
				$this->setLinnor($value);
				break;
			case 48:
				$this->setLinoes($value);
				break;
			case 49:
				$this->setLinsur($value);
				break;
			case 50:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatreginmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCatsubprcId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCatprcId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCatmanId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCatsecId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCatparId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCatmunId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCatciuId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCatestId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCatbarurbId($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCattramofroId($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCattramolatId($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCattramolat2Id($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCatcodposId($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCattipvivId($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCatconinmId($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCatusoespId($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCatconsocId($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCatrutId($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCatcarterinmId($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCatproterId($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCoddivgeo($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setNrocas($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setFecreg($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setDirinm($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setNivinm($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setUnihab($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setEdicas($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setPisinm($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setNuminm($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setUbigex($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setUbigey($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setUbigez($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setNumhab($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setNumper($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setNumsan($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setNumtom($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setArever($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setLoccom($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setLocind($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setCaptan($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setCappis($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setTrapis($arr[$keys[41]]);
		if (array_key_exists($keys[42], $arr)) $this->setNumtel($arr[$keys[42]]);
		if (array_key_exists($keys[43], $arr)) $this->setNomarccro($arr[$keys[43]]);
		if (array_key_exists($keys[44], $arr)) $this->setOficom($arr[$keys[44]]);
		if (array_key_exists($keys[45], $arr)) $this->setFotinm($arr[$keys[45]]);
		if (array_key_exists($keys[46], $arr)) $this->setLineste($arr[$keys[46]]);
		if (array_key_exists($keys[47], $arr)) $this->setLinnor($arr[$keys[47]]);
		if (array_key_exists($keys[48], $arr)) $this->setLinoes($arr[$keys[48]]);
		if (array_key_exists($keys[49], $arr)) $this->setLinsur($arr[$keys[49]]);
		if (array_key_exists($keys[50], $arr)) $this->setId($arr[$keys[50]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CatreginmPeer::DATABASE_NAME);

		if ($this->isColumnModified(CatreginmPeer::CATSUBPRC_ID)) $criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->catsubprc_id);
		if ($this->isColumnModified(CatreginmPeer::CATPRC_ID)) $criteria->add(CatreginmPeer::CATPRC_ID, $this->catprc_id);
		if ($this->isColumnModified(CatreginmPeer::CATMAN_ID)) $criteria->add(CatreginmPeer::CATMAN_ID, $this->catman_id);
		if ($this->isColumnModified(CatreginmPeer::CATSEC_ID)) $criteria->add(CatreginmPeer::CATSEC_ID, $this->catsec_id);
		if ($this->isColumnModified(CatreginmPeer::CATPAR_ID)) $criteria->add(CatreginmPeer::CATPAR_ID, $this->catpar_id);
		if ($this->isColumnModified(CatreginmPeer::CATMUN_ID)) $criteria->add(CatreginmPeer::CATMUN_ID, $this->catmun_id);
		if ($this->isColumnModified(CatreginmPeer::CATCIU_ID)) $criteria->add(CatreginmPeer::CATCIU_ID, $this->catciu_id);
		if ($this->isColumnModified(CatreginmPeer::CATEST_ID)) $criteria->add(CatreginmPeer::CATEST_ID, $this->catest_id);
		if ($this->isColumnModified(CatreginmPeer::CATBARURB_ID)) $criteria->add(CatreginmPeer::CATBARURB_ID, $this->catbarurb_id);
		if ($this->isColumnModified(CatreginmPeer::CATTRAMOFRO_ID)) $criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->cattramofro_id);
		if ($this->isColumnModified(CatreginmPeer::CATTRAMOLAT_ID)) $criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->cattramolat_id);
		if ($this->isColumnModified(CatreginmPeer::CATTRAMOLAT2_ID)) $criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->cattramolat2_id);
		if ($this->isColumnModified(CatreginmPeer::CATCODPOS_ID)) $criteria->add(CatreginmPeer::CATCODPOS_ID, $this->catcodpos_id);
		if ($this->isColumnModified(CatreginmPeer::CATTIPVIV_ID)) $criteria->add(CatreginmPeer::CATTIPVIV_ID, $this->cattipviv_id);
		if ($this->isColumnModified(CatreginmPeer::CATCONINM_ID)) $criteria->add(CatreginmPeer::CATCONINM_ID, $this->catconinm_id);
		if ($this->isColumnModified(CatreginmPeer::CATUSOESP_ID)) $criteria->add(CatreginmPeer::CATUSOESP_ID, $this->catusoesp_id);
		if ($this->isColumnModified(CatreginmPeer::CATCONSOC_ID)) $criteria->add(CatreginmPeer::CATCONSOC_ID, $this->catconsoc_id);
		if ($this->isColumnModified(CatreginmPeer::CATRUT_ID)) $criteria->add(CatreginmPeer::CATRUT_ID, $this->catrut_id);
		if ($this->isColumnModified(CatreginmPeer::CATCARTERINM_ID)) $criteria->add(CatreginmPeer::CATCARTERINM_ID, $this->catcarterinm_id);
		if ($this->isColumnModified(CatreginmPeer::CATPROTER_ID)) $criteria->add(CatreginmPeer::CATPROTER_ID, $this->catproter_id);
		if ($this->isColumnModified(CatreginmPeer::CODDIVGEO)) $criteria->add(CatreginmPeer::CODDIVGEO, $this->coddivgeo);
		if ($this->isColumnModified(CatreginmPeer::NROCAS)) $criteria->add(CatreginmPeer::NROCAS, $this->nrocas);
		if ($this->isColumnModified(CatreginmPeer::FECREG)) $criteria->add(CatreginmPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(CatreginmPeer::DIRINM)) $criteria->add(CatreginmPeer::DIRINM, $this->dirinm);
		if ($this->isColumnModified(CatreginmPeer::NIVINM)) $criteria->add(CatreginmPeer::NIVINM, $this->nivinm);
		if ($this->isColumnModified(CatreginmPeer::UNIHAB)) $criteria->add(CatreginmPeer::UNIHAB, $this->unihab);
		if ($this->isColumnModified(CatreginmPeer::EDICAS)) $criteria->add(CatreginmPeer::EDICAS, $this->edicas);
		if ($this->isColumnModified(CatreginmPeer::PISINM)) $criteria->add(CatreginmPeer::PISINM, $this->pisinm);
		if ($this->isColumnModified(CatreginmPeer::NUMINM)) $criteria->add(CatreginmPeer::NUMINM, $this->numinm);
		if ($this->isColumnModified(CatreginmPeer::UBIGEX)) $criteria->add(CatreginmPeer::UBIGEX, $this->ubigex);
		if ($this->isColumnModified(CatreginmPeer::UBIGEY)) $criteria->add(CatreginmPeer::UBIGEY, $this->ubigey);
		if ($this->isColumnModified(CatreginmPeer::UBIGEZ)) $criteria->add(CatreginmPeer::UBIGEZ, $this->ubigez);
		if ($this->isColumnModified(CatreginmPeer::NUMHAB)) $criteria->add(CatreginmPeer::NUMHAB, $this->numhab);
		if ($this->isColumnModified(CatreginmPeer::NUMPER)) $criteria->add(CatreginmPeer::NUMPER, $this->numper);
		if ($this->isColumnModified(CatreginmPeer::NUMSAN)) $criteria->add(CatreginmPeer::NUMSAN, $this->numsan);
		if ($this->isColumnModified(CatreginmPeer::NUMTOM)) $criteria->add(CatreginmPeer::NUMTOM, $this->numtom);
		if ($this->isColumnModified(CatreginmPeer::AREVER)) $criteria->add(CatreginmPeer::AREVER, $this->arever);
		if ($this->isColumnModified(CatreginmPeer::LOCCOM)) $criteria->add(CatreginmPeer::LOCCOM, $this->loccom);
		if ($this->isColumnModified(CatreginmPeer::LOCIND)) $criteria->add(CatreginmPeer::LOCIND, $this->locind);
		if ($this->isColumnModified(CatreginmPeer::CAPTAN)) $criteria->add(CatreginmPeer::CAPTAN, $this->captan);
		if ($this->isColumnModified(CatreginmPeer::CAPPIS)) $criteria->add(CatreginmPeer::CAPPIS, $this->cappis);
		if ($this->isColumnModified(CatreginmPeer::TRAPIS)) $criteria->add(CatreginmPeer::TRAPIS, $this->trapis);
		if ($this->isColumnModified(CatreginmPeer::NUMTEL)) $criteria->add(CatreginmPeer::NUMTEL, $this->numtel);
		if ($this->isColumnModified(CatreginmPeer::NOMARCCRO)) $criteria->add(CatreginmPeer::NOMARCCRO, $this->nomarccro);
		if ($this->isColumnModified(CatreginmPeer::OFICOM)) $criteria->add(CatreginmPeer::OFICOM, $this->oficom);
		if ($this->isColumnModified(CatreginmPeer::FOTINM)) $criteria->add(CatreginmPeer::FOTINM, $this->fotinm);
		if ($this->isColumnModified(CatreginmPeer::LINESTE)) $criteria->add(CatreginmPeer::LINESTE, $this->lineste);
		if ($this->isColumnModified(CatreginmPeer::LINNOR)) $criteria->add(CatreginmPeer::LINNOR, $this->linnor);
		if ($this->isColumnModified(CatreginmPeer::LINOES)) $criteria->add(CatreginmPeer::LINOES, $this->linoes);
		if ($this->isColumnModified(CatreginmPeer::LINSUR)) $criteria->add(CatreginmPeer::LINSUR, $this->linsur);
		if ($this->isColumnModified(CatreginmPeer::ID)) $criteria->add(CatreginmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CatreginmPeer::DATABASE_NAME);

		$criteria->add(CatreginmPeer::ID, $this->id);

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

		$copyObj->setCatsubprcId($this->catsubprc_id);

		$copyObj->setCatprcId($this->catprc_id);

		$copyObj->setCatmanId($this->catman_id);

		$copyObj->setCatsecId($this->catsec_id);

		$copyObj->setCatparId($this->catpar_id);

		$copyObj->setCatmunId($this->catmun_id);

		$copyObj->setCatciuId($this->catciu_id);

		$copyObj->setCatestId($this->catest_id);

		$copyObj->setCatbarurbId($this->catbarurb_id);

		$copyObj->setCattramofroId($this->cattramofro_id);

		$copyObj->setCattramolatId($this->cattramolat_id);

		$copyObj->setCattramolat2Id($this->cattramolat2_id);

		$copyObj->setCatcodposId($this->catcodpos_id);

		$copyObj->setCattipvivId($this->cattipviv_id);

		$copyObj->setCatconinmId($this->catconinm_id);

		$copyObj->setCatusoespId($this->catusoesp_id);

		$copyObj->setCatconsocId($this->catconsoc_id);

		$copyObj->setCatrutId($this->catrut_id);

		$copyObj->setCatcarterinmId($this->catcarterinm_id);

		$copyObj->setCatproterId($this->catproter_id);

		$copyObj->setCoddivgeo($this->coddivgeo);

		$copyObj->setNrocas($this->nrocas);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setDirinm($this->dirinm);

		$copyObj->setNivinm($this->nivinm);

		$copyObj->setUnihab($this->unihab);

		$copyObj->setEdicas($this->edicas);

		$copyObj->setPisinm($this->pisinm);

		$copyObj->setNuminm($this->numinm);

		$copyObj->setUbigex($this->ubigex);

		$copyObj->setUbigey($this->ubigey);

		$copyObj->setUbigez($this->ubigez);

		$copyObj->setNumhab($this->numhab);

		$copyObj->setNumper($this->numper);

		$copyObj->setNumsan($this->numsan);

		$copyObj->setNumtom($this->numtom);

		$copyObj->setArever($this->arever);

		$copyObj->setLoccom($this->loccom);

		$copyObj->setLocind($this->locind);

		$copyObj->setCaptan($this->captan);

		$copyObj->setCappis($this->cappis);

		$copyObj->setTrapis($this->trapis);

		$copyObj->setNumtel($this->numtel);

		$copyObj->setNomarccro($this->nomarccro);

		$copyObj->setOficom($this->oficom);

		$copyObj->setFotinm($this->fotinm);

		$copyObj->setLineste($this->lineste);

		$copyObj->setLinnor($this->linnor);

		$copyObj->setLinoes($this->linoes);

		$copyObj->setLinsur($this->linsur);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCatcarconinms() as $relObj) {
				$copyObj->addCatcarconinm($relObj->copy($deepCopy));
			}

			foreach($this->getCatcarterinms() as $relObj) {
				$copyObj->addCatcarterinm($relObj->copy($deepCopy));
			}

			foreach($this->getCatperinms() as $relObj) {
				$copyObj->addCatperinm($relObj->copy($deepCopy));
			}

		} 

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
			self::$peer = new CatreginmPeer();
		}
		return self::$peer;
	}

	
	public function setCatsubprc($v)
	{


		if ($v === null) {
			$this->setCatsubprcId(NULL);
		} else {
			$this->setCatsubprcId($v->getId());
		}


		$this->aCatsubprc = $v;
	}


	
	public function getCatsubprc($con = null)
	{
		if ($this->aCatsubprc === null && ($this->catsubprc_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatsubprcPeer.php';

			$this->aCatsubprc = CatsubprcPeer::retrieveByPK($this->catsubprc_id, $con);

			
		}
		return $this->aCatsubprc;
	}

	
	public function setCatprc($v)
	{


		if ($v === null) {
			$this->setCatprcId(NULL);
		} else {
			$this->setCatprcId($v->getId());
		}


		$this->aCatprc = $v;
	}


	
	public function getCatprc($con = null)
	{
		if ($this->aCatprc === null && ($this->catprc_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatprcPeer.php';

			$this->aCatprc = CatprcPeer::retrieveByPK($this->catprc_id, $con);

			
		}
		return $this->aCatprc;
	}

	
	public function setCatman($v)
	{


		if ($v === null) {
			$this->setCatmanId(NULL);
		} else {
			$this->setCatmanId($v->getId());
		}


		$this->aCatman = $v;
	}


	
	public function getCatman($con = null)
	{
		if ($this->aCatman === null && ($this->catman_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatmanPeer.php';

			$this->aCatman = CatmanPeer::retrieveByPK($this->catman_id, $con);

			
		}
		return $this->aCatman;
	}

	
	public function setCatsec($v)
	{


		if ($v === null) {
			$this->setCatsecId(NULL);
		} else {
			$this->setCatsecId($v->getId());
		}


		$this->aCatsec = $v;
	}


	
	public function getCatsec($con = null)
	{
		if ($this->aCatsec === null && ($this->catsec_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatsecPeer.php';

			$this->aCatsec = CatsecPeer::retrieveByPK($this->catsec_id, $con);

			
		}
		return $this->aCatsec;
	}

	
	public function setCatpar($v)
	{


		if ($v === null) {
			$this->setCatparId(NULL);
		} else {
			$this->setCatparId($v->getId());
		}


		$this->aCatpar = $v;
	}


	
	public function getCatpar($con = null)
	{
		if ($this->aCatpar === null && ($this->catpar_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatparPeer.php';

			$this->aCatpar = CatparPeer::retrieveByPK($this->catpar_id, $con);

			
		}
		return $this->aCatpar;
	}

	
	public function setCatmun($v)
	{


		if ($v === null) {
			$this->setCatmunId(NULL);
		} else {
			$this->setCatmunId($v->getId());
		}


		$this->aCatmun = $v;
	}


	
	public function getCatmun($con = null)
	{
		if ($this->aCatmun === null && ($this->catmun_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatmunPeer.php';

			$this->aCatmun = CatmunPeer::retrieveByPK($this->catmun_id, $con);

			
		}
		return $this->aCatmun;
	}

	
	public function setCatciu($v)
	{


		if ($v === null) {
			$this->setCatciuId(NULL);
		} else {
			$this->setCatciuId($v->getId());
		}


		$this->aCatciu = $v;
	}


	
	public function getCatciu($con = null)
	{
		if ($this->aCatciu === null && ($this->catciu_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatciuPeer.php';

			$this->aCatciu = CatciuPeer::retrieveByPK($this->catciu_id, $con);

			
		}
		return $this->aCatciu;
	}

	
	public function setCatest($v)
	{


		if ($v === null) {
			$this->setCatestId(NULL);
		} else {
			$this->setCatestId($v->getId());
		}


		$this->aCatest = $v;
	}


	
	public function getCatest($con = null)
	{
		if ($this->aCatest === null && ($this->catest_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatestPeer.php';

			$this->aCatest = CatestPeer::retrieveByPK($this->catest_id, $con);

			
		}
		return $this->aCatest;
	}

	
	public function setCatbarurb($v)
	{


		if ($v === null) {
			$this->setCatbarurbId(NULL);
		} else {
			$this->setCatbarurbId($v->getId());
		}


		$this->aCatbarurb = $v;
	}


	
	public function getCatbarurb($con = null)
	{
		if ($this->aCatbarurb === null && ($this->catbarurb_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatbarurbPeer.php';

			$this->aCatbarurb = CatbarurbPeer::retrieveByPK($this->catbarurb_id, $con);

			
		}
		return $this->aCatbarurb;
	}

	
	public function setCattramoRelatedByCattramofroId($v)
	{


		if ($v === null) {
			$this->setCattramofroId(NULL);
		} else {
			$this->setCattramofroId($v->getId());
		}


		$this->aCattramoRelatedByCattramofroId = $v;
	}


	
	public function getCattramoRelatedByCattramofroId($con = null)
	{
		if ($this->aCattramoRelatedByCattramofroId === null && ($this->cattramofro_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCattramoPeer.php';

			$this->aCattramoRelatedByCattramofroId = CattramoPeer::retrieveByPK($this->cattramofro_id, $con);

			
		}
		return $this->aCattramoRelatedByCattramofroId;
	}

	
	public function setCattramoRelatedByCattramolatId($v)
	{


		if ($v === null) {
			$this->setCattramolatId(NULL);
		} else {
			$this->setCattramolatId($v->getId());
		}


		$this->aCattramoRelatedByCattramolatId = $v;
	}


	
	public function getCattramoRelatedByCattramolatId($con = null)
	{
		if ($this->aCattramoRelatedByCattramolatId === null && ($this->cattramolat_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCattramoPeer.php';

			$this->aCattramoRelatedByCattramolatId = CattramoPeer::retrieveByPK($this->cattramolat_id, $con);

			
		}
		return $this->aCattramoRelatedByCattramolatId;
	}

	
	public function setCattramoRelatedByCattramolat2Id($v)
	{


		if ($v === null) {
			$this->setCattramolat2Id(NULL);
		} else {
			$this->setCattramolat2Id($v->getId());
		}


		$this->aCattramoRelatedByCattramolat2Id = $v;
	}


	
	public function getCattramoRelatedByCattramolat2Id($con = null)
	{
		if ($this->aCattramoRelatedByCattramolat2Id === null && ($this->cattramolat2_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCattramoPeer.php';

			$this->aCattramoRelatedByCattramolat2Id = CattramoPeer::retrieveByPK($this->cattramolat2_id, $con);

			
		}
		return $this->aCattramoRelatedByCattramolat2Id;
	}

	
	public function setCatcodpos($v)
	{


		if ($v === null) {
			$this->setCatcodposId(NULL);
		} else {
			$this->setCatcodposId($v->getId());
		}


		$this->aCatcodpos = $v;
	}


	
	public function getCatcodpos($con = null)
	{
		if ($this->aCatcodpos === null && ($this->catcodpos_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatcodposPeer.php';

			$this->aCatcodpos = CatcodposPeer::retrieveByPK($this->catcodpos_id, $con);

			
		}
		return $this->aCatcodpos;
	}

	
	public function setCattipviv($v)
	{


		if ($v === null) {
			$this->setCattipvivId(NULL);
		} else {
			$this->setCattipvivId($v->getId());
		}


		$this->aCattipviv = $v;
	}


	
	public function getCattipviv($con = null)
	{
		if ($this->aCattipviv === null && ($this->cattipviv_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCattipvivPeer.php';

			$this->aCattipviv = CattipvivPeer::retrieveByPK($this->cattipviv_id, $con);

			
		}
		return $this->aCattipviv;
	}

	
	public function setCatconinm($v)
	{


		if ($v === null) {
			$this->setCatconinmId(NULL);
		} else {
			$this->setCatconinmId($v->getId());
		}


		$this->aCatconinm = $v;
	}


	
	public function getCatconinm($con = null)
	{
		if ($this->aCatconinm === null && ($this->catconinm_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatconinmPeer.php';

			$this->aCatconinm = CatconinmPeer::retrieveByPK($this->catconinm_id, $con);

			
		}
		return $this->aCatconinm;
	}

	
	public function setCatusoesp($v)
	{


		if ($v === null) {
			$this->setCatusoespId(NULL);
		} else {
			$this->setCatusoespId($v->getId());
		}


		$this->aCatusoesp = $v;
	}


	
	public function getCatusoesp($con = null)
	{
		if ($this->aCatusoesp === null && ($this->catusoesp_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatusoespPeer.php';

			$this->aCatusoesp = CatusoespPeer::retrieveByPK($this->catusoesp_id, $con);

			
		}
		return $this->aCatusoesp;
	}

	
	public function setCatconsoc($v)
	{


		if ($v === null) {
			$this->setCatconsocId(NULL);
		} else {
			$this->setCatconsocId($v->getId());
		}


		$this->aCatconsoc = $v;
	}


	
	public function getCatconsoc($con = null)
	{
		if ($this->aCatconsoc === null && ($this->catconsoc_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatconsocPeer.php';

			$this->aCatconsoc = CatconsocPeer::retrieveByPK($this->catconsoc_id, $con);

			
		}
		return $this->aCatconsoc;
	}

	
	public function setCatrut($v)
	{


		if ($v === null) {
			$this->setCatrutId(NULL);
		} else {
			$this->setCatrutId($v->getId());
		}


		$this->aCatrut = $v;
	}


	
	public function getCatrut($con = null)
	{
		if ($this->aCatrut === null && ($this->catrut_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatrutPeer.php';

			$this->aCatrut = CatrutPeer::retrieveByPK($this->catrut_id, $con);

			
		}
		return $this->aCatrut;
	}

	
	public function setCatcarterinm($v)
	{


		if ($v === null) {
			$this->setCatcarterinmId(NULL);
		} else {
			$this->setCatcarterinmId($v->getId());
		}


		$this->aCatcarterinm = $v;
	}


	
	public function getCatcarterinm($con = null)
	{
		if ($this->aCatcarterinm === null && ($this->catcarterinm_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatcarterinmPeer.php';

			$this->aCatcarterinm = CatcarterinmPeer::retrieveByPK($this->catcarterinm_id, $con);

			
		}
		return $this->aCatcarterinm;
	}

	
	public function setCatproter($v)
	{


		if ($v === null) {
			$this->setCatproterId(NULL);
		} else {
			$this->setCatproterId($v->getId());
		}


		$this->aCatproter = $v;
	}


	
	public function getCatproter($con = null)
	{
		if ($this->aCatproter === null && ($this->catproter_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatproterPeer.php';

			$this->aCatproter = CatproterPeer::retrieveByPK($this->catproter_id, $con);

			
		}
		return $this->aCatproter;
	}

	
	public function initCatcarconinms()
	{
		if ($this->collCatcarconinms === null) {
			$this->collCatcarconinms = array();
		}
	}

	
	public function getCatcarconinms($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatcarconinmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatcarconinms === null) {
			if ($this->isNew()) {
			   $this->collCatcarconinms = array();
			} else {

				$criteria->add(CatcarconinmPeer::CATREGINM_ID, $this->getId());

				CatcarconinmPeer::addSelectColumns($criteria);
				$this->collCatcarconinms = CatcarconinmPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatcarconinmPeer::CATREGINM_ID, $this->getId());

				CatcarconinmPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatcarconinmCriteria) || !$this->lastCatcarconinmCriteria->equals($criteria)) {
					$this->collCatcarconinms = CatcarconinmPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatcarconinmCriteria = $criteria;
		return $this->collCatcarconinms;
	}

	
	public function countCatcarconinms($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatcarconinmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatcarconinmPeer::CATREGINM_ID, $this->getId());

		return CatcarconinmPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatcarconinm(Catcarconinm $l)
	{
		$this->collCatcarconinms[] = $l;
		$l->setCatreginm($this);
	}


	
	public function getCatcarconinmsJoinCatcarcon($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatcarconinmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatcarconinms === null) {
			if ($this->isNew()) {
				$this->collCatcarconinms = array();
			} else {

				$criteria->add(CatcarconinmPeer::CATREGINM_ID, $this->getId());

				$this->collCatcarconinms = CatcarconinmPeer::doSelectJoinCatcarcon($criteria, $con);
			}
		} else {
									
			$criteria->add(CatcarconinmPeer::CATREGINM_ID, $this->getId());

			if (!isset($this->lastCatcarconinmCriteria) || !$this->lastCatcarconinmCriteria->equals($criteria)) {
				$this->collCatcarconinms = CatcarconinmPeer::doSelectJoinCatcarcon($criteria, $con);
			}
		}
		$this->lastCatcarconinmCriteria = $criteria;

		return $this->collCatcarconinms;
	}

	
	public function initCatcarterinms()
	{
		if ($this->collCatcarterinms === null) {
			$this->collCatcarterinms = array();
		}
	}

	
	public function getCatcarterinms($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatcarterinmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatcarterinms === null) {
			if ($this->isNew()) {
			   $this->collCatcarterinms = array();
			} else {

				$criteria->add(CatcarterinmPeer::CATREGINM_ID, $this->getId());

				CatcarterinmPeer::addSelectColumns($criteria);
				$this->collCatcarterinms = CatcarterinmPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatcarterinmPeer::CATREGINM_ID, $this->getId());

				CatcarterinmPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatcarterinmCriteria) || !$this->lastCatcarterinmCriteria->equals($criteria)) {
					$this->collCatcarterinms = CatcarterinmPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatcarterinmCriteria = $criteria;
		return $this->collCatcarterinms;
	}

	
	public function countCatcarterinms($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatcarterinmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatcarterinmPeer::CATREGINM_ID, $this->getId());

		return CatcarterinmPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatcarterinm(Catcarterinm $l)
	{
		$this->collCatcarterinms[] = $l;
		$l->setCatreginm($this);
	}


	
	public function getCatcarterinmsJoinCatcarter($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatcarterinmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatcarterinms === null) {
			if ($this->isNew()) {
				$this->collCatcarterinms = array();
			} else {

				$criteria->add(CatcarterinmPeer::CATREGINM_ID, $this->getId());

				$this->collCatcarterinms = CatcarterinmPeer::doSelectJoinCatcarter($criteria, $con);
			}
		} else {
									
			$criteria->add(CatcarterinmPeer::CATREGINM_ID, $this->getId());

			if (!isset($this->lastCatcarterinmCriteria) || !$this->lastCatcarterinmCriteria->equals($criteria)) {
				$this->collCatcarterinms = CatcarterinmPeer::doSelectJoinCatcarter($criteria, $con);
			}
		}
		$this->lastCatcarterinmCriteria = $criteria;

		return $this->collCatcarterinms;
	}

	
	public function initCatperinms()
	{
		if ($this->collCatperinms === null) {
			$this->collCatperinms = array();
		}
	}

	
	public function getCatperinms($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatperinmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatperinms === null) {
			if ($this->isNew()) {
			   $this->collCatperinms = array();
			} else {

				$criteria->add(CatperinmPeer::CATREGINM_ID, $this->getId());

				CatperinmPeer::addSelectColumns($criteria);
				$this->collCatperinms = CatperinmPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatperinmPeer::CATREGINM_ID, $this->getId());

				CatperinmPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatperinmCriteria) || !$this->lastCatperinmCriteria->equals($criteria)) {
					$this->collCatperinms = CatperinmPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatperinmCriteria = $criteria;
		return $this->collCatperinms;
	}

	
	public function countCatperinms($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatperinmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatperinmPeer::CATREGINM_ID, $this->getId());

		return CatperinmPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatperinm(Catperinm $l)
	{
		$this->collCatperinms[] = $l;
		$l->setCatreginm($this);
	}


	
	public function getCatperinmsJoinCatregper($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatperinmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatperinms === null) {
			if ($this->isNew()) {
				$this->collCatperinms = array();
			} else {

				$criteria->add(CatperinmPeer::CATREGINM_ID, $this->getId());

				$this->collCatperinms = CatperinmPeer::doSelectJoinCatregper($criteria, $con);
			}
		} else {
									
			$criteria->add(CatperinmPeer::CATREGINM_ID, $this->getId());

			if (!isset($this->lastCatperinmCriteria) || !$this->lastCatperinmCriteria->equals($criteria)) {
				$this->collCatperinms = CatperinmPeer::doSelectJoinCatregper($criteria, $con);
			}
		}
		$this->lastCatperinmCriteria = $criteria;

		return $this->collCatperinms;
	}

} 