<?php


abstract class BaseLirecomendetPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'lirecomendet';

	
	const CLASS_DEFAULT = 'lib.model.Lirecomendet';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMRECOFE = 'lirecomendet.NUMRECOFE';

	
	const CODPRO = 'lirecomendet.CODPRO';

	
	const PUNLEG = 'lirecomendet.PUNLEG';

	
	const PUNTEC = 'lirecomendet.PUNTEC';

	
	const PUNFIN = 'lirecomendet.PUNFIN';

	
	const PUNFIA = 'lirecomendet.PUNFIA';

	
	const PUNTIPEMP = 'lirecomendet.PUNTIPEMP';

	
	const PUNVAN = 'lirecomendet.PUNVAN';

	
	const PUNMIN = 'lirecomendet.PUNMIN';

	
	const PUNTOT = 'lirecomendet.PUNTOT';

	
	const ID = 'lirecomendet.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numrecofe', 'Codpro', 'Punleg', 'Puntec', 'Punfin', 'Punfia', 'Puntipemp', 'Punvan', 'Punmin', 'Puntot', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LirecomendetPeer::NUMRECOFE, LirecomendetPeer::CODPRO, LirecomendetPeer::PUNLEG, LirecomendetPeer::PUNTEC, LirecomendetPeer::PUNFIN, LirecomendetPeer::PUNFIA, LirecomendetPeer::PUNTIPEMP, LirecomendetPeer::PUNVAN, LirecomendetPeer::PUNMIN, LirecomendetPeer::PUNTOT, LirecomendetPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numrecofe', 'codpro', 'punleg', 'puntec', 'punfin', 'punfia', 'puntipemp', 'punvan', 'punmin', 'puntot', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numrecofe' => 0, 'Codpro' => 1, 'Punleg' => 2, 'Puntec' => 3, 'Punfin' => 4, 'Punfia' => 5, 'Puntipemp' => 6, 'Punvan' => 7, 'Punmin' => 8, 'Puntot' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (LirecomendetPeer::NUMRECOFE => 0, LirecomendetPeer::CODPRO => 1, LirecomendetPeer::PUNLEG => 2, LirecomendetPeer::PUNTEC => 3, LirecomendetPeer::PUNFIN => 4, LirecomendetPeer::PUNFIA => 5, LirecomendetPeer::PUNTIPEMP => 6, LirecomendetPeer::PUNVAN => 7, LirecomendetPeer::PUNMIN => 8, LirecomendetPeer::PUNTOT => 9, LirecomendetPeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('numrecofe' => 0, 'codpro' => 1, 'punleg' => 2, 'puntec' => 3, 'punfin' => 4, 'punfia' => 5, 'puntipemp' => 6, 'punvan' => 7, 'punmin' => 8, 'puntot' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/LirecomendetMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.LirecomendetMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LirecomendetPeer::getTableMap();
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
		return str_replace(LirecomendetPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LirecomendetPeer::NUMRECOFE);

		$criteria->addSelectColumn(LirecomendetPeer::CODPRO);

		$criteria->addSelectColumn(LirecomendetPeer::PUNLEG);

		$criteria->addSelectColumn(LirecomendetPeer::PUNTEC);

		$criteria->addSelectColumn(LirecomendetPeer::PUNFIN);

		$criteria->addSelectColumn(LirecomendetPeer::PUNFIA);

		$criteria->addSelectColumn(LirecomendetPeer::PUNTIPEMP);

		$criteria->addSelectColumn(LirecomendetPeer::PUNVAN);

		$criteria->addSelectColumn(LirecomendetPeer::PUNMIN);

		$criteria->addSelectColumn(LirecomendetPeer::PUNTOT);

		$criteria->addSelectColumn(LirecomendetPeer::ID);

	}

	const COUNT = 'COUNT(lirecomendet.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT lirecomendet.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LirecomendetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LirecomendetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LirecomendetPeer::doSelectRS($criteria, $con);
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
		$objects = LirecomendetPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LirecomendetPeer::populateObjects(LirecomendetPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LirecomendetPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LirecomendetPeer::getOMClass();
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
		return LirecomendetPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LirecomendetPeer::ID); 

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
			$comparison = $criteria->getComparison(LirecomendetPeer::ID);
			$selectCriteria->add(LirecomendetPeer::ID, $criteria->remove(LirecomendetPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LirecomendetPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LirecomendetPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Lirecomendet) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LirecomendetPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Lirecomendet $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LirecomendetPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LirecomendetPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LirecomendetPeer::DATABASE_NAME, LirecomendetPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LirecomendetPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LirecomendetPeer::DATABASE_NAME);

		$criteria->add(LirecomendetPeer::ID, $pk);


		$v = LirecomendetPeer::doSelect($criteria, $con);

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
			$criteria->add(LirecomendetPeer::ID, $pks, Criteria::IN);
			$objs = LirecomendetPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLirecomendetPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/LirecomendetMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.LirecomendetMapBuilder');
}
