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
 * Risk of harmful or undesirable, physiological response which is unique to an individual and associated with exposure to a substance.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRAllergyIntolerance extends FHIRDomainResource implements JsonSerializable
{
    /**
     * This records identifiers associated with this allergy/intolerance concern that are defined by business processes and/or used to refer to it when a direct URL reference to the resource itself is not appropriate (e.g. in CDA documents, or in written / printed documentation).
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRIdentifier[]
     */
    public $identifier = array();

    /**
     * Record of the date and/or time of the onset of the Allergy or Intolerance.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime
     */
    public $onset = null;

    /**
     * Date when the sensitivity was recorded.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime
     */
    public $recordedDate = null;

    /**
     * Individual who recorded the record and takes responsibility for its conten.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public $recorder = null;

    /**
     * The patient who has the allergy or intolerance.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public $patient = null;

    /**
     * The source of the information about the allergy that is recorded.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public $reporter = null;

    /**
     * Identification of a substance, or a class of substances, that is considered to be responsible for the adverse reaction risk.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept
     */
    public $substance = null;

    /**
     * Assertion about certainty associated with the propensity, or potential risk, of a reaction to the identified Substance.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRAllergyIntoleranceStatus
     */
    public $status = null;

    /**
     * Estimate of the potential clinical harm, or seriousness, of the reaction to the identified Substance.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRAllergyIntoleranceCriticality
     */
    public $criticality = null;

    /**
     * Identification of the underlying physiological mechanism for the reaction risk.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRAllergyIntoleranceType
     */
    public $type = null;

    /**
     * Category of the identified Substance.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRAllergyIntoleranceCategory
     */
    public $category = null;

    /**
     * Represents the date and/or time of the last known occurrence of a reaction event.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime
     */
    public $lastOccurence = null;

    /**
     * Additional narrative about the propensity for the Adverse Reaction, not captured in other fields.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRAnnotation
     */
    public $note = null;

    /**
     * Details about each adverse reaction event linked to exposure to the identified Substance.
     * @var \FHIR_DSTU_TWO\FHIRResource\FHIRAllergyIntolerance\FHIRAllergyIntoleranceReaction[]
     */
    public $reaction = array();

    /**
     * @var string
     */
    private $_fhirElementName = 'AllergyIntolerance';

    /**
     * This records identifiers associated with this allergy/intolerance concern that are defined by business processes and/or used to refer to it when a direct URL reference to the resource itself is not appropriate (e.g. in CDA documents, or in written / printed documentation).
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRIdentifier[]
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * This records identifiers associated with this allergy/intolerance concern that are defined by business processes and/or used to refer to it when a direct URL reference to the resource itself is not appropriate (e.g. in CDA documents, or in written / printed documentation).
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRIdentifier[] $identifier
     * @return $this
     */
    public function addIdentifier($identifier)
    {
        $this->identifier[] = $identifier;
        return $this;
    }

    /**
     * Record of the date and/or time of the onset of the Allergy or Intolerance.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime
     */
    public function getOnset()
    {
        return $this->onset;
    }

    /**
     * Record of the date and/or time of the onset of the Allergy or Intolerance.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime $onset
     * @return $this
     */
    public function setOnset($onset)
    {
        $this->onset = $onset;
        return $this;
    }

    /**
     * Date when the sensitivity was recorded.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime
     */
    public function getRecordedDate()
    {
        return $this->recordedDate;
    }

    /**
     * Date when the sensitivity was recorded.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime $recordedDate
     * @return $this
     */
    public function setRecordedDate($recordedDate)
    {
        $this->recordedDate = $recordedDate;
        return $this;
    }

    /**
     * Individual who recorded the record and takes responsibility for its conten.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public function getRecorder()
    {
        return $this->recorder;
    }

    /**
     * Individual who recorded the record and takes responsibility for its conten.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference $recorder
     * @return $this
     */
    public function setRecorder($recorder)
    {
        $this->recorder = $recorder;
        return $this;
    }

    /**
     * The patient who has the allergy or intolerance.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * The patient who has the allergy or intolerance.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference $patient
     * @return $this
     */
    public function setPatient($patient)
    {
        $this->patient = $patient;
        return $this;
    }

    /**
     * The source of the information about the allergy that is recorded.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public function getReporter()
    {
        return $this->reporter;
    }

    /**
     * The source of the information about the allergy that is recorded.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference $reporter
     * @return $this
     */
    public function setReporter($reporter)
    {
        $this->reporter = $reporter;
        return $this;
    }

    /**
     * Identification of a substance, or a class of substances, that is considered to be responsible for the adverse reaction risk.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept
     */
    public function getSubstance()
    {
        return $this->substance;
    }

    /**
     * Identification of a substance, or a class of substances, that is considered to be responsible for the adverse reaction risk.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept $substance
     * @return $this
     */
    public function setSubstance($substance)
    {
        $this->substance = $substance;
        return $this;
    }

    /**
     * Assertion about certainty associated with the propensity, or potential risk, of a reaction to the identified Substance.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRAllergyIntoleranceStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Assertion about certainty associated with the propensity, or potential risk, of a reaction to the identified Substance.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRAllergyIntoleranceStatus $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Estimate of the potential clinical harm, or seriousness, of the reaction to the identified Substance.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRAllergyIntoleranceCriticality
     */
    public function getCriticality()
    {
        return $this->criticality;
    }

    /**
     * Estimate of the potential clinical harm, or seriousness, of the reaction to the identified Substance.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRAllergyIntoleranceCriticality $criticality
     * @return $this
     */
    public function setCriticality($criticality)
    {
        $this->criticality = $criticality;
        return $this;
    }

    /**
     * Identification of the underlying physiological mechanism for the reaction risk.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRAllergyIntoleranceType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Identification of the underlying physiological mechanism for the reaction risk.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRAllergyIntoleranceType $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Category of the identified Substance.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRAllergyIntoleranceCategory
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Category of the identified Substance.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRAllergyIntoleranceCategory $category
     * @return $this
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Represents the date and/or time of the last known occurrence of a reaction event.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime
     */
    public function getLastOccurence()
    {
        return $this->lastOccurence;
    }

    /**
     * Represents the date and/or time of the last known occurrence of a reaction event.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime $lastOccurence
     * @return $this
     */
    public function setLastOccurence($lastOccurence)
    {
        $this->lastOccurence = $lastOccurence;
        return $this;
    }

    /**
     * Additional narrative about the propensity for the Adverse Reaction, not captured in other fields.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRAnnotation
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Additional narrative about the propensity for the Adverse Reaction, not captured in other fields.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRAnnotation $note
     * @return $this
     */
    public function setNote($note)
    {
        $this->note = $note;
        return $this;
    }

    /**
     * Details about each adverse reaction event linked to exposure to the identified Substance.
     * @return \FHIR_DSTU_TWO\FHIRResource\FHIRAllergyIntolerance\FHIRAllergyIntoleranceReaction[]
     */
    public function getReaction()
    {
        return $this->reaction;
    }

    /**
     * Details about each adverse reaction event linked to exposure to the identified Substance.
     * @param \FHIR_DSTU_TWO\FHIRResource\FHIRAllergyIntolerance\FHIRAllergyIntoleranceReaction[] $reaction
     * @return $this
     */
    public function addReaction($reaction)
    {
        $this->reaction[] = $reaction;
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
        if (null !== $this->onset) $json['onset'] = $this->onset->jsonSerialize();
        if (null !== $this->recordedDate) $json['recordedDate'] = $this->recordedDate->jsonSerialize();
        if (null !== $this->recorder) $json['recorder'] = $this->recorder->jsonSerialize();
        if (null !== $this->patient) $json['patient'] = $this->patient->jsonSerialize();
        if (null !== $this->reporter) $json['reporter'] = $this->reporter->jsonSerialize();
        if (null !== $this->substance) $json['substance'] = $this->substance->jsonSerialize();
        if (null !== $this->status) $json['status'] = $this->status->jsonSerialize();
        if (null !== $this->criticality) $json['criticality'] = $this->criticality->jsonSerialize();
        if (null !== $this->type) $json['type'] = $this->type->jsonSerialize();
        if (null !== $this->category) $json['category'] = $this->category->jsonSerialize();
        if (null !== $this->lastOccurence) $json['lastOccurence'] = $this->lastOccurence->jsonSerialize();
        if (null !== $this->note) $json['note'] = $this->note->jsonSerialize();
        if (0 < count($this->reaction)) {
            $json['reaction'] = array();
            foreach($this->reaction as $reaction) {
                $json['reaction'][] = $reaction->jsonSerialize();
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
        if (null === $sxe) $sxe = new \SimpleXMLElement('<AllergyIntolerance xmlns="http://hl7.org/fhir"></AllergyIntolerance>');
        parent::xmlSerialize(true, $sxe);
        if (0 < count($this->identifier)) {
            foreach($this->identifier as $identifier) {
                $identifier->xmlSerialize(true, $sxe->addChild('identifier'));
            }
        }
        if (null !== $this->onset) $this->onset->xmlSerialize(true, $sxe->addChild('onset'));
        if (null !== $this->recordedDate) $this->recordedDate->xmlSerialize(true, $sxe->addChild('recordedDate'));
        if (null !== $this->recorder) $this->recorder->xmlSerialize(true, $sxe->addChild('recorder'));
        if (null !== $this->patient) $this->patient->xmlSerialize(true, $sxe->addChild('patient'));
        if (null !== $this->reporter) $this->reporter->xmlSerialize(true, $sxe->addChild('reporter'));
        if (null !== $this->substance) $this->substance->xmlSerialize(true, $sxe->addChild('substance'));
        if (null !== $this->status) $this->status->xmlSerialize(true, $sxe->addChild('status'));
        if (null !== $this->criticality) $this->criticality->xmlSerialize(true, $sxe->addChild('criticality'));
        if (null !== $this->type) $this->type->xmlSerialize(true, $sxe->addChild('type'));
        if (null !== $this->category) $this->category->xmlSerialize(true, $sxe->addChild('category'));
        if (null !== $this->lastOccurence) $this->lastOccurence->xmlSerialize(true, $sxe->addChild('lastOccurence'));
        if (null !== $this->note) $this->note->xmlSerialize(true, $sxe->addChild('note'));
        if (0 < count($this->reaction)) {
            foreach($this->reaction as $reaction) {
                $reaction->xmlSerialize(true, $sxe->addChild('reaction'));
            }
        }
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}