<?xml version="1.0" encoding="UTF-8"?>   
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">     
  <xsl:output method="xml" version="1.0" encoding="UTF-8" indent="yes"/>     
  <xsl:template match="/">         
    <csd:careServicesRequest xmlns:csd="urn:ihe:iti:csd:2013" xmlns="urn:ihe:iti:csd:2013">             
      <function urn='urn:openhie.org:openinfoman-hwr:stored-function:health_worker_indices_org_contact_point'>
	<requestParams>                     
	  <xsl:choose>
	    <xsl:when test="/form/@parent_id">
	      <id><xsl:attribute name='entityID'><xsl:value-of select="substring-before(/form/@parent_id,'/')"/></xsl:attribute></id>
	      <organization><xsl:attribute name='entityID'><xsl:value-of select="substring-after(/form/@parent_id,'/')"/></xsl:attribute></organization>
	    </xsl:when>
	    <xsl:otherwise>
	      <id/>
	      <organization/>
	    </xsl:otherwise>
	  </xsl:choose>
	  <record>
	    <xsl:if test="/form/@modified">
	      <xsl:attribute name='updated'><xsl:value-of select="translate(substring(/form/@modified,1,19),' ','T')"/></xsl:attribute>
	    </xsl:if>
	  </record>                     
	</requestParams>             
      </function>         
    </csd:careServicesRequest>     
  </xsl:template> 
</xsl:stylesheet>
