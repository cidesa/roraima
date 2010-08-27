<?php


abstract class BaseFafacturproPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fafacturpro';

	
	const CLASS_DEFAULT = 'lib.model.Fafacturpro';

	
	const NUM_COLUMNS = 24;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFFAC = 'fafacturpro.REFFAC';

	
	const FECFAC = 'fafacturpro.FECFAC';

	
	const CODCLI = 'fafacturpro.CODCLI';

	
	const DESFAC = 'fafacturpro.DESFAC';

	
	const TIPREF = 'fafacturpro.TIPREF';

	
	const MONFAC = 'fafacturpro.MONFAC';

	
	const MONDESC = 'fafacturpro.MONDESC';

	
	const CODCONPAG = 'fafacturpro.CODCONPAG';

	
	const NUMCOM = 'fafacturpro.NUMCOM';

	
	const REAPOR = 'fafacturpro.REAPOR';

	
	const FECANU = 'fafacturpro.FECANU';

	
	const STATUS = 'fafacturpro.STATUS';

	
	const OBSERV = 'fafacturpro.OBSERV';

	
	const TIPMON = 'fafacturpro.TIPMON';

	
	const VALMON = 'fafacturpro.VALMON';

	
	const NUMCOMORD = 'fafacturpro.NUMCOMORD';

	
	const NUMCOMINV = 'fafacturpro.NUMCOMINV';

	
	const SUCURSAL = 'fafacturpro.SUCURSAL';

	
	const MOTANU = 'fafacturpro.MOTANU';

	
	const VUELTO = 'fafacturpro.VUELTO';

	
	const CODCAJ = 'fafacturpro.CODCAJ';

	
	const NUMCONTROL = 'fafacturpro.NUMCONTROL';

	
	const CODUBI = 'fafacturpro.CODUBI';

	
	const ID = 'fafacturpro.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Reffac', 'Fecfac', 'Codcli', 'Desfac', 'Tipref', 'Monfac', 'Mondesc', 'Codconpag', 'Numcom', 'Reapor', 'Fecanu', 'Status', 'Observ', 'Tipmon', 'Valmon', 'Numcomord', 'Numcominv', 'Sucursal', 'Motanu', 'Vuelto', 'Codcaj', 'Numcontrol', 'Codubi', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FafacturproPeer::REFFAC, FafacturproPeer::FECFAC, FafacturproPeer::CODCLI, FafacturproPeer::DESFAC, FafacturproPeer::TIPREF, FafacturproPeer::MONFAC, FafacturproPeer::MONDESC, FafacturproPeer::CODCONPAG, FafacturproPeer::NUMCOM, FafacturproPeer::REAPOR, FafacturproPeer::FECANU, FafacturproPeer::STATUS, FafacturproPeer::OBSERV, FafacturproPeer::TIPMON, FafacturproPeer::VALMON, FafacturproPeer::NUMCOMORD, FafacturproPeer::NUMCOMINV, FafacturproPeer::SUCURSAL, FafacturproPeer::MOTANU, FafacturproPeer::VUELTO, FafacturproPeer::CODCAJ, FafacturproPeer::NUMCONTROL, FafacturproPeer::CODUBI, FafacturproPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('reffac', 'fecfac', 'codcli', 'desfac', 'tipref', 'monfac', 'mondesc', 'codconpag', 'numcom', 'reapor', 'fecanu', 'status', 'observ', 'tipmon', 'valmon', 'numcomord', 'numcominv', 'sucursal', 'motanu', 'vuelto', 'codcaj', 'numcontrol', 'codubi', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Reffac' => 0, 'Fecfac' => 1, 'Codcli' => 2, 'Desfac' => 3, 'Tipref' => 4, 'Monfac' => 5, 'Mondesc' => 6, 'Codconpag' => 7, 'Numcom' => 8, 'Reapor' => 9, 'Fecanu' => 10, 'Status' => 11, 'Observ' => 12, 'Tipmon' => 13, 'Valmon' => 14, 'Numcomord' => 15, 'Numcominv' => 16, 'Sucursal' => 17, 'Motanu' => 18, 'Vuelto' => 19, 'Codcaj' => 20, 'Numcontrol' => 21, 'Codubi' => 22, 'Id' => 23, ),
		BasePeer::TYPE_COLNAME => array (FafacturproPeer::REFFAC => 0, FafacturproPeer::FECFAC => 1, FafacturproPeer::CODCLI => 2, FafacturproPeer::DESFAC => 3, FafacturproPeer::TIPREF => 4, FafacturproPeer::MONFAC => 5, FafacturproPeer::MONDESC => 6, FafacturproPeer::CODCONPAG => 7, FafacturproPeer::NUMCOM => 8, FafacturproPeer::REAPOR => 9, FafacturproPeer::FECANU => 10, FafacturproPeer::STATUS => 11, FafacturproPeer::OBSERV => 12, FafacturproPeer::TIPMON => 13, FafacturproPeer::VALMON => 14, FafacturproPeer::NUMCOMORD => 15, FafacturproPeer::NUMCOMINV => 16, FafacturproPeer::SUCURSAL => 17, FafacturproPeer::MOTANU => 18, FafacturproPeer::VUELTO => 19, FafacturproPeer::CODCAJ => 20, FafacturproPeer::NUMCONTROL => 21, FafacturproPeer::CODUBI => 22, FafacturproPeer::ID => 23, ),
		BasePeer::TYPE_FIELDNAME => array ('reffac' => 0, 'fecfac' => 1, 'codcli' => 2, 'desfac' => 3, 'tipref' => 4, 'monfac' => 5, 'mondesc' => 6, 'codconpag' => 7, 'numcom' => 8, 'reapor' => 9, 'fecanu' => 10, 'status' => 11, 'observ' => 12, 'tipmon' => 13, 'valmon' => 14, 'numcomord' => 15, 'numcominv' => 16, 'sucursal' => 17, 'motanu' => 18, 'vuelto' => 19, 'codcaj' => 20, 'numcontrol' => 21, 'codubi' => 22, 'id' => 23, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FafacturproMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FafacturproMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FafacturproPeer::getTableMap();
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
		return str_replace(FafacturproPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FafacturproPeer::REFFAC);

		$criteria->addSelectColumn(FafacturproPeer::FECFAC);

		$criteria->addSelectColumn(FafacturproPeer::CODCLI);

		$criteria->addSelectColumn(FafacturproPeer::DESFAC);

		$criteria->addSelectColumn(FafacturproPeer::TIPREF);

		$criteria->addSelectColumn(FafacturproPeer::MONFAC);

		$criteria->addSelectColumn(FafacturproPeer::MONDESC);

		$criteria->addSelectColumn(FafacturproPeer::CODCONPAG);

		$criteria->addSelectColumn(FafacturproPeer::NUMCOM);

		$criteria->addSelectColumn(FafacturproPeer::REAPOR);

		$criteria->addSelectColumn(FafacturproPeer::FECANU);

		$criteria->addSelectColumn(FafacturproPeer::STATUS);

		$criteria->addSelectColumn(FafacturproPeer::OBSERV);

		$criteria->addSelectColumn(FafacturproPeer::TIPMON);

		$criteria->addSelectColumn(FafacturproPeer::VALMON);

		$criteria->addSelectColumn(FafacturproPeer::NUMCOMORD);

		$criteria->addSelectColumn(FafacturproPeer::NUMCOMINV);

		$criteria->addSelectColumn(FafacturproPeer::SUCURSAL);

		$criteria->addSelectColumn(FafacturproPeer::MOTANU);

		$criteria->addSelectColumn(FafacturproPeer::VUELTO);

		$criteria->addSelectColumn(FafacturproPeer::CODCAJ);

		$criteria->addSelectColumn(FafacturproPeer::NUMCONTROL);

		$criteria->addSelectColumn(FafacturproPeer::CODUBI);

		$criteria->addSelectColumn(FafacturproPeer::ID);

	}

	const COUNT = 'COUNT(fafacturpro.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fafacturpro.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FafacturproPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FafacturproPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FafacturproPeer::doSelectRS($criteria, $con);
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
		$objects = FafacturproPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FafacturproPeer::populateObjects(FafacturproPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FafacturproPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FafacturproPeer::getOMClass();
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
		return FafacturproPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FafacturproPeer::ID); 

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
			$comparison = $criteria->getComparison(FafacturproPeer::ID);
			$selectCriteria->add(FafacturproPeer::ID, $criteria->remove(FafacturproPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FafacturproPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FafacturproPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fafacturpro) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FafacturproPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fafacturpro $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FafacturproPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FafacturproPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FafacturproPeer::DATABASE_NAME, FafacturproPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FafacturproPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FafacturproPeer::DATABASE_NAME);

		$criteria->add(FafacturproPeer::ID, $pk);


		$v = FafacturproPeer::doSelect($criteria, $con);

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
			$criteria->add(FafacturproPeer::ID, $pks, Criteria::IN);
			$objs = FafacturproPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFafacturproPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FafacturproMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FafacturproMapBuilder');
}
