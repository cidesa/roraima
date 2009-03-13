

CREATE OR REPLACE FUNCTION "SIMA002".trig_actcom()
  RETURNS "trigger" AS
$BODY$DECLARE
   ACTUALIZA INTEGER;
   REGISTRO RECORD;
   INI INTEGER;
   FIN INTEGER;
   CUENTA VARCHAR(32);
   CODIGO VARCHAR(32);
   PERIODO VARCHAR(2);
   INICIO DATE;
   CIERRES DATE;
   ASIENTOS CURSOR IS SELECT * FROM CONTABC1 WHERE NUMCOM = NEW.NUMCOM AND FECCOM=NEW.FECCOM;

BEGIN
IF NEW.STACOM='A' AND OLD.STACOM='D' THEN
   SELECT INTO PERIODO,
          INICIO,
          CIERRES
          PEREJE,
          FECINI,
          FECCIE
     FROM CONTABA1
     WHERE NEW.FECCOM >= FECDES AND
           NEW.FECCOM <= FECHAS;

   OPEN ASIENTOS;
   FETCH ASIENTOS INTO REGISTRO;
   IF FOUND THEN
      LOOP
         -- Actualizamos Saldos de Las Cuentas Padres
         CUENTA := REGISTRO.CODCTA;
         INI := 1;
         FIN := INSTR(CUENTA,'-',INI,1);
         WHILE FIN <> 0 LOOP
            CODIGO:=SUBSTR(CUENTA,1,(FIN-1));
            ACTUALIZA:=

ACTUALIZAR_SALDOSNEW(CODIGO,INICIO,CIERRES,PERIODO,REGISTRO.DEBCRE,REGISTRO.MONASI);
            INI := FIN+1;
            FIN := INSTR(CUENTA,'-',INI,1);
         END LOOP;
         -- Actualizamos Saldos de la Cuenta de Movimientos
         ACTUALIZA:=ACTUALIZAR_SALDOSNEW(REGISTRO.CODCTA,INICIO,CIERRES,PERIODO,REGISTRO.DEBCRE,REGISTRO.MONASI);
         FETCH ASIENTOS INTO REGISTRO;
         IF NOT FOUND THEN
            EXIT;
         END IF;
      END LOOP;
   END IF;
   CLOSE ASIENTOS;
END IF;

IF NEW.STACOM='R' AND OLD.STACOM='A' THEN
   SELECT INTO PERIODO,
          INICIO,
          CIERRES
          PEREJE,
          FECINI,
          FECCIE
     FROM CONTABA1
     WHERE NEW.FECCOM >= FECDES AND
           NEW.FECCOM <= FECHAS;

   OPEN ASIENTOS;
   FETCH ASIENTOS INTO REGISTRO;
   IF FOUND THEN
      LOOP
         -- Actualizamos Saldos de Las Cuentas Padres
         CUENTA := REGISTRO.CODCTA;
         INI := 1;
         FIN := INSTR(CUENTA,'-',INI,1);
         WHILE FIN <> 0 LOOP
            CODIGO:=SUBSTR(CUENTA,1,(FIN-1));
            ACTUALIZA:=

ACTUALIZAR_SALDOSNEW(CODIGO,INICIO,CIERRES,PERIODO,REGISTRO.DEBCRE,REGISTRO.MONASI*-1);
            INI := FIN+1;
            FIN := INSTR(CUENTA,'-',INI,1);
         END LOOP;
         -- Actualizamos Saldos de la Cuenta de Movimientos
         ACTUALIZA:=ACTUALIZAR_SALDOSNEW(REGISTRO.CODCTA,INICIO,CIERRES,PERIODO,REGISTRO.DEBCRE,REGISTRO.MONASI*-1);
         FETCH ASIENTOS INTO REGISTRO;
         IF NOT FOUND THEN
            EXIT;
         END IF;
      END LOOP;
   END IF;
   CLOSE ASIENTOS;
END IF;

RETURN NEW;
END;$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_actcom() OWNER TO postgres;

CREATE OR REPLACE FUNCTION "SIMA002".trig_anuadi()
  RETURNS "trigger" AS
$BODY$
DECLARE
   Fecha DATE;
   MontoDis NUMERIC (14,2);
   MontoAdi NUMERIC (14,2);
   MontoDim NUMERIC (14,2);
   Tipo VARCHAR(1);
   PERIODO VARCHAR(2);
   ANOCIE VARCHAR(4);
BEGIN
IF OLD.STAMOV='A' AND NEW.STAMOV='N' THEN
   SELECT INTO Fecha,
          Tipo
          FecAdi,
          AdiDis
     FROM CPAdiDis
    WHERE RefAdi = OLD.RefAdi;
   PERIODO := OBTENER_PERIODO(FECHA);
   ANOCIE := OBTENER_ANO_CIERRE();
   IF Tipo = 'A' THEN
      MontoDis := OLD.MonMov;
      MontoAdi := OLD.MonMov;
      MontoDim := 0;
   ELSE
      MontoDis := OLD.MonMov * (-1);
      MontoAdi := 0;
      MontoDim := OLD.MonMov;
   END IF;
   SELECT INTO Fecha FecHas
     FROM CPPerEje
    WHERE To_Char(FecCie,'YYYY')=AnoCie AND
          PerEje = OLD.PerPre;
   UPDATE CPAsiIni
   SET MonDis = MonDis - MontoDis,
       MonAdi = MonAdi - MontoAdi,
       MonDim = MonDim - MontoDim
   WHERE RTRIM(CodPre) = RTRIM(OLD.CodPre) AND
             ((PerPre = OLD.PERPRE AND AnoPre = TO_CHAR(FECHA,'YYYY')) OR
             (PerPre = '00' AND ANOPRE = ANOCIE));
END IF;
RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_anuadi() OWNER TO postgres;


CREATE OR REPLACE FUNCTION "SIMA002".trig_anuaju()
  RETURNS "trigger" AS
$BODY$
DECLARE
   Tipo VARCHAR(4);
   Referencia VARCHAR(8);
   Refiere VARCHAR(1);
   Fecha DATE;
   PERIODO VARCHAR(2);
   ANOCIE VARCHAR(4);
   MONTOPRE NUMERIC(14,2);
   MONTOCOM NUMERIC(14,2);
   MONTOCAU NUMERIC(14,2);
   MONTOPAG NUMERIC(14,2);
   AFECTA VARCHAR(1);
   REFERENCIAPRE VARCHAR(8);
   REFERENCIACOM VARCHAR(8);
   REFERENCIACAU VARCHAR(8);
   REFERENCIAPAG VARCHAR(8);
BEGIN
IF OLD.STAMOV='A' AND NEW.STAMOV='N' THEN
   SELECT TipAju,
          Refere,
          FECAnu
          INTO Tipo,
          Referencia,
          FECHA
     FROM CPAjuste
    WHERE RefAju = OLD.RefAju;

   SELECT Refier INTO Refiere
     FROM CPDocAju
    WHERE RTRIM(TipAju) = RTRIM(Tipo);
   --ANOCIE := OBTENER_ANO_CIERRE;
   ANOCIE := TO_CHAR(FECHA,'YYYY');

   IF Refiere = 'P' THEN
      UPDATE CPImpPrC
         SET MonAju = MonAju - OLD.MonAju
       WHERE CodPre = OLD.CodPre AND
             RefPrc = Referencia;


      PERIODO := OBTENER_PERIODO(FECHA);

      UPDATE CPAsiIni
         SET MonDis = MonDis - OLD.MonAju,
             MonPrc = MonPrc + OLD.MonAju,
             MonAju = MonAju - OLD.MonAju
       WHERE CodPre = OLD.CodPre AND
             ((PerPre = PERIODO AND AnoPre = TO_CHAR(FECHA,'yyyy')) OR
             (PerPre = '00' AND ANOPRE = ANOCIE));
   END IF;

   IF Refiere = 'C' THEN
      UPDATE CPImpCom
         SET MonAju = MonAju - OLD.MonAju
       WHERE CodPre = OLD.CodPre AND
             RefCom = Referencia AND  REFERE=OLD.REFPRC;

      SELECT TIPCOM INTO Tipo
        FROM CPCompro
       WHERE RefCom = Referencia;

      PERIODO := OBTENER_PERIODO(FECHA);

      SELECT REFPRC INTO AFECTA
        FROM CPDOCCOM
       WHERE TIPCOM = TIPO;

      IF AFECTA='N' THEN
         MONTOPRE := OLD.MONAJU;
      ELSE
         MONTOPRE := 0;
      END IF;

      UPDATE CPAsiIni
         SET MonDis = MonDis - MONTOPRE,
             MonPrc = MonPrc + MontoPre,
             MonCom = MonCom + OLD.MonAju,
             MonAju = MonAju - OLD.MonAju
       WHERE CodPre = OLD.CodPre AND
             ((PerPre = PERIODO AND AnoPre = TO_CHAR(FECHA,'yyyy')) OR
             (PerPre = '00' AND ANOPRE = ANOCIE));

      IF OLD.REFPRC<>'NULO' THEN
         UPDATE CPIMPPRC
            SET MonCOM = MonCOM + OLD.MONAJU
          WHERE REFPRC=OLD.REFPRC AND CodPre = OLD.CodPre;

      END IF;
   END IF;

   IF Refiere = 'A' THEN
      UPDATE CPImpCau
         SET MonAju = MonAju - OLD.MonAju
       WHERE CodPre = OLD.CodPre AND
             RefCau = Referencia AND REFERE=OLD.REFCOM AND REFPRC=OLD.REFPRC;

      SELECT TipCau INTO Tipo
        FROM CPCausad
       WHERE RefCau = Referencia;

      PERIODO := OBTENER_PERIODO(FECHA);

      SELECT REFIER INTO AFECTA
        FROM CPDOCCAU
       WHERE TIPCAU = TIPO;


      IF AFECTA='C' THEN
         MONTOPRE := 0;
         MONTOCOM := 0;
      END IF;

      IF AFECTA='P' THEN
         MONTOPRE := 0;
         MONTOCOM := OLD.MONAJU;
      END IF;

      IF AFECTA='N' THEN
         MONTOPRE := OLD.MONAJU;
         MONTOCOM := OLD.MONAJU;
      END IF;

      UPDATE CPAsiIni
         SET MonDis = MonDis - MONTOPRE,
             MonPrc = MonPrc + MontoPre,
             MonCom = MonCom + MontoCom,
             MonCau = MonCau + OLD.MonAju,
             MonAju = MonAju - OLD.MonAju
       WHERE CodPre = OLD.CodPre AND
             ((PerPre = PERIODO AND AnoPre = TO_CHAR(FECHA,'yyyy')) OR
             (PerPre = '00' AND ANOPRE = ANOCIE));

      IF OLD.REFPRC<>'NULO' THEN
         UPDATE CPIMPPRC
            SET MonCom = MonCom + MontoCom,
                MonCAU = MonCAU + OLD.MONAJU
          WHERE REFPRC=OLD.REFPRC AND CodPre = OLD.CodPre;
      END IF;

      IF OLD.REFCOM<>'NULO' THEN
         UPDATE CPIMPCOM
            SET MonCAU = MonCAU + OLD.MONAJU
          WHERE REFCOM=OLD.REFCOM AND REFERE=OLD.REFPRC AND CodPre = OLD.CodPre;
      END IF;

   END IF;

   IF Refiere = 'G' THEN
      UPDATE CPImpPag
         SET MonAju = MonAju - OLD.MonAju
       WHERE CodPre = OLD.CodPre AND
             RefPag = Referencia AND REFERE=OLD.REFCAU AND REFCOM=OLD.REFCOM AND

REFPRC=OLD.REFPRC;
      SELECT TipPag INTO Tipo
        FROM CPPagos
       WHERE RefPag = Referencia;

      PERIODO := OBTENER_PERIODO(FECHA);

      SELECT REFIER INTO AFECTA
        FROM CPDOCPAG
       WHERE TIPPAG = TIPO;

      IF AFECTA='A' THEN
         MONTOPRE := 0;
         MONTOCOM := 0;
         MONTOCAU := 0;
      END IF;

      IF AFECTA='C' THEN
         MONTOPRE := 0;
         MONTOCOM := 0;
         MONTOCAU := OLD.MONAJU;
      END IF;

      IF AFECTA='P' THEN
         MONTOPRE := 0;
         MONTOCOM := OLD.MONAJU;
         MONTOCAU := OLD.MONAJU;
      END IF;

      IF AFECTA='N' THEN
         MONTOPRE := OLD.MONAJU;
         MONTOCOM := OLD.MONAJU;
         MONTOCAU := OLD.MONAJU;
      END IF;

      UPDATE CPAsiIni
         SET MonDis = MonDis - MONTOPRE,
             MonPrc = MonPrc + MontoPre,
             MonCom = MonCom + MontoCom,
             MonCau = MonCau + MontoCau,
             MonPag = MonPag + OLD.MonAju,
             MonAju = MonAju - OLD.MonAju
       WHERE CodPre = OLD.CodPre AND
             ((PerPre = PERIODO AND AnoPre = TO_CHAR(FECHA,'yyyy')) OR
             (PerPre = '00' AND ANOPRE = ANOCIE));


      IF OLD.REFPRC<>'NULO' THEN
         UPDATE CPIMPPRC
            SET MonCom = MonCom + MontoCom,
                MonCau = MonCau + MontoCau,
                MonPAG = MonPAG + OLD.MONAJU
          WHERE REFPRC=OLD.REFPRC AND CodPre = OLD.CodPre;
      END IF;

      IF OLD.REFCOM<>'NULO' THEN
         UPDATE CPIMPCOM
            SET MonCau = MonCau + MontoCau,
                MonPAG = MonPAG + OLD.MONAJU
          WHERE REFCOM=OLD.REFCOM AND REFERE=OLD.REFPRC AND CodPre = OLD.CodPre;
      END IF;

      IF OLD.REFCAU<>'NULO' THEN
         UPDATE CPIMPCAU
            SET MonPAG = MonPAG + OLD.MONAJU
          WHERE REFCAU=OLD.REFCAU AND REFERE=OLD.REFCOM AND REFPRC=OLD.REFPRC AND CodPre =

OLD.CodPre;
      END IF;
   END IF;

END IF;
RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_anuaju() OWNER TO postgres;


CREATE OR REPLACE FUNCTION "SIMA002".trig_anuajuing()
  RETURNS "trigger" AS
$BODY$
DECLARE
   Tipo VARCHAR(4);
   Referencia VARCHAR(8);
   Refiere VARCHAR(1);
   Fecha DATE;
   PERIODO VARCHAR(2);
   ANOCIE VARCHAR(4);
   MONTOPRE NUMERIC(14,2);
   MONTOCOM NUMERIC(14,2);
   MONTOCAU NUMERIC(14,2);
   MONTOPAG NUMERIC(14,2);
   AFECTA VARCHAR(1);
   REFERENCIAPRE VARCHAR(8);
   REFERENCIACOM VARCHAR(8);
   REFERENCIACAU VARCHAR(8);
   REFERENCIAPAG VARCHAR(8);
BEGIN
   SELECT Refere,
          FecAju
     INTO Referencia,
          Fecha
     FROM CIAjuste
    WHERE RefAju = OLD.RefAju;

   ANOCIE := OBTENER_ANO_CIERRE();

      UPDATE CIImpIng
         SET MonAju = MonAju - OLD.MonAju
       WHERE CodPre = OLD.CodPre AND
             RefIng = Referencia;


      PERIODO := OBTENER_PERIODO(FECHA);

      UPDATE CIAsiIni
         SET MonDis = MonDis - OLD.MonAju,
             MonPrc = MonPrc + OLD.MonAju,
             MonAju = MonAju - OLD.MonAju
       WHERE CodPre = OLD.CodPre AND
             ((PerPre = PERIODO AND AnoPre = TO_CHAR(FECHA,'yyyy')) OR
             (PerPre = '00' AND ANOPRE = ANOCIE));

RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_anuajuing() OWNER TO postgres;



CREATE OR REPLACE FUNCTION "SIMA002".trig_anucau()
  RETURNS "trigger" AS
$BODY$
DECLARE
   Fecha_Causad DATE;
   Referencia_Causad VARCHAR(8);
   Tipo_Causad VARCHAR(4);
   Referencia_Precom VARCHAR(8);
   Referencia_Compro VARCHAR(8);
   Refiere_a_Precom VARCHAR(1);
   Refiere_a_Compro VARCHAR(1);
   Afecta_Precom VARCHAR(1);
   Afecta_Causad VARCHAR(1);
   Afecta_Compro VARCHAR(1);
   AFecta_Dispon VARCHAR(1);
   Monto_Precom NUMERIC(14,2);
   Monto_Compro NUMERIC(14,2);
   Monto_Causad NUMERIC(14,2);
   Monto_Dispon NUMERIC(14,2);
   PERIODO VARCHAR(2);
   ANOCIE VARCHAR(4);

BEGIN
IF OLD.STAIMP='A' AND NEW.STAIMP='N' THEN
   SELECT RefCau,
          TipCau,
          FecANU,
          RefCom
   INTO Referencia_Causad,
        Tipo_Causad,
        Fecha_Causad,
        Referencia_Compro
   FROM CPCAUSAD
   WHERE RefCau = OLD.RefCau;
   PERIODO := OBTENER_PERIODO(FECHA_CAUSAD);
   --ANOCIE := OBTENER_ANO_CIERRE;
   ANOCIE := TO_CHAR(FECHA_CAUSAD,'YYYY');
   SELECT Refier,
          AfePrC,
          AfeCom,
          AfeCau,
          AfeDis
   INTO Refiere_a_Compro,
        Afecta_Precom,
        Afecta_Compro,
        Afecta_Causad,
        Afecta_Dispon
   FROM CPDOCCAU
   WHERE RTRIM(TipCau) = RTRIM(Tipo_Causad);
   IF Afecta_Precom = 'N' THEN
      Monto_Precom := 0;
   ELSIF Afecta_Precom = 'S' THEN
      Monto_Precom := OLD.MonImp;
   ELSE
      Monto_Precom := OLD.MonImp * (-1);
   END IF;
   IF Afecta_Compro = 'N' THEN
      Monto_Compro := 0;
   ELSIF Afecta_Compro = 'S' THEN
      Monto_Compro := OLD.MonImp;
   ELSE
      Monto_Compro := OLD.MonImp * (-1);
   END IF;
   IF Afecta_Causad = 'N' THEN
      Monto_Causad := 0;
   ELSIF Afecta_Causad = 'S' THEN
      Monto_Causad := OLD.MonImp;
   ELSE
      Monto_Causad := OLD.MonImp * (-1);
   END IF;
   IF Afecta_Dispon = 'N' THEN
      Monto_Dispon := 0;
   ELSIF Afecta_Dispon = 'S' THEN
      Monto_Dispon := OLD.MonImp;
   ELSE
      Monto_Dispon := OLD.MonImp * (-1);
   END IF;
   -- Actualizamos la Disponibilidad
   UPDATE CPAsiIni
   SET MonPrC = MonPrc - Monto_Precom,
       MonCom = MonCom - Monto_Compro,
       MonCau = MonCau - Monto_Causad,
       MonDis = MonDis - Monto_Dispon
   WHERE CodPre = OLD.CodPre AND
             ((PerPre = PERIODO AND AnoPre = TO_CHAR(FECHA_CAUSAD,'yyyy')) OR
              (PerPre = '00' AND ANOPRE = ANOCIE));
   IF OLD.Refere <> 'NULO' THEN
   -- Actualizamos el Compromiso
      UPDATE CPImpCom
         SET MonCau = (MonCau - OLD.MonImp)
       WHERE RefCom = OLD.Refere AND
             Refere = OLD.RefPrc AND
             RTRIM(CodPre) = RTRIM(OLD.CodPre);
   END IF;
   IF OLD.RefPrc <> 'NULO' THEN
   -- Actualizamos el PreCompromiso
      UPDATE CPImpPrC
         SET MonCau = MonCau - OLD.MonImp,
                      MonCom=MonCom - Monto_ComPro
       WHERE RefPrc = OLD.RefPrc AND
             RTRIM(CodPre) = RTRIM(OLD.CodPre);
   END If;
END IF;
RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_anucau() OWNER TO postgres;



CREATE OR REPLACE FUNCTION "SIMA002".trig_anucau()
  RETURNS "trigger" AS
$BODY$
DECLARE
   Fecha_Causad DATE;
   Referencia_Causad VARCHAR(8);
   Tipo_Causad VARCHAR(4);
   Referencia_Precom VARCHAR(8);
   Referencia_Compro VARCHAR(8);
   Refiere_a_Precom VARCHAR(1);
   Refiere_a_Compro VARCHAR(1);
   Afecta_Precom VARCHAR(1);
   Afecta_Causad VARCHAR(1);
   Afecta_Compro VARCHAR(1);
   AFecta_Dispon VARCHAR(1);
   Monto_Precom NUMERIC(14,2);
   Monto_Compro NUMERIC(14,2);
   Monto_Causad NUMERIC(14,2);
   Monto_Dispon NUMERIC(14,2);
   PERIODO VARCHAR(2);
   ANOCIE VARCHAR(4);

BEGIN
IF OLD.STAIMP='A' AND NEW.STAIMP='N' THEN
   SELECT RefCau,
          TipCau,
          FecANU,
          RefCom
   INTO Referencia_Causad,
        Tipo_Causad,
        Fecha_Causad,
        Referencia_Compro
   FROM CPCAUSAD
   WHERE RefCau = OLD.RefCau;
   PERIODO := OBTENER_PERIODO(FECHA_CAUSAD);
   --ANOCIE := OBTENER_ANO_CIERRE;
   ANOCIE := TO_CHAR(FECHA_CAUSAD,'YYYY');
   SELECT Refier,
          AfePrC,
          AfeCom,
          AfeCau,
          AfeDis
   INTO Refiere_a_Compro,
        Afecta_Precom,
        Afecta_Compro,
        Afecta_Causad,
        Afecta_Dispon
   FROM CPDOCCAU
   WHERE RTRIM(TipCau) = RTRIM(Tipo_Causad);
   IF Afecta_Precom = 'N' THEN
      Monto_Precom := 0;
   ELSIF Afecta_Precom = 'S' THEN
      Monto_Precom := OLD.MonImp;
   ELSE
      Monto_Precom := OLD.MonImp * (-1);
   END IF;
   IF Afecta_Compro = 'N' THEN
      Monto_Compro := 0;
   ELSIF Afecta_Compro = 'S' THEN
      Monto_Compro := OLD.MonImp;
   ELSE
      Monto_Compro := OLD.MonImp * (-1);
   END IF;
   IF Afecta_Causad = 'N' THEN
      Monto_Causad := 0;
   ELSIF Afecta_Causad = 'S' THEN
      Monto_Causad := OLD.MonImp;
   ELSE
      Monto_Causad := OLD.MonImp * (-1);
   END IF;
   IF Afecta_Dispon = 'N' THEN
      Monto_Dispon := 0;
   ELSIF Afecta_Dispon = 'S' THEN
      Monto_Dispon := OLD.MonImp;
   ELSE
      Monto_Dispon := OLD.MonImp * (-1);
   END IF;
   -- Actualizamos la Disponibilidad
   UPDATE CPAsiIni
   SET MonPrC = MonPrc - Monto_Precom,
       MonCom = MonCom - Monto_Compro,
       MonCau = MonCau - Monto_Causad,
       MonDis = MonDis - Monto_Dispon
   WHERE CodPre = OLD.CodPre AND
             ((PerPre = PERIODO AND AnoPre = TO_CHAR(FECHA_CAUSAD,'yyyy')) OR
              (PerPre = '00' AND ANOPRE = ANOCIE));
   IF OLD.Refere <> 'NULO' THEN
   -- Actualizamos el Compromiso
      UPDATE CPImpCom
         SET MonCau = (MonCau - OLD.MonImp)
       WHERE RefCom = OLD.Refere AND
             Refere = OLD.RefPrc AND
             RTRIM(CodPre) = RTRIM(OLD.CodPre);
   END IF;
   IF OLD.RefPrc <> 'NULO' THEN
   -- Actualizamos el PreCompromiso
      UPDATE CPImpPrC
         SET MonCau = MonCau - OLD.MonImp,
                      MonCom=MonCom - Monto_ComPro
       WHERE RefPrc = OLD.RefPrc AND
             RTRIM(CodPre) = RTRIM(OLD.CodPre);
   END If;
END IF;
RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_anucau() OWNER TO postgres;



CREATE OR REPLACE FUNCTION "SIMA002".trig_anucop()
  RETURNS "trigger" AS
$BODY$
DECLARE
   Fecha_Compro DATE;
   Referencia_Compro VARCHAR(8);
   Tipo_Compro VARCHAR(4);
   Referencia_Precom VARCHAR(8);
   Refiere_a_Precom VARCHAR(1);
   Afecta_Precom VARCHAR(1);
   Afecta_Compro VARCHAR(1);
   AFecta_Dispon VARCHAR(1);
   Monto_Precom NUMERIC(14,2);
   Monto_Compro NUMERIC(14,2);
   Monto_Dispon NUMERIC(14,2);
   PERIODO VARCHAR(2);
   ANOCIE VARCHAR(4);

BEGIN
IF OLD.STAIMP='A' AND NEW.STAIMP='N' THEN
   SELECT RefCom,
          TipCom,
          FecANU,
          RefPrc
   INTO Referencia_Compro,
        Tipo_Compro,
        Fecha_Compro,
        Referencia_Precom
   FROM CPCOMPRO
   WHERE RefCom = OLD.RefCom;

   PERIODO := OBTENER_PERIODO(FECHA_COMPRO);
   --ANOCIE := OBTENER_ANO_CIERRE;
   ANOCIE := TO_CHAR(FECHA_COMPRO,'YYYY');
   SELECT RefPrC,
          AfePrC,
          AfeCom,
          AfeDis
   INTO Refiere_a_Precom,
        Afecta_Precom,
        Afecta_Compro,
        Afecta_Dispon
   FROM CPDOCCOM
   WHERE RTRIM(TipCom) = RTRIM(Tipo_Compro);
   IF Afecta_Precom = 'N' THEN
      Monto_Precom := 0.00;
   ELSIF Afecta_Precom = 'S' THEN
      Monto_Precom := OLD.MonImp;
   ELSE
      Monto_Precom := OLD.MonImp * (-1);
   END IF;
   IF Afecta_Compro = 'N' THEN
      Monto_Compro := 0.00;
   ELSIF Afecta_Compro = 'S' THEN
      Monto_Compro := OLD.MonImp;
   ELSE
      Monto_Compro := OLD.MonImp * (-1);
   END IF;
   IF Afecta_Dispon = 'N' THEN
      Monto_Dispon := 0.00;
   ELSIF Afecta_Dispon = 'S' THEN
      Monto_Dispon := OLD.MonImp;
   ELSE
      Monto_Dispon := OLD.MonImp * (-1);
   END IF;
   UPDATE CPAsiIni
   SET MonPrC = MonPrc - Monto_Precom,
       MonCom = MonCom - Monto_Compro,
       MonDis = MonDis - Monto_Dispon
   WHERE CodPre = OLD.CodPre AND
             ((PerPre = PERIODO AND AnoPre = TO_CHAR(FECHA_COMPRO,'yyyy')) OR
              (PerPre = '00' AND ANOPRE = ANOCIE));
   IF Refiere_a_Precom = 'S' THEN
      UPDATE CPImpPrc
      SET MonCom = MonCom - OLD.MonImp
      WHERE RefPrc = OLD.Refere AND
            RTRIM(CodPre) = RTRIM(OLD.CodPre);
   END IF;
END IF;
RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_anucop() OWNER TO postgres;



CREATE OR REPLACE FUNCTION "SIMA002".trig_anuing()
  RETURNS "trigger" AS
$BODY$
DECLARE
   FECHA DATE;
   ANOCIE VARCHAR(4);
   PERIODO VARCHAR(2);
BEGIN
   FECHA:=OLD.FecIng;
   PERIODO := OBTENER_PERIODO(FECHA);
   ANOCIE := OBTENER_ANO_CIERRE();
   UPDATE CIASIINI
   SET MonPrC = MonPrc - OLD.MonIng,
       MonDis = MonDis + OLD.MonIng
   WHERE CodPre = OLD.CodPre AND
              ((PerPre = PERIODO AND AnoPre = TO_CHAR(FECHA,'yyyy')) OR
              (PerPre = '00' AND ANOPRE = ANOCIE));
RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_anuing() OWNER TO postgres;




CREATE OR REPLACE FUNCTION "SIMA002".trig_anupag()
  RETURNS "trigger" AS
$BODY$
DECLARE
   Fecha_Pago DATE;
   Referencia_Pago VARCHAR(8);
   Tipo_Pago VARCHAR(4);
   Tipo_Causad VARCHAR(4);
   Tipo_Compro VARCHAR(4);
   Referencia_Precom VARCHAR(8);
   Referencia_Compro VARCHAR(8);
   Referencia_Causad VARCHAR(8);
   Refiere_a_Precom VARCHAR(1);
   Refiere_a_Compro VARCHAR(1);
   Refiere_a_Causad VARCHAR(1);
   Afecta_Precom VARCHAR(1);
   Afecta_Causad VARCHAR(1);
   Afecta_Compro VARCHAR(1);
   Afecta_Pagado VARCHAR(1);
   AFecta_Dispon VARCHAR(1);
   Monto_Precom NUMERIC(14,2);
   Monto_Compro NUMERIC(14,2);
   Monto_Causad NUMERIC(14,2);
   Monto_Pagado NUMERIC(14,2);
   Monto_Dispon NUMERIC(14,2);
   PERIODO VARCHAR(2);
   ANOCIE VARCHAR(4);
BEGIN
IF OLD.STAIMP='A' AND NEW.STAIMP='N' THEN
   SELECT RefPag,
          TipPag,
          FecANU,
          RefCau,
          TipCau
   INTO Referencia_Pago,
        Tipo_Pago,
        Fecha_Pago,
        Referencia_Causad,
        Tipo_Causad
   FROM CPPAGOS
   WHERE RefPag = OLD.RefPag;
   PERIODO := OBTENER_PERIODO(FECHA_PAGO);
   --ANOCIE := OBTENER_ANO_CIERRE;
   ANOCIE := TO_CHAR(FECHA_PAGO,'YYYY');
   SELECT Refier,
          AfePrC,
          AfeCom,
          AfeCau,
          AfePag,
          AfeDis
   INTO Refiere_a_Causad,
        Afecta_Precom,
        Afecta_Compro,
        Afecta_Causad,
        Afecta_Pagado,
        Afecta_Dispon
   FROM CPDOCPAG
   WHERE RTRIM(TipPag) = RTRIM(Tipo_Pago);
   IF Afecta_Precom = 'N' THEN
      Monto_Precom := 0.00;
   ELSIF Afecta_Precom = 'S' THEN
      Monto_Precom := OLD.MonImp;
   ELSE
      Monto_Precom := OLD.MonImp * (-1);
   END IF;
   IF Afecta_Compro = 'N' THEN
      Monto_Compro := 0.00;
   ELSIF Afecta_Compro = 'S' THEN
      Monto_Compro := OLD.MonImp;
   ELSE
      Monto_Compro := OLD.MonImp * (-1);
   END IF;
   IF Afecta_Causad = 'N' THEN
      Monto_Causad := 0.00;
   ELSIF Afecta_Causad = 'S' THEN
      Monto_Causad := OLD.MonImp;
   ELSE
      Monto_Causad := OLD.MonImp * (-1);
   END IF;
   IF Afecta_Pagado = 'N' THEN
      Monto_Pagado := 0.00;
   ELSIF Afecta_Pagado = 'S' THEN
      Monto_Pagado := OLD.MonImp;
   ELSE
      Monto_Pagado := OLD.MonImp * (-1);
   END IF;
   IF Afecta_Dispon = 'N' THEN
      Monto_Dispon := 0.00;
   ELSIF Afecta_Dispon = 'S' THEN
      Monto_Dispon := OLD.MonImp;
   ELSE
      Monto_Dispon := OLD.MonImp * (-1);
   END IF;
   -- Actualizamos la Disponibilidad
   UPDATE CPAsiIni
   SET MonPrC = MonPrc - Monto_Precom,
       MonCom = MonCom - Monto_Compro,
       MonCau = MonCau - Monto_Causad,
       MonPag = MonPag - Monto_Pagado,
       MonDis = MonDis - Monto_Dispon
   WHERE CodPre = OLD.CodPre AND
             ((PerPre = PERIODO AND AnoPre = TO_CHAR(FECHA_PAGO,'yyyy')) OR
              (PerPre = '00' AND ANOPRE = ANOCIE));
   IF OLD.Refere <> 'NULO' THEN
      -- Actualizamos el Causado
      UPDATE CPImpCau
         SET MonPag = (MonPag - OLD.MonImp)
       WHERE RefCau = OLD.Refere AND
             Refere = OLD.RefCom AND
             RefPrC = OLD.RefPrC AND
             RTRIM(CodPre) = RTRIM(OLD.CodPre);
   END IF;
   IF OLD.RefCom <> 'NULO' THEN
      -- Actualizamos el Compromiso
      UPDATE CPImpCom
         SET MonPag = MonPag - OLD.MonImp,
                      MonCau= MonCau - Monto_Causad
       WHERE RefCom = OLD.RefCom AND
             Refere = OLD.RefPrC AND
             RTRIM(CodPre) = RTRIM(OLD.CodPre);
   END If;
   IF OLD.RefPrc <> 'NULO' THEN
      -- Actualizamos el PreCompromiso
      UPDATE CPImpPrc
         SET MonPag = MonPag - OLD.MonImp,
             MonCau = MonCau - Monto_Causad,
             MonCom = MonCom - Monto_Compro
       WHERE RefPrC = OLD.RefPrC AND
             RTRIM(CodPre) = RTRIM(OLD.CodPre);
   END IF;
END IF;
RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_anupag() OWNER TO postgres;



CREATE OR REPLACE FUNCTION "SIMA002".trig_anuprc()
  RETURNS "trigger" AS
$BODY$
DECLARE
   FECHA DATE;
   ANOCIE VARCHAR(4);
   PERIODO VARCHAR(2);
BEGIN
IF OLD.STAIMP='A' AND NEW.STAIMP='N' THEN
   SELECT FecANU
   INTO FECHA
   FROM CPPRECOM
   WHERE RefPrC = OLD.RefPrc;
   PERIODO := OBTENER_PERIODO(FECHA);
   --ANOCIE := OBTENER_ANO_CIERRE;
   ANOCIE := TO_CHAR(FECHA,'YYYY');
   UPDATE CPAsiIni
   SET MonPrC = MonPrc - OLD.MonImp,
       MonDis = MonDis + OLD.MonImp
   WHERE CodPre = OLD.CodPre AND
             ((PerPre = PERIODO AND AnoPre = TO_CHAR(FECHA,'yyyy')) OR
              (PerPre = '00' AND ANOPRE = ANOCIE));
END IF;
RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_anuprc() OWNER TO postgres;



CREATE OR REPLACE FUNCTION "SIMA002".TRIG_ANUTRA()
  RETURNS "trigger" AS
$BODY$
DECLARE
   Periodo VARCHAR(2);
   Ano     VARCHAR(4);
   ANOCIE VARCHAR(4);
BEGIN
IF OLD.STAMOV='A'  AND NEW.STAMOV='N' THEN

   SELECT AnoTra,
          PerTra
     INTO Ano,
          Periodo
     FROM CPTrasla
    WHERE RefTra = OLD.RefTra;
   --ANOCIE := OBTENER_ANO_CIERRE;
   ANOCIE := ANO;
   UPDATE CPAsiIni
      SET MonDis = MonDis - OLD.MonMov,
          MonTra = MonTra - OLD.MonMov
    WHERE CodPre = OLD.CodDes AND

             ((PerPre = PERIODO AND AnoPre = ANO) OR
              (PerPre = '00' AND ANOPRE = ANOCIE));
   UPDATE CPAsiIni
      SET MonDis = MonDis + OLD.MonMov,
          MonTrN = MonTrN - OLD.MonMov
    WHERE CodPre = OLD.CodOri AND

             ((PerPre = PERIODO AND AnoPre = ANO) OR
              (PerPre = '00' AND ANOPRE = ANOCIE));
   UPDATE CPAsiIni
      SET MonPrC = MonPrc + OLD.MonMov,
          MonDis = MonDis - OLD.MonMov
     WHERE CodPre = OLD.Codori AND
             ((PerPre = PERIODO AND AnoPre = ANO) OR
              (PerPre = '00' AND ANOPRE = ANOCIE));
END IF;

RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".TRIG_ANUTRA() OWNER TO postgres;


CREATE OR REPLACE FUNCTION "SIMA002".trig_eliadi()
  RETURNS "trigger" AS
$BODY$
DECLARE
   Fecha DATE;
   MontoDis NUMERIC (14,2);
   MontoAdi NUMERIC (14,2);
   MontoDim NUMERIC (14,2);
   Tipo VARCHAR(1);
   PERIODO VARCHAR(2);
   ANOCIE VARCHAR(4);
BEGIN
   SELECT FecAdi,
          AdiDis
     INTO Fecha,
          Tipo
     FROM CPAdiDis
    WHERE RefAdi = OLD.RefAdi;

   --ANOCIE := OBTENER_ANO_CIERRE;
   ANOCIE := TO_CHAR(FECHA,'YYYY');
   IF Tipo = 'A' THEN
      MontoDis := OLD.MonMov;
      MontoAdi := OLD.MonMov;
      MontoDim := 0;
   ELSE
      MontoDis := OLD.MonMov * (-1);
      MontoAdi := 0;
      MontoDim := OLD.MonMov;
   END IF;
--   SELECT FecHas
--     INTO Fecha
--     FROM CPPerEje
--    WHERE To_Char(FecCie,'YYYY')=AnoCie AND
--          PerEje = OLD.PerPre;

   UPDATE CPAsiIni
   SET MonDis = MonDis - MontoDis,
       MonAdi = MonAdi - MontoAdi,
       MonDim = MonDim - MontoDim
   WHERE CodPre = OLD.CodPre AND
             ((PerPre = OLD.PERPRE AND AnoPre = TO_CHAR(FECHA,'yyyy')) OR
              (PerPre = '00' AND ANOPRE = ANOCIE));
RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_eliadi() OWNER TO postgres;



CREATE OR REPLACE FUNCTION "SIMA002".trig_eliaju()
  RETURNS "trigger" AS
$BODY$
DECLARE
   Tipo VARCHAR(4);
   Referencia VARCHAR(8);
   Refiere VARCHAR(1);
   Fecha DATE;
   PERIODO VARCHAR(2);
   ANOCIE VARCHAR(4);
   MONTOPRE NUMERIC(14,2);
   MONTOCOM NUMERIC(14,2);
   MONTOCAU NUMERIC(14,2);
   MONTOPAG NUMERIC(14,2);
   AFECTA VARCHAR(1);
   REFERENCIAPRE VARCHAR(8);
   REFERENCIACOM VARCHAR(8);
   REFERENCIACAU VARCHAR(8);
   REFERENCIAPAG VARCHAR(8);
BEGIN
   SELECT TipAju,
          Refere,
          FECAJU
     INTO Tipo,
          Referencia,
          FECHA
     FROM CPAjuste
    WHERE RefAju = OLD.RefAju;

   SELECT Refier
     INTO Refiere
     FROM CPDocAju
    WHERE RTRIM(TipAju) = RTRIM(Tipo);

   --ANOCIE := OBTENER_ANO_CIERRE;
   ANOCIE := TO_CHAR(FECHA,'YYYY');

   IF Refiere = 'P' THEN
      UPDATE CPImpPrC
         SET MonAju = MonAju - OLD.MonAju
       WHERE CodPre = OLD.CodPre AND
             RefPrc = Referencia;


      PERIODO := OBTENER_PERIODO(FECHA);

      UPDATE CPAsiIni
         SET MonDis = MonDis - OLD.MonAju,
             MonPrc = MonPrc + OLD.MonAju,
             MonAju = MonAju - OLD.MonAju
       WHERE CodPre = OLD.CodPre AND
             ((PerPre = PERIODO AND AnoPre = TO_CHAR(FECHA,'yyyy')) OR
             (PerPre = '00' AND ANOPRE = ANOCIE));
   END IF;

   IF Refiere = 'C' THEN
      UPDATE CPImpCom
         SET MonAju = MonAju - OLD.MonAju
       WHERE CodPre = OLD.CodPre AND
             RefCom = Referencia AND  REFERE=OLD.REFPRC;

      SELECT TIPCOM
        INTO Tipo
        FROM CPCompro
       WHERE RefCom = Referencia;

      PERIODO := OBTENER_PERIODO(FECHA);

      SELECT REFPRC
        INTO AFECTA
        FROM CPDOCCOM
       WHERE TIPCOM = TIPO;

      IF AFECTA='N' THEN
         MONTOPRE := OLD.MONAJU;
      ELSE
         MONTOPRE := 0;
      END IF;

      UPDATE CPAsiIni
         SET MonDis = MonDis - MONTOPRE,
             MonPrc = MonPrc + MontoPre,
             MonCom = MonCom + OLD.MonAju,
             MonAju = MonAju - OLD.MonAju
       WHERE CodPre = OLD.CodPre AND
             ((PerPre = PERIODO AND AnoPre = TO_CHAR(FECHA,'yyyy')) OR
             (PerPre = '00' AND ANOPRE = ANOCIE));

      IF OLD.REFPRC<>'NULO' THEN
         UPDATE CPIMPPRC
            SET MonCOM = MonCOM + OLD.MONAJU
          WHERE REFPRC=OLD.REFPRC AND CodPre = OLD.CodPre;

      END IF;
   END IF;

   IF Refiere = 'A' THEN
      UPDATE CPImpCau
         SET MonAju = MonAju - OLD.MonAju
       WHERE CodPre = OLD.CodPre AND
             RefCau = Referencia AND REFERE=OLD.REFCOM AND REFPRC=OLD.REFPRC;

      SELECT TipCau
        INTO Tipo
        FROM CPCausad
       WHERE RefCau = Referencia;

      PERIODO := OBTENER_PERIODO(FECHA);

      SELECT REFIER
        INTO AFECTA
        FROM CPDOCCAU
       WHERE TIPCAU = TIPO;


      IF AFECTA='C' THEN
         MONTOPRE := 0;
         MONTOCOM := 0;
      END IF;

      IF AFECTA='P' THEN
         MONTOPRE := 0;
         MONTOCOM := OLD.MONAJU;
      END IF;

      IF AFECTA='N' THEN
         MONTOPRE := OLD.MONAJU;
         MONTOCOM := OLD.MONAJU;
      END IF;

      UPDATE CPAsiIni
         SET MonDis = MonDis - MONTOPRE,
             MonPrc = MonPrc + MontoPre,
             MonCom = MonCom + MontoCom,
             MonCau = MonCau + OLD.MonAju,
             MonAju = MonAju - OLD.MonAju
       WHERE CodPre = OLD.CodPre AND
             ((PerPre = PERIODO AND AnoPre = TO_CHAR(FECHA,'yyyy')) OR
             (PerPre = '00' AND ANOPRE = ANOCIE));

      IF OLD.REFPRC<>'NULO' THEN
         UPDATE CPIMPPRC
            SET MonCom = MonCom + MontoCom,
                MonCAU = MonCAU + OLD.MONAJU
          WHERE REFPRC=OLD.REFPRC AND CodPre = OLD.CodPre;
      END IF;

      IF OLD.REFCOM<>'NULO' THEN
         UPDATE CPIMPCOM
            SET MonCAU = MonCAU + OLD.MONAJU
          WHERE REFCOM=OLD.REFCOM AND REFERE=OLD.REFPRC AND CodPre = OLD.CodPre;
      END IF;

   END IF;

   IF Refiere = 'G' THEN
      UPDATE CPImpPag
         SET MonAju = MonAju - OLD.MonAju
       WHERE CodPre = OLD.CodPre AND
             RefPag = Referencia AND REFERE=OLD.REFCAU AND REFCOM=OLD.REFCOM AND

REFPRC=OLD.REFPRC;
      SELECT TipPag
        INTO Tipo
        FROM CPPagos
       WHERE RefPag = Referencia;

      PERIODO := OBTENER_PERIODO(FECHA);

      SELECT REFIER
        INTO AFECTA
        FROM CPDOCPAG
       WHERE TIPPAG = TIPO;

      IF AFECTA='A' THEN
         MONTOPRE := 0;
         MONTOCOM := 0;
         MONTOCAU := 0;
      END IF;

      IF AFECTA='C' THEN
         MONTOPRE := 0;
         MONTOCOM := 0;
         MONTOCAU := OLD.MONAJU;
      END IF;

      IF AFECTA='P' THEN
         MONTOPRE := 0;
         MONTOCOM := OLD.MONAJU;
         MONTOCAU := OLD.MONAJU;
      END IF;

      IF AFECTA='N' THEN
         MONTOPRE := OLD.MONAJU;
         MONTOCOM := OLD.MONAJU;
         MONTOCAU := OLD.MONAJU;
      END IF;

      UPDATE CPAsiIni
         SET MonDis = MonDis - MONTOPRE,
             MonPrc = MonPrc + MontoPre,
             MonCom = MonCom + MontoCom,
             MonCau = MonCau + MontoCau,
             MonPag = MonPag + OLD.MonAju,
             MonAju = MonAju - OLD.MonAju
       WHERE CodPre = OLD.CodPre AND
             ((PerPre = PERIODO AND AnoPre = TO_CHAR(FECHA,'yyyy')) OR
             (PerPre = '00' AND ANOPRE = ANOCIE));


      IF OLD.REFPRC<>'NULO' THEN
         UPDATE CPIMPPRC
            SET MonCom = MonCom + MontoCom,
                MonCau = MonCau + MontoCau,
                MonPAG = MonPAG + OLD.MONAJU
          WHERE REFPRC=OLD.REFPRC AND CodPre = OLD.CodPre;
      END IF;

      IF OLD.REFCOM<>'NULO' THEN
         UPDATE CPIMPCOM
            SET MonCau = MonCau + MontoCau,
                MonPAG = MonPAG + OLD.MONAJU
          WHERE REFCOM=OLD.REFCOM AND REFERE=OLD.REFPRC AND CodPre = OLD.CodPre;
      END IF;

      IF OLD.REFCAU<>'NULO' THEN
         UPDATE CPIMPCAU
            SET MonPAG = MonPAG + OLD.MONAJU
          WHERE REFCAU=OLD.REFCAU AND REFERE=OLD.REFCOM AND REFPRC=OLD.REFPRC AND CodPre =

OLD.CodPre;
      END IF;
   END IF;
RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_eliaju() OWNER TO postgres;



CREATE OR REPLACE FUNCTION "SIMA002".trig_eliajuing()
  RETURNS "trigger" AS
$BODY$
DECLARE
   Tipo VARCHAR(4);
   Referencia VARCHAR(8);
   Refiere VARCHAR(1);
   Fecha DATE;
   PERIODO VARCHAR(2);
   ANOCIE VARCHAR(4);
   MONTOPRE NUMERIC(14,2);
   MONTOCOM NUMERIC(14,2);
   MONTOCAU NUMERIC(14,2);
   MONTOPAG NUMERIC(14,2);
   AFECTA VARCHAR(1);
   REFERENCIAPRE VARCHAR(8);
   REFERENCIACOM VARCHAR(8);
   REFERENCIACAU VARCHAR(8);
   REFERENCIAPAG VARCHAR(8);
BEGIN
   SELECT Refere,
          FecAju
     INTO Referencia,
          Fecha
     FROM CIAjuste
    WHERE RefAju = OLD.RefAju;


   ANOCIE := OBTENER_ANO_CIERRE();


      UPDATE CIImpIng
         SET MonAju = MonAju - OLD.MonAju
       WHERE CodPre = OLD.CodPre AND
             RefIng = Referencia;


      PERIODO := OBTENER_PERIODO(FECHA);

      UPDATE CIAsiIni
         SET MonDis = MonDis - OLD.MonAju,
             MonPrc = MonPrc + OLD.MonAju,
             MonAju = MonAju - OLD.MonAju
       WHERE CodPre = OLD.CodPre AND
             ((PerPre = PERIODO AND AnoPre = TO_CHAR(FECHA,'yyyy')) OR
             (PerPre = '00' AND ANOPRE = ANOCIE));

RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_eliajuing() OWNER TO postgres;



CREATE OR REPLACE FUNCTION "SIMA002".trig_elianuprc()
  RETURNS "trigger" AS
$BODY$
DECLARE
   FECHA DATE;
   ANOCIE VARCHAR(4);
   PERIODO VARCHAR(2);
BEGIN
   SELECT FecPrC
   INTO FECHA
   FROM CPPRECOM
   WHERE RefPrC = OLD.RefPrc;
   PERIODO := OBTENER_PERIODO(FECHA);
   ANOCIE := OBTENER_ANO_CIERRE();
   UPDATE CPAsiIni
   SET MonPrC = MonPrc + (OLD.MonImp - OLD.MonAju),
       MonDis = MonDis - (OLD.MonImp - OLD.MonAju)
   WHERE CodPre = OLD.CodPre AND
             ((PerPre = PERIODO AND AnoPre = TO_CHAR(FECHA,'yyyy')) OR
              (PerPre = '00' AND ANOPRE = ANOCIE));
RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_elianuprc() OWNER TO postgres;


CREATE OR REPLACE FUNCTION "SIMA002".trig_elicau()
  RETURNS "trigger" AS
$BODY$
DECLARE
   Fecha_Causad DATE;
   Referencia_Causad VARCHAR (8);
   Tipo_Causad VARCHAR(4);
   Referencia_Precom VARCHAR(8);
   Referencia_Compro VARCHAR(8);
   Refiere_a_Precom VARCHAR (1);
   Refiere_a_Compro VARCHAR (1);
   Afecta_Precom VARCHAR (1);
   Afecta_Causad VARCHAR (1);
   Afecta_Compro VARCHAR (1);
   AFecta_Dispon VARCHAR (1);
   Monto_Precom NUMERIC (14,2);
   Monto_Compro NUMERIC (14,2);
   Monto_Causad NUMERIC (14,2);
   Monto_Dispon NUMERIC (14,2);
   PERIODO VARCHAR(2);
   ANOCIE VARCHAR(4);

BEGIN
   SELECT RefCau,
          TipCau,
          FecCau,
          RefCom
   INTO Referencia_Causad,
        Tipo_Causad,
        Fecha_Causad,
        Referencia_Compro
   FROM CPCAUSAD
   WHERE RefCau = OLD.RefCau;
   PERIODO := OBTENER_PERIODO(FECHA_CAUSAD);
   --ANOCIE := OBTENER_ANO_CIERRE;
   ANOCIE := TO_CHAR(FECHA_CAUSAD,'YYYY');
   SELECT Refier,
          AfePrC,
          AfeCom,
          AfeCau,
          AfeDis
   INTO Refiere_a_Compro,
        Afecta_Precom,
        Afecta_Compro,
        Afecta_Causad,
        Afecta_Dispon
   FROM CPDOCCAU
   WHERE RTRIM(TipCau) = RTRIM(Tipo_Causad);
   IF Afecta_Precom = 'N' THEN
      Monto_Precom := 0.00;
   ELSIF Afecta_Precom = 'S' THEN
      Monto_Precom := OLD.MonImp;
   ELSE
      Monto_Precom := OLD.MonImp * (-1);
   END IF;
   IF Afecta_Compro = 'N' THEN
      Monto_Compro := 0.00;
   ELSIF Afecta_Compro = 'S' THEN
      Monto_Compro := OLD.MonImp;
   ELSE
      Monto_Compro := OLD.MonImp * (-1);
   END IF;
   IF Afecta_Causad = 'N' THEN
      Monto_Causad := 0.00;
   ELSIF Afecta_Causad = 'S' THEN
      Monto_Causad := OLD.MonImp;
   ELSE
      Monto_Causad := OLD.MonImp * (-1);
   END IF;
   IF Afecta_Dispon = 'N' THEN
      Monto_Dispon := 0.00;
   ELSIF Afecta_Dispon = 'S' THEN
      Monto_Dispon := OLD.MonImp;
   ELSE
      Monto_Dispon := OLD.MonImp * (-1);
   END IF;
   -- Actualizamos la Disponibilidad
   UPDATE CPAsiIni
   SET MonPrC = MonPrc - Monto_Precom,
       MonCom = MonCom - Monto_Compro,
       MonCau = MonCau - Monto_Causad,
       MonDis = MonDis - Monto_Dispon
   WHERE CodPre = OLD.CodPre AND
             ((PerPre = PERIODO AND AnoPre = TO_CHAR(FECHA_CAUSAD,'yyyy')) OR
              (PerPre = '00' AND ANOPRE = ANOCIE));
   IF OLD.Refere <> 'NULO' THEN
   -- Actualizamos el Compromiso
      UPDATE CPImpCom
         SET MonCau = (MonCau - OLD.MonImp)
       WHERE RefCom = OLD.Refere AND
             Refere = OLD.RefPrc AND
             CodPre = OLD.CodPre;
   END IF;
   IF OLD.RefPrc <> 'NULO' THEN
   -- Actualizamos el PreCompromiso
      UPDATE CPImpPrC
         SET MonCau = MonCau - OLD.MonImp,
             MonCom = MonCom - Monto_Compro
       WHERE RefPrc = OLD.RefPrc AND
             CodPre = OLD.CodPre;
   END If;
RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_elicau() OWNER TO postgres;



CREATE OR REPLACE FUNCTION "SIMA002".trig_elicom()
  RETURNS "trigger" AS
$BODY$
DECLARE
   Fecha_Compro DATE;
   Referencia_Compro VARCHAR (8);
   Tipo_Compro VARCHAR(4);
   Referencia_Precom VARCHAR(8);
   Refiere_a_Precom VARCHAR (1);
   Afecta_Precom VARCHAR (1);
   Afecta_Compro VARCHAR (1);
   AFecta_Dispon VARCHAR (1);
   Monto_Precom NUMERIC (14,2);
   Monto_Compro NUMERIC (14,2);
   Monto_Dispon NUMERIC (14,2);
   PERIODO VARCHAR(2);
   ANOCIE VARCHAR(4);

BEGIN
   SELECT RefCom,
          TipCom,
          FecCom,
          RefPrc
   INTO Referencia_Compro,
        Tipo_Compro,
        Fecha_Compro,
        Referencia_Precom
   FROM CPCOMPRO
   WHERE RefCom = OLD.RefCom;

   PERIODO := OBTENER_PERIODO(FECHA_COMPRO);
   --ANOCIE := OBTENER_ANO_CIERRE;
   ANOCIE := TO_CHAR(FECHA_COMPRO,'YYYY');
   SELECT RefPrC,
          AfePrC,
          AfeCom,
          AfeDis
   INTO Refiere_a_Precom,
        Afecta_Precom,
        Afecta_Compro,
        Afecta_Dispon
   FROM CPDOCCOM
   WHERE RTRIM(TipCom) = RTRIM(Tipo_Compro);
   IF Afecta_Precom = 'N' THEN
      Monto_Precom := 0.00;
   ELSIF Afecta_Precom = 'S' THEN
      Monto_Precom := OLD.MonImp;
   ELSE
      Monto_Precom := OLD.MonImp * (-1);
   END IF;
   IF Afecta_Compro = 'N' THEN
      Monto_Compro := 0.00;
   ELSIF Afecta_Compro = 'S' THEN
      Monto_Compro := OLD.MonImp;
   ELSE
      Monto_Compro := OLD.MonImp * (-1);
   END IF;
   IF Afecta_Dispon = 'N' THEN
      Monto_Dispon := 0.00;
   ELSIF Afecta_Dispon = 'S' THEN
      Monto_Dispon := OLD.MonImp;
   ELSE
      Monto_Dispon := OLD.MonImp * (-1);
   END IF;
   UPDATE CPAsiIni
   SET MonPrC = MonPrc - Monto_Precom,
       MonCom = MonCom - Monto_Compro,
       MonDis = MonDis - Monto_Dispon
   WHERE CodPre = OLD.CodPre AND
             ((PerPre = PERIODO AND AnoPre = TO_CHAR(FECHA_COMPRO,'yyyy')) OR
              (PerPre = '00' AND ANOPRE = ANOCIE));
   IF Refiere_a_Precom = 'S' THEN
      UPDATE CPImpPrc
      SET MonCom = MonCom - OLD.MonImp
      WHERE RefPrc = OLD.Refere AND
            CodPre = OLD.CodPre;
   END IF;

   -- AGREGADO PARA LO DE LAS FUENTES DE FINANCIAMIENTO --
   IF  Afecta_Dispon<> 'N' THEN
      DELETE FROM CPMOVFUEFIN WHERE REFMOV=OLD.REFCOM AND TIPMOV='COMPROMISO';
   END IF;

RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_elicom() OWNER TO postgres;



CREATE OR REPLACE FUNCTION "SIMA002".trig_eliing()
  RETURNS "trigger" AS
$BODY$
DECLARE
   FECHA DATE;
   ANOCIE VARCHAR(4);
   PERIODO VARCHAR(2);
BEGIN
   FECHA:=OLD.FecIng;
   PERIODO := OBTENER_PERIODO(FECHA);
   ANOCIE := OBTENER_ANO_CIERRE();
   UPDATE CIASIINI
   SET MonPrC = MonPrc - OLD.Moning,
       MonDis = MonDis + OLD.Moning
   WHERE CodPre = OLD.CodPre AND
              ((PerPre = PERIODO AND AnoPre = TO_CHAR(FECHA,'yyyy')) OR
              (PerPre = '00' AND ANOPRE = ANOCIE));
RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_eliing() OWNER TO postgres;



CREATE OR REPLACE FUNCTION "SIMA002".trig_elipag()
  RETURNS "trigger" AS
$BODY$
DECLARE
   Fecha_Pago DATE;
   Referencia_Pago VARCHAR(8);
   Tipo_Pago VARCHAR(4);
   Tipo_Causad VARCHAR(4);
   Tipo_Compro VARCHAR(4);
   Referencia_Precom VARCHAR(8);
   Referencia_Compro VARCHAR(8);
   Referencia_Causad VARCHAR(8);
   Refiere_a_Precom VARCHAR(1);
   Refiere_a_Compro VARCHAR(1);
   Refiere_a_Causad VARCHAR(1);
   Afecta_Precom VARCHAR(1);
   Afecta_Causad VARCHAR(1);
   Afecta_Compro VARCHAR(1);
   Afecta_Pagado VARCHAR(1);
   AFecta_Dispon VARCHAR(1);
   Monto_Precom NUMERIC (14,2);
   Monto_Compro NUMERIC (14,2);
   Monto_Causad NUMERIC (14,2);
   Monto_Pagado NUMERIC (14,2);
   Monto_Dispon NUMERIC (14,2);
   PERIODO VARCHAR(2);
   ANOCIE VARCHAR(4);
BEGIN
   SELECT RefPag,
          TipPag,
          FecPag,
          RefCau,
          TipCau
   INTO Referencia_Pago,
        Tipo_Pago,
        Fecha_Pago,
        Referencia_Causad,
        Tipo_Causad
   FROM CPPAGOS
   WHERE RefPag = OLD.RefPag;
   PERIODO := OBTENER_PERIODO(FECHA_PAGO);
   --ANOCIE := OBTENER_ANO_CIERRE;
   ANOCIE := TO_CHAR(FECHA_PAGO,'YYYY');
   SELECT Refier,
          AfePrC,
          AfeCom,
          AfeCau,
          AfePag,
          AfeDis
   INTO Refiere_a_Causad,
        Afecta_Precom,
        Afecta_Compro,
        Afecta_Causad,
        Afecta_Pagado,
        Afecta_Dispon
   FROM CPDOCPAG
   WHERE RTRIM(TipPag) = RTRIM(Tipo_Pago);
   IF Afecta_Precom = 'N' THEN
      Monto_Precom := 0.00;
   ELSIF Afecta_Precom = 'S' THEN
      Monto_Precom := OLD.MonImp;
   ELSE
      Monto_Precom := OLD.MonImp * (-1);
   END IF;
   IF Afecta_Compro = 'N' THEN
      Monto_Compro := 0.00;
   ELSIF Afecta_Compro = 'S' THEN
      Monto_Compro := OLD.MonImp;
   ELSE
      Monto_Compro := OLD.MonImp * (-1);
   END IF;
   IF Afecta_Causad = 'N' THEN
      Monto_Causad := 0.00;
   ELSIF Afecta_Causad = 'S' THEN
      Monto_Causad := OLD.MonImp;
   ELSE
      Monto_Causad := OLD.MonImp * (-1);
   END IF;
   IF Afecta_Pagado = 'N' THEN
      Monto_Pagado := 0.00;
   ELSIF Afecta_Pagado = 'S' THEN
      Monto_Pagado := OLD.MonImp;
   ELSE
      Monto_Pagado := OLD.MonImp * (-1);
   END IF;
   IF Afecta_Dispon = 'N' THEN
      Monto_Dispon := 0.00;
   ELSIF Afecta_Dispon = 'S' THEN
      Monto_Dispon := OLD.MonImp;
   ELSE
      Monto_Dispon := OLD.MonImp * (-1);
   END IF;
   -- Actualizamos la Disponibilidad
   UPDATE CPAsiIni
   SET MonPrC = MonPrc - Monto_Precom,
       MonCom = MonCom - Monto_Compro,
       MonCau = MonCau - Monto_Causad,
       MonPag = MonPag - Monto_Pagado,
       MonDis = MonDis - Monto_Dispon
   WHERE CodPre = OLD.CodPre AND
             ((PerPre = PERIODO AND AnoPre = TO_CHAR(FECHA_PAGO,'yyyy')) OR
              (PerPre = '00' AND ANOPRE = ANOCIE));
   IF OLD.Refere <> 'NULO' THEN
      -- Actualizamos el Causado
      UPDATE CPImpCau
         SET MonPag = (MonPag - OLD.MonImp)
       WHERE RefCau = OLD.Refere AND
             Refere = OLD.RefCom AND
             RefPrC = OLD.RefPrC AND
             CodPre = OLD.CodPre;
   END IF;
   IF OLD.RefCom <> 'NULO' THEN
      -- Actualizamos el Compromiso
      UPDATE CPImpCom
         SET MonPag = MonPag - OLD.MonImp,
             MonCau = MonCau - Monto_Causad
       WHERE RefCom = OLD.RefCom AND
             Refere = OLD.RefPrC AND
             CodPre = OLD.CodPre;
   END If;
   IF OLD.RefPrc <> 'NULO' THEN
      -- Actualizamos el PreCompromiso
      UPDATE CPImpPrc
         SET MonPag = MonPag - OLD.MonImp,
             MonCau = MonCau - Monto_Causad,
             MonCom = MonCom - Monto_Compro
       WHERE RefPrC = OLD.RefPrC AND
             CodPre = OLD.CodPre;
   END IF;
RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_elipag() OWNER TO postgres;



CREATE OR REPLACE FUNCTION "SIMA002".trig_eliprc()
  RETURNS "trigger" AS
$BODY$
DECLARE
   FECHA DATE;
   ANOCIE VARCHAR(4);
   PERIODO VARCHAR(2);
BEGIN
   SELECT FecPrC
   INTO FECHA
   FROM CPPRECOM
   WHERE RefPrC = OLD.RefPrc;
   PERIODO := OBTENER_PERIODO(FECHA);
   --ANOCIE := OBTENER_ANO_CIERRE;
   ANOCIE := TO_CHAR(FECHA,'YYYY');
   UPDATE CPAsiIni
   SET MonPrC = MonPrc - OLD.MonImp,
       MonDis = MonDis + OLD.MonImp
   WHERE CodPre = OLD.CodPre AND
             ((PerPre = PERIODO AND AnoPre = TO_CHAR(FECHA,'yyyy')) OR
              (PerPre = '00' AND ANOPRE = ANOCIE));

   DELETE FROM CPMOVFUEFIN WHERE REFMOV=OLD.REFPRC AND TIPMOV='PRECOMPROMISO';

RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_eliprc() OWNER TO postgres;


CREATE OR REPLACE FUNCTION "SIMA002".trig_elitra()
  RETURNS "trigger" AS
$BODY$
DECLARE
   Periodo VARCHAR(2);
   Ano     VARCHAR(4);
   ANOCIE VARCHAR(4);
BEGIN
   SELECT AnoTra,
          PerTra
     INTO Ano,
          Periodo
     FROM CPTrasla
    WHERE RefTra = OLD.RefTra;
   --ANOCIE := OBTENER_ANO_CIERRE;
   ANOCIE := ANO;
   UPDATE CPAsiIni
      SET MonDis = MonDis + OLD.MonMov,
          MonTrn = MonTrn - OLD.MonMov
    WHERE CodPre = OLD.CodOri AND
             ((PerPre = PERIODO AND AnoPre = ANO) OR
              (PerPre = '00' AND ANOPRE = ANOCIE));
   UPDATE CPAsiIni
      SET MonDis = MonDis - OLD.MonMov,
          MonTra = MonTra - OLD.MonMov
    WHERE CodPre = OLD.CodDes AND
             ((PerPre = PERIODO AND AnoPre = ANO) OR
              (PerPre = '00' AND ANOPRE = ANOCIE));
   UPDATE CPAsiIni
      SET MonPrC = MonPrc + OLD.MonMov,
          MonDis = MonDis - OLD.MonMov
     WHERE CodPre = OLD.Codori AND
             ((PerPre = PERIODO AND AnoPre = ANO) OR
              (PerPre = '00' AND ANOPRE = ANOCIE));
RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_elitra() OWNER TO postgres;



CREATE OR REPLACE FUNCTION "SIMA002".trig_incadi()
  RETURNS "trigger" AS
$BODY$
DECLARE
   Fecha DATE;
   MontoDis NUMERIC (14,2);
   MontoAdi NUMERIC (14,2);
   MontoDim NUMERIC (14,2);
   Tipo VARCHAR(1);
   PERIODO VARCHAR(2);
   ANOCIE VARCHAR(4);
BEGIN
   SELECT FecAdi,
          AdiDis
     INTO Fecha,
          Tipo
     FROM CPAdiDis
    WHERE RTRIM(RefAdi) = RTRIM(NEW.RefAdi);
   --ANOCIE := OBTENER_ANO_CIERRE;
   ANOCIE := TO_CHAR(FECHA,'YYYY');
   IF Tipo = 'A' THEN
      MontoDis := NEW.MonMov;
      MontoAdi := NEW.MonMov;
      MontoDim := 0;
   ELSE
      MontoDis := NEW.MonMov * (-1);
      MontoAdi := 0;
      MontoDim := NEW.MonMov;
   END IF;


   UPDATE CPAsiIni
   SET MonDis = MonDis + MontoDis,
       MonAdi = MonAdi + MontoAdi,
       MonDim = MonDim + MontoDim
   WHERE CodPre = NEW.CodPre AND
             ((PerPre = NEW.PERPRE AND AnoPre = TO_CHAR(FECHA,'yyyy')) OR
              (PerPre = '00' AND ANOPRE = ANOCIE));

RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_incadi() OWNER TO postgres;


CREATE OR REPLACE FUNCTION "SIMA002".trig_incaju()
  RETURNS "trigger" AS
$BODY$
DECLARE
   Tipo VARCHAR(4);
   Referencia VARCHAR(8);
   Refiere VARCHAR(1);
   Fecha DATE;
   PERIODO VARCHAR(2);
   ANOCIE VARCHAR(4);
   MONTOPRE NUMERIC(14,2);
   MONTOCOM NUMERIC(14,2);
   MONTOCAU NUMERIC(14,2);
   MONTOPAG NUMERIC(14,2);
   AFECTA VARCHAR(1);
   REFERENCIAPRE VARCHAR(8);
   REFERENCIACOM VARCHAR(8);
   REFERENCIACAU VARCHAR(8);
   REFERENCIAPAG VARCHAR(8);
BEGIN
   SELECT TipAju,
          Refere,
          FECAJU
     INTO Tipo,
          Referencia,
          FECHA
     FROM CPAjuste
    WHERE RefAju = NEW.RefAju;

   SELECT Refier
     INTO Refiere
     FROM CPDocAju
    WHERE RTRIM(TipAju) = RTRIM(Tipo);

   --ANOCIE := OBTENER_ANO_CIERRE;
   ANOCIE := TO_CHAR(FECHA,'YYYY');

   IF Refiere = 'P' THEN
      UPDATE CPImpPrC
         SET MonAju = MonAju + NEW.MonAju
       WHERE CodPre = NEW.CodPre AND
             RefPrc = Referencia;


      PERIODO := OBTENER_PERIODO(FECHA);

      UPDATE CPAsiIni
         SET MonDis = MonDis + NEW.MonAju,
             MonPrc = MonPrc - NEW.MonAju,
             MonAju = MonAju + NEW.MonAju
       WHERE CodPre = NEW.CodPre AND
             ((PerPre = PERIODO AND AnoPre = TO_CHAR(FECHA,'yyyy')) OR
             (PerPre = '00' AND ANOPRE = ANOCIE));
   END IF;

   IF Refiere = 'C' THEN
      UPDATE CPImpCom
         SET MonAju = MonAju + NEW.MonAju
       WHERE CodPre = NEW.CodPre AND
             RefCom = Referencia AND  REFERE=NEW.REFPRC;

      SELECT TIPCOM
        INTO Tipo
        FROM CPCompro
       WHERE RefCom = Referencia;

      PERIODO := OBTENER_PERIODO(FECHA);

      SELECT REFPRC
        INTO AFECTA
        FROM CPDOCCOM
       WHERE TIPCOM = TIPO;

      IF AFECTA='N' THEN
         MONTOPRE := NEW.MONAJU;
      ELSE
         MONTOPRE := 0;
      END IF;

      UPDATE CPAsiIni
         SET MonDis = MonDis + MONTOPRE,
             MonPrc = MonPrc - MontoPre,
             MonCom = MonCom - NEW.MonAju,
             MonAju = MonAju + NEW.MonAju
       WHERE CodPre = NEW.CodPre AND
             ((PerPre = PERIODO AND AnoPre = TO_CHAR(FECHA,'yyyy')) OR
             (PerPre = '00' AND ANOPRE = ANOCIE));

      IF NEW.REFPRC<>'NULO' THEN
         UPDATE CPIMPPRC
            SET MonCOM = MonCOM - NEW.MONAJU
          WHERE REFPRC=NEW.REFPRC AND CodPre = NEW.CodPre;

      END IF;
   END IF;

   IF Refiere = 'A' THEN
      UPDATE CPImpCau
         SET MonAju = MonAju + NEW.MonAju
       WHERE CodPre = NEW.CodPre AND
             RefCau = Referencia AND REFERE=NEW.REFCOM AND REFPRC=NEW.REFPRC;

      SELECT TipCau
        INTO Tipo
        FROM CPCausad
       WHERE RefCau = Referencia;

      PERIODO := OBTENER_PERIODO(FECHA);

      SELECT REFIER
        INTO AFECTA
        FROM CPDOCCAU
       WHERE TIPCAU = TIPO;


      IF AFECTA='C' THEN
         MONTOPRE := 0;
         MONTOCOM := 0;
      END IF;

      IF AFECTA='P' THEN
         MONTOPRE := 0;
         MONTOCOM := NEW.MONAJU;
      END IF;

      IF AFECTA='N' THEN
         MONTOPRE := NEW.MONAJU;
         MONTOCOM := NEW.MONAJU;
      END IF;

      UPDATE CPAsiIni
         SET MonDis = MonDis + MONTOPRE,
             MonPrc = MonPrc - MontoPre,
             MonCom = MonCom - MontoCom,
             MonCau = MonCau - NEW.MonAju,
             MonAju = MonAju + NEW.MonAju
       WHERE CodPre = NEW.CodPre AND
             ((PerPre = PERIODO AND AnoPre = TO_CHAR(FECHA,'yyyy')) OR
             (PerPre = '00' AND ANOPRE = ANOCIE));

      IF NEW.REFPRC<>'NULO' THEN
         UPDATE CPIMPPRC
            SET MonCom = MonCom - MontoCom,
                MonCAU = MonCAU - NEW.MONAJU
          WHERE REFPRC=NEW.REFPRC AND CodPre = NEW.CodPre;
      END IF;

      IF NEW.REFCOM<>'NULO' THEN
         UPDATE CPIMPCOM
            SET MonCAU = MonCAU - NEW.MONAJU
          WHERE REFCOM=NEW.REFCOM AND REFERE=NEW.REFPRC AND CodPre = NEW.CodPre;
      END IF;

   END IF;

   IF Refiere = 'G' THEN
      UPDATE CPImpPag
         SET MonAju = MonAju + NEW.MonAju
       WHERE CodPre = NEW.CodPre AND
             RefPag = Referencia AND REFERE=NEW.REFCAU AND REFCOM=NEW.REFCOM AND

REFPRC=NEW.REFPRC;
      SELECT TipPag
        INTO Tipo
        FROM CPPagos
       WHERE RefPag = Referencia;

      PERIODO := OBTENER_PERIODO(FECHA);

      SELECT REFIER
        INTO AFECTA
        FROM CPDOCPAG
       WHERE TIPPAG = TIPO;

      IF AFECTA='A' THEN
         MONTOPRE := 0;
         MONTOCOM := 0;
         MONTOCAU := 0;
      END IF;

      IF AFECTA='C' THEN
         MONTOPRE := 0;
         MONTOCOM := 0;
         MONTOCAU := NEW.MONAJU;
      END IF;

      IF AFECTA='P' THEN
         MONTOPRE := 0;
         MONTOCOM := NEW.MONAJU;
         MONTOCAU := NEW.MONAJU;
      END IF;

      IF AFECTA='N' THEN
         MONTOPRE := NEW.MONAJU;
         MONTOCOM := NEW.MONAJU;
         MONTOCAU := NEW.MONAJU;
      END IF;

      UPDATE CPAsiIni
         SET MonDis = MonDis + MONTOPRE,
             MonPrc = MonPrc - MontoPre,
             MonCom = MonCom - MontoCom,
             MonCau = MonCau - MontoCau,
             MonPag = MonPag - NEW.MonAju,
             MonAju = MonAju + NEW.MonAju
       WHERE CodPre = NEW.CodPre AND
             ((PerPre = PERIODO AND AnoPre = TO_CHAR(FECHA,'yyyy')) OR
             (PerPre = '00' AND ANOPRE = ANOCIE));


      IF NEW.REFPRC<>'NULO' THEN
         UPDATE CPIMPPRC
            SET MonCom = MonCom - MontoCom,
                MonCau = MonCau - MontoCau,
                MonPAG = MonPAG - NEW.MONAJU
          WHERE REFPRC=NEW.REFPRC AND CodPre = NEW.CodPre;
      END IF;

      IF NEW.REFCOM<>'NULO' THEN
         UPDATE CPIMPCOM
            SET MonCau = MonCau - MontoCau,
                MonPAG = MonPAG - NEW.MONAJU
          WHERE REFCOM=NEW.REFCOM AND REFERE=NEW.REFPRC AND CodPre = NEW.CodPre;
      END IF;

      IF NEW.REFCAU<>'NULO' THEN
         UPDATE CPIMPCAU
            SET MonPAG = MonPAG - NEW.MONAJU
          WHERE REFCAU=NEW.REFCAU AND REFERE=NEW.REFCOM AND REFPRC=NEW.REFPRC AND CodPre =

NEW.CodPre;
      END IF;
   END IF;

RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_incaju() OWNER TO postgres;



CREATE OR REPLACE FUNCTION "SIMA002".trig_incajuing()
  RETURNS "trigger" AS
$BODY$
DECLARE
   Tipo VARCHAR(4);
   Referencia VARCHAR(8);
   Refiere VARCHAR(1);
   Fecha DATE;
   PERIODO VARCHAR(2);
   ANOCIE VARCHAR(4);
   MONTOPRE NUMERIC(14,2);
   MONTOCOM NUMERIC(14,2);
   MONTOCAU NUMERIC(14,2);
   MONTOPAG NUMERIC(14,2);
   AFECTA VARCHAR(1);
   REFERENCIAPRE VARCHAR(8);
   REFERENCIACOM VARCHAR(8);
   REFERENCIACAU VARCHAR(8);
   REFERENCIAPAG VARCHAR(8);
BEGIN
   SELECT Refere,
          FECAJU
     INTO Referencia,
          FECHA
     FROM CIAjuste
    WHERE RefAju = NEW.RefAju;

   ANOCIE := OBTENER_ANO_CIERRE();

   UPDATE CIImpIng
         SET MonAju = MonAju + NEW.MonAju
       WHERE CodPre = NEW.CodPre AND
             RefIng = Referencia;

   PERIODO := OBTENER_PERIODO(FECHA);

   UPDATE CIAsiIni
         SET MonDis = MonDis + NEW.MonAju,
             MonPrc = MonPrc - NEW.MonAju,
             MonAju = MonAju + NEW.MonAju
       WHERE CodPre = NEW.CodPre AND
             ((PerPre = PERIODO AND AnoPre = TO_CHAR(FECHA,'yyyy')) OR
              (PerPre = '00' AND ANOPRE = ANOCIE));

RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_incajuing() OWNER TO postgres;



CREATE OR REPLACE FUNCTION "SIMA002".trig_inccau()
  RETURNS "trigger" AS
$BODY$
DECLARE
   Fecha_Causad DATE;
   Referencia_Causad VARCHAR (8);
   Tipo_Causad VARCHAR(4);
   Referencia_Precom VARCHAR(8);
   Referencia_Compro VARCHAR(8);
   Refiere_a_Precom VARCHAR (1);
   Refiere_a_Compro VARCHAR (1);
   Afecta_Precom VARCHAR (1);
   Afecta_Causad VARCHAR (1);
   Afecta_Compro VARCHAR (1);
   AFecta_Dispon VARCHAR (1);
   Monto_Precom NUMERIC (14,2);
   Monto_Compro NUMERIC (14,2);
   Monto_Causad NUMERIC (14,2);
   Monto_Dispon NUMERIC (14,2);
   PERIODO VARCHAR(2);
   ANOCIE VARCHAR(4);
BEGIN
   SELECT RefCau,
          TipCau,
          FecCau,
          RefCom
   INTO Referencia_Causad,
        Tipo_Causad,
        Fecha_Causad,
        Referencia_Compro
   FROM CPCAUSAD
   WHERE RefCau = NEW.RefCau;
   PERIODO := OBTENER_PERIODO(FECHA_CAUSAD);
   --ANOCIE := OBTENER_ANO_CIERRE;
   ANOCIE := TO_CHAR(FECHA_CAUSAD,'YYYY');
   SELECT Refier,
          AfePrC,
          AfeCom,
          AfeCau,
          AfeDis
   INTO Refiere_a_Compro,
        Afecta_Precom,
        Afecta_Compro,
        Afecta_Causad,
        Afecta_Dispon
   FROM CPDOCCAU
   WHERE RTRIM(TipCau) = RTRIM(Tipo_Causad);
   IF Afecta_Precom = 'N' THEN
      Monto_Precom := 0.00;
   ELSIF Afecta_Precom = 'S' THEN
      Monto_Precom := NEW.MonImp;
   ELSE
      Monto_Precom := NEW.MonImp * (-1);
   END IF;
   IF Afecta_Compro = 'N' THEN
      Monto_Compro := 0.00;
   ELSIF Afecta_Compro = 'S' THEN
      Monto_Compro := NEW.MonImp;
   ELSE
      Monto_Compro := NEW.MonImp * (-1);
   END IF;
   IF Afecta_Causad = 'N' THEN
      Monto_Causad := 0.00;
   ELSIF Afecta_Causad = 'S' THEN
      Monto_Causad := NEW.MonImp;
   ELSE
      Monto_Causad := NEW.MonImp * (-1);
   END IF;
   IF Afecta_Dispon = 'N' THEN
      Monto_Dispon := 0.00;
   ELSIF Afecta_Dispon = 'S' THEN
      Monto_Dispon := NEW.MonImp;
   ELSE
      Monto_Dispon := NEW.MonImp * (-1);
   END IF;
   -- Actualizamos la Disponibilidad
   UPDATE CPAsiIni
   SET MonPrC = MonPrc + Monto_Precom,
       MonCom = MonCom + Monto_Compro,
       MonCau = MonCau + Monto_Causad,
       MonDis = MonDis + Monto_Dispon
   WHERE CodPre = NEW.CodPre AND
             ((PerPre = PERIODO AND AnoPre = TO_CHAR(FECHA_CAUSAD,'yyyy')) OR
              (PerPre = '00' AND ANOPRE = ANOCIE));
   IF NEW.Refere <> 'NULO' THEN
   -- Actualizamos el Compromiso
      UPDATE CPImpCom
         SET MonCau = (MonCau + NEW.MonImp)
       WHERE RefCom = NEW.Refere AND
             Refere = NEW.RefPrC AND
             CodPre = NEW.CodPre;
   END IF;
   IF NEW.RefPrc <> 'NULO' THEN
   -- Actualizamos el PreCompromiso
      UPDATE CPImpPrC
         SET MonCau = MonCau + NEW.MonImp,
             MonCom = MonCom + Monto_Compro
       WHERE RefPrc = NEW.RefPrc AND
             CodPre = NEW.CodPre;
   END If;
RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_inccau() OWNER TO postgres;



CREATE OR REPLACE FUNCTION "SIMA002".trig_inccom()
  RETURNS "trigger" AS
$BODY$
DECLARE
   Fecha_Compro DATE;
   Referencia_Compro VARCHAR (8);
   Tipo_Compro VARCHAR(4);
   Referencia_Precom VARCHAR(8);
   Refiere_a_Precom VARCHAR (1);
   Afecta_Precom VARCHAR (1);
   Afecta_Compro VARCHAR (1);
   AFecta_Dispon VARCHAR (1);
   Monto_Precom NUMERIC (14,2);
   Monto_Compro NUMERIC (14,2);
   Monto_Dispon NUMERIC (14,2);
   PERIODO VARCHAR(2);
   ANOCIE VARCHAR(4);
BEGIN
   SELECT RefCom,
          TipCom,
          FecCom,
          RefPrc
   INTO Referencia_Compro,
        Tipo_Compro,
        Fecha_Compro,
        Referencia_Precom
   FROM CPCOMPRO
   WHERE RefCom = NEW.RefCom;
   PERIODO := OBTENER_PERIODO(FECHA_COMPRO);
   --ANOCIE := OBTENER_ANO_CIERRE;
   ANOCIE := TO_CHAR(FECHA_COMPRO,'YYYY');
   SELECT RefPrC,
          AfePrC,
          AfeCom,
          AfeDis
   INTO Refiere_a_Precom,
        Afecta_Precom,
        Afecta_Compro,
        Afecta_Dispon
   FROM CPDOCCOM
   WHERE RTRIM(TipCom) = RTRIM(Tipo_Compro);
   IF Afecta_Precom = 'N' THEN
      Monto_Precom := 0.00;
   ELSIF Afecta_Precom = 'S' THEN
      Monto_Precom := NEW.MonImp;
   ELSE
      Monto_Precom := NEW.MonImp * (-1);
   END IF;
   IF Afecta_Compro = 'N' THEN
      Monto_Compro := 0.00;
   ELSIF Afecta_Compro = 'S' THEN
      Monto_Compro := NEW.MonImp;
   ELSE
      Monto_Compro := NEW.MonImp * (-1);
   END IF;
   IF Afecta_Dispon = 'N' THEN
      Monto_Dispon := 0.00;
   ELSIF Afecta_Dispon = 'S' THEN
      Monto_Dispon := NEW.MonImp;
   ELSE
      Monto_Dispon := NEW.MonImp * (-1);
   END IF;
   UPDATE CPAsiIni
   SET MonPrC = MonPrc + Monto_Precom,
       MonCom = MonCom + Monto_Compro,
       MonDis = MonDis + Monto_Dispon
   WHERE CodPre = NEW.CodPre AND
             ((PerPre = PERIODO AND AnoPre = TO_CHAR(FECHA_COMPRO,'yyyy')) OR
              (PerPre = '00' AND ANOPRE = ANOCIE));
   IF Refiere_a_Precom = 'S' THEN
      UPDATE CPImpPrc
      SET MonCom = MonCom + NEW.MonImp
      WHERE RefPrc = NEW.Refere AND
            CodPre = NEW.CodPre;
   END IF;
RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_inccom() OWNER TO postgres;



CREATE OR REPLACE FUNCTION "SIMA002".trig_incing()
  RETURNS "trigger" AS
$BODY$
DECLARE
   FECHA DATE;
   PERIODO VARCHAR(2);
   ANOCIE VARCHAR(4);
BEGIN
   FECHA:=NEW.FecIng;
   PERIODO := OBTENER_PERIODO(FECHA);
   ANOCIE := OBTENER_ANO_CIERRE();
   UPDATE CIAsiIni
   SET MonPrC = MonPrc + NEW.MonIng,
       MonDis = MonDis - NEW.Moning
   WHERE CodPre = NEW.CodPre AND
         ((PerPre = PERIODO AND AnoPre = TO_CHAR(FECHA,'yyyy')) OR
         (PerPre = '00' AND AnoPre = AnoCie));
RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_incing() OWNER TO postgres;



CREATE OR REPLACE FUNCTION "SIMA002".trig_incmovlib()
  RETURNS "trigger" AS
$BODY$
DECLARE
   HORAHOY VARCHAR(12);
BEGIN
   IF RTRIM(NEW.TIPMOV)<>'CHQ ' THEN
      SELECT TO_CHAR(NOW(),'AM HH:MI:SS')
        INTO HORAHOY
        FROM EMPRESA;
     IF HORAHOY>='PM 12:00:01' AND HORAHOY<'PM 01:00:00' THEN
        HORAHOY:=SUBSTR(HORAHOY,1,3)||'01'||SUBSTR(HORAHOY,6,6);
     END IF;
     NEW.HORING:=HORAHOY;
   END IF;
RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_incmovlib() OWNER TO postgres;



CREATE OR REPLACE FUNCTION "SIMA002".trig_incpag()
  RETURNS "trigger" AS
$BODY$
DECLARE
   Fecha_Pago DATE;
   Referencia_Pago VARCHAR(8);
   Tipo_Pago VARCHAR(4);
   Tipo_Causad VARCHAR(4);
   Tipo_Compro VARCHAR(4);
   Referencia_Precom VARCHAR(8);
   Referencia_Compro VARCHAR(8);
   Referencia_Causad VARCHAR(100);
   Refiere_a_Precom VARCHAR(1);
   Refiere_a_Compro VARCHAR(1);
   Refiere_a_Causad VARCHAR(1);
   Afecta_Precom VARCHAR(1);
   Afecta_Causad VARCHAR(1);
   Afecta_Compro VARCHAR(1);
   Afecta_Pagado VARCHAR(1);
   AFecta_Dispon VARCHAR(1);
   Monto_Precom NUMERIC (14,2);
   Monto_Compro NUMERIC (14,2);
   Monto_Causad NUMERIC (14,2);
   Monto_Pagado NUMERIC (14,2);
   Monto_Dispon NUMERIC (14,2);
   PERIODO VARCHAR(2);
   ANOCIE VARCHAR(4);
BEGIN
   SELECT RefPag,
          TipPag,
          FecPag,
          RefCau,
          TipCau
   INTO Referencia_Pago,
        Tipo_Pago,
        Fecha_Pago,
        Referencia_Causad,
        Tipo_Causad
   FROM CPPAGOS
   WHERE RefPag = NEW.RefPag;
   PERIODO := OBTENER_PERIODO(FECHA_PAGO);
   --ANOCIE := OBTENER_ANO_CIERRE;
   ANOCIE := TO_CHAR(FECHA_PAGO,'YYYY');
   SELECT Refier,
          AfePrC,
          AfeCom,
          AfeCau,
          AfePag,
          AfeDis
   INTO Refiere_a_Causad,
        Afecta_Precom,
        Afecta_Compro,
        Afecta_Causad,
        Afecta_Pagado,
        Afecta_Dispon
   FROM CPDOCPAG
   WHERE RTRIM(TipPag) = RTRIM(Tipo_Pago);
   IF Afecta_Precom = 'N' THEN
      Monto_Precom := 0.00;
   ELSIF Afecta_Precom = 'S' THEN
      Monto_Precom := NEW.MonImp;
   ELSE
      Monto_Precom := NEW.MonImp * (-1);
   END IF;
   IF Afecta_Compro = 'N' THEN
      Monto_Compro := 0.00;
   ELSIF Afecta_Compro = 'S' THEN
      Monto_Compro := NEW.MonImp;
   ELSE
      Monto_Compro := NEW.MonImp * (-1);
   END IF;
   IF Afecta_Causad = 'N' THEN
      Monto_Causad := 0.00;
   ELSIF Afecta_Causad = 'S' THEN
      Monto_Causad := NEW.MonImp;
   ELSE
      Monto_Causad := NEW.MonImp * (-1);
   END IF;
   IF Afecta_Pagado = 'N' THEN
      Monto_Pagado := 0.00;
   ELSIF Afecta_Pagado = 'S' THEN
      Monto_Pagado := NEW.MonImp;
   ELSE
      Monto_Pagado := NEW.MonImp * (-1);
   END IF;
   IF Afecta_Dispon = 'N' THEN
      Monto_Dispon := 0.00;
   ELSIF Afecta_Dispon = 'S' THEN
      Monto_Dispon := NEW.MonImp;
   ELSE
      Monto_Dispon := NEW.MonImp * (-1);
   END IF;
   -- Actualizamos la Disponibilidad
   UPDATE CPAsiIni
   SET MonPrC = MonPrc + Monto_Precom,
       MonCom = MonCom + Monto_Compro,
       MonCau = MonCau + Monto_Causad,
       MonPag = MonPag + Monto_Pagado,
       MonDis = MonDis + Monto_Dispon
   WHERE CodPre = NEW.CodPre AND
             ((PerPre = PERIODO AND AnoPre = TO_CHAR(FECHA_PAGO,'yyyy')) OR
              (PerPre = '00' AND ANOPRE = ANOCIE));
   IF NEW.Refere <> 'NULO' THEN
      -- Actualizamos el Causado
      UPDATE CPImpCau
         SET MonPag = (MonPag + NEW.MonImp)
       WHERE RefCau = NEW.Refere AND
             Refere = NEW.RefCom AND
             RefPrC = NEW.RefPrC AND
             CodPre = NEW.CodPre;
   END IF;
   IF NEW.RefCom <> 'NULO' THEN
      -- Actualizamos el Compromiso
      UPDATE CPImpCom
         SET MonPag = MonPag + NEW.MonImp,
             MonCau = MonCau + Monto_Causad
       WHERE RefCom = NEW.RefCom AND
             Refere = NEW.RefPrC AND
             CodPre = NEW.CodPre;
   END If;
   IF NEW.RefPrc <> 'NULO' THEN
      -- Actualizamos el PreCompromiso
      UPDATE CPImpPrc
         SET MonPag = MonPag + NEW.MonImp,
             MonCau = MonCau + Monto_Causad,
             MonCom = MonCom + Monto_Compro
       WHERE RefPrC = NEW.RefPrC AND
             CodPre = NEW.CodPre;
   END IF;
RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_incpag() OWNER TO postgres;



CREATE OR REPLACE FUNCTION "SIMA002".trig_incprc()
  RETURNS "trigger" AS
$BODY$
DECLARE
   FECHA DATE;
   PERIODO VARCHAR(2);
   ANOCIE VARCHAR(4);
BEGIN
   SELECT FecPrC
   INTO FECHA
   FROM CPPRECOM
   WHERE RefPrC = NEW.RefPrc;
   PERIODO := OBTENER_PERIODO(FECHA);
   --ANOCIE := OBTENER_ANO_CIERRE;
   ANOCIE := TO_CHAR(FECHA,'YYYY');
   UPDATE CPAsiIni
   SET MonPrC = MonPrc + NEW.MonImp,
       MonDis = MonDis - NEW.MonImp
   WHERE CodPre = NEW.CodPre AND
             ((PerPre = PERIODO AND AnoPre = TO_CHAR(FECHA,'yyyy')) OR
              (PerPre = '00' AND ANOPRE = ANOCIE));

RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_incprc() OWNER TO postgres;


CREATE OR REPLACE FUNCTION "SIMA002".trig_inctra()
  RETURNS "trigger" AS
$BODY$
DECLARE
   Periodo VARCHAR(2);
   Ano     VARCHAR(4);
   ANOCIE VARCHAR(4);
BEGIN
   SELECT AnoTra,
          PerTra
     INTO Ano,
          Periodo
     FROM CPTrasla
    WHERE RefTra = NEW.RefTra;
   --ANOCIE := OBTENER_ANO_CIERRE;
   ANOCIE := ANO;
   UPDATE CPAsiIni
      SET MonDis = MonDis + NEW.MonMov,
          MonTra = MonTra + NEW.MonMov
    WHERE CodPre = NEW.CodDes AND
             ((PerPre = PERIODO AND AnoPre = ANO) OR
              (PerPre = '00' AND ANOPRE = ANOCIE));
   UPDATE CPAsiIni
      SET MonDis = MonDis - NEW.MonMov,
          MonTrN = MonTrN + NEW.MonMov
    WHERE CodPre = NEW.CodOri AND
             ((PerPre = PERIODO AND AnoPre = ANO) OR
              (PerPre = '00' AND ANOPRE = ANOCIE));
RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_inctra() OWNER TO postgres;



CREATE OR REPLACE FUNCTION "SIMA002".trig_modcau()
  RETURNS "trigger" AS
$BODY$
BEGIN
IF NEW.MONPAG<>OLD.MONPAG THEN
   UPDATE CPCAUSAD
   SET SalPag = (SalPag - OLD.MonPag) + NEW.MonPag
   WHERE RefCau = NEW.RefCau;
END IF;
IF NEW.MONAJU<>OLD.MONAJU THEN
   UPDATE CPCAUSAD
   SET SalAju = (SalAju - OLD.MonAju) + NEW.MonAju
   WHERE RefCau = NEW.RefCau;
END IF;
RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_modcau() OWNER TO postgres;



CREATE OR REPLACE FUNCTION "SIMA002".trig_modcau1()
  RETURNS "trigger" AS
$BODY$
BEGIN

   UPDATE CPCAUSAD
   SET SalPag = (SalPag - OLD.MonPag) + NEW.MonPag
   WHERE RefCau = NEW.RefCau;


RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_modcau1() OWNER TO postgres;



CREATE OR REPLACE FUNCTION "SIMA002".trig_modcau2()
  RETURNS "trigger" AS
$BODY$
BEGIN

IF NEW.MONAJU<>OLD.MONAJU THEN
   UPDATE CPCAUSAD
   SET SalAju = (SalAju - OLD.MonAju) + NEW.MonAju
   WHERE RefCau = NEW.RefCau;
END IF;
RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_modcau2() OWNER TO postgres;



CREATE OR REPLACE FUNCTION "SIMA002".trig_modcom()
  RETURNS "trigger" AS
$BODY$
BEGIN
IF NEW.MONCAU<>OLD.MONCAU THEN
   UPDATE CPCOMPRO
   SET SalCau = (SalCau - OLD.MonCau) + NEW.MonCau
   WHERE RefCom = NEW.RefCom;
END IF;
IF NEW.MONPAG<>OLD.MONPAG THEN
   UPDATE CPCOMPRO
   SET SalPag = (SalPag - OLD.MonPag) + NEW.MonPag
   WHERE RefCom = NEW.RefCom;
END IF;
IF NEW.MONAJU<>OLD.MONAJU THEN
   UPDATE CPCOMPRO
   SET SalAju = (SalAju - OLD.MonAju) + NEW.MonAju
   WHERE RefCom = NEW.RefCom;
END IF;
RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_modcom() OWNER TO postgres;


CREATE OR REPLACE FUNCTION "SIMA002".trig_modpag()
  RETURNS "trigger" AS
$BODY$
BEGIN
IF NEW.MONAJU<>OLD.MONAJU THEN
  UPDATE CPPAGOS
  SET SalAju = (SalAju - OLD.MonAju) + NEW.MonAju
  WHERE RefPag = NEW.RefPag;
END IF;
RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_modpag() OWNER TO postgres;




CREATE OR REPLACE FUNCTION "SIMA002".trig_modprc()
  RETURNS "trigger" AS
$BODY$
BEGIN
IF NEW.MONCOM<>OLD.MONCOM THEN
   UPDATE CPPRECOM
   SET SalCom = (SalCom - OLD.MonCom) + NEW.MonCom
   WHERE RefPrc = NEW.RefPrc;
END IF;
IF NEW.MONCAU<>OLD.MONCAU THEN
   UPDATE CPPRECOM
   SET SalCAU = (SalCAU - OLD.MonCAU) + NEW.MonCAU
   WHERE RefPrc = NEW.RefPrc;
END IF;
IF NEW.MONPAG<>OLD.MONPAG THEN
   UPDATE CPPRECOM
   SET SalPAG = (SalPAG - OLD.MonPAG) + NEW.MonPAG
   WHERE RefPrc = NEW.RefPrc;
END IF;
IF NEW.MONAJU<>OLD.MONAJU THEN
   UPDATE CPPRECOM
   SET SalAJU = (SalAJU - OLD.MonAJU) + NEW.MonAJU
   WHERE RefPrc = NEW.RefPrc;
END IF;
RETURN NEW;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".trig_modprc() OWNER TO postgres;

