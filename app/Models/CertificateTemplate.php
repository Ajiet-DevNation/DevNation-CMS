<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateTemplate extends Model
{
    /** @use HasFactory<\Database\Factories\CertificateTemplateFactory> */
    use HasFactory;

    protected $fillable = ['template_name', 'description','template_image','description_font_size','description_x_axis','description_y_axis','description_angle','unique_id_font_size'];
}
