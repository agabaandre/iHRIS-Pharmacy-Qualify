<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:csd="urn:ihe:iti:csd:2013"
    xmlns:str="http://exslt.org/strings"
    xmlns:exsl="http://exslt.org/common"
    exclude-result-prefixes="xs"
    version="1.0">


  <xsl:param name="rootProviderURN"/>
  <xsl:param name="rootFacilityURN"/>
  <xsl:param name="rootOrganizationURN"/>
  <xsl:param name="sourceDirectory"/>
  <xsl:param name="currentDateTime"/>
  <xsl:param name="cadreCodingScheme"/>
  <xsl:param name="id_typeCodingScheme"/>


  <xsl:variable name="workContactPointScheme">urn:ihe:iti:csd:2013:contactPoint</xsl:variable> 
  <xsl:variable name="workAddressType">Practice</xsl:variable>
  <xsl:variable name="homeAddressType">Home</xsl:variable>
  <xsl:variable name="workMobileType">BP</xsl:variable> 
  <xsl:variable name="workPhoneType">BP</xsl:variable> 
  <xsl:variable name="workFaxType">FAX</xsl:variable> 
  <xsl:variable name="workEmailType">EMAIL</xsl:variable>


  <xsl:output method="xml" omit-xml-declaration="yes"/>

  
  <xsl:output method="xml" version="1.0" encoding="UTF-8" indent="yes"/>

  <xsl:template match="/">
          
     <xsl:for-each select="/relationship | /relationshipCollection/relationship">
      <xsl:variable name="providerurn">urn:uuid:<xsl:value-of select="normalize-space(form[@name='person']/field[@name='csd_uuid']/text())"/></xsl:variable>
      <xsl:variable name="workContact" select="joinedForms/joinedForm[@report_form_name='person_contact_work']"/>
      <xsl:variable name="homeContact" select="joinedForms/joinedForm[@report_form_name='person_contact_personal']"/>
      <xsl:variable name="demographic" select="joinedForms/joinedForm[@report_form_name='demographic']"/>
      <xsl:variable name="trainings" select="joinedForms/joinedForm[@report_form_name='training']"/>
      <xsl:variable name="deployments" select="joinedForms/joinedForm[@report_form_name='deployment']"/>
      <xsl:variable name="person_ids" select="joinedForms/joinedForm[@form='person_id']"/>            
      <xsl:variable name="modified"><xsl:value-of select="$currentDateTime"/></xsl:variable>
      <xsl:variable name='created'><xsl:value-of select="translate(form[@name='person']/@created,' ','T')"/></xsl:variable>
      
      <csd:provider>                           
        <xsl:attribute name="entityID"><xsl:value-of select="$providerurn"/></xsl:attribute>
	
	<csd:otherID>
	  <xsl:attribute name='assigningAuthorityName'><xsl:value-of select="$sourceDirectory"/></xsl:attribute>
	  <xsl:attribute name='code'>urn:ihris.org:form:person</xsl:attribute>
	  <xsl:value-of select="normalize-space(string(form[@name='person']/@id))"/>
	</csd:otherID>

        <xsl:for-each select="$person_ids">                        
	  <xsl:variable name='idnum'><xsl:value-of select="normalize-space(form[@name='person_id']/field[@name='id_num']/text())"/></xsl:variable>
	  <xsl:variable name='idcode'><xsl:value-of select="normalize-space(form[@name='person_id']/field[@name='id_type']/value/text())"/></xsl:variable>
	  <!-- SHOULD REALLY BE A CODE-->
          <xsl:variable name='issue_Y'><xsl:value-of select="normalize-space(form[@name='person_id']/field[@name='issue_date']/year/text())"/></xsl:variable>
          <xsl:variable name='issue_M'><xsl:value-of select="normalize-space(form[@name='person_id']/field[@name='issue_date']/month/text())"/></xsl:variable>
          <xsl:variable name='issue_D'><xsl:value-of select="normalize-space(form[@name='person_id']/field[@name='issue_date']/day/text())"/></xsl:variable>
          <xsl:variable name='issue'>
            <xsl:if test="issue_Y != '' and issue_Y != '0' and issue_M != '' and issue_M != '0'  and issue_D != '' and issue_D != '0'  ">
              <xsl:value-of select="$issue_Y"/>-<xsl:value-of select="$issue_M"/>-<xsl:value-of select="$issue_D"/>
            </xsl:if>
          </xsl:variable>
          <xsl:variable name='expire_Y'><xsl:value-of select="normalize-space(form[@name='person_id']/field[@name='expire_date']/year/text())"/></xsl:variable>
          <xsl:variable name='expire_M'><xsl:value-of select="normalize-space(form[@name='person_id']/field[@name='expire_date']/month/text())"/></xsl:variable>
          <xsl:variable name='expire_D'><xsl:value-of select="normalize-space(form[@name='person_id']/field[@name='expire_date']/day/text())"/></xsl:variable>
          <xsl:variable name='expire'>
            <xsl:if test="expire_Y != '' and expire_Y != '0' and expire_M != '' and expire_M != '0'  and expire_D != '' and expire_D != '0'  ">
              <xsl:value-of select="$expire_Y"/>-<xsl:value-of select="$expire_M"/>-<xsl:value-of select="$expire_D"/>
            </xsl:if>
          </xsl:variable>

	  <xsl:if test="$idnum != '' and $idcode != ''">
	    <csd:otherID>
	      <xsl:attribute name='assigningAuthorityName'><xsl:value-of select="$id_typeCodingScheme"/></xsl:attribute>
	      <xsl:attribute name='code'><xsl:value-of select="$idcode"/></xsl:attribute>
	      <xsl:if test="$issue">
		<xsl:attribute name='issueDate'><xsl:value-of select='$issue'/></xsl:attribute>
	      </xsl:if>
	      <xsl:if test="$expire">
		<xsl:attribute name='expirationDate'><xsl:value-of select='$expire'/></xsl:attribute>
	      </xsl:if>
	      <xsl:value-of select="$idnum"/>

	    </csd:otherID>
	  </xsl:if>
	</xsl:for-each>



        <xsl:for-each select="joinedForms/joinedForm[@report_form_name='training' and count(joinedForms/joinedForm[@report_form_name='license']) > 0]">
	  <xsl:variable name='cadreid' select="form[@name='training']/field[@name='cadre']/value"/>
	  <xsl:if test="$cadreid != ''">
	    <csd:codedType>
              <xsl:attribute name="code"><xsl:value-of select="$cadreid"/></xsl:attribute>
	      <xsl:attribute name="codingSchema"><xsl:value-of select="$cadreCodingScheme"/></xsl:attribute>
            </csd:codedType>
	  </xsl:if>
	</xsl:for-each>



        <csd:demographic>
          <csd:name>
            <xsl:variable name='surname'><xsl:value-of select="normalize-space(form[@name='person']/field[@name='surname']/text())"/></xsl:variable>
            <xsl:variable name='othername'><xsl:value-of select="normalize-space(form[@name='person']/field[@name='othername']/text())"/></xsl:variable>
            <xsl:variable name='forename'><xsl:value-of select="normalize-space(form[@name='person']/field[@name='firstname']/text())"/></xsl:variable>
            <xsl:variable name='maiden'><xsl:value-of select="normalize-space(joinedForms/joinedForm[@report_form_name='maiden']/text())"/></xsl:variable>
            <xsl:if test="$forename != '' and $surname != ''">
              <xsl:if test="$othername != '' ">
                <csd:commonName><xsl:value-of select="$forename"/><xsl:text> </xsl:text><xsl:value-of select="$othername"/><xsl:text> </xsl:text><xsl:value-of select="$surname"/></csd:commonName>
                <csd:commonName><xsl:value-of select="$othername"/><xsl:text> </xsl:text><xsl:value-of select="$surname"/></csd:commonName>
              </xsl:if>
              <csd:commonName><xsl:value-of select="$forename"/><xsl:text> </xsl:text><xsl:value-of select="$surname"/></csd:commonName>
            </xsl:if>                               
            <xsl:if test="$surname != ''">
              <csd:commonName><xsl:value-of select="$surname"/></csd:commonName>            
            </xsl:if>                                
            <xsl:if test="$maiden != ''">
	      <csd:othername type='maiden'><xsl:value-of select="$maiden"/></csd:othername>
            </xsl:if>
            <xsl:if test="$othername != ''">
	      <csd:othername type='other_1'><xsl:value-of select="$othername"/></csd:othername>
            </xsl:if>
            <xsl:if test="$forename != ''">
              <csd:forename><xsl:value-of select="$forename"/></csd:forename>
            </xsl:if>                               
            <xsl:if test="$surname != ''">
              <csd:surname><xsl:value-of select="$surname"/></csd:surname>
            </xsl:if>
          </csd:name>
          <xsl:variable name="workAddress"><xsl:value-of select="normalize-space($workContact/form[@name='person_contact_work']/field[@name='address']/text())"/></xsl:variable>
          <xsl:variable name="homeAddress"><xsl:value-of select="normalize-space($homeContact/form[@name='person_contact_personal']/field[@name='address']/text())"/></xsl:variable>
          <xsl:variable name='telephone'><xsl:value-of select="normalize-space($workContact/form[@name='person_contact_work']/field[@name='telephone']/text())"/></xsl:variable>
          <xsl:variable name='home_telephone'><xsl:value-of select="normalize-space($homeContact/form[@name='person_contact_personal']/field[@name='telephone']/text())"/></xsl:variable>
          <xsl:variable name='home_alt_telephone'><xsl:value-of select="normalize-space($homeContact/form[@name='person_contact_personal']/field[@name='alt_telephone']/text())"/></xsl:variable>
          <xsl:variable name='alt_telephone'><xsl:value-of select="normalize-space($workContact/form[@name='person_contact_work']/field[@name='alt_telephone']/text())"/></xsl:variable>
          <xsl:variable name='mobile'><xsl:value-of select="normalize-space($workContact/form[@name='person_contact_work']/field[@name='mobile_phone']/text())"/></xsl:variable>
          <xsl:variable name='fax'><xsl:value-of select="normalize-space($workContact/form[@name='person_contact_work']/field[@name='fax']/text())"/></xsl:variable>                                  
          <xsl:variable name='email'><xsl:value-of select="normalize-space($workContact/form[@name='person_contact_work']/field[@name='email']/text())"/></xsl:variable>      

          <xsl:variable name='gender'><xsl:value-of select="normalize-space($demographic/form[@name='demographic']/field[@name='gender']/value/text())"/></xsl:variable>
          <xsl:variable name='dob_Y'><xsl:value-of select="normalize-space($demographic/form[@name='demographic']/field[@name='bith_date']/year/text())"/></xsl:variable>
          <xsl:variable name='dob_M'><xsl:value-of select="normalize-space($demographic/form[@name='demographic']/field[@name='bith_date']/month/text())"/></xsl:variable>
          <xsl:variable name='dob_D'><xsl:value-of select="normalize-space($demographic/form[@name='demographic']/field[@name='bith_date']/day/text())"/></xsl:variable>
          <xsl:variable name='dob'>
            <xsl:if test="dob_Y != '' and dob_Y != '0' and dob_M != '' and dob_M != '0'  and dob_D != '' and dob_D != '0'  ">
              <xsl:value-of select="$dob_Y"/>-<xsl:value-of select="$dob_M"/>-<xsl:value-of select="$dob_D"/>
            </xsl:if>
          </xsl:variable>


          <xsl:if test="$mobile != ''">
            <csd:contactPoint><csd:codedType>
              <xsl:attribute name='codingScheme'><xsl:value-of select="$workContactPointScheme"/></xsl:attribute>
              <xsl:attribute name="code"><xsl:value-of select="$workMobileType"/></xsl:attribute>
              <xsl:value-of select="$mobile"/>
            </csd:codedType></csd:contactPoint>
          </xsl:if>                       
          <xsl:if test="$telephone !=''">
            <csd:contactPoint><csd:codedType>
              <xsl:attribute name='codingScheme'><xsl:value-of select="$workContactPointScheme"/></xsl:attribute>
              <xsl:attribute name="code"><xsl:value-of select="$workPhoneType"/></xsl:attribute>
              <xsl:value-of select="$telephone"/>
            </csd:codedType></csd:contactPoint>
          </xsl:if>
          <xsl:if test="$home_telephone !=''">
            <csd:contactPoint><csd:codedType>
              <xsl:attribute name='codingScheme'><xsl:value-of select="$workContactPointScheme"/></xsl:attribute>
              <xsl:attribute name="code"><xsl:value-of select="$workPhoneType"/></xsl:attribute>
              <xsl:value-of select="$home_telephone"/>
            </csd:codedType></csd:contactPoint>
          </xsl:if>
          <xsl:if test="$alt_telephone !=''">
            <csd:contactPoint><csd:codedType>
              <xsl:attribute name='codingScheme'><xsl:value-of select="$workContactPointScheme"/></xsl:attribute>
              <xsl:attribute name="code"><xsl:value-of select="$workPhoneType"/></xsl:attribute>
              <xsl:value-of select="$alt_telephone"/>
            </csd:codedType></csd:contactPoint>
          </xsl:if>
          <xsl:if test="$home_alt_telephone !=''">
            <csd:contactPoint><csd:codedType>
              <xsl:attribute name='codingScheme'><xsl:value-of select="$workContactPointScheme"/></xsl:attribute>
              <xsl:attribute name="code"><xsl:value-of select="$workPhoneType"/></xsl:attribute>
              <xsl:value-of select="$home_alt_telephone"/>
            </csd:codedType></csd:contactPoint>
          </xsl:if>
          <xsl:if test="$fax != ''">
            <csd:contactPoint><csd:codedType>
              <xsl:attribute name='codingScheme'><xsl:value-of select="$workContactPointScheme"/></xsl:attribute>
              <xsl:attribute name="code"><xsl:value-of select="$workFaxType"/></xsl:attribute>
              <xsl:value-of select="$fax"/>
            </csd:codedType></csd:contactPoint>
          </xsl:if>
          <xsl:if test="$email != ''">
            <csd:contactPoint><csd:codedType>
              <xsl:attribute name='codingScheme'><xsl:value-of select="$workContactPointScheme"/></xsl:attribute>
              <xsl:attribute name="code"><xsl:value-of select="$workEmailType"/></xsl:attribute>
              <xsl:value-of select="$email"/>
            </csd:codedType></csd:contactPoint>
          </xsl:if>
          <xsl:if test="$workAddress !=''">
            <csd:address><csd:codedType>
              <xsl:attribute name='type'><xsl:value-of select='$workAddressType'/></xsl:attribute>
              <csd:addressLine component='all'><xsl:value-of select="$workAddress"/></csd:addressLine>
            </csd:codedType></csd:address>
          </xsl:if>
          <xsl:if test="$homeAddress !=''">
            <csd:address><csd:codedType>
              <xsl:attribute name='type'><xsl:value-of select='$homeAddressType'/></xsl:attribute>
              <csd:addressLine component='all'><xsl:value-of select="$homeAddress"/></csd:addressLine>
            </csd:codedType></csd:address>
          </xsl:if>
          <xsl:if test="$gender != ''">
            <csd:gender><xsl:value-of select="$gender"/></csd:gender>
          </xsl:if>
          <xsl:if test="$dob !=''">
            <csd:dateOfBirth><xsl:value-of select="$dob"/></csd:dateOfBirth>
          </xsl:if>
        </csd:demographic>
        <csd:facilities>
          <xsl:for-each select="$deployments">
            <xsl:variable name="facility_id" select="normalize-space(./form[@name='deployment']/field[@name='health_facility']/value/text())"/>

            <xsl:variable name="facility_urn"><xsl:value-of select="$rootFacilityURN"/>:facility:<xsl:value-of select="$facility_id"/></xsl:variable>
            <xsl:variable name='start_date_Y'><xsl:value-of select="normalize-space(./form[@name='deployment']/field[@name='deployment_date']/year/text())"/></xsl:variable>
            <xsl:variable name='start_date_M'><xsl:value-of select="normalize-space(./form[@name='deployment']/field[@name='deployment_date']/month/text())"/></xsl:variable>
            <xsl:variable name='start_date_D'><xsl:value-of select="normalize-space(./form[@name='deployment']/field[@name='deployment_date']/day/text())"/></xsl:variable>
            <xsl:variable name='start_date'>
              <xsl:if test="$start_date_D != '' and  $start_date_D != '0' and $start_date_M !='' and $start_date_M != '0' and $start_date_Y!='' and $start_date_Y != '0'">
                <xsl:value-of select="$start_date_Y"/>-<xsl:value-of select="$start_date_M"/>-<xsl:value-of select="$start_date_D"/>
              </xsl:if>
            </xsl:variable>
            <xsl:if test="$facility_id!=''">
              <csd:facility>
                <xsl:attribute name="urn"><xsl:value-of select="$facility_urn"/></xsl:attribute>
                <xsl:if test="$start_date_D!='' and $start_date_D != '0'">
                  <csd:operatingDate>
                    <csd:beginEffectiveDate><xsl:value-of select="$start_date"/></csd:beginEffectiveDate>
                  </csd:operatingDate>
                </xsl:if>
              </csd:facility>
            </xsl:if>
          </xsl:for-each>
        </csd:facilities>
        <xsl:for-each select="$trainings">
	  <xsl:variable name='cadreid' select="form[@name='training']/field[@name='cadre']/value"/>
	  <xsl:if test='$cadreid'>
	    <xsl:variable name="licenses" select="joinedForms/joinedForm[@report_form_name='license']"/>
	    <xsl:for-each select="$licenses">
	      <xsl:variable name='license' select="form[@name='license']/field[@name='license_number']"/>
              <xsl:variable name='start_date_Y'><xsl:value-of select="normalize-space(./form[@name='license']/field[@name='start_date']/year/text())"/></xsl:variable>
              <xsl:variable name='start_date_M'><xsl:value-of select="normalize-space(./form[@name='license']/field[@name='start_date']/month/text())"/></xsl:variable>
              <xsl:variable name='start_date_D'><xsl:value-of select="normalize-space(./form[@name='license']/field[@name='start_date']/day/text())"/></xsl:variable>
              <xsl:variable name='start_date'>
                <xsl:if test="$start_date_D != '' and  $start_date_D != '0' and $start_date_M !='' and $start_date_M != '0' and $start_date_Y!='' and $start_date_Y != '0'">
                  <xsl:value-of select="$start_date_Y"/>-<xsl:value-of select="$start_date_M"/>-<xsl:value-of select="$start_date_D"/>
                </xsl:if>
              </xsl:variable>
              <xsl:variable name='end_date_Y'><xsl:value-of select="normalize-space(./form[@name='license']/field[@name='end_date']/year/text())"/></xsl:variable>
              <xsl:variable name='end_date_M'><xsl:value-of select="normalize-space(./form[@name='license']/field[@name='end_date']/month/text())"/></xsl:variable>
              <xsl:variable name='end_date_D'><xsl:value-of select="normalize-space(./form[@name='license']/field[@name='end_date']/day/text())"/></xsl:variable>
              <xsl:variable name='end_date'>
                <xsl:if test="$end_date_D != '' and  $end_date_D != '0' and $end_date_M !='' and $end_date_M != '0' and $end_date_Y!='' and $end_date_Y != '0'">
                  <xsl:value-of select="$end_date_Y"/>-<xsl:value-of select="$end_date_M"/>-<xsl:value-of select="$end_date_D"/>
                </xsl:if>
              </xsl:variable>
              <csd:credential>				
		<csd:codedType>
		  <xsl:attribute name="code"><xsl:value-of select="$cadreid"/></xsl:attribute>
		  <xsl:attribute name="codingSchema"><xsl:value-of select="$cadreCodingScheme"/></xsl:attribute>
		</csd:codedType>
		<xsl:if test="$license != ''"><csd:number><xsl:value-of select="$license"/></csd:number></xsl:if>
		<csd:issuingAuthority><xsl:value-of select="$sourceDirectory"/></csd:issuingAuthority>
		<xsl:if test="$start_date!=''"><csd:credentialIssueDate><xsl:value-of select="$start_date"/></csd:credentialIssueDate></xsl:if>
		<xsl:if test="$end_date !=''"><csd:credentialRenewalDate><xsl:value-of select="$end_date"/></csd:credentialRenewalDate></xsl:if>
              </csd:credential>
            </xsl:for-each>
	  </xsl:if>
        </xsl:for-each>	
	<csd:record>
	  <xsl:attribute name='created'><xsl:value-of select="$created"/></xsl:attribute>
	  <xsl:attribute name='updated'><xsl:value-of select="$modified"/></xsl:attribute>
	  <xsl:attribute name='sourceDirectory'><xsl:value-of select="$sourceDirectory"/></xsl:attribute>
	  <xsl:attribute name='status'>
	    <xsl:variable name='licenses' select="$trainings/joinedForms/joinedForm[@report_form_name='license']/form[@name='deployment']"/>
            <xsl:variable name='active_license'>
	      <xsl:for-each select="$licenses">
		<xsl:variable name='suspend'><xsl:value-of select="normalize-space(./field[@name='suspend']/text())"/></xsl:variable>
		<xsl:variable name="currentDate" select="translate(substring-before($currentDateTime, 'T'), '-','')"/>
		<xsl:variable name='end_date_M'><xsl:value-of select="normalize-space(./field[@name='deployment_date']/month/text())"/></xsl:variable>
                <xsl:variable name='end_date_D'><xsl:value-of select="normalize-space(./field[@name='deployment_date']/day/text())"/></xsl:variable>
                <xsl:variable name='end_date_Y'><xsl:value-of select="normalize-space(./field[@name='deployment_date']/year/text())"/></xsl:variable>
                <xsl:variable name='end_date'>
                  <xsl:if test="$end_date_D != '' and  $end_date_D != '0' and $end_date_M !='' and $end_date_M != '0' and $end_date_Y!='' and $end_date_Y != '0'">
                    <xsl:value-of select="$end_date_Y"/><xsl:value-of select="$end_date_M"/><xsl:value-of select="$end_date_D"/>
                  </xsl:if>
                </xsl:variable>
 		<xsl:choose>			      
		  <xsl:when test="not($suspend) 
				  and ( (not($end_date)) or ($end_date and $end_date  > $currentDate) )"
			    ><xsl:value-of select='.'/></xsl:when>
		  <xsl:otherwise/>
		</xsl:choose>
	      </xsl:for-each>
	    </xsl:variable>
	    <xsl:choose>			      
	      <xsl:when test="count($deployments) >  0  or count($active_license) > 0">106-001</xsl:when>
	      <xsl:otherwise>106-002</xsl:otherwise>
	    </xsl:choose>
	  </xsl:attribute>
	</csd:record>
      </csd:provider>
    </xsl:for-each>

  </xsl:template>
</xsl:stylesheet>
