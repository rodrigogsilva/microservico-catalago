<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BasicCrudController;
use App\Models\CastMember;

class CastMemberController extends BasicCrudController
{
    private $rules = [
        'name' => 'required|max:255',
        'type' => 'required|in:1,2'
    ];

    protected function model()
    {
        return CastMember::class;
    }

    protected function rulesStore()
    {
        return $this->rules;
    }

    protected function rulesUpdate()
    {
        return $this->rules;
    }
}
