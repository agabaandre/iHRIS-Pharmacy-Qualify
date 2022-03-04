<?php namespace FHIR_DSTU_TWO\FHIRResource\FHIRNutritionOrder;

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
 * A request to supply a diet, formula feeding (enteral) or oral nutritional supplement to a patient/resident.
 */
class FHIRNutritionOrderOralDiet extends FHIRBackboneElement implements JsonSerializable
{
    /**
     * The kind of diet or dietary restriction such as fiber restricted diet or diabetic diet.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[]
     */
    public $type = array();

    /**
     * The time period and frequency at which the diet should be given.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRTiming[]
     */
    public $schedule = array();

    /**
     * Class that defines the quantity and type of nutrient modifications required for the oral diet.
     * @var \FHIR_DSTU_TWO\FHIRResource\FHIRNutritionOrder\FHIRNutritionOrderNutrient[]
     */
    public $nutrient = array();

    /**
     * Class that describes any texture modifications required for the patient to safely consume various types of solid foods.
     * @var \FHIR_DSTU_TWO\FHIRResource\FHIRNutritionOrder\FHIRNutritionOrderTexture[]
     */
    public $texture = array();

    /**
     * The required consistency (e.g. honey-thick, nectar-thick, thin, thickened.) of liquids or fluids served to the patient.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[]
     */
    public $fluidConsistencyType = array();

    /**
     * Free text or additional instructions or information pertaining to the oral diet.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $instruction = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'NutritionOrder.OralDiet';

    /**
     * The kind of diet or dietary restriction such as fiber restricted diet or diabetic diet.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[]
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * The kind of diet or dietary restriction such as fiber restricted diet or diabetic diet.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[] $type
     * @return $this
     */
    public function addType($type)
    {
        $this->type[] = $type;
        return $this;
    }

    /**
     * The time period and frequency at which the diet should be given.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRTiming[]
     */
    public function getSchedule()
    {
        return $this->schedule;
    }

    /**
     * The time period and frequency at which the diet should be given.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRTiming[] $schedule
     * @return $this
     */
    public function addSchedule($schedule)
    {
        $this->schedule[] = $schedule;
        return $this;
    }

    /**
     * Class that defines the quantity and type of nutrient modifications required for the oral diet.
     * @return \FHIR_DSTU_TWO\FHIRResource\FHIRNutritionOrder\FHIRNutritionOrderNutrient[]
     */
    public function getNutrient()
    {
        return $this->nutrient;
    }

    /**
     * Class that defines the quantity and type of nutrient modifications required for the oral diet.
     * @param \FHIR_DSTU_TWO\FHIRResource\FHIRNutritionOrder\FHIRNutritionOrderNutrient[] $nutrient
     * @return $this
     */
    public function addNutrient($nutrient)
    {
        $this->nutrient[] = $nutrient;
        return $this;
    }

    /**
     * Class that describes any texture modifications required for the patient to safely consume various types of solid foods.
     * @return \FHIR_DSTU_TWO\FHIRResource\FHIRNutritionOrder\FHIRNutritionOrderTexture[]
     */
    public function getTexture()
    {
        return $this->texture;
    }

    /**
     * Class that describes any texture modifications required for the patient to safely consume various types of solid foods.
     * @param \FHIR_DSTU_TWO\FHIRResource\FHIRNutritionOrder\FHIRNutritionOrderTexture[] $texture
     * @return $this
     */
    public function addTexture($texture)
    {
        $this->texture[] = $texture;
        return $this;
    }

    /**
     * The required consistency (e.g. honey-thick, nectar-thick, thin, thickened.) of liquids or fluids served to the patient.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[]
     */
    public function getFluidConsistencyType()
    {
        return $this->fluidConsistencyType;
    }

    /**
     * The required consistency (e.g. honey-thick, nectar-thick, thin, thickened.) of liquids or fluids served to the patient.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[] $fluidConsistencyType
     * @return $this
     */
    public function addFluidConsistencyType($fluidConsistencyType)
    {
        $this->fluidConsistencyType[] = $fluidConsistencyType;
        return $this;
    }

    /**
     * Free text or additional instructions or information pertaining to the oral diet.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getInstruction()
    {
        return $this->instruction;
    }

    /**
     * Free text or additional instructions or information pertaining to the oral diet.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $instruction
     * @return $this
     */
    public function setInstruction($instruction)
    {
        $this->instruction = $instruction;
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
        if (0 < count($this->type)) {
            $json['type'] = array();
            foreach($this->type as $type) {
                $json['type'][] = $type->jsonSerialize();
            }
        }
        if (0 < count($this->schedule)) {
            $json['schedule'] = array();
            foreach($this->schedule as $schedule) {
                $json['schedule'][] = $schedule->jsonSerialize();
            }
        }
        if (0 < count($this->nutrient)) {
            $json['nutrient'] = array();
            foreach($this->nutrient as $nutrient) {
                $json['nutrient'][] = $nutrient->jsonSerialize();
            }
        }
        if (0 < count($this->texture)) {
            $json['texture'] = array();
            foreach($this->texture as $texture) {
                $json['texture'][] = $texture->jsonSerialize();
            }
        }
        if (0 < count($this->fluidConsistencyType)) {
            $json['fluidConsistencyType'] = array();
            foreach($this->fluidConsistencyType as $fluidConsistencyType) {
                $json['fluidConsistencyType'][] = $fluidConsistencyType->jsonSerialize();
            }
        }
        if (null !== $this->instruction) $json['instruction'] = $this->instruction->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<NutritionOrderOralDiet xmlns="http://hl7.org/fhir"></NutritionOrderOralDiet>');
        parent::xmlSerialize(true, $sxe);
        if (0 < count($this->type)) {
            foreach($this->type as $type) {
                $type->xmlSerialize(true, $sxe->addChild('type'));
            }
        }
        if (0 < count($this->schedule)) {
            foreach($this->schedule as $schedule) {
                $schedule->xmlSerialize(true, $sxe->addChild('schedule'));
            }
        }
        if (0 < count($this->nutrient)) {
            foreach($this->nutrient as $nutrient) {
                $nutrient->xmlSerialize(true, $sxe->addChild('nutrient'));
            }
        }
        if (0 < count($this->texture)) {
            foreach($this->texture as $texture) {
                $texture->xmlSerialize(true, $sxe->addChild('texture'));
            }
        }
        if (0 < count($this->fluidConsistencyType)) {
            foreach($this->fluidConsistencyType as $fluidConsistencyType) {
                $fluidConsistencyType->xmlSerialize(true, $sxe->addChild('fluidConsistencyType'));
            }
        }
        if (null !== $this->instruction) $this->instruction->xmlSerialize(true, $sxe->addChild('instruction'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}