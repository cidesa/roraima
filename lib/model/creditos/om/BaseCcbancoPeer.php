<?php


abstract class BaseCcbancoPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccbanco';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccbanco';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccbanco.ID';

	
	const NOMBAN = 'ccbanco.NOMBAN';

	
	const ABRBAN = 'ccbanco.ABRBAN';

	
	const DIRBAN = 'ccbanco.DIRBAN';

	
	const NOMPERCON = 'ccbanco.NOMPERCON';

	
	const TELPERCON = 'ccbanco.TELPERCON';

	
	const CODARETEL = 'ccbanco.CODARETEL';

	
	const CODSUDEBAN = 'ccbanco.CODSUDEBAN';

	
	const CCPARROQ_ID = 'ccbanco.CCPARROQ_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Nomban', 'Abrban', 'Dirban', 'Nompercon', 'Telpercon', 'Codaretel', 'Codsudeban', 'CcparroqId', ),
		BasePeer::TYPE_COLNAME => array (CcbancoPeer::ID, CcbancoPeer::NOMBAN, CcbancoPeer::ABRBAN, CcbancoPeer::DIRBAN, CcbancoPeer::NOMPERCON, CcbancoPeer::TELPERCON, CcbancoPeer::CODARETEL, CcbancoPeer::CODSUDEBAN, CcbancoPeer::CCPARROQ_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'nomban', 'abrban', 'dirban', 'nompercon', 'telpercon', 'codaretel', 'codsudeban', 'ccparroq_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Nomban' => 1, 'Abrban' => 2, 'Dirban' => 3, 'Nompercon' => 4, 'Telpercon' => 5, 'Codaretel' => 6, 'Codsudeban' => 7, 'CcparroqId' => 8, ),
		BasePeer::TYPE_COLNAME => array (CcbancoPeer::ID => 0, CcbancoPeer::NOMBAN => 1, CcbancoPeer::ABRBAN => 2, CcbancoPeer::DIRBAN => 3, CcbancoPeer::NOMPERCON => 4, CcbancoPeer::TELPERCON => 5, CcbancoPeer::CODARETEL => 6, CcbancoPeer::CODSUDEBAN => 7, CcbancoPeer::CCPARROQ_ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'nomban' => 1, 'abrban' => 2, 'dirban' => 3, 'nompercon' => 4, 'telpercon' => 5, 'codaretel' => 6, 'codsudeban' => 7, 'ccparroq_id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcbancoMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcbancoMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcbancoPeer::getTableMap();
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
		return str_replace(CcbancoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcbancoPeer::ID);

		$criteria->addSelectColumn(CcbancoPeer::NOMBAN);

		$criteria->addSelectColumn(CcbancoPeer::ABRBAN);

		$criteria->addSelectColumn(CcbancoPeer::DIRBAN);

		$criteria->addSelectColumn(CcbancoPeer::NOMPERCON);

		$criteria->addSelectColumn(CcbancoPeer::TELPERCON);

		$criteria->addSelectColumn(CcbancoPeer::CODARETEL);

		$criteria->addSelectColumn(CcbancoPeer::CODSUDEBAN);

		$criteria->addSelectColumn(CcbancoPeer::CCPARROQ_ID);

	}

	const COUNT = 'COUNT(ccbanco.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccbanco.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcbancoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcbancoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcbancoPeer::doSelectRS($criteria, $con);
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
		$objects = CcbancoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcbancoPeer::populateObjects(CcbancoPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcbancoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcbancoPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcparroq(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcbancoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcbancoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcbancoPeer::CCPARROQ_ID, CcparroqPeer::ID);

		$rs = CcbancoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcparroq(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcbancoPeer::addSelectColumns($c);
		$startcol = (CcbancoPeer::NUM_COLUMNS - CcbancoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcparroqPeer::addSelectColumns($c);

		$c->addJoin(CcbancoPeer::CCPARROQ_ID, CcparroqPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbancoPeer::getOMClass();

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
										$temp_obj2->addCcbanco($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcbancos();
				$obj2->addCcbanco($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcbancoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcbancoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcbancoPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
		$rs = CcbancoPeer::doSelectRS($criteria, $con);
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

		CcbancoPeer::addSelectColumns($c);
		$startcol2 = (CcbancoPeer::NUM_COLUMNS - CcbancoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcparroqPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcparroqPeer::NUM_COLUMNS;
	
			$c->addJoin(CcbancoPeer::CCPARROQ_ID, CcparroqPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcbancoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcparroqPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcparroq(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcbanco($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcbancos();
					$obj2->addCcbanco($obj1);
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
		return CcbancoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcbancoPeer::ID); 

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
			$comparison = $criteria->getComparison(CcbancoPeer::ID);
			$selectCriteria->add(CcbancoPeer::ID, $criteria->remove(CcbancoPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcbancoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcbancoPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccbanco) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcbancoPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccbanco $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcbancoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcbancoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcbancoPeer::DATABASE_NAME, CcbancoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcbancoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcbancoPeer::DATABASE_NAME);

		$criteria->add(CcbancoPeer::ID, $pk);


		$v = CcbancoPeer::doSelect($criteria, $con);

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
			$criteria->add(CcbancoPeer::ID, $pks, Criteria::IN);
			$objs = CcbancoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcbancoPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcbancoMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcbancoMapBuilder');
}
