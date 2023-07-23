@foreach ($categories as $category)
    <tr class="table-light">
        <td>{{ $loop->parent->index + 1 }}.{{ $loop->index + 1 }}</td>
        <td>
            <div class="symbol symbol-40 symbol-sm flex-shrink-0">
                <img class="h-75 align-self-end"
                     src="{{$category->icon ? asset($category->icon) : asset('/assets/media/users/blank.png') }}">
            </div>
        </td>
        <td>{{$category->name}}</td>
        <td>{!! $category->description !!}</td>
        <td>{{($category->parent_id  == 0) ? 'بدون' : $category->parent->name }}</td>
        <td>{{$category->transactions->count()}}</td>
        <td class="text-right">
            <a href="{{route('category.show',$category->id)}}"
               class="btn btn-sm btn-clean btn-icon mr-2" title="View details">
                    <span class="svg-icon svg-icon-md">
                        <i class="icon-xl la la-eye"></i>
                    </span>
            </a>
            <a href="{{route('category.edit',$category->id)}}"
               class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">
                    <span class="svg-icon svg-icon-md">
                        <i class="icon-xl la la-pencil-alt"></i>
                    </span>
            </a>
            <form class="d-inline-flex"
                  method="post"
                  action="{{route('category.destroy',$category->id)}}">
                @csrf
                @method('delete')
                <button type="submit" id="kt_sweetalert"
                        class="btn btn-sm btn-clean btn-icon kt_sweetalert"
                        title="Delete">
                        <span class="svg-icon svg-icon-md">
                            <i class="icon-xl la la-trash-alt"></i>
                        </span>
                </button>
            </form>
        </td>
    </tr>

    @if ($category->child->count() > 0)
        @include('site.category.partials.child_category', ['categories' => $category->child])
    @endif

@endforeach
