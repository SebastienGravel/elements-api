<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Elements extends Model
{
    use HasFactory;

    protected function distribution(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => explode(',', $value)
        );
    }

    public function elements_families(): BelongsTo
    {
        return $this->belongsTo(ElementsFamily::class);
    }

    public function elements_states(): BelongsTo
    {
        return $this->belongsTo(ElementsState::class);
    }
}
