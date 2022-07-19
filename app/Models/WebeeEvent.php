<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\WebeeEvent
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $title
 * @property string|null $description_short
 * @property string|null $description_long
 * @property string $source_url
 * @property string $event_url
 * @property string|null $city
 * @property string|null $zip_code
 * @property string|null $street
 * @property string $error_info
 * @method static \Illuminate\Database\Eloquent\Builder|WebeeEvent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WebeeEvent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WebeeEvent query()
 * @method static \Illuminate\Database\Eloquent\Builder|WebeeEvent whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebeeEvent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebeeEvent whereDescriptionLong($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebeeEvent whereDescriptionShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebeeEvent whereErrorInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebeeEvent whereEventUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebeeEvent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebeeEvent whereSourceUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebeeEvent whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebeeEvent whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebeeEvent whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebeeEvent whereZipCode($value)
 * @mixin \Eloquent
 */
class WebeeEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description_short',
        'description_long',
        'source_url',
        'event_url',
        'city',
        'zip_code',
        'street',
        'error_info',
    ];
}
