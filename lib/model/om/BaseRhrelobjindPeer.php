<?php


abstract class BaseRhrelobjindPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'rhrelobjind';

	
	const CLASS_DEFAULT = 'lib.model.Rhrelobjind';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEVDO = 'rhrelobjind.CODEVDO';

	
	const CODNIV = 'rhrelobjind.CODNIV';

	
	const CODOBJ = 'rhrelobjind.CODOBJ';

	
	const CODIND = 'rhrelobjind.CODIND';

	
	const PESOBJ = 'rhrelobjind.PESOBJ';

	
	const PLAOBJ = 'rhrelobjind.PLAOBJ';

	
	const ID = 'rhrelobjind.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codevdo', 'Codniv', 'Codobj', 'Codind', 'Pesobj', 'Plaobj', 'Id', ),
		BasePeer::TYPE_COLNAME => array (RhrelobjindPeer::CODEVDO, RhrelobjindPeer::CODNIV, RhrelobjindPeer::CODOBJ, RhrelobjindPeer::CODIND, RhrelobjindPeer::PESOBJ, RhrelobjindPeer::PLAOBJ, RhrelobjindPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codevdo', 'codniv', 'codobj', 'codind', 'pesobj', 'plaobj', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codevdo' => 0, 'Codniv' => 1, 'Codobj' => 2, 'Codind' => 3, 'Pesobj' => 4, 'Plaobj' => 5, 'Id' => 6, ),
		BasePeer::TYPE_COLNAME => array (RhrelobjindPeer::CODEVDO => 0, RhrelobjindPeer::CODNIV => 1, RhrelobjindPeer::CODOBJ => 2, RhrelobjindPeer::CODIND => 3, RhrelobjindPeer::PESOBJ => 4, RhrelobjindPeer::PLAOBJ => 5, RhrelobjindPeer::ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('codevdo' => 0, 'codniv' => 1, 'codobj' => 2, 'codind' => 3, 'pesobj' => 4, 'plaobj' => 5, 'id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/RhrelobjindMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.RhrelobjindMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = RhrelobjindPeer::getTableMap();
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
		return str_replace(RhrelobjindPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(RhrelobjindPeer::CODEVDO);

		$criteria->addSelectColumn(RhrelobjindPeer::CODNIV);

		$criteria->addSelectColumn(RhrelobjindPeer::CODOBJ);

		$criteria->addSelectColumn(RhrelobjindPeer::CODIND);

		$criteria->addSelectColumn(RhrelobjindPeer::PESOBJ);

		$criteria->addSelectColumn(RhrelobjindPeer::PLAOBJ);

		$criteria->addSelectColumn(RhrelobjindPeer::ID);

	}

	const COUNT = 'COUNT(rhrelobjind.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT rhrelobjind.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RhrelobjindPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RhrelobjindPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = RhrelobjindPeer::doSelectRS($criteria, $con);
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
		$objects = RhrelobjindPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return RhrelobjindPeer::populateObjects(RhrelobjindPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			RhrelobjindPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = RhrelobjindPeer::getOMClass();
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
		return RhrelobjindPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(RhrelobjindPeer::ID); 

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
			$comparison = $criteria->getComparison(RhrelobjindPeer::ID);
			$selectCriteria->add(RhrelobjindPeer::ID, $criteria->remove(RhrelobjindPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(RhrelobjindPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(RhrelobjindPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Rhrelobjind) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(RhrelobjindPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Rhrelobjind $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(RhrelobjindPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(RhrelobjindPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(RhrelobjindPeer::DATABASE_NAME, RhrelobjindPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = RhrelobjindPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(RhrelobjindPeer::DATABASE_NAME);

		$criteria->add(RhrelobjindPeer::ID, $pk);


		$v = RhrelobjindPeer::doSelect($criteria, $con);

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
			$criteria->add(RhrelobjindPeer::ID, $pks, Criteria::IN);
			$objs = RhrelobjindPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseRhrelobjindPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/RhrelobjindMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.RhrelobjindMapBuilder');
}
