<?php


abstract class BaseCpmovfuefinPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cpmovfuefin';

	
	const CLASS_DEFAULT = 'lib.model.presupuesto.Cpmovfuefin';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CORREL = 'cpmovfuefin.CORREL';

	
	const REFMOV = 'cpmovfuefin.REFMOV';

	
	const TIPMOV = 'cpmovfuefin.TIPMOV';

	
	const MONMOV = 'cpmovfuefin.MONMOV';

	
	const FECMOV = 'cpmovfuefin.FECMOV';

	
	const CODPRE = 'cpmovfuefin.CODPRE';

	
	const STAMOV = 'cpmovfuefin.STAMOV';

	
	const ID = 'cpmovfuefin.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Correl', 'Refmov', 'Tipmov', 'Monmov', 'Fecmov', 'Codpre', 'Stamov', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CpmovfuefinPeer::CORREL, CpmovfuefinPeer::REFMOV, CpmovfuefinPeer::TIPMOV, CpmovfuefinPeer::MONMOV, CpmovfuefinPeer::FECMOV, CpmovfuefinPeer::CODPRE, CpmovfuefinPeer::STAMOV, CpmovfuefinPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('correl', 'refmov', 'tipmov', 'monmov', 'fecmov', 'codpre', 'stamov', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Correl' => 0, 'Refmov' => 1, 'Tipmov' => 2, 'Monmov' => 3, 'Fecmov' => 4, 'Codpre' => 5, 'Stamov' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (CpmovfuefinPeer::CORREL => 0, CpmovfuefinPeer::REFMOV => 1, CpmovfuefinPeer::TIPMOV => 2, CpmovfuefinPeer::MONMOV => 3, CpmovfuefinPeer::FECMOV => 4, CpmovfuefinPeer::CODPRE => 5, CpmovfuefinPeer::STAMOV => 6, CpmovfuefinPeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('correl' => 0, 'refmov' => 1, 'tipmov' => 2, 'monmov' => 3, 'fecmov' => 4, 'codpre' => 5, 'stamov' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/presupuesto/map/CpmovfuefinMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.presupuesto.map.CpmovfuefinMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CpmovfuefinPeer::getTableMap();
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
		return str_replace(CpmovfuefinPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CpmovfuefinPeer::CORREL);

		$criteria->addSelectColumn(CpmovfuefinPeer::REFMOV);

		$criteria->addSelectColumn(CpmovfuefinPeer::TIPMOV);

		$criteria->addSelectColumn(CpmovfuefinPeer::MONMOV);

		$criteria->addSelectColumn(CpmovfuefinPeer::FECMOV);

		$criteria->addSelectColumn(CpmovfuefinPeer::CODPRE);

		$criteria->addSelectColumn(CpmovfuefinPeer::STAMOV);

		$criteria->addSelectColumn(CpmovfuefinPeer::ID);

	}

	const COUNT = 'COUNT(cpmovfuefin.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cpmovfuefin.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpmovfuefinPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpmovfuefinPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CpmovfuefinPeer::doSelectRS($criteria, $con);
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
		$objects = CpmovfuefinPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CpmovfuefinPeer::populateObjects(CpmovfuefinPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CpmovfuefinPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CpmovfuefinPeer::getOMClass();
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
		return CpmovfuefinPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CpmovfuefinPeer::ID); 

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
			$comparison = $criteria->getComparison(CpmovfuefinPeer::ID);
			$selectCriteria->add(CpmovfuefinPeer::ID, $criteria->remove(CpmovfuefinPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CpmovfuefinPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CpmovfuefinPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cpmovfuefin) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CpmovfuefinPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cpmovfuefin $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CpmovfuefinPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CpmovfuefinPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CpmovfuefinPeer::DATABASE_NAME, CpmovfuefinPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CpmovfuefinPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CpmovfuefinPeer::DATABASE_NAME);

		$criteria->add(CpmovfuefinPeer::ID, $pk);


		$v = CpmovfuefinPeer::doSelect($criteria, $con);

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
			$criteria->add(CpmovfuefinPeer::ID, $pks, Criteria::IN);
			$objs = CpmovfuefinPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCpmovfuefinPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/presupuesto/map/CpmovfuefinMapBuilder.php';
	Propel::registerMapBuilder('lib.model.presupuesto.map.CpmovfuefinMapBuilder');
}
