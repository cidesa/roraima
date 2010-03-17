<?php

/**
 * CatalogoWeb: Clase que para el manejo de los catálogos
 *
 * @package    Roraima
 * @subpackage lib
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class CatalogoWeb extends BaseCatalogoWeb {

  public function Caordcom_Almajuoc($params = array ()) {

    $this->c = new Criteria();
    if (count($params) > 0)
      $this->c->add(CaordcomPeer :: ORDCOM, $params[0]);
    $this->c->addJoin(CaordcomPeer :: ORDCOM, CaartordPeer :: ORDCOM);
    $this->sql = "Caartord.canord - Caartord.canaju <> Caartord.canrec ";
    $this->c->add(CaartordPeer :: CANORD, $this->sql, Criteria :: CUSTOM);
    $this->c->setDistinct();

    $this->columnas = array (
      CaordcomPeer :: ORDCOM => 'Código',
      CaordcomPeer :: FECORD => 'Fecha',
      CaordcomPeer :: DESORD => 'Descripción'
    );
  }

  /********************************Registro Articulos************************************************/

  public function Caramart_Almregart() {
    $this->c = new Criteria();
    // $this->c->addAscendingOrderByColumn(CaramartPeer::RAMART);

    $this->columnas = array (
      CaramartPeer :: RAMART => 'Código',
      CaramartPeer :: NOMRAM => 'Ramo',

    );
  }

  public function Nppartidas_Almregart() {
      $this->c = new Criteria();
      $this->c->clearSelectColumns();
    $this->c->addSelectColumn(NppartidasPeer::CODPAR);
      $this->c->addSelectColumn(NppartidasPeer::NOMPAR);
    $this->c->addSelectColumn("'' as ID");
    $this->c->addGroupByColumn(NppartidasPeer::CODPAR);
    $this->c->addGroupByColumn(NppartidasPeer::NOMPAR);

      $this->columnas = array (
          NppartidasPeer::CODPAR => 'Codigo',
          NppartidasPeer::NOMPAR => 'Descripcion');
  }

  /*************************************************************************************************/
  public function NconceptosCat_Asignar() {
    $this->c = new Criteria();
    //   $this->c->addAscendingOrderByColumn(NppartidasPeer::CODPAR);

    $this->columnas = array (
      NpcatprePeer :: CODCAT => 'Código',
      NpcatprePeer :: NOMCAT => 'Descripción',

    );
  }

  /********************************Definicion de Recaudos************************************************/
  public function Catiprec_Almregrec() {
    $this->c = new Criteria();
    //  $this->c->addAscendingOrderByColumn(CatiprecPeer::CODTIPREC);

    $this->columnas = array (
      CatiprecPeer :: CODTIPREC => 'Código',
      CatiprecPeer :: DESTIPREC => 'Descripción',

    );
  }
  /*************************************************************************************************/

  /********************************Edicion de Servicios************************************************/
  /*******                             Catalogo del Grid                                       ********/

  public function Caretser_Almretser() {
    $this->c = new Criteria();
    /* $this->c->add(OptipretPeer::DESTIP);
    $this->c->add(OptipretPeer::CODTIP);*/
    //   $this->c->addAscendingOrderByColumn(OptipretPeer::CODTIP);
    $this->maxlist = 10;

    $this->columnas = array (
      OptipretPeer :: CODTIP => 'Código',
      OptipretPeer :: DESTIP => 'Descripción',

    );
  }

  public function Caregart_Almretser($params = array ()) {
    $longitud = $params[0];
    $this->c = new Criteria();
    $this->c->add(CaregartPeer :: TIPO, 'S');
    $this->sql = "length(Codart) = '" . $longitud . "'";
    $this->c->add(CaregartPeer :: CODART, $this->sql, Criteria :: CUSTOM);

    $this->columnas = array (
      CaregartPeer :: CODART => 'Código',
      CaregartPeer :: DESART => 'Descripción'
    );
  }
  /*************************************************************************************************/

  /*********************   Definición del IVA para Agentes de Retención *********************/

  public function Optipret_Pagretiva() {
    $this->c = new Criteria();
    //    $this->c->addAscendingOrderByColumn(OptipretPeer::CODTIP);
    $this->maxlist = 10;

    $this->columnas = array (
      OptipretPeer :: CODTIP => 'Código',
      OptipretPeer :: DESTIP => 'Descripción',

    );
  }

  public function Optipret_Carecarg() {
    $this->c = new Criteria();
    //    $this->c->addAscendingOrderByColumn(CarecargPeer::CODRGO);
    $this->maxlist = 10;

    //$this->columnas = array (CARecargPeer::CODRGO => 'Código', CARecargPeer::NOMRGO => 'Descripción',);
    $this->columnas = array (
      CarecargPeer :: CODRGO => 'Código',
      CarecargPeer :: NOMRGO => 'Descripción',
      CarecargPeer :: MONRGO => 'Monto Recargo',
      CarecargPeer :: TIPRGO => 'Tipo Recargo',
      CarecargPeer :: CODPRE => 'Cod. Presupuestario',

    );
  }

  /******************************************************************************************/

  /*****************************Tipo de Retenciones***********************************/
  public function Contabb_Pagtipret() {
    $a = new Criteria();
    $reg = ContabaPeer :: doSelectOne($a);
    if ($reg) {
      $cuentaretencion = $reg->getCodctaret();
      $cuentaretencionhasta = $reg->getCodctarethas();
    } else {
      $cuentaretencion = "";
      $cuentaretencionhasta = "";
    }

    if ($cuentaretencion != "" && $cuentaretencionhasta != "") {
      $this->c = new Criteria();
      $this->c->add(ContabbPeer :: CARGAB, 'C');
      $this->c->add(ContabbPeer :: CODCTA, $cuentaretencion, Criteria :: GREATER_EQUAL);
      $this->c->add(ContabbPeer :: CODCTA, $cuentaretencionhasta, Criteria :: LESS_EQUAL);
      //    $this->c->addAscendingOrderByColumn(ContabbPeer::CODCTA);
    } else {
      $this->c = new Criteria();
      $this->c->add(ContabbPeer :: CARGAB, 'C');
      $this->c->add(ContabbPeer :: CODCTA, $cuentaretencion . '%', Criteria :: LIKE);
      //  $this->c->addAscendingOrderByColumn(ContabbPeer::CODCTA);
    }

    $this->columnas = array (
      ContabbPeer :: DESCTA => 'Descripción',
      ContabbPeer :: CODCTA => 'Código',
      ContabbPeer :: CARGAB => 'Cargable',

    );
  }

  /***********************************************************************************/

  /*********************   Definición del IVA para Agentes de Retención *********************/

  public function Fordefgen_Nppartidas() {
    $this->c = new Criteria();
    $this->maxlist = 10;

    $this->columnas = array (
      NppartidasPeer :: CODPAR => 'Código',
      NppartidasPeer :: NOMPAR => 'Descripción',

    );
  }

  /******************************************************************************************/

  /*************************Ordenes de Pago************************************************/

  public function Contabb_Pagemiord() {
    $this->c = new Criteria();
    $this->c->add(ContabbPeer :: CARGAB, 'C');
    //   $this->c->addAscendingOrderByColumn(ContabbPeer::CODCTA);

    $this->columnas = array (
      ContabbPeer :: CODCTA => 'Código',
      ContabbPeer :: DESCTA => 'Descripción',

    );
  }

  public function Opbenefi_Pagemiord() {
    $this->c = new Criteria();
    //   $this->c->addAscendingOrderByColumn(OpbenefiPeer::CEDRIF);

    $this->columnas = array (
      OpbenefiPeer :: CEDRIF => 'Cédula o RIF',
      OpbenefiPeer :: NOMBEN => 'Nombre',
      OpbenefiPeer :: CODCTA => 'Cuenta',

    );
  }

  public function Cpdoccau_Pagemiord() {
    $this->c = new Criteria();
    //  $this->c->addAscendingOrderByColumn(CpdoccauPeer::TIPCAU);

    $this->columnas = array (
      CpdoccauPeer :: TIPCAU => 'Código',
      CpdoccauPeer :: NOMEXT => 'Descripción',

    );
  }

  public function Fortipfin_Pagemiord() {
    $this->c = new Criteria();
    //   $this->c->addAscendingOrderByColumn(FortipfinPeer::CODFIN);

    $this->columnas = array (
      FortipfinPeer :: CODFIN => 'Código',
      FortipfinPeer :: NOMEXT => 'Descripción',

    );
  }

  public function Bnubica_Pagemiord($mascara) {
    $mask = $mascara[0];
    $this->c = new Criteria();
    $this->sql = "length(Codubi) = '" . $mask . "'";
    $this->c->add(BnubicaPeer :: CODUBI, $this->sql, Criteria :: CUSTOM);

    $this->columnas = array (
      BnubicaPeer :: CODUBI => 'Código',
      BnubicaPeer :: DESUBI => 'Descripción',
      BnubicaPeer :: STACOD => 'Estatus',

    );
  }

  public function Optipret_Pagemiret() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(OptipretPeer::CODTIP);

    $this->columnas = array (
      OptipretPeer :: CODTIP => 'Código',
      OptipretPeer :: DESTIP => 'Descripción',
      OptipretPeer :: CODCON => 'Cta. Contable',
      OptipretPeer :: BASIMP => 'Base Imponible',
      OptipretPeer :: PORRET => '% Retencion',
      OptipretPeer :: FACTOR => 'Factor',
      OptipretPeer :: PORSUS => '% Sustraendo',
      OptipretPeer :: UNITRI => 'Unidad'
    );
  }

  public function Cpprecom_Pagemiord() {
    $this->c = new Criteria();
    $this->c->add(CpprecomPeer :: MONPRC, CpprecomPeer :: SALCAU, Criteria :: GREATHER_THAN);
    $this->c->add(CpprecomPeer :: STAPRC, 'N', Criteria :: NOT_EQUAL);
    //    $this->c->addAscendingOrderByColumn(CpprecomPeer::REFPRC);

    $this->columnas = array (
      CpprecomPeer :: TIPPRC => 'Tipo',
      CpprecomPeer :: REFPRC => 'Referencia',
      CpprecomPeer :: FECPRC => 'Fecha',
      CpprecomPeer :: DESPRC => 'Descripción'
    );
  }

  public function Cpcompro_Pagemiord()
  {

  	$this->sql = "cpcompro.moncom > ((Select Sum(MonCau) as moncau from cpimpcom where refcom=cpcompro.refcom)+(Select Sum(monaju) as monaju from cpimpcom where refcom=cpcompro.refcom))";

    $this->c = new Criteria();
    $this->c->add(CpcomproPeer :: MONCOM, $this->sql, Criteria :: CUSTOM);  //$this->c->add(CpcomproPeer :: MONCOM, CpcomproPeer :: SALCAU, Criteria :: NOT_EQUAL);


    $a= new Criteria();
    $dato=CadefartPeer::doSelectOne($a);
    if ($dato)
    {
    	if ($dato->getComreqapr()=='S')
    	{
    		$this->c->add(CpcomproPeer :: APRCOM, 'S');
    	}
    }
    $this->sql2="";
    $this->c->add(CpcomproPeer :: STACOM, 'N', Criteria :: NOT_EQUAL);
    //   $this->c->addAscendingOrderByColumn(CpcomproPeer::REFCOM);

    $this->columnas = array (
      CpcomproPeer :: TIPCOM => 'Tipo',
      CpcomproPeer :: REFCOM => 'Referencia',
      CpcomproPeer :: FECCOM => 'Fecha',
      CpcomproPeer :: DESCOM => 'Descripción',
      CpcomproPeer :: CEDRIF => 'Ced/Rif Beneficiario',
    );

  }

  /****************************************************************************************/

  /**********************************Solicitud de Egresos**********************************/
  public function Npcatpre_Almsolegr($mascara) {
    $mask = $mascara[0];
    $this->c = new Criteria();
    $this->sql = "length(CodCat) = '" . $mask . "'";
    $this->c->add(NpcatprePeer :: CODCAT, $this->sql, Criteria :: CUSTOM);
    //   $this->c->addAscendingOrderByColumn(NpcatprePeer::CODCAT);

    $this->columnas = array (
      NpcatprePeer :: CODCAT => 'Código',
      NpcatprePeer :: NOMCAT => 'Descripción'
    );
  }

  public function Npcatpre_Categoriaxemp() {

    $this->c = new Criteria();
    $this->columnas = array (
      NpcatprePeer :: CODCAT => 'Código',
      NpcatprePeer :: NOMCAT => 'Descripción'
    );
  }

  public function Fortipfin_Almsolegr() {
    $this->c = new Criteria();
    //   $this->c->addAscendingOrderByColumn(FortipfinPeer::CODFIN);

    $this->columnas = array (
      FortipfinPeer :: CODFIN => 'Código',
      FortipfinPeer :: NOMEXT => 'Descripción',

    );
  }

  /****************************************************************************************/

  public function Cotizaciones() {
    $this->c = new Criteria();
    $this->c->add(CaproveePeer::ESTPRO,'A');
    $this->columnas = array (
      CaproveePeer :: RIFPRO => 'Código',
      CaproveePeer :: NOMPRO => 'Descripción',
      CaproveePeer :: CODPRO => 'Codigo'
    );

  }

  /********************************** Registro de Proveedores *********************************/
  public function Caramart_Almregpro() {
    $this->c = new Criteria();
    //   $this->c->addAscendingOrderByColumn(CaramartPeer::RAMART);

    $this->columnas = array (
      CaramartPeer :: NOMRAM => 'Descripción',
      CaramartPeer :: RAMART => 'Código',

    );
  }

  public function Contabb_Almregpro() {

    $sql = "Select codctaben,codctabenhas from Contaba";
    $result = array ();

    if (Herramientas :: BuscarDatos($sql, & $result)) {
      $CuentaProvee = $result[0]['codctaben'];
      $CuentaProveeHASTA = $result[0]['codctabenhas'];
    } else {
      $CuentaProvee = "";
      $CuentaProveeHASTA = "";
    }

    if (trim($CuentaProvee) != "" and trim($CuentaProveeHASTA) != "") {
      $this->c = new Criteria();
      $this->c->add(ContabbPeer :: CARGAB, 'C');
      $this->c->add(ContabbPeer :: CODCTA, ContabbPeer :: CODCTA . " between '{$CuentaProvee}' AND '{$CuentaProveeHASTA}'", Criteria :: CUSTOM);
      //     $this->c->addAscendingOrderByColumn(ContabbPeer :: DESCTA);
    } else {
      $this->c = new Criteria();
      $this->c->add(ContabbPeer :: CARGAB, 'C');
      $this->c->add(ContabbPeer :: CODCTA, $CuentaProvee . '%', Criteria :: LIKE);
      //      $this->c->addAscendingOrderByColumn(ContabbPeer :: DESCTA);
    }

    $this->columnas = array (
      ContabbPeer :: DESCTA => 'Descripción',
      ContabbPeer :: CODCTA => 'Código',

    );
  }

  public function Catiprec_Almregpro() {
    $this->c = new Criteria();
    //    $this->c->addAscendingOrderByColumn(CatiprecPeer::CODTIPREC);

    $this->columnas = array (
      CatiprecPeer :: DESTIPREC => 'Descripción',
      CatiprecPeer :: CODTIPREC => 'Código',

    );
  }

  /*********************************Edicion de Recargos**********************************/
  public function Cpdeftit_Almregrgo($mascara) {

    $mask = $mascara[0];
    $this->c = new Criteria();
    $this->sql = "length(Codpre) = '" . $mask . "'";
    $this->c->add(CpdeftitPeer :: CODPRE, $this->sql, Criteria :: CUSTOM);
    //      $this->c->addAscendingOrderByColumn(CpdeftitPeer::CODPRE);

    $this->columnas = array (
      CpdeftitPeer :: CODPRE => 'Código',
      CpdeftitPeer :: NOMPRE => 'Nombre'
    );
  }

  public function Nppartidas_Almregrgo() {
    $this->c = new Criteria;
    //     $this->c->addAscendingOrderByColumn(NppartidasPeer::CODPAR);
    $this->columnas = array (
      NppartidasPeer :: CODPAR => 'Código',
      NppartidasPeer :: NOMPAR => 'Nombre'
    );

  }

  public function Contabb_Almregrgo() {

    $this->c = new Criteria;
    //      $this->c->addAscendingOrderByColumn(ContabbPeer::CODCTA);
    $this->c->add(ContabbPeer :: CARGAB, 'C');
    $this->columnas = array (
      ContabbPeer :: DESCTA => 'Nombre',
      ContabbPeer :: CODCTA => 'Código'
    );

  }
  /****************************************************************************************/

  /********************************Emisión de Cheques************************************************/

  public function Cpdocpag_Tesmovemiche() {
    $this->c = new Criteria();
    //$this->c->addAscendingOrderByColumn(CpdocpagPeer::TIPPAG);

    $this->columnas = array (
      CpdocpagPeer :: TIPPAG => 'Tipo',
      CpdocpagPeer :: NOMEXT => 'Descripción',
      CpdocpagPeer :: REFIER => 'Refiere',
      CpdocpagPeer :: AFEPRC => 'Afe. Precom.',
      CpdocpagPeer :: AFECOM => 'Afe. Comp',
      CpdocpagPeer :: AFECAU => 'Afe. Cau.',
      CpdocpagPeer :: AFEPAG => 'Afe. Pag.',
      CpdocpagPeer :: AFEDIS => 'Afe. Dis.'
    );

  }

  public function Tsdefban_Tesmovemiche() {

    $this->c = new Criteria();
    $q= new  Criteria();
    $result=OpdefempPeer::doSelectOne($q);
    if ($result)
    {
      if ($result->getManbloqban()=='S')
      {
        $bus="numcue not in (select numcue from tsbloqban)";
        $this->c->add(TsdefbanPeer::NUMCUE,$bus,Criteria::CUSTOM);
      }
    }

    $this->columnas = array (
      TsdefbanPeer :: NUMCUE => 'Número de Cuenta',
      TsdefbanPeer :: NOMCUE => 'Nombre de la Cuenta',
      TsdefbanPeer :: CODCTA => 'Código de la Cuenta',
      TsdefbanPeer :: ID => 'Id'
    );
  }

  public function Opbenefi_Tesmovemiche() {
    $this->c = new Criteria();
    //  $this->c->addAscendingOrderByColumn(OpbenefiPeer::CEDRIF);

    $this->columnas = array (
      OpbenefiPeer :: CEDRIF => 'C.I/RIF',
      OpbenefiPeer :: NOMBEN => 'Beneficiario'
    );
  }

  /*   public function Cpdeftit_Tesmovemiche($mascara)
  {
        $this->c= new Criteria();
        //Select a.NomPre Descripcion, a.CodPre Codigo_Presupuestario,CodCta Cuenta_Contable from CPDEFTIT a,CPDEFNIV b Where Length(RTRIM(CodPre)) = Length(RTRIM(b.ForPre))  order by codpre
        // $this->sql = "length(Codpre) = '".$mask."'";
        $this->c->add(CpdeftitPeer::CODPRE, $this->sql, Criteria::CUSTOM);
        $this->c->addAscendingOrderByColumn(CpdeftitPeer::CODPRE);

        $this->columnas = array (CpdeftitPeer::NOMPRE => 'Nombre', CpdeftitPeer::CODPRE => 'Código');
  }*/

  /*****************************Registro  de  Beneficiarios********************************/

  public function Opbenefi_pagbenfic($params) {
    $c = new Criteria();
    $contaba = ContabaPeer :: doSelectOne($c);
    if ($contaba) {
      if ($params[0] == '1' || $params[0] == '6' || $params[0] == '7') {
        $codctaben = $contaba->getCodctaben();
        $codctabenhas = $contaba->getCodctabenhas();
      } else {
        $codctaben = $contaba->getCodord();
        $codctabenhas = "";
      }

    } else {
      $codctaben = "";
      $codctabenhas = "";
    }

    $this->c = new Criteria();
    $this->c->add(ContabbPeer :: CARGAB, 'C');

    //La variable params es para delimitar el tipo de codicion que lleva el SQL del catalogo
    //TIPO1
    if ($params[0] == '1') {
      if (($codctaben != "") && ($codctabenhas != "")) {

        $this->c->add(ContabbPeer :: CODCTA, $codctaben . '%', Criteria :: GREATER_THAN);
        $this->c->add(ContabbPeer :: CODCTA, $codctabenhas . '%', Criteria :: LESS_THAN);
      } else {

        $this->c->add(ContabbPeer :: CODCTA, $codctaben . '%', Criteria :: LIKE);
        $this->c->add(ContabbPeer :: CODCTA, $codctabenhas . '%', Criteria :: LIKE);
      }
    } //TIPO2
    else {

      $this->c->add(ContabbPeer :: CODCTA, $codctaben . '%', Criteria :: LIKE);
    }

    $this->c->addAscendingOrderByColumn(ContabbPeer :: DESCTA);

    $this->columnas = array (
      ContabbPeer :: DESCTA => 'Descripcion',
      ContabbPeer :: CODCTA => 'Codigo'
    );

  }

  /*************************************   Cotizaciones  ******************/

  public function Caregart_Almcotiza($params = array ()) {
    $mask = str_replace('@', '#', $params[0]);
    $longmask = 0;
    while (Herramientas :: instr($mask, '-', $longmask, 1) != 0) {
      $longmask = Herramientas :: instr($mask, '-', $longmask, 1) + $longmask;
    }

    $this->c = new Criteria();
    $this->sql = "length(Codart) > '" . $longmask . "'";
    $this->c->add(CaregartPeer :: CODART, $this->sql, Criteria :: CUSTOM);
    //  $this->c->addAscendingOrderByColumn(CaregartPeer::DESART);

    $this->columnas = array (
      CaregartPeer :: CODART => 'Código',
      CaregartPeer :: DESART => 'Descripción'
    );
  }

  /*****************************DEFINICION DE  EMPRESAS************************************/

  public function Opdefemp_pagdefemp($params) {
    $longitud = $params[0];
    $this->c = new Criteria();
    $this->sql = "length(Codcta) = '" . $longitud . "'";
    $this->c->add(ContabbPeer :: CODCTA, $this->sql, Criteria :: CUSTOM);

    $this->columnas = array (
      ContabbPeer :: DESCTA => 'Descripcion',
      ContabbPeer :: CODCTA => 'Codigo'
    );

  }

  public function Opdefemp_pagdefemp2() {
    $this->c = new Criteria();

    $this->columnas = array (
      CpdoccauPeer :: NOMEXT => 'Nombre',
      CpdoccauPeer :: TIPCAU => 'TIPO',
      CpdoccauPeer :: NOMABR => 'Nombre Abreviado'
    );

  }

  public function Opdefemp_pagdefemp3() {
    $this->c = new Criteria();
    //  $this->c->addAscendingOrderByColumn(TstipmovPeer::DESTIP);

    $this->columnas = array (
      TstipmovPeer :: DESTIP => 'Descripcion',
      TstipmovPeer :: CODTIP => 'Codigo',
      TstipmovPeer :: DEBCRE => 'Débito o Crédito'
    );

  }

  /****************************************************************************************/
  /******************************requisiciones****************************************/

  public function Caregart_Almreq($params = array ()) {
    $longitud = $params[0];
    $this->c = new Criteria();
    $this->c->add(CaregartPeer :: TIPO, 'A');
    $this->sql = "length(Codart) = '" . $longitud . "'";
    $this->c->add(CaregartPeer :: CODART, $this->sql, Criteria :: CUSTOM);

    $this->columnas = array (
      CaregartPeer :: CODART => 'Código',
      CaregartPeer :: DESART => 'Descripción',
      CaregartPeer :: COSULT => 'Costo'
    );
  }

  public function Npcatpre_Almreq()
  {
    $mascara = Herramientas::getObtener_FormatoCategoria();
    $mask=strlen($mascara);
    $this->c = new Criteria();
    $this->sql = "length(CodCat) = '" . $mask . "'";
    $this->c->add(NpcatprePeer :: CODCAT, $this->sql, Criteria :: CUSTOM);
    $this->columnas = array (
      NpcatprePeer :: CODCAT => 'Codigo',
      NpcatprePeer :: NOMCAT => 'Descripcion'
    );
  }

  public function Bnubibie_Almreq() {
    $longitudUbic = Herramientas :: getX_vacio('codins', 'bndefins', 'lonubi', '001');
    $this->c = new Criteria();
    $this->sql = "length(Codubi) = '" . $longitudUbic . "'";
    $this->c->add(BnubibiePeer :: CODUBI, $this->sql, Criteria :: CUSTOM);
    $this->columnas = array (
      BnubibiePeer :: CODUBI => 'Código',
      BnubibiePeer :: DESUBI => 'Descripción',
    );
  }

  /*****************************requisiciones de servicio***********************************/

  public function caregart_almreqser($params = array ()) {
    $longitud = $params[0];
    $this->c = new Criteria();
    $this->c->add(CaregartPeer :: TIPO, 'S');
    $this->sql = "length(Codart) = '" . $longitud . "'";
    $this->c->add(CaregartPeer :: CODART, $this->sql, Criteria :: CUSTOM);
    $this->columnas = array (
      CaregartPeer :: CODART => 'Codigo',
      CaregartPeer :: DESART => 'Descripcion'
    );
  }

  public function npcatpre_almreqser() {
    $mascara = Herramientas::getObtener_FormatoCategoria();
    $mask=strlen($mascara);
    $this->c = new Criteria();
    $this->sql = "length(CodCat) = '" . $mask . "'";
    $this->c->add(NpcatprePeer :: CODCAT, $this->sql, Criteria :: CUSTOM);
    $this->columnas = array (
      NpcatprePeer :: CODCAT => 'Codigo',
      NpcatprePeer :: NOMCAT => 'Descripcion'
    );
  }

  /******************inventario fisico*********************************/

  public function Caregart_Alminvfis($params = array ()) {
    $this->c = new Criteria();
    $longitud = $params[0];
    $this->c = new Criteria();
    $this->sql = "length(Codart) = '" . $longitud . "'";
    $this->c->add(CaregartPeer :: CODART, $this->sql, Criteria :: CUSTOM);

    $this->columnas = array (
      CaregartPeer :: CODART => 'Codigo',
      CaregartPeer :: DESART => 'Descripcion',
      CaregartPeer :: UNIMED => 'Unidad',
      CaregartPeer :: EXITOT => 'Existencia'
    );
  }

  public function Cadefalm_Alminvfis() {
    $this->c = new Criteria();
    //   $this->c->addAscendingOrderByColumn(CadefalmPeer::CODALM);
    $this->columnas = array (
      CadefalmPeer :: CODALM => 'Codigo',
      CadefalmPeer :: NOMALM => 'Descripcion'
    );

  }
  //////////////////////////////////NOMINA/////////////////////////////////////////////
  /*****************************Definicion de Conceptos********************************/

  public function Npdefcpt_nomdefespcon() {
    $this->c = new Criteria();

    //   $this->c->addAscendingOrderByColumn(NppartidasPeer::NOMPAR);

    $this->columnas = array (
      NppartidasPeer :: NOMPAR => 'Descripcion',
      NppartidasPeer :: CODPAR => 'Codigo'
    );

  }

  public function Npcargos_nomdefespcar($params) {

    if ($params[0] == 'Y') {
      $this->c = new Criteria();
      //    $this->c->addAscendingOrderByColumn(NptipcarPeer::DESTIPCAR);

      $this->columnas = array (
        NptipcarPeer :: DESTIPCAR => 'Descripcion',
        NptipcarPeer :: CODTIPCAR => 'Codigo'
      );
    } else {
      $this->c = new Criteria();
      $this->c->add(NpcomocpPeer :: PASCAR, '001');
      $this->c->add(NpcomocpPeer :: CODTIPCAR, $params[0]);
      //     $this->c->addAscendingOrderByColumn(NpcomocpPeer::GRACAR);

      $this->columnas = array (
        NpcomocpPeer :: GRACAR => 'Grado',
        NpcomocpPeer :: SUECAR => 'Sueldo'
      );
    }
  }

  public function Npdefcpt_nomdefespcon2()
  {
     $this->c = new Criteria();
    $this->c->clearSelectColumns();
  $this->c->addSelectColumn(NppartidasPeer::CODPAR);
     $this->c->addSelectColumn(NppartidasPeer::NOMPAR);
  $this->c->addSelectColumn("'' as ID");
  $this->c->addGroupByColumn(NppartidasPeer::CODPAR);
  $this->c->addGroupByColumn(NppartidasPeer::NOMPAR);

     $this->columnas = array (
        NppartidasPeer::CODPAR => 'Codigo',
        NppartidasPeer::NOMPAR => 'Descripcion');
  }

  public function Npdefcpt_nomconceptossalariointegral_concepto($params) {

      $this->c = new Criteria();
      $this->c->addJoin(NpdefcptPeer :: CODCON, NpasiconnomPeer :: CODCON);
      $this->c->add(NpasiconnomPeer :: CODNOM, $params[0]);
      //   $this->c->addAscendingOrderByColumn(NpdefcptPeer::CODCON);

      $this->columnas = array (
        NpdefcptPeer :: CODCON => 'Codigo',
        NpdefcptPeer :: NOMCON => 'Descripcion'
      );

  }

  public function Npprofesion_nonhojint()
  {
  $this->c = new Criteria();
  $this->columnas = array (NpprofesionPeer::CODPROFES => 'CÃ³digo', NpprofesionPeer::DESPROFES => 'DescripciÃ³n');
  }


  /////////////////////////////////TESORERIA///////////////////////////////////////////
  /***********************************Enterar Retensiones********************************/
  public function Tsentislr_tesretislr() {
    $this->c = new Criteria();
    //   $this->c->addAscendingOrderByColumn(TsmovlibPeer::REFLIB);
    $this->columnas = array (
      TsmovlibPeer :: REFLIB => 'Referencia',
      TsmovlibPeer :: FECLIB => 'Fecha'
    );

  }

  /***********************************Cuentas contables para rendencion de gastos********************************/
  public function Tsdefrengas_tesdefrengas($params) {
    if ($params[0] == '1') {
      $this->c = new Criteria();
      $this->c->add(CpdoccauPeer :: REFIER, 'N');
      $this->c->add(CpdoccauPeer :: AFEPRC, 'N');
      $this->c->add(CpdoccauPeer :: AFECOM, 'N');
      $this->c->add(CpdoccauPeer :: AFEDIS, 'N');
      $this->columnas = array (
        CpdoccauPeer :: TIPCAU => 'Tipo',
        CpdoccauPeer :: NOMEXT => 'Nombre'
      );
    }
    if ($params[0] == '2') {
      $this->c = new Criteria();
      $this->c->add(ContabbPeer :: CARGAB, 'N', Criteria :: NOT_EQUAL);
      $this->columnas = array (
        ContabbPeer :: DESCTA => 'Descripcion',
        ContabbPeer :: CODCTA => 'Codigo',
        ContabbPeer :: CARGAB => 'Cargable'
      );
    }
    if ($params[0] == '3') {
      $this->c = new Criteria();
      $this->c->add(TstipmovPeer :: DEBCRE, 'D');
      $this->columnas = array (
        TstipmovPeer :: DESTIP => 'Descripcion',
        TstipmovPeer :: CODTIP => 'Codigo'
      );
    }
  }
  /***********************************Transferencias bancarias********************************/
  public function Tsmovtra_tesmovtraban($params) {
    if ($params[0] == '1') {
      $this->c = new Criteria();
      //     $this->c->addAscendingOrderByColumn(TsdefbanPeer::NOMCUE);
      $this->columnas = array (
        TsdefbanPeer :: NOMCUE => 'Nombre Cuenta',
        TsdefbanPeer :: NUMCUE => 'Nro. Cuenta',
        TsdefbanPeer::CODCTA => 'Cuenta Contable'
      );
    }
    if ($params[0] == '2') {
      $this->c = new Criteria();
      //    $this->c->addAscendingOrderByColumn(TstipmovPeer::DESTIP);
      $this->columnas = array (
        TstipmovPeer :: DESTIP => 'Nombre Cuenta',
        TstipmovPeer :: CODTIP => 'Nro. Cuenta'
      );
    }
  }

  /***********************************Movimiento Segun Libro********************************/
  public function Tsmovlib_tesmovdeglib($params) {
    if ($params[0] == '1') {
      $this->c = new Criteria();
      //    $this->c->addAscendingOrderByColumn(TsdefbanPeer::NOMCUE);
      $this->columnas = array (
        TsdefbanPeer :: NOMCUE => 'Nombre Cuenta',
        TsdefbanPeer :: NUMCUE => 'Nro. Cuenta',
        TsdefbanPeer :: CODCTA => 'Cuenta Contable'
      );
    }
    if ($params[0] == '2') {
      $this->c = new Criteria();
      //    $this->c->addAscendingOrderByColumn(TstipmovPeer::CODTIP);
      $this->columnas = array (
        TstipmovPeer :: CODTIP => 'Codigo',
        TstipmovPeer :: DESTIP => 'Descripcion'
      );
    }

  }

  /***********************************Conciliacion Bancaria********************************/
  public function Tsconcil_tesmovconban($params) {
    if ($params[0] == '1') {
      $this->c = new Criteria();
      //   $this->c->addAscendingOrderByColumn(TsdefbanPeer::NOMCUE);
      $this->columnas = array (
        TsdefbanPeer :: NOMCUE => 'Nombre Cuenta',
        TsdefbanPeer :: NUMCUE => 'Nro. Cuenta'
      );
    }
  }

 /***********************************Comprobante Contable********************************/
  public function Confincomgen_Contabb($params='')
  {
      $this->c = new Criteria();
      $this->c->add(ContabbPeer::CARGAB,'C');
      $this->c->addAscendingOrderByColumn(ContabbPeer::CODCTA);
      $this->columnas = array (ContabbPeer::CODCTA => 'Cuenta', ContabbPeer::DESCTA => 'Descripcion');
  }

  ////////////////////////////////////////////////////////////////////////////////////////////

  /******************** Formulacion : Forpoa : Proyecto o Acción Centralizada *****************/
  public function Fordefpry_Forpoa() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(FordefpryPeer::CODPRO);
    $this->columnas = array (
      FordefpryPeer :: CODPRO => 'Codigo del Proyecto',
      FordefpryPeer :: NOMPRO => 'Nombre del Proyecto'
    );
  }
  /*****************************************************************************************/

  /*************************** Formulacion : Forpoa : Acción Especificas *******************/
  public function Fordefaccesp_Forpoa($params) {
    $this->c = new Criteria();
    $this->c->add(FordefaccespPeer :: CODPRO, $params[0]);
    $this->c->addAscendingOrderByColumn(FordefaccespPeer::CODACCESP);
    $this->columnas = array (
      FordefaccespPeer :: CODACCESP => 'Codigo',
      FordefaccespPeer :: DESACCESP => 'Accion Especifica'
    );
  }
  /****************************************************************************************/

  /*************************** Formulacion : Forpoa : Acción Especificas *******************/
  public function Fordefpryaccmet_Forpoa($params = array()) {
    $this->c = new Criteria();
    $this->c->add(FordefpryaccmetPeer :: CODPRO, $params[0]);
    $this->c->add(FordefpryaccmetPeer :: CODPRO, $params[0]);
    $this->c->add(FordefpryaccmetPeer :: CODACCESP, $params[1]);
    //   $this->c->addAscendingOrderByColumn(FordefpryaccmetPeer::CODACCESP);
    $this->columnas = array (
      FordefpryaccmetPeer :: CODMET => 'Codigo',
      FordefpryaccmetPeer :: DESMET => 'Meta'
    );
  }
  /****************************************************************************************/

  /*************************** Formulacion : Forpoa : Unidad Ejecutora *******************/
  public function Fordefcatpre_Forpoa($param) {
    $mask = strlen(str_replace('@', '#', $param[0]));
    $this->c = new Criteria();
    $this->sql = "length(Codcat) = '" . $mask . "' and codcat like '" . $param[1] . "%'";
    $this->c->add(FordefcatprePeer :: CODCAT, $this->sql, Criteria :: CUSTOM);
    $this->c->addAscendingOrderByColumn(FordefcatprePeer::CODCAT);

    $this->columnas = array (
      FordefcatprePeer :: CODCAT => 'Codigo',
      FordefcatprePeer :: NOMCAT => 'Categoria'
    );
  }
  /*************************** Formulacion : Forpoa : Partida *******************/
  public function Fordefparegr_Forpoa($param) {
    /*   sql = "Select NomParEgr Partida, CodParEgr From " .
          "ForDefParEgr " .
          "where to_char(length(rtrim(CodParEgr))) =  '" + CStr(LongitudPartida) + "' " .
          Order By CodParEgr"
    */

    //$LongitudPartida = strlen(str_replace('@','#',$param[0]));
    $LongitudPartida = $param[0];
    $this->c = new Criteria();
    $this->sql = "length(codparegr) = '" . $LongitudPartida . "'";
    $this->c->add(FordefparegrPeer :: CODPAREGR, $this->sql, Criteria :: CUSTOM);
    $this->c->addAscendingOrderByColumn(FordefparegrPeer::CODPAREGR);

    $this->columnas = array (
      FordefparegrPeer :: CODPAREGR => 'Partida',
      FordefparegrPeer :: NOMPAREGR => 'Nombre de la Partida'
    );
  }

  /*************************** Formulacion : Forpoa : Tipo de Gasto *******************/
  public function Fortiptit_Forpoa() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(FortiptitPeer::CODTIP);

    $this->columnas = array (
      FortiptitPeer :: CODTIP => 'Codigo',
      FortiptitPeer :: DESTIP => 'Nombre Extendido'
    );
  }

  /*************************** Formulacion : Forpoa_uae : Codigo categoria *******************/
  public function Fordefcatpre_Forpoa_uae($params) {
    if ($params[0] != '') {
      //$Longitud = $params[0];
      $formatouae = strlen(Herramientas :: ObtenerFormato('Fordefegrgen', 'Foruae'));
      $this->c = new Criteria();
      $this->sql = "length(Codcat) = '" . $formatouae . "' and codcat like '" . $params[0] . "%'";
      $this->c->add(FordefcatprePeer :: CODCAT, $this->sql, Criteria :: CUSTOM);
      $this->c->addAscendingOrderByColumn(FordefcatprePeer::CODCAT);
    } else {
      $this->c = new Criteria();

    }
    $this->columnas = array (
      FordefcatprePeer :: CODCAT => 'Codigo',
      FordefcatprePeer :: NOMCAT => 'Nombre Categoria'
    );
  }
  /****************************************************************************************/

  /****************************************************************************************/

  /******************************** Bienes: biedefpar: Partidas  ********************************/
  public function Nppartidas_Biedefpar() {
    $this->c = new Criteria();
    //    $this->c->addAjoin(NppartidasPeer::CODPAR);
    $this->columnas = array (
      NppartidasPeer :: CODPAR => 'Código',
      NppartidasPeer :: NOMPAR => 'Descripción'
    );
  }
  ////////////////////////////////////////////////////////////////////////////////////////////
  public function Nppartidas_Prenondespre() {
    $this->c = new Criteria();
    //    $this->c->addAjoin(NppartidasPeer::CODPAR);
    $this->columnas = array (
      NppartidasPeer :: CODPAR => 'Código',
      NppartidasPeer :: NOMPAR => 'Descripción'
    );
  }
  ////////////////////////////////////////////////////////////////////////////////////////////
  public function Presnomasitrabcont_Npasiempcont($param) {

    $this->c = new Criteria();
    $this->c->add(NpasicarempPeer :: CODNOM, $param[0]);
    $this->c->add(NpasicarempPeer :: STATUS, 'V');
    $this->c->addJoin(NphojintPeer :: CODEMP, NpasicarempPeer :: CODEMP);
    //$this->c->addAjoin(NphojintPeer::CODEMP,Npasicaremp::CODEMP);
    //$this->c->addJoin(NpasicarempPeer::CODNOM,NpasinomcontPeer::CODNOM);
    $this->columnas = array (
      NphojintPeer :: CODEMP => 'Codigo',
      NphojintPeer :: NOMEMP => 'Nombre',
      NphojintPeer :: FECING => 'Fecha Ingreso'
    );
  }
  ////////////////////////////////////////////////////////////////////////////////////////////
  public function Presnomasitrabcont_Npnomina($params) {
    $this->c = new Criteria();
    $this->c->add(NpasinomcontPeer :: CODTIPCON, $params[0]);
    $this->c->addJoin(NpnominaPeer :: CODNOM, NpasinomcontPeer :: CODNOM);
    //$this->c->addAjoin(NphojintPeer::CODEMP,Npasicaremp::CODEMP);

    $this->columnas = array (
      NpnominaPeer :: CODNOM => 'Codigo',
      NpnominaPeer :: NOMNOM => 'Descipción'
    );
  }
  ////////////////////////////////////////////////////////////////////////////////////////////
  public function Npintfecref_Presnomintfecref() {
    $this->c = new Criteria();
    //    $this->c->addAjoin(NppartidasPeer::CODPAR);
    $this->columnas = array (
      NpintfecrefPeer :: FECINIREF => 'Desde',
      NpintfecrefPeer :: FECFINREF => 'Hasta',
      NpintfecrefPeer :: TASINTPRO => 'Tasa Promedio',
      NpintfecrefPeer :: TASINTACT => 'Tasa Activa',
      NpintfecrefPeer :: TASINTPAS => 'Tasa Pasiva'
    );
  }
  ////////////////////////////////////////////////////////////////////////////////////////////
  public function Npestorg_Nomhojint($mascara) {
    $c = new Criteria;
    $mask = $mascara[0];
    $this->c = new Criteria();
    $this->sql = "length(Codniv) = '" . $mask . "'";
    $this->c->add(NpestorgPeer :: CODNIV, $this->sql, Criteria :: CUSTOM);
    //   $this->c->addAscendingOrderByColumn(NpestorgPeer::CODNIV);

    $this->columnas = array (
      NpestorgPeer :: CODNIV => 'Código',
      NpestorgPeer :: DESNIV => 'Descripción',

    );
  }

  /****************************************************************************************/

  public function Nptipcon_Presnomasitrabcont() {

    $this->c = new Criteria();
    //    $this->c->addAjoin(NppartidasPeer::CODPAR);
    $this->columnas = array (
      NptipconPeer :: CODTIPCON => 'Código',
      NptipconPeer :: DESTIPCON => 'Descripción'
    );
  }

  /******************************** Bienes: bieregactmued: Registro de Activos Muebles  ********************************/

  public function Caordcom_Bieregactmued() {
    $this->c = new Criteria;
    $this->c->addJoin(CaordcomPeer :: CODPRO, CaproveePeer :: CODPRO);
    $this->c->add(CaproveePeer::ESTPRO,'A');
    //  $this->c->addAscendingOrderByColumn(CaordcomPeer::ORDCOM);
    $this->columnas = array (
      CaordcomPeer :: ORDCOM => 'Codigo',
      CaordcomPeer :: CODPRO => 'Código Proveedor',
      CaordcomPeer :: FECORD => 'Fecha',
      CaproveePeer :: NOMPRO => 'Nombre Proveedor'
    );
  }

  public function Bnubibie_Bieregactmued($params = array ()) {
    $longitudUbic = Herramientas :: getX_vacio('codins', 'bndefins', 'lonubi', '001');
    $this->c = new Criteria();
    $this->sql = "length(Codubi) = '" . $longitudUbic . "'";
    $this->c->add(BnubibiePeer :: CODUBI, $this->sql, Criteria :: CUSTOM);
    //   $this->c->addAscendingOrderByColumn(BnubibiePeer::CODUBI);
    $this->columnas = array (
      BnubibiePeer :: CODUBI => 'Código',
      BnubibiePeer :: DESUBI => 'Descripción',

    );
  }

  public function Bndisbie_Bieregactmued() {
    $this->c = new Criteria();
    //   $this->c->addAscendingOrderByColumn(BndisbiePeer::CODDIS);
    $this->columnas = array (
      BndisbiePeer :: CODDIS => 'Código',
      BndisbiePeer :: DESDIS => 'Descripción',

    );
  }

  public function Caprovee_Bieregactmued() {
    $this->c = new Criteria();
    $this->c->add(CaproveePeer::ESTPRO,'A');
    //   $this->c->addAscendingOrderByColumn(CaproveePeer::CODPRO);
    $this->columnas = array (
      CaproveePeer :: CODPRO => 'Código',
      CaproveePeer :: NOMPRO => 'Descripción',

    );
  }

  /******************************** Bienes: biedefpar: Partidas  ********************************/
  public function Bnregmue_Bieregsegmue() {
    $this->c = new Criteria();
    $this->c->add(BnregmuePeer::STAMUE,'A');
    //   $this->c->addAscendingOrderByColumn(BnregmuePeer::CODACT);
    $this->columnas = array (
      BnregmuePeer :: CODMUE => 'Código Activo',
      BnregmuePeer :: CODACT => 'Código Nivel',
      BnregmuePeer :: DESMUE => 'Descripción'
    );
  }
  ////////////////////////////////////////////////////////////////////////////////////////////

  /******************************** Bienes: bieregsegmue: Seguro  ********************************/
  public function Bncobseg_Bieregsegmue() {
    $this->c = new Criteria();
    //   $this->c->addAscendingOrderByColumn(BncobsegPeer::CODCOB);
    $this->columnas = array (
      BncobsegPeer :: CODCOB => 'Código',
      BncobsegPeer :: DESCOB => 'Descripción'
    );
  }
  ////////////////////////////////////////////////////////////////////////////////////////////

  public function Npnomina_nomdefespvar() {
    $this->c = new Criteria();
    $this->columnas = array (
      NpnominaPeer :: CODNOM => 'Código',
      NpnominaPeer :: NOMNOM => 'Descripción',
      NpnominaPeer :: FRECAL => 'Frecuencia'
    );
  }





  public function Npnomina_Vacdefgen() {
    $this->c = new Criteria();
    $this->columnas = array (
      NpnominaPeer :: CODNOM => 'Código',
      NpnominaPeer :: NOMNOM => 'Descripción'
    );
  }

  public function Bndefact_Biedefconlotm() {
            $longitudact = Herramientas :: getX_vacio('codins', 'bndefins', 'lonact', '001');
		$this->c = new Criteria();
		$this->sql = "length(Codact) = '" . $longitudact . "'";
		$this->c->add(BndefactPeer :: CODACT, $this->sql, Criteria :: CUSTOM);

    $this->c->addAscendingOrderByColumn(BndefactPeer :: CODACT);
    $this->columnas = array (
      BndefactPeer :: CODACT => 'Código Nivel',
      BndefactPeer :: DESACT => 'Descripción'
    );
  }

	public function Bndefact_Biedefconlotm1() {
		$this->c = new Criteria();
		$this->c->addAscendingOrderByColumn(BndefactPeer :: CODACT);
		$this->columnas = array (
			BndefactPeer :: CODACT => 'Código Nivel',
			BndefactPeer :: DESACT => 'Descripción'
		);
	}

  public function Contabb_Biedefconlotm() {
    $this->c = new Criteria();
    $this->c->add(ContabbPeer :: CARGAB, 'C');
    $this->columnas = array (
      ContabbPeer :: CODCTA => 'Código Cuenta',
      ContabbPeer :: DESCTA => 'Descripción'
    );
  }

  ////////////////////////////////////////////////////////////////////////////////////////////

  public function Npdefcpt_Vacdefgen($params) {

    $this->c = new Criteria();
    $this->c->addJoin(NpdefcptPeer :: CODCON, NpasiconnomPeer :: CODCON);
    $this->c->add(NpasiconnomPeer :: CODNOM, $params[0]);
    $this->columnas = array (
      NpdefcptPeer :: CODCON => 'Código',
      NpdefcptPeer :: NOMCON => 'Descripción'
    );

  }

  public function Npdefcpt_nomdefespguarde() {
    $this->c = new Criteria();
    //   $this->c->addAscendingOrderByColumn(NpdefcptPeer::CODCON);
    $this->columnas = array (
      NpdefcptPeer :: CODCON => 'Código',
      NpdefcptPeer :: NOMCON => 'Descripción',
      NpdefcptPeer :: OPECON => 'Tipo'
    );
  }

  public function Npdefcpt_asignarcategoriaxemp() {
    $this->c = new Criteria();
    //   $this->c->addAscendingOrderByColumn(NpdefcptPeer::CODCON);
    $this->columnas = array (
      NpdefcptPeer :: CODCON => 'Código',
      NpdefcptPeer :: NOMCON => 'Descripción'
    );
  }

  /******************************** Bienes: bieregseginm : Inmuebles  ********************************/
  public function Bnreginm_Bieregseginm() {
    $this->c = new Criteria();
    //   $this->c->addAscendingOrderByColumn(BnreginmPeer::CODACT);
    //   $this->c->addAscendingOrderByColumn(BnreginmPeer::CODINM);
    $this->columnas = array (
      BnreginmPeer :: CODACT => 'Código Nivel',
      BnreginmPeer :: CODINM => 'Código Activo',
      BnreginmPeer :: DESINM => 'Descripción'
    );
  }
  ////////////////////////////////////////////////////////////////////////////////////////////

  /******************************** Bienes: bieregseginm: Seguro  ********************************/
  public function Bncobseg_Bieregseginm() {
    $this->c = new Criteria();
    //   $this->c->addAscendingOrderByColumn(BncobsegPeer::CODCOB);
    $this->columnas = array (
      BncobsegPeer :: CODCOB => 'Código',
      BncobsegPeer :: DESCOB => 'Descripción'
    );
  }

  ////////////////////////////////////////////////////////////////////////////////////////////

  /******************************** Bienes: bieregseginm: Seguro  ********************************/
  public function Bnregsem_Bieregseginm() {
    $this->c = new Criteria();
    //   $this->c->addAscendingOrderByColumn(BnregsemPeer::CODACT);
    $this->columnas = array (
      BnregsemPeer :: CODACT => 'Código',
      BnregsemPeer :: CODSEM => 'Mueble',
      BnregsemPeer :: DESSEM => 'Descripción'
    );
  }

  ////////////////////////////////////////////////////////////////////////////////////////////

  public function Npdefcpt_nomconceptossalariointegral($params) {

      $this->c = new Criteria();
      //    $this->c->addAscendingOrderByColumn(NpnominaPeer::CODNOM);

      $this->columnas = array (
        NpnominaPeer :: CODNOM => 'Codigo',
        NpnominaPeer :: NOMNOM => 'Descripcion'
      );

  }
  public function Npdefcpt_nomconceptossalariointegral2($params) {

      $this->c = new Criteria();
      $this->c->addJoin(NpdefcptPeer :: CODCON, NpasiconnomPeer :: CODCON);
      $this->c->add(NpasiconnomPeer :: CODNOM, $params[0]);
      //   $this->c->addAscendingOrderByColumn(NpdefcptPeer::CODCON);

      $this->columnas = array (
        NpdefcptPeer :: CODCON => 'Codigo',
        NpdefcptPeer :: NOMCON => 'Descripcion'
      );

  }

  /******************************** Bienes: Biedefconm: Contable de Muebles  ********************************/
  public function Npdefcpt_nomdefconaho($params) {
    if ($params[0] == '1') {
      $this->c = new Criteria();
      //    $this->c->addAscendingOrderByColumn(NpnominaPeer::CODNOM);

      $this->columnas = array (
        NpnominaPeer :: CODNOM => 'Codigo',
        NpnominaPeer :: NOMNOM => 'Descripcion'
      );
    }

    if ($params[1] == '2') {
      $this->c = new Criteria();
      $this->c->addJoin(NpdefcptPeer :: CODCON, NpasiconnomPeer :: CODCON);
      $this->c->add(NpdefcptPeer :: OPECON, 'D');
      $this->c->add(NpasiconnomPeer :: CODNOM, $params[0]);
      //     $this->c->addAscendingOrderByColumn(NpdefcptPeer::CODCON);

      $this->columnas = array (
        NpdefcptPeer :: CODCON => 'Codigo',
        NpdefcptPeer :: NOMCON => 'Descripcion'
      );
    } else
      if ($params[1] == '3' || $params[1] == '5') {
        $this->c = new Criteria();
        $this->c->addJoin(NpdefcptPeer :: CODCON, NpasiconnomPeer :: CODCON);
        $this->c->add(NpdefcptPeer :: OPECON, 'P');
        $this->c->add(NpasiconnomPeer :: CODNOM, $params[0]);
        //    $this->c->addAscendingOrderByColumn(NpdefcptPeer::CODCON);

        $this->columnas = array (
          NpdefcptPeer :: CODCON => 'Codigo',
          NpdefcptPeer :: NOMCON => 'Descripcion'
        );
      } else
        if ($params[1] == '4') {
          $this->c = new Criteria();
          $this->c->addJoin(NpdefcptPeer :: CODCON, NpasiconnomPeer :: CODCON);
          $this->c->add(NpdefcptPeer :: OPECON, 'P', Criteria :: NOT_EQUAL);
          $this->c->add(NpasiconnomPeer :: CODNOM, $params[0]);
          //    $this->c->addAscendingOrderByColumn(NpdefcptPeer::CODCON);

          $this->columnas = array (
            NpdefcptPeer :: CODCON => 'Codigo',
            NpdefcptPeer :: NOMCON => 'Descripcion'
          );
        }
  }

  /******************************** Bienes: biedefpar: Partidas  ********************************/
  public function Bnregmue_Biedefconm() {
    $this->c = new Criteria();
    //    $this->c->addAscendingOrderByColumn(BnregmuePeer::CODACT);
    $this->columnas = array (
      BnregmuePeer :: CODACT => 'Código',
      BnregmuePeer :: CODMUE => 'Mueble',
      BnregmuePeer :: DESMUE => 'Descripción'
    );
  }
  ////////////////////////////////////////////////////////////////////////////////////////////

  /******************************** Bienes: Biedefconm: Contable de Muebles  ********************************/
  public function Contabb_Biedefconm() {
    $this->c = new Criteria();
    $this->c->add(ContabbPeer :: CARGAB, 'C');
    //    $this->c->addAscendingOrderByColumn(ContabbPeer::CODCTA);
    $this->columnas = array (
      ContabbPeer :: CODCTA => 'Código',
      ContabbPeer :: DESCTA => 'Descripción'
    );
  }
  ////////////////////////////////////////////////////////////////////////////////////////////

  /******************************** Bienes: biedefconlotm: Contable de Muebles por Lotes  ********************************/
  public function Bndefcon_Biedefconlotm($param) {
    $this->c = new Criteria();

    /*SQL = "select a.DesAct Activo, a.CodAct Codigo_Nivel From " _
        + "BNDEFACT a, BNDEFINS b where length(RTrim(a.CodAct))=b.LonAct " _
        + " Order By CodAct"*/

    $longitudUbic = Herramientas :: getX_vacio('codins', 'bndefins', 'lonubi', '001');
    $this->c->addJoin(BndefactPeer :: CODCON, NpasiconnomPeer :: CODCON);
    $this->sql = "length(CodAct) = '" . $longitudUbic . "'";
    $this->c->add(BndefinsPeer :: LONACT, $this->sql, Criteria :: CUSTOM);

    //   $this->c->addAscendingOrderByColumn(BndefactPeer::CODACT);
    $this->columnas = array (
      BnregmuePeer :: CODACT => 'Activo',
      BnregmuePeer :: CODMUE => 'Codigo Nivel'
    );
  }
  ////////////////////////////////////////////////////////////////////////////////////////////

  /******************************** Bienes: Biedefconm: Contable de Muebles  ********************************/
  public function Bndefconi_Biedefconi($param) {
    if ($param[0] == '1') {
      $this->c = new Criteria();
      //      $this->c->addAscendingOrderByColumn(BnreginmPeer::CODACT);
      //      $this->c->addAscendingOrderByColumn(BnreginmPeer::CODINM);
      $this->columnas = array (
        BnreginmPeer :: CODACT => 'Código',
        BnreginmPeer :: CODINM => 'Inmueble',
        BnreginmPeer :: DESINM => 'Descripción'
      );

    } else
      if ($param[0] == '2') {
        $this->c = new Criteria();
        $this->c->add(ContabbPeer :: CARGAB, 'C');
        //     $this->c->addAscendingOrderByColumn(ContabbPeer::CODCTA);
        $this->columnas = array (
          ContabbPeer :: CODCTA => 'Código',
          ContabbPeer :: DESCTA => 'Descripción'
        );

      }
  }
  ////////////////////////////////////////////////////////////////////////////////////////////

  /******************************** Bienes: Biedefcons: Contable de Muebles  ********************************/
  public function bndefcons_Biedefcons($param) {
    if ($param[0] == '1') {
      $this->c = new Criteria();
      //    $this->c->addAscendingOrderByColumn(BnregsemPeer::CODACT);
      //    $this->c->addAscendingOrderByColumn(BnregsemPeer::CODSEM);
      $this->columnas = array (
        BnregsemPeer :: CODACT => 'Código',
        BnregsemPeer :: CODSEM => 'Semovientes',
        BnregsemPeer :: DESSEM => 'Descripción'
      );

    } else
      if ($param[0] == '2') {
        $this->c = new Criteria();
        $this->c->add(ContabbPeer :: CARGAB, 'C');
        //      $this->c->addAscendingOrderByColumn(ContabbPeer::CODCTA);
        $this->columnas = array (
          ContabbPeer :: CODCTA => 'Código',
          ContabbPeer :: DESCTA => 'Descripción'
        );

      }
  }
  ////////////////////////////////////////////////////////////////////////////////////////////

  ///////////////////////////////Registro de Articulos////////////////////////////////////////

  public function Contabb_Almregart() {
    $a = new Criteria();
    $reg = ContabaPeer :: doSelectOne($a);
    if ($reg) {
      $cuentaarticulodesde = $reg->getCodctaart();
      $cuentaarticulohasta = $reg->getCodctaarthas();
    } else {
      $cuentaarticulodesde = "";
      $cuentaarticulohasta = "";
    }

    if ($cuentaarticulodesde != "" && $cuentaarticulohasta != "") {
      $this->c = new Criteria();
      $this->c->add(ContabbPeer :: CARGAB, 'C');
      $this->c->add(ContabbPeer :: CODCTA, $cuentaarticulodesde, Criteria :: GREATER_EQUAL);
      $this->c->add(ContabbPeer :: CODCTA, $cuentaarticulohasta, Criteria :: LESS_EQUAL);
      //    $this->c->addAscendingOrderByColumn(ContabbPeer::CODCTA);
    } else {
      $this->c = new Criteria();
      $this->c->add(ContabbPeer :: CARGAB, 'C');
      $this->c->add(ContabbPeer :: CODCTA, $cuentaarticulodesde . '%', Criteria :: LIKE);
      //    $this->c->addAscendingOrderByColumn(ContabbPeer::CODCTA);
    }

    $this->columnas = array (
      ContabbPeer :: CODCTA => 'Código',
      ContabbPeer :: DESCTA => 'Descripción'
    );
  }

  //////////////////////////////////////////////////////////////////////////////////////////////
  /******************************** Bienes: bieregactinmd: Registro de Activos Inmuebles  ********************************/

  public function Bnubibie_Bieregactinmd() {
    $longitudUbic = Herramientas :: getX_vacio('codins', 'bndefins', 'lonubi', '001');
    $this->c = new Criteria();
    $this->sql = "length(Codubi) = '" . $longitudUbic . "'";
    $this->c->add(BnubibiePeer :: CODUBI, $this->sql, Criteria :: CUSTOM);
    //   $this->c->addAscendingOrderByColumn(BnubibiePeer::CODUBI);
    $this->columnas = array (
      BnubibiePeer :: CODUBI => 'Código',
      BnubibiePeer :: DESUBI => 'Descripción',

    );
  }

  public function Bndisbie_Bieregactinmd() {
    $this->c = new Criteria();
    //   $this->c->addAscendingOrderByColumn(BndisbiePeer::CODDIS);
    $this->columnas = array (
      BndisbiePeer :: CODDIS => 'Código',
      BndisbiePeer :: DESDIS => 'Descripción',

    );
  }

  public function Caprovee_Bieregactinmd() {
    $this->c = new Criteria();
    $this->c->add(CaproveePeer::ESTPRO,'A');
    //  $this->c->addAscendingOrderByColumn(CaproveePeer::CODPRO);
    $this->columnas = array (
      CaproveePeer :: CODPRO => 'Código',
      CaproveePeer :: NOMPRO => 'Descripción',

    );
  }

  /******************************** Nomina: nomdefespasicartipnomlot: Asignación de Cargos a Nomina  ********************************/

  public function Npnomina_Nomdefespasicartipnomlot() {
    $this->c = new Criteria();
    //   $this->c->addAscendingOrderByColumn(NpnominaPeer::CODNOM);
    $this->columnas = array (
      NpnominaPeer :: CODNOM => 'Código',
      NpnominaPeer :: NOMNOM => 'Descripción',

    );
  }

  public function Fortipfin_Fortiting() {
    $this->c = new Criteria();
    //   $this->c->addAscendingOrderByColumn(FortipfinPeer::CODFIN);
    $this->columnas = array (
      FortipfinPeer :: CODFIN => 'Código',
      FortipfinPeer :: NOMEXT => 'Nombre',

    );
  }

  /******************************** Nomina: nomdefespasicartipnomlot: Asignación de Cargos a Nomina  ********************************/

  public function Nptipcar_Nnpcomocp() {
    $this->c = new Criteria();
    //   $this->c->addAscendingOrderByColumn(NptipcarPeer::CODTIPCAR);
    $this->columnas = array (
      NptipcarPeer :: CODTIPCAR => 'Código',
      NptipcarPeer :: DESTIPCAR => 'Descripción',

    );
  }

  ////////////////////////////////////////////////FORDEFPROYECTO////////////////////////////////////////

  public function Fordefpry_fordefproyecto($params) {

    if ($params[0] == '1') {
      $this->c = new Criteria();
      //      $this->c->addAscendingOrderByColumn(FordefstaPeer::CODSTA);

      $this->columnas = array (
        FordefstaPeer :: DESSTA => 'Descripción',
        FordefstaPeer :: CODSTA => 'Código'
      );
    }
    if ($params[0] == '2') {
      $this->c = new Criteria();
      //    $this->c->addAscendingOrderByColumn(FordefsitprePeer::CODSITPRE);

      $this->columnas = array (
        FordefsitprePeer :: DESSITPRE => 'Descripción',
        FordefsitprePeer :: CODSITPRE => 'Código'
      );
    }
    if ($params[0] == '3') {
      $this->c = new Criteria();
      //     $this->c->addAscendingOrderByColumn(FordefprgPeer::CODPRG);

      $this->columnas = array (
        FordefprgPeer :: DESPRG => 'Descripción',
        FordefprgPeer :: CODPRG => 'Código'
      );
    }
    if ($params[0] == '4') {
      $this->c = new Criteria();

      $this->columnas = array (
        FordefobjestnvaetaPeer :: DESOBJNVAETA => 'Descripción',
        FordefobjestnvaetaPeer :: CODOBJNVAETA => 'Código'
      );
    }
    if ($params[0] == '5') {
      $this->c = new Criteria();

      $this->columnas = array (
        FordefunimedPeer :: DESUNIMED => 'Descripción',
        FordefunimedPeer :: CODUNIMED => 'Código'
      );
    }
    if ($params[0] == '6') {
      $this->c = new Criteria();

      $this->columnas = array (
        NphojintPeer :: NOMEMP => 'Nombre del Empleado',
        NphojintPeer :: CODEMP => 'Código'
      );
    }

  }

  public function Fordefpry_Fordefpryaccmet() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(FordefpryPeer :: CODPRO);
    $this->columnas = array (
      FordefpryPeer :: CODPRO => 'Código',
      FordefpryPeer :: NOMPRO => 'Proyecto'
    );

  }

  public function Fordefaccesp_Fordefpryaccmet($params) {
    $this->c = new Criteria();
    $this->c->add(FordefaccespPeer :: CODPRO, $params[0]);
    $this->c->addAscendingOrderByColumn(FordefaccespPeer :: CODPRO);
    $this->columnas = array (
      FordefaccespPeer :: CODACCESP => 'Código',
      FordefaccespPeer :: DESACCESP => 'Acción Específica'
    );
  }

  public function Nphojint_Nomasicarconnom() {
    $this->c = new Criteria();

    $this->columnas = array (
      NphojintPeer :: CODEMP => 'Código',
      NphojintPeer :: NOMEMP => 'Nombre'
    );
  }
  /*<----------------------------------Edición Permisos----------------------------------------------------->*/

  public function Nphojint_Nomfalperper() {
    $this->c = new Criteria();

    $this->columnas = array (
      NphojintPeer :: CODEMP => 'Código',
      NphojintPeer :: NOMEMP => 'Nombre'
    );
  }
  /*<----------------------------------Edición Permisos de Salida----------------------------------------------------->*/

  public function Npfalper_Nomfalpersal() {
    $this->c = new Criteria();

    $this->columnas = array (
      NphojintPeer :: CODEMP => 'Código',
      NphojintPeer :: NOMEMP => 'Nombre'
    );
  }

  public function Npmotfal_Nomfalpersal() {
    $this->c = new Criteria();

    $this->columnas = array (
      NpmotfalPeer :: CODMOTFAL => 'Código',
      NpmotfalPeer :: DESMOTFAL => 'Nombre'
    );
  }

  /*<----------------------------------Edición DIAS eXTRAS----------------------------------------------------->*/

  public function Npnomina_Nomdiaext() {
    $this->c = new Criteria();

    $this->columnas = array (
      NpnominaPeer :: CODNOM => 'Código',
      NpnominaPeer :: NOMNOM => 'Nombre'
    );
  }

  /*<----------------------------------Edición DIAS eXTRAS----------------------------------------------------->*/

  public function Npnomina_cestaticketemp() {
    $this->c = new Criteria();

    $this->columnas = array (
      NpnominaPeer :: CODNOM => 'Código',
      NpnominaPeer :: NOMNOM => 'Nombre'
    );
  }

  public function Nphojint_Fordefaccesp() {
    $this->c = new Criteria();

    $this->columnas = array (
      NphojintPeer :: CODEMP => 'Código',
      NphojintPeer :: NOMEMP => 'Nombre'
    );
  }

  /*<----------------------------------Edición DIAS eXTRAS----------------------------------------------------->*/

  public function Contabb_tesdefcueban() {
    $a = new Criteria();
    $reg = ContabaPeer :: doSelectOne($a);
    if ($reg) {
      $cuentabanco = $reg->getCodctaban();
      $cuentabancohasta = $reg->getCodctabanhas();
    } else {
      $cuentabanco = "";
      $cuentabancohasta = "";
    }

    if ($cuentabanco != "" && $cuentabancohasta != "") {
      $this->c = new Criteria();
      $this->c->add(ContabbPeer :: CARGAB, 'C');
      $this->c->add(ContabbPeer :: CODCTA, $cuentabanco, Criteria :: GREATER_EQUAL);
      $this->c->add(ContabbPeer :: CODCTA, $cuentabancohasta, Criteria :: LESS_EQUAL);
      //    $this->c->addAscendingOrderByColumn(ContabbPeer::CODCTA);
    } else {
      $this->c = new Criteria();
      $this->c->add(ContabbPeer :: CARGAB, 'C');
      $this->c->add(ContabbPeer :: CODCTA, $cuentabancohasta . '%', Criteria :: LIKE);
      //    $this->c->addAscendingOrderByColumn(ContabbPeer::CODCTA);
    }

    $this->columnas = array (
      ContabbPeer :: DESCTA => 'Descripción',
      ContabbPeer :: CODCTA => 'Código',
      ContabbPeer :: CARGAB => 'Cargable'
    );
  }

  public function Tstipcue_tesdefcueban() {
    $this->c = new Criteria();

    $this->columnas = array (
      TstipcuePeer :: CODTIP => 'Código',
      TstipcuePeer :: DESTIP => 'Nombre'
    );
  }

  public function Caregart_Almsolegr($params = array ()) {
    $tipo="";
    $longitud = $params[0];
    if ($params[1]!="") $tipo=$params[1];
      if ($tipo=="C") $tipo="A";
    $this->c = new Criteria();
    if ($tipo!="" and $tipo!='M') $this->c->add(CaregartPeer::TIPO, $tipo);
    $this->sql = "length(Codart) = '" . $longitud . "'";
    $this->c->add(CaregartPeer :: CODART, $this->sql, Criteria :: CUSTOM);


    $this->columnas = array (
      CaregartPeer :: CODART => 'Código',
      CaregartPeer :: DESART => 'Descripción',
      CaregartPeer :: UNIMED => 'Unidad de Medida',
      CaregartPeer :: COSULT => 'Costo',
      CaregartPeer :: EXITOT => 'Existencia',
      CaregartPeer :: CODPAR => 'Codigo Partida'
    );

  }

  ////////////////////////////////////////////////NOMCALCON////////////////////////////////////////

	public function Npcalcon_nomcalcon() {

			$this->c = new Criteria();
			$this->columnas = array (
				NpdefcptPeer :: NOMCON => 'Nombre Concepto',
				NpdefcptPeer :: CODCON => 'Código Concepto'
			);

	}

  public function Contabb_Almtippro() {
    $this->c = new Criteria();
    $this->c->add(ContabbPeer :: CARGAB, 'C');

    $this->columnas = array (
      ContabbPeer :: CODCTA => 'Descripción',
      ContabbPeer :: DESCTA => 'Código'
    );

  }

  public function Optipben_Pagbenfi() {
    $this->c = new Criteria();
    $this->columnas = array (
      OptipbenPeer :: CODTIPBEN => 'Código',
      OptipbenPeer :: DESTIPBEN => 'Descripción',

    );
  }

  public function Npdefcpt_Pagretcon($params) {
    $this->c = new Criteria();
    $this->c->addJoin(NpdefcptPeer :: CODCON, NpasiconnomPeer :: CODCON);
    $this->c->add(NpdefcptPeer :: OPECON, 'A', Criteria :: NOT_EQUAL);
    $this->c->add(NpdefcptPeer :: ORDPAG, 'S');
    $this->c->add(NpasiconnomPeer :: CODNOM, $params[0]);

    $this->columnas = array (
      NpdefcptPeer :: CODCON => 'Codigo',
      NpdefcptPeer :: NOMCON => 'Descripcion'
    );

  }

  /*********************   Compras/almdespser  ************************/
  public function Nphojint_Almdespser() {
    $this->c = new Criteria();
    $this->columnas = array (
      NphojintPeer :: CODEMP => 'Código',
      NphojintPeer :: NOMEMP => 'Nombre'
    );
  }

  /********************************Orden de Compra************************************************/

  public function Caconpag_Almordcom() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(CaconpagPeer :: CODCONPAG);

    $this->columnas = array (
      CaconpagPeer :: CODCONPAG => 'Código',
      CaconpagPeer :: DESCONPAG => 'Descripción',

    );
  }
  public function Catippro_Almordcom() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(CatipproPeer :: CODPRO);

    $this->columnas = array (
      CatipproPeer :: CODPRO => 'Código',
      CatipproPeer :: DESPRO => 'Descripción',

    );
  }

  public function Caforent_Almordcom() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(CaforentPeer :: CODFORENT);

    $this->columnas = array (
      CaforentPeer :: CODFORENT => 'Código',
      CaforentPeer :: DESFORENT => 'Descripción',

    );
  }

  public function Fortipfin_Almordcom() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(FortipfinPeer :: CODFIN);

    $this->columnas = array (
      FortipfinPeer :: CODFIN => 'Código',
      FortipfinPeer :: NOMEXT => 'Descripción',

    );
  }

  public function Bnubica_Almordcom() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(BnubicaPeer :: CODUBI);

    $this->columnas = array (
      BnubicaPeer :: CODUBI => 'Código',
      BnubicaPeer :: DESUBI => 'Descripción',

    );
  }

  public function Nphojint_Almordcom() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(NphojintPeer :: CODEMP);

    $this->columnas = array (
      NphojintPeer :: CODEMP => 'Código',
      NphojintPeer :: NOMEMP => 'Descripción',

    );
  }

  public function Caregart_Almordcom($params = array ()) {
    $longitud = $params[0];
    $this->c = new Criteria();
    $this->sql = "length(Codart) = '" . $longitud . "'";
    $this->c->add(CaregartPeer :: CODART, $this->sql, Criteria :: CUSTOM);

    $this->columnas = array (
      CaregartPeer :: CODART => 'Código',
      CaregartPeer :: DESART => 'Descripción',
      CaregartPeer :: COSPRO => 'Costo',
      CaregartPeer :: UNIMED => 'Unidad',
      CaregartPeer :: CODPAR => 'Partida',

    );
  }

  public function Npcatpre_Almordcom() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(NpcatprePeer :: CODCAT);

    $this->columnas = array (
      NpcatprePeer :: CODCAT => 'Código',
      NpcatprePeer :: NOMCAT => 'Nombre'
    );
  }

  /******************************** Despachos  ***************************************/

  public function Cadefalm_Almdes() {
    $this->c = new Criteria();
    //   $this->c->addAscendingOrderByColumn(CadefalmPeer::CODALM);
    $this->columnas = array (
      CadefalmPeer :: CODALM => 'Codigo',
      CadefalmPeer :: NOMALM => 'Descripcion'
    );

  }

  public function Careqart_Almdes() {
    $this->c = new Criteria();
    $this->c->addJoin(CareqartPeer :: REQART, CaartreqPeer :: REQART);
    $this->sql = "Caartreq.canrec < Caartreq.canreq and Careqart.aprreq='S' ";
    $this->c->add(CaartreqPeer :: CANREQ, $this->sql, Criteria :: CUSTOM);
    $this->c->setDistinct();

    $this->columnas = array (
      CareqartPeer :: REQART => 'Codigo',
      CareqartPeer :: DESREQ => 'Descripcion'
    );
  }

  public function Bnubibie_Almdes() {
    $longitudUbic = Herramientas :: getX_vacio('codins', 'bndefins', 'lonubi', '001');
    $this->c = new Criteria();
    $this->sql = "length(Codubi) = '" . $longitudUbic . "'";
    $this->c->add(BnubibiePeer :: CODUBI, $this->sql, Criteria :: CUSTOM);
    $this->columnas = array (
      BnubibiePeer :: CODUBI => 'Código',
      BnubibiePeer :: DESUBI => 'Descripción',

    );
  }

  /*************************** Formulacion : Fordefgen : Definiciones Generales *******************/
  public function Fordefparegr_Fordefgen($param= array())
  {
/*   sql = "Select NomParEgr Partida, CodParEgr From " .
       "ForDefParEgr " .
       "where to_char(length(rtrim(CodParEgr))) =  '" + CStr(LongitudPartida) + "' " .
       Order By CodParEgr"
*/
    //$LongitudPartida = strlen(str_replace('@','#',$param[0]));

/*
    if ($param[0]!='No Encontrado'){ $LongitudPartida = strlen($param[0]); }else {$LongitudPartida=0;}
    $this->c= new Criteria();
    $this->sql = "length(codparegr) = '".$LongitudPartida."'";
echo $param[0];
    $this->c->add(FordefparegrPeer::CODPAREGR, $this->sql, Criteria::CUSTOM);
 //   $this->c->addAscendingOrderByColumn(FordefparegrPeer::CODPAREGR);
*/
$this->c= new Criteria();
//    $this->c->add(FordefparegrPeer::CODPAREGR, $this->sql, Criteria::CUSTOM);
    $this->c->addAscendingOrderByColumn(FordefparegrPeer::CODPAREGR);


    $this->columnas = array(FordefparegrPeer::CODPAREGR => 'Partida', FordefparegrPeer::NOMPAREGR => 'Nombre de la Partida');
  }

  public function Cpasiini_Pagemiord() {
    $this->c = new Criteria();
    $this->c->add(CpasiiniPeer :: PERPRE, '00');

    $this->columnas = array (
      CpasiiniPeer :: CODPRE => 'Código Presupuestario',
      CpasiiniPeer :: NOMPRE => 'Descripción',

    );
  }

  /*************************** Bienes: Disposición de Muebles *******************/
  public function Bnmotdis_Biedisactmuenew() {
    $this->c = new Criteria();
    $this->columnas = array (
      BnmotdisPeer :: CODMOT => 'Código',
      BnmotdisPeer :: DESMOT => 'Descripción'
    );
  }

  public function Bnregmue_Biedisactmuenew() {
    $this->c = new Criteria();
    $this->columnas = array (
      BnregmuePeer :: CODACT => 'Código Catalogo',
      BnregmuePeer :: CODMUE => 'Código Activo',
      BnregmuePeer :: DESMUE => 'Descripción',
      BnregmuePeer :: VALINI => 'Valoración Inicial',
      BnregmuePeer :: CODUBI => 'Código Ubicación'
    );
  }

  public function Bnregmue_Biedisactmuenew1() {
    $this->c = new Criteria();
    $this->columnas = array (
      BnregmuePeer :: CODMUE => 'Código Activo',
      BnregmuePeer :: CODACT => 'Código Catalogo',
      BnregmuePeer :: DESMUE => 'Descripción',
      BnregmuePeer :: VALINI => 'Valoración Inicial',
      BnregmuePeer :: CODUBI => 'Código Ubicación'
    );
  }

  public function Bnubibie_Biedisactmuenew() {
    $this->c = new Criteria();
    $this->columnas = array (
      BnubibiePeer :: CODUBI => 'Código',
      BnubibiePeer :: DESUBI => 'Descripción',
      BnubibiePeer :: DIRUBI => 'Dirección'
    );
  }

  public function Bnreginm_Biedisactinm() {
    $this->c = new Criteria();
    $this->columnas = array (
      BnreginmPeer :: CODACT => 'Código Catalogo',
      BnreginmPeer :: CODINM => 'Código Activo',
	  BnreginmPeer :: DESINM => 'Descripción',
	  BnreginmPeer :: VALINI => 'Valor Inicial',
	  BnreginmPeer :: CODUBI => 'Código de Ubicación'
    );
  }

  public function Bnreginm_Biedisactinm1() {
    $this->c = new Criteria();
    $this->columnas = array (
      BnreginmPeer :: CODINM => 'Código Activo',
      BnreginmPeer :: CODACT => 'Código Catalogo',
	  BnreginmPeer :: DESINM => 'Descripción',
	  BnreginmPeer :: VALINI => 'Valor Inicial',
	  BnreginmPeer :: CODUBI => 'Código de Ubicación'
    );
  }

  public function Bnregmue_Bieregsegmue1() {
    $this->c = new Criteria();
    $this->c->add(BnregmuePeer::STAMUE,'A');

    $this->columnas = array (
      BnregmuePeer :: CODACT => 'Código Nivel',
      BnregmuePeer :: CODMUE => 'Código Activo',
      BnregmuePeer :: DESMUE => 'Descripción'
    );
  }

  public function Bnreginm_Bieregseginm1() {
    $this->c = new Criteria();
    $this->columnas = array (
      BnreginmPeer :: CODINM => 'Código Activo',
      BnreginmPeer :: CODACT => 'Código Nivel',
      BnreginmPeer :: DESINM => 'Descripción'
    );
  }

  public function Npnomina_Presnomdefpre() {
    $this->c = new Criteria();
    $this->c->addJoin(NpnominaPeer :: CODNOM, NpasiconnomPeer :: CODNOM);
    $this->c->setDistinct();
    $this->columnas = array (
      NpnominaPeer :: CODNOM => 'Código',
      NpnominaPeer :: NOMNOM => 'Descripción',
      NpnominaPeer :: FRECAL => 'Frecuencia'
    );
  }

  public function Npnomina_Nomtipo() {
    $this->c = new Criteria();
    $this->c->addJoin(NpasiconnomPeer :: CODNOM, NpnominaPeer :: CODNOM);
    $this->c->setDistinct();
    $this->columnas = array (
      NpnominaPeer :: CODNOM => 'Código',
      NpnominaPeer :: NOMNOM => 'Descripción',
      NpnominaPeer :: FRECAL => 'Frecuencia'
    );
  }

  public function Empleadobanco_Npnomina() {
    $this->c = new Criteria();
    $this->columnas = array (
      NpnominaPeer :: CODNOM => 'Codigo De La Nomina',
      NpnominaPeer :: NOMNOM => 'Descripción'
    );
  }

  public function Presnomregsalint_Nptipcon() {
    $this->c = new Criteria();
    $this->columnas = array (
      NptipconPeer :: CODTIPCON => 'Codigo',
      NptipconPeer :: DESTIPCON => 'Descripción'
    );
  }
  public function Presnomreghisantpre_Npantpre() {
    $this->c = new Criteria();
    $this->c->add(NphojintPeer :: STAEMP, 'R', Criteria :: NOT_EQUAL);
    $this->c->addJoin(NpasiempcontPeer :: CODEMP, NphojintPeer :: CODEMP);
    $this->c = new Criteria();
    $this->columnas = array (
      NpasiempcontPeer :: CODEMP => 'Codigo',
      NpasiempcontPeer :: NOMEMP => 'Nombre'
    );
  }

  public function Vacdiasbonovac_Npnomina() {
    $this->c = new Criteria();
    $this->columnas = array (
      NpnominaPeer :: CODNOM => 'Codigo De La Nomina',
      NpnominaPeer :: NOMNOM => 'Descripción'
    );
  }

  public function Npasiconemp_Nomtipo($params) {
    $this->c = new Criteria();
    //$this->c->addJoin(NpdefmovPeer::CODCON,NpdefcptPeer::CODCON);
    $this->c->add(NpasiconnomPeer :: CODNOM, $params[0]);
    $this->c->addJoin(NpdefcptPeer :: CODCON, NpasiconnomPeer :: CODCON);

    $this->columnas = array (
      NpdefcptPeer :: NOMCON => 'Nombre del Concepto',
      NpdefcptPeer :: CODCON => 'Código'
    );
  }

  public function Npdefmov_nomnommovnomcon() {
    $this->c = new Criteria();
    $this->c->addJoin(NpdefmovPeer :: CODNOM, NpnominaPeer :: CODNOM);
    $this->c->setDistinct();

    $this->columnas = array (
      NpnominaPeer :: NOMNOM => 'Nombre Nómina',
      NpnominaPeer :: CODNOM => 'Código'
    );
  }

  public function Npdefcpt_nomnommovnomcon($params) {

    $this->c = new Criteria();
    $this->c->add(NpdefmovPeer :: CODNOM, $params[0]);
    $this->c->addJoin(NpdefmovPeer :: CODCON, NpdefcptPeer :: CODCON);
    $this->c->setDistinct();

    $this->columnas = array (
      NpdefcptPeer :: NOMCON => 'Nombre del Concepto',
      NpdefcptPeer :: CODCON => 'Código'
    );

  }

  public function Npasiconemp_nomnommovnomconcar($params) {
    $this->c = new Criteria();
    $this->c->add(NpasiconempPeer :: CODCON, $params[0]);

    $this->c->addSelectColumn("'' as CODEMP");
    $this->c->addSelectColumn("'' as CODCON");
    $this->c->addSelectColumn(NpasiconempPeer :: CODCAR);
    $this->c->addSelectColumn("'' as NOMEMP");
    $this->c->addSelectColumn("'' as NOMCOM");
    $this->c->addSelectColumn(NpasiconempPeer :: NOMCAR);
    $this->c->addSelectColumn("0 as CANTIDAD");
    $this->c->addSelectColumn("0 as MONTO");
    $this->c->addSelectColumn("'1937-01-01' as FECINI");
    $this->c->addSelectColumn("'1937-01-01' as FECEXP");
    $this->c->addSelectColumn("0 as FRECON");
    $this->c->addSelectColumn("'' as ASIDED");
    $this->c->addSelectColumn("'' as ACUCON");
    $this->c->addSelectColumn("'' as CALCON");
    $this->c->addSelectColumn("'' as ACTIVO");
    $this->c->addSelectColumn("'' as ACUMULADO");
    $this->c->addSelectColumn("max(ID) as ID");
    $this->c->addGroupByColumn(NpasiconempPeer :: CODCAR);
    $this->c->addGroupByColumn(NpasiconempPeer :: NOMCAR);

    $this->columnas = array (
      NpasiconempPeer :: NOMCAR => 'Nombre del Cargo',
      NpasiconempPeer :: CODCAR => 'Código'
    );

  }

  ///////////////  Formulacion: fortiting
  public function Fordefparing_Fortiting($params = array ()) {
    $longitudpartida = $params[0];
    $this->c = new Criteria();
    $this->sql = "length(Codparing) = '" . $longitudpartida . "'";
    $this->c->add(FordefparingPeer :: CODPARING, $this->sql, Criteria :: CUSTOM);

    /*sql = "Select NomParIng Descripcion, CodParIng Codigo From ForDefParIng " .
        "where length(rtrim(CodParIng)) =  " & LongitudPartida & " Order By CodParIng"
    */
    $this->columnas = array (
      FordefparingPeer :: CODPARING => 'Código',
      FordefparingPeer :: NOMPARING => 'Descripción'
    );

  }
  ///////////////
  /*************************** Compras: Recepción de Ordenes de Compra *******************/
  public function Camotfal_Almordrec() {
    $this->c = new Criteria();

    $this->columnas = array (
      CamotfalPeer :: CODFAL => 'Código',
      CamotfalPeer :: DESFAL => 'Descripción'
    );

  }
  public function Npasicaremp_nomnommovnomemp($params) {

    $this->c = new Criteria();
    $this->c->add(NpasicarnomPeer :: CODNOM, $params[0]);
    $this->c->addJoin(NpasicarempPeer :: CODCAR, NpasicarnomPeer :: CODCAR);
    $this->c->add(NpasicarempPeer :: STATUS, 'V');
    $this->c->setDistinct();

    $this->columnas = array (
      NpasicarempPeer :: NOMEMP => 'Nombre del Empleado',
      NpasicarempPeer :: CODEMP => 'Código'
    );

  }
  public function Npasiconemp_nomnommovnomemp($params) {
    $this->c = new Criteria();
    $this->c->add(NpasiconempPeer :: CODEMP, $params[0]);
    $this->c->addSelectColumn("'' as CODEMP");
    $this->c->addSelectColumn("'' as CODCON");
    $this->c->addSelectColumn(NpasiconempPeer :: CODCAR);
    $this->c->addSelectColumn("'' as NOMEMP");
    $this->c->addSelectColumn("'' as NOMCOM");
    $this->c->addSelectColumn(NpasiconempPeer :: NOMCAR);
    $this->c->addSelectColumn("0 as CANTIDAD");
    $this->c->addSelectColumn("0 as MONTO");
    $this->c->addSelectColumn("'1937-01-01' as FECINI");
    $this->c->addSelectColumn("'1937-01-01' as FECEXP");
    $this->c->addSelectColumn("0 as FRECON");
    $this->c->addSelectColumn("'' as ASIDED");
    $this->c->addSelectColumn("'' as ACUCON");
    $this->c->addSelectColumn("'' as CALCON");
    $this->c->addSelectColumn("'' as ACTIVO");
    $this->c->addSelectColumn("'' as ACUMULADO");
    $this->c->addSelectColumn("max(ID) as ID");
    $this->c->addGroupByColumn(NpasiconempPeer :: CODCAR);
    $this->c->addGroupByColumn(NpasiconempPeer :: NOMCAR);

    $this->columnas = array (
      NpasiconempPeer :: NOMCAR => 'Nombre del Cargo',
      NpasiconempPeer :: CODCAR => 'Código'
    );
  }

  public function Npperfil_Nomdefespcar() {
    $this->c = new Criteria();

    $this->columnas = array (
      NpperfilPeer :: CODPERFIL => 'Código',
      NpperfilPeer :: DESPERFIL => 'Descripción'
    );

  }

  /*************************** Obras: Retenciones *******************/
  public function Contabb_Oycdefret() {
    $this->c = new Criteria();

    $this->columnas = array (
      ContabbPeer :: CODCTA => 'Código',
      ContabbPeer :: DESCTA => 'Descripción'
    );

  }

  public function Npnomesptipos_nomespdefinicion($params) {
    $this->c = new Criteria();
    $this->c->setDistinct();

    $this->columnas = array (
      NpnomesptiposPeer :: DESNOMESP => 'Nombre de la Nomina',
      NpnomesptiposPeer :: CODNOMESP => 'Código'
    );

  }

  /*********************   OBRAS  ************************/
  public function octipcar_oycdefper() {
    $this->c = new Criteria();
    $this->columnas = array (
      OctipcarPeer :: CODTIPCAR => 'Código',
      OctipcarPeer :: DESTIPCAR => 'Descripción'
    );
  }

  public function octippro_oycdefper() {
    $this->c = new Criteria();
    $this->columnas = array (
      OctipproPeer :: CODTIPPRO => 'Código',
      OctipproPeer :: DESTIPPRO => 'Descripción'
    );
  }

  public function Oycregsol_ocdatste() {
    $this->c = new Criteria();
    $this->columnas = array (
      OcdatstePeer :: CEDSTE => 'Cedula de Identidad',
      OcdatstePeer :: NOMSTE => 'Nombre'
    );
  }

  public function Oycregsol_octipsol() {
    $this->c = new Criteria();
    $this->columnas = array (
      OctipsolPeer :: CODSOL => 'Código',
      OctipsolPeer :: DESSOL => 'Descripción'
    );
  }

  public function Oycregsol_ocdeforg() {
    $this->c = new Criteria();
    $this->columnas = array (
      OcdeforgPeer :: CODORG => 'Código',
      OcdeforgPeer :: DESORG => 'Descripción'
    );
  }

  public function Oycregsol_nphojint() {
    $this->c = new Criteria();
    $this->columnas = array (
      NphojintPeer :: CODEMP => 'Código Empleado',
      NphojintPeer :: NOMEMP => 'Nombre'
    );
  }

  public function oycdatsol_octipste() {
    $this->c = new Criteria();
    $this->columnas = array (
      OctipstePeer :: CODSTE => 'Código',
      OctipstePeer :: DESSTE => 'Descripción'
    );
  }

  public function oyregpro_octipespe() {
    $this->c = new Criteria();
    $this->columnas = array (
      OctipespPeer :: CODTIPESP => 'Código',
      OctipespPeer :: DESTIPESP => 'Descripción'
    );
  }

  public function oycressol_nphojint() {
    $this->c = new Criteria();
    $this->columnas = array (
      NphojintPeer :: CODEMP => 'Código Empleado',
      NphojintPeer :: NOMEMP => 'Nombre'
    );
  }

  public function Octipact_Oycdefemp() {
    $this->c = new Criteria();
    $this->columnas = array (
      OctipactPeer :: CODTIPACT => 'Código',
      OctipactPeer :: DESTIPACT => 'Nombre'
    );
  }

  /*  Nominas especiales - Conceptos       */

  public function Npnomesptipos_nomespconceptos($params) {
    $this->c = new Criteria();
    $this->c->setDistinct();

    $this->columnas = array (
      NpnomesptiposPeer :: DESNOMESP => 'Nombre de la Nomina',
      NpnomesptiposPeer :: CODNOMESP => 'Código'
    );
  }

  public function Npnomespnomtip_nomespconceptos($params) {
    $this->c = new Criteria();
    $this->c->add(NpnomespnomtipPeer :: CODNOMESP, $params[0]);
    $this->c->addJoin(NpnomespnomtipPeer :: CODNOMESP, NpnomesptiposPeer :: CODNOMESP);
    $this->c->addJoin(NpnomespnomtipPeer :: CODNOM, NpnominaPeer :: CODNOM);

    $this->columnas = array (
      NpnominaPeer :: NOMNOM => 'Nombre/Nómina',
      NpnominaPeer :: CODNOM => 'Código'
    );
  }

  public function Nphojint_Nomjorlabind() {
    $this->c = new Criteria();

    $this->columnas = array (
      NphojintPeer :: CEDEMP => 'Cédula',
      NphojintPeer :: NOMEMP => 'Nombre'
    );
  }

  public function Npdefjorlab_Nomjorlabind($params) {
    $this->c = new Criteria();
    $this->c->add(NpdefjorlabPeer :: CODNOM, $params[0]);

    $this->columnas = array (
      NpdefjorlabPeer :: IDEJOR => 'Jornada',
      NpdefjorlabPeer :: CODNOM => 'Nómina'
    );

  }

  public function Nptipaportes_Nomdefconaportes() {
    $this->c = new Criteria();

    $this->columnas = array (
      NptipaportesPeer :: CODTIPAPO => 'Código',
      NptipaportesPeer :: DESTIPAPO => 'Descripción'
    );
  }

  public function Nppais_Nomdefespest() {
    $this->c = new Criteria();

    $this->columnas = array (
      NppaisPeer :: CODPAI => 'Código',
      NppaisPeer :: NOMPAI => 'Nombre'
    );
  }

  public function Npestado_Nomdefespciu($params) {
    $this->c = new Criteria();
    $this->c->add(NpestadoPeer :: CODPAI, $params[0]);

    $this->columnas = array (
      NpestadoPeer :: CODEDO => 'Código',
      NpestadoPeer :: NOMEDO => 'Nombre'
    );

  }

  public function Catiprec_Oycdefrec() {
    $this->c = new Criteria();
    $this->columnas = array (
      CatiprecPeer :: CODTIPREC => 'Codigó',
      CatiprecPeer :: DESTIPREC => 'Descripción'
    );
  }

  public function Npbancos_EmpleadosBanco() {
    $this->c = new Criteria();
    $this->columnas = array (
      NpbancosPeer :: CODBAN => 'Código',
      NpbancosPeer :: NOMBAN => 'Descripción'
    );
  }

  /*************************** Compras: Almdespser *******************/
  public function Npcatpre_Almdespser() {
    $this->c = new Criteria();

    $this->columnas = array (
      NpcatprePeer :: CODCAT => 'Código',
      NpcatprePeer :: NOMCAT => 'Descripción'
    );

  }

  public function Careqartser_Almdespser() {
    $this->c = new Criteria();

    $this->columnas = array (
      CareqartserPeer :: REQART => 'Código',
      CareqartserPeer :: DESREQ => 'Descripción'
    );

  }
  /*************************** Nomina: Tipos de Contratos Colectivos:presnomtipcon *******************/

  public function Npnomina_Presnomtipcon() {
    $this->c = new Criteria();
    $this->columnas = array (
      NpnominaPeer :: CODNOM => 'Codigó',
      NpnominaPeer :: NOMNOM => 'Descripción'
    );
  }

  public function Nptipcon_Presnomtipcon() {
    $this->c = new Criteria();
    $this->columnas = array (
      NptipconPeer :: CODTIPCON => 'Codigó',
      NptipconPeer :: DESTIPCON => 'Descripción'
    );
  }
  /*************************** Nomina: Tipos de Contratos Colectivos:presnomtipcon *******************/

  public function Npdefcpt_Presnomasiconpre($params) {
    $this->c = new Criteria();
    $this->c->addJoin(NpdefcptPeer :: CODCON, NpasiconnomPeer :: CODCON);
    $this->c->addJoin(NpasiconnomPeer :: CODNOM, NpasinomcontPeer :: CODNOM);
    $this->sql = "and Npasinomcont.codtipcon = '" . $params[0] . "' Order By Npdefcpt.codcon";
    $this->c->add(NpdefcptPeer :: CODCON, $this->sql, Criteria :: CUSTOM);

    //"Select Distinct NomCon Descripcion, a.CodCon From NPDefCpt a,NPasiConNom b, NPASINOMCONT c where (a.opecon='A' OR a.opecon='D') and a.codcon=b.codcon and b.codnom = c.codnom and c.codtipcon = '" & DatosIns(CodCon) & "' Order By a.codcon"

    $this->columnas = array (
      NpdefcptPeer :: CODCON => 'Codigó',
      NpdefcptPeer :: NOMCON => 'Descripción'
    );
  }
  public function Npdefcpt_Nomdefconaportes($params) {
    $this->c = new Criteria();
    $this->c->addJoin(NpdefcptPeer :: CODCON, NpasiconnomPeer :: CODCON);
    $this->c->add(NpasiconnomPeer :: CODNOM, $params[0]);

    $this->columnas = array (
      NpdefcptPeer :: CODCON => 'Codigo',
      NpdefcptPeer :: NOMCON => 'Descripcion'
    );
  }

  public function Nptipcon_Presnomasiconpre() {
    $this->c = new Criteria();
    $this->columnas = array (
      NptipconPeer :: CODTIPCON => 'Codigó',
      NptipconPeer :: DESTIPCON => 'Descripción'
    );
  }

  public function Nphojint_Vacsalidas() {
    $this->c = new Criteria();
    $this->columnas = array (
      NphojintPeer :: CODEMP => 'Codigó del Empleado',
      NphojintPeer :: NOMEMP => 'Nombre del empleado',
      NphojintPeer :: FECING => 'Fecha de Ingreso'
    );
  }

  public function Npcargos_Nomhojint($params = array ()) {
    $this->c = new Criteria();
	if (count($params)>0)
	{
		if ($params[0]!="") $this->c->add(NpcargosPeer :: CARVAN, 0,Criteria::GREATER_THAN);
	}
    $this->columnas = array (
      NpcargosPeer :: CODCAR => 'Código',
      NpcargosPeer :: NOMCAR => 'Descripción del Cargo',
      NpcargosPeer :: SUECAR => 'Sueldo',
      NpcargosPeer :: COMCAR => 'Compensación'
    );
  }

  public function Caregart_Almtraalm($params = array ()) {
    $longitud = $params[0];
    $this->c = new Criteria();
    $this->sql = "length(Codart) = '" . $longitud . "' and tipo='A'";
    $this->c->add(CaregartPeer :: CODART, $this->sql, Criteria :: CUSTOM);

    $this->columnas = array (
      CaregartPeer :: CODART => 'Código',
      CaregartPeer :: DESART => 'Descripción',
      CaregartPeer :: UNIMED => 'Unidad de Medida',
      CaregartPeer :: EXITOT => 'Existencia'
    );
  }

  public function Cacatsnc_Almregart() {
    $this->c = new Criteria();

    $this->columnas = array (
      CacatsncPeer :: CODSNC => 'Código',
      CacatsncPeer :: DESSNC => 'Descripción'
    );
  }

  public function Catipempsnc_Almregpro() {
    $this->c = new Criteria();

    $this->columnas = array (
      CatipempsncPeer :: CODTIP => 'Código',
      CatipempsncPeer :: DESTIP => 'Descripción',

    );
  }
  ////////////////////////////////////////////////Almprocomart////////////////////////////////////////

  public function Npcatpre_Almprocomart() {
    $this->c = new Criteria();
    $this->columnas = array (
      NpcatprePeer :: CODCAT => 'Código',
      NpcatprePeer :: NOMCAT => 'Descripción'
    );

  }

  public function Caconpag_Almcotiza() {
    $this->c = new Criteria();

    $this->columnas = array (
      CaconpagPeer :: CODCONPAG => 'Código',
      CaconpagPeer :: DESCONPAG => 'Descripción'
    );
  }

  public function Caregart_Almprocomart($params = array ()) {
    $longitud = $params[0];
    $this->c = new Criteria();
    $this->sql = "length(Codart) = '" . $longitud . "'";
    $this->c->add(CaregartPeer :: CODART, $this->sql, Criteria :: CUSTOM);

    $this->columnas = array (
      CaregartPeer :: CODART => 'Código',
      CaregartPeer :: DESART => 'Descripción',
      CaregartPeer :: UNIMED => 'Unidad de Medida',
      CaregartPeer :: EXITOT => 'Existencia'
    );
  }

  public function Cadefubi_Almdes($params) {
    $this->c = new Criteria();
    $this->c->addJoin(CadefubiPeer :: CODUBI, CaalmubiPeer :: CODUBI);
    $this->c->add(CaalmubiPeer :: CODALM, $params[0]);
        $this->c->addAscendingOrderByColumn(CadefubiPeer::CODUBI);

    $this->columnas = array (
      CadefubiPeer :: CODUBI => 'Código Ubicación',
      CadefubiPeer :: NOMUBI => 'Nombre'
    );
  }

  public function Npnomina_Nomnomcienom() {
    $this->c = new Criteria();
    $this->columnas = array (
      NpnominaPeer :: CODNOM => 'Código',
      NpnominaPeer :: NOMNOM => 'Descripción',
      NpnominaPeer :: ULTFEC => 'Ultima Fecha de Procesamiento',
      NpnominaPeer :: FRECAL => 'Frecuencia de Calculo',
      NpnominaPeer :: PROFEC => 'Próxima Fecha de Procesamiento'
    );
  }

  public function Npconceto_Nomdefesptippre() {
    $this->c = new Criteria();
    $this->columnas = array (
      NpdefcptPeer :: CODCON => 'Código',
      NpdefcptPeer :: NOMCON => 'Descripción'
    );
  }

  public function Nphispre_Nomperhispre() {
    $this->c = new Criteria();
    $this->columnas = array (
      NphojintPeer :: CODEMP => 'Código',
      NphojintPeer :: NOMEMP => 'Nombre'
    );
  }

  public function Nptippre_Nomperhispre() {
    $this->c = new Criteria();
    $this->columnas = array (
      NptipprePeer :: CODTIPPRE => 'Código',
      NptipprePeer :: DESTIPPRE => 'Descripción'
    );
  }

  public function Usuarios_Apliuser() {
    $this->c = new Criteria();
    $this->columnas = array (
      UsuariosPeer :: CEDEMP => 'Cédula',
      UsuariosPeer :: NOMUSE => 'Nombre',
      UsuariosPeer :: LOGUSE => 'Usuario'
    );
  }

  public function Casolart_Almcotiza() {
    //Este es el SQL Original
    //Select A.DesReq as descripcion,A.ReqArt as codigo,A.FecReq as fecha,A.MonReq as monto from CASolArt A,CAArtSol B
    // Where A.ReqArt=B.ReqArt and A.StaReq=¿A¿ Group By A.DesReq,A.ReqArt,A.FecReq,A.MonReq Having sum(coalesce(CanReq,0))>Sum(coalesce(CanOrd,0)) order by A.ReqArt,A.FecReq";

    $this->c = new Criteria();
    $this->c->clearSelectColumns();
    $this->c->addSelectColumn(CasolartPeer :: REQART);
    $this->c->addSelectColumn(CasolartPeer :: FECREQ);
    $this->c->addSelectColumn(CasolartPeer :: DESREQ);
    $this->c->addSelectColumn(CasolartPeer :: MONREQ);
    $this->c->addSelectColumn("'' as STAREQ");
    $this->c->addSelectColumn("'' as MOTREQ");
    $this->c->addSelectColumn("'' as BENREQ");
    $this->c->addSelectColumn("'' as MONDES");
    $this->c->addSelectColumn("'' as OBSREQ");
    $this->c->addSelectColumn("'' as UNIRES");
    $this->c->addSelectColumn("'' as TIPMON");
    $this->c->addSelectColumn("'' as VALMON");
    $this->c->addSelectColumn("'1937-01-01' as FECANU");
    $this->c->addSelectColumn("'' as CODPRO");
    $this->c->addSelectColumn("'' as REQCOM");
    $this->c->addSelectColumn("'' as TIPFIN");
    $this->c->addSelectColumn("'' as TIPREQ");
    $this->c->addSelectColumn("'' as APRREQ");
    $this->c->addSelectColumn("'' as USUAPR");
    $this->c->addSelectColumn("'1937-01-01' as FECAPR");
    $this->c->addSelectColumn("'' as ID");

    $this->c->addJoin(CasolartPeer :: REQART, CaartsolPeer :: REQART);
    $this->c->add(CasolartPeer :: STAREQ, "A");
    $this->c->add(CasolartPeer :: APRREQ, "S");    //Verifica si la solicitud de egreso esta aprobada

    $this->c->addGroupByColumn(CasolartPeer :: REQART);
    $this->c->addGroupByColumn(CasolartPeer :: FECREQ);
    $this->c->addGroupByColumn(CasolartPeer :: DESREQ);
    $this->c->addGroupByColumn(CasolartPeer :: MONREQ);
    $sub = $this->c->getNewCriterion(CasolartPeer :: REQART, 'SUM(COALESCE(' . CaartsolPeer :: CANREQ . ',0)) > SUM(COALESCE(' . CaartsolPeer :: CANORD . ',0))', Criteria :: CUSTOM);
    $this->c->addHaving($sub);
    $this->c->addAscendingOrderByColumn(CasolartPeer :: REQART);
    $this->c->addAscendingOrderByColumn(CasolartPeer :: FECREQ);

    $this->columnas = array (
      CasolartPeer :: REQART => 'Número',
      CasolartPeer :: DESREQ => 'Descripción'
    );
  }


 public function Casolart_Almcotizacion() {
    //Este es el SQL Original
    //Select A.DesReq as descripcion,A.ReqArt as codigo,A.FecReq as fecha,A.MonReq as monto from CASolArt A,CAArtSol B
    // Where A.ReqArt=B.ReqArt and A.StaReq=¿A¿ Group By A.DesReq,A.ReqArt,A.FecReq,A.MonReq Having sum(coalesce(CanReq,0))>Sum(coalesce(CanOrd,0)) order by A.ReqArt,A.FecReq";

    $this->c = new Criteria();
    $this->c->clearSelectColumns();
    $this->c->addSelectColumn(CasolartPeer :: REQART);
    $this->c->addSelectColumn(CasolartPeer :: FECREQ);
    $this->c->addSelectColumn(CasolartPeer :: DESREQ);
    $this->c->addSelectColumn(CasolartPeer :: MONREQ);
    $this->c->addSelectColumn("'' as STAREQ");
    $this->c->addSelectColumn("'' as MOTREQ");
    $this->c->addSelectColumn("'' as BENREQ");
    $this->c->addSelectColumn("'' as MONDES");
    $this->c->addSelectColumn("'' as OBSREQ");
    $this->c->addSelectColumn("'' as UNIRES");
    $this->c->addSelectColumn("'' as TIPMON");
    $this->c->addSelectColumn("'' as VALMON");
    $this->c->addSelectColumn("'1937-01-01' as FECANU");
    $this->c->addSelectColumn("'' as CODPRO");
    $this->c->addSelectColumn("'' as REQCOM");
    $this->c->addSelectColumn("'' as TIPFIN");
    $this->c->addSelectColumn("'' as TIPREQ");
    $this->c->addSelectColumn("'' as APRREQ");
    $this->c->addSelectColumn("'' as USUAPR");
    $this->c->addSelectColumn("'1937-01-01' as FECAPR");
    $this->c->addSelectColumn("'' as ID");

    $this->c->addJoin(CasolartPeer :: REQART, CaartsolPeer :: REQART);
    $this->c->add(CasolartPeer :: STAREQ, "A");

    $this->c->addGroupByColumn(CasolartPeer :: REQART);
    $this->c->addGroupByColumn(CasolartPeer :: FECREQ);
    $this->c->addGroupByColumn(CasolartPeer :: DESREQ);
    $this->c->addGroupByColumn(CasolartPeer :: MONREQ);
    $sub = $this->c->getNewCriterion(CasolartPeer :: REQART, 'SUM(COALESCE(' . CaartsolPeer :: CANREQ . ',0)) > SUM(COALESCE(' . CaartsolPeer :: CANORD . ',0))', Criteria :: CUSTOM);
    $this->c->addHaving($sub);
    $this->c->addAscendingOrderByColumn(CasolartPeer :: REQART);
    $this->c->addAscendingOrderByColumn(CasolartPeer :: FECREQ);

    $this->columnas = array (
      CasolartPeer :: REQART => 'Número',
      CasolartPeer :: DESREQ => 'Descripción'
    );
  }

  public function CaOrdCom_Almordrec() {
    //Este es el SQL Original
    // $sql="Select a.OrdCom as Codigo,a.FecOrd as Fecha, a.DesOrd as Descripcion from CaOrdCom a,CPCompro b,CPDocCom c where a.StaOrd<>'N' and a.OrdCom=b.RefCom and b.TipCom=C.TipCom and (c.refprc<>'N' or  c.afeprc<>'N' or c.afecom<>'N' or c.afedis<>'N') order by a.OrdCom";
    $this->c = new Criteria();
    $this->c->addJoin(CaordcomPeer :: ORDCOM, CpcomproPeer :: REFCOM);
    $this->c->addJoin(CpcomproPeer :: TIPCOM, CpdoccomPeer :: TIPCOM);
    $this->c->add(CaordcomPeer :: STAORD, "N", Criteria :: NOT_EQUAL);
    $sub = $this->c->getNewCriterion(CpdoccomPeer :: REFPRC, "N", Criteria :: NOT_EQUAL);
    $sub->addOr($this->c->getNewCriterion(CpdoccomPeer :: AFEPRC, "N", Criteria :: NOT_EQUAL));
    $sub->addOr($this->c->getNewCriterion(CpdoccomPeer :: AFECOM, "N", Criteria :: NOT_EQUAL));
    $sub->addOr($this->c->getNewCriterion(CpdoccomPeer :: AFEDIS, "N", Criteria :: NOT_EQUAL));
    $this->c->add($sub);

    $this->c->addJoin(CaordcomPeer :: ORDCOM, CaartordPeer :: ORDCOM);
    $this->c->add(CaartordPeer::CERART,null);
    $this->sql = "Caartord.canord - Caartord.canaju > Caartord.canrec ";
    $this->c->add(CaartordPeer :: CANORD, $this->sql, Criteria :: CUSTOM);
    $this->c->setDistinct();

    $this->c->addAscendingOrderByColumn(CaordcomPeer :: ORDCOM);

    $this->columnas = array (
      CaordcomPeer :: ORDCOM => 'Código',
      CaordcomPeer :: FECORD => 'Fecha',
      CaordcomPeer :: DESORD => 'Descripción'
    );
  }

  public function Bndefact_Bieregactmued() {
    //$sql="select a.CodAct as codigo_nivel,a.DesAct as activo From BNDEFACT a, BNDEFINS b where length(RTrim(a.CodAct))=b.LonAct And codact like '2%%' Order By CodAct";

    $this->c = new Criteria();
    $this->sql = "cast (BNDEFINS.LonAct as integer)=length(RTrim(BNDEFACT.CodAct)) and  (codact like '2%%' or codact like '02%%')";
    $this->c->add(BndefinsPeer :: LONACT, $this->sql, Criteria :: CUSTOM);
    $this->c->addAscendingOrderByColumn(BndefactPeer :: CODACT);

    $this->columnas = array (
      BndefactPeer :: CODACT => 'Código Nivel',
      BndefactPeer :: DESACT => 'Descripción',

    );
  }

  public function Bndefact_Bieregactinm() {
    //$sql="select a.CodAct as codigo_nivel,a.DesAct as activo From BNDEFACT a, BNDEFINS b where length(RTrim(a.CodAct))=b.LonAct And codact like '1%%' Order By CodAct";

    $this->c = new Criteria();
    $this->sql = "cast (BNDEFINS.LonAct as integer)=length(RTrim(BNDEFACT.CodAct)) and  (codact like '1%%' or codact like '01%%')";
    $this->c->add(BndefinsPeer :: LONACT, $this->sql, Criteria :: CUSTOM);
    $this->c->addAscendingOrderByColumn(BndefactPeer :: CODACT);

    $this->columnas = array (
      BndefactPeer :: CODACT => 'Código Nivel',
      BndefactPeer :: DESACT => 'Descripción',

    );
  }

  ////////////////////////////////////////////   PRESUPUESTO   ////////////////////////////////////////

  public function Cpprecom_Preprecom() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(CpprecomPeer :: REFPRC);

    $this->columnas = array (
      CpprecomPeer :: REFPRC => 'Referencia',
      CpprecomPeer :: DESPRC => 'Descripción'
    );
  }

  public function Cpcompro_Precompro() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(CpcomproPeer :: REFCOM);

    $this->columnas = array (
      CpcomproPeer :: REFCOM => 'Referencia',
      CpcomproPeer :: DESCOM => 'Descripción'
    );
  }

  public function Cpcausad_PreCausar() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(CpcausadPeer :: REFCAU);

    $this->columnas = array (
      CpcausadPeer :: REFCAU => 'Referencia',
      CpcausadPeer :: DESCAU => 'Descripción'
    );
  }

  public function Cppagos_PrePagar() {
    $this->c = new Criteria();
    $this->c->addJoin(CppagosPeer :: REFPAG, TsmovlibPeer :: REFPAG, Criteria::LEFT_JOIN);
    $this->c->addAscendingOrderByColumn(CppagosPeer :: REFPAG);
    $this->c->addAscendingOrderByColumn(TsmovlibPeer :: NUMCUE);

    $this->columnas = array (
      CppagosPeer::REFPAG => 'Referencia',
      CppagosPeer::DESPAG => 'Descripción',
      TsmovlibPeer::REFLIB => 'N/Cheque',
      TsmovlibPeer::NUMCUE => 'Nro. Cuenta'
    );
  }

  public function Cpdeftit_Pretitpre() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(CpdeftitPeer :: CODPRE);

    $this->columnas = array (
      CpdeftitPeer :: CODPRE => 'Referencia',
      CpdeftitPeer :: NOMPRE => 'Descripción'
    );
  }

  public function Cpsoltrasla_Presoltrasla() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(CpsoltraslaPeer :: REFTRA);

    $this->columnas = array (
      CpsoltraslaPeer :: REFTRA => 'Referencia',
      CpsoltraslaPeer :: DESTRA => 'Descripción'
    );
  }

  public function Cpsoltrasla_PreTrasla() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(CpsoltraslaPeer :: REFTRA);

    $this->columnas = array (
      CpsoltraslaPeer :: REFTRA => 'Referencia',
      CpsoltraslaPeer :: DESTRA => 'Descripción'
    );
  }

  public function Cpsoladidis_PreSolAdiDis() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(CpsoladidisPeer :: REFADI);

    $this->columnas = array (
      CpsoladidisPeer :: REFADI => 'Referencia',
      CpsoladidisPeer :: DESADI => 'Descripción'
    );
  }

  public function Cpadidis_PreAdiDis() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(CpadidisPeer :: REFADI);

    $this->columnas = array (
      CpadidisPeer :: REFADI => 'Referencia',
      CpadidisPeer :: DESADI => 'Descripción'
    );
  }

  public function Cpajuste_PreAjuste() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(CpajustePeer :: REFAJU);

    $this->columnas = array (
      CpajustePeer :: REFAJU => 'Referencia',
      CpajustePeer :: DESAJU => 'Descripción'
    );
  }

  public function Cpartley_Preartley() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(CpartleyPeer :: CODART);

    $this->columnas = array (
      CpartleyPeer :: CODART => 'Referencia',
      CpartleyPeer :: DESART => 'Descripción'
    );
  }

  public function Cpdocprc_Predocpre() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(CpdocprcPeer :: TIPPRC);

    $this->columnas = array (
      CpdocprcPeer :: TIPPRC => 'Tipo Documento',
      CpdocprcPeer :: NOMEXT => 'Nombre Extendido'
    );
  }

  public function Cpdocpag_Predocpag() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(CpdocpagPeer :: TIPPAG);

    $this->columnas = array (
      CpdocpagPeer :: TIPPAG => 'Tipo Documento',
      CpdocpagPeer :: NOMEXT => 'Nombre Extendido'
    );
  }

  public function Cpdoccom_Predoccom() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(CpdoccomPeer :: TIPCOM);

    $this->columnas = array (
      CpdoccomPeer :: TIPCOM => 'Tipo Documento',
      CpdoccomPeer :: NOMEXT => 'Nombre Extendido'
    );
  }

  public function Cpdoccau_Predoccau() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(CpdoccauPeer :: TIPCAU);

    $this->columnas = array (
      CpdoccauPeer :: TIPCAU => 'Tipo Documento',
      CpdoccauPeer :: NOMEXT => 'Nombre Extendido'
    );
  }

  public function Cpdocaju_Predocaju() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(CpdocajuPeer :: TIPAJU);

    $this->columnas = array (
      CpdocajuPeer :: TIPAJU => 'Tipo Documento',
      CpdocajuPeer :: NOMEXT => 'Nombre Extendido'
    );
  }


  public function Cptrasla_PreTrasla()
  {
    $this->c= new Criteria();
    $this->c->addAscendingOrderByColumn(CptraslaPeer::REFTRA);

    $this->columnas = array (CptraslaPeer::REFTRA => 'Referencia', CptraslaPeer::DESTRA => 'Descripción');
  }


  public function Pretitpre_Contabb()
  {

    //Se busca el codigo de la cta de egreso
    $ctaegreso='';
    $c= new Criteria();
    //Se quito por orden de Edgar y Vaneesa Escalona
    //$reg = ContabaPeer::doSelectone($c);
    //if ($reg){ $ctaegreso = $reg->getCodegd();
    //}else{ echo "No se ha definido la Cuenta de Egrego";}

    $this->c= new Criteria();
    $this->c->add(ContabbPeer::CARGAB,'C');
    //$this->c->add(ContabbPeer::CODCTA,$ctaegreso.'%',Criteria::LIKE);
    $this->c->addAscendingOrderByColumn(ContabbPeer::CODCTA);

    $this->columnas = array (ContabbPeer::CODCTA => 'Cuenta', ContabbPeer::DESCTA => 'Descripción');
  }


  public function Preasiini_Cpdeftit()
  {
    $this->c= new Criteria();
    $this->sql = "length(cpdeftit.codpre) = length(cpdefniv.forpre)";
  $this->c->add(CpdefnivPeer :: FORPRE, $this->sql, Criteria :: CUSTOM);
    $this->c->addAscendingOrderByColumn(CpdeftitPeer::CODPRE);

    $this->columnas = array (
        CpdeftitPeer::CODPRE=> 'Código Presupuestario',
        CpdeftitPeer::NOMPRE => 'Descripción'
    );

  }


  public function Preasipar_Cpdeftit($params = array ())
  {
    //'Select nompre as Descripcion, codpre as Codigo from cpdeftit where length(rtrim(codpre))='+LonCat+' - 1 and upper(nompre)

    $this->c= new Criteria();
    $this->sql = "length(cpdeftit.codpre) = ".($params[0]-1);
  $this->c->add(CpdeftitPeer :: CODPRE, $this->sql, Criteria :: CUSTOM);
    $this->c->addAscendingOrderByColumn(CpdeftitPeer::CODPRE);

    $this->columnas = array (
        CpdeftitPeer::CODPRE=> 'Código Presupuestario',
        CpdeftitPeer::NOMPRE => 'Descripción'
    );
  }



  public function Preprecom_Cpdocprc($params = array ())
  {
    $this->c= new Criteria();
    $this->c->addAscendingOrderByColumn(CpdocprcPeer::TIPPRC);

    $this->columnas = array (
        CpdocprcPeer::TIPPRC=> 'Tipo',
        CpdocprcPeer::NOMEXT => 'Descripción'
    );
  }


  public function Preprecom_Opbenefi($params = array ())
  {
    $this->c= new Criteria();
    $this->c->addAscendingOrderByColumn(OpbenefiPeer::CEDRIF);

    $this->columnas = array (
        OpbenefiPeer::CEDRIF => 'Cédula/Rif',
        OpbenefiPeer::NOMBEN => 'Nombre'
    );
  }



  public function Preprecom_Cpasiini($params = array ())
  {
    //sql='select a.codpre as codigo, a.nompre as descripcion from cpasiini a, cpdefniv b where length(rtrim(a.codpre))= length(rtrim(b.forpre)) and a.perpre=�00� and a.mondis > 0 and UPPER(a.nompre) like upper(�%�) order by a.codpre';

    $this->c= new Criteria();
    $this->sql = "length(cpasiini.codpre) = length(cpdefniv.forpre)";
  $this->c->add(CpdefnivPeer :: FORPRE, $this->sql, Criteria :: CUSTOM);
  $this->c->add(CpasiiniPeer :: PERPRE, '00');
  $this->c->add(CpasiiniPeer :: MONDIS, 0, Criteria::GREATER_THAN);

    $this->c->addAscendingOrderByColumn(CpasiiniPeer::CODPRE);

    $this->columnas = array (
        CpasiiniPeer::CODPRE => 'Código Presupuestario',
        CpasiiniPeer::NOMPRE => 'Descripción'
    );
  }


  public function Precompro_Cpdoccom($params = array ())
  {
    $this->c= new Criteria();
    $this->c->addAscendingOrderByColumn(CpdoccomPeer::TIPCOM);
    $this->c->addAscendingOrderByColumn(CpdoccomPeer::NOMEXT);

    $this->columnas = array (
        CpdoccomPeer::TIPCOM => 'Tipo',
        CpdoccomPeer::NOMEXT => 'Descripción',
        CpdoccomPeer::REFPRC => 'Refiere'
    );

  }


  public function PreCompro_Cpasiini($params = array ())
  {
    $this->c= new Criteria();
    $this->c->addJoin(CpasiiniPeer :: CODPRE,CpdeftitPeer :: CODPRE);
    $this->c->add(CpasiiniPeer :: PERPRE, '00');
    $this->c->add(CpasiiniPeer :: MONDIS, 0, Criteria::GREATER_THAN);
// $this->c->add(AtayudasPeer::ID,"ID NOT IN (SELECT atayudas_id FROM atestsoceco)",Criteria::CUSTOM);
    $this->c->addAscendingOrderByColumn(CpasiiniPeer::CODPRE);

    $this->columnas = array (
        CpasiiniPeer::CODPRE => 'Código Presupuestario',
        CpasiiniPeer::NOMPRE => 'Descripción'
    );
  }

  public function Precausar_Cpdoccau() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(CpdoccauPeer :: TIPCAU);

    $this->columnas = array (
      CpdoccauPeer :: TIPCAU => 'Tipo Documento',
      CpdoccauPeer :: NOMEXT => 'Nombre Extendido',
      CpdoccauPeer :: REFIER => 'Refiere'

    );
  }


  public function Prepagar_Cpdocpag() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(CpdocpagPeer :: TIPPAG);

    $this->columnas = array (
      CpdocpagPeer :: TIPPAG => 'Tipo Documento',
      CpdocpagPeer :: NOMEXT => 'Nombre Extendido',
      CpdocpagPeer :: REFIER => 'Refiere'

    );
  }


  public function PrePagar_Cpasiini($params = array ())
  {
    $this->c= new Criteria();
    $this->sql = "length(cpasiini.codpre) = length(cpdefniv.forpre)";
  $this->c->add(CpdefnivPeer :: FORPRE, $this->sql, Criteria :: CUSTOM);
  $this->c->add(CpasiiniPeer :: PERPRE, '00');
  $this->c->add(CpasiiniPeer :: MONDIS, 0, Criteria::GREATER_THAN);

    $this->c->addAscendingOrderByColumn(CpasiiniPeer::CODPRE);

    $this->columnas = array (
        CpasiiniPeer::CODPRE => 'Código Presupuestario',
        CpasiiniPeer::NOMPRE => 'Descripción'
    );
  }


  public function Presoltrasla_Cpasiini($params = array ())
  {
    $this->c= new Criteria();
    $this->c->addJoin(CpasiiniPeer :: CODPRE,CpdeftitPeer :: CODPRE);
  $this->c->add(CpasiiniPeer :: PERPRE, '00');
  $this->c->add(CpasiiniPeer :: MONDIS, 0, Criteria::GREATER_EQUAL);

    $this->c->addAscendingOrderByColumn(CpasiiniPeer::CODPRE);

    $this->columnas = array (
        CpasiiniPeer::CODPRE => 'Código Presupuestario',
        CpasiiniPeer::NOMPRE => 'Descripción',
        CpasiiniPeer :: MONDIS => 'Disponible',
    );
  }


  public function Presoltrasla_Cpasiini2($params = array ())
  {
    $this->c= new Criteria();
    $this->c->addJoin(CpasiiniPeer :: CODPRE,CpdeftitPeer :: CODPRE);
  $this->c->add(CpasiiniPeer :: PERPRE, '00');

    $this->c->addAscendingOrderByColumn(CpasiiniPeer::CODPRE);

    $this->columnas = array (
        CpasiiniPeer::CODPRE => 'Código Presupuestario',
        CpasiiniPeer::NOMPRE => 'Descripción',
        CpasiiniPeer :: MONDIS => 'Disponible',
    );
  }

  public function Cpasiini_Presoladidis($params = array ())
  {

  /*	sql='select a.codpre as codigo, a.nompre as descripcion, mondis as Disponible ' .
  		'From ' .
  			'cpasiini a, CPDEFTIT b ' .
  		'Where ' .
  			'upper(a.nompre) like upper(¿%¿) and  ' .
  			'a.codpre=b.codpre and ' .
  			'a.perpre=¿00¿ and ' .
  			'a.monasi>=0  ' .
  		'order by ' .
  			'a.codpre';
*/
    $this->c= new Criteria();
    $this->c->addJoin(CpasiiniPeer :: CODPRE,CpdeftitPeer :: CODPRE);
    $this->c->add(CpasiiniPeer :: PERPRE, '00');
    $this->c->add(CpasiiniPeer :: MONASI, '0', Criteria::GREATER_EQUAL);

    $this->c->addAscendingOrderByColumn(CpasiiniPeer::CODPRE);

    $this->columnas = array (
        CpasiiniPeer::CODPRE => 'Código Presupuestario',
        CpasiiniPeer::NOMPRE => 'Descripción',
        CpasiiniPeer::MONDIS => 'Disponible',
    );
  }


  //////////////////////////////////////////// ////////////////////////////////////////////

  ////////////////// CONTABILIDAD FINANCIERA ///////////////////

   public function Contabc_ConFinCom() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(ContabcPeer::NUMCOM);
    $this->c->addAscendingOrderByColumn(ContabcPeer::FECCOM);
    $this->c->addAscendingOrderByColumn(ContabcPeer::STACOM);

    $this->columnas = array (
      ContabcPeer :: NUMCOM => 'Numero',
      ContabcPeer :: DESCOM => 'Descripcion',
      ContabcPeer :: FECCOM => 'Fecha',
      ContabcPeer :: STACOM => 'Estatus',
      ContabcPeer :: REFTRA => 'Referencia',
    );
  }

  /////////////////////////////////////////////////////////////

  ////////////////// OBRAS Y CONTRATOS ///////////////////
  public function Caprovee_Ocoferpre() {
    $this->c = new Criteria();
    $this->c->addJoin(CaproveePeer :: CODPRO, OcproespPeer :: CODPRO);
    $this->c->addAscendingOrderByColumn(CaproveePeer :: CODPRO);

    $this->columnas = array (
      CaproveePeer :: CODPRO => 'Contratista',
      CaproveePeer :: NOMPRO => 'Nombre'
    );
  }

	public function Obras_Ocoferpre() {
		$this->c = new Criteria();
		$this->c->addAscendingOrderByColumn(OcregobrPeer :: CODOBR);

		$this->columnas = array (
			OcregobrPeer :: CODOBR => 'Código',
			OcregobrPeer :: DESOBR => 'Descripción',
			OcregobrPeer :: CODPRE => 'Código Presupuestario'
		);
	}

	public function Obras_Ocadjobr() {
		$this->c = new Criteria();
		$this->c->addAscendingOrderByColumn(OcregobrPeer :: CODOBR);

		$this->columnas = array (
			OcregobrPeer :: CODOBR => 'Código',
			OcregobrPeer :: DESOBR => 'Descripción',
			OcregobrPeer :: CODTIPOBR => 'Tipo',
			OcregobrPeer :: FECINI => 'Fecha Inicio',
			OcregobrPeer :: FECFIN => 'Fecha Fin',
			OcregobrPeer :: MONOBR => 'Monto',
            OcregobrPeer :: CODPRE => 'Código Presupuestario'
		);
	}

  public function Tipofin_Ocreglic() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(FortipfinPeer :: CODFIN);

    $this->columnas = array (
      FortipfinPeer :: CODFIN => 'Fuente de Financiamiento',
      FortipfinPeer :: NOMEXT => 'Nombre'
    );
  }

  public function Clacomp_Ocreglic() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(OcclacompPeer :: CODCLACOMP);

    $this->columnas = array (
      OcclacompPeer :: CODCLACOMP => 'Código Clasif. de Compras',
      OcclacompPeer :: DESCLACOMP => 'Descripción'
    );
  }



  public function Octipcon_Oycdefemp() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(OctipconPeer :: CODTIPCON);

    $this->columnas = array (
      OctipconPeer :: CODTIPCON => 'Código',
      OctipconPeer :: DESTIPCON => 'Descripción'
    );
  }

  public function Octipval_Oycdefemp() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(OctipvalPeer :: CODTIPVAL);

    $this->columnas = array (
      OctipvalPeer :: CODTIPVAL => 'Código',
      OctipvalPeer :: DESTIPVAL => 'Descripción'
    );
  }

  public function Ocdefpar_Oycdefemp() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(OcdefparPeer :: CODPAR);

    $this->columnas = array (
      OcdefparPeer :: CODPAR => 'Código Partida',
      OcdefparPeer :: DESPAR => 'Descripción',
      OcdefparPeer :: CODUNI => 'Unidad',
      OcdefparPeer :: COSUNI => 'Costo'
    );
  }

  public function Unidad_Ocdefpar() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(OcunidadPeer :: CODUNI);

    $this->columnas = array (
      OcunidadPeer :: CODUNI => 'Código Unidad',
      OcunidadPeer :: DESUNI => 'Descripción'
    );
  }

  public function Octipobr_Oycdesobr() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(OctipobrPeer :: CODTIPOBR);

    $this->columnas = array (
      OctipobrPeer :: CODTIPOBR => 'Tipo de Obra',
      OctipobrPeer :: DESTIPOBR => 'Descripción'
    );
  }

  public function Carecaud_Oycregpro($param) {
    $this->c = new Criteria();
    $this->c->add(CarecaudPeer :: CODTIPREC, $param[0]);

    $this->columnas = array (
      CarecaudPeer :: CODREC => 'Codigo',
      CarecaudPeer :: DESREC => 'Descripción'
    );
  }

  public function Ocdefper_Oycregpro() {
    $this->c = new Criteria;
    $this->c->addJoin(OcdefperPeer :: CODTIPPRO, OctipproPeer :: CODTIPPRO);
    $this->c->addJoin(OcdefperPeer :: CODTIPCAR, OctipcarPeer :: CODTIPCAR);

    $this->columnas = array (
      OcdefperPeer :: CEDPER => 'Cédula',
      OcdefperPeer :: NOMPER => 'Nombre',
      OctipproPeer :: DESTIPPRO => 'Profesión',
      OctipcarPeer :: DESTIPCAR => 'Cargo'
    );
  }

  public function Ocdefequ_Oycregpro() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(OcdefequPeer :: CODEQU);

    $this->columnas = array (
      OcdefequPeer :: CODEQU => 'Código',
      OcdefequPeer :: DESEQU => 'Descripción'
    );
  }

  public function Caprovee_Oycregcon() {
    $this->c = new Criteria();
    $this->c->addJoin(CaproveePeer :: CODPRO, OcproespPeer :: CODPRO);
    $this->columnas = array (
      CaproveePeer :: CODPRO => 'Codigo',
      CaproveePeer :: NOMPRO => 'Nombre'
    );
  }

  public function Ocdefper_Oycdescon($param) {
    $c = new Criteria();
    $data = OcdefempPeer :: doSelectOne($c);
    if ($data) {
      if ($param[1] != $data->getCodconins() and $param[1] != $data->getCodconsup() and $param[1] != $data->getCodconpro()) {
        $this->c = new Criteria;
        $this->c->add(OcproperPeer :: CODPRO, $param[0]);
        $this->c->addJoin(OcdefperPeer :: CEDPER, OcproperPeer :: CEDPER);
        $this->c->addJoin(OcdefperPeer :: CODTIPCAR, OcdefempPeer :: CODINGRES);
        $this->c->addJoin(OcdefperPeer :: CODTIPCAR, OctipcarPeer :: CODTIPCAR);
        $this->c->addJoin(OcdefempPeer :: CODINGRES, OctipcarPeer :: CODTIPCAR);
      } else {
        if ($param[1] == $data->getCodconins() or $param[1] == $data->getCodconsup() or $param[1] == $data->getCodconpro()) {
          $this->c = new Criteria;
          $this->c->add(OcproperPeer :: CODPRO, $param[0]);
          $this->c->addJoin(OcdefperPeer :: CEDPER, OcproperPeer :: CEDPER);
          $this->c->addJoin(OcdefperPeer :: CODTIPCAR, OctipcarPeer :: CODTIPCAR);
        }
      }
    }

    $this->columnas = array (
      OcdefperPeer :: CEDPER => 'Cédula',
      OcdefperPeer :: NOMPER => 'Nombre'
    );
  }

  public function Octipret_Oycdescon() {
    $this->c = new Criteria();

    $this->columnas = array (
      OctipretPeer :: CODTIP => 'Código',
      OctipretPeer :: DESTIP => 'Descripción',
      OctipretPeer :: PORRET => '% Retencion',
      OctipretPeer :: BASIMP => 'Base Imponible',
      OctipretPeer :: UNITRI => 'Unidad',
      OctipretPeer :: FACTOR => 'Factor',
      OctipretPeer :: PORSUS => '% Sustraendo',
      OctipretPeer :: STAMON => 'Estatus'
    );
  }

  public function Octipprl_Oycdescon($param) {
      $this->c = new Criteria();
      $this->c->add(OctartipPeer::CODTIPPRO,$param[0]);

    $this->columnas = array (
      OctartipPeer :: NIVPRO => 'Nivel Profesional',
      OctartipPeer :: EXPPRO => 'Experiencia',
      OctartipPeer :: VALHOR => 'Valor Horas'
    );
  }

  public function Octipper_Oycdefper() {
    $this->c = new Criteria();

    $this->columnas = array (
      OctipperPeer :: CODTIPPER => 'Código',
      OctipperPeer :: DESTIPPER => 'Descripción'
    );
  }

  public function Octipequ_Oycdefequ() {
    $this->c = new Criteria();

    $this->columnas = array (
      OctipequPeer :: CODTIPEQU => 'Código',
      OctipequPeer :: DESTIPEQU => 'Descripción'
    );
  }

  public function Octiporg_Oycdeforg() {
    $this->c = new Criteria();

    $this->columnas = array (
      OctiporgPeer :: CODTIPORG => 'Código',
      OctiporgPeer :: DESTIPORG => 'Descripción'
    );
  }

  public function Ocregsol_Oycressol() {
    $this->c = new Criteria();
    $this->c->addJoin(OcregsolPeer :: CEDSTE, OcdatstePeer :: CEDSTE);
    $this->c->addJoin(OcregsolPeer :: CODEMP, NphojintPeer :: CODEMP);

    $this->columnas = array (
      OcregsolPeer :: NUMSOL => 'Nro. Solicitud',
      OcregsolPeer :: DESSOL => 'Descripción',
      OcregsolPeer :: CEDSTE => 'Cédula',
      OcdatstePeer :: NOMSTE => 'Nombre',
      OcregsolPeer :: FECSOL => 'Fecha Recepción',
      OcregsolPeer :: CODEMP => 'Recibido por',
      NphojintPeer :: NOMEMP => 'Nombre',

    );
  }

  public function oyctartip_octipprl() {
    $this->c = new Criteria();

    $this->columnas = array (
      OctipprlPeer :: CODTIPPRO => 'Tipo Profesional',
      OctipprlPeer :: DESTIPPRO => 'Descripción'
    );
  }

  public function Ocinginsobr_Oycregact($param) {
    $this->c = new Criteria();
    $this->c->add(OcinginsobrPeer :: CODOBR, $param[0]);

    $this->columnas = array (
      OcinginsobrPeer :: CEDINS => 'Cédula',
      OcinginsobrPeer :: NOMINS => 'Descripción',
      OcinginsobrPeer :: NUMCIV => 'Nro. CIV'
    );
  }

  public function Ocregcon_Oycregact() {
    $this->c = new Criteria();
    $this->c->add(OcregconPeer :: STACON, 'N', Criteria :: NOT_EQUAL);

    $this->columnas = array (
      OcregconPeer :: CODCON => 'Código',
      OcregconPeer :: DESCON => 'Descripción'
    );
  }

  public function Ocdefpar_Oycinscon($param) {
    $this->c = new Criteria();
    $this->c->add(OcparconPeer :: CODCON, $param[0]);
    $this->c->addJoin(OcparconPeer :: CODPAR,OcdefparPeer :: CODPAR);
    $this->c->addJoin(OcdefparPeer :: CODUNI, OcunidadPeer :: CODUNI);

    $this->columnas = array (
      OcdefparPeer :: CODPAR => 'Código Partida',
      OcdefparPeer :: DESPAR => 'Descripción',
      OcunidadPeer :: ABRUNI => 'Unidad',
      OcparconPeer :: CANCON => 'Cant. Contrada',
      OcparconPeer :: CODCON => 'N° de Contrato'
    );
  }

    public function Presnomasicompre_nptipcon() {
    $this->c = new Criteria();

    $this->columnas = array (
      NptipconPeer :: CODTIPCON => 'Código Contrato',
      NptipconPeer :: DESTIPCON => 'Descripción'
    );
  }

	public function Presnomasicompre_npasipre($param) {
		$c = new Criteria();
		$c->add(NpasiprePeer :: CODCON, $param[0]);
		$rs = NPasiprePeer :: doSelectone($c);

		$this->c = new Criteria();
		if ($rs)
			$this->c->add(NpasiprePeer :: CODCON, $param[0]);

		$this->c->addSelectColumn("'' AS CODCON");
		$this->c->addSelectColumn(NpasiprePeer :: CODASI);
		$this->c->addSelectColumn(NpasiprePeer :: DESASI);
		$this->c->addSelectColumn(NpasiprePeer :: TIPASI);
		$this->c->addSelectColumn(NpasiprePeer :: AFEALIBV);
        $this->c->addSelectColumn(NpasiprePeer :: AFEALIBF);
		$this->c->addSelectColumn("max(ID) AS ID");

		$this->c->addGroupByColumn(NpasiprePeer :: CODASI);
		$this->c->addGroupByColumn(NpasiprePeer :: DESASI);
		$this->c->addGroupByColumn(NpasiprePeer :: TIPASI);
		$this->c->addGroupByColumn(NpasiprePeer :: AFEALIBV);
		$this->c->addGroupByColumn(NpasiprePeer :: AFEALIBF);

		$this->columnas = array (
			NpasiprePeer :: CODASI => 'Código Grupo',
			NpasiprePeer :: DESASI => 'Descripción'
		);
	}



      public function Npdefcpt_Presnomasiconpre_codnom($params = array ()){

  /*
  *  SQL = "Select Distinct NomCon Descripcion, a.CodCon From NPDefCpt a,NPasiConNom b, NPASINOMCONT c
  * where (a.opecon='A' OR a.opecon='D') and a.codcon=b.codcon and b.codnom = c.codnom and c.codtipcon = '" & DatosIns(CodCon) & "'
  * Order By a.codcon"
  */
      $this->c= new Criteria();
      $this->c->addjoin(NpdefcptPeer::CODCON,NpasiconnomPeer::CODCON);
      $this->c->addjoin(NPasiconnomPeer::CODNOM,NpasinomcontPeer::CODNOM);
      $this->c->add(NpasinomcontPeer::CODTIPCON,$params[0]);
      $sub = $this->c->getNewCriterion(NpdefcptPeer :: OPECON, "A", Criteria :: EQUAL);
      $sub->addOr($this->c->getNewCriterion(NpdefcptPeer :: OPECON, "D", Criteria :: EQUAL));
      $this->c->add($sub);
      $this->c->setDistinct();
      $this->c->addAscendingOrderByColumn(NpdefcptPeer::CODCON);
      $this->columnas = array (
        NpdefcptPeer :: CODCON => 'Código',
        NpdefcptPeer :: NOMCON => 'Descripción'
        );
      }


  public function Nptipcon_Presnomregsalint()
    {
          $this->c= new Criteria();
          $this->c->addAscendingOrderByColumn(NptipconPeer::CODTIPCON );
          $this->columnas = array (NptipconPeer::CODTIPCON => 'Código del Contrato', NptipconPeer::DESTIPCON => 'Descripción');
    }


  public function Npnomina_Presnomregsalint($params=array())
  {
        $this->c= new Criteria();
        $this->c->add(NpasinomcontPeer::CODTIPCON,$params[0]);
        $this->c->addJoin(NpnominaPeer::CODNOM,NpasinomcontPeer::CODNOM);
        $this->c->addAscendingOrderByColumn(NpnominaPeer::CODNOM);
        $this->columnas = array (NpnominaPeer::CODNOM => 'Código de la Nomina', NpnominaPeer::NOMNOM => 'Descripción');
  }

  public function Npnomina_Presnomregsalintind($params=array())
  {
    //print $params[0];
    //print $params[1]; exit;
        $this->c= new Criteria();
        $this->c->add(NpasiempcontPeer::CODNOM,$params[0]);
         $this->c->add(NpasiempcontPeer::CODTIPCON,$params[1]);
        $this->c->addAscendingOrderByColumn(NpasiempcontPeer::CODEMP);
        $this->columnas = array (NpasiempcontPeer::CODEMP => 'Código del Empleado', NpasiempcontPeer::NOMEMP => 'Nombre', NpasiempcontPeer::FECCAL => 'Fecha de Calculo');
  }


  public function Opordpag_Nomina()
  {
    /*Select distinct((CASE when c.cedemp is null THEN b.nomnom else C.NOMEMP||' ('||B.NOMNOM||')' END)) as nomina,
         A.CODNOM as codigo,A.FECNOM as fecha,a.codtipgas as gasto,A.CODBAN as codban
         FROM NPNOMINA B,NPCIENOM A left outer join NPHOJINT C on A.CODBAN=C.CEDEMP
         WHERE A.CODNOM=B.CODNOM AND A.ASIDED<>'P' order by nomina,fecha;*/

         $this->c= new Criteria();
         $this->c->addSelectColumn(' distinct((CASE when'.NphojintPeer::CEDEMP.'is null THEN'.NpnominaPeer::NOMNOM.'else'.NphojintPeer::NOMEMP.'||(||'.NpnominaPeer::NOMNOM.'END)) as NOMNOM');
      $this->c->addSelectColumn(NpcienomPeer::CODNOM);
      //$this->c->addSelectColumn(NpnominaPeer::NOMNOM);
      $this->c->addSelectColumn(NpcienomPeer::CODCON);
      $this->c->addSelectColumn(NpcienomPeer::FECNOM);
      $this->c->addSelectColumn(NpcienomPeer::CODPRE);
      $this->c->addSelectColumn(NpcienomPeer::CODCTA);
      $this->c->addSelectColumn(NpcienomPeer::MONTO);
      $this->c->addSelectColumn(NpcienomPeer::ASIDED);
      $this->c->addSelectColumn(NpcienomPeer::CODTIPGAS);
      $this->c->addSelectColumn(NpcienomPeer::CANTIDAD);
      $this->c->addSelectColumn(NpcienomPeer::CODBAN);
      $this->c->addSelectColumn(NpcienomPeer::ESPECIAL);
      $this->c->addSelectColumn(NpcienomPeer::CODNOMESP);
      $this->c->addSelectColumn(NpcienomPeer::NOMNOMESP);
      $this->c->addSelectColumn(NpcienomPeer::ID);
         $this->c->addJoin(NpcienomPeer::CODBAN,NphojintPeer::CEDEMP,Criteria::LEFT_JOIN);
         $sub = $this->c->getNewCriterion(NpcienomPeer::ASIDED,'P',Criteria::NOT_EQUAL);
         $sub->addJoin($this->c->getNewCriterion(NpcienomPeer::CODNOM,NpnominaPeer::CODNOM));
         $this->c->add($sub);
         //$this->c->addJoin(NpcienomPeer::ASIDED,'P',Criteria::NOT_EQUAL);
         //$this->c->addJoin(NpcienomPeer::CODNOM,NpnominaPeer::CODNOM);
         //$this->c->addAscendingOrderByColumn(NpnominaPeer::NOMNOM);
         //$this->c->addAscendingOrderByColumn(NpcienomPeer::FECNOM);

         $this->columnas = array (//NpnominaPeer::NOMNOM => 'Descripción',
          NpcienomPeer::CODNOM => 'Código de la Nomina', NpcienomPeer::FECNOM => 'Fecha', NpcienomPeer::CODTIPGAS => 'Gasto', NpcienomPeer::CODBAN => 'Banco');

  }

public function Tsmovlib_tesmovdeglib2()
  {
    $this->c = new Criteria();
  //    $this->c->addAscendingOrderByColumn(TstipmovPeer::CODTIP);
      $this->columnas = array (TstipmovPeer::CODTIP => 'Codigo', TstipmovPeer::DESTIP=> 'Descripcion');
    }


 public function Nphojint_presnomregsalint($params = array ())
      {
       $this->c=new Criteria();
       $this->c->add(NpasicarempPeer::CODNOM,$params[0]);
       $this->c->add(NpasicarempPeer :: STATUS, 'V');
       $this->c->addJoin(NphojintPeer :: CODEMP, NpasicarempPeer :: CODEMP);
       //$this->c->addJoin(NpasiempcontPeer :: CODNOM, NpasicarempPeer :: CODNOM);
       $this->columnas = array (NpasicarempPeer::CODEMP => 'Código del empleado', NpasicarempPeer::NOMEMP => 'Nombre',NphojintPeer::FECING => 'Fecha Calculo');
       //, NpasiempcontPeer::FECCAL => 'Fecha Calculo'

       }

    public function Caregart_Almentalm() {
    $mascaraarticulo = Herramientas::getMascaraArticulo();
    $longitud = strlen($mascaraarticulo);
    $this->c = new Criteria();
    $this->c->add(CaregartPeer :: TIPO, 'A');
    $this->sql = "length(Codart) = '" . $longitud . "'";
    $this->c->add(CaregartPeer :: CODART, $this->sql, Criteria :: CUSTOM);

    $this->columnas = array (
      CaregartPeer :: CODART => 'Código',
      CaregartPeer :: DESART => 'Descripción',
      CaregartPeer :: COSULT => 'Costo'
    );
  }

/////////////// Atencion al Ciudadano ////////////////////////////////

  public function Atsolici_Aciayudas()
  {

    $this->c= new Criteria();

    $this->columnas = array (AtciudadanoPeer::CEDCIU => 'Cedula', AtciudadanoPeer::NOMCIU => 'Nombre', AtciudadanoPeer::APECIU => 'Apellido');


  }

  public function Atbenefi_Aciayudas()
  {

    $this->c= new Criteria();

    $this->columnas = array (AtciudadanoPeer::CEDCIU => 'Cedula', AtciudadanoPeer::NOMCIU => 'Nombre', AtciudadanoPeer::APECIU => 'Apellido');


  }

  public function Caprovee_Aciayudas()
  {

    $this->c= new Criteria();
    $this->c->add(CaproveePeer::ESTPRO,'A');
    $this->columnas = array (CaproveePeer::RIFPRO => 'Rif', CaproveePeer::NOMPRO => 'Nombre', CaproveePeer::CODPRO => 'Código');


  }


  public function Atgrudon_Aciayudas()
  {

    $this->c= new Criteria();

    $this->columnas = array (AtgrudonPeer::DESGRU => 'Grupos');

  }

  public function Atdonaciones_Aciayudas($params = '')
  {

    $this->c= new Criteria();

    $this->columnas = array (AtdonacionesPeer::CODDON => 'Codigo', AtdonacionesPeer::DESDON => 'Descripcion');


  }

  public function Atayudas_Aciestsoceco()
  {
    $this->c= new Criteria();
    $this->c->add(AtayudasPeer::ID,"ID NOT IN (SELECT atayudas_id FROM atestsoceco)",Criteria::CUSTOM);

    $this->columnas = array (AtayudasPeer::NROEXP => 'Expediente', 'atayudas.NOMSOL' => 'Solicitante', 'atayudas.NOMBEN' => 'Beneficiario');

  }

  public function Atmedico_Aciayudas()
  {

    $this->c= new Criteria();

    $this->columnas = array (AtmedicoPeer::CEDRIFMED => 'Cedula', AtmedicoPeer::NOMBREMED => 'Nombre', AtmedicoPeer::APELLIMED => 'Apellido');


  }

  public function Cpdeftit_Acitipayu()
  {
    $this->c= new Criteria();
    $this->c->add(CpdeftitPeer::CODPRE,"character_length(".CpdeftitPeer::CODPRE.")=(select max(character_length(".CpdeftitPeer::CODPRE.")) from cpdeftit)",Criteria::CUSTOM);

    $this->columnas = array (CpdeftitPeer::CODPRE => 'Código', CpdeftitPeer::NOMPRE => 'Descripción');

  }


  public function Nphispre_Presnomcalintpre() {
    $this->c = new Criteria();
    $this->columnas = array (
      NphojintPeer :: CODEMP => 'Código',
      NphojintPeer :: NOMEMP => 'Nombre'
    );
  }



 public function Forencpryaccespmet_Forpoa_uae($params=array())
 {

  /*Select CodCat Codigo,
  NomCat Categoria
  From
  ForDefCatPre
  Where
  LENGTH(RTRIM(CODCAT))=" + Trim(Str(Len(Trim(FormatoUAE)))) + " And
  CodCat Like '" & CodigoAccEsp.Text & "%'" & "
  order by
  CodCat
  */
  $this->c = new Criteria();
    $this->sql = "length(codcat) = length('".$params."')";
    $this->c->add(CpdefnivPeer :: FORPRE, $this->sql, Criteria :: CUSTOM);

  $this->c->addAscendingOrderByColumn(FordefcatprePeer::CODCAT);
    $this->columnas = array (
      FordefcatprePeer :: CODEMP => 'Código',
      FordefcatprePeer :: NOMEMP => 'Nombre'
    );

 }

   public function Ocregcon_Oycval() {
    $this->c = new Criteria();
    $this->c->add(OcregconPeer :: STACON,'N',Criteria::NOT_EQUAL);

    $this->columnas = array (
      OcregconPeer::CODCON => 'Código',
      OcregconPeer::DESCON => 'Descripción'
    );
  }

   public function Ocregcon_Pagemiord() {
    $this->c = new Criteria();
    $this->c->addJoin(CpcomproPeer::CEDRIF,OpbenefiPeer::CEDRIF);
    $this->c->addJoin(OcregconPeer::REFCOM,CpcomproPeer::REFCOM);
    $this->c->add(OcregconPeer :: STACON,'A');

    $this->columnas = array (
      CpcomproPeer::REFCOM => 'Referencia',
      CpcomproPeer::DESCOM  => 'Descripción',
      CpcomproPeer::FECCOM  => 'Fecha',
      CpcomproPeer::CEDRIF  => 'Cédula',
      OpbenefiPeer::NOMBEN  => 'Nombre',
      CpcomproPeer::MONCOM  => 'Monto',
    );
  }

    public function Ocregval_Pagemiord() {
    $this->c = new Criteria();
    $this->c->addJoin(OcregconPeer::CODCON,OcregvalPeer::CODCON);
    $this->c->addJoin(OcregconPeer::REFCOM,CpcomproPeer::REFCOM);
    $this->c->add(OcregconPeer :: STACON,'A');

    $this->columnas = array (
      OcregconPeer::CODCON => 'N° Contrato',
      OcregvalPeer::CODTIPVAL  => 'Tipo Valuación',
      OcregvalPeer::NUMVAL  => 'N° Valuación',
      OcregvalPeer::FECREG  => 'Fecha',
      OcregvalPeer::MONVAL  => 'Monto',
      OcregvalPeer::OBSVAL  => 'Observaciones',
    );
  }

  public function Nomasicarconnom_Npasicarnom($params=array())
  {
      //$sql="select distinct(b.nomcar), a.codcar, b.suecar, b.graocp from npasicarnom a, npcargos b where
      //a.codcar=b.codcar and a.codnom='';";

      $this->c = new Criteria();

      /*$this->c->addSelectColumn('distinct('.NpasicarnomPeer::CODNOM.')');
      $this->c->addSelectColumn(NpasicarnomPeer::CODCAR);
      $this->c->addSelectColumn("'999' AS ID");*/

      $this->c->addJoin(NpcargosPeer::CODCAR, NpasicarnomPeer :: CODCAR);

      if ($params){
      	if (count($params) > 1) {
		  if ($params[1]!="") $this->c->add(NpcargosPeer :: CARVAN, 0,Criteria::GREATER_THAN);
      	}
			$this->c->add(NpasicarnomPeer :: CODNOM, $params[0]);
		}

      $this->columnas = array (
        NpcargosPeer :: CODCAR => 'Código',
        NpcargosPeer :: NOMCAR => 'Cargo',
        NpcargosPeer :: SUECAR => 'Sueldo',
        NpcargosPeer :: GRAOCP => 'Grado',
      );
  }


  public function Bieregactinmd_Bnclafun()
  {
    $this->c = new Criteria();

    $this->columnas = array (
      BnclafunPeer::CODCLA => 'Código',
      BnclafunPeer::DESCLA => 'Descripción'
    );

  }

  public function Biedisactinmlot_Bnmotdis()
  {
    $this->c = new Criteria();

    $this->columnas = array (
      BnmotdisPeer::CODMOT => 'Código',
      BnmotdisPeer::DESMOT => 'Descripción'
    );

  }
////////////////// LICITACIONES ///////////////////

  public function Lidatste_licregsol()
  {
    $this->c = new Criteria();

    $this->columnas = array (
      LidatstePeer::CODUNISTE => 'Código',
      LidatstePeer::DESUNISTE => 'Descripción'
    );
  }

  public function Licomlic_licregsol()
  {
    $this->c = new Criteria();

    $this->columnas = array (
      LicomlicPeer::CODCOM => 'Código',
      LicomlicPeer::DESCOM => 'Descripción'
    );
  }

  public function Lidetcom_licregsol($params=array())
  {
    $this->c = new Criteria();
    $this->c->add(LidetcomPeer::LICOMLIC_ID,$params[0]);
    $this->c->addJoin(LidetcomPeer::CODEMP,NphojintPeer::CODEMP);
    $this->columnas = array (
      NphojintPeer::CODEMP => 'Código',
      NphojintPeer::NOMEMP => 'Nombre y Apellido'
    );
  }

  public function Liregsol_licressol()
  {
    $this->c = new Criteria();

    $this->columnas = array (
      LiregsolPeer::NUMSOL => 'Número Solicitud',
      LiregsolPeer::DESSOL => 'Descripción'
    );
  }

    public function Liemppar_licreglic()
  {
    $this->c = new Criteria();

    $this->columnas = array (
      LireglicPeer::CODLIC => 'Código Licitación',
      LireglicPeer::DESLIC => 'Descripción'
    );
  }

    public function Liemppar_caprovee() {
    $this->c = new Criteria();
    $this->c->add(CaproveePeer::ESTPRO,'A');
    $this->c->addAscendingOrderByColumn(CaproveePeer :: CODPRO);

    $this->columnas = array (
      CaproveePeer :: CODPRO => 'Cod. Empresa',
      CaproveePeer :: NOMPRO => 'Nombre'
    );
  }

  public function Licasplegcriterios_caprovee($param=array())
  {
    $this->c = new Criteria();
    $this->c->add(LiempofePeer::CODLIC, $param[0]);
    $this->c->add(CaproveePeer::ESTPRO,'A');
    $this->c->addJoin(CaproveePeer::CODPRO, LiempofePeer::CODPRO);
    $this->columnas = array (
      CaproveePeer :: CODPRO => 'Cod. Empresa',
      CaproveePeer :: NOMPRO => 'Nombre'
    );
  }

    public function Licomlic_nphojint() {
    $this->c = new Criteria();
    $this->columnas = array (
      NphojintPeer :: CODEMP => 'Código Empleado',
      NphojintPeer :: CEDEMP => 'Cédula',
      NphojintPeer :: NOMEMP => 'Nombre',
      NphojintPeer :: DIRHAB => 'Dirección'
    );
  }
////////////////////////////////////////////////////
  public function Cpdoccom_Almordcom()
  {
    $this->c = new Criteria();

    $this->columnas = array (
      CpdoccomPeer::TIPCOM => 'Código',
      CpdoccomPeer::NOMEXT => 'Descripción'
    );
  }


////////////////Ingresos Inpsasel/////////////////////////////
  public function Ingdefrec_ingruprec() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(IngruprecPeer::CODGRUP);

    $this->columnas = array (
      IngruprecPeer :: CODGRUP => 'Código',
      IngruprecPeer :: DESGRUP => 'Descripción',

    );
  }

  public function Ingregmul_insancion() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(InsancionPeer::CODSAN);

    $this->columnas = array (
      InsancionPeer :: CODSAN => 'Código',
      InsancionPeer :: DESSAN => 'Descripción',

    );
  }

  public function Ingregprof_inespeci() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(InespeciPeer::CODESPECI);

    $this->columnas = array (
      InespeciPeer :: CODESPECI => 'Código',
      InespeciPeer :: DESESPECI => 'Descripción',

    );
  }

    public function Ingregprof_intipemp() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(IntipempPeer::CODTIPEMP);

    $this->columnas = array (
      IntipempPeer :: CODTIPEMP => 'Código',
      IntipempPeer :: DESTIPEMP => 'Descripción',

    );
  }

  public function Ingemifac_inempresa() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(InempresaPeer::RIFEMP);

    $this->columnas = array (
      InempresaPeer :: RIFEMP => 'R.I.F',
      InempresaPeer :: RAZSOC => 'Razón Social',

    );
  }

  public function Ingemifac_inprofes() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(InprofesPeer::CEDPROF);
    $this->c->addAscendingOrderByColumn(InprofesPeer::NOMPROF);
    $this->c->addAscendingOrderByColumn(InprofesPeer::APEPROF);

    $this->columnas = array (
      InprofesPeer :: CEDPROF => 'Cédula',
      InprofesPeer :: NOMPROF => 'Nombre',
      InprofesPeer :: APEPROF => 'Apellido',
    );
  }

  public function Ingemifac_indefban() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(IndefbanPeer::CODBAN);
    $this->c->addAscendingOrderByColumn(IndefbanPeer::DESBAN);

    $this->columnas = array (
      IndefbanPeer :: CODBAN => 'Código',
      IndefbanPeer :: DESBAN => 'Descripción',
    );
  }

  public function Ingingprof_intipsol() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(IntipsolPeer::CODTIPSOL);
    $this->c->addAscendingOrderByColumn(IntipsolPeer::DESTIPSOL);

    $this->columnas = array (
      IntipsolPeer :: CODTIPSOL => 'Código',
      IntipsolPeer :: DESTIPSOL => 'Descripción',
    );
  }

  public function Ingemifac_inmulta() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(InmultaPeer::CODMUL);
    $this->c->addAscendingOrderByColumn(InmultaPeer::DESMUL);

    $this->columnas = array (
      InmultaPeer :: CODMUL => 'Código',
      InmultaPeer :: DESMUL => 'Descripción',
    );
  }

   public function Ingemifac_iningprof() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(IningprofPeer::CODINGPROF);
    $this->c->addAscendingOrderByColumn(IningprofPeer::DESINGPROF);

    $this->columnas = array (
      IningprofPeer :: CODINGPROF => 'Código',
      IningprofPeer :: DESINGPROF => 'Descripción',
    );
  }

    public function Cideftit_Ingtrasla($mascara) {
    $mask = $mascara[0];
    $this->c = new Criteria();
    $this->sql = "length(Codpre) = '" . $mask . "'";
    $this->c->add(CideftitPeer :: CODPRE, $this->sql, Criteria :: CUSTOM);

    $this->columnas = array (
      CideftitPeer :: CODPRE => 'Código',
      CideftitPeer :: NOMPRE => 'Descripción',
    );
  }

    public function Ingtitpre_contabb() {
    $this->c = new Criteria();
    $this->c->add(ContabbPeer::CARGAB,'C');
    $this->c->addAscendingOrderByColumn(ContabbPeer::CODCTA);
    $this->c->addAscendingOrderByColumn(ContabbPeer::DESCTA);

    $this->columnas = array (
      ContabbPeer :: CODCTA => 'Código',
      ContabbPeer :: DESCTA => 'Descripción',
    );
  }

    public function Ingadidis_cideftit($mask=array())
    {
    $this->c = new Criteria();
    $this->sql = "length(Cideftit.Codpre) = '" . $mask[0] . "'";
    $this->c->add(CideftitPeer :: CODPRE, $this->sql, Criteria :: CUSTOM);
    $this->c->addAscendingOrderByColumn(CideftitPeer::CODPRE);
    $this->c->addAscendingOrderByColumn(CideftitPeer::NOMPRE);

    $this->columnas = array (
      CideftitPeer :: CODPRE => 'Código',
      CideftitPeer :: NOMPRE => 'Nombre',
    );
    }


    public function Ingreging_ciconrep() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(CiconrepPeer::RIFCON);
    $this->c->addAscendingOrderByColumn(CiconrepPeer::NOMCON);

    $this->columnas = array (
      CiconrepPeer :: RIFCON => 'C.I/R.I.F',
      CiconrepPeer :: NOMCON => 'Nombre',
    );
  }

    public function Ingreging_citiping() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(CitipingPeer::CODTIP);
    $this->c->addAscendingOrderByColumn(CitipingPeer::DESTIP);

    $this->columnas = array (
      CitipingPeer :: CODTIP => 'Código',
      CitipingPeer :: DESTIP => 'Descripción',
    );
  }

   public function Ingtrasla_cideftit($mask)
   {
    $this->c = new Criteria();
    $this->sql = "length(Cideftit.Codpre) = '" . $mask[0] . "'";
    $this->c->add(CideftitPeer :: CODPRE, $this->sql, Criteria :: CUSTOM);
    $this->c->add(CiasiiniPeer::PERPRE,'00');
    $this->c->addJoin(CideftitPeer::CODPRE,CiasiiniPeer::CODPRE);

    $this->columnas = array (
      CideftitPeer :: CODPRE => 'Código',
      CideftitPeer :: NOMPRE => 'Nombre',
    );
  }

  public function Ingreging_cideftit($mask) {
    $this->c = new Criteria();
    $this->sql = "length(Cideftit.Codpre) = '" . $mask[0] . "'";
    $this->c->add(CideftitPeer :: CODPRE, $this->sql, Criteria :: CUSTOM);
    //$this->c->add(CiasiiniPeer::PERPRE,'00');
    //$this->c->addJoin(CideftitPeer::CODPRE,CiasiiniPeer::CODPRE);

    $this->columnas = array (
      CideftitPeer :: CODPRE => 'Código',
      CideftitPeer :: NOMPRE => 'Nombre',
    );
  }

    public function Ingajustenew_cideftit($mask) {


    $this->c = new Criteria();
    $this->sql = "length(Cideftit.Codpre) = '" . $mask[0] . "'";
    $this->c->add(CideftitPeer :: CODPRE, $this->sql, Criteria :: CUSTOM);
    $this->c->add(CiasiiniPeer::PERPRE,'00');
    $this->c->addJoin(CideftitPeer::CODPRE,CiasiiniPeer::CODPRE);

    $this->columnas = array (
      CideftitPeer :: CODPRE => 'Código',
      CideftitPeer :: NOMPRE => 'Nombre',
    );
  }


    public function Ingreging_tsdefban() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(TsdefbanPeer::NUMCUE);
    $this->c->addAscendingOrderByColumn(TsdefbanPeer::NOMCUE);

    $this->columnas = array (
      TsdefbanPeer :: NUMCUE => 'Número',
      TsdefbanPeer :: NOMCUE => 'Nombre',
    );
  }

    public function Ingreging_tstipmov() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(TstipmovPeer::CODTIP);
    $this->c->addAscendingOrderByColumn(TstipmovPeer::DESTIP);
    $this->c->add(TstipmovPeer::DEBCRE,'D');

    $this->columnas = array (
      TstipmovPeer :: CODTIP => 'Código',
      TstipmovPeer :: DESTIP => 'Descripción',
    );
  }


    public function Ingreging_citiprub() {
      $this->c = new Criteria();
      $this->c->addAscendingOrderByColumn(CitiprubPeer::CODTIPRUB);

      $this->columnas = array (
        CitiprubPeer :: CODTIPRUB => 'Código',
        CitiprubPeer :: DESTIPRUB => 'Descripción',
      );
    }

   public function Contabb_ConFinCue() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(ContabbPeer::CODCTA);

    $this->columnas = array (
      ContabbPeer :: CODCTA => 'Código',
      ContabbPeer :: DESCTA => 'Descripción',
    );
  }


   public function Npnomesptipos_Nomespcalculo() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(NpnomesptiposPeer::CODNOMESP);

    $this->columnas = array (
      NpnomesptiposPeer :: CODNOMESP => 'Código',
      NpnomesptiposPeer :: DESNOMESP => 'Descripción',
    );
  }


   public function Npnomespnomtip_Nomespcalculo($params) {
    $this->c = new Criteria();
    $this->c->add(NpnomespnomtipPeer :: CODNOMESP, $params[0]);
    $this->c->addJoin(NpnomespnomtipPeer::CODNOMESP, NpnomesptiposPeer :: CODNOMESP);
    $this->c->addJoin(NpnomespnomtipPeer::CODNOM, NpnominaPeer :: CODNOM);
    $this->c->addAscendingOrderByColumn(NpnominaPeer::NOMNOM);

    $this->columnas = array (
      NpnomespnomtipPeer :: CODNOM => 'Cód Nomina',
      NpnominaPeer :: NOMNOM => 'Tipo/Nómina',

    );
  }


   public function Ingajustenew_cireging() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(CiregingPeer::REFING);
    $this->c->addAscendingOrderByColumn(CiregingPeer::DESING);

    $this->columnas = array (
      CiregingPeer :: REFING => 'Referencia',
      CiregingPeer :: DESING => 'Descripción',
    );
  }


  public function Npdefcpt_Nomespconceptos()
  {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(NpdefcptPeer::CODCON);

    $this->columnas = array (
      NpdefcptPeer :: CODCON => 'Cód Concepto',
      NpdefcptPeer :: NOMCON => 'Descripción',

    );

  }


  public function Npnomina_Nomespdefinicion()
  {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(NpnominaPeer::CODNOM);

    $this->columnas = array (
      NpnominaPeer :: CODNOM => 'Cód Nómina',
      NpnominaPeer :: NOMNOM => 'Descripción',

    );

  }


  public function Caregart_Faproalt() {
    $mascaraarticulo = Herramientas::getMascaraArticulo();
    $longitud = strlen($mascaraarticulo);
    $this->c = new Criteria();
    $this->c->add(CaregartPeer :: TIPO, 'A');
    $this->sql = "length(Codart) = '" . $longitud . "'";
    $this->c->add(CaregartPeer :: CODART, $this->sql, Criteria :: CUSTOM);

    $this->columnas = array (
      CaregartPeer :: CODART => 'Código',
      CaregartPeer :: DESART => 'Descripción',
    );
  }

  public function Fadescto_Fadtocte()
  {
    $this->c = new Criteria();

    $this->columnas = array (
      FadesctoPeer::CODDESC => 'Código',
      FadesctoPeer::DESDESC => 'Descripción',
      FadesctoPeer::MONDESC => 'Monto'
    );

  }

  public function Contabb_Fatipmov()
  {
    $this->c= new Criteria();
    $this->c->add(ContabbPeer::CARGAB,'C');
    $this->c->addAscendingOrderByColumn(ContabbPeer::CODCTA);

    $this->columnas = array (ContabbPeer::CODCTA => 'Cuenta', ContabbPeer::DESCTA => 'Descripción');
  }

  public function Contabb_Facliente()
  {
    $this->c= new Criteria();
    $this->c->add(ContabbPeer::CARGAB,'C');
    $this->c->addAscendingOrderByColumn(ContabbPeer::CODCTA);

    $this->columnas = array (ContabbPeer::CODCTA => 'Cuenta', ContabbPeer::DESCTA => 'Descripción');
  }

  public function Contabb_Farecarg()
  {
    $this->c= new Criteria();
    $this->c->add(ContabbPeer::CARGAB,'C');
    $this->c->addAscendingOrderByColumn(ContabbPeer::CODCTA);

    $this->columnas = array (ContabbPeer::CODCTA => 'Cuenta', ContabbPeer::DESCTA => 'Descripción');
  }

  public function Contabb_Fadefart()
  {
    $this->c= new Criteria();
    $this->c->add(ContabbPeer::CARGAB,'C');
    $this->c->addAscendingOrderByColumn(ContabbPeer::CODCTA);

    $this->columnas = array (ContabbPeer::CODCTA => 'Cuenta', ContabbPeer::DESCTA => 'Descripción');
  }

  public function Farecarg_Farecart()
  {
    $this->c = new Criteria();

    $this->columnas = array (
      FarecargPeer::CODRGO => 'Código',
      FarecargPeer::NOMRGO => 'Descripción',
    );

  }
  public function Rifcli_Fapedido()
  {
    $this->c = new Criteria();

    $this->columnas = array (
      FaclientePeer::RIFPRO => 'CI/RIF',
      FaclientePeer::NOMPRO => 'Descripción',
      FaclientePeer::CODPRO => 'Código',
    );
  }

  public function Fapresup_Fapedido()
  {
    $this->c = new Criteria();
    $this->sql = "refpre not in (select refped from fapedido where refped=refpre and tipref='PR')";
    $this->c->add(FapresupPeer::REFPRE,$this->sql,Criteria :: CUSTOM);

    $this->columnas = array (
      FapresupPeer::REFPRE => 'Número',
      FapresupPeer::DESPRE => 'Descripción',
      FapresupPeer::FECPRE => 'Fecha',
    );
  }

  public function Fapedido_Fanotent()
  {
    $this->c = new Criteria();
    $this->sql = "fapedido.status <> 'N' and fapedido.NROPED not in (select faartfac.codref from faartfac where faartfac.codref = fapedido.nroped and faartfac.reffac in (select fafactur.reffac from fafactur where fafactur.reffac = faartfac.reffac and fafactur.tipref = 'P' and fafactur.status <> 'N'))";
    $this->c->add(FapedidoPeer::NROPED,$this->sql,Criteria :: CUSTOM);

      $this->columnas = array (
      FapedidoPeer::NROPED => 'Número',
      FapedidoPeer::DESPED => 'Descripción',
      FapedidoPeer::FECPED => 'Fecha',
    );
  }

  public function Faajuste_Fanotent()
  {
    $this->c = new Criteria();
    $this->c->add(FanotentPeer::STATUS,'N', Criteria :: NOT_EQUAL);

      $this->columnas = array (
      FanotentPeer::NRONOT => 'Número',
      FanotentPeer::DESNOT => 'Descripción',
      FanotentPeer::FECNOT => 'Fecha',
    );
  }

  public function Factura_Fanotent()
  {
    $this->c = new Criteria();
    $this->c->add(FafacturPeer::STATUS, 'N', Criteria::NOT_EQUAL);
    $this->c->add(FafacturPeer::TIPREF, 'D', Criteria::NOT_EQUAL);

    $this->columnas = array (
      FafacturPeer::REFFAC => 'Número',
      FafacturPeer::DESFAC => 'Descripción',
      FafacturPeer::FECFAC => 'Fecha',
    );
  }

  public function Fadevolu_Cadphart()
  {
    $this->c = new Criteria();

    $this->columnas = array (
      CadphartPeer::DPHART => 'Número',
      CadphartPeer::DESDPH => 'Descripción',
      CadphartPeer::FECDPH => 'Fecha',
    );
  }

  public function Caregart_Fapedido($params=array())
  {
    $longitud=$params[0];
    $this->c= new Criteria();
    $this->sql = "length(Codart) = '".$longitud."'";
    $this->c->add(CaregartPeer::CODART, $this->sql, Criteria::CUSTOM);

    $this->columnas = array (CaregartPeer::CODART => 'Código', CaregartPeer::DESART => 'Descripción', CaregartPeer::COSULT => 'Costo', CaregartPeer::CODPAR => 'Partida');

  }

  public function Fadefcom_Fapedido()
  {
    $this->c = new Criteria();

    $this->columnas = array (
      FadefcomPeer::CODCOM => 'Código',
      FadefcomPeer::NOMCOM => 'Nombre',
    );
  }

  public function Faartpvp_Fapresup($params=array())
  {
    $this->c = new Criteria();
  $this->c->add(FaartpvpPeer::CODART,$params[0]);
  $this->c->addAscendingOrderByColumn(FaartpvpPeer::DESPVP);
    $this->columnas = array (
      FaartpvpPeer::DESPVP => 'Descripción',
      FaartpvpPeer::PVPART => 'Precio',
    );
  }

  public function Codconpag_Fafactur($params=array())
  {
    $this->c = new Criteria();
    if ($params[0]=="nuevo")
    { $this->c->add(FaconpagPeer::TIPCONPAG,'R',Criteria::NOT_EQUAL);}

    $this->columnas = array (
      FaconpagPeer::DESCONPAG => 'Descripción',
    );
  }

  public function Fadefart_Fadefcaj()
  {
    $this->c = new Criteria();

    $this->columnas = array (
      FadefcajPeer::DESCAJ => 'Descripción',
    );
  }

  public function Nomdefespcestic_Npnomina()
  {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(NpnominaPeer::CODNOM);

    $this->columnas = array (
      NpnominaPeer::CODNOM => 'Código',
      NpnominaPeer::NOMNOM => 'Descripción',
    );
  }

  public function Nomdefespcestic_Npdefcpt($param='')
  {
    $this->c = new Criteria();
    $this->c->add(NpasiconnomPeer::CODNOM,$param[0]);
    $this->c->addJoin(NpdefcptPeer::CODCON,NpasiconnomPeer::CODCON);
  $this->c->addAscendingOrderByColumn(NpdefcptPeer::CODCON);

    $this->columnas = array (
      NpdefcptPeer::CODCON => 'Código',
      NpdefcptPeer::NOMCON => 'Descripción',
    );
  }

  public function Caordcom_Aciayudas($params = array ()) {

    $this->c = new Criteria();

    $this->columnas = array (
      CaordcomPeer :: ORDCOM => 'Código',
      CaordcomPeer :: FECORD => 'Fecha',
      CaordcomPeer :: DESORD => 'Descripción'
    );
  }


  public function Fatippag_Fafactur()
  {
    $this->c = new Criteria();

    $this->columnas = array (
      FatippagPeer::DESTIPPAG => 'Nombre',
    );
  }

  public function Fabancos_Fafactur()
  {
    $this->c = new Criteria();
    $this->c->setDistinct();

    $this->columnas = array (
      FaallbancosPeer::BANCO => 'Banco',
      FaallbancosPeer::CTABAN => 'Cuenta',
    );

  }

  public function Cadescto_Fafactur()
  {
    $this->c = new Criteria();

    $this->columnas = array (
      FadesctoPeer::CODDESC => 'Código',
      FadesctoPeer::DESDESC => 'Descripción',
      FadesctoPeer::MONDESC => 'Monto',
      FadesctoPeer::TIPDESC => 'Tipo',
      FadesctoPeer::TIPRET => 'Tipo de Retencion'
    );
  }

  public function Farecarg_Fafactur()
  {
    $this->c = new Criteria();

    $this->columnas = array (
      FarecargPeer::CODRGO => 'Código',
      FarecargPeer::NOMRGO => 'Descripción',
      FarecargPeer::TIPRGO => 'Tipo',
      FarecargPeer::MONRGO => 'Monto'
    );
  }

  public function modalidadcestaticketempleados_Npnomina()
  {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(NpnominaPeer::CODNOM);

    $this->columnas = array (
      NpnominaPeer::CODNOM => 'Código',
      NpnominaPeer::NOMNOM => 'Descripción',
    );
  }


  public function Viaregtiptab_Viaregtiptab()
  {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(ViaregtiptabPeer::DESTIPTAB);

    $this->columnas = array (
      ViaregtiptabPeer::DESTIPTAB => 'Descripción'
    );
  }

  ///////////////////Cuentas por Cobrar/////////////////////////////
  public function Rifcli_Cobdocume()
  {
    $this->c = new Criteria();

    $this->columnas = array (
      FaclientePeer::CODPRO => 'Código',
      FaclientePeer::NOMPRO => 'Nombre',
      FaclientePeer::RIFPRO => 'CI/RIF',
    );
  }

  public function Ocpais($param= array())
  {
    $this->c = new Criteria();

    $this->columnas = array (
      OcpaisPeer::CODPAI => 'Código',
      OcpaisPeer::NOMPAI => 'Descripcion',
    );
  }

  public function Ocestado($param= array())
  {
    $this->c = new Criteria();
    $this->c->add(OcestadoPeer::CODPAI,$param[0]);

    $this->columnas = array (
      OcestadoPeer::CODEDO => 'Código',
      OcestadoPeer::NOMEDO => 'Descripcion',
    );
  }

  public function Occiudad($param= array())
  {
    $this->c = new Criteria();
    $this->c->add(OcciudadPeer::CODPAI,$param[1]);
    $this->c->add(OcciudadPeer::CODEDO,$param[0]);

    $this->columnas = array (
      OcciudadPeer::CODCIU => 'Código',
      OcciudadPeer::NOMCIU => 'Descripcion',
    );
  }

  public function Viaregsolvia_Nphojint($param= array())
  {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(NphojintPeer::CODEMP);

    $this->columnas = array (
      NphojintPeer::CODEMP => 'Cedula',
      NphojintPeer::NOMEMP => 'Nombre',
    );
  }

  public function Viaregsolvia_Viaregente($param= array())
  {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(ViaregentePeer::CEDRIF);

    $this->columnas = array (
      ViaregentePeer::CEDRIF => 'Cedula/RIF',
      ViaregentePeer::DESENTE => 'Descripcion',
      ViaregentePeer::NACENT => 'Nacionalidad',
    );
  }

  public function Viaregsolvia_Viaregact($param= array())
  {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(ViaregactPeer::DESACT);

    $this->columnas = array (
      ViaregactPeer::DESACT => 'Descripcion'
    );
  }

  public function Forcfgrepins_instruc($param= array())
  {
    $tipo = $param[0];
    if($tipo=="cpdeftit")
    {

        $inicio=strlen(Herramientas::getMascaraCategoria())+2;
        $fin=strlen(Herramientas::formatoPresupuesto());
        $this->c= new Criteria();
        $this->c->addSelectColumn(' SUBSTR('.CpdeftitPeer::CODPRE.','.$inicio.','.$fin.') as CODPRE');
        $this->c->addSelectColumn(CpdeftitPeer::NOMPRE);
        $this->c->addSelectColumn(CpdeftitPeer::CODCTA);
        $this->c->addSelectColumn(CpdeftitPeer::STACOD);
        $this->c->addSelectColumn(CpdeftitPeer::CODUNI);
        $this->c->addSelectColumn(CpdeftitPeer::ESTATUS);
        $this->c->addSelectColumn(CpdeftitPeer::CODTIP);
        $this->c->addSelectColumn(CpdeftitPeer::ID);
        $this->sql = "trim(substr(codpre,$inicio,$fin))!=''";
        $this->c->add(CpdeftitPeer::CODPRE, $this->sql, Criteria::CUSTOM);
        $this->c->addAscendingOrderByColumn(CpdeftitPeer::CODPRE);

      $this->columnas = array (
        CpdeftitPeer::CODPRE=> 'Codigo Partida',
        CpdeftitPeer::NOMPRE => 'Nombre Partida',
      );
    }elseif($tipo=="cideftit")
    {
      $this->c = new Criteria();
      $this->c->addAscendingOrderByColumn(CideftitPeer::CODPRE);

      $this->columnas = array (
        CideftitPeer::CODPRE=> 'Codigo Ingreso',
        CideftitPeer::NOMPRE => 'Nombre Ingreso',
      );
    }elseif($tipo=="contabb")
    {
      $this->c = new Criteria();
      $this->c->addAscendingOrderByColumn(ContabbPeer::CODCTA);

      $this->columnas = array (
        ContabbPeer::CODCTA=> 'Codigo Cuenta',
        ContabbPeer::DESCTA => 'Nombre Cuenta',
      );
    }else
    {
      $this->columnas = array (
      ''=> 'Codigo Cuenta',
       '' => 'Nombre Cuenta',
      );
    }


  }
    public function Fcdefdesc_carecaud()
    {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(CarecaudPeer::CODREC);
    $this->c->addAscendingOrderByColumn(CarecaudPeer::DESREC);

    $this->columnas = array (
      CarecaudPeer :: CODREC => 'Código',
      CarecaudPeer :: DESREC => 'Nombre',
    );
  }

    public function Viaregsolvia_Cpdeftit($params=array())
    {
    $this->c = new Criteria();
    $long = strlen($params[0]);
    $this->sql = "length(codpre) = '" . $long. "'";
    $this->c->add(CpdeftitPeer :: CODPRE, $this->sql, Criteria :: CUSTOM);
    $this->c->addAscendingOrderByColumn(CpdeftitPeer::CODPRE);

    $this->columnas = array (
      CpdeftitPeer::CODPRE => 'Código',
      CpdeftitPeer::NOMPRE => 'Descripción',
    );
  }


   public function Viadettabcar_Npcargos()
   {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(NpcargosPeer::CODCAR);

    $this->columnas = array (
      NpcargosPeer::CODCAR => 'Código',
      NpcargosPeer::NOMCAR => 'Descripción',
    );
  }


  public function Viaregsolvia_Cpdoccom()
  {
      $this->c = new Criteria();
      $this->c->addAscendingOrderByColumn(CpdoccomPeer::TIPCOM);
      $this->columnas = array (
      CpdoccomPeer :: TIPCOM => 'Código',
      CpdoccomPeer :: NOMEXT => 'Descripción',
    );
  }

    public function Facdefsol_fcfuepre()
    {
      $this->c = new Criteria();
      $this->c->addAscendingOrderByColumn(FcfueprePeer::CODFUE);
      $this->c->addAscendingOrderByColumn(FcfueprePeer::NOMFUE);
      $this->columnas = array (
      FcfueprePeer :: CODFUE => 'Código',
      FcfueprePeer :: NOMFUE => 'Descripción',
    );
  }

  public function Caprovee_Almordcom($param= array())
  {
    if (count($param)==0)
    {
      $this->c = new Criteria();
      $this->c->add(CaproveePeer::ESTPRO,'A');

      $this->columnas = array (
      CaproveePeer::RIFPRO => 'Rif',
      CaproveePeer::NOMPRO => 'Descripción',
      CaproveePeer::CODPRO => 'Codigo',
    );
    }
    else
    {
        $sql = "select a.refsol, a.codpro, b.priori from cacotiza a inner join cadetcot b on a.refcot=b.refcot where b.priori=1 and a.refsol='".$param[0]."'
                group by a.refsol, a.codpro, b.priori";
      if (Herramientas::BuscarDatos($sql,&$result))
      {
           $this->c = new Criteria();
           $this->c->add(CacotizaPeer::REFSOL,$param[0]);
           $this->c->add(CadetcotPeer::PRIORI,1);
           $this->c->add(CaproveePeer::ESTPRO,'A');
           $this->c->addJoin(CacotizaPeer::REFCOT,CadetcotPeer::REFCOT);
           $this->c->addJoin(CaproveePeer::CODPRO,CacotizaPeer::CODPRO);
           $this->c->setDistinct();
           $this->columnas = array (
   	    	 CaproveePeer::RIFPRO => 'Rif',
        	 CaproveePeer::NOMPRO => 'Descripción',
        	 CaproveePeer::CODPRO => 'Codigo',
        );

      }
      else
      {
        $this->c = new Criteria();
		$this->c->add(CaproveePeer::ESTPRO,'A');

          $this->columnas = array (
        	CaproveePeer::RIFPRO => 'Rif',
        	CaproveePeer::NOMPRO => 'Descripción',
        	CaproveePeer::CODPRO => 'Codigo',
        );
      }
    }
  }

  public function Facrecliq_fcfuepre()
  {
      $this->c = new Criteria();
      $this->c->addAscendingOrderByColumn(FcfueprePeer::CODFUE);
      $this->c->addAscendingOrderByColumn(FcfueprePeer::NOMFUE);
      $this->columnas = array (
      FcfueprePeer :: CODFUE => 'Código',
      FcfueprePeer :: NOMFUE => 'Descripción',
    );
  }

  public function Facmultas_fcfuepre_fcdefins()
  {
    /*"Select " .""
    "A.NomFue as Descripcion, " .
    "A.CodFue as Codigo " .
    "From " .
    "FCFuePre A, " .
    "FCDefIns B " .
    "WHERE " .
    "A.CODFUE=B.CODPIC OR " .
    "A.CODFUE=B.CODVEH OR " .
    "A.CODFUE=B.CODINM OR " .
    "A.CODFUE=B.CODPRO OR " .
    "A.CODFUE=B.CODESP OR " .
    "A.CODFUE=B.CODAPU OR " .
    "A.CODFUE=B.CODAJUPIC " .
    "Order By " .
    "A.CodFue"*/
     $sql="Select * from fcdefins";
     if (Herramientas::BuscarDatos($sql,&$result))
    {
      $this->c= new Criteria();
      $this->sqlnew = "CODFUE='".$result[0]["codpic"]."' OR CODFUE='".$result[0]["codveh"]."' OR CODFUE='".$result[0]["codinm"]."' OR CODFUE='".$result[0]["codpro"]."' OR CODFUE='".$result[0]["codesp"]."' OR CODFUE='".$result[0]["codapu"]."'  OR CODFUE='".$result[0]["codajupic"]."'";
      $this->c->add(FcfueprePeer::CODFUE, $this->sqlnew, Criteria :: CUSTOM);
      $this->c->addAscendingOrderByColumn(FcfueprePeer::CODFUE);
      $this->columnas = array (
      FcfueprePeer::CODFUE => 'Código',
      FcfueprePeer::NOMFUE => 'Descripción'
        );
    }
    else
    { $this->c= new Criteria();
      $this->columnas = array (
      FcfueprePeer::CODFUE => 'Código',
      FcfueprePeer::NOMFUE => 'Descripción'
        );
    }
  }

  public function Facdefespins_fcdefins()
  {
      $this->c = new Criteria();
      $this->c->addAscendingOrderByColumn(FcfueprePeer::CODFUE);
      $this->c->addAscendingOrderByColumn(FcfueprePeer::NOMFUE);
      $this->columnas = array (
      FcfueprePeer :: CODFUE => 'Código',
      FcfueprePeer :: NOMFUE => 'Descripción',
    );
  }

  public function Facfueing_Ingrec()
  {
      $this->c = new Criteria();
      $this->c->add(ContabbPeer::CARGAB,'C',Criteria::EQUAL);
      $this->c->addAscendingOrderByColumn(ContabbPeer::CODCTA);
      $this->c->addAscendingOrderByColumn(ContabbPeer::DESCTA);
      $this->columnas = array (
      ContabbPeer :: CODCTA => 'Código',
      ContabbPeer :: DESCTA => 'Descripción',
    );
  }

  public function Facfueing_Codprei()
  {
     /*sql = "Select NomParIng as Descripcion,CodParIng as Codigo From ForDefParIng Order By CodParIng"*/
      $this->c = new Criteria();
      $this->c->addAscendingOrderByColumn(FordefparingPeer::CODPARING);
      $this->c->addAscendingOrderByColumn(FordefparingPeer::NOMPARING);
      $this->columnas = array (
      FordefparingPeer :: CODPARING => 'Código',
      FordefparingPeer :: NOMPARING => 'Descripción',
    );
  }

  public function Facfueing_Fueing()
  {
 /* Select
DISTINCT(A.desrede) as Descripción,
A.CODREDE as Código,
B.dias as Dias,
B.porcien as Porcentaje
from
FCRECDES A,
FCRECDESG B,
FCFUEPRE C
WHERE
A.CODREDE=B.CODREDE AND
C.CODFUE=A.CODFUE  AND
C.CODFUE='01'
ORDER BY
A.CODREDE"
  */


      $this->c = new Criteria();
      $this->c->addSelectColumn('distinct('.FcrecdesPeer::DESREDE.')');
      $this->c->addJoin(FcrecdesPeer::CODREDE,FcrecdesgPeer::CODREDE);
      $this->c->addJoin(FcrecdesPeer::CODFUE,FcfueprePeer::CODFUE);
      $this->c->addAscendingOrderByColumn(FcrecdesPeer::CODREDE);
      $this->c->addAscendingOrderByColumn(FcrecdesPeer::DESREDE);
      $this->columnas = array (
      FcrecdesPeer :: CODREDE => 'Código',
      FcrecdesPeer :: DESREDE => 'Descripción',
    );
  }


  public function Predisfuefinmov_Cpprecom()
  {
    $this->c = new Criteria();
    $this->c->add(CpprecomPeer::STAPRC,'A');

    $this->columnas = array (
      CpprecomPeer :: REFPRC => 'Código',
      CpprecomPeer :: DESPRC => 'Descripción',
      CpprecomPeer :: TIPPRC => 'Tipo',
      CpprecomPeer :: FECPRC => 'Fecha'
    );

  }

  public function Predisfuefinmov_Cpcompro()
  {
    $this->c = new Criteria();
    $this->c->addJoin(CpcomproPeer::TIPCOM,CpdoccomPeer::TIPCOM);
    $this->c->add(CpdoccomPeer::REFPRC,'N');
    $this->c->add(CpdoccomPeer::AFEDIS,'N',Criteria::NOT_EQUAL);
    $this->c->add(CpcomproPeer::STACOM,'A');

    $this->columnas = array (
      CpcomproPeer :: REFCOM => 'Código',
      CpcomproPeer :: DESCOM => 'Descripción',
      CpcomproPeer :: TIPCOM => 'Tipo',
      CpcomproPeer :: FECCOM => 'Fecha'
    );

  }

  public function Predisfuefinmov_Cpcausad()
  {
    $this->c = new Criteria();
    $this->c->addJoin(CpcausadPeer::TIPCAU,CpdoccauPeer::TIPCAU);
    $this->c->add(CpdoccauPeer::REFIER,'N');
    $this->c->add(CpdoccauPeer::AFEDIS,'N',Criteria::NOT_EQUAL);
    $this->c->add(CpcausadPeer::STACAU,'A');

    $this->columnas = array (
      CpcausadPeer :: REFCAU => 'Código',
      CpcausadPeer :: DESCAU => 'Descripción',
      CpcausadPeer :: TIPCAU=> 'Tipo',
      CpcausadPeer :: FECCAU => 'Fecha'
    );

  }

  public function Predisfuefinmov_Cppagos()
  {
    $this->c = new Criteria();
    $this->c->addJoin(CppagosPeer::TIPPAG,CpdocpagPeer::TIPPAG);
    $this->c->add(CpdocpagPeer::REFIER,'N');
    $this->c->add(CpdocpagPeer::AFEDIS,'N',Criteria::NOT_EQUAL);
    $this->c->add(CppagosPeer::STAPAG,'A');
    //$opc1=$this->c->getNewCriterion(CppagosPeer::REFCAU,'');
    //$opc2=$this->c->getNewCriterion(CppagosPeer::REFCAU,'NULO');
    //$opc1->addOr($opc2);
    //$this->c->add($opc1);

    $this->columnas = array (
      CppagosPeer :: REFPAG => 'Código',
      CppagosPeer :: DESPAG => 'Descripción',
      CppagosPeer :: TIPPAG => 'Tipo',
      CppagosPeer :: FECPAG => 'Fecha'
    );

  }

  public function Predisfuefinmov_Cpadidis()
  {
    $this->c = new Criteria();
    $this->c->add(CpadidisPeer::STAADI,'A');

    $this->columnas = array (
      CpadidisPeer :: REFADI => 'Código',
      CpadidisPeer :: DESADI => 'Descripción',
      CpadidisPeer :: ADIDIS => 'Tipo (A/D)',
      CpadidisPeer :: FECADI => 'Fecha'
    );

  }

  public function Predisfuefinmov_Cpsoltrasla()
  {
    $this->c = new Criteria();
    $this->c->add(CpsoltraslaPeer::STATRA,'A');

//Muestra el Documento siempre y cuando este aprobado o en proceso = null
    $opc1=$this->c->getNewCriterion(CpsoltraslaPeer::STACON,null);
    $opc2=$this->c->getNewCriterion(CpsoltraslaPeer::STACON,'N',Criteria::NOT_EQUAL);
    $opc1->addOr($opc2);
    $this->c->add($opc1);

    $opc1=$this->c->getNewCriterion(CpsoltraslaPeer::STAPRE,null);
    $opc2=$this->c->getNewCriterion(CpsoltraslaPeer::STAPRE,'N',Criteria::NOT_EQUAL);
    $opc1->addOr($opc2);
    $this->c->add($opc1);

    $opc1=$this->c->getNewCriterion(CpsoltraslaPeer::STAGOB,null);
    $opc2=$this->c->getNewCriterion(CpsoltraslaPeer::STAGOB,'N',Criteria::NOT_EQUAL);
    $opc1->addOr($opc2);
    $this->c->add($opc1);

    $opc4=$this->c->getNewCriterion(CpsoltraslaPeer::STANIV4,null);
    $opc44=$this->c->getNewCriterion(CpsoltraslaPeer::STANIV4,'N',Criteria::NOT_EQUAL);
    $opc4->addOr($opc44);
    $this->c->add($opc4);

    $opc5=$this->c->getNewCriterion(CpsoltraslaPeer::STANIV5,null);
    $opc55=$this->c->getNewCriterion(CpsoltraslaPeer::STANIV5,'N',Criteria::NOT_EQUAL);
    $opc5->addOr($opc55);
    $this->c->add($opc5);

    $opc6=$this->c->getNewCriterion(CpsoltraslaPeer::STANIV6,null);
    $opc66=$this->c->getNewCriterion(CpsoltraslaPeer::STANIV6,'N',Criteria::NOT_EQUAL);
    $opc6->addOr($opc66);
    $this->c->add($opc6);

    $this->columnas = array (
      CpsoltraslaPeer :: REFTRA => 'Código',
      CpsoltraslaPeer :: DESTRA => 'Descripción',
      CpsoltraslaPeer :: FECTRA => 'Fecha'
    );

  }

   public function Opdefemp_tsdefban() {
    $this->c = new Criteria();

    $this->columnas = array (
      TsdefbanPeer :: NUMCUE => 'Número',
      TsdefbanPeer :: NOMCUE => 'Descripción',
    );
  }

  public function Facpicsollic_FCRegInm()
  {
    $this->c = new Criteria();
    $this->columnas = array (
      FcreginmPeer :: CODCATINM => 'Código Catastral',
      FcreginmPeer :: NOMCON => 'Descripción',
    );

  }

  public function Facpicsollic_Fcrutas()
  {
    $this->c = new Criteria();
    $this->columnas = array (
      FcrutasPeer :: CODRUT => 'Código',
      FcrutasPeer :: DESRUT => 'Descripción',
    );

  }


  public function Facpicsollic_Fcactcom()
  {
    //sql = "Select a.DesAct as Descripcion, a.CodAct as Codigo_Actividad, case2(a.Exoner,'S','SI','NO') as Exonerable from FCACTCOM a,FCDEFINS b Where Length(RTRIM(a.CodAct)) = Length(RTRIM(b.ForAct)) order by a.DesAct"
    $this->c= new Criteria();
    $this->sql = "length(rtrim(fcactcom.codact)) = length(rtrim(fcdefins.foract))";
    $this->c->add(FcdefinsPeer::FORACT, $this->sql, Criteria::CUSTOM);
    $this->columnas = array (
        FcactcomPeer::CODACT => 'Código Actividad',
        FcactcomPeer::DESACT => 'Descripción',
        FcactcomPeer::EXONER => 'Exonerado'
    );
  }

    public function Tsmotanu_Pagemiord() {
    $this->c = new Criteria();

      $this->columnas = array (
      TsmotanuPeer :: CODMOTANU => 'Codigo',
      TsmotanuPeer :: DESMOTANU => 'Descripcion'
    );

  }

  public function Cpcompro_PreAjuste($params= array())
  {
    $this->c = new Criteria();
    $this->c->add(CpcomproPeer::STACOM,'A');
    $this->sql = "feccom <= to_date('$params[0]','dd/mm/yyyy')";
    $this->c->add(CpcomproPeer::FECCOM, $this->sql, Criteria::CUSTOM);
    $this->sql = "(moncom-salaju-salcau) > 0";
    $this->c->add(CpcomproPeer::MONCOM, $this->sql, Criteria::CUSTOM);
    $this->c->addAscendingOrderByColumn(CpcomproPeer :: REFCOM);


    $this->columnas = array (
      CpcomproPeer :: REFCOM => 'Referencia',
      CpcomproPeer :: FECCOM => 'Fecha',
      CpcomproPeer :: DESCOM => 'Descripcion',
      CpcomproPeer :: MONCOM => 'Monto'
    );
  }

  public function Cpcausad_PreAjuste($params= array())
  {
    $this->c = new Criteria();
    $this->c->add(CpcausadPeer::STACAU,'A');
    $this->sql = "feccau <= to_date('$params[0]','dd/mm/yyyy')";
    $this->c->add(CpcausadPeer::FECCAU, $this->sql, Criteria::CUSTOM);
    $this->sql = "(moncau-salaju-salpag) > 0";
    $this->c->add(CpcausadPeer::MONCAU, $this->sql, Criteria::CUSTOM);
    $this->c->addAscendingOrderByColumn(CpcausadPeer :: REFCAU);

    $this->columnas = array (
      CpcausadPeer :: REFCAU => 'Referencia',
      CpcausadPeer :: FECCAU => 'Fecha',
      CpcausadPeer :: DESCAU => 'Descripcion',
      CpcausadPeer :: MONCAU => 'Monto'
    );
  }

  public function Cppagos_PreAjuste($params= array())
  {
    $this->c = new Criteria();
    $this->c->add(CppagosPeer::STAPAG,'A');
    $this->sql = "fecpag <= to_date('$params[0]','dd/mm/yyyy')";
    $this->c->add(CppagosPeer::FECPAG, $this->sql, Criteria::CUSTOM);
    $this->sql = "(monpag-salaju) > 0";
    $this->c->add(CppagosPeer::MONPAG, $this->sql, Criteria::CUSTOM);
    $this->c->addAscendingOrderByColumn(CppagosPeer :: REFPAG);

    $this->columnas = array (
      CppagosPeer :: REFPAG => 'Referencia',
      CppagosPeer :: FECPAG => 'Fecha',
      CppagosPeer :: DESPAG => 'Descripcion',
      CppagosPeer :: MONPAG => 'Monto'
    );
  }

  public function Cpprecom_PreAjuste($params= array())
  {
    $this->c = new Criteria();
    $this->c->add(CpprecomPeer::STAPRC,'A');
    $this->sql = "fecprc <= to_date('$params[0]','dd/mm/yyyy')";
    $this->c->add(CpprecomPeer::FECPRC, $this->sql, Criteria::CUSTOM);
    $this->sql = "(monprc-salaju-salcom) > 0";
    $this->c->add(CpprecomPeer::MONPRC, $this->sql, Criteria::CUSTOM);
    $this->c->addAscendingOrderByColumn(CpprecomPeer :: REFPRC);

    $this->columnas = array (
      CpprecomPeer :: REFPRC => 'Referencia',
      CpprecomPeer :: FECPRC => 'Fecha',
      CpprecomPeer :: DESPRC => 'Descripcion',
      CpprecomPeer :: MONPRC => 'Monto'
    );
  }

/////CATASTRO ////////


  public function Catreginm_Catregper()
  {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(CatregperPeer::CEDRIF);

    $this->columnas = array (
      CatregperPeer :: CEDRIF => 'C.I.',
      CatregperPeer :: PRINOM => 'Nombre',
      CatregperPeer :: PRIAPE => 'Apellido',
      CatregperPeer :: NOMPER => 'Razon Social',


    );
  }

  public function Catreginm_Catcarcon($params='')
  {
    $this->c = new Criteria();
    $this->c->add(CatcarconPeer::TIPO,$params[0]);
    $this->c->addAscendingOrderByColumn(CatcarconPeer::NOMCARCON);

    $this->columnas = array (
      CatcarconPeer :: NOMCARCON => 'Descripción'
    );
  }


  public function Catdefdivbarurb_Catdivgeo($params='')
  {
    $this->c = new Criteria();
    //$this->c->add(CatcarconPeer::TIPO,$params[0]);

    if (count($params) > 1){
    	$this->sql = "length(coddivgeo) = '$params[0]'";
    	$this->c->add(CatdivgeoPeer::CODDIVGEO, $this->sql, Criteria :: CUSTOM);
    }
    $this->c->addAscendingOrderByColumn(CatdivgeoPeer::CODDIVGEO);

    $this->columnas = array (
      CatdivgeoPeer::CODDIVGEO => 'Codigo',
      CatdivgeoPeer::DESDIVGEO => 'Descripcion'
    );
  }



public function Catdefcatman_Cattramo($params = '') {
		$this->c = new Criteria();
		$this->c->add(CattramoPeer :: CATTIPVIA_ID, $params[0]);
		$this->c->add(CattramoPeer :: CATDIVGEO_ID, $params[1]);
		$this->c->addJoin(CattramoPeer :: CATDIVGEO_ID, CatdivgeoPeer :: ID);
		$this->c->addAscendingOrderByColumn(CattramoPeer :: CATDIVGEO_ID);

		$this->columnas = array (
			CattramoPeer :: NOMTRAMO => 'Descripcion'
		);
	}

  public function Atprovee_Aciprovee($params='')
  {
  	$this->c = new Criteria();

    $this->columnas = array (
      AtproveePeer::RIFPRO => 'Rif',
      AtproveePeer::NOMPRO => 'Razón Social',
    );

  }

   public function Octipins_Oycdefemp() {
    $this->c = new Criteria();

      $this->columnas = array (
      OctipinsPeer :: CODTIPINS => 'Codigo',
      OctipinsPeer :: DESTIPINS => 'Descripcion'
    );

  }





//////////////////////


  public function Asignarpartidasconceptos_Nppartidas() {

    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(NppartidasPeer :: CODPAR);

    $this->columnas = array (
      NppartidasPeer :: CODPAR => 'Código',
      NppartidasPeer :: NOMPAR => 'Descripción'
    );
  }

  public function Facpicsollic_Rifcon()
  {
    $this->c = new Criteria();
    $this->c->add(FcconrepPeer::REPCON,'C');
    $this->columnas = array (
      FcconrepPeer :: RIFCON => 'Código',
      FcconrepPeer :: NOMCON => 'Descripción',
    );

  }

  public function Facpicsollic_Rifrep()
  {
    $this->c = new Criteria();
    $this->c->add(FcconrepPeer::REPCON,'R');
    $this->columnas = array (
      FcconrepPeer :: RIFCON => 'Código',
      FcconrepPeer :: NOMCON => 'Descripción',
    );

  }



  public function Npguarde_nphojint() {

    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(NpguardePeer :: CODCON);

    $this->columnas = array (
      NpguardePeer :: CODCON => 'Código',
      NpguardePeer :: NOMGUA => 'Descripción'
    );
  }

  public function Fcreginm_Facpicsollic()
  {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(FcreginmPeer :: CODCATINM);
    $this->columnas = array (
      FcreginmPeer :: CODCATINM => 'Código',
      FcreginmPeer :: NOMCON => 'Descripción'
    );
  }


  public function Fcreginm_Fccatfis()
  {
    $sql = "Select Max(length(rtrim(codcatfis))) as maximo from Fccatfis";
    $result = array ();
    if (Herramientas::BuscarDatos($sql,&$result))
    {
	    if (Herramientas::BuscarDatos($sql,&$result))
	   		$longitud = $result[0]["maximo"];
	   	else
	   		$longitud = 0;
	    $this->c = new Criteria();
	    $this->sql = "length(Codcatfis) = '" . $longitud . "'";
	    $this->c->add(FccatfisPeer :: CODCATFIS, $this->sql, Criteria :: CUSTOM);
	    $this->columnas = array (
	      FccatfisPeer :: CODCATFIS => 'Código',
	      FccatfisPeer :: NOMCATFIS => 'Descripción'
	    );
    }
  }
  public function Fcreginm_Fccarinm()
  {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(FccarinmPeer :: CODCARINM);
    $this->columnas = array (
      FccarinmPeer :: CODCARINM => 'Código',
      FccarinmPeer :: NOMCARINM => 'Descripción'
    );
  }
  public function Fcreginm_Fcestinm()
  {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(FcestinmPeer :: CODESTINM);
    $this->columnas = array (
      FcestinmPeer :: CODESTINM => 'Código',
      FcestinmPeer :: DESESTINM => 'Descripción'
    );
  }

  public function Fcreginm_Fcvalinm() {
    $this->c = new Criteria();
    $this->c->addSelectColumn(FcvalinmPeer::CODZON);
    $this->c->addSelectColumn(FcvalinmPeer::DESZON);
    $this->c->addSelectColumn("'' as CODTIP");
    $this->c->addSelectColumn("'' as DESTIP");
    $this->c->addSelectColumn("'' as VALMTR");
    $this->c->addSelectColumn("'' as VALFIS");
    $this->c->addSelectColumn("'' as ALITIP");
    $this->c->addSelectColumn("'' as ANUAL");
    $this->c->addSelectColumn("'' as ALITIPT");
    $this->c->addSelectColumn("'' as ANUALT");
    $this->c->addSelectColumn("'' as ANOVIG");
    $this->c->addSelectColumn("'' as PORVALFIS");
    $this->c->addSelectColumn("'' as ID");
    $this->c->addGroupByColumn(FcvalinmPeer::CODZON);
    $this->c->addGroupByColumn(FcvalinmPeer::DESZON);
    $this->columnas = array (
      FcvalinmPeer :: CODZON => 'Código',
      FcvalinmPeer :: DESZON => 'Descripción',
    );
  }


  public function Fcreginm_Fcusoinm()
  {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(FcusoinmPeer :: CODUSOINM);
    $this->columnas = array (
      FcusoinmPeer :: CODUSOINM => 'Código',
      FcusoinmPeer :: NOMUSOINM => 'Descripción'
    );
  }

  public function Fcreginm_Fcsitjurinm()
  {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(FcsitjurinmPeer :: CODSITINM);
    $this->columnas = array (
      FcsitjurinmPeer :: CODSITINM => 'Código',
      FcsitjurinmPeer :: NOMSITINM => 'Descripción'
    );
  }

    public function Npdefcpt_Nomdefespconsue($params) {
      $this->c = new Criteria();
      $this->c->add(NpasiconnomPeer :: CODNOM, $params[0]);
      $this->c->addJoin(NpdefcptPeer :: CODCON, NpasiconnomPeer :: CODCON);

      $this->columnas = array (
        NpdefcptPeer :: CODCON => 'Código',
        NpdefcptPeer :: NOMCON => 'Descripción'
    );
  }

    public function Optipret_Paggenretord($params) {
      $this->c = new Criteria();
      /*if ($params[0]!="")
      {
        $this->c->add(CaproretPeer::CODPRO, $params[0]);
        $this->c->addJoin(OptipretPeer::CODTIP, CaproretPeer::CODRET);
      }*/

      $this->columnas = array (
        OptipretPeer :: CODTIP => 'Código',
        OptipretPeer :: DESTIP => 'Descripción'
    );
  }


  public function Almregpro_Carecaud($params = array ())
  {
    $this->c= new Criteria();
    $this->c->add(CarecaudPeer :: CODTIPREC, $params[0]);
    $this->c->addAscendingOrderByColumn(CarecaudPeer::CODREC);

    $this->columnas = array (
        CarecaudPeer::CODREC=> 'Código',
        CarecaudPeer::DESREC => 'Descripción'
    );
  }

  public function Almregpro_Catiprec($params = array ()) //no borrar
  {
    $this->c= new Criteria();
    $this->c->addAscendingOrderByColumn(CatiprecPeer::CODTIPREC);

    $this->columnas = array (
        CatiprecPeer::CODTIPREC=> 'Código',
        CatiprecPeer::DESTIPREC => 'Descripción'
    );
  }
  public function Almregpro_Caramart($params = array ())
  {
    $this->c= new Criteria();
    $this->c->addAscendingOrderByColumn(CaramartPeer::RAMART);

    $this->columnas = array (
        CaramartPeer::RAMART=> 'Código',
        CaramartPeer::NOMRAM => 'Descripción'
    );
  }


  public function Almregpro_Optipret($params = array ())
  {
    $this->c= new Criteria();
    $this->c->addAscendingOrderByColumn(OptipretPeer::CODTIP);

    $this->columnas = array (
        OptipretPeer::CODTIP=> 'Código',
        OptipretPeer::DESTIP => 'Descripción',
        OptipretPeer::PORRET => 'Porcentaje',
        OptipretPeer::BASIMP => 'Base'
    );
  }

  public function Catreginm_Catcarter($params='')
  {
    $this->c = new Criteria();
    $this->c->add(CatcarterPeer::TERTIP,$params[0]);
    $this->c->addAscendingOrderByColumn(CatcarterPeer::DESTER);

    $this->columnas = array (
      CatcarterPeer :: DESTER => 'Descripción'
    );
  }

  public function Presnomreghisadeint_Npadeint($params=array()) {
    $this->c = new Criteria();
	$this->c->add(NpasiempcontPeer :: CODTIPCON, $params[0]);
	$this->c->addAscendingOrderByColumn(NpasiempcontPeer :: CODEMP);
    $this->columnas = array (
      NpasiempcontPeer :: CODEMP => 'Codigo',
      NpasiempcontPeer :: NOMEMP => 'Nombre'
    );
  }

  public function Almregpro_Cabanco(){
    $this->c = new Criteria();
	$this->c->addAscendingOrderByColumn(CabancoPeer :: CODBAN);
    $this->columnas = array (
      CabancoPeer :: CODBAN => 'Codigo',
      CabancoPeer :: DESBAN => 'Nombre/Banco'
    );
  }

  public function Almregpro_Tstipcue(){
    $this->c = new Criteria();
	$this->c->addAscendingOrderByColumn(TstipcuePeer :: CODTIP);
    $this->columnas = array (
      TstipcuePeer :: CODTIP => 'Codigo',
      TstipcuePeer :: DESTIP => 'Descripcion'
    );
  }

  public function Opconpag_Pagemiord()
  {
  	$this->c = new Criteria();

    $this->columnas = array (
      OpconpagPeer :: CODCONCEPTO => 'Concepto de Pago',
      OpconpagPeer :: NOMCONCEPTO => 'Descripcion'
    );
  }

  public function Npdefcpt_embargos() {
    $this->c = new Criteria();
	$this->c->add(NpdefcptPeer::OPECON,'D');
    $this->c->addAscendingOrderByColumn(NpdefcptPeer::CODCON);
    $this->columnas = array (
      NpdefcptPeer :: CODCON => 'Código',
      NpdefcptPeer :: NOMCON => 'Descripción'
    );
  }

  public function Npdefcpt_embargos2() {
    $this->c = new Criteria();
	$this->c->add(NpdefcptPeer::OPECON,'A');
    $this->c->addAscendingOrderByColumn(NpdefcptPeer::CODCON);
    $this->columnas = array (
      NpdefcptPeer :: CODCON => 'Código',
      NpdefcptPeer :: NOMCON => 'Descripción'
    );
  }

  public function Npbenefiemb_embargos() {
    $this->c = new Criteria();
    $this->c->addAscendingOrderByColumn(NpbenefiembPeer::CEDRIF);
    $this->columnas = array (
      NpbenefiembPeer :: CEDRIF => 'Cédula',
      NpbenefiembPeer :: NOMBEN => 'Nombre'
    );
  }

  public function Nptipret_codret($param = array ()) {
	$this->c = new Criteria();

	$this->columnas = array (
		NptipretPeer :: CODRET => 'Código Retiro',
		NptipretPeer :: DESRET => 'Descripción'
	);
  }

   	public function Npcalcon_nomcalcon2($params) {

			$this->c = new Criteria();
			$this->c->addJoin(NpasiconnomPeer :: CODNOM, NpasicarnomPeer :: CODNOM);
			$this->c->addJoin(NpasicarnomPeer :: CODNOM, NpnominaPeer :: CODNOM);
			$this->c->add(NpasiconnomPeer :: CODCON, $params[0]);
			$this->c->setDistinct();

			$this->columnas = array (
				NpnominaPeer :: NOMNOM => 'Nombre Nómina',
				NpnominaPeer :: CODNOM => 'Código'
			);

	}

  	public function Catdefaval_Catreginm($params = '') {
		$this->c = new Criteria();

		$this->columnas = array (
			CatreginmPeer :: CODDIVGEO => 'Ubicación Geógrafica',
			CatreginmPeer :: NROCAS => 'N° Catastral',

		);

	}

 	public function rhclacur_numcla($param = array ()) {
 		$this->c = new Criteria();

 		if (count($param) > 0) {
 			$this->c->add(RhclacurPeer :: CODCUR,$param[0]);
 		}
 		$this->c->addAscendingOrderByColumn(RhclacurPeer :: NUMCLA);
 		$this->columnas = array (
 			RhclacurPeer :: NUMCLA => 'Numero clase',
 			RhclacurPeer :: FECCLA => 'Fecha'
 		);
 	}

 	public function rhdefvalins_codvalins() {
 		$this->c = new Criteria();
 		$this->c->addAscendingOrderByColumn(RhdefvalinsPeer::CODVALINS);
 		$this->columnas = array (
 			RhdefvalinsPeer :: CODVALINS => 'Código',
 			RhdefvalinsPeer :: DESVALINS => 'Descripción'
 		);
 	}

 	public function rhdefniv_codniv() {
 		$this->c = new Criteria();
 		$this->c->addAscendingOrderByColumn(RhdefnivPeer::CODNIV);
 		$this->columnas = array (
 			RhdefnivPeer :: CODNIV => 'Código',
 			RhdefnivPeer :: DESNIV => 'Descripción'
 		);
 	}

 	public function Rhevaconcom_codevdo()
 	{
 		$this->c = new Criteria();
 		$this->c->addJoin(NphojintPeer::CODEMP,RhdatevaPeer::CODEVDO);
 		$this->c->addAscendingOrderByColumn(NphojintPeer::CODEMP);
 		$this->columnas = array (
 			NphojintPeer :: CODEMP => 'Código',
 			NphojintPeer :: NOMEMP => 'Nombre'
 		);
 	}

 	public function rhvalniv_codvalins($params = array()) {
 		$this->c = new Criteria();
 		$this->c->addAscendingOrderByColumn(RhvalnivPeer::CODNIV);
 		$this->columnas = array (
 			RhvalnivPeer :: CODVALINS => 'Código',
 			RhvalnivPeer :: DESVALINS => 'Descripción',
 			RhvalnivPeer :: PORVALINS => 'Porcentaje'
 		);
 	}

 	public function nphojint_codemp2()
 	{
 		$this->c = new Criteria();
 		$this->c->addAscendingOrderByColumn(NphojintPeer::CODEMP);
 		$this->columnas = array (
 			NphojintPeer :: CODEMP => 'Código',
 			NphojintPeer :: NOMEMP => 'Nombre',
 			NphojintPeer :: FECING => 'Descripcion'
 		);

 	}

 	public function rhdefind_codind()
 	{
 		$this->c = new Criteria();
 		$this->c->addAscendingOrderByColumn(RhdefindPeer::CODIND);
 		$this->columnas = array (
 			RhdefindPeer :: CODIND => 'Código',
 			RhdefindPeer :: DESIND => 'Nombre'
 		);

 	}

 	public function rhdefobj_codobj()
 	{
 		$this->c = new Criteria();
 		$this->c->addAscendingOrderByColumn(RhdefobjPeer::CODOBJ);
 		$this->columnas = array (
 			RhdefobjPeer :: CODOBJ => 'Código',
 			RhdefobjPeer :: DESOBJ => 'Nombre'
 		);
 	}
	public function Npdefubi_Nomhojint()
	{
		$this->c = new Criteria();
		$this->c->addAscendingOrderByColumn(NpdefubiPeer::CODUBI);
		$this->columnas = array (
			NpdefubiPeer :: CODUBI => 'Código',
			NpdefubiPeer :: DESUBI => 'Nombre'
		);
	}

	public function Ccsoldescuades_Pagemiord() {


    // XX = ccsoldescuades c inner join ccsoldes e on c.ccsoldes_id=e.id
    // YY = (XX) inner join ccdetcuades d on c.cccuades_id=d.cccuades_id
    // ZZ = (YY) inner join cccredit b on e.cccredit_id=b.id
    // X = (ZZ) inner join cpcompro f on b.cpcompro_id=f.id
    // Y = (X) inner join ccdetcuades d on c.cccuades_id=d.cccuades_id
    // Z = (Y) inner join cccredit b on e.cccredit_id=b.id
    // (Z) inner join cpcompro f on b.cpcompro_id=f.id




		$this->sql = "cpcompro.moncom > ((Select case when Sum(moncau) isnull then 0 else Sum(moncau) end as moncau from cpimpcom where refcom=cpcompro.refcom)+(Select case when Sum(monaju) isnull then 0 else Sum(monaju) end as monaju from cpimpcom where refcom=cpcompro.refcom))";

		$this->c = new Criteria();

    $this->c->addJoin(CcsoldescuadesPeer::CCSOLDES_ID,CcsoldesPeer::ID);
    $this->c->addJoin(CcsoldescuadesPeer::CCCUADES_ID,CcdetcuadesPeer::CCCUADES_ID);
    $this->c->addJoin(CcsoldesPeer::CCCREDIT_ID,CccreditPeer::ID);
    $this->c->addJoin(CcsolliqPeer::CCSOLDES_ID,CcsoldesPeer::ID);
    $this->c->addJoin(CccreditPeer::CPCOMPRO_ID,CpcomproPeer::ID);

		$this->c->add(CpcomproPeer :: MONCOM, $this->sql, Criteria :: CUSTOM); //$this->c->add(CpcomproPeer :: MONCOM, CpcomproPeer :: SALCAU, Criteria :: NOT_EQUAL);

		$a = new Criteria();
		$dato = CadefartPeer :: doSelectOne($a);
		if ($dato) {
			if ($dato->getComreqapr() == 'S') {
				$this->c->add(CpcomproPeer :: APRCOM, 'S');
			}
		}
		$this->c->add(CpcomproPeer :: STACOM, 'N', Criteria :: NOT_EQUAL);
    $this->c->add(CcdetcuadesPeer::CPCAUSAD_ID,null, Criteria :: ISNULL);

		$this->columnas = array (
			'ccdetcuades.CODIGO' => 'Cod. Det. Desembolso',
			CcdetcuadesPeer :: MONTO => 'Monto',
      'ccdetcuades.FECHA' => 'Fecha',
			'ccdetcuades.RIFTER' => 'Cod. Beneficiario',
      'ccdetcuades.NOMTER' => 'Nombre',
      'ccdetcuades.REFCOM' => 'Compromiso',
      'ccdetcuades.DESCOM' => 'Descripcion',
		);

	}

	public function Fordefcatpre_Codcat() {
		$this->c = new Criteria();
		// $this->c->addAscendingOrderByColumn(CaramartPeer::RAMART);

		$this->columnas = array (
			FordefcatprePeer :: CODCAT => 'Código',
			FordefcatprePeer :: DESCAT => 'Descripción',


		);
	}

	public function Fordefparegr_Codparegr() {
		$this->c = new Criteria();
		// $this->c->addAscendingOrderByColumn(CaramartPeer::RAMART);

		$this->columnas = array (
			FordefparegrPeer :: CODPAREGR => 'Código',
			FordefparegrPeer :: NOMPAREGR => 'Descripción',


		);
	}

}

?>
