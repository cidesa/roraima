<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/bd/basedatosAdo.php");
  require_once("../../lib/general/cabecera.php");
  require_once("../../lib/general/obtener_mascara.php");
  require_once("../../lib/general/temporal.php");

  class pdfreporte extends fpdf
  {

    var $bd;
    var $sql1;
    var $sql2;
    var $rep;
    var $numero;
    var $cab;
    var $perdesde;
    var $perhasta;
    var $nivdesde;
    var $nivhasta;
    var $codpredes;
    var $codprehas;
    var $comodin;


    var $titulo;

    function pdfreporte()
    {
      $this->fpdf("l","mm","Letter");
      $this->bd=new basedatosAdo();
      $this->perdesde=$_POST["perdesde"];
      $this->perhasta=$_POST["perhasta"];
      $this->nivdesde=$_POST["nivdesde"];
      $this->nivhasta=$_POST["nivhasta"];
      $this->codpredes=$_POST["codpredes"];
      $this->codprehas=$_POST["codprehas"];
      $this->comodin=$_POST["comodin"];


      $this->sql="SELECT
            SUBSTR(A.CODPRE,1,2) as programa,
            A.CodPre as codpre,
            RTRIM(B.Nompre) as nompre,
            A.Modificacion,
            A.MonPrc,
            A.MonCom,
            A.MonCau,
            A.MonPag,
  (CASE WHEN (LENGTH(RTRIM(A.CODPRE))=".$this->nivhasta.") THEN A.MODIFICACION ELSE 0 END) as monmodult,
  (CASE WHEN (LENGTH(RTRIM(A.CODPRE))=".$this->nivhasta.") THEN A.MONPRC ELSE 0 END) as monprcult,
  (CASE WHEN (LENGTH(RTRIM(A.CODPRE))=".$this->nivhasta.") THEN A.MONCOM ELSE 0 END) as moncomult,
  (CASE WHEN (LENGTH(RTRIM(A.CODPRE))=".$this->nivhasta.") THEN A.MONCAU ELSE 0 END) as moncauult,
  (CASE WHEN (LENGTH(RTRIM(A.CODPRE))=".$this->nivhasta.") THEN A.MONPAG ELSE 0 END) as monpagult
            FROM
            CPDISNIV A,
            CPDEFTIT B
            WHERE  RTRIM(B.CODPRE) = RTRIM(A.CODPRE) AND
                    LENGTH(RTRIM(A.CODPRE))>=".$this->lonnivdesde." AND
                    LENGTH(RTRIM(A.CODPRE))<=".$this->lonnivhasta." AND
                    B.CODPRE >= '".$this->codpredes."' AND
                    B.CODPRE <= '".$this->codprehas."'
            GROUP BY SUBSTR(A.CODPRE,1,2), A.CODPRE, RTRIM(B.NOMPRE), A.MODIFICACION, A.MONPRC, A.MONCOM, A.MONCAU, A.MONPAG
            ORDER BY A.CODPRE";

print $this->sql;
exit();
      $this->cab=new cabecera();

    }

    function Header()
    {
      $this->cab->poner_cabecera($this,$this->titulo,"l","s");

      //Cargar Datos
      $mascara = "";
      $mascara = MASCARA();
      $sql="select sum(lonniv) as  lenmascara from cpniveles where consec<='".$this->nivhasta."' ";
      $mytb=$this->bd->select($sql);
      if (!$mytb->EOF){$lenmascara=$mytb->fields["lenmascara"];}
  /*		$lenmascara=$lenmascara + $this->nivhasta - 1;


        Mascara in Number,PerDesde in Char,PerHasta in Char,
            CodPreDesde in char,CodPreHasta in char,Comodin in char


             SELECT substr(A.codpre,1,$mascara) codpre,
             sum(A.MonAsi) Monasi,
             (sum(A.Montra)+sum(A.MonAdi)-sum(A.Montrn)-sum(A.MonDim)) Modificacion,
             (sum(A.MonAsi)+sum(A.Montra)+sum(A.MonAdi)-sum(A.Montrn)-sum(A.MonDim)) AsigActual,
              sum(A.MonPrc) Monprc,
              sum(A.MonCom) moncom,
              sum(A.MonDis) mondis,
              sum(A.MonCau) moncau,
              sum(A.MonPag) monpag,
              (sum(A.MonCau)-sum(A.MonPag))  Deuda
            FROM CPASIINI A,
               CPDEFNIV B
            WHERE
               B.CodEmp = '001' AND
               A.PerPre >= PerDesde AND
               A.PerPre <= PerHasta AND
               A.AnoPre >= RTRIM(TO_CHAR(B.FecIni,'YYYY')) And
               A.AnoPre <= RTRIM(TO_CHAR(B.FecCie,'YYYY')) And
               RTRIM(A.codpre) >= CodPreDesde AND
               RTRIM(A.codpre) <= CodPreHasta AND
               substr(A.codpre,1,Mascara) LIKE substr(A.codpre,1,Mascara)||'%' AND
               RTRIM(A.codpre) LIKE Comodin
               group by substr(A.codpre,1,Mascara);

            BEGIN
              for Reg in Niri loop
                insert into cpdisniv(codpre,monasi,modificacion,asigactual,monprc,moncom,mondis,moncau,monpag,deuda) values (reg.codpre,reg.monasi,reg.modificacion,reg.asigactual,reg.monprc,reg.moncom,reg.mondis,reg.moncau,reg.monpag,reg.deuda);
                commit;
              end loop;

              END;*/
      ///////////////////////////////////////////////////////////


      $this->SetDrawColor(255,255,255);
      $this->Line(10,35,270,35);
      $this->SetDrawColor(0,0,0);
      $this->SetTextColor(0,0,128);
      $this->setFont("Arial","B",9);
      $this->cell(107,5,"");
      $this->cell(30,5,"Del  ".$this->fecha1."                   Hasta  ".$this->fecha2);
      $this->Line(10,43,270,43);
      $this->SetTextColor(135,0,0);
      $this->ln(6);
      $this->cell(2,5,"");
      $this->cell(36,5,"Referencia");
      $this->cell(35,5,"Tipo");
      $this->cell(20,5,"Fecha");
      $this->cell(35,5,"Descripción");
      $this->ln(4);
      $this->cell(3,5,"");
      $this->cell(25,5,"Adición");
      $this->cell(65,5,"Código Presupuestario");
      $this->cell(98,5,"Descrip. Código Presupuestario");
      $this->cell(50,5,"Monto Adiciones");
      $this->cell(35,5,"Monto");
      $this->ln(4);
      $this->SetTextColor(0,0,128);
      $this->cell(28,5,"");
      $this->cell(90,5,$mascara);
      $this->SetTextColor(150,0,0);
      $this->cell(117,5,"Adición");
      $this->cell(35,5,"Disminuciones");
      $this->ln(4);
      $this->SetTextColor(0,0,0);
      $this->SetLineWidth(0.5);
      $this->Line(10,56,270,56);
      $this->SetLineWidth(0.2);
      $this->ln(3);
    }
    function Cuerpo()
    {

      $tb=$this->bd->select($this->sql);
      $tb2=$this->bd->select($this->sql);

      $acum1=0;
      $acum2=0;
      $acumt1=0;
      $acumt2=0;
      $this->setFont("Arial","",8);
      if (!$tb2->EOF)
      {
        $ref=$tb2->fields["refadi"];
        $this->cell(3,5,"");
        $this->cell(34,5,$tb2->fields["refadi"]);
        $this->cell(34,5,$tb2->fields["tipadi"]);
        $this->cell(20,5,$tb2->fields["fecadi"]);
        $this->Multicell(150,3,$tb2->fields["desadi"],0,'L');
        $this->ln(6);
      }

      while (!$tb->EOF)
      {
        if ($tb->fields["refadi"]!=$ref)
        {
          $this->setFont("Arial","B",8);
          $this->SetTextColor(0,0,128);
          $this->SetDrawColor(0,0,128);
          $this->Line(200,$this->GetY(),270,$this->GetY());
          $this->cell(170,5,"");
          $this->cell(24,5,"SUB-TOTAL");
          $this->Line(10,$this->GetY()+5,270,$this->GetY()+5);
          $this->SetTextColor(0,0,0);
          $this->SetDrawColor(0,0,0);
          $this->setFont("Arial","",8);
          $this->cell(25,5,number_format($acum1,2,'.',','),0,0,'R');
          $this->cell(40,5,number_format($acum2,2,'.',','),0,0,'R');
          $acum1=0;
          $acum2=0;
          $this->ln(9);
          if ($this->GetY()>175){$this->ln(300);$this->cell(5,5,"");$this->ln(1);$this->ln(-1);}
          $this->setFont("Arial","",8);
          $this->cell(3,5,"");
          $this->cell(34,5,$tb->fields["refadi"]);
          $this->cell(34,5,$tb->fields["tipadi"]);
          $this->cell(20,5,$tb->fields["fecadi"]);
          $this->Multicell(150,3,$tb->fields["desadi"],0,'L');
          $this->ln();
        }
        //Detalle
        $this->setFont("Arial","",8);
        $ref=$tb->fields["refadi"];

        $this->cell(3,5,"");
        $this->cell(25,5,"");
        $this->cell(65,5,$tb->fields["codpre"]);
      //	$this->cell(76,5,$tb->fields["nompre"]);
        $texto=substr($tb->fields["nompre"],0,55);
        $this->cell(76,5,$texto);
        $this->cell(50,5,number_format($tb->fields["monadi"],2,'.',','),0,0,'R');
        $this->cell(40,5,number_format($tb->fields["mondis"],2,'.',','),0,0,'R');
        $acum1=$acum1+$tb->fields["monadi"];
        $acum2=$acum2+$tb->fields["mondis"];
        $acumt1=$acumt1+$tb->fields["monadi"];
        $acumt2=$acumt2+$tb->fields["mondis"];

        $this->ln();
        $tb->MoveNext();
      }
      $this->setFont("Arial","B",8);
      $this->SetTextColor(0,0,128);
      $this->SetDrawColor(0,0,128);
      $this->Line(200,$this->GetY(),270,$this->GetY());
      $this->cell(170,5,"");
      $this->cell(24,5,"SUB-TOTAL");
      $this->Line(10,$this->GetY()+5,270,$this->GetY()+5);
      $this->SetTextColor(0,0,0);
      $this->SetDrawColor(0,0,0);
      $this->setFont("Arial","",8);
      $this->cell(25,5,number_format($acum1,2,'.',','),0,0,'R');
      $this->cell(40,5,number_format($acum2,2,'.',','),0,0,'R');
      $this->ln(7);
      $this->SetTextColor(0,0,128);
      $this->SetDrawColor(0,0,128);
      $this->setFont("Arial","B",8);
      $this->cell(170,5,"");
      $this->cell(24,5,"     TOTAL");
      $this->SetLineWidth(0.5);
      $this->Line(200,$this->GetY(),270,$this->GetY());
      $this->SetTextColor(0,0,0);
      $this->SetDrawColor(0,0,128);
      $this->setFont("Arial","",8);
      $this->cell(25,5,number_format($acumt1,2,'.',','),0,0,'R');
      $this->cell(40,5,number_format($acumt2,2,'.',','),0,0,'R');

    }
  }
?>
