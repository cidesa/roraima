<?php


abstract class BaseNpsalint05022007Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npsalint_05022007';

	
	const CLASS_DEFAULT = 'lib.model.Npsalint05022007';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODCON = 'npsalint_05022007.CODCON';

	
	const CODEMP = 'npsalint_05022007.CODEMP';

	
	const CODASI = 'npsalint_05022007.CODASI';

	
	const MONASI = 'npsalint_05022007.MONASI';

	
	const FECINICON = 'npsalint_05022007.FECINICON';

	
	const FECFINCON = 'npsalint_05022007.FECFINCON';

	
	const ID = 'npsalint_05022007.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codcon', 'Codemp', 'Codasi', 'Monasi', 'Fecinicon', 'Fecfincon', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Npsalint05022007Peer::CODCON, Npsalint05022007Peer::CODEMP, Npsalint05022007Peer::CODASI, Npsalint05022007Peer::MONASI, Npsalint05022007Peer::FECINICON, Npsalint05022007Peer::FECFINCON, Npsalint05022007Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codcon', 'codemp', 'codasi', 'monasi', 'fecinicon', 'fecfincon', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codcon' => 0, 'Codemp' => 1, 'Codasi' => 2, 'Monasi' => 3, 'Fecinicon' => 4, 'Fecfincon' => 5, 'Id' => 6, ),
		BasePeer::TYPE_COLNAME => array (Npsalint05022007Peer::CODCON => 0, Npsalint05022007Peer::CODEMP => 1, Npsalint05022007Peer::CODASI => 2, Npsalint05022007Peer::MONASI => 3, Npsalint05022007Peer::FECINICON => 4, Npsalint05022007Peer::FECFINCON => 5, Npsalint05022007Peer::ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('codcon' => 0, 'codemp' => 1, 'codasi' => 2, 'monasi' => 3, 'fecinicon' => 4, 'fecfincon' => 5, 'id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Npsalint05022007MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Npsalint05022007MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Npsalint05022007Peer::getTableMap();
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
		return str_replace(Npsalint05022007Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Npsalint05022007Peer::CODCON);

		$criteria->addSelectColumn(Npsalint05022007Peer::CODEMP);

		$criteria->addSelectColumn(Npsalint05022007Peer::CODASI);

		$criteria->addSelectColumn(Npsalint05022007Peer::MONASI);

		$criteria->addSelectColumn(Npsalint05022007Peer::FECINICON);

		$criteria->addSelectColumn(Npsalint05022007Peer::FECFINCON);

		$criteria->addSelectColumn(Npsalint05022007Peer::ID);

	}

	const COUNT = 'COUNT(npsalint_05022007.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npsalint_05022007.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Npsalint05022007Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Npsalint05022007Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Npsalint05022007Peer::doSelectRS($criteria, $con);
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
		$objects = Npsalint05022007Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Npsalint05022007Peer::populateObjects(Npsalint05022007Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Npsalint05022007Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Npsalint05022007Peer::getOMClass();
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
		return Npsalint05022007Peer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(Npsalint05022007Peer::ID);
			$selectCriteria->add(Npsalint05022007Peer::ID, $criteria->remove(Npsalint05022007Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Npsalint05022007Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Npsalint05022007Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npsalint05022007) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Npsalint05022007Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npsalint05022007 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Npsalint05022007Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Npsalint05022007Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Npsalint05022007Peer::DATABASE_NAME, Npsalint05022007Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Npsalint05022007Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Npsalint05022007Peer::DATABASE_NAME);

		$criteria->add(Npsalint05022007Peer::ID, $pk);


		$v = Npsalint05022007Peer::doSelect($criteria, $con);

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
			$criteria->add(Npsalint05022007Peer::ID, $pks, Criteria::IN);
			$objs = Npsalint05022007Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpsalint05022007Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Npsalint05022007MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Npsalint05022007MapBuilder');
}
