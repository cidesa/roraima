<?php


abstract class BaseFcmodlicPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcmodlic';

	
	const CLASS_DEFAULT = 'lib.model.Fcmodlic';

	
	const NUM_COLUMNS = 68;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFMOD = 'fcmodlic.REFMOD';

	
	const FECMOD = 'fcmodlic.FECMOD';

	
	const MOTMOD = 'fcmodlic.MOTMOD';

	
	const NUMSOL = 'fcmodlic.NUMSOL';

	
	const NUMLIC = 'fcmodlic.NUMLIC';

	
	const FECSOL = 'fcmodlic.FECSOL';

	
	const FECLIC = 'fcmodlic.FECLIC';

	
	const RIFCON = 'fcmodlic.RIFCON';

	
	const CATCON = 'fcmodlic.CATCON';

	
	const RIFREP = 'fcmodlic.RIFREP';

	
	const NOMNEG = 'fcmodlic.NOMNEG';

	
	const TIPINM = 'fcmodlic.TIPINM';

	
	const TIPEST = 'fcmodlic.TIPEST';

	
	const DIRPRI = 'fcmodlic.DIRPRI';

	
	const CODRUT = 'fcmodlic.CODRUT';

	
	const CAPSOC = 'fcmodlic.CAPSOC';

	
	const HORINI = 'fcmodlic.HORINI';

	
	const HORCIE = 'fcmodlic.HORCIE';

	
	const FECINI = 'fcmodlic.FECINI';

	
	const FECFIN = 'fcmodlic.FECFIN';

	
	const DISCLI = 'fcmodlic.DISCLI';

	
	const DISBAR = 'fcmodlic.DISBAR';

	
	const DISDIS = 'fcmodlic.DISDIS';

	
	const DISINS = 'fcmodlic.DISINS';

	
	const DISFUN = 'fcmodlic.DISFUN';

	
	const DISEST = 'fcmodlic.DISEST';

	
	const FUNRES = 'fcmodlic.FUNRES';

	
	const FUNREL = 'fcmodlic.FUNREL';

	
	const FECRES = 'fcmodlic.FECRES';

	
	const FECAPR = 'fcmodlic.FECAPR';

	
	const FECVEN = 'fcmodlic.FECVEN';

	
	const TOMO = 'fcmodlic.TOMO';

	
	const FOLIO = 'fcmodlic.FOLIO';

	
	const NUMERO = 'fcmodlic.NUMERO';

	
	const TASLIC = 'fcmodlic.TASLIC';

	
	const DEUANL = 'fcmodlic.DEUANL';

	
	const DEUACL = 'fcmodlic.DEUACL';

	
	const IMPLIC = 'fcmodlic.IMPLIC';

	
	const DEUANP = 'fcmodlic.DEUANP';

	
	const DEUACP = 'fcmodlic.DEUACP';

	
	const STASOL = 'fcmodlic.STASOL';

	
	const STALIC = 'fcmodlic.STALIC';

	
	const STADEC = 'fcmodlic.STADEC';

	
	const STALIQ = 'fcmodlic.STALIQ';

	
	const NOMCON = 'fcmodlic.NOMCON';

	
	const DIRCON = 'fcmodlic.DIRCON';

	
	const TIPO = 'fcmodlic.TIPO';

	
	const ESTSER = 'fcmodlic.ESTSER';

	
	const TELNEG = 'fcmodlic.TELNEG';

	
	const CLACON = 'fcmodlic.CLACON';

	
	const CAPACT = 'fcmodlic.CAPACT';

	
	const NUMSOL1 = 'fcmodlic.NUMSOL1';

	
	const NUMLIC1 = 'fcmodlic.NUMLIC1';

	
	const HORAINIE = 'fcmodlic.HORAINIE';

	
	const HORACIEE = 'fcmodlic.HORACIEE';

	
	const UNITRI = 'fcmodlic.UNITRI';

	
	const TIPSOL = 'fcmodlic.TIPSOL';

	
	const UNITRIALC = 'fcmodlic.UNITRIALC';

	
	const UNITRIOTR = 'fcmodlic.UNITRIOTR';

	
	const LICANT = 'fcmodlic.LICANT';

	
	const DUEANT = 'fcmodlic.DUEANT';

	
	const DIRANT = 'fcmodlic.DIRANT';

	
	const IMPEXT = 'fcmodlic.IMPEXT';

	
	const IMPTOTAL = 'fcmodlic.IMPTOTAL';

	
	const CODACT = 'fcmodlic.CODACT';

	
	const CODTIPLIC = 'fcmodlic.CODTIPLIC';

	
	const FECINILIC = 'fcmodlic.FECINILIC';

	
	const ID = 'fcmodlic.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refmod', 'Fecmod', 'Motmod', 'Numsol', 'Numlic', 'Fecsol', 'Feclic', 'Rifcon', 'Catcon', 'Rifrep', 'Nomneg', 'Tipinm', 'Tipest', 'Dirpri', 'Codrut', 'Capsoc', 'Horini', 'Horcie', 'Fecini', 'Fecfin', 'Discli', 'Disbar', 'Disdis', 'Disins', 'Disfun', 'Disest', 'Funres', 'Funrel', 'Fecres', 'Fecapr', 'Fecven', 'Tomo', 'Folio', 'Numero', 'Taslic', 'Deuanl', 'Deuacl', 'Implic', 'Deuanp', 'Deuacp', 'Stasol', 'Stalic', 'Stadec', 'Staliq', 'Nomcon', 'Dircon', 'Tipo', 'Estser', 'Telneg', 'Clacon', 'Capact', 'Numsol1', 'Numlic1', 'Horainie', 'Horaciee', 'Unitri', 'Tipsol', 'Unitrialc', 'Unitriotr', 'Licant', 'Dueant', 'Dirant', 'Impext', 'Imptotal', 'Codact', 'Codtiplic', 'Fecinilic', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcmodlicPeer::REFMOD, FcmodlicPeer::FECMOD, FcmodlicPeer::MOTMOD, FcmodlicPeer::NUMSOL, FcmodlicPeer::NUMLIC, FcmodlicPeer::FECSOL, FcmodlicPeer::FECLIC, FcmodlicPeer::RIFCON, FcmodlicPeer::CATCON, FcmodlicPeer::RIFREP, FcmodlicPeer::NOMNEG, FcmodlicPeer::TIPINM, FcmodlicPeer::TIPEST, FcmodlicPeer::DIRPRI, FcmodlicPeer::CODRUT, FcmodlicPeer::CAPSOC, FcmodlicPeer::HORINI, FcmodlicPeer::HORCIE, FcmodlicPeer::FECINI, FcmodlicPeer::FECFIN, FcmodlicPeer::DISCLI, FcmodlicPeer::DISBAR, FcmodlicPeer::DISDIS, FcmodlicPeer::DISINS, FcmodlicPeer::DISFUN, FcmodlicPeer::DISEST, FcmodlicPeer::FUNRES, FcmodlicPeer::FUNREL, FcmodlicPeer::FECRES, FcmodlicPeer::FECAPR, FcmodlicPeer::FECVEN, FcmodlicPeer::TOMO, FcmodlicPeer::FOLIO, FcmodlicPeer::NUMERO, FcmodlicPeer::TASLIC, FcmodlicPeer::DEUANL, FcmodlicPeer::DEUACL, FcmodlicPeer::IMPLIC, FcmodlicPeer::DEUANP, FcmodlicPeer::DEUACP, FcmodlicPeer::STASOL, FcmodlicPeer::STALIC, FcmodlicPeer::STADEC, FcmodlicPeer::STALIQ, FcmodlicPeer::NOMCON, FcmodlicPeer::DIRCON, FcmodlicPeer::TIPO, FcmodlicPeer::ESTSER, FcmodlicPeer::TELNEG, FcmodlicPeer::CLACON, FcmodlicPeer::CAPACT, FcmodlicPeer::NUMSOL1, FcmodlicPeer::NUMLIC1, FcmodlicPeer::HORAINIE, FcmodlicPeer::HORACIEE, FcmodlicPeer::UNITRI, FcmodlicPeer::TIPSOL, FcmodlicPeer::UNITRIALC, FcmodlicPeer::UNITRIOTR, FcmodlicPeer::LICANT, FcmodlicPeer::DUEANT, FcmodlicPeer::DIRANT, FcmodlicPeer::IMPEXT, FcmodlicPeer::IMPTOTAL, FcmodlicPeer::CODACT, FcmodlicPeer::CODTIPLIC, FcmodlicPeer::FECINILIC, FcmodlicPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refmod', 'fecmod', 'motmod', 'numsol', 'numlic', 'fecsol', 'feclic', 'rifcon', 'catcon', 'rifrep', 'nomneg', 'tipinm', 'tipest', 'dirpri', 'codrut', 'capsoc', 'horini', 'horcie', 'fecini', 'fecfin', 'discli', 'disbar', 'disdis', 'disins', 'disfun', 'disest', 'funres', 'funrel', 'fecres', 'fecapr', 'fecven', 'tomo', 'folio', 'numero', 'taslic', 'deuanl', 'deuacl', 'implic', 'deuanp', 'deuacp', 'stasol', 'stalic', 'stadec', 'staliq', 'nomcon', 'dircon', 'tipo', 'estser', 'telneg', 'clacon', 'capact', 'numsol1', 'numlic1', 'horainie', 'horaciee', 'unitri', 'tipsol', 'unitrialc', 'unitriotr', 'licant', 'dueant', 'dirant', 'impext', 'imptotal', 'codact', 'codtiplic', 'fecinilic', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refmod' => 0, 'Fecmod' => 1, 'Motmod' => 2, 'Numsol' => 3, 'Numlic' => 4, 'Fecsol' => 5, 'Feclic' => 6, 'Rifcon' => 7, 'Catcon' => 8, 'Rifrep' => 9, 'Nomneg' => 10, 'Tipinm' => 11, 'Tipest' => 12, 'Dirpri' => 13, 'Codrut' => 14, 'Capsoc' => 15, 'Horini' => 16, 'Horcie' => 17, 'Fecini' => 18, 'Fecfin' => 19, 'Discli' => 20, 'Disbar' => 21, 'Disdis' => 22, 'Disins' => 23, 'Disfun' => 24, 'Disest' => 25, 'Funres' => 26, 'Funrel' => 27, 'Fecres' => 28, 'Fecapr' => 29, 'Fecven' => 30, 'Tomo' => 31, 'Folio' => 32, 'Numero' => 33, 'Taslic' => 34, 'Deuanl' => 35, 'Deuacl' => 36, 'Implic' => 37, 'Deuanp' => 38, 'Deuacp' => 39, 'Stasol' => 40, 'Stalic' => 41, 'Stadec' => 42, 'Staliq' => 43, 'Nomcon' => 44, 'Dircon' => 45, 'Tipo' => 46, 'Estser' => 47, 'Telneg' => 48, 'Clacon' => 49, 'Capact' => 50, 'Numsol1' => 51, 'Numlic1' => 52, 'Horainie' => 53, 'Horaciee' => 54, 'Unitri' => 55, 'Tipsol' => 56, 'Unitrialc' => 57, 'Unitriotr' => 58, 'Licant' => 59, 'Dueant' => 60, 'Dirant' => 61, 'Impext' => 62, 'Imptotal' => 63, 'Codact' => 64, 'Codtiplic' => 65, 'Fecinilic' => 66, 'Id' => 67, ),
		BasePeer::TYPE_COLNAME => array (FcmodlicPeer::REFMOD => 0, FcmodlicPeer::FECMOD => 1, FcmodlicPeer::MOTMOD => 2, FcmodlicPeer::NUMSOL => 3, FcmodlicPeer::NUMLIC => 4, FcmodlicPeer::FECSOL => 5, FcmodlicPeer::FECLIC => 6, FcmodlicPeer::RIFCON => 7, FcmodlicPeer::CATCON => 8, FcmodlicPeer::RIFREP => 9, FcmodlicPeer::NOMNEG => 10, FcmodlicPeer::TIPINM => 11, FcmodlicPeer::TIPEST => 12, FcmodlicPeer::DIRPRI => 13, FcmodlicPeer::CODRUT => 14, FcmodlicPeer::CAPSOC => 15, FcmodlicPeer::HORINI => 16, FcmodlicPeer::HORCIE => 17, FcmodlicPeer::FECINI => 18, FcmodlicPeer::FECFIN => 19, FcmodlicPeer::DISCLI => 20, FcmodlicPeer::DISBAR => 21, FcmodlicPeer::DISDIS => 22, FcmodlicPeer::DISINS => 23, FcmodlicPeer::DISFUN => 24, FcmodlicPeer::DISEST => 25, FcmodlicPeer::FUNRES => 26, FcmodlicPeer::FUNREL => 27, FcmodlicPeer::FECRES => 28, FcmodlicPeer::FECAPR => 29, FcmodlicPeer::FECVEN => 30, FcmodlicPeer::TOMO => 31, FcmodlicPeer::FOLIO => 32, FcmodlicPeer::NUMERO => 33, FcmodlicPeer::TASLIC => 34, FcmodlicPeer::DEUANL => 35, FcmodlicPeer::DEUACL => 36, FcmodlicPeer::IMPLIC => 37, FcmodlicPeer::DEUANP => 38, FcmodlicPeer::DEUACP => 39, FcmodlicPeer::STASOL => 40, FcmodlicPeer::STALIC => 41, FcmodlicPeer::STADEC => 42, FcmodlicPeer::STALIQ => 43, FcmodlicPeer::NOMCON => 44, FcmodlicPeer::DIRCON => 45, FcmodlicPeer::TIPO => 46, FcmodlicPeer::ESTSER => 47, FcmodlicPeer::TELNEG => 48, FcmodlicPeer::CLACON => 49, FcmodlicPeer::CAPACT => 50, FcmodlicPeer::NUMSOL1 => 51, FcmodlicPeer::NUMLIC1 => 52, FcmodlicPeer::HORAINIE => 53, FcmodlicPeer::HORACIEE => 54, FcmodlicPeer::UNITRI => 55, FcmodlicPeer::TIPSOL => 56, FcmodlicPeer::UNITRIALC => 57, FcmodlicPeer::UNITRIOTR => 58, FcmodlicPeer::LICANT => 59, FcmodlicPeer::DUEANT => 60, FcmodlicPeer::DIRANT => 61, FcmodlicPeer::IMPEXT => 62, FcmodlicPeer::IMPTOTAL => 63, FcmodlicPeer::CODACT => 64, FcmodlicPeer::CODTIPLIC => 65, FcmodlicPeer::FECINILIC => 66, FcmodlicPeer::ID => 67, ),
		BasePeer::TYPE_FIELDNAME => array ('refmod' => 0, 'fecmod' => 1, 'motmod' => 2, 'numsol' => 3, 'numlic' => 4, 'fecsol' => 5, 'feclic' => 6, 'rifcon' => 7, 'catcon' => 8, 'rifrep' => 9, 'nomneg' => 10, 'tipinm' => 11, 'tipest' => 12, 'dirpri' => 13, 'codrut' => 14, 'capsoc' => 15, 'horini' => 16, 'horcie' => 17, 'fecini' => 18, 'fecfin' => 19, 'discli' => 20, 'disbar' => 21, 'disdis' => 22, 'disins' => 23, 'disfun' => 24, 'disest' => 25, 'funres' => 26, 'funrel' => 27, 'fecres' => 28, 'fecapr' => 29, 'fecven' => 30, 'tomo' => 31, 'folio' => 32, 'numero' => 33, 'taslic' => 34, 'deuanl' => 35, 'deuacl' => 36, 'implic' => 37, 'deuanp' => 38, 'deuacp' => 39, 'stasol' => 40, 'stalic' => 41, 'stadec' => 42, 'staliq' => 43, 'nomcon' => 44, 'dircon' => 45, 'tipo' => 46, 'estser' => 47, 'telneg' => 48, 'clacon' => 49, 'capact' => 50, 'numsol1' => 51, 'numlic1' => 52, 'horainie' => 53, 'horaciee' => 54, 'unitri' => 55, 'tipsol' => 56, 'unitrialc' => 57, 'unitriotr' => 58, 'licant' => 59, 'dueant' => 60, 'dirant' => 61, 'impext' => 62, 'imptotal' => 63, 'codact' => 64, 'codtiplic' => 65, 'fecinilic' => 66, 'id' => 67, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcmodlicMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcmodlicMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcmodlicPeer::getTableMap();
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
		return str_replace(FcmodlicPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcmodlicPeer::REFMOD);

		$criteria->addSelectColumn(FcmodlicPeer::FECMOD);

		$criteria->addSelectColumn(FcmodlicPeer::MOTMOD);

		$criteria->addSelectColumn(FcmodlicPeer::NUMSOL);

		$criteria->addSelectColumn(FcmodlicPeer::NUMLIC);

		$criteria->addSelectColumn(FcmodlicPeer::FECSOL);

		$criteria->addSelectColumn(FcmodlicPeer::FECLIC);

		$criteria->addSelectColumn(FcmodlicPeer::RIFCON);

		$criteria->addSelectColumn(FcmodlicPeer::CATCON);

		$criteria->addSelectColumn(FcmodlicPeer::RIFREP);

		$criteria->addSelectColumn(FcmodlicPeer::NOMNEG);

		$criteria->addSelectColumn(FcmodlicPeer::TIPINM);

		$criteria->addSelectColumn(FcmodlicPeer::TIPEST);

		$criteria->addSelectColumn(FcmodlicPeer::DIRPRI);

		$criteria->addSelectColumn(FcmodlicPeer::CODRUT);

		$criteria->addSelectColumn(FcmodlicPeer::CAPSOC);

		$criteria->addSelectColumn(FcmodlicPeer::HORINI);

		$criteria->addSelectColumn(FcmodlicPeer::HORCIE);

		$criteria->addSelectColumn(FcmodlicPeer::FECINI);

		$criteria->addSelectColumn(FcmodlicPeer::FECFIN);

		$criteria->addSelectColumn(FcmodlicPeer::DISCLI);

		$criteria->addSelectColumn(FcmodlicPeer::DISBAR);

		$criteria->addSelectColumn(FcmodlicPeer::DISDIS);

		$criteria->addSelectColumn(FcmodlicPeer::DISINS);

		$criteria->addSelectColumn(FcmodlicPeer::DISFUN);

		$criteria->addSelectColumn(FcmodlicPeer::DISEST);

		$criteria->addSelectColumn(FcmodlicPeer::FUNRES);

		$criteria->addSelectColumn(FcmodlicPeer::FUNREL);

		$criteria->addSelectColumn(FcmodlicPeer::FECRES);

		$criteria->addSelectColumn(FcmodlicPeer::FECAPR);

		$criteria->addSelectColumn(FcmodlicPeer::FECVEN);

		$criteria->addSelectColumn(FcmodlicPeer::TOMO);

		$criteria->addSelectColumn(FcmodlicPeer::FOLIO);

		$criteria->addSelectColumn(FcmodlicPeer::NUMERO);

		$criteria->addSelectColumn(FcmodlicPeer::TASLIC);

		$criteria->addSelectColumn(FcmodlicPeer::DEUANL);

		$criteria->addSelectColumn(FcmodlicPeer::DEUACL);

		$criteria->addSelectColumn(FcmodlicPeer::IMPLIC);

		$criteria->addSelectColumn(FcmodlicPeer::DEUANP);

		$criteria->addSelectColumn(FcmodlicPeer::DEUACP);

		$criteria->addSelectColumn(FcmodlicPeer::STASOL);

		$criteria->addSelectColumn(FcmodlicPeer::STALIC);

		$criteria->addSelectColumn(FcmodlicPeer::STADEC);

		$criteria->addSelectColumn(FcmodlicPeer::STALIQ);

		$criteria->addSelectColumn(FcmodlicPeer::NOMCON);

		$criteria->addSelectColumn(FcmodlicPeer::DIRCON);

		$criteria->addSelectColumn(FcmodlicPeer::TIPO);

		$criteria->addSelectColumn(FcmodlicPeer::ESTSER);

		$criteria->addSelectColumn(FcmodlicPeer::TELNEG);

		$criteria->addSelectColumn(FcmodlicPeer::CLACON);

		$criteria->addSelectColumn(FcmodlicPeer::CAPACT);

		$criteria->addSelectColumn(FcmodlicPeer::NUMSOL1);

		$criteria->addSelectColumn(FcmodlicPeer::NUMLIC1);

		$criteria->addSelectColumn(FcmodlicPeer::HORAINIE);

		$criteria->addSelectColumn(FcmodlicPeer::HORACIEE);

		$criteria->addSelectColumn(FcmodlicPeer::UNITRI);

		$criteria->addSelectColumn(FcmodlicPeer::TIPSOL);

		$criteria->addSelectColumn(FcmodlicPeer::UNITRIALC);

		$criteria->addSelectColumn(FcmodlicPeer::UNITRIOTR);

		$criteria->addSelectColumn(FcmodlicPeer::LICANT);

		$criteria->addSelectColumn(FcmodlicPeer::DUEANT);

		$criteria->addSelectColumn(FcmodlicPeer::DIRANT);

		$criteria->addSelectColumn(FcmodlicPeer::IMPEXT);

		$criteria->addSelectColumn(FcmodlicPeer::IMPTOTAL);

		$criteria->addSelectColumn(FcmodlicPeer::CODACT);

		$criteria->addSelectColumn(FcmodlicPeer::CODTIPLIC);

		$criteria->addSelectColumn(FcmodlicPeer::FECINILIC);

		$criteria->addSelectColumn(FcmodlicPeer::ID);

	}

	const COUNT = 'COUNT(fcmodlic.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcmodlic.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcmodlicPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcmodlicPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcmodlicPeer::doSelectRS($criteria, $con);
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
		$objects = FcmodlicPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcmodlicPeer::populateObjects(FcmodlicPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcmodlicPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcmodlicPeer::getOMClass();
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
		return FcmodlicPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FcmodlicPeer::ID); 

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
			$comparison = $criteria->getComparison(FcmodlicPeer::ID);
			$selectCriteria->add(FcmodlicPeer::ID, $criteria->remove(FcmodlicPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcmodlicPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcmodlicPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcmodlic) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcmodlicPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcmodlic $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcmodlicPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcmodlicPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcmodlicPeer::DATABASE_NAME, FcmodlicPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcmodlicPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcmodlicPeer::DATABASE_NAME);

		$criteria->add(FcmodlicPeer::ID, $pk);


		$v = FcmodlicPeer::doSelect($criteria, $con);

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
			$criteria->add(FcmodlicPeer::ID, $pks, Criteria::IN);
			$objs = FcmodlicPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcmodlicPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcmodlicMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcmodlicMapBuilder');
}
