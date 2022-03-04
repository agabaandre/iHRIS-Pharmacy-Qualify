<?xml version="1.0" encoding="UTF-8"?>   
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">     
  <xsl:output method="xml" version="1.0" encoding="UTF-8" indent="yes"/>     
  <xsl:template match="/">         
    <csd:careServicesRequest xmlns:csd="urn:ihe:iti:csd:2013" xmlns="urn:ihe:iti:csd:2013">             
      <function urn="urn:openhie.org:openinfoman-hwr:stored-function:health_worker_create_name">
	<requestParams>                     
	  <id><xsl:attribute name='entityID'><xsl:value-of select="/form/@parent_id"/></xsl:attribute></id>                     
	  <name>
	    <xsl:if test="/form/field[@name='honorific']">
	      <honorific><xsl:value-of select="/form/field[@name='honorific']"/></honorific>
	    </xsl:if>
	    <xsl:if test="/form/field[@name='surname']">
	      <surname><xsl:value-of select="/form/field[@name='surname']"/></surname>
	    </xsl:if>
	    <xsl:if test="/form/field[@name='forename']">
	      <forename><xsl:value-of select="/form/field[@name='forename']"/></forename>
	    </xsl:if>
	    <xsl:if test="/form/field[@name='suffix']">
	      <suffix><xsl:value-of select="/form/field[@name='suffix']"/></suffix>
	    </xsl:if>
	    <xsl:for-each select="/form/field[@name='common_name']/value">
	      <commonName><xsl:value-of select="text()"/></commonName>
	    </xsl:for-each>
	    <xsl:for-each select="/form/field[@name='other_name']/value">
	      <otherName><xsl:value-of select="text()"/></otherName>
	    </xsl:for-each>
	  </name>                                        	  
	</requestParams>             
      </function>         
    </csd:careServicesRequest>     
  </xsl:template> 
</xsl:stylesheet>
