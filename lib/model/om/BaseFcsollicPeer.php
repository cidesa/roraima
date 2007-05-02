<?php


abstract class BaseFcsollicPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcsollic';

	
	const CLASS_DEFAULT = 'lib.model.Fcsollic';

	
	const NUM_COLUMNS = 63;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMSOL = 'fcsollic.NUMSOL';

	
	const NUMLIC = 'fcsollic.NUMLIC';

	
	const FECSOL = 'fcsollic.FECSOL';

	
	const FECLIC = 'fcsollic.FECLIC';

	
	const RIFCON = 'fcsollic.RIFCON';

	
	const CATCON = 'fcsollic.CATCON';

	
	const RIFREP = 'fcsollic.RIFREP';

	
	const NOMNEG = 'fcsollic.NOMNEG';

	
	const TIPINM = 'fcsollic.TIPINM';

	
	const TIPEST = 'fcsollic.TIPEST';

	
	const DIRPRI = 'fcsollic.DIRPRI';

	
	const CODRUT = 'fcsollic.CODRUT';

	
	const CAPSOC = 'fcsollic.CAPSOC';

	
	const HORINI = 'fcsollic.HORINI';

	
	const HORCIE = 'fcsollic.HORCIE';

	
	const FECINI = 'fcsollic.FECINI';

	
	const FECFIN = 'fcsollic.FECFIN';

	
	const DISCLI = 'fcsollic.DISCLI';

	
	const DISBAR = 'fcsollic.DISBAR';

	
	const DISDIS = 'fcsollic.DISDIS';

	
	const DISINS = 'fcsollic.DISINS';

	
	const DISFUN = 'fcsollic.DISFUN';

	
	const DISEST = 'fcsollic.DISEST';

	
	const FUNRES = 'fcsollic.FUNRES';

	
	const FUNREL = 'fcsollic.FUNREL';

	
	const FECRES = 'fcsollic.FECRES';

	
	const FECAPR = 'fcsollic.FECAPR';

	
	const FECVEN = 'fcsollic.FECVEN';

	
	const TOMO = 'fcsollic.TOMO';

	
	const FOLIO = 'fcsollic.FOLIO';

	
	const NUMERO = 'fcsollic.NUMERO';

	
	const TASLIC = 'fcsollic.TASLIC';

	
	const DEUANL = 'fcsollic.DEUANL';

	
	const DEUACL = 'fcsollic.DEUACL';

	
	const IMPLIC = 'fcsollic.IMPLIC';

	
	const DEUANP = 'fcsollic.DEUANP';

	
	const DEUACP = 'fcsollic.DEUACP';

	
	const STASOL = 'fcsollic.STASOL';

	
	const STALIC = 'fcsollic.STALIC';

	
	const STADEC = 'fcsollic.STADEC';

	
	const STALIQ = 'fcsollic.STALIQ';

	
	const NOMCON = 'fcsollic.NOMCON';

	
	const DIRCON = 'fcsollic.DIRCON';

	
	const TIPO = 'fcsollic.TIPO';

	
	const ESTSER = 'fcsollic.ESTSER';

	
	const TELNEG = 'fcsollic.TELNEG';

	
	const CLACON = 'fcsollic.CLACON';

	
	const CAPACT = 'fcsollic.CAPACT';

	
	const NUMSOL1 = 'fcsollic.NUMSOL1';

	
	const NUMLIC1 = 'fcsollic.NUMLIC1';

	
	const HORAINIE = 'fcsollic.HORAINIE';

	
	const HORACIEE = 'fcsollic.HORACIEE';

	
	const UNITRI = 'fcsollic.UNITRI';

	
	const TIPSOL = 'fcsollic.TIPSOL';

	
	const UNITRIALC = 'fcsollic.UNITRIALC';

	
	const UNITRIOTR = 'fcsollic.UNITRIOTR';

	
	const LICANT = 'fcsollic.LICANT';

	
	const DUEANT = 'fcsollic.DUEANT';

	
	const DIRANT = 'fcsollic.DIRANT';

	
	const IMPEXT = 'fcsollic.IMPEXT';

	
	const IMPTOTAL = 'fcsollic.IMPTOTAL';

	
	const CODACT = 'fcsollic.CODACT';

	
	const ID = 'fcsollic.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numsol', 'Numlic', 'Fecsol', 'Feclic', 'Rifcon', 'Catcon', 'Rifrep', 'Nomneg', 'Tipinm', 'Tipest', 'Dirpri', 'Codrut', 'Capsoc', 'Horini', 'Horcie', 'Fecini', 'Fecfin', 'Discli', 'Disbar', 'Disdis', 'Disins', 'Disfun', 'Disest', 'Funres', 'Funrel', 'Fecres', 'Fecapr', 'Fecven', 'Tomo', 'Folio', 'Numero', 'Taslic', 'Deuanl', 'Deuacl', 'Implic', 'Deuanp', 'Deuacp', 'Stasol', 'Stalic', 'Stadec', 'Staliq', 'Nomcon', 'Dircon', 'Tipo', 'Estser', 'Telneg', 'Clacon', 'Capact', 'Numsol1', 'Numlic1', 'Horainie', 'Horaciee', 'Unitri', 'Tipsol', 'Unitrialc', 'Unitriotr', 'Licant', 'Dueant', 'Dirant', 'Impext', 'Imptotal', 'Codact', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcsollicPeer::NUMSOL, FcsollicPeer::NUMLIC, FcsollicPeer::FECSOL, FcsollicPeer::FECLIC, FcsollicPeer::RIFCON, FcsollicPeer::CATCON, FcsollicPeer::RIFREP, FcsollicPeer::NOMNEG, FcsollicPeer::TIPINM, FcsollicPeer::TIPEST, FcsollicPeer::DIRPRI, FcsollicPeer::CODRUT, FcsollicPeer::CAPSOC, FcsollicPeer::HORINI, FcsollicPeer::HORCIE, FcsollicPeer::FECINI, FcsollicPeer::FECFIN, FcsollicPeer::DISCLI, FcsollicPeer::DISBAR, FcsollicPeer::DISDIS, FcsollicPeer::DISINS, FcsollicPeer::DISFUN, FcsollicPeer::DISEST, FcsollicPeer::FUNRES, FcsollicPeer::FUNREL, FcsollicPeer::FECRES, FcsollicPeer::FECAPR, FcsollicPeer::FECVEN, FcsollicPeer::TOMO, FcsollicPeer::FOLIO, FcsollicPeer::NUMERO, FcsollicPeer::TASLIC, FcsollicPeer::DEUANL, FcsollicPeer::DEUACL, FcsollicPeer::IMPLIC, FcsollicPeer::DEUANP, FcsollicPeer::DEUACP, FcsollicPeer::STASOL, FcsollicPeer::STALIC, FcsollicPeer::STADEC, FcsollicPeer::STALIQ, FcsollicPeer::NOMCON, FcsollicPeer::DIRCON, FcsollicPeer::TIPO, FcsollicPeer::ESTSER, FcsollicPeer::TELNEG, FcsollicPeer::CLACON, FcsollicPeer::CAPACT, FcsollicPeer::NUMSOL1, FcsollicPeer::NUMLIC1, FcsollicPeer::HORAINIE, FcsollicPeer::HORACIEE, FcsollicPeer::UNITRI, FcsollicPeer::TIPSOL, FcsollicPeer::UNITRIALC, FcsollicPeer::UNITRIOTR, FcsollicPeer::LICANT, FcsollicPeer::DUEANT, FcsollicPeer::DIRANT, FcsollicPeer::IMPEXT, FcsollicPeer::IMPTOTAL, FcsollicPeer::CODACT, FcsollicPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numsol', 'numlic', 'fecsol', 'feclic', 'rifcon', 'catcon', 'rifrep', 'nomneg', 'tipinm', 'tipest', 'dirpri', 'codrut', 'capsoc', 'horini', 'horcie', 'fecini', 'fecfin', 'discli', 'disbar', 'disdis', 'disins', 'disfun', 'disest', 'funres', 'funrel', 'fecres', 'fecapr', 'fecven', 'tomo', 'folio', 'numero', 'taslic', 'deuanl', 'deuacl', 'implic', 'deuanp', 'deuacp', 'stasol', 'stalic', 'stadec', 'staliq', 'nomcon', 'dircon', 'tipo', 'estser', 'telneg', 'clacon', 'capact', 'numsol1', 'numlic1', 'horainie', 'horaciee', 'unitri', 'tipsol', 'unitrialc', 'unitriotr', 'licant', 'dueant', 'dirant', 'impext', 'imptotal', 'codact', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numsol' => 0, 'Numlic' => 1, 'Fecsol' => 2, 'Feclic' => 3, 'Rifcon' => 4, 'Catcon' => 5, 'Rifrep' => 6, 'Nomneg' => 7, 'Tipinm' => 8, 'Tipest' => 9, 'Dirpri' => 10, 'Codrut' => 11, 'Capsoc' => 12, 'Horini' => 13, 'Horcie' => 14, 'Fecini' => 15, 'Fecfin' => 16, 'Discli' => 17, 'Disbar' => 18, 'Disdis' => 19, 'Disins' => 20, 'Disfun' => 21, 'Disest' => 22, 'Funres' => 23, 'Funrel' => 24, 'Fecres' => 25, 'Fecapr' => 26, 'Fecven' => 27, 'Tomo' => 28, 'Folio' => 29, 'Numero' => 30, 'Taslic' => 31, 'Deuanl' => 32, 'Deuacl' => 33, 'Implic' => 34, 'Deuanp' => 35, 'Deuacp' => 36, 'Stasol' => 37, 'Stalic' => 38, 'Stadec' => 39, 'Staliq' => 40, 'Nomcon' => 41, 'Dircon' => 42, 'Tipo' => 43, 'Estser' => 44, 'Telneg' => 45, 'Clacon' => 46, 'Capact' => 47, 'Numsol1' => 48, 'Numlic1' => 49, 'Horainie' => 50, 'Horaciee' => 51, 'Unitri' => 52, 'Tipsol' => 53, 'Unitrialc' => 54, 'Unitriotr' => 55, 'Licant' => 56, 'Dueant' => 57, 'Dirant' => 58, 'Impext' => 59, 'Imptotal' => 60, 'Codact' => 61, 'Id' => 62, ),
		BasePeer::TYPE_COLNAME => array (FcsollicPeer::NUMSOL => 0, FcsollicPeer::NUMLIC => 1, FcsollicPeer::FECSOL => 2, FcsollicPeer::FECLIC => 3, FcsollicPeer::RIFCON => 4, FcsollicPeer::CATCON => 5, FcsollicPeer::RIFREP => 6, FcsollicPeer::NOMNEG => 7, FcsollicPeer::TIPINM => 8, FcsollicPeer::TIPEST => 9, FcsollicPeer::DIRPRI => 10, FcsollicPeer::CODRUT => 11, FcsollicPeer::CAPSOC => 12, FcsollicPeer::HORINI => 13, FcsollicPeer::HORCIE => 14, FcsollicPeer::FECINI => 15, FcsollicPeer::FECFIN => 16, FcsollicPeer::DISCLI => 17, FcsollicPeer::DISBAR => 18, FcsollicPeer::DISDIS => 19, FcsollicPeer::DISINS => 20, FcsollicPeer::DISFUN => 21, FcsollicPeer::DISEST => 22, FcsollicPeer::FUNRES => 23, FcsollicPeer::FUNREL => 24, FcsollicPeer::FECRES => 25, FcsollicPeer::FECAPR => 26, FcsollicPeer::FECVEN => 27, FcsollicPeer::TOMO => 28, FcsollicPeer::FOLIO => 29, FcsollicPeer::NUMERO => 30, FcsollicPeer::TASLIC => 31, FcsollicPeer::DEUANL => 32, FcsollicPeer::DEUACL => 33, FcsollicPeer::IMPLIC => 34, FcsollicPeer::DEUANP => 35, FcsollicPeer::DEUACP => 36, FcsollicPeer::STASOL => 37, FcsollicPeer::STALIC => 38, FcsollicPeer::STADEC => 39, FcsollicPeer::STALIQ => 40, FcsollicPeer::NOMCON => 41, FcsollicPeer::DIRCON => 42, FcsollicPeer::TIPO => 43, FcsollicPeer::ESTSER => 44, FcsollicPeer::TELNEG => 45, FcsollicPeer::CLACON => 46, FcsollicPeer::CAPACT => 47, FcsollicPeer::NUMSOL1 => 48, FcsollicPeer::NUMLIC1 => 49, FcsollicPeer::HORAINIE => 50, FcsollicPeer::HORACIEE => 51, FcsollicPeer::UNITRI => 52, FcsollicPeer::TIPSOL => 53, FcsollicPeer::UNITRIALC => 54, FcsollicPeer::UNITRIOTR => 55, FcsollicPeer::LICANT => 56, FcsollicPeer::DUEANT => 57, FcsollicPeer::DIRANT => 58, FcsollicPeer::IMPEXT => 59, FcsollicPeer::IMPTOTAL => 60, FcsollicPeer::CODACT => 61, FcsollicPeer::ID => 62, ),
		BasePeer::TYPE_FIELDNAME => array ('numsol' => 0, 'numlic' => 1, 'fecsol' => 2, 'feclic' => 3, 'rifcon' => 4, 'catcon' => 5, 'rifrep' => 6, 'nomneg' => 7, 'tipinm' => 8, 'tipest' => 9, 'dirpri' => 10, 'codrut' => 11, 'capsoc' => 12, 'horini' => 13, 'horcie' => 14, 'fecini' => 15, 'fecfin' => 16, 'discli' => 17, 'disbar' => 18, 'disdis' => 19, 'disins' => 20, 'disfun' => 21, 'disest' => 22, 'funres' => 23, 'funrel' => 24, 'fecres' => 25, 'fecapr' => 26, 'fecven' => 27, 'tomo' => 28, 'folio' => 29, 'numero' => 30, 'taslic' => 31, 'deuanl' => 32, 'deuacl' => 33, 'implic' => 34, 'deuanp' => 35, 'deuacp' => 36, 'stasol' => 37, 'stalic' => 38, 'stadec' => 39, 'staliq' => 40, 'nomcon' => 41, 'dircon' => 42, 'tipo' => 43, 'estser' => 44, 'telneg' => 45, 'clacon' => 46, 'capact' => 47, 'numsol1' => 48, 'numlic1' => 49, 'horainie' => 50, 'horaciee' => 51, 'unitri' => 52, 'tipsol' => 53, 'unitrialc' => 54, 'unitriotr' => 55, 'licant' => 56, 'dueant' => 57, 'dirant' => 58, 'impext' => 59, 'imptotal' => 60, 'codact' => 61, 'id' => 62, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcsollicMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcsollicMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcsollicPeer::getTableMap();
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
		return str_replace(FcsollicPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcsollicPeer::NUMSOL);

		$criteria->addSelectColumn(FcsollicPeer::NUMLIC);

		$criteria->addSelectColumn(FcsollicPeer::FECSOL);

		$criteria->addSelectColumn(FcsollicPeer::FECLIC);

		$criteria->addSelectColumn(FcsollicPeer::RIFCON);

		$criteria->addSelectColumn(FcsollicPeer::CATCON);

		$criteria->addSelectColumn(FcsollicPeer::RIFREP);

		$criteria->addSelectColumn(FcsollicPeer::NOMNEG);

		$criteria->addSelectColumn(FcsollicPeer::TIPINM);

		$criteria->addSelectColumn(FcsollicPeer::TIPEST);

		$criteria->addSelectColumn(FcsollicPeer::DIRPRI);

		$criteria->addSelectColumn(FcsollicPeer::CODRUT);

		$criteria->addSelectColumn(FcsollicPeer::CAPSOC);

		$criteria->addSelectColumn(FcsollicPeer::HORINI);

		$criteria->addSelectColumn(FcsollicPeer::HORCIE);

		$criteria->addSelectColumn(FcsollicPeer::FECINI);

		$criteria->addSelectColumn(FcsollicPeer::FECFIN);

		$criteria->addSelectColumn(FcsollicPeer::DISCLI);

		$criteria->addSelectColumn(FcsollicPeer::DISBAR);

		$criteria->addSelectColumn(FcsollicPeer::DISDIS);

		$criteria->addSelectColumn(FcsollicPeer::DISINS);

		$criteria->addSelectColumn(FcsollicPeer::DISFUN);

		$criteria->addSelectColumn(FcsollicPeer::DISEST);

		$criteria->addSelectColumn(FcsollicPeer::FUNRES);

		$criteria->addSelectColumn(FcsollicPeer::FUNREL);

		$criteria->addSelectColumn(FcsollicPeer::FECRES);

		$criteria->addSelectColumn(FcsollicPeer::FECAPR);

		$criteria->addSelectColumn(FcsollicPeer::FECVEN);

		$criteria->addSelectColumn(FcsollicPeer::TOMO);

		$criteria->addSelectColumn(FcsollicPeer::FOLIO);

		$criteria->addSelectColumn(FcsollicPeer::NUMERO);

		$criteria->addSelectColumn(FcsollicPeer::TASLIC);

		$criteria->addSelectColumn(FcsollicPeer::DEUANL);

		$criteria->addSelectColumn(FcsollicPeer::DEUACL);

		$criteria->addSelectColumn(FcsollicPeer::IMPLIC);

		$criteria->addSelectColumn(FcsollicPeer::DEUANP);

		$criteria->addSelectColumn(FcsollicPeer::DEUACP);

		$criteria->addSelectColumn(FcsollicPeer::STASOL);

		$criteria->addSelectColumn(FcsollicPeer::STALIC);

		$criteria->addSelectColumn(FcsollicPeer::STADEC);

		$criteria->addSelectColumn(FcsollicPeer::STALIQ);

		$criteria->addSelectColumn(FcsollicPeer::NOMCON);

		$criteria->addSelectColumn(FcsollicPeer::DIRCON);

		$criteria->addSelectColumn(FcsollicPeer::TIPO);

		$criteria->addSelectColumn(FcsollicPeer::ESTSER);

		$criteria->addSelectColumn(FcsollicPeer::TELNEG);

		$criteria->addSelectColumn(FcsollicPeer::CLACON);

		$criteria->addSelectColumn(FcsollicPeer::CAPACT);

		$criteria->addSelectColumn(FcsollicPeer::NUMSOL1);

		$criteria->addSelectColumn(FcsollicPeer::NUMLIC1);

		$criteria->addSelectColumn(FcsollicPeer::HORAINIE);

		$criteria->addSelectColumn(FcsollicPeer::HORACIEE);

		$criteria->addSelectColumn(FcsollicPeer::UNITRI);

		$criteria->addSelectColumn(FcsollicPeer::TIPSOL);

		$criteria->addSelectColumn(FcsollicPeer::UNITRIALC);

		$criteria->addSelectColumn(FcsollicPeer::UNITRIOTR);

		$criteria->addSelectColumn(FcsollicPeer::LICANT);

		$criteria->addSelectColumn(FcsollicPeer::DUEANT);

		$criteria->addSelectColumn(FcsollicPeer::DIRANT);

		$criteria->addSelectColumn(FcsollicPeer::IMPEXT);

		$criteria->addSelectColumn(FcsollicPeer::IMPTOTAL);

		$criteria->addSelectColumn(FcsollicPeer::CODACT);

		$criteria->addSelectColumn(FcsollicPeer::ID);

	}

	const COUNT = 'COUNT(fcsollic.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcsollic.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcsollicPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcsollicPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcsollicPeer::doSelectRS($criteria, $con);
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
		$objects = FcsollicPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcsollicPeer::populateObjects(FcsollicPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcsollicPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcsollicPeer::getOMClass();
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
		return FcsollicPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(FcsollicPeer::ID);
			$selectCriteria->add(FcsollicPeer::ID, $criteria->remove(FcsollicPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcsollicPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcsollicPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcsollic) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcsollicPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcsollic $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcsollicPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcsollicPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcsollicPeer::DATABASE_NAME, FcsollicPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcsollicPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcsollicPeer::DATABASE_NAME);

		$criteria->add(FcsollicPeer::ID, $pk);


		$v = FcsollicPeer::doSelect($criteria, $con);

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
			$criteria->add(FcsollicPeer::ID, $pks, Criteria::IN);
			$objs = FcsollicPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcsollicPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcsollicMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcsollicMapBuilder');
}
