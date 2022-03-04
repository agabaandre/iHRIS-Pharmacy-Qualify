<?php namespace FHIR_DSTU_TWO\FHIRResource\FHIRAuditEvent;

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
 * A record of an event made for purposes of maintaining a security log. Typical uses include detection of intrusion attempts and monitoring for inappropriate usage.
 */
class FHIRAuditEventEvent extends FHIRBackboneElement implements JsonSerializable
{
    /**
     * Identifier for a family of the event.  For example, a menu item, program, rule, policy, function code, application name or URL. It identifies the performed function.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCoding
     */
    public $type = null;

    /**
     * Identifier for the category of event.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCoding[]
     */
    public $subtype = array();

    /**
     * Indicator for type of action performed during the event that generated the audit.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRAuditEventAction
     */
    public $action = null;

    /**
     * The time when the event occurred on the source.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRInstant
     */
    public $dateTime = null;

    /**
     * Indicates whether the event succeeded or failed.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRAuditEventOutcome
     */
    public $outcome = null;

    /**
     * A free text description of the outcome of the event.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $outcomeDesc = null;

    /**
     * The purposeOfUse (reason) that was used during the event being recorded.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCoding[]
     */
    public $purposeOfEvent = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'AuditEvent.Event';

    /**
     * Identifier for a family of the event.  For example, a menu item, program, rule, policy, function code, application name or URL. It identifies the performed function.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCoding
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Identifier for a family of the event.  For example, a menu item, program, rule, policy, function code, application name or URL. It identifies the performed function.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCoding $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Identifier for the category of event.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCoding[]
     */
    public function getSubtype()
    {
        return $this->subtype;
    }

    /**
     * Identifier for the category of event.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCoding[] $subtype
     * @return $this
     */
    public function addSubtype($subtype)
    {
        $this->subtype[] = $subtype;
        return $this;
    }

    /**
     * Indicator for type of action performed during the event that generated the audit.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRAuditEventAction
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Indicator for type of action performed during the event that generated the audit.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRAuditEventAction $action
     * @return $this
     */
    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }

    /**
     * The time when the event occurred on the source.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRInstant
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * The time when the event occurred on the source.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRInstant $dateTime
     * @return $this
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;
        return $this;
    }

    /**
     * Indicates whether the event succeeded or failed.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRAuditEventOutcome
     */
    public function getOutcome()
    {
        return $this->outcome;
    }

    /**
     * Indicates whether the event succeeded or failed.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRAuditEventOutcome $outcome
     * @return $this
     */
    public function setOutcome($outcome)
    {
        $this->outcome = $outcome;
        return $this;
    }

    /**
     * A free text description of the outcome of the event.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getOutcomeDesc()
    {
        return $this->outcomeDesc;
    }

    /**
     * A free text description of the outcome of the event.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $outcomeDesc
     * @return $this
     */
    public function setOutcomeDesc($outcomeDesc)
    {
        $this->outcomeDesc = $outcomeDesc;
        return $this;
    }

    /**
     * The purposeOfUse (reason) that was used during the event being recorded.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCoding[]
     */
    public function getPurposeOfEvent()
    {
        return $this->purposeOfEvent;
    }

    /**
     * The purposeOfUse (reason) that was used during the event being recorded.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCoding[] $purposeOfEvent
     * @return $this
     */
    public function addPurposeOfEvent($purposeOfEvent)
    {
        $this->purposeOfEvent[] = $purposeOfEvent;
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
        if (null !== $this->type) $json['type'] = $this->type->jsonSerialize();
        if (0 < count($this->subtype)) {
            $json['subtype'] = array();
            foreach($this->subtype as $subtype) {
                $json['subtype'][] = $subtype->jsonSerialize();
            }
        }
        if (null !== $this->action) $json['action'] = $this->action->jsonSerialize();
        if (null !== $this->dateTime) $json['dateTime'] = $this->dateTime->jsonSerialize();
        if (null !== $this->outcome) $json['outcome'] = $this->outcome->jsonSerialize();
        if (null !== $this->outcomeDesc) $json['outcomeDesc'] = $this->outcomeDesc->jsonSerialize();
        if (0 < count($this->purposeOfEvent)) {
            $json['purposeOfEvent'] = array();
            foreach($this->purposeOfEvent as $purposeOfEvent) {
                $json['purposeOfEvent'][] = $purposeOfEvent->jsonSerialize();
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
        if (null === $sxe) $sxe = new \SimpleXMLElement('<AuditEventEvent xmlns="http://hl7.org/fhir"></AuditEventEvent>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->type) $this->type->xmlSerialize(true, $sxe->addChild('type'));
        if (0 < count($this->subtype)) {
            foreach($this->subtype as $subtype) {
                $subtype->xmlSerialize(true, $sxe->addChild('subtype'));
            }
        }
        if (null !== $this->action) $this->action->xmlSerialize(true, $sxe->addChild('action'));
        if (null !== $this->dateTime) $this->dateTime->xmlSerialize(true, $sxe->addChild('dateTime'));
        if (null !== $this->outcome) $this->outcome->xmlSerialize(true, $sxe->addChild('outcome'));
        if (null !== $this->outcomeDesc) $this->outcomeDesc->xmlSerialize(true, $sxe->addChild('outcomeDesc'));
        if (0 < count($this->purposeOfEvent)) {
            foreach($this->purposeOfEvent as $purposeOfEvent) {
                $purposeOfEvent->xmlSerialize(true, $sxe->addChild('purposeOfEvent'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}