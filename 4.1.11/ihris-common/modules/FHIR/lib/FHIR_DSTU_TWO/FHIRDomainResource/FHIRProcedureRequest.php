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
 * A request for a procedure to be performed. May be a proposal or an order.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRProcedureRequest extends FHIRDomainResource implements JsonSerializable
{
    /**
     * Identifiers assigned to this order by the order or by the receiver.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRIdentifier[]
     */
    public $identifier = array();

    /**
     * The person, animal or group that should receive the procedure.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public $subject = null;

    /**
     * The specific procedure that is ordered. Use text if the exact nature of the procedure cannot be coded.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept
     */
    public $code = null;

    /**
     * Indicates the sites on the subject's body where the procedure should be performed (I.e. the target sites).
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[]
     */
    public $bodySite = array();

    /**
     * The reason why the procedure is being proposed or ordered. This procedure request may be motivated by a Condition for instance. (choose any one of reason*, but only one)
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept
     */
    public $reasonCodeableConcept = null;

    /**
     * The reason why the procedure is being proposed or ordered. This procedure request may be motivated by a Condition for instance. (choose any one of reason*, but only one)
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public $reasonReference = null;

    /**
     * The timing schedule for the proposed or ordered procedure. The Schedule data type allows many different expressions.  E.g. "Every 8 hours"; "Three times a day"; "1/2 an hour before breakfast for 10 days from 23-Dec 2011:"; "15 Oct 2013, 17 Oct 2013 and 1 Nov 2013". (choose any one of scheduled*, but only one)
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime
     */
    public $scheduledDateTime = null;

    /**
     * The timing schedule for the proposed or ordered procedure. The Schedule data type allows many different expressions.  E.g. "Every 8 hours"; "Three times a day"; "1/2 an hour before breakfast for 10 days from 23-Dec 2011:"; "15 Oct 2013, 17 Oct 2013 and 1 Nov 2013". (choose any one of scheduled*, but only one)
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRPeriod
     */
    public $scheduledPeriod = null;

    /**
     * The timing schedule for the proposed or ordered procedure. The Schedule data type allows many different expressions.  E.g. "Every 8 hours"; "Three times a day"; "1/2 an hour before breakfast for 10 days from 23-Dec 2011:"; "15 Oct 2013, 17 Oct 2013 and 1 Nov 2013". (choose any one of scheduled*, but only one)
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRTiming
     */
    public $scheduledTiming = null;

    /**
     * The encounter within which the procedure proposal or request was created.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public $encounter = null;

    /**
     * For example, the surgeon, anaethetist, endoscopist, etc.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public $performer = null;

    /**
     * The status of the order.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRProcedureRequestStatus
     */
    public $status = null;

    /**
     * Any other notes associated with this proposal or order - e.g. provider instructions.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRAnnotation[]
     */
    public $notes = array();

    /**
     * If a CodeableConcept is present, it indicates the pre-condition for performing the procedure. (choose any one of asNeeded*, but only one)
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRBoolean
     */
    public $asNeededBoolean = null;

    /**
     * If a CodeableConcept is present, it indicates the pre-condition for performing the procedure. (choose any one of asNeeded*, but only one)
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept
     */
    public $asNeededCodeableConcept = null;

    /**
     * The time when the request was made.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime
     */
    public $orderedOn = null;

    /**
     * The healthcare professional responsible for proposing or ordering the procedure.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public $orderer = null;

    /**
     * The clinical priority associated with this order.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRProcedureRequestPriority
     */
    public $priority = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'ProcedureRequest';

    /**
     * Identifiers assigned to this order by the order or by the receiver.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRIdentifier[]
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Identifiers assigned to this order by the order or by the receiver.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRIdentifier[] $identifier
     * @return $this
     */
    public function addIdentifier($identifier)
    {
        $this->identifier[] = $identifier;
        return $this;
    }

    /**
     * The person, animal or group that should receive the procedure.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * The person, animal or group that should receive the procedure.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference $subject
     * @return $this
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * The specific procedure that is ordered. Use text if the exact nature of the procedure cannot be coded.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * The specific procedure that is ordered. Use text if the exact nature of the procedure cannot be coded.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept $code
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * Indicates the sites on the subject's body where the procedure should be performed (I.e. the target sites).
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[]
     */
    public function getBodySite()
    {
        return $this->bodySite;
    }

    /**
     * Indicates the sites on the subject's body where the procedure should be performed (I.e. the target sites).
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[] $bodySite
     * @return $this
     */
    public function addBodySite($bodySite)
    {
        $this->bodySite[] = $bodySite;
        return $this;
    }

    /**
     * The reason why the procedure is being proposed or ordered. This procedure request may be motivated by a Condition for instance. (choose any one of reason*, but only one)
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept
     */
    public function getReasonCodeableConcept()
    {
        return $this->reasonCodeableConcept;
    }

    /**
     * The reason why the procedure is being proposed or ordered. This procedure request may be motivated by a Condition for instance. (choose any one of reason*, but only one)
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept $reasonCodeableConcept
     * @return $this
     */
    public function setReasonCodeableConcept($reasonCodeableConcept)
    {
        $this->reasonCodeableConcept = $reasonCodeableConcept;
        return $this;
    }

    /**
     * The reason why the procedure is being proposed or ordered. This procedure request may be motivated by a Condition for instance. (choose any one of reason*, but only one)
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public function getReasonReference()
    {
        return $this->reasonReference;
    }

    /**
     * The reason why the procedure is being proposed or ordered. This procedure request may be motivated by a Condition for instance. (choose any one of reason*, but only one)
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference $reasonReference
     * @return $this
     */
    public function setReasonReference($reasonReference)
    {
        $this->reasonReference = $reasonReference;
        return $this;
    }

    /**
     * The timing schedule for the proposed or ordered procedure. The Schedule data type allows many different expressions.  E.g. "Every 8 hours"; "Three times a day"; "1/2 an hour before breakfast for 10 days from 23-Dec 2011:"; "15 Oct 2013, 17 Oct 2013 and 1 Nov 2013". (choose any one of scheduled*, but only one)
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime
     */
    public function getScheduledDateTime()
    {
        return $this->scheduledDateTime;
    }

    /**
     * The timing schedule for the proposed or ordered procedure. The Schedule data type allows many different expressions.  E.g. "Every 8 hours"; "Three times a day"; "1/2 an hour before breakfast for 10 days from 23-Dec 2011:"; "15 Oct 2013, 17 Oct 2013 and 1 Nov 2013". (choose any one of scheduled*, but only one)
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime $scheduledDateTime
     * @return $this
     */
    public function setScheduledDateTime($scheduledDateTime)
    {
        $this->scheduledDateTime = $scheduledDateTime;
        return $this;
    }

    /**
     * The timing schedule for the proposed or ordered procedure. The Schedule data type allows many different expressions.  E.g. "Every 8 hours"; "Three times a day"; "1/2 an hour before breakfast for 10 days from 23-Dec 2011:"; "15 Oct 2013, 17 Oct 2013 and 1 Nov 2013". (choose any one of scheduled*, but only one)
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRPeriod
     */
    public function getScheduledPeriod()
    {
        return $this->scheduledPeriod;
    }

    /**
     * The timing schedule for the proposed or ordered procedure. The Schedule data type allows many different expressions.  E.g. "Every 8 hours"; "Three times a day"; "1/2 an hour before breakfast for 10 days from 23-Dec 2011:"; "15 Oct 2013, 17 Oct 2013 and 1 Nov 2013". (choose any one of scheduled*, but only one)
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRPeriod $scheduledPeriod
     * @return $this
     */
    public function setScheduledPeriod($scheduledPeriod)
    {
        $this->scheduledPeriod = $scheduledPeriod;
        return $this;
    }

    /**
     * The timing schedule for the proposed or ordered procedure. The Schedule data type allows many different expressions.  E.g. "Every 8 hours"; "Three times a day"; "1/2 an hour before breakfast for 10 days from 23-Dec 2011:"; "15 Oct 2013, 17 Oct 2013 and 1 Nov 2013". (choose any one of scheduled*, but only one)
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRTiming
     */
    public function getScheduledTiming()
    {
        return $this->scheduledTiming;
    }

    /**
     * The timing schedule for the proposed or ordered procedure. The Schedule data type allows many different expressions.  E.g. "Every 8 hours"; "Three times a day"; "1/2 an hour before breakfast for 10 days from 23-Dec 2011:"; "15 Oct 2013, 17 Oct 2013 and 1 Nov 2013". (choose any one of scheduled*, but only one)
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRTiming $scheduledTiming
     * @return $this
     */
    public function setScheduledTiming($scheduledTiming)
    {
        $this->scheduledTiming = $scheduledTiming;
        return $this;
    }

    /**
     * The encounter within which the procedure proposal or request was created.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public function getEncounter()
    {
        return $this->encounter;
    }

    /**
     * The encounter within which the procedure proposal or request was created.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference $encounter
     * @return $this
     */
    public function setEncounter($encounter)
    {
        $this->encounter = $encounter;
        return $this;
    }

    /**
     * For example, the surgeon, anaethetist, endoscopist, etc.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public function getPerformer()
    {
        return $this->performer;
    }

    /**
     * For example, the surgeon, anaethetist, endoscopist, etc.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference $performer
     * @return $this
     */
    public function setPerformer($performer)
    {
        $this->performer = $performer;
        return $this;
    }

    /**
     * The status of the order.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRProcedureRequestStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * The status of the order.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRProcedureRequestStatus $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Any other notes associated with this proposal or order - e.g. provider instructions.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRAnnotation[]
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Any other notes associated with this proposal or order - e.g. provider instructions.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRAnnotation[] $notes
     * @return $this
     */
    public function addNotes($notes)
    {
        $this->notes[] = $notes;
        return $this;
    }

    /**
     * If a CodeableConcept is present, it indicates the pre-condition for performing the procedure. (choose any one of asNeeded*, but only one)
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRBoolean
     */
    public function getAsNeededBoolean()
    {
        return $this->asNeededBoolean;
    }

    /**
     * If a CodeableConcept is present, it indicates the pre-condition for performing the procedure. (choose any one of asNeeded*, but only one)
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRBoolean $asNeededBoolean
     * @return $this
     */
    public function setAsNeededBoolean($asNeededBoolean)
    {
        $this->asNeededBoolean = $asNeededBoolean;
        return $this;
    }

    /**
     * If a CodeableConcept is present, it indicates the pre-condition for performing the procedure. (choose any one of asNeeded*, but only one)
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept
     */
    public function getAsNeededCodeableConcept()
    {
        return $this->asNeededCodeableConcept;
    }

    /**
     * If a CodeableConcept is present, it indicates the pre-condition for performing the procedure. (choose any one of asNeeded*, but only one)
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept $asNeededCodeableConcept
     * @return $this
     */
    public function setAsNeededCodeableConcept($asNeededCodeableConcept)
    {
        $this->asNeededCodeableConcept = $asNeededCodeableConcept;
        return $this;
    }

    /**
     * The time when the request was made.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime
     */
    public function getOrderedOn()
    {
        return $this->orderedOn;
    }

    /**
     * The time when the request was made.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime $orderedOn
     * @return $this
     */
    public function setOrderedOn($orderedOn)
    {
        $this->orderedOn = $orderedOn;
        return $this;
    }

    /**
     * The healthcare professional responsible for proposing or ordering the procedure.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public function getOrderer()
    {
        return $this->orderer;
    }

    /**
     * The healthcare professional responsible for proposing or ordering the procedure.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference $orderer
     * @return $this
     */
    public function setOrderer($orderer)
    {
        $this->orderer = $orderer;
        return $this;
    }

    /**
     * The clinical priority associated with this order.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRProcedureRequestPriority
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * The clinical priority associated with this order.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRProcedureRequestPriority $priority
     * @return $this
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
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
        if (0 < count($this->identifier)) {
            $json['identifier'] = array();
            foreach($this->identifier as $identifier) {
                $json['identifier'][] = $identifier->jsonSerialize();
            }
        }
        if (null !== $this->subject) $json['subject'] = $this->subject->jsonSerialize();
        if (null !== $this->code) $json['code'] = $this->code->jsonSerialize();
        if (0 < count($this->bodySite)) {
            $json['bodySite'] = array();
            foreach($this->bodySite as $bodySite) {
                $json['bodySite'][] = $bodySite->jsonSerialize();
            }
        }
        if (null !== $this->reasonCodeableConcept) $json['reasonCodeableConcept'] = $this->reasonCodeableConcept->jsonSerialize();
        if (null !== $this->reasonReference) $json['reasonReference'] = $this->reasonReference->jsonSerialize();
        if (null !== $this->scheduledDateTime) $json['scheduledDateTime'] = $this->scheduledDateTime->jsonSerialize();
        if (null !== $this->scheduledPeriod) $json['scheduledPeriod'] = $this->scheduledPeriod->jsonSerialize();
        if (null !== $this->scheduledTiming) $json['scheduledTiming'] = $this->scheduledTiming->jsonSerialize();
        if (null !== $this->encounter) $json['encounter'] = $this->encounter->jsonSerialize();
        if (null !== $this->performer) $json['performer'] = $this->performer->jsonSerialize();
        if (null !== $this->status) $json['status'] = $this->status->jsonSerialize();
        if (0 < count($this->notes)) {
            $json['notes'] = array();
            foreach($this->notes as $notes) {
                $json['notes'][] = $notes->jsonSerialize();
            }
        }
        if (null !== $this->asNeededBoolean) $json['asNeededBoolean'] = $this->asNeededBoolean->jsonSerialize();
        if (null !== $this->asNeededCodeableConcept) $json['asNeededCodeableConcept'] = $this->asNeededCodeableConcept->jsonSerialize();
        if (null !== $this->orderedOn) $json['orderedOn'] = $this->orderedOn->jsonSerialize();
        if (null !== $this->orderer) $json['orderer'] = $this->orderer->jsonSerialize();
        if (null !== $this->priority) $json['priority'] = $this->priority->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<ProcedureRequest xmlns="http://hl7.org/fhir"></ProcedureRequest>');
        parent::xmlSerialize(true, $sxe);
        if (0 < count($this->identifier)) {
            foreach($this->identifier as $identifier) {
                $identifier->xmlSerialize(true, $sxe->addChild('identifier'));
            }
        }
        if (null !== $this->subject) $this->subject->xmlSerialize(true, $sxe->addChild('subject'));
        if (null !== $this->code) $this->code->xmlSerialize(true, $sxe->addChild('code'));
        if (0 < count($this->bodySite)) {
            foreach($this->bodySite as $bodySite) {
                $bodySite->xmlSerialize(true, $sxe->addChild('bodySite'));
            }
        }
        if (null !== $this->reasonCodeableConcept) $this->reasonCodeableConcept->xmlSerialize(true, $sxe->addChild('reasonCodeableConcept'));
        if (null !== $this->reasonReference) $this->reasonReference->xmlSerialize(true, $sxe->addChild('reasonReference'));
        if (null !== $this->scheduledDateTime) $this->scheduledDateTime->xmlSerialize(true, $sxe->addChild('scheduledDateTime'));
        if (null !== $this->scheduledPeriod) $this->scheduledPeriod->xmlSerialize(true, $sxe->addChild('scheduledPeriod'));
        if (null !== $this->scheduledTiming) $this->scheduledTiming->xmlSerialize(true, $sxe->addChild('scheduledTiming'));
        if (null !== $this->encounter) $this->encounter->xmlSerialize(true, $sxe->addChild('encounter'));
        if (null !== $this->performer) $this->performer->xmlSerialize(true, $sxe->addChild('performer'));
        if (null !== $this->status) $this->status->xmlSerialize(true, $sxe->addChild('status'));
        if (0 < count($this->notes)) {
            foreach($this->notes as $notes) {
                $notes->xmlSerialize(true, $sxe->addChild('notes'));
            }
        }
        if (null !== $this->asNeededBoolean) $this->asNeededBoolean->xmlSerialize(true, $sxe->addChild('asNeededBoolean'));
        if (null !== $this->asNeededCodeableConcept) $this->asNeededCodeableConcept->xmlSerialize(true, $sxe->addChild('asNeededCodeableConcept'));
        if (null !== $this->orderedOn) $this->orderedOn->xmlSerialize(true, $sxe->addChild('orderedOn'));
        if (null !== $this->orderer) $this->orderer->xmlSerialize(true, $sxe->addChild('orderer'));
        if (null !== $this->priority) $this->priority->xmlSerialize(true, $sxe->addChild('priority'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}