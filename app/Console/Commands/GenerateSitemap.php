<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $sitemap = Sitemap::create()
            ->add(Url::create('/')->setPriority(1.0)->setChangeFrequency('daily'))
            ->add(Url::create('/company')->setPriority(0.95)->setChangeFrequency('monthly'))
            ->add(Url::create('/collaboration')->setPriority(0.9)->setChangeFrequency('monthly'))
            ->add(Url::create('/services')->setPriority(0.85)->setChangeFrequency('monthly'))
            ->add(Url::create('/contact')->setPriority(0.8)->setChangeFrequency('monthly'))
            ->add(Url::create('/articles')->setPriority(0.75)->setChangeFrequency('weekly'));
        // Tambahkan semua article dari database
        $articles = \App\Models\Article::all();
        foreach ($articles as $article) {
            $sitemap->add(
                Url::create("/article/{$article->id}")
                    ->setPriority(0.6)
                    ->setChangeFrequency('weekly')
            );
        }
        // Tambahkan semua postingan dari database
        $events = \App\Models\Event::all();
        foreach ($events as $event) {
            $sitemap->add(
                Url::create("/event/{$event->id}")
                    ->setPriority(0.6)
                    ->setChangeFrequency('weekly')
            );
        }
        // Simpan sitemap ke folder public
        $sitemap->writeToFile(public_path('sitemap.xml'));
        $this->info('Sitemap berhasil dibuat!');
    }
}
