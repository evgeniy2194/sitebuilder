<div class="panel panel-default">
	  <div class="panel-heading">
			<h3 class="panel-title">Search</h3>
	  </div>
	  <div class="panel-body">
          <form class="form-inline">
              <div class="form-group">
                  <label class="sr-only" for="search-input">Search</label>
                  <input type="search" class="form-control" id="search-input" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-primary">Go</button>
          </form>
	  </div>
</div>


<div class="panel panel-default">
	  <div class="panel-heading">
			<h3 class="panel-title">Categories</h3>
	  </div>
	  <div class="panel-body">
          <ul class="list-unstyled">
              @if( ! isset($domain))
                  <?php $domain = $page->domain; ?>
              @endif
              @foreach($domain->pages()->active()->get() as $page)
                  <li>
                      <a href="{!! $page->present()->url() !!}">{!! ucwords($page->present()->pageTitle()) !!}</a>
                  </li>
              @endforeach
          </ul>
	  </div>
</div>

@if(isset($page_view))
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Widget</h3>
        </div>
        <div class="panel-body">
            Related Photos <br>
            Related Videos <br>
            Social Media (tweets)<br>
        </div>
    </div>
@endif
