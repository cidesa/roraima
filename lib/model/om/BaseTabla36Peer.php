<?php


abstract class BaseTabla36Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tabla36';

	
	const CLASS_DEFAULT = 'lib.model.Tabla36';

	
	const NUM_COLUMNS = 17;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFCOM = 'tabla36.REFCOM';

	
	const TIPCOM = 'tabla36.TIPCOM';

	
	const FECCOM = 'tabla36.FECCOM';

	
	const ANOCOM = 'tabla36.ANOCOM';

	
	const REFPRC = 'tabla36.REFPRC';

	
	const TIPPRC = 'tabla36.TIPPRC';

	
	const DESCOM = 'tabla36.DESCOM';

	
	const DESANU = 'tabla36.DESANU';

	
	const MONCOM = 'tabla36.MONCOM';

	
	const SALCAU = 'tabla36.SALCAU';

	
	const SALPAG = 'tabla36.SALPAG';

	
	const SALAJU = 'tabla36.SALAJU';

	
	const STACOM = 'tabla36.STACOM';

	
	const FECANU = 'tabla36.FECANU';

	
	const CEDRIF = 'tabla36.CEDRIF';

	
	const TIPO = 'tabla36.TIPO';

	
	const ID = 'tabla36.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refcom', 'Tipcom', 'Feccom', 'Anocom', 'Refprc', 'Tipprc', 'Descom', 'Desanu', 'Moncom', 'Salcau', 'Salpag', 'Salaju', 'Stacom', 'Fecanu', 'Cedrif', 'Tipo', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Tabla36Peer::REFCOM, Tabla36Peer::TIPCOM, Tabla36Peer::FECCOM, Tabla36Peer::ANOCOM, Tabla36Peer::REFPRC, Tabla36Peer::TIPPRC, Tabla36Peer::DESCOM, Tabla36Peer::DESANU, Tabla36Peer::MONCOM, Tabla36Peer::SALCAU, Tabla36Peer::SALPAG, Tabla36Peer::SALAJU, Tabla36Peer::STACOM, Tabla36Peer::FECANU, Tabla36Peer::CEDRIF, Tabla36Peer::TIPO, Tabla36Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refcom', 'tipcom', 'feccom', 'anocom', 'refprc', 'tipprc', 'descom', 'desanu', 'moncom', 'salcau', 'salpag', 'salaju', 'stacom', 'fecanu', 'cedrif', 'tipo', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refcom' => 0, 'Tipcom' => 1, 'Feccom' => 2, 'Anocom' => 3, 'Refprc' => 4, 'Tipprc' => 5, 'Descom' => 6, 'Desanu' => 7, 'Moncom' => 8, 'Salcau' => 9, 'Salpag' => 10, 'Salaju' => 11, 'Stacom' => 12, 'Fecanu' => 13, 'Cedrif' => 14, 'Tipo' => 15, 'Id' => 16, ),
		BasePeer::TYPE_COLNAME => array (Tabla36Peer::REFCOM => 0, Tabla36Peer::TIPCOM => 1, Tabla36Peer::FECCOM => 2, Tabla36Peer::ANOCOM => 3, Tabla36Peer::REFPRC => 4, Tabla36Peer::TIPPRC => 5, Tabla36Peer::DESCOM => 6, Tabla36Peer::DESANU => 7, Tabla36Peer::MONCOM => 8, Tabla36Peer::SALCAU => 9, Tabla36Peer::SALPAG => 10, Tabla36Peer::SALAJU => 11, Tabla36Peer::STACOM => 12, Tabla36Peer::FECANU => 13, Tabla36Peer::CEDRIF => 14, Tabla36Peer::TIPO => 15, Tabla36Peer::ID => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('refcom' => 0, 'tipcom' => 1, 'feccom' => 2, 'anocom' => 3, 'refprc' => 4, 'tipprc' => 5, 'descom' => 6, 'desanu' => 7, 'moncom' => 8, 'salcau' => 9, 'salpag' => 10, 'salaju' => 11, 'stacom' => 12, 'fecanu' => 13, 'cedrif' => 14, 'tipo' => 15, 'id' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Tabla36MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Tabla36MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Tabla36Peer::getTableMap();
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
		return str_replace(Tabla36Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Tabla36Peer::REFCOM);

		$criteria->addSelectColumn(Tabla36Peer::TIPCOM);

		$criteria->addSelectColumn(Tabla36Peer::FECCOM);

		$criteria->addSelectColumn(Tabla36Peer::ANOCOM);

		$criteria->addSelectColumn(Tabla36Peer::REFPRC);

		$criteria->addSelectColumn(Tabla36Peer::TIPPRC);

		$criteria->addSelectColumn(Tabla36Peer::DESCOM);

		$criteria->addSelectColumn(Tabla36Peer::DESANU);

		$criteria->addSelectColumn(Tabla36Peer::MONCOM);

		$criteria->addSelectColumn(Tabla36Peer::SALCAU);

		$criteria->addSelectColumn(Tabla36Peer::SALPAG);

		$criteria->addSelectColumn(Tabla36Peer::SALAJU);

		$criteria->addSelectColumn(Tabla36Peer::STACOM);

		$criteria->addSelectColumn(Tabla36Peer::FECANU);

		$criteria->addSelectColumn(Tabla36Peer::CEDRIF);

		$criteria->addSelectColumn(Tabla36Peer::TIPO);

		$criteria->addSelectColumn(Tabla36Peer::ID);

	}

	const COUNT = 'COUNT(tabla36.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tabla36.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Tabla36Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Tabla36Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Tabla36Peer::doSelectRS($criteria, $con);
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
		$objects = Tabla36Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Tabla36Peer::populateObjects(Tabla36Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Tabla36Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Tabla36Peer::getOMClass();
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
		return Tabla36Peer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(Tabla36Peer::ID); 

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
			$comparison = $criteria->getComparison(Tabla36Peer::ID);
			$selectCriteria->add(Tabla36Peer::ID, $criteria->remove(Tabla36Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Tabla36Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Tabla36Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tabla36) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Tabla36Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tabla36 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Tabla36Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Tabla36Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Tabla36Peer::DATABASE_NAME, Tabla36Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Tabla36Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Tabla36Peer::DATABASE_NAME);

		$criteria->add(Tabla36Peer::ID, $pk);


		$v = Tabla36Peer::doSelect($criteria, $con);

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
			$criteria->add(Tabla36Peer::ID, $pks, Criteria::IN);
			$objs = Tabla36Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTabla36Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Tabla36MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Tabla36MapBuilder');
}
