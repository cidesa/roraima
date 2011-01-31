<?php


abstract class BaseViaregsolviaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'viaregsolvia';

	
	const CLASS_DEFAULT = 'lib.model.Viaregsolvia';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CEDEMP = 'viaregsolvia.CEDEMP';

	
	const REFCOM = 'viaregsolvia.REFCOM';

	
	const CODPRE = 'viaregsolvia.CODPRE';

	
	const TIPCOM = 'viaregsolvia.TIPCOM';

	
	const FECHA = 'viaregsolvia.FECHA';

	
	const DESCR = 'viaregsolvia.DESCR';

	
	const VIAREGTIPTAB_ID = 'viaregsolvia.VIAREGTIPTAB_ID';

	
	const MONTO = 'viaregsolvia.MONTO';

	
	const ID = 'viaregsolvia.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Cedemp', 'Refcom', 'Codpre', 'Tipcom', 'Fecha', 'Descr', 'ViaregtiptabId', 'Monto', 'Id', ),
		BasePeer::TYPE_COLNAME => array (ViaregsolviaPeer::CEDEMP, ViaregsolviaPeer::REFCOM, ViaregsolviaPeer::CODPRE, ViaregsolviaPeer::TIPCOM, ViaregsolviaPeer::FECHA, ViaregsolviaPeer::DESCR, ViaregsolviaPeer::VIAREGTIPTAB_ID, ViaregsolviaPeer::MONTO, ViaregsolviaPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('cedemp', 'refcom', 'codpre', 'tipcom', 'fecha', 'descr', 'viaregtiptab_id', 'monto', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Cedemp' => 0, 'Refcom' => 1, 'Codpre' => 2, 'Tipcom' => 3, 'Fecha' => 4, 'Descr' => 5, 'ViaregtiptabId' => 6, 'Monto' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (ViaregsolviaPeer::CEDEMP => 0, ViaregsolviaPeer::REFCOM => 1, ViaregsolviaPeer::CODPRE => 2, ViaregsolviaPeer::TIPCOM => 3, ViaregsolviaPeer::FECHA => 4, ViaregsolviaPeer::DESCR => 5, ViaregsolviaPeer::VIAREGTIPTAB_ID => 6, ViaregsolviaPeer::MONTO => 7, ViaregsolviaPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('cedemp' => 0, 'refcom' => 1, 'codpre' => 2, 'tipcom' => 3, 'fecha' => 4, 'descr' => 5, 'viaregtiptab_id' => 6, 'monto' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ViaregsolviaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ViaregsolviaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ViaregsolviaPeer::getTableMap();
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
		return str_replace(ViaregsolviaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ViaregsolviaPeer::CEDEMP);

		$criteria->addSelectColumn(ViaregsolviaPeer::REFCOM);

		$criteria->addSelectColumn(ViaregsolviaPeer::CODPRE);

		$criteria->addSelectColumn(ViaregsolviaPeer::TIPCOM);

		$criteria->addSelectColumn(ViaregsolviaPeer::FECHA);

		$criteria->addSelectColumn(ViaregsolviaPeer::DESCR);

		$criteria->addSelectColumn(ViaregsolviaPeer::VIAREGTIPTAB_ID);

		$criteria->addSelectColumn(ViaregsolviaPeer::MONTO);

		$criteria->addSelectColumn(ViaregsolviaPeer::ID);

	}

	const COUNT = 'COUNT(viaregsolvia.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT viaregsolvia.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViaregsolviaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViaregsolviaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ViaregsolviaPeer::doSelectRS($criteria, $con);
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
		$objects = ViaregsolviaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ViaregsolviaPeer::populateObjects(ViaregsolviaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ViaregsolviaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ViaregsolviaPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinViaregtiptab(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViaregsolviaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViaregsolviaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ViaregsolviaPeer::VIAREGTIPTAB_ID, ViaregtiptabPeer::ID);

		$rs = ViaregsolviaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinViaregtiptab(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ViaregsolviaPeer::addSelectColumns($c);
		$startcol = (ViaregsolviaPeer::NUM_COLUMNS - ViaregsolviaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ViaregtiptabPeer::addSelectColumns($c);

		$c->addJoin(ViaregsolviaPeer::VIAREGTIPTAB_ID, ViaregtiptabPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ViaregsolviaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ViaregtiptabPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getViaregtiptab(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addViaregsolvia($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initViaregsolvias();
				$obj2->addViaregsolvia($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViaregsolviaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViaregsolviaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ViaregsolviaPeer::VIAREGTIPTAB_ID, ViaregtiptabPeer::ID);

		$rs = ViaregsolviaPeer::doSelectRS($criteria, $con);
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

		ViaregsolviaPeer::addSelectColumns($c);
		$startcol2 = (ViaregsolviaPeer::NUM_COLUMNS - ViaregsolviaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ViaregtiptabPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ViaregtiptabPeer::NUM_COLUMNS;

		$c->addJoin(ViaregsolviaPeer::VIAREGTIPTAB_ID, ViaregtiptabPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ViaregsolviaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = ViaregtiptabPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getViaregtiptab(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addViaregsolvia($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initViaregsolvias();
				$obj2->addViaregsolvia($obj1);
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
		return ViaregsolviaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ViaregsolviaPeer::ID); 

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
			$comparison = $criteria->getComparison(ViaregsolviaPeer::ID);
			$selectCriteria->add(ViaregsolviaPeer::ID, $criteria->remove(ViaregsolviaPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ViaregsolviaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ViaregsolviaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Viaregsolvia) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ViaregsolviaPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Viaregsolvia $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ViaregsolviaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ViaregsolviaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ViaregsolviaPeer::DATABASE_NAME, ViaregsolviaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ViaregsolviaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ViaregsolviaPeer::DATABASE_NAME);

		$criteria->add(ViaregsolviaPeer::ID, $pk);


		$v = ViaregsolviaPeer::doSelect($criteria, $con);

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
			$criteria->add(ViaregsolviaPeer::ID, $pks, Criteria::IN);
			$objs = ViaregsolviaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseViaregsolviaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ViaregsolviaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ViaregsolviaMapBuilder');
}
