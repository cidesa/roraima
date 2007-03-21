<?php


abstract class BaseTabla33Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tabla33';

	
	const CLASS_DEFAULT = 'lib.model.Tabla33';

	
	const NUM_COLUMNS = 17;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFCOM = 'tabla33.REFCOM';

	
	const TIPCOM = 'tabla33.TIPCOM';

	
	const FECCOM = 'tabla33.FECCOM';

	
	const ANOCOM = 'tabla33.ANOCOM';

	
	const REFPRC = 'tabla33.REFPRC';

	
	const TIPPRC = 'tabla33.TIPPRC';

	
	const DESCOM = 'tabla33.DESCOM';

	
	const DESANU = 'tabla33.DESANU';

	
	const MONCOM = 'tabla33.MONCOM';

	
	const SALCAU = 'tabla33.SALCAU';

	
	const SALPAG = 'tabla33.SALPAG';

	
	const SALAJU = 'tabla33.SALAJU';

	
	const STACOM = 'tabla33.STACOM';

	
	const FECANU = 'tabla33.FECANU';

	
	const CEDRIF = 'tabla33.CEDRIF';

	
	const TIPO = 'tabla33.TIPO';

	
	const ID = 'tabla33.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refcom', 'Tipcom', 'Feccom', 'Anocom', 'Refprc', 'Tipprc', 'Descom', 'Desanu', 'Moncom', 'Salcau', 'Salpag', 'Salaju', 'Stacom', 'Fecanu', 'Cedrif', 'Tipo', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Tabla33Peer::REFCOM, Tabla33Peer::TIPCOM, Tabla33Peer::FECCOM, Tabla33Peer::ANOCOM, Tabla33Peer::REFPRC, Tabla33Peer::TIPPRC, Tabla33Peer::DESCOM, Tabla33Peer::DESANU, Tabla33Peer::MONCOM, Tabla33Peer::SALCAU, Tabla33Peer::SALPAG, Tabla33Peer::SALAJU, Tabla33Peer::STACOM, Tabla33Peer::FECANU, Tabla33Peer::CEDRIF, Tabla33Peer::TIPO, Tabla33Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refcom', 'tipcom', 'feccom', 'anocom', 'refprc', 'tipprc', 'descom', 'desanu', 'moncom', 'salcau', 'salpag', 'salaju', 'stacom', 'fecanu', 'cedrif', 'tipo', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refcom' => 0, 'Tipcom' => 1, 'Feccom' => 2, 'Anocom' => 3, 'Refprc' => 4, 'Tipprc' => 5, 'Descom' => 6, 'Desanu' => 7, 'Moncom' => 8, 'Salcau' => 9, 'Salpag' => 10, 'Salaju' => 11, 'Stacom' => 12, 'Fecanu' => 13, 'Cedrif' => 14, 'Tipo' => 15, 'Id' => 16, ),
		BasePeer::TYPE_COLNAME => array (Tabla33Peer::REFCOM => 0, Tabla33Peer::TIPCOM => 1, Tabla33Peer::FECCOM => 2, Tabla33Peer::ANOCOM => 3, Tabla33Peer::REFPRC => 4, Tabla33Peer::TIPPRC => 5, Tabla33Peer::DESCOM => 6, Tabla33Peer::DESANU => 7, Tabla33Peer::MONCOM => 8, Tabla33Peer::SALCAU => 9, Tabla33Peer::SALPAG => 10, Tabla33Peer::SALAJU => 11, Tabla33Peer::STACOM => 12, Tabla33Peer::FECANU => 13, Tabla33Peer::CEDRIF => 14, Tabla33Peer::TIPO => 15, Tabla33Peer::ID => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('refcom' => 0, 'tipcom' => 1, 'feccom' => 2, 'anocom' => 3, 'refprc' => 4, 'tipprc' => 5, 'descom' => 6, 'desanu' => 7, 'moncom' => 8, 'salcau' => 9, 'salpag' => 10, 'salaju' => 11, 'stacom' => 12, 'fecanu' => 13, 'cedrif' => 14, 'tipo' => 15, 'id' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Tabla33MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Tabla33MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Tabla33Peer::getTableMap();
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
		return str_replace(Tabla33Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Tabla33Peer::REFCOM);

		$criteria->addSelectColumn(Tabla33Peer::TIPCOM);

		$criteria->addSelectColumn(Tabla33Peer::FECCOM);

		$criteria->addSelectColumn(Tabla33Peer::ANOCOM);

		$criteria->addSelectColumn(Tabla33Peer::REFPRC);

		$criteria->addSelectColumn(Tabla33Peer::TIPPRC);

		$criteria->addSelectColumn(Tabla33Peer::DESCOM);

		$criteria->addSelectColumn(Tabla33Peer::DESANU);

		$criteria->addSelectColumn(Tabla33Peer::MONCOM);

		$criteria->addSelectColumn(Tabla33Peer::SALCAU);

		$criteria->addSelectColumn(Tabla33Peer::SALPAG);

		$criteria->addSelectColumn(Tabla33Peer::SALAJU);

		$criteria->addSelectColumn(Tabla33Peer::STACOM);

		$criteria->addSelectColumn(Tabla33Peer::FECANU);

		$criteria->addSelectColumn(Tabla33Peer::CEDRIF);

		$criteria->addSelectColumn(Tabla33Peer::TIPO);

		$criteria->addSelectColumn(Tabla33Peer::ID);

	}

	const COUNT = 'COUNT(tabla33.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tabla33.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Tabla33Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Tabla33Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Tabla33Peer::doSelectRS($criteria, $con);
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
		$objects = Tabla33Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Tabla33Peer::populateObjects(Tabla33Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Tabla33Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Tabla33Peer::getOMClass();
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
		return Tabla33Peer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(Tabla33Peer::ID);
			$selectCriteria->add(Tabla33Peer::ID, $criteria->remove(Tabla33Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Tabla33Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Tabla33Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tabla33) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Tabla33Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tabla33 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Tabla33Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Tabla33Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Tabla33Peer::DATABASE_NAME, Tabla33Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Tabla33Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Tabla33Peer::DATABASE_NAME);

		$criteria->add(Tabla33Peer::ID, $pk);


		$v = Tabla33Peer::doSelect($criteria, $con);

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
			$criteria->add(Tabla33Peer::ID, $pks, Criteria::IN);
			$objs = Tabla33Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTabla33Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Tabla33MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Tabla33MapBuilder');
}
