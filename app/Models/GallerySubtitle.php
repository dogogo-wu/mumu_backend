<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $subtitle
 * @property integer $order
 * @property integer $category
 */
class GallerySubtitle extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';
    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'subtitle', 'order', 'category'];

    public function imgAry(){
        return $this->hasMany(GalleryPhoto::class, 'subtitle_id', 'id')->orderBy('order');
    }
}
