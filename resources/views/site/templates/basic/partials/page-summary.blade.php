<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a href="/{!! $page->present()->pageURL() !!}">{!! ucwords($page->present()->pageTitle()) !!}</a>
        </h3>
    </div>
    <div class="panel-body">
        <p>{!! $page->present()->pageSummary(300) !!}</p>
    </div>
    <div class="panel-footer">
        Posted on: {!! $page->present()->pagePostFormattedDate() !!} by <a href="#">Admin</a>
    </div>
</div>
