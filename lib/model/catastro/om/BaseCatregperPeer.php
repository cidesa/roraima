<?php


abstract class BaseCatregperPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'catregper';

	
	const CLASS_DEFAULT = 'lib.model.catastro.Catregper';

	
	const NUM_COLUMNS = 31;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CATBARURB_ID = 'catregper.CATBARURB_ID';

	
	const CATSEC_ID = 'catregper.CATSEC_ID';

	
	const CATPAR_ID = 'catregper.CATPAR_ID';

	
	const CATMUN_ID = 'catregper.CATMUN_ID';

	
	const CATDIVGEO_ID = 'catregper.CATDIVGEO_ID';

	
	const CATEST_ID = 'catregper.CATEST_ID';

	
	const CATTRAMOFRO_ID = 'catregper.CATTRAMOFRO_ID';

	
	const CATTRAMOLAT_ID = 'catregper.CATTRAMOLAT_ID';

	
	const CATTRAMOLAT2_ID = 'catregper.CATTRAMOLAT2_ID';

	
	const CATCODPOS_ID = 'catregper.CATCODPOS_ID';

	
	const CEDRIF = 'catregper.CEDRIF';

	
	const FECPER = 'catregper.FECPER';

	
	const NOMPER = 'catregper.NOMPER';

	
	const PRINOM = 'catregper.PRINOM';

	
	const SEGNOM = 'catregper.SEGNOM';

	
	const PRIAPE = 'catregper.PRIAPE';

	
	const SEGAPE = 'catregper.SEGAPE';

	
	const RELEMP = 'catregper.RELEMP';

	
	const NACPER = 'catregper.NACPER';

	
	const TIPPER = 'catregper.TIPPER';

	
	const TELPER = 'catregper.TELPER';

	
	const FAXPER = 'catregper.FAXPER';

	
	const APAPOSPER = 'catregper.APAPOSPER';

	
	const EMAPER = 'catregper.EMAPER';

	
	const DIRPER = 'catregper.DIRPER';

	
	const EDICAS = 'catregper.EDICAS';

	
	const PISHAB = 'catregper.PISHAB';

	
	const NUMHAB = 'catregper.NUMHAB';

	
	const CODOFI = 'catregper.CODOFI';

	
	const STAPER = 'catregper.STAPER';

	
	const ID = 'catregper.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('CatbarurbId', 'CatsecId', 'CatparId', 'CatmunId', 'CatdivgeoId', 'CatestId', 'CattramofroId', 'CattramolatId', 'Cattramolat2Id', 'CatcodposId', 'Cedrif', 'Fecper', 'Nomper', 'Prinom', 'Segnom', 'Priape', 'Segape', 'Relemp', 'Nacper', 'Tipper', 'Telper', 'Faxper', 'Apaposper', 'Emaper', 'Dirper', 'Edicas', 'Pishab', 'Numhab', 'Codofi', 'Staper', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CatregperPeer::CATBARURB_ID, CatregperPeer::CATSEC_ID, CatregperPeer::CATPAR_ID, CatregperPeer::CATMUN_ID, CatregperPeer::CATDIVGEO_ID, CatregperPeer::CATEST_ID, CatregperPeer::CATTRAMOFRO_ID, CatregperPeer::CATTRAMOLAT_ID, CatregperPeer::CATTRAMOLAT2_ID, CatregperPeer::CATCODPOS_ID, CatregperPeer::CEDRIF, CatregperPeer::FECPER, CatregperPeer::NOMPER, CatregperPeer::PRINOM, CatregperPeer::SEGNOM, CatregperPeer::PRIAPE, CatregperPeer::SEGAPE, CatregperPeer::RELEMP, CatregperPeer::NACPER, CatregperPeer::TIPPER, CatregperPeer::TELPER, CatregperPeer::FAXPER, CatregperPeer::APAPOSPER, CatregperPeer::EMAPER, CatregperPeer::DIRPER, CatregperPeer::EDICAS, CatregperPeer::PISHAB, CatregperPeer::NUMHAB, CatregperPeer::CODOFI, CatregperPeer::STAPER, CatregperPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('catbarurb_id', 'catsec_id', 'catpar_id', 'catmun_id', 'catdivgeo_id', 'catest_id', 'cattramofro_id', 'cattramolat_id', 'cattramolat2_id', 'catcodpos_id', 'cedrif', 'fecper', 'nomper', 'prinom', 'segnom', 'priape', 'segape', 'relemp', 'nacper', 'tipper', 'telper', 'faxper', 'apaposper', 'emaper', 'dirper', 'edicas', 'pishab', 'numhab', 'codofi', 'staper', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('CatbarurbId' => 0, 'CatsecId' => 1, 'CatparId' => 2, 'CatmunId' => 3, 'CatdivgeoId' => 4, 'CatestId' => 5, 'CattramofroId' => 6, 'CattramolatId' => 7, 'Cattramolat2Id' => 8, 'CatcodposId' => 9, 'Cedrif' => 10, 'Fecper' => 11, 'Nomper' => 12, 'Prinom' => 13, 'Segnom' => 14, 'Priape' => 15, 'Segape' => 16, 'Relemp' => 17, 'Nacper' => 18, 'Tipper' => 19, 'Telper' => 20, 'Faxper' => 21, 'Apaposper' => 22, 'Emaper' => 23, 'Dirper' => 24, 'Edicas' => 25, 'Pishab' => 26, 'Numhab' => 27, 'Codofi' => 28, 'Staper' => 29, 'Id' => 30, ),
		BasePeer::TYPE_COLNAME => array (CatregperPeer::CATBARURB_ID => 0, CatregperPeer::CATSEC_ID => 1, CatregperPeer::CATPAR_ID => 2, CatregperPeer::CATMUN_ID => 3, CatregperPeer::CATDIVGEO_ID => 4, CatregperPeer::CATEST_ID => 5, CatregperPeer::CATTRAMOFRO_ID => 6, CatregperPeer::CATTRAMOLAT_ID => 7, CatregperPeer::CATTRAMOLAT2_ID => 8, CatregperPeer::CATCODPOS_ID => 9, CatregperPeer::CEDRIF => 10, CatregperPeer::FECPER => 11, CatregperPeer::NOMPER => 12, CatregperPeer::PRINOM => 13, CatregperPeer::SEGNOM => 14, CatregperPeer::PRIAPE => 15, CatregperPeer::SEGAPE => 16, CatregperPeer::RELEMP => 17, CatregperPeer::NACPER => 18, CatregperPeer::TIPPER => 19, CatregperPeer::TELPER => 20, CatregperPeer::FAXPER => 21, CatregperPeer::APAPOSPER => 22, CatregperPeer::EMAPER => 23, CatregperPeer::DIRPER => 24, CatregperPeer::EDICAS => 25, CatregperPeer::PISHAB => 26, CatregperPeer::NUMHAB => 27, CatregperPeer::CODOFI => 28, CatregperPeer::STAPER => 29, CatregperPeer::ID => 30, ),
		BasePeer::TYPE_FIELDNAME => array ('catbarurb_id' => 0, 'catsec_id' => 1, 'catpar_id' => 2, 'catmun_id' => 3, 'catdivgeo_id' => 4, 'catest_id' => 5, 'cattramofro_id' => 6, 'cattramolat_id' => 7, 'cattramolat2_id' => 8, 'catcodpos_id' => 9, 'cedrif' => 10, 'fecper' => 11, 'nomper' => 12, 'prinom' => 13, 'segnom' => 14, 'priape' => 15, 'segape' => 16, 'relemp' => 17, 'nacper' => 18, 'tipper' => 19, 'telper' => 20, 'faxper' => 21, 'apaposper' => 22, 'emaper' => 23, 'dirper' => 24, 'edicas' => 25, 'pishab' => 26, 'numhab' => 27, 'codofi' => 28, 'staper' => 29, 'id' => 30, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/catastro/map/CatregperMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.catastro.map.CatregperMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CatregperPeer::getTableMap();
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
		return str_replace(CatregperPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CatregperPeer::CATBARURB_ID);

		$criteria->addSelectColumn(CatregperPeer::CATSEC_ID);

		$criteria->addSelectColumn(CatregperPeer::CATPAR_ID);

		$criteria->addSelectColumn(CatregperPeer::CATMUN_ID);

		$criteria->addSelectColumn(CatregperPeer::CATDIVGEO_ID);

		$criteria->addSelectColumn(CatregperPeer::CATEST_ID);

		$criteria->addSelectColumn(CatregperPeer::CATTRAMOFRO_ID);

		$criteria->addSelectColumn(CatregperPeer::CATTRAMOLAT_ID);

		$criteria->addSelectColumn(CatregperPeer::CATTRAMOLAT2_ID);

		$criteria->addSelectColumn(CatregperPeer::CATCODPOS_ID);

		$criteria->addSelectColumn(CatregperPeer::CEDRIF);

		$criteria->addSelectColumn(CatregperPeer::FECPER);

		$criteria->addSelectColumn(CatregperPeer::NOMPER);

		$criteria->addSelectColumn(CatregperPeer::PRINOM);

		$criteria->addSelectColumn(CatregperPeer::SEGNOM);

		$criteria->addSelectColumn(CatregperPeer::PRIAPE);

		$criteria->addSelectColumn(CatregperPeer::SEGAPE);

		$criteria->addSelectColumn(CatregperPeer::RELEMP);

		$criteria->addSelectColumn(CatregperPeer::NACPER);

		$criteria->addSelectColumn(CatregperPeer::TIPPER);

		$criteria->addSelectColumn(CatregperPeer::TELPER);

		$criteria->addSelectColumn(CatregperPeer::FAXPER);

		$criteria->addSelectColumn(CatregperPeer::APAPOSPER);

		$criteria->addSelectColumn(CatregperPeer::EMAPER);

		$criteria->addSelectColumn(CatregperPeer::DIRPER);

		$criteria->addSelectColumn(CatregperPeer::EDICAS);

		$criteria->addSelectColumn(CatregperPeer::PISHAB);

		$criteria->addSelectColumn(CatregperPeer::NUMHAB);

		$criteria->addSelectColumn(CatregperPeer::CODOFI);

		$criteria->addSelectColumn(CatregperPeer::STAPER);

		$criteria->addSelectColumn(CatregperPeer::ID);

	}

	const COUNT = 'COUNT(catregper.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT catregper.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatregperPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatregperPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CatregperPeer::doSelectRS($criteria, $con);
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
		$objects = CatregperPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CatregperPeer::populateObjects(CatregperPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CatregperPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CatregperPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCatbarurb(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatregperPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatregperPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatregperPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$rs = CatregperPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CatregperPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatregperPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatregperPeer::CATSEC_ID, CatsecPeer::ID);

		$rs = CatregperPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CatregperPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatregperPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatregperPeer::CATPAR_ID, CatparPeer::ID);

		$rs = CatregperPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CatregperPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatregperPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatregperPeer::CATMUN_ID, CatmunPeer::ID);

		$rs = CatregperPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCatdivgeo(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatregperPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatregperPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatregperPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$rs = CatregperPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CatregperPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatregperPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatregperPeer::CATEST_ID, CatestPeer::ID);

		$rs = CatregperPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CatregperPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatregperPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatregperPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$rs = CatregperPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CatregperPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatregperPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatregperPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$rs = CatregperPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CatregperPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatregperPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatregperPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$rs = CatregperPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CatregperPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatregperPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatregperPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$rs = CatregperPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCatbarurb(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatregperPeer::addSelectColumns($c);
		$startcol = (CatregperPeer::NUM_COLUMNS - CatregperPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatbarurbPeer::addSelectColumns($c);

		$c->addJoin(CatregperPeer::CATBARURB_ID, CatbarurbPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatregperPeer::getOMClass();

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
										$temp_obj2->addCatregper($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatregpers();
				$obj2->addCatregper($obj1); 			}
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

		CatregperPeer::addSelectColumns($c);
		$startcol = (CatregperPeer::NUM_COLUMNS - CatregperPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatsecPeer::addSelectColumns($c);

		$c->addJoin(CatregperPeer::CATSEC_ID, CatsecPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatregperPeer::getOMClass();

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
										$temp_obj2->addCatregper($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatregpers();
				$obj2->addCatregper($obj1); 			}
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

		CatregperPeer::addSelectColumns($c);
		$startcol = (CatregperPeer::NUM_COLUMNS - CatregperPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatparPeer::addSelectColumns($c);

		$c->addJoin(CatregperPeer::CATPAR_ID, CatparPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatregperPeer::getOMClass();

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
										$temp_obj2->addCatregper($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatregpers();
				$obj2->addCatregper($obj1); 			}
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

		CatregperPeer::addSelectColumns($c);
		$startcol = (CatregperPeer::NUM_COLUMNS - CatregperPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatmunPeer::addSelectColumns($c);

		$c->addJoin(CatregperPeer::CATMUN_ID, CatmunPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatregperPeer::getOMClass();

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
										$temp_obj2->addCatregper($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatregpers();
				$obj2->addCatregper($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCatdivgeo(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatregperPeer::addSelectColumns($c);
		$startcol = (CatregperPeer::NUM_COLUMNS - CatregperPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatdivgeoPeer::addSelectColumns($c);

		$c->addJoin(CatregperPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatregperPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatdivgeoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatdivgeo(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCatregper($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatregpers();
				$obj2->addCatregper($obj1); 			}
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

		CatregperPeer::addSelectColumns($c);
		$startcol = (CatregperPeer::NUM_COLUMNS - CatregperPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatestPeer::addSelectColumns($c);

		$c->addJoin(CatregperPeer::CATEST_ID, CatestPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatregperPeer::getOMClass();

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
										$temp_obj2->addCatregper($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatregpers();
				$obj2->addCatregper($obj1); 			}
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

		CatregperPeer::addSelectColumns($c);
		$startcol = (CatregperPeer::NUM_COLUMNS - CatregperPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CattramoPeer::addSelectColumns($c);

		$c->addJoin(CatregperPeer::CATTRAMOFRO_ID, CattramoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatregperPeer::getOMClass();

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
										$temp_obj2->addCatregperRelatedByCattramofroId($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatregpersRelatedByCattramofroId();
				$obj2->addCatregperRelatedByCattramofroId($obj1); 			}
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

		CatregperPeer::addSelectColumns($c);
		$startcol = (CatregperPeer::NUM_COLUMNS - CatregperPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CattramoPeer::addSelectColumns($c);

		$c->addJoin(CatregperPeer::CATTRAMOLAT_ID, CattramoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatregperPeer::getOMClass();

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
										$temp_obj2->addCatregperRelatedByCattramolatId($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatregpersRelatedByCattramolatId();
				$obj2->addCatregperRelatedByCattramolatId($obj1); 			}
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

		CatregperPeer::addSelectColumns($c);
		$startcol = (CatregperPeer::NUM_COLUMNS - CatregperPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CattramoPeer::addSelectColumns($c);

		$c->addJoin(CatregperPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatregperPeer::getOMClass();

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
										$temp_obj2->addCatregperRelatedByCattramolat2Id($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatregpersRelatedByCattramolat2Id();
				$obj2->addCatregperRelatedByCattramolat2Id($obj1); 			}
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

		CatregperPeer::addSelectColumns($c);
		$startcol = (CatregperPeer::NUM_COLUMNS - CatregperPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatcodposPeer::addSelectColumns($c);

		$c->addJoin(CatregperPeer::CATCODPOS_ID, CatcodposPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatregperPeer::getOMClass();

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
										$temp_obj2->addCatregper($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCatregpers();
				$obj2->addCatregper($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatregperPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatregperPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatregperPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$criteria->addJoin(CatregperPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatregperPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatregperPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatregperPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$criteria->addJoin(CatregperPeer::CATEST_ID, CatestPeer::ID);

		$criteria->addJoin(CatregperPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$criteria->addJoin(CatregperPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$criteria->addJoin(CatregperPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$criteria->addJoin(CatregperPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$rs = CatregperPeer::doSelectRS($criteria, $con);
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

		CatregperPeer::addSelectColumns($c);
		$startcol2 = (CatregperPeer::NUM_COLUMNS - CatregperPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatbarurbPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatbarurbPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatmunPeer::NUM_COLUMNS;

		CatdivgeoPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatdivgeoPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CatestPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + CattramoPeer::NUM_COLUMNS;

		CatcodposPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + CatcodposPeer::NUM_COLUMNS;

		$c->addJoin(CatregperPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$c->addJoin(CatregperPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatregperPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatregperPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatregperPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$c->addJoin(CatregperPeer::CATEST_ID, CatestPeer::ID);

		$c->addJoin(CatregperPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$c->addJoin(CatregperPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$c->addJoin(CatregperPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$c->addJoin(CatregperPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatregperPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = CatbarurbPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatbarurb(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatregper($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initCatregpers();
				$obj2->addCatregper($obj1);
			}


					
			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatsec(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatregper($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initCatregpers();
				$obj3->addCatregper($obj1);
			}


					
			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatpar(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatregper($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initCatregpers();
				$obj4->addCatregper($obj1);
			}


					
			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatmun(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatregper($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initCatregpers();
				$obj5->addCatregper($obj1);
			}


					
			$omClass = CatdivgeoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6 = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatdivgeo(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatregper($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj6->initCatregpers();
				$obj6->addCatregper($obj1);
			}


					
			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7 = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCatest(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatregper($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj7->initCatregpers();
				$obj7->addCatregper($obj1);
			}


					
			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8 = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCattramoRelatedByCattramofroId(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatregperRelatedByCattramofroId($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj8->initCatregpersRelatedByCattramofroId();
				$obj8->addCatregperRelatedByCattramofroId($obj1);
			}


					
			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9 = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getCattramoRelatedByCattramolatId(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addCatregperRelatedByCattramolatId($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj9->initCatregpersRelatedByCattramolatId();
				$obj9->addCatregperRelatedByCattramolatId($obj1);
			}


					
			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10 = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getCattramoRelatedByCattramolat2Id(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addCatregperRelatedByCattramolat2Id($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj10->initCatregpersRelatedByCattramolat2Id();
				$obj10->addCatregperRelatedByCattramolat2Id($obj1);
			}


					
			$omClass = CatcodposPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11 = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getCatcodpos(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addCatregper($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj11->initCatregpers();
				$obj11->addCatregper($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptCatbarurb(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatregperPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatregperPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatregperPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatregperPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatregperPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatregperPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$criteria->addJoin(CatregperPeer::CATEST_ID, CatestPeer::ID);

		$criteria->addJoin(CatregperPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$criteria->addJoin(CatregperPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$criteria->addJoin(CatregperPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$criteria->addJoin(CatregperPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$rs = CatregperPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CatregperPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatregperPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatregperPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$criteria->addJoin(CatregperPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatregperPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatregperPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$criteria->addJoin(CatregperPeer::CATEST_ID, CatestPeer::ID);

		$criteria->addJoin(CatregperPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$criteria->addJoin(CatregperPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$criteria->addJoin(CatregperPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$criteria->addJoin(CatregperPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$rs = CatregperPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CatregperPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatregperPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatregperPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$criteria->addJoin(CatregperPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatregperPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatregperPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$criteria->addJoin(CatregperPeer::CATEST_ID, CatestPeer::ID);

		$criteria->addJoin(CatregperPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$criteria->addJoin(CatregperPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$criteria->addJoin(CatregperPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$criteria->addJoin(CatregperPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$rs = CatregperPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CatregperPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatregperPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatregperPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$criteria->addJoin(CatregperPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatregperPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatregperPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$criteria->addJoin(CatregperPeer::CATEST_ID, CatestPeer::ID);

		$criteria->addJoin(CatregperPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$criteria->addJoin(CatregperPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$criteria->addJoin(CatregperPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$criteria->addJoin(CatregperPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$rs = CatregperPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCatdivgeo(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CatregperPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatregperPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatregperPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$criteria->addJoin(CatregperPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatregperPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatregperPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatregperPeer::CATEST_ID, CatestPeer::ID);

		$criteria->addJoin(CatregperPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$criteria->addJoin(CatregperPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$criteria->addJoin(CatregperPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$criteria->addJoin(CatregperPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$rs = CatregperPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CatregperPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatregperPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatregperPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$criteria->addJoin(CatregperPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatregperPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatregperPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatregperPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$criteria->addJoin(CatregperPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$criteria->addJoin(CatregperPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$criteria->addJoin(CatregperPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$criteria->addJoin(CatregperPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$rs = CatregperPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CatregperPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatregperPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatregperPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$criteria->addJoin(CatregperPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatregperPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatregperPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatregperPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$criteria->addJoin(CatregperPeer::CATEST_ID, CatestPeer::ID);

		$criteria->addJoin(CatregperPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$rs = CatregperPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CatregperPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatregperPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatregperPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$criteria->addJoin(CatregperPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatregperPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatregperPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatregperPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$criteria->addJoin(CatregperPeer::CATEST_ID, CatestPeer::ID);

		$criteria->addJoin(CatregperPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$rs = CatregperPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CatregperPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatregperPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatregperPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$criteria->addJoin(CatregperPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatregperPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatregperPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatregperPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$criteria->addJoin(CatregperPeer::CATEST_ID, CatestPeer::ID);

		$criteria->addJoin(CatregperPeer::CATCODPOS_ID, CatcodposPeer::ID);

		$rs = CatregperPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CatregperPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CatregperPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CatregperPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$criteria->addJoin(CatregperPeer::CATSEC_ID, CatsecPeer::ID);

		$criteria->addJoin(CatregperPeer::CATPAR_ID, CatparPeer::ID);

		$criteria->addJoin(CatregperPeer::CATMUN_ID, CatmunPeer::ID);

		$criteria->addJoin(CatregperPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$criteria->addJoin(CatregperPeer::CATEST_ID, CatestPeer::ID);

		$criteria->addJoin(CatregperPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$criteria->addJoin(CatregperPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$criteria->addJoin(CatregperPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$rs = CatregperPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptCatbarurb(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatregperPeer::addSelectColumns($c);
		$startcol2 = (CatregperPeer::NUM_COLUMNS - CatregperPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatsecPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatmunPeer::NUM_COLUMNS;

		CatdivgeoPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatdivgeoPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatestPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + CattramoPeer::NUM_COLUMNS;

		CatcodposPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + CatcodposPeer::NUM_COLUMNS;

		$c->addJoin(CatregperPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatregperPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatregperPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatregperPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$c->addJoin(CatregperPeer::CATEST_ID, CatestPeer::ID);

		$c->addJoin(CatregperPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$c->addJoin(CatregperPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$c->addJoin(CatregperPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$c->addJoin(CatregperPeer::CATCODPOS_ID, CatcodposPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatregperPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatsec(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatregpers();
				$obj2->addCatregper($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatpar(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatregpers();
				$obj3->addCatregper($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatmun(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatregpers();
				$obj4->addCatregper($obj1);
			}

			$omClass = CatdivgeoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatdivgeo(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatregpers();
				$obj5->addCatregper($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatest(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatregpers();
				$obj6->addCatregper($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCattramoRelatedByCattramofroId(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatregperRelatedByCattramofroId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatregpersRelatedByCattramofroId();
				$obj7->addCatregperRelatedByCattramofroId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCattramoRelatedByCattramolatId(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatregperRelatedByCattramolatId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initCatregpersRelatedByCattramolatId();
				$obj8->addCatregperRelatedByCattramolatId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getCattramoRelatedByCattramolat2Id(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addCatregperRelatedByCattramolat2Id($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initCatregpersRelatedByCattramolat2Id();
				$obj9->addCatregperRelatedByCattramolat2Id($obj1);
			}

			$omClass = CatcodposPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getCatcodpos(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initCatregpers();
				$obj10->addCatregper($obj1);
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

		CatregperPeer::addSelectColumns($c);
		$startcol2 = (CatregperPeer::NUM_COLUMNS - CatregperPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatbarurbPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatbarurbPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatmunPeer::NUM_COLUMNS;

		CatdivgeoPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatdivgeoPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatestPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + CattramoPeer::NUM_COLUMNS;

		CatcodposPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + CatcodposPeer::NUM_COLUMNS;

		$c->addJoin(CatregperPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$c->addJoin(CatregperPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatregperPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatregperPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$c->addJoin(CatregperPeer::CATEST_ID, CatestPeer::ID);

		$c->addJoin(CatregperPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$c->addJoin(CatregperPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$c->addJoin(CatregperPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$c->addJoin(CatregperPeer::CATCODPOS_ID, CatcodposPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatregperPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatbarurbPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatbarurb(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatregpers();
				$obj2->addCatregper($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatpar(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatregpers();
				$obj3->addCatregper($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatmun(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatregpers();
				$obj4->addCatregper($obj1);
			}

			$omClass = CatdivgeoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatdivgeo(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatregpers();
				$obj5->addCatregper($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatest(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatregpers();
				$obj6->addCatregper($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCattramoRelatedByCattramofroId(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatregperRelatedByCattramofroId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatregpersRelatedByCattramofroId();
				$obj7->addCatregperRelatedByCattramofroId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCattramoRelatedByCattramolatId(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatregperRelatedByCattramolatId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initCatregpersRelatedByCattramolatId();
				$obj8->addCatregperRelatedByCattramolatId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getCattramoRelatedByCattramolat2Id(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addCatregperRelatedByCattramolat2Id($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initCatregpersRelatedByCattramolat2Id();
				$obj9->addCatregperRelatedByCattramolat2Id($obj1);
			}

			$omClass = CatcodposPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getCatcodpos(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initCatregpers();
				$obj10->addCatregper($obj1);
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

		CatregperPeer::addSelectColumns($c);
		$startcol2 = (CatregperPeer::NUM_COLUMNS - CatregperPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatbarurbPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatbarurbPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatsecPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatmunPeer::NUM_COLUMNS;

		CatdivgeoPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatdivgeoPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatestPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + CattramoPeer::NUM_COLUMNS;

		CatcodposPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + CatcodposPeer::NUM_COLUMNS;

		$c->addJoin(CatregperPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$c->addJoin(CatregperPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatregperPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatregperPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$c->addJoin(CatregperPeer::CATEST_ID, CatestPeer::ID);

		$c->addJoin(CatregperPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$c->addJoin(CatregperPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$c->addJoin(CatregperPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$c->addJoin(CatregperPeer::CATCODPOS_ID, CatcodposPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatregperPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatbarurbPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatbarurb(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatregpers();
				$obj2->addCatregper($obj1);
			}

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatsec(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatregpers();
				$obj3->addCatregper($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatmun(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatregpers();
				$obj4->addCatregper($obj1);
			}

			$omClass = CatdivgeoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatdivgeo(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatregpers();
				$obj5->addCatregper($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatest(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatregpers();
				$obj6->addCatregper($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCattramoRelatedByCattramofroId(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatregperRelatedByCattramofroId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatregpersRelatedByCattramofroId();
				$obj7->addCatregperRelatedByCattramofroId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCattramoRelatedByCattramolatId(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatregperRelatedByCattramolatId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initCatregpersRelatedByCattramolatId();
				$obj8->addCatregperRelatedByCattramolatId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getCattramoRelatedByCattramolat2Id(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addCatregperRelatedByCattramolat2Id($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initCatregpersRelatedByCattramolat2Id();
				$obj9->addCatregperRelatedByCattramolat2Id($obj1);
			}

			$omClass = CatcodposPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getCatcodpos(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initCatregpers();
				$obj10->addCatregper($obj1);
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

		CatregperPeer::addSelectColumns($c);
		$startcol2 = (CatregperPeer::NUM_COLUMNS - CatregperPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatbarurbPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatbarurbPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatparPeer::NUM_COLUMNS;

		CatdivgeoPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatdivgeoPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatestPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + CattramoPeer::NUM_COLUMNS;

		CatcodposPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + CatcodposPeer::NUM_COLUMNS;

		$c->addJoin(CatregperPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$c->addJoin(CatregperPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatregperPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatregperPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$c->addJoin(CatregperPeer::CATEST_ID, CatestPeer::ID);

		$c->addJoin(CatregperPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$c->addJoin(CatregperPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$c->addJoin(CatregperPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$c->addJoin(CatregperPeer::CATCODPOS_ID, CatcodposPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatregperPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatbarurbPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatbarurb(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatregpers();
				$obj2->addCatregper($obj1);
			}

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatsec(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatregpers();
				$obj3->addCatregper($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatpar(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatregpers();
				$obj4->addCatregper($obj1);
			}

			$omClass = CatdivgeoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatdivgeo(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatregpers();
				$obj5->addCatregper($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatest(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatregpers();
				$obj6->addCatregper($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCattramoRelatedByCattramofroId(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatregperRelatedByCattramofroId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatregpersRelatedByCattramofroId();
				$obj7->addCatregperRelatedByCattramofroId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCattramoRelatedByCattramolatId(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatregperRelatedByCattramolatId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initCatregpersRelatedByCattramolatId();
				$obj8->addCatregperRelatedByCattramolatId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getCattramoRelatedByCattramolat2Id(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addCatregperRelatedByCattramolat2Id($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initCatregpersRelatedByCattramolat2Id();
				$obj9->addCatregperRelatedByCattramolat2Id($obj1);
			}

			$omClass = CatcodposPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getCatcodpos(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initCatregpers();
				$obj10->addCatregper($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCatdivgeo(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CatregperPeer::addSelectColumns($c);
		$startcol2 = (CatregperPeer::NUM_COLUMNS - CatregperPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatbarurbPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatbarurbPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatmunPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatestPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + CattramoPeer::NUM_COLUMNS;

		CatcodposPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + CatcodposPeer::NUM_COLUMNS;

		$c->addJoin(CatregperPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$c->addJoin(CatregperPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatregperPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatregperPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatregperPeer::CATEST_ID, CatestPeer::ID);

		$c->addJoin(CatregperPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$c->addJoin(CatregperPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$c->addJoin(CatregperPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$c->addJoin(CatregperPeer::CATCODPOS_ID, CatcodposPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatregperPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatbarurbPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatbarurb(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatregpers();
				$obj2->addCatregper($obj1);
			}

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatsec(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatregpers();
				$obj3->addCatregper($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatpar(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatregpers();
				$obj4->addCatregper($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatmun(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatregpers();
				$obj5->addCatregper($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatest(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatregpers();
				$obj6->addCatregper($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCattramoRelatedByCattramofroId(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatregperRelatedByCattramofroId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatregpersRelatedByCattramofroId();
				$obj7->addCatregperRelatedByCattramofroId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCattramoRelatedByCattramolatId(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatregperRelatedByCattramolatId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initCatregpersRelatedByCattramolatId();
				$obj8->addCatregperRelatedByCattramolatId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getCattramoRelatedByCattramolat2Id(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addCatregperRelatedByCattramolat2Id($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initCatregpersRelatedByCattramolat2Id();
				$obj9->addCatregperRelatedByCattramolat2Id($obj1);
			}

			$omClass = CatcodposPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getCatcodpos(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initCatregpers();
				$obj10->addCatregper($obj1);
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

		CatregperPeer::addSelectColumns($c);
		$startcol2 = (CatregperPeer::NUM_COLUMNS - CatregperPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatbarurbPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatbarurbPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatmunPeer::NUM_COLUMNS;

		CatdivgeoPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatdivgeoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + CattramoPeer::NUM_COLUMNS;

		CatcodposPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + CatcodposPeer::NUM_COLUMNS;

		$c->addJoin(CatregperPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$c->addJoin(CatregperPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatregperPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatregperPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatregperPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$c->addJoin(CatregperPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$c->addJoin(CatregperPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$c->addJoin(CatregperPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);

		$c->addJoin(CatregperPeer::CATCODPOS_ID, CatcodposPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatregperPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatbarurbPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatbarurb(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatregpers();
				$obj2->addCatregper($obj1);
			}

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatsec(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatregpers();
				$obj3->addCatregper($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatpar(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatregpers();
				$obj4->addCatregper($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatmun(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatregpers();
				$obj5->addCatregper($obj1);
			}

			$omClass = CatdivgeoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatdivgeo(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatregpers();
				$obj6->addCatregper($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCattramoRelatedByCattramofroId(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatregperRelatedByCattramofroId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatregpersRelatedByCattramofroId();
				$obj7->addCatregperRelatedByCattramofroId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCattramoRelatedByCattramolatId(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatregperRelatedByCattramolatId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initCatregpersRelatedByCattramolatId();
				$obj8->addCatregperRelatedByCattramolatId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getCattramoRelatedByCattramolat2Id(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addCatregperRelatedByCattramolat2Id($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initCatregpersRelatedByCattramolat2Id();
				$obj9->addCatregperRelatedByCattramolat2Id($obj1);
			}

			$omClass = CatcodposPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getCatcodpos(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initCatregpers();
				$obj10->addCatregper($obj1);
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

		CatregperPeer::addSelectColumns($c);
		$startcol2 = (CatregperPeer::NUM_COLUMNS - CatregperPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatbarurbPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatbarurbPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatmunPeer::NUM_COLUMNS;

		CatdivgeoPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatdivgeoPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CatestPeer::NUM_COLUMNS;

		CatcodposPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CatcodposPeer::NUM_COLUMNS;

		$c->addJoin(CatregperPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$c->addJoin(CatregperPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatregperPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatregperPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatregperPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$c->addJoin(CatregperPeer::CATEST_ID, CatestPeer::ID);

		$c->addJoin(CatregperPeer::CATCODPOS_ID, CatcodposPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatregperPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatbarurbPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatbarurb(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatregpers();
				$obj2->addCatregper($obj1);
			}

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatsec(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatregpers();
				$obj3->addCatregper($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatpar(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatregpers();
				$obj4->addCatregper($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatmun(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatregpers();
				$obj5->addCatregper($obj1);
			}

			$omClass = CatdivgeoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatdivgeo(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatregpers();
				$obj6->addCatregper($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCatest(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatregpers();
				$obj7->addCatregper($obj1);
			}

			$omClass = CatcodposPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCatcodpos(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initCatregpers();
				$obj8->addCatregper($obj1);
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

		CatregperPeer::addSelectColumns($c);
		$startcol2 = (CatregperPeer::NUM_COLUMNS - CatregperPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatbarurbPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatbarurbPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatmunPeer::NUM_COLUMNS;

		CatdivgeoPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatdivgeoPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CatestPeer::NUM_COLUMNS;

		CatcodposPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CatcodposPeer::NUM_COLUMNS;

		$c->addJoin(CatregperPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$c->addJoin(CatregperPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatregperPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatregperPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatregperPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$c->addJoin(CatregperPeer::CATEST_ID, CatestPeer::ID);

		$c->addJoin(CatregperPeer::CATCODPOS_ID, CatcodposPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatregperPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatbarurbPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatbarurb(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatregpers();
				$obj2->addCatregper($obj1);
			}

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatsec(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatregpers();
				$obj3->addCatregper($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatpar(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatregpers();
				$obj4->addCatregper($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatmun(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatregpers();
				$obj5->addCatregper($obj1);
			}

			$omClass = CatdivgeoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatdivgeo(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatregpers();
				$obj6->addCatregper($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCatest(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatregpers();
				$obj7->addCatregper($obj1);
			}

			$omClass = CatcodposPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCatcodpos(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initCatregpers();
				$obj8->addCatregper($obj1);
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

		CatregperPeer::addSelectColumns($c);
		$startcol2 = (CatregperPeer::NUM_COLUMNS - CatregperPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatbarurbPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatbarurbPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatmunPeer::NUM_COLUMNS;

		CatdivgeoPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatdivgeoPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CatestPeer::NUM_COLUMNS;

		CatcodposPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CatcodposPeer::NUM_COLUMNS;

		$c->addJoin(CatregperPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$c->addJoin(CatregperPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatregperPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatregperPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatregperPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$c->addJoin(CatregperPeer::CATEST_ID, CatestPeer::ID);

		$c->addJoin(CatregperPeer::CATCODPOS_ID, CatcodposPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatregperPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatbarurbPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatbarurb(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatregpers();
				$obj2->addCatregper($obj1);
			}

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatsec(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatregpers();
				$obj3->addCatregper($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatpar(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatregpers();
				$obj4->addCatregper($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatmun(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatregpers();
				$obj5->addCatregper($obj1);
			}

			$omClass = CatdivgeoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatdivgeo(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatregpers();
				$obj6->addCatregper($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCatest(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatregpers();
				$obj7->addCatregper($obj1);
			}

			$omClass = CatcodposPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCatcodpos(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initCatregpers();
				$obj8->addCatregper($obj1);
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

		CatregperPeer::addSelectColumns($c);
		$startcol2 = (CatregperPeer::NUM_COLUMNS - CatregperPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CatbarurbPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CatbarurbPeer::NUM_COLUMNS;

		CatsecPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CatsecPeer::NUM_COLUMNS;

		CatparPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CatparPeer::NUM_COLUMNS;

		CatmunPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + CatmunPeer::NUM_COLUMNS;

		CatdivgeoPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + CatdivgeoPeer::NUM_COLUMNS;

		CatestPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + CatestPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + CattramoPeer::NUM_COLUMNS;

		CattramoPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + CattramoPeer::NUM_COLUMNS;

		$c->addJoin(CatregperPeer::CATBARURB_ID, CatbarurbPeer::ID);

		$c->addJoin(CatregperPeer::CATSEC_ID, CatsecPeer::ID);

		$c->addJoin(CatregperPeer::CATPAR_ID, CatparPeer::ID);

		$c->addJoin(CatregperPeer::CATMUN_ID, CatmunPeer::ID);

		$c->addJoin(CatregperPeer::CATDIVGEO_ID, CatdivgeoPeer::ID);

		$c->addJoin(CatregperPeer::CATEST_ID, CatestPeer::ID);

		$c->addJoin(CatregperPeer::CATTRAMOFRO_ID, CattramoPeer::ID);

		$c->addJoin(CatregperPeer::CATTRAMOLAT_ID, CattramoPeer::ID);

		$c->addJoin(CatregperPeer::CATTRAMOLAT2_ID, CattramoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CatregperPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatbarurbPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCatbarurb(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCatregpers();
				$obj2->addCatregper($obj1);
			}

			$omClass = CatsecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCatsec(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCatregpers();
				$obj3->addCatregper($obj1);
			}

			$omClass = CatparPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCatpar(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCatregpers();
				$obj4->addCatregper($obj1);
			}

			$omClass = CatmunPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getCatmun(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCatregpers();
				$obj5->addCatregper($obj1);
			}

			$omClass = CatdivgeoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getCatdivgeo(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initCatregpers();
				$obj6->addCatregper($obj1);
			}

			$omClass = CatestPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getCatest(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addCatregper($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initCatregpers();
				$obj7->addCatregper($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getCattramoRelatedByCattramofroId(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addCatregperRelatedByCattramofroId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initCatregpersRelatedByCattramofroId();
				$obj8->addCatregperRelatedByCattramofroId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getCattramoRelatedByCattramolatId(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addCatregperRelatedByCattramolatId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initCatregpersRelatedByCattramolatId();
				$obj9->addCatregperRelatedByCattramolatId($obj1);
			}

			$omClass = CattramoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getCattramoRelatedByCattramolat2Id(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addCatregperRelatedByCattramolat2Id($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initCatregpersRelatedByCattramolat2Id();
				$obj10->addCatregperRelatedByCattramolat2Id($obj1);
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
		return CatregperPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CatregperPeer::ID); 

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
			$comparison = $criteria->getComparison(CatregperPeer::ID);
			$selectCriteria->add(CatregperPeer::ID, $criteria->remove(CatregperPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CatregperPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CatregperPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Catregper) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CatregperPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Catregper $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CatregperPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CatregperPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CatregperPeer::DATABASE_NAME, CatregperPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CatregperPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CatregperPeer::DATABASE_NAME);

		$criteria->add(CatregperPeer::ID, $pk);


		$v = CatregperPeer::doSelect($criteria, $con);

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
			$criteria->add(CatregperPeer::ID, $pks, Criteria::IN);
			$objs = CatregperPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCatregperPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/catastro/map/CatregperMapBuilder.php';
	Propel::registerMapBuilder('lib.model.catastro.map.CatregperMapBuilder');
}
