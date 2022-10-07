<?php

// les tests concernant la CRUD GALA

use App\Models\Gala;

it('can create one instance of GALA', function () {   

   // $this->withoutExceptionHandling();

    $user = createSuperAdministrator() ;

    $response =  $this->actingAs($user)->post('/gala/store',
    [
        'annee_gala' => "2022",
        'nom_pco1' => "N'da regis richmond",
        'nom_pco2' => "Soro Dognimani",
        'nb_place' => "158"
    ]) ;

    $response->assertStatus(302) ;

    $this->assertCount(1, Gala::all());
    
});




it('can update gala infromations', function () {
   

    $this->withoutExceptionHandling();

    $user = createSuperAdministrator() ;

    $this->actingAs($user)->post('/gala/store',
    [
        'annee_gala' => "2022",
        'nom_pco1' => "N'da regis richmond",
        'nom_pco2' => "Soro Dognimani",
        'nb_place' => '158'
    ]) ;

    $this->assertCount(1, Gala::all());
    $gala = Gala::where('id', 1)->first();

    $response = $this->actingAs($user)->patch('/gala/update/'.$gala->id,
        [
            'nb_place' => '58',
            'annee_gala' => "2022-2023",
            'nom_pco1' => "N'da Regis Richmond",
            'nom_pco2' => "Kane Illiassa"
            
        ]);

    
    expect($gala)->toBeInstanceOf(Gala::class);

    expect($gala->annee)->toBeString('2022-2023');
    expect($gala->nomPco1)->toBeString("N'da Regis Richmond");
    expect($gala->nomPco2)->toBeString('Kane Illiassa');
    expect($gala->nbPlace)->toBeInt('58');

    $response->assertStatus(200);

});

