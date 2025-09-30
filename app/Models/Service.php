<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'name',
        'type',
        'description',
        'is_active',
    ];

    // Relationships
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Service::class, 'parent_id');
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class, 'service_id');
    }

    // Scopes
    public function scopeCategories($query)
    {
        return $query->where('type', 'category');
    }

    public function scopeSubcategories($query)
    {
        return $query->where('type', 'subcategory');
    }

    public function scopeDocumentTypes($query)
    {
        return $query->where('type', 'document_type');
    }

    // Helper to get path chain "Category > Subcategory > Type"
    public function getFullPathAttribute(): string
    {
        $parts = [$this->name];
        $node = $this->parent;
        while ($node) {
            array_unshift($parts, $node->name);
            $node = $node->parent;
        }
        return implode(' > ', $parts);
    }
}
