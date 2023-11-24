<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'categorie',
        'photo',
        'description',
        'status',
        'date',
        'nombreChambre',
        'nombreBalcon',
        'nombreEspaceVert',
        'Dimension',
        'photoChambre',
        'DimensionChambre',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function saveChambres($images, $dimensions, $libelle)
    {
        $this->photoChambre = json_encode($images);
        $this->DimensionChambre = json_encode($dimensions);
        $this->LibelleChambre = json_encode($libelle);

        $this->save();
    }

    public function getChambres()
    {
        $images = json_decode($this->photoChambre, true);
        $dimensions = json_decode($this->DimensionChambre, true);
        $libelle = json_decode($this->LibelleChambre, true);

        $chambres = [];

        foreach ($images as $key => $image) {
            $chambres[] = [
                'image' => $image,
                'dimension' => $dimensions[$key],
                'libelle' => $libelle[$key]
            ];
        }

        return $chambres;
    }
}
