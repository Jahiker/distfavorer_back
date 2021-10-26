<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductRelationshipsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'codigo' => $this->code,
            'producto' => $this->name,
            'descripcion' => $this->description,
            'imagen' => env('APP_URL') . $this->image,
            'disponible' => $this->status,
            'destacado' => $this->favorite,
            'creacion' => $this->created_at->diffForHumans(),
            'modificado' => $this->updated_at->diffForHumans(),
            'fecha_creacion' => $this->created_at->format('d-m-Y'),
            'fecha_modificacion' => $this->updated_at->format('d-m-Y')
        ];
    }
}
