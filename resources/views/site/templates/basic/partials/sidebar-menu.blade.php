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
              @foreach($domain->pages()->active()->get() as $menu_page)
                  <li>
                      <a href="{!! $menu_page->present()->url() !!}">{!! ucwords($menu_page->present()->pageTitle()) !!}</a>
                  </li>
              @endforeach
          </ul>
	  </div>
</div>

@if(isset($page_view))
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Elsewhere on the web</h3>
        </div>
        <div class="panel-body">
            @if(isset($page->meta['images']))
                Related Photos <br>
                <div class="row">
                @foreach($page->meta['images'] as $image_url)
                    <div class="col-xs-6 col-md-3">
                        <a href="{!! $image_url !!}" class="thumbnail">
                            <img src="{!! $image_url !!}" alt="{!! $page->name !!} photo">
                        </a>
                    </div>
                @endforeach
                </div>
            @endif

            @if(isset($page->meta['videos']))
                Related Videos <br>
                <ul>
                    @foreach($page->meta['videos'] as $video_url)
                        <li><a href="{!! $video_url !!}">{!! $video_url !!}</a></li>
                    @endforeach
                </ul>
            @endif

            Social Media (tweets)<br>
        </div>
    </div>
@endif
