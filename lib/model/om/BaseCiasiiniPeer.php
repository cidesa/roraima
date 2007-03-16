<?php


abstract class BaseCiasiiniPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ciasiini';

	
	const CLASS_DEFAULT = 'lib.model.Ciasiini';

	
	const NUM_COLUMNS = 18;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODPRE = 'ciasiini.CODPRE';

	
	const NOMPRE = 'ciasiini.NOMPRE';

	
	const PERPRE = 'ciasiini.PERPRE';

	
	const ANOPRE = 'ciasiini.ANOPRE';

	
	const MONASI = 'ciasiini.MONASI';

	
	const MONPRC = 'ciasiini.MONPRC';

	
	const MONCOM = 'ciasiini.MONCOM';

	
	const MONCAU = 'ciasiini.MONCAU';

	
	const MONPAG = 'ciasiini.MONPAG';

	
	const MONTRA = 'ciasiini.MONTRA';

	
	const MONTRN = 'ciasiini.MONTRN';

	
	const MONADI = 'ciasiini.MONADI';

	
	const MONDIM = 'ciasiini.MONDIM';

	
	const MONAJU = 'ciasiini.MONAJU';

	
	const MONDIS = 'ciasiini.MONDIS';

	
	const DIFERE = 'ciasiini.DIFERE';

	
	const STATUS = 'ciasiini.STATUS';

	
	const ID = 'ciasiini.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codpre', 'Nompre', 'Perpre', 'Anopre', 'Monasi', 'Monprc', 'Moncom', 'Moncau', 'Monpag', 'Montra', 'Montrn', 'Monadi', 'Mondim', 'Monaju', 'Mondis', 'Difere', 'Status', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CiasiiniPeer::CODPRE, CiasiiniPeer::NOMPRE, CiasiiniPeer::PERPRE, CiasiiniPeer::ANOPRE, CiasiiniPeer::MONASI, CiasiiniPeer::MONPRC, CiasiiniPeer::MONCOM, CiasiiniPeer::MONCAU, CiasiiniPeer::MONPAG, CiasiiniPeer::MONTRA, CiasiiniPeer::MONTRN, CiasiiniPeer::MONADI, CiasiiniPeer::MONDIM, CiasiiniPeer::MONAJU, CiasiiniPeer::MONDIS, CiasiiniPeer::DIFERE, CiasiiniPeer::STATUS, CiasiiniPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codpre', 'nompre', 'perpre', 'anopre', 'monasi', 'monprc', 'moncom', 'moncau', 'monpag', 'montra', 'montrn', 'monadi', 'mondim', 'monaju', 'mondis', 'difere', 'status', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codpre' => 0, 'Nompre' => 1, 'Perpre' => 2, 'Anopre' => 3, 'Monasi' => 4, 'Monprc' => 5, 'Moncom' => 6, 'Moncau' => 7, 'Monpag' => 8, 'Montra' => 9, 'Montrn' => 10, 'Monadi' => 11, 'Mondim' => 12, 'Monaju' => 13, 'Mondis' => 14, 'Difere' => 15, 'Status' => 16, 'Id' => 17, ),
		BasePeer::TYPE_COLNAME => array (CiasiiniPeer::CODPRE => 0, CiasiiniPeer::NOMPRE => 1, CiasiiniPeer::PERPRE => 2, CiasiiniPeer::ANOPRE => 3, CiasiiniPeer::MONASI => 4, CiasiiniPeer::MONPRC => 5, CiasiiniPeer::MONCOM => 6, CiasiiniPeer::MONCAU => 7, CiasiiniPeer::MONPAG => 8, CiasiiniPeer::MONTRA => 9, CiasiiniPeer::MONTRN => 10, CiasiiniPeer::MONADI => 11, CiasiiniPeer::MONDIM => 12, CiasiiniPeer::MONAJU => 13, CiasiiniPeer::MONDIS => 14, CiasiiniPeer::DIFERE => 15, CiasiiniPeer::STATUS => 16, CiasiiniPeer::ID => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('codpre' => 0, 'nompre' => 1, 'perpre' => 2, 'anopre' => 3, 'monasi' => 4, 'monprc' => 5, 'moncom' => 6, 'moncau' => 7, 'monpag' => 8, 'montra' => 9, 'montrn' => 10, 'monadi' => 11, 'mondim' => 12, 'monaju' => 13, 'mondis' => 14, 'difere' => 15, 'status' => 16, 'id' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CiasiiniMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CiasiiniMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CiasiiniPeer::getTableMap();
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
		return str_replace(CiasiiniPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CiasiiniPeer::CODPRE);

		$criteria->addSelectColumn(CiasiiniPeer::NOMPRE);

		$criteria->addSelectColumn(CiasiiniPeer::PERPRE);

		$criteria->addSelectColumn(CiasiiniPeer::ANOPRE);

		$criteria->addSelectColumn(CiasiiniPeer::MONASI);

		$criteria->addSelectColumn(CiasiiniPeer::MONPRC);

		$criteria->addSelectColumn(CiasiiniPeer::MONCOM);

		$criteria->addSelectColumn(CiasiiniPeer::MONCAU);

		$criteria->addSelectColumn(CiasiiniPeer::MONPAG);

		$criteria->addSelectColumn(CiasiiniPeer::MONTRA);

		$criteria->addSelectColumn(CiasiiniPeer::MONTRN);

		$criteria->addSelectColumn(CiasiiniPeer::MONADI);

		$criteria->addSelectColumn(CiasiiniPeer::MONDIM);

		$criteria->addSelectColumn(CiasiiniPeer::MONAJU);

		$criteria->addSelectColumn(CiasiiniPeer::MONDIS);

		$criteria->addSelectColumn(CiasiiniPeer::DIFERE);

		$criteria->addSelectColumn(CiasiiniPeer::STATUS);

		$criteria->addSelectColumn(CiasiiniPeer::ID);

	}

	const COUNT = 'COUNT(ciasiini.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ciasiini.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CiasiiniPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CiasiiniPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CiasiiniPeer::doSelectRS($criteria, $con);
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
		$objects = CiasiiniPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CiasiiniPeer::populateObjects(CiasiiniPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CiasiiniPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CiasiiniPeer::getOMClass();
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
		return CiasiiniPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(CiasiiniPeer::ID);
			$selectCriteria->add(CiasiiniPeer::ID, $criteria->remove(CiasiiniPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CiasiiniPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CiasiiniPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ciasiini) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CiasiiniPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ciasiini $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CiasiiniPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CiasiiniPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CiasiiniPeer::DATABASE_NAME, CiasiiniPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CiasiiniPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CiasiiniPeer::DATABASE_NAME);

		$criteria->add(CiasiiniPeer::ID, $pk);


		$v = CiasiiniPeer::doSelect($criteria, $con);

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
			$criteria->add(CiasiiniPeer::ID, $pks, Criteria::IN);
			$objs = CiasiiniPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCiasiiniPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CiasiiniMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CiasiiniMapBuilder');
}
