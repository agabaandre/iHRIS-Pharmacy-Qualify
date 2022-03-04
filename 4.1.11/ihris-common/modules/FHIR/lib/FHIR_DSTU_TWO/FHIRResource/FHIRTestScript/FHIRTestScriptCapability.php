<?php namespace FHIR_DSTU_TWO\FHIRResource\FHIRTestScript;

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

use FHIR_DSTU_TWO\FHIRElement\FHIRBackboneElement;
use FHIR_DSTU_TWO\JsonSerializable;

/**
 * TestScript is a resource that specifies a suite of tests against a FHIR server implementation to determine compliance against the FHIR specification.
 */
class FHIRTestScriptCapability extends FHIRBackboneElement implements JsonSerializable
{
    /**
     * Whether or not the test execution will require the given capabilities of the server in order for this test script to execute.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRBoolean
     */
    public $required = null;

    /**
     * Whether or not the test execution will validate the given capabilities of the server in order for this test script to execute.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRBoolean
     */
    public $validated = null;

    /**
     * Description of the capabilities that this test script is requiring the server to support.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $description = null;

    /**
     * Which server these requirements apply to.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRInteger
     */
    public $destination = null;

    /**
     * Links to the FHIR specification that describes this interaction and the resources involved in more detail.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRUri[]
     */
    public $link = array();

    /**
     * Minimum conformance required of server for test script to execute successfully.   If server does not meet at a minimum the reference conformance definition, then all tests in this script are skipped.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public $conformance = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'TestScript.Capability';

    /**
     * Whether or not the test execution will require the given capabilities of the server in order for this test script to execute.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRBoolean
     */
    public function getRequired()
    {
        return $this->required;
    }

    /**
     * Whether or not the test execution will require the given capabilities of the server in order for this test script to execute.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRBoolean $required
     * @return $this
     */
    public function setRequired($required)
    {
        $this->required = $required;
        return $this;
    }

    /**
     * Whether or not the test execution will validate the given capabilities of the server in order for this test script to execute.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRBoolean
     */
    public function getValidated()
    {
        return $this->validated;
    }

    /**
     * Whether or not the test execution will validate the given capabilities of the server in order for this test script to execute.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRBoolean $validated
     * @return $this
     */
    public function setValidated($validated)
    {
        $this->validated = $validated;
        return $this;
    }

    /**
     * Description of the capabilities that this test script is requiring the server to support.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Description of the capabilities that this test script is requiring the server to support.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Which server these requirements apply to.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRInteger
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Which server these requirements apply to.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRInteger $destination
     * @return $this
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
        return $this;
    }

    /**
     * Links to the FHIR specification that describes this interaction and the resources involved in more detail.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRUri[]
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Links to the FHIR specification that describes this interaction and the resources involved in more detail.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRUri[] $link
     * @return $this
     */
    public function addLink($link)
    {
        $this->link[] = $link;
        return $this;
    }

    /**
     * Minimum conformance required of server for test script to execute successfully.   If server does not meet at a minimum the reference conformance definition, then all tests in this script are skipped.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public function getConformance()
    {
        return $this->conformance;
    }

    /**
     * Minimum conformance required of server for test script to execute successfully.   If server does not meet at a minimum the reference conformance definition, then all tests in this script are skipped.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference $conformance
     * @return $this
     */
    public function setConformance($conformance)
    {
        $this->conformance = $conformance;
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
        if (null !== $this->required) $json['required'] = $this->required->jsonSerialize();
        if (null !== $this->validated) $json['validated'] = $this->validated->jsonSerialize();
        if (null !== $this->description) $json['description'] = $this->description->jsonSerialize();
        if (null !== $this->destination) $json['destination'] = $this->destination->jsonSerialize();
        if (0 < count($this->link)) {
            $json['link'] = array();
            foreach($this->link as $link) {
                $json['link'][] = $link->jsonSerialize();
            }
        }
        if (null !== $this->conformance) $json['conformance'] = $this->conformance->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<TestScriptCapability xmlns="http://hl7.org/fhir"></TestScriptCapability>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->required) $this->required->xmlSerialize(true, $sxe->addChild('required'));
        if (null !== $this->validated) $this->validated->xmlSerialize(true, $sxe->addChild('validated'));
        if (null !== $this->description) $this->description->xmlSerialize(true, $sxe->addChild('description'));
        if (null !== $this->destination) $this->destination->xmlSerialize(true, $sxe->addChild('destination'));
        if (0 < count($this->link)) {
            foreach($this->link as $link) {
                $link->xmlSerialize(true, $sxe->addChild('link'));
            }
        }
        if (null !== $this->conformance) $this->conformance->xmlSerialize(true, $sxe->addChild('conformance'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}