<?php

namespace App\Actions;

use Abordage\LastModified\Facades\LastModified;
use Butschster\Head\Facades\Meta;
use Butschster\Head\Packages\Entities\OpenGraphPackage;
use Butschster\Head\Packages\Entities\TwitterCardPackage;

class MetaAction
{
    public function handle($model)
    {
        $title = $model->meta_title ?? $model->name ?? env('APP_NAME');

        $description = $model->meta_description ?? $model->name ?? env('APP_NAME');

        Meta::setTitle(env('APP_NAME'))
            ->prependTitle($title)
            ->setDescription($description)
            ->setCanonical(url()->current());

        LastModified::set($model->updated_at);

        $og = new OpenGraphPackage('og');

        $og->setTitle($title)
            ->setDescription($description)
            ->setUrl(url()->current());

        Meta::registerPackage($og);

        $card  = new TwitterCardPackage('card');

        Meta::registerPackage($card);
    }
}
