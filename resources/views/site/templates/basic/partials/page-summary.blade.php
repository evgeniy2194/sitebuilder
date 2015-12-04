<div class="panel panel-default">
	  <div class="panel-heading">
			<h3 class="panel-title">
                <a href="/{!! $page->present()->pageURL() !!}">{!! $page->present()->pageTitle() !!}</a>
                <span class="pull-right"><small>{!! $page->present()->pagePostDate() !!}</small></span>
            </h3>
	  </div>
	  <div class="panel-body">
          <p>{!! $page->present()->pageSummary(300) !!}</p>
	  </div>
</div>