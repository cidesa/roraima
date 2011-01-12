<?php


abstract class BaseCcrevisiPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccrevisi';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccrevisi';

	
	const NUM_COLUMNS = 6;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccrevisi.ID';

	
	const COMENT = 'ccrevisi.COMENT';

	
	const ESTATU = 'ccrevisi.ESTATU';

	
	const FECHA = 'ccrevisi.FECHA';

	
	const CCINFORM_ID = 'ccrevisi.CCINFORM_ID';

	
	const CCANALIS_ID = 'ccrevisi.CCANALIS_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Coment', 'Estatu', 'Fecha', 'CcinformId', 'CcanalisId', ),
		BasePeer::TYPE_COLNAME => array (CcrevisiPeer::ID, CcrevisiPeer::COMENT, CcrevisiPeer::ESTATU, CcrevisiPeer::FECHA, CcrevisiPeer::CCINFORM_ID, CcrevisiPeer::CCANALIS_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'coment', 'estatu', 'fecha', 'ccinform_id', 'ccanalis_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Coment' => 1, 'Estatu' => 2, 'Fecha' => 3, 'CcinformId' => 4, 'CcanalisId' => 5, ),
		BasePeer::TYPE_COLNAME => array (CcrevisiPeer::ID => 0, CcrevisiPeer::COMENT => 1, CcrevisiPeer::ESTATU => 2, CcrevisiPeer::FECHA => 3, CcrevisiPeer::CCINFORM_ID => 4, CcrevisiPeer::CCANALIS_ID => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'coment' => 1, 'estatu' => 2, 'fecha' => 3, 'ccinform_id' => 4, 'ccanalis_id' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcrevisiMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcrevisiMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcrevisiPeer::getTableMap();
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
		return str_replace(CcrevisiPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcrevisiPeer::ID);

		$criteria->addSelectColumn(CcrevisiPeer::COMENT);

		$criteria->addSelectColumn(CcrevisiPeer::ESTATU);

		$criteria->addSelectColumn(CcrevisiPeer::FECHA);

		$criteria->addSelectColumn(CcrevisiPeer::CCINFORM_ID);

		$criteria->addSelectColumn(CcrevisiPeer::CCANALIS_ID);

	}

	const COUNT = 'COUNT(ccrevisi.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccrevisi.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcrevisiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcrevisiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcrevisiPeer::doSelectRS($criteria, $con);
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
		$objects = CcrevisiPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcrevisiPeer::populateObjects(CcrevisiPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcrevisiPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcrevisiPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcinform(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcrevisiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcrevisiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcrevisiPeer::CCINFORM_ID, CcinformPeer::ID);

		$rs = CcrevisiPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CcrevisiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcrevisiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcrevisiPeer::CCANALIS_ID, CcanalisPeer::ID);

		$rs = CcrevisiPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcinform(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcrevisiPeer::addSelectColumns($c);
		$startcol = (CcrevisiPeer::NUM_COLUMNS - CcrevisiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcinformPeer::addSelectColumns($c);

		$c->addJoin(CcrevisiPeer::CCINFORM_ID, CcinformPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcrevisiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcinformPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcinform(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcrevisi($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcrevisis();
				$obj2->addCcrevisi($obj1); 			}
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

		CcrevisiPeer::addSelectColumns($c);
		$startcol = (CcrevisiPeer::NUM_COLUMNS - CcrevisiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcanalisPeer::addSelectColumns($c);

		$c->addJoin(CcrevisiPeer::CCANALIS_ID, CcanalisPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcrevisiPeer::getOMClass();

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
										$temp_obj2->addCcrevisi($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcrevisis();
				$obj2->addCcrevisi($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcrevisiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcrevisiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcrevisiPeer::CCINFORM_ID, CcinformPeer::ID);
	
			$criteria->addJoin(CcrevisiPeer::CCANALIS_ID, CcanalisPeer::ID);
	
		$rs = CcrevisiPeer::doSelectRS($criteria, $con);
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

		CcrevisiPeer::addSelectColumns($c);
		$startcol2 = (CcrevisiPeer::NUM_COLUMNS - CcrevisiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcinformPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcinformPeer::NUM_COLUMNS;
	
			CcanalisPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CcanalisPeer::NUM_COLUMNS;
	
			$c->addJoin(CcrevisiPeer::CCINFORM_ID, CcinformPeer::ID);
	
			$c->addJoin(CcrevisiPeer::CCANALIS_ID, CcanalisPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcrevisiPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcinformPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcinform(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcrevisi($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcrevisis();
					$obj2->addCcrevisi($obj1);
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
						$temp_obj3->addCcrevisi($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcrevisis();
					$obj3->addCcrevisi($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCcinform(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcrevisiPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcrevisiPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcrevisiPeer::CCANALIS_ID, CcanalisPeer::ID);
		
			$rs = CcrevisiPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CcrevisiPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcrevisiPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcrevisiPeer::CCINFORM_ID, CcinformPeer::ID);
		
			$rs = CcrevisiPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCcinform(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcrevisiPeer::addSelectColumns($c);
		$startcol2 = (CcrevisiPeer::NUM_COLUMNS - CcrevisiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcanalisPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcanalisPeer::NUM_COLUMNS;
	
			$c->addJoin(CcrevisiPeer::CCANALIS_ID, CcanalisPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcrevisiPeer::getOMClass();

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
						$temp_obj2->addCcrevisi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcrevisis();
					$obj2->addCcrevisi($obj1);
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

		CcrevisiPeer::addSelectColumns($c);
		$startcol2 = (CcrevisiPeer::NUM_COLUMNS - CcrevisiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcinformPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcinformPeer::NUM_COLUMNS;
	
			$c->addJoin(CcrevisiPeer::CCINFORM_ID, CcinformPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcrevisiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcinformPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcinform(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcrevisi($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcrevisis();
					$obj2->addCcrevisi($obj1);
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
		return CcrevisiPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcrevisiPeer::ID); 

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
			$comparison = $criteria->getComparison(CcrevisiPeer::ID);
			$selectCriteria->add(CcrevisiPeer::ID, $criteria->remove(CcrevisiPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcrevisiPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcrevisiPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccrevisi) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcrevisiPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccrevisi $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcrevisiPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcrevisiPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcrevisiPeer::DATABASE_NAME, CcrevisiPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcrevisiPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcrevisiPeer::DATABASE_NAME);

		$criteria->add(CcrevisiPeer::ID, $pk);


		$v = CcrevisiPeer::doSelect($criteria, $con);

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
			$criteria->add(CcrevisiPeer::ID, $pks, Criteria::IN);
			$objs = CcrevisiPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcrevisiPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcrevisiMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcrevisiMapBuilder');
}
