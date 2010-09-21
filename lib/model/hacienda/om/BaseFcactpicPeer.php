<?php


abstract class BaseFcactpicPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcactpic';

	
	const CLASS_DEFAULT = 'lib.model.hacienda.Fcactpic';

	
	const NUM_COLUMNS = 17;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMDOC = 'fcactpic.NUMDOC';

	
	const CODACT = 'fcactpic.CODACT';

	
	const EXONER = 'fcactpic.EXONER';

	
	const MONACT = 'fcactpic.MONACT';

	
	const POREXO = 'fcactpic.POREXO';

	
	const ESTACT = 'fcactpic.ESTACT';

	
	const EXENTO = 'fcactpic.EXENTO';

	
	const REBAJA = 'fcactpic.REBAJA';

	
	const PORREB = 'fcactpic.PORREB';

	
	const MONANT = 'fcactpic.MONANT';

	
	const IMPUESTO = 'fcactpic.IMPUESTO';

	
	const FECVEN = 'fcactpic.FECVEN';

	
	const ANODEC = 'fcactpic.ANODEC';

	
	const MODO = 'fcactpic.MODO';

	
	const MONREB = 'fcactpic.MONREB';

	
	const MONEXO = 'fcactpic.MONEXO';

	
	const ID = 'fcactpic.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numdoc', 'Codact', 'Exoner', 'Monact', 'Porexo', 'Estact', 'Exento', 'Rebaja', 'Porreb', 'Monant', 'Impuesto', 'Fecven', 'Anodec', 'Modo', 'Monreb', 'Monexo', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcactpicPeer::NUMDOC, FcactpicPeer::CODACT, FcactpicPeer::EXONER, FcactpicPeer::MONACT, FcactpicPeer::POREXO, FcactpicPeer::ESTACT, FcactpicPeer::EXENTO, FcactpicPeer::REBAJA, FcactpicPeer::PORREB, FcactpicPeer::MONANT, FcactpicPeer::IMPUESTO, FcactpicPeer::FECVEN, FcactpicPeer::ANODEC, FcactpicPeer::MODO, FcactpicPeer::MONREB, FcactpicPeer::MONEXO, FcactpicPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numdoc', 'codact', 'exoner', 'monact', 'porexo', 'estact', 'exento', 'rebaja', 'porreb', 'monant', 'impuesto', 'fecven', 'anodec', 'modo', 'monreb', 'monexo', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numdoc' => 0, 'Codact' => 1, 'Exoner' => 2, 'Monact' => 3, 'Porexo' => 4, 'Estact' => 5, 'Exento' => 6, 'Rebaja' => 7, 'Porreb' => 8, 'Monant' => 9, 'Impuesto' => 10, 'Fecven' => 11, 'Anodec' => 12, 'Modo' => 13, 'Monreb' => 14, 'Monexo' => 15, 'Id' => 16, ),
		BasePeer::TYPE_COLNAME => array (FcactpicPeer::NUMDOC => 0, FcactpicPeer::CODACT => 1, FcactpicPeer::EXONER => 2, FcactpicPeer::MONACT => 3, FcactpicPeer::POREXO => 4, FcactpicPeer::ESTACT => 5, FcactpicPeer::EXENTO => 6, FcactpicPeer::REBAJA => 7, FcactpicPeer::PORREB => 8, FcactpicPeer::MONANT => 9, FcactpicPeer::IMPUESTO => 10, FcactpicPeer::FECVEN => 11, FcactpicPeer::ANODEC => 12, FcactpicPeer::MODO => 13, FcactpicPeer::MONREB => 14, FcactpicPeer::MONEXO => 15, FcactpicPeer::ID => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('numdoc' => 0, 'codact' => 1, 'exoner' => 2, 'monact' => 3, 'porexo' => 4, 'estact' => 5, 'exento' => 6, 'rebaja' => 7, 'porreb' => 8, 'monant' => 9, 'impuesto' => 10, 'fecven' => 11, 'anodec' => 12, 'modo' => 13, 'monreb' => 14, 'monexo' => 15, 'id' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hacienda/map/FcactpicMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hacienda.map.FcactpicMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcactpicPeer::getTableMap();
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
		return str_replace(FcactpicPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcactpicPeer::NUMDOC);

		$criteria->addSelectColumn(FcactpicPeer::CODACT);

		$criteria->addSelectColumn(FcactpicPeer::EXONER);

		$criteria->addSelectColumn(FcactpicPeer::MONACT);

		$criteria->addSelectColumn(FcactpicPeer::POREXO);

		$criteria->addSelectColumn(FcactpicPeer::ESTACT);

		$criteria->addSelectColumn(FcactpicPeer::EXENTO);

		$criteria->addSelectColumn(FcactpicPeer::REBAJA);

		$criteria->addSelectColumn(FcactpicPeer::PORREB);

		$criteria->addSelectColumn(FcactpicPeer::MONANT);

		$criteria->addSelectColumn(FcactpicPeer::IMPUESTO);

		$criteria->addSelectColumn(FcactpicPeer::FECVEN);

		$criteria->addSelectColumn(FcactpicPeer::ANODEC);

		$criteria->addSelectColumn(FcactpicPeer::MODO);

		$criteria->addSelectColumn(FcactpicPeer::MONREB);

		$criteria->addSelectColumn(FcactpicPeer::MONEXO);

		$criteria->addSelectColumn(FcactpicPeer::ID);

	}

	const COUNT = 'COUNT(fcactpic.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcactpic.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcactpicPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcactpicPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcactpicPeer::doSelectRS($criteria, $con);
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
		$objects = FcactpicPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcactpicPeer::populateObjects(FcactpicPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcactpicPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcactpicPeer::getOMClass();
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
		return FcactpicPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FcactpicPeer::ID); 

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
			$comparison = $criteria->getComparison(FcactpicPeer::ID);
			$selectCriteria->add(FcactpicPeer::ID, $criteria->remove(FcactpicPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcactpicPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcactpicPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcactpic) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcactpicPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcactpic $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcactpicPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcactpicPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcactpicPeer::DATABASE_NAME, FcactpicPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcactpicPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcactpicPeer::DATABASE_NAME);

		$criteria->add(FcactpicPeer::ID, $pk);


		$v = FcactpicPeer::doSelect($criteria, $con);

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
			$criteria->add(FcactpicPeer::ID, $pks, Criteria::IN);
			$objs = FcactpicPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcactpicPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hacienda/map/FcactpicMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hacienda.map.FcactpicMapBuilder');
}
