<?xml version="1.0" encoding="UTF-8"?>   
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">     
  <xsl:output method="xml" version="1.0" encoding="UTF-8" indent="yes"/>     
  <xsl:template match="/">         
    <csd:careServicesRequest xmlns:csd="urn:ihe:iti:csd:2013" xmlns="urn:ihe:iti:csd:2013">             
      <function urn='urn:openhie.org:openinfoman-hwr:stored-function:health_worker_update_contact_point'>
	<requestParams>                     
	  <id><xsl:attribute name='entityID'><xsl:value-of select="substring-before(/form/@id,'/')"/></xsl:attribute></id>                     
	  <contactPoint>
	    <xsl:attribute name='position'><xsl:value-of select="substring-after(/form/@id,'/')"/></xsl:attribute>
	    <xsl:if test="/form/field[@name='csd_provider_contact_point_type']">
	      <codedType>
		<xsl:attribute name='codingScheme'><xsl:value-of select="substring-before(/form/field[@name='csd_provider_contact_point_type']/value,'@@@')"/></xsl:attribute>
		<xsl:attribute name='code'><xsl:value-of select="substring-after(/form/field[@name='csd_provider_contact_point_type']/value,'@@@')"/></xsl:attribute>
		<xsl:if test="/form/field[@name='value']"><xsl:value-of select="/form/field[@name='value']"/></xsl:if>
	      </codedType>
	    </xsl:if>
	    <xsl:if test="/form/field[@name='equipment']">
	      <equipment><xsl:value-of select="/form/field[@name='equipment']"/></equipment>
	    </xsl:if>
	    <xsl:if test="/form/field[@name='purpose']">
	      <purpose><xsl:value-of select="/form/field[@name='purpose']"/></purpose>
	    </xsl:if>
	    <xsl:if test="/form/field[@name='certificate']">
	      <certificate><xsl:value-of select="/form/field[@name='certificate']"/></certificate>
	    </xsl:if>
	  </contactPoint>                                        
	</requestParams>             
      </function>         
    </csd:careServicesRequest>     
  </xsl:template> 
</xsl:stylesheet>
