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
 * A reference to a document .
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRDocumentReference extends FHIRDomainResource implements JsonSerializable
{
    /**
     * Document identifier as assigned by the source of the document. This identifier is specific to this version of the document. This unique identifier may be used elsewhere to identify this version of the document.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRIdentifier
     */
    public $masterIdentifier = null;

    /**
     * Other identifiers associated with the document, including version independent identifiers.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRIdentifier[]
     */
    public $identifier = array();

    /**
     * Who or what the document is about. The document can be about a person, (patient or healthcare practitioner), a device (e.g. a machine) or even a group of subjects (such as a document about a herd of farm animals, or a set of patients that share a common exposure).
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public $subject = null;

    /**
     * Specifies the particular kind of document referenced  (e.g. History and Physical, Discharge Summary, Progress Note). This usually equates to the purpose of making the document referenced.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept
     */
    public $type = null;

    /**
     * A categorization for the type of document referenced - helps for indexing and searching. This may be implied by or derived from the code specified in the DocumentReference.type.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept
     */
    public $class = null;

    /**
     * Identifies who is responsible for adding the information to the document.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference[]
     */
    public $author = array();

    /**
     * Identifies the organization or group who is responsible for ongoing maintenance of and access to the document.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public $custodian = null;

    /**
     * Which person or organization authenticates that this document is valid.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public $authenticator = null;

    /**
     * When the document was created.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime
     */
    public $created = null;

    /**
     * When the document reference was created.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRInstant
     */
    public $indexed = null;

    /**
     * The status of this document reference.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCode
     */
    public $status = null;

    /**
     * The status of the underlying document.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept
     */
    public $docStatus = null;

    /**
     * Relationships that this document has with other document references that already exist.
     * @var \FHIR_DSTU_TWO\FHIRResource\FHIRDocumentReference\FHIRDocumentReferenceRelatesTo[]
     */
    public $relatesTo = array();

    /**
     * Human-readable description of the source document. This is sometimes known as the "title".
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public $description = null;

    /**
     * A set of Security-Tag codes specifying the level of privacy/security of the Document. Note that DocumentReference.meta.security contains the security labels of the "reference" to the document, while DocumentReference.securityLabel contains a snapshot of the security labels on the document the reference refers to.
     * @var \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[]
     */
    public $securityLabel = array();

    /**
     * The document and format referenced. There may be multiple content element repetitions, each with a different format.
     * @var \FHIR_DSTU_TWO\FHIRResource\FHIRDocumentReference\FHIRDocumentReferenceContent[]
     */
    public $content = array();

    /**
     * The clinical context in which the document was prepared.
     * @var \FHIR_DSTU_TWO\FHIRResource\FHIRDocumentReference\FHIRDocumentReferenceContext
     */
    public $context = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'DocumentReference';

    /**
     * Document identifier as assigned by the source of the document. This identifier is specific to this version of the document. This unique identifier may be used elsewhere to identify this version of the document.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRIdentifier
     */
    public function getMasterIdentifier()
    {
        return $this->masterIdentifier;
    }

    /**
     * Document identifier as assigned by the source of the document. This identifier is specific to this version of the document. This unique identifier may be used elsewhere to identify this version of the document.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRIdentifier $masterIdentifier
     * @return $this
     */
    public function setMasterIdentifier($masterIdentifier)
    {
        $this->masterIdentifier = $masterIdentifier;
        return $this;
    }

    /**
     * Other identifiers associated with the document, including version independent identifiers.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRIdentifier[]
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Other identifiers associated with the document, including version independent identifiers.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRIdentifier[] $identifier
     * @return $this
     */
    public function addIdentifier($identifier)
    {
        $this->identifier[] = $identifier;
        return $this;
    }

    /**
     * Who or what the document is about. The document can be about a person, (patient or healthcare practitioner), a device (e.g. a machine) or even a group of subjects (such as a document about a herd of farm animals, or a set of patients that share a common exposure).
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Who or what the document is about. The document can be about a person, (patient or healthcare practitioner), a device (e.g. a machine) or even a group of subjects (such as a document about a herd of farm animals, or a set of patients that share a common exposure).
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference $subject
     * @return $this
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * Specifies the particular kind of document referenced  (e.g. History and Physical, Discharge Summary, Progress Note). This usually equates to the purpose of making the document referenced.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Specifies the particular kind of document referenced  (e.g. History and Physical, Discharge Summary, Progress Note). This usually equates to the purpose of making the document referenced.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * A categorization for the type of document referenced - helps for indexing and searching. This may be implied by or derived from the code specified in the DocumentReference.type.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * A categorization for the type of document referenced - helps for indexing and searching. This may be implied by or derived from the code specified in the DocumentReference.type.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept $class
     * @return $this
     */
    public function setClass($class)
    {
        $this->class = $class;
        return $this;
    }

    /**
     * Identifies who is responsible for adding the information to the document.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference[]
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Identifies who is responsible for adding the information to the document.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference[] $author
     * @return $this
     */
    public function addAuthor($author)
    {
        $this->author[] = $author;
        return $this;
    }

    /**
     * Identifies the organization or group who is responsible for ongoing maintenance of and access to the document.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public function getCustodian()
    {
        return $this->custodian;
    }

    /**
     * Identifies the organization or group who is responsible for ongoing maintenance of and access to the document.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference $custodian
     * @return $this
     */
    public function setCustodian($custodian)
    {
        $this->custodian = $custodian;
        return $this;
    }

    /**
     * Which person or organization authenticates that this document is valid.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRReference
     */
    public function getAuthenticator()
    {
        return $this->authenticator;
    }

    /**
     * Which person or organization authenticates that this document is valid.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRReference $authenticator
     * @return $this
     */
    public function setAuthenticator($authenticator)
    {
        $this->authenticator = $authenticator;
        return $this;
    }

    /**
     * When the document was created.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * When the document was created.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRDateTime $created
     * @return $this
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * When the document reference was created.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRInstant
     */
    public function getIndexed()
    {
        return $this->indexed;
    }

    /**
     * When the document reference was created.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRInstant $indexed
     * @return $this
     */
    public function setIndexed($indexed)
    {
        $this->indexed = $indexed;
        return $this;
    }

    /**
     * The status of this document reference.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCode
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * The status of this document reference.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCode $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * The status of the underlying document.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept
     */
    public function getDocStatus()
    {
        return $this->docStatus;
    }

    /**
     * The status of the underlying document.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept $docStatus
     * @return $this
     */
    public function setDocStatus($docStatus)
    {
        $this->docStatus = $docStatus;
        return $this;
    }

    /**
     * Relationships that this document has with other document references that already exist.
     * @return \FHIR_DSTU_TWO\FHIRResource\FHIRDocumentReference\FHIRDocumentReferenceRelatesTo[]
     */
    public function getRelatesTo()
    {
        return $this->relatesTo;
    }

    /**
     * Relationships that this document has with other document references that already exist.
     * @param \FHIR_DSTU_TWO\FHIRResource\FHIRDocumentReference\FHIRDocumentReferenceRelatesTo[] $relatesTo
     * @return $this
     */
    public function addRelatesTo($relatesTo)
    {
        $this->relatesTo[] = $relatesTo;
        return $this;
    }

    /**
     * Human-readable description of the source document. This is sometimes known as the "title".
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRString
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Human-readable description of the source document. This is sometimes known as the "title".
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRString $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * A set of Security-Tag codes specifying the level of privacy/security of the Document. Note that DocumentReference.meta.security contains the security labels of the "reference" to the document, while DocumentReference.securityLabel contains a snapshot of the security labels on the document the reference refers to.
     * @return \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[]
     */
    public function getSecurityLabel()
    {
        return $this->securityLabel;
    }

    /**
     * A set of Security-Tag codes specifying the level of privacy/security of the Document. Note that DocumentReference.meta.security contains the security labels of the "reference" to the document, while DocumentReference.securityLabel contains a snapshot of the security labels on the document the reference refers to.
     * @param \FHIR_DSTU_TWO\FHIRElement\FHIRCodeableConcept[] $securityLabel
     * @return $this
     */
    public function addSecurityLabel($securityLabel)
    {
        $this->securityLabel[] = $securityLabel;
        return $this;
    }

    /**
     * The document and format referenced. There may be multiple content element repetitions, each with a different format.
     * @return \FHIR_DSTU_TWO\FHIRResource\FHIRDocumentReference\FHIRDocumentReferenceContent[]
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * The document and format referenced. There may be multiple content element repetitions, each with a different format.
     * @param \FHIR_DSTU_TWO\FHIRResource\FHIRDocumentReference\FHIRDocumentReferenceContent[] $content
     * @return $this
     */
    public function addContent($content)
    {
        $this->content[] = $content;
        return $this;
    }

    /**
     * The clinical context in which the document was prepared.
     * @return \FHIR_DSTU_TWO\FHIRResource\FHIRDocumentReference\FHIRDocumentReferenceContext
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * The clinical context in which the document was prepared.
     * @param \FHIR_DSTU_TWO\FHIRResource\FHIRDocumentReference\FHIRDocumentReferenceContext $context
     * @return $this
     */
    public function setContext($context)
    {
        $this->context = $context;
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
        if (null !== $this->masterIdentifier) $json['masterIdentifier'] = $this->masterIdentifier->jsonSerialize();
        if (0 < count($this->identifier)) {
            $json['identifier'] = array();
            foreach($this->identifier as $identifier) {
                $json['identifier'][] = $identifier->jsonSerialize();
            }
        }
        if (null !== $this->subject) $json['subject'] = $this->subject->jsonSerialize();
        if (null !== $this->type) $json['type'] = $this->type->jsonSerialize();
        if (null !== $this->class) $json['class'] = $this->class->jsonSerialize();
        if (0 < count($this->author)) {
            $json['author'] = array();
            foreach($this->author as $author) {
                $json['author'][] = $author->jsonSerialize();
            }
        }
        if (null !== $this->custodian) $json['custodian'] = $this->custodian->jsonSerialize();
        if (null !== $this->authenticator) $json['authenticator'] = $this->authenticator->jsonSerialize();
        if (null !== $this->created) $json['created'] = $this->created->jsonSerialize();
        if (null !== $this->indexed) $json['indexed'] = $this->indexed->jsonSerialize();
        if (null !== $this->status) $json['status'] = $this->status->jsonSerialize();
        if (null !== $this->docStatus) $json['docStatus'] = $this->docStatus->jsonSerialize();
        if (0 < count($this->relatesTo)) {
            $json['relatesTo'] = array();
            foreach($this->relatesTo as $relatesTo) {
                $json['relatesTo'][] = $relatesTo->jsonSerialize();
            }
        }
        if (null !== $this->description) $json['description'] = $this->description->jsonSerialize();
        if (0 < count($this->securityLabel)) {
            $json['securityLabel'] = array();
            foreach($this->securityLabel as $securityLabel) {
                $json['securityLabel'][] = $securityLabel->jsonSerialize();
            }
        }
        if (0 < count($this->content)) {
            $json['content'] = array();
            foreach($this->content as $content) {
                $json['content'][] = $content->jsonSerialize();
            }
        }
        if (null !== $this->context) $json['context'] = $this->context->jsonSerialize();
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) $sxe = new \SimpleXMLElement('<DocumentReference xmlns="http://hl7.org/fhir"></DocumentReference>');
        parent::xmlSerialize(true, $sxe);
        if (null !== $this->masterIdentifier) $this->masterIdentifier->xmlSerialize(true, $sxe->addChild('masterIdentifier'));
        if (0 < count($this->identifier)) {
            foreach($this->identifier as $identifier) {
                $identifier->xmlSerialize(true, $sxe->addChild('identifier'));
            }
        }
        if (null !== $this->subject) $this->subject->xmlSerialize(true, $sxe->addChild('subject'));
        if (null !== $this->type) $this->type->xmlSerialize(true, $sxe->addChild('type'));
        if (null !== $this->class) $this->class->xmlSerialize(true, $sxe->addChild('class'));
        if (0 < count($this->author)) {
            foreach($this->author as $author) {
                $author->xmlSerialize(true, $sxe->addChild('author'));
            }
        }
        if (null !== $this->custodian) $this->custodian->xmlSerialize(true, $sxe->addChild('custodian'));
        if (null !== $this->authenticator) $this->authenticator->xmlSerialize(true, $sxe->addChild('authenticator'));
        if (null !== $this->created) $this->created->xmlSerialize(true, $sxe->addChild('created'));
        if (null !== $this->indexed) $this->indexed->xmlSerialize(true, $sxe->addChild('indexed'));
        if (null !== $this->status) $this->status->xmlSerialize(true, $sxe->addChild('status'));
        if (null !== $this->docStatus) $this->docStatus->xmlSerialize(true, $sxe->addChild('docStatus'));
        if (0 < count($this->relatesTo)) {
            foreach($this->relatesTo as $relatesTo) {
                $relatesTo->xmlSerialize(true, $sxe->addChild('relatesTo'));
            }
        }
        if (null !== $this->description) $this->description->xmlSerialize(true, $sxe->addChild('description'));
        if (0 < count($this->securityLabel)) {
            foreach($this->securityLabel as $securityLabel) {
                $securityLabel->xmlSerialize(true, $sxe->addChild('securityLabel'));
            }
        }
        if (0 < count($this->content)) {
            foreach($this->content as $content) {
                $content->xmlSerialize(true, $sxe->addChild('content'));
            }
        }
        if (null !== $this->context) $this->context->xmlSerialize(true, $sxe->addChild('context'));
        if ($returnSXE) return $sxe;
        return $sxe->saveXML();
    }


}