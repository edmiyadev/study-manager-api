<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTypeEducationRequest;
use App\Http\Requests\UpdateTypeEducationRequest;
use App\Models\TypeEducation;
use App\Services\ApiResponseService;

class TypeEducationController extends Controller
{
    public function index()
    {
        $typeEducation = TypeEducation::all();
        return ApiResponseService::success($typeEducation);
    }

    public function show(int | string $id)
    {
        $typeEducation = TypeEducation::query()->find($id);

        if(!$typeEducation)
        {
            return ApiResponseService::notFound();
        }

        return ApiResponseService::success($typeEducation);
    }
}
