@if ($paginator->lastPage() > 1)
<nav class="pagination" role="navigation" aria-label="pagination">
	<a href="{{ ($paginator->currentPage() > 1)? $paginator->url($paginator->currentPage()-1):'#' }}" 
		class="pagination-previous" {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}>
		Previous
	</a>
	<a href="{{ ($paginator->currentPage() < $paginator->lastPage())? $paginator->url($paginator->currentPage()+1):'#' }}" 
		class="pagination-next" {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}>
		Next page
	</a>
	<ul class="pagination-list">
		@if ($paginator->lastPage() > 10)
			<?php 
			$total = $paginator->lastPage();
			$current = $paginator->currentPage();
			$rangeMin = max(1, $current - 2);
			$rangeMax = min($rangeMin + 4, $total);
			$rangeMin = max(1, $rangeMax - 4);
			$range = range($rangeMin, $rangeMax);
			if($range[0] > 1) array_unshift($range, 1);
			if(end($range) < $total) array_push($range, $total);
			?>	
			@for ($i = 0; $i < count($range); $i++)
			<li>
				<a href="{{ $paginator->url($range[$i]) }}"
					class="pagination-link {{ ($paginator->currentPage() == $range[$i]) ? 'is-current' : '' }}" 
					aria-label="Page {{$range[$i]}}" aria-current="page">
					{{$range[$i]}}
				</a>
			</li>
				@if($i+1 < count($range) && $range[$i+1] - $range[$i] > 1)
				<li>
					<span class="pagination-ellipsis">&hellip;</span>
				</li>
				@endif
			@endfor
		@else
			@for ($i = 1; $i <= $paginator->lastPage(); $i++)
			<li>
				<a href="{{ $paginator->url($i) }}"
					class="pagination-link {{ ($paginator->currentPage() == $i) ? 'is-current' : '' }}" 
					aria-label="Page {{$i}}" aria-current="page">
					{{$i}}
				</a>
			</li>
			@endfor
		@endif
	</ul>
</nav>
@endif