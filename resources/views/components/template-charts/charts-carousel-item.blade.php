<!-- Item de carousel -->
<tr>
    <td class="text-muted">{{ $tittle }}</td>
    <td class="w-100 px-0">
        <div class="progress progress-md mx-4">
            <div class="progress-bar bg-primary" role="progressbar"
                style="width: {{ $size }} ; background-color: {{ $color }};" aria-valuenow="70" aria-valuemin="0"
                aria-valuemax="100"></div>
        </div>
    </td>
    <td>
        <h5 class="font-weight-bold mb-0">
            {{ $value }}
        </h5>
    </td>
</tr>