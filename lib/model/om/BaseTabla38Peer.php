<?php


abstract class BaseTabla38Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tabla38';

	
	const CLASS_DEFAULT = 'lib.model.Tabla38';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFPAG = 'tabla38.REFPAG';

	
	const TIPPAG = 'tabla38.TIPPAG';

	
	const FECPAG = 'tabla38.FECPAG';

	
	const ANOPAG = 'tabla38.ANOPAG';

	
	const REFCAU = 'tabla38.REFCAU';

	
	const TIPCAU = 'tabla38.TIPCAU';

	
	const DESPAG = 'tabla38.DESPAG';

	
	const DESANU = 'tabla38.DESANU';

	
	const MONPAG = 'tabla38.MONPAG';

	
	const SALAJU = 'tabla38.SALAJU';

	
	const STAPAG = 'tabla38.STAPAG';

	
	const FECANU = 'tabla38.FECANU';

	
	const CEDRIF = 'tabla38.CEDRIF';

	
	const ID = 'tabla38.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refpag', 'Tippag', 'Fecpag', 'Anopag', 'Refcau', 'Tipcau', 'Despag', 'Desanu', 'Monpag', 'Salaju', 'Stapag', 'Fecanu', 'Cedrif', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Tabla38Peer::REFPAG, Tabla38Peer::TIPPAG, Tabla38Peer::FECPAG, Tabla38Peer::ANOPAG, Tabla38Peer::REFCAU, Tabla38Peer::TIPCAU, Tabla38Peer::DESPAG, Tabla38Peer::DESANU, Tabla38Peer::MONPAG, Tabla38Peer::SALAJU, Tabla38Peer::STAPAG, Tabla38Peer::FECANU, Tabla38Peer::CEDRIF, Tabla38Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refpag', 'tippag', 'fecpag', 'anopag', 'refcau', 'tipcau', 'despag', 'desanu', 'monpag', 'salaju', 'stapag', 'fecanu', 'cedrif', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refpag' => 0, 'Tippag' => 1, 'Fecpag' => 2, 'Anopag' => 3, 'Refcau' => 4, 'Tipcau' => 5, 'Despag' => 6, 'Desanu' => 7, 'Monpag' => 8, 'Salaju' => 9, 'Stapag' => 10, 'Fecanu' => 11, 'Cedrif' => 12, 'Id' => 13, ),
		BasePeer::TYPE_COLNAME => array (Tabla38Peer::REFPAG => 0, Tabla38Peer::TIPPAG => 1, Tabla38Peer::FECPAG => 2, Tabla38Peer::ANOPAG => 3, Tabla38Peer::REFCAU => 4, Tabla38Peer::TIPCAU => 5, Tabla38Peer::DESPAG => 6, Tabla38Peer::DESANU => 7, Tabla38Peer::MONPAG => 8, Tabla38Peer::SALAJU => 9, Tabla38Peer::STAPAG => 10, Tabla38Peer::FECANU => 11, Tabla38Peer::CEDRIF => 12, Tabla38Peer::ID => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('refpag' => 0, 'tippag' => 1, 'fecpag' => 2, 'anopag' => 3, 'refcau' => 4, 'tipcau' => 5, 'despag' => 6, 'desanu' => 7, 'monpag' => 8, 'salaju' => 9, 'stapag' => 10, 'fecanu' => 11, 'cedrif' => 12, 'id' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Tabla38MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Tabla38MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Tabla38Peer::getTableMap();
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
		return str_replace(Tabla38Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Tabla38Peer::REFPAG);

		$criteria->addSelectColumn(Tabla38Peer::TIPPAG);

		$criteria->addSelectColumn(Tabla38Peer::FECPAG);

		$criteria->addSelectColumn(Tabla38Peer::ANOPAG);

		$criteria->addSelectColumn(Tabla38Peer::REFCAU);

		$criteria->addSelectColumn(Tabla38Peer::TIPCAU);

		$criteria->addSelectColumn(Tabla38Peer::DESPAG);

		$criteria->addSelectColumn(Tabla38Peer::DESANU);

		$criteria->addSelectColumn(Tabla38Peer::MONPAG);

		$criteria->addSelectColumn(Tabla38Peer::SALAJU);

		$criteria->addSelectColumn(Tabla38Peer::STAPAG);

		$criteria->addSelectColumn(Tabla38Peer::FECANU);

		$criteria->addSelectColumn(Tabla38Peer::CEDRIF);

		$criteria->addSelectColumn(Tabla38Peer::ID);

	}

	const COUNT = 'COUNT(tabla38.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tabla38.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Tabla38Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Tabla38Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Tabla38Peer::doSelectRS($criteria, $con);
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
		$objects = Tabla38Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Tabla38Peer::populateObjects(Tabla38Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Tabla38Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Tabla38Peer::getOMClass();
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
		return Tabla38Peer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(Tabla38Peer::ID); 

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
			$comparison = $criteria->getComparison(Tabla38Peer::ID);
			$selectCriteria->add(Tabla38Peer::ID, $criteria->remove(Tabla38Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Tabla38Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Tabla38Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tabla38) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Tabla38Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tabla38 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Tabla38Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Tabla38Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Tabla38Peer::DATABASE_NAME, Tabla38Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Tabla38Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Tabla38Peer::DATABASE_NAME);

		$criteria->add(Tabla38Peer::ID, $pk);


		$v = Tabla38Peer::doSelect($criteria, $con);

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
			$criteria->add(Tabla38Peer::ID, $pks, Criteria::IN);
			$objs = Tabla38Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTabla38Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Tabla38MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Tabla38MapBuilder');
}
