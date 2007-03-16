<?php


abstract class BaseFordefobjPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fordefobj';

	
	const CLASS_DEFAULT = 'lib.model.Fordefobj';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODOBJ = 'fordefobj.CODOBJ';

	
	const DESOBJ = 'fordefobj.DESOBJ';

	
	const AREEST = 'fordefobj.AREEST';

	
	const DIREST = 'fordefobj.DIREST';

	
	const OBJEIN = 'fordefobj.OBJEIN';

	
	const OBJEPR = 'fordefobj.OBJEPR';

	
	const ENUPRO = 'fordefobj.ENUPRO';

	
	const INDACT = 'fordefobj.INDACT';

	
	const INDOBJ = 'fordefobj.INDOBJ';

	
	const METPRO = 'fordefobj.METPRO';

	
	const OBJNET = 'fordefobj.OBJNET';

	
	const ID = 'fordefobj.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codobj', 'Desobj', 'Areest', 'Direst', 'Objein', 'Objepr', 'Enupro', 'Indact', 'Indobj', 'Metpro', 'Objnet', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FordefobjPeer::CODOBJ, FordefobjPeer::DESOBJ, FordefobjPeer::AREEST, FordefobjPeer::DIREST, FordefobjPeer::OBJEIN, FordefobjPeer::OBJEPR, FordefobjPeer::ENUPRO, FordefobjPeer::INDACT, FordefobjPeer::INDOBJ, FordefobjPeer::METPRO, FordefobjPeer::OBJNET, FordefobjPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codobj', 'desobj', 'areest', 'direst', 'objein', 'objepr', 'enupro', 'indact', 'indobj', 'metpro', 'objnet', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codobj' => 0, 'Desobj' => 1, 'Areest' => 2, 'Direst' => 3, 'Objein' => 4, 'Objepr' => 5, 'Enupro' => 6, 'Indact' => 7, 'Indobj' => 8, 'Metpro' => 9, 'Objnet' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (FordefobjPeer::CODOBJ => 0, FordefobjPeer::DESOBJ => 1, FordefobjPeer::AREEST => 2, FordefobjPeer::DIREST => 3, FordefobjPeer::OBJEIN => 4, FordefobjPeer::OBJEPR => 5, FordefobjPeer::ENUPRO => 6, FordefobjPeer::INDACT => 7, FordefobjPeer::INDOBJ => 8, FordefobjPeer::METPRO => 9, FordefobjPeer::OBJNET => 10, FordefobjPeer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('codobj' => 0, 'desobj' => 1, 'areest' => 2, 'direst' => 3, 'objein' => 4, 'objepr' => 5, 'enupro' => 6, 'indact' => 7, 'indobj' => 8, 'metpro' => 9, 'objnet' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FordefobjMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FordefobjMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FordefobjPeer::getTableMap();
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
		return str_replace(FordefobjPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FordefobjPeer::CODOBJ);

		$criteria->addSelectColumn(FordefobjPeer::DESOBJ);

		$criteria->addSelectColumn(FordefobjPeer::AREEST);

		$criteria->addSelectColumn(FordefobjPeer::DIREST);

		$criteria->addSelectColumn(FordefobjPeer::OBJEIN);

		$criteria->addSelectColumn(FordefobjPeer::OBJEPR);

		$criteria->addSelectColumn(FordefobjPeer::ENUPRO);

		$criteria->addSelectColumn(FordefobjPeer::INDACT);

		$criteria->addSelectColumn(FordefobjPeer::INDOBJ);

		$criteria->addSelectColumn(FordefobjPeer::METPRO);

		$criteria->addSelectColumn(FordefobjPeer::OBJNET);

		$criteria->addSelectColumn(FordefobjPeer::ID);

	}

	const COUNT = 'COUNT(fordefobj.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fordefobj.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FordefobjPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FordefobjPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FordefobjPeer::doSelectRS($criteria, $con);
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
		$objects = FordefobjPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FordefobjPeer::populateObjects(FordefobjPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FordefobjPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FordefobjPeer::getOMClass();
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
		return FordefobjPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(FordefobjPeer::ID);
			$selectCriteria->add(FordefobjPeer::ID, $criteria->remove(FordefobjPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FordefobjPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FordefobjPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fordefobj) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FordefobjPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fordefobj $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FordefobjPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FordefobjPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FordefobjPeer::DATABASE_NAME, FordefobjPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FordefobjPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FordefobjPeer::DATABASE_NAME);

		$criteria->add(FordefobjPeer::ID, $pk);


		$v = FordefobjPeer::doSelect($criteria, $con);

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
			$criteria->add(FordefobjPeer::ID, $pks, Criteria::IN);
			$objs = FordefobjPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFordefobjPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FordefobjMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FordefobjMapBuilder');
}
