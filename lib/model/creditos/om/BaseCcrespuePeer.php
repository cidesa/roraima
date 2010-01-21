<?php


abstract class BaseCcrespuePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccrespue';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccrespue';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccrespue.ID';

	
	const ESTATU = 'ccrespue.ESTATU';

	
	const NOMFIS = 'ccrespue.NOMFIS';

	
	const MONSOL = 'ccrespue.MONSOL';

	
	const MONCOB = 'ccrespue.MONCOB';

	
	const OBSERV = 'ccrespue.OBSERV';

	
	const CEDRIF = 'ccrespue.CEDRIF';

	
	const NUMCUE = 'ccrespue.NUMCUE';

	
	const CCRESBAN_ID = 'ccrespue.CCRESBAN_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Estatu', 'Nomfis', 'Monsol', 'Moncob', 'Observ', 'Cedrif', 'Numcue', 'CcresbanId', ),
		BasePeer::TYPE_COLNAME => array (CcrespuePeer::ID, CcrespuePeer::ESTATU, CcrespuePeer::NOMFIS, CcrespuePeer::MONSOL, CcrespuePeer::MONCOB, CcrespuePeer::OBSERV, CcrespuePeer::CEDRIF, CcrespuePeer::NUMCUE, CcrespuePeer::CCRESBAN_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'estatu', 'nomfis', 'monsol', 'moncob', 'observ', 'cedrif', 'numcue', 'ccresban_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Estatu' => 1, 'Nomfis' => 2, 'Monsol' => 3, 'Moncob' => 4, 'Observ' => 5, 'Cedrif' => 6, 'Numcue' => 7, 'CcresbanId' => 8, ),
		BasePeer::TYPE_COLNAME => array (CcrespuePeer::ID => 0, CcrespuePeer::ESTATU => 1, CcrespuePeer::NOMFIS => 2, CcrespuePeer::MONSOL => 3, CcrespuePeer::MONCOB => 4, CcrespuePeer::OBSERV => 5, CcrespuePeer::CEDRIF => 6, CcrespuePeer::NUMCUE => 7, CcrespuePeer::CCRESBAN_ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'estatu' => 1, 'nomfis' => 2, 'monsol' => 3, 'moncob' => 4, 'observ' => 5, 'cedrif' => 6, 'numcue' => 7, 'ccresban_id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcrespueMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcrespueMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcrespuePeer::getTableMap();
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
		return str_replace(CcrespuePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcrespuePeer::ID);

		$criteria->addSelectColumn(CcrespuePeer::ESTATU);

		$criteria->addSelectColumn(CcrespuePeer::NOMFIS);

		$criteria->addSelectColumn(CcrespuePeer::MONSOL);

		$criteria->addSelectColumn(CcrespuePeer::MONCOB);

		$criteria->addSelectColumn(CcrespuePeer::OBSERV);

		$criteria->addSelectColumn(CcrespuePeer::CEDRIF);

		$criteria->addSelectColumn(CcrespuePeer::NUMCUE);

		$criteria->addSelectColumn(CcrespuePeer::CCRESBAN_ID);

	}

	const COUNT = 'COUNT(ccrespue.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccrespue.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcrespuePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcrespuePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcrespuePeer::doSelectRS($criteria, $con);
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
		$objects = CcrespuePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcrespuePeer::populateObjects(CcrespuePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcrespuePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcrespuePeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcresban(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcrespuePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcrespuePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcrespuePeer::CCRESBAN_ID, CcresbanPeer::ID);

		$rs = CcrespuePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcresban(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcrespuePeer::addSelectColumns($c);
		$startcol = (CcrespuePeer::NUM_COLUMNS - CcrespuePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcresbanPeer::addSelectColumns($c);

		$c->addJoin(CcrespuePeer::CCRESBAN_ID, CcresbanPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcrespuePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcresbanPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcresban(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcrespue($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcrespues();
				$obj2->addCcrespue($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcrespuePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcrespuePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcrespuePeer::CCRESBAN_ID, CcresbanPeer::ID);
	
		$rs = CcrespuePeer::doSelectRS($criteria, $con);
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

		CcrespuePeer::addSelectColumns($c);
		$startcol2 = (CcrespuePeer::NUM_COLUMNS - CcrespuePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcresbanPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcresbanPeer::NUM_COLUMNS;
	
			$c->addJoin(CcrespuePeer::CCRESBAN_ID, CcresbanPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcrespuePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcresbanPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcresban(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcrespue($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcrespues();
					$obj2->addCcrespue($obj1);
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
		return CcrespuePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcrespuePeer::ID); 

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
			$comparison = $criteria->getComparison(CcrespuePeer::ID);
			$selectCriteria->add(CcrespuePeer::ID, $criteria->remove(CcrespuePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcrespuePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcrespuePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccrespue) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcrespuePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccrespue $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcrespuePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcrespuePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcrespuePeer::DATABASE_NAME, CcrespuePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcrespuePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcrespuePeer::DATABASE_NAME);

		$criteria->add(CcrespuePeer::ID, $pk);


		$v = CcrespuePeer::doSelect($criteria, $con);

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
			$criteria->add(CcrespuePeer::ID, $pks, Criteria::IN);
			$objs = CcrespuePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcrespuePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcrespueMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcrespueMapBuilder');
}
