<?php


abstract class BaseCccreregPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cccrereg';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Cccrereg';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'cccrereg.ID';

	
	const FECENT = 'cccrereg.FECENT';

	
	const FECSAL = 'cccrereg.FECSAL';

	
	const OBSERV = 'cccrereg.OBSERV';

	
	const FECPROTOC = 'cccrereg.FECPROTOC';

	
	const NUMERO = 'cccrereg.NUMERO';

	
	const TOMO = 'cccrereg.TOMO';

	
	const PROTOC = 'cccrereg.PROTOC';

	
	const FOLIO = 'cccrereg.FOLIO';

	
	const TRIMES = 'cccrereg.TRIMES';

	
	const ANNO = 'cccrereg.ANNO';

	
	const CCCREDIT_ID = 'cccrereg.CCCREDIT_ID';

	
	const CCREGNOT_ID = 'cccrereg.CCREGNOT_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Fecent', 'Fecsal', 'Observ', 'Fecprotoc', 'Numero', 'Tomo', 'Protoc', 'Folio', 'Trimes', 'Anno', 'CccreditId', 'CcregnotId', ),
		BasePeer::TYPE_COLNAME => array (CccreregPeer::ID, CccreregPeer::FECENT, CccreregPeer::FECSAL, CccreregPeer::OBSERV, CccreregPeer::FECPROTOC, CccreregPeer::NUMERO, CccreregPeer::TOMO, CccreregPeer::PROTOC, CccreregPeer::FOLIO, CccreregPeer::TRIMES, CccreregPeer::ANNO, CccreregPeer::CCCREDIT_ID, CccreregPeer::CCREGNOT_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'fecent', 'fecsal', 'observ', 'fecprotoc', 'numero', 'tomo', 'protoc', 'folio', 'trimes', 'anno', 'cccredit_id', 'ccregnot_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Fecent' => 1, 'Fecsal' => 2, 'Observ' => 3, 'Fecprotoc' => 4, 'Numero' => 5, 'Tomo' => 6, 'Protoc' => 7, 'Folio' => 8, 'Trimes' => 9, 'Anno' => 10, 'CccreditId' => 11, 'CcregnotId' => 12, ),
		BasePeer::TYPE_COLNAME => array (CccreregPeer::ID => 0, CccreregPeer::FECENT => 1, CccreregPeer::FECSAL => 2, CccreregPeer::OBSERV => 3, CccreregPeer::FECPROTOC => 4, CccreregPeer::NUMERO => 5, CccreregPeer::TOMO => 6, CccreregPeer::PROTOC => 7, CccreregPeer::FOLIO => 8, CccreregPeer::TRIMES => 9, CccreregPeer::ANNO => 10, CccreregPeer::CCCREDIT_ID => 11, CccreregPeer::CCREGNOT_ID => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fecent' => 1, 'fecsal' => 2, 'observ' => 3, 'fecprotoc' => 4, 'numero' => 5, 'tomo' => 6, 'protoc' => 7, 'folio' => 8, 'trimes' => 9, 'anno' => 10, 'cccredit_id' => 11, 'ccregnot_id' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CccreregMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CccreregMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CccreregPeer::getTableMap();
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
		return str_replace(CccreregPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CccreregPeer::ID);

		$criteria->addSelectColumn(CccreregPeer::FECENT);

		$criteria->addSelectColumn(CccreregPeer::FECSAL);

		$criteria->addSelectColumn(CccreregPeer::OBSERV);

		$criteria->addSelectColumn(CccreregPeer::FECPROTOC);

		$criteria->addSelectColumn(CccreregPeer::NUMERO);

		$criteria->addSelectColumn(CccreregPeer::TOMO);

		$criteria->addSelectColumn(CccreregPeer::PROTOC);

		$criteria->addSelectColumn(CccreregPeer::FOLIO);

		$criteria->addSelectColumn(CccreregPeer::TRIMES);

		$criteria->addSelectColumn(CccreregPeer::ANNO);

		$criteria->addSelectColumn(CccreregPeer::CCCREDIT_ID);

		$criteria->addSelectColumn(CccreregPeer::CCREGNOT_ID);

	}

	const COUNT = 'COUNT(cccrereg.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cccrereg.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CccreregPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CccreregPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CccreregPeer::doSelectRS($criteria, $con);
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
		$objects = CccreregPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CccreregPeer::populateObjects(CccreregPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CccreregPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CccreregPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCccredit(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CccreregPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CccreregPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CccreregPeer::CCCREDIT_ID, CccreditPeer::ID);

		$rs = CccreregPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcregnot(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CccreregPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CccreregPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CccreregPeer::CCREGNOT_ID, CcregnotPeer::ID);

		$rs = CccreregPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCccredit(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CccreregPeer::addSelectColumns($c);
		$startcol = (CccreregPeer::NUM_COLUMNS - CccreregPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CccreditPeer::addSelectColumns($c);

		$c->addJoin(CccreregPeer::CCCREDIT_ID, CccreditPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccreregPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CccreditPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCccredit(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCccrereg($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCccreregs();
				$obj2->addCccrereg($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcregnot(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CccreregPeer::addSelectColumns($c);
		$startcol = (CccreregPeer::NUM_COLUMNS - CccreregPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcregnotPeer::addSelectColumns($c);

		$c->addJoin(CccreregPeer::CCREGNOT_ID, CcregnotPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccreregPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcregnotPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcregnot(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCccrereg($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCccreregs();
				$obj2->addCccrereg($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CccreregPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CccreregPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CccreregPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$criteria->addJoin(CccreregPeer::CCREGNOT_ID, CcregnotPeer::ID);
	
		$rs = CccreregPeer::doSelectRS($criteria, $con);
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

		CccreregPeer::addSelectColumns($c);
		$startcol2 = (CccreregPeer::NUM_COLUMNS - CccreregPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CccreditPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CccreditPeer::NUM_COLUMNS;
	
			CcregnotPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcregnotPeer::NUM_COLUMNS;
	
			$c->addJoin(CccreregPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CccreregPeer::CCREGNOT_ID, CcregnotPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccreregPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCccredit(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCccrereg($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCccreregs();
					$obj2->addCccrereg($obj1);
				}
	

							
				$omClass = CcregnotPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCcregnot(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCccrereg($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCccreregs();
					$obj3->addCccrereg($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCccredit(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CccreregPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CccreregPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CccreregPeer::CCREGNOT_ID, CcregnotPeer::ID);
		
			$rs = CccreregPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcregnot(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CccreregPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CccreregPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CccreregPeer::CCCREDIT_ID, CccreditPeer::ID);
		
			$rs = CccreregPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCccredit(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CccreregPeer::addSelectColumns($c);
		$startcol2 = (CccreregPeer::NUM_COLUMNS - CccreregPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcregnotPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcregnotPeer::NUM_COLUMNS;
	
			$c->addJoin(CccreregPeer::CCREGNOT_ID, CcregnotPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccreregPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcregnotPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcregnot(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCccrereg($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCccreregs();
					$obj2->addCccrereg($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcregnot(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CccreregPeer::addSelectColumns($c);
		$startcol2 = (CccreregPeer::NUM_COLUMNS - CccreregPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CccreditPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CccreditPeer::NUM_COLUMNS;
	
			$c->addJoin(CccreregPeer::CCCREDIT_ID, CccreditPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CccreregPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCccredit(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCccrereg($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCccreregs();
					$obj2->addCccrereg($obj1);
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
		return CccreregPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CccreregPeer::ID); 

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
			$comparison = $criteria->getComparison(CccreregPeer::ID);
			$selectCriteria->add(CccreregPeer::ID, $criteria->remove(CccreregPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CccreregPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CccreregPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cccrereg) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CccreregPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cccrereg $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CccreregPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CccreregPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CccreregPeer::DATABASE_NAME, CccreregPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CccreregPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CccreregPeer::DATABASE_NAME);

		$criteria->add(CccreregPeer::ID, $pk);


		$v = CccreregPeer::doSelect($criteria, $con);

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
			$criteria->add(CccreregPeer::ID, $pks, Criteria::IN);
			$objs = CccreregPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCccreregPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CccreregMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CccreregMapBuilder');
}
