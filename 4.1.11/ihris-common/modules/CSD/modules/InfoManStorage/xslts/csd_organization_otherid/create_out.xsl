<?xml version="1.0" encoding="UTF-8"?>   
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">     
  <xsl:output method="xml" version="1.0" encoding="UTF-8" indent="yes"/>     
  <xsl:template match="/">         
    <csd:careServicesRequest xmlns:csd="urn:ihe:iti:csd:2013" xmlns="urn:ihe:iti:csd:2013">             
      <function urn="urn:openhie.org:openinfoman-hwr:stored-function:organization_create_otherid">
	<requestParams>                     
	  <id><xsl:attribute name='entityID'><xsl:value-of select="/form/@parent_id"/></xsl:attribute></id>                     
	  <otherID>
	    <xsl:if test="/form/field[@name='csd_otherid_type']">
	      <xsl:attribute name='code'><xsl:value-of select="/form/field[@name='csd_otherid_type']"/></xsl:attribute>
	    </xsl:if>
	    <xsl:if test="/form/field[@name='assigning_authority']">
	      <xsl:attribute name='assigningAuthorityName'><xsl:value-of select="/form/field[@name='assigning_authority']"/></xsl:attribute>
	    </xsl:if>
	    <xsl:if test="/form/field[@name='number']"><xsl:value-of select="/form/field[@name='number']"/></xsl:if>
	  </otherID>
	</requestParams>             
      </function>         
    </csd:careServicesRequest>     
  </xsl:template> 
</xsl:stylesheet>
