<?php


abstract class BaseFcinmmodPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcinmmod';

	
	const CLASS_DEFAULT = 'lib.model.Fcinmmod';

	
	const NUM_COLUMNS = 62;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NROINM = 'fcinmmod.NROINM';

	
	const CODCATFIS = 'fcinmmod.CODCATFIS';

	
	const CODUSO = 'fcinmmod.CODUSO';

	
	const CODCARINM = 'fcinmmod.CODCARINM';

	
	const CODSITINM = 'fcinmmod.CODSITINM';

	
	const RIFCON = 'fcinmmod.RIFCON';

	
	const FECPAG = 'fcinmmod.FECPAG';

	
	const FECCAL = 'fcinmmod.FECCAL';

	
	const FECREG = 'fcinmmod.FECREG';

	
	const DIRINM = 'fcinmmod.DIRINM';

	
	const LINNOR = 'fcinmmod.LINNOR';

	
	const LINSUR = 'fcinmmod.LINSUR';

	
	const LINEST = 'fcinmmod.LINEST';

	
	const LINOES = 'fcinmmod.LINOES';

	
	const MTRTER = 'fcinmmod.MTRTER';

	
	const MTRCON = 'fcinmmod.MTRCON';

	
	const BSTER = 'fcinmmod.BSTER';

	
	const BSCON = 'fcinmmod.BSCON';

	
	const DOCPRO = 'fcinmmod.DOCPRO';

	
	const RIFREP = 'fcinmmod.RIFREP';

	
	const FUNREC = 'fcinmmod.FUNREC';

	
	const FECREC = 'fcinmmod.FECREC';

	
	const ESTINM = 'fcinmmod.ESTINM';

	
	const ESTDEC = 'fcinmmod.ESTDEC';

	
	const CODCATINM = 'fcinmmod.CODCATINM';

	
	const NOMCON = 'fcinmmod.NOMCON';

	
	const DIRCON = 'fcinmmod.DIRCON';

	
	const CLACON = 'fcinmmod.CLACON';

	
	const FECADQ = 'fcinmmod.FECADQ';

	
	const VALINM = 'fcinmmod.VALINM';

	
	const CODMAN = 'fcinmmod.CODMAN';

	
	const CODSEC = 'fcinmmod.CODSEC';

	
	const CODPAR = 'fcinmmod.CODPAR';

	
	const NROINMANT = 'fcinmmod.NROINMANT';

	
	const TOTTER = 'fcinmmod.TOTTER';

	
	const TOTCON = 'fcinmmod.TOTCON';

	
	const TOTAL = 'fcinmmod.TOTAL';

	
	const CODTIP = 'fcinmmod.CODTIP';

	
	const CODZON = 'fcinmmod.CODZON';

	
	const DESTIP = 'fcinmmod.DESTIP';

	
	const DESZON = 'fcinmmod.DESZON';

	
	const ANUAL = 'fcinmmod.ANUAL';

	
	const FOLIO = 'fcinmmod.FOLIO';

	
	const TOMO = 'fcinmmod.TOMO';

	
	const NUMDOC = 'fcinmmod.NUMDOC';

	
	const FECDOC = 'fcinmmod.FECDOC';

	
	const USOINM = 'fcinmmod.USOINM';

	
	const DESDE = 'fcinmmod.DESDE';

	
	const HASTA = 'fcinmmod.HASTA';

	
	const ORD = 'fcinmmod.ORD';

	
	const ART = 'fcinmmod.ART';

	
	const FECDIR = 'fcinmmod.FECDIR';

	
	const FECAVA = 'fcinmmod.FECAVA';

	
	const DIRINM1 = 'fcinmmod.DIRINM1';

	
	const FECELA = 'fcinmmod.FECELA';

	
	const TRI = 'fcinmmod.TRI';

	
	const PROT = 'fcinmmod.PROT';

	
	const TIPOBOL = 'fcinmmod.TIPOBOL';

	
	const NOMSITINM = 'fcinmmod.NOMSITINM';

	
	const IMPANU = 'fcinmmod.IMPANU';

	
	const IMPTRI = 'fcinmmod.IMPTRI';

	
	const ID = 'fcinmmod.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Nroinm', 'Codcatfis', 'Coduso', 'Codcarinm', 'Codsitinm', 'Rifcon', 'Fecpag', 'Feccal', 'Fecreg', 'Dirinm', 'Linnor', 'Linsur', 'Linest', 'Linoes', 'Mtrter', 'Mtrcon', 'Bster', 'Bscon', 'Docpro', 'Rifrep', 'Funrec', 'Fecrec', 'Estinm', 'Estdec', 'Codcatinm', 'Nomcon', 'Dircon', 'Clacon', 'Fecadq', 'Valinm', 'Codman', 'Codsec', 'Codpar', 'Nroinmant', 'Totter', 'Totcon', 'Total', 'Codtip', 'Codzon', 'Destip', 'Deszon', 'Anual', 'Folio', 'Tomo', 'Numdoc', 'Fecdoc', 'Usoinm', 'Desde', 'Hasta', 'Ord', 'Art', 'Fecdir', 'Fecava', 'Dirinm1', 'Fecela', 'Tri', 'Prot', 'Tipobol', 'Nomsitinm', 'Impanu', 'Imptri', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcinmmodPeer::NROINM, FcinmmodPeer::CODCATFIS, FcinmmodPeer::CODUSO, FcinmmodPeer::CODCARINM, FcinmmodPeer::CODSITINM, FcinmmodPeer::RIFCON, FcinmmodPeer::FECPAG, FcinmmodPeer::FECCAL, FcinmmodPeer::FECREG, FcinmmodPeer::DIRINM, FcinmmodPeer::LINNOR, FcinmmodPeer::LINSUR, FcinmmodPeer::LINEST, FcinmmodPeer::LINOES, FcinmmodPeer::MTRTER, FcinmmodPeer::MTRCON, FcinmmodPeer::BSTER, FcinmmodPeer::BSCON, FcinmmodPeer::DOCPRO, FcinmmodPeer::RIFREP, FcinmmodPeer::FUNREC, FcinmmodPeer::FECREC, FcinmmodPeer::ESTINM, FcinmmodPeer::ESTDEC, FcinmmodPeer::CODCATINM, FcinmmodPeer::NOMCON, FcinmmodPeer::DIRCON, FcinmmodPeer::CLACON, FcinmmodPeer::FECADQ, FcinmmodPeer::VALINM, FcinmmodPeer::CODMAN, FcinmmodPeer::CODSEC, FcinmmodPeer::CODPAR, FcinmmodPeer::NROINMANT, FcinmmodPeer::TOTTER, FcinmmodPeer::TOTCON, FcinmmodPeer::TOTAL, FcinmmodPeer::CODTIP, FcinmmodPeer::CODZON, FcinmmodPeer::DESTIP, FcinmmodPeer::DESZON, FcinmmodPeer::ANUAL, FcinmmodPeer::FOLIO, FcinmmodPeer::TOMO, FcinmmodPeer::NUMDOC, FcinmmodPeer::FECDOC, FcinmmodPeer::USOINM, FcinmmodPeer::DESDE, FcinmmodPeer::HASTA, FcinmmodPeer::ORD, FcinmmodPeer::ART, FcinmmodPeer::FECDIR, FcinmmodPeer::FECAVA, FcinmmodPeer::DIRINM1, FcinmmodPeer::FECELA, FcinmmodPeer::TRI, FcinmmodPeer::PROT, FcinmmodPeer::TIPOBOL, FcinmmodPeer::NOMSITINM, FcinmmodPeer::IMPANU, FcinmmodPeer::IMPTRI, FcinmmodPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('nroinm', 'codcatfis', 'coduso', 'codcarinm', 'codsitinm', 'rifcon', 'fecpag', 'feccal', 'fecreg', 'dirinm', 'linnor', 'linsur', 'linest', 'linoes', 'mtrter', 'mtrcon', 'bster', 'bscon', 'docpro', 'rifrep', 'funrec', 'fecrec', 'estinm', 'estdec', 'codcatinm', 'nomcon', 'dircon', 'clacon', 'fecadq', 'valinm', 'codman', 'codsec', 'codpar', 'nroinmant', 'totter', 'totcon', 'total', 'codtip', 'codzon', 'destip', 'deszon', 'anual', 'folio', 'tomo', 'numdoc', 'fecdoc', 'usoinm', 'desde', 'hasta', 'ord', 'art', 'fecdir', 'fecava', 'dirinm1', 'fecela', 'tri', 'prot', 'tipobol', 'nomsitinm', 'impanu', 'imptri', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Nroinm' => 0, 'Codcatfis' => 1, 'Coduso' => 2, 'Codcarinm' => 3, 'Codsitinm' => 4, 'Rifcon' => 5, 'Fecpag' => 6, 'Feccal' => 7, 'Fecreg' => 8, 'Dirinm' => 9, 'Linnor' => 10, 'Linsur' => 11, 'Linest' => 12, 'Linoes' => 13, 'Mtrter' => 14, 'Mtrcon' => 15, 'Bster' => 16, 'Bscon' => 17, 'Docpro' => 18, 'Rifrep' => 19, 'Funrec' => 20, 'Fecrec' => 21, 'Estinm' => 22, 'Estdec' => 23, 'Codcatinm' => 24, 'Nomcon' => 25, 'Dircon' => 26, 'Clacon' => 27, 'Fecadq' => 28, 'Valinm' => 29, 'Codman' => 30, 'Codsec' => 31, 'Codpar' => 32, 'Nroinmant' => 33, 'Totter' => 34, 'Totcon' => 35, 'Total' => 36, 'Codtip' => 37, 'Codzon' => 38, 'Destip' => 39, 'Deszon' => 40, 'Anual' => 41, 'Folio' => 42, 'Tomo' => 43, 'Numdoc' => 44, 'Fecdoc' => 45, 'Usoinm' => 46, 'Desde' => 47, 'Hasta' => 48, 'Ord' => 49, 'Art' => 50, 'Fecdir' => 51, 'Fecava' => 52, 'Dirinm1' => 53, 'Fecela' => 54, 'Tri' => 55, 'Prot' => 56, 'Tipobol' => 57, 'Nomsitinm' => 58, 'Impanu' => 59, 'Imptri' => 60, 'Id' => 61, ),
		BasePeer::TYPE_COLNAME => array (FcinmmodPeer::NROINM => 0, FcinmmodPeer::CODCATFIS => 1, FcinmmodPeer::CODUSO => 2, FcinmmodPeer::CODCARINM => 3, FcinmmodPeer::CODSITINM => 4, FcinmmodPeer::RIFCON => 5, FcinmmodPeer::FECPAG => 6, FcinmmodPeer::FECCAL => 7, FcinmmodPeer::FECREG => 8, FcinmmodPeer::DIRINM => 9, FcinmmodPeer::LINNOR => 10, FcinmmodPeer::LINSUR => 11, FcinmmodPeer::LINEST => 12, FcinmmodPeer::LINOES => 13, FcinmmodPeer::MTRTER => 14, FcinmmodPeer::MTRCON => 15, FcinmmodPeer::BSTER => 16, FcinmmodPeer::BSCON => 17, FcinmmodPeer::DOCPRO => 18, FcinmmodPeer::RIFREP => 19, FcinmmodPeer::FUNREC => 20, FcinmmodPeer::FECREC => 21, FcinmmodPeer::ESTINM => 22, FcinmmodPeer::ESTDEC => 23, FcinmmodPeer::CODCATINM => 24, FcinmmodPeer::NOMCON => 25, FcinmmodPeer::DIRCON => 26, FcinmmodPeer::CLACON => 27, FcinmmodPeer::FECADQ => 28, FcinmmodPeer::VALINM => 29, FcinmmodPeer::CODMAN => 30, FcinmmodPeer::CODSEC => 31, FcinmmodPeer::CODPAR => 32, FcinmmodPeer::NROINMANT => 33, FcinmmodPeer::TOTTER => 34, FcinmmodPeer::TOTCON => 35, FcinmmodPeer::TOTAL => 36, FcinmmodPeer::CODTIP => 37, FcinmmodPeer::CODZON => 38, FcinmmodPeer::DESTIP => 39, FcinmmodPeer::DESZON => 40, FcinmmodPeer::ANUAL => 41, FcinmmodPeer::FOLIO => 42, FcinmmodPeer::TOMO => 43, FcinmmodPeer::NUMDOC => 44, FcinmmodPeer::FECDOC => 45, FcinmmodPeer::USOINM => 46, FcinmmodPeer::DESDE => 47, FcinmmodPeer::HASTA => 48, FcinmmodPeer::ORD => 49, FcinmmodPeer::ART => 50, FcinmmodPeer::FECDIR => 51, FcinmmodPeer::FECAVA => 52, FcinmmodPeer::DIRINM1 => 53, FcinmmodPeer::FECELA => 54, FcinmmodPeer::TRI => 55, FcinmmodPeer::PROT => 56, FcinmmodPeer::TIPOBOL => 57, FcinmmodPeer::NOMSITINM => 58, FcinmmodPeer::IMPANU => 59, FcinmmodPeer::IMPTRI => 60, FcinmmodPeer::ID => 61, ),
		BasePeer::TYPE_FIELDNAME => array ('nroinm' => 0, 'codcatfis' => 1, 'coduso' => 2, 'codcarinm' => 3, 'codsitinm' => 4, 'rifcon' => 5, 'fecpag' => 6, 'feccal' => 7, 'fecreg' => 8, 'dirinm' => 9, 'linnor' => 10, 'linsur' => 11, 'linest' => 12, 'linoes' => 13, 'mtrter' => 14, 'mtrcon' => 15, 'bster' => 16, 'bscon' => 17, 'docpro' => 18, 'rifrep' => 19, 'funrec' => 20, 'fecrec' => 21, 'estinm' => 22, 'estdec' => 23, 'codcatinm' => 24, 'nomcon' => 25, 'dircon' => 26, 'clacon' => 27, 'fecadq' => 28, 'valinm' => 29, 'codman' => 30, 'codsec' => 31, 'codpar' => 32, 'nroinmant' => 33, 'totter' => 34, 'totcon' => 35, 'total' => 36, 'codtip' => 37, 'codzon' => 38, 'destip' => 39, 'deszon' => 40, 'anual' => 41, 'folio' => 42, 'tomo' => 43, 'numdoc' => 44, 'fecdoc' => 45, 'usoinm' => 46, 'desde' => 47, 'hasta' => 48, 'ord' => 49, 'art' => 50, 'fecdir' => 51, 'fecava' => 52, 'dirinm1' => 53, 'fecela' => 54, 'tri' => 55, 'prot' => 56, 'tipobol' => 57, 'nomsitinm' => 58, 'impanu' => 59, 'imptri' => 60, 'id' => 61, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcinmmodMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcinmmodMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcinmmodPeer::getTableMap();
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
		return str_replace(FcinmmodPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcinmmodPeer::NROINM);

		$criteria->addSelectColumn(FcinmmodPeer::CODCATFIS);

		$criteria->addSelectColumn(FcinmmodPeer::CODUSO);

		$criteria->addSelectColumn(FcinmmodPeer::CODCARINM);

		$criteria->addSelectColumn(FcinmmodPeer::CODSITINM);

		$criteria->addSelectColumn(FcinmmodPeer::RIFCON);

		$criteria->addSelectColumn(FcinmmodPeer::FECPAG);

		$criteria->addSelectColumn(FcinmmodPeer::FECCAL);

		$criteria->addSelectColumn(FcinmmodPeer::FECREG);

		$criteria->addSelectColumn(FcinmmodPeer::DIRINM);

		$criteria->addSelectColumn(FcinmmodPeer::LINNOR);

		$criteria->addSelectColumn(FcinmmodPeer::LINSUR);

		$criteria->addSelectColumn(FcinmmodPeer::LINEST);

		$criteria->addSelectColumn(FcinmmodPeer::LINOES);

		$criteria->addSelectColumn(FcinmmodPeer::MTRTER);

		$criteria->addSelectColumn(FcinmmodPeer::MTRCON);

		$criteria->addSelectColumn(FcinmmodPeer::BSTER);

		$criteria->addSelectColumn(FcinmmodPeer::BSCON);

		$criteria->addSelectColumn(FcinmmodPeer::DOCPRO);

		$criteria->addSelectColumn(FcinmmodPeer::RIFREP);

		$criteria->addSelectColumn(FcinmmodPeer::FUNREC);

		$criteria->addSelectColumn(FcinmmodPeer::FECREC);

		$criteria->addSelectColumn(FcinmmodPeer::ESTINM);

		$criteria->addSelectColumn(FcinmmodPeer::ESTDEC);

		$criteria->addSelectColumn(FcinmmodPeer::CODCATINM);

		$criteria->addSelectColumn(FcinmmodPeer::NOMCON);

		$criteria->addSelectColumn(FcinmmodPeer::DIRCON);

		$criteria->addSelectColumn(FcinmmodPeer::CLACON);

		$criteria->addSelectColumn(FcinmmodPeer::FECADQ);

		$criteria->addSelectColumn(FcinmmodPeer::VALINM);

		$criteria->addSelectColumn(FcinmmodPeer::CODMAN);

		$criteria->addSelectColumn(FcinmmodPeer::CODSEC);

		$criteria->addSelectColumn(FcinmmodPeer::CODPAR);

		$criteria->addSelectColumn(FcinmmodPeer::NROINMANT);

		$criteria->addSelectColumn(FcinmmodPeer::TOTTER);

		$criteria->addSelectColumn(FcinmmodPeer::TOTCON);

		$criteria->addSelectColumn(FcinmmodPeer::TOTAL);

		$criteria->addSelectColumn(FcinmmodPeer::CODTIP);

		$criteria->addSelectColumn(FcinmmodPeer::CODZON);

		$criteria->addSelectColumn(FcinmmodPeer::DESTIP);

		$criteria->addSelectColumn(FcinmmodPeer::DESZON);

		$criteria->addSelectColumn(FcinmmodPeer::ANUAL);

		$criteria->addSelectColumn(FcinmmodPeer::FOLIO);

		$criteria->addSelectColumn(FcinmmodPeer::TOMO);

		$criteria->addSelectColumn(FcinmmodPeer::NUMDOC);

		$criteria->addSelectColumn(FcinmmodPeer::FECDOC);

		$criteria->addSelectColumn(FcinmmodPeer::USOINM);

		$criteria->addSelectColumn(FcinmmodPeer::DESDE);

		$criteria->addSelectColumn(FcinmmodPeer::HASTA);

		$criteria->addSelectColumn(FcinmmodPeer::ORD);

		$criteria->addSelectColumn(FcinmmodPeer::ART);

		$criteria->addSelectColumn(FcinmmodPeer::FECDIR);

		$criteria->addSelectColumn(FcinmmodPeer::FECAVA);

		$criteria->addSelectColumn(FcinmmodPeer::DIRINM1);

		$criteria->addSelectColumn(FcinmmodPeer::FECELA);

		$criteria->addSelectColumn(FcinmmodPeer::TRI);

		$criteria->addSelectColumn(FcinmmodPeer::PROT);

		$criteria->addSelectColumn(FcinmmodPeer::TIPOBOL);

		$criteria->addSelectColumn(FcinmmodPeer::NOMSITINM);

		$criteria->addSelectColumn(FcinmmodPeer::IMPANU);

		$criteria->addSelectColumn(FcinmmodPeer::IMPTRI);

		$criteria->addSelectColumn(FcinmmodPeer::ID);

	}

	const COUNT = 'COUNT(fcinmmod.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcinmmod.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcinmmodPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcinmmodPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcinmmodPeer::doSelectRS($criteria, $con);
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
		$objects = FcinmmodPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcinmmodPeer::populateObjects(FcinmmodPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcinmmodPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcinmmodPeer::getOMClass();
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
		return FcinmmodPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(FcinmmodPeer::ID);
			$selectCriteria->add(FcinmmodPeer::ID, $criteria->remove(FcinmmodPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcinmmodPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcinmmodPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcinmmod) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcinmmodPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcinmmod $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcinmmodPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcinmmodPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcinmmodPeer::DATABASE_NAME, FcinmmodPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcinmmodPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcinmmodPeer::DATABASE_NAME);

		$criteria->add(FcinmmodPeer::ID, $pk);


		$v = FcinmmodPeer::doSelect($criteria, $con);

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
			$criteria->add(FcinmmodPeer::ID, $pks, Criteria::IN);
			$objs = FcinmmodPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcinmmodPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcinmmodMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcinmmodMapBuilder');
}
