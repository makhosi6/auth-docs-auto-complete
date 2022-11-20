<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'ByteeStudio')
            <img src="https://byteestudio.com/logo.png" style="font-family: 'Graphik','Rubik',Arial,sans-serif!important;box-sizing: border-box; max-width: 100%; border: none; height: 85px !important; max-height: unset !important;width: unset !important;" class="logo" alt="Bytee Studio">
            @else
            {{ $slot }}
            @endif
        </a>
    </td>
</tr>