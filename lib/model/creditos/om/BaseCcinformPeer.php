<?php


abstract class BaseCcinformPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccinform';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccinform';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccinform.ID';

	
	const TITULO = 'ccinform.TITULO';

	
	const CONTEN = 'ccinform.CONTEN';

	
	const FECREC = 'ccinform.FECREC';

	
	const FECENT = 'ccinform.FECENT';

	
	const FECCUL = 'ccinform.FECCUL';

	
	const PUNTUACION = 'ccinform.PUNTUACION';

	
	const CCGERENC_ID = 'ccinform.CCGERENC_ID';

	
	const CCANALIS_ID = 'ccinform.CCANALIS_ID';

	
	const CCCLAINF_ID = 'ccinform.CCCLAINF_ID';

	
	const CCSOLICI_ID = 'ccinform.CCSOLICI_ID';

	
	const CCRESBAR_ID = 'ccinform.CCRESBAR_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Titulo', 'Conten', 'Fecrec', 'Fecent', 'Feccul', 'Puntuacion', 'CcgerencId', 'CcanalisId', 'CcclainfId', 'CcsoliciId', 'CcresbarId', ),
		BasePeer::TYPE_COLNAME => array (CcinformPeer::ID, CcinformPeer::TITULO, CcinformPeer::CONTEN, CcinformPeer::FECREC, CcinformPeer::FECENT, CcinformPeer::FECCUL, CcinformPeer::PUNTUACION, CcinformPeer::CCGERENC_ID, CcinformPeer::CCANALIS_ID, CcinformPeer::CCCLAINF_ID, CcinformPeer::CCSOLICI_ID, CcinformPeer::CCRESBAR_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'titulo', 'conten', 'fecrec', 'fecent', 'feccul', 'puntuacion', 'ccgerenc_id', 'ccanalis_id', 'ccclainf_id', 'ccsolici_id', 'ccresbar_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Titulo' => 1, 'Conten' => 2, 'Fecrec' => 3, 'Fecent' => 4, 'Feccul' => 5, 'Puntuacion' => 6, 'CcgerencId' => 7, 'CcanalisId' => 8, 'CcclainfId' => 9, 'CcsoliciId' => 10, 'CcresbarId' => 11, ),
		BasePeer::TYPE_COLNAME => array (CcinformPeer::ID => 0, CcinformPeer::TITULO => 1, CcinformPeer::CONTEN => 2, CcinformPeer::FECREC => 3, CcinformPeer::FECENT => 4, CcinformPeer::FECCUL => 5, CcinformPeer::PUNTUACION => 6, CcinformPeer::CCGERENC_ID => 7, CcinformPeer::CCANALIS_ID => 8, CcinformPeer::CCCLAINF_ID => 9, CcinformPeer::CCSOLICI_ID => 10, CcinformPeer::CCRESBAR_ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'titulo' => 1, 'conten' => 2, 'fecrec' => 3, 'fecent' => 4, 'feccul' => 5, 'puntuacion' => 6, 'ccgerenc_id' => 7, 'ccanalis_id' => 8, 'ccclainf_id' => 9, 'ccsolici_id' => 10, 'ccresbar_id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcinformMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcinformMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcinformPeer::getTableMap();
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
		return str_replace(CcinformPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcinformPeer::ID);

		$criteria->addSelectColumn(CcinformPeer::TITULO);

		$criteria->addSelectColumn(CcinformPeer::CONTEN);

		$criteria->addSelectColumn(CcinformPeer::FECREC);

		$criteria->addSelectColumn(CcinformPeer::FECENT);

		$criteria->addSelectColumn(CcinformPeer::FECCUL);

		$criteria->addSelectColumn(CcinformPeer::PUNTUACION);

		$criteria->addSelectColumn(CcinformPeer::CCGERENC_ID);

		$criteria->addSelectColumn(CcinformPeer::CCANALIS_ID);

		$criteria->addSelectColumn(CcinformPeer::CCCLAINF_ID);

		$criteria->addSelectColumn(CcinformPeer::CCSOLICI_ID);

		$criteria->addSelectColumn(CcinformPeer::CCRESBAR_ID);

	}

	const COUNT = 'COUNT(ccinform.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccinform.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcinformPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcinformPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcinformPeer::doSelectRS($criteria, $con);
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
		$objects = CcinformPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcinformPeer::populateObjects(CcinformPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcinformPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcinformPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcgerencRelatedByCcgerencId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcinformPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcinformPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcinformPeer::CCGERENC_ID, CcgerencPeer::ID);

		$rs = CcinformPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcanalis(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcinformPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcinformPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcinformPeer::CCANALIS_ID, CcanalisPeer::ID);

		$rs = CcinformPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcclainf(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcinformPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcinformPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcinformPeer::CCCLAINF_ID, CcclainfPeer::ID);

		$rs = CcinformPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcsolici(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcinformPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcinformPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcinformPeer::CCSOLICI_ID, CcsoliciPeer::ID);

		$rs = CcinformPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcgerencRelatedByCcresbarId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcinformPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcinformPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcinformPeer::CCRESBAR_ID, CcgerencPeer::ID);

		$rs = CcinformPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcgerencRelatedByCcgerencId(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcinformPeer::addSelectColumns($c);
		$startcol = (CcinformPeer::NUM_COLUMNS - CcinformPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcgerencPeer::addSelectColumns($c);

		$c->addJoin(CcinformPeer::CCGERENC_ID, CcgerencPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcinformPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcgerencPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcgerencRelatedByCcgerencId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcinformRelatedByCcgerencId($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcinformsRelatedByCcgerencId();
				$obj2->addCcinformRelatedByCcgerencId($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcanalis(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcinformPeer::addSelectColumns($c);
		$startcol = (CcinformPeer::NUM_COLUMNS - CcinformPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcanalisPeer::addSelectColumns($c);

		$c->addJoin(CcinformPeer::CCANALIS_ID, CcanalisPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcinformPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcanalisPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcanalis(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcinform($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcinforms();
				$obj2->addCcinform($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcclainf(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcinformPeer::addSelectColumns($c);
		$startcol = (CcinformPeer::NUM_COLUMNS - CcinformPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcclainfPeer::addSelectColumns($c);

		$c->addJoin(CcinformPeer::CCCLAINF_ID, CcclainfPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcinformPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcclainfPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcclainf(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcinform($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcinforms();
				$obj2->addCcinform($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcsolici(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcinformPeer::addSelectColumns($c);
		$startcol = (CcinformPeer::NUM_COLUMNS - CcinformPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcsoliciPeer::addSelectColumns($c);

		$c->addJoin(CcinformPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcinformPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcsoliciPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcsolici(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcinform($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcinforms();
				$obj2->addCcinform($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcgerencRelatedByCcresbarId(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcinformPeer::addSelectColumns($c);
		$startcol = (CcinformPeer::NUM_COLUMNS - CcinformPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcgerencPeer::addSelectColumns($c);

		$c->addJoin(CcinformPeer::CCRESBAR_ID, CcgerencPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcinformPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcgerencPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcgerencRelatedByCcresbarId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcinformRelatedByCcresbarId($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcinformsRelatedByCcresbarId();
				$obj2->addCcinformRelatedByCcresbarId($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcinformPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcinformPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcinformPeer::CCGERENC_ID, CcgerencPeer::ID);
	
			$criteria->addJoin(CcinformPeer::CCANALIS_ID, CcanalisPeer::ID);
	
			$criteria->addJoin(CcinformPeer::CCCLAINF_ID, CcclainfPeer::ID);
	
			$criteria->addJoin(CcinformPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$criteria->addJoin(CcinformPeer::CCRESBAR_ID, CcgerencPeer::ID);
	
		$rs = CcinformPeer::doSelectRS($criteria, $con);
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

		CcinformPeer::addSelectColumns($c);
		$startcol2 = (CcinformPeer::NUM_COLUMNS - CcinformPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcgerencPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcgerencPeer::NUM_COLUMNS;
	
			CcanalisPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcanalisPeer::NUM_COLUMNS;
	
			CcclainfPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcclainfPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcsoliciPeer::NUM_COLUMNS;
	
			CcgerencPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcgerencPeer::NUM_COLUMNS;
	
			$c->addJoin(CcinformPeer::CCGERENC_ID, CcgerencPeer::ID);
	
			$c->addJoin(CcinformPeer::CCANALIS_ID, CcanalisPeer::ID);
	
			$c->addJoin(CcinformPeer::CCCLAINF_ID, CcclainfPeer::ID);
	
			$c->addJoin(CcinformPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CcinformPeer::CCRESBAR_ID, CcgerencPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcinformPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcgerencPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcgerencRelatedByCcgerencId(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcinformRelatedByCcgerencId($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcinformsRelatedByCcgerencId();
					$obj2->addCcinformRelatedByCcgerencId($obj1);
				}
	

							
				$omClass = CcanalisPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcanalis(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcinform($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcinforms();
					$obj3->addCcinform($obj1);
				}
	

							
				$omClass = CcclainfPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcclainf(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcinform($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCcinforms();
					$obj4->addCcinform($obj1);
				}
	

							
				$omClass = CcsoliciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5 = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcsolici(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcinform($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initCcinforms();
					$obj5->addCcinform($obj1);
				}
	

							
				$omClass = CcgerencPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6 = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcgerencRelatedByCcresbarId(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcinformRelatedByCcresbarId($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj6->initCcinformsRelatedByCcresbarId();
					$obj6->addCcinformRelatedByCcresbarId($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCcgerencRelatedByCcgerencId(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcinformPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcinformPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcinformPeer::CCANALIS_ID, CcanalisPeer::ID);
		
				$criteria->addJoin(CcinformPeer::CCCLAINF_ID, CcclainfPeer::ID);
		
				$criteria->addJoin(CcinformPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
			$rs = CcinformPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcanalis(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcinformPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcinformPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcinformPeer::CCGERENC_ID, CcgerencPeer::ID);
		
				$criteria->addJoin(CcinformPeer::CCCLAINF_ID, CcclainfPeer::ID);
		
				$criteria->addJoin(CcinformPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
				$criteria->addJoin(CcinformPeer::CCRESBAR_ID, CcgerencPeer::ID);
		
			$rs = CcinformPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcclainf(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcinformPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcinformPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcinformPeer::CCGERENC_ID, CcgerencPeer::ID);
		
				$criteria->addJoin(CcinformPeer::CCANALIS_ID, CcanalisPeer::ID);
		
				$criteria->addJoin(CcinformPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
				$criteria->addJoin(CcinformPeer::CCRESBAR_ID, CcgerencPeer::ID);
		
			$rs = CcinformPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcsolici(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcinformPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcinformPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcinformPeer::CCGERENC_ID, CcgerencPeer::ID);
		
				$criteria->addJoin(CcinformPeer::CCANALIS_ID, CcanalisPeer::ID);
		
				$criteria->addJoin(CcinformPeer::CCCLAINF_ID, CcclainfPeer::ID);
		
				$criteria->addJoin(CcinformPeer::CCRESBAR_ID, CcgerencPeer::ID);
		
			$rs = CcinformPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcgerencRelatedByCcresbarId(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcinformPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcinformPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcinformPeer::CCANALIS_ID, CcanalisPeer::ID);
		
				$criteria->addJoin(CcinformPeer::CCCLAINF_ID, CcclainfPeer::ID);
		
				$criteria->addJoin(CcinformPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
			$rs = CcinformPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCcgerencRelatedByCcgerencId(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcinformPeer::addSelectColumns($c);
		$startcol2 = (CcinformPeer::NUM_COLUMNS - CcinformPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcanalisPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcanalisPeer::NUM_COLUMNS;
	
			CcclainfPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcclainfPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcsoliciPeer::NUM_COLUMNS;
	
			$c->addJoin(CcinformPeer::CCANALIS_ID, CcanalisPeer::ID);
	
			$c->addJoin(CcinformPeer::CCCLAINF_ID, CcclainfPeer::ID);
	
			$c->addJoin(CcinformPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcinformPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcanalisPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcanalis(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcinform($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcinforms();
					$obj2->addCcinform($obj1);
				}
	
				$omClass = CcclainfPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcclainf(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcinform($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcinforms();
					$obj3->addCcinform($obj1);
				}
	
				$omClass = CcsoliciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcsolici(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcinform($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcinforms();
					$obj4->addCcinform($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcanalis(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcinformPeer::addSelectColumns($c);
		$startcol2 = (CcinformPeer::NUM_COLUMNS - CcinformPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcgerencPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcgerencPeer::NUM_COLUMNS;
	
			CcclainfPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcclainfPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcsoliciPeer::NUM_COLUMNS;
	
			CcgerencPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcgerencPeer::NUM_COLUMNS;
	
			$c->addJoin(CcinformPeer::CCGERENC_ID, CcgerencPeer::ID);
	
			$c->addJoin(CcinformPeer::CCCLAINF_ID, CcclainfPeer::ID);
	
			$c->addJoin(CcinformPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CcinformPeer::CCRESBAR_ID, CcgerencPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcinformPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcgerencPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcgerencRelatedByCcgerencId(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcinformRelatedByCcgerencId($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcinformsRelatedByCcgerencId();
					$obj2->addCcinformRelatedByCcgerencId($obj1);
				}
	
				$omClass = CcclainfPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcclainf(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcinform($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcinforms();
					$obj3->addCcinform($obj1);
				}
	
				$omClass = CcsoliciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcsolici(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcinform($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcinforms();
					$obj4->addCcinform($obj1);
				}
	
				$omClass = CcgerencPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcgerencRelatedByCcresbarId(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcinformRelatedByCcresbarId($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcinformsRelatedByCcresbarId();
					$obj5->addCcinformRelatedByCcresbarId($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcclainf(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcinformPeer::addSelectColumns($c);
		$startcol2 = (CcinformPeer::NUM_COLUMNS - CcinformPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcgerencPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcgerencPeer::NUM_COLUMNS;
	
			CcanalisPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcanalisPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcsoliciPeer::NUM_COLUMNS;
	
			CcgerencPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcgerencPeer::NUM_COLUMNS;
	
			$c->addJoin(CcinformPeer::CCGERENC_ID, CcgerencPeer::ID);
	
			$c->addJoin(CcinformPeer::CCANALIS_ID, CcanalisPeer::ID);
	
			$c->addJoin(CcinformPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
			$c->addJoin(CcinformPeer::CCRESBAR_ID, CcgerencPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcinformPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcgerencPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcgerencRelatedByCcgerencId(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcinformRelatedByCcgerencId($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcinformsRelatedByCcgerencId();
					$obj2->addCcinformRelatedByCcgerencId($obj1);
				}
	
				$omClass = CcanalisPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcanalis(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcinform($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcinforms();
					$obj3->addCcinform($obj1);
				}
	
				$omClass = CcsoliciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcsolici(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcinform($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcinforms();
					$obj4->addCcinform($obj1);
				}
	
				$omClass = CcgerencPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcgerencRelatedByCcresbarId(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcinformRelatedByCcresbarId($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcinformsRelatedByCcresbarId();
					$obj5->addCcinformRelatedByCcresbarId($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcsolici(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcinformPeer::addSelectColumns($c);
		$startcol2 = (CcinformPeer::NUM_COLUMNS - CcinformPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcgerencPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcgerencPeer::NUM_COLUMNS;
	
			CcanalisPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcanalisPeer::NUM_COLUMNS;
	
			CcclainfPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcclainfPeer::NUM_COLUMNS;
	
			CcgerencPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcgerencPeer::NUM_COLUMNS;
	
			$c->addJoin(CcinformPeer::CCGERENC_ID, CcgerencPeer::ID);
	
			$c->addJoin(CcinformPeer::CCANALIS_ID, CcanalisPeer::ID);
	
			$c->addJoin(CcinformPeer::CCCLAINF_ID, CcclainfPeer::ID);
	
			$c->addJoin(CcinformPeer::CCRESBAR_ID, CcgerencPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcinformPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcgerencPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcgerencRelatedByCcgerencId(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcinformRelatedByCcgerencId($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcinformsRelatedByCcgerencId();
					$obj2->addCcinformRelatedByCcgerencId($obj1);
				}
	
				$omClass = CcanalisPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcanalis(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcinform($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcinforms();
					$obj3->addCcinform($obj1);
				}
	
				$omClass = CcclainfPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcclainf(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcinform($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcinforms();
					$obj4->addCcinform($obj1);
				}
	
				$omClass = CcgerencPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcgerencRelatedByCcresbarId(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcinformRelatedByCcresbarId($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcinformsRelatedByCcresbarId();
					$obj5->addCcinformRelatedByCcresbarId($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcgerencRelatedByCcresbarId(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcinformPeer::addSelectColumns($c);
		$startcol2 = (CcinformPeer::NUM_COLUMNS - CcinformPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcanalisPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcanalisPeer::NUM_COLUMNS;
	
			CcclainfPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcclainfPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcsoliciPeer::NUM_COLUMNS;
	
			$c->addJoin(CcinformPeer::CCANALIS_ID, CcanalisPeer::ID);
	
			$c->addJoin(CcinformPeer::CCCLAINF_ID, CcclainfPeer::ID);
	
			$c->addJoin(CcinformPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcinformPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcanalisPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcanalis(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcinform($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcinforms();
					$obj2->addCcinform($obj1);
				}
	
				$omClass = CcclainfPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcclainf(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcinform($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcinforms();
					$obj3->addCcinform($obj1);
				}
	
				$omClass = CcsoliciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcsolici(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcinform($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcinforms();
					$obj4->addCcinform($obj1);
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
		return CcinformPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcinformPeer::ID); 

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
			$comparison = $criteria->getComparison(CcinformPeer::ID);
			$selectCriteria->add(CcinformPeer::ID, $criteria->remove(CcinformPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcinformPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcinformPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccinform) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcinformPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccinform $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcinformPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcinformPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcinformPeer::DATABASE_NAME, CcinformPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcinformPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcinformPeer::DATABASE_NAME);

		$criteria->add(CcinformPeer::ID, $pk);


		$v = CcinformPeer::doSelect($criteria, $con);

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
			$criteria->add(CcinformPeer::ID, $pks, Criteria::IN);
			$objs = CcinformPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcinformPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcinformMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcinformMapBuilder');
}
