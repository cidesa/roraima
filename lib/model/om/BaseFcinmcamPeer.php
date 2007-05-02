<?php


abstract class BaseFcinmcamPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcinmcam';

	
	const CLASS_DEFAULT = 'lib.model.Fcinmcam';

	
	const NUM_COLUMNS = 62;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NROINM = 'fcinmcam.NROINM';

	
	const CODCATFIS = 'fcinmcam.CODCATFIS';

	
	const CODUSO = 'fcinmcam.CODUSO';

	
	const CODCARINM = 'fcinmcam.CODCARINM';

	
	const CODSITINM = 'fcinmcam.CODSITINM';

	
	const RIFCON = 'fcinmcam.RIFCON';

	
	const FECPAG = 'fcinmcam.FECPAG';

	
	const FECCAL = 'fcinmcam.FECCAL';

	
	const FECREG = 'fcinmcam.FECREG';

	
	const DIRINM = 'fcinmcam.DIRINM';

	
	const LINNOR = 'fcinmcam.LINNOR';

	
	const LINSUR = 'fcinmcam.LINSUR';

	
	const LINEST = 'fcinmcam.LINEST';

	
	const LINOES = 'fcinmcam.LINOES';

	
	const MTRTER = 'fcinmcam.MTRTER';

	
	const MTRCON = 'fcinmcam.MTRCON';

	
	const BSTER = 'fcinmcam.BSTER';

	
	const BSCON = 'fcinmcam.BSCON';

	
	const DOCPRO = 'fcinmcam.DOCPRO';

	
	const RIFREP = 'fcinmcam.RIFREP';

	
	const FUNREC = 'fcinmcam.FUNREC';

	
	const FECREC = 'fcinmcam.FECREC';

	
	const ESTINM = 'fcinmcam.ESTINM';

	
	const ESTDEC = 'fcinmcam.ESTDEC';

	
	const CODCATINM = 'fcinmcam.CODCATINM';

	
	const NOMCON = 'fcinmcam.NOMCON';

	
	const DIRCON = 'fcinmcam.DIRCON';

	
	const CLACON = 'fcinmcam.CLACON';

	
	const FECADQ = 'fcinmcam.FECADQ';

	
	const VALINM = 'fcinmcam.VALINM';

	
	const CODMAN = 'fcinmcam.CODMAN';

	
	const CODSEC = 'fcinmcam.CODSEC';

	
	const CODPAR = 'fcinmcam.CODPAR';

	
	const NROINMANT = 'fcinmcam.NROINMANT';

	
	const TOTTER = 'fcinmcam.TOTTER';

	
	const TOTCON = 'fcinmcam.TOTCON';

	
	const TOTAL = 'fcinmcam.TOTAL';

	
	const CODTIP = 'fcinmcam.CODTIP';

	
	const CODZON = 'fcinmcam.CODZON';

	
	const DESTIP = 'fcinmcam.DESTIP';

	
	const DESZON = 'fcinmcam.DESZON';

	
	const ANUAL = 'fcinmcam.ANUAL';

	
	const FOLIO = 'fcinmcam.FOLIO';

	
	const TOMO = 'fcinmcam.TOMO';

	
	const NUMDOC = 'fcinmcam.NUMDOC';

	
	const FECDOC = 'fcinmcam.FECDOC';

	
	const USOINM = 'fcinmcam.USOINM';

	
	const DESDE = 'fcinmcam.DESDE';

	
	const HASTA = 'fcinmcam.HASTA';

	
	const ORD = 'fcinmcam.ORD';

	
	const ART = 'fcinmcam.ART';

	
	const FECDIR = 'fcinmcam.FECDIR';

	
	const FECAVA = 'fcinmcam.FECAVA';

	
	const DIRINM1 = 'fcinmcam.DIRINM1';

	
	const FECELA = 'fcinmcam.FECELA';

	
	const TRI = 'fcinmcam.TRI';

	
	const PROT = 'fcinmcam.PROT';

	
	const TIPOBOL = 'fcinmcam.TIPOBOL';

	
	const NOMSITINM = 'fcinmcam.NOMSITINM';

	
	const IMPANU = 'fcinmcam.IMPANU';

	
	const IMPTRI = 'fcinmcam.IMPTRI';

	
	const ID = 'fcinmcam.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Nroinm', 'Codcatfis', 'Coduso', 'Codcarinm', 'Codsitinm', 'Rifcon', 'Fecpag', 'Feccal', 'Fecreg', 'Dirinm', 'Linnor', 'Linsur', 'Linest', 'Linoes', 'Mtrter', 'Mtrcon', 'Bster', 'Bscon', 'Docpro', 'Rifrep', 'Funrec', 'Fecrec', 'Estinm', 'Estdec', 'Codcatinm', 'Nomcon', 'Dircon', 'Clacon', 'Fecadq', 'Valinm', 'Codman', 'Codsec', 'Codpar', 'Nroinmant', 'Totter', 'Totcon', 'Total', 'Codtip', 'Codzon', 'Destip', 'Deszon', 'Anual', 'Folio', 'Tomo', 'Numdoc', 'Fecdoc', 'Usoinm', 'Desde', 'Hasta', 'Ord', 'Art', 'Fecdir', 'Fecava', 'Dirinm1', 'Fecela', 'Tri', 'Prot', 'Tipobol', 'Nomsitinm', 'Impanu', 'Imptri', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcinmcamPeer::NROINM, FcinmcamPeer::CODCATFIS, FcinmcamPeer::CODUSO, FcinmcamPeer::CODCARINM, FcinmcamPeer::CODSITINM, FcinmcamPeer::RIFCON, FcinmcamPeer::FECPAG, FcinmcamPeer::FECCAL, FcinmcamPeer::FECREG, FcinmcamPeer::DIRINM, FcinmcamPeer::LINNOR, FcinmcamPeer::LINSUR, FcinmcamPeer::LINEST, FcinmcamPeer::LINOES, FcinmcamPeer::MTRTER, FcinmcamPeer::MTRCON, FcinmcamPeer::BSTER, FcinmcamPeer::BSCON, FcinmcamPeer::DOCPRO, FcinmcamPeer::RIFREP, FcinmcamPeer::FUNREC, FcinmcamPeer::FECREC, FcinmcamPeer::ESTINM, FcinmcamPeer::ESTDEC, FcinmcamPeer::CODCATINM, FcinmcamPeer::NOMCON, FcinmcamPeer::DIRCON, FcinmcamPeer::CLACON, FcinmcamPeer::FECADQ, FcinmcamPeer::VALINM, FcinmcamPeer::CODMAN, FcinmcamPeer::CODSEC, FcinmcamPeer::CODPAR, FcinmcamPeer::NROINMANT, FcinmcamPeer::TOTTER, FcinmcamPeer::TOTCON, FcinmcamPeer::TOTAL, FcinmcamPeer::CODTIP, FcinmcamPeer::CODZON, FcinmcamPeer::DESTIP, FcinmcamPeer::DESZON, FcinmcamPeer::ANUAL, FcinmcamPeer::FOLIO, FcinmcamPeer::TOMO, FcinmcamPeer::NUMDOC, FcinmcamPeer::FECDOC, FcinmcamPeer::USOINM, FcinmcamPeer::DESDE, FcinmcamPeer::HASTA, FcinmcamPeer::ORD, FcinmcamPeer::ART, FcinmcamPeer::FECDIR, FcinmcamPeer::FECAVA, FcinmcamPeer::DIRINM1, FcinmcamPeer::FECELA, FcinmcamPeer::TRI, FcinmcamPeer::PROT, FcinmcamPeer::TIPOBOL, FcinmcamPeer::NOMSITINM, FcinmcamPeer::IMPANU, FcinmcamPeer::IMPTRI, FcinmcamPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('nroinm', 'codcatfis', 'coduso', 'codcarinm', 'codsitinm', 'rifcon', 'fecpag', 'feccal', 'fecreg', 'dirinm', 'linnor', 'linsur', 'linest', 'linoes', 'mtrter', 'mtrcon', 'bster', 'bscon', 'docpro', 'rifrep', 'funrec', 'fecrec', 'estinm', 'estdec', 'codcatinm', 'nomcon', 'dircon', 'clacon', 'fecadq', 'valinm', 'codman', 'codsec', 'codpar', 'nroinmant', 'totter', 'totcon', 'total', 'codtip', 'codzon', 'destip', 'deszon', 'anual', 'folio', 'tomo', 'numdoc', 'fecdoc', 'usoinm', 'desde', 'hasta', 'ord', 'art', 'fecdir', 'fecava', 'dirinm1', 'fecela', 'tri', 'prot', 'tipobol', 'nomsitinm', 'impanu', 'imptri', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Nroinm' => 0, 'Codcatfis' => 1, 'Coduso' => 2, 'Codcarinm' => 3, 'Codsitinm' => 4, 'Rifcon' => 5, 'Fecpag' => 6, 'Feccal' => 7, 'Fecreg' => 8, 'Dirinm' => 9, 'Linnor' => 10, 'Linsur' => 11, 'Linest' => 12, 'Linoes' => 13, 'Mtrter' => 14, 'Mtrcon' => 15, 'Bster' => 16, 'Bscon' => 17, 'Docpro' => 18, 'Rifrep' => 19, 'Funrec' => 20, 'Fecrec' => 21, 'Estinm' => 22, 'Estdec' => 23, 'Codcatinm' => 24, 'Nomcon' => 25, 'Dircon' => 26, 'Clacon' => 27, 'Fecadq' => 28, 'Valinm' => 29, 'Codman' => 30, 'Codsec' => 31, 'Codpar' => 32, 'Nroinmant' => 33, 'Totter' => 34, 'Totcon' => 35, 'Total' => 36, 'Codtip' => 37, 'Codzon' => 38, 'Destip' => 39, 'Deszon' => 40, 'Anual' => 41, 'Folio' => 42, 'Tomo' => 43, 'Numdoc' => 44, 'Fecdoc' => 45, 'Usoinm' => 46, 'Desde' => 47, 'Hasta' => 48, 'Ord' => 49, 'Art' => 50, 'Fecdir' => 51, 'Fecava' => 52, 'Dirinm1' => 53, 'Fecela' => 54, 'Tri' => 55, 'Prot' => 56, 'Tipobol' => 57, 'Nomsitinm' => 58, 'Impanu' => 59, 'Imptri' => 60, 'Id' => 61, ),
		BasePeer::TYPE_COLNAME => array (FcinmcamPeer::NROINM => 0, FcinmcamPeer::CODCATFIS => 1, FcinmcamPeer::CODUSO => 2, FcinmcamPeer::CODCARINM => 3, FcinmcamPeer::CODSITINM => 4, FcinmcamPeer::RIFCON => 5, FcinmcamPeer::FECPAG => 6, FcinmcamPeer::FECCAL => 7, FcinmcamPeer::FECREG => 8, FcinmcamPeer::DIRINM => 9, FcinmcamPeer::LINNOR => 10, FcinmcamPeer::LINSUR => 11, FcinmcamPeer::LINEST => 12, FcinmcamPeer::LINOES => 13, FcinmcamPeer::MTRTER => 14, FcinmcamPeer::MTRCON => 15, FcinmcamPeer::BSTER => 16, FcinmcamPeer::BSCON => 17, FcinmcamPeer::DOCPRO => 18, FcinmcamPeer::RIFREP => 19, FcinmcamPeer::FUNREC => 20, FcinmcamPeer::FECREC => 21, FcinmcamPeer::ESTINM => 22, FcinmcamPeer::ESTDEC => 23, FcinmcamPeer::CODCATINM => 24, FcinmcamPeer::NOMCON => 25, FcinmcamPeer::DIRCON => 26, FcinmcamPeer::CLACON => 27, FcinmcamPeer::FECADQ => 28, FcinmcamPeer::VALINM => 29, FcinmcamPeer::CODMAN => 30, FcinmcamPeer::CODSEC => 31, FcinmcamPeer::CODPAR => 32, FcinmcamPeer::NROINMANT => 33, FcinmcamPeer::TOTTER => 34, FcinmcamPeer::TOTCON => 35, FcinmcamPeer::TOTAL => 36, FcinmcamPeer::CODTIP => 37, FcinmcamPeer::CODZON => 38, FcinmcamPeer::DESTIP => 39, FcinmcamPeer::DESZON => 40, FcinmcamPeer::ANUAL => 41, FcinmcamPeer::FOLIO => 42, FcinmcamPeer::TOMO => 43, FcinmcamPeer::NUMDOC => 44, FcinmcamPeer::FECDOC => 45, FcinmcamPeer::USOINM => 46, FcinmcamPeer::DESDE => 47, FcinmcamPeer::HASTA => 48, FcinmcamPeer::ORD => 49, FcinmcamPeer::ART => 50, FcinmcamPeer::FECDIR => 51, FcinmcamPeer::FECAVA => 52, FcinmcamPeer::DIRINM1 => 53, FcinmcamPeer::FECELA => 54, FcinmcamPeer::TRI => 55, FcinmcamPeer::PROT => 56, FcinmcamPeer::TIPOBOL => 57, FcinmcamPeer::NOMSITINM => 58, FcinmcamPeer::IMPANU => 59, FcinmcamPeer::IMPTRI => 60, FcinmcamPeer::ID => 61, ),
		BasePeer::TYPE_FIELDNAME => array ('nroinm' => 0, 'codcatfis' => 1, 'coduso' => 2, 'codcarinm' => 3, 'codsitinm' => 4, 'rifcon' => 5, 'fecpag' => 6, 'feccal' => 7, 'fecreg' => 8, 'dirinm' => 9, 'linnor' => 10, 'linsur' => 11, 'linest' => 12, 'linoes' => 13, 'mtrter' => 14, 'mtrcon' => 15, 'bster' => 16, 'bscon' => 17, 'docpro' => 18, 'rifrep' => 19, 'funrec' => 20, 'fecrec' => 21, 'estinm' => 22, 'estdec' => 23, 'codcatinm' => 24, 'nomcon' => 25, 'dircon' => 26, 'clacon' => 27, 'fecadq' => 28, 'valinm' => 29, 'codman' => 30, 'codsec' => 31, 'codpar' => 32, 'nroinmant' => 33, 'totter' => 34, 'totcon' => 35, 'total' => 36, 'codtip' => 37, 'codzon' => 38, 'destip' => 39, 'deszon' => 40, 'anual' => 41, 'folio' => 42, 'tomo' => 43, 'numdoc' => 44, 'fecdoc' => 45, 'usoinm' => 46, 'desde' => 47, 'hasta' => 48, 'ord' => 49, 'art' => 50, 'fecdir' => 51, 'fecava' => 52, 'dirinm1' => 53, 'fecela' => 54, 'tri' => 55, 'prot' => 56, 'tipobol' => 57, 'nomsitinm' => 58, 'impanu' => 59, 'imptri' => 60, 'id' => 61, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcinmcamMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcinmcamMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcinmcamPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(FcinmcamPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcinmcamPeer::NROINM);

		$criteria->addSelectColumn(FcinmcamPeer::CODCATFIS);

		$criteria->addSelectColumn(FcinmcamPeer::CODUSO);

		$criteria->addSelectColumn(FcinmcamPeer::CODCARINM);

		$criteria->addSelectColumn(FcinmcamPeer::CODSITINM);

		$criteria->addSelectColumn(FcinmcamPeer::RIFCON);

		$criteria->addSelectColumn(FcinmcamPeer::FECPAG);

		$criteria->addSelectColumn(FcinmcamPeer::FECCAL);

		$criteria->addSelectColumn(FcinmcamPeer::FECREG);

		$criteria->addSelectColumn(FcinmcamPeer::DIRINM);

		$criteria->addSelectColumn(FcinmcamPeer::LINNOR);

		$criteria->addSelectColumn(FcinmcamPeer::LINSUR);

		$criteria->addSelectColumn(FcinmcamPeer::LINEST);

		$criteria->addSelectColumn(FcinmcamPeer::LINOES);

		$criteria->addSelectColumn(FcinmcamPeer::MTRTER);

		$criteria->addSelectColumn(FcinmcamPeer::MTRCON);

		$criteria->addSelectColumn(FcinmcamPeer::BSTER);

		$criteria->addSelectColumn(FcinmcamPeer::BSCON);

		$criteria->addSelectColumn(FcinmcamPeer::DOCPRO);

		$criteria->addSelectColumn(FcinmcamPeer::RIFREP);

		$criteria->addSelectColumn(FcinmcamPeer::FUNREC);

		$criteria->addSelectColumn(FcinmcamPeer::FECREC);

		$criteria->addSelectColumn(FcinmcamPeer::ESTINM);

		$criteria->addSelectColumn(FcinmcamPeer::ESTDEC);

		$criteria->addSelectColumn(FcinmcamPeer::CODCATINM);

		$criteria->addSelectColumn(FcinmcamPeer::NOMCON);

		$criteria->addSelectColumn(FcinmcamPeer::DIRCON);

		$criteria->addSelectColumn(FcinmcamPeer::CLACON);

		$criteria->addSelectColumn(FcinmcamPeer::FECADQ);

		$criteria->addSelectColumn(FcinmcamPeer::VALINM);

		$criteria->addSelectColumn(FcinmcamPeer::CODMAN);

		$criteria->addSelectColumn(FcinmcamPeer::CODSEC);

		$criteria->addSelectColumn(FcinmcamPeer::CODPAR);

		$criteria->addSelectColumn(FcinmcamPeer::NROINMANT);

		$criteria->addSelectColumn(FcinmcamPeer::TOTTER);

		$criteria->addSelectColumn(FcinmcamPeer::TOTCON);

		$criteria->addSelectColumn(FcinmcamPeer::TOTAL);

		$criteria->addSelectColumn(FcinmcamPeer::CODTIP);

		$criteria->addSelectColumn(FcinmcamPeer::CODZON);

		$criteria->addSelectColumn(FcinmcamPeer::DESTIP);

		$criteria->addSelectColumn(FcinmcamPeer::DESZON);

		$criteria->addSelectColumn(FcinmcamPeer::ANUAL);

		$criteria->addSelectColumn(FcinmcamPeer::FOLIO);

		$criteria->addSelectColumn(FcinmcamPeer::TOMO);

		$criteria->addSelectColumn(FcinmcamPeer::NUMDOC);

		$criteria->addSelectColumn(FcinmcamPeer::FECDOC);

		$criteria->addSelectColumn(FcinmcamPeer::USOINM);

		$criteria->addSelectColumn(FcinmcamPeer::DESDE);

		$criteria->addSelectColumn(FcinmcamPeer::HASTA);

		$criteria->addSelectColumn(FcinmcamPeer::ORD);

		$criteria->addSelectColumn(FcinmcamPeer::ART);

		$criteria->addSelectColumn(FcinmcamPeer::FECDIR);

		$criteria->addSelectColumn(FcinmcamPeer::FECAVA);

		$criteria->addSelectColumn(FcinmcamPeer::DIRINM1);

		$criteria->addSelectColumn(FcinmcamPeer::FECELA);

		$criteria->addSelectColumn(FcinmcamPeer::TRI);

		$criteria->addSelectColumn(FcinmcamPeer::PROT);

		$criteria->addSelectColumn(FcinmcamPeer::TIPOBOL);

		$criteria->addSelectColumn(FcinmcamPeer::NOMSITINM);

		$criteria->addSelectColumn(FcinmcamPeer::IMPANU);

		$criteria->addSelectColumn(FcinmcamPeer::IMPTRI);

		$criteria->addSelectColumn(FcinmcamPeer::ID);

	}

	const COUNT = 'COUNT(fcinmcam.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcinmcam.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcinmcamPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcinmcamPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcinmcamPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = FcinmcamPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcinmcamPeer::populateObjects(FcinmcamPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcinmcamPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcinmcamPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return FcinmcamPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}


				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(FcinmcamPeer::ID);
			$selectCriteria->add(FcinmcamPeer::ID, $criteria->remove(FcinmcamPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(FcinmcamPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(FcinmcamPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcinmcam) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcinmcamPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(Fcinmcam $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcinmcamPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcinmcamPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(FcinmcamPeer::DATABASE_NAME, FcinmcamPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcinmcamPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(FcinmcamPeer::DATABASE_NAME);

		$criteria->add(FcinmcamPeer::ID, $pk);


		$v = FcinmcamPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(FcinmcamPeer::ID, $pks, Criteria::IN);
			$objs = FcinmcamPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcinmcamPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcinmcamMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcinmcamMapBuilder');
}
