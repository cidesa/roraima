<?php


abstract class BaseEjecuciondocumentoPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ejecuciondocumento';

	
	const CLASS_DEFAULT = 'lib.model.Ejecuciondocumento';

	
	const NUM_COLUMNS = 18;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const TIPO = 'ejecuciondocumento.TIPO';

	
	const REFDOC = 'ejecuciondocumento.REFDOC';

	
	const FECDOC = 'ejecuciondocumento.FECDOC';

	
	const STAIMP = 'ejecuciondocumento.STAIMP';

	
	const FECANU = 'ejecuciondocumento.FECANU';

	
	const REFERE = 'ejecuciondocumento.REFERE';

	
	const CODPRE = 'ejecuciondocumento.CODPRE';

	
	const MONPRC = 'ejecuciondocumento.MONPRC';

	
	const MONAJUPRC = 'ejecuciondocumento.MONAJUPRC';

	
	const MONCOM = 'ejecuciondocumento.MONCOM';

	
	const MONAJUCOM = 'ejecuciondocumento.MONAJUCOM';

	
	const MONCAU = 'ejecuciondocumento.MONCAU';

	
	const MONAJUCAU = 'ejecuciondocumento.MONAJUCAU';

	
	const MONPAG = 'ejecuciondocumento.MONPAG';

	
	const MONAJUPAG = 'ejecuciondocumento.MONAJUPAG';

	
	const TIPDOC = 'ejecuciondocumento.TIPDOC';

	
	const DESDOC = 'ejecuciondocumento.DESDOC';

	
	const ID = 'ejecuciondocumento.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Tipo', 'Refdoc', 'Fecdoc', 'Staimp', 'Fecanu', 'Refere', 'Codpre', 'Monprc', 'Monajuprc', 'Moncom', 'Monajucom', 'Moncau', 'Monajucau', 'Monpag', 'Monajupag', 'Tipdoc', 'Desdoc', 'Id', ),
		BasePeer::TYPE_COLNAME => array (EjecuciondocumentoPeer::TIPO, EjecuciondocumentoPeer::REFDOC, EjecuciondocumentoPeer::FECDOC, EjecuciondocumentoPeer::STAIMP, EjecuciondocumentoPeer::FECANU, EjecuciondocumentoPeer::REFERE, EjecuciondocumentoPeer::CODPRE, EjecuciondocumentoPeer::MONPRC, EjecuciondocumentoPeer::MONAJUPRC, EjecuciondocumentoPeer::MONCOM, EjecuciondocumentoPeer::MONAJUCOM, EjecuciondocumentoPeer::MONCAU, EjecuciondocumentoPeer::MONAJUCAU, EjecuciondocumentoPeer::MONPAG, EjecuciondocumentoPeer::MONAJUPAG, EjecuciondocumentoPeer::TIPDOC, EjecuciondocumentoPeer::DESDOC, EjecuciondocumentoPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('tipo', 'refdoc', 'fecdoc', 'staimp', 'fecanu', 'refere', 'codpre', 'monprc', 'monajuprc', 'moncom', 'monajucom', 'moncau', 'monajucau', 'monpag', 'monajupag', 'tipdoc', 'desdoc', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Tipo' => 0, 'Refdoc' => 1, 'Fecdoc' => 2, 'Staimp' => 3, 'Fecanu' => 4, 'Refere' => 5, 'Codpre' => 6, 'Monprc' => 7, 'Monajuprc' => 8, 'Moncom' => 9, 'Monajucom' => 10, 'Moncau' => 11, 'Monajucau' => 12, 'Monpag' => 13, 'Monajupag' => 14, 'Tipdoc' => 15, 'Desdoc' => 16, 'Id' => 17, ),
		BasePeer::TYPE_COLNAME => array (EjecuciondocumentoPeer::TIPO => 0, EjecuciondocumentoPeer::REFDOC => 1, EjecuciondocumentoPeer::FECDOC => 2, EjecuciondocumentoPeer::STAIMP => 3, EjecuciondocumentoPeer::FECANU => 4, EjecuciondocumentoPeer::REFERE => 5, EjecuciondocumentoPeer::CODPRE => 6, EjecuciondocumentoPeer::MONPRC => 7, EjecuciondocumentoPeer::MONAJUPRC => 8, EjecuciondocumentoPeer::MONCOM => 9, EjecuciondocumentoPeer::MONAJUCOM => 10, EjecuciondocumentoPeer::MONCAU => 11, EjecuciondocumentoPeer::MONAJUCAU => 12, EjecuciondocumentoPeer::MONPAG => 13, EjecuciondocumentoPeer::MONAJUPAG => 14, EjecuciondocumentoPeer::TIPDOC => 15, EjecuciondocumentoPeer::DESDOC => 16, EjecuciondocumentoPeer::ID => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('tipo' => 0, 'refdoc' => 1, 'fecdoc' => 2, 'staimp' => 3, 'fecanu' => 4, 'refere' => 5, 'codpre' => 6, 'monprc' => 7, 'monajuprc' => 8, 'moncom' => 9, 'monajucom' => 10, 'moncau' => 11, 'monajucau' => 12, 'monpag' => 13, 'monajupag' => 14, 'tipdoc' => 15, 'desdoc' => 16, 'id' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/EjecuciondocumentoMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.EjecuciondocumentoMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = EjecuciondocumentoPeer::getTableMap();
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
		return str_replace(EjecuciondocumentoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(EjecuciondocumentoPeer::TIPO);

		$criteria->addSelectColumn(EjecuciondocumentoPeer::REFDOC);

		$criteria->addSelectColumn(EjecuciondocumentoPeer::FECDOC);

		$criteria->addSelectColumn(EjecuciondocumentoPeer::STAIMP);

		$criteria->addSelectColumn(EjecuciondocumentoPeer::FECANU);

		$criteria->addSelectColumn(EjecuciondocumentoPeer::REFERE);

		$criteria->addSelectColumn(EjecuciondocumentoPeer::CODPRE);

		$criteria->addSelectColumn(EjecuciondocumentoPeer::MONPRC);

		$criteria->addSelectColumn(EjecuciondocumentoPeer::MONAJUPRC);

		$criteria->addSelectColumn(EjecuciondocumentoPeer::MONCOM);

		$criteria->addSelectColumn(EjecuciondocumentoPeer::MONAJUCOM);

		$criteria->addSelectColumn(EjecuciondocumentoPeer::MONCAU);

		$criteria->addSelectColumn(EjecuciondocumentoPeer::MONAJUCAU);

		$criteria->addSelectColumn(EjecuciondocumentoPeer::MONPAG);

		$criteria->addSelectColumn(EjecuciondocumentoPeer::MONAJUPAG);

		$criteria->addSelectColumn(EjecuciondocumentoPeer::TIPDOC);

		$criteria->addSelectColumn(EjecuciondocumentoPeer::DESDOC);

		$criteria->addSelectColumn(EjecuciondocumentoPeer::ID);

	}

	const COUNT = 'COUNT(ejecuciondocumento.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ejecuciondocumento.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EjecuciondocumentoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EjecuciondocumentoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = EjecuciondocumentoPeer::doSelectRS($criteria, $con);
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
		$objects = EjecuciondocumentoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return EjecuciondocumentoPeer::populateObjects(EjecuciondocumentoPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			EjecuciondocumentoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = EjecuciondocumentoPeer::getOMClass();
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
		return EjecuciondocumentoPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(EjecuciondocumentoPeer::ID);
			$selectCriteria->add(EjecuciondocumentoPeer::ID, $criteria->remove(EjecuciondocumentoPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(EjecuciondocumentoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(EjecuciondocumentoPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ejecuciondocumento) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(EjecuciondocumentoPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ejecuciondocumento $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(EjecuciondocumentoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(EjecuciondocumentoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(EjecuciondocumentoPeer::DATABASE_NAME, EjecuciondocumentoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = EjecuciondocumentoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(EjecuciondocumentoPeer::DATABASE_NAME);

		$criteria->add(EjecuciondocumentoPeer::ID, $pk);


		$v = EjecuciondocumentoPeer::doSelect($criteria, $con);

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
			$criteria->add(EjecuciondocumentoPeer::ID, $pks, Criteria::IN);
			$objs = EjecuciondocumentoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseEjecuciondocumentoPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/EjecuciondocumentoMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.EjecuciondocumentoMapBuilder');
}
