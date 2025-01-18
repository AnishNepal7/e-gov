<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DeathRecordResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'fatherName'=>$this->father_name,
            'motherName'=>$this->mother_name,
            'grandfatherName'=>$this->grandfather_name,
            'citizenshipId'=>$this->dob,
            'gender'=>$this->gender,
            'issuedBy'=>$this->issued_by
        ];
    }
}
