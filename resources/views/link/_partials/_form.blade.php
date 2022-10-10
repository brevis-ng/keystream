<x-ladmin-form-group name="name" label="Link Name *">
    <x-slot name="prepend">
        {!! ladmin()->icon('user-circle') !!}
    </x-slot>

    <input type="text" placeholder="Link Name" class="form-control" name="name" id="name" required value="{{ old('name', $link->name) }}">
</x-ladmin-form-group>

<x-ladmin-form-group name="url" label="Link URL *">
    <x-slot name="prepend">
        {!! ladmin()->icon('at-symbol') !!}
    </x-slot>

    <input type="text" placeholder="Link M3U8" class="form-control" name="url" id="url" required value="{{ old('url', $link->url) }}">
</x-ladmin-form-group>

<x-ladmin-form-group name="poster" label="Poster">
    <x-slot name="prepend">
        {!! ladmin()->icon('photograph') !!}
    </x-slot>

    <input type="text" placeholder="Ảnh poster" class="form-control" name="poster" id="poster" value="{{ old('poster', $link->poster) }}">
</x-ladmin-form-group>