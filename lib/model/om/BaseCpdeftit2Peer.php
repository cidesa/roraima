<?php


abstract class BaseCpdeftit2Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cpdeftit_2';

	
	const CLASS_DEFAULT = 'lib.model.Cpdeftit2';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODPRE = 'cpdeftit_2.CODPRE';

	
	const NOMPRE = 'cpdeftit_2.NOMPRE';

	
	const CODCTA = 'cpdeftit_2.CODCTA';

	
	const STACOD = 'cpdeftit_2.STACOD';

	
	const CODUNI = 'cpdeftit_2.CODUNI';

	
	const ESTATUS = 'cpdeftit_2.ESTATUS';

	
	const CODTIP = 'cpdeftit_2.CODTIP';

	
	const ID = 'cpdeftit_2.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codpre', 'Nompre', 'Codcta', 'Stacod', 'Coduni', 'Estatus', 'Codtip', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Cpdeftit2Peer::CODPRE, Cpdeftit2Peer::NOMPRE, Cpdeftit2Peer::CODCTA, Cpdeftit2Peer::STACOD, Cpdeftit2Peer::CODUNI, Cpdeftit2Peer::ESTATUS, Cpdeftit2Peer::CODTIP, Cpdeftit2Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codpre', 'nompre', 'codcta', 'stacod', 'coduni', 'estatus', 'codtip', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codpre' => 0, 'Nompre' => 1, 'Codcta' => 2, 'Stacod' => 3, 'Coduni' => 4, 'Estatus' => 5, 'Codtip' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (Cpdeftit2Peer::CODPRE => 0, Cpdeftit2Peer::NOMPRE => 1, Cpdeftit2Peer::CODCTA => 2, Cpdeftit2Peer::STACOD => 3, Cpdeftit2Peer::CODUNI => 4, Cpdeftit2Peer::ESTATUS => 5, Cpdeftit2Peer::CODTIP => 6, Cpdeftit2Peer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('codpre' => 0, 'nompre' => 1, 'codcta' => 2, 'stacod' => 3, 'coduni' => 4, 'estatus' => 5, 'codtip' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Cpdeftit2MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Cpdeftit2MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Cpdeftit2Peer::getTableMap();
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
		return str_replace(Cpdeftit2Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Cpdeftit2Peer::CODPRE);

		$criteria->addSelectColumn(Cpdeftit2Peer::NOMPRE);

		$criteria->addSelectColumn(Cpdeftit2Peer::CODCTA);

		$criteria->addSelectColumn(Cpdeftit2Peer::STACOD);

		$criteria->addSelectColumn(Cpdeftit2Peer::CODUNI);

		$criteria->addSelectColumn(Cpdeftit2Peer::ESTATUS);

		$criteria->addSelectColumn(Cpdeftit2Peer::CODTIP);

		$criteria->addSelectColumn(Cpdeftit2Peer::ID);

	}

	const COUNT = 'COUNT(cpdeftit_2.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cpdeftit_2.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Cpdeftit2Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Cpdeftit2Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Cpdeftit2Peer::doSelectRS($criteria, $con);
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
		$objects = Cpdeftit2Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Cpdeftit2Peer::populateObjects(Cpdeftit2Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Cpdeftit2Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Cpdeftit2Peer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return Cpdeftit2Peer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(Cpdeftit2Peer::ID);
			$selectCriteria->add(Cpdeftit2Peer::ID, $criteria->remove(Cpdeftit2Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Cpdeftit2Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Cpdeftit2Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cpdeftit2) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Cpdeftit2Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cpdeftit2 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Cpdeftit2Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Cpdeftit2Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Cpdeftit2Peer::DATABASE_NAME, Cpdeftit2Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Cpdeftit2Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Cpdeftit2Peer::DATABASE_NAME);

		$criteria->add(Cpdeftit2Peer::ID, $pk);


		$v = Cpdeftit2Peer::doSelect($criteria, $con);

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
			$criteria->add(Cpdeftit2Peer::ID, $pks, Criteria::IN);
			$objs = Cpdeftit2Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCpdeftit2Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Cpdeftit2MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Cpdeftit2MapBuilder');
}
