<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

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
        if (is_string($date)) {
            $this->date = Carbon::parse($date);
        } else {
            $this->date = $date;
        }
        return $this;
    }

    public function workoutExcersises(): HasMany
    {
        return $this->hasMany(WorkoutExercise::class);
    }

    public static function createWorkoutWithExcersis(Carbon|string $date, array $exercises): self
    {
        DB::beginTransaction();
        try {
            $workout = self::create(['date' => $date]);
            foreach ($exercises as $exercise) {
                $workout->workoutExcersises()->create($exercise);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        return $workout;
    }
}
