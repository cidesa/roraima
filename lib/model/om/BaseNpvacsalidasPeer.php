<?php


abstract class BaseNpvacsalidasPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npvacsalidas';

	
	const CLASS_DEFAULT = 'lib.model.Npvacsalidas';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'npvacsalidas.CODEMP';

	
	const FECVAC = 'npvacsalidas.FECVAC';

	
	const DIASDISFRUTAR = 'npvacsalidas.DIASDISFRUTAR';

	
	const OBSERVA = 'npvacsalidas.OBSERVA';

	
	const FECDES = 'npvacsalidas.FECDES';

	
	const FECHAS = 'npvacsalidas.FECHAS';

	
	const ID = 'npvacsalidas.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Fecvac', 'Diasdisfrutar', 'Observa', 'Fecdes', 'Fechas', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpvacsalidasPeer::CODEMP, NpvacsalidasPeer::FECVAC, NpvacsalidasPeer::DIASDISFRUTAR, NpvacsalidasPeer::OBSERVA, NpvacsalidasPeer::FECDES, NpvacsalidasPeer::FECHAS, NpvacsalidasPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'fecvac', 'diasdisfrutar', 'observa', 'fecdes', 'fechas', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Fecvac' => 1, 'Diasdisfrutar' => 2, 'Observa' => 3, 'Fecdes' => 4, 'Fechas' => 5, 'Id' => 6, ),
		BasePeer::TYPE_COLNAME => array (NpvacsalidasPeer::CODEMP => 0, NpvacsalidasPeer::FECVAC => 1, NpvacsalidasPeer::DIASDISFRUTAR => 2, NpvacsalidasPeer::OBSERVA => 3, NpvacsalidasPeer::FECDES => 4, NpvacsalidasPeer::FECHAS => 5, NpvacsalidasPeer::ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'fecvac' => 1, 'diasdisfrutar' => 2, 'observa' => 3, 'fecdes' => 4, 'fechas' => 5, 'id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NpvacsalidasMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NpvacsalidasMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpvacsalidasPeer::getTableMap();
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
		return str_replace(NpvacsalidasPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpvacsalidasPeer::CODEMP);

		$criteria->addSelectColumn(NpvacsalidasPeer::FECVAC);

		$criteria->addSelectColumn(NpvacsalidasPeer::DIASDISFRUTAR);

		$criteria->addSelectColumn(NpvacsalidasPeer::OBSERVA);

		$criteria->addSelectColumn(NpvacsalidasPeer::FECDES);

		$criteria->addSelectColumn(NpvacsalidasPeer::FECHAS);

		$criteria->addSelectColumn(NpvacsalidasPeer::ID);

	}

	const COUNT = 'COUNT(npvacsalidas.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npvacsalidas.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpvacsalidasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpvacsalidasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpvacsalidasPeer::doSelectRS($criteria, $con);
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
		$objects = NpvacsalidasPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpvacsalidasPeer::populateObjects(NpvacsalidasPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpvacsalidasPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpvacsalidasPeer::getOMClass();
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
		return NpvacsalidasPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpvacsalidasPeer::ID); 

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
			$comparison = $criteria->getComparison(NpvacsalidasPeer::ID);
			$selectCriteria->add(NpvacsalidasPeer::ID, $criteria->remove(NpvacsalidasPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpvacsalidasPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpvacsalidasPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npvacsalidas) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpvacsalidasPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npvacsalidas $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpvacsalidasPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpvacsalidasPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpvacsalidasPeer::DATABASE_NAME, NpvacsalidasPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpvacsalidasPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpvacsalidasPeer::DATABASE_NAME);

		$criteria->add(NpvacsalidasPeer::ID, $pk);


		$v = NpvacsalidasPeer::doSelect($criteria, $con);

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
			$criteria->add(NpvacsalidasPeer::ID, $pks, Criteria::IN);
			$objs = NpvacsalidasPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpvacsalidasPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NpvacsalidasMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NpvacsalidasMapBuilder');
}
