<?php


abstract class BaseNpcalconcolPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npcalconcol';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Npcalconcol';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODCTR = 'npcalconcol.CODCTR';

	
	const CODCLA = 'npcalconcol.CODCLA';

	
	const CODCON = 'npcalconcol.CODCON';

	
	const CANTRA = 'npcalconcol.CANTRA';

	
	const MONCLA = 'npcalconcol.MONCLA';

	
	const TOTCLA = 'npcalconcol.TOTCLA';

	
	const BASCAL = 'npcalconcol.BASCAL';

	
	const ID = 'npcalconcol.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codctr', 'Codcla', 'Codcon', 'Cantra', 'Moncla', 'Totcla', 'Bascal', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpcalconcolPeer::CODCTR, NpcalconcolPeer::CODCLA, NpcalconcolPeer::CODCON, NpcalconcolPeer::CANTRA, NpcalconcolPeer::MONCLA, NpcalconcolPeer::TOTCLA, NpcalconcolPeer::BASCAL, NpcalconcolPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codctr', 'codcla', 'codcon', 'cantra', 'moncla', 'totcla', 'bascal', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codctr' => 0, 'Codcla' => 1, 'Codcon' => 2, 'Cantra' => 3, 'Moncla' => 4, 'Totcla' => 5, 'Bascal' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (NpcalconcolPeer::CODCTR => 0, NpcalconcolPeer::CODCLA => 1, NpcalconcolPeer::CODCON => 2, NpcalconcolPeer::CANTRA => 3, NpcalconcolPeer::MONCLA => 4, NpcalconcolPeer::TOTCLA => 5, NpcalconcolPeer::BASCAL => 6, NpcalconcolPeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('codctr' => 0, 'codcla' => 1, 'codcon' => 2, 'cantra' => 3, 'moncla' => 4, 'totcla' => 5, 'bascal' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpcalconcolMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpcalconcolMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpcalconcolPeer::getTableMap();
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
		return str_replace(NpcalconcolPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpcalconcolPeer::CODCTR);

		$criteria->addSelectColumn(NpcalconcolPeer::CODCLA);

		$criteria->addSelectColumn(NpcalconcolPeer::CODCON);

		$criteria->addSelectColumn(NpcalconcolPeer::CANTRA);

		$criteria->addSelectColumn(NpcalconcolPeer::MONCLA);

		$criteria->addSelectColumn(NpcalconcolPeer::TOTCLA);

		$criteria->addSelectColumn(NpcalconcolPeer::BASCAL);

		$criteria->addSelectColumn(NpcalconcolPeer::ID);

	}

	const COUNT = 'COUNT(npcalconcol.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npcalconcol.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpcalconcolPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpcalconcolPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpcalconcolPeer::doSelectRS($criteria, $con);
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
		$objects = NpcalconcolPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpcalconcolPeer::populateObjects(NpcalconcolPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpcalconcolPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpcalconcolPeer::getOMClass();
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
		return NpcalconcolPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpcalconcolPeer::ID); 

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
			$comparison = $criteria->getComparison(NpcalconcolPeer::ID);
			$selectCriteria->add(NpcalconcolPeer::ID, $criteria->remove(NpcalconcolPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpcalconcolPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpcalconcolPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npcalconcol) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpcalconcolPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npcalconcol $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpcalconcolPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpcalconcolPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpcalconcolPeer::DATABASE_NAME, NpcalconcolPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpcalconcolPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpcalconcolPeer::DATABASE_NAME);

		$criteria->add(NpcalconcolPeer::ID, $pk);


		$v = NpcalconcolPeer::doSelect($criteria, $con);

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
			$criteria->add(NpcalconcolPeer::ID, $pks, Criteria::IN);
			$objs = NpcalconcolPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpcalconcolPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpcalconcolMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpcalconcolMapBuilder');
}
