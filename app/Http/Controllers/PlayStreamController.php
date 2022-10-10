<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\EmbedRepository;

class PlayStreamController extends Controller
{
    protected $repository;

    public function __construct(EmbedRepository $repository) {
        $this->repository = $repository; 
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($uuid)
    {
        $embed = $this->repository->getModel()->where('uuid', $uuid)->firstOrFail();

        $data = array(
            'uuid'   => $embed->uuid,
            'name'   => $embed->link->name,
            'url'    => $embed->link->url,
            'poster' => $embed->link->poster ?? '',
        );

        return view('embed.index', $data);
    }
}
