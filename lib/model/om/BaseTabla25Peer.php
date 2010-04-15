<?php


abstract class BaseTabla25Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tabla25';

	
	const CLASS_DEFAULT = 'lib.model.Tabla25';

	
	const NUM_COLUMNS = 18;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODPRE = 'tabla25.CODPRE';

	
	const NOMPRE = 'tabla25.NOMPRE';

	
	const PERPRE = 'tabla25.PERPRE';

	
	const ANOPRE = 'tabla25.ANOPRE';

	
	const MONASI = 'tabla25.MONASI';

	
	const MONPRC = 'tabla25.MONPRC';

	
	const MONCOM = 'tabla25.MONCOM';

	
	const MONCAU = 'tabla25.MONCAU';

	
	const MONPAG = 'tabla25.MONPAG';

	
	const MONTRA = 'tabla25.MONTRA';

	
	const MONTRN = 'tabla25.MONTRN';

	
	const MONADI = 'tabla25.MONADI';

	
	const MONDIM = 'tabla25.MONDIM';

	
	const MONAJU = 'tabla25.MONAJU';

	
	const MONDIS = 'tabla25.MONDIS';

	
	const DIFERE = 'tabla25.DIFERE';

	
	const STATUS = 'tabla25.STATUS';

	
	const ID = 'tabla25.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codpre', 'Nompre', 'Perpre', 'Anopre', 'Monasi', 'Monprc', 'Moncom', 'Moncau', 'Monpag', 'Montra', 'Montrn', 'Monadi', 'Mondim', 'Monaju', 'Mondis', 'Difere', 'Status', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Tabla25Peer::CODPRE, Tabla25Peer::NOMPRE, Tabla25Peer::PERPRE, Tabla25Peer::ANOPRE, Tabla25Peer::MONASI, Tabla25Peer::MONPRC, Tabla25Peer::MONCOM, Tabla25Peer::MONCAU, Tabla25Peer::MONPAG, Tabla25Peer::MONTRA, Tabla25Peer::MONTRN, Tabla25Peer::MONADI, Tabla25Peer::MONDIM, Tabla25Peer::MONAJU, Tabla25Peer::MONDIS, Tabla25Peer::DIFERE, Tabla25Peer::STATUS, Tabla25Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codpre', 'nompre', 'perpre', 'anopre', 'monasi', 'monprc', 'moncom', 'moncau', 'monpag', 'montra', 'montrn', 'monadi', 'mondim', 'monaju', 'mondis', 'difere', 'status', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codpre' => 0, 'Nompre' => 1, 'Perpre' => 2, 'Anopre' => 3, 'Monasi' => 4, 'Monprc' => 5, 'Moncom' => 6, 'Moncau' => 7, 'Monpag' => 8, 'Montra' => 9, 'Montrn' => 10, 'Monadi' => 11, 'Mondim' => 12, 'Monaju' => 13, 'Mondis' => 14, 'Difere' => 15, 'Status' => 16, 'Id' => 17, ),
		BasePeer::TYPE_COLNAME => array (Tabla25Peer::CODPRE => 0, Tabla25Peer::NOMPRE => 1, Tabla25Peer::PERPRE => 2, Tabla25Peer::ANOPRE => 3, Tabla25Peer::MONASI => 4, Tabla25Peer::MONPRC => 5, Tabla25Peer::MONCOM => 6, Tabla25Peer::MONCAU => 7, Tabla25Peer::MONPAG => 8, Tabla25Peer::MONTRA => 9, Tabla25Peer::MONTRN => 10, Tabla25Peer::MONADI => 11, Tabla25Peer::MONDIM => 12, Tabla25Peer::MONAJU => 13, Tabla25Peer::MONDIS => 14, Tabla25Peer::DIFERE => 15, Tabla25Peer::STATUS => 16, Tabla25Peer::ID => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('codpre' => 0, 'nompre' => 1, 'perpre' => 2, 'anopre' => 3, 'monasi' => 4, 'monprc' => 5, 'moncom' => 6, 'moncau' => 7, 'monpag' => 8, 'montra' => 9, 'montrn' => 10, 'monadi' => 11, 'mondim' => 12, 'monaju' => 13, 'mondis' => 14, 'difere' => 15, 'status' => 16, 'id' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Tabla25MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Tabla25MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Tabla25Peer::getTableMap();
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
		return str_replace(Tabla25Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Tabla25Peer::CODPRE);

		$criteria->addSelectColumn(Tabla25Peer::NOMPRE);

		$criteria->addSelectColumn(Tabla25Peer::PERPRE);

		$criteria->addSelectColumn(Tabla25Peer::ANOPRE);

		$criteria->addSelectColumn(Tabla25Peer::MONASI);

		$criteria->addSelectColumn(Tabla25Peer::MONPRC);

		$criteria->addSelectColumn(Tabla25Peer::MONCOM);

		$criteria->addSelectColumn(Tabla25Peer::MONCAU);

		$criteria->addSelectColumn(Tabla25Peer::MONPAG);

		$criteria->addSelectColumn(Tabla25Peer::MONTRA);

		$criteria->addSelectColumn(Tabla25Peer::MONTRN);

		$criteria->addSelectColumn(Tabla25Peer::MONADI);

		$criteria->addSelectColumn(Tabla25Peer::MONDIM);

		$criteria->addSelectColumn(Tabla25Peer::MONAJU);

		$criteria->addSelectColumn(Tabla25Peer::MONDIS);

		$criteria->addSelectColumn(Tabla25Peer::DIFERE);

		$criteria->addSelectColumn(Tabla25Peer::STATUS);

		$criteria->addSelectColumn(Tabla25Peer::ID);

	}

	const COUNT = 'COUNT(tabla25.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tabla25.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Tabla25Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Tabla25Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Tabla25Peer::doSelectRS($criteria, $con);
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
		$objects = Tabla25Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Tabla25Peer::populateObjects(Tabla25Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Tabla25Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Tabla25Peer::getOMClass();
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
		return Tabla25Peer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(Tabla25Peer::ID); 

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
			$comparison = $criteria->getComparison(Tabla25Peer::ID);
			$selectCriteria->add(Tabla25Peer::ID, $criteria->remove(Tabla25Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Tabla25Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Tabla25Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tabla25) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Tabla25Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tabla25 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Tabla25Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Tabla25Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Tabla25Peer::DATABASE_NAME, Tabla25Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Tabla25Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Tabla25Peer::DATABASE_NAME);

		$criteria->add(Tabla25Peer::ID, $pk);


		$v = Tabla25Peer::doSelect($criteria, $con);

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
			$criteria->add(Tabla25Peer::ID, $pks, Criteria::IN);
			$objs = Tabla25Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTabla25Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Tabla25MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Tabla25MapBuilder');
}
