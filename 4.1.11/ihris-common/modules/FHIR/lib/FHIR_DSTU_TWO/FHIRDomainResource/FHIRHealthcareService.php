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
 * The details of a healthcare service available at a location.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRHealthcareService extends FHIRDomainResource implements JsonSerializable
{
    /**
     * External identifiers for this item.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRIdentifier[]
     */
    public $identifier = array();

    /**
     * The organization that provides this healthcare service.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public $providedBy = null;

    /**
     * Identifies the broad category of service being performed or delivered.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept
     */
    public $serviceCategory = null;

    /**
     * A specific type of service that may be delivered or performed.
     * @var \FHIR_DSTU_TWO\FHIRResource\FHIRHealthcareService\FHIRHealthcareServiceServiceType[]
     */
    public $serviceType = array();

    /**
     * The location where this healthcare service may be provided.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public $location = null;

    /**
     * Further description of the service as it would be presented to a consumer while searching.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $serviceName = null;

    /**
     * Any additional description of the service and/or any specific issues not covered by the other attributes, which can be displayed as further detail under the serviceName.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $comment = null;

    /**
     * Extra details about the service that can't be placed in the other fields.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $extraDetails = null;

    /**
     * If there is a photo/symbol associated with this HealthcareService, it may be included here to facilitate quick identification of the service in a list.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRAttachment
     */
    public $photo = null;

    /**
     * List of contacts related to this specific healthcare service.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRContactPoint[]
     */
    public $telecom = array();

    /**
     * The location(s) that this service is available to (not where the service is provided).
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference[]
     */
    public $coverageArea = array();

    /**
     * The code(s) that detail the conditions under which the healthcare service is available/offered.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[]
     */
    public $serviceProvisionCode = array();

    /**
     * Does this service have specific eligibility requirements that need to be met in order to use the service?
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept
     */
    public $eligibility = null;

    /**
     * Describes the eligibility conditions for the service.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $eligibilityNote = null;

    /**
     * Program Names that can be used to categorize the service.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString[]
     */
    public $programName = array();

    /**
     * Collection of characteristics (attributes).
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[]
     */
    public $characteristic = array();

    /**
     * Ways that the service accepts referrals, if this is not provided then it is implied that no referral is required.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[]
     */
    public $referralMethod = array();

    /**
     * The public part of the 'keys' allocated to an Organization by an accredited body to support secure exchange of data over the internet. To be provided by the Organization, where available.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $publicKey = null;

    /**
     * Indicates whether or not a prospective consumer will require an appointment for a particular service at a site to be provided by the Organization. Indicates if an appointment is required for access to this service.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRBoolean
     */
    public $appointmentRequired = null;

    /**
     * A collection of times that the Service Site is available.
     * @var \FHIR_DSTU_TWO\FHIRResource\FHIRHealthcareService\FHIRHealthcareServiceAvailableTime[]
     */
    public $availableTime = array();

    /**
     * The HealthcareService is not available during this period of time due to the provided reason.
     * @var \FHIR_DSTU_TWO\FHIRResource\FHIRHealthcareService\FHIRHealthcareServiceNotAvailable[]
     */
    public $notAvailable = array();

    /**
     * A description of site availability exceptions, e.g. public holiday availability. Succinctly describing all possible exceptions to normal site availability as details in the available Times and not available Times.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $availabilityExceptions = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'HealthcareService';

    /**
     * External identifiers for this item.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRIdentifier[]
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * External identifiers for this item.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRIdentifier[] $identifier
     * @return $this
     */
    public function addIdentifier($identifier)
    {
        $this->identifier[] = $identifier;
        return $this;
    }

    /**
     * The organization that provides this healthcare service.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public function getProvidedBy()
    {
        return $this->providedBy;
    }

    /**
     * The organization that provides this healthcare service.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference $providedBy
     * @return $this
     */
    public function setProvidedBy($providedBy)
    {
        $this->providedBy = $providedBy;
        return $this;
    }

    /**
     * Identifies the broad category of service being performed or delivered.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept
     */
    public function getServiceCategory()
    {
        return $this->serviceCategory;
    }

    /**
     * Identifies the broad category of service being performed or delivered.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept $serviceCategory
     * @return $this
     */
    public function setServiceCategory($serviceCategory)
    {
        $this->serviceCategory = $serviceCategory;
        return $this;
    }

    /**
     * A specific type of service that may be delivered or performed.
     * @return \FHIR_DSTU_TWO\FHIRResource\FHIRHealthcareService\FHIRHealthcareServiceServiceType[]
     */
    public function getServiceType()
    {
        return $this->serviceType;
    }

    /**
     * A specific type of service that may be delivered or performed.
     * @param \FHIR_DSTU_TWO\FHIRResource\FHIRHealthcareService\FHIRHealthcareServiceServiceType[] $serviceType
     * @return $this
     */
    public function addServiceType($serviceType)
    {
        $this->serviceType[] = $serviceType;
        return $this;
    }

    /**
     * The location where this healthcare service may be provided.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * The location where this healthcare service may be provided.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference $location
     * @return $this
     */
    public function setLocation($location)
    {
        $this->location = $location;
        return $this;
    }

    /**
     * Further description of the service as it would be presented to a consumer while searching.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getServiceName()
    {
        return $this->serviceName;
    }

    /**
     * Further description of the service as it would be presented to a consumer while searching.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $serviceName
     * @return $this
     */
    public function setServiceName($serviceName)
    {
        $this->serviceName = $serviceName;
        return $this;
    }

    /**
     * Any additional description of the service and/or any specific issues not covered by the other attributes, which can be displayed as further detail under the serviceName.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Any additional description of the service and/or any specific issues not covered by the other attributes, which can be displayed as further detail under the serviceName.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $comment
     * @return $this
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * Extra details about the service that can't be placed in the other fields.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getExtraDetails()
    {
        return $this->extraDetails;
    }

    /**
     * Extra details about the service that can't be placed in the other fields.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $extraDetails
     * @return $this
     */
    public function setExtraDetails($extraDetails)
    {
        $this->extraDetails = $extraDetails;
        return $this;
    }

    /**
     * If there is a photo/symbol associated with this HealthcareService, it may be included here to facilitate quick identification of the service in a list.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRAttachment
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * If there is a photo/symbol associated with this HealthcareService, it may be included here to facilitate quick identification of the service in a list.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRAttachment $photo
     * @return $this
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
        return $this;
    }

    /**
     * List of contacts related to this specific healthcare service.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRContactPoint[]
     */
    public function getTelecom()
    {
        return $this->telecom;
    }

    /**
     * List of contacts related to this specific healthcare service.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRContactPoint[] $telecom
     * @return $this
     */
    public function addTelecom($telecom)
    {
        $this->telecom[] = $telecom;
        return $this;
    }

    /**
     * The location(s) that this service is available to (not where the service is provided).
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference[]
     */
    public function getCoverageArea()
    {
        return $this->coverageArea;
    }

    /**
     * The location(s) that this service is available to (not where the service is provided).
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference[] $coverageArea
     * @return $this
     */
    public function addCoverageArea($coverageArea)
    {
        $this->coverageArea[] = $coverageArea;
        return $this;
    }

    /**
     * The code(s) that detail the conditions under which the healthcare service is available/offered.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[]
     */
    public function getServiceProvisionCode()
    {
        return $this->serviceProvisionCode;
    }

    /**
     * The code(s) that detail the conditions under which the healthcare service is available/offered.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[] $serviceProvisionCode
     * @return $this
     */
    public function addServiceProvisionCode($serviceProvisionCode)
    {
        $this->serviceProvisionCode[] = $serviceProvisionCode;
        return $this;
    }

    /**
     * Does this service have specific eligibility requirements that need to be met in order to use the service?
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept
     */
    public function getEligibility()
    {
        return $this->eligibility;
    }

    /**
     * Does this service have specific eligibility requirements that need to be met in order to use the service?
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept $eligibility
     * @return $this
     */
    public function setEligibility($eligibility)
    {
        $this->eligibility = $eligibility;
        return $this;
    }

    /**
     * Describes the eligibility conditions for the service.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getEligibilityNote()
    {
        return $this->eligibilityNote;
    }

    /**
     * Describes the eligibility conditions for the service.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $eligibilityNote
     * @return $this
     */
    public function setEligibilityNote($eligibilityNote)
    {
        $this->eligibilityNote = $eligibilityNote;
        return $this;
    }

    /**
     * Program Names that can be used to categorize the service.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString[]
     */
    public function getProgramName()
    {
        return $this->programName;
    }

    /**
     * Program Names that can be used to categorize the service.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString[] $programName
     * @return $this
     */
    public function addProgramName($programName)
    {
        $this->programName[] = $programName;
        return $this;
    }

    /**
     * Collection of characteristics (attributes).
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[]
     */
    public function getCharacteristic()
    {
        return $this->characteristic;
    }

    /**
     * Collection of characteristics (attributes).
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[] $characteristic
     * @return $this
     */
    public function addCharacteristic($characteristic)
    {
        $this->characteristic[] = $characteristic;
        return $this;
    }

    /**
     * Ways that the service accepts referrals, if this is not provided then it is implied that no referral is required.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[]
     */
    public function getReferralMethod()
    {
        return $this->referralMethod;
    }

    /**
     * Ways that the service accepts referrals, if this is not provided then it is implied that no referral is required.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[] $referralMethod
     * @return $this
     */
    public function addReferralMethod($referralMethod)
    {
        $this->referralMethod[] = $referralMethod;
        return $this;
    }

    /**
     * The public part of the 'keys' allocated to an Organization by an accredited body to support secure exchange of data over the internet. To be provided by the Organization, where available.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getPublicKey()
    {
        return $this->publicKey;
    }

    /**
     * The public part of the 'keys' allocated to an Organization by an accredited body to support secure exchange of data over the internet. To be provided by the Organization, where available.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $publicKey
     * @return $this
     */
    public function setPublicKey($publicKey)
    {
        $this->publicKey = $publicKey;
        return $this;
    }

    /**
     * Indicates whether or not a prospective consumer will require an appointment for a particular service at a site to be provided by the Organization. Indicates if an appointment is required for access to this service.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRBoolean
     */
    public function getAppointmentRequired()
    {
        return $this->appointmentRequired;
    }

    /**
     * Indicates whether or not a prospective consumer will require an appointment for a particular service at a site to be provided by the Organization. Indicates if an appointment is required for access to this service.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRBoolean $appointmentRequired
     * @return $this
     */
    public function setAppointmentRequired($appointmentRequired)
    {
        $this->appointmentRequired = $appointmentRequired;
        return $this;
    }

    /**
     * A collection of times that the Service Site is available.
     * @return \FHIR_DSTU_TWO\FHIRResource\FHIRHealthcareService\FHIRHealthcareServiceAvailableTime[]
     */
    public function getAvailableTime()
    {
        return $this->availableTime;
    }

    /**
     * A collection of times that the Service Site is available.
     * @param \FHIR_DSTU_TWO\FHIRResource\FHIRHealthcareService\FHIRHealthcareServiceAvailableTime[] $availableTime
     * @return $this
     */
    public function addAvailableTime($availableTime)
    {
        $this->availableTime[] = $availableTime;
        return $this;
    }

    /**
     * The HealthcareService is not available during this period of time due to the provided reason.
     * @return \FHIR_DSTU_TWO\FHIRResource\FHIRHealthcareService\FHIRHealthcareServiceNotAvailable[]
     */
    public function getNotAvailable()
    {
        return $this->notAvailable;
    }

    /**
     * The HealthcareService is not available during this period of time due to the provided reason.
     * @param \FHIR_DSTU_TWO\FHIRResource\FHIRHealthcareService\FHIRHealthcareServiceNotAvailable[] $notAvailable
     * @return $this
     */
    public function addNotAvailable($notAvailable)
    {
        $this->notAvailable[] = $notAvailable;
        return $this;
    }

    /**
     * A description of site availability exceptions, e.g. public holiday availability. Succinctly describing all possible exceptions to normal site availability as details in the available Times and not available Times.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getAvailabilityExceptions()
    {
        return $this->availabilityExceptions;
    }

    /**
     * A description of site availability exceptions, e.g. public holiday availability. Succinctly describing all possible exceptions to normal site availability as details in the available Times and not available Times.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $availabilityExceptions
     * @return $this
     */
    public function setAvailabilityExceptions($availabilityExceptions)
    {
        $this->availabilityExceptions = $availabilityExceptions;
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
        if (null !== $this->providedBy) $json['providedBy'] = $this->providedBy->jsonSerialize();
        if (null !== $this->serviceCategory) $json['serviceCategory'] = $this->serviceCategory->jsonSerialize();
        if (0 < count($this->serviceType)) {
            $json['serviceType'] = array();
            foreach($this->serviceType as $serviceType) {
                $json['serviceType'][] = $serviceType->jsonSerialize();
            }
        }
        if (null !== $this->location) $json['location'] = $this->location->jsonSerialize();
        if (null !== $this->serviceName) $json['serviceName'] = $this->serviceName->jsonSerialize();
        if (null !== $this->comment) $json['comment'] = $this->comment->jsonSerialize();
        if (null !== $this->extraDetails) $json['extraDetails'] = $this->extraDetails->jsonSerialize();
        if (null !== $this->photo) $json['photo'] = $this->photo->jsonSerialize();
        if (0 < count($this->telecom)) {
            $json['telecom'] = array();
            foreach($this->telecom as $telecom) {
                $json['telecom'][] = $telecom->jsonSerialize();
            }
        }
        if (0 < count($this->coverageArea)) {
            $json['coverageArea'] = array();
            foreach($this->coverageArea as $coverageArea) {
                $json['coverageArea'][] = $coverageArea->jsonSerialize();
            }
        }
        if (0 < count($this->serviceProvisionCode)) {
            $json['serviceProvisionCode'] = array();
            foreach($this->serviceProvisionCode as $serviceProvisionCode) {
                $json['serviceProvisionCode'][] = $serviceProvisionCode->jsonSerialize();
            }
        }
        if (null !== $this->eligibility) $json['eligibility'] = $this->eligibility->jsonSerialize();
        if (null !== $this->eligibilityNote) $json['eligibilityNote'] = $this->eligibilityNote->jsonSerialize();
        if (0 < count($this->programName)) {
            $json['programName'] = array();
            foreach($this->programName as $programName) {
                $json['programName'][] = $programName->jsonSerialize();
            }
        }
        if (0 < count($this->characteristic)) {
            $json['characteristic'] = array();
            foreach($this->characteristic as $characteristic) {
                $json['characteristic'][] = $characteristic->jsonSerialize();
            }
        }
        if (0 < count($this->referralMethod)) {
            $json['referralMethod'] = array();
            foreach($this->referralMethod as $referralMethod) {
                $json['referralMethod'][] = $referralMethod->jsonSerialize();
            }
        }
        if (null !== $this->publicKey) $json['publicKey'] = $this->publicKey->jsonSerialize();
        if (null !== $this->appointmentRequired) $json['appointmentRequired'] = $this->appointmentRequired->jsonSerialize();
        if (0 < count($this->availableTime)) {
            $json['availableTime'] = array();
            foreach($this->availableTime as $availableTime) {
                $json['availableTime'][] = $availableTime->jsonSerialize();
            }
        }
        if (0 < count($this->notAvailable)) {
            $json['notAvailable'] = array();
            foreach($this->notAvailable as $notAvailable) {
                $json['notAvailable'][] = $notAvailable->jsonSerialize();
            }
        }
        if (null !== $this->availabilityExceptions) $json['availabilityExceptions'] = $this->availabilityExceptions->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<HealthcareService xmlns="http://hl7.org/fhir"></HealthcareService>');
        parent::xmlSerialize(true, $sxe);
        if (0 < count($this->identifier)) {
            foreach($this->identifier as $identifier) {
                $identifier->xmlSerialize(true, $sxe->addChild('identifier'));
            }
        }
        if (null !== $this->providedBy) $this->providedBy->xmlSerialize(true, $sxe->addChild('providedBy'));
        if (null !== $this->serviceCategory) $this->serviceCategory->xmlSerialize(true, $sxe->addChild('serviceCategory'));
        if (0 < count($this->serviceType)) {
            foreach($this->serviceType as $serviceType) {
                $serviceType->xmlSerialize(true, $sxe->addChild('serviceType'));
            }
        }
        if (null !== $this->location) $this->location->xmlSerialize(true, $sxe->addChild('location'));
        if (null !== $this->serviceName) $this->serviceName->xmlSerialize(true, $sxe->addChild('serviceName'));
        if (null !== $this->comment) $this->comment->xmlSerialize(true, $sxe->addChild('comment'));
        if (null !== $this->extraDetails) $this->extraDetails->xmlSerialize(true, $sxe->addChild('extraDetails'));
        if (null !== $this->photo) $this->photo->xmlSerialize(true, $sxe->addChild('photo'));
        if (0 < count($this->telecom)) {
            foreach($this->telecom as $telecom) {
                $telecom->xmlSerialize(true, $sxe->addChild('telecom'));
            }
        }
        if (0 < count($this->coverageArea)) {
            foreach($this->coverageArea as $coverageArea) {
                $coverageArea->xmlSerialize(true, $sxe->addChild('coverageArea'));
            }
        }
        if (0 < count($this->serviceProvisionCode)) {
            foreach($this->serviceProvisionCode as $serviceProvisionCode) {
                $serviceProvisionCode->xmlSerialize(true, $sxe->addChild('serviceProvisionCode'));
            }
        }
        if (null !== $this->eligibility) $this->eligibility->xmlSerialize(true, $sxe->addChild('eligibility'));
        if (null !== $this->eligibilityNote) $this->eligibilityNote->xmlSerialize(true, $sxe->addChild('eligibilityNote'));
        if (0 < count($this->programName)) {
            foreach($this->programName as $programName) {
                $programName->xmlSerialize(true, $sxe->addChild('programName'));
            }
        }
        if (0 < count($this->characteristic)) {
            foreach($this->characteristic as $characteristic) {
                $characteristic->xmlSerialize(true, $sxe->addChild('characteristic'));
            }
        }
        if (0 < count($this->referralMethod)) {
            foreach($this->referralMethod as $referralMethod) {
                $referralMethod->xmlSerialize(true, $sxe->addChild('referralMethod'));
            }
        }
        if (null !== $this->publicKey) $this->publicKey->xmlSerialize(true, $sxe->addChild('publicKey'));
        if (null !== $this->appointmentRequired) $this->appointmentRequired->xmlSerialize(true, $sxe->addChild('appointmentRequired'));
        if (0 < count($this->availableTime)) {
            foreach($this->availableTime as $availableTime) {
                $availableTime->xmlSerialize(true, $sxe->addChild('availableTime'));
            }
        }
        if (0 < count($this->notAvailable)) {
            foreach($this->notAvailable as $notAvailable) {
                $notAvailable->xmlSerialize(true, $sxe->addChild('notAvailable'));
            }
        }
        if (null !== $this->availabilityExceptions) $this->availabilityExceptions->xmlSerialize(true, $sxe->addChild('availabilityExceptions'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}