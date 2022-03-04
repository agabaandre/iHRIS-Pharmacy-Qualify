<?php namespace FHIR_DSTU_TWO\FHIRResource\FHIRClaim;

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
 * A provider issued list of services and products provided, or to be provided, to a patient which is provided to an insurer for payment recovery.
 */
class FHIRClaimItem extends FHIRBackboneElement implements JsonSerializable
{
    /**
     * A service line number.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRPositiveInt
     */
    public $sequence = null;

    /**
     * The type of product or service.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCoding
     */
    public $type = null;

    /**
     * The practitioner who is responsible for the services rendered to the patient.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public $provider = null;

    /**
     * Diagnosis applicable for this service or product line.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRPositiveInt[]
     */
    public $diagnosisLinkId = array();

    /**
     * If a grouping item then 'GROUP' otherwise it is a node therefore a code to indicate the Professional Service or Product supplied.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCoding
     */
    public $service = null;

    /**
     * The date when the enclosed suite of services were performed or completed.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRDate
     */
    public $serviceDate = null;

    /**
     * The number of repetitions of a service or product.
     * @var \FHIR_DSTU_TWO\FHIRSimpleQuantity
     */
    public $quantity = null;

    /**
     * If the item is a node then this is the fee for the product or service, otherwise this is the total of the fees for the children of the group.
     * @var \FHIR_DSTU_TWO\FHIRMoney
     */
    public $unitPrice = null;

    /**
     * A real number that represents a multiplier used in determining the overall value of services delivered and/or goods received. The concept of a Factor allows for a discount or surcharge multiplier to be applied to a monetary amount.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRDecimal
     */
    public $factor = null;

    /**
     * An amount that expresses the weighting (based on difficulty, cost and/or resource intensiveness) associated with the good or service delivered. The concept of Points allows for assignment of point values for services and/or goods, such that a monetary amount can be assigned to each point.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRDecimal
     */
    public $points = null;

    /**
     * The quantity times the unit price for an additional  service or product or charge. For example, the formula: unit Quantity * unit Price (Cost per Point) * factor Number  * points = net Amount. Quantity, factor and points are assumed to be 1 if not supplied.
     * @var \FHIR_DSTU_TWO\FHIRMoney
     */
    public $net = null;

    /**
     * List of Unique Device Identifiers associated with this line item.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCoding
     */
    public $udi = null;

    /**
     * Physical service site on the patient (limb, tooth, etc.).
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCoding
     */
    public $bodySite = null;

    /**
     * A region or surface of the site, e.g. limb region or tooth surface(s).
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCoding[]
     */
    public $subSite = array();

    /**
     * Item typification or modifiers codes, e.g. for Oral whether the treatment is cosmetic or associated with TMJ, or an appliance was lost or stolen.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCoding[]
     */
    public $modifier = array();

    /**
     * Second tier of goods and services.
     * @var \FHIR_DSTU_TWO\FHIRResource\FHIRClaim\FHIRClaimDetail[]
     */
    public $detail = array();

    /**
     * The materials and placement date of prior fixed prosthesis.
     * @var \FHIR_DSTU_TWO\FHIRResource\FHIRClaim\FHIRClaimProsthesis
     */
    public $prosthesis = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'Claim.Item';

    /**
     * A service line number.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRPositiveInt
     */
    public function getSequence()
    {
        return $this->sequence;
    }

    /**
     * A service line number.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRPositiveInt $sequence
     * @return $this
     */
    public function setSequence($sequence)
    {
        $this->sequence = $sequence;
        return $this;
    }

    /**
     * The type of product or service.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCoding
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * The type of product or service.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCoding $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * The practitioner who is responsible for the services rendered to the patient.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * The practitioner who is responsible for the services rendered to the patient.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference $provider
     * @return $this
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;
        return $this;
    }

    /**
     * Diagnosis applicable for this service or product line.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRPositiveInt[]
     */
    public function getDiagnosisLinkId()
    {
        return $this->diagnosisLinkId;
    }

    /**
     * Diagnosis applicable for this service or product line.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRPositiveInt[] $diagnosisLinkId
     * @return $this
     */
    public function addDiagnosisLinkId($diagnosisLinkId)
    {
        $this->diagnosisLinkId[] = $diagnosisLinkId;
        return $this;
    }

    /**
     * If a grouping item then 'GROUP' otherwise it is a node therefore a code to indicate the Professional Service or Product supplied.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCoding
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * If a grouping item then 'GROUP' otherwise it is a node therefore a code to indicate the Professional Service or Product supplied.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCoding $service
     * @return $this
     */
    public function setService($service)
    {
        $this->service = $service;
        return $this;
    }

    /**
     * The date when the enclosed suite of services were performed or completed.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRDate
     */
    public function getServiceDate()
    {
        return $this->serviceDate;
    }

    /**
     * The date when the enclosed suite of services were performed or completed.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRDate $serviceDate
     * @return $this
     */
    public function setServiceDate($serviceDate)
    {
        $this->serviceDate = $serviceDate;
        return $this;
    }

    /**
     * The number of repetitions of a service or product.
     * @return \FHIR_DSTU_TWO\FHIRSimpleQuantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * The number of repetitions of a service or product.
     * @param \FHIR_DSTU_TWO\FHIRSimpleQuantity $quantity
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * If the item is a node then this is the fee for the product or service, otherwise this is the total of the fees for the children of the group.
     * @return \FHIR_DSTU_TWO\FHIRMoney
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * If the item is a node then this is the fee for the product or service, otherwise this is the total of the fees for the children of the group.
     * @param \FHIR_DSTU_TWO\FHIRMoney $unitPrice
     * @return $this
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;
        return $this;
    }

    /**
     * A real number that represents a multiplier used in determining the overall value of services delivered and/or goods received. The concept of a Factor allows for a discount or surcharge multiplier to be applied to a monetary amount.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRDecimal
     */
    public function getFactor()
    {
        return $this->factor;
    }

    /**
     * A real number that represents a multiplier used in determining the overall value of services delivered and/or goods received. The concept of a Factor allows for a discount or surcharge multiplier to be applied to a monetary amount.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRDecimal $factor
     * @return $this
     */
    public function setFactor($factor)
    {
        $this->factor = $factor;
        return $this;
    }

    /**
     * An amount that expresses the weighting (based on difficulty, cost and/or resource intensiveness) associated with the good or service delivered. The concept of Points allows for assignment of point values for services and/or goods, such that a monetary amount can be assigned to each point.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRDecimal
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * An amount that expresses the weighting (based on difficulty, cost and/or resource intensiveness) associated with the good or service delivered. The concept of Points allows for assignment of point values for services and/or goods, such that a monetary amount can be assigned to each point.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRDecimal $points
     * @return $this
     */
    public function setPoints($points)
    {
        $this->points = $points;
        return $this;
    }

    /**
     * The quantity times the unit price for an additional  service or product or charge. For example, the formula: unit Quantity * unit Price (Cost per Point) * factor Number  * points = net Amount. Quantity, factor and points are assumed to be 1 if not supplied.
     * @return \FHIR_DSTU_TWO\FHIRMoney
     */
    public function getNet()
    {
        return $this->net;
    }

    /**
     * The quantity times the unit price for an additional  service or product or charge. For example, the formula: unit Quantity * unit Price (Cost per Point) * factor Number  * points = net Amount. Quantity, factor and points are assumed to be 1 if not supplied.
     * @param \FHIR_DSTU_TWO\FHIRMoney $net
     * @return $this
     */
    public function setNet($net)
    {
        $this->net = $net;
        return $this;
    }

    /**
     * List of Unique Device Identifiers associated with this line item.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCoding
     */
    public function getUdi()
    {
        return $this->udi;
    }

    /**
     * List of Unique Device Identifiers associated with this line item.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCoding $udi
     * @return $this
     */
    public function setUdi($udi)
    {
        $this->udi = $udi;
        return $this;
    }

    /**
     * Physical service site on the patient (limb, tooth, etc.).
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCoding
     */
    public function getBodySite()
    {
        return $this->bodySite;
    }

    /**
     * Physical service site on the patient (limb, tooth, etc.).
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCoding $bodySite
     * @return $this
     */
    public function setBodySite($bodySite)
    {
        $this->bodySite = $bodySite;
        return $this;
    }

    /**
     * A region or surface of the site, e.g. limb region or tooth surface(s).
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCoding[]
     */
    public function getSubSite()
    {
        return $this->subSite;
    }

    /**
     * A region or surface of the site, e.g. limb region or tooth surface(s).
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCoding[] $subSite
     * @return $this
     */
    public function addSubSite($subSite)
    {
        $this->subSite[] = $subSite;
        return $this;
    }

    /**
     * Item typification or modifiers codes, e.g. for Oral whether the treatment is cosmetic or associated with TMJ, or an appliance was lost or stolen.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCoding[]
     */
    public function getModifier()
    {
        return $this->modifier;
    }

    /**
     * Item typification or modifiers codes, e.g. for Oral whether the treatment is cosmetic or associated with TMJ, or an appliance was lost or stolen.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCoding[] $modifier
     * @return $this
     */
    public function addModifier($modifier)
    {
        $this->modifier[] = $modifier;
        return $this;
    }

    /**
     * Second tier of goods and services.
     * @return \FHIR_DSTU_TWO\FHIRResource\FHIRClaim\FHIRClaimDetail[]
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * Second tier of goods and services.
     * @param \FHIR_DSTU_TWO\FHIRResource\FHIRClaim\FHIRClaimDetail[] $detail
     * @return $this
     */
    public function addDetail($detail)
    {
        $this->detail[] = $detail;
        return $this;
    }

    /**
     * The materials and placement date of prior fixed prosthesis.
     * @return \FHIR_DSTU_TWO\FHIRResource\FHIRClaim\FHIRClaimProsthesis
     */
    public function getProsthesis()
    {
        return $this->prosthesis;
    }

    /**
     * The materials and placement date of prior fixed prosthesis.
     * @param \FHIR_DSTU_TWO\FHIRResource\FHIRClaim\FHIRClaimProsthesis $prosthesis
     * @return $this
     */
    public function setProsthesis($prosthesis)
    {
        $this->prosthesis = $prosthesis;
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
        if (null !== $this->sequence) $json['sequence'] = $this->sequence->jsonSerialize();
        if (null !== $this->type) $json['type'] = $this->type->jsonSerialize();
        if (null !== $this->provider) $json['provider'] = $this->provider->jsonSerialize();
        if (0 < count($this->diagnosisLinkId)) {
            $json['diagnosisLinkId'] = array();
            foreach($this->diagnosisLinkId as $diagnosisLinkId) {
                $json['diagnosisLinkId'][] = $diagnosisLinkId->jsonSerialize();
            }
        }
        if (null !== $this->service) $json['service'] = $this->service->jsonSerialize();
        if (null !== $this->serviceDate) $json['serviceDate'] = $this->serviceDate->jsonSerialize();
        if (null !== $this->quantity) $json['quantity'] = $this->quantity->jsonSerialize();
        if (null !== $this->unitPrice) $json['unitPrice'] = $this->unitPrice->jsonSerialize();
        if (null !== $this->factor) $json['factor'] = $this->factor->jsonSerialize();
        if (null !== $this->points) $json['points'] = $this->points->jsonSerialize();
        if (null !== $this->net) $json['net'] = $this->net->jsonSerialize();
        if (null !== $this->udi) $json['udi'] = $this->udi->jsonSerialize();
        if (null !== $this->bodySite) $json['bodySite'] = $this->bodySite->jsonSerialize();
        if (0 < count($this->subSite)) {
            $json['subSite'] = array();
            foreach($this->subSite as $subSite) {
                $json['subSite'][] = $subSite->jsonSerialize();
            }
        }
        if (0 < count($this->modifier)) {
            $json['modifier'] = array();
            foreach($this->modifier as $modifier) {
                $json['modifier'][] = $modifier->jsonSerialize();
            }
        }
        if (0 < count($this->detail)) {
            $json['detail'] = array();
            foreach($this->detail as $detail) {
                $json['detail'][] = $detail->jsonSerialize();
            }
        }
        if (null !== $this->prosthesis) $json['prosthesis'] = $this->prosthesis->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<ClaimItem xmlns="http://hl7.org/fhir"></ClaimItem>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->sequence) $this->sequence->xmlSerialize(true, $sxe->addChild('sequence'));
        if (null !== $this->type) $this->type->xmlSerialize(true, $sxe->addChild('type'));
        if (null !== $this->provider) $this->provider->xmlSerialize(true, $sxe->addChild('provider'));
        if (0 < count($this->diagnosisLinkId)) {
            foreach($this->diagnosisLinkId as $diagnosisLinkId) {
                $diagnosisLinkId->xmlSerialize(true, $sxe->addChild('diagnosisLinkId'));
            }
        }
        if (null !== $this->service) $this->service->xmlSerialize(true, $sxe->addChild('service'));
        if (null !== $this->serviceDate) $this->serviceDate->xmlSerialize(true, $sxe->addChild('serviceDate'));
        if (null !== $this->quantity) $this->quantity->xmlSerialize(true, $sxe->addChild('quantity'));
        if (null !== $this->unitPrice) $this->unitPrice->xmlSerialize(true, $sxe->addChild('unitPrice'));
        if (null !== $this->factor) $this->factor->xmlSerialize(true, $sxe->addChild('factor'));
        if (null !== $this->points) $this->points->xmlSerialize(true, $sxe->addChild('points'));
        if (null !== $this->net) $this->net->xmlSerialize(true, $sxe->addChild('net'));
        if (null !== $this->udi) $this->udi->xmlSerialize(true, $sxe->addChild('udi'));
        if (null !== $this->bodySite) $this->bodySite->xmlSerialize(true, $sxe->addChild('bodySite'));
        if (0 < count($this->subSite)) {
            foreach($this->subSite as $subSite) {
                $subSite->xmlSerialize(true, $sxe->addChild('subSite'));
            }
        }
        if (0 < count($this->modifier)) {
            foreach($this->modifier as $modifier) {
                $modifier->xmlSerialize(true, $sxe->addChild('modifier'));
            }
        }
        if (0 < count($this->detail)) {
            foreach($this->detail as $detail) {
                $detail->xmlSerialize(true, $sxe->addChild('detail'));
            }
        }
        if (null !== $this->prosthesis) $this->prosthesis->xmlSerialize(true, $sxe->addChild('prosthesis'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}