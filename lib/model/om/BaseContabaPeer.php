<?php


abstract class BaseContabaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'contaba';

	
	const CLASS_DEFAULT = 'lib.model.Contaba';

	
	const NUM_COLUMNS = 47;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'contaba.CODEMP';

	
	const LONCTA = 'contaba.LONCTA';

	
	const NUMRUP = 'contaba.NUMRUP';

	
	const FORCTA = 'contaba.FORCTA';

	
	const SITFIN = 'contaba.SITFIN';

	
	const SITFIS = 'contaba.SITFIS';

	
	const GANPER = 'contaba.GANPER';

	
	const EJEPRE = 'contaba.EJEPRE';

	
	const HACMUN = 'contaba.HACMUN';

	
	const CTLGAS = 'contaba.CTLGAS';

	
	const CTLING = 'contaba.CTLING';

	
	const FECINI = 'contaba.FECINI';

	
	const FECCIE = 'contaba.FECCIE';

	
	const CODTES = 'contaba.CODTES';

	
	const CODHAC = 'contaba.CODHAC';

	
	const CODPRE = 'contaba.CODPRE';

	
	const CODORD = 'contaba.CODORD';

	
	const CODTESACT = 'contaba.CODTESACT';

	
	const CODHACACT = 'contaba.CODHACACT';

	
	const CODHACPAT = 'contaba.CODHACPAT';

	
	const CODTESPAS = 'contaba.CODTESPAS';

	
	const CODHACPAS = 'contaba.CODHACPAS';

	
	const CODIND = 'contaba.CODIND';

	
	const CODINH = 'contaba.CODINH';

	
	const CODEGD = 'contaba.CODEGD';

	
	const CODEGH = 'contaba.CODEGH';

	
	const CODRES = 'contaba.CODRES';

	
	const CODEJEPRE = 'contaba.CODEJEPRE';

	
	const CODCTD = 'contaba.CODCTD';

	
	const CODCTA = 'contaba.CODCTA';

	
	const CODRESANT = 'contaba.CODRESANT';

	
	const ETADEF = 'contaba.ETADEF';

	
	const CODCTAGAS = 'contaba.CODCTAGAS';

	
	const CODCTABAN = 'contaba.CODCTABAN';

	
	const CODCTARET = 'contaba.CODCTARET';

	
	const CODCTABEN = 'contaba.CODCTABEN';

	
	const CODCTAART = 'contaba.CODCTAART';

	
	const CODCTAGASHAS = 'contaba.CODCTAGASHAS';

	
	const CODCTABANHAS = 'contaba.CODCTABANHAS';

	
	const CODCTARETHAS = 'contaba.CODCTARETHAS';

	
	const CODCTABENHAS = 'contaba.CODCTABENHAS';

	
	const CODCTAARTHAS = 'contaba.CODCTAARTHAS';

	
	const CODCTAPAGEJE = 'contaba.CODCTAPAGEJE';

	
	const CODCTAINGDEVN = 'contaba.CODCTAINGDEVN';

	
	const CODCTAINGDEV = 'contaba.CODCTAINGDEV';

	
	const UNIDAD = 'contaba.UNIDAD';

	
	const ID = 'contaba.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Loncta', 'Numrup', 'Forcta', 'Sitfin', 'Sitfis', 'Ganper', 'Ejepre', 'Hacmun', 'Ctlgas', 'Ctling', 'Fecini', 'Feccie', 'Codtes', 'Codhac', 'Codpre', 'Codord', 'Codtesact', 'Codhacact', 'Codhacpat', 'Codtespas', 'Codhacpas', 'Codind', 'Codinh', 'Codegd', 'Codegh', 'Codres', 'Codejepre', 'Codctd', 'Codcta', 'Codresant', 'Etadef', 'Codctagas', 'Codctaban', 'Codctaret', 'Codctaben', 'Codctaart', 'Codctagashas', 'Codctabanhas', 'Codctarethas', 'Codctabenhas', 'Codctaarthas', 'Codctapageje', 'Codctaingdevn', 'Codctaingdev', 'Unidad', 'Id', ),
		BasePeer::TYPE_COLNAME => array (ContabaPeer::CODEMP, ContabaPeer::LONCTA, ContabaPeer::NUMRUP, ContabaPeer::FORCTA, ContabaPeer::SITFIN, ContabaPeer::SITFIS, ContabaPeer::GANPER, ContabaPeer::EJEPRE, ContabaPeer::HACMUN, ContabaPeer::CTLGAS, ContabaPeer::CTLING, ContabaPeer::FECINI, ContabaPeer::FECCIE, ContabaPeer::CODTES, ContabaPeer::CODHAC, ContabaPeer::CODPRE, ContabaPeer::CODORD, ContabaPeer::CODTESACT, ContabaPeer::CODHACACT, ContabaPeer::CODHACPAT, ContabaPeer::CODTESPAS, ContabaPeer::CODHACPAS, ContabaPeer::CODIND, ContabaPeer::CODINH, ContabaPeer::CODEGD, ContabaPeer::CODEGH, ContabaPeer::CODRES, ContabaPeer::CODEJEPRE, ContabaPeer::CODCTD, ContabaPeer::CODCTA, ContabaPeer::CODRESANT, ContabaPeer::ETADEF, ContabaPeer::CODCTAGAS, ContabaPeer::CODCTABAN, ContabaPeer::CODCTARET, ContabaPeer::CODCTABEN, ContabaPeer::CODCTAART, ContabaPeer::CODCTAGASHAS, ContabaPeer::CODCTABANHAS, ContabaPeer::CODCTARETHAS, ContabaPeer::CODCTABENHAS, ContabaPeer::CODCTAARTHAS, ContabaPeer::CODCTAPAGEJE, ContabaPeer::CODCTAINGDEVN, ContabaPeer::CODCTAINGDEV, ContabaPeer::UNIDAD, ContabaPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'loncta', 'numrup', 'forcta', 'sitfin', 'sitfis', 'ganper', 'ejepre', 'hacmun', 'ctlgas', 'ctling', 'fecini', 'feccie', 'codtes', 'codhac', 'codpre', 'codord', 'codtesact', 'codhacact', 'codhacpat', 'codtespas', 'codhacpas', 'codind', 'codinh', 'codegd', 'codegh', 'codres', 'codejepre', 'codctd', 'codcta', 'codresant', 'etadef', 'codctagas', 'codctaban', 'codctaret', 'codctaben', 'codctaart', 'codctagashas', 'codctabanhas', 'codctarethas', 'codctabenhas', 'codctaarthas', 'codctapageje', 'codctaingdevn', 'codctaingdev', 'unidad', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Loncta' => 1, 'Numrup' => 2, 'Forcta' => 3, 'Sitfin' => 4, 'Sitfis' => 5, 'Ganper' => 6, 'Ejepre' => 7, 'Hacmun' => 8, 'Ctlgas' => 9, 'Ctling' => 10, 'Fecini' => 11, 'Feccie' => 12, 'Codtes' => 13, 'Codhac' => 14, 'Codpre' => 15, 'Codord' => 16, 'Codtesact' => 17, 'Codhacact' => 18, 'Codhacpat' => 19, 'Codtespas' => 20, 'Codhacpas' => 21, 'Codind' => 22, 'Codinh' => 23, 'Codegd' => 24, 'Codegh' => 25, 'Codres' => 26, 'Codejepre' => 27, 'Codctd' => 28, 'Codcta' => 29, 'Codresant' => 30, 'Etadef' => 31, 'Codctagas' => 32, 'Codctaban' => 33, 'Codctaret' => 34, 'Codctaben' => 35, 'Codctaart' => 36, 'Codctagashas' => 37, 'Codctabanhas' => 38, 'Codctarethas' => 39, 'Codctabenhas' => 40, 'Codctaarthas' => 41, 'Codctapageje' => 42, 'Codctaingdevn' => 43, 'Codctaingdev' => 44, 'Unidad' => 45, 'Id' => 46, ),
		BasePeer::TYPE_COLNAME => array (ContabaPeer::CODEMP => 0, ContabaPeer::LONCTA => 1, ContabaPeer::NUMRUP => 2, ContabaPeer::FORCTA => 3, ContabaPeer::SITFIN => 4, ContabaPeer::SITFIS => 5, ContabaPeer::GANPER => 6, ContabaPeer::EJEPRE => 7, ContabaPeer::HACMUN => 8, ContabaPeer::CTLGAS => 9, ContabaPeer::CTLING => 10, ContabaPeer::FECINI => 11, ContabaPeer::FECCIE => 12, ContabaPeer::CODTES => 13, ContabaPeer::CODHAC => 14, ContabaPeer::CODPRE => 15, ContabaPeer::CODORD => 16, ContabaPeer::CODTESACT => 17, ContabaPeer::CODHACACT => 18, ContabaPeer::CODHACPAT => 19, ContabaPeer::CODTESPAS => 20, ContabaPeer::CODHACPAS => 21, ContabaPeer::CODIND => 22, ContabaPeer::CODINH => 23, ContabaPeer::CODEGD => 24, ContabaPeer::CODEGH => 25, ContabaPeer::CODRES => 26, ContabaPeer::CODEJEPRE => 27, ContabaPeer::CODCTD => 28, ContabaPeer::CODCTA => 29, ContabaPeer::CODRESANT => 30, ContabaPeer::ETADEF => 31, ContabaPeer::CODCTAGAS => 32, ContabaPeer::CODCTABAN => 33, ContabaPeer::CODCTARET => 34, ContabaPeer::CODCTABEN => 35, ContabaPeer::CODCTAART => 36, ContabaPeer::CODCTAGASHAS => 37, ContabaPeer::CODCTABANHAS => 38, ContabaPeer::CODCTARETHAS => 39, ContabaPeer::CODCTABENHAS => 40, ContabaPeer::CODCTAARTHAS => 41, ContabaPeer::CODCTAPAGEJE => 42, ContabaPeer::CODCTAINGDEVN => 43, ContabaPeer::CODCTAINGDEV => 44, ContabaPeer::UNIDAD => 45, ContabaPeer::ID => 46, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'loncta' => 1, 'numrup' => 2, 'forcta' => 3, 'sitfin' => 4, 'sitfis' => 5, 'ganper' => 6, 'ejepre' => 7, 'hacmun' => 8, 'ctlgas' => 9, 'ctling' => 10, 'fecini' => 11, 'feccie' => 12, 'codtes' => 13, 'codhac' => 14, 'codpre' => 15, 'codord' => 16, 'codtesact' => 17, 'codhacact' => 18, 'codhacpat' => 19, 'codtespas' => 20, 'codhacpas' => 21, 'codind' => 22, 'codinh' => 23, 'codegd' => 24, 'codegh' => 25, 'codres' => 26, 'codejepre' => 27, 'codctd' => 28, 'codcta' => 29, 'codresant' => 30, 'etadef' => 31, 'codctagas' => 32, 'codctaban' => 33, 'codctaret' => 34, 'codctaben' => 35, 'codctaart' => 36, 'codctagashas' => 37, 'codctabanhas' => 38, 'codctarethas' => 39, 'codctabenhas' => 40, 'codctaarthas' => 41, 'codctapageje' => 42, 'codctaingdevn' => 43, 'codctaingdev' => 44, 'unidad' => 45, 'id' => 46, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ContabaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ContabaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ContabaPeer::getTableMap();
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
		return str_replace(ContabaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ContabaPeer::CODEMP);

		$criteria->addSelectColumn(ContabaPeer::LONCTA);

		$criteria->addSelectColumn(ContabaPeer::NUMRUP);

		$criteria->addSelectColumn(ContabaPeer::FORCTA);

		$criteria->addSelectColumn(ContabaPeer::SITFIN);

		$criteria->addSelectColumn(ContabaPeer::SITFIS);

		$criteria->addSelectColumn(ContabaPeer::GANPER);

		$criteria->addSelectColumn(ContabaPeer::EJEPRE);

		$criteria->addSelectColumn(ContabaPeer::HACMUN);

		$criteria->addSelectColumn(ContabaPeer::CTLGAS);

		$criteria->addSelectColumn(ContabaPeer::CTLING);

		$criteria->addSelectColumn(ContabaPeer::FECINI);

		$criteria->addSelectColumn(ContabaPeer::FECCIE);

		$criteria->addSelectColumn(ContabaPeer::CODTES);

		$criteria->addSelectColumn(ContabaPeer::CODHAC);

		$criteria->addSelectColumn(ContabaPeer::CODPRE);

		$criteria->addSelectColumn(ContabaPeer::CODORD);

		$criteria->addSelectColumn(ContabaPeer::CODTESACT);

		$criteria->addSelectColumn(ContabaPeer::CODHACACT);

		$criteria->addSelectColumn(ContabaPeer::CODHACPAT);

		$criteria->addSelectColumn(ContabaPeer::CODTESPAS);

		$criteria->addSelectColumn(ContabaPeer::CODHACPAS);

		$criteria->addSelectColumn(ContabaPeer::CODIND);

		$criteria->addSelectColumn(ContabaPeer::CODINH);

		$criteria->addSelectColumn(ContabaPeer::CODEGD);

		$criteria->addSelectColumn(ContabaPeer::CODEGH);

		$criteria->addSelectColumn(ContabaPeer::CODRES);

		$criteria->addSelectColumn(ContabaPeer::CODEJEPRE);

		$criteria->addSelectColumn(ContabaPeer::CODCTD);

		$criteria->addSelectColumn(ContabaPeer::CODCTA);

		$criteria->addSelectColumn(ContabaPeer::CODRESANT);

		$criteria->addSelectColumn(ContabaPeer::ETADEF);

		$criteria->addSelectColumn(ContabaPeer::CODCTAGAS);

		$criteria->addSelectColumn(ContabaPeer::CODCTABAN);

		$criteria->addSelectColumn(ContabaPeer::CODCTARET);

		$criteria->addSelectColumn(ContabaPeer::CODCTABEN);

		$criteria->addSelectColumn(ContabaPeer::CODCTAART);

		$criteria->addSelectColumn(ContabaPeer::CODCTAGASHAS);

		$criteria->addSelectColumn(ContabaPeer::CODCTABANHAS);

		$criteria->addSelectColumn(ContabaPeer::CODCTARETHAS);

		$criteria->addSelectColumn(ContabaPeer::CODCTABENHAS);

		$criteria->addSelectColumn(ContabaPeer::CODCTAARTHAS);

		$criteria->addSelectColumn(ContabaPeer::CODCTAPAGEJE);

		$criteria->addSelectColumn(ContabaPeer::CODCTAINGDEVN);

		$criteria->addSelectColumn(ContabaPeer::CODCTAINGDEV);

		$criteria->addSelectColumn(ContabaPeer::UNIDAD);

		$criteria->addSelectColumn(ContabaPeer::ID);

	}

	const COUNT = 'COUNT(contaba.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT contaba.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ContabaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ContabaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ContabaPeer::doSelectRS($criteria, $con);
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
		$objects = ContabaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ContabaPeer::populateObjects(ContabaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ContabaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ContabaPeer::getOMClass();
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
		return ContabaPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(ContabaPeer::ID);
			$selectCriteria->add(ContabaPeer::ID, $criteria->remove(ContabaPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ContabaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ContabaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Contaba) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ContabaPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Contaba $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ContabaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ContabaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ContabaPeer::DATABASE_NAME, ContabaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ContabaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ContabaPeer::DATABASE_NAME);

		$criteria->add(ContabaPeer::ID, $pk);


		$v = ContabaPeer::doSelect($criteria, $con);

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
			$criteria->add(ContabaPeer::ID, $pks, Criteria::IN);
			$objs = ContabaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseContabaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ContabaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ContabaMapBuilder');
}
