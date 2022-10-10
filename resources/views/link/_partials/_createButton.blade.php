@can('administrator.links.stream.create')
  <a href="{{ route('administrator.links.stream.create', ['back' => request()->fullUrl()]) }}" class="btn btn-sm btn-primary">Create Link</a>
@endcan