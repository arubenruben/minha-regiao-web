<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Clickbar\Magellan\Http\Requests\TransformsGeojsonGeometry;
use Clickbar\Magellan\Rules\GeometryGeojsonRule;
use Clickbar\Magellan\Data\Geometries\MultiPolygon;
use Clickbar\Magellan\Data\Geometries\Point;

class StoreDistrictRequest extends FormRequest
{
    use TransformsGeojsonGeometry;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'freguesias_pt_url' => 'required|string|max:512',
            'freguesias_pt_id' => 'required|string|max:50',
            'address' => 'nullable|string|max:512',
            'email' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:512',
            'geo_polygon' => ['required', new GeometryGeojsonRule([MultiPolygon::class])],
            'polygon_centroid' => ['required', new GeometryGeojsonRule([Point::class])],
        ];
    }

    public function geometries(): array
    {
        return ['geo_polygon', 'polygon_centroid'];
    }
}
