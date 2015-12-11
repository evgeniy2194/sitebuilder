<div class="panel panel-default">
	  <div class="panel-heading">
			<h3 class="panel-title">Menu</h3>
	  </div>
	  <div class="panel-body">
          <ul class="nav nav-pills nav-stacked">
              <li class="@if(Request::is('keywordgroup*') || Request::is('keyword*')) active @endif">
                  <a href="/keywordgroup">Keyword Groups</a>
              </li>
              <li class="@if(Request::is('domaingroup*') || Request::is('domain/*')) active @endif">
                  <a href="/domaingroup">Domain Groups</a>
              </li>
              <li class="@if(Request::is('domaintemplate*')) active @endif">
                  <a href="/domaintemplate">Templates</a>
              </li>
          </ul>
	  </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Tools</h3>
    </div>
    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked">
            <li>
                <a href="/generate-keywords">Keyword Generator</a>
            </li>
        </ul>
    </div>
</div>