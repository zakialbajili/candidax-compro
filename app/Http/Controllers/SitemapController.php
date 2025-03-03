<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Event;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    public function index() {
        $sitemap = Sitemap::create()->add(Url::create(url('/'))->setPriority(1.0)->setChangeFrequency('daily'))
                                    ->add(Url::create(url('/company'))->setPriority(0.95)->setChangeFrequency('monthly'))
                                    ->add(Url::create(url('/collaboration'))->setPriority(0.9)->setChangeFrequency('monthly'))
                                    ->add(Url::create(url('/services'))->setPriority(0.85)->setChangeFrequency('monthly'))
                                    ->add(Url::create(url('/contact'))->setPriority(0.8)->setChangeFrequency('monthly'))
                                    ->add(Url::create(url('/articles'))->setPriority(0.75)->setChangeFrequency('weekly'));
    
        $articles = Article::get();
        foreach ($articles as $article) {
            $sitemap->add(Url::create(url("/article/{$article->id}"))
                    ->setPriority(0.7)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setLastModificationDate($article->updated_at));
        }
    
        $events = Event::get();
        foreach ($events as $event) {
            $sitemap->add(Url::create(url("/event/{$event->id}"))
                    ->setPriority(0.7)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setLastModificationDate($event->updated_at));
        }
    
        return response($sitemap->render(), 200)->header('Content-Type', 'application/xml');
    }
    

}


        