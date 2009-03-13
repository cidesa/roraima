<?php


abstract class BaseLicalvanPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'licalvan';

	
	const CLASS_DEFAULT = 'lib.model.Licalvan';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const LIREGLIC_ID = 'licalvan.LIREGLIC_ID';

	
	const CODLIC = 'licalvan.CODLIC';

	
	const CODPRO = 'licalvan.CODPRO';

	
	const VANDECLA = 'licalvan.VANDECLA';

	
	const VANMAYOR = 'licalvan.VANMAYOR';

	
	const VANPREFER = 'licalvan.VANPREFER';

	
	const PREADIPYM = 'licalvan.PREADIPYM';

	
	const PREPORTOT = 'licalvan.PREPORTOT';

	
	const PREEVAOFE = 'licalvan.PREEVAOFE';

	
	const PREAJUSTA = 'licalvan.PREAJUSTA';

	
	const ID = 'licalvan.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('LireglicId', 'Codlic', 'Codpro', 'Vandecla', 'Vanmayor', 'Vanprefer', 'Preadipym', 'Preportot', 'Preevaofe', 'Preajusta', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LicalvanPeer::LIREGLIC_ID, LicalvanPeer::CODLIC, LicalvanPeer::CODPRO, LicalvanPeer::VANDECLA, LicalvanPeer::VANMAYOR, LicalvanPeer::VANPREFER, LicalvanPeer::PREADIPYM, LicalvanPeer::PREPORTOT, LicalvanPeer::PREEVAOFE, LicalvanPeer::PREAJUSTA, LicalvanPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('lireglic_id', 'codlic', 'codpro', 'vandecla', 'vanmayor', 'vanprefer', 'preadipym', 'preportot', 'preevaofe', 'preajusta', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('LireglicId' => 0, 'Codlic' => 1, 'Codpro' => 2, 'Vandecla' => 3, 'Vanmayor' => 4, 'Vanprefer' => 5, 'Preadipym' => 6, 'Preportot' => 7, 'Preevaofe' => 8, 'Preajusta' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (LicalvanPeer::LIREGLIC_ID => 0, LicalvanPeer::CODLIC => 1, LicalvanPeer::CODPRO => 2, LicalvanPeer::VANDECLA => 3, LicalvanPeer::VANMAYOR => 4, LicalvanPeer::VANPREFER => 5, LicalvanPeer::PREADIPYM => 6, LicalvanPeer::PREPORTOT => 7, LicalvanPeer::PREEVAOFE => 8, LicalvanPeer::PREAJUSTA => 9, LicalvanPeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('lireglic_id' => 0, 'codlic' => 1, 'codpro' => 2, 'vandecla' => 3, 'vanmayor' => 4, 'vanprefer' => 5, 'preadipym' => 6, 'preportot' => 7, 'preevaofe' => 8, 'preajusta' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/LicalvanMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.LicalvanMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LicalvanPeer::getTableMap();
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
		return str_replace(LicalvanPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LicalvanPeer::LIREGLIC_ID);

		$criteria->addSelectColumn(LicalvanPeer::CODLIC);

		$criteria->addSelectColumn(LicalvanPeer::CODPRO);

		$criteria->addSelectColumn(LicalvanPeer::VANDECLA);

		$criteria->addSelectColumn(LicalvanPeer::VANMAYOR);

		$criteria->addSelectColumn(LicalvanPeer::VANPREFER);

		$criteria->addSelectColumn(LicalvanPeer::PREADIPYM);

		$criteria->addSelectColumn(LicalvanPeer::PREPORTOT);

		$criteria->addSelectColumn(LicalvanPeer::PREEVAOFE);

		$criteria->addSelectColumn(LicalvanPeer::PREAJUSTA);

		$criteria->addSelectColumn(LicalvanPeer::ID);

	}

	const COUNT = 'COUNT(licalvan.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT licalvan.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LicalvanPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LicalvanPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LicalvanPeer::doSelectRS($criteria, $con);
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
		$objects = LicalvanPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LicalvanPeer::populateObjects(LicalvanPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LicalvanPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LicalvanPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinLireglic(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LicalvanPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LicalvanPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LicalvanPeer::LIREGLIC_ID, LireglicPeer::ID);

		$rs = LicalvanPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinLireglic(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LicalvanPeer::addSelectColumns($c);
		$startcol = (LicalvanPeer::NUM_COLUMNS - LicalvanPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LireglicPeer::addSelectColumns($c);

		$c->addJoin(LicalvanPeer::LIREGLIC_ID, LireglicPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LicalvanPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LireglicPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLireglic(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLicalvan($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLicalvans();
				$obj2->addLicalvan($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LicalvanPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LicalvanPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LicalvanPeer::LIREGLIC_ID, LireglicPeer::ID);

		$rs = LicalvanPeer::doSelectRS($criteria, $con);
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

		LicalvanPeer::addSelectColumns($c);
		$startcol2 = (LicalvanPeer::NUM_COLUMNS - LicalvanPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		LireglicPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + LireglicPeer::NUM_COLUMNS;

		$c->addJoin(LicalvanPeer::LIREGLIC_ID, LireglicPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LicalvanPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = LireglicPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getLireglic(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addLicalvan($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initLicalvans();
				$obj2->addLicalvan($obj1);
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
		return LicalvanPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LicalvanPeer::ID); 

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
			$comparison = $criteria->getComparison(LicalvanPeer::ID);
			$selectCriteria->add(LicalvanPeer::ID, $criteria->remove(LicalvanPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LicalvanPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LicalvanPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Licalvan) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LicalvanPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Licalvan $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LicalvanPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LicalvanPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LicalvanPeer::DATABASE_NAME, LicalvanPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LicalvanPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LicalvanPeer::DATABASE_NAME);

		$criteria->add(LicalvanPeer::ID, $pk);


		$v = LicalvanPeer::doSelect($criteria, $con);

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
			$criteria->add(LicalvanPeer::ID, $pks, Criteria::IN);
			$objs = LicalvanPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLicalvanPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/LicalvanMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.LicalvanMapBuilder');
}
