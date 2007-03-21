<?php


abstract class BaseTabla1Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tabla1';

	
	const CLASS_DEFAULT = 'lib.model.Tabla1';

	
	const NUM_COLUMNS = 18;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODPRE = 'tabla1.CODPRE';

	
	const NOMPRE = 'tabla1.NOMPRE';

	
	const PERPRE = 'tabla1.PERPRE';

	
	const ANOPRE = 'tabla1.ANOPRE';

	
	const MONASI = 'tabla1.MONASI';

	
	const MONPRC = 'tabla1.MONPRC';

	
	const MONCOM = 'tabla1.MONCOM';

	
	const MONCAU = 'tabla1.MONCAU';

	
	const MONPAG = 'tabla1.MONPAG';

	
	const MONTRA = 'tabla1.MONTRA';

	
	const MONTRN = 'tabla1.MONTRN';

	
	const MONADI = 'tabla1.MONADI';

	
	const MONDIM = 'tabla1.MONDIM';

	
	const MONAJU = 'tabla1.MONAJU';

	
	const MONDIS = 'tabla1.MONDIS';

	
	const DIFERE = 'tabla1.DIFERE';

	
	const STATUS = 'tabla1.STATUS';

	
	const ID = 'tabla1.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codpre', 'Nompre', 'Perpre', 'Anopre', 'Monasi', 'Monprc', 'Moncom', 'Moncau', 'Monpag', 'Montra', 'Montrn', 'Monadi', 'Mondim', 'Monaju', 'Mondis', 'Difere', 'Status', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Tabla1Peer::CODPRE, Tabla1Peer::NOMPRE, Tabla1Peer::PERPRE, Tabla1Peer::ANOPRE, Tabla1Peer::MONASI, Tabla1Peer::MONPRC, Tabla1Peer::MONCOM, Tabla1Peer::MONCAU, Tabla1Peer::MONPAG, Tabla1Peer::MONTRA, Tabla1Peer::MONTRN, Tabla1Peer::MONADI, Tabla1Peer::MONDIM, Tabla1Peer::MONAJU, Tabla1Peer::MONDIS, Tabla1Peer::DIFERE, Tabla1Peer::STATUS, Tabla1Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codpre', 'nompre', 'perpre', 'anopre', 'monasi', 'monprc', 'moncom', 'moncau', 'monpag', 'montra', 'montrn', 'monadi', 'mondim', 'monaju', 'mondis', 'difere', 'status', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codpre' => 0, 'Nompre' => 1, 'Perpre' => 2, 'Anopre' => 3, 'Monasi' => 4, 'Monprc' => 5, 'Moncom' => 6, 'Moncau' => 7, 'Monpag' => 8, 'Montra' => 9, 'Montrn' => 10, 'Monadi' => 11, 'Mondim' => 12, 'Monaju' => 13, 'Mondis' => 14, 'Difere' => 15, 'Status' => 16, 'Id' => 17, ),
		BasePeer::TYPE_COLNAME => array (Tabla1Peer::CODPRE => 0, Tabla1Peer::NOMPRE => 1, Tabla1Peer::PERPRE => 2, Tabla1Peer::ANOPRE => 3, Tabla1Peer::MONASI => 4, Tabla1Peer::MONPRC => 5, Tabla1Peer::MONCOM => 6, Tabla1Peer::MONCAU => 7, Tabla1Peer::MONPAG => 8, Tabla1Peer::MONTRA => 9, Tabla1Peer::MONTRN => 10, Tabla1Peer::MONADI => 11, Tabla1Peer::MONDIM => 12, Tabla1Peer::MONAJU => 13, Tabla1Peer::MONDIS => 14, Tabla1Peer::DIFERE => 15, Tabla1Peer::STATUS => 16, Tabla1Peer::ID => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('codpre' => 0, 'nompre' => 1, 'perpre' => 2, 'anopre' => 3, 'monasi' => 4, 'monprc' => 5, 'moncom' => 6, 'moncau' => 7, 'monpag' => 8, 'montra' => 9, 'montrn' => 10, 'monadi' => 11, 'mondim' => 12, 'monaju' => 13, 'mondis' => 14, 'difere' => 15, 'status' => 16, 'id' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Tabla1MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Tabla1MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Tabla1Peer::getTableMap();
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
		return str_replace(Tabla1Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Tabla1Peer::CODPRE);

		$criteria->addSelectColumn(Tabla1Peer::NOMPRE);

		$criteria->addSelectColumn(Tabla1Peer::PERPRE);

		$criteria->addSelectColumn(Tabla1Peer::ANOPRE);

		$criteria->addSelectColumn(Tabla1Peer::MONASI);

		$criteria->addSelectColumn(Tabla1Peer::MONPRC);

		$criteria->addSelectColumn(Tabla1Peer::MONCOM);

		$criteria->addSelectColumn(Tabla1Peer::MONCAU);

		$criteria->addSelectColumn(Tabla1Peer::MONPAG);

		$criteria->addSelectColumn(Tabla1Peer::MONTRA);

		$criteria->addSelectColumn(Tabla1Peer::MONTRN);

		$criteria->addSelectColumn(Tabla1Peer::MONADI);

		$criteria->addSelectColumn(Tabla1Peer::MONDIM);

		$criteria->addSelectColumn(Tabla1Peer::MONAJU);

		$criteria->addSelectColumn(Tabla1Peer::MONDIS);

		$criteria->addSelectColumn(Tabla1Peer::DIFERE);

		$criteria->addSelectColumn(Tabla1Peer::STATUS);

		$criteria->addSelectColumn(Tabla1Peer::ID);

	}

	const COUNT = 'COUNT(tabla1.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tabla1.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Tabla1Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Tabla1Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Tabla1Peer::doSelectRS($criteria, $con);
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
		$objects = Tabla1Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Tabla1Peer::populateObjects(Tabla1Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Tabla1Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Tabla1Peer::getOMClass();
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
		return Tabla1Peer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(Tabla1Peer::ID);
			$selectCriteria->add(Tabla1Peer::ID, $criteria->remove(Tabla1Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Tabla1Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Tabla1Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tabla1) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Tabla1Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tabla1 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Tabla1Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Tabla1Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Tabla1Peer::DATABASE_NAME, Tabla1Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Tabla1Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Tabla1Peer::DATABASE_NAME);

		$criteria->add(Tabla1Peer::ID, $pk);


		$v = Tabla1Peer::doSelect($criteria, $con);

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
			$criteria->add(Tabla1Peer::ID, $pks, Criteria::IN);
			$objs = Tabla1Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTabla1Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Tabla1MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Tabla1MapBuilder');
}
