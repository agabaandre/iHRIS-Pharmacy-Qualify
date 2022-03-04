<?xml version="1.0" encoding="UTF-8"?>   
<xsl:stylesheet version="1.0" 
  xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
  xmlns:csd="urn:ihe:iti:csd:2013"
  exclude-result-prefixes="csd xsl"
  >     
  <xsl:output method="xml" version="1.0" encoding="UTF-8" indent="yes"/>     
  <xsl:template match="/">         
    <csd:CSD xmlns:csd="urn:ihe:iti:csd:2013">
      <csd:organizationDirectory/>
      <csd:serviceDirectory/>
      <csd:facilityDirectory>
	<xsl:for-each select="/csd:CSD/csd:facilityDirectory/csd:facility">
	  <csd:facility>
	    <xsl:attribute name="entityID"><xsl:value-of select="./@entityID"/></xsl:attribute>
	    <xsl:for-each select="./csd:organizations/csd:organization/csd:service">
	      <csd:service><xsl:attribute name="id"><xsl:value-of select="../../../@entityID"/>/<xsl:value-of select="../@entityID"/>/<xsl:value-of select="@position"/></xsl:attribute></csd:service>
	    </xsl:for-each>
	  </csd:facility>
	</xsl:for-each>
      </csd:facilityDirectory>
      <csd:providerDirectory/>
    </csd:CSD>
  </xsl:template>       
</xsl:stylesheet>
