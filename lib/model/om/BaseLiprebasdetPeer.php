<?php


abstract class BaseLiprebasdetPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'liprebasdet';

	
	const CLASS_DEFAULT = 'lib.model.Liprebasdet';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REQART = 'liprebasdet.REQART';

	
	const CODART = 'liprebasdet.CODART';

	
	const DESART = 'liprebasdet.DESART';

	
	const CODCAT = 'liprebasdet.CODCAT';

	
	const CANREQ = 'liprebasdet.CANREQ';

	
	const CANREC = 'liprebasdet.CANREC';

	
	const MONTOT = 'liprebasdet.MONTOT';

	
	const COSTO = 'liprebasdet.COSTO';

	
	const MONRGO = 'liprebasdet.MONRGO';

	
	const CANORD = 'liprebasdet.CANORD';

	
	const MONDES = 'liprebasdet.MONDES';

	
	const RELART = 'liprebasdet.RELART';

	
	const UNIMED = 'liprebasdet.UNIMED';

	
	const CODPAR = 'liprebasdet.CODPAR';

	
	const ID = 'liprebasdet.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Reqart', 'Codart', 'Desart', 'Codcat', 'Canreq', 'Canrec', 'Montot', 'Costo', 'Monrgo', 'Canord', 'Mondes', 'Relart', 'Unimed', 'Codpar', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LiprebasdetPeer::REQART, LiprebasdetPeer::CODART, LiprebasdetPeer::DESART, LiprebasdetPeer::CODCAT, LiprebasdetPeer::CANREQ, LiprebasdetPeer::CANREC, LiprebasdetPeer::MONTOT, LiprebasdetPeer::COSTO, LiprebasdetPeer::MONRGO, LiprebasdetPeer::CANORD, LiprebasdetPeer::MONDES, LiprebasdetPeer::RELART, LiprebasdetPeer::UNIMED, LiprebasdetPeer::CODPAR, LiprebasdetPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('reqart', 'codart', 'desart', 'codcat', 'canreq', 'canrec', 'montot', 'costo', 'monrgo', 'canord', 'mondes', 'relart', 'unimed', 'codpar', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Reqart' => 0, 'Codart' => 1, 'Desart' => 2, 'Codcat' => 3, 'Canreq' => 4, 'Canrec' => 5, 'Montot' => 6, 'Costo' => 7, 'Monrgo' => 8, 'Canord' => 9, 'Mondes' => 10, 'Relart' => 11, 'Unimed' => 12, 'Codpar' => 13, 'Id' => 14, ),
		BasePeer::TYPE_COLNAME => array (LiprebasdetPeer::REQART => 0, LiprebasdetPeer::CODART => 1, LiprebasdetPeer::DESART => 2, LiprebasdetPeer::CODCAT => 3, LiprebasdetPeer::CANREQ => 4, LiprebasdetPeer::CANREC => 5, LiprebasdetPeer::MONTOT => 6, LiprebasdetPeer::COSTO => 7, LiprebasdetPeer::MONRGO => 8, LiprebasdetPeer::CANORD => 9, LiprebasdetPeer::MONDES => 10, LiprebasdetPeer::RELART => 11, LiprebasdetPeer::UNIMED => 12, LiprebasdetPeer::CODPAR => 13, LiprebasdetPeer::ID => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('reqart' => 0, 'codart' => 1, 'desart' => 2, 'codcat' => 3, 'canreq' => 4, 'canrec' => 5, 'montot' => 6, 'costo' => 7, 'monrgo' => 8, 'canord' => 9, 'mondes' => 10, 'relart' => 11, 'unimed' => 12, 'codpar' => 13, 'id' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/LiprebasdetMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.LiprebasdetMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LiprebasdetPeer::getTableMap();
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
		return str_replace(LiprebasdetPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LiprebasdetPeer::REQART);

		$criteria->addSelectColumn(LiprebasdetPeer::CODART);

		$criteria->addSelectColumn(LiprebasdetPeer::DESART);

		$criteria->addSelectColumn(LiprebasdetPeer::CODCAT);

		$criteria->addSelectColumn(LiprebasdetPeer::CANREQ);

		$criteria->addSelectColumn(LiprebasdetPeer::CANREC);

		$criteria->addSelectColumn(LiprebasdetPeer::MONTOT);

		$criteria->addSelectColumn(LiprebasdetPeer::COSTO);

		$criteria->addSelectColumn(LiprebasdetPeer::MONRGO);

		$criteria->addSelectColumn(LiprebasdetPeer::CANORD);

		$criteria->addSelectColumn(LiprebasdetPeer::MONDES);

		$criteria->addSelectColumn(LiprebasdetPeer::RELART);

		$criteria->addSelectColumn(LiprebasdetPeer::UNIMED);

		$criteria->addSelectColumn(LiprebasdetPeer::CODPAR);

		$criteria->addSelectColumn(LiprebasdetPeer::ID);

	}

	const COUNT = 'COUNT(liprebasdet.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT liprebasdet.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiprebasdetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiprebasdetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LiprebasdetPeer::doSelectRS($criteria, $con);
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
		$objects = LiprebasdetPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LiprebasdetPeer::populateObjects(LiprebasdetPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LiprebasdetPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LiprebasdetPeer::getOMClass();
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
		return LiprebasdetPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LiprebasdetPeer::ID); 

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
			$comparison = $criteria->getComparison(LiprebasdetPeer::ID);
			$selectCriteria->add(LiprebasdetPeer::ID, $criteria->remove(LiprebasdetPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LiprebasdetPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LiprebasdetPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Liprebasdet) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LiprebasdetPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Liprebasdet $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LiprebasdetPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LiprebasdetPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LiprebasdetPeer::DATABASE_NAME, LiprebasdetPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LiprebasdetPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LiprebasdetPeer::DATABASE_NAME);

		$criteria->add(LiprebasdetPeer::ID, $pk);


		$v = LiprebasdetPeer::doSelect($criteria, $con);

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
			$criteria->add(LiprebasdetPeer::ID, $pks, Criteria::IN);
			$objs = LiprebasdetPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLiprebasdetPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/LiprebasdetMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.LiprebasdetMapBuilder');
}
