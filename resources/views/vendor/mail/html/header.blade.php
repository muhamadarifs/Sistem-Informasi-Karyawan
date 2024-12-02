@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="public/img/FM LOGO 2.png" class="logo" alt="Feen Marine">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
