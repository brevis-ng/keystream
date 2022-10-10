<?php

namespace App\DataTables;

use App\Models\Link;
use Hexters\Ladmin\Datatables\Datatables;
use Hexters\Ladmin\Contracts\DataTablesInterface;

class LinkDataTables extends Datatables implements DataTablesInterface
{

	/**
	 * Datatables function
	 */
	public function render()
	{

		/**
		 * Data from controller
		 */
		$data = self::$data;

		return $this->eloquent(app(Link::class)->with(['embed']))
			->addColumn('action', function ($item) {
				return view('table.action', [
					'show' => [
						'gate' => 'administrator.links.stream.update',
						'embed' => $item->embed,
						'code' => '<iframe width="100%" height="100%" src="'.$item->embed->embed_link.'"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
					],
					'edit' => [
						'gate' => 'administrator.links.stream.update',
						'url' => route('administrator.links.stream.edit', [$item->id, 'back' => request()->fullUrl()])
					],
					'destroy' => [
						'gate' => 'administrator.links.stream.destroy',
						'url' => route('administrator.links.stream.destroy', [$item->id, 'back' => request()->fullUrl()]),
					]
				]);
			})
			->escapeColumns([])
			->make(true);
	}

	/**
	 * Datatables Option
	 */
	public function options()
	{

		/**
		 * Data from controller
		 */
		$data = self::$data;

		return [
			'title' => 'List Of Link',
			'fields' => [
				['name' => 'Name', 'class' => 'text-center'],
				['name' => 'URL'],
				['name' => 'Poster'],
				['name' => 'Action', 'class' => 'text-center']
			],
			'foos' => [ // Custom data array. You can call in your blade with variable $foos
				'bar' => 'baz',
				'baz' => 'bar',
			],
			'buttons' => view('link._partials._createButton'),
			'options' => [
				'processing' => true,
				'serverSide' => true,
				'ajax' => request()->fullurl(),
				'columns' => [
					['data' => 'name'],
					['data' => 'url'],
					['data' => 'poster'],
					['data' => 'action', 'class' => 'text-left', 'orderable' => false]
				]
			]
		];
	}
}
