<x-ladmin-layout>
    <x-slot name="title">Create Link</x-slot>

    <form action="{{ route('administrator.links.stream.store') }}" method="post">
        @csrf

        @include('link._partials._form', ['link' => app(App\Models\Link::class)])

        <div class="text-right">
            <button type="submit" class="btn btn-primary">
                Submit Link
            </button>
        </div>
    </form>

</x-ladmin-layout>