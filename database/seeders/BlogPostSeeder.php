<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogPost;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        for ($i = 1; $i <= 20; $i++) {
            BlogPost::create([
                'title' => 'Contoh Berita Blog #' . $i,
                'slug' => Str::slug('Contoh Berita Blog #' . $i . '-' . Str::random(5)),
                'content' => '<p>Ini adalah konten contoh untuk blog ke-' . $i . '.</p>',
                'thumbnail' => null, // Atau isi dengan path gambar jika ada
                'published_at' => $now->copy()->subDays(21 - $i),
                'is_published' => true,
            ]);
        }
    }
}