<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;

    protected $fillable = ['date'];
    protected $casts = ['date' => 'date'];

    public function getDate(): Carbon
    {
        return $this->date;
    }

    public function setDate(Carbon|string $date): self
    {
        if (is_string($date)){
            $this->date = Carbon::parse($date);
        }
        $this->date = $date;
        return $this;
    }

    //
}
