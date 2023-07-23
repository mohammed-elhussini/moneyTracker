@foreach ($childs as $childCat)
    @if ($childCat->id != $category->id)
        <option value="{{$childCat->id}}"
        @selected($childCat->id == old('parent_id', $category->parent_id))>
        @for ($i = 0; $i <= $level; $i++)
            -
        @endfor
            {{$childCat->name}}
    </option>

    @if ($childCat->child->count() > 0)
        @include('site.category.partials.childs_category_options', ['childs' => $childCat->child, 'level' => $level + 1])
    @endif

    @endif
@endforeach
