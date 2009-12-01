<?php


abstract class BaseCpmovadiPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cpmovadi';

	
	const CLASS_DEFAULT = 'lib.model.presupuesto.Cpmovadi';

	
	const NUM_COLUMNS = 6;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFADI = 'cpmovadi.REFADI';

	
	const CODPRE = 'cpmovadi.CODPRE';

	
	const PERPRE = 'cpmovadi.PERPRE';

	
	const MONMOV = 'cpmovadi.MONMOV';

	
	const STAMOV = 'cpmovadi.STAMOV';

	
	const ID = 'cpmovadi.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refadi', 'Codpre', 'Perpre', 'Monmov', 'Stamov', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CpmovadiPeer::REFADI, CpmovadiPeer::CODPRE, CpmovadiPeer::PERPRE, CpmovadiPeer::MONMOV, CpmovadiPeer::STAMOV, CpmovadiPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refadi', 'codpre', 'perpre', 'monmov', 'stamov', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refadi' => 0, 'Codpre' => 1, 'Perpre' => 2, 'Monmov' => 3, 'Stamov' => 4, 'Id' => 5, ),
		BasePeer::TYPE_COLNAME => array (CpmovadiPeer::REFADI => 0, CpmovadiPeer::CODPRE => 1, CpmovadiPeer::PERPRE => 2, CpmovadiPeer::MONMOV => 3, CpmovadiPeer::STAMOV => 4, CpmovadiPeer::ID => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('refadi' => 0, 'codpre' => 1, 'perpre' => 2, 'monmov' => 3, 'stamov' => 4, 'id' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/presupuesto/map/CpmovadiMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.presupuesto.map.CpmovadiMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CpmovadiPeer::getTableMap();
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
		return str_replace(CpmovadiPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CpmovadiPeer::REFADI);

		$criteria->addSelectColumn(CpmovadiPeer::CODPRE);

		$criteria->addSelectColumn(CpmovadiPeer::PERPRE);

		$criteria->addSelectColumn(CpmovadiPeer::MONMOV);

		$criteria->addSelectColumn(CpmovadiPeer::STAMOV);

		$criteria->addSelectColumn(CpmovadiPeer::ID);

	}

	const COUNT = 'COUNT(cpmovadi.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cpmovadi.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpmovadiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpmovadiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CpmovadiPeer::doSelectRS($criteria, $con);
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
		$objects = CpmovadiPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CpmovadiPeer::populateObjects(CpmovadiPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CpmovadiPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CpmovadiPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCpadidis(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpmovadiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpmovadiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CpmovadiPeer::REFADI, CpadidisPeer::REFADI);

		$rs = CpmovadiPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCpdeftit(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpmovadiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpmovadiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CpmovadiPeer::CODPRE, CpdeftitPeer::CODPRE);

		$rs = CpmovadiPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCpadidis(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpmovadiPeer::addSelectColumns($c);
		$startcol = (CpmovadiPeer::NUM_COLUMNS - CpmovadiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CpadidisPeer::addSelectColumns($c);

		$c->addJoin(CpmovadiPeer::REFADI, CpadidisPeer::REFADI);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpmovadiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CpadidisPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCpadidis(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCpmovadi($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCpmovadis();
				$obj2->addCpmovadi($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCpdeftit(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpmovadiPeer::addSelectColumns($c);
		$startcol = (CpmovadiPeer::NUM_COLUMNS - CpmovadiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CpdeftitPeer::addSelectColumns($c);

		$c->addJoin(CpmovadiPeer::CODPRE, CpdeftitPeer::CODPRE);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpmovadiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CpdeftitPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCpdeftit(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCpmovadi($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCpmovadis();
				$obj2->addCpmovadi($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpmovadiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpmovadiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CpmovadiPeer::REFADI, CpadidisPeer::REFADI);
	
			$criteria->addJoin(CpmovadiPeer::CODPRE, CpdeftitPeer::CODPRE);
	
		$rs = CpmovadiPeer::doSelectRS($criteria, $con);
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

		CpmovadiPeer::addSelectColumns($c);
		$startcol2 = (CpmovadiPeer::NUM_COLUMNS - CpmovadiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CpadidisPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CpadidisPeer::NUM_COLUMNS;
	
			CpdeftitPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CpdeftitPeer::NUM_COLUMNS;
	
			$c->addJoin(CpmovadiPeer::REFADI, CpadidisPeer::REFADI);
	
			$c->addJoin(CpmovadiPeer::CODPRE, CpdeftitPeer::CODPRE);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpmovadiPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CpadidisPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCpadidis(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCpmovadi($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCpmovadis();
					$obj2->addCpmovadi($obj1);
				}
	

							
				$omClass = CpdeftitPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCpdeftit(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCpmovadi($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCpmovadis();
					$obj3->addCpmovadi($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCpadidis(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CpmovadiPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CpmovadiPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CpmovadiPeer::CODPRE, CpdeftitPeer::CODPRE);
		
			$rs = CpmovadiPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCpdeftit(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CpmovadiPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CpmovadiPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CpmovadiPeer::REFADI, CpadidisPeer::REFADI);
		
			$rs = CpmovadiPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCpadidis(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpmovadiPeer::addSelectColumns($c);
		$startcol2 = (CpmovadiPeer::NUM_COLUMNS - CpmovadiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CpdeftitPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CpdeftitPeer::NUM_COLUMNS;
	
			$c->addJoin(CpmovadiPeer::CODPRE, CpdeftitPeer::CODPRE);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpmovadiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CpdeftitPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCpdeftit(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCpmovadi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCpmovadis();
					$obj2->addCpmovadi($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCpdeftit(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpmovadiPeer::addSelectColumns($c);
		$startcol2 = (CpmovadiPeer::NUM_COLUMNS - CpmovadiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CpadidisPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CpadidisPeer::NUM_COLUMNS;
	
			$c->addJoin(CpmovadiPeer::REFADI, CpadidisPeer::REFADI);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpmovadiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CpadidisPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCpadidis(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCpmovadi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCpmovadis();
					$obj2->addCpmovadi($obj1);
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
		return CpmovadiPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CpmovadiPeer::ID); 

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
			$comparison = $criteria->getComparison(CpmovadiPeer::ID);
			$selectCriteria->add(CpmovadiPeer::ID, $criteria->remove(CpmovadiPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CpmovadiPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CpmovadiPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cpmovadi) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CpmovadiPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cpmovadi $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CpmovadiPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CpmovadiPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CpmovadiPeer::DATABASE_NAME, CpmovadiPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CpmovadiPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CpmovadiPeer::DATABASE_NAME);

		$criteria->add(CpmovadiPeer::ID, $pk);


		$v = CpmovadiPeer::doSelect($criteria, $con);

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
			$criteria->add(CpmovadiPeer::ID, $pks, Criteria::IN);
			$objs = CpmovadiPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCpmovadiPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/presupuesto/map/CpmovadiMapBuilder.php';
	Propel::registerMapBuilder('lib.model.presupuesto.map.CpmovadiMapBuilder');
}
