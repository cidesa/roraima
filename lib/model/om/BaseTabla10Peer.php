<?php


abstract class BaseTabla10Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tabla10';

	
	const CLASS_DEFAULT = 'lib.model.Tabla10';

	
	const NUM_COLUMNS = 17;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFCOM = 'tabla10.REFCOM';

	
	const TIPCOM = 'tabla10.TIPCOM';

	
	const FECCOM = 'tabla10.FECCOM';

	
	const ANOCOM = 'tabla10.ANOCOM';

	
	const REFPRC = 'tabla10.REFPRC';

	
	const TIPPRC = 'tabla10.TIPPRC';

	
	const DESCOM = 'tabla10.DESCOM';

	
	const DESANU = 'tabla10.DESANU';

	
	const MONCOM = 'tabla10.MONCOM';

	
	const SALCAU = 'tabla10.SALCAU';

	
	const SALPAG = 'tabla10.SALPAG';

	
	const SALAJU = 'tabla10.SALAJU';

	
	const STACOM = 'tabla10.STACOM';

	
	const FECANU = 'tabla10.FECANU';

	
	const CEDRIF = 'tabla10.CEDRIF';

	
	const TIPO = 'tabla10.TIPO';

	
	const ID = 'tabla10.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refcom', 'Tipcom', 'Feccom', 'Anocom', 'Refprc', 'Tipprc', 'Descom', 'Desanu', 'Moncom', 'Salcau', 'Salpag', 'Salaju', 'Stacom', 'Fecanu', 'Cedrif', 'Tipo', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Tabla10Peer::REFCOM, Tabla10Peer::TIPCOM, Tabla10Peer::FECCOM, Tabla10Peer::ANOCOM, Tabla10Peer::REFPRC, Tabla10Peer::TIPPRC, Tabla10Peer::DESCOM, Tabla10Peer::DESANU, Tabla10Peer::MONCOM, Tabla10Peer::SALCAU, Tabla10Peer::SALPAG, Tabla10Peer::SALAJU, Tabla10Peer::STACOM, Tabla10Peer::FECANU, Tabla10Peer::CEDRIF, Tabla10Peer::TIPO, Tabla10Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refcom', 'tipcom', 'feccom', 'anocom', 'refprc', 'tipprc', 'descom', 'desanu', 'moncom', 'salcau', 'salpag', 'salaju', 'stacom', 'fecanu', 'cedrif', 'tipo', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refcom' => 0, 'Tipcom' => 1, 'Feccom' => 2, 'Anocom' => 3, 'Refprc' => 4, 'Tipprc' => 5, 'Descom' => 6, 'Desanu' => 7, 'Moncom' => 8, 'Salcau' => 9, 'Salpag' => 10, 'Salaju' => 11, 'Stacom' => 12, 'Fecanu' => 13, 'Cedrif' => 14, 'Tipo' => 15, 'Id' => 16, ),
		BasePeer::TYPE_COLNAME => array (Tabla10Peer::REFCOM => 0, Tabla10Peer::TIPCOM => 1, Tabla10Peer::FECCOM => 2, Tabla10Peer::ANOCOM => 3, Tabla10Peer::REFPRC => 4, Tabla10Peer::TIPPRC => 5, Tabla10Peer::DESCOM => 6, Tabla10Peer::DESANU => 7, Tabla10Peer::MONCOM => 8, Tabla10Peer::SALCAU => 9, Tabla10Peer::SALPAG => 10, Tabla10Peer::SALAJU => 11, Tabla10Peer::STACOM => 12, Tabla10Peer::FECANU => 13, Tabla10Peer::CEDRIF => 14, Tabla10Peer::TIPO => 15, Tabla10Peer::ID => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('refcom' => 0, 'tipcom' => 1, 'feccom' => 2, 'anocom' => 3, 'refprc' => 4, 'tipprc' => 5, 'descom' => 6, 'desanu' => 7, 'moncom' => 8, 'salcau' => 9, 'salpag' => 10, 'salaju' => 11, 'stacom' => 12, 'fecanu' => 13, 'cedrif' => 14, 'tipo' => 15, 'id' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Tabla10MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Tabla10MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Tabla10Peer::getTableMap();
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
		return str_replace(Tabla10Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Tabla10Peer::REFCOM);

		$criteria->addSelectColumn(Tabla10Peer::TIPCOM);

		$criteria->addSelectColumn(Tabla10Peer::FECCOM);

		$criteria->addSelectColumn(Tabla10Peer::ANOCOM);

		$criteria->addSelectColumn(Tabla10Peer::REFPRC);

		$criteria->addSelectColumn(Tabla10Peer::TIPPRC);

		$criteria->addSelectColumn(Tabla10Peer::DESCOM);

		$criteria->addSelectColumn(Tabla10Peer::DESANU);

		$criteria->addSelectColumn(Tabla10Peer::MONCOM);

		$criteria->addSelectColumn(Tabla10Peer::SALCAU);

		$criteria->addSelectColumn(Tabla10Peer::SALPAG);

		$criteria->addSelectColumn(Tabla10Peer::SALAJU);

		$criteria->addSelectColumn(Tabla10Peer::STACOM);

		$criteria->addSelectColumn(Tabla10Peer::FECANU);

		$criteria->addSelectColumn(Tabla10Peer::CEDRIF);

		$criteria->addSelectColumn(Tabla10Peer::TIPO);

		$criteria->addSelectColumn(Tabla10Peer::ID);

	}

	const COUNT = 'COUNT(tabla10.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tabla10.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Tabla10Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Tabla10Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Tabla10Peer::doSelectRS($criteria, $con);
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
		$objects = Tabla10Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Tabla10Peer::populateObjects(Tabla10Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Tabla10Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Tabla10Peer::getOMClass();
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
		return Tabla10Peer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(Tabla10Peer::ID); 

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
			$comparison = $criteria->getComparison(Tabla10Peer::ID);
			$selectCriteria->add(Tabla10Peer::ID, $criteria->remove(Tabla10Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Tabla10Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Tabla10Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tabla10) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Tabla10Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tabla10 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Tabla10Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Tabla10Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Tabla10Peer::DATABASE_NAME, Tabla10Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Tabla10Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Tabla10Peer::DATABASE_NAME);

		$criteria->add(Tabla10Peer::ID, $pk);


		$v = Tabla10Peer::doSelect($criteria, $con);

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
			$criteria->add(Tabla10Peer::ID, $pks, Criteria::IN);
			$objs = Tabla10Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTabla10Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Tabla10MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Tabla10MapBuilder');
}
