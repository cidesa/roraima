<?php


abstract class BaseTabla34Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tabla34';

	
	const CLASS_DEFAULT = 'lib.model.Tabla34';

	
	const NUM_COLUMNS = 17;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFCOM = 'tabla34.REFCOM';

	
	const TIPCOM = 'tabla34.TIPCOM';

	
	const FECCOM = 'tabla34.FECCOM';

	
	const ANOCOM = 'tabla34.ANOCOM';

	
	const REFPRC = 'tabla34.REFPRC';

	
	const TIPPRC = 'tabla34.TIPPRC';

	
	const DESCOM = 'tabla34.DESCOM';

	
	const DESANU = 'tabla34.DESANU';

	
	const MONCOM = 'tabla34.MONCOM';

	
	const SALCAU = 'tabla34.SALCAU';

	
	const SALPAG = 'tabla34.SALPAG';

	
	const SALAJU = 'tabla34.SALAJU';

	
	const STACOM = 'tabla34.STACOM';

	
	const FECANU = 'tabla34.FECANU';

	
	const CEDRIF = 'tabla34.CEDRIF';

	
	const TIPO = 'tabla34.TIPO';

	
	const ID = 'tabla34.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refcom', 'Tipcom', 'Feccom', 'Anocom', 'Refprc', 'Tipprc', 'Descom', 'Desanu', 'Moncom', 'Salcau', 'Salpag', 'Salaju', 'Stacom', 'Fecanu', 'Cedrif', 'Tipo', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Tabla34Peer::REFCOM, Tabla34Peer::TIPCOM, Tabla34Peer::FECCOM, Tabla34Peer::ANOCOM, Tabla34Peer::REFPRC, Tabla34Peer::TIPPRC, Tabla34Peer::DESCOM, Tabla34Peer::DESANU, Tabla34Peer::MONCOM, Tabla34Peer::SALCAU, Tabla34Peer::SALPAG, Tabla34Peer::SALAJU, Tabla34Peer::STACOM, Tabla34Peer::FECANU, Tabla34Peer::CEDRIF, Tabla34Peer::TIPO, Tabla34Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refcom', 'tipcom', 'feccom', 'anocom', 'refprc', 'tipprc', 'descom', 'desanu', 'moncom', 'salcau', 'salpag', 'salaju', 'stacom', 'fecanu', 'cedrif', 'tipo', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refcom' => 0, 'Tipcom' => 1, 'Feccom' => 2, 'Anocom' => 3, 'Refprc' => 4, 'Tipprc' => 5, 'Descom' => 6, 'Desanu' => 7, 'Moncom' => 8, 'Salcau' => 9, 'Salpag' => 10, 'Salaju' => 11, 'Stacom' => 12, 'Fecanu' => 13, 'Cedrif' => 14, 'Tipo' => 15, 'Id' => 16, ),
		BasePeer::TYPE_COLNAME => array (Tabla34Peer::REFCOM => 0, Tabla34Peer::TIPCOM => 1, Tabla34Peer::FECCOM => 2, Tabla34Peer::ANOCOM => 3, Tabla34Peer::REFPRC => 4, Tabla34Peer::TIPPRC => 5, Tabla34Peer::DESCOM => 6, Tabla34Peer::DESANU => 7, Tabla34Peer::MONCOM => 8, Tabla34Peer::SALCAU => 9, Tabla34Peer::SALPAG => 10, Tabla34Peer::SALAJU => 11, Tabla34Peer::STACOM => 12, Tabla34Peer::FECANU => 13, Tabla34Peer::CEDRIF => 14, Tabla34Peer::TIPO => 15, Tabla34Peer::ID => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('refcom' => 0, 'tipcom' => 1, 'feccom' => 2, 'anocom' => 3, 'refprc' => 4, 'tipprc' => 5, 'descom' => 6, 'desanu' => 7, 'moncom' => 8, 'salcau' => 9, 'salpag' => 10, 'salaju' => 11, 'stacom' => 12, 'fecanu' => 13, 'cedrif' => 14, 'tipo' => 15, 'id' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Tabla34MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Tabla34MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Tabla34Peer::getTableMap();
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
		return str_replace(Tabla34Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Tabla34Peer::REFCOM);

		$criteria->addSelectColumn(Tabla34Peer::TIPCOM);

		$criteria->addSelectColumn(Tabla34Peer::FECCOM);

		$criteria->addSelectColumn(Tabla34Peer::ANOCOM);

		$criteria->addSelectColumn(Tabla34Peer::REFPRC);

		$criteria->addSelectColumn(Tabla34Peer::TIPPRC);

		$criteria->addSelectColumn(Tabla34Peer::DESCOM);

		$criteria->addSelectColumn(Tabla34Peer::DESANU);

		$criteria->addSelectColumn(Tabla34Peer::MONCOM);

		$criteria->addSelectColumn(Tabla34Peer::SALCAU);

		$criteria->addSelectColumn(Tabla34Peer::SALPAG);

		$criteria->addSelectColumn(Tabla34Peer::SALAJU);

		$criteria->addSelectColumn(Tabla34Peer::STACOM);

		$criteria->addSelectColumn(Tabla34Peer::FECANU);

		$criteria->addSelectColumn(Tabla34Peer::CEDRIF);

		$criteria->addSelectColumn(Tabla34Peer::TIPO);

		$criteria->addSelectColumn(Tabla34Peer::ID);

	}

	const COUNT = 'COUNT(tabla34.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tabla34.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Tabla34Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Tabla34Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Tabla34Peer::doSelectRS($criteria, $con);
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
		$objects = Tabla34Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Tabla34Peer::populateObjects(Tabla34Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Tabla34Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Tabla34Peer::getOMClass();
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
		return Tabla34Peer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(Tabla34Peer::ID); 

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
			$comparison = $criteria->getComparison(Tabla34Peer::ID);
			$selectCriteria->add(Tabla34Peer::ID, $criteria->remove(Tabla34Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Tabla34Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Tabla34Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tabla34) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Tabla34Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tabla34 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Tabla34Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Tabla34Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Tabla34Peer::DATABASE_NAME, Tabla34Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Tabla34Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Tabla34Peer::DATABASE_NAME);

		$criteria->add(Tabla34Peer::ID, $pk);


		$v = Tabla34Peer::doSelect($criteria, $con);

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
			$criteria->add(Tabla34Peer::ID, $pks, Criteria::IN);
			$objs = Tabla34Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTabla34Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Tabla34MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Tabla34MapBuilder');
}
