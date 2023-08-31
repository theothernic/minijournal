<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Concerns\HasUuids;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Entry extends Model
    {
        use HasUuids, SoftDeletes;

        protected $keyType = 'string';

        protected $fillable = [
            'user_id',
            'title',
            'publish_at'
        ];

        public function author()
        {
            return $this->belongsTo(User::class);
        }

        public function revisions()
        {
            return $this->hasMany(Revision::class);
        }
    }
