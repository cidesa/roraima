<?php


abstract class BaseCatreginmPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'catreginm';

	
	const CLASS_DEFAULT = 'lib.model.catastro.Catreginm';

	
	const NUM_COLUMNS = 47;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CATSUBPRC_ID = 'catreginm.CATSUBPRC_ID';

	
	const CATPRC_ID = 'catreginm.CATPRC_ID';

	
	const CATMAN_ID = 'catreginm.CATMAN_ID';

	
	const CATSEC_ID = 'catreginm.CATSEC_ID';

	
	const CATPAR_ID = 'catreginm.CATPAR_ID';

	
	const CATMUN_ID = 'catreginm.CATMUN_ID';

	
	const CATCIU_ID = 'catreginm.CATCIU_ID';

	
	const CATEST_ID = 'catreginm.CATEST_ID';

	
	const CATBARURB_ID = 'catreginm.CATBARURB_ID';

	
	const CATTRAMOFRO_ID = 'catreginm.CATTRAMOFRO_ID';

	
	const CATTRAMOLAT_ID = 'catreginm.CATTRAMOLAT_ID';

	
	const CATTRAMOLAT2_ID = 'catreginm.CATTRAMOLAT2_ID';

	
	const CATCODPOS_ID = 'catreginm.CATCODPOS_ID';

	
	const CATTIPVIV_ID = 'catreginm.CATTIPVIV_ID';

	
	const CATCONINM_ID = 'catreginm.CATCONINM_ID';

	
	const CATUSOESP_ID = 'catreginm.CATUSOESP_ID';

	
	const CATCONSOC_ID = 'catreginm.CATCONSOC_ID';

	
	const CATRUT_ID = 'catreginm.CATRUT_ID';

	
	const CATCARTERINM_ID = 'catreginm.CATCARTERINM_ID';

	
	const CATPROTER_ID = 'catreginm.CATPROTER_ID';

	
	const CODDIVGEO = 'catreginm.CODDIVGEO';

	
	const NROCAS = 'catreginm.NROCAS';

	
	const FECREG = 'catreginm.FECREG';

	
	const DIRINM = 'catreginm.DIRINM';

	
	const NIVINM = 'catreginm.NIVINM';

	
	const UNIHAB = 'catreginm.UNIHAB';

	
	const EDICAS = 'catreginm.EDICAS';

	
	const PISINM = 'catreginm.PISINM';

	
	const NUMINM = 'catreginm.NUMINM';

	
	const UBIGEX = 'catreginm.UBIGEX';

	
	const UBIGEY = 'catreginm.UBIGEY';

	
	const UBIGEZ = 'catreginm.UBIGEZ';

	
	const NUMHAB = 'catreginm.NUMHAB';

	
	const NUMPER = 'catreginm.NUMPER';

	
	const NUMSAN = 'catreginm.NUMSAN';

	
	const NUMTOM = 'catreginm.NUMTOM';

	
	const AREVER = 'catreginm.AREVER';

	
	const LOCCOM = 'catreginm.LOCCOM';

	
	const LOCIND = 'catreginm.LOCIND';

	
	const CAPTAN = 'catreginm.CAPTAN';

	
	const CAPPIS = 'catreginm.CAPPIS';

	
	const TRAPIS = 'catreginm.TRAPIS';

	
	const NUMTEL = 'catreginm.NUMTEL';

	
	const NOMARCCRO = 'catreginm.NOMARCCRO';

	
	const OFICOM = 'catreginm.OFICOM';

	
	const FOTINM = 'catreginm.FOTINM';

	
	const ID = 'catreginm.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('CatsubprcId', 'CatprcId', 'CatmanId', 'CatsecId', 'CatparId', 'CatmunId', 'CatciuId', 'CatestId', 'CatbarurbId', 'CattramofroId', 'CattramolatId', 'Cattramolat2Id', 'CatcodposId', 'CattipvivId', 'CatconinmId', 'CatusoespId', 'CatconsocId', 'CatrutId', 'CatcarterinmId', 'CatproterId', 'Coddivgeo', 'Nrocas', 'Fecreg', 'Dirinm', 'Nivinm', 'Unihab', 'Edicas', 'Pisinm', 'Numinm', 'Ubigex', 'Ubigey', 'Ubigez', 'Numhab', 'Numper', 'Numsan', 'Numtom', 'Arever', 'Loccom', 'Locind', 'Captan', 'Cappis', 'Trapis', 'Numtel', 'Nomarccro', 'Oficom', 'Fotinm', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CatreginmPeer::CATSUBPRC_ID, CatreginmPeer::CATPRC_ID, CatreginmPeer::CATMAN_ID, CatreginmPeer::CATSEC_ID, CatreginmPeer::CATPAR_ID, CatreginmPeer::CATMUN_ID, CatreginmPeer::CATCIU_ID, CatreginmPeer::CATEST_ID, CatreginmPeer::CATBARURB_ID, CatreginmPeer::CATTRAMOFRO_ID, CatreginmPeer::CATTRAMOLAT_ID, CatreginmPeer::CATTRAMOLAT2_ID, CatreginmPeer::CATCODPOS_ID, CatreginmPeer::CATTIPVIV_ID, CatreginmPeer::CATCONINM_ID, CatreginmPeer::CATUSOESP_ID, CatreginmPeer::CATCONSOC_ID, CatreginmPeer::CATRUT_ID, CatreginmPeer::CATCARTERINM_ID, CatreginmPeer::CATPROTER_ID, CatreginmPeer::CODDIVGEO, CatreginmPeer::NROCAS, CatreginmPeer::FECREG, CatreginmPeer::DIRINM, CatreginmPeer::NIVINM, CatreginmPeer::UNIHAB, CatreginmPeer::EDICAS, CatreginmPeer::PISINM, CatreginmPeer::NUMINM, CatreginmPeer::UBIGEX, CatreginmPeer::UBIGEY, CatreginmPeer::UBIGEZ, CatreginmPeer::NUMHAB, CatreginmPeer::NUMPER, CatreginmPeer::NUMSAN, CatreginmPeer::NUMTOM, CatreginmPeer::AREVER, CatreginmPeer::LOCCOM, CatreginmPeer::LOCIND, CatreginmPeer::CAPTAN, CatreginmPeer::CAPPIS, CatreginmPeer::TRAPIS, CatreginmPeer::NUMTEL, CatreginmPeer::NOMARCCRO, CatreginmPeer::OFICOM, CatreginmPeer::FOTINM, CatreginmPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('catsubprc_id', 'catprc_id', 'catman_id', 'catsec_id', 'catpar_id', 'catmun_id', 'catciu_id', 'catest_id', 'catbarurb_id', 'cattramofro_id', 'cattramolat_id', 'cattramolat2_id', 'catcodpos_id', 'cattipviv_id', 'catconinm_id', 'catusoesp_id', 'catconsoc_id', 'catrut_id', 'catcarterinm_id', 'catproter_id', 'coddivgeo', 'nrocas', 'fecreg', 'dirinm', 'nivinm', 'unihab', 'edicas', 'pisinm', 'numinm', 'ubigex', 'ubigey', 'ubigez', 'numhab', 'numper', 'numsan', 'numtom', 'arever', 'loccom', 'locind', 'captan', 'cappis', 'trapis', 'numtel', 'nomarccro', 'oficom', 'fotinm', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('CatsubprcId' => 0, 'CatprcId' => 1, 'CatmanId' => 2, 'CatsecId' => 3, 'CatparId' => 4, 'CatmunId' => 5, 'CatciuId' => 6, 'CatestId' => 7, 'CatbarurbId' => 8, 'CattramofroId' => 9, 'CattramolatId' => 10, 'Cattramolat2Id' => 11, 'CatcodposId' => 12, 'CattipvivId' => 13, 'CatconinmId' => 14, 'CatusoespId' => 15, 'CatconsocId' => 16, 'CatrutId' => 17, 'CatcarterinmId' => 18, 'CatproterId' => 19, 'Coddivgeo' => 20, 'Nrocas' => 21, 'Fecreg' => 22, 'Dirinm' => 23, 'Nivinm' => 24, 'Unihab' => 25, 'Edicas' => 26, 'Pisinm' => 27, 'Numinm' => 28, 'Ubigex' => 29, 'Ubigey' => 30, 'Ubigez' => 31, 'Numhab' => 32, 'Numper' => 33, 'Numsan' => 34, 'Numtom' => 35, 'Arever' => 36, 'Loccom' => 37, 'Locind' => 38, 'Captan' => 39, 'Cappis' => 40, 'Trapis' => 41, 'Numtel' => 42, 'Nomarccro' => 43, 'Oficom' => 44, 'Fotinm' => 45, 'Id' => 46, ),
		BasePeer::TYPE_COLNAME => array (CatreginmPeer::CATSUBPRC_ID => 0, CatreginmPeer::CATPRC_ID => 1, CatreginmPeer::CATMAN_ID => 2, CatreginmPeer::CATSEC_ID => 3, CatreginmPeer::CATPAR_ID => 4, CatreginmPeer::CATMUN_ID => 5, CatreginmPeer::CATCIU_ID => 6, CatreginmPeer::CATEST_ID => 7, CatreginmPeer::CATBARURB_ID => 8, CatreginmPeer::CATTRAMOFRO_ID => 9, CatreginmPeer::CATTRAMOLAT_ID => 10, CatreginmPeer::CATTRAMOLAT2_ID => 11, CatreginmPeer::CATCODPOS_ID => 12, CatreginmPeer::CATTIPVIV_ID => 13, CatreginmPeer::CATCONINM_ID => 14, CatreginmPeer::CATUSOESP_ID => 15, CatreginmPeer::CATCONSOC_ID => 16, CatreginmPeer::CATRUT_ID => 17, CatreginmPeer::CATCARTERINM_ID => 18, CatreginmPeer::CATPROTER_ID => 19, CatreginmPeer::CODDIVGEO => 20, CatreginmPeer::NROCAS => 21, CatreginmPeer::FECREG => 22, CatreginmPeer::DIRINM => 23, CatreginmPeer::NIVINM => 24, CatreginmPeer::UNIHAB => 25, CatreginmPeer::EDICAS => 26, CatreginmPeer::PISINM => 27, CatreginmPeer::NUMINM => 28, CatreginmPeer::UBIGEX => 29, CatreginmPeer::UBIGEY => 30, CatreginmPeer::UBIGEZ => 31, CatreginmPeer::NUMHAB => 32, CatreginmPeer::NUMPER => 33, CatreginmPeer::NUMSAN => 34, CatreginmPeer::NUMTOM => 35, CatreginmPeer::AREVER => 36, CatreginmPeer::LOCCOM => 37, CatreginmPeer::LOCIND => 38, CatreginmPeer::CAPTAN => 39, CatreginmPeer::CAPPIS => 40, CatreginmPeer::TRAPIS => 41, CatreginmPeer::NUMTEL => 42, CatreginmPeer::NOMARCCRO => 43, CatreginmPeer::OFICOM => 44, CatreginmPeer::FOTINM => 45, CatreginmPeer::ID => 46, ),
		BasePeer::TYPE_FIELDNAME => array ('catsubprc_id' => 0, 'catprc_id' => 1, 'catman_id' => 2, 'catsec_id' => 3, 'catpar_id' => 4, 'catmun_id' => 5, 'catciu_id' => 6, 'catest_id' => 7, 'catbarurb_id' => 8, 'cattramofro_id' => 9, 'cattramolat_id' => 10, 'cattramolat2_id' => 11, 'catcodpos_id' => 12, 'cattipviv_id' => 13, 'catconinm_id' => 14, 'catusoesp_id' => 15, 'catconsoc_id' => 16, 'catrut_id' => 17, 'catcarterinm_id' => 18, 'catproter_id' => 19, 'coddivgeo' => 20, 'nrocas' => 21, 'fecreg' => 22, 'dirinm' => 23, 'nivinm' => 24, 'unihab' => 25, 'edicas' => 26, 'pisinm' => 27, 'numinm' => 28, 'ubigex' => 29, 'ubigey' => 30, 'ubigez' => 31, 'numhab' => 32, 'numper' => 33, 'numsan' => 34, 'numtom' => 35, 'arever' => 36, 'loccom' => 37, 'locind' => 38, 'captan' => 39, 'cappis' => 40, 'trapis' => 41, 'numtel' => 42, 'nomarccro' => 43, 'oficom' => 44, 'fotinm' => 45, 'id' => 46, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/catastro/map/CatreginmMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.catastro.map.CatreginmMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CatreginmPeer::getTableMap();
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
		return str_replace(CatreginmPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CatreginmPeer::CATSUBPRC_ID);

		$criteria->addSelectColumn(CatreginmPeer::CATPRC_ID);

		$criteria->addSelectColumn(CatreginmPeer::CATMAN_ID);

		$criteria->addSelectColumn(CatreginmPeer::CATSEC_ID);

		$criteria->addSelectColumn(CatreginmPeer::CATPAR_ID);

		$criteria->addSelectColumn(CatreginmPeer::CATMUN_ID);

		$criteria->addSelectColumn(CatreginmPeer::CATCIU_ID);

		$criteria->addSelectColumn(CatreginmPeer::CATEST_ID);

		$criteria->addSelectColumn(CatreginmPeer::CATBARURB_ID);

		$criteria->addSelectColumn(CatreginmPeer::CATTRAMOFRO_ID);

		$criteria->addSelectColumn(CatreginmPeer::CATTRAMOLAT_ID);

		$criteria->addSelectColumn(CatreginmPeer::CATTRAMOLAT2_ID);

		$criteria->addSelectColumn(CatreginmPeer::CATCODPOS_ID);

		$criteria->addSelectColumn(CatreginmPeer::CATTIPVIV_ID);

		$criteria->addSelectColumn(CatreginmPeer::CATCONINM_ID);

		$criteria->addSelectColumn(CatreginmPeer::CATUSOESP_ID);

		$criteria->addSelectColumn(CatreginmPeer::CATCONSOC_ID);

		$criteria->addSelectColumn(CatreginmPeer::CATRUT_ID);

		$criteria->addSelectColumn(CatreginmPeer::CATCARTERINM_ID);

		$criteria->addSelectColumn(CatreginmPeer::CATPROTER_ID);

		$criteria->addSelectColumn(CatreginmPeer::CODDIVGEO);

		$criteria->addSelectColumn(CatreginmPeer::NROCAS);

		$criteria->addSelectColumn(CatreginmPeer::FECREG);

		$criteria->addSelectColumn(CatreginmPeer::DIRINM);

		$criteria->addSelectColumn(CatreginmPeer::NIVINM);

		$criteria->addSelectColumn(CatreginmPeer::UNIHAB);

		$criteria->addSelectColumn(CatreginmPeer::EDICAS);

		$criteria->addSelectColumn(CatreginmPeer::PISINM);

		$criteria->addSelectColumn(CatreginmPeer::NUMINM);

		$criteria->addSelectColumn(CatreginmPeer::UBIGEX);

		$criteria->addSelectColumn(CatreginmPeer::UBIGEY);

		$criteria->addSelectColumn(CatreginmPeer::UBIGEZ);

		$criteria->addSelectColumn(CatreginmPeer::NUMHAB);

		$criteria->addSelectColumn(CatreginmPeer::NUMPER);

		$criteria->addSelectColumn(CatreginmPeer::NUMSAN);

		$criteria->addSelectColumn(CatreginmPeer::NUMTOM);

		$criteria->addSelectColumn(CatreginmPeer::AREVER);

		$criteria->addSelectColumn(CatreginmPeer::LOCCOM);

		$criteria->addSelectColumn(CatreginmPeer::LOCIND);

		$criteria->addSelectColumn(CatreginmPeer::CAPTAN);

		$criteria->addSelectColumn(CatreginmPeer::CAPPIS);

		$criteria->addSelectColumn(CatreginmPeer::TRAPIS);

		$criteria->addSelectColumn(CatreginmPeer::NUMTEL);

		$criteria->addSelectColumn(CatreginmPeer::NOMARCCRO);

		$criteria->addSelectColumn(CatreginmPeer::OFICOM);

		$criteria->addSelectColumn(CatreginmPeer::FOTINM);

		$criteria->addSelectColumn(CatreginmPeer::ID);

	}

	const COUNT = 'COUNT(catreginm.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT catreginm.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
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
		$objects = CatreginmPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CatreginmPeer::populateObjects(CatreginmPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CatreginmPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CatreginmPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCatsubprc(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCatprc(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCatman(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCatsec(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCatpar(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCatmun(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCatciu(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCatest(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCatbarurb(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCattramoRelatedByCattramofroId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCattramoRelatedByCattramolatId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCattramoRelatedByCattramolat2Id(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCatcodpos(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCattipviv(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCatconinm(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCatusoesp(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCatconsoc(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCatrut(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCatcarterinm(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCatproter(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCatsubprc(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatsubprcPeer::addSelectColumns($c);

		$c->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatsubprcPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatsubprc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatreginm($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCatprc(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatprcPeer::addSelectColumns($c);

		$c->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatprcPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatprc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatreginm($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCatman(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatmanPeer::addSelectColumns($c);

		$c->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatmanPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatman(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatreginm($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCatsec(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatsecPeer::addSelectColumns($c);

		$c->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatsecPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatsec(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatreginm($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCatpar(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatparPeer::addSelectColumns($c);

		$c->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatparPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatpar(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatreginm($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCatmun(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatmunPeer::addSelectColumns($c);

		$c->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatmunPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatmun(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatreginm($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCatciu(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatciuPeer::addSelectColumns($c);

		$c->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatciuPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatciu(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatreginm($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCatest(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatestPeer::addSelectColumns($c);

		$c->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatestPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatest(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatreginm($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCatbarurb(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatbarurbPeer::addSelectColumns($c);

		$c->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatbarurbPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatbarurb(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatreginm($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCattramoRelatedByCattramofroId(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CattramoPeer::addSelectColumns($c);

		$c->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CattramoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCattramoRelatedByCattramofroId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatreginmRelatedByCattramofroId($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatreginmsRelatedByCattramofroId();
				$obj2->addCatreginmRelatedByCattramofroId($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCattramoRelatedByCattramolatId(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CattramoPeer::addSelectColumns($c);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CattramoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCattramoRelatedByCattramolatId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatreginmRelatedByCattramolatId($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatreginmsRelatedByCattramolatId();
				$obj2->addCatreginmRelatedByCattramolatId($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCattramoRelatedByCattramolat2Id(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CattramoPeer::addSelectColumns($c);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CattramoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCattramoRelatedByCattramolat2Id(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatreginmRelatedByCattramolat2Id($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatreginmsRelatedByCattramolat2Id();
				$obj2->addCatreginmRelatedByCattramolat2Id($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCatcodpos(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatcodposPeer::addSelectColumns($c);

		$c->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatcodposPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatcodpos(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatreginm($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCattipviv(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CattipvivPeer::addSelectColumns($c);

		$c->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CattipvivPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCattipviv(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatreginm($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCatconinm(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatconinmPeer::addSelectColumns($c);

		$c->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatconinmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatconinm(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatreginm($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCatusoesp(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatusoespPeer::addSelectColumns($c);

		$c->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatusoespPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatusoesp(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatreginm($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCatconsoc(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatconsocPeer::addSelectColumns($c);

		$c->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatconsocPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatconsoc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatreginm($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCatrut(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatrutPeer::addSelectColumns($c);

		$c->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatrutPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatrut(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatreginm($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCatcarterinm(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatcarterinmPeer::addSelectColumns($c);

		$c->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatcarterinmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatcarterinm(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatreginm($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCatproter(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatproterPeer::addSelectColumns($c);

		$c->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatproterPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatproter(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatreginm($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
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

		CatreginmPeer::addSelectColumns($c);
		$startcol2 = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatsubprcPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatsubprcPeer::NUM_COLUMNS;

		CatprcPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatprcPeer::NUM_COLUMNS;

		CatmanPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatmanPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CatmunPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CatciuPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + CatestPeer::NUM_COLUMNS;

		CatbarurbPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + CatbarurbPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol14 = $startcol13 + CattramoPeer::NUM_COLUMNS;

		CatcodposPeer::addSelectColumns($c);
		$startcol15 = $startcol14 + CatcodposPeer::NUM_COLUMNS;

		CattipvivPeer::addSelectColumns($c);
		$startcol16 = $startcol15 + CattipvivPeer::NUM_COLUMNS;

		CatconinmPeer::addSelectColumns($c);
		$startcol17 = $startcol16 + CatconinmPeer::NUM_COLUMNS;

		CatusoespPeer::addSelectColumns($c);
		$startcol18 = $startcol17 + CatusoespPeer::NUM_COLUMNS;

		CatconsocPeer::addSelectColumns($c);
		$startcol19 = $startcol18 + CatconsocPeer::NUM_COLUMNS;

		CatrutPeer::addSelectColumns($c);
		$startcol20 = $startcol19 + CatrutPeer::NUM_COLUMNS;

		CatcarterinmPeer::addSelectColumns($c);
		$startcol21 = $startcol20 + CatcarterinmPeer::NUM_COLUMNS;

		CatproterPeer::addSelectColumns($c);
		$startcol22 = $startcol21 + CatproterPeer::NUM_COLUMNS;

		$c->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$c->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$c->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$c->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$c->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$c->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = CatsubprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatsubprc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatreginm($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1);
			}


					
			$omClass = CatprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatprc(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatreginm($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initCatreginms();
				$obj3->addCatreginm($obj1);
			}


					
			$omClass = CatmanPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatman(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatreginm($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initCatreginms();
				$obj4->addCatreginm($obj1);
			}


					
			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatsec(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatreginm($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initCatreginms();
				$obj5->addCatreginm($obj1);
			}


					
			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6 = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatpar(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatreginm($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj6->initCatreginms();
				$obj6->addCatreginm($obj1);
			}


					
			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7 = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCatmun(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatreginm($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj7->initCatreginms();
				$obj7->addCatreginm($obj1);
			}


					
			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8 = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCatciu(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatreginm($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj8->initCatreginms();
				$obj8->addCatreginm($obj1);
			}


					
			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9 = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getCatest(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addCatreginm($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj9->initCatreginms();
				$obj9->addCatreginm($obj1);
			}


					
			$omClass = CatbarurbPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10 = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getCatbarurb(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addCatreginm($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj10->initCatreginms();
				$obj10->addCatreginm($obj1);
			}


					
			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11 = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getCattramoRelatedByCattramofroId(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addCatreginmRelatedByCattramofroId($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj11->initCatreginmsRelatedByCattramofroId();
				$obj11->addCatreginmRelatedByCattramofroId($obj1);
			}


					
			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj12 = new $cls();
			$obj12->hydrate($rs, $startcol12);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj12 = $temp_obj1->getCattramoRelatedByCattramolatId(); 				if ($temp_obj12->getPrimaryKey() === $obj12->getPrimaryKey()) {
					$newObject = false;
					$temp_obj12->addCatreginmRelatedByCattramolatId($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj12->initCatreginmsRelatedByCattramolatId();
				$obj12->addCatreginmRelatedByCattramolatId($obj1);
			}


					
			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj13 = new $cls();
			$obj13->hydrate($rs, $startcol13);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj13 = $temp_obj1->getCattramoRelatedByCattramolat2Id(); 				if ($temp_obj13->getPrimaryKey() === $obj13->getPrimaryKey()) {
					$newObject = false;
					$temp_obj13->addCatreginmRelatedByCattramolat2Id($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj13->initCatreginmsRelatedByCattramolat2Id();
				$obj13->addCatreginmRelatedByCattramolat2Id($obj1);
			}


					
			$omClass = CatcodposPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj14 = new $cls();
			$obj14->hydrate($rs, $startcol14);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj14 = $temp_obj1->getCatcodpos(); 				if ($temp_obj14->getPrimaryKey() === $obj14->getPrimaryKey()) {
					$newObject = false;
					$temp_obj14->addCatreginm($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj14->initCatreginms();
				$obj14->addCatreginm($obj1);
			}


					
			$omClass = CattipvivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj15 = new $cls();
			$obj15->hydrate($rs, $startcol15);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj15 = $temp_obj1->getCattipviv(); 				if ($temp_obj15->getPrimaryKey() === $obj15->getPrimaryKey()) {
					$newObject = false;
					$temp_obj15->addCatreginm($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj15->initCatreginms();
				$obj15->addCatreginm($obj1);
			}


					
			$omClass = CatconinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj16 = new $cls();
			$obj16->hydrate($rs, $startcol16);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj16 = $temp_obj1->getCatconinm(); 				if ($temp_obj16->getPrimaryKey() === $obj16->getPrimaryKey()) {
					$newObject = false;
					$temp_obj16->addCatreginm($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj16->initCatreginms();
				$obj16->addCatreginm($obj1);
			}


					
			$omClass = CatusoespPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj17 = new $cls();
			$obj17->hydrate($rs, $startcol17);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj17 = $temp_obj1->getCatusoesp(); 				if ($temp_obj17->getPrimaryKey() === $obj17->getPrimaryKey()) {
					$newObject = false;
					$temp_obj17->addCatreginm($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj17->initCatreginms();
				$obj17->addCatreginm($obj1);
			}


					
			$omClass = CatconsocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj18 = new $cls();
			$obj18->hydrate($rs, $startcol18);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj18 = $temp_obj1->getCatconsoc(); 				if ($temp_obj18->getPrimaryKey() === $obj18->getPrimaryKey()) {
					$newObject = false;
					$temp_obj18->addCatreginm($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj18->initCatreginms();
				$obj18->addCatreginm($obj1);
			}


					
			$omClass = CatrutPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj19 = new $cls();
			$obj19->hydrate($rs, $startcol19);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj19 = $temp_obj1->getCatrut(); 				if ($temp_obj19->getPrimaryKey() === $obj19->getPrimaryKey()) {
					$newObject = false;
					$temp_obj19->addCatreginm($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj19->initCatreginms();
				$obj19->addCatreginm($obj1);
			}


					
			$omClass = CatcarterinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj20 = new $cls();
			$obj20->hydrate($rs, $startcol20);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj20 = $temp_obj1->getCatcarterinm(); 				if ($temp_obj20->getPrimaryKey() === $obj20->getPrimaryKey()) {
					$newObject = false;
					$temp_obj20->addCatreginm($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj20->initCatreginms();
				$obj20->addCatreginm($obj1);
			}


					
			$omClass = CatproterPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj21 = new $cls();
			$obj21->hydrate($rs, $startcol21);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj21 = $temp_obj1->getCatproter(); 				if ($temp_obj21->getPrimaryKey() === $obj21->getPrimaryKey()) {
					$newObject = false;
					$temp_obj21->addCatreginm($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj21->initCatreginms();
				$obj21->addCatreginm($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptCatsubprc(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCatprc(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCatman(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCatsec(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCatpar(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCatmun(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCatciu(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCatest(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCatbarurb(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCattramoRelatedByCattramofroId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCattramoRelatedByCattramolatId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCattramoRelatedByCattramolat2Id(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCatcodpos(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCattipviv(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCatconinm(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCatusoesp(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCatconsoc(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCatrut(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCatcarterinm(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCatproter(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$criteria->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$rs = CatreginmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptCatsubprc(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol2 = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatprcPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatprcPeer::NUM_COLUMNS;

		CatmanPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatmanPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatmunPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CatciuPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CatestPeer::NUM_COLUMNS;

		CatbarurbPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + CatbarurbPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + CattramoPeer::NUM_COLUMNS;

		CatcodposPeer::addSelectColumns($c);
		$startcol14 = $startcol13 + CatcodposPeer::NUM_COLUMNS;

		CattipvivPeer::addSelectColumns($c);
		$startcol15 = $startcol14 + CattipvivPeer::NUM_COLUMNS;

		CatconinmPeer::addSelectColumns($c);
		$startcol16 = $startcol15 + CatconinmPeer::NUM_COLUMNS;

		CatusoespPeer::addSelectColumns($c);
		$startcol17 = $startcol16 + CatusoespPeer::NUM_COLUMNS;

		CatconsocPeer::addSelectColumns($c);
		$startcol18 = $startcol17 + CatconsocPeer::NUM_COLUMNS;

		CatrutPeer::addSelectColumns($c);
		$startcol19 = $startcol18 + CatrutPeer::NUM_COLUMNS;

		CatcarterinmPeer::addSelectColumns($c);
		$startcol20 = $startcol19 + CatcarterinmPeer::NUM_COLUMNS;

		CatproterPeer::addSelectColumns($c);
		$startcol21 = $startcol20 + CatproterPeer::NUM_COLUMNS;

		$c->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$c->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$c->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$c->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$c->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$c->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatprc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1);
			}

			$omClass = CatmanPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatman(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatreginms();
				$obj3->addCatreginm($obj1);
			}

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatsec(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatreginms();
				$obj4->addCatreginm($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatpar(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatreginms();
				$obj5->addCatreginm($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatmun(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatreginms();
				$obj6->addCatreginm($obj1);
			}

			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCatciu(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatreginms();
				$obj7->addCatreginm($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCatest(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initCatreginms();
				$obj8->addCatreginm($obj1);
			}

			$omClass = CatbarurbPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getCatbarurb(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initCatreginms();
				$obj9->addCatreginm($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getCattramoRelatedByCattramofroId(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addCatreginmRelatedByCattramofroId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initCatreginmsRelatedByCattramofroId();
				$obj10->addCatreginmRelatedByCattramofroId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11  = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getCattramoRelatedByCattramolatId(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addCatreginmRelatedByCattramolatId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj11->initCatreginmsRelatedByCattramolatId();
				$obj11->addCatreginmRelatedByCattramolatId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj12  = new $cls();
			$obj12->hydrate($rs, $startcol12);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj12 = $temp_obj1->getCattramoRelatedByCattramolat2Id(); 				if ($temp_obj12->getPrimaryKey() === $obj12->getPrimaryKey()) {
					$newObject = false;
					$temp_obj12->addCatreginmRelatedByCattramolat2Id($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj12->initCatreginmsRelatedByCattramolat2Id();
				$obj12->addCatreginmRelatedByCattramolat2Id($obj1);
			}

			$omClass = CatcodposPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj13  = new $cls();
			$obj13->hydrate($rs, $startcol13);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj13 = $temp_obj1->getCatcodpos(); 				if ($temp_obj13->getPrimaryKey() === $obj13->getPrimaryKey()) {
					$newObject = false;
					$temp_obj13->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj13->initCatreginms();
				$obj13->addCatreginm($obj1);
			}

			$omClass = CattipvivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj14  = new $cls();
			$obj14->hydrate($rs, $startcol14);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj14 = $temp_obj1->getCattipviv(); 				if ($temp_obj14->getPrimaryKey() === $obj14->getPrimaryKey()) {
					$newObject = false;
					$temp_obj14->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj14->initCatreginms();
				$obj14->addCatreginm($obj1);
			}

			$omClass = CatconinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj15  = new $cls();
			$obj15->hydrate($rs, $startcol15);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj15 = $temp_obj1->getCatconinm(); 				if ($temp_obj15->getPrimaryKey() === $obj15->getPrimaryKey()) {
					$newObject = false;
					$temp_obj15->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj15->initCatreginms();
				$obj15->addCatreginm($obj1);
			}

			$omClass = CatusoespPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj16  = new $cls();
			$obj16->hydrate($rs, $startcol16);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj16 = $temp_obj1->getCatusoesp(); 				if ($temp_obj16->getPrimaryKey() === $obj16->getPrimaryKey()) {
					$newObject = false;
					$temp_obj16->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj16->initCatreginms();
				$obj16->addCatreginm($obj1);
			}

			$omClass = CatconsocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj17  = new $cls();
			$obj17->hydrate($rs, $startcol17);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj17 = $temp_obj1->getCatconsoc(); 				if ($temp_obj17->getPrimaryKey() === $obj17->getPrimaryKey()) {
					$newObject = false;
					$temp_obj17->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj17->initCatreginms();
				$obj17->addCatreginm($obj1);
			}

			$omClass = CatrutPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj18  = new $cls();
			$obj18->hydrate($rs, $startcol18);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj18 = $temp_obj1->getCatrut(); 				if ($temp_obj18->getPrimaryKey() === $obj18->getPrimaryKey()) {
					$newObject = false;
					$temp_obj18->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj18->initCatreginms();
				$obj18->addCatreginm($obj1);
			}

			$omClass = CatcarterinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj19  = new $cls();
			$obj19->hydrate($rs, $startcol19);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj19 = $temp_obj1->getCatcarterinm(); 				if ($temp_obj19->getPrimaryKey() === $obj19->getPrimaryKey()) {
					$newObject = false;
					$temp_obj19->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj19->initCatreginms();
				$obj19->addCatreginm($obj1);
			}

			$omClass = CatproterPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj20  = new $cls();
			$obj20->hydrate($rs, $startcol20);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj20 = $temp_obj1->getCatproter(); 				if ($temp_obj20->getPrimaryKey() === $obj20->getPrimaryKey()) {
					$newObject = false;
					$temp_obj20->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj20->initCatreginms();
				$obj20->addCatreginm($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCatprc(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol2 = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatsubprcPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatsubprcPeer::NUM_COLUMNS;

		CatmanPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatmanPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatmunPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CatciuPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CatestPeer::NUM_COLUMNS;

		CatbarurbPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + CatbarurbPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + CattramoPeer::NUM_COLUMNS;

		CatcodposPeer::addSelectColumns($c);
		$startcol14 = $startcol13 + CatcodposPeer::NUM_COLUMNS;

		CattipvivPeer::addSelectColumns($c);
		$startcol15 = $startcol14 + CattipvivPeer::NUM_COLUMNS;

		CatconinmPeer::addSelectColumns($c);
		$startcol16 = $startcol15 + CatconinmPeer::NUM_COLUMNS;

		CatusoespPeer::addSelectColumns($c);
		$startcol17 = $startcol16 + CatusoespPeer::NUM_COLUMNS;

		CatconsocPeer::addSelectColumns($c);
		$startcol18 = $startcol17 + CatconsocPeer::NUM_COLUMNS;

		CatrutPeer::addSelectColumns($c);
		$startcol19 = $startcol18 + CatrutPeer::NUM_COLUMNS;

		CatcarterinmPeer::addSelectColumns($c);
		$startcol20 = $startcol19 + CatcarterinmPeer::NUM_COLUMNS;

		CatproterPeer::addSelectColumns($c);
		$startcol21 = $startcol20 + CatproterPeer::NUM_COLUMNS;

		$c->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$c->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$c->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$c->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$c->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$c->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatsubprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatsubprc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1);
			}

			$omClass = CatmanPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatman(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatreginms();
				$obj3->addCatreginm($obj1);
			}

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatsec(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatreginms();
				$obj4->addCatreginm($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatpar(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatreginms();
				$obj5->addCatreginm($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatmun(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatreginms();
				$obj6->addCatreginm($obj1);
			}

			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCatciu(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatreginms();
				$obj7->addCatreginm($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCatest(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initCatreginms();
				$obj8->addCatreginm($obj1);
			}

			$omClass = CatbarurbPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getCatbarurb(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initCatreginms();
				$obj9->addCatreginm($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getCattramoRelatedByCattramofroId(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addCatreginmRelatedByCattramofroId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initCatreginmsRelatedByCattramofroId();
				$obj10->addCatreginmRelatedByCattramofroId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11  = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getCattramoRelatedByCattramolatId(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addCatreginmRelatedByCattramolatId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj11->initCatreginmsRelatedByCattramolatId();
				$obj11->addCatreginmRelatedByCattramolatId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj12  = new $cls();
			$obj12->hydrate($rs, $startcol12);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj12 = $temp_obj1->getCattramoRelatedByCattramolat2Id(); 				if ($temp_obj12->getPrimaryKey() === $obj12->getPrimaryKey()) {
					$newObject = false;
					$temp_obj12->addCatreginmRelatedByCattramolat2Id($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj12->initCatreginmsRelatedByCattramolat2Id();
				$obj12->addCatreginmRelatedByCattramolat2Id($obj1);
			}

			$omClass = CatcodposPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj13  = new $cls();
			$obj13->hydrate($rs, $startcol13);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj13 = $temp_obj1->getCatcodpos(); 				if ($temp_obj13->getPrimaryKey() === $obj13->getPrimaryKey()) {
					$newObject = false;
					$temp_obj13->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj13->initCatreginms();
				$obj13->addCatreginm($obj1);
			}

			$omClass = CattipvivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj14  = new $cls();
			$obj14->hydrate($rs, $startcol14);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj14 = $temp_obj1->getCattipviv(); 				if ($temp_obj14->getPrimaryKey() === $obj14->getPrimaryKey()) {
					$newObject = false;
					$temp_obj14->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj14->initCatreginms();
				$obj14->addCatreginm($obj1);
			}

			$omClass = CatconinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj15  = new $cls();
			$obj15->hydrate($rs, $startcol15);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj15 = $temp_obj1->getCatconinm(); 				if ($temp_obj15->getPrimaryKey() === $obj15->getPrimaryKey()) {
					$newObject = false;
					$temp_obj15->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj15->initCatreginms();
				$obj15->addCatreginm($obj1);
			}

			$omClass = CatusoespPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj16  = new $cls();
			$obj16->hydrate($rs, $startcol16);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj16 = $temp_obj1->getCatusoesp(); 				if ($temp_obj16->getPrimaryKey() === $obj16->getPrimaryKey()) {
					$newObject = false;
					$temp_obj16->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj16->initCatreginms();
				$obj16->addCatreginm($obj1);
			}

			$omClass = CatconsocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj17  = new $cls();
			$obj17->hydrate($rs, $startcol17);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj17 = $temp_obj1->getCatconsoc(); 				if ($temp_obj17->getPrimaryKey() === $obj17->getPrimaryKey()) {
					$newObject = false;
					$temp_obj17->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj17->initCatreginms();
				$obj17->addCatreginm($obj1);
			}

			$omClass = CatrutPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj18  = new $cls();
			$obj18->hydrate($rs, $startcol18);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj18 = $temp_obj1->getCatrut(); 				if ($temp_obj18->getPrimaryKey() === $obj18->getPrimaryKey()) {
					$newObject = false;
					$temp_obj18->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj18->initCatreginms();
				$obj18->addCatreginm($obj1);
			}

			$omClass = CatcarterinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj19  = new $cls();
			$obj19->hydrate($rs, $startcol19);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj19 = $temp_obj1->getCatcarterinm(); 				if ($temp_obj19->getPrimaryKey() === $obj19->getPrimaryKey()) {
					$newObject = false;
					$temp_obj19->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj19->initCatreginms();
				$obj19->addCatreginm($obj1);
			}

			$omClass = CatproterPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj20  = new $cls();
			$obj20->hydrate($rs, $startcol20);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj20 = $temp_obj1->getCatproter(); 				if ($temp_obj20->getPrimaryKey() === $obj20->getPrimaryKey()) {
					$newObject = false;
					$temp_obj20->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj20->initCatreginms();
				$obj20->addCatreginm($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCatman(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol2 = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatsubprcPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatsubprcPeer::NUM_COLUMNS;

		CatprcPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatprcPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatmunPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CatciuPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CatestPeer::NUM_COLUMNS;

		CatbarurbPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + CatbarurbPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + CattramoPeer::NUM_COLUMNS;

		CatcodposPeer::addSelectColumns($c);
		$startcol14 = $startcol13 + CatcodposPeer::NUM_COLUMNS;

		CattipvivPeer::addSelectColumns($c);
		$startcol15 = $startcol14 + CattipvivPeer::NUM_COLUMNS;

		CatconinmPeer::addSelectColumns($c);
		$startcol16 = $startcol15 + CatconinmPeer::NUM_COLUMNS;

		CatusoespPeer::addSelectColumns($c);
		$startcol17 = $startcol16 + CatusoespPeer::NUM_COLUMNS;

		CatconsocPeer::addSelectColumns($c);
		$startcol18 = $startcol17 + CatconsocPeer::NUM_COLUMNS;

		CatrutPeer::addSelectColumns($c);
		$startcol19 = $startcol18 + CatrutPeer::NUM_COLUMNS;

		CatcarterinmPeer::addSelectColumns($c);
		$startcol20 = $startcol19 + CatcarterinmPeer::NUM_COLUMNS;

		CatproterPeer::addSelectColumns($c);
		$startcol21 = $startcol20 + CatproterPeer::NUM_COLUMNS;

		$c->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$c->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$c->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$c->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$c->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatsubprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatsubprc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1);
			}

			$omClass = CatprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatprc(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatreginms();
				$obj3->addCatreginm($obj1);
			}

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatsec(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatreginms();
				$obj4->addCatreginm($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatpar(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatreginms();
				$obj5->addCatreginm($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatmun(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatreginms();
				$obj6->addCatreginm($obj1);
			}

			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCatciu(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatreginms();
				$obj7->addCatreginm($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCatest(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initCatreginms();
				$obj8->addCatreginm($obj1);
			}

			$omClass = CatbarurbPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getCatbarurb(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initCatreginms();
				$obj9->addCatreginm($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getCattramoRelatedByCattramofroId(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addCatreginmRelatedByCattramofroId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initCatreginmsRelatedByCattramofroId();
				$obj10->addCatreginmRelatedByCattramofroId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11  = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getCattramoRelatedByCattramolatId(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addCatreginmRelatedByCattramolatId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj11->initCatreginmsRelatedByCattramolatId();
				$obj11->addCatreginmRelatedByCattramolatId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj12  = new $cls();
			$obj12->hydrate($rs, $startcol12);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj12 = $temp_obj1->getCattramoRelatedByCattramolat2Id(); 				if ($temp_obj12->getPrimaryKey() === $obj12->getPrimaryKey()) {
					$newObject = false;
					$temp_obj12->addCatreginmRelatedByCattramolat2Id($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj12->initCatreginmsRelatedByCattramolat2Id();
				$obj12->addCatreginmRelatedByCattramolat2Id($obj1);
			}

			$omClass = CatcodposPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj13  = new $cls();
			$obj13->hydrate($rs, $startcol13);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj13 = $temp_obj1->getCatcodpos(); 				if ($temp_obj13->getPrimaryKey() === $obj13->getPrimaryKey()) {
					$newObject = false;
					$temp_obj13->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj13->initCatreginms();
				$obj13->addCatreginm($obj1);
			}

			$omClass = CattipvivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj14  = new $cls();
			$obj14->hydrate($rs, $startcol14);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj14 = $temp_obj1->getCattipviv(); 				if ($temp_obj14->getPrimaryKey() === $obj14->getPrimaryKey()) {
					$newObject = false;
					$temp_obj14->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj14->initCatreginms();
				$obj14->addCatreginm($obj1);
			}

			$omClass = CatconinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj15  = new $cls();
			$obj15->hydrate($rs, $startcol15);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj15 = $temp_obj1->getCatconinm(); 				if ($temp_obj15->getPrimaryKey() === $obj15->getPrimaryKey()) {
					$newObject = false;
					$temp_obj15->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj15->initCatreginms();
				$obj15->addCatreginm($obj1);
			}

			$omClass = CatusoespPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj16  = new $cls();
			$obj16->hydrate($rs, $startcol16);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj16 = $temp_obj1->getCatusoesp(); 				if ($temp_obj16->getPrimaryKey() === $obj16->getPrimaryKey()) {
					$newObject = false;
					$temp_obj16->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj16->initCatreginms();
				$obj16->addCatreginm($obj1);
			}

			$omClass = CatconsocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj17  = new $cls();
			$obj17->hydrate($rs, $startcol17);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj17 = $temp_obj1->getCatconsoc(); 				if ($temp_obj17->getPrimaryKey() === $obj17->getPrimaryKey()) {
					$newObject = false;
					$temp_obj17->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj17->initCatreginms();
				$obj17->addCatreginm($obj1);
			}

			$omClass = CatrutPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj18  = new $cls();
			$obj18->hydrate($rs, $startcol18);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj18 = $temp_obj1->getCatrut(); 				if ($temp_obj18->getPrimaryKey() === $obj18->getPrimaryKey()) {
					$newObject = false;
					$temp_obj18->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj18->initCatreginms();
				$obj18->addCatreginm($obj1);
			}

			$omClass = CatcarterinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj19  = new $cls();
			$obj19->hydrate($rs, $startcol19);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj19 = $temp_obj1->getCatcarterinm(); 				if ($temp_obj19->getPrimaryKey() === $obj19->getPrimaryKey()) {
					$newObject = false;
					$temp_obj19->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj19->initCatreginms();
				$obj19->addCatreginm($obj1);
			}

			$omClass = CatproterPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj20  = new $cls();
			$obj20->hydrate($rs, $startcol20);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj20 = $temp_obj1->getCatproter(); 				if ($temp_obj20->getPrimaryKey() === $obj20->getPrimaryKey()) {
					$newObject = false;
					$temp_obj20->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj20->initCatreginms();
				$obj20->addCatreginm($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCatsec(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol2 = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatsubprcPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatsubprcPeer::NUM_COLUMNS;

		CatprcPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatprcPeer::NUM_COLUMNS;

		CatmanPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatmanPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatmunPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CatciuPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CatestPeer::NUM_COLUMNS;

		CatbarurbPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + CatbarurbPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + CattramoPeer::NUM_COLUMNS;

		CatcodposPeer::addSelectColumns($c);
		$startcol14 = $startcol13 + CatcodposPeer::NUM_COLUMNS;

		CattipvivPeer::addSelectColumns($c);
		$startcol15 = $startcol14 + CattipvivPeer::NUM_COLUMNS;

		CatconinmPeer::addSelectColumns($c);
		$startcol16 = $startcol15 + CatconinmPeer::NUM_COLUMNS;

		CatusoespPeer::addSelectColumns($c);
		$startcol17 = $startcol16 + CatusoespPeer::NUM_COLUMNS;

		CatconsocPeer::addSelectColumns($c);
		$startcol18 = $startcol17 + CatconsocPeer::NUM_COLUMNS;

		CatrutPeer::addSelectColumns($c);
		$startcol19 = $startcol18 + CatrutPeer::NUM_COLUMNS;

		CatcarterinmPeer::addSelectColumns($c);
		$startcol20 = $startcol19 + CatcarterinmPeer::NUM_COLUMNS;

		CatproterPeer::addSelectColumns($c);
		$startcol21 = $startcol20 + CatproterPeer::NUM_COLUMNS;

		$c->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$c->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$c->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$c->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$c->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$c->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatsubprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatsubprc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1);
			}

			$omClass = CatprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatprc(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatreginms();
				$obj3->addCatreginm($obj1);
			}

			$omClass = CatmanPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatman(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatreginms();
				$obj4->addCatreginm($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatpar(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatreginms();
				$obj5->addCatreginm($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatmun(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatreginms();
				$obj6->addCatreginm($obj1);
			}

			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCatciu(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatreginms();
				$obj7->addCatreginm($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCatest(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initCatreginms();
				$obj8->addCatreginm($obj1);
			}

			$omClass = CatbarurbPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getCatbarurb(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initCatreginms();
				$obj9->addCatreginm($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getCattramoRelatedByCattramofroId(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addCatreginmRelatedByCattramofroId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initCatreginmsRelatedByCattramofroId();
				$obj10->addCatreginmRelatedByCattramofroId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11  = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getCattramoRelatedByCattramolatId(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addCatreginmRelatedByCattramolatId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj11->initCatreginmsRelatedByCattramolatId();
				$obj11->addCatreginmRelatedByCattramolatId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj12  = new $cls();
			$obj12->hydrate($rs, $startcol12);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj12 = $temp_obj1->getCattramoRelatedByCattramolat2Id(); 				if ($temp_obj12->getPrimaryKey() === $obj12->getPrimaryKey()) {
					$newObject = false;
					$temp_obj12->addCatreginmRelatedByCattramolat2Id($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj12->initCatreginmsRelatedByCattramolat2Id();
				$obj12->addCatreginmRelatedByCattramolat2Id($obj1);
			}

			$omClass = CatcodposPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj13  = new $cls();
			$obj13->hydrate($rs, $startcol13);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj13 = $temp_obj1->getCatcodpos(); 				if ($temp_obj13->getPrimaryKey() === $obj13->getPrimaryKey()) {
					$newObject = false;
					$temp_obj13->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj13->initCatreginms();
				$obj13->addCatreginm($obj1);
			}

			$omClass = CattipvivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj14  = new $cls();
			$obj14->hydrate($rs, $startcol14);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj14 = $temp_obj1->getCattipviv(); 				if ($temp_obj14->getPrimaryKey() === $obj14->getPrimaryKey()) {
					$newObject = false;
					$temp_obj14->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj14->initCatreginms();
				$obj14->addCatreginm($obj1);
			}

			$omClass = CatconinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj15  = new $cls();
			$obj15->hydrate($rs, $startcol15);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj15 = $temp_obj1->getCatconinm(); 				if ($temp_obj15->getPrimaryKey() === $obj15->getPrimaryKey()) {
					$newObject = false;
					$temp_obj15->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj15->initCatreginms();
				$obj15->addCatreginm($obj1);
			}

			$omClass = CatusoespPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj16  = new $cls();
			$obj16->hydrate($rs, $startcol16);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj16 = $temp_obj1->getCatusoesp(); 				if ($temp_obj16->getPrimaryKey() === $obj16->getPrimaryKey()) {
					$newObject = false;
					$temp_obj16->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj16->initCatreginms();
				$obj16->addCatreginm($obj1);
			}

			$omClass = CatconsocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj17  = new $cls();
			$obj17->hydrate($rs, $startcol17);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj17 = $temp_obj1->getCatconsoc(); 				if ($temp_obj17->getPrimaryKey() === $obj17->getPrimaryKey()) {
					$newObject = false;
					$temp_obj17->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj17->initCatreginms();
				$obj17->addCatreginm($obj1);
			}

			$omClass = CatrutPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj18  = new $cls();
			$obj18->hydrate($rs, $startcol18);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj18 = $temp_obj1->getCatrut(); 				if ($temp_obj18->getPrimaryKey() === $obj18->getPrimaryKey()) {
					$newObject = false;
					$temp_obj18->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj18->initCatreginms();
				$obj18->addCatreginm($obj1);
			}

			$omClass = CatcarterinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj19  = new $cls();
			$obj19->hydrate($rs, $startcol19);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj19 = $temp_obj1->getCatcarterinm(); 				if ($temp_obj19->getPrimaryKey() === $obj19->getPrimaryKey()) {
					$newObject = false;
					$temp_obj19->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj19->initCatreginms();
				$obj19->addCatreginm($obj1);
			}

			$omClass = CatproterPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj20  = new $cls();
			$obj20->hydrate($rs, $startcol20);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj20 = $temp_obj1->getCatproter(); 				if ($temp_obj20->getPrimaryKey() === $obj20->getPrimaryKey()) {
					$newObject = false;
					$temp_obj20->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj20->initCatreginms();
				$obj20->addCatreginm($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCatpar(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol2 = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatsubprcPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatsubprcPeer::NUM_COLUMNS;

		CatprcPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatprcPeer::NUM_COLUMNS;

		CatmanPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatmanPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatsecPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatmunPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CatciuPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CatestPeer::NUM_COLUMNS;

		CatbarurbPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + CatbarurbPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + CattramoPeer::NUM_COLUMNS;

		CatcodposPeer::addSelectColumns($c);
		$startcol14 = $startcol13 + CatcodposPeer::NUM_COLUMNS;

		CattipvivPeer::addSelectColumns($c);
		$startcol15 = $startcol14 + CattipvivPeer::NUM_COLUMNS;

		CatconinmPeer::addSelectColumns($c);
		$startcol16 = $startcol15 + CatconinmPeer::NUM_COLUMNS;

		CatusoespPeer::addSelectColumns($c);
		$startcol17 = $startcol16 + CatusoespPeer::NUM_COLUMNS;

		CatconsocPeer::addSelectColumns($c);
		$startcol18 = $startcol17 + CatconsocPeer::NUM_COLUMNS;

		CatrutPeer::addSelectColumns($c);
		$startcol19 = $startcol18 + CatrutPeer::NUM_COLUMNS;

		CatcarterinmPeer::addSelectColumns($c);
		$startcol20 = $startcol19 + CatcarterinmPeer::NUM_COLUMNS;

		CatproterPeer::addSelectColumns($c);
		$startcol21 = $startcol20 + CatproterPeer::NUM_COLUMNS;

		$c->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$c->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$c->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$c->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$c->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$c->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatsubprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatsubprc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1);
			}

			$omClass = CatprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatprc(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatreginms();
				$obj3->addCatreginm($obj1);
			}

			$omClass = CatmanPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatman(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatreginms();
				$obj4->addCatreginm($obj1);
			}

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatsec(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatreginms();
				$obj5->addCatreginm($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatmun(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatreginms();
				$obj6->addCatreginm($obj1);
			}

			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCatciu(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatreginms();
				$obj7->addCatreginm($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCatest(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initCatreginms();
				$obj8->addCatreginm($obj1);
			}

			$omClass = CatbarurbPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getCatbarurb(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initCatreginms();
				$obj9->addCatreginm($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getCattramoRelatedByCattramofroId(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addCatreginmRelatedByCattramofroId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initCatreginmsRelatedByCattramofroId();
				$obj10->addCatreginmRelatedByCattramofroId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11  = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getCattramoRelatedByCattramolatId(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addCatreginmRelatedByCattramolatId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj11->initCatreginmsRelatedByCattramolatId();
				$obj11->addCatreginmRelatedByCattramolatId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj12  = new $cls();
			$obj12->hydrate($rs, $startcol12);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj12 = $temp_obj1->getCattramoRelatedByCattramolat2Id(); 				if ($temp_obj12->getPrimaryKey() === $obj12->getPrimaryKey()) {
					$newObject = false;
					$temp_obj12->addCatreginmRelatedByCattramolat2Id($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj12->initCatreginmsRelatedByCattramolat2Id();
				$obj12->addCatreginmRelatedByCattramolat2Id($obj1);
			}

			$omClass = CatcodposPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj13  = new $cls();
			$obj13->hydrate($rs, $startcol13);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj13 = $temp_obj1->getCatcodpos(); 				if ($temp_obj13->getPrimaryKey() === $obj13->getPrimaryKey()) {
					$newObject = false;
					$temp_obj13->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj13->initCatreginms();
				$obj13->addCatreginm($obj1);
			}

			$omClass = CattipvivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj14  = new $cls();
			$obj14->hydrate($rs, $startcol14);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj14 = $temp_obj1->getCattipviv(); 				if ($temp_obj14->getPrimaryKey() === $obj14->getPrimaryKey()) {
					$newObject = false;
					$temp_obj14->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj14->initCatreginms();
				$obj14->addCatreginm($obj1);
			}

			$omClass = CatconinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj15  = new $cls();
			$obj15->hydrate($rs, $startcol15);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj15 = $temp_obj1->getCatconinm(); 				if ($temp_obj15->getPrimaryKey() === $obj15->getPrimaryKey()) {
					$newObject = false;
					$temp_obj15->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj15->initCatreginms();
				$obj15->addCatreginm($obj1);
			}

			$omClass = CatusoespPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj16  = new $cls();
			$obj16->hydrate($rs, $startcol16);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj16 = $temp_obj1->getCatusoesp(); 				if ($temp_obj16->getPrimaryKey() === $obj16->getPrimaryKey()) {
					$newObject = false;
					$temp_obj16->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj16->initCatreginms();
				$obj16->addCatreginm($obj1);
			}

			$omClass = CatconsocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj17  = new $cls();
			$obj17->hydrate($rs, $startcol17);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj17 = $temp_obj1->getCatconsoc(); 				if ($temp_obj17->getPrimaryKey() === $obj17->getPrimaryKey()) {
					$newObject = false;
					$temp_obj17->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj17->initCatreginms();
				$obj17->addCatreginm($obj1);
			}

			$omClass = CatrutPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj18  = new $cls();
			$obj18->hydrate($rs, $startcol18);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj18 = $temp_obj1->getCatrut(); 				if ($temp_obj18->getPrimaryKey() === $obj18->getPrimaryKey()) {
					$newObject = false;
					$temp_obj18->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj18->initCatreginms();
				$obj18->addCatreginm($obj1);
			}

			$omClass = CatcarterinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj19  = new $cls();
			$obj19->hydrate($rs, $startcol19);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj19 = $temp_obj1->getCatcarterinm(); 				if ($temp_obj19->getPrimaryKey() === $obj19->getPrimaryKey()) {
					$newObject = false;
					$temp_obj19->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj19->initCatreginms();
				$obj19->addCatreginm($obj1);
			}

			$omClass = CatproterPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj20  = new $cls();
			$obj20->hydrate($rs, $startcol20);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj20 = $temp_obj1->getCatproter(); 				if ($temp_obj20->getPrimaryKey() === $obj20->getPrimaryKey()) {
					$newObject = false;
					$temp_obj20->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj20->initCatreginms();
				$obj20->addCatreginm($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCatmun(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol2 = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatsubprcPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatsubprcPeer::NUM_COLUMNS;

		CatprcPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatprcPeer::NUM_COLUMNS;

		CatmanPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatmanPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatparPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CatciuPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CatestPeer::NUM_COLUMNS;

		CatbarurbPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + CatbarurbPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + CattramoPeer::NUM_COLUMNS;

		CatcodposPeer::addSelectColumns($c);
		$startcol14 = $startcol13 + CatcodposPeer::NUM_COLUMNS;

		CattipvivPeer::addSelectColumns($c);
		$startcol15 = $startcol14 + CattipvivPeer::NUM_COLUMNS;

		CatconinmPeer::addSelectColumns($c);
		$startcol16 = $startcol15 + CatconinmPeer::NUM_COLUMNS;

		CatusoespPeer::addSelectColumns($c);
		$startcol17 = $startcol16 + CatusoespPeer::NUM_COLUMNS;

		CatconsocPeer::addSelectColumns($c);
		$startcol18 = $startcol17 + CatconsocPeer::NUM_COLUMNS;

		CatrutPeer::addSelectColumns($c);
		$startcol19 = $startcol18 + CatrutPeer::NUM_COLUMNS;

		CatcarterinmPeer::addSelectColumns($c);
		$startcol20 = $startcol19 + CatcarterinmPeer::NUM_COLUMNS;

		CatproterPeer::addSelectColumns($c);
		$startcol21 = $startcol20 + CatproterPeer::NUM_COLUMNS;

		$c->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$c->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$c->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$c->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$c->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$c->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatsubprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatsubprc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1);
			}

			$omClass = CatprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatprc(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatreginms();
				$obj3->addCatreginm($obj1);
			}

			$omClass = CatmanPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatman(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatreginms();
				$obj4->addCatreginm($obj1);
			}

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatsec(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatreginms();
				$obj5->addCatreginm($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatpar(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatreginms();
				$obj6->addCatreginm($obj1);
			}

			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCatciu(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatreginms();
				$obj7->addCatreginm($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCatest(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initCatreginms();
				$obj8->addCatreginm($obj1);
			}

			$omClass = CatbarurbPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getCatbarurb(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initCatreginms();
				$obj9->addCatreginm($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getCattramoRelatedByCattramofroId(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addCatreginmRelatedByCattramofroId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initCatreginmsRelatedByCattramofroId();
				$obj10->addCatreginmRelatedByCattramofroId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11  = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getCattramoRelatedByCattramolatId(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addCatreginmRelatedByCattramolatId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj11->initCatreginmsRelatedByCattramolatId();
				$obj11->addCatreginmRelatedByCattramolatId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj12  = new $cls();
			$obj12->hydrate($rs, $startcol12);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj12 = $temp_obj1->getCattramoRelatedByCattramolat2Id(); 				if ($temp_obj12->getPrimaryKey() === $obj12->getPrimaryKey()) {
					$newObject = false;
					$temp_obj12->addCatreginmRelatedByCattramolat2Id($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj12->initCatreginmsRelatedByCattramolat2Id();
				$obj12->addCatreginmRelatedByCattramolat2Id($obj1);
			}

			$omClass = CatcodposPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj13  = new $cls();
			$obj13->hydrate($rs, $startcol13);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj13 = $temp_obj1->getCatcodpos(); 				if ($temp_obj13->getPrimaryKey() === $obj13->getPrimaryKey()) {
					$newObject = false;
					$temp_obj13->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj13->initCatreginms();
				$obj13->addCatreginm($obj1);
			}

			$omClass = CattipvivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj14  = new $cls();
			$obj14->hydrate($rs, $startcol14);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj14 = $temp_obj1->getCattipviv(); 				if ($temp_obj14->getPrimaryKey() === $obj14->getPrimaryKey()) {
					$newObject = false;
					$temp_obj14->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj14->initCatreginms();
				$obj14->addCatreginm($obj1);
			}

			$omClass = CatconinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj15  = new $cls();
			$obj15->hydrate($rs, $startcol15);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj15 = $temp_obj1->getCatconinm(); 				if ($temp_obj15->getPrimaryKey() === $obj15->getPrimaryKey()) {
					$newObject = false;
					$temp_obj15->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj15->initCatreginms();
				$obj15->addCatreginm($obj1);
			}

			$omClass = CatusoespPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj16  = new $cls();
			$obj16->hydrate($rs, $startcol16);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj16 = $temp_obj1->getCatusoesp(); 				if ($temp_obj16->getPrimaryKey() === $obj16->getPrimaryKey()) {
					$newObject = false;
					$temp_obj16->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj16->initCatreginms();
				$obj16->addCatreginm($obj1);
			}

			$omClass = CatconsocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj17  = new $cls();
			$obj17->hydrate($rs, $startcol17);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj17 = $temp_obj1->getCatconsoc(); 				if ($temp_obj17->getPrimaryKey() === $obj17->getPrimaryKey()) {
					$newObject = false;
					$temp_obj17->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj17->initCatreginms();
				$obj17->addCatreginm($obj1);
			}

			$omClass = CatrutPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj18  = new $cls();
			$obj18->hydrate($rs, $startcol18);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj18 = $temp_obj1->getCatrut(); 				if ($temp_obj18->getPrimaryKey() === $obj18->getPrimaryKey()) {
					$newObject = false;
					$temp_obj18->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj18->initCatreginms();
				$obj18->addCatreginm($obj1);
			}

			$omClass = CatcarterinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj19  = new $cls();
			$obj19->hydrate($rs, $startcol19);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj19 = $temp_obj1->getCatcarterinm(); 				if ($temp_obj19->getPrimaryKey() === $obj19->getPrimaryKey()) {
					$newObject = false;
					$temp_obj19->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj19->initCatreginms();
				$obj19->addCatreginm($obj1);
			}

			$omClass = CatproterPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj20  = new $cls();
			$obj20->hydrate($rs, $startcol20);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj20 = $temp_obj1->getCatproter(); 				if ($temp_obj20->getPrimaryKey() === $obj20->getPrimaryKey()) {
					$newObject = false;
					$temp_obj20->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj20->initCatreginms();
				$obj20->addCatreginm($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCatciu(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol2 = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatsubprcPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatsubprcPeer::NUM_COLUMNS;

		CatprcPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatprcPeer::NUM_COLUMNS;

		CatmanPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatmanPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CatmunPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CatestPeer::NUM_COLUMNS;

		CatbarurbPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + CatbarurbPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + CattramoPeer::NUM_COLUMNS;

		CatcodposPeer::addSelectColumns($c);
		$startcol14 = $startcol13 + CatcodposPeer::NUM_COLUMNS;

		CattipvivPeer::addSelectColumns($c);
		$startcol15 = $startcol14 + CattipvivPeer::NUM_COLUMNS;

		CatconinmPeer::addSelectColumns($c);
		$startcol16 = $startcol15 + CatconinmPeer::NUM_COLUMNS;

		CatusoespPeer::addSelectColumns($c);
		$startcol17 = $startcol16 + CatusoespPeer::NUM_COLUMNS;

		CatconsocPeer::addSelectColumns($c);
		$startcol18 = $startcol17 + CatconsocPeer::NUM_COLUMNS;

		CatrutPeer::addSelectColumns($c);
		$startcol19 = $startcol18 + CatrutPeer::NUM_COLUMNS;

		CatcarterinmPeer::addSelectColumns($c);
		$startcol20 = $startcol19 + CatcarterinmPeer::NUM_COLUMNS;

		CatproterPeer::addSelectColumns($c);
		$startcol21 = $startcol20 + CatproterPeer::NUM_COLUMNS;

		$c->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$c->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$c->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$c->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$c->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$c->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatsubprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatsubprc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1);
			}

			$omClass = CatprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatprc(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatreginms();
				$obj3->addCatreginm($obj1);
			}

			$omClass = CatmanPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatman(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatreginms();
				$obj4->addCatreginm($obj1);
			}

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatsec(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatreginms();
				$obj5->addCatreginm($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatpar(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatreginms();
				$obj6->addCatreginm($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCatmun(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatreginms();
				$obj7->addCatreginm($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCatest(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initCatreginms();
				$obj8->addCatreginm($obj1);
			}

			$omClass = CatbarurbPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getCatbarurb(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initCatreginms();
				$obj9->addCatreginm($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getCattramoRelatedByCattramofroId(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addCatreginmRelatedByCattramofroId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initCatreginmsRelatedByCattramofroId();
				$obj10->addCatreginmRelatedByCattramofroId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11  = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getCattramoRelatedByCattramolatId(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addCatreginmRelatedByCattramolatId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj11->initCatreginmsRelatedByCattramolatId();
				$obj11->addCatreginmRelatedByCattramolatId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj12  = new $cls();
			$obj12->hydrate($rs, $startcol12);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj12 = $temp_obj1->getCattramoRelatedByCattramolat2Id(); 				if ($temp_obj12->getPrimaryKey() === $obj12->getPrimaryKey()) {
					$newObject = false;
					$temp_obj12->addCatreginmRelatedByCattramolat2Id($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj12->initCatreginmsRelatedByCattramolat2Id();
				$obj12->addCatreginmRelatedByCattramolat2Id($obj1);
			}

			$omClass = CatcodposPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj13  = new $cls();
			$obj13->hydrate($rs, $startcol13);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj13 = $temp_obj1->getCatcodpos(); 				if ($temp_obj13->getPrimaryKey() === $obj13->getPrimaryKey()) {
					$newObject = false;
					$temp_obj13->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj13->initCatreginms();
				$obj13->addCatreginm($obj1);
			}

			$omClass = CattipvivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj14  = new $cls();
			$obj14->hydrate($rs, $startcol14);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj14 = $temp_obj1->getCattipviv(); 				if ($temp_obj14->getPrimaryKey() === $obj14->getPrimaryKey()) {
					$newObject = false;
					$temp_obj14->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj14->initCatreginms();
				$obj14->addCatreginm($obj1);
			}

			$omClass = CatconinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj15  = new $cls();
			$obj15->hydrate($rs, $startcol15);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj15 = $temp_obj1->getCatconinm(); 				if ($temp_obj15->getPrimaryKey() === $obj15->getPrimaryKey()) {
					$newObject = false;
					$temp_obj15->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj15->initCatreginms();
				$obj15->addCatreginm($obj1);
			}

			$omClass = CatusoespPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj16  = new $cls();
			$obj16->hydrate($rs, $startcol16);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj16 = $temp_obj1->getCatusoesp(); 				if ($temp_obj16->getPrimaryKey() === $obj16->getPrimaryKey()) {
					$newObject = false;
					$temp_obj16->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj16->initCatreginms();
				$obj16->addCatreginm($obj1);
			}

			$omClass = CatconsocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj17  = new $cls();
			$obj17->hydrate($rs, $startcol17);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj17 = $temp_obj1->getCatconsoc(); 				if ($temp_obj17->getPrimaryKey() === $obj17->getPrimaryKey()) {
					$newObject = false;
					$temp_obj17->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj17->initCatreginms();
				$obj17->addCatreginm($obj1);
			}

			$omClass = CatrutPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj18  = new $cls();
			$obj18->hydrate($rs, $startcol18);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj18 = $temp_obj1->getCatrut(); 				if ($temp_obj18->getPrimaryKey() === $obj18->getPrimaryKey()) {
					$newObject = false;
					$temp_obj18->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj18->initCatreginms();
				$obj18->addCatreginm($obj1);
			}

			$omClass = CatcarterinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj19  = new $cls();
			$obj19->hydrate($rs, $startcol19);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj19 = $temp_obj1->getCatcarterinm(); 				if ($temp_obj19->getPrimaryKey() === $obj19->getPrimaryKey()) {
					$newObject = false;
					$temp_obj19->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj19->initCatreginms();
				$obj19->addCatreginm($obj1);
			}

			$omClass = CatproterPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj20  = new $cls();
			$obj20->hydrate($rs, $startcol20);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj20 = $temp_obj1->getCatproter(); 				if ($temp_obj20->getPrimaryKey() === $obj20->getPrimaryKey()) {
					$newObject = false;
					$temp_obj20->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj20->initCatreginms();
				$obj20->addCatreginm($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCatest(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol2 = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatsubprcPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatsubprcPeer::NUM_COLUMNS;

		CatprcPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatprcPeer::NUM_COLUMNS;

		CatmanPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatmanPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CatmunPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CatciuPeer::NUM_COLUMNS;

		CatbarurbPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + CatbarurbPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + CattramoPeer::NUM_COLUMNS;

		CatcodposPeer::addSelectColumns($c);
		$startcol14 = $startcol13 + CatcodposPeer::NUM_COLUMNS;

		CattipvivPeer::addSelectColumns($c);
		$startcol15 = $startcol14 + CattipvivPeer::NUM_COLUMNS;

		CatconinmPeer::addSelectColumns($c);
		$startcol16 = $startcol15 + CatconinmPeer::NUM_COLUMNS;

		CatusoespPeer::addSelectColumns($c);
		$startcol17 = $startcol16 + CatusoespPeer::NUM_COLUMNS;

		CatconsocPeer::addSelectColumns($c);
		$startcol18 = $startcol17 + CatconsocPeer::NUM_COLUMNS;

		CatrutPeer::addSelectColumns($c);
		$startcol19 = $startcol18 + CatrutPeer::NUM_COLUMNS;

		CatcarterinmPeer::addSelectColumns($c);
		$startcol20 = $startcol19 + CatcarterinmPeer::NUM_COLUMNS;

		CatproterPeer::addSelectColumns($c);
		$startcol21 = $startcol20 + CatproterPeer::NUM_COLUMNS;

		$c->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$c->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$c->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$c->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$c->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatsubprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatsubprc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1);
			}

			$omClass = CatprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatprc(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatreginms();
				$obj3->addCatreginm($obj1);
			}

			$omClass = CatmanPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatman(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatreginms();
				$obj4->addCatreginm($obj1);
			}

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatsec(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatreginms();
				$obj5->addCatreginm($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatpar(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatreginms();
				$obj6->addCatreginm($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCatmun(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatreginms();
				$obj7->addCatreginm($obj1);
			}

			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCatciu(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initCatreginms();
				$obj8->addCatreginm($obj1);
			}

			$omClass = CatbarurbPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getCatbarurb(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initCatreginms();
				$obj9->addCatreginm($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getCattramoRelatedByCattramofroId(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addCatreginmRelatedByCattramofroId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initCatreginmsRelatedByCattramofroId();
				$obj10->addCatreginmRelatedByCattramofroId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11  = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getCattramoRelatedByCattramolatId(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addCatreginmRelatedByCattramolatId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj11->initCatreginmsRelatedByCattramolatId();
				$obj11->addCatreginmRelatedByCattramolatId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj12  = new $cls();
			$obj12->hydrate($rs, $startcol12);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj12 = $temp_obj1->getCattramoRelatedByCattramolat2Id(); 				if ($temp_obj12->getPrimaryKey() === $obj12->getPrimaryKey()) {
					$newObject = false;
					$temp_obj12->addCatreginmRelatedByCattramolat2Id($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj12->initCatreginmsRelatedByCattramolat2Id();
				$obj12->addCatreginmRelatedByCattramolat2Id($obj1);
			}

			$omClass = CatcodposPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj13  = new $cls();
			$obj13->hydrate($rs, $startcol13);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj13 = $temp_obj1->getCatcodpos(); 				if ($temp_obj13->getPrimaryKey() === $obj13->getPrimaryKey()) {
					$newObject = false;
					$temp_obj13->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj13->initCatreginms();
				$obj13->addCatreginm($obj1);
			}

			$omClass = CattipvivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj14  = new $cls();
			$obj14->hydrate($rs, $startcol14);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj14 = $temp_obj1->getCattipviv(); 				if ($temp_obj14->getPrimaryKey() === $obj14->getPrimaryKey()) {
					$newObject = false;
					$temp_obj14->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj14->initCatreginms();
				$obj14->addCatreginm($obj1);
			}

			$omClass = CatconinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj15  = new $cls();
			$obj15->hydrate($rs, $startcol15);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj15 = $temp_obj1->getCatconinm(); 				if ($temp_obj15->getPrimaryKey() === $obj15->getPrimaryKey()) {
					$newObject = false;
					$temp_obj15->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj15->initCatreginms();
				$obj15->addCatreginm($obj1);
			}

			$omClass = CatusoespPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj16  = new $cls();
			$obj16->hydrate($rs, $startcol16);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj16 = $temp_obj1->getCatusoesp(); 				if ($temp_obj16->getPrimaryKey() === $obj16->getPrimaryKey()) {
					$newObject = false;
					$temp_obj16->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj16->initCatreginms();
				$obj16->addCatreginm($obj1);
			}

			$omClass = CatconsocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj17  = new $cls();
			$obj17->hydrate($rs, $startcol17);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj17 = $temp_obj1->getCatconsoc(); 				if ($temp_obj17->getPrimaryKey() === $obj17->getPrimaryKey()) {
					$newObject = false;
					$temp_obj17->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj17->initCatreginms();
				$obj17->addCatreginm($obj1);
			}

			$omClass = CatrutPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj18  = new $cls();
			$obj18->hydrate($rs, $startcol18);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj18 = $temp_obj1->getCatrut(); 				if ($temp_obj18->getPrimaryKey() === $obj18->getPrimaryKey()) {
					$newObject = false;
					$temp_obj18->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj18->initCatreginms();
				$obj18->addCatreginm($obj1);
			}

			$omClass = CatcarterinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj19  = new $cls();
			$obj19->hydrate($rs, $startcol19);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj19 = $temp_obj1->getCatcarterinm(); 				if ($temp_obj19->getPrimaryKey() === $obj19->getPrimaryKey()) {
					$newObject = false;
					$temp_obj19->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj19->initCatreginms();
				$obj19->addCatreginm($obj1);
			}

			$omClass = CatproterPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj20  = new $cls();
			$obj20->hydrate($rs, $startcol20);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj20 = $temp_obj1->getCatproter(); 				if ($temp_obj20->getPrimaryKey() === $obj20->getPrimaryKey()) {
					$newObject = false;
					$temp_obj20->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj20->initCatreginms();
				$obj20->addCatreginm($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCatbarurb(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol2 = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatsubprcPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatsubprcPeer::NUM_COLUMNS;

		CatprcPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatprcPeer::NUM_COLUMNS;

		CatmanPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatmanPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CatmunPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CatciuPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + CatestPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + CattramoPeer::NUM_COLUMNS;

		CatcodposPeer::addSelectColumns($c);
		$startcol14 = $startcol13 + CatcodposPeer::NUM_COLUMNS;

		CattipvivPeer::addSelectColumns($c);
		$startcol15 = $startcol14 + CattipvivPeer::NUM_COLUMNS;

		CatconinmPeer::addSelectColumns($c);
		$startcol16 = $startcol15 + CatconinmPeer::NUM_COLUMNS;

		CatusoespPeer::addSelectColumns($c);
		$startcol17 = $startcol16 + CatusoespPeer::NUM_COLUMNS;

		CatconsocPeer::addSelectColumns($c);
		$startcol18 = $startcol17 + CatconsocPeer::NUM_COLUMNS;

		CatrutPeer::addSelectColumns($c);
		$startcol19 = $startcol18 + CatrutPeer::NUM_COLUMNS;

		CatcarterinmPeer::addSelectColumns($c);
		$startcol20 = $startcol19 + CatcarterinmPeer::NUM_COLUMNS;

		CatproterPeer::addSelectColumns($c);
		$startcol21 = $startcol20 + CatproterPeer::NUM_COLUMNS;

		$c->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$c->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$c->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$c->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$c->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatsubprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatsubprc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1);
			}

			$omClass = CatprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatprc(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatreginms();
				$obj3->addCatreginm($obj1);
			}

			$omClass = CatmanPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatman(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatreginms();
				$obj4->addCatreginm($obj1);
			}

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatsec(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatreginms();
				$obj5->addCatreginm($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatpar(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatreginms();
				$obj6->addCatreginm($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCatmun(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatreginms();
				$obj7->addCatreginm($obj1);
			}

			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCatciu(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initCatreginms();
				$obj8->addCatreginm($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getCatest(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initCatreginms();
				$obj9->addCatreginm($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getCattramoRelatedByCattramofroId(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addCatreginmRelatedByCattramofroId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initCatreginmsRelatedByCattramofroId();
				$obj10->addCatreginmRelatedByCattramofroId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11  = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getCattramoRelatedByCattramolatId(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addCatreginmRelatedByCattramolatId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj11->initCatreginmsRelatedByCattramolatId();
				$obj11->addCatreginmRelatedByCattramolatId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj12  = new $cls();
			$obj12->hydrate($rs, $startcol12);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj12 = $temp_obj1->getCattramoRelatedByCattramolat2Id(); 				if ($temp_obj12->getPrimaryKey() === $obj12->getPrimaryKey()) {
					$newObject = false;
					$temp_obj12->addCatreginmRelatedByCattramolat2Id($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj12->initCatreginmsRelatedByCattramolat2Id();
				$obj12->addCatreginmRelatedByCattramolat2Id($obj1);
			}

			$omClass = CatcodposPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj13  = new $cls();
			$obj13->hydrate($rs, $startcol13);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj13 = $temp_obj1->getCatcodpos(); 				if ($temp_obj13->getPrimaryKey() === $obj13->getPrimaryKey()) {
					$newObject = false;
					$temp_obj13->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj13->initCatreginms();
				$obj13->addCatreginm($obj1);
			}

			$omClass = CattipvivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj14  = new $cls();
			$obj14->hydrate($rs, $startcol14);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj14 = $temp_obj1->getCattipviv(); 				if ($temp_obj14->getPrimaryKey() === $obj14->getPrimaryKey()) {
					$newObject = false;
					$temp_obj14->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj14->initCatreginms();
				$obj14->addCatreginm($obj1);
			}

			$omClass = CatconinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj15  = new $cls();
			$obj15->hydrate($rs, $startcol15);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj15 = $temp_obj1->getCatconinm(); 				if ($temp_obj15->getPrimaryKey() === $obj15->getPrimaryKey()) {
					$newObject = false;
					$temp_obj15->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj15->initCatreginms();
				$obj15->addCatreginm($obj1);
			}

			$omClass = CatusoespPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj16  = new $cls();
			$obj16->hydrate($rs, $startcol16);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj16 = $temp_obj1->getCatusoesp(); 				if ($temp_obj16->getPrimaryKey() === $obj16->getPrimaryKey()) {
					$newObject = false;
					$temp_obj16->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj16->initCatreginms();
				$obj16->addCatreginm($obj1);
			}

			$omClass = CatconsocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj17  = new $cls();
			$obj17->hydrate($rs, $startcol17);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj17 = $temp_obj1->getCatconsoc(); 				if ($temp_obj17->getPrimaryKey() === $obj17->getPrimaryKey()) {
					$newObject = false;
					$temp_obj17->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj17->initCatreginms();
				$obj17->addCatreginm($obj1);
			}

			$omClass = CatrutPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj18  = new $cls();
			$obj18->hydrate($rs, $startcol18);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj18 = $temp_obj1->getCatrut(); 				if ($temp_obj18->getPrimaryKey() === $obj18->getPrimaryKey()) {
					$newObject = false;
					$temp_obj18->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj18->initCatreginms();
				$obj18->addCatreginm($obj1);
			}

			$omClass = CatcarterinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj19  = new $cls();
			$obj19->hydrate($rs, $startcol19);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj19 = $temp_obj1->getCatcarterinm(); 				if ($temp_obj19->getPrimaryKey() === $obj19->getPrimaryKey()) {
					$newObject = false;
					$temp_obj19->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj19->initCatreginms();
				$obj19->addCatreginm($obj1);
			}

			$omClass = CatproterPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj20  = new $cls();
			$obj20->hydrate($rs, $startcol20);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj20 = $temp_obj1->getCatproter(); 				if ($temp_obj20->getPrimaryKey() === $obj20->getPrimaryKey()) {
					$newObject = false;
					$temp_obj20->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj20->initCatreginms();
				$obj20->addCatreginm($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCattramoRelatedByCattramofroId(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol2 = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatsubprcPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatsubprcPeer::NUM_COLUMNS;

		CatprcPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatprcPeer::NUM_COLUMNS;

		CatmanPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatmanPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CatmunPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CatciuPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + CatestPeer::NUM_COLUMNS;

		CatbarurbPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + CatbarurbPeer::NUM_COLUMNS;

		CatcodposPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + CatcodposPeer::NUM_COLUMNS;

		CattipvivPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + CattipvivPeer::NUM_COLUMNS;

		CatconinmPeer::addSelectColumns($c);
		$startcol14 = $startcol13 + CatconinmPeer::NUM_COLUMNS;

		CatusoespPeer::addSelectColumns($c);
		$startcol15 = $startcol14 + CatusoespPeer::NUM_COLUMNS;

		CatconsocPeer::addSelectColumns($c);
		$startcol16 = $startcol15 + CatconsocPeer::NUM_COLUMNS;

		CatrutPeer::addSelectColumns($c);
		$startcol17 = $startcol16 + CatrutPeer::NUM_COLUMNS;

		CatcarterinmPeer::addSelectColumns($c);
		$startcol18 = $startcol17 + CatcarterinmPeer::NUM_COLUMNS;

		CatproterPeer::addSelectColumns($c);
		$startcol19 = $startcol18 + CatproterPeer::NUM_COLUMNS;

		$c->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$c->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$c->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$c->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$c->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$c->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$c->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatsubprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatsubprc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1);
			}

			$omClass = CatprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatprc(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatreginms();
				$obj3->addCatreginm($obj1);
			}

			$omClass = CatmanPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatman(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatreginms();
				$obj4->addCatreginm($obj1);
			}

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatsec(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatreginms();
				$obj5->addCatreginm($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatpar(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatreginms();
				$obj6->addCatreginm($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCatmun(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatreginms();
				$obj7->addCatreginm($obj1);
			}

			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCatciu(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initCatreginms();
				$obj8->addCatreginm($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getCatest(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initCatreginms();
				$obj9->addCatreginm($obj1);
			}

			$omClass = CatbarurbPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getCatbarurb(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initCatreginms();
				$obj10->addCatreginm($obj1);
			}

			$omClass = CatcodposPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11  = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getCatcodpos(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj11->initCatreginms();
				$obj11->addCatreginm($obj1);
			}

			$omClass = CattipvivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj12  = new $cls();
			$obj12->hydrate($rs, $startcol12);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj12 = $temp_obj1->getCattipviv(); 				if ($temp_obj12->getPrimaryKey() === $obj12->getPrimaryKey()) {
					$newObject = false;
					$temp_obj12->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj12->initCatreginms();
				$obj12->addCatreginm($obj1);
			}

			$omClass = CatconinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj13  = new $cls();
			$obj13->hydrate($rs, $startcol13);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj13 = $temp_obj1->getCatconinm(); 				if ($temp_obj13->getPrimaryKey() === $obj13->getPrimaryKey()) {
					$newObject = false;
					$temp_obj13->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj13->initCatreginms();
				$obj13->addCatreginm($obj1);
			}

			$omClass = CatusoespPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj14  = new $cls();
			$obj14->hydrate($rs, $startcol14);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj14 = $temp_obj1->getCatusoesp(); 				if ($temp_obj14->getPrimaryKey() === $obj14->getPrimaryKey()) {
					$newObject = false;
					$temp_obj14->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj14->initCatreginms();
				$obj14->addCatreginm($obj1);
			}

			$omClass = CatconsocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj15  = new $cls();
			$obj15->hydrate($rs, $startcol15);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj15 = $temp_obj1->getCatconsoc(); 				if ($temp_obj15->getPrimaryKey() === $obj15->getPrimaryKey()) {
					$newObject = false;
					$temp_obj15->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj15->initCatreginms();
				$obj15->addCatreginm($obj1);
			}

			$omClass = CatrutPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj16  = new $cls();
			$obj16->hydrate($rs, $startcol16);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj16 = $temp_obj1->getCatrut(); 				if ($temp_obj16->getPrimaryKey() === $obj16->getPrimaryKey()) {
					$newObject = false;
					$temp_obj16->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj16->initCatreginms();
				$obj16->addCatreginm($obj1);
			}

			$omClass = CatcarterinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj17  = new $cls();
			$obj17->hydrate($rs, $startcol17);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj17 = $temp_obj1->getCatcarterinm(); 				if ($temp_obj17->getPrimaryKey() === $obj17->getPrimaryKey()) {
					$newObject = false;
					$temp_obj17->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj17->initCatreginms();
				$obj17->addCatreginm($obj1);
			}

			$omClass = CatproterPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj18  = new $cls();
			$obj18->hydrate($rs, $startcol18);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj18 = $temp_obj1->getCatproter(); 				if ($temp_obj18->getPrimaryKey() === $obj18->getPrimaryKey()) {
					$newObject = false;
					$temp_obj18->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj18->initCatreginms();
				$obj18->addCatreginm($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCattramoRelatedByCattramolatId(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol2 = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatsubprcPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatsubprcPeer::NUM_COLUMNS;

		CatprcPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatprcPeer::NUM_COLUMNS;

		CatmanPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatmanPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CatmunPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CatciuPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + CatestPeer::NUM_COLUMNS;

		CatbarurbPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + CatbarurbPeer::NUM_COLUMNS;

		CatcodposPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + CatcodposPeer::NUM_COLUMNS;

		CattipvivPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + CattipvivPeer::NUM_COLUMNS;

		CatconinmPeer::addSelectColumns($c);
		$startcol14 = $startcol13 + CatconinmPeer::NUM_COLUMNS;

		CatusoespPeer::addSelectColumns($c);
		$startcol15 = $startcol14 + CatusoespPeer::NUM_COLUMNS;

		CatconsocPeer::addSelectColumns($c);
		$startcol16 = $startcol15 + CatconsocPeer::NUM_COLUMNS;

		CatrutPeer::addSelectColumns($c);
		$startcol17 = $startcol16 + CatrutPeer::NUM_COLUMNS;

		CatcarterinmPeer::addSelectColumns($c);
		$startcol18 = $startcol17 + CatcarterinmPeer::NUM_COLUMNS;

		CatproterPeer::addSelectColumns($c);
		$startcol19 = $startcol18 + CatproterPeer::NUM_COLUMNS;

		$c->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$c->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$c->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$c->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$c->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$c->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$c->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatsubprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatsubprc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1);
			}

			$omClass = CatprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatprc(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatreginms();
				$obj3->addCatreginm($obj1);
			}

			$omClass = CatmanPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatman(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatreginms();
				$obj4->addCatreginm($obj1);
			}

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatsec(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatreginms();
				$obj5->addCatreginm($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatpar(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatreginms();
				$obj6->addCatreginm($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCatmun(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatreginms();
				$obj7->addCatreginm($obj1);
			}

			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCatciu(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initCatreginms();
				$obj8->addCatreginm($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getCatest(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initCatreginms();
				$obj9->addCatreginm($obj1);
			}

			$omClass = CatbarurbPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getCatbarurb(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initCatreginms();
				$obj10->addCatreginm($obj1);
			}

			$omClass = CatcodposPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11  = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getCatcodpos(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj11->initCatreginms();
				$obj11->addCatreginm($obj1);
			}

			$omClass = CattipvivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj12  = new $cls();
			$obj12->hydrate($rs, $startcol12);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj12 = $temp_obj1->getCattipviv(); 				if ($temp_obj12->getPrimaryKey() === $obj12->getPrimaryKey()) {
					$newObject = false;
					$temp_obj12->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj12->initCatreginms();
				$obj12->addCatreginm($obj1);
			}

			$omClass = CatconinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj13  = new $cls();
			$obj13->hydrate($rs, $startcol13);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj13 = $temp_obj1->getCatconinm(); 				if ($temp_obj13->getPrimaryKey() === $obj13->getPrimaryKey()) {
					$newObject = false;
					$temp_obj13->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj13->initCatreginms();
				$obj13->addCatreginm($obj1);
			}

			$omClass = CatusoespPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj14  = new $cls();
			$obj14->hydrate($rs, $startcol14);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj14 = $temp_obj1->getCatusoesp(); 				if ($temp_obj14->getPrimaryKey() === $obj14->getPrimaryKey()) {
					$newObject = false;
					$temp_obj14->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj14->initCatreginms();
				$obj14->addCatreginm($obj1);
			}

			$omClass = CatconsocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj15  = new $cls();
			$obj15->hydrate($rs, $startcol15);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj15 = $temp_obj1->getCatconsoc(); 				if ($temp_obj15->getPrimaryKey() === $obj15->getPrimaryKey()) {
					$newObject = false;
					$temp_obj15->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj15->initCatreginms();
				$obj15->addCatreginm($obj1);
			}

			$omClass = CatrutPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj16  = new $cls();
			$obj16->hydrate($rs, $startcol16);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj16 = $temp_obj1->getCatrut(); 				if ($temp_obj16->getPrimaryKey() === $obj16->getPrimaryKey()) {
					$newObject = false;
					$temp_obj16->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj16->initCatreginms();
				$obj16->addCatreginm($obj1);
			}

			$omClass = CatcarterinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj17  = new $cls();
			$obj17->hydrate($rs, $startcol17);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj17 = $temp_obj1->getCatcarterinm(); 				if ($temp_obj17->getPrimaryKey() === $obj17->getPrimaryKey()) {
					$newObject = false;
					$temp_obj17->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj17->initCatreginms();
				$obj17->addCatreginm($obj1);
			}

			$omClass = CatproterPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj18  = new $cls();
			$obj18->hydrate($rs, $startcol18);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj18 = $temp_obj1->getCatproter(); 				if ($temp_obj18->getPrimaryKey() === $obj18->getPrimaryKey()) {
					$newObject = false;
					$temp_obj18->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj18->initCatreginms();
				$obj18->addCatreginm($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCattramoRelatedByCattramolat2Id(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol2 = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatsubprcPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatsubprcPeer::NUM_COLUMNS;

		CatprcPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatprcPeer::NUM_COLUMNS;

		CatmanPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatmanPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CatmunPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CatciuPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + CatestPeer::NUM_COLUMNS;

		CatbarurbPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + CatbarurbPeer::NUM_COLUMNS;

		CatcodposPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + CatcodposPeer::NUM_COLUMNS;

		CattipvivPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + CattipvivPeer::NUM_COLUMNS;

		CatconinmPeer::addSelectColumns($c);
		$startcol14 = $startcol13 + CatconinmPeer::NUM_COLUMNS;

		CatusoespPeer::addSelectColumns($c);
		$startcol15 = $startcol14 + CatusoespPeer::NUM_COLUMNS;

		CatconsocPeer::addSelectColumns($c);
		$startcol16 = $startcol15 + CatconsocPeer::NUM_COLUMNS;

		CatrutPeer::addSelectColumns($c);
		$startcol17 = $startcol16 + CatrutPeer::NUM_COLUMNS;

		CatcarterinmPeer::addSelectColumns($c);
		$startcol18 = $startcol17 + CatcarterinmPeer::NUM_COLUMNS;

		CatproterPeer::addSelectColumns($c);
		$startcol19 = $startcol18 + CatproterPeer::NUM_COLUMNS;

		$c->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$c->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$c->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$c->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$c->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$c->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$c->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatsubprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatsubprc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1);
			}

			$omClass = CatprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatprc(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatreginms();
				$obj3->addCatreginm($obj1);
			}

			$omClass = CatmanPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatman(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatreginms();
				$obj4->addCatreginm($obj1);
			}

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatsec(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatreginms();
				$obj5->addCatreginm($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatpar(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatreginms();
				$obj6->addCatreginm($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCatmun(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatreginms();
				$obj7->addCatreginm($obj1);
			}

			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCatciu(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initCatreginms();
				$obj8->addCatreginm($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getCatest(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initCatreginms();
				$obj9->addCatreginm($obj1);
			}

			$omClass = CatbarurbPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getCatbarurb(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initCatreginms();
				$obj10->addCatreginm($obj1);
			}

			$omClass = CatcodposPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11  = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getCatcodpos(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj11->initCatreginms();
				$obj11->addCatreginm($obj1);
			}

			$omClass = CattipvivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj12  = new $cls();
			$obj12->hydrate($rs, $startcol12);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj12 = $temp_obj1->getCattipviv(); 				if ($temp_obj12->getPrimaryKey() === $obj12->getPrimaryKey()) {
					$newObject = false;
					$temp_obj12->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj12->initCatreginms();
				$obj12->addCatreginm($obj1);
			}

			$omClass = CatconinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj13  = new $cls();
			$obj13->hydrate($rs, $startcol13);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj13 = $temp_obj1->getCatconinm(); 				if ($temp_obj13->getPrimaryKey() === $obj13->getPrimaryKey()) {
					$newObject = false;
					$temp_obj13->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj13->initCatreginms();
				$obj13->addCatreginm($obj1);
			}

			$omClass = CatusoespPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj14  = new $cls();
			$obj14->hydrate($rs, $startcol14);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj14 = $temp_obj1->getCatusoesp(); 				if ($temp_obj14->getPrimaryKey() === $obj14->getPrimaryKey()) {
					$newObject = false;
					$temp_obj14->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj14->initCatreginms();
				$obj14->addCatreginm($obj1);
			}

			$omClass = CatconsocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj15  = new $cls();
			$obj15->hydrate($rs, $startcol15);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj15 = $temp_obj1->getCatconsoc(); 				if ($temp_obj15->getPrimaryKey() === $obj15->getPrimaryKey()) {
					$newObject = false;
					$temp_obj15->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj15->initCatreginms();
				$obj15->addCatreginm($obj1);
			}

			$omClass = CatrutPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj16  = new $cls();
			$obj16->hydrate($rs, $startcol16);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj16 = $temp_obj1->getCatrut(); 				if ($temp_obj16->getPrimaryKey() === $obj16->getPrimaryKey()) {
					$newObject = false;
					$temp_obj16->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj16->initCatreginms();
				$obj16->addCatreginm($obj1);
			}

			$omClass = CatcarterinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj17  = new $cls();
			$obj17->hydrate($rs, $startcol17);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj17 = $temp_obj1->getCatcarterinm(); 				if ($temp_obj17->getPrimaryKey() === $obj17->getPrimaryKey()) {
					$newObject = false;
					$temp_obj17->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj17->initCatreginms();
				$obj17->addCatreginm($obj1);
			}

			$omClass = CatproterPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj18  = new $cls();
			$obj18->hydrate($rs, $startcol18);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj18 = $temp_obj1->getCatproter(); 				if ($temp_obj18->getPrimaryKey() === $obj18->getPrimaryKey()) {
					$newObject = false;
					$temp_obj18->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj18->initCatreginms();
				$obj18->addCatreginm($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCatcodpos(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol2 = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatsubprcPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatsubprcPeer::NUM_COLUMNS;

		CatprcPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatprcPeer::NUM_COLUMNS;

		CatmanPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatmanPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CatmunPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CatciuPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + CatestPeer::NUM_COLUMNS;

		CatbarurbPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + CatbarurbPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol14 = $startcol13 + CattramoPeer::NUM_COLUMNS;

		CattipvivPeer::addSelectColumns($c);
		$startcol15 = $startcol14 + CattipvivPeer::NUM_COLUMNS;

		CatconinmPeer::addSelectColumns($c);
		$startcol16 = $startcol15 + CatconinmPeer::NUM_COLUMNS;

		CatusoespPeer::addSelectColumns($c);
		$startcol17 = $startcol16 + CatusoespPeer::NUM_COLUMNS;

		CatconsocPeer::addSelectColumns($c);
		$startcol18 = $startcol17 + CatconsocPeer::NUM_COLUMNS;

		CatrutPeer::addSelectColumns($c);
		$startcol19 = $startcol18 + CatrutPeer::NUM_COLUMNS;

		CatcarterinmPeer::addSelectColumns($c);
		$startcol20 = $startcol19 + CatcarterinmPeer::NUM_COLUMNS;

		CatproterPeer::addSelectColumns($c);
		$startcol21 = $startcol20 + CatproterPeer::NUM_COLUMNS;

		$c->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$c->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$c->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$c->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$c->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatsubprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatsubprc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1);
			}

			$omClass = CatprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatprc(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatreginms();
				$obj3->addCatreginm($obj1);
			}

			$omClass = CatmanPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatman(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatreginms();
				$obj4->addCatreginm($obj1);
			}

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatsec(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatreginms();
				$obj5->addCatreginm($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatpar(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatreginms();
				$obj6->addCatreginm($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCatmun(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatreginms();
				$obj7->addCatreginm($obj1);
			}

			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCatciu(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initCatreginms();
				$obj8->addCatreginm($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getCatest(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initCatreginms();
				$obj9->addCatreginm($obj1);
			}

			$omClass = CatbarurbPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getCatbarurb(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initCatreginms();
				$obj10->addCatreginm($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11  = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getCattramoRelatedByCattramofroId(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addCatreginmRelatedByCattramofroId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj11->initCatreginmsRelatedByCattramofroId();
				$obj11->addCatreginmRelatedByCattramofroId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj12  = new $cls();
			$obj12->hydrate($rs, $startcol12);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj12 = $temp_obj1->getCattramoRelatedByCattramolatId(); 				if ($temp_obj12->getPrimaryKey() === $obj12->getPrimaryKey()) {
					$newObject = false;
					$temp_obj12->addCatreginmRelatedByCattramolatId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj12->initCatreginmsRelatedByCattramolatId();
				$obj12->addCatreginmRelatedByCattramolatId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj13  = new $cls();
			$obj13->hydrate($rs, $startcol13);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj13 = $temp_obj1->getCattramoRelatedByCattramolat2Id(); 				if ($temp_obj13->getPrimaryKey() === $obj13->getPrimaryKey()) {
					$newObject = false;
					$temp_obj13->addCatreginmRelatedByCattramolat2Id($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj13->initCatreginmsRelatedByCattramolat2Id();
				$obj13->addCatreginmRelatedByCattramolat2Id($obj1);
			}

			$omClass = CattipvivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj14  = new $cls();
			$obj14->hydrate($rs, $startcol14);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj14 = $temp_obj1->getCattipviv(); 				if ($temp_obj14->getPrimaryKey() === $obj14->getPrimaryKey()) {
					$newObject = false;
					$temp_obj14->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj14->initCatreginms();
				$obj14->addCatreginm($obj1);
			}

			$omClass = CatconinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj15  = new $cls();
			$obj15->hydrate($rs, $startcol15);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj15 = $temp_obj1->getCatconinm(); 				if ($temp_obj15->getPrimaryKey() === $obj15->getPrimaryKey()) {
					$newObject = false;
					$temp_obj15->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj15->initCatreginms();
				$obj15->addCatreginm($obj1);
			}

			$omClass = CatusoespPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj16  = new $cls();
			$obj16->hydrate($rs, $startcol16);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj16 = $temp_obj1->getCatusoesp(); 				if ($temp_obj16->getPrimaryKey() === $obj16->getPrimaryKey()) {
					$newObject = false;
					$temp_obj16->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj16->initCatreginms();
				$obj16->addCatreginm($obj1);
			}

			$omClass = CatconsocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj17  = new $cls();
			$obj17->hydrate($rs, $startcol17);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj17 = $temp_obj1->getCatconsoc(); 				if ($temp_obj17->getPrimaryKey() === $obj17->getPrimaryKey()) {
					$newObject = false;
					$temp_obj17->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj17->initCatreginms();
				$obj17->addCatreginm($obj1);
			}

			$omClass = CatrutPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj18  = new $cls();
			$obj18->hydrate($rs, $startcol18);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj18 = $temp_obj1->getCatrut(); 				if ($temp_obj18->getPrimaryKey() === $obj18->getPrimaryKey()) {
					$newObject = false;
					$temp_obj18->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj18->initCatreginms();
				$obj18->addCatreginm($obj1);
			}

			$omClass = CatcarterinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj19  = new $cls();
			$obj19->hydrate($rs, $startcol19);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj19 = $temp_obj1->getCatcarterinm(); 				if ($temp_obj19->getPrimaryKey() === $obj19->getPrimaryKey()) {
					$newObject = false;
					$temp_obj19->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj19->initCatreginms();
				$obj19->addCatreginm($obj1);
			}

			$omClass = CatproterPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj20  = new $cls();
			$obj20->hydrate($rs, $startcol20);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj20 = $temp_obj1->getCatproter(); 				if ($temp_obj20->getPrimaryKey() === $obj20->getPrimaryKey()) {
					$newObject = false;
					$temp_obj20->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj20->initCatreginms();
				$obj20->addCatreginm($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCattipviv(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol2 = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatsubprcPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatsubprcPeer::NUM_COLUMNS;

		CatprcPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatprcPeer::NUM_COLUMNS;

		CatmanPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatmanPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CatmunPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CatciuPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + CatestPeer::NUM_COLUMNS;

		CatbarurbPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + CatbarurbPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol14 = $startcol13 + CattramoPeer::NUM_COLUMNS;

		CatcodposPeer::addSelectColumns($c);
		$startcol15 = $startcol14 + CatcodposPeer::NUM_COLUMNS;

		CatconinmPeer::addSelectColumns($c);
		$startcol16 = $startcol15 + CatconinmPeer::NUM_COLUMNS;

		CatusoespPeer::addSelectColumns($c);
		$startcol17 = $startcol16 + CatusoespPeer::NUM_COLUMNS;

		CatconsocPeer::addSelectColumns($c);
		$startcol18 = $startcol17 + CatconsocPeer::NUM_COLUMNS;

		CatrutPeer::addSelectColumns($c);
		$startcol19 = $startcol18 + CatrutPeer::NUM_COLUMNS;

		CatcarterinmPeer::addSelectColumns($c);
		$startcol20 = $startcol19 + CatcarterinmPeer::NUM_COLUMNS;

		CatproterPeer::addSelectColumns($c);
		$startcol21 = $startcol20 + CatproterPeer::NUM_COLUMNS;

		$c->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$c->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$c->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$c->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$c->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatsubprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatsubprc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1);
			}

			$omClass = CatprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatprc(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatreginms();
				$obj3->addCatreginm($obj1);
			}

			$omClass = CatmanPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatman(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatreginms();
				$obj4->addCatreginm($obj1);
			}

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatsec(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatreginms();
				$obj5->addCatreginm($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatpar(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatreginms();
				$obj6->addCatreginm($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCatmun(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatreginms();
				$obj7->addCatreginm($obj1);
			}

			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCatciu(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initCatreginms();
				$obj8->addCatreginm($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getCatest(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initCatreginms();
				$obj9->addCatreginm($obj1);
			}

			$omClass = CatbarurbPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getCatbarurb(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initCatreginms();
				$obj10->addCatreginm($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11  = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getCattramoRelatedByCattramofroId(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addCatreginmRelatedByCattramofroId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj11->initCatreginmsRelatedByCattramofroId();
				$obj11->addCatreginmRelatedByCattramofroId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj12  = new $cls();
			$obj12->hydrate($rs, $startcol12);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj12 = $temp_obj1->getCattramoRelatedByCattramolatId(); 				if ($temp_obj12->getPrimaryKey() === $obj12->getPrimaryKey()) {
					$newObject = false;
					$temp_obj12->addCatreginmRelatedByCattramolatId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj12->initCatreginmsRelatedByCattramolatId();
				$obj12->addCatreginmRelatedByCattramolatId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj13  = new $cls();
			$obj13->hydrate($rs, $startcol13);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj13 = $temp_obj1->getCattramoRelatedByCattramolat2Id(); 				if ($temp_obj13->getPrimaryKey() === $obj13->getPrimaryKey()) {
					$newObject = false;
					$temp_obj13->addCatreginmRelatedByCattramolat2Id($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj13->initCatreginmsRelatedByCattramolat2Id();
				$obj13->addCatreginmRelatedByCattramolat2Id($obj1);
			}

			$omClass = CatcodposPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj14  = new $cls();
			$obj14->hydrate($rs, $startcol14);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj14 = $temp_obj1->getCatcodpos(); 				if ($temp_obj14->getPrimaryKey() === $obj14->getPrimaryKey()) {
					$newObject = false;
					$temp_obj14->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj14->initCatreginms();
				$obj14->addCatreginm($obj1);
			}

			$omClass = CatconinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj15  = new $cls();
			$obj15->hydrate($rs, $startcol15);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj15 = $temp_obj1->getCatconinm(); 				if ($temp_obj15->getPrimaryKey() === $obj15->getPrimaryKey()) {
					$newObject = false;
					$temp_obj15->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj15->initCatreginms();
				$obj15->addCatreginm($obj1);
			}

			$omClass = CatusoespPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj16  = new $cls();
			$obj16->hydrate($rs, $startcol16);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj16 = $temp_obj1->getCatusoesp(); 				if ($temp_obj16->getPrimaryKey() === $obj16->getPrimaryKey()) {
					$newObject = false;
					$temp_obj16->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj16->initCatreginms();
				$obj16->addCatreginm($obj1);
			}

			$omClass = CatconsocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj17  = new $cls();
			$obj17->hydrate($rs, $startcol17);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj17 = $temp_obj1->getCatconsoc(); 				if ($temp_obj17->getPrimaryKey() === $obj17->getPrimaryKey()) {
					$newObject = false;
					$temp_obj17->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj17->initCatreginms();
				$obj17->addCatreginm($obj1);
			}

			$omClass = CatrutPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj18  = new $cls();
			$obj18->hydrate($rs, $startcol18);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj18 = $temp_obj1->getCatrut(); 				if ($temp_obj18->getPrimaryKey() === $obj18->getPrimaryKey()) {
					$newObject = false;
					$temp_obj18->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj18->initCatreginms();
				$obj18->addCatreginm($obj1);
			}

			$omClass = CatcarterinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj19  = new $cls();
			$obj19->hydrate($rs, $startcol19);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj19 = $temp_obj1->getCatcarterinm(); 				if ($temp_obj19->getPrimaryKey() === $obj19->getPrimaryKey()) {
					$newObject = false;
					$temp_obj19->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj19->initCatreginms();
				$obj19->addCatreginm($obj1);
			}

			$omClass = CatproterPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj20  = new $cls();
			$obj20->hydrate($rs, $startcol20);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj20 = $temp_obj1->getCatproter(); 				if ($temp_obj20->getPrimaryKey() === $obj20->getPrimaryKey()) {
					$newObject = false;
					$temp_obj20->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj20->initCatreginms();
				$obj20->addCatreginm($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCatconinm(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol2 = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatsubprcPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatsubprcPeer::NUM_COLUMNS;

		CatprcPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatprcPeer::NUM_COLUMNS;

		CatmanPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatmanPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CatmunPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CatciuPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + CatestPeer::NUM_COLUMNS;

		CatbarurbPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + CatbarurbPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol14 = $startcol13 + CattramoPeer::NUM_COLUMNS;

		CatcodposPeer::addSelectColumns($c);
		$startcol15 = $startcol14 + CatcodposPeer::NUM_COLUMNS;

		CattipvivPeer::addSelectColumns($c);
		$startcol16 = $startcol15 + CattipvivPeer::NUM_COLUMNS;

		CatusoespPeer::addSelectColumns($c);
		$startcol17 = $startcol16 + CatusoespPeer::NUM_COLUMNS;

		CatconsocPeer::addSelectColumns($c);
		$startcol18 = $startcol17 + CatconsocPeer::NUM_COLUMNS;

		CatrutPeer::addSelectColumns($c);
		$startcol19 = $startcol18 + CatrutPeer::NUM_COLUMNS;

		CatcarterinmPeer::addSelectColumns($c);
		$startcol20 = $startcol19 + CatcarterinmPeer::NUM_COLUMNS;

		CatproterPeer::addSelectColumns($c);
		$startcol21 = $startcol20 + CatproterPeer::NUM_COLUMNS;

		$c->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$c->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$c->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$c->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$c->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$c->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$c->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatsubprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatsubprc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1);
			}

			$omClass = CatprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatprc(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatreginms();
				$obj3->addCatreginm($obj1);
			}

			$omClass = CatmanPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatman(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatreginms();
				$obj4->addCatreginm($obj1);
			}

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatsec(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatreginms();
				$obj5->addCatreginm($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatpar(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatreginms();
				$obj6->addCatreginm($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCatmun(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatreginms();
				$obj7->addCatreginm($obj1);
			}

			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCatciu(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initCatreginms();
				$obj8->addCatreginm($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getCatest(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initCatreginms();
				$obj9->addCatreginm($obj1);
			}

			$omClass = CatbarurbPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getCatbarurb(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initCatreginms();
				$obj10->addCatreginm($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11  = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getCattramoRelatedByCattramofroId(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addCatreginmRelatedByCattramofroId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj11->initCatreginmsRelatedByCattramofroId();
				$obj11->addCatreginmRelatedByCattramofroId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj12  = new $cls();
			$obj12->hydrate($rs, $startcol12);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj12 = $temp_obj1->getCattramoRelatedByCattramolatId(); 				if ($temp_obj12->getPrimaryKey() === $obj12->getPrimaryKey()) {
					$newObject = false;
					$temp_obj12->addCatreginmRelatedByCattramolatId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj12->initCatreginmsRelatedByCattramolatId();
				$obj12->addCatreginmRelatedByCattramolatId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj13  = new $cls();
			$obj13->hydrate($rs, $startcol13);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj13 = $temp_obj1->getCattramoRelatedByCattramolat2Id(); 				if ($temp_obj13->getPrimaryKey() === $obj13->getPrimaryKey()) {
					$newObject = false;
					$temp_obj13->addCatreginmRelatedByCattramolat2Id($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj13->initCatreginmsRelatedByCattramolat2Id();
				$obj13->addCatreginmRelatedByCattramolat2Id($obj1);
			}

			$omClass = CatcodposPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj14  = new $cls();
			$obj14->hydrate($rs, $startcol14);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj14 = $temp_obj1->getCatcodpos(); 				if ($temp_obj14->getPrimaryKey() === $obj14->getPrimaryKey()) {
					$newObject = false;
					$temp_obj14->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj14->initCatreginms();
				$obj14->addCatreginm($obj1);
			}

			$omClass = CattipvivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj15  = new $cls();
			$obj15->hydrate($rs, $startcol15);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj15 = $temp_obj1->getCattipviv(); 				if ($temp_obj15->getPrimaryKey() === $obj15->getPrimaryKey()) {
					$newObject = false;
					$temp_obj15->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj15->initCatreginms();
				$obj15->addCatreginm($obj1);
			}

			$omClass = CatusoespPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj16  = new $cls();
			$obj16->hydrate($rs, $startcol16);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj16 = $temp_obj1->getCatusoesp(); 				if ($temp_obj16->getPrimaryKey() === $obj16->getPrimaryKey()) {
					$newObject = false;
					$temp_obj16->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj16->initCatreginms();
				$obj16->addCatreginm($obj1);
			}

			$omClass = CatconsocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj17  = new $cls();
			$obj17->hydrate($rs, $startcol17);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj17 = $temp_obj1->getCatconsoc(); 				if ($temp_obj17->getPrimaryKey() === $obj17->getPrimaryKey()) {
					$newObject = false;
					$temp_obj17->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj17->initCatreginms();
				$obj17->addCatreginm($obj1);
			}

			$omClass = CatrutPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj18  = new $cls();
			$obj18->hydrate($rs, $startcol18);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj18 = $temp_obj1->getCatrut(); 				if ($temp_obj18->getPrimaryKey() === $obj18->getPrimaryKey()) {
					$newObject = false;
					$temp_obj18->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj18->initCatreginms();
				$obj18->addCatreginm($obj1);
			}

			$omClass = CatcarterinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj19  = new $cls();
			$obj19->hydrate($rs, $startcol19);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj19 = $temp_obj1->getCatcarterinm(); 				if ($temp_obj19->getPrimaryKey() === $obj19->getPrimaryKey()) {
					$newObject = false;
					$temp_obj19->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj19->initCatreginms();
				$obj19->addCatreginm($obj1);
			}

			$omClass = CatproterPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj20  = new $cls();
			$obj20->hydrate($rs, $startcol20);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj20 = $temp_obj1->getCatproter(); 				if ($temp_obj20->getPrimaryKey() === $obj20->getPrimaryKey()) {
					$newObject = false;
					$temp_obj20->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj20->initCatreginms();
				$obj20->addCatreginm($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCatusoesp(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol2 = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatsubprcPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatsubprcPeer::NUM_COLUMNS;

		CatprcPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatprcPeer::NUM_COLUMNS;

		CatmanPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatmanPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CatmunPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CatciuPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + CatestPeer::NUM_COLUMNS;

		CatbarurbPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + CatbarurbPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol14 = $startcol13 + CattramoPeer::NUM_COLUMNS;

		CatcodposPeer::addSelectColumns($c);
		$startcol15 = $startcol14 + CatcodposPeer::NUM_COLUMNS;

		CattipvivPeer::addSelectColumns($c);
		$startcol16 = $startcol15 + CattipvivPeer::NUM_COLUMNS;

		CatconinmPeer::addSelectColumns($c);
		$startcol17 = $startcol16 + CatconinmPeer::NUM_COLUMNS;

		CatconsocPeer::addSelectColumns($c);
		$startcol18 = $startcol17 + CatconsocPeer::NUM_COLUMNS;

		CatrutPeer::addSelectColumns($c);
		$startcol19 = $startcol18 + CatrutPeer::NUM_COLUMNS;

		CatcarterinmPeer::addSelectColumns($c);
		$startcol20 = $startcol19 + CatcarterinmPeer::NUM_COLUMNS;

		CatproterPeer::addSelectColumns($c);
		$startcol21 = $startcol20 + CatproterPeer::NUM_COLUMNS;

		$c->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$c->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$c->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$c->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$c->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$c->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatsubprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatsubprc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1);
			}

			$omClass = CatprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatprc(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatreginms();
				$obj3->addCatreginm($obj1);
			}

			$omClass = CatmanPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatman(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatreginms();
				$obj4->addCatreginm($obj1);
			}

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatsec(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatreginms();
				$obj5->addCatreginm($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatpar(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatreginms();
				$obj6->addCatreginm($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCatmun(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatreginms();
				$obj7->addCatreginm($obj1);
			}

			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCatciu(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initCatreginms();
				$obj8->addCatreginm($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getCatest(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initCatreginms();
				$obj9->addCatreginm($obj1);
			}

			$omClass = CatbarurbPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getCatbarurb(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initCatreginms();
				$obj10->addCatreginm($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11  = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getCattramoRelatedByCattramofroId(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addCatreginmRelatedByCattramofroId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj11->initCatreginmsRelatedByCattramofroId();
				$obj11->addCatreginmRelatedByCattramofroId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj12  = new $cls();
			$obj12->hydrate($rs, $startcol12);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj12 = $temp_obj1->getCattramoRelatedByCattramolatId(); 				if ($temp_obj12->getPrimaryKey() === $obj12->getPrimaryKey()) {
					$newObject = false;
					$temp_obj12->addCatreginmRelatedByCattramolatId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj12->initCatreginmsRelatedByCattramolatId();
				$obj12->addCatreginmRelatedByCattramolatId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj13  = new $cls();
			$obj13->hydrate($rs, $startcol13);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj13 = $temp_obj1->getCattramoRelatedByCattramolat2Id(); 				if ($temp_obj13->getPrimaryKey() === $obj13->getPrimaryKey()) {
					$newObject = false;
					$temp_obj13->addCatreginmRelatedByCattramolat2Id($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj13->initCatreginmsRelatedByCattramolat2Id();
				$obj13->addCatreginmRelatedByCattramolat2Id($obj1);
			}

			$omClass = CatcodposPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj14  = new $cls();
			$obj14->hydrate($rs, $startcol14);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj14 = $temp_obj1->getCatcodpos(); 				if ($temp_obj14->getPrimaryKey() === $obj14->getPrimaryKey()) {
					$newObject = false;
					$temp_obj14->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj14->initCatreginms();
				$obj14->addCatreginm($obj1);
			}

			$omClass = CattipvivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj15  = new $cls();
			$obj15->hydrate($rs, $startcol15);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj15 = $temp_obj1->getCattipviv(); 				if ($temp_obj15->getPrimaryKey() === $obj15->getPrimaryKey()) {
					$newObject = false;
					$temp_obj15->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj15->initCatreginms();
				$obj15->addCatreginm($obj1);
			}

			$omClass = CatconinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj16  = new $cls();
			$obj16->hydrate($rs, $startcol16);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj16 = $temp_obj1->getCatconinm(); 				if ($temp_obj16->getPrimaryKey() === $obj16->getPrimaryKey()) {
					$newObject = false;
					$temp_obj16->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj16->initCatreginms();
				$obj16->addCatreginm($obj1);
			}

			$omClass = CatconsocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj17  = new $cls();
			$obj17->hydrate($rs, $startcol17);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj17 = $temp_obj1->getCatconsoc(); 				if ($temp_obj17->getPrimaryKey() === $obj17->getPrimaryKey()) {
					$newObject = false;
					$temp_obj17->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj17->initCatreginms();
				$obj17->addCatreginm($obj1);
			}

			$omClass = CatrutPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj18  = new $cls();
			$obj18->hydrate($rs, $startcol18);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj18 = $temp_obj1->getCatrut(); 				if ($temp_obj18->getPrimaryKey() === $obj18->getPrimaryKey()) {
					$newObject = false;
					$temp_obj18->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj18->initCatreginms();
				$obj18->addCatreginm($obj1);
			}

			$omClass = CatcarterinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj19  = new $cls();
			$obj19->hydrate($rs, $startcol19);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj19 = $temp_obj1->getCatcarterinm(); 				if ($temp_obj19->getPrimaryKey() === $obj19->getPrimaryKey()) {
					$newObject = false;
					$temp_obj19->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj19->initCatreginms();
				$obj19->addCatreginm($obj1);
			}

			$omClass = CatproterPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj20  = new $cls();
			$obj20->hydrate($rs, $startcol20);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj20 = $temp_obj1->getCatproter(); 				if ($temp_obj20->getPrimaryKey() === $obj20->getPrimaryKey()) {
					$newObject = false;
					$temp_obj20->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj20->initCatreginms();
				$obj20->addCatreginm($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCatconsoc(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol2 = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatsubprcPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatsubprcPeer::NUM_COLUMNS;

		CatprcPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatprcPeer::NUM_COLUMNS;

		CatmanPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatmanPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CatmunPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CatciuPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + CatestPeer::NUM_COLUMNS;

		CatbarurbPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + CatbarurbPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol14 = $startcol13 + CattramoPeer::NUM_COLUMNS;

		CatcodposPeer::addSelectColumns($c);
		$startcol15 = $startcol14 + CatcodposPeer::NUM_COLUMNS;

		CattipvivPeer::addSelectColumns($c);
		$startcol16 = $startcol15 + CattipvivPeer::NUM_COLUMNS;

		CatconinmPeer::addSelectColumns($c);
		$startcol17 = $startcol16 + CatconinmPeer::NUM_COLUMNS;

		CatusoespPeer::addSelectColumns($c);
		$startcol18 = $startcol17 + CatusoespPeer::NUM_COLUMNS;

		CatrutPeer::addSelectColumns($c);
		$startcol19 = $startcol18 + CatrutPeer::NUM_COLUMNS;

		CatcarterinmPeer::addSelectColumns($c);
		$startcol20 = $startcol19 + CatcarterinmPeer::NUM_COLUMNS;

		CatproterPeer::addSelectColumns($c);
		$startcol21 = $startcol20 + CatproterPeer::NUM_COLUMNS;

		$c->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$c->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$c->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$c->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$c->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$c->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatsubprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatsubprc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1);
			}

			$omClass = CatprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatprc(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatreginms();
				$obj3->addCatreginm($obj1);
			}

			$omClass = CatmanPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatman(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatreginms();
				$obj4->addCatreginm($obj1);
			}

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatsec(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatreginms();
				$obj5->addCatreginm($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatpar(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatreginms();
				$obj6->addCatreginm($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCatmun(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatreginms();
				$obj7->addCatreginm($obj1);
			}

			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCatciu(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initCatreginms();
				$obj8->addCatreginm($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getCatest(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initCatreginms();
				$obj9->addCatreginm($obj1);
			}

			$omClass = CatbarurbPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getCatbarurb(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initCatreginms();
				$obj10->addCatreginm($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11  = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getCattramoRelatedByCattramofroId(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addCatreginmRelatedByCattramofroId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj11->initCatreginmsRelatedByCattramofroId();
				$obj11->addCatreginmRelatedByCattramofroId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj12  = new $cls();
			$obj12->hydrate($rs, $startcol12);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj12 = $temp_obj1->getCattramoRelatedByCattramolatId(); 				if ($temp_obj12->getPrimaryKey() === $obj12->getPrimaryKey()) {
					$newObject = false;
					$temp_obj12->addCatreginmRelatedByCattramolatId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj12->initCatreginmsRelatedByCattramolatId();
				$obj12->addCatreginmRelatedByCattramolatId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj13  = new $cls();
			$obj13->hydrate($rs, $startcol13);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj13 = $temp_obj1->getCattramoRelatedByCattramolat2Id(); 				if ($temp_obj13->getPrimaryKey() === $obj13->getPrimaryKey()) {
					$newObject = false;
					$temp_obj13->addCatreginmRelatedByCattramolat2Id($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj13->initCatreginmsRelatedByCattramolat2Id();
				$obj13->addCatreginmRelatedByCattramolat2Id($obj1);
			}

			$omClass = CatcodposPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj14  = new $cls();
			$obj14->hydrate($rs, $startcol14);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj14 = $temp_obj1->getCatcodpos(); 				if ($temp_obj14->getPrimaryKey() === $obj14->getPrimaryKey()) {
					$newObject = false;
					$temp_obj14->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj14->initCatreginms();
				$obj14->addCatreginm($obj1);
			}

			$omClass = CattipvivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj15  = new $cls();
			$obj15->hydrate($rs, $startcol15);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj15 = $temp_obj1->getCattipviv(); 				if ($temp_obj15->getPrimaryKey() === $obj15->getPrimaryKey()) {
					$newObject = false;
					$temp_obj15->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj15->initCatreginms();
				$obj15->addCatreginm($obj1);
			}

			$omClass = CatconinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj16  = new $cls();
			$obj16->hydrate($rs, $startcol16);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj16 = $temp_obj1->getCatconinm(); 				if ($temp_obj16->getPrimaryKey() === $obj16->getPrimaryKey()) {
					$newObject = false;
					$temp_obj16->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj16->initCatreginms();
				$obj16->addCatreginm($obj1);
			}

			$omClass = CatusoespPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj17  = new $cls();
			$obj17->hydrate($rs, $startcol17);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj17 = $temp_obj1->getCatusoesp(); 				if ($temp_obj17->getPrimaryKey() === $obj17->getPrimaryKey()) {
					$newObject = false;
					$temp_obj17->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj17->initCatreginms();
				$obj17->addCatreginm($obj1);
			}

			$omClass = CatrutPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj18  = new $cls();
			$obj18->hydrate($rs, $startcol18);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj18 = $temp_obj1->getCatrut(); 				if ($temp_obj18->getPrimaryKey() === $obj18->getPrimaryKey()) {
					$newObject = false;
					$temp_obj18->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj18->initCatreginms();
				$obj18->addCatreginm($obj1);
			}

			$omClass = CatcarterinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj19  = new $cls();
			$obj19->hydrate($rs, $startcol19);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj19 = $temp_obj1->getCatcarterinm(); 				if ($temp_obj19->getPrimaryKey() === $obj19->getPrimaryKey()) {
					$newObject = false;
					$temp_obj19->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj19->initCatreginms();
				$obj19->addCatreginm($obj1);
			}

			$omClass = CatproterPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj20  = new $cls();
			$obj20->hydrate($rs, $startcol20);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj20 = $temp_obj1->getCatproter(); 				if ($temp_obj20->getPrimaryKey() === $obj20->getPrimaryKey()) {
					$newObject = false;
					$temp_obj20->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj20->initCatreginms();
				$obj20->addCatreginm($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCatrut(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol2 = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatsubprcPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatsubprcPeer::NUM_COLUMNS;

		CatprcPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatprcPeer::NUM_COLUMNS;

		CatmanPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatmanPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CatmunPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CatciuPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + CatestPeer::NUM_COLUMNS;

		CatbarurbPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + CatbarurbPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol14 = $startcol13 + CattramoPeer::NUM_COLUMNS;

		CatcodposPeer::addSelectColumns($c);
		$startcol15 = $startcol14 + CatcodposPeer::NUM_COLUMNS;

		CattipvivPeer::addSelectColumns($c);
		$startcol16 = $startcol15 + CattipvivPeer::NUM_COLUMNS;

		CatconinmPeer::addSelectColumns($c);
		$startcol17 = $startcol16 + CatconinmPeer::NUM_COLUMNS;

		CatusoespPeer::addSelectColumns($c);
		$startcol18 = $startcol17 + CatusoespPeer::NUM_COLUMNS;

		CatconsocPeer::addSelectColumns($c);
		$startcol19 = $startcol18 + CatconsocPeer::NUM_COLUMNS;

		CatcarterinmPeer::addSelectColumns($c);
		$startcol20 = $startcol19 + CatcarterinmPeer::NUM_COLUMNS;

		CatproterPeer::addSelectColumns($c);
		$startcol21 = $startcol20 + CatproterPeer::NUM_COLUMNS;

		$c->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$c->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$c->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$c->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$c->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatsubprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatsubprc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1);
			}

			$omClass = CatprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatprc(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatreginms();
				$obj3->addCatreginm($obj1);
			}

			$omClass = CatmanPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatman(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatreginms();
				$obj4->addCatreginm($obj1);
			}

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatsec(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatreginms();
				$obj5->addCatreginm($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatpar(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatreginms();
				$obj6->addCatreginm($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCatmun(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatreginms();
				$obj7->addCatreginm($obj1);
			}

			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCatciu(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initCatreginms();
				$obj8->addCatreginm($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getCatest(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initCatreginms();
				$obj9->addCatreginm($obj1);
			}

			$omClass = CatbarurbPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getCatbarurb(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initCatreginms();
				$obj10->addCatreginm($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11  = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getCattramoRelatedByCattramofroId(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addCatreginmRelatedByCattramofroId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj11->initCatreginmsRelatedByCattramofroId();
				$obj11->addCatreginmRelatedByCattramofroId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj12  = new $cls();
			$obj12->hydrate($rs, $startcol12);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj12 = $temp_obj1->getCattramoRelatedByCattramolatId(); 				if ($temp_obj12->getPrimaryKey() === $obj12->getPrimaryKey()) {
					$newObject = false;
					$temp_obj12->addCatreginmRelatedByCattramolatId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj12->initCatreginmsRelatedByCattramolatId();
				$obj12->addCatreginmRelatedByCattramolatId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj13  = new $cls();
			$obj13->hydrate($rs, $startcol13);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj13 = $temp_obj1->getCattramoRelatedByCattramolat2Id(); 				if ($temp_obj13->getPrimaryKey() === $obj13->getPrimaryKey()) {
					$newObject = false;
					$temp_obj13->addCatreginmRelatedByCattramolat2Id($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj13->initCatreginmsRelatedByCattramolat2Id();
				$obj13->addCatreginmRelatedByCattramolat2Id($obj1);
			}

			$omClass = CatcodposPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj14  = new $cls();
			$obj14->hydrate($rs, $startcol14);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj14 = $temp_obj1->getCatcodpos(); 				if ($temp_obj14->getPrimaryKey() === $obj14->getPrimaryKey()) {
					$newObject = false;
					$temp_obj14->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj14->initCatreginms();
				$obj14->addCatreginm($obj1);
			}

			$omClass = CattipvivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj15  = new $cls();
			$obj15->hydrate($rs, $startcol15);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj15 = $temp_obj1->getCattipviv(); 				if ($temp_obj15->getPrimaryKey() === $obj15->getPrimaryKey()) {
					$newObject = false;
					$temp_obj15->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj15->initCatreginms();
				$obj15->addCatreginm($obj1);
			}

			$omClass = CatconinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj16  = new $cls();
			$obj16->hydrate($rs, $startcol16);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj16 = $temp_obj1->getCatconinm(); 				if ($temp_obj16->getPrimaryKey() === $obj16->getPrimaryKey()) {
					$newObject = false;
					$temp_obj16->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj16->initCatreginms();
				$obj16->addCatreginm($obj1);
			}

			$omClass = CatusoespPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj17  = new $cls();
			$obj17->hydrate($rs, $startcol17);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj17 = $temp_obj1->getCatusoesp(); 				if ($temp_obj17->getPrimaryKey() === $obj17->getPrimaryKey()) {
					$newObject = false;
					$temp_obj17->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj17->initCatreginms();
				$obj17->addCatreginm($obj1);
			}

			$omClass = CatconsocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj18  = new $cls();
			$obj18->hydrate($rs, $startcol18);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj18 = $temp_obj1->getCatconsoc(); 				if ($temp_obj18->getPrimaryKey() === $obj18->getPrimaryKey()) {
					$newObject = false;
					$temp_obj18->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj18->initCatreginms();
				$obj18->addCatreginm($obj1);
			}

			$omClass = CatcarterinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj19  = new $cls();
			$obj19->hydrate($rs, $startcol19);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj19 = $temp_obj1->getCatcarterinm(); 				if ($temp_obj19->getPrimaryKey() === $obj19->getPrimaryKey()) {
					$newObject = false;
					$temp_obj19->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj19->initCatreginms();
				$obj19->addCatreginm($obj1);
			}

			$omClass = CatproterPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj20  = new $cls();
			$obj20->hydrate($rs, $startcol20);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj20 = $temp_obj1->getCatproter(); 				if ($temp_obj20->getPrimaryKey() === $obj20->getPrimaryKey()) {
					$newObject = false;
					$temp_obj20->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj20->initCatreginms();
				$obj20->addCatreginm($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCatcarterinm(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol2 = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatsubprcPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatsubprcPeer::NUM_COLUMNS;

		CatprcPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatprcPeer::NUM_COLUMNS;

		CatmanPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatmanPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CatmunPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CatciuPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + CatestPeer::NUM_COLUMNS;

		CatbarurbPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + CatbarurbPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol14 = $startcol13 + CattramoPeer::NUM_COLUMNS;

		CatcodposPeer::addSelectColumns($c);
		$startcol15 = $startcol14 + CatcodposPeer::NUM_COLUMNS;

		CattipvivPeer::addSelectColumns($c);
		$startcol16 = $startcol15 + CattipvivPeer::NUM_COLUMNS;

		CatconinmPeer::addSelectColumns($c);
		$startcol17 = $startcol16 + CatconinmPeer::NUM_COLUMNS;

		CatusoespPeer::addSelectColumns($c);
		$startcol18 = $startcol17 + CatusoespPeer::NUM_COLUMNS;

		CatconsocPeer::addSelectColumns($c);
		$startcol19 = $startcol18 + CatconsocPeer::NUM_COLUMNS;

		CatrutPeer::addSelectColumns($c);
		$startcol20 = $startcol19 + CatrutPeer::NUM_COLUMNS;

		CatproterPeer::addSelectColumns($c);
		$startcol21 = $startcol20 + CatproterPeer::NUM_COLUMNS;

		$c->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$c->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$c->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$c->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$c->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$c->addJoin(CatreginmPeer::CATPROTER_ID, CatproterPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatsubprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatsubprc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1);
			}

			$omClass = CatprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatprc(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatreginms();
				$obj3->addCatreginm($obj1);
			}

			$omClass = CatmanPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatman(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatreginms();
				$obj4->addCatreginm($obj1);
			}

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatsec(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatreginms();
				$obj5->addCatreginm($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatpar(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatreginms();
				$obj6->addCatreginm($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCatmun(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatreginms();
				$obj7->addCatreginm($obj1);
			}

			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCatciu(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initCatreginms();
				$obj8->addCatreginm($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getCatest(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initCatreginms();
				$obj9->addCatreginm($obj1);
			}

			$omClass = CatbarurbPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getCatbarurb(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initCatreginms();
				$obj10->addCatreginm($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11  = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getCattramoRelatedByCattramofroId(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addCatreginmRelatedByCattramofroId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj11->initCatreginmsRelatedByCattramofroId();
				$obj11->addCatreginmRelatedByCattramofroId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj12  = new $cls();
			$obj12->hydrate($rs, $startcol12);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj12 = $temp_obj1->getCattramoRelatedByCattramolatId(); 				if ($temp_obj12->getPrimaryKey() === $obj12->getPrimaryKey()) {
					$newObject = false;
					$temp_obj12->addCatreginmRelatedByCattramolatId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj12->initCatreginmsRelatedByCattramolatId();
				$obj12->addCatreginmRelatedByCattramolatId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj13  = new $cls();
			$obj13->hydrate($rs, $startcol13);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj13 = $temp_obj1->getCattramoRelatedByCattramolat2Id(); 				if ($temp_obj13->getPrimaryKey() === $obj13->getPrimaryKey()) {
					$newObject = false;
					$temp_obj13->addCatreginmRelatedByCattramolat2Id($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj13->initCatreginmsRelatedByCattramolat2Id();
				$obj13->addCatreginmRelatedByCattramolat2Id($obj1);
			}

			$omClass = CatcodposPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj14  = new $cls();
			$obj14->hydrate($rs, $startcol14);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj14 = $temp_obj1->getCatcodpos(); 				if ($temp_obj14->getPrimaryKey() === $obj14->getPrimaryKey()) {
					$newObject = false;
					$temp_obj14->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj14->initCatreginms();
				$obj14->addCatreginm($obj1);
			}

			$omClass = CattipvivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj15  = new $cls();
			$obj15->hydrate($rs, $startcol15);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj15 = $temp_obj1->getCattipviv(); 				if ($temp_obj15->getPrimaryKey() === $obj15->getPrimaryKey()) {
					$newObject = false;
					$temp_obj15->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj15->initCatreginms();
				$obj15->addCatreginm($obj1);
			}

			$omClass = CatconinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj16  = new $cls();
			$obj16->hydrate($rs, $startcol16);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj16 = $temp_obj1->getCatconinm(); 				if ($temp_obj16->getPrimaryKey() === $obj16->getPrimaryKey()) {
					$newObject = false;
					$temp_obj16->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj16->initCatreginms();
				$obj16->addCatreginm($obj1);
			}

			$omClass = CatusoespPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj17  = new $cls();
			$obj17->hydrate($rs, $startcol17);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj17 = $temp_obj1->getCatusoesp(); 				if ($temp_obj17->getPrimaryKey() === $obj17->getPrimaryKey()) {
					$newObject = false;
					$temp_obj17->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj17->initCatreginms();
				$obj17->addCatreginm($obj1);
			}

			$omClass = CatconsocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj18  = new $cls();
			$obj18->hydrate($rs, $startcol18);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj18 = $temp_obj1->getCatconsoc(); 				if ($temp_obj18->getPrimaryKey() === $obj18->getPrimaryKey()) {
					$newObject = false;
					$temp_obj18->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj18->initCatreginms();
				$obj18->addCatreginm($obj1);
			}

			$omClass = CatrutPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj19  = new $cls();
			$obj19->hydrate($rs, $startcol19);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj19 = $temp_obj1->getCatrut(); 				if ($temp_obj19->getPrimaryKey() === $obj19->getPrimaryKey()) {
					$newObject = false;
					$temp_obj19->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj19->initCatreginms();
				$obj19->addCatreginm($obj1);
			}

			$omClass = CatproterPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj20  = new $cls();
			$obj20->hydrate($rs, $startcol20);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj20 = $temp_obj1->getCatproter(); 				if ($temp_obj20->getPrimaryKey() === $obj20->getPrimaryKey()) {
					$newObject = false;
					$temp_obj20->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj20->initCatreginms();
				$obj20->addCatreginm($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCatproter(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatreginmPeer::addSelectColumns($c);
		$startcol2 = (CatreginmPeer::NUM_COLUMNS - CatreginmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatsubprcPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatsubprcPeer::NUM_COLUMNS;

		CatprcPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatprcPeer::NUM_COLUMNS;

		CatmanPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatmanPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CatmunPeer::NUM_COLUMNS;

		CatciuPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CatciuPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + CatestPeer::NUM_COLUMNS;

		CatbarurbPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + CatbarurbPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol14 = $startcol13 + CattramoPeer::NUM_COLUMNS;

		CatcodposPeer::addSelectColumns($c);
		$startcol15 = $startcol14 + CatcodposPeer::NUM_COLUMNS;

		CattipvivPeer::addSelectColumns($c);
		$startcol16 = $startcol15 + CattipvivPeer::NUM_COLUMNS;

		CatconinmPeer::addSelectColumns($c);
		$startcol17 = $startcol16 + CatconinmPeer::NUM_COLUMNS;

		CatusoespPeer::addSelectColumns($c);
		$startcol18 = $startcol17 + CatusoespPeer::NUM_COLUMNS;

		CatconsocPeer::addSelectColumns($c);
		$startcol19 = $startcol18 + CatconsocPeer::NUM_COLUMNS;

		CatrutPeer::addSelectColumns($c);
		$startcol20 = $startcol19 + CatrutPeer::NUM_COLUMNS;

		CatcarterinmPeer::addSelectColumns($c);
		$startcol21 = $startcol20 + CatcarterinmPeer::NUM_COLUMNS;

		$c->addJoin(CatreginmPeer::CATSUBPRC_ID, CatsubprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATPRC_ID, CatprcPeer::ID);

		$c->addJoin(CatreginmPeer::CATMAN_ID, CatmanPeer::ID);

		$c->addJoin(CatreginmPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatreginmPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatreginmPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatreginmPeer::CATCIU_ID, CatciuPeer::ID);

		$c->addJoin(CatreginmPeer::CATEST_ID, CatestPeer::ID);

		$c->addJoin(CatreginmPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$c->addJoin(CatreginmPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$c->addJoin(CatreginmPeer::CATTIPVIV_ID, CattipvivPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONINM_ID, CatconinmPeer::ID);

		$c->addJoin(CatreginmPeer::CATUSOESP_ID, CatusoespPeer::ID);

		$c->addJoin(CatreginmPeer::CATCONSOC_ID, CatconsocPeer::ID);

		$c->addJoin(CatreginmPeer::CATRUT_ID, CatrutPeer::ID);

		$c->addJoin(CatreginmPeer::CATCARTERINM_ID, CatcarterinmPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatreginmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatsubprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatsubprc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatreginms();
				$obj2->addCatreginm($obj1);
			}

			$omClass = CatprcPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatprc(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatreginms();
				$obj3->addCatreginm($obj1);
			}

			$omClass = CatmanPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatman(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatreginms();
				$obj4->addCatreginm($obj1);
			}

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatsec(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatreginms();
				$obj5->addCatreginm($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatpar(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatreginms();
				$obj6->addCatreginm($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCatmun(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatreginms();
				$obj7->addCatreginm($obj1);
			}

			$omClass = CatciuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCatciu(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initCatreginms();
				$obj8->addCatreginm($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getCatest(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initCatreginms();
				$obj9->addCatreginm($obj1);
			}

			$omClass = CatbarurbPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getCatbarurb(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initCatreginms();
				$obj10->addCatreginm($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11  = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getCattramoRelatedByCattramofroId(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addCatreginmRelatedByCattramofroId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj11->initCatreginmsRelatedByCattramofroId();
				$obj11->addCatreginmRelatedByCattramofroId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj12  = new $cls();
			$obj12->hydrate($rs, $startcol12);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj12 = $temp_obj1->getCattramoRelatedByCattramolatId(); 				if ($temp_obj12->getPrimaryKey() === $obj12->getPrimaryKey()) {
					$newObject = false;
					$temp_obj12->addCatreginmRelatedByCattramolatId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj12->initCatreginmsRelatedByCattramolatId();
				$obj12->addCatreginmRelatedByCattramolatId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj13  = new $cls();
			$obj13->hydrate($rs, $startcol13);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj13 = $temp_obj1->getCattramoRelatedByCattramolat2Id(); 				if ($temp_obj13->getPrimaryKey() === $obj13->getPrimaryKey()) {
					$newObject = false;
					$temp_obj13->addCatreginmRelatedByCattramolat2Id($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj13->initCatreginmsRelatedByCattramolat2Id();
				$obj13->addCatreginmRelatedByCattramolat2Id($obj1);
			}

			$omClass = CatcodposPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj14  = new $cls();
			$obj14->hydrate($rs, $startcol14);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj14 = $temp_obj1->getCatcodpos(); 				if ($temp_obj14->getPrimaryKey() === $obj14->getPrimaryKey()) {
					$newObject = false;
					$temp_obj14->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj14->initCatreginms();
				$obj14->addCatreginm($obj1);
			}

			$omClass = CattipvivPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj15  = new $cls();
			$obj15->hydrate($rs, $startcol15);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj15 = $temp_obj1->getCattipviv(); 				if ($temp_obj15->getPrimaryKey() === $obj15->getPrimaryKey()) {
					$newObject = false;
					$temp_obj15->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj15->initCatreginms();
				$obj15->addCatreginm($obj1);
			}

			$omClass = CatconinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj16  = new $cls();
			$obj16->hydrate($rs, $startcol16);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj16 = $temp_obj1->getCatconinm(); 				if ($temp_obj16->getPrimaryKey() === $obj16->getPrimaryKey()) {
					$newObject = false;
					$temp_obj16->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj16->initCatreginms();
				$obj16->addCatreginm($obj1);
			}

			$omClass = CatusoespPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj17  = new $cls();
			$obj17->hydrate($rs, $startcol17);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj17 = $temp_obj1->getCatusoesp(); 				if ($temp_obj17->getPrimaryKey() === $obj17->getPrimaryKey()) {
					$newObject = false;
					$temp_obj17->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj17->initCatreginms();
				$obj17->addCatreginm($obj1);
			}

			$omClass = CatconsocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj18  = new $cls();
			$obj18->hydrate($rs, $startcol18);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj18 = $temp_obj1->getCatconsoc(); 				if ($temp_obj18->getPrimaryKey() === $obj18->getPrimaryKey()) {
					$newObject = false;
					$temp_obj18->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj18->initCatreginms();
				$obj18->addCatreginm($obj1);
			}

			$omClass = CatrutPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj19  = new $cls();
			$obj19->hydrate($rs, $startcol19);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj19 = $temp_obj1->getCatrut(); 				if ($temp_obj19->getPrimaryKey() === $obj19->getPrimaryKey()) {
					$newObject = false;
					$temp_obj19->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj19->initCatreginms();
				$obj19->addCatreginm($obj1);
			}

			$omClass = CatcarterinmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj20  = new $cls();
			$obj20->hydrate($rs, $startcol20);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj20 = $temp_obj1->getCatcarterinm(); 				if ($temp_obj20->getPrimaryKey() === $obj20->getPrimaryKey()) {
					$newObject = false;
					$temp_obj20->addCatreginm($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj20->initCatreginms();
				$obj20->addCatreginm($obj1);
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
		return CatreginmPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CatreginmPeer::ID); 

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
			$comparison = $criteria->getComparison(CatreginmPeer::ID);
			$selectCriteria->add(CatreginmPeer::ID, $criteria->remove(CatreginmPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CatreginmPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CatreginmPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Catreginm) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CatreginmPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Catreginm $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CatreginmPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CatreginmPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CatreginmPeer::DATABASE_NAME, CatreginmPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CatreginmPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CatreginmPeer::DATABASE_NAME);

		$criteria->add(CatreginmPeer::ID, $pk);


		$v = CatreginmPeer::doSelect($criteria, $con);

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
			$criteria->add(CatreginmPeer::ID, $pks, Criteria::IN);
			$objs = CatreginmPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCatreginmPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/catastro/map/CatreginmMapBuilder.php';
	Propel::registerMapBuilder('lib.model.catastro.map.CatreginmMapBuilder');
}
