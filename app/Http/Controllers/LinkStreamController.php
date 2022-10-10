<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\LinkDataTables;
use Hexters\Ladmin\Exceptions\LadminException;
use App\Repositories\LinkRepository;
use App\Repositories\EmbedRepository;
use Illuminate\Support\Str;
use App\Rules\UrlUnique;

class LinkStreamController extends Controller
{
    protected $repository;

    public function __construct(LinkRepository $repository) {
        $this->repository = $repository; 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ladmin()->allow('administrator.links.stream.index');

        return LinkDataTables::view('link.index', [
            /**
             * You can catch this data form blade or UserDatatables class 
             * via static property self$data
             */
            'foo' => 'bar'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        ladmin()->allow('administrator.links.stream.create');

        return view('link.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ladmin()->allow('administrator.links.stream.create');

        $request->validate([
            'name' => ['required'],
            'url' => ['required', 'url', 'unique:links'],
        ]);

        try {
            $link_id = $this->repository->createLink($request);

            $uuid = Str::uuid();
            $embed_data = array(
                'link_id' => $link_id,
                'uuid' => $uuid,
                'embed_link' => config('app.url', 'https://keystream.com') . '/embed/' . $uuid,
            );
            $embed = (new EmbedRepository())->createEmbed($embed_data);

            session()->flash('success', ['Link has been created sucessfully']);
            return redirect()->back();
        } catch (LadminException $e) {
            return redirect()->back()->withErrors([
                $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('administrator.links.stream.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        ladmin()->allow('administrator.links.stream.update');

        $data = $this->repository->getModel()->findOrFail($id);
        return view('link.edit', ['link' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        ladmin()->allow('administrator.links.stream.update');

        $request->validate([
            'name' => ['required'],
            'url'  => ['required', 'string', new UrlUnique($id)]
        ]);
        try {
            $this->repository->updateLink($request, $id);

            $uuid = Str::uuid();
            $embed_data = array(
                'uuid' => $uuid,
                'embed_link' => config('app.url', 'https://keystream.com') . '/embed/' . $uuid,
            );
            $embed = (new EmbedRepository())->updateEmbed($embed_data, $id);

            session()->flash('success', ['Update has been sucessfully']);
            return redirect()->back();
        } catch (LadminException $e) {
            return redirect()->back()->withErrors([
                $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ladmin()->allow('administrator.links.stream.destroy');
        
        try {
            $this->repository->getModel()->findOrFail($id)->delete();
            session()->flash('success', ['Delete has been sucessfully']);
            return redirect()->back();
        } catch (LadminException $e) {
            return redirect()->back()->withErrors([
                $e->getMessage()
            ]);
        }
    }
}
