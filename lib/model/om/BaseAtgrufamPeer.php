<?php


abstract class BaseAtgrufamPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'atgrufam';

	
	const CLASS_DEFAULT = 'lib.model.Atgrufam';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ATCIUDADANO_ID = 'atgrufam.ATCIUDADANO_ID';

	
	const CEDFAM = 'atgrufam.CEDFAM';

	
	const NOMFAM = 'atgrufam.NOMFAM';

	
	const APEFAM = 'atgrufam.APEFAM';

	
	const EDAD = 'atgrufam.EDAD';

	
	const PARFAM = 'atgrufam.PARFAM';

	
	const OCUFAM = 'atgrufam.OCUFAM';

	
	const MONING = 'atgrufam.MONING';

	
	const ID = 'atgrufam.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('AtciudadanoId', 'Cedfam', 'Nomfam', 'Apefam', 'Edad', 'Parfam', 'Ocufam', 'Moning', 'Id', ),
		BasePeer::TYPE_COLNAME => array (AtgrufamPeer::ATCIUDADANO_ID, AtgrufamPeer::CEDFAM, AtgrufamPeer::NOMFAM, AtgrufamPeer::APEFAM, AtgrufamPeer::EDAD, AtgrufamPeer::PARFAM, AtgrufamPeer::OCUFAM, AtgrufamPeer::MONING, AtgrufamPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('atciudadano_id', 'cedfam', 'nomfam', 'apefam', 'edad', 'parfam', 'ocufam', 'moning', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('AtciudadanoId' => 0, 'Cedfam' => 1, 'Nomfam' => 2, 'Apefam' => 3, 'Edad' => 4, 'Parfam' => 5, 'Ocufam' => 6, 'Moning' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (AtgrufamPeer::ATCIUDADANO_ID => 0, AtgrufamPeer::CEDFAM => 1, AtgrufamPeer::NOMFAM => 2, AtgrufamPeer::APEFAM => 3, AtgrufamPeer::EDAD => 4, AtgrufamPeer::PARFAM => 5, AtgrufamPeer::OCUFAM => 6, AtgrufamPeer::MONING => 7, AtgrufamPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('atciudadano_id' => 0, 'cedfam' => 1, 'nomfam' => 2, 'apefam' => 3, 'edad' => 4, 'parfam' => 5, 'ocufam' => 6, 'moning' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/AtgrufamMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.AtgrufamMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AtgrufamPeer::getTableMap();
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
		return str_replace(AtgrufamPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AtgrufamPeer::ATCIUDADANO_ID);

		$criteria->addSelectColumn(AtgrufamPeer::CEDFAM);

		$criteria->addSelectColumn(AtgrufamPeer::NOMFAM);

		$criteria->addSelectColumn(AtgrufamPeer::APEFAM);

		$criteria->addSelectColumn(AtgrufamPeer::EDAD);

		$criteria->addSelectColumn(AtgrufamPeer::PARFAM);

		$criteria->addSelectColumn(AtgrufamPeer::OCUFAM);

		$criteria->addSelectColumn(AtgrufamPeer::MONING);

		$criteria->addSelectColumn(AtgrufamPeer::ID);

	}

	const COUNT = 'COUNT(atgrufam.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT atgrufam.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtgrufamPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtgrufamPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AtgrufamPeer::doSelectRS($criteria, $con);
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
		$objects = AtgrufamPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AtgrufamPeer::populateObjects(AtgrufamPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AtgrufamPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AtgrufamPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinAtciudadano(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtgrufamPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtgrufamPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtgrufamPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);

		$rs = AtgrufamPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAtciudadano(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtgrufamPeer::addSelectColumns($c);
		$startcol = (AtgrufamPeer::NUM_COLUMNS - AtgrufamPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtciudadanoPeer::addSelectColumns($c);

		$c->addJoin(AtgrufamPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtgrufamPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtciudadanoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAtciudadano(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtgrufam($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtgrufams();
				$obj2->addAtgrufam($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtgrufamPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtgrufamPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtgrufamPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);

		$rs = AtgrufamPeer::doSelectRS($criteria, $con);
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

		AtgrufamPeer::addSelectColumns($c);
		$startcol2 = (AtgrufamPeer::NUM_COLUMNS - AtgrufamPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AtciudadanoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AtciudadanoPeer::NUM_COLUMNS;

		$c->addJoin(AtgrufamPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtgrufamPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = AtciudadanoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getAtciudadano(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAtgrufam($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initAtgrufams();
				$obj2->addAtgrufam($obj1);
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
		return AtgrufamPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(AtgrufamPeer::ID); 

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
			$comparison = $criteria->getComparison(AtgrufamPeer::ID);
			$selectCriteria->add(AtgrufamPeer::ID, $criteria->remove(AtgrufamPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AtgrufamPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AtgrufamPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Atgrufam) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AtgrufamPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Atgrufam $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AtgrufamPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AtgrufamPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(AtgrufamPeer::DATABASE_NAME, AtgrufamPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = AtgrufamPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(AtgrufamPeer::DATABASE_NAME);

		$criteria->add(AtgrufamPeer::ID, $pk);


		$v = AtgrufamPeer::doSelect($criteria, $con);

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
			$criteria->add(AtgrufamPeer::ID, $pks, Criteria::IN);
			$objs = AtgrufamPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAtgrufamPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/AtgrufamMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.AtgrufamMapBuilder');
}
