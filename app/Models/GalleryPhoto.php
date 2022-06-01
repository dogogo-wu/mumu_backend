<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $img
 * @property integer $order
 * @property string $remark
 * @property integer $subtitle_id
 */
class GalleryPhoto extends Model
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
    protected $fillable = ['created_at', 'updated_at', 'img', 'order', 'remark', 'subtitle_id'];

    public function subtitle(){
        return $this->hasOne(GallerySubtitle::class, 'id', 'subtitle_id');
    }
}
