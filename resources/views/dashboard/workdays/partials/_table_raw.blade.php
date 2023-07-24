<tr>
    <td>{!! $loop->index +1 !!}</td>
    <td>{!! session('lang') == 'ar' ? $workday->getTranslation('day', 'ar') : $workday->getTranslation('day', 'en') !!}</td>
</tr>

