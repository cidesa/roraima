<?php


abstract class BaseFcreginmPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcreginm';

	
	const CLASS_DEFAULT = 'lib.model.Fcreginm';

	
	const NUM_COLUMNS = 63;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NROINM = 'fcreginm.NROINM';

	
	const CODCATFIS = 'fcreginm.CODCATFIS';

	
	const CODUSO = 'fcreginm.CODUSO';

	
	const CODCARINM = 'fcreginm.CODCARINM';

	
	const CODSITINM = 'fcreginm.CODSITINM';

	
	const RIFCON = 'fcreginm.RIFCON';

	
	const FECPAG = 'fcreginm.FECPAG';

	
	const FECCAL = 'fcreginm.FECCAL';

	
	const FECREG = 'fcreginm.FECREG';

	
	const DIRINM = 'fcreginm.DIRINM';

	
	const LINNOR = 'fcreginm.LINNOR';

	
	const LINSUR = 'fcreginm.LINSUR';

	
	const LINEST = 'fcreginm.LINEST';

	
	const LINOES = 'fcreginm.LINOES';

	
	const MTRTER = 'fcreginm.MTRTER';

	
	const MTRCON = 'fcreginm.MTRCON';

	
	const BSTER = 'fcreginm.BSTER';

	
	const BSCON = 'fcreginm.BSCON';

	
	const DOCPRO = 'fcreginm.DOCPRO';

	
	const RIFREP = 'fcreginm.RIFREP';

	
	const FUNREC = 'fcreginm.FUNREC';

	
	const FECREC = 'fcreginm.FECREC';

	
	const ESTINM = 'fcreginm.ESTINM';

	
	const ESTDEC = 'fcreginm.ESTDEC';

	
	const CODCATINM = 'fcreginm.CODCATINM';

	
	const NOMCON = 'fcreginm.NOMCON';

	
	const DIRCON = 'fcreginm.DIRCON';

	
	const CLACON = 'fcreginm.CLACON';

	
	const FECADQ = 'fcreginm.FECADQ';

	
	const VALINM = 'fcreginm.VALINM';

	
	const CODMAN = 'fcreginm.CODMAN';

	
	const CODSEC = 'fcreginm.CODSEC';

	
	const CODPAR = 'fcreginm.CODPAR';

	
	const NROINMANT = 'fcreginm.NROINMANT';

	
	const TOTTER = 'fcreginm.TOTTER';

	
	const TOTCON = 'fcreginm.TOTCON';

	
	const TOTAL = 'fcreginm.TOTAL';

	
	const CODTIP = 'fcreginm.CODTIP';

	
	const CODZON = 'fcreginm.CODZON';

	
	const DESTIP = 'fcreginm.DESTIP';

	
	const DESZON = 'fcreginm.DESZON';

	
	const ANUAL = 'fcreginm.ANUAL';

	
	const FOLIO = 'fcreginm.FOLIO';

	
	const TOMO = 'fcreginm.TOMO';

	
	const NUMDOC = 'fcreginm.NUMDOC';

	
	const FECDOC = 'fcreginm.FECDOC';

	
	const USOINM = 'fcreginm.USOINM';

	
	const DESDE = 'fcreginm.DESDE';

	
	const HASTA = 'fcreginm.HASTA';

	
	const ORD = 'fcreginm.ORD';

	
	const ART = 'fcreginm.ART';

	
	const FECDIR = 'fcreginm.FECDIR';

	
	const FECAVA = 'fcreginm.FECAVA';

	
	const DIRINM1 = 'fcreginm.DIRINM1';

	
	const FECELA = 'fcreginm.FECELA';

	
	const TRI = 'fcreginm.TRI';

	
	const PROT = 'fcreginm.PROT';

	
	const TIPOBOL = 'fcreginm.TIPOBOL';

	
	const NOMSITINM = 'fcreginm.NOMSITINM';

	
	const IMPANU = 'fcreginm.IMPANU';

	
	const IMPTRI = 'fcreginm.IMPTRI';

	
	const ANUALT = 'fcreginm.ANUALT';

	
	const ID = 'fcreginm.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Nroinm', 'Codcatfis', 'Coduso', 'Codcarinm', 'Codsitinm', 'Rifcon', 'Fecpag', 'Feccal', 'Fecreg', 'Dirinm', 'Linnor', 'Linsur', 'Linest', 'Linoes', 'Mtrter', 'Mtrcon', 'Bster', 'Bscon', 'Docpro', 'Rifrep', 'Funrec', 'Fecrec', 'Estinm', 'Estdec', 'Codcatinm', 'Nomcon', 'Dircon', 'Clacon', 'Fecadq', 'Valinm', 'Codman', 'Codsec', 'Codpar', 'Nroinmant', 'Totter', 'Totcon', 'Total', 'Codtip', 'Codzon', 'Destip', 'Deszon', 'Anual', 'Folio', 'Tomo', 'Numdoc', 'Fecdoc', 'Usoinm', 'Desde', 'Hasta', 'Ord', 'Art', 'Fecdir', 'Fecava', 'Dirinm1', 'Fecela', 'Tri', 'Prot', 'Tipobol', 'Nomsitinm', 'Impanu', 'Imptri', 'Anualt', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcreginmPeer::NROINM, FcreginmPeer::CODCATFIS, FcreginmPeer::CODUSO, FcreginmPeer::CODCARINM, FcreginmPeer::CODSITINM, FcreginmPeer::RIFCON, FcreginmPeer::FECPAG, FcreginmPeer::FECCAL, FcreginmPeer::FECREG, FcreginmPeer::DIRINM, FcreginmPeer::LINNOR, FcreginmPeer::LINSUR, FcreginmPeer::LINEST, FcreginmPeer::LINOES, FcreginmPeer::MTRTER, FcreginmPeer::MTRCON, FcreginmPeer::BSTER, FcreginmPeer::BSCON, FcreginmPeer::DOCPRO, FcreginmPeer::RIFREP, FcreginmPeer::FUNREC, FcreginmPeer::FECREC, FcreginmPeer::ESTINM, FcreginmPeer::ESTDEC, FcreginmPeer::CODCATINM, FcreginmPeer::NOMCON, FcreginmPeer::DIRCON, FcreginmPeer::CLACON, FcreginmPeer::FECADQ, FcreginmPeer::VALINM, FcreginmPeer::CODMAN, FcreginmPeer::CODSEC, FcreginmPeer::CODPAR, FcreginmPeer::NROINMANT, FcreginmPeer::TOTTER, FcreginmPeer::TOTCON, FcreginmPeer::TOTAL, FcreginmPeer::CODTIP, FcreginmPeer::CODZON, FcreginmPeer::DESTIP, FcreginmPeer::DESZON, FcreginmPeer::ANUAL, FcreginmPeer::FOLIO, FcreginmPeer::TOMO, FcreginmPeer::NUMDOC, FcreginmPeer::FECDOC, FcreginmPeer::USOINM, FcreginmPeer::DESDE, FcreginmPeer::HASTA, FcreginmPeer::ORD, FcreginmPeer::ART, FcreginmPeer::FECDIR, FcreginmPeer::FECAVA, FcreginmPeer::DIRINM1, FcreginmPeer::FECELA, FcreginmPeer::TRI, FcreginmPeer::PROT, FcreginmPeer::TIPOBOL, FcreginmPeer::NOMSITINM, FcreginmPeer::IMPANU, FcreginmPeer::IMPTRI, FcreginmPeer::ANUALT, FcreginmPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('nroinm', 'codcatfis', 'coduso', 'codcarinm', 'codsitinm', 'rifcon', 'fecpag', 'feccal', 'fecreg', 'dirinm', 'linnor', 'linsur', 'linest', 'linoes', 'mtrter', 'mtrcon', 'bster', 'bscon', 'docpro', 'rifrep', 'funrec', 'fecrec', 'estinm', 'estdec', 'codcatinm', 'nomcon', 'dircon', 'clacon', 'fecadq', 'valinm', 'codman', 'codsec', 'codpar', 'nroinmant', 'totter', 'totcon', 'total', 'codtip', 'codzon', 'destip', 'deszon', 'anual', 'folio', 'tomo', 'numdoc', 'fecdoc', 'usoinm', 'desde', 'hasta', 'ord', 'art', 'fecdir', 'fecava', 'dirinm1', 'fecela', 'tri', 'prot', 'tipobol', 'nomsitinm', 'impanu', 'imptri', 'anualt', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Nroinm' => 0, 'Codcatfis' => 1, 'Coduso' => 2, 'Codcarinm' => 3, 'Codsitinm' => 4, 'Rifcon' => 5, 'Fecpag' => 6, 'Feccal' => 7, 'Fecreg' => 8, 'Dirinm' => 9, 'Linnor' => 10, 'Linsur' => 11, 'Linest' => 12, 'Linoes' => 13, 'Mtrter' => 14, 'Mtrcon' => 15, 'Bster' => 16, 'Bscon' => 17, 'Docpro' => 18, 'Rifrep' => 19, 'Funrec' => 20, 'Fecrec' => 21, 'Estinm' => 22, 'Estdec' => 23, 'Codcatinm' => 24, 'Nomcon' => 25, 'Dircon' => 26, 'Clacon' => 27, 'Fecadq' => 28, 'Valinm' => 29, 'Codman' => 30, 'Codsec' => 31, 'Codpar' => 32, 'Nroinmant' => 33, 'Totter' => 34, 'Totcon' => 35, 'Total' => 36, 'Codtip' => 37, 'Codzon' => 38, 'Destip' => 39, 'Deszon' => 40, 'Anual' => 41, 'Folio' => 42, 'Tomo' => 43, 'Numdoc' => 44, 'Fecdoc' => 45, 'Usoinm' => 46, 'Desde' => 47, 'Hasta' => 48, 'Ord' => 49, 'Art' => 50, 'Fecdir' => 51, 'Fecava' => 52, 'Dirinm1' => 53, 'Fecela' => 54, 'Tri' => 55, 'Prot' => 56, 'Tipobol' => 57, 'Nomsitinm' => 58, 'Impanu' => 59, 'Imptri' => 60, 'Anualt' => 61, 'Id' => 62, ),
		BasePeer::TYPE_COLNAME => array (FcreginmPeer::NROINM => 0, FcreginmPeer::CODCATFIS => 1, FcreginmPeer::CODUSO => 2, FcreginmPeer::CODCARINM => 3, FcreginmPeer::CODSITINM => 4, FcreginmPeer::RIFCON => 5, FcreginmPeer::FECPAG => 6, FcreginmPeer::FECCAL => 7, FcreginmPeer::FECREG => 8, FcreginmPeer::DIRINM => 9, FcreginmPeer::LINNOR => 10, FcreginmPeer::LINSUR => 11, FcreginmPeer::LINEST => 12, FcreginmPeer::LINOES => 13, FcreginmPeer::MTRTER => 14, FcreginmPeer::MTRCON => 15, FcreginmPeer::BSTER => 16, FcreginmPeer::BSCON => 17, FcreginmPeer::DOCPRO => 18, FcreginmPeer::RIFREP => 19, FcreginmPeer::FUNREC => 20, FcreginmPeer::FECREC => 21, FcreginmPeer::ESTINM => 22, FcreginmPeer::ESTDEC => 23, FcreginmPeer::CODCATINM => 24, FcreginmPeer::NOMCON => 25, FcreginmPeer::DIRCON => 26, FcreginmPeer::CLACON => 27, FcreginmPeer::FECADQ => 28, FcreginmPeer::VALINM => 29, FcreginmPeer::CODMAN => 30, FcreginmPeer::CODSEC => 31, FcreginmPeer::CODPAR => 32, FcreginmPeer::NROINMANT => 33, FcreginmPeer::TOTTER => 34, FcreginmPeer::TOTCON => 35, FcreginmPeer::TOTAL => 36, FcreginmPeer::CODTIP => 37, FcreginmPeer::CODZON => 38, FcreginmPeer::DESTIP => 39, FcreginmPeer::DESZON => 40, FcreginmPeer::ANUAL => 41, FcreginmPeer::FOLIO => 42, FcreginmPeer::TOMO => 43, FcreginmPeer::NUMDOC => 44, FcreginmPeer::FECDOC => 45, FcreginmPeer::USOINM => 46, FcreginmPeer::DESDE => 47, FcreginmPeer::HASTA => 48, FcreginmPeer::ORD => 49, FcreginmPeer::ART => 50, FcreginmPeer::FECDIR => 51, FcreginmPeer::FECAVA => 52, FcreginmPeer::DIRINM1 => 53, FcreginmPeer::FECELA => 54, FcreginmPeer::TRI => 55, FcreginmPeer::PROT => 56, FcreginmPeer::TIPOBOL => 57, FcreginmPeer::NOMSITINM => 58, FcreginmPeer::IMPANU => 59, FcreginmPeer::IMPTRI => 60, FcreginmPeer::ANUALT => 61, FcreginmPeer::ID => 62, ),
		BasePeer::TYPE_FIELDNAME => array ('nroinm' => 0, 'codcatfis' => 1, 'coduso' => 2, 'codcarinm' => 3, 'codsitinm' => 4, 'rifcon' => 5, 'fecpag' => 6, 'feccal' => 7, 'fecreg' => 8, 'dirinm' => 9, 'linnor' => 10, 'linsur' => 11, 'linest' => 12, 'linoes' => 13, 'mtrter' => 14, 'mtrcon' => 15, 'bster' => 16, 'bscon' => 17, 'docpro' => 18, 'rifrep' => 19, 'funrec' => 20, 'fecrec' => 21, 'estinm' => 22, 'estdec' => 23, 'codcatinm' => 24, 'nomcon' => 25, 'dircon' => 26, 'clacon' => 27, 'fecadq' => 28, 'valinm' => 29, 'codman' => 30, 'codsec' => 31, 'codpar' => 32, 'nroinmant' => 33, 'totter' => 34, 'totcon' => 35, 'total' => 36, 'codtip' => 37, 'codzon' => 38, 'destip' => 39, 'deszon' => 40, 'anual' => 41, 'folio' => 42, 'tomo' => 43, 'numdoc' => 44, 'fecdoc' => 45, 'usoinm' => 46, 'desde' => 47, 'hasta' => 48, 'ord' => 49, 'art' => 50, 'fecdir' => 51, 'fecava' => 52, 'dirinm1' => 53, 'fecela' => 54, 'tri' => 55, 'prot' => 56, 'tipobol' => 57, 'nomsitinm' => 58, 'impanu' => 59, 'imptri' => 60, 'anualt' => 61, 'id' => 62, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcreginmMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcreginmMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcreginmPeer::getTableMap();
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
		return str_replace(FcreginmPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcreginmPeer::NROINM);

		$criteria->addSelectColumn(FcreginmPeer::CODCATFIS);

		$criteria->addSelectColumn(FcreginmPeer::CODUSO);

		$criteria->addSelectColumn(FcreginmPeer::CODCARINM);

		$criteria->addSelectColumn(FcreginmPeer::CODSITINM);

		$criteria->addSelectColumn(FcreginmPeer::RIFCON);

		$criteria->addSelectColumn(FcreginmPeer::FECPAG);

		$criteria->addSelectColumn(FcreginmPeer::FECCAL);

		$criteria->addSelectColumn(FcreginmPeer::FECREG);

		$criteria->addSelectColumn(FcreginmPeer::DIRINM);

		$criteria->addSelectColumn(FcreginmPeer::LINNOR);

		$criteria->addSelectColumn(FcreginmPeer::LINSUR);

		$criteria->addSelectColumn(FcreginmPeer::LINEST);

		$criteria->addSelectColumn(FcreginmPeer::LINOES);

		$criteria->addSelectColumn(FcreginmPeer::MTRTER);

		$criteria->addSelectColumn(FcreginmPeer::MTRCON);

		$criteria->addSelectColumn(FcreginmPeer::BSTER);

		$criteria->addSelectColumn(FcreginmPeer::BSCON);

		$criteria->addSelectColumn(FcreginmPeer::DOCPRO);

		$criteria->addSelectColumn(FcreginmPeer::RIFREP);

		$criteria->addSelectColumn(FcreginmPeer::FUNREC);

		$criteria->addSelectColumn(FcreginmPeer::FECREC);

		$criteria->addSelectColumn(FcreginmPeer::ESTINM);

		$criteria->addSelectColumn(FcreginmPeer::ESTDEC);

		$criteria->addSelectColumn(FcreginmPeer::CODCATINM);

		$criteria->addSelectColumn(FcreginmPeer::NOMCON);

		$criteria->addSelectColumn(FcreginmPeer::DIRCON);

		$criteria->addSelectColumn(FcreginmPeer::CLACON);

		$criteria->addSelectColumn(FcreginmPeer::FECADQ);

		$criteria->addSelectColumn(FcreginmPeer::VALINM);

		$criteria->addSelectColumn(FcreginmPeer::CODMAN);

		$criteria->addSelectColumn(FcreginmPeer::CODSEC);

		$criteria->addSelectColumn(FcreginmPeer::CODPAR);

		$criteria->addSelectColumn(FcreginmPeer::NROINMANT);

		$criteria->addSelectColumn(FcreginmPeer::TOTTER);

		$criteria->addSelectColumn(FcreginmPeer::TOTCON);

		$criteria->addSelectColumn(FcreginmPeer::TOTAL);

		$criteria->addSelectColumn(FcreginmPeer::CODTIP);

		$criteria->addSelectColumn(FcreginmPeer::CODZON);

		$criteria->addSelectColumn(FcreginmPeer::DESTIP);

		$criteria->addSelectColumn(FcreginmPeer::DESZON);

		$criteria->addSelectColumn(FcreginmPeer::ANUAL);

		$criteria->addSelectColumn(FcreginmPeer::FOLIO);

		$criteria->addSelectColumn(FcreginmPeer::TOMO);

		$criteria->addSelectColumn(FcreginmPeer::NUMDOC);

		$criteria->addSelectColumn(FcreginmPeer::FECDOC);

		$criteria->addSelectColumn(FcreginmPeer::USOINM);

		$criteria->addSelectColumn(FcreginmPeer::DESDE);

		$criteria->addSelectColumn(FcreginmPeer::HASTA);

		$criteria->addSelectColumn(FcreginmPeer::ORD);

		$criteria->addSelectColumn(FcreginmPeer::ART);

		$criteria->addSelectColumn(FcreginmPeer::FECDIR);

		$criteria->addSelectColumn(FcreginmPeer::FECAVA);

		$criteria->addSelectColumn(FcreginmPeer::DIRINM1);

		$criteria->addSelectColumn(FcreginmPeer::FECELA);

		$criteria->addSelectColumn(FcreginmPeer::TRI);

		$criteria->addSelectColumn(FcreginmPeer::PROT);

		$criteria->addSelectColumn(FcreginmPeer::TIPOBOL);

		$criteria->addSelectColumn(FcreginmPeer::NOMSITINM);

		$criteria->addSelectColumn(FcreginmPeer::IMPANU);

		$criteria->addSelectColumn(FcreginmPeer::IMPTRI);

		$criteria->addSelectColumn(FcreginmPeer::ANUALT);

		$criteria->addSelectColumn(FcreginmPeer::ID);

	}

	const COUNT = 'COUNT(fcreginm.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcreginm.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcreginmPeer::doSelectRS($criteria, $con);
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
		$objects = FcreginmPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcreginmPeer::populateObjects(FcreginmPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcreginmPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcreginmPeer::getOMClass();
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
		return FcreginmPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(FcreginmPeer::ID);
			$selectCriteria->add(FcreginmPeer::ID, $criteria->remove(FcreginmPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcreginmPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcreginmPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcreginm) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcreginmPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcreginm $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcreginmPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcreginmPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcreginmPeer::DATABASE_NAME, FcreginmPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcreginmPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcreginmPeer::DATABASE_NAME);

		$criteria->add(FcreginmPeer::ID, $pk);


		$v = FcreginmPeer::doSelect($criteria, $con);

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
			$criteria->add(FcreginmPeer::ID, $pks, Criteria::IN);
			$objs = FcreginmPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcreginmPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcreginmMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcreginmMapBuilder');
}
