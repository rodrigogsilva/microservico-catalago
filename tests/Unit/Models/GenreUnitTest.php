<?php

namespace Tests\Unit\Models;

use App\Models\Genre;
use PHPUnit\Framework\TestCase;

use Illuminate\Database\Eloquent\SoftDeletes;
use \App\Models\Traits\Uuid;

class GenreUnitTest extends TestCase
{
    private $genre;

    protected function setUp(): void
    {
        parent::setUp();
        $this->genre = new Genre();
    }

    public function testFillableAttribute()
    {
        $fillable = ['name', 'is_active'];
        $this->assertEquals(
            $fillable,
            $this->genre->getFillable()
        );
    }

    public function testIfUseTraitsAttribute()
    {
        $traits = [
            SoftDeletes::class, Uuid::class
        ];
        $genreTraits = array_keys(class_uses(Genre::class));
        $this->assertEquals($traits, $genreTraits);
    }

    public function testDatesAttribute()
    {
        $dates = ['deleted_at', 'created_at', 'updated_at'];

        $this->assertEqualsCanonicalizing($dates, $this->genre->getDates());
    }

    public function testCastAttribute()
    {
        $casts = ['id' => 'string', 'is_active' => 'boolean'];
        $this->assertEquals($casts, $this->genre->getCasts());
    }

    public function testIncrementingAttribute()
    {
        $this->assertFalse($this->genre->incrementing);
    }
}
