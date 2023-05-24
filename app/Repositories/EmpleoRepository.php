<?php

namespace App\Repositories;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Exception;

use App\Repositories\AbstractRepository;
use App\Models\Empleo;

class EmpleoRepository extends AbstractRepository
{
    public function __construct(Empleo $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $params
     * 
     * @return $query
     */
    public function search(array $params = [],  string $with = null)
    {
        $query = $this->model
            ->select();

        
        if (isset($params['empresa']) && $params['empresa']) {
            $query->where('empresa', 'like', '%' . $params['empresa'] . '%');
        }
        if (isset($params['created_at_from']) && $params['created_at_from']) {
            $query->where('date', '>=', $params['created_at_from']);
        }
        if (isset($params['created_at_to']) && $params['created_at_to']) {
            $query->where('date', '<=', $params['created_at_to']);
        }

        return $query;
    }

    public function getTotalEmpleos()
    {

        $query = $this->model
            ->select('empleos.id')
            ->get();

        return $query;
    }


    public function getEmpleos()
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
     * @param int $total
     * 
     * @return LengthAwarePaginator $items
     */
    public function customPagination($query, $params, $pageNumber, $total)
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
                    $query->orderBy('empresa', 'ASC');
                } else {
                    $query->orderBy('empresa', 'DESC');
                }
            }
            if (isset($params['order_by'])) {
                if ($params['order_by'] == 1) {
                    $query->orderBy('cargo', 'ASC');
                } else {
                    $query->orderBy('cargo', 'DESC');
                }
            }
            $items = $query->get();

            $items = new LengthAwarePaginator($items, $total, $perPage, $page, [
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