<?php namespace FHIR_DSTU_TWO\FHIRResource\FHIRTestScript;

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
 * TestScript is a resource that specifies a suite of tests against a FHIR server implementation to determine compliance against the FHIR specification.
 */
class FHIRTestScriptOperation extends FHIRBackboneElement implements JsonSerializable
{
    /**
     * Server interaction or operation type.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCoding
     */
    public $type = null;

    /**
     * The type of the resource.  See http://hl7-fhir.github.io/resourcelist.html.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCode
     */
    public $resource = null;

    /**
     * The label would be used for tracking/logging purposes by test engines.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $label = null;

    /**
     * The description would be used by test engines for tracking and reporting purposes.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $description = null;

    /**
     * The content-type or mime-type to use for RESTful operation in the 'Accept' header.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRContentType
     */
    public $accept = null;

    /**
     * The content-type or mime-type to use for RESTful operation in the 'Content-Type' header.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRContentType
     */
    public $contentType = null;

    /**
     * Which server to perform the operation on.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRInteger
     */
    public $destination = null;

    /**
     * Whether or not to implicitly send the request url in encoded format. The default is true to match the standard RESTful client behavior. Set to false when communicating with a server that does not support encoded url paths.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRBoolean
     */
    public $encodeRequestUrl = null;

    /**
     * Path plus parameters after [type].  Used to set parts of the request URL explicitly.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $params = null;

    /**
     * Header elements would be used to set HTTP headers.
     * @var \FHIR_DSTU_TWO\FHIRResource\FHIRTestScript\FHIRTestScriptRequestHeader[]
     */
    public $requestHeader = array();

    /**
     * The fixture id (maybe new) to map to the response.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRId
     */
    public $responseId = null;

    /**
     * The id of the fixture used as the body of a PUT or POST request.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRId
     */
    public $sourceId = null;

    /**
     * Id of fixture used for extracting the [id],  [type], and [vid] for GET requests.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRId
     */
    public $targetId = null;

    /**
     * Complete request URL.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $url = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'TestScript.Operation';

    /**
     * Server interaction or operation type.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCoding
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Server interaction or operation type.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCoding $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * The type of the resource.  See http://hl7-fhir.github.io/resourcelist.html.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCode
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * The type of the resource.  See http://hl7-fhir.github.io/resourcelist.html.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCode $resource
     * @return $this
     */
    public function setResource($resource)
    {
        $this->resource = $resource;
        return $this;
    }

    /**
     * The label would be used for tracking/logging purposes by test engines.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * The label would be used for tracking/logging purposes by test engines.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $label
     * @return $this
     */
    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    /**
     * The description would be used by test engines for tracking and reporting purposes.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * The description would be used by test engines for tracking and reporting purposes.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * The content-type or mime-type to use for RESTful operation in the 'Accept' header.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRContentType
     */
    public function getAccept()
    {
        return $this->accept;
    }

    /**
     * The content-type or mime-type to use for RESTful operation in the 'Accept' header.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRContentType $accept
     * @return $this
     */
    public function setAccept($accept)
    {
        $this->accept = $accept;
        return $this;
    }

    /**
     * The content-type or mime-type to use for RESTful operation in the 'Content-Type' header.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRContentType
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * The content-type or mime-type to use for RESTful operation in the 'Content-Type' header.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRContentType $contentType
     * @return $this
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
        return $this;
    }

    /**
     * Which server to perform the operation on.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRInteger
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Which server to perform the operation on.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRInteger $destination
     * @return $this
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
        return $this;
    }

    /**
     * Whether or not to implicitly send the request url in encoded format. The default is true to match the standard RESTful client behavior. Set to false when communicating with a server that does not support encoded url paths.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRBoolean
     */
    public function getEncodeRequestUrl()
    {
        return $this->encodeRequestUrl;
    }

    /**
     * Whether or not to implicitly send the request url in encoded format. The default is true to match the standard RESTful client behavior. Set to false when communicating with a server that does not support encoded url paths.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRBoolean $encodeRequestUrl
     * @return $this
     */
    public function setEncodeRequestUrl($encodeRequestUrl)
    {
        $this->encodeRequestUrl = $encodeRequestUrl;
        return $this;
    }

    /**
     * Path plus parameters after [type].  Used to set parts of the request URL explicitly.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Path plus parameters after [type].  Used to set parts of the request URL explicitly.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $params
     * @return $this
     */
    public function setParams($params)
    {
        $this->params = $params;
        return $this;
    }

    /**
     * Header elements would be used to set HTTP headers.
     * @return \FHIR_DSTU_TWO\FHIRResource\FHIRTestScript\FHIRTestScriptRequestHeader[]
     */
    public function getRequestHeader()
    {
        return $this->requestHeader;
    }

    /**
     * Header elements would be used to set HTTP headers.
     * @param \FHIR_DSTU_TWO\FHIRResource\FHIRTestScript\FHIRTestScriptRequestHeader[] $requestHeader
     * @return $this
     */
    public function addRequestHeader($requestHeader)
    {
        $this->requestHeader[] = $requestHeader;
        return $this;
    }

    /**
     * The fixture id (maybe new) to map to the response.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRId
     */
    public function getResponseId()
    {
        return $this->responseId;
    }

    /**
     * The fixture id (maybe new) to map to the response.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRId $responseId
     * @return $this
     */
    public function setResponseId($responseId)
    {
        $this->responseId = $responseId;
        return $this;
    }

    /**
     * The id of the fixture used as the body of a PUT or POST request.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRId
     */
    public function getSourceId()
    {
        return $this->sourceId;
    }

    /**
     * The id of the fixture used as the body of a PUT or POST request.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRId $sourceId
     * @return $this
     */
    public function setSourceId($sourceId)
    {
        $this->sourceId = $sourceId;
        return $this;
    }

    /**
     * Id of fixture used for extracting the [id],  [type], and [vid] for GET requests.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRId
     */
    public function getTargetId()
    {
        return $this->targetId;
    }

    /**
     * Id of fixture used for extracting the [id],  [type], and [vid] for GET requests.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRId $targetId
     * @return $this
     */
    public function setTargetId($targetId)
    {
        $this->targetId = $targetId;
        return $this;
    }

    /**
     * Complete request URL.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Complete request URL.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;
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
        if (null !== $this->resource) $json['resource'] = $this->resource->jsonSerialize();
        if (null !== $this->label) $json['label'] = $this->label->jsonSerialize();
        if (null !== $this->description) $json['description'] = $this->description->jsonSerialize();
        if (null !== $this->accept) $json['accept'] = $this->accept->jsonSerialize();
        if (null !== $this->contentType) $json['contentType'] = $this->contentType->jsonSerialize();
        if (null !== $this->destination) $json['destination'] = $this->destination->jsonSerialize();
        if (null !== $this->encodeRequestUrl) $json['encodeRequestUrl'] = $this->encodeRequestUrl->jsonSerialize();
        if (null !== $this->params) $json['params'] = $this->params->jsonSerialize();
        if (0 < count($this->requestHeader)) {
            $json['requestHeader'] = array();
            foreach($this->requestHeader as $requestHeader) {
                $json['requestHeader'][] = $requestHeader->jsonSerialize();
            }
        }
        if (null !== $this->responseId) $json['responseId'] = $this->responseId->jsonSerialize();
        if (null !== $this->sourceId) $json['sourceId'] = $this->sourceId->jsonSerialize();
        if (null !== $this->targetId) $json['targetId'] = $this->targetId->jsonSerialize();
        if (null !== $this->url) $json['url'] = $this->url->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<TestScriptOperation xmlns="http://hl7.org/fhir"></TestScriptOperation>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->type) $this->type->xmlSerialize(true, $sxe->addChild('type'));
        if (null !== $this->resource) $this->resource->xmlSerialize(true, $sxe->addChild('resource'));
        if (null !== $this->label) $this->label->xmlSerialize(true, $sxe->addChild('label'));
        if (null !== $this->description) $this->description->xmlSerialize(true, $sxe->addChild('description'));
        if (null !== $this->accept) $this->accept->xmlSerialize(true, $sxe->addChild('accept'));
        if (null !== $this->contentType) $this->contentType->xmlSerialize(true, $sxe->addChild('contentType'));
        if (null !== $this->destination) $this->destination->xmlSerialize(true, $sxe->addChild('destination'));
        if (null !== $this->encodeRequestUrl) $this->encodeRequestUrl->xmlSerialize(true, $sxe->addChild('encodeRequestUrl'));
        if (null !== $this->params) $this->params->xmlSerialize(true, $sxe->addChild('params'));
        if (0 < count($this->requestHeader)) {
            foreach($this->requestHeader as $requestHeader) {
                $requestHeader->xmlSerialize(true, $sxe->addChild('requestHeader'));
            }
        }
        if (null !== $this->responseId) $this->responseId->xmlSerialize(true, $sxe->addChild('responseId'));
        if (null !== $this->sourceId) $this->sourceId->xmlSerialize(true, $sxe->addChild('sourceId'));
        if (null !== $this->targetId) $this->targetId->xmlSerialize(true, $sxe->addChild('targetId'));
        if (null !== $this->url) $this->url->xmlSerialize(true, $sxe->addChild('url'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}