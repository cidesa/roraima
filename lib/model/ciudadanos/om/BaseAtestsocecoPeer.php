<?php


abstract class BaseAtestsocecoPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'atestsoceco';

	
	const CLASS_DEFAULT = 'lib.model.ciudadanos.Atestsoceco';

	
	const NUM_COLUMNS = 100;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ATAYUDAS_ID = 'atestsoceco.ATAYUDAS_ID';

	
	const ATCIUDADANO_ID = 'atestsoceco.ATCIUDADANO_ID';

	
	const ATTIPVIV_ID = 'atestsoceco.ATTIPVIV_ID';

	
	const ATTIPPROVIV_ID = 'atestsoceco.ATTIPPROVIV_ID';

	
	const CARVIVSAL = 'atestsoceco.CARVIVSAL';

	
	const CARVIVCOM = 'atestsoceco.CARVIVCOM';

	
	const CARVIVHAB = 'atestsoceco.CARVIVHAB';

	
	const CARVIVCOC = 'atestsoceco.CARVIVCOC';

	
	const CARVIVBAN = 'atestsoceco.CARVIVBAN';

	
	const CARVIVPAT = 'atestsoceco.CARVIVPAT';

	
	const CARVIVAREVER = 'atestsoceco.CARVIVAREVER';

	
	const CARVIVPIS = 'atestsoceco.CARVIVPIS';

	
	const CARVIVPAR = 'atestsoceco.CARVIVPAR';

	
	const CARVIVTEC = 'atestsoceco.CARVIVTEC';

	
	const ANASOCECO = 'atestsoceco.ANASOCECO';

	
	const ANAFAM = 'atestsoceco.ANAFAM';

	
	const OTROS = 'atestsoceco.OTROS';

	
	const MOTVIS = 'atestsoceco.MOTVIS';

	
	const PARFRI = 'atestsoceco.PARFRI';

	
	const PARINTEXT = 'atestsoceco.PARINTEXT';

	
	const OBSPAR = 'atestsoceco.OBSPAR';

	
	const PARSINFRI = 'atestsoceco.PARSINFRI';

	
	const PARSININTEXT = 'atestsoceco.PARSININTEXT';

	
	const PARMAD = 'atestsoceco.PARMAD';

	
	const PARZIN = 'atestsoceco.PARZIN';

	
	const PARMATDES = 'atestsoceco.PARMATDES';

	
	const SUECEMRUS = 'atestsoceco.SUECEMRUS';

	
	const SUECEMPUL = 'atestsoceco.SUECEMPUL';

	
	const SUETIE = 'atestsoceco.SUETIE';

	
	const SUECER = 'atestsoceco.SUECER';

	
	const SUEGRA = 'atestsoceco.SUEGRA';

	
	const SUEPAR = 'atestsoceco.SUEPAR';

	
	const SUELIN = 'atestsoceco.SUELIN';

	
	const OBSSUE = 'atestsoceco.OBSSUE';

	
	const TECZIN = 'atestsoceco.TECZIN';

	
	const TECMATDES = 'atestsoceco.TECMATDES';

	
	const TECACE = 'atestsoceco.TECACE';

	
	const TECCAR = 'atestsoceco.TECCAR';

	
	const TECTEJ = 'atestsoceco.TECTEJ';

	
	const TECADO = 'atestsoceco.TECADO';

	
	const OBSTEC = 'atestsoceco.OBSTEC';

	
	const VIVNROAMB = 'atestsoceco.VIVNROAMB';

	
	const VIVNROHAB = 'atestsoceco.VIVNROHAB';

	
	const VIVNROBAN = 'atestsoceco.VIVNROBAN';

	
	const BANDENVIV = 'atestsoceco.BANDENVIV';

	
	const BANFUEVIV = 'atestsoceco.BANFUEVIV';

	
	const VIVLET = 'atestsoceco.VIVLET';

	
	const VIVWAT = 'atestsoceco.VIVWAT';

	
	const VIVOTR = 'atestsoceco.VIVOTR';

	
	const VIVDUC = 'atestsoceco.VIVDUC';

	
	const VIVLAV = 'atestsoceco.VIVLAV';

	
	const VIVPAR = 'atestsoceco.VIVPAR';

	
	const VIVPIS = 'atestsoceco.VIVPIS';

	
	const VIVSAL = 'atestsoceco.VIVSAL';

	
	const VIVCOM = 'atestsoceco.VIVCOM';

	
	const VIVSALCOM = 'atestsoceco.VIVSALCOM';

	
	const VIVCOCDENVIV = 'atestsoceco.VIVCOCDENVIV';

	
	const VIVCOCFUEVIV = 'atestsoceco.VIVCOCFUEVIV';

	
	const VIAACCVIVASF = 'atestsoceco.VIAACCVIVASF';

	
	const VIAACCVIVTIE = 'atestsoceco.VIAACCVIVTIE';

	
	const VIAACCVIVESC = 'atestsoceco.VIAACCVIVESC';

	
	const TRAMET = 'atestsoceco.TRAMET';

	
	const TRAFER = 'atestsoceco.TRAFER';

	
	const TRACAM = 'atestsoceco.TRACAM';

	
	const TRAJEE = 'atestsoceco.TRAJEE';

	
	const TRALAN = 'atestsoceco.TRALAN';

	
	const TRABAR = 'atestsoceco.TRABAR';

	
	const TRACAMI = 'atestsoceco.TRACAMI';

	
	const AGUFREDIA = 'atestsoceco.AGUFREDIA';

	
	const AGUFREINT = 'atestsoceco.AGUFREINT';

	
	const AGUFRESEM = 'atestsoceco.AGUFRESEM';

	
	const AGUFRE15D = 'atestsoceco.AGUFRE15D';

	
	const AGUPORTUB = 'atestsoceco.AGUPORTUB';

	
	const AGUPORDEP = 'atestsoceco.AGUPORDEP';

	
	const AGUSERDES = 'atestsoceco.AGUSERDES';

	
	const AGUSERPOZ = 'atestsoceco.AGUSERPOZ';

	
	const ASEURBDIA = 'atestsoceco.ASEURBDIA';

	
	const ASEURBINT = 'atestsoceco.ASEURBINT';

	
	const ASEURBSEM = 'atestsoceco.ASEURBSEM';

	
	const ASEURB15D = 'atestsoceco.ASEURB15D';

	
	const ELEPAG = 'atestsoceco.ELEPAG';

	
	const ELEPAR = 'atestsoceco.ELEPAR';

	
	const GASBOM = 'atestsoceco.GASBOM';

	
	const GASDIR = 'atestsoceco.GASDIR';

	
	const TOTING = 'atestsoceco.TOTING';

	
	const EGRVIV = 'atestsoceco.EGRVIV';

	
	const EGRTRA = 'atestsoceco.EGRTRA';

	
	const EGREDU = 'atestsoceco.EGREDU';

	
	const EGRALI = 'atestsoceco.EGRALI';

	
	const EGRTEL = 'atestsoceco.EGRTEL';

	
	const EGRLUZASE = 'atestsoceco.EGRLUZASE';

	
	const EGRAGU = 'atestsoceco.EGRAGU';

	
	const EGRGAS = 'atestsoceco.EGRGAS';

	
	const EGROTR = 'atestsoceco.EGROTR';

	
	const TOTEGR = 'atestsoceco.TOTEGR';

	
	const DIASOC = 'atestsoceco.DIASOC';

	
	const TRASOC = 'atestsoceco.TRASOC';

	
	const RECOME = 'atestsoceco.RECOME';

	
	const OBSERV = 'atestsoceco.OBSERV';

	
	const ID = 'atestsoceco.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('AtayudasId', 'AtciudadanoId', 'AttipvivId', 'AttipprovivId', 'Carvivsal', 'Carvivcom', 'Carvivhab', 'Carvivcoc', 'Carvivban', 'Carvivpat', 'Carvivarever', 'Carvivpis', 'Carvivpar', 'Carvivtec', 'Anasoceco', 'Anafam', 'Otros', 'Motvis', 'Parfri', 'Parintext', 'Obspar', 'Parsinfri', 'Parsinintext', 'Parmad', 'Parzin', 'Parmatdes', 'Suecemrus', 'Suecempul', 'Suetie', 'Suecer', 'Suegra', 'Suepar', 'Suelin', 'Obssue', 'Teczin', 'Tecmatdes', 'Tecace', 'Teccar', 'Tectej', 'Tecado', 'Obstec', 'Vivnroamb', 'Vivnrohab', 'Vivnroban', 'Bandenviv', 'Banfueviv', 'Vivlet', 'Vivwat', 'Vivotr', 'Vivduc', 'Vivlav', 'Vivpar', 'Vivpis', 'Vivsal', 'Vivcom', 'Vivsalcom', 'Vivcocdenviv', 'Vivcocfueviv', 'Viaaccvivasf', 'Viaaccvivtie', 'Viaaccvivesc', 'Tramet', 'Trafer', 'Tracam', 'Trajee', 'Tralan', 'Trabar', 'Tracami', 'Agufredia', 'Agufreint', 'Agufresem', 'Agufre15d', 'Aguportub', 'Agupordep', 'Aguserdes', 'Aguserpoz', 'Aseurbdia', 'Aseurbint', 'Aseurbsem', 'Aseurb15d', 'Elepag', 'Elepar', 'Gasbom', 'Gasdir', 'Toting', 'Egrviv', 'Egrtra', 'Egredu', 'Egrali', 'Egrtel', 'Egrluzase', 'Egragu', 'Egrgas', 'Egrotr', 'Totegr', 'Diasoc', 'Trasoc', 'Recome', 'Observ', 'Id', ),
		BasePeer::TYPE_COLNAME => array (AtestsocecoPeer::ATAYUDAS_ID, AtestsocecoPeer::ATCIUDADANO_ID, AtestsocecoPeer::ATTIPVIV_ID, AtestsocecoPeer::ATTIPPROVIV_ID, AtestsocecoPeer::CARVIVSAL, AtestsocecoPeer::CARVIVCOM, AtestsocecoPeer::CARVIVHAB, AtestsocecoPeer::CARVIVCOC, AtestsocecoPeer::CARVIVBAN, AtestsocecoPeer::CARVIVPAT, AtestsocecoPeer::CARVIVAREVER, AtestsocecoPeer::CARVIVPIS, AtestsocecoPeer::CARVIVPAR, AtestsocecoPeer::CARVIVTEC, AtestsocecoPeer::ANASOCECO, AtestsocecoPeer::ANAFAM, AtestsocecoPeer::OTROS, AtestsocecoPeer::MOTVIS, AtestsocecoPeer::PARFRI, AtestsocecoPeer::PARINTEXT, AtestsocecoPeer::OBSPAR, AtestsocecoPeer::PARSINFRI, AtestsocecoPeer::PARSININTEXT, AtestsocecoPeer::PARMAD, AtestsocecoPeer::PARZIN, AtestsocecoPeer::PARMATDES, AtestsocecoPeer::SUECEMRUS, AtestsocecoPeer::SUECEMPUL, AtestsocecoPeer::SUETIE, AtestsocecoPeer::SUECER, AtestsocecoPeer::SUEGRA, AtestsocecoPeer::SUEPAR, AtestsocecoPeer::SUELIN, AtestsocecoPeer::OBSSUE, AtestsocecoPeer::TECZIN, AtestsocecoPeer::TECMATDES, AtestsocecoPeer::TECACE, AtestsocecoPeer::TECCAR, AtestsocecoPeer::TECTEJ, AtestsocecoPeer::TECADO, AtestsocecoPeer::OBSTEC, AtestsocecoPeer::VIVNROAMB, AtestsocecoPeer::VIVNROHAB, AtestsocecoPeer::VIVNROBAN, AtestsocecoPeer::BANDENVIV, AtestsocecoPeer::BANFUEVIV, AtestsocecoPeer::VIVLET, AtestsocecoPeer::VIVWAT, AtestsocecoPeer::VIVOTR, AtestsocecoPeer::VIVDUC, AtestsocecoPeer::VIVLAV, AtestsocecoPeer::VIVPAR, AtestsocecoPeer::VIVPIS, AtestsocecoPeer::VIVSAL, AtestsocecoPeer::VIVCOM, AtestsocecoPeer::VIVSALCOM, AtestsocecoPeer::VIVCOCDENVIV, AtestsocecoPeer::VIVCOCFUEVIV, AtestsocecoPeer::VIAACCVIVASF, AtestsocecoPeer::VIAACCVIVTIE, AtestsocecoPeer::VIAACCVIVESC, AtestsocecoPeer::TRAMET, AtestsocecoPeer::TRAFER, AtestsocecoPeer::TRACAM, AtestsocecoPeer::TRAJEE, AtestsocecoPeer::TRALAN, AtestsocecoPeer::TRABAR, AtestsocecoPeer::TRACAMI, AtestsocecoPeer::AGUFREDIA, AtestsocecoPeer::AGUFREINT, AtestsocecoPeer::AGUFRESEM, AtestsocecoPeer::AGUFRE15D, AtestsocecoPeer::AGUPORTUB, AtestsocecoPeer::AGUPORDEP, AtestsocecoPeer::AGUSERDES, AtestsocecoPeer::AGUSERPOZ, AtestsocecoPeer::ASEURBDIA, AtestsocecoPeer::ASEURBINT, AtestsocecoPeer::ASEURBSEM, AtestsocecoPeer::ASEURB15D, AtestsocecoPeer::ELEPAG, AtestsocecoPeer::ELEPAR, AtestsocecoPeer::GASBOM, AtestsocecoPeer::GASDIR, AtestsocecoPeer::TOTING, AtestsocecoPeer::EGRVIV, AtestsocecoPeer::EGRTRA, AtestsocecoPeer::EGREDU, AtestsocecoPeer::EGRALI, AtestsocecoPeer::EGRTEL, AtestsocecoPeer::EGRLUZASE, AtestsocecoPeer::EGRAGU, AtestsocecoPeer::EGRGAS, AtestsocecoPeer::EGROTR, AtestsocecoPeer::TOTEGR, AtestsocecoPeer::DIASOC, AtestsocecoPeer::TRASOC, AtestsocecoPeer::RECOME, AtestsocecoPeer::OBSERV, AtestsocecoPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('atayudas_id', 'atciudadano_id', 'attipviv_id', 'attipproviv_id', 'carvivsal', 'carvivcom', 'carvivhab', 'carvivcoc', 'carvivban', 'carvivpat', 'carvivarever', 'carvivpis', 'carvivpar', 'carvivtec', 'anasoceco', 'anafam', 'otros', 'motvis', 'parfri', 'parintext', 'obspar', 'parsinfri', 'parsinintext', 'parmad', 'parzin', 'parmatdes', 'suecemrus', 'suecempul', 'suetie', 'suecer', 'suegra', 'suepar', 'suelin', 'obssue', 'teczin', 'tecmatdes', 'tecace', 'teccar', 'tectej', 'tecado', 'obstec', 'vivnroamb', 'vivnrohab', 'vivnroban', 'bandenviv', 'banfueviv', 'vivlet', 'vivwat', 'vivotr', 'vivduc', 'vivlav', 'vivpar', 'vivpis', 'vivsal', 'vivcom', 'vivsalcom', 'vivcocdenviv', 'vivcocfueviv', 'viaaccvivasf', 'viaaccvivtie', 'viaaccvivesc', 'tramet', 'trafer', 'tracam', 'trajee', 'tralan', 'trabar', 'tracami', 'agufredia', 'agufreint', 'agufresem', 'agufre15d', 'aguportub', 'agupordep', 'aguserdes', 'aguserpoz', 'aseurbdia', 'aseurbint', 'aseurbsem', 'aseurb15d', 'elepag', 'elepar', 'gasbom', 'gasdir', 'toting', 'egrviv', 'egrtra', 'egredu', 'egrali', 'egrtel', 'egrluzase', 'egragu', 'egrgas', 'egrotr', 'totegr', 'diasoc', 'trasoc', 'recome', 'observ', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('AtayudasId' => 0, 'AtciudadanoId' => 1, 'AttipvivId' => 2, 'AttipprovivId' => 3, 'Carvivsal' => 4, 'Carvivcom' => 5, 'Carvivhab' => 6, 'Carvivcoc' => 7, 'Carvivban' => 8, 'Carvivpat' => 9, 'Carvivarever' => 10, 'Carvivpis' => 11, 'Carvivpar' => 12, 'Carvivtec' => 13, 'Anasoceco' => 14, 'Anafam' => 15, 'Otros' => 16, 'Motvis' => 17, 'Parfri' => 18, 'Parintext' => 19, 'Obspar' => 20, 'Parsinfri' => 21, 'Parsinintext' => 22, 'Parmad' => 23, 'Parzin' => 24, 'Parmatdes' => 25, 'Suecemrus' => 26, 'Suecempul' => 27, 'Suetie' => 28, 'Suecer' => 29, 'Suegra' => 30, 'Suepar' => 31, 'Suelin' => 32, 'Obssue' => 33, 'Teczin' => 34, 'Tecmatdes' => 35, 'Tecace' => 36, 'Teccar' => 37, 'Tectej' => 38, 'Tecado' => 39, 'Obstec' => 40, 'Vivnroamb' => 41, 'Vivnrohab' => 42, 'Vivnroban' => 43, 'Bandenviv' => 44, 'Banfueviv' => 45, 'Vivlet' => 46, 'Vivwat' => 47, 'Vivotr' => 48, 'Vivduc' => 49, 'Vivlav' => 50, 'Vivpar' => 51, 'Vivpis' => 52, 'Vivsal' => 53, 'Vivcom' => 54, 'Vivsalcom' => 55, 'Vivcocdenviv' => 56, 'Vivcocfueviv' => 57, 'Viaaccvivasf' => 58, 'Viaaccvivtie' => 59, 'Viaaccvivesc' => 60, 'Tramet' => 61, 'Trafer' => 62, 'Tracam' => 63, 'Trajee' => 64, 'Tralan' => 65, 'Trabar' => 66, 'Tracami' => 67, 'Agufredia' => 68, 'Agufreint' => 69, 'Agufresem' => 70, 'Agufre15d' => 71, 'Aguportub' => 72, 'Agupordep' => 73, 'Aguserdes' => 74, 'Aguserpoz' => 75, 'Aseurbdia' => 76, 'Aseurbint' => 77, 'Aseurbsem' => 78, 'Aseurb15d' => 79, 'Elepag' => 80, 'Elepar' => 81, 'Gasbom' => 82, 'Gasdir' => 83, 'Toting' => 84, 'Egrviv' => 85, 'Egrtra' => 86, 'Egredu' => 87, 'Egrali' => 88, 'Egrtel' => 89, 'Egrluzase' => 90, 'Egragu' => 91, 'Egrgas' => 92, 'Egrotr' => 93, 'Totegr' => 94, 'Diasoc' => 95, 'Trasoc' => 96, 'Recome' => 97, 'Observ' => 98, 'Id' => 99, ),
		BasePeer::TYPE_COLNAME => array (AtestsocecoPeer::ATAYUDAS_ID => 0, AtestsocecoPeer::ATCIUDADANO_ID => 1, AtestsocecoPeer::ATTIPVIV_ID => 2, AtestsocecoPeer::ATTIPPROVIV_ID => 3, AtestsocecoPeer::CARVIVSAL => 4, AtestsocecoPeer::CARVIVCOM => 5, AtestsocecoPeer::CARVIVHAB => 6, AtestsocecoPeer::CARVIVCOC => 7, AtestsocecoPeer::CARVIVBAN => 8, AtestsocecoPeer::CARVIVPAT => 9, AtestsocecoPeer::CARVIVAREVER => 10, AtestsocecoPeer::CARVIVPIS => 11, AtestsocecoPeer::CARVIVPAR => 12, AtestsocecoPeer::CARVIVTEC => 13, AtestsocecoPeer::ANASOCECO => 14, AtestsocecoPeer::ANAFAM => 15, AtestsocecoPeer::OTROS => 16, AtestsocecoPeer::MOTVIS => 17, AtestsocecoPeer::PARFRI => 18, AtestsocecoPeer::PARINTEXT => 19, AtestsocecoPeer::OBSPAR => 20, AtestsocecoPeer::PARSINFRI => 21, AtestsocecoPeer::PARSININTEXT => 22, AtestsocecoPeer::PARMAD => 23, AtestsocecoPeer::PARZIN => 24, AtestsocecoPeer::PARMATDES => 25, AtestsocecoPeer::SUECEMRUS => 26, AtestsocecoPeer::SUECEMPUL => 27, AtestsocecoPeer::SUETIE => 28, AtestsocecoPeer::SUECER => 29, AtestsocecoPeer::SUEGRA => 30, AtestsocecoPeer::SUEPAR => 31, AtestsocecoPeer::SUELIN => 32, AtestsocecoPeer::OBSSUE => 33, AtestsocecoPeer::TECZIN => 34, AtestsocecoPeer::TECMATDES => 35, AtestsocecoPeer::TECACE => 36, AtestsocecoPeer::TECCAR => 37, AtestsocecoPeer::TECTEJ => 38, AtestsocecoPeer::TECADO => 39, AtestsocecoPeer::OBSTEC => 40, AtestsocecoPeer::VIVNROAMB => 41, AtestsocecoPeer::VIVNROHAB => 42, AtestsocecoPeer::VIVNROBAN => 43, AtestsocecoPeer::BANDENVIV => 44, AtestsocecoPeer::BANFUEVIV => 45, AtestsocecoPeer::VIVLET => 46, AtestsocecoPeer::VIVWAT => 47, AtestsocecoPeer::VIVOTR => 48, AtestsocecoPeer::VIVDUC => 49, AtestsocecoPeer::VIVLAV => 50, AtestsocecoPeer::VIVPAR => 51, AtestsocecoPeer::VIVPIS => 52, AtestsocecoPeer::VIVSAL => 53, AtestsocecoPeer::VIVCOM => 54, AtestsocecoPeer::VIVSALCOM => 55, AtestsocecoPeer::VIVCOCDENVIV => 56, AtestsocecoPeer::VIVCOCFUEVIV => 57, AtestsocecoPeer::VIAACCVIVASF => 58, AtestsocecoPeer::VIAACCVIVTIE => 59, AtestsocecoPeer::VIAACCVIVESC => 60, AtestsocecoPeer::TRAMET => 61, AtestsocecoPeer::TRAFER => 62, AtestsocecoPeer::TRACAM => 63, AtestsocecoPeer::TRAJEE => 64, AtestsocecoPeer::TRALAN => 65, AtestsocecoPeer::TRABAR => 66, AtestsocecoPeer::TRACAMI => 67, AtestsocecoPeer::AGUFREDIA => 68, AtestsocecoPeer::AGUFREINT => 69, AtestsocecoPeer::AGUFRESEM => 70, AtestsocecoPeer::AGUFRE15D => 71, AtestsocecoPeer::AGUPORTUB => 72, AtestsocecoPeer::AGUPORDEP => 73, AtestsocecoPeer::AGUSERDES => 74, AtestsocecoPeer::AGUSERPOZ => 75, AtestsocecoPeer::ASEURBDIA => 76, AtestsocecoPeer::ASEURBINT => 77, AtestsocecoPeer::ASEURBSEM => 78, AtestsocecoPeer::ASEURB15D => 79, AtestsocecoPeer::ELEPAG => 80, AtestsocecoPeer::ELEPAR => 81, AtestsocecoPeer::GASBOM => 82, AtestsocecoPeer::GASDIR => 83, AtestsocecoPeer::TOTING => 84, AtestsocecoPeer::EGRVIV => 85, AtestsocecoPeer::EGRTRA => 86, AtestsocecoPeer::EGREDU => 87, AtestsocecoPeer::EGRALI => 88, AtestsocecoPeer::EGRTEL => 89, AtestsocecoPeer::EGRLUZASE => 90, AtestsocecoPeer::EGRAGU => 91, AtestsocecoPeer::EGRGAS => 92, AtestsocecoPeer::EGROTR => 93, AtestsocecoPeer::TOTEGR => 94, AtestsocecoPeer::DIASOC => 95, AtestsocecoPeer::TRASOC => 96, AtestsocecoPeer::RECOME => 97, AtestsocecoPeer::OBSERV => 98, AtestsocecoPeer::ID => 99, ),
		BasePeer::TYPE_FIELDNAME => array ('atayudas_id' => 0, 'atciudadano_id' => 1, 'attipviv_id' => 2, 'attipproviv_id' => 3, 'carvivsal' => 4, 'carvivcom' => 5, 'carvivhab' => 6, 'carvivcoc' => 7, 'carvivban' => 8, 'carvivpat' => 9, 'carvivarever' => 10, 'carvivpis' => 11, 'carvivpar' => 12, 'carvivtec' => 13, 'anasoceco' => 14, 'anafam' => 15, 'otros' => 16, 'motvis' => 17, 'parfri' => 18, 'parintext' => 19, 'obspar' => 20, 'parsinfri' => 21, 'parsinintext' => 22, 'parmad' => 23, 'parzin' => 24, 'parmatdes' => 25, 'suecemrus' => 26, 'suecempul' => 27, 'suetie' => 28, 'suecer' => 29, 'suegra' => 30, 'suepar' => 31, 'suelin' => 32, 'obssue' => 33, 'teczin' => 34, 'tecmatdes' => 35, 'tecace' => 36, 'teccar' => 37, 'tectej' => 38, 'tecado' => 39, 'obstec' => 40, 'vivnroamb' => 41, 'vivnrohab' => 42, 'vivnroban' => 43, 'bandenviv' => 44, 'banfueviv' => 45, 'vivlet' => 46, 'vivwat' => 47, 'vivotr' => 48, 'vivduc' => 49, 'vivlav' => 50, 'vivpar' => 51, 'vivpis' => 52, 'vivsal' => 53, 'vivcom' => 54, 'vivsalcom' => 55, 'vivcocdenviv' => 56, 'vivcocfueviv' => 57, 'viaaccvivasf' => 58, 'viaaccvivtie' => 59, 'viaaccvivesc' => 60, 'tramet' => 61, 'trafer' => 62, 'tracam' => 63, 'trajee' => 64, 'tralan' => 65, 'trabar' => 66, 'tracami' => 67, 'agufredia' => 68, 'agufreint' => 69, 'agufresem' => 70, 'agufre15d' => 71, 'aguportub' => 72, 'agupordep' => 73, 'aguserdes' => 74, 'aguserpoz' => 75, 'aseurbdia' => 76, 'aseurbint' => 77, 'aseurbsem' => 78, 'aseurb15d' => 79, 'elepag' => 80, 'elepar' => 81, 'gasbom' => 82, 'gasdir' => 83, 'toting' => 84, 'egrviv' => 85, 'egrtra' => 86, 'egredu' => 87, 'egrali' => 88, 'egrtel' => 89, 'egrluzase' => 90, 'egragu' => 91, 'egrgas' => 92, 'egrotr' => 93, 'totegr' => 94, 'diasoc' => 95, 'trasoc' => 96, 'recome' => 97, 'observ' => 98, 'id' => 99, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/ciudadanos/map/AtestsocecoMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.ciudadanos.map.AtestsocecoMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AtestsocecoPeer::getTableMap();
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
		return str_replace(AtestsocecoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AtestsocecoPeer::ATAYUDAS_ID);

		$criteria->addSelectColumn(AtestsocecoPeer::ATCIUDADANO_ID);

		$criteria->addSelectColumn(AtestsocecoPeer::ATTIPVIV_ID);

		$criteria->addSelectColumn(AtestsocecoPeer::ATTIPPROVIV_ID);

		$criteria->addSelectColumn(AtestsocecoPeer::CARVIVSAL);

		$criteria->addSelectColumn(AtestsocecoPeer::CARVIVCOM);

		$criteria->addSelectColumn(AtestsocecoPeer::CARVIVHAB);

		$criteria->addSelectColumn(AtestsocecoPeer::CARVIVCOC);

		$criteria->addSelectColumn(AtestsocecoPeer::CARVIVBAN);

		$criteria->addSelectColumn(AtestsocecoPeer::CARVIVPAT);

		$criteria->addSelectColumn(AtestsocecoPeer::CARVIVAREVER);

		$criteria->addSelectColumn(AtestsocecoPeer::CARVIVPIS);

		$criteria->addSelectColumn(AtestsocecoPeer::CARVIVPAR);

		$criteria->addSelectColumn(AtestsocecoPeer::CARVIVTEC);

		$criteria->addSelectColumn(AtestsocecoPeer::ANASOCECO);

		$criteria->addSelectColumn(AtestsocecoPeer::ANAFAM);

		$criteria->addSelectColumn(AtestsocecoPeer::OTROS);

		$criteria->addSelectColumn(AtestsocecoPeer::MOTVIS);

		$criteria->addSelectColumn(AtestsocecoPeer::PARFRI);

		$criteria->addSelectColumn(AtestsocecoPeer::PARINTEXT);

		$criteria->addSelectColumn(AtestsocecoPeer::OBSPAR);

		$criteria->addSelectColumn(AtestsocecoPeer::PARSINFRI);

		$criteria->addSelectColumn(AtestsocecoPeer::PARSININTEXT);

		$criteria->addSelectColumn(AtestsocecoPeer::PARMAD);

		$criteria->addSelectColumn(AtestsocecoPeer::PARZIN);

		$criteria->addSelectColumn(AtestsocecoPeer::PARMATDES);

		$criteria->addSelectColumn(AtestsocecoPeer::SUECEMRUS);

		$criteria->addSelectColumn(AtestsocecoPeer::SUECEMPUL);

		$criteria->addSelectColumn(AtestsocecoPeer::SUETIE);

		$criteria->addSelectColumn(AtestsocecoPeer::SUECER);

		$criteria->addSelectColumn(AtestsocecoPeer::SUEGRA);

		$criteria->addSelectColumn(AtestsocecoPeer::SUEPAR);

		$criteria->addSelectColumn(AtestsocecoPeer::SUELIN);

		$criteria->addSelectColumn(AtestsocecoPeer::OBSSUE);

		$criteria->addSelectColumn(AtestsocecoPeer::TECZIN);

		$criteria->addSelectColumn(AtestsocecoPeer::TECMATDES);

		$criteria->addSelectColumn(AtestsocecoPeer::TECACE);

		$criteria->addSelectColumn(AtestsocecoPeer::TECCAR);

		$criteria->addSelectColumn(AtestsocecoPeer::TECTEJ);

		$criteria->addSelectColumn(AtestsocecoPeer::TECADO);

		$criteria->addSelectColumn(AtestsocecoPeer::OBSTEC);

		$criteria->addSelectColumn(AtestsocecoPeer::VIVNROAMB);

		$criteria->addSelectColumn(AtestsocecoPeer::VIVNROHAB);

		$criteria->addSelectColumn(AtestsocecoPeer::VIVNROBAN);

		$criteria->addSelectColumn(AtestsocecoPeer::BANDENVIV);

		$criteria->addSelectColumn(AtestsocecoPeer::BANFUEVIV);

		$criteria->addSelectColumn(AtestsocecoPeer::VIVLET);

		$criteria->addSelectColumn(AtestsocecoPeer::VIVWAT);

		$criteria->addSelectColumn(AtestsocecoPeer::VIVOTR);

		$criteria->addSelectColumn(AtestsocecoPeer::VIVDUC);

		$criteria->addSelectColumn(AtestsocecoPeer::VIVLAV);

		$criteria->addSelectColumn(AtestsocecoPeer::VIVPAR);

		$criteria->addSelectColumn(AtestsocecoPeer::VIVPIS);

		$criteria->addSelectColumn(AtestsocecoPeer::VIVSAL);

		$criteria->addSelectColumn(AtestsocecoPeer::VIVCOM);

		$criteria->addSelectColumn(AtestsocecoPeer::VIVSALCOM);

		$criteria->addSelectColumn(AtestsocecoPeer::VIVCOCDENVIV);

		$criteria->addSelectColumn(AtestsocecoPeer::VIVCOCFUEVIV);

		$criteria->addSelectColumn(AtestsocecoPeer::VIAACCVIVASF);

		$criteria->addSelectColumn(AtestsocecoPeer::VIAACCVIVTIE);

		$criteria->addSelectColumn(AtestsocecoPeer::VIAACCVIVESC);

		$criteria->addSelectColumn(AtestsocecoPeer::TRAMET);

		$criteria->addSelectColumn(AtestsocecoPeer::TRAFER);

		$criteria->addSelectColumn(AtestsocecoPeer::TRACAM);

		$criteria->addSelectColumn(AtestsocecoPeer::TRAJEE);

		$criteria->addSelectColumn(AtestsocecoPeer::TRALAN);

		$criteria->addSelectColumn(AtestsocecoPeer::TRABAR);

		$criteria->addSelectColumn(AtestsocecoPeer::TRACAMI);

		$criteria->addSelectColumn(AtestsocecoPeer::AGUFREDIA);

		$criteria->addSelectColumn(AtestsocecoPeer::AGUFREINT);

		$criteria->addSelectColumn(AtestsocecoPeer::AGUFRESEM);

		$criteria->addSelectColumn(AtestsocecoPeer::AGUFRE15D);

		$criteria->addSelectColumn(AtestsocecoPeer::AGUPORTUB);

		$criteria->addSelectColumn(AtestsocecoPeer::AGUPORDEP);

		$criteria->addSelectColumn(AtestsocecoPeer::AGUSERDES);

		$criteria->addSelectColumn(AtestsocecoPeer::AGUSERPOZ);

		$criteria->addSelectColumn(AtestsocecoPeer::ASEURBDIA);

		$criteria->addSelectColumn(AtestsocecoPeer::ASEURBINT);

		$criteria->addSelectColumn(AtestsocecoPeer::ASEURBSEM);

		$criteria->addSelectColumn(AtestsocecoPeer::ASEURB15D);

		$criteria->addSelectColumn(AtestsocecoPeer::ELEPAG);

		$criteria->addSelectColumn(AtestsocecoPeer::ELEPAR);

		$criteria->addSelectColumn(AtestsocecoPeer::GASBOM);

		$criteria->addSelectColumn(AtestsocecoPeer::GASDIR);

		$criteria->addSelectColumn(AtestsocecoPeer::TOTING);

		$criteria->addSelectColumn(AtestsocecoPeer::EGRVIV);

		$criteria->addSelectColumn(AtestsocecoPeer::EGRTRA);

		$criteria->addSelectColumn(AtestsocecoPeer::EGREDU);

		$criteria->addSelectColumn(AtestsocecoPeer::EGRALI);

		$criteria->addSelectColumn(AtestsocecoPeer::EGRTEL);

		$criteria->addSelectColumn(AtestsocecoPeer::EGRLUZASE);

		$criteria->addSelectColumn(AtestsocecoPeer::EGRAGU);

		$criteria->addSelectColumn(AtestsocecoPeer::EGRGAS);

		$criteria->addSelectColumn(AtestsocecoPeer::EGROTR);

		$criteria->addSelectColumn(AtestsocecoPeer::TOTEGR);

		$criteria->addSelectColumn(AtestsocecoPeer::DIASOC);

		$criteria->addSelectColumn(AtestsocecoPeer::TRASOC);

		$criteria->addSelectColumn(AtestsocecoPeer::RECOME);

		$criteria->addSelectColumn(AtestsocecoPeer::OBSERV);

		$criteria->addSelectColumn(AtestsocecoPeer::ID);

	}

	const COUNT = 'COUNT(atestsoceco.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT atestsoceco.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtestsocecoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtestsocecoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AtestsocecoPeer::doSelectRS($criteria, $con);
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
		$objects = AtestsocecoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AtestsocecoPeer::populateObjects(AtestsocecoPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AtestsocecoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AtestsocecoPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinAtayudas(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtestsocecoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtestsocecoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtestsocecoPeer::ATAYUDAS_ID, AtayudasPeer::ID);

		$rs = AtestsocecoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAtciudadano(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtestsocecoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtestsocecoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtestsocecoPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);

		$rs = AtestsocecoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAttipviv(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtestsocecoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtestsocecoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtestsocecoPeer::ATTIPVIV_ID, AttipvivPeer::ID);

		$rs = AtestsocecoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAttipproviv(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtestsocecoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtestsocecoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtestsocecoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);

		$rs = AtestsocecoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAtayudas(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtestsocecoPeer::addSelectColumns($c);
		$startcol = (AtestsocecoPeer::NUM_COLUMNS - AtestsocecoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtayudasPeer::addSelectColumns($c);

		$c->addJoin(AtestsocecoPeer::ATAYUDAS_ID, AtayudasPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtestsocecoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtayudasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAtayudas(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtestsoceco($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtestsocecos();
				$obj2->addAtestsoceco($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAtciudadano(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtestsocecoPeer::addSelectColumns($c);
		$startcol = (AtestsocecoPeer::NUM_COLUMNS - AtestsocecoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtciudadanoPeer::addSelectColumns($c);

		$c->addJoin(AtestsocecoPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtestsocecoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtciudadanoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAtciudadano(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtestsoceco($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtestsocecos();
				$obj2->addAtestsoceco($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAttipviv(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtestsocecoPeer::addSelectColumns($c);
		$startcol = (AtestsocecoPeer::NUM_COLUMNS - AtestsocecoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AttipvivPeer::addSelectColumns($c);

		$c->addJoin(AtestsocecoPeer::ATTIPVIV_ID, AttipvivPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtestsocecoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AttipvivPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAttipviv(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtestsoceco($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtestsocecos();
				$obj2->addAtestsoceco($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAttipproviv(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtestsocecoPeer::addSelectColumns($c);
		$startcol = (AtestsocecoPeer::NUM_COLUMNS - AtestsocecoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AttipprovivPeer::addSelectColumns($c);

		$c->addJoin(AtestsocecoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtestsocecoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AttipprovivPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAttipproviv(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtestsoceco($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtestsocecos();
				$obj2->addAtestsoceco($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtestsocecoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtestsocecoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(AtestsocecoPeer::ATAYUDAS_ID, AtayudasPeer::ID);
	
			$criteria->addJoin(AtestsocecoPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);
	
			$criteria->addJoin(AtestsocecoPeer::ATTIPVIV_ID, AttipvivPeer::ID);
	
			$criteria->addJoin(AtestsocecoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);
	
		$rs = AtestsocecoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtestsocecoPeer::addSelectColumns($c);
		$startcol2 = (AtestsocecoPeer::NUM_COLUMNS - AtestsocecoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			AtayudasPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + AtayudasPeer::NUM_COLUMNS;
	
			AtciudadanoPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + AtciudadanoPeer::NUM_COLUMNS;
	
			AttipvivPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + AttipvivPeer::NUM_COLUMNS;
	
			AttipprovivPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + AttipprovivPeer::NUM_COLUMNS;
	
			$c->addJoin(AtestsocecoPeer::ATAYUDAS_ID, AtayudasPeer::ID);
	
			$c->addJoin(AtestsocecoPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);
	
			$c->addJoin(AtestsocecoPeer::ATTIPVIV_ID, AttipvivPeer::ID);
	
			$c->addJoin(AtestsocecoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtestsocecoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = AtayudasPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getAtayudas(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addAtestsoceco($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initAtestsocecos();
					$obj2->addAtestsoceco($obj1);
				}
	

							
				$omClass = AtciudadanoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getAtciudadano(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addAtestsoceco($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initAtestsocecos();
					$obj3->addAtestsoceco($obj1);
				}
	

							
				$omClass = AttipvivPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getAttipviv(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addAtestsoceco($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initAtestsocecos();
					$obj4->addAtestsoceco($obj1);
				}
	

							
				$omClass = AttipprovivPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5 = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getAttipproviv(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addAtestsoceco($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initAtestsocecos();
					$obj5->addAtestsoceco($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptAtayudas(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(AtestsocecoPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(AtestsocecoPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(AtestsocecoPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);
		
				$criteria->addJoin(AtestsocecoPeer::ATTIPVIV_ID, AttipvivPeer::ID);
		
				$criteria->addJoin(AtestsocecoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);
		
			$rs = AtestsocecoPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptAtciudadano(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(AtestsocecoPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(AtestsocecoPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(AtestsocecoPeer::ATAYUDAS_ID, AtayudasPeer::ID);
		
				$criteria->addJoin(AtestsocecoPeer::ATTIPVIV_ID, AttipvivPeer::ID);
		
				$criteria->addJoin(AtestsocecoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);
		
			$rs = AtestsocecoPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptAttipviv(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(AtestsocecoPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(AtestsocecoPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(AtestsocecoPeer::ATAYUDAS_ID, AtayudasPeer::ID);
		
				$criteria->addJoin(AtestsocecoPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);
		
				$criteria->addJoin(AtestsocecoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);
		
			$rs = AtestsocecoPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptAttipproviv(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(AtestsocecoPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(AtestsocecoPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(AtestsocecoPeer::ATAYUDAS_ID, AtayudasPeer::ID);
		
				$criteria->addJoin(AtestsocecoPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);
		
				$criteria->addJoin(AtestsocecoPeer::ATTIPVIV_ID, AttipvivPeer::ID);
		
			$rs = AtestsocecoPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptAtayudas(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtestsocecoPeer::addSelectColumns($c);
		$startcol2 = (AtestsocecoPeer::NUM_COLUMNS - AtestsocecoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			AtciudadanoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + AtciudadanoPeer::NUM_COLUMNS;
	
			AttipvivPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + AttipvivPeer::NUM_COLUMNS;
	
			AttipprovivPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + AttipprovivPeer::NUM_COLUMNS;
	
			$c->addJoin(AtestsocecoPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);
	
			$c->addJoin(AtestsocecoPeer::ATTIPVIV_ID, AttipvivPeer::ID);
	
			$c->addJoin(AtestsocecoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtestsocecoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = AtciudadanoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getAtciudadano(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addAtestsoceco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initAtestsocecos();
					$obj2->addAtestsoceco($obj1);
				}
	
				$omClass = AttipvivPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getAttipviv(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addAtestsoceco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initAtestsocecos();
					$obj3->addAtestsoceco($obj1);
				}
	
				$omClass = AttipprovivPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getAttipproviv(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addAtestsoceco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initAtestsocecos();
					$obj4->addAtestsoceco($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAtciudadano(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtestsocecoPeer::addSelectColumns($c);
		$startcol2 = (AtestsocecoPeer::NUM_COLUMNS - AtestsocecoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			AtayudasPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + AtayudasPeer::NUM_COLUMNS;
	
			AttipvivPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + AttipvivPeer::NUM_COLUMNS;
	
			AttipprovivPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + AttipprovivPeer::NUM_COLUMNS;
	
			$c->addJoin(AtestsocecoPeer::ATAYUDAS_ID, AtayudasPeer::ID);
	
			$c->addJoin(AtestsocecoPeer::ATTIPVIV_ID, AttipvivPeer::ID);
	
			$c->addJoin(AtestsocecoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtestsocecoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = AtayudasPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getAtayudas(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addAtestsoceco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initAtestsocecos();
					$obj2->addAtestsoceco($obj1);
				}
	
				$omClass = AttipvivPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getAttipviv(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addAtestsoceco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initAtestsocecos();
					$obj3->addAtestsoceco($obj1);
				}
	
				$omClass = AttipprovivPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getAttipproviv(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addAtestsoceco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initAtestsocecos();
					$obj4->addAtestsoceco($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAttipviv(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtestsocecoPeer::addSelectColumns($c);
		$startcol2 = (AtestsocecoPeer::NUM_COLUMNS - AtestsocecoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			AtayudasPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + AtayudasPeer::NUM_COLUMNS;
	
			AtciudadanoPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + AtciudadanoPeer::NUM_COLUMNS;
	
			AttipprovivPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + AttipprovivPeer::NUM_COLUMNS;
	
			$c->addJoin(AtestsocecoPeer::ATAYUDAS_ID, AtayudasPeer::ID);
	
			$c->addJoin(AtestsocecoPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);
	
			$c->addJoin(AtestsocecoPeer::ATTIPPROVIV_ID, AttipprovivPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtestsocecoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = AtayudasPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getAtayudas(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addAtestsoceco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initAtestsocecos();
					$obj2->addAtestsoceco($obj1);
				}
	
				$omClass = AtciudadanoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getAtciudadano(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addAtestsoceco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initAtestsocecos();
					$obj3->addAtestsoceco($obj1);
				}
	
				$omClass = AttipprovivPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getAttipproviv(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addAtestsoceco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initAtestsocecos();
					$obj4->addAtestsoceco($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAttipproviv(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtestsocecoPeer::addSelectColumns($c);
		$startcol2 = (AtestsocecoPeer::NUM_COLUMNS - AtestsocecoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			AtayudasPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + AtayudasPeer::NUM_COLUMNS;
	
			AtciudadanoPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + AtciudadanoPeer::NUM_COLUMNS;
	
			AttipvivPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + AttipvivPeer::NUM_COLUMNS;
	
			$c->addJoin(AtestsocecoPeer::ATAYUDAS_ID, AtayudasPeer::ID);
	
			$c->addJoin(AtestsocecoPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);
	
			$c->addJoin(AtestsocecoPeer::ATTIPVIV_ID, AttipvivPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtestsocecoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = AtayudasPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getAtayudas(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addAtestsoceco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initAtestsocecos();
					$obj2->addAtestsoceco($obj1);
				}
	
				$omClass = AtciudadanoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getAtciudadano(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addAtestsoceco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initAtestsocecos();
					$obj3->addAtestsoceco($obj1);
				}
	
				$omClass = AttipvivPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getAttipviv(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addAtestsoceco($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initAtestsocecos();
					$obj4->addAtestsoceco($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}

	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return AtestsocecoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(AtestsocecoPeer::ID); 

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
			$comparison = $criteria->getComparison(AtestsocecoPeer::ID);
			$selectCriteria->add(AtestsocecoPeer::ID, $criteria->remove(AtestsocecoPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AtestsocecoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AtestsocecoPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Atestsoceco) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AtestsocecoPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Atestsoceco $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AtestsocecoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AtestsocecoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(AtestsocecoPeer::DATABASE_NAME, AtestsocecoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = AtestsocecoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(AtestsocecoPeer::DATABASE_NAME);

		$criteria->add(AtestsocecoPeer::ID, $pk);


		$v = AtestsocecoPeer::doSelect($criteria, $con);

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
			$criteria->add(AtestsocecoPeer::ID, $pks, Criteria::IN);
			$objs = AtestsocecoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAtestsocecoPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/ciudadanos/map/AtestsocecoMapBuilder.php';
	Propel::registerMapBuilder('lib.model.ciudadanos.map.AtestsocecoMapBuilder');
}
