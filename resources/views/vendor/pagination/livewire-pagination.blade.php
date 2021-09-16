@if ($paginator->hasPages())
  <ul class="pagination">

    @if ($paginator->onFirstPage())
      <li class="paginate_button page-item previous disabled" id="example1_previous">
        <a  href="#" wire:click="setPage('{{$paginator->previousPageURL()}}')" class="page-link">Previous</a>
      </li>
    @else
      <li class="paginate_button page-item previous" id="example1_previous">
        <a  href="#" wire:click="setPage('{{$paginator->previousPageURL()}}')" class="page-link">Previous</a>
      </li>
    @endif



    @foreach ($elements as $element)

      @if (is_string($element))
        <li class="disabled"><span>{{ $element }}</span></li>
      @endif



      @if (is_array($element))
        @foreach ($element as $page => $url)
          @if ($page == $paginator->currentPage())
              <li class="paginate_button page-item active"><a href="#" wire:click="setPage('{{$url}}')" class="page-link">{{ $page }}</a></li>
          @else
              <li class="paginate_button page-item "><a href="#" wire:click="setPage('{{$url}}')" class="page-link">{{ $page }}</a></li>
          @endif
        @endforeach
      @endif
    @endforeach



    @if ($paginator->hasMorePages())
        <li class="paginate_button page-item next" ><a href="#" wire:click="setPage('{{$paginator->nextPageUrl()}}')" class="page-link">Next</a>
    @else
        <li class="paginate_button page-item next disabled" ><a href="#"  class="page-link">Next</a>
    @endif
  </ul>
@endif
