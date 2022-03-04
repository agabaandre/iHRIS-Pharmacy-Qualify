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
 * Use to record detailed information about conditions, problems or diagnoses recognized by a clinician. There are many uses including: recording a diagnosis during an encounter; populating a problem list or a summary statement, such as a discharge summary.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRCondition extends FHIRDomainResource implements JsonSerializable
{
    /**
     * This records identifiers associated with this condition that are defined by business processes and/or used to refer to it when a direct URL reference to the resource itself is not appropriate (e.g. in CDA documents, or in written / printed documentation).
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRIdentifier[]
     */
    public $identifier = array();

    /**
     * Indicates the patient who the condition record is associated with.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public $patient = null;

    /**
     * Encounter during which the condition was first asserted.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public $encounter = null;

    /**
     * Individual who is making the condition statement.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public $asserter = null;

    /**
     * A date, when  the Condition statement was documented.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRDate
     */
    public $dateRecorded = null;

    /**
     * Identification of the condition, problem or diagnosis.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept
     */
    public $code = null;

    /**
     * A category assigned to the condition.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept
     */
    public $category = null;

    /**
     * The clinical status of the condition.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCode
     */
    public $clinicalStatus = null;

    /**
     * The verification status to support the clinical status of the condition.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRConditionVerificationStatus
     */
    public $verificationStatus = null;

    /**
     * A subjective assessment of the severity of the condition as evaluated by the clinician.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept
     */
    public $severity = null;

    /**
     * Estimated or actual date or date-time  the condition began, in the opinion of the clinician. (choose any one of onset*, but only one)
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime
     */
    public $onsetDateTime = null;

    /**
     * Estimated or actual date or date-time  the condition began, in the opinion of the clinician. (choose any one of onset*, but only one)
     * @var \FHIR_DSTU_TWO\FHIRAge
     */
    public $onsetQuantity = null;

    /**
     * Estimated or actual date or date-time  the condition began, in the opinion of the clinician. (choose any one of onset*, but only one)
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRPeriod
     */
    public $onsetPeriod = null;

    /**
     * Estimated or actual date or date-time  the condition began, in the opinion of the clinician. (choose any one of onset*, but only one)
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRRange
     */
    public $onsetRange = null;

    /**
     * Estimated or actual date or date-time  the condition began, in the opinion of the clinician. (choose any one of onset*, but only one)
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $onsetString = null;

    /**
     * The date or estimated date that the condition resolved or went into remission. This is called "abatement" because of the many overloaded connotations associated with "remission" or "resolution" - Conditions are never really resolved, but they can abate. (choose any one of abatement*, but only one)
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime
     */
    public $abatementDateTime = null;

    /**
     * The date or estimated date that the condition resolved or went into remission. This is called "abatement" because of the many overloaded connotations associated with "remission" or "resolution" - Conditions are never really resolved, but they can abate. (choose any one of abatement*, but only one)
     * @var \FHIR_DSTU_TWO\FHIRAge
     */
    public $abatementQuantity = null;

    /**
     * The date or estimated date that the condition resolved or went into remission. This is called "abatement" because of the many overloaded connotations associated with "remission" or "resolution" - Conditions are never really resolved, but they can abate. (choose any one of abatement*, but only one)
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRBoolean
     */
    public $abatementBoolean = null;

    /**
     * The date or estimated date that the condition resolved or went into remission. This is called "abatement" because of the many overloaded connotations associated with "remission" or "resolution" - Conditions are never really resolved, but they can abate. (choose any one of abatement*, but only one)
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRPeriod
     */
    public $abatementPeriod = null;

    /**
     * The date or estimated date that the condition resolved or went into remission. This is called "abatement" because of the many overloaded connotations associated with "remission" or "resolution" - Conditions are never really resolved, but they can abate. (choose any one of abatement*, but only one)
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRRange
     */
    public $abatementRange = null;

    /**
     * The date or estimated date that the condition resolved or went into remission. This is called "abatement" because of the many overloaded connotations associated with "remission" or "resolution" - Conditions are never really resolved, but they can abate. (choose any one of abatement*, but only one)
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $abatementString = null;

    /**
     * Clinical stage or grade of a condition. May include formal severity assessments.
     * @var \FHIR_DSTU_TWO\FHIRResource\FHIRCondition\FHIRConditionStage
     */
    public $stage = null;

    /**
     * Supporting Evidence / manifestations that are the basis on which this condition is suspected or confirmed.
     * @var \FHIR_DSTU_TWO\FHIRResource\FHIRCondition\FHIRConditionEvidence[]
     */
    public $evidence = array();

    /**
     * The anatomical location where this condition manifests itself.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[]
     */
    public $bodySite = array();

    /**
     * Additional information about the Condition. This is a general notes/comments entry  for description of the Condition, its diagnosis and prognosis.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $notes = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'Condition';

    /**
     * This records identifiers associated with this condition that are defined by business processes and/or used to refer to it when a direct URL reference to the resource itself is not appropriate (e.g. in CDA documents, or in written / printed documentation).
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRIdentifier[]
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * This records identifiers associated with this condition that are defined by business processes and/or used to refer to it when a direct URL reference to the resource itself is not appropriate (e.g. in CDA documents, or in written / printed documentation).
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRIdentifier[] $identifier
     * @return $this
     */
    public function addIdentifier($identifier)
    {
        $this->identifier[] = $identifier;
        return $this;
    }

    /**
     * Indicates the patient who the condition record is associated with.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * Indicates the patient who the condition record is associated with.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference $patient
     * @return $this
     */
    public function setPatient($patient)
    {
        $this->patient = $patient;
        return $this;
    }

    /**
     * Encounter during which the condition was first asserted.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public function getEncounter()
    {
        return $this->encounter;
    }

    /**
     * Encounter during which the condition was first asserted.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference $encounter
     * @return $this
     */
    public function setEncounter($encounter)
    {
        $this->encounter = $encounter;
        return $this;
    }

    /**
     * Individual who is making the condition statement.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public function getAsserter()
    {
        return $this->asserter;
    }

    /**
     * Individual who is making the condition statement.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference $asserter
     * @return $this
     */
    public function setAsserter($asserter)
    {
        $this->asserter = $asserter;
        return $this;
    }

    /**
     * A date, when  the Condition statement was documented.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRDate
     */
    public function getDateRecorded()
    {
        return $this->dateRecorded;
    }

    /**
     * A date, when  the Condition statement was documented.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRDate $dateRecorded
     * @return $this
     */
    public function setDateRecorded($dateRecorded)
    {
        $this->dateRecorded = $dateRecorded;
        return $this;
    }

    /**
     * Identification of the condition, problem or diagnosis.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Identification of the condition, problem or diagnosis.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept $code
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * A category assigned to the condition.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * A category assigned to the condition.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept $category
     * @return $this
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * The clinical status of the condition.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCode
     */
    public function getClinicalStatus()
    {
        return $this->clinicalStatus;
    }

    /**
     * The clinical status of the condition.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCode $clinicalStatus
     * @return $this
     */
    public function setClinicalStatus($clinicalStatus)
    {
        $this->clinicalStatus = $clinicalStatus;
        return $this;
    }

    /**
     * The verification status to support the clinical status of the condition.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRConditionVerificationStatus
     */
    public function getVerificationStatus()
    {
        return $this->verificationStatus;
    }

    /**
     * The verification status to support the clinical status of the condition.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRConditionVerificationStatus $verificationStatus
     * @return $this
     */
    public function setVerificationStatus($verificationStatus)
    {
        $this->verificationStatus = $verificationStatus;
        return $this;
    }

    /**
     * A subjective assessment of the severity of the condition as evaluated by the clinician.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept
     */
    public function getSeverity()
    {
        return $this->severity;
    }

    /**
     * A subjective assessment of the severity of the condition as evaluated by the clinician.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept $severity
     * @return $this
     */
    public function setSeverity($severity)
    {
        $this->severity = $severity;
        return $this;
    }

    /**
     * Estimated or actual date or date-time  the condition began, in the opinion of the clinician. (choose any one of onset*, but only one)
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime
     */
    public function getOnsetDateTime()
    {
        return $this->onsetDateTime;
    }

    /**
     * Estimated or actual date or date-time  the condition began, in the opinion of the clinician. (choose any one of onset*, but only one)
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime $onsetDateTime
     * @return $this
     */
    public function setOnsetDateTime($onsetDateTime)
    {
        $this->onsetDateTime = $onsetDateTime;
        return $this;
    }

    /**
     * Estimated or actual date or date-time  the condition began, in the opinion of the clinician. (choose any one of onset*, but only one)
     * @return \FHIR_DSTU_TWO\FHIRAge
     */
    public function getOnsetQuantity()
    {
        return $this->onsetQuantity;
    }

    /**
     * Estimated or actual date or date-time  the condition began, in the opinion of the clinician. (choose any one of onset*, but only one)
     * @param \FHIR_DSTU_TWO\FHIRAge $onsetQuantity
     * @return $this
     */
    public function setOnsetQuantity($onsetQuantity)
    {
        $this->onsetQuantity = $onsetQuantity;
        return $this;
    }

    /**
     * Estimated or actual date or date-time  the condition began, in the opinion of the clinician. (choose any one of onset*, but only one)
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRPeriod
     */
    public function getOnsetPeriod()
    {
        return $this->onsetPeriod;
    }

    /**
     * Estimated or actual date or date-time  the condition began, in the opinion of the clinician. (choose any one of onset*, but only one)
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRPeriod $onsetPeriod
     * @return $this
     */
    public function setOnsetPeriod($onsetPeriod)
    {
        $this->onsetPeriod = $onsetPeriod;
        return $this;
    }

    /**
     * Estimated or actual date or date-time  the condition began, in the opinion of the clinician. (choose any one of onset*, but only one)
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRRange
     */
    public function getOnsetRange()
    {
        return $this->onsetRange;
    }

    /**
     * Estimated or actual date or date-time  the condition began, in the opinion of the clinician. (choose any one of onset*, but only one)
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRRange $onsetRange
     * @return $this
     */
    public function setOnsetRange($onsetRange)
    {
        $this->onsetRange = $onsetRange;
        return $this;
    }

    /**
     * Estimated or actual date or date-time  the condition began, in the opinion of the clinician. (choose any one of onset*, but only one)
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getOnsetString()
    {
        return $this->onsetString;
    }

    /**
     * Estimated or actual date or date-time  the condition began, in the opinion of the clinician. (choose any one of onset*, but only one)
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $onsetString
     * @return $this
     */
    public function setOnsetString($onsetString)
    {
        $this->onsetString = $onsetString;
        return $this;
    }

    /**
     * The date or estimated date that the condition resolved or went into remission. This is called "abatement" because of the many overloaded connotations associated with "remission" or "resolution" - Conditions are never really resolved, but they can abate. (choose any one of abatement*, but only one)
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime
     */
    public function getAbatementDateTime()
    {
        return $this->abatementDateTime;
    }

    /**
     * The date or estimated date that the condition resolved or went into remission. This is called "abatement" because of the many overloaded connotations associated with "remission" or "resolution" - Conditions are never really resolved, but they can abate. (choose any one of abatement*, but only one)
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime $abatementDateTime
     * @return $this
     */
    public function setAbatementDateTime($abatementDateTime)
    {
        $this->abatementDateTime = $abatementDateTime;
        return $this;
    }

    /**
     * The date or estimated date that the condition resolved or went into remission. This is called "abatement" because of the many overloaded connotations associated with "remission" or "resolution" - Conditions are never really resolved, but they can abate. (choose any one of abatement*, but only one)
     * @return \FHIR_DSTU_TWO\FHIRAge
     */
    public function getAbatementQuantity()
    {
        return $this->abatementQuantity;
    }

    /**
     * The date or estimated date that the condition resolved or went into remission. This is called "abatement" because of the many overloaded connotations associated with "remission" or "resolution" - Conditions are never really resolved, but they can abate. (choose any one of abatement*, but only one)
     * @param \FHIR_DSTU_TWO\FHIRAge $abatementQuantity
     * @return $this
     */
    public function setAbatementQuantity($abatementQuantity)
    {
        $this->abatementQuantity = $abatementQuantity;
        return $this;
    }

    /**
     * The date or estimated date that the condition resolved or went into remission. This is called "abatement" because of the many overloaded connotations associated with "remission" or "resolution" - Conditions are never really resolved, but they can abate. (choose any one of abatement*, but only one)
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRBoolean
     */
    public function getAbatementBoolean()
    {
        return $this->abatementBoolean;
    }

    /**
     * The date or estimated date that the condition resolved or went into remission. This is called "abatement" because of the many overloaded connotations associated with "remission" or "resolution" - Conditions are never really resolved, but they can abate. (choose any one of abatement*, but only one)
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRBoolean $abatementBoolean
     * @return $this
     */
    public function setAbatementBoolean($abatementBoolean)
    {
        $this->abatementBoolean = $abatementBoolean;
        return $this;
    }

    /**
     * The date or estimated date that the condition resolved or went into remission. This is called "abatement" because of the many overloaded connotations associated with "remission" or "resolution" - Conditions are never really resolved, but they can abate. (choose any one of abatement*, but only one)
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRPeriod
     */
    public function getAbatementPeriod()
    {
        return $this->abatementPeriod;
    }

    /**
     * The date or estimated date that the condition resolved or went into remission. This is called "abatement" because of the many overloaded connotations associated with "remission" or "resolution" - Conditions are never really resolved, but they can abate. (choose any one of abatement*, but only one)
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRPeriod $abatementPeriod
     * @return $this
     */
    public function setAbatementPeriod($abatementPeriod)
    {
        $this->abatementPeriod = $abatementPeriod;
        return $this;
    }

    /**
     * The date or estimated date that the condition resolved or went into remission. This is called "abatement" because of the many overloaded connotations associated with "remission" or "resolution" - Conditions are never really resolved, but they can abate. (choose any one of abatement*, but only one)
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRRange
     */
    public function getAbatementRange()
    {
        return $this->abatementRange;
    }

    /**
     * The date or estimated date that the condition resolved or went into remission. This is called "abatement" because of the many overloaded connotations associated with "remission" or "resolution" - Conditions are never really resolved, but they can abate. (choose any one of abatement*, but only one)
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRRange $abatementRange
     * @return $this
     */
    public function setAbatementRange($abatementRange)
    {
        $this->abatementRange = $abatementRange;
        return $this;
    }

    /**
     * The date or estimated date that the condition resolved or went into remission. This is called "abatement" because of the many overloaded connotations associated with "remission" or "resolution" - Conditions are never really resolved, but they can abate. (choose any one of abatement*, but only one)
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getAbatementString()
    {
        return $this->abatementString;
    }

    /**
     * The date or estimated date that the condition resolved or went into remission. This is called "abatement" because of the many overloaded connotations associated with "remission" or "resolution" - Conditions are never really resolved, but they can abate. (choose any one of abatement*, but only one)
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $abatementString
     * @return $this
     */
    public function setAbatementString($abatementString)
    {
        $this->abatementString = $abatementString;
        return $this;
    }

    /**
     * Clinical stage or grade of a condition. May include formal severity assessments.
     * @return \FHIR_DSTU_TWO\FHIRResource\FHIRCondition\FHIRConditionStage
     */
    public function getStage()
    {
        return $this->stage;
    }

    /**
     * Clinical stage or grade of a condition. May include formal severity assessments.
     * @param \FHIR_DSTU_TWO\FHIRResource\FHIRCondition\FHIRConditionStage $stage
     * @return $this
     */
    public function setStage($stage)
    {
        $this->stage = $stage;
        return $this;
    }

    /**
     * Supporting Evidence / manifestations that are the basis on which this condition is suspected or confirmed.
     * @return \FHIR_DSTU_TWO\FHIRResource\FHIRCondition\FHIRConditionEvidence[]
     */
    public function getEvidence()
    {
        return $this->evidence;
    }

    /**
     * Supporting Evidence / manifestations that are the basis on which this condition is suspected or confirmed.
     * @param \FHIR_DSTU_TWO\FHIRResource\FHIRCondition\FHIRConditionEvidence[] $evidence
     * @return $this
     */
    public function addEvidence($evidence)
    {
        $this->evidence[] = $evidence;
        return $this;
    }

    /**
     * The anatomical location where this condition manifests itself.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[]
     */
    public function getBodySite()
    {
        return $this->bodySite;
    }

    /**
     * The anatomical location where this condition manifests itself.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[] $bodySite
     * @return $this
     */
    public function addBodySite($bodySite)
    {
        $this->bodySite[] = $bodySite;
        return $this;
    }

    /**
     * Additional information about the Condition. This is a general notes/comments entry  for description of the Condition, its diagnosis and prognosis.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Additional information about the Condition. This is a general notes/comments entry  for description of the Condition, its diagnosis and prognosis.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $notes
     * @return $this
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
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
        if (null !== $this->patient) $json['patient'] = $this->patient->jsonSerialize();
        if (null !== $this->encounter) $json['encounter'] = $this->encounter->jsonSerialize();
        if (null !== $this->asserter) $json['asserter'] = $this->asserter->jsonSerialize();
        if (null !== $this->dateRecorded) $json['dateRecorded'] = $this->dateRecorded->jsonSerialize();
        if (null !== $this->code) $json['code'] = $this->code->jsonSerialize();
        if (null !== $this->category) $json['category'] = $this->category->jsonSerialize();
        if (null !== $this->clinicalStatus) $json['clinicalStatus'] = $this->clinicalStatus->jsonSerialize();
        if (null !== $this->verificationStatus) $json['verificationStatus'] = $this->verificationStatus->jsonSerialize();
        if (null !== $this->severity) $json['severity'] = $this->severity->jsonSerialize();
        if (null !== $this->onsetDateTime) $json['onsetDateTime'] = $this->onsetDateTime->jsonSerialize();
        if (null !== $this->onsetQuantity) $json['onsetQuantity'] = $this->onsetQuantity->jsonSerialize();
        if (null !== $this->onsetPeriod) $json['onsetPeriod'] = $this->onsetPeriod->jsonSerialize();
        if (null !== $this->onsetRange) $json['onsetRange'] = $this->onsetRange->jsonSerialize();
        if (null !== $this->onsetString) $json['onsetString'] = $this->onsetString->jsonSerialize();
        if (null !== $this->abatementDateTime) $json['abatementDateTime'] = $this->abatementDateTime->jsonSerialize();
        if (null !== $this->abatementQuantity) $json['abatementQuantity'] = $this->abatementQuantity->jsonSerialize();
        if (null !== $this->abatementBoolean) $json['abatementBoolean'] = $this->abatementBoolean->jsonSerialize();
        if (null !== $this->abatementPeriod) $json['abatementPeriod'] = $this->abatementPeriod->jsonSerialize();
        if (null !== $this->abatementRange) $json['abatementRange'] = $this->abatementRange->jsonSerialize();
        if (null !== $this->abatementString) $json['abatementString'] = $this->abatementString->jsonSerialize();
        if (null !== $this->stage) $json['stage'] = $this->stage->jsonSerialize();
        if (0 < count($this->evidence)) {
            $json['evidence'] = array();
            foreach($this->evidence as $evidence) {
                $json['evidence'][] = $evidence->jsonSerialize();
            }
        }
        if (0 < count($this->bodySite)) {
            $json['bodySite'] = array();
            foreach($this->bodySite as $bodySite) {
                $json['bodySite'][] = $bodySite->jsonSerialize();
            }
        }
        if (null !== $this->notes) $json['notes'] = $this->notes->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<Condition xmlns="http://hl7.org/fhir"></Condition>');
        parent::xmlSerialize(true, $sxe);
        if (0 < count($this->identifier)) {
            foreach($this->identifier as $identifier) {
                $identifier->xmlSerialize(true, $sxe->addChild('identifier'));
            }
        }
        if (null !== $this->patient) $this->patient->xmlSerialize(true, $sxe->addChild('patient'));
        if (null !== $this->encounter) $this->encounter->xmlSerialize(true, $sxe->addChild('encounter'));
        if (null !== $this->asserter) $this->asserter->xmlSerialize(true, $sxe->addChild('asserter'));
        if (null !== $this->dateRecorded) $this->dateRecorded->xmlSerialize(true, $sxe->addChild('dateRecorded'));
        if (null !== $this->code) $this->code->xmlSerialize(true, $sxe->addChild('code'));
        if (null !== $this->category) $this->category->xmlSerialize(true, $sxe->addChild('category'));
        if (null !== $this->clinicalStatus) $this->clinicalStatus->xmlSerialize(true, $sxe->addChild('clinicalStatus'));
        if (null !== $this->verificationStatus) $this->verificationStatus->xmlSerialize(true, $sxe->addChild('verificationStatus'));
        if (null !== $this->severity) $this->severity->xmlSerialize(true, $sxe->addChild('severity'));
        if (null !== $this->onsetDateTime) $this->onsetDateTime->xmlSerialize(true, $sxe->addChild('onsetDateTime'));
        if (null !== $this->onsetQuantity) $this->onsetQuantity->xmlSerialize(true, $sxe->addChild('onsetQuantity'));
        if (null !== $this->onsetPeriod) $this->onsetPeriod->xmlSerialize(true, $sxe->addChild('onsetPeriod'));
        if (null !== $this->onsetRange) $this->onsetRange->xmlSerialize(true, $sxe->addChild('onsetRange'));
        if (null !== $this->onsetString) $this->onsetString->xmlSerialize(true, $sxe->addChild('onsetString'));
        if (null !== $this->abatementDateTime) $this->abatementDateTime->xmlSerialize(true, $sxe->addChild('abatementDateTime'));
        if (null !== $this->abatementQuantity) $this->abatementQuantity->xmlSerialize(true, $sxe->addChild('abatementQuantity'));
        if (null !== $this->abatementBoolean) $this->abatementBoolean->xmlSerialize(true, $sxe->addChild('abatementBoolean'));
        if (null !== $this->abatementPeriod) $this->abatementPeriod->xmlSerialize(true, $sxe->addChild('abatementPeriod'));
        if (null !== $this->abatementRange) $this->abatementRange->xmlSerialize(true, $sxe->addChild('abatementRange'));
        if (null !== $this->abatementString) $this->abatementString->xmlSerialize(true, $sxe->addChild('abatementString'));
        if (null !== $this->stage) $this->stage->xmlSerialize(true, $sxe->addChild('stage'));
        if (0 < count($this->evidence)) {
            foreach($this->evidence as $evidence) {
                $evidence->xmlSerialize(true, $sxe->addChild('evidence'));
            }
        }
        if (0 < count($this->bodySite)) {
            foreach($this->bodySite as $bodySite) {
                $bodySite->xmlSerialize(true, $sxe->addChild('bodySite'));
            }
        }
        if (null !== $this->notes) $this->notes->xmlSerialize(true, $sxe->addChild('notes'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}