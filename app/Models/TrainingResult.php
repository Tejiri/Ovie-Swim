<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrainingResult extends Model
{
  use HasFactory;
  protected $fillable = [
    'timeInSeconds',
    'trainingDate',
    'distance',
    'strokeType',
    'userId',
    'validated'
  ];

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class,"userId");
  }
}
