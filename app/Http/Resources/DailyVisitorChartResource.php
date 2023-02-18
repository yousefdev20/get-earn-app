<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DailyVisitorChartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'series' => [
                [
                    'name' => 'Users',
                    'data' => $this->pluck('count')->toArray()
                ]
            ],
            'xaxis' => [
                'categories' => $this->pluck('date')->toArray()
            ]
        ];
    }
}
