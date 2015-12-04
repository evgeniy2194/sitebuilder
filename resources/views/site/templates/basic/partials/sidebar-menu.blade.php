<h3>Pages</h3>
<ul class="list-unstyled">
    @if( ! isset($domain))
        <?php $domain = $page->domain; ?>
    @endif
    @foreach($domain->pages()->active()->get() as $page)
        <li>
            <a href="{!! $page->present()->url() !!}">{!! $page->present()->pageTitle() !!}</a>
        </li>
    @endforeach
</ul>