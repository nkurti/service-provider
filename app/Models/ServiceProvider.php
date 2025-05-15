<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceProvider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'logo',
        'category_id',
    ];

    /**
     * Get the category that the service provider belongs to.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }


    public function scopeFilterByCategory(Builder $query, ?int $categoryId): Builder
{
    return $categoryId
        ? $query->where('category_id', $categoryId)
        : $query;
}
}
