<?php namespace MichaelBishop\Website\Updates;

use MichaelBishop\Website\Models\Person;
use MichaelBishop\Website\Models\Role;
use MichaelBishop\Website\Models\Series;
use MichaelBishop\Website\Models\Sermon;
use October\Rain\Database\Updates\Seeder;

class SeedAllTables extends Seeder 
{
	public function run()
	{
		Series::create(['title' => 'Surprised by hope', 
			'thumbnail' => 'http://localhost/october/storage/app/media/series/surprised_small.jpg',
			'description' => 'Based on Tom Wrights book, this four week series invites us to rethink heaven, the resurrection and the mission of the church. Tackling fuzzy thinking, changing the way we look at this life (as well as the next) and filling us with hope.']);
		Series::create(['title' => 'Lent 2015']);
		Person::create(['fullname' => 'Michael Bishop']);
		Person::create(['fullname' => 'Kym Bishop']);
		Role::create(['rolename' => 'Staff']);
		Role::create(['rolename' => 'Preacher']);
		Sermon::create(['title' => 'Surprised by hope 1', 'person_id' => 1, 'series_id' => 1, 'sermondate' => '2015-01-10', 'readings' => 'Col 1:15-20, Rom 8: 18-25', 'url' => 'https://archive.org/download/umc10-05-2015SurprisedByHope4/150510umc.mp3']);
	}
}