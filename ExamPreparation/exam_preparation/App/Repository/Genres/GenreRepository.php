<?php

namespace App\Repository\Genres;


use App\Data\GenreDTO;
use App\Repository\DatabasesAbstract;

class GenreRepository extends DatabasesAbstract implements GenreRepositoryInterface
{

    /**
     * @return \Generator|GenreDTO[]
     */
    public function findAll(): \Generator
    {
       return $this->db->query(
            "
                SELECT 
                    id,
                    name
                FROM genres
            ")->execute()
                ->fetch(GenreDTO::class);
    }

    public function findOneById(int $id): GenreDTO
    {
        return $this->db->query(
            "
                SELECT 
                    id,
                    name
                FROM genres
                WHERE id = ?
            ")->execute([$id])
            ->fetch(GenreDTO::class)
            ->current();
    }
}