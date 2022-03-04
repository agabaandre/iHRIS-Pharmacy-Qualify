<?php namespace FHIR_DSTU_TWO\FHIRResource\FHIRBundle;

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
 * A container for a collection of resources.
 */
class FHIRBundleEntry extends FHIRBackboneElement implements JsonSerializable
{
    /**
     * A series of links that provide context to this entry.
     * @var \FHIR_DSTU_TWO\FHIRResource\FHIRBundle\FHIRBundleLink[]
     */
    public $link = array();

    /**
     * The Absolute URL for the resource. This must be provided for all resources. The fullUrl SHALL not disagree with the id in the resource. The fullUrl is a version independent reference to the resource.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRUri
     */
    public $fullUrl = null;

    /**
     * The Resources for the entry.
     * @var \FHIR_DSTU_TWO\FHIRResourceContainer
     */
    public $resource = null;

    /**
     * Information about the search process that lead to the creation of this entry.
     * @var \FHIR_DSTU_TWO\FHIRResource\FHIRBundle\FHIRBundleSearch
     */
    public $search = null;

    /**
     * Additional information about how this entry should be processed as part of a transaction.
     * @var \FHIR_DSTU_TWO\FHIRResource\FHIRBundle\FHIRBundleRequest
     */
    public $request = null;

    /**
     * Additional information about how this entry should be processed as part of a transaction.
     * @var \FHIR_DSTU_TWO\FHIRResource\FHIRBundle\FHIRBundleResponse
     */
    public $response = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'Bundle.Entry';

    /**
     * A series of links that provide context to this entry.
     * @return \FHIR_DSTU_TWO\FHIRResource\FHIRBundle\FHIRBundleLink[]
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * A series of links that provide context to this entry.
     * @param \FHIR_DSTU_TWO\FHIRResource\FHIRBundle\FHIRBundleLink[] $link
     * @return $this
     */
    public function addLink($link)
    {
        $this->link[] = $link;
        return $this;
    }

    /**
     * The Absolute URL for the resource. This must be provided for all resources. The fullUrl SHALL not disagree with the id in the resource. The fullUrl is a version independent reference to the resource.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRUri
     */
    public function getFullUrl()
    {
        return $this->fullUrl;
    }

    /**
     * The Absolute URL for the resource. This must be provided for all resources. The fullUrl SHALL not disagree with the id in the resource. The fullUrl is a version independent reference to the resource.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRUri $fullUrl
     * @return $this
     */
    public function setFullUrl($fullUrl)
    {
        $this->fullUrl = $fullUrl;
        return $this;
    }

    /**
     * The Resources for the entry.
     * @return \FHIR_DSTU_TWO\FHIRResourceContainer
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * The Resources for the entry.
     * @param \FHIR_DSTU_TWO\FHIRResourceContainer $resource
     * @return $this
     */
    public function setResource($resource)
    {
        $this->resource = $resource;
        return $this;
    }

    /**
     * Information about the search process that lead to the creation of this entry.
     * @return \FHIR_DSTU_TWO\FHIRResource\FHIRBundle\FHIRBundleSearch
     */
    public function getSearch()
    {
        return $this->search;
    }

    /**
     * Information about the search process that lead to the creation of this entry.
     * @param \FHIR_DSTU_TWO\FHIRResource\FHIRBundle\FHIRBundleSearch $search
     * @return $this
     */
    public function setSearch($search)
    {
        $this->search = $search;
        return $this;
    }

    /**
     * Additional information about how this entry should be processed as part of a transaction.
     * @return \FHIR_DSTU_TWO\FHIRResource\FHIRBundle\FHIRBundleRequest
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Additional information about how this entry should be processed as part of a transaction.
     * @param \FHIR_DSTU_TWO\FHIRResource\FHIRBundle\FHIRBundleRequest $request
     * @return $this
     */
    public function setRequest($request)
    {
        $this->request = $request;
        return $this;
    }

    /**
     * Additional information about how this entry should be processed as part of a transaction.
     * @return \FHIR_DSTU_TWO\FHIRResource\FHIRBundle\FHIRBundleResponse
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Additional information about how this entry should be processed as part of a transaction.
     * @param \FHIR_DSTU_TWO\FHIRResource\FHIRBundle\FHIRBundleResponse $response
     * @return $this
     */
    public function setResponse($response)
    {
        $this->response = $response;
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
        if (0 < count($this->link)) {
            $json['link'] = array();
            foreach($this->link as $link) {
                $json['link'][] = $link->jsonSerialize();
            }
        }
        if (null !== $this->fullUrl) $json['fullUrl'] = $this->fullUrl->jsonSerialize();
        if (null !== $this->resource) $json['resource'] = $this->resource->jsonSerialize();
        if (null !== $this->search) $json['search'] = $this->search->jsonSerialize();
        if (null !== $this->request) $json['request'] = $this->request->jsonSerialize();
        if (null !== $this->response) $json['response'] = $this->response->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<BundleEntry xmlns="http://hl7.org/fhir"></BundleEntry>');
        parent::xmlSerialize(true, $sxe);
        if (0 < count($this->link)) {
            foreach($this->link as $link) {
                $link->xmlSerialize(true, $sxe->addChild('link'));
            }
        }
        if (null !== $this->fullUrl) $this->fullUrl->xmlSerialize(true, $sxe->addChild('fullUrl'));
        if (null !== $this->resource) $this->resource->xmlSerialize(true, $sxe->addChild('resource'));
        if (null !== $this->search) $this->search->xmlSerialize(true, $sxe->addChild('search'));
        if (null !== $this->request) $this->request->xmlSerialize(true, $sxe->addChild('request'));
        if (null !== $this->response) $this->response->xmlSerialize(true, $sxe->addChild('response'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}