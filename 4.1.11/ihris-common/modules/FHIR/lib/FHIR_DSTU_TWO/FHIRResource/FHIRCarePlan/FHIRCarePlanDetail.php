<?php namespace FHIR_DSTU_TWO\FHIRResource\FHIRCarePlan;

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
 * Describes the intention of how one or more practitioners intend to deliver care for a particular patient, group or community for a period of time, possibly limited to care for a specific condition or set of conditions.
 */
class FHIRCarePlanDetail extends FHIRBackboneElement implements JsonSerializable
{
    /**
     * High-level categorization of the type of activity in a care plan.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept
     */
    public $category = null;

    /**
     * Detailed description of the type of planned activity; e.g. What lab test, what procedure, what kind of encounter.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept
     */
    public $code = null;

    /**
     * Provides the rationale that drove the inclusion of this particular activity as part of the plan.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[]
     */
    public $reasonCode = array();

    /**
     * Provides the health condition(s) that drove the inclusion of this particular activity as part of the plan.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference[]
     */
    public $reasonReference = array();

    /**
     * Internal reference that identifies the goals that this activity is intended to contribute towards meeting.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference[]
     */
    public $goal = array();

    /**
     * Identifies what progress is being made for the specific activity.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCarePlanActivityStatus
     */
    public $status = null;

    /**
     * Provides reason why the activity isn't yet started, is on hold, was cancelled, etc.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept
     */
    public $statusReason = null;

    /**
     * If true, indicates that the described activity is one that must NOT be engaged in when following the plan.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRBoolean
     */
    public $prohibited = null;

    /**
     * The period, timing or frequency upon which the described activity is to occur. (choose any one of scheduled*, but only one)
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRTiming
     */
    public $scheduledTiming = null;

    /**
     * The period, timing or frequency upon which the described activity is to occur. (choose any one of scheduled*, but only one)
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRPeriod
     */
    public $scheduledPeriod = null;

    /**
     * The period, timing or frequency upon which the described activity is to occur. (choose any one of scheduled*, but only one)
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $scheduledString = null;

    /**
     * Identifies the facility where the activity will occur; e.g. home, hospital, specific clinic, etc.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public $location = null;

    /**
     * Identifies who's expected to be involved in the activity.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference[]
     */
    public $performer = array();

    /**
     * Identifies the food, drug or other product to be consumed or supplied in the activity. (choose any one of product*, but only one)
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept
     */
    public $productCodeableConcept = null;

    /**
     * Identifies the food, drug or other product to be consumed or supplied in the activity. (choose any one of product*, but only one)
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public $productReference = null;

    /**
     * Identifies the quantity expected to be consumed in a given day.
     * @var \FHIR_DSTU_TWO\FHIRSimpleQuantity
     */
    public $dailyAmount = null;

    /**
     * Identifies the quantity expected to be supplied, administered or consumed by the subject.
     * @var \FHIR_DSTU_TWO\FHIRSimpleQuantity
     */
    public $quantity = null;

    /**
     * This provides a textual description of constraints on the intended activity occurrence, including relation to other activities.  It may also include objectives, pre-conditions and end-conditions.  Finally, it may convey specifics about the activity such as body site, method, route, etc.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $description = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'CarePlan.Detail';

    /**
     * High-level categorization of the type of activity in a care plan.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * High-level categorization of the type of activity in a care plan.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept $category
     * @return $this
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Detailed description of the type of planned activity; e.g. What lab test, what procedure, what kind of encounter.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Detailed description of the type of planned activity; e.g. What lab test, what procedure, what kind of encounter.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept $code
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * Provides the rationale that drove the inclusion of this particular activity as part of the plan.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[]
     */
    public function getReasonCode()
    {
        return $this->reasonCode;
    }

    /**
     * Provides the rationale that drove the inclusion of this particular activity as part of the plan.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[] $reasonCode
     * @return $this
     */
    public function addReasonCode($reasonCode)
    {
        $this->reasonCode[] = $reasonCode;
        return $this;
    }

    /**
     * Provides the health condition(s) that drove the inclusion of this particular activity as part of the plan.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference[]
     */
    public function getReasonReference()
    {
        return $this->reasonReference;
    }

    /**
     * Provides the health condition(s) that drove the inclusion of this particular activity as part of the plan.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference[] $reasonReference
     * @return $this
     */
    public function addReasonReference($reasonReference)
    {
        $this->reasonReference[] = $reasonReference;
        return $this;
    }

    /**
     * Internal reference that identifies the goals that this activity is intended to contribute towards meeting.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference[]
     */
    public function getGoal()
    {
        return $this->goal;
    }

    /**
     * Internal reference that identifies the goals that this activity is intended to contribute towards meeting.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference[] $goal
     * @return $this
     */
    public function addGoal($goal)
    {
        $this->goal[] = $goal;
        return $this;
    }

    /**
     * Identifies what progress is being made for the specific activity.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCarePlanActivityStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Identifies what progress is being made for the specific activity.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCarePlanActivityStatus $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Provides reason why the activity isn't yet started, is on hold, was cancelled, etc.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept
     */
    public function getStatusReason()
    {
        return $this->statusReason;
    }

    /**
     * Provides reason why the activity isn't yet started, is on hold, was cancelled, etc.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept $statusReason
     * @return $this
     */
    public function setStatusReason($statusReason)
    {
        $this->statusReason = $statusReason;
        return $this;
    }

    /**
     * If true, indicates that the described activity is one that must NOT be engaged in when following the plan.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRBoolean
     */
    public function getProhibited()
    {
        return $this->prohibited;
    }

    /**
     * If true, indicates that the described activity is one that must NOT be engaged in when following the plan.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRBoolean $prohibited
     * @return $this
     */
    public function setProhibited($prohibited)
    {
        $this->prohibited = $prohibited;
        return $this;
    }

    /**
     * The period, timing or frequency upon which the described activity is to occur. (choose any one of scheduled*, but only one)
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRTiming
     */
    public function getScheduledTiming()
    {
        return $this->scheduledTiming;
    }

    /**
     * The period, timing or frequency upon which the described activity is to occur. (choose any one of scheduled*, but only one)
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRTiming $scheduledTiming
     * @return $this
     */
    public function setScheduledTiming($scheduledTiming)
    {
        $this->scheduledTiming = $scheduledTiming;
        return $this;
    }

    /**
     * The period, timing or frequency upon which the described activity is to occur. (choose any one of scheduled*, but only one)
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRPeriod
     */
    public function getScheduledPeriod()
    {
        return $this->scheduledPeriod;
    }

    /**
     * The period, timing or frequency upon which the described activity is to occur. (choose any one of scheduled*, but only one)
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRPeriod $scheduledPeriod
     * @return $this
     */
    public function setScheduledPeriod($scheduledPeriod)
    {
        $this->scheduledPeriod = $scheduledPeriod;
        return $this;
    }

    /**
     * The period, timing or frequency upon which the described activity is to occur. (choose any one of scheduled*, but only one)
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getScheduledString()
    {
        return $this->scheduledString;
    }

    /**
     * The period, timing or frequency upon which the described activity is to occur. (choose any one of scheduled*, but only one)
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $scheduledString
     * @return $this
     */
    public function setScheduledString($scheduledString)
    {
        $this->scheduledString = $scheduledString;
        return $this;
    }

    /**
     * Identifies the facility where the activity will occur; e.g. home, hospital, specific clinic, etc.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Identifies the facility where the activity will occur; e.g. home, hospital, specific clinic, etc.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference $location
     * @return $this
     */
    public function setLocation($location)
    {
        $this->location = $location;
        return $this;
    }

    /**
     * Identifies who's expected to be involved in the activity.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference[]
     */
    public function getPerformer()
    {
        return $this->performer;
    }

    /**
     * Identifies who's expected to be involved in the activity.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference[] $performer
     * @return $this
     */
    public function addPerformer($performer)
    {
        $this->performer[] = $performer;
        return $this;
    }

    /**
     * Identifies the food, drug or other product to be consumed or supplied in the activity. (choose any one of product*, but only one)
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept
     */
    public function getProductCodeableConcept()
    {
        return $this->productCodeableConcept;
    }

    /**
     * Identifies the food, drug or other product to be consumed or supplied in the activity. (choose any one of product*, but only one)
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept $productCodeableConcept
     * @return $this
     */
    public function setProductCodeableConcept($productCodeableConcept)
    {
        $this->productCodeableConcept = $productCodeableConcept;
        return $this;
    }

    /**
     * Identifies the food, drug or other product to be consumed or supplied in the activity. (choose any one of product*, but only one)
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public function getProductReference()
    {
        return $this->productReference;
    }

    /**
     * Identifies the food, drug or other product to be consumed or supplied in the activity. (choose any one of product*, but only one)
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference $productReference
     * @return $this
     */
    public function setProductReference($productReference)
    {
        $this->productReference = $productReference;
        return $this;
    }

    /**
     * Identifies the quantity expected to be consumed in a given day.
     * @return \FHIR_DSTU_TWO\FHIRSimpleQuantity
     */
    public function getDailyAmount()
    {
        return $this->dailyAmount;
    }

    /**
     * Identifies the quantity expected to be consumed in a given day.
     * @param \FHIR_DSTU_TWO\FHIRSimpleQuantity $dailyAmount
     * @return $this
     */
    public function setDailyAmount($dailyAmount)
    {
        $this->dailyAmount = $dailyAmount;
        return $this;
    }

    /**
     * Identifies the quantity expected to be supplied, administered or consumed by the subject.
     * @return \FHIR_DSTU_TWO\FHIRSimpleQuantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Identifies the quantity expected to be supplied, administered or consumed by the subject.
     * @param \FHIR_DSTU_TWO\FHIRSimpleQuantity $quantity
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * This provides a textual description of constraints on the intended activity occurrence, including relation to other activities.  It may also include objectives, pre-conditions and end-conditions.  Finally, it may convey specifics about the activity such as body site, method, route, etc.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * This provides a textual description of constraints on the intended activity occurrence, including relation to other activities.  It may also include objectives, pre-conditions and end-conditions.  Finally, it may convey specifics about the activity such as body site, method, route, etc.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
        if (null !== $this->category) $json['category'] = $this->category->jsonSerialize();
        if (null !== $this->code) $json['code'] = $this->code->jsonSerialize();
        if (0 < count($this->reasonCode)) {
            $json['reasonCode'] = array();
            foreach($this->reasonCode as $reasonCode) {
                $json['reasonCode'][] = $reasonCode->jsonSerialize();
            }
        }
        if (0 < count($this->reasonReference)) {
            $json['reasonReference'] = array();
            foreach($this->reasonReference as $reasonReference) {
                $json['reasonReference'][] = $reasonReference->jsonSerialize();
            }
        }
        if (0 < count($this->goal)) {
            $json['goal'] = array();
            foreach($this->goal as $goal) {
                $json['goal'][] = $goal->jsonSerialize();
            }
        }
        if (null !== $this->status) $json['status'] = $this->status->jsonSerialize();
        if (null !== $this->statusReason) $json['statusReason'] = $this->statusReason->jsonSerialize();
        if (null !== $this->prohibited) $json['prohibited'] = $this->prohibited->jsonSerialize();
        if (null !== $this->scheduledTiming) $json['scheduledTiming'] = $this->scheduledTiming->jsonSerialize();
        if (null !== $this->scheduledPeriod) $json['scheduledPeriod'] = $this->scheduledPeriod->jsonSerialize();
        if (null !== $this->scheduledString) $json['scheduledString'] = $this->scheduledString->jsonSerialize();
        if (null !== $this->location) $json['location'] = $this->location->jsonSerialize();
        if (0 < count($this->performer)) {
            $json['performer'] = array();
            foreach($this->performer as $performer) {
                $json['performer'][] = $performer->jsonSerialize();
            }
        }
        if (null !== $this->productCodeableConcept) $json['productCodeableConcept'] = $this->productCodeableConcept->jsonSerialize();
        if (null !== $this->productReference) $json['productReference'] = $this->productReference->jsonSerialize();
        if (null !== $this->dailyAmount) $json['dailyAmount'] = $this->dailyAmount->jsonSerialize();
        if (null !== $this->quantity) $json['quantity'] = $this->quantity->jsonSerialize();
        if (null !== $this->description) $json['description'] = $this->description->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<CarePlanDetail xmlns="http://hl7.org/fhir"></CarePlanDetail>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->category) $this->category->xmlSerialize(true, $sxe->addChild('category'));
        if (null !== $this->code) $this->code->xmlSerialize(true, $sxe->addChild('code'));
        if (0 < count($this->reasonCode)) {
            foreach($this->reasonCode as $reasonCode) {
                $reasonCode->xmlSerialize(true, $sxe->addChild('reasonCode'));
            }
        }
        if (0 < count($this->reasonReference)) {
            foreach($this->reasonReference as $reasonReference) {
                $reasonReference->xmlSerialize(true, $sxe->addChild('reasonReference'));
            }
        }
        if (0 < count($this->goal)) {
            foreach($this->goal as $goal) {
                $goal->xmlSerialize(true, $sxe->addChild('goal'));
            }
        }
        if (null !== $this->status) $this->status->xmlSerialize(true, $sxe->addChild('status'));
        if (null !== $this->statusReason) $this->statusReason->xmlSerialize(true, $sxe->addChild('statusReason'));
        if (null !== $this->prohibited) $this->prohibited->xmlSerialize(true, $sxe->addChild('prohibited'));
        if (null !== $this->scheduledTiming) $this->scheduledTiming->xmlSerialize(true, $sxe->addChild('scheduledTiming'));
        if (null !== $this->scheduledPeriod) $this->scheduledPeriod->xmlSerialize(true, $sxe->addChild('scheduledPeriod'));
        if (null !== $this->scheduledString) $this->scheduledString->xmlSerialize(true, $sxe->addChild('scheduledString'));
        if (null !== $this->location) $this->location->xmlSerialize(true, $sxe->addChild('location'));
        if (0 < count($this->performer)) {
            foreach($this->performer as $performer) {
                $performer->xmlSerialize(true, $sxe->addChild('performer'));
            }
        }
        if (null !== $this->productCodeableConcept) $this->productCodeableConcept->xmlSerialize(true, $sxe->addChild('productCodeableConcept'));
        if (null !== $this->productReference) $this->productReference->xmlSerialize(true, $sxe->addChild('productReference'));
        if (null !== $this->dailyAmount) $this->dailyAmount->xmlSerialize(true, $sxe->addChild('dailyAmount'));
        if (null !== $this->quantity) $this->quantity->xmlSerialize(true, $sxe->addChild('quantity'));
        if (null !== $this->description) $this->description->xmlSerialize(true, $sxe->addChild('description'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}