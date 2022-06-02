<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
        return [
            'id'         => $this->id,
            'name'      => $this->name,
            'address'   => $this->address,
            'country'   => $this->country,
            'city'      => $this->city,
            'department' => $this->department,
            'zip_code'   => $this->zip_code,
            'birthdate'  => $this->birthdate,
            'date_hired' => $this->date_hired
        ];
    }
}
