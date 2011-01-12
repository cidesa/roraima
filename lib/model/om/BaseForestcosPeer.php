<?php


abstract class BaseForestcosPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'forestcos';

	
	const CLASS_DEFAULT = 'lib.model.Forestcos';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODMET = 'forestcos.CODMET';

	
	const CODPRO = 'forestcos.CODPRO';

	
	const CODACT = 'forestcos.CODACT';

	
	const CODART = 'forestcos.CODART';

	
	const CODPAR = 'forestcos.CODPAR';

	
	const CANUNI = 'forestcos.CANUNI';

	
	const CANART = 'forestcos.CANART';

	
	const MONART = 'forestcos.MONART';

	
	const TOTPRE = 'forestcos.TOTPRE';

	
	const CODFIN = 'forestcos.CODFIN';

	
	const CODTIP = 'forestcos.CODTIP';

	
	const OBSERV = 'forestcos.OBSERV';

	
	const ID = 'forestcos.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codmet', 'Codpro', 'Codact', 'Codart', 'Codpar', 'Canuni', 'Canart', 'Monart', 'Totpre', 'Codfin', 'Codtip', 'Observ', 'Id', ),
		BasePeer::TYPE_COLNAME => array (ForestcosPeer::CODMET, ForestcosPeer::CODPRO, ForestcosPeer::CODACT, ForestcosPeer::CODART, ForestcosPeer::CODPAR, ForestcosPeer::CANUNI, ForestcosPeer::CANART, ForestcosPeer::MONART, ForestcosPeer::TOTPRE, ForestcosPeer::CODFIN, ForestcosPeer::CODTIP, ForestcosPeer::OBSERV, ForestcosPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codmet', 'codpro', 'codact', 'codart', 'codpar', 'canuni', 'canart', 'monart', 'totpre', 'codfin', 'codtip', 'observ', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codmet' => 0, 'Codpro' => 1, 'Codact' => 2, 'Codart' => 3, 'Codpar' => 4, 'Canuni' => 5, 'Canart' => 6, 'Monart' => 7, 'Totpre' => 8, 'Codfin' => 9, 'Codtip' => 10, 'Observ' => 11, 'Id' => 12, ),
		BasePeer::TYPE_COLNAME => array (ForestcosPeer::CODMET => 0, ForestcosPeer::CODPRO => 1, ForestcosPeer::CODACT => 2, ForestcosPeer::CODART => 3, ForestcosPeer::CODPAR => 4, ForestcosPeer::CANUNI => 5, ForestcosPeer::CANART => 6, ForestcosPeer::MONART => 7, ForestcosPeer::TOTPRE => 8, ForestcosPeer::CODFIN => 9, ForestcosPeer::CODTIP => 10, ForestcosPeer::OBSERV => 11, ForestcosPeer::ID => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('codmet' => 0, 'codpro' => 1, 'codact' => 2, 'codart' => 3, 'codpar' => 4, 'canuni' => 5, 'canart' => 6, 'monart' => 7, 'totpre' => 8, 'codfin' => 9, 'codtip' => 10, 'observ' => 11, 'id' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ForestcosMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ForestcosMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ForestcosPeer::getTableMap();
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
		return str_replace(ForestcosPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ForestcosPeer::CODMET);

		$criteria->addSelectColumn(ForestcosPeer::CODPRO);

		$criteria->addSelectColumn(ForestcosPeer::CODACT);

		$criteria->addSelectColumn(ForestcosPeer::CODART);

		$criteria->addSelectColumn(ForestcosPeer::CODPAR);

		$criteria->addSelectColumn(ForestcosPeer::CANUNI);

		$criteria->addSelectColumn(ForestcosPeer::CANART);

		$criteria->addSelectColumn(ForestcosPeer::MONART);

		$criteria->addSelectColumn(ForestcosPeer::TOTPRE);

		$criteria->addSelectColumn(ForestcosPeer::CODFIN);

		$criteria->addSelectColumn(ForestcosPeer::CODTIP);

		$criteria->addSelectColumn(ForestcosPeer::OBSERV);

		$criteria->addSelectColumn(ForestcosPeer::ID);

	}

	const COUNT = 'COUNT(forestcos.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT forestcos.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ForestcosPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ForestcosPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ForestcosPeer::doSelectRS($criteria, $con);
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
		$objects = ForestcosPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ForestcosPeer::populateObjects(ForestcosPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ForestcosPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ForestcosPeer::getOMClass();
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
		return ForestcosPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ForestcosPeer::ID); 

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
			$comparison = $criteria->getComparison(ForestcosPeer::ID);
			$selectCriteria->add(ForestcosPeer::ID, $criteria->remove(ForestcosPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ForestcosPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ForestcosPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Forestcos) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ForestcosPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Forestcos $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ForestcosPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ForestcosPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ForestcosPeer::DATABASE_NAME, ForestcosPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ForestcosPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ForestcosPeer::DATABASE_NAME);

		$criteria->add(ForestcosPeer::ID, $pk);


		$v = ForestcosPeer::doSelect($criteria, $con);

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
			$criteria->add(ForestcosPeer::ID, $pks, Criteria::IN);
			$objs = ForestcosPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseForestcosPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ForestcosMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ForestcosMapBuilder');
}
