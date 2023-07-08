<?php

namespace Tests\Feature;

use Tests\TestCase;

class RouteApiTest extends TestCase
{
    public function test_get_all_elements_apiroute(): void 
    {
        $response = $this->get('api/v1');
        $response->assertStatus(200);
        $response->assertJson($response->json());
    }

    public function test_get_all_elements_short_version_apiroute(): void 
    {
        $response = $this->get('api/v1/simple');
        $response->assertStatus(200);
        $response->assertJson($response->json());
    }

    public function test_get_elements_by_name_apiroute(): void 
    {
        $response = $this->json('GET', 'api/v1/nom/oxygene');
        $response->assertStatus(200);
        $response->assertJson($response->json());
    }

    public function test_get_elements_by_name_that_dont_exist_apiroute(): void
    {
        $response = $this->json('GET', 'api/v1/nom/oxygine');
        $response->assertStatus(404);
        $response->assertJson(["message" => "L'élement oxygine n'existe pas!"]); 
    }

    public function test_get_elements_by_symbol_apiroute(): void
    {
        $response = $this->json('GET', 'api/v1/symbole/au');
        $response->assertStatus(200);
        $response->assertJson($response->json());
    }

    public function test_get_elements_by_symbol_that_dont_exist_apiroute(): void
    {
        $response = $this->json('GET', 'api/v1/symbole/ro');
        $response->assertStatus(404);
        $response->assertJson(["message" => "L'élement avec le symbole ro n'existe pas!"]);
    }

    public function test_get_elements_by_atomic_number_apiroute(): void
    {
        $response = $this->json('GET', 'api/v1/numero/10');
        $response->assertStatus(200);
        $response->assertJson($response->json());
    }

    public function test_get_elements_by_atomic_number_that_dont_exist_apiroute(): void
    {
        $response = $this->json('GET', 'api/v1/numero/300');
        $response->assertStatus(404);
        $response->assertJson(["message" => "L'élement avec le numéro 300 n'existe pas! Essayer une valeur entre 1 et 118"]);
    }

    public function test_get_elements_by_atomic_number_with_wrong_characters_type_apiroute(): void
    {
        $response = $this->json('GET', 'api/v1/numero/twelve');
        $response->assertStatus(400);
        $response->assertJson(["message" => "Votre requête n'a pas été comprise par le serveur, vérifiez que les données saisies correspondent à celles attendues par le serveur. Pour plus d'informations, vous pouvez consulter la documentation de l'api à elements.sebdev.ca"]);
    }

    public function test_get_elements_by_period_number_apiroute(): void
    {
        $response = $this->json('GET', 'api/v1/periode/6');
        $response->assertStatus(200);
        $response->assertJson($response->json());
    }

    public function test_get_elements_by_period_number_that_dont_exist_apiroute(): void
    {
        $response = $this->json('GET', 'api/v1/periode/300');
        $response->assertStatus(404);
        $response->assertJson(["message" => "La période 300 n'existe pas! Essayez une valeur entre 1 et 7"]);
    }

    public function test_get_elements_by_period_number_with_wrong_characters_type_apiroute(): void
    {
        $response = $this->json('GET', 'api/v1/periode/eleven');
        $response->assertStatus(400);
        $response->assertJson(["message" => "Votre requête n'a pas été comprise par le serveur, vérifiez que les données saisies correspondent à celles attendues par le serveur. Pour plus d'informations, vous pouvez consulter la documentation de l'api à elements.sebdev.ca"]);
    }

    public function test_get_elements_by_group_number_apiroute(): void
    {
        $response = $this->json('GET', 'api/v1/groupe/6');
        $response->assertStatus(200);
        $response->assertJson($response->json());
    }

    public function test_get_elements_by_group_number_that_dont_exist_apiroute(): void
    {   
        $response = $this->json('GET', 'api/v1/groupe/300');
        $response->assertStatus(404);
        $response->assertJson(["message" => "Le groupe 300 n'existe pas! Essayez une valeur entre 1 et 18"]);
    }

    public function test_get_elements_by_group_number_with_wrong_characters_type_apiroute(): void
    {
        $response = $this->json('GET', 'api/v1/groupe/eleven');
        $response->assertStatus(400);
        $response->assertJson(["message" => "Votre requête n'a pas été comprise par le serveur, vérifiez que les données saisies correspondent à celles attendues par le serveur. Pour plus d'informations, vous pouvez consulter la documentation de l'api à elements.sebdev.ca"]);
    }

    public function test_get_elements_by_state_apiroute(): void 
    {
        $response = $this->json('GET', 'api/v1/etat/gaz');
        $response->assertStatus(200);
        $response->assertJson($response->json());
    }

    public function test_get_elements_by_state_that_dont_exist_apiroute(): void
    {
        $response = $this->json('GET', 'api/v1/etat/feu');
        $response->assertStatus(404);
        $response->assertJson(["message" => "L'état feu n'existe pas! Utilisez une des options suivantes : gaz, liquide et solide"]); 
    }

    public function test_get_elements_by_family_apiroute(): void 
    {
        $response = $this->json('GET', 'api/v1/famille/halogenes');
        $response->assertStatus(200);
        $response->assertJson($response->json());
    }

    public function test_get_elements_by_family_that_dont_exist_apiroute(): void
    {
        $response = $this->json('GET', 'api/v1/famille/metal');
        $response->assertStatus(404);
        $response->assertJson(["message" => "La famille d'élements metal n'existe pas! Utilisez l'une des options suivantes: actinides, alcalins, alcalino-terreux, gaz-nobles, halogenes, lanthanides, metalloides, metaux-de-transition, metaux-pauvres, non-metaux ou non-classes"]); 
    }

    public function test_get_badly_formatted_url(): void
    {
        $response = $this->json('GET', 'bad/format');
        $response->assertStatus(400);
        $response->assertJson(["message" => "Votre requête n'a pas été comprise par le serveur, vérifiez que les données saisies correspondent à celles attendues par le serveur. Pour plus d'informations, vous pouvez consulter la documentation de l'api à elements.sebdev.ca"]); 
    }
  
}
