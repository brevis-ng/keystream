@if(isset($show))
@can($show['gate'])
<a class="btn btn-link" data-toggle="modal" data-target="#modal-detail-activity-{{ $show['embed']->id }}">
	{!! $show['title'] ?? ladmin()->icon('document-search') !!}
</a>
<div class="modal text-left fade" id="modal-detail-activity-{{ $show['embed']->id }}" tabindex="-1" aria-labelledby="modal-detail-activity-{{ $show['embed']->id }}Label" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header border-0">
				<h5 class="modal-title" id="modal-detail-activity-{{ $show['embed']->id }}Label">Embed Infomation</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="table-responsive">
				<table class="table">
					<tbody>
						<tr>
							<td colspan="3">
								<p class="card-title font-weight-bold my-2">Embed Detail</p>
							</td>
						</tr>
						<tr>
							<td>UUID</td>
							<td>{{ $show['embed']->uuid }}</td>
							<td></td>
						</tr>
						<tr>
							<td>Link</td>
							<td class="embed">{{ $show['embed']->embed_link }}</td>
							<td><a class="btn btn-link copy">Copy</a></td>
						</tr>
						<tr>
							<td>Code</td>
							<td class="code"><code>{{ $show['code'] }}</code></td>
							<td><a class="btn btn-link copy-code">Copy</a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(function () {
		$('.copy-code').on('click', function(e) {
			e.preventDefault();
			var succeed = copyToClipboard($('code'));
			if (!succeed) {
				$(this).html('Error copy');
			} else {
				$(this).html('Copied');
			}
			setTimeout(() => {
				$(this).html('Copy');
			}, 2000);
		});
	
		$('.copy').on('click', function(e) {
			e.preventDefault();
			var succeed = copyToClipboard($('.embed'));
			if (!succeed) {
				$(this).html('Error copy');
			} else {
				$(this).html('Copied');
			}
			setTimeout(() => {
				$(this).html('Copy');
			}, 2000);
		});
	
		function copyToClipboard(elem) {
			var targetId = "_hiddenCopyText_";
			var origSelectionStart, origSelectionEnd;
	
			target = document.getElementById(targetId);
			if (!target) {
				var target = document.createElement("textarea");
				target.style.position = "absolute";
				target.style.left = "-9999px";
				target.style.top = "0";
				target.id = targetId;
				document.body.appendChild(target);
			}
			target.textContent = elem.html();
	
			var currentFocus = document.activeElement;
			target.setSelectionRange(0, target.value.length);
			target.focus();
			
			// copy the selection
			var succeed;
			try {
				succeed = document.execCommand("copy");
			} catch(e) {
				succeed = false;
			}
			// restore original focus
			if (currentFocus && typeof currentFocus.focus === "function") {
				currentFocus.focus();
			}
			target.textContent = "";
			return succeed;
		}
	});
</script>
@endcan
@endif

@if(isset($edit))
@can($edit['gate'])
<a href="{{ $edit['url'] }}" class="btn btn-link text-muted">
	{!! $edit['title'] ?? ladmin()->icon('pencil-alt') !!}
</a>
@endcan
@endif

@if(isset($destroy))
@can($destroy['gate'])
<a href="{{ $destroy['url'] }}" class="btn btn-link" data-toggle="modal" data-target="#action-{{ Str::slug($destroy['url']) }}">
	{!! $destroy['title'] ?? ladmin()->icon('trash') !!}
</a>

<div class="modal fade" id="action-{{ Str::slug($destroy['url']) }}" tabindex="-1" role="dialog" aria-labelledby="action-{{ Str::slug($destroy['url']) }}Label" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<form action="{{ $destroy['url'] }}" method="post">
				@csrf
				@method('DELETE')
				<div class="modal-header border-0">
					<h5 class="modal-title" id="action-{{ Str::slug($destroy['url']) }}Label">Delete!</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Do you want to delete this item?
				</div>
				<div class="modal-footer border-0">
					<button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">NO</button>
					<button type="submit" class="btn btn-sm btn-danger">YES</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endcan
@endif