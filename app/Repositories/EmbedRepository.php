<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Hexters\Ladmin\Contracts\MasterRepositoryInterface;
use App\Models\Embed;

class EmbedRepository extends Repository implements MasterRepositoryInterface
{

    public function __construct()
    {
        parent::__construct( app(Embed::class)->with(['link']) );
    }

    /**
     * Update embed
     *
     * @param Request $request
     * @param [Model] $user
     * @return Void
     */
    public function updateEmbed($data, $id)
    {
        $embed = $this->model->where('link_id', $id)->firstOrFail();
        $embed->update($data);
        $embed->refresh();
    }

    public function createEmbed($data)
    {
        $embed = $this->model->create($data);

        return $embed;
    }
}
