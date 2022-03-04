<?xml version="1.0" encoding="UTF-8"?>   
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">     
  <xsl:output method="xml" version="1.0" encoding="UTF-8" indent="yes"/>     
  <xsl:template match="/">         
    <csd:careServicesRequest xmlns:csd="urn:ihe:iti:csd:2013" xmlns="urn:ihe:iti:csd:2013">             
      <function urn='urn:openhie.org:openinfoman-hwr:stored-function:health_worker_create_org_contact_point'>
	<requestParams>                     
	  <id><xsl:attribute name='entityID'><xsl:value-of select="substring-before(/form/@parent_id,'/')"/></xsl:attribute></id>
	  <organization>
	    <xsl:attribute name='entityID'><xsl:value-of select="substring-after(/form/@parent_id,'/')"/></xsl:attribute>
	    <contactPoint>
	      <xsl:attribute name='position'><xsl:value-of select="substring-after(substring-after(/form/@id,'/'),'/')"/></xsl:attribute>

	      <xsl:if test="/form/field[@name='csd_contact_point_type']">
		<codedType>
		  <xsl:attribute name='codingScheme'><xsl:value-of select="substring-before(/form/field[@name='csd_contact_point_type']/value,'@@@')"/></xsl:attribute>
		  <xsl:attribute name='code'><xsl:value-of select="substring-after(/form/field[@name='csd_contact_point_type']/value,'@@@')"/></xsl:attribute>
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
	  </organization>
	</requestParams>             
      </function>         
    </csd:careServicesRequest>     
  </xsl:template> 
</xsl:stylesheet>
