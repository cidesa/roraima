<?php


abstract class BaseTsdefbanPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tsdefban';

	
	const CLASS_DEFAULT = 'lib.model.Tsdefban';

	
	const NUM_COLUMNS = 34;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMCUE = 'tsdefban.NUMCUE';

	
	const NOMCUE = 'tsdefban.NOMCUE';

	
	const TIPCUE = 'tsdefban.TIPCUE';

	
	const CODCTA = 'tsdefban.CODCTA';

	
	const FECREG = 'tsdefban.FECREG';

	
	const FECVEN = 'tsdefban.FECVEN';

	
	const FECPER = 'tsdefban.FECPER';

	
	const RENAUT = 'tsdefban.RENAUT';

	
	const PORINT = 'tsdefban.PORINT';

	
	const TIPINT = 'tsdefban.TIPINT';

	
	const NUMCHE = 'tsdefban.NUMCHE';

	
	const ANTBAN = 'tsdefban.ANTBAN';

	
	const DEBBAN = 'tsdefban.DEBBAN';

	
	const CREBAN = 'tsdefban.CREBAN';

	
	const ANTLIB = 'tsdefban.ANTLIB';

	
	const DEBLIB = 'tsdefban.DEBLIB';

	
	const CRELIB = 'tsdefban.CRELIB';

	
	const VALCHE = 'tsdefban.VALCHE';

	
	const CONCIL = 'tsdefban.CONCIL';

	
	const PLAZO = 'tsdefban.PLAZO';

	
	const FECAPE = 'tsdefban.FECAPE';

	
	const USOCUE = 'tsdefban.USOCUE';

	
	const TIPREN = 'tsdefban.TIPREN';

	
	const DESENL = 'tsdefban.DESENL';

	
	const PORSALMIN = 'tsdefban.PORSALMIN';

	
	const MONSALMIN = 'tsdefban.MONSALMIN';

	
	const CODCTAPRECOO = 'tsdefban.CODCTAPRECOO';

	
	const CODCTAPREORD = 'tsdefban.CODCTAPREORD';

	
	const TRASITORIA = 'tsdefban.TRASITORIA';

	
	const SALACT = 'tsdefban.SALACT';

	
	const FECAPER = 'tsdefban.FECAPER';

	
	const TEMNUMCUE = 'tsdefban.TEMNUMCUE';

	
	const CANTDIG = 'tsdefban.CANTDIG';

	
	const ID = 'tsdefban.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numcue', 'Nomcue', 'Tipcue', 'Codcta', 'Fecreg', 'Fecven', 'Fecper', 'Renaut', 'Porint', 'Tipint', 'Numche', 'Antban', 'Debban', 'Creban', 'Antlib', 'Deblib', 'Crelib', 'Valche', 'Concil', 'Plazo', 'Fecape', 'Usocue', 'Tipren', 'Desenl', 'Porsalmin', 'Monsalmin', 'Codctaprecoo', 'Codctapreord', 'Trasitoria', 'Salact', 'Fecaper', 'Temnumcue', 'Cantdig', 'Id', ),
		BasePeer::TYPE_COLNAME => array (TsdefbanPeer::NUMCUE, TsdefbanPeer::NOMCUE, TsdefbanPeer::TIPCUE, TsdefbanPeer::CODCTA, TsdefbanPeer::FECREG, TsdefbanPeer::FECVEN, TsdefbanPeer::FECPER, TsdefbanPeer::RENAUT, TsdefbanPeer::PORINT, TsdefbanPeer::TIPINT, TsdefbanPeer::NUMCHE, TsdefbanPeer::ANTBAN, TsdefbanPeer::DEBBAN, TsdefbanPeer::CREBAN, TsdefbanPeer::ANTLIB, TsdefbanPeer::DEBLIB, TsdefbanPeer::CRELIB, TsdefbanPeer::VALCHE, TsdefbanPeer::CONCIL, TsdefbanPeer::PLAZO, TsdefbanPeer::FECAPE, TsdefbanPeer::USOCUE, TsdefbanPeer::TIPREN, TsdefbanPeer::DESENL, TsdefbanPeer::PORSALMIN, TsdefbanPeer::MONSALMIN, TsdefbanPeer::CODCTAPRECOO, TsdefbanPeer::CODCTAPREORD, TsdefbanPeer::TRASITORIA, TsdefbanPeer::SALACT, TsdefbanPeer::FECAPER, TsdefbanPeer::TEMNUMCUE, TsdefbanPeer::CANTDIG, TsdefbanPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numcue', 'nomcue', 'tipcue', 'codcta', 'fecreg', 'fecven', 'fecper', 'renaut', 'porint', 'tipint', 'numche', 'antban', 'debban', 'creban', 'antlib', 'deblib', 'crelib', 'valche', 'concil', 'plazo', 'fecape', 'usocue', 'tipren', 'desenl', 'porsalmin', 'monsalmin', 'codctaprecoo', 'codctapreord', 'trasitoria', 'salact', 'fecaper', 'temnumcue', 'cantdig', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numcue' => 0, 'Nomcue' => 1, 'Tipcue' => 2, 'Codcta' => 3, 'Fecreg' => 4, 'Fecven' => 5, 'Fecper' => 6, 'Renaut' => 7, 'Porint' => 8, 'Tipint' => 9, 'Numche' => 10, 'Antban' => 11, 'Debban' => 12, 'Creban' => 13, 'Antlib' => 14, 'Deblib' => 15, 'Crelib' => 16, 'Valche' => 17, 'Concil' => 18, 'Plazo' => 19, 'Fecape' => 20, 'Usocue' => 21, 'Tipren' => 22, 'Desenl' => 23, 'Porsalmin' => 24, 'Monsalmin' => 25, 'Codctaprecoo' => 26, 'Codctapreord' => 27, 'Trasitoria' => 28, 'Salact' => 29, 'Fecaper' => 30, 'Temnumcue' => 31, 'Cantdig' => 32, 'Id' => 33, ),
		BasePeer::TYPE_COLNAME => array (TsdefbanPeer::NUMCUE => 0, TsdefbanPeer::NOMCUE => 1, TsdefbanPeer::TIPCUE => 2, TsdefbanPeer::CODCTA => 3, TsdefbanPeer::FECREG => 4, TsdefbanPeer::FECVEN => 5, TsdefbanPeer::FECPER => 6, TsdefbanPeer::RENAUT => 7, TsdefbanPeer::PORINT => 8, TsdefbanPeer::TIPINT => 9, TsdefbanPeer::NUMCHE => 10, TsdefbanPeer::ANTBAN => 11, TsdefbanPeer::DEBBAN => 12, TsdefbanPeer::CREBAN => 13, TsdefbanPeer::ANTLIB => 14, TsdefbanPeer::DEBLIB => 15, TsdefbanPeer::CRELIB => 16, TsdefbanPeer::VALCHE => 17, TsdefbanPeer::CONCIL => 18, TsdefbanPeer::PLAZO => 19, TsdefbanPeer::FECAPE => 20, TsdefbanPeer::USOCUE => 21, TsdefbanPeer::TIPREN => 22, TsdefbanPeer::DESENL => 23, TsdefbanPeer::PORSALMIN => 24, TsdefbanPeer::MONSALMIN => 25, TsdefbanPeer::CODCTAPRECOO => 26, TsdefbanPeer::CODCTAPREORD => 27, TsdefbanPeer::TRASITORIA => 28, TsdefbanPeer::SALACT => 29, TsdefbanPeer::FECAPER => 30, TsdefbanPeer::TEMNUMCUE => 31, TsdefbanPeer::CANTDIG => 32, TsdefbanPeer::ID => 33, ),
		BasePeer::TYPE_FIELDNAME => array ('numcue' => 0, 'nomcue' => 1, 'tipcue' => 2, 'codcta' => 3, 'fecreg' => 4, 'fecven' => 5, 'fecper' => 6, 'renaut' => 7, 'porint' => 8, 'tipint' => 9, 'numche' => 10, 'antban' => 11, 'debban' => 12, 'creban' => 13, 'antlib' => 14, 'deblib' => 15, 'crelib' => 16, 'valche' => 17, 'concil' => 18, 'plazo' => 19, 'fecape' => 20, 'usocue' => 21, 'tipren' => 22, 'desenl' => 23, 'porsalmin' => 24, 'monsalmin' => 25, 'codctaprecoo' => 26, 'codctapreord' => 27, 'trasitoria' => 28, 'salact' => 29, 'fecaper' => 30, 'temnumcue' => 31, 'cantdig' => 32, 'id' => 33, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/TsdefbanMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.TsdefbanMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = TsdefbanPeer::getTableMap();
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
		return str_replace(TsdefbanPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(TsdefbanPeer::NUMCUE);

		$criteria->addSelectColumn(TsdefbanPeer::NOMCUE);

		$criteria->addSelectColumn(TsdefbanPeer::TIPCUE);

		$criteria->addSelectColumn(TsdefbanPeer::CODCTA);

		$criteria->addSelectColumn(TsdefbanPeer::FECREG);

		$criteria->addSelectColumn(TsdefbanPeer::FECVEN);

		$criteria->addSelectColumn(TsdefbanPeer::FECPER);

		$criteria->addSelectColumn(TsdefbanPeer::RENAUT);

		$criteria->addSelectColumn(TsdefbanPeer::PORINT);

		$criteria->addSelectColumn(TsdefbanPeer::TIPINT);

		$criteria->addSelectColumn(TsdefbanPeer::NUMCHE);

		$criteria->addSelectColumn(TsdefbanPeer::ANTBAN);

		$criteria->addSelectColumn(TsdefbanPeer::DEBBAN);

		$criteria->addSelectColumn(TsdefbanPeer::CREBAN);

		$criteria->addSelectColumn(TsdefbanPeer::ANTLIB);

		$criteria->addSelectColumn(TsdefbanPeer::DEBLIB);

		$criteria->addSelectColumn(TsdefbanPeer::CRELIB);

		$criteria->addSelectColumn(TsdefbanPeer::VALCHE);

		$criteria->addSelectColumn(TsdefbanPeer::CONCIL);

		$criteria->addSelectColumn(TsdefbanPeer::PLAZO);

		$criteria->addSelectColumn(TsdefbanPeer::FECAPE);

		$criteria->addSelectColumn(TsdefbanPeer::USOCUE);

		$criteria->addSelectColumn(TsdefbanPeer::TIPREN);

		$criteria->addSelectColumn(TsdefbanPeer::DESENL);

		$criteria->addSelectColumn(TsdefbanPeer::PORSALMIN);

		$criteria->addSelectColumn(TsdefbanPeer::MONSALMIN);

		$criteria->addSelectColumn(TsdefbanPeer::CODCTAPRECOO);

		$criteria->addSelectColumn(TsdefbanPeer::CODCTAPREORD);

		$criteria->addSelectColumn(TsdefbanPeer::TRASITORIA);

		$criteria->addSelectColumn(TsdefbanPeer::SALACT);

		$criteria->addSelectColumn(TsdefbanPeer::FECAPER);

		$criteria->addSelectColumn(TsdefbanPeer::TEMNUMCUE);

		$criteria->addSelectColumn(TsdefbanPeer::CANTDIG);

		$criteria->addSelectColumn(TsdefbanPeer::ID);

	}

	const COUNT = 'COUNT(tsdefban.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tsdefban.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TsdefbanPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TsdefbanPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TsdefbanPeer::doSelectRS($criteria, $con);
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
		$objects = TsdefbanPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return TsdefbanPeer::populateObjects(TsdefbanPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			TsdefbanPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = TsdefbanPeer::getOMClass();
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
		return TsdefbanPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(TsdefbanPeer::ID); 

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
			$comparison = $criteria->getComparison(TsdefbanPeer::ID);
			$selectCriteria->add(TsdefbanPeer::ID, $criteria->remove(TsdefbanPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(TsdefbanPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(TsdefbanPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tsdefban) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TsdefbanPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tsdefban $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TsdefbanPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TsdefbanPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(TsdefbanPeer::DATABASE_NAME, TsdefbanPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = TsdefbanPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(TsdefbanPeer::DATABASE_NAME);

		$criteria->add(TsdefbanPeer::ID, $pk);


		$v = TsdefbanPeer::doSelect($criteria, $con);

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
			$criteria->add(TsdefbanPeer::ID, $pks, Criteria::IN);
			$objs = TsdefbanPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTsdefbanPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/TsdefbanMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.TsdefbanMapBuilder');
}
