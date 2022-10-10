<x-ladmin-layout>
    <x-slot name="title">Edit Link</x-slot>

    <form action="{{ route('administrator.links.stream.update', $link->id) }}" method="post">
        @csrf
        @method('PUT')

        @include('link._partials._form', ['link' => $link])

        <div class="text-right">
            <button type="submit" class="btn btn-primary">
                Update Link
            </button>
        </div>
    </form>

</x-ladmin-layout>