<?php


abstract class BaseCasalalmPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'casalalm';

	
	const CLASS_DEFAULT = 'lib.model.Casalalm';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODSAL = 'casalalm.CODSAL';

	
	const FECSAL = 'casalalm.FECSAL';

	
	const DESSAL = 'casalalm.DESSAL';

	
	const CODPRO = 'casalalm.CODPRO';

	
	const MONSAL = 'casalalm.MONSAL';

	
	const STASAL = 'casalalm.STASAL';

	
	const CODALM = 'casalalm.CODALM';

	
	const CODUBI = 'casalalm.CODUBI';

	
	const TIPMOV = 'casalalm.TIPMOV';

	
	const OBSERV = 'casalalm.OBSERV';

	
	const CODCEN = 'casalalm.CODCEN';

	
	const REQART = 'casalalm.REQART';

	
	const ID = 'casalalm.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codsal', 'Fecsal', 'Dessal', 'Codpro', 'Monsal', 'Stasal', 'Codalm', 'Codubi', 'Tipmov', 'Observ', 'Codcen', 'Reqart', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CasalalmPeer::CODSAL, CasalalmPeer::FECSAL, CasalalmPeer::DESSAL, CasalalmPeer::CODPRO, CasalalmPeer::MONSAL, CasalalmPeer::STASAL, CasalalmPeer::CODALM, CasalalmPeer::CODUBI, CasalalmPeer::TIPMOV, CasalalmPeer::OBSERV, CasalalmPeer::CODCEN, CasalalmPeer::REQART, CasalalmPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codsal', 'fecsal', 'dessal', 'codpro', 'monsal', 'stasal', 'codalm', 'codubi', 'tipmov', 'observ', 'codcen', 'reqart', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codsal' => 0, 'Fecsal' => 1, 'Dessal' => 2, 'Codpro' => 3, 'Monsal' => 4, 'Stasal' => 5, 'Codalm' => 6, 'Codubi' => 7, 'Tipmov' => 8, 'Observ' => 9, 'Codcen' => 10, 'Reqart' => 11, 'Id' => 12, ),
		BasePeer::TYPE_COLNAME => array (CasalalmPeer::CODSAL => 0, CasalalmPeer::FECSAL => 1, CasalalmPeer::DESSAL => 2, CasalalmPeer::CODPRO => 3, CasalalmPeer::MONSAL => 4, CasalalmPeer::STASAL => 5, CasalalmPeer::CODALM => 6, CasalalmPeer::CODUBI => 7, CasalalmPeer::TIPMOV => 8, CasalalmPeer::OBSERV => 9, CasalalmPeer::CODCEN => 10, CasalalmPeer::REQART => 11, CasalalmPeer::ID => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('codsal' => 0, 'fecsal' => 1, 'dessal' => 2, 'codpro' => 3, 'monsal' => 4, 'stasal' => 5, 'codalm' => 6, 'codubi' => 7, 'tipmov' => 8, 'observ' => 9, 'codcen' => 10, 'reqart' => 11, 'id' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CasalalmMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CasalalmMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CasalalmPeer::getTableMap();
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
		return str_replace(CasalalmPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CasalalmPeer::CODSAL);

		$criteria->addSelectColumn(CasalalmPeer::FECSAL);

		$criteria->addSelectColumn(CasalalmPeer::DESSAL);

		$criteria->addSelectColumn(CasalalmPeer::CODPRO);

		$criteria->addSelectColumn(CasalalmPeer::MONSAL);

		$criteria->addSelectColumn(CasalalmPeer::STASAL);

		$criteria->addSelectColumn(CasalalmPeer::CODALM);

		$criteria->addSelectColumn(CasalalmPeer::CODUBI);

		$criteria->addSelectColumn(CasalalmPeer::TIPMOV);

		$criteria->addSelectColumn(CasalalmPeer::OBSERV);

		$criteria->addSelectColumn(CasalalmPeer::CODCEN);

		$criteria->addSelectColumn(CasalalmPeer::REQART);

		$criteria->addSelectColumn(CasalalmPeer::ID);

	}

	const COUNT = 'COUNT(casalalm.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT casalalm.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CasalalmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CasalalmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CasalalmPeer::doSelectRS($criteria, $con);
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
		$objects = CasalalmPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CasalalmPeer::populateObjects(CasalalmPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CasalalmPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CasalalmPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCatipsal(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CasalalmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CasalalmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CasalalmPeer::TIPMOV, CatipsalPeer::CODTIPSAL);

		$rs = CasalalmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCatipsal(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CasalalmPeer::addSelectColumns($c);
		$startcol = (CasalalmPeer::NUM_COLUMNS - CasalalmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatipsalPeer::addSelectColumns($c);

		$c->addJoin(CasalalmPeer::TIPMOV, CatipsalPeer::CODTIPSAL);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CasalalmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatipsalPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatipsal(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCasalalm($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCasalalms();
				$obj2->addCasalalm($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CasalalmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CasalalmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CasalalmPeer::TIPMOV, CatipsalPeer::CODTIPSAL);
	
		$rs = CasalalmPeer::doSelectRS($criteria, $con);
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

		CasalalmPeer::addSelectColumns($c);
		$startcol2 = (CasalalmPeer::NUM_COLUMNS - CasalalmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CatipsalPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CatipsalPeer::NUM_COLUMNS;
	
			$c->addJoin(CasalalmPeer::TIPMOV, CatipsalPeer::CODTIPSAL);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CasalalmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CatipsalPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCatipsal(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCasalalm($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCasalalms();
					$obj2->addCasalalm($obj1);
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
		return CasalalmPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CasalalmPeer::ID); 

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
			$comparison = $criteria->getComparison(CasalalmPeer::ID);
			$selectCriteria->add(CasalalmPeer::ID, $criteria->remove(CasalalmPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CasalalmPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CasalalmPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Casalalm) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CasalalmPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Casalalm $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CasalalmPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CasalalmPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CasalalmPeer::DATABASE_NAME, CasalalmPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CasalalmPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CasalalmPeer::DATABASE_NAME);

		$criteria->add(CasalalmPeer::ID, $pk);


		$v = CasalalmPeer::doSelect($criteria, $con);

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
			$criteria->add(CasalalmPeer::ID, $pks, Criteria::IN);
			$objs = CasalalmPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCasalalmPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CasalalmMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CasalalmMapBuilder');
}
