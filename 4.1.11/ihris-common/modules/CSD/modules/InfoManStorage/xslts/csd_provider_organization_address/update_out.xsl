<?xml version="1.0" encoding="UTF-8"?>   
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">     
  <xsl:output method="xml" version="1.0" encoding="UTF-8" indent="yes"/>     
  <xsl:template match="/">         
    <csd:careServicesRequest xmlns:csd="urn:ihe:iti:csd:2013" xmlns="urn:ihe:iti:csd:2013">             
      <function urn='urn:openhie.org:openinfoman-hwr:stored-function:health_worker_update_org_address'>
	<requestParams>                     
	  <id><xsl:attribute name='entityID'><xsl:value-of select="substring-before(/form/@id,'/')"/></xsl:attribute></id>                     
	  <organization>
	    <xsl:attribute name="entityID"><xsl:value-of select="substring-before(substring-after(/form/@id,'/'),'/')"/></xsl:attribute>
	    <address>
	      <xsl:attribute name='type'><xsl:value-of select="substring-after(substring-after(/form/@id,'/'),'/')"/></xsl:attribute>
	      <xsl:for-each select="/form/field[@name='address_line']/value">
		<addressLine>
		  <xsl:attribute name='component'><xsl:value-of select="@keyid"/></xsl:attribute><xsl:value-of select="text()"/>
		</addressLine>
	      </xsl:for-each>
	    </address>                                        
	  </organization>
	</requestParams>             
      </function>         
    </csd:careServicesRequest>     
  </xsl:template> 
</xsl:stylesheet>
