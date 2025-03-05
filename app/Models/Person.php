<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'people';

    protected $fillable = [
        'id', 'created_by', 'first_name', 'last_name', 'birth_name', 
        'middle_names', 'date_of_birth', 'created_at', 'updated_at', 'parent_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function children()
    {
        return $this->hasMany(Person::class, 'parent_id');
    }

    public function parents()
    {
        return $this->belongsToMany(Person::class, 'parent_child', 'child_id', 'parent_id');
    }

    public function getDegreeWith($target_person_id)
    {
        $targetPerson = Person::find($target_person_id);
        if (!$targetPerson) {
            return false;
        }

        $visited = [];
        $queue = [
            ['person_id' => $this->id, 'degree' => 0]
        ];

        while (!empty($queue)) {
            $current = array_shift($queue);
            $person_id = $current['person_id'];
            $degree = $current['degree'];

            if ($person_id == $target_person_id) {
                return $degree;
            }

            if (isset($visited[$person_id])) {
                continue;
            }

            $visited[$person_id] = true;

            $relationships = \DB::table('relationships')
                ->where('parent_id', $person_id)
                ->orWhere('child_id', $person_id)
                ->get();

            foreach ($relationships as $relationship) {
                $next_person_id = ($relationship->parent_id == $person_id) 
                    ? $relationship->child_id 
                    : $relationship->parent_id;

                $queue[] = ['person_id' => $next_person_id, 'degree' => $degree + 1];
            }

            if ($degree > 25) {
                return false;
            }
        }

        return false;
    }
}
