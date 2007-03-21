<?php


abstract class BaseTabla32Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tabla32';

	
	const CLASS_DEFAULT = 'lib.model.Tabla32';

	
	const NUM_COLUMNS = 17;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFCOM = 'tabla32.REFCOM';

	
	const TIPCOM = 'tabla32.TIPCOM';

	
	const FECCOM = 'tabla32.FECCOM';

	
	const ANOCOM = 'tabla32.ANOCOM';

	
	const REFPRC = 'tabla32.REFPRC';

	
	const TIPPRC = 'tabla32.TIPPRC';

	
	const DESCOM = 'tabla32.DESCOM';

	
	const DESANU = 'tabla32.DESANU';

	
	const MONCOM = 'tabla32.MONCOM';

	
	const SALCAU = 'tabla32.SALCAU';

	
	const SALPAG = 'tabla32.SALPAG';

	
	const SALAJU = 'tabla32.SALAJU';

	
	const STACOM = 'tabla32.STACOM';

	
	const FECANU = 'tabla32.FECANU';

	
	const CEDRIF = 'tabla32.CEDRIF';

	
	const TIPO = 'tabla32.TIPO';

	
	const ID = 'tabla32.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refcom', 'Tipcom', 'Feccom', 'Anocom', 'Refprc', 'Tipprc', 'Descom', 'Desanu', 'Moncom', 'Salcau', 'Salpag', 'Salaju', 'Stacom', 'Fecanu', 'Cedrif', 'Tipo', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Tabla32Peer::REFCOM, Tabla32Peer::TIPCOM, Tabla32Peer::FECCOM, Tabla32Peer::ANOCOM, Tabla32Peer::REFPRC, Tabla32Peer::TIPPRC, Tabla32Peer::DESCOM, Tabla32Peer::DESANU, Tabla32Peer::MONCOM, Tabla32Peer::SALCAU, Tabla32Peer::SALPAG, Tabla32Peer::SALAJU, Tabla32Peer::STACOM, Tabla32Peer::FECANU, Tabla32Peer::CEDRIF, Tabla32Peer::TIPO, Tabla32Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refcom', 'tipcom', 'feccom', 'anocom', 'refprc', 'tipprc', 'descom', 'desanu', 'moncom', 'salcau', 'salpag', 'salaju', 'stacom', 'fecanu', 'cedrif', 'tipo', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refcom' => 0, 'Tipcom' => 1, 'Feccom' => 2, 'Anocom' => 3, 'Refprc' => 4, 'Tipprc' => 5, 'Descom' => 6, 'Desanu' => 7, 'Moncom' => 8, 'Salcau' => 9, 'Salpag' => 10, 'Salaju' => 11, 'Stacom' => 12, 'Fecanu' => 13, 'Cedrif' => 14, 'Tipo' => 15, 'Id' => 16, ),
		BasePeer::TYPE_COLNAME => array (Tabla32Peer::REFCOM => 0, Tabla32Peer::TIPCOM => 1, Tabla32Peer::FECCOM => 2, Tabla32Peer::ANOCOM => 3, Tabla32Peer::REFPRC => 4, Tabla32Peer::TIPPRC => 5, Tabla32Peer::DESCOM => 6, Tabla32Peer::DESANU => 7, Tabla32Peer::MONCOM => 8, Tabla32Peer::SALCAU => 9, Tabla32Peer::SALPAG => 10, Tabla32Peer::SALAJU => 11, Tabla32Peer::STACOM => 12, Tabla32Peer::FECANU => 13, Tabla32Peer::CEDRIF => 14, Tabla32Peer::TIPO => 15, Tabla32Peer::ID => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('refcom' => 0, 'tipcom' => 1, 'feccom' => 2, 'anocom' => 3, 'refprc' => 4, 'tipprc' => 5, 'descom' => 6, 'desanu' => 7, 'moncom' => 8, 'salcau' => 9, 'salpag' => 10, 'salaju' => 11, 'stacom' => 12, 'fecanu' => 13, 'cedrif' => 14, 'tipo' => 15, 'id' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Tabla32MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Tabla32MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Tabla32Peer::getTableMap();
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
		return str_replace(Tabla32Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Tabla32Peer::REFCOM);

		$criteria->addSelectColumn(Tabla32Peer::TIPCOM);

		$criteria->addSelectColumn(Tabla32Peer::FECCOM);

		$criteria->addSelectColumn(Tabla32Peer::ANOCOM);

		$criteria->addSelectColumn(Tabla32Peer::REFPRC);

		$criteria->addSelectColumn(Tabla32Peer::TIPPRC);

		$criteria->addSelectColumn(Tabla32Peer::DESCOM);

		$criteria->addSelectColumn(Tabla32Peer::DESANU);

		$criteria->addSelectColumn(Tabla32Peer::MONCOM);

		$criteria->addSelectColumn(Tabla32Peer::SALCAU);

		$criteria->addSelectColumn(Tabla32Peer::SALPAG);

		$criteria->addSelectColumn(Tabla32Peer::SALAJU);

		$criteria->addSelectColumn(Tabla32Peer::STACOM);

		$criteria->addSelectColumn(Tabla32Peer::FECANU);

		$criteria->addSelectColumn(Tabla32Peer::CEDRIF);

		$criteria->addSelectColumn(Tabla32Peer::TIPO);

		$criteria->addSelectColumn(Tabla32Peer::ID);

	}

	const COUNT = 'COUNT(tabla32.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tabla32.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Tabla32Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Tabla32Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Tabla32Peer::doSelectRS($criteria, $con);
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
		$objects = Tabla32Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Tabla32Peer::populateObjects(Tabla32Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Tabla32Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Tabla32Peer::getOMClass();
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
		return Tabla32Peer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(Tabla32Peer::ID);
			$selectCriteria->add(Tabla32Peer::ID, $criteria->remove(Tabla32Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Tabla32Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Tabla32Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tabla32) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Tabla32Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tabla32 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Tabla32Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Tabla32Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Tabla32Peer::DATABASE_NAME, Tabla32Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Tabla32Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Tabla32Peer::DATABASE_NAME);

		$criteria->add(Tabla32Peer::ID, $pk);


		$v = Tabla32Peer::doSelect($criteria, $con);

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
			$criteria->add(Tabla32Peer::ID, $pks, Criteria::IN);
			$objs = Tabla32Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTabla32Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Tabla32MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Tabla32MapBuilder');
}
