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
 * A set of rules or how FHIR is used to solve a particular problem. This resource is used to gather all the parts of an implementation guide into a logical whole, and to publish a computable definition of all the parts.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRImplementationGuide extends FHIRDomainResource implements JsonSerializable
{
    /**
     * An absolute URL that is used to identify this implementation guide when it is referenced in a specification, model, design or an instance. This SHALL be a URL, SHOULD be globally unique, and SHOULD be an address at which this implementation guide is (or will be) published.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRUri
     */
    public $url = null;

    /**
     * The identifier that is used to identify this version of the Implementation Guide when it is referenced in a specification, model, design or instance. This is an arbitrary value managed by the Implementation Guide author manually.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $version = null;

    /**
     * A free text natural language name identifying the Implementation Guide.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $name = null;

    /**
     * The status of the Implementation Guide.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCode
     */
    public $status = null;

    /**
     * This Implementation Guide was authored for testing purposes (or education/evaluation/marketing), and is not intended to be used for genuine usage.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRBoolean
     */
    public $experimental = null;

    /**
     * The name of the individual or organization that published the implementation guide.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $publisher = null;

    /**
     * Contacts to assist a user in finding and communicating with the publisher.
     * @var \FHIR_DSTU_TWO\FHIRResource\FHIRImplementationGuide\FHIRImplementationGuideContact[]
     */
    public $contact = array();

    /**
     * The date this version of the implementation guide was published. The date must change when the business version changes, if it does, and it must change if the status code changes. In addition, it should change when the substantive content of the implementation guide changes.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime
     */
    public $date = null;

    /**
     * A free text natural language description of the Implementation Guide and its use.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $description = null;

    /**
     * The content was developed with a focus and intent of supporting the contexts that are listed. These terms may be used to assist with indexing and searching of implementation guides. The most common use of this element is to represent the country / jurisdiction for which this implementation guide was defined.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[]
     */
    public $useContext = array();

    /**
     * A copyright statement relating to the implementation guide and/or its contents. Copyright statements are generally legal restrictions on the use and publishing of the details of the constraints and mappings.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $copyright = null;

    /**
     * The version of the FHIR specification on which this ImplementationGuide is based - this is the formal version of the specification, without the revision number, e.g. [publication].[major].[minor], which is 1.0.2 for this version.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRId
     */
    public $fhirVersion = null;

    /**
     * Another implementation guide that this implementation depends on. Typically, an implementation guide uses value sets, profiles etc.defined in other implementation guides.
     * @var \FHIR_DSTU_TWO\FHIRResource\FHIRImplementationGuide\FHIRImplementationGuideDependency[]
     */
    public $dependency = array();

    /**
     * A logical group of resources. Logical groups can be used when building pages.
     * @var \FHIR_DSTU_TWO\FHIRResource\FHIRImplementationGuide\FHIRImplementationGuidePackage[]
     */
    public $package = array();

    /**
     * A set of profiles that all resources covered by this implementation guide must conform to.
     * @var \FHIR_DSTU_TWO\FHIRResource\FHIRImplementationGuide\FHIRImplementationGuideGlobal[]
     */
    public $global = array();

    /**
     * A binary file that is included in the  implementation guide when it is published.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRUri[]
     */
    public $binary = array();

    /**
     * A page / section in the implementation guide. The root page is the implementation guide home page.
     * @var \FHIR_DSTU_TWO\FHIRResource\FHIRImplementationGuide\FHIRImplementationGuidePage
     */
    public $page = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'ImplementationGuide';

    /**
     * An absolute URL that is used to identify this implementation guide when it is referenced in a specification, model, design or an instance. This SHALL be a URL, SHOULD be globally unique, and SHOULD be an address at which this implementation guide is (or will be) published.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRUri
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * An absolute URL that is used to identify this implementation guide when it is referenced in a specification, model, design or an instance. This SHALL be a URL, SHOULD be globally unique, and SHOULD be an address at which this implementation guide is (or will be) published.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRUri $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * The identifier that is used to identify this version of the Implementation Guide when it is referenced in a specification, model, design or instance. This is an arbitrary value managed by the Implementation Guide author manually.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * The identifier that is used to identify this version of the Implementation Guide when it is referenced in a specification, model, design or instance. This is an arbitrary value managed by the Implementation Guide author manually.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $version
     * @return $this
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * A free text natural language name identifying the Implementation Guide.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * A free text natural language name identifying the Implementation Guide.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * The status of the Implementation Guide.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCode
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * The status of the Implementation Guide.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCode $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * This Implementation Guide was authored for testing purposes (or education/evaluation/marketing), and is not intended to be used for genuine usage.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRBoolean
     */
    public function getExperimental()
    {
        return $this->experimental;
    }

    /**
     * This Implementation Guide was authored for testing purposes (or education/evaluation/marketing), and is not intended to be used for genuine usage.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRBoolean $experimental
     * @return $this
     */
    public function setExperimental($experimental)
    {
        $this->experimental = $experimental;
        return $this;
    }

    /**
     * The name of the individual or organization that published the implementation guide.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * The name of the individual or organization that published the implementation guide.
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
     * @return \FHIR_DSTU_TWO\FHIRResource\FHIRImplementationGuide\FHIRImplementationGuideContact[]
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Contacts to assist a user in finding and communicating with the publisher.
     * @param \FHIR_DSTU_TWO\FHIRResource\FHIRImplementationGuide\FHIRImplementationGuideContact[] $contact
     * @return $this
     */
    public function addContact($contact)
    {
        $this->contact[] = $contact;
        return $this;
    }

    /**
     * The date this version of the implementation guide was published. The date must change when the business version changes, if it does, and it must change if the status code changes. In addition, it should change when the substantive content of the implementation guide changes.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * The date this version of the implementation guide was published. The date must change when the business version changes, if it does, and it must change if the status code changes. In addition, it should change when the substantive content of the implementation guide changes.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime $date
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * A free text natural language description of the Implementation Guide and its use.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * A free text natural language description of the Implementation Guide and its use.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * The content was developed with a focus and intent of supporting the contexts that are listed. These terms may be used to assist with indexing and searching of implementation guides. The most common use of this element is to represent the country / jurisdiction for which this implementation guide was defined.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[]
     */
    public function getUseContext()
    {
        return $this->useContext;
    }

    /**
     * The content was developed with a focus and intent of supporting the contexts that are listed. These terms may be used to assist with indexing and searching of implementation guides. The most common use of this element is to represent the country / jurisdiction for which this implementation guide was defined.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[] $useContext
     * @return $this
     */
    public function addUseContext($useContext)
    {
        $this->useContext[] = $useContext;
        return $this;
    }

    /**
     * A copyright statement relating to the implementation guide and/or its contents. Copyright statements are generally legal restrictions on the use and publishing of the details of the constraints and mappings.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getCopyright()
    {
        return $this->copyright;
    }

    /**
     * A copyright statement relating to the implementation guide and/or its contents. Copyright statements are generally legal restrictions on the use and publishing of the details of the constraints and mappings.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $copyright
     * @return $this
     */
    public function setCopyright($copyright)
    {
        $this->copyright = $copyright;
        return $this;
    }

    /**
     * The version of the FHIR specification on which this ImplementationGuide is based - this is the formal version of the specification, without the revision number, e.g. [publication].[major].[minor], which is 1.0.2 for this version.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRId
     */
    public function getFhirVersion()
    {
        return $this->fhirVersion;
    }

    /**
     * The version of the FHIR specification on which this ImplementationGuide is based - this is the formal version of the specification, without the revision number, e.g. [publication].[major].[minor], which is 1.0.2 for this version.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRId $fhirVersion
     * @return $this
     */
    public function setFhirVersion($fhirVersion)
    {
        $this->fhirVersion = $fhirVersion;
        return $this;
    }

    /**
     * Another implementation guide that this implementation depends on. Typically, an implementation guide uses value sets, profiles etc.defined in other implementation guides.
     * @return \FHIR_DSTU_TWO\FHIRResource\FHIRImplementationGuide\FHIRImplementationGuideDependency[]
     */
    public function getDependency()
    {
        return $this->dependency;
    }

    /**
     * Another implementation guide that this implementation depends on. Typically, an implementation guide uses value sets, profiles etc.defined in other implementation guides.
     * @param \FHIR_DSTU_TWO\FHIRResource\FHIRImplementationGuide\FHIRImplementationGuideDependency[] $dependency
     * @return $this
     */
    public function addDependency($dependency)
    {
        $this->dependency[] = $dependency;
        return $this;
    }

    /**
     * A logical group of resources. Logical groups can be used when building pages.
     * @return \FHIR_DSTU_TWO\FHIRResource\FHIRImplementationGuide\FHIRImplementationGuidePackage[]
     */
    public function getPackage()
    {
        return $this->package;
    }

    /**
     * A logical group of resources. Logical groups can be used when building pages.
     * @param \FHIR_DSTU_TWO\FHIRResource\FHIRImplementationGuide\FHIRImplementationGuidePackage[] $package
     * @return $this
     */
    public function addPackage($package)
    {
        $this->package[] = $package;
        return $this;
    }

    /**
     * A set of profiles that all resources covered by this implementation guide must conform to.
     * @return \FHIR_DSTU_TWO\FHIRResource\FHIRImplementationGuide\FHIRImplementationGuideGlobal[]
     */
    public function getGlobal()
    {
        return $this->global;
    }

    /**
     * A set of profiles that all resources covered by this implementation guide must conform to.
     * @param \FHIR_DSTU_TWO\FHIRResource\FHIRImplementationGuide\FHIRImplementationGuideGlobal[] $global
     * @return $this
     */
    public function addGlobal($global)
    {
        $this->global[] = $global;
        return $this;
    }

    /**
     * A binary file that is included in the  implementation guide when it is published.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRUri[]
     */
    public function getBinary()
    {
        return $this->binary;
    }

    /**
     * A binary file that is included in the  implementation guide when it is published.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRUri[] $binary
     * @return $this
     */
    public function addBinary($binary)
    {
        $this->binary[] = $binary;
        return $this;
    }

    /**
     * A page / section in the implementation guide. The root page is the implementation guide home page.
     * @return \FHIR_DSTU_TWO\FHIRResource\FHIRImplementationGuide\FHIRImplementationGuidePage
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * A page / section in the implementation guide. The root page is the implementation guide home page.
     * @param \FHIR_DSTU_TWO\FHIRResource\FHIRImplementationGuide\FHIRImplementationGuidePage $page
     * @return $this
     */
    public function setPage($page)
    {
        $this->page = $page;
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
        if (0 < count($this->useContext)) {
            $json['useContext'] = array();
            foreach($this->useContext as $useContext) {
                $json['useContext'][] = $useContext->jsonSerialize();
            }
        }
        if (null !== $this->copyright) $json['copyright'] = $this->copyright->jsonSerialize();
        if (null !== $this->fhirVersion) $json['fhirVersion'] = $this->fhirVersion->jsonSerialize();
        if (0 < count($this->dependency)) {
            $json['dependency'] = array();
            foreach($this->dependency as $dependency) {
                $json['dependency'][] = $dependency->jsonSerialize();
            }
        }
        if (0 < count($this->package)) {
            $json['package'] = array();
            foreach($this->package as $package) {
                $json['package'][] = $package->jsonSerialize();
            }
        }
        if (0 < count($this->global)) {
            $json['global'] = array();
            foreach($this->global as $global) {
                $json['global'][] = $global->jsonSerialize();
            }
        }
        if (0 < count($this->binary)) {
            $json['binary'] = array();
            foreach($this->binary as $binary) {
                $json['binary'][] = $binary->jsonSerialize();
            }
        }
        if (null !== $this->page) $json['page'] = $this->page->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<ImplementationGuide xmlns="http://hl7.org/fhir"></ImplementationGuide>');
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
        if (0 < count($this->useContext)) {
            foreach($this->useContext as $useContext) {
                $useContext->xmlSerialize(true, $sxe->addChild('useContext'));
            }
        }
        if (null !== $this->copyright) $this->copyright->xmlSerialize(true, $sxe->addChild('copyright'));
        if (null !== $this->fhirVersion) $this->fhirVersion->xmlSerialize(true, $sxe->addChild('fhirVersion'));
        if (0 < count($this->dependency)) {
            foreach($this->dependency as $dependency) {
                $dependency->xmlSerialize(true, $sxe->addChild('dependency'));
            }
        }
        if (0 < count($this->package)) {
            foreach($this->package as $package) {
                $package->xmlSerialize(true, $sxe->addChild('package'));
            }
        }
        if (0 < count($this->global)) {
            foreach($this->global as $global) {
                $global->xmlSerialize(true, $sxe->addChild('global'));
            }
        }
        if (0 < count($this->binary)) {
            foreach($this->binary as $binary) {
                $binary->xmlSerialize(true, $sxe->addChild('binary'));
            }
        }
        if (null !== $this->page) $this->page->xmlSerialize(true, $sxe->addChild('page'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}