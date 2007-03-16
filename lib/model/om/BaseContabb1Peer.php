<?php


abstract class BaseContabb1Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'contabb1';

	
	const CLASS_DEFAULT = 'lib.model.Contabb1';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODCTA = 'contabb1.CODCTA';

	
	const FECINI = 'contabb1.FECINI';

	
	const FECCIE = 'contabb1.FECCIE';

	
	const PEREJE = 'contabb1.PEREJE';

	
	const TOTDEB = 'contabb1.TOTDEB';

	
	const TOTCRE = 'contabb1.TOTCRE';

	
	const SALACT = 'contabb1.SALACT';

	
	const SALPRGPER = 'contabb1.SALPRGPER';

	
	const SALPRGPERFOR = 'contabb1.SALPRGPERFOR';

	
	const ID = 'contabb1.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codcta', 'Fecini', 'Feccie', 'Pereje', 'Totdeb', 'Totcre', 'Salact', 'Salprgper', 'Salprgperfor', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Contabb1Peer::CODCTA, Contabb1Peer::FECINI, Contabb1Peer::FECCIE, Contabb1Peer::PEREJE, Contabb1Peer::TOTDEB, Contabb1Peer::TOTCRE, Contabb1Peer::SALACT, Contabb1Peer::SALPRGPER, Contabb1Peer::SALPRGPERFOR, Contabb1Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codcta', 'fecini', 'feccie', 'pereje', 'totdeb', 'totcre', 'salact', 'salprgper', 'salprgperfor', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codcta' => 0, 'Fecini' => 1, 'Feccie' => 2, 'Pereje' => 3, 'Totdeb' => 4, 'Totcre' => 5, 'Salact' => 6, 'Salprgper' => 7, 'Salprgperfor' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (Contabb1Peer::CODCTA => 0, Contabb1Peer::FECINI => 1, Contabb1Peer::FECCIE => 2, Contabb1Peer::PEREJE => 3, Contabb1Peer::TOTDEB => 4, Contabb1Peer::TOTCRE => 5, Contabb1Peer::SALACT => 6, Contabb1Peer::SALPRGPER => 7, Contabb1Peer::SALPRGPERFOR => 8, Contabb1Peer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('codcta' => 0, 'fecini' => 1, 'feccie' => 2, 'pereje' => 3, 'totdeb' => 4, 'totcre' => 5, 'salact' => 6, 'salprgper' => 7, 'salprgperfor' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Contabb1MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Contabb1MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Contabb1Peer::getTableMap();
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
		return str_replace(Contabb1Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Contabb1Peer::CODCTA);

		$criteria->addSelectColumn(Contabb1Peer::FECINI);

		$criteria->addSelectColumn(Contabb1Peer::FECCIE);

		$criteria->addSelectColumn(Contabb1Peer::PEREJE);

		$criteria->addSelectColumn(Contabb1Peer::TOTDEB);

		$criteria->addSelectColumn(Contabb1Peer::TOTCRE);

		$criteria->addSelectColumn(Contabb1Peer::SALACT);

		$criteria->addSelectColumn(Contabb1Peer::SALPRGPER);

		$criteria->addSelectColumn(Contabb1Peer::SALPRGPERFOR);

		$criteria->addSelectColumn(Contabb1Peer::ID);

	}

	const COUNT = 'COUNT(contabb1.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT contabb1.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Contabb1Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Contabb1Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Contabb1Peer::doSelectRS($criteria, $con);
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
		$objects = Contabb1Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Contabb1Peer::populateObjects(Contabb1Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Contabb1Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Contabb1Peer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinContabb(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Contabb1Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Contabb1Peer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(Contabb1Peer::CODCTA, ContabbPeer::CODCTA);

		$rs = Contabb1Peer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinContabb(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		Contabb1Peer::addSelectColumns($c);
		$startcol = (Contabb1Peer::NUM_COLUMNS - Contabb1Peer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ContabbPeer::addSelectColumns($c);

		$c->addJoin(Contabb1Peer::CODCTA, ContabbPeer::CODCTA);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = Contabb1Peer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ContabbPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getContabb(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addContabb1($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initContabb1s();
				$obj2->addContabb1($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Contabb1Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Contabb1Peer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(Contabb1Peer::CODCTA, ContabbPeer::CODCTA);

		$rs = Contabb1Peer::doSelectRS($criteria, $con);
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

		Contabb1Peer::addSelectColumns($c);
		$startcol2 = (Contabb1Peer::NUM_COLUMNS - Contabb1Peer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ContabbPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ContabbPeer::NUM_COLUMNS;

		$c->addJoin(Contabb1Peer::CODCTA, ContabbPeer::CODCTA);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = Contabb1Peer::getOMClass();

			
			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				
					
			$omClass = ContabbPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getContabb(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addContabb1($obj1); 					break;
				}
			}
			
			if ($newObject) {
				$obj2->initContabb1s();
				$obj2->addContabb1($obj1);
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
		return Contabb1Peer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}


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
			$comparison = $criteria->getComparison(Contabb1Peer::ID);
			$selectCriteria->add(Contabb1Peer::ID, $criteria->remove(Contabb1Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Contabb1Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Contabb1Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Contabb1) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Contabb1Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Contabb1 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Contabb1Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Contabb1Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Contabb1Peer::DATABASE_NAME, Contabb1Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Contabb1Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Contabb1Peer::DATABASE_NAME);

		$criteria->add(Contabb1Peer::ID, $pk);


		$v = Contabb1Peer::doSelect($criteria, $con);

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
			$criteria->add(Contabb1Peer::ID, $pks, Criteria::IN);
			$objs = Contabb1Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseContabb1Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Contabb1MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Contabb1MapBuilder');
}
