<?php


abstract class BaseFormetotrcrePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'formetotrcre';

	
	const CLASS_DEFAULT = 'lib.model.Formetotrcre';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODMET = 'formetotrcre.CODMET';

	
	const CODPRO = 'formetotrcre.CODPRO';

	
	const CODACT = 'formetotrcre.CODACT';

	
	const CANACT = 'formetotrcre.CANACT';

	
	const CODPAREGR = 'formetotrcre.CODPAREGR';

	
	const MONPRE = 'formetotrcre.MONPRE';

	
	const CODORG = 'formetotrcre.CODORG';

	
	const CODTIP = 'formetotrcre.CODTIP';

	
	const OBSERV = 'formetotrcre.OBSERV';

	
	const CODFIN = 'formetotrcre.CODFIN';

	
	const ID = 'formetotrcre.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codmet', 'Codpro', 'Codact', 'Canact', 'Codparegr', 'Monpre', 'Codorg', 'Codtip', 'Observ', 'Codfin', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FormetotrcrePeer::CODMET, FormetotrcrePeer::CODPRO, FormetotrcrePeer::CODACT, FormetotrcrePeer::CANACT, FormetotrcrePeer::CODPAREGR, FormetotrcrePeer::MONPRE, FormetotrcrePeer::CODORG, FormetotrcrePeer::CODTIP, FormetotrcrePeer::OBSERV, FormetotrcrePeer::CODFIN, FormetotrcrePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codmet', 'codpro', 'codact', 'canact', 'codparegr', 'monpre', 'codorg', 'codtip', 'observ', 'codfin', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codmet' => 0, 'Codpro' => 1, 'Codact' => 2, 'Canact' => 3, 'Codparegr' => 4, 'Monpre' => 5, 'Codorg' => 6, 'Codtip' => 7, 'Observ' => 8, 'Codfin' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (FormetotrcrePeer::CODMET => 0, FormetotrcrePeer::CODPRO => 1, FormetotrcrePeer::CODACT => 2, FormetotrcrePeer::CANACT => 3, FormetotrcrePeer::CODPAREGR => 4, FormetotrcrePeer::MONPRE => 5, FormetotrcrePeer::CODORG => 6, FormetotrcrePeer::CODTIP => 7, FormetotrcrePeer::OBSERV => 8, FormetotrcrePeer::CODFIN => 9, FormetotrcrePeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('codmet' => 0, 'codpro' => 1, 'codact' => 2, 'canact' => 3, 'codparegr' => 4, 'monpre' => 5, 'codorg' => 6, 'codtip' => 7, 'observ' => 8, 'codfin' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FormetotrcreMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FormetotrcreMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FormetotrcrePeer::getTableMap();
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
		return str_replace(FormetotrcrePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FormetotrcrePeer::CODMET);

		$criteria->addSelectColumn(FormetotrcrePeer::CODPRO);

		$criteria->addSelectColumn(FormetotrcrePeer::CODACT);

		$criteria->addSelectColumn(FormetotrcrePeer::CANACT);

		$criteria->addSelectColumn(FormetotrcrePeer::CODPAREGR);

		$criteria->addSelectColumn(FormetotrcrePeer::MONPRE);

		$criteria->addSelectColumn(FormetotrcrePeer::CODORG);

		$criteria->addSelectColumn(FormetotrcrePeer::CODTIP);

		$criteria->addSelectColumn(FormetotrcrePeer::OBSERV);

		$criteria->addSelectColumn(FormetotrcrePeer::CODFIN);

		$criteria->addSelectColumn(FormetotrcrePeer::ID);

	}

	const COUNT = 'COUNT(formetotrcre.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT formetotrcre.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FormetotrcrePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FormetotrcrePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FormetotrcrePeer::doSelectRS($criteria, $con);
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
		$objects = FormetotrcrePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FormetotrcrePeer::populateObjects(FormetotrcrePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FormetotrcrePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FormetotrcrePeer::getOMClass();
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
		return FormetotrcrePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FormetotrcrePeer::ID); 

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
			$comparison = $criteria->getComparison(FormetotrcrePeer::ID);
			$selectCriteria->add(FormetotrcrePeer::ID, $criteria->remove(FormetotrcrePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FormetotrcrePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FormetotrcrePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Formetotrcre) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FormetotrcrePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Formetotrcre $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FormetotrcrePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FormetotrcrePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FormetotrcrePeer::DATABASE_NAME, FormetotrcrePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FormetotrcrePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FormetotrcrePeer::DATABASE_NAME);

		$criteria->add(FormetotrcrePeer::ID, $pk);


		$v = FormetotrcrePeer::doSelect($criteria, $con);

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
			$criteria->add(FormetotrcrePeer::ID, $pks, Criteria::IN);
			$objs = FormetotrcrePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFormetotrcrePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FormetotrcreMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FormetotrcreMapBuilder');
}
