<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Repositories\DocumentTypeRepository;

class DocumentTypeSeeder extends Seeder
{
    /** @var DocumentTypeRepository */
    protected $documentTypeRepository;

    public function __construct(DocumentTypeRepository $documentTypeRepository)
    {
        $this->documentTypeRepository = $documentTypeRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'name' => 'cédula de ciudadanía',
                'slug' => 'c.c'
            ],

            [
                'name' => 'cédula de extranjería',
                'slug' => 'c.e'
            ],

            [
                'name' => 'tarjeta de identidad',
                'slug' => 't.i'
            ],
        ];

        foreach ($items as $item) {
            $this->documentTypeRepository->create($item);
        }
    }
}
