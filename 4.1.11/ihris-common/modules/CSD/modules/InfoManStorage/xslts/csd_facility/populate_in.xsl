<?xml version="1.0" encoding="UTF-8"?>   
<xsl:stylesheet version="1.0" 
  xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
  xmlns:csd="urn:ihe:iti:csd:2013"
  exclude-result-prefixes="csd xsl"
  >     
  <xsl:output method="xml" version="1.0" encoding="UTF-8" indent="yes"/>     
  <xsl:template match="/">         
    <xsl:for-each select="/csd:CSD/csd:facilityDirectory/csd:facility">
    <form name='csd_facility'>
      <xsl:attribute name="id"><xsl:value-of select="@entityID"/></xsl:attribute>
      <xsl:attribute name="created"><xsl:value-of select="translate(substring(csd:record/@created,1,19),'T',' ')"/></xsl:attribute>
      <xsl:attribute name="modified"><xsl:value-of select="translate(substring(csd:record/@updated,1,19),'T',' ')"/></xsl:attribute>
      <field name="entityID" type="STRING_LINE"><xsl:value-of select="@entityID"/></field> <!-- ID and ENTITYID match -->
      <field name="source_directory" type="STRING_LINE"><xsl:value-of select="csd:record/@sourceDirectory"/></field>
      <field name="primary_name" type="STRING_LINE"><xsl:value-of select="csd:primaryName"/></field>
      <field name="latitude" type="FLOAT"><xsl:value-of select="csd:geocode/csd:latitude"/></field>
      <field name="longitude" type="FLOAT"><xsl:value-of select="csd:geocode/csd:longitude"/></field>
      <field name="altitude" type="FLOAT"><xsl:value-of select="csd:geocode/csd:altitude"/></field>
      <field name="geo_coordinate_system" type="STRING_LINE"><xsl:value-of select="csd:geocode/csd:coordinateSystem"/></field>
      <field name="csd_facility_type" type="MAP_MULT">
	<xsl:for-each select="csd:codedType">
	  <value form='csd_facility_type'><xsl:value-of select="concat(@codingScheme,'@@@',@code)"/></value>
	</xsl:for-each>
      </field>
    </form>
    </xsl:for-each>
  </xsl:template> 
</xsl:stylesheet>
