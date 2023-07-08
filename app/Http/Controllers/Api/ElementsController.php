<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\Elements\ElementsNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Resources\ElementsCollection;
use App\Http\Resources\ElementsResource;
use App\Models\Elements;

class ElementsController extends Controller
{
    public function all()
    {
        $rc = new ElementsCollection(Elements::all());

        return $rc;
    }

    public function getByName(string $name)
    {
        $r = new ElementsResource(Elements::firstWhere('name', strtolower($name)));
        if ($r->resource == null) {
            throw new ElementsNotFoundException('L\'élement '.$name.' n\'existe pas!', 404);
        }

        return $r;
    }

    public function getBySymbol(string $symbol)
    {
        $r = new ElementsResource(Elements::firstWhere('symbol', strtolower($symbol)));
        if ($r->resource == null) {
            throw new ElementsNotFoundException('L\'élement avec le symbole '.$symbol.' n\'existe pas!', 404);
        }

        return $r;
    }

    public function getByFamily(string $family)
    {
        $family = str_replace(' ', '-', $family);
        $r = new ElementsCollection(Elements::with('elements_families:id,name,slug')
            ->whereHas('elements_families', function ($elements_families) use ($family) {
                $elements_families->where('slug', strtolower($family));
            })
            ->get()
        );

        if (count($r) == 0 || $r->resource == null) {
            throw new ElementsNotFoundException('La famille d\'élements '.$family.' n\'existe pas! Utilisez l\'une des options suivantes: actinides, alcalins, alcalino-terreux, gaz-nobles, halogenes, lanthanides, metalloides, metaux-de-transition, metaux-pauvres, non-metaux ou non-classes', 404);
        }

        return $r;
    }

    public function getByState(string $state)
    {

        $r = new ElementsCollection(Elements::with('elements_states:id,name')
            ->whereHas('elements_states', function ($elements_states) use ($state) {
                $elements_states->where('name', strtolower($state));
            })
            ->get()
        );

        if (count($r) == 0 || $r->resource == null) {
            throw new ElementsNotFoundException('L\'état '.$state.' n\'existe pas! Utilisez une des options suivantes : gaz, liquide et solide', 404);
        }

        return $r;
    }

    public function getByPeriod(string $period)
    {
        $r = new ElementsCollection(Elements::where('period', $period)->get());
        if ($r->resource == null || count($r) == 0) {
            throw new ElementsNotFoundException('La période '.$period.' n\'existe pas! Essayez une valeur entre 1 et 7', 404);
        }

        return $r;
    }

    public function getByGroup(string $group)
    {
        $r = new ElementsCollection(Elements::where('group', $group)->get());
        //dd(count($r));
        if ($r->resource == null || count($r) == 0) {
            throw new ElementsNotFoundException('Le groupe '.$group.' n\'existe pas! Essayez une valeur entre 1 et 18', 404);
        }

        return $r;
    }

    public function getById(string $id)
    {
        $r = new ElementsResource(Elements::firstWhere('id', $id));
        if ($r->resource == null) {
            throw new ElementsNotFoundException('L\'élement avec le numéro '.$id.' n\'existe pas! Essayer une valeur entre 1 et 118', 404);
        }

        return $r;
    }
}
