<?php


abstract class BaseCcproyecPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccproyec';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccproyec';

	
	const NUM_COLUMNS = 22;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccproyec.ID';

	
	const NOMPRO = 'ccproyec.NOMPRO';

	
	const RESPRO = 'ccproyec.RESPRO';

	
	const EMPDIRGEN = 'ccproyec.EMPDIRGEN';

	
	const EMPINDGEN = 'ccproyec.EMPINDGEN';

	
	const AREGEO = 'ccproyec.AREGEO';

	
	const MONAPO = 'ccproyec.MONAPO';

	
	const DESACTECO = 'ccproyec.DESACTECO';

	
	const INTROD = 'ccproyec.INTROD';

	
	const RESUME = 'ccproyec.RESUME';

	
	const ESTMER = 'ccproyec.ESTMER';

	
	const TAMLOC = 'ccproyec.TAMLOC';

	
	const INGPRO = 'ccproyec.INGPRO';

	
	const APOSOC = 'ccproyec.APOSOC';

	
	const INVFIN = 'ccproyec.INVFIN';

	
	const PROFIN = 'ccproyec.PROFIN';

	
	const ANAFIN = 'ccproyec.ANAFIN';

	
	const ANEXOS = 'ccproyec.ANEXOS';

	
	const RECOME = 'ccproyec.RECOME';

	
	const OBSERV = 'ccproyec.OBSERV';

	
	const CCACTECO_ID = 'ccproyec.CCACTECO_ID';

	
	const CCSOLICI_ID = 'ccproyec.CCSOLICI_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Nompro', 'Respro', 'Empdirgen', 'Empindgen', 'Aregeo', 'Monapo', 'Desacteco', 'Introd', 'Resume', 'Estmer', 'Tamloc', 'Ingpro', 'Aposoc', 'Invfin', 'Profin', 'Anafin', 'Anexos', 'Recome', 'Observ', 'CcactecoId', 'CcsoliciId', ),
		BasePeer::TYPE_COLNAME => array (CcproyecPeer::ID, CcproyecPeer::NOMPRO, CcproyecPeer::RESPRO, CcproyecPeer::EMPDIRGEN, CcproyecPeer::EMPINDGEN, CcproyecPeer::AREGEO, CcproyecPeer::MONAPO, CcproyecPeer::DESACTECO, CcproyecPeer::INTROD, CcproyecPeer::RESUME, CcproyecPeer::ESTMER, CcproyecPeer::TAMLOC, CcproyecPeer::INGPRO, CcproyecPeer::APOSOC, CcproyecPeer::INVFIN, CcproyecPeer::PROFIN, CcproyecPeer::ANAFIN, CcproyecPeer::ANEXOS, CcproyecPeer::RECOME, CcproyecPeer::OBSERV, CcproyecPeer::CCACTECO_ID, CcproyecPeer::CCSOLICI_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'nompro', 'respro', 'empdirgen', 'empindgen', 'aregeo', 'monapo', 'desacteco', 'introd', 'resume', 'estmer', 'tamloc', 'ingpro', 'aposoc', 'invfin', 'profin', 'anafin', 'anexos', 'recome', 'observ', 'ccacteco_id', 'ccsolici_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Nompro' => 1, 'Respro' => 2, 'Empdirgen' => 3, 'Empindgen' => 4, 'Aregeo' => 5, 'Monapo' => 6, 'Desacteco' => 7, 'Introd' => 8, 'Resume' => 9, 'Estmer' => 10, 'Tamloc' => 11, 'Ingpro' => 12, 'Aposoc' => 13, 'Invfin' => 14, 'Profin' => 15, 'Anafin' => 16, 'Anexos' => 17, 'Recome' => 18, 'Observ' => 19, 'CcactecoId' => 20, 'CcsoliciId' => 21, ),
		BasePeer::TYPE_COLNAME => array (CcproyecPeer::ID => 0, CcproyecPeer::NOMPRO => 1, CcproyecPeer::RESPRO => 2, CcproyecPeer::EMPDIRGEN => 3, CcproyecPeer::EMPINDGEN => 4, CcproyecPeer::AREGEO => 5, CcproyecPeer::MONAPO => 6, CcproyecPeer::DESACTECO => 7, CcproyecPeer::INTROD => 8, CcproyecPeer::RESUME => 9, CcproyecPeer::ESTMER => 10, CcproyecPeer::TAMLOC => 11, CcproyecPeer::INGPRO => 12, CcproyecPeer::APOSOC => 13, CcproyecPeer::INVFIN => 14, CcproyecPeer::PROFIN => 15, CcproyecPeer::ANAFIN => 16, CcproyecPeer::ANEXOS => 17, CcproyecPeer::RECOME => 18, CcproyecPeer::OBSERV => 19, CcproyecPeer::CCACTECO_ID => 20, CcproyecPeer::CCSOLICI_ID => 21, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'nompro' => 1, 'respro' => 2, 'empdirgen' => 3, 'empindgen' => 4, 'aregeo' => 5, 'monapo' => 6, 'desacteco' => 7, 'introd' => 8, 'resume' => 9, 'estmer' => 10, 'tamloc' => 11, 'ingpro' => 12, 'aposoc' => 13, 'invfin' => 14, 'profin' => 15, 'anafin' => 16, 'anexos' => 17, 'recome' => 18, 'observ' => 19, 'ccacteco_id' => 20, 'ccsolici_id' => 21, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcproyecMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcproyecMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcproyecPeer::getTableMap();
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
		return str_replace(CcproyecPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcproyecPeer::ID);

		$criteria->addSelectColumn(CcproyecPeer::NOMPRO);

		$criteria->addSelectColumn(CcproyecPeer::RESPRO);

		$criteria->addSelectColumn(CcproyecPeer::EMPDIRGEN);

		$criteria->addSelectColumn(CcproyecPeer::EMPINDGEN);

		$criteria->addSelectColumn(CcproyecPeer::AREGEO);

		$criteria->addSelectColumn(CcproyecPeer::MONAPO);

		$criteria->addSelectColumn(CcproyecPeer::DESACTECO);

		$criteria->addSelectColumn(CcproyecPeer::INTROD);

		$criteria->addSelectColumn(CcproyecPeer::RESUME);

		$criteria->addSelectColumn(CcproyecPeer::ESTMER);

		$criteria->addSelectColumn(CcproyecPeer::TAMLOC);

		$criteria->addSelectColumn(CcproyecPeer::INGPRO);

		$criteria->addSelectColumn(CcproyecPeer::APOSOC);

		$criteria->addSelectColumn(CcproyecPeer::INVFIN);

		$criteria->addSelectColumn(CcproyecPeer::PROFIN);

		$criteria->addSelectColumn(CcproyecPeer::ANAFIN);

		$criteria->addSelectColumn(CcproyecPeer::ANEXOS);

		$criteria->addSelectColumn(CcproyecPeer::RECOME);

		$criteria->addSelectColumn(CcproyecPeer::OBSERV);

		$criteria->addSelectColumn(CcproyecPeer::CCACTECO_ID);

		$criteria->addSelectColumn(CcproyecPeer::CCSOLICI_ID);

	}

	const COUNT = 'COUNT(ccproyec.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccproyec.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcproyecPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcproyecPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcproyecPeer::doSelectRS($criteria, $con);
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
		$objects = CcproyecPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcproyecPeer::populateObjects(CcproyecPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcproyecPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcproyecPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcacteco(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcproyecPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcproyecPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcproyecPeer::CCACTECO_ID, CcactecoPeer::ID);

		$rs = CcproyecPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcproyecPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcproyecPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcproyecPeer::CCSOLICI_ID, CcsoliciPeer::ID);

		$rs = CcproyecPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcacteco(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcproyecPeer::addSelectColumns($c);
		$startcol = (CcproyecPeer::NUM_COLUMNS - CcproyecPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcactecoPeer::addSelectColumns($c);

		$c->addJoin(CcproyecPeer::CCACTECO_ID, CcactecoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcproyecPeer::getOMClass();

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
										$temp_obj2->addCcproyec($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcproyecs();
				$obj2->addCcproyec($obj1); 			}
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

		CcproyecPeer::addSelectColumns($c);
		$startcol = (CcproyecPeer::NUM_COLUMNS - CcproyecPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcsoliciPeer::addSelectColumns($c);

		$c->addJoin(CcproyecPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcproyecPeer::getOMClass();

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
										$temp_obj2->addCcproyec($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcproyecs();
				$obj2->addCcproyec($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcproyecPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcproyecPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcproyecPeer::CCACTECO_ID, CcactecoPeer::ID);
	
			$criteria->addJoin(CcproyecPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
		$rs = CcproyecPeer::doSelectRS($criteria, $con);
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

		CcproyecPeer::addSelectColumns($c);
		$startcol2 = (CcproyecPeer::NUM_COLUMNS - CcproyecPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcactecoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcactecoPeer::NUM_COLUMNS;
	
			CcsoliciPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcsoliciPeer::NUM_COLUMNS;
	
			$c->addJoin(CcproyecPeer::CCACTECO_ID, CcactecoPeer::ID);
	
			$c->addJoin(CcproyecPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcproyecPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcactecoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcacteco(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcproyec($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcproyecs();
					$obj2->addCcproyec($obj1);
				}
	

							
				$omClass = CcsoliciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcsolici(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcproyec($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcproyecs();
					$obj3->addCcproyec($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCcacteco(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcproyecPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcproyecPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcproyecPeer::CCSOLICI_ID, CcsoliciPeer::ID);
		
			$rs = CcproyecPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcproyecPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcproyecPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcproyecPeer::CCACTECO_ID, CcactecoPeer::ID);
		
			$rs = CcproyecPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCcacteco(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcproyecPeer::addSelectColumns($c);
		$startcol2 = (CcproyecPeer::NUM_COLUMNS - CcproyecPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcsoliciPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcsoliciPeer::NUM_COLUMNS;
	
			$c->addJoin(CcproyecPeer::CCSOLICI_ID, CcsoliciPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcproyecPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcsoliciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcsolici(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcproyec($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcproyecs();
					$obj2->addCcproyec($obj1);
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

		CcproyecPeer::addSelectColumns($c);
		$startcol2 = (CcproyecPeer::NUM_COLUMNS - CcproyecPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcactecoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcactecoPeer::NUM_COLUMNS;
	
			$c->addJoin(CcproyecPeer::CCACTECO_ID, CcactecoPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcproyecPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcactecoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcacteco(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcproyec($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcproyecs();
					$obj2->addCcproyec($obj1);
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
		return CcproyecPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcproyecPeer::ID); 

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
			$comparison = $criteria->getComparison(CcproyecPeer::ID);
			$selectCriteria->add(CcproyecPeer::ID, $criteria->remove(CcproyecPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcproyecPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcproyecPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccproyec) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcproyecPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccproyec $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcproyecPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcproyecPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcproyecPeer::DATABASE_NAME, CcproyecPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcproyecPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcproyecPeer::DATABASE_NAME);

		$criteria->add(CcproyecPeer::ID, $pk);


		$v = CcproyecPeer::doSelect($criteria, $con);

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
			$criteria->add(CcproyecPeer::ID, $pks, Criteria::IN);
			$objs = CcproyecPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcproyecPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcproyecMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcproyecMapBuilder');
}
