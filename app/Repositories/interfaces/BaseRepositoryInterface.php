<?php

namespace App\Repositories\interfaces;

use ArrayAccess;

interface BaseRepositoryInterface
{
    /**
     * find a resource by id
     *
     * @param mixed $id
     * @return ArrayAccess|null
     */
    public function findOne($id): ?ArrayAccess;

    /**
     * find a resource by criteria
     *
     * @param array $criteria
     * @return ArrayAccess | null
     */
    public function findOneBy(array $criteria): ?ArrayAccess;

    /**
     * Search All resources
     *
     * @param array $searchCriteria
     * @return mixed
     */
    public function findBy(array $searchCriteria = []);

    /**
     * save a resource
     *
     * @param array $data
     * @return ArrayAccess
     */
    public function save(array $data): ArrayAccess;

    /**
     * update a resource
     *
     * @param ArrayAccess $model
     * @param array $data
     * @return ArrayAccess
     */
    public function update(ArrayAccess $model, array $data): ArrayAccess;

    /**
     * delete a resource
     *
     * @param ArrayAccess $model
     * @return bool
     */
    public function delete(ArrayAccess $model): bool;
}
