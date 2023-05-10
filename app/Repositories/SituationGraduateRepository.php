<?php

namespace App\Repositories;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Exception;

use App\Repositories\AbstractRepository;
use App\Models\SituationsGraduates;

class SituationGraduateRepository extends AbstractRepository
{
    public function __construct(SituationsGraduates $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $params
     * 
     * @return $query
     */
    public function search(array $params = [], string $with = null)
    {
        $query = $this->model
            ->select();

        if (isset($with)) {
            $query->with($with);
        }

        if (isset($params['anio_graduation']) && $params['anio_graduation'] && isset($params['anio_actual']) && $params['anio_actual']) {
            $query->where('anio_graduation', 'like', '%' . $params['anio_graduation'] . '%',
                          'anio_actual', 'like', '%' . $params['anio_actual'] . '%');
        }
        if (isset($params['created_at_from']) && $params['created_at_from']) {
            $query->where('date', '>=', $params['created_at_from']);
        }
        if (isset($params['created_at_to']) && $params['created_at_to']) {
            $query->where('date', '<=', $params['created_at_to']);
        }

        return $query;
    }

   
    public function getExperiences()
    {

        $query = $this->model
            ->select('*')
            ->get();

        return $query;
    }


    /**
     * @param array $params
     * 
     * @return array
     */
    public function transformParameters(array $params)
    {
        /*  if (empty($params)) {
            $params = set_sub_month_date_filter($params, 'created_at_from', 1);
        }

        # Clean empty keys from array
        $params = array_filter($params); */

        return $params;
    }

    /**
     * @param $query
     * @param array $params
     * @param int $pageNumber
     * 
     * @return LengthAwarePaginator $items
     */
    public function customPagination($query, $params, $pageNumber)
    {
        try {

            $perPage = 12;
            $pageName = 'page';
            $offset = ($pageNumber -  1) * $perPage;

            $page = Paginator::resolveCurrentPage($pageName);

            $query->skip($offset)
                ->take($perPage);

            if (isset($params['order_by'])) {
                if ($params['order_by'] == 1) {
                    $query->orderBy('nombre', 'ASC');
                } else {
                    $query->orderBy('nombre', 'DESC');
                }
            }
            $items = $query->get();

            $items = new LengthAwarePaginator($items, $perPage, $page, [
                'path' => Paginator::resolveCurrentPath(),
                'pageName' => $pageName
            ]);

            $items->appends($params);

            return $items;
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }

    
}