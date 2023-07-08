<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @elements Elements $resource
 */
class ElementsResource extends JsonResource
{
    //public static $wrap = 'elements';

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //dd($request->getPathInfo());

        if (str_contains($request->getPathInfo(), 'simple')) {
            $res = [
                'Nom' => $this->name,
                'Symbole_chimique' => $this->symbol,
                'Numero_atomique' => $this->id,
                'Masse' => $this->mass,
                'Etat' => $this->elements_states->name,
            ];

            return $res;
        } else {
            $res = [
                'Nom' => $this->name,
                'Symbole_chimique' => $this->symbol,
                'Numero_atomique' => $this->id,
                'Nombre_de_neutrons' => $this->neutron,
                'Masse' => $this->mass,
                'Periode' => $this->period,
                'Groupe' => $this->group,
                'Distribution_electron' => implode(',', $this->distribution),
                'Etat' => $this->elements_states->name,
                'Famille' => $this->elements_families->name,
                'Occurence' => $this->occurence,
            ];

            return $res;
        }

    }

    /**
     * Customize the outgoing response for the resource.
     *
     * @param  \Illuminate\Http\Request
     * @param  \Illuminate\Http\Response
     * @return void
     */
    public function withResponse($request, $response)
    {
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }
}
