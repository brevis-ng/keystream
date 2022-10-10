<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Hexters\Ladmin\Contracts\MasterRepositoryInterface;
use App\Models\Link;

class LinkRepository extends Repository implements MasterRepositoryInterface
{

    public function __construct()
    {
        parent::__construct( app(Link::class) );
    }

    /**
     * Update link
     *
     * @param Request $request
     * @param [Model] $user
     * @return Void
     */
    public function updateLink(Request $request, $id)
    {
        $link = $this->model->findOrFail($id);
        $link->update($request->all());
        $link->refresh();
    }

    public function createLink(Request $request)
    {
        $link = $this->model->create($request->all());

        return $link->id;
    }
}
