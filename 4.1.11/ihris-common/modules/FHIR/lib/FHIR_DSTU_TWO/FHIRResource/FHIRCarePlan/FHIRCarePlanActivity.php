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
class FHIRCarePlanActivity extends FHIRBackboneElement implements JsonSerializable
{
    /**
     * Resources that describe follow-on actions resulting from the plan, such as drug prescriptions, encounter records, appointments, etc.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference[]
     */
    public $actionResulting = array();

    /**
     * Notes about the adherence/status/progress of the activity.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRAnnotation[]
     */
    public $progress = array();

    /**
     * The details of the proposed activity represented in a specific resource.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public $reference = null;

    /**
     * A simple summary of a planned activity suitable for a general care plan system (e.g. form driven) that doesn't know about specific resources such as procedure etc.
     * @var \FHIR_DSTU_TWO\FHIRResource\FHIRCarePlan\FHIRCarePlanDetail
     */
    public $detail = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'CarePlan.Activity';

    /**
     * Resources that describe follow-on actions resulting from the plan, such as drug prescriptions, encounter records, appointments, etc.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference[]
     */
    public function getActionResulting()
    {
        return $this->actionResulting;
    }

    /**
     * Resources that describe follow-on actions resulting from the plan, such as drug prescriptions, encounter records, appointments, etc.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference[] $actionResulting
     * @return $this
     */
    public function addActionResulting($actionResulting)
    {
        $this->actionResulting[] = $actionResulting;
        return $this;
    }

    /**
     * Notes about the adherence/status/progress of the activity.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRAnnotation[]
     */
    public function getProgress()
    {
        return $this->progress;
    }

    /**
     * Notes about the adherence/status/progress of the activity.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRAnnotation[] $progress
     * @return $this
     */
    public function addProgress($progress)
    {
        $this->progress[] = $progress;
        return $this;
    }

    /**
     * The details of the proposed activity represented in a specific resource.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * The details of the proposed activity represented in a specific resource.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference $reference
     * @return $this
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * A simple summary of a planned activity suitable for a general care plan system (e.g. form driven) that doesn't know about specific resources such as procedure etc.
     * @return \FHIR_DSTU_TWO\FHIRResource\FHIRCarePlan\FHIRCarePlanDetail
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * A simple summary of a planned activity suitable for a general care plan system (e.g. form driven) that doesn't know about specific resources such as procedure etc.
     * @param \FHIR_DSTU_TWO\FHIRResource\FHIRCarePlan\FHIRCarePlanDetail $detail
     * @return $this
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;
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
        if (0 < count($this->actionResulting)) {
            $json['actionResulting'] = array();
            foreach($this->actionResulting as $actionResulting) {
                $json['actionResulting'][] = $actionResulting->jsonSerialize();
            }
        }
        if (0 < count($this->progress)) {
            $json['progress'] = array();
            foreach($this->progress as $progress) {
                $json['progress'][] = $progress->jsonSerialize();
            }
        }
        if (null !== $this->reference) $json['reference'] = $this->reference->jsonSerialize();
        if (null !== $this->detail) $json['detail'] = $this->detail->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<CarePlanActivity xmlns="http://hl7.org/fhir"></CarePlanActivity>');
        parent::xmlSerialize(true, $sxe);
        if (0 < count($this->actionResulting)) {
            foreach($this->actionResulting as $actionResulting) {
                $actionResulting->xmlSerialize(true, $sxe->addChild('actionResulting'));
            }
        }
        if (0 < count($this->progress)) {
            foreach($this->progress as $progress) {
                $progress->xmlSerialize(true, $sxe->addChild('progress'));
            }
        }
        if (null !== $this->reference) $this->reference->xmlSerialize(true, $sxe->addChild('reference'));
        if (null !== $this->detail) $this->detail->xmlSerialize(true, $sxe->addChild('detail'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}