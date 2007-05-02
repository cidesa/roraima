<?php


abstract class BaseFcparroqPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcparroq';

	
	const CLASS_DEFAULT = 'lib.model.Fcparroq';

	
	const NUM_COLUMNS = 6;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODPAR = 'fcparroq.CODPAR';

	
	const CODMUN = 'fcparroq.CODMUN';

	
	const CODEDO = 'fcparroq.CODEDO';

	
	const CODPAI = 'fcparroq.CODPAI';

	
	const NOMPAR = 'fcparroq.NOMPAR';

	
	const ID = 'fcparroq.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codpar', 'Codmun', 'Codedo', 'Codpai', 'Nompar', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcparroqPeer::CODPAR, FcparroqPeer::CODMUN, FcparroqPeer::CODEDO, FcparroqPeer::CODPAI, FcparroqPeer::NOMPAR, FcparroqPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codpar', 'codmun', 'codedo', 'codpai', 'nompar', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codpar' => 0, 'Codmun' => 1, 'Codedo' => 2, 'Codpai' => 3, 'Nompar' => 4, 'Id' => 5, ),
		BasePeer::TYPE_COLNAME => array (FcparroqPeer::CODPAR => 0, FcparroqPeer::CODMUN => 1, FcparroqPeer::CODEDO => 2, FcparroqPeer::CODPAI => 3, FcparroqPeer::NOMPAR => 4, FcparroqPeer::ID => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('codpar' => 0, 'codmun' => 1, 'codedo' => 2, 'codpai' => 3, 'nompar' => 4, 'id' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcparroqMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcparroqMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcparroqPeer::getTableMap();
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
		return str_replace(FcparroqPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcparroqPeer::CODPAR);

		$criteria->addSelectColumn(FcparroqPeer::CODMUN);

		$criteria->addSelectColumn(FcparroqPeer::CODEDO);

		$criteria->addSelectColumn(FcparroqPeer::CODPAI);

		$criteria->addSelectColumn(FcparroqPeer::NOMPAR);

		$criteria->addSelectColumn(FcparroqPeer::ID);

	}

	const COUNT = 'COUNT(fcparroq.CODPAR)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcparroq.CODPAR)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcparroqPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcparroqPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcparroqPeer::doSelectRS($criteria, $con);
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
		$objects = FcparroqPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcparroqPeer::populateObjects(FcparroqPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcparroqPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcparroqPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinFcmunici(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcparroqPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcparroqPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FcparroqPeer::CODPAI, FcmuniciPeer::CODPAI);

		$rs = FcparroqPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinFcmunici(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FcparroqPeer::addSelectColumns($c);
		$startcol = (FcparroqPeer::NUM_COLUMNS - FcparroqPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FcmuniciPeer::addSelectColumns($c);

		$c->addJoin(FcparroqPeer::CODPAI, FcmuniciPeer::CODPAI);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FcparroqPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FcmuniciPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFcmunici(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addFcparroq($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFcparroqs();
				$obj2->addFcparroq($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcparroqPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcparroqPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FcparroqPeer::CODPAI, FcmuniciPeer::CODPAI);

		$rs = FcparroqPeer::doSelectRS($criteria, $con);
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

		FcparroqPeer::addSelectColumns($c);
		$startcol2 = (FcparroqPeer::NUM_COLUMNS - FcparroqPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		FcmuniciPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + FcmuniciPeer::NUM_COLUMNS;

		$c->addJoin(FcparroqPeer::CODPAI, FcmuniciPeer::CODPAI);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = FcparroqPeer::getOMClass();

			
			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				
					
			$omClass = FcmuniciPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getFcmunici(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addFcparroq($obj1); 					break;
				}
			}
			
			if ($newObject) {
				$obj2->initFcparroqs();
				$obj2->addFcparroq($obj1);
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
		return FcparroqPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(FcparroqPeer::CODPAR);
			$selectCriteria->add(FcparroqPeer::CODPAR, $criteria->remove(FcparroqPeer::CODPAR), $comparison);

			$comparison = $criteria->getComparison(FcparroqPeer::CODMUN);
			$selectCriteria->add(FcparroqPeer::CODMUN, $criteria->remove(FcparroqPeer::CODMUN), $comparison);

			$comparison = $criteria->getComparison(FcparroqPeer::CODEDO);
			$selectCriteria->add(FcparroqPeer::CODEDO, $criteria->remove(FcparroqPeer::CODEDO), $comparison);

			$comparison = $criteria->getComparison(FcparroqPeer::CODPAI);
			$selectCriteria->add(FcparroqPeer::CODPAI, $criteria->remove(FcparroqPeer::CODPAI), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcparroqPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcparroqPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcparroq) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
												if(count($values) == count($values, COUNT_RECURSIVE))
			{
								$values = array($values);
			}
			$vals = array();
			foreach($values as $value)
			{

				$vals[0][] = $value[0];
				$vals[1][] = $value[1];
				$vals[2][] = $value[2];
				$vals[3][] = $value[3];
			}

			$criteria->add(FcparroqPeer::CODPAR, $vals[0], Criteria::IN);
			$criteria->add(FcparroqPeer::CODMUN, $vals[1], Criteria::IN);
			$criteria->add(FcparroqPeer::CODEDO, $vals[2], Criteria::IN);
			$criteria->add(FcparroqPeer::CODPAI, $vals[3], Criteria::IN);
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

	
	public static function doValidate(Fcparroq $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcparroqPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcparroqPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcparroqPeer::DATABASE_NAME, FcparroqPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcparroqPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK( $codpar, $codmun, $codedo, $codpai, $con = null) {
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$criteria = new Criteria();
		$criteria->add(FcparroqPeer::CODPAR, $codpar);
		$criteria->add(FcparroqPeer::CODMUN, $codmun);
		$criteria->add(FcparroqPeer::CODEDO, $codedo);
		$criteria->add(FcparroqPeer::CODPAI, $codpai);
		$v = FcparroqPeer::doSelect($criteria, $con);

		return !empty($v) ? $v[0] : null;
	}
} 
if (Propel::isInit()) {
			try {
		BaseFcparroqPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcparroqMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcparroqMapBuilder');
}
