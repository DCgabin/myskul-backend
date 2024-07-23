<?php

namespace Modules\User\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Core\Http\Controllers\Api\CoreController;
use Modules\User\Entities\Category;
use Modules\User\Transformers\CategoryResource;
use Modules\Quiz\Transformers\ThemeResource;
use Modules\Quiz\Entities\Theme;
use Modules\Authentication\Transformers\AuthenticateUserResource as UserResource;



class CategoryController extends CoreController
{
    public function index(Request $request)
    {
        $level_id = $request->user()->level_id;
        $speciality_id = $request->user()->speciality_id;
        if($level_id && $speciality_id) {
          /*  if ($level_id >= 1 && $level_id <= 5) {
                return $this->successResponse('Got categories successfully', [
                    'categories' => CategoryResource::collection(Category::query()->filter($request)->limit(1)->get())
                ]);
            } else {
                if ($speciality_id == 10) {
                    return $this->successResponse('Got categories successfully', [
                        'categories' => CategoryResource::collection(Category::query()->filter($request)->get()->forget(0))
                    ]);
                }
                return $this->successResponse('Got categories successfully', [
                    'categories' => CategoryResource::collection(Category::query()->filter($request)->limit(1)->get())
                ]);

            }*/

        // Première requête pour obtenir les thèmes
        $themes = Theme::where('level_id', $level_id)
        ->where('speciality_id', $speciality_id)
        ->get();
        // Extraire les IDs des catégories à partir des thèmes
        $category_ids = $themes->pluck('category_id');         
            // Deuxième requête pour obtenir les catégories
        $categories = Category::whereIn('id', $category_ids)
        ->filter($request)
        ->get();
      
        return $this->successResponse('Got categories successfully', [
            'categories' => CategoryResource::collection($categories)
        ]);
     

            
    }
        return $this->successResponse('Got categories successfully', [
            'categories' => CategoryResource::collection(Category::query()->filter($request)->get())
        ]);
    }
    public function show($id)
    {
        return $this->successResponse('Got category by id successfully', [
            'category' => new CategoryResource(Category::find($id))
        ]);
    }
}
