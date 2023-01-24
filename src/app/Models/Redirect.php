<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Redirect extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['short_code', 'url'];

    function resetVisitCount(): void
    {
        $this->visit_count = 0;
        $this->save();
    }

    function incrementVisitCount(): int
    {
        $this->visit_count += 1;
        $this->save();
        return $this->visit_count;
    }
}
