<?php


abstract class BaseCcbenefiPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccbenefi';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccbenefi';

	
	const NUM_COLUMNS = 53;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccbenefi.ID';

	
	const CEDRIF = 'ccbenefi.CEDRIF';

	
	const NOMBEN = 'ccbenefi.NOMBEN';

	
	const SEXREP = 'ccbenefi.SEXREP';

	
	const FECNAC = 'ccbenefi.FECNAC';

	
	const NUMASO = 'ccbenefi.NUMASO';

	
	const NUMHOM = 'ccbenefi.NUMHOM';

	
	const NUMMUJ = 'ccbenefi.NUMMUJ';

	
	const NUMREGSUN = 'ccbenefi.NUMREGSUN';

	
	const EMPACTMUJ = 'ccbenefi.EMPACTMUJ';

	
	const EMPACTHOM = 'ccbenefi.EMPACTHOM';

	
	const CAPSOC = 'ccbenefi.CAPSOC';

	
	const CAPCON = 'ccbenefi.CAPCON';

	
	const FECCON = 'ccbenefi.FECCON';

	
	const DURACI = 'ccbenefi.DURACI';

	
	const DIRNOMURB = 'ccbenefi.DIRNOMURB';

	
	const DIRCALLES = 'ccbenefi.DIRCALLES';

	
	const DIRCASEDI = 'ccbenefi.DIRCASEDI';

	
	const DIRNUMPIS = 'ccbenefi.DIRNUMPIS';

	
	const DIRAPATAR = 'ccbenefi.DIRAPATAR';

	
	const DIRPUNREF = 'ccbenefi.DIRPUNREF';

	
	const TELBEN = 'ccbenefi.TELBEN';

	
	const CELBEN = 'ccbenefi.CELBEN';

	
	const FAXBEN = 'ccbenefi.FAXBEN';

	
	const CODARETEL = 'ccbenefi.CODARETEL';

	
	const CODARECEL = 'ccbenefi.CODARECEL';

	
	const CODAREFAX = 'ccbenefi.CODAREFAX';

	
	const CORELE = 'ccbenefi.CORELE';

	
	const CREANT = 'ccbenefi.CREANT';

	
	const PROELA = 'ccbenefi.PROELA';

	
	const MATPRI = 'ccbenefi.MATPRI';

	
	const DISSISVEN = 'ccbenefi.DISSISVEN';

	
	const INGRES = 'ccbenefi.INGRES';

	
	const ESPACTECO = 'ccbenefi.ESPACTECO';

	
	const OCUPA = 'ccbenefi.OCUPA';

	
	const PROFE = 'ccbenefi.PROFE';

	
	const NUMNOM = 'ccbenefi.NUMNOM';

	
	const FECING = 'ccbenefi.FECING';

	
	const EXTEN = 'ccbenefi.EXTEN';

	
	const INGMEN = 'ccbenefi.INGMEN';

	
	const OTROING = 'ccbenefi.OTROING';

	
	const DETOTROING = 'ccbenefi.DETOTROING';

	
	const CCPERPRE_ID = 'ccbenefi.CCPERPRE_ID';

	
	const CCESTCIV_ID = 'ccbenefi.CCESTCIV_ID';

	
	const CCTIPUPS_ID = 'ccbenefi.CCTIPUPS_ID';

	
	const CCPARROQ_ID = 'ccbenefi.CCPARROQ_ID';

	
	const CCSECECO_ID = 'ccbenefi.CCSECECO_ID';

	
	const CCACTECO_ID = 'ccbenefi.CCACTECO_ID';

	
	const CCORIMATPRI_ID = 'ccbenefi.CCORIMATPRI_ID';

	
	const CCCARGO_ID = 'ccbenefi.CCCARGO_ID';

	
	const CCCONDIC_ID = 'ccbenefi.CCCONDIC_ID';

	
	const CCUBIADM_ID = 'ccbenefi.CCUBIADM_ID';

	
	const CCCIUDAD_ID = 'ccbenefi.CCCIUDAD_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Cedrif', 'Nomben', 'Sexrep', 'Fecnac', 'Numaso', 'Numhom', 'Nummuj', 'Numregsun', 'Empactmuj', 'Empacthom', 'Capsoc', 'Capcon', 'Feccon', 'Duraci', 'Dirnomurb', 'Dircalles', 'Dircasedi', 'Dirnumpis', 'Dirapatar', 'Dirpunref', 'Telben', 'Celben', 'Faxben', 'Codaretel', 'Codarecel', 'Codarefax', 'Corele', 'Creant', 'Proela', 'Matpri', 'Dissisven', 'Ingres', 'Espacteco', 'Ocupa', 'Profe', 'Numnom', 'Fecing', 'Exten', 'Ingmen', 'Otroing', 'Detotroing', 'CcperpreId', 'CcestcivId', 'CctipupsId', 'CcparroqId', 'CcsececoId', 'CcactecoId', 'CcorimatpriId', 'CccargoId', 'CccondicId', 'CcubiadmId', 'CcciudadId', ),
		BasePeer::TYPE_COLNAME => array (CcbenefiPeer::ID, CcbenefiPeer::CEDRIF, CcbenefiPeer::NOMBEN, CcbenefiPeer::SEXREP, CcbenefiPeer::FECNAC, CcbenefiPeer::NUMASO, CcbenefiPeer::NUMHOM, CcbenefiPeer::NUMMUJ, CcbenefiPeer::NUMREGSUN, CcbenefiPeer::EMPACTMUJ, CcbenefiPeer::EMPACTHOM, CcbenefiPeer::CAPSOC, CcbenefiPeer::CAPCON, CcbenefiPeer::FECCON, CcbenefiPeer::DURACI, CcbenefiPeer::DIRNOMURB, CcbenefiPeer::DIRCALLES, CcbenefiPeer::DIRCASEDI, CcbenefiPeer::DIRNUMPIS, CcbenefiPeer::DIRAPATAR, CcbenefiPeer::DIRPUNREF, CcbenefiPeer::TELBEN, CcbenefiPeer::CELBEN, CcbenefiPeer::FAXBEN, CcbenefiPeer::CODARETEL, CcbenefiPeer::CODARECEL, CcbenefiPeer::CODAREFAX, CcbenefiPeer::CORELE, CcbenefiPeer::CREANT, CcbenefiPeer::PROELA, CcbenefiPeer::MATPRI, CcbenefiPeer::DISSISVEN, CcbenefiPeer::INGRES, CcbenefiPeer::ESPACTECO, CcbenefiPeer::OCUPA, CcbenefiPeer::PROFE, CcbenefiPeer::NUMNOM, CcbenefiPeer::FECING, CcbenefiPeer::EXTEN, CcbenefiPeer::INGMEN, CcbenefiPeer::OTROING, CcbenefiPeer::DETOTROING, CcbenefiPeer::CCPERPRE_ID, CcbenefiPeer::CCESTCIV_ID, CcbenefiPeer::CCTIPUPS_ID, CcbenefiPeer::CCPARROQ_ID, CcbenefiPeer::CCSECECO_ID, CcbenefiPeer::CCACTECO_ID, CcbenefiPeer::CCORIMATPRI_ID, CcbenefiPeer::CCCARGO_ID, CcbenefiPeer::CCCONDIC_ID, CcbenefiPeer::CCUBIADM_ID, CcbenefiPeer::CCCIUDAD_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'cedrif', 'nomben', 'sexrep', 'fecnac', 'numaso', 'numhom', 'nummuj', 'numregsun', 'empactmuj', 'empacthom', 'capsoc', 'capcon', 'feccon', 'duraci', 'dirnomurb', 'dircalles', 'dircasedi', 'dirnumpis', 'dirapatar', 'dirpunref', 'telben', 'celben', 'faxben', 'codaretel', 'codarecel', 'codarefax', 'corele', 'creant', 'proela', 'matpri', 'dissisven', 'ingres', 'espacteco', 'ocupa', 'profe', 'numnom', 'fecing', 'exten', 'ingmen', 'otroing', 'detotroing', 'ccperpre_id', 'ccestciv_id', 'cctipups_id', 'ccparroq_id', 'ccsececo_id', 'ccacteco_id', 'ccorimatpri_id', 'cccargo_id', 'cccondic_id', 'ccubiadm_id', 'ccciudad_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Cedrif' => 1, 'Nomben' => 2, 'Sexrep' => 3, 'Fecnac' => 4, 'Numaso' => 5, 'Numhom' => 6, 'Nummuj' => 7, 'Numregsun' => 8, 'Empactmuj' => 9, 'Empacthom' => 10, 'Capsoc' => 11, 'Capcon' => 12, 'Feccon' => 13, 'Duraci' => 14, 'Dirnomurb' => 15, 'Dircalles' => 16, 'Dircasedi' => 17, 'Dirnumpis' => 18, 'Dirapatar' => 19, 'Dirpunref' => 20, 'Telben' => 21, 'Celben' => 22, 'Faxben' => 23, 'Codaretel' => 24, 'Codarecel' => 25, 'Codarefax' => 26, 'Corele' => 27, 'Creant' => 28, 'Proela' => 29, 'Matpri' => 30, 'Dissisven' => 31, 'Ingres' => 32, 'Espacteco' => 33, 'Ocupa' => 34, 'Profe' => 35, 'Numnom' => 36, 'Fecing' => 37, 'Exten' => 38, 'Ingmen' => 39, 'Otroing' => 40, 'Detotroing' => 41, 'CcperpreId' => 42, 'CcestcivId' => 43, 'CctipupsId' => 44, 'CcparroqId' => 45, 'CcsececoId' => 46, 'CcactecoId' => 47, 'CcorimatpriId' => 48, 'CccargoId' => 49, 'CccondicId' => 50, 'CcubiadmId' => 51, 'CcciudadId' => 52, ),
		BasePeer::TYPE_COLNAME => array (CcbenefiPeer::ID => 0, CcbenefiPeer::CEDRIF => 1, CcbenefiPeer::NOMBEN => 2, CcbenefiPeer::SEXREP => 3, CcbenefiPeer::FECNAC => 4, CcbenefiPeer::NUMASO => 5, CcbenefiPeer::NUMHOM => 6, CcbenefiPeer::NUMMUJ => 7, CcbenefiPeer::NUMREGSUN => 8, CcbenefiPeer::EMPACTMUJ => 9, CcbenefiPeer::EMPACTHOM => 10, CcbenefiPeer::CAPSOC => 11, CcbenefiPeer::CAPCON => 12, CcbenefiPeer::FECCON => 13, CcbenefiPeer::DURACI => 14, CcbenefiPeer::DIRNOMURB => 15, CcbenefiPeer::DIRCALLES => 16, CcbenefiPeer::DIRCASEDI => 17, CcbenefiPeer::DIRNUMPIS => 18, CcbenefiPeer::DIRAPATAR => 19, CcbenefiPeer::DIRPUNREF => 20, CcbenefiPeer::TELBEN => 21, CcbenefiPeer::CELBEN => 22, CcbenefiPeer::FAXBEN => 23, CcbenefiPeer::CODARETEL => 24, CcbenefiPeer::CODARECEL => 25, CcbenefiPeer::CODAREFAX => 26, CcbenefiPeer::CORELE => 27, CcbenefiPeer::CREANT => 28, CcbenefiPeer::PROELA => 29, CcbenefiPeer::MATPRI => 30, CcbenefiPeer::DISSISVEN => 31, CcbenefiPeer::INGRES => 32, CcbenefiPeer::ESPACTECO => 33, CcbenefiPeer::OCUPA => 34, CcbenefiPeer::PROFE => 35, CcbenefiPeer::NUMNOM => 36, CcbenefiPeer::FECING => 37, CcbenefiPeer::EXTEN => 38, CcbenefiPeer::INGMEN => 39, CcbenefiPeer::OTROING => 40, CcbenefiPeer::DETOTROING => 41, CcbenefiPeer::CCPERPRE_ID => 42, CcbenefiPeer::CCESTCIV_ID => 43, CcbenefiPeer::CCTIPUPS_ID => 44, CcbenefiPeer::CCPARROQ_ID => 45, CcbenefiPeer::CCSECECO_ID => 46, CcbenefiPeer::CCACTECO_ID => 47, CcbenefiPeer::CCORIMATPRI_ID => 48, CcbenefiPeer::CCCARGO_ID => 49, CcbenefiPeer::CCCONDIC_ID => 50, CcbenefiPeer::CCUBIADM_ID => 51, CcbenefiPeer::CCCIUDAD_ID => 52, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'cedrif' => 1, 'nomben' => 2, 'sexrep' => 3, 'fecnac' => 4, 'numaso' => 5, 'numhom' => 6, 'nummuj' => 7, 'numregsun' => 8, 'empactmuj' => 9, 'empacthom' => 10, 'capsoc' => 11, 'capcon' => 12, 'feccon' => 13, 'duraci' => 14, 'dirnomurb' => 15, 'dircalles' => 16, 'dircasedi' => 17, 'dirnumpis' => 18, 'dirapatar' => 19, 'dirpunref' => 20, 'telben' => 21, 'celben' => 22, 'faxben' => 23, 'codaretel' => 24, 'codarecel' => 25, 'codarefax' => 26, 'corele' => 27, 'creant' => 28, 'proela' => 29, 'matpri' => 30, 'dissisven' => 31, 'ingres' => 32, 'espacteco' => 33, 'ocupa' => 34, 'profe' => 35, 'numnom' => 36, 'fecing' => 37, 'exten' => 38, 'ingmen' => 39, 'otroing' => 40, 'detotroing' => 41, 'ccperpre_id' => 42, 'ccestciv_id' => 43, 'cctipups_id' => 44, 'ccparroq_id' => 45, 'ccsececo_id' => 46, 'ccacteco_id' => 47, 'ccorimatpri_id' => 48, 'cccargo_id' => 49, 'cccondic_id' => 50, 'ccubiadm_id' => 51, 'ccciudad_id' => 52, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcbenefiMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcbenefiMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcbenefiPeer::getTableMap();
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
		return str_replace(CcbenefiPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcbenefiPeer::ID);

		$criteria->addSelectColumn(CcbenefiPeer::CEDRIF);

		$criteria->addSelectColumn(CcbenefiPeer::NOMBEN);

		$criteria->addSelectColumn(CcbenefiPeer::SEXREP);

		$criteria->addSelectColumn(CcbenefiPeer::FECNAC);

		$criteria->addSelectColumn(CcbenefiPeer::NUMASO);

		$criteria->addSelectColumn(CcbenefiPeer::NUMHOM);

		$criteria->addSelectColumn(CcbenefiPeer::NUMMUJ);

		$criteria->addSelectColumn(CcbenefiPeer::NUMREGSUN);

		$criteria->addSelectColumn(CcbenefiPeer::EMPACTMUJ);

		$criteria->addSelectColumn(CcbenefiPeer::EMPACTHOM);

		$criteria->addSelectColumn(CcbenefiPeer::CAPSOC);

		$criteria->addSelectColumn(CcbenefiPeer::CAPCON);

		$criteria->addSelectColumn(CcbenefiPeer::FECCON);

		$criteria->addSelectColumn(CcbenefiPeer::DURACI);

		$criteria->addSelectColumn(CcbenefiPeer::DIRNOMURB);

		$criteria->addSelectColumn(CcbenefiPeer::DIRCALLES);

		$criteria->addSelectColumn(CcbenefiPeer::DIRCASEDI);

		$criteria->addSelectColumn(CcbenefiPeer::DIRNUMPIS);

		$criteria->addSelectColumn(CcbenefiPeer::DIRAPATAR);

		$criteria->addSelectColumn(CcbenefiPeer::DIRPUNREF);

		$criteria->addSelectColumn(CcbenefiPeer::TELBEN);

		$criteria->addSelectColumn(CcbenefiPeer::CELBEN);

		$criteria->addSelectColumn(CcbenefiPeer::FAXBEN);

		$criteria->addSelectColumn(CcbenefiPeer::CODARETEL);

		$criteria->addSelectColumn(CcbenefiPeer::CODARECEL);

		$criteria->addSelectColumn(CcbenefiPeer::CODAREFAX);

		$criteria->addSelectColumn(CcbenefiPeer::CORELE);

		$criteria->addSelectColumn(CcbenefiPeer::CREANT);

		$criteria->addSelectColumn(CcbenefiPeer::PROELA);

		$criteria->addSelectColumn(CcbenefiPeer::MATPRI);

		$criteria->addSelectColumn(CcbenefiPeer::DISSISVEN);

		$criteria->addSelectColumn(CcbenefiPeer::INGRES);

		$criteria->addSelectColumn(CcbenefiPeer::ESPACTECO);

		$criteria->addSelectColumn(CcbenefiPeer::OCUPA);

		$criteria->addSelectColumn(CcbenefiPeer::PROFE);

		$criteria->addSelectColumn(CcbenefiPeer::NUMNOM);

		$criteria->addSelectColumn(CcbenefiPeer::FECING);

		$criteria->addSelectColumn(CcbenefiPeer::EXTEN);

		$criteria->addSelectColumn(CcbenefiPeer::INGMEN);

		$criteria->addSelectColumn(CcbenefiPeer::OTROING);

		$criteria->addSelectColumn(CcbenefiPeer::DETOTROING);

		$criteria->addSelectColumn(CcbenefiPeer::CCPERPRE_ID);

		$criteria->addSelectColumn(CcbenefiPeer::CCESTCIV_ID);

		$criteria->addSelectColumn(CcbenefiPeer::CCTIPUPS_ID);

		$criteria->addSelectColumn(CcbenefiPeer::CCPARROQ_ID);

		$criteria->addSelectColumn(CcbenefiPeer::CCSECECO_ID);

		$criteria->addSelectColumn(CcbenefiPeer::CCACTECO_ID);

		$criteria->addSelectColumn(CcbenefiPeer::CCORIMATPRI_ID);

		$criteria->addSelectColumn(CcbenefiPeer::CCCARGO_ID);

		$criteria->addSelectColumn(CcbenefiPeer::CCCONDIC_ID);

		$criteria->addSelectColumn(CcbenefiPeer::CCUBIADM_ID);

		$criteria->addSelectColumn(CcbenefiPeer::CCCIUDAD_ID);

	}

	const COUNT = 'COUNT(ccbenefi.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccbenefi.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcbenefiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcbenefiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcbenefiPeer::doSelectRS($criteria, $con);
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
		$objects = CcbenefiPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcbenefiPeer::populateObjects(CcbenefiPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcbenefiPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcbenefiPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcperpre(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcbenefiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcbenefiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcbenefiPeer::CCPERPRE_ID, CcperprePeer::ID);

		$rs = CcbenefiPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcestciv(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcbenefiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcbenefiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcbenefiPeer::CCESTCIV_ID, CcestcivPeer::ID);

		$rs = CcbenefiPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCctipups(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcbenefiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcbenefiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcbenefiPeer::CCTIPUPS_ID, CctipupsPeer::ID);

		$rs = CcbenefiPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcparroq(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcbenefiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcbenefiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcbenefiPeer::CCPARROQ_ID, CcparroqPeer::ID);

		$rs = CcbenefiPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcsececo(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcbenefiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcbenefiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcbenefiPeer::CCSECECO_ID, CcsececoPeer::ID);

		$rs = CcbenefiPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcacteco(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcbenefiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcbenefiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcbenefiPeer::CCACTECO_ID, CcactecoPeer::ID);

		$rs = CcbenefiPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcorimatpri(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcbenefiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcbenefiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcbenefiPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);

		$rs = CcbenefiPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCccargo(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcbenefiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcbenefiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcbenefiPeer::CCCARGO_ID, CccargoPeer::ID);

		$rs = CcbenefiPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCccondic(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcbenefiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcbenefiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcbenefiPeer::CCCONDIC_ID, CccondicPeer::ID);

		$rs = CcbenefiPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcubiadm(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcbenefiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcbenefiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcbenefiPeer::CCUBIADM_ID, CcubiadmPeer::ID);

		$rs = CcbenefiPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcciudad(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcbenefiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcbenefiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcbenefiPeer::CCCIUDAD_ID, CcciudadPeer::ID);

		$rs = CcbenefiPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcperpre(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbenefiPeer::addSelectColumns($c);
		$startcol = (CcbenefiPeer::NUM_COLUMNS - CcbenefiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcperprePeer::addSelectColumns($c);

		$c->addJoin(CcbenefiPeer::CCPERPRE_ID, CcperprePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbenefiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcperprePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcperpre(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcbenefi($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcbenefis();
				$obj2->addCcbenefi($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcestciv(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbenefiPeer::addSelectColumns($c);
		$startcol = (CcbenefiPeer::NUM_COLUMNS - CcbenefiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcestcivPeer::addSelectColumns($c);

		$c->addJoin(CcbenefiPeer::CCESTCIV_ID, CcestcivPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbenefiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcestcivPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcestciv(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcbenefi($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcbenefis();
				$obj2->addCcbenefi($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCctipups(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbenefiPeer::addSelectColumns($c);
		$startcol = (CcbenefiPeer::NUM_COLUMNS - CcbenefiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CctipupsPeer::addSelectColumns($c);

		$c->addJoin(CcbenefiPeer::CCTIPUPS_ID, CctipupsPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbenefiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CctipupsPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCctipups(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcbenefi($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcbenefis();
				$obj2->addCcbenefi($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcparroq(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbenefiPeer::addSelectColumns($c);
		$startcol = (CcbenefiPeer::NUM_COLUMNS - CcbenefiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcparroqPeer::addSelectColumns($c);

		$c->addJoin(CcbenefiPeer::CCPARROQ_ID, CcparroqPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbenefiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcparroqPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcparroq(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcbenefi($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcbenefis();
				$obj2->addCcbenefi($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcsececo(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbenefiPeer::addSelectColumns($c);
		$startcol = (CcbenefiPeer::NUM_COLUMNS - CcbenefiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcsececoPeer::addSelectColumns($c);

		$c->addJoin(CcbenefiPeer::CCSECECO_ID, CcsececoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbenefiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcsececoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcsececo(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcbenefi($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcbenefis();
				$obj2->addCcbenefi($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcacteco(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbenefiPeer::addSelectColumns($c);
		$startcol = (CcbenefiPeer::NUM_COLUMNS - CcbenefiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcactecoPeer::addSelectColumns($c);

		$c->addJoin(CcbenefiPeer::CCACTECO_ID, CcactecoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbenefiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcactecoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcacteco(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcbenefi($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcbenefis();
				$obj2->addCcbenefi($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcorimatpri(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbenefiPeer::addSelectColumns($c);
		$startcol = (CcbenefiPeer::NUM_COLUMNS - CcbenefiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcorimatpriPeer::addSelectColumns($c);

		$c->addJoin(CcbenefiPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbenefiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcorimatpriPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcorimatpri(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcbenefi($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcbenefis();
				$obj2->addCcbenefi($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCccargo(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbenefiPeer::addSelectColumns($c);
		$startcol = (CcbenefiPeer::NUM_COLUMNS - CcbenefiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CccargoPeer::addSelectColumns($c);

		$c->addJoin(CcbenefiPeer::CCCARGO_ID, CccargoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbenefiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CccargoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCccargo(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcbenefi($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcbenefis();
				$obj2->addCcbenefi($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCccondic(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbenefiPeer::addSelectColumns($c);
		$startcol = (CcbenefiPeer::NUM_COLUMNS - CcbenefiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CccondicPeer::addSelectColumns($c);

		$c->addJoin(CcbenefiPeer::CCCONDIC_ID, CccondicPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbenefiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CccondicPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCccondic(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcbenefi($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcbenefis();
				$obj2->addCcbenefi($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcubiadm(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbenefiPeer::addSelectColumns($c);
		$startcol = (CcbenefiPeer::NUM_COLUMNS - CcbenefiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcubiadmPeer::addSelectColumns($c);

		$c->addJoin(CcbenefiPeer::CCUBIADM_ID, CcubiadmPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbenefiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcubiadmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcubiadm(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcbenefi($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcbenefis();
				$obj2->addCcbenefi($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcciudad(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbenefiPeer::addSelectColumns($c);
		$startcol = (CcbenefiPeer::NUM_COLUMNS - CcbenefiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcciudadPeer::addSelectColumns($c);

		$c->addJoin(CcbenefiPeer::CCCIUDAD_ID, CcciudadPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbenefiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcciudadPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcciudad(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcbenefi($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcbenefis();
				$obj2->addCcbenefi($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcbenefiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcbenefiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcbenefiPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$criteria->addJoin(CcbenefiPeer::CCESTCIV_ID, CcestcivPeer::ID);
	
			$criteria->addJoin(CcbenefiPeer::CCTIPUPS_ID, CctipupsPeer::ID);
	
			$criteria->addJoin(CcbenefiPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
			$criteria->addJoin(CcbenefiPeer::CCSECECO_ID, CcsececoPeer::ID);
	
			$criteria->addJoin(CcbenefiPeer::CCACTECO_ID, CcactecoPeer::ID);
	
			$criteria->addJoin(CcbenefiPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);
	
			$criteria->addJoin(CcbenefiPeer::CCCARGO_ID, CccargoPeer::ID);
	
			$criteria->addJoin(CcbenefiPeer::CCCONDIC_ID, CccondicPeer::ID);
	
			$criteria->addJoin(CcbenefiPeer::CCUBIADM_ID, CcubiadmPeer::ID);
	
			$criteria->addJoin(CcbenefiPeer::CCCIUDAD_ID, CcciudadPeer::ID);
	
		$rs = CcbenefiPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbenefiPeer::addSelectColumns($c);
		$startcol2 = (CcbenefiPeer::NUM_COLUMNS - CcbenefiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperprePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperprePeer::NUM_COLUMNS;
	
			CcestcivPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcestcivPeer::NUM_COLUMNS;
	
			CctipupsPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CctipupsPeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcparroqPeer::NUM_COLUMNS;
	
			CcsececoPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcsececoPeer::NUM_COLUMNS;
	
			CcactecoPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcactecoPeer::NUM_COLUMNS;
	
			CcorimatpriPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CcorimatpriPeer::NUM_COLUMNS;
	
			CccargoPeer::addSelectColumns($c);
			$startcol10 = $startcol9 + CccargoPeer::NUM_COLUMNS;
	
			CccondicPeer::addSelectColumns($c);
			$startcol11 = $startcol10 + CccondicPeer::NUM_COLUMNS;
	
			CcubiadmPeer::addSelectColumns($c);
			$startcol12 = $startcol11 + CcubiadmPeer::NUM_COLUMNS;
	
			CcciudadPeer::addSelectColumns($c);
			$startcol13 = $startcol12 + CcciudadPeer::NUM_COLUMNS;
	
			$c->addJoin(CcbenefiPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCESTCIV_ID, CcestcivPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCTIPUPS_ID, CctipupsPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCSECECO_ID, CcsececoPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCACTECO_ID, CcactecoPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCCARGO_ID, CccargoPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCCONDIC_ID, CccondicPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCUBIADM_ID, CcubiadmPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCCIUDAD_ID, CcciudadPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbenefiPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcperprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcperpre(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcbenefi($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcbenefis();
					$obj2->addCcbenefi($obj1);
				}
	

							
				$omClass = CcestcivPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcestciv(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcbenefi($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcbenefis();
					$obj3->addCcbenefi($obj1);
				}
	

							
				$omClass = CctipupsPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCctipups(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcbenefi($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCcbenefis();
					$obj4->addCcbenefi($obj1);
				}
	

							
				$omClass = CcparroqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5 = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcparroq(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcbenefi($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initCcbenefis();
					$obj5->addCcbenefi($obj1);
				}
	

							
				$omClass = CcsececoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6 = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcsececo(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcbenefi($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj6->initCcbenefis();
					$obj6->addCcbenefi($obj1);
				}
	

							
				$omClass = CcactecoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7 = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcacteco(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcbenefi($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj7->initCcbenefis();
					$obj7->addCcbenefi($obj1);
				}
	

							
				$omClass = CcorimatpriPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8 = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCcorimatpri(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCcbenefi($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj8->initCcbenefis();
					$obj8->addCcbenefi($obj1);
				}
	

							
				$omClass = CccargoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj9 = new $cls();
				$obj9->hydrate($rs, $startcol9);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj9 = $temp_obj1->getCccargo(); 					if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
						$newObject = false;
						$temp_obj9->addCcbenefi($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj9->initCcbenefis();
					$obj9->addCcbenefi($obj1);
				}
	

							
				$omClass = CccondicPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj10 = new $cls();
				$obj10->hydrate($rs, $startcol10);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj10 = $temp_obj1->getCccondic(); 					if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
						$newObject = false;
						$temp_obj10->addCcbenefi($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj10->initCcbenefis();
					$obj10->addCcbenefi($obj1);
				}
	

							
				$omClass = CcubiadmPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj11 = new $cls();
				$obj11->hydrate($rs, $startcol11);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj11 = $temp_obj1->getCcubiadm(); 					if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
						$newObject = false;
						$temp_obj11->addCcbenefi($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj11->initCcbenefis();
					$obj11->addCcbenefi($obj1);
				}
	

							
				$omClass = CcciudadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj12 = new $cls();
				$obj12->hydrate($rs, $startcol12);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj12 = $temp_obj1->getCcciudad(); 					if ($temp_obj12->getPrimaryKey() === $obj12->getPrimaryKey()) {
						$newObject = false;
						$temp_obj12->addCcbenefi($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj12->initCcbenefis();
					$obj12->addCcbenefi($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCcperpre(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcbenefiPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcbenefiPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcbenefiPeer::CCESTCIV_ID, CcestcivPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCTIPUPS_ID, CctipupsPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCPARROQ_ID, CcparroqPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCSECECO_ID, CcsececoPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCACTECO_ID, CcactecoPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCCARGO_ID, CccargoPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCCONDIC_ID, CccondicPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCUBIADM_ID, CcubiadmPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCCIUDAD_ID, CcciudadPeer::ID);
		
			$rs = CcbenefiPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcestciv(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcbenefiPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcbenefiPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcbenefiPeer::CCPERPRE_ID, CcperprePeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCTIPUPS_ID, CctipupsPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCPARROQ_ID, CcparroqPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCSECECO_ID, CcsececoPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCACTECO_ID, CcactecoPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCCARGO_ID, CccargoPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCCONDIC_ID, CccondicPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCUBIADM_ID, CcubiadmPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCCIUDAD_ID, CcciudadPeer::ID);
		
			$rs = CcbenefiPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCctipups(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcbenefiPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcbenefiPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcbenefiPeer::CCPERPRE_ID, CcperprePeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCESTCIV_ID, CcestcivPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCPARROQ_ID, CcparroqPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCSECECO_ID, CcsececoPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCACTECO_ID, CcactecoPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCCARGO_ID, CccargoPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCCONDIC_ID, CccondicPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCUBIADM_ID, CcubiadmPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCCIUDAD_ID, CcciudadPeer::ID);
		
			$rs = CcbenefiPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcparroq(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcbenefiPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcbenefiPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcbenefiPeer::CCPERPRE_ID, CcperprePeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCESTCIV_ID, CcestcivPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCTIPUPS_ID, CctipupsPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCSECECO_ID, CcsececoPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCACTECO_ID, CcactecoPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCCARGO_ID, CccargoPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCCONDIC_ID, CccondicPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCUBIADM_ID, CcubiadmPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCCIUDAD_ID, CcciudadPeer::ID);
		
			$rs = CcbenefiPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcsececo(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcbenefiPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcbenefiPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcbenefiPeer::CCPERPRE_ID, CcperprePeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCESTCIV_ID, CcestcivPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCTIPUPS_ID, CctipupsPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCPARROQ_ID, CcparroqPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCACTECO_ID, CcactecoPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCCARGO_ID, CccargoPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCCONDIC_ID, CccondicPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCUBIADM_ID, CcubiadmPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCCIUDAD_ID, CcciudadPeer::ID);
		
			$rs = CcbenefiPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcacteco(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcbenefiPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcbenefiPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcbenefiPeer::CCPERPRE_ID, CcperprePeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCESTCIV_ID, CcestcivPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCTIPUPS_ID, CctipupsPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCPARROQ_ID, CcparroqPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCSECECO_ID, CcsececoPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCCARGO_ID, CccargoPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCCONDIC_ID, CccondicPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCUBIADM_ID, CcubiadmPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCCIUDAD_ID, CcciudadPeer::ID);
		
			$rs = CcbenefiPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcorimatpri(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcbenefiPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcbenefiPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcbenefiPeer::CCPERPRE_ID, CcperprePeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCESTCIV_ID, CcestcivPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCTIPUPS_ID, CctipupsPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCPARROQ_ID, CcparroqPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCSECECO_ID, CcsececoPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCACTECO_ID, CcactecoPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCCARGO_ID, CccargoPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCCONDIC_ID, CccondicPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCUBIADM_ID, CcubiadmPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCCIUDAD_ID, CcciudadPeer::ID);
		
			$rs = CcbenefiPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCccargo(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcbenefiPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcbenefiPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcbenefiPeer::CCPERPRE_ID, CcperprePeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCESTCIV_ID, CcestcivPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCTIPUPS_ID, CctipupsPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCPARROQ_ID, CcparroqPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCSECECO_ID, CcsececoPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCACTECO_ID, CcactecoPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCCONDIC_ID, CccondicPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCUBIADM_ID, CcubiadmPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCCIUDAD_ID, CcciudadPeer::ID);
		
			$rs = CcbenefiPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCccondic(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcbenefiPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcbenefiPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcbenefiPeer::CCPERPRE_ID, CcperprePeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCESTCIV_ID, CcestcivPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCTIPUPS_ID, CctipupsPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCPARROQ_ID, CcparroqPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCSECECO_ID, CcsececoPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCACTECO_ID, CcactecoPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCCARGO_ID, CccargoPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCUBIADM_ID, CcubiadmPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCCIUDAD_ID, CcciudadPeer::ID);
		
			$rs = CcbenefiPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcubiadm(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcbenefiPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcbenefiPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcbenefiPeer::CCPERPRE_ID, CcperprePeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCESTCIV_ID, CcestcivPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCTIPUPS_ID, CctipupsPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCPARROQ_ID, CcparroqPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCSECECO_ID, CcsececoPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCACTECO_ID, CcactecoPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCCARGO_ID, CccargoPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCCONDIC_ID, CccondicPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCCIUDAD_ID, CcciudadPeer::ID);
		
			$rs = CcbenefiPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcciudad(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcbenefiPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcbenefiPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcbenefiPeer::CCPERPRE_ID, CcperprePeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCESTCIV_ID, CcestcivPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCTIPUPS_ID, CctipupsPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCPARROQ_ID, CcparroqPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCSECECO_ID, CcsececoPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCACTECO_ID, CcactecoPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCCARGO_ID, CccargoPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCCONDIC_ID, CccondicPeer::ID);
		
				$criteria->addJoin(CcbenefiPeer::CCUBIADM_ID, CcubiadmPeer::ID);
		
			$rs = CcbenefiPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCcperpre(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbenefiPeer::addSelectColumns($c);
		$startcol2 = (CcbenefiPeer::NUM_COLUMNS - CcbenefiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcestcivPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcestcivPeer::NUM_COLUMNS;
	
			CctipupsPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CctipupsPeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcparroqPeer::NUM_COLUMNS;
	
			CcsececoPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcsececoPeer::NUM_COLUMNS;
	
			CcactecoPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcactecoPeer::NUM_COLUMNS;
	
			CcorimatpriPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcorimatpriPeer::NUM_COLUMNS;
	
			CccargoPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CccargoPeer::NUM_COLUMNS;
	
			CccondicPeer::addSelectColumns($c);
			$startcol10 = $startcol9 + CccondicPeer::NUM_COLUMNS;
	
			CcubiadmPeer::addSelectColumns($c);
			$startcol11 = $startcol10 + CcubiadmPeer::NUM_COLUMNS;
	
			CcciudadPeer::addSelectColumns($c);
			$startcol12 = $startcol11 + CcciudadPeer::NUM_COLUMNS;
	
			$c->addJoin(CcbenefiPeer::CCESTCIV_ID, CcestcivPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCTIPUPS_ID, CctipupsPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCSECECO_ID, CcsececoPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCACTECO_ID, CcactecoPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCCARGO_ID, CccargoPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCCONDIC_ID, CccondicPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCUBIADM_ID, CcubiadmPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCCIUDAD_ID, CcciudadPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbenefiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcestcivPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcestciv(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcbenefis();
					$obj2->addCcbenefi($obj1);
				}
	
				$omClass = CctipupsPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCctipups(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcbenefis();
					$obj3->addCcbenefi($obj1);
				}
	
				$omClass = CcparroqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcparroq(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcbenefis();
					$obj4->addCcbenefi($obj1);
				}
	
				$omClass = CcsececoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcsececo(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcbenefis();
					$obj5->addCcbenefi($obj1);
				}
	
				$omClass = CcactecoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcacteco(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcbenefis();
					$obj6->addCcbenefi($obj1);
				}
	
				$omClass = CcorimatpriPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcorimatpri(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCcbenefis();
					$obj7->addCcbenefi($obj1);
				}
	
				$omClass = CccargoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8  = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCccargo(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj8->initCcbenefis();
					$obj8->addCcbenefi($obj1);
				}
	
				$omClass = CccondicPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj9  = new $cls();
				$obj9->hydrate($rs, $startcol9);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj9 = $temp_obj1->getCccondic(); 					if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
						$newObject = false;
						$temp_obj9->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj9->initCcbenefis();
					$obj9->addCcbenefi($obj1);
				}
	
				$omClass = CcubiadmPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj10  = new $cls();
				$obj10->hydrate($rs, $startcol10);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj10 = $temp_obj1->getCcubiadm(); 					if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
						$newObject = false;
						$temp_obj10->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj10->initCcbenefis();
					$obj10->addCcbenefi($obj1);
				}
	
				$omClass = CcciudadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj11  = new $cls();
				$obj11->hydrate($rs, $startcol11);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj11 = $temp_obj1->getCcciudad(); 					if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
						$newObject = false;
						$temp_obj11->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj11->initCcbenefis();
					$obj11->addCcbenefi($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcestciv(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbenefiPeer::addSelectColumns($c);
		$startcol2 = (CcbenefiPeer::NUM_COLUMNS - CcbenefiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperprePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperprePeer::NUM_COLUMNS;
	
			CctipupsPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CctipupsPeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcparroqPeer::NUM_COLUMNS;
	
			CcsececoPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcsececoPeer::NUM_COLUMNS;
	
			CcactecoPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcactecoPeer::NUM_COLUMNS;
	
			CcorimatpriPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcorimatpriPeer::NUM_COLUMNS;
	
			CccargoPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CccargoPeer::NUM_COLUMNS;
	
			CccondicPeer::addSelectColumns($c);
			$startcol10 = $startcol9 + CccondicPeer::NUM_COLUMNS;
	
			CcubiadmPeer::addSelectColumns($c);
			$startcol11 = $startcol10 + CcubiadmPeer::NUM_COLUMNS;
	
			CcciudadPeer::addSelectColumns($c);
			$startcol12 = $startcol11 + CcciudadPeer::NUM_COLUMNS;
	
			$c->addJoin(CcbenefiPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCTIPUPS_ID, CctipupsPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCSECECO_ID, CcsececoPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCACTECO_ID, CcactecoPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCCARGO_ID, CccargoPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCCONDIC_ID, CccondicPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCUBIADM_ID, CcubiadmPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCCIUDAD_ID, CcciudadPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbenefiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcperprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcperpre(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcbenefis();
					$obj2->addCcbenefi($obj1);
				}
	
				$omClass = CctipupsPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCctipups(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcbenefis();
					$obj3->addCcbenefi($obj1);
				}
	
				$omClass = CcparroqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcparroq(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcbenefis();
					$obj4->addCcbenefi($obj1);
				}
	
				$omClass = CcsececoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcsececo(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcbenefis();
					$obj5->addCcbenefi($obj1);
				}
	
				$omClass = CcactecoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcacteco(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcbenefis();
					$obj6->addCcbenefi($obj1);
				}
	
				$omClass = CcorimatpriPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcorimatpri(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCcbenefis();
					$obj7->addCcbenefi($obj1);
				}
	
				$omClass = CccargoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8  = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCccargo(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj8->initCcbenefis();
					$obj8->addCcbenefi($obj1);
				}
	
				$omClass = CccondicPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj9  = new $cls();
				$obj9->hydrate($rs, $startcol9);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj9 = $temp_obj1->getCccondic(); 					if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
						$newObject = false;
						$temp_obj9->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj9->initCcbenefis();
					$obj9->addCcbenefi($obj1);
				}
	
				$omClass = CcubiadmPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj10  = new $cls();
				$obj10->hydrate($rs, $startcol10);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj10 = $temp_obj1->getCcubiadm(); 					if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
						$newObject = false;
						$temp_obj10->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj10->initCcbenefis();
					$obj10->addCcbenefi($obj1);
				}
	
				$omClass = CcciudadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj11  = new $cls();
				$obj11->hydrate($rs, $startcol11);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj11 = $temp_obj1->getCcciudad(); 					if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
						$newObject = false;
						$temp_obj11->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj11->initCcbenefis();
					$obj11->addCcbenefi($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCctipups(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbenefiPeer::addSelectColumns($c);
		$startcol2 = (CcbenefiPeer::NUM_COLUMNS - CcbenefiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperprePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperprePeer::NUM_COLUMNS;
	
			CcestcivPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcestcivPeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcparroqPeer::NUM_COLUMNS;
	
			CcsececoPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcsececoPeer::NUM_COLUMNS;
	
			CcactecoPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcactecoPeer::NUM_COLUMNS;
	
			CcorimatpriPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcorimatpriPeer::NUM_COLUMNS;
	
			CccargoPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CccargoPeer::NUM_COLUMNS;
	
			CccondicPeer::addSelectColumns($c);
			$startcol10 = $startcol9 + CccondicPeer::NUM_COLUMNS;
	
			CcubiadmPeer::addSelectColumns($c);
			$startcol11 = $startcol10 + CcubiadmPeer::NUM_COLUMNS;
	
			CcciudadPeer::addSelectColumns($c);
			$startcol12 = $startcol11 + CcciudadPeer::NUM_COLUMNS;
	
			$c->addJoin(CcbenefiPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCESTCIV_ID, CcestcivPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCSECECO_ID, CcsececoPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCACTECO_ID, CcactecoPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCCARGO_ID, CccargoPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCCONDIC_ID, CccondicPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCUBIADM_ID, CcubiadmPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCCIUDAD_ID, CcciudadPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbenefiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcperprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcperpre(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcbenefis();
					$obj2->addCcbenefi($obj1);
				}
	
				$omClass = CcestcivPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcestciv(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcbenefis();
					$obj3->addCcbenefi($obj1);
				}
	
				$omClass = CcparroqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcparroq(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcbenefis();
					$obj4->addCcbenefi($obj1);
				}
	
				$omClass = CcsececoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcsececo(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcbenefis();
					$obj5->addCcbenefi($obj1);
				}
	
				$omClass = CcactecoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcacteco(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcbenefis();
					$obj6->addCcbenefi($obj1);
				}
	
				$omClass = CcorimatpriPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcorimatpri(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCcbenefis();
					$obj7->addCcbenefi($obj1);
				}
	
				$omClass = CccargoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8  = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCccargo(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj8->initCcbenefis();
					$obj8->addCcbenefi($obj1);
				}
	
				$omClass = CccondicPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj9  = new $cls();
				$obj9->hydrate($rs, $startcol9);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj9 = $temp_obj1->getCccondic(); 					if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
						$newObject = false;
						$temp_obj9->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj9->initCcbenefis();
					$obj9->addCcbenefi($obj1);
				}
	
				$omClass = CcubiadmPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj10  = new $cls();
				$obj10->hydrate($rs, $startcol10);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj10 = $temp_obj1->getCcubiadm(); 					if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
						$newObject = false;
						$temp_obj10->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj10->initCcbenefis();
					$obj10->addCcbenefi($obj1);
				}
	
				$omClass = CcciudadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj11  = new $cls();
				$obj11->hydrate($rs, $startcol11);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj11 = $temp_obj1->getCcciudad(); 					if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
						$newObject = false;
						$temp_obj11->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj11->initCcbenefis();
					$obj11->addCcbenefi($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcparroq(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbenefiPeer::addSelectColumns($c);
		$startcol2 = (CcbenefiPeer::NUM_COLUMNS - CcbenefiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperprePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperprePeer::NUM_COLUMNS;
	
			CcestcivPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcestcivPeer::NUM_COLUMNS;
	
			CctipupsPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CctipupsPeer::NUM_COLUMNS;
	
			CcsececoPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcsececoPeer::NUM_COLUMNS;
	
			CcactecoPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcactecoPeer::NUM_COLUMNS;
	
			CcorimatpriPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcorimatpriPeer::NUM_COLUMNS;
	
			CccargoPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CccargoPeer::NUM_COLUMNS;
	
			CccondicPeer::addSelectColumns($c);
			$startcol10 = $startcol9 + CccondicPeer::NUM_COLUMNS;
	
			CcubiadmPeer::addSelectColumns($c);
			$startcol11 = $startcol10 + CcubiadmPeer::NUM_COLUMNS;
	
			CcciudadPeer::addSelectColumns($c);
			$startcol12 = $startcol11 + CcciudadPeer::NUM_COLUMNS;
	
			$c->addJoin(CcbenefiPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCESTCIV_ID, CcestcivPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCTIPUPS_ID, CctipupsPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCSECECO_ID, CcsececoPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCACTECO_ID, CcactecoPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCCARGO_ID, CccargoPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCCONDIC_ID, CccondicPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCUBIADM_ID, CcubiadmPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCCIUDAD_ID, CcciudadPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbenefiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcperprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcperpre(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcbenefis();
					$obj2->addCcbenefi($obj1);
				}
	
				$omClass = CcestcivPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcestciv(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcbenefis();
					$obj3->addCcbenefi($obj1);
				}
	
				$omClass = CctipupsPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCctipups(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcbenefis();
					$obj4->addCcbenefi($obj1);
				}
	
				$omClass = CcsececoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcsececo(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcbenefis();
					$obj5->addCcbenefi($obj1);
				}
	
				$omClass = CcactecoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcacteco(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcbenefis();
					$obj6->addCcbenefi($obj1);
				}
	
				$omClass = CcorimatpriPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcorimatpri(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCcbenefis();
					$obj7->addCcbenefi($obj1);
				}
	
				$omClass = CccargoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8  = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCccargo(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj8->initCcbenefis();
					$obj8->addCcbenefi($obj1);
				}
	
				$omClass = CccondicPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj9  = new $cls();
				$obj9->hydrate($rs, $startcol9);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj9 = $temp_obj1->getCccondic(); 					if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
						$newObject = false;
						$temp_obj9->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj9->initCcbenefis();
					$obj9->addCcbenefi($obj1);
				}
	
				$omClass = CcubiadmPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj10  = new $cls();
				$obj10->hydrate($rs, $startcol10);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj10 = $temp_obj1->getCcubiadm(); 					if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
						$newObject = false;
						$temp_obj10->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj10->initCcbenefis();
					$obj10->addCcbenefi($obj1);
				}
	
				$omClass = CcciudadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj11  = new $cls();
				$obj11->hydrate($rs, $startcol11);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj11 = $temp_obj1->getCcciudad(); 					if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
						$newObject = false;
						$temp_obj11->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj11->initCcbenefis();
					$obj11->addCcbenefi($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcsececo(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbenefiPeer::addSelectColumns($c);
		$startcol2 = (CcbenefiPeer::NUM_COLUMNS - CcbenefiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperprePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperprePeer::NUM_COLUMNS;
	
			CcestcivPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcestcivPeer::NUM_COLUMNS;
	
			CctipupsPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CctipupsPeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcparroqPeer::NUM_COLUMNS;
	
			CcactecoPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcactecoPeer::NUM_COLUMNS;
	
			CcorimatpriPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcorimatpriPeer::NUM_COLUMNS;
	
			CccargoPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CccargoPeer::NUM_COLUMNS;
	
			CccondicPeer::addSelectColumns($c);
			$startcol10 = $startcol9 + CccondicPeer::NUM_COLUMNS;
	
			CcubiadmPeer::addSelectColumns($c);
			$startcol11 = $startcol10 + CcubiadmPeer::NUM_COLUMNS;
	
			CcciudadPeer::addSelectColumns($c);
			$startcol12 = $startcol11 + CcciudadPeer::NUM_COLUMNS;
	
			$c->addJoin(CcbenefiPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCESTCIV_ID, CcestcivPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCTIPUPS_ID, CctipupsPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCACTECO_ID, CcactecoPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCCARGO_ID, CccargoPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCCONDIC_ID, CccondicPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCUBIADM_ID, CcubiadmPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCCIUDAD_ID, CcciudadPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbenefiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcperprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcperpre(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcbenefis();
					$obj2->addCcbenefi($obj1);
				}
	
				$omClass = CcestcivPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcestciv(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcbenefis();
					$obj3->addCcbenefi($obj1);
				}
	
				$omClass = CctipupsPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCctipups(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcbenefis();
					$obj4->addCcbenefi($obj1);
				}
	
				$omClass = CcparroqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcparroq(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcbenefis();
					$obj5->addCcbenefi($obj1);
				}
	
				$omClass = CcactecoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcacteco(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcbenefis();
					$obj6->addCcbenefi($obj1);
				}
	
				$omClass = CcorimatpriPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcorimatpri(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCcbenefis();
					$obj7->addCcbenefi($obj1);
				}
	
				$omClass = CccargoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8  = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCccargo(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj8->initCcbenefis();
					$obj8->addCcbenefi($obj1);
				}
	
				$omClass = CccondicPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj9  = new $cls();
				$obj9->hydrate($rs, $startcol9);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj9 = $temp_obj1->getCccondic(); 					if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
						$newObject = false;
						$temp_obj9->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj9->initCcbenefis();
					$obj9->addCcbenefi($obj1);
				}
	
				$omClass = CcubiadmPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj10  = new $cls();
				$obj10->hydrate($rs, $startcol10);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj10 = $temp_obj1->getCcubiadm(); 					if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
						$newObject = false;
						$temp_obj10->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj10->initCcbenefis();
					$obj10->addCcbenefi($obj1);
				}
	
				$omClass = CcciudadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj11  = new $cls();
				$obj11->hydrate($rs, $startcol11);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj11 = $temp_obj1->getCcciudad(); 					if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
						$newObject = false;
						$temp_obj11->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj11->initCcbenefis();
					$obj11->addCcbenefi($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcacteco(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbenefiPeer::addSelectColumns($c);
		$startcol2 = (CcbenefiPeer::NUM_COLUMNS - CcbenefiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperprePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperprePeer::NUM_COLUMNS;
	
			CcestcivPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcestcivPeer::NUM_COLUMNS;
	
			CctipupsPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CctipupsPeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcparroqPeer::NUM_COLUMNS;
	
			CcsececoPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcsececoPeer::NUM_COLUMNS;
	
			CcorimatpriPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcorimatpriPeer::NUM_COLUMNS;
	
			CccargoPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CccargoPeer::NUM_COLUMNS;
	
			CccondicPeer::addSelectColumns($c);
			$startcol10 = $startcol9 + CccondicPeer::NUM_COLUMNS;
	
			CcubiadmPeer::addSelectColumns($c);
			$startcol11 = $startcol10 + CcubiadmPeer::NUM_COLUMNS;
	
			CcciudadPeer::addSelectColumns($c);
			$startcol12 = $startcol11 + CcciudadPeer::NUM_COLUMNS;
	
			$c->addJoin(CcbenefiPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCESTCIV_ID, CcestcivPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCTIPUPS_ID, CctipupsPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCSECECO_ID, CcsececoPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCCARGO_ID, CccargoPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCCONDIC_ID, CccondicPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCUBIADM_ID, CcubiadmPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCCIUDAD_ID, CcciudadPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbenefiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcperprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcperpre(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcbenefis();
					$obj2->addCcbenefi($obj1);
				}
	
				$omClass = CcestcivPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcestciv(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcbenefis();
					$obj3->addCcbenefi($obj1);
				}
	
				$omClass = CctipupsPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCctipups(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcbenefis();
					$obj4->addCcbenefi($obj1);
				}
	
				$omClass = CcparroqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcparroq(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcbenefis();
					$obj5->addCcbenefi($obj1);
				}
	
				$omClass = CcsececoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcsececo(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcbenefis();
					$obj6->addCcbenefi($obj1);
				}
	
				$omClass = CcorimatpriPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcorimatpri(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCcbenefis();
					$obj7->addCcbenefi($obj1);
				}
	
				$omClass = CccargoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8  = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCccargo(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj8->initCcbenefis();
					$obj8->addCcbenefi($obj1);
				}
	
				$omClass = CccondicPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj9  = new $cls();
				$obj9->hydrate($rs, $startcol9);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj9 = $temp_obj1->getCccondic(); 					if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
						$newObject = false;
						$temp_obj9->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj9->initCcbenefis();
					$obj9->addCcbenefi($obj1);
				}
	
				$omClass = CcubiadmPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj10  = new $cls();
				$obj10->hydrate($rs, $startcol10);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj10 = $temp_obj1->getCcubiadm(); 					if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
						$newObject = false;
						$temp_obj10->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj10->initCcbenefis();
					$obj10->addCcbenefi($obj1);
				}
	
				$omClass = CcciudadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj11  = new $cls();
				$obj11->hydrate($rs, $startcol11);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj11 = $temp_obj1->getCcciudad(); 					if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
						$newObject = false;
						$temp_obj11->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj11->initCcbenefis();
					$obj11->addCcbenefi($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcorimatpri(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbenefiPeer::addSelectColumns($c);
		$startcol2 = (CcbenefiPeer::NUM_COLUMNS - CcbenefiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperprePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperprePeer::NUM_COLUMNS;
	
			CcestcivPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcestcivPeer::NUM_COLUMNS;
	
			CctipupsPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CctipupsPeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcparroqPeer::NUM_COLUMNS;
	
			CcsececoPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcsececoPeer::NUM_COLUMNS;
	
			CcactecoPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcactecoPeer::NUM_COLUMNS;
	
			CccargoPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CccargoPeer::NUM_COLUMNS;
	
			CccondicPeer::addSelectColumns($c);
			$startcol10 = $startcol9 + CccondicPeer::NUM_COLUMNS;
	
			CcubiadmPeer::addSelectColumns($c);
			$startcol11 = $startcol10 + CcubiadmPeer::NUM_COLUMNS;
	
			CcciudadPeer::addSelectColumns($c);
			$startcol12 = $startcol11 + CcciudadPeer::NUM_COLUMNS;
	
			$c->addJoin(CcbenefiPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCESTCIV_ID, CcestcivPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCTIPUPS_ID, CctipupsPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCSECECO_ID, CcsececoPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCACTECO_ID, CcactecoPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCCARGO_ID, CccargoPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCCONDIC_ID, CccondicPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCUBIADM_ID, CcubiadmPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCCIUDAD_ID, CcciudadPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbenefiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcperprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcperpre(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcbenefis();
					$obj2->addCcbenefi($obj1);
				}
	
				$omClass = CcestcivPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcestciv(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcbenefis();
					$obj3->addCcbenefi($obj1);
				}
	
				$omClass = CctipupsPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCctipups(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcbenefis();
					$obj4->addCcbenefi($obj1);
				}
	
				$omClass = CcparroqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcparroq(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcbenefis();
					$obj5->addCcbenefi($obj1);
				}
	
				$omClass = CcsececoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcsececo(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcbenefis();
					$obj6->addCcbenefi($obj1);
				}
	
				$omClass = CcactecoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcacteco(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCcbenefis();
					$obj7->addCcbenefi($obj1);
				}
	
				$omClass = CccargoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8  = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCccargo(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj8->initCcbenefis();
					$obj8->addCcbenefi($obj1);
				}
	
				$omClass = CccondicPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj9  = new $cls();
				$obj9->hydrate($rs, $startcol9);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj9 = $temp_obj1->getCccondic(); 					if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
						$newObject = false;
						$temp_obj9->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj9->initCcbenefis();
					$obj9->addCcbenefi($obj1);
				}
	
				$omClass = CcubiadmPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj10  = new $cls();
				$obj10->hydrate($rs, $startcol10);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj10 = $temp_obj1->getCcubiadm(); 					if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
						$newObject = false;
						$temp_obj10->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj10->initCcbenefis();
					$obj10->addCcbenefi($obj1);
				}
	
				$omClass = CcciudadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj11  = new $cls();
				$obj11->hydrate($rs, $startcol11);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj11 = $temp_obj1->getCcciudad(); 					if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
						$newObject = false;
						$temp_obj11->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj11->initCcbenefis();
					$obj11->addCcbenefi($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCccargo(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbenefiPeer::addSelectColumns($c);
		$startcol2 = (CcbenefiPeer::NUM_COLUMNS - CcbenefiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperprePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperprePeer::NUM_COLUMNS;
	
			CcestcivPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcestcivPeer::NUM_COLUMNS;
	
			CctipupsPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CctipupsPeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcparroqPeer::NUM_COLUMNS;
	
			CcsececoPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcsececoPeer::NUM_COLUMNS;
	
			CcactecoPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcactecoPeer::NUM_COLUMNS;
	
			CcorimatpriPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CcorimatpriPeer::NUM_COLUMNS;
	
			CccondicPeer::addSelectColumns($c);
			$startcol10 = $startcol9 + CccondicPeer::NUM_COLUMNS;
	
			CcubiadmPeer::addSelectColumns($c);
			$startcol11 = $startcol10 + CcubiadmPeer::NUM_COLUMNS;
	
			CcciudadPeer::addSelectColumns($c);
			$startcol12 = $startcol11 + CcciudadPeer::NUM_COLUMNS;
	
			$c->addJoin(CcbenefiPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCESTCIV_ID, CcestcivPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCTIPUPS_ID, CctipupsPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCSECECO_ID, CcsececoPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCACTECO_ID, CcactecoPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCCONDIC_ID, CccondicPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCUBIADM_ID, CcubiadmPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCCIUDAD_ID, CcciudadPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbenefiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcperprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcperpre(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcbenefis();
					$obj2->addCcbenefi($obj1);
				}
	
				$omClass = CcestcivPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcestciv(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcbenefis();
					$obj3->addCcbenefi($obj1);
				}
	
				$omClass = CctipupsPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCctipups(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcbenefis();
					$obj4->addCcbenefi($obj1);
				}
	
				$omClass = CcparroqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcparroq(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcbenefis();
					$obj5->addCcbenefi($obj1);
				}
	
				$omClass = CcsececoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcsececo(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcbenefis();
					$obj6->addCcbenefi($obj1);
				}
	
				$omClass = CcactecoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcacteco(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCcbenefis();
					$obj7->addCcbenefi($obj1);
				}
	
				$omClass = CcorimatpriPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8  = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCcorimatpri(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj8->initCcbenefis();
					$obj8->addCcbenefi($obj1);
				}
	
				$omClass = CccondicPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj9  = new $cls();
				$obj9->hydrate($rs, $startcol9);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj9 = $temp_obj1->getCccondic(); 					if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
						$newObject = false;
						$temp_obj9->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj9->initCcbenefis();
					$obj9->addCcbenefi($obj1);
				}
	
				$omClass = CcubiadmPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj10  = new $cls();
				$obj10->hydrate($rs, $startcol10);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj10 = $temp_obj1->getCcubiadm(); 					if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
						$newObject = false;
						$temp_obj10->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj10->initCcbenefis();
					$obj10->addCcbenefi($obj1);
				}
	
				$omClass = CcciudadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj11  = new $cls();
				$obj11->hydrate($rs, $startcol11);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj11 = $temp_obj1->getCcciudad(); 					if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
						$newObject = false;
						$temp_obj11->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj11->initCcbenefis();
					$obj11->addCcbenefi($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCccondic(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbenefiPeer::addSelectColumns($c);
		$startcol2 = (CcbenefiPeer::NUM_COLUMNS - CcbenefiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperprePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperprePeer::NUM_COLUMNS;
	
			CcestcivPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcestcivPeer::NUM_COLUMNS;
	
			CctipupsPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CctipupsPeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcparroqPeer::NUM_COLUMNS;
	
			CcsececoPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcsececoPeer::NUM_COLUMNS;
	
			CcactecoPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcactecoPeer::NUM_COLUMNS;
	
			CcorimatpriPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CcorimatpriPeer::NUM_COLUMNS;
	
			CccargoPeer::addSelectColumns($c);
			$startcol10 = $startcol9 + CccargoPeer::NUM_COLUMNS;
	
			CcubiadmPeer::addSelectColumns($c);
			$startcol11 = $startcol10 + CcubiadmPeer::NUM_COLUMNS;
	
			CcciudadPeer::addSelectColumns($c);
			$startcol12 = $startcol11 + CcciudadPeer::NUM_COLUMNS;
	
			$c->addJoin(CcbenefiPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCESTCIV_ID, CcestcivPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCTIPUPS_ID, CctipupsPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCSECECO_ID, CcsececoPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCACTECO_ID, CcactecoPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCCARGO_ID, CccargoPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCUBIADM_ID, CcubiadmPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCCIUDAD_ID, CcciudadPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbenefiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcperprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcperpre(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcbenefis();
					$obj2->addCcbenefi($obj1);
				}
	
				$omClass = CcestcivPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcestciv(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcbenefis();
					$obj3->addCcbenefi($obj1);
				}
	
				$omClass = CctipupsPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCctipups(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcbenefis();
					$obj4->addCcbenefi($obj1);
				}
	
				$omClass = CcparroqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcparroq(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcbenefis();
					$obj5->addCcbenefi($obj1);
				}
	
				$omClass = CcsececoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcsececo(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcbenefis();
					$obj6->addCcbenefi($obj1);
				}
	
				$omClass = CcactecoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcacteco(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCcbenefis();
					$obj7->addCcbenefi($obj1);
				}
	
				$omClass = CcorimatpriPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8  = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCcorimatpri(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj8->initCcbenefis();
					$obj8->addCcbenefi($obj1);
				}
	
				$omClass = CccargoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj9  = new $cls();
				$obj9->hydrate($rs, $startcol9);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj9 = $temp_obj1->getCccargo(); 					if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
						$newObject = false;
						$temp_obj9->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj9->initCcbenefis();
					$obj9->addCcbenefi($obj1);
				}
	
				$omClass = CcubiadmPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj10  = new $cls();
				$obj10->hydrate($rs, $startcol10);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj10 = $temp_obj1->getCcubiadm(); 					if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
						$newObject = false;
						$temp_obj10->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj10->initCcbenefis();
					$obj10->addCcbenefi($obj1);
				}
	
				$omClass = CcciudadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj11  = new $cls();
				$obj11->hydrate($rs, $startcol11);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj11 = $temp_obj1->getCcciudad(); 					if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
						$newObject = false;
						$temp_obj11->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj11->initCcbenefis();
					$obj11->addCcbenefi($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcubiadm(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbenefiPeer::addSelectColumns($c);
		$startcol2 = (CcbenefiPeer::NUM_COLUMNS - CcbenefiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperprePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperprePeer::NUM_COLUMNS;
	
			CcestcivPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcestcivPeer::NUM_COLUMNS;
	
			CctipupsPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CctipupsPeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcparroqPeer::NUM_COLUMNS;
	
			CcsececoPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcsececoPeer::NUM_COLUMNS;
	
			CcactecoPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcactecoPeer::NUM_COLUMNS;
	
			CcorimatpriPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CcorimatpriPeer::NUM_COLUMNS;
	
			CccargoPeer::addSelectColumns($c);
			$startcol10 = $startcol9 + CccargoPeer::NUM_COLUMNS;
	
			CccondicPeer::addSelectColumns($c);
			$startcol11 = $startcol10 + CccondicPeer::NUM_COLUMNS;
	
			CcciudadPeer::addSelectColumns($c);
			$startcol12 = $startcol11 + CcciudadPeer::NUM_COLUMNS;
	
			$c->addJoin(CcbenefiPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCESTCIV_ID, CcestcivPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCTIPUPS_ID, CctipupsPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCSECECO_ID, CcsececoPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCACTECO_ID, CcactecoPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCCARGO_ID, CccargoPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCCONDIC_ID, CccondicPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCCIUDAD_ID, CcciudadPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbenefiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcperprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcperpre(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcbenefis();
					$obj2->addCcbenefi($obj1);
				}
	
				$omClass = CcestcivPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcestciv(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcbenefis();
					$obj3->addCcbenefi($obj1);
				}
	
				$omClass = CctipupsPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCctipups(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcbenefis();
					$obj4->addCcbenefi($obj1);
				}
	
				$omClass = CcparroqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcparroq(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcbenefis();
					$obj5->addCcbenefi($obj1);
				}
	
				$omClass = CcsececoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcsececo(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcbenefis();
					$obj6->addCcbenefi($obj1);
				}
	
				$omClass = CcactecoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcacteco(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCcbenefis();
					$obj7->addCcbenefi($obj1);
				}
	
				$omClass = CcorimatpriPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8  = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCcorimatpri(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj8->initCcbenefis();
					$obj8->addCcbenefi($obj1);
				}
	
				$omClass = CccargoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj9  = new $cls();
				$obj9->hydrate($rs, $startcol9);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj9 = $temp_obj1->getCccargo(); 					if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
						$newObject = false;
						$temp_obj9->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj9->initCcbenefis();
					$obj9->addCcbenefi($obj1);
				}
	
				$omClass = CccondicPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj10  = new $cls();
				$obj10->hydrate($rs, $startcol10);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj10 = $temp_obj1->getCccondic(); 					if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
						$newObject = false;
						$temp_obj10->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj10->initCcbenefis();
					$obj10->addCcbenefi($obj1);
				}
	
				$omClass = CcciudadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj11  = new $cls();
				$obj11->hydrate($rs, $startcol11);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj11 = $temp_obj1->getCcciudad(); 					if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
						$newObject = false;
						$temp_obj11->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj11->initCcbenefis();
					$obj11->addCcbenefi($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcciudad(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbenefiPeer::addSelectColumns($c);
		$startcol2 = (CcbenefiPeer::NUM_COLUMNS - CcbenefiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperprePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperprePeer::NUM_COLUMNS;
	
			CcestcivPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcestcivPeer::NUM_COLUMNS;
	
			CctipupsPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CctipupsPeer::NUM_COLUMNS;
	
			CcparroqPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcparroqPeer::NUM_COLUMNS;
	
			CcsececoPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcsececoPeer::NUM_COLUMNS;
	
			CcactecoPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcactecoPeer::NUM_COLUMNS;
	
			CcorimatpriPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CcorimatpriPeer::NUM_COLUMNS;
	
			CccargoPeer::addSelectColumns($c);
			$startcol10 = $startcol9 + CccargoPeer::NUM_COLUMNS;
	
			CccondicPeer::addSelectColumns($c);
			$startcol11 = $startcol10 + CccondicPeer::NUM_COLUMNS;
	
			CcubiadmPeer::addSelectColumns($c);
			$startcol12 = $startcol11 + CcubiadmPeer::NUM_COLUMNS;
	
			$c->addJoin(CcbenefiPeer::CCPERPRE_ID, CcperprePeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCESTCIV_ID, CcestcivPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCTIPUPS_ID, CctipupsPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCSECECO_ID, CcsececoPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCACTECO_ID, CcactecoPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCORIMATPRI_ID, CcorimatpriPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCCARGO_ID, CccargoPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCCONDIC_ID, CccondicPeer::ID);
	
			$c->addJoin(CcbenefiPeer::CCUBIADM_ID, CcubiadmPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbenefiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcperprePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcperpre(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcbenefis();
					$obj2->addCcbenefi($obj1);
				}
	
				$omClass = CcestcivPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcestciv(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcbenefis();
					$obj3->addCcbenefi($obj1);
				}
	
				$omClass = CctipupsPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCctipups(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcbenefis();
					$obj4->addCcbenefi($obj1);
				}
	
				$omClass = CcparroqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcparroq(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcbenefis();
					$obj5->addCcbenefi($obj1);
				}
	
				$omClass = CcsececoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcsececo(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcbenefis();
					$obj6->addCcbenefi($obj1);
				}
	
				$omClass = CcactecoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcacteco(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCcbenefis();
					$obj7->addCcbenefi($obj1);
				}
	
				$omClass = CcorimatpriPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8  = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCcorimatpri(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj8->initCcbenefis();
					$obj8->addCcbenefi($obj1);
				}
	
				$omClass = CccargoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj9  = new $cls();
				$obj9->hydrate($rs, $startcol9);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj9 = $temp_obj1->getCccargo(); 					if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
						$newObject = false;
						$temp_obj9->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj9->initCcbenefis();
					$obj9->addCcbenefi($obj1);
				}
	
				$omClass = CccondicPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj10  = new $cls();
				$obj10->hydrate($rs, $startcol10);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj10 = $temp_obj1->getCccondic(); 					if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
						$newObject = false;
						$temp_obj10->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj10->initCcbenefis();
					$obj10->addCcbenefi($obj1);
				}
	
				$omClass = CcubiadmPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj11  = new $cls();
				$obj11->hydrate($rs, $startcol11);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj11 = $temp_obj1->getCcubiadm(); 					if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
						$newObject = false;
						$temp_obj11->addCcbenefi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj11->initCcbenefis();
					$obj11->addCcbenefi($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}

	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return CcbenefiPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcbenefiPeer::ID); 

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
			$comparison = $criteria->getComparison(CcbenefiPeer::ID);
			$selectCriteria->add(CcbenefiPeer::ID, $criteria->remove(CcbenefiPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcbenefiPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcbenefiPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccbenefi) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcbenefiPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccbenefi $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcbenefiPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcbenefiPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcbenefiPeer::DATABASE_NAME, CcbenefiPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcbenefiPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcbenefiPeer::DATABASE_NAME);

		$criteria->add(CcbenefiPeer::ID, $pk);


		$v = CcbenefiPeer::doSelect($criteria, $con);

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
			$criteria->add(CcbenefiPeer::ID, $pks, Criteria::IN);
			$objs = CcbenefiPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcbenefiPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcbenefiMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcbenefiMapBuilder');
}
