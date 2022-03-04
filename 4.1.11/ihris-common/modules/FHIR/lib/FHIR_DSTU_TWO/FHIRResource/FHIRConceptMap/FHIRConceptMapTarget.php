<?php namespace FHIR_DSTU_TWO\FHIRResource\FHIRConceptMap;

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
 * A statement of relationships from one set of concepts to one or more other concepts - either code systems or data elements, or classes in class models.
 */
class FHIRConceptMapTarget extends FHIRBackboneElement implements JsonSerializable
{
    /**
     * An absolute URI that identifies the code system of the target code (if the target is a value set that cross code systems).
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRUri
     */
    public $codeSystem = null;

    /**
     * Identity (code or path) or the element/item that the map refers to.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCode
     */
    public $code = null;

    /**
     * The equivalence between the source and target concepts (counting for the dependencies and products). The equivalence is read from target to source (e.g. the target is 'wider' than the source).
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCode
     */
    public $equivalence = null;

    /**
     * A description of status/issues in mapping that conveys additional information not represented in  the structured data.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $comments = null;

    /**
     * A set of additional dependencies for this mapping to hold. This mapping is only applicable if the specified element can be resolved, and it has the specified value.
     * @var \FHIR_DSTU_TWO\FHIRResource\FHIRConceptMap\FHIRConceptMapDependsOn[]
     */
    public $dependsOn = array();

    /**
     * A set of additional outcomes from this mapping to other elements. To properly execute this mapping, the specified element must be mapped to some data element or source that is in context. The mapping may still be useful without a place for the additional data elements, but the equivalence cannot be relied on.
     * @var \FHIR_DSTU_TWO\FHIRResource\FHIRConceptMap\FHIRConceptMapDependsOn[]
     */
    public $product = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'ConceptMap.Target';

    /**
     * An absolute URI that identifies the code system of the target code (if the target is a value set that cross code systems).
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRUri
     */
    public function getCodeSystem()
    {
        return $this->codeSystem;
    }

    /**
     * An absolute URI that identifies the code system of the target code (if the target is a value set that cross code systems).
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRUri $codeSystem
     * @return $this
     */
    public function setCodeSystem($codeSystem)
    {
        $this->codeSystem = $codeSystem;
        return $this;
    }

    /**
     * Identity (code or path) or the element/item that the map refers to.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCode
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Identity (code or path) or the element/item that the map refers to.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCode $code
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * The equivalence between the source and target concepts (counting for the dependencies and products). The equivalence is read from target to source (e.g. the target is 'wider' than the source).
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCode
     */
    public function getEquivalence()
    {
        return $this->equivalence;
    }

    /**
     * The equivalence between the source and target concepts (counting for the dependencies and products). The equivalence is read from target to source (e.g. the target is 'wider' than the source).
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCode $equivalence
     * @return $this
     */
    public function setEquivalence($equivalence)
    {
        $this->equivalence = $equivalence;
        return $this;
    }

    /**
     * A description of status/issues in mapping that conveys additional information not represented in  the structured data.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * A description of status/issues in mapping that conveys additional information not represented in  the structured data.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $comments
     * @return $this
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
        return $this;
    }

    /**
     * A set of additional dependencies for this mapping to hold. This mapping is only applicable if the specified element can be resolved, and it has the specified value.
     * @return \FHIR_DSTU_TWO\FHIRResource\FHIRConceptMap\FHIRConceptMapDependsOn[]
     */
    public function getDependsOn()
    {
        return $this->dependsOn;
    }

    /**
     * A set of additional dependencies for this mapping to hold. This mapping is only applicable if the specified element can be resolved, and it has the specified value.
     * @param \FHIR_DSTU_TWO\FHIRResource\FHIRConceptMap\FHIRConceptMapDependsOn[] $dependsOn
     * @return $this
     */
    public function addDependsOn($dependsOn)
    {
        $this->dependsOn[] = $dependsOn;
        return $this;
    }

    /**
     * A set of additional outcomes from this mapping to other elements. To properly execute this mapping, the specified element must be mapped to some data element or source that is in context. The mapping may still be useful without a place for the additional data elements, but the equivalence cannot be relied on.
     * @return \FHIR_DSTU_TWO\FHIRResource\FHIRConceptMap\FHIRConceptMapDependsOn[]
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * A set of additional outcomes from this mapping to other elements. To properly execute this mapping, the specified element must be mapped to some data element or source that is in context. The mapping may still be useful without a place for the additional data elements, but the equivalence cannot be relied on.
     * @param \FHIR_DSTU_TWO\FHIRResource\FHIRConceptMap\FHIRConceptMapDependsOn[] $product
     * @return $this
     */
    public function addProduct($product)
    {
        $this->product[] = $product;
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
        if (null !== $this->codeSystem) $json['codeSystem'] = $this->codeSystem->jsonSerialize();
        if (null !== $this->code) $json['code'] = $this->code->jsonSerialize();
        if (null !== $this->equivalence) $json['equivalence'] = $this->equivalence->jsonSerialize();
        if (null !== $this->comments) $json['comments'] = $this->comments->jsonSerialize();
        if (0 < count($this->dependsOn)) {
            $json['dependsOn'] = array();
            foreach($this->dependsOn as $dependsOn) {
                $json['dependsOn'][] = $dependsOn->jsonSerialize();
            }
        }
        if (0 < count($this->product)) {
            $json['product'] = array();
            foreach($this->product as $product) {
                $json['product'][] = $product->jsonSerialize();
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
        if (null === $sxe) $sxe = new \SimpleXMLElement('<ConceptMapTarget xmlns="http://hl7.org/fhir"></ConceptMapTarget>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->codeSystem) $this->codeSystem->xmlSerialize(true, $sxe->addChild('codeSystem'));
        if (null !== $this->code) $this->code->xmlSerialize(true, $sxe->addChild('code'));
        if (null !== $this->equivalence) $this->equivalence->xmlSerialize(true, $sxe->addChild('equivalence'));
        if (null !== $this->comments) $this->comments->xmlSerialize(true, $sxe->addChild('comments'));
        if (0 < count($this->dependsOn)) {
            foreach($this->dependsOn as $dependsOn) {
                $dependsOn->xmlSerialize(true, $sxe->addChild('dependsOn'));
            }
        }
        if (0 < count($this->product)) {
            foreach($this->product as $product) {
                $product->xmlSerialize(true, $sxe->addChild('product'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}