<?php


abstract class BaseLioferprePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'lioferpre';

	
	const CLASS_DEFAULT = 'lib.model.Lioferpre';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const LIREGLIC_ID = 'lioferpre.LIREGLIC_ID';

	
	const CODLIC = 'lioferpre.CODLIC';

	
	const CODPRO = 'lioferpre.CODPRO';

	
	const CODPAR = 'lioferpre.CODPAR';

	
	const CANT = 'lioferpre.CANT';

	
	const PRECIO = 'lioferpre.PRECIO';

	
	const MONSINIVA = 'lioferpre.MONSINIVA';

	
	const IVA = 'lioferpre.IVA';

	
	const MONTOT = 'lioferpre.MONTOT';

	
	const ID = 'lioferpre.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('LireglicId', 'Codlic', 'Codpro', 'Codpar', 'Cant', 'Precio', 'Monsiniva', 'Iva', 'Montot', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LioferprePeer::LIREGLIC_ID, LioferprePeer::CODLIC, LioferprePeer::CODPRO, LioferprePeer::CODPAR, LioferprePeer::CANT, LioferprePeer::PRECIO, LioferprePeer::MONSINIVA, LioferprePeer::IVA, LioferprePeer::MONTOT, LioferprePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('lireglic_id', 'codlic', 'codpro', 'codpar', 'cant', 'precio', 'monsiniva', 'iva', 'montot', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('LireglicId' => 0, 'Codlic' => 1, 'Codpro' => 2, 'Codpar' => 3, 'Cant' => 4, 'Precio' => 5, 'Monsiniva' => 6, 'Iva' => 7, 'Montot' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (LioferprePeer::LIREGLIC_ID => 0, LioferprePeer::CODLIC => 1, LioferprePeer::CODPRO => 2, LioferprePeer::CODPAR => 3, LioferprePeer::CANT => 4, LioferprePeer::PRECIO => 5, LioferprePeer::MONSINIVA => 6, LioferprePeer::IVA => 7, LioferprePeer::MONTOT => 8, LioferprePeer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('lireglic_id' => 0, 'codlic' => 1, 'codpro' => 2, 'codpar' => 3, 'cant' => 4, 'precio' => 5, 'monsiniva' => 6, 'iva' => 7, 'montot' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/LioferpreMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.LioferpreMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LioferprePeer::getTableMap();
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
		return str_replace(LioferprePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LioferprePeer::LIREGLIC_ID);

		$criteria->addSelectColumn(LioferprePeer::CODLIC);

		$criteria->addSelectColumn(LioferprePeer::CODPRO);

		$criteria->addSelectColumn(LioferprePeer::CODPAR);

		$criteria->addSelectColumn(LioferprePeer::CANT);

		$criteria->addSelectColumn(LioferprePeer::PRECIO);

		$criteria->addSelectColumn(LioferprePeer::MONSINIVA);

		$criteria->addSelectColumn(LioferprePeer::IVA);

		$criteria->addSelectColumn(LioferprePeer::MONTOT);

		$criteria->addSelectColumn(LioferprePeer::ID);

	}

	const COUNT = 'COUNT(lioferpre.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT lioferpre.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LioferprePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LioferprePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LioferprePeer::doSelectRS($criteria, $con);
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
		$objects = LioferprePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LioferprePeer::populateObjects(LioferprePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LioferprePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LioferprePeer::getOMClass();
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
			$criteria->addSelectColumn(LioferprePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LioferprePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LioferprePeer::LIREGLIC_ID, LireglicPeer::ID);

		$rs = LioferprePeer::doSelectRS($criteria, $con);
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

		LioferprePeer::addSelectColumns($c);
		$startcol = (LioferprePeer::NUM_COLUMNS - LioferprePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LireglicPeer::addSelectColumns($c);

		$c->addJoin(LioferprePeer::LIREGLIC_ID, LireglicPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LioferprePeer::getOMClass();

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
										$temp_obj2->addLioferpre($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLioferpres();
				$obj2->addLioferpre($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LioferprePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LioferprePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LioferprePeer::LIREGLIC_ID, LireglicPeer::ID);

		$rs = LioferprePeer::doSelectRS($criteria, $con);
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

		LioferprePeer::addSelectColumns($c);
		$startcol2 = (LioferprePeer::NUM_COLUMNS - LioferprePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		LireglicPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + LireglicPeer::NUM_COLUMNS;

		$c->addJoin(LioferprePeer::LIREGLIC_ID, LireglicPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LioferprePeer::getOMClass();


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
					$temp_obj2->addLioferpre($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initLioferpres();
				$obj2->addLioferpre($obj1);
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
		return LioferprePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LioferprePeer::ID); 

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
			$comparison = $criteria->getComparison(LioferprePeer::ID);
			$selectCriteria->add(LioferprePeer::ID, $criteria->remove(LioferprePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LioferprePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LioferprePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Lioferpre) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LioferprePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Lioferpre $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LioferprePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LioferprePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LioferprePeer::DATABASE_NAME, LioferprePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LioferprePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LioferprePeer::DATABASE_NAME);

		$criteria->add(LioferprePeer::ID, $pk);


		$v = LioferprePeer::doSelect($criteria, $con);

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
			$criteria->add(LioferprePeer::ID, $pks, Criteria::IN);
			$objs = LioferprePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLioferprePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/LioferpreMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.LioferpreMapBuilder');
}
