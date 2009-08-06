<?php


abstract class BaseNphojintPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'nphojint';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Nphojint';

	
	const NUM_COLUMNS = 95;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'nphojint.CODEMP';

	
	const NOMEMP = 'nphojint.NOMEMP';

	
	const CEDEMP = 'nphojint.CEDEMP';

	
	const NUMCON = 'nphojint.NUMCON';

	
	const EDOCIV = 'nphojint.EDOCIV';

	
	const NACEMP = 'nphojint.NACEMP';

	
	const SEXEMP = 'nphojint.SEXEMP';

	
	const FECNAC = 'nphojint.FECNAC';

	
	const EDAEMP = 'nphojint.EDAEMP';

	
	const LUGNAC = 'nphojint.LUGNAC';

	
	const DIRHAB = 'nphojint.DIRHAB';

	
	const CODCIU = 'nphojint.CODCIU';

	
	const TELHAB = 'nphojint.TELHAB';

	
	const CELEMP = 'nphojint.CELEMP';

	
	const EMAEMP = 'nphojint.EMAEMP';

	
	const CODPOS = 'nphojint.CODPOS';

	
	const TALPAN = 'nphojint.TALPAN';

	
	const TALCAM = 'nphojint.TALCAM';

	
	const TALCAL = 'nphojint.TALCAL';

	
	const DERZUR = 'nphojint.DERZUR';

	
	const FECING = 'nphojint.FECING';

	
	const FECRET = 'nphojint.FECRET';

	
	const FECREI = 'nphojint.FECREI';

	
	const FECADMPUB = 'nphojint.FECADMPUB';

	
	const STAEMP = 'nphojint.STAEMP';

	
	const FOTEMP = 'nphojint.FOTEMP';

	
	const NUMSSO = 'nphojint.NUMSSO';

	
	const NUMPOLSEG = 'nphojint.NUMPOLSEG';

	
	const FECCOTSSO = 'nphojint.FECCOTSSO';

	
	const ANOADMPUB = 'nphojint.ANOADMPUB';

	
	const CODTIPPAG = 'nphojint.CODTIPPAG';

	
	const CODBAN = 'nphojint.CODBAN';

	
	const TIPCUE = 'nphojint.TIPCUE';

	
	const NUMCUE = 'nphojint.NUMCUE';

	
	const OBSEMP = 'nphojint.OBSEMP';

	
	const TIEFID = 'nphojint.TIEFID';

	
	const GRULAB = 'nphojint.GRULAB';

	
	const GRUOTR = 'nphojint.GRUOTR';

	
	const TRASLADO = 'nphojint.TRASLADO';

	
	const TRAOTR = 'nphojint.TRAOTR';

	
	const TIPVIV = 'nphojint.TIPVIV';

	
	const VIVOTR = 'nphojint.VIVOTR';

	
	const FORTEN = 'nphojint.FORTEN';

	
	const TENOTR = 'nphojint.TENOTR';

	
	const SERCON = 'nphojint.SERCON';

	
	const DIROTR = 'nphojint.DIROTR';

	
	const TELOTR = 'nphojint.TELOTR';

	
	const CODPAI = 'nphojint.CODPAI';

	
	const CODPA2 = 'nphojint.CODPA2';

	
	const CODEST = 'nphojint.CODEST';

	
	const CODES2 = 'nphojint.CODES2';

	
	const CODCI2 = 'nphojint.CODCI2';

	
	const CODRAC = 'nphojint.CODRAC';

	
	const CODNIV = 'nphojint.CODNIV';

	
	const TELHA2 = 'nphojint.TELHA2';

	
	const TELOT2 = 'nphojint.TELOT2';

	
	const CODPROFES = 'nphojint.CODPROFES';

	
	const HCMEXO = 'nphojint.HCMEXO';

	
	const CODBANFID = 'nphojint.CODBANFID';

	
	const CODBANLPH = 'nphojint.CODBANLPH';

	
	const NUMCUEFID = 'nphojint.NUMCUEFID';

	
	const NUMCUELPH = 'nphojint.NUMCUELPH';

	
	const CODEMPANT = 'nphojint.CODEMPANT';

	
	const GRUSAN = 'nphojint.GRUSAN';

	
	const OBSGEN = 'nphojint.OBSGEN';

	
	const CODREGPAI = 'nphojint.CODREGPAI';

	
	const CODREGEST = 'nphojint.CODREGEST';

	
	const CODREGCIU = 'nphojint.CODREGCIU';

	
	const FECGRA = 'nphojint.FECGRA';

	
	const GRUSANGRE = 'nphojint.GRUSANGRE';

	
	const NUMGACETA = 'nphojint.NUMGACETA';

	
	const FECGACETA = 'nphojint.FECGACETA';

	
	const DIAGRA = 'nphojint.DIAGRA';

	
	const MESGRA = 'nphojint.MESGRA';

	
	const ANOGRA = 'nphojint.ANOGRA';

	
	const TEMPORAL = 'nphojint.TEMPORAL';

	
	const DETEXP = 'nphojint.DETEXP';

	
	const NUMEXP = 'nphojint.NUMEXP';

	
	const MODPAGCESTIC = 'nphojint.MODPAGCESTIC';

	
	const CODRET = 'nphojint.CODRET';

	
	const SITUAC = 'nphojint.SITUAC';

	
	const PROFES = 'nphojint.PROFES';

	
	const CODNIVEDU = 'nphojint.CODNIVEDU';

	
	const FECCORACU = 'nphojint.FECCORACU';

	
	const CAPACTACU = 'nphojint.CAPACTACU';

	
	const INTACU = 'nphojint.INTACU';

	
	const ANTACU = 'nphojint.ANTACU';

	
	const DIAACU = 'nphojint.DIAACU';

	
	const DIAADIACU = 'nphojint.DIAADIACU';

	
	const SEGHCM = 'nphojint.SEGHCM';

	
	const PORSEGHCM = 'nphojint.PORSEGHCM';

	
	const UBIFIS = 'nphojint.UBIFIS';

	
	const TIPCUEAHO = 'nphojint.TIPCUEAHO';

	
	const NUMCUEAHO = 'nphojint.NUMCUEAHO';

	
	const ID = 'nphojint.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Nomemp', 'Cedemp', 'Numcon', 'Edociv', 'Nacemp', 'Sexemp', 'Fecnac', 'Edaemp', 'Lugnac', 'Dirhab', 'Codciu', 'Telhab', 'Celemp', 'Emaemp', 'Codpos', 'Talpan', 'Talcam', 'Talcal', 'Derzur', 'Fecing', 'Fecret', 'Fecrei', 'Fecadmpub', 'Staemp', 'Fotemp', 'Numsso', 'Numpolseg', 'Feccotsso', 'Anoadmpub', 'Codtippag', 'Codban', 'Tipcue', 'Numcue', 'Obsemp', 'Tiefid', 'Grulab', 'Gruotr', 'Traslado', 'Traotr', 'Tipviv', 'Vivotr', 'Forten', 'Tenotr', 'Sercon', 'Dirotr', 'Telotr', 'Codpai', 'Codpa2', 'Codest', 'Codes2', 'Codci2', 'Codrac', 'Codniv', 'Telha2', 'Telot2', 'Codprofes', 'Hcmexo', 'Codbanfid', 'Codbanlph', 'Numcuefid', 'Numcuelph', 'Codempant', 'Grusan', 'Obsgen', 'Codregpai', 'Codregest', 'Codregciu', 'Fecgra', 'Grusangre', 'Numgaceta', 'Fecgaceta', 'Diagra', 'Mesgra', 'Anogra', 'Temporal', 'Detexp', 'Numexp', 'Modpagcestic', 'Codret', 'Situac', 'Profes', 'Codnivedu', 'Feccoracu', 'Capactacu', 'Intacu', 'Antacu', 'Diaacu', 'Diaadiacu', 'Seghcm', 'Porseghcm', 'Ubifis', 'Tipcueaho', 'Numcueaho', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NphojintPeer::CODEMP, NphojintPeer::NOMEMP, NphojintPeer::CEDEMP, NphojintPeer::NUMCON, NphojintPeer::EDOCIV, NphojintPeer::NACEMP, NphojintPeer::SEXEMP, NphojintPeer::FECNAC, NphojintPeer::EDAEMP, NphojintPeer::LUGNAC, NphojintPeer::DIRHAB, NphojintPeer::CODCIU, NphojintPeer::TELHAB, NphojintPeer::CELEMP, NphojintPeer::EMAEMP, NphojintPeer::CODPOS, NphojintPeer::TALPAN, NphojintPeer::TALCAM, NphojintPeer::TALCAL, NphojintPeer::DERZUR, NphojintPeer::FECING, NphojintPeer::FECRET, NphojintPeer::FECREI, NphojintPeer::FECADMPUB, NphojintPeer::STAEMP, NphojintPeer::FOTEMP, NphojintPeer::NUMSSO, NphojintPeer::NUMPOLSEG, NphojintPeer::FECCOTSSO, NphojintPeer::ANOADMPUB, NphojintPeer::CODTIPPAG, NphojintPeer::CODBAN, NphojintPeer::TIPCUE, NphojintPeer::NUMCUE, NphojintPeer::OBSEMP, NphojintPeer::TIEFID, NphojintPeer::GRULAB, NphojintPeer::GRUOTR, NphojintPeer::TRASLADO, NphojintPeer::TRAOTR, NphojintPeer::TIPVIV, NphojintPeer::VIVOTR, NphojintPeer::FORTEN, NphojintPeer::TENOTR, NphojintPeer::SERCON, NphojintPeer::DIROTR, NphojintPeer::TELOTR, NphojintPeer::CODPAI, NphojintPeer::CODPA2, NphojintPeer::CODEST, NphojintPeer::CODES2, NphojintPeer::CODCI2, NphojintPeer::CODRAC, NphojintPeer::CODNIV, NphojintPeer::TELHA2, NphojintPeer::TELOT2, NphojintPeer::CODPROFES, NphojintPeer::HCMEXO, NphojintPeer::CODBANFID, NphojintPeer::CODBANLPH, NphojintPeer::NUMCUEFID, NphojintPeer::NUMCUELPH, NphojintPeer::CODEMPANT, NphojintPeer::GRUSAN, NphojintPeer::OBSGEN, NphojintPeer::CODREGPAI, NphojintPeer::CODREGEST, NphojintPeer::CODREGCIU, NphojintPeer::FECGRA, NphojintPeer::GRUSANGRE, NphojintPeer::NUMGACETA, NphojintPeer::FECGACETA, NphojintPeer::DIAGRA, NphojintPeer::MESGRA, NphojintPeer::ANOGRA, NphojintPeer::TEMPORAL, NphojintPeer::DETEXP, NphojintPeer::NUMEXP, NphojintPeer::MODPAGCESTIC, NphojintPeer::CODRET, NphojintPeer::SITUAC, NphojintPeer::PROFES, NphojintPeer::CODNIVEDU, NphojintPeer::FECCORACU, NphojintPeer::CAPACTACU, NphojintPeer::INTACU, NphojintPeer::ANTACU, NphojintPeer::DIAACU, NphojintPeer::DIAADIACU, NphojintPeer::SEGHCM, NphojintPeer::PORSEGHCM, NphojintPeer::UBIFIS, NphojintPeer::TIPCUEAHO, NphojintPeer::NUMCUEAHO, NphojintPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'nomemp', 'cedemp', 'numcon', 'edociv', 'nacemp', 'sexemp', 'fecnac', 'edaemp', 'lugnac', 'dirhab', 'codciu', 'telhab', 'celemp', 'emaemp', 'codpos', 'talpan', 'talcam', 'talcal', 'derzur', 'fecing', 'fecret', 'fecrei', 'fecadmpub', 'staemp', 'fotemp', 'numsso', 'numpolseg', 'feccotsso', 'anoadmpub', 'codtippag', 'codban', 'tipcue', 'numcue', 'obsemp', 'tiefid', 'grulab', 'gruotr', 'traslado', 'traotr', 'tipviv', 'vivotr', 'forten', 'tenotr', 'sercon', 'dirotr', 'telotr', 'codpai', 'codpa2', 'codest', 'codes2', 'codci2', 'codrac', 'codniv', 'telha2', 'telot2', 'codprofes', 'hcmexo', 'codbanfid', 'codbanlph', 'numcuefid', 'numcuelph', 'codempant', 'grusan', 'obsgen', 'codregpai', 'codregest', 'codregciu', 'fecgra', 'grusangre', 'numgaceta', 'fecgaceta', 'diagra', 'mesgra', 'anogra', 'temporal', 'detexp', 'numexp', 'modpagcestic', 'codret', 'situac', 'profes', 'codnivedu', 'feccoracu', 'capactacu', 'intacu', 'antacu', 'diaacu', 'diaadiacu', 'seghcm', 'porseghcm', 'ubifis', 'tipcueaho', 'numcueaho', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Nomemp' => 1, 'Cedemp' => 2, 'Numcon' => 3, 'Edociv' => 4, 'Nacemp' => 5, 'Sexemp' => 6, 'Fecnac' => 7, 'Edaemp' => 8, 'Lugnac' => 9, 'Dirhab' => 10, 'Codciu' => 11, 'Telhab' => 12, 'Celemp' => 13, 'Emaemp' => 14, 'Codpos' => 15, 'Talpan' => 16, 'Talcam' => 17, 'Talcal' => 18, 'Derzur' => 19, 'Fecing' => 20, 'Fecret' => 21, 'Fecrei' => 22, 'Fecadmpub' => 23, 'Staemp' => 24, 'Fotemp' => 25, 'Numsso' => 26, 'Numpolseg' => 27, 'Feccotsso' => 28, 'Anoadmpub' => 29, 'Codtippag' => 30, 'Codban' => 31, 'Tipcue' => 32, 'Numcue' => 33, 'Obsemp' => 34, 'Tiefid' => 35, 'Grulab' => 36, 'Gruotr' => 37, 'Traslado' => 38, 'Traotr' => 39, 'Tipviv' => 40, 'Vivotr' => 41, 'Forten' => 42, 'Tenotr' => 43, 'Sercon' => 44, 'Dirotr' => 45, 'Telotr' => 46, 'Codpai' => 47, 'Codpa2' => 48, 'Codest' => 49, 'Codes2' => 50, 'Codci2' => 51, 'Codrac' => 52, 'Codniv' => 53, 'Telha2' => 54, 'Telot2' => 55, 'Codprofes' => 56, 'Hcmexo' => 57, 'Codbanfid' => 58, 'Codbanlph' => 59, 'Numcuefid' => 60, 'Numcuelph' => 61, 'Codempant' => 62, 'Grusan' => 63, 'Obsgen' => 64, 'Codregpai' => 65, 'Codregest' => 66, 'Codregciu' => 67, 'Fecgra' => 68, 'Grusangre' => 69, 'Numgaceta' => 70, 'Fecgaceta' => 71, 'Diagra' => 72, 'Mesgra' => 73, 'Anogra' => 74, 'Temporal' => 75, 'Detexp' => 76, 'Numexp' => 77, 'Modpagcestic' => 78, 'Codret' => 79, 'Situac' => 80, 'Profes' => 81, 'Codnivedu' => 82, 'Feccoracu' => 83, 'Capactacu' => 84, 'Intacu' => 85, 'Antacu' => 86, 'Diaacu' => 87, 'Diaadiacu' => 88, 'Seghcm' => 89, 'Porseghcm' => 90, 'Ubifis' => 91, 'Tipcueaho' => 92, 'Numcueaho' => 93, 'Id' => 94, ),
		BasePeer::TYPE_COLNAME => array (NphojintPeer::CODEMP => 0, NphojintPeer::NOMEMP => 1, NphojintPeer::CEDEMP => 2, NphojintPeer::NUMCON => 3, NphojintPeer::EDOCIV => 4, NphojintPeer::NACEMP => 5, NphojintPeer::SEXEMP => 6, NphojintPeer::FECNAC => 7, NphojintPeer::EDAEMP => 8, NphojintPeer::LUGNAC => 9, NphojintPeer::DIRHAB => 10, NphojintPeer::CODCIU => 11, NphojintPeer::TELHAB => 12, NphojintPeer::CELEMP => 13, NphojintPeer::EMAEMP => 14, NphojintPeer::CODPOS => 15, NphojintPeer::TALPAN => 16, NphojintPeer::TALCAM => 17, NphojintPeer::TALCAL => 18, NphojintPeer::DERZUR => 19, NphojintPeer::FECING => 20, NphojintPeer::FECRET => 21, NphojintPeer::FECREI => 22, NphojintPeer::FECADMPUB => 23, NphojintPeer::STAEMP => 24, NphojintPeer::FOTEMP => 25, NphojintPeer::NUMSSO => 26, NphojintPeer::NUMPOLSEG => 27, NphojintPeer::FECCOTSSO => 28, NphojintPeer::ANOADMPUB => 29, NphojintPeer::CODTIPPAG => 30, NphojintPeer::CODBAN => 31, NphojintPeer::TIPCUE => 32, NphojintPeer::NUMCUE => 33, NphojintPeer::OBSEMP => 34, NphojintPeer::TIEFID => 35, NphojintPeer::GRULAB => 36, NphojintPeer::GRUOTR => 37, NphojintPeer::TRASLADO => 38, NphojintPeer::TRAOTR => 39, NphojintPeer::TIPVIV => 40, NphojintPeer::VIVOTR => 41, NphojintPeer::FORTEN => 42, NphojintPeer::TENOTR => 43, NphojintPeer::SERCON => 44, NphojintPeer::DIROTR => 45, NphojintPeer::TELOTR => 46, NphojintPeer::CODPAI => 47, NphojintPeer::CODPA2 => 48, NphojintPeer::CODEST => 49, NphojintPeer::CODES2 => 50, NphojintPeer::CODCI2 => 51, NphojintPeer::CODRAC => 52, NphojintPeer::CODNIV => 53, NphojintPeer::TELHA2 => 54, NphojintPeer::TELOT2 => 55, NphojintPeer::CODPROFES => 56, NphojintPeer::HCMEXO => 57, NphojintPeer::CODBANFID => 58, NphojintPeer::CODBANLPH => 59, NphojintPeer::NUMCUEFID => 60, NphojintPeer::NUMCUELPH => 61, NphojintPeer::CODEMPANT => 62, NphojintPeer::GRUSAN => 63, NphojintPeer::OBSGEN => 64, NphojintPeer::CODREGPAI => 65, NphojintPeer::CODREGEST => 66, NphojintPeer::CODREGCIU => 67, NphojintPeer::FECGRA => 68, NphojintPeer::GRUSANGRE => 69, NphojintPeer::NUMGACETA => 70, NphojintPeer::FECGACETA => 71, NphojintPeer::DIAGRA => 72, NphojintPeer::MESGRA => 73, NphojintPeer::ANOGRA => 74, NphojintPeer::TEMPORAL => 75, NphojintPeer::DETEXP => 76, NphojintPeer::NUMEXP => 77, NphojintPeer::MODPAGCESTIC => 78, NphojintPeer::CODRET => 79, NphojintPeer::SITUAC => 80, NphojintPeer::PROFES => 81, NphojintPeer::CODNIVEDU => 82, NphojintPeer::FECCORACU => 83, NphojintPeer::CAPACTACU => 84, NphojintPeer::INTACU => 85, NphojintPeer::ANTACU => 86, NphojintPeer::DIAACU => 87, NphojintPeer::DIAADIACU => 88, NphojintPeer::SEGHCM => 89, NphojintPeer::PORSEGHCM => 90, NphojintPeer::UBIFIS => 91, NphojintPeer::TIPCUEAHO => 92, NphojintPeer::NUMCUEAHO => 93, NphojintPeer::ID => 94, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'nomemp' => 1, 'cedemp' => 2, 'numcon' => 3, 'edociv' => 4, 'nacemp' => 5, 'sexemp' => 6, 'fecnac' => 7, 'edaemp' => 8, 'lugnac' => 9, 'dirhab' => 10, 'codciu' => 11, 'telhab' => 12, 'celemp' => 13, 'emaemp' => 14, 'codpos' => 15, 'talpan' => 16, 'talcam' => 17, 'talcal' => 18, 'derzur' => 19, 'fecing' => 20, 'fecret' => 21, 'fecrei' => 22, 'fecadmpub' => 23, 'staemp' => 24, 'fotemp' => 25, 'numsso' => 26, 'numpolseg' => 27, 'feccotsso' => 28, 'anoadmpub' => 29, 'codtippag' => 30, 'codban' => 31, 'tipcue' => 32, 'numcue' => 33, 'obsemp' => 34, 'tiefid' => 35, 'grulab' => 36, 'gruotr' => 37, 'traslado' => 38, 'traotr' => 39, 'tipviv' => 40, 'vivotr' => 41, 'forten' => 42, 'tenotr' => 43, 'sercon' => 44, 'dirotr' => 45, 'telotr' => 46, 'codpai' => 47, 'codpa2' => 48, 'codest' => 49, 'codes2' => 50, 'codci2' => 51, 'codrac' => 52, 'codniv' => 53, 'telha2' => 54, 'telot2' => 55, 'codprofes' => 56, 'hcmexo' => 57, 'codbanfid' => 58, 'codbanlph' => 59, 'numcuefid' => 60, 'numcuelph' => 61, 'codempant' => 62, 'grusan' => 63, 'obsgen' => 64, 'codregpai' => 65, 'codregest' => 66, 'codregciu' => 67, 'fecgra' => 68, 'grusangre' => 69, 'numgaceta' => 70, 'fecgaceta' => 71, 'diagra' => 72, 'mesgra' => 73, 'anogra' => 74, 'temporal' => 75, 'detexp' => 76, 'numexp' => 77, 'modpagcestic' => 78, 'codret' => 79, 'situac' => 80, 'profes' => 81, 'codnivedu' => 82, 'feccoracu' => 83, 'capactacu' => 84, 'intacu' => 85, 'antacu' => 86, 'diaacu' => 87, 'diaadiacu' => 88, 'seghcm' => 89, 'porseghcm' => 90, 'ubifis' => 91, 'tipcueaho' => 92, 'numcueaho' => 93, 'id' => 94, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NphojintMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NphojintMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NphojintPeer::getTableMap();
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
		return str_replace(NphojintPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NphojintPeer::CODEMP);

		$criteria->addSelectColumn(NphojintPeer::NOMEMP);

		$criteria->addSelectColumn(NphojintPeer::CEDEMP);

		$criteria->addSelectColumn(NphojintPeer::NUMCON);

		$criteria->addSelectColumn(NphojintPeer::EDOCIV);

		$criteria->addSelectColumn(NphojintPeer::NACEMP);

		$criteria->addSelectColumn(NphojintPeer::SEXEMP);

		$criteria->addSelectColumn(NphojintPeer::FECNAC);

		$criteria->addSelectColumn(NphojintPeer::EDAEMP);

		$criteria->addSelectColumn(NphojintPeer::LUGNAC);

		$criteria->addSelectColumn(NphojintPeer::DIRHAB);

		$criteria->addSelectColumn(NphojintPeer::CODCIU);

		$criteria->addSelectColumn(NphojintPeer::TELHAB);

		$criteria->addSelectColumn(NphojintPeer::CELEMP);

		$criteria->addSelectColumn(NphojintPeer::EMAEMP);

		$criteria->addSelectColumn(NphojintPeer::CODPOS);

		$criteria->addSelectColumn(NphojintPeer::TALPAN);

		$criteria->addSelectColumn(NphojintPeer::TALCAM);

		$criteria->addSelectColumn(NphojintPeer::TALCAL);

		$criteria->addSelectColumn(NphojintPeer::DERZUR);

		$criteria->addSelectColumn(NphojintPeer::FECING);

		$criteria->addSelectColumn(NphojintPeer::FECRET);

		$criteria->addSelectColumn(NphojintPeer::FECREI);

		$criteria->addSelectColumn(NphojintPeer::FECADMPUB);

		$criteria->addSelectColumn(NphojintPeer::STAEMP);

		$criteria->addSelectColumn(NphojintPeer::FOTEMP);

		$criteria->addSelectColumn(NphojintPeer::NUMSSO);

		$criteria->addSelectColumn(NphojintPeer::NUMPOLSEG);

		$criteria->addSelectColumn(NphojintPeer::FECCOTSSO);

		$criteria->addSelectColumn(NphojintPeer::ANOADMPUB);

		$criteria->addSelectColumn(NphojintPeer::CODTIPPAG);

		$criteria->addSelectColumn(NphojintPeer::CODBAN);

		$criteria->addSelectColumn(NphojintPeer::TIPCUE);

		$criteria->addSelectColumn(NphojintPeer::NUMCUE);

		$criteria->addSelectColumn(NphojintPeer::OBSEMP);

		$criteria->addSelectColumn(NphojintPeer::TIEFID);

		$criteria->addSelectColumn(NphojintPeer::GRULAB);

		$criteria->addSelectColumn(NphojintPeer::GRUOTR);

		$criteria->addSelectColumn(NphojintPeer::TRASLADO);

		$criteria->addSelectColumn(NphojintPeer::TRAOTR);

		$criteria->addSelectColumn(NphojintPeer::TIPVIV);

		$criteria->addSelectColumn(NphojintPeer::VIVOTR);

		$criteria->addSelectColumn(NphojintPeer::FORTEN);

		$criteria->addSelectColumn(NphojintPeer::TENOTR);

		$criteria->addSelectColumn(NphojintPeer::SERCON);

		$criteria->addSelectColumn(NphojintPeer::DIROTR);

		$criteria->addSelectColumn(NphojintPeer::TELOTR);

		$criteria->addSelectColumn(NphojintPeer::CODPAI);

		$criteria->addSelectColumn(NphojintPeer::CODPA2);

		$criteria->addSelectColumn(NphojintPeer::CODEST);

		$criteria->addSelectColumn(NphojintPeer::CODES2);

		$criteria->addSelectColumn(NphojintPeer::CODCI2);

		$criteria->addSelectColumn(NphojintPeer::CODRAC);

		$criteria->addSelectColumn(NphojintPeer::CODNIV);

		$criteria->addSelectColumn(NphojintPeer::TELHA2);

		$criteria->addSelectColumn(NphojintPeer::TELOT2);

		$criteria->addSelectColumn(NphojintPeer::CODPROFES);

		$criteria->addSelectColumn(NphojintPeer::HCMEXO);

		$criteria->addSelectColumn(NphojintPeer::CODBANFID);

		$criteria->addSelectColumn(NphojintPeer::CODBANLPH);

		$criteria->addSelectColumn(NphojintPeer::NUMCUEFID);

		$criteria->addSelectColumn(NphojintPeer::NUMCUELPH);

		$criteria->addSelectColumn(NphojintPeer::CODEMPANT);

		$criteria->addSelectColumn(NphojintPeer::GRUSAN);

		$criteria->addSelectColumn(NphojintPeer::OBSGEN);

		$criteria->addSelectColumn(NphojintPeer::CODREGPAI);

		$criteria->addSelectColumn(NphojintPeer::CODREGEST);

		$criteria->addSelectColumn(NphojintPeer::CODREGCIU);

		$criteria->addSelectColumn(NphojintPeer::FECGRA);

		$criteria->addSelectColumn(NphojintPeer::GRUSANGRE);

		$criteria->addSelectColumn(NphojintPeer::NUMGACETA);

		$criteria->addSelectColumn(NphojintPeer::FECGACETA);

		$criteria->addSelectColumn(NphojintPeer::DIAGRA);

		$criteria->addSelectColumn(NphojintPeer::MESGRA);

		$criteria->addSelectColumn(NphojintPeer::ANOGRA);

		$criteria->addSelectColumn(NphojintPeer::TEMPORAL);

		$criteria->addSelectColumn(NphojintPeer::DETEXP);

		$criteria->addSelectColumn(NphojintPeer::NUMEXP);

		$criteria->addSelectColumn(NphojintPeer::MODPAGCESTIC);

		$criteria->addSelectColumn(NphojintPeer::CODRET);

		$criteria->addSelectColumn(NphojintPeer::SITUAC);

		$criteria->addSelectColumn(NphojintPeer::PROFES);

		$criteria->addSelectColumn(NphojintPeer::CODNIVEDU);

		$criteria->addSelectColumn(NphojintPeer::FECCORACU);

		$criteria->addSelectColumn(NphojintPeer::CAPACTACU);

		$criteria->addSelectColumn(NphojintPeer::INTACU);

		$criteria->addSelectColumn(NphojintPeer::ANTACU);

		$criteria->addSelectColumn(NphojintPeer::DIAACU);

		$criteria->addSelectColumn(NphojintPeer::DIAADIACU);

		$criteria->addSelectColumn(NphojintPeer::SEGHCM);

		$criteria->addSelectColumn(NphojintPeer::PORSEGHCM);

		$criteria->addSelectColumn(NphojintPeer::UBIFIS);

		$criteria->addSelectColumn(NphojintPeer::TIPCUEAHO);

		$criteria->addSelectColumn(NphojintPeer::NUMCUEAHO);

		$criteria->addSelectColumn(NphojintPeer::ID);

	}

	const COUNT = 'COUNT(nphojint.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT nphojint.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NphojintPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NphojintPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NphojintPeer::doSelectRS($criteria, $con);
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
		$objects = NphojintPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NphojintPeer::populateObjects(NphojintPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NphojintPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NphojintPeer::getOMClass();
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
		return NphojintPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NphojintPeer::ID); 

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
			$comparison = $criteria->getComparison(NphojintPeer::ID);
			$selectCriteria->add(NphojintPeer::ID, $criteria->remove(NphojintPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NphojintPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NphojintPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Nphojint) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NphojintPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Nphojint $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NphojintPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NphojintPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NphojintPeer::DATABASE_NAME, NphojintPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NphojintPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NphojintPeer::DATABASE_NAME);

		$criteria->add(NphojintPeer::ID, $pk);


		$v = NphojintPeer::doSelect($criteria, $con);

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
			$criteria->add(NphojintPeer::ID, $pks, Criteria::IN);
			$objs = NphojintPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNphojintPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NphojintMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NphojintMapBuilder');
}
