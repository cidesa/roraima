<?php


abstract class BaseFordefpryPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fordefpry';

	
	const CLASS_DEFAULT = 'lib.model.Fordefpry';

	
	const NUM_COLUMNS = 76;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODPRO = 'fordefpry.CODPRO';

	
	const NOMPRO = 'fordefpry.NOMPRO';

	
	const PROACC = 'fordefpry.PROACC';

	
	const CODSTA = 'fordefpry.CODSTA';

	
	const CODSITPRE = 'fordefpry.CODSITPRE';

	
	const CONPOA = 'fordefpry.CONPOA';

	
	const FECINI = 'fordefpry.FECINI';

	
	const FECCUL = 'fordefpry.FECCUL';

	
	const UBINAC = 'fordefpry.UBINAC';

	
	const CODEQU = 'fordefpry.CODEQU';

	
	const CODSUBOBJ = 'fordefpry.CODSUBOBJ';

	
	const CODSUBSUBOBJ = 'fordefpry.CODSUBSUBOBJ';

	
	const OBJESTNUEETA = 'fordefpry.OBJESTNUEETA';

	
	const OBJESTINS = 'fordefpry.OBJESTINS';

	
	const OBJEESPPRO = 'fordefpry.OBJEESPPRO';

	
	const INDPRO = 'fordefpry.INDPRO';

	
	const ENUPRO = 'fordefpry.ENUPRO';

	
	const INDSITACT = 'fordefpry.INDSITACT';

	
	const FECULTDAT = 'fordefpry.FECULTDAT';

	
	const FORIND = 'fordefpry.FORIND';

	
	const FUEIND = 'fordefpry.FUEIND';

	
	const INDSITOBJ = 'fordefpry.INDSITOBJ';

	
	const TIEIMP = 'fordefpry.TIEIMP';

	
	const RESPRO = 'fordefpry.RESPRO';

	
	const DESMET = 'fordefpry.DESMET';

	
	const CODUNIMEDMET = 'fordefpry.CODUNIMEDMET';

	
	const CANTMET = 'fordefpry.CANTMET';

	
	const BENPRO = 'fordefpry.BENPRO';

	
	const CODEJEDES = 'fordefpry.CODEJEDES';

	
	const CODNUCDES = 'fordefpry.CODNUCDES';

	
	const CODZONECO = 'fordefpry.CODZONECO';

	
	const COMINDUST = 'fordefpry.COMINDUST';

	
	const CODSEC = 'fordefpry.CODSEC';

	
	const CODSUBSEC = 'fordefpry.CODSUBSEC';

	
	const MONTOTPRY = 'fordefpry.MONTOTPRY';

	
	const CODEMP = 'fordefpry.CODEMP';

	
	const NOMEMP = 'fordefpry.NOMEMP';

	
	const CAREMP = 'fordefpry.CAREMP';

	
	const UNIADSEMP = 'fordefpry.UNIADSEMP';

	
	const TELEMP = 'fordefpry.TELEMP';

	
	const FAXEMP = 'fordefpry.FAXEMP';

	
	const EMAEMP = 'fordefpry.EMAEMP';

	
	const ACCOTRINS = 'fordefpry.ACCOTRINS';

	
	const OBSACCOTRINS = 'fordefpry.OBSACCOTRINS';

	
	const CONPRYOTR = 'fordefpry.CONPRYOTR';

	
	const OBSCONPRYOTR = 'fordefpry.OBSCONPRYOTR';

	
	const CONOTRPRY = 'fordefpry.CONOTRPRY';

	
	const OBSCONOTRPRY = 'fordefpry.OBSCONOTRPRY';

	
	const TIPACCAGE = 'fordefpry.TIPACCAGE';

	
	const PLACONTIN = 'fordefpry.PLACONTIN';

	
	const OBSPLACONTIN = 'fordefpry.OBSPLACONTIN';

	
	const NROEMPDIR = 'fordefpry.NROEMPDIR';

	
	const NROEMPIND = 'fordefpry.NROEMPIND';

	
	const DESBREPRY = 'fordefpry.DESBREPRY';

	
	const PORAVAFIS = 'fordefpry.PORAVAFIS';

	
	const PORAVAFIN = 'fordefpry.PORAVAFIN';

	
	const UNIEJEPRI = 'fordefpry.UNIEJEPRI';

	
	const UBIGEO = 'fordefpry.UBIGEO';

	
	const PLACTG = 'fordefpry.PLACTG';

	
	const CODDIR = 'fordefpry.CODDIR';

	
	const FACRZG = 'fordefpry.FACRZG';

	
	const OBJPNDES = 'fordefpry.OBJPNDES';

	
	const UNIMEDRES = 'fordefpry.UNIMEDRES';

	
	const CODPRG = 'fordefpry.CODPRG';

	
	const CODPRYONAPRE = 'fordefpry.CODPRYONAPRE';

	
	const TIEEJEANOPRY = 'fordefpry.TIEEJEANOPRY';

	
	const TIEEJEMESPRY = 'fordefpry.TIEEJEMESPRY';

	
	const CODOBJNVAETA = 'fordefpry.CODOBJNVAETA';

	
	const SITOBJDES = 'fordefpry.SITOBJDES';

	
	const TIEIMPMES = 'fordefpry.TIEIMPMES';

	
	const TIEIMPANO = 'fordefpry.TIEIMPANO';

	
	const NUCDESEND = 'fordefpry.NUCDESEND';

	
	const ZONECODES = 'fordefpry.ZONECODES';

	
	const ACCINM = 'fordefpry.ACCINM';

	
	const ACCDIF = 'fordefpry.ACCDIF';

	
	const ID = 'fordefpry.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codpro', 'Nompro', 'Proacc', 'Codsta', 'Codsitpre', 'Conpoa', 'Fecini', 'Feccul', 'Ubinac', 'Codequ', 'Codsubobj', 'Codsubsubobj', 'Objestnueeta', 'Objestins', 'Objeesppro', 'Indpro', 'Enupro', 'Indsitact', 'Fecultdat', 'Forind', 'Fueind', 'Indsitobj', 'Tieimp', 'Respro', 'Desmet', 'Codunimedmet', 'Cantmet', 'Benpro', 'Codejedes', 'Codnucdes', 'Codzoneco', 'Comindust', 'Codsec', 'Codsubsec', 'Montotpry', 'Codemp', 'Nomemp', 'Caremp', 'Uniadsemp', 'Telemp', 'Faxemp', 'Emaemp', 'Accotrins', 'Obsaccotrins', 'Conpryotr', 'Obsconpryotr', 'Conotrpry', 'Obsconotrpry', 'Tipaccage', 'Placontin', 'Obsplacontin', 'Nroempdir', 'Nroempind', 'Desbrepry', 'Poravafis', 'Poravafin', 'Uniejepri', 'Ubigeo', 'Plactg', 'Coddir', 'Facrzg', 'Objpndes', 'Unimedres', 'Codprg', 'Codpryonapre', 'Tieejeanopry', 'Tieejemespry', 'Codobjnvaeta', 'Sitobjdes', 'Tieimpmes', 'Tieimpano', 'Nucdesend', 'Zonecodes', 'Accinm', 'Accdif', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FordefpryPeer::CODPRO, FordefpryPeer::NOMPRO, FordefpryPeer::PROACC, FordefpryPeer::CODSTA, FordefpryPeer::CODSITPRE, FordefpryPeer::CONPOA, FordefpryPeer::FECINI, FordefpryPeer::FECCUL, FordefpryPeer::UBINAC, FordefpryPeer::CODEQU, FordefpryPeer::CODSUBOBJ, FordefpryPeer::CODSUBSUBOBJ, FordefpryPeer::OBJESTNUEETA, FordefpryPeer::OBJESTINS, FordefpryPeer::OBJEESPPRO, FordefpryPeer::INDPRO, FordefpryPeer::ENUPRO, FordefpryPeer::INDSITACT, FordefpryPeer::FECULTDAT, FordefpryPeer::FORIND, FordefpryPeer::FUEIND, FordefpryPeer::INDSITOBJ, FordefpryPeer::TIEIMP, FordefpryPeer::RESPRO, FordefpryPeer::DESMET, FordefpryPeer::CODUNIMEDMET, FordefpryPeer::CANTMET, FordefpryPeer::BENPRO, FordefpryPeer::CODEJEDES, FordefpryPeer::CODNUCDES, FordefpryPeer::CODZONECO, FordefpryPeer::COMINDUST, FordefpryPeer::CODSEC, FordefpryPeer::CODSUBSEC, FordefpryPeer::MONTOTPRY, FordefpryPeer::CODEMP, FordefpryPeer::NOMEMP, FordefpryPeer::CAREMP, FordefpryPeer::UNIADSEMP, FordefpryPeer::TELEMP, FordefpryPeer::FAXEMP, FordefpryPeer::EMAEMP, FordefpryPeer::ACCOTRINS, FordefpryPeer::OBSACCOTRINS, FordefpryPeer::CONPRYOTR, FordefpryPeer::OBSCONPRYOTR, FordefpryPeer::CONOTRPRY, FordefpryPeer::OBSCONOTRPRY, FordefpryPeer::TIPACCAGE, FordefpryPeer::PLACONTIN, FordefpryPeer::OBSPLACONTIN, FordefpryPeer::NROEMPDIR, FordefpryPeer::NROEMPIND, FordefpryPeer::DESBREPRY, FordefpryPeer::PORAVAFIS, FordefpryPeer::PORAVAFIN, FordefpryPeer::UNIEJEPRI, FordefpryPeer::UBIGEO, FordefpryPeer::PLACTG, FordefpryPeer::CODDIR, FordefpryPeer::FACRZG, FordefpryPeer::OBJPNDES, FordefpryPeer::UNIMEDRES, FordefpryPeer::CODPRG, FordefpryPeer::CODPRYONAPRE, FordefpryPeer::TIEEJEANOPRY, FordefpryPeer::TIEEJEMESPRY, FordefpryPeer::CODOBJNVAETA, FordefpryPeer::SITOBJDES, FordefpryPeer::TIEIMPMES, FordefpryPeer::TIEIMPANO, FordefpryPeer::NUCDESEND, FordefpryPeer::ZONECODES, FordefpryPeer::ACCINM, FordefpryPeer::ACCDIF, FordefpryPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codpro', 'nompro', 'proacc', 'codsta', 'codsitpre', 'conpoa', 'fecini', 'feccul', 'ubinac', 'codequ', 'codsubobj', 'codsubsubobj', 'objestnueeta', 'objestins', 'objeesppro', 'indpro', 'enupro', 'indsitact', 'fecultdat', 'forind', 'fueind', 'indsitobj', 'tieimp', 'respro', 'desmet', 'codunimedmet', 'cantmet', 'benpro', 'codejedes', 'codnucdes', 'codzoneco', 'comindust', 'codsec', 'codsubsec', 'montotpry', 'codemp', 'nomemp', 'caremp', 'uniadsemp', 'telemp', 'faxemp', 'emaemp', 'accotrins', 'obsaccotrins', 'conpryotr', 'obsconpryotr', 'conotrpry', 'obsconotrpry', 'tipaccage', 'placontin', 'obsplacontin', 'nroempdir', 'nroempind', 'desbrepry', 'poravafis', 'poravafin', 'uniejepri', 'ubigeo', 'plactg', 'coddir', 'facrzg', 'objpndes', 'unimedres', 'codprg', 'codpryonapre', 'tieejeanopry', 'tieejemespry', 'codobjnvaeta', 'sitobjdes', 'tieimpmes', 'tieimpano', 'nucdesend', 'zonecodes', 'accinm', 'accdif', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codpro' => 0, 'Nompro' => 1, 'Proacc' => 2, 'Codsta' => 3, 'Codsitpre' => 4, 'Conpoa' => 5, 'Fecini' => 6, 'Feccul' => 7, 'Ubinac' => 8, 'Codequ' => 9, 'Codsubobj' => 10, 'Codsubsubobj' => 11, 'Objestnueeta' => 12, 'Objestins' => 13, 'Objeesppro' => 14, 'Indpro' => 15, 'Enupro' => 16, 'Indsitact' => 17, 'Fecultdat' => 18, 'Forind' => 19, 'Fueind' => 20, 'Indsitobj' => 21, 'Tieimp' => 22, 'Respro' => 23, 'Desmet' => 24, 'Codunimedmet' => 25, 'Cantmet' => 26, 'Benpro' => 27, 'Codejedes' => 28, 'Codnucdes' => 29, 'Codzoneco' => 30, 'Comindust' => 31, 'Codsec' => 32, 'Codsubsec' => 33, 'Montotpry' => 34, 'Codemp' => 35, 'Nomemp' => 36, 'Caremp' => 37, 'Uniadsemp' => 38, 'Telemp' => 39, 'Faxemp' => 40, 'Emaemp' => 41, 'Accotrins' => 42, 'Obsaccotrins' => 43, 'Conpryotr' => 44, 'Obsconpryotr' => 45, 'Conotrpry' => 46, 'Obsconotrpry' => 47, 'Tipaccage' => 48, 'Placontin' => 49, 'Obsplacontin' => 50, 'Nroempdir' => 51, 'Nroempind' => 52, 'Desbrepry' => 53, 'Poravafis' => 54, 'Poravafin' => 55, 'Uniejepri' => 56, 'Ubigeo' => 57, 'Plactg' => 58, 'Coddir' => 59, 'Facrzg' => 60, 'Objpndes' => 61, 'Unimedres' => 62, 'Codprg' => 63, 'Codpryonapre' => 64, 'Tieejeanopry' => 65, 'Tieejemespry' => 66, 'Codobjnvaeta' => 67, 'Sitobjdes' => 68, 'Tieimpmes' => 69, 'Tieimpano' => 70, 'Nucdesend' => 71, 'Zonecodes' => 72, 'Accinm' => 73, 'Accdif' => 74, 'Id' => 75, ),
		BasePeer::TYPE_COLNAME => array (FordefpryPeer::CODPRO => 0, FordefpryPeer::NOMPRO => 1, FordefpryPeer::PROACC => 2, FordefpryPeer::CODSTA => 3, FordefpryPeer::CODSITPRE => 4, FordefpryPeer::CONPOA => 5, FordefpryPeer::FECINI => 6, FordefpryPeer::FECCUL => 7, FordefpryPeer::UBINAC => 8, FordefpryPeer::CODEQU => 9, FordefpryPeer::CODSUBOBJ => 10, FordefpryPeer::CODSUBSUBOBJ => 11, FordefpryPeer::OBJESTNUEETA => 12, FordefpryPeer::OBJESTINS => 13, FordefpryPeer::OBJEESPPRO => 14, FordefpryPeer::INDPRO => 15, FordefpryPeer::ENUPRO => 16, FordefpryPeer::INDSITACT => 17, FordefpryPeer::FECULTDAT => 18, FordefpryPeer::FORIND => 19, FordefpryPeer::FUEIND => 20, FordefpryPeer::INDSITOBJ => 21, FordefpryPeer::TIEIMP => 22, FordefpryPeer::RESPRO => 23, FordefpryPeer::DESMET => 24, FordefpryPeer::CODUNIMEDMET => 25, FordefpryPeer::CANTMET => 26, FordefpryPeer::BENPRO => 27, FordefpryPeer::CODEJEDES => 28, FordefpryPeer::CODNUCDES => 29, FordefpryPeer::CODZONECO => 30, FordefpryPeer::COMINDUST => 31, FordefpryPeer::CODSEC => 32, FordefpryPeer::CODSUBSEC => 33, FordefpryPeer::MONTOTPRY => 34, FordefpryPeer::CODEMP => 35, FordefpryPeer::NOMEMP => 36, FordefpryPeer::CAREMP => 37, FordefpryPeer::UNIADSEMP => 38, FordefpryPeer::TELEMP => 39, FordefpryPeer::FAXEMP => 40, FordefpryPeer::EMAEMP => 41, FordefpryPeer::ACCOTRINS => 42, FordefpryPeer::OBSACCOTRINS => 43, FordefpryPeer::CONPRYOTR => 44, FordefpryPeer::OBSCONPRYOTR => 45, FordefpryPeer::CONOTRPRY => 46, FordefpryPeer::OBSCONOTRPRY => 47, FordefpryPeer::TIPACCAGE => 48, FordefpryPeer::PLACONTIN => 49, FordefpryPeer::OBSPLACONTIN => 50, FordefpryPeer::NROEMPDIR => 51, FordefpryPeer::NROEMPIND => 52, FordefpryPeer::DESBREPRY => 53, FordefpryPeer::PORAVAFIS => 54, FordefpryPeer::PORAVAFIN => 55, FordefpryPeer::UNIEJEPRI => 56, FordefpryPeer::UBIGEO => 57, FordefpryPeer::PLACTG => 58, FordefpryPeer::CODDIR => 59, FordefpryPeer::FACRZG => 60, FordefpryPeer::OBJPNDES => 61, FordefpryPeer::UNIMEDRES => 62, FordefpryPeer::CODPRG => 63, FordefpryPeer::CODPRYONAPRE => 64, FordefpryPeer::TIEEJEANOPRY => 65, FordefpryPeer::TIEEJEMESPRY => 66, FordefpryPeer::CODOBJNVAETA => 67, FordefpryPeer::SITOBJDES => 68, FordefpryPeer::TIEIMPMES => 69, FordefpryPeer::TIEIMPANO => 70, FordefpryPeer::NUCDESEND => 71, FordefpryPeer::ZONECODES => 72, FordefpryPeer::ACCINM => 73, FordefpryPeer::ACCDIF => 74, FordefpryPeer::ID => 75, ),
		BasePeer::TYPE_FIELDNAME => array ('codpro' => 0, 'nompro' => 1, 'proacc' => 2, 'codsta' => 3, 'codsitpre' => 4, 'conpoa' => 5, 'fecini' => 6, 'feccul' => 7, 'ubinac' => 8, 'codequ' => 9, 'codsubobj' => 10, 'codsubsubobj' => 11, 'objestnueeta' => 12, 'objestins' => 13, 'objeesppro' => 14, 'indpro' => 15, 'enupro' => 16, 'indsitact' => 17, 'fecultdat' => 18, 'forind' => 19, 'fueind' => 20, 'indsitobj' => 21, 'tieimp' => 22, 'respro' => 23, 'desmet' => 24, 'codunimedmet' => 25, 'cantmet' => 26, 'benpro' => 27, 'codejedes' => 28, 'codnucdes' => 29, 'codzoneco' => 30, 'comindust' => 31, 'codsec' => 32, 'codsubsec' => 33, 'montotpry' => 34, 'codemp' => 35, 'nomemp' => 36, 'caremp' => 37, 'uniadsemp' => 38, 'telemp' => 39, 'faxemp' => 40, 'emaemp' => 41, 'accotrins' => 42, 'obsaccotrins' => 43, 'conpryotr' => 44, 'obsconpryotr' => 45, 'conotrpry' => 46, 'obsconotrpry' => 47, 'tipaccage' => 48, 'placontin' => 49, 'obsplacontin' => 50, 'nroempdir' => 51, 'nroempind' => 52, 'desbrepry' => 53, 'poravafis' => 54, 'poravafin' => 55, 'uniejepri' => 56, 'ubigeo' => 57, 'plactg' => 58, 'coddir' => 59, 'facrzg' => 60, 'objpndes' => 61, 'unimedres' => 62, 'codprg' => 63, 'codpryonapre' => 64, 'tieejeanopry' => 65, 'tieejemespry' => 66, 'codobjnvaeta' => 67, 'sitobjdes' => 68, 'tieimpmes' => 69, 'tieimpano' => 70, 'nucdesend' => 71, 'zonecodes' => 72, 'accinm' => 73, 'accdif' => 74, 'id' => 75, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FordefpryMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FordefpryMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FordefpryPeer::getTableMap();
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
		return str_replace(FordefpryPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FordefpryPeer::CODPRO);

		$criteria->addSelectColumn(FordefpryPeer::NOMPRO);

		$criteria->addSelectColumn(FordefpryPeer::PROACC);

		$criteria->addSelectColumn(FordefpryPeer::CODSTA);

		$criteria->addSelectColumn(FordefpryPeer::CODSITPRE);

		$criteria->addSelectColumn(FordefpryPeer::CONPOA);

		$criteria->addSelectColumn(FordefpryPeer::FECINI);

		$criteria->addSelectColumn(FordefpryPeer::FECCUL);

		$criteria->addSelectColumn(FordefpryPeer::UBINAC);

		$criteria->addSelectColumn(FordefpryPeer::CODEQU);

		$criteria->addSelectColumn(FordefpryPeer::CODSUBOBJ);

		$criteria->addSelectColumn(FordefpryPeer::CODSUBSUBOBJ);

		$criteria->addSelectColumn(FordefpryPeer::OBJESTNUEETA);

		$criteria->addSelectColumn(FordefpryPeer::OBJESTINS);

		$criteria->addSelectColumn(FordefpryPeer::OBJEESPPRO);

		$criteria->addSelectColumn(FordefpryPeer::INDPRO);

		$criteria->addSelectColumn(FordefpryPeer::ENUPRO);

		$criteria->addSelectColumn(FordefpryPeer::INDSITACT);

		$criteria->addSelectColumn(FordefpryPeer::FECULTDAT);

		$criteria->addSelectColumn(FordefpryPeer::FORIND);

		$criteria->addSelectColumn(FordefpryPeer::FUEIND);

		$criteria->addSelectColumn(FordefpryPeer::INDSITOBJ);

		$criteria->addSelectColumn(FordefpryPeer::TIEIMP);

		$criteria->addSelectColumn(FordefpryPeer::RESPRO);

		$criteria->addSelectColumn(FordefpryPeer::DESMET);

		$criteria->addSelectColumn(FordefpryPeer::CODUNIMEDMET);

		$criteria->addSelectColumn(FordefpryPeer::CANTMET);

		$criteria->addSelectColumn(FordefpryPeer::BENPRO);

		$criteria->addSelectColumn(FordefpryPeer::CODEJEDES);

		$criteria->addSelectColumn(FordefpryPeer::CODNUCDES);

		$criteria->addSelectColumn(FordefpryPeer::CODZONECO);

		$criteria->addSelectColumn(FordefpryPeer::COMINDUST);

		$criteria->addSelectColumn(FordefpryPeer::CODSEC);

		$criteria->addSelectColumn(FordefpryPeer::CODSUBSEC);

		$criteria->addSelectColumn(FordefpryPeer::MONTOTPRY);

		$criteria->addSelectColumn(FordefpryPeer::CODEMP);

		$criteria->addSelectColumn(FordefpryPeer::NOMEMP);

		$criteria->addSelectColumn(FordefpryPeer::CAREMP);

		$criteria->addSelectColumn(FordefpryPeer::UNIADSEMP);

		$criteria->addSelectColumn(FordefpryPeer::TELEMP);

		$criteria->addSelectColumn(FordefpryPeer::FAXEMP);

		$criteria->addSelectColumn(FordefpryPeer::EMAEMP);

		$criteria->addSelectColumn(FordefpryPeer::ACCOTRINS);

		$criteria->addSelectColumn(FordefpryPeer::OBSACCOTRINS);

		$criteria->addSelectColumn(FordefpryPeer::CONPRYOTR);

		$criteria->addSelectColumn(FordefpryPeer::OBSCONPRYOTR);

		$criteria->addSelectColumn(FordefpryPeer::CONOTRPRY);

		$criteria->addSelectColumn(FordefpryPeer::OBSCONOTRPRY);

		$criteria->addSelectColumn(FordefpryPeer::TIPACCAGE);

		$criteria->addSelectColumn(FordefpryPeer::PLACONTIN);

		$criteria->addSelectColumn(FordefpryPeer::OBSPLACONTIN);

		$criteria->addSelectColumn(FordefpryPeer::NROEMPDIR);

		$criteria->addSelectColumn(FordefpryPeer::NROEMPIND);

		$criteria->addSelectColumn(FordefpryPeer::DESBREPRY);

		$criteria->addSelectColumn(FordefpryPeer::PORAVAFIS);

		$criteria->addSelectColumn(FordefpryPeer::PORAVAFIN);

		$criteria->addSelectColumn(FordefpryPeer::UNIEJEPRI);

		$criteria->addSelectColumn(FordefpryPeer::UBIGEO);

		$criteria->addSelectColumn(FordefpryPeer::PLACTG);

		$criteria->addSelectColumn(FordefpryPeer::CODDIR);

		$criteria->addSelectColumn(FordefpryPeer::FACRZG);

		$criteria->addSelectColumn(FordefpryPeer::OBJPNDES);

		$criteria->addSelectColumn(FordefpryPeer::UNIMEDRES);

		$criteria->addSelectColumn(FordefpryPeer::CODPRG);

		$criteria->addSelectColumn(FordefpryPeer::CODPRYONAPRE);

		$criteria->addSelectColumn(FordefpryPeer::TIEEJEANOPRY);

		$criteria->addSelectColumn(FordefpryPeer::TIEEJEMESPRY);

		$criteria->addSelectColumn(FordefpryPeer::CODOBJNVAETA);

		$criteria->addSelectColumn(FordefpryPeer::SITOBJDES);

		$criteria->addSelectColumn(FordefpryPeer::TIEIMPMES);

		$criteria->addSelectColumn(FordefpryPeer::TIEIMPANO);

		$criteria->addSelectColumn(FordefpryPeer::NUCDESEND);

		$criteria->addSelectColumn(FordefpryPeer::ZONECODES);

		$criteria->addSelectColumn(FordefpryPeer::ACCINM);

		$criteria->addSelectColumn(FordefpryPeer::ACCDIF);

		$criteria->addSelectColumn(FordefpryPeer::ID);

	}

	const COUNT = 'COUNT(fordefpry.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fordefpry.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FordefpryPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FordefpryPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FordefpryPeer::doSelectRS($criteria, $con);
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
		$objects = FordefpryPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FordefpryPeer::populateObjects(FordefpryPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FordefpryPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FordefpryPeer::getOMClass();
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
		return FordefpryPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FordefpryPeer::ID); 

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
			$comparison = $criteria->getComparison(FordefpryPeer::ID);
			$selectCriteria->add(FordefpryPeer::ID, $criteria->remove(FordefpryPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FordefpryPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FordefpryPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fordefpry) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FordefpryPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fordefpry $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FordefpryPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FordefpryPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FordefpryPeer::DATABASE_NAME, FordefpryPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FordefpryPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FordefpryPeer::DATABASE_NAME);

		$criteria->add(FordefpryPeer::ID, $pk);


		$v = FordefpryPeer::doSelect($criteria, $con);

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
			$criteria->add(FordefpryPeer::ID, $pks, Criteria::IN);
			$objs = FordefpryPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFordefpryPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FordefpryMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FordefpryMapBuilder');
}
