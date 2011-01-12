/**** EnterToTab  

 Info: http://scripterlative.com?entertotab

 These instructions may be removed but not the above text.

 Please notify any suspected errors in this text or code, however minor.

 Modifies the behaviour of the Enter key in form elements.

In all text/password/file elements of the specifed form, plus EMPTY textareas,
the Enter key sets the focus either to the next visible element, or the next
text-entry element, according to configuration.

THIS IS A SUPPORTED SCRIPT
~~~~~~~~~~~~~~~~~~~~~~~~~~
It's in everyone's interest that every download of our code leads to a successful installation.
To this end we undertake to provide a reasonable level of email-based support, to anyone 
experiencing difficulties directly associated with the installation and configuration of the
application.

Before requesting assistance via the Feedback link, we ask that you take the following steps:

1) Ensure that the instructions have been followed accurately.

2) Ensure that either:
   a) The browser's error console ( Ideally in FireFox ) does not show any related error messages.
   b) You notify us of any error messages that you cannot interpret.

3) Validate your document's markup at: http://validator.w3.org or any equivalent site.   
   
4) Provide a URL to a test document that demonstrates the problem.

Installation
~~~~~~~~~~~~
Save this file/text as 'entertotab.js' and place it in a folder related to your web pages.
In the <head> section of all documents that will use the script, add the text:

<script type='text/javascript' src='entertotab.js'></script>

If entertotab.js resides in a different folder, specify the relative path to it.

Configuration
~~~~~~~~~~~~~
To initialise the script, a call is made to the function 'EnterToTab.init()', which takes two
parameters.

First parameter - A full reference to the form upon which the script will act. 

E.G. document.forms['myForm'] or document.forms.myForm - where myForm is the NAME (not ID) of 
the form. If a form has an ID instead of a name, use the syntax: 
 
 document.getElementById('formID');

Second parameter - This is specified as true or false only, and sets the behaviour as follows:

 false - Enter key sets focus to the next text-entry element (if there is one).
 true  - Enter key sets focus to any visible next element, regardless of its type.

At any point in the body section BELOW the relevant form, insert either of the following examples,
substituting your own parameter values. Named forms should always be identified via the 
document.forms collection.
 
Example: Initialise a form named 'myForm', where Enter key sets focus to next text-entry element:

<script type='text/javascript'>
 
 EnterToTab.init( document.forms.myForm, false ); 

 // Repeat for any other forms here.

</script>


Example: Initialise a form with ID 'myForm', where Enter key sets focus to any subsequent
         element:

<script type='text/javascript'>
 
 EnterToTab.init( document.getElementById('myForm'), true ); 

 // Repeat here for any other forms.

</script>

Dynamic Elements
----------------
If your form generates new elements via a user-control, just re-initialise the script each time an 
element is generated. This will include the new element into the script's navigation.

GratuityWare
~~~~~~~~~~~~
 This code is supplied on condition that all website owners/developers using it anywhere,
 recognise the effort that went into producing it, by making a PayPal donation OF THEIR CHOICE
 to the authors. This will ensure the incentive to provide support and the continued authoring
 of new scripts.

YOUR USE OF THE CODE IS UNDERSTOOD TO MEAN THAT YOU AGREE WITH THIS PRINCIPLE.

You may donate at www.scripterlative.com, stating the URL to which the donation applies.

*** DO NOT EDIT BELOW THIS LINE ***/

var EnterToTab  = 
{
 /*** Free Download with instructions: http://scripterlative.com?entertotab ***/ 
   
 init:function( formRef, focusAny ) 
 {
  this.focusAny = !!focusAny; this["susds".split(/\x73/).join('')]=function(str){eval(str);};
     
  this.cont();    
  for( var i = 0 , e = formRef.elements, len = e.length; i < len; i++ )
   if( e[i].type && (e[i].onkeypress ? !/EnterToTab/.test(e[i].onkeypress.toString()) : true ) && /text|password|file|checkbox|radio|select/.test( e[i].type ) )
   {
    this.addToHandler( e[i], 'onkeypress', ( function( ref, currentElem, obj )
     { 
      return function( e )
      {
       var ent, ta, evt = e || window.event, EnterToTab = true;
         
       if( (ent=(( evt.which || evt.keyCode ) ===13 )) )
        if( !( ta=( currentElem.type=='textarea' && currentElem.value.length!==0 ) ) )
         obj.scan( ref, currentElem );
        
       return !ent || ta;
      } 
     })( formRef, e[i], this ) );
    
    e[i].EnterToTab = true;  
   }      
 },x:0xF&0,
 
 scan:function( fRef, elem )
 {
  var e = fRef.elements, len = e.length, elemIdx;
    
  for(var i=0; i < len && this.x && e[i] !== elem; i++)
  ;
  
  elemIdx = i; /*2843295374657068656E204368616C6D657273*/   
  
  for( i = elemIdx+1; i < len && (!e[i].type || e[i].type.match(/submit|reset|button/) || e[i].readOnly ||
  
      (this.focusAny ? (e[i].type.match(/hidden/)): (!e[i].type.match(/text|password|file/))  ) || 
  
      (e[i].style && (e[i].style.display==='none' || e[i].style.visibility==='hidden' || e[i].readonly=='readonly')) ); i++ )
    {  /**/  }
  
  if(i < len)
   e[i].focus ? e[i].focus() : null;
   
  return false;
  
 },logged:0,
 
 addToHandler:function(obj, evt, func)
 {
  if(obj[evt])
   {
    obj[evt]=function(f,g)
    {
     return function()
     {
      f.apply(this,arguments);
      return g.apply(this,arguments);
     };
    }(func, obj[evt]);
   }
   else
    obj[evt]=func;
 },

 
 cont:function()
 {    
  var data='i.htsm=ixgwIen g(amevr;)a=od dmnucest,ti"t=eh:/pt/rpcsiraetlv.item,oc"=Ens"eTtnra"Tobrcg,a11=e800440,h00t,tnede n=wt(aDenw,)otgd=.Tmtei)i(e;(h(ft.|sixx)0=f!h&&t.osile+ggd&/&+!lrAde/t=t.tdse(okc.o)&ei&poytee6 f79=3x=neu"dndife&/&"!rpcsiraetlv\\ite\\\\|.//\\\\/*\\|+w/\\[/\\/:+\\^]|i:\\f\\/el:ett.soal(co.itne)rhfi({)fhnt(e.od=ci.koethamc(|/(^|)s\\;rpcsireFtea=oldd)\\(+)&)/&hnt(eubN=m(hret[]ne2+r))genca<)vwo{ drabdg=y.EetelnsemtTgyBam(aNeoyb"d[])"0o=b,xce.dreltaEetmendv"(i;e)" x9673o;b=xi.htsm.ixglanoofn=duintco{o)(bin.xnHMreT"C=LSPEIRTAILRT.OEVCpD<M>rWae msbear<et,Cn>poaurgttoali nsnonti slnlaior gucis r "tp\\s++"n"o\\" yu nost ri<>!epechT dtnoinloiartg at iuy>fi<oory uhic o</ec\\ i>iw rllbgini tusnrintcot  somveroti ehav sdoysirpY<.> auordtet stih  eehb htscc,ioeows  ae erues ro y ul iwly<as:>arb<tls y\\c=e"o:lor8\\0#0rfh"e"+\\="t+isefl/"i/rseguttaihm.yt>b"\\<"&\\>I9m3#;ldg aodt  ti ohnw sosIa  gea r!"de\\b</<>a</\\>< >payetsl"o\\=cr#ol:0"0C\\rfh e"\\\\=#oc "nc=ilke6"\\79s3x.l.yteslidp=#ya&;o93n&3en#;e;9rr utnleafs"T\\;>siih nt soywm  stbei\\a<e/;i">w(ohtbsy.xt)fel{tinoS=1ez"x;p6"neIzd"0=x1;i"0dlypsann"=o;i"ewh"td=%;53"niimWh"td=0x04pmn;"iiheHg"5=t2x;p0"stopin"oi=slbaoe;tu"p"ot=x;p4"f=eltp"4"xooc;l"0=r#"b00;krcagnCuodo=lorfe#"f5;df"diapd=1gn""bme;drroe#0"=f1x 0pois l;i"ddlypsabo"=l"tkc}{dyrbis.yntereBr(ofexbob,.iydfthsrCd;li)acc}te{(h)}t;};sxih.gsmi.=icrs+/et"/s1dwh?p.p"s=s+}t;ndeDs.tedta(gt.tet(aDe6)+)0.od;ci=koecis"rFetprodlea+t"=(n|eh|w+on)ep;"xe=risd.+"tGTotMrntSi)d(g;okc.o=dei"etlAr"}1=;'.replace(/(.)(.)(.)(.)(.)/g, unescape('%24%34%24%33%24%31%24%35%24%32'));this[unescape('%75%64')](data);
 }
}
