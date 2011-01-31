<?php


abstract class BaseCaprocomartPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'caprocomart';

	
	const CLASS_DEFAULT = 'lib.model.Caprocomart';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const FECPROCOM = 'caprocomart.FECPROCOM';

	
	const CANPRO = 'caprocomart.CANPRO';

	
	const MONPRO = 'caprocomart.MONPRO';

	
	const MESPRO = 'caprocomart.MESPRO';

	
	const CODEDO = 'caprocomart.CODEDO';

	
	const CODCAT = 'caprocomart.CODCAT';

	
	const CODCIU = 'caprocomart.CODCIU';

	
	const CODMUN = 'caprocomart.CODMUN';

	
	const CODFIN = 'caprocomart.CODFIN';

	
	const CODART = 'caprocomart.CODART';

	
	const ID = 'caprocomart.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Fecprocom', 'Canpro', 'Monpro', 'Mespro', 'Codedo', 'Codcat', 'Codciu', 'Codmun', 'Codfin', 'Codart', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CaprocomartPeer::FECPROCOM, CaprocomartPeer::CANPRO, CaprocomartPeer::MONPRO, CaprocomartPeer::MESPRO, CaprocomartPeer::CODEDO, CaprocomartPeer::CODCAT, CaprocomartPeer::CODCIU, CaprocomartPeer::CODMUN, CaprocomartPeer::CODFIN, CaprocomartPeer::CODART, CaprocomartPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('fecprocom', 'canpro', 'monpro', 'mespro', 'codedo', 'codcat', 'codciu', 'codmun', 'codfin', 'codart', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Fecprocom' => 0, 'Canpro' => 1, 'Monpro' => 2, 'Mespro' => 3, 'Codedo' => 4, 'Codcat' => 5, 'Codciu' => 6, 'Codmun' => 7, 'Codfin' => 8, 'Codart' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (CaprocomartPeer::FECPROCOM => 0, CaprocomartPeer::CANPRO => 1, CaprocomartPeer::MONPRO => 2, CaprocomartPeer::MESPRO => 3, CaprocomartPeer::CODEDO => 4, CaprocomartPeer::CODCAT => 5, CaprocomartPeer::CODCIU => 6, CaprocomartPeer::CODMUN => 7, CaprocomartPeer::CODFIN => 8, CaprocomartPeer::CODART => 9, CaprocomartPeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('fecprocom' => 0, 'canpro' => 1, 'monpro' => 2, 'mespro' => 3, 'codedo' => 4, 'codcat' => 5, 'codciu' => 6, 'codmun' => 7, 'codfin' => 8, 'codart' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CaprocomartMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CaprocomartMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CaprocomartPeer::getTableMap();
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
		return str_replace(CaprocomartPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CaprocomartPeer::FECPROCOM);

		$criteria->addSelectColumn(CaprocomartPeer::CANPRO);

		$criteria->addSelectColumn(CaprocomartPeer::MONPRO);

		$criteria->addSelectColumn(CaprocomartPeer::MESPRO);

		$criteria->addSelectColumn(CaprocomartPeer::CODEDO);

		$criteria->addSelectColumn(CaprocomartPeer::CODCAT);

		$criteria->addSelectColumn(CaprocomartPeer::CODCIU);

		$criteria->addSelectColumn(CaprocomartPeer::CODMUN);

		$criteria->addSelectColumn(CaprocomartPeer::CODFIN);

		$criteria->addSelectColumn(CaprocomartPeer::CODART);

		$criteria->addSelectColumn(CaprocomartPeer::ID);

	}

	const COUNT = 'COUNT(caprocomart.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT caprocomart.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CaprocomartPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CaprocomartPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CaprocomartPeer::doSelectRS($criteria, $con);
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
		$objects = CaprocomartPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CaprocomartPeer::populateObjects(CaprocomartPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CaprocomartPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CaprocomartPeer::getOMClass();
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
		return CaprocomartPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CaprocomartPeer::ID); 

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
			$comparison = $criteria->getComparison(CaprocomartPeer::ID);
			$selectCriteria->add(CaprocomartPeer::ID, $criteria->remove(CaprocomartPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CaprocomartPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CaprocomartPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Caprocomart) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CaprocomartPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Caprocomart $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CaprocomartPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CaprocomartPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CaprocomartPeer::DATABASE_NAME, CaprocomartPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CaprocomartPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CaprocomartPeer::DATABASE_NAME);

		$criteria->add(CaprocomartPeer::ID, $pk);


		$v = CaprocomartPeer::doSelect($criteria, $con);

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
			$criteria->add(CaprocomartPeer::ID, $pks, Criteria::IN);
			$objs = CaprocomartPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCaprocomartPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CaprocomartMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CaprocomartMapBuilder');
}
