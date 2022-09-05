<?php 

namespace App\Fhir\Resource;

use App\Fhir\Element\Address;
use App\Fhir\Element\CodeableConcept;
use App\Fhir\Element\ContactPoint;
use App\Fhir\Element\HumanName;
use App\Fhir\Element\Identifier;
use App\Fhir\Element\Reference;

class Organization extends DomainResource{

    public function __construct($json = null){
        $this->resourceType = "Organization";
        parent::__construct($json);
        if($json) $this->loadData($json);
    }
    private function loadData($json){
        if(isset($json->identifier))
            foreach($json->identifier as $identifier)
                $arrayData["identifier"][] = Identifier::Load($identifier);
        if(isset($json->active))
            $arrayData["active"] = $json->active;
        if(isset($json->type))
            foreach($json->type as $type)
                $arrayData["type"][] = CodeableConcept::Load($type);
        if(isset($json->name))
            $arrayData["name"] = $json->name;
        if(isset($json->alias))
            foreach($json->alias as $alias)
                $arrayData["alias"][] = $alias;
        if(isset($json->telecom))
            foreach($json->telecom as $telecom)
                $arrayData["telecom"][] = ContactPoint::Load($telecom);
        if(isset($json->address))
            foreach($json->address as $address)
                $arrayData["address"][] = Address::Load($address);
        if(isset($json->partOf))
            $arrayData["partOf"] = Reference::Load($json->partOf);
        if(isset($json->contact))
            foreach($json->contact as $contact){
                $data = [];
                if(isset($contact->purpose))
                    $data["purpose"] =  CodeableConcept::Load($contact->purpose);
                if(isset($contact->name))
                    $data["name"] =     HumanName::Load($contact->name);
                if(isset($contact->telecom))
                    $data["telecom"] =  ContactPoint::Load($contact->telecom);
                if(isset($contact->address))
                    $data["address"] =  CodeableConcept::Load($contact->address);
                $arrayData["contact"][] = $data;
            }
        if(isset($json->endpoint))
            foreach($json->endpoint as $endpoint)
                $arrayData["endpoint"][] = Reference::Load($endpoint);
    }

    /* obligatorio array (2..*) 
        RFC y Otra cosa que no entendi:
        {
            "use": "official",
            "system": "urn:oid:2.16.840.1.113883.4.630",
            "value": "IMS421231I45"
        },
        { esto fue lo que no entendi
            "use": "official",
            "system": "urn:ietf:rfc:3986",
            "value": "urn:oid:2.16.840.1.113883.3.14"
        }
    */
    public function addIdentifier(Identifier $identifier){
        $this->identifier[] = $identifier;
    }
    public function setActive($active){
        $this->active = $active;
    }
    /*
        obligatorio \Fhir\Element\CodeableConcept array (1..*)
            "coding":
                "system": "http://terminology.hl7mx.org/inegi/CodeSystem/clasificacion-de-instituciones-de-salud",
                "code": "1",
                "display": "INSTITUCIONES DE SALUD DEL SECTOR PÚBLICO"
            "text": "INSTITUCIONES DE SALUD DEL SECTOR PÚBLICO"
    */
    public function addType(CodeableConcept $type){
        $this->type[] = $type;
    }
    /* obligatorio */
    public function setName($name){
        $this->name = $name;
    }
    /* Obligatorio */
    public function addAlias($alias){
        $this->alias[] = $alias;
    }
    public function addTelecom(ContactPoint $telecom){
        $this->telecom[] = $telecom;
    }
    /*
        \Fhir\Element\Address:
            "type": 
            "text": 
            "city": 
            "district": 
            "state": 
            "postalCode": 
            "line": 
            "extension": \Fhir\Element\Extension array(1..*)
                "url": "http://terminology.hl7mx.org/address/colonia",
                "valueString"
        }
    */
    public function addAddress(Address $address){
        $this->address[] = $address;
    }
    public function setPartOf(Resource $partOf){
        $this->partOf = $partOf->toReference();
    }
    public function addContact(CodeableConcept $purpose, HumanName $name, ContactPoint $telecom, CodeableConcept $address){
        $this->contact[] = [
            "purpose"=>$purpose,
            "name"=>$name,
            "telecom"=>$telecom,
            "address"=>$address,
        ];
    }
    public function addEndpoint(Resource $endpoint){
        $this->endpoint[] = $endpoint->toReference();
    }

    public function toArray(){
        $arrayData = parent::toArray();
        if(isset($this->identifier))
            foreach($this->identifier as $identifier)
                $arrayData["identifier"][] = $identifier->toArray();
        if(isset($this->active))
            $arrayData["active"] = $this->active;
        if(isset($this->type))
            foreach($this->type as $type)
                $arrayData["type"][] = $type->toArray();
        if(isset($this->name))
            $arrayData["name"] = $this->name;
        if(isset($this->alias))
            foreach($this->alias as $alias)
                $arrayData["alias"][] = $alias;
        if(isset($this->telecom))
            foreach($this->telecom as $telecom)
                $arrayData["telecom"][] = $telecom->toArray();
        if(isset($this->address))
            foreach($this->address as $address)
                $arrayData["address"][] = $address->toArray();
        if(isset($this->partOf))
            $arrayData["partOf"] = $this->partOf->toArray();
        if(isset($this->contact))
            foreach($this->contact as $contact){
                $arrayData["contact"][] = [
                    "purpose"=>$contact["purpose"]->toArray(),
                    "name"=>$contact["name"]->toArray(),
                    "telecom"=>$contact["telecom"]->toArray(),
                    "address"=>$contact["address"]->toArray(),
                ];
            }
        if(isset($this->endpoint))
            foreach($this->endpoint as $endpoint)
                $arrayData["endpoint"][] = $endpoint->toArray();
        return $arrayData;
    }
}

