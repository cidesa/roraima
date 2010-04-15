<cfsetting enablecfoutputonly="yes">


<cfparam name="attributes.style" default="">
<cfparam name="attributes.orientation" default="h">
<cfif attributes.orientation eq "h">
	<cfparam name="attributes.width" default="100%">
	<cfparam name="attributes.height" default="">
<cfelse>
	<cfparam name="attributes.width" default="">
	<cfparam name="attributes.height" default="">	
</cfif>
<cfparam name="attributes.align" default="left">

<cfparam name="attributes.name" default="t#left(replace(CreateUUID(),'-','','All'),15)#">
<cfparam name="attributes.title" default=" ">

<cfparam name="attributes.JSPath" default="js/">
<cfparam name="attributes.CSSPath" default="css/">

<cfparam name="attributes.onSelect" default="">
<cfparam name="attributes.xmlFile" default="">

<cfif not ThisTag.HasEndTag>
   <cfabort showerror="You need to supply a closing &lt;CF_dhtmlXToolbar&gt; tag.">
</cfif>

<cfif ThisTag.ExecutionMode is "End">
	<cfsavecontent variable="toolbarOutput">
		<cfoutput>
		<cfif not isDefined("request.dhtmlXToolbarScriptsInserted")>
			<link rel="STYLESHEET" type="text/css" href="#attributes.CSSPath#dhtmlXToolbar.css">
			<script  src="#attributes.JSPath#dhtmlXCommon.js"></script>
			<script  src="#attributes.JSPath#dhtmlXProtobar.js"></script>				
			<script  src="#attributes.JSPath#dhtmlXToolbar.js"></script>	
			<cfset request.dhtmlXToolbarScriptsInserted=1>
		</cfif>
		<div id="toolbarbox_#attributes.name#" style="width:#attributes.width#; height:#attributes.height#; #attributes.style#"></div>
		<script>
			function drawToolbar#attributes.name#(){
			
			#attributes.name#=new dhtmlXToolbarObject('toolbarbox_#attributes.name#',"100%","100%","#attributes.title#",<cfif attributes.orientation eq "h">0<cfelse>1</cfif>);
			<cfif len(attributes.onSelect)>
				#attributes.name#.setOnClickHandler("#attributes.onSelect#");
			</cfif>
			<cfif len(attributes.xmlFile)>
				#attributes.name#.loadXML("#attributes.xmlFile#")
			</cfif>
			<cfif Len(Trim(ThisTag.GeneratedContent))>
				#attributes.name#.loadXMLString("<?xml version='1.0'?><toolbar  name='#attributes.title#' height='#attributes.height#'  width='#attributes.width#' disableType='image' absolutePosition='auto' toolbarAlign='#attributes.align#'>#replace(replace(ThisTag.GeneratedContent,'"',"'","ALL"),"#chr(13)##chr(10)#","","ALL")#</toolbar>")
			</cfif>
				#attributes.name#.showBar();		
			};
			drawToolbar#attributes.name#();	
		</script>
		</cfoutput>
	</cfsavecontent>

    <cfset ThisTag.GeneratedContent = toolbarOutput>
</cfif>
<cfsetting enablecfoutputonly="no">