<?php

namespace App\Http\Services;

use App\Wrestler;
use App\WrestlingPromotion;

class PromotionService {
    public function getAll()
    {
        return WrestlingPromotion::all();
    }

    public function findById(int $id)
    {
        return WrestlingPromotion::where('id', $id)->first();
    }

    public function findByAlias(string $alias)
    {
        return WrestlingPromotion::where('alias', $alias)->first();
    }
}