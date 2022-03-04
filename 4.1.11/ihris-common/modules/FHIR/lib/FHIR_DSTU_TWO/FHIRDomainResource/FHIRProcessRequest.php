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
 * This resource provides the target, request and response, and action details for an action to be performed by the target on or about existing resources.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRProcessRequest extends FHIRDomainResource implements JsonSerializable
{
    /**
     * The type of processing action being requested, for example Reversal, Readjudication, StatusRequest,PendedRequest.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRActionList
     */
    public $action = null;

    /**
     * The ProcessRequest business identifier.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRIdentifier[]
     */
    public $identifier = array();

    /**
     * The version of the style of resource contents. This should be mapped to the allowable profiles for this and supporting resources.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCoding
     */
    public $ruleset = null;

    /**
     * The style (standard) and version of the original material which was converted into this resource.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCoding
     */
    public $originalRuleset = null;

    /**
     * The date when this resource was created.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime
     */
    public $created = null;

    /**
     * The organization which is the target of the request.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public $target = null;

    /**
     * The practitioner who is responsible for the action specified in thise request.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public $provider = null;

    /**
     * The organization which is responsible for the action speccified in thise request.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public $organization = null;

    /**
     * Reference of resource which is the target or subject of this action.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public $request = null;

    /**
     * Reference of a prior response to resource which is the target or subject of this action.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public $response = null;

    /**
     * If true remove all history excluding audit.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRBoolean
     */
    public $nullify = null;

    /**
     * A reference to supply which authenticates the process.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $reference = null;

    /**
     * List of top level items to be re-adjudicated, if none specified then the entire submission is re-adjudicated.
     * @var \FHIR_DSTU_TWO\FHIRResource\FHIRProcessRequest\FHIRProcessRequestItem[]
     */
    public $item = array();

    /**
     * Names of resource types to include.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString[]
     */
    public $include = array();

    /**
     * Names of resource types to exclude.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString[]
     */
    public $exclude = array();

    /**
     * A period of time during which the fulfilling resources would have been created.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRPeriod
     */
    public $period = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'ProcessRequest';

    /**
     * The type of processing action being requested, for example Reversal, Readjudication, StatusRequest,PendedRequest.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRActionList
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * The type of processing action being requested, for example Reversal, Readjudication, StatusRequest,PendedRequest.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRActionList $action
     * @return $this
     */
    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }

    /**
     * The ProcessRequest business identifier.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRIdentifier[]
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * The ProcessRequest business identifier.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRIdentifier[] $identifier
     * @return $this
     */
    public function addIdentifier($identifier)
    {
        $this->identifier[] = $identifier;
        return $this;
    }

    /**
     * The version of the style of resource contents. This should be mapped to the allowable profiles for this and supporting resources.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCoding
     */
    public function getRuleset()
    {
        return $this->ruleset;
    }

    /**
     * The version of the style of resource contents. This should be mapped to the allowable profiles for this and supporting resources.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCoding $ruleset
     * @return $this
     */
    public function setRuleset($ruleset)
    {
        $this->ruleset = $ruleset;
        return $this;
    }

    /**
     * The style (standard) and version of the original material which was converted into this resource.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCoding
     */
    public function getOriginalRuleset()
    {
        return $this->originalRuleset;
    }

    /**
     * The style (standard) and version of the original material which was converted into this resource.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCoding $originalRuleset
     * @return $this
     */
    public function setOriginalRuleset($originalRuleset)
    {
        $this->originalRuleset = $originalRuleset;
        return $this;
    }

    /**
     * The date when this resource was created.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * The date when this resource was created.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime $created
     * @return $this
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * The organization which is the target of the request.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * The organization which is the target of the request.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference $target
     * @return $this
     */
    public function setTarget($target)
    {
        $this->target = $target;
        return $this;
    }

    /**
     * The practitioner who is responsible for the action specified in thise request.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * The practitioner who is responsible for the action specified in thise request.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference $provider
     * @return $this
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;
        return $this;
    }

    /**
     * The organization which is responsible for the action speccified in thise request.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * The organization which is responsible for the action speccified in thise request.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference $organization
     * @return $this
     */
    public function setOrganization($organization)
    {
        $this->organization = $organization;
        return $this;
    }

    /**
     * Reference of resource which is the target or subject of this action.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Reference of resource which is the target or subject of this action.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference $request
     * @return $this
     */
    public function setRequest($request)
    {
        $this->request = $request;
        return $this;
    }

    /**
     * Reference of a prior response to resource which is the target or subject of this action.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Reference of a prior response to resource which is the target or subject of this action.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference $response
     * @return $this
     */
    public function setResponse($response)
    {
        $this->response = $response;
        return $this;
    }

    /**
     * If true remove all history excluding audit.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRBoolean
     */
    public function getNullify()
    {
        return $this->nullify;
    }

    /**
     * If true remove all history excluding audit.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRBoolean $nullify
     * @return $this
     */
    public function setNullify($nullify)
    {
        $this->nullify = $nullify;
        return $this;
    }

    /**
     * A reference to supply which authenticates the process.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * A reference to supply which authenticates the process.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $reference
     * @return $this
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * List of top level items to be re-adjudicated, if none specified then the entire submission is re-adjudicated.
     * @return \FHIR_DSTU_TWO\FHIRResource\FHIRProcessRequest\FHIRProcessRequestItem[]
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * List of top level items to be re-adjudicated, if none specified then the entire submission is re-adjudicated.
     * @param \FHIR_DSTU_TWO\FHIRResource\FHIRProcessRequest\FHIRProcessRequestItem[] $item
     * @return $this
     */
    public function addItem($item)
    {
        $this->item[] = $item;
        return $this;
    }

    /**
     * Names of resource types to include.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString[]
     */
    public function getInclude()
    {
        return $this->include;
    }

    /**
     * Names of resource types to include.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString[] $include
     * @return $this
     */
    public function addInclude($include)
    {
        $this->include[] = $include;
        return $this;
    }

    /**
     * Names of resource types to exclude.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString[]
     */
    public function getExclude()
    {
        return $this->exclude;
    }

    /**
     * Names of resource types to exclude.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString[] $exclude
     * @return $this
     */
    public function addExclude($exclude)
    {
        $this->exclude[] = $exclude;
        return $this;
    }

    /**
     * A period of time during which the fulfilling resources would have been created.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRPeriod
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * A period of time during which the fulfilling resources would have been created.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRPeriod $period
     * @return $this
     */
    public function setPeriod($period)
    {
        $this->period = $period;
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
        if (null !== $this->action) $json['action'] = $this->action->jsonSerialize();
        if (0 < count($this->identifier)) {
            $json['identifier'] = array();
            foreach($this->identifier as $identifier) {
                $json['identifier'][] = $identifier->jsonSerialize();
            }
        }
        if (null !== $this->ruleset) $json['ruleset'] = $this->ruleset->jsonSerialize();
        if (null !== $this->originalRuleset) $json['originalRuleset'] = $this->originalRuleset->jsonSerialize();
        if (null !== $this->created) $json['created'] = $this->created->jsonSerialize();
        if (null !== $this->target) $json['target'] = $this->target->jsonSerialize();
        if (null !== $this->provider) $json['provider'] = $this->provider->jsonSerialize();
        if (null !== $this->organization) $json['organization'] = $this->organization->jsonSerialize();
        if (null !== $this->request) $json['request'] = $this->request->jsonSerialize();
        if (null !== $this->response) $json['response'] = $this->response->jsonSerialize();
        if (null !== $this->nullify) $json['nullify'] = $this->nullify->jsonSerialize();
        if (null !== $this->reference) $json['reference'] = $this->reference->jsonSerialize();
        if (0 < count($this->item)) {
            $json['item'] = array();
            foreach($this->item as $item) {
                $json['item'][] = $item->jsonSerialize();
            }
        }
        if (0 < count($this->include)) {
            $json['include'] = array();
            foreach($this->include as $include) {
                $json['include'][] = $include->jsonSerialize();
            }
        }
        if (0 < count($this->exclude)) {
            $json['exclude'] = array();
            foreach($this->exclude as $exclude) {
                $json['exclude'][] = $exclude->jsonSerialize();
            }
        }
        if (null !== $this->period) $json['period'] = $this->period->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<ProcessRequest xmlns="http://hl7.org/fhir"></ProcessRequest>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->action) $this->action->xmlSerialize(true, $sxe->addChild('action'));
        if (0 < count($this->identifier)) {
            foreach($this->identifier as $identifier) {
                $identifier->xmlSerialize(true, $sxe->addChild('identifier'));
            }
        }
        if (null !== $this->ruleset) $this->ruleset->xmlSerialize(true, $sxe->addChild('ruleset'));
        if (null !== $this->originalRuleset) $this->originalRuleset->xmlSerialize(true, $sxe->addChild('originalRuleset'));
        if (null !== $this->created) $this->created->xmlSerialize(true, $sxe->addChild('created'));
        if (null !== $this->target) $this->target->xmlSerialize(true, $sxe->addChild('target'));
        if (null !== $this->provider) $this->provider->xmlSerialize(true, $sxe->addChild('provider'));
        if (null !== $this->organization) $this->organization->xmlSerialize(true, $sxe->addChild('organization'));
        if (null !== $this->request) $this->request->xmlSerialize(true, $sxe->addChild('request'));
        if (null !== $this->response) $this->response->xmlSerialize(true, $sxe->addChild('response'));
        if (null !== $this->nullify) $this->nullify->xmlSerialize(true, $sxe->addChild('nullify'));
        if (null !== $this->reference) $this->reference->xmlSerialize(true, $sxe->addChild('reference'));
        if (0 < count($this->item)) {
            foreach($this->item as $item) {
                $item->xmlSerialize(true, $sxe->addChild('item'));
            }
        }
        if (0 < count($this->include)) {
            foreach($this->include as $include) {
                $include->xmlSerialize(true, $sxe->addChild('include'));
            }
        }
        if (0 < count($this->exclude)) {
            foreach($this->exclude as $exclude) {
                $exclude->xmlSerialize(true, $sxe->addChild('exclude'));
            }
        }
        if (null !== $this->period) $this->period->xmlSerialize(true, $sxe->addChild('period'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}