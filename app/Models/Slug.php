<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Concerns\HasUuids;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Slug extends Model
    {
        use HasUuids, SoftDeletes;
        protected $fillable = [
            'entry_id',
            'value'
        ];

        public function entry(): BelongsTo
        {
            return $this->belongsTo(Entry::class, 'entry_id');
        }
    }
