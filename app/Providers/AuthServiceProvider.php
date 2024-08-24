<?php
namespace App\Providers;

use App\Models\Billet;
use App\Models\ChefSection;
use App\Models\CompteRendu;
use App\Models\Demande;
use App\Models\Element;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Post;
use App\Policies\BilletPolicy;
use App\Policies\ChefSectionPolicy;
use App\Policies\CompteRenduPolicy;
use App\Policies\DemandePolicy;
use App\Policies\ElementPolicy;
use App\Policies\PostPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Element::class => ElementPolicy::class,
        Demande::class => DemandePolicy::class,
        ChefSection::class => ChefSectionPolicy::class,
        CompteRendu::class => CompteRenduPolicy::class,
        Billet::class => BilletPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
