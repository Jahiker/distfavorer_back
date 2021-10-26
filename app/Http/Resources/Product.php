<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CategoryRelationshipsResource;
use App\Http\Resources\BrandRelationshipsResource;

class Product extends JsonResource
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
            'type' => $this->getTable(),
            'id' => $this->id,
            'attributes' => [
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
            ],
            'relationships' => [
                'categoria' => new CategoryRelationshipsResource($this->category),
                'marca' => new BrandRelationshipsResource($this->brand)
            ]
        ];
    }
}
