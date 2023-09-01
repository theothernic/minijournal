<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Concerns\HasUuids;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    use Illuminate\Database\Eloquent\Relations\HasOne;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use PhpParser\Node\Expr\AssignOp\Mod;

    class Entry extends Model
    {
        use HasUuids, SoftDeletes;

        protected $keyType = 'string';

        protected $fillable = [
            'user_id',
            'title',
            'publish_at'
        ];

        public function author(): BelongsTo|null
        {
            return $this->belongsTo(User::class, 'user_id');
        }

        public function revisions(): HasMany|null
        {
            return $this->hasMany(Revision::class);
        }

        public function slug() : HasOne|null
        {
            return $this->hasOne(Slug::class);
        }


        public function latestRevision(): Model|HasMany|null
        {
            return $this->revisions()->orderByDesc('created_at')->first();
        }
    }
