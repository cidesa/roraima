<?php


abstract class BaseForotrcreprePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'forotrcrepre';

	
	const CLASS_DEFAULT = 'lib.model.Forotrcrepre';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODCAT = 'forotrcrepre.CODCAT';

	
	const CODPAREGR = 'forotrcrepre.CODPAREGR';

	
	const MONPRE = 'forotrcrepre.MONPRE';

	
	const CODTIP = 'forotrcrepre.CODTIP';

	
	const OBSERV = 'forotrcrepre.OBSERV';

	
	const CODFIN = 'forotrcrepre.CODFIN';

	
	const CODPRE = 'forotrcrepre.CODPRE';

	
	const NOMPAREGR = 'forotrcrepre.NOMPAREGR';

	
	const ID = 'forotrcrepre.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codcat', 'Codparegr', 'Monpre', 'Codtip', 'Observ', 'Codfin', 'Codpre', 'Nomparegr', 'Id', ),
		BasePeer::TYPE_COLNAME => array (ForotrcreprePeer::CODCAT, ForotrcreprePeer::CODPAREGR, ForotrcreprePeer::MONPRE, ForotrcreprePeer::CODTIP, ForotrcreprePeer::OBSERV, ForotrcreprePeer::CODFIN, ForotrcreprePeer::CODPRE, ForotrcreprePeer::NOMPAREGR, ForotrcreprePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codcat', 'codparegr', 'monpre', 'codtip', 'observ', 'codfin', 'codpre', 'nomparegr', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codcat' => 0, 'Codparegr' => 1, 'Monpre' => 2, 'Codtip' => 3, 'Observ' => 4, 'Codfin' => 5, 'Codpre' => 6, 'Nomparegr' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (ForotrcreprePeer::CODCAT => 0, ForotrcreprePeer::CODPAREGR => 1, ForotrcreprePeer::MONPRE => 2, ForotrcreprePeer::CODTIP => 3, ForotrcreprePeer::OBSERV => 4, ForotrcreprePeer::CODFIN => 5, ForotrcreprePeer::CODPRE => 6, ForotrcreprePeer::NOMPAREGR => 7, ForotrcreprePeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('codcat' => 0, 'codparegr' => 1, 'monpre' => 2, 'codtip' => 3, 'observ' => 4, 'codfin' => 5, 'codpre' => 6, 'nomparegr' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ForotrcrepreMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ForotrcrepreMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ForotrcreprePeer::getTableMap();
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
		return str_replace(ForotrcreprePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ForotrcreprePeer::CODCAT);

		$criteria->addSelectColumn(ForotrcreprePeer::CODPAREGR);

		$criteria->addSelectColumn(ForotrcreprePeer::MONPRE);

		$criteria->addSelectColumn(ForotrcreprePeer::CODTIP);

		$criteria->addSelectColumn(ForotrcreprePeer::OBSERV);

		$criteria->addSelectColumn(ForotrcreprePeer::CODFIN);

		$criteria->addSelectColumn(ForotrcreprePeer::CODPRE);

		$criteria->addSelectColumn(ForotrcreprePeer::NOMPAREGR);

		$criteria->addSelectColumn(ForotrcreprePeer::ID);

	}

	const COUNT = 'COUNT(forotrcrepre.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT forotrcrepre.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ForotrcreprePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ForotrcreprePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ForotrcreprePeer::doSelectRS($criteria, $con);
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
		$objects = ForotrcreprePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ForotrcreprePeer::populateObjects(ForotrcreprePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ForotrcreprePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ForotrcreprePeer::getOMClass();
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
		return ForotrcreprePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ForotrcreprePeer::ID); 

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
			$comparison = $criteria->getComparison(ForotrcreprePeer::ID);
			$selectCriteria->add(ForotrcreprePeer::ID, $criteria->remove(ForotrcreprePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ForotrcreprePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ForotrcreprePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Forotrcrepre) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ForotrcreprePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Forotrcrepre $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ForotrcreprePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ForotrcreprePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ForotrcreprePeer::DATABASE_NAME, ForotrcreprePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ForotrcreprePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ForotrcreprePeer::DATABASE_NAME);

		$criteria->add(ForotrcreprePeer::ID, $pk);


		$v = ForotrcreprePeer::doSelect($criteria, $con);

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
			$criteria->add(ForotrcreprePeer::ID, $pks, Criteria::IN);
			$objs = ForotrcreprePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseForotrcreprePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ForotrcrepreMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ForotrcrepreMapBuilder');
}
