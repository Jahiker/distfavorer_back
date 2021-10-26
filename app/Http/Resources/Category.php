<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProductRelationshipsResource;

class Category extends JsonResource
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
                'categoria' => $this->name,
                'descripcion' => $this->description,
                'resumen' => substr($this->description, 0, 50) . '...',
                'icono' => env('APP_URL') . $this->icon,
                'creacion' => $this->created_at->diffForHumans(),
                'modificado' => $this->updated_at->diffForHumans(),
                'fecha_creacion' => $this->created_at->format('d-m-Y'),
                'fecha_modificacion' => $this->updated_at->format('d-m-Y')
            ],
            'relationships' => [
                'productos' => ProductRelationshipsResource::collection($this->products)
            ]
        ];
    }
}
