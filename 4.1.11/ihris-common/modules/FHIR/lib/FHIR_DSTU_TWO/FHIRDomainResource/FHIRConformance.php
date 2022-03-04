<?php namespace FHIR_DSTU_TWO\FHIRDomainResource;

/*!
 * This class was generated with the PHPFHIR library (https://github.com/dcarbone/php-fhir) using
 * class definitions from HL7 FHIR (https://www.hl7.org/fhir/)
 * 
 * Class creation date: May 13th, 2016
 * 
 * PHPFHIR Copyright:
 * 
 * Copyright 2016 Daniel Carbone (daniel.p.carbone@gmail.com)
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *        http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * 
 *
 * FHIR Copyright Notice:
 *
 *   Copyright (c) 2011+, HL7, Inc.
 *   All rights reserved.
 * 
 *   Redistribution and use in source and binary forms, with or without modification,
 *   are permitted provided that the following conditions are met:
 * 
 *    * Redistributions of source code must retain the above copyright notice, this
 *      list of conditions and the following disclaimer.
 *    * Redistributions in binary form must reproduce the above copyright notice,
 *      this list of conditions and the following disclaimer in the documentation
 *      and/or other materials provided with the distribution.
 *    * Neither the name of HL7 nor the names of its contributors may be used to
 *      endorse or promote products derived from this software without specific
 *      prior written permission.
 * 
 *   THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 *   ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 *   WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED.
 *   IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT,
 *   INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT
 *   NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR
 *   PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY,
 *   WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 *   ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 *   POSSIBILITY OF SUCH DAMAGE.
 * 
 * 
 *   Generated on Sat, Oct 24, 2015 07:41+1100 for FHIR v1.0.2
 * 
 *   Note: the schemas & schematrons do not contain all of the rules about what makes resources
 *   valid. Implementers will still need to be familiar with the content of the specification and with
 *   any profiles that apply to the resources in order to make a conformant implementation.
 * 
 */

use FHIR_DSTU_TWO\FHIRResource\FHIRDomainResource;
use FHIR_DSTU_TWO\JsonSerializable;

/**
 * A conformance statement is a set of capabilities of a FHIR Server that may be used as a statement of actual server functionality or a statement of required or desired server implementation.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRConformance extends FHIRDomainResource implements JsonSerializable
{
    /**
     * An absolute URL that is used to identify this conformance statement when it is referenced in a specification, model, design or an instance. This SHALL be a URL, SHOULD be globally unique, and SHOULD be an address at which this conformance statement is (or will be) published.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRUri
     */
    public $url = null;

    /**
     * The identifier that is used to identify this version of the conformance statement when it is referenced in a specification, model, design or instance. This is an arbitrary value managed by the profile author manually and the value should be a timestamp.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $version = null;

    /**
     * A free text natural language name identifying the conformance statement.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $name = null;

    /**
     * The status of this conformance statement.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCode
     */
    public $status = null;

    /**
     * A flag to indicate that this conformance statement is authored for testing purposes (or education/evaluation/marketing), and is not intended to be used for genuine usage.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRBoolean
     */
    public $experimental = null;

    /**
     * The name of the individual or organization that published the conformance.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $publisher = null;

    /**
     * Contacts to assist a user in finding and communicating with the publisher.
     * @var \FHIR_DSTU_TWO\FHIRResource\FHIRConformance\FHIRConformanceContact[]
     */
    public $contact = array();

    /**
     * The date  (and optionally time) when the conformance statement was published. The date must change when the business version changes, if it does, and it must change if the status code changes. In addition, it should change when the substantive content of the conformance statement changes.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime
     */
    public $date = null;

    /**
     * A free text natural language description of the conformance statement and its use. Typically, this is used when the conformance statement describes a desired rather than an actual solution, for example as a formal expression of requirements as part of an RFP.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $description = null;

    /**
     * Explains why this conformance statement is needed and why it's been constrained as it has.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $requirements = null;

    /**
     * A copyright statement relating to the conformance statement and/or its contents. Copyright statements are generally legal restrictions on the use and publishing of the details of the system described by the conformance statement.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $copyright = null;

    /**
     * The way that this statement is intended to be used, to describe an actual running instance of software, a particular product (kind not instance of software) or a class of implementation (e.g. a desired purchase).
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRConformanceStatementKind
     */
    public $kind = null;

    /**
     * Software that is covered by this conformance statement.  It is used when the conformance statement describes the capabilities of a particular software version, independent of an installation.
     * @var \FHIR_DSTU_TWO\FHIRResource\FHIRConformance\FHIRConformanceSoftware
     */
    public $software = null;

    /**
     * Identifies a specific implementation instance that is described by the conformance statement - i.e. a particular installation, rather than the capabilities of a software program.
     * @var \FHIR_DSTU_TWO\FHIRResource\FHIRConformance\FHIRConformanceImplementation
     */
    public $implementation = null;

    /**
     * The version of the FHIR specification on which this conformance statement is based.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRId
     */
    public $fhirVersion = null;

    /**
     * A code that indicates whether the application accepts unknown elements or extensions when reading resources.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRUnknownContentCode
     */
    public $acceptUnknown = null;

    /**
     * A list of the formats supported by this implementation using their content types.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCode[]
     */
    public $format = array();

    /**
     * A list of profiles that represent different use cases supported by the system. For a server, "supported by the system" means the system hosts/produces a set of resources that are conformant to a particular profile, and allows clients that use its services to search using this profile and to find appropriate data. For a client, it means the system will search by this profile and process data according to the guidance implicit in the profile. See further discussion in [Using Profiles]{profiling.html#profile-uses}.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference[]
     */
    public $profile = array();

    /**
     * A definition of the restful capabilities of the solution, if any.
     * @var \FHIR_DSTU_TWO\FHIRResource\FHIRConformance\FHIRConformanceRest[]
     */
    public $rest = array();

    /**
     * A description of the messaging capabilities of the solution.
     * @var \FHIR_DSTU_TWO\FHIRResource\FHIRConformance\FHIRConformanceMessaging[]
     */
    public $messaging = array();

    /**
     * A document definition.
     * @var \FHIR_DSTU_TWO\FHIRResource\FHIRConformance\FHIRConformanceDocument[]
     */
    public $document = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'Conformance';

    /**
     * An absolute URL that is used to identify this conformance statement when it is referenced in a specification, model, design or an instance. This SHALL be a URL, SHOULD be globally unique, and SHOULD be an address at which this conformance statement is (or will be) published.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRUri
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * An absolute URL that is used to identify this conformance statement when it is referenced in a specification, model, design or an instance. This SHALL be a URL, SHOULD be globally unique, and SHOULD be an address at which this conformance statement is (or will be) published.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRUri $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * The identifier that is used to identify this version of the conformance statement when it is referenced in a specification, model, design or instance. This is an arbitrary value managed by the profile author manually and the value should be a timestamp.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * The identifier that is used to identify this version of the conformance statement when it is referenced in a specification, model, design or instance. This is an arbitrary value managed by the profile author manually and the value should be a timestamp.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $version
     * @return $this
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * A free text natural language name identifying the conformance statement.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * A free text natural language name identifying the conformance statement.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * The status of this conformance statement.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCode
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * The status of this conformance statement.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCode $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * A flag to indicate that this conformance statement is authored for testing purposes (or education/evaluation/marketing), and is not intended to be used for genuine usage.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRBoolean
     */
    public function getExperimental()
    {
        return $this->experimental;
    }

    /**
     * A flag to indicate that this conformance statement is authored for testing purposes (or education/evaluation/marketing), and is not intended to be used for genuine usage.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRBoolean $experimental
     * @return $this
     */
    public function setExperimental($experimental)
    {
        $this->experimental = $experimental;
        return $this;
    }

    /**
     * The name of the individual or organization that published the conformance.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * The name of the individual or organization that published the conformance.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $publisher
     * @return $this
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
        return $this;
    }

    /**
     * Contacts to assist a user in finding and communicating with the publisher.
     * @return \FHIR_DSTU_TWO\FHIRResource\FHIRConformance\FHIRConformanceContact[]
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Contacts to assist a user in finding and communicating with the publisher.
     * @param \FHIR_DSTU_TWO\FHIRResource\FHIRConformance\FHIRConformanceContact[] $contact
     * @return $this
     */
    public function addContact($contact)
    {
        $this->contact[] = $contact;
        return $this;
    }

    /**
     * The date  (and optionally time) when the conformance statement was published. The date must change when the business version changes, if it does, and it must change if the status code changes. In addition, it should change when the substantive content of the conformance statement changes.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * The date  (and optionally time) when the conformance statement was published. The date must change when the business version changes, if it does, and it must change if the status code changes. In addition, it should change when the substantive content of the conformance statement changes.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime $date
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * A free text natural language description of the conformance statement and its use. Typically, this is used when the conformance statement describes a desired rather than an actual solution, for example as a formal expression of requirements as part of an RFP.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * A free text natural language description of the conformance statement and its use. Typically, this is used when the conformance statement describes a desired rather than an actual solution, for example as a formal expression of requirements as part of an RFP.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Explains why this conformance statement is needed and why it's been constrained as it has.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getRequirements()
    {
        return $this->requirements;
    }

    /**
     * Explains why this conformance statement is needed and why it's been constrained as it has.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $requirements
     * @return $this
     */
    public function setRequirements($requirements)
    {
        $this->requirements = $requirements;
        return $this;
    }

    /**
     * A copyright statement relating to the conformance statement and/or its contents. Copyright statements are generally legal restrictions on the use and publishing of the details of the system described by the conformance statement.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getCopyright()
    {
        return $this->copyright;
    }

    /**
     * A copyright statement relating to the conformance statement and/or its contents. Copyright statements are generally legal restrictions on the use and publishing of the details of the system described by the conformance statement.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $copyright
     * @return $this
     */
    public function setCopyright($copyright)
    {
        $this->copyright = $copyright;
        return $this;
    }

    /**
     * The way that this statement is intended to be used, to describe an actual running instance of software, a particular product (kind not instance of software) or a class of implementation (e.g. a desired purchase).
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRConformanceStatementKind
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * The way that this statement is intended to be used, to describe an actual running instance of software, a particular product (kind not instance of software) or a class of implementation (e.g. a desired purchase).
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRConformanceStatementKind $kind
     * @return $this
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
        return $this;
    }

    /**
     * Software that is covered by this conformance statement.  It is used when the conformance statement describes the capabilities of a particular software version, independent of an installation.
     * @return \FHIR_DSTU_TWO\FHIRResource\FHIRConformance\FHIRConformanceSoftware
     */
    public function getSoftware()
    {
        return $this->software;
    }

    /**
     * Software that is covered by this conformance statement.  It is used when the conformance statement describes the capabilities of a particular software version, independent of an installation.
     * @param \FHIR_DSTU_TWO\FHIRResource\FHIRConformance\FHIRConformanceSoftware $software
     * @return $this
     */
    public function setSoftware($software)
    {
        $this->software = $software;
        return $this;
    }

    /**
     * Identifies a specific implementation instance that is described by the conformance statement - i.e. a particular installation, rather than the capabilities of a software program.
     * @return \FHIR_DSTU_TWO\FHIRResource\FHIRConformance\FHIRConformanceImplementation
     */
    public function getImplementation()
    {
        return $this->implementation;
    }

    /**
     * Identifies a specific implementation instance that is described by the conformance statement - i.e. a particular installation, rather than the capabilities of a software program.
     * @param \FHIR_DSTU_TWO\FHIRResource\FHIRConformance\FHIRConformanceImplementation $implementation
     * @return $this
     */
    public function setImplementation($implementation)
    {
        $this->implementation = $implementation;
        return $this;
    }

    /**
     * The version of the FHIR specification on which this conformance statement is based.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRId
     */
    public function getFhirVersion()
    {
        return $this->fhirVersion;
    }

    /**
     * The version of the FHIR specification on which this conformance statement is based.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRId $fhirVersion
     * @return $this
     */
    public function setFhirVersion($fhirVersion)
    {
        $this->fhirVersion = $fhirVersion;
        return $this;
    }

    /**
     * A code that indicates whether the application accepts unknown elements or extensions when reading resources.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRUnknownContentCode
     */
    public function getAcceptUnknown()
    {
        return $this->acceptUnknown;
    }

    /**
     * A code that indicates whether the application accepts unknown elements or extensions when reading resources.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRUnknownContentCode $acceptUnknown
     * @return $this
     */
    public function setAcceptUnknown($acceptUnknown)
    {
        $this->acceptUnknown = $acceptUnknown;
        return $this;
    }

    /**
     * A list of the formats supported by this implementation using their content types.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCode[]
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * A list of the formats supported by this implementation using their content types.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCode[] $format
     * @return $this
     */
    public function addFormat($format)
    {
        $this->format[] = $format;
        return $this;
    }

    /**
     * A list of profiles that represent different use cases supported by the system. For a server, "supported by the system" means the system hosts/produces a set of resources that are conformant to a particular profile, and allows clients that use its services to search using this profile and to find appropriate data. For a client, it means the system will search by this profile and process data according to the guidance implicit in the profile. See further discussion in [Using Profiles]{profiling.html#profile-uses}.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference[]
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * A list of profiles that represent different use cases supported by the system. For a server, "supported by the system" means the system hosts/produces a set of resources that are conformant to a particular profile, and allows clients that use its services to search using this profile and to find appropriate data. For a client, it means the system will search by this profile and process data according to the guidance implicit in the profile. See further discussion in [Using Profiles]{profiling.html#profile-uses}.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference[] $profile
     * @return $this
     */
    public function addProfile($profile)
    {
        $this->profile[] = $profile;
        return $this;
    }

    /**
     * A definition of the restful capabilities of the solution, if any.
     * @return \FHIR_DSTU_TWO\FHIRResource\FHIRConformance\FHIRConformanceRest[]
     */
    public function getRest()
    {
        return $this->rest;
    }

    /**
     * A definition of the restful capabilities of the solution, if any.
     * @param \FHIR_DSTU_TWO\FHIRResource\FHIRConformance\FHIRConformanceRest[] $rest
     * @return $this
     */
    public function addRest($rest)
    {
        $this->rest[] = $rest;
        return $this;
    }

    /**
     * A description of the messaging capabilities of the solution.
     * @return \FHIR_DSTU_TWO\FHIRResource\FHIRConformance\FHIRConformanceMessaging[]
     */
    public function getMessaging()
    {
        return $this->messaging;
    }

    /**
     * A description of the messaging capabilities of the solution.
     * @param \FHIR_DSTU_TWO\FHIRResource\FHIRConformance\FHIRConformanceMessaging[] $messaging
     * @return $this
     */
    public function addMessaging($messaging)
    {
        $this->messaging[] = $messaging;
        return $this;
    }

    /**
     * A document definition.
     * @return \FHIR_DSTU_TWO\FHIRResource\FHIRConformance\FHIRConformanceDocument[]
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * A document definition.
     * @param \FHIR_DSTU_TWO\FHIRResource\FHIRConformance\FHIRConformanceDocument[] $document
     * @return $this
     */
    public function addDocument($document)
    {
        $this->document[] = $document;
        return $this;
    }

    /**
     * @return string
     */
    public function get_fhirElementName()
    {
        return $this->_fhirElementName;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->get_fhirElementName();
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $json = parent::jsonSerialize();
        $json['resourceType'] = $this->_fhirElementName;
        if (null !== $this->url) $json['url'] = $this->url->jsonSerialize();
        if (null !== $this->version) $json['version'] = $this->version->jsonSerialize();
        if (null !== $this->name) $json['name'] = $this->name->jsonSerialize();
        if (null !== $this->status) $json['status'] = $this->status->jsonSerialize();
        if (null !== $this->experimental) $json['experimental'] = $this->experimental->jsonSerialize();
        if (null !== $this->publisher) $json['publisher'] = $this->publisher->jsonSerialize();
        if (0 < count($this->contact)) {
            $json['contact'] = array();
            foreach($this->contact as $contact) {
                $json['contact'][] = $contact->jsonSerialize();
            }
        }
        if (null !== $this->date) $json['date'] = $this->date->jsonSerialize();
        if (null !== $this->description) $json['description'] = $this->description->jsonSerialize();
        if (null !== $this->requirements) $json['requirements'] = $this->requirements->jsonSerialize();
        if (null !== $this->copyright) $json['copyright'] = $this->copyright->jsonSerialize();
        if (null !== $this->kind) $json['kind'] = $this->kind->jsonSerialize();
        if (null !== $this->software) $json['software'] = $this->software->jsonSerialize();
        if (null !== $this->implementation) $json['implementation'] = $this->implementation->jsonSerialize();
        if (null !== $this->fhirVersion) $json['fhirVersion'] = $this->fhirVersion->jsonSerialize();
        if (null !== $this->acceptUnknown) $json['acceptUnknown'] = $this->acceptUnknown->jsonSerialize();
        if (0 < count($this->format)) {
            $json['format'] = array();
            foreach($this->format as $format) {
                $json['format'][] = $format->jsonSerialize();
            }
        }
        if (0 < count($this->profile)) {
            $json['profile'] = array();
            foreach($this->profile as $profile) {
                $json['profile'][] = $profile->jsonSerialize();
            }
        }
        if (0 < count($this->rest)) {
            $json['rest'] = array();
            foreach($this->rest as $rest) {
                $json['rest'][] = $rest->jsonSerialize();
            }
        }
        if (0 < count($this->messaging)) {
            $json['messaging'] = array();
            foreach($this->messaging as $messaging) {
                $json['messaging'][] = $messaging->jsonSerialize();
            }
        }
        if (0 < count($this->document)) {
            $json['document'] = array();
            foreach($this->document as $document) {
                $json['document'][] = $document->jsonSerialize();
            }
        }
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<Conformance xmlns="http://hl7.org/fhir"></Conformance>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->url) $this->url->xmlSerialize(true, $sxe->addChild('url'));
        if (null !== $this->version) $this->version->xmlSerialize(true, $sxe->addChild('version'));
        if (null !== $this->name) $this->name->xmlSerialize(true, $sxe->addChild('name'));
        if (null !== $this->status) $this->status->xmlSerialize(true, $sxe->addChild('status'));
        if (null !== $this->experimental) $this->experimental->xmlSerialize(true, $sxe->addChild('experimental'));
        if (null !== $this->publisher) $this->publisher->xmlSerialize(true, $sxe->addChild('publisher'));
        if (0 < count($this->contact)) {
            foreach($this->contact as $contact) {
                $contact->xmlSerialize(true, $sxe->addChild('contact'));
            }
        }
        if (null !== $this->date) $this->date->xmlSerialize(true, $sxe->addChild('date'));
        if (null !== $this->description) $this->description->xmlSerialize(true, $sxe->addChild('description'));
        if (null !== $this->requirements) $this->requirements->xmlSerialize(true, $sxe->addChild('requirements'));
        if (null !== $this->copyright) $this->copyright->xmlSerialize(true, $sxe->addChild('copyright'));
        if (null !== $this->kind) $this->kind->xmlSerialize(true, $sxe->addChild('kind'));
        if (null !== $this->software) $this->software->xmlSerialize(true, $sxe->addChild('software'));
        if (null !== $this->implementation) $this->implementation->xmlSerialize(true, $sxe->addChild('implementation'));
        if (null !== $this->fhirVersion) $this->fhirVersion->xmlSerialize(true, $sxe->addChild('fhirVersion'));
        if (null !== $this->acceptUnknown) $this->acceptUnknown->xmlSerialize(true, $sxe->addChild('acceptUnknown'));
        if (0 < count($this->format)) {
            foreach($this->format as $format) {
                $format->xmlSerialize(true, $sxe->addChild('format'));
            }
        }
        if (0 < count($this->profile)) {
            foreach($this->profile as $profile) {
                $profile->xmlSerialize(true, $sxe->addChild('profile'));
            }
        }
        if (0 < count($this->rest)) {
            foreach($this->rest as $rest) {
                $rest->xmlSerialize(true, $sxe->addChild('rest'));
            }
        }
        if (0 < count($this->messaging)) {
            foreach($this->messaging as $messaging) {
                $messaging->xmlSerialize(true, $sxe->addChild('messaging'));
            }
        }
        if (0 < count($this->document)) {
            foreach($this->document as $document) {
                $document->xmlSerialize(true, $sxe->addChild('document'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}