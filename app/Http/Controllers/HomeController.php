<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;

use App\Http\Requests\Filters\NoticeFilterRequest;
use App\Http\Requests\Filters\CourseFilterRequest;
use App\Http\Requests\Filters\EventFilterRequest;
use App\Http\Requests\Filters\GalleryFilterRequest;
use App\Http\Requests\Filters\VideoFilterRequest;
use App\Repositories\PostCategoryRepository;
use App\Repositories\PostRepository;

class HomeController extends Controller
{
    /** @var PostCategoryRepository */
    protected $postCategoryRepository;

    /** @var PostRepository */
    protected $postRepository;

    /** @var string */
    protected $viewLocation = 'pages.';

    public function __construct(
        PostCategoryRepository $postCategoryRepository,
        PostRepository $postRepository
    ) {
        $this->postCategoryRepository = $postCategoryRepository;
        $this->postRepository = $postRepository;
    }

    public function home()
    {
        return view('pages.home');
    }

    public function notices(NoticeFilterRequest $request)
    {
        $postNotice = $this->postCategoryRepository->getByAttribute('name', 'Noticias');

        try {
            $params = $this->postRepository->transformParameters($request->all());
            $query = $this->postRepository->search($params, $postNotice->id);
            $total = $query->count();

            $items = $this->postRepository->customPagination($query, $params, $request->get('page'), $total);

            return view($this->viewLocation . 'notices.index', compact('items'))
                ->nest('filters', $this->viewLocation . 'notices.filters', compact('params', 'total'))
                ->nest('table', $this->viewLocation . 'notices.table', compact('items'));
        } catch (Exception $th) {
            throw $th;
        }
    }

    /**
     * @param int $id
     */
    public function showNotice($id)
    {
        try {
            $item = $this->postRepository->getById($id);

            $imageHeader = $item->imageHeader();
            $images = $item->images()->whereNotIn('id', [$imageHeader->id])->get();

            return view($this->viewLocation . 'notices.show', compact('item', 'imageHeader', 'images'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function courses(CourseFilterRequest $request)
    {
        $postCourse = $this->postCategoryRepository->getByAttribute('name', 'Cursos');

        try {
            $params = $this->postRepository->transformParameters($request->all());
            $query = $this->postRepository->search($params, $postCourse->id);
            $total = $query->count();

            $items = $this->postRepository->customPagination($query, $params, $request->get('page'), $total);

            return view($this->viewLocation . 'courses.index', compact('items'))
                ->nest('filters', $this->viewLocation . 'courses.filters', compact('params', 'total'))
                ->nest('table', $this->viewLocation . 'courses.table', compact('items'));
        } catch (Exception $th) {
            throw $th;
        }
    }

    /**
     * @param int $id
     */
    public function showCourse($id)
    {
        try {
            $item = $this->postRepository->getById($id);

            $imageHeader = $item->imageHeader();
            $images = $item->images()->whereNotIn('id', [$imageHeader->id])->get();

            return view($this->viewLocation . 'courses.show', compact('item', 'imageHeader', 'images'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function events(EventFilterRequest $request)
    {
        $postEvent = $this->postCategoryRepository->getByAttribute('name', 'Eventos');

        try {
            $params = $this->postRepository->transformParameters($request->all());
            $query = $this->postRepository->search($params, $postEvent->id);
            $total = $query->count();

            $items = $this->postRepository->customPagination($query, $params, $request->get('page'), $total);

            return view($this->viewLocation . 'events.index', compact('items'))
                ->nest('filters', $this->viewLocation . 'events.filters', compact('params', 'total'))
                ->nest('table', $this->viewLocation . 'events.table', compact('items'));
        } catch (Exception $th) {
            throw $th;
        }
    }

    /**
     * @param int $id
     */
    public function showEvent($id)
    {
        try {
            $item = $this->postRepository->getById($id);

            $imageHeader = $item->imageHeader();
            $images = $item->images()->whereNotIn('id', [$imageHeader->id])->get();

            return view($this->viewLocation . 'events.show', compact('item', 'imageHeader', 'images'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function gallerys(GalleryFilterRequest $request)
    {
        $postGallery = $this->postCategoryRepository->getByAttribute('name', 'Galería');

        try {
            $params = $this->postRepository->transformParameters($request->all());
            $query = $this->postRepository->search($params, $postGallery->id);
            $total = $query->count();

            $items = $this->postRepository->customPagination($query, $params, $request->get('page'), $total);

            return view($this->viewLocation . 'gallerys.index', compact('items'))
                ->nest('filters', $this->viewLocation . 'gallerys.filters', compact('params', 'total'))
                ->nest('table', $this->viewLocation . 'gallerys.table', compact('items'));
        } catch (Exception $th) {
            throw $th;
        }
    }

    /**
     * @param int $id
     */
    public function showGallery($id)
    {
        try {
            $item = $this->postRepository->getById($id);

            $imageHeader = $item->imageHeader();
            $images = $item->images()->whereNotIn('id', [$imageHeader->id])->get();

            return view($this->viewLocation . 'gallerys.show', compact('item', 'imageHeader', 'images'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function videos(VideoFilterRequest $request)
    {
        $postGallery = $this->postCategoryRepository->getByAttribute('name', 'Videos');

        try {
            $params = $this->postRepository->transformParameters($request->all());
            $query = $this->postRepository->search($params, $postGallery->id);
            $total = $query->count();

            $items = $this->postRepository->customPagination($query, $params, $request->get('page'), $total);

            return view($this->viewLocation . 'videos.index', compact('items'))
                ->nest('filters', $this->viewLocation . 'videos.filters', compact('params', 'total'))
                ->nest('table', $this->viewLocation . 'videos.table', compact('items'));
        } catch (Exception $th) {
            throw $th;
        }
    }
}
