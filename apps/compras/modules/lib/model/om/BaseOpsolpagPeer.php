<?php


abstract class BaseOpsolpagPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'opsolpag';

	
	const CLASS_DEFAULT = 'lib.model.Opsolpag';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFSOL = 'opsolpag.REFSOL';

	
	const FECSOL = 'opsolpag.FECSOL';

	
	const REFCOM = 'opsolpag.REFCOM';

	
	const DESSOL = 'opsolpag.DESSOL';

	
	const MONSOL = 'opsolpag.MONSOL';

	
	const STASOL = 'opsolpag.STASOL';

	
	const CEDRIF = 'opsolpag.CEDRIF';

	
	const NOMBEN = 'opsolpag.NOMBEN';

	
	const NUMSOLCRE = 'opsolpag.NUMSOLCRE';

	
	const NUMCRE = 'opsolpag.NUMCRE';

	
	const ID = 'opsolpag.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refsol', 'Fecsol', 'Refcom', 'Dessol', 'Monsol', 'Stasol', 'Cedrif', 'Nomben', 'Numsolcre', 'Numcre', 'Id', ),
		BasePeer::TYPE_COLNAME => array (OpsolpagPeer::REFSOL, OpsolpagPeer::FECSOL, OpsolpagPeer::REFCOM, OpsolpagPeer::DESSOL, OpsolpagPeer::MONSOL, OpsolpagPeer::STASOL, OpsolpagPeer::CEDRIF, OpsolpagPeer::NOMBEN, OpsolpagPeer::NUMSOLCRE, OpsolpagPeer::NUMCRE, OpsolpagPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refsol', 'fecsol', 'refcom', 'dessol', 'monsol', 'stasol', 'cedrif', 'nomben', 'numsolcre', 'numcre', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refsol' => 0, 'Fecsol' => 1, 'Refcom' => 2, 'Dessol' => 3, 'Monsol' => 4, 'Stasol' => 5, 'Cedrif' => 6, 'Nomben' => 7, 'Numsolcre' => 8, 'Numcre' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (OpsolpagPeer::REFSOL => 0, OpsolpagPeer::FECSOL => 1, OpsolpagPeer::REFCOM => 2, OpsolpagPeer::DESSOL => 3, OpsolpagPeer::MONSOL => 4, OpsolpagPeer::STASOL => 5, OpsolpagPeer::CEDRIF => 6, OpsolpagPeer::NOMBEN => 7, OpsolpagPeer::NUMSOLCRE => 8, OpsolpagPeer::NUMCRE => 9, OpsolpagPeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('refsol' => 0, 'fecsol' => 1, 'refcom' => 2, 'dessol' => 3, 'monsol' => 4, 'stasol' => 5, 'cedrif' => 6, 'nomben' => 7, 'numsolcre' => 8, 'numcre' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/OpsolpagMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.OpsolpagMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = OpsolpagPeer::getTableMap();
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
		return str_replace(OpsolpagPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(OpsolpagPeer::REFSOL);

		$criteria->addSelectColumn(OpsolpagPeer::FECSOL);

		$criteria->addSelectColumn(OpsolpagPeer::REFCOM);

		$criteria->addSelectColumn(OpsolpagPeer::DESSOL);

		$criteria->addSelectColumn(OpsolpagPeer::MONSOL);

		$criteria->addSelectColumn(OpsolpagPeer::STASOL);

		$criteria->addSelectColumn(OpsolpagPeer::CEDRIF);

		$criteria->addSelectColumn(OpsolpagPeer::NOMBEN);

		$criteria->addSelectColumn(OpsolpagPeer::NUMSOLCRE);

		$criteria->addSelectColumn(OpsolpagPeer::NUMCRE);

		$criteria->addSelectColumn(OpsolpagPeer::ID);

	}

	const COUNT = 'COUNT(opsolpag.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT opsolpag.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(OpsolpagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(OpsolpagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = OpsolpagPeer::doSelectRS($criteria, $con);
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
		$objects = OpsolpagPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return OpsolpagPeer::populateObjects(OpsolpagPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			OpsolpagPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = OpsolpagPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCpcompro(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(OpsolpagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(OpsolpagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(OpsolpagPeer::REFCOM, CpcomproPeer::REFCOM);

		$rs = OpsolpagPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCpcompro(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		OpsolpagPeer::addSelectColumns($c);
		$startcol = (OpsolpagPeer::NUM_COLUMNS - OpsolpagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CpcomproPeer::addSelectColumns($c);

		$c->addJoin(OpsolpagPeer::REFCOM, CpcomproPeer::REFCOM);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = OpsolpagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CpcomproPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCpcompro(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addOpsolpag($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initOpsolpags();
				$obj2->addOpsolpag($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(OpsolpagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(OpsolpagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(OpsolpagPeer::REFCOM, CpcomproPeer::REFCOM);
	
		$rs = OpsolpagPeer::doSelectRS($criteria, $con);
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

		OpsolpagPeer::addSelectColumns($c);
		$startcol2 = (OpsolpagPeer::NUM_COLUMNS - OpsolpagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CpcomproPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CpcomproPeer::NUM_COLUMNS;
	
			$c->addJoin(OpsolpagPeer::REFCOM, CpcomproPeer::REFCOM);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = OpsolpagPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CpcomproPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCpcompro(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addOpsolpag($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initOpsolpags();
					$obj2->addOpsolpag($obj1);
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
		return OpsolpagPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(OpsolpagPeer::ID); 

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
			$comparison = $criteria->getComparison(OpsolpagPeer::ID);
			$selectCriteria->add(OpsolpagPeer::ID, $criteria->remove(OpsolpagPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(OpsolpagPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(OpsolpagPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Opsolpag) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(OpsolpagPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Opsolpag $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(OpsolpagPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(OpsolpagPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(OpsolpagPeer::DATABASE_NAME, OpsolpagPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = OpsolpagPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(OpsolpagPeer::DATABASE_NAME);

		$criteria->add(OpsolpagPeer::ID, $pk);


		$v = OpsolpagPeer::doSelect($criteria, $con);

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
			$criteria->add(OpsolpagPeer::ID, $pks, Criteria::IN);
			$objs = OpsolpagPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseOpsolpagPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/OpsolpagMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.OpsolpagMapBuilder');
}
