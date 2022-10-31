<?php

namespace App\Repositories;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Exception;

use App\Repositories\AbstractRepository;
use App\Models\Post;

class PostRepository extends AbstractRepository
{
    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $params
     * @param int $postCategoryId
     * 
     * @return $query
     */
    public function search(array $params = [], int $postCategoryId = null, string $with = null)
    {
        $query = $this->model
            ->select();

        if (isset($postCategoryId) && $postCategoryId) {
            $query->where('post_category_id', $postCategoryId);
        }

        if (isset($with)) {
            $query->with($with);
        }

        if (isset($params['title']) && $params['title']) {
            $query->where('title', 'like', '%' . $params['title'] . '%');
        }
        if (isset($params['created_at_from']) && $params['created_at_from']) {
            $query->where('date', '>=', $params['created_at_from']);
        }
        if (isset($params['created_at_to']) && $params['created_at_to']) {
            $query->where('date', '<=', $params['created_at_to']);
        }

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

            $perPage = 10;
            $pageName = 'page';
            $offset = ($pageNumber -  1) * $perPage;

            $page = Paginator::resolveCurrentPage($pageName);

            $query->skip($offset)
                ->take($perPage);

            if (isset($params['order_by'])) {
                if ($params['order_by'] == 1) {
                    $query->orderBy('title', 'ASC');
                } else {
                    $query->orderBy('title', 'DESC');
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

    /**
     * @var \App\Models\PostCategory $postCategory
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function allWithImages($postCategory)
    {
        return $this->model->with('images')->where('post_category_id', $postCategory->id);
    }
}
