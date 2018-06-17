@if(!empty($news[0]->id))
  <table class="table table-hover">
    <thead>
        <tr>
            <th class="bs-checkbox ">

            </th>
            <th>
                Tên tin tức
            </th>
            <th>
                Tin hot
            </th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($news as $item)
        <tr>
            <td>

            </td>
            <td>
                <a href="{{ route('news.edit', ['id'=>$item->id]) }}">
                    {{ $item->name  }}
                </a>
            </td>
            <td>
                @if($item->is_hot == 1)
                    <span class="newtag">Hot</span>
                @endif
            </td>
            <td>
                <a href="{{ route('news.edit',['id'=>$item->id])  }}">Edit</a>
                |
                @php(
                    $urlDelete = route('news.delete', ['id'=>$item->id])
                )
                <a data-link="#"
                   href="javascript:void(0)"
                   onclick="fnDelete('{{ $urlDelete }}')">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4" style="text-align: center;">
                {{ $news->appends(['keysearch' => $keysearch])->links() }}
            </td>
        </tr>
    </tfoot>
</table>
  @else
  <section>
    <div id="exTab2" class="padding-top20">No result</div>
  </section>
  @endif